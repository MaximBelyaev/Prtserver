-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 26 2015 г., 18:50
-- Версия сервера: 5.5.37-log
-- Версия PHP: 5.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `prtserver`
--

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `vk` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `reg_date` int(11) NOT NULL,
  `license` varchar(32) NOT NULL,
  `status` int(1) NOT NULL,
  `comment` varchar(4095) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`c_id`, `name`, `email`, `skype`, `vk`, `fb`, `reg_date`, `license`, `status`, `comment`) VALUES
(1, 'Dima', 'reallycoll@gmail.su', '', '', '', 1432112603, '7573d9bba00bcb6a800913e6fd67f6dc', 1, 'Это я!');

-- --------------------------------------------------------

--
-- Структура таблицы `versions`
--

CREATE TABLE IF NOT EXISTS `versions` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(31) NOT NULL,
  `dir` varchar(511) NOT NULL,
  `status` int(1) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `versions`
--

INSERT INTO `versions` (`v_id`, `name`, `dir`, `status`, `date`) VALUES
(1, '0.1', '/Regular/0.1', 0, 1432118233),
(2, '0.1', '/VIP/0.1', 1, 1432121884),
(3, '0.1.1', '/VIP/0.1.1', 1, 1432121946);

-- --------------------------------------------------------

--
-- Структура таблицы `versions_downloads`
--

CREATE TABLE IF NOT EXISTS `versions_downloads` (
  `vd_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `time` int(11) NOT NULL COMMENT 'Дата, когда произошла загрузка',
  `ip` int(11) NOT NULL COMMENT 'IP-адрес преобразованный с помощью ip2long',
  PRIMARY KEY (`vd_id`),
  KEY `v_id` (`v_id`,`c_id`),
  KEY `c_id` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `versions_downloads`
--
ALTER TABLE `versions_downloads`
  ADD CONSTRAINT `vd_to_c` FOREIGN KEY (`c_id`) REFERENCES `customers` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vd_to_v` FOREIGN KEY (`v_id`) REFERENCES `versions` (`v_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
