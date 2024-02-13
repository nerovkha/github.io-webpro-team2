-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2024 at 01:29 PM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_bbcap23_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `AugustineNguyenLeKhang_payment`
--

CREATE TABLE `AugustineNguyenLeKhang_payment` (
  `OrderID` int NOT NULL,
  `CustomerID` int NOT NULL,
  `OrderDate` date NOT NULL,
  `TotalAmount` decimal(10,0) NOT NULL,
  `BillingAddress` varchar(50) NOT NULL,
  `ShippingAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AugustineNguyenLeKhang_payment`
--
ALTER TABLE `AugustineNguyenLeKhang_payment`
  ADD PRIMARY KEY (`OrderID`),
  ADD UNIQUE KEY `CustomerID` (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AugustineNguyenLeKhang_payment`
--
ALTER TABLE `AugustineNguyenLeKhang_payment`
  MODIFY `OrderID` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
