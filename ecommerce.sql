-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql
-- 生成日時: 2024 年 4 月 16 日 07:04
-- サーバのバージョン： 8.0.1-dmr
-- PHP のバージョン: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `ecommerce`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `crated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `tel`, `post`, `address`, `password`, `crated_at`, `updated_at`) VALUES
(1, '伊藤太郎', 'ito@example.com', '09012345678', '1510034', '東京都目黒区', '$2y$12$1ZWlIvt1Fvw07lBUCqaRKeyhExaVS1PI3Y.cFddi20s0IsqlYcQ4y', '2024-03-30 06:28:58', '2024-04-10 12:31:30'),
(2, '斎藤和美', 'saito@example.com', '09012345678', '1910003', '東京都世田谷区', '$2y$12$HH6NLY8GvJfCcgfYJjZU9u/5fQesjR00cbCdSkoAeDOlcJ9c6Plfa', '2024-04-05 15:19:56', '2024-04-05 15:19:56'),
(3, '山田次郎', 't-yamada@example.com', '09012345678', '1920001', '東京都世田谷区', '$2y$12$HH6NLY8GvJfCcgfYJjZU9u/5fQesjR00cbCdSkoAeDOlcJ9c6Plfa', '2024-04-05 16:33:51', '2024-04-05 16:33:51');

-- --------------------------------------------------------

--
-- テーブルの構造 `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cart_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `cart_at`) VALUES
(3, 3, 2, '2024-03-30 10:30:00'),
(4, 4, 3, '2024-03-30 10:45:00'),
(5, 5, 3, '2024-03-30 11:00:00'),
(8, 3, 2, '2024-03-30 10:30:00'),
(9, 4, 3, '2024-03-30 10:45:00'),
(10, 5, 3, '2024-03-30 11:00:00'),
(13, 3, 2, '2024-03-30 10:30:00'),
(14, 4, 3, '2024-03-30 10:45:00'),
(15, 5, 3, '2024-03-30 11:00:00'),
(18, 3, 2, '2024-03-30 10:30:00'),
(19, 4, 3, '2024-03-30 10:45:00'),
(20, 5, 3, '2024-03-30 11:00:00'),
(27, 28, 1, '2024-04-16 07:03:30'),
(28, 24, 1, '2024-04-16 07:03:36'),
(32, 28, 1, '2024-04-08 05:24:46');

-- --------------------------------------------------------

--
-- テーブルの構造 `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `val` int(11) NOT NULL,
  `explanation` text COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `genre` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `name`, `val`, `explanation`, `picture`, `genre`, `created_at`, `updated_at`) VALUES
(1, 'Apparel1', 200, 'This is a detailed explanation of Apparel1.', 'path/to/apparel1.jpg', 'Tシャツ', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(2, 'Apparel2', 300, 'This is a detailed explanation of Apparel2.', 'path/to/apparel2.jpg', 'Yシャツ', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(3, 'Apparel3', 400, 'This is a detailed explanation of Apparel3. Update', 'path/to/apparel3.jpg', 'セーター', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(4, 'Apparel4', 500, 'This is a detailed explanation of Apparel4.', 'path/to/apparel4.jpg', 'コート', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(5, 'Apparel5', 600, 'This is a detailed explanation of Apparel5.', 'path/to/apparel5.jpg', 'コート', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(6, 'Apparel6', 700, 'This is a detailed explanation of Apparel6.', 'path/to/apparel6.jpg', 'ジャケット', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(7, 'Apparel7', 800, 'This is a detailed explanation of Apparel7.', 'path/to/apparel7.jpg', 'パンツ', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(8, 'Apparel8', 900, 'This is a detailed explanation of Apparel8.', 'path/to/apparel8.jpg', 'シューズ', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(9, 'Apparel9', 1000, 'This is a detailed explanation of Apparel9.', 'path/to/apparel9.jpg', 'アクセサリー', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(10, 'Apparel10', 100, 'This is a detailed explanation of Apparel10.', 'path/to/apparel10.jpg', 'Tシャツ', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(11, 'Apparel11', 200, 'This is a detailed explanation of Apparel11.', 'path/to/apparel11.jpg', 'Yシャツ', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(12, 'Apparel12', 300, 'This is a detailed explanation of Apparel12.', 'path/to/apparel12.jpg', 'セーター', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(13, 'Apparel13', 400, 'This is a detailed explanation of Apparel13.', 'path/to/apparel13.jpg', 'ロング', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(14, 'Apparel14', 500, 'This is a detailed explanation of Apparel14.', 'path/to/apparel14.jpg', 'コート', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(15, 'Apparel15', 600, 'This is a detailed explanation of Apparel15.', 'path/to/apparel15.jpg', 'ジャケット', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(16, 'Apparel16', 700, 'This is a detailed explanation of Apparel16.', 'path/to/apparel16.jpg', 'パンツ', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(17, 'Apparel17', 800, 'This is a detailed explanation of Apparel17.', 'path/to/apparel17.jpg', 'シューズ', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(18, 'Apparel18', 900, 'This is a detailed explanation of Apparel18.', 'path/to/apparel18.jpg', 'アクセサリー', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(19, 'Apparel19', 1000, 'This is a detailed explanation of Apparel19.', 'path/to/apparel19.jpg', 'Tシャツ', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(20, 'Apparel20', 100, 'This is a detailed explanation of Apparel20.', 'path/to/apparel20.jpg', 'Yシャツ', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(21, 'Apparel21', 200, 'This is a detailed explanation of Apparel21.', 'path/to/apparel21.jpg', 'セーター', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(22, 'Apparel22', 300, 'This is a detailed explanation of Apparel22.', 'path/to/apparel22.jpg', 'ロング', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(23, 'Apparel23', 400, 'This is a detailed explanation of Apparel23.', 'path/to/apparel23.jpg', 'コート', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(24, 'Apparel24', 500, 'This is a detailed explanation of Apparel24.', 'path/to/apparel24.jpg', 'ジャケット', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(25, 'Apparel25', 600, 'This is a detailed explanation of Apparel25.', 'path/to/apparel25.jpg', 'パンツ', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(26, 'Apparel26', 700, 'This is a detailed explanation of Apparel26.', 'path/to/apparel26.jpg', 'シューズ', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(27, 'Apparel27', 800, 'This is a detailed explanation of Apparel27.', 'path/to/apparel27.jpg', 'アクセサリー', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(28, 'Apparel28', 900, 'This is a detailed explanation of Apparel28.', 'path/to/apparel28.jpg', 'Tシャツ', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(29, 'Apparel29', 1000, 'This is a detailed explanation of Apparel29.', 'path/to/apparel29.jpg', 'Yシャツ', '2024-03-29 00:00:00', '2024-03-29 00:00:00'),
(30, 'Apparel30', 200, 'This is a detailed explanation of Apparel30.', 'path/to/apparel30.jpg', 'セーター', '2024-03-29 00:00:00', '2024-03-29 00:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `user_id`, `purchase_at`) VALUES
(1, 1, 1, '2024-04-02 02:19:07'),
(2, 2, 1, '2024-04-02 02:19:07'),
(3, 1, 1, '2024-04-02 02:19:07'),
(4, 2, 1, '2024-04-02 02:19:07'),
(5, 1, 1, '2024-04-02 02:19:07'),
(6, 2, 1, '2024-04-02 02:19:07'),
(7, 1, 1, '2024-04-02 02:19:07'),
(8, 2, 1, '2024-04-02 02:19:07'),
(9, 27, 1, '2024-04-02 02:19:07'),
(10, 27, 1, '2024-04-02 02:19:07'),
(11, 27, 1, '2024-04-02 02:19:07');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `crated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tel`, `post`, `address`, `password`, `crated_at`, `updated_at`) VALUES
(1, '山田 太郎', 'yamada@example.com', '09012345678', '1000001', '東京都渋谷区', '$2y$12$HH6NLY8GvJfCcgfYJjZU9u/5fQesjR00cbCdSkoAeDOlcJ9c6Plfa', '2024-03-29 02:44:21', '2024-03-31 16:28:06'),
(2, '鈴木 一郎', 'suzuki@example.com', '09087654321', '2000002', '大阪府大阪市', '$2y$12$HH6NLY8GvJfCcgfYJjZU9u/5fQesjR00cbCdSkoAeDOlcJ9c6Plfa', '2024-03-30 00:31:20', '2024-03-31 16:28:16'),
(3, '田中 次郎', 'tanaka@example.com', '08012341234', '3000003', '福岡県福岡市', '$2y$12$HH6NLY8GvJfCcgfYJjZU9u/5fQesjR00cbCdSkoAeDOlcJ9c6Plfa', '2024-03-29 02:44:30', '2024-03-31 16:28:23');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- テーブルの AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- テーブルの AUTO_INCREMENT `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
