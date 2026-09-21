<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: /admin/pages/samples/login.php");
    exit();
}

include("../../include/header.php");

?>

<div class="container-fluid page-body-wrapper">

    <?php include("../../include/sidebar.php"); ?>

    <div class="main-panel">

        <div class="content-wrapper">

            <div class="row">

                <div class="col-md-8 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">
                                Add Product
                            </h4>

                            <p class="card-description">
                                Add new product details
                            </p>

                            <?php if (isset($_GET['error'])) { ?>

                                <div class="alert alert-danger">

                                    <?php
                                    echo htmlspecialchars(
                                        $_GET['error']
                                    );
                                    ?>

                                </div>

                            <?php } ?>


                            <form
                                action="/admin/pages/product/action.php"
                                method="POST"
                                enctype="multipart/form-data"
                            >

                                <div class="form-group">

                                    <label>
                                        Product Name
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        placeholder="Enter product name"
                                        required
                                    >

                                </div>


                                <div class="form-group">

                                    <label>
                                        Description
                                    </label>

                                    <textarea
                                        name="description"
                                        class="form-control"
                                        rows="5"
                                        placeholder="Enter product description"
                                    ></textarea>

                                </div>


                                <div class="form-group">

                                    <label>
                                        Price
                                    </label>

                                    <input
                                        type="number"
                                        name="price"
                                        class="form-control"
                                        step="0.01"
                                        min="0"
                                        placeholder="Enter product price"
                                        required
                                    >

                                </div>


                                <div class="form-group">

                                    <label>
                                        Stock
                                    </label>

                                    <input
                                        type="number"
                                        name="stock"
                                        class="form-control"
                                        min="0"
                                        value="0"
                                        required
                                    >

                                </div>


                                <div class="form-group">

                                    <label>
                                        Product Image
                                    </label>

                                    <input
                                        type="file"
                                        name="image"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.webp"
                                        required
                                    >

                                </div>


                                <div class="form-group">

                                    <label>
                                        Status
                                    </label>

                                    <select
                                        name="status"
                                        class="form-control"
                                    >

                                        <option value="1">
                                            Active
                                        </option>

                                        <option value="0">
                                            Inactive
                                        </option>

                                    </select>

                                </div>


                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    Add Product
                                </button>


                                <a
                                    href="/admin/pages/product/list.php"
                                    class="btn btn-light"
                                >
                                    Cancel
                                </a>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

<?php include("../../include/footer.php"); ?>