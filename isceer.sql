-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 09:15 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isceer`
--

-- --------------------------------------------------------

--
-- Table structure for table `abstrak`
--

CREATE TABLE `abstrak` (
  `abs_id` varchar(20) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `penulis` text NOT NULL,
  `afiliasi` text NOT NULL,
  `id_scope` int(11) NOT NULL,
  `keyword` text NOT NULL,
  `abstrak` text NOT NULL,
  `presenter` varchar(50) NOT NULL,
  `type` set('poster presentation','','','') NOT NULL,
  `id_user` int(11) NOT NULL,
  `submit_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` enum('accepted','decline','awaiting decision','') NOT NULL,
  `uniqid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abstrak`
--

INSERT INTO `abstrak` (`abs_id`, `judul`, `penulis`, `afiliasi`, `id_scope`, `keyword`, `abstrak`, `presenter`, `type`, `id_user`, `submit_date`, `update_date`, `status`, `uniqid`) VALUES
('ABS-1', 'Tree Algorithm Model for Dimension Chart', 'Mahardika Mamuju, Sulaeman', 'Universitas Garut Jaya Raya, Indonesia', 1, 'Tanam, Panen, Sistem Agriculture', 'Clothing trends that always change over time, and the tight competition in the clothing business make producers have to rack their brains so that the business they run has additional points for consumers, ranging from changes in design, use of materials, colour selection to the promotion section. The purpose of this research is to create a custom clothing feature on the website that is useful for consumers who have a special desire for the clothes they want to buy. The research method used in this research is descriptive analysis with a quantitative approach. The results show that the addition of the Custom Clothing feature can provide better clothes ordering experience on a digital platform that can be accessed through each computer. The main concept of this feature is a choice of sizes and pieces of clothing that can be chosen without thinking about stock availability. In the end, this feature is here to help consumers who have a special desire for the clothes they want to buy, so that consumers who have special desires can have clothes from that brand without thinking about stock availabilityClothing trends that always change over time, and the tight competition in the clothing business make producers have to rack their brains so that the business they run has additional points for consumers, ranging from changes in design, use of materials, colour selection to the promotion section. The purpose of this research is to create a custom clothing feature on the website that is useful for consumers who have a special desire for the clothes they want to buy. The research method used in this research is descriptive analysis with a quantitative approach. The results show that the addition of the Custom Clothing feature can provide better clothes ordering experience on a digital platform that can be accessed through each computer. The main concept of this feature is a choice of sizes and pieces of clothing that can be chosen without thinking about stock availability. In the end, this feature is here to help consumers who have a special desire for the clothes they want to buy, so that consumers who have special desires can have clothes from that brand without thinking about stock availability', 'Mahardika Mamuju', 'poster presentation', 16, '2022-09-09 23:12:11', '2022-09-15 22:40:11', 'accepted', '6joumtypn1'),
('ABS-2', 'SICANTIK : SIstem Tanam dan Petik', 'Aritonang, Asep Surasep, Akum Surakum', 'Universitas bina Bangsa', 2, 'Cantik, Sistem Petik', 'Clothing trends that always change over time, and the tight competition in the clothing business make producers have to rack their brains so that the business they run has additional points for consumers, ranging from changes in design, use of materials, colour selection to the promotion section. The purpose of this research is to create a custom clothing feature on the website that is useful for consumers who have a special desire for the clothes they want to buy. The research method used in this research is descriptive analysis with a quantitative approach. The results show that the addition of the Custom Clothing feature can provide better clothes ordering experience on a digital platform that can be accessed through each computer. The main concept of this feature is a choice of sizes and pieces of clothing that can be chosen without thinking about stock availability. In the end, this feature is here to help consumers who have a special desire for the clothes they want to buy, so that consumers who have special desires can have clothes from that brand without thinking ', 'Akum Surakum', 'poster presentation', 16, '2022-09-09 23:31:10', '2022-09-13 20:13:12', 'accepted', 'zcvgpwqk98'),
('ABS-3', 'Sistem Tanam panen', 'Abi Rafdhi Rajasa', 'Universitas Komputer Indonesia', 1, 'android, akta tanah', 'Clothing trends that always change over time, and the tight competition in the clothing business make producers have to rack their brains so that the business they run has additional points for consumers, ranging from changes in design, use of materials, colour selection to the promotion section. The purpose of this research is to create a custom clothing feature on the website that is useful for consumers who have a special desire for the clothes they want to buy. The research method used in this research is descriptive analysis with a quantitative approach. The results show that the addition of the Custom Clothing feature can provide better clothes ordering experience on a digital platform that can be accessed through each computer. ', 'Abi Rafdi', 'poster presentation', 16, '2022-09-09 23:34:14', '2022-09-15 22:40:19', 'accepted', 'wxph8ud76y'),
('ABS-4', 'SISTEM INFORMASI PENGAJUAN AKTA TANAH BERBASIS WEB PADA KECAMATAN CIBIRU', 'Agis Abhi Rafdhi, Euis Neni Hayati, Herry Saputra, Rizky Jumansyah', 'Universitas Komputer Indonesia', 1, 'Akta Tanah, Sistem Informasi Geografis, Aplikasi Pemerintahan, E-government', 'Clothing trends that always change over time, and the tight competition in the clothing business make producers have to rack their brains so that the business they run has additional points for consumers, ranging from changes in design, use of materials, colour selection to the promotion section. The purpose of this research is to create a custom clothing feature on the website that is useful for consumers who have a special desire for the clothes they want to buy. The research method used in this research is descriptive analysis with a quantitative approach. The results show that the addition of the Custom Clothing feature can provide better clothes ordering experience on a digital platform that can be accessed through each computer. The main concept of this feature is a choice of sizes and pieces of clothing that can be chosen without thinking about stock availability. In the end, this feature is here to help consumers who have a special desire for the clothes they want to buy, so that consumers who have special desires can have clothes from that brand without thinking about stock availabilityClothing trends that always change over time, and the tight competition in the clothing business make producers have to rack their brains so that the business they run has additional points for consumers, ranging from changes in design, use of materials, colour selection to the promotion section. The purpose of this research is to create a custom clothing feature on the website that is useful for consumers who have a special desire for the clothes they want to buy', 'Abi Rafdi', 'poster presentation', 17, '2022-09-13 22:55:09', '2022-09-13 22:56:32', 'accepted', '3iqretp27l'),
('ABS-5', 'Sistem Bangun Rumah', 'Arunika Marahajaya', 'Universitas Widyatama', 2, 'rumah, home, house', 'this study aims to which is literally The purpose of this study is to analyze the use of Instagram as a communication marketing medium in utilizing the new internet media as an alternative to approach potential consumers. This study used qualitative research methods. The results of this study are the use of Instagram social media in expanding and improving the marketing communication function. Because the presence of the internet in marketing communications can help business people or marketers in carrying out marketing communications, because marketers must have a strategy to be able to take advantage of Instagram social media as a marketing medium in order to achieve their goals and target market. This research was conducted to determine the benefits of Instagram as a communication marketing medium in approaching', 'Arunika Maharjaya', 'poster presentation', 17, '2022-09-26 20:54:59', '2022-09-26 21:06:39', 'accepted', 'fizc415loq');

-- --------------------------------------------------------

--
-- Table structure for table `full_paper`
--

CREATE TABLE `full_paper` (
  `paper_id` int(20) NOT NULL,
  `abs_id` varchar(20) DEFAULT NULL,
  `file_fp` text DEFAULT NULL,
  `notes` text NOT NULL,
  `decision` enum('accept','decline','waiting_decision','revision required','not submitted','revision submitted') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `full_paper`
--

INSERT INTO `full_paper` (`paper_id`, `abs_id`, `file_fp`, `notes`, `decision`, `created_at`, `last_update`) VALUES
(14, 'ABS-1', 'FP_ABS-1_1663299678_bf0c95291ac04201bd8b.docx', '', 'accept', '2022-09-09 23:12:11', '2022-09-26 01:51:08'),
(15, 'ABS-2', 'FP_ABS-2_1664176022_2312d69596001574b9ed.doc', '', 'accept', '2022-09-09 23:31:10', '2022-09-26 02:42:47'),
(16, 'ABS-3', 'FP_ABS-3_1664176465_d8ac25678dbf94d0b4c6.docx', '', 'revision submitted', '2022-09-09 23:34:14', '2022-09-26 02:21:34'),
(17, 'ABS-4', 'FP_1663229477_10890caebfc61265161a.docx', '', 'revision submitted', '2022-09-13 22:55:09', '2022-09-22 01:54:44'),
(18, 'ABS-5', 'FP_ABS-5_1664244436_5dd00241fc4c9e308bf1.docx', '', 'revision submitted', '2022-09-26 20:54:59', '2022-09-26 21:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `conf_date` date DEFAULT NULL,
  `about` text DEFAULT NULL,
  `scope` text DEFAULT NULL,
  `important_dates` text DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `banner` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id`, `conf_date`, `about`, `scope`, `important_dates`, `logo`, `banner`) VALUES
(1, '2022-08-11', NULL, NULL, NULL, '1665463844_9f1634d7f00350a97748.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `payment_proof` text DEFAULT NULL,
  `transfer_date` date DEFAULT NULL,
  `transfer_time` time DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `account_name` varchar(50) DEFAULT NULL,
  `account_number` text DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `abs_id` varchar(20) DEFAULT NULL,
  `payment_status` enum('uploaded','not uploaded','','') NOT NULL,
  `created_payment` datetime DEFAULT NULL,
  `update_payment` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id_payment`, `payment_proof`, `transfer_date`, `transfer_time`, `bank_name`, `account_name`, `account_number`, `amount`, `abs_id`, `payment_status`, `created_payment`, `update_payment`) VALUES
(16, 'PAYMENT_1664349662_9a46caa3a59d1941465a.jpg', '2022-09-28', '14:11:00', 'Bank Rakyat Indonesia', 'Indra Wijaya', '4588900912', 1750000, 'ABS-1', 'uploaded', '2022-09-09 23:12:11', '2022-09-28 02:21:02'),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ABS-2', 'not uploaded', '2022-09-09 23:31:10', '2022-09-09 23:31:10'),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ABS-3', 'not uploaded', '2022-09-09 23:34:14', '2022-09-09 23:34:14'),
(19, 'PAYMENT_1664348134_f9fcc53baf9de0ebd096.jpg', '2022-09-28', '13:47:00', 'Bank Negara Indonesia', 'Agis Abhi Rafdhi', '0822990012', 2500000, 'ABS-4', 'uploaded', '2022-09-13 22:55:09', '2022-09-28 01:55:34'),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ABS-5', 'not uploaded', '2022-09-26 20:54:59', '2022-09-26 20:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `id_poster` int(11) NOT NULL,
  `poster` text DEFAULT NULL,
  `status_poster` enum('submitted','not submitted','accepted','decline') DEFAULT NULL,
  `submit_poster` datetime DEFAULT NULL,
  `update_poster` datetime DEFAULT NULL,
  `abs_id` varchar(20) NOT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poster`
--

INSERT INTO `poster` (`id_poster`, `poster`, `status_poster`, `submit_poster`, `update_poster`, `abs_id`, `notes`) VALUES
(6, 'POSTER_ABS-1_1666400725_2a4eb21d4727f18b4f6e.jpg', 'accepted', '2022-09-09 23:12:11', '2022-11-22 21:45:48', 'ABS-1', NULL),
(7, 'POSTER_ABS-2_1666401950_d381f380cb8c93b0c1ba.png', 'accepted', '2022-09-09 23:31:10', '2022-11-22 21:47:10', 'ABS-2', NULL),
(8, 'POSTER_ABS-3_1666402178_d826aa503b1553a57c81.jpg', 'accepted', '2022-09-09 23:34:14', '2022-11-22 21:47:37', 'ABS-3', NULL),
(9, NULL, 'not submitted', '2022-09-13 22:55:09', '2022-09-13 22:55:09', 'ABS-4', NULL),
(10, NULL, 'not submitted', '2022-09-26 20:54:59', '2022-09-26 20:54:59', 'ABS-5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `abs_id` varchar(20) DEFAULT NULL,
  `file_review` text DEFAULT NULL,
  `notes` varchar(50) DEFAULT NULL,
  `id_reviewer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `abs_id`, `file_review`, `notes`, `id_reviewer`) VALUES
(3, 'ABS-1', 'Review_ABS-1_1663733905_3d3410cb3d4aa3eccab3.doc', 'perbaiki judul dan seterusnya', 1),
(5, 'ABS-2', 'Review_ABS-2_1664176787_3927d6180b829f6384b6.docx', 'kerjakan sesuai arahan review pada file di atas', 1),
(6, 'ABS-4', 'Review_ABS-4_1663818420_cfe83396a42bf3ea8ba9.docx', 'change the title with acronim            ', 2),
(7, 'ABS-3', 'Review_ABS-3_1664176820_071706f5e6fe7f241536.docx', 'kerjakan sesuai arahan review pada file di atas', 1),
(13, 'ABS-5', 'Review_ABS-5_1664244673_ffa34869f2916dfa542f.docx', 'Perbaiki sesuai komentar review yang ada pada file', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `id` int(11) NOT NULL,
  `nama_reviewer` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`id`, `nama_reviewer`, `id_user`) VALUES
(1, 'reviewer 1', 15),
(2, 'reviewer 2', 18),
(3, 'revdefault', 20);

-- --------------------------------------------------------

--
-- Table structure for table `revised_paper`
--

CREATE TABLE `revised_paper` (
  `revised_id` int(20) NOT NULL,
  `abs_id` varchar(20) DEFAULT NULL,
  `file_rp` text DEFAULT NULL,
  `notes_revised` text DEFAULT NULL,
  `decision_revised` enum('accepted','decline','waiting decision','not submitted') DEFAULT NULL,
  `created_revised` datetime DEFAULT NULL,
  `last_revised` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `revised_paper`
--

INSERT INTO `revised_paper` (`revised_id`, `abs_id`, `file_rp`, `notes_revised`, `decision_revised`, `created_revised`, `last_revised`) VALUES
(13, 'ABS-1', 'RP_ABS-1_1663736884_0dc6a3779bda57551f97.doc', 'Selamat Naskah Anda diterima pada ISCEER 2022', 'accepted', '2022-09-09 23:12:11', '2022-09-27 02:50:24'),
(14, 'ABS-2', 'RP_ABS-2_1664176871_372d9008955b83d5b4f6.doc', NULL, 'accepted', '2022-09-09 23:31:10', '2022-09-26 02:42:47'),
(15, 'ABS-3', 'RP_ABS-3_1664176894_417b38d083d428c54e9d.docx', 'Cukup oke', 'accepted', '2022-09-09 23:34:14', '2022-09-27 23:30:04'),
(16, 'ABS-4', 'RP_ABS-4_1663829684_bbc2fd17b33d6b7631ec.docx', NULL, 'waiting decision', '2022-09-13 22:55:09', '2022-09-22 01:54:44'),
(17, 'ABS-5', 'RP_ABS-5_1664244726_e419cbe5c99010acbd55.docx', NULL, 'accepted', '2022-09-26 20:54:59', '2022-09-26 21:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `awal_abstrak` datetime DEFAULT NULL,
  `akhir_abstrak` datetime DEFAULT NULL,
  `awal_full` datetime DEFAULT NULL,
  `akhir_full` datetime DEFAULT NULL,
  `awal_payment` datetime DEFAULT NULL,
  `akhir_payment` datetime DEFAULT NULL,
  `awal_review1` datetime DEFAULT NULL,
  `akhir_review1` datetime DEFAULT NULL,
  `awal_review2` datetime DEFAULT NULL,
  `akhir_review2` datetime DEFAULT NULL,
  `awal_revised` datetime DEFAULT NULL,
  `akhir_revised` datetime DEFAULT NULL,
  `awal_poster` datetime DEFAULT NULL,
  `akhir_poster` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `awal_abstrak`, `akhir_abstrak`, `awal_full`, `akhir_full`, `awal_payment`, `akhir_payment`, `awal_review1`, `akhir_review1`, `awal_review2`, `akhir_review2`, `awal_revised`, `akhir_revised`, `awal_poster`, `akhir_poster`) VALUES
(1, '2022-09-29 12:04:00', '2022-10-04 13:44:00', '2022-09-29 14:36:00', '2022-09-30 12:14:00', '2022-09-29 14:44:12', '2022-09-30 13:59:00', '2022-09-29 14:10:00', '2022-09-30 14:04:00', '2022-09-29 14:20:00', '2022-09-30 14:21:00', '2022-09-29 14:10:00', '2022-09-30 14:13:00', '2022-10-22 08:04:00', '2022-10-23 08:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `scope`
--

CREATE TABLE `scope` (
  `id_scope` int(11) NOT NULL,
  `scope` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scope`
--

INSERT INTO `scope` (`id_scope`, `scope`) VALUES
(1, 'Informatics Engineering and Information Systems'),
(2, 'Industrial Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id` int(11) NOT NULL,
  `abs_id` varchar(20) NOT NULL,
  `status_kehadiran` enum('hadir','tidak_hadir','','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id`, `abs_id`, `status_kehadiran`) VALUES
(1, 'ABS-1', 'hadir'),
(2, 'ABS-2', NULL),
(3, 'ABS-3', NULL),
(4, 'ABS-4', NULL),
(5, 'ABS-5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `speaker`
--

CREATE TABLE `speaker` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `afiliasi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `institusi` enum('unikom','non_unikom','','') NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` enum('admin','reviewer','user','') NOT NULL,
  `status` enum('aktif','belum_aktif','','') NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `institusi`, `email`, `password`, `level`, `status`, `phone`) VALUES
(13, 'ADMIN', 'unikom', 'isceer@email.unikom.ac.id', 'lantai16', 'admin', 'aktif', '081908084933'),
(15, 'reviewer 1', 'unikom', 'reviewer1@isceer.unikom', 'euisnh14', 'reviewer', 'aktif', '081292826633'),
(16, 'Chepi', 'unikom', 'chepinur@gmail.com', 'chepinur12', 'user', 'aktif', '085722335791'),
(17, 'Agis Abhi Rafdhi', 'non_unikom', 'agis@email.unikom.ac.id', 'agisabhi28', 'user', 'aktif', '081234567891'),
(18, 'reviewer 2', 'unikom', 'reviewer2@isceer.unikom', 'isceer2022', 'reviewer', 'aktif', '081345890022'),
(19, 'reviewer3', 'unikom', 'reviewer3', 'isceer2022', 'reviewer', 'aktif', '081908789920'),
(20, 'revdefault', 'unikom', 'revdefault', 'revdefault', 'reviewer', 'aktif', '08188882299');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abstrak`
--
ALTER TABLE `abstrak`
  ADD PRIMARY KEY (`abs_id`),
  ADD KEY `id_scope` (`id_scope`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `full_paper`
--
ALTER TABLE `full_paper`
  ADD PRIMARY KEY (`paper_id`) USING BTREE,
  ADD KEY `abs_id` (`abs_id`) USING BTREE;

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `abs_id` (`abs_id`);

--
-- Indexes for table `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id_poster`),
  ADD KEY `absfk` (`abs_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_reviewer` (`id_reviewer`),
  ADD KEY `abs_id` (`abs_id`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `revised_paper`
--
ALTER TABLE `revised_paper`
  ADD PRIMARY KEY (`revised_id`),
  ADD KEY `abs_id` (`abs_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scope`
--
ALTER TABLE `scope`
  ADD PRIMARY KEY (`id_scope`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keyabs` (`abs_id`);

--
-- Indexes for table `speaker`
--
ALTER TABLE `speaker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `full_paper`
--
ALTER TABLE `full_paper`
  MODIFY `paper_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `poster`
--
ALTER TABLE `poster`
  MODIFY `id_poster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `revised_paper`
--
ALTER TABLE `revised_paper`
  MODIFY `revised_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scope`
--
ALTER TABLE `scope`
  MODIFY `id_scope` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `speaker`
--
ALTER TABLE `speaker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abstrak`
--
ALTER TABLE `abstrak`
  ADD CONSTRAINT `abstrak_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `fkscp` FOREIGN KEY (`id_scope`) REFERENCES `scope` (`id_scope`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkuser` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `full_paper`
--
ALTER TABLE `full_paper`
  ADD CONSTRAINT `fkppr` FOREIGN KEY (`abs_id`) REFERENCES `abstrak` (`abs_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fkpa` FOREIGN KEY (`abs_id`) REFERENCES `abstrak` (`abs_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poster`
--
ALTER TABLE `poster`
  ADD CONSTRAINT `absfk` FOREIGN KEY (`abs_id`) REFERENCES `abstrak` (`abs_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fkpul` FOREIGN KEY (`abs_id`) REFERENCES `abstrak` (`abs_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkrv` FOREIGN KEY (`id_reviewer`) REFERENCES `reviewer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD CONSTRAINT `fku` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `revised_paper`
--
ALTER TABLE `revised_paper`
  ADD CONSTRAINT `fkrev` FOREIGN KEY (`abs_id`) REFERENCES `abstrak` (`abs_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `abske` FOREIGN KEY (`abs_id`) REFERENCES `abstrak` (`abs_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
