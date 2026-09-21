<?php

include("connection.php");

$con = new DBconnection();

$id = $_GET['id'];

$sql = "DELETE FROM `contact_form` WHERE `id` = '$id'";

$con->delete($sql);

header("Location: Contact-listing.php");
exit;

?>