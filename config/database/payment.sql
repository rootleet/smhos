-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2021 at 01:52 PM
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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `amount_paid` decimal(50,2) DEFAULT NULL,
  `date_paid` date NOT NULL,
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
  `amount_balance` decimal(50,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amount_paid`, `date_paid`, `time_paid`, `level`, `method`, `booking`, `refund`, `master`, `p_count`, `customer`, `receptionist`, `facility`, `amount_owed`, `amount_balance`) VALUES
(1, '55.21', '2021-04-04', '08:33:29', 'Primary', 'Cash', 1, 0, 0, 0, 'Jane Doe', 'root', 'Facility', '100.00', '44.79');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
