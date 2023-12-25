<html>

  <head>
    <title> Customer Signup | Wheels4you </title>
  </head>
  <?php session_start(); ?>
  <?php
include('partials/header-files.php');
?>
     <link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">
   <script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

  <body>
    <!-- Navigation -->
    <?php include('partials/navbar.php'); ?>

<?php

require 'connection.php';
$conn = Connect();

function GetImageExtension($imagetype) {
    if(empty($imagetype)) return false;
    
    switch($imagetype) {
        case 'assets/img/cars/bmp': return '.bmp';
        case 'assets/img/cars/gif': return '.gif';
        case 'assets/img/cars/jpeg': return '.jpg';
        case 'assets/img/cars/png': return '.png';
        default: return false;
    }
}

$car_name = $conn->real_escape_string($_POST['car_name']);
$car_nameplate = $conn->real_escape_string($_POST['car_nameplate']);
$ac_price = $conn->real_escape_string($_POST['ac_price']);
$non_ac_price = $conn->real_escape_string($_POST['non_ac_price']);
$ac_price_per_day = $conn->real_escape_string($_POST['ac_price_per_day']);
$non_ac_price_per_day = $conn->real_escape_string($_POST['non_ac_price_per_day']);
$seating_capacity= $conn->real_escape_string($_POST['seating_capacity']);
$car_availability = "yes";

//$query = "INSERT into cars(car_name,car_nameplate,ac_price,non_ac_price,car_availability) VALUES('" . $car_name . "','" . $car_nameplate . "','" . $ac_price . "','" . $non_ac_price . "','" . $car_availability ."')";
//$success = $conn->query($query);


if (!empty($_FILES["uploadedimage"]["name"])) {
    $file_name=$_FILES["uploadedimage"]["name"];
    $temp_name=$_FILES["uploadedimage"]["tmp_name"];
    $imgtype=$_FILES["uploadedimage"]["type"];
    $ext= GetImageExtension($imgtype);
    $imagename=$_FILES["uploadedimage"]["name"];
    $target_path = "assets/img/cars/".$imagename;

    if(move_uploaded_file($temp_name, $target_path)) {
        //$query0="INSERT into cars (car_img) VALUES ('".$target_path."')";
      //  $query0 = "UPDATE cars SET car_img = '$target_path' WHERE ";
        //$success0 = $conn->query($query0);

        $query = "INSERT into cars(car_name,car_nameplate,car_img,ac_price,non_ac_price,ac_price_per_day,non_ac_price_per_day,car_availability,seating_capacity) VALUES('" . $car_name . "','" . $car_nameplate . "','".$target_path."','" . $ac_price . "','" . $non_ac_price . "','" . $ac_price_per_day . "','" . $non_ac_price_per_day . "','" . $car_availability ."','" . $seating_capacity ."')";
        $success = $conn->query($query);

        
    } 

}
  else {
    // If no image is uploaded, use a default/demo image path
    $defaultImagePath = "assets/img/demo.png";
    $target_path = "assets/img/cars/demo.png";
    $target_directory = dirname($target_path);
    if (!is_dir($target_directory)) {
        mkdir($target_directory, 0755, true);
    }
    if (copy($defaultImagePath, $target_path)) {
      $query = "INSERT into cars(car_name,car_nameplate,car_img,ac_price,non_ac_price,ac_price_per_day,non_ac_price_per_day,car_availability,seating_capacity) VALUES('" . $car_name . "','" . $car_nameplate . "','" . $target_path . "','" . $ac_price . "','" . $non_ac_price . "','" . $ac_price_per_day . "','" . $non_ac_price_per_day . "','" . $car_availability . "','" . $seating_capacity . "')";
      $success = $conn->query($query);
    }
    else{
      echo "Error copying default image to destination directory.";
    }
}



// Taking car_id from cars

$query1 = "SELECT car_id from cars where car_nameplate = '$car_nameplate'";

$result = mysqli_query($conn, $query1);
$rs = mysqli_fetch_array($result, MYSQLI_BOTH);
$car_id = $rs['car_id'];
 

$query2 = "INSERT into clientcars(car_id,client_username) values('" . $car_id ."','" . $_SESSION['login_client'] . "')";
$success2 = $conn->query($query2);

if (!$success){ ?>
    <div class="container">
	<div class="jumbotron" style="text-align: center;">
        Car with the same vehicle number already exists!
        <?php echo $conn->error; ?>
        <br><br>
        <a href="entercar.php" class="btn btn-default"> Go Back </a>
</div>
<?php	
}
else {
    header("location: entercar.php"); //Redirecting 
}

$conn->close();

?>

    </body>
    <?php include('partials/navbar.php'); ?>