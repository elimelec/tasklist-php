-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2015 at 09:00 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `hash`, `name`, `type`, `parent`, `user_id`) VALUES
(1, '18696c489cea9e22c90753ebb75aac9d', 'Foods', 'group', 0, 1),
(2, '104c75265f861106b6ea5a9a58bf13b8', 'Pizza', 'task', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items_groups`
--

DROP TABLE IF EXISTS `items_groups`;
CREATE TABLE IF NOT EXISTS `items_groups` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_groups`
--

INSERT INTO `items_groups` (`id`, `item_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items_tasks`
--

DROP TABLE IF EXISTS `items_tasks`;
CREATE TABLE IF NOT EXISTS `items_tasks` (
  `id` int(11) NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_tasks`
--

INSERT INTO `items_tasks` (`id`, `checked`, `item_id`) VALUES
(1, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL,
  `token` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `token`, `user_id`) VALUES
(2, 'f3445704ef904bc2eba27c5050cfc174', 1),
(3, 'e2edd6993f3d99cf001e040a86a85a1d', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
