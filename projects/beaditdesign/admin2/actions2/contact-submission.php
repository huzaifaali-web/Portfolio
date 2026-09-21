<?php

include("../includes2/connection.php");
if (isset($_POST['submit']) && $_POST['submit'] == 1) {

    $con = new DBconnection();

    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['address'] = $_POST['address'];
    $data['phone'] = $_POST['phone'];
    $data['message'] = $_POST['message'];
    $data['status'] = 1;

    $result = $con->insert($data, 'contact_form');

    if ($result == '1') {

        header("Location: ../../Contact.php?success=Record inserted successfully");
        exit();

    } else {

        header("Location: ../../Contact.php?error=Wrong, please try again");
        exit();

    }
}

?>