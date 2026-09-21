<?php 
include('../includes/connection.php');
if (isset($_POST['submit']) AND $_POST['submit'] == 1) {
	$con = new DBconnection();
	$data['name'] = $_POST['name'];
	$data['email'] = $_POST['email'];
	$data['address'] = $_POST['address'];
	$data['phone'] = $_POST['phone'];
	$data['message'] = $_POST['message'];
	$data['status'] = 1;
	$res = $con->insert($data,'inquiry');
	

	if ($res == 1) {
		header('Location: http://localhost/beaditdesign/Contact.php?success=Record Inserted Successfully');
	}
	else{
		header('Location: http://localhost/beaditdesign/Contact.php?error=something went worng please try again later');
	}
}

 ?>