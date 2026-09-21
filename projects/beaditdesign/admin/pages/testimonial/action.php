<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("../../include/connection.php");

$db = new DBconnection();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /admin/pages/testimonial/add.php");
    exit();
}


/* =========================
   FORM DATA
========================= */

$name =
    trim($_POST['name'] ?? '');

$location =
    trim($_POST['location'] ?? '');

$message =
    trim($_POST['message'] ?? '');

$rating =
    intval($_POST['rating'] ?? 5);

$status =
    intval($_POST['status'] ?? 1);


/* =========================
   VALIDATION
========================= */

if ($name === '') {

    header(
        "Location: /admin/pages/testimonial/add.php?error=" .
        urlencode("Customer name is required")
    );

    exit();
}


if ($message === '') {

    header(
        "Location: /admin/pages/testimonial/add.php?error=" .
        urlencode("Testimonial message is required")
    );

    exit();
}


if ($rating < 1 || $rating > 5) {
    $rating = 5;
}


/* =========================
   IMAGE FOLDER
========================= */

$uploadDirectory =
    $_SERVER['DOCUMENT_ROOT'] .
    "/beaditdesign/images/uploads/testimonials/";


if (!is_dir($uploadDirectory)) {

    mkdir(
        $uploadDirectory,
        0777,
        true
    );

}


/* =========================
   IMAGE UPLOAD
========================= */

$imageName = "";


if (
    isset($_FILES['image']) &&
    $_FILES['image']['error'] === UPLOAD_ERR_OK
) {

    $extension =
        strtolower(
            pathinfo(
                $_FILES['image']['name'],
                PATHINFO_EXTENSION
            )
        );


    $allowed = [
        'jpg',
        'jpeg',
        'png',
        'webp'
    ];


    if (!in_array($extension, $allowed)) {

        header(
            "Location: /admin/pages/testimonial/add.php?error=" .
            urlencode("Only JPG, JPEG, PNG and WEBP images are allowed")
        );

        exit();
    }


    $imageName =
        "testimonial_" .
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
            $_FILES['image']['tmp_name'],
            $destination
        )
    ) {

        header(
            "Location: /admin/pages/testimonial/add.php?error=" .
            urlencode("Image upload failed")
        );

        exit();
    }

}


/* =========================
   DATABASE DATA
========================= */

$data = [

    'name' =>
        $name,

    'location' =>
        $location,

    'message' =>
        $message,

    'rating' =>
        $rating,

    'image' =>
        $imageName,

    'status' =>
        $status

];


/* =========================
   INSERT
========================= */

$result =
    $db->insert(
        $data,
        "testimonials"
    );


if ($result) {

    header(
        "Location: /admin/pages/testimonial/list.php?success=" .
        urlencode("Testimonial added successfully")
    );

    exit();
}


header(
    "Location: /admin/pages/testimonial/add.php?error=" .
    urlencode("Testimonial could not be added")
);

exit();

?>