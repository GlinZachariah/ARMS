-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2017 at 07:21 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arms`
--

-- --------------------------------------------------------

--
-- Table structure for table `firstofficial`
--

CREATE TABLE `firstofficial` (
  `Staffid` int(8) NOT NULL,
  `Sem` int(11) DEFAULT NULL,
  `Branch` varchar(5) NOT NULL,
  `Section` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffinfo`
--

CREATE TABLE `staffinfo` (
  `StaffID` int(8) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Job` varchar(20) NOT NULL,
  `Department` varchar(20) NOT NULL,
  `Priority` int(2) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studinfo`
--

CREATE TABLE `studinfo` (
  `CollegeID` int(7) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `Branch` varchar(5) NOT NULL,
  `Section` varchar(5) DEFAULT NULL,
  `Sem` int(2) NOT NULL,
  `Password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studreq`
--

CREATE TABLE `studreq` (
  `CollegeID` int(7) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RequestCount` varchar(11) NOT NULL,
  `Attachment` varchar(50) DEFAULT NULL,
  `Reqsub` varchar(30) NOT NULL,
  `curstatus` varchar(8) NOT NULL,
  `Officer1` int(8) DEFAULT '0',
  `status1` int(2) DEFAULT '0',
  `Officer2` int(8) DEFAULT '0',
  `status2` int(2) DEFAULT '0',
  `Officer3` int(8) DEFAULT '0',
  `status3` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `firstofficial`
--
ALTER TABLE `firstofficial`
  ADD PRIMARY KEY (`Staffid`);

--
-- Indexes for table `staffinfo`
--
ALTER TABLE `staffinfo`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `studinfo`
--
ALTER TABLE `studinfo`
  ADD PRIMARY KEY (`CollegeID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `firstofficial`
--
ALTER TABLE `firstofficial`
  ADD CONSTRAINT `fkey` FOREIGN KEY (`Staffid`) REFERENCES `staffinfo` (`StaffID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
