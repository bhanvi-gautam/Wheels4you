<!DOCTYPE html>
<html>
<?php 
session_start(); 
require 'connection.php';
$conn = Connect();
?>
<head>
<?php
include('partials/header-files.php');
?>
<link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation -->
<?php include('partials/navbar.php'); ?>
<?php
function dateDiff($start, $end) {
    $start_ts = strtotime($start);
    $end_ts = strtotime($end);
    $diff = $end_ts - $start_ts;
    return round($diff / 86400);
}
 $id = $_GET["id"];
 $sql1 = "SELECT c.car_name, c.car_nameplate, rc.rent_start_date, rc.rent_end_date, rc.fare, rc.charge_type, d.driver_name, d.driver_phone
 FROM rentedcars rc, cars c, driver d
 WHERE id = '$id' AND c.car_id=rc.car_id AND d.driver_id = rc.driver_id";
 $result1 = $conn->query($sql1);
 if (mysqli_num_rows($result1) > 0) {
    while($row = mysqli_fetch_assoc($result1)) {
        $car_name = $row["car_name"];
        $car_nameplate = $row["car_nameplate"];
        $driver_name = $row["driver_name"];
        $driver_phone = $row["driver_phone"];
        $rent_start_date = $row["rent_start_date"];
        $rent_end_date = $row["rent_end_date"];
        $fare = $row["fare"];
        $charge_type = $row["charge_type"];
        $no_of_days = dateDiff("$rent_start_date", "$rent_end_date");
    }
}
?>
    <div class="container" style="margin-top: 65px;" >
    <div class="col-md-7" style="float: none; margin: 0 auto;">
      <div class="form-area">
        <form role="form" action="printbill.php?id=<?php echo $id ?>" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 5px; text-align: center; font-size: 30px;"> Journey Details </h3>
          <h6 style="margin-bottom: 25px; text-align: center; font-size: 12px;"> Allow your driver to fill the below form </h6>

           <h5> Car:&nbsp;  <?php echo($car_name);?></h5>

           <h5> Vehicle Number:&nbsp;  <?php echo($car_nameplate);?></h5>

           <h5> Seating Capacity:&nbsp;  <?php echo($seating_capacity);?></h5>

           <h5> Rent date:&nbsp;  <?php echo($rent_start_date);?></h5>

           <h5> End Date:&nbsp;  <?php echo($rent_end_date);?></h5>

           <h5> Fare:&nbsp;  Rs. <?php 
            if($charge_type == "days"){
                    echo ($fare . "/day");
                } else {
                    echo ($fare . "/km");
                }
            ?>
            </h5>

           <h5> Driver Name:&nbsp;  <?php echo($driver_name);?></h5>

           <h5> Driver Contact:&nbsp;  <?php echo($driver_phone);?></h5>
          <?php if($charge_type == "km") { ?>
          <div class="form-group">
            <input type="text" class="form-control" id="distance_or_days" name="distance_or_days" placeholder="Enter the distance travelled (in km)" required="" autofocus>
          </div>
          <?php }  else { ?>
            <h5> Number of Day(s):&nbsp;  <?php echo($no_of_days);?></h5>
            <input type="hidden" name="distance_or_days" value="<?php echo $no_of_days; ?>">
          <?php } ?>
          <input type="hidden" name="hid_fare" value="<?php echo $fare; ?>">

           <input type="submit" name="submit" value="submit" class="btn btn-success pull-right">    
        </form>
      </div>
    </div>
   
    </div>

</body>
<?php include('partials/footer.php'); ?>