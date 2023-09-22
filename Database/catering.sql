-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2023 at 10:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `firstname`, `lastname`, `email`, `reg_date`, `username`, `password`, `admin`) VALUES
(34, 'allen', 'pagnanawon', 'allen.pagnanawon@foundationu.com', '2023-07-27 10:06:56', '20200273', '$2y$10$bsGPUDWWFJrKL2cj09Pcx.4CaTRIGDCeSYJGMfR9PxH2YBc.zp/6i', 1),
(135, 'e1945a5be9', '1db4cd1927', '003f0a7d63@example.com', '2022-12-10 14:55:51', '72677dcece', '7fc2d84325c33417a194', 0),
(136, 'a52ff324e2', '2d40ce972e', '170fa77333@example.com', '2023-03-13 14:55:51', '14b75f455d', '851bc03b50263fdf64f6', 0),
(141, '152eaab72e', 'a759249375', 'dc3da5f328@example.com', '2023-07-19 14:55:51', '8a6c8dcc7c', '7d7798012b7a1c1cba0f', 0),
(147, 'rafael', 'khent ', 'raf@mail.com', '2023-08-06 15:01:47', 'guest', '$2y$10$jH7Df6gbVjSnuGYyg0ry/uqBfOPAj9FK1AxHkyee6xR2ulfR4f4Y.', 0),
(148, 'jeremy', 'alviola', 'emy@mail.com', '2023-08-07 01:30:32', 'emmy', '$2y$10$lx7yeWdqxQuWiKWCDUBqHecEEpKrwXvU/lCV/iETwTfv71hU1oHzW', 0),
(149, 'jake', 'bantoto', 'jake@mail.com', '2023-08-07 02:39:23', 'jake', '$2y$10$7uK2S5a18xwC.HBj7wL.4eLirBJ8NNxAahm5jzgTYpttIkW/G38hi', 0),
(151, 'test', 'chicken', 'rafz@mail.com', '2023-08-07 03:16:43', 'rafz', 'password', 0),
(152, 'jeremyZ', 'alviolaZ', 'mail@mail.com', '2023-08-07 03:18:52', 'emz', 'PASSWORD', 0),
(153, 'jess', 'belen', 'jess@mail.com', '2023-08-07 03:22:50', 'jess', '$2y$10$6TppB2IZwNwq5RIvRn6SXe9hoUgQ.nJ51kVhkHnrmAmYyynpMCvKi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `description`, `price`) VALUES
(29, 'Fried Chicken', 40.00),
(30, 'Tinolas', 35.00),
(31, 'Giniling', 45.00),
(32, 'Pork Chop', 50.00),
(33, 'Sinigang', 50.00),
(34, 'Softdrink', 20.00),
(35, 'Pancit', 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date_order` date NOT NULL DEFAULT current_timestamp(),
  `delivery_date` date NOT NULL,
  `delivery_time` time NOT NULL,
  `delivery_address` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date_order`, `delivery_date`, `delivery_time`, `delivery_address`, `contact_number`) VALUES
(109, '2023-08-06', '0000-00-00', '00:00:00', 'cervantez', '09958540713'),
(110, '2023-08-07', '0000-00-00', '00:00:00', 'aaaaaaaz', '09958540713'),
(113, '2023-08-07', '2023-08-07', '03:26:09', 'cervantez', '09958540713'),
(114, '2023-08-07', '2023-08-07', '03:26:49', 'cervantez', '09958540713'),
(115, '2023-08-07', '2023-08-07', '03:27:02', 'cervantez', '09958540713'),
(116, '2023-08-07', '2023-08-07', '03:28:14', 'cervantess', '09958540713'),
(117, '2023-08-07', '2023-09-07', '03:31:02', 'FU', '42069'),
(119, '2023-08-07', '2023-08-07', '04:23:57', 'FU', '09958540713'),
(120, '2023-08-07', '2023-08-07', '05:24:42', 'cervantez', '09958540713'),
(121, '2023-08-07', '2023-08-07', '05:25:25', 'cervantez', '09958540713'),
(122, '2023-08-07', '2023-08-07', '05:25:30', 'cervantez', '09958540713'),
(123, '2023-08-07', '2023-08-07', '05:25:53', 'cervantess', '09958540713'),
(124, '2023-08-07', '2023-08-07', '05:26:23', 'cervantess', '09958540713'),
(125, '2023-08-07', '2023-08-07', '05:34:02', 'cervantess', '09958540713'),
(126, '2023-08-07', '2023-08-07', '05:36:23', 'cervantess', '09958540713'),
(127, '2023-08-07', '2023-08-07', '05:38:18', 'cervantess', '09958540713'),
(128, '2023-08-07', '2023-08-07', '05:38:40', 'cervantess', '09958540713'),
(129, '2023-08-07', '2023-08-07', '05:40:27', 'cervantess', '09958540713'),
(130, '2023-08-07', '2023-08-07', '05:43:37', 'cervantess', 'ghjs'),
(131, '2023-08-07', '2023-08-07', '05:55:33', 'aaaaaaaz', '09958540713'),
(132, '2023-08-07', '2023-08-07', '05:56:02', 'aaaaaaaz', '09958540713'),
(133, '2023-08-07', '2023-08-07', '05:56:09', 'aaaaaaaz', '09958540713'),
(134, '2023-08-07', '2023-08-07', '05:56:15', 'aaaaaaaz', '09958540713'),
(135, '2023-08-07', '2023-08-07', '05:57:43', 'aaaaaaaz', '09958540713'),
(136, '2023-08-07', '2023-08-07', '05:58:08', 'aaaaaaaz', '09958540713'),
(137, '2023-08-07', '2023-08-07', '05:58:17', 'aaaaaaaz', '09958540713'),
(138, '2023-08-07', '2023-08-07', '05:58:51', 'aaaaaaaz', '09958540713'),
(139, '2023-08-07', '2023-08-07', '05:59:42', 'aaaaaaaz', '09958540713'),
(140, '2023-08-07', '2023-08-07', '05:59:55', 'aaaaaaaz', '09958540713'),
(141, '2023-08-07', '2023-08-07', '06:00:26', 'aaaaaaaz', '09958540713'),
(142, '2023-08-07', '2023-08-07', '06:00:34', 'aaaaaaaz', '09958540713'),
(143, '2023-08-07', '2023-08-07', '06:00:59', 'cervantess', '09958540713'),
(144, '2023-08-07', '2023-08-07', '06:02:10', 'cervantess', '09958540713'),
(145, '2023-08-07', '2023-08-07', '06:03:21', 'cervantess', '09958540713'),
(146, '2023-08-07', '2023-08-07', '06:04:05', 'cervantess', '09958540713'),
(147, '2023-08-07', '2023-08-07', '06:04:21', 'cervantess', '09958540713'),
(148, '2023-08-07', '2023-08-07', '06:22:33', 'cervantess', '09958540713'),
(149, '2023-08-07', '2023-07-20', '10:20:00', 'cervantez', '09958540713'),
(150, '2023-08-07', '2023-07-20', '10:20:00', 'zzzzzzzzzzzz', '09958540713'),
(151, '2023-08-07', '2023-07-20', '11:20:00', 'xxxxxxxxxx', '09958540713'),
(152, '2023-09-19', '2023-08-08', '23:08:12', 'aaaaaaa', '111111111');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `quantity` int(255) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `menu_id`, `quantity`, `unit_price`) VALUES
(50, 103, 29, 1, 40.00),
(51, 103, 29, 1, 40.00),
(52, 103, 30, 1, 35.00),
(53, 103, 34, 1, 20.00),
(54, 104, 35, 1, 20.00),
(55, 104, 32, 1, 50.00),
(56, 107, 31, 1, 45.00),
(57, 107, 32, 1, 50.00),
(58, 107, 31, 1, 45.00),
(59, 107, 34, 1, 20.00),
(60, 107, 34, 1, 20.00),
(61, 108, 29, 1, 40.00),
(62, 108, 29, 1, 40.00),
(63, 108, 30, 1, 35.00),
(64, 109, 30, 1, 35.00),
(65, 109, 31, 1, 45.00),
(66, 109, 30, 1, 35.00),
(67, 109, 30, 1, 35.00),
(68, 110, 29, 1, 40.00),
(69, 111, 34, 1, 20.00),
(70, 112, 29, 1, 40.00),
(71, 112, 29, 1, 40.00),
(72, 113, 29, 1, 40.00),
(73, 113, 29, 1, 40.00),
(74, 114, 32, 1, 50.00),
(75, 114, 34, 1, 20.00),
(76, 115, 34, 1, 20.00),
(77, 116, 31, 1, 45.00),
(78, 116, 33, 1, 50.00),
(79, 116, 30, 1, 35.00),
(80, 116, 30, 1, 35.00),
(81, 117, 29, 1, 40.00),
(82, 117, 29, 1, 40.00),
(83, 118, 29, 1, 40.00),
(84, 118, 29, 1, 40.00),
(85, 118, 29, 1, 40.00),
(86, 118, 32, 1, 50.00),
(87, 119, 29, 1, 40.00),
(88, 119, 29, 1, 40.00),
(89, 119, 35, 1, 20.00),
(90, 119, 29, 1, 40.00),
(91, NULL, 29, 1, 40.00),
(92, NULL, 29, 1, 40.00),
(93, NULL, 29, 1, 40.00),
(94, NULL, 29, 1, 40.00),
(95, 147, 29, 1, 40.00),
(96, 148, 29, 1, 40.00),
(97, 149, 29, 1, 40.00),
(98, 149, 29, 1, 40.00),
(99, 150, 29, 1, 40.00),
(100, 151, 33, 1, 50.00),
(101, 152, 29, 1, 40.00),
(102, 152, 30, 1, 35.00),
(103, 152, 32, 1, 50.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
