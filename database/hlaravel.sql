-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 09, 2023 lúc 03:48 PM
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
-- Cơ sở dữ liệu: `hlaravel`
--

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
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(20, '2023_08_26_094811_create_products_table', 1);

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
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_desc` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_price` double(8,2) NOT NULL,
  `p_total` int(11) NOT NULL,
  `p_status` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `p_name`, `p_desc`, `p_img`, `p_price`, `p_total`, `p_status`, `cat_id`, `created_at`, `updated_at`) VALUES
(2, 'Computer A', 'This is computer A', 'cac san giao dich ho tro mua ban rndr.jpg', 100.00, 20, 1, 1, '2023-08-27 20:23:37', '2023-08-27 20:23:37'),
(7, 'Computer B-1', 'This is product B', 'token rdnr.jpg', 100.00, 20, 1, 1, '2023-08-27 20:34:29', '2023-08-27 20:34:29'),
(8, 'Computer B-2', 'This is product B', 'token rdnr.jpg', 100.00, 20, 1, 1, '2023-08-27 20:34:29', '2023-08-27 20:34:29'),
(9, 'Computer B-3', 'This is product B', 'token rdnr.jpg', 100.00, 20, 1, 1, '2023-08-27 20:34:29', '2023-08-27 20:34:29'),
(10, 'Computer B-4', 'This is product B', 'token rdnr.jpg', 100.00, 20, 1, 1, '2023-08-27 20:34:29', '2023-08-27 20:34:29'),
(11, 'Computer B-5', 'This is product B', 'token rdnr.jpg', 100.00, 20, 1, 1, '2023-08-27 20:34:29', '2023-08-27 20:34:29'),
(12, 'Computer B-6', 'This is product B', 'token rdnr.jpg', 100.00, 20, 1, 1, '2023-08-27 20:34:29', '2023-08-27 20:34:29'),
(13, 'Computer B-7', 'This is product B', 'token rdnr.jpg', 100.00, 20, 1, 1, '2023-08-27 20:34:29', '2023-08-27 20:34:29'),
(14, 'Computer B-8', 'This is product B', 'token rdnr.jpg', 100.00, 20, 1, 1, '2023-08-27 20:34:29', '2023-08-27 20:34:29'),
(15, 'Computer B-9', 'This is product B', 'token rdnr.jpg', 100.00, 20, 1, 1, '2023-08-27 20:34:29', '2023-08-27 20:34:29'),
(16, 'Computer B-10', 'This is product B', 'token rdnr.jpg', 100.00, 20, 1, 1, '2023-08-27 20:34:29', '2023-08-27 20:34:29'),
(17, 'Computer B-1', 'This is computer B', 'ho so.jpg', 100.00, 20, 1, 1, '2023-08-29 19:57:52', '2023-08-29 19:57:52'),
(18, 'Computer B-2', 'This is computer B', 'ho so.jpg', 100.00, 20, 1, 1, '2023-08-29 19:57:52', '2023-08-29 19:57:52'),
(19, 'Computer B-3', 'This is computer B', 'ho so.jpg', 100.00, 20, 1, 1, '2023-08-29 19:57:52', '2023-08-29 19:57:52'),
(20, 'Computer B-4', 'This is computer B', 'ho so.jpg', 100.00, 20, 1, 1, '2023-08-29 19:57:52', '2023-08-29 19:57:52'),
(21, 'Computer B-5', 'This is computer B', 'ho so.jpg', 100.00, 20, 1, 1, '2023-08-29 19:57:52', '2023-08-29 19:57:52'),
(22, 'Computer B-6', 'This is computer B', 'ho so.jpg', 100.00, 20, 1, 1, '2023-08-29 19:57:52', '2023-08-29 19:57:52'),
(23, 'Computer B-7', 'This is computer B', 'ho so.jpg', 100.00, 20, 1, 1, '2023-08-29 19:57:52', '2023-08-29 19:57:52'),
(24, 'Computer B-8', 'This is computer B', 'ho so.jpg', 100.00, 20, 1, 1, '2023-08-29 19:57:52', '2023-08-29 19:57:52'),
(25, 'Computer B-9', 'This is computer B', 'ho so.jpg', 100.00, 20, 1, 1, '2023-08-29 19:57:52', '2023-08-29 19:57:52'),
(26, 'Computer B-10', 'This is computer B', 'ho so.jpg', 100.00, 20, 1, 1, '2023-08-29 19:57:52', '2023-08-29 19:57:52'),
(27, 'Product name sample-1', 'this is crypto', 'ho so 1.jpg', 100.00, 20, 1, 1, '2023-08-29 20:28:33', '2023-08-29 20:28:33'),
(28, 'Product name sample-2', 'this is crypto', 'ho so 1.jpg', 100.00, 20, 1, 1, '2023-08-29 20:28:33', '2023-08-29 20:28:33'),
(29, 'Product name sample-3', 'this is crypto', 'ho so 1.jpg', 100.00, 20, 1, 1, '2023-08-29 20:28:33', '2023-08-29 20:28:33'),
(30, 'Product name sample-4', 'this is crypto', 'ho so 1.jpg', 100.00, 20, 1, 1, '2023-08-29 20:28:33', '2023-08-29 20:28:33'),
(31, 'Product name sample-5', 'this is crypto', 'ho so 1.jpg', 100.00, 20, 1, 1, '2023-08-29 20:28:33', '2023-08-29 20:28:33'),
(32, 'Product name sample-6', 'this is crypto', 'ho so 1.jpg', 100.00, 20, 1, 1, '2023-08-29 20:28:33', '2023-08-29 20:28:33'),
(33, 'Product name sample-7', 'this is crypto', 'ho so 1.jpg', 100.00, 20, 1, 1, '2023-08-29 20:28:33', '2023-08-29 20:28:33'),
(34, 'Product name sample-8', 'this is crypto', 'ho so 1.jpg', 100.00, 20, 1, 1, '2023-08-29 20:28:33', '2023-08-29 20:28:33'),
(35, 'Product name sample-9', 'this is crypto', 'ho so 1.jpg', 100.00, 20, 1, 1, '2023-08-29 20:28:33', '2023-08-29 20:28:33'),
(36, 'Product name sample-10', 'this is crypto', 'ho so 1.jpg', 100.00, 20, 1, 1, '2023-08-29 20:28:33', '2023-08-29 20:28:33'),
(37, 'Product name-1', 'Product name', 'ke gấp.jpg', 100.00, 20, 1, 1, '2023-08-29 20:31:45', '2023-08-29 20:31:45'),
(38, 'Product name-2', 'Product name', 'ke gấp.jpg', 100.00, 20, 1, 1, '2023-08-29 20:31:45', '2023-08-29 20:31:45'),
(39, 'Product name-3', 'Product name', 'ke gấp.jpg', 100.00, 20, 1, 1, '2023-08-29 20:31:45', '2023-08-29 20:31:45'),
(40, 'Product name-4', 'Product name', 'ke gấp.jpg', 100.00, 20, 1, 1, '2023-08-29 20:31:45', '2023-08-29 20:31:45'),
(41, 'Product name-5', 'Product name', 'ke gấp.jpg', 100.00, 20, 1, 1, '2023-08-29 20:31:45', '2023-08-29 20:31:45'),
(42, 'Product name-6', 'Product name', 'ke gấp.jpg', 100.00, 20, 1, 1, '2023-08-29 20:31:45', '2023-08-29 20:31:45'),
(43, 'Product name-7', 'Product name', 'ke gấp.jpg', 100.00, 20, 1, 1, '2023-08-29 20:31:45', '2023-08-29 20:31:45'),
(44, 'Product name-8', 'Product name', 'ke gấp.jpg', 100.00, 20, 1, 1, '2023-08-29 20:31:45', '2023-08-29 20:31:45'),
(45, 'Product name-9', 'Product name', 'ke gấp.jpg', 100.00, 20, 1, 1, '2023-08-29 20:31:45', '2023-08-29 20:31:45'),
(46, 'Product name-10', 'Product name', 'ke gấp.jpg', 100.00, 20, 1, 1, '2023-08-29 20:31:45', '2023-08-29 20:31:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Hoàng Trọng Hiếu', 'kungfuph', 'programming.iter@gmail.com', NULL, '$2y$10$E8c.aXwrhtp2dZP8cRnJzeD2LmlNTPdSBQAdsHIoFTaSW2WTCldne', NULL, '2023-08-27 17:28:59', '2023-08-27 17:28:59', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
