-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2024 lúc 05:02 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thedreamteam`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `calam`
--

CREATE TABLE `calam` (
  `maCa` int(11) NOT NULL,
  `thu` int(11) NOT NULL,
  `tenCa` varchar(20) NOT NULL,
  `thoigian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `calam`
--

INSERT INTO `calam` (`maCa`, `thu`, `tenCa`, `thoigian`) VALUES
(621, 4, 'ccc', 'ccc'),
(625, 5, 'a', 'a'),
(626, 5, 'a', 'a'),
(628, 7, 'a', 'a'),
(629, 4, 'ac', 'ac'),
(0, 2, 'Bán hàng', '11h00-12h00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdontiec`
--

CREATE TABLE `chitietdontiec` (
  `MaDon` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdontiec`
--

INSERT INTO `chitietdontiec` (`MaDon`, `MaSP`) VALUES
(6762, 1),
(6763, 1),
(6765, 1),
(6759, 2),
(6760, 33),
(6761, 33),
(6764, 33);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHD` varchar(26) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `soluong` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaHD`, `MaSP`, `soluong`) VALUES
('HD67592342cbe13', 1, 1),
('HD6759269084632', 2, 3),
('HD6759269084632', 5, 4),
('HD675950298a304', 2, 1),
('HD675950298a304', 5, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsp`
--

CREATE TABLE `danhmucsp` (
  `IDLoaiSP` int(11) NOT NULL,
  `TenLoaiSP` varchar(100) NOT NULL,
  `mota` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucsp`
--

INSERT INTO `danhmucsp` (`IDLoaiSP`, `TenLoaiSP`, `mota`) VALUES
(1, 'ƯU ĐÃI', 'ưu đãi'),
(2, 'GÀ RÁN - GÀ QUAY', 'gà rán, gà quay'),
(3, 'BURGER - CƠM - MỲ Ý', 'burger, cơm, mỳ ý'),
(4, 'THỨC ĂN NHẸ', 'thức ăn nhẹ'),
(5, 'THỨC UỐNG & TRÁNG MIỆNG', 'thức uống và tráng miệng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dontiec`
--

CREATE TABLE `dontiec` (
  `MaDon` int(11) NOT NULL,
  `HoTen` varchar(40) NOT NULL,
  `SoDienThoai` varchar(40) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `SoLuongKhach` int(11) NOT NULL,
  `NgayDat` date NOT NULL,
  `GhiChu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dontiec`
--

INSERT INTO `dontiec` (`MaDon`, `HoTen`, `SoDienThoai`, `Email`, `SoLuongKhach`, `NgayDat`, `GhiChu`) VALUES
(1, 'k', '0000', 'nhanvien2@gmal.com', 3, '2024-12-03', 'lll'),
(2, 'k', '0229292', 'nhanvien2@gmal.com', 3, '2024-12-12', 'llll'),
(3, 'k', '000000', 'traudhjd@đkdk.com', 6, '2024-12-12', 'kkkk'),
(4, 'k', '102929', 'nhanvien2@gmal.com', 3, '2024-12-03', '333'),
(5, 'k', '0000', 'traudhjd@đkdk.com', 3, '2024-12-03', 'llll'),
(6, 'k', '0987', 'traudhjd@đkdk.com', 2, '2222-03-31', '3333'),
(7, 'k', '029299292', 'nhanvien2@gmal.com', 3, '2024-12-12', '12233'),
(8, 'k', '0912838', 'nhanvien2@gmal.com', 4, '2024-12-12', 'jjjjj'),
(9, 'k', '09282727227', 'nhanvien2@gmal.com', 3, '2024-12-13', 'kkkk'),
(10, '', '', '', 0, '0000-00-00', ''),
(11, '', '', '', 0, '0000-00-00', ''),
(12, 'k', '000', 'nhanvien2@gmal.com', 3, '2024-12-13', 'kkkkkk'),
(13, '', '', '', 0, '0000-00-00', ''),
(14, 'k', '0928737337', 'nhanvien2@gmal.com', 5, '2024-12-27', '2dđ'),
(15, '', '', '', 0, '2024-12-11', ''),
(16, 'k', 'jjsjjsjs', 'nhanvien2@gmal.com', 4, '2024-12-19', 'kkkkk'),
(17, '', '', '', 0, '2024-12-11', ''),
(18, 'k', 'jjsjjsjs', 'nhanvien2@gmal.com', 3, '2024-12-26', 'kkkk'),
(19, 'Lrwtwwy', '010911919', 'khoa110303@đkdk.com', 3, '2024-12-19', 'hdhdhd'),
(20, 'Lrwtwwy', 'jjsjjsjs', 'nhanvien2@gmal.com', 3, '2024-12-27', 'dlđl'),
(21, 'Lrwtwwy', '098', 'nhanvien2@gmal.com', 4, '2024-12-21', 'wwdd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` varchar(26) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL CHECK (`status` = 0 or `status` = 1),
  `MaKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `createdAt`, `status`, `MaKH`) VALUES
('HD67592342cbe13', '2024-12-11 05:29:38', 1, 1),
('HD6759269084632', '2024-12-11 05:43:44', 1, 1),
('HD675950298a304', '2024-12-11 08:41:13', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredient_ID` varchar(7) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `shelf_life` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ingredients`
--

INSERT INTO `ingredients` (`ingredient_ID`, `name`, `price`, `unit`, `shelf_life`, `image_path`) VALUES
('NVL0001', 'Rau xà lách', 110000.00, 'kg', 7, 'assets/images/ingredients/lettuce.jpg'),
('NVL0002', 'Cà chua', 12000.00, 'kg', 7, 'assets/images/ingredients/tomato.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `Username`, `Password`, `SDT`, `Email`, `DiaChi`) VALUES
(1, 'Hồ Văn A', 'khachhang', '123', '034356372', 'khachhang123@gmal.com', 'Phú Yen'),
(2, 'Lê Quang Khoa', 'quangkhoa11', '123', '0986356372', 'khoa110303@gmail.com', 'Bình Định'),
(3, 'Nguyễn Công Hiến', 'conghien', '123', '0912347283', 'conghien@gmail.com', 'TP.HCM'),
(4, 'Trần Chính', 'tranchinh', '123', '0927348291', 'tranchinh@gmail.com', 'TP.HCM'),
(5, 'Dương Đức Quý', 'ducquy', '123', '0972634738', 'ducquy1234@gmail.com', 'Hà Nội'),
(6, 'Lê Tuấn Khang', 'tuankhang123', '123', '0928475839', 'tuankhanf@gmail.com', 'Hải Phòng'),
(7, 'Trịnh Trần Phương Tuấn', 'jack97', '123', '0972536721', 'j97@gmail.com', 'Bến Tre'),
(8, 'Hà Anh Tuấn', 'anhtuan', '123', '0983647384', 'haanhtuan@gmail.com', 'Bình Dương'),
(9, 'Nguyễn Trường Giang', 'truonggiang', '123', '0937463273', 'truonggiangk17iuh@gmail.com', 'TP.HCM'),
(10, 'Mỹ Duyên', 'myduyen12', 'Duyen*1234', '0374839234', 'myduyen@gmail.com', 'Đà Nẵng'),
(11, 'Lê Văn B', 'vanb12736', 'Vanb12345*', '0921117267', 'traudhjd@đkdk.com', 'Bình Dương'),
(12, 'Lê Quang Ka', 'quangkhoa23344', '12345', '0998883432', 'nhanvien2@gmal.com', 'Quận888'),
(13, 'ss$', 'quangkhoa222222222', '2222', '0981501410', 'nhanvien2@gmal.com', 'Bình Định'),
(14, 'Khoa', 'quangkhoabinhdinh', 'Khoa1234*', '0981501410', 'traudhjd@đkdk.com', 'Bình Dương');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainv`
--

CREATE TABLE `loainv` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loainv`
--

INSERT INTO `loainv` (`MaLoai`, `TenLoai`) VALUES
(1, 'Quản lý'),
(2, 'Nhân viên bán hàng'),
(3, 'Nhân viên bếp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(11) NOT NULL,
  `TenNV` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `MaLoai` int(11) DEFAULT NULL,
  `SDT` varchar(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `Username`, `Password`, `MaLoai`, `SDT`, `Email`, `DiaChi`) VALUES
(1, 'Quản Lý Dream', 'quanly1', '123', 1, '0986356372', 'quanlydream@gmal.com', '13 Nguyễn Văn Linh, phường 3, quận 7, TP.HCM'),
(4, 'Nguyễn Văn A', 'nhanvienbanhang', '123', 2, '0346356372', 'nhanvien@gmal.com', '26 Nguyễn Văn Linh, phường 3, quận 7, TP.HCM'),
(5, 'Nhân viên Bếp', 'nhanvienbep', '123', 3, '0986356372', 'quanlydream@gmal.com', '13 Nguyễn Văn Linh, phường 3, quận 7, TP.HCM'),
(6, 'Lê Quang Khoa', 'nv6', '123', 2, '11111111111', 'jjhhhjkk', 'Bình Định'),
(7, 'Đức Quý', 'nv7', '123', 3, '0378930081', 'nhanvien2@gmal.com', 'Bình Dương'),
(8, 'Khoa', 'nv8', '123', 2, '0981501410', 'nhanvien2@gmal.com', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_ID` varchar(6) NOT NULL,
  `order_date` date NOT NULL DEFAULT curdate(),
  `status` varchar(20) NOT NULL,
  `completion_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_ID`, `order_date`, `status`, `completion_date`) VALUES
('DH0001', '2024-11-01', 'Hoàn thành', '2024-11-05'),
('DH0002', '2024-11-02', 'Đang giao hàng', NULL),
('DH0003', '2024-11-03', 'Chờ xử lý', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `item_ID` int(11) NOT NULL,
  `order_ID` varchar(6) DEFAULT NULL,
  `ingredient_ID` varchar(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`item_ID`, `order_ID`, `ingredient_ID`, `name`, `quantity`) VALUES
(1, 'DH0001', 'NVL0001', 'Rau xà lách', 10),
(2, 'DH0001', 'NVL0002', 'Cà chua', 5),
(3, 'DH0002', 'NVL0001', 'Rau xà lách', 10),
(4, 'DH0002', 'NVL0002', 'Cà chua', 5),
(5, 'DH0003', 'NVL0001', 'Rau xà lách', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `IDLoaiSP` int(11) NOT NULL,
  `TenSP` varchar(100) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `dongia` int(11) NOT NULL,
  `MotaSP` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `IDLoaiSP`, `TenSP`, `img`, `dongia`, `MotaSP`) VALUES
(1, 1, 'Combo Cơm & Gà Rán', 'Combo Cơm & Gà Rán.png', 59000, '1 Cơm + 1 Gà Rán + 1 Pepsi'),
(2, 1, 'Combo Cơm & Gà Rán', 'Combo Cơm & Gà Rán.png', 69000, '3 Miếng Gà Rán + 2 Pepsi + 1 Gà Viên Vừa + 1 Khoai...'),
(3, 1, 'Combo Cơm & Gà Rán', 'Combo Cơm & Gà Rán.png', 89000, '3 Miếng Gà Rán + 3 Pepsi + 1 Mỳ ý'),
(4, 1, 'Combo Cơm & Gà Rán', 'Combo Cơm & Gà Rán.png', 69000, '1 Miếng Gà Rán + 1 Pepsi + 1 Burger'),
(5, 2, '1 Miếng Gà Rán', '1 Miếng Gà Rán.png', 35000, '1 Miếng Gà Giòn Cay/Gà Truyền Thống/Gà Giòn Không ...'),
(6, 2, '1 Miếng Gà Rán', '1 Miếng Gà Rán.png', 39000, '1 Miếng Phi-lê Gà Quay Flava/Phi-lê Gà Quay Tiêu'),
(7, 2, '3 Gà Rán Tenders Vị Nguyên Bản', '3 Gà Rán Tenders Vị Nguyên Bản.png', 41000, '3 Gà Rán Tenders Vị Nguyên Bản'),
(8, 2, '3 Miếng Gà Rán', '3 Miếng Gà Rán.png', 104000, '3 Miếng Gà Giòn Cay/Gà Truyền Thống/Gà Giòn Không ...'),
(9, 2, '5 Gà Rán Tenders Vị Nguyên Bản', '5 Gà Rán Tenders Vị Nguyên Bản.png', 66000, '01 Cơm Gà Viên Nanban + 01 Miếng Gà Rán + 01 Pepsi...'),
(10, 3, 'Burger Bánh Mì HDA', 'Burger Bánh Mì HDA.png', 77000, '1 Burger Bánh Mì + 1 Khoai Tây Chiên (vừa) + 1 Lon...'),
(11, 3, 'Burger Bánh Mì HDb', 'Burger Bánh Mì HDB.png', 189000, '2 Burger Bánh Mì + 2 Miếng Gà Rán + 2 Lon Pepsi'),
(12, 3, 'Cơm Gà Rán', 'Cơm Gà Rán.png', 48000, '1 Cơm Gà Rán'),
(13, 3, 'Cơm Gà Viên Nanban', 'Cơm Gà Viên Nanban.png', 39000, '01 Cơm Gà Viên Nanban'),
(14, 3, 'Combo Cơm Gà Viên Nanban HDA', 'Combo Cơm Gà Viên Nanban HDA.png', 86000, '01 Cơm Gà Viên Nanban + 01 Miếng Gà Rán + 01 Pepsi...'),
(15, 3, 'Combo Cơm Gà Viên Nanban HDB', 'Combo Cơm Gà Viên Nanban HDB.png', 189000, '01 Cơm Gà Viên Nanban + 03 Miếng Gà Rán + 01 Khoai...'),
(16, 3, 'Mì Ý Gà Viên', 'Mì Ý Gà Viên.jpg', 40000, '1 Mì Ý Gà Viên'),
(17, 3, 'Mì Ý Gà Viên', 'Mì Ý Gà Viên.jpg', 58000, '1 Mì Ý Gà Zinger'),
(18, 4, '3 Cá Thanh', '3 Cá Thanh.png', 40000, '3 Cá Thanh'),
(19, 4, '4 Phô Mai Viên', '4 Phô Mai Viên.jpg', 36000, '4 Phô Mai Viên'),
(20, 4, 'Bắp Cải Trộn (Vừa)', 'Bắp Cải Trộn (Vừa).jpg', 12000, 'Bắp Cải Trộn (Vừa)'),
(21, 4, 'Khoai Tây Chiên (Vừa)', 'Khoai Tây Chiên (Vừa).jpg', 12000, 'Khoai Tây Chiên (Vừa)'),
(22, 4, 'Khoai Tây Nghiền (Vừa)', 'Khoai Tây Nghiền (Vừa).png', 12000, 'Khoai Tây Nghiền (Vừa)'),
(23, 4, 'Salad Hạt', 'Salad Hạt.jpg', 38000, '1 Salad Hạt'),
(24, 4, 'Súp Rong Biển', 'Súp Rong Biển.png', 12000, 'Súp Rong Biển'),
(25, 5, '1 Bánh Trứng', '1 Bánh Trứng.png', 18000, '1 Bánh Trứng'),
(26, 5, '2 Thanh Bí Phô Mai', '2 Thanh Bí Phô Mai.png', 29000, '2 Thanh Bí Phô Mai'),
(27, 5, '2 Viên Khoai Môn Kim Sa', '2 Viên Khoai Môn Kim Sa.png', 26000, '2 Viên Khoai Môn Kim Sa'),
(28, 5, '1 Sô-cô-la Sữa Đá', '1 Sô-cô-la Sữa Đá.jpg', 20000, '1 Sô-cô-la Sữa Đá'),
(29, 5, '7Up', '7Up.jpg', 19000, '7Up lon'),
(30, 5, 'Aquafina 500ml', 'Aquafina 500ml.png', 15000, 'Aquafina 500ml'),
(31, 5, 'Lon Sting', 'Lon Sting.png', 19000, 'Lon Sting'),
(32, 5, 'Pepsi Không Calo', 'Pepsi Không Calo.jpg', 19000, 'Pepsi Không Calo lon'),
(33, 5, 'Pepsi', 'Pepsi.jpg', 19000, 'Pepsi lon'),
(34, 5, 'Trà Chanh Lipton (Vừa)', 'Trà Chanh Lipton (Vừa).png', 12000, 'Trà Chanh Lipton (Vừa)');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stock`
--

CREATE TABLE `stock` (
  `ingredient_ID` varchar(7) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `stock`
--

INSERT INTO `stock` (`ingredient_ID`, `name`, `stock`, `expiry_date`) VALUES
('NVL0001', 'Cà chua', 5, '2024-10-15'),
('NVL0002', 'Rau xà lách', 3, '2024-11-10'),
('NVL0001', 'Cà chua', 7, '2024-12-20');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdontiec`
--
ALTER TABLE `chitietdontiec`
  ADD PRIMARY KEY (`MaDon`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaHD`,`MaSP`);

--
-- Chỉ mục cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  ADD PRIMARY KEY (`IDLoaiSP`);

--
-- Chỉ mục cho bảng `dontiec`
--
ALTER TABLE `dontiec`
  ADD PRIMARY KEY (`MaDon`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `MaKH` (`MaKH`);

--
-- Chỉ mục cho bảng `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredient_ID`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Chỉ mục cho bảng `loainv`
--
ALTER TABLE `loainv`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `MaLoai` (`MaLoai`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_ID`),
  ADD KEY `order_ID` (`order_ID`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `IDLoaiSP` (`IDLoaiSP`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdontiec`
--
ALTER TABLE `chitietdontiec`
  MODIFY `MaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6766;

--
-- AUTO_INCREMENT cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  MODIFY `IDLoaiSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `dontiec`
--
ALTER TABLE `dontiec`
  MODIFY `MaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `loainv`
--
ALTER TABLE `loainv`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdontiec`
--
ALTER TABLE `chitietdontiec`
  ADD CONSTRAINT `chitietdontiec_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loainv` (`MaLoai`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`IDLoaiSP`) REFERENCES `danhmucsp` (`IDLoaiSP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
