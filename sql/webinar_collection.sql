-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 10:31 AM
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
(5, 5, 4, '', 0),
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
(6, 4, 6, 'Judul', 1),
(8, 4, 8, 'Oke, baik., Diterima', 1),
(10, 4, 10, 'Judul', 1),
(12, 4, 12, 'Judul', 1),
(15, 4, 15, '', 1),
(16, 4, 16, '', 1),
(17, 4, 17, '', 1),
(18, 4, 18, '', 1);

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
(13, 'Olahraga', '');

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
(1, 'Syekh Akhmad', 'ram@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(4, 'Annisa', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 3),
(5, 'Akhmad Ramadhani', 'a@g.com', '202cb962ac59075b964b07152d234b70', 2),
(7, 'BoBoiBoy', 'bbb@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(8, 'Rama', 'rama1@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(10, 'Annisa Fitri Yuliandra', 'annisa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(11, 'Kageyama Tobio', 'tobio@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(12, 'Sakura', 'skr@gmail.com', '698d51a19d8a121ce581499d7b701668', 1);

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
(1, 'test422341', 'Pondok Pesantren', 'Ustadz', 'media/profile/s2.png', 'media/ijazah/dadd20c5a66ebadf086c1ce2ba186a71.png'),
(5, 'Bekerja sebagai seorang buruh harian pada perusahaan les untuk anak sd. Keahlian saya di bidang matematika.', 'Pendidikan Teknologi UM', 'Buruh Les', 'media/profile/download.jpg', 'media/ijazah/download.png'),
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
(2, 5, 'Photoshop Dasar 3', 'Belajar Photoshop Dasar dengan materi sebagai berikut: \r\n1. \r\n2. \r\n3. \r\n4. \r\n5. ', '2022-04-29 15:30:00', 80, 'https://meet.google.com', 'media/webinar_cover/1green.png', 2),
(6, 5, 'Analogi Sketsa Badan', 'Apa gaya gambar favoritmu? Realistis, kartun, atau manga? Apa pun gaya favoritmu, sebagai desainer kamu mesti banget memiliki keterampilan menggambar anatomi tubuh manusia loh. Ini adalah dasarnya. Walaupun terdengar sepele, tapi bermanfaat banget untuk memperkuat fondasi keterampilan menggambarmu. Mungkin awalnya akan terasa sulit. Toh semuanya tidak ada yang instan. Dibutuhkan latihan secara rutin agar dapat menghasilkan gambar tubuh yang proporsional. ', '2022-04-23 23:43:00', 241, 'https://facebook.com', 'media/webinar_cover/2green.png', 0),
(8, 5, 'Teknik Penjinakan Ular Weling', 'Kali ini kita akan mempelajari teknik untuk menjinakkan ular weling. Ular Weling adalah ular yang sangat sering kita temui di sawah. Ular ini memiliki warna hijau. Sehingga, ular ini sangat sulit untuk dilihat dan dibedakan dengan lingkungan sawah.', '2022-04-30 13:00:00', 254, 'https://facebook.com', 'media/webinar_cover/RED2.png', 0),
(10, 5, 'Teknik Pembiakan Ikan Cupang', 'Cara budidaya ikan cupang gampang-gampang susah. Belakangan, ikan cupang menjadi primadona bagi para pecinta ikan. Ikan mungil ini dikenal akan keindahannya sebagai hewan hias. Tak heran, saat ini banyak sekali orang yang ingin memeliharanya. Bahkan, para pemula pun juga ada begitu banyak.', '2022-04-29 20:26:00', 1000, 'https://twitter.com', 'media/webinar_cover/RED3.png', 0),
(12, 5, 'Cara Memulai Bisnis Untuk Pemula', 'Kesuksesan adalah hal yang dicari setiap orang. Salah satu cara yang banyak dilakukan orang untuk meraihnya adalah dengan memulai bisnis. Pemikiran untuk menjadi pengusaha sudah menjadi tren di semua kalangan masyarakat, terutama kalangan muda. Oleh karena itu, saat ini banyak orang yang sudah sukses menjadi pengusaha di usia muda. Hal ini memang tidak mengherankan, karena banyak orang yang mulai merasa lelah dan terbatas dengan hanya menjadi karyawan, sehingga pemikiran untuk membuat bisnis menjadi pilihannya', '2022-04-20 22:57:00', 2421, 'https://asasfs', 'media/webinar_cover/ORANGE1.png', 0),
(15, 5, 'Cara Parenting Yang Baik', 'Membesarkan dan mendidik anak bukanlah perkara mudah. Kekeliruan orang tua dalam menerapkan pola asuh dapat memengaruhi perilaku anak di kemudian hari. Oleh karena itu, penting bagi orang tua untuk mempelajari prinsip parenting yang benar agar bisa membentuk karakter positif pada anak.', '2022-04-23 12:08:00', 100, 'https://facebook.com', 'media/webinar_cover/3green.png', 0),
(16, 5, 'Belajar Data Analyst', 'Saat ini, profesi data analyst semakin populer dan banyak dibutuhkan oleh perusahaan. Tugas seorang data analyst adalah mengumpulkan, mengelola, dan menganalisis data dari berbagai sumber. Hasil analisis tersebut disampaikan kepada pihak terkait untuk dipakai sebagai bahan pertimbangan sebelum mengambil keputusan. Meskipun demikian, belajar data analyst tidak mudah dan cepat.', '2022-06-09 11:04:00', 100, 'https://', 'media/webinar_cover/BLUE1.png', 0),
(17, 1, 'Mencegah COVID-19', 'Lindungi diri Anda dan orang lain di sekitar Anda dengan mengetahui fakta-fakta terkait virus ini dan mengambil langkah pencegahan yang sesuai. Ikuti saran yang diberikan oleh otoritas kesehatan setempat.', '2022-06-14 17:13:00', 200, 'https://facebook.com', 'media/webinar_cover/RED1.png', 0),
(18, 5, 'Be a Data Scientist, Now!!!', 'Want to be a data scientist? Still do not know what is first to do? Join us now to knowing about how to be a data scientist.', '2022-06-17 20:45:00', 200, 'https://meet.google.com/fsakfja', 'media/webinar_cover/BLUE2.png', 0);

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
(4, 12),
(9, 16),
(9, 18),
(11, 17),
(12, 2),
(12, 6);

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
(1, 6),
(1, 16),
(5, 17),
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
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `webinar`
--
ALTER TABLE `webinar`
  MODIFY `WEBINAR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
