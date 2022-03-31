-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 10:08 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webinar_collection`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_webinar`
--

CREATE TABLE `acc_webinar` (
  `USER_ID` int(255) NOT NULL,
  `WEBINAR_ID` int(255) NOT NULL,
  `PESAN` text DEFAULT NULL,
  `STATUS_PROPOSAL` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `KATEGORI_ID` int(3) NOT NULL,
  `NAMA_KATEGORI` varchar(50) DEFAULT NULL,
  `ICON_KATEGORI` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(255) NOT NULL,
  `MENTOR_ID` int(255) DEFAULT NULL,
  `NAMA` varchar(200) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(256) DEFAULT NULL,
  `ROLE` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `MENTOR_ID` int(255) NOT NULL,
  `USER_ID` int(255) DEFAULT NULL,
  `BIODATA` text DEFAULT NULL,
  `PENDIDIKAN` varchar(1024) DEFAULT NULL,
  `PEKERJAAN` varchar(1024) DEFAULT NULL,
  `FOTO_PROFILE` varchar(1024) DEFAULT NULL,
  `BUKTI_IJAZAH` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `webinar`
--

CREATE TABLE `webinar` (
  `WEBINAR_ID` int(255) NOT NULL,
  `USER_ID` int(255) DEFAULT NULL,
  `JUDUL_WEBINAR` varchar(200) DEFAULT NULL,
  `DESKRIPSI_WEBINAR` text DEFAULT NULL,
  `WAKTU_WEBINAR` datetime DEFAULT NULL,
  `MAKS_KAPASITAS` int(3) DEFAULT NULL,
  `LINK_MEETING` text DEFAULT NULL,
  `COVER_WEBINAR` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `webinar_kategori`
--

CREATE TABLE `webinar_kategori` (
  `KATEGORI_ID` int(3) NOT NULL,
  `WEBINAR_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `webinar_regist`
--

CREATE TABLE `webinar_regist` (
  `USER_ID` int(255) NOT NULL,
  `WEBINAR_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_webinar`
--
ALTER TABLE `acc_webinar`
  ADD PRIMARY KEY (`USER_ID`,`WEBINAR_ID`),
  ADD KEY `FK_ACC_WEBINAR2` (`WEBINAR_ID`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`KATEGORI_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `FK_MEMILIKI2` (`MENTOR_ID`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`MENTOR_ID`),
  ADD KEY `FK_MEMILIKI` (`USER_ID`);

--
-- Indexes for table `webinar`
--
ALTER TABLE `webinar`
  ADD PRIMARY KEY (`WEBINAR_ID`),
  ADD KEY `FK_CREATE_WEBINAR` (`USER_ID`);

--
-- Indexes for table `webinar_kategori`
--
ALTER TABLE `webinar_kategori`
  ADD PRIMARY KEY (`KATEGORI_ID`,`WEBINAR_ID`),
  ADD KEY `FK_WEBINAR_KATEGORI2` (`WEBINAR_ID`);

--
-- Indexes for table `webinar_regist`
--
ALTER TABLE `webinar_regist`
  ADD PRIMARY KEY (`USER_ID`,`WEBINAR_ID`),
  ADD KEY `FK_WEBINAR_REGIST2` (`WEBINAR_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acc_webinar`
--
ALTER TABLE `acc_webinar`
  ADD CONSTRAINT `FK_ACC_WEBINAR` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`),
  ADD CONSTRAINT `FK_ACC_WEBINAR2` FOREIGN KEY (`WEBINAR_ID`) REFERENCES `webinar` (`WEBINAR_ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_MEMILIKI2` FOREIGN KEY (`MENTOR_ID`) REFERENCES `user_detail` (`MENTOR_ID`);

--
-- Constraints for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Constraints for table `webinar`
--
ALTER TABLE `webinar`
  ADD CONSTRAINT `FK_CREATE_WEBINAR` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Constraints for table `webinar_kategori`
--
ALTER TABLE `webinar_kategori`
  ADD CONSTRAINT `FK_WEBINAR_KATEGORI` FOREIGN KEY (`KATEGORI_ID`) REFERENCES `kategori` (`KATEGORI_ID`),
  ADD CONSTRAINT `FK_WEBINAR_KATEGORI2` FOREIGN KEY (`WEBINAR_ID`) REFERENCES `webinar` (`WEBINAR_ID`);

--
-- Constraints for table `webinar_regist`
--
ALTER TABLE `webinar_regist`
  ADD CONSTRAINT `FK_WEBINAR_REGIST` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`),
  ADD CONSTRAINT `FK_WEBINAR_REGIST2` FOREIGN KEY (`WEBINAR_ID`) REFERENCES `webinar` (`WEBINAR_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
