<?php

include("connection.php");

$con = new DBconnection();

if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "UPDATE `contact_form` SET
            `name` = '$name',
            `email` = '$email',
            `address` = '$address',
            `phone` = '$phone',
            `message` = '$message'
            WHERE `id` = '$id'";

    $result = $con->update($sql);

    if ($result) {
        header("Location: ../pages/tables/basic-table.php");
        exit();
    } else {
        echo "Update failed";
    }
}
?>