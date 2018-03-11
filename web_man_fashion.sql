-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2018 at 01:56 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_man_fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bill`
--

CREATE TABLE `tb_bill` (
  `id_bill` int(11) NOT NULL,
  `code_bill` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `status_bill` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `id_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_bill`
--

INSERT INTO `tb_bill` (`id_bill`, `code_bill`, `status_bill`, `id_order`) VALUES
(17, '1711969', '1', 53),
(18, '6035072', '1', 54),
(19, '6035072', '1', 55),
(20, '6035072', '1', 56),
(21, '2788404', '1', 57),
(23, '9963808', '1', 62),
(24, '9963808', '1', 63);

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `id_category` int(11) NOT NULL,
  `code_category` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `name_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unaccentname_category` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id_category`, `code_category`, `name_category`, `unaccentname_category`, `parent_id`) VALUES
(43, 'AoNam', 'Áo nam', 'aonam', 0),
(44, 'QuanNam', 'Quần nam', 'quẦnnam', 0),
(45, 'PhuKienNam', 'Phụ kiện nam', 'phỤkiỆnnam', 0),
(99, 'GiayNam', 'Giày nam', 'giaynam', 0),
(100, 'KhuyenMai', 'Khuyến mãi', 'khuyẾnm??i', 0),
(101, 'AoSoMiNam', 'Áo sơ mi nam', 'aosominam', 43),
(102, 'AoThunNam', 'Áo thun nam', 'aothunnam', 43),
(103, 'AoKhoacNam', 'Áo khoác nam', 'aokhoacnam', 43),
(104, 'AoVestNam', 'Áo vest nam', 'aovestnam', 43),
(105, 'AoLenNam', 'Áo len nam', 'aolennam', 43),
(106, 'AoSoMiHanQuoc', 'Áo sơ mi Hàn Quốc', 'aosomihanquoc', 101),
(107, 'AoSoMiHoaTiet', 'Áo sơ mi họa tiết', 'aosomihoatiet', 101),
(108, 'AoSoMiCaro', 'Áo sơ mi Caro', 'aosomicaro', 101),
(109, 'AoSoMiNganTay', 'Áo sơ mi ngắn tay', 'aosomingantay', 101),
(110, 'AoThunNamCoCo', 'Áo thun nam có cổ', 'aothunnamcoco', 102),
(111, 'AoThunNamCoTron', 'Áo thun nam cổ tròn', 'aothunnamcotron', 102),
(112, 'AoThunNamCoTim', 'Áo thun nam cổ tim', 'aothunnamcotim', 102),
(113, 'AoThunNamTayDai', 'Áo thun nam tay dài', 'aothunnamtaydai', 102),
(114, 'AoKhoacDa', 'Áo khoác da', 'aokhoacda', 103),
(115, 'AoKhoacDu', 'Áo khoác dù', 'aokhoacdu', 103),
(116, 'AoKhoacNi', 'Áo khoác nỉ', 'aokhoacni', 103),
(117, 'AoKhoacJeanNam', 'Áo khoác jean nam', 'aokhoacjeannam', 103),
(118, 'AoKhoacKakiNam', 'Áo khoác kaki nam', 'aokhoackakinam', 103),
(119, 'AoKhoacCardigan', 'Áo khoác Cardigan', 'aokhoaccardigan', 103),
(120, 'AoVestNamHanQuoc', 'Áo vest nam Hàn Quốc', 'aovestnamhanquoc', 104),
(121, 'AoGileNam', 'Áo gile nam', 'aogilenam', 104),
(122, 'AoLenNamHanQuoc', 'Áo len nam Hàn Quốc', 'aolennamhanquoc', 105),
(123, 'QuanJeanNam', 'Quần jean nam', 'quẦnjeannam', 44),
(124, 'QuanKakiNam', 'Quần kaki nam', 'quẦnkakinam', 44),
(125, 'QuanShortNam', 'Quần short nam', 'quẦnshortnam', 44),
(126, 'QuanJoggerNam', 'Quần Jogger nam', 'quẦnjoggernam', 44),
(127, 'QuanTayNam', 'Quần tây nam', 'quẦnt??ynam', 44),
(128, 'QuanJeanSkinny', 'Quần jean Skinny', 'quanjeanskinny', 123),
(129, 'QuanJeanRachNam', 'Quần jean rách nam', 'quanjeanrachnam', 123),
(130, 'QuanJeanOngDung', 'Quần jean ống đứng', 'quanjeanongdung', 123),
(131, 'QuanKakiOngCon', 'Quần kaki ống côn', 'quankakiongcon', 124),
(132, 'QuanShortJean', 'Quần short jean', 'quanshortjean', 125),
(133, 'QuanShortThun', 'Quần short thun', 'quanshortthun', 125),
(134, 'QuanShortKaki', 'Quần short kaki', 'quanshortkaki', 125),
(135, 'QuanTayOngCon', 'Quần tây ống côn', 'quantayongcon', 127),
(136, 'ViDaNam', 'VÍ DA NAM', 'v??danam', 45),
(137, 'NonNam', 'NÓN NAM', 'n??nnam', 45),
(138, 'TuiXachNam', 'TÚI XÁCH NAM', 't??ixachnam', 45),
(139, 'ThatLungNam', 'THẮT LƯNG NAM', 'thẮtl??ngnam', 45),
(140, 'CaVat&No', 'CÀ VẠT & NƠ', 'cavẠt&n??', 45),
(141, 'BaloNam', 'BALO NAM', 'balonam', 45),
(142, 'MatKinhNam', 'MẮT KÍNH NAM', 'mẮtk??nhnam', 45),
(143, 'ViDaNgang', 'Ví da ngang', 'vidangang', 136),
(144, 'ViDaDung', 'Ví da đứng', 'vidadung', 136),
(145, 'ViDaiCamTay', 'Ví dài cầm tay', 'vidaicamtay', 136),
(146, 'NonLuoiTrai', 'Nón lưỡi trai', 'nonluoitrai', 137),
(147, 'NonSnapback', 'Nón Snapback', 'nonsnapback', 137),
(148, 'NonLenNam', 'Nón len nam', 'nonlennam', 137),
(149, 'TuiDeoCheoNam', 'Túi đeo chéo nam', 'tuideocheonam', 138),
(150, 'TuiXachTayNam', 'Túi xách tay nam', 'tuixachtaynam', 138),
(151, 'TuiDaNam', 'Túi da nam', 'tuidanam', 138),
(152, 'GiayMoiNam', 'Giày mọi nam', 'giaymoinam', 99),
(153, 'GiayTayNam', 'Giày tây nam', 'giaytaynam', 99),
(154, 'GiayBootNam', 'Giày boot nam', 'giaybootnam', 99),
(155, 'GiayTheThaoNam', 'Giày thể thao nam', 'giaythethaonam', 99),
(156, 'GiayThoiTrangNam', 'Giày thời trang nam', 'giaythoitrangnam', 99),
(157, 'GiayTangChieuCaoNam', 'Giày tăng chiều cao nam', 'giaytangchieucaonam', 99);

-- --------------------------------------------------------

--
-- Table structure for table `tb_city`
--

CREATE TABLE `tb_city` (
  `id_city` int(11) NOT NULL,
  `code_city` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `name_city` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_city`
--

INSERT INTO `tb_city` (`id_city`, `code_city`, `name_city`) VALUES
(3, 'AnGiang', 'An Giang'),
(4, 'VungTau', 'Bà Rịa - Vũng tàu'),
(5, 'BacGiang', 'Bắc Giang'),
(6, 'BacKan', 'Bắc Kạn'),
(7, 'BacLieu', 'Bạc Liêu'),
(8, 'BacNinh', 'Bắc Ninh'),
(9, 'BenTre', 'Bến Tre'),
(10, 'BinhDinh', 'Bình Định'),
(11, 'BinhDuong', 'Bình Dương'),
(12, 'BinhPhuoc', 'Bình Phước'),
(13, 'BinhThuan', 'Bình Thuận'),
(14, 'CaMau', 'Cà Mau'),
(15, 'CaoBang', 'Cao Bằng'),
(16, 'DakLak', 'Đắk Lắk'),
(17, 'DakNong', 'Đắk Nông'),
(18, 'DienBien', 'Điện Biên'),
(19, 'DongNai', 'Đồng Nai'),
(20, 'DongThap', 'Đồng Tháp'),
(21, 'GiaLai', 'Gia Lai'),
(22, 'HaGiang', 'Hà Giang'),
(23, 'HaNam', 'Hà Nam'),
(24, 'HaTinh', 'Hà Tĩnh'),
(25, 'HaiDuong', 'Hải Dương'),
(26, 'HauGiang', 'Hậu Giang'),
(27, 'HoaBinh', 'Hòa Bình'),
(28, 'HungYen', 'Hưng Yên'),
(29, 'KhanhHoa', 'Khánh Hòa'),
(30, 'KienGiang', 'Kiên Giang'),
(31, 'KonTum', 'Kon Tum'),
(32, 'LaiChau', 'Lai Châu'),
(33, 'LamDong', 'Lâm Đồng'),
(34, 'LangSon', 'Lạng Sơn'),
(35, 'LaoCai', 'Lào Cai'),
(36, 'LongAn', 'Long An'),
(37, 'NamDinh', 'Nam Định'),
(38, 'NgheAn', 'Nghệ An'),
(39, 'NinhBinh', 'Ninh Bình'),
(40, 'NinhThuan', 'Ninh Thuận'),
(41, 'PhuTho', 'Phú Thọ'),
(42, 'QuangBinh', 'Quảng Bình'),
(43, 'QuangNam', 'Quảng Nam'),
(44, 'QuangNgai', 'Quảng Ngãi'),
(45, 'QuangNinh', 'Quảng Ninh'),
(46, 'QuangTri', 'Quảng Trị'),
(47, 'SocTrang', 'Sóc Trăng'),
(48, 'SonLa', 'Sơn La'),
(49, 'TayNinh', 'Tây Ninh'),
(50, 'ThaiBinh', 'Thái Bình'),
(51, 'ThaiNguyen', 'Thái Nguyên'),
(52, 'ThanhHoa', 'Thanh Hóa'),
(53, 'ThuaThienH', 'Thừa Thiên Huế'),
(54, 'TienGiang', 'Tiền Giang'),
(55, 'TraVinh', 'Trà Vinh'),
(56, 'TuyenGiang', 'Tuyên Giang'),
(57, 'VinhLong', 'Vĩnh Long'),
(58, 'VinhPhuc', 'Vĩnh Phúc'),
(59, 'YenBai', 'Yên Bái'),
(60, 'PhuYen', 'Phú Yên'),
(61, 'CanTho', 'Cần Thơ'),
(62, 'DaNang', 'Đà Nẵng'),
(63, 'HaiPhong', 'Hải Phòng'),
(64, 'HaNoi', 'Hà Nội'),
(65, 'TP.HCM', 'Thành phố Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `number_phone` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`id`, `name`, `email`, `number_phone`, `address`, `content`, `status`) VALUES
(6, 'Lê Ngọc Tiến Thành', 'lengoctienthanh@gmail.com', '01262898272', '188/48B Nguyễn Văn Cừ', 'Tôi có thể đặt hàng theo ý muốn riêng có được không ?', '1'),
(7, 'Lê Thanh Tuấn', 'lethanhtuan@gmail.com', '01262898272', 'Nguyễn Văn Cừ, tp.Cần Thơ', 'tôi có thể gọi điện thoại order trực tiếp được không ?', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_district`
--

CREATE TABLE `tb_district` (
  `id_district` int(11) NOT NULL,
  `code_district` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `name_district` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_district`
--

INSERT INTO `tb_district` (`id_district`, `code_district`, `name_district`, `id_city`) VALUES
(5, 'AnPhu', 'An Phú', 3),
(6, 'TanChau', 'Tân Châu', 3),
(7, 'PhuTan', 'Phú Tân', 3),
(8, 'ChauDoc', 'Châu Đốc', 3),
(9, 'TinhBien', 'Tịnh Biên', 3),
(10, 'TriTon', 'Trị Tôn', 3),
(11, 'ChauPhu', 'Châu Phú', 3),
(12, 'ChauThanh', 'Châu Thành', 3),
(13, 'ChoMoi', 'Chợ Mới', 3),
(14, 'LongXuyen', 'Long Xuyên', 3),
(15, 'ThoaiSon', 'Thoại Sơn', 3),
(16, 'VungTau', 'Vũng Tàu', 4),
(17, 'BaRia', 'Bà Rịa', 4),
(18, 'XuyenMoc', 'Xuyên Mộc', 4),
(19, 'LongDien', 'Long Điền', 4),
(20, 'ConDao', 'Côn Đảo', 4),
(21, 'TanThanh', 'Tân Thành', 4),
(22, 'ChauDuc', 'Châu Đức', 4),
(23, 'DatDo', 'Đất Đỏ', 4),
(24, 'HiepHoa', 'Hiệp Hòa', 5),
(25, 'YenDung', 'Yên Dũng', 5),
(26, 'LucNam', 'Lục Nam', 5),
(27, 'SonDong', 'Sơn Động', 5),
(28, 'LangGiang', 'Lạng Giang', 5),
(29, 'VietYen', 'Việt Yên', 5),
(30, 'LucNgan', 'Lục Ngạn', 5),
(31, 'YenThe', 'Yên Thế', 5),
(32, 'BacKan', 'Bắc Kạn', 6),
(33, 'PacNam', 'Pác Nặm', 6),
(34, 'BaBe', 'Ba Bể', 6),
(35, 'NganSon', 'Ngân Sơn', 6),
(36, 'BachThong', 'Bạch Thông', 6),
(37, 'ChoDon', 'Chợ Đồn', 6),
(38, 'ChoMoi', 'Chợ Mới', 6),
(39, 'NaRi', 'Na Rì', 6),
(40, 'BacLieu', 'Bạc Liêu', 7),
(41, 'VinhLoi', 'Vĩnh Lợi', 7),
(42, 'HongDan', 'Hồng Dân', 7),
(43, 'GiaRai', 'Giá Rai', 7),
(44, 'PhuocLong', 'Phước Long', 7),
(45, 'DongHai', 'Đông Hải', 7),
(46, 'HoaBinh', 'Hòa Bình', 7),
(47, 'BacNinh', 'Bắc Ninh', 8),
(48, 'YenPhong', 'Yên Phong', 8),
(49, 'QueVo', 'Quế Võ', 8),
(50, 'TienDu', 'Tiên Du', 8),
(51, 'TuSon', 'Từ Sơn', 8),
(52, 'ThuanThanh', 'Thuận Thành', 8),
(53, 'GiaBinh', 'Gia Bình', 8),
(54, 'LuongTai', 'Lương Tài', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_information`
--

CREATE TABLE `tb_information` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_information`
--

INSERT INTO `tb_information` (`id`, `name`, `value`) VALUES
(1, 'name', '3T-SHOP'),
(2, 'description', 'Thương hiệu thời trang nam 3T Chuyên các dòng sản phẩm thời trang nam: Quần jean, quần tây, quần kaki, áo sơ mi, áo khoác, áo vest, áo thun, phụ kiện nam,...'),
(3, 'logo_header', 'image/logo-top.png'),
(4, 'logo_footer', 'image/logo-bottom.png'),
(5, 'email', ' 3T-Shop@gmail.com.vn'),
(6, 'phone', ' 01272311832 01262898272'),
(7, 'adress', '$%^$%^ 384 NguyễnVănCừ, P.AnHòa, Q.NinhKiều, Tp.CầnThơ'),
(15, 'slider', 'image/g144.jpg image/g137.jpg image/g142.jpg image/g143.jpg image/g116.jpg'),
(16, 'fb', 'https://www.facebook.com/profile.php?id=100004568401585'),
(17, 'image_1', 'image/slide-1-trang-chu-slide-1.jpg'),
(18, 'category_1', '17'),
(19, 'image_2', 'image/slide-2-trang-chu-slide-2.jpg'),
(20, 'category_2', '22'),
(21, 'image_3', 'image/slide-3-trang-chu-slide-3.jpg'),
(22, 'category_3', '23'),
(23, 'image_4', 'image/slide-4-trang-chu-slide-4.jpg'),
(24, 'category_4', '18'),
(25, 'gioithieu', '<p>&nbsp;</p>\r\n\r\n<p><strong>Thương hiệu Thời trang 3T&nbsp;được th&agrave;nh lập từ th&aacute;ng 3 năm 2010, l&agrave; một trong những thương hiệu thời trang nam uy t&iacute;n h&agrave;ng đầu Việt Nam. Với sự quản l&yacute; chặt chẽ, chuy&ecirc;n nghiệp của đội ngũ&nbsp;quản l&yacute;; Nỗ lực s&aacute;ng tạo kh&ocirc;ng ngừng của bộ phận thiết kế, Sự tận t&acirc;m của nh&acirc;n vi&ecirc;n b&aacute;n h&agrave;ng&hellip; l&agrave; những yếu tố l&agrave;m n&ecirc;n thương hiệu thời trang 3T&nbsp;lớn mạnh như hiện nay.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>3T&nbsp;lu&ocirc;n quan niệm thời trang l&agrave; sự t&igrave;m t&ograve;i v&agrave; s&aacute;ng tạo n&ecirc;n những sản phẩm của 3T&nbsp;đều được thiết kế ri&ecirc;ng với sự trẻ trung, hiện đại để mang lại gu&nbsp;thời trang hợp mốt nhất cho c&aacute;c bạn trẻ. C&aacute;c d&ograve;ng sản phẩm của 3T&nbsp;kh&ocirc;ng ngừng đa dạng về kiểu d&aacute;ng, mẫu m&atilde; từ &aacute;o sơ mi, &aacute;o thun, &aacute;o kho&aacute;c, &aacute;o vest, quần jean, quần t&acirc;y, quần kaki&hellip; đến c&aacute;c phụ kiện thời trang v&ocirc; c&ugrave;ng s&agrave;nh điệu, tất cả tạo n&ecirc;n vẻ đẹp ho&agrave;n hảo, hiện đại, phong c&aacute;ch cho ph&aacute;i mạnh</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>B&ecirc;n cạnh đ&oacute; 3T&nbsp;lu&ocirc;n đặt m&igrave;nh v&agrave;o t&acirc;m l&yacute; v&agrave; quyền lợi của kh&aacute;ch h&agrave;ng để tung ra những sản phẩm thời trang chất lượng tốt nhất, mẫu m&atilde; cực đẹp, mới lạ nhưng với gi&aacute; cả cực k&igrave; hấp dẫn, cạnh tranh nhất.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Hiện nay, thương hiệu thời trang nam 3T&nbsp;ph&aacute;t triển ng&agrave;y c&agrave;ng lớn mạnh th&agrave;nh một hệ thống với nhiều chi nh&aacute;nh cửa h&agrave;ng b&aacute;n lẻ tại TPHCM, Đồng Nai v&agrave; Vũng T&agrave;u. Ngo&agrave;i ra, nhằm tạo sự tiện lợi mua sắm tối đa cho kh&aacute;ch h&agrave;ng, 3T&nbsp;ph&aacute;t triển hệ thống b&aacute;n h&agrave;ng online, giao h&agrave;ng đến tận tay người ti&ecirc;u d&ugrave;ng tr&ecirc;n to&agrave;n quốc. Giờ đ&acirc;y ngay tại nh&agrave; bạn cũng c&oacute; thể chọn cho m&igrave;nh những sản phẩm ph&ugrave; hợp với sở th&iacute;ch v&agrave; phong c&aacute;ch của m&igrave;nh.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Đến với 3T-SHOP, ch&uacute;ng t&ocirc;i lu&ocirc;n tận t&acirc;m tư vấn gi&uacute;p qu&yacute; kh&aacute;ch t&igrave;m được những sản phẩm y&ecirc;u th&iacute;ch, ph&ugrave; hợp với nhu cầu v&agrave; g&oacute;p phần tạo n&ecirc;n phong c&aacute;ch cho ri&ecirc;ng m&igrave;nh!</strong></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_label`
--

CREATE TABLE `tb_label` (
  `id_label` int(11) NOT NULL,
  `code_label` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `name_label` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_label`
--

INSERT INTO `tb_label` (`id_label`, `code_label`, `name_label`) VALUES
(22, 'AoNamHQ', 'Áo nam hàn quốc'),
(23, 'QuanNamHQ', 'Quần Hàn Quốc'),
(24, 'ThatLungHQ', 'Thắt lưng nam Hàn Quốc'),
(25, 'ViDaHQ', 'Ví da nam Hàn Quốc'),
(26, 'TuiXachHQ', 'Túi xách nam Hàn Quốc'),
(27, 'NonNamHQ', 'Nón nam Hàn Quốc');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `code_order` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `status_order` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `id_product` int(11) NOT NULL,
  `size_product` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity_product` int(5) NOT NULL,
  `name_customer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_customer` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `address_customer` text COLLATE utf8_unicode_ci NOT NULL,
  `email_customer` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_day` datetime NOT NULL,
  `id_district` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `code_order`, `status_order`, `id_product`, `size_product`, `quantity_product`, `name_customer`, `phone_customer`, `address_customer`, `email_customer`, `order_day`, `id_district`) VALUES
(53, '9615329', '1', 19, 's', 1, 'Lê Ngọc Tiến Thành', '01262898272', 'abc, Hòa Lạc', 'lengoctienthanh@gmail.com', '2018-01-10 21:48:00', 7),
(54, '3296782', '1', 19, 'l', 4, 'Lê Ngọc Tiến Thành', '01262898272', '123, abcd', 'lengoctienthanh@gmail.com', '2018-01-10 23:05:00', 26),
(55, '3296782', '1', 20, 'xl', 9, 'Lê Ngọc Tiến Thành', '01262898272', '123, abcd', 'lengoctienthanh@gmail.com', '2018-01-10 23:05:00', 26),
(56, '3296782', '1', 21, 'm', 6, 'Lê Ngọc Tiến Thành', '01262898272', '123, abcd', 'lengoctienthanh@gmail.com', '2018-01-10 23:05:00', 26),
(57, '9887352', '1', 20, 'L', 6, 'Lê Ngọc Tiến Thành', '01262898272', '188/48B Nguyễn Văn Cừ, An Hòa', 'lengoctienthanh@gmail.com', '2018-01-11 08:04:38', 28),
(62, '4387044', '1', 20, 'l', 4, 'Lê Ngọc Tiến Trung', '01262898272', ' 123, Cái Răng', 'lengoctienthanh@gmail.com', '2018-01-12 08:59:00', 8),
(63, '4387044', '1', 21, 'm', 6, 'Lê Ngọc Tiến Trung', '01262898272', ' 123, Cái Răng', 'lengoctienthanh@gmail.com', '2018-01-12 08:59:00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` int(11) NOT NULL,
  `code_product` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `name_product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_label` int(11) NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `image_thump` text COLLATE utf8_unicode_ci NOT NULL,
  `price_product` int(11) NOT NULL,
  `saleprice_product` int(11) NOT NULL,
  `describe_product` text COLLATE utf8_unicode_ci NOT NULL,
  `size_product` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `view_product` int(11) NOT NULL,
  `date_product` date NOT NULL,
  `status_product` char(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `code_product`, `name_product`, `id_category`, `id_label`, `image`, `image_thump`, `price_product`, `saleprice_product`, `describe_product`, `size_product`, `view_product`, `date_product`, `status_product`) VALUES
(19, 'A8024', 'ÁO SƠ MI HÀN QUỐC CAM TRƠN ASM788', 106, 22, 'upload/resize/ao-so-mi-han-quoc-cam-tron-asm788-7258-slide-1_thump.jpg upload/resize/ao-so-mi-han-quoc-cam-tron-asm788-7258-slide-2_thump.jpg upload/resize/ao-so-mi-han-quoc-cam-tron-asm788-7258-slide-3_thump.jpg upload/resize/ao-so-mi-han-quoc-cam-tron-asm788-7258-slide-4_thump.jpg', 'upload/resize/ao-so-mi-han-quoc-cam-tron-asm788-7258-slide-1_thump.jpg upload/resize/ao-so-mi-han-quoc-cam-tron-asm788-7258-slide-2_thump.jpg upload/resize/ao-so-mi-han-quoc-cam-tron-asm788-7258-slide-3_thump.jpg upload/resize/ao-so-mi-han-quoc-cam-tron-asm788-7258-slide-4_thump.jpg', 200000, 245000, 'Áo Sơ Mi Hàn Quốc Cam Trơn ASM788 với thiết kế cổ trụ, tay dài, form ôm nhẹ, phối nút ở cổ áo tinh tế. Thiết kế đơn giản theo phong cách Hàn Quốc rất thời trang, vải trơn thanh lịch, chất liệu 100% cotton cao cấp thấm hút tốt, pha sợi spandex giúp co giãn và không co rút, nhăn nhàu khi sử dụng. Đường chỉ may tỉ mỉ, tinh tế đến từng chi tiết nhỏ. Màu sắc nổi bật, kiểu dáng hiện đại, giúp bạn tự tin và lịch lãm hơn.', 'a:4:{s:1:\"s\";s:1:\"9\";s:1:\"m\";s:2:\"10\";s:1:\"l\";i:6;s:2:\"xl\";s:2:\"10\";}', 1, '2018-01-10', '1'),
(20, 'A551', 'ÁO SƠ MI HÀN QUỐC TRẮNG KEM TRƠN ASM788', 106, 22, 'upload/resize/ao-so-mi-han-quoc-trang-kem-tron-asm788-7251-slide-1_thump.jpg upload/resize/ao-so-mi-han-quoc-trang-kem-tron-asm788-7251-slide-2_thump.jpg upload/resize/ao-so-mi-han-quoc-trang-kem-tron-asm788-7251-slide-3_thump.jpg upload/resize/ao-so-mi-han-quoc-trang-kem-tron-asm788-7251-slide-4_thump.jpg', 'upload/resize/ao-so-mi-han-quoc-trang-kem-tron-asm788-7251-slide-1_thump.jpg upload/resize/ao-so-mi-han-quoc-trang-kem-tron-asm788-7251-slide-2_thump.jpg upload/resize/ao-so-mi-han-quoc-trang-kem-tron-asm788-7251-slide-3_thump.jpg upload/resize/ao-so-mi-han-quoc-trang-kem-tron-asm788-7251-slide-4_thump.jpg', 200000, 245000, 'Áo Sơ Mi Hàn Quốc Trắng Kem Trơn ASM788 màu sắc trang nhã, thiết kế hiện đại không gây cảm giác nhàm chán. Form ôm, vải suông, tay dài, cổ trụ phối nút tạo điểm nhấn tinh tế cho sản phẩm. Chất liệu cao cấp từ 100% cotton thấm hút tốt, pha sợi spandex giúp sản phẩm có độ co giãn, không nhăn nhàu co rút sau khi giặt. Thiết kế theo phong cách Hàn Quốc rất thời trang và hiện đại, giúp bạn thêm chuyên nghiệp, lịch lãm và nam tính hơn.', 'a:4:{s:1:\"s\";s:2:\"10\";s:1:\"m\";s:2:\"10\";s:1:\"l\";i:0;s:2:\"xl\";s:2:\"10\";}', 4, '2018-01-10', '1'),
(21, 'A3516', 'ÁO SƠ MI HÀN QUỐC XANH ĐEN TRƠN ASM788', 106, 22, 'upload/resize/ao-so-mi-han-quoc-xanh-den-tron-asm788-7255-slide-1_thump.jpg upload/resize/ao-so-mi-han-quoc-xanh-den-tron-asm788-7255-slide-2_thump.jpg upload/resize/ao-so-mi-han-quoc-xanh-den-tron-asm788-7255-slide-3_thump.jpg', 'upload/resize/ao-so-mi-han-quoc-xanh-den-tron-asm788-7255-slide-1_thump.jpg upload/resize/ao-so-mi-han-quoc-xanh-den-tron-asm788-7255-slide-2_thump.jpg upload/resize/ao-so-mi-han-quoc-xanh-den-tron-asm788-7255-slide-3_thump.jpg', 200000, 245000, 'Áo Sơ Mi Hàn Quốc Xanh Đen Trơn ASM788 với thiết kế cổ trụ, tay dài, form ôm nhẹ, phối nút ở cổ áo tinh tế. Thiết kế đơn giản theo phong cách Hàn Quốc rất thời trang, vải trơn thanh lịch, chất liệu 100% cotton cao cấp thấm hút tốt. Đường chỉ may tỉ mỉ, tinh tế đến từng chi tiết nhỏ. Màu sắc nổi bật, kiểu dáng hiện đại, giúp bạn tự tin và lịch lãm hơn.', 'a:4:{s:1:\"s\";s:2:\"10\";s:1:\"m\";i:4;s:1:\"l\";s:2:\"10\";s:2:\"xl\";s:2:\"10\";}', 3, '2018-01-10', '1'),
(23, 'A441', 'ÁO SƠ MI TRẮNG KEM ASM836', 106, 22, 'upload/resize/ao-so-mi-trang-kem-asm836-8193-slide-1_thump.jpg upload/resize/ao-so-mi-trang-kem-asm836-8193-slide-2_thump.jpg upload/resize/ao-so-mi-trang-kem-asm836-8193-slide-3_thump.jpg upload/resize/ao-so-mi-trang-kem-asm836-8193-slide-4_thump.jpg', 'upload/resize/ao-so-mi-trang-kem-asm836-8193-slide-1_thump.jpg upload/resize/ao-so-mi-trang-kem-asm836-8193-slide-2_thump.jpg upload/resize/ao-so-mi-trang-kem-asm836-8193-slide-3_thump.jpg upload/resize/ao-so-mi-trang-kem-asm836-8193-slide-4_thump.jpg ', 200000, 245000, 'Màu trắng kem luôn mang đến cho người mặc sự thanh lịch, nhã nhặn như chiếc Áo Sơ Mi Trắng Kem ASM836 này. Áo co giãn rất thoải mái và thấm hút mồ hôi cực tốt nhờ chất liệu từ cotton cao cấp. Điểm nhấn của chiếc áo nằm ở những đường lượn cong nhiều màu trải đều khắp mặt áo rất ấn tượng. Đảm bảo sẽ làm bật lên style ăn mặc hiện đại của bạn.', 'a:3:{s:1:\"m\";s:2:\"10\";s:1:\"l\";s:2:\"10\";s:2:\"xl\";s:2:\"10\";}', 0, '2018-01-11', '1'),
(28, 'A792', 'ÁO SƠ MI TRẮNG KEM ASM838', 107, 22, 'upload/resize/ao-so-mi-trang-kem-asm838-8198-slide-1_thump.jpg upload/resize/ao-so-mi-trang-kem-asm838-8198-slide-2_thump.jpg upload/resize/ao-so-mi-trang-kem-asm838-8198-slide-3_thump.jpg upload/resize/ao-so-mi-trang-kem-asm838-8198-slide-4_thump.jpg', 'upload/resize/ao-so-mi-trang-kem-asm838-8198-slide-1_thump.jpg upload/resize/ao-so-mi-trang-kem-asm838-8198-slide-2_thump.jpg upload/resize/ao-so-mi-trang-kem-asm838-8198-slide-3_thump.jpg upload/resize/ao-so-mi-trang-kem-asm838-8198-slide-4_thump.jpg ', 200000, 245000, 'Áo Sơ Mi Trắng Kem ASM838 thanh lịch với màu trắng kem nhã nhặn, chất liệu cao cấp từ cotton co giãn, thấm hút tốt, giúp sản phẩm không những bền đẹp mà còn có giá trị sử dụng rất cao. Chiếc áo được nhấn nhá với những họa tiết nhỏ, trải đều khắp mặt áo rất ấn tượng. Đảm bảo sẽ làm bật lên style ăn mặc hiện đại của bạn.', 'a:2:{s:1:\"l\";s:2:\"10\";s:2:\"xl\";s:2:\"10\";}', 0, '2018-01-11', '1'),
(30, 'A3007', 'ÁO SƠ MI HỌA TIẾT ĐỎ ĐÔ ASM706', 107, 22, 'upload/resize/ao-so-mi-hoa-tiet-do-do-asm706-5720-slide-1_thump.jpg upload/resize/ao-so-mi-hoa-tiet-do-do-asm706-5720-slide-2_thump.jpg upload/resize/ao-so-mi-hoa-tiet-do-do-asm706-5720-slide-3_thump.jpg upload/resize/ao-so-mi-hoa-tiet-do-do-asm706-5720-slide-4_thump.jpg', 'upload/resize/ao-so-mi-hoa-tiet-do-do-asm706-5720-slide-1_thump.jpg upload/resize/ao-so-mi-hoa-tiet-do-do-asm706-5720-slide-2_thump.jpg upload/resize/ao-so-mi-hoa-tiet-do-do-asm706-5720-slide-3_thump.jpg upload/resize/ao-so-mi-hoa-tiet-do-do-asm706-5720-slide-4_thump.jpg ', 200000, 225000, 'Áo Sơ Mi Họa Tiết Đỏ Đô ASM706 kiểu dáng trẻ trung, phối họa tiết lạ mắt tạo điểm nhấn cho sản phẩm. Màu đỏ đô nổi bật, tay dài, cổ bẻ cao thời trang. Tên và logo thương hiệu gắn bên ngực phải mang đến sự khác biệt cho sản phẩm. Chất liệu vải cotton cao cấp bền đẹp, không nhăn, thấm hút mồ hôi tốt tạo sự thoải mái khi mặc.\r\n\r\n', 'a:2:{s:1:\"l\";s:2:\"10\";s:2:\"xl\";s:2:\"10\";}', 0, '2018-01-11', '1'),
(32, 'A5771', 'ÁO SƠ MI CA RÔ XANH ĐEN ASM832', 108, 22, 'upload/resize/ao-so-mi-ca-ro-xanh-den-asm832-7937-slide-1_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-den-asm832-7937-slide-3_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-den-asm832-7937-slide-4_thump.jpg', 'upload/resize/ao-so-mi-ca-ro-xanh-den-asm832-7937-slide-1_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-den-asm832-7937-slide-3_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-den-asm832-7937-slide-4_thump.jpg ', 200000, 245000, 'Áo Sơ Mi Ca Rô Xanh Đen ASM832 màu sắc tươi sáng, nổi bật với những đường sọc caro xanh đen cá tính cho người mặc nét sang trọng, lịch lãm. Kiểu dáng thanh lịch, hợp thời trang, phù hợp với nhiều đối tượng. Hãy bắt đầu ngày mới với những sắc màu trẻ trung, tươi sáng từ Áo sơ mi của 4MEN.\r\n\r\n', 'a:2:{s:1:\"l\";s:2:\"10\";s:2:\"xl\";s:2:\"10\";}', 0, '2018-01-11', '1'),
(33, 'A5042', 'ÁO SƠ MI CA RÔ XANH ĐEN ASM886', 108, 22, 'upload/resize/ao-so-mi-ca-ro-xanh-den-asm886-8768-slide-1_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-den-asm886-8768-slide-2_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-den-asm886-8768-slide-3_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-den-asm886-8768-slide-4_thump.jpg', 'upload/resize/ao-so-mi-ca-ro-xanh-den-asm886-8768-slide-1_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-den-asm886-8768-slide-2_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-den-asm886-8768-slide-3_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-den-asm886-8768-slide-4_thump.jpg ', 150000, 195000, '', 'a:3:{s:1:\"m\";s:2:\"10\";s:1:\"l\";s:2:\"10\";s:2:\"xl\";s:2:\"10\";}', 0, '2018-01-11', '1'),
(35, 'A6757', 'ÁO SƠ MI SỌC XANH RÊU ASM840', 108, 22, 'upload/resize/ao-so-mi-soc-xanh-reu-asm840-8259-slide-1_thump.jpg upload/resize/ao-so-mi-soc-xanh-reu-asm840-8259-slide-2_thump.jpg upload/resize/ao-so-mi-soc-xanh-reu-asm840-8259-slide-3_thump.jpg upload/resize/ao-so-mi-soc-xanh-reu-asm840-8259-slide-4_thump.jpg', 'upload/resize/ao-so-mi-soc-xanh-reu-asm840-8259-slide-1_thump.jpg upload/resize/ao-so-mi-soc-xanh-reu-asm840-8259-slide-2_thump.jpg upload/resize/ao-so-mi-soc-xanh-reu-asm840-8259-slide-3_thump.jpg upload/resize/ao-so-mi-soc-xanh-reu-asm840-8259-slide-4_thump.jpg ', 200000, 245000, 'Áo Sơ Mi Sọc Xanh Rêu ASM840 với những đường sọc màu bắt mắt đã phá tan sự giản đơn của một chiếc áo sơ mi trắng. Kiểu dáng thanh lịch, hợp thời trang, phù hợp với nhiều đối tượng. Sọc màu xanh rêu cá tính ở ngực phải tạo nên điểm nhấn cho sản phẩm cũng như sự thu hút cho người mặc.', 'a:2:{s:1:\"m\";s:2:\"10\";s:1:\"l\";s:2:\"10\";}', 0, '2018-01-11', '1'),
(36, 'A6208', 'ÁO SƠ MI CA RÔ XANH LÁ CÂY ASM858', 108, 22, 'upload/resize/ao-so-mi-ca-ro-xanh-la-cay-asm858-8504-slide-1_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-la-cay-asm858-8504-slide-2_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-la-cay-asm858-8504-slide-3_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-la-cay-asm858-8504-slide-4_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-la-cay-asm858-8504-slide-5_thump.jpg', 'upload/resize/ao-so-mi-ca-ro-xanh-la-cay-asm858-8504-slide-1_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-la-cay-asm858-8504-slide-2_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-la-cay-asm858-8504-slide-3_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-la-cay-asm858-8504-slide-4_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-la-cay-asm858-8504-slide-5_thump.jpg', 150000, 195000, 'Nếu bạn cảm thấy nhàm chán với Áo sơ mi trơn thì hãy thay đổi diện mạo với Áo Sơ Mi Ca Rô Xanh Lá Cây ASM858 cá tính này. Màu xanh lá cây tươi sáng phối những đường sọc caro nhỏ bắt mắt tạo nên sự nổi bật cho người mặc. Bên cạnh đó, thiết kế dáng cổ trụ cài nút lịnh lãm, tay dài, cùng hàng nút cài tiệp màu áo càng làm tăng lên vẻ thu hút.', 'a:0:{}', 1, '2018-01-11', '1'),
(37, 'A4311', 'ÁO SƠ MI NGẮN TAY TRẮNG KEM ASM776', 109, 22, 'upload/resize/ao-so-mi-ngan-tay-trang-kem-asm776-7005-slide-1_thump.jpg upload/resize/ao-so-mi-ngan-tay-trang-kem-asm776-7005-slide-2_thump.jpg upload/resize/ao-so-mi-ngan-tay-trang-kem-asm776-7005-slide-3_thump.jpg upload/resize/ao-so-mi-ngan-tay-trang-kem-asm776-7005-slide-4_thump.jpg', 'upload/resize/ao-so-mi-ngan-tay-trang-kem-asm776-7005-slide-1_thump.jpg upload/resize/ao-so-mi-ngan-tay-trang-kem-asm776-7005-slide-2_thump.jpg upload/resize/ao-so-mi-ngan-tay-trang-kem-asm776-7005-slide-3_thump.jpg upload/resize/ao-so-mi-ngan-tay-trang-kem-asm776-7005-slide-4_thump.jpg ', 200000, 225000, 'Áo Sơ Mi Ngắn Tay Trắng Kem ASM776 thiết kế tinh tế đi cùng màu sắc trang nhã. Cổ trụ phối nút, tay ngắn, đường may đều đẹp chắc chắn. Đường viền cổ phối khác màu và logo nho nhỏ trên ngực áo tạo điểm nhấn. Chất liệu cao cấp 100% cotton thấm hút tốt, pha sợi spandex giúp sản phẩm vừa ôm dáng khoe body vừa co giãn cực thoải mái cho người mặc, lại không nhăn nhàu không co rút. Sản phẩm giúp bạn nam có vẻ ngoài lịch lãm và sang trọng hơn, nhưng vẫn giữ được nét tươi trẻ và hiện đại.', 'a:2:{s:1:\"l\";s:2:\"10\";s:2:\"xl\";s:2:\"10\";}', 0, '2018-01-11', '1'),
(38, 'A6907', 'ÁO SƠ MI NGẮN TAY ĐỎ ĐÔ ASM776', 109, 22, 'upload/resize/ao-so-mi-ngan-tay-do-do-asm776-7003-slide-1_thump.jpg upload/resize/ao-so-mi-ngan-tay-do-do-asm776-7003-slide-2_thump.jpg upload/resize/ao-so-mi-ngan-tay-do-do-asm776-7003-slide-3_thump.jpg upload/resize/ao-so-mi-ngan-tay-do-do-asm776-7003-slide-4_thump.jpg', 'upload/resize/ao-so-mi-ngan-tay-do-do-asm776-7003-slide-1_thump.jpg upload/resize/ao-so-mi-ngan-tay-do-do-asm776-7003-slide-2_thump.jpg upload/resize/ao-so-mi-ngan-tay-do-do-asm776-7003-slide-3_thump.jpg upload/resize/ao-so-mi-ngan-tay-do-do-asm776-7003-slide-4_thump.jpg ', 200000, 225000, 'Áo Sơ Mi Ngắn Tay Đỏ Đô ASM776 thiết kế hiện đại, màu đỏ đô nam tính và lịch lãm. Chất liệu cao cấp 100% cotton thấm hút tốt, pha sợi spandex nên sản phẩm tăng độ co giãn, không nhăn nhàu và co rút. Thiết kế mới lạ, cổ trụ phối nút nam tính, đường viền cổ khác màu và logo trên ngực áo tạo điểm nhấn cho sản phẩm. Đường chỉ may đều đẹp chắc chắn. Sản phẩm giúp người mặc nổi bật và cuốn hút hơn.', 'a:2:{s:1:\"l\";s:2:\"10\";s:2:\"xl\";s:2:\"10\";}', 0, '2018-01-11', '1'),
(39, 'A2555', 'ÁO SƠ MI NGẮN TAY ĐEN ASM710', 109, 22, 'upload/resize/ao-so-mi-ngan-tay-den-asm710-6052-slide-1_thump.jpg upload/resize/ao-so-mi-ngan-tay-den-asm710-6052-slide-2_thump.jpg', 'upload/resize/ao-so-mi-ngan-tay-den-asm710-6052-slide-1_thump.jpg upload/resize/ao-so-mi-ngan-tay-den-asm710-6052-slide-2_thump.jpg ', 150000, 185000, 'Áo Sơ Mi Ngắn Tay Đen ASM710 màu đen nam tính phối viền cổ áo, cổ tay áo và túi trước ngực tạo điểm nhấn cho sản phẩm. Thiết kế đơn giản với áo cổ bẻ, tay ngắn trẻ trung. Form áo ôm vừa vặn, đường may đẹp, tinh tế mang đến vẻ ngoài thanh lịch, nam tính. Chất liệu cotton mềm mại, thấm hút mồ hôi, mang lại cảm giác thoải mái khi mặc .', 'a:3:{s:1:\"m\";s:2:\"10\";s:1:\"l\";s:2:\"10\";s:2:\"xl\";s:2:\"10\";}', 0, '2018-01-11', '1'),
(40, 'A4822', 'ÁO SƠ MI NGẮN TAY XANH BÍCH ASM710', 109, 22, 'upload/resize/ao-so-mi-ngan-tay-xanh-bich-asm710-6054-slide-1_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-bich-asm710-6054-slide-2_thump.jpg', 'upload/resize/ao-so-mi-ngan-tay-xanh-bich-asm710-6054-slide-1_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-bich-asm710-6054-slide-2_thump.jpg', 150000, 185000, 'Áo Sơ Mi Ngắn Tay Xanh Bích ASM710 Gam màu xanh bích phối viền cổ áo, cổ tay áo và túi trước ngực tạo điểm nhấn.\r\n- Thiết kế đơn giản với áo cổ bẻ, tay ngắn trẻ trung.\r\n- Form áo ôm vừa vặn, đường may đẹp, tinh tế mang đến vẻ ngoài thanh lịch, nam tính.\r\n- Chất liệu cotton mềm mại, thấm hút mồ hôi, mang lại cảm giác thoải mái khi mặc', 'a:3:{s:1:\"m\";s:1:\"0\";s:1:\"l\";s:1:\"0\";s:2:\"xl\";s:1:\"0\";}', 0, '2018-01-11', '1'),
(41, 'A8543', 'ÁO SƠ MI NGẮN TAY CA RÔ ĐEN ASM912', 108, 22, 'upload/resize/ao-so-mi-ca-ro-den-asm912-8796-slide-1_thump.jpg upload/resize/ao-so-mi-ca-ro-den-asm912-8796-slide-3_thump.jpg upload/resize/ao-so-mi-ca-ro-den-asm912-8796-slide-4_thump.jpg', 'upload/resize/ao-so-mi-ca-ro-den-asm912-8796-slide-1_thump.jpg upload/resize/ao-so-mi-ca-ro-den-asm912-8796-slide-3_thump.jpg upload/resize/ao-so-mi-ca-ro-den-asm912-8796-slide-4_thump.jpg ', 150000, 185000, '', 'a:3:{s:1:\"m\";s:2:\"10\";s:1:\"l\";s:2:\"10\";s:2:\"xl\";s:2:\"10\";}', 0, '2018-01-12', '1'),
(43, 'A603', 'ÁO SƠ MI NGẮN TAY XANH RÊU ASM904', 108, 22, 'upload/resize/ao-so-mi-ca-ro-xanh-reu-asm904-8782-slide-1_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-reu-asm904-8782-slide-2_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-reu-asm904-8782-slide-3_thump.jpg', 'upload/resize/ao-so-mi-ca-ro-xanh-reu-asm904-8782-slide-1_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-reu-asm904-8782-slide-2_thump.jpg upload/resize/ao-so-mi-ca-ro-xanh-reu-asm904-8782-slide-3_thump.jpg ', 150000, 185000, '', 'a:3:{s:1:\"m\";s:2:\"10\";s:1:\"l\";s:2:\"10\";s:2:\"xl\";s:2:\"10\";}', 0, '2018-01-12', '1'),
(44, 'A5', 'ÁO SƠ MI CỔ LÃNH TỤ NGẮN TAY TRẮNG ASM798', 109, 22, 'upload/resize/ao-so-mi-co-lanh-tu-ngan-tay-trang-asm798-7571-slide-1_thump.jpg upload/resize/ao-so-mi-co-lanh-tu-ngan-tay-trang-asm798-7571-slide-2_thump.jpg upload/resize/ao-so-mi-co-lanh-tu-ngan-tay-trang-asm798-7571-slide-3_thump.jpg', 'upload/resize/ao-so-mi-co-lanh-tu-ngan-tay-trang-asm798-7571-slide-1_thump.jpg upload/resize/ao-so-mi-co-lanh-tu-ngan-tay-trang-asm798-7571-slide-2_thump.jpg upload/resize/ao-so-mi-co-lanh-tu-ngan-tay-trang-asm798-7571-slide-3_thump.jpg ', 200000, 225000, 'Áo Sơ Mi Cổ Lãnh Tụ Ngắn Tay Trắng ASM798 thiết kế tay ngắn năng động, form ôm, mang phong cách thời trang Hàn quốc tạo cảm giác sang trọng và đẳng cấp cho người mặc. Dáng cổ trụ, may những đường viền nhỏ dọc ngực áo tạo điểm nhấn cho sản phẩm. Chất liệu cao cấp từ 100% cotton, pha thêm sợi spandex giúp sản phẩm không những thấm hút tốt, mà còn không nhăn nhàu mất dáng sau khi giặt bởi có độ co giãn. Rất đáng để trải nghiệm!', 'a:3:{s:1:\"m\";s:2:\"10\";s:1:\"l\";s:2:\"10\";s:2:\"xl\";s:2:\"10\";}', 0, '2018-01-12', '1'),
(45, 'A3320', 'ÁO SƠ MI NGẮN TAY XANH ĐEN ASM880', 109, 22, 'upload/resize/ao-so-mi-ngan-tay-xanh-den-asm880-8746-slide-products-594b7404cb3a3_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-den-asm880-8746-slide-products-594b7404cdf05_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-den-asm880-8746-slide-products-594b7404ce598_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-den-asm880-8746-slide-products-594b7404de395_thump.jpg', 'upload/resize/ao-so-mi-ngan-tay-xanh-den-asm880-8746-slide-products-594b7404cb3a3_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-den-asm880-8746-slide-products-594b7404cdf05_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-den-asm880-8746-slide-products-594b7404ce598_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-den-asm880-8746-slide-products-594b7404de395_thump.jpg ', 150000, 185000, 'Áo Sơ Mi Ngắn Tay Xanh Đen ASM880 thiết kế cổ bẻ ve nhỏ, tay áo ngắn năng động thích hợp cho dân công sở thay đổi diện mạo khô khan thường thấy. Bên cạnh đó, chất cotton cao cấp mang đến cảm giác thoải mái, dễ chịu cho người mặc.', 'a:3:{s:1:\"m\";s:2:\"10\";s:1:\"l\";s:2:\"10\";s:2:\"xl\";s:2:\"10\";}', 0, '2018-01-12', '1'),
(46, 'A1438', 'ÁO SƠ MI NGẮN TAY XANH BÍCH ASM743', 109, 22, 'upload/resize/ao-so-mi-ngan-tay-xanh-bich-asm743-6337-slide-1_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-bich-asm743-6337-slide-2_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-bich-asm743-6337-slide-3_thump.jpg', 'upload/resize/ao-so-mi-ngan-tay-xanh-bich-asm743-6337-slide-1_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-bich-asm743-6337-slide-2_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-bich-asm743-6337-slide-3_thump.jpg ', 150000, 185000, 'Áo Sơ Mi Ngắn Tay Xanh Bích ASM743 với gam màu xanh bích tươi mát, trẻ trung, dễ phối đồ. Thiết kế đơn giản với áo cổ bẻ, tay ngắn khỏe khoắn. Chất liệu cotton mềm mại, thấm hút mồ hôi, mang lại cảm giác thoải mái khi mặc. Form áo ôm vừa vặn, đường may đẹp, tinh tế mang đến vẻ ngoài thanh lịch, nam tính.', 'a:5:{s:1:\"s\";s:2:\"10\";s:1:\"m\";s:2:\"10\";s:1:\"l\";s:2:\"10\";s:2:\"xl\";s:2:\"10\";s:3:\"xxl\";s:2:\"10\";}', 0, '2018-01-12', '1'),
(47, 'A2942', 'ÁO SƠ MI NGẮN TAY XANH ĐEN ASM869', 109, 22, 'upload/resize/ao-so-mi-ngan-tay-xanh-den-asm869-8664-slide-1_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-den-asm869-8664-slide-2_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-den-asm869-8664-slide-3_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-den-asm869-8664-slide-4_thump.jpg', 'upload/resize/ao-so-mi-ngan-tay-xanh-den-asm869-8664-slide-1_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-den-asm869-8664-slide-2_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-den-asm869-8664-slide-3_thump.jpg upload/resize/ao-so-mi-ngan-tay-xanh-den-asm869-8664-slide-4_thump.jpg', 200000, 225000, 'Áo Sơ Mi Ngắn Tay Xanh Đen ASM869 thiết kế theo phong cách thời trang Hàn Quốc, gọn gàng, lịch lãm mang đến cho người mặc vẻ ngoài bắt mắt, thu hút phái nữ.', 'a:0:{}', 0, '2018-01-12', '1'),
(49, 'A1088', 'ÁO THUN CÓ CỔ XANH LÁ CÂY IN NỔI CỜ ĐỨC AT519', 110, 22, 'upload/resize/ao-thun-co-co-xanh-la-cay-in-noi-co-duc-at519-336-p_thump.jpg upload/resize/ao-thun-co-co-xanh-la-cay-in-noi-co-duc-at519-336-p(1)_thump.jpg', 'upload/resize/ao-thun-co-co-xanh-la-cay-in-noi-co-duc-at519-336-p_thump.jpg upload/resize/ao-thun-co-co-xanh-la-cay-in-noi-co-duc-at519-336-p(1)_thump.jpg ', 100000, 170000, '', 'a:2:{s:1:\"m\";s:2:\"10\";s:1:\"l\";s:2:\"10\";}', 0, '2018-01-12', '1'),
(50, 'A9312', 'ÁO THUN CÁ SẤU XANH LÁ CÂY AT632', 110, 22, 'upload/resize/ao-thun-ca-sau-xanh-la-cay-at632-7961-slide-1_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at632-7961-slide-2_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at632-7961-slide-3_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at632-7961-slide-4_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at632-7961-slide-5_thump.jpg', 'upload/resize/ao-thun-ca-sau-xanh-la-cay-at632-7961-slide-1_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at632-7961-slide-2_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at632-7961-slide-3_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at632-7961-slide-4_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at632-7961-slide-5_thump.jpg ', 150000, 195000, '', 'a:3:{s:1:\"m\";s:2:\"10\";s:1:\"l\";s:2:\"10\";s:2:\"xl\";s:2:\"10\";}', 0, '2018-01-12', '1'),
(51, 'A4261', 'ÁO THUN CÁ SẤU CỔ LÃNH TỤ ĐEN AT574', 110, 22, 'upload/resize/ao-thun-ca-sau-den-at574-6225-slide-1_thump.jpg upload/resize/ao-thun-ca-sau-den-at574-6225-slide-2_thump.jpg', 'upload/resize/ao-thun-ca-sau-den-at574-6225-slide-1_thump.jpg upload/resize/ao-thun-ca-sau-den-at574-6225-slide-2_thump.jpg ', 150000, 195000, 'Áo Thun Cá Sấu Cổ Lãnh Tụ Đen AT574 màu đen cá tính phối đỏ đô bên tay áo tạo điểm nhấn cho sản phẩm. Thiết kế tay ngắn, cổ lãnh tụ kèm nút, phối hàng chữ dọc chạy theo nút thời trang. Chất liệu thun cotton mềm mại, co giãn tạo sự thoáng mát khi mặc. Logo và chữ CITIZEN sử dụng công nghệ in cao được in nổi bật bên ngực áo. Form áo ôm body.\r\n\r\n', 'a:3:{s:1:\"m\";s:2:\"10\";s:1:\"l\";s:2:\"10\";s:2:\"xl\";s:2:\"10\";}', 0, '2018-01-12', '1'),
(52, 'A8432', 'ÁO THUN CÁ SẤU CỔ LÃNH TỤ XANH LÁ CÂY AT574', 110, 22, 'upload/resize/ao-thun-ca-sau-xanh-la-cay-at574-6229-slide-1_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at574-6229-slide-2_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at574-6229-slide-3_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at574-6229-slide-4_thump.jpg', 'upload/resize/ao-thun-ca-sau-xanh-la-cay-at574-6229-slide-1_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at574-6229-slide-2_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at574-6229-slide-3_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at574-6229-slide-4_thump.jpg', 150000, 195000, 'Áo Thun Cá Sấu Cổ Lãnh Tụ Xanh Lá Cây AT574 màu xanh lá cây tươi sáng phối màu trắng kem ở tay áo tạo điểm nhấn nổi bật cho sản phẩm. Thiết kế tay ngắn, cổ lãnh tụ kèm nút, phối hàng chữ dọc chạy theo nút thời trang. Chất liệu thun cotton mềm mại, co giãn tạo sự thoáng mát khi mặc. Logo và chữ CITIZEN sử dụng công nghệ in cao được in nổi bật bên ngực áo. Form áo ôm body giúp chàng ôm dáng và khoe hình thể chuẩn. Sản phẩm mới, mang đến phong cách năng động, khỏe khoắn cho người mặc.', 'a:4:{s:1:\"s\";s:1:\"1\";s:1:\"m\";s:1:\"1\";s:1:\"l\";s:1:\"1\";s:2:\"xl\";s:1:\"1\";}', 0, '2018-01-12', '1'),
(53, 'A267', 'ÁO THUN CÁ SẤU CỔ LÃNH TỤ VÀNG AT574', 110, 22, 'upload/resize/ao-thun-ca-sau-vang-at574-6228-slide-1_thump.jpg upload/resize/ao-thun-ca-sau-vang-at574-6228-slide-2_thump.jpg upload/resize/ao-thun-ca-sau-vang-at574-6228-slide-3_thump.jpg upload/resize/ao-thun-ca-sau-vang-at574-6228-slide-4_thump.jpg', 'upload/resize/ao-thun-ca-sau-vang-at574-6228-slide-1_thump.jpg upload/resize/ao-thun-ca-sau-vang-at574-6228-slide-2_thump.jpg upload/resize/ao-thun-ca-sau-vang-at574-6228-slide-3_thump.jpg upload/resize/ao-thun-ca-sau-vang-at574-6228-slide-4_thump.jpg', 150000, 195000, 'Áo Thun Cá Sấu Cổ Lãnh Tụ Vàng AT574 màu vàng phối trắng ở tay áo tạo điểm nhấn nổi bật. Thiết kế tay ngắn, cổ lãnh tụ kèm nút, phối hàng chữ dọc chạy theo nút thời trang. Chất liệu thun cotton mềm mại, co giãn tạo sự thoáng mát khi mặc. Logo và chữ CITIZEN sử dụng công nghệ in cao được in nổi bật bên ngực áo. Form áo ôm body giúp chàng ôm dáng và khoe hình thể chuẩn, áo có nhiều size giúp bạn dễ đàng lựa chọn sản phẩm phù hợp.\r\n\r\n', 'a:3:{s:1:\"m\";s:1:\"2\";s:1:\"l\";s:1:\"1\";s:2:\"xl\";s:1:\"1\";}', 0, '2018-01-12', '1'),
(54, 'A8182', 'ÁO THUN CÁ SẤU XÁM MUỐI TIÊU AT587', 110, 22, 'upload/resize/ao-thun-ca-sau-xam-muoi-tieu-at587-6518-slide-1_thump.jpg upload/resize/ao-thun-ca-sau-xam-muoi-tieu-at587-6518-slide-2_thump.jpg upload/resize/ao-thun-ca-sau-xam-muoi-tieu-at587-6518-slide-3_thump.jpg upload/resize/ao-thun-ca-sau-xam-muoi-tieu-at587-6518-slide-4_thump.jpg upload/resize/ao-thun-ca-sau-xam-muoi-tieu-at587-6518-slide-5_thump.jpg', 'upload/resize/ao-thun-ca-sau-xam-muoi-tieu-at587-6518-slide-1_thump.jpg upload/resize/ao-thun-ca-sau-xam-muoi-tieu-at587-6518-slide-2_thump.jpg upload/resize/ao-thun-ca-sau-xam-muoi-tieu-at587-6518-slide-3_thump.jpg upload/resize/ao-thun-ca-sau-xam-muoi-tieu-at587-6518-slide-4_thump.jpg upload/resize/ao-thun-ca-sau-xam-muoi-tieu-at587-6518-slide-5_thump.jpg', 150000, 195000, 'Áo Thun Cá Sấu Xám Muối Tiêu AT587 thiết kế tay ngắn, cổ bẻ tạo sự khỏe khoắn năng động. Màu xám muối tiêu phối xanh trên vai áo cùng các đường sọc ngang trên thân áo. Họa tiết xe đạp được in cao bên ngực phải áo Chất liệu thun cá sấu mềm mại, co giãn tốt, mặc thoáng mát. Form ôm body giúp tôn dáng và body chuẩn hoàn hảo.', 'a:0:{}', 0, '2018-01-12', '1'),
(55, 'A7230', 'ÁO THUN CÁ SẤU XANH LÁ CÂY AT580', 110, 22, 'upload/resize/ao-thun-ca-sau-xanh-la-cay-at580-6344-slide-1_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at580-6344-slide-2_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at580-6344-slide-3_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at580-6344-slide-4_thump.jpg', 'upload/resize/ao-thun-ca-sau-xanh-la-cay-at580-6344-slide-1_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at580-6344-slide-2_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at580-6344-slide-3_thump.jpg upload/resize/ao-thun-ca-sau-xanh-la-cay-at580-6344-slide-4_thump.jpg', 150000, 195000, 'Áo Thun Cá Sấu Xanh Lá Cây AT580 màu xanh lá cây tươi sáng phối viền trắng ở cổ áo. Thiết kế tay ngắn, cổ lãnh tụ kèm nút gài cá tính, năng động. Chất liệu thun cá sấu mềm mại, co giãn tạo sự thoáng mát khi mặc. Logo sử dụng công nghệ in cao được in nổi bật bên ngực áo. Form áo ôm body giúp chàng ôm dáng và khoe hình thể chuẩn cho nam giới.', 'a:3:{s:1:\"m\";s:1:\"1\";s:1:\"l\";s:1:\"1\";s:2:\"xl\";s:1:\"1\";}', 0, '2018-01-12', '1'),
(56, 'A6533', 'ÁO THUN CỔ TRÒN ĐỎ ĐÔ PRADA AT540', 111, 22, 'upload/resize/ao-thun-co-tron-do-do-prada-at540-4896-slide-1_thump.jpg upload/resize/ao-thun-co-tron-do-do-prada-at540-4896-slide-2_thump.jpg upload/resize/ao-thun-co-tron-do-do-prada-at540-4896-slide-3_thump.jpg upload/resize/ao-thun-co-tron-do-do-prada-at540-4896-slide-4_thump.jpg', 'upload/resize/ao-thun-co-tron-do-do-prada-at540-4896-slide-1_thump.jpg upload/resize/ao-thun-co-tron-do-do-prada-at540-4896-slide-2_thump.jpg upload/resize/ao-thun-co-tron-do-do-prada-at540-4896-slide-3_thump.jpg upload/resize/ao-thun-co-tron-do-do-prada-at540-4896-slide-4_thump.jpg', 120000, 165000, 'Áo Thun Cổ Tròn Đỏ Đô PRADA AT540 chất liệu thun thoáng mát. Thiết kế form áo body ôm vừa, cổ tròn, tay ngắn, phối chữ và họa tiết lạ, tạo sự trẻ trung, năng động cho người mặc.\r\n\r\n', 'a:3:{s:1:\"m\";s:1:\"1\";s:1:\"l\";s:1:\"1\";s:2:\"xl\";s:1:\"1\";}', 0, '2018-01-12', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ship`
--

CREATE TABLE `tb_ship` (
  `id_ship` int(11) NOT NULL,
  `code_ship` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `status_ship` char(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_ship`
--

INSERT INTO `tb_ship` (`id_ship`, `code_ship`, `id_bill`, `id_order`, `status_ship`) VALUES
(3, '2790948', 17, 53, '2'),
(4, '6517668', 18, 54, '1'),
(5, '6517668', 19, 55, '1'),
(6, '6517668', 20, 56, '1'),
(7, '4506480', 21, 57, '1'),
(9, '4082240', 23, 62, '1'),
(10, '4082240', 24, 63, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `account_user` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `pass_user` text COLLATE utf8_unicode_ci NOT NULL,
  `name_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birthday_user` date NOT NULL,
  `cmnd_user` char(13) COLLATE utf8_unicode_ci NOT NULL,
  `address_user` text COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber_user` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `email_user` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `type_user` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `status_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `account_user`, `pass_user`, `name_user`, `birthday_user`, `cmnd_user`, `address_user`, `phonenumber_user`, `email_user`, `type_user`, `status_user`) VALUES
(7, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Lê Ngọc Tiến Thành', '1997-10-18', '362489844', '188/48B Nguyễn Văn Cừ', '01262898272', 'lengoctienthanh@gmail.com', '0', 1),
(10, 'tuankg1028', '4297f44b13955235245b2497399d7a93', 'Lê Thanh Tuấn', '1997-12-10', '123456789', 'Nguyễn Văn Cừ', '01262898272', 'lethanhtuan@gmail.com', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bill`
--
ALTER TABLE `tb_bill`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `fk_order` (`id_order`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tb_city`
--
ALTER TABLE `tb_city`
  ADD PRIMARY KEY (`id_city`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_district`
--
ALTER TABLE `tb_district`
  ADD PRIMARY KEY (`id_district`),
  ADD KEY `fk_city` (`id_city`);

--
-- Indexes for table `tb_information`
--
ALTER TABLE `tb_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_label`
--
ALTER TABLE `tb_label`
  ADD PRIMARY KEY (`id_label`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_product` (`id_product`),
  ADD KEY `fk_district_order` (`id_district`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_label` (`id_label`),
  ADD KEY `fk_category` (`id_category`);

--
-- Indexes for table `tb_ship`
--
ALTER TABLE `tb_ship`
  ADD PRIMARY KEY (`id_ship`),
  ADD KEY `fk_bill_ship` (`id_bill`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bill`
--
ALTER TABLE `tb_bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `tb_city`
--
ALTER TABLE `tb_city`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_district`
--
ALTER TABLE `tb_district`
  MODIFY `id_district` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tb_information`
--
ALTER TABLE `tb_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_label`
--
ALTER TABLE `tb_label`
  MODIFY `id_label` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tb_ship`
--
ALTER TABLE `tb_ship`
  MODIFY `id_ship` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_bill`
--
ALTER TABLE `tb_bill`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`id_order`) REFERENCES `tb_order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_district`
--
ALTER TABLE `tb_district`
  ADD CONSTRAINT `fk_city` FOREIGN KEY (`id_city`) REFERENCES `tb_city` (`id_city`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `fk_district_order` FOREIGN KEY (`id_district`) REFERENCES `tb_district` (`id_district`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`id_product`) REFERENCES `tb_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`id_category`) REFERENCES `tb_category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_label` FOREIGN KEY (`id_label`) REFERENCES `tb_label` (`id_label`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_ship`
--
ALTER TABLE `tb_ship`
  ADD CONSTRAINT `fk_bill_ship` FOREIGN KEY (`id_bill`) REFERENCES `tb_bill` (`id_bill`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
