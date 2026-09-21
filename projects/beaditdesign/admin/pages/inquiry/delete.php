<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("../../include/connection.php");

$db = new DBconnection();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    header(
        "Location: /admin/pages/inquiry/list.php?error=" .
        urlencode("Invalid inquiry ID")
    );
    exit();
}

$rows = $db->fetch("
    SELECT id
    FROM contact_form
    WHERE id = $id
    LIMIT 1
");

if (empty($rows)) {
    header(
        "Location: /admin/pages/inquiry/list.php?error=" .
        urlencode("Inquiry not found")
    );
    exit();
}

$result = $db->delete("
    DELETE FROM contact_form
    WHERE id = $id
");

header(
    "Location: /admin/pages/inquiry/list.php?success=" .
    urlencode("Inquiry deleted successfully")
);

exit();
?>