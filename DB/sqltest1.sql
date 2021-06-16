-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 09:06 AM
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
  `Problem` char(13) NOT NULL,
  `Description` text NOT NULL,
  `Time` time NOT NULL,
  `Date` date NOT NULL,
  `Editby` char(20) NOT NULL,
  `Stat` char(20) NOT NULL,
  `Username` char(20) NOT NULL,
  `Worker` char(23) NOT NULL,
  `why` varchar(60) NOT NULL,
  `newupdate` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`Case_ID`, `Location`, `Problem`, `Description`, `Time`, `Date`, `Editby`, `Stat`, `Username`, `Worker`, `why`, `newupdate`) VALUES
(124, 'Surgical', 'Printer', 'asfasf', '16:22:21', '2021-01-28', '', 'สำเร็จ', 'phoomin', 'Sirichai', '', 0),
(138, 'OPD1', 'Computer', '	\r\nอุปกรณ์ต่าง ๆ ในคอมมีปัญหาทำงานบกพร่องหรือไม่ทำงานอาจเกิดขึ้นจากหลากหลายสาเหตุ จำเป็นที่จะต้องค้นหาสาเหตุเป็นการเฉพาะ ไม่ว่าจะเป็นคีย์บอร์ด เมาส์ ลำ', '11:12:44', '2021-02-02', '', 'สำเร็จ', 'Jeerachon', 'Sirichai', '', 0),
(139, 'OPD2', 'Computer', '	\r\nอุปกรณ์ต่าง ๆ ในคอมมีปัญหาทำงานบกพร่องหรือไม่ทำงานอาจเกิดขึ้นจากหลากหลายสาเหตุ จำเป็นที่จะต้องค้นห', '11:13:09', '2021-02-02', '', 'สำเร็จ', 'Jeerachon', 'Sirichai', '', 0),
(141, 'OPD3', 'Computer', '	\r\nอุปกรณ์ต่าง ๆ ในคอมมีปัญหาทำงานบกพร่องหรือไม่ทำงานอาจเกิดขึ้นจากหลากหลายสาเหตุ จำเป็นที่จะต้องค้นหาสาเหตุเป็นการเฉพาะ ไม่ว่าจะเป็นคีย์บอร์ด เมาส์ ลำโพง เสียงหาย หน้าจอแ', '11:15:07', '2021-02-02', '', 'กำลังดำเนินการ', 'Jeerachon', 'Sirichai', '', 0),
(142, 'Labor', 'Computer', '	\r\nอุปกรณ์ต่าง ๆ ในคอมมีปัญหาทำงานบกพร่องหรือไม่ทำงานอาจเกิดขึ้นจากหลากหลายสาเหตุ จำเป็นที่จะต้องค้นหาสาเหตุเป็นการเฉพาะ ไม่ว่าจะเป็นคีย์บอร์ด เมาส์ ลำโพง เสียงหาย หน้าจอแ', '11:15:13', '2021-02-02', '', 'ยกเลิก', 'Jeerachon', 'Sirichai', 'แจ้งผิด', 0),
(143, 'Office 7', 'Printer', '	\r\nอุปกรณ์ต่าง ๆ ในคอมมีปัญหาทำงานบกพร่องหรือไม่ทำงานอาจเกิดขึ้นจากหลากหลายสาเหตุ จำเป็นที่จะต้องค้นหาสาเหตุเป็นการเฉพาะ ไม่ว่าจะเป็นคีย์บอร์ด เมาส์ ลำโพง เสียงหาย หน้าจอแ', '11:15:18', '2021-02-02', '', 'สำเร็จ', 'Jeerachon', 'Sirichai', '', 0),
(144, 'Office 8', 'Printer', '	\r\nอุปกรณ์ต่าง ๆ ในคอมมีปัญหาทำงานบกพร่องหรือไม่ทำงานอาจเกิดขึ้นจากหลากหลายสาเหตุ จำเป็นที่จะต้องค้นหาสาเหตุเป็นการเฉพาะ ไม่ว่าจะเป็นคีย์บอร์ด เมาส์ ลำโพง เสียงหาย หน้าจอแ', '11:15:23', '2021-02-02', '', 'สำเร็จ', 'Jeerachon', 'Sirichai', '', 0),
(145, 'Surgical R', 'เครื่องปริ้น', 'หมึกหมด', '14:33:04', '2021-06-07', '', 'กำลังดำเนินการ', 'Jeerachon', 'Sirichai', '', 1),
(147, 'Office 2', 'โทรศัพท์', 'aa', '14:55:17', '2021-06-07', '', 'กำลังดำเนินการ', 'Jeerachon', 'Sirichai', '', 0);

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
(19, 'Emergency Room'),
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
(3, 'โทรศัพท์');

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
('aof007', '123456', 'thanakrit', 'kansuree', 12345678, 1, '2021-06-16 14:00:42', 'user'),
('Jeerachon', '123456', 'จีราชล', 'ธรรมศร', 889943216, 0, '0000-00-00 00:00:00', 'user'),
('phoomin', '456789', 'ภูมินทร์', 'บุญอนันต์', 1333333333, 0, '0000-00-00 00:00:00', 'user'),
('Sirichai', '654321', 'ศิริชัย', 'เบ็ญจมาคม', 215148148, 0, '0000-00-00 00:00:00', 'admin'),
('teerat', '987654', 'ธีรัช', 'กิจเจริญ', 11223344, 0, '0000-00-00 00:00:00', 'superadmin');

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
  MODIFY `Case_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `spare_request`
--
ALTER TABLE `spare_request`
  MODIFY `Request_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tool`
--
ALTER TABLE `tool`
  MODIFY `toolid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
