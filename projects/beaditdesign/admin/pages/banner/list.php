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


$banners =
    $db->fetch(
        "
        SELECT *
        FROM banner
        ORDER BY id DESC
        "
    );


include(
    "../../include/header.php"
);

?>


<div class="container-fluid page-body-wrapper">


<?php

include(
    "../../include/sidebar.php"
);

?>


<div class="main-panel">


<div class="content-wrapper">


<div class="row">


<div class="col-12 grid-margin stretch-card">


<div class="card">


<div class="card-body">


<h4 class="card-title">
    Banner Management
</h4>


<?php if (isset($_GET['success'])) { ?>


<div class="alert alert-success">

<?php

echo htmlspecialchars(
    $_GET['success']
);

?>

</div>


<?php } ?>


<a
    href="/admin/pages/banner/add.php"
    class="btn btn-primary mb-3"
>
    Add Banner
</a>


<div class="table-responsive">


<table class="table table-striped">


<thead>


<tr>

<th>ID</th>

<th>Heading</th>

<th>Sub Heading</th>

<th>Image</th>

<th>Background</th>

<th>Page</th>

<th>Status</th>

<th>Action</th>

</tr>


</thead>


<tbody>


<?php if (!empty($banners)) { ?>


<?php foreach ($banners as $banner) { ?>


<tr>


<td>

<?php
echo (int)$banner['id'];
?>

</td>


<td>

<?php
echo htmlspecialchars(
    $banner['heading']
);
?>

</td>


<td>

<?php
echo htmlspecialchars(
    $banner['sub_heading']
);
?>

</td>


<td>


<?php if (!empty($banner['image'])) { ?>


<img
    src="/beaditdesign/images/uploads/banners/<?php
        echo htmlspecialchars(
            $banner['image']
        );
    ?>"
    style="
        width:80px;
        height:70px;
        object-fit:cover;
        border-radius:5px;
    "
>


<?php } else { ?>


<span>
    No Image
</span>


<?php } ?>


</td>


<td>


<?php if (!empty($banner['background_image'])) { ?>


<img
    src="/beaditdesign/images/uploads/banners/<?php
        echo htmlspecialchars(
            $banner['background_image']
        );
    ?>"
    style="
        width:80px;
        height:70px;
        object-fit:cover;
        border-radius:5px;
    "
>


<?php } else { ?>


<span>
    No Image
</span>


<?php } ?>


</td>


<td>

<?php
echo htmlspecialchars(
    $banner['pages_number']
);
?>

</td>


<td>


<?php if ($banner['status'] == 1) { ?>


<span class="badge badge-success">
    Active
</span>


<?php } else { ?>


<span class="badge badge-danger">
    Inactive
</span>


<?php } ?>


</td>


<td>


<a
    href="/admin/pages/banner/delete.php?id=<?php
        echo (int)$banner['id'];
    ?>"
    class="btn btn-danger btn-sm"
    onclick="
        return confirm(
            'Delete this banner?'
        );
    "
>
    Delete
</a>


</td>


</tr>


<?php } ?>


<?php } else { ?>


<tr>


<td
    colspan="8"
    class="text-center"
>

No banners found

</td>


</tr>


<?php } ?>


</tbody>


</table>


</div>


</div>


</div>


</div>


</div>


</div>


<?php

include(
    "../../include/footer.php"
);

?>