-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2022 at 01:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sumkul_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`, `keterangan`) VALUES
(1, 'administrator', 'Kelola semua fitur aplikasi'),
(2, 'resepsionis', 'Kelola data tamu'),
(3, 'tamu', 'Dapat menikmati semua fitur yang ada di aplikasi'),
(4, 'semiadmin', 'Hampir mirip kaya admin tapi tidak sepenuhnya mirip admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fasilitas_umum`
--

CREATE TABLE `tb_fasilitas_umum` (
  `id_fasilitas` int(11) NOT NULL,
  `fasilitas` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `foto_fasilitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fasilitas_umum`
--

INSERT INTO `tb_fasilitas_umum` (`id_fasilitas`, `fasilitas`, `keterangan`, `foto_fasilitas`) VALUES
(2, 'Gratis Wifi', '24 Jam, Tanpa Batasan Internet, Setiap Kamar', 'wifi-img.jpg'),
(3, 'Kolam Renang', '30 M2, 2 Kolam Dewasa 1 Kolam Anak-anak\r\n', 'kolam-img.jpg'),
(4, 'Sepeda', 'Tanpa biaya tambahan, Bebas pakai selama inap', '1645598602_712726c9dc4ab1500d22.jpg'),
(7, 'Kamar Mandi', 'Shower, Jolang, Air hangat', '1645711707_4bd1b52a67ef93838fa5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kamar`
--

CREATE TABLE `tb_kamar` (
  `id_kamar` int(11) NOT NULL,
  `tipe_kamar` varchar(100) NOT NULL,
  `fasilitas` text NOT NULL,
  `stok_kamar` varchar(100) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `foto_kamar` varchar(255) NOT NULL,
  `kode_kamar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kamar`
--

INSERT INTO `tb_kamar` (`id_kamar`, `tipe_kamar`, `fasilitas`, `stok_kamar`, `harga`, `foto_kamar`, `kode_kamar`) VALUES
(1, 'Standard Room', 'Satu kamar ukuran 25 m2, Kasur single bed + 2 Bantal dan 1 Guling, Televisi, AC, telepon, Toilet', '7', '450000', '', '01085357'),
(2, 'Superior Room', 'Satu kamar ukuran 30 m2, Kasur double bed + 2 Bantal dan 2 Guling, Televisi, AC, Telepon, Toilet', '5', '600000', '', '97305828'),
(3, 'Deluxe Room', 'Satu kamar ukuran 40 m2, Kasur double bed atau twin bed + 4 Bantal dan 2 Guling, Televisi, AC, Telepon, Toilet', '5', '750000', '', '08572582'),
(4, 'Junior Suite Room', 'Satu kamar ukuran 50 m2, Kasur king bed + 4 Bantal dan 2 Guling, Televisi, Sofa, AC, Telepon, Toilet, Shower, Area bath tub, Ruang tamu', '5', '850000', '', '39274028'),
(5, 'Suite Room', 'Satu kamar ukuran 80 m2, Kasur king bed, Televisi, Sofa, AC, Telepon, Toilet, Shower, Area bath tub, Ruang tamu, Dapur', '5', '1000000', '', '28502738');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `tipe_kamar` varchar(100) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `jumlah_order` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telephone` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `lama_hari` varchar(20) NOT NULL,
  `total_bayar` varchar(255) NOT NULL,
  `bukti_pembayaran` text DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `kode_booking` varchar(100) NOT NULL,
  `status` enum('diproses','konfirmasi','selesai','dibatalkan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `check_in`, `check_out`, `tipe_kamar`, `harga`, `jumlah_order`, `username`, `nama`, `email`, `no_telephone`, `alamat`, `lama_hari`, `total_bayar`, `bukti_pembayaran`, `nama_bank`, `kode_booking`, `status`) VALUES
(1, '2022-02-19', '2022-02-21', 'Suite Room', '1000000', '1 kamar', 'tsabitamin', 'Tsabit Aminulloh', 'tsabit@gmail.com', '085324785298', 'Jatinegara Kabupaten Tegal Jawa Tengah', '2 malam', 'Rp. 2.000.000', NULL, NULL, 'skul1324476689', 'diproses'),
(3, '2022-02-24', '2022-02-28', 'Deluxe Room', '750000', '1 kamar', 'tikanovi', 'Tika Novi', 'tika@gmail.com', '085226982948', 'Kota Banjar Jawa Barat', '4 malam', 'Rp. 3.000.000', NULL, NULL, 'skul1180791328', 'diproses');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(11) NOT NULL,
  `foto_profile` text NOT NULL DEFAULT 'default.svg',
  `nama_lengkap` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `id_level` int(11) NOT NULL DEFAULT 3,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `foto_profile`, `nama_lengkap`, `no_telp`, `email`, `alamat`, `username`, `password`, `id_level`, `created_at`) VALUES
(1, 'default.svg', 'Subhan Fadilah', '08999098812', 'subhanfadilah9@gmail.com', NULL, 'admin1', '$2y$10$y6yu/zQpYvsEReWExE26TeZ4wc2jmdPkIh19dtJmsHG2Gy2/dhApO', 1, '2022-02-03 05:08:38'),
(2, 'default.svg', 'Heni Nur', '085225218341', 'heninur@gmail.com', NULL, 'resepsionis', '$2y$10$Bn3OTcYxQu5O71rohYaR2.Yoy4PwPUlQZp.tMiZXjd2RMrW9GgbUi', 4, '2022-02-04 05:40:32'),
(3, 'default.svg', 'Tika Novi', '085226982948', 'tika@gmail.com', NULL, 'tikanovi', '$2y$10$hGRzw8CbIBhPWhOhWhIQLOMG2hBfo5HVKZy5J8N0rNwL8zUZLqkKa', 3, '2022-02-05 13:24:43'),
(4, '1645749934_d6375160992aab2ccfca.svg', 'Tsabit A', '085324785290', 'tsabit@gmail.com', 'Jatinegara Kabupaten Tegal', 'tsabitamin', '$2y$10$Tu.x9Kae2JUytTRcXjk0JO/2m.sv/bfTmmxDhzpfOQmDl9p75Sz7W', 3, '2022-02-05 14:05:48'),
(5, 'default.svg', 'Subhan Fadilah', '087578436365', 'remajahunter4@gmail.com', NULL, 'sbhan9', '$2y$10$yplbCY7ljuL9cTSfnwwn9ubCk21VY71dROqXZAvlEJYJDeeWkGrSy', 3, '2022-02-09 07:45:10'),
(6, 'default.svg', 'Pribadi Ramadhan', '0899589374938', 'pribadi.ramadhan@gmail.com', NULL, 'pribadir', '$2y$10$lRJYoieffqb3N/Dhnuv58egy6/uLJidJN37iOWWpX3Dk/vaIld63C', 3, '2022-02-12 09:47:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_fasilitas_umum`
--
ALTER TABLE `tb_fasilitas_umum`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_fasilitas_umum`
--
ALTER TABLE `tb_fasilitas_umum`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kamar`
--
ALTER TABLE `tb_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
