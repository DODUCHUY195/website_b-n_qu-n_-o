-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2025 at 08:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xuong_quan_ao`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL,
  `tai_khoan_id` int(11) NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` date NOT NULL,
  `trang_thai` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_dang`, `trang_thai`) VALUES
(1, 17, 1, 'abc', '2025-08-16', 2),
(2, 16, 1, 'okkkk', '2025-08-17', 2),
(3, 18, 1, 'abchhh', '2025-08-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int(11) NOT NULL,
  `don_hang_id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `thanh_tien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`) VALUES
(1, 1, 16, 50000.00, 50, 20000.00),
(2, 2, 17, 60000.00, 20, 70000.00);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` int(11) NOT NULL,
  `gio_hang_id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` int(11) NOT NULL,
  `ten_chuc_vu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chuc_vus`
--

INSERT INTO `chuc_vus` (`id`, `ten_chuc_vu`) VALUES
(1, 'Quản trị viên'),
(2, 'Khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int(11) NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `mo_ta`) VALUES
(5, 'Quần Áo Thể Thao Nữ', 'Quần áo thoáng mát, dễ chịu......'),
(6, 'Quần Áo Thể Thao Nam/Nữ', 'Quần áo đa giới tính'),
(7, 'uhhu', 'aokk');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int(11) NOT NULL,
  `ma_don_hang` varchar(50) NOT NULL,
  `tai_khoan_id` int(11) NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) NOT NULL,
  `sdt_nguoi_nhan` varchar(15) NOT NULL,
  `dia_chi_nguoi_nhan` text NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ghi_chu` text DEFAULT NULL,
  `phuong_thuc_thanh_toan_id` int(11) NOT NULL,
  `trang_thai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`) VALUES
(1, 'ABCXYZ1', 7, 'Đỗ Đức Huy', 'huyddph@fpt.edu.vn', '033855006', 'SN 35', '2025-08-01', 2000000.00, 'okkk', 1, 4),
(5, 'ABCXYZ125', 8, 'Đỗ Đức Huy', 'huyddph@fpt.edu.vnyg', '0338550061', 'SN 34yh', '2025-08-16', 2000040.00, 'okkkyyt', 1, 6),
(7, 'DH2011', 9, 'Đỗ Đức Duc', 'dddd@gmail.com', '0977631211', 'sn34', '2025-08-09', 500000.00, 'uyyy', 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int(11) NOT NULL,
  `tai_khoan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` int(11) NOT NULL,
  `san_pham_id` int(11) NOT NULL,
  `link_hinh_anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `san_pham_id`, `link_hinh_anh`) VALUES
(22, 13, '689b0d6145aae.jpg'),
(23, 13, '689b0d6146324.jpg'),
(37, 16, '689d5d72ef685.jpg'),
(39, 16, '689d5d72f2723.jpg'),
(41, 20, '689d5e080edbf.jpg'),
(42, 20, '689d5e080f5db.jpg'),
(43, 20, '689d5e080fe89.jpg'),
(49, 17, '689d64b389c2a.jpg'),
(50, 17, '689d64b38a4be.jpg'),
(51, 17, '689d64b38abe6.jpg'),
(52, 22, '689d657bbe92d.jpg'),
(53, 22, '689d657bbf155.jpg'),
(54, 22, '689d657bbfa15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int(11) NOT NULL,
  `ten_phuong_thuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toans`
--

INSERT INTO `phuong_thuc_thanh_toans` (`id`, `ten_phuong_thuc`) VALUES
(1, 'Chuyển Khoản'),
(2, 'Thanh Toán Khi Nhận Hàng');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int(11) NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `gia_san_pham` decimal(10,2) NOT NULL,
  `gia_khuyen_mai` decimal(10,2) DEFAULT NULL,
  `hinh_anh` text DEFAULT NULL,
  `so_luong` int(11) NOT NULL,
  `luot_xem` int(11) DEFAULT 0,
  `ngay_nhap` date NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `danh_muc_id` int(11) NOT NULL,
  `trang_thai` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `luot_xem`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`) VALUES
(16, 'Quần Leo Núi Co Giãn Nữ 123', 100000.00, 90000.00, '68a216143d822.jpg', 100, 0, '2025-07-24', 'Cực kỳ dễ chịu và thoáng mát', 5, 1),
(17, 'Quần Áo Đá Bóng Nam', 300000.00, 270000.00, '689d64bb7033b.jpg', 50, 0, '2025-07-24', 'Quần áo đá bóng siêu thoáng mát', 4, 2),
(18, 'Quần Áo Cầu Lông Nam Nữ', 150000.00, 99000.00, '689d651c1193f.jpg', 10, 0, '2025-07-20', 'Quần áo cầu lông yonex', 6, 2),
(19, 'Quần Áo Bóng Rổ NAM', 400000.00, 350000.00, '689d6521c54ad.jpg', 200, 0, '2025-07-27', 'Quần áo bóng rỗ nam ,ba lỗ cực thoáng mát', 4, 1),
(20, 'Quần Áo Short', 250000.00, 200000.00, '689d65287f9d9.jpg', 30, 0, '2025-07-29', 'Quần áo thoải mái', 6, 1),
(21, 'Quần Áo Nữ', 150000.00, 140000.00, '689d652f7845e.jpg', 50, 0, '2025-07-27', 'Quần áo nữ', 5, 1),
(22, 'Áo thun dã ngoại nam ngắn tay', 500000.00, 350000.00, '689d657bbdeba.jpg', 49, 0, '2025-07-27', 'Ok', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `anh_dai_dien` varchar(255) DEFAULT NULL,
  `ngay_sinh` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(10) NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL DEFAULT 1,
  `dia_chi` text NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `chuc_vu_id` int(11) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `ho_ten`, `anh_dai_dien`, `ngay_sinh`, `email`, `so_dien_thoai`, `gioi_tinh`, `dia_chi`, `mat_khau`, `chuc_vu_id`, `trang_thai`) VALUES
(1, 'Đỗ  dc', NULL, '2004-07-05', 'doduchuy1952000@gmai.com', '0338550061', 1, '', '$2y$10$jgbS3z.OmlVM6g0kzQLWeuZOZENsnf/bXNHWuZdnYYZ5zZ/5xJznu', 1, 2),
(4, 'Đỗ Thị Quỳnh Trang ', NULL, '0000-00-00', 'trangdtq2002@gmail.com', '999', 1, '', '$2y$10$dcGKZC3n1v.PLKouatDf2e1pHJtbaD6uZXF0G7Wwwcjs9EGqtZaZy', 1, 1),
(5, 'Nguyễn Thị Phúc', NULL, '0000-00-00', 'phucnt1979@gmail.com', '', 1, '', '$2y$10$wMhsY4/KOKx9qIjiLNGeBeie9HS6SKOGpXV.wF5.gl/00d/THftuO', 1, 1),
(6, 'Đỗ Đức Thiện ', NULL, '0000-00-00', 'thiendd1975@gmail.com', '094', 1, '', '$2y$10$X44Zrvxxnl5WVDH7xnsrTuEXffaUPBtOJDOXlDY.jbemfR33/og/a', 1, 1),
(7, 'Đỗ Đức Minh 3456', NULL, '2031-08-08', 'minhdd2003@gmail.com', '', 2, '', '$2y$10$ELrwe9x0eZ8JJdreL7kh1OiR0vmelzCRlyWzwCnBQWD.3I4pJCmpm', 1, 1),
(8, 'Lê Minh Thảo', NULL, '2031-08-08', 'thaolm2004@gmail.com', '', 2, '', '$2y$10$VamwzINq3luzNKq3opTE6eQ8Uo1/.io/WLFMN9hN/FwLrCr2EbA5e', 1, 1),
(9, 'Do Duc Huy     ', NULL, '2031-08-08', '3333@12', '', 2, '', '$2y$10$QLIXTcZrpI0qw9jX8VckpeCiBQdIFD3kfeACGJXWwqDzRcFrIRKxO', 2, 2),
(10, 'Đinh Công   ', NULL, '2031-08-08', 'andc2004@gmail.com', '88989', 2, '', '$2y$10$7KCqeni7tQcDlZrzHV09g.q/pkqHvMJ7bTITeGirB/W5uVX4kIVdy', 2, 2),
(12, 'Do Duc Huy ', NULL, '0000-00-00', 'doduchuy1952000@gmail.com', '', 1, '', '$2y$10$/yG2RDjz.DDDgHwvSNsYpuAmW/3/TrTyuqP051kdllAvnCZ5kLXZ6', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int(11) NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten_trang_thai`) VALUES
(1, 'Chưa xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Chưa Thanh Toán'),
(4, 'Đã thanh toán'),
(5, 'Đang chuẩn bị hàng'),
(6, 'Đang giao'),
(7, 'Đã giao'),
(8, 'Đã nhận'),
(9, 'Thành công'),
(10, 'Hoàn hàng'),
(11, 'Huỷ đơn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
