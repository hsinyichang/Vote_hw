-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-07-14 19:22:39
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
(19, 0, 9, 42, '2022-06-29 05:22:10'),
(20, 8, 2, 8, '2022-06-30 14:28:03'),
(21, 3, 9, 41, '2022-07-01 03:15:28'),
(22, 3, 8, 39, '2022-07-01 03:15:42'),
(24, 8, 11, 44, '2022-07-04 04:10:03'),
(25, 8, 1, 1, '2022-07-05 01:32:07'),
(26, 4, 11, 45, '2022-07-05 04:14:09'),
(31, 3, 11, 43, '2022-07-05 12:45:45'),
(32, 8, 13, 54, '2022-07-08 11:00:50'),
(33, 8, 13, 56, '2022-07-08 11:00:50'),
(34, 8, 13, 58, '2022-07-08 11:00:50'),
(38, 4, 12, 49, '2022-07-08 15:04:28'),
(39, 4, 13, 56, '2022-07-08 15:04:40'),
(40, 3, 12, 48, '2022-07-09 13:50:44'),
(41, 8, 12, 47, '2022-07-09 14:59:08'),
(42, 4, 14, 64, '2022-07-10 05:37:59'),
(43, 8, 14, 62, '2022-07-10 07:00:41'),
(44, 3, 14, 68, '2022-07-10 07:07:27'),
(45, 17, 12, 51, '2022-07-10 09:59:06'),
(46, 17, 13, 55, '2022-07-10 09:59:20'),
(47, 17, 14, 60, '2022-07-10 09:59:31'),
(48, 18, 12, 50, '2022-07-11 06:38:15'),
(49, 4, 1, 59, '2022-07-11 13:07:32'),
(50, 4, 16, 72, '2022-07-11 13:56:49'),
(51, 17, 1, 2, '2022-07-11 14:02:48'),
(52, 17, 16, 77, '2022-07-11 14:13:03'),
(53, 4, 12, 52, '2022-07-14 13:43:28'),
(54, 3, 17, 78, '2022-07-14 14:39:53'),
(55, 8, 17, 79, '2022-07-14 15:57:48'),
(56, 20, 14, 64, '2022-07-14 16:19:33'),
(57, 21, 14, 68, '2022-07-14 16:22:28'),
(58, 21, 12, 47, '2022-07-14 16:26:36'),
(59, 21, 17, 79, '2022-07-14 16:28:53'),
(60, 21, 16, 76, '2022-07-14 16:48:14'),
(61, 21, 13, 57, '2022-07-14 16:48:36'),
(62, 21, 13, 58, '2022-07-14 16:48:36'),
(63, 19, 16, 77, '2022-07-14 17:04:16'),
(64, 19, 13, 58, '2022-07-14 17:15:10');

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
(1, '便當', 1, 2),
(2, '麥當勞', 1, 2),
(3, '肯德雞', 1, 1),
(4, '豬腳飯', 1, 1),
(5, '美而美', 2, 2),
(6, '7-11', 2, 1),
(7, 'QBurger', 2, 1),
(8, '永和豆漿', 2, 3),
(9, '全家', 2, 1),
(10, '穿西裝', 3, 0),
(11, '穿洋裝', 3, 0),
(12, '穿吊嘎', 3, 0),
(13, '穿制服', 3, 0),
(41, '要', 9, 4),
(42, '不要', 9, 1),
(43, '泰式料理', 11, 1),
(44, '中式料理', 11, 1),
(45, '美式料理', 11, 1),
(46, '越式料理', 11, 2),
(47, '機車', 12, 3),
(48, '開車', 12, 1),
(49, '捷運', 12, 1),
(50, '公車', 12, 1),
(51, '步行', 12, 1),
(52, '腳踏車', 12, 1),
(53, '唱歌', 13, 1),
(54, '逛街', 13, 1),
(55, '閱讀', 13, 1),
(56, '看電影', 13, 2),
(57, '運動', 13, 2),
(58, '踏青', 13, 3),
(59, '炸雞全餐', 1, 1),
(60, '美國', 14, 1),
(61, '英國', 14, 0),
(62, '澳洲', 14, 1),
(63, '非洲', 14, 0),
(64, '日本', 14, 2),
(65, '韓國', 14, 0),
(66, '土耳其', 14, 0),
(67, '加拿大', 14, 0),
(68, '歐洲', 14, 2),
(72, '貓咪', 16, 1),
(73, '狗狗', 16, 0),
(74, '烏龜', 16, 0),
(75, '小魚', 16, 0),
(76, '蛇', 16, 1),
(77, '寵物鼠', 16, 2),
(78, '非常有信心', 17, 1),
(79, '算了...我放棄', 17, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) UNSIGNED NOT NULL,
  `subject` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '主題',
  `type_id` int(11) NOT NULL COMMENT '分類序號',
  `multiple` tinyint(1) NOT NULL DEFAULT 0 COMMENT '單複選',
  `multi_limit` tinyint(2) NOT NULL DEFAULT 1,
  `start` date NOT NULL COMMENT '開始日期',
  `end` date NOT NULL COMMENT '結束日期',
  `total` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '投票總人數',
  `sh` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `type_id`, `multiple`, `multi_limit`, `start`, `end`, `total`, `sh`) VALUES
(1, '今天晚餐想吃什麼?', 4, 0, 1, '2022-06-13', '2022-07-12', 7, 0),
(2, '明天早餐吃什麼?', 4, 0, 1, '2022-06-13', '2022-06-23', 8, 1),
(3, '明天上課穿什麼?', 2, 1, 1, '2022-06-13', '2022-06-23', 10, 1),
(9, '是否要實體上課', 3, 0, 1, '2022-06-29', '2022-07-09', 5, 1),
(11, '你最愛吃哪種類的美食', 4, 0, 1, '2022-07-04', '2022-07-08', 5, 1),
(12, '上學使用什麼交通工具?', 7, 0, 1, '2022-07-08', '2022-07-16', 8, 1),
(13, '喜歡的休閒娛樂', 67, 1, 1, '2022-07-08', '2022-07-18', 6, 1),
(14, '最想去哪個國家遊玩', 2, 0, 1, '2022-07-10', '2022-07-23', 6, 1),
(16, '最想要養什麼寵物', 87, 0, 1, '2022-07-11', '2022-07-15', 4, 1),
(17, '網頁乙級考試有沒有信心', 3, 0, 1, '2022-07-14', '2022-07-21', 3, 1);

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
(1, '政治'),
(2, '生活'),
(3, '學習'),
(4, '美食'),
(7, '交通'),
(67, '娛樂'),
(87, '寵物');

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
  `education` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `passnote` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `acc`, `pw`, `name`, `birthday`, `gender`, `education`, `reg_date`, `passnote`, `email`) VALUES
(3, 'bii', 'MDEwNg==', 'Bii', '1986-01-06', 1, '大學', '2022-07-11 04:42:09', '0106', 'f1233772002@gmail.com'),
(4, 'louise', 'MDUwMw==', 'louise', '2015-05-03', 1, '', '2022-07-13 13:35:24', '0503', 'f1233772002@gmail.com'),
(8, 'gina', 'MDYxNQ==', '欣儀', '1922-06-15', 0, '大學', '2022-07-10 07:05:21', '0615', 'f1233772002@gmail.com'),
(17, 'ann', 'MDYyNzA2Mjc=', '恩恩', '2018-06-27', 0, '大學', '2022-07-11 04:43:48', '06270627', 'f1233772002@gmail.com'),
(18, 's', 'c3Nzc3Nz', 's', '2022-07-11', 1, 's', '2022-07-11 06:37:49', 's', 's@gmail.com'),
(19, 'test', 'MTIzNDU2Nzg5', 'test', '2022-07-21', 1, '大學', '2022-07-14 16:11:30', '123456789', 'f122002@gmail.com'),
(20, 'aaa', 'YWFhYWFhYWFh', 'aaa', '2022-07-22', 1, '大學', '2022-07-14 16:19:13', 'a**9', 'f1232@gmail.com'),
(21, 'bbb', 'YmJiYmJiYmJi', 'bbb', '2022-07-05', 0, '高中', '2022-07-14 16:21:04', 'b*9', 'f@gmail.com');

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
