-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 06:46 PM
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
  `ACC_WEBINAR_ID` int(11) NOT NULL,
  `USER_ID` int(255) DEFAULT NULL,
  `WEBINAR_ID` int(255) NOT NULL,
  `PESAN` text DEFAULT NULL,
  `STATUS_PROPOSAL` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc_webinar`
--

INSERT INTO `acc_webinar` (`ACC_WEBINAR_ID`, `USER_ID`, `WEBINAR_ID`, `PESAN`, `STATUS_PROPOSAL`) VALUES
(2, 5, 1, NULL, 1),
(3, 5, 2, NULL, 0),
(4, NULL, 4, NULL, 0),
(5, NULL, 5, NULL, 0),
(6, NULL, 6, NULL, 0),
(7, NULL, 7, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `KATEGORI_ID` int(11) NOT NULL,
  `NAMA_KATEGORI` varchar(50) DEFAULT NULL,
  `ICON_KATEGORI` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`KATEGORI_ID`, `NAMA_KATEGORI`, `ICON_KATEGORI`) VALUES
(1, 'Sosial', ''),
(2, 'Budaya', ''),
(3, 'Politik', ''),
(4, 'Bisnis', ''),
(5, 'Ekonomi', ''),
(6, 'Finansial', ''),
(7, 'Literasi', ''),
(8, 'Bahasa', ''),
(9, 'Teknologi', ''),
(10, 'Sciences', ''),
(11, 'Kesehatan', ''),
(12, 'Seni', ''),
(13, 'Olahraga', '');

-- --------------------------------------------------------

--
-- Table structure for table `like_webinar`
--

CREATE TABLE `like_webinar` (
  `ID_LIKE` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `WEBINAR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_webinar`
--

INSERT INTO `like_webinar` (`ID_LIKE`, `USER_ID`, `WEBINAR_ID`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `NAMA` varchar(200) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(256) DEFAULT NULL,
  `ROLE` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `NAMA`, `EMAIL`, `PASSWORD`, `ROLE`) VALUES
(1, 'Syekh Akhmad Ramadani', 'ram@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(2, 'Akhmad Ramadani', 'ramadani@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 1),
(3, 'rama', 'ramadani@gmail.com', 'ec4bd19731eb536befbbbe0c77daa06b', 1),
(4, 'rama', 'ramadani@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 1),
(5, 'Akhmad Ramadani', 'a@g.com', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
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
  `WEBINAR_ID` int(11) NOT NULL,
  `USER_ID` int(255) DEFAULT NULL,
  `JUDUL_WEBINAR` varchar(200) DEFAULT NULL,
  `DESKRIPSI_WEBINAR` text DEFAULT NULL,
  `WAKTU_WEBINAR` datetime DEFAULT NULL,
  `MAKS_KAPASITAS` int(3) DEFAULT NULL,
  `LINK_MEETING` text DEFAULT NULL,
  `COVER_WEBINAR` varchar(200) DEFAULT NULL,
  `LOOKED` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `webinar`
--

INSERT INTO `webinar` (`WEBINAR_ID`, `USER_ID`, `JUDUL_WEBINAR`, `DESKRIPSI_WEBINAR`, `WAKTU_WEBINAR`, `MAKS_KAPASITAS`, `LINK_MEETING`, `COVER_WEBINAR`, `LOOKED`) VALUES
(1, 5, 'The Courage To Be Disliked', 'Bedah buku \"The Courage To Be Disliked\" bersama penulisnya.', '2022-04-30 19:35:43', 100, 'https://zoom.us', 'media\\webinar_cover\\gunung2.png', 1),
(2, 5, 'Photoshop Dasar 1', 'Belajar Photoshop Dasar dengan materi sebagai berikut: \r\n1. \r\n2. \r\n3. \r\n4. \r\n5. ', '2022-04-29 15:30:54', 80, 'https://meet.google.com', 'media\\webinar_cover\\tctbd.jpg', 2),
(4, 5, 'Test From App', 'aaafifkasjokjfaklsj', '2222-01-01 12:04:00', 242, 'https://facebook.com', 'media/webinar_cover/download.jpg', 0),
(5, 5, 'test', 'asf', '2022-04-30 23:40:00', 413, 'https://facebook.com', 'media/webinar_cover/haki.jpg', 0),
(6, 5, 'fsfsafgwqewe', 'safwqfsafa', '2022-04-23 23:43:00', 241, 'https://facebook.com', 'media/webinar_cover/haki.jpg', 0),
(7, 5, 'test ', 'asfg', '2022-04-30 23:45:00', 421, 'https://facebook.com', 'media/webinar_cover/53ee920ad930934ffacbe0990fa10828.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `webinar_kategori`
--

CREATE TABLE `webinar_kategori` (
  `KATEGORI_ID` int(3) NOT NULL,
  `WEBINAR_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `webinar_kategori`
--

INSERT INTO `webinar_kategori` (`KATEGORI_ID`, `WEBINAR_ID`) VALUES
(7, 1),
(7, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(7, 7)
;


-- --------------------------------------------------------

--
-- Table structure for table `webinar_regist`
--

CREATE TABLE `webinar_regist` (
  `USER_ID` int(255) NOT NULL,
  `WEBINAR_ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `webinar_regist`
--

INSERT INTO `webinar_regist` (`USER_ID`, `WEBINAR_ID`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_webinar`
--
ALTER TABLE `acc_webinar`
  ADD PRIMARY KEY (`ACC_WEBINAR_ID`),
  ADD KEY `FK_ACC_WEBINAR2` (`WEBINAR_ID`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`KATEGORI_ID`);

--
-- Indexes for table `like_webinar`
--
ALTER TABLE `like_webinar`
  ADD PRIMARY KEY (`ID_LIKE`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_webinar`
--
ALTER TABLE `acc_webinar`
  MODIFY `ACC_WEBINAR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `KATEGORI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `like_webinar`
--
ALTER TABLE `like_webinar`
  MODIFY `ID_LIKE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `webinar`
--
ALTER TABLE `webinar`
  MODIFY `WEBINAR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
