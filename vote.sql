-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-29 08:41:04
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `vote`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admins`
--

CREATE TABLE `admins` (
  `id` int(11) UNSIGNED NOT NULL,
  `acc` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `admins`
--

INSERT INTO `admins` (`id`, `acc`, `pw`, `name`) VALUES
(1, 'admin', '4A7D1ED414474E4033AC29CCB8653D9B', '管理者');

-- --------------------------------------------------------

--
-- 資料表結構 `logs`
--

CREATE TABLE `logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `subject_id` int(11) UNSIGNED NOT NULL,
  `option_id` int(11) UNSIGNED NOT NULL,
  `vote_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `subject_id`, `option_id`, `vote_time`) VALUES
(1, 0, 8, 37, '2022-06-17 08:15:29'),
(2, 0, 8, 39, '2022-06-17 08:15:30'),
(3, 0, 1, 3, '2022-06-17 08:16:39'),
(4, 0, 8, 39, '2022-06-17 08:35:08'),
(5, 0, 8, 40, '2022-06-17 08:35:08'),
(6, 0, 8, 38, '2022-06-17 08:35:20'),
(7, 0, 8, 39, '2022-06-17 08:35:20'),
(8, 0, 8, 39, '2022-06-17 08:35:27'),
(9, 0, 8, 40, '2022-06-17 08:35:27'),
(10, 0, 1, 4, '2022-06-25 14:35:53'),
(11, 0, 1, 1, '2022-06-25 14:36:01'),
(12, 0, 1, 2, '2022-06-26 06:12:34'),
(13, 0, 2, 5, '2022-06-26 06:15:35'),
(14, 0, 2, 6, '2022-06-26 07:04:48'),
(15, 0, 2, 9, '2022-06-26 07:13:19'),
(16, 0, 2, 7, '2022-06-26 07:40:48'),
(17, 0, 2, 8, '2022-06-26 07:45:25'),
(18, 4, 2, 5, '2022-06-26 08:07:36'),
(19, 0, 9, 42, '2022-06-29 05:22:10');

-- --------------------------------------------------------

--
-- 資料表結構 `options`
--

CREATE TABLE `options` (
  `id` int(11) UNSIGNED NOT NULL,
  `option` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `options`
--

INSERT INTO `options` (`id`, `option`, `subject_id`, `total`) VALUES
(1, '吃便當', 1, 1),
(2, '吃麥當勞', 1, 1),
(3, '吃肯德雞', 1, 1),
(4, '吃豬腳飯', 1, 1),
(5, '美而美', 2, 2),
(6, '7-11', 2, 1),
(7, 'qBurger', 2, 1),
(8, '永和豆漿', 2, 2),
(9, '全家', 2, 1),
(10, '穿西裝', 3, 0),
(11, '穿洋裝', 3, 0),
(12, '穿吊嘎', 3, 0),
(13, '穿制服', 3, 0),
(35, 'dddddddd', 6, 0),
(36, 'EEEEEEE', 7, 0),
(37, '陳X中', 8, 1),
(38, '趙X中', 8, 1),
(39, '李X中', 8, 4),
(40, '王X中', 8, 2),
(41, '要', 9, 0),
(42, '不要', 9, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) UNSIGNED NOT NULL,
  `subject` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `multiple` tinyint(1) NOT NULL DEFAULT 0,
  `multi_limit` tinyint(2) NOT NULL DEFAULT 1,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `total` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `type_id`, `multiple`, `multi_limit`, `start`, `end`, `total`) VALUES
(1, '今天晚餐吃什麼?', 1, 0, 1, '2022-06-13', '2022-06-23', 24),
(2, '明天早餐吃飯', 1, 0, 1, '2022-06-13', '2022-06-23', 7),
(3, '明天上課穿什麼?', 1, 1, 1, '2022-06-13', '2022-06-23', 10),
(6, 'aaaaaaa', 1, 0, 1, '2022-06-17', '2022-06-27', 0),
(7, 'CCCC', 1, 1, 1, '2022-06-17', '2022-06-27', 0),
(8, '台北市長候選,你會選誰', 2, 1, 1, '2022-06-17', '2022-06-27', 4),
(9, '是否要實體上課', 1, 0, 1, '2022-06-29', '2022-07-09', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `types`
--

CREATE TABLE `types` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, '生活'),
(2, '政治');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `acc` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pw` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` tinyint(1) UNSIGNED NOT NULL,
  `addr` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date` date NOT NULL,
  `passnote` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `acc`, `pw`, `name`, `birthday`, `gender`, `addr`, `education`, `reg_date`, `passnote`, `email`) VALUES
(2, 'gina', '81dc9bdb52d04dc20036dbd8313ed055', '欣儀', '1992-06-15', 0, '中榮街104巷9號1樓', '大學', '2022-06-26', '1234', 'f1233772002@gmail.com');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `types`
--
ALTER TABLE `types`
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
-- 使用資料表自動遞增(AUTO_INCREMENT) `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
