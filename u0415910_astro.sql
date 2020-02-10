-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 03 2020 г., 13:54
-- Версия сервера: 5.7.23-24
-- Версия PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u0415910_astro`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'Имя, заголовок, номер заказа',
  `type` varchar(255) NOT NULL COMMENT 'message / friend / comment / blacklist',
  `sender` int(11) DEFAULT NULL COMMENT 'ID отправителя запроса',
  `recipient` int(11) DEFAULT NULL COMMENT 'ID получателя / поста',
  `value` text COMMENT 'Сообщение',
  `img` int(11) DEFAULT NULL,
  `properties` text COMMENT 'json',
  `status` varchar(255) DEFAULT NULL COMMENT 'Статус прочтения',
  `date` datetime NOT NULL COMMENT 'Дата'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `id` int(255) NOT NULL,
  `user` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=304 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auth`
--

INSERT INTO `auth` (`id`, `user`, `session`, `client`, `ip`, `date`) VALUES
(1, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.25', '2019-03-21'),
(2, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.25', '2019-03-21'),
(3, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.25', '2019-03-21'),
(4, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.25', '2019-03-21'),
(5, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.25', '2019-03-21'),
(6, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.25', '2019-03-21'),
(7, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.25', '2019-03-21'),
(8, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.25', '2019-03-21'),
(9, 1, 'o81dmhdufsqahqsatohm6gkr81', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '127.0.0.1', '2019-03-22'),
(10, 1, 'o81dmhdufsqahqsatohm6gkr81', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '127.0.0.1', '2019-03-22'),
(11, 1, 'o81dmhdufsqahqsatohm6gkr81', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '127.0.0.1', '2019-03-22'),
(12, 1, 'o81dmhdufsqahqsatohm6gkr81', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '127.0.0.1', '2019-03-22'),
(13, 1, 'o81dmhdufsqahqsatohm6gkr81', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '127.0.0.1', '2019-03-22'),
(14, 1, 'o81dmhdufsqahqsatohm6gkr81', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '127.0.0.1', '2019-03-22'),
(15, 1, 'o81dmhdufsqahqsatohm6gkr81', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '127.0.0.1', '2019-03-22'),
(16, 1, 'o81dmhdufsqahqsatohm6gkr81', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '127.0.0.1', '2019-03-22'),
(17, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.53', '2019-03-25'),
(18, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.53', '2019-03-25'),
(19, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.53', '2019-03-25'),
(20, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.53', '2019-03-25'),
(21, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.53', '2019-03-25'),
(22, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.53', '2019-03-25'),
(23, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.53', '2019-03-25'),
(24, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.53', '2019-03-25'),
(25, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.53', '2019-03-25'),
(26, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.53', '2019-03-25'),
(27, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.53', '2019-03-25'),
(28, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.53', '2019-03-25'),
(29, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.53', '2019-03-25'),
(30, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.53', '2019-03-25'),
(31, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.53', '2019-03-25'),
(32, 1, '9fe4c6ee31134e5ecad6cd849e20d3b8', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36', '188.162.65.53', '2019-03-25'),
(33, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.49', '2019-03-26'),
(34, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.49', '2019-03-26'),
(35, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.49', '2019-03-26'),
(36, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.49', '2019-03-26'),
(37, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.49', '2019-03-26'),
(38, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.49', '2019-03-26'),
(39, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.49', '2019-03-26'),
(40, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.49', '2019-03-26'),
(41, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(42, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(43, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(44, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(45, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(46, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(47, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(48, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(49, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(50, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(51, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(52, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(53, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(54, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(55, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(56, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(57, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(58, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(59, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(60, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(61, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(62, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(63, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(64, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(65, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(66, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(67, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(68, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(69, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(70, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(71, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(72, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(73, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(74, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(75, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(76, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(77, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(78, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(79, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(80, 1, '9174a89f4b1936b18d9b17c01db20180', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(81, 1, 'bln2nmlrgo9q1aoqb0dfnasq87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '127.0.0.1', '2019-03-27'),
(82, 1, 'bln2nmlrgo9q1aoqb0dfnasq87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '127.0.0.1', '2019-03-27'),
(83, 1, 'bln2nmlrgo9q1aoqb0dfnasq87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '127.0.0.1', '2019-03-27'),
(84, 1, 'bln2nmlrgo9q1aoqb0dfnasq87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '127.0.0.1', '2019-03-27'),
(85, 1, 'bln2nmlrgo9q1aoqb0dfnasq87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '127.0.0.1', '2019-03-27'),
(86, 1, 'bln2nmlrgo9q1aoqb0dfnasq87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '127.0.0.1', '2019-03-27'),
(87, 1, 'bln2nmlrgo9q1aoqb0dfnasq87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '127.0.0.1', '2019-03-27'),
(88, 1, 'bln2nmlrgo9q1aoqb0dfnasq87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '127.0.0.1', '2019-03-27'),
(89, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(90, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(91, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(92, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(93, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(94, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(95, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(96, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.62', '2019-03-27'),
(97, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.34', '2019-03-28'),
(98, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.34', '2019-03-28'),
(99, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.34', '2019-03-28'),
(100, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.34', '2019-03-28'),
(101, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.34', '2019-03-28'),
(102, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.34', '2019-03-28'),
(103, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.34', '2019-03-28'),
(104, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.34', '2019-03-28'),
(105, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.34', '2019-03-28'),
(106, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.34', '2019-03-28'),
(107, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.34', '2019-03-28'),
(108, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.34', '2019-03-28'),
(109, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.34', '2019-03-28'),
(110, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.34', '2019-03-28'),
(111, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.34', '2019-03-28'),
(112, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.34', '2019-03-28'),
(113, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.47', '2019-03-29'),
(114, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.47', '2019-03-29'),
(115, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.47', '2019-03-29'),
(116, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.47', '2019-03-29'),
(117, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.47', '2019-03-29'),
(118, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.47', '2019-03-29'),
(119, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.47', '2019-03-29'),
(120, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.47', '2019-03-29'),
(121, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.17', '2019-04-02'),
(122, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.17', '2019-04-02'),
(123, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.17', '2019-04-02'),
(124, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.17', '2019-04-02'),
(125, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.17', '2019-04-02'),
(126, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.17', '2019-04-02'),
(127, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.17', '2019-04-02'),
(128, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.17', '2019-04-02'),
(129, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.25', '2019-04-03'),
(130, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.25', '2019-04-03'),
(131, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.25', '2019-04-03'),
(132, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.25', '2019-04-03'),
(133, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.25', '2019-04-03'),
(134, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.25', '2019-04-03'),
(135, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.25', '2019-04-03'),
(136, 1, 'a94fbd437dcc8bc357918ac052986e08', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '188.162.65.25', '2019-04-03'),
(137, 1, 'i848km7hkbh5v1j3nv9fs7o674', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '127.0.0.1', '2019-04-10'),
(138, 1, 'i848km7hkbh5v1j3nv9fs7o674', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '127.0.0.1', '2019-04-10'),
(139, 1, 'i848km7hkbh5v1j3nv9fs7o674', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '127.0.0.1', '2019-04-10'),
(140, 1, 'i848km7hkbh5v1j3nv9fs7o674', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '127.0.0.1', '2019-04-10'),
(141, 1, 'i848km7hkbh5v1j3nv9fs7o674', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '127.0.0.1', '2019-04-10'),
(142, 1, 'i848km7hkbh5v1j3nv9fs7o674', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '127.0.0.1', '2019-04-10'),
(143, 1, 'i848km7hkbh5v1j3nv9fs7o674', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '127.0.0.1', '2019-04-10'),
(144, 1, 'i848km7hkbh5v1j3nv9fs7o674', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36', '127.0.0.1', '2019-04-10'),
(145, 1, '5959f2ed8a1cd510af04951fa29efa74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.2489 Yowser/2.5 Safari/537.36', '31.134.148.125', '2019-04-20'),
(146, 1, '5959f2ed8a1cd510af04951fa29efa74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.2489 Yowser/2.5 Safari/537.36', '31.134.148.125', '2019-04-20'),
(147, 1, '5959f2ed8a1cd510af04951fa29efa74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.2489 Yowser/2.5 Safari/537.36', '31.134.148.125', '2019-04-20'),
(148, 1, '5959f2ed8a1cd510af04951fa29efa74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.2489 Yowser/2.5 Safari/537.36', '31.134.148.125', '2019-04-20'),
(149, 1, '5959f2ed8a1cd510af04951fa29efa74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.2489 Yowser/2.5 Safari/537.36', '31.134.148.125', '2019-04-20'),
(150, 1, '5959f2ed8a1cd510af04951fa29efa74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.2489 Yowser/2.5 Safari/537.36', '31.134.148.125', '2019-04-20'),
(151, 1, '5959f2ed8a1cd510af04951fa29efa74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.2489 Yowser/2.5 Safari/537.36', '31.134.148.125', '2019-04-20'),
(152, 1, '5959f2ed8a1cd510af04951fa29efa74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.2489 Yowser/2.5 Safari/537.36', '31.134.148.125', '2019-04-20'),
(153, 1, '5959f2ed8a1cd510af04951fa29efa74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.2489 Yowser/2.5 Safari/537.36', '31.134.148.125', '2019-04-20'),
(154, 1, '5959f2ed8a1cd510af04951fa29efa74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.2489 Yowser/2.5 Safari/537.36', '31.134.148.125', '2019-04-20'),
(155, 1, '5959f2ed8a1cd510af04951fa29efa74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.2489 Yowser/2.5 Safari/537.36', '31.134.148.125', '2019-04-20'),
(156, 1, '5959f2ed8a1cd510af04951fa29efa74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.2489 Yowser/2.5 Safari/537.36', '31.134.148.125', '2019-04-20'),
(157, 1, '5959f2ed8a1cd510af04951fa29efa74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.2489 Yowser/2.5 Safari/537.36', '31.134.148.125', '2019-04-20'),
(158, 1, '5959f2ed8a1cd510af04951fa29efa74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.2489 Yowser/2.5 Safari/537.36', '31.134.148.125', '2019-04-20'),
(159, 1, '5959f2ed8a1cd510af04951fa29efa74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.2489 Yowser/2.5 Safari/537.36', '31.134.148.125', '2019-04-20'),
(160, 1, '5959f2ed8a1cd510af04951fa29efa74', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.109 YaBrowser/19.3.0.2489 Yowser/2.5 Safari/537.36', '31.134.148.125', '2019-04-20'),
(161, 1, '059a1372fc68182fafe10f08aa7550a5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', '91.204.150.77', '2019-04-25'),
(162, 1, '059a1372fc68182fafe10f08aa7550a5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', '91.204.150.77', '2019-04-25'),
(163, 1, '059a1372fc68182fafe10f08aa7550a5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', '91.204.150.77', '2019-04-25'),
(164, 1, '059a1372fc68182fafe10f08aa7550a5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', '91.204.150.77', '2019-04-25'),
(165, 1, '059a1372fc68182fafe10f08aa7550a5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', '91.204.150.77', '2019-04-25'),
(166, 1, '059a1372fc68182fafe10f08aa7550a5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', '91.204.150.77', '2019-04-25'),
(167, 1, '059a1372fc68182fafe10f08aa7550a5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', '91.204.150.77', '2019-04-25'),
(168, 1, '059a1372fc68182fafe10f08aa7550a5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36', '91.204.150.77', '2019-04-25'),
(169, 1, 'c19c1910744001f5f192476e8f7d2995', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '5.18.249.180', '2019-05-20'),
(170, 1, 'c19c1910744001f5f192476e8f7d2995', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '5.18.249.180', '2019-05-20'),
(171, 1, 'c19c1910744001f5f192476e8f7d2995', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '5.18.249.180', '2019-05-20'),
(172, 1, 'c19c1910744001f5f192476e8f7d2995', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '5.18.249.180', '2019-05-20'),
(173, 1, 'c19c1910744001f5f192476e8f7d2995', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '5.18.249.180', '2019-05-20'),
(174, 1, 'c19c1910744001f5f192476e8f7d2995', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '5.18.249.180', '2019-05-20'),
(175, 1, 'c19c1910744001f5f192476e8f7d2995', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '5.18.249.180', '2019-05-20'),
(176, 1, 'c19c1910744001f5f192476e8f7d2995', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.131 Safari/537.36', '5.18.249.180', '2019-05-20'),
(177, 1, 'c470baf929e38bca7a9e5311c9ef68c5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '5.18.249.180', '2019-07-24'),
(178, 1, 'c470baf929e38bca7a9e5311c9ef68c5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '5.18.249.180', '2019-07-24'),
(179, 1, 'c470baf929e38bca7a9e5311c9ef68c5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '5.18.249.180', '2019-07-24'),
(180, 1, 'c470baf929e38bca7a9e5311c9ef68c5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '5.18.249.180', '2019-07-24'),
(181, 1, 'c470baf929e38bca7a9e5311c9ef68c5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '5.18.249.180', '2019-07-24'),
(182, 1, 'c470baf929e38bca7a9e5311c9ef68c5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '5.18.249.180', '2019-07-24'),
(183, 1, 'c470baf929e38bca7a9e5311c9ef68c5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '5.18.249.180', '2019-07-24'),
(184, 1, 'c470baf929e38bca7a9e5311c9ef68c5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '5.18.249.180', '2019-07-24'),
(185, 1, 'c470baf929e38bca7a9e5311c9ef68c5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '5.18.249.180', '2019-07-26'),
(186, 1, 'c470baf929e38bca7a9e5311c9ef68c5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '5.18.249.180', '2019-07-26'),
(187, 1, 'c470baf929e38bca7a9e5311c9ef68c5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '5.18.249.180', '2019-07-26'),
(188, 1, 'c470baf929e38bca7a9e5311c9ef68c5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '5.18.249.180', '2019-07-26'),
(189, 1, 'c470baf929e38bca7a9e5311c9ef68c5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '5.18.249.180', '2019-07-26'),
(190, 1, 'c470baf929e38bca7a9e5311c9ef68c5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '5.18.249.180', '2019-07-26'),
(191, 1, 'c470baf929e38bca7a9e5311c9ef68c5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '5.18.249.180', '2019-07-26'),
(192, 1, 'c470baf929e38bca7a9e5311c9ef68c5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36', '5.18.249.180', '2019-07-26'),
(193, 1, 'aa9bb4e9215fea7959fba57acb98383d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '91.204.150.77', '2019-08-09'),
(194, 1, 'aa9bb4e9215fea7959fba57acb98383d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '91.204.150.77', '2019-08-09'),
(195, 1, 'aa9bb4e9215fea7959fba57acb98383d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '91.204.150.77', '2019-08-09'),
(196, 1, 'aa9bb4e9215fea7959fba57acb98383d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '91.204.150.77', '2019-08-09'),
(197, 1, 'aa9bb4e9215fea7959fba57acb98383d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '91.204.150.77', '2019-08-09'),
(198, 1, 'aa9bb4e9215fea7959fba57acb98383d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '91.204.150.77', '2019-08-09'),
(199, 1, 'aa9bb4e9215fea7959fba57acb98383d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '91.204.150.77', '2019-08-09'),
(200, 1, 'aa9bb4e9215fea7959fba57acb98383d', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '91.204.150.77', '2019-08-09'),
(201, 1, 'nlp4l47n0vcfhjhtrq7eue7e96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-09'),
(202, 1, 'nlp4l47n0vcfhjhtrq7eue7e96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-09'),
(203, 1, 'nlp4l47n0vcfhjhtrq7eue7e96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-09'),
(204, 1, 'nlp4l47n0vcfhjhtrq7eue7e96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-09'),
(205, 1, 'nlp4l47n0vcfhjhtrq7eue7e96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-09'),
(206, 1, 'nlp4l47n0vcfhjhtrq7eue7e96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-09'),
(207, 1, 'nlp4l47n0vcfhjhtrq7eue7e96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-09'),
(208, 1, 'nlp4l47n0vcfhjhtrq7eue7e96', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-09'),
(209, 1, 'e8a11b4f76e00e236025973e2397200a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '91.204.150.77', '2019-08-13'),
(210, 1, 'e8a11b4f76e00e236025973e2397200a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '91.204.150.77', '2019-08-13'),
(211, 1, 'e8a11b4f76e00e236025973e2397200a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '91.204.150.77', '2019-08-13'),
(212, 1, 'e8a11b4f76e00e236025973e2397200a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '91.204.150.77', '2019-08-13'),
(213, 1, 'e8a11b4f76e00e236025973e2397200a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '91.204.150.77', '2019-08-13'),
(214, 1, 'e8a11b4f76e00e236025973e2397200a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '91.204.150.77', '2019-08-13'),
(215, 1, 'e8a11b4f76e00e236025973e2397200a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '91.204.150.77', '2019-08-13'),
(216, 1, 'e8a11b4f76e00e236025973e2397200a', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '91.204.150.77', '2019-08-13'),
(217, 1, 'e79e949c0abf143796c0b659be2af824', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '5.18.249.180', '2019-08-15'),
(218, 1, 'e79e949c0abf143796c0b659be2af824', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '5.18.249.180', '2019-08-15'),
(219, 1, 'e79e949c0abf143796c0b659be2af824', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '5.18.249.180', '2019-08-15'),
(220, 1, 'e79e949c0abf143796c0b659be2af824', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '5.18.249.180', '2019-08-15'),
(221, 1, 'e79e949c0abf143796c0b659be2af824', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '5.18.249.180', '2019-08-15'),
(222, 1, 'e79e949c0abf143796c0b659be2af824', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '5.18.249.180', '2019-08-15'),
(223, 1, 'e79e949c0abf143796c0b659be2af824', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '5.18.249.180', '2019-08-15'),
(224, 1, 'e79e949c0abf143796c0b659be2af824', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '5.18.249.180', '2019-08-15'),
(225, 1, '7f5cc405b0323fdbee388aedf8a38c2f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '5.18.249.180', '2019-08-20'),
(226, 1, '7f5cc405b0323fdbee388aedf8a38c2f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '5.18.249.180', '2019-08-20'),
(227, 1, '7f5cc405b0323fdbee388aedf8a38c2f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '5.18.249.180', '2019-08-20'),
(228, 1, '7f5cc405b0323fdbee388aedf8a38c2f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '5.18.249.180', '2019-08-20'),
(229, 1, '7f5cc405b0323fdbee388aedf8a38c2f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '5.18.249.180', '2019-08-20'),
(230, 1, '7f5cc405b0323fdbee388aedf8a38c2f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '5.18.249.180', '2019-08-20'),
(231, 1, '7f5cc405b0323fdbee388aedf8a38c2f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '5.18.249.180', '2019-08-20'),
(232, 1, '7f5cc405b0323fdbee388aedf8a38c2f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '5.18.249.180', '2019-08-20'),
(233, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(234, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(235, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(236, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(237, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(238, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(239, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(240, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(241, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(242, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(243, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(244, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(245, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(246, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(247, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(248, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(249, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36', '127.0.0.1', '2019-08-20'),
(250, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '188.143.140.107', '2019-09-08'),
(251, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '188.143.140.107', '2019-09-08'),
(252, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '188.143.140.107', '2019-09-08'),
(253, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '188.143.140.107', '2019-09-08'),
(254, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '188.143.140.107', '2019-09-08'),
(255, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '188.143.140.107', '2019-09-08'),
(256, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '188.143.140.107', '2019-09-08'),
(257, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '188.143.140.107', '2019-09-08'),
(258, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '188.143.140.107', '2019-09-08'),
(259, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '84.52.94.229', '2019-09-12');
INSERT INTO `auth` (`id`, `user`, `session`, `client`, `ip`, `date`) VALUES
(260, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '84.52.94.229', '2019-09-12'),
(261, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '84.52.94.229', '2019-09-12'),
(262, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '84.52.94.229', '2019-09-12'),
(263, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '84.52.94.229', '2019-09-12'),
(264, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '84.52.94.229', '2019-09-12'),
(265, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '84.52.94.229', '2019-09-12'),
(266, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '84.52.94.229', '2019-09-12'),
(267, 1, '73f443ea20d7d1897b1c90ed7badadc5', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '84.52.94.229', '2019-09-12'),
(268, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '127.0.0.1', '2019-09-19'),
(269, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '127.0.0.1', '2019-09-19'),
(270, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '127.0.0.1', '2019-09-19'),
(271, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '127.0.0.1', '2019-09-19'),
(272, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '127.0.0.1', '2019-09-19'),
(273, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '127.0.0.1', '2019-09-19'),
(274, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '127.0.0.1', '2019-09-19'),
(275, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '127.0.0.1', '2019-09-19'),
(276, 1, 't70lhd9985t6l2sfico9gvsb21', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36', '127.0.0.1', '2019-09-19'),
(277, 1, '8047591f8ee2a017f7c74088dff17ac9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '5.18.233.78', '2020-01-23'),
(278, 1, '8047591f8ee2a017f7c74088dff17ac9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '5.18.233.78', '2020-01-23'),
(279, 1, '8047591f8ee2a017f7c74088dff17ac9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '5.18.233.78', '2020-01-23'),
(280, 1, '8047591f8ee2a017f7c74088dff17ac9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '5.18.233.78', '2020-01-23'),
(281, 1, '8047591f8ee2a017f7c74088dff17ac9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '5.18.233.78', '2020-01-23'),
(282, 1, '8047591f8ee2a017f7c74088dff17ac9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '5.18.233.78', '2020-01-23'),
(283, 1, '8047591f8ee2a017f7c74088dff17ac9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '5.18.233.78', '2020-01-23'),
(284, 1, '8047591f8ee2a017f7c74088dff17ac9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '5.18.233.78', '2020-01-23'),
(285, 1, '8047591f8ee2a017f7c74088dff17ac9', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '5.18.233.78', '2020-01-23'),
(286, 1, '0vv161mccb18crpo2mfnnbf4g4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-27'),
(287, 1, '0vv161mccb18crpo2mfnnbf4g4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-27'),
(288, 1, '0vv161mccb18crpo2mfnnbf4g4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-27'),
(289, 1, '0vv161mccb18crpo2mfnnbf4g4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-27'),
(290, 1, '0vv161mccb18crpo2mfnnbf4g4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-27'),
(291, 1, '0vv161mccb18crpo2mfnnbf4g4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-27'),
(292, 1, '0vv161mccb18crpo2mfnnbf4g4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-27'),
(293, 1, '0vv161mccb18crpo2mfnnbf4g4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-27'),
(294, 1, '0vv161mccb18crpo2mfnnbf4g4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-27'),
(295, 1, 'gjohl35plep53fmsjmhr481b55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-31'),
(296, 1, 'gjohl35plep53fmsjmhr481b55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-31'),
(297, 1, 'gjohl35plep53fmsjmhr481b55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-31'),
(298, 1, 'gjohl35plep53fmsjmhr481b55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-31'),
(299, 1, 'gjohl35plep53fmsjmhr481b55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-31'),
(300, 1, 'gjohl35plep53fmsjmhr481b55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-31'),
(301, 1, 'gjohl35plep53fmsjmhr481b55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-31'),
(302, 1, 'gjohl35plep53fmsjmhr481b55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-31'),
(303, 1, 'gjohl35plep53fmsjmhr481b55', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-31');

-- --------------------------------------------------------

--
-- Структура таблицы `filters`
--

CREATE TABLE IF NOT EXISTS `filters` (
  `id` int(11) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL COMMENT 'ID родительской категории',
  `of` int(11) DEFAULT NULL COMMENT 'ID фильтра',
  `name` varchar(255) DEFAULT NULL COMMENT 'Внутреннее Имя',
  `title` varchar(255) NOT NULL COMMENT 'Отображаемое имя',
  `value` text,
  `type` varchar(255) DEFAULT NULL,
  `visibility` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `type` varchar(11) NOT NULL DEFAULT 'image' COMMENT 'image/video',
  `mime` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Имя файла',
  `extension` varchar(255) DEFAULT NULL,
  `src` varchar(255) DEFAULT NULL COMMENT 'uri путь к файлу. NULL = IMAGE_URI',
  `title` varchar(255) DEFAULT NULL COMMENT 'Название медиафайла'
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `media`
--

INSERT INTO `media` (`id`, `parent`, `type`, `mime`, `name`, `extension`, `src`, `title`) VALUES
(102, NULL, 'image', 'image/jpeg', '7a5a69a53624aa705fbe73605b712f99_1567944769_0', 'jpg', NULL, NULL),
(103, NULL, 'image', 'image/jpeg', '6136c22e7a83902ab4c73af72f13f8e4_1567944850_0', 'jpg', NULL, NULL),
(104, NULL, 'image', 'image/jpeg', '5c96ed9b9567e252563b067ab9465350_1567944944_0', 'jpg', NULL, NULL),
(105, NULL, 'image', 'image/jpeg', '3cd76ec3ba1ca1d33761a716a761122a_1567945064_0', 'jpg', NULL, NULL),
(106, NULL, 'image', 'image/jpeg', 'da4b656d95cb4b7a2094edec5e7d58f5_1567945095_0', 'jpg', NULL, NULL),
(107, NULL, 'image', 'image/jpeg', '5dff4265404c2da1099d820f8a036dea_1567945136_0', 'jpeg', NULL, NULL),
(108, NULL, 'image', 'image/jpeg', 'ef71bc2ed29eddd937a769cd3505e81e_1567945176_0', 'jpg', NULL, NULL),
(109, NULL, 'image', 'image/jpeg', 'c4fc54c23a2900d24ea1a4923bfe1ccd_1567945354_0', 'jpg', NULL, NULL),
(110, NULL, 'image', 'image/jpeg', '47e3831d44ec5ca853c27efefa69cb5c_1567945419_0', 'jpg', NULL, NULL),
(111, NULL, 'image', 'image/png', 'b3a713e8673fc22bbf67ee9be043121c_1567945669_0', 'png', NULL, NULL),
(112, NULL, 'image', 'image/jpeg', '6a4c76518583251fa3f838c0e14425b9_1567945792_0', 'jpg', NULL, NULL),
(113, NULL, 'image', 'image/jpeg', '79842f76188716ef49b602d8c46b32d0_1567945882_0', 'jpg', NULL, NULL),
(114, NULL, 'image', 'image/jpeg', 'fbcd586a913bd28a86fdf18a9c37c357_1567945934_0', 'jpg', NULL, NULL),
(115, NULL, 'image', 'image/jpeg', 'eb369f937bba3ea616376449535cd9e7_1567946294_0', 'jpg', NULL, NULL),
(116, NULL, 'image', 'image/jpeg', 'c0705369b57c84e4a940bb9d4702aa57_1567946795_0', 'jpg', NULL, NULL),
(117, NULL, 'image', 'image/png', '04b88c7d78c28d636029eb688594c823_1567947070_0', 'png', NULL, NULL),
(118, NULL, 'image', 'image/jpeg', 'f14c3bd78956d42e08ea3a0347915131_1567947314_0', 'jpg', NULL, NULL),
(119, NULL, 'image', 'image/jpeg', 'feeec9e1b7012d8069c2eb406db2fe6d_1567947358_0', 'jpg', NULL, NULL),
(120, NULL, 'image', 'image/jpeg', 'c074a7ab8b929733055c33110cc96049_1567947383_0', 'jpeg', NULL, NULL),
(121, NULL, 'image', 'image/jpeg', '05f37ab967b7a4e77b0f41b3f3a8564c_1567947420_0', 'jpg', NULL, NULL),
(122, NULL, 'image', 'image/jpeg', '7e9b281042fb5ef22d7402fc8e9fff2e_1567947459_0', 'jpg', NULL, NULL),
(123, NULL, 'image', 'image/jpeg', '497f204f6ebb70b0387a64da5fffda7d_1567947490_0', 'jpg', NULL, NULL),
(124, NULL, 'image', 'image/jpeg', '659fee0ffd29ada5b6e48ea0dd747313_1567947560_0', 'jpg', NULL, NULL),
(125, NULL, 'image', 'image/jpeg', 'a447244f1bd867391fcf7aa12c40aa68_1567947612_0', 'jpg', NULL, NULL),
(126, NULL, 'image', 'image/jpeg', '76b9cab7b63ddd780a181b037729abc0_1567947647_0', 'jpg', NULL, NULL),
(127, NULL, 'image', 'image/jpeg', '1945c63da4e876bf52fdb67f59369d95_1567947689_0', 'jpg', NULL, NULL),
(129, NULL, 'image', 'image/jpeg', 'c48e81eb3c96b25e0a418ad544c5b50b_1567947790_0', 'jpg', NULL, NULL),
(130, NULL, 'image', 'image/jpeg', 'd4452931ce1b3feef6e4231b04233887_1567947926_0', 'jpg', NULL, NULL),
(131, NULL, 'image', 'image/jpeg', '8236e514601d4dddf66c3478b1242516_1567948002_0', 'jpg', NULL, NULL),
(134, NULL, 'image', 'image/jpeg', '9d05666b5c370c5371d03dafe87bcd9c_1567949317_0', 'jpeg', NULL, NULL),
(135, NULL, 'image', 'image/jpeg', '5ce6635b9cee3785498d7cd4ec9e5694_1568299516_0', 'jpg', NULL, NULL),
(136, NULL, 'image', 'image/jpeg', '0b6b2042083bc0f8bb439251b8b27490_1568299584_0', 'jpg', NULL, NULL),
(137, NULL, 'image', 'image/jpeg', '1979a5b5ac0ca86837492cae5a9106b6_1568299658_0', 'jpg', NULL, NULL),
(138, NULL, 'image', 'image/jpeg', 'a1a5336ac9c76e14c65f07ec637dd9de_1568299843_0', 'jpg', NULL, NULL),
(139, NULL, 'image', 'image/jpeg', 'e945279e152343b00b252fc6203c9b26_1568299989_0', 'jpg', NULL, NULL),
(140, NULL, 'image', 'image/jpeg', '10be3ed397d64a230a4326974e64770f_1568300081_0', 'jpg', NULL, NULL),
(141, NULL, 'image', 'image/jpeg', '95c180e2c840d09854270d2edb110167_1568300180_0', 'jpg', NULL, NULL),
(142, NULL, 'image', 'image/jpeg', 'aa8451f583f44280e13b21f9c59b4d8d_1568300219_0', 'jpg', NULL, NULL),
(143, NULL, 'image', 'image/jpeg', '3de330effe10361a6dc36d198cf43138_1568300376_0', 'jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'Название меню',
  `parent` int(11) DEFAULT NULL,
  `table` varchar(255) DEFAULT NULL COMMENT 'Тип: posts/categories/filters/custom/NULL',
  `value` varchar(255) DEFAULT NULL COMMENT 'id поста/страницы или ссылка',
  `title` varchar(255) DEFAULT NULL COMMENT 'Отображаемое название',
  `img` int(11) DEFAULT NULL,
  `icon` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `sort`, `name`, `parent`, `table`, `value`, `title`, `img`, `icon`, `color`) VALUES
(1, NULL, NULL, NULL, 'posts', '1', NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, 'posts', '169', NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, 'posts', '170', NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, 'posts', '171', 'Астрологи', NULL, NULL, NULL),
(15, NULL, NULL, NULL, 'posts', '172', 'Частые вопросы', NULL, NULL, NULL),
(16, NULL, NULL, NULL, 'posts', '173', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Название опции',
  `value` varchar(255) DEFAULT NULL COMMENT 'Значение опции',
  `description` varchar(255) NOT NULL COMMENT 'Описание опции'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `options`
--

INSERT INTO `options` (`id`, `name`, `value`, `description`) VALUES
(1, 'sitename', 'AstroLife', 'Название сайта'),
(2, 'sitedesc', 'Астрология, эзотерика<br>\nи нумерология', 'Описание сайта'),
(3, 'template', 'main', 'Шаблон'),
(4, 'keywords', NULL, 'Ключевые слова'),
(5, 'phone', '8 (800) 766 94 54', 'Телефон'),
(6, 'email', 'Astrologia@pochta.ru', 'Email'),
(7, 'address', 'Москва. Пресненский Вал, д. 38, стр. 4, оф. 65.', 'Адрес'),
(8, 'fb', 'https://www.facebook.com/', 'facebook'),
(9, 'ig', 'https://www.instagram.com/', 'instagram'),
(10, 'vk', 'https://vk.com/', 'Вконтакте'),
(11, 'yt', 'https://www.youtube.com/', 'YouTube');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'post' COMMENT 'page / post / list',
  `parent` int(11) DEFAULT NULL COMMENT 'id категории',
  `filters` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT 'Уникальное имя (для ссылки и поиска)',
  `title` varchar(255) NOT NULL DEFAULT 'title' COMMENT 'Заголовок записи',
  `img` int(11) DEFAULT NULL COMMENT 'ID медиа файла',
  `icon` int(11) DEFAULT NULL,
  `video` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `properties` text COMMENT 'JSON строка уникальных свойств',
  `description` text COMMENT 'Краткое писание',
  `value` varchar(255) DEFAULT NULL,
  `content` text COMMENT 'Контент страницы',
  `visibility` tinyint(1) DEFAULT '0' COMMENT 'Видимость: visible/hidden',
  `protection` varchar(255) NOT NULL DEFAULT '0' COMMENT 'Защита: ',
  `meta` text NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `type`, `parent`, `filters`, `name`, `title`, `img`, `icon`, `video`, `sort`, `properties`, `description`, `value`, `content`, `visibility`, `protection`, `meta`, `date`) VALUES
(1, 'list', NULL, NULL, NULL, 'Главная', 53, NULL, NULL, NULL, NULL, NULL, NULL, '<p>тест</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', '2019-04-20 18:51:53'),
(169, 'list', NULL, NULL, 'about', 'О нас', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p><!--(figmeta)eyJmaWxlS2V5IjoiSGVVY29NYWRIdGdLSjZ0YTFmdGRVaiIsInBhc3RlSUQiOi0xLCJkYXRhVHlwZSI6InNjZW5lIn0K(/figmeta)--><!--(figma)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(/figma)-->Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации &quot;Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..&quot; Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам &quot;lorem ipsum&quot; сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения.</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', '2020-01-27 16:26:15'),
(170, 'list', NULL, NULL, 'services', 'Услуги', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '{"title":"","desc":"","keys":""}', '2020-01-27 16:26:43'),
(171, 'list', NULL, NULL, 'astrologers', 'Наш астролог', NULL, NULL, NULL, NULL, NULL, NULL, 'NULL', NULL, 0, '0', '{"title":"","desc":"","keys":""}', '2020-01-27 16:26:56'),
(172, 'list', NULL, NULL, 'faq', 'Вопросы и ответы', NULL, NULL, NULL, NULL, NULL, NULL, 'NULL', NULL, 0, '0', '{"title":"","desc":"","keys":""}', '2020-01-27 16:27:50'),
(173, 'list', NULL, NULL, 'reviews', 'Отзывы', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '{"title":"","desc":"","keys":""}', '2020-01-27 16:28:15'),
(174, 'list', 170, NULL, 'populjarnoe', 'Популярное', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '{"title":"","desc":"","keys":""}', NULL),
(175, 'list', 170, NULL, 'otnoshenija', 'Отношения', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '{"title":"","desc":"","keys":""}', NULL),
(176, 'list', 170, NULL, 'dengi', 'Деньги', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '{"title":"","desc":"","keys":""}', NULL),
(177, 'list', 170, NULL, 'budushee', 'Будущее', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '{"title":"","desc":"","keys":""}', NULL),
(178, 'list', 170, NULL, 'snjatie-negativa', 'Снятие негатива', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '{"title":"","desc":"","keys":""}', NULL),
(179, 'list', 170, NULL, 'semja-i-deti', 'Семья и дети', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '{"title":"","desc":"","keys":""}', NULL),
(180, 'post', 174, NULL, 'individualnaj-ra', 'Индивидуальный расклад карт таро', NULL, NULL, NULL, NULL, NULL, NULL, '8990', '<p>Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet.</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', '2020-01-31 12:49:33'),
(181, 'post', 174, NULL, 'otlivka-na-vosk', 'Отливка на воск', NULL, NULL, NULL, NULL, NULL, NULL, '2490', '<p>Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet.</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', '2020-01-31 12:49:44'),
(182, 'post', 174, NULL, 'privlechenie-fin', 'Привлечение финансового благополучия', NULL, NULL, NULL, NULL, NULL, NULL, '5690', '<p>Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet.</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', '2020-01-31 12:49:55'),
(183, 'post', 174, NULL, 'privlechenie-lju', 'Привлечение любовной энергии', NULL, NULL, NULL, NULL, NULL, NULL, '7290', '<p>Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet.</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', '2020-01-31 12:50:33'),
(184, 'post', 173, NULL, 'oksana-mitrofano', 'Оксана Митрофанова', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt aut inventore reprehenderit natus nihil, placeat quaerat, obcaecati cupiditate, repellat ut illo sunt voluptatum eius quod molestiae. Perspiciatis tenetur eveniet inventore quaerat fugiat cupiditate consequatur temporibus et ullam veniam beatae, minus voluptatibus fuga nesciunt explicabo voluptatum in blanditiis doloremque eligendi ea culpa. Laboriosam magnam consectetur expedita consequatur omnis voluptatibus soluta, animi minus similique nostrum culpa consequuntur, recusandae non reprehenderit, nihil ipsa!</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', NULL),
(185, 'post', 173, NULL, 'oksana-mitrofano-0', 'Оксана Митрофанова', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt aut inventore reprehenderit natus nihil, placeat quaerat, obcaecati cupiditate, repellat ut illo sunt voluptatum eius quod molestiae. Perspiciatis tenetur eveniet inventore quaerat fugiat cupiditate consequatur temporibus et ullam veniam beatae, minus voluptatibus fuga nesciunt explicabo voluptatum in blanditiis doloremque eligendi ea culpa. Laboriosam magnam consectetur expedita consequatur omnis voluptatibus soluta, animi minus similique nostrum culpa consequuntur, recusandae non reprehenderit, nihil ipsa!</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', NULL),
(186, 'post', 173, NULL, 'oksana-mitrofano-1', 'Оксана Митрофанова', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt aut inventore reprehenderit natus nihil, placeat quaerat, obcaecati cupiditate, repellat ut illo sunt voluptatum eius quod molestiae. Perspiciatis tenetur eveniet inventore quaerat fugiat cupiditate consequatur temporibus et ullam veniam beatae, minus voluptatibus fuga nesciunt explicabo voluptatum in blanditiis doloremque eligendi ea culpa. Laboriosam magnam consectetur expedita consequatur omnis voluptatibus soluta, animi minus similique nostrum culpa consequuntur, recusandae non reprehenderit, nihil ipsa!</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', NULL),
(187, 'post', 173, NULL, 'oksana-mitrofano-2', 'Оксана Митрофанова', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt aut inventore reprehenderit natus nihil, placeat quaerat, obcaecati cupiditate, repellat ut illo sunt voluptatum eius quod molestiae. Perspiciatis tenetur eveniet inventore quaerat fugiat cupiditate consequatur temporibus et ullam veniam beatae, minus voluptatibus fuga nesciunt explicabo voluptatum in blanditiis doloremque eligendi ea culpa. Laboriosam magnam consectetur expedita consequatur omnis voluptatibus soluta, animi minus similique nostrum culpa consequuntur, recusandae non reprehenderit, nihil ipsa!</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', NULL),
(188, 'post', 172, NULL, 'chto-takoe-astro', 'Что такое astrolife центр', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis sequi quos sunt ipsa id libero, esse cumque eveniet atque veniam aperiam nobis modi quia quisquam distinctio ad quae odio doloribus, fugit nulla maiores numquam! Laborum officiis quam quia accusamus, ducimus, vero quo mollitia hic inventore eius maiores! Dolorem, quam, obcaecati.</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', NULL),
(189, 'post', 172, NULL, 'kak-proishodit-p', 'Как происходит процесс получения услуги', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis sequi quos sunt ipsa id libero, esse cumque eveniet atque veniam aperiam nobis modi quia quisquam distinctio ad quae odio doloribus, fugit nulla maiores numquam! Laborum officiis quam quia accusamus, ducimus, vero quo mollitia hic inventore eius maiores! Dolorem, quam, obcaecati.</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', NULL),
(190, 'post', 172, NULL, 'kak-oplatit-uslu', 'Как оплатить услугу', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis sequi quos sunt ipsa id libero, esse cumque eveniet atque veniam aperiam nobis modi quia quisquam distinctio ad quae odio doloribus, fugit nulla maiores numquam! Laborum officiis quam quia accusamus, ducimus, vero quo mollitia hic inventore eius maiores! Dolorem, quam, obcaecati.</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', NULL),
(191, 'post', 172, NULL, 'vozmozhno-li-obs', 'Возможно ли общаться с экспертом письменно', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis sequi quos sunt ipsa id libero, esse cumque eveniet atque veniam aperiam nobis modi quia quisquam distinctio ad quae odio doloribus, fugit nulla maiores numquam! Laborum officiis quam quia accusamus, ducimus, vero quo mollitia hic inventore eius maiores! Dolorem, quam, obcaecati.</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', NULL),
(192, 'post', 172, NULL, 'vozmozhna-li-lic', 'Возможна ли личная встреча с экспертом', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis sequi quos sunt ipsa id libero, esse cumque eveniet atque veniam aperiam nobis modi quia quisquam distinctio ad quae odio doloribus, fugit nulla maiores numquam! Laborum officiis quam quia accusamus, ducimus, vero quo mollitia hic inventore eius maiores! Dolorem, quam, obcaecati.</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', NULL),
(193, 'post', 172, NULL, 'kakie-voprosi-mo', 'Какие вопросы можно задавать во время телефонной консультации', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis sequi quos sunt ipsa id libero, esse cumque eveniet atque veniam aperiam nobis modi quia quisquam distinctio ad quae odio doloribus, fugit nulla maiores numquam! Laborum officiis quam quia accusamus, ducimus, vero quo mollitia hic inventore eius maiores! Dolorem, quam, obcaecati.</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `rubrics`
--

CREATE TABLE IF NOT EXISTS `rubrics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT 'title'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL COMMENT 'Логин',
  `password` varchar(255) DEFAULT NULL COMMENT 'Пароль',
  `name` varchar(255) DEFAULT NULL COMMENT 'Отображаемое имя',
  `img` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL COMMENT 'Email',
  `firstname` varchar(255) DEFAULT NULL COMMENT 'Имя',
  `lastname` varchar(255) DEFAULT NULL COMMENT 'Фамилия',
  `sex` tinyint(1) DEFAULT NULL COMMENT 'Пол М/Ж',
  `birthday` date DEFAULT NULL COMMENT 'Дата рождения',
  `date` date NOT NULL COMMENT 'Дата регистрации',
  `phone` varchar(255) DEFAULT NULL COMMENT 'Телефон',
  `address` text COMMENT 'Адрес',
  `entity` tinyint(1) DEFAULT NULL COMMENT 'Органицация ( bool )',
  `value` text,
  `properties` text COMMENT 'JSON строка уникальных свойств	',
  `description` varchar(255) DEFAULT NULL COMMENT 'О себе',
  `rank` int(11) NOT NULL DEFAULT '1' COMMENT 'user / moderator / admin / root'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `img`, `email`, `firstname`, `lastname`, `sex`, `birthday`, `date`, `phone`, `address`, `entity`, `value`, `properties`, `description`, `rank`) VALUES
(1, 'admin', '977e0e979b637bcd13a33212cc6743cc', 'admin', NULL, 'admin@admin', 'admin', NULL, NULL, NULL, '2018-07-03', NULL, NULL, NULL, NULL, '{"Обучающие тренинги  и мастер-классы":{"направление «бизнес»":"Да","направление «психология»":"Да"},"Желаете ли получать рассылку на e-mail?":"Да"}', NULL, 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `filters`
--
ALTER TABLE `filters`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `src` (`src`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `rubrics`
--
ALTER TABLE `rubrics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=304;
--
-- AUTO_INCREMENT для таблицы `filters`
--
ALTER TABLE `filters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT для таблицы `rubrics`
--
ALTER TABLE `rubrics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
