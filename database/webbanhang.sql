-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2024 at 04:19 AM
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

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`donhang_ma`, `sp_ma`, `name`, `timeorder`, `donhang_trangthai`, `donhang_gia`, `donhang_soluongsp`) VALUES
(9, 101, 'admin', '2024-09-24', 'Đã hủy', '50000', 1),
(10, 101, 'admin', '2024-09-24', 'Đã hủy', '50000', 1),
(11, 101, 'admin', '2024-09-24', 'Đã hủy', '50000', 1),
(12, 101, 'admin', '2024-09-24', 'Đã hủy', '50000', 1),
(13, 101, 'admin', '2024-09-24', 'Đã hủy', '50000', 1),
(14, 101, 'admin', '2024-09-24', 'Đã hủy', '50000', 1),
(15, 101, 'admin', '2024-09-24', 'Đã hủy', '50000', 1),
(16, 101, 'admin', '2024-09-24', 'Đã hủy', '50000', 1),
(17, 102, 'admin', '2024-09-24', 'Đã hủy', '100000', 1),
(18, 100, 'admin', '2024-09-26', 'Đang chờ', '40000', 1),
(19, 100, 'admin', '2024-09-26', 'Đang chờ', '40000', 1),
(20, 101, 'admin', '2024-09-26', 'Đang chờ', '50000', 1),
(21, 101, 'admin', '2024-09-26', 'Đang chờ', '50000', 1);

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
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `sp_ma` int(11) NOT NULL,
  `discount_percent` decimal(5,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `sale_description` varchar(255) DEFAULT NULL,
  `is_expired` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `sp_ma`, `discount_percent`, `start_date`, `end_date`, `sale_description`, `is_expired`) VALUES
(1, 100, 70.00, '2024-01-10', '2024-10-10', '0', 1),
(4, 99, 50.00, '2024-02-10', '2024-10-10', '0', 1),
(5, 101, 20.00, '2024-02-10', '2024-10-10', '0', 1),
(6, 108, 20.00, '2024-01-10', '2024-10-10', '0', 1),
(7, 109, 20.00, '2024-02-10', '2024-10-10', '0', 1);

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
(99, 'Sổ tay', 'Sổ tay mini hoạt hình dễ thương note 32 trang', '20000', 'Sổ Tay Cá Nhân Mini/ Sổ Noted 32 Trang \r\n\r\n-  Sổ noted có 16 tờ- 32 trang.\r\n-  Kích thước cả bìa : 8.1*10.3cm được làm từ giấy chất lượng, bề mặt mịn, viết êm.\r\n-  Giấy bắt mực tốt, không gây lem, cho chữ viết rõ ràng, đẹp mắt.\r\n-  Sản phẩm phù hợp với nhiều mục đích sử dụng trong lĩnh vực văn phòng', 'Sổ Tay Cá Nhân Mini/ Sổ Noted 32 Trang \r\n\r\n-  Sổ noted có 16 tờ- 32 trang.\r\n-  Kích thước cả bìa : 8.1*10.3cm được làm từ giấy chất lượng, bề mặt mịn, viết êm.\r\n-  Giấy bắt mực tốt, không gây lem, cho chữ viết rõ ràng, đẹp mắt.\r\n-  Sản phẩm phù hợp với nhiều mục đích sử dụng trong lĩnh vực văn phòng', 'sp7.webp', 998, 'sotay'),
(100, 'Bút', 'Màu Sắc Bút Đánh Dấu Hai Đầu Màu Graffiti ', '40000', 'Đặc điểm kỹ thuật:\r\nLoại: Bút màu nước hai đầu\r\nChiều dài: 15cm\r\nChất liệu: Nhựa\r\nMàu sắc: 1 Bộ có 6 màu', 'Đặc điểm kỹ thuật:\r\nLoại: Bút màu nước hai đầu\r\nChiều dài: 15cm\r\nChất liệu: Nhựa\r\nMàu sắc: 1 Bộ có 6 màu', 'sp14.webp', 999, 'but'),
(101, 'Bìa kẹp', 'Bìa kẹp tài liệu thương hiệu Helix từ Anh Quốc', '50000', '- Loại bìa: Bìa kẹp\r\n\r\n- Dùng để kẹp tài liệu, hồ sơ...\r\n\r\n- Sản phẩm của thương hiệu Helix đến từ Anh Quốc\r\n\r\n- Làm từ chất liệu PP chắc chắn, chịu va đập cao.\r\n\r\n- Có kẹp giấy cứng cáp, giúp giữ giấy tờ luôn gọn gàng, thẳng nếp.\r\n\r\n- Màu sắc tươi sáng, chống thấm nước, không bám bụi bẩn, dễ lau ch', '- Loại bìa: Bìa kẹp\r\n\r\n- Dùng để kẹp tài liệu, hồ sơ...\r\n\r\n- Sản phẩm của thương hiệu Helix đến từ Anh Quốc\r\n\r\n- Làm từ chất liệu PP chắc chắn, chịu va đập cao.\r\n\r\n- Có kẹp giấy cứng cáp, giúp giữ giấy tờ luôn gọn gàng, thẳng nếp.\r\n\r\n- Màu sắc tươi sáng, chống thấm nước, không bám bụi bẩn, dễ lau ch', 'sp9.webp', 1007, 'biakep'),
(102, 'Máy tính', 'Máy Tính Mini Gấu Bỏ Túi Dễ Thương', '100000', 'Thông tin sản phẩm: Máy tính\r\n-  Chất liệu: Nhựa\r\n-  Kích thước : 6.5 x 9.5cm\r\n-  Màu Sắc Nhiều Màu được lựa chọn\r\n-  Hoạ Tiết Hình Gấu Dễ Thương\r\nLƯU Ý : MÁY TÍNH ĐỂ IM TỰ TẮT SAU 5-10PHÚT NHA CÁC BẠN !!!\r\n\r\n-  Phụ kiện Văn phòng phẩm không thể thiếu với các bạn học sinh, sinh viên, công sở trong v', 'Thông tin sản phẩm: Máy tính\r\n-  Chất liệu: Nhựa\r\n-  Kích thước : 6.5 x 9.5cm\r\n-  Màu Sắc Nhiều Màu được lựa chọn\r\n-  Hoạ Tiết Hình Gấu Dễ Thương\r\nLƯU Ý : MÁY TÍNH ĐỂ IM TỰ TẮT SAU 5-10PHÚT NHA CÁC BẠN !!!\r\n\r\n-  Phụ kiện Văn phòng phẩm không thể thiếu với các bạn học sinh, sinh viên, công sở trong v', 'sp6.webp', 1000, 'maytinh'),
(103, 'Vở', 'Vở viết kẻ ngang nhiều hình siêu ngộ nghĩnh', '20000', '???????????? SỔ VỞ ĐÁNG YÊU - HỌC TẬP THÊM PHIÊUUUUU ????????????\r\n\r\n✔Size: Khổ A5( 20,7cm * 14cm) gồm 120 trang giấy dày dặn \r\n✔ Chất liệu: giấy chống lóa mắt cao cấp, không gây mỏi mắt khi nhìn lâu\r\n✔Bìa của quyển sổ/vở là bìa giấy cứng cáp, chắc chắn. Đặc biệt được in hình thù siêu dễ thương kết ', '???????????? SỔ VỞ ĐÁNG YÊU - HỌC TẬP THÊM PHIÊUUUUU ????????????\r\n\r\n✔Size: Khổ A5( 20,7cm * 14cm) gồm 120 trang giấy dày dặn \r\n✔ Chất liệu: giấy chống lóa mắt cao cấp, không gây mỏi mắt khi nhìn lâu\r\n✔Bìa của quyển sổ/vở là bìa giấy cứng cáp, chắc chắn. Đặc biệt được in hình thù siêu dễ thương kết ', 'sp10-4.webp', 999, 'Vo'),
(108, 'Vở', 'Sổ tay mini hoạt hình dễ thương Cá Nhân Mini ', '29000', 'Sổ Tay Cá Nhân Mini/ Sổ Noted 32 Trang \r\n\r\n-  Sổ noted có 16 tờ- 32 trang.\r\n-  Kích thước cả bìa : 8.1*10.3cm được làm từ giấy chất lượng, bề mặt mịn, viết êm.\r\n-  Giấy bắt mực tốt, không gây lem, cho chữ viết rõ ràng, đẹp mắt.\r\n-  Sản phẩm phù hợp với nhiều mục đích sử dụng trong lĩnh vực văn phòng', 'Sổ Tay Cá Nhân Mini/ Sổ Noted 32 Trang \r\n\r\n-  Sổ noted có 16 tờ- 32 trang.\r\n-  Kích thước cả bìa : 8.1*10.3cm được làm từ giấy chất lượng, bề mặt mịn, viết êm.\r\n-  Giấy bắt mực tốt, không gây lem, cho chữ viết rõ ràng, đẹp mắt.\r\n-  Sản phẩm phù hợp với nhiều mục đích sử dụng trong lĩnh vực văn phòng', 'sp2.webp', 999, 'Vo'),
(109, 'Hộp', 'Hộp đựng văn phòng phẩm bằng nhựa  tiện dụng', '100000', 'Xuất xứ: Trung Quốc (Xuất xứ)\r\nChất liệu: Nhựa\r\nSố model: 2020082512\r\nLoại sản phẩm: Hộp đựng \r\nKích thước: 14,7cm và 17,4cm\r\nChất liệu: Nhựa\r\nMàu sắc: Trong suốt\r\nGói hàng bao gồm: 1 x Hộp đựng \r\nHỗ trợ dropshipping: có\r\nLoại sản phẩm: Hộp đựng để bàn', 'Xuất xứ: Trung Quốc (Xuất xứ)\r\nChất liệu: Nhựa\r\nSố model: 2020082512\r\nLoại sản phẩm: Hộp đựng \r\nKích thước: 14,7cm và 17,4cm\r\nChất liệu: Nhựa\r\nMàu sắc: Trong suốt\r\nGói hàng bao gồm: 1 x Hộp đựng \r\nHỗ trợ dropshipping: có\r\nLoại sản phẩm: Hộp đựng để bàn', 'sp8-3.webp', 999, 'hop'),
(110, 'Túi', 'Túi đựng đồ dùng văn phòng phẩm bằng nhựa ', '29000', 'Chất liệu: PP\r\nKích thước: 15.8 * 11.5cm\r\nMẫu sản phẩm: HL011\r\n\r\nLưu ý:\r\nSản phẩm có hàng sẵn trong kho (Hỗ trợ thanh toán tiền mặt khi nhận hàng).\r\nSản phẩm được giao từ nước ngoài.\r\nNếu bạn có bất kì vấn đề nào, xin hãy liên hệ với chúng tôi. ', 'Số lượng: 1 Cái\r\nChất liệu: PP\r\nKích thước: 15.8 * 11.5cm\r\nMẫu sản phẩm: HL011\r\n\r\nLưu ý:\r\nSản phẩm có hàng sẵn trong kho (Hỗ trợ thanh toán tiền mặt khi nhận hàng).\r\nSản phẩm được giao từ nước ngoài.\r\nNếu bạn có bất kì vấn đề nào, xin hãy liên hệ với chúng tôi. ', 'sp11-2.webp', 50, 'tui');

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
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `phone` varchar(15) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `pass`, `email`, `address`, `role`, `phone`, `avatar`) VALUES
('admin', '$2y$10$38BylH36/TxZXDJcYm13Yu6N8VcJF79p7P4RBD/NnK6zNH8mr6a8y', 'anhtustyle2003@gmail.com', 'Ha Noi 1', 1, NULL, NULL),
('admin2', '$2y$10$/dSV8rz3JOpqpBYdqH9Ureu8KHxykhjRWIvCgKLb5RfE6J/jctewi', 'anhtustyle2003@gmail.com', 'Ha Noi1', 0, NULL, NULL),
('admin4', '$2y$10$KbUY4V/Yi8ra.odfwSF8QO4vo2reA0JxhKgVFqgkl8cWbSaf9UfKy', 'duonggtk31200333@gmail.com', 'Ha Noi1', 0, NULL, NULL);

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
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `sp_ma` (`sp_ma`);

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
  MODIFY `donhang_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sp_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

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
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_loaisanpham` FOREIGN KEY (`loaisanpham`) REFERENCES `loaisp` (`loaisanpham`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
