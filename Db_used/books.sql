-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 10, 2020 at 09:22 PM
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
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `book_author` varchar(50) NOT NULL,
  `book_section` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_author`, `book_section`) VALUES
(12000, 'The eyes of darkness', 'Dean Koontz', 'Y1'),
(12001, 'The hunger games', 'Suzzane collins', 'Y2'),
(12002, 'Hunted', 'Evangeline anderson', 'Y3'),
(12003, 'Claimed', 'Evangeline anderson', 'Y4'),
(12004, 'The selection series collection', 'Kiera cases', 'Y5'),
(12005, '1984', 'George orwell', 'Y6'),
(12006, 'divergent', 'Veronica roth', 'Y7'),
(12007, 'The hunger games trilogy', 'Suzzane collins', 'Y8'),
(12008, 'Dark matter', 'Blake crouch', 'Y9'),
(12009, 'Found', 'Evangeline anderson', 'Y10'),
(12010, 'Red queen', 'Victoria Aveyard', 'Y1'),
(12011, 'King\'s cage', 'VIctoria Aveyard', 'Y2'),
(12012, 'The heir', 'Kiera cases', 'Y3'),
(12013, 'The one', 'Kiera cases', 'Y4'),
(12014, 'Animal farm', 'George orwell', 'Y5'),
(12015, 'The elite', 'Kiera cases', 'Y6'),
(12016, 'Catching fire', 'Suzzane collins', 'Y7'),
(12017, 'Insurgent', 'Veronica roth', 'Y8'),
(12018, 'Clockwork angel', 'Cassandra clare', 'Y9'),
(12019, 'Allegiant', 'Veronica roth', 'Y10'),
(12020, 'Worm', 'Wildbow', 'Y1'),
(12021, 'The maze runner', 'James dashener', 'Y2'),
(12022, 'Watchers', 'Dean Koontz', 'Y3'),
(12023, 'Darkness', 'Laurann dohner', 'Y4'),
(12024, 'Exiled', 'Evangeline anderson', 'Y5'),
(12025, 'Design Patterns', 'Ralph Johnson', 'Y6'),
(12026, 'Code Complete', 'Steve McConnell', 'Y7'),
(12027, 'Introduction to Algorithms, 3rd Edition', 'Thomas H. Cormen', 'Y8'),
(12028, 'Compilers', 'Alfred V. Aho', 'Y9'),
(12029, 'Purely Functional Data Structures', ' Chris Okasaki', 'Y10'),
(12030, 'Introduction To Algorithms', 'Thomas H Cormen', 'Y1'),
(12031, 'Applying UML and Patterns', 'Craig Larman', 'Y2'),
(12032, 'Programming Pearls', 'Jon Louis Bentley', 'Y3'),
(12033, 'The Algorithm Design Manual', ' Steven S. Skiena', 'Y4'),
(12034, 'Concrete Mathematics', ' Ronald L. Graham', 'Y5'),
(12035, 'The Algorithm Design Manual: Text', 'Steven S. Skiena', 'Y6'),
(12036, 'Modern Operating Systems', 'Andrew S. Tanenbaum', 'Y7'),
(12037, 'Algorithms', ' Robert Sedgewick', 'Y8'),
(12038, 'Eloquent Ruby', 'Russ Olsen', 'Y9'),
(12039, 'Advanced Programming in the UNIX Environment', 'W. Richard Stevens', 'Y10'),
(12040, 'Artificial Intelligence', 'Stuart Jonathan Russell', 'Y1'),
(12041, 'Project retrospectives', 'Norman L. Kerth', 'Y2'),
(12042, 'Object-oriented Analysis and Design with Applicati', ' Grady Booch', 'Y3'),
(12043, 'The C# Programming Language', ' Anders Hejlsberg', 'Y4'),
(12044, 'The Mythical Man-month', 'Frederick Phillips Brooks', 'Y5'),
(12045, 'An Introduction to Database Systems', 'C. J. Date', 'Y6'),
(12046, 'Language Implementation Patterns', ' Terence Parr', 'Y7'),
(12047, 'Introduction to the Theory of Computation', 'Michael Sipser', 'Y8'),
(12048, 'LISP in Small Pieces', 'Christian Queinnec', 'Y9'),
(12049, 'Sapiens:  A Brief history of humankind', 'Yuval noah haran', 'Y10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
