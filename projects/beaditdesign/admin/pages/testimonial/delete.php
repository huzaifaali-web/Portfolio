<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("../../include/connection.php");

$db = new DBconnection();


/* =========================
   CHECK TESTIMONIAL ID
========================= */

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {

    header(
        "Location: /admin/pages/testimonial/list.php?error=" .
        urlencode("Invalid testimonial ID")
    );

    exit();
}


$id = (int) $_GET['id'];


/* =========================
   GET TESTIMONIAL FIRST
========================= */

$testimonial = $db->fetch(
    "SELECT * FROM testimonials WHERE id = $id LIMIT 1"
);


if (empty($testimonial)) {

    header(
        "Location: /admin/pages/testimonial/list.php?error=" .
        urlencode("Testimonial not found")
    );

    exit();
}


$testimonial = $testimonial[0];


/* =========================
   DELETE DATABASE RECORD
========================= */

$sql = "DELETE FROM testimonials WHERE id = $id";

$result = $db->delete($sql);


/* =========================
   DELETE IMAGE
========================= */

if ($result) {

    if (!empty($testimonial['image'])) {

        $imagePath =
            $_SERVER['DOCUMENT_ROOT'] .
            "/beaditdesign/images/uploads/testimonials/" .
            basename($testimonial['image']);


        if (file_exists($imagePath)) {

            unlink($imagePath);

        }

    }


    /* =========================
       SUCCESS
    ========================= */

    header(
        "Location: /admin/pages/testimonial/list.php?success=" .
        urlencode("Testimonial deleted successfully")
    );

    exit();
}


/* =========================
   ERROR
========================= */

header(
    "Location: /admin/pages/testimonial/list.php?error=" .
    urlencode("Testimonial could not be deleted")
);

exit();

?>