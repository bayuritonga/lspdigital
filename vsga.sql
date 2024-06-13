-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 04:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vsga`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `konten`, `tanggal`, `gambar`) VALUES
(1, 'Hari Ujian Tes VSGA', 'Teks ini merupakan contoh dari halaman dinamis yang bisa diakses oleh admin melalui backend. Teks ini akan muncul pada halaman artikel.php secara otomatis', '2024-06-13', 'uploads/Logo-UIN-SU-Medan-PNG-1.png'),
(2, 'Hari Ujian Tes VSGA', 'Teks ini merupakan contoh dari halaman dinamis yang bisa diakses oleh admin melalui backend. Teks ini akan muncul pada halaman artikel.php secara otomatis', '2024-06-13', 'uploads/belajar-CI.jpg'),
(3, 'Hari Ujian Tes VSGA', 'Teks ini merupakan contoh dari halaman dinamis yang bisa diakses oleh admin melalui backend. Teks ini akan muncul pada halaman artikel.php secara otomatis', '2024-06-13', 'uploads/WhatsApp_Image_2024-03-21_at_11.58.29_9f4f009d-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_lengkap`, `email`, `no_hp`) VALUES
(1, 'admin', '$2y$10$85cOXVOIwSP7mpwxBRaiB.haZm7GwcaukATfLPKJ8/zzUjbIN9cX.', 'Administrator', 'admin@gmail.com', '08123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
