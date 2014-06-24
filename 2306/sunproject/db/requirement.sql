-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2014 at 06:25 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `requirement`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_articles`
--

CREATE TABLE IF NOT EXISTS `tbl_articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `article_reduce` varchar(255) NOT NULL,
  `article_full` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(200) NOT NULL,
  `cate_option` char(1) NOT NULL DEFAULT '0',
  `cate_parent` int(11) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cate_id`, `cate_name`, `cate_option`, `cate_parent`) VALUES
(1, 'Featured phones', '0', 0),
(2, 'Smart phones', '0', 0),
(3, 'Accessories', '0', 0),
(4, 'Android', '0', 2),
(5, 'iOS', '0', 2),
(6, 'Other', '0', 2),
(7, 'Luxury', '0', 2),
(8, 'Sales', '0', 2),
(9, 'SamSung', '0', 4),
(10, 'Sony', '0', 4),
(11, 'Nokia', '0', 6),
(12, 'Apple', '0', 5),
(13, 'Black Berry', '0', 6),
(14, 'HTC', '0', 4),
(15, 'HTC', '0', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE IF NOT EXISTS `tbl_images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_order` int(11) NOT NULL,
  `image_status` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`image_id`, `image_name`, `product_id`, `image_order`, `image_status`) VALUES
(2, 'application/product_images/Nokia-Lumia-1520-white-1.jpg', 1, 1, '0'),
(3, 'application/product_images/Samsung-Galaxy-S5-Trang-4.jpg', 2, 2, '0'),
(4, 'application/product_images/Sony-Xperia-Z2-3.jpg', 3, 3, '0'),
(5, 'application/product_images/iPhone-5-black-18.jpg', 4, 4, '0'),
(6, 'application/product_images/iPhone-5-white-1.jpg', 4, 5, '0'),
(7, 'application/product_images/iPhone-5-white-14.jpg', 4, 6, '0'),
(8, 'application/product_images/lumia-1520-vang-03.jpg', 1, 7, '0'),
(9, 'application/product_images/lumia-1520-vang-16.jpg', 1, 8, '0'),
(10, 'application/product_images/lumia-1520-vang-16.jpg', 1, 9, '0'),
(11, 'application/product_images/Nokia-Lumia-1520-den-5.jpg', 1, 10, '0'),
(12, 'application/product_images/Nokia-Lumia-1520-den-6.jpg', 1, 11, '0'),
(13, 'application/product_images/Nokia-Lumia-1520-red-1.jpg', 1, 12, '0'),
(14, 'application/product_images/Samsung-Galaxy-S5-den-2.jpg', 2, 13, '0'),
(15, 'application/product_images/Samsung-Galaxy-S5-Trang-4.jpg', 2, 14, '0'),
(16, 'application/product_images/Samsung-Galaxy-S5-vangdong-17.jpg', 2, 15, '0'),
(17, 'application/product_images/Samsung-Galaxy-S5-xanh-2.jpg', 2, 16, '0'),
(18, 'application/product_images/Sony-Xperia-Z2-2.jpg', 3, 17, '0'),
(19, 'application/product_images/Sony-Xperia-Z2-Trang-1.jpg', 3, 18, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_order_detail` (
  `orderdetail_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `number` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`orderdetail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `product_price` float NOT NULL,
  `product_price_sale` float NOT NULL,
  `product_images` varchar(255) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `product_desc` int(11) NOT NULL,
  `product_info` varchar(255) NOT NULL,
  `product_date` datetime NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_price`, `product_price_sale`, `product_images`, `product_brand`, `country_id`, `product_desc`, `product_info`, `product_date`) VALUES
(1, 'Nokia Lumia 1520', 12990000, 12990000, 'application/product_images/Nokia-Lumia-1520-white-1.jpg', 'Nokia', 2, 1, 'Nokia Lumia 1520 Chiếc “Big Phone” 6 inch đầu tiên của Nokia', '2014-06-08 00:00:00'),
(2, 'Samsung Galaxy S5 G900', 15990000, 15990000, 'application/product_images/Samsung-Galaxy-S5-den-2.jpg', 'SamSung', 3, 2, 'Samsung Galaxy S5 - Thiết kế thời trang, sang trọng đi kèm với hiệu năng mạnh mẽ', '2014-06-08 00:00:00'),
(3, 'Sony Xperia Z2', 16990000, 16990000, 'application/product_images/Sony-Xperia-Z2-Trang-1.jpg', 'Sony', 1, 3, 'Xperia Z2 - Chiếc Camera-Phone chống nước tốt nhất', '2014-06-08 00:00:00'),
(4, 'iPhone 5 32GB', 15490000, 13990000, 'application/product_images/iPhone-5-white-1.jpg', 'Apple', 5, 4, 'iPhone 5  - Thay đổi tất cả một lần nữa', '2014-06-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE IF NOT EXISTS `tbl_product_category` (
  `cate_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`cate_id`,`product_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`cate_id`, `product_id`, `order`) VALUES
(9, 2, 0),
(10, 3, 0),
(11, 1, 0),
(12, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slide`
--

CREATE TABLE IF NOT EXISTS `tbl_slide` (
  `slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_images` varchar(255) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_order` int(11) NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `level` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `password`, `email`, `address`, `phone`, `level`) VALUES
(1, 'chung', '123', 'chung_nd1992@gmail.com', 'Thanh Hï¿½a', '0979094815', '2'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@local.com', 'Hà Nội', '01669665357', '2'),
(3, 'thuan', 'c1921ad3b7cc07f38a81334814a99657', 'quangthuan@gmail.com', 'H?i D??ng', '0168234659', '2'),
(4, 'tung', 'bb7d4b236b564cf1ec27aa891331e0af', 'tungcntt@gmail.com', 'Hï¿½ N?i', '0912850318', '2'),
(5, 'anh_xalon', '827ccb0eea8a706c4c34a16891f84e7b', 'anh.xalon@gmail.com', 'Thanh HÃ³a', '0912113377', '2'),
(8, 'DoBaMax', 'bcd0ac312dc6056ece5ac165f79089cd', 'dobamax@gmail.com', 'Thanh HÃ³a', '01215028907', '2'),
(10, 'ST_Chung', '6f21771cf4efcfbede9d3fed99417a44', 'chungnd1992@gmail.com', 'HÃ  Ná»™i', '0979094815', '2'),
(11, 'wukong4', '123', 'wukong@gmail.com', 'ThiÃªn ÄÃ¬nh', '09', '1'),
(12, 'wukong5', '123', 'wukong@gmail.com', 'ThiÃªn ÄÃ¬nh', '123', '1'),
(13, 'Chung', '123', 'chungnd1992@gmail.com', 'Thanh HÃ³a', '2147483647', '1'),
(14, 'Chung', '12345678', 'chungnd1992@gmail.com', 'Thanh HÃ³a', '0979094815', '1'),
(15, 'Chung', '123', 'chungnd1992@gmail.com', 'Thanh HÃ³a', '12345678', '1'),
(16, 'Chung', '123', 'chungnd1992@gmail.com', 'Thanh HÃ³a', '12345678', '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  ADD CONSTRAINT `tbl_product_category_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `tbl_category` (`cate_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_product_category_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
