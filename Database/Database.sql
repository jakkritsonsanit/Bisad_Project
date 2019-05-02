-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2019 at 09:05 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group3`
--

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `block_id` int(10) NOT NULL,
  `block_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shop_id` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`block_id`, `block_code`, `shop_id`, `price`) VALUES
(1, 'A1', 1, 250),
(2, 'A2', 1, 250),
(3, 'B1', 2, 250),
(4, 'B2', 1, 250),
(5, 'C1', 1, 250),
(6, 'C2', 1, 250),
(7, 'A3', 1, 250),
(8, 'A4', 1, 250),
(9, 'B3', 1, 10),
(10, 'B4', 1, 250),
(11, 'C3', 1, 10),
(12, 'C4', 1, 250),
(13, 'A5', 1, 250),
(14, 'A6', 1, 250);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promo_id` int(10) NOT NULL,
  `shop_id` int(10) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promo_id`, `shop_id`, `img`) VALUES
(1, 2, 'src/img/PM1.png'),
(2, 2, 'src/img/PM2.png'),
(3, 2, 'src/img/PM3.png');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(10) NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `info`, `user_id`) VALUES
(1, 'LnW toon right here!', 1),
(6, 's', 1),
(7, 'sa', 1),
(8, 'sa', 1),
(9, 'sa', 1),
(10, 'sa', 1),
(11, 'sa', 1),
(12, 'sa', 1),
(13, 'sa', 1),
(14, 'sa', 1),
(15, 'sa', 1),
(16, 'sa', 1),
(17, 'sa', 1),
(18, 'sa', 1),
(19, 'sa', 1),
(20, 'sa', 1),
(21, 'sa', 1),
(22, 'sa', 1),
(23, 'sa', 1),
(24, 'sa', 1),
(25, 'sa', 1),
(26, 'sa', 1),
(27, 'sa', 1),
(28, 'sa', 1),
(29, 'sa', 1),
(30, 'sa', 1),
(31, 'as', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shop_id`, `user_id`, `name`, `info`) VALUES
(1, 1, 'EMPTY', 'none'),
(2, 3, 'คอหมูย่างเมืองคอน', 'คอหมูย่างเนื้อนุ่มหมักจากน้ำป้าเชง');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `password`, `email`, `phone`, `role`, `image`) VALUES
(1, 'Group3', 'Bisad', 'manager', 'abc123456', 'group3@gmail.com', 9, 'manager', 'src/img/profile.jpg'),
(2, 'จักรกฤษณ์', 'สอนสนิท', 'test', '0927830040', 'palm8ikaa2@gmail.com', 927830040, 'customer', ''),
(3, 'จักรกฤษณ์', 'สอนสนิท', 'test_m', '123456', 'palm8ikaa2@gmail.com', 927830040, 'merchant', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`block_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `block_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
