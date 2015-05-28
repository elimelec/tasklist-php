-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 28, 2015 at 10:48 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `hash`, `name`, `type`, `parent`, `user_id`) VALUES
(1, '18696c489cea9e22c90753ebb75aac9d', 'Food', 'group', 0, 1),
(2, '104c75265f861106b6ea5a9a58bf13b8', 'Laptop', 'task', 0, 1),
(47, '7215ebe422a0acdb90bf9d4465b0aef6', 'Anime', 'group', 0, 1),
(48, '007d54405838b7612574d359ebf81497', 'Pizza', 'task', 1, 1),
(49, '027e3959b3fae754ef6f30d4e937d91f', 'Cake', 'task', 1, 1),
(50, 'd9cc7a0975e0b4a8180c8669cb965ba5', 'Dragon Ball', 'task', 47, 1),
(51, '8e3f2325cfeed459cb0dbfddd2aef6ed', 'One Piece', 'task', 47, 1),
(52, '223291b00f3d70d1f1c58699d89084ee', 'Death Note', 'task', 47, 1),
(53, '1b6ad02f6567320c92f2b0e05b6a1729', 'Short Anime', 'group', 47, 1),
(54, '87b9880dd5e099b24913f66f033093c5', 'Devil May Cry', 'task', 53, 1),
(55, 'f6ff3b14d913fcc2f077e9ada8ff2300', 'No Game No Life', 'task', 53, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items_groups`
--

DROP TABLE IF EXISTS `items_groups`;
CREATE TABLE IF NOT EXISTS `items_groups` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_groups`
--

INSERT INTO `items_groups` (`id`, `item_id`) VALUES
(1, 1),
(2, 47),
(3, 53);

-- --------------------------------------------------------

--
-- Table structure for table `items_tasks`
--

DROP TABLE IF EXISTS `items_tasks`;
CREATE TABLE IF NOT EXISTS `items_tasks` (
  `id` int(11) NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_tasks`
--

INSERT INTO `items_tasks` (`id`, `checked`, `item_id`) VALUES
(1, 0, 2),
(10, 1, 48),
(11, 0, 49),
(12, 0, 50),
(13, 0, 51),
(14, 1, 52),
(15, 1, 54),
(16, 0, 55);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL,
  `token` varchar(32) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `token`, `user_id`) VALUES
(2, 'f3445704ef904bc2eba27c5050cfc174', 1),
(3, 'e2edd6993f3d99cf001e040a86a85a1d', 1),
(4, '0d9073eedb1c950fce3c0d0adc598046', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `items_groups`
--
ALTER TABLE `items_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `items_tasks`
--
ALTER TABLE `items_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
