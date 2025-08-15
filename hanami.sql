-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-08-04 08:00:25
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `hanami`
--

-- --------------------------------------------------------

--
-- 資料表結構 `ig_link`
--

CREATE TABLE `ig_link` (
  `id` int(10) UNSIGNED NOT NULL,
  `href` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `place`
--

CREATE TABLE `place` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `title` varchar(10) NOT NULL,
  `sh` int(1) UNSIGNED DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='環境/設備圖片';

--
-- 傾印資料表的資料 `place`
--

INSERT INTO `place` (`id`, `img`, `title`, `sh`, `created_at`, `uploaded_at`) VALUES
(1, '0b71cf82a327ab9783feb9de6c4595bf.jpg', '1', 1, '2025-07-24 06:47:06', '2025-07-24 05:37:34'),
(2, '591cd948525d3391b2a9ccab830b5078.jpg', '2', 1, '2025-07-24 06:47:06', '2025-07-24 05:22:02'),
(3, 'f7b89eb526c0d2073f6b5d2ce874fd55.jpg', '3', 0, '2025-07-24 06:47:06', '2025-07-25 00:35:18'),
(4, 'f7b89eb526c0d2073f6b5d2ce874fd55.jpg', '4', 1, '2025-07-24 06:47:06', '2025-07-24 05:34:27');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `alt` text NOT NULL COMMENT '分類名稱',
  `sh` int(1) UNSIGNED DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='作品集圖片';

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`id`, `img`, `title`, `alt`, `sh`, `created_at`, `uploaded_at`) VALUES
(2, '咖啡.jpg', '咖啡', '預算設計 A', 1, '2025-07-24 06:46:35', '2025-07-24 08:22:35'),
(3, '法式愛心.jpg', '法式愛心', '預算設計 A', 1, '2025-07-24 06:46:35', '2025-07-24 08:22:35'),
(4, '線條.jpg', '線條', '預算設計 B', 1, '2025-07-24 06:46:35', '2025-07-24 08:22:35'),
(5, '藍白貓.jpg', '藍白貓', '預算設計 A', 0, '2025-07-24 06:46:35', '2025-07-24 08:22:35'),
(6, '藍色.jpg', '藍色', '預算設計 B', 0, '2025-07-24 06:46:35', '2025-07-24 08:22:35'),
(8, '小花愛心.jpg', '小花愛心', '預算設計 B', 1, '2025-07-24 06:46:35', '2025-07-24 08:22:35'),
(11, '5468456b0bb806f7300035ba2f38129e.jpg', '小黑貓', '預算設計 A', 1, '2025-07-24 07:46:10', '2025-07-24 08:22:48'),
(12, 'c9cb5f7de8a32d830b41f93c339a648c.jpg', '貓咪', '預算設計 B', 1, '2025-07-24 07:46:28', '2025-07-24 08:22:48');

-- --------------------------------------------------------

--
-- 資料表結構 `reserve`
--

CREATE TABLE `reserve` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `title` varchar(10) NOT NULL,
  `sh` int(1) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='預約時間圖片';

--
-- 傾印資料表的資料 `reserve`
--

INSERT INTO `reserve` (`id`, `img`, `title`, `sh`, `created_at`, `uploaded_at`) VALUES
(1, 'd19ae3cfa12f6ff7aa7e4a4ef2f9427f.jpg', '8月', 0, '2025-07-24 06:48:19', '2025-07-25 00:21:33'),
(2, 'b0e9758d72a46634a358bdc1e2c69792.jpg', '9月', 0, '2025-07-24 06:48:32', '2025-07-25 00:21:33'),
(3, '997dc738ad902179586cb04d184a0385.jpg', '10月', 1, '2025-07-24 06:48:40', '2025-07-25 00:21:33');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` varchar(10) NOT NULL,
  `pw` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='使用者管理';

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `acc`, `pw`) VALUES
(1, 'admin', '1234'),
(4, 'test', '123456');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `ig_link`
--
ALTER TABLE `ig_link`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ig_link`
--
ALTER TABLE `ig_link`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `place`
--
ALTER TABLE `place`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `reserve`
--
ALTER TABLE `reserve`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
