<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("../../include/connection.php");

$db = new DBconnection();

/* ID check */
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header("Location: /admin/pages/inquiry/list.php");
    exit();
}

/* Get inquiry */
$rows = $db->fetch("
    SELECT *
    FROM contact_form
    WHERE id = $id
    LIMIT 1
");

if (empty($rows)) {
    header(
        "Location: /admin/pages/inquiry/list.php?error=" .
        urlencode("Inquiry not found")
    );
    exit();
}

$inquiry = $rows[0];

include("../../include/header.php");

?>

<div class="container-fluid page-body-wrapper">

    <?php include("../../include/sidebar.php"); ?>

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-10 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-4">

                                <h4 class="card-title mb-0">
                                    Inquiry Details
                                </h4>

                                <a
                                    href="/admin/pages/inquiry/list.php"
                                    class="btn btn-secondary btn-sm"
                                >
                                    Back to Inquiries
                                </a>

                            </div>

                            <div class="table-responsive">

                                <table class="table table-bordered">

                                    <tbody>

                                        <tr>
                                            <th style="width: 200px;">
                                                Inquiry ID
                                            </th>

                                            <td>
                                                <?= (int)$inquiry['id'] ?>
                                            </td>
                                        </tr>


                                        <tr>
                                            <th>Name</th>

                                            <td>
                                                <?= htmlspecialchars($inquiry['name']) ?>
                                            </td>
                                        </tr>


                                        <tr>
                                            <th>Email</th>

                                            <td>
                                                <?= htmlspecialchars($inquiry['email']) ?>
                                            </td>
                                        </tr>


                                        <tr>
                                            <th>Phone</th>

                                            <td>
                                                <?= htmlspecialchars($inquiry['phone']) ?>
                                            </td>
                                        </tr>


                                        <tr>
                                            <th>Address</th>

                                            <td>
                                                <?= htmlspecialchars($inquiry['address']) ?>
                                            </td>
                                        </tr>


                                        <tr>
                                            <th>Message</th>

                                            <td style="white-space: normal;">
                                                <?= nl2br(htmlspecialchars($inquiry['message'])) ?>
                                            </td>
                                        </tr>


                                        <tr>
                                            <th>Status</th>

                                            <td>

                                                <?php if ((int)$inquiry['status'] === 1) { ?>

                                                    <span class="badge badge-success">
                                                        Active
                                                    </span>

                                                <?php } else { ?>

                                                    <span class="badge badge-danger">
                                                        Inactive
                                                    </span>

                                                <?php } ?>

                                            </td>
                                        </tr>


                                        <tr>
                                            <th>Received Date</th>

                                            <td>
                                                <?= htmlspecialchars($inquiry['created_at']) ?>
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>


                            <div class="mt-4">

                                <a
                                    href="mailto:<?= htmlspecialchars($inquiry['email']) ?>"
                                    class="btn btn-primary"
                                >
                                    Reply by Email
                                </a>


                                <a
                                    href="/admin/pages/inquiry/delete.php?id=<?= (int)$inquiry['id'] ?>"
                                    class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this inquiry?');"
                                >
                                    Delete Inquiry
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <?php include("../../include/footer.php"); ?>

    </div>

</div>