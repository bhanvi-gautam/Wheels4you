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
        <form role="form" action="entercar1.php" enctype="multipart/form-data" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Please Provide Your Car Details. </h3>

          <div class="form-group">
            <input type="text" class="form-control" id="car_name" name="car_name" placeholder="Car Name " required autofocus="">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="car_nameplate" name="car_nameplate" placeholder="Vehicle Number Plate" required>
          </div>     

          <div class="form-group">
            <input type="text" class="form-control" id="ac_price" name="ac_price" placeholder="AC Fare per KM (Rs)" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="non_ac_price" name="non_ac_price" placeholder="Non-AC Fare per KM (Rs)" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="ac_price_per_day" name="ac_price_per_day" placeholder="AC Fare per day (Rs)" required>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="non_ac_price_per_day" name="non_ac_price_per_day" placeholder="Non-AC Fare per day (Rs)" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="seating_capacity" name="seating_capacity" placeholder="Seating Capacity" required>
          </div>

          <div class="form-group">
            <input name="uploadedimage" type="file">
          </div>
           <button type="submit" id="submit" name="submit" class="btn btn-success pull-right"> Submit for Rental</button>    
        </form>
      </div>
    </div>


        <div class="col-md-12" style="float: none; margin: 0 auto;">
    <div class="form-area" style="padding: 0px 100px 100px 100px;">
        <form action="" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> My Cars </h3>
<?php
// Storing Session
$user_check=$_SESSION['login_client'];
$sql = "SELECT * FROM cars WHERE car_id IN (SELECT car_id FROM clientcars WHERE client_username='$user_check');";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  ?>
<div style="overflow-x:auto;">
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th></th>
        <th width="24%"> Name</th>
        <th width="15%"> Nameplate </th>
        <th width="13%"> AC Fare (/km) </th>
        <th width="17%"> Non-AC Fare (/km)</th>
        <th width="13%"> AC Fare (/day)</th>
        <th width="17%"> Non-AC Fare (/day)</th>
        <th width="12%"> Availability </th>
        <th width="11%"> Seating Capacity </th>
      </tr>
    </thead>

    <?PHP
      //OUTPUT DATA OF EACH ROW
      while($row = mysqli_fetch_assoc($result)){
    ?>

  <tbody>
    <tr>
      <td> <span class="glyphicon glyphicon-menu-right"></span> </td>
      <td><?php echo $row["car_name"]; ?></td>
      <td><?php echo $row["car_nameplate"]; ?></td>
      <td><?php echo $row["ac_price"]; ?></td>
      <td><?php echo $row["non_ac_price"]; ?></td>
      <td><?php echo $row["ac_price_per_day"]; ?></td>
      <td><?php echo $row["non_ac_price_per_day"]; ?></td>
      <td><?php echo $row["car_availability"]; ?></td>
      <td><?php echo $row["seating_capacity"]; ?></td>
      
    </tr>
  </tbody>
  <?php } ?>
  </table>
  </div>
    <br>
  <?php } else { ?>
  <h4><center>0 Cars available</center> </h4>
  <?php } ?>
        </form>
</div>        
        </div>
    </div>
</body>

<?php include('partials/footer.php'); ?>
