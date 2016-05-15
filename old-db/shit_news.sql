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
-- Table structure for table `shit_news`
--

CREATE TABLE `shit_news` (
  `id` int(11) NOT NULL,
  `headline` text NOT NULL,
  `story` text,
  `created` date NOT NULL DEFAULT '0000-00-00',
  `expires` date DEFAULT NULL,
  `hshr_id` int(11) NOT NULL DEFAULT '0',
  `display` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shit_news`
--

INSERT INTO `shit_news` (`id`, `headline`, `story`, `created`, `expires`, `hshr_id`, `display`) VALUES
(1, '<font color="#0000df">The SHOTH camping weekend is cumming 27 - 29 August.  <br>We are stealing the TITS campground for a weekend, so be sure to bring a tube.  <br>Get your <a href="/shoth/REGISTRATION%20FORM.doc">registration forms</a> and SIGN UP EARLY!! You will also need a <a href="/shoth/waiver.doc">waiver</a> for the campground.  </font>', NULL, '2004-05-16', '2004-08-29', 23, 1),
(2, 'We have new shirts available for the spring/summer, with more haberdashery on the way.<br>Talk to Udder Ho or FOC at the hash to get these stylish garments!', NULL, '2004-05-27', '2004-06-27', 23, 1),
(5, 'Directions are available on 202.NUB.DREK  #13, thanks to our Hare Raiser!', NULL, '2002-01-01', NULL, 23, 1),
(6, 'We finally have the <a href="/shoth/SHOTH-EVENTS.doc">SHOTH Camping Schedule of Events</a> online.  Check them out, fill out the registration, and get to the campground on August 27!!! ', NULL, '2004-07-04', '2004-08-29', 23, 1),
(7, 'We\'ve updated the <a href="/future_trails.php">future trails</a> page with new trails -- sign up now before they\'re gone!  All you have to do is let <a href="mailto:hareraiser@sohappyhash.com">Certified</a>    know.   ', NULL, '2004-08-16', '2004-08-29', 23, 1),
(8, 'Have you ever thought of being mismanagement?  Do you like long hours, no pay, and the scorn of your compatriots?  Well, look no further, because our AGM is cumming quickly (although we\'re talking to a shrink about it).  Check out the <a href="/mm2004.htm">duties of mismanagement</a> and send an email to <a href="mailto:mismanagement@sohappyhash.com">mismanagement@sohappyhash.com</a> if you\'re interested!', NULL, '2004-09-06', '2004-09-10', 23, 1),
(16, '\r\nNow that the summer is pretty much over, don\'t forget that it\'s starting to get dark earlier.  That means it\'s time to start bringing flashlights to the runs (or latch onto someone who <i>was</i> smart enough to bring one).\r\n', '\r\n<br />', '2004-10-10', '2004-10-10', 23, 1),
(17, '\r\nIf you thought the trails were fun, just imagine how much fun it is to relive it all over again!  If you haven\'t been reading our <a href="ttrash.php">hash trash</a>, you really should.  Udder Ho has been keeping them up quite well in the absence of an &quot;official&quot; scribe.  Of course, we are always willing to take submissions from other folks, too!  Just send them in an email to <a href="mailto:coacoas@sohappyhash.com?Subject=Trail Trash">Cum of a Cum of a Sailor</a><br />', '', '2004-09-20', '2004-10-31', 23, 1),
(18, '<font size="3" face="Arial" style="font-family: georgia,times new roman,times,serif;">OK, folks, I finally got a half a second together to\r\nput up some pictures from recent events.  And an hour and a half to\r\nupload them.  Now, you can finally have the chance to see what you\r\ncan\'t remember anymore!  So, without further ado, I give to you:<br />\r\n</font>\r\n<ul style="font-family: georgia,times new roman,times,serif;"><li><font size="3"><a href="../images/vaih2004/lt/album.php">Lactose\r\nTolerant\'s VA Interhash Pics</a></font></li><li><font size="3"><a href="../images/vaih2004/cert/album.php">Certified\'s\r\nVA Interhash Pics</a></font></li><li><font size="3"><a href="../images/agm2004/lt/album.php">Lactose\'s\r\nAGM Pics</a></font></li><li><font size="3"><a href="../images/agm2004/cert/album.php">Certified\'s\r\nAGM Pics</a></font></li><li><font size="3"><a href="../images/dcrdr2004/wk/album.php">White\r\nKane\'s DC Red Dress Run Pics</a><br /></font>\r\n    </li></ul>\r\n<font size="3" face="Arial" style="font-family: georgia,times new roman,times,serif;">You can also find these links on the &quot;<a href="../ttrash.php">Trash and Pics</a>&quot; page\r\non the website.  And of course, if you have any pictures laying around\r\nand would like to share your photographic skills with the world, just\r\nlet me know and I\'ll do my part.  <br />\r\n</font>\r\n', '', '2004-10-03', '2004-10-13', 23, 1),
(19, '<span style="font-family: georgia,times new roman,times,serif;">In case you haven\'t noticed, it\'s starting to get <span style="font-style: italic;">cold</span> out there during our runs.', '', '2004-10-10', '2005-03-31', 23, 1),
(20, '<font size="3"><span style="font-family: georgia,times new roman,times,serif;">We\'ve got pictures of the Halloween Hash online!', '', '2004-11-01', '2004-11-07', 23, 1),
(21, '<div style="text-align: center;"><span style="font-weight: bold;"><span style="font-family: georgia,times new roman,times,serif;">BOWLING!!!</span></span><br /><span style="font-weight: bold;"><span style="font-family: georgia,times new roman,times,serif;"></span></span></div><span style="font-weight: bold;"><span style="font-family: georgia,times new roman,times,serif;"><span style="font-weight: bold;"><span style="font-weight: bold;"></span></span></span></span><span style="font-family: georgia,times new roman,times,serif;">That\'s right, the SH*T Hash is going bowling, this Saturday (20 November) at the Bowl America on Dranesville.', '', '2004-11-16', '2004-11-21', 23, 1),
(22, 'For those of you that missed out on the skydiving trip this past weekend, the first round of <a href="/images/skydiving/album.php">pictures </a>are up!<br />\r\n', '', '2004-11-16', '2004-11-23', 23, 1),
(23, '<span style="font-family: georgia,times new roman,times,serif;">For those of you that have been patiently waiting, the pictures from the SH*Tty <a href="/images/bowling20041120/album.php">bowling </a>trip last month are now up!<br /></span>\r\n', '', '2004-12-09', '2004-12-20', 23, 1),
(24, '<span style="font-family: georgia,times new roman,times,serif;">We have new pictures available!', '', '2005-01-15', '2005-01-31', 23, 1),
(25, '<span style="font-family: georgia,times new roman,times,serif;"><img width="200" vspace="0" hspace="0" height="132" border="0" align="left" src="http://www.sohappyhash.com/images/mardigras2005.jpg" />Don\'t forget to mark your calendars for Mardi Gras 2005!  Join the "So Happy It\'s Fat Tuesday" Hash for fun and excitement, beer and beads!', '', '2005-02-04', '2005-02-03', 23, 0),
(26, '\r\n<span style="font-family: georgia,times new roman,times,serif;"><a href="http://www.hashraleigh.com/modules.php?op=modload&name=News&file=article&sid=65&mode=thread&order=0&thold=0"><img align="right" src="http://www.sohappyhash.com/images/triangleh3.gif" /></a>There\'s still time to sign up for the Triangle H3 2<sup>nd</sup> Anal-versary, January 28-30 in Durham, NC!  Be at Triangle, or be square!  Get information <a href="http://www.hashraleigh.com/modules.php?op=modload&name=News&file=article&sid=65&mode=thread&order=0&thold=0">here</a>!</span>', '', '2005-01-15', '2005-01-29', 23, 1),
(27, '<span style="font-family: georgia,times new roman,times,serif;">Check out the So Happy It\'s Tuesday hash on the radio!  That\'s right, Just Stephanie of Metro Connection on WAMU came out to the hash last week and submitted <a href="http://www.wamu.org/audio/mc/05/01/mc050114-6950.ram">this piece</a> that aired on Friday, 14 January.  See if you can find your favorite hashers... or queso!! <br /></span>\r\n', '', '2005-01-15', '2005-08-16', 23, 1),
(28, '\r\nOh, my God!  It\'s taken a while, but Udder finally got some company on the <a href="video.php">video page</a>!  For those of you who aren\'t loyal readers of Tuppy\'s blog, <a href="http://www.sohappyhash.com/video/tuppy_karaoke.mpg">here</a> is the video of <span style="font-style: italic;">her</span> karaoke routine during her birthday festivities last weekend!\r\n', '', '2005-01-26', '2005-02-02', 23, 1),
(29, '<a href="/Directions.php"><img src="/images/mardigras_ad01.jpeg"></a>', '', '2005-02-04', '2005-02-09', 23, 1),
(31, '<span style="font-family: georgia,times new roman,times,serif;">After a long absence, our hash flash has shown up in a big way!', '', '2005-03-01', '2005-03-15', 23, 1),
(32, '\r\nThere\'s another camping weekend set up for this summer already!  Don\'t forget to sign up for the Pittsburgh H3 Weekend of Mass Debauchery, June 3-5!<br />\r\n<a target="_blank" href="http://www.pgh-h3.com/WMD2005.html"><img src="/images/PGH_WMD_25th_smaller.jpg" /></a>', '', '2005-03-20', '2005-06-03', 23, 1),
(30, '\r\n<span style="font-family: georgia,times new roman,times,serif;">WV (We\'ve) got a whole new event coming up that you can sign up for right here -- and those of you who really miss the hash weekend experience will be thrilled to hear about it!  The First Ever West Virginia Interhash is being held April 22 - 24 in Berkeley Springs, WV.  Several people have already signed up?  Want to join us?  <a href="/story.php?id=30">Sign up here!  </a><span style="color: rgb(255, 0, 102);">We will only be accepting the first 20 registrations.  Space is limited, and it won\'t be around forever!  Sign up now!</span><br /></span>', '\r\n<center>\r\n<img src="/images/wv1_72.gif" /><br />\r\n<font size="5" face="Georgia" color="#800000">West Virginia Interhash I</font><br />\r\n<font size="4" face="Georgia" color="#800000">April 22 - 24, 2005</font><br />\r\n<font size="3" face="Georgia" color="#800000">Cost: $30 for lodging -- food and drink not included</font><br />\r\n</center>\r\n\r\n<p><font face="Georgia">\r\nWe will be staying in Bungalows which sleep 4 people on either beds or bunks. \r\nEach bungalow has a shower, kitchenette and screened in porch. \r\nSo we will be housing 4 people per bungalow, 6 at the most. \r\nWe are currently reserving 2 bungalows to start with for the VA hashers.\r\nIf we have more than 12 people then we will reserve a third. \r\nThe WV group is currently reserving 1 for themselves at this time. \r\n</font></p>\r\n \r\n<p><font face="Georgia">\r\nThe current flat rate for the bungalows is $60 a night, $120 for two nights....\r\nWe are asking each hasher to pay $30 for the weekend.</font></p>\r\n\r\n<p align="center"><font size="+1" face="Georgia">\r\n<b>This cost only includes the cost of the bungalow. Food &amp; Drink are not provided for. </b>\r\n</font></p>\r\n\r\n<p align="center"><font size="+1" face="Georgia">\r\n<font color="#ff0000">We will only accept the first 20 registrations!  Space is limited, so sign up now!</font>\r\n</font></p>\r\n\r\n<p align="center"><font size="+1" face="Georgia">\r\nMore details as they come, but hell, it\'s $30.  What are you waiting for?\r\n</font></p>\r\n\r\n<font face="Georgia"></font><p>&nbsp;</p><p><font face="Georgia">Curious about <a href="/coming.php?event=6">who\'s cumming</a>?</font></p>\r\n\r\n\r\n\r\n<hr />\r\n<center>\r\n<form action="https://www.paypal.com/cgi-bin/webscr" method="post">\r\n<input type="hidden" name="cmd" value="_xclick" />\r\n<input type="hidden" name="business" value="coacoas@sohappyhash.com" />\r\n<input type="hidden" name="undefined_quantity" value="1" />\r\n<input type="hidden" name="item_name" value="West Virginia Interhash 2005" />\r\n<input type="hidden" name="item_number" value="6" />\r\n<input type="hidden" name="amount" value="30.00" />\r\n<input type="hidden" name="no_shipping" value="1" />\r\n<input type="hidden" name="return" value="http://www.sohappyhash.com/index.php" />\r\n<input type="hidden" name="no_note" value="1" />\r\n<input type="hidden" name="currency_code" value="USD" />\r\n<table><tbody><tr><td><input type="hidden" name="on0" value="Hash Name" />Hash Name</td><td><input type="text" name="os0" maxlength="200" /></td></tr><tr><td><input type="hidden" name="on1" value="Home Hash" />Home Hash</td><td><input type="text" name="os1" maxlength="200" /></td></tr></tbody></table><input type="image" border="0" src="https://www.paypal.com/en_US/i/btn/x-click-but23.gif" name="submit" alt="Make payments with PayPal - it\'s fast, free and secure!" />\r\n</form>\r\n</center>\r\n', '2005-04-06', '2005-04-08', 23, 1),
(33, '<span style="font-family: georgia,times new roman,times,serif;">Don\'t forget to set your clocks ahead an hour for daylight savings time this Sunday, April 3!</span>\r\n', '', '2005-03-28', '2005-04-04', 23, 1),
(34, '\r\n<span style="font-family: georgia,times new roman,times,serif;">How long have you been wisshhhing we\'d put up some new pictures?  Well, wait no longer!  We now have <a title="WISSHHH Pictures" href="/images/wisshhh/album.php">pictures </a>from the first ever WISSHHH weekend!  And, they\'re in black and white, so you <span style="font-style: italic;">know</span> they\'re artistic.<br /></span>\r\n', '', '2005-04-06', '2005-04-12', 23, 1),
(35, '\r\nTap it, and they will come!  Join 7H4 as they host Virginia Interhash XII November 4-6, 2005 at Glen Murray Park, Buena Vista, VA.  More details can be found <a target="_blank" href="http://www.forum.7h4hash.com/viewforum.php?f=3">here</a>! \r\n', '', '2005-04-15', '2005-10-20', 23, 1),
(36, '<span style="font-family: georgia,times new roman,times,serif;">Yeah, it took a while, but if anyone wants to see what it\'s like to get up <span style="font-style: italic;">way</span> too early on a Saturday to run a 5k, we have <a href="/images/2005scopeitout/album.php">pictures </a>from this year\'s Scope It Out 5k</span>\r\n', '', '2005-04-12', '2005-04-19', 23, 1),
(37, '\r\nIt\'s over, and it was a blast!  The First Ever West (by God) Virginia Interhash was a roaring success, with perhaps the greatest bar ever!  Don\'t believe me?  Try reading the trail trash!  And don\'t forget to check out the pictures <a href="http://elevatorfish.com/pics/cacapon05_album.php">here</a> or <a href="/images/WVIH1/album.php">here</a>.  And we\'ve even got videos up on the <a href="/video.php">video page</a>!<br />\r\n', '\r\n\r\n\r\n\r\n<p style="text-align: center;" class="MsoNormal"><st1:state style="font-weight: bold; text-decoration: underline;" w:st="on"><st1:place w:st="on">West Virginia</st1:place></st1:state><span style="font-weight: bold; text-decoration: underline;">\r\nCampout</span><o:p>&nbsp;</o:p></p>\r\n\r\n<p class="MsoNormal">Things to do in <st1:place w:st="on">West VA</st1:place>\r\nbefore you die:</p>\r\n\r\n<p class="MsoNormal" style="margin-left: 1in; text-indent: -0.25in;"><!--[if !supportLists]--><span style="font-family: Symbol;"><span>', '2005-04-27', '2005-08-16', 23, 1),
(38, '<span style="font-family: georgia,times new roman,times,serif;">There\'s a new <a href="/video/hillbilly_040.avi">video </a>up, and trust me, you don\'t want to miss the dance stylings of your favorite webmaster as we were setting up the beer check for the Hillbilly Hash!', '', '2005-05-31', '2005-06-30', 23, 1),
(39, '\r\n<span style="font-family: georgia,times new roman,times,serif;">As some of you may have noticed, the poison ivy is definitely out now.  Please, be careful out there -- it <span style="font-style: italic;">sucks</span> to have PI.  And make sure to check <a href="http://poisonivy.aesir.com/view/welcome.html" title="Poison Ivy">here </a>to see what it looks like, and what you can do to help if you do happen to run through a patch of it. <br /><img src="http://poison-ivy.org/images/t-digger.jpg" /><br /></span>\r\n', '', '2005-06-05', '2005-08-31', 23, 1),
(40, '<span style="font-family: georgia,times new roman,times,serif;">So, you didn\'t make it to the special Saturday 151<sup>st</sup> trail?', '', '2005-06-19', '2005-06-26', 23, 1),
(41, '<span style="font-family: georgia,times new roman,times,serif;">Hey, you guys, we\'ve got more pictures up now!  Don\'t miss pictures from <a href="/images/tits2005/album.php">T.I.T.S. 2005</a>, now available (with more coming soon, I\'m sure, so keep checking back)!  Plus, we\'ve got pictures from the <a href="/images/146/album.php">Hillbilly Hash</a>, the <a href="/images/145/album.php">Mother\'s Day Hash</a>, and some other <a href="/images/149/album.php">random one that started in Chantilly</a>!</span>\r\n', '', '2005-07-06', '2005-07-21', 23, 1),
(42, '<center><b><font size="+1">Announcing the SH*T AGM!!!</font></b></center><p>Arrrrhhhh, Matey\'s! The tides they are against us! Our ship of Pirate Booty has been delayed by that destructive wench Katrina! That scurvy cur of a ship has been located, however, and is steadily sailing north but we\'re going to have to delay our pillaging and plundering for a few weeks. So, you Blackbeards and Iron Bonnies, mark a big black X on your calendars for Octobarrrrh 15! \'Cause that\'s when the booty\'s will be shaking and bottles will be breaking. <a href="/story.php?id=42" title="Third AGM Registration">Click here</a> for online registration, or get a registration form at the hash! </p><p>Curious about <a href="/coming.php?event=7" title="Who\'s Cumming?">who\'s cumming</a>? </p>', '<p /><center><i><b><font size="+2">Yo, Ho-ho and a Pirate AGM<br />You are hereby invited to the So Happy Its Tuesday THIRD Anal AGM Pirate celebration!<br />Saturday October 15, 2005 </font></b></i></center><p /><p>What you get: </p><dl><dt>When </dt><dd>Use your one good eye and look above </dd><dt>Where </dt><dd>Herndon Moose Lodge (or there about) 779 Center St. Herndon, VA </dd><dt>Start </dt><dd>Happy Half Hour starts at 3pm. Hares away at 3:30pm and Party at 6pm </dd><dt>Cost </dt><dd>$35 </dd><dt>Other </dt><dd>SH*T: BEER, FOOD, excellent give-a-ways, prizes, games, a live band, more BEER and wankers in stupid gay Pirate costumes </dd></dl><p>Note that even if you sign up here, you will still have to make yer mark on a registration form when ye board. </p>\r\n\r\n\r\n<!-- \r\n<form action="https://www.paypal.com/cgi-bin/webscr" method="post">\r\n<input type="hidden" name="cmd" value="_xclick">\r\n<input type="hidden" name="business" value="coacoas@sohappyhash.com">\r\n<input type="hidden" name="item_name" value="Third Annual SH*T AGM">\r\n<input type="hidden" name="item_number" value="7">\r\n<input type="hidden" name="amount" value="35.00">\r\n<input type="hidden" name="no_shipping" value="1">\r\n<input type="hidden" name="return" value="http://www.sohappyhash.com">\r\n<input type="hidden" name="no_note" value="1">\r\n<input type="hidden" name="currency_code" value="USD">\r\n<input type="hidden" name="lc" value="US">\r\n<input type="hidden" name="bn" value="PP-BuyNowBF">\r\n<table><tr><td><input type="hidden" name="on0" value="Hash Name">Hash Name</td><td><input type="text" name="os0" maxlength="200"></td></tr><tr><td><input type="hidden" name="on1" value="Home Hash">Home Hash</td><td><input type="text" name="os1" maxlength="200"></td></tr></table><input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but23.gif" border="0" name="submit" alt="Make payments with PayPal - it\'s fast, free and secure!">\r\n</form>\r\n-->\r\n\r\n<b><center>The online payment option is now closed.  Don\'t worry, though!  You can still show up for the fun -- just bring your doubloons to start!</center></b>', '2005-10-14', '2005-10-15', 23, 1),
(43, '<font color="red">Thanks to everyone who came out to the DC Red Dress Run this weekend!  If you\'ve got pictures from the event, feel free to send a link to them, or the pictures themselves, to <a href="mailto:webmaster@sohappyhash.com?Subject=RDR Pics">the webmaster</a>, and we\'ll make sure to get them up on the page.</font>', '', '2005-10-03', '2005-10-15', 23, 1),
(44, '<p class="MsoNormal" style="MARGIN: 0in 0in 0pt; TEXT-ALIGN: center" align="center"><span style="FONT-SIZE: 16pt; COLOR: red">The SH*T wants to thank everyone for helping us celebrate another year:</span><span style="FONT-SIZE: 16pt; COLOR: red"></span></p><p /><p class="MsoNormal" style="MARGIN: 0in 0in 0pt; TEXT-ALIGN: center" align="center"><span style="FONT-SIZE: 16pt; COLOR: red">We\'d also like to welcome the new mismanagement and pray that they know what they\'re doing!</span><span style="FONT-SIZE: 16pt; COLOR: red"></span></p><p /><p class="MsoNormal" style="MARGIN: 0in 0in 0pt; TEXT-ALIGN: center" align="center"><span style="FONT-SIZE: 16pt; COLOR: purple">Hash Master - The Udder Ho</span></p><p /><p class="MsoNormal" style="MARGIN: 0in 0in 0pt; TEXT-ALIGN: center" align="center"><span style="FONT-SIZE: 16pt; COLOR: purple">Religious Advisor - Lube Me Up Scotty</span></p><p /><p class="MsoNormal" style="MARGIN: 0in 0in 0pt; TEXT-ALIGN: center" align="center"><span style="FONT-SIZE: 16pt; COLOR: purple">Hare Raiser - And How\'s Her Bush</span></p><p /><p class="MsoNormal" style="MARGIN: 0in 0in 0pt; TEXT-ALIGN: center" align="center"><span style="FONT-SIZE: 16pt; COLOR: purple">Hash Cash', '', '2005-10-16', '2005-10-31', 23, 1),
(49, '\r\nNovember 20th Beltway Bob sponsored by S.H.I.T. H3!\r\n', '\r\nHey you wankers! SHIT is sponsoring Beltway Bob\'s on November 20th! The location is <a href="http://spiderkellys.com/">Spider Kelly\'s</a> in Clarendon. You should come!<div><br /></div><div>Why should you come? So that we actually have people from SHIT at our own Beltway Bob\'s for once! Also so that TWOS won\'t have to drink alone! </div>\r\n', '2015-11-11', '2015-11-21', 474, 1),
(50, '\r\nNovember 14th Mt. Vernon is in Reston!\r\n', '\r\nHello you lovely wankers and wankettes! This Saturday November 14th, 2015, <a href="http://www.dchashing.org/mvh3/">Mt. Vernon H3</a> will be invading SHIT territory in Reston! You know you\'re looking for a reason to drink on Saturday morning, so here it is! Come out and enjoy a trail hared by Short Cummings and yours truly.<div><br /></div><div>-Doc C</div>\r\n', '2015-11-11', '2015-11-15', 474, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shit_news`
--
ALTER TABLE `shit_news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shit_news`
--
ALTER TABLE `shit_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
