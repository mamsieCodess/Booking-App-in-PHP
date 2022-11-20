-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2022 at 07:35 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_no` int(11) NOT NULL,
  `customerId` varchar(255) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `checkIn` date NOT NULL,
  `checkOut` date NOT NULL,
  `total_cost` int(11) NOT NULL,
  `completed` varchar(3) NOT NULL DEFAULT 'no',
  `cancelled` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_no`, `customerId`, `hotel_id`, `checkIn`, `checkOut`, `total_cost`, `completed`, `cancelled`) VALUES
(1, 'cus00Mamo', 3, '2022-11-20', '2022-11-23', 1734, 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'May', 'Moloi', 'mamz@gmail.com', '12345'),
(2, 'Mamokgolwane', 'Moloi', 'mamokgolwanem@gmail.com', '123456'),
(3, 'Mamokgolwane', 'Moloi', 'preclamo@gmail.com', '1234566'),
(4, 'Onica', 'Mokoena', 'onica@gmail.com', '11111'),
(5, 'Kelly', 'Mokoena', 'kelly001@gmail.com', '1235'),
(6, 'Molly', 'Moko', 'molly@gmail.com', '111111');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `features` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `location`, `features`, `rate`, `image`) VALUES
(1, 'AC Hotel by Marriott', 'Cape Town', 'Ocean View,Daily Housekeeping,Free WiFi', 2917, 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/177415527.jpg?k=ae2ce24dd3e028d21c3ce161bc6d98b148e9493cfd2aca9d6e866a78e0502b21&o=&hp=1'),
(2, 'WINK One Thibault', 'Cape Town CBD', 'City View,Air Conditioning,Daily Housekeeping', 495, 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/23/bf/e3/45/wink-hotel-saigon-centre.jpg?w=700&h=-1&s=1'),
(3, 'Newkings Boutique Hotel', 'Sea Point', 'Room Service,Bar,Free WiFi', 578, 'https://cf.bstatic.com/xdata/images/hotel/max1280x900/324915887.jpg?k=f1bbd9d4964ae6a71e019e387818be5605d98c0f8c421cb5f06bf84d81a43106&o=&hp=1'),
(4, 'HOTEL SKY', 'Cape Town CBD', 'Facilities for disabled guests,Fitness Center,Free Parking', 1963, 'https://cf.bstatic.com/xdata/images/hotel/max1024x768/325689801.jpg?k=84852b5ca6a103bbdbd636f96a58d38c8da48f8e05fa779903cdde6d52f56eee&o=&hp=1');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_no`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffId`),
  ADD UNIQUE KEY `staffId` (`staffId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
