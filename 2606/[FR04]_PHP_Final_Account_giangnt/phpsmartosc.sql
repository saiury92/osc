-- phpMyAdmin SQL Dump
-- version 4.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2014 at 11:18 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpsmartosc`
--
DROP DATABASE `phpsmartosc`;
CREATE DATABASE IF NOT EXISTS `phpsmartosc` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `phpsmartosc`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
`cate_id` int(10) unsigned NOT NULL,
  `cate_name` varchar(100) NOT NULL,
  `cate_order` int(10) NOT NULL DEFAULT '0',
  `cate_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `cate_order`, `cate_status`) VALUES
(1, 'Sony', 1, 1),
(2, 'Samsung', 2, 1),
(5, 'Apple', 3, 1),
(6, 'HTC', 4, 1),
(7, 'Dell', 5, 1),
(8, 'Asus', 6, 1),
(9, '1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
`id` int(10) unsigned NOT NULL,
  `page` int(11) NOT NULL,
  `option` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `page`, `option`) VALUES
(1, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
`pro_id` int(10) unsigned NOT NULL,
  `pro_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `pro_img` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pro_price` int(10) NOT NULL,
  `pro_info` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `pro_order` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_img`, `pro_price`, `pro_info`, `cate_id`, `pro_order`) VALUES
(2, 'Sony vaio CDE', 'sony-vaio-tap-11-tablet-nowatermark-120x120.jpg', 500, 'San pham sony vaio', 1, 6),
(3, 'Sony expria z1', 'sony-vaio-tap-11-tablet-nowatermark-120x120.jpg', 1000000, 'Infomation product', 1, 2),
(4, 'Sam sung glaxy s4', 'sony-vaio-tap-11-tablet-nowatermark-120x120.jpg', 250000, 'Sam sung glaxy xxx', 2, 3),
(5, 'Sam sung glaxy s3', 'sony-vaio-tap-11-tablet-nowatermark-120x120.jpg', 1000000, 'Sam sung glaxy aaa', 2, 4),
(6, 'Sony expria z1', 'index_r26_c7.jpg', 1000, 'dfgdfg', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `level` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `address`, `phone`, `level`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@local.com', 'Ha Noi', '0973980948', '1'),
(30, 'user1', '1', '1@gmail.com', '1', '1234567890', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`pro_id`), ADD KEY `pro_name` (`pro_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `cate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `pro_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
