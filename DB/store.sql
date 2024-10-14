-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 08:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `birthdate` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`first_name`, `last_name`, `email`, `password`, `birthdate`, `id`) VALUES
('ahmed', 'fouad', 'ah45@gmail.com', 'ahmed', '2022-12-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(500) NOT NULL,
  `c_password` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `c_password`, `country`) VALUES
(1, 'mohamed', 'fouad', 'mf45@gmail.com', 1009824835, 'mohamed', 'mohamed', 'Egypt'),
(2, 'mohamed', 'fouad', 'mf4545@gmail.com', 1009824835, '1234', '1234', 'Egypt'),
(3, 'mohamed', 'fouad', 'mf435@gmail.com', 1009824835, '145632', '145632', 'Egypt');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `time`) VALUES
(10, 'mobile', '2022-12-27 13:43:55'),
(11, 'laptops', '2022-12-25 01:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `price` int(10) NOT NULL,
  `discound` int(11) NOT NULL DEFAULT 0,
  `name` text NOT NULL,
  `photo` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `department_id`, `price`, `discound`, `name`, `photo`, `time`) VALUES
(36, 11, 45000, 10, 'dell', 'pexels-photo-1181269.jpeg', '2022-12-25 01:42:54'),
(37, 11, 10000, 3, 'HP', 'pexels-photo-303383.jpeg', '2022-12-25 01:43:27'),
(40, 11, 7000, 10, 'lenovo', 'macbook-apple-imac-computer-39284.jpeg', '2022-12-25 01:56:44'),
(43, 11, 45000, 10, 'apple', 'pexels-photo-205421.jpeg', '2022-12-25 01:43:53'),
(45, 11, 20000, 2, 'apple', 'macbook-apple-imac-computer-39284.jpeg', '2022-12-25 01:44:52'),
(50, 10, 10000, 3, 'infinix', 'pexels-photo-1092644.webp', '2022-12-27 02:33:40'),
(51, 10, 7000, 2, 'Oppo', 'pexels-photo-699122.jpeg', '2022-12-27 10:46:09'),
(52, 10, 6200, 5, 'Redmi', 'pexels-photo-404280.webp', '2022-12-27 10:49:27'),
(53, 10, 18000, 7, 'samsung', 'pexels-photo-1092644.webp', '2022-12-27 10:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `first_name`, `last_name`, `email`, `phone`, `subject`, `message`, `date`) VALUES
(2, 'mohamed', 'fouad', 'mf45@gmail.com', '01009824835', 'baniseuf', 'Website is good', '2022-12-18 04:18:12'),
(4, 'Mohamed', 'Fouad', 'mf5967482@gmail.com', '01009824835', 'fgfh', 'ghgjh jkjhjk jhkj', '2022-12-18 04:41:35'),
(5, 'mohamed', 'fouad', 'mf45@gmail.com', '01009824835', 'baniseuf', 'kjdkasjldklsad\r\nsdajslakdjla', '2022-12-22 01:59:55'),
(6, 'mohamed', 'fouad', 'mf45@gmail.com', '01009824835', 'baniseuf', 'kjdkasjldklsad\r\nsdajslakdjla', '2022-12-22 02:01:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
