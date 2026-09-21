<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("../../include/connection.php");

$db = new DBconnection();

$id = intval($_GET["id"] ?? 0);

if ($id <= 0) {
    header("Location: /admin/pages/product/list.php");
    exit();
}


/* =========================
   PRODUCT FIND
========================= */

$product = $db->fetch(
    "
    SELECT *
    FROM products
    WHERE id=$id
    LIMIT 1
    "
);


/* =========================
   IMAGE DELETE
========================= */

if (!empty($product)) {

    $image = $product[0]["image"];

    if (!empty($image)) {

        $imagePath =
            $_SERVER["DOCUMENT_ROOT"] .
            "/beaditdesign/images/uploads/products/" .
            $image;

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}


/* =========================
   DATABASE DELETE
========================= */

$db->delete(
    "
    DELETE FROM products
    WHERE id=$id
    "
);


/* =========================
   REDIRECT
========================= */

header(
    "Location: /admin/pages/product/list.php?success=" .
    urlencode("Product deleted successfully")
);

exit();

?>