-- phpMyAdmin SQL Dump
-- version 4.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2014 at 10:46 AM
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
-- Table structure for table `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
`product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_price` float NOT NULL,
  `product_price_sale` float NOT NULL,
  `product_images` varchar(255) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `product_desc` int(11) NOT NULL,
  `product_info` varchar(255) NOT NULL,
  `product_date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_price`, `product_price_sale`, `product_images`, `product_brand`, `country_id`, `product_desc`, `product_info`, `product_date`) VALUES
(1, 'Nokia Lumia 1520', 12990000, 12990000, 'product.jpg', 'Nokia', 2, 1, 'Nokia Lumia 1520 Chiếc “Big Phone” 6 inch đầu tiên của Nokia', '2014-06-08 00:00:00'),
(2, 'Samsung Galaxy S5 G900', 15990000, 15990000, 'product.jpg', 'SamSung', 3, 2, 'Samsung Galaxy S5 - Thiết kế thời trang, sang trọng đi kèm với hiệu năng mạnh mẽ', '2014-06-08 00:00:00'),
(3, 'Sony Xperia Z2', 16990000, 16990000, 'product.jpg', 'Sony', 1, 3, 'Xperia Z2 - Chiếc Camera-Phone chống nước tốt nhất', '2014-06-08 00:00:00'),
(4, 'iPhone 5 32GB', 15490000, 13990000, 'product.jpg', 'Apple', 5, 4, 'iPhone 5  - Thay đổi tất cả một lần nữa', '2014-06-08 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
 ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
