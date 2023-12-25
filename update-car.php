<?php
session_start();
require 'connection.php';
$conn = Connect();

// $car_name = $car_img = '';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql2 = "SELECT * FROM cars WHERE car_id=$id";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);

    $car_name = $row2['car_name'];
    $car_nameplate = $row2['car_nameplate'];
    $seating_capacity = $row2['seating_capacity'];
    $car_img = $row2['car_img'];
    $ac_price = $row2["ac_price"];
    $ac_price_per_day = $row2["ac_price_per_day"];
    $non_ac_price = $row2["non_ac_price"];
    $non_ac_price_per_day = $row2["non_ac_price_per_day"];
    $available=$row2['car_availability'];

    echo $car_img;
}
if(isset($_POST['submit']))
{
    $car_name=isset($_POST['name']) ? $_POST['name']:$car_name;
    $car_nameplate=isset($_POST['nameplate']) ? $_POST['nameplate']: $car_nameplate;
    $seating_capacity=isset($_POST['capacity']) ? $_POST['capacity'] : $seating_capacity;
    // $car_img1 = isset($_FILES['image']['name']) ? "assets/img/cars/" . $_FILES['image']['name'] : $car_img;
    $car_img1=$car_img;
    // $car_img=isset($_POST['car_img']) ? $_POST['car_img'] : $car_img;
    $ac_price =isset($_POST['ac_price']) ? $_POST["ac_price"] : $ac_price;
    $ac_price_per_day =isset($_POST['ac_price_per_day']) ? $_POST["ac_price_per_day"]: $ac_price_per_day;
    $non_ac_price =isset($_POST['non_ac_price']) ? $_POST["non_ac_price"] : $non_ac_price;
    $non_ac_price_per_day =isset($_POST['non_ac_price_per_day']) ? $_POST["non_ac_price_per_day"] : $non_ac_price_per_day;
    $available=isset($_POST['available']) ? $_POST['available'] : $available;
    echo $car_img1;
    if(isset($_FILES['image']['name'])){
        $image_name=$_FILES['image']['name'];
        if($image_name!=""){
            $src_path=$_FILES['image']['tmp_name'];
            $dest_path="assets/img/cars/".$image_name;
            $upload=move_uploaded_file($src_path,$dest_path);
            echo "not empty".$car_img;
            if($upload==false){

                header('location:update-car.php');
                die();
                // $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";

                
            }
            else{

                $car_img1 = $dest_path;
                echo "empty".$car_img;
                if(!empty($row2['car_img'])) {
                    $remove_path = $row2['car_img'];
                    $remove = unlink($remove_path);
                    if($remove == false) {
                        echo "<div class='error'>Failed to remove the current image</div>";
                    }
                }
            }
            // if($car_img!=""){
                       
            //     $remove_path=$car_img;

            //     $remove=unlink($remove_path);
            //     if($remove==false){
            //         echo "<div class='error'>Failed to remove current image</div>";
                    
            //         // header('location:update-car.php');
            //         // die();
            //         // // $_SESSION['remove-failed']="<div class='error'>Failed to remove current image</div>";

               
            //     }
            // }
        }
        else{
            echo "<div class='error'>Failed to Upload Image.</div>";
            // $image_name=$car_img;
        }
    }
    $sql3="UPDATE cars SET car_name='{$car_name}',car_nameplate='{$car_nameplate}',seating_capacity='{$seating_capacity}',car_img='{$car_img1}',ac_price='{$ac_price}',ac_price_per_day='{$ac_price_per_day}',non_ac_price='{$non_ac_price}',non_ac_price_per_day='{$non_ac_price_per_day}' where car_id='{$id}'";
    $res3=mysqli_query($conn,$sql3);
    echo "after sql3".$car_img1;
    if($res3){
        header('Location:viewavailablecars.php');
        die();
        // $_SESSION['update']="<div class='success'>Car Updated Successfully</div>";

    }
    else{
        header('Location:update-car.php');
        die();
        // $_SESSION['updated']="<div class='error'>Failed to update Car</div>";

    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheels4you</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<nav class="navbar navbar-custom" role="navigation" style="color: white; background-color:black; padding:1px 0 ;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                    </button>
                <a class="navbar-brand page-scroll" href="index.php">
                Wheels4you </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
<?php
                if(isset($_SESSION['login_client'])){
            ?> 
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_client']; ?></a>
                    </li>
                    <li>
                    <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Control Panel <span class="caret"></span> </a>
                <ul class="dropdown-menu" style="background-color: black ;color:white">
              <li> <a href="entercar.php">Add Car</a></li>
              <li> <a href="enterdriver.php"> Add Driver</a></li>
              <li> <a href="viewavailablecars.php"> View Available Cars</a></li>
              <li> <a href="clientview.php">View Cars Booked</a></li>

            </ul>
            </li>
          </ul>
                    </li>
                    <li>
                        <a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </div>
            
            <?php
                }
                ?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <br>
    <div class="container ">
    <h1 class="text-center"> Update Car Details</h1><br><br>
    <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Car Name:</td>
                <td>
                    <input type="text" name="name" value="<?php echo $car_name;?>">
                </td>
            </tr>
            <tr>
                <td>Car Nameplate:</td>
                <td>
                    <input type="text" name="nameplate" value="<?php echo $car_nameplate;?>">
                </td>
            </tr>
            <tr>
                <td>Seating Capacity:</td>
                <td>
                    <input type="text" name="capacity" value="<?php echo $seating_capacity;?>">
                </td>
            </tr>
            <tr>
                <td>AC price:</td>
                <td>
                    <input type="text" name="ac_price" value="<?php echo $ac_price;?>">
                </td>
            </tr>
            <tr>
                <td>AC Price Per Day:</td>
                <td>
                    <input type="text" name="ac_price_per_day" value="<?php echo $ac_price_per_day;?>">
                </td>
            </tr>
            <tr>
                <td>Non-AC price:</td>
                <td>
                    <input type="text" name="non_ac_price" value="<?php echo $non_ac_price;?>">
                </td>
            </tr>
            <tr>
                    <td>Available: </td>
                    <td>
                        <input <?php if($available=="Yes"){echo 'checked';}?> type="radio" name="available" value="Yes">Yes
                        <input <?php if($available=="No"){echo 'checked';}?> type="radio" name="available" value="No">No
                    </td>
                </tr>
            <tr>
                <td>Non-AC Price Per Day:</td>
                <td>
                    <input type="text" name="non_ac_price_per_day" value="<?php echo $non_ac_price_per_day;?>">
                </td>
            </tr>
            <tr>
                    <td>Current Image: </td>
                    <td>
                    <?php 
                            if($car_img!=''){
                                ?>
                            <img src="<?php echo $car_img;?>" width="100px">

                                <?php
                            }
                            else{
                                echo "<div class='error'>Image Not Added</div>";
                            }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image" >
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    
                        <input type="hidden" name="id" value="<?php echo $id;?>">

                    <input type="submit" name="submit" value=" Update Car " class="btn-secondary">
                </td>
                </tr>
                
    </form>
</div>
<script>
        function myMap() {
            myCenter = new google.maps.LatLng(25.614744, 85.128489);
            var mapOptions = {
                center: myCenter,
                zoom: 12,
                scrollwheel: true,
                draggable: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

            var marker = new google.maps.Marker({
                position: myCenter,
            });
            marker.setMap(map);
        }
    </script>
    <script>
        function sendGaEvent(category, action, label) {
            ga('send', {
                hitType: 'event',
                eventCategory: category,
                eventAction: action,
                eventLabel: label
            });
        };
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCuoe93lQkgRaC7FB8fMOr_g1dmMRwKng&callback=myMap" type="text/javascript"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="assets/js/jquery.easing.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="assets/js/theme.js"></script>
</body>
<?php
mysqli_close($conn);
?>

</html>

