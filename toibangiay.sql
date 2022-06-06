-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 05, 2019 lúc 07:05 PM
-- Phiên bản máy phục vụ: 10.1.35-MariaDB
-- Phiên bản PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `toibangiay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `mahd` varchar(10) NOT NULL,
  `masp` varchar(10) NOT NULL,
  `maloai` varchar(10) NOT NULL,
  `tensp` varchar(50) NOT NULL,
  `size` int(10) NOT NULL,
  `soluong` int(10) NOT NULL,
  `dongia` float NOT NULL,
  `thanhtien` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` int(10) NOT NULL,
  `tennd` varchar(30) NOT NULL,
  `ngay` varchar(70) NOT NULL,
  `tongtien` varchar(30) NOT NULL,
  `xuly` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `maloai` varchar(10) NOT NULL,
  `tenloai` varchar(10) NOT NULL,
  `ncc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`maloai`, `tenloai`, `ncc`) VALUES
('ad', 'adidas', 'adidas'),
('as', 'asisc', 'asisc'),
('ni', 'nike', 'nike');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `mand` int(10) NOT NULL,
  `tendn` varchar(15) NOT NULL,
  `matkhau` varchar(200) NOT NULL,
  `email` varchar(15) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `ngaysinh` varchar(30) NOT NULL,
  `gioitinh` tinyint(1) NOT NULL,
  `mavt` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`mand`, `tendn`, `matkhau`, `email`, `sdt`, `ngaysinh`, `gioitinh`, `mavt`) VALUES
(15, 'bq', 'fcea920f7412b5da7be0cf42b8c93759', 'sd@gmail.com', '0', '2019-04-11', 1, 1),
(16, 'qwe', 'ac2a80b44ba660b6dfdec91af37c2cb8', 'sd@gmail.com', '0', '2019-04-26', 1, 1),
(17, 'bw', 'fcea920f7412b5da7be0cf42b8c93759', 'sd@gmail.com', '0', '2019-04-26', 1, 1),
(18, 'be', 'fcea920f7412b5da7be0cf42b8c93759', 'sd@gmail.com', '0', '2019-04-25', 1, 1),
(24, 'boss', 'fcea920f7412b5da7be0cf42b8c93759', 'sd@gmail.com', '0', '2019-04-30', 1, 0),
(25, 'fdsfsdf', 'fcea920f7412b5da7be0cf42b8c93759', 'sd@gmail.com', '337351424', '2019-05-08', 0, 1),
(26, 'sd', 'fcea920f7412b5da7be0cf42b8c93759', 'sd@gmail.com', '337351424', '2019-05-08', 1, 1),
(27, 'abc1', 'fcea920f7412b5da7be0cf42b8c93759', 'df@dd', '337351424', '2019-05-23', 1, 1),
(28, 'abc21', 'fcea920f7412b5da7be0cf42b8c93759', 'df@dd', '0337351424', '2019-05-23', 1, 1),
(29, 'abc1df', 'fcea920f7412b5da7be0cf42b8c93759', 'df@dd', '0337351424', '2019-05-23', 1, 1),
(30, 'abcdsadas', 'fcea920f7412b5da7be0cf42b8c93759', 'df@dd', '0337351424', '2019-04-28', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(10) NOT NULL,
  `maloai` varchar(10) NOT NULL,
  `tensp` varchar(30) NOT NULL,
  `gia` float NOT NULL,
  `hinh` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `maloai`, `tensp`, `gia`, `hinh`) VALUES
(1, 'ni', 'NIKE MERCURIAL SUPERFLY', 1750000, 'ni11.jpg'),
(2, 'ni', 'NIKE MERCURIALX ', 1650000, 'ni8.jpg'),
(3, 'ni', 'NIKE MERCURIAL SUPERFLY ', 1900000, 'ni9.jpg'),
(4, 'ni', 'NIKE MERCURIALX VAPOR 12 ', 2000000, 'ni4.jpg'),
(5, 'ni', 'NIKE HYPERVERNOM ', 2600000, 'ni55.jpg'),
(6, 'ad', 'adidas adidas Stan ', 1200000, 'ad1.jpg'),
(7, 'ad', 'ADIDAS X TANGO 18.3', 1800000, 'ad2.jpg'),
(8, 'ad', 'ADIDAS COPA 19.3', 1500000, 'ad3.jpg'),
(9, 'ad', 'ADIDAS X TANGO', 2800000, 'ad4.jpg'),
(10, 'ad', 'ADIDAS X TANGO 17+ ', 2400000, 'ad5.jpg'),
(11, 'ad', 'ADIDAS ACE TANGO', 18500000, 'ad6.jpg'),
(12, 'ni', 'NIKE MERCURIAL SUPE', 3500000, 'ni6.jpg'),
(13, 'as', 'ASICS ROCKET 8 ', 1800000, 'as1.jpg'),
(14, 'as', 'Giày Tennis Asics G', 2400000, 'as2.jpg'),
(15, 'as', 'Giày Thể Thao Nam A', 2800000, 'as3.jpg'),
(16, 'as', 'Asics Nam B706Y.100', 1900000, 'as4.jpg'),
(17, 'as', 'Asics Nam B703Y.100', 19999900, 'as5.jpg'),
(18, 'ni', 'NIKE ZOOM EVIDENCE ', 2300000, 'ni7.jpg'),
(20, '', 'ADIDAS MESSI 20', 2000000, 'ad7.jpg'),
(21, 'ni', 'NIKE MERCURIALX ', 1800000, 'ni2.jpg'),
(22, 'ni', 'NIKE MAGISTA OBRAX 2 ', 1750000, 'ni3.jpg'),
(23, 'ni', 'NIKE MERCURIALX VAPORX ', 2200000, 'ni10.jpg'),
(24, 'ni', 'NIKE HYPERVENOMX PHELON III TF', 1390000, 'ni13.jpg'),
(25, 'ni', 'NIKE MERCURIALX VAPOR XII PRO ', 2200000, 'ni14.jpg'),
(26, 'ni', 'NIKE ZOOM HYPERVENOM PHANTOM I', 2000000, 'ni15.jpg'),
(27, 'ni', 'NIKE MERCURIALX VAPOR XII PRO ', 2200000, 'ni14.jpg'),
(28, 'ni', 'NIKE ZOOM HYPERVENOM III', 2000000, 'ni15.jpg'),
(29, 'ni', 'NIKE MERCURIALX VICTORY VI', 2200000, 'ni16.jpg'),
(30, 'ni', 'NIKE MERCURIALY VICTORY VI ', 1800000, 'ni17.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `masp` int(10) NOT NULL,
  `masize` varchar(10) NOT NULL,
  `soluong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`masp`, `masize`, `soluong`) VALUES
(12, '3812', -1),
(14, '3814', 8),
(16, '3816', 3),
(17, '3817', 4),
(18, '3818', 1),
(34, '3834', 154),
(35, '3835', -1),
(36, '3836', -4),
(4, '384', 9),
(5, '385', 1),
(7, '387', 2),
(8, '388', 8),
(1, '391', 8),
(11, '3911', 8),
(13, '3913', 2),
(14, '3914', 3),
(16, '3916', 4),
(17, '3917', 3),
(18, '3918', 2),
(2, '392', 8),
(36, '3936', 0),
(4, '394', 8),
(7, '397', 3),
(9, '399', -1),
(1, '401', 8),
(10, '4010', 1),
(11, '4011', 3),
(13, '4013', 0),
(16, '4016', 3),
(2, '402', 8),
(33, '4033', 154),
(36, '4036', -10),
(6, '406', 3),
(8, '408', 0),
(9, '409', 2),
(1, '411', 8),
(10, '4110', 4),
(14, '4114', 6),
(17, '4117', 3),
(8, '4118', 3),
(3, '413', 8),
(36, '4136', 2),
(5, '415', 0),
(8, '418', 3),
(9, '419', -1),
(1, '421', 8),
(10, '4210', 2),
(11, '4211', 6),
(12, '4212', 2),
(13, '4213', 3),
(14, '4214', 4),
(16, '4216', 3),
(17, '4217', 3),
(8, '4218', 6),
(3, '423', 8),
(36, '4236', 1),
(6, '426', 0),
(12, '4312', 4),
(14, '4314', 1),
(6, '436', 1),
(7, '437', 5),
(8, '438', 0),
(9, '439', 2),
(13, '4413', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `mavt` int(1) NOT NULL,
  `tenvt` varchar(15) NOT NULL,
  `ghichu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`mand`),
  ADD UNIQUE KEY `tendn` (`tendn`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`masize`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahd` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `mand` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
