-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2024 at 05:49 PM
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
-- Database: `webbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `donhang_ma` int(11) NOT NULL,
  `sp_ma` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `timeorder` date NOT NULL,
  `donhang_trangthai` varchar(100) NOT NULL,
  `donhang_gia` varchar(15) NOT NULL,
  `donhang_soluongsp` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `loaisp_ten` varchar(250) NOT NULL,
  `loaisanpham` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`loaisp_ten`, `loaisanpham`) VALUES
('Bìa kẹp', 'biakep'),
('Bút', 'but'),
('Hộp', 'hop'),
('Khác', 'KHAC'),
('Máy tính', 'maytinh'),
('Nhãn dán', 'nhandan'),
('Sổ tay', 'sotay'),
('Túi', 'tui'),
('Vở', 'Vo');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `sp_ma` int(11) NOT NULL,
  `loaisp_ten` varchar(100) NOT NULL,
  `sp_ten` varchar(250) NOT NULL,
  `sp_gia` varchar(250) NOT NULL,
  `sp_mota` varchar(300) DEFAULT NULL,
  `sp_motachitiet` varchar(300) NOT NULL,
  `sp_img` varchar(50) NOT NULL,
  `sp_soluong` int(250) NOT NULL DEFAULT 1,
  `loaisanpham` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`sp_ma`, `loaisp_ten`, `sp_ten`, `sp_gia`, `sp_mota`, `sp_motachitiet`, `sp_img`, `sp_soluong`, `loaisanpham`) VALUES
(99, 'Sổ tay', 'Sổ tay mini hoạt hình dễ thương', '20', 'Sổ Tay Cá Nhân Mini/ Sổ Noted 32 Trang \r\n\r\n-  Sổ noted có 16 tờ- 32 trang.\r\n-  Kích thước cả bìa : 8.1*10.3cm được làm từ giấy chất lượng, bề mặt mịn, viết êm.\r\n-  Giấy bắt mực tốt, không gây lem, cho chữ viết rõ ràng, đẹp mắt.\r\n-  Sản phẩm phù hợp với nhiều mục đích sử dụng trong lĩnh vực văn phòng', 'Sổ Tay Cá Nhân Mini/ Sổ Noted 32 Trang \r\n\r\n-  Sổ noted có 16 tờ- 32 trang.\r\n-  Kích thước cả bìa : 8.1*10.3cm được làm từ giấy chất lượng, bề mặt mịn, viết êm.\r\n-  Giấy bắt mực tốt, không gây lem, cho chữ viết rõ ràng, đẹp mắt.\r\n-  Sản phẩm phù hợp với nhiều mục đích sử dụng trong lĩnh vực văn phòng', 'sp7.webp', 999, 'sotay'),
(100, 'but', 'Màu Sắc Bút Đánh Dấu Hai Đầu Màu Graffiti ', '20', 'Đặc điểm kỹ thuật:\r\nLoại: Bút màu nước hai đầu\r\nChiều dài: 15cm\r\nChất liệu: Nhựa\r\nMàu sắc: 1 Bộ có 6 màu', 'Đặc điểm kỹ thuật:\r\nLoại: Bút màu nước hai đầu\r\nChiều dài: 15cm\r\nChất liệu: Nhựa\r\nMàu sắc: 1 Bộ có 6 màu', 'sp14.webp', 123, 'but'),
(101, 'biakep', 'Bìa kẹp tài liệu thương hiệu Helix đến từ Anh Quốc', '20', '- Loại bìa: Bìa kẹp\r\n\r\n- Dùng để kẹp tài liệu, hồ sơ...\r\n\r\n- Sản phẩm của thương hiệu Helix đến từ Anh Quốc\r\n\r\n- Làm từ chất liệu PP chắc chắn, chịu va đập cao.\r\n\r\n- Có kẹp giấy cứng cáp, giúp giữ giấy tờ luôn gọn gàng, thẳng nếp.\r\n\r\n- Màu sắc tươi sáng, chống thấm nước, không bám bụi bẩn, dễ lau ch', '- Loại bìa: Bìa kẹp\r\n\r\n- Dùng để kẹp tài liệu, hồ sơ...\r\n\r\n- Sản phẩm của thương hiệu Helix đến từ Anh Quốc\r\n\r\n- Làm từ chất liệu PP chắc chắn, chịu va đập cao.\r\n\r\n- Có kẹp giấy cứng cáp, giúp giữ giấy tờ luôn gọn gàng, thẳng nếp.\r\n\r\n- Màu sắc tươi sáng, chống thấm nước, không bám bụi bẩn, dễ lau ch', 'sp9.webp', 999, 'biakep'),
(102, 'Máy tính', 'Máy Tính Mini Gấu Bỏ Túi Dễ Thương', '20', 'Thông tin sản phẩm: Máy tính\r\n-  Chất liệu: Nhựa\r\n-  Kích thước : 6.5 x 9.5cm\r\n-  Màu Sắc Nhiều Màu được lựa chọn\r\n-  Hoạ Tiết Hình Gấu Dễ Thương\r\nLƯU Ý : MÁY TÍNH ĐỂ IM TỰ TẮT SAU 5-10PHÚT NHA CÁC BẠN !!!\r\n\r\n-  Phụ kiện Văn phòng phẩm không thể thiếu với các bạn học sinh, sinh viên, công sở trong v', 'Thông tin sản phẩm: Máy tính\r\n-  Chất liệu: Nhựa\r\n-  Kích thước : 6.5 x 9.5cm\r\n-  Màu Sắc Nhiều Màu được lựa chọn\r\n-  Hoạ Tiết Hình Gấu Dễ Thương\r\nLƯU Ý : MÁY TÍNH ĐỂ IM TỰ TẮT SAU 5-10PHÚT NHA CÁC BẠN !!!\r\n\r\n-  Phụ kiện Văn phòng phẩm không thể thiếu với các bạn học sinh, sinh viên, công sở trong v', 'sp6.webp', 999, 'maytinh'),
(103, 'Vở', 'Vở viết kẻ ngang nhiều hình siêu ngộ nghĩnh', '20', '???????????? SỔ VỞ ĐÁNG YÊU - HỌC TẬP THÊM PHIÊUUUUU ????????????\r\n\r\n✔Size: Khổ A5( 20,7cm * 14cm) gồm 120 trang giấy dày dặn \r\n✔ Chất liệu: giấy chống lóa mắt cao cấp, không gây mỏi mắt khi nhìn lâu\r\n✔Bìa của quyển sổ/vở là bìa giấy cứng cáp, chắc chắn. Đặc biệt được in hình thù siêu dễ thương kết ', '???????????? SỔ VỞ ĐÁNG YÊU - HỌC TẬP THÊM PHIÊUUUUU ????????????\r\n\r\n✔Size: Khổ A5( 20,7cm * 14cm) gồm 120 trang giấy dày dặn \r\n✔ Chất liệu: giấy chống lóa mắt cao cấp, không gây mỏi mắt khi nhìn lâu\r\n✔Bìa của quyển sổ/vở là bìa giấy cứng cáp, chắc chắn. Đặc biệt được in hình thù siêu dễ thương kết ', 'sp10-4.webp', 999, 'Vo');

-- --------------------------------------------------------

--
-- Table structure for table `trangthaidonhang`
--

CREATE TABLE `trangthaidonhang` (
  `donhang_trangthai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(25) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `pass`, `email`, `address`, `role`) VALUES
('admin', '$2y$10$/lM3mo1pmEhbxmfr5ZfUjuJWuh4keFkmS0JNUSGD0O6aB0b5FWDyO', 'anhtustyle2003@gmail.com', 'Ha Noi', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`donhang_ma`),
  ADD KEY `sp_ma` (`sp_ma`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`loaisanpham`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sp_ma`),
  ADD KEY `fk_loaisanpham` (`loaisanpham`);

--
-- Indexes for table `trangthaidonhang`
--
ALTER TABLE `trangthaidonhang`
  ADD PRIMARY KEY (`donhang_trangthai`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `donhang_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sp_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`name`) REFERENCES `users` (`name`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_loaisanpham` FOREIGN KEY (`loaisanpham`) REFERENCES `loaisp` (`loaisanpham`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
