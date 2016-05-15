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
-- Table structure for table `shit_hashes`
--

CREATE TABLE `shit_hashes` (
  `id` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shit_hashes`
--

INSERT INTO `shit_hashes` (`id`, `hash`) VALUES
(1, 'SH*T H3'),
(2, 'OTH4'),
(3, 'White House H3'),
(4, 'Mount Vernon H3'),
(5, 'Every Day Is Wednesday'),
(6, 'DCH4'),
(7, 'Baltimore-Annapolis H3'),
(8, 'Great Falls H3'),
(9, 'Maryland Dirt Road H3'),
(10, 'Seven Hills H3 (7H4)'),
(11, 'Puerto Rico H3'),
(12, 'Hanging Chad H3 Nairobi'),
(13, 'AHHH3'),
(14, 'Cairo HHH'),
(15, 'CH4'),
(16, 'Tidewater HHH');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shit_hashes`
--
ALTER TABLE `shit_hashes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shit_hashes`
--
ALTER TABLE `shit_hashes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
