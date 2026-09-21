<?php
include("../../include/header.php");
?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
<?php
include("../../include/sidebar.php")
?>
 
 <?php

include("../../include/connection.php");

$con = new DBconnection();

$id = $_GET['id'];

$sql = "SELECT * FROM `contact_form` WHERE `id` = $id";

$result = $con->connection->query($sql);

$data = $result->fetch_assoc();

?>

    <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Default form</h4>
                    <p class="card-description"> Basic form layout </p>
                   <form class="forms-sample" action="../../include/editform.php" method="POST">

                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                      <div class="form-group">
                        <label> name</label >
                        <input type="text" class="form-control" name="name" placeholder="name" value="<?php echo $data['name']; ?>"
                                    required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $data['email']; ?>"
                                    required>
                      </div>
                      <div class="form-group">
                        <label> Address</label>
                        <input
                        type="text"
                        class="form-control"
                        name="address"
                         placeholder="Address"
                         value="<?php echo $data['address']; ?>"
>
                      </div>
                      <div class="form-group">
                        <label >Your Phone</label>
                        <input  class="form-control"name="phone" placeholder="Password"   value="<?php echo $data['phone']; ?>"
                                    required
                                >
                      </div>
                      <div class="form-message">
                        <label>Message</label>
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

                      
                    </form>
                  </div>
                </div>
              </div>
      

<?php
include("../../include/footer.php")
?>
      