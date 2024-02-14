-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Feb 14, 2024 at 10:42 PM
-- Server version: 8.0.34
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ilyas_Product`
--

CREATE TABLE `ilyas_Product` (
  `product_Id` int NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `brand_Id` int DEFAULT NULL,
  `brand_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `category_Id` int DEFAULT NULL,
  `category_name` varchar(50) NOT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `country_of_origin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `barcode` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ilyas_Product`
--

INSERT INTO `ilyas_Product` (`product_Id`, `product_name`, `brand_Id`, `brand_name`, `description`, `category_Id`, `category_name`, `sale_price`, `country_of_origin`, `barcode`, `created_at`) VALUES
(1, '', NULL, 'jamila', NULL, NULL, '', 2.00, 'morocco', NULL, NULL),
(2, ' tomatos', NULL, 'knor', NULL, NULL, ' Vegetables', 0.00, 'morocco', NULL, NULL),
(3, ' soda', NULL, 'Coca COla', NULL, NULL, ' Drinks', 4.00, 'Finland', NULL, NULL),
(4, ' Eggs', 1234, 'pikkula', NULL, NULL, ' Eggs and Diary', 2.00, 'Finland', NULL, NULL),
(17, ' Bread', 1232, 'Vaasan', 'Good fresh bread', 0, ' Baked Goods', 2.00, 'Finland', NULL, NULL),
(18, ' soda', 10, 'Fanta', 'A pack of soda ', 120, ' Drinks', 7.00, 'Finland', NULL, NULL),
(19, ' Coffe', 110, 'JUHLA', 'Juhla Mocha coffee', 3, ' Drinks', 6.00, 'Finland', NULL, '2024-02-14 16:01:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ilyas_Product`
--
ALTER TABLE `ilyas_Product`
  ADD PRIMARY KEY (`product_Id`),
  ADD UNIQUE KEY `brand_Id` (`brand_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ilyas_Product`
--
ALTER TABLE `ilyas_Product`
  MODIFY `product_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
