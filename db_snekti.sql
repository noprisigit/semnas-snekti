-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 02:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_snekti`
--

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `nama_pemateri` varchar(100) NOT NULL,
  `judul_materi` varchar(100) NOT NULL,
  `nama_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemakalah`
--

CREATE TABLE `pemakalah` (
  `kode_pemakalah` char(10) NOT NULL,
  `judul_tim` varchar(50) NOT NULL,
  `nama_penulis` varchar(50) NOT NULL,
  `sub_tema` enum('RenewableEnergy','SmartEnergy','CleanEnergy','KontroldanTi','SmartBuilding','InfrastrukturEnergi','MaterialKontruksi','RekayasaInfrastruktur','PembangkitMikro','KonversiEnergi','PowerPlant','Iot','ArtificialInteligent','DataScience','SistemInformasi') NOT NULL,
  `institusi` varchar(50) NOT NULL,
  `status` enum('Mahasiswa','Dosen','Umum') NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama_file` varchar(50) NOT NULL DEFAULT 'default.pdf'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemakalah`
--

INSERT INTO `pemakalah` (`kode_pemakalah`, `judul_tim`, `nama_penulis`, `sub_tema`, `institusi`, `status`, `email`, `no_telp`, `alamat`, `nama_file`) VALUES
('PSNEKTI001', 'cerita cintaku', 'renaldy', 'PowerPlant', 'STTPLN JAKARTA', 'Mahasiswa', 'renaldybagas13@gmail.com', '424324234234', 'permata', '3.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `kode` char(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nomor_induk` varchar(25) NOT NULL,
  `asal_instansi` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `status_bayar` enum('0','1') NOT NULL COMMENT '0="Belum Bayar", 1="Sudah Bayar"',
  `status_kehadiran` enum('0','1','','') NOT NULL COMMENT '0="Tidak Hadir", 1="Hadir"'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `level` enum('1','2') NOT NULL COMMENT '1=Super Admin, 2=Admin',
  `is_active` enum('1','0') NOT NULL COMMENT '1=true,0=false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `f_name`, `l_name`, `level`, `is_active`) VALUES
(2, 'admin', '$2y$10$P6gRbtG8yXG9B03MhiJZrOLR2drlIAsCzUty5eqA0UFtYNIjhksBS', 'Super', 'Admin', '1', '1'),
(8, 'admin1', '$2y$10$MzaG7x/fGgTG6jQeKEdAOeJNjYmUh/QrraPFGqyoZJOZgk6mzMY6O', 'Anthony', 'Sinisuka', '2', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
