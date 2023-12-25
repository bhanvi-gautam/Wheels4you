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
<title>Car Rentals</title>
</head>

<body>
    <?php 
    $name = $conn->real_escape_string($_POST['name']);
    $e_mail = $conn->real_escape_string($_POST['e_mail']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO feedback values ('" . $name . "','" . $e_mail ."','" . $message ."')";
    $success = $conn->query($sql);


    if(!$success) {
        echo $conn->error;
    }
    else { ?>
        <div class="container">
        <div class="jumbotron" style="text-align: center;">
            Thank you for your feedback!    
            <br><br>
            <a href="index.php" class="btn btn-default"> Go Back </a>
    </div>
     <?php
    }
?>
    </body>
<?php include('partials/footer.php'); ?>