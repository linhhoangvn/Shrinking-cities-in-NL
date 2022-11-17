-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: studmysql01.fhict.local
-- Generation Time: Jan 16, 2021 at 05:14 PM
-- Server version: 5.7.26-log
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbi428535`
--

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Description` longtext NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Size` varchar(255) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Review` tinyint(1) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ArtistID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Bio` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `art_bidding`
--

CREATE TABLE `art_bidding` (
  `ID` int(11) NOT NULL,
  `ArtID` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `art_order`
--

CREATE TABLE `art_order` (
  `ID` int(11) NOT NULL,
  `ArtID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `ID` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `BiddingTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ArtBiddingID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `RegisterDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Content` longtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `EmpID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `ID` int(11) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` longtext NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `EmpID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE `partner` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Category` varchar(200) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Description` longtext NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `EmpID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` longtext NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `DateBegin` date NOT NULL,
  `TicketTypeID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_order`
--

CREATE TABLE `ticket_order` (
  `ID` int(11) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TicketID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_type`
--

CREATE TABLE `ticket_type` (
  `ID` int(11) NOT NULL,
  `AgeCategory` varchar(255) NOT NULL,
  `Duration` varchar(255) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Type` tinyint(4) NOT NULL DEFAULT '0',
  `Address` varchar(255) NOT NULL,
  `PostalCode` varchar(10) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `RegisterDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ArtistID` (`ArtistID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `art_bidding`
--
ALTER TABLE `art_bidding`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ArtID` (`ArtID`);

--
-- Indexes for table `art_order`
--
ALTER TABLE `art_order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ArtID` (`ArtID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ArtBiddingID` (`ArtBiddingID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EmpID` (`EmpID`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EmpID` (`EmpID`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EmpID` (`EmpID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TicketTypeID` (`TicketTypeID`),
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `ticket_order`
--
ALTER TABLE `ticket_order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TicketID` (`TicketID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `ticket_type`
--
ALTER TABLE `ticket_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `art_bidding`
--
ALTER TABLE `art_bidding`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `art_order`
--
ALTER TABLE `art_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partner`
--
ALTER TABLE `partner`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_order`
--
ALTER TABLE `ticket_order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_type`
--
ALTER TABLE `ticket_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `art`
--
ALTER TABLE `art`
  ADD CONSTRAINT `art_ibfk_1` FOREIGN KEY (`ArtistID`) REFERENCES `artist` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `art_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `art_bidding`
--
ALTER TABLE `art_bidding`
  ADD CONSTRAINT `art_bidding_ibfk_1` FOREIGN KEY (`ArtID`) REFERENCES `art` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `art_order`
--
ALTER TABLE `art_order`
  ADD CONSTRAINT `art_order_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `art_order_ibfk_2` FOREIGN KEY (`ArtID`) REFERENCES `art` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`ArtBiddingID`) REFERENCES `art_bidding` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partner`
--
ALTER TABLE `partner`
  ADD CONSTRAINT `partner_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `event` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`TicketTypeID`) REFERENCES `ticket_type` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_order`
--
ALTER TABLE `ticket_order`
  ADD CONSTRAINT `ticket_order_ibfk_1` FOREIGN KEY (`TicketID`) REFERENCES `ticket` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_order_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
