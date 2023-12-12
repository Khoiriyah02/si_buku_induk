-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 07:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukuinduk`
--

CREATE TABLE `bukuinduk` (
  `no_induk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `asal` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `jml_judul` int(11) NOT NULL,
  `jml_eks` int(11) NOT NULL,
  `no_klas` int(11) NOT NULL,
  `kry_umum` int(2) NOT NULL,
  `filsafat` int(2) NOT NULL,
  `agama` int(2) NOT NULL,
  `ilmu_sosial` int(2) NOT NULL,
  `bahasa` int(2) NOT NULL,
  `ilmu_murni` int(2) NOT NULL,
  `ilmu_terapan` int(2) NOT NULL,
  `seni_olahraga` int(2) NOT NULL,
  `kesusastraan` int(11) NOT NULL,
  `sejarah_geografi` int(11) NOT NULL,
  `fiksi` varchar(25) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bukuinduk`
--

INSERT INTO `bukuinduk` (`no_induk`, `tanggal`, `asal`, `judul`, `pengarang`, `jml_judul`, `jml_eks`, `no_klas`, `kry_umum`, `filsafat`, `agama`, `ilmu_sosial`, `bahasa`, `ilmu_murni`, `ilmu_terapan`, `seni_olahraga`, `kesusastraan`, `sejarah_geografi`, `fiksi`, `ket`) VALUES
(55719, '2022-11-07', 'Hibah Gramedia Th. 2022', 'Panduan Lengkap Pajak', 'Yustinus Prastowo', 1, 1, 3362, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, '', ''),
(55720, '2022-11-07', 'Hibah Gramedia Th. 2022', 'Hidup Itu Harus Pintar Ngegas dan Ngerem', 'Emha Ainun Nadjib', 1, 1, 2975, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `judul` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`judul`, `gambar`, `pengarang`, `penerbit`, `deskripsi`) VALUES
('Panduan Lengkap Pajak', 'proyektor.png', 'Yustinus Prastowo', 'Andi ', 'Tentang Pajak'),
('Hidup Itu Harus Pintar Ngegas dan Ngerem', 'proyektor.png', 'Emha Ainun Nadjib', 'Andi', 'Motivasi');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `username` varchar(50) NOT NULL,
  `password` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`username`, `password`) VALUES
('Siti Khoiriyah', 'khoir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukuinduk`
--
ALTER TABLE `bukuinduk`
  ADD PRIMARY KEY (`no_induk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
