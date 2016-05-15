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
-- Table structure for table `shit_events`
--

CREATE TABLE `shit_events` (
  `ID` int(11) NOT NULL,
  `TITLE` text NOT NULL,
  `DATE` date NOT NULL,
  `TIME` text NOT NULL,
  `LOCATION` text NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `DIRECTIONS` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shit_events`
--

INSERT INTO `shit_events` (`ID`, `TITLE`, `DATE`, `TIME`, `LOCATION`, `DESCRIPTION`, `DIRECTIONS`) VALUES
(3, 'My Event', '2015-11-25', '7:10pm', 'My Butt', 'It&apos;s a hole', 'just get there!'),
(4, 'EWH3 Turkey Run', '2015-11-26', '11:00am', 'Rosslyn. Follow chalk marks from metro', 'If you&apos;re in town, looking for a way to make putting up with the in-laws more tolerable, be sure to come out!.<div>It&apos;s their annual pre-thanksgiving run.&nbsp;</div>', ''),
(5, ' S.H.I.T. 2016 Beer, Bus, BBQ, Brewery Annual General Meeting (AGM)', '2016-09-24', '3:00 PM', '<div><span style="color: rgb(78, 86, 101); font-family: helvetica, arial, sans-serif; line-height: 18.76px;">Next to: McLean Bible Church 10002 Battleview Pkwy, Manassas, VA 20109</span></div>', '<div>9/24/2016</div><div><br></div><span style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;">It is one again time for the So Happy It&apos;s Tuesday Hash House Harriers Annual General meeting.</span><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><span style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;">This year we have something very special planned for you for the low low price of $80.00.</span><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><span style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;">BEER, "BUS", BBQ, BREWERY</span><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><span style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;">What Do You Get?</span><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><span style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;">A S.H.I.T.y giveaway</span><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><span style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;">A catered BBQ Dinner from The Bone</span><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><span style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;">4 Brewery Stops with one beer each and all you can drink at the last.</span><span class="text_exposed_show" style="display: inline; color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><br>Frequent Uhaul Rides<br>8 Miles of beutiful Trail<br><br>How it Works:<br>You Run<br>You Drink<br>You Uhaul<br><br>You Run<br>You Drink<br>You Uhaul<br><br>You Run<br>You Drink<br>You Uhaul<br><br>You Run&nbsp;<br>You Drink<br>You Party<br></span><div><span class="text_exposed_show" style="display: inline; color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><br></span></div><div><span class="text_exposed_show" style="display: inline; color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;">Email Herpicles@hotmail.com for Registration Form</span></div>', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shit_events`
--
ALTER TABLE `shit_events`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shit_events`
--
ALTER TABLE `shit_events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
