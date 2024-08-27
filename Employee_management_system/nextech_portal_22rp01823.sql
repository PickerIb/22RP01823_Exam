-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2024 at 06:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nextech_portal_22rp01823`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(3) NOT NULL,
  `employee_name` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `position` varchar(100) NOT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_name`, `email`, `phone`, `position`, `address`, `created_at`) VALUES
(2, 'IZUKONDI Bienvenue', 'izukondibien@gmail.com', '0788420056', 'Technician', 'Rubavu', '2024-08-28 06:33:00'),
(4, 'CANIRINYANA  Diane', 'tedy@gmail.com', '0790561947', 'Debugger', 'Butare', '2024-08-27 06:30:00'),
(5, 'MUGISHA Gilbert', 'mugisha@gmail.com', '0796789308', 'Developer', 'Gatsibo', '2024-08-10 15:45:00'),
(6, 'DUSABIMANA Hozana', 'hozana@gmail.com', '0788420053', 'Developer', 'Rubavu', '2024-08-03 05:51:00'),
(8, 'MANZI BAHIZI Bertin', 'picker@gmail.com', '0788420056', 'Technician', 'RUBAVU', '2024-08-27 20:23:00'),
(9, 'MBAZUMUTIMA Edson', 'edson@gmail.com', '0788420014', 'Programmer', 'Gisenyi', '2024-08-03 05:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Picker', '81593157c76de0ec412d1eb5fce3a7e1', '2024-08-27 13:55:17'),
(3, 'Panther', '03bfeaf25ac853ad3957a6221e10b57d', '2024-08-27 13:56:09'),
(4, 'Pickers', 'Picker2020@1974', '2024-08-27 13:59:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
