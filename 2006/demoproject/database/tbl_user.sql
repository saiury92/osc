-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2014 at 08:43 PM
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
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` char(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `level` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `password`, `email`, `address`, `phone`, `level`) VALUES
(10, 'khoipk1990', 'e10adc3949ba59abbe56e057f20f883e', 'sv003@gmail.com', 'Hà Nội', '45345435345', '1'),
(13, 'Nguyen Van A', '', 'aaa@gmail.com', 'Ha Noi', '0973980948', '1'),
(14, 'Nguyen Van A', '', 'aaa@gmail.com', 'Ha Noi', '0973980948', '1'),
(15, 'Nguyen Van A', '', 'aaa@gmail.com', 'Ha Noi', '0973980948', '1'),
(16, 'Nguyen Van A', '', 'aaa@gmail.com', 'Ha Noi', '0973980948', '1'),
(17, 'Nguyen Van A', '', 'aaa@gmail.com', 'Ha Noi', '0973980948', '1'),
(18, 'Nguyen Van A', '', 'aaa@gmail.com', 'Ha Noi', '0973980948', '1'),
(19, 'Nguyen Van A', '', 'aaa@gmail.com', 'Ha Noi', '0973980948', '1'),
(20, 'Nguyen Van A', '', 'aaa@gmail.com', 'Ha Noi', '0973980948', '1'),
(21, 'Nguyen Van A', '', 'aaa@gmail.com', 'Vinh Phuc', '0973980948', '1'),
(22, 'Nguyen Van A', '', 'aaa@gmail.com', 'Ha Noi', '0973980948', '1'),
(23, 'Nguyen Van A', '', 'aaa@gmail.com', 'Ha Noi', '0973980948', '1'),
(26, 'ádasd', '', 'ádasd', 'sadasd', '23', '1'),
(27, 'NguyenVanA', '', 'aaaaa@magento.com', 'Ha Noi', '0973980948', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
