-- phpMyAdmin SQL Dump
-- version 4.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2014 at 11:49 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fresher04`
--
CREATE DATABASE IF NOT EXISTS `fresher04` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `fresher04`;


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `address`, `phone`, `gender`) VALUES
(4, 'user1', 'email1@gmail.com', 'add1', '12345678910', 1),
(5, 'user2', 'email2@gmail.com', 'add2', '12345678910', 1),
(6, 'user3', 'email3@gmail.com', 'add3', '12345678910', 2),
(7, 'user4', 'email4@gmail.com', 'add4', '12345678910', 2),
(8, 'user5', 'email5@gmail.com', 'add5', '12345678910', 1),
(9, 'user6', 'email6@gmail.com', 'add6', '12345678910', 1),
(10, 'user7', 'email7@gmail.com', 'add7', '12345678910', 1),
(11, 'user812', 'email8@gmail.com', 'add812', '12345678910', 1),
(12, 'user12', 'email12', 'add12', '12345678910', 1),
(13, 'user13', 'email13', 'add13', '12345678910', 1),
(14, 'user14', 'email14', 'add14', '12345678910', 2),
(15, 'user15', 'email15', 'add15', '12345678910', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
