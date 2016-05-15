-- phpMyAdmin SQL Dump
-- version 
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2016 at 08:30 PM
-- Server version: 5.6.29-percona-sure1-log
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sohappyh_shith3`
--

-- --------------------------------------------------------

--
-- Table structure for table `shit_mismanagement`
--

CREATE TABLE `shit_mismanagement` (
  `position` varchar(255) NOT NULL DEFAULT '',
  `hshr_id` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shit_mismanagement`
--

INSERT INTO `shit_mismanagement` (`position`, `hshr_id`) VALUES
('Beer Bitch', 80),
('Grand Masters', 2),
('Grand Masters', 3),
('Grand Masters', 5),
('Grand Masters', 6),
('Grand Masters', 13),
('Grand Masters', 80),
('Grand Masters', 196),
('Grand Masters', 254),
('Grand Masters', 304),
('Grand Masters', 312),
('Hash Cash', 122),
('Hash Master', 375),
('Hashshit Meister', 480),
('High Violator', 385),
('Media Slut', 16),
('Pornicator', 474),
('PUD-JAM Whore', 476),
('Rediculous Announcer', 388),
('SWAG Queen', 388),
('Trail Wrangler', 375),
('Trail Wrangler', 474);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shit_mismanagement`
--
ALTER TABLE `shit_mismanagement`
  ADD KEY `position` (`position`,`hshr_id`),
  ADD KEY `hshr_id` (`hshr_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
