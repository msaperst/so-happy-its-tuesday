-- phpMyAdmin SQL Dump
-- version 
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2016 at 08:31 PM
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
-- Table structure for table `shit_who`
--

CREATE TABLE `shit_who` (
  `id` int(11) NOT NULL,
  `hash_id` int(11) NOT NULL DEFAULT '0',
  `hshr_id` int(11) NOT NULL DEFAULT '0',
  `event_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shit_who`
--

INSERT INTO `shit_who` (`id`, `hash_id`, `hshr_id`, `event_id`) VALUES
(589, 0, 6, 4),
(588, 0, 3, 4),
(587, 0, 13, 4),
(586, 0, 170, 4),
(585, 0, 142, 4),
(584, 0, 169, 4),
(583, 0, 83, 4),
(582, 0, 162, 4),
(581, 0, 177, 4),
(580, 0, 164, 4),
(579, 0, 178, 4),
(578, 0, 141, 4),
(577, 0, 166, 4),
(576, 0, 148, 4),
(575, 0, 160, 4),
(1428, 0, 23, -1),
(391, 0, 173, 1),
(390, 0, 6, 1),
(389, 0, 3, 1),
(388, 0, 170, 1),
(387, 0, 19, 1),
(386, 0, 142, 1),
(385, 0, 8, 1),
(384, 0, 134, 1),
(383, 0, 169, 1),
(382, 0, 159, 1),
(381, 0, 83, 1),
(380, 0, 117, 1),
(379, 0, 168, 1),
(378, 0, 164, 1),
(377, 0, 160, 1),
(376, 0, 145, 1),
(375, 0, 141, 1),
(374, 0, 148, 1),
(373, 0, 161, 1),
(372, 0, 2, 1),
(371, 0, 143, 1),
(370, 0, 23, 1),
(369, 0, 172, 1),
(368, 0, 4, 1),
(367, 0, 80, 1),
(366, 0, 13, 1),
(392, 0, 165, 1),
(393, 0, 118, 1),
(574, 0, 161, 4),
(573, 0, 145, 4),
(572, 0, 174, 4),
(571, 0, 23, 4),
(570, 0, 4, 4),
(569, 0, 176, 4),
(590, 0, 179, 4),
(632, 0, 13, 5),
(631, 0, 170, 5),
(630, 0, 142, 5),
(629, 0, 164, 5),
(628, 0, 169, 5),
(627, 0, 159, 5),
(626, 0, 83, 5),
(625, 0, 148, 5),
(624, 0, 161, 5),
(623, 0, 23, 5),
(622, 0, 80, 5),
(633, 0, 3, 5),
(648, 0, 165, 6),
(647, 0, 6, 6),
(646, 0, 142, 6),
(645, 0, 23, 6),
(644, 0, 4, 6),
(1421, 0, 165, 7),
(1420, 0, 168, 7),
(1419, 0, 228, 7),
(1418, 0, 189, 7),
(1417, 0, 3, 7),
(1416, 0, 225, 7),
(1415, 0, 6, 7),
(1414, 0, 188, 7),
(1413, 0, 19, 7),
(1412, 0, 229, 7),
(1411, 0, 170, 7),
(1410, 0, 186, 7),
(1409, 0, 197, 7),
(1408, 0, 231, 7),
(1407, 0, 223, 7),
(1406, 0, 222, 7),
(1405, 0, 224, 7),
(1404, 0, 211, 7),
(1403, 0, 184, 7),
(1402, 0, 226, 7),
(1401, 0, 164, 7),
(1400, 0, 8, 7),
(1399, 0, 208, 7),
(1398, 0, 203, 7),
(1397, 0, 134, 7),
(1396, 0, 169, 7),
(1395, 0, 83, 7),
(1394, 0, 209, 7),
(1393, 0, 117, 7),
(1392, 0, 204, 7),
(1391, 0, 230, 7),
(1390, 0, 218, 7),
(1389, 0, 227, 7),
(1388, 0, 141, 7),
(1387, 0, 152, 7),
(1386, 0, 217, 7),
(1385, 0, 148, 7),
(1384, 0, 160, 7),
(1383, 0, 221, 7),
(1382, 0, 161, 7),
(1381, 0, 233, 7),
(1380, 0, 219, 7),
(1379, 0, 143, 7),
(1378, 0, 162, 7),
(1377, 0, 4, 7),
(1376, 0, 210, 7),
(1375, 0, 80, 7),
(1374, 0, 232, 7),
(1422, 0, 118, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shit_who`
--
ALTER TABLE `shit_who`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hash_id` (`hash_id`,`hshr_id`),
  ADD KEY `event_id` (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shit_who`
--
ALTER TABLE `shit_who`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1429;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
