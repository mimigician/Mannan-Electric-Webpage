-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 11:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `signin`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `p_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `id` int(100) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`p_id`, `username`, `id`, `time`, `address`) VALUES
(7, 'aa', 12, '2022-07-20 16:02:58.754680', 'Dhaka'),
(11, 'bb', 13, '2022-07-20 16:03:53.333268', 'Mirpur 1, Dhaka'),
(27, 'bb', 14, '2022-07-20 16:03:53.335547', 'Mirpur 1, Dhaka'),
(30, 'bb', 15, '2022-07-20 16:03:53.339280', 'Mirpur 1, Dhaka'),
(28, 'ad', 16, '2022-07-20 16:05:55.940399', 'Mohammadpur, Dhaka'),
(9, 'ad', 17, '2022-07-20 16:05:55.941886', 'Mohammadpur, Dhaka'),
(8, 'ad', 18, '2022-07-20 16:05:55.943947', 'Mohammadpur, Dhaka'),
(2, 'aa', 19, '2022-07-20 17:01:04.124894', 'Dhaka'),
(2, 'aa', 22, '2022-07-20 17:37:47.605068', 'Dhaka'),
(2, 'aa', 23, '2022-07-20 18:48:55.980477', 'Dhaka'),
(3, 'aa', 26, '2022-07-20 19:59:19.593149', 'Dhaka'),
(4, 'aa', 27, '2022-07-20 19:59:19.597028', 'Dhaka'),
(3, 'bb', 28, '2022-07-21 07:06:19.072957', 'Mirpur 1, Dhaka'),
(2, 'aa', 29, '2022-07-21 07:09:05.451570', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `imgsrc` varchar(100) NOT NULL,
  `cat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `name`, `price`, `quantity`, `imgsrc`, `cat`) VALUES
(1, 'BRB Wire', 3000, 100, 'images/brbwire.jpg', 'wire'),
(2, 'Superstar Fan', 2850, 27, 'images/superstarfan.jpeg', 'fan'),
(3, 'Roots Circuit', 290, 50, 'images/rootscircuit.png', 'circuit'),
(4, 'Superstar Bulb', 390, 200, 'images/superstarbulb.png', 'bulb'),
(5, 'BRB Fan', 2900, 50, 'images/brbfan.jfif', 'fan'),
(6, 'Osaka Tape', 20, 300, 'images/osakatape.jfif', 'tape'),
(7, 'Khan Multi', 340, 200, 'images/khanmulti.jpg', 'socket'),
(8, 'Cell Meter', 600, 30, 'images/cellmeter.jpg', 'meter'),
(9, 'Superstar Circuit', 140, 48, 'images/superstarcircuit.jfif', 'circuit'),
(10, 'Osaka Bulb', 300, 40, 'images/osakabulb.jpg', 'bulb'),
(11, 'Osaka Tube', 410, 30, 'images/osakatube.jfif', 'bulb'),
(12, 'Khan 3 Gang', 275, 70, 'images/khan3gang.jpg', 'socket'),
(25, 'RFL fan', 3400, 100, 'images/rflfan.jpg', 'fan'),
(27, 'Superstar Tape', 20, 150, 'images/superstartape.png', 'tape'),
(28, 'Bbs Wire', 6900, 20, 'images/bbswire.jpg', 'wire'),
(29, 'Wiener 4gang', 295, 140, 'images/wiener4gang.jpg', 'socket'),
(30, 'Click Regulator', 400, 70, 'images/clickregulator.jpg', 'socket');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `address`) VALUES
('aa', 'aa@aa', 'aa', 'Dhaka'),
('ad', 'ad@ad', 'ad', 'Mohammadpur, Dhaka'),
('admin', 'admin@admin', 'admin123', 'Dhaka'),
('bb', 'bb@bb', 'bb', 'Mirpur 1, Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `address` (`address`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`),
  ADD KEY `address` (`address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`address`) REFERENCES `users` (`address`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
