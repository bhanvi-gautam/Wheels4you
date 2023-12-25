<html>

  <head>
    <title> Customer Signup | Wheels4you </title>
  </head>
  <?php session_start(); ?>
  <link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/w3css/w3.css">
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

  <body>
    <!-- Navigation -->
    <?php include('partials/navbar.php'); ?>

<?php

require 'connection.php';
$conn = Connect();

$driver_name = $conn->real_escape_string($_POST['driver_name']);
$dl_number = $conn->real_escape_string($_POST['dl_number']);
$driver_phone = $conn->real_escape_string($_POST['driver_phone']);
$driver_address = $conn->real_escape_string($_POST['driver_address']);
$driver_gender = $conn->real_escape_string($_POST['driver_gender']);
$client_username = $_SESSION['login_client'];
$driver_availability = "yes";

$query = "INSERT into driver(driver_name,dl_number,driver_phone,driver_address,driver_gender,client_username,driver_availability) VALUES('" . $driver_name . "','" . $dl_number . "','" . $driver_phone . "','" . $driver_address . "','" . $driver_gender ."','" . $client_username ."','" . $driver_availability ."')";
$success = $conn->query($query);

if (!$success){ ?>
    <div class="container">
	<div class="jumbotron" style="text-align: center;">
        Car with the same vehicle number already exists!
        <br><br>
        <a href="entercar.php" class="btn btn-default"> Go Back </a>
</div>
<?php	
}
else {
    header("location: enterdriver.php"); //Redirecting 
}

$conn->close();

?>

    </body>
    <?php include('partials/footer.php'); ?>