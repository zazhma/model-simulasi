-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2021 at 03:15 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpegadaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `no_antrian` int(6) UNSIGNED NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_tlp` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `jam_perkiraan` datetime(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`no_antrian`, `nik`, `nama`, `no_tlp`, `keterangan`, `jam_perkiraan`) VALUES
(1, '2189909012210001', 'Budi', '081290901919', 'Pembayaran cicilan gadai', '2021-11-05 08:00:00.0'),
(2, '2172890765278909', 'Mbah Wangi', '081290901334', 'Pembayaran cicilan gadai', '2021-11-05 08:05:00.0'),
(3, '2172898912216767', 'Aswadi', '089012346789', 'Pembukaan tabungan emas', '2021-11-05 08:45:00.0'),
(4, '2172676718189090', 'Bambang Namae', '089076765252', 'Pengambilan barang gadai', '2021-11-05 09:00:00.0'),
(5, '2172898901013456', 'Jamaidi', '081289897070', 'Pengajuan gadai', '2021-11-05 09:15:00.0'),
(6, '2172897654324545', 'Kamis', '081289890404', 'Pengajuan gadai', '2021-11-05 09:20:00.0'),
(7, '2172101098987676', 'Wangsiji', '081390781234', 'Pembayaran cicilan gadai', '2021-11-05 09:26:00.0'),
(8, '2172876543218790', 'Armagedon', '087654328900', 'Pembukaan tabungan emas', '2021-11-05 09:35:00.0'),
(9, '2172900908700876', 'Ismail', '089219192020', 'Pengambilan barang gadai', '2021-11-05 09:40:00.0'),
(10, '2172676754543232', 'Paimin', '081576765454', 'Pengajuan gadai', '2021-11-05 09:50:00.0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`) VALUES
(1, 'Zidan Azhari Ramadhan', '3220405', 'zidan@mail.com', '$2y$10$UcyZbff.2VS5oDLl.qSeKO3bje1AtkRw1XethwgmnPNnJhm.ozkwG'),
(2, 'Yvonne', '3220413', 'yvonne@mail.com', '$2y$10$TTaKkKg3xygMWj5WOkZ.Quovb5nHjroehQuyLE2/ZHZTJtlZdEhs.'),
(3, 'Muhammad Rafando Zachrul Domikoes', '3220415', 'rafando@mail.com', '$2y$10$BlVBhO4JVlCELnjmpmWCKeytZnTxn3afxGcwkf38eiDb/DyqQSlre'),
(4, 'Yulia Kristanti S', '3220446', 'yulia@mail.com', '$2y$10$Gc.3HeKvFQ2w0Mt0iOeLSeI4aBZtnD87vVcGwT5vZ68.QNrpXaSvO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`no_antrian`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `no_antrian` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
