-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2022 at 10:02 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `m_r_email` text NOT NULL,
  `m_item` text NOT NULL,
  `m_cost` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `m_r_email`, `m_item`, `m_cost`) VALUES
(1, 'mim@mim.mim', 'عدس مجروش', 3),
(23, 'mim@mim.mim', 'batata', 2),
(24, 'gheddo@gh.gh', 'batata', 1),
(25, 'gheddo@gh.gh', 'mansaf', 1),
(26, 'gheddo@gh.gh', 'chebs', 2),
(27, 'gheddo@gh.gh', 'roz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cust_email` varchar(64) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cust_email`, `amount`, `created_at`) VALUES
(12, 'mim@mim.mim', '9', '2022-09-06 18:58:50'),
(13, 'mim@mim.mim', '22', '2022-09-06 18:58:56'),
(14, 'mim@mim.mim', '13', '2022-09-06 18:59:01'),
(15, 'gheddo@gh.gh', '8', '2022-09-06 18:59:07'),
(16, 'gheddo@gh.gh', '5', '2022-09-06 18:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `rest_email` varchar(64) NOT NULL,
  `item_name` text NOT NULL,
  `item_qty` decimal(10,0) UNSIGNED NOT NULL,
  `item_unit_cost` decimal(10,0) NOT NULL,
  `item_total_cost` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `rest_email`, `item_name`, `item_qty`, `item_unit_cost`, `item_total_cost`) VALUES
(24, 1212, 'mim@mim.mim', 'batata', '2', '2', '4'),
(25, 1212, 'mim@mim.mim', 'عدس مجروش', '2', '3', '6'),
(26, 1213, 'gheddo@gh.gh', 'batata', '2', '1', '2'),
(27, 1213, 'gheddo@gh.gh', 'mansaf', '1', '1', '1'),
(28, 1214, 'mim@mim.mim', 'batata', '1', '2', '2'),
(29, 1214, 'mim@mim.mim', 'عدس مجروش', '1', '3', '3'),
(30, 1214, 'gheddo@gh.gh', 'batata', '1', '1', '1'),
(31, 1214, 'gheddo@gh.gh', 'roz', '2', '1', '2'),
(32, 16, 'gheddo@gh.gh', 'batata', '1', '1', '1'),
(33, 16, 'gheddo@gh.gh', 'chebs', '1', '2', '2'),
(34, 16, 'gheddo@gh.gh', 'mansaf', '1', '1', '1'),
(35, 16, 'gheddo@gh.gh', 'roz', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_cus`
--

CREATE TABLE `user_cus` (
  `c_name` text NOT NULL,
  `c_email` text NOT NULL,
  `c_pwd` text NOT NULL,
  `c_phone` varchar(10) NOT NULL,
  `c_add` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_cus`
--

INSERT INTO `user_cus` (`c_name`, `c_email`, `c_pwd`, `c_phone`, `c_add`) VALUES
('mim', 'mim@mim.mim', '12345678', '1234567890', 'fdgsdfg'),
('Ghada', 'gheddo@gh.gh', '12345678', '1234678904', 'fdgsdfg');

-- --------------------------------------------------------

--
-- Table structure for table `user_res`
--

CREATE TABLE `user_res` (
  `r_name` text NOT NULL,
  `r_email` text NOT NULL,
  `r_pwd` text NOT NULL,
  `r_add` text NOT NULL,
  `r_phone1` varchar(10) NOT NULL,
  `r_phone2` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_res`
--

INSERT INTO `user_res` (`r_name`, `r_email`, `r_pwd`, `r_add`, `r_phone1`, `r_phone2`) VALUES
('mimRes', 'mim@mim.mim', '12345678', 'lkkn', '1234567890', '1234567890'),
('Ghada', 'gheddo@gh.gh', '12345678', 'dfgs', '1987654322', '1987654322');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cus`
--
ALTER TABLE `user_cus`
  ADD UNIQUE KEY `c_email` (`c_email`) USING HASH;

--
-- Indexes for table `user_res`
--
ALTER TABLE `user_res`
  ADD UNIQUE KEY `r_email` (`r_email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
