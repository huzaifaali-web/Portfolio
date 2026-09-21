<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("../../include/connection.php");

$db = new DBconnection();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /admin/pages/logo/add.php");
    exit();
}


/* =========================
   FORM DATA
========================= */

$title =
    trim($_POST['title'] ?? '');

$status =
    intval($_POST['status'] ?? 1);


/* =========================
   IMAGE CHECK
========================= */

if (
    !isset($_FILES['image']) ||
    $_FILES['image']['error'] !== UPLOAD_ERR_OK
) {

    header(
        "Location: /admin/pages/logo/add.php?error=" .
        urlencode("Logo image is required")
    );

    exit();
}


/* =========================
   FRONTEND LOGO FOLDER
========================= */

$uploadDirectory =
    $_SERVER['DOCUMENT_ROOT'] .
    "/beaditdesign/images/uploads/logo/";


if (!is_dir($uploadDirectory)) {

    mkdir(
        $uploadDirectory,
        0777,
        true
    );

}


/* =========================
   IMAGE VALIDATION
========================= */

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
        "Location: /admin/pages/logo/add.php?error=" .
        urlencode("Only JPG, JPEG, PNG and WEBP images are allowed")
    );

    exit();
}


/* =========================
   IMAGE NAME
========================= */

$imageName =
    "logo_" .
    time() .
    "_" .
    rand(1000, 9999) .
    "." .
    $extension;


$destination =
    $uploadDirectory .
    $imageName;


/* =========================
   UPLOAD
========================= */

if (
    !move_uploaded_file(
        $_FILES['image']['tmp_name'],
        $destination
    )
) {

    header(
        "Location: /admin/pages/logo/add.php?error=" .
        urlencode("Logo image upload failed")
    );

    exit();
}


/* =========================
   ONLY ONE ACTIVE LOGO
========================= */

if ($status == 1) {

    $db->update(
        "UPDATE logos
         SET status = 0"
    );

}


/* =========================
   INSERT DATA
========================= */

$data = [

    'title' =>
        $title,

    'image' =>
        $imageName,

    'status' =>
        $status

];


$result =
    $db->insert(
        $data,
        "logos"
    );


/* =========================
   SUCCESS
========================= */

if ($result) {

    header(
        "Location: /admin/pages/logo/list.php?success=" .
        urlencode("Logo uploaded successfully")
    );

    exit();
}


/* =========================
   ERROR
========================= */

header(
    "Location: /admin/pages/logo/add.php?error=" .
    urlencode("Logo could not be uploaded")
);

exit();

?>