-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 03:29 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `informatika`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`user_id`, `nama`, `email`, `password`) VALUES
(1, 'Xenon Derta Synfoni', 'rfebiaris@gmail.com', '0cc175b9c0f1b6a831c399e269772661'),
(2, 'maulana yusuf', 'aminah3193@gmail.com', 'ccb3909d9a39895d9598db318f8eb882');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` varchar(64) NOT NULL,
  `sampul` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `judul` varchar(50) NOT NULL,
  `konten` text NOT NULL,
  `tgl` date NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `sampul`, `judul`, `konten`, `tgl`, `id_kategori`) VALUES
('5c4d2d80d8168', '5c4d2d80d8168.png', 'Xenon Derta Synfoni\'s Quotes', '<p>Demikian pula, tidak adakah orang yang mencintai atau mengejar atau ingin mengalami penderitaan, bukan semata-mata karena penderitaan itu sendiri, tetapi karena sesekali terjadi keadaan di mana susah-payah dan penderitaan dapat memberikan kepadanya kesenangan yang besar. Sebagai contoh sederhana, siapakah di antara kita yang pernah melakukan pekerjaan fisik yang berat, selain untuk memperoleh manfaat daripadanya? Tetapi siapakah yang berhak untuk mencari kesalahan pada diri orang yang memilih untuk menikmati kesenangan yang tidak menimbulkan akibat-akibat yang mengganggu, atau orang yang menghindari penderitaan yang tidak menghasilkan kesenangan?</p>\r\n', '2019-01-27', 1),
('5c4d2e08642c5', '5c4d2e08642c5.jpg', 'Belum Ada Judul', '<p>Demikian pula, tidak adakah orang yang mencintai atau mengejar atau ingin mengalami penderitaan, bukan semata-mata karena penderitaan itu sendiri, tetapi karena sesekali terjadi keadaan di mana susah-payah dan penderitaan dapat memberikan kepadanya kesenangan yang besar. Sebagai contoh sederhana, siapakah di antara kita yang pernah melakukan pekerjaan fisik yang berat, selain untuk memperoleh manfaat daripadanya? Tetapi siapakah yang berhak untuk mencari kesalahan pada diri orang yang memilih untuk menikmati kesenangan yang tidak menimbulkan akibat-akibat yang mengganggu, atau orang yang menghindari penderitaan yang tidak menghasilkan kesenangan?</p>\r\n', '2019-01-27', 2),
('5c4dad60bf848', '5c4dad60bf848.png', 'Percobaan', '<p>Demikian pula, tidak adakah orang yang mencintai atau mengejar atau ingin mengalami penderitaan, bukan semata-mata karena penderitaan itu sendiri, tetapi karena sesekali terjadi keadaan di mana susah-payah dan penderitaan dapat memberikan kepadanya kesenangan yang besar. Sebagai contoh sederhana, siapakah di antara kita yang pernah melakukan pekerjaan fisik yang berat, selain untuk memperoleh manfaat daripadanya? Tetapi siapakah yang berhak untuk mencari kesalahan pada diri orang yang memilih untuk menikmati kesenangan yang tidak menimbulkan akibat-akibat yang mengganggu, atau orang yang menghindari penderitaan yang tidak menghasilkan kesenangan?</p>\r\n', '2019-01-27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `nama`, `nidn`, `password`) VALUES
(1, 'MOHAMMAD RIDWAN', '0417047201', '330b8d964c0b81954959fae0e1b31b56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Akademik'),
(2, 'Non Akademik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_materi`
--

CREATE TABLE `tbl_materi` (
  `id_materi` varchar(64) NOT NULL,
  `nama_materi` varchar(150) NOT NULL,
  `semester` varchar(2) NOT NULL,
  `file` varchar(255) NOT NULL DEFAULT 'default.txt',
  `id_dosen` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_materi`
--

INSERT INTO `tbl_materi` (`id_materi`, `nama_materi`, `semester`, `file`, `id_dosen`) VALUES
('5c46887b92d1a', 'kecerdasa buatan', '5', 'kalkulus_semester_5_TI_UMMI.docx', 1),
('5c4d38e8952bf', 'Sistem Informasi', '11', 'Sistem_Informasi_semester_11_TI_UMMI.pdf', 1),
('5c4d3ca4223fd', 'Aljabar', '12', 'Aljabar_semester_12_TI_UMMI.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `user_id`, `created`) VALUES
(1, 'b95dd8f4592f5024d801a40ebd715b', 1, '2019-01-12'),
(2, 'd126c72d12a4ba35bc248d8dc21f5f', 1, '2019-01-12'),
(3, 'fd5a3f22eac3aebbfd8274d475c3a1', 1, '2019-01-12'),
(4, '6d730873de0028b35bf6069551fb18', 1, '2019-01-12'),
(5, 'fbc7843acd866f53f17a92b81b4f1d', 1, '2019-01-12'),
(6, 'e8dd6463fc60247ef056a211346d46', 1, '2019-01-12'),
(7, '94d579e5db71077cc09745634f432f', 1, '2019-01-12'),
(8, '95c7811602b3391885289e732aa434', 1, '2019-01-27'),
(9, 'fd93751649ac3ea8f8772ba49c8c1f', 1, '2019-01-27'),
(10, '6a3dfbcfc1e4e023c345366eedbf28', 1, '2019-01-27'),
(11, 'eea37d722891dde3dc2969310c9035', 1, '2019-01-27'),
(12, 'aff1d574272e517bd5b9f5deff8d4d', 1, '2019-01-27'),
(13, '38891c7cda2d15e4d464ef32ef3ee7', 1, '2019-01-27'),
(14, 'c5911084820ed5c9b2ddd38da4df8b', 1, '2019-01-27'),
(15, '138825ed8f4199d67f9ca400b795b6', 1, '2019-01-27'),
(16, '9a61b86ecef7f4f8978d90273acfe0', 1, '2019-01-27'),
(17, 'fee055b039d2e9ce3396eeecb5d34a', 1, '2019-01-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_materi`
--
ALTER TABLE `tbl_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
