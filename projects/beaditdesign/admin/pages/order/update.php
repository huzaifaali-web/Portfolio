<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("../../include/connection.php");

$db = new DBconnection();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /admin/pages/order/list.php");
    exit();
}

$id = intval($_POST['id'] ?? 0);
$orderStatus = trim($_POST['order_status'] ?? 'Pending');
$shippingStatus = trim($_POST['shipping_status'] ?? 'Pending');
$courier = trim($_POST['courier'] ?? '');

if ($id <= 0) {
    header("Location: /admin/pages/order/list.php");
    exit();
}

$allowedOrderStatuses = [
    'Pending',
    'Confirmed',
    'Processing',
    'Completed',
    'Cancelled'
];

$allowedShippingStatuses = [
    'Pending',
    'Packed',
    'Shipped',
    'In Transit',
    'Out for Delivery',
    'Delivered',
    'Returned'
];

if (!in_array($orderStatus, $allowedOrderStatuses, true)) {
    $orderStatus = 'Pending';
}

if (!in_array($shippingStatus, $allowedShippingStatuses, true)) {
    $shippingStatus = 'Pending';
}


/* GET CURRENT ORDER */

$currentOrder = $db->fetch("
    SELECT *
    FROM orders
    WHERE id = $id
    LIMIT 1
");

if (empty($currentOrder)) {
    header("Location: /admin/pages/order/list.php");
    exit();
}

$currentOrder = $currentOrder[0];

$trackingNumber = $currentOrder['tracking_number'] ?? '';


/* AUTO GENERATE TRACKING ID
   Jab order Packed/Shipped/In Transit/Out for Delivery/Delivered ho
   aur tracking number pehle se na ho
*/

$trackingRequiredStatuses = [
    'Packed',
    'Shipped',
    'In Transit',
    'Out for Delivery',
    'Delivered'
];

if (
    empty($trackingNumber) &&
    in_array($shippingStatus, $trackingRequiredStatuses, true)
) {

    $lastTracking = $db->fetch("
        SELECT tracking_number
        FROM orders
        WHERE tracking_number IS NOT NULL
          AND tracking_number != ''
          AND tracking_number LIKE 'BD-TRK-%'
        ORDER BY id DESC
        LIMIT 1
    ");

    $nextNumber = 1;

    if (!empty($lastTracking)) {

        $lastNumber = str_replace(
            'BD-TRK-',
            '',
            $lastTracking[0]['tracking_number']
        );

        $lastNumber = intval($lastNumber);

        $nextNumber = $lastNumber + 1;
    }

    $trackingNumber =
        'BD-TRK-' .
        str_pad(
            $nextNumber,
            6,
            '0',
            STR_PAD_LEFT
        );
}


/* ESCAPE */

$orderStatusEsc =
    $db->connection->real_escape_string($orderStatus);

$shippingStatusEsc =
    $db->connection->real_escape_string($shippingStatus);

$courierEsc =
    $db->connection->real_escape_string($courier);

$trackingEsc =
    $db->connection->real_escape_string($trackingNumber);


/* UPDATE */

$sql = "
    UPDATE orders
    SET
        order_status = '$orderStatusEsc',
        shipping_status = '$shippingStatusEsc',
        courier = '$courierEsc',
        tracking_number = '$trackingEsc'
    WHERE id = $id
";

$result = $db->update($sql);

header(
    "Location: /admin/pages/order/view.php?id=$id&success=" .
    urlencode("Order and shipment updated successfully")
);

exit();

?>