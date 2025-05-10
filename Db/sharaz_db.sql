-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2025 at 12:22 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subscribed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(15, '/sharaztechnologies/index.php', 'visit', '2025-05-09 17:21:11'),
(16, '/sharaztechnologies/index.php', 'visit', '2025-05-10 10:52:24'),
(17, '/sharaztechnologies/index.php', 'visit', '2025-05-10 10:54:14'),
(18, '/sharaztechnologies/index.php', 'visit', '2025-05-10 10:55:48'),
(19, '/sharaztechnologies/index.php', 'visit', '2025-05-10 11:06:51'),
(20, '/sharaztechnologies/index.php', 'visit', '2025-05-10 11:07:45'),
(21, '/sharaztechnologies/index.php', 'visit', '2025-05-10 11:18:08'),
(22, '/sharaztechnologies/index.php', 'visit', '2025-05-10 11:20:14'),
(23, '/sharaztechnologies/index.php', 'visit', '2025-05-10 11:20:16'),
(24, '/sharaztechnologies/index.php', 'visit', '2025-05-10 11:30:25'),
(25, '/sharaztechnologies/index.php', 'visit', '2025-05-10 11:34:09'),
(26, '/sharaztechnologies/index.php', 'visit', '2025-05-10 11:36:20'),
(27, '/sharaztechnologies/index.php', 'visit', '2025-05-10 11:43:00'),
(28, '/sharaztechnologies/index.php', 'visit', '2025-05-10 11:43:54'),
(29, '/sharaztechnologies/index.php', 'visit', '2025-05-10 11:47:46'),
(30, '/sharaztechnologies/index.php', 'visit', '2025-05-10 11:48:50'),
(31, '/sharaztechnologies/index.php', 'visit', '2025-05-10 11:53:23'),
(32, '/sharaztechnologies/index.php', 'visit', '2025-05-10 11:54:10'),
(33, '/sharaztechnologies/index.php', 'visit', '2025-05-10 11:57:06'),
(34, '/sharaztechnologies/index.php', 'visit', '2025-05-10 11:57:53'),
(35, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:01:57'),
(36, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:03:07'),
(37, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:09:38'),
(38, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:10:21'),
(39, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:16:33'),
(40, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:19:07'),
(41, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:21:00'),
(42, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:28:42'),
(43, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:32:03'),
(44, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:32:56'),
(45, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:33:19'),
(46, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:34:14'),
(47, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:35:03'),
(48, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:36:26'),
(49, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:38:30'),
(50, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:38:45'),
(51, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:38:45'),
(52, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:39:52'),
(53, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:39:59'),
(54, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:39:59'),
(55, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:42:42'),
(56, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:45:06'),
(57, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:46:12'),
(58, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:46:25'),
(59, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:48:14'),
(60, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:48:29'),
(61, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:49:21'),
(62, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:49:24'),
(63, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:52:24'),
(64, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:56:15'),
(65, '/sharaztechnologies/index.php', 'visit', '2025-05-10 12:59:03'),
(66, '/sharaztechnologies/index.php', 'visit', '2025-05-10 13:00:26'),
(67, '/sharaztechnologies/index.php', 'visit', '2025-05-10 13:04:49'),
(68, '/sharaztechnologies/index.php', 'visit', '2025-05-10 13:05:00'),
(69, '/sharaztechnologies/index.php', 'visit', '2025-05-10 13:06:58'),
(70, '/sharaztechnologies/index.php', 'visit', '2025-05-10 13:07:07'),
(71, '/sharaztechnologies/index.php', 'visit', '2025-05-10 13:07:20'),
(72, '/sharaztechnologies/index.php', 'visit', '2025-05-10 13:08:07'),
(73, '/sharaztechnologies/index.php', 'visit', '2025-05-10 13:09:32'),
(74, '/sharaztechnologies/index.php', 'visit', '2025-05-10 13:14:19'),
(75, '/sharaztechnologies/index.php', 'visit', '2025-05-10 13:15:35'),
(76, '/sharaztechnologies/index.php', 'visit', '2025-05-10 13:17:16'),
(77, '/sharaztechnologies/index.php', 'visit', '2025-05-10 13:18:43');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
