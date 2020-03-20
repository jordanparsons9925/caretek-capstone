-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2020 at 12:59 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
USE carebase;
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carebase`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `PostalCode` char(6) NOT NULL,
  `HomePhone` varchar(10) NOT NULL,
  `CellPhone` varchar(10) DEFAULT NULL,
  `SIN` varchar(9) NOT NULL,
  `DoB` date NOT NULL,
  `RegionID` char(2) NOT NULL,
  `Physician` varchar(50) NOT NULL,
  `Payment` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `ResidenceID` int(10) UNSIGNED NOT NULL,
  `ProxyID` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`Username`, `Password`, `FirstName`, `LastName`, `Address`, `City`, `PostalCode`, `HomePhone`, `CellPhone`, `SIN`, `DoB`, `RegionID`, `Physician`, `Payment`, `Status`, `ResidenceID`, `ProxyID`) VALUES
('HammoAnnea', 'uqwe3aj3he', 'Anne A', 'Hammonds', '2937 Glencoe Drive', 'St. John\'s', 'A1C5H6', '7096210261', '7096211602', '437596463', '1967-12-19', 'EC', 'Dr. Aballak', 'Personal', 'active', 2, NULL),
('HollaGrego2111', 'Iish3xo2ah', 'Gregory L', 'Holland', '2111 Big Elm', 'St. John\'s', 'A1A5E8', '7097499082', '7097492809', '234023398', '1956-10-31', 'EC', 'Dr. Dula', 'Insurance', 'active', 1, NULL),
('SmithSusan289', 'qwyb5av3zz', 'Susan G', 'Smith', '289 Pond Road', 'Rocky Harbour', 'A1B9N3', '7094582694', '7094584962', '638238394', '1949-10-17', 'NP', 'Dr. Upnor', 'Personal', 'inactive', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `PostalCode` char(6) NOT NULL,
  `HomePhone` varchar(10) NOT NULL,
  `CellPhone` varchar(10) DEFAULT NULL,
  `SIN` varchar(9) NOT NULL,
  `DoB` date NOT NULL,
  `RegionID` char(2) NOT NULL,
  `Qualifications` varchar(21844) NOT NULL,
  `PositionID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Username`, `Password`, `FirstName`, `LastName`, `Address`, `City`, `PostalCode`, `HomePhone`, `CellPhone`, `SIN`, `DoB`, `RegionID`, `Qualifications`, `PositionID`) VALUES
('GreenMicha2963', 'ascn3as7fd', 'Michael V', 'Greenwood', '2963 Stavanger Dr', 'St. John\'s', 'A1A5E8', '7093515310', '7093510135', '642286769', '1979-05-30', 'EC', 'PCA, First Aid', 2),
('QuonLoret43', 'plmg2tr5ck', 'Loretta R', 'Quon', '43a Neptune Rd', 'St. John\'s', 'A1A4G1', '7093511142', '', '433727971', '1987-06-07', 'EC', 'PCA, First Aid', 2),
('RiverJanic4756', 'amnr4of8hf', 'Janice T', 'Rivera', '4756 Torbay Road', 'St. John\'s', 'A1B4J2', '7097499012', '7097493209', '638359018', '1965-12-26', 'EC', 'PCA, First Aid', 2),
('SkinnJoelc457', 'jqem2ak8ak', 'Joel C', 'Skinner', '457 Kenmount Rd', 'St. John\'s', 'A1B7J4', '7093411295', '7093415921', '272016379', '1990-10-29', 'EC', 'PCA, First Aid', 2),
('Smithclaym2105', 'uyud0bx1qq', 'Clay M', 'Smith', '2105 Stavanger Drive', 'St. John\'s', 'A1A3E2', '7093513122', '7093512213', '779055433', '1978-04-06', 'EC', 'PCA, First Aid', 2);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `PositionID` int(10) UNSIGNED NOT NULL,
  `PositionName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`PositionID`, `PositionName`) VALUES
(1, 'Nurse Manager'),
(2, 'PCA');

-- --------------------------------------------------------

--
-- Table structure for table `proxy`
--

CREATE TABLE `proxy` (
  `ProxyID` int(10) UNSIGNED NOT NULL,
  `ProxyName` varchar(50) NOT NULL,
  `ProxyRelationship` varchar(50) NOT NULL,
  `ProxyCity` varchar(20) NOT NULL,
  `ProxyProvince` char(2) NOT NULL,
  `ProxyAddress` varchar(20) NOT NULL,
  `ProxyHomePhone` varchar(10) NOT NULL,
  `ProxyCellPhone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `RegionID` char(2) NOT NULL,
  `RegionName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`RegionID`, `RegionName`) VALUES
('CE', 'Central'),
('EC', 'East Coast'),
('NP', 'Northern Peninsula'),
('WC', 'West Coast');

-- --------------------------------------------------------

--
-- Table structure for table `residence`
--

CREATE TABLE `residence` (
  `ResidenceID` int(10) UNSIGNED NOT NULL,
  `ResidenceName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residence`
--

INSERT INTO `residence` (`ResidenceID`, `ResidenceName`) VALUES
(1, '2111 Big Elm'),
(2, '2937 Glencoe Drive'),
(3, '289 Pond Rd.');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ServiceID` int(10) UNSIGNED NOT NULL,
  `ServiceName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ServiceID`, `ServiceName`) VALUES
(1, 'Personal Care'),
(2, 'Light Housekeeping'),
(3, 'Social Interaction'),
(4, 'Respite Care');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `ClientUsername` varchar(50) NOT NULL,
  `StartTime` datetime NOT NULL,
  `EndTime` datetime NOT NULL,
  `ServiceID` int(10) UNSIGNED NOT NULL,
  `ServiceDetail` varchar(21844) DEFAULT NULL,
  `PCAUsername` varchar(50) DEFAULT NULL,
  `CheckIn` datetime DEFAULT NULL,
  `CheckOut` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `region-client` (`RegionID`),
  ADD KEY `residence-client` (`ResidenceID`),
  ADD KEY `proxy-client` (`ProxyID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `region-employee` (`RegionID`),
  ADD KEY `position-employee` (`PositionID`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`PositionID`);

--
-- Indexes for table `proxy`
--
ALTER TABLE `proxy`
  ADD PRIMARY KEY (`ProxyID`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`RegionID`);

--
-- Indexes for table `residence`
--
ALTER TABLE `residence`
  ADD PRIMARY KEY (`ResidenceID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ServiceID`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`StartTime`,`ClientUsername`),
  ADD KEY `service-Shift` (`ServiceID`),
  ADD KEY `client-Shift` (`ClientUsername`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `PositionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `proxy`
--
ALTER TABLE `proxy`
  MODIFY `ProxyID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `residence`
--
ALTER TABLE `residence`
  MODIFY `ResidenceID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ServiceID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `proxy-client` FOREIGN KEY (`ProxyID`) REFERENCES `proxy` (`ProxyID`),
  ADD CONSTRAINT `region-client` FOREIGN KEY (`RegionID`) REFERENCES `region` (`RegionID`),
  ADD CONSTRAINT `residence-client` FOREIGN KEY (`ResidenceID`) REFERENCES `residence` (`ResidenceID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `position-employee` FOREIGN KEY (`PositionID`) REFERENCES `position` (`PositionID`),
  ADD CONSTRAINT `region-employee` FOREIGN KEY (`RegionID`) REFERENCES `region` (`RegionID`);

--
-- Constraints for table `shift`
--
ALTER TABLE `shift`
  ADD CONSTRAINT `client-Shift` FOREIGN KEY (`ClientUsername`) REFERENCES `client` (`Username`),
  ADD CONSTRAINT `service-Shift` FOREIGN KEY (`ServiceID`) REFERENCES `service` (`ServiceID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
