-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2020 at 04:49 PM
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
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id_mhs` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id_mhs`, `nama`, `alamat`, `no_telp`, `asal_sekolah`) VALUES
(1, 'Aris Afriyanto', 'Greenthink', '0895360759393', 'Smks Bina Islam Mandiri Kersana'),
(2, 'Alfiyah Khaerunnisa', 'Cirebon', '089674958495', 'Ma N 02 Cirebon'),
(3, 'Diki Saputra', 'Kubang Pari', '085673847384', 'Smks Bina Islam Mandri Kersana'),
(4, 'Dzakira Aftani', 'Greenthink', '089664739283', 'Tpq Imam Yahya'),
(5, 'Siti Khumaeroh', 'Brebes', '089564738475', 'Smk N 01 Brebes'),
(8, 'Dewi Julaikho', 'Ketanggungan', '089573829374', 'Smk N 01  Kersana'),
(9, 'Susilo', 'Greenthink', '089647394738', 'Smk Muhammadiyah Bulakamba'),
(10, 'Iskandar', 'Prapag', '089563857392', 'Sma N 01 Bulakamba'),
(11, 'Kania Widya', 'Pakijangan', '089564738462', 'Sma N 01 Bulakamba'),
(12, 'Endang Nur Asih', 'Greenthink', '089573849372', 'Smk Larendra Bulakamba'),
(13, 'Aenun Fitriyah', 'Ketanggungan', '089563748293', 'Smks Bina Islam Mandiri Kersana'),
(14, 'Ariska Nur Hayati', 'Pejagan', '089574839492', 'Smks Bina Islam Mandiri Kersana'),
(15, 'Satrio Nugroho', 'Ketanggungan', '089654738494', 'Smks Bina Islam Mandiri Kersana'),
(16, 'Iren Nizah Pradevi', 'Sutamaja', '089564739284', 'Smks Bina Islam Mandiri Kersana'),
(17, 'Hana Fakhreza', 'Kemurang', '089568338492', 'Smks Bina Islam Mandiri Kersana');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`) VALUES
(1, 'aris afriyanto', '$2y$10$W2Py8YYBtVf2q2XJFzyqJ.dpRPRbwez4KxwtKfKcKWB5wqkL3WN9e'),
(2, 'alfiyah khaerunnisa', '$2y$10$wXmRAYz2lWoAmXel3ZIWiu1dW3MwhtCz3RU/zgG03zpv4PLnjEYky');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
