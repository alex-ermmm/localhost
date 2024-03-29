-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 24 2024 г., 10:13
-- Версия сервера: 5.7.39-log
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `homework3-1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `change` tinyint(1) DEFAULT NULL,
  `payment` tinyint(1) DEFAULT NULL,
  `callback` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `comment`, `change`, `payment`, `callback`, `user_id`, `date`) VALUES
(1, '9999', 0, 0, 1, 34, '2024-01-23 11:44:37'),
(2, '33', 0, 1, 0, 35, '2024-01-23 12:03:16'),
(5, '111', 0, 1, 1, 35, '2024-01-23 12:11:42'),
(6, '111', 0, 1, 1, 35, '2024-01-23 12:22:05'),
(7, '111', 0, 1, 1, 35, '2024-01-23 12:22:59'),
(8, '111', 0, 1, 1, 35, '2024-01-23 12:24:31'),
(9, '111', 0, 1, 1, 35, '2024-01-23 12:31:08'),
(10, '111', 0, 1, 1, 35, '2024-01-23 12:31:46'),
(11, '111', 0, 1, 1, 35, '2024-01-23 12:33:03'),
(12, '111', 0, 1, 1, 35, '2024-01-23 12:33:21'),
(13, '111', 0, 1, 1, 35, '2024-01-23 12:36:01'),
(14, '111', 0, 1, 1, 35, '2024-01-23 12:36:15'),
(15, '111', 0, 1, 1, 35, '2024-01-23 12:36:33'),
(16, '111', 0, 1, 1, 35, '2024-01-23 12:36:54'),
(17, '111', 0, 1, 1, 35, '2024-01-23 12:37:07'),
(18, '111', 0, 1, 1, 35, '2024-01-23 12:37:43'),
(19, '111', 0, 1, 1, 35, '2024-01-23 12:39:13'),
(20, '111', 0, 1, 1, 35, '2024-01-23 12:44:16'),
(21, '111', 0, 1, 1, 35, '2024-01-23 12:44:48'),
(22, '111', 0, 1, 1, 35, '2024-01-23 12:52:20'),
(23, '1111', 0, 0, 0, 35, '2024-01-23 12:52:52'),
(24, '222', 0, 1, 0, 35, '2024-01-23 12:53:35'),
(25, '2', 0, 1, 1, 35, '2024-01-23 12:53:51'),
(26, '22222', 0, 1, 0, 36, '2024-01-23 12:54:30'),
(27, '22222', 0, 1, 0, 36, '2024-01-23 12:54:42'),
(28, '22222', 0, 1, 0, 36, '2024-01-23 12:55:31'),
(29, '22222', 0, 1, 0, 36, '2024-01-23 12:55:47'),
(30, '22222', 0, 1, 0, 36, '2024-01-23 12:56:35'),
(31, '22222', 0, 1, 0, 36, '2024-01-23 12:57:58'),
(32, '22222', 0, 1, 0, 36, '2024-01-23 12:59:17'),
(33, '22222', 0, 1, 0, 36, '2024-01-23 12:59:36'),
(34, '22222', 0, 1, 0, 36, '2024-01-23 12:59:51'),
(35, '22222', 0, 1, 0, 36, '2024-01-23 13:00:01'),
(36, '22222', 0, 1, 0, 36, '2024-01-23 13:00:09'),
(37, '22222', 0, 1, 0, 36, '2024-01-23 13:00:57'),
(38, '22222', 0, 1, 0, 36, '2024-01-23 13:02:51'),
(39, '22222', 0, 1, 0, 36, '2024-01-23 13:03:11'),
(40, '22222', 0, 1, 0, 36, '2024-01-23 13:06:39'),
(41, '22222', 0, 1, 0, 36, '2024-01-23 13:08:09'),
(42, '22222', 0, 1, 0, 36, '2024-01-23 13:12:50'),
(43, '22222', 0, 1, 0, 36, '2024-01-23 13:12:53'),
(44, '22222', 0, 1, 0, 36, '2024-01-23 13:13:24'),
(45, '22222', 0, 1, 0, 36, '2024-01-23 13:13:55'),
(46, '22222', 0, 1, 0, 36, '2024-01-23 13:14:26'),
(47, '22222', 0, 1, 0, 36, '2024-01-23 13:16:28'),
(48, '22222', 0, 1, 0, 36, '2024-01-23 13:17:05'),
(49, '22222', 0, 1, 0, 36, '2024-01-23 13:19:02'),
(50, '22222', 0, 1, 0, 36, '2024-01-23 13:19:32'),
(51, '22222', 0, 1, 0, 36, '2024-01-23 13:19:42'),
(52, '22222', 0, 1, 0, 36, '2024-01-23 13:21:37'),
(53, '22222', 0, 1, 0, 36, '2024-01-23 13:21:50'),
(54, '22222', 0, 1, 0, 36, '2024-01-23 13:22:25'),
(55, '22222', 0, 1, 0, 36, '2024-01-23 13:22:39'),
(56, '22222', 0, 1, 0, 36, '2024-01-23 13:23:13'),
(57, '22222', 0, 1, 0, 36, '2024-01-23 13:23:49'),
(58, '22222', 0, 1, 0, 36, '2024-01-23 13:35:59'),
(59, '22222', 0, 1, 0, 36, '2024-01-23 15:04:23'),
(60, '111', 0, 1, 1, 37, '2024-01-24 09:51:14'),
(61, '2', 0, 1, 1, 35, '2024-01-24 09:51:37'),
(62, '2', 0, 1, 1, 35, '2024-01-24 09:52:38'),
(63, '2', 0, 1, 1, 35, '2024-01-24 09:53:19'),
(64, '2', 0, 1, 1, 35, '2024-01-24 09:53:42'),
(65, '2', 0, 1, 1, 35, '2024-01-24 09:53:58'),
(66, '2', 0, 1, 1, 35, '2024-01-24 09:55:02'),
(67, '2', 0, 1, 1, 35, '2024-01-24 09:57:10'),
(68, '2', 0, 1, 1, 35, '2024-01-24 09:57:39'),
(69, '2', 0, 1, 1, 38, '2024-01-24 10:09:31'),
(70, '2', 0, 1, 1, 38, '2024-01-24 10:09:43'),
(71, '2', 0, 1, 1, 38, '2024-01-24 10:11:35'),
(72, '2', 0, 1, 1, 38, '2024-01-24 10:12:00'),
(73, '2', 0, 1, 1, 38, '2024-01-24 10:12:25');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` decimal(14,0) NOT NULL,
  `street` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` int(11) DEFAULT NULL,
  `part` decimal(10,0) DEFAULT NULL,
  `appt` decimal(10,0) DEFAULT NULL,
  `floor` decimal(10,0) DEFAULT NULL,
  `orders_count` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `street`, `home`, `part`, `appt`, `floor`, `orders_count`) VALUES
(34, 'ddddd', 'ett2@www.ru', '75555555555', 'Садовая', 99, '99', '99', NULL, '0'),
(35, 'gdfgdfg', 'test@test.ru1', '75555555555', 'asdasd', 33, '33', '3', '3', '23'),
(36, '2222222', 'test@test.ru122', '72222222222', '222', 2, '2', '2', NULL, '0'),
(37, 'ddddd', 'alex11@test.ru', '74444444444', 'sadasd', 111, '11', '1', '1', '0'),
(38, 'Тест ', 'test@test.ru44', '78282838888', 'Тест', 1, '1', '22', '22', '5');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iser_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `iser_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
