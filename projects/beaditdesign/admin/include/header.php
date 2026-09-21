<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header(
        "Location: /admin/pages/samples/login.php?error=" .
        urlencode("Please Login Your account First")
    );
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    >

    <title>BeadItDesign Admin</title>


    <!-- Plugins CSS -->

    <link
        rel="stylesheet"
        href="/admin/assets/vendors/feather/feather.css"
    >

    <link
        rel="stylesheet"
        href="/admin/assets/vendors/ti-icons/css/themify-icons.css"
    >

    <link
        rel="stylesheet"
        href="/admin/assets/vendors/css/vendor.bundle.base.css"
    >

    <link
        rel="stylesheet"
        href="/admin/assets/vendors/font-awesome/css/font-awesome.min.css"
    >

    <link
        rel="stylesheet"
        href="/admin/assets/vendors/mdi/css/materialdesignicons.min.css"
    >


    <!-- DataTables CSS -->

    <link
        rel="stylesheet"
        href="/admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css"
    >

    <link
        rel="stylesheet"
        href="/admin/assets/js/select.dataTables.min.css"
    >


    <!-- Main CSS -->

    <link
        rel="stylesheet"
        href="/admin/assets/css/style.css"
    >


    <!-- Favicon -->

    <link
        rel="shortcut icon"
        href="/admin/assets/images/favicon.png"
    >

</head>


<body>

<div class="container-scroller">


    <!-- NAVBAR -->

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">


        <!-- BRAND -->

        <div
            class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start"
        >

            <a
                class="navbar-brand brand-logo me-5"
                href="/admin/index.php"
                style="
                    font-size:20px;
                    font-weight:600;
                    text-decoration:none;
                "
            >
                BeadItDesign
            </a>


            <a
                class="navbar-brand brand-logo-mini"
                href="/admin/index.php"
                style="
                    font-size:18px;
                    font-weight:600;
                    text-decoration:none;
                "
            >
                BD
            </a>

        </div>


        <div
            class="navbar-menu-wrapper d-flex align-items-center justify-content-end"
        >


            <!-- MENU TOGGLE -->

            <button
                class="navbar-toggler navbar-toggler align-self-center"
                type="button"
                data-toggle="minimize"
            >

                <span class="icon-menu"></span>

            </button>


            <!-- ADMIN TITLE -->

            <ul class="navbar-nav me-auto">

                <li class="nav-item d-none d-lg-block">

                    <span class="nav-link">

                        BeadItDesign Administration

                    </span>

                </li>

            </ul>


            <!-- RIGHT NAV -->

            <ul class="navbar-nav navbar-nav-right">


                <!-- WEBSITE -->

                <li class="nav-item">

                    <a
                        class="nav-link"
                        href="/beaditdesign/index.php"
                        target="_blank"
                        title="View Website"
                    >

                        <i class="ti-eye"></i>

                    </a>

                </li>


                <!-- PROFILE -->

                <li class="nav-item nav-profile dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        data-bs-toggle="dropdown"
                        id="profileDropdown"
                    >

                        <img
                            src="/admin/assets/images/faces/face28.jpg"
                            alt="Admin"
                        >

                    </a>


                    <div
                        class="dropdown-menu dropdown-menu-right navbar-dropdown"
                        aria-labelledby="profileDropdown"
                    >

                        <div class="dropdown-item-text">

                            <strong>
                                Administrator
                            </strong>

                        </div>


                        <div class="dropdown-divider"></div>


                        <a
                            class="dropdown-item"
                            href="/admin/index.php"
                        >

                            <i class="ti-dashboard text-primary"></i>

                            Dashboard

                        </a>


                        <a
                            class="dropdown-item"
                            href="/beaditdesign/index.php"
                            target="_blank"
                        >

                            <i class="ti-eye text-primary"></i>

                            View Website

                        </a>


                        <a
                            class="dropdown-item"
                            href="/admin/logout.php"
                        >

                            <i class="ti-power-off text-primary"></i>

                            Logout

                        </a>

                    </div>

                </li>


            </ul>


            <!-- MOBILE TOGGLE -->

            <button
                class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
                type="button"
                data-toggle="offcanvas"
            >

                <span class="icon-menu"></span>

            </button>


        </div>

    </nav>