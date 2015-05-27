-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2015 at 09:52 PM
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
  `type` varchar(32) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `hash`, `type`, `parent`, `user_id`) VALUES
(1, '18696c489cea9e22c90753ebb75aac9d', 'group', 0, 1),
(2, '104c75265f861106b6ea5a9a58bf13b8', 'task', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items_groups`
--

DROP TABLE IF EXISTS `items_groups`;
CREATE TABLE IF NOT EXISTS `items_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_groups`
--

INSERT INTO `items_groups` (`id`, `name`, `item_id`) VALUES
(1, 'Food', 1);

-- --------------------------------------------------------

--
-- Table structure for table `items_tasks`
--

DROP TABLE IF EXISTS `items_tasks`;
CREATE TABLE IF NOT EXISTS `items_tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_tasks`
--

INSERT INTO `items_tasks` (`id`, `name`, `checked`, `item_id`) VALUES
(1, 'Pizza', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

DROP TABLE IF EXISTS `lists`;
CREATE TABLE IF NOT EXISTS `lists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `name`, `user_id`) VALUES
(1, 'Fruits', 2),
(2, 'Movies', 2),
(3, 'Anime', 1),
(4, 'Pizza', 1),
(5, 'Vegetables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL,
  `token` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `token`, `user_id`) VALUES
(1, 'f209e978489990ceba2535e56b25661a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `checked` tinyint(1) NOT NULL,
  `list_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `checked`, `list_id`) VALUES
(1, 'Bananas', 0, 1),
(2, 'Oranges', 0, 1),
(3, 'Apples', 0, 1),
(4, 'Pomegranate', 0, 1),
(5, 'Revolver', 0, 2),
(6, 'Hysteria', 1, 2),
(7, 'Benjamin Buthon', 1, 2),
(8, 'Atonement', 0, 2),
(9, 'Dragon Ball', 0, 3),
(10, 'One Piece', 0, 3),
(11, 'Death Note', 1, 3),
(12, 'Prosciutto', 0, 4),
(13, 'Salami', 0, 4),
(14, 'Capriciosa', 0, 4),
(15, 'Potato', 0, 5),
(16, 'Tomato', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `user` varchar(31) NOT NULL,
  `password` varchar(63) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`) VALUES
(1, 'eli', 'eli'),
(2, 'ela', 'ela');

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
-- Indexes for table `items_tasks`
--
ALTER TABLE `items_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `items_groups`
--
ALTER TABLE `items_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `items_tasks`
--
ALTER TABLE `items_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
