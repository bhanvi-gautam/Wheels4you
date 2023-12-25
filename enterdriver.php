<!DOCTYPE html>
<html>
<?php 
include('session_client.php'); ?>
<head>
<?php
include('partials/header-files.php');
?>
<link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
</head>
<body>
 <!-- Navigation -->
 <?php include('partials/navbar.php'); ?>

    <div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form role="form" action="enterdriver1.php" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Enter Driver Details </h3>

          <div class="form-group">
            <input type="text" class="form-control" id="driver_name" name="driver_name" placeholder="Driver Name " required autofocus="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="dl_number" name="dl_number" placeholder="Driving License Number" required>
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="driver_phone" name="driver_phone" placeholder="Contact" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="driver_address" name="driver_address" placeholder="Address" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="driver_gender" name="driver_gender" placeholder="Gender" required>
          </div>

           <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right"> Add Driver</button>    
        </form>
      </div>
    </div>
    <div class="col-md-9" style="float: none; margin: 0 auto;">
    <div class="form-area" style="padding: 0px 100px 100px 100px;">
        <form action="" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> My Drivers </h3>
<?php
// Storing Session
$user_check=$_SESSION['login_client'];
$sql = "SELECT * FROM driver d WHERE d.client_username='$user_check' ORDER BY driver_name";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  ?>

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>     </th>
        <th> Name</th>
        <th> Gender </th>
        <th> License No. </th>
        <th> Contact </th>
        <th> Address </th>
        <th> Availability </th>
      </tr>
    </thead>

    <?PHP
      //OUTPUT DATA OF EACH ROW
      while($row = mysqli_fetch_assoc($result)){
    ?>

  <tbody>
    <tr>
      <td> <span class="glyphicon glyphicon-menu-right"></span> </td>
      <td><?php echo $row["driver_name"]; ?></td>
      <td><?php echo $row["driver_gender"]; ?></td>
      <td><?php echo $row["dl_number"]; ?></td>
      <td><?php echo $row["driver_phone"]; ?></td>
      <td><?php echo $row["driver_address"]; ?></td>
      <td><?php echo $row["driver_availability"]; ?></td>
      
    </tr>
  </tbody>
  
  <?php } ?>
  </table>
    <br>


  <?php } else { ?>

  <h4><center>0 Drivers available</center> </h4>

  <?php } ?>

        </form>

</div>        
        </div>
    </div>

</body>
<?php include('partials/footer.php'); ?>