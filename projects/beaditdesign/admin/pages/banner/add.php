<?php
include("../../include/header.php");
?>

<div class="container-fluid page-body-wrapper">

<?php
include("../../include/sidebar.php");
?>

<div class="main-panel">
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">

                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Banner</h4>
                        <p class="card-description">
                            Add new banner details
                        </p>

                        <form class="forms-sample"
                              action="../../include/banner_action.php"
                              method="POST"
                              enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Heading</label>
                                <input type="text"
                                       class="form-control"
                                       name="heading"
                                       placeholder="Enter banner heading"
                                       required>
                            </div>

                            <div class="form-group">
                                <label>Sub Heading</label>
                                <input type="text"
                                       class="form-control"
                                       name="sub_heading"
                                       placeholder="Enter sub heading">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control"
                                          name="desc"
                                          rows="4"
                                          placeholder="Enter banner description"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Button Text</label>
                                <input type="text"
                                       class="form-control"
                                       name="button_text"
                                       placeholder="Example: Shop Now">
                            </div>

                            <div class="form-group">
                                <label>Button Link</label>
                                <input type="text"
                                       class="form-control"
                                       name="button_link"
                                       placeholder="Example: product.html">
                            </div>

                            <div class="form-group">
                                <label>Banner Image</label>
                                <input type="file"
                                       class="form-control"
                                       name="image"
                                       accept="image/*">
                            </div>

                            <div class="form-group">
                                <label>Background Image</label>
                                <input type="file"
                                       class="form-control"
                                       name="background_image"
                                       accept="image/*">
                            </div>

                            <div class="form-group">
                                <label>Pages Number</label>
                                <input type="text"
                                       class="form-control"
                                       name="pages_number"
                                       placeholder="Example: 01">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <button type="submit"
                                    name="add_banner"
                                    value="1"
                                    class="btn btn-primary mr-2">
                                Add Banner
                            </button>

                            <a href="index.php" class="btn btn-light">
                                Cancel
                            </a>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

<?php
include("../../include/footer.php");
?>