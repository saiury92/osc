-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2014 at 11:04 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpsmartosc`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cate_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(100) NOT NULL,
  `cate_order` int(10) NOT NULL DEFAULT '0',
  `cate_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `cate_order`, `cate_status`) VALUES
(1, 'Sony', 0, 0),
(2, 'Samsung', 0, 0),
(5, 'Apple', 0, 0),
(6, 'HTC', 0, 0),
(7, 'Dell', 0, 0),
(8, 'Asus', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page` int(11) NOT NULL,
  `option` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `pro_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `pro_img` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pro_price` int(10) NOT NULL,
  `pro_info` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `pro_order` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pro_id`),
  KEY `pro_name` (`pro_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_img`, `pro_price`, `pro_info`, `cate_id`, `pro_order`) VALUES
(2, 'Sony vaio CDE', 'sony-vaio-tap-11-tablet-nowatermark-120x120.jpg', 500, 'San pham sony vaio', 2, 0),
(3, 'Sony expria z1', 'sony-vaio-tap-11-tablet-nowatermark-120x120.jpg', 1000000, 'Infomation product', 2, 0),
(4, 'Sam sung glaxy s4', 'sony-vaio-tap-11-tablet-nowatermark-120x120.jpg', 250000, 'Sam sung glaxy xxx', 2, 0),
(5, 'Sam sung glaxy s3', 'sony-vaio-tap-11-tablet-nowatermark-120x120.jpg', 1000000, 'Sam sung glaxy aaa', 2, 0),
(6, 'Sony expria z1', 'index_r26_c7.jpg', 0, 'dfgdfg', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `level` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `address`, `phone`, `level`) VALUES
(29, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@local.com', 'Ha Noi', '0973980948', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
