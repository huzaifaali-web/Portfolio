<?php

session_start();

include "connection.php";

$db = new DBconnection();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM user
        WHERE email='$email'
        AND password='$password'";

$result = $db->fetch($sql);

if (count($result) > 0)
{
    $_SESSION['user'] = $result[0]['id'];

    header("Location: /admin/index.php");
    exit();
}
else
{
    header("Location: /admin/pages/samples/login.php?error=Incorrect%20Email%20or%20Password");
    exit();
}

?>