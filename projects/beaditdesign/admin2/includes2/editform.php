<?php

include("../includes2/connection.php");

$con = new DBconnection();

$id = $_GET['id'];

$sql = "SELECT * FROM `contact_form` WHERE `id` = $id";

$result = $con->connection->query($sql);

$data = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Us</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <!-- Your CSS -->
    <link rel="stylesheet" href="../css/testimonials.css">
    <link rel="stylesheet" href="../css/style.css">
<style>
    /* ==============================
   GENERAL
============================== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: "Roboto", sans-serif;
    background-color: #fff;
    color: #333;
}

a {
    text-decoration: none;
}


/* ==============================
   TOP SECTION
============================== */

.section-top {
    background-color: #222;
    padding: 12px 0;
}

.cont1 {
    display: flex;
    align-items: center;
    gap: 25px;
}

.cont1 a {
    color: #fff;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 7px;
}

.cont1 i {
    font-size: 14px;
}

.icons {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 18px;
}

.icons a {
    color: #fff;
    font-size: 16px;
    transition: 0.3s;
}

.icons a:hover {
    color: #d6a85f;
}


/* ==============================
   HEADER
============================== */

header {
    background-color: #fff;
    padding: 25px 0;
    border-bottom: 1px solid #eee;
}

.logo {
    font-family: "Oswald", sans-serif;
    font-size: 25px;
    font-weight: 600;
    color: #222;
    padding-top: 5px;
}

.Nav {
    display: flex;
    justify-content: center;
    align-items: center;
}

.Nav ul {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 25px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.Nav ul a {
    color: #222;
}

.Nav ul li {
    list-style: none;
    font-size: 15px;
    font-weight: 500;
    transition: 0.3s;
}

.Nav ul li:hover {
    color: #c49a6c;
}

.icons2 {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 20px;
}

.icon-img {
    width: 25px;
    height: 25px;
    object-fit: contain;
    cursor: pointer;
}


/* ==============================
   CONTACT HEADING
============================== */

.Contactus-section {
    padding: 60px 0 40px;
    text-align: center;
}

.Contact-us h1 {
    font-family: "Oswald", sans-serif;
    font-size: 42px;
    font-weight: 500;
    color: #222;
    margin-bottom: 10px;
}

.Contact-us p {
    font-size: 16px;
    color: #777;
    margin: 0;
}


/* ==============================
   CONTACT FORM SECTION
============================== */

.Card-section {
    padding: 30px 0 70px;
}

.contact-form {
    background: #fff;
    padding: 35px;
    border-radius: 8px;
    box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
}

.contact-form form {
    display: flex;
    flex-wrap: wrap;
    row-gap: 20px;
}

.Your-Name,
.Your-Email,
.Your-Address,
.Your-Phone,
.Your-Message {
    padding: 0 8px;
}

.Your-Name label,
.Your-Email label,
.Your-Address label,
.Your-Phone label,
.Your-Message label {
    display: block;
    font-size: 14px;
    font-weight: 500;
    color: #333;
    margin-bottom: 8px;
}

.Your-Name input,
.Your-Email input,
.Your-Address input,
.Your-Phone input,
.Your-Message textarea {
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 13px 15px;
    font-family: "Roboto", sans-serif;
    font-size: 14px;
    outline: none;
    transition: 0.3s;
}

.Your-Name input:focus,
.Your-Email input:focus,
.Your-Address input:focus,
.Your-Phone input:focus,
.Your-Message textarea:focus {
    border-color: #c49a6c;
    box-shadow: 0 0 0 2px rgba(196, 154, 108, 0.1);
}

.Your-Message textarea {
    resize: vertical;
    min-height: 150px;
}

.Your-Message-btn {
    margin-top: 20px;
    padding: 0 8px;
}

.Your-Message-btn button {
    background-color: #222;
    color: #fff;
    border: none;
    padding: 13px 35px;
    border-radius: 4px;
    font-size: 15px;
    font-weight: 500;
    cursor: pointer;
    transition: 0.3s;
}

.Your-Message-btn button:hover {
    background-color: #c49a6c;
}


/* ==============================
   MAP
============================== */

.map-img {
    width: 100%;
    height: 100%;
    min-height: 430px;
    object-fit: cover;
    border-radius: 8px;
    display: block;
}


/* ==============================
   FOOTER
============================== */

.Parent7 {
    background-color: #222;
    padding: 30px 0;
}

.cont8 {
    text-align: center;
}

.cont8 h3 {
    color: #fff;
    font-family: "Oswald", sans-serif;
    font-size: 22px;
    font-weight: 400;
    margin: 0;
}

.cont8 h3 span {
    color: #c49a6c;
}


/* ==============================
   RESPONSIVE
============================== */

@media (max-width: 991px) {

    .cont1 {
        gap: 12px;
    }

    .cont1 a {
        font-size: 12px;
    }

    .Nav ul {
        gap: 12px;
    }

    .Nav ul li {
        font-size: 13px;
    }

    .logo {
        font-size: 20px;
    }

    .Contact-us h1 {
        font-size: 36px;
    }
}


@media (max-width: 767px) {

    .section-top {
        padding: 10px 0;
    }

    .cont1 {
        flex-direction: column;
        align-items: flex-start;
        gap: 5px;
    }

    .icons {
        height: 100%;
        gap: 10px;
    }

    header {
        padding: 18px 0;
    }

    .logo {
        font-size: 18px;
    }

    .Nav ul {
        gap: 8px;
    }

    .Nav ul li {
        font-size: 11px;
    }

    .icons2 {
        gap: 8px;
    }

    .icon-img {
        width: 20px;
        height: 20px;
    }

    .Contactus-section {
        padding: 40px 0 25px;
    }

    .Contact-us h1 {
        font-size: 32px;
    }

    .Card-section {
        padding: 20px 0 50px;
    }

    .contact-form {
        padding: 20px 10px;
    }

    .map-img {
        margin-top: 30px;
        min-height: 300px;
    }
}


@media (max-width: 575px) {

    .section-top .col-6 {
        width: 100%;
    }

    .icons {
        justify-content: flex-start;
        margin-top: 10px;
    }

    header .col-4 {
        width: 100%;
        margin-bottom: 15px;
    }

    .Nav ul {
        flex-wrap: wrap;
    }

    .icons2 {
        justify-content: center;
    }

    .contact-form {
        padding: 20px 5px;
    }

    .contact-form .col-6 {
        width: 100%;
    }

    .contact-form .col-12 {
        width: 100%;
    }

    .Contact-us h1 {
        font-size: 28px;
    }
}
</style>
</head>

<body>

<!-- TOP SECTION -->

<section class="section-top">

    <div class="container">

        <div class="row">

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                <div class="cont1">

                    <a href="#">
                        <i class="fa-solid fa-envelopes-bulk"></i>
                        keemajum@gmail.com
                    </a>

                    <a href="#">
                        <i class="fa-solid fa-phone"></i>
                        +123-456-7890
                    </a>

                    <a href="#">
                        <i class="fa-solid fa-location-crosshairs"></i>
                        Lorem ipsum dolor sit amet.
                    </a>

                </div>

            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                <div class="icons">

                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>

                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>

                    <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>

                    <a href="#"><i class="fa-brands fa-instagram"></i></a>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- HEADER -->

<header>

    <div class="container">

        <div class="row">

            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">

                <div class="logo">
                    Bead It Designs by JC.
                </div>

            </div>

            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">

                <div class="Nav">

                    <ul>

                        <a href="../index.html">
                            <li>Home</li>
                        </a>

                        <a href="../About.html">
                            <li>About</li>
                        </a>

                        <a href="../product.html">
                            <li>Shop</li>
                        </a>

                        <a href="../testimonials.html">
                            <li>Testimonials</li>
                        </a>

                        <a href="../Contact.php">
                            <li>Contact Us</li>
                        </a>

                    </ul>

                </div>

            </div>

            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">

                <div class="icons2">

                    <img src="../images/search-8931.png" alt="" class="icon-img">

                    <img src="../Images/avator.png" alt="" class="icon-img">

                    <img src="../Images/cart (2).png" alt="" class="icon-img">

                </div>

            </div>

        </div>

    </div>

</header>


<!-- CONTACT HEADING -->

<section class="Contactus-section">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="Contact-us">

                    <h1>Edit Contact</h1>

                    <p>
                        Update the contact information below.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- CONTACT FORM -->

<section class="Card-section">

    <div class="container">

        <div class="row">


            <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">

                <div class="row contact-form">

                    <form action="" method="post">

                        <!-- ID -->

                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">


                        <!-- NAME -->

                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                            <div class="Your-Name">

                                <label>Your Name</label>

                                <input
                                    type="text"
                                    name="name"
                                    placeholder="Your Name"
                                    value="<?php echo $data['name']; ?>"
                                    required
                                >

                            </div>

                        </div>


                        <!-- EMAIL -->

                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                            <div class="Your-Email">

                                <label>Your Email</label>

                                <input
                                    type="email"
                                    name="email"
                                    placeholder="Your Email"
                                    value="<?php echo $data['email']; ?>"
                                    required
                                >

                            </div>

                        </div>


                        <!-- ADDRESS -->

                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                            <div class="Your-Address">

                                <label>Your Address</label>

                                <input
                                    type="text"
                                    name="address"
                                    placeholder="Your Address"
                                    value="<?php echo $data['address']; ?>"
                                >

                            </div>

                        </div>


                        <!-- PHONE -->

                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">

                            <div class="Your-Phone">

                                <label>Your Phone</label>

                                <input
                                    type="text"
                                    name="phone"
                                    placeholder="Your Phone"
                                    value="<?php echo $data['phone']; ?>"
                                    required
                                >

                            </div>

                        </div>


                        <!-- MESSAGE -->

                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <div class="Your-Message">

                                <label>Your Message</label>

                                <textarea
                                    placeholder="Type Your Message"
                                    name="message"
                                    rows="7"
                                ><?php echo $data['message']; ?></textarea>

                            </div>


                            <div class="Your-Message-btn">

                                <button
                                    type="submit"
                                    name="update"
                                    value="1"
                                >
                                    Update
                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>


            <!-- MAP -->

            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">

                <img
                    src="../Images/maps.jpg"
                    alt=""
                    class="map-img"
                >

            </div>


        </div>

    </div>

</section>


<!-- FOOTER -->

<footer class="Parent7">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="cont8">

                    <h3>
                        <span>Bead It</span> Design by JC.
                    </h3>

                </div>

            </div>

        </div>

    </div>

</footer>


</body>

</html>