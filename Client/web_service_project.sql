-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 04:12 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
  `status` enum('Preparing','Completed','Cancelled','') NOT NULL DEFAULT 'Preparing',
  `client_id` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_ids`, `item_amounts`, `status`, `client_id`) VALUES
(1, 1, '1,0', '2,3', '', 'jane'),
(3, 2, '0', '5', '', '72'),
(4, 5, '3,4,6', '6,3,1', 'Preparing', 'Gigi'),
(5, 5, '6,1', '2,3', 'Completed', 'Viv'),
(7, 5, '3,5', '1,2', 'Preparing', 'Émilie'),
(8, 5, '4', '2', 'Cancelled', 'test'),
(9, 5, '7', '4', 'Cancelled', 'n n ');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_index` int(11) NOT NULL,
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

INSERT INTO `item` (`item_id`, `user_id`, `item_index`, `item_name`, `description`, `price`, `picture`, `tag`, `stock`) VALUES
(1, 1, 0, 'Sport Socks - 6 pack', 'Sporty socks are a great gift for any friend or family member wanting to get healthy for the holidays. After all how can one justify wearing such sporty socks, while neglecting their new years resolution!?', '3.99', '8d5a1_sportsocks6pack.png', NULL, 25),
(2, 1, 1, 'Cat Sock - Pink', 'The purrfect set for you feline-inclined people. ', '24.99', NULL, NULL, 100),
(3, 2, 0, 'An Alternative Item', 'An item that is being sold in an alternative shop.', '8.75', NULL, NULL, 35),
(4, 5, 1, 'cheesecake', 'cheese cake', '8.99', '3c9c4_61c0d56b04e43.jpeg', NULL, 10),
(6, 5, 3, 'Apple Pie', 'A hot apple pie', '4.55', '9da23_61c0d65c89b98.jpeg', NULL, 7),
(7, 5, 4, 'Lemon cake', 'A very lemony lemon cake.', '5.99', '6c868_61c0d6a18482c.jpeg', NULL, 5),
(8, 5, 5, 'Red Velvet', 'A red velvet cake', '12.00', '4146e_61c0d7efb7952.jpeg', NULL, 10),
(9, 5, 6, 'Vanilla', 'A vanilla cake', '9.99', 'eb502_61c0d81752d23.jpeg', NULL, 12);

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
(1, 'email@domain.ext', '$2y$10$FmF8eWBhixU.jtJqbyuiHuPYt.WxvtEbMWbqm9B3NCKG.drVVw5kO', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJrZXkiOiJkNjNiMC5OemsyWWpsbFptVXhZbVl5T0RkaU9UZzNPVFprTlRReU56WmhZemMzWldJIn0.Fu7wZjPoIQ-vj6FF1zqYlFSfmuI2pnYyvimAM38qGzA'),
(2, 'email_1@domain.ext', '$2y$10$EjIqiEpfkeUygYyT9g7TMudRjgm4/nDueqj9APIyOtNWirpvCI6Fu', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJrZXkiOiJkNjJkNC5ZVE14WTJJNVl6Rm1aR1EyTldWa1pETTJNakJoTWpGaU1XRTNNREV5Wm1FIn0.zOQsOO8S6PJVH2RMUyuKwgcK-wYs98eELNUjylz75JA'),
(4, 'email_2@domain.ext', '$2y$10$OUkLS6vdHaT6qRFSdIbnPO72Y/DgLCOAPZrH3L0W67X7hXCgj12RW', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJrZXkiOiI0ZTkyMS5PRE15WlRVM05HRXpNelZtTjJOa04yTmhOR0V4T0RCaFpHTTFaVFJsTW1RIn0.hOyTdw5qVsCdE0wDN2dMuc3VF1A05pCWaXAptXkNhAo'),
(5, 'lili@lola.ca', '$2y$10$NMdUabgrrC.l37MR0qhrj.1gWosUlmuK41wxmv/0hyd1PAnzSejs.', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJrZXkiOiJhODY1Ni5ORFF5T1dFMk9UQmlORGcyTXpWbE9UVm1Oek16WlRsaVl6VmhNRE13TTJRIn0.1yreYH2Lq34NPk4fndstJBq-w96JORaC5mu5aJwp5g8'),
(10, 'new@shop.com', '$2y$10$0Sikrit11Dq2WJh7jkZG8eTTf5LFM2jtsv0ErVc4IIwGNgBKA8yC6', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJrZXkiOiJhNjNiZi5aRGt5WXpFNFpUY3pZakkwTXpjMU1HVTBOall4TWpWa01qVTBaamRrTVRZIn0.HLOd0GjD9wkjikCXlMWPslndiLP9VWSmyNyulU9ZuDc'),
(18, 'mskdf@some.ca', '$2y$10$1IdDo/U5aRpf6aXSD6yWNOgNyFNbzK754RmyoJOtxyqR12DG4RvLi', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJrZXkiOiIxMzY4Ni5OMlJqT0dVNE5URTBZV1V6TURjd1pXRmpPREl5T1RSbE1qRXdaalJsWWpBIn0.qLUPsYiwDvNy8w-xOJb4xNI4ukx4QnG8_BOZjzF-M9o'),
(20, 'cxcvdcv@knskcn.ca', '$2y$10$9p7KQ/C.OVxBJqeAzB4RQO5QruAf5FCnpse2wdqriTqMk7eBse2U2', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJrZXkiOiI2NjAzMS5PR1V5WXpWa1ltSmpZek5oWXpNM1lUUTVORFpqWlRrMFpESTFZVFl4WlRJIn0.XHaygzyyX_gA9BPNHYexFFWr1P3Th-ac14arFNuKSu8');

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
