-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 09:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sqltest1`
--

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `Case_ID` int(8) NOT NULL,
  `Username` char(20) NOT NULL,
  `Note` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `Case_ID` int(8) NOT NULL,
  `Location` char(10) NOT NULL,
  `Problem` char(30) NOT NULL,
  `Description` text NOT NULL,
  `Time` time NOT NULL,
  `Date` date NOT NULL,
  `Editby` char(20) NOT NULL,
  `Stat` char(20) NOT NULL,
  `Username` char(20) NOT NULL,
  `Worker` char(23) NOT NULL,
  `why` varchar(60) NOT NULL,
  `newupdate` int(1) NOT NULL DEFAULT 0,
  `engupdate` int(1) NOT NULL DEFAULT 1,
  `finish` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`Case_ID`, `Location`, `Problem`, `Description`, `Time`, `Date`, `Editby`, `Stat`, `Username`, `Worker`, `why`, `newupdate`, `engupdate`, `finish`) VALUES
(148, 'Pharmacy', 'ก็อกน้ำ', 'มีดหลุดมือไปโดน', '15:58:46', '2021-06-16', '', 'สำเร็จ', 'aof007', 'Sirichai', '', 0, 1, '2021-06-25 15:33:11'),
(149, 'Emergency', 'ประตู,หน้าต่าง', 'ประตูเป็นรู ปลวกกิน', '16:01:50', '2021-06-16', '', 'สำเร็จ', 'aof007', 'Sirichai', '', 0, 1, '2021-06-16 16:15:53'),
(150, 'Laboratory', 'ประตู,หน้าต่าง', 'test', '15:24:34', '2021-06-25', '', 'กำลังดำเนินการ', 'Jeerachon', 'Sirichai', '', 0, 1, '0000-00-00 00:00:00'),
(153, 'Emergency', 'เครื่องปริ้น', 'test', '15:25:30', '2021-06-25', '', 'สำเร็จ', 'aof007', 'teerat', '', 1, 1, '2021-06-25 18:12:20'),
(155, 'Emergency', 'เครื่องปริ้น', 'test', '15:52:18', '2021-06-25', '', 'รอช่าง', 'aof007', 'ไม่มี', '', 0, 0, '0000-00-00 00:00:00'),
(156, 'Office 7', 'เครื่องปริ้น', 'test', '15:52:34', '2021-06-25', '', 'รอช่าง', 'aof007', 'ไม่มี', '', 0, 0, '0000-00-00 00:00:00'),
(157, 'Emergency', 'ก็อกน้ำ', 'test', '15:53:15', '2021-06-25', '', 'กำลังดำเนินการ', 'Jeerachon', 'teerat', '', 0, 1, '0000-00-00 00:00:00'),
(159, 'Emergency', 'ก็อกน้ำ', 'test', '15:53:56', '2021-06-25', '', 'กำลังดำเนินการ', 'aof007', 'Sirichai', '', 0, 1, '0000-00-00 00:00:00'),
(160, 'Emergency', 'โทรศัพท์', 'test', '15:54:02', '2021-06-25', '', 'กำลังดำเนินการ', 'aof007', 'Sirichai', '', 0, 1, '0000-00-00 00:00:00'),
(162, 'Emergency', 'คอมพิวเตอร์', 'test3', '17:10:50', '2021-06-25', '', 'สำเร็จ', 'Jeerachon', 'Sirichai', '', 0, 1, '2021-06-25 17:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomid` int(3) NOT NULL,
  `roomname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomid`, `roomname`) VALUES
(2, 'OPD1'),
(3, 'OPD2'),
(4, 'OPD3'),
(5, 'OPD4'),
(6, 'IPD1'),
(7, 'IPD2'),
(8, 'IPD3'),
(9, 'Pharmacy'),
(10, 'Cashier'),
(11, 'Office 1'),
(12, 'Office 2'),
(13, 'Office 3'),
(14, 'Office 4'),
(15, 'Office 5'),
(16, 'Office 6'),
(17, 'Office 7'),
(18, 'Office 8'),
(20, 'Labor Room'),
(21, 'Surgical Room'),
(22, 'Laboratory');

-- --------------------------------------------------------

--
-- Table structure for table `spare_request`
--

CREATE TABLE `spare_request` (
  `Request_ID` int(5) NOT NULL,
  `Case_ID` int(5) NOT NULL,
  `Engineer_ID` int(3) NOT NULL,
  `Req.Description` char(200) NOT NULL,
  `Target_Item` char(100) NOT NULL,
  `Request_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spare_request`
--

INSERT INTO `spare_request` (`Request_ID`, `Case_ID`, `Engineer_ID`, `Req.Description`, `Target_Item`, `Request_Date`) VALUES
(1, 1, 3, 'MainBoard ไหม้', 'MainBoard (1155) AFOX IH61-MA5', '2020-12-03'),
(2, 1, 3, 'การ์ดจอไหม้', 'GT 950', '2020-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `token_line`
--

CREATE TABLE `token_line` (
  `api` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `token_line`
--

INSERT INTO `token_line` (`api`) VALUES
('mWLUxFiNjmdgXKZu8oqef6H00OGi6ktec0ftBvhpTs7');

-- --------------------------------------------------------

--
-- Table structure for table `tool`
--

CREATE TABLE `tool` (
  `toolid` int(3) NOT NULL,
  `toolname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tool`
--

INSERT INTO `tool` (`toolid`, `toolname`) VALUES
(1, 'คอมพิวเตอร์'),
(2, 'เครื่องปริ้น'),
(3, 'โทรศัพท์'),
(6, 'ก็อกน้ำ'),
(7, 'ประตู,หน้าต่าง');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` char(20) NOT NULL,
  `Password` char(20) NOT NULL,
  `firstname` char(30) NOT NULL,
  `lastname` char(30) NOT NULL,
  `Tel` int(10) NOT NULL,
  `LoginStatus` int(1) NOT NULL,
  `LastUpdate` datetime NOT NULL,
  `Access` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `firstname`, `lastname`, `Tel`, `LoginStatus`, `LastUpdate`, `Access`) VALUES
('aof007', '123456', 'thanakrit', 'kansuree', 12345678, 0, '0000-00-00 00:00:00', 'user'),
('Jeerachon', '123456', 'จีราชล', 'ธรรมศร', 889943216, 0, '0000-00-00 00:00:00', 'user'),
('Pai007', '123456', 'pai', 'pai', 1234567, 0, '0000-00-00 00:00:00', 'user'),
('phoomin', '456789', 'ภูมินทร์', 'บุญอนันต์', 1333333333, 0, '0000-00-00 00:00:00', 'user'),
('Sirichai', '654321', 'ศิริชัย', 'เบ็ญจมาคม', 215148148, 0, '0000-00-00 00:00:00', 'admin'),
('teerat', '987654', 'ธีรัช', 'กิจเจริญ', 11223344, 1, '2021-06-27 14:28:52', 'superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD KEY `Case_ID` (`Case_ID`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`Case_ID`),
  ADD KEY `fk_username` (`Username`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomid`);

--
-- Indexes for table `spare_request`
--
ALTER TABLE `spare_request`
  ADD PRIMARY KEY (`Request_ID`);

--
-- Indexes for table `tool`
--
ALTER TABLE `tool`
  ADD PRIMARY KEY (`toolid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `Case_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `spare_request`
--
ALTER TABLE `spare_request`
  MODIFY `Request_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tool`
--
ALTER TABLE `tool`
  MODIFY `toolid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `fk_Case_ID` FOREIGN KEY (`Case_ID`) REFERENCES `report` (`Case_ID`) ON DELETE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`Username`) REFERENCES `user` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
