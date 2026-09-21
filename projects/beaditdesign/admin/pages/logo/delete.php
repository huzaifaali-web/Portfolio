<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("../../include/connection.php");

$db = new DBconnection();


/* =========================
   CHECK ID
========================= */

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {

    header(
        "Location: /admin/pages/logo/list.php?error=" .
        urlencode("Invalid logo ID")
    );

    exit();
}


/* =========================
   GET LOGO
========================= */

$logo = $db->fetch("
    SELECT *
    FROM logos
    WHERE id = $id
    LIMIT 1
");


if (empty($logo)) {

    header(
        "Location: /admin/pages/logo/list.php?error=" .
        urlencode("Logo not found")
    );

    exit();
}


$logo = $logo[0];


/* =========================
   DELETE DATABASE RECORD
========================= */

$result = $db->delete("
    DELETE FROM logos
    WHERE id = $id
");


/* =========================
   DELETE IMAGE
========================= */

if ($result) {

    if (!empty($logo['image'])) {

        $imagePath =
            $_SERVER['DOCUMENT_ROOT'] .
            "/beaditdesign/images/uploads/logo/" .
            basename($logo['image']);


        if (file_exists($imagePath)) {

            unlink($imagePath);

        }

    }


    header(
        "Location: /admin/pages/logo/list.php?success=" .
        urlencode("Logo deleted successfully")
    );

    exit();
}


/* =========================
   ERROR
========================= */

header(
    "Location: /admin/pages/logo/list.php?error=" .
    urlencode("Logo could not be deleted")
);

exit();

?>