-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 02, 2019 lúc 05:58 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tourtravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `hoten`, `sdt`, `hinhanh`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@vinatour', '$2y$10$KczJdacESdlU.flaZFBhH.hFkm8WT9sXpO2tBxMN0c4BNKEIy.M2y', 'Lê Tuân', '0395563446', '62919136.jpg', NULL, NULL, '2019-07-14 19:27:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `tour_id` int(11) UNSIGNED NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `user_id`, `tour_id`, `body`, `status`, `created_at`, `updated_at`) VALUES
(103, 5, 15, 'hello', 1, '2019-08-02 04:48:43', '2019-08-02 04:48:43'),
(104, 5, 15, 'hi', 1, '2019-08-02 04:48:43', '2019-08-02 04:48:43'),
(105, 5, 4, 'hello guys', 1, '2019-08-02 04:48:43', '2019-08-02 04:48:43'),
(106, 5, 4, 'how are u', 1, '2019-08-02 04:48:43', '2019-08-02 04:48:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdattour`
--

CREATE TABLE `chitietdattour` (
  `id` int(10) NOT NULL,
  `dondattour_id` int(10) UNSIGNED NOT NULL,
  `giatien` int(10) NOT NULL,
  `loai` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gioitinh` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `quocgia` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdattour`
--

INSERT INTO `chitietdattour` (`id`, `dondattour_id`, `giatien`, `loai`, `ten`, `sdt`, `diachi`, `gioitinh`, `quocgia`, `passport`, `created_at`, `updated_at`) VALUES
(6, 6, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:08:08', '2019-08-02 05:08:08'),
(7, 7, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:09:35', '2019-08-02 05:09:35'),
(8, 8, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:10:18', '2019-08-02 05:10:18'),
(9, 9, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:10:29', '2019-08-02 05:10:29'),
(10, 10, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:11:02', '2019-08-02 05:11:02'),
(11, 11, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:12:15', '2019-08-02 05:12:15'),
(12, 12, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:12:29', '2019-08-02 05:12:29'),
(13, 13, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:12:41', '2019-08-02 05:12:41'),
(14, 14, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:13:51', '2019-08-02 05:13:51'),
(15, 15, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:17:21', '2019-08-02 05:17:21'),
(16, 16, 250000, 'Người lớn', 'LÊ VĂN TUÂN', '0395563446', '51 Nguyễn Thị Tú', 'Nam', 'Việt Nam', '212579082', '2019-08-02 05:19:17', '2019-08-02 05:19:17'),
(17, 17, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:20:28', '2019-08-02 05:20:28'),
(18, 18, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:20:57', '2019-08-02 05:20:57'),
(19, 18, 120000, 'Trẻ em', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:20:57', '2019-08-02 05:20:57'),
(20, 18, 15000, 'Em bé', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:20:57', '2019-08-02 05:20:57'),
(21, 19, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:21:25', '2019-08-02 05:21:25'),
(22, 20, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:30:56', '2019-08-02 05:30:56'),
(23, 21, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:33:25', '2019-08-02 05:33:25'),
(27, 23, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 05:35:40', '2019-08-02 05:35:40'),
(28, 24, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 06:34:54', '2019-08-02 06:34:54'),
(29, 25, 250000, 'Người lớn', NULL, NULL, NULL, 'Nam', NULL, NULL, '2019-08-02 06:41:23', '2019-08-02 06:41:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiettuchon`
--

CREATE TABLE `chitiettuchon` (
  `id` int(11) NOT NULL,
  `tuchon_id` int(11) NOT NULL,
  `lichtrinhngay` int(11) NOT NULL,
  `tinh` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `diadanh` text COLLATE utf8_unicode_ci NOT NULL,
  `nhahang` text COLLATE utf8_unicode_ci NOT NULL,
  `khachsan` text COLLATE utf8_unicode_ci NOT NULL,
  `tongtienngay` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiettuchon`
--

INSERT INTO `chitiettuchon` (`id`, `tuchon_id`, `lichtrinhngay`, `tinh`, `diadanh`, `nhahang`, `khachsan`, `tongtienngay`, `created_at`, `updated_at`) VALUES
(1400, 42, 1, 'Hồ Chí Minh', 'NHÀ THỜ ĐỨC BÀ SÀI GÒN', 'Sorae Restaurant – Lounge,The LOG Restaurant', 'Majestic Sài Gòn', '570,000', '2019-07-23 01:19:41', '2019-07-23 01:19:41'),
(1401, 42, 2, 'Đà Lạt', 'NÚI LANGBIANG,THUNG LŨNG TÌNH YÊU', 'Nhà hàng cơm niêu Hương Việt,Nhà hàng Sunrise', 'Khách sạn Hoàng Phong,Khách sạn Liên Hương 2', '510,000', '2019-07-23 01:19:41', '2019-07-23 01:19:41'),
(1402, 42, 3, 'Hồ Chí Minh', 'CHỢ BẾN THÀNH', 'Sorae Restaurant – Lounge,The LOG Restaurant', 'Pullman', '450,000', '2019-07-23 01:19:41', '2019-07-23 01:19:41'),
(1425, 57, 1, 'Hồ Chí Minh', 'NHÀ THỜ ĐỨC BÀ SÀI GÒN,CHỢ BẾN THÀNH', 'Sorae Restaurant – Lounge,The LOG Restaurant', 'Majestic Sài Gòn,Pullman', '670,000', '2019-07-23 10:05:11', '2019-07-23 10:05:11'),
(1426, 57, 2, 'Hồ Chí Minh', 'CHỢ BẾN THÀNH', 'The LOG Restaurant', 'Pullman', '300,000', '2019-07-23 10:05:11', '2019-07-23 10:05:11'),
(1427, 57, 3, 'Đà Lạt', 'THUNG LŨNG TÌNH YÊU', 'Nhà hàng cơm niêu Hương Việt', 'Khách sạn Liên Hương 2', '180,000', '2019-07-23 10:05:11', '2019-07-23 10:05:11'),
(1428, 58, 1, 'Osaka', 'Khu trung tâm du lịch Osaka “Dotonbori”,“Thuỷ cung” thuộc hàng lớn nhất tại Nhật', 'Akagakiya', 'Khách sạn Mikado', '480,000', '2019-07-27 04:08:09', '2019-07-27 04:08:09'),
(1429, 58, 2, 'Tokyo', 'Công viên Tokyo DisneySea', 'Minatoya Shokuhin (みなとや食品)', 'Tokyo Hutte', '270,000', '2019-07-27 04:08:10', '2019-07-27 04:08:10'),
(1430, 58, 3, 'Tokyo', 'Công viên Tokyo DisneySea', 'Minatoya Shokuhin (みなとや食品)', 'Tokyo Hutte,Horidome Villa Hotel', '420,000', '2019-07-27 04:08:10', '2019-07-27 04:08:10'),
(1431, 60, 1, 'Osaka', 'Khu trung tâm du lịch Osaka “Dotonbori”', 'Honmiyake', 'Khách sạn Live Max', '280,000', '2019-07-30 11:21:13', '2019-07-30 11:21:13'),
(1432, 60, 2, 'Tokyo', 'SHIBUYA', 'Minatoya Shokuhin (みなとや食品)', 'Tokyo Hutte', '250,000', '2019-07-30 11:21:13', '2019-07-30 11:21:13'),
(1433, 60, 3, 'Osaka', 'Khu trung tâm du lịch Osaka “Dotonbori”', 'Honmiyake', 'Khách sạn Live Max', '280,000', '2019-07-30 11:21:13', '2019-07-30 11:21:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhsachin`
--

CREATE TABLE `danhsachin` (
  `id` int(11) NOT NULL,
  `ttc_id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `country` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `purpose` int(11) NOT NULL,
  `option1` tinyint(1) NOT NULL,
  `option2` tinyint(1) NOT NULL,
  `option3` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhsachin`
--

INSERT INTO `danhsachin` (`id`, `ttc_id`, `firstname`, `lastname`, `birthday`, `country`, `city`, `purpose`, `option1`, `option2`, `option3`, `created_at`, `updated_at`) VALUES
(4, 1, 'Nguyễn', 'An', '1996-01-08', 'Việt Nam', 'Hồ Chí Minh', 1, 1, 1, 1, '2019-07-15 22:25:46', '2019-07-15 20:44:48'),
(5, 2, 'Tuân', 'Lê Văn', '1996-06-30', 'Việt Nam', 'Quảng Ngãi', 2, 0, 1, 0, '2019-07-15 22:25:52', '2019-07-15 20:46:46'),
(8, 2, 'Hà', 'Thiên', '2019-07-12', 'HN', 'HA', 1, 1, 1, 0, '2019-07-15 22:43:11', '0000-00-00 00:00:00'),
(9, 2, 'tuan', 'sssss', '1992-02-01', 'Việt Nam', 'ss', 1, 0, 0, 0, '2019-07-15 22:58:07', '2019-07-15 22:58:07'),
(10, 2, 'quang', 'lê', '1995-03-02', 'Việt Nam', 'Hồ Chí Minh', 1, 0, 0, 0, '2019-07-15 22:58:39', '2019-07-15 22:58:39'),
(11, 2, 'quang', 'lê', '1995-03-02', 'Việt Nam', 'Hồ Chí Minh', 1, 0, 0, 0, '2019-07-15 22:59:10', '2019-07-15 22:59:10'),
(12, 2, 'ádas', 'đá', '1995-02-02', 'a', 'ád', 1, 0, 0, 0, '2019-07-15 23:01:16', '2019-07-15 23:01:16'),
(13, 4, 'khach', '1', '1996-03-02', 'ád', 'ádad', 1, 0, 0, 0, '2019-07-15 23:07:39', '2019-07-15 23:07:39'),
(14, 5, 'quang', 'An', '1995-02-01', 'Việt Nam', 'Hồ Chí Minh', 2, 0, 0, 0, '2019-07-15 23:18:32', '2019-07-15 23:18:32'),
(15, 7, 'ádas', 'dấd', '1995-12-02', 'dfgdgdg', 'ss', 1, 1, 1, 1, '2019-07-16 00:12:57', '2019-07-15 23:41:11'),
(16, 9, 'Tuân', 'Lê Văn', '1997-06-30', 'Việt Nam', 'Quảng Ngãi', 2, 1, 1, 1, '2019-07-16 00:25:54', '2019-07-16 00:25:54'),
(17, 9, 'Nguyễn', 'An', '1996-12-06', 'Việt Nam', 'Hồ Chí Minh', 1, 1, 0, 1, '2019-07-16 00:26:53', '2019-07-16 00:26:53'),
(18, 14, 'Tuân', 'lee', '1995-03-02', 'Việt Nam', 'Hồ Chí Minh', 1, 0, 0, 1, '2019-07-16 00:42:04', '2019-07-16 00:42:04'),
(19, 16, 'Tuân', 'An', '1990-02-02', 'Việt Nam', 'ss', 1, 0, 0, 0, '2019-07-16 00:43:49', '2019-07-16 00:43:49'),
(20, 18, '12312', '3123', '1997-03-02', 'sấd', 'ádasd', 2, 0, 0, 0, '2019-07-16 00:45:05', '2019-07-16 00:45:05'),
(21, 20, 'Tuân', 'qưewq', '1992-03-03', 'dfgdgdg', 'Quảng Ngãi', 1, 0, 0, 0, '2019-07-16 00:49:03', '2019-07-16 00:49:03'),
(22, 23, 'tuan', 'sss', '1995-02-02', 'ssssssss', 'ssssss', 1, 0, 0, 0, '2019-07-20 16:04:11', '2019-07-20 16:04:11'),
(23, 24, 'ádasd', 'ádasd', '1997-03-01', 'dsfsd', 'fsfdsdf', 2, 0, 0, 0, '2019-07-20 16:04:38', '2019-07-20 16:04:38'),
(24, 25, '123123', '13', '1997-05-03', 'sfsdf', 'sdfsdf', 2, 0, 0, 0, '2019-07-20 16:05:01', '2019-07-20 16:05:01'),
(25, 26, 'tuan', 'sfsdfs', '1997-02-03', 'sdssd', 'sdsds', 2, 0, 1, 0, '2019-07-23 20:11:13', '2019-07-23 20:11:13'),
(26, 27, 'ádasd', 'ádasd', '2005-02-03', 'Việt Nam', 'sdfsdf', 1, 0, 1, 1, '2019-07-23 20:13:49', '2019-07-23 20:13:49'),
(27, 28, 'Tuân', 'sssss', '1954-03-02', 'Việt Nam', 'Hồ Chí Minh', 1, 0, 0, 0, '2019-07-23 20:15:07', '2019-07-23 20:15:07'),
(28, 29, '234324', '234234', '1994-04-03', 'd', 'Hồ Chí Minh', 2, 0, 1, 1, '2019-07-23 20:16:25', '2019-07-23 20:16:25'),
(29, 30, 'sdffd', 'lê', '1998-04-02', 'Việt Nam', 'Hồ Chí Minh', 3, 0, 0, 1, '2019-07-23 20:30:57', '2019-07-23 20:30:57'),
(30, 31, 'tuan', 'lee', '1998-03-02', 'g', 'g', 3, 0, 0, 0, '2019-07-23 20:34:00', '2019-07-23 20:34:00'),
(31, 33, 'Tuân', 'Lê Văn', '1997-06-30', 'Việt Nam', 'Quảng Ngãi', 1, 0, 0, 0, '2019-07-24 23:20:29', '2019-07-24 23:20:29'),
(32, 33, 'An', 'Huỳnh Ngọc', '1996-02-08', 'Việt Nam', 'Hồ Chí Minh', 1, 1, 1, 1, '2019-07-24 23:21:00', '2019-07-24 23:21:00'),
(33, 34, 'ádasd', 'lee', '2017-02-02', 'ssss', 'Nam', 2, 0, 0, 0, '2019-08-01 05:53:39', '2019-08-01 05:53:39'),
(34, 35, 'ádas', 'ádasd', '1995-03-03', 'Hàn Quốc', 'Nữ', 1, 1, 0, 1, '2019-08-01 05:54:45', '2019-08-01 05:54:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diadanh`
--

CREATE TABLE `diadanh` (
  `id` int(10) UNSIGNED NOT NULL,
  `tendiadanh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` double NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinh` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diadanh`
--

INSERT INTO `diadanh` (`id`, `tendiadanh`, `gia`, `noidung`, `hinhanh`, `tinh`, `created_at`, `updated_at`) VALUES
(3, 'NÚI LANGBIANG', 50000, '<p><strong><img alt=\"\" src=\"http://ngoclan.ttchotels.com/uploads/images/diem-tham-quan/langbiang-1.png\" /></strong></p>\r\n\r\n<p>Núi Langbiang thuộc địa phận huyện Lạc Dương. Đây là ngọn núi cao nhất Đà Lạt. Nơi đây thu hút rất nhiều du khách trong và ngoài nước đến dã ngoại cũng như thám hiểm và chinh phục độ cao. Có nhiều cách để chinh phục các đỉnh núi trong dãy Langbiang như đi xe Jeep, đi bộ theo đường nhựa. Nơi này có 2 ngọn núi được người dân đặt tên là Núi Ông và Núi Bà. Khi đến đây, du khách được ngắm nhìn khung cảnh hùng vĩ của cao nguyên Langbiang. Vẻ đẹp lãng mạn trong sương mù của cả thành phố, tham gia những hoạt động thể thao độc đáo như leo núi bằng dây, nhảy dù lượn.</p>', '1132194208.png', 2, '2019-07-04 23:45:16', '2019-07-05 00:23:43'),
(4, 'THUNG LŨNG TÌNH YÊU', 60000, '<p>Nằm cách trung tâm thành phố Đà Lạt khoảng 5km về phía Bắc. Thung lũng Tình Yêu không chỉ là điểm đến lãng mạn cho những cặp đôi khi đi du lịch. Nơi đây còn hấp dẫn mọi du khách bởi cảnh sắc đẹp mê hồn, núi non hữu tình. Đó là nơi đập Đa Thiện đã quy tụ những dòng suối nhỏ chảy từ đồi núi cao thành hồ Đa Thiện trong vắt uốn mình quanh thung lũng rợp bóng thông xanh.</p>\r\n\r\n<p><img alt=\"\" src=\"http://ngoclan.ttchotels.com/uploads/images/diem-tham-quan/thunglung-tinhyeu-1.jpg\" /></p>\r\n\r\n<p>Những con đường đất đỏ uốn lượn vòng vèo có thể đưa khách lên đồi hoặc dẫn đền tận đỉnh núi Langbian thấp thoáng trong mây. Khu du lịch giờ đây đã trở nên hấp dẫn hơn bao giờ hết. Là một trong những địa điểm tham quan, dã ngoại, vui chơi giải trí không thể thiếu trong chương trình tour của Quý khách và du khách từ mọi miền đất nước đến với thành phố Đà Lạt mộng mơ.</p>', '2142074884.jpg', 2, '2019-07-05 00:25:17', '2019-07-05 00:25:17'),
(5, 'NHÀ THỜ ĐỨC BÀ SÀI GÒN', 20000, '<p>Đây là khu vực trung tâm thuộc Q.1, TP.HCM. Khu vực Nhà Thờ thể hiện rõ rệt “tính cách” của thành phố Sài Gòn. Gần nhà thờ cổ kính là hình ảnh đối lập với những tòa cao ốc bê tông cốt thép thời hiện đại. Từ nhà thờ Đức Bà, bạn có thể sang thăm dinh Độc Lập, mua sắm ở Diamond Plaza, dạo phố Đồng Khởi, qua Hồ Con Rùa, uống cà phê bệt ở đường Hàn Thuyên…</p>\r\n\r\n<p><a href=\"https://cdn3.ivivu.com/2014/10/du-lich-sai-gon-cam-nang-tu-a-den-z-iVIVU.com-4.jpg\"><img alt=\"Vẻ đẹp cổ kính của Nhà Thờ Đức Bà. \" src=\"https://cdn3.ivivu.com/2014/10/du-lich-sai-gon-cam-nang-tu-a-den-z-iVIVU.com-4-1024x768.jpg\" style=\"height:768px; width:1024px\" title=\"Vẻ đẹp cổ kính của Nhà Thờ Đức Bà. \" /></a></p>\r\n\r\n<p>Vẻ đẹp cổ kính của Nhà Thờ Đức Bà. Ảnh: kientrucxd</p>', '99411104.jpg', 1, '2019-07-05 00:28:27', '2019-07-05 00:28:27'),
(6, 'CHỢ BẾN THÀNH', 30000, '<p>Có từ thế kỷ thứ 19, chợ Bến Thành như một nhân chứng lịch sử qua nhiều biến động của thời cuộc. Chợ có 4 cổng Đông-Tây-Nam-Bắc quay ra các con đường chính ở trung tâm Sài Gòn. Đến đây, du khách có thể mua sắm rất nhiều các sản phẩm lưu niệm, vải vóc, quần áo, đồ thủ công mỹ nghệ.</p>\r\n\r\n<p><a href=\"https://cdn3.ivivu.com/2014/10/du-lich-sai-gon-cam-nang-tu-a-den-z-iVIVU.com-6.jpg\"><img alt=\"Vẻ đẹp của chợ Bến Thành vào buổi tối.\" src=\"https://cdn3.ivivu.com/2014/10/du-lich-sai-gon-cam-nang-tu-a-den-z-iVIVU.com-6.jpg\" style=\"height:533px; width:800px\" title=\"Vẻ đẹp của chợ Bến Thành vào buổi tối.\" /></a></p>\r\n\r\n<p>Vẻ đẹp của chợ Bến Thành vào buổi tối. Ảnh: ST</p>', '731837573.jpg', 1, '2019-07-05 00:29:16', '2019-07-05 00:29:16'),
(7, 'SHIBUYA', 50000, '<p>Shibuya là một trong những nơi nổi tiếng nhất tại Tokyo Nhật Bản với xu hướng thời trang đầy màu sắc và giải trí của Nhật Bản. Nhắc đến Shibuya chắc ít nhiều bạn cũng nhớ đến câu chuyện cảm động về chú chó trung thành mang tên Hachiko, nó đã ngồi ở cửa nhà ga Shibuya và chờ đợi chủ của mình ròng rã hơn 9 năm.</p>\r\n\r\n<p><img alt=\"Top 12 điểm du lịch Tokyo Nhật Bản không thể bỏ qua\" src=\"https://intertour.vn/blog/upload/blog/giao-lo-shibuya-tokyo_20160223173046574.jpg\" /></p>\r\n\r\n<p>Một địa điểm nổi bật không kém của Shibuya là ngã tư lớn với rất nhiều biển quảng cáo đầy màu sắc và màn hình video khổng lồ. Ở đây lúc nào cũng náo nhiệt, người qua lại tấp nập, có lẽ vì vậy mà Shibuya được ví như quãng trường thời đại của Tokyo.</p>', '621784041.jpg', 4, '2019-07-05 00:30:35', '2019-07-05 00:30:35'),
(8, 'Công viên Tokyo DisneySea', 70000, '<p><img alt=\"Top 12 điểm du lịch Tokyo Nhật Bản không thể bỏ qua\" src=\"https://intertour.vn/blog/upload/blog/cong-vien-toyko-disneysea_20160218104910404.jpg\" /></p>\r\n\r\n<p>Công viên Tokyo DisneySea được lấy cảm hứng từ những huyền thoại và truyền thuyết của biển, nó được phân chia thành 7 khu vực đặc trưng với những chủ đề khác nhau. Ở đây có nhiều trò chơi hấp dẫn cũng như các buổi biển diễn đặc sắc thích hợp với mọi lứa tuổi dù lớn hay nhỏ. Điểm đặc biệt ở công viên này là tùy vào từng mùa mà có những chương trình khác nhau, dẫn đến lượt khách du lịch Tokyo hàng năm đổ về nhiều vô số kể</p>', '1662692365.jpg', 4, '2019-07-05 00:31:16', '2019-07-05 00:31:16'),
(9, 'Khu trung tâm du lịch Osaka “Dotonbori”', 10000, '<p><img alt=\"道頓堀\" src=\"https://resources.matcha-jp.com/resize/720x2000/2018/03/14-50337.jpeg\" style=\"height:853px; width:1280px\" /></p>\r\n\r\n<p><span style=\"font-size:14px\">1 trong những địa điểm du lịch nổi tiếng nhất ở Osaka là <strong>Dotonbori</strong>.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Đặc điểm của khu này là những tấm biển hiệu khổng lồ nối dài. Các biển hiệu rất ăn ảnh có ở khắp mọi nơi như biển hiệu 1 người đang chạy đưa 2 tay lên cao của công ty sản xuất bánh kẹo Glico, hay biển hiệu có hình con cua đang chuyển động,...Nếu xem vào buổi tối được thắp điện sáng, các bạn sẽ thấy choáng ngợp bởi sự lôi cuốn của nó.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Đi xuyên qua khu vực Shinsaibashi cạnh đó sẽ là khu phố mua sắm với cửa hàng ăn uống, cửa hàng thời trang nối dài. Chiều dài đến 580m! Đây là nơi cô đọng sự lôi cuốn của Osaka, luôn tấp nập người qua lại mỗi ngày. Ở đây cũng tập trung rất nhiều cửa hàng có thể thưởng thức các món ăn địa phương của Osaka.</span></p>', '1413458523.jpeg', 3, '2019-07-05 00:32:48', '2019-07-05 00:32:48'),
(10, '“Thuỷ cung” thuộc hàng lớn nhất tại Nhật', 200000, '<p><span style=\"font-size:14px\"><img alt=\"海遊館\" src=\"https://resources.matcha-jp.com/resize/720x2000/2018/03/12-50194.jpeg\" style=\"height:1263px; width:1920px\" /></span></p>\r\n\r\n<p><span style=\"font-size:14px\">Đây là thuỷ cung cỡ lớn tiêu biểu của Nhật. Địa điểm lôi cuốn là bể nước thuộc dạng lớn nhất thế giới có sức chứa đến 5,400 tấn. Hình ảnh cá mập voi cực lớn bơi lội giữa đám cá mập, cá đuối thật sự lôi cuốn.</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Cùng với vòng quay khổng lồ Tempozan gần đó thì đây cũng là địa điểm hẹn hò yêu thích của người dân địa phương.</span></p>', '1441183511.jpeg', 3, '2019-07-05 00:33:50', '2019-07-05 00:33:50'),
(11, 'Di Hòa Viên', 250000, '<p>Nằm cách trung tâm Bắc Kinh 15 km về hướng Tây Bắc, Di Hòa Viên có nghĩa “Vườn nuôi dưỡng sự ôn hòa” là cung điện được xây dựng từ thời nhà Thanh. Một trong những nơi nổi tiếng nhất về nghệ thuật hoa viên truyền thống của Trung Quốc. Di Hòa Viên có lịch sử tồn tại trên 800 năm. Hai cảnh nổi bật là Vạn Thọ Sơn và hồ Côn Minh. Hoa viên rộng 290 ha, trong đó ba phần tư là hồ nước.</p>\r\n\r\n<p><a href=\"https://cdn3.ivivu.com/2015/11/du-lich-bac-kinh-ivivu-com-1.jpg\"><img alt=\"Toàn cảnh Di Hòa Viên nhìn từ trên cao. Ảnh: baidu\" src=\"https://cdn3.ivivu.com/2015/11/du-lich-bac-kinh-ivivu-com-1.jpg\" style=\"height:439px; width:780px\" title=\"Toàn cảnh Di Hòa Viên nhìn từ trên cao. Ảnh: baidu\" /></a></p>\r\n\r\n<p>Toàn cảnh Di Hòa Viên nhìn từ trên cao. Ảnh: baidu</p>\r\n\r\n<p>Vườn chia làm 3 khu vực. Khu hành chính là Nhân Thọ Điện – nơi Từ Hy thái hậu tiếp các quan lại và giải quyết quốc sự. Khu nghỉ ngơi gồm các điện và vườn hoa quanh năm nở hoa. Cuối cùng là khu phong cảnh với những hòn non bộ đẹp mắt, những hồ cá chép vàng đủ màu, những con đường dích dắc uốn lượn đi trên mặt hồ.</p>\r\n\r\n<p><a href=\"https://cdn3.ivivu.com/2015/11/du-lich-bac-kinh-ivivu-com-2.jpg\"><img alt=\"Phong cảnh non nước hữu tình. Ảnh: Nipich.com\" src=\"https://cdn3.ivivu.com/2015/11/du-lich-bac-kinh-ivivu-com-2.jpg\" style=\"height:593px; width:1024px\" title=\"Phong cảnh non nước hữu tình. Ảnh: Nipich.com\" /></a></p>\r\n\r\n<p>Phong cảnh non nước hữu tình.</p>', '1201632455.jpg', 5, '2019-07-05 00:35:24', '2019-07-05 00:35:24'),
(12, 'Tử Cấm Thành', 300000, '<p>Còn được biết đến với tên gọi Cung điện Hoàng gia hay Bảo tàng Cung điện, Tử Cấm Thành là nơi mà các Hoàng đế của triều đại nhà Minh với nhà Thanh sinh sống cũng như cai trị đất nước. Hiện nay thì công trình đã được mở cửa rộng rãi để công chúng vào xem và trở thành điểm tham quan nổi bật ở Bắc Kinh. Rất nhiều khách du lịch đều cảm thấy sững sỡ trước vẻ đẹp uy nghiêm, tráng lệ của cung điện. Đặc biệt là trong Tử Cấm Thành vẫn còn lưu giữ nhiều truyền thuyết về những người trong gia đình Hoàng tộc ngày xưa.</p>\r\n\r\n<p><a href=\"https://cdn3.ivivu.com/2015/11/du-lich-bac-kinh-ivivu-com-4.jpg\"><img alt=\"Ảnh:chinaspringtour.com\" src=\"https://cdn3.ivivu.com/2015/11/du-lich-bac-kinh-ivivu-com-4.jpg\" style=\"height:811px; width:1232px\" title=\"Ảnh:chinaspringtour.com\" /></a></p>', '1889014532.jpg', 5, '2019-07-05 00:35:57', '2019-07-05 00:35:57'),
(13, 'LÀNG CHÀI XƯA', 250000, '<h1 style=\"text-align:justify\">Khám phá “Làng chài xưa” ở xứ biển Phan Thiết</h1>\r\n\r\n<p style=\"text-align:justify\"> </p>\r\n\r\n<p style=\"text-align:justify\">Nằm ngay cửa ngõ vào “thủ đô resort” Hàm Tiến - Mũi Né (TP Phan Thiết, tỉnh Bình Thuận), không gian trưng bày nghệ thuật “Làng chài xưa” đã khiến nhiều người ngỡ ngàng, thích thú khi tận mắt được chứng kiến một làng chài xưa của xứ biển Phan Thiết được tái hiện một cách công phu.</p>\r\n\r\n<p style=\"text-align:justify\">Sau gần 2 năm thi công xây dựng, không gian trưng bày nghệ thuật “Làng chài xưa” đã ra mắt tại khu tổ hợp giải trí Fisherman Show, số 360 Nguyễn Thông, TP Phan Thiết (tỉnh Bình Thuận) phục vụ người dân và du khách.</p>\r\n\r\n<p style=\"text-align:justify\">Toàn bộ khu trưng bày có diện tích 1.600m². Đây là không gian trưng bày nghệ thuật và là bảo tàng thu nhỏ, tái hiện lại một phần làng chài xưa của Phan Thiết - Mũi Né cách đây hơn 300 năm.</p>\r\n\r\n<p style=\"text-align:justify\">Du khách đến đây sẽ được tham quan làng chài dưới rặng dừa; phố cổ ven sông Cà Ty; nhà ở và nơi sản xuất nước mắm của hàm hộ Phan Thiết; con đường Phan Thiết - Mũi Né xưa; đắm mình vào biển Mũi Né 3D và mua sắm trong không gian chợ quê làng xưa…</p>\r\n\r\n<p style=\"text-align:justify\">Ông Nguyễn Anh, nhà sưu tầm và nghiên cứu về Phan Thiết xưa cho biết: “Có thể nói, đây không chỉ là một công trình nghệ thuật mà còn như một \"bảo tàng\" cung cấp nhiều thông tin và hình ảnh xưa quý giá về lịch sử hình thành làng chài Phan Thiết - Mũi Né xưa, giúp cho giới trẻ hiểu hơn về lịch sử đáng tự hào của quê hương Phan Thiết”</p>\r\n\r\n<p style=\"text-align:justify\">Một số hình ảnh trong khu trưng bày lý thú này:</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"http://image.sggp.org.vn/w1200/Uploaded/2019/crnwcqjwp/2018_04_28/31351465_10204600095798832_7175287955152437248_n_txcl.jpg\"><img alt=\"Khám phá “Làng chài xưa” ở xứ biển Phan Thiết ảnh 1\" src=\"http://image.sggp.org.vn/w560/Uploaded/2019/crnwcqjwp/2018_04_28/31351465_10204600095798832_7175287955152437248_n_txcl.jpg\" /></a>Bảng hiệu của khu trưng bày được thiết kế  độc đáo.</p>\r\n\r\n<p style=\"text-align:justify\"> </p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"http://image.sggp.org.vn/w1200/Uploaded/2019/crnwcqjwp/2018_04_28/31357953_10204600095478824_795009119483330560_n_kngq.jpg\"><img alt=\"Khám phá “Làng chài xưa” ở xứ biển Phan Thiết ảnh 2\" src=\"http://image.sggp.org.vn/w560/Uploaded/2019/crnwcqjwp/2018_04_28/31357953_10204600095478824_795009119483330560_n_kngq.jpg\" /></a>Những thùng gỗ làm nước mắm được sưu tầm có tuổi đời hơn 100 năm.</p>\r\n\r\n<p style=\"text-align:justify\"> </p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"http://image.sggp.org.vn/w1200/Uploaded/2019/crnwcqjwp/2018_04_28/31363297_10204600095958836_494717461552168960_n_thvn.jpg\"><img alt=\"Khám phá “Làng chài xưa” ở xứ biển Phan Thiết ảnh 3\" src=\"http://image.sggp.org.vn/w560/Uploaded/2019/crnwcqjwp/2018_04_28/31363297_10204600095958836_494717461552168960_n_thvn.jpg\" /></a>Căn nhà lá mộc mạc của người dân làng chài xưa được tái hiện.</p>\r\n\r\n<p style=\"text-align:justify\"> </p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"http://image.sggp.org.vn/w1200/Uploaded/2019/crnwcqjwp/2018_04_28/31369038_10204600094638803_6166478026553950208_n_itpe.jpg\"><img alt=\"Khám phá “Làng chài xưa” ở xứ biển Phan Thiết ảnh 4\" src=\"http://image.sggp.org.vn/w560/Uploaded/2019/crnwcqjwp/2018_04_28/31369038_10204600094638803_6166478026553950208_n_itpe.jpg\" /></a>Mộ góc làng chài xưa được tái hiện trong khu trưng bày</p>\r\n\r\n<p style=\"text-align:justify\"> </p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"http://image.sggp.org.vn/w1200/Uploaded/2019/crnwcqjwp/2018_04_28/31369650_10204600094838808_3626386861066289152_n_pdet.jpg\"><img alt=\"Khám phá “Làng chài xưa” ở xứ biển Phan Thiết ảnh 5\" src=\"http://image.sggp.org.vn/w560/Uploaded/2019/crnwcqjwp/2018_04_28/31369650_10204600094838808_3626386861066289152_n_pdet.jpg\" /></a>Mô hình cánh đồng muối  được nhiều du khách thích thú trải nghiệm</p>\r\n\r\n<p style=\"text-align:justify\"> </p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"http://image.sggp.org.vn/w1200/Uploaded/2019/crnwcqjwp/2018_04_28/31349739_10204600095558826_2459879984060170240_n_pvuf.jpg\"><img alt=\"Khám phá “Làng chài xưa” ở xứ biển Phan Thiết ảnh 6\" src=\"http://image.sggp.org.vn/w560/Uploaded/2019/crnwcqjwp/2018_04_28/31349739_10204600095558826_2459879984060170240_n_pvuf.jpg\" /></a>Cửa hàng băng nhạc Phan Thiết xưa. </p>', '507969019.jpg', 6, '2019-07-24 21:42:35', '2019-07-24 21:42:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dia_danh_tour`
--

CREATE TABLE `dia_danh_tour` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `dia_danh_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dia_danh_tour`
--

INSERT INTO `dia_danh_tour` (`id`, `tour_id`, `dia_danh_id`, `created_at`, `updated_at`) VALUES
(37, 5, 5, NULL, NULL),
(38, 6, 4, NULL, NULL),
(39, 6, 5, NULL, NULL),
(40, 7, 3, NULL, NULL),
(49, 10, 3, NULL, NULL),
(51, 12, 7, NULL, NULL),
(54, 15, 3, NULL, NULL),
(62, 19, 3, NULL, NULL),
(64, 20, 3, NULL, NULL),
(66, 18, 5, NULL, NULL),
(67, 1, 3, NULL, NULL),
(68, 1, 4, NULL, NULL),
(69, 1, 5, NULL, NULL),
(70, 1, 6, NULL, NULL),
(71, 2, 9, NULL, NULL),
(72, 2, 7, NULL, NULL),
(73, 3, 3, NULL, NULL),
(74, 3, 5, NULL, NULL),
(75, 4, 9, NULL, NULL),
(76, 4, 10, NULL, NULL),
(77, 4, 7, NULL, NULL),
(78, 4, 8, NULL, NULL),
(79, 4, 11, NULL, NULL),
(80, 4, 12, NULL, NULL),
(82, 11, 3, NULL, NULL),
(83, 13, 3, NULL, NULL),
(84, 14, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondattour`
--

CREATE TABLE `dondattour` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `songuoilon` int(2) DEFAULT NULL,
  `sotreem` int(2) DEFAULT NULL,
  `soembe` int(2) DEFAULT NULL,
  `tongtien` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `thanhtoan` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dondattour`
--

INSERT INTO `dondattour` (`id`, `tour_id`, `user_id`, `songuoilon`, `sotreem`, `soembe`, `tongtien`, `status`, `thanhtoan`, `created_at`, `updated_at`) VALUES
(6, 15, 2, 1, 0, 0, 250000, 1, 'Thanh toán tại công ty', '2019-10-02 05:17:36', '2019-08-02 05:17:36'),
(7, 15, 2, 1, 0, 0, 250000, 1, 'Thanh toán tại công ty', '2019-11-02 05:17:36', '2019-08-02 05:17:36'),
(8, 15, 2, 1, 0, 0, 250000, 1, 'Thanh toán tại công ty', '2019-08-02 08:05:34', '2019-08-02 05:17:36'),
(9, 15, 2, 1, 0, 0, 250000, 0, 'Thanh toán tại công ty', '2019-08-02 08:06:07', '2019-08-02 05:17:36'),
(10, 15, 2, 1, 0, 0, 250000, 0, 'Thanh toán tại công ty', '2019-08-02 08:06:02', '2019-08-02 05:17:36'),
(11, 15, 2, 1, 0, 0, 250000, 1, 'Thanh toán tại công ty', '2019-08-02 05:17:36', '2019-08-02 05:17:36'),
(12, 15, 2, 1, 0, 0, 250000, 1, 'Thanh toán tại công ty', '2019-08-02 05:17:36', '2019-08-02 05:17:36'),
(13, 15, 2, 1, 0, 0, 250000, 1, 'Thanh toán tại công ty', '2019-08-02 05:17:36', '2019-08-02 05:17:36'),
(14, 15, 2, 1, 0, 0, 250000, 1, 'Thanh toán tại công ty', '2019-08-02 05:17:36', '2019-08-02 05:17:36'),
(15, 15, 2, 1, 0, 0, 250000, 1, 'Thanh toán tại công ty', '2019-08-02 05:17:36', '2019-08-02 05:17:36'),
(16, 15, 2, 1, NULL, NULL, 250000, 1, 'Thanh toán tại công ty', '2019-08-02 06:30:16', '2019-08-02 06:30:16'),
(17, 15, 2, 1, 0, 0, 250000, 1, 'Thanh toán tại công ty', '2019-08-02 06:30:16', '2019-08-02 06:30:16'),
(18, 15, 2, 1, 1, 1, 385000, 1, 'Thanh toán tại công ty', '2019-08-02 07:53:41', '2019-08-02 07:53:41'),
(19, 15, 2, 1, NULL, NULL, 250000, 1, 'Thanh toán VNPAY', '2019-08-02 06:30:16', '2019-08-02 06:30:16'),
(20, 15, 2, 1, NULL, NULL, 250000, 1, 'Thanh toán VNPAY', '2019-08-02 06:30:16', '2019-08-02 06:30:16'),
(21, 15, 2, 1, NULL, NULL, 250000, 1, 'Thanh toán VNPAY', '2019-08-02 06:30:16', '2019-08-02 06:30:16'),
(23, 15, 2, 1, 0, 0, 250000, 1, 'Thanh toán VNPAY', '2019-08-02 06:30:16', '2019-08-02 06:30:16'),
(24, 15, 2, 1, NULL, NULL, 250000, 1, 'Thanh toán VNPAY', '2019-08-02 06:35:21', '2019-08-02 06:35:21'),
(25, 15, 2, 1, NULL, NULL, 250000, 1, 'Thanh toán tại công ty', '2019-08-02 06:41:58', '2019-08-02 06:41:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachsan`
--

CREATE TABLE `khachsan` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenkhachsan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` double NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinh` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachsan`
--

INSERT INTO `khachsan` (`id`, `tenkhachsan`, `gia`, `noidung`, `hinhanh`, `tinh`, `created_at`, `updated_at`) VALUES
(3, 'Rosewood Beijing Hotel', 5000000, '<ul>\r\n	<li><em>Jing Guang Centre, Hujialou, Chaoyang District, CBD, Bắc Kinh</em></li>\r\n	<li><em>Giá thấp nhất 306,42 USD</em></li>\r\n	<li><em>Khu vực khách sạn : CBD</em></li>\r\n	<li><em>Đánh giá của khách hàng: Tuyệt vời 8.9</em></li>\r\n</ul>\r\n\r\n<p><img alt=\"Khách sạn nổi tiếng ở Bắc Kinh\" src=\"https://dulich9.com/wp-content/uploads/2015/11/khach-san-cao-cap-o-bac-kinh-4.jpg\" style=\"height:454px; width:700px\" /></p>\r\n\r\n<p>Rosewood Beijing Hotel</p>\r\n\r\n<p><strong><em>Mô tả về vị trí, tiện nghi nổi bật và đánh giá của du khách về khách sạn</em></strong></p>\r\n\r\n<p>Rosewood Beijing Hotel tọa lạc tại khu vực CBD trung tâm Bắc Kinh thích hợp với mua sắm, kinh doanh và nhà hàng. <strong>Khách sạn nổi tiếng ở Bắc Kinh</strong> này cách ga tàu điện ngầm Jintaixizhao 4 phút đi bộ, sân bay Quốc Tế Bắc Kinh 19.6 Km, phòng trưng bày nghệ thuật Green T. House 1,8km, trung tâm thương mại China World 1,9km, Phố Vương Phủ Tỉnh 4,8km.</p>\r\n\r\n<p>Được đánh giá là một trong những <strong>khách sạn hiện đại, tiện nghi và chất lượng ở Bắc Kinh</strong>, Rosewood Beijing Hotel bao gồm 283 phòng được trang bị đầy đủ tiện nghi hiện đại như: Hệ thống điều hòa nhiệt độ tự động, minibar, dụng cụ pha Espresso, dụng cụ pha cà phê, áo choàng tắm…</p>\r\n\r\n<p>Bên cạnh đó, khách sạn còn cung cấp những dịch vụ tuyệt vời như: Hồ bơi trong nhà, dịch vụ spa trong khuôn viên, câu lạc bộ sức khỏe, bồn tắm thủy lực, khu vực tập thể dục trong khuôn viên, lớp yoga trong khuôn viên, hộp đêm, phòng tắm hơi sauna, bàn bi-da. Ngoài ra, khách sạn còn có 6 nhà hàng, quán cà phê phục vụ những món ăn và đồ uống nổi tiếng.</p>\r\n\r\n<p><img alt=\"Khách sạn nổi tiếng ở Bắc Kinh \" src=\"https://dulich9.com/wp-content/uploads/2015/11/khach-san-cao-cap-o-bac-kinh-.jpg\" style=\"height:450px; width:600px\" /></p>\r\n\r\n<p>Lý do du khách chọn khách sạn này là: Bữa sáng ngon, có phòng tập gym. Có bể bơi trong nhà đẹp và rộng, phòng ốc thoáng mát, sạch sẽ. Nhân viên thân thiện, nói tiếng Anh tốt, dịch vụ massage tuyệt vời, quán bar, nhà hàng tốt.</p>\r\n\r\n<p>Joohye C.Gia đình với trẻ lớn: “<em>Rất thoải mái, nhân viên rất chuyên nghiệp.Hồ bơi tuyệt vời và được miễn phí nhiều dịch vụ kèm theo.”</em></p>\r\n\r\n<p>Carli Y.Du lịch cặp đôi: “<em>Chúng tôi nhận được 2 cặp du lịch khi vô địch giải điền kinh và nghỉ tại khách sạn. Phòng rộng, nhân viên chu đáo, ăn sáng tự chọn và rất ngon. Đặc biệt, buổi tối được thưởng thức những bản nhạc tuyệt vời cùng cocktail và tapas, phòng thể dục được trang bị tốt, bạn của tôi rất thích hồ bơi tại khách sạn.”</em></p>', '771135667.jpg', 5, '2019-07-05 02:04:10', '2019-07-05 02:04:10'),
(4, 'Grand Millennium Hotel', 70000, '<ul>\r\n	<li><em>Fortune Plaza, 7 DongSanHuan Middle Road , Chaoyang District, CBD, Bắc Kinh</em></li>\r\n	<li><em>Giá thấp nhất 249,87 USD</em></li>\r\n	<li><em>Khu vực khách sạn : CBD</em></li>\r\n	<li><em>Đánh giá của khách hàng: Tuyệt vời 8.5</em></li>\r\n</ul>\r\n\r\n<p><img alt=\"Nên thuê khách sạn nào khi du lịch Bắc Kinh? \" src=\"https://dulich9.com/wp-content/uploads/2015/11/khach-san-cao-cap-o-bac-kinh-5.jpg\" style=\"height:435px; width:650px\" /></p>\r\n\r\n<p>Grand Millennium Hotel</p>\r\n\r\n<p><strong><em>Mô tả về vị trí, tiện nghi nổi bật và đánh giá của du khách về khách sạn</em></strong></p>\r\n\r\n<p><strong>Nên thuê khách sạn nào khi du lịch Bắc Kinh</strong>? Grand Millennium Hotel là sự lựa chọn bạn không nên bỏ qua khi du lịch thành phố cổ của Trung Quốc tuyệt đẹp này. Khách sạn tọa lạc tại vị trí đẹp mắt trong tòa nhà chọc trời Beijing Fortune Plaza, gần Trụ sở mới của đài truyền hình CCTV, cách ga tàu điện ngầm Jintaixizhao 5 phút đi bộ, Chaowai SOHO 6 phút đi xe, rất gần với Trung tâm Thương mại Thế giới Trung Quốc, sân bay quốc tế Bắc Kinh.</p>\r\n\r\n<p>Phòng ốc của <strong>khách sạn 5 sao hàng đầu ở Bắc Kinh</strong> này, được thiết kế rộng rãi, thanh lịch, trang trí hiện đại và có cửa sổ kính lớn suốt từ trần đến sàn cho tầm nhìn ra quang cảnh thành phố. Tất cả các phòng đều được trang bị minibar, TV màn hình phẳng và két an toàn cá nhân, phòng tắm đầy đủ tiện nghi.</p>\r\n\r\n<p>Bên cạnh đó, nghỉ dưỡng tại <strong>khách sạn đẹp ở Bắc Kinh</strong> này du khách còn được tận hưởng những dịch vụ tuyệt vời như: Hồ bơi trong nhà, dịch vụ massage, trung tâm thể dục, dịch vụ thuê xe hơi, nhà hàng chuyên phục vụ những món ăn truyền thống của Trung Quốc, xì gà và rượu, cocktail tại Lobby Lounge. Grand Millennium Hotel là lựa chọn tuyệt vời cho du khách thích doanh nhân, mua sắm và ẩm thực.</p>\r\n\r\n<p><img alt=\"Khách sạn đẹp ở Bắc Kinh\" src=\"https://dulich9.com/wp-content/uploads/2015/11/khach-san-cao-cap-o-bac-kinh-7.jpg\" style=\"height:328px; width:600px\" /></p>\r\n\r\n<p>Bể bơi trong nhà tại khách sạn</p>\r\n\r\n<p>Lý do du khách chọn khách sạn này là: “Dịch vụ chu đáo”, “Bồn tắm lớn”, “Bữa sáng ngon”. Gần địa điểm mua sắm, phòng sạch sẽ, thoải mái, nhân viên tốt bụng. Có bể bơi, phòng tập gym và spa rất tốt. Giường thoải mái, gần ga tàu, check-in nhanh chóng.</p>\r\n\r\n<p>Sherri L. Du lịch một mình: “<em>Phòng ngủ thoải mái, đẹp. Khách sạn gần tàu điện ngầm, chỉ cách phố tài chính vài bước đi bộ.”</em></p>\r\n\r\n<p>Jason M.Du lịch cặp đôi: <em>“Chúng tôi đã ở khách sạn này nhiều lần và chưa từng có phàn nàn về chất lượng của khách sạn. Tiện nghi và vị trí của khách sạn rất tốt, xứng đáng là điểm nghỉ dưỡng tốt ở Bắc Kinh.”</em></p>', '1445695030.jpg', 5, '2019-07-05 02:04:46', '2019-07-05 02:04:46'),
(5, 'Tokyo Hutte', 50000, '<p>Từ nhà ga Oshiage du khách chỉ mất khoảng 2 phút đi bộ là đến khách sạn. Đây là nơi có giá rẻ dành cho các du khách đi du lịch bụi, tại đây cung cấp các phòng ngủ tập thể có giá từ 3200yen. Các phòng tắm được mở của liên tục trên 24h và có đầy đủ các tiện nghi và nhiều vật dụng khác. Các phòng này được thiết kế rất thời trang và sạch sẽ mang đến cho du khách cảm giác thoải mái khi nghỉ ngơi nơi đây. Khu nhà ở cũng có những không gian làm việc chung và có wifi tiện lợi cho công việc của các du khách, đồ uống được phục vụ miễn phí.</p>\r\n\r\n<p>Địa chỉ: 4-18-16 Narihira, Sumida Ward, Tokyo</p>\r\n\r\n<p><img alt=\"4 khách sạn giá rẻ ở Tokyo Nhật Bản - Ảnh 2\" src=\"https://tourdulichnhatban.info/view-672/at_4-khach-san-gia-re-o-tokyo-nhat-ban_b65bae8664f87c38cc319be742ee0fa7.jpg\" title=\"4 khách sạn giá rẻ ở Tokyo Nhật Bản - Ảnh 2\" /></p>', '1809531767.jpg', 4, '2019-07-05 02:06:06', '2019-07-05 02:06:06'),
(6, 'Horidome Villa Hotel', 150000, '<p>Đối với những ai thích đi du lịch bụi cần có sự riêng tư thì nơi đây là điểm lý tưởng dành cho du khách khi tới <strong>du lịch tại Nhật Bản</strong>. Với giá khoảng 7800yen du khách sẽ có một phòng riêng không gian riêng, tại đây bạn có thể có nhiều thời gian nghỉ ngơi thoải mái trong chuyến du lịch của mình. Khách sạn không chỉ cung câp cho du khách một nơi nghỉ ngơi thoải mai mà trong phòng còn có buồn tăm, du khách có thể tận hưởng thư giãn tại bồn tắm. khách sạn này có một điểm nhấn đó là có những con đường nhỏ quanh co độc đáo khiến cho du khách có cảm giác như đang lạc vào các khu phố cổ của Nhật Bản.</p>\r\n\r\n<p>Địa chỉ: 1-10-10 Nihonbashi Horidomecho, Chuo Ward, Tokyo</p>\r\n\r\n<p><img alt=\"4 khách sạn giá rẻ ở Tokyo Nhật Bản - Ảnh 3\" src=\"https://tourdulichnhatban.info/view-672/at_4-khach-san-gia-re-o-tokyo-nhat-ban_e9a40112ef057677a8f87a95eef12385.png\" title=\"4 khách sạn giá rẻ ở Tokyo Nhật Bản - Ảnh 3\" /></p>', '90824346.png', 4, '2019-07-05 02:06:45', '2019-07-05 02:06:45'),
(7, 'Khách sạn Live Max', 200000, '<p>Khách sản này có vị trí thuận lợi ở gần các khu kinh doanh thương mai, không chỉ giá rẻ mà khách sạn còn mang đến cho bạn có cảm giác như nhà của mình với thiết kế độc đáo. Với các thiết bị có sẵn và thiết kế hài hòa giữa các màu sắc sẽ mang lại sự thoải mái, thư giãn. Khách sạn Live Max ở gần nhà ga Nanba và Kyocera Dome nên rất thuận tiên việc đi lại khi thăm quan các địa điểm nổi tiếng của Osaka. Các phòng luôn được trang bị wifi nên rất thích hợp các nhà kinh doanh đến đây du lịch. Giá phòng chỉ có 3000yen</p>\r\n\r\n<p>Địa chỉ: 2-1-3 Inari, Nanba-ku, Osaka-shi, Osaka</p>\r\n\r\n<p><img alt=\"5 khách sản giá rẻ ở Osaka khi đến du lịch Nhật Bản - Ảnh 3\" src=\"https://tourdulichnhatban.info/view/at_5-khach-san-gia-re-o-osaka-khi-den-du-lich-nhat-ban_c94e5b616b6a84996ae92422e84a51b2.jpg\" title=\"5 khách sản giá rẻ ở Osaka khi đến du lịch Nhật Bản - Ảnh 3\" /></p>', '553135068.jpg', 3, '2019-07-05 02:08:25', '2019-07-05 02:08:25'),
(8, 'Khách sạn Mikado', 200000, '<p>Đó là khách sản giá rẻ nổi tiếng ở Nishinaru-ku với rất nhiều các phòng trọ cho thuê. Đây là khách sản nằm cách xa con phố chính nên vô cùng yên tĩnh. Tại đây có các phòng ngủ tập thể và các phòng ngủ riêng, có phòng tắm hơi và bồn tắm. Khách sạn này khá nổi tiếng với các du khách đi <strong>tour du lịch Nhật Bản. </strong>Khách sạn được thiết kế theo phong cách Nhật Bản nên có giá khoảng 1900yen/người.</p>\r\n\r\n<p>Địa chỉ: 1 Chome-2-11 Taishi, Nishinari-ku, Osaka</p>\r\n\r\n<p><img alt=\"5 khách sản giá rẻ ở Osaka khi đến du lịch Nhật Bản - Ảnh 4\" src=\"https://tourdulichnhatban.info/view-672/at_5-khach-san-gia-re-o-osaka-khi-den-du-lich-nhat-ban_24452ebf67438553fc08522aeeb31ab6.jpg\" title=\"5 khách sản giá rẻ ở Osaka khi đến du lịch Nhật Bản - Ảnh 4\" /></p>', '876183346.jpg', 3, '2019-07-05 02:08:49', '2019-07-05 02:08:49'),
(9, 'Majestic Sài Gòn', 200000, '<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:center\"><img alt=\"16 khach san hang dau TP HCM hinh anh 2 2. Khách sạn Majestic Sài Gòn( số 1 Đồng Khởi, Quận 1 TP.HCM). Là một trong những khách sạn có bề dày lịch sử nổi tiếng của Sài Gòn (1925 - 2015), biểu tượng cho sự xa hoa tráng lệ của người Sài Gòn khi xưa. Với hồ bơi đẹp mắt ở sân giữa khách cùng các tiện ích khác có tại đây gồm trung tâm thể dục, sòng bạc. Ngoài ra tại đây còn có các tiện nghi giải trí và thư giãn như mát xa, jacuzzi, tắm hơi, spa, sân tennis. Ảnh: Datphong24.\" src=\"https://znews-photo.zadn.vn/w660/Uploaded/jac_iik/2015_03_20/2_datphong24h.jpg\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Majestic Sài Gòn</strong> (số 1 Đồng Khởi, quận 1). Đây là một trong những khách sạn có bề dày lịch sử (từ năm 1925), biểu tượng cho sự xa hoa, tráng lệ của Sài Gòn xưa. Khách sạn có trung tâm thể dục, sòng bạc, các tiện nghi giải trí và thư giãn như mát xa, jacuzzi, tắm hơi, spa, sân tennis. </td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '1025225013.jpg', 1, '2019-07-05 02:10:24', '2019-07-05 02:10:24'),
(10, 'Pullman', 70000, '<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:center\"><img alt=\"16 khach san hang dau TP HCM hinh anh 4 4. Khách sạn Pullman Sài Gòn (148 Trần Hưng Đạo, Quận 1 TP.HCM). Là một khách sạn tiêu chuẩn 5 sao quốc tế mới nhất được xây dựng tại Sài Gòn,  Pullman bao gồm 306 phòng với các loại Superior, Deluxe, Executive, Suite... Mỗi phòng đều mang phong cách riêng biệt, được trang bị đầy đủ các thiết bị tiện nghi hiện đại như LED TV, dụng cụ pha trà, cà phê, wifi internet, bồn tắm...  Ngoài ra nhà hàng trên tầng mái khách sạn còn phục vụ bữa sáng và có thiết kế nướng thịt hình tròn độc đáo cũng như bếp biểu diễn trực tiếp. Ảnh: Hanoimoi.\" src=\"https://znews-photo.zadn.vn/w660/Uploaded/jac_iik/2015_03_20/4_hanoimoi.jpg\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Pullman Sài Gòn </strong>(148 Trần Hưng Đạo, quận 1). Là khách sạn 5 sao quốc tế mới nhất được xây dựng tại thành phố, Pullman bao gồm 306 phòng với các loại superior, deluxe, executive, suite... Mỗi phòng đều mang phong cách riêng biệt, được trang bị đầy đủ các thiết bị tiện nghi như TV màn hình LED, dụng cụ pha trà, cà phê, Wi-Fi, bồn tắm... Nhà hàng trên tầng mái khách sạn phục vụ bữa sáng có thiết kế nướng thịt hình tròn độc đáo, đầu bếp biểu diễn trực tiếp.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '1776372904.jpg', 1, '2019-07-05 02:11:19', '2019-07-05 02:11:19'),
(11, 'Khách sạn Hoàng Phong', 200000, '<p>Đây là một khách sạn mới xây nằm trong khu quy hoạch Trần Lê. Nằm cách chợ Đà Lạt 1.2 km. Đây là một trong top những <strong>khách sạn gần chợ  mới xây có view đẹp</strong>. Được rất nhiều du khách yêu thích. Từ khách sạn du khách chỉ mất 5 phút đi xe máy. Hoặc bỏ ra tầm 20 phút tản bộ. Du khách sẽ ra được chợ Đà Lạt. Phòng ốc ở đây sạch sẽ có view hướng núi tuyệt đẹp. Ngoài ra khách sạn còn có thang máy riêng. Rất thích hợp cho những hộ gia đình có người lớn tuổi.</p>\r\n\r\n<p><img alt=\"Khách sạn view đẹp Đà Lạt\" src=\"https://du-lich-da-lat.com/wp-content/uploads/2018/07/khach-san-view-dep-da-lat.jpg\" style=\"height:639px; width:960px\" /></p>\r\n\r\n<p>Khách sạn Hoàng Phong – khách sạn view đẹp</p>\r\n\r\n<p>Du khách muốn đặt phòng khách sạn Hoàng Phong Đà Lạt. Có thể gọi ngay Hotline 02633 981 968 của khách sạn. Để được tư vấn và đặt phòng trực tiếp mà không phải qua trung gian.</p>', '1010907228.jpg', 2, '2019-07-05 02:13:08', '2019-07-05 02:13:08'),
(12, 'Khách sạn Liên Hương 2', 50000, '<p>Đây là một khách sạn mới xây tại Đà Lạt. Nằm ở một vị trí đắt địa nhất tại Đà Lạt. Khách sạn này nằm trong khu vực Golf Valley Đà Lạt. Đây là khu của thiêng đường những khách sạn mới xây đẹp. Tuy mới xây nhưng khách sạn đã chiếm trọn được biết bao trái tim của du khách. Phòng ốc ở đây sạch sẻ thoáng mát view đẹp.</p>\r\n\r\n<p><img alt=\"Khách sạn có view đẹp tại Đà Lạt\" src=\"https://du-lich-da-lat.com/wp-content/uploads/2018/07/khach-san-co-view-dep-tai-da-lat.jpg\" style=\"height:639px; width:960px\" /></p>\r\n\r\n<p>Khách sạn có view đẹp Liên Hương 2</p>\r\n\r\n<p>Ngoài ra còn có khách sạn Thảo Trâm hay khách sạn An An. Đây đều là những khách sạn tốt. Nhưng chỉ có 1 vài phòng view đẹp. Những phòng này thường hết sớm. Nhưng các phòng còn lại thì đẹp tuyệt vời. Chỉ mỗi điểm view không đẹp bằng các phòng còn lại.</p>', '1510033452.jpg', 2, '2019-07-05 02:13:46', '2019-07-05 02:13:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_san_tour`
--

CREATE TABLE `khach_san_tour` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `khach_san_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_san_tour`
--

INSERT INTO `khach_san_tour` (`id`, `tour_id`, `khach_san_id`, `created_at`, `updated_at`) VALUES
(37, 5, 9, NULL, NULL),
(38, 6, 11, NULL, NULL),
(39, 6, 9, NULL, NULL),
(40, 7, 11, NULL, NULL),
(49, 10, 11, NULL, NULL),
(51, 12, 5, NULL, NULL),
(54, 15, 11, NULL, NULL),
(62, 19, 11, NULL, NULL),
(64, 20, 12, NULL, NULL),
(66, 18, 9, NULL, NULL),
(67, 1, 9, NULL, NULL),
(68, 1, 10, NULL, NULL),
(69, 1, 11, NULL, NULL),
(70, 1, 12, NULL, NULL),
(71, 2, 7, NULL, NULL),
(72, 2, 5, NULL, NULL),
(73, 3, 11, NULL, NULL),
(74, 3, 9, NULL, NULL),
(75, 4, 7, NULL, NULL),
(76, 4, 8, NULL, NULL),
(77, 4, 5, NULL, NULL),
(78, 4, 6, NULL, NULL),
(79, 4, 3, NULL, NULL),
(80, 4, 4, NULL, NULL),
(82, 11, 12, NULL, NULL),
(83, 13, 12, NULL, NULL),
(84, 14, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitour`
--

CREATE TABLE `loaitour` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(1) NOT NULL,
  `tenloai` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `songay` int(2) NOT NULL,
  `sodem` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitour`
--

INSERT INTO `loaitour` (`id`, `type`, `tenloai`, `created_at`, `updated_at`, `songay`, `sodem`) VALUES
(1, 0, 'Tour 3 ngày 2 đêm', '2019-07-30 07:57:53', '0000-00-00 00:00:00', 3, 2),
(4, 0, 'Tour 6 ngày 5 đêm', '2019-07-30 09:35:44', '2019-07-30 09:35:44', 6, 5),
(5, 1, 'Tour 2 ngày 2 đêm', '2019-08-01 04:08:48', '2019-08-01 04:08:48', 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_07_07_102946_create_tour_table', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2019_05_19_153733_create_social_facebook_accounts_table', 2),
(4, '2019_05_19_154214_create_social_google_accounts_table', 2),
(5, '2019_05_22_094856_create_quocgia_table', 2),
(6, '2019_05_22_094907_create_tinh_table', 2),
(7, '2019_05_22_095003_create_diadanh_table', 2),
(8, '2019_05_24_112146_create_khachsan_table', 2),
(9, '2019_05_24_143140_create_nhahang_table', 2),
(10, '2019_05_24_151405_create_dattour_table', 2),
(11, '2019_05_24_151424_create_chitietdattour_table', 2),
(12, '2019_05_27_163503_create_admin_table', 2),
(13, '2019_07_04_190756_create_dia_danh_tour_table', 2),
(14, '2019_07_04_190939_create_nha_hang_tour_table', 2),
(15, '2019_07_04_190953_create_khach_san_tour_table', 2),
(16, '2019_07_04_211053_create_tinh_tour_table', 2),
(18, '2019_07_14_044502_create_ratings_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhahang`
--

CREATE TABLE `nhahang` (
  `id` int(10) UNSIGNED NOT NULL,
  `tennhahang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` double NOT NULL,
  `hinhanh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinh` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhahang`
--

INSERT INTO `nhahang` (`id`, `tennhahang`, `gia`, `hinhanh`, `noidung`, `tinh`, `created_at`, `updated_at`) VALUES
(1, 'Nhà hàng cơm niêu Hương Việt', 70000, '1690068434.jpg', '<p>Nhà hàng phục vụ khách lẻ từ 1 đến 2 người, cơm gia đình thân mật và khách đoàn du lịch.</p>\r\n\r\n<p><strong>Vị trí:</strong> Gần vườn hoa Đà Lạt, có sân riêng đậu xe 4-50 chỗ. Nhà hàng có sân, vườn hoa, khung cảnh ấm cúng, gần gũi, thoáng mát.</p>\r\n\r\n<p><strong>Địa chỉ nhà hàng cơm niêu Hương Việt:</strong> Số 41 Sương Nguyệt Ánh, phường 9, tp Đà Lạt.</p>\r\n\r\n<p>Phục vụ cơm niêu, các món ăn Việt 3 miền, ngon như cơm nhà nấu, giá rẻ như tự đi chợ, ngồi trong quán thoáng mát và sạch sẽ.</p>\r\n\r\n<p>Lẩu Atiso, lẩu hải sản, lẩu cá tầm, lẩu cá chép, lẩu gà giá 150,000 d/ lẩu cho 4-5 người ăn.</p>\r\n\r\n<p>Món ăn giá từ 25-70.000 đ/ món. Với 70,000 d/ người, khách có thể thưởng thức bữa cơm nhiêu chất lượng với cơm, nước uống và đầy đủ 4-5 món ăn với canh, kho, xào, chiên…… Tiêu chí nhà hàng là phục vụ thực khách bữa ăn ngon để nhớ mãi về Đà Lạt.<strong>Đặc biệt:</strong> Cơm niêu, canh cua cà pháo, cá kho tộ, các món rau Đà Lạt xào trộn, hoặc lẩu cùng với gà nướng mật ong ăn kèm xôi, thưởng thức trong buổi chiều se lạnh của Đà Lạt, ngon quên đường về.</p>\r\n\r\n<p>Quý khách lưu ý gọi điện đặt chỗ trước vì nhà hàng rất đông khách vào những khung giờ chính.</p>\r\n\r\n<p><strong>Liên hệ đặt chỗ trước: 0914821039. Ms_Trang</strong></p>\r\n\r\n<p><img alt=\"QuÃ¡n cÆ¡m niÃªu hÆ°Æ¡ng viá»t ÄÃ  láº¡t\" src=\"https://agotourist.com/wp-content/uploads/2016/10/com-da-lat.jpg\" /></p>', 2, '2019-07-05 01:11:17', '2019-07-05 01:33:57'),
(3, 'Nhà hàng Sunrise', 80000, '1289197857.jpg', '<p>Là một nhà hàng gồm 04 tầng, <strong>Sunrise Đà Lạt</strong> có sức chứa khoảng 1000 khách với những sảnh rất sang trọng, rất phù hợp khi cần tiếp khách.</p>\r\n\r\n<p><strong>Nhà hàng Sunrise</strong> <strong>Đà Lạt </strong>có phục vụ tiệc cưới tại mỗi tầng đều có mỗi sảnh riêng biệt. Hệ thống âm thanh ánh sáng được đầu tư khách kỉ lưỡng.</p>\r\n\r\n<p>Nhà hàng làm theo thực đơn yêu cầu hoặc thực đơn có sẵn. Mức giá trung bình tại <strong>nhà hàng Sunrise</strong> giao động từ 70.000đ/phần đến 300.000đ/phần ăn.</p>\r\n\r\n<p><strong>Nhà hàng Sunrise</strong> phục vụ bữa trưa và bữa tối, nếu đoàn nào muốn ăn sáng phải liên hệ đặt trước nhà hàng ít nhẩ một ngày.</p>\r\n\r\n<h4>Thông tin liên hệ nhà hàng Sunrise Đà Lạt.</h4>\r\n\r\n<p><strong>Địa chỉ :</strong> Số 01 Hà Huy Tập, Đà Lạt<br />\r\n<strong>Điện thoại :</strong> 063.3 533 739  _ <strong>Fax:</strong> 063.3 533 000 _ <strong>Email:</strong>sunrisedl.centre@gmail.com<br />\r\n<strong>Website :</strong>  www.sunrisedalat.com.vn  _ <strong>  Facebook :  </strong>www.facebook.com/sunrisedalat</p>\r\n\r\n<p><img alt=\"nhÃ  hÃ ng ÄÃ  láº¡t\" src=\"https://agotourist.com/wp-content/uploads/2016/10/nha-hang-sunrise.jpg\" /></p>', 2, '2019-07-05 01:32:09', '2019-07-05 01:32:09'),
(4, 'Sorae Restaurant – Lounge', 150000, '613559381.jpg', '<p><em><strong>–</strong> <strong>Địa chỉ:</strong> </em>tầng 24 – 25, AB Tower, 76A Lê Lai, quận 1, tp. HCM</p>\r\n\r\n<p><a href=\"http://alobooking.net/blog/wp-content/uploads/2016/01/nha_hang_dep_sai_gon_1.jpg\"><img alt=\"nha_hang_dep_sai_gon_1\" src=\"http://alobooking.net/blog/wp-content/uploads/2016/01/nha_hang_dep_sai_gon_1.jpg\" style=\"height:375px; width:600px\" /></a></p>\r\n\r\n<p><em><strong>– Đặc điểm:</strong></em> Sorae tọa lạc ngay trung tâm quận 1, trên tầng 24 của tòa nhà AB. Sorae có một cái nhìn bao quát 360 độ xuống toàn thành phố sầm uất. Trong không gian rộng đến 1000m2, với sức chứa hơn 350 người, Sorae mang đến một không gian ẩm thực Nhật Bản chính thống, cùng những hoạt động giải trí sang trọng như quầy bar với hàng trăm loại rượu tuyển chọn, những màn biểu diễn nhạc sống đầy quyến rũ hàng đêm và một câu lạc bộ cigar đẳng cấp.</p>\r\n\r\n<p><em><strong>– Thời gian hoạt động:</strong></em></p>\r\n\r\n<ul>\r\n	<li>Trưa: 11:30 AM – 03:00 PM</li>\r\n	<li>Tối: 05:00 PM – 01:00 AM</li>\r\n</ul>', 1, '2019-07-05 01:33:31', '2019-07-05 01:33:50'),
(5, 'The LOG Restaurant', 2000000, '1171289070.jpg', '<p><em><strong>Địa chỉ: </strong></em>tầng thượng, GEM Center, 8 Nguyễn Bỉnh Khiêm, quận 1, tp. HCM</p>\r\n\r\n<p><a href=\"http://alobooking.net/blog/wp-content/uploads/2016/01/nha_hang_dep_sai_gon_4.jpg\"><img alt=\"nha_hang_dep_sai_gon_4\" src=\"http://alobooking.net/blog/wp-content/uploads/2016/01/nha_hang_dep_sai_gon_4.jpg\" style=\"height:375px; width:600px\" /></a></p>\r\n\r\n<p><strong><em>– Đặc điểm: </em></strong>nhà hàng có thiết kế độc đáo theo phong cách Treehouse với không gian sang trọng, hiện đại và lịch sự; menu đa dạng với nhiều món ăn và rượu hảo hạng</p>\r\n\r\n<p><em><strong>– Thời gian hoạt động:</strong></em></p>\r\n\r\n<ul>\r\n	<li>Trưa: 10:30 AM – 02:00 PM</li>\r\n	<li>Tối: 06:00 PM – 11:30 PM</li>\r\n</ul>', 1, '2019-07-05 01:34:33', '2019-07-05 06:34:50'),
(6, 'Minatoya Shokuhin (みなとや食品)', 150000, '2074663600.jpg', '<p>Minatoya có hai cửa hàng nằm trên phố Ameyoko, đặc biệt nổi tiếng với món cơm donburi hải sản. Nhà hàng có thực đơn song ngữ Nhật-Anh, bao gồm những mô tả và hình ảnh minh họa cho từng món ăn được đặt phía trước cửa hàng. Tất cả các món ăn đều được làm từ những nguyên liệu tươi ngon nhất lấy trực tiếp từ chợ Tsukiji, mỗi món ăn chỉ có giá khoảng 500 yên mà thôi. Chẳng cần tới 1000 yên là bạn đã có thể ăn thỏa thích tại đây. Vị trí của cả hai cửa hàng đều rất thuận tiện, chỉ mất khoảng vài phút đi bộ từ ga Ueno hoặc Okachimachi.</p>\r\n\r\n<p><img src=\"https://www.instagram.com/p/4Isgf0yOqB/media/?size=l\" /></p>', 4, '2019-07-05 01:37:32', '2019-07-05 01:37:32'),
(8, 'Honmiyake', 70000, '932330109.jpg', '<p>Honmiyake là nhà hàng rất nổi tiếng ở thành phố Osaka. Tới đây chỉ với 9$ là bạn có thể thưởng thức món steak-don (cơm với thịt cá nướng phủ nước sốt). Giá một suất ăn trung bình ít hơn 10$.</p>\r\n\r\n<p><img alt=\"Nhà hàng ngon, rẻ nổi tiếng ở Osaka: Osaka có quán ăn nào ngon, hấp dẫn?\" src=\"https://dulich9.com/wp-content/uploads/2018/03/dia-chi-quan-an-ngon-o-Osaka-1.jpg\" style=\"height:413px; width:550px\" /></p>\r\n\r\n<p>Địa điểm ăn uống ngon rẻ ở Osaka</p>\r\n\r\n<ul>\r\n	<li><em>Địa chỉ: Hankyuu Sanbanmachi B2F, 1 Chome-1-3 Shibata Kita-ku, Osaka. </em></li>\r\n</ul>', 3, '2019-07-05 01:39:54', '2019-07-05 01:39:54'),
(9, 'Akagakiya', 70000, '1745342225.jpg', '<ul>\r\n	<li><em>Địa chỉ: 2-3F, 3 Chome-1-16 Nanba Chuo-ku, Osaka. </em></li>\r\n</ul>\r\n\r\n<p>Nhắc tới <strong>địa chỉ quán ngon ở Osaka </strong>bạn không thể bỏ qua nhà hàng Akagakiya rất nổi tiếng với món Doteyaki (gân bò nhừ). Món ăn này được ninh nhừ trong nước sốt làm từ tương đậu nành. Ghé nhà hàng bạn sẽ có cơ hội thưởng thức món ăn với hương vị tinh tế và bổ dưỡng, chỉ với 280 yên. Giá các món ăn ở đây ít nhất có giá hơn 5$.</p>\r\n\r\n<p><img alt=\"Địa chỉ quán ngon ở Osaka: Du lịch Osaka nên ăn ở đâu?\" src=\"https://dulich9.com/wp-content/uploads/2018/03/dia-chi-quan-an-ngon-o-Osaka-5.jpg\" style=\"height:309px; width:550px\" /></p>\r\n\r\n<p>Địa điểm ăn uống ngon, hấp dẫn nhất ở Osaka</p>', 3, '2019-07-05 01:40:41', '2019-07-05 01:40:41'),
(10, 'Thiên Địa Nhất Gia', 200000, '1083243231.jpg', '<h3><strong>Nhà hàng Thiên Địa Nhất Gia</strong></h3>\r\n\r\n<p><a href=\"https://air-china.vn/wp-content/uploads/nha-hang-thien-dia-nhat-gia.jpg\"><img alt=\"nha-hang-thien-dia-nhat-gia\" src=\"https://air-china.vn/wp-content/uploads/nha-hang-thien-dia-nhat-gia.jpg\" style=\"height:405px; width:600px\" /></a></p>\r\n\r\n<p>Là một trong những nhà hàng nổi tiếng nhất Bắc Kinh, có vị trí trung tâm tuyệt đẹp ngay cạnh Tử Cấm Thành. Nhà hàng luôn thu hút đông đảo khách hàng từ lúc mở cửa đến lúc hết giờ làm việc. Bởi sự sang trọng, phong cách bố trí hợp lý, bắt mắt, phục vụ chu đáo và những món ăn ở đây mang đậm bản sắc của Trung Hoa, nhà hàng luôn là điểm đến ăn uống được khách hàng lựa chọn đầu tiên.</p>\r\n\r\n<p><strong>Địa chỉ</strong> <em>: 140 đường Nan Chi Zi, quận Dong Cheng, Beijing</em></p>', 5, '2019-07-05 01:41:40', '2019-07-05 01:41:40'),
(11, 'Kim Thiên Đỉnh', 150000, '1929539728.jpg', '<h3><strong>Nhà hàng Kim Thiên Đỉnh</strong></h3>\r\n\r\n<p><a href=\"https://air-china.vn/wp-content/uploads/kim-thien-dinh.jpg\"><img alt=\"kim-thien-dinh\" src=\"https://air-china.vn/wp-content/uploads/kim-thien-dinh.jpg\" style=\"height:400px; width:600px\" /></a></p>\r\n\r\n<p>Kim Thiên Đỉnh nổi tiếng ở Trung Hoa và được nhiều người biết đến bởi hệ thống nhà hàng lến tới 18 cơ sở hoạt động được phân bố khắc nơi. Đây là nơi thích hợp nhất để thưởng thức những món ăn điểm tâm, món ăn nhẹ mang hương vị truyền thống của Trung Hoa như : sủi cảo, màn thầu, mỳ hoành thánh, các món chè,…Kim Thiên Đỉnh là một trong số ít những nhà hàng nổi tiếng ở Trung Quốc phục vụ khách hàng 24/24.</p>\r\n\r\n<p><strong>Địa chỉ :</strong> <em>77 Heping Xijie, quận Dongcheng, Beijing</em></p>', 5, '2019-07-05 01:42:20', '2019-07-05 01:42:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_hang_tour`
--

CREATE TABLE `nha_hang_tour` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `nha_hang_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_hang_tour`
--

INSERT INTO `nha_hang_tour` (`id`, `tour_id`, `nha_hang_id`, `created_at`, `updated_at`) VALUES
(34, 5, 4, NULL, NULL),
(35, 6, 4, NULL, NULL),
(36, 6, 1, NULL, NULL),
(37, 7, 1, NULL, NULL),
(46, 10, 1, NULL, NULL),
(48, 12, 6, NULL, NULL),
(51, 15, 1, NULL, NULL),
(59, 19, 1, NULL, NULL),
(61, 20, 1, NULL, NULL),
(63, 18, 4, NULL, NULL),
(64, 1, 4, NULL, NULL),
(65, 1, 5, NULL, NULL),
(66, 1, 1, NULL, NULL),
(67, 1, 3, NULL, NULL),
(68, 2, 8, NULL, NULL),
(69, 2, 6, NULL, NULL),
(70, 3, 1, NULL, NULL),
(71, 3, 4, NULL, NULL),
(72, 4, 8, NULL, NULL),
(73, 4, 9, NULL, NULL),
(74, 4, 6, NULL, NULL),
(75, 4, 10, NULL, NULL),
(76, 4, 11, NULL, NULL),
(78, 11, 3, NULL, NULL),
(79, 13, 1, NULL, NULL),
(80, 14, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `post` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `userid`, `post`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'Hello', 1, '2019-08-02 04:29:15', '2019-08-02 04:29:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quocgia`
--

CREATE TABLE `quocgia` (
  `maquocgia` int(10) UNSIGNED NOT NULL,
  `quocnoi` tinyint(1) NOT NULL,
  `tenquocgia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quocgia`
--

INSERT INTO `quocgia` (`maquocgia`, `quocnoi`, `tenquocgia`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Việt Nam', '626300503.png', '2019-07-04 07:35:28', '2019-07-05 05:00:42'),
(2, 0, 'Nhật Bản', '256415899.png', '2019-07-04 07:39:17', '2019-07-05 07:04:29'),
(3, 0, 'Trung Quốc', '2044886143.png', '2019-07-04 07:40:16', '2019-07-05 06:56:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `rateable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rateable_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ratings`
--

INSERT INTO `ratings` (`id`, `created_at`, `updated_at`, `rating`, `rateable_type`, `rateable_id`, `user_id`) VALUES
(5, '2019-07-23 15:43:22', '2019-07-23 15:43:22', 5, 'App\\Models\\Tour', 3, 1),
(6, '2019-07-23 15:44:19', '2019-07-23 15:44:19', 2, 'App\\Models\\Tour', 1, 1),
(7, '2019-07-23 20:55:55', '2019-07-23 20:55:55', 3, 'App\\Models\\Tour', 3, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_facebook_accounts`
--

CREATE TABLE `social_facebook_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `social_facebook_accounts`
--

INSERT INTO `social_facebook_accounts` (`id`, `user_id`, `provider_user_id`, `provider`, `created_at`, `updated_at`) VALUES
(1, 1, '1048957781960191', 'facebook', '2019-07-06 09:14:03', '2019-07-06 09:14:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_google_accounts`
--

CREATE TABLE `social_google_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `social_google_accounts`
--

INSERT INTO `social_google_accounts` (`id`, `user_id`, `provider_user_id`, `provider`, `created_at`, `updated_at`) VALUES
(1, 1, '105971733798964988822', 'google', '2019-07-06 08:51:38', '2019-07-06 08:51:38'),
(2, 2, '102243045333632596412', 'google', '2019-07-13 11:47:54', '2019-07-13 11:47:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinchung`
--

CREATE TABLE `thongtinchung` (
  `id` int(11) UNSIGNED NOT NULL,
  `flightno` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `day` int(2) NOT NULL,
  `adress` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongtinchung`
--

INSERT INTO `thongtinchung` (`id`, `flightno`, `day`, `adress`, `phone`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'VN003', 4, 'Tokyo Hotels', '0355455454', 2, '2019-07-15 18:14:50', '2019-07-15 18:14:50'),
(2, 'VN200', 6, 'Osaka', '112556644', 1, '2019-07-15 22:25:25', '0000-00-00 00:00:00'),
(3, 'VN02', 2, 'Kyoto', '1212564', 1, '2019-07-15 23:05:00', '2019-07-15 23:05:00'),
(4, 'VN0211', 2, 'ssss', '123123123', 1, '2019-07-15 23:07:04', '2019-07-15 23:07:04'),
(5, 'VN02112', 2, 'ssss', '123123123', 1, '2019-07-15 23:18:16', '2019-07-15 23:18:16'),
(6, 'sadas', 123, '123', '123123123', 1, '2019-07-15 23:37:47', '2019-07-15 23:37:47'),
(7, 'dsdfs', 2, '1', '2', 1, '2019-07-15 23:40:52', '2019-07-15 23:40:52'),
(8, 'VN1997', 5, 'Khách sạn', '0123654789', 1, '2019-07-16 00:23:12', '2019-07-16 00:23:12'),
(9, 'VN1111', 3, 'Khách Sạn ToKYo', '12121256564', 2, '2019-07-16 00:25:21', '2019-07-16 00:25:21'),
(10, 'VN44444', 2, 'TOKUASDA', '234234234', 1, '2019-07-16 00:28:22', '2019-07-16 00:28:22'),
(11, 's23', 23, '23', '23', 1, '2019-07-16 00:28:56', '2019-07-16 00:28:56'),
(12, '23423', 4234, '234234', '234', 1, '2019-07-16 00:29:09', '2019-07-16 00:29:09'),
(13, 'dfas', 21, 'ấà', '212', 2, '2019-07-16 00:38:08', '2019-07-16 00:38:08'),
(14, '212', 22, 'ádasd', '1sdfsdf', 2, '2019-07-16 00:41:44', '2019-07-16 00:41:44'),
(15, '1112', 2, 'adasd', 'ád', 2, '2019-07-16 00:42:17', '2019-07-16 00:42:17'),
(16, '12e3123', 214, '123124', '12414', 2, '2019-07-16 00:43:30', '2019-07-16 00:43:30'),
(17, 'vcsdfs', 3, '23242', '4234234', 2, '2019-07-16 00:44:16', '2019-07-16 00:44:16'),
(18, 'ádasda', 2, 'ádas', 'đâsd', 2, '2019-07-16 00:44:50', '2019-07-16 00:44:50'),
(19, 'a', 2232, '23424', '234324', 2, '2019-07-16 00:48:34', '2019-07-16 00:48:34'),
(20, 'aa', 234324, '23423', '423424', 2, '2019-07-16 00:48:47', '2019-07-16 00:48:47'),
(21, 'bb', 2434, 'sfsdf', 'sdfdsf', 2, '2019-07-16 00:49:18', '2019-07-16 00:49:18'),
(22, 'cc', 1231, '312312', '312312', 2, '2019-07-16 00:49:47', '2019-07-16 00:49:47'),
(23, 'vvvvvvvv', 12, 'aaaaaaa', '22222222', 2, '2019-07-20 16:03:52', '2019-07-20 16:03:52'),
(24, 'aaa22', 1, '13213', '22222222', 2, '2019-07-20 16:04:24', '2019-07-20 16:04:24'),
(25, 'ádasd', 12, 'sdfsdf', '2342423', 2, '2019-07-20 16:04:49', '2019-07-20 16:04:49'),
(26, 'ss', 23, 'dssd', '32x', 5, '2019-07-23 20:10:53', '2019-07-23 20:10:53'),
(27, 'aaaaaaa', 3, 'sdfsdf', 'sdf', 5, '2019-07-23 20:13:32', '2019-07-23 20:13:32'),
(28, '2222', 2, '2', '2', 5, '2019-07-23 20:14:54', '2019-07-23 20:14:54'),
(29, '1312312', 23, '213123', '34', 5, '2019-07-23 20:16:05', '2019-07-23 20:16:05'),
(30, 'aaa', 12, 'đá', '0345678932', 5, '2019-07-23 20:30:33', '2019-07-23 20:30:33'),
(31, 'aaaaaaa', 1, 'aaaaaaa', '.0395563446', 5, '2019-07-23 20:33:48', '2019-07-23 20:33:48'),
(32, 'fffffff', 4, 'fddđ', '01695563446', 5, '2019-07-24 20:30:53', '2019-07-24 20:30:53'),
(33, 'VN002', 3, 'Tokyo Hot 123 Streets', '01695563446', 5, '2019-07-24 23:19:58', '2019-07-24 23:19:58'),
(34, 'aaaaaaa', 2, 'sssssssssss', '0395563446', 5, '2019-08-01 05:53:24', '2019-08-01 05:53:24'),
(35, 'aaaaaaa', 2, '51 Nguyễn thị tú , Q bình tân', '0395563446', 5, '2019-08-01 05:54:30', '2019-08-01 05:54:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh`
--

CREATE TABLE `tinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `tentinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quocgia` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinh`
--

INSERT INTO `tinh` (`id`, `tentinh`, `quocgia`, `created_at`, `updated_at`) VALUES
(1, 'Hồ Chí Minh', 1, '2019-07-04 07:44:04', '2019-07-04 07:44:04'),
(2, 'Đà Lạt', 1, '2019-07-04 07:45:11', '2019-07-04 07:45:11'),
(3, 'Osaka', 2, '2019-07-04 07:45:35', '2019-07-04 07:45:35'),
(4, 'Tokyo', 2, '2019-07-04 07:45:44', '2019-07-04 07:45:44'),
(5, 'Bắc Kinh', 3, '2019-07-04 07:45:55', '2019-07-04 07:45:55'),
(6, 'Phan Thiết', 1, '2019-07-24 21:39:23', '2019-07-24 21:39:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh_tour`
--

CREATE TABLE `tinh_tour` (
  `id` int(10) UNSIGNED NOT NULL,
  `tour_id` int(11) NOT NULL,
  `tinh_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinh_tour`
--

INSERT INTO `tinh_tour` (`id`, `tour_id`, `tinh_id`, `created_at`, `updated_at`) VALUES
(24, 5, 1, NULL, NULL),
(25, 6, 1, NULL, NULL),
(26, 6, 2, NULL, NULL),
(27, 7, 2, NULL, NULL),
(34, 10, 2, NULL, NULL),
(36, 12, 4, NULL, NULL),
(39, 15, 2, NULL, NULL),
(47, 19, 2, NULL, NULL),
(49, 20, 2, NULL, NULL),
(51, 18, 1, NULL, NULL),
(52, 1, 1, NULL, NULL),
(53, 1, 2, NULL, NULL),
(54, 2, 3, NULL, NULL),
(55, 2, 4, NULL, NULL),
(56, 3, 1, NULL, NULL),
(57, 3, 2, NULL, NULL),
(58, 4, 3, NULL, NULL),
(59, 4, 4, NULL, NULL),
(60, 4, 5, NULL, NULL),
(62, 11, 2, NULL, NULL),
(63, 13, 2, NULL, NULL),
(64, 14, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `id` int(10) UNSIGNED NOT NULL,
  `in_out` tinyint(1) NOT NULL,
  `loaitour_id` int(10) UNSIGNED NOT NULL,
  `tentour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaykhoihanh` datetime DEFAULT NULL,
  `soluong` int(3) DEFAULT NULL,
  `giaembe` int(10) DEFAULT NULL,
  `giatreem` int(10) DEFAULT NULL,
  `gianguoilon` int(10) DEFAULT NULL,
  `diemxuatphat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `khuyenmai` int(3) DEFAULT NULL,
  `hinhanh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tour`
--

INSERT INTO `tour` (`id`, `in_out`, `loaitour_id`, `tentour`, `ngaykhoihanh`, `soluong`, `giaembe`, `giatreem`, `gianguoilon`, `diemxuatphat`, `noidung`, `khuyenmai`, `hinhanh`, `created_at`, `updated_at`) VALUES
(1, 0, 5, 'DU LỊCH PHAN THIẾT - MŨI NÉ - LÀNG CHÀI XƯA 3 NGÀY 2 ĐÊM', NULL, NULL, NULL, NULL, 10000, 'Hồ Chí Minh', '<p><strong>Tour này có gì hay</strong></p>\r\n\r\n<p>- Tham quan không gian trưng bày nghệ thuật “Làng chài xưa”</p>\r\n\r\n<p>- Chụp hình và thường thức rượu tại Lâu Đài Rượu Vang</p>\r\n\r\n<p>- Xem show nhạc kịch nước Huyền Thoại Làng Chài<br />\r\n </p>\r\n\r\n<p>Đến Phan Thiết quý khách tham quan<strong> không gian trưng bày nghệ thuật “Làng chài xưa”</strong>. Toàn bộ khu trưng bày có diện tích 1.600m² -  không gian trưng bày nghệ thuật và là bảo tàng thu nhỏ, tái hiện lại một phần làng chài xưa của Phan Thiết - Mũi Né cách đây hơn 300 năm. Du khách đến đây sẽ được tham quan làng chài dưới rặng dừa; phố cổ ven sông Cà Ty; nhà ở và nơi sản xuất nước mắm của hàm hộ Phan Thiết; con đường Phan Thiết - Mũi Né xưa; đắm mình vào biển Mũi Né 3D và mua sắm trong không gian chợ quê làng xưa… tận mắt được chứng kiến một làng chài xưa của xứ biển Phan Thiết được tái hiện một cách công phu.<br />\r\nNhận phòng và tự do tắm biển tại resort. Nghỉ đêm tại Mũi Né.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://saigontourist.net/uploads/destination/TrongNuoc/Phanthiet/Mui-Ne-beach_1085130752.jpg\" /><strong>Biển Mũi Né.</strong></p>\r\n\r\n<p><strong>THAM QUAN MŨI NÉ - XEM NHẠC KỊCH FISHER MEN SHOW (Ăn sáng, trưa, chiều)</strong><br />\r\nBuổi sáng quý khách nghĩ dưỡng trong resort. Buổi chiều, quý khách tham quan <strong>Lâu Đài Rượu Vang</strong> .Vào Hòn Rơm tham quan thắng cảnh <strong>đồi cát vàng</strong>.<br />\r\nBuổi tối, xe đưa quý khách đến xem <strong>show nhạc kịch nước Huyền Thoại Làng Chài </strong>- show giải trí đặc sắc và đậm nét văn hóa làng chài của Phan Thiết - Bình Thuận. Đây là show kịch múa được dàn dựng công phu trên sân khấu nhạc nước đầu tiên và duy nhất tại Việt Nam, áp dụng công nghệ 2D và 3D mới nhất hiện nay. Với thời lượng 1 tiếng cùng kịch bản được dày công biên soạn, sáng tác theo trường phái giả tưởng, dựa theo những truyền thuyết dân gian và huyền thoại về làng chài và biển cả, show trình diễn hứa hẹn mang lại nhiều cảm xúc đến khán giả với các cao trào và tình tiết của câu chuyện cùng những hiệu ứng đặc biệt từ sân khấu nhạc nước đầy mãn nhãn.<br />\r\nNghỉ đêm tại Mũi Né.</p>\r\n\r\n<p style=\"text-align:center\"><img alt=\"\" src=\"https://saigontourist.net/uploads/destination/TrongNuoc/Phanthiet/Wine-Castle_1092684689.jpg\" /><strong>Lâu Đài Rượu Vang</strong></p>\r\n\r\n<p> </p>\r\n\r\n<p><em><strong>Ghi chú:</strong> Điểm tham quan có thể sắp xếp lại cho phù hợp mà vẫn bảo đảm đầy đủ nội dung của từng chương trình.</em></p>', NULL, '848966898.jpg', '2019-07-07 04:03:42', '2019-08-01 06:17:31'),
(2, 1, 5, 'Phú Yên - Đảo Nhất Tự Sơn - Quy Nhơn (Máy bay. Nghỉ dưỡng 1 đêm Resort FLC 5*)', NULL, NULL, NULL, NULL, NULL, 'Hồ Chí Minh', '<p>Nội dung tour 2</p>', NULL, '1007148662.jpg', '2019-07-07 04:06:10', '2019-08-01 06:19:01'),
(3, 0, 5, 'Tour Phú Quốc - Ngắm hoàng hôn tại Sunset Sanato', NULL, NULL, NULL, NULL, NULL, 'Đà Lạt', '<p>Nội dung tour 3</p>', NULL, '312372700.jpg', '2019-07-07 08:42:18', '2019-08-01 06:19:58'),
(4, 1, 5, 'Du lịch Trung Quốc - Nhật Bản', NULL, NULL, NULL, NULL, NULL, 'Hồ Chí Minh', '<p>Một trong những địa điểm du lịch nổi tiếng nhất ở Osaka là <strong>Dotonbori</strong>.</p>\r\n\r\n<p>Đặc điểm của khu này là những tấm biển hiệu khổng lồ nối dài. Các biển hiệu rất ăn ảnh có ở khắp mọi nơi như biển hiệu 1 người đang chạy đưa 2 tay lên cao của công ty sản xuất bánh kẹo Glico, hay biển hiệu có hình con cua đang chuyển động,...Nếu xem vào buổi tối được thắp điện sáng, các bạn sẽ thấy choáng ngợp bởi sự lôi cuốn của nó.</p>\r\n\r\n<p><img alt=\"éé å \" src=\"https://resources.matcha-jp.com/resize/720x2000/2018/03/14-50337.jpeg\" /></p>\r\n\r\n<p>Đây là thuỷ cung cỡ lớn tiêu biểu của Nhật. Địa điểm lôi cuốn là bể nước thuộc dạng lớn nhất thế giới có sức chứa đến 5,400 tấn. Hình ảnh cá mập voi cực lớn bơi lội giữa đám cá mập, cá đuối thật sự lôi cuốn.</p>\r\n\r\n<p>Cùng với vòng quay khổng lồ Tempozan gần đó thì đây cũng là địa điểm hẹn hò yêu thích của người dân địa phương</p>\r\n\r\n<p><img alt=\"æµ·éé¤¨\" src=\"https://resources.matcha-jp.com/resize/720x2000/2018/03/12-50194.jpeg\" /></p>\r\n\r\n<p>Shibuya là một trong những nơi nổi tiếng nhất tại Tokyo Nhật Bản với xu hướng thời trang đầy màu sắc và giải trí của Nhật Bản. Nhắc đến Shibuya chắc ít nhiều bạn cũng nhớ đến câu chuyện cảm động về chú chó trung thành mang tên Hachiko, nó đã ngồi ở cửa nhà ga Shibuya và chờ đợi chủ của mình ròng rã hơn 9 năm.</p>\r\n\r\n<p><img alt=\"Top 12 điểm du lịch Tokyo Nhật Bản không thể bỏ qua\" src=\"https://intertour.vn/blog/upload/blog/giao-lo-shibuya-tokyo_20160223173046574.jpg\" /></p>\r\n\r\n<p>Công viên Tokyo DisneySea được lấy cảm hứng từ những huyền thoại và truyền thuyết của biển, nó được phân chia thành 7 khu vực đặc trưng với những chủ đề khác nhau. Ở đây có nhiều trò chơi hấp dẫn cũng như các buổi biển diễn đặc sắc thích hợp với mọi lứa tuổi dù lớn hay nhỏ. Điểm đặc biệt ở công viên này là tùy vào từng mùa mà có những chương trình khác nhau, dẫn đến lượt khách du lịch Tokyo hàng năm đổ về nhiều vô số kể</p>\r\n\r\n<p><img alt=\"Top 12 Äiá»m du lá»ch Tokyo Nháº­t Báº£n khÃ´ng thá» bá» qua\" src=\"https://intertour.vn/blog/upload/blog/cong-vien-toyko-disneysea_20160218104910404.jpg\" /></p>', NULL, '1459496332.jpg', '2019-07-24 21:56:44', '2019-08-01 06:23:46'),
(11, 0, 5, 'MŨI NÉ', NULL, NULL, NULL, NULL, NULL, 'Đà Lạt', '<p>ssssssssssss</p>', NULL, '161054463.jpg', '2019-07-30 10:19:05', '2019-08-01 06:31:48'),
(13, 0, 5, 'Tour Phú Quốc', NULL, NULL, NULL, NULL, NULL, 'Đà Lạt', '<p>ssssssssssssssssss</p>', NULL, '515552900.jpg', '2019-07-30 10:23:05', '2019-08-01 06:32:15'),
(14, 1, 4, 'Du lịch Trung Quốc - Nhật Bản', NULL, NULL, NULL, NULL, NULL, 'Hồ Chí Minh', '<p>âsasas</p>', NULL, '1267132343.jpg', '2019-07-30 10:46:51', '2019-08-01 06:32:52'),
(15, 0, 1, 'Du lịch Trung Quốc - Nhật Bản', '2019-08-14 00:00:00', 15, 15000, 120000, 250000, 'Đà Lạt', '<p>ssssssssss</p>', 0, '996391484.jpg', '2019-07-30 10:47:37', '2019-07-30 10:47:37'),
(18, 0, 5, 'Du lịch Trung Quốc - Nhật Bản', NULL, NULL, NULL, NULL, NULL, 'Hồ Chí Minh', '<p>sdfghjkl;sdxfcgvhbjnkml,;zsxcfvbnm,.aszxdcfvgbnjmk,.xcvbnm,.</p>', NULL, '1662730953.PNG', '2019-08-01 04:22:39', '2019-08-01 06:14:56'),
(19, 0, 5, 'Tour Phú Quốc - Ngắm hoàng hôn tại Sunset Sanato', NULL, NULL, NULL, NULL, NULL, 'Hồ Chí Minh', '<p>dfghjklcvbnm,cvbnm,./</p>', NULL, '680370718.PNG', '2019-08-01 05:17:40', '2019-08-01 06:09:46'),
(20, 0, 5, 'MŨI NÉ 2', NULL, NULL, NULL, NULL, NULL, 'Hồ Chí Minh', '<p>bmbmjbmjbmjbm</p>', NULL, '783042334.PNG', '2019-08-01 06:12:29', '2019-08-01 06:13:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuchon`
--

CREATE TABLE `tuchon` (
  `id` int(11) NOT NULL,
  `tour_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tongtien` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tuchon`
--

INSERT INTO `tuchon` (`id`, `tour_id`, `user_id`, `tongtien`, `status`, `created_at`, `updated_at`) VALUES
(42, 1, 2, '1,530,000', 0, '2019-07-23 01:19:41', '2019-07-23 01:19:41'),
(57, 1, 2, '1,150,000', 0, '2019-07-23 10:05:11', '2019-07-23 10:05:11'),
(58, 4, 1, '1,170,000', 0, '2019-07-27 04:08:07', '2019-07-27 04:08:07'),
(59, 1, 1, '1,720,000', 0, '2019-07-30 11:19:39', '2019-07-30 11:19:39'),
(60, 2, 1, '810,000', 0, '2019-07-30 11:21:13', '2019-07-30 11:21:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tuân Lê', 'mr.tuan.cb@gmail.com', NULL, '$2y$10$cnGPFynXPE8jpMkZyMLnw.7stLv2lQinieJDPlEcgLo71MIlDUtmy', 1, 'miM3hvhplmgVVYxgUD08BWJLTHux7JX1cmPQbc8hhw6Oo6MaNlIsZB6zYdog', NULL, '2019-07-06 08:51:38', '2019-08-02 04:15:14'),
(2, 'tuanlee', 'letuan30697@gmail.com', NULL, '$2y$10$cW85O6jS6m72Zw7bz7TjYeuRDOPUwy0ygPNUqu6L3PlyoWwtRL8ie', 1, '68sfhvhplmgV32gUD08BWJLTHux7JX1cmPQbc8hhw6Oo6MaNlIsZB6zYdog3', NULL, '2019-07-06 08:57:17', '2019-08-02 04:15:14'),
(5, 'Admin', 'admin@vinatour', NULL, '$2y$10$QO0ykr68xKsuCl0Ct7WOeuon8O4L3Lh/TPztotm1DWZFkCz0kjUJe', 3, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `chitietdattour`
--
ALTER TABLE `chitietdattour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dondattour_id` (`dondattour_id`);

--
-- Chỉ mục cho bảng `chitiettuchon`
--
ALTER TABLE `chitiettuchon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tuchon_id` (`tuchon_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`);

--
-- Chỉ mục cho bảng `danhsachin`
--
ALTER TABLE `danhsachin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ttc_id` (`ttc_id`);

--
-- Chỉ mục cho bảng `diadanh`
--
ALTER TABLE `diadanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diadanh_tinh_foreign` (`tinh`);

--
-- Chỉ mục cho bảng `dia_danh_tour`
--
ALTER TABLE `dia_danh_tour`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dondattour`
--
ALTER TABLE `dondattour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Chỉ mục cho bảng `khachsan`
--
ALTER TABLE `khachsan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khachsan_tinh_foreign` (`tinh`);

--
-- Chỉ mục cho bảng `khach_san_tour`
--
ALTER TABLE `khach_san_tour`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaitour`
--
ALTER TABLE `loaitour`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhahang`
--
ALTER TABLE `nhahang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhahang_tinh_foreign` (`tinh`);

--
-- Chỉ mục cho bảng `nha_hang_tour`
--
ALTER TABLE `nha_hang_tour`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Chỉ mục cho bảng `quocgia`
--
ALTER TABLE `quocgia`
  ADD PRIMARY KEY (`maquocgia`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_rateable_type_rateable_id_index` (`rateable_type`,`rateable_id`),
  ADD KEY `ratings_rateable_id_index` (`rateable_id`),
  ADD KEY `ratings_rateable_type_index` (`rateable_type`),
  ADD KEY `ratings_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `social_facebook_accounts`
--
ALTER TABLE `social_facebook_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_facebook_accounts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `social_google_accounts`
--
ALTER TABLE `social_google_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_google_accounts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `thongtinchung`
--
ALTER TABLE `thongtinchung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `tinh`
--
ALTER TABLE `tinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tinh_quocgia_foreign` (`quocgia`);

--
-- Chỉ mục cho bảng `tinh_tour`
--
ALTER TABLE `tinh_tour`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaitour_id` (`loaitour_id`);

--
-- Chỉ mục cho bảng `tuchon`
--
ALTER TABLE `tuchon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT cho bảng `chitietdattour`
--
ALTER TABLE `chitietdattour`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `chitiettuchon`
--
ALTER TABLE `chitiettuchon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1434;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `danhsachin`
--
ALTER TABLE `danhsachin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `diadanh`
--
ALTER TABLE `diadanh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `dia_danh_tour`
--
ALTER TABLE `dia_danh_tour`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `dondattour`
--
ALTER TABLE `dondattour`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `khachsan`
--
ALTER TABLE `khachsan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `khach_san_tour`
--
ALTER TABLE `khach_san_tour`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `loaitour`
--
ALTER TABLE `loaitour`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `nhahang`
--
ALTER TABLE `nhahang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `nha_hang_tour`
--
ALTER TABLE `nha_hang_tour`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `quocgia`
--
ALTER TABLE `quocgia`
  MODIFY `maquocgia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `social_facebook_accounts`
--
ALTER TABLE `social_facebook_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `social_google_accounts`
--
ALTER TABLE `social_google_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `thongtinchung`
--
ALTER TABLE `thongtinchung`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `tinh`
--
ALTER TABLE `tinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tinh_tour`
--
ALTER TABLE `tinh_tour`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tuchon`
--
ALTER TABLE `tuchon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietdattour`
--
ALTER TABLE `chitietdattour`
  ADD CONSTRAINT `chitietdattour_ibfk_1` FOREIGN KEY (`dondattour_id`) REFERENCES `dondattour` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitiettuchon`
--
ALTER TABLE `chitiettuchon`
  ADD CONSTRAINT `chitiettuchon_ibfk_1` FOREIGN KEY (`tuchon_id`) REFERENCES `tuchon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `danhsachin`
--
ALTER TABLE `danhsachin`
  ADD CONSTRAINT `danhsachin_ibfk_1` FOREIGN KEY (`ttc_id`) REFERENCES `thongtinchung` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `diadanh`
--
ALTER TABLE `diadanh`
  ADD CONSTRAINT `diadanh_tinh_foreign` FOREIGN KEY (`tinh`) REFERENCES `tinh` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dondattour`
--
ALTER TABLE `dondattour`
  ADD CONSTRAINT `dondattour_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dondattour_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `tour` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khachsan`
--
ALTER TABLE `khachsan`
  ADD CONSTRAINT `khachsan_tinh_foreign` FOREIGN KEY (`tinh`) REFERENCES `tinh` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `nhahang`
--
ALTER TABLE `nhahang`
  ADD CONSTRAINT `nhahang_tinh_foreign` FOREIGN KEY (`tinh`) REFERENCES `tinh` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `social_facebook_accounts`
--
ALTER TABLE `social_facebook_accounts`
  ADD CONSTRAINT `social_facebook_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `social_google_accounts`
--
ALTER TABLE `social_google_accounts`
  ADD CONSTRAINT `social_google_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `thongtinchung`
--
ALTER TABLE `thongtinchung`
  ADD CONSTRAINT `thongtinchung_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tinh`
--
ALTER TABLE `tinh`
  ADD CONSTRAINT `tinh_quocgia_foreign` FOREIGN KEY (`quocgia`) REFERENCES `quocgia` (`maquocgia`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`loaitour_id`) REFERENCES `loaitour` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tuchon`
--
ALTER TABLE `tuchon`
  ADD CONSTRAINT `tuchon_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tuchon_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `tour` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
