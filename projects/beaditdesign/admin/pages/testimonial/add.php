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
                                Add Testimonial
                            </h4>

                            <p class="card-description">
                                Add customer testimonial
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
                                action="/admin/pages/testimonial/action.php"
                                method="POST"
                                enctype="multipart/form-data"
                            >


                                <div class="form-group">

                                    <label>
                                        Customer Name
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        placeholder="Enter customer name"
                                        required
                                    >

                                </div>


                                <div class="form-group">

                                    <label>
                                        Location
                                    </label>

                                    <input
                                        type="text"
                                        name="location"
                                        class="form-control"
                                        placeholder="Karachi / Lahore / Islamabad"
                                    >

                                </div>


                                <div class="form-group">

                                    <label>
                                        Testimonial Message
                                    </label>

                                    <textarea
                                        name="message"
                                        class="form-control"
                                        rows="5"
                                        placeholder="Enter customer feedback"
                                        required
                                    ></textarea>

                                </div>


                                <div class="form-group">

                                    <label>
                                        Rating
                                    </label>

                                    <select
                                        name="rating"
                                        class="form-control"
                                    >

                                        <option value="5">
                                            5 Stars
                                        </option>

                                        <option value="4">
                                            4 Stars
                                        </option>

                                        <option value="3">
                                            3 Stars
                                        </option>

                                        <option value="2">
                                            2 Stars
                                        </option>

                                        <option value="1">
                                            1 Star
                                        </option>

                                    </select>

                                </div>


                                <div class="form-group">

                                    <label>
                                        Customer Image
                                    </label>

                                    <input
                                        type="file"
                                        name="image"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.webp"
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
                                    Add Testimonial
                                </button>


                                <a
                                    href="/admin/pages/testimonial/list.php"
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