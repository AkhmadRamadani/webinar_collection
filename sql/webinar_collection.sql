-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 01:06 PM
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
-- Table structure for table `acc_mentor`
--

CREATE TABLE `acc_mentor` (
  `ACC_MENTOR_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `ADMIN_ID` int(11) NOT NULL,
  `MESSAGE` text NOT NULL,
  `STATUS_PROPOSAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc_mentor`
--

INSERT INTO `acc_mentor` (`ACC_MENTOR_ID`, `USER_ID`, `ADMIN_ID`, `MESSAGE`, `STATUS_PROPOSAL`) VALUES
(4, 1, 4, 'Data kurang lengkap pada biodata. Testt tolong dong sfsafafsaf sas', 1),
(5, 6, 4, '', 1),
(6, 7, 0, '', 0),
(8, 8, 4, '', 1);

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
(3, 4, 2, 'test', 1),
(6, 4, 6, 'Judul', 0),
(8, 4, 8, 'Oke, baik., Diterima', 1),
(10, 4, 10, 'Judul', 2),
(12, 4, 12, 'Judul', 2),
(15, NULL, 15, NULL, 0),
(16, NULL, 16, NULL, 0),
(17, NULL, 17, NULL, 0),
(18, NULL, 18, NULL, 0);

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
(6, 'Finansial', ''),
(7, 'Literasi', ''),
(8, 'Bahasa', ''),
(9, 'Teknologi', ''),
(10, 'Sciences', ''),
(11, 'Kesehatan', ''),
(12, 'Seni', ''),
(13, 'Olahraga', ''),
(16, 'Apa', NULL);

--
-- Triggers `kategori`
--
DELIMITER $$
CREATE TRIGGER `DELETE_WEBINAR_KATEGORI_AFTER_DELETED_KATEGORI` AFTER DELETE ON `kategori` FOR EACH ROW DELETE FROM webinar_kategori 
WHERE webinar_kategori.KATEGORI_ID = OLD.KATEGORI_ID
$$
DELIMITER ;

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
(1, 'Syekh Akhmad Ramadani', 'ram@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(4, 'rama', 'ramadani@gmail.com', '202cb962ac59075b964b07152d234b70', 3),
(5, 'Akhmad Ramadani', 'a@g.com', '202cb962ac59075b964b07152d234b70', 2),
(6, 'Yaya Ying Gopal', 'yyingg@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(7, 'Boboi Boy', 'bby@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(8, 'Akhmad Ramadani', 'rama1@gmail.com', '202cb962ac59075b964b07152d234b70', 2);

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

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`USER_ID`, `BIODATA`, `PENDIDIKAN`, `PEKERJAAN`, `FOTO_PROFILE`, `BUKTI_IJAZAH`) VALUES
(1, 'test422341', 'test241421', 'test2145421', 'media/profile/a3560a61337bf6469c30e6da34a6f03d.jpg', 'media/ijazah/dadd20c5a66ebadf086c1ce2ba186a71.png'),
(6, 'Bekerja sebagai seorang buruh harian pada perusahaan les untuk anak sd. Keahlian saya di bidang matematika.', 'SMK', 'Buruh Les', 'media/profile/208f6f9952b7e16bacf9969bfcf236a1.png', 'media/ijazah/a367a9a714dbdc89b33c1dfdf76a300e.png'),
(7, 'safgsfg', 'gsdag', 'gsadgs', 'media/profile/fbb170565360ca7e4518589e21568382.png', 'media/ijazah/45775c086200a4b093b15f520609f5c7.png'),
(7, 'safgsfg', 'gsdag', 'gsadgs', 'media/profile/033c7a01bce9b8101312f60f43b233ab.png', 'media/ijazah/9c069f1a6d3f6cec22b643f87a72c593.png'),
(8, 'Programmer di sebuah perusahaan multiverse company. Bekerja sebagai programmer selama 5 tahun.', 'SMK', 'Programmer', 'media/profile/54432b4345781fd74cda7ae413d16dcc.jpg', 'media/ijazah/1d3ec9890aeb2e44d8f1f249ee517828.jpg');

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
(2, 5, 'Photoshop Dasar 3', 'Belajar Photoshop Dasar dengan materi sebagai berikut: \r\n1. \r\n2. \r\n3. \r\n4. \r\n5. ', '2022-04-29 15:30:00', 80, 'https://meet.google.com', 'media/webinar_cover/3291884e8fa3342895025a2e8c8cbae6.png', 2),
(6, 5, 'jhjh', 'safwqfsafa', '2022-04-23 23:43:00', 241, 'https://facebook.com', 'media/webinar_cover/0f7bd580ccc4631e01233525d6e14f63.png', 0),
(8, 5, 'Teknik Penjinakan Ular Weling', 'Kali ini kita akan mempelajari teknik untuk menjinakkan ular weling. Ular Weling adalah ular yang sangat sering kita temui di sawah. Ular ini memiliki warna hijau. Sehingga, ular ini sangat sulit untuk dilihat dan dibedakan dengan lingkungan sawah.', '2022-04-30 13:00:00', 254, 'https://facebook.com', 'media/webinar_cover/a2793bde6deb883db3fe597cf5a56941.jpg', 0),
(10, 5, 'hy', 'h', '2022-04-29 20:26:00', 0, 'https://twitter.com', 'media/webinar_cover/7241454acd51162b0bc094fb557f79cb.png', 0),
(12, 5, 'test1322142', 'safdsfaasfsaf', '2022-04-20 22:57:00', 2421, 'https://asasfs', 'media/webinar_cover/64c2715cff82ef6fb94485248e1d5be6.jpg', 0),
(15, 5, 'Test ', 'test', '2022-04-23 12:08:00', 100, 'https://facebook.com', 'media/webinar_cover/e7207125abe95cfce402401f689eada2.png', 0),
(16, 5, 'Test from phone', 'Yeyeyeue', '2022-05-09 11:04:00', 100, 'https://', 'media/webinar_cover/f2d4be27346e216536cd94e0b6eed97b.jpeg', 0),
(17, 1, 'TEST', 'sag', '2022-05-14 17:13:00', 2, 'https://facebook.com', 'media/webinar_cover/88ab6590dec7c3206a6c1d0c3d1869e1.jpg', 0),
(18, 5, 'Be a Data Scientist, Now!!!', 'Want to be a data scientist? Still do not know what is first to do? Join us now to knowing about how to be a data scientist.', '2022-05-17 20:45:00', 200, 'https://meet.google.com/fsakfja', 'media/webinar_cover/f8baa1e2a3543e3fba86fecad4489de4.jpeg', 0);

--
-- Triggers `webinar`
--
DELIMITER $$
CREATE TRIGGER `DELETE_ACC_WEBINAR` AFTER DELETE ON `webinar` FOR EACH ROW DELETE FROM acc_webinar WHERE acc_webinar.WEBINAR_ID = OLD.WEBINAR_ID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `DELETE_LIKE_WEBINAR` AFTER DELETE ON `webinar` FOR EACH ROW DELETE FROM like_webinar WHERE 
like_webinar.WEBINAR_ID = OLD.WEBINAR_ID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `DELETE_WEBINAR_KATEGORI` AFTER DELETE ON `webinar` FOR EACH ROW DELETE FROM webinar_kategori WHERE webinar_kategori.WEBINAR_ID = OLD.WEBINAR_ID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `DELETE_WEBINAR_REGIST` AFTER DELETE ON `webinar` FOR EACH ROW DELETE FROM webinar_regist 
WHERE webinar_regist.WEBINAR_ID = OLD.WEBINAR_ID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UPDATE_CATEGORIES` AFTER UPDATE ON `webinar` FOR EACH ROW DELETE FROM webinar_kategori WHERE webinar_kategori.WEBINAR_ID = NEW.WEBINAR_ID
$$
DELIMITER ;

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
(2, 15),
(3, 10),
(3, 15),
(6, 10),
(6, 16),
(7, 16),
(7, 17),
(8, 10),
(8, 16),
(8, 17),
(9, 18),
(10, 2),
(10, 18),
(11, 2),
(11, 8);

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
(1, 2),
(8, 2),
(8, 8),
(8, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_mentor`
--
ALTER TABLE `acc_mentor`
  ADD PRIMARY KEY (`ACC_MENTOR_ID`);

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
-- AUTO_INCREMENT for table `acc_mentor`
--
ALTER TABLE `acc_mentor`
  MODIFY `ACC_MENTOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `acc_webinar`
--
ALTER TABLE `acc_webinar`
  MODIFY `ACC_WEBINAR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `KATEGORI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `like_webinar`
--
ALTER TABLE `like_webinar`
  MODIFY `ID_LIKE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `webinar`
--
ALTER TABLE `webinar`
  MODIFY `WEBINAR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
