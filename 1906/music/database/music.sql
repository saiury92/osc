-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2014 at 06:55 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `music`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `album_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `album_name` varchar(255) NOT NULL,
  `album_img` varchar(255) NOT NULL,
  `singer_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `album_name`, `album_img`, `singer_id`) VALUES
(1, 'Thap nhi mi nhan', 'data/aaa.jpg', 1),
(2, 'Di ve NOi Xa', 'data/bbb.jpg', 1),
(3, 'Tim lai giac mo', 'data/ccc.jpg', 2),
(4, 'Hanh Phuc Thoang Qua', 'data/ddd.jpg', 4),
(5, 'Tinh say', 'data/eee.jpg', 3),
(6, 'Binh minh se mang em di', 'data/fff.jpg', 3),
(7, 'Ba cham', 'data/ccc.jpg', 7),
(8, 'Tìm lại giấc mơ', 'ád', 2);

-- --------------------------------------------------------

--
-- Table structure for table `commet`
--

CREATE TABLE IF NOT EXISTS `commet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `author` varchar(200) NOT NULL,
  `id_song` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `singer`
--

CREATE TABLE IF NOT EXISTS `singer` (
  `singer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `singer_name` varchar(255) NOT NULL,
  `singer_info` text NOT NULL,
  `singer_img` varchar(255) NOT NULL,
  `ngaysinh` date NOT NULL,
  PRIMARY KEY (`singer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `singer`
--

INSERT INTO `singer` (`singer_id`, `singer_name`, `singer_info`, `singer_img`, `ngaysinh`) VALUES
(1, 'Dan Truong', 'Tieu su cua Dan Truong o dayTieu su cua Dan Truong o dayTieu su cua Dan Truong o dayTieu su cua Dan Truong o dayTieu su cua Dan Truong o dayTieu su cua Dan Truong o dayTieu su cua Dan Truong o dayTieu su cua Dan Truong o dayTieu su cua Dan Truong o dayTieu su cua Dan Truong o dayTieu su cua Dan Truong o dayTieu su cua Dan Truong o dayTieu su cua Dan Truong o dayTieu su cua Dan Truong o day', 'data/dantruong.jpg', '0000-00-00'),
(2, 'Ho Ngoc Ha', 'Tieu su cua Ho Ngoc Ha o day', 'data/hongocha.jpg', '0000-00-00'),
(3, 'Dam Vinh Hung', 'Đàm Vĩnh Hưng tên thiệt là: Huỳnh Minh Hưng. Anh sinh ngày 2 tháng 10 năm 1971 và anh là anh cả trong gia đình của 2 anh em.\r\nAnh đã tham gia sinh hoạt văn nghệ từ CLB ca sĩ trẻ, Trung tâm văn hoá quận 10 năm 1991. Thời đó trong CLB có rất nhiều ca sĩ nổi tiếng như Tường Vy, Minh Thuận, Ðức Lâm, Nhật Hào, Tô Thanh Phương... Sau khi đoạt giải nhất cuộc thi tuyển chọn giọng ca trẻ do Công ty Văn hoá quận 10 tổ chức tại công viên hồ Kỳ Hoà năm 1992, Vĩnh Hưng chính thức đi vào con đường ca hát chuyên nghiệp.Hiện nay, CD của anh đang tạo nên một cơn sốt trên thị trường băng nhạc và không bao lâu một VCD nhạc được sản xuất bằng hệ thống kỹ thuật số sẽ được Vĩnh Hưng thực hiện như một món quà đánh dấu quá trình đi hát của mình.\r\nĐàm Vĩnh Hưng là một ca sỹ nhạc pop nổi tiếng tại Việt Nam.Bên cạnh thể loại pop Đàm Vĩnh Hưng còn hát rất nhiều các ca khúc nhạc tiền chiến mang tính chất trữ tình cũng như nhạc Trịnh Công Sơn. Hiện nay Đàm Vĩnh Hưng hoạt động cả ở trong nước lẫn hải ngoại và được nhiều sự mến mộ của nhiều tầng lớp thính giả.\r\nTiểu Sử:\r\nThời còn là học trò, Đàm Vĩnh Hưng từng theo học tại trường phổ thông cơ sở Ngô Quyền và trường trung học phổ thông Nguyễn Thượng Hiền tại quận Tân Bình - Thành phố Hồ Chí Minh.\r\nĐàm Vĩnh Hưng đoạt giải nhất trong cuộc bình chọn những giọng ca xuất sắc do Câu lạc bộ bạn trẻ nhạc chiều thứ 5 của Nhà hát Bến Thành tổ chức từ tháng 9/2000 - 9/2001. Đây là cột mốc đầu tiên cho sự nghiệp của Đàm Vĩnh Hưng.\r\nĐàm Vĩnh Hưng tham gia sinh hoạt văn nghệ từ CLB Ca Sĩ Trẻ tại Trung tâm văn hoá quận 10 từ năm 1991. Sau khi đoạt giải nhất cuộc thi tuyển chọn giọng ca trẻ do Công ty Văn hoá quận 10 tổ chức tại công viên Hồ Kỳ Hoà năm 1992, Đàm Vĩnh Hưng chính thức đi vào con đường ca hát chuyên nghiệp. Anh đã tự học đàn, tự nghiên cứu tài liệu để được làm quen với ký xướng âm và cả phong cách biểu diễn. Năm 1999, Đàm Vĩnh Hưng đã vượt qua 300 thí sinh để lọt vào danh sách 10 giọng ca có triển vọng của Trung tâm ca nhạc nhẹ Sài Gòn. Có thể xem Giọt nước mắt cho đời (Vol.05) là album đưa Đàm Vĩnh Hưng thật sự bật thành sao trong làng nhạc Việt\r\n1991 - Tham gia vào sinh hoạt văn nghệ tụ CLB ca sỹ trẻ\r\n1992 - Đạt giải nhất tuyển chọn giọng ca trẻ tại công viên Hồ Kỳ Hoà\r\n1999 - Được chọn vào 10 giọng ca có triển vọng của Trung Tam Ca Nhan Nhe Sai Gòn\r\n2001 - Đoạt giải nhất trong cuộc tuyển chọn những giọng ca xuất sắc nhất do CLB tổ chức\r\n2002 - Đoạt giải thưởng Làn Sóng Xanh\r\n2003 - Đoạt giải thường Làn Sóng Xanh\r\n2003 - Đoạt giải nhất "Ngôi Sao Bạch Kim" giọng ca nam xuất sắc nhất\r\n2004 - Đoạt giải thưởng Làn Sóng Xanh\r\n2005 - Đoạt giải thưởng Yêu Am Nhạc, giọng ca nam xuất sắc nhất\r\n- Bài hát yêu thích nhất: Khát vọng (Thuận Yến)\r\n- Diễn viên thích nhất: Kim Cương, Thành Lộc\r\n- Thích đọc báo Sài Gòn tiếp thị, Tuổi trẻ, Người lao động và sách của Nhà xuất bản Trẻ.\r\nLiveshow:\r\n1996: Giải Khuyến Khích trong cuộc thi "Bài ca tháng 4" do khu du lịch Đầm Sen tổ chức.\r\n1997: Giải nhất cuộc thi "Liên hoan các giọng hát hay bán chuyên nghiệp".\r\n1998: Giải tư Tiếng hát truyền hình Thành phố Hồ Chí Minh.\r\n2001: Giải nhất giọng ca và gương mặt ca sĩ trẻ được yêu thích do chương trình Chiều thứ 5 dành cho các sinh viên bình chọn.\r\n2002: Giải thưởng Làn Sóng Xanh của Đài tiếng nói Thành phố Hồ Chí Minh.\r\n2003: Giải nhất Ngôi sao bạch kim - "Giọng ca nam xuất sắc nhất".\r\n2004: Giải thưởng Làn Sóng Xanh: "Ca sĩ được yêu thích nhất" trong năm 2004.\r\n2005: Giải thưởng Lá Phong của Tổng lãnh sự Canada.\r\n2005: Hai giải thưởng Làn Sóng Xanh: "Ca sĩ được yêu thích nhất" và Ca sĩ của năm 2005.\r\n2006: Giải thưởng Ngôi sao bạch kim - Ca sĩ có phong cách ấn tượng nhất.\r\n2007: Giải cống hiến 2007 - Ca sĩ xuất sắc nhất 2007.\r\n2008: Hai giải thưởng Làn Sóng Xanh: "10 ca sĩ được yêu thích nhất" và "Ca sĩ của năm". Huy chương bạc thể loại nhạc nhẹ và nhạc dân gian trong cuộc thi Liên hoan giọng hát vàng Asean 2008.\r\n2009 : Nam ca sỹ được yêu thích nhất của HTV Awards - giải thưởng của Đài truyền hình TP.HCM; Giải thưởng Làn Sóng Xanh : Gương mặt của năm\r\n2010: 5 giải thưởng Zing Music Awards 2010 và Ca sĩ được yêu thích nhất giải thưởng HTV Awards\r\n2011: Giải thưởng HTV Awards : Ca sĩ được yêu thích nhất lần thứ hai.\r\n2012:\r\nĐàm Vĩnh Hưng phát hành single Tuổi Hồng Thơ Ngây, một ca khúc nổi tiếng, sáng tác khuyết danh vào những năm đầu thập niên 1990. Đây là single đầu tay trong sự nghiệp 15 năm ca hát của mình.', 'data/damvinhhung.jpg', '1987-10-02'),
(4, 'Noo Phuoc Thinh', 'Tieu su cua Noo Phuoc Thinh', 'data/phuocthinh.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE IF NOT EXISTS `song` (
  `song_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `song_name` varchar(255) NOT NULL,
  `song_url` text NOT NULL,
  `song_lyric` text NOT NULL,
  `album_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`song_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`song_id`, `song_name`, `song_url`, `song_lyric`, `album_id`) VALUES
(1, 'Di ve noi xa', '<iframe width="410" height="100" src="http://mp3.zing.vn/embed/song/ZW69BZOF?autostart=false" frameborder="0" allowfullscreen="true"></iframe>', '', 2),
(2, 'Di ve noi gan', '', '', 2),
(3, 'Di ve noi gan nua', '<object width="300" height="61"><param name="movie" value="http://static.mp3.zing.vn/skins/mp3_main/flash/player/mp3Player_skin9.swf?xmlurl=http://mp3.zing.vn/blog?MjAxMC8xMi8yOS9mLzYvInagaMEZjY4MGVkYjRkNjE1YmI1NDmUsICyMTdjYmQ2YjQ0OWEwMWYdUngWeBXAzfENoWeByBN4WeBdUngZdCBUw6xdUngaCBZw6p1fE3hdUng7kgVMOiWeBXwxfDI" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><embed width="300" height="61" src="http://static.mp3.zing.vn/skins/mp3_main/flash/player/mp3Player_skin9.swf?xmlurl=http://mp3.zing.vn/blog?MjAxMC8xMi8yOS9mLzYvInagaMEZjY4MGVkYjRkNjE1YmI1NDmUsICyMTdjYmQ2YjQ0OWEwMWYdUngWeBXAzfENoWeByBN4WeBdUngZdCBUw6xdUngaCBZw6p1fE3hdUng7kgVMOiWeBXwxfDI" quality="high" wmode="transparent" type="application/x-shockwave-flash"></embed></object><br />', 'Cho Một Tình Yêu - Mỹ Tâm\nĐóng góp: Thu Huynh\nNgày mới quen nhau em nào hay đôi mình\nĐược gần nhau sống chung dưới trăng vàng\nNgày tháng trôi qua em nhận ra tim mình\nCàng gần anh em lại càng yêu anh.\n\nTừ những lúc vui hay là lúc giận hờn\nCàng nhìn anh càng yêu hơn thế\nTình đã như trong sao mắt môi giấu kín\nĐể ta có lúc tưởng chia xa.\n\nNgười ơi biết không em ngày đêm mong chờ\nChờ mong nghe câu yêu thương anh nói\nĐể em biết anh yêu một mình em thôi\nDù ta không thuộc về nhau.\n\nGần bên anh cho em bao cảm giác yêu thương ngọt ngào\nNụ cười anh xua tan đi bao nỗi đắng cay ngày nào\nChỉ mong được gần anh như thế\nChỉ mong được nhìn anh như thế\nTình em nơi đây chỉ biết đến anh người ơi.\n\nMột lần thôi con tim em muốn nói yêu anh thật nhiều\nChỉ một câu yêu thương thôi sao mà vẫn cứ nghẹn lời\nChỉ mong được gần anh để nói\nChỉ mong được nhìn anh để nói\nRằng em yêu anh yêu mãi trái tim này.', 2),
(4, 'Tim lai giac mo 1', '', '', 3),
(5, 'Hanh phuc thoang qua', '', '', 4),
(6, 'Doi Thay', '', '', 4),
(7, 'Binh Minh Se Mang Em Di', '', '', 6),
(8, 'Nhu mot thoi quen', '', '', 6),
(9, 'Tinh say', '<object width="300" height="61"><param name="movie" value="http://static.mp3.zing.vn/skins/mp3_main/flash/player/mp3Player_skin1.swf?xmlurl=http://mp3.zing.vn/blog?MjAxMS8wOS8xMi8xLzMvInagaMEMTNiMmQ4NzAwOWVkMzBhYWQxOWMzOTFiMzJmNTM1NjEdUngWeBXAzfENoWeByBFWeBSBN4WeBdUngZdCBM4WeBqnWeBiBZw6p1fMSQw7RdUngZyBOaGl8fDI" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><embed width="300" height="61" src="http://static.mp3.zing.vn/skins/mp3_main/flash/player/mp3Player_skin1.swf?xmlurl=http://mp3.zing.vn/blog?MjAxMS8wOS8xMi8xLzMvInagaMEMTNiMmQ4NzAwOWVkMzBhYWQxOWMzOTFiMzJmNTM1NjEdUngWeBXAzfENoWeByBFWeBSBN4WeBdUngZdCBM4WeBqnWeBiBZw6p1fMSQw7RdUngZyBOaGl8fDI" quality="high" wmode="transparent" type="application/x-shockwave-flash"></embed></object><br />', 'Cho Em Một Lần Yêu\r\n\r\nNgười bỗng đến bên em vào một hôm nắng xanh ngời\r\nVà rồi tyay nắm tay như từng quen muôn kiếp trước\r\nNgười nói, nói với em bao lời êm ái trên đời\r\nVà rồi như giấc mơ, em ngủ quên.\r\n\r\nYêu, cho em yêu một lần thôi, cho em khóc một lần thôi, để em biết những buồn vui.\r\nMơ, cho em mơ một lần thôi, cho em đau một lần nhớ, nước mắt ấy dẫu vẫn rơi hoài\r\n\r\nNgười đánh cắp tim em như người đã trót đôi lần\r\nRồi người đem bán cho anh nhà thơ ở cuối xóm\r\nChuyện cũ viết trong thơ nay người đem hát cho đời\r\nMà đời nào có hay em ngủ quên\r\nMà đời nào có thương cho phận em\r\n\r\nEm, em chưa bao giờ được yêu\r\nEm chưa bao giờ được khóc\r\nDù chỉ khóc một lần thôi\r\nEm, em xinh như cành hoa tươi\r\nSao yêu thương còn xa mãi\r\nHéo cánh úa hoa em rã rời. ', 6),
(10, 'Chim trang mo coi', '', '', 6),
(11, 'Đôi mắt', '<iframe width="410" height="100" src="http://mp3.zing.vn/embed/song/ZW6AAD8A?autostart=false" frameborder="0" allowfullscreen="true"></iframe>', 'Bài hát: Đôi Mắt - Đàm Vĩnh Hưng\r\n\r\nMẹ cho em đôi mắt sáng ngời\r\nĐể nhìn đời và để làm duyên\r\nĐời cho em đôi mắt màu đen\r\nĐể thương, để nhớ, để ghen,để hờn\r\nĐôi mắt em là cửa sổ tâm hồn\r\nLà bài thơ hay nhất là lời ca không dứt\r\nLà tuyệt tác của thiên thu\r\n\r\nMẹ cho em Đôi mắt tuyệt vời\r\nĐể nhìn đời nhìn dòng đục trong\r\nNhìn non cao soi sáng biển đông\r\nsáng như tia nắng rọi trong tâm hồn\r\nĐôi mắt em để nhìn rõ quân thù\r\nNhìn tình bạn tươi thắm\r\nNhìn người yêu say đắm\r\nNhìn tổ quốc đẹp thiên thu.. ', 6),
(12, ' Sao Ta Lặng Im', '<iframe width="410" height="100" src="http://mp3.zing.vn/embed/song/ZWZAB606?autostart=false" frameborder="0" allowfullscreen="true"></iframe>', 'Có lẽ đêm nay là giây phút cuối rồi\r\nĐến hết đêm nay mình sẽ mãi cách rời\r\nHãy nói đi anh ngàn lời trong đáy tim', 8);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
