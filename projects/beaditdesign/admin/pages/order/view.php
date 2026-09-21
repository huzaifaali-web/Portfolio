<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("../../include/connection.php");

$db = new DBconnection();

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {
    header("Location: /admin/pages/order/list.php");
    exit();
}


/* =========================
   ORDER LOAD
========================= */

$order = $db->fetch("
    SELECT *
    FROM orders
    WHERE id = $id
    LIMIT 1
");

if (empty($order)) {
    die("Order not found");
}

$order = $order[0];


/* =========================
   ORDER ITEMS LOAD
========================= */

$items = $db->fetch("
    SELECT *
    FROM order_items
    WHERE order_id = $id
    ORDER BY id ASC
");


include("../../include/header.php");

?>

<div class="container-fluid page-body-wrapper">

    <?php include("../../include/sidebar.php"); ?>

    <div class="main-panel">

        <div class="content-wrapper">

            <?php if (isset($_GET['success'])) { ?>

                <div class="alert alert-success">

                    <?php
                    echo htmlspecialchars($_GET['success']);
                    ?>

                </div>

            <?php } ?>


            <?php if (isset($_GET['error'])) { ?>

                <div class="alert alert-danger">

                    <?php
                    echo htmlspecialchars($_GET['error']);
                    ?>

                </div>

            <?php } ?>


            <div class="row">


                <!-- =========================
                     ORDER DETAILS
                ========================== -->

                <div class="col-lg-7 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">
                                Order Details
                            </h4>


                            <p>
                                <strong>Order Number:</strong>

                                <?php
                                echo htmlspecialchars(
                                    $order['order_number']
                                );
                                ?>
                            </p>


                            <p>
                                <strong>Customer:</strong>

                                <?php
                                echo htmlspecialchars(
                                    $order['customer_name']
                                );
                                ?>
                            </p>


                            <p>
                                <strong>Email:</strong>

                                <?php
                                echo htmlspecialchars(
                                    $order['email']
                                );
                                ?>
                            </p>


                            <p>
                                <strong>Phone:</strong>

                                <?php
                                echo htmlspecialchars(
                                    $order['phone']
                                );
                                ?>
                            </p>


                            <p>
                                <strong>City:</strong>

                                <?php
                                echo htmlspecialchars(
                                    $order['city']
                                );
                                ?>
                            </p>


                            <p>
                                <strong>Address:</strong>

                                <?php
                                echo nl2br(
                                    htmlspecialchars(
                                        $order['address']
                                    )
                                );
                                ?>
                            </p>


                            <p>
                                <strong>Payment:</strong>

                                <?php
                                echo htmlspecialchars(
                                    $order['payment_method']
                                );
                                ?>
                            </p>


                            <p>
                                <strong>Order Date:</strong>

                                <?php
                                echo htmlspecialchars(
                                    $order['created_at']
                                );
                                ?>
                            </p>


                            <hr>


                            <h4>
                                Ordered Products
                            </h4>


                            <div class="table-responsive">

                                <table class="table table-striped">

                                    <thead>

                                        <tr>

                                            <th>Product</th>

                                            <th>Price</th>

                                            <th>Quantity</th>

                                            <th>Total</th>

                                        </tr>

                                    </thead>


                                    <tbody>

                                        <?php if (!empty($items)) { ?>

                                            <?php foreach ($items as $item) { ?>

                                                <tr>

                                                    <td>
                                                        <?php
                                                        echo htmlspecialchars(
                                                            $item['product_name']
                                                        );
                                                        ?>
                                                    </td>


                                                    <td>
                                                        Rs.
                                                        <?php
                                                        echo number_format(
                                                            $item['price'],
                                                            2
                                                        );
                                                        ?>
                                                    </td>


                                                    <td>
                                                        <?php
                                                        echo (int)$item['quantity'];
                                                        ?>
                                                    </td>


                                                    <td>
                                                        Rs.
                                                        <?php
                                                        echo number_format(
                                                            $item['total'],
                                                            2
                                                        );
                                                        ?>
                                                    </td>

                                                </tr>

                                            <?php } ?>

                                        <?php } else { ?>

                                            <tr>

                                                <td
                                                    colspan="4"
                                                    class="text-center"
                                                >
                                                    No order items found
                                                </td>

                                            </tr>

                                        <?php } ?>

                                    </tbody>

                                </table>

                            </div>


                            <hr>


                            <div class="text-end">

                                <p>
                                    <strong>Subtotal:</strong>

                                    Rs.
                                    <?php
                                    echo number_format(
                                        $order['subtotal'],
                                        2
                                    );
                                    ?>
                                </p>


                                <p>
                                    <strong>Shipping:</strong>

                                    Rs.
                                    <?php
                                    echo number_format(
                                        $order['shipping_charges'],
                                        2
                                    );
                                    ?>
                                </p>


                                <h4>
                                    Total:

                                    Rs.
                                    <?php
                                    echo number_format(
                                        $order['total'],
                                        2
                                    );
                                    ?>
                                </h4>

                            </div>


                        </div>

                    </div>

                </div>



                <!-- =========================
                     SHIPMENT MANAGEMENT
                ========================== -->

                <div class="col-lg-5 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">
                                Shipment Management
                            </h4>


                            <form
                                method="POST"
                                action="/admin/pages/order/update.php"
                            >


                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?php
                                        echo (int)$order['id'];
                                    ?>"
                                >


                                <!-- =========================
                                     ORDER STATUS
                                ========================== -->

                                <div class="form-group">

                                    <label>
                                        Order Status
                                    </label>

                                    <select
                                        name="order_status"
                                        class="form-control"
                                    >

                                        <?php

                                        $orderStatuses = [
                                            'Pending',
                                            'Confirmed',
                                            'Processing',
                                            'Completed',
                                            'Cancelled'
                                        ];

                                        foreach ($orderStatuses as $status) {

                                        ?>

                                            <option
                                                value="<?php
                                                    echo htmlspecialchars(
                                                        $status
                                                    );
                                                ?>"
                                                <?php
                                                echo
                                                    $order['order_status'] === $status
                                                    ? 'selected'
                                                    : '';
                                                ?>
                                            >
                                                <?php
                                                echo htmlspecialchars(
                                                    $status
                                                );
                                                ?>
                                            </option>

                                        <?php } ?>

                                    </select>

                                </div>



                                <!-- =========================
                                     SHIPPING STATUS
                                ========================== -->

                                <div class="form-group">

                                    <label>
                                        Shipping Status
                                    </label>

                                    <select
                                        name="shipping_status"
                                        class="form-control"
                                    >

                                        <?php

                                        $shippingStatuses = [
                                            'Pending',
                                            'Packed',
                                            'Shipped',
                                            'In Transit',
                                            'Out for Delivery',
                                            'Delivered',
                                            'Returned'
                                        ];

                                        foreach ($shippingStatuses as $status) {

                                        ?>

                                            <option
                                                value="<?php
                                                    echo htmlspecialchars(
                                                        $status
                                                    );
                                                ?>"
                                                <?php
                                                echo
                                                    $order['shipping_status'] === $status
                                                    ? 'selected'
                                                    : '';
                                                ?>
                                            >
                                                <?php
                                                echo htmlspecialchars(
                                                    $status
                                                );
                                                ?>
                                            </option>

                                        <?php } ?>

                                    </select>

                                </div>



                                <!-- =========================
                                     COURIER
                                ========================== -->

                                <div class="form-group">

                                    <label>
                                        Courier Company
                                    </label>

                                    <select
                                        name="courier"
                                        class="form-control"
                                    >

                                        <option value="">
                                            Select Courier
                                        </option>


                                        <option
                                            value="TCS"
                                            <?php
                                            echo
                                                ($order['courier'] ?? '') === 'TCS'
                                                ? 'selected'
                                                : '';
                                            ?>
                                        >
                                            TCS
                                        </option>


                                        <option
                                            value="Leopards Courier"
                                            <?php
                                            echo
                                                ($order['courier'] ?? '') === 'Leopards Courier'
                                                ? 'selected'
                                                : '';
                                            ?>
                                        >
                                            Leopards Courier
                                        </option>


                                        <option
                                            value="M&P"
                                            <?php
                                            echo
                                                ($order['courier'] ?? '') === 'M&P'
                                                ? 'selected'
                                                : '';
                                            ?>
                                        >
                                            M&P
                                        </option>


                                        <option
                                            value="Trax"
                                            <?php
                                            echo
                                                ($order['courier'] ?? '') === 'Trax'
                                                ? 'selected'
                                                : '';
                                            ?>
                                        >
                                            Trax
                                        </option>


                                        <option
                                            value="Other"
                                            <?php
                                            echo
                                                ($order['courier'] ?? '') === 'Other'
                                                ? 'selected'
                                                : '';
                                            ?>
                                        >
                                            Other
                                        </option>

                                    </select>

                                </div>



                                <!-- =========================
                                     AUTO TRACKING NUMBER
                                ========================== -->

                                <div class="form-group">

                                    <label>
                                        Tracking Number
                                    </label>


                                    <input
                                        type="text"
                                        class="form-control"
                                        value="<?php
                                            echo htmlspecialchars(
                                                !empty($order['tracking_number'])
                                                    ? $order['tracking_number']
                                                    : 'Will be generated automatically'
                                            );
                                        ?>"
                                        readonly
                                    >


                                    <?php if (empty($order['tracking_number'])) { ?>

                                        <small class="text-muted">
                                            Tracking ID will be generated
                                            automatically when shipment is packed.
                                        </small>

                                    <?php } else { ?>

                                        <small class="text-success">
                                            Auto-generated tracking ID
                                        </small>

                                    <?php } ?>

                                </div>



                                <!-- =========================
                                     UPDATE BUTTON
                                ========================== -->

                                <button
                                    type="submit"
                                    class="btn btn-success"
                                >
                                    Update Order / Shipment
                                </button>


                                <a
                                    href="/admin/pages/order/list.php"
                                    class="btn btn-light"
                                >
                                    Back
                                </a>


                            </form>


                        </div>

                    </div>

                </div>

            </div>

        </div>


<?php include("../../include/footer.php"); ?>