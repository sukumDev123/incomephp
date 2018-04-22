-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2018 at 03:36 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `income`
--

-- --------------------------------------------------------

--
-- Table structure for table `incomeDB`
--

CREATE TABLE `incomeDB` (
  `incomeId` int(11) NOT NULL,
  `moneyInput` double NOT NULL,
  `typeMoney` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subType` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incomeDB`
--

INSERT INTO `incomeDB` (`incomeId`, `moneyInput`, `typeMoney`, `detail`, `subType`, `userId`, `create_at`) VALUES
(26, 0, 'รายรับ', 'asdsa', 'test', 6, '2018-04-21 05:27:29'),
(27, 499, 'รายรับ', '345', 'test', 6, '2018-04-21 05:27:44'),
(28, 499, 'รายรับ', '345', 'test', 6, '2018-04-21 05:31:04'),
(33, 65555, 'รายรับ', '4', 'test', 6, '2018-04-21 05:33:27'),
(35, 333, '333', '333', '333', 8, '2018-04-01 17:00:00'),
(36, 333, '33', '33', '333', 8, '2018-05-17 17:00:00'),
(39, 500, 'รายรับ', '7', 'ทั่วไป', 9, '2018-04-21 11:41:17'),
(40, 777, 'รายรับ', '7', 'ทั่วไป', 9, '2018-04-21 13:26:27'),
(41, 3, 'รายรับ', '3213', 'ทั่วไป', 9, '2018-04-21 13:28:59'),
(42, 500, 'รายจ่าย', '33', 'ทั่วไป', 6, '2018-04-21 14:50:40'),
(43, 600, 'รายจ่าย', 'กหดหกด', 'หกกดหห', 6, '2018-04-11 17:00:00'),
(44, 500, 'รายรับ', 'ฟหกกฟหก', 'ฟหกฟหก', 6, '2018-03-25 17:00:00'),
(46, 4, 'รายรับ', '12', 'เงินเดือน', 6, '2018-04-22 05:03:28'),
(47, 500, 'รายจ่าย', 'ss', 'เงินเดือน', 6, '2018-04-22 07:40:05'),
(49, 200, 'รายจ่าย', '89', 'ทั่วไป', 9, '2018-04-22 08:35:39'),
(50, 8, 'รายจ่าย', '78', 'อาหาร', 9, '2018-04-22 08:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `usbType`
--

CREATE TABLE `usbType` (
  `idSub` int(11) NOT NULL,
  `Typeof` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nameSub` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `timeCreate_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usbType`
--

INSERT INTO `usbType` (`idSub`, `Typeof`, `nameSub`, `userId`, `timeCreate_at`) VALUES
(10, 'รายจ่าย', 'อาหาร', 9, '2018-04-20 12:45:44'),
(11, 'เงินออม', 'ออมเงิน', 9, '2018-04-20 12:46:34'),
(14, 'รายจ่าย', 'เงินเดือน', 6, '2018-04-21 03:17:30'),
(15, 'รายรับ', 'เงินเดือน', 6, '2018-04-21 15:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `userIncome`
--

CREATE TABLE `userIncome` (
  `userId` int(11) NOT NULL,
  `fristName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `displayName` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `roles` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userIncome`
--

INSERT INTO `userIncome` (`userId`, `fristName`, `username`, `password`, `lastName`, `displayName`, `roles`, `create_at`) VALUES
(1, 'ss', 'ss', '123', 'ss', 'ss ss', 'user', '2018-04-18 09:45:00'),
(6, 'Sukum', 'kungo1234', '123', 'Nilpheth', 'Sukum Nilpheth', 'user', '2018-04-19 13:49:46'),
(8, 'Flock', 'kungo000', '123', 'Nilphet', 'Flock Nilphet', 'user', '2018-04-18 10:44:02'),
(9, 'Sukhum', 'kungo111', '0859932942', 'Nilphet', 'Sukhum Nilphet', 'user', '2018-04-20 11:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `wanna`
--

CREATE TABLE `wanna` (
  `idWana` int(11) NOT NULL,
  `nameWanna` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `priceWanna` double NOT NULL,
  `userId` int(11) NOT NULL,
  `timeCreate_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wanna`
--

INSERT INTO `wanna` (`idWana`, `nameWanna`, `priceWanna`, `userId`, `timeCreate_at`) VALUES
(1, 'iphone', 30000, 0, '2018-04-21 06:41:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incomeDB`
--
ALTER TABLE `incomeDB`
  ADD PRIMARY KEY (`incomeId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `usbType`
--
ALTER TABLE `usbType`
  ADD PRIMARY KEY (`idSub`);

--
-- Indexes for table `userIncome`
--
ALTER TABLE `userIncome`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `wanna`
--
ALTER TABLE `wanna`
  ADD PRIMARY KEY (`idWana`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incomeDB`
--
ALTER TABLE `incomeDB`
  MODIFY `incomeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `usbType`
--
ALTER TABLE `usbType`
  MODIFY `idSub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userIncome`
--
ALTER TABLE `userIncome`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wanna`
--
ALTER TABLE `wanna`
  MODIFY `idWana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `incomeDB`
--
ALTER TABLE `incomeDB`
  ADD CONSTRAINT `userId` FOREIGN KEY (`userId`) REFERENCES `userIncome` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
