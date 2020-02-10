-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 28 2020 г., 13:18
-- Версия сервера: 5.5.50
-- Версия PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `astrolife`
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
) ENGINE=InnoDB AUTO_INCREMENT=295 DEFAULT CHARSET=utf8;

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
(294, 1, '0vv161mccb18crpo2mfnnbf4g4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', '127.0.0.1', '2020-01-27');

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
(1, 'sitename', 'Astrolife', 'Название сайта'),
(2, 'sitedesc', 'Астрология, эзотерика<br>\nи нумерология', 'Описание сайта'),
(3, 'template', 'main', 'Шаблон'),
(4, 'keywords', NULL, 'Ключевые слова'),
(5, 'phone', '+7 (968) 897-90-99', 'Телефон'),
(6, 'email', 'astrolife@gmail.com', 'Email'),
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
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `type`, `parent`, `filters`, `name`, `title`, `img`, `icon`, `video`, `sort`, `properties`, `description`, `value`, `content`, `visibility`, `protection`, `meta`, `date`) VALUES
(1, 'list', NULL, NULL, NULL, 'Главная', 53, NULL, NULL, NULL, NULL, NULL, NULL, '<p>тест</p>\r\n', 0, '0', '{"title":"","desc":"","keys":""}', '2019-04-20 18:51:53'),
(169, 'list', NULL, NULL, 'about', 'О нас', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '{"title":"","desc":"","keys":""}', '2020-01-27 16:26:15'),
(170, 'list', NULL, NULL, 'services', 'Услуги', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '{"title":"","desc":"","keys":""}', '2020-01-27 16:26:43'),
(171, 'list', NULL, NULL, 'astrologers', 'Наши астрологи', NULL, NULL, NULL, NULL, NULL, NULL, 'NULL', NULL, 0, '0', '{"title":"","desc":"","keys":""}', '2020-01-27 16:26:56'),
(172, 'list', NULL, NULL, 'faq', 'Вопросы и ответы', NULL, NULL, NULL, NULL, NULL, NULL, 'NULL', NULL, 0, '0', '{"title":"","desc":"","keys":""}', '2020-01-27 16:27:50'),
(173, 'list', NULL, NULL, 'reviews', 'Отзывы', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '{"title":"","desc":"","keys":""}', '2020-01-27 16:28:15');

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=295;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=174;
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
