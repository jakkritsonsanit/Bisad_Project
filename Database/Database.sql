-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2019 at 11:17 AM
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
(2, 'A2', 6, 250),
(3, 'B1', 2, 250),
(4, 'B2', 2, 250),
(5, 'C1', 2, 250),
(6, 'C2', 1, 250),
(7, 'A3', 1, 250),
(8, 'A4', 1, 250),
(9, 'B3', 1, 10),
(10, 'B4', 8, 250),
(11, 'C3', 1, 10),
(12, 'C4', 1, 250),
(13, 'A5', 1, 250),
(14, 'A6', 6, 250),
(15, 'B5', 1, 250),
(16, 'B6', 1, 250),
(17, 'C5', 1, 250),
(18, 'c6', 1, 250),
(19, 'A7', 1, 3000),
(20, 'A8', 1, 2500),
(21, 'B7', 1, 300),
(22, 'B8', 1, 250),
(23, 'C7', 1, 10),
(24, 'C8', 1, 2500),
(25, 'A9', 1, 2500);

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
(3, 2, 'src/img/PM3.png'),
(4, 6, 'src/img/PM1.png'),
(5, 6, 'src/img/PM2.png'),
(6, 6, 'src/img/PM3.png'),
(11, 8, 'src/img/2019-05-05-07-50-PM1.png');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(10) NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `info`, `user_id`, `date`, `time`) VALUES
(36, 'Yeah! I got it', 2, '2019-05-05', '08:05:13'),
(37, 'รายงานต่างๆ', 8, '2019-05-05', '06:05:07'),
(38, 'test report 1', 9, '2019-05-07', '10:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shop_id`, `user_id`, `name`, `info`, `img`) VALUES
(1, 1, 'EMPTY', 'none', ''),
(2, 3, 'คอหมูย่างเมืองคอน', 'คอหมูย่างเนื้อนุ่มหมักจากน้ำป้าเชง', 'src/img/2019-05-04-07-44-S__12247092.jpg'),
(6, 6, 'ครัวบักเขต', 'ครัวหนุ่มอิสลามผู้มากฝันในวงการอาหาร ใฝ่ฝันเติบโตขึ้นไปเป็นใหญ่', 'src/img/2019-05-03-12-4520160913_101451.jpg'),
(8, 7, 'ขายไก่', 'กดว้าวระวังหน้าร้าว ไอสัส!', 'src/img/2019-05-05-07-15J3583170-9.jpg'),
(9, 10, 'ร้านขายน้ำ', 'น้ำสุดอร่อย', 'src/img/2019-05-07-10-20logo_shop.jpg');

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
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `username`, `password`, `email`, `phone`, `role`, `image`) VALUES
(1, 'Group3', 'Bisad', 'manager', 'abc123456', 'group3@gmail.com', '9', 'manager', 'src/img/profile.jpg'),
(2, 'จักรกฤษณ์', 'สอนสนิท', 'test', '0927830040', 'palm8ikaa2@gmail.com', '0927830040', 'customer', ''),
(3, 'จักรกฤษณ์', 'สอนสนิท', 'test_m', '123456', 'palm8ikaa2@gmail.com', '0927830040', 'merchant', 'src/img/2019-05-04-06-13-test.jpg'),
(6, 'จักรกฤษณ์', 'sonsanit', 'palm8ikaa2', '1234', 'palm8ikaa2@gmail.com', '927830040', 'merchant', 'src/img/2019-05-03-12-52-23509185_10210731055334146_2241253386649832692_o.jpg'),
(7, 'จักรกฤษณ์', 'sonsanit', 'test2_m', '1234', 'palm8ikaa2@gmail.com', '0927830040', 'merchant', 'src/img/2019-05-05-07-08-IMG_2176.jpg'),
(8, 'จักรกฤษณ์', 'sonsanit', 'toon1', '123', 'palm8ikaa2@gmail.com', '927830040', 'customer', 'src/img/2019-05-05-06-57-palmdeath.jpg'),
(9, 'จักรกฤษณ์', 'sonsanit', 'customer', '12345', 'palm8ikaa2@gmail.com', '0800927740', 'customer', 'src/img/2019-05-07-10-05-'),
(10, 'จักรกฤษณ์', 'สอนสนิท', 'merchant', '123456', 'palm8ikaa2@gmail.com', '927830040', 'merchant', 'src/img/2019-05-07-10-51-user.png');

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
  MODIFY `block_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promo_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
