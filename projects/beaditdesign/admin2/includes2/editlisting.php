<!-- <?php
$servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "myfirstdb";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
    }
$id = $_GET['id'];
$sql = "SELECT * FROM `contact_form` where `id` = $id";
$result = $conn->query($sql);
 $data = [];
if ($result-> num_rows > 0){
   // Output datare of each now
   while ($row = $result->fetch_assoc()){
   $data =$row;
    
   } 
} 
?>-->
<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "myfirstdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM contact_form WHERE id = $id";

    $result = $conn->query($sql);

    $data = [];

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    }

} else {
    die("ID nsot found");
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
<form action="editform.php" method="POST">   
 <input type="hidden" name="id" value="<?php echo $data['id']; ?>">   
<div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
        <div class="row contact-form">
    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="Your-Name">
        <label >your Name</label>
        <input type="text" placeholder="Your Name" name ="Your_name"  value="<?php echo $data ['Your_name']?>">
        </div>
    </div>
    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="Your-Email">
        <LABel>your email</LABel>
        <input type="text" placeholder="Your Eame" name ="Your_email" value="<?php echo $data ['Your_email']?>">
        </div>
    </div>
    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="Your-Address">
        <label>your address</label>
        <input type="text" placeholder="your name" name ="Your_address" value="<?php echo $data ['Your_address']?>">
    </div>
    </div>
    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="Your-Phone">
        <label>Your Phone</label>
        <input type="text" placeholder="Your Phone" name ="Your_phone" value="<?php echo $data ['Your_phone']?>">
        </div>
    </div>
    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="Your-Message">
            <label>Your-Message</label>
            <!-- <textarea placeholder="Type Your Message"  rows="7" name = "Your_message">value="<?php echo $data ['Your_message']?>"</textarea> -->
            <textarea name="Your_message" rows="7"><?php echo $data['Your_message']; ?></textarea>
        </div>
        <div  class="Your-Message-btn">
            <input type="submit" value = "Update" >
            <!-- <button type="button" class="btn btn-primary">Primary</button> -->
        </div>
    </div>
     
   
     </div>
     </form>   
</body>