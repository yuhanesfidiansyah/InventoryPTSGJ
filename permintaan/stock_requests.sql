-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2024 at 08:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `permintaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `stock_requests`
--

CREATE TABLE `stock_requests` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_requests`
--

INSERT INTO `stock_requests` (`id`, `product_name`, `quantity`, `supplier`, `request_date`) VALUES
(1, 'lampu', 1, 's', '2024-07-20 22:44:12'),
(2, 'lampu', 1, 's', '2024-07-20 22:44:47'),
(3, 'lampu', 1, 's', '2024-07-21 05:45:30'),
(4, 'lampu', 1, '1', '2024-07-21 05:48:55'),
(5, 'lampu', 1, '1', '2024-07-21 05:58:08'),
(6, 'lampu', 1, '1', '2024-07-21 06:00:11'),
(7, 'lampu', 1, '1', '2024-07-21 06:02:30'),
(8, 'lampu', 1, '1', '2024-07-21 06:03:14'),
(9, 'lampu', 1, '1', '2024-07-21 06:03:40'),
(10, 'lampu', 1, '1', '2024-07-21 06:03:52'),
(11, 'lampu', 1, '1', '2024-07-21 06:04:10'),
(12, 'lampu', 1, '1', '2024-07-21 06:04:35'),
(13, 'lampu', 1, '1', '2024-07-21 06:04:48'),
(14, 'lampu', 1, '1', '2024-07-21 06:05:05'),
(15, 'lampu', 1, '1', '2024-07-21 06:05:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stock_requests`
--
ALTER TABLE `stock_requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stock_requests`
--
ALTER TABLE `stock_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
