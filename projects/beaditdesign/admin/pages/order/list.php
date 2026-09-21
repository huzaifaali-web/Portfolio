<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("../../include/connection.php");

$db = new DBconnection();

$orders = $db->fetch("
    SELECT *
    FROM orders
    ORDER BY id DESC
");

include("../../include/header.php");

?>

<div class="container-fluid page-body-wrapper">

    <?php include("../../include/sidebar.php"); ?>

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">
                                Order / Shipment Management
                            </h4>

                            <?php if (isset($_GET['success'])) { ?>

                                <div class="alert alert-success">

                                    <?php
                                    echo htmlspecialchars(
                                        $_GET['success']
                                    );
                                    ?>

                                </div>

                            <?php } ?>

                            <div class="table-responsive">

                                <table class="table table-striped">

                                    <thead>

                                        <tr>

                                            <th>ID</th>
                                            <th>Order Number</th>
                                            <th>Customer</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>Total</th>
                                            <th>Order Status</th>
                                            <th>Shipping</th>
                                            <th>Courier</th>
                                            <th>Tracking</th>
                                            <th>Date</th>
                                            <th>Action</th>

                                        </tr>

                                    </thead>


                                    <tbody>

                                        <?php if (!empty($orders)) { ?>

                                            <?php foreach ($orders as $order) { ?>

                                                <tr>

                                                    <td>
                                                        <?php
                                                        echo (int)$order['id'];
                                                        ?>
                                                    </td>


                                                    <td>

                                                        <strong>

                                                            <?php
                                                            echo htmlspecialchars(
                                                                $order['order_number']
                                                            );
                                                            ?>

                                                        </strong>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $order['customer_name']
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $order['phone']
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $order['city']
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        Rs.
                                                        <?php
                                                        echo number_format(
                                                            $order['total'],
                                                            2
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $order['order_status']
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $order['shipping_status']
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo !empty($order['courier'])
                                                            ? htmlspecialchars($order['courier'])
                                                            : '-';
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo !empty($order['tracking_number'])
                                                            ? htmlspecialchars($order['tracking_number'])
                                                            : '-';
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $order['created_at']
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <a
                                                            href="/admin/pages/order/view.php?id=<?php
                                                                echo (int)$order['id'];
                                                            ?>"
                                                            class="btn btn-primary btn-sm"
                                                        >
                                                            View
                                                        </a>

                                                    </td>

                                                </tr>

                                            <?php } ?>


                                        <?php } else { ?>


                                            <tr>

                                                <td
                                                    colspan="12"
                                                    class="text-center"
                                                >
                                                    No orders found
                                                </td>

                                            </tr>


                                        <?php } ?>


                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


<?php include("../../include/footer.php"); ?>