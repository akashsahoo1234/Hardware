-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 02:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eandt`
--

-- --------------------------------------------------------

--
-- Table structure for table `acquire`
--

CREATE TABLE `acquire` (
  `AqId` int(11) NOT NULL,
  `AqModel` int(11) DEFAULT NULL,
  `AqAmount` int(11) DEFAULT NULL,
  `OrderNo` varchar(50) NOT NULL,
  `AqDesc` text DEFAULT NULL,
  `AqDate` date DEFAULT NULL,
  `MakeRef` int(11) DEFAULT NULL,
  `ProductRef` int(11) DEFAULT NULL,
  `SubRef` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acquire`
--

INSERT INTO `acquire` (`AqId`, `AqModel`, `AqAmount`, `OrderNo`, `AqDesc`, `AqDate`, `MakeRef`, `ProductRef`, `SubRef`) VALUES
(1003, 816, 1, 'GEMC', 'JOCP', '2024-04-01', 714, 5, 106),
(1004, 816, 9, 'GEMC-511687705880039', '', '2024-04-04', 714, 5, 106),
(1005, 814, 3, '', '', '2024-04-04', 713, 5, 108),
(1006, 817, 3, 'GEMC-511687705880039', '', '2024-04-04', 714, 5, 107),
(1007, 815, 3, '', '', '2024-04-04', 713, 5, 109),
(1008, 814, 10, '', '', '2024-04-04', 713, 5, 108),
(1009, 807, 3, 'GEMC-511687715423152', '', '2024-04-04', 710, 5, 106),
(1010, 816, 7, 'GEMC-511687705880039', '', '2024-04-04', 714, 5, 106),
(1011, 814, 3, '', '', '2024-04-04', 713, 5, 108),
(1012, 814, 8, 'GEMC-511687709190884', '', '2024-04-04', 713, 5, 108),
(1013, 815, 4, 'GEMC-511687709190884', '', '2024-04-04', 713, 5, 109),
(1014, 816, 18, 'GEMC-511687705880039', '', '2024-04-04', 714, 5, 106),
(1015, 807, 27, 'GEMC-511687715423152', '', '2024-04-04', 710, 5, 106),
(1016, 817, 3, 'GEMC-511687705880039', '', '2024-04-04', 714, 5, 107),
(1017, 816, 2, 'GEMC-511687705880039', '', '2024-04-05', 714, 5, 106),
(1018, 808, 3, 'GEMC-511687715423152', '', '2024-04-05', 710, 5, 107),
(1019, 810, 2, '', '', '2024-04-05', 711, 5, 106),
(1020, 814, 23, 'GEMC-511687709190884', '', '2024-04-05', 713, 5, 108),
(1021, 819, 100, 'GEMC0001234566', 'PURCHASED IN 2024', '2024-05-07', 715, 5, 110),
(1022, 820, 12, 'SDKLGHIASHG', 'RECEIVED', '2024-05-09', 716, 3, 113),
(1023, 821, 40, 'HSDGSDGH', 'RECEIVED', '2024-05-09', 716, 3, 113);

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `AvCat` int(11) NOT NULL,
  `AvPr` int(11) NOT NULL,
  `AvMake` int(11) NOT NULL,
  `AvModel` int(11) NOT NULL,
  `Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`AvCat`, `AvPr`, `AvMake`, `AvModel`, `Amount`) VALUES
(3, 113, 716, 820, 12),
(3, 113, 716, 821, 40),
(5, 106, 710, 807, 1),
(5, 106, 711, 810, 0),
(5, 106, 714, 816, 2),
(5, 107, 710, 808, 0),
(5, 107, 714, 817, 3),
(5, 108, 713, 814, 16),
(5, 109, 713, 815, 1),
(5, 110, 715, 819, 99);

-- --------------------------------------------------------

--
-- Table structure for table `brkcases`
--

CREATE TABLE `brkcases` (
  `BrkId` int(11) NOT NULL,
  `BrkM` varchar(255) DEFAULT NULL,
  `BrkRg` datetime DEFAULT NULL,
  `BrkOp` datetime DEFAULT NULL,
  `BrkCl` datetime DEFAULT NULL,
  `BrkSt` varchar(2) DEFAULT NULL,
  `BrkPb` text DEFAULT NULL,
  `BrkPr` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brkcases`
--

INSERT INTO `brkcases` (`BrkId`, `BrkM`, `BrkRg`, `BrkOp`, `BrkCl`, `BrkSt`, `BrkPb`, `BrkPr`) VALUES
(4, 'BBSRI031', '2024-04-21 23:54:21', '2024-04-21 23:55:00', '2024-04-21 23:55:57', '10', 'CAMERA BROKEN', NULL),
(5, 'BBSRI006', '2024-05-07 10:58:00', '2024-05-07 10:59:33', '2024-05-07 11:01:13', '10', 'LAPTOP NOT BOOTING ', '\n2024-05-07 11:00:00 :: mail sent\n2024-05-07 11:01:09 :: repair  done');

-- --------------------------------------------------------

--
-- Table structure for table `brkhours`
--

CREATE TABLE `brkhours` (
  `BrhId` int(11) NOT NULL,
  `BrhM` varchar(255) DEFAULT NULL,
  `Brh` decimal(10,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brkhours`
--

INSERT INTO `brkhours` (`BrhId`, `BrhM`, `Brh`) VALUES
(5, 'JOCP001', '0'),
(6, 'JOCP010', '0'),
(7, 'JOCP011', '0'),
(8, 'JOCP012', '0'),
(9, 'JOCP002', '0'),
(10, 'JOCP003', '0'),
(11, 'JOCP004', '0'),
(12, 'JOCP005', '0'),
(13, 'JOCP007', '0'),
(14, 'JOCP008', '0'),
(15, 'JOCP026', '0'),
(16, 'JOCP029', '0'),
(17, 'JOCP031', '0'),
(18, 'JOCP006', '0'),
(19, 'JOCP009', '0'),
(20, 'BBSRI011', '0'),
(21, 'JOCP013', '0'),
(22, 'JOCP018', '0'),
(23, 'JOCP022', '0'),
(24, 'JOCP016', '0'),
(25, 'JOCP017', '0'),
(26, 'JOCP019', '0'),
(27, 'JOCP020', '0'),
(28, 'JOCP021', '0'),
(29, 'JOCP023', '0'),
(30, 'JOCP024', '0'),
(31, 'JOCP025', '0'),
(32, 'JOCP030', '0'),
(33, 'JOCP032', '0'),
(34, 'JOCP033', '0'),
(35, 'JOCP034', '0'),
(36, 'JOCP035', '0'),
(37, 'JOCP036', '0'),
(38, 'JOCP037', '0'),
(39, 'JOCP038', '0'),
(40, 'JOCP039', '0'),
(41, 'JOCP040', '0'),
(42, 'JOCP041', '0'),
(43, 'JOCP042', '0'),
(44, 'BBSRI001', '0'),
(45, 'BBSRI002', '0'),
(46, 'BBSRI004', '0'),
(47, 'BBSRI005', '0'),
(48, 'BBSRI007', '0'),
(49, 'BBSRI021', '0'),
(50, 'BBSRI022', '0'),
(51, 'BBSRI023', '0'),
(52, 'BBSRI024', '0'),
(53, 'BBSRI003', '0'),
(54, 'BBSRI006', '0'),
(55, 'BBSRI008', '0'),
(56, 'BBSRI009', '0'),
(57, 'BBSRI010', '0'),
(58, 'BBSRI012', '0'),
(59, 'BBSRI014', '0'),
(60, 'BBSRI015', '0'),
(61, 'BBSRI017', '0'),
(62, 'BBSRI018', '0'),
(63, 'BBSRI019', '0'),
(64, 'BBSRI025', '0'),
(65, 'BBSRI026', '0'),
(66, 'BBSRI027', '0'),
(67, 'BBSRI028', '0'),
(68, 'BBSRI032', '0'),
(69, 'BBSRI033', '0'),
(70, 'BBSRI034', '0'),
(71, 'BBSRI036', '0'),
(72, 'BBSRI038', '0'),
(73, 'BBSRI029', '0'),
(74, 'BBSRI035', '0'),
(75, 'BBSRI037', '0'),
(76, 'BBSRI039', '0'),
(77, 'BBSRI040', '0'),
(78, 'BBSRI041', '0'),
(79, 'BBSRI042', '0'),
(80, 'BBSRI043', '0'),
(81, 'BBSRI044', '0'),
(82, 'BBSRI045', '0'),
(83, 'BBSRI056', '0'),
(84, 'BBSRI057', '0'),
(85, 'BBSRI058', '0'),
(86, 'BBSRI059', '0'),
(87, 'BBSRI061', '0'),
(88, 'BBSRI063', '0'),
(89, 'BBSRI064', '0'),
(90, 'BBSRI066', '0'),
(91, 'BBSRI071', '0'),
(92, 'BBSRI072', '0'),
(93, 'BBSRI073', '0'),
(94, 'BBSRI074', '0'),
(95, 'BBSRI075', '0'),
(96, 'BBSRI076', '0'),
(97, 'BBSRI077', '0'),
(98, 'BBSRI078', '0'),
(99, 'BBSRI060', '0'),
(100, 'BBSRI062', '0'),
(101, 'BBSRI065', '0'),
(102, 'BBSRI030', '0'),
(103, 'BBSRI031', '0'),
(104, 'AOCP003', '0'),
(105, 'AOCP004', '0'),
(106, 'AOCP006', '0'),
(107, 'AOCO007', '0'),
(108, 'AOCO008', '0'),
(109, 'AHQJA004', '0'),
(110, 'AHQJA009', '0'),
(111, 'AHQJA010', '0'),
(112, 'AHQJA008', '0'),
(113, '5CD74887ZN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `DmCode` int(11) NOT NULL,
  `DmName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`DmCode`, `DmName`) VALUES
(639, ''),
(631, '132 KV SUBSTATION,  JAGANNATH'),
(628, 'ADMINISTRATION'),
(620, 'AREA TRAINING OFFICE'),
(625, 'CHP'),
(609, 'CIVIL'),
(638, 'DESPATCH'),
(623, 'DRILLING & BLASTING'),
(605, 'E&M'),
(601, 'E&T'),
(616, 'ENVIRONMENT'),
(608, 'EXCAVATION'),
(612, 'FINANCE AND ACCOUNTS'),
(637, 'GEOLOGY'),
(627, 'GM SECRETARIAT'),
(610, 'LAND & REVENUE'),
(632, 'LEGAL'),
(611, 'MARKETING & SALES'),
(624, 'MARKETTING & SALES'),
(604, 'MATERIAL MANAGEMENT'),
(617, 'MEDICAL'),
(603, 'MINING'),
(615, 'OPERATIONS/ MINING'),
(607, 'PERSONNEL'),
(634, 'PROJECT & PLANNING'),
(621, 'QUALITY CONTROL'),
(635, 'RAJBHASHA'),
(626, 'SAFETY'),
(618, 'SAFETY & RESCUE'),
(622, 'SECURITY'),
(629, 'SIDING'),
(614, 'STORE'),
(606, 'SURVEY'),
(602, 'SYSTEMS'),
(613, 'TRAINING'),
(630, 'WEIGH BRIDGE');

-- --------------------------------------------------------

--
-- Table structure for table `installation`
--

CREATE TABLE `installation` (
  `InId` int(11) NOT NULL,
  `InU` int(11) DEFAULT NULL,
  `InD` int(11) DEFAULT NULL,
  `InL` varchar(100) DEFAULT NULL,
  `InC` int(11) DEFAULT NULL,
  `InS` int(11) DEFAULT NULL,
  `InMk` int(11) DEFAULT NULL,
  `InMl` int(11) DEFAULT NULL,
  `InA` int(11) DEFAULT NULL,
  `InM` varchar(255) DEFAULT NULL,
  `InCo` varchar(100) DEFAULT NULL,
  `InN` varchar(100) DEFAULT NULL,
  `InP` varchar(20) DEFAULT NULL,
  `InSt` varchar(1) DEFAULT NULL,
  `InDt` datetime DEFAULT NULL,
  `InRk` text NOT NULL,
  `InBy` varchar(20) DEFAULT NULL,
  `ipv4` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `installation`
--

INSERT INTO `installation` (`InId`, `InU`, `InD`, `InL`, `InC`, `InS`, `InMk`, `InMl`, `InA`, `InM`, `InCo`, `InN`, `InP`, `InSt`, `InDt`, `InRk`, `InBy`, `ipv4`) VALUES
(100004, 504, 630, 'FC 1&2', 5, 106, 714, 816, 1, 'JOCP001', 'VIGILANCE AND STATE LEGAL ', 'VIVEK MISHRA', '9131768329', 'A', '2024-04-01 18:22:44', '', 'A95001601', ''),
(100005, 504, 605, 'JUNCTION WB#5', 5, 108, 713, 814, 1, 'JOCP010', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 12:23:57', '', 'A95001601', ''),
(100006, 504, 605, 'JUNCTION WB#5', 5, 108, 713, 814, 1, 'JOCP011', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 12:24:19', '', 'A95001601', ''),
(100007, 504, 605, 'JUNCTION WB#5', 5, 108, 713, 814, 1, 'JOCP012', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 12:24:29', '', 'A95001601', ''),
(100009, 504, 622, 'STOCK #5 ENTRY EXIT POINT', 5, 106, 714, 816, 1, 'JOCP002', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 12:27:27', '', 'A95001601', ''),
(100010, 504, 622, 'STOCK #5 ENTRY EXIT POINT', 5, 106, 714, 816, 1, 'JOCP003', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 12:27:55', '', 'A95001601', ''),
(100011, 504, 605, 'IN WB#01', 5, 106, 714, 816, 1, 'JOCP004', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 12:29:22', '', 'A95001601', ''),
(100012, 504, 605, 'IN WB#01', 5, 106, 714, 816, 1, 'JOCP005', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 12:29:33', '', 'A95001601', ''),
(100013, 504, 605, 'IN WB#03', 5, 106, 714, 816, 1, 'JOCP007', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 12:30:46', '', 'A95001601', ''),
(100014, 504, 605, 'IN WB#03', 5, 106, 714, 816, 1, 'JOCP008', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 12:31:18', '', 'A95001601', ''),
(100015, 504, 622, 'ENTRY EXIT NEAR STOCK 6(NEAR FC1&2)', 5, 106, 714, 816, 1, 'JOCP026', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 12:33:08', '', 'A95001601', ''),
(100016, 504, 605, 'FC1 & 2 WB', 5, 106, 714, 816, 1, 'JOCP029', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 12:35:11', '', 'A95001601', ''),
(100017, 504, 605, 'FC1 & 2 WB', 5, 106, 714, 816, 1, 'JOCP031', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 12:35:55', '', 'A95001601', ''),
(100018, 504, 605, 'WEIGHBRIDGES', 5, 107, 714, 817, 1, 'JOCP006', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 12:38:53', '', 'A95001601', ''),
(100019, 504, 605, 'WEIGHBRIDGES', 5, 107, 714, 817, 1, 'JOCP009', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 12:39:15', '', 'A95001601', ''),
(100020, 503, 605, 'WEIGHBRIDGES', 5, 107, 714, 817, 1, 'BBSRI011', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 12:42:51', '', 'A95001601', ''),
(100021, 504, 605, 'JUNCTION WB#5', 5, 109, 713, 815, 1, 'JOCP013', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:08:44', '', 'A95001601', ''),
(100022, 504, 605, 'JUNCTION WB#3', 5, 109, 713, 815, 1, 'JOCP018', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:10:16', '', 'A95001601', ''),
(100023, 504, 605, 'WASHERY WB', 5, 109, 713, 815, 1, 'JOCP022', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:11:42', '', 'A95001601', ''),
(100024, 504, 605, 'JUNCTION WB#3', 5, 108, 713, 814, 1, 'JOCP016', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:16:56', '', 'A95001601', ''),
(100025, 504, 605, 'JUNCTION WB#3', 5, 108, 713, 814, 1, 'JOCP017', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:17:45', '', 'A95001601', ''),
(100026, 504, 622, 'ENTRY EXIT NEAR STOCK (NEAR FC 4 WB )', 5, 108, 713, 814, 1, 'JOCP019', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:20:11', '', 'A95001601', ''),
(100027, 504, 622, 'ENTRY EXIT NEAR STOCK (NEAR FC 4 WB )', 5, 108, 713, 814, 1, 'JOCP020', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:21:00', '', 'A95001601', ''),
(100028, 504, 622, 'ENTRY EXIT NEAR STOCK (NEAR FC 4 WB )', 5, 108, 713, 814, 1, 'JOCP021', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:21:55', '', 'A95001601', ''),
(100029, 504, 605, 'WASHERY WB', 5, 108, 713, 814, 1, 'JOCP023', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:23:30', '', 'A95001601', ''),
(100030, 504, 622, 'ENTRY EXIT TWORDS CHP FROM UNDERPASS', 5, 108, 713, 814, 1, 'JOCP024', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:25:46', '', 'A95001601', ''),
(100031, 504, 622, 'ENTRY EXIT NEAR STOCK 6(NEAR FC1&2)', 5, 106, 710, 807, 1, 'JOCP025', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:31:08', '', 'A95001601', ''),
(100032, 504, 605, 'FC1 & 2 WB', 5, 106, 710, 807, 1, 'JOCP030', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:33:02', '', 'A95001601', ''),
(100033, 504, 605, 'SUBSTATION', 5, 106, 710, 807, 1, 'JOCP032', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:34:40', '', 'A95001601', ''),
(100034, 504, 605, 'SUBSTATION', 5, 106, 714, 816, 1, 'JOCP033', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:39:19', '', 'A95001601', ''),
(100035, 504, 605, 'SUBSTATION', 5, 106, 714, 816, 1, 'JOCP034', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:40:36', '', 'A95001601', ''),
(100036, 504, 605, 'SUBSTATION', 5, 106, 714, 816, 1, 'JOCP035', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:41:32', '', 'A95001601', ''),
(100037, 504, 608, 'EXCAVATION WS & DIESEL FILLING STATION', 5, 106, 714, 816, 1, 'JOCP036', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:43:30', '', 'A95001601', ''),
(100038, 504, 608, 'EXCAVATION WS & DIESEL FILLING STATION', 5, 106, 714, 816, 1, 'JOCP037', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:44:22', '', 'A95001601', ''),
(100039, 504, 608, 'EXCAVATION WS & DIESEL FILLING STATION', 5, 106, 714, 816, 1, 'JOCP038', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:45:04', '', 'A95001601', ''),
(100040, 504, 622, 'ENTRY TO TIME OFFICE', 5, 106, 714, 816, 1, 'JOCP039', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:46:43', '', 'A95001601', ''),
(100041, 504, 608, 'EXCAVATION WS(DIESEL FILLING STATION)', 5, 108, 713, 814, 1, 'JOCP040', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:50:12', '', 'A95001601', ''),
(100042, 504, 608, 'EXCAVATION WS(DIESEL FILLING STATION)', 5, 108, 713, 814, 1, 'JOCP041', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:50:58', '', 'A95001601', ''),
(100043, 504, 608, 'EXCAVATION WS(DIESEL FILLING STATION)', 5, 108, 713, 814, 1, 'JOCP042', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:51:34', '', 'A95001601', ''),
(100044, 503, 605, 'RAIL I/M WB 1A', 5, 108, 713, 814, 1, 'BBSRI001', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:57:33', '', 'A95001601', ''),
(100045, 503, 605, 'RAIL I/M WB 1A', 5, 108, 713, 814, 1, 'BBSRI002', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 13:58:22', '', 'A95001601', ''),
(100046, 503, 605, 'RAIL I/M WB 1', 5, 108, 713, 814, 1, 'BBSRI004', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 14:01:06', '', 'A95001601', ''),
(100047, 503, 605, 'RAIL I/M WB 3', 5, 108, 713, 814, 1, 'BBSRI005', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 14:02:30', '', 'A95001601', ''),
(100048, 503, 605, 'RAIL I/M WB 3', 5, 108, 713, 814, 1, 'BBSRI007', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 14:03:50', '', 'A95001601', ''),
(100049, 503, 622, 'ENTRY EXIT NEAR STATIC 1&2', 5, 108, 713, 814, 1, 'BBSRI021', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 14:05:11', '', 'A95001601', ''),
(100051, 503, 622, 'ENTRY EXIT NEAR STATIC 1&2', 5, 108, 713, 814, 1, 'BBSRI022', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 14:07:00', '', 'A95001601', ''),
(100052, 503, 622, 'ENTRY EXIT NEAR STATIC 1&2', 5, 108, 713, 814, 1, 'BBSRI023', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 14:07:46', '', 'A95001601', ''),
(100053, 503, 622, 'ENTRY EXIT NEAR STATIC 1&2', 5, 108, 713, 814, 1, 'BBSRI024', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 14:08:35', '', 'A95001601', ''),
(100056, 503, 605, 'RAIL I/M WB 1', 5, 109, 713, 815, 2, 'BBSRI003', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 14:17:55', '', 'A95001601', ''),
(100057, 503, 605, 'RAIL I/M WB 3', 5, 109, 713, 815, 1, 'BBSRI006', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 14:19:23', '', 'A95001601', ''),
(100058, 503, 605, 'STATIC-1 &2', 5, 106, 714, 816, 1, 'BBSRI008', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 14:24:36', '', 'A95001601', ''),
(100059, 503, 605, 'STATIC-1 &2', 5, 106, 714, 816, 1, 'BBSRI009', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 14:25:19', '', 'A95001601', ''),
(100060, 503, 605, 'STATIC-1 &2', 5, 106, 714, 816, 1, 'BBSRI010', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 14:26:08', '', 'A95001601', ''),
(100061, 503, 605, 'STATIC-3', 5, 106, 714, 816, 1, 'BBSRI012', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 14:27:51', '', 'A95001601', ''),
(100062, 503, 605, 'STATIC-6 & 7', 5, 106, 714, 816, 1, 'BBSRI014', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 14:30:09', '', 'A95001601', ''),
(100063, 503, 605, 'STATIC-6 & 7', 5, 106, 714, 816, 1, 'BBSRI015', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 14:31:37', '', 'A95001601', ''),
(100064, 503, 605, 'STATIC-6 & 7', 5, 106, 714, 816, 1, 'BBSRI017', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 15:52:18', '', 'A95001601', ''),
(100065, 503, 605, 'STATIC-6 & 7', 5, 106, 714, 816, 1, 'BBSRI018', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 15:53:10', '', 'A95001601', ''),
(100066, 503, 622, 'ENTRY EXIT NEAR SAHARSAI', 5, 106, 714, 816, 1, 'BBSRI019', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 15:55:00', '', 'A95001601', ''),
(100067, 503, 622, 'WASHERY CHALLAN POINT- STOCK 16', 5, 106, 714, 816, 1, 'BBSRI025', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 15:56:51', '', 'A95001601', ''),
(100068, 503, 622, 'WASHERY CHALLAN POINT- STOCK 16', 5, 106, 714, 816, 1, 'BBSRI026', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 15:57:40', '', 'A95001601', ''),
(100069, 503, 622, 'CHALLAN POINT NEAR 4 NO. STOCK', 5, 106, 714, 816, 1, 'BBSRI027', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 15:58:55', '', 'A95001601', ''),
(100070, 503, 622, 'CHALLAN POINT NEAR 4 NO. STOCK', 5, 106, 714, 816, 1, 'BBSRI028', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 15:59:50', '', 'A95001601', ''),
(100071, 503, 601, '1&2 RLY SIDING', 5, 106, 714, 816, 1, 'BBSRI032', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:01:42', '', 'A95001601', ''),
(100072, 503, 601, '1&2 RLY SIDING', 5, 106, 714, 816, 1, 'BBSRI033', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:02:27', '', 'A95001601', ''),
(100073, 503, 601, '3&4 RLY SIDING', 5, 106, 714, 816, 1, 'BBSRI034', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:03:48', '', 'A95001601', ''),
(100074, 503, 601, '3&4 RLY SIDING', 5, 106, 714, 816, 1, 'BBSRI036', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:04:46', '', 'A95001601', ''),
(100075, 503, 622, 'TRAFFIC POINT 3 NO. ALONG WITH EXCAVATION', 5, 106, 714, 816, 1, 'BBSRI038', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:06:09', '', 'A95001601', ''),
(100076, 503, 622, 'CHALLAN POINT NEAR 4 NO. STOCK', 5, 106, 710, 807, 1, 'BBSRI029', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:11:23', '', 'A95001601', ''),
(100077, 503, 601, '3&4 RLY SIDING', 5, 106, 710, 807, 1, 'BBSRI035', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:12:29', '', 'A95001601', ''),
(100078, 503, 601, '3&4 RLY SIDING', 5, 106, 710, 807, 1, 'BBSRI037', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:13:34', '', 'A95001601', ''),
(100079, 503, 622, 'TRAFFIC POINT 3 NO. ALONG WITH EXCAVATION', 5, 106, 710, 807, 1, 'BBSRI039', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:15:18', '', 'A95001601', ''),
(100080, 503, 608, 'EXCAVATION WORKSHOP', 5, 106, 710, 807, 1, 'BBSRI040', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:16:20', '', 'A95001601', ''),
(100081, 503, 608, 'EXCAVATION WORKSHOP', 5, 106, 710, 807, 1, 'BBSRI041', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:16:58', '', 'A95001601', ''),
(100082, 503, 605, 'SUBSTATION', 5, 106, 710, 807, 1, 'BBSRI042', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:18:10', '', 'A95001601', ''),
(100083, 503, 605, 'SUBSTATION', 5, 106, 710, 807, 1, 'BBSRI043', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:18:56', '', 'A95001601', ''),
(100084, 503, 605, 'SUBSTATION', 5, 106, 710, 807, 1, 'BBSRI044', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:19:39', '', 'A95001601', ''),
(100085, 503, 605, 'SUBSTATION', 5, 106, 710, 807, 1, 'BBSRI045', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:20:16', '', 'A95001601', ''),
(100086, 503, 605, 'ROAD IMWB 1', 5, 106, 710, 807, 1, 'BBSRI056', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:22:34', '', 'A95001601', ''),
(100087, 503, 605, 'ROAD IMWB 1', 5, 106, 710, 807, 1, 'BBSRI057', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:23:14', '', 'A95001601', ''),
(100088, 503, 605, 'ROAD IMWB 6', 5, 106, 710, 807, 1, 'BBSRI058', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:24:13', '', 'A95001601', ''),
(100089, 503, 605, 'ROAD IMWB 6', 5, 106, 710, 807, 1, 'BBSRI059', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:24:55', '', 'A95001601', ''),
(100090, 503, 605, 'ROAD IMWB 7', 5, 106, 710, 807, 1, 'BBSRI061', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:26:00', '', 'A95001601', ''),
(100091, 503, 605, 'ROAD IMWB 7', 5, 106, 710, 807, 1, 'BBSRI063', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:26:47', '', 'A95001601', ''),
(100092, 503, 605, 'ROAD IMWB 8', 5, 106, 710, 807, 1, 'BBSRI064', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:27:42', '', 'A95001601', ''),
(100093, 503, 605, 'ROAD IMWB 8', 5, 106, 710, 807, 1, 'BBSRI066', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:28:44', '', 'A95001601', ''),
(100094, 503, 605, 'NEW SILO', 5, 106, 710, 807, 1, 'BBSRI071', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:29:59', '', 'A95001601', ''),
(100095, 503, 605, 'NEW SILO', 5, 106, 710, 807, 1, 'BBSRI072', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:30:42', '', 'A95001601', ''),
(100096, 503, 605, 'NEW SILO', 5, 106, 710, 807, 1, 'BBSRI073', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:31:17', '', 'A95001601', ''),
(100097, 503, 605, 'NEW SILO', 5, 106, 710, 807, 1, 'BBSRI074', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:31:54', '', 'A95001601', ''),
(100098, 502, 608, 'ROAD IM WB 9', 5, 106, 710, 807, 1, 'BBSRI075', '', 'PRASHANT KU SAHOO', '8658241400', 'R', '2024-04-04 16:32:53', 'CAMERA INSTALLED IN THE RIGHT PLACE', 'A95001601', '171.23.45.6'),
(100099, 503, 605, 'ROAD IM WB 9', 5, 106, 710, 807, 1, 'BBSRI076', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:33:32', '', 'A95001601', ''),
(100100, 503, 605, 'ROALD IW WB 3', 5, 106, 710, 807, 1, 'BBSRI077', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:34:26', '', 'A95001601', ''),
(100101, 503, 605, 'ROALD IW WB 3', 5, 106, 710, 807, 1, 'BBSRI078', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-04 16:35:05', '', 'A95001601', ''),
(100103, 503, 605, '1&2 RLY SIDING', 5, 107, 710, 808, 1, 'BBSRI060', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-05 11:35:20', '', 'A95001601', ''),
(100104, 503, 605, 'ROAD IMWB 7', 5, 107, 710, 808, 1, 'BBSRI062', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-05 11:42:12', '', 'A95001601', ''),
(100105, 503, 605, 'ROAD IMWB 8', 5, 107, 710, 808, 1, 'BBSRI065', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-05 11:43:42', '', 'A95001601', ''),
(100106, 503, 601, '1&2 RLY SIDING', 5, 106, 711, 810, 1, 'BBSRI030', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-05 11:48:45', '', 'A95001601', ''),
(100107, 503, 601, '1&2 RLY SIDING', 5, 106, 711, 810, 1, 'BBSRI031', '', 'PRASHANT KU SAHOO', '8658241400', 'B', '2024-04-05 11:50:07', '', 'A95001601', ''),
(100108, 502, 605, 'ROAD STATIC WEIGHBRIDGE NO.-08', 5, 108, 713, 814, 1, 'AOCP003', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-05 11:59:11', '', 'A95001601', ''),
(100109, 502, 605, 'ROAD STATIC WEIGHBRIDGE NO.-08', 5, 108, 713, 814, 1, 'AOCP004', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-05 12:18:39', '', 'A95001601', ''),
(100110, 502, 605, 'ROAD STATIC WEIGHBRIDGE NO.-08', 5, 108, 713, 814, 1, 'AOCP006', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-05 12:33:18', '', 'A95001601', ''),
(100111, 502, 605, 'ROAD STATIC WEIGHBRIDGE NO.-08', 5, 108, 713, 814, 1, 'AOCO007', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-05 12:35:43', '', 'A95001601', ''),
(100112, 502, 605, 'ROAD STATIC WEIGHBRIDGE NO.-08', 5, 108, 713, 814, 1, 'AOCO008', '', 'PRASHANT KU SAHOO', '8658241400', 'A', '2024-04-05 12:37:35', '', 'A95001601', ''),
(100113, 501, 638, 'CENTRAL ROOM', 5, 108, 713, 814, 1, 'AHQJA004', '', '', '', 'A', '2024-04-13 22:41:40', '', 'A95001601', ''),
(100115, 503, 623, 'CENTRAL ROOM', 5, 108, 713, 814, 1, 'AHQJA009', '', '', '', 'A', '2024-04-18 23:01:54', '', 'A95001601', '123.34.5.8'),
(100116, 503, 623, 'CENTRAL ROOM', 5, 108, 713, 814, 1, 'AHQJA010', '', '', '', 'A', '2024-04-18 23:03:28', '', 'A95001601', '123.34.5.8'),
(100117, 503, 623, 'CENTRAL ROOM', 5, 108, 713, 814, 1, 'AHQJA008', '', 'AKASH SAHOO', '', 'S', '2024-04-18 23:04:07', '', 'A95001601', '123.34.5.878'),
(100119, 501, 602, 'SO SYSTEM ROOM', 5, 110, 715, 819, 1, '5CD74887ZN', 'IN EXCHANGE', 'AKASH SAHOO', '8328839684', 'A', '2024-05-07 11:21:29', 'SUCCESFULLY INSTALLED', 'A95001601', '123.5.6.77');

-- --------------------------------------------------------

--
-- Table structure for table `productmake`
--

CREATE TABLE `productmake` (
  `MakeID` int(11) NOT NULL,
  `make` varchar(255) DEFAULT NULL,
  `product` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productmake`
--

INSERT INTO `productmake` (`MakeID`, `make`, `product`) VALUES
(710, 'CP PLUS', 5),
(711, 'HIKVISION', 5),
(712, 'PRAMA', 5),
(713, 'ANALOG', 5),
(714, 'GLOTECH', 5),
(715, 'HP', 5),
(716, 'DEGISEC', 3);

-- --------------------------------------------------------

--
-- Table structure for table `productmodel`
--

CREATE TABLE `productmodel` (
  `ModelID` int(11) NOT NULL,
  `ModelName` varchar(255) DEFAULT NULL,
  `MakeID` int(11) DEFAULT NULL,
  `ProductRef` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productmodel`
--

INSERT INTO `productmodel` (`ModelID`, `ModelName`, `MakeID`, `ProductRef`) VALUES
(807, 'IP BULLET', 710, 5),
(808, 'IP DOME', 710, 5),
(810, 'HIKVISION BULLET', 711, 5),
(811, 'HIKVISION DOME', 711, 5),
(812, 'PRAMA BULLET', 712, 5),
(813, 'PRAMA DOME', 712, 5),
(814, 'ANALOG BULLET', 713, 5),
(815, 'ANALOG DOME', 713, 5),
(816, 'GLOTECH BULLET', 714, 5),
(817, 'GLOTECH DOME', 714, 5),
(819, 'HP-132TX', 715, 5),
(820, 'DIGISEC-123', 716, 3),
(821, 'DIGISEC-45', 716, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `Material_Code` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Available` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Material_Code`, `Name`, `Available`) VALUES
(1, '4000000223', 'FTTH Connection', 100),
(2, '4000000223', 'Exchanges', 100),
(3, '4000000223', 'Dongles/Wi-Fi Devices', 100),
(4, '4000000223', 'Boom Barriers', 100),
(5, '4000000223', 'CCTV', 100),
(6, '4000000223', 'GPS', 100),
(7, '40000005674', 'biometrics', 100),
(8, '40000005675', 'VIDEO CONFERENCING SYSTEM', 100),
(9, '40000005675', 'EQUIPMENTS', 100);

-- --------------------------------------------------------

--
-- Table structure for table `subproduct`
--

CREATE TABLE `subproduct` (
  `SpId` int(11) NOT NULL,
  `SpName` varchar(255) DEFAULT NULL,
  `ProductRef` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subproduct`
--

INSERT INTO `subproduct` (`SpId`, `SpName`, `ProductRef`) VALUES
(106, 'IP BULLET', 5),
(107, 'IP DOME', 5),
(108, 'ANALOG BULLET', 5),
(109, 'ANALOG DOME', 5),
(110, 'LAPTOP', 5),
(111, 'KEYBOARD', 5),
(113, 'ROUTER', 3),
(114, 'FIBER CHORD', 3);

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

CREATE TABLE `total` (
  `AvPr` int(11) NOT NULL,
  `Total` decimal(32,0) DEFAULT NULL,
  `TotalRows` bigint(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `total`
--

INSERT INTO `total` (`AvPr`, `Total`, `TotalRows`) VALUES
(106, '3', 3),
(107, '3', 2),
(108, '16', 1),
(109, '1', 1),
(110, '99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `UnCode` int(11) NOT NULL,
  `UnName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`UnCode`, `UnName`) VALUES
(506, '132 KVSS,JAGANNATH'),
(501, 'AHQ JAGANNATH'),
(512, 'ANANTA DISPENSARY'),
(502, 'ANANTA OCP'),
(510, 'BALANDA DISPENSARY'),
(503, 'BHUBANESHWARI OCP'),
(509, 'JAGANNATH BELT SID'),
(508, 'JAGANNATH DISPENSARY'),
(504, 'JAGANNATH OCP'),
(505, 'REGIONAL STORE JAGANNATH'),
(513, 'SPUR-I SID.'),
(514, 'SPUR-II SID.'),
(515, 'SPUR-III SID.'),
(516, 'SPUR-IV SID.'),
(517, 'SPUR-V SID.'),
(518, 'SPUR-VI SID.'),
(511, 'TALCHER(W) UG'),
(507, 'VTC JAGANNATH');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `session_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `email`, `registration_date`, `last_login`, `session_token`) VALUES
(1, 'A95001601', '7a3a8e0cf624652869afed16342c4f09', 'akashsahoo0305@gmail.com', '2024-01-04 15:52:53', '2024-01-04 15:52:53', 'd0af993e7f48bd49b78f5a0441929082b5d3e711ac1b74ed76a4641c79ac42d7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acquire`
--
ALTER TABLE `acquire`
  ADD PRIMARY KEY (`AqId`),
  ADD KEY `AqModel` (`AqModel`),
  ADD KEY `MakeRef` (`MakeRef`),
  ADD KEY `ProductRef` (`ProductRef`),
  ADD KEY `SubRef` (`SubRef`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`AvCat`,`AvPr`,`AvMake`,`AvModel`),
  ADD KEY `AvPr` (`AvPr`),
  ADD KEY `AvMake` (`AvMake`),
  ADD KEY `AvModel` (`AvModel`);

--
-- Indexes for table `brkcases`
--
ALTER TABLE `brkcases`
  ADD PRIMARY KEY (`BrkId`),
  ADD KEY `BrkM` (`BrkM`);

--
-- Indexes for table `brkhours`
--
ALTER TABLE `brkhours`
  ADD PRIMARY KEY (`BrhId`),
  ADD KEY `BrhM` (`BrhM`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`DmCode`),
  ADD UNIQUE KEY `DmName` (`DmName`);

--
-- Indexes for table `installation`
--
ALTER TABLE `installation`
  ADD PRIMARY KEY (`InId`),
  ADD UNIQUE KEY `InM` (`InM`),
  ADD KEY `InU` (`InU`),
  ADD KEY `InD` (`InD`),
  ADD KEY `InC` (`InC`),
  ADD KEY `InS` (`InS`),
  ADD KEY `InMk` (`InMk`),
  ADD KEY `InMl` (`InMl`);

--
-- Indexes for table `productmake`
--
ALTER TABLE `productmake`
  ADD PRIMARY KEY (`MakeID`),
  ADD UNIQUE KEY `make` (`make`),
  ADD KEY `product` (`product`);

--
-- Indexes for table `productmodel`
--
ALTER TABLE `productmodel`
  ADD PRIMARY KEY (`ModelID`),
  ADD UNIQUE KEY `ModelName` (`ModelName`),
  ADD KEY `MakeID` (`MakeID`),
  ADD KEY `ProductRef` (`ProductRef`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `subproduct`
--
ALTER TABLE `subproduct`
  ADD PRIMARY KEY (`SpId`),
  ADD UNIQUE KEY `SpName` (`SpName`),
  ADD KEY `ProductRef` (`ProductRef`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`UnCode`),
  ADD UNIQUE KEY `UnName` (`UnName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acquire`
--
ALTER TABLE `acquire`
  MODIFY `AqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;

--
-- AUTO_INCREMENT for table `brkcases`
--
ALTER TABLE `brkcases`
  MODIFY `BrkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brkhours`
--
ALTER TABLE `brkhours`
  MODIFY `BrhId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `DmCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=640;

--
-- AUTO_INCREMENT for table `installation`
--
ALTER TABLE `installation`
  MODIFY `InId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100120;

--
-- AUTO_INCREMENT for table `productmake`
--
ALTER TABLE `productmake`
  MODIFY `MakeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=717;

--
-- AUTO_INCREMENT for table `productmodel`
--
ALTER TABLE `productmodel`
  MODIFY `ModelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=822;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subproduct`
--
ALTER TABLE `subproduct`
  MODIFY `SpId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `UnCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=519;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acquire`
--
ALTER TABLE `acquire`
  ADD CONSTRAINT `acquire_ibfk_1` FOREIGN KEY (`AqModel`) REFERENCES `productmodel` (`ModelID`),
  ADD CONSTRAINT `acquire_ibfk_2` FOREIGN KEY (`MakeRef`) REFERENCES `productmake` (`MakeID`),
  ADD CONSTRAINT `acquire_ibfk_3` FOREIGN KEY (`ProductRef`) REFERENCES `products` (`ID`),
  ADD CONSTRAINT `acquire_ibfk_4` FOREIGN KEY (`SubRef`) REFERENCES `subproduct` (`SpId`);

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`AvPr`) REFERENCES `subproduct` (`SpId`),
  ADD CONSTRAINT `availability_ibfk_2` FOREIGN KEY (`AvMake`) REFERENCES `productmake` (`MakeID`),
  ADD CONSTRAINT `availability_ibfk_3` FOREIGN KEY (`AvModel`) REFERENCES `productmodel` (`ModelID`),
  ADD CONSTRAINT `availability_ibfk_4` FOREIGN KEY (`AvCat`) REFERENCES `products` (`ID`);

--
-- Constraints for table `brkcases`
--
ALTER TABLE `brkcases`
  ADD CONSTRAINT `brkcases_ibfk_1` FOREIGN KEY (`BrkM`) REFERENCES `installation` (`InM`);

--
-- Constraints for table `brkhours`
--
ALTER TABLE `brkhours`
  ADD CONSTRAINT `brkhours_ibfk_1` FOREIGN KEY (`BrhM`) REFERENCES `installation` (`InM`);

--
-- Constraints for table `installation`
--
ALTER TABLE `installation`
  ADD CONSTRAINT `installation_ibfk_1` FOREIGN KEY (`InU`) REFERENCES `units` (`UnCode`),
  ADD CONSTRAINT `installation_ibfk_2` FOREIGN KEY (`InD`) REFERENCES `departments` (`DmCode`),
  ADD CONSTRAINT `installation_ibfk_3` FOREIGN KEY (`InC`) REFERENCES `products` (`ID`),
  ADD CONSTRAINT `installation_ibfk_4` FOREIGN KEY (`InS`) REFERENCES `subproduct` (`SpId`),
  ADD CONSTRAINT `installation_ibfk_5` FOREIGN KEY (`InMk`) REFERENCES `productmake` (`MakeID`),
  ADD CONSTRAINT `installation_ibfk_6` FOREIGN KEY (`InMl`) REFERENCES `productmodel` (`ModelID`);

--
-- Constraints for table `productmake`
--
ALTER TABLE `productmake`
  ADD CONSTRAINT `productmake_ibfk_1` FOREIGN KEY (`product`) REFERENCES `products` (`ID`);

--
-- Constraints for table `productmodel`
--
ALTER TABLE `productmodel`
  ADD CONSTRAINT `productmodel_ibfk_1` FOREIGN KEY (`MakeID`) REFERENCES `productmake` (`MakeID`),
  ADD CONSTRAINT `productmodel_ibfk_2` FOREIGN KEY (`ProductRef`) REFERENCES `products` (`ID`);

--
-- Constraints for table `subproduct`
--
ALTER TABLE `subproduct`
  ADD CONSTRAINT `subproduct_ibfk_1` FOREIGN KEY (`ProductRef`) REFERENCES `products` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
