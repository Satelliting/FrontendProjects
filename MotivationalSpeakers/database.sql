-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 22, 2020 at 07:04 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satelli1_appima`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` bigint(20) NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `eventSpeaker` varchar(255) NOT NULL,
  `eventTime` float NOT NULL,
  `eventCost` float NOT NULL DEFAULT '0',
  `eventSize` int(11) NOT NULL,
  `eventDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `eventLocation` varchar(255) NOT NULL,
  `eventCity` varchar(255) NOT NULL,
  `eventState` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `eventName`, `eventSpeaker`, `eventTime`, `eventCost`, `eventSize`, `eventDate`, `eventLocation`, `eventCity`, `eventState`) VALUES
(1, 'Apple Keynote', 'Jane Doe', 0.5, 20, 500, '2020-04-01 19:00:00', 'Coolray Field', 'Atlanta', 'GA'),
(2, 'Basic Title that Truncates When Overflowing', 'Eric Chan', 2, 50, 250, '2020-05-13 19:00:00', 'Atlanta Symphony Orchestra', 'Atlanta', 'GA'),
(3, 'Node, NPM, and You', 'SunTrust Plaza', 1, 100, 300, '2021-01-01 20:00:00', 'SunTrust Plaza', 'Atlanta', 'GA'),
(4, 'Facebook Developer Conference', 'Ryan Bruzan', 8, 200, 100, '2021-05-11 19:00:00', '191 Peachtree Tower', 'Lawrenceville', 'GA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
