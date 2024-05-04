-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 04:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upsmk`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `idakun` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`idakun`, `nama`, `username`, `email`, `password`, `level`) VALUES
(4, 'mikail2', 'mikalukman', 'mika@gmail.com', '$2y$10$g7kWQBV9LQbOMUcnK7iCXe4m/diODBksCVHykwPJQsnS9.r7yK3cG', '1'),
(5, 'muhandaru Hinggil Paramukti', 'muhandaru', 'muhandaru2@gmail.com', '$2y$10$Vt94.8JLh7dn0iHgotQmzu3Hon/BJXLtl32kDo1pTh8BH6dGNzAD6', '2'),
(6, 'coba', 'coba', 'coba@gmail.com', '$2y$10$kP7WBFgoBgp2LTf7gsy2mOl1Djozhg1OcuyLNt7qK98X6/hK9MLZS', '1'),
(7, 'Admin Barang', 'barang', 'barang@gmail.com', '$2y$10$ISemkFejb.GVZnnX5axcDeieEHWgj9/kks9/MD4nZuYIiu7keR8V.', '3'),
(8, 'Admin Utama', 'admin', 'admin@gmail.com', '$2y$10$EuhWwhsPHvt9wZke5yJ4muhRey8/4afB1DGGyhgpR3MwGOGszYnea', '1'),
(9, 'Operator Siswa', 'siswa', 'siswa@gmail.com', '$2y$10$hKI/uYKM2gPM1HrM8xP8quD4hlSjjHO/GyP9uyYzrJiQbuTkev192', '2');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(6) NOT NULL,
  `harga` int(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `nama`, `jumlah`, `harga`, `tanggal`) VALUES
(6, 'Alat Pancing', 45, 45000, '2024-04-30 07:31:41'),
(7, 'Panci Bakso', 34, 250000, '2024-04-30 07:36:00'),
(8, 'Buku Tulis ', 35, 34000, '2024-04-30 07:36:36');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(10) NOT NULL,
  `namasiswa` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `namasiswa`, `jk`, `alamat`, `tanggal_lahir`, `foto`) VALUES
(112, 'Maulida Dian67', 'P', 'Mundusari no 23, Gamping, Sleman', '2008-04-08', ''),
(10003, 'Baharudin Amin', 'L', 'Kelurahan Harun', '2012-06-13', '66331912e231f.png'),
(100002, 'Nurohman2', 'L', 'Jl Kamboja No 12', '2011-01-03', '663318d8eb85f.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`idakun`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `idakun` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
