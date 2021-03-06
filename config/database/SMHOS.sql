-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2021 at 05:06 PM
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
  `date_booked` date NOT NULL DEFAULT current_timestamp(),
  `fac_category` text DEFAULT 'none',
  `facility` text DEFAULT 'none',
  `quantity` int(11) DEFAULT 0,
  `receptionist` text DEFAULT 'unknown',
  `time_booked` time DEFAULT curtime(),
  `paid` int(11) DEFAULT NULL,
  `checkin` int(11) DEFAULT NULL,
  `cust_first_name` text DEFAULT 'unknown',
  `cust_last_name` text DEFAULT 'unknown',
  `cust_phone` text DEFAULT '+233 xx xxx xxxx',
  `cust_email` text DEFAULT 'none',
  `cost` decimal(50,2) DEFAULT NULL,
  `days` text DEFAULT '0',
  `arri_date` text DEFAULT 'not set',
  `dep_date` text DEFAULT '\'not set\'',
  `arr_time` time DEFAULT NULL,
  `dep_time` time DEFAULT NULL,
  `fac_number` int(11) DEFAULT 0,
  `hold` int(11) DEFAULT 0,
  `date_modified` text DEFAULT 'not modified',
  `time_modified` text DEFAULT 'not modified',
  `modified_by` text DEFAULT 'not modified',
  `special_request` text DEFAULT 'None',
  `refund` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `check_in`
--

CREATE TABLE `check_in` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `booking` int(11) DEFAULT NULL,
  `receptionist` text NOT NULL,
  `date_recorded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `amount_paid` decimal(50,2) DEFAULT NULL,
  `date_paid` date NOT NULL DEFAULT current_timestamp(),
  `time_paid` time NOT NULL DEFAULT current_timestamp(),
  `level` text DEFAULT 'Primary',
  `method` text DEFAULT 'unknown',
  `booking` int(11) DEFAULT NULL,
  `refund` int(11) DEFAULT 0,
  `master` int(11) DEFAULT 0,
  `p_count` int(11) DEFAULT 1,
  `customer` text DEFAULT NULL,
  `receptionist` text DEFAULT NULL,
  `facility` text DEFAULT NULL,
  `amount_owed` decimal(50,2) DEFAULT NULL,
  `amount_balance` decimal(50,2) DEFAULT NULL,
  `card_type` text DEFAULT NULL,
  `card_number` int(11) DEFAULT NULL,
  `momo_carrier` text DEFAULT NULL,
  `momo_sender` text DEFAULT NULL,
  `momo_number` text DEFAULT NULL,
  `momo_trans_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'test', 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 'root');

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
(29, 1, 'root', 'login', '2021-04-07 06:06:17', '06:06:17'),
(30, 1, 'root', 'logout', '2021-04-07 08:59:55', '08:59:55'),
(31, 1, 'root', 'login', '2021-04-07 22:54:27', '22:54:27'),
(32, 1, 'root', 'logout', '2021-04-09 08:48:18', '08:48:18'),
(33, 1, 'root', 'login', '2021-04-09 08:49:00', '08:49:00'),
(34, 1, 'root', 'logout', '2021-04-09 09:02:27', '09:02:27'),
(35, 1, 'root', 'login', '2021-04-09 11:34:12', '11:34:12'),
(36, 1, 'root', 'login', '2021-04-12 11:21:56', '11:21:56'),
(37, 1, 'root', 'login', '2021-04-14 22:57:32', '22:57:32'),
(38, 1, 'root', 'login', '2021-04-14 23:19:46', '23:19:46'),
(39, 1, 'root', 'logout', '2021-04-14 23:19:53', '23:19:53'),
(40, 1, 'root', 'login', '2021-04-15 12:32:17', '12:32:17'),
(41, 1, 'root', 'logout', '2021-04-20 18:55:27', '18:55:27'),
(42, 1, 'root', 'login', '2021-04-20 19:19:51', '19:19:51'),
(43, 1, 'root', 'logout', '2021-04-20 19:19:53', '19:19:53'),
(44, 1, 'root', 'login', '2021-04-20 20:15:44', '20:15:44'),
(45, 1, 'root', 'logout', '2021-04-20 20:19:45', '20:19:45'),
(46, 1, 'root', 'login', '2021-04-20 20:25:24', '20:25:24'),
(47, 1, 'root', 'logout', '2021-04-20 20:41:30', '20:41:30'),
(48, 1, 'root', 'login', '2021-04-20 20:42:34', '20:42:34'),
(49, 1, 'root', 'logout', '2021-04-20 20:54:39', '20:54:39'),
(50, 1, 'root', 'login', '2021-04-20 20:54:46', '20:54:46'),
(51, 1, 'root', 'logout', '2021-04-20 21:49:23', '21:49:23'),
(52, 1, 'root', 'login', '2021-04-24 00:59:27', '00:59:27'),
(53, 1, 'root', 'login', '2021-04-26 09:31:55', '09:31:55'),
(54, 1, 'root', 'logout', '2021-04-29 11:42:47', '11:42:47'),
(55, 1, 'root', 'login', '2021-04-29 11:43:28', '11:43:28'),
(56, 1, 'root', 'logout', '2021-04-29 18:36:27', '18:36:27'),
(57, 1, 'root', 'login', '2021-04-29 18:36:33', '18:36:33'),
(58, 1, 'root', 'logout', '2021-04-30 08:00:41', '08:00:41'),
(59, 1, 'root', 'login', '2021-04-30 09:59:53', '09:59:53'),
(60, 1, 'mina', 'logout', '2021-05-06 00:46:37', '00:46:37'),
(61, 1, 'root', 'login', '2021-05-06 01:01:02', '01:01:02'),
(62, 1, 'root', 'logout', '2021-05-06 06:46:05', '06:46:05'),
(63, 1, 'root', 'login', '2021-05-06 06:46:34', '06:46:34'),
(64, 1, 'root', 'logout', '2021-05-06 06:47:41', '06:47:41'),
(65, 1, 'root', 'login', '2021-05-06 10:03:40', '10:03:40'),
(66, 1, 'root', 'logout', '2021-05-06 10:06:10', '10:06:10'),
(67, 1, 'root', 'login', '2021-05-06 10:06:15', '10:06:15'),
(68, 1, 'root', 'logout', '2021-05-06 12:34:16', '12:34:16'),
(69, 1, 'root', 'login', '2021-05-21 08:15:05', '08:15:05'),
(70, 1, 'root', 'login', '2021-05-24 06:47:47', '06:47:47'),
(71, 1, 'root', 'login', '2021-05-24 09:50:39', '09:50:39'),
(72, 1, 'root', 'login', '2021-05-24 14:48:37', '14:48:37'),
(73, 1, 'root', 'logout', '2021-05-24 17:37:08', '17:37:08'),
(74, 1, 'root', 'login', '2021-05-24 17:37:18', '17:37:18'),
(75, 1, 'root', 'login', '2021-06-14 19:44:28', '19:44:28'),
(76, 1, 'root', 'logout', '2021-06-14 19:46:15', '19:46:15'),
(77, 1, 'root', 'login', '2021-06-15 06:33:16', '06:33:16'),
(78, 1, 'root', 'logout', '2021-06-15 06:35:28', '06:35:28'),
(79, 1, 'root', 'login', '2021-06-15 11:42:59', '11:42:59');

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
(5, 'root', 0, '2', 'Password Reset', '2021-04-06 00:41:23'),
(6, 'Mina', 1, '1', 'Initialize your account', '2021-04-09 08:59:04');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `check_in`
--
ALTER TABLE `check_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user id', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_access_level`
--
ALTER TABLE `user_access_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_login_log`
--
ALTER TABLE `user_login_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `user_task`
--
ALTER TABLE `user_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
