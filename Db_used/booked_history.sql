-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 10, 2020 at 09:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `central_lib`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_history`
--

CREATE TABLE `booked_history` (
  `book_id` varchar(11) NOT NULL,
  `issued` date NOT NULL DEFAULT current_timestamp(),
  `returned` date DEFAULT NULL,
  `user_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_history`
--

INSERT INTO `booked_history` (`book_id`, `issued`, `returned`, `user_id`) VALUES
('1', '2020-04-06', NULL, 'CLY31713'),
('12006', '2020-04-07', NULL, 'CLY66729'),
('12019', '2020-04-07', NULL, 'CLY66729'),
('12022', '2020-04-07', NULL, 'CLY31212'),
('12026', '2020-04-07', NULL, 'CLY66729'),
('12079', '2020-04-09', NULL, 'CLY54450');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_history`
--
ALTER TABLE `booked_history`
  ADD UNIQUE KEY `book_id` (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
