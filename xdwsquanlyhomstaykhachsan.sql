-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2024 lúc 03:52 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `xdwsquanlyhomstaykhachsan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_thiet_bi`
--

CREATE TABLE `chi_tiet_thiet_bi` (
  `ma_cttb` int(11) NOT NULL,
  `ma_phong` int(11) NOT NULL,
  `ma_thiet_bi` int(11) NOT NULL,
  `so_luong_trong_phong` int(11) NOT NULL,
  `tinh_trang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_thiet_bi`
--

INSERT INTO `chi_tiet_thiet_bi` (`ma_cttb`, `ma_phong`, `ma_thiet_bi`, `so_luong_trong_phong`, `tinh_trang`) VALUES
(1, 1, 1, 1, 'Đang sử dụng'),
(2, 2, 1, 1, 'Đang sử dụng'),
(5, 3, 1, 1, 'Đang sử dụng'),
(6, 4, 1, 1, 'Đang sử dụng'),
(7, 5, 1, 1, 'Đang sử dụng'),
(8, 6, 1, 1, 'Đang sử dụng'),
(9, 7, 1, 1, 'Đang sử dụng'),
(10, 8, 1, 1, 'Đang sử dụng'),
(11, 9, 1, 1, 'Đang sử dụng'),
(12, 32, 1, 1, 'Đang sử dụng'),
(13, 10, 1, 1, 'Đang sử dụng'),
(14, 11, 1, 1, 'Đang sử dụng'),
(15, 12, 1, 1, 'Đang sử dụng'),
(16, 13, 1, 1, 'Đang sửa chữa'),
(17, 14, 1, 1, 'Đang sử dụng'),
(18, 15, 1, 1, 'Đang sử dụng'),
(19, 16, 1, 1, 'Đang sử dụng'),
(20, 17, 1, 1, 'Đang sử dụng'),
(21, 18, 1, 1, 'Đang sử dụng'),
(22, 19, 1, 1, 'Đang sử dụng'),
(23, 20, 1, 1, 'Đang sử dụng'),
(24, 21, 2, 1, 'Đang sử dụng'),
(25, 22, 2, 1, 'Đang sử dụng'),
(26, 23, 2, 1, 'Đang sử dụng'),
(27, 24, 2, 1, 'Đang sử dụng'),
(28, 1, 3, 1, 'Đang sử dụng'),
(29, 2, 3, 1, 'Đang sử dụng'),
(30, 3, 3, 1, 'Đang sử dụng'),
(31, 4, 3, 1, 'Đang sử dụng'),
(32, 5, 3, 1, 'Đang sử dụng'),
(33, 6, 3, 1, 'Đang sử dụng'),
(34, 8, 3, 1, 'Đang sử dụng'),
(35, 7, 3, 1, 'Đang sử dụng'),
(36, 9, 3, 1, 'Đang sử dụng'),
(37, 32, 3, 1, 'Đang sử dụng'),
(38, 10, 3, 1, 'Đang sử dụng'),
(39, 11, 3, 1, 'Đang sử dụng'),
(40, 12, 3, 1, 'Đang sử dụng'),
(41, 13, 3, 1, 'Đang sử dụng'),
(42, 14, 3, 1, 'Đang sử dụng'),
(43, 15, 3, 1, 'Đang sử dụng'),
(44, 16, 3, 1, 'Đang sử dụng'),
(45, 17, 3, 1, 'Đang sử dụng'),
(46, 18, 3, 1, 'Đang sử dụng'),
(47, 19, 3, 1, 'Đang sử dụng'),
(48, 20, 3, 1, 'Đang sử dụng'),
(49, 21, 10, 1, 'Đang sử dụng'),
(50, 22, 10, 1, 'Đang sử dụng'),
(51, 23, 10, 1, 'Đang sử dụng'),
(52, 24, 10, 1, 'Đang sử dụng'),
(53, 1, 4, 1, 'Đang sử dụng'),
(54, 2, 4, 1, 'Đang sử dụng'),
(55, 1, 6, 1, 'Đang sử dụng'),
(56, 1, 7, 1, 'Đang sử dụng'),
(57, 1, 9, 1, 'Đang sử dụng'),
(58, 13, 13, 1, 'Đang sử dụng'),
(59, 13, 1, 0, 'Đang sử dụng'),
(60, 1, 1, 12, 'Đang sử dụng'),
(61, 1, 1, 3, 'Đang sử dụng'),
(62, 1, 1, 4, 'Đang sử dụng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_vat_tu`
--

CREATE TABLE `chi_tiet_vat_tu` (
  `ma_ctvt` int(11) NOT NULL,
  `ma_phong` int(11) NOT NULL,
  `ma_vat_tu` int(11) NOT NULL,
  `so_luong_trong_phong` int(11) NOT NULL,
  `tinh_trang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_vat_tu`
--

INSERT INTO `chi_tiet_vat_tu` (`ma_ctvt`, `ma_phong`, `ma_vat_tu`, `so_luong_trong_phong`, `tinh_trang`) VALUES
(1, 1, 1, 2, 'Đang sử dụng'),
(2, 1, 2, 2, 'Đang sử dụng'),
(3, 1, 3, 1, 'Đang sử dụng'),
(4, 2, 1, 2, 'Đang sử dụng'),
(5, 3, 1, 2, 'Đang sử dụng'),
(6, 4, 1, 2, 'Đang sử dụng'),
(7, 5, 1, 2, 'Đang sử dụng'),
(8, 6, 1, 2, 'Đang sử dụng'),
(9, 1, 6, 1, 'Đang sử dụng'),
(10, 1, 7, 1, 'Đang sử dụng'),
(11, 1, 5, 1, 'Đang sử dụng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `ma_danh_gia` int(11) NOT NULL,
  `ma_loai` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ngay_danh_gia` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anh`
--

CREATE TABLE `hinh_anh` (
  `ma_ha` int(11) NOT NULL,
  `hinh_anh` text NOT NULL,
  `ma_loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_anh`
--

INSERT INTO `hinh_anh` (`ma_ha`, `hinh_anh`, `ma_loai`) VALUES
(18, './anhtin/family-twin.jpg', 4),
(19, './anhtin/family-twin1.jpg', 4),
(20, './anhtin/family-twin2.jpg', 4),
(21, './anhtin/family-twin3.jpg', 4),
(22, './anhtin/suite-king.jpg', 3),
(23, './anhtin/suite-king2.jpg', 3),
(24, './anhtin/suite-double1.jpg', 2),
(25, './anhtin/suite-double2.jpg', 2),
(26, './anhtin/suite-double3.jpg', 2),
(27, './anhtin/royal3.jpg', 5),
(28, './anhtin/royal2.jpg', 5),
(29, './anhtin/royal1.jpg', 5),
(30, './anhtin/royal.jpg', 5),
(31, './anhtin/deluxe-twin.jpg', 1),
(32, './anhtin/dulex-twin1.jpg', 1),
(33, './anhtin/dulex-twin2.jpg', 1),
(34, './anhtin/dulex-twin3.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_hoa_don` int(11) NOT NULL,
  `ma_o` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ma_nv` int(11) NOT NULL,
  `ngay_lap_hoa_don` varchar(20) NOT NULL,
  `thanh_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`ma_hoa_don`, `ma_o`, `ma_kh`, `ma_nv`, `ngay_lap_hoa_don`, `thanh_tien`) VALUES
(6, 56, 8, 1, '2024-07-06 20:39:36', 3396000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` int(11) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `gioi_tinh` varchar(20) NOT NULL,
  `cccd` varchar(12) NOT NULL,
  `sdtkh` varchar(10) NOT NULL,
  `emailkh` varchar(50) NOT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `matkhaukh` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `ho_ten`, `gioi_tinh`, `cccd`, `sdtkh`, `emailkh`, `dia_chi`, `matkhaukh`) VALUES
(1, 'Nguyễn Thị Mỹ Yến', 'Nữ', '084302004489', '0369993018', 'myyen@gmail.com', 'Trà Cú', '123'),
(2, 'Lê Dương Nhựt Thoại', 'Nam', '335037912', '0362067488', 'leduongnhutthoai@gmail.com', '72/9A Khóm 4 phường 1, Thành phố Trà Vinh', '1234'),
(7, 'Phạm Quyển Đình', 'Nữ', '084302004477', '0978756676', 'phamdinh@gmail.com', 'Hoà Minh, Châu Thành', '123'),
(8, 'Lê Thị Hiếu Thảo ', 'Nữ', '084301000398', '0866475515', 'hieuthao@gmail.com', '73/2 Phạm Ngũ Lão, Khóm 3 phường 2, Thành phố Trà Vinh', '123'),
(9, 'Nguyễn Thanh Trúc', 'Nữ', '084302000464', '0564520610', 'thanhtrucn35@gmail.com', 'Khóm 3 phường 5, đường D5, Thành phố Trà Vinh', '123'),
(25, 'Nguyễn Thị Huỳnh Anh', 'Nữ', '084302000171', '0565498884', 'wynanh@gmail.com', '', ''),
(26, 's', 'Nam', 's', 's', 'admin', 's', '1911'),
(27, 's', 'Nam', '353535', 's', 'admin', '', ''),
(28, 'ssd', 'Nam', 'sdsd', 'sđs', 'sđssd', '', ''),
(29, 'Dương', 'Nam', '0012', '02424', 'nguyen@gmail.com', '242424', '1234'),
(30, 'Dương Minh Đức', 'Nam', '', '', 'admin123', 'Hà Nội', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_phong`
--

CREATE TABLE `loai_phong` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(100) NOT NULL,
  `anh_loai_phong` text NOT NULL,
  `dien_tich` varchar(20) NOT NULL,
  `chi_tiet_phong` varchar(100) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia_phong` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_phong`
--

INSERT INTO `loai_phong` (`ma_loai`, `ten_loai`, `anh_loai_phong`, `dien_tich`, `chi_tiet_phong`, `so_luong`, `gia_phong`) VALUES
(1, 'DELUXE TWIN', './anhtin/deluxe-twin.jpg', '35-36m2', '2 người lớn, 2 giường đơn', 10, '590000'),
(2, 'SUITE DOUBLE', './anhtin/suite-double.jpg', '31-32m2', '2 người lớn, giường đôi', 5, '590000'),
(3, 'SUITE KING', './anhtin/suite-king.jpg', '31-32m2', '2 người lớn, giường đôi', 6, '690000'),
(4, 'FAMILY TWIN WINDOW', './anhtin/family-twin.jpg', '35-36m2', '2 người lớn, 2 giường đơn', 1, '890000'),
(5, 'ROYAL THE ROSE', './anhtin/royal.jpg', '35-36m2', '2 người lớn, 2 giường đơn', 3, '1190000'),
(17, '1223', './anhtin/Chưa có tên (273 × 220 px) (200 × 220 px).png', '31-32m2', '2 người lớn, 2 giường đơn', 1, '21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log`
--

CREATE TABLE `log` (
  `ma_log` int(11) NOT NULL,
  `ma_nv` int(11) NOT NULL,
  `hanh_dong` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngay` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `log`
--

INSERT INTO `log` (`ma_log`, `ma_nv`, `hanh_dong`, `ngay`) VALUES
(1, 4, 'Thêm nhân viên mới: Mã 7, Họ tên Huyền Anh, Giới tính Nữ, CCCD 001203030606, Ngày sinh 19/11/2003, SĐT 0868940706, Địa chỉ Hà Nội, Tài khoản huyenanh123, Tình trạng Ngưng', '2024-09-24 17:39:45'),
(2, 4, 'Thêm loại phòng mới: Mã 17, Tên 1223, Diện tích 31-32m2, Chi tiết phòng 2 người lớn, 2 giường đơn, Số lượng 1, Giá phòng 21', '2024-09-24 18:09:55'),
(3, 1, 'Thêm vật tư mới: 12, tổng số lượng: , số lượng sử dụng: , số lượng tồn: ', '2024-09-25 01:40:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `ma_nv` int(11) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `gioi_tinh` varchar(20) NOT NULL,
  `cccd` varchar(50) NOT NULL,
  `ngay_sinh` varchar(20) NOT NULL,
  `sdtnv` varchar(255) NOT NULL,
  `dia_chi` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `quyen` int(11) NOT NULL,
  `tinh_trang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`ma_nv`, `ho_ten`, `gioi_tinh`, `cccd`, `ngay_sinh`, `sdtnv`, `dia_chi`, `user`, `pass`, `quyen`, `tinh_trang`) VALUES
(1, 'Nguyễn Thị Cẩm Xuyên', 'Nam', '084302004430', '21/01/2001', '0768894581', 'Số 39, Tân Định, Đại Phúc, Càng Long Trà Vinh', 'xuyennguyen@gmail.com', '123', 0, 'Hoạt động'),
(2, 'Huỳnh Thanh Ngân', 'Nữ', '084302000305', '14/08/2002', '0523135960', 'Khóm 3 phường 5, D5, Thành phố Trà Vinh', 'Thngan1407@gmail.com', '123', 0, 'Hoạt động'),
(4, 'Nguyễn Trúc Linh', 'Nữ', '084302004640', '05/03/2003', '0817740610', 'Khóm 3 phường 5, đường 5, Thành phố Trà Vinh', 'linhnguyen@gmail.com', '123', 1, 'Hoạt động'),
(5, 'Dương', 'Nam', '23', '19/11/2003', '0868940706', '2', 'admin123', '19112003', 0, 'Ngưng'),
(6, 'Dương', 'Nam', '23', '19/11/2003', '0868940706', '2', 'admin123', '19112003', 0, 'Hoạt động');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `o`
--

CREATE TABLE `o` (
  `ma_o` int(11) NOT NULL,
  `ma_phieu_dat` int(11) NOT NULL,
  `ma_loai` int(11) NOT NULL,
  `ma_phong` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ma_nv` int(11) NOT NULL,
  `ngay_den` varchar(20) NOT NULL,
  `thoi_gian_den` varchar(20) NOT NULL,
  `ngay_di` varchar(20) NOT NULL,
  `thoi_gian_di` varchar(20) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `so_tien_da_coc` int(11) NOT NULL,
  `tong_so_tien_can_tra` int(11) NOT NULL,
  `so_tien_thuc_nhan` int(11) DEFAULT NULL,
  `tinh_trang` varchar(50) NOT NULL,
  `phu_thu_den_truoc` varchar(255) DEFAULT NULL,
  `so_tien_phu_thu_den_truoc` int(11) DEFAULT NULL,
  `phu_thu_den_sau` varchar(255) DEFAULT NULL,
  `so_tien_phu_thu_den_sau` int(11) DEFAULT NULL,
  `gia_han_phong` varchar(255) DEFAULT NULL,
  `so_tien_gia_han_phong` int(11) DEFAULT NULL,
  `chi_phi_phat_sinh` int(11) NOT NULL,
  `ghi_chu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `o`
--

INSERT INTO `o` (`ma_o`, `ma_phieu_dat`, `ma_loai`, `ma_phong`, `ma_kh`, `ma_nv`, `ngay_den`, `thoi_gian_den`, `ngay_di`, `thoi_gian_di`, `tong_tien`, `so_tien_da_coc`, `tong_so_tien_can_tra`, `so_tien_thuc_nhan`, `tinh_trang`, `phu_thu_den_truoc`, `so_tien_phu_thu_den_truoc`, `phu_thu_den_sau`, `so_tien_phu_thu_den_sau`, `gia_han_phong`, `so_tien_gia_han_phong`, `chi_phi_phat_sinh`, `ghi_chu`) VALUES
(56, 37, 3, 19, 8, 1, '12/7/2024', '08:00', '20/7/2024', '', 6226000, 2830000, 3396000, 0, 'Đã trả phòng', '6h00 - 9h00', 0, '', 0, '0', 0, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieu_dat`
--

CREATE TABLE `phieu_dat` (
  `ma_phieu_dat` int(11) NOT NULL,
  `ma_kh` int(11) DEFAULT NULL,
  `ma_loai` int(11) NOT NULL,
  `ma_nv` int(11) DEFAULT NULL,
  `ngay_dat` varchar(20) NOT NULL,
  `ngay_nhan` varchar(20) NOT NULL,
  `ngay_tra` varchar(20) NOT NULL,
  `so_luong_nguoi_lon` int(11) NOT NULL,
  `so_luong_tre_em` int(11) NOT NULL,
  `so_luong_tre_em_tren_6` int(11) DEFAULT NULL,
  `so_luong_tre_em_duoi_6` int(11) DEFAULT NULL,
  `phu_thu_tre_em` int(11) DEFAULT NULL,
  `so_luong_phong_dat` int(11) NOT NULL,
  `tien_coc` varchar(20) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `trang_thai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieu_dat`
--

INSERT INTO `phieu_dat` (`ma_phieu_dat`, `ma_kh`, `ma_loai`, `ma_nv`, `ngay_dat`, `ngay_nhan`, `ngay_tra`, `so_luong_nguoi_lon`, `so_luong_tre_em`, `so_luong_tre_em_tren_6`, `so_luong_tre_em_duoi_6`, `phu_thu_tre_em`, `so_luong_phong_dat`, `tien_coc`, `tong_tien`, `trang_thai`) VALUES
(37, 8, 3, 1, '2024-07-06', '2024-07-12', '2024-07-20', 2, 3, 2, 1, 140000, 1, '2830000', 5660000, 'Đã trả phòng'),
(38, 27, 3, 4, '2024-09-22', '2024-09-25', '2024-09-30', 1, 3, 1, 2, 70000, 1, '1760000', 3520000, 'Đã trả phòng'),
(39, 28, 5, 4, '2024-09-22', '2024-10-01', '2024-10-01', 3, 4, 2, 2, 140000, 2, '1260000', 2520000, 'Đã trả phòng'),
(40, 29, 2, 4, '2024-09-22', '2024-09-23', '2024-09-25', 4, 0, 0, 0, 0, 1, '590000', 1180000, 'Đã trả phòng'),
(41, 30, 1, 1, '2024-09-24', '2024-09-26', '2024-09-28', 3, 5, 3, 2, 210000, 2, '1285000', 2570000, 'Đã hủy phòng'),
(42, 30, 4, 4, '2024-09-24', '2024-09-24', '2024-09-25', 2, 6, 3, 3, 210000, 1, '550000', 1100000, 'Đã trả phòng'),
(43, 30, 3, NULL, '2024-09-25', '2024-09-25', '2024-09-28', 2, 2, 1, 1, 70000, 1, '1070000', 2140000, 'Đã hủy phòng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `ma_phong` int(11) NOT NULL,
  `ma_loai` int(11) NOT NULL,
  `ten_phong` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`ma_phong`, `ma_loai`, `ten_phong`) VALUES
(1, 1, 'Phòng 103'),
(2, 1, 'Phòng 104'),
(3, 1, 'Phòng 105'),
(4, 1, 'Phòng 106'),
(5, 1, 'Phòng 107'),
(6, 1, 'Phòng 203'),
(7, 1, 'Phòng 204'),
(8, 1, 'Phòng 205'),
(9, 1, 'Phòng 206'),
(10, 2, 'Phòng 303'),
(11, 2, 'Phòng 304'),
(12, 2, 'Phòng 305'),
(13, 2, 'Phòng 306'),
(14, 2, 'Phòng 307'),
(15, 3, 'Phòng 101'),
(16, 3, 'Phòng 102'),
(17, 3, 'Phòng 201'),
(18, 3, 'Phòng 202'),
(19, 3, 'Phòng 301'),
(20, 3, 'Phòng 302'),
(21, 4, 'Phòng 402 '),
(22, 5, 'Phòng 401'),
(23, 5, 'Phòng 403'),
(24, 5, 'Phòng 405'),
(32, 1, 'Phòng 207');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thiet_bi`
--

CREATE TABLE `thiet_bi` (
  `ma_thiet_bi` int(11) NOT NULL,
  `ten_thiet_bi` varchar(100) NOT NULL,
  `so_luong_tong` int(11) NOT NULL,
  `so_luong_su_dung` int(11) NOT NULL,
  `so_luong_ton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thiet_bi`
--

INSERT INTO `thiet_bi` (`ma_thiet_bi`, `ten_thiet_bi`, `so_luong_tong`, `so_luong_su_dung`, `so_luong_ton`) VALUES
(1, 'Tivi Samsung 50 inch', 61, 40, 21),
(2, 'Tivi Samsung 55 inch', 4, 4, 0),
(3, 'Điều hoà nhiệt độ 1HP', 21, 21, 0),
(4, 'Máy sấy tóc', 25, 25, 0),
(5, 'Tủ lạnh mini', 25, 25, 0),
(6, 'Máy nước nóng', 25, 25, 0),
(7, 'Bình đun siêu tốc', 25, 25, 0),
(8, 'Quạt trần ', 25, 25, 0),
(9, 'Máy pha cà phê', 25, 25, 0),
(10, 'Điều hoà nhiệt độ 2HP', 4, 5, 0),
(12, 'ps5', 2, 0, 0),
(13, 'ps5', 2, 1, 1),
(14, 'ps52', 25, 0, 0),
(20, 'ps3', 3, 0, 0),
(21, 'ps5', 123, 0, 0),
(22, '5335', 2525, 0, 0),
(23, '1324', 24, 0, 0),
(24, 'Điều hóa FUSHA', 2, 0, 0),
(25, '4', 24, 0, 0),
(26, 'máy tính', 123, 0, 0),
(27, 'trẻ em', 123, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_tuc`
--

CREATE TABLE `tin_tuc` (
  `ma_tin_tuc` int(11) NOT NULL,
  `ma_nv` int(11) NOT NULL,
  `ten_tin_tuc` varchar(255) NOT NULL,
  `noi_dung` text NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `ngay_dang` date NOT NULL,
  `trang_thai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tin_tuc`
--

INSERT INTO `tin_tuc` (`ma_tin_tuc`, `ma_nv`, `ten_tin_tuc`, `noi_dung`, `hinh_anh`, `ngay_dang`, `trang_thai`) VALUES
(1, 1, 'Khám phá bộ đôi cà phê phong vị Ý kết hợp sữa yến mạch', 'Cappuchino yến mạch: cảm hứng khác biệt của Trung Nguyên Legend qua từng giọt cà phê phong vị Ý mà Cappuchino mang đến, phối hợp sữa yến mạch thơm béo tự nhiên tạo nên một thức uống vừa thơm ngon dinh dưỡng, vừa hiện đại bay bổng.\r\n\r\nLatte yến mạch: với tỷ lệ sữa yến mạch nhiều hơn hoà quyện hoàn hảo cùng vị đậm đà của cà phê rang xay, Latte yến mạch là lựa chọn hoàn hảo cho một ngày tươi mới đầy thư thái và sáng tạo.', './anhtin/latte.jpg', '2024-06-28', 'Công khai'),
(2, 2, 'Trang trí phòng tạo không gian lãng mạn', 'Tạo ra không gian lãng mạn, ấm áp là điều mà nhiều ngườimong muốn. Một không gian lãng mạn không chỉ giúp tạo ra những kỷ niệm đáng nhớ mà còn giúp tình cảm thêm phần gắn kết.\n\nChúng tôi tự hào cung cấp dịch vụ hỗ trợ khách hàng trong việc trang trí ', './anhtin/tin1.jpg', '2024-06-27', 'Công khai'),
(3, 2, 'Bún thịt nướng', 'Bún thịt nướng là một món ăn đặc trưng của ẩm thực Việt Nam, nổi bật với hương vị đậm đà và hấp dẫn. Món ăn này gồm bún tươi mềm mại, thịt heo nướng thơm lừng, ăn kèm với rau sống tươi ngon, dưa leo, giá đỗ và đậu phộng rang giòn. Đặc biệt, nước mắm chua ngọt pha chế tinh tế là linh hồn của món bún thịt nướng, tạo nên sự hòa quyện hoàn hảo giữa các nguyên liệu, mang đến trải nghiệm ẩm thực khó quên cho thực khách.', './anhtin/food3.jpg', '2024-06-27', 'Công khai'),
(4, 2, 'Ưu đãi đặt phòng tháng 8/2024', 'Chưa có thông tin cụ thể\r\n', './anhtin/family-twin3.jpg', '2024-06-27', 'Ẩn bài');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vat_tu`
--

CREATE TABLE `vat_tu` (
  `ma_vat_tu` int(11) NOT NULL,
  `ten_vat_tu` varchar(100) NOT NULL,
  `so_luong_tong` int(11) NOT NULL,
  `so_luong_su_dung` int(11) NOT NULL,
  `so_luong_ton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vat_tu`
--

INSERT INTO `vat_tu` (`ma_vat_tu`, `ten_vat_tu`, `so_luong_tong`, `so_luong_su_dung`, `so_luong_ton`) VALUES
(1, 'Khăn tắm ', 80, 12, 68),
(2, 'Dụng cụ vệ sinh cá nhân', 50, 25, 25),
(3, 'Vòi hoa sen', 25, 25, 0),
(4, 'Bồn tắm', 4, 4, 0),
(5, 'Tủ quần áo', 25, 25, 0),
(6, 'Tủ đầu giường ', 25, 25, 0),
(7, 'Bàn trang điểm', 25, 25, 0),
(8, 'máy tính', 1, 0, 0),
(9, '12', 0, 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_thiet_bi`
--
ALTER TABLE `chi_tiet_thiet_bi`
  ADD PRIMARY KEY (`ma_cttb`),
  ADD KEY `ma_phong` (`ma_phong`),
  ADD KEY `ma_thiet_bi` (`ma_thiet_bi`);

--
-- Chỉ mục cho bảng `chi_tiet_vat_tu`
--
ALTER TABLE `chi_tiet_vat_tu`
  ADD PRIMARY KEY (`ma_ctvt`),
  ADD KEY `ma_vat_tu` (`ma_vat_tu`),
  ADD KEY `ma_phong` (`ma_phong`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`ma_danh_gia`),
  ADD KEY `ma_kh` (`ma_kh`),
  ADD KEY `ma_loai` (`ma_loai`);

--
-- Chỉ mục cho bảng `hinh_anh`
--
ALTER TABLE `hinh_anh`
  ADD PRIMARY KEY (`ma_ha`),
  ADD KEY `ma_loai` (`ma_loai`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_hoa_don`),
  ADD KEY `fk_hoa_don_o` (`ma_o`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Chỉ mục cho bảng `loai_phong`
--
ALTER TABLE `loai_phong`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Chỉ mục cho bảng `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`ma_log`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`ma_nv`);

--
-- Chỉ mục cho bảng `o`
--
ALTER TABLE `o`
  ADD PRIMARY KEY (`ma_o`),
  ADD KEY `ma_kh` (`ma_kh`),
  ADD KEY `ma_phong` (`ma_phong`),
  ADD KEY `ma_nv` (`ma_nv`),
  ADD KEY `ma_loai` (`ma_loai`),
  ADD KEY `ma_phieu_dat` (`ma_phieu_dat`);

--
-- Chỉ mục cho bảng `phieu_dat`
--
ALTER TABLE `phieu_dat`
  ADD PRIMARY KEY (`ma_phieu_dat`),
  ADD KEY `ma_loai` (`ma_loai`),
  ADD KEY `ma_nhan_vien` (`ma_nv`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`ma_phong`),
  ADD KEY `ma_loai` (`ma_loai`);

--
-- Chỉ mục cho bảng `thiet_bi`
--
ALTER TABLE `thiet_bi`
  ADD PRIMARY KEY (`ma_thiet_bi`);

--
-- Chỉ mục cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD PRIMARY KEY (`ma_tin_tuc`),
  ADD KEY `ma_nv` (`ma_nv`);

--
-- Chỉ mục cho bảng `vat_tu`
--
ALTER TABLE `vat_tu`
  ADD PRIMARY KEY (`ma_vat_tu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chi_tiet_thiet_bi`
--
ALTER TABLE `chi_tiet_thiet_bi`
  MODIFY `ma_cttb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_vat_tu`
--
ALTER TABLE `chi_tiet_vat_tu`
  MODIFY `ma_ctvt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  MODIFY `ma_danh_gia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `hinh_anh`
--
ALTER TABLE `hinh_anh`
  MODIFY `ma_ha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma_hoa_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `loai_phong`
--
ALTER TABLE `loai_phong`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `log`
--
ALTER TABLE `log`
  MODIFY `ma_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `ma_nv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `o`
--
ALTER TABLE `o`
  MODIFY `ma_o` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `phieu_dat`
--
ALTER TABLE `phieu_dat`
  MODIFY `ma_phieu_dat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `phong`
--
ALTER TABLE `phong`
  MODIFY `ma_phong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `thiet_bi`
--
ALTER TABLE `thiet_bi`
  MODIFY `ma_thiet_bi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  MODIFY `ma_tin_tuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `vat_tu`
--
ALTER TABLE `vat_tu`
  MODIFY `ma_vat_tu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_thiet_bi`
--
ALTER TABLE `chi_tiet_thiet_bi`
  ADD CONSTRAINT `chi_tiet_thiet_bi_ibfk_1` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`ma_phong`),
  ADD CONSTRAINT `chi_tiet_thiet_bi_ibfk_2` FOREIGN KEY (`ma_thiet_bi`) REFERENCES `thiet_bi` (`ma_thiet_bi`);

--
-- Các ràng buộc cho bảng `chi_tiet_vat_tu`
--
ALTER TABLE `chi_tiet_vat_tu`
  ADD CONSTRAINT `chi_tiet_vat_tu_ibfk_1` FOREIGN KEY (`ma_vat_tu`) REFERENCES `vat_tu` (`ma_vat_tu`),
  ADD CONSTRAINT `chi_tiet_vat_tu_ibfk_2` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`ma_phong`);

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `danh_gia_ibfk_1` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`),
  ADD CONSTRAINT `danh_gia_ibfk_2` FOREIGN KEY (`ma_loai`) REFERENCES `loai_phong` (`ma_loai`);

--
-- Các ràng buộc cho bảng `hinh_anh`
--
ALTER TABLE `hinh_anh`
  ADD CONSTRAINT `hinh_anh_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai_phong` (`ma_loai`);

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `fk_hoa_don_o` FOREIGN KEY (`ma_o`) REFERENCES `o` (`ma_o`);

--
-- Các ràng buộc cho bảng `o`
--
ALTER TABLE `o`
  ADD CONSTRAINT `o_ibfk_2` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`ma_phong`),
  ADD CONSTRAINT `o_ibfk_3` FOREIGN KEY (`ma_nv`) REFERENCES `nhan_vien` (`ma_nv`),
  ADD CONSTRAINT `o_ibfk_4` FOREIGN KEY (`ma_loai`) REFERENCES `loai_phong` (`ma_loai`),
  ADD CONSTRAINT `o_ibfk_5` FOREIGN KEY (`ma_phieu_dat`) REFERENCES `phieu_dat` (`ma_phieu_dat`),
  ADD CONSTRAINT `o_ibfk_6` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);

--
-- Các ràng buộc cho bảng `phieu_dat`
--
ALTER TABLE `phieu_dat`
  ADD CONSTRAINT `phieu_dat_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai_phong` (`ma_loai`),
  ADD CONSTRAINT `phieu_dat_ibfk_2` FOREIGN KEY (`ma_nv`) REFERENCES `nhan_vien` (`ma_nv`),
  ADD CONSTRAINT `phieu_dat_ibfk_3` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);

--
-- Các ràng buộc cho bảng `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai_phong` (`ma_loai`);

--
-- Các ràng buộc cho bảng `tin_tuc`
--
ALTER TABLE `tin_tuc`
  ADD CONSTRAINT `tin_tuc_ibfk_1` FOREIGN KEY (`ma_nv`) REFERENCES `nhan_vien` (`ma_nv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
