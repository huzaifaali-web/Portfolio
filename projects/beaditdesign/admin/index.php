<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php?error=Please%20Login%20Your%20account%20First");
    exit();
}

include("connection.php");

$db = new DBconnection();

function getCount($db, $table)
{
    $rows = $db->fetch("
        SELECT COUNT(*) AS total
        FROM `$table`
    ");

    return !empty($rows)
        ? (int)$rows[0]['total']
        : 0;
}


/* COUNTS */

$productCount =
    getCount($db, "products");

$orderCount =
    getCount($db, "orders");

$inquiryCount =
    getCount($db, "contact_form");

$testimonialCount =
    getCount($db, "testimonials");

$bannerCount =
    getCount($db, "banner");

$logoCount =
    getCount($db, "logos");


/* TOTAL SALES */

$salesRows = $db->fetch("
    SELECT COALESCE(SUM(total), 0) AS total
    FROM orders
    WHERE order_status != 'Cancelled'
");

$totalSales =
    !empty($salesRows)
    ? (float)$salesRows[0]['total']
    : 0;


/* LATEST ORDERS */

$latestOrders = $db->fetch("
    SELECT *
    FROM orders
    ORDER BY id DESC
    LIMIT 5
");


include("include/header.php");

?>

<div class="container-fluid page-body-wrapper">

    <?php include("include/sidebar.php"); ?>

    <div class="main-panel">

        <div class="content-wrapper">


            <!-- PAGE HEADING -->

            <div class="row mb-4">

                <div class="col-12">

                    <h3 class="font-weight-bold">
                        BeadItDesign Dashboard
                    </h3>

                    <p class="text-muted">
                        Website management overview
                    </p>

                </div>

            </div>


            <!-- DASHBOARD COUNTS -->

            <div class="row">


                <!-- PRODUCTS -->

                <div class="col-md-4 grid-margin stretch-card">

                    <div class="card card-tale">

                        <div class="card-body">

                            <p class="mb-4">
                                Products
                            </p>

                            <p class="fs-30 mb-2">
                                <?php echo $productCount; ?>
                            </p>

                            <p>
                                Available products
                            </p>

                        </div>

                    </div>

                </div>


                <!-- ORDERS -->

                <div class="col-md-4 grid-margin stretch-card">

                    <div class="card card-dark-blue">

                        <div class="card-body">

                            <p class="mb-4">
                                Orders
                            </p>

                            <p class="fs-30 mb-2">
                                <?php echo $orderCount; ?>
                            </p>

                            <p>
                                Customer orders
                            </p>

                        </div>

                    </div>

                </div>


                <!-- INQUIRIES -->

                <div class="col-md-4 grid-margin stretch-card">

                    <div class="card card-light-blue">

                        <div class="card-body">

                            <p class="mb-4">
                                Inquiries
                            </p>

                            <p class="fs-30 mb-2">
                                <?php echo $inquiryCount; ?>
                            </p>

                            <p>
                                Contact inquiries
                            </p>

                        </div>

                    </div>

                </div>


                <!-- TESTIMONIALS -->

                <div class="col-md-4 grid-margin stretch-card">

                    <div class="card card-light-danger">

                        <div class="card-body">

                            <p class="mb-4">
                                Testimonials
                            </p>

                            <p class="fs-30 mb-2">
                                <?php echo $testimonialCount; ?>
                            </p>

                            <p>
                                Customer testimonials
                            </p>

                        </div>

                    </div>

                </div>


                <!-- BANNERS -->

                <div class="col-md-4 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <p class="mb-4">
                                Banners
                            </p>

                            <p class="fs-30 mb-2">
                                <?php echo $bannerCount; ?>
                            </p>

                            <p>
                                Website banners
                            </p>

                        </div>

                    </div>

                </div>


                <!-- LOGOS -->

                <div class="col-md-4 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <p class="mb-4">
                                Logos
                            </p>

                            <p class="fs-30 mb-2">
                                <?php echo $logoCount; ?>
                            </p>

                            <p>
                                Uploaded logos
                            </p>

                        </div>

                    </div>

                </div>


            </div>


            <!-- TOTAL SALES -->

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">
                                Total Sales
                            </h4>

                            <h2 class="font-weight-bold">

                                Rs.
                                <?php
                                echo number_format(
                                    $totalSales,
                                    2
                                );
                                ?>

                            </h2>

                        </div>

                    </div>

                </div>

            </div>


            <!-- LATEST ORDERS -->

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">


                            <div class="d-flex justify-content-between align-items-center mb-3">

                                <h4 class="card-title mb-0">
                                    Latest Orders
                                </h4>

                                <a
                                    href="/admin/pages/order/list.php"
                                    class="btn btn-primary btn-sm"
                                >
                                    View All Orders
                                </a>

                            </div>


                            <div class="table-responsive">

                                <table class="table table-striped">

                                    <thead>

                                        <tr>

                                            <th>
                                                Order #
                                            </th>

                                            <th>
                                                Customer
                                            </th>

                                            <th>
                                                Total
                                            </th>

                                            <th>
                                                Order Status
                                            </th>

                                            <th>
                                                Shipping
                                            </th>

                                            <th>
                                                Date
                                            </th>

                                            <th>
                                                Action
                                            </th>

                                        </tr>

                                    </thead>


                                    <tbody>


                                        <?php if (!empty($latestOrders)) { ?>


                                            <?php foreach ($latestOrders as $order) { ?>


                                                <tr>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $order['order_number']
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $order['customer_name']
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
                                                            class="btn btn-sm btn-primary"
                                                        >
                                                            View
                                                        </a>

                                                    </td>


                                                </tr>


                                            <?php } ?>


                                        <?php } else { ?>


                                            <tr>

                                                <td
                                                    colspan="7"
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


        <?php include("include/footer.php"); ?>


    </div>

</div>