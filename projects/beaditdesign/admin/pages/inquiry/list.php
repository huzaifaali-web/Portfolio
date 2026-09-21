<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("../../include/connection.php");

$db = new DBconnection();

$inquiries = $db->fetch("
    SELECT *
    FROM contact_form
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
                                Inquiry Management
                            </h4>

                            <p class="card-description">
                                Customer Contact Form Inquiries
                            </p>

                            <?php if (isset($_GET['success'])) { ?>

                                <div class="alert alert-success">
                                    <?= htmlspecialchars($_GET['success']) ?>
                                </div>

                            <?php } ?>

                            <?php if (isset($_GET['error'])) { ?>

                                <div class="alert alert-danger">
                                    <?= htmlspecialchars($_GET['error']) ?>
                                </div>

                            <?php } ?>

                            <div class="table-responsive">

                                <table class="table table-striped">

                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php if (!empty($inquiries)) { ?>

                                        <?php foreach ($inquiries as $row) { ?>

                                            <tr>

                                                <td>
                                                    <?= (int)$row['id'] ?>
                                                </td>

                                                <td>
                                                    <?= htmlspecialchars($row['name']) ?>
                                                </td>

                                                <td>
                                                    <?= htmlspecialchars($row['email']) ?>
                                                </td>

                                                <td>
                                                    <?= htmlspecialchars($row['phone']) ?>
                                                </td>

                                                <td style="max-width:220px; white-space:normal;">
                                                    <?= htmlspecialchars($row['message']) ?>
                                                </td>

                                                <td>

                                                    <?php if ((int)$row['status'] === 1) { ?>

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
                                                    <?= htmlspecialchars($row['created_at']) ?>
                                                </td>

                                                <td style="white-space:nowrap;">

                                                    <a
                                                        href="/admin/pages/inquiry/view.php?id=<?= (int)$row['id'] ?>"
                                                        class="btn btn-primary btn-sm"
                                                    >
                                                        View
                                                    </a>

                                                    <a
                                                        href="/admin/pages/inquiry/delete.php?id=<?= (int)$row['id'] ?>"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Delete this inquiry?');"
                                                    >
                                                        Delete
                                                    </a>

                                                </td>

                                            </tr>

                                        <?php } ?>

                                    <?php } else { ?>

                                        <tr>
                                            <td colspan="8" class="text-center">
                                                No inquiries found
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

    </div>

</div>