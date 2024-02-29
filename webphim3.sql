-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 29, 2024 lúc 09:58 AM
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
-- Cơ sở dữ liệu: `webphim3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `position`, `slug`, `status`) VALUES
(1, 'Phim Mới', 'Phim mới', 0, 'phim-moi', 1),
(2, 'Phim Lẻ', 'Phim Lẻ', 1, 'phim-le', 1),
(3, 'Phim Bộ', 'Phim Bộ', 2, 'phim-bo', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Việt Nam', 'Việt Nam', 1, 'viet-nam'),
(2, 'Hàn Quốc', 'Hàn Quốc', 1, 'han-quoc'),
(3, 'Nhật Bản', 'Nhật Bản', 1, 'nhat-ban'),
(4, 'Trung Quốc', 'Trung Quốc', 1, 'trung-quoc'),
(5, 'Mỹ', 'Mỹ', 1, 'my'),
(6, 'Đức', 'Đức', 1, 'duc'),
(8, 'Anh Quốc', 'phim quốc gia anh', 1, 'anh-quoc'),
(9, 'Quốc gia khác', 'Tổng hợp nhiều quốc gia', 1, 'quoc-gia-khac');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `episode` int(11) NOT NULL,
  `linkphim` varchar(1111) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `server` int(11) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `episodes`
--

INSERT INTO `episodes` (`id`, `episode`, `linkphim`, `movie_id`, `server`, `created_at`, `updated_at`) VALUES
(13, 1, '<iframe width=\"560\" height=\"315\" src=\"https://1080.opstream4.com/share/349495688c536b6a7a4bf026ad76dc42\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 19, 4, '2024-01-25 11:26:00', '2024-01-25 11:26:00'),
(14, 2, '<iframe width=\"560\" height=\"315\" src=\"https://1080.opstream4.com/share/984381c0f2f6388d272227375ac5c373\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 19, 4, '2024-01-25 11:26:17', '2024-01-25 11:26:17'),
(15, 3, '<iframe width=\"560\" height=\"315\" src=\"https://1080.opstream4.com/share/4a26b01e8ed9cfb40bfedc7e0a5f0c25\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 19, 4, '2024-01-25 11:26:27', '2024-01-25 11:26:27'),
(21, 4, '<iframe width=\"560\" height=\"315\" src=\"https://1080.opstream4.com/share/5d8297e451a0e650c38252a91bcc88ef\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 19, 4, '2024-01-25 11:23:24', '2024-01-25 11:23:24'),
(41, 1, '<iframe width=\"560\" height=\"315\" src=\"https://hdbo.opstream5.com/share/4dc78ee9d84aeec573c4179447b5f17c\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 29, 4, '2024-01-23 14:16:43', '2024-01-23 14:16:43'),
(42, 1, '<iframe width=\"560\" height=\"315\" src=\"https://aa.opstream6.com/share/6be0fc6d398b58e837e9ed93a6342a46\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 30, 4, '2024-01-23 14:28:31', '2024-01-23 14:28:31'),
(43, 1, '<iframe width=\"560\" height=\"315\" src=\"https://1080.opstream4.com/share/64a2ced1a3bc35f45f1c3bdb0c8b256f\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 25, 4, '2024-01-23 14:29:57', '2024-01-23 14:29:57'),
(45, 2, '<iframe width=\"560\" height=\"315\" src=\"https://hdbo.opstream5.com/share/690027d90a021ddbc2c69e699546fc03\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 31, 4, '2024-01-23 14:41:47', '2024-01-23 14:41:47'),
(46, 1, '<iframe width=\"560\" height=\"315\" src=\"https://hdbo.opstream5.com/share/2f87d717bf556321774d1b4975d2e1c1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 31, 4, '2024-01-23 14:44:44', '2024-01-23 14:44:44'),
(47, 3, '<iframe width=\"560\" height=\"315\" src=\"https://1080.opstream4.com/share/3f43b741e9c8523c43e3370be32f2c0a\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 31, 4, '2024-01-23 14:43:30', '2024-01-23 14:43:30'),
(48, 4, '<iframe width=\"560\" height=\"315\" src=\"https://1080.opstream4.com/share/33c9052ca7a0a2585b6e1bb4a91cf0fc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 31, 4, '2024-01-23 14:45:49', '2024-01-23 14:45:49'),
(49, 5, '<iframe width=\"560\" height=\"315\" src=\"https://hdbo.opstream5.com/share/2fc69c3781f9dd6a5cb24d335945e841\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 31, 4, '2024-01-23 14:46:05', '2024-01-23 14:46:05'),
(50, 6, '<iframe width=\"560\" height=\"315\" src=\"https://1080.opstream4.com/share/7f12bc8cffb170e083ea5c5296272b97\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 31, 4, '2024-01-23 14:46:53', '2024-01-23 14:46:53'),
(51, 7, '<iframe width=\"560\" height=\"315\" src=\"https://hdbo.opstream5.com/share/9c2aef8bf511d208ee623850400a7f9e\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 31, 4, '2024-01-23 14:47:10', '2024-01-23 14:47:10'),
(52, 8, '<iframe width=\"560\" height=\"315\" src=\"https://hdbo.opstream5.com/share/040c46d8f724cba41e33a18b108df7bd\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 31, 4, '2024-01-23 14:47:24', '2024-01-23 14:47:24'),
(53, 9, '<iframe width=\"560\" height=\"315\" src=\"https://1080.opstream4.com/share/94ab15a960b53a48b25178e11d32c8fb\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 31, 4, '2024-01-23 14:47:44', '2024-01-23 14:47:44'),
(54, 10, '<iframe width=\"560\" height=\"315\" src=\"https://1080.opstream4.com/share/fc3b60165411bb4ca7b0f03fecc0cdb5\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 31, 4, '2024-01-23 14:48:01', '2024-01-23 14:48:01'),
(55, 11, '<iframe width=\"560\" height=\"315\" src=\"https://hdbo.opstream5.com/share/20abd899ed40c87f30657e4369bb656b\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 31, 4, '2024-01-23 14:48:17', '2024-01-23 14:48:17'),
(56, 12, '<iframe width=\"560\" height=\"315\" src=\"https://hdbo.opstream5.com/share/b912f37f96b3511a694e0a035ffb9ec4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 31, 4, '2024-01-23 14:48:36', '2024-01-23 14:48:36'),
(58, 1, '<iframe width=\"560\" height=\"315\" src=\"https://hd1080.opstream2.com/share/48e081d443097598b231fe0f53e95fdd\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 33, 4, '2024-01-23 16:55:38', '2024-01-23 16:55:38'),
(59, 2, '<iframe width=\"560\" height=\"315\" src=\"https://drive.google.com/file/d/1z4Sjw6-j7vQ-u7qexUQoNyqe2K6kpEHf/view?usp=sharing\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 33, 4, '2024-01-23 16:57:15', '2024-01-23 16:57:15'),
(62, 1, '<iframe width=\"560\" height=\"315\" src=\"https://1080.opstream4.com/share/9fa0bb67ba754c1b4e5921c3bc837ceb\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 34, 4, '2024-01-25 11:09:55', '2024-01-25 11:09:55'),
(63, 2, '<iframe width=\"560\" height=\"315\" src=\"https://hdbo.opstream5.com/share/aa167aca772c07d97f34e612afc22ee4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 34, 4, '2024-01-25 11:10:12', '2024-01-25 11:10:12'),
(64, 3, '<iframe width=\"560\" height=\"315\" src=\"https://1080.opstream4.com/share/1a01f836b0c2494b9e95700f520f7df4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 34, 4, '2024-01-25 11:10:28', '2024-01-25 11:10:28'),
(65, 4, '<iframe width=\"560\" height=\"315\" src=\"https://hdbo.opstream5.com/share/de24515b506bc56b0e807f29beff7bd9\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 34, 4, '2024-01-25 11:10:44', '2024-01-25 11:10:44'),
(66, 5, '<iframe width=\"560\" height=\"315\" src=\"https://hdbo.opstream5.com/share/857763881cf6ef15c272415206e10282\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 34, 4, '2024-01-25 11:11:01', '2024-01-25 11:11:01'),
(67, 6, '<iframe width=\"560\" height=\"315\" src=\"https://hdbo.opstream5.com/share/e736598ba2c84d7313c8614de041cae3\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 34, 4, '2024-01-25 11:11:17', '2024-01-25 11:11:17'),
(68, 1, '<iframe width=\"560\" height=\"315\" src=\"https://hdbo.opstream5.com/share/53be5037beb270a5e1a29e6e3d915272\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 35, 4, '2024-01-25 11:16:41', '2024-01-25 11:16:41'),
(69, 5, '<iframe width=\"560\" height=\"315\" src=\"https://1080.opstream4.com/share/3c841cee5b2497ea9617f7e630b8ead1\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 19, 4, '2024-01-25 11:23:52', '2024-01-25 11:23:52'),
(70, 6, '<iframe width=\"560\" height=\"315\" src=\"https://1080.opstream4.com/share/ce3d226887027ea7af2f10710f221588\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 19, 4, '2024-01-25 11:24:10', '2024-01-25 11:24:10'),
(71, 7, '<iframe width=\"560\" height=\"315\" src=\"https://1080.opstream4.com/share/708748bbc20fcc6211b94ccd0592b4bf\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 19, 4, '2024-01-25 11:24:26', '2024-01-25 11:24:26'),
(72, 8, '<iframe width=\"560\" height=\"315\" src=\"https://1080.opstream4.com/share/222ac746d4f76b4741704d9c615dd2b6\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 19, 4, '2024-01-25 11:24:40', '2024-01-25 11:24:40'),
(73, 1, '<iframe width=\"560\" height=\"315\" src=\"https://hdbo.opstream5.com/share/405075699f065e43581f27d67bb68478\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 36, 4, '2024-01-25 15:52:58', '2024-01-25 15:52:58'),
(74, 1, '<iframe width=\"560\" height=\"315\" src=\"https://hd1080.opstream2.com/share/0180e9a354eccc55463ae4c11abfc5f4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 37, 4, '2024-01-25 16:00:26', '2024-01-25 16:00:26'),
(75, 1, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream11.com/share/cd92cbe966fd3498c1adc65f44aa3656\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>  </iframe>', 48, 4, '2024-02-19 16:15:16', '2024-02-19 16:15:16'),
(76, 2, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream11.com/share/1ccf6de7b9017b941e3fa12d17c66c88\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>  </iframe>', 48, 4, '2024-02-19 16:15:16', '2024-02-19 16:15:16'),
(77, 3, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream11.com/share/c96ce78d7e218fd59cecd94401be30ba\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>  </iframe>', 48, 4, '2024-02-19 16:15:16', '2024-02-19 16:15:16'),
(78, 4, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream11.com/share/27d332089c22e8f8578ec62a8e31dd2d\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>  </iframe>', 48, 4, '2024-02-19 16:15:16', '2024-02-19 16:15:16'),
(79, 5, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream17.com/share/cfbce4c1d7c425baf21d6b6f2babe6be\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>  </iframe>', 48, 4, '2024-02-19 16:15:16', '2024-02-19 16:15:16'),
(80, 1, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream16.com/share/cd882c767c8c59acb413a971a5b442f7\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>  </iframe>', 49, 4, '2024-02-29 15:50:26', '2024-02-29 15:50:26'),
(81, 2, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream16.com/share/83736f851256ebfd392d677baefc775d\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>  </iframe>', 49, 4, '2024-02-29 15:50:26', '2024-02-29 15:50:26'),
(82, 3, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream11.com/share/0ac8c1ec28ea5dbd46b0795eb7db51b5\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>  </iframe>', 49, 4, '2024-02-29 15:50:26', '2024-02-29 15:50:26'),
(83, 4, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream11.com/share/2ba46450ca83f7d0d90f555479c657a2\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>  </iframe>', 49, 4, '2024-02-29 15:50:26', '2024-02-29 15:50:26'),
(84, 5, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream11.com/share/ee13e0e56049f9ca95ca2457872fa701\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>  </iframe>', 49, 4, '2024-02-29 15:50:26', '2024-02-29 15:50:26'),
(85, 6, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream11.com/share/2db16138baffc8ed8901f0ddeac2c91d\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>  </iframe>', 49, 4, '2024-02-29 15:50:26', '2024-02-29 15:50:26'),
(86, 7, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream11.com/share/e814eed1c6987f78f4e5aebc9f053d52\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>  </iframe>', 49, 4, '2024-02-29 15:50:26', '2024-02-29 15:50:26'),
(87, 8, '<iframe width=\"560\" height=\"315\" src=\"https://vip.opstream11.com/share/b57a9c513abb3bff097f080b51e2f754\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen>  </iframe>', 49, 4, '2024-02-29 15:50:26', '2024-02-29 15:50:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Phim Chiếu Rạp', 'Phim Chiếu Rạp', 1, 'phim-chieu-rap'),
(2, 'Phim Kinh Dị', 'Phim Kinh Dị', 1, 'phim-kinh-di'),
(3, 'Phim Võ Thuật', 'Phim Võ Thuật', 1, 'phim-vo-thuat'),
(4, 'Phim Hoạt Hình', 'Phim Hoạt Hình', 1, 'phim-hoat-hinh'),
(5, 'Phim Viễn Tưởng', 'Phim Viễn Tưởng', 1, 'phim-vien-tuong'),
(6, 'Phim Hành Động', 'Phim Hành Động', 1, 'phim-hanh-dong'),
(7, 'Phim Hài', 'Phim Hài', 1, 'phim-hai'),
(8, 'Phim siêu nhân', 'Tổng hợp phim siêu nhân', 1, 'phim-sieu-nhan'),
(9, 'Phim Cổ Trang', 'Phim cổ trang hay', 1, 'phim-co-trang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `title` varchar(244) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `info`
--

INSERT INTO `info` (`id`, `title`, `description`, `logo`, `copyright`) VALUES
(1, 'Phim Hay | Phim Mới | Phim VietSub | Phim Online', 'Chào mừng bạn đến với trang web xem phim 2024 - nơi hội tụ hàng ngàn bộ phim đa dạng từ các thể loại khác nhau. Trải nghiệm tuyệt vời với chất lượng hình ảnh sắc nét và âm thanh sống động. Đặc biệt, giao diện đơn giản và dễ sử dụng giúp bạn dễ dàng tìm kiếm và khám phá những tác phẩm điện ảnh độc đáo. Hãy cùng chúng tôi khám phá thế giới của nghệ thuật điện ảnh ngay tại đây!', 'phimmoi8665.png', '© 2024. Mọi quyền được bảo lưu. Khám phá thế giới phim ảnh tại trang web chúng tôi - Nơi kết nối đam mê và nghệ thuật điện ảnh.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `linkmovie`
--

CREATE TABLE `linkmovie` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `linkmovie`
--

INSERT INTO `linkmovie` (`id`, `title`, `description`, `status`) VALUES
(4, 'Server Ophim', 'Xem tại server Ophim', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(2500) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `thuocphim` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phim_hot` int(11) NOT NULL,
  `resolution` int(11) NOT NULL DEFAULT 0,
  `name_eng` varchar(255) NOT NULL,
  `phude` int(11) NOT NULL DEFAULT 0,
  `ngaytao` varchar(100) DEFAULT NULL,
  `ngaycapnhat` varchar(100) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `thoiluong` varchar(60) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `topview` int(11) DEFAULT NULL,
  `season` int(11) DEFAULT 0,
  `trailer` varchar(255) DEFAULT NULL,
  `sotap` varchar(1111) NOT NULL,
  `count_view` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `status`, `slug`, `category_id`, `thuocphim`, `country_id`, `genre_id`, `image`, `phim_hot`, `resolution`, `name_eng`, `phude`, `ngaytao`, `ngaycapnhat`, `year`, `thoiluong`, `tags`, `topview`, `season`, `trailer`, `sotap`, `count_view`, `position`) VALUES
(19, 'Samurai Mắt Xanh', 'Samurai Mắt Xanh – Blue Eye Samurai (2023) khát khao trả thù những kẻ đã khiến cô bị ruồng bỏ ở Nhật Bản thời Edo, nữ chiến binh trẻ nọ dấn thân vào con đường đẫm máu dẫn tới số mệnh của mình.', 1, 'samurai-mat-xanh', 3, 'phimle', 3, 4, 'Samurai-mat-xanh2177.jpg', 0, 4, 'Blue Eyed Samurai', 0, '2023-11-15 15:06:14', '2024-01-25 11:18:53', '2018', '50 phút/ Tập', 'Phimmoi.Tv, PhimLau.Hd, PhimChill.TV', 0, 5, 'nJ1yQn17lbE', '8', 14, 10),
(25, 'Conan Movie 26: Tàu Ngầm Sắt Màu Đen', 'Conan Movie 26: Tàu Ngầm Sắt Màu Đen – Detective Conan Movie 26 (2023) địa điểm lần này được đặt ở vùng biển gần đảo Hachijo-jima, Tokyo. Các kỹ sư từ khắp nơi trên thế giới đã tập hợp để vận hành toàn diện “Phao Thái Bình Dương”, một cơ sở ngoài khơi để kết nối các camera an ninh thuộc sở hữu của lực lượng cảnh sát trên toàn thế giới.\r\n\r\nMột thử nghiệm về một “công nghệ mới” nhất định dựa trên hệ thống nhận dạng khuôn mặt đang được tiến hành ở đó. Trong khi đó, Conan và Đội thám tử nhí đến thăm Hachijo-jima theo lời mời của Sonoko và nhận được một cuộc điện thoại từ Subaru Okiya thông báo rằng một nhân viên Europol đã bị sát hại ở Đức bởi Jin của Tổ chức Áo đen. Conan lo lắng, lẻn vào cơ sở và phát hiện ra rằng một nữ kỹ sư đã bị Tổ chức Áo đen bắt cóc…! Hơn nữa, một ổ USB chứa một số thông tin nhất định mà cô ấy sở hữu lại lọt vào tay tổ chức… Một bóng đen cũng len lỏi vào Ai Haibara..', 1, 'conan-movie-26-tau-ngam-sat-mau-den', 3, 'phimle', 3, 4, 'Conan-Movie-2688.jpg', 1, 0, 'Conan Movie 26: Black Iron Submarine', 0, '2023-11-26 20:18:55', '2024-01-24 16:03:36', '2023', '110 phút', 'Conan Movie 26: Tàu Ngầm Sắt Màu Đen – Detective Conan Movie 26 (2023) địa điểm lần này được đặt ở vùng biển gần đảo Hachijo-jima, Tokyo. Các kỹ sư từ khắp nơi trên thế giới đã tập hợp để vận hành toàn diện “Phao Thái Bình Dương”, một cơ sở ngoài khơi để kết nối các camera an ninh thuộc sở hữu của lực lượng cảnh sát trên toàn thế giới.', 0, 0, 'FXgdEb4kPR4', '1', 1423, 0),
(29, 'NGƯỜI NHỆN: KHÔNG CÒN NHÀ', 'Bộ phim tiếp nối sự kiện của phần Spider-man: Far From Home khi phản diện Mysterio đã tiết lộ danh tính thực sự của người nhện là Peter Parker, Spiderman đã phải đối diện với nhiều lời khen chê trái chiều đến từ công chúng, việc này không những làm ảnh hưởng đến cuộc sống của Peter mà còn khiến Dì May, cậu bạn Ned và người yêu MJ bị liên lụy. Vì vậy Peter đã tìm đến Doctor Strange để nhờ ông tìm cách giải quyết chuyện này. Tuy nhiên trong quá trình thi triển thuật đảo ngược thời gian, do nhanh mồm nhanh miệng mà Peter đã khiến việc đọc phép gặp lỗi và mở ra những cánh cửa đưa các tên ác nhân ở các vũ trụ khác đến nơi cậu sinh sống. Liệu rằng Peter có thể sửa chữa được lỗi lầm của mình và điều gì đang chờ đợi cậu ở phía trước? Phim bám sát thuyết đa vũ trụ, cho phép tồn tại các chiều không gian song song. Mang đến trải nghiệm tuyệt vời cho khán giả khi thấy những nhân vật mình yêu thích xuất hiện, từ chính diện cho tới phản diện.', 1, 'nguoi-nhen-khong-con-nha', 2, 'phimle', 5, 1, 'nguoi-nhen-khong-con-nha-thumb7419.avif', 1, 0, 'Spider-Man: No Way Home', 0, '2024-01-23 14:14:36', '2024-01-24 16:03:28', '2021', '140 phút', 'Hành Động, Viễn Tưởng, Phiêu Lưu, Bí ẩn', NULL, 0, 'JfVOs4VSpmA', '1', 42441, 2),
(30, 'ÁC QUỶ MA SƠ: CHUYỆN CHƯA KỂ', 'Ác Quỷ Ma Sơ: Chuyện Chưa Kể - The Convent (2018):Chuyện phim xảy ra vào đầu thế kỷ 17, Persephone – một cô gái trẻ bị buộc tội sai và phải chịu giam cầm trong tòa lâu đài bí ẩn, đã được sơ Reverend cứu giúp đưa về tu viện. Nhưng khi đến nơi cô phát hiện ra đó không phải là một sự cứu rỗi mà là sự ám ảnh kinh hoàng', 1, 'ac-quy-ma-so-chuyen-chua-ke', 2, 'phimle', 9, 2, 'ac-quy-ma-so-chuyen-chua-ke-thumb4017.avif', 0, 0, 'The Convent', 0, '2024-01-23 14:27:44', '2024-01-24 16:47:29', '2019', 'N/A', 'Michael Ironside, Rosie Day, Hannah Arterton', NULL, 0, NULL, '1', 40358, 1),
(31, 'TẾT Ở LÀNG ĐỊA NGỤC', 'Các hậu duệ của một băng cướp khét tiếng điều tra hàng loạt án mạng tàn bạo ở làng của họ. Liệu đây là nghiệp chướng hay \"tác phẩm\" của kẻ báo thù?', 1, 'tet-o-lang-dia-nguc', 3, 'phimbo', 1, 2, 'Phim-tet-o-lang-dia-nguc9513.jpg', 1, 0, 'Hellbound Village', 0, '2024-01-23 14:38:23', '2024-01-24 16:02:38', '2023', '45 phút/ Tập', 'Quang Tuấn, Phú Đôn, Võ Tấn Phát, Nguyên Thảo, Vân Báu, Huỳnh Như Đan, Ngô Hải Na, Hạnh Thúy, Đình Khang, Ngọc Thư, Lan Phương', NULL, 0, 'C2V38ghWHlQ', '12', 90057, 11),
(33, 'Nữ Khổng Lồ Xanh (Phần 1)', 'Jennifer Walters điều hướng cuộc sống phức tạp của một luật sư 30 tuổi độc thân, đồng thời cũng là một Hulk siêu mạnh 6 feet 7 inch màu xanh lá cây.', 1, 'nu-khong-lo-xanh-phan-1', 3, 'phimbo', 5, 7, '62fe542f61f8e1074.jpg', 0, 0, 'She-Hulk: Attorney at Law (Season 1)', 0, '2024-01-23 15:22:45', '2024-01-25 11:04:04', '2023', '30 phút/ tập', 'Phim Bộ, Phim Bộ Mỹ, Phim Hài Hước, Phim Hành Động, Phim Viễn Tưởng', NULL, 0, NULL, '9', 15250, 9),
(34, 'PERCY JACKSON VÀ CÁC VỊ THẦN TRÊN ĐỈNH OLYMPUS', 'Percy Jackson is on a dangerous quest. Outrunning monsters and outwitting gods, he must journey across America to return Zeus\' master bolt and stop an all-out war. With the help of his quest mates Annabeth and Grover, Percy\'s journey will lead him closer to the answers he seeks: how to fit into a world where he feels out of place, and find out who he\'s destined to be.', 1, 'percy-jackson-va-cac-vi-than-tren-dinh-olympus', 3, 'phimbo', 5, 6, 'percy-jackson-va-cac-vi-than-tren-dinh-olympus-thumb3762.avif', 1, 0, 'Percy Jackson and the Olympians', 0, '2024-01-25 11:08:43', '2024-01-25 11:17:47', '2022', '50 phút/tập', 'Walker Scobell, Leah Sava Jeffries, Aryan Simhadri, Virginia Kull, Glynn Turman, Timm Sharp, Megan Mullally, Jason Mantzoukas, Adam Copeland, Jessica Parker Kennedy', NULL, 0, NULL, '8', 22425, NULL),
(35, 'ĐỆ TỬ THIẾU LÂM TAM THẬP LỤC PHÒNG', 'Monk San Te tries to support and protect Shaolin and her Fang Shih-yu who purposely attacks corrupt Ching officials.', 1, 'de-tu-thieu-lam-tam-thap-luc-phong', 2, 'phimle', 4, 9, 'de-tu-thieu-lam-tam-thap-luc-phong-thumb8633.avif', 0, 0, 'Đệ Tử Thiếu Lâm Tam Thập Lục Phòng', 0, '2024-01-25 11:16:01', '2024-01-25 11:17:33', '2000', '1h 33m', 'Hsiao Ho, Gordon Liu Chia-hui, Lily Li,', NULL, 0, NULL, '1', 37294, NULL),
(36, 'MÙA HÈ YÊU DẤU CỦA CHÚNG TA', 'Nhiều năm sau khi quay một bộ phim tài liệu đình đám ở trường cấp ba, hai người yêu cũ hay cãi vã nay bị kéo đến trước ống kính cùng nhau – và lại vướng vào nhau.', 1, 'mua-he-yeu-dau-cua-chung-ta', 3, 'phimbo', 2, 7, 'mua-he-yeu-dau-cua-chung-ta-thumb2887.avif', 0, 0, 'Our Beloved Summer', 0, '2024-01-25 15:47:21', '2024-01-25 15:48:11', '2024', '1g 2phút/tập', 'Choi Woo Shik, Kim Da Mi, Kim Sung Cheol, Roh Jeong Eui, Park Jin Joo, Jo Bok Rae, Ahn Dong Gu, Jeon Hye Weon, Park Weon Sang, Seo Jeong Yeon, Cha Mi Kyeong, Heo Joon Seok, Lee Seung Woo, Park Yeon Woo, Park Mi Hyun, Lee Sun Hee, Yun Sang Jeong, Park Do Wook, Jung Gang Hee, Cha Seung Yeup, Ahn Su Bin', NULL, 0, NULL, '12', 4468, NULL),
(37, 'Ma Sơ Trục Quỷ', 'Ma Sơ Trục Quỷ – La Exorcista (2023) Ofelia là một nữ tu trẻ vừa đặt chân đến thị trấn San Ramon đã bị ép phải thực hiện buổi lễ trừ tà cho một phụ nữ đang mang thai. Tưởng chừng buổi trục quỷ đã hoàn tất, Ofelia bàng hoàng nhận ra hiện thân quỷ dữ chưa từng biến mất.', 1, 'ma-so-truc-quy', 2, 'phimle', 5, 2, 'ma-so-truc-quy3108.jpg', 0, 0, 'Demon Axis Demon', 0, '2024-01-25 15:58:57', '2024-01-25 15:59:13', '2023', '101 phút', 'Ma Sơ Trục Quỷ – La Exorcista (2023) Ofelia là một nữ tu trẻ vừa đặt chân đến thị trấn San Ramon đã bị ép phải thực hiện buổi lễ trừ tà cho một phụ nữ đang mang thai. Tưởng chừng buổi trục quỷ đã hoàn tất, Ofelia bàng hoàng nhận ra hiện thân quỷ dữ chưa từng biến mất.', NULL, 0, NULL, '1', 40405, NULL),
(48, 'Bá Chủ Bầu Trời', 'Trong Thế chiến II, các phi công mạo hiểm mạng sống gia nhập Nhóm Ném Bom 100, tình anh em được hun đúc bởi lòng dũng cảm, sự mất mát và chiến thắng.', 1, 'ba-chu-bau-troi', 3, 'phimbo', 4, 9, 'ba-chu-bau-troi-thumb7539.avif', 0, 0, 'Masters of the Air', 0, '2024-02-19 16:06:52', '2024-02-29 15:53:17', '2009', '45 phút/tập', 'Bá Chủ Bầu Trời,ba-chu-bau-troi', 2, 0, 'https://www.youtube.com/watch?v=lA-1JCRguZ0', '9', 34350, NULL),
(49, 'Metallic Rouge', 'In this universe, people and artificial humans coexist.\r\nOne day, Rouge, the android girl, and her partner Naomi were assigned to a mission to Mars.\r\nThe mission\'s objective is to \"kill 9 androids who are hostile to the government.\"\r\nSo begins the war saga of the robotic female Rouge.', 1, 'metallic-rouge', 3, 'phimle', 2, 4, 'metallic-rouge-thumb (1)7864.jpg', 0, 5, 'メタリックルージュ', 0, '2024-02-29 15:50:14', '2024-02-29 15:56:52', '2017', '23phút/tập', 'Metallic Rouge,metallic-rouge', 1, 0, NULL, '? tập', 66485, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_category`
--

CREATE TABLE `movie_category` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_category`
--

INSERT INTO `movie_category` (`id`, `movie_id`, `category_id`) VALUES
(3, 31, 1),
(4, 31, 3),
(5, 30, 1),
(6, 29, 2),
(7, 25, 3),
(8, 19, 1),
(9, 19, 3),
(10, 33, 3),
(11, 30, 2),
(12, 33, 1),
(13, 35, 1),
(14, 35, 2),
(15, 34, 1),
(16, 34, 3),
(17, 36, 3),
(18, 37, 2),
(19, 38, 1),
(20, 39, 1),
(21, 39, 2),
(22, 40, 1),
(23, 42, 3),
(24, 43, 3),
(25, 44, 3),
(26, 45, 3),
(27, 46, 3),
(28, 47, 3),
(29, 48, 3),
(30, 49, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`) VALUES
(23, 19, 3),
(27, 19, 4),
(37, 25, 1),
(38, 25, 4),
(57, 29, 1),
(58, 30, 2),
(59, 31, 1),
(60, 31, 2),
(63, 33, 1),
(64, 33, 7),
(65, 34, 5),
(66, 34, 6),
(67, 35, 3),
(68, 35, 9),
(69, 36, 7),
(70, 37, 2),
(81, 48, 9),
(83, 49, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `rating`, `movie_id`, `ip_address`) VALUES
(4, 4, 8, '127.0.0.1'),
(5, 4, 24, '127.0.0.1'),
(6, 5, 25, '127.0.0.1'),
(7, 5, 27, '127.0.0.1'),
(8, 5, 31, '127.0.0.1'),
(9, 4, 34, '127.0.0.1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@webphim.com', NULL, '$2y$12$2Pi1dzsZVZ8YSR52bZgFp.0bq16kH/s898WUoSjGmiyeU24SEMlUK', 'zbh8eBBuG7S3PI3eZgMiLmHCT7GYdNBzArBGQ9BKOJbwoEJHAKUWFaXyp0wL', '2023-11-12 22:12:13', '2023-11-12 22:12:13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `linkmovie`
--
ALTER TABLE `linkmovie`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movie_category`
--
ALTER TABLE `movie_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `linkmovie`
--
ALTER TABLE `linkmovie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `movie_category`
--
ALTER TABLE `movie_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
