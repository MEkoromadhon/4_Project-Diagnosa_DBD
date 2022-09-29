-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 05:59 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `finalproject_s5`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftarakun`
--

CREATE TABLE IF NOT EXISTS `daftarakun` (
  `id` int(50) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `TTL` varchar(50) NOT NULL,
  `JenisKelamin` varchar(20) NOT NULL,
  `Alamat` varchar(150) NOT NULL,
  `No_HP` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftarakun`
--

INSERT INTO `daftarakun` (`id`, `Nama`, `TTL`, `JenisKelamin`, `Alamat`, `No_HP`, `Email`, `Password`) VALUES
(1, 'Muhammad Eko Romadhon', 'Sleman, 27 Januari 1997', 'Laki - Laki', 'Perum Regency, Jl. Onik 1 No.12, Cikampek Utara, Kotabaru, Karawang Barat', '089646721255', 'eko@gmail.com', 'eko'),
(3, 'Dilla Elma', 'Karawang, 15 Agustus 2001', 'Perempuan', 'Perum Mahkota 3, Jl. Metali 20 Metald, Kotabaru, Karawang Barat', '08614271211', 'dila@gmail.com', 'dila'),
(5, 'Amid Rakhman', 'Kebumen, 17 Maret 1996', 'Laki - Laki', 'Perum Nas, jl. mandari 04, Kotabaru, Karawang Timur', '087732515322', 'amid@gmail.com', 'amid'),
(6, 'Satriyo Aji Laksono', 'Rembang, 21 September 1997', 'Laki - Laki', 'Perum Mahkota, Jl. Metali 21 Cikarang Barat', '0877301277611', 'satriyo@gmail.com', 'satriyo');

-- --------------------------------------------------------

--
-- Table structure for table `db_gejala_pertanyaan`
--

CREATE TABLE IF NOT EXISTS `db_gejala_pertanyaan` (
  `id` int(11) NOT NULL,
  `code` varchar(3) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_gejala_pertanyaan`
--

INSERT INTO `db_gejala_pertanyaan` (`id`, `code`, `name`) VALUES
(1, 'G1', 'Apakah anda merasakan Demam Tinggi mendadak (38 - 40 derajat) selama 2 - 7 hari ? '),
(2, 'G2', 'Apakah anda merasakan Demam yang meningkat secara bertahap setiap hari (39 - 40 derajat) dan akan lebih tinggi pada malam hari ?'),
(3, 'G3', 'Apakah anda merasa Badan terasa Lemah dan Lesu ?'),
(4, 'G4', 'Apakah kulit anda timbul bintik - bintik merah atau ruam kulit disekitar tubuh 3 - 4 hari (setelah demam) ? '),
(5, 'G5', 'Apakah anda merasakan Nyeri pada otot, persendian dan tulang ? '),
(6, 'G6', 'Apakah anda merasakan kulit anda selalu Berkeringat ?'),
(7, 'G7', 'Apakah anda merasakan nyeri di belakang mata ? '),
(8, 'G8', 'Apakah anda merasakan sakit kepala yang hebat ? '),
(9, 'G9', 'Apakah anda merasakan sakit perut, mual, muntah (tidak sering) ? '),
(10, 'G10', 'Apakah anda merasakan diare ? '),
(11, 'G11', 'Apakah anda merasakan Batuk kering ? '),
(12, 'G12', 'Apakah anda merasakan Tidak enak badan dan sakit kepala ? '),
(13, 'G13', 'Apakah anda merasakan kelelahan gelisah (kelelahan berlebih) ? '),
(14, 'G14', 'Apakah anda merasakan penurunan berat badan akibat Kehilangan nafsu makan ? '),
(15, 'G15', 'Apakah anda merasakan kulit dingin atau lembab (syok) ? '),
(16, 'G16', 'Apakah anda mengalami pendarahan dari gusi atau hidung ? '),
(17, 'G17', 'Apakah anda mengalami keluar darah pada saat muntah, pada urin dan feses (BAB Berdarah) ? '),
(18, 'G18', 'Apakah anda merasakan seperti Linglung, merasa tidak tahu sedang berada di mana dan apa yang sedang terjadi pada anda ? '),
(19, 'G19', 'Apakah kulit anda terlihat seperti memar - memar (berdarah pada kulit) ? '),
(20, 'G20', 'Apakah anda merasakan sulit bernafas atau cepat bernafas ? ');

-- --------------------------------------------------------

--
-- Table structure for table `db_jenis_penyakit`
--

CREATE TABLE IF NOT EXISTS `db_jenis_penyakit` (
  `id` int(11) NOT NULL,
  `code` varchar(30) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `notes` text
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_jenis_penyakit`
--

INSERT INTO `db_jenis_penyakit` (`id`, `code`, `name`, `notes`) VALUES
(1, 'Penyakit 1', 'Demam Berdarah Dengue (DBD)', 'Demam berdarah dengue (DBD) adalah penyakit yang disebabkan oleh infeksi dari virus Dengue melalui gigitan nyamuk aedes aegypty'),
(2, 'Penyakit 2', 'Typus', 'Tifus (tipes) atau demam tifoid adalah penyakit yang terjadi karena infeksi bakteri Salmonella typhi yang menyebar melalui makanan dan minuman yang telah terontaminasi.');

-- --------------------------------------------------------

--
-- Table structure for table `db_perhitungan`
--

CREATE TABLE IF NOT EXISTS `db_perhitungan` (
  `id` int(11) NOT NULL,
  `id_jenis_penyakit` int(11) DEFAULT NULL,
  `id_gejala_pertanyaan` int(11) DEFAULT NULL,
  `bobot` float DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_perhitungan`
--

INSERT INTO `db_perhitungan` (`id`, `id_jenis_penyakit`, `id_gejala_pertanyaan`, `bobot`) VALUES
(1, 1, 1, 0.4),
(2, 2, 2, 0.3),
(3, 1, 3, 0.4),
(4, 1, 4, 0.4),
(5, 1, 5, 0.4),
(6, 2, 6, 0.3),
(7, 1, 7, 0.4),
(8, 1, 8, 0.4),
(9, 1, 9, 0.4),
(10, 2, 10, 0.3),
(11, 2, 11, 0.3),
(12, 2, 12, 0.3),
(13, 1, 13, 0.6),
(14, 2, 14, 0.3),
(15, 1, 15, 0.6),
(16, 1, 16, 0.6),
(17, 1, 17, 0.6),
(18, 2, 18, 0.3),
(19, 1, 19, 0.6),
(20, 1, 20, 0.6);

-- --------------------------------------------------------

--
-- Table structure for table `hasildiagnosa`
--

CREATE TABLE IF NOT EXISTS `hasildiagnosa` (
  `id` int(225) NOT NULL,
  `Nama` varchar(150) NOT NULL,
  `Diagnosa_Penyakit` varchar(150) NOT NULL,
  `Hasil` varchar(150) NOT NULL,
  `Waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasildiagnosa`
--

INSERT INTO `hasildiagnosa` (`id`, `Nama`, `Diagnosa_Penyakit`, `Hasil`, `Waktu`) VALUES
(3, 'Amid Rakhman', 'Demam Berdarah Dengue (DBD)', '60%', '2020-11-25 05:37:53'),
(26, 'Amid Rakhman', 'Demam Berdarah Dengue (DBD)', '31.82%', '2020-11-25 05:39:46'),
(28, 'Amid Rakhman', 'Demam Berdarah Dengue (DBD)', '84%', '2020-11-25 06:41:00'),
(29, 'Amid Rakhman', 'Demam Berdarah Dengue (DBD)', '91.1%', '2020-11-25 06:41:28'),
(30, 'Muhammad Eko Romadhon', 'Demam Berdarah Dengue (DBD)', '84%', '2020-11-26 07:07:12'),
(34, 'Muhammad Eko Romadhon', 'Demam Berdarah Dengue (DBD)', '98.94%', '2020-11-26 11:52:21'),
(35, 'Ahmad U', 'Typus', '38.44%', '2020-11-27 02:39:47'),
(36, 'Ahmad U', 'Demam Berdarah Dengue (DBD)', '64%', '2020-11-27 02:42:02'),
(37, 'Muhammad Eko Romadhon', 'Demam Berdarah Dengue (DBD)', '31.82%', '2021-01-31 10:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `nama`) VALUES
(1, 'eko@gmail.com', 'eko', 'Muhammad Eko Romadhon'),
(3, 'dila@gmail.com', 'dila', 'Dilla Elma'),
(5, 'amid@gmail.com', 'amid', 'Amid Rakhman'),
(6, 'satriyo@gmail.com', 'satriyo', 'Satriyo Aji Laksono');

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE IF NOT EXISTS `login_admin` (
  `id` int(11) NOT NULL,
  `Nama` varchar(150) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id`, `Nama`, `Email`, `Password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftarakun`
--
ALTER TABLE `daftarakun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_gejala_pertanyaan`
--
ALTER TABLE `db_gejala_pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_jenis_penyakit`
--
ALTER TABLE `db_jenis_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_perhitungan`
--
ALTER TABLE `db_perhitungan`
  ADD KEY `id` (`id`);

--
-- Indexes for table `hasildiagnosa`
--
ALTER TABLE `hasildiagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftarakun`
--
ALTER TABLE `daftarakun`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `db_gejala_pertanyaan`
--
ALTER TABLE `db_gejala_pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `db_jenis_penyakit`
--
ALTER TABLE `db_jenis_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `db_perhitungan`
--
ALTER TABLE `db_perhitungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `hasildiagnosa`
--
ALTER TABLE `hasildiagnosa`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
