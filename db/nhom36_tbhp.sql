-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 15, 2023 lúc 08:59 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom36_tbhp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietbbđh`
--

CREATE TABLE `tbl_chitietbbđh` (
  `maBBĐH` varchar(50) NOT NULL,
  `maHDB` varchar(50) NOT NULL,
  `mota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitiethdb`
--

CREATE TABLE `tbl_chitiethdb` (
  `maHDB` varchar(50) NOT NULL,
  `maSP` varchar(50) NOT NULL,
  `soluong` double NOT NULL,
  `DVT` varchar(100) NOT NULL,
  `dongia` double NOT NULL,
  `giamgia` double NOT NULL,
  `thanhtien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietpnh`
--

CREATE TABLE `tbl_chitietpnh` (
  `maPNH` varchar(50) NOT NULL,
  `maSP` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `DVT` varchar(100) NOT NULL,
  `dongia` double NOT NULL,
  `giamgia` double NOT NULL,
  `thanhtien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietpnk`
--

CREATE TABLE `tbl_chitietpnk` (
  `maPNK` varchar(50) NOT NULL,
  `maSP` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietpxk`
--

CREATE TABLE `tbl_chitietpxk` (
  `maPXK` varchar(50) NOT NULL,
  `maSP` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chucvu`
--

CREATE TABLE `tbl_chucvu` (
  `maCV` varchar(50) NOT NULL,
  `tenCV` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_doihang`
--

CREATE TABLE `tbl_doihang` (
  `maBBĐH` varchar(50) NOT NULL,
  `maNV` varchar(50) NOT NULL,
  `maKH` varchar(50) NOT NULL,
  `ngaylap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hoadonban`
--

CREATE TABLE `tbl_hoadonban` (
  `maHDB` varchar(50) NOT NULL,
  `maNV` varchar(50) NOT NULL,
  `maKH` varchar(50) NOT NULL,
  `ngayban` date NOT NULL,
  `tongtien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `maKH` varchar(50) NOT NULL,
  `tenKH` text NOT NULL,
  `diachi` text NOT NULL,
  `sdt` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_loaisanpham`
--

CREATE TABLE `tbl_loaisanpham` (
  `maloai` varchar(50) NOT NULL,
  `tenloai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhacungcap`
--

CREATE TABLE `tbl_nhacungcap` (
  `maNCC` varchar(50) NOT NULL,
  `tenNCC` varchar(200) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sdt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhanvien`
--

CREATE TABLE `tbl_nhanvien` (
  `maNV` varchar(50) NOT NULL,
  `tenNV` varchar(100) NOT NULL,
  `ngaysinh` date NOT NULL,
  `diachi` text NOT NULL,
  `gioitinh` text NOT NULL,
  `sdt` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `maCV` varchar(50) NOT NULL,
  `maTK` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phieunhaphang`
--

CREATE TABLE `tbl_phieunhaphang` (
  `maPNH` varchar(50) NOT NULL,
  `maNCC` varchar(50) NOT NULL,
  `maNV` varchar(50) NOT NULL,
  `ngaylap` date NOT NULL,
  `tongtien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phieunhapkho`
--

CREATE TABLE `tbl_phieunhapkho` (
  `maPNK` varchar(50) NOT NULL,
  `maNV` varchar(50) NOT NULL,
  `ngaylap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phieuxuatkho`
--

CREATE TABLE `tbl_phieuxuatkho` (
  `maPXK` varchar(50) NOT NULL,
  `maNV` varchar(50) NOT NULL,
  `ngaylap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `maSP` varchar(50) NOT NULL,
  `tenSP` varchar(200) NOT NULL,
  `maloai` varchar(50) NOT NULL,
  `maNCC` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `DVT` varchar(200) NOT NULL,
  `mota` text NOT NULL,
  `ghichu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_taikhoan`
--

CREATE TABLE `tbl_taikhoan` (
  `maTK` varchar(50) NOT NULL,
  `tennguoidung` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_chitietbbđh`
--
ALTER TABLE `tbl_chitietbbđh`
  ADD PRIMARY KEY (`maBBĐH`,`maHDB`),
  ADD KEY `FK_CTDH_HDB` (`maHDB`);

--
-- Chỉ mục cho bảng `tbl_chitiethdb`
--
ALTER TABLE `tbl_chitiethdb`
  ADD PRIMARY KEY (`maHDB`,`maSP`),
  ADD KEY `FK_CTHDB_SP` (`maSP`);

--
-- Chỉ mục cho bảng `tbl_chitietpnh`
--
ALTER TABLE `tbl_chitietpnh`
  ADD PRIMARY KEY (`maPNH`,`maSP`),
  ADD KEY `FK_CTPNH_SP` (`maSP`);

--
-- Chỉ mục cho bảng `tbl_chitietpnk`
--
ALTER TABLE `tbl_chitietpnk`
  ADD PRIMARY KEY (`maPNK`,`maSP`),
  ADD KEY `FK_CTPNK_SP` (`maSP`);

--
-- Chỉ mục cho bảng `tbl_chitietpxk`
--
ALTER TABLE `tbl_chitietpxk`
  ADD PRIMARY KEY (`maPXK`,`maSP`),
  ADD KEY `FK_CTPXK_SP` (`maSP`);

--
-- Chỉ mục cho bảng `tbl_chucvu`
--
ALTER TABLE `tbl_chucvu`
  ADD PRIMARY KEY (`maCV`);

--
-- Chỉ mục cho bảng `tbl_doihang`
--
ALTER TABLE `tbl_doihang`
  ADD PRIMARY KEY (`maBBĐH`),
  ADD KEY `FK_DH_KH` (`maKH`),
  ADD KEY `FK_DH_NV` (`maNV`);

--
-- Chỉ mục cho bảng `tbl_hoadonban`
--
ALTER TABLE `tbl_hoadonban`
  ADD PRIMARY KEY (`maHDB`),
  ADD KEY `FK_HDB_KH` (`maKH`),
  ADD KEY `FK_HDB_NV` (`maNV`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`maKH`);

--
-- Chỉ mục cho bảng `tbl_loaisanpham`
--
ALTER TABLE `tbl_loaisanpham`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  ADD PRIMARY KEY (`maNCC`);

--
-- Chỉ mục cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  ADD PRIMARY KEY (`maNV`),
  ADD KEY `FK_CV_NV` (`maCV`),
  ADD KEY `FK_TK_NV` (`maTK`);

--
-- Chỉ mục cho bảng `tbl_phieunhaphang`
--
ALTER TABLE `tbl_phieunhaphang`
  ADD PRIMARY KEY (`maPNH`),
  ADD KEY `FK_PNH_NCC` (`maNCC`),
  ADD KEY `FK_PNH_NV` (`maNV`);

--
-- Chỉ mục cho bảng `tbl_phieunhapkho`
--
ALTER TABLE `tbl_phieunhapkho`
  ADD PRIMARY KEY (`maPNK`),
  ADD KEY `FK_PNK_NV` (`maNV`);

--
-- Chỉ mục cho bảng `tbl_phieuxuatkho`
--
ALTER TABLE `tbl_phieuxuatkho`
  ADD PRIMARY KEY (`maPXK`),
  ADD KEY `FK_PXK_NV` (`maNV`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`maSP`),
  ADD KEY `FK_SP_LSP` (`maloai`),
  ADD KEY `FK_SP_NCC` (`maNCC`);

--
-- Chỉ mục cho bảng `tbl_taikhoan`
--
ALTER TABLE `tbl_taikhoan`
  ADD PRIMARY KEY (`maTK`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_chitietbbđh`
--
ALTER TABLE `tbl_chitietbbđh`
  ADD CONSTRAINT `FK_CTDH_DH` FOREIGN KEY (`maBBĐH`) REFERENCES `tbl_doihang` (`maBBĐH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CTDH_HDB` FOREIGN KEY (`maHDB`) REFERENCES `tbl_hoadonban` (`maHDB`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_chitiethdb`
--
ALTER TABLE `tbl_chitiethdb`
  ADD CONSTRAINT `FK_CTHDB_HDB` FOREIGN KEY (`maHDB`) REFERENCES `tbl_hoadonban` (`maHDB`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CTHDB_SP` FOREIGN KEY (`maSP`) REFERENCES `tbl_sanpham` (`maSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_chitietpnh`
--
ALTER TABLE `tbl_chitietpnh`
  ADD CONSTRAINT `FK_CTPNH_PNH` FOREIGN KEY (`maPNH`) REFERENCES `tbl_phieunhaphang` (`maPNH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CTPNH_SP` FOREIGN KEY (`maSP`) REFERENCES `tbl_sanpham` (`maSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_chitietpnk`
--
ALTER TABLE `tbl_chitietpnk`
  ADD CONSTRAINT `FK_CTPNK_PNK` FOREIGN KEY (`maPNK`) REFERENCES `tbl_phieunhapkho` (`maPNK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CTPNK_SP` FOREIGN KEY (`maSP`) REFERENCES `tbl_sanpham` (`maSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_chitietpxk`
--
ALTER TABLE `tbl_chitietpxk`
  ADD CONSTRAINT `FK_CTPXK_PXK` FOREIGN KEY (`maPXK`) REFERENCES `tbl_phieuxuatkho` (`maPXK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CTPXK_SP` FOREIGN KEY (`maSP`) REFERENCES `tbl_sanpham` (`maSP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_doihang`
--
ALTER TABLE `tbl_doihang`
  ADD CONSTRAINT `FK_DH_KH` FOREIGN KEY (`maKH`) REFERENCES `tbl_khachhang` (`maKH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DH_NV` FOREIGN KEY (`maNV`) REFERENCES `tbl_nhanvien` (`maNV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_hoadonban`
--
ALTER TABLE `tbl_hoadonban`
  ADD CONSTRAINT `FK_HDB_KH` FOREIGN KEY (`maKH`) REFERENCES `tbl_khachhang` (`maKH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_HDB_NV` FOREIGN KEY (`maNV`) REFERENCES `tbl_nhanvien` (`maNV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  ADD CONSTRAINT `FK_CV_NV` FOREIGN KEY (`maCV`) REFERENCES `tbl_chucvu` (`maCV`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TK_NV` FOREIGN KEY (`maTK`) REFERENCES `tbl_taikhoan` (`maTK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_phieunhaphang`
--
ALTER TABLE `tbl_phieunhaphang`
  ADD CONSTRAINT `FK_PNH_NCC` FOREIGN KEY (`maNCC`) REFERENCES `tbl_nhacungcap` (`maNCC`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PNH_NV` FOREIGN KEY (`maNV`) REFERENCES `tbl_nhanvien` (`maNV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_phieunhapkho`
--
ALTER TABLE `tbl_phieunhapkho`
  ADD CONSTRAINT `FK_PNK_NV` FOREIGN KEY (`maNV`) REFERENCES `tbl_nhanvien` (`maNV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_phieuxuatkho`
--
ALTER TABLE `tbl_phieuxuatkho`
  ADD CONSTRAINT `FK_PXK_NV` FOREIGN KEY (`maNV`) REFERENCES `tbl_nhanvien` (`maNV`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `FK_SP_LSP` FOREIGN KEY (`maloai`) REFERENCES `tbl_loaisanpham` (`maloai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SP_NCC` FOREIGN KEY (`maNCC`) REFERENCES `tbl_nhacungcap` (`maNCC`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
