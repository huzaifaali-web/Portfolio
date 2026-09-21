<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("connection.php");

$db = new DBconnection();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /admin/pages/banner/add.php");
    exit();
}

$heading = trim($_POST['heading'] ?? '');
$subHeading = trim($_POST['sub_heading'] ?? '');
$description = trim($_POST['desc'] ?? '');
$buttonText = trim($_POST['button_text'] ?? '');
$buttonLink = trim($_POST['button_link'] ?? '');
$pageNumber = trim($_POST['pages_number'] ?? '1');
$status = intval($_POST['status'] ?? 1);

if ($heading === '') {
    header(
        "Location: /admin/pages/banner/add.php?error=" .
        urlencode("Heading is required")
    );
    exit();
}

$uploadDirectory =
    $_SERVER['DOCUMENT_ROOT'] .
    "/beaditdesign/images/uploads/banners/";

if (!is_dir($uploadDirectory)) {
    mkdir($uploadDirectory, 0777, true);
}

function uploadBannerImage($file, $directory, $prefix)
{
    if (
        !isset($file) ||
        $file['error'] !== UPLOAD_ERR_OK
    ) {
        return "";
    }

    $extension = strtolower(
        pathinfo(
            $file['name'],
            PATHINFO_EXTENSION
        )
    );

    $allowed = [
        'jpg',
        'jpeg',
        'png',
        'webp'
    ];

    if (!in_array($extension, $allowed, true)) {
        return "";
    }

    $fileName =
        $prefix .
        "_" .
        time() .
        "_" .
        rand(1000, 9999) .
        "." .
        $extension;

    $destination =
        $directory .
        $fileName;

    if (
        move_uploaded_file(
            $file['tmp_name'],
            $destination
        )
    ) {
        return $fileName;
    }

    return "";
}

$image = uploadBannerImage(
    $_FILES['image'] ?? null,
    $uploadDirectory,
    "banner"
);

$backgroundImage = uploadBannerImage(
    $_FILES['background_image'] ?? null,
    $uploadDirectory,
    "background"
);

$sql = "
    INSERT INTO banner
    (
        heading,
        sub_heading,
        `desc`,
        button_text,
        button_link,
        image,
        background_image,
        pages_number,
        status
    )
    VALUES
    (
        ?, ?, ?, ?, ?, ?, ?, ?, ?
    )
";

$stmt = $db->connection->prepare($sql);

if (!$stmt) {
    die(
        "Prepare Error: " .
        $db->connection->error
    );
}

$stmt->bind_param(
    "sssssssii",
    $heading,
    $subHeading,
    $description,
    $buttonText,
    $buttonLink,
    $image,
    $backgroundImage,
    $pageNumber,
    $status
);

if ($stmt->execute()) {

    $stmt->close();

    header(
        "Location: /admin/pages/banner/list.php?success=" .
        urlencode("Banner added successfully")
    );

    exit();
}

$error = $stmt->error;

$stmt->close();

die(
    "Banner Insert Error: " .
    htmlspecialchars($error)
);