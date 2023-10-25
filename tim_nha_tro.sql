-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 04:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tim_nha_tro`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_ban`
--

CREATE TABLE `tb_ban` (
  `MaBan` varchar(5) NOT NULL,
  `TenBan` varchar(20) DEFAULT NULL,
  `MaHuyen` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dondk`
--

CREATE TABLE `tb_dondk` (
  `MaDK` varchar(5) NOT NULL,
  `MaTK` varchar(5) NOT NULL,
  `HinhTT` varchar(100) DEFAULT NULL,
  `NgayDK` date DEFAULT NULL,
  `NgayHetHan` date DEFAULT NULL,
  `SoTien` varchar(15) DEFAULT NULL,
  `TrangThai` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_huyen`
--

CREATE TABLE `tb_huyen` (
  `MaHuyen` varchar(5) NOT NULL,
  `TenHuyen` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_quyen`
--

CREATE TABLE `tb_quyen` (
  `MaQuyen` varchar(5) NOT NULL,
  `TenQuyen` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_taikhoan`
--

CREATE TABLE `tb_taikhoan` (
  `MaTK` varchar(5) NOT NULL,
  `MaQuyen` varchar(5) NOT NULL,
  `TenDN` varchar(10) NOT NULL,
  `MaKhau` varchar(255) NOT NULL,
  `HoTen` varchar(50) DEFAULT NULL,
  `GioiTinh` varchar(10) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `SoDT` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_thong_tin_nha`
--

CREATE TABLE `tb_thong_tin_nha` (
  `MaNha` varchar(5) NOT NULL,
  `MaTK` varchar(5) NOT NULL,
  `TenNha` varchar(20) DEFAULT NULL,
  `HinhAnh` varchar(100) DEFAULT NULL,
  `DiaChi` text DEFAULT NULL,
  `Gia` varchar(20) DEFAULT NULL,
  `TrangThai` varchar(10) DEFAULT NULL,
  `NgayDang` timestamp NULL DEFAULT NULL,
  `MoTa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ban`
--
ALTER TABLE `tb_ban`
  ADD PRIMARY KEY (`MaBan`);

--
-- Indexes for table `tb_dondk`
--
ALTER TABLE `tb_dondk`
  ADD PRIMARY KEY (`MaDK`);

--
-- Indexes for table `tb_huyen`
--
ALTER TABLE `tb_huyen`
  ADD PRIMARY KEY (`MaHuyen`);

--
-- Indexes for table `tb_quyen`
--
ALTER TABLE `tb_quyen`
  ADD PRIMARY KEY (`MaQuyen`);

--
-- Indexes for table `tb_taikhoan`
--
ALTER TABLE `tb_taikhoan`
  ADD PRIMARY KEY (`MaTK`);

--
-- Indexes for table `tb_thong_tin_nha`
--
ALTER TABLE `tb_thong_tin_nha`
  ADD PRIMARY KEY (`MaNha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
