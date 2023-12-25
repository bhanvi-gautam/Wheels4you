-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2023 at 04:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrentalphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(20) NOT NULL,
  `car_name` varchar(50) NOT NULL,
  `car_nameplate` varchar(50) NOT NULL,
  `seating_capacity` int(10) NOT NULL,
  `car_img` varchar(50) DEFAULT 'NA',
  `ac_price` float NOT NULL,
  `non_ac_price` float NOT NULL,
  `ac_price_per_day` float NOT NULL,
  `non_ac_price_per_day` float NOT NULL,
  `car_availability` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `car_nameplate`, `seating_capacity`, `car_img`, `ac_price`, `non_ac_price`, `ac_price_per_day`, `non_ac_price_per_day`, `car_availability`) VALUES
(2, 'Hyundai Creta', 'BA2CH2020', 5, 'assets/img/cars/creta.jpg', 22, 12, 2900, 1400, 'no'),
(4, 'Mercedes-Benz E-Class', 'BA10CH6009', 5, 'assets/img/cars/mcec.jpg', 45, 30, 7200, 5200, 'no'),
(10, 'Honda CR-V', 'TN17MS1997', 5, 'assets/img/cars/hondacr.jpg', 22, 15, 2850, 1400, 'yes'),
(11, 'Mahindra XUV 500', 'KA12EX1883', 7, 'assets/img/cars/Mahindra XUV.jpg', 15, 13, 3000, 2600, 'yes'),
(12, 'Toyota Fortuner', 'GA08MX1997', 7, 'assets/img/cars/Fortuner.png', 16, 14, 3200, 2800, 'yes'),
(13, 'Hyundai Veloster', 'BA20PA5685', 4, 'assets/img/cars/hyundai0.png', 23, 15, 4500, 3500, 'yes'),
(15, 'Audi A4', 'PB05AZ4326', 5, 'assets/img/cars/audi-A4-new.png', 33, 27, 5200, 2800, 'yes'),
(16, 'BMW 6-Series', 'DL54GH7685', 6, 'assets/img/cars/BMW6-series.png', 40, 30, 6999, 4999, 'yes'),
(17, 'Maruti Suzuki 800', 'CH05Z6432', 4, 'assets/img/cars/maruti.png', 40, 27, 4000, 2800, 'no'),
(18, 'Ford EcoSports', 'MH03V6513', 5, 'assets/img/cars/fordEcoSports.png', 67, 56, 5200, 3000, 'yes'),
(19, 'Honda Amaze', 'DL56AS7896', 5, 'assets/img/cars/honda-amaze.png', 14, 12, 2800, 2400, 'yes'),
(20, 'JaguarXF', 'PB09AG4339', 5, 'assets/img/cars/JaguarXF.png', 39, 29, 7999, 6999, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `clientcars`
--

CREATE TABLE `clientcars` (
  `car_id` int(20) NOT NULL,
  `client_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `clientcars`
--

INSERT INTO `clientcars` (`car_id`, `client_username`) VALUES
(17, 'admin3'),
(18, 'admin3'),
(19, 'admin3'),
(20, 'admin3'),
(11, 'harry'),
(12, 'harry'),
(15, 'harry'),
(16, 'harry'),
(2, 'jenny'),
(4, 'jenny'),
(10, 'jenny'),
(13, 'jenny');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_username` varchar(50) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `client_phone` varchar(15) NOT NULL,
  `client_email` varchar(25) NOT NULL,
  `client_address` varchar(50) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `client_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_username`, `client_name`, `client_phone`, `client_email`, `client_address`, `client_password`) VALUES
('admin3', 'adimn', '3241434234', 'admin3@gmail.com', 'mumbai maharashtra', '@admin345'),
('harry', 'Harry Den', '9876543210', 'harryden@gmail.com', '2477  Harley Vincent Drive', 'password'),
('jenny', 'Jeniffer Washington', '7850000069', 'washjeni@gmail.com', '4139  Mesa Drive', 'jenny'),
('tom', 'Tommy Doee', '900696969', 'tom@gmail.com', '4645  Dawson Drive', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_username` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_email` varchar(25) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `customer_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_username`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_password`) VALUES
('antonio', 'Antonio M', '0785556580', 'antony@gmail.com', '2677  Burton Avenue', 'password'),
('christine', 'Christine', '8544444444', 'chr@gmail.com', '3701  Fairway Drive', 'password'),
('ethan', 'Ethan Hawk', '69741111110', 'thisisethan@gmail.com', '4554  Rowes Lane', 'password'),
('james', 'James Washington', '0258786969', 'james@gmail.com', '2316  Mayo Street', 'password'),
('kishan', 'ravi shastri', '8847670118', 'gautam.bhargav02@gmail.co', 'Phase 6,Mohali', 'cycle20'),
('lucas', 'Lucas Rhoades', '7003658500', 'lucas@gmail.com', '2737  Fowler Avenue', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(20) NOT NULL,
  `driver_name` varchar(50) NOT NULL,
  `dl_number` varchar(50) NOT NULL,
  `driver_phone` varchar(15) NOT NULL,
  `driver_address` varchar(50) NOT NULL,
  `driver_gender` varchar(10) NOT NULL,
  `client_username` varchar(50) NOT NULL,
  `driver_availability` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_name`, `dl_number`, `driver_phone`, `driver_address`, `driver_gender`, `client_username`, `driver_availability`) VALUES
(1, 'Bruno Den', '27840218658 ', '9547863157', '1782  Vineyard Drive', 'Male', 'harry', 'no'),
(2, 'Will Williams', '03191563155 ', '9147523684', '4354  Hillcrest Drive', 'Male', 'harry', 'no'),
(3, 'Steeve Rogers', '32346288078 ', '9147523682', '1506  Skinner Hollow Road', 'Male', 'harry', 'yes'),
(4, 'Ivy', '04316015965 ', '9187563240', '4680  Wayside Lane', 'Female', 'jenny', 'yes'),
(5, 'Pamela C Benson', '68799466631 ', '7584960123', 'Urkey Pen Road', 'Female', 'jenny', 'yes'),
(6, 'Billy Williams', '36740186040 ', '8421025476', '2898  Oxford Court', 'Male', 'tom', 'yes'),
(7, 'Nicolas', '44919316260 ', '7541023695', 'Breezewood Court', 'Male', 'harry', 'yes'),
(8, 'Stephen Strange', '94592817723', '5215557850', 'Fairview Street12', 'Male', 'jenny', 'yes'),
(9, 'John Doe', '3423452323', '9643523423', 'cornelia street', 'Male', 'admin3', 'no'),
(10, 'Oliver Woods', '32554422', '12345654321', 'north street', 'male', 'admin3', 'yes'),
(11, 'Emily Rivers', '34423451', '6543632153', 'west avenue', 'female', 'admin3', 'yes'),
(12, 'Priya Malhotra', '56432123', '6574843235', 'missamari assam', 'female', 'admin3', 'yes'),
(13, 'Ishita Nagpal', '675532345', '7859563452', 'Jaipur ', 'Female', 'admin3', 'yes'),
(14, 'ishaan Srivastav', '4325676', '9786958322', 'Bareilly', 'Male', 'admin3', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(20) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentedcars`
--

CREATE TABLE `rentedcars` (
  `id` int(100) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `car_id` int(20) NOT NULL,
  `driver_id` int(20) NOT NULL,
  `booking_date` date NOT NULL,
  `rent_start_date` date NOT NULL,
  `rent_end_date` date NOT NULL,
  `car_return_date` date DEFAULT NULL,
  `fare` double NOT NULL,
  `charge_type` varchar(25) NOT NULL DEFAULT 'days',
  `distance` double DEFAULT NULL,
  `no_of_days` int(50) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `return_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rentedcars`
--

INSERT INTO `rentedcars` (`id`, `customer_username`, `car_id`, `driver_id`, `booking_date`, `rent_start_date`, `rent_end_date`, `car_return_date`, `fare`, `charge_type`, `distance`, `no_of_days`, `total_amount`, `return_status`) VALUES
(574681245, 'ethan', 4, 2, '2023-12-22', '2023-12-23', '2023-12-24', '2023-12-24', 11, 'km', 244, 1, 5884, 'R'),
(574681251, 'james', 10, 1, '2023-12-23', '2023-12-25', '2023-12-30', '2023-12-31', 10, 'km', 30, 5, 600, 'R'),
(574681252, 'christine', 11, 2, '2023-12-25', '2023-12-28', '2023-12-31', '2024-01-01', 13, 'km', 568, 4, 2600, 'R'),
(574681254, 'ethan', 12, 5, '2023-12-23', '2024-01-04', '2024-01-06', NULL, 3200, 'days', NULL, 3, 9600, 'NR'),
(574681261, 'lucas', 2, 8, '2023-12-23', '2023-12-23', '2023-12-27', '2023-12-28', 2900, 'days', 568, 5, 3560, 'R'),
(574681265, 'kishan', 17, 9, '2023-12-24', '2023-12-24', '2024-01-06', NULL, 40, 'km', NULL, NULL, NULL, 'NR'),
(574681266, 'kishan', 17, 9, '2023-12-24', '2023-12-24', '2024-01-06', NULL, 40, 'km', NULL, NULL, NULL, 'NR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD UNIQUE KEY `car_nameplate` (`car_nameplate`);

--
-- Indexes for table `clientcars`
--
ALTER TABLE `clientcars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `client_username` (`client_username`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_username`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_username`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`),
  ADD UNIQUE KEY `dl_number` (`dl_number`),
  ADD KEY `client_username` (`client_username`);

--
-- Indexes for table `rentedcars`
--
ALTER TABLE `rentedcars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_username` (`customer_username`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rentedcars`
--
ALTER TABLE `rentedcars`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=574681268;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientcars`
--
ALTER TABLE `clientcars`
  ADD CONSTRAINT `clientcars_ibfk_1` FOREIGN KEY (`client_username`) REFERENCES `clients` (`client_username`),
  ADD CONSTRAINT `clientcars_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`);

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`client_username`) REFERENCES `clients` (`client_username`);

--
-- Constraints for table `rentedcars`
--
ALTER TABLE `rentedcars`
  ADD CONSTRAINT `rentedcars_ibfk_1` FOREIGN KEY (`customer_username`) REFERENCES `customers` (`customer_username`),
  ADD CONSTRAINT `rentedcars_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`),
  ADD CONSTRAINT `rentedcars_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
