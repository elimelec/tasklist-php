-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2015 at 10:02 PM
-- Server version: 5.5.42
-- PHP Version: 5.4.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pufulist`
--
CREATE DATABASE IF NOT EXISTS `pufulist` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pufulist`;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(32) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `hash`, `name`, `type`, `parent`, `user_id`) VALUES
(2, '104c75265f861106b6ea5a9a58bf13b8', 'Laptop', 'task', 0, 1),
(47, '7215ebe422a0acdb90bf9d4465b0aef6', 'Anime', 'group', 0, 1),
(84, 'f28182eda6218adbc4d9dc0491df9a2b', 'Dragon Ball', 'serial', 47, 1),
(85, 'f7667a85b0474bf49ac6991b6c93d5c3', 'Dragon Ball Z', 'serial', 47, 1),
(86, 'aafb68a5c81e16c29c1ff804875fa4a3', 'Shopping List', 'group', 0, 1),
(87, '2dd644fae440e53e387bf0b64827ba1e', 'Potatoes', 'task', 86, 1),
(88, '02dddb544cae8c9e0edd7221c8755d14', 'Bananas', 'task', 86, 1),
(89, '5a32d5e583c1ac54d5f52d4b3c46109e', 'Tomatoes', 'task', 86, 1),
(90, '751739f68abdee6cdec36e1099662079', 'Pizza', 'task', 86, 1),
(91, '784da9b5d7260199cf1dbe105ddab7f9', 'Chocolate', 'task', 86, 1),
(92, '8a0c46e229e74267560d985e2954dba7', 'Pizza', 'task', 86, 1),
(93, 'ac2736cfafa286ec0e604da09b4fee99', 'Completed', 'group', 47, 1),
(94, 'b113ef61ce70c5987eb3a05e3d470b07', 'Death Note', 'serial', 93, 1),
(96, 'e89db449a22e2a9888b578dfaa71999e', 'Example Checkbox', 'task', 47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items_groups`
--

DROP TABLE IF EXISTS `items_groups`;
CREATE TABLE IF NOT EXISTS `items_groups` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_groups`
--

INSERT INTO `items_groups` (`id`, `item_id`) VALUES
(2, 47),
(14, 86),
(15, 93);

-- --------------------------------------------------------

--
-- Table structure for table `items_serials`
--

DROP TABLE IF EXISTS `items_serials`;
CREATE TABLE IF NOT EXISTS `items_serials` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `last` int(11) NOT NULL DEFAULT '0',
  `current` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_serials`
--

INSERT INTO `items_serials` (`id`, `item_id`, `last`, `current`) VALUES
(5, 84, 153, 5),
(6, 85, 291, 16),
(7, 94, 35, 35);

-- --------------------------------------------------------

--
-- Table structure for table `items_tasks`
--

DROP TABLE IF EXISTS `items_tasks`;
CREATE TABLE IF NOT EXISTS `items_tasks` (
  `id` int(11) NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_tasks`
--

INSERT INTO `items_tasks` (`id`, `checked`, `item_id`) VALUES
(1, 1, 2),
(10, 1, 48),
(11, 1, 49),
(15, 1, 54),
(16, 1, 55),
(37, 0, 87),
(38, 0, 88),
(39, 0, 89),
(40, 1, 90),
(41, 0, 91),
(42, 1, 92),
(44, 1, 96);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL,
  `token` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `token`, `user_id`) VALUES
(48, '53522b09f442f6c08c6b3943fec81317', 1),
(50, '471e05a56175e76e4dfb0138c27c2a6a', 1),
(51, '21e603466ded31011005a5f4dc15cd0b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `user` varchar(31) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`) VALUES
(1, 'eli', 'e3fced4c8e7e561d58a46a29ac492749');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `hash` (`hash`);

--
-- Indexes for table `items_groups`
--
ALTER TABLE `items_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_serials`
--
ALTER TABLE `items_serials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_tasks`
--
ALTER TABLE `items_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `items_groups`
--
ALTER TABLE `items_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `items_serials`
--
ALTER TABLE `items_serials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `items_tasks`
--
ALTER TABLE `items_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
