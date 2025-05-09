-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 04:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharaz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `submitted_at`) VALUES
(1, NULL, NULL, NULL, NULL, '2025-05-09 13:00:39'),
(2, NULL, NULL, NULL, NULL, '2025-05-09 13:03:15'),
(3, 'JEREMIAH PELU', 'pelunguta@gmail.com', 'TEST', 'test', '2025-05-09 13:51:16'),
(4, 'JEREMIAH PELU', 'pelunguta@gmail.com', 'TEST', 'test', '2025-05-09 13:56:32'),
(5, 'JEREMIAH PELU', 'pelunguta@gmail.com', 'TEST', 'test', '2025-05-09 14:01:05'),
(6, NULL, NULL, NULL, NULL, '2025-05-09 14:01:15'),
(7, 'JEREMIAH PELU', 'pelunguta@gmail.com', 'TEST', 'test', '2025-05-09 14:19:25'),
(8, 'JEREMIAH PELU', 'pelunguta@gmail.com', 'TEST', 'test', '2025-05-09 14:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `subscribed_at`) VALUES
(1, NULL, '2025-05-09 13:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `features` text DEFAULT NULL,
  `plan_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`id`, `title`, `price`, `features`, `plan_type`, `created_at`) VALUES
(1, NULL, NULL, NULL, NULL, '2025-05-09 13:00:37'),
(2, NULL, NULL, NULL, NULL, '2025-05-09 13:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_url`, `category`, `created_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, '2025-05-09 13:00:25'),
(2, NULL, NULL, NULL, NULL, NULL, '2025-05-09 13:00:35'),
(3, NULL, NULL, NULL, NULL, NULL, '2025-05-09 13:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `id` int(11) NOT NULL,
  `page` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`id`, `page`, `action`, `timestamp`) VALUES
(1, '/sharaztechnologies/index.php', 'visit', '2025-05-09 15:50:44'),
(2, '/sharaztechnologies/index.php', 'visit', '2025-05-09 15:51:11'),
(3, '/sharaztechnologies/index.php', 'visit', '2025-05-09 15:51:33'),
(4, '/sharaztechnologies/index.php', 'visit', '2025-05-09 15:52:23'),
(5, '/sharaztechnologies/index.php', 'visit', '2025-05-09 15:53:23'),
(6, '/sharaztechnologies/index.php', 'visit', '2025-05-09 16:29:49'),
(7, '/sharaztechnologies/index.php', 'visit', '2025-05-09 16:46:52'),
(8, '/sharaztechnologies/index.php', 'visit', '2025-05-09 16:51:06'),
(9, '/sharaztechnologies/index.php', 'visit', '2025-05-09 16:56:09'),
(10, '/sharaztechnologies/index.php', 'visit', '2025-05-09 16:56:22'),
(11, '/sharaztechnologies/index.php', 'visit', '2025-05-09 17:00:32'),
(12, '/sharaztechnologies/index.php', 'visit', '2025-05-09 17:03:04'),
(13, '/sharaztechnologies/index.php', 'visit', '2025-05-09 17:05:57'),
(14, '/sharaztechnologies/index.php', 'visit', '2025-05-09 17:19:00'),
(15, '/sharaztechnologies/index.php', 'visit', '2025-05-09 17:21:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
