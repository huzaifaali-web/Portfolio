<?php

include "connection.php";

// Sirf POST request allow hogi
if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: pages/samples/register.php");
    exit();
}


// Form data lena
$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";
$confirm_password = $_POST["confirm_password"] ?? "";


// 1. Empty fields check
if ($email === "" || $password === "" || $confirm_password === "") {

    header(
        "Location: pages/samples/register.php?error=" .
        urlencode("Please fill all fields")
    );

    exit();
}


// 2. Valid email check
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    header(
        "Location: pages/samples/register.php?error=" .
        urlencode("Invalid email address")
    );

    exit();
}


// 3. Password match check
if ($password !== $confirm_password) {

    header(
        "Location: pages/samples/register.php?error=" .
        urlencode("Passwords do not match")
    );

    exit();
}


// Database connection
$db = new DBconnection();


// Email ko SELECT query ke liye safe banana
$email_safe = $db->connection->real_escape_string($email);


// 4. Check email already exists or not
$existingUser = $db->fetch(
    "SELECT * FROM `user`
     WHERE `email` = '$email_safe'"
);


if (count($existingUser) > 0) {

    header(
        "Location: pages/samples/register.php?error=" .
        urlencode("Email already registered")
    );

    exit();
}


// 5. User insert
$result = $db->insert([

    "email" => $email,
    "password" => $password

]);


// 6. Registration successful
if ($result === true) {

    header(
        "Location: pages/samples/login.php?success=" .
        urlencode("Account created successfully")
    );

    exit();
}


// 7. Database error
header(
    "Location: pages/samples/register.php?error=" .
    urlencode($result)
);

exit();

?>