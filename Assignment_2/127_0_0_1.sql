-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2017 at 05:59 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpclassfall2017`
--
CREATE DATABASE IF NOT EXISTS `phpclassfall2017` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpclassfall2017`;

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

DROP TABLE IF EXISTS `actors`;
CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `firstname` varchar(250) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(250) COLLATE utf8_bin NOT NULL,
  `dob` varchar(25) COLLATE utf8_bin NOT NULL,
  `height` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `firstname`, `lastname`, `dob`, `height`) VALUES
(1, 'Ben', 'Affleck', 'August 15, 1972', '6 '' 3'),
(3, 'Benedict ', 'Cumberbatch', 'July 19, 1976', '6 '' '),
(4, 'Morgan', 'Freeman', 'June 1, 1937', '6 '' 2'),
(5, 'Gerard', 'Butler', 'November 13, 1969', '6 '' 2'),
(6, 'Keanu', 'Reeves ', 'September 2, 1964', '6 '' 1'),
(7, 'Taron ', 'Egerton', 'November 10, 1989', '5 '' 9'),
(8, 'Joseph', 'Gordon-Levitt', 'February 17, 1981', '5 '' 9'),
(9, 'Jackie', 'Chan', 'April 7, 1954', '5 '' 8'),
(10, 'Kim ', 'Woo Bin ', 'July 16, 1989', '6 '' 1'),
(11, 'Denzel', 'Washington', 'December 28, 1954', '6 '' 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
