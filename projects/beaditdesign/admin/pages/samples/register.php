<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Skydash Admin - Register</title>

    <link rel="stylesheet"
          href="../../assets/vendors/feather/feather.css">

    <link rel="stylesheet"
          href="../../assets/vendors/ti-icons/css/themify-icons.css">

    <link rel="stylesheet"
          href="../../assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet"
          href="../../assets/vendors/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet"
          href="../../assets/vendors/mdi/css/materialdesignicons.min.css">

    <link rel="stylesheet"
          href="../../assets/css/style.css">

    <link rel="shortcut icon"
          href="../../assets/images/favicon.png" />
</head>


<body>

<div class="container-scroller">

    <div class="container-fluid page-body-wrapper full-page-wrapper">

        <div class="content-wrapper d-flex align-items-center auth px-0">

            <div class="row w-100 mx-0">

                <div class="col-lg-4 mx-auto">

                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                        <div class="brand-logo">
                            <img src="../../assets/images/logo.svg"
                                 alt="logo">
                        </div>

                        <h4>New here?</h4>

                        <h6 class="font-weight-light">
                            Signing up is easy. It only takes a few steps
                        </h6>


                        <?php
                        if (isset($_GET['error'])) {
                            echo '
                            <div class="alert alert-danger mt-3">
                                ' . htmlspecialchars($_GET['error']) . '
                            </div>';
                        }

                        if (isset($_GET['success'])) {
                            echo '
                            <div class="alert alert-success mt-3">
                                ' . htmlspecialchars($_GET['success']) . '
                            </div>';
                        }
                        ?>


                        <form class="pt-3"
                              method="POST"
                              action="../../register_action.php">

                            <div class="form-group">

                                <input type="text"
                                       class="form-control form-control-lg"
                                       name="name"
                                       placeholder="Username"
                                       required>

                            </div>


                            <div class="form-group">

                                <input type="email"
                                       class="form-control form-control-lg"
                                       name="email"
                                       placeholder="Email"
                                       required>

                            </div>


                            <div class="form-group">

                                <input type="password"
                                       class="form-control form-control-lg"
                                       name="password"
                                       placeholder="Password"
                                       required>

                            </div>


                            <div class="form-group">

                                <input type="password"
                                       class="form-control form-control-lg"
                                       name="confirm_password"
                                       placeholder="Confirm Password"
                                       required>

                            </div>


                            <div class="mb-4">

                                <div class="form-check">

                                    <label class="form-check-label text-muted">

                                        <input type="checkbox"
                                               class="form-check-input"
                                               required>

                                        I agree to all Terms & Conditions

                                    </label>

                                </div>

                            </div>


                            <div class="mt-3 d-grid gap-2">

                                <button type="submit"
                                        name="register"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">

                                    SIGN UP

                                </button>

                            </div>


                            <div class="text-center mt-4 font-weight-light">

                                Already have an account?

                                <a href="login.php"
                                   class="text-primary">
                                    Login
                                </a>

                            </div>

                        </form>


                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>

<script src="../../assets/js/off-canvas.js"></script>

<script src="../../assets/js/template.js"></script>

<script src="../../assets/js/settings.js"></script>

<script src="../../assets/js/todolist.js"></script>

</body>

</html>