-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2014 at 08:16 PM
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
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(1, 'Sony'),
(2, 'Samsung'),
(5, 'Apple'),
(6, 'HTC'),
(7, 'Dell'),
(8, 'Asus');

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
  PRIMARY KEY (`pro_id`),
  KEY `pro_name` (`pro_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_img`, `pro_price`, `pro_info`, `cate_id`) VALUES
(2, 'Sony vaio CDE', 'sony-vaio-tap-11-tablet-nowatermark-120x120.jpg', 500, 'San pham sony vaio', 2),
(3, 'Sony expria z1', 'sony-vaio-tap-11-tablet-nowatermark-120x120.jpg', 1000000, 'Infomation product', 2),
(4, 'Sam sung glaxy s4', 'sony-vaio-tap-11-tablet-nowatermark-120x120.jpg', 250000, 'Sam sung glaxy xxx', 2),
(5, 'Sam sung glaxy s3', 'sony-vaio-tap-11-tablet-nowatermark-120x120.jpg', 1000000, 'Sam sung glaxy aaa', 2),
(6, 'Sony expria z1', 'index_r26_c7.jpg', 0, 'dfgdfg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new`
--

CREATE TABLE IF NOT EXISTS `tbl_new` (
  `id` int(11) NOT NULL DEFAULT '0',
  `title` text NOT NULL,
  `desc` text NOT NULL,
  `full` text NOT NULL,
  `images` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_new`
--

INSERT INTO `tbl_new` (`id`, `title`, `desc`, `full`, `images`) VALUES
(0, 'Hà Nội: 156 tỷ đồng xây cầu vượt Chùa Bộc - Phạm Ngọc Thạch', '(Dân trí) - Để giảm tình trạng ùn tắc giao thông kéo dài, UBND thành phố Hà Nội chính thức quyết định đầu hơn 156 tỷ đồng để xây dựng cầu vượt dầm hộp thép tại nút giao Chùa Bộc – Phạm Ngọc Thạch.', '(Dân trí) - Để giảm tình trạng ùn tắc giao thông kéo dài, UBND thành phố Hà Nội chính thức quyết định đầu hơn 156 tỷ đồng để xây dựng cầu vượt dầm hộp thép tại nút giao Chùa Bộc – Phạm Ngọc Thạch.', 0),
(1, '\r\nVụ trục vớt gỗ sưa: “Trùm” buôn gỗ trả gần 1 tỷ, lãi 5 tỷ đồng?', 'Dân trí) - Trong khi các thủ tục cam kết hỗ trợ giữa cơ quan chức năng và ông Thời (người phát hiện gốc sưa khi đi rà cá) đang bế tắc thì một người buôn gỗ có tiếng ở Quảng Bình đã đề xuất trả ông Thời 900 triệu đồng để sở hữu cây gỗ.', 'Dân trí) - Trong khi các thủ tục cam kết hỗ trợ giữa cơ quan chức năng và ông Thời (người phát hiện gốc sưa khi đi rà cá) đang bế tắc thì một người buôn gỗ có tiếng ở Quảng Bình đã đề xuất trả ông Thời 900 triệu đồng để sở hữu cây gỗ.', 0),
(2, 'Hà Nội: 156 tỷ đồng xây cầu vượt Chùa Bộc - Phạm Ngọc Thạch', '(Dân trí) - Để giảm tình trạng ùn tắc giao thông kéo dài, UBND thành phố Hà Nội chính thức quyết định đầu hơn 156 tỷ đồng để xây dựng cầu vượt dầm hộp thép tại nút giao Chùa Bộc – Phạm Ngọc Thạch.', '(Dân trí) - Để giảm tình trạng ùn tắc giao thông kéo dài, UBND thành phố Hà Nội chính thức quyết định đầu hơn 156 tỷ đồng để xây dựng cầu vượt dầm hộp thép tại nút giao Chùa Bộc – Phạm Ngọc Thạch.', 0),
(3, 'Hà Nội: 156 tỷ đồng xây cầu vượt Chùa Bộc - Phạm Ngọc Thạch', '(Dân trí) - Để giảm tình trạng ùn tắc giao thông kéo dài, UBND thành phố Hà Nội chính thức quyết định đầu hơn 156 tỷ đồng để xây dựng cầu vượt dầm hộp thép tại nút giao Chùa Bộc – Phạm Ngọc Thạch.', '(Dân trí) - Để giảm tình trạng ùn tắc giao thông kéo dài, UBND thành phố Hà Nội chính thức quyết định đầu hơn 156 tỷ đồng để xây dựng cầu vượt dầm hộp thép tại nút giao Chùa Bộc – Phạm Ngọc Thạch.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `amount`, `pro_id`) VALUES
(2, 2000000, 2),
(3, 4500000, 3),
(4, 3500000, 4),
(5, 2600000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `password`, `email`, `address`, `phone`, `level`) VALUES
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
(27, 'NguyenVanA', '', 'aaaaa@magento.com', 'Ha Noi', '0973980948', '1'),
(28, 'Nguyen Van C', '', 'ccc@gmail.com', 'Ha Noi', '123456789', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
