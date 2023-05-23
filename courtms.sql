-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2018 at 09:05 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `courtms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccused`
--

CREATE TABLE IF NOT EXISTS `tblaccused` (
`accuseid` int(11) NOT NULL,
  `accusename` varchar(256) NOT NULL,
  `detailid` int(100) NOT NULL,
  `MESID` varchar(250) NOT NULL,
  `cnic` varchar(250) NOT NULL,
  `fathername` varchar(250) NOT NULL,
  `organization` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccused`
--

INSERT INTO `tblaccused` (`accuseid`, `accusename`, `detailid`, `MESID`, `cnic`, `fathername`, `organization`, `status`) VALUES
(1, 'Farinal', 1, 'Nabsk-2011', '4500900139491', 'don', 'gangster', 'pending'),
(2, 'FA', 2, 'Nabsk-2017', '4550030141241', 'don ', 'gangster', 'pending'),
(3, 'Raza Accused', 3, 'Nabsk-2017', '4512343421412', 'accused', 'non reputable', 'pending'),
(4, 'Abdul azzi noonari', 4, 'Nabsk-2017', '', '', '', ''),
(5, 'Abdul azzi noonari', 4, 'NABSK2015101813935\r\n', '', '', '', ''),
(6, 'faaaa', 5, 'NABSK2015101813935\r\n', '', '', '', ''),
(7, 'Farinal', 6, '', '', '', '', ''),
(8, '', 0, '', '', '', '', ''),
(9, 'ali dinnnnn', 0, 'new accuse', '', '', '', ''),
(10, 'FBR', 0, 'new accuse', '', '', '', ''),
(11, 'state vs addul aziz noonari', 0, 'new accuse', '', '', '', ''),
(12, 'FBR', 0, 'new accuse', '', '', '', ''),
(13, 'FBR', 0, 'jammmed', '', '', '', ''),
(14, 'FBR', 0, 'sdadsfa', '', '', '', ''),
(15, 'FBR', 0, 'title', '', '', '', ''),
(16, 'new accuse', 0, '1000000000000001', '', '', '', ''),
(17, 'zubair it accuse', 0, 'NABSK2015101813935', '4514143124124', 'accuse ', 'non reputable', 'pending'),
(18, 'rajeshit accuse', 0, '1000000000000001', '', '', '', ''),
(19, 'farhan bhai accuse', 0, '1000000000000001', '', '', '', ''),
(20, 'riaz bhai hq accuse', 0, '1000000000000001', '', '', '', ''),
(21, 'mehtab hq accues', 0, '1000000000000001', '', '', '', ''),
(22, 'sajid acuuse', 0, 'Nabsk-2017', '2342314134141', 'don', 'old sukkur company', 'pending'),
(23, '', 0, '', '', '', '', ''),
(24, '', 0, '', '', '', '', ''),
(25, '', 0, '', '', '', '', ''),
(26, 'Nabsk-2017', 0, '', '', '', '', ''),
(27, 'Nabsk-2017', 0, '', '', '', '', ''),
(28, 'Nabsk-2017', 0, '', '', '', '', ''),
(29, 'NABSK2015101813935', 0, '', '', '', '', ''),
(30, 'NABSK2015101813935', 0, '', '', '', '', ''),
(31, 'NABSK2015101813935', 0, '', '', '', '', ''),
(32, 'NABSK2015101813935', 0, '', '', '', '', ''),
(33, 'NABSK2015101813935', 0, '', '', '', '', ''),
(34, 'NABSK2015101813935', 0, '', '', '', '', ''),
(35, 'Ahmad bux', 0, 'NABSK2015101813935', '2134354255245', 'accuse', 'gangwar', 'pending'),
(36, '', 0, 'NABSK2015101813935', '', '', '', ''),
(37, '', 0, 'NABSK2015101813935', '', '', '', ''),
(38, '', 0, 'NABSK2015101813935', '', '', '', ''),
(39, '', 0, 'NABSK2015101813935', '', '', '', ''),
(40, '', 0, 'NABSK2015101813935', '', '', '', ''),
(41, 'akber jatoi jalbani', 0, 'Nabsk-2017', '', '', '', ''),
(42, 'zubiar badminton', 0, 'Nabsk-2017', '', '', '', ''),
(43, 'it accuse', 0, 'NABSK2015101813935', '', '', '', ''),
(44, 'munna bhai mbbs', 0, '1000000000000001', '', '', '', ''),
(45, 'zubair bhai networking ', 0, '1000000000000001', '', '', '', ''),
(46, 'farhan bhai accuse 2', 0, 'Nabsk-2017', '', '', '', ''),
(47, 'accuse ', 0, '1000000000000001', '', '', '', ''),
(48, 'abdulhammed pathan', 7, '', '', '', '', ''),
(49, 'abdulhammed pathan', 8, '', '', '', '', ''),
(50, 'abdulhammed pathan', 9, '', '', '', '', ''),
(51, 'abdulhammed pathan', 9, '', '', '', '', ''),
(52, 'abdulhammed pathan', 10, 'NABSK201508170378987', '', '', '', ''),
(53, 'zoy jagga jassos', 0, 'Nabsk-2011', '4557111111111', 'sunny lene', 'kpmg', 'pending'),
(54, 'rajesh', 0, 'Nabsk-2011', '4511111234566', 'father accuse', 'municpal ', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tblcps`
--

CREATE TABLE IF NOT EXISTS `tblcps` (
`cpid` int(11) NOT NULL,
  `cpvalue` varchar(256) NOT NULL,
  `detailid` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcps`
--

INSERT INTO `tblcps` (`cpid`, `cpvalue`, `detailid`) VALUES
(1, 'cp .ds.162/2016', 1),
(2, 'cp .ds.162/2015', 2),
(3, 'internet banking fraud', 3),
(4, 'Das12333', 4),
(5, '', 0),
(6, 'cp .ds.162/2015', 5),
(7, 'internet banking fraud', 6),
(8, '', 0),
(9, 'no cps', 7),
(10, 'new case ', 8),
(11, 'no cps', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbldetail`
--

CREATE TABLE IF NOT EXISTS `tbldetail` (
`SerialNo` int(100) NOT NULL,
  `MES-ID` varchar(256) NOT NULL,
  `noofcps` int(100) NOT NULL,
  `noofaccused` int(100) NOT NULL,
  `caseofficer` varchar(256) NOT NULL,
  `hearing` datetime NOT NULL,
  `commitment` varchar(256) NOT NULL,
  `nexthearing` datetime NOT NULL,
  `title` varchar(256) NOT NULL,
  `hearingstatus` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldetail`
--

INSERT INTO `tbldetail` (`SerialNo`, `MES-ID`, `noofcps`, `noofaccused`, `caseofficer`, `hearing`, `commitment`, `nexthearing`, `title`, `hearingstatus`) VALUES
(1, 'Nabsk-2017', 1, 1, 'Fahan Illahi Qureshi', '2017-10-11 00:00:00', 'next hearing will be  on next firday', '2017-10-11 00:00:00', 'Ali dino', ''),
(2, 'Nabsk-2017', 0, 0, 'Zubair shaikh', '2017-10-11 00:00:00', 'commmit', '2017-10-11 00:00:00', 'ali dinnnnn', ''),
(3, '1000000000000001', 0, 0, 'abc', '2017-10-13 00:00:00', 'pending', '2017-10-11 00:00:00', 'FBR', ''),
(4, 'NABSK2015101813935', 0, 0, 'Mr kashif noor shaikh Depury director', '2017-10-10 00:00:00', 'witness evidence', '2017-10-18 00:00:00', 'state vs addul aziz noonari', ''),
(5, 'NABSK2015101813935', 0, 0, 'Zubair shaikh', '2017-10-12 00:00:00', 'next hearing will be  on next firday', '2017-10-12 00:00:00', 'Ali dino', ''),
(6, 'Nabsk-2011', 0, 0, 'Zubair shaikh', '2017-10-11 00:00:00', 'pending', '2017-10-11 00:00:00', 'Ali dino', 'Kachha Paishe'),
(7, 'NABSK2015081703789', 0, 0, 'masood ahmed', '2017-11-08 00:00:00', 'produce evidence ', '2017-12-27 00:00:00', 'investigation against abdulhammed pathan', 'Notice Issue to Nab'),
(8, 'NABSK2015081703789876', 0, 0, 'masood ahmed', '2017-11-08 00:00:00', 'produce evidence ', '2017-11-08 00:00:00', 'new case ', 'Notice Issue to Nab'),
(9, 'NABSK201508170378987611', 0, 0, 'masood ahmed', '2017-11-15 00:00:00', 'produce evidence ', '2017-11-30 00:00:00', 'adsfa', 'Notice Issue to Nab'),
(10, 'NABSK201508170378987', 0, 0, 'masood ahmed', '2017-11-08 00:00:00', 'produce evidence ', '2017-11-30 00:00:00', 'NABSK2015081703789', 'Kachha Paishe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccused`
--
ALTER TABLE `tblaccused`
 ADD PRIMARY KEY (`accuseid`);

--
-- Indexes for table `tblcps`
--
ALTER TABLE `tblcps`
 ADD PRIMARY KEY (`cpid`);

--
-- Indexes for table `tbldetail`
--
ALTER TABLE `tbldetail`
 ADD PRIMARY KEY (`SerialNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccused`
--
ALTER TABLE `tblaccused`
MODIFY `accuseid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `tblcps`
--
ALTER TABLE `tblcps`
MODIFY `cpid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbldetail`
--
ALTER TABLE `tbldetail`
MODIFY `SerialNo` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
