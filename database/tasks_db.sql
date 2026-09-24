-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2026 at 09:26 AM
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
-- Database: `tasks_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `task_date` date NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `status`, `task_date`, `created_at`) VALUES
(1, 'Review Module 1 notes', 'done', '2026-09-24', '2026-09-24 15:09:57'),
(2, 'Submit lab activity 2', 'pending', '2026-09-24', '2026-09-24 15:09:57'),
(3, 'Team standup meeting', 'pending', '2026-09-24', '2026-09-24 15:09:57'),
(4, 'Prepare database schema draft', 'done', '2026-09-23', '2026-09-24 15:09:57'),
(5, 'Read CodeIgniter routing docs', 'done', '2026-09-23', '2026-09-24 15:09:57'),
(6, 'Write project README', 'pending', '2026-09-23', '2026-09-24 15:09:57'),
(7, 'Set up XAMPP environment', 'done', '2026-09-22', '2026-09-24 15:09:57'),
(8, 'Install Composer dependencies', 'done', '2026-09-22', '2026-09-24 15:09:57'),
(9, 'Draft system requirements', 'pending', '2026-09-21', '2026-09-24 15:09:57'),
(10, 'Review Module 1 notes', 'done', '2026-09-24', '2026-09-24 15:11:06'),
(11, 'Submit lab activity 2', 'pending', '2026-09-24', '2026-09-24 15:11:06'),
(12, 'Team standup meeting', 'pending', '2026-09-24', '2026-09-24 15:11:06'),
(13, 'Prepare database schema draft', 'done', '2026-09-23', '2026-09-24 15:11:06'),
(14, 'Read CodeIgniter routing docs', 'done', '2026-09-23', '2026-09-24 15:11:06'),
(15, 'Write project README', 'pending', '2026-09-23', '2026-09-24 15:11:06'),
(16, 'Set up XAMPP environment', 'done', '2026-09-22', '2026-09-24 15:11:06'),
(17, 'Install Composer dependencies', 'done', '2026-09-22', '2026-09-24 15:11:06'),
(18, 'Draft system requirements', 'pending', '2026-09-21', '2026-09-24 15:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `created_at`) VALUES
(1, 'Christian', 'Christian Danielle Ola', 'ceola@fit.edu.ph', '2026-09-24 15:09:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
