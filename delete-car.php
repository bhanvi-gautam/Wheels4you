<?php
session_start();
require 'connection.php';
$conn = Connect();

if (isset($_GET['id'])) {
    $car_id = $conn->real_escape_string($_GET['id']);

    // Step 1: Delete related rows in the clientcars table
    $deleteClientCars = "DELETE FROM clientcars WHERE car_id = ?";
    $stmtClientCars = $conn->prepare($deleteClientCars);
    $stmtClientCars->bind_param("i", $car_id);
    $resultClientCars = $stmtClientCars->execute();
    $stmtClientCars->close();

    if ($resultClientCars) {
        // Step 2: Now delete the car from the cars table
        $deleteRentedCars = "DELETE FROM rentedcars WHERE car_id = ?";
        $stmtRentedCars = $conn->prepare($deleteRentedCars);
        $stmtRentedCars->bind_param("i", $car_id);
        $resultRentedCars = $stmtRentedCars->execute();
        $stmtRentedCars->close();

        if ($resultRentedCars) {
            $deleteCar = "DELETE FROM cars WHERE car_id = ?";
            $stmtCar = $conn->prepare($deleteCar);
            $stmtCar->bind_param("i", $car_id);
            $resultCar = $stmtCar->execute();
            $stmtCar->close();

            if ($resultCar) {
                $_SESSION['delete'] = "<div class='success'>Car Deleted Successfully</div>";
            } else {
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Car. Try Again Later.</div>";
        }
    } else {
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Related Rented Cars. Try Again Later.</div>";
    }

    header('location: viewavailablecars.php');
} else {
    $_SESSION['delete'] = "<div class='error'>Car ID not set. Try Again Later.</div>";
    header('location: viewavailablecars.php');
}
}
?>
