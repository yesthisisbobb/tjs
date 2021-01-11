-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2019 at 10:24 AM
-- Server version: 5.7.23
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ventura2DB2019`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id` int(11) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id`, `kategori`) VALUES
(1, 'Retail'),
(2, 'Toko'),
(3, 'Project'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `detail_shipto`
--

CREATE TABLE `detail_shipto` (
  `ID_toko` varchar(20) NOT NULL,
  `alamat_kirim` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detail_shipto_retail`
--

CREATE TABLE `detail_shipto_retail` (
  `ID_TOKO` varchar(20) NOT NULL,
  `ALAMAT_KIRIM` varchar(50) NOT NULL,
  `KOTA` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detail_stok`
--

CREATE TABLE `detail_stok` (
  `tgl` date DEFAULT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `nm_item` varchar(100) DEFAULT NULL,
  `shading` varchar(50) DEFAULT NULL,
  `LPB` varchar(50) DEFAULT NULL,
  `inventarisasi` varchar(50) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `harga_jual` bigint(11) DEFAULT NULL,
  `induk_shading` varchar(50) DEFAULT NULL,
  `keterangan` text,
  `divisi` varchar(25) DEFAULT NULL,
  `merk` varchar(25) DEFAULT NULL,
  `tipe` varchar(25) DEFAULT NULL,
  `artikel` varchar(25) DEFAULT NULL,
  `m2` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `kubik` int(11) DEFAULT NULL,
  `gudang` varchar(25) DEFAULT NULL,
  `kualitas` varchar(25) DEFAULT NULL,
  `level` varchar(25) DEFAULT NULL,
  `ukuran` varchar(25) DEFAULT NULL,
  `warna` varchar(25) DEFAULT NULL,
  `motif` varchar(25) DEFAULT NULL,
  `panjang` int(11) DEFAULT NULL,
  `lebar` int(11) DEFAULT NULL,
  `tinggi` int(11) DEFAULT NULL,
  `lokal_impor` varchar(25) DEFAULT NULL,
  `min_stok` int(11) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `qty_onhand` int(11) DEFAULT NULL,
  `konversi` varchar(11) DEFAULT NULL,
  `produksi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detail_toko`
--

CREATE TABLE `detail_toko` (
  `ID_grup` varchar(20) DEFAULT NULL,
  `ID_toko` varchar(20) NOT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Customer_Name` varchar(20) DEFAULT NULL,
  `no_npwp` varchar(30) DEFAULT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `alamat_shipto` varchar(50) DEFAULT NULL,
  `alamat_billto` varchar(50) DEFAULT NULL,
  `Kota` varchar(20) DEFAULT NULL,
  `Telpon` varchar(20) DEFAULT NULL,
  `no_hp` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `PIC` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `Keterangan_BL` varchar(20) DEFAULT NULL,
  `Memo` text,
  `Tanggal_Masuk` date DEFAULT NULL,
  `Salesman` varchar(20) DEFAULT NULL,
  `Foto_toko` varchar(30) DEFAULT NULL,
  `kategori_pjk` tinyint(1) DEFAULT NULL,
  `TOP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_merk`
--

CREATE TABLE `master_merk` (
  `Kode` varchar(25) NOT NULL,
  `Keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_perusahaan`
--

CREATE TABLE `master_perusahaan` (
  `Kode` varchar(25) NOT NULL,
  `Nm_Perusahaan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_retail`
--

CREATE TABLE `master_retail` (
  `ID_toko` varchar(20) NOT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `Customer_Name` varchar(20) DEFAULT NULL,
  `no_npwp` varchar(30) DEFAULT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `alamat_shipto` varchar(50) DEFAULT NULL,
  `alamat_billto` varchar(50) DEFAULT NULL,
  `Kota` varchar(20) DEFAULT NULL,
  `Telpon` varchar(20) DEFAULT NULL,
  `no_hp` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `PIC` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `Keterangan_BL` varchar(20) DEFAULT NULL,
  `Memo` text,
  `Tanggal_Masuk` date DEFAULT NULL,
  `Salesman` varchar(20) DEFAULT NULL,
  `kategori_pjk` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_stok`
--

CREATE TABLE `master_stok` (
  `kode_perusahaan` varchar(25) NOT NULL,
  `kode_merk` varchar(25) NOT NULL,
  `kode_supplier` varchar(25) NOT NULL,
  `Kode` varchar(50) NOT NULL,
  `kd_kategori` varchar(25) NOT NULL,
  `Jns_produksi` varchar(25) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `Shading` varchar(25) NOT NULL,
  `status_barang` varchar(25) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_supplier`
--

CREATE TABLE `master_supplier` (
  `Kode` varchar(25) NOT NULL,
  `nm_supplier` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `CR` int(11) NOT NULL,
  `TOP` int(11) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `master_toko`
--

CREATE TABLE `master_toko` (
  `ID_grup` varchar(20) NOT NULL,
  `nm_grup` varchar(20) DEFAULT NULL,
  `ID_Kategori` varchar(20) DEFAULT NULL,
  `AR_limit` bigint(20) DEFAULT NULL,
  `alamat` varchar(20) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `pic` varchar(20) DEFAULT NULL,
  `foto_toko` varchar(200) DEFAULT NULL,
  `sales` varchar(20) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `keterangan_BL` varchar(20) DEFAULT NULL,
  `Cabang` varchar(20) DEFAULT NULL,
  `koordinat` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_toko`
--

INSERT INTO `master_toko` (`ID_grup`, `nm_grup`, `ID_Kategori`, `AR_limit`, `alamat`, `kota`, `telp`, `email`, `pic`, `foto_toko`, `sales`, `tgl_masuk`, `keterangan_BL`, `Cabang`, `koordinat`) VALUES
('A1', 'sad', 'sad', 1111, 'asd', 'asd', 'asd', 'asd', 'asd', '0', 'sad', '2019-04-28', 'asd', 'asd', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `confirm_code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `user_type`, `name`, `email`, `password`, `phone`, `confirm_code`, `status`) VALUES
(1, '1', '1', '1', '1', '1', '1', '1'),
(1, '1', '1', '1', '1', '1', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_shipto`
--
ALTER TABLE `detail_shipto`
  ADD KEY `ID_toko` (`ID_toko`);

--
-- Indexes for table `detail_toko`
--
ALTER TABLE `detail_toko`
  ADD PRIMARY KEY (`ID_toko`),
  ADD KEY `ID_grup` (`ID_grup`);

--
-- Indexes for table `master_toko`
--
ALTER TABLE `master_toko`
  ADD PRIMARY KEY (`ID_grup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_shipto`
--
ALTER TABLE `detail_shipto`
  ADD CONSTRAINT `detail_shipto_ibfk_1` FOREIGN KEY (`ID_toko`) REFERENCES `detail_toko` (`ID_toko`);

--
-- Constraints for table `detail_toko`
--
ALTER TABLE `detail_toko`
  ADD CONSTRAINT `detail_toko_ibfk_1` FOREIGN KEY (`ID_grup`) REFERENCES `master_toko` (`ID_grup`);
