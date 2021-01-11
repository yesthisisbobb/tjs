-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 17, 2019 at 10:44 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ventura2erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_stok`
--

CREATE TABLE `master_stok` (
  `no` int(11) NOT NULL,
  `kodetipe` varchar(100) NOT NULL,
  `kodeperusahaan` varchar(50) NOT NULL,
  `kodemerk` varchar(50) NOT NULL,
  `kodesup` varchar(100) NOT NULL,
  `kodedivisi` varchar(50) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `kode_stok` varchar(200) NOT NULL,
  `kodeitem_stok` varchar(200) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tebal` int(11) NOT NULL,
  `pcsctn` int(11) NOT NULL,
  `sqmctn` float NOT NULL,
  `kgctn` float NOT NULL,
  `volctn` float NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_stok`
--

INSERT INTO `master_stok` (`no`, `kodetipe`, `kodeperusahaan`, `kodemerk`, `kodesup`, `kodedivisi`, `kelas`, `kode_stok`, `kodeitem_stok`, `panjang`, `lebar`, `tebal`, `pcsctn`, `sqmctn`, `kgctn`, `volctn`, `status`) VALUES
(2, 'INTEGRITYWOODTAUPE', 'KM', 'SIMPOLO', 'SIMPOLO', 'SMB', 'High', 'KMSIMPOLOINSIMPOLOINTEGRITYWOODTAUPE', 'INTEGRITYWOODTAUPE', 120, 240, 9, 1, 2.88, 62, 0.02592, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_stok`
--
ALTER TABLE `master_stok`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_stok`
--
ALTER TABLE `master_stok`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
