-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 11:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(1, 'administrator', 'admin', 'admin@mail.com', '123456', '1'),
(5, 'ardha', 'ardha12', 'ardha@mail.com', '$2y$10$mLe4b5NtjN.hxLtuTzjm0OpsqJ0uKR9ulPj9T2M9.pAFFKR/mVnqS', '1'),
(6, 'superadmin', 'superadmin', 'superadmin@mail.com', '$2y$10$SlzrixG60tI0v7Y7RGAMXeQYTzuz28XyJyTiC0ljpkyV0/EfEr2Ea', '1'),
(7, 'gudang', 'pergudangan', 'gudang@mail.com', '$2y$10$QXjkX5tbp./83RNxMlTDL.l0/QB7gvqwV7VL4kW9CyuY8S3JfULAS', '2'),
(8, 'admin', 'adminkampus', 'admin@mail.com', '$2y$10$1u3X/ET151iRS8uscK9C1uutwukWGmtTfP.ubG7z7SKKqzHethZSu', '3');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `barcode` varchar(15) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jumlah`, `harga`, `barcode`, `tanggal`) VALUES
(10, 'SSD', '4', '350000', '195424', '2023-01-30 16:55:49'),
(11, 'Keyboard', '7', '75000', '595966', '2023-01-30 16:51:17'),
(12, 'Monitor', '6', '1250000', '329631', '2023-01-30 16:51:32'),
(14, 'RAM', '2', '400000', '513785', '2023-02-02 08:04:03'),
(15, 'Keybkkoard', '2', '225000', '505399', '2023-02-27 06:52:15'),
(20, 'gula', '5', '100000', NULL, '2023-02-28 07:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama`, `prodi`, `jk`, `telepon`, `alamat`, `email`, `foto`) VALUES
(1, 'Wayan', 'Sistem Informasi', 'laki-laki', '0834767352', '', 'wayan@mail.com', 'foto.png'),
(6, 'Made', 'Manajemen', 'Laki-laki', '0345638476', '', 'made@mail.com', '63d7d7f376e05.png '),
(7, 'Ni Luh', 'Manajemen', 'Perempuan', '4095864079', '', 'niluh@mail.com', '63d7d80a052df.png '),
(8, 'Robert', 'Sistem Informasi', 'Laki-laki', '0468498', '<p>Jln. Pandjaitan no. 45 <strong>Jakarta Timur, <em>Prov/&nbsp;</em>Jakarta</strong></p>', 'robert@mail.com', '63da11cf5b74f.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
