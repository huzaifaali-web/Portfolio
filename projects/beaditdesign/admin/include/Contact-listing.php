<?php

include("connection.php");

$con = new DBconnection();

$sql = "SELECT * FROM `contact_form`";

$data = $con->fetch($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Listing</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

    <h2>Contact Listing</h2>

    <table class="table table-bordered table-striped mt-3">

        <thead>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

        </thead>

       <tbody>

<?php foreach ($data as $value) { ?>

    <tr>

        <td><?php echo $value['id']; ?></td>

        <td><?php echo $value['name']; ?></td>

        <td><?php echo $value['email']; ?></td>

        <td><?php echo $value['address']; ?></td>

        <td><?php echo $value['phone']; ?></td>

        <td><?php echo $value['message']; ?></td>

        <td>
            <?php echo $value['status']; ?>
        </td>

        <td>

            <a href="../../include/edit.php?id=<?php echo $value['id']; ?>"
               class="btn btn-primary btn-sm">
                Edit
            </a>

            <a href="../../include/delete.php?id=<?php echo $value['id']; ?>"
               class="btn btn-danger btn-sm">
                Delete
            </a>

        </td>

    </tr>

<?php } ?>

</tbody>

    </table>

</div>

</body>

</html>

        