-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 03:49 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `damme`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `level` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `level`, `created_at`, `update_at`) VALUES
(1, 'ADMIN', 'Hà Nội', 'admin@gmail.com', 'ca4911bd2c5962c7cabb028adf7f733f', '0334679170', 2, '2020-04-21 15:02:34', '2020-05-18 09:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `note` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `users_id`, `amount`, `status`, `note`, `created_at`) VALUES
(6, 1, 1522500000, 0, 'in cho tôi hoá đơn', '2020-05-30 14:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `note` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `product_id` int(11) DEFAULT NULL,
  `sosao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `users_id`, `note`, `created_at`, `product_id`, `sosao`) VALUES
(59, 1, 'sản phẩm rất tốt rất đẹp tôi rất thích', '2020-06-01 14:30:58', 28, 5),
(61, 1, 'sản phẩm rất tốt', '2020-06-02 06:44:35', 27, 5);

-- --------------------------------------------------------

--
-- Table structure for table `hangxe`
--

CREATE TABLE `hangxe` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hangxe`
--

INSERT INTO `hangxe` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'KAWASAKI', 'kawasaki', '2020-04-25 05:42:54', '2020-04-25 05:42:54'),
(2, 'HONDA', 'honda', '2020-04-25 05:42:55', '2020-04-25 05:42:55'),
(4, 'BMW', 'bmw', '2020-04-25 05:42:56', '2020-04-25 05:42:56'),
(5, 'DUCATI', 'ducati', '2020-04-25 05:42:57', '2020-04-25 05:42:57'),
(6, 'YAMAHA', 'yamaha', '2020-04-25 05:42:57', '2020-04-25 05:42:57'),
(7, 'BENELLI', 'benelli', '2020-04-25 05:42:58', '2020-04-25 05:42:58'),
(8, 'KTM', 'ktm', '2020-04-25 08:06:56', '2020-04-25 08:06:56'),
(9, 'SUZUKI', 'suzuki', '2020-04-25 05:25:43', '2020-04-25 05:25:43'),
(10, 'PHOENIX', 'phoenix', '2020-04-25 05:42:59', '2020-04-25 05:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(200) DEFAULT NULL,
  `note` text,
  `phone` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`id`, `email`, `created_at`, `name`, `note`, `phone`) VALUES
(1, 'admin@gmail.com', '2020-04-27 01:14:31', 'ADMIN', 'Tư vấn cho tôi về xe mô tô', '0334679170');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` tinyint(4) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `donhang_id`, `product_id`, `qty`, `price`, `created_at`) VALUES
(5, 5, 28, 1, 1450000000, '2020-05-19 11:11:33'),
(6, 5, 27, 1, 262000000, '2020-05-19 11:11:33'),
(7, 6, 28, 1, 1450000000, '2020-05-30 14:10:46'),
(8, 7, 27, 1, 262000000, '2020-06-09 09:49:43'),
(9, 7, 27, 1, 262000000, '2020-06-12 03:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `phankhoi`
--

CREATE TABLE `phankhoi` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updata_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `slug` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phankhoi`
--

INSERT INTO `phankhoi` (`id`, `name`, `created_at`, `updata_at`, `slug`) VALUES
(1, 'Từ 50cc đến dưới 100cc', '2020-04-22 02:44:16', '2020-04-24 05:53:39', 'tu-50cc-den-duoi-100cc'),
(5, 'Từ 100cc đến dưới 150cc', '2020-04-22 08:16:04', '2020-04-24 05:53:32', 'tu-100cc-den-duoi-150cc'),
(6, 'Từ 150cc đến dưới 200cc ', '2020-04-22 08:16:10', '2020-04-24 05:53:25', 'tu-150cc-den-duoi-200cc'),
(10, 'Từ 300cc đến dưới 400cc', '2020-04-22 08:16:45', '2020-04-24 05:53:17', 'tu-300cc-den-duoi-400cc'),
(13, 'Từ 500cc đến dưới 600cc', '2020-04-22 08:17:12', '2020-04-24 05:53:08', 'tu-500cc-den-duoi-600cc'),
(22, 'Từ 200cc đến dưới 300cc', '2020-04-23 01:01:18', '2020-04-24 05:53:01', 'tu-200cc-den-duoi-300cc'),
(23, 'Từ 400cc đến dưới 500cc', '2020-04-23 01:01:55', '2020-04-24 05:52:53', 'tu-400cc-den-duoi-500cc'),
(24, 'Từ 600cc đến dưới 700cc', '2020-04-23 01:02:11', '2020-04-24 05:52:45', 'tu-600cc-den-duoi-700cc'),
(25, 'Từ 700cc đến dưới 800cc', '2020-04-23 01:04:53', '2020-04-24 05:52:35', 'tu-700cc-den-duoi-800cc'),
(26, 'Từ 800cc đến dưới 900cc', '2020-04-23 01:05:51', '2020-04-24 05:52:24', 'tu-800cc-den-duoi-900cc'),
(27, 'Từ 900cc đến dưới 1000cc', '2020-04-23 01:06:04', '2020-04-24 05:52:12', 'tu-900cc-den-duoi-1000cc'),
(28, 'Trên 1000cc', '2020-04-23 01:06:13', NULL, 'tren-1000cc');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT '0',
  `thunbar` varchar(200) DEFAULT NULL,
  `hangxe_id` int(11) DEFAULT NULL,
  `content` text,
  `number` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `theloai_id` int(11) DEFAULT NULL,
  `phankhoi_id` int(11) DEFAULT NULL,
  `anh2` varchar(200) DEFAULT NULL,
  `anh1` varchar(200) DEFAULT NULL,
  `anh3` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `thunbar`, `hangxe_id`, `content`, `number`, `created_at`, `update_at`, `theloai_id`, `phankhoi_id`, `anh2`, `anh1`, `anh3`) VALUES
(1, 'CB300R', 'cb300r', 140000000, 0, 'CB300R.png', 2, 'Khối lượng bản thân: 145 kg<br>\r\nDài x Rộng x Cao: 2.020 x 805 x 1.050 (mm)<br>\r\nKhoảng cách trục bánh xe: 1.355 mm<br>\r\nĐộ cao yên: 800 mm<br>\r\nKhoảng sáng gầm xe: 150 mm<br>\r\nDung tích bình xăng: 10,1 lít<br>\r\nKích cỡ lớp trước/ sau: Trước: 110/70R17M/C 54H ... Sau: 150/60R17M/C 66H<br>\r\nLoại động cơ: PGM-FI, DOHC, 4 kỳ, 1 xy lanh, làm mát bằng dung dịch<br>\r\nDung tích xy-lanh: 286 cm3<br>\r\nĐường kính x Hành trình pít tông: 76 x 63 mm<br>\r\nTỷ số nén: 10,7 : 1<br>\r\nCông suất tối đa: 22,8kW / 8.500 vòng/phút<br>\r\nMomen cực đại: 27,5Nm / 6.500 vòng/phút<br>\r\nDung tích nhớt máy: Sau khi xả: 1,4 lít  ...  Sau khi xả và thay lọc dầu: 1,5 lít ...  Sau khi rã máy: 1,8 lít<br>\r\nLoại truyền động: Côn tay 6 số<br>\r\nMức tiêu thụ nhiên liệu (l/100Km): 3.1<br>\r\nHệ thống khởi động: Điện<br>\r\nGóc nghiêng phuộc trước: 24º44\' <br>\r\nChiều dài vết quét: 93 mm<br>', 1000, '2020-04-22 08:37:52', '2020-05-28 14:59:01', 1, 10, 'honda cb 300r 10 02.jpg', 'Honda_CB300R_18_04.jpg', '07-1510034553-honda-cb300r-revealed-at-eicma-4.jpg'),
(2, 'CB650R', 'cb650r', 245990000, 0, 'CB650R.png', 2, 'Khối lượng bản thân: 202 kg<br>\r\nDài x Rộng x Cao: 2.130 mm x 780 mm x 1.075 mm<br>\r\nKhoảng cách trục bánh xe: 1.450 mm<br>\r\nĐộ cao yên: 810 mm<br>\r\nKhoảng sáng gầm xe: 150 mm<br>\r\nDung tích bình xăng: 15,4 lít<br>\r\nKích cỡ lớp trước/ sau: Trước: 120/70ZR17 M/C -- Sau: 180/55ZR17 M/C<br>\r\nPhuộc trước: Giảm xóc hành trình ngược Showa SFF, 41mm<br>\r\nPhuộc sau: Lò xo trụ đơn với tải trước có 10 cấp điều chỉnh<br>\r\nLoại động cơ: Động cơ 4 xi lanh, 4 kỳ làm mát bằng chất lỏng, 16 van DOHC<br>\r\nPhanh trước: Đĩa thuỷ lực kép, đĩa phanh 310mm, 4 pít-tông, trang bị ABS<br>\r\nPhanh sau: Đĩa thuỷ lực đơn, đĩa phanh 240mm, 1 pít-tông, trang bị ABS<br>\r\nDung tích xy-lanh: 649 cm3<br>\r\nĐường kính x Hành trình pít tông: 67 x 46 mm<br>\r\nTỷ số nén: 11,6 : 1<br>\r\nCông suất tối đa: 70,0 kW / 12.000 vòng/phút<br>\r\nMomen cực đại: 64 Nm / 8.500 vòng/phút<br>\r\nDung tích nhớt máy: 2,3 lít khi thay nhớt  --  2,6 lít khi thay nhớt và bộ lọc  --  3,0 lít khi rã máy<br>\r\nLoại truyền động: Côn tay 6 số<br>\r\nMức tiêu thụ nhiên liệu (l/100Km): 4.9<br>\r\nHệ thống khởi động: Điện<br>\r\nGóc nghiêng phuộc trước: 25º 30\'<br>\r\nChiều dài vết quét: 101 mm<br>', 1000, '2020-04-22 09:06:19', '2020-05-29 07:31:33', 1, 24, 'CB650R1.jfif', 'CB650R2.jpg', 'CB650R3.jfif'),
(4, 'MONKEY', 'monkey', 84990000, 0, 'monkey.png', 2, 'Khối lượng bản thân: 101,3 kg<br>\r\nDài x Rộng x Cao: 1.710 x 755 x 1.030 mm<br>\r\nKhoảng cách trục bánh xe: 1.151 mm<br>\r\nĐộ cao yên: 776 mm<br>\r\nKhoảng sáng gầm xe: 162 mm<br>\r\nDung tích bình xăng: 5,6 lít<br>\r\nKích cỡ lớp trước/ sau: Trước: 120/80-12 65J.....Sau: 130/80-12 69J<br>\r\nLoại động cơ: PGM-FI, SOHC 4 kỳ, 1 xy lanh,làm mát bằng không khí<br>\r\nTỷ số nén: 9,3:1<br>\r\nCông suất tối đa: 6,66kw @7000 vòng/phút<br>\r\nMomen cực đại: 10,5 Nm @5500 vòng/phút<br>\r\nDung tích nhớt máy: 1,1 lít khi rã máy/ 0,9 lít khi xả<br>\r\nMức tiêu hao nhiên liệu (l/100km): 1.55<br>\r\nLoại truyền động: 4 số<br>\r\nHệ thống khởi động: Điện', 1000, '2020-04-22 09:48:20', '2020-05-29 07:34:47', 8, 5, 'honda_monkey_1.jfif', 'honda_monkey_2.jpg', 'honda_monkey_3.jfif'),
(5, 'Wave RSX FI 110cc', 'wave-rsx-fi-110cc', 21690000, 0, 'Wave RSX FI 110cc.png', 2, 'Khối lượng bản thân: 98 kg (Vành nan hoa phanh tang trống)....99 kg (Phanh đĩa trước)<br>\r\nDài x Rộng x Cao: 1.921 mm x 709 mm x 1.081 mm<br>\r\nKhoảng cách trục bánh xe: 1.227 mm<br>\r\nĐộ cao yên: 760 mm<br>\r\nKhoảng sáng gầm xe: 135 mm<br>\r\nDung tích bình xăng: 4,1 lít<br>\r\nKích cỡ lớp trước/ sau: Trước: 70/90-17M/C 38P.....Sau: 80/90-17M/C 50P<br>\r\nPhuộc trước: Ống lồng, giảm chấn thủy lực<br>\r\nPhuộc sau: Lò xo trụ, giảm chấn thủy lực<br>\r\nLoại động cơ: Xăng, 4 kỳ, 1 xi-lanh, làm mát bằng không khí<br>\r\nDung tích xy-lanh: 109,2 cm3<br>\r\nĐường kính x hành trình pít-tông: 50 mm x 55,6 mm<br>\r\nTỷ số nén: 9,3:1<br>\r\nCông suất tối đa: 6,46 kW / 7.500 vòng/phút<br>\r\nMô-men cực đại: 8,70 Nm/6.000 vòng/phút<br>\r\nDung tích nhớt máy: 1 lít khi rã máy/ 0,8 lít khi thay nhớt<br>\r\nMức tiêu thụ nhiên liệu (l/100km): 1.70<br>\r\nHộp số: Cơ khí, 4 số tròn<br>\r\nHệ thống khởi động: Điện/ Đạp chân<br>\r\nGóc nghiêng phuộc trước: 26o 30\'<br>\r\nChiều dài vết quét: 68 mm', 1000, '2020-04-23 02:31:13', '2020-05-29 07:37:03', 7, 5, 'Wave RSX FI 110cc 1.jpg', 'Wave RSX FI 110cc 2.png', 'Wave RSX FI 110cc 3.png'),
(7, 'Blade 110cc bản thể thao', 'blade-110cc-ban-the-thao', 18800000, 0, 'blade-110cc.png', 2, 'hối lượng bản thân:  Phiên bản thể thao: 99kg<br>\r\nDài x Rộng x Cao: 1.920 x 702 x 1.075 mm<br>\r\nKhoảng cách trục bánh xe: 1.217 mm<br>\r\nĐộ cao yên: 769 mm<br>\r\nKhoảng sáng gầm xe: 141 mm<br>\r\nDung tích bình xăng: 3,7 lít<br>\r\nKích cỡ lớp trước/ sau: Trước: 70/90 -17 M/C 38P.....Sau: 80/90 - 17 M/C 50P<br>\r\nPhuộc trước: Ống lồng, giảm chấn thủy lực<br>\r\nPhuộc sau:  Lò xo trụ, giảm chấn thủy lực<br>\r\nLoại động cơ: Xăng, 4 kỳ, 1 xi-lanh, làm mát bằng không khí<br>\r\nDung tích xy-lanh: 109,1 cm3<br>\r\nĐường kính x hành trình pít-tông: 50,0 mm x 55,6 mm<br>\r\nTỷ số nén: 9,0:1<br>\r\nCông suất tối đa: 6,18 kW/7.500 vòng/phút<br>\r\nMô-men cực đại: 8,65 Nm/5.500 vòng/phút<br>\r\nDung tích nhớt máy: 1 lít khi rã máy/ 0,8 lít khi thay nhớt<br>\r\nMức tiêu thụ nhiên liệu (l/100km): 1.60<br>\r\nHộp số: Cơ khí, 4 số tròn<br>\r\nHệ thống khởi động: Điện', 1000, '2020-04-23 09:06:38', '2020-05-29 07:40:31', 9, 5, 'Blade 110cc bản thể thao 1.jpg', 'Blade 110cc bản thể thao 2.jpg', 'Blade 110cc bản thể thao 3.jpg'),
(9, 'SUPER CUP C125', 'super-cup-c125', 85990000, 0, 'cub.png', 2, 'Khối lượng bản thân: \r\n108 kg<br>\r\nDài x Rộng x Cao: \r\n1.910 x 718 x 1.002 mm<br>\r\nKhoảng cách trục bánh xe: \r\n1.243 mm<br>\r\nĐộ cao yên: \r\n780 mm<br>\r\nKhoảng sáng gầm xe: \r\n136 mm<br>\r\nDung tích bình xăng: \r\n3,7 lít<br>\r\nKích cỡ lớp trước/ sau: \r\nTrước: 70/90-17M/C 38P.....\r\nSau: 80/90-17M/C 50P<br>\r\nLoại động cơ: \r\nPGM-FI, SOHC 4 kỳ, 1 xy lanh,làm mát bằng không khí<br>\r\nĐường kính x hành trình pít-tông: \r\n52,4 x 57,9 mm<br>\r\nTỷ số nén: \r\n9,3:1<br>\r\nCông suất tối đa: \r\n6,76kw @7.500 vòng/phút<br>\r\nMomen cực đại: \r\n9,96 Nm @5500 vòng/phút<br>\r\nDung tích nhớt máy: \r\n1,0 lít khi rã máy/ 0,8 lít khi xả<br>\r\nMức tiêu hao nhiên liệu (l/100km): \r\n1.73<br>\r\nLoại truyền động: \r\n4 số', 1000, '2020-04-24 12:00:39', '2020-05-29 07:42:20', 7, 5, 'SUPER CUP C125 1.jfif', 'SUPER CUP C125 2.jfif', 'SUPER CUP C125 3.jfif'),
(13, 'Air Blade 125cc', 'air-blade-125cc', 56390000, 0, 'air-blade-125cc.png', 2, 'Khối lượng bản thân\r\nAir Blade 125cc: 111kg //\r\nAir Blade 150cc: 113kg<br>\r\nDài x Rộng x Cao\r\nAir Blade 125cc: 1.870mm x 687mm x 1.091mm //\r\nAir Blade 150cc: 1.870mm x 686mm x 1.112mm<br>\r\nKhoảng cách trục bánh xe\r\n1.286 mm<br>\r\nĐộ cao yên\r\nAir Blade 125cc: 774mm // \r\nAir Blade 150cc: 775mm<br>\r\nKhoảng sáng gầm xe\r\n125 mm<br>\r\nDung tích bình xăng\r\n4,4 lít<br>\r\nKích cỡ lớp trước/ sau:<br>\r\nAir Blade 125cc:\r\nTrước: 80/90-14M/C 40P - Không săm // \r\nSau: 90/90-14M/C 46P - Không săm<br>\r\nAir Blade 150cc:\r\nTrước: 90/80-14M/C 43P - Không săm // \r\nSau : 100/80 -14M/C 48P - Không săm<br>\r\nPhuộc trước\r\nỐng lồng, giảm chấn thủy lực<br>\r\nPhuộc sau\r\nLò xo trụ, giảm chấn thủy lực<br>\r\nLoại động cơ\r\nXăng, 4 kỳ, 1 xy lanh, làm mát bằng dung dịch<br>\r\nDung tích xy-lanh: <br>\r\nAir Blade 125cc: 124,9cm3 // \r\nAir Blade 150cc: 149,3cm3<br>\r\nĐường kính x hành trình pít-tông: <br>\r\nAir Blade 125cc: 52,4mm x 57,9mm // \r\nAir Blade 150cc: 57,3mm x 57,9mm<br> \r\nTỷ số nén: <br>\r\nAir Blade 125cc: 11,0:1 // \r\nAir Blade 150cc: 10,6:1<br>\r\nCông suất tối đa: \r\nAir Blade 125cc: 8,4kW/8.500 vòng/phút // \r\nAir Blade 150cc: 9,6kW/8.500 vòng/phút <br>\r\nMô-men cực đại: <br>\r\nAir Blade 125cc: 11,68 N.m/5.000 vòng/phút //\r\nAir Blade 150cc: 13,3 N.m/5.000 vòng/phút <br>\r\nDung tích nhớt máy: \r\n0,8 lít khi thay dầu //\r\n0,9 lít khi rã máy<br>\r\nMức tiêu thụ nhiên liệu (l/100km): <br>\r\nAir Blade 125cc: 1,99 lít/100km //\r\nAir Blade 150cc: 2,17 lít/100km <br>\r\nLoại truyền động: \r\nCơ khí, truyền động bằng đai<br>\r\nHệ thống khởi động:\r\nĐiện', 1000, '2020-04-24 12:28:23', '2020-05-29 07:44:18', 2, 5, 'Air Blade 125cc 1.jfif', 'Air Blade 125cc 2.jpg', 'Air Blade 125cc 3.jpg'),
(14, 'LEAD 125cc', 'lead-125cc', 37490000, 0, 'lead-125cc.png', 2, 'Khối lượng bản thân\r\n113 kg<br>\r\nDài x Rộng x Cao\r\n1.842mm x 680mm x 1.130mm<br>\r\nKhoảng cách trục bánh xe\r\n1.273 mm<br>\r\nĐộ cao yên\r\n760 mm<br>\r\nKhoảng sáng gầm xe\r\n120 mm<br>\r\nDung tích bình xăng\r\n6,0 lít<br>\r\nKích cỡ lớp trước/ sau\r\nTrước: 90/90-12 44J - 175kPa // \r\nSau: 100/90-10 56J - 250kPa<br>\r\nPhuộc trước\r\nỐng lồng, giảm chấn thủy lực<br>\r\nPhuộc sau\r\nLò xo trụ, giảm chấn thủy lực<br>\r\nLoại động cơ\r\nPGM-FI, Xăng, 4 kỳ, 1 xi-lanh,làm mát bằng dung dịch<br>\r\nDung tích xy-lanh\r\n124,8 cm3<br>\r\nĐường kính x hành trình pít-tông\r\n52,4 mm x 57,9 mm<br>\r\nTỷ số nén\r\n11:1<br>\r\nCông suất tối đa\r\n7,90 kW/7500 vòng/phút<br>\r\nMô-men cực đại\r\n11,4 N.m/5500 vòng/phút<br>\r\nDung tích nhớt máy\r\n0,8 lít khi thay nhớt/ 0,9 lít khi rã máy<br>\r\nMức tiêu thụ nhiên liệu (l/100km)\r\n2.02<br>\r\nLoại truyền động\r\nVô cấp, điều khiển tự động<br>\r\nHệ thống khởi động\r\nĐiện', 1000, '2020-04-24 12:30:21', '2020-05-29 07:47:20', 2, 5, 'LEAD 125cc 1.jpg', 'LEAD 125cc 2.jfif', 'LEAD 125cc 3.png'),
(16, 'SH 125cc/150cc', 'sh-125cc150cc', 70990000, 0, 'sh-125cc-150cc.png', 2, 'Khối lượng bản thân<br>\r\nSH125i/150i CBS: 133kg // \r\nSH125i/150i ABS: 134kg<br>\r\nDài x Rộng x Cao\r\n2.090mm x 739mm x 1.129mm <br>\r\nKhoảng cách trục bánh xe\r\n1.353 mm<br>\r\nĐộ cao yên\r\n799 mm<br>\r\nKhoảng sáng gầm xe\r\n146 mm<br>\r\nDung tích bình xăng\r\n7,8 lít<br>\r\nKích cỡ lớp trước/ sau\r\nTrước: 100/80 - 16 M/C 50P // \r\nSau: 120/80 - 16 M/C 60P<br>\r\nPhuộc trước\r\nỐng lồng, giảm chấn thủy lực<br>\r\nPhuộc sau\r\nLò xo trụ, giảm chấn thủy lực<br>\r\nLoại động cơ\r\nPGM-FI, xăng, 4 kỳ, 1 xy-lanh, làm mát bằng dung dịch<br>\r\nDung tích xy-lanh<br>\r\n124,8cm³ (SH 125i) // \r\n156,9cm³ (SH 150i)<br>\r\nĐường kính x hành trình pít-tông<br>\r\n53,5mm x 55,5mm (SH 125i) // \r\n60,0mm x 55,5mm (SH 150i)<br>\r\nTỷ số nén<br>\r\n11,5:1 (SH 125i) // \r\n12,0:1 (SH 150i)<br>\r\nCông suất tối đa<br>\r\n9,6kW/8.250 vòng/phút (SH 125i) // \r\n12,4kW/8.500 vòng/phút (SH 150i)<br>\r\nMô-men cực đại<br>\r\n12N.m/6.500 vòng/phút (SH 125i) // \r\n14,8N.m/6.500 vòng/phút (SH 150i)<br>\r\nDung tích nhớt máy:\r\n0,9 lít khi rã máy //\r\n0,8 lít khi thay nhớt<br>\r\nMức tiêu thụ nhiên liệu (l/100km): \r\nSH125i: 2.46 //\r\nSH150i: 2.24<br> \r\nHộp số\r\nVô cấp, điều khiển tự động<br>\r\nHệ thống khởi động\r\nĐiện', 1000, '2020-04-24 12:43:02', '2020-05-29 07:51:27', 2, 5, 'SH 150cc 1.jpg', 'SH 150cc 2.jpg', 'SH 150cc 3.jpg'),
(17, 'SH 300cc', 'sh-300cc', 276490000, 0, 'sh-300cc.png', 2, 'Khối lượng bản thân\r\n169 kg<br>\r\nDài x Rộng x Cao\r\n2.130 mm x 730 mm x 1.195 mm<br>\r\nKhoảng cách trục bánh xe\r\n1.440 mm<br>\r\nĐộ cao yên\r\n805 mm<br>\r\nKhoảng sáng gầm xe\r\n130 mm<br>\r\nDung tích bình xăng\r\n9,1 lít<br>\r\nKích cỡ lớp trước/ sau\r\nTrước: 110/70-16 M/C .....\r\nSau: 130/70R16 M/C<br>\r\nLoại động cơ\r\nSOHC, 4 kỳ, xy-lanh đơn 4 van, làm mát bằng chất lỏng; đáp ứng tiêu chuẩn khí thải Euro 4<br>\r\nDung tích xy-lanh\r\n279 cm3<br>\r\nĐường kính x hành trình pít-tông\r\n72,0 mm x 68,6 mm<br>\r\nTỷ số nén\r\n10,5 : 1<br>\r\nCông suất tối đa\r\n18,5kW/7.500 vòng/phút<br>\r\nMô-men cực đại\r\n25,5Nm/5.000 vòng/phút<br>\r\nDung tích nhớt máy:\r\nSau khi xả: 1,2 lít  //\r\nSau khi xả và vệ sinh lướilọc: 1,4 lít  // \r\nSau khi rã máy: 1,7 lít<br>\r\nLoại truyền động:\r\nBiến thiên vô cấp', 1000, '2020-04-24 12:44:57', '2020-05-29 07:53:42', 2, 10, 'SH 300cc 1.jfif', 'SH 300cc 2.jfif', 'SH 300cc 3.png'),
(19, 'Phoenix-Premium-Sport', 'phoenix-premium-sport', 64990000, 0, 'Phoenix-R125-Premium-Sport.jpg', 10, 'Về ngoại hình, Phoenix R125 mới được cung cấp với 3 phiên bản khác nhau, bao gồm tiêu chuẩn, Premium Sport và Art Edition. Phiên bản tiêu chuẩn sở hữu bộ tem xe thể thao, thời trang, kết hợp các tông màu trắng - đỏ, xanh - đen, vàng - đen và trắng - xanh. Trong khi đó, phiên bản Premium Sport và Art Edition được thiết kế theo cảm hứng từ các loài rắn trong truyền thuyết, rất trẻ trung và thời trang.<br>\r\n\r\nTrọng lượng của xe lần lượt là 142 kg cho phiên bản tiêu chuẩn, bản Premium Sport là 145 kg. Chỉ có dòng Art Edition mới có trọng lượng 138 kg, do có một số chi tiết được thay thế bằng hợp kim nhôm.<br>\r\n\r\nNgoài những thay đổi ở kiểu dáng, tất cả các phiên bản Phoenix R125 2013 đều được trang bị động cơ xi-lanh đơn thay vì có thêm tùy chọn xi-lanh đôi như trước đây. Phiên bản tiêu chuẩn và Premium Sport đều sử dụng động cơ có chế độ cân bằng (balance engine), giúp giảm chấn động và giảm thiểu độ rung đến 90% so với thế hệ động cơ thường trước đây.<br>\r\n\r\nCung cấp sức mạnh cho xe là khối động cơ 124cc làm mát bằng gió, tuy nhiên công suất của các phiên bản lại khác nhau. Trong khi bản tiêu chuẩn có thể đạt công suất tối đa 11,5 mã lực tại 7.500 vòng/phút, thì bản Premium Sport có thể đạt công suất 14,8 mã lực tại 7.800 vòng/phút. Cả hai phiên bản này đều sử dụng hệ truyền động thể thao côn tay với 5 cấp truyền động và 2 bước số.<br>\r\n\r\nXe được trang bị khá nhiều đồ chơi “hàng hiệu”. Đồng hồ công-tơ-mét mới 6 trong 1 với đèn nền đồng hồ màu đỏ úa đúng theo phong cách xe thể thao châu Âu, giúp người lái dễ dàng quan sát các thông số tua máy, tốc độ, điện ắc-quy, thời gian, xăng...', 100, '2020-05-08 04:24:38', '2020-05-29 07:58:07', 1, 5, 'Phoenix-Premium-Sport 1.jfif', 'Phoenix-Premium-Sport 2.jpg', 'Phoenix-Premium-Sport 3.jfif'),
(20, 'KTM 1190 RC8R', 'ktm-1190-rc8r', 590000000, 0, 'KTM 1190 RC8R.jpg', 8, 'KTM 1190 RC8R là mẫu superbike với động cơ thừa hưởng công nghệ từ xe đua khiến người lái luôn có cảm giác cầm cương một chiến mã thật thụ trên đường đua.<br>\r\nRC8 xuất hiện lần đầu 2008 với phiên bản động cơ V-Twin dung tích 1.140 phân khối. Sau đó một năm, phiên bản racing KTM 1190 RC8R với động cơ 1.195 phân khối được giới thiệu.<br>\r\nĐộng cơ 173 mã lực và giảm sóc làm việc hiệu quả là hai yếu tố lôi cuốn. Trong phố hiếm khi chuyển qua tới số 4, nhưng KTM 1190 RC8R hoạt động ổn định. Với chế độ chạy Road, KTM 1190 RC8R không rung giật tại số 2 và dưới 30km/h.<br><br>\r\n\r\nNếu từng cầm lái một chiếc superbike Nhật Bản, sự khác biệt hiện rõ khi ngồi lên RC8R, nhẹ nhàng và dễ điều khiển. KTM 1190 RC8R chỉ có trọng lượng 184 kg, chiều cao yên 805mm giúp cho người cao 1,7 m đã dễ điều khiển. Tay lái cao, yên gắn lên khung bằng bộ khung phụ nhôm. Yên phụ sau cao hơn hẳn so với người lái.<br>\r\nChiều cao yên 805mm giúp cho người cao 1,7 m đã dễ điều khiển, tay lái cao, yên gắn lên khung bằng bộ khung phụ nhôm.<br>\r\nGiảm sóc WP độc quyền của KTM tạo sự cân bằng và chắc chắn khi cua với kiểu trụ đơn phía sau. Trợ lực tay lái trang bị sẵn.<br>\r\nĐèn xinhanh được tích hợp vào đèn hậu trông xe gọn gàng hơn các mẫu xe khác cùng phân khúc.<br><br><br>\r\n\r\nLoại động cơ : 2-cylinder, 4-stroke, spark-ignition engine, 75° V arrangement, liquid-cooled<br>\r\nDung tích xy-lanh : 1,195 cm³<br>\r\nCông suất tối đa : 129 kW (173 hp)<br>\r\nPhanh trước/sau: 320 mm, Phanh đĩa đôi, bốn piston;220 mm, Phanh đĩa đơn với hai piston<br>	\r\nKhoảng cách trục bánh xe : 1425 mm<br>\r\nĐường kính x hành trình pít tông : 69 mm x 105 mm<br>	\r\nDung tích bình xăng : 16.5 lít<br>\r\nHệ thống khởi động : Điện<br>	\r\nPhuộc sau : WP Suspension Monoshock', 100, '2020-05-08 04:46:54', '2020-05-29 08:01:48', 1, 28, 'KTM 1190 RC8R 1.jfif', 'KTM 1190 RC8R 5.jfif', 'KTM 1190 RC8R 3.jpg'),
(21, 'BENELLI 302R', 'benelli-302r', 108800000, 0, 'BENELLI 302R.jpg', 7, 'Dài x Rộng x Cao : 2.150mm * 745mm * 1.115mm<br>	\r\nHộp số : 6 Cấp<br>\r\nDung tích xy-lanh : 300c<br>	\r\nLoại động cơ : 2 xylanh thẳng hàng , 4 thì làm mát bằng chất lỏng, 4 van/xylanh, cam đôi DOHC, EFI<br>\r\nĐộ cao yên : 790 mm<br>	\r\nCỡ lốp trước/sau : 110/70-ZR17 150/60/17-ZR17<br>\r\nCông suất tối đa : 28kW @ 11000rpm (38hp)<br>	\r\nDung tích bình xăng : 14 Lít<br>\r\nTỷ số nén : 12:1<br>	\r\nPhuộc trước : Upsite-Down 41mm<br>', 100, '2020-05-08 04:55:06', '2020-05-29 08:04:02', 1, 10, 'BENELLI 302R 1.jfif', 'BENELLI 302R 2.jpg', 'BENELLI 302R 3.jpg'),
(22, 'GSX R150', 'gsx-r150', 74990000, 0, 'GSX R150.png', 9, 'Dài x Rộng x Cao : 2.020 x 700 x 1.075 mm<br>	\r\nĐộ cao yên : 785 mm<br>\r\nCỡ lốp trước/sau : 90/80-17M/C 46P trước, 130/70-17M/C 62P sau<br>	\r\nLoại động cơ : DOHC, 4 thì, làm mát bằng dung dịch<br>\r\nDung tích xy-lanh : 147,3 cm3<br>	\r\nCông suất tối đa : 14,1 kW / 10,500 vòng / phút<br>\r\nDung tích nhớt máy : 1,3 lít<br>	\r\nHộp số : 6 cấp số, côn tay<br>\r\nHệ thống cung cấp nhiên liệu: Phun xăng điện tử FI<br>	\r\nPhanh trước/sau: Đĩa;Đĩa', 100, '2020-05-08 05:01:27', NULL, 1, 6, 'GSX R1501.jpg', 'GSX R1502.jpg', 'GSX R1503.jpg'),
(23, 'YAMAHA YZF-R6', 'yamaha-yzf-r6', 550990000, 0, 'YZF-R6.jpg', 6, 'Động cơ 4 xi-lanh DOHC làm mát bằng chất lỏng, dung tích 599cc; 16 van titan<br>\r\nĐường kính x hành trình piston\r\n67,0mm x 42,5mm<br>\r\nTỷ lệ nén\r\n13,1: 1<br>\r\nGiao nhiên liệu\r\nPhun nhiên liệu với YCC-T và YCC-I<br>\r\nĐánh lửa\r\nTCI: Đánh lửa điều khiển bằng bóng bán dẫn<br>\r\nQuá trình lây truyền\r\n6 tốc độ; nhân đôi ly hợp<br>\r\nỔ đĩa cuối cùng\r\nChuỗi<br>\r\n\r\nĐình chỉ / Mặt trận\r\nPhuộc ngược KYB® 43mm, điều chỉnh 3 hướng; Du lịch 4,7-in<br>\r\nĐình chỉ / phía sau\r\nGiảm xóc heo KYB®, điều chỉnh 4 hướng; Du lịch 4,7-in<br>\r\nPhanh / Mặt trước\r\nĐĩa thủy lực kép 320mm; ABS<br>\r\nPhanh / Phía sau\r\nĐĩa thủy lực 220mm; ABS<br>\r\nLốp / Mặt trận\r\n120 / 70ZR17<br>\r\nLốp / Phía sau\r\n180 / 55ZR17<br>\r\n\r\n\r\nL x W x H\r\n80,3 trong x 27,4 trong x 45,3 trong<br>\r\nChiều cao ghế ngồi\r\n33,5 trong<br>\r\nChiều dài cơ sở\r\n54,1 trong<br>\r\nCào (Góc Caster)\r\n24,0 °<br>\r\nĐường mòn\r\n3,8 trong<br>\r\nGiải phóng mặt bằng tối đa\r\n5,1 trong<br>\r\nLượng nhiên liệu\r\n4,6 gal<br>\r\nTiết kiệm nhiên liệu **\r\n42 mpg<br>\r\nTrọng lượng ướt ***\r\n419 lb<br>\r\n\r\n', 1000, '2020-05-08 05:10:50', NULL, 1, 13, 'YZF-R61.jpg', 'YZF-R62.jpg', 'YZF-R63.jpg'),
(24, 'DUCATI 1299 PANIGALE', 'ducati-1299-panigale', 1200000000, 0, 'DUCATI 1299 PANIGALE.jpg', 5, 'Loại động cơ : Superquadro L-Twin, 4 Desmodromically actuated valves per cylinder, liquid cooled<br>\r\nCỡ lốp trước/sau : 120/70 ZR17 Pirelli Diablo Supercorsa SP / 200/55 ZR17 Pirelli Diablo Supercorsa SP<br>\r\nCông suất tối đa : 150,8 kW (205 hp) @ 10,500 rpm	<br>\r\nDài x Rộng x Cao : 2075 x 810 x 1100 (mm)<br>\r\nHộp số : 6 Cấp	<br>\r\nDung tích xy-lanh : 1285cc<br>\r\nĐộ cao yên : 825mm	<br>\r\nPhuộc trước : USD fork 50 mm<br>\r\nTrọng lượng bản thân : 166.5 Kg	<br>\r\nMô men cực đại : 144,6 Nm (106.7 lb-ft) @ 8,750 rpm', 100, '2020-05-08 05:17:37', '2020-05-29 08:05:40', 1, 28, 'DUCATI 1299 PANIGALE3.jpg', 'DUCATI 1299 PANIGALE1.jpeg', 'DUCATI 1299 PANIGALE 4.jfif'),
(25, 'BMW S1000RR 2020', 'bmw-s1000rr-2020', 950000000, 0, 'S1000RR 20201.jpg', 4, 'Dài x Rộng x Cao : 2073mm x 848mm x 1151mm	<br>\r\nĐộ cao yên : 824 mm<br>\r\nCỡ lốp trước/sau : 120/70 ZR 17 ; 190/55 ZR 17	<br>\r\nLoại động cơ : BMW ShiftCam 4 thì, 4 xilanh, dung tích 999cc<br>\r\nDung tích xy-lanh : 999 cc	<br>\r\nCông suất tối đa : 207 mã lực tại 13.500 vòng/phút<br>\r\nHộp số : 6 cấp	<br>\r\nHệ thống cung cấp nhiên liệu: Phun xăng điện tử<br>\r\nPhanh trước/sau: Twin disc brake, floating brake calipers, 4-piston fixed caliper, diameter 320 mm ;Single disc brake, single piston floating caliper, diameter 220 mm', 100, '2020-05-08 05:26:49', NULL, 1, 28, 'S1000RR 2020.jpg', 'S1000RR 20202.jpg', 'S1000RR 20203.jpg'),
(26, 'CBR 1000RR SP2', 'cbr-1000rr-sp2', 790000000, 0, 'cbr1000rr-sp.jpg', 2, 'ĐỘNG CƠ<br><br>\r\nĐộng cơ4 xi lanh thẳng hàng, 16 van (DOHC) làm mát bằng chất lỏng, Euro4<br>\r\nDung tích xi lanh 1000 cc<br>\r\nĐường kính x hành trình piston 76 x 55 mm<br>\r\nTỷ lệ nén13:1<br>\r\nCông suất cực đại NĐ<br>\r\nMô-men xoắn cực đại NĐ<br>\r\nHệ thống nhiên liệu Thiết bị phun nhiên liệu điều khiển điện tử PGM-DSFI<br>\r\nĐánh lửa Đánh lửa điện<br>\r\nTruyền tải 6 tốc độ, trở lại ca<br>\r\nỔ đĩa cuối cùng Chuỗi kín<br><br><br>\r\nHIỆU SUẤT<br><br>\r\nHệ thống treo trước / bánh Öhlins loại ngã ba lộn ngược 43 mm NIX30 với Điều khiển điện tử bán chủ động (S-EC) để tải trước, điều chỉnh nén và mở rộng, hành trình 120 mm<br>\r\nHệ thống treo sau / bánh Öhlins TTX36 với kiến ​​trúc Pro-Link và Semi-Active Electronic Control (S-EC) để điều chỉnh tải trước, nén, mở rộng, hành trình 60 mm\r\nLốp trước 120 / 70ZR17 58W<br>\r\nLốp sau 190 / 50ZR17 73W<br>\r\nPhanh trước Đĩa Đĩa đôi 320 x 4,5 mm với bộ cân bằng 4 piston Brembo và miếng đệm đặc biệt, ABS<br>\r\nPhanh sau Đĩa 220 x 5 mm với caliper piston đơn và miếng đệm kim loại thiêu kết, ABS<br><br><br>\r\nCHI TIẾT<br><br>\r\nLoại khung Một viên kim cương; với dầm nhôm đôi<br>\r\nTreo khung 23 ° 30 \' mm<br>\r\nTổng chiều dài 2.065 mm<br>\r\nChiều rộng tổng thể 715 mm<br>\r\nChiều cao tổng thể 1.125 mm<br>\r\nÁnh sáng gầm 129 mm<br>\r\nChiều cao yên ngồi 820 mm<br>\r\nKhối lượng khô NĐ<br>\r\nLượng nhiên liệu 16 lít<br>\r\nChiều dài cơ sở 1.404 mm mm<br>\r\nLựa chọn màu sắc Đỏ Grand Fix<br>', 100, '2020-05-08 05:34:13', NULL, 1, 28, 'cbr1000rr-sp3.jpg', 'cbr1000rr-sp1.jpg', 'cbr1000rr-sp2.jpg'),
(27, 'CBR 650R', 'cbr-650r', 262000000, 0, 'cbr650r1.jpg', 2, 'ĐỘNG CƠ<br>\r\nĐộng cơ 4 xi lanh thẳng hàng, làm mát bằng chất lỏng, 16 van trục kép Euro4<br>\r\nDung tích xi lanh 649 cc<br>\r\nĐường kính x hành trình piston 67 x 46 mm<br>\r\nTỷ lệ nén 11,6: 1<br>\r\nCông suất cực đại 95 mã lực (70kW) @ 12.000 vòng / phút<br>\r\nMô-men xoắn cực đại 64 Nm @ 8.500 vòng / phút<br>\r\nHệ thống nhiên liệu PGM-FI tiêm điện tử<br>\r\nĐánh lửa Đánh lửa điện<br>\r\nTruyền tải 6 cấp xoay về đầu<br><br>\r\nHIỆU SUẤT<br>\r\nHệ thống treo trước / bánh Phuộc ngược, còng 41 mm, Showa SFF có thể điều chỉnh<br>\r\nHệ thống treo sau / bánh Monoshock với Pro-Link,Xích nhôm, giảm xóc có thể điều chỉnh<br>\r\nLốp trước 120/70 ZR17 M / C<br>\r\nLốp sau 180/55 ZR17 M / C<br>\r\nPhanh trước Đĩa nổi 310 mm với calipers 4 piston hướng tâm 2 kênh ABS<br>\r\nPhanh sau Đĩa 240 mm với caliper piston đơn, ABS 2 kênh<br>\r\nBánh xe phía trước/sau Trong nhôm đúc với 10 nan hoa tubless<br><br>\r\nCHI TIẾT<br>\r\nLoại khung Kim cương thép bán đôi<br>\r\nTreo khung 25,5 ° 00 mm<br>\r\nTổng chiều dài 2.130 mm<br>\r\nChiều rộng tổng thể 750 mm<br>\r\nChiều cao tổng thể 1.150 mm<br>\r\nÁnh sáng gầm 130 mm<br>\r\nChiều cao yên ngồi 810 mm<br>\r\nĐường mòn 101 mm<br>\r\nTrong lượng khô 207 kg<br>\r\nLượng nhiên liệu 11,5 lít<br>\r\nChiều dài cơ sở 1.450 mm mm<br>\r\nLựa chọn màu sắc Trắng, đỏ, xám, đen xanh<br>\r\nTiêu hao nhiên liêu 20,4 km / l (chu kỳ WMTC trung bình)<br><br>\r\nTRUYỀN ĐỘNG & ĐIỆN<br>\r\nHộp số Nhiều tấm trong bồn tắm dầu, hỗ trợ, chống trượt<br>\r\nLoại hình chuyển đổi Chuỗi<br>\r\nTruyền động Sang số thủ công<br>\r\nĐèn trước Full Led<br>\r\nthiết bị đo đạc màn hình Bảng điều khiển LCD kỹ thuật số hoàn chỉnh với máy đo tốc độ, máy đo tốc độ, nhiệt kế hoạt động, các chỉ số của bánh răng tham gia và chuyển số theo tốc độ động cơ.<br>\r\nĐèn hậu Full Led<br>\r\nDung lượng pin YTZ10 / FTZ10S 8,6Ah MF<br>\r\nTổng công suất dầu #<br>\r\nKhởi động Điện<br>\r\nLượng khí thải CO2 (g / km) 112<br>\r\nỔ cắm 12 v Không<br>', 1000, '2020-05-08 05:47:01', '2020-05-08 05:47:48', 1, 24, 'cbr650r.jpg', 'cbr650r1.jpg', 'cbr650r3.jpg'),
(28, 'KAWASAKI NINJA H2R', 'kawasaki-ninja-h2r', 1450000000, 0, 'NINJA H2R1.jpg', 1, 'Động cơ 4 thì, 4 xi-lanh, DOHC, 4 van, làm mát bằng chất lỏng, tăng áp<br>\r\nDịch chuyển 998cc<br>\r\nĐường kính x hành trình piston 76,0 x 55,0mm<br>\r\nTỷ lệ nén 8,3: 1<br>\r\nHệ thống nhiên liệu DFI ® với thân bướm ga 50mm (4) với phun kép<br>\r\nĐánh lửa TCBI với tiến bộ kỹ thuật số<br>\r\nQuá trình lây truyền 6 tốc độ, trở lại, vòng chó<br>\r\nỔ đĩa cuối cùng Chuỗi kín<br>\r\nHỗ trợ Rider điện tử Chức năng quản lý góc cua của Kawasaki (KCMF), Kiểm soát lực kéo của Kawasaki (KTRC), Chế độ kiểm soát khởi động của Kawasaki (KLCM), Hệ thống chống bó cứng thông minh của Kawasaki (KIBS), Kiểm soát phanh động cơ của Kawasaki, Bộ chuyển động nhanh của Kawasaki (KQS) (lên xuống & xuống dốc) , hlins Tay lái điện tử<br>\r\n\r\nHệ thống treo trước / bánh xe du lịch Phuộc ngược 43mm có thể điều chỉnh độ giật và giảm xóc, khả năng điều chỉnh tải trước lò xo và lò xo từ trên xuống / 4,7 in<br>\r\nHệ thống treo sau / bánh xe du lịch Uni-Trak ® , giảm xóc khí TTX36 với bình chứa cõng, nén 30 hướng và giảm xóc và điều chỉnh, và điều chỉnh tải trước lò xo quay tay và lò xo bật ra / 5.3 trong<br>\r\nLốp trước 120/60 ZR17 Bridgestone V01F bóng mượt<br>\r\nLốp sau 190/65 ZR17 Bridgestone V01R bóng mượt<br>\r\nPhanh trước Giá đỡ kép hướng tâm, cặp kẹp M50 4 piston đối lập, đĩa 330mm bán nổi kép, KIBS ABS<br>\r\nPhanh sau Calipers 2 piston đối lập, đĩa đơn 250mm, KIBS ABS<br>\r\n\r\nLoại khung Trellis, thép cường độ cao, với tấm gắn<br>\r\nCào / Đường 25.1 / 4.3 trong<br>\r\nTổng chiều dài 81,5 trong<br>\r\nChiều rộng tổng thể 33,5 trong<br>\r\nChiều cao tổng thể 45,7 trong<br>\r\nGiải phóng mặt bằng 5,1 trong<br>\r\nChiều cao ghế ngồi 32,7 trong<br>\r\nKiềm chế 476,3 lb **<br>\r\nLượng nhiên liệu 4,5 gal<br>\r\nChiều dài cơ sở 57,1 trong<br>\r\nTính năng đặc biệt Không có<br>\r\nLựa chọn màu sắc Gương phủ mờ Spark Black<br>\r\nSự bảo đảm Không có<br>\r\nKawasaki Protection Plus ™ (tùy chọn) Không có\r\n', 100, '2020-05-08 06:02:05', NULL, 1, 28, 'NINJA H2R2.jpg', 'NINJA H2R3.jpg', 'NINJA H2R.png');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`id`, `name`, `slug`, `created_at`, `update_at`) VALUES
(1, 'XE MÔ TÔ', 'xe-mo-to', '2020-04-22 02:23:45', '2020-04-25 03:19:11'),
(2, 'XE TAY GA', 'xe-tay-ga', '2020-04-22 02:23:59', '2020-04-25 03:17:50'),
(7, 'XE SỐ', 'xe-so', '2020-04-22 08:26:06', '2020-04-25 03:17:01'),
(8, 'XE CÔN TAY', 'xe-con-tay', '2020-04-22 09:15:03', '2020-05-29 08:10:56'),
(9, 'XE THỂ THAO', 'xe-the-thao', '2020-04-22 10:55:56', '2020-04-25 03:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `tieude` varchar(200) DEFAULT NULL,
  `noidung` text,
  `thunbar` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`id`, `tieude`, `noidung`, `thunbar`, `created_at`, `update_at`) VALUES
(4, 'Cùng bạn chạm tới đam mê!!!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut nibh velit. Donec id orci eu lorem sagittis venenatis. Pellentesque vitae lorem porta odio sodales vulputate eu sit amet nisi. Ut id elit eu libero tempus ullamcorper. Donec eget auctor nulla. Donec mi nisi, tempus sit amet arcu eu, malesuada imperdiet nisi. Vivamus suscipit eget augue quis pellentesque. Sed lobortis nisi vel magna tempus, id rutrum neque dapibus. Vivamus tincidunt convallis aliquam. Mauris malesuada eget tortor non rutrum. Maecenas nisl magna, sollicitudin vel porttitor vitae, tincidunt eget ante.', 'gt.JPG', '2020-04-24 16:05:36', '2020-04-24 16:54:48'),
(5, 'Khai trương chuỗi của hàng MOTORCYCLE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut nibh velit. Donec id orci eu lorem sagittis venenatis. Pellentesque vitae lorem porta odio sodales vulputate eu sit amet nisi. Ut id elit eu libero tempus ullamcorper. Donec eget auctor nulla. Donec mi nisi, tempus sit amet arcu eu, malesuada imperdiet nisi. Vivamus suscipit eget augue quis pellentesque. Sed lobortis nisi vel magna tempus, id rutrum neque dapibus. Vivamus tincidunt convallis aliquam. Mauris malesuada eget tortor non rutrum. Maecenas nisl magna, sollicitudin vel porttitor vitae, tincidunt eget ante.', 'gt.JPG', '2020-04-24 16:36:00', '2020-04-24 16:54:39'),
(6, 'Chương trình Nói theo cách Nhà thiết kế', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut nibh velit. Donec id orci eu lorem sagittis venenatis. Pellentesque vitae lorem porta odio sodales vulputate eu sit amet nisi. Ut id elit eu libero tempus ullamcorper. Donec eget auctor nulla. Donec mi nisi, tempus sit amet arcu eu, malesuada imperdiet nisi. Vivamus suscipit eget augue quis pellentesque. Sed lobortis nisi vel magna tempus, id rutrum neque dapibus. Vivamus tincidunt convallis aliquam. Mauris malesuada eget tortor non rutrum. Maecenas nisl magna, sollicitudin vel porttitor vitae, tincidunt eget ante.', 'gt.JPG', '2020-04-24 16:38:15', '2020-04-24 16:46:00'),
(7, 'MOTORCYCLE thành lập !!!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut nibh velit. Donec id orci eu lorem sagittis venenatis. Pellentesque vitae lorem porta odio sodales vulputate eu sit amet nisi. Ut id elit eu libero tempus ullamcorper. Donec eget auctor nulla. Donec mi nisi, tempus sit amet arcu eu, malesuada imperdiet nisi. Vivamus suscipit eget augue quis pellentesque. Sed lobortis nisi vel magna tempus, id rutrum neque dapibus. Vivamus tincidunt convallis aliquam. Mauris malesuada eget tortor non rutrum. Maecenas nisl magna, sollicitudin vel porttitor vitae, tincidunt eget ante.', 'gt.JPG', '2020-04-24 16:45:10', '2020-04-24 16:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `trangtinh`
--

CREATE TABLE `trangtinh` (
  `id` int(11) NOT NULL,
  `name` text,
  `noidung` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trangtinh`
--

INSERT INTO `trangtinh` (`id`, `name`, `noidung`, `created_at`, `update_at`) VALUES
(1, 'CHÍNH SÁCH GIAO HÀNG', '<h2 style=\"letter-spacing: 1px;color: red;font-style: italic;font-size: 24pt;font-weight: bold;margin-left:-10px;\">Chính sách giao hàng của  MOTORCYCLE</h2>', '2020-06-09 01:53:59', '2020-06-15 05:12:26'),
(2, 'Chính sách đổi trả ', '<h2 style=\"letter-spacing: 1px;color: red;font-style: italic;font-size: 24pt;font-weight: bold;margin-left:-10px;\">Chính sách đổi trả của  MOTORCYCLE</h2>', '2020-06-09 01:57:30', '2020-06-15 05:12:43'),
(3, 'Chính sách bảo mật thông tin', '<h2 style=\"letter-spacing: 1px;color: red;font-style: italic;font-size: 24pt;font-weight: bold;margin-left:-10px;\">Chính sách bảo mật của  MOTORCYCLE</h2>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">1. Thành lập bộ phận bảo vệ thông tin cá nhân</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">Chúng tôi đảm bảo tất cả cán bộ làm việc tại mỗi bộ phận của MOTORCYCLE đều hiểu được tầm quan trọng của việc bảo mật thông tin cá nhân và sẽ xây dựng cơ chế bảo vệ thông tin cá nhân. Ngoài ra, bằng cách đưa ra các quy định quản lý về việc thu thập, sử dụng, và cung cấp v.v… thông tin cá nhân, chúng tôi quản lý thông tin cá nhân theo đúng quy định và luôn nỗ lực không ngừng cải thiện.</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">2. Thu thập theo đúng quy định</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">Chúng tôi thu thập thông tin cá nhân của bạn cho nhiều mục đích khác nhau liên quan đến các hoạt động kinh doanh của chúng tôi theo quy định của pháp luật. Chúng tôi sẽ tiếp nhận và phân tích các thông tin trên chỉ trong trường hợp cần thiết và sẽ thông báo cho cá nhân hoặc thông báo công khai về mục đích sử dụng...</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">3. Hạn chế sử dụng</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">Trừ khi được sự đồng ý của cá nhân hoặc được pháp luật cho phép, thông tin cá nhân sẽ không được sử dụng cho bất kỳ mục đích nào khác ngoài các mục đích đã được thông báo cho cá nhân hoặc thông báo công khai về mục đích sử dụng.</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">4. Tính chính xác của dữ liệu</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">Khi lưu giữ thông tin cá nhân, chúng tôi sẽ giữ các thông tin phù hợp với mục tiêu sử dụng cũng như đảm bảo tính chính xác, hoàn thiện, và cập nhật kịp thời. Khi thông tin không còn cần thiết, chúng tôi sẽ lập tức xóa bỏ các thông tin này.</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">5. Kiểm soát bảo mật</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">Khi lưu giữ và quản lý thông tin cá nhân, chúng tôi sẽ tiến hành các biện pháp bảo mật phù hợp để ngăn chặn các rủi ro (ví dụ như mất, phá hủy, giả mạo, và rò rỉ thông tin…).</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">6. Nghĩa vụ bảo mật thông tin</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">Các cá nhân làm việc tại mỗi bộ phận của MOTORCYCLE phải hiểu được tầm quan trọng của việc bảo vệ thông tin cá nhân và nỗ lực trong việc bảo mật những thông tin cá nhân này.</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">7. Phản hồi trước các yêu cầu</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">Khi lưu giữ thông tin cá nhân, chúng tôi sẽ công khai mục đích sử dụng và sẽ phản hồi khi nhận được yêu cầu sửa đổi hoặc chấm dứt sử dụng. Chúng tôi cam kết chỉ sử dụng các thông tin trên dưới sự đồng ý và cho phép của bạn.</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">8. Hành động trong trường hợp có sự cố</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">Nếu bất kỳ sự cố nào ví dụ như rò rỉ thông tin cá nhân xảy ra, chúng tôi sẽ xử lý phù hợp bằng cách điều tra tất cả các thông tin và nguyên nhân, đồng thời có các biện pháp để ngăn chặn thiệt hại dây chuyền vài tái diễn.</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">9. Tuân thủ</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">Ngoài các vấn đề trên, mỗi bộ phận của YMVN sẽ phải tuân thủ theo các quy định và pháp luật liên quan đến bảo mật thông tin cá nhân của người dùng.</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">10. Sử dụng thông tin cá nhân</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">Khi tuân thủ các vấn đề trên, chúng tôi sẽ chủ động sử dụng thông tin cá nhân thu thập được nhằm cải thiện dịch vụ của mình.</p><br>', '2020-06-09 01:57:46', '2020-06-15 05:08:35'),
(4, 'TƯ VẤN MUA HÀNG TRẢ GÓP', '<h2 style=\"letter-spacing: 1px;color: red;font-style: italic;font-size: 24pt;font-weight: bold;margin-left:-10px;\">Điều Kiện Cho Vay Trả Góp Xe Mô Tô</h2>\r\n<p style=\"font-weight: bold;font-size: 16pt;\">1. Trả góp qua HD bank : Thanh toán trước 40%</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">✅ Vay dưới 100 triệu : lãi suất 1,64 % ( thời gian duyệt không quá 3 ngày).</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">✅ Vay 100 triệu – 150 triệu: lãi suất  1,25 % ( thời gian duyệt không quá 5 ngày).</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">✅ Vay 150 triệu – 200 triệu: lãi suất  1,14 % ( thời gian duyệt không quá 5 ngày).</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">✅ Vay trên 200tr : lãi suất 1,03 % ( thời gian duyệt không quá 7 ngày).</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">2. Hồ sơ trả góp bao gồm : ( áp dụng cá nhân Việt Nam )</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">✅ CMND photo.</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">✅ Hộ Khẩu photo.</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">✅ Chứng minh thu nhập : sao kê bảng lương hoặc giấy xác nhận lương ( 3 tháng gần nhất).</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">3. Thời gian trả góp linh hoạt :</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">✅ Từ 9 tháng cho đến 36 tháng tùy khách hàng chọn lưạ.</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">✅ Vd : 9 tháng hoặc 10 tháng hoặc 11 tháng……………36 tháng.</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">4. Thời gian giao xe :</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">✅ Ký hồ sơ trả góp là nhận xe .</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">✅ Giấy đăng ký xe moto, xe máy ( cà vẹt xe) nhận sau 2 ngày.</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">5. Phải trả bao nhiêu mỗi tháng ?</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">✅ Liên hệ HOTLINE : 0931.106.538</p>', '2020-06-15 02:56:07', '2020-06-15 03:33:35'),
(5, 'TUYỂN DỤNG NHÂN SỰ', '<h2 style=\"letter-spacing: 1px;color: red;font-style: italic;font-size: 24pt;font-weight: bold;margin-left:-10px;\">MOTORCYCLE Cần tuyển dụng</h2>\r\n<p style=\"font-size: 13pt;font-style: normal;\">Công ty MOTORCYCLE chuyên nhập khẩu và phân phối các dòng Moto Phân khối lớn từ Nhật, Châu Âu, Mỹ với các thương hiệu như Honda, Yamah, Suzuki, Kawasaki... với hệ thống phân phối moto từ Bắc tới Nam, bán Moto giá sĩ, giá lẻ, chuyên bán hàng hàng online... đang cần tuyển các Vị trí như sau:</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">1. Nhân Viên Kế Toán: 01 người</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">a. Cẩn thận,trung thực, có tinh thần trách nhiệm cao.</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">b. Sử dụng thành thạo tin học văn phòng.</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">c. Có khả năng giao tiếp tốt.</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">d. Có khả năng quản lý sổ sách, hóa đơn, theo dõi các khoản phải thu, chi, tình hình thu tiền và liên hệ với khách hàng.</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">e. Tốt nghiệp chuyên ngành tài chính - kế toán.</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">2. Cửa Hàng Trưởng: 01người</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">a. Nam tuổi từ 30 trở lên, có khả năng quản lý lập kế hoạch và quả lý sales, chăm sóc khách hàng.</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">b. Có kinh nghiệm bán hàng và quản lý bán hàng, biết tiếng anh giao tiếp, ưu tiên cho người am hiểu về xe máy - xe moto.</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">c. Lương thỏa thuận hưỡng lương tháng căn bản cộng doanh số hàng tháng.</p><br>\r\n<p style=\"font-weight: bold;font-size: 16pt;\">3. Nhân viên bán hàng: 02 người</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">a. Trình độ trung cấp trở lên, có kinh nghiện bán hàng và chăm sóc khách hàng, ưu tiên các ứng viên đã trả qua các lớp đào tạo bán hàng chuyên nghiệp hiện đại.</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">b. Tuổi từ 25-35 ưu tiên người biết chạy và hiểu Moto.</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">c. Lương thỏa thuận hưỡng lương căn bản và huê hồng theo doanh số bán hàng tháng.</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">d. Phương tiện tự túc làm việc tại HCM.</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">4. Nhân Viên marketing online: 01 người</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">a. Biết về Web, quản trị web, facebook, adword</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">b. Thông thao photoshop hoặc AI</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">c. Biết chụp hình, quay phim căn bản, biết viết bài thông cáo báo chí...</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">d. Lương thỏa thuận</p><br>\r\n\r\n<p style=\"font-weight: bold;font-size: 16pt;\">Nộp hồ sơ về: Công ty TNHH MOTORCYCLE</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">Địa chỉ: T3H - Mai Dịch - Hà Nội</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">Miss Thu: 0931.109.538</p>\r\n<p style=\"font-size: 13pt;font-style: normal;\">Miss Thảo: 0932.119.588</p>', '2020-06-15 04:03:00', '2020-06-15 04:39:23'),
(6, 'HỆ THỐNG CÁC CỦA HÀNG TÊN CẢ NƯỚC', '<h2 style=\"letter-spacing: 1px;color: red;font-style: italic;font-size: 24pt;font-weight: bold;margin-left:-10px;\">Hệ thống của hàng của  MOTORCYCLE</h2>', '2020-06-15 04:04:07', '2020-06-15 05:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `created_at`, `update_at`) VALUES
(1, 'ADMIN', 'admin@gmail.com', '0334679170', 'Bắc Từ Liêm - Hà Nội ', 'ca4911bd2c5962c7cabb028adf7f733f', '2020-04-26 13:52:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hangxe`
--
ALTER TABLE `hangxe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phankhoi`
--
ALTER TABLE `phankhoi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trangtinh`
--
ALTER TABLE `trangtinh`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `hangxe`
--
ALTER TABLE `hangxe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `phankhoi`
--
ALTER TABLE `phankhoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trangtinh`
--
ALTER TABLE `trangtinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
