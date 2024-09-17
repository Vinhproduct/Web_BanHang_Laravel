-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 17, 2024 lúc 07:11 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nguyenvanvinh_2121110328`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nvv_banner`
--

CREATE TABLE `nvv_banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nvv_banner`
--

INSERT INTO `nvv_banner` (`id`, `name`, `image`, `link`, `position`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(4, 'Slider2', 'slider1.jpg', '#', 'slideshow', NULL, 1, 1, '2023-10-17 09:15:58', '2023-10-28 05:38:33', 1),
(6, 'vinh', 'slider3.jpg', '#', 'slideshow', 'dsadcxzcxcx', 1, 1, '2023-10-28 05:51:04', '2023-10-31 05:27:48', 1),
(13, 'Đổi tên', 'slider4.jpg', '#', 'slideshow', 'dsadcxzcxcx', 1, 1, '2023-10-28 05:51:04', '2023-10-31 05:27:48', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nvv_brand`
--

CREATE TABLE `nvv_brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `description` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nvv_brand`
--

INSERT INTO `nvv_brand` (`id`, `name`, `slug`, `image`, `sort_order`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 'Việt Nam', 'viet-nam', 'viet-nam.jpg', 1, 'Thương Hiệu Đến Từ Việt Nam', '2024-06-30 22:07:21', '2024-06-30 22:07:21', 6, 1, 1),
(2, 'Hàn Quốc', 'han-quoc', 'han-quoc.png', 1, 'Thương Hiệu Đến Từ Hàn Quốc', '2024-06-30 22:06:39', '2024-06-30 22:06:39', 6, 1, 1),
(5, 'Trung Quốc', 'trung-quoc', 'trung-quoc.png', 1, 'Thương Hiệu Đến Từ Trung Quốc', '2024-06-30 22:07:10', '2024-06-30 22:07:10', 6, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nvv_category`
--

CREATE TABLE `nvv_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `description` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nvv_category`
--

INSERT INTO `nvv_category` (`id`, `name`, `slug`, `image`, `parent_id`, `sort_order`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 'Giày Nữ', 'giay-nu', 'giay-nu.jpg', 0, 0, 'Giày Nữ', '2024-07-01 01:38:47', '2024-07-01 01:38:48', 6, 1, 1),
(2, 'Mũ Nón', 'mu-non', 'mu-non.jpg', 0, 0, 'Đồ nữ', '2024-07-01 01:38:35', '2024-07-01 01:38:35', 6, 1, 1),
(3, 'Nhẫn Thời Trang', 'nhan-thoi-trang', 'nhan-thoi-trang.jpg', 0, 0, 'Nhẫn Thời Trang', '2024-07-01 01:38:18', '2024-07-01 01:38:18', 6, 1, 1),
(4, 'Lợi đep', 'ao-so-mi-nam', 'Team3.e4cabd1.png', 1, 0, 'Áo sơ mi nam', '2022-11-22 11:18:53', '2024-07-01 01:37:43', 1, 6, 0),
(5, 'Túi Xách', 'tui-xach', 'tui-xach.jpg', 1, 0, 'Túi Xách', '2024-07-01 01:38:03', '2024-07-01 01:38:03', 6, 1, 1),
(6, 'Quần Dài Nam', 'quan-dai-nam', 'Team3.e4cabd1.png', 1, 0, 'Túi Xách', '2022-11-22 11:19:57', '2024-07-01 01:37:39', 1, 6, 0),
(7, 'Áo thun nữ', 'ao-thun-nu', 'Team3.e4cabd1.png', 2, 0, 'Áo thun nữ', '2022-11-22 11:21:27', '2024-07-01 01:37:37', 1, 6, 0),
(8, 'Áo sơ mi nữ', 'ao-so-mi-nu', 'Team3.e4cabd1.png', 2, 0, 'Áo sơ mi nữ', '2022-11-22 11:21:43', '2024-07-01 01:37:35', 1, 6, 0),
(9, 'Áo kiểu', 'ao-kieu', 'Team3.e4cabd1.png', 2, 0, 'Áo kiểu', '2022-11-22 11:22:00', '2024-07-01 01:37:33', 1, 6, 0),
(10, 'Quần short nữ', 'quan-short-nu', 'Team3.e4cabd1.png', 2, 0, 'Quần short nữ', '2022-11-22 11:22:14', '2024-07-01 01:37:28', 1, 6, 0),
(11, 'Quần dài nữ', 'quan-dai-nu', 'Team3.e4cabd1.png', 2, 0, 'Quần dài nữ', '2022-11-22 11:22:48', '2024-07-01 01:37:20', 1, 6, 0),
(12, 'Chân váy', 'chan-vay', 'Team3.e4cabd1.png', 2, 0, 'Chân váy', '2022-11-22 11:23:07', '2024-07-01 01:36:59', 1, 6, 0),
(13, 'Ho Diên Lợi 23333', 'ho-dien-loi-23333', 'Team3.e4cabd1.png', 8, 1, 'fsdfsfdf', '2023-03-02 18:35:22', '2023-03-16 17:50:02', 1, 1, 0),
(14, 'sdfdsfds', 'sdfdsfds', 'Team3.e4cabd1.png', 0, 0, 'áds', '2023-03-02 18:57:32', '2023-03-16 17:50:00', 1, 1, 0),
(15, 'dfsdf', 'dfsdf', 'Team3.e4cabd1.png', 0, 0, 'sdfdsfd', '2023-03-02 19:01:21', '2023-03-16 17:49:59', 1, 1, 0),
(16, 'zxcxc', 'zxcxc', 'Team3.e4cabd1.png', 0, 0, 'cxzc', '2023-03-02 20:42:01', '2023-03-16 17:49:58', 1, 1, 0),
(17, 'xfsdf', 'xfsdf', 'Team3.e4cabd1.png', 0, 0, 'fdsfds', '2023-03-02 20:44:50', '2023-03-16 17:49:56', 1, 1, 0),
(18, 'Giày nam 2023', 'giay-nam-2023', 'Team3.e4cabd1.png', 0, 0, 'xzcxzc', '2023-03-02 21:06:58', '2023-03-16 17:49:52', 1, 1, 0),
(19, 'sấdsa', 'sadsa', 'Team3.e4cabd1.png', 11, 1, 'dsadsad', '2023-03-16 17:59:57', '2023-10-17 09:41:14', 1, 1, 0),
(20, 'Đồ  trẻ em', 'do-tre-em', 'Team3.e4cabd1.png', 0, 0, NULL, '2023-10-17 09:36:18', '2023-10-29 01:40:50', 1, 1, 0),
(27, 'sadsds', 'sadsds', 'Team3.e4cabd1.png', 1, 1, 'sadsds', '2024-02-28 12:49:49', '2024-07-01 01:37:14', 1, 6, 0),
(28, 'ho dien lợi', 'ho-dien-loi', 'Team3.e4cabd1.png', 1, 1, 'ho dien lợi', '2024-02-28 12:51:05', '2024-07-01 01:36:56', 1, 6, 0),
(29, 'sadasd', 'sadasd', 'Team3.e4cabd1.png', 1, 1, 'sadasd', '2024-02-28 15:10:01', '2024-07-01 01:36:53', 1, 6, 0),
(30, 'ádas', 'adas', 'Team3.e4cabd1.png', 1, 1, 'ádas', '2024-02-28 16:45:27', '2024-07-01 01:21:18', 1, 6, 0),
(31, 'Loi 2024', 'loi-2024', 'Team3.e4cabd1.png', 1, 1, 'Loi 2024', '2024-02-28 16:45:39', '2024-07-01 01:21:15', 1, 6, 0),
(55, 'Váy Nữ', 'vay-nu', 'vay-nu.jpg', 0, 0, 'Váy Nữ Thời Trang', '2024-06-30 21:54:59', '2024-06-30 21:54:59', 6, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nvv_contact`
--

CREATE TABLE `nvv_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `replay_id` int(10) UNSIGNED DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nvv_contact`
--

INSERT INTO `nvv_contact` (`id`, `user_id`, `name`, `email`, `phone`, `title`, `content`, `replay_id`, `created_at`, `updated_at`, `updated_by`, `status`) VALUES
(1, NULL, 'Liên Hệ', 'hodienloi@gmail.com', '0987654321', 'lien-he', 'lien-he', 0, '2024-06-26 08:06:27', '2023-10-30 03:44:12', 1, 1),
(3, NULL, 'Hồ DIên Lợi', 'hodienloi@gmail.com', '090999', 'lien-he', 'lien-he', 0, '2024-06-26 08:06:32', '2023-10-16 17:52:48', NULL, 2),
(4, NULL, 'Liên Hệ', 'hodienloi@gmail.com', '090999', 'sad', 'sadsads', 3, '2024-06-26 08:05:22', '2023-10-16 18:27:27', 1, 1),
(5, NULL, 'Hồ DIên Lợi', 'hodienloi@gmail.com', '090999', 'sad', 'Noi dung tra lời', 4, '2023-10-17 01:27:27', '2023-10-16 18:27:27', NULL, 2),
(6, NULL, 'Hồ DIên Lợi', 'hodienloi@gmail.com', '0987654321', 'áds', 'sadsadsd', 2, '2023-10-17 01:33:17', '2023-10-16 18:33:17', NULL, 2),
(7, NULL, 'Hồ DIên Lợi', 'hodienloi@gmail.com', '0987654321', 'Ho hoi', 'ádasd', 1, '2023-10-30 10:25:55', '2023-10-30 03:25:55', NULL, 2),
(8, NULL, 'Hồ DIên Lợi', 'hodienloi@gmail.com', '0987654321', 'Ho hoi', 'sadsadsadsd', 1, '2023-10-30 10:26:22', '2023-10-30 03:26:22', NULL, 2),
(9, NULL, 'Hồ DIên Lợi', 'hodienloi@gmail.com', '0987654321', 'Ho hoi', 'Tào lao', 1, '2023-10-30 10:44:12', '2023-10-30 03:44:12', NULL, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nvv_menu`
--

CREATE TABLE `nvv_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `sort_order` int(10) UNSIGNED DEFAULT 0,
  `parent_id` int(10) UNSIGNED DEFAULT 0,
  `type` varchar(100) NOT NULL,
  `position` varchar(255) NOT NULL,
  `table_id` int(10) UNSIGNED DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nvv_menu`
--

INSERT INTO `nvv_menu` (`id`, `name`, `link`, `sort_order`, `parent_id`, `type`, `position`, `table_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 'Trang chủ', 'http://127.0.0.1:8000/', 1, 0, 'custom', 'mainmenu', 0, '2022-11-22 12:36:05', '2023-11-02 18:40:19', 1, 1, 1),
(2, 'Giới thiệu', 'trang-don/gioi-thieu', 1, 74, 'page', 'mainmenu', 39, '2022-11-22 13:13:46', '2023-10-18 01:31:44', 1, 1, 1),
(9, 'Nhẫn', 'danh-muc/nhan-thoi-trang', 3, 14, 'category', 'mainmenu', 7, '2022-11-22 13:14:09', '2023-11-02 18:42:32', 1, 1, 0),
(13, 'Nhẫn', 'danh-muc/nhan-thoi-trang', 10, 15, 'category', 'mainmenu', 3, '2022-11-22 13:14:09', '2023-11-02 18:43:21', 1, 1, 0),
(14, 'Mũ Nón', 'danh-muc/mu-non', 4, 0, 'category', 'mainmenu', 2, '2022-11-22 13:14:09', '2023-11-02 18:44:07', 1, 1, 1),
(15, 'Giày Nữ', 'danh-muc/giay-nu', 3, 0, 'category', 'mainmenu', 1, '2022-11-22 13:14:09', '2023-11-02 18:44:10', 1, 1, 1),
(17, 'Chính Sách Hoàn Tiền', 'trang-don/chinh-sach-hoan-tien', 1, 74, 'page', 'mainmenu', 38, '2022-11-22 13:55:36', '2023-11-02 18:44:13', 1, 1, 1),
(18, 'Chính sách bảo hành', 'trang-don/chinh-sach-bao-hanh', 1, 74, 'page', 'mainmenu', 37, '2022-11-22 13:55:36', '2023-11-02 18:44:15', 1, 1, 1),
(19, 'Chính sách đổi hàng', 'trang-don/chinh-sach-doi-hang', 4, 74, 'page', 'mainmenu', 36, '2022-11-22 13:55:36', '2023-11-02 18:44:17', 1, 1, 1),
(34, 'Chủ Đề', 'chu-de/tin-tuc', 1, 0, 'topic', 'mainmenu', 5, '2023-10-17 22:26:44', '2023-11-02 18:45:10', 1, 1, 1),
(35, 'Liên Hệ', 'lien-he', 1, 0, 'topic', 'mainmenu', 6, '2023-10-17 22:26:44', '2023-11-02 18:44:22', 1, 1, 1),
(36, 'Sản Phẩm', 'san-pham', 1, 0, 'page', 'mainmenu', 6, '2023-10-18 01:33:54', '2023-11-02 18:44:23', 1, 1, 1),
(37, 'Nhẫn', 'danh-muc/nhan-thoi-trang', 1, 0, 'category', 'mainmenu', 3, '2023-10-27 04:04:07', '2023-11-02 18:45:15', 1, 1, 1),
(38, 'Túi Xách', 'danh-muc/tui-xach', 1, 0, 'category', 'mainmenu', 5, '2023-10-27 04:04:07', '2023-11-02 18:44:24', 1, 1, 1),
(72, 'Tin Tức', 'chu-de/tin-tuc', 1, 34, 'topic', 'mainmenu', 5, '2023-10-17 22:26:44', '2023-11-02 18:45:10', 1, 1, 1),
(73, 'Khuyến Mãi', 'chu-de/khuyen-mai', 1, 34, 'topic', 'mainmenu', 5, '2023-10-17 22:26:44', '2023-11-02 18:45:10', 1, 1, 1),
(74, 'Trang Đơn\r\n', 'trang-don/gioi-thieu', 1, 0, 'page', 'mainmenu', 5, '2023-10-17 22:26:44', '2023-11-02 18:45:10', 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nvv_migrations`
--

CREATE TABLE `nvv_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nvv_migrations`
--

INSERT INTO `nvv_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_05_21_113818_create_user_table', 1),
(2, '2024_05_21_113903_create_topic_table', 1),
(3, '2024_05_21_113925_create_banner_table', 1),
(4, '2024_05_21_120337_create_product_table', 1),
(5, '2024_05_21_120515_create_post_table', 1),
(6, '2024_05_21_120612_create_orderdetail_table', 1),
(7, '2024_05_21_120734_create_order_table', 1),
(8, '2024_05_21_120811_create_menu_table', 1),
(9, '2024_05_21_120855_create_contact_table', 1),
(10, '2024_05_21_120935_create_category_table', 1),
(11, '2024_05_21_121028_create_brand_table', 1),
(12, '2024_05_28_121216_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nvv_order`
--

CREATE TABLE `nvv_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `delivery_name` varchar(255) NOT NULL,
  `delivery_gender` varchar(255) NOT NULL,
  `delivery_email` varchar(255) NOT NULL,
  `delivery_phone` varchar(255) NOT NULL,
  `delivery_address` varchar(1000) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `type` varchar(50) DEFAULT 'online',
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nvv_order`
--

INSERT INTO `nvv_order` (`id`, `user_id`, `delivery_name`, `delivery_gender`, `delivery_email`, `delivery_phone`, `delivery_address`, `note`, `created_at`, `type`, `updated_at`, `updated_by`, `status`) VALUES
(1, 1, 'Nguyễn Văn Vinh', '1', 'vinh@gmail.com', '0359620485', 'Hồ CHí Minh', 'HCM', '2024-06-17 08:55:43', 'online', '2024-06-30 08:55:58', NULL, 2),
(24, 6, 'Nguyễn Văn Vinh', 'Nam', 'vinh@gmail.com', '0359620485', 'Hồ Chí Minh', NULL, '2024-06-30 03:35:14', 'online', '2024-06-30 03:35:14', NULL, 2),
(25, 6, 'Nguyễn Văn Vinh', 'Nam', 'vinh@gmail.com', '0359620485', 'Hồ Chí Minh', 'mình mua nhiều lần r freeship nhé', '2024-06-30 03:37:05', 'online', '2024-06-30 03:37:05', NULL, 2),
(26, 6, 'Nguyễn Văn Vinh', 'Nam', 'vinh@gmail.com', '0359620485', 'Hồ Chí Minh', 'mua lần 2', '2024-06-30 03:45:00', 'online', '2024-06-30 03:45:00', NULL, 2),
(27, 6, 'Nguyễn Văn Vinh', 'Nam', 'vinh@gmail.com', '0359620485', 'Hồ Chí Minh', 'mua giày vs nhẫn', '2024-06-30 13:00:04', 'online', '2024-06-30 13:00:04', NULL, 2),
(28, 6, 'admin', 'Nam', 'vinh@gmail.com', '0359620485', 'Hồ Chí Minh', 'Free đi hết tiền rồi', '2024-07-01 00:25:34', 'online', '2024-07-01 00:25:34', NULL, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nvv_orderdetail`
--

CREATE TABLE `nvv_orderdetail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `discount` double NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nvv_orderdetail`
--

INSERT INTO `nvv_orderdetail` (`id`, `order_id`, `product_id`, `price`, `qty`, `discount`, `amount`) VALUES
(1, 1, 1, 220, 1, 0, 2),
(71, 24, 1, 220000, 10, 0, 2200000),
(72, 24, 2, 170000, 6, 0, 1020000),
(73, 25, 1, 220000, 10, 0, 2200000),
(74, 25, 2, 170000, 6, 0, 1020000),
(75, 26, 1, 220000, 10, 0, 2200000),
(76, 26, 2, 170000, 6, 0, 1020000),
(77, 27, 2, 170000, 4, 0, 680000),
(78, 27, 1003, 21312, 3, 0, 63936),
(79, 28, 2, 170000, 4, 0, 680000),
(80, 28, 10, 10000, 5, 0, 50000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nvv_post`
--

CREATE TABLE `nvv_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `detail` text NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` enum('post','page') NOT NULL DEFAULT 'post',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nvv_post`
--

INSERT INTO `nvv_post` (`id`, `topic_id`, `title`, `slug`, `detail`, `description`, `image`, `type`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 8, 'Túi Thời Trang', 'fdfd', 'thời trang', 'Thời Trang Xu Hướng - Nền tản mua sắm trực tuyến thú vị, tin cậy, an toàn và miễn phí! Thời Trang Xu Hướng là nền tảng giao dịch trực tuyến hàng đầu ở Đông Nam Á. \nMUA SẮM VÀ BÁN HÀNG ONLINE ĐƠN GIẢN, NHANH CHÓNG VÀ AN TOÀN\nNếu bạn đang tìm kiếm một trang web để mua và bán hàng trực tuyến thì Thời Trang Xu Hướng.\nĐến với Thời Trang Xu Hướng, cơ hội để trở thành một nhà bán hàng dễ dàng hơn bao giờ hết. \nBên cạnh đó, Thời Trang Xu Hướng hợp tác với nhiều đơn vị vận chuyển uy tín trên thị trường như SPX,...\nTẢI Nền tản Thời Trang Xu Hướng NGAY ĐỂ MUA BÁN ONLINE MỌI LÚC, MỌI NƠI\nƯu điểm của Nền tản Thời Trang Xu Hướng là cho phép bạn mua và bán hàng mọi lúc, mọi nơi. Bạn có thể tải Nền tản Thời Trang Xu Hướng cũng như đăng sản phẩm bán hàng một cách nhanh chóng và tiện lợi.\nMUA HÀNG HIỆU CAO CẤP GIÁ TỐT TẠI Thời Trang Xu Hướng \nBên cạnh Thời Trang Xu Hướng Premium, Thời Trang Xu Hướng còn có rất nhiều khuyến mãi khủng cho hàng hiệu giảm đến 50%. Cộng với mã giao hàng miễn phí, Thời Trang ', 'tui7.jpg', 'post', '2023-10-11 02:25:13', '2023-10-11 02:25:13', 1, NULL, 1),
(2, 7, 'Giày Thời Trang', 'fdfd', 'khuyến mãi', 'Thời Trang Xu Hướng - Nền tản mua sắm trực tuyến thú vị, tin cậy, an toàn và miễn phí! Thời Trang Xu Hướng là nền tảng giao dịch trực tuyến hàng đầu ở Đông Nam Á. \nMUA SẮM VÀ BÁN HÀNG ONLINE ĐƠN GIẢN, NHANH CHÓNG VÀ AN TOÀN\nNếu bạn đang tìm kiếm một trang web để mua và bán hàng trực tuyến thì Thời Trang Xu Hướng.\nĐến với Thời Trang Xu Hướng, cơ hội để trở thành một nhà bán hàng dễ dàng hơn bao giờ hết. \nBên cạnh đó, Thời Trang Xu Hướng hợp tác với nhiều đơn vị vận chuyển uy tín trên thị trường như SPX,...\nTẢI Nền tản Thời Trang Xu Hướng NGAY ĐỂ MUA BÁN ONLINE MỌI LÚC, MỌI NƠI\nƯu điểm của Nền tản Thời Trang Xu Hướng là cho phép bạn mua và bán hàng mọi lúc, mọi nơi. Bạn có thể tải Nền tản Thời Trang Xu Hướng cũng như đăng sản phẩm bán hàng một cách nhanh chóng và tiện lợi.\nMUA HÀNG HIỆU CAO CẤP GIÁ TỐT TẠI Thời Trang Xu Hướng \nBên cạnh Thời Trang Xu Hướng Premium, Thời Trang Xu Hướng còn có rất nhiều khuyến mãi khủng cho hàng hiệu giảm đến 50%. Cộng với mã giao hàng miễn phí, Thời Trang ', 'giay7.jpg', 'post', '2023-10-11 02:25:25', '2023-10-11 02:25:25', 1, NULL, 1),
(3, NULL, 'Giới thiệu', 'gioi-thieu', 'Thời Trang Sành Điệu', 'Thời Trang Xu Hướng - Nền tản mua sắm trực tuyến thú vị, tin cậy, an toàn và miễn phí! Thời Trang Xu Hướng là nền tảng giao dịch trực tuyến hàng đầu ở Đông Nam Á. \nMUA SẮM VÀ BÁN HÀNG ONLINE ĐƠN GIẢN, NHANH CHÓNG VÀ AN TOÀN\nNếu bạn đang tìm kiếm một trang web để mua và bán hàng trực tuyến thì Thời Trang Xu Hướng.\nĐến với Thời Trang Xu Hướng, cơ hội để trở thành một nhà bán hàng dễ dàng hơn bao giờ hết. \nBên cạnh đó, Thời Trang Xu Hướng hợp tác với nhiều đơn vị vận chuyển uy tín trên thị trường như SPX,...\nTẢI Nền tản Thời Trang Xu Hướng NGAY ĐỂ MUA BÁN ONLINE MỌI LÚC, MỌI NƠI\nƯu điểm của Nền tản Thời Trang Xu Hướng là cho phép bạn mua và bán hàng mọi lúc, mọi nơi. Bạn có thể tải Nền tản Thời Trang Xu Hướng cũng như đăng sản phẩm bán hàng một cách nhanh chóng và tiện lợi.\nMUA HÀNG HIỆU CAO CẤP GIÁ TỐT TẠI Thời Trang Xu Hướng \nBên cạnh Thời Trang Xu Hướng Premium, Thời Trang Xu Hướng còn có rất nhiều khuyến mãi khủng cho hàng hiệu giảm đến 50%. Cộng với mã giao hàng miễn phí, Thời Trang ', 'post1.jpg', 'page', '2023-10-16 04:13:20', '2023-11-02 19:03:53', 1, 1, 2),
(4, 3, 'Nhẫn Thời Trang', 'xzcx', 'Thông báo', 'Thời Trang Xu Hướng - Nền tản mua sắm trực tuyến thú vị, tin cậy, an toàn và miễn phí! Thời Trang Xu Hướng là nền tảng giao dịch trực tuyến hàng đầu ở Đông Nam Á. \nMUA SẮM VÀ BÁN HÀNG ONLINE ĐƠN GIẢN, NHANH CHÓNG VÀ AN TOÀN\nNếu bạn đang tìm kiếm một trang web để mua và bán hàng trực tuyến thì Thời Trang Xu Hướng.\nĐến với Thời Trang Xu Hướng, cơ hội để trở thành một nhà bán hàng dễ dàng hơn bao giờ hết. \nBên cạnh đó, Thời Trang Xu Hướng hợp tác với nhiều đơn vị vận chuyển uy tín trên thị trường như SPX,...\nTẢI Nền tản Thời Trang Xu Hướng NGAY ĐỂ MUA BÁN ONLINE MỌI LÚC, MỌI NƠI\nƯu điểm của Nền tản Thời Trang Xu Hướng là cho phép bạn mua và bán hàng mọi lúc, mọi nơi. Bạn có thể tải Nền tản Thời Trang Xu Hướng cũng như đăng sản phẩm bán hàng một cách nhanh chóng và tiện lợi.\nMUA HÀNG HIỆU CAO CẤP GIÁ TỐT TẠI Thời Trang Xu Hướng \nBên cạnh Thời Trang Xu Hướng Premium, Thời Trang Xu Hướng còn có rất nhiều khuyến mãi khủng cho hàng hiệu giảm đến 50%. Cộng với mã giao hàng miễn phí, Thời Trang ', 'nhan7.jpg', 'post', '2023-10-16 04:49:14', '2023-10-16 04:49:14', 1, NULL, 1),
(6, 8, 'Mũ Nón Thời Trang', 'xzcxz', 'Ưu đãi lớn', 'Thời Trang Xu Hướng - Nền tản mua sắm trực tuyến thú vị, tin cậy, an toàn và miễn phí! Thời Trang Xu Hướng là nền tảng giao dịch trực tuyến hàng đầu ở Đông Nam Á. \nMUA SẮM VÀ BÁN HÀNG ONLINE ĐƠN GIẢN, NHANH CHÓNG VÀ AN TOÀN\nNếu bạn đang tìm kiếm một trang web để mua và bán hàng trực tuyến thì Thời Trang Xu Hướng.\nĐến với Thời Trang Xu Hướng, cơ hội để trở thành một nhà bán hàng dễ dàng hơn bao giờ hết. \nBên cạnh đó, Thời Trang Xu Hướng hợp tác với nhiều đơn vị vận chuyển uy tín trên thị trường như SPX,...\nTẢI Nền tản Thời Trang Xu Hướng NGAY ĐỂ MUA BÁN ONLINE MỌI LÚC, MỌI NƠI\nƯu điểm của Nền tản Thời Trang Xu Hướng là cho phép bạn mua và bán hàng mọi lúc, mọi nơi. Bạn có thể tải Nền tản Thời Trang Xu Hướng cũng như đăng sản phẩm bán hàng một cách nhanh chóng và tiện lợi.\nMUA HÀNG HIỆU CAO CẤP GIÁ TỐT TẠI Thời Trang Xu Hướng \nBên cạnh Thời Trang Xu Hướng Premium, Thời Trang Xu Hướng còn có rất nhiều khuyến mãi khủng cho hàng hiệu giảm đến 50%. Cộng với mã giao hàng miễn phí, Thời Trang ', 'non7.jpg', 'post', '2023-10-16 05:42:29', '2023-10-16 05:42:29', 1, NULL, 1),
(7, NULL, 'Chính Sách Hoàn Tiền', 'chinh-sach-hoan-tien', 'Thời Trang Sành Điệu', 'Thời Trang Xu Hướng - Nền tản mua sắm trực tuyến thú vị, tin cậy, an toàn và miễn phí! Thời Trang Xu Hướng là nền tảng giao dịch trực tuyến hàng đầu ở Đông Nam Á. \nMUA SẮM VÀ BÁN HÀNG ONLINE ĐƠN GIẢN, NHANH CHÓNG VÀ AN TOÀN\nNếu bạn đang tìm kiếm một trang web để mua và bán hàng trực tuyến thì Thời Trang Xu Hướng.\nĐến với Thời Trang Xu Hướng, cơ hội để trở thành một nhà bán hàng dễ dàng hơn bao giờ hết. \nBên cạnh đó, Thời Trang Xu Hướng hợp tác với nhiều đơn vị vận chuyển uy tín trên thị trường như SPX,...\nTẢI Nền tản Thời Trang Xu Hướng NGAY ĐỂ MUA BÁN ONLINE MỌI LÚC, MỌI NƠI\nƯu điểm của Nền tản Thời Trang Xu Hướng là cho phép bạn mua và bán hàng mọi lúc, mọi nơi. Bạn có thể tải Nền tản Thời Trang Xu Hướng cũng như đăng sản phẩm bán hàng một cách nhanh chóng và tiện lợi.\nMUA HÀNG HIỆU CAO CẤP GIÁ TỐT TẠI Thời Trang Xu Hướng \nBên cạnh Thời Trang Xu Hướng Premium, Thời Trang Xu Hướng còn có rất nhiều khuyến mãi khủng cho hàng hiệu giảm đến 50%. Cộng với mã giao hàng miễn phí, Thời Trang ', 'post2.jpg', 'page', '2023-11-02 18:49:39', '2023-11-02 18:57:34', 1, 1, 2),
(8, NULL, 'Chính sách bảo hành', 'chinh-sach-bao-hanh', 'Thời Trang Sành Điệu', 'Thời Trang Xu Hướng - Nền tản mua sắm trực tuyến thú vị, tin cậy, an toàn và miễn phí! Thời Trang Xu Hướng là nền tảng giao dịch trực tuyến hàng đầu ở Đông Nam Á. \nMUA SẮM VÀ BÁN HÀNG ONLINE ĐƠN GIẢN, NHANH CHÓNG VÀ AN TOÀN\nNếu bạn đang tìm kiếm một trang web để mua và bán hàng trực tuyến thì Thời Trang Xu Hướng.\nĐến với Thời Trang Xu Hướng, cơ hội để trở thành một nhà bán hàng dễ dàng hơn bao giờ hết. \nBên cạnh đó, Thời Trang Xu Hướng hợp tác với nhiều đơn vị vận chuyển uy tín trên thị trường như SPX,...\nTẢI Nền tản Thời Trang Xu Hướng NGAY ĐỂ MUA BÁN ONLINE MỌI LÚC, MỌI NƠI\nƯu điểm của Nền tản Thời Trang Xu Hướng là cho phép bạn mua và bán hàng mọi lúc, mọi nơi. Bạn có thể tải Nền tản Thời Trang Xu Hướng cũng như đăng sản phẩm bán hàng một cách nhanh chóng và tiện lợi.\nMUA HÀNG HIỆU CAO CẤP GIÁ TỐT TẠI Thời Trang Xu Hướng \nBên cạnh Thời Trang Xu Hướng Premium, Thời Trang Xu Hướng còn có rất nhiều khuyến mãi khủng cho hàng hiệu giảm đến 50%. Cộng với mã giao hàng miễn phí, Thời Trang ', 'post3.jpg', 'page', '2023-11-02 18:52:53', '2023-11-02 18:53:28', 1, 1, 2),
(9, NULL, 'Chính sách vận chuyển', 'chinh-sach-van-chuyen', 'sadsd', NULL, NULL, 'page', '2023-11-02 18:59:06', '2023-11-02 19:01:39', 1, 1, 3),
(10, NULL, 'Chính sách đổi trả', 'chinh-sach-doi-hang', 'Thời Trang Sành Điệu', 'Thời Trang Xu Hướng - Nền tản mua sắm trực tuyến thú vị, tin cậy, an toàn và miễn phí! Thời Trang Xu Hướng là nền tảng giao dịch trực tuyến hàng đầu ở Đông Nam Á. \nMUA SẮM VÀ BÁN HÀNG ONLINE ĐƠN GIẢN, NHANH CHÓNG VÀ AN TOÀN\nNếu bạn đang tìm kiếm một trang web để mua và bán hàng trực tuyến thì Thời Trang Xu Hướng.\nĐến với Thời Trang Xu Hướng, cơ hội để trở thành một nhà bán hàng dễ dàng hơn bao giờ hết. \nBên cạnh đó, Thời Trang Xu Hướng hợp tác với nhiều đơn vị vận chuyển uy tín trên thị trường như SPX,...\nTẢI Nền tản Thời Trang Xu Hướng NGAY ĐỂ MUA BÁN ONLINE MỌI LÚC, MỌI NƠI\nƯu điểm của Nền tản Thời Trang Xu Hướng là cho phép bạn mua và bán hàng mọi lúc, mọi nơi. Bạn có thể tải Nền tản Thời Trang Xu Hướng cũng như đăng sản phẩm bán hàng một cách nhanh chóng và tiện lợi.\nMUA HÀNG HIỆU CAO CẤP GIÁ TỐT TẠI Thời Trang Xu Hướng \nBên cạnh Thời Trang Xu Hướng Premium, Thời Trang Xu Hướng còn có rất nhiều khuyến mãi khủng cho hàng hiệu giảm đến 50%. Cộng với mã giao hàng miễn phí, Thời Trang ', 'post4.png', 'page', '2023-11-02 19:00:41', '2023-11-02 19:00:49', 1, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nvv_product`
--

CREATE TABLE `nvv_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `detail` text NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(1000) NOT NULL,
  `price` double NOT NULL,
  `pricesale` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2,
  `qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nvv_product`
--

INSERT INTO `nvv_product` (`id`, `category_id`, `brand_id`, `name`, `slug`, `detail`, `description`, `image`, `price`, `pricesale`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `qty`) VALUES
(1, 1, 1, 'Giày Độn Đế', 'ao-len-nam-totoday-ao-len-soc-lon-mau', '<p>&Aacute;O LEN NAM - TOTODAY - &Aacute;O LEN SỌC LỚN M&Agrave;U</p>\r\n', 'ÁO LEN NAM - TOTODAY - ÁO LEN SỌC LỚN MÀU', 'giay1.jpg', 378000, 220000, '2022-11-22 11:40:37', '2022-11-22 11:40:37', 1, 1, 1, 1),
(2, 1, 2, 'Giày Xinh Xắn', 'ao-len-nam-totoday-ao-len-soc-phoi-mau', '<h1>&Aacute;O LEN NAM - TOTODAY - &Aacute;O LEN SỌC PHỐI M&Agrave;U</h1>\r\n', 'ÁO LEN NAM - TOTODAY - ÁO LEN SỌC PHỐI MÀU', 'giay2.jpg', 378000, 170000, '2022-11-22 11:42:49', '2022-11-22 11:42:49', 1, 1, 1, 1),
(3, 1, 5, 'Giày Bánh Mì', 'ao-len-nam-totoday-ao-len-traffic', '<h1>&Aacute;O LEN NAM - TOTODAY - &Aacute;O LEN TRAFFIC</h1>\r\n', 'ÁO LEN NAM - TOTODAY - ÁO LEN TRAFFIC', 'giay3.jpg', 378000, 300000, '2022-11-22 11:48:35', '2022-11-22 11:48:35', 1, 1, 1, 1),
(4, 1, 5, 'Giày Form Cao', 'ao-len-nam-totoday-ao-len-nhieu-mau', '<h1>&Aacute;O LEN NAM - TOTODAY - &Aacute;O LEN NHIỀU M&Agrave;U</h1>\r\n', 'ÁO LEN NAM - TOTODAY - ÁO LEN NHIỀU MÀU', 'giay4.jpg', 10000, 0, '2022-11-22 11:49:40', '2022-11-22 11:49:40', 1, 1, 1, 1),
(5, 1, 5, 'Giày Nhập Khẩu', 'ao-so-mi-nam-totoday-the-basic', '<h1>&Aacute;O SƠ MI NAM - TOTODAY - THE BASIC</h1>\r\n', 'ÁO SƠ MI NAM - TOTODAY - THE BASIC', 'giay5.jpg', 10000, 0, '2022-11-22 12:11:51', '2022-11-22 12:15:16', 1, 1, 1, 1),
(6, 1, 5, 'Giày Thời Trang', 'ao-so-mi-nam-totoday-cool-shirt', '<h1>&Aacute;O SƠ MI NAM - TOTODAY - THE BASIC</h1>\r\n', 'ÁO SƠ MI NAM - TOTODAY - COOL SHIRT', 'giay6.jpg', 10000, 9000, '2022-11-22 12:11:51', '2022-11-22 12:14:52', 1, 1, 1, 1),
(7, 1, 1, 'Giày Giới Hạn', 'ao-so-mi-nam-totoday-simple-shirt', '<h1>&Aacute;O SƠ MI NAM - TOTODAY - SIMPLE SHIRT</h1>\r\n', 'ÁO SƠ MI NAM - TOTODAY - SIMPLE SHIRT', 'giay7.jpg', 10000, 0, '2022-11-22 12:16:17', '2022-11-22 12:16:17', 1, 1, 1, 1),
(8, 1, 2, 'Giày Tiểu Thư', 'ao-so-mi-nam-totoday-format', '<h1>&Aacute;O SƠ MI NAM - TOTODAY - FORMAT</h1>\r\n', 'ÁO SƠ MI NAM - TOTODAY - FORMAT', 'giay8.jpg', 10000, 0, '2022-11-22 12:16:51', '2022-11-22 12:16:51', 1, 1, 1, 1),
(9, 1, 5, 'Giày Bánh Bèo', 'shorts-jean-nam-totoday-11203', '<h1>SHORTS JEAN NAM - TOTODAY - 11203</h1>\r\n', 'SHORTS JEAN NAM - TOTODAY - 11203', 'giay9.jpg', 10000, 0, '2022-11-22 12:17:53', '2022-11-22 12:17:53', 1, 1, 1, 1),
(10, 1, 2, 'Giày Phong Cách', 'shorts-jean-nam-totoday-11202', '<h1>SHORTS JEAN NAM - TOTODAY - 11202</h1>\r\n', 'SHORTS JEAN NAM - TOTODAY - 11202', 'giay10.jpg', 10000, 0, '2022-11-22 12:19:09', '2022-11-22 12:19:09', 1, 1, 1, 1),
(11, 2, 2, 'Nón Tai Bèo', 'shorts-jean-nam-totoday-11201', '<h1>SHORTS JEAN NAM - TOTODAY - 11201</h1>\r\n', 'SHORTS JEAN NAM - TOTODAY - 11201', 'non1.jpg', 10000, 0, '2022-11-22 12:19:43', '2022-11-22 12:19:43', 1, 1, 1, 1),
(12, 2, 5, 'Nón Cặp Đôi', 'shorts-thun-nam-totoday-freedom-totoday', '<h1>SHORTS THUN NAM - TOTODAY - FREEDOM TOTODAY</h1>\r\n', 'SHORTS THUN NAM - TOTODAY - FREEDOM TOTODAY', 'non2.jpg', 10000, 0, '2022-11-22 12:20:53', '2022-11-22 12:20:53', 1, 1, 1, 1),
(13, 2, 1, 'Nón Tự Đang', 'quan-jean-nam-slimfit-totoday-10206', '<h1>QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10206</h1>\r\n', 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10206', 'non3.jpg', 10000, 0, '2022-11-22 12:21:58', '2022-11-22 12:21:58', 1, 1, 1, 1),
(14, 2, 2, 'Nón Lưỡi Trai', 'quan-jean-nam-slimfit-totoday-10205', '<h1>QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10205</h1>\r\n', 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10205', 'non4.jpg', 10000, 0, '2022-11-22 12:22:27', '2022-11-22 12:22:27', 1, 1, 1, 1),
(15, 2, 5, 'Nón Chụp Tai', 'quan-jean-nam-slimfit-totoday-10204', '<h1>QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10204</h1>\r\n', 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10204', 'non5.jpg', 10000, 0, '2022-11-22 12:22:56', '2022-11-22 12:22:56', 1, 1, 1, 1),
(16, 2, 2, 'Nón Dạ Hội', 'quan-jean-nam-slimfit-totoday-10203', '<h1>QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10203</h1>\r\n', 'QUẦN JEAN NAM - SLIMFIT - TOTODAY - 10203', 'non6.jpg', 10000, 0, '2022-11-22 12:23:18', '2022-11-22 12:23:18', 1, 1, 1, 1),
(17, 2, 2, 'Nón Phong Cách', 'ao-thun-w2atn09203fosht', '<h1>&Aacute;O THUN W2ATN09203FOSHT</h1>\r\n', 'ÁO THUN W2ATN09203FOSHT', 'non7.jpg', 10000, 0, '2022-11-22 12:24:58', '2022-11-22 12:24:58', 1, 1, 1, 1),
(18, 2, 5, 'Nón Thời Trang', 'ao-thun-w2atn09201fosht', '<h1>&Aacute;O THUN W2ATN09201FOSHT</h1>\r\n', 'ÁO THUN W2ATN09201FOSHT', 'non8.jpg', 10000, 0, '2022-11-22 12:26:02', '2022-11-22 12:26:02', 1, 1, 1, 1),
(19, 2, 5, 'Nón Dây Cài', 'ao-thun-w2atn08213bosht', '<h1>&Aacute;O THUN W2ATN08213BOSHT</h1>\r\n', 'ÁO THUN W2ATN08213BOSHT', 'non9.jpg', 10000, 0, '2022-11-22 12:26:25', '2022-11-22 12:26:25', 1, 1, 1, 1),
(20, 2, 2, 'Nón Mùa Đông', 'ao-thun-w2atn08210bosba', '<h1>&Aacute;O THUN W2ATN08210BOSBA</h1>\r\n', 'ÁO THUN W2ATN08210BOSBA', 'non10.jpg', 10000, 0, '2022-11-22 12:26:44', '2022-11-22 12:26:44', 1, 1, 1, 1),
(21, 5, 5, 'Túi Thời Thượng', 'ao-somi-w2smd05204bostr', '<h1>&Aacute;O SƠMI W2SMD05204BOSTR</h1>\r\n', 'ÁO SƠMI W2SMD05204BOSTR', 'tui1.jpg', 10000, 0, '2022-11-22 12:29:53', '2022-11-22 12:29:53', 1, 1, 1, 1),
(22, 5, 1, 'Túi Thời Trang', 'ao-somi-w2smn05201bostr', '<h1>&Aacute;O SƠMI W2SMN05201BOSTR</h1>\r\n', 'ÁO SƠMI W2SMN05201BOSTR', 'tui2.jpg', 10000, 0, '2022-11-22 12:30:23', '2022-11-22 12:30:23', 1, 1, 1, 1),
(23, 5, 2, 'Túi Sang Trọng', 'ao-somi-w2smd05203bostr', '<h1>&Aacute;O SƠMI W2SMD05203BOSTR</h1>\r\n', 'ÁO SƠMI W2SMD05203BOSTR', 'tui3.jpg', 10000, 0, '2022-11-22 12:30:45', '2022-11-22 12:30:45', 1, 1, 1, 1),
(24, 5, 5, 'Túi Giới Hạn', 'set-somi-w2set05201foscr', '<h1>SET SƠMI W2SET05201FOSCR</h1>\r\n', 'SET SƠMI W2SET05201FOSCR', 'tui4.jpg', 10000, 0, '2022-11-22 12:31:09', '2022-11-22 12:31:09', 1, 1, 1, 1),
(25, 5, 2, 'Túi Công Chúa', 'shorts-jean-nu-wash-totoday-10205', '<h1>SHORTS JEAN NỮ WASH - TOTODAY - 10205</h1>\r\n', 'SHORTS JEAN NỮ WASH - TOTODAY - 10205', 'tui5.jpg', 10000, 0, '2022-11-22 12:34:00', '2022-11-22 12:34:00', 1, 1, 1, 1),
(26, 5, 2, 'Túi Da Nâu', 'shorts-jean-nu-totoday-10205', '<h1>SHORTS JEAN NỮ - TOTODAY - 10205</h1>\r\n', 'SHORTS JEAN NỮ - TOTODAY - 10205', 'tui6.jpg', 10000, 0, '2022-11-22 12:34:21', '2022-11-22 12:34:21', 1, 1, 1, 1),
(27, 5, 5, 'Túi Da Cá Sấu', 'shorts-jean-nu-totoday-10203', '<h1>SHORTS JEAN NỮ - TOTODAY - 10203</h1>\r\n', 'SHORTS JEAN NỮ - TOTODAY - 10203', 'tui7.jpg', 10000, 0, '2022-11-22 12:34:52', '2022-11-22 12:34:52', 1, 1, 1, 1),
(28, 5, 1, 'Túi Công Sở', 'shorts-jean-nu-rach-totoday-10202', '<h1>SHORTS JEAN NỮ R&Aacute;CH - TOTODAY - 10202</h1>\r\n', 'SHORTS JEAN NỮ RÁCH - TOTODAY - 10202', 'tui8.jpg', 10000, 0, '2022-11-22 12:35:13', '2022-11-22 12:35:13', 1, 1, 1, 0),
(29, 5, 2, 'Túi Xinh Xắn', 'quan-jean-w2qjn05203fbgtr', '<h1>QUẦN JEAN W2QJN05203FBGTR</h1>\r\n', 'QUẦN JEAN W2QJN05203FBGTR', 'tui9.jpg', 10000, 0, '2022-11-22 12:38:14', '2022-11-22 12:38:15', 1, 1, 1, 0),
(30, 5, 5, 'Túi Quý Phái', 'quan-jean-w2qjn05202fbgtr', '<h1>QUẦN JEAN W2QJN05202FBGTR</h1>\r\n', 'QUẦN JEAN W2QJN05202FBGTR', 'tui10.jpg', 10000, 0, '2022-11-22 12:38:39', '2022-11-22 12:38:39', 1, 1, 1, 0),
(31, 3, 1, 'Nhẫn Kim Cương', 'quan-jean-w2qjn05201fbgtr', '<h1>QUẦN JEAN W2QJN05201FBGTR</h1>\r\n', 'QUẦN JEAN W2QJN05201FBGTR', 'nhan1.jpg', 10000, 0, '2022-11-22 12:38:59', '2022-11-22 12:38:59', 1, 1, 1, 0),
(32, 3, 2, 'Nhẫn Công Chúa', 'quan-jean-w2qjn04208fbgtr', '<h1>QUẦN JEAN W2QJN04208FBGTR</h1>\r\n', 'QUẦN JEAN W2QJN04208FBGTR', 'nhan2.jpg', 10000, 0, '2022-11-22 12:39:47', '2022-11-22 12:39:48', 1, 1, 1, 0),
(33, 3, 5, 'Nhẫn Đính Saphia', 'chan-vay-jean-nu-totoday-10201', '<h1>CH&Acirc;N V&Aacute;Y JEAN NỮ - TOTODAY - 10201</h1>\r\n', 'CHÂN VÁY JEAN NỮ - TOTODAY - 10201', 'nhan3.jpg', 10000, 0, '2022-11-22 12:41:15', '2022-11-22 12:41:15', 1, 1, 1, 0),
(34, 3, 1, 'Nhẫn Đôi', 'chan-vay-w2cnv06203fosxl', '<h1>CH&Acirc;N V&Aacute;Y W2CNV06203FOSXL</h1>\r\n', 'CHÂN VÁY W2CNV06203FOSXL', 'nhan4.jpg', 10000, 0, '2022-11-22 12:41:36', '2022-11-22 12:41:36', 1, 1, 1, 0),
(35, 3, 2, 'Nhẫn Thời Trang', 'chan-vay-w2cnv06202fosxl', '<h1>CH&Acirc;N V&Aacute;Y W2CNV06202FOSXL</h1>\r\n', 'CHÂN VÁY W2CNV06202FOSXL', 'nhan10.jpg', 10000, 0, '2022-11-22 12:41:58', '2022-11-22 12:41:58', 1, 1, 1, 0),
(36, 3, 5, 'Nhẫn Sang Trọng', 'chan-vay-w2cnv06201foscr', '<h1>CH&Acirc;N V&Aacute;Y W2CNV06201FOSCR</h1>\r\n', 'CHÂN VÁY W2CNV06201FOSCR', 'nhan6.jpg', 10000, 0, '2022-11-22 12:42:21', '2022-11-22 12:42:21', 1, 1, 1, 0),
(1000, 3, 1, 'Nhẫn Quí Phái', 'dsads', 'sadsadcx', 'Nhẫn Quí Phái', 'nhan7.jpg', 10000, 0, '2023-10-26 20:15:51', '2023-10-30 01:26:50', 1, 1, 1, 0),
(1001, 3, 2, 'Nhẫn Cưới', 'dfsd', 'fdsfdsf', 'Nhẫn Cưới', 'nhan8.jpg', 34234, 0, '2023-10-30 01:14:45', '2023-10-30 01:14:45', 1, 1, 1, 0),
(1002, 3, 5, 'Nhẫn Pandora', 'sadsd', 'sadassad', 'Nhẫn pandora', 'nhan9.jpg', 234343, 0, '2023-10-30 01:15:41', '2023-10-30 01:32:45', 1, 1, 1, 0),
(1003, 3, 1, 'Nhẫn Gia Công', 'zxx', 'Zxzxzxz', 'Nhẫn Gia Công', 'nhan5.jpg', 21312, 0, '2023-11-02 19:09:25', '2023-11-02 19:09:25', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nvv_sessions`
--

CREATE TABLE `nvv_sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nvv_sessions`
--

INSERT INTO `nvv_sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dm28m0Vsni0yd8qAtAyzhEO5D534gp0Qe22sRqJW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN2RmdGs2MVhUdUNqSndFb0ZYSHhaMWpoQ2Z2enYwTmZycHlRN3pHUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYW4tcGhhbT9wYWdlPTIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU6ImNhcnRzIjthOjA6e319', 1725517988),
('J5XCur6qUdQkub2wLT3SLWzsT5O4Kqli96N1j81n', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36 Edg/126.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQTEwY2lRaGExVW5JNHhQQXBobmxwVnpzakJqT2M4N0hPeFB6YXBsMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9saWVuLWhlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJjYXJ0cyI7YToyOntpOjA7YTo1OntzOjI6ImlkIjtzOjQ6IjEwMDMiO3M6NToiaW1hZ2UiO3M6OToibmhhbjUuanBnIjtzOjQ6Im5hbWUiO3M6MTY6Ik5o4bqrbiBHaWEgQ8O0bmciO3M6MzoicXR5IjtzOjE6IjQiO3M6NToicHJpY2UiO2Q6MjEzMTI7fWk6MTthOjU6e3M6MjoiaWQiO3M6MjoiMTQiO3M6NToiaW1hZ2UiO3M6ODoibm9uNC5qcGciO3M6NDoibmFtZSI7czoxNzoiTsOzbiBMxrDhu6FpIFRyYWkiO3M6MzoicXR5IjtzOjE6IjQiO3M6NToicHJpY2UiO2Q6MTAwMDA7fX19', 1719955001);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nvv_topic`
--

CREATE TABLE `nvv_topic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `description` varchar(1000) DEFAULT NULL,
  `parent_id` int(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nvv_topic`
--

INSERT INTO `nvv_topic` (`id`, `name`, `slug`, `sort_order`, `description`, `parent_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(3, 'Tin tức', 'tin-tuc', 0, 'Mô tả tin tức', 0, '2023-10-16 05:30:30', '2023-10-16 05:33:26', 1, NULL, 1),
(4, 'Dịch vụ', 'dich-vu', 0, 'Chủ đề dịch vụ', 3, '2023-10-16 05:30:48', '2023-10-16 05:33:38', 1, NULL, 1),
(7, 'Quảng Cáo', 'quang-cao', 0, 'Chủ đề dịch vụ', 3, '2023-10-16 05:30:48', '2023-10-16 05:33:38', 1, NULL, 1),
(8, 'Khuyến Mãi', 'khuyen-mai', 0, 'Chủ đề dịch vụ', 3, '2023-10-16 05:30:48', '2023-10-16 05:33:38', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nvv_user`
--

CREATE TABLE `nvv_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `roles` enum('admin','customer') NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 2,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nvv_user`
--

INSERT INTO `nvv_user` (`id`, `name`, `username`, `password`, `phone`, `email`, `roles`, `image`, `address`, `remember_token`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `gender`) VALUES
(6, 'admin', NULL, '$2y$12$Lz2nn4NMuHevhXCfbgbLqOsTNNkW4EP0bwj.oHK1v7I8mNbq3fo7W', '0359620485', 'vinh@gmail.com', 'admin', '.jpg', 'Hồ Chí Minh', NULL, '2024-06-30 22:19:48', '2024-06-30 22:19:48', 6, NULL, 1, 'Nam'),
(8, 'Nguyễn Văn Vinh', NULL, '$2y$12$Lz2nn4NMuHevhXCfbgbLqOsTNNkW4EP0bwj.oHK1v7I8mNbq3fo7W', '0359620485', 'vinh1@gmail.com', 'customer', '.jpg', 'Hồ Chí Minh', NULL, '2024-06-29 02:12:59', '2024-06-29 02:12:59', 6, NULL, 1, 'Nữ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `nvv_banner`
--
ALTER TABLE `nvv_banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nvv_brand`
--
ALTER TABLE `nvv_brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nvv_category`
--
ALTER TABLE `nvv_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nvv_contact`
--
ALTER TABLE `nvv_contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nvv_menu`
--
ALTER TABLE `nvv_menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nvv_migrations`
--
ALTER TABLE `nvv_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nvv_order`
--
ALTER TABLE `nvv_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nvv_orderdetail`
--
ALTER TABLE `nvv_orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nvv_post`
--
ALTER TABLE `nvv_post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nvv_product`
--
ALTER TABLE `nvv_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nvv_sessions`
--
ALTER TABLE `nvv_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nvv_sessions_user_id_index` (`user_id`),
  ADD KEY `nvv_sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `nvv_topic`
--
ALTER TABLE `nvv_topic`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nvv_user`
--
ALTER TABLE `nvv_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `nvv_banner`
--
ALTER TABLE `nvv_banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `nvv_brand`
--
ALTER TABLE `nvv_brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `nvv_category`
--
ALTER TABLE `nvv_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `nvv_contact`
--
ALTER TABLE `nvv_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nvv_menu`
--
ALTER TABLE `nvv_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `nvv_migrations`
--
ALTER TABLE `nvv_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `nvv_order`
--
ALTER TABLE `nvv_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `nvv_orderdetail`
--
ALTER TABLE `nvv_orderdetail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `nvv_post`
--
ALTER TABLE `nvv_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `nvv_product`
--
ALTER TABLE `nvv_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- AUTO_INCREMENT cho bảng `nvv_topic`
--
ALTER TABLE `nvv_topic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `nvv_user`
--
ALTER TABLE `nvv_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
