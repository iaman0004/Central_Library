-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 10, 2020 at 09:13 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_dob` date NOT NULL,
  `user_gender` char(1) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_seq_ans` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_dob`, `user_gender`, `user_email`, `user_phone`, `user_password`, `user_seq_ans`) VALUES
('CLY18995', 'Raichu Priyanshi', '2020-04-03', 'F', 'raichu@papakipari.com', 461446464, 'raka', 'up'),
('CLY29444', 'Neeraj Singh', '2001-12-10', 'M', 'bagira@jungle.com', 879646946, 'bagira', 'hhh'),
('CLY31212', 'Admin', '2003-11-10', 'F', 'admin@gmail.com', 9496469, 'admin', 'up'),
('CLY31713', 'Aman Sharma', '1998-08-28', 'M', 'amanthesmartboy420@gmail.com', 2147483647, 'aman', 'tara'),
('CLY54450', 'Aman Sharma', '2020-04-01', 'M', 'aman@gmail.com', 2147483647, 'aman', 'tara'),
('CLY54682', 'Anjali Sharma', '2000-09-12', 'F', 'anjali@gmail.com', 1234567890, 'anjali', 'delhi'),
('CLY66729', 'Aman Sharma', '2014-07-18', 'M', 'aman0004@hotmail.com', 2147483647, 'aman', 'govt'),
('CLY85497', 'Bhawna Shukla', '2000-09-21', 'F', 'piddi@gmail.com', 2147483647, 'piddi', 'mathura');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
