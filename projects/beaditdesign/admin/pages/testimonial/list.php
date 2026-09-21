<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("../../include/connection.php");

$db = new DBconnection();

$testimonials = $db->fetch("
    SELECT *
    FROM testimonials
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
                                Testimonial Management
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
                                href="/admin/pages/testimonial/add.php"
                                class="btn btn-primary mb-3"
                            >
                                Add Testimonial
                            </a>


                            <div class="table-responsive">

                                <table class="table table-striped">

                                    <thead>

                                        <tr>

                                            <th>ID</th>

                                            <th>Image</th>

                                            <th>Name</th>

                                            <th>Location</th>

                                            <th>Message</th>

                                            <th>Rating</th>

                                            <th>Status</th>

                                            <th>Date</th>

                                            <th>Action</th>

                                        </tr>

                                    </thead>


                                    <tbody>


                                        <?php if (!empty($testimonials)) { ?>


                                            <?php foreach ($testimonials as $testimonial) { ?>


                                                <?php

                                                $image = $testimonial['image'];

                                                $imageUrl = '';


                                                if (!empty($image)) {

                                                    $uploadPath =
                                                        $_SERVER['DOCUMENT_ROOT'] .
                                                        "/beaditdesign/images/uploads/testimonials/" .
                                                        $image;


                                                    $frontendPathUpper =
                                                        $_SERVER['DOCUMENT_ROOT'] .
                                                        "/beaditdesign/Images/" .
                                                        $image;


                                                    $frontendPathLower =
                                                        $_SERVER['DOCUMENT_ROOT'] .
                                                        "/beaditdesign/images/" .
                                                        $image;


                                                    if (
                                                        file_exists(
                                                            $uploadPath
                                                        )
                                                    ) {

                                                        $imageUrl =
                                                            "/beaditdesign/images/uploads/testimonials/" .
                                                            $image;

                                                    } elseif (
                                                        file_exists(
                                                            $frontendPathUpper
                                                        )
                                                    ) {

                                                        $imageUrl =
                                                            "/beaditdesign/Images/" .
                                                            $image;

                                                    } elseif (
                                                        file_exists(
                                                            $frontendPathLower
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
                                                        echo (int)$testimonial['id'];
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
                                                                style="
                                                                    width:70px;
                                                                    height:70px;
                                                                    object-fit:cover;
                                                                    border-radius:50%;
                                                                "
                                                                alt=""
                                                            >


                                                        <?php } else { ?>


                                                            No Image


                                                        <?php } ?>


                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $testimonial['name']
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $testimonial['location']
                                                        );
                                                        ?>

                                                    </td>


                                                    <td
                                                        style="
                                                            max-width:250px;
                                                            white-space:normal;
                                                        "
                                                    >

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $testimonial['message']
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo (int)$testimonial['rating'];
                                                        ?>

                                                        / 5

                                                    </td>


                                                    <td>


                                                        <?php if ($testimonial['status'] == 1) { ?>


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
                                                            $testimonial['created_at']
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <a
                                                            href="/admin/pages/testimonial/delete.php?id=<?php
                                                                echo (int)$testimonial['id'];
                                                            ?>"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Delete this testimonial?');"
                                                        >
                                                            Delete
                                                        </a>

                                                    </td>


                                                </tr>


                                            <?php } ?>


                                        <?php } else { ?>


                                            <tr>

                                                <td
                                                    colspan="9"
                                                    class="text-center"
                                                >
                                                    No testimonials found
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