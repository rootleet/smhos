-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 07, 2021 at 10:09 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SMHOS`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin.company_setup`
--

CREATE TABLE `admin.company_setup` (
  `id` int(11) NOT NULL,
  `c_name` text NOT NULL DEFAULT 'DEMO',
  `currency` int(11) NOT NULL,
  `add1` text NOT NULL,
  `add2` text NOT NULL,
  `add3` text NOT NULL,
  `add4` text NOT NULL,
  `add5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin.company_setup`
--

INSERT INTO `admin.company_setup` (`id`, `c_name`, `currency`, `add1`, `add2`, `add3`, `add4`, `add5`) VALUES
(1, 'DEMO', 1, 'West Africa', 'Ghana - Accra', 'Post Box 175', 'Spinted', '#6 bonded');

-- --------------------------------------------------------

--
-- Table structure for table `admin.currency`
--

CREATE TABLE `admin.currency` (
  `id` int(11) NOT NULL,
  `symbol` text NOT NULL,
  `short` text DEFAULT NULL,
  `active` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin.currency`
--

INSERT INTO `admin.currency` (`id`, `symbol`, `short`, `active`) VALUES
(1, '$', 'USD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `date_booked` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `date_booked`) VALUES
(1, '2021-04-04 06:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `check_in`
--

CREATE TABLE `check_in` (
  `id` int(11) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `amount_paid` text NOT NULL DEFAULT '0.00',
  `date_paid` date NOT NULL,
  `level` text DEFAULT 'Primary',
  `method` text DEFAULT 'unknown'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amount_paid`, `date_paid`, `level`, `method`) VALUES
(1, '100.00', '2021-04-04', 'Primary', 'unknown');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'user id',
  `username` text NOT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `password` text NOT NULL,
  `ual` int(11) NOT NULL DEFAULT 0,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `online` int(11) DEFAULT NULL,
  `ip_address` text DEFAULT NULL,
  `owner` text NOT NULL,
  `db_access` text NOT NULL DEFAULT 'current_user()',
  `last_login_time` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `ual`, `date_created`, `online`, `ip_address`, `owner`, `db_access`, `last_login_time`) VALUES
(1, 'root', 'root', 'leet', '$2y$10$bweYjvpJUBq1mFyTPgpEe.FV5hYpysqoHu/zGjnjnMT339aRaIzyu', 1, '2021-04-03 23:38:14', 1, '::1', 'mo', '0', NULL),
(3, 'jane', 'Jane', 'Doe', '$2y$10$tzQO6UhCtb6/WDc0qy/x7.D2U7AFrvb3XmIKoN.HKRtUrDFOr1oTa', 1, '2021-04-05 20:41:44', 0, '::1', 'root', 'current_user()', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_level`
--

CREATE TABLE `user_access_level` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `access_level` int(11) NOT NULL DEFAULT 0,
  `Perm_dashboard` int(11) NOT NULL DEFAULT 0 COMMENT 'permission for dashboard',
  `Perm_company_setup` int(11) NOT NULL DEFAULT 0 COMMENT 'permission for company setup view',
  `Perm_tax` int(11) NOT NULL DEFAULT 0,
  `Perm_payment_method` int(11) NOT NULL DEFAULT 0,
  `Perm_backup` int(11) NOT NULL DEFAULT 0,
  `Perm_modify_company` int(11) NOT NULL DEFAULT 0,
  `Perm_facility_management` int(11) NOT NULL DEFAULT 0,
  `Perm_user_management` int(11) NOT NULL DEFAULT 0,
  `Perm_reports` int(11) NOT NULL DEFAULT 0,
  `Perm_booking` int(11) NOT NULL DEFAULT 0,
  `Perm_check_in` int(11) NOT NULL DEFAULT 0,
  `Perm_payment` int(11) NOT NULL DEFAULT 0,
  `owner` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_level`
--

INSERT INTO `user_access_level` (`id`, `name`, `access_level`, `Perm_dashboard`, `Perm_company_setup`, `Perm_tax`, `Perm_payment_method`, `Perm_backup`, `Perm_modify_company`, `Perm_facility_management`, `Perm_user_management`, `Perm_reports`, `Perm_booking`, `Perm_check_in`, `Perm_payment`, `owner`) VALUES
(1, 'Administrator', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'root'),
(2, 'test', 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 'root');

-- --------------------------------------------------------

--
-- Table structure for table `user_login_log`
--

CREATE TABLE `user_login_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `func` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `time` time DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login_log`
--

INSERT INTO `user_login_log` (`id`, `user_id`, `username`, `func`, `date_created`, `time`) VALUES
(1, 1, 'root', 'logout', '2021-04-04 06:06:58', '01:15:58'),
(2, 1, 'root', 'login', '2021-04-04 06:09:03', '01:15:58'),
(3, 1, 'root', 'login', '2021-04-04 15:15:57', '01:15:58'),
(4, 1, 'root', 'logout', '2021-04-04 16:16:47', '01:15:58'),
(5, 1, 'root', 'login', '2021-04-04 16:17:51', '01:15:58'),
(6, 1, 'root', 'logout', '2021-04-04 16:41:27', '01:15:58'),
(7, 1, 'root', 'login', '2021-04-04 16:41:31', '01:15:58'),
(8, 1, 'root', 'logout', '2021-04-04 17:01:19', '01:15:58'),
(9, 1, 'root', 'login', '2021-04-04 17:01:26', '01:15:58'),
(10, 1, 'root', 'logout', '2021-04-04 17:13:38', '01:15:58'),
(11, 1, 'root', 'login', '2021-04-04 17:13:43', '01:15:58'),
(12, 1, 'root', 'logout', '2021-04-04 17:16:15', '01:15:58'),
(13, 1, 'root', 'login', '2021-04-04 17:16:19', '01:15:58'),
(14, 1, 'root', 'logout', '2021-04-04 17:16:55', '01:15:58'),
(15, 1, 'root', 'login', '2021-04-04 17:17:00', '01:15:58'),
(16, 1, 'root', 'login', '2021-04-05 14:28:07', '01:15:58'),
(17, 1, 'root', 'logout', '2021-04-05 19:11:46', '01:15:58'),
(18, 1, 'root', 'login', '2021-04-05 20:40:54', '01:15:58'),
(19, 1, 'root', 'logout', '2021-04-05 20:42:15', '01:15:58'),
(20, 1, 'root', 'login', '2021-04-05 20:42:28', '01:15:58'),
(21, 1, 'root', 'logout', '2021-04-05 20:42:31', '01:15:58'),
(22, 3, 'jane', 'login', '2021-04-05 21:01:26', '01:15:58'),
(23, 3, 'jane', 'logout', '2021-04-05 21:01:52', '01:15:58'),
(24, 1, 'root', 'login', '2021-04-05 21:02:03', '01:15:58'),
(25, 1, 'root', 'logout', '2021-04-06 00:41:31', '01:15:58'),
(26, 1, 'root', 'login', '2021-04-06 01:10:10', '01:15:58'),
(27, 1, 'root', 'logout', '2021-04-06 01:17:24', '01:17:24'),
(28, 1, 'root', 'login', '2021-04-06 05:32:34', '05:32:34'),
(29, 1, 'root', 'login', '2021-04-07 06:06:17', '06:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_task`
--

CREATE TABLE `user_task` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `task_status` int(11) NOT NULL DEFAULT 1,
  `task` text NOT NULL,
  `message` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_task`
--

INSERT INTO `user_task` (`id`, `user`, `task_status`, `task`, `message`, `date_created`) VALUES
(4, 'root', 0, '2', 'Password Reset', '2021-04-06 00:38:13'),
(5, 'root', 0, '2', 'Password Reset', '2021-04-06 00:41:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin.company_setup`
--
ALTER TABLE `admin.company_setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin.currency`
--
ALTER TABLE `admin.currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_in`
--
ALTER TABLE `check_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_level`
--
ALTER TABLE `user_access_level`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `access_level` (`access_level`);

--
-- Indexes for table `user_login_log`
--
ALTER TABLE `user_login_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_task`
--
ALTER TABLE `user_task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin.company_setup`
--
ALTER TABLE `admin.company_setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin.currency`
--
ALTER TABLE `admin.currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `check_in`
--
ALTER TABLE `check_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access_level`
--
ALTER TABLE `user_access_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_login_log`
--
ALTER TABLE `user_login_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_task`
--
ALTER TABLE `user_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
