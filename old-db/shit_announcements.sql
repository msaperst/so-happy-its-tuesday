-- phpMyAdmin SQL Dump
-- version 
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2016 at 08:29 PM
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
-- Table structure for table `shit_announcements`
--

CREATE TABLE `shit_announcements` (
  `ID` int(11) NOT NULL,
  `TITLE` text NOT NULL,
  `FROMDATE` date NOT NULL,
  `TODATE` date NOT NULL,
  `DESCRIPTION` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shit_announcements`
--

INSERT INTO `shit_announcements` (`ID`, `TITLE`, `FROMDATE`, `TODATE`, `DESCRIPTION`) VALUES
(2, 'Herp Likes Dirt', '2015-11-20', '2015-11-30', 'He really does!'),
(13, ' S.H.I.T. 2016 Beer, Bus, Brewery Annual General Meeting (AGM', '2016-03-24', '2016-09-25', '<div>9/24/2016</div><div><br></div><span style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;">It is one again time for the So Happy It&apos;s Tuesday Hash House Harriers Annual General meeting.</span><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><span style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;">This year we have something very special planned for you for the low low price of $80.00.</span><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><span style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;">BEER, "BUS", BBQ, BREWERY</span><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><span style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;">What Do You Get?</span><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><span style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;">A S.H.I.T.y giveaway</span><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><span style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;">A catered BBQ Dinner from The Bone</span><br style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;"><span style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; line-height: 18.76px;">4 Brewery Stops with one beer each and all you can drink at the last.</span><span class="text_exposed_show" style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; display: inline; line-height: 18.76px;"><br>Frequent Uhaul Rides<br>8 Miles of beutiful Trail<br><br>How it Works:<br>You Run<br>You Drink<br>You Uhaul<br><br>You Run<br>You Drink<br>You Uhaul<br><br>You Run<br>You Drink<br>You Uhaul<br><br>You Run&nbsp;<br>You Drink<br>You Party<br></span><div><span class="text_exposed_show" style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; display: inline; line-height: 18.76px;"><br></span></div><div><span class="text_exposed_show" style="color: rgb(20, 24, 35); font-family: helvetica, arial, sans-serif; display: inline; line-height: 18.76px;">Email Herpicles@hotmail.com for Registration Form</span></div>'),
(12, 'Friday Nov 20 Beltway Bob&apos;s at Spider Kelly&apos;s hosted by S.H.I.T H3!', '2015-11-19', '2015-11-21', 'SHIT H3 is hosting Beltway Bob&apos;s on Friday, November 20th! Our freshly-minted ambassador TWOS, in her first ambassadorial action, has decided to send everyone to <a href="http://spiderkellys.com/">Spider Kelly&apos;s</a>&nbsp;in Clarendon. Now, we at SHIT haven&apos;t been very good at showing up to our own Beltway Bob&apos;s so let&apos;s see if we can change that! Don&apos;t leave TWOS to face down a bunch of non-SHIT wankers alone!<div><br></div><div>-Dr. C</div>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shit_announcements`
--
ALTER TABLE `shit_announcements`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shit_announcements`
--
ALTER TABLE `shit_announcements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
