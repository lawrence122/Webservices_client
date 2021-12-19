-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 10:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_service_project`
--
CREATE DATABASE IF NOT EXISTS `web_service_project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `web_service_project`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_ids` text NOT NULL,
  `item_amounts` text NOT NULL,
  `status` varchar(250) NOT NULL,
  `client_id` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_ids`, `item_amounts`, `status`, `client_id`) VALUES
(6, 5, '0', '2', 'Completed', 'Kiki'),
(7, 5, '1', '1', 'Cancelled', 'mJ'),
(8, 5, '2,1', '1,2', 'Completed', 'mJ'),
(9, 5, '3,4,0', '1,2,3', 'Completed', 'mJ'),
(10, 5, '2,4,0', '1,2,5', 'Cancelled', 'Kiki'),
(11, 5, '1', '2', 'Completed', 'Emilie'),
(12, 5, '0,2,4', '2,2,1', 'Completed', 'Gigi'),
(13, 5, '4,1', '3,2', 'Preparing', 'Santa'),
(14, 5, '5', '2', 'Preparing', 'Emilie');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `price` decimal(65,2) DEFAULT NULL,
  `picture` varchar(250) DEFAULT NULL,
  `tag` varchar(250) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `user_id`, `item_name`, `description`, `price`, `picture`, `tag`, `stock`) VALUES
(13, 5, 'Lemon Cake', 'A very lemony lemon cake.', '5.99', NULL, NULL, 5),
(20, 5, 'Millefeuille', 'Millefeuille', '5.69', NULL, NULL, 7),
(21, 5, 'Mousse', 'A delicious mousse.', '18.99', NULL, NULL, 2),
(24, 5, 'Cheesecake', 'cheese', '12.97', NULL, NULL, 3),
(40, 5, 'Raisin Bread', 'Ew raisins', '2.99', NULL, NULL, 1),
(42, 5, 'Apple Pie', 'A hot apple pie.', '4.55', NULL, NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `license_key` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `license_key`) VALUES
(5, 'google@gold.com', '$2y$10$SscCBeX704V1EbSR4wV3muCWzgjejz/CaqVzeV7EahggeJwDgvUZO', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJrZXkiOiIxMDkzOC5aamc1WW1NeVptVTNZelptWXpVeU5HSmpZVEptTW1WaE9HUmpOakUyTmpZIn0.THuDLHFBuiay6he7pLFuZ-7a9n2EqVFskRJ1qlUQYTo'),
(6, 'ghjt@gmd.co', '$2y$10$oV00C5nA2l/uMjlgFqmu/OJo41UiRLLiawkfwgGnqUFUushlRTx2K', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJrZXkiOiI2MjcyMi5ORFpsT1Roak1EVm1NRE0yT1RJNVltRmlOREU1TURCbVlUazRaRE0zTVRnIn0.9-kplqYUPueWwiniMPU3AjAslpZOMZP10f8dv1XCNP8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `User_to_Cart` (`user_id`) USING BTREE;

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `picture` (`picture`),
  ADD KEY `User_to_Item` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `license_key` (`license_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `User_to_Cart` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `User_to_Item` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
