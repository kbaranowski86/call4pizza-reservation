-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 24 Sie 2013, 23:14
-- Wersja serwera: 5.5.32
-- Wersja PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `call4pizza-reservation`
--
CREATE DATABASE IF NOT EXISTS `call4pizza-reservation` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `call4pizza-reservation`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `meals`
--

CREATE TABLE IF NOT EXISTS `meals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `base_price` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `meals_orders`
--

CREATE TABLE IF NOT EXISTS `meals_orders` (
  `order_id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`,`meal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `meal_compositions`
--

CREATE TABLE IF NOT EXISTS `meal_compositions` (
  `meal_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL,
  `ingredient_price` float NOT NULL,
  `ingredient_amount` int(11) NOT NULL,
  PRIMARY KEY (`meal_id`,`ingredient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `created` datetime NOT NULL,
  `received` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `surname` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `road` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `postal` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `phone1` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `phone2` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `on_black_list` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
