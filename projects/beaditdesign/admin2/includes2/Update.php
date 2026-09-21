<?php

include("../includes2/connection.php");

$con = new DBconnection();

if (isset($_POST['update'])) {

    $id      = $_POST['id'];
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $address = $_POST['address'];
    $phone   = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "UPDATE `contact_form` SET 
            `name` = '$name',
            `email` = '$email',
            `address` = '$address',
            `phone` = '$phone',
            `message` = '$message'
            WHERE `id` = $id";

    $result = $con->update($sql);

    echo $result;

    echo "<br>";
    echo "<a href='Contact-listing.php'>Back to Listing</a>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
     <!--Bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <!--My css-->
    <link rel="stylesheet" href="css/testimonials.css">
    <!--Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
<!--Icon-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
 <!--My css-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 <form action="edit.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="Your-Name">
            <label>Your Name</label>
            <input 
                type="text" 
                placeholder="Your Name" 
                name="name"
                value="<?php echo $data['name']; ?>"
                required
            >
        </div>
    </div>


    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="Your-Email">
            <label>Your Email</label>
            <input 
                type="email" 
                placeholder="Your Email" 
                name="email"
                value="<?php echo $data['email']; ?>"
                required
            >
        </div>
    </div>


    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="Your-Address">
            <label>Your Address</label>
            <input 
                type="text" 
                placeholder="Your Address" 
                name="address"
                value="<?php echo $data['address']; ?>"
            >
        </div>
    </div>


    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="Your-Phone">
            <label>Your Phone</label>
            <input 
                type="text" 
                placeholder="Your Phone" 
                name="phone"
                value="<?php echo $data['phone']; ?>"
                required
            >
        </div>
    </div>


    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

        <div class="Your-Message">
            <label>Your Message</label>

            <textarea 
                placeholder="Type Your Message" 
                rows="7" 
                name="message"
            ><?php echo $data['message']; ?></textarea>
        </div>


        <div class="Your-Message-btn">

            <button type="submit" name="update" value="1">
                Update
            </button>

        </div>

    </div>

</form>
</body>