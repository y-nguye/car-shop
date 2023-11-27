-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2023 lúc 10:54 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `car_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `car_price` decimal(20,0) NOT NULL DEFAULT 0,
  `car_quantity` int(100) DEFAULT NULL,
  `car_describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `car_detail_describe` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `car_engine` varchar(50) DEFAULT NULL,
  `car_seat_id` int(11) UNSIGNED DEFAULT NULL,
  `car_fuel_id` int(11) UNSIGNED DEFAULT NULL,
  `car_type_id` int(11) UNSIGNED DEFAULT NULL,
  `car_transmission_id` int(11) UNSIGNED DEFAULT NULL,
  `car_producer_id` int(11) UNSIGNED DEFAULT NULL,
  `car_update_at` datetime DEFAULT NULL,
  `car_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `car_deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `car_price`, `car_quantity`, `car_describe`, `car_detail_describe`, `car_engine`, `car_seat_id`, `car_fuel_id`, `car_type_id`, `car_transmission_id`, `car_producer_id`, `car_update_at`, `car_deleted`, `car_deleted_at`) VALUES
(48, 'Mazda 3 Premium 2021', 795077000, 2, 'Quyến rũ với các đường nét thanh thoát và sang trọng', '<p><strong>1. K&iacute;ch thước, trọng lượng</strong></p>\r\n\r\n<p>Mazda 3 sở hữu k&iacute;ch thước tổng thể d&agrave;i, rộng v&agrave; cao lần lượt l&agrave; 4.660 x 1.795 x 1.440 (mm), chiều d&agrave;i cơ sở ở mức 2.700 mm, khoảng s&aacute;ng gầm xe l&agrave; 128 mm. C&oacute; thể n&oacute;i, theo những th&ocirc;ng số tr&ecirc;n giấy tờ, Mazda 3 l&agrave; một trong những mẫu xe c&oacute; k&iacute;ch thước lớn nhất trong ph&acirc;n kh&uacute;c</p>\r\n\r\n<p><strong>2. Khung gầm, hệ thống treo</strong></p>\r\n\r\n<p>Mẫu Sedan hạng C của nh&agrave; Mazda sử dụng hệ thống khung gầm liền khối (unibody) c&ugrave;ng hệ thống treo trước Macpherson v&agrave; treo sau kiểu Thanh xoắn. Đ&acirc;y l&agrave; một điểm thay đổi kh&aacute; lớn khi m&agrave; hệ thống treo sau ở phi&ecirc;n bản cũ l&agrave; dạng treo đa li&ecirc;n kết. Thanh xoắn vốn kh&ocirc;ng thể linh hoạt, c&acirc;n bằng v&agrave; ổn định, chịu vặn xoắn tốt như đa li&ecirc;n kết.</p>\r\n\r\n<p>L&yacute; do lớn nhất để Mazda thay thế hệ thống n&agrave;y l&agrave; để giảm trọng lượng, tăng kh&ocirc;ng gian. Để khắc phục những điểm yếu của thanh xoắn, h&atilde;ng tăng độ li&ecirc;n kết khung xe, tăng độ cứng dọc hệ thống treo cũng như giảm độ đ&agrave;n hồi phương thẳng đứng của lốp xe để triệt ti&ecirc;u rung động, tăng khả năng giảm chấn.</p>\r\n\r\n<p>Giống như c&aacute;c mẫu xe c&ugrave;ng ph&acirc;n kh&uacute;c, Mazda 3 sử dụng hệ thống phanh đĩa trước v&agrave; sau cho khả năng vận h&agrave;nh ch&iacute;nh x&aacute;c v&agrave; an to&agrave;n hơn.</p>\r\n\r\n<p><strong>3. Đầu xe</strong></p>\r\n\r\n<p>Phần đầu xe vẫn trung th&agrave;nh với ng&ocirc;n ngữ thiết kế Kodo trẻ trung, sang trọng v&agrave; ấn tượng; chiếm được rất nhiều cảm t&igrave;nh của kh&aacute;ch h&agrave;ng Việt Nam. Vẫn l&agrave; cụm lưới tản nhiệt h&igrave;nh chiếc khi&ecirc;n được l&agrave;m rộng sang 2 b&ecirc;n, ph&iacute;a dưới l&agrave; viền crom to bản nối 2 cụm đ&egrave;n. Đ&egrave;n pha Full-LED c&oacute; đầy đủ t&iacute;nh năng tự động bật/tắt, tự động điều chỉnh g&oacute;c chiếu, mở rộng g&oacute;c chiếu khi đ&aacute;nh l&aacute;i v&agrave; tự động chuyển pha/cos t&ugrave;y điều kiện giao th&ocirc;ng.</p>\r\n\r\n<p>Ở những phi&ecirc;n bản Sport th&igrave; thiết kế đầu xe sẽ c&oacute; ch&uacute;t kh&aacute;c biệt với c&aacute;c bản thường. Đầu ti&ecirc;n phải kể đến phần cản trước được thiết kế mới, l&agrave;m đua ra v&agrave; sơn tone m&agrave;u đen mờ. Cụm lưới tản nhiệt được thiết kế mới dạng nan lưới tổ ong v&agrave; được sơn đen b&oacute;ng, chỉnh giữa l&agrave; logo Mazda mạ crom, tạo n&ecirc;n điểm nhấn ấn tượng. Phần viền lưới tản nhiệt được sơn b&oacute;ng m&agrave;u ghi x&aacute;m thay v&igrave; vẻ s&aacute;ng lo&aacute;ng crom tr&ecirc;n c&aacute;c bản thường. Điểm đ&aacute;ng tiếc duy nhất c&oacute; lẽ tới từ việc bỏ đ&egrave;n LED gầm ở phần cản trước.</p>\r\n\r\n<p><strong>4. Th&acirc;n xe</strong></p>\r\n\r\n<p>Nh&igrave;n từ th&acirc;n xe sẽ thấy điểm kh&aacute;c biệt r&otilde; r&agrave;ng nhất giữa c&aacute;c phi&ecirc;n bản thường v&agrave; bản Sport. Nếu như ở c&aacute;c phi&ecirc;n bản Deluxe, Luxury, Premium th&ocirc;ng thường xe sở hữu thiết kế Sedan, th&igrave; ở c&aacute;c bản Sport của Mazda 3 lại được l&agrave;m theo d&aacute;ng Hatchback.</p>\r\n', 'Skactiv-G 1.5', 2, 1, 2, 2, 6, '2023-11-01 20:25:56', 0, '2023-11-01 20:25:46'),
(49, 'Kia K3 2023', 619000000, 1, 'Phong cách sống thông minh', '<p>K&iacute;ch thước của K3 kh&aacute; tương đồng so với c&aacute;c mẫu xe đối thủ trong ph&acirc;n kh&uacute;c Sedan hạng C</p>\r\n\r\n<p>Kia K3 sử dụng hệ thống treo trước kiểu Macpherson, treo sau kiểu thanh xoắn. Hệ thống phanh sử dụng tr&ecirc;n xe l&agrave; phanh đĩa, đặc biệt ph&iacute;a trước d&ugrave;ng phanh đĩa th&ocirc;ng gi&oacute;. Đ&acirc;y cũng l&agrave; hệ thống treo v&agrave; phanh tr&ecirc;n nhiều mẫu xe đối thủ như:&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/dong-xe/mazda-mazda3-97\">Mazda 3</a>,&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/dong-xe/hyundai-elantra-49\">Hyundai Elantra</a>&hellip;</p>\r\n\r\n<p>Phần đầu xe g&acirc;y ấn tượng mạnh với phần mặt ca-lăng vẫn l&agrave; h&igrave;nh mũi hổ thường thấy tr&ecirc;n c&aacute;c mẫu xe Kia. Tuy nhi&ecirc;n, mặt ca-lăng n&agrave;y lại được thiết kế mới, tr&ocirc;ng v&ocirc; c&ugrave;ng bắt mắt với c&aacute;c họa tiết 3D b&ecirc;n trong.</p>\r\n\r\n<p>Phần đu&ocirc;i xe của Kia K3 thiết kế pha lẫn sự khỏe khoắn v&agrave; sang trọng. Cụm đ&egrave;n chiếu sau LED được nối liền 2 b&ecirc;n tạo sự liền mạch. Phần đ&egrave;n xi-nhan được bộ tr&iacute; b&ecirc;n dưới với thiết kế kh&aacute; trẻ trung. Cản sau xe được sơn đen với một phần &ldquo;mũi hổ&rdquo; kh&aacute;c tương tự như ở mặt ca-lăng.</p>\r\n', '1.6', 2, 1, 2, 1, 16, '2023-10-04 08:42:11', 0, '2023-09-26 21:49:10'),
(54, 'C300 AMG', 2399000000, 1, 'Đây là thế giới của tôi', '<p>Trước đ&acirc;y, C-class được v&iacute; như một phi&ecirc;n bản thu nhỏ của&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/dong-xe/mercedes-s-class-106\">S-class</a>&nbsp;bởi những tương đồng ở ngoại h&igrave;nh lẫn c&aacute;ch sắp xếp c&aacute;c chi tiết trong khoang l&aacute;i. Ở thế hệ n&agrave;y của C-class, điều đ&oacute; vẫn kh&ocirc;ng đổi.</p>\r\n\r\n<p>So với bản cũ, C-class mới c&oacute; chiều d&agrave;i trục cơ sở tăng th&ecirc;m 25 mm gi&uacute;p h&agrave;nh kh&aacute;ch ngồi ghế sau c&oacute; th&ecirc;m 20 mm chỗ để ch&acirc;n. Khoảng kh&ocirc;ng ph&iacute;a sau th&ecirc;m 15 mm. C-class 2022 d&agrave;i 4.750 mm, rộng 1.821 mm, cao 1.438 mm. So với bản cũ, xe d&agrave;i hơn 63 mm, rộng hơn 10 mm v&agrave; thấp hơn 10 mm. Khoang h&agrave;nh l&yacute; giữ nguy&ecirc;n dung t&iacute;ch 507 l&iacute;t.</p>\r\n\r\n<p>Phần nắp ca-p&ocirc; c&oacute; hai đường g&acirc;n nổi, tạo điểm nhấn nam t&iacute;nh trong tổng thể mượt m&agrave; của Mercedes C-class. Mặt ca-lăng của C-class mới tinh chỉnh đ&ocirc;i ch&uacute;t so với bản tiền nhiệm. Xe c&oacute; đ&egrave;n ch&agrave;o mừng với logo Mercedes gắn ở gương chiếu hậu ngo&agrave;i.</p>\r\n\r\n<p>Ri&ecirc;ng hai bản C300 AMG c&oacute; thiết kế dạng lưới h&igrave;nh logo 3 c&aacute;nh Mercedes. Đ&egrave;n pha Digital Light th&ocirc;ng minh c&oacute; tr&ecirc;n hai bản C300. C&ocirc;ng nghệ n&agrave;y thậm ch&iacute; chưa c&oacute; tr&ecirc;n&nbsp;<a href=\"https://vnexpress.net/mercedes-s-class-the-he-moi-gia-tu-5-2-ty-dong-4394639.html\" target=\"_blank\">đ&agrave;n anh S-class đ&atilde; b&aacute;n trước đ&oacute; ở Việt Nam</a>.</p>\r\n\r\n<p>Đu&ocirc;i xe C-class với tạo h&igrave;nh tương tự S-class. Đ&egrave;n hậu LED hai mảnh, la-zăng 17 inch tr&ecirc;n hai bản C200, 18 inch bản C300 CKD v&agrave; 19 inch bản C300 CBU.</p>\r\n\r\n<p>Khoang l&aacute;i C-class thế hệ mới kh&ocirc;ng c&ograve;n li&ecirc;n hệ n&agrave;o với bản cũ. Mercedes tiếp tục tạo ra một xu hướng thiết kế mới ở cabin, kh&iacute;a cạnh vốn rất mạnh của h&atilde;ng Đức trong việc nu&ocirc;ng chiều c&aacute;c kh&aacute;ch h&agrave;ng gi&agrave;u c&oacute;. Hệ thống MBUX thế hệ thứ hai c&oacute; m&agrave;n h&igrave;nh th&ocirc;ng tin giải tr&iacute; 11,9 inch theo chiều dọc, nghi&ecirc;ng khoảng 6 độ về ph&iacute;a người l&aacute;i, kết nối Apple CarPlay/Android Auto kh&ocirc;ng d&acirc;y.</p>\r\n\r\n<p>V&ocirc;-lăng của C-class vẫn kiểu ba chấu nhưng được c&aacute;ch điệu lạ mắt so với tạo h&igrave;nh truyền thống. Ph&iacute;a sau l&agrave; m&agrave;n h&igrave;nh LCD 12,3 inch, c&aacute;c hốc gi&oacute; thiết kế điệu đ&agrave; hơn trước. &Acirc;m thanh v&ograve;m Burmester tr&ecirc;n hai bản C200 Avantgarde Plus v&agrave; C300 CKD, hai bản c&ograve;n lại loại ti&ecirc;u chuẩn.</p>\r\n\r\n<p>Hai bản C300 AMG lắp chung động cơ tăng &aacute;p 2 l&iacute;t, c&ocirc;ng suất 258 m&atilde; lực, m&ocirc;-men xoắn cực đại 400 Nm. Phi&ecirc;n bản C200 d&ugrave;ng m&aacute;y 1.5 với c&ocirc;ng suất 204 m&atilde; lực, sức k&eacute;o 300 Nm. Tất cả đều đi k&egrave;m hệ thống điện EQ Boost gi&uacute;p gia tăng 20 m&atilde; lực c&ocirc;ng suất v&agrave; 200 Nm m&ocirc;-men xoắn. Hộp số tự động 9 cấp.</p>\r\n\r\n<p>Trong lần ra mắt n&agrave;y, Mercedes cung cấp lựa chọn C300 AMG nhập khẩu Đức, gi&aacute; cao nhất trong dải sản phẩm của C-class v&agrave; được gọi l&agrave; First Edition tại Việt Nam (số lượng 132 chiếc). Đắt hơn 310 triệu đồng so với bản C300 CKD, C300 CBU c&oacute; th&ecirc;m t&iacute;nh năng an to&agrave;n phanh ph&ograve;ng ngừa va chạm, hỗ trợ đỗ xe với hệ thống camera 360 độ k&egrave;m khả năng giả lập đồ họa 3D m&ocirc;i trường xung quanh, lốp run-flat, nguồn gốc nhập khẩu v&agrave; m&acirc;m xe lớn nhất. Tuy nhi&ecirc;n, xe lại thiếu t&iacute;nh năng cảnh b&aacute;o điểm m&ugrave;, hỗ trợ giữ l&agrave;n đường vốn c&oacute; tr&ecirc;n bản CKD.</p>\r\n', '2.0 I4 Turbo', 2, 1, 2, 2, 7, '2023-10-14 10:47:53', 0, '2023-09-26 21:49:10'),
(55, 'Ford Everest 2023', 1099000000, 2, 'Mạnh mẽ bên ngoài, tinh tế bên trong', '<p><strong>1.1. K&iacute;ch thước, trọng lượng</strong></p>\r\n\r\n<p>So với thế hệ trước, k&iacute;ch thước Everest mới tăng theo cả 3 chiều d&agrave;i, rộng, cao lần lượt 4.914 x 1.923 x 1.842 (mm). Chiều d&agrave;i cơ sở của xe tăng 50 mm l&ecirc;n 2.900 mm, gi&uacute;p kh&ocirc;ng gian khoang h&agrave;nh kh&aacute;ch v&ocirc; c&ugrave;ng rộng r&atilde;i. Khả năng lội nước giữ nguy&ecirc;n ở mức 800 mm v&agrave; khoảng s&aacute;ng gầm 200 mm.</p>\r\n\r\n<p><strong>1.2. Khung gầm, hệ thống treo</strong></p>\r\n\r\n<p>Do l&agrave; một mẫu xe SUV thực thụ, Everest sử dụng khung gầm rời: Body-on-frame kết hợp với hệ thống treo trước độc lập, thanh c&acirc;n bằng; treo sau ống giảm chấn lớn v&agrave; thanh ổn định li&ecirc;n kết Watts Linkage. Đ&acirc;y l&agrave; hệ thống treo v&ocirc; c&ugrave;ng ưu việt cho c&aacute;c cung đường hỗn hợp, việt d&atilde;; mang tới khả năng Off-road tuyệt hảo đ&uacute;ng chất của một mẫu SUV.</p>\r\n\r\n<p>Xe trang bị phanh đĩa cho cả trước v&agrave; sau, điều n&agrave;y vừa đảm bảo độ thẩm mỹ cho phần b&aacute;nh xe, vừa gi&uacute;p xe vận h&agrave;nh một c&aacute;ch an to&agrave;n v&agrave; ch&iacute;nh x&aacute;c nhất.</p>\r\n\r\n<p><strong>2.1. Khoang l&aacute;i</strong></p>\r\n\r\n<p>Everest c&oacute; nội thất mới với nhiều đường thẳng, t&aacute;p-l&ocirc; được l&agrave;m phẳng tăng kh&ocirc;ng gian cho cabin. B&ecirc;n cạnh đ&oacute; l&agrave; ngập tr&agrave;n những c&ocirc;ng nghệ như m&agrave;n h&igrave;nh cảm ứng giải tr&iacute; đặt dọc với hệ thống SYNC 4A v&agrave; cụm đồng hồ kỹ thuật số sau v&ocirc;-lăng.</p>\r\n\r\n<p>V&ocirc;-lăng kiểu mới, thiết kế 4 chấu to bản, bọc da với đầy đủ c&aacute;c n&uacute;t bấm: Ra lệnh giọng n&oacute;i, Đ&agrave;m thoại rảnh tay, Điều chỉnh &acirc;m lượng, Cruise Control... Ph&iacute;a sau v&ocirc; lăng l&agrave; cụm đồng hồ dạng kỹ thuật số tấm nền TFT c&oacute; k&iacute;ch thước 8 inch (bản Ambient v&agrave; Sport) hoặc 12 inch (bản Titanium v&agrave; Titanium+).</p>\r\n\r\n<p>Ch&iacute;nh giữa T&aacute;p-l&ocirc; l&agrave; cửa gi&oacute; điều h&ograve;a c&oacute; họa tiết giống lưới tản nhiệt v&agrave; m&agrave;n h&igrave;nh giải tr&iacute; cảm ứng k&iacute;ch thước lớn, 12 inch tr&ecirc;n bản Titanium v&agrave; Titanium+ hoặc 10 inch tr&ecirc;n bản Ambient v&agrave; Sport. Đi c&ugrave;ng với đ&oacute; l&agrave; hệ thống 8 loa với đầy đủ kết nối như: Apple CarPlay, Android Auto, USB, Bluetooth...</p>\r\n\r\n<p><strong>2.2. Hệ thống ghế</strong></p>\r\n\r\n<p>Ford trang bị ghế bọc da cho cả 4 phi&ecirc;n bản của xe, đi c&ugrave;ng với đ&oacute; l&agrave; ghế l&aacute;i chỉnh điện 8 hướng. Thậm ch&iacute;, tr&ecirc;n 2 phi&ecirc;n bản Titanium cả ghế h&agrave;nh kh&aacute;ch ph&iacute;a trước cũng c&oacute; thể chỉnh điện.</p>\r\n\r\n<p>Kh&ocirc;ng gian giữa c&aacute;c h&agrave;ng ghế rất rộng r&atilde;i, h&agrave;ng ghế thứ 2 c&ograve;n c&oacute; thể trượt về ph&iacute;a trước, gi&uacute;p tăng kh&ocirc;ng gian cho h&agrave;ng 3. Tất cả c&aacute;c h&agrave;ng ghế đều c&oacute; hộc để đồ, cổng sạc v&agrave; cửa gi&oacute; điều h&ograve;a.</p>\r\n', 'Turbo Diesel 2.0L i4 TDCi', 3, 2, 3, 2, 21, '2023-10-03 17:17:43', 0, NULL),
(56, 'Hyundai Santa Fe 2021', 1450000000, 2, 'Lai động mọi giác quan', '<p><strong>1. K&iacute;ch thước, trọng lượng</strong></p>\r\n\r\n<p>Theo đ&oacute;, Hyundai Santa Fe 2021 ra mắt với hệ thống khung gầm N-Platform mới, đồng thời tạo h&igrave;nh về thiết kế theo xu hướng lớn v&agrave; sang trọng hơn. K&iacute;ch thước d&agrave;i x rộng x cao lần lượt của SUV n&agrave;y lần lượt 4.785 x 1.900 x 1.685 mm. So với thế hệ trước, Santa Fe d&agrave;i hơn 15 mm, rộng hơn 10 mm v&agrave; cao hơn 5 mm. Chiều d&agrave;i cơ sở ở mức 2.765 mm kh&ocirc;ng thay đổi. Xe sở hữu khoảng s&aacute;ng gầm 185mm, g&oacute;c tiếp cận trước 18,5 độ v&agrave; g&oacute;c tho&aacute;t sau 21,2 độ, gi&uacute;p xe linh hoạt khi vận h&agrave;nh ở địa h&igrave;nh kh&oacute;.</p>\r\n\r\n<p><strong>2. Khung gầm, hệ thống treo</strong></p>\r\n\r\n<p>Xe được trang bị khung gầm N-Platform ho&agrave;n to&agrave;n mới thay cho khung gầm Y-Platform ở bản tiền nhiệm. Khung gầm N-Platform nhẹ hơn, linh hoạt hơn, đem lại hiệu quả kh&iacute; động học tốt hơn. Đi c&ugrave;ng với đ&oacute; l&agrave; cấu tr&uacute;c đa tải, dập n&oacute;ng v&agrave; th&eacute;p si&ecirc;u cường gi&uacute;p tăng th&ecirc;m sự an to&agrave;n cho h&agrave;nh kh&aacute;ch tr&ecirc;n xe.</p>\r\n\r\n<p><strong>3. Đầu xe</strong></p>\r\n\r\n<p>Mẫu CUV hạng D mới đến từ nh&agrave;&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/hang-xe/hyundai-9\">Hyundai</a>&nbsp;được thiết kế lại phần đầu xe với lưới tản nhiệt mới, mở rộng hơn, kh&ocirc;ng kh&eacute;p k&iacute;n để nối liền sang đ&egrave;n pha với đ&egrave;n LED ban ng&agrave;y h&igrave;nh chữ T c&aacute;ch điệu. Thiết kế n&agrave;y khiến đầu xe trở n&ecirc;n tr&ograve;n trịa hơn, lạ mắt xen ch&uacute;t tinh nghịch với miệng rộng, kh&ocirc;ng c&ograve;n vẻ cứng c&aacute;p với lưới tản nhiệt sắc n&eacute;t tr&ecirc;n bản cũ.</p>\r\n\r\n<p>Điểm nhấn l&agrave; đầu xe nằm ở bộ đ&egrave;n định vị chạy ban ng&agrave;y Daytime Running Light (DRL) tạo h&igrave;nh T-Shaped. Hyundai Santa Fe 2021 ra mắt với đ&egrave;n pha Adaptive LED th&iacute;ch ứng tự động (tr&ecirc;n một số phi&ecirc;n bản) c&ugrave;ng c&ocirc;ng nghệ Full-LED. Cụm đ&egrave;n được thiết kế đặt ngang v&agrave; cao hơn so với c&aacute;ch đặt dọc v&agrave; thấp của bản tiền nhiệm.</p>\r\n\r\n<p>Khi xe bật đ&egrave;n pha, hệ thống camera sẽ qu&eacute;t li&ecirc;n tục, nếu ph&aacute;t hiện phương tiện ngược chiều, v&ugrave;ng chiếu s&aacute;ng sẽ hạ thấp để tr&aacute;nh g&acirc;y ch&oacute;i mắt v&agrave; tự động điều chỉnh lại như cũ khi hai xe vượt qua nhau.</p>\r\n\r\n<p><strong>4. Khoang l&aacute;i</strong></p>\r\n\r\n<p>Kh&ocirc;ng gian cabin bắt mắt với chất liệu da cao cấp, c&ugrave;ng c&aacute;c chi tiết ốp nhựa giả da tr&ecirc;n c&aacute;nh cửa. Hyundai Santa Fe 2021 trang bị đ&egrave;n Ambient LED cho ph&eacute;p người d&ugrave;ng đổi m&agrave;u theo &yacute; th&iacute;ch, t&acirc;m trạng. V&ocirc;-lăng vẫn sở hữu thiết kế 3 chấu, bọc da v&agrave; c&oacute; c&aacute;c hệ thống n&uacute;t điều chỉnh menu, đ&agrave;m thoại rảnh tay, Cruise Control&hellip;</p>\r\n\r\n<p>Đồng hồ th&ocirc;ng tin ph&iacute;a sau v&ocirc;-lăng dạng m&agrave;n h&igrave;nh điện tử c&oacute; k&iacute;ch thước 12,3 inch, hiển thị h&agrave;ng loạt th&ocirc;ng tin d&agrave;nh cho người l&aacute;i. Thậm ch&iacute;, ở phi&ecirc;n bản cao cấp nhất, m&agrave;n h&igrave;nh sẽ hiển thị h&igrave;nh ảnh điểm m&ugrave; ở ph&iacute;a người l&aacute;i muốn chuyển hướng, tăng th&ecirc;m độ an to&agrave;n. Ngo&agrave;i ra, Santa Fe 2021 c&ograve;n trang bị một m&agrave;n h&igrave;nh HUD, hiển thị th&ocirc;ng tin tr&ecirc;n k&iacute;nh l&aacute;i.</p>\r\n', 'G1.6T-GDI', 3, 3, 3, 2, 4, '2023-10-04 13:12:47', 0, NULL),
(57, 'Kia Sorento 2023', 1304000000, 2, 'Kiến tạo tương lai', '<p><strong>1. K&iacute;ch thước, trọng lượng</strong></p>\r\n\r\n<p>Kia Sorento phi&ecirc;n bản mới sở hữu k&iacute;ch thước tổng thể d&agrave;i, rộng, cao lần lượt l&agrave; 4.810 mm, 1.900 mm v&agrave; 1.700 mm; chiều d&agrave;i cơ sở của xe ở mức 2.815 mm; khoảng s&aacute;ng gầm của Sorento l&agrave; 176 mm.</p>\r\n\r\n<p><strong>2. Khung gầm, hệ thống treo</strong></p>\r\n\r\n<p>Cả 7 phi&ecirc;n bản của Sorento 2021 đều sử dụng hệ thống treo trước kiểu Macpherson v&agrave; treo sau kiểu Li&ecirc;n kết đa điểm. Với hệ thống treo n&agrave;y, chiếc xe c&oacute; thể tự tin di chuyển tr&ecirc;n c&aacute;c cung đường kh&oacute;, đường gập ghềnh, đường đất&hellip; m&agrave; kh&ocirc;ng gặp qu&aacute; nhiều trở ngại.</p>\r\n\r\n<p><strong>3. Đầu xe</strong></p>\r\n\r\n<p>Phần đầu xe sở hữu mặt ca-lăng h&igrave;nh &ldquo;mũi hổ&rdquo; rất truyền thống tr&ecirc;n&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/hang-xe/kia-14\">c&aacute;c mẫu xe Kia</a>. B&ecirc;n trong mặt ca-lăng l&agrave; sự kết hợp của c&aacute;c nan nhỏ c&ugrave;ng họa tiết nổi khối 3D h&igrave;nh mắt c&aacute;o. Cụm đ&egrave;n pha Projector được nối liền với mặt ca-lăng tr&ocirc;ng rất khỏe khoắn. Ph&iacute;a tr&ecirc;n mặt ca-lăng v&agrave; ph&iacute;a dưới cụm đ&egrave;n pha c&oacute; th&ecirc;m những dải viền mạ crom v&ocirc; c&ugrave;ng tinh tế v&agrave; đẹp mắt.</p>\r\n\r\n<p>Ph&iacute;a dưới c&oacute; th&ecirc;m một cụm lưới tản nhiệt c&oacute; cả đ&egrave;n sương m&ugrave; LED 2 tầng ở b&ecirc;n trong. Phần cản trước được mạ bạc kết hợp với c&aacute;c đường n&eacute;t, khối gồ v&ocirc; c&ugrave;ng nam t&iacute;nh đem lại một vẻ ngo&agrave;i mạnh mẽ, khỏe khoắn nhưng kh&ocirc;ng k&eacute;m phần trẻ trung.</p>\r\n\r\n<p><strong>4. Đu&ocirc;i xe</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đu&ocirc;i xe được thiết kế kh&aacute; ấn tượng với cụm đ&egrave;n hậu vu&ocirc;ng vức theo chiều dọc sử dụng c&ocirc;ng nghệ kh&aacute; tương đồng với mẫu xe Kia Telluride. Cản sau mạ bạc v&agrave; được thiết kế rất thể thao, trẻ trung. Ống xả được giấu kỹ ở b&ecirc;n dưới. Phần cốp c&oacute; t&iacute;nh năng mở điện tự động khi người l&aacute;i cầm ch&igrave;a kh&oacute;a đứng ở sau xe.</p>\r\n\r\n<p>B&ecirc;n tr&ecirc;n c&oacute; ăng-ten kiểu v&acirc;y c&aacute; đi c&ugrave;ng với c&aacute;nh lướt gi&oacute; cỡ lớn k&egrave;m đ&egrave;n phanh tr&ecirc;n cao v&agrave; cần gạt mưa k&iacute;nh sau</p>\r\n', '1.6', 3, 3, 3, 4, 16, '2023-10-03 16:37:45', 0, NULL),
(58, 'VIOS 2023', 4300000000, 2, 'getAllDataWithFirstImgByCarTypeIDgetAllDataWithFirstImgByCarTypeID', '<p>getAllDataWithFirstImgByCarTypeIDgetAllDataWithFirstImgByCarTypeIDgetAllDataWithFirstImgByCarTypeIDgetAllDataWithFirstImgByCarTypeIDgetAllDataWithFirstImgByCarTypeID</p>\r\n', '1.5', 2, 4, 2, 2, 1, '2023-10-24 21:48:42', 1, '2023-10-24 21:48:51'),
(59, 'GLC 200 4Matic 2023', 2299000000, 2, 'Cú lột xác đầy ấn tượng', '<p><strong>1.Đầu xe</strong></p>\r\n\r\n<p>Quay trở lại với những thay đổi ấn tượng, đầu xe của Mercedes GLC 200 4Matic 2023 c&oacute; thiết kế ho&agrave;n to&agrave;n mới với những đường n&eacute;t thể thao, sang trọng v&agrave; c&oacute; phần thanh tho&aacute;t hơn. Theo đ&oacute;, nổi bật tại khu vực n&agrave;y đ&oacute; ch&iacute;nh l&agrave; cụm lưới tản nhiệt được viền chrome s&aacute;ng b&oacute;ng, thanh ngang v&agrave; trung t&acirc;m được lợi bỏ đi một c&aacute;i để tạo cảm gi&aacute;c thanh tho&aacute;t khi nh&igrave;n v&agrave;o. Cũng trong phi&ecirc;n bản mới, hệ thống chiếu s&aacute;ng của Mercedes GLC 200 4Matic 2023 n&agrave;y đ&atilde; được thiết kế liền với lớp tựa nhiệt đẹp v&agrave; sử dụng c&ocirc;ng nghệ LED High Performance t&iacute;ch hợp c&ugrave;ng hệ thống đ&egrave;n tự động tắt, điều chỉnh theo hướng l&aacute;i của bạn. Ngo&agrave;i ra, đầu xe cũng được thiết kế với ba b&oacute;ng xếp tầng v&agrave; c&oacute; th&ecirc;m một dải đ&egrave;n LED định vị b&ecirc;n ngo&agrave;i.</p>\r\n\r\n<p><strong>2. Th&acirc;n xe</strong></p>\r\n\r\n<p>Mặc d&ugrave; c&oacute; k&iacute;ch thước tổng thể tăng nhẹ so với phi&ecirc;n bản cũ, nhưng Mercedes GLC 200 4Matic 2023 vẫn giữ được thiết kế chau chuốt v&agrave; thể thao. Nh&igrave;n từ b&ecirc;n h&ocirc;ng, c&aacute;c bạn sẽ thấy được hai đường g&acirc;n dập ch&igrave;m dọc b&ecirc;n th&acirc;n xe tạo cảm gi&aacute;c năng động, thể thao cho chiếc SUV n&agrave;y. Ngo&agrave;i ra, bao quanh c&aacute;c cửa, m&eacute;p dưới c&aacute;nh cửa, v&agrave; c&aacute;c chi tiết của xe được mạ chrome s&aacute;ng b&oacute;ng tạo cảm gi&aacute;c sang trọng. Đặc biệt, thiết kế bộ m&acirc;m đ&uacute;c 19 inch v&agrave; 6 chấu của Mercedes GLC 200 4Matic 2023 cũng nhận được rất nhiều phản hồi ấn tượng từ kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p><strong>3. Đu&ocirc;i xe</strong></p>\r\n\r\n<p>Di chuyển ra đằng sau, c&aacute;c bạn sẽ thấy một d&aacute;ng vẻ ho&agrave;n to&agrave;n mới ở phần dưới xe Mercedes GLC 200 4Matic 2023.<br />\r\nTheo đ&oacute;, cụm đ&egrave;n hậu được l&agrave;m lại, loại bỏ thiết kế truyền thống v&agrave; thay bằng hai vạch nằm ngang, từ đ&oacute; gi&uacute;p đu&ocirc;i xe tr&ocirc;ng mềm mại hơn. B&ecirc;n dưới l&agrave; cần sau với đ&aacute;p kim loại s&aacute;ng m&agrave;u, hai b&ecirc;n l&agrave; cụm ống xả được đặt cận đối c&ugrave;ng đối diện. Đặc biệt, dưới xe GLC 200 4Matic cũng được trang bị t&iacute;nh năng đ&aacute; cốp vốn chỉ c&oacute; tr&ecirc;n GLC 300 AMG, điều n&agrave;y gi&uacute;p n&acirc;ng cao sự hữu &iacute;ch cho cặp xe khi người d&ugrave;ng mang nhiều đồ đạc.</p>\r\n\r\n<p><strong>4. Tiện &iacute;ch</strong></p>\r\n\r\n<p>Nhắc đến thương hiệu Mercedes, chắc chắn, ch&uacute;ng ta kh&ocirc;ng thể n&agrave;o bỏ qua được c&aacute;c trang bị tiện &iacute;ch m&agrave; h&atilde;ng xe n&agrave;y đầu tư cho những &quot;đứa con&quot; của m&igrave;nh. Cụ thể, với Mercedes GLC 200 4Matic 2023, điểm nổi bật nhất ch&iacute;nh l&agrave; m&agrave;n h&igrave;nh trung t&acirc;m c&oacute; k&iacute;ch thước 11.9 inch. M&agrave;n h&igrave;nh hiện đại n&agrave;y c&oacute; kết nối với Apple CarPlay/Android Auto kh&ocirc;ng d&acirc;y. Ngo&agrave;i ra, xe c&ograve;n c&oacute; hệ thống &acirc;m thanh với 13 loa Burmester, điều h&ograve;a tự động 2 v&ugrave;ng, v&agrave; đ&egrave;n nội thất với 64 m&agrave;u kh&aacute;c nhau</p>\r\n', '2.0 I4 Turbo', 3, 1, 3, 2, 7, '2023-10-14 11:06:55', 0, NULL),
(60, 'EQS 580 4Matic 2022', 5959000000, 1, 'Dấu ấn của kỷ nguyên mới', '<p>Cả hai phi&ecirc;n bản giống nhau phần lớn ở thiết kế ngoại thất với g&oacute;i AMG Line. Mặt ca-lăng kh&aacute;c biệt với c&aacute;c sản phẩm m&aacute;y xăng/dầu của Mercedes khi thiết kế tr&agrave;n viền, nối liền đ&egrave;n pha Digital LED. C&ugrave;ng lắp la-zăng 21 inch, phong c&aacute;ch thể thao tr&ecirc;n 450+, kiểu sang trọng hơi hướng Maybach tr&ecirc;n 580 4Matic. Hệ thống đ&aacute;nh l&aacute;i b&aacute;nh sau 4,5 độ l&agrave; trang bị ti&ecirc;u chuẩn tr&ecirc;n hai bản EQS.</p>\r\n\r\n<p>EQS 580 4Matic c&oacute; hai m&ocirc;tơ điện lắp ở trục trước v&agrave; sau, c&ocirc;ng suất 516 m&atilde; lực, m&ocirc;-men xoắn cực đại 858 Nm. Xe tăng tốc 0 &ndash; 100 km/h trong 4,3 gi&acirc;y, dẫn động 4 b&aacute;nh to&agrave;n thời gian.</p>\r\n\r\n<p>M&ocirc;tơ điện tr&ecirc;n phi&ecirc;n bản n&agrave;y đặt ở ph&iacute;a sau, c&ocirc;ng suất 329 m&atilde; lực v&agrave; 565 Nm m&ocirc;-men xoắn cực đại. Xe tăng tốc 0 &ndash; 100 km/h trong 6,2 gi&acirc;y, dẫn động cầu sau. Xe c&oacute; qu&atilde;ng đường di chuyển 642-783 km sau mỗi lần sạc.</p>\r\n\r\n<p>Hai phi&ecirc;n bản EQS đi k&egrave;m khả năng sạc từ 10% l&ecirc;n 80% trong 31 ph&uacute;t nếu sử dụng bộ sạc nhanh DC. Hoặc c&oacute; thể được sạc đầy trong 10 giờ nếu d&ugrave;ng bộ sạc AC Mode 3 ti&ecirc;u chuẩn 11 kW (điện 3 pha).</p>\r\n\r\n<p>Nội thất tr&ecirc;n EQS 450+ tương tự tr&ecirc;n S-class m&aacute;y xăng. C&aacute;c chất liệu da, gỗ ngập tr&agrave;n ở khoang l&aacute;i. Bản EQS 580 4Matic cao cấp hơn khi trang bị hệ thống hiển thị th&ocirc;ng tin bằng m&agrave;n h&igrave;nh v&ocirc; cực. C&oacute; 3 m&agrave;n h&igrave;nh tr&ecirc;n khoang l&aacute;i mẫu xe n&agrave;y của Mercedes, gồm m&agrave;n h&igrave;nh sau v&ocirc;-lăng 12,3 inch, m&agrave;n h&igrave;nh trung t&acirc;m OLED 17,7 inch v&agrave; m&agrave;n h&igrave;nh OLED cho h&agrave;nh kh&aacute;ch ph&iacute;a trước 12,3 inch.</p>\r\n\r\n<p>Thiết kế v&ocirc;-lăng điệu đ&agrave;, bọc vật liệu Nappa tr&ecirc;n EQS 580 4Matic với c&aacute;c ph&iacute;m điều khiển cảm ứng. Xe đi k&egrave;m c&aacute;c tiện nghi như điều ho&agrave; tự động 4 v&ugrave;ng, hệ thống lọc kh&ocirc;ng kh&iacute; v&agrave; bụi bẩn, đ&egrave;n viền nội thất. Đồng hồ dạng kỹ thuật số ph&iacute;a sau v&ocirc;-lăng. M&agrave;n h&igrave;nh trung t&acirc;m k&iacute;ch thước 17,7 inch. Hai m&agrave;n h&igrave;nh giải tr&iacute; ri&ecirc;ng cho h&agrave;ng ghế sau. Cả hai h&agrave;ng ghế đều bọc da th&ocirc;ng hơi tựa lưng k&egrave;m chức năng massage.</p>\r\n', '516 mã lực', 2, 4, 2, 2, 7, '2023-10-24 21:18:56', 0, NULL),
(61, 'Kia Carnival Premium 2022', 1359000000, 3, 'Thế hệ thứ 4 của mẫu Sedona', '<p><strong>1. K&iacute;ch thước, trọng lượng</strong></p>\r\n\r\n<p>Kia Carnival mới c&oacute; k&iacute;ch thước tổng thể d&agrave;i 5.155 mm, rộng 1.995 mm v&agrave; cao 1.775 mm; chiều d&agrave;i cơ sở của xe ở mức 3.090 mm. Như vậy, so với thế hệ cũ, mẫu xe c&oacute; k&iacute;ch thước lớn hơn hẳn. Cụ thể, xe d&agrave;i hơn 40 mm, rộng hơn 10 mm v&agrave; cao hơn 20 mm. Trục cơ sở cũng tăng th&ecirc;m 30 mm. Khoảng s&aacute;ng gầm xe 172 mm, tức tăng th&ecirc;m 9 mm. Những thay đổi n&agrave;y gi&uacute;p Carnival tr&ocirc;ng to lớn v&agrave; nội thất rộng r&atilde;i hơn.</p>\r\n\r\n<p><strong>2. Khung gầm, hệ thống treo</strong></p>\r\n\r\n<p>Kia Carnival sử dụng khung gầm liền khối với kết cấu ph&acirc;n t&aacute;n lực, giảm t&aacute;c động ở ph&iacute;a trước, tăng cường th&eacute;p cường lực tại c&aacute;c vị tr&iacute; trọng yếu gi&uacute;p tối ưu h&oacute;a trọng lượng, tạo sự cứng vững v&agrave; an to&agrave;n.</p>\r\n\r\n<p><strong>3. Đầu xe</strong></p>\r\n\r\n<p>Phần đầu xe của Kia Carnival g&acirc;y ấn tượng mạnh với thiết kế mặt ca-lăng mũi hổ c&aacute;ch điệu. Lưới tản nhiệt gồm nhiều được tạo h&igrave;nh 3D với nhiều khối nhỏ mạ crom v&ocirc; c&ugrave;ng bắt mắt v&agrave; thời thượng. Cả tr&ecirc;n v&agrave; dưới của mặt ca-lăng đều c&oacute; những đường viền mạ crom s&aacute;ng b&oacute;ng, đem lại cảm gi&aacute;c sang trọng lẫn hiện đại.</p>\r\n\r\n<p>Cụm đ&egrave;n pha với 2 b&oacute;ng Projector sở dụng ho&agrave;n to&agrave;n c&ocirc;ng nghệ LED được nối liền mạch với lưới tản nhiệt. Dải đ&egrave;n định vị cũng được l&agrave;m c&aacute;ch điệu theo phong c&aacute;ch trẻ trung v&agrave; hiện đại.&nbsp;</p>\r\n\r\n<p><strong>4. Th&acirc;n xe</strong></p>\r\n\r\n<p>Thiết kế phần th&acirc;n xe của mẫu MPV được lấy cảm hứng từ c&aacute;c d&ograve;ng xe gầm cao của nh&agrave;&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/hang-xe/kia-14\">Kia</a>&nbsp;như Sorento, Sportage với tạo h&igrave;nh nhiều đường thẳng, &iacute;t điểm bo tr&ograve;n hơn thế hệ cũ, cho cảm gi&aacute;c thanh tho&aacute;t.&nbsp;</p>\r\n\r\n<p>Với phần đu&ocirc;i d&agrave;i, Kia Carnival tạo cảm gi&aacute;c trường d&aacute;ng giống&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/loai-xe/station-wagon-8\">c&aacute;c mẫu xe Wagon</a>. Chiều d&agrave;i cơ sở lớn cũng gi&uacute;p cho kh&ocirc;ng gian trong xe trở n&ecirc;n rộng r&atilde;i hơn. Cửa sau của xe l&agrave; cửa điện mở ngang v&ocirc; c&ugrave;ng hiện đại. Trụ C của xe được thiết kế phay kim loại đem lại th&ecirc;m sự ấn tượng cho phần th&acirc;n xe.</p>\r\n', '2.2 Smartstream', 3, 1, 4, 2, 16, '2023-10-14 11:59:03', 0, NULL),
(62, 'Honda Civic RS 2022', 870000000, 4, 'Kiến tạo chuẩn mực hoàn hảo', '<p>Civic thế hệ thứ 11 thiết kế mới, thể thao hơn, nổi bật với đường g&acirc;n mạnh mẽ, đầu xe d&agrave;i v&agrave; thấp, cột A đẩy về sau, diện t&iacute;ch phần k&iacute;nh l&aacute;i mở rộng hơn. Đ&egrave;n pha v&agrave; đ&egrave;n hậu LED kết nối với nhau bằng đường g&acirc;n th&acirc;n xe. Đ&egrave;n hậu thiết kế mới, c&aacute;nh gi&oacute; v&agrave; cản sau thể thao, ống xả k&eacute;p chia đều mỗi b&ecirc;n. V&agrave;nh 18 inch năm chấu k&eacute;p.</p>\r\n\r\n<p>Nội thất tối giản, tập trung v&agrave;o người l&aacute;i. Cụm đồng hồ điện tử 10,2 inch mới, t&ugrave;y chọn hiển thị. V&ocirc;-lăng bọc da, t&iacute;ch hợp nhiều ph&iacute;m điều khiển v&agrave; lẫy chuyển số. M&agrave;n h&igrave;nh cảm ứng 9 inch độ ph&acirc;n giải cao cho hệ thống th&ocirc;ng tin giải tr&iacute;, hỗ trợ kết nối Apple CarPlay kh&ocirc;ng d&acirc;y. Điều h&ograve;a tự động hai v&ugrave;ng, cửa gi&oacute; h&agrave;ng ghế sau, khởi động xe từ xa. Hệ thống loa Bose 12 loa, sạc điện thoại kh&ocirc;ng d&acirc;y tr&ecirc;n bản RS.</p>\r\n\r\n<p>Ở thế hệ mới, h&atilde;ng xe Nhật Bản trang bị cho Civic phần mềm kiểm so&aacute;t xe th&ocirc;ng qua ứng dụng Honda Connect, gi&uacute;p theo d&otilde;i th&ocirc;ng tin, t&igrave;nh trạng xe, t&igrave;m xe trong b&atilde;i đỗ, thiết lập giới hạn v&ugrave;ng tốc độ, bật đ&egrave;n từ xa, lưu h&agrave;nh vi l&aacute;i xe, lịch sử h&agrave;nh tr&igrave;nh, nhắc lịch bảo dưỡng.</p>\r\n\r\n<p>Lần đầu ti&ecirc;n, Civic thế hệ mới lắp hệ thống c&ocirc;ng nghệ hỗ trợ l&aacute;i an to&agrave;n Honda Sensing, như phanh tự động giảm thiểu va chạm CMBS, đ&egrave;n pha th&iacute;ch ứng tự động AHB, kiểm so&aacute;t h&agrave;nh tr&igrave;nh th&iacute;ch ứng gồm dải tốc độ thấp, th&ocirc;ng b&aacute;o xe ph&iacute;a trước khởi h&agrave;nh LCDN, cảnh b&aacute;o chệch l&agrave;n RDM, hỗ trợ giữ l&agrave;n LKAS.</p>\r\n\r\n<p>Những t&iacute;nh năng an to&agrave;n kh&aacute;c như phanh tay điện tử, camera l&ugrave;i 3 g&oacute;c, nhắc kiểm tra h&agrave;ng ghế sau trước khi khởi h&agrave;nh, hỗ trợ đ&aacute;nh l&aacute;i chủ động AHA, c&acirc;n bằng điện tử, hỗ trợ khởi h&agrave;nh ngang dốc, chế độ quan s&aacute;t l&agrave;n đường LaneWatch, cảnh b&aacute;o buồn ngủ.</p>\r\n\r\n<p>Civic thế hệ mới trang bị động cơ 1.5 I4 tăng &aacute;p, c&ocirc;ng suất 176 m&atilde; lực tại 6.000 v&ograve;ng/ph&uacute;t, m&ocirc;-men xoắn cực đại 240 Nm từ 1.700 đến 4.500 v&ograve;ng/ph&uacute;t. Hộp số CVT, dẫn động cầu trước. Xe c&oacute; ba chế độ l&aacute;i, Eco, Sport v&agrave; Normal. Theo kết quả thử nghiệm của nh&agrave; sản xuất, Civic thế hệ mới ti&ecirc;u thụ 6,35 l&iacute;t/100 km đường hỗn hợp cho bản E, 5,98 l&iacute;t/100 km với bản G v&agrave; 6,52 l&iacute;t/100 km bản RS.</p>\r\n', '1.5 VTEC Turbo', 2, 1, 2, 3, 5, '2023-10-15 13:46:41', 0, NULL),
(63, 'Toyota Corolla Altis HEV 2023', 870000000, 10, 'An toàn thăng hạng trải nghiệm', '<p>Điểm nhấn nội thất của Altis 2023 nằm ở m&agrave;n h&igrave;nh hiển thị đa th&ocirc;ng tin MID tăng k&iacute;ch thước 12,3 inch tr&ecirc;n tất cả c&aacute;c phi&ecirc;n bản, trong khi bản cũ d&ugrave;ng m&agrave;n 7 inch. Bản cao nhất 1.8 HEV n&acirc;ng cấp l&ecirc;n camera 360. Bản 1.8 V bổ sung t&iacute;nh năng an to&agrave;n Toyota Safery Sense với cảnh b&aacute;o điểm m&ugrave;, cảnh b&aacute;o phương tiện cắt ngang ph&iacute;a sau v&agrave; gương hậu ngo&agrave;i tự động điều chỉnh khi l&ugrave;i.</p>\r\n\r\n<p>Bản hybrid 1.8 HEV gồm m&aacute;y xăng 1.8 (97 m&atilde; lực, 142 Nm), kết hợp m&ocirc;tơ điện (71 m&atilde; lực, 163 Nm) sử dụng hộp số CVT.</p>\r\n', '1.8 2ZR-FXE', 2, 3, 2, 3, 1, '2023-10-15 14:00:10', 0, NULL),
(64, 'VIOS G 2023', 592000000, 10, 'Bứt phá an toàn, mở ngàn trải nghiệm', '<p>So với&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/doi-xe/toyota-vios-2021-147\">bản tiền nhiệm</a>, Toyota Vios 2023 lược bỏ c&aacute;c bản E MT v&agrave; E CVT 7 t&uacute;i kh&iacute;, chỉ c&ograve;n c&aacute;c bản 3 t&uacute;i kh&iacute;, gi&aacute; giảm lần lượt 10 triệu v&agrave; 14 triệu đồng. Ri&ecirc;ng bản G CVT vẫn giữ nguy&ecirc;n, kh&ocirc;ng tăng gi&aacute;. Bản G-RS vốn k&eacute;n kh&aacute;ch cũng ngưng ph&acirc;n phối.</p>\r\n\r\n<p>Về thiết kế, Toyota Vios mới được thiết kế lại phần đầu c&acirc;n đối, vu&ocirc;ng vức hơn. Đ&egrave;n pha LED trở th&agrave;nh trang bị ti&ecirc;u chuẩn, tạo h&igrave;nh khoẻ khoắn. Cản trước v&agrave; mặt ca-lăng cũng được thiết kế lại nhưng kh&aacute; rối so với bản cũ.</p>\r\n\r\n<p>So với bản đời tiền nhiệm, h&atilde;ng thay đổi thiết kế la-zăng, trong khi k&iacute;ch thước vẫn giữ 15 inch. Kh&ocirc;ng c&oacute; kh&aacute;c biệt n&agrave;o về đ&egrave;n hậu tr&ecirc;n bản mới. Ri&ecirc;ng cản sau với dải phản quang được tinh chỉnh lại.</p>\r\n\r\n<p>Ở nội thất, Vios 2023 kh&ocirc;ng thay đổi nhiều c&aacute;ch sắp xếp c&aacute;c chi tiết. H&atilde;ng n&acirc;ng cấp m&agrave;n h&igrave;nh từ 7 inch l&ecirc;n 9 inch, v&ocirc;-lăng th&ecirc;m lẫy chuyển số cho bản G. Hai bản thấp hơn th&ecirc;m cổng sạc USB cho h&agrave;ng ghế sau.</p>\r\n\r\n<p>Động cơ của Toyota Vios mới vẫn duy tr&igrave; loại 1.5 l&iacute;t, c&ocirc;ng suất 107 m&atilde; lực, m&ocirc;-men xoắn 140 Nm. Tuỳ chọn hộp số s&agrave;n 5 cấp hoặc CVT.</p>\r\n\r\n<p>Toyota Vios 2023 nay c&oacute; th&ecirc;m hai t&iacute;nh năng an to&agrave;n mới thuộc g&oacute;i TSS l&agrave; cảnh b&aacute;o va chạm ph&iacute;a trước, cảnh b&aacute;o lệch l&agrave;n đường v&agrave; 2 t&iacute;nh năng mới n&agrave;y được bổ sung cho phi&ecirc;n bản G.</p>\r\n\r\n<p>Cải tiến mới tr&ecirc;n phi&ecirc;n bản 2023 hứa hẹn gi&uacute;p Vios giữ vững vị thế xe b&aacute;n chạy nhất ph&acirc;n kh&uacute;c. Đại diện Toyota Việt Nam cũng cho biết, Vios 2023 kh&ocirc;ng thuộc phạm vi ảnh hưởng bởi vụ việc thử nghiệm an to&agrave;n của Daihatsu thời gian vừa qua.</p>\r\n\r\n<p>Vios 2023 ra mắt trong bối cảnh thị trường &ocirc;t&ocirc; Việt Nam k&eacute;m s&ocirc;i động hơn nhiều so với c&ugrave;ng kỳ năm ngo&aacute;i. Doanh số mẫu xe chủ lực của Toyota trong 3 th&aacute;ng đầu 2023 cũng đang giảm s&acirc;u, hơn 50% so với c&ugrave;ng kỳ 2022.</p>\r\n', '1.5 2NR-FE', 2, 1, 2, 3, 1, '2023-10-15 15:36:41', 0, NULL),
(65, 'Toyota Fortuner 2022', 1229000000, 10, 'Lịch lãm – Phong cách', '<p><strong>1. K&iacute;ch thước, trọng lượng</strong></p>\r\n\r\n<p>Toyota Fortuner sở hữu k&iacute;ch thước tổng thể d&agrave;i, rộng, cao l&agrave; 4.795 mm, 1.855 mm v&agrave; 1.835 mm; chiều d&agrave;i cơ sở ở mức 2.745 mm. C&oacute; thể n&oacute;i Fortuner&nbsp;sở hữu k&iacute;ch thước khi&ecirc;m tốn nhất trong ph&acirc;n kh&uacute;c SUV hạng D so với c&aacute;c đối thủ kh&aacute;c như:&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/dong-xe/kia-sorento-71\">Kia Sorento</a>,&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/dong-xe/ford-everest-38\">Ford Everest</a>,&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/dong-xe/mitsubishi-pajero-sport-124\">Mitsubishi Pajero Sport</a>&nbsp;hay&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/dong-xe/isuzu-mu-x-55\">Isuzu mu-X</a>. Tuy nhi&ecirc;n, Fortuner lại sở hữu khoảng s&aacute;ng gầm v&ocirc; c&ugrave;ng ấn tượng, l&ecirc;n tới 279 mm, cao hơn hẳn so với c&aacute;c đối thủ.</p>\r\n\r\n<p><strong>2. Khung gầm, hệ thống treo</strong></p>\r\n\r\n<p>Fortuner được trang bị hệ thống treo trước độc lập, tay đ&ograve;n k&eacute;p với thanh c&acirc;n bằng; hệ thống treo sau kiểu phụ thuộc, li&ecirc;n kết 4 điểm. Phanh của xe đều sử dụng phanh đĩa, tuy nhi&ecirc;n phanh trước sẽ l&agrave; loại phanh đĩa tản nhiệt.</p>\r\n\r\n<p><strong>3. Đầu xe</strong></p>\r\n\r\n<p>Phần đầu xe được chau chuốt với mặt ca-lăng c&aacute; t&iacute;nh, g&oacute;c cạnh v&agrave; rất thể thao. Toyota Fortuner được tạo h&igrave;nh theo phong c&aacute;ch chữ X, lấy cảm hứng từ d&ograve;ng xe Lexus hạng sang của h&atilde;ng Nhật. Đ&egrave;n chiếu s&aacute;ng loại LED to&agrave;n phần, gi&uacute;p tăng hiệu quả chiếu s&aacute;ng v&agrave; tăng t&iacute;nh thẩm mỹ. Phần đầu xe cũng được trang bị hệ thống cảm biến v&agrave; camera, ngo&agrave;i ra c&ograve;n c&oacute; hệ thống radar của g&oacute;i c&ocirc;ng nghệ trang bị Toyota Safety Sense được ẩn ph&iacute;a sau logo.</p>\r\n\r\n<p><strong>4. Đu&ocirc;i xe</strong></p>\r\n\r\n<p>Phần đu&ocirc;i xe của Fortuner được thay đổi nhẹ so với phi&ecirc;n bản cũ. Cụm đ&egrave;n sau LED được thiết kế với đồ hoạ mới, gi&uacute;p bắt mắt v&agrave; tăng khả năng nhận diện hơn. N&oacute;c xe được trang bị phần đu&ocirc;i gi&oacute;, kết hợp với Ăng-ten dạng v&acirc;y c&aacute; mập v&ocirc; c&ugrave;ng thể thao. Đu&ocirc;i xe cũng được lắp đặt đầy đủ cảm biến l&ugrave;i c&ugrave;ng Camera.</p>\r\n', '2TR-FE (2.7L)', 3, 2, 3, 2, 1, '2023-10-15 15:13:38', 0, NULL),
(66, 'Toyota Avanza Premio 2022', 598000000, 10, 'Đồng hành bền bỉ, giá trị tối ưu', '<p><strong>1. K&iacute;ch thước, trọng lượng</strong></p>\r\n\r\n<p>Avanza Premio sở hữu k&iacute;ch thước tổng thể d&agrave;i, rộng, cao lần lượt l&agrave; 4.395 x 1.730 x 1.700 (mm). Chiều d&agrave;i cơ sở 2.750 mm. So với thế hệ cũ, Avanza Premio d&agrave;i hơn 205 mm, rộng hơn 70 mm. Tăng k&iacute;ch thước gi&uacute;p kh&ocirc;ng gian nội thất thoải m&aacute;i hơn trong những h&agrave;nh tr&igrave;nh d&agrave;i.</p>\r\n\r\n<p><strong>2. Khung gầm, hệ thống treo</strong></p>\r\n\r\n<p>Toyota Avanza Premio vẫn ph&aacute;t triển dựa tr&ecirc;n nền tảng khung gầm DNGA do h&atilde;ng con Daihatsu tinh chỉnh. Đ&acirc;y l&agrave; hệ thống khung gầm gi&uacute;p tối ưu trọng lượng v&agrave; tăng khả năng bảo vệ người d&ugrave;ng trước va chạm một c&aacute;ch tối ưu.</p>\r\n\r\n<p>Giống nhiều đối thủ trong ph&acirc;n kh&uacute;c xe sở hữu hệ thống treo trước MacPherson v&agrave; treo sạu dạng thanh xoắn. Đ&acirc;y l&agrave; hệ thống treo tối ưu h&agrave;ng đầu cho đ&ocirc; thị, mang tới cảm gi&aacute;c vận h&agrave;nh &ecirc;m &aacute;i m&agrave; lại rất tiết kiệm.</p>\r\n\r\n<p><strong>3. Đầu xe</strong></p>\r\n\r\n<p>Thiết kế l&agrave; một trong những yếu tố gi&uacute;p Avanza Premio ghi điểm trong mắt kh&aacute;ch Việt. Tổng thể ngoại thất trẻ trung v&agrave; bắt mắt hơn so với phi&ecirc;n bản cũ. To&agrave;n bộ mặt trước của Avanza Premio đều sở hữu thiết kế mới: Lưới tản nhiệt mở rộng theo h&igrave;nh thang, Đ&egrave;n chiếu s&aacute;ng LED đa khoang tạo h&igrave;nh kh&aacute; sắc sảo, Đ&egrave;n sương m&ugrave; được đặt ở vị tr&iacute; cao hơn&hellip;</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, phần đầu xe c&ograve;n to&aacute;t l&ecirc;n vẻ hiện đại với những đường n&eacute;t g&oacute;c cạnh, nam t&iacute;nh. Ph&iacute;a tr&ecirc;n nắp capo cũng c&oacute; một v&agrave;i đường g&acirc;n nổi nhẹ l&agrave;m tăng th&ecirc;m sự khỏe khoắn ở phần ngoại thất. Điểm đ&aacute;ng tiếc c&oacute; lẽ tới từ việc phần đầu xe đ&atilde; bị cắt mất Camera ph&iacute;a trước đ&atilde; c&oacute; tr&ecirc;n mẫu xe anh em&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/dong-xe/toyota-veloz-cross-205\">Toyota Veloz Cross</a>.</p>\r\n\r\n<p><strong>4. Th&acirc;n xe</strong></p>\r\n\r\n<p>Tương tự như thiết kế của phần đầu xe, phần th&acirc;n cũng sở hữu những đường g&acirc;n dập nổi, gi&uacute;p tăng th&ecirc;m vẻ cứng c&aacute;p cho mẫu xe. Cửa xe với k&iacute;ch thước lớn, th&acirc;n xe cao gi&uacute;p kh&ocirc;ng gian b&ecirc;n trong rộng hơn so với bản tiền nhiệm.</p>\r\n\r\n<p>Gương chiếu hậu được đặt ở phần c&aacute;nh cửa thay v&igrave; g&oacute;c chữ A, điều n&agrave;y gi&uacute;p người l&aacute;i tầm nh&igrave;n tho&aacute;ng đ&atilde;ng v&agrave; bao qu&aacute;t hơn. B&ecirc;n cạnh đ&oacute; gương xe c&oacute; th&ecirc;m c&aacute;c t&iacute;nh năng chỉnh điện, cảnh b&aacute;o điểm m&ugrave; v&agrave; t&iacute;ch hợp đ&egrave;n xi-nhan b&aacute;o rẽ.</p>\r\n\r\n<p><strong>5. Đu&ocirc;i xe</strong></p>\r\n\r\n<p>Phần đu&ocirc;i của Avanza Premio được thiết kế vu&ocirc;ng vức, g&oacute;c gạnh với điểm nhấn cụm đ&egrave;n hậu v&agrave; đ&egrave;n xi-nhan LED thanh mảnh, nhỏ gọn. Ngo&agrave;i ra, ở phần đu&ocirc;i cũng được trang bị th&ecirc;m ăn-ten v&acirc;y c&aacute;, đ&egrave;n phanh tr&ecirc;n cao v&agrave; cảm biến đỗ xe ph&iacute;a sau. Điểm đ&aacute;ng tiếc duy nhất l&agrave; sẽ kh&ocirc;ng được trang bị Camera l&ugrave;i.</p>\r\n\r\n<p>Mặc d&ugrave; c&oacute; k&iacute;ch thước kh&aacute; khi&ecirc;m tốn so với c&aacute;c đối thủ, tuy nhi&ecirc;n khoang h&agrave;nh l&yacute; của Avanza Premio lại kh&ocirc;ng hề thua k&eacute;m với thể t&iacute;ch 498 l&iacute;t. B&ecirc;n cạnh đ&oacute;, để tối ưu th&ecirc;m kh&ocirc;ng gian chứa đồ th&igrave; h&agrave;ng ghế thứ 2 v&agrave; 3 c&oacute; thể gập phẳng.</p>\r\n', '1.5 2NR-VE', 3, 1, 4, 3, 1, '2023-11-01 20:25:56', 0, '2023-11-01 20:25:46'),
(67, 'Mitsubishi Xpander 2023 ', 698000000, 8, 'Ngôn ngữ Thiết kế Dynamic Shield', '<p><strong>Ngoại thất</strong></p>\r\n\r\n<p>Xpander Cross ph&aacute;t triển dựa tr&ecirc;n Xpander ti&ecirc;u chuẩn, v&igrave; thế sự tương đồng về ngoại h&igrave;nh của hai mẫu n&agrave;y dễ nhận thấy. Những thay đổi tr&ecirc;n&nbsp;Xpander bản n&acirc;ng cấp giữa chu kỳ&nbsp;ra mắt v&agrave;o th&aacute;ng 6/2022 cũng được ứng dụng tr&ecirc;n Xpander Cross 2023.</p>\r\n\r\n<p>Đ&egrave;n pha của Mitsubishi Xpander Cross thiết kế mới kiểu chữ T v&agrave; tự động bật/tắt. Ph&iacute;a sau, đ&egrave;n hậu LED cũng tinh chỉnh lại, đu&ocirc;i xe v&aacute;t vu&ocirc;ng vức v&agrave; nam t&iacute;nh hơn. Gạt mưa được n&acirc;ng cấp l&ecirc;n dạng tự động.</p>\r\n\r\n<p>Điểm nhận diện bản Xpander Cross với bản thường l&agrave; mặt ca-lăng hầm hố hơn, cản trước phong c&aacute;ch SUV, khoảng s&aacute;ng gầm n&acirc;ng l&ecirc;n 225 mm, cao nhất ph&acirc;n kh&uacute;c. Cũng chỉ tr&ecirc;n bản Cross, Xpander mới c&oacute; thanh gi&aacute; n&oacute;c, ốp cản sau phong c&aacute;ch SUV, la-zăng 17 inch 5 chấu k&eacute;p tạo h&igrave;nh ri&ecirc;ng, ốp v&egrave; hai b&ecirc;n h&ocirc;ng xe. Mẫu xe Nhật c&oacute; chiều d&agrave;i, rộng, cao lần lượt l&agrave; 4.595 mm, 1.790 mm, 1.750 mm, tức d&agrave;i hơn 95 mm so với phi&ecirc;n bản cũ.</p>\r\n\r\n<p>Mitsubishi cho biết hệ thống treo của xe được cải tiến với xi-lanh của giảm x&oacute;c sau c&oacute; đường k&iacute;nh lớn hơn. Van điều tiết hiệu suất cao loại mới được sử dụng ở giảm x&oacute;c trước. Đ&acirc;y cũng l&agrave; n&acirc;ng cấp m&agrave; h&atilde;ng đ&atilde; &aacute;p dụng tr&ecirc;n Xpander mới ra mắt năm ngo&aacute;i, nhằm gi&uacute;p gỉam độ bồng bềnh khi đi tốc độ cao.</p>\r\n\r\n<p><strong>Nội thất</strong></p>\r\n\r\n<p>Ngoại trừ v&ocirc;-lăng thiết kế mới như tr&ecirc;n mẫu SUV lớn nhất của h&atilde;ng - Pajero Sport, khoang l&aacute;i của Xpander Cross như&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/dong-xe/mitsubishi-xpander-125\">Xpander</a>. Kiểu thiết kế theo phương ngang (Horizontal Axis) gi&uacute;p tăng diện t&iacute;ch sử dụng cho h&agrave;nh kh&aacute;ch, c&aacute;c chi tiết gọn v&agrave; hiện đại hơn.</p>\r\n\r\n<p>Xe trang bị m&agrave;n h&igrave;nh giải tr&iacute; cảm ứng 9 inch, kết nối Apple CarPlay/Android Auto. Đồng hồ kỹ thuật số sau tay l&aacute;i k&iacute;ch thước 8 inch. Những tiện nghi kh&aacute;c trong xe như ghế bọc da, điều ho&agrave; điều khiển bằng lẫy k&egrave;m chức năng l&agrave;m lạnh nhanh Max Cool, cổng sạc cho h&agrave;ng ghế thứ hai, phanh tay điện tử, giữ phanh tự động.</p>\r\n', 'MIVEC 1.5 i4', 3, 1, 4, 2, 2, '2023-11-01 20:25:56', 0, '2023-11-01 20:25:46'),
(68, 'Honda BR-V 2023', 661000000, 4, 'Thiết kế cứng cáp, vững chãi mọi hành trình', '<p><strong>1. K&iacute;ch thước, trọng lượng</strong></p>\r\n\r\n<p>Mẫu xe Honda BR-V sở hữu k&iacute;ch thước tổng thể: d&agrave;i 4.490 mm, rộng 1.780 mm, cao 1.685 mm v&agrave; chiều d&agrave;i cơ sở 2.700 mm. So với đối thủ trong ph&acirc;n kh&uacute;c, k&iacute;ch thước BR-V tương đương với&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/dong-xe/mitsubishi-xpander-125\">Mitsubishi Xpander</a>. BR-V nhỉnh hơn về chiều rộng, trong khi Xpander hơn về chiều d&agrave;i v&agrave; trục cơ sở.</p>\r\n\r\n<p><strong>2. Khung gầm, hệ thống treo</strong></p>\r\n\r\n<p>Giống nhiều c&aacute;c mẫu xe đối thủ trong ph&acirc;n kh&uacute;c, Honda BR-V sử dụng khung gầm liền khối unibody đi c&ugrave;ng hệ thống treo trước MacPherson v&agrave; treo sau dạng dầm xoắn. Đ&acirc;y l&agrave; hệ thống treo rất ph&ugrave; hợp để đi trong đ&ocirc; thị nhờ v&agrave;o đem lại sự &ecirc;m &aacute;i, nhẹ nh&agrave;ng.&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/phan-khuc/phan-khuc-a-1\">C&aacute;c mẫu xe hạng A</a>&nbsp;hay hạng B như&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/dong-xe/hyundai-creta-204\">Creta</a>,&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/dong-xe/kia-morning-66\">Morning</a>,&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/dong-xe/hyundai-accent-47\">Accent</a>,&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/dong-xe/mazda-cx-3-96\">CX-3</a>... cũng đều sử dụng hệ thống treo n&agrave;y.</p>\r\n\r\n<p><strong>3. Đầu xe</strong></p>\r\n\r\n<p>Thiết kế đầu xe của Honda BR-V mang tới cảm gi&aacute;c thể thao v&agrave; kh&aacute; hiện đại. Mặt ca-lăng thiết kế đặc trưng Honda với logo chữ H cỡ lớn ở ch&iacute;nh giữa c&ugrave;ng thanh ngang được l&agrave;m theo kiểu đ&ocirc;i c&aacute;nh, k&eacute;o d&agrave;i ra ph&iacute;a cụm đ&egrave;n. Phần lưới tản nhiệt được thiết kế lại v&agrave; lớn hơn so với thế hệ trước đ&oacute;.</p>\r\n\r\n<p>Hệ thống đ&egrave;n tr&ecirc;n BR-V sử dụng c&ocirc;ng nghệ LED t&iacute;ch hợp đ&egrave;n ban ng&agrave;y kiểu chữ L ngược. Tuy nhi&ecirc;n đ&egrave;n chiếu s&aacute;ng sẽ chỉ c&oacute; ch&oacute;a phản xạ th&ocirc;ng thường chứ kh&ocirc;ng c&oacute; Projector. Đ&egrave;n sương m&ugrave; LED l&agrave; trang bị sẽ chỉ c&oacute; tr&ecirc;n bản L.</p>\r\n\r\n<p>Cản trước hầm hố, hốc gi&oacute; hai b&ecirc;n với khung h&igrave;nh chữ L, t&iacute;ch hợp đ&egrave;n sương m&ugrave; projector thay cho đ&egrave;n LED tr&ecirc;n bản concept. Hơi đ&aacute;ng tiếc l&agrave; kh&ocirc;ng c&oacute; bất cứ cảm biến n&agrave;o ở đầu xe do BR-V được trang bị cụm Honda Sensing gắn ở phần k&iacute;nh.</p>\r\n\r\n<p><strong>4. Th&acirc;n xe</strong></p>\r\n\r\n<p>Hai b&ecirc;n th&acirc;n BR-V dập nổi với đường g&acirc;n cơ bắp k&eacute;o d&agrave;i từ đ&egrave;n pha đến đ&egrave;n hậu. Gương xe được đặt ở g&oacute;c chữ A thay v&igrave; ở c&aacute;nh cửa giống như: Veloz, Xpander hay Avanza. Tr&ecirc;n gương vẫn c&oacute; đủ c&aacute;c t&iacute;nh năng gập điện, chỉnh điện v&agrave; t&iacute;ch hợp đ&egrave;n b&aacute;o rẽ.</p>\r\n', '1.5L i-VTEC', 3, 1, 4, 3, 5, '2023-11-01 20:25:56', 0, '2023-11-01 20:25:46'),
(69, 'Toyota Yaris 2021', 684000000, 4, 'Sành điệu xuống phố', '<p><strong>1. K&iacute;ch thước, trọng lượng</strong></p>\r\n\r\n<p>K&iacute;ch thước tổng thể d&agrave;i, rộng, cao của Toyota Yaris lần lượt l&agrave; 4.140 mm, 1.730 mm v&agrave; 1.500 mm. Trong khi đ&oacute;, chiều d&agrave;i cơ sở của xe ở mức 2.550 mm.</p>\r\n\r\n<p><strong>2. Khung gầm, hệ thống treo</strong></p>\r\n\r\n<p>Toyota được thiết kế tr&ecirc;n nền tảng mới TNGA của Toyota với bộ khung GOA. Xe sở hữu hệ thống treo trước độc lập MacPherson v&agrave; treo sau dạng thanh xoắn.</p>\r\n\r\n<p>C&ugrave;ng với đ&oacute; l&agrave; xe được trang bị hệ thống phanh đĩa cho cả phanh trước v&agrave; sau. Tuy nhi&ecirc;n ở phanh trước sẽ l&agrave; loại phanh đĩa tản nhiệt.</p>\r\n\r\n<p><strong>3. Đầu xe</strong></p>\r\n\r\n<p>Ngoại h&igrave;nh đầu xe của Toyota Yaris 2021 c&oacute; thiết kế kh&aacute; tương đồng với mẫu xe Toyota Vios. Vẫn l&agrave; lưới tản nhiệt h&igrave;nh thang được sơn b&oacute;ng kết hợp với dải đ&egrave;n pha được thiết kế vuốt ngược về sau t&iacute;ch hợp đ&egrave;n chiếu s&aacute;ng ban ng&agrave;y. Cụm đ&egrave;n chiếu s&aacute;ng được trang bị c&ocirc;ng nghệ LED cho cả đ&egrave;n chiếu xa, chiếu gần với c&ocirc;ng nghệ tự động bật/tắt, đ&egrave;n chờ dẫn đường...</p>\r\n\r\n<p>Hốc đ&egrave;n sương m&ugrave; dạng LED được l&agrave;m mới với lối thiết kế trẻ trung, năng động. Gần đ&egrave;n sương m&ugrave; sẽ l&agrave; cảm biến g&oacute;c gi&uacute;p hỗ trợ đỗ xe hoặc khi di chuyển trong cung đường nhỏ hẹp.</p>\r\n\r\n<p><strong>4. Đu&ocirc;i xe</strong></p>\r\n\r\n<p>Đu&ocirc;i xe được trang bị cụm đ&egrave;n hậu sử dụng c&ocirc;ng nghệ LED được cải tiến với thiết kế sắc n&eacute;t hơn. Tuy nhi&ecirc;n, phần đ&egrave;n xi nhan v&agrave; đ&egrave;n b&aacute;o l&ugrave;i lại l&agrave; Halogen. Xe được trang bị đầy đủ đ&egrave;n b&aacute;o phanh tr&ecirc;n cao, cụm camera ph&iacute;a sau, bộ 4 cảm biến hỗ trợ l&ugrave;i, đỗ xe...</p>\r\n\r\n<p>Cốp xe vẫn sẽ l&agrave; dạng cốp mở cơ chứ kh&ocirc;ng phải cốp mở điện. Khoang h&agrave;nh l&yacute; của Toyota Yaris c&oacute; kh&ocirc;ng gian chứa đồ kh&aacute; rộng l&ecirc;n tới 326 l&iacute;t với nhiều m&oacute;c treo đồ tiện dụng.</p>\r\n', '1.5 2NR-FE', 2, 1, 1, 3, 1, '2023-10-15 15:35:39', 0, NULL);
INSERT INTO `cars` (`car_id`, `car_name`, `car_price`, `car_quantity`, `car_describe`, `car_detail_describe`, `car_engine`, `car_seat_id`, `car_fuel_id`, `car_type_id`, `car_transmission_id`, `car_producer_id`, `car_update_at`, `car_deleted`, `car_deleted_at`) VALUES
(70, 'Suzuki Swift GLX 2021', 560000000, 10, 'Nâng tầm phong cách', '<p><strong>1. K&iacute;ch thước, trọng lượng</strong></p>\r\n\r\n<p>K&iacute;ch thước của Suzuki Swift lần lượt l&agrave; d&agrave;i 3.845 mm, rộng 1.735 mm v&agrave; cao 1.496 mm. Chiều d&agrave;i cơ sở của xe ở mức 2.450 mm đi c&ugrave;ng khoảng s&aacute;ng gầm l&agrave; 120 mm.</p>\r\n\r\n<p>Dẫu vậy, k&iacute;ch thước nhỏ gọn kết hợp với b&aacute;n k&iacute;nh v&ograve;ng quay hẹp, chỉ 4.8m, gi&uacute;p cho Swift dễ d&agrave;ng di chuyển tr&ecirc;n phố đ&ocirc;ng hoặc c&aacute;c cung đường đ&ocirc; thị chật hẹp.</p>\r\n\r\n<p><strong>2. Khung gầm, hệ thống treo</strong></p>\r\n\r\n<p>Giống như c&aacute;c mẫu xe anh em kh&aacute;c như&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/dong-xe/suzuki-ertiga-143\">Ertiga</a>,&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/dong-xe/suzuki-xl7-144\">XL7</a>... Swift sở hữu khung gầm liền khối HEARTECT trứ danh của h&atilde;ng xe Suzuki. Đ&acirc;y l&agrave; kiểu khung gầm thế hệ mới với nhiều chi tiết sử dụng chất lượng th&eacute;p gia cường, bộ khung &iacute;t khớp nối... Đem lại khả năng chịu lực tốt hơn cũng như giảm trọng lượng xe một c&aacute;ch đ&aacute;ng kể.</p>\r\n\r\n<p><strong>3. Đầu xe</strong></p>\r\n\r\n<p>Swift 2021 l&agrave; phi&ecirc;n bản n&acirc;ng cấp Facelift giữa v&ograve;ng đời sản phẩm n&ecirc;n kh&ocirc;ng sở hữu những thay đổi qu&aacute; mạnh tay từ h&atilde;ng Nhật. Điểm kh&aacute;c biệt nhất l&agrave; phần lưới tản nhiệt được thiết kế lại với họa tiết tổ ong hiệu ứng 3D. Phần ốp nhựa đen ở mặt ca-lăng được thay thế bằng thanh ngang mạ crom s&aacute;ng b&oacute;ng kết hợp với logo chữ &quot;S&quot; của&nbsp;<a href=\"https://vnexpress.net/oto-xe-may/v-car/hang-xe/suzuki-31\">Suzuki</a>&nbsp;ở ch&iacute;nh giữa tạo n&ecirc;n sự liền mạch trong thiết kế.</p>\r\n\r\n<p><strong>4. Th&acirc;n xe</strong></p>\r\n\r\n<p>Th&acirc;n xe của Suzuki Swift sở hữu những đường dập nổi hai b&ecirc;n h&ocirc;ng vừa tăng th&ecirc;m t&iacute;nh thẩm mỹ m&agrave; c&ograve;n cải thiện kh&iacute; động học cho xe. Cột A v&agrave; c&aacute;c g&oacute;c trụ được sơn đen đồng nhất, tạo cảm gi&aacute;c n&oacute;c xe t&aacute;ch biệt.</p>\r\n\r\n<p>Tay nắm cửa trước sơn c&ugrave;ng m&agrave;u th&acirc;n xe v&agrave; c&oacute; t&iacute;ch hợp n&uacute;t bấm mở cửa, tay nắm cửa sau được thiết kế ốp v&agrave;o cột C, tạo sự kh&aacute;c biệt so với đối thủ. Gương xe được sơn đen đồng nhất với cột A, c&oacute; thể gập điện, chỉnh điện v&agrave; t&iacute;ch hợp đ&egrave;n b&aacute;o rẽ.</p>\r\n', '1.2L', 2, 1, 1, 3, 26, '2023-11-01 20:25:56', 0, '2023-11-01 20:25:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `car_fuel`
--

CREATE TABLE `car_fuel` (
  `car_fuel_id` int(11) UNSIGNED NOT NULL,
  `car_fuel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `car_fuel`
--

INSERT INTO `car_fuel` (`car_fuel_id`, `car_fuel`) VALUES
(1, 'Xăng'),
(2, 'Dầu'),
(3, 'Hybrid'),
(4, 'Điện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `car_img`
--

CREATE TABLE `car_img` (
  `car_img_id` int(11) UNSIGNED NOT NULL,
  `car_img_filename` varchar(1023) DEFAULT NULL,
  `car_img_update_at` datetime DEFAULT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `car_img`
--

INSERT INTO `car_img` (`car_img_id`, `car_img_filename`, `car_img_update_at`, `car_id`) VALUES
(32, '0_20231014_103848_13519_cc0640_032_25d.png', '2023-10-14 10:38:48', 48),
(33, '1_20231014_103848_Mazda3-1.jpg', '2023-10-14 10:38:48', 48),
(34, '2_20231014_103848_Mazda3-2.jpg', '2023-10-14 10:38:48', 48),
(35, '3_20231014_103848_Mazda3-3.jpg', '2023-10-14 10:38:48', 48),
(36, '4_20231014_103848_Mazda3-4.jpg', '2023-10-14 10:38:48', 48),
(37, '5_20231014_103848_Mazda3-5.jpg', '2023-10-14 10:38:48', 48),
(38, '6_20231014_103848_Mazda3-6.jpg', '2023-10-14 10:38:48', 48),
(39, '7_20231014_103848_Mazda3-7.jpg', '2023-10-14 10:38:48', 48),
(40, '8_20231014_103848_Mazda3-8.jpg', '2023-10-14 10:38:48', 48),
(41, '9_20231014_103848_Mazda3-9.jpg', '2023-10-14 10:38:48', 48),
(42, '0_20230921_200620_k3-xanh.png', '2023-09-21 20:06:20', 49),
(43, '1_20230921_200620_Ngoai-that-5.jpg', '2023-09-21 20:06:20', 49),
(44, '2_20230921_200620_Ngoai-that-4.jpg', '2023-09-21 20:06:20', 49),
(45, '3_20230921_200620_Ngoai-that-3.jpg', '2023-09-21 20:06:20', 49),
(46, '4_20230921_200620_Ngoai-that-9.jpg', '2023-09-21 20:06:20', 49),
(47, '5_20230921_200620_Noi-that-3.jpg', '2023-09-21 20:06:20', 49),
(48, '6_20230921_200620_Cam-bien-ap-suat-lop-jpeg.jpg', '2023-09-21 20:06:20', 49),
(49, '7_20230921_200620_Noi-that-5.jpg', '2023-09-21 20:06:20', 49),
(50, '8_20230921_200620_Noi-that-8.jpg', '2023-09-21 20:06:20', 49),
(76, '0_20230922_090707_C-300-AMG-208_0015_Layer-2-600x338-1.png', '2023-09-22 09:07:07', 54),
(77, '1_20230922_090707_IMG-1876-JPG.jpg', '2023-09-22 09:07:07', 54),
(78, '2_20230922_090707_IMG-1905-JPG.jpg', '2023-09-22 09:07:07', 54),
(79, '3_20230922_090707_IMG-1925-JPG.jpg', '2023-09-22 09:07:07', 54),
(80, '4_20230922_090707_IMG-1889-JPG.jpg', '2023-09-22 09:07:07', 54),
(81, '5_20230922_090707_IMG-1914-JPG.jpg', '2023-09-22 09:07:07', 54),
(82, '6_20230922_090707_IMG-1862-JPG.jpg', '2023-09-22 09:07:07', 54),
(83, '7_20230922_090707_IMG-1799-JPG.jpg', '2023-09-22 09:07:07', 54),
(84, '8_20230922_090707_IMG-1793-JPG.jpg', '2023-09-22 09:07:07', 54),
(85, '9_20230922_090707_IMG-1912-JPG.jpg', '2023-09-22 09:07:07', 54),
(86, '10_20230922_090707_IMG-1832-JPG.jpg', '2023-09-22 09:07:07', 54),
(87, '11_20230922_090707_IMG-1835-JPG.jpg', '2023-09-22 09:07:07', 54),
(88, '12_20230922_090707_IMG-1841-JPG.jpg', '2023-09-22 09:07:07', 54),
(89, '13_20230922_090707_IMG-1844-JPG.jpg', '2023-09-22 09:07:07', 54),
(90, '14_20230922_090707_IMG-1819-JPG.jpg', '2023-09-22 09:07:07', 54),
(91, '15_20230922_090707_IMG-1923-JPG.jpg', '2023-09-22 09:07:07', 54),
(92, '16_20230922_090707_IMG-1921-JPG.jpg', '2023-09-22 09:07:07', 54),
(93, '0_20231003_155026_0-everest.webp', '2023-10-03 15:50:26', 55),
(94, '1_20231003_155026_1-everest.jpg', '2023-10-03 15:50:26', 55),
(95, '2_20231003_155026_2-everest.jpg', '2023-10-03 15:50:26', 55),
(96, '3_20231003_155026_3-everest.jpg', '2023-10-03 15:50:26', 55),
(97, '4_20231003_155026_4-everest.jpg', '2023-10-03 15:50:26', 55),
(98, '5_20231003_155026_5-everest.jpg', '2023-10-03 15:50:26', 55),
(99, '6_20231003_155026_6-everest.jpg', '2023-10-03 15:50:26', 55),
(100, '7_20231003_155026_7-everest.jpg', '2023-10-03 15:50:26', 55),
(101, '8_20231003_155026_8-everest.jpg', '2023-10-03 15:50:26', 55),
(102, '9_20231003_155026_9-everest.jpg', '2023-10-03 15:50:26', 55),
(103, '10_20231003_155026_10-everest.jpg', '2023-10-03 15:50:26', 55),
(104, '11_20231003_155026_11-everest.jpg', '2023-10-03 15:50:26', 55),
(105, '12_20231003_155026_12-everest.jpg', '2023-10-03 15:50:26', 55),
(106, '0_20231004_131247_Hyundai-Santa-Fe-2021-0-JPG_1631935126.png', '2023-10-04 13:12:47', 56),
(107, '1_20231004_131247_Hyundai-Santa-Fe-2021-10-JPG_1631935126.jpg', '2023-10-04 13:12:47', 56),
(108, '2_20231004_131247_Hyundai-Santa-Fe-2021-11-JPG_1631935126.jpg', '2023-10-04 13:12:47', 56),
(109, '3_20231004_131247_Hyundai-Santa-Fe-2021-16-JPG_1631935127.jpg', '2023-10-04 13:12:47', 56),
(110, '4_20231004_131247_Hyundai-Santa-Fe-2021-18-JPG_1631935128.jpg', '2023-10-04 13:12:47', 56),
(111, '5_20231004_131247_Hyundai-Santa-Fe-2021-19-JPG_1631935124.jpg', '2023-10-04 13:12:47', 56),
(112, '6_20231004_131247_Hyundai-Santa-Fe-2021-20-JPG_1631935124.jpg', '2023-10-04 13:12:47', 56),
(113, '7_20231004_131247_Hyundai-Santa-Fe-2021-21-JPG.jpg', '2023-10-04 13:12:47', 56),
(114, '8_20231004_131247_Hyundai-Santa-Fe-2021-42-JPG_1631935132.jpg', '2023-10-04 13:12:47', 56),
(115, '9_20231004_131247_Hyundai-Santa-Fe-2021-44-JPG_1631935133.jpg', '2023-10-04 13:12:47', 56),
(116, '10_20231004_131247_Hyundai-Santa-Fe-2021-52-JPG_1631935175.jpg', '2023-10-04 13:12:47', 56),
(117, '11_20231004_131247_Hyundai-Santa-Fe-2021-53-JPG_1631935175.jpg', '2023-10-04 13:12:47', 56),
(118, '0_20231003_163745_kia-sorento-0.png', '2023-10-03 16:37:45', 57),
(119, '1_20231003_163745_Kia-Sorento-Hybrid_1671001157.jpg', '2023-10-03 16:37:45', 57),
(120, '2_20231003_163745_Kia-Sorento-Hybrid-1.jpg', '2023-10-03 16:37:45', 57),
(121, '3_20231003_163745_Kia-Sorento-Hybrid-2.jpg', '2023-10-03 16:37:45', 57),
(122, '4_20231003_163745_Kia-Sorento-Hybrid-3.jpg', '2023-10-03 16:37:45', 57),
(123, '5_20231003_163745_Kia-Sorento-Hybrid-4.jpg', '2023-10-03 16:37:45', 57),
(124, '6_20231003_163745_Kia-Sorento-Hybrid-5.jpg', '2023-10-03 16:37:45', 57),
(125, '7_20231003_163745_Kia-Sorento-Hybrid-6.jpg', '2023-10-03 16:37:45', 57),
(126, '8_20231003_163745_Kia-Sorento-Hybrid-10.jpg', '2023-10-03 16:37:45', 57),
(127, '9_20231003_163745_Kia-Sorento-Hybrid-11.jpg', '2023-10-03 16:37:45', 57),
(128, '10_20231003_163745_Kia-Sorento-Hybrid-12.jpg', '2023-10-03 16:37:45', 57),
(129, '11_20231003_163745_Kia-Sorento-Hybrid-13.jpg', '2023-10-03 16:37:45', 57),
(130, '12_20231003_163745_Kia-Sorento-Hybrid-14.jpg', '2023-10-03 16:37:45', 57),
(131, '0_20231014_110655_GLC-200-4MATIC-w-4-1-600x338-1.png', '2023-10-14 11:06:55', 59),
(132, '1_20231014_110655_Mercedes-GLC-200-4Matic-2023-all-new-1.jpg', '2023-10-14 11:06:55', 59),
(133, '2_20231014_110655_Mercedes-GLC-200-4Matic-2023-all-new-2.jpg', '2023-10-14 11:06:55', 59),
(134, '3_20231014_110655_Mercedes-GLC-200-4Matic-2023-all-new-3.jpg', '2023-10-14 11:06:55', 59),
(135, '4_20231014_110655_Mercedes-GLC-200-4Matic-2023-all-new-10.jpg', '2023-10-14 11:06:55', 59),
(136, '5_20231014_110655_Mercedes-GLC-200-4Matic-2023-all-new-11.jpg', '2023-10-14 11:06:55', 59),
(137, '6_20231014_110655_Mercedes-GLC-200-4Matic-2023-all-new-12.jpg', '2023-10-14 11:06:55', 59),
(138, '7_20231014_110655_Mercedes-GLC-200-4Matic-2023-all-new-13.jpg', '2023-10-14 11:06:55', 59),
(139, '8_20231014_110655_Mercedes-GLC-200-4Matic-2023-all-new-14.jpg', '2023-10-14 11:06:55', 59),
(140, '9_20231014_110655_Mercedes-GLC-200-4Matic-2023-all-new-15.jpg', '2023-10-14 11:06:55', 59),
(141, '10_20231014_110655_Mercedes-GLC-200-4Matic-2023-all-new-16.jpg', '2023-10-14 11:06:55', 59),
(142, '11_20231014_110655_Mercedes-GLC-200-4Matic-2023-all-new-17.jpg', '2023-10-14 11:06:55', 59),
(143, '12_20231014_110655_Mercedes-GLC-200-4Matic-2023-all-new-18.jpg', '2023-10-14 11:06:55', 59),
(144, '13_20231014_110655_Mercedes-GLC-200-4Matic-2023-all-new-19.jpg', '2023-10-14 11:06:55', 59),
(145, '14_20231014_110655_Mercedes-GLC-200-4Matic-2023-all-new-20.jpg', '2023-10-14 11:06:55', 59),
(146, '0_20231015_134409_EQS2022-0.png', '2023-10-15 13:44:09', 60),
(147, '1_20231015_134409_EQS2022-1.jpg', '2023-10-15 13:44:09', 60),
(148, '2_20231015_134409_EQS2022-2.jpg', '2023-10-15 13:44:09', 60),
(149, '3_20231015_134409_EQS2022-3.jpg', '2023-10-15 13:44:09', 60),
(150, '4_20231015_134409_EQS2022-4.jpg', '2023-10-15 13:44:09', 60),
(151, '5_20231015_134409_EQS2022-5.jpg', '2023-10-15 13:44:09', 60),
(152, '6_20231015_134409_EQS2022-6.jpg', '2023-10-15 13:44:09', 60),
(153, '7_20231015_134409_EQS2022-7.jpg', '2023-10-15 13:44:09', 60),
(154, '8_20231015_134409_EQS2022-8.jpg', '2023-10-15 13:44:09', 60),
(155, '9_20231015_134409_EQS2022-9.jpg', '2023-10-15 13:44:09', 60),
(156, '10_20231015_134409_EQS2022-10.jpg', '2023-10-15 13:44:09', 60),
(157, '11_20231015_134409_EQS2022-11.jpg', '2023-10-15 13:44:09', 60),
(158, '12_20231015_134409_EQS2022-12.jpg', '2023-10-15 13:44:09', 60),
(159, '13_20231015_134409_EQS2022-13.jpg', '2023-10-15 13:44:09', 60),
(160, '14_20231015_134409_EQS2022-14.jpg', '2023-10-15 13:44:09', 60),
(161, '15_20231015_134409_EQS2022-15.jpg', '2023-10-15 13:44:09', 60),
(162, '16_20231015_134409_EQS2022-16.jpg', '2023-10-15 13:44:09', 60),
(163, '17_20231015_134409_EQS2022-17.jpg', '2023-10-15 13:44:09', 60),
(164, '18_20231015_134409_EQS2022-18.jpg', '2023-10-15 13:44:09', 60),
(165, '19_20231015_134409_EQS2022-19.jpg', '2023-10-15 13:44:09', 60),
(166, '0_20231014_115903_carnival-2022-0.png', '2023-10-14 11:59:03', 61),
(167, '1_20231014_115903_carnival-2022-1.jpg', '2023-10-14 11:59:03', 61),
(168, '2_20231014_115903_carnival-2022-2.jpg', '2023-10-14 11:59:03', 61),
(169, '3_20231014_115903_carnival-2022-3.jpg', '2023-10-14 11:59:03', 61),
(170, '4_20231014_115903_carnival-2022-4.jpg', '2023-10-14 11:59:03', 61),
(171, '5_20231014_115903_carnival-2022-5.jpg', '2023-10-14 11:59:03', 61),
(172, '6_20231014_115903_carnival-2022-6.jpg', '2023-10-14 11:59:03', 61),
(173, '7_20231014_115903_carnival-2022-7.jpg', '2023-10-14 11:59:03', 61),
(174, '8_20231014_115903_carnival-2022-8.jpg', '2023-10-14 11:59:03', 61),
(175, '9_20231014_115903_carnival-2022-9.jpg', '2023-10-14 11:59:03', 61),
(176, '10_20231014_115903_carnival-2022-10.jpg', '2023-10-14 11:59:03', 61),
(177, '11_20231014_115903_carnival-2022-11.jpg', '2023-10-14 11:59:03', 61),
(178, '12_20231014_115903_carnival-2022-12.jpg', '2023-10-14 11:59:03', 61),
(179, '13_20231014_115903_carnival-2022-13.jpg', '2023-10-14 11:59:03', 61),
(180, '14_20231014_115903_carnival-2022-14.jpg', '2023-10-14 11:59:03', 61),
(181, '15_20231014_115903_carnival-2022-15.jpg', '2023-10-14 11:59:03', 61),
(182, '16_20231014_115903_carnival-2022-16.jpg', '2023-10-14 11:59:03', 61),
(183, '17_20231014_115903_carnival-2022-17.jpg', '2023-10-14 11:59:03', 61),
(184, '18_20231014_115903_carnival-2022-18.jpg', '2023-10-14 11:59:03', 61),
(185, '0_20231015_134641_1702-Honda-Civic-VnE-1340.png', '2023-10-15 13:46:41', 62),
(186, '1_20231015_134641_1702-Honda-Civic-VnE-1341.jpg', '2023-10-15 13:46:41', 62),
(187, '2_20231015_134641_1702-Honda-Civic-VnE-1342.jpg', '2023-10-15 13:46:41', 62),
(188, '3_20231015_134641_1702-Honda-Civic-VnE-1346.jpg', '2023-10-15 13:46:41', 62),
(189, '4_20231015_134641_1702-Honda-Civic-VnE-1347.jpg', '2023-10-15 13:46:41', 62),
(190, '5_20231015_134641_1702-Honda-Civic-VnE-1467.jpg', '2023-10-15 13:46:41', 62),
(191, '6_20231015_134641_1702-Honda-Civic-VnE-1483.jpg', '2023-10-15 13:46:41', 62),
(192, '7_20231015_134641_1702-Honda-Civic-VnE-1527.jpg', '2023-10-15 13:46:41', 62),
(193, '8_20231015_134641_1702-Honda-Civic-VnE-1534.jpg', '2023-10-15 13:46:41', 62),
(194, '9_20231015_134641_1702-Honda-Civic-VnE-1535.jpg', '2023-10-15 13:46:41', 62),
(195, '10_20231015_134641_1702-Honda-Civic-VnE-1541.jpg', '2023-10-15 13:46:41', 62),
(196, '11_20231015_134641_1702-Honda-Civic-VnE-1543.jpg', '2023-10-15 13:46:41', 62),
(197, '12_20231015_134641_1702-Honda-Civic-VnE-1586.jpg', '2023-10-15 13:46:41', 62),
(198, '13_20231015_134641_1702-Honda-Civic-VnE-1597.jpg', '2023-10-15 13:46:41', 62),
(199, '14_20231015_134641_1702-Honda-Civic-VnE-1603.jpg', '2023-10-15 13:46:41', 62),
(200, '15_20231015_134641_1702-Honda-Civic-VnE-1621.jpg', '2023-10-15 13:46:41', 62),
(201, '0_20231015_140010_Ngoa-i-tha-t-Corolla-Altis-1-8HEV-0.png', '2023-10-15 14:00:10', 63),
(202, '1_20231015_140010_Ngoa-i-tha-t-Corolla-Altis-1-8HEV-1.jpg', '2023-10-15 14:00:10', 63),
(203, '2_20231015_140010_Ngoa-i-tha-t-Corolla-Altis-1-8HEV-2.jpg', '2023-10-15 14:00:10', 63),
(204, '3_20231015_140010_Ngoa-i-tha-t-Corolla-Altis-1-8HEV-3.jpg', '2023-10-15 14:00:10', 63),
(205, '4_20231015_140010_Ngoa-i-tha-t-Corolla-Altis-1-8HEV-4.jpg', '2023-10-15 14:00:10', 63),
(206, '5_20231015_140010_Ngoa-i-tha-t-Corolla-Altis-1-8HEV-5.jpg', '2023-10-15 14:00:10', 63),
(207, '6_20231015_140010_Ngoa-i-tha-t-Corolla-Altis-1-8HEV-6.jpg', '2023-10-15 14:00:10', 63),
(208, '7_20231015_140010_Ngoa-i-tha-t-Corolla-Altis-1-8HEV-8.jpg', '2023-10-15 14:00:10', 63),
(209, '8_20231015_140010_Ngoa-i-tha-t-Corolla-Altis-1-8HEV-9.jpg', '2023-10-15 14:00:10', 63),
(210, '9_20231015_140010_Ngoa-i-tha-t-Corolla-Altis-1-8HEV-10.jpg', '2023-10-15 14:00:10', 63),
(211, '10_20231015_140010_No-i-tha-t-Corolla-Altis-1-8HEV-1.jpg', '2023-10-15 14:00:10', 63),
(212, '11_20231015_140010_No-i-tha-t-Corolla-Altis-1-8HEV-2.jpg', '2023-10-15 14:00:10', 63),
(213, '12_20231015_140010_No-i-tha-t-Corolla-Altis-1-8HEV-3.jpg', '2023-10-15 14:00:10', 63),
(214, '0_20231015_153641_vios-2023-0.png', '2023-10-15 15:36:41', 64),
(215, '1_20231015_153641_vios-2023-1.jpg', '2023-10-15 15:36:41', 64),
(216, '2_20231015_153641_vios-2023-2.jpg', '2023-10-15 15:36:41', 64),
(217, '3_20231015_153641_vios-2023-3.jpg', '2023-10-15 15:36:41', 64),
(218, '4_20231015_153641_vios-2023-4.jpg', '2023-10-15 15:36:41', 64),
(219, '5_20231015_153641_vios-2023-5.jpg', '2023-10-15 15:36:41', 64),
(220, '6_20231015_153641_vios-2023-6.jpg', '2023-10-15 15:36:41', 64),
(221, '7_20231015_153641_vios-2023-7.jpg', '2023-10-15 15:36:41', 64),
(222, '8_20231015_153641_vios-2023-8.jpg', '2023-10-15 15:36:41', 64),
(223, '9_20231015_153641_vios-2023-9.jpg', '2023-10-15 15:36:41', 64),
(224, '10_20231015_153641_vios-2023-10.jpg', '2023-10-15 15:36:41', 64),
(225, '11_20231015_153641_vios-2023-11.jpg', '2023-10-15 15:36:41', 64),
(226, '12_20231015_153641_vios-2023-12.jpg', '2023-10-15 15:36:41', 64),
(227, '13_20231015_153641_vios-2023-13.jpg', '2023-10-15 15:36:41', 64),
(228, '14_20231015_153641_vios-2023-14.jpg', '2023-10-15 15:36:41', 64),
(229, '0_20231015_151338_3d00b025a0aa56afdb803a1b07ca303d.png', '2023-10-15 15:13:38', 65),
(230, '1_20231015_151338_Fortuner1.jpg', '2023-10-15 15:13:38', 65),
(231, '2_20231015_151338_Fortuner-4.jpg', '2023-10-15 15:13:38', 65),
(232, '3_20231015_151338_Fortuner5.jpg', '2023-10-15 15:13:38', 65),
(233, '4_20231015_151338_Fortuner-7.jpg', '2023-10-15 15:13:38', 65),
(234, '5_20231015_151338_Fortuner-8.jpg', '2023-10-15 15:13:38', 65),
(235, '6_20231015_151338_Fortuner-no-i-tha-t-2.jpg', '2023-10-15 15:13:38', 65),
(236, '0_20231015_143016_avanza-premio-1.webp', '2023-10-15 14:30:16', 66),
(237, '1_20231015_143016_avanza-premio-2.jpg', '2023-10-15 14:30:16', 66),
(238, '2_20231015_143016_avanza-premio-3.jpg', '2023-10-15 14:30:16', 66),
(239, '3_20231015_143016_avanza-premio-4.jpg', '2023-10-15 14:30:16', 66),
(240, '4_20231015_143016_avanza-premio-5.jpg', '2023-10-15 14:30:16', 66),
(241, '5_20231015_143016_avanza-premio-6.jpg', '2023-10-15 14:30:16', 66),
(242, '6_20231015_143016_avanza-premio-7.jpg', '2023-10-15 14:30:16', 66),
(243, '7_20231015_143016_avanza-premio-8.jpg', '2023-10-15 14:30:16', 66),
(244, '8_20231015_143016_avanza-premio-9.jpg', '2023-10-15 14:30:16', 66),
(245, '9_20231015_143016_avanza-premio-10.jpg', '2023-10-15 14:30:16', 66),
(246, '10_20231015_143016_avanza-premio-11.jpg', '2023-10-15 14:30:16', 66),
(247, '11_20231015_143016_avanza-premio-12.jpg', '2023-10-15 14:30:16', 66),
(248, '12_20231015_143016_avanza-premio-14.jpg', '2023-10-15 14:30:16', 66),
(249, '13_20231015_143016_avanza-premio-15.jpg', '2023-10-15 14:30:16', 66),
(250, '0_20231015_151450_Mitsubishi-Xpander-Cross-2023-0.png', '2023-10-15 15:14:50', 67),
(251, '1_20231015_151450_Mitsubishi-Xpander-Cross-2023-1.jpg', '2023-10-15 15:14:50', 67),
(252, '2_20231015_151450_Mitsubishi-Xpander-Cross-2023-2.jpg', '2023-10-15 15:14:50', 67),
(253, '3_20231015_151450_Mitsubishi-Xpander-Cross-2023-3.jpg', '2023-10-15 15:14:50', 67),
(254, '4_20231015_151450_Mitsubishi-Xpander-Cross-2023-4.jpg', '2023-10-15 15:14:50', 67),
(255, '5_20231015_151450_Mitsubishi-Xpander-Cross-2023-5.jpg', '2023-10-15 15:14:50', 67),
(256, '6_20231015_151450_Mitsubishi-Xpander-Cross-2023-6.jpg', '2023-10-15 15:14:50', 67),
(257, '7_20231015_151450_Mitsubishi-Xpander-Cross-2023-7.jpg', '2023-10-15 15:14:50', 67),
(258, '8_20231015_151450_Mitsubishi-Xpander-Cross-2023-8.jpg', '2023-10-15 15:14:50', 67),
(259, '9_20231015_151450_Mitsubishi-Xpander-Cross-2023-9.jpg', '2023-10-15 15:14:50', 67),
(260, '10_20231015_151450_Mitsubishi-Xpander-Cross-2023-10.jpg', '2023-10-15 15:14:50', 67),
(261, '11_20231015_151450_Mitsubishi-Xpander-Cross-2023-11.jpg', '2023-10-15 15:14:50', 67),
(262, '12_20231015_151450_Mitsubishi-Xpander-Cross-2023-12.jpg', '2023-10-15 15:14:50', 67),
(263, '13_20231015_151450_Mitsubishi-Xpander-Cross-2023-13.jpg', '2023-10-15 15:14:50', 67),
(264, '14_20231015_151450_Mitsubishi-Xpander-Cross-2023-14.jpg', '2023-10-15 15:14:50', 67),
(265, '15_20231015_151450_Mitsubishi-Xpander-Cross-2023-15.jpg', '2023-10-15 15:14:50', 67),
(266, '16_20231015_151450_Mitsubishi-Xpander-Cross-2023-16.jpg', '2023-10-15 15:14:50', 67),
(267, '17_20231015_151450_Mitsubishi-Xpander-Cross-2023-17.jpg', '2023-10-15 15:14:50', 67),
(268, '18_20231015_151450_Mitsubishi-Xpander-Cross-2023-18.jpg', '2023-10-15 15:14:50', 67),
(269, '19_20231015_151450_Mitsubishi-Xpander-Cross-2023-19.jpg', '2023-10-15 15:14:50', 67),
(270, '0_20231015_152838_HondaBRV2023-0.png', '2023-10-15 15:28:38', 68),
(271, '1_20231015_152838_HondaBRV2023-1.jpg', '2023-10-15 15:28:38', 68),
(272, '2_20231015_152838_HondaBRV2023-2.jpg', '2023-10-15 15:28:38', 68),
(273, '3_20231015_152838_HondaBRV2023-3.jpg', '2023-10-15 15:28:38', 68),
(274, '4_20231015_152838_HondaBRV2023-4.jpg', '2023-10-15 15:28:38', 68),
(275, '5_20231015_152838_HondaBRV2023-5.jpg', '2023-10-15 15:28:38', 68),
(276, '6_20231015_152838_HondaBRV2023-7.jpg', '2023-10-15 15:28:38', 68),
(277, '7_20231015_152838_HondaBRV2023-8.jpg', '2023-10-15 15:28:38', 68),
(278, '8_20231015_152838_HondaBRV2023-9.jpg', '2023-10-15 15:28:38', 68),
(279, '9_20231015_152838_HondaBRV2023-10.jpg', '2023-10-15 15:28:38', 68),
(280, '10_20231015_152838_HondaBRV2023-11.jpg', '2023-10-15 15:28:38', 68),
(281, '11_20231015_152838_HondaBRV2023-12.jpg', '2023-10-15 15:28:38', 68),
(282, '12_20231015_152838_HondaBRV2023-13.jpg', '2023-10-15 15:28:38', 68),
(283, '13_20231015_152838_HondaBRV2023-14.jpg', '2023-10-15 15:28:38', 68),
(284, '14_20231015_152838_HondaBRV2023-15.jpg', '2023-10-15 15:28:38', 68),
(285, '15_20231015_152838_HondaBRV2023-16.jpg', '2023-10-15 15:28:38', 68),
(286, '16_20231015_152838_HondaBRV2023-17.jpg', '2023-10-15 15:28:38', 68),
(287, '17_20231015_152838_HondaBRV2023-18.jpg', '2023-10-15 15:28:38', 68),
(288, '18_20231015_152838_HondaBRV2023-19.jpg', '2023-10-15 15:28:38', 68),
(289, '19_20231015_152838_HondaBRV2023-20.jpg', '2023-10-15 15:28:38', 68),
(290, '0_20231015_153539_yaris0.png', '2023-10-15 15:35:39', 69),
(291, '1_20231015_153539_yaris1.jpg', '2023-10-15 15:35:39', 69),
(292, '2_20231015_153539_yaris2.jpg', '2023-10-15 15:35:39', 69),
(293, '3_20231015_153539_yaris3.jpg', '2023-10-15 15:35:39', 69),
(294, '4_20231015_153539_yaris4.jpg', '2023-10-15 15:35:39', 69),
(295, '5_20231015_153539_yaris5.jpg', '2023-10-15 15:35:39', 69),
(296, '6_20231015_153539_yaris6.jpg', '2023-10-15 15:35:39', 69),
(297, '7_20231015_153539_yaris7.jpg', '2023-10-15 15:35:39', 69),
(298, '8_20231015_153539_yaris8.jpg', '2023-10-15 15:35:39', 69),
(299, '0_20231015_154411_Suzuki-Swift-2020-UK-0.png', '2023-10-15 15:44:11', 70),
(300, '1_20231015_154411_Suzuki-Swift-2020-UK-1.jpg', '2023-10-15 15:44:11', 70),
(301, '2_20231015_154411_Suzuki-Swift-2020-UK-2.jpg', '2023-10-15 15:44:11', 70),
(302, '3_20231015_154411_Suzuki-Swift-2020-UK-3.jpg', '2023-10-15 15:44:11', 70),
(303, '4_20231015_154411_Suzuki-Swift-2020-UK-4.jpg', '2023-10-15 15:44:12', 70),
(304, '5_20231015_154412_Suzuki-Swift-2020-UK-5.jpg', '2023-10-15 15:44:12', 70),
(305, '6_20231015_154412_Suzuki-Swift-2020-UK-6.jpg', '2023-10-15 15:44:12', 70),
(306, '7_20231015_154412_Suzuki-Swift-2020-UK-7.jpg', '2023-10-15 15:44:12', 70),
(307, '8_20231015_154412_Suzuki-Swift-2020-UK-8.jpg', '2023-10-15 15:44:12', 70),
(308, '9_20231015_154412_Suzuki-Swift-2020-UK-9.jpg', '2023-10-15 15:44:12', 70),
(309, '10_20231015_154412_Suzuki-Swift-2020-UK-10.jpg', '2023-10-15 15:44:12', 70);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `car_producer`
--

CREATE TABLE `car_producer` (
  `car_producer_id` int(11) UNSIGNED NOT NULL,
  `car_producer_name` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `car_producer`
--

INSERT INTO `car_producer` (`car_producer_id`, `car_producer_name`) VALUES
(1, 'Toyota'),
(2, 'Mitsubishi'),
(4, 'Hyundai'),
(5, 'Honda'),
(6, 'Mazda'),
(7, 'Mercedes-Benz'),
(15, 'Peugeot'),
(16, 'Kia'),
(20, 'Nissan'),
(21, 'Ford'),
(26, 'Suzuki'),
(28, 'VinFast'),
(29, 'RollRoyce');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `car_seat`
--

CREATE TABLE `car_seat` (
  `car_seat_id` int(11) UNSIGNED NOT NULL,
  `car_seat` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `car_seat`
--

INSERT INTO `car_seat` (`car_seat_id`, `car_seat`) VALUES
(1, '2 chỗ'),
(2, '4-5 chỗ'),
(3, '7 chỗ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `car_transmission`
--

CREATE TABLE `car_transmission` (
  `car_transmission_id` int(11) UNSIGNED NOT NULL,
  `car_transmission` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `car_transmission`
--

INSERT INTO `car_transmission` (`car_transmission_id`, `car_transmission`) VALUES
(1, 'Số sàn'),
(2, 'Số tự động'),
(3, 'Số CVT '),
(4, 'Số DCT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `car_type`
--

CREATE TABLE `car_type` (
  `car_type_id` int(11) UNSIGNED NOT NULL,
  `car_type_name` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `car_type`
--

INSERT INTO `car_type` (`car_type_id`, `car_type_name`) VALUES
(1, 'HatchBack'),
(2, 'Sedans'),
(3, 'SUV'),
(4, 'MPV'),
(5, 'Bán Tải'),
(7, 'Coupé');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pay_method`
--

CREATE TABLE `pay_method` (
  `pay_method_id` int(11) UNSIGNED NOT NULL,
  `pay_method_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pay_method`
--

INSERT INTO `pay_method` (`pay_method_id`, `pay_method_name`) VALUES
(1, 'Trả thẳng'),
(2, 'Trả góp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_username` varchar(50) NOT NULL DEFAULT '',
  `user_password` varchar(255) NOT NULL DEFAULT '',
  `user_fullname` varchar(50) NOT NULL DEFAULT '',
  `user_tel` varchar(20) DEFAULT '',
  `user_email` varchar(255) DEFAULT NULL,
  `user_avt` varchar(1023) DEFAULT NULL,
  `user_is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `user_province_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_fullname`, `user_tel`, `user_email`, `user_avt`, `user_is_admin`, `user_province_id`) VALUES
(36, 'nguyenhoaiy', '$2y$10$tNmcMRi8TU7oGyXzkvOTUeIzDFg5jAJmpuN.W8W8PtOzZ0onVMc0K', 'Nguyễn Hoài Ý', '0772884452', 'nguyenhoaiy7@gmail.com', '20231127_164454_avt-1.jpg', 0, 22),
(37, 'mat_khau_la_123123', '$2y$10$kEtrW.3Fw/PAmbHzxwx.m.vsFtsuh8PgdgijpJMYZA5Dr2.0X9nmK', 'Admin', '0123456789', 'nguyenhoaiy19991@gmail.com', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_cart_item`
--

CREATE TABLE `user_cart_item` (
  `user_cart_item_id` int(11) UNSIGNED NOT NULL,
  `car_id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_cart_item`
--

INSERT INTO `user_cart_item` (`user_cart_item_id`, `car_id`, `user_id`) VALUES
(64, 60, 36);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_deposit`
--

CREATE TABLE `user_deposit` (
  `user_deposit_id` int(11) UNSIGNED NOT NULL,
  `user_deposit_fullname` varchar(50) DEFAULT NULL,
  `user_deposit_tel` varchar(50) DEFAULT NULL,
  `user_deposit_email` varchar(255) DEFAULT NULL,
  `user_deposit_total_price` decimal(20,2) DEFAULT NULL,
  `user_deposit_price` decimal(20,2) DEFAULT NULL,
  `user_deposit_where` varchar(50) DEFAULT NULL,
  `user_deposit_is_payed` tinyint(3) DEFAULT 0,
  `user_deposit_is_contacted` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `user_deposit_at` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `car_id` int(11) NOT NULL,
  `pay_method_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_deposit`
--

INSERT INTO `user_deposit` (`user_deposit_id`, `user_deposit_fullname`, `user_deposit_tel`, `user_deposit_email`, `user_deposit_total_price`, `user_deposit_price`, `user_deposit_where`, `user_deposit_is_payed`, `user_deposit_is_contacted`, `user_deposit_at`, `user_id`, `car_id`, `pay_method_id`) VALUES
(248, 'Nguyễn Hoài Ý', '0772884452', 'nguyenhoaiy7@gmail.com', 6555370000.00, 655537000.00, 'Showroom Đồng Tháp', 0, 0, '2023-11-27 16:46:14', 36, 60, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_province`
--

CREATE TABLE `user_province` (
  `user_province_id` int(11) UNSIGNED NOT NULL,
  `user_province_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_registration_fee` float DEFAULT 1.1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_province`
--

INSERT INTO `user_province` (`user_province_id`, `user_province_name`, `user_registration_fee`) VALUES
(1, 'Tp. Hồ Chí Minh', 1.1),
(2, 'Hà Nội', 1.12),
(3, 'Hà Tĩnh', 1.11),
(4, 'An Giang', 1.1),
(5, 'Bà Rịa - Vũng Tàu', 1.1),
(6, 'Bắc Giang', 1.1),
(7, 'Bắc Kạn', 1.1),
(8, 'Bạc Liêu', 1.1),
(9, 'Bắc Ninh', 1.1),
(10, 'Bến Tre', 1.1),
(11, 'Bình Định', 1.1),
(12, 'Bình Dương', 1.1),
(13, 'Bình Phước', 1.1),
(14, 'Bình Thuận', 1.1),
(15, 'Cà Mau', 1.1),
(16, 'Cần Thơ', 1.12),
(17, 'Đà Nẵng', 1.1),
(18, 'Đắk Lắk', 1.1),
(19, 'Đắk Nông', 1.1),
(20, 'Điện Biên', 1.1),
(21, 'Đồng Nai', 1.1),
(22, 'Đồng Tháp', 1.1),
(23, 'Gia Lai', 1.1),
(24, 'Hà Giang', 1.1),
(25, 'Hà Nam', 1.1),
(26, 'Hải Dương', 1.1),
(27, 'Hải Phòng', 1.12),
(28, 'Hậu Giang', 1.1),
(29, 'Hoà Bình', 1.1),
(30, 'Hưng Yên', 1.1),
(31, 'Khánh Hoà', 1.1),
(32, 'Kiên Giang', 1.1),
(33, 'Kom Tum', 1.1),
(34, 'Lai Châu', 1.1),
(35, 'Lâm Đồng', 1.1),
(36, 'Lạng Sơn', 1.12),
(37, 'Lào Cai', 1.1),
(38, 'Long An', 1.1),
(39, 'Nam Định', 1.1),
(40, 'Nghệ An', 1.1),
(41, 'Ninh Bình', 1.1),
(42, 'Ninh Thuận', 1.1),
(43, 'Phú Thọ', 1.1),
(44, 'Phú Yên', 1.1),
(45, 'Quảng Bình', 1.1),
(46, 'Quảng Nam', 1.1),
(47, 'Quảng Ngãi', 1.1),
(48, 'Quảng Trị', 1.1),
(49, 'Sóc Trăng', 1.1),
(50, 'Sơn La', 1.12),
(51, 'Tây Ninh', 1.1),
(52, 'Thái Bình', 1.1),
(53, 'Thái Nguyên', 1.1),
(54, 'Thanh Hoá', 1.1),
(55, 'Thừa Thiên - Huế', 1.1),
(56, 'Tiền Giang', 1.1),
(57, 'Vĩnh Long', 1.1),
(58, 'Vĩnh Phúc', 1.1),
(59, 'Nha Trang', 1.1),
(60, 'Yên Bái', 1.1),
(61, 'Trà Vinh', 1.1),
(62, 'Tuyên Quang', 1.1),
(63, 'Cao Bằng', 1.12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_test_drive`
--

CREATE TABLE `user_test_drive` (
  `user_test_drive_id` int(11) NOT NULL,
  `user_test_drive_day` date DEFAULT NULL,
  `user_test_drive_time` time DEFAULT NULL,
  `user_test_drive_where` varchar(50) DEFAULT NULL,
  `user_test_drive_fullname` varchar(50) DEFAULT NULL,
  `user_test_drive_tel` varchar(20) DEFAULT NULL,
  `user_test_drive_email` varchar(255) DEFAULT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`) USING BTREE,
  ADD KEY `FK_car_type` (`car_type_id`),
  ADD KEY `FK_car_producer` (`car_producer_id`),
  ADD KEY `FK_car_fuel` (`car_fuel_id`),
  ADD KEY `FK_car_seat` (`car_seat_id`),
  ADD KEY `FK_car_transmission` (`car_transmission_id`);

--
-- Chỉ mục cho bảng `car_fuel`
--
ALTER TABLE `car_fuel`
  ADD PRIMARY KEY (`car_fuel_id`);

--
-- Chỉ mục cho bảng `car_img`
--
ALTER TABLE `car_img`
  ADD PRIMARY KEY (`car_img_id`),
  ADD KEY `FK_car_img` (`car_id`);

--
-- Chỉ mục cho bảng `car_producer`
--
ALTER TABLE `car_producer`
  ADD PRIMARY KEY (`car_producer_id`);

--
-- Chỉ mục cho bảng `car_seat`
--
ALTER TABLE `car_seat`
  ADD PRIMARY KEY (`car_seat_id`);

--
-- Chỉ mục cho bảng `car_transmission`
--
ALTER TABLE `car_transmission`
  ADD PRIMARY KEY (`car_transmission_id`);

--
-- Chỉ mục cho bảng `car_type`
--
ALTER TABLE `car_type`
  ADD PRIMARY KEY (`car_type_id`);

--
-- Chỉ mục cho bảng `pay_method`
--
ALTER TABLE `pay_method`
  ADD PRIMARY KEY (`pay_method_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`) USING BTREE,
  ADD KEY `FK_user_province` (`user_province_id`);

--
-- Chỉ mục cho bảng `user_cart_item`
--
ALTER TABLE `user_cart_item`
  ADD PRIMARY KEY (`user_cart_item_id`) USING BTREE,
  ADD KEY `FK_cart_item_car` (`car_id`),
  ADD KEY `FK_cart_item_user` (`user_id`);

--
-- Chỉ mục cho bảng `user_deposit`
--
ALTER TABLE `user_deposit`
  ADD PRIMARY KEY (`user_deposit_id`),
  ADD KEY `FK_car` (`car_id`),
  ADD KEY `FK_user` (`user_id`),
  ADD KEY `FK_pay_method` (`pay_method_id`);

--
-- Chỉ mục cho bảng `user_province`
--
ALTER TABLE `user_province`
  ADD PRIMARY KEY (`user_province_id`);

--
-- Chỉ mục cho bảng `user_test_drive`
--
ALTER TABLE `user_test_drive`
  ADD PRIMARY KEY (`user_test_drive_id`) USING BTREE,
  ADD KEY `FK_test_drive_car` (`car_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `car_fuel`
--
ALTER TABLE `car_fuel`
  MODIFY `car_fuel_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `car_img`
--
ALTER TABLE `car_img`
  MODIFY `car_img_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT cho bảng `car_producer`
--
ALTER TABLE `car_producer`
  MODIFY `car_producer_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `car_seat`
--
ALTER TABLE `car_seat`
  MODIFY `car_seat_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `car_transmission`
--
ALTER TABLE `car_transmission`
  MODIFY `car_transmission_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `car_type`
--
ALTER TABLE `car_type`
  MODIFY `car_type_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `pay_method`
--
ALTER TABLE `pay_method`
  MODIFY `pay_method_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `user_cart_item`
--
ALTER TABLE `user_cart_item`
  MODIFY `user_cart_item_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `user_deposit`
--
ALTER TABLE `user_deposit`
  MODIFY `user_deposit_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT cho bảng `user_province`
--
ALTER TABLE `user_province`
  MODIFY `user_province_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `user_test_drive`
--
ALTER TABLE `user_test_drive`
  MODIFY `user_test_drive_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `FK_car_fuel` FOREIGN KEY (`car_fuel_id`) REFERENCES `car_fuel` (`car_fuel_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_car_producer` FOREIGN KEY (`car_producer_id`) REFERENCES `car_producer` (`car_producer_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_car_seat` FOREIGN KEY (`car_seat_id`) REFERENCES `car_seat` (`car_seat_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_car_transmission` FOREIGN KEY (`car_transmission_id`) REFERENCES `car_transmission` (`car_transmission_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_car_type` FOREIGN KEY (`car_type_id`) REFERENCES `car_type` (`car_type_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `car_img`
--
ALTER TABLE `car_img`
  ADD CONSTRAINT `FK_car_img` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_cart_item`
--
ALTER TABLE `user_cart_item`
  ADD CONSTRAINT `FK_cart_item_car` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`),
  ADD CONSTRAINT `FK_cart_item_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `user_deposit`
--
ALTER TABLE `user_deposit`
  ADD CONSTRAINT `FK_car` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pay_method` FOREIGN KEY (`pay_method_id`) REFERENCES `pay_method` (`pay_method_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
