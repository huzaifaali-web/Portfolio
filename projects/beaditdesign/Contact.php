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
    <section class="section-top">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                     <div class="cont1">
                       <a href="#"><i class="fa-solid fa-envelopes-bulk"></i>keemajum@gmail.com</a>   
                       <a href="#"><i class="fa-solid fa-phone"></i>+123-456-7890</a>
                       <a href="#"><i class="fa-solid fa-location-crosshairs"></i>Lorem ipsum dolor sit amet.</a>
                    </div>
                </div>
               
               
                 <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                     <div class="icons">
                      <a href="#"> <i class="fa-brands fa-facebook-f"></i></a>
                      <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                       <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                       <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>

            </div>
        </div>

    </section>
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
                            <a href="index.html"><li>Home</li></a>
                            <a href="About.html"><li>About</li></a>
                            <a href="product.html"><li>shop</li></a>
                            <a href="testimonials.html"><li>Testimonials</li></a>
                            <a href="Contact.html"><li>Contact Us</li></a>
                        </ul>
                    </div>

                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                    <div class="icons2">
                        <img src="images/search-8931.png" alt="" class="icon-img">
                        <img src="Images/avator.png" alt="" class="icon-img">
                        <img src="Images/cart (2).png" alt="" class="icon-img">
                    </div>
                </div>

            </div>
        </div>
    </header>
    <section class="Contactus-section">
        <div class="container">
            <div class="row">
                  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                 <div class="Contact-us">
                    <h1>Contact Us</h1>
                     <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt 
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                        laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed do eiusmod tempor incididunt 
                  
                      
                    </p>
                 </div>
                </div>
            </div>
        </div>

    </section>
   <section class="Card-section">
    <div class="container">
        <div class="row">
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                <div class="box-inf">
                   <span> <img src="Images/map.png" alt="" class="map"></span>
                    <h5>Location</h5>
                    <p> Lorem ipsum dolor sit amet,</p>

                </div>
            </div>
             <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                <div class="box-inf">
                   <span> <img src="Images/telephone-call.png" alt="" class="Phone"></span>
                    <h5>Call us</h5>
                    <p> +123-456-7890</p>

                </div>
            </div>
             <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                <div class="box-inf">
                   <span> <img src="Images/email.png" alt="" class="email"></span>
                    <h5>Email us</h5>
                    <p> example@info.com</p>

                </div>
            </div>
             <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                <div class="box-inf">
                   <span> <img src="Images/email.png" alt="" class="time"></span>
                    <h5>Timing</h5>
                    <p>Mon – Fri 9:00am – 6:00pm </p>

                </div>
            </div>

<div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-7 col-7">
        <div class="row contact-form">
        <form action="admin2/actions2/contact-submission.php" method="post">
            <?php if (isset($_GET['success'])) { ?>
            <label class="alert alert-success"><?php echo $_GET["success"]; ?></label>
            <?php } elseif(isset($_GET['error'])){ ?>
            <label class="alert alert-danger"><?php echo $_GET ['error']; ?></label>
            <?php }?>
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="Your-Name">
            <label >your Name</label>
            <input type="text" name="name" placeholder="Your Name" required>
            </div>
        </div>
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="Your-Email">
            <LABel>your email</LABel>
            <input type="email" name="email" placeholder="Your Eame" required>
            </div>
        </div>
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="Your-Address">
            <label>your address</label>
            <input type="text" name="address" placeholder="your name">
        </div>
        </div>
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
            <div class="Your-Phone">
            <label>Your Phone</label>
            <input type="text" name="phone" placeholder="Your Phone" required>
            </div>
        </div>
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="Your-Message">
                <label>Your-Message</label>
                <textarea placeholder="Type Your Message" name="message" rows="7" ></textarea>
            </div>
            <div  class="Your-Message-btn">
                <button type="submit" name="submit" value="1">Submit</button>
            </div>
        </div>
         
</form>
        </div>
</div>
        
 
    <div class="col-xxl-5 col-xl-5 col-lg-7 col-md-7 col-sm-7 col-7">
        <img src="Images/maps.jpg" alt="" class="map-img">

    </div>
    </div> 
</div>
<section class="Parent6">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 p-0" >
                <img src="images/smallcard1.jpg" alt="" class="card1">
            </div>
              <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 p-0">
                <img src="images/smallcard2.jpg" alt="" class="card1">
            </div>
              <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 p-0">
                <img src="images/smallcard3.jpg" alt="" class="card1">
            </div>
              <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 p-0">
                <img src="images/smallcard4.jpg" alt="" class="card1">
            </div>
              <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 p-0">
                <img src="images/smallcard5.jpg" alt="" class="card1">
            </div>
             <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 p-0">
                <img src="images/smallcard6.jpg" alt="" class="card1">
            </div>
            
        </div>
    </div>
</section>
<footer class="Parent7">
    <div class="container">
        <div class="row">
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <div class="cont8">
                    <h3><span>Bead It</span>Design by JC.</h3>
                </div>
                <div class="icons3">
                  <a href="#"> <i class="fa-brands fa-facebook-f"></i></a>
                  <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                   <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                   <a href="#"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
             <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <div class="links">
                    <h5><span>Quick</span> Links</h5>
                <ul class="quick-links">
                   <li><a href="">Home</a></li> 
                    <li><a href="">About</a></li> 
                    <li><a href="">Shop</a></li> 
                    <li><a href="">Testimonials</a></li>
                     <li> <a href="">Contact us </a></li>
                </ul>
                    </div> 
                    </div> 
              
             <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <div class="links2">
                    <h5><span>Contact</span>  us</h5>
                     <a href="#"><i class="fa-solid fa-envelopes-bulk"></i>keemajum@gmail.com</a>   
                   <a href="#"><i class="fa-solid fa-phone"></i>+123-456-7890</a>
                   <a href="#"><i class="fa-solid fa-location-crosshairs"></i>Lorem ipsum dolor sit amet.</a>
                </div>
             </div>

        </div>
       
    </div>
    <div class="container-fluid p-0 footer-bottom">
        <div class="container">
            <div class="row">
               <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="section-end">
                    <p>Copyright 2025 All Rights Deserved</p>
                </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                <div class="section-end-img text-end">
                    <img src="images/CREDITCARD.png" alt="">
                </div> 
                </div>   
                
            </div>
        </div>
    </div>
</footer>
        
</body>
</html>