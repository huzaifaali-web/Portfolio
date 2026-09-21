<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("../../include/connection.php");

$db = new DBconnection();

$products = $db->fetch("
    SELECT *
    FROM products
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
                                Product Management
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


                            <a
                                href="/admin/pages/product/add.php"
                                class="btn btn-primary mb-3"
                            >
                                Add Product
                            </a>


                            <div class="table-responsive">

                                <table class="table table-striped">

                                    <thead>

                                        <tr>

                                            <th>ID</th>

                                            <th>Image</th>

                                            <th>Name</th>

                                            <th>Price</th>

                                            <th>Stock</th>

                                            <th>Status</th>

                                            <th>Date</th>

                                            <th>Action</th>

                                        </tr>

                                    </thead>


                                    <tbody>

                                        <?php if (!empty($products)) { ?>

                                            <?php foreach ($products as $product) { ?>

                                                <?php

                                                $image = $product['image'];

                                                $imageUrl = '';

                                                if (!empty($image)) {

                                                    $uploadedImagePath =
                                                        $_SERVER['DOCUMENT_ROOT'] .
                                                        "/beaditdesign/images/uploads/products/" .
                                                        $image;

                                                    $frontendImagePath =
                                                        $_SERVER['DOCUMENT_ROOT'] .
                                                        "/beaditdesign/Images/" .
                                                        $image;

                                                    $frontendImagePathLower =
                                                        $_SERVER['DOCUMENT_ROOT'] .
                                                        "/beaditdesign/images/" .
                                                        $image;


                                                    if (
                                                        file_exists(
                                                            $uploadedImagePath
                                                        )
                                                    ) {

                                                        $imageUrl =
                                                            "/beaditdesign/images/uploads/products/" .
                                                            $image;

                                                    } elseif (
                                                        file_exists(
                                                            $frontendImagePath
                                                        )
                                                    ) {

                                                        $imageUrl =
                                                            "/beaditdesign/Images/" .
                                                            $image;

                                                    } elseif (
                                                        file_exists(
                                                            $frontendImagePathLower
                                                        )
                                                    ) {

                                                        $imageUrl =
                                                            "/beaditdesign/images/" .
                                                            $image;

                                                    }

                                                }

                                                ?>


                                                <tr>


                                                    <td>

                                                        <?php
                                                        echo (int)$product['id'];
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php if ($imageUrl !== '') { ?>

                                                            <img
                                                                src="<?php
                                                                    echo htmlspecialchars(
                                                                        $imageUrl
                                                                    );
                                                                ?>"
                                                                alt="Product Image"
                                                                style="
                                                                    width:70px;
                                                                    height:70px;
                                                                    object-fit:cover;
                                                                    border-radius:5px;
                                                                "
                                                            >

                                                        <?php } else { ?>

                                                            <span>
                                                                No Image
                                                            </span>

                                                        <?php } ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $product['name']
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        Rs.
                                                        <?php
                                                        echo number_format(
                                                            $product['price'],
                                                            2
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo (int)$product['stock'];
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php if ($product['status'] == 1) { ?>

                                                            <span class="badge badge-success">
                                                                Active
                                                            </span>

                                                        <?php } else { ?>

                                                            <span class="badge badge-danger">
                                                                Inactive
                                                            </span>

                                                        <?php } ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $product['created_at']
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <a
                                                            href="/admin/pages/product/delete.php?id=<?php
                                                                echo (int)$product['id'];
                                                            ?>"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Delete this product?');"
                                                        >
                                                            Delete
                                                        </a>

                                                    </td>


                                                </tr>


                                            <?php } ?>


                                        <?php } else { ?>


                                            <tr>

                                                <td
                                                    colspan="8"
                                                    class="text-center"
                                                >
                                                    No products found
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