<?php 
if (!($mysqli = mysqli_connect("127.0.0.1", "rush", "root")))
    return NULL;
$res = mysqli_multi_query($mysqli, "-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 07, 2018 at 01:45 PM
-- Server version: 5.7.23
-- PHP Version: 7.1.22

SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = '+00:00';


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rush`
--
CREATE DATABASE IF NOT EXISTS `rush` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rush`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Sport', 'Vivez a fond a l\'heure!'),
(2, 'Detente', 'Profitez des vacances pour vous relaxer'),
(3, 'Culture', 'Allez a la rencontre de nouvelles cultures');

-- --------------------------------------------------------

--
-- Table structure for table `command`
--

DROP TABLE IF EXISTS `command`;
CREATE TABLE IF NOT EXISTS `command` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cmds` longtext NOT NULL,
  `login` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `id_category` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `img`, `id_category`) VALUES
(1, 'Cuba', 'Vol A/R direct direction La Havane !', 950, 'https://thumb2.holidaypirates.com/zx96KjsKDmHQL8GEw4qkRs4iNVM=/657x300/https://media.mv.urlaubspiraten.de/images/2017/03/58d936c0e22f2158905649rttlj8b5.jpg', 'a:1:{i:0;s:1:\"3\";}'),
(2, 'Malaisie', 'Vols A/R direction Kuala Lumpur !', 490, 'https://thumb2.holidaypirates.com/aEdA0xsSDxrJl37mqotA_RZGMT8=/657x300/https://media.mv.urlaubspiraten.de/images/2017/02/589b6757b5aca463039090orzlxhv3.jpg', 'N;'),
(3, 'Zanzibar', '11 jours dans un hôtel en bord de plage!', 1480, 'https://thumb2.holidaypirates.com/z8T7-Xel_k8Qg_QE01Fo9D7-Av4=/657x300/https://media.mv.urlaubspiraten.de/images/2018/09/5ba2161928924560625319ir4x8bwb.jpg', 'a:1:{i:0;s:1:\"2\";}'),
(4, 'Sydney', '7 jours hôtel 4*', 2754, 'https://thumb2.holidaypirates.com/oxDGr364IDjWIMUJTG4hZoIEkbA=/657x300/https://media.mv.urlaubspiraten.de/images/2015/09/55f16c946bc08198056900u5pskpd2.jpg', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}');

-- --------------------------------------------------------

--
-- Table structure for table `prod_cat`
--

DROP TABLE IF EXISTS `prod_cat`;
CREATE TABLE IF NOT EXISTS `prod_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prod` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `adm` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `passwd`, `adm`) VALUES
(1, 'admin', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
");
mysqli_close($mysqli);
?>