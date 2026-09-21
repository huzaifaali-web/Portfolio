<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("../../include/connection.php");

$db = new DBconnection();

$logos = $db->fetch("
    SELECT *
    FROM logos
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
                                Logo Management
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
                                href="/admin/pages/logo/add.php"
                                class="btn btn-primary mb-3"
                            >
                                Add Logo
                            </a>


                            <div class="table-responsive">

                                <table class="table table-striped">

                                    <thead>

                                        <tr>

                                            <th>ID</th>

                                            <th>Logo</th>

                                            <th>Title</th>

                                            <th>Status</th>

                                            <th>Date</th>

                                            <th>Action</th>

                                        </tr>

                                    </thead>


                                    <tbody>


                                        <?php if (!empty($logos)) { ?>


                                            <?php foreach ($logos as $logo) { ?>


                                                <?php

                                                $image = $logo['image'];

                                                $imageUrl = '';

                                                $uploadPath =
                                                    $_SERVER['DOCUMENT_ROOT'] .
                                                    "/beaditdesign/images/uploads/logo/" .
                                                    $image;


                                                if (
                                                    !empty($image) &&
                                                    file_exists($uploadPath)
                                                ) {

                                                    $imageUrl =
                                                        "/beaditdesign/images/uploads/logo/" .
                                                        $image;

                                                }

                                                ?>


                                                <tr>


                                                    <td>

                                                        <?php
                                                        echo (int)$logo['id'];
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
                                                                alt="Logo"
                                                                style="
                                                                    max-width:150px;
                                                                    max-height:80px;
                                                                    object-fit:contain;
                                                                "
                                                            >


                                                        <?php } else { ?>


                                                            No Image


                                                        <?php } ?>


                                                    </td>


                                                    <td>

                                                        <?php
                                                        echo htmlspecialchars(
                                                            $logo['title']
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>


                                                        <?php if ($logo['status'] == 1) { ?>


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
                                                            $logo['created_at']
                                                        );
                                                        ?>

                                                    </td>


                                                    <td>

                                                        <a
                                                            href="/admin/pages/logo/delete.php?id=<?php
                                                                echo (int)$logo['id'];
                                                            ?>"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Delete this logo?');"
                                                        >
                                                            Delete
                                                        </a>

                                                    </td>


                                                </tr>


                                            <?php } ?>


                                        <?php } else { ?>


                                            <tr>

                                                <td
                                                    colspan="6"
                                                    class="text-center"
                                                >
                                                    No logos found
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