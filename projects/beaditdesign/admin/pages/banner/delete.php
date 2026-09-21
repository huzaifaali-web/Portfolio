<?php

session_start();


if (!isset($_SESSION['user'])) {

    header(
        "Location: /admin/pages/samples/login.php"
    );

    exit();
}


include(
    "../../include/connection.php"
);


$db =
    new DBconnection();


$id =
    intval(
        $_GET['id'] ?? 0
    );


if ($id <= 0) {

    header(
        "Location: /admin/pages/banner/list.php"
    );

    exit();

}


/* Get banner before deleting */

$banner =
    $db->fetch(
        "
        SELECT *
        FROM banner
        WHERE id=$id
        LIMIT 1
        "
    );


if (!empty($banner)) {


    $banner =
        $banner[0];


    $directory =
        $_SERVER['DOCUMENT_ROOT'] .
        "/beaditdesign/images/uploads/banners/";


    if (
        !empty($banner['image'])
    ) {

        $imagePath =
            $directory .
            $banner['image'];


        if (
            file_exists(
                $imagePath
            )
        ) {

            unlink(
                $imagePath
            );

        }

    }


    if (
        !empty(
            $banner['background_image']
        )
    ) {

        $backgroundPath =
            $directory .
            $banner['background_image'];


        if (
            file_exists(
                $backgroundPath
            )
        ) {

            unlink(
                $backgroundPath
            );

        }

    }

}


/* Delete DB record */

$db->delete(
    "
    DELETE FROM banner
    WHERE id=$id
    "
);


header(
    "Location: /admin/pages/banner/list.php?success=" .
    urlencode(
        "Banner deleted successfully"
    )
);


exit();

?>