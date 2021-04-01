-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2021 at 04:42 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `catques`
--

CREATE TABLE `catques` (
  `catquesid` int(11) NOT NULL,
  `categori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catques`
--

INSERT INTO `catques` (`catquesid`, `categori`) VALUES
(1, 'Keramahan PTSP ?'),
(2, 'Pelayanan PTSP ?');

-- --------------------------------------------------------

--
-- Table structure for table `ques`
--

CREATE TABLE `ques` (
  `id` int(10) NOT NULL,
  `catquesid` int(11) NOT NULL,
  `jawaban` varchar(11) NOT NULL,
  `jawabA` int(11) NOT NULL,
  `jawabB` int(11) NOT NULL,
  `jawabC` int(11) NOT NULL,
  `jawabD` int(11) NOT NULL,
  `jawabE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ques`
--

INSERT INTO `ques` (`id`, `catquesid`, `jawaban`, `jawabA`, `jawabB`, `jawabC`, `jawabD`, `jawabE`) VALUES
(3, 1, 'B', 0, 1, 0, 0, 0),
(4, 2, 'B', 0, 1, 0, 0, 0),
(5, 1, 'A', 1, 0, 0, 0, 0),
(6, 2, 'C', 0, 0, 1, 0, 0),
(7, 1, 'A', 1, 0, 0, 0, 0),
(8, 2, 'B', 0, 1, 0, 0, 0),
(9, 1, 'B', 0, 1, 0, 0, 0),
(10, 2, 'B', 0, 1, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catques`
--
ALTER TABLE `catques`
  ADD PRIMARY KEY (`catquesid`);

--
-- Indexes for table `ques`
--
ALTER TABLE `ques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catquesid` (`catquesid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catques`
--
ALTER TABLE `catques`
  MODIFY `catquesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ques`
--
ALTER TABLE `ques`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ques`
--
ALTER TABLE `ques`
  ADD CONSTRAINT `ques_ibfk_1` FOREIGN KEY (`catquesid`) REFERENCES `catques` (`catquesid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
