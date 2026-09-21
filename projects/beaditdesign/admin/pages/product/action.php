<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("../../include/connection.php");

$db = new DBconnection();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /admin/pages/product/add.php");
    exit();
}


// FORM DATA
$name = trim($_POST["name"] ?? "");
$description = trim($_POST["description"] ?? "");
$price = floatval($_POST["price"] ?? 0);
$stock = intval($_POST["stock"] ?? 0);
$status = intval($_POST["status"] ?? 1);


// VALIDATION
if ($name === "") {
    header(
        "Location: /admin/pages/product/add.php?error=" .
        urlencode("Product name is required")
    );
    exit();
}

if ($price < 0) {
    header(
        "Location: /admin/pages/product/add.php?error=" .
        urlencode("Invalid product price")
    );
    exit();
}


// FRONTEND PRODUCT IMAGE FOLDER
$uploadDirectory =
    $_SERVER["DOCUMENT_ROOT"] .
    "/beaditdesign/images/uploads/products/";


// CREATE FOLDER AUTOMATICALLY
if (!is_dir($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}


// IMAGE
$imageName = "";

if (
    isset($_FILES["image"]) &&
    $_FILES["image"]["error"] === UPLOAD_ERR_OK
) {

    $extension = strtolower(
        pathinfo(
            $_FILES["image"]["name"],
            PATHINFO_EXTENSION
        )
    );

    $allowed = [
        "jpg",
        "jpeg",
        "png",
        "webp"
    ];

    if (!in_array($extension, $allowed)) {

        header(
            "Location: /admin/pages/product/add.php?error=" .
            urlencode("Only JPG, JPEG, PNG and WEBP images are allowed")
        );

        exit();
    }


    $imageName =
        "product_" .
        time() .
        "_" .
        rand(1000, 9999) .
        "." .
        $extension;


    $destination =
        $uploadDirectory .
        $imageName;


    if (
        !move_uploaded_file(
            $_FILES["image"]["tmp_name"],
            $destination
        )
    ) {

        header(
            "Location: /admin/pages/product/add.php?error=" .
            urlencode("Product image upload failed")
        );

        exit();
    }
}


// DATABASE DATA
$data = [

    "name" => $name,

    "description" => $description,

    "price" => $price,

    "stock" => $stock,

    "image" => $imageName,

    "status" => $status

];


// INSERT PRODUCT
$result = $db->insert(
    $data,
    "products"
);


// SUCCESS
if ($result) {

    header(
        "Location: /admin/pages/product/list.php?success=" .
        urlencode("Product added successfully")
    );

    exit();
}


// ERROR
header(
    "Location: /admin/pages/product/add.php?error=" .
    urlencode("Product could not be added")
);

exit();

?>