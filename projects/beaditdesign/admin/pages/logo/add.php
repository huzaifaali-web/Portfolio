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
                                Add Logo
                            </h4>

                            <p class="card-description">
                                Upload website logo
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
                                action="/admin/pages/logo/action.php"
                                method="POST"
                                enctype="multipart/form-data"
                            >

                                <div class="form-group">

                                    <label>
                                        Logo Title
                                    </label>

                                    <input
                                        type="text"
                                        name="title"
                                        class="form-control"
                                        placeholder="Bead It Designs by JC."
                                    >

                                </div>


                                <div class="form-group">

                                    <label>
                                        Logo Image
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
                                    Upload Logo
                                </button>


                                <a
                                    href="/admin/pages/logo/list.php"
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