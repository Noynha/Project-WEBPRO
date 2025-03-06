-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2025 at 03:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thai_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `User_name_id` varchar(20) NOT NULL,
  `Status` varchar(5) NOT NULL,
  `User_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`User_name_id`, `Status`, `User_id`) VALUES
('atittaya', '', 'atittaya27');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `Menu_id` int(10) NOT NULL,
  `Name_menu` varchar(30) NOT NULL,
  `Price_menu` int(10) NOT NULL,
  `Picture_menu` blob NOT NULL,
  `Explanation_menu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`Menu_id`, `Name_menu`, `Price_menu`, `Picture_menu`, `Explanation_menu`) VALUES
(4, 'ส้มตำไทย', 56, 0x696d616765732f54686169205061706179612053616c61642e6a7067, 'สลัดมะละกอสับพร้อมพริก, มะนาว, น้ำปลา, น้ำตาลปี๊บ และถั่วลิสง'),
(5, 'หมูสะเต๊ะ', 200, 0x696d616765732f4d6f6f2053617461792e6a7067, 'หมูหมักในเครื่องเทศแล้วย่างจนหอม เสิร์ฟกับน้ำจิ้มถั่ว'),
(8, 'ผัดกะเพราหมูสับ', 60, 0x696d616765732f4b72612050726f77204d6f6f205375622e6a7067, 'วัตถุดิบ: หมูสับ, ใบกะเพรา, พริก, กระเทียม, ซีอิ๊วขาว, น้ำปลา, น้ำตาล\r\nรสชาติ: เผ็ดร้อน เค็มนัว หอมใบกะเพรา'),
(9, 'แกงเขียวหวานไก่', 120, 0x696d616765732f477265656e2043757272792e6a7067, 'วัตถุดิบ: เนื้อไก่, พริกแกงเขียวหวาน, มะเขือเปราะ, ใบโหระพา, กะทิ, น้ำปลา, น้ำตาลปี๊บ\r\nรสชาติ: เข้มข้น เผ็ดมัน หอมกลิ่นเครื่องแกง'),
(10, 'หอยลายผัดพริกเผา', 80, 0x696d616765732f486f79204c61792050616420506c69672050686f772e6a7067, 'วัตถุดิบ: หอยลาย, ซอสพริกเผา, กระเทียม, พริกสด, ใบโหระพา, ซีอิ๊วขาว\r\nรสชาติ: เผ็ดหวาน หอมพริกเผา'),
(12, 'ปลาตะเพียนทอด', 200, 0x696d616765732f5461706869616e20466973682046726965642e6a7067, 'วัตถุดิบ: ปลาตะเพียน, แป้งทอดกรอบ, น้ำปลาพริกหรือน้ำจิ้มหวาน\r\nรสชาติ: กรอบ เค็มหวาน กินกับข้าวร้อน ๆ'),
(13, 'ยำปลาสลิด', 200, 0x696d616765732f59756d20507261205361204c69742e6a7067, 'วัตถุดิบ: ปลาสลิดทอด, หอมแดง, มะม่วงเปรี้ยว, พริกขี้หนู, น้ำปลา, น้ำตาลปี๊บ, มะนาว\r\nรสชาติ: เปรี้ยว เค็ม หวาน เผ็ดนิด ๆ'),
(14, 'แกงจืดเต้าหู้หมูสับ', 120, 0x696d616765732f436c65617220536f7570207769746820506f726b2e6a7067, 'วัตถุดิบ: หมูสับ, เต้าหู้ไข่, ผักกาดขาว, รากผักชี, กระเทียม, ซีอิ๊วขาว\r\nรสชาติ: อ่อน ๆ กลมกล่อม ซุปร้อนหอมกระเทียม'),
(15, 'หมูทอดกระเทียม', 70, 0x696d616765732f467269656420506f726b2077697468204761726c69632e6a7067, 'วัตถุดิบ: หมูหมัก, กระเทียม, น้ำปลา, น้ำตาล, พริกไทย\r\nรสชาติ: เค็มหวาน หอมกระเทียมกรอบ'),
(16, 'ต้มข่าไก่', 110, 0x696d616765732f546f6d204b686120536f75702e6a7067, 'วัตถุดิบ: เนื้อไก่, กะทิ, ข่า, ตะไคร้, ใบมะกรูด, มะนาว, น้ำปลา\r\nรสชาติ: เปรี้ยว มัน เค็ม หอมข่า'),
(17, 'ไข่ตุ๋น', 50, 0x696d616765732f4567672054756e6e2e6a7067, 'วัตถุดิบ: ไข่, น้ำซุป, ซีอิ๊วขาว, ต้นหอม, หมูสับ\r\nรสชาติ: เนียนนุ่ม หอมละมุน เค็มอ่อน ๆ'),
(18, 'แกงส้มชะอมไข่', 120, 0x696d616765732f536f757220736f6d204567672e6a7067, 'วัตถุดิบ: ไข่เจียวชะอม, น้ำพริกแกงส้ม, น้ำมะขามเปียก, น้ำปลา\r\nรสชาติ: เปรี้ยว เผ็ด หอมเครื่องแกง'),
(19, 'ผัดผักรวมมิตร', 60, 0x696d616765732f53616c6164204d697865642e6a7067, 'วัตถุดิบ: ผักหลายชนิด (แครอท, บรอกโคลี, เห็ด), ซอสหอยนางรม, กระเทียม\r\nรสชาติ: กลมกล่อม หอมกระเทียม'),
(20, 'ไก่ผัดเม็ดมะม่วงหิมพานต์', 60, 0x696d616765732f436869636b656e20506164204e7574732e6a7067, 'วัตถุดิบ: ไก่, เม็ดมะม่วงหิมพานต์, พริกแห้ง, ซอสปรุงรส\r\nรสชาติ: หวาน เค็ม มัน หอมพริกแห้ง'),
(21, 'แกงป่าไก่', 120, 0x696d616765732f4a756e676c652043757272792e6a7067, 'วัตถุดิบ: ไก่, พริกแกงป่า, มะเขือเปราะ, กระชาย, ใบมะกรูด\r\nรสชาติ: เผ็ดร้อน หอมสมุนไพร'),
(22, 'หมูผัดพริกแกง', 70, 0x696d616765732f506f726b205265642043757272792e6a7067, 'วัตถุดิบ: หมู, พริกแกงแดง, ถั่วฝักยาว, ใบมะกรูด\r\nรสชาติ: เผ็ด เค็ม เข้มข้น'),
(23, 'ปลาราดพริก', 200, 0x696d616765732f46697368205265642053617563652e6a7067, 'วัตถุดิบ: ปลาทอด, พริกสด, กระเทียม, น้ำปลา, น้ำตาล\r\nรสชาติ: เผ็ดหวาน เค็มเล็กน้อย'),
(24, 'ผัดพริกหยวกไก่', 70, 0x696d616765732f436869636b656e207769746820506570706572732e6a7067, 'วัตถุดิบ: ไก่, พริกหยวก, หอมใหญ่, ซีอิ๊วขาว\r\nรสชาติ: หวานเค็ม หอมผัก'),
(25, 'แกงเผ็ดเป็ดย่าง', 60, 0x696d616765732f4475636b2050696e656170706c65205265642043757272792e6a7067, 'วัตถุดิบ: เป็ดย่าง, พริกแกงเผ็ด, กะทิ, สับปะรด\r\nรสชาติ: เผ็ด มัน หวานจากผลไม้'),
(26, 'ผัดคะน้าหมูกรอบ', 60, 0x696d616765732f4b616e6120506164204d6f6f204b726f702e706e67, 'วัตถุดิบ: คะน้า, หมูกรอบ, พริกสด, ซอสหอยนางรม\r\nรสชาติ: กรอบ เค็ม หอมซอส'),
(27, 'ลาบหมู', 60, 0x696d616765732f4c726162204d6f6f2e6a7067, 'วัตถุดิบ: หมูสับ, ข้าวคั่ว, หอมแดง, พริกป่น, น้ำปลา, มะนาว\r\nรสชาติ: เผ็ด เค็ม เปรี้ยว หอมข้าวคั่ว'),
(28, 'ปลานึ่งมะนาว', 200, 0x696d616765732f46697368204e696e67204d616e61772e6a7067, 'วัตถุดิบ: ปลานึ่ง, น้ำยำมะนาว, กระเทียม, พริกขี้หนู\r\nรสชาติ: เปรี้ยว เผ็ด เค็ม สดชื่น'),
(29, 'แกงเลียงกุ้งสด', 120, 0x696d616765732f4b616e67204c696e6720536872696d702e6a7067, 'วัตถุดิบ: กุ้งสด, ฟักทอง, ใบแมงลัก, พริกไทย\r\nรสชาติ: เผ็ดอ่อน ๆ หอมสมุนไพร'),
(30, 'ไก่ต้มน้ำปลา', 90, 0x696d616765732f436869636b656e20546f6d20466973682053617563652e6a7067, 'วัตถุดิบ: ไก่, น้ำปลา, ซีอิ๊วขาว, น้ำตาล\r\nรสชาติ: เค็มหวาน หอมเครื่องเทศ'),
(31, 'กุ้งทอดกระเทียม', 150, 0x696d616765732f536872696d7020476172696c632e6a7067, 'วัตถุดิบ: กุ้ง, กระเทียม, น้ำปลา\r\nรสชาติ: เค็ม หอมกรอบ'),
(32, 'แกงมัสมั่นไก่', 500, 0x696d616765732f4d617373616d616e2e6a7067, 'วัตถุดิบ: ไก่, มันฝรั่ง, กะทิ, พริกแกงมัสมั่น\r\nรสชาติ: หวาน เค็ม มัน หอมเครื่องเทศ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(10) NOT NULL,
  `User_id` varchar(20) NOT NULL,
  `Total_price` int(10) NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `User_id`, `Total_price`, `Time`) VALUES
(40, 'atittaya27', 380, '00:00:00'),
(41, 'atittaya27', 380, '00:00:00'),
(42, 'atittaya27', 380, '00:00:00'),
(43, 'atittaya27', 380, '00:00:00'),
(44, 'atittaya27', 380, '00:00:00'),
(45, 'atittaya27', 380, '00:00:00'),
(46, 'atittaya27', 380, '00:00:00'),
(47, 'atittaya27', 380, '00:00:00'),
(48, 'atittaya27', 380, '00:00:00'),
(49, 'atittaya27', 380, '00:00:00'),
(50, 'atittaya27', 380, '00:00:00'),
(51, 'atittaya27', 460, '00:00:00'),
(52, 'atittaya27', 460, '00:00:00'),
(53, 'atittaya27', 380, '00:00:00'),
(54, 'atittaya27', 380, '00:00:00'),
(55, 'atittaya27', 380, '00:00:00'),
(56, 'atittaya27', 380, '00:00:00'),
(57, 'atittaya27', 380, '00:00:00'),
(58, 'atittaya27', 380, '00:00:00'),
(59, 'atittaya27', 805, '00:00:00'),
(60, 'atittaya27', 805, '00:00:00'),
(61, 'atittaya27', 805, '00:00:00'),
(62, 'atittaya27', 5600, '00:00:00'),
(63, 'atittaya27', 525, '00:00:00'),
(64, 'atittaya27', 525, '00:00:00'),
(65, 'atittaya27', 525, '00:00:00'),
(66, 'atittaya27', 525, '00:00:00'),
(67, 'atittaya27', 525, '00:00:00'),
(68, 'atittaya27', 315, '00:00:00'),
(69, 'atittaya27', 395, '00:00:00'),
(70, 'atittaya27', 420, '00:00:00'),
(71, 'atittaya27', 420, '00:00:00'),
(72, 'atittaya27', 420, '00:00:00'),
(73, 'atittaya27', 640, '00:00:00'),
(74, 'atittaya27', 640, '00:00:00'),
(75, 'atittaya27', 185, '00:00:00'),
(76, 'atittaya27', 525, '00:00:00'),
(77, 'atittaya27', 525, '00:00:00'),
(78, 'atittaya27', 525, '00:00:00'),
(79, 'atittaya27', 885, '00:00:00'),
(80, 'atittaya27', 380, '00:00:00'),
(81, 'atittaya27', 185, '00:00:00'),
(82, 'atittaya27', 185, '00:00:00'),
(83, 'atittaya27', 0, '00:00:00'),
(84, 'atittaya27', 0, '00:00:00'),
(85, 'atittaya27', 185, '00:00:00'),
(86, 'atittaya27', 460, '00:00:00'),
(87, 'atittaya27', 315, '00:00:00'),
(88, 'atittaya27', 315, '00:00:00'),
(89, 'atittaya27', 315, '00:00:00'),
(90, 'atittaya27', 380, '00:00:00'),
(91, 'atittaya27', 380, '00:00:00'),
(92, 'atittaya27', 395, '00:00:00'),
(93, 'atittaya27', 630, '00:00:00'),
(94, 'atittaya27', 580, '00:00:00'),
(95, 'atittaya27', 580, '00:00:00'),
(96, 'atittaya27', 256, '00:00:00'),
(97, 'atittaya27', 56, '00:00:00'),
(98, 'atittaya27', 260, '00:00:00'),
(99, 'atittaya27', 492, '00:00:00'),
(100, 'atittaya27', 316, '00:00:00'),
(101, 'atittaya27', 256, '00:00:00'),
(102, 'atittaya27', 676, '00:00:00'),
(103, 'atittaya27', 376, '00:00:00'),
(104, 'atittaya27', 516, '00:00:00'),
(105, 'atittaya27', 372, '00:00:00'),
(106, 'atittaya27', 372, '00:00:00'),
(107, 'atittaya27', 568, '00:00:00'),
(108, 'atittaya27', 372, '00:00:00'),
(109, 'atittaya27', 256, '00:00:00'),
(110, 'atittaya27', 316, '00:00:00'),
(111, 'atittaya27', 368, '00:00:00'),
(112, 'atittaya27', 316, '00:00:00'),
(113, 'atittaya27', 2516, '00:00:00'),
(114, 'atittaya27', 512, '00:00:00'),
(115, 'atittaya27', 1504, '00:00:00'),
(116, 'atittaya27', 3880, '00:00:00'),
(117, 'atittaya27', 1170, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `Order_detail_id` int(10) NOT NULL,
  `Order_id` int(10) NOT NULL,
  `Menu_id` int(10) NOT NULL,
  `Name_menu` varchar(30) NOT NULL,
  `Price_menu` int(10) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`Order_detail_id`, `Order_id`, `Menu_id`, `Name_menu`, `Price_menu`, `Quantity`) VALUES
(193, 92, 4, 'ส้มตำไทย', 80, 1),
(199, 94, 4, 'ส้มตำไทย', 80, 1),
(202, 95, 4, 'ส้มตำไทย', 80, 1),
(203, 96, 4, 'ส้มตำไทย', 56, 1),
(204, 96, 5, 'หมูสะเต๊ะ', 200, 1),
(205, 97, 4, 'ส้มตำไทย', 56, 1),
(206, 98, 5, 'หมูสะเต๊ะ', 200, 1),
(207, 98, 8, 'ผัดกะเพราหมูสับ', 60, 1),
(208, 99, 4, 'ส้มตำไทย', 56, 2),
(209, 99, 5, 'หมูสะเต๊ะ', 200, 1),
(210, 99, 8, 'ผัดกะเพราหมูสับ', 60, 1),
(211, 99, 9, 'แกงเขียวหวานไก่', 120, 1),
(212, 100, 4, 'ส้มตำไทย', 56, 1),
(213, 100, 5, 'หมูสะเต๊ะ', 200, 1),
(214, 100, 8, 'ผัดกะเพราหมูสับ', 60, 1),
(215, 101, 4, 'ส้มตำไทย', 56, 1),
(216, 101, 5, 'หมูสะเต๊ะ', 200, 1),
(217, 102, 4, 'ส้มตำไทย', 56, 1),
(218, 102, 5, 'หมูสะเต๊ะ', 200, 1),
(219, 102, 8, 'ผัดกะเพราหมูสับ', 60, 1),
(220, 102, 9, 'แกงเขียวหวานไก่', 120, 3),
(221, 103, 4, 'ส้มตำไทย', 56, 1),
(222, 103, 5, 'หมูสะเต๊ะ', 200, 1),
(223, 103, 8, 'ผัดกะเพราหมูสับ', 60, 2),
(224, 0, 4, 'ส้มตำไทย', 56, 2),
(225, 0, 5, 'หมูสะเต๊ะ', 200, 1),
(226, 0, 8, 'ผัดกะเพราหมูสับ', 60, 1),
(227, 0, 9, 'แกงเขียวหวานไก่', 120, 1),
(228, 0, 4, 'ส้มตำไทย', 56, 2),
(229, 0, 5, 'หมูสะเต๊ะ', 200, 1),
(230, 0, 8, 'ผัดกะเพราหมูสับ', 60, 1),
(231, 0, 9, 'แกงเขียวหวานไก่', 120, 1),
(232, 0, 4, 'ส้มตำไทย', 56, 2),
(233, 0, 5, 'หมูสะเต๊ะ', 200, 1),
(234, 0, 8, 'ผัดกะเพราหมูสับ', 60, 1),
(235, 0, 9, 'แกงเขียวหวานไก่', 120, 1),
(236, 0, 4, 'ส้มตำไทย', 56, 2),
(237, 0, 5, 'หมูสะเต๊ะ', 200, 1),
(238, 0, 8, 'ผัดกะเพราหมูสับ', 60, 1),
(239, 0, 9, 'แกงเขียวหวานไก่', 120, 1),
(240, 0, 4, 'ส้มตำไทย', 56, 2),
(241, 0, 5, 'หมูสะเต๊ะ', 200, 1),
(242, 0, 8, 'ผัดกะเพราหมูสับ', 60, 1),
(243, 0, 9, 'แกงเขียวหวานไก่', 120, 1),
(244, 104, 4, 'ส้มตำไทย', 56, 1),
(245, 104, 5, 'หมูสะเต๊ะ', 200, 2),
(246, 104, 8, 'ผัดกะเพราหมูสับ', 60, 1),
(247, 105, 4, 'ส้มตำไทย', 56, 2),
(248, 105, 5, 'หมูสะเต๊ะ', 200, 1),
(249, 105, 8, 'ผัดกะเพราหมูสับ', 60, 1),
(250, 106, 4, 'ส้มตำไทย', 56, 2),
(251, 106, 5, 'หมูสะเต๊ะ', 200, 1),
(252, 106, 8, 'ผัดกะเพราหมูสับ', 60, 1),
(253, 107, 4, 'ส้มตำไทย', 56, 3),
(254, 107, 5, 'หมูสะเต๊ะ', 200, 2),
(255, 108, 4, 'ส้มตำไทย', 56, 2),
(256, 108, 5, 'หมูสะเต๊ะ', 200, 1),
(257, 108, 8, 'ผัดกะเพราหมูสับ', 60, 1),
(258, 109, 4, 'ส้มตำไทย', 56, 1),
(259, 109, 5, 'หมูสะเต๊ะ', 200, 1),
(260, 110, 4, 'ส้มตำไทย', 56, 1),
(261, 110, 5, 'หมูสะเต๊ะ', 200, 1),
(262, 110, 8, 'ผัดกะเพราหมูสับ', 60, 1),
(263, 111, 4, 'ส้มตำไทย', 56, 3),
(264, 111, 5, 'หมูสะเต๊ะ', 200, 1),
(265, 112, 4, 'ส้มตำไทย', 56, 1),
(266, 112, 5, 'หมูสะเต๊ะ', 200, 1),
(267, 112, 8, 'ผัดกะเพราหมูสับ', 60, 1),
(268, 113, 4, 'ส้มตำไทย', 56, 1),
(269, 113, 5, 'หมูสะเต๊ะ', 200, 1),
(270, 113, 8, 'ผัดกะเพราหมูสับ', 60, 1),
(271, 113, 9, 'แกงเขียวหวานไก่', 120, 1),
(272, 113, 10, 'หอยลายผัดพริกเผา', 80, 1),
(273, 113, 12, 'ปลาตะเพียนทอด', 200, 10),
(274, 114, 4, 'ส้มตำไทย', 56, 2),
(275, 114, 5, 'หมูสะเต๊ะ', 200, 2),
(276, 115, 4, 'ส้มตำไทย', 56, 4),
(277, 115, 5, 'หมูสะเต๊ะ', 200, 4),
(278, 115, 9, 'แกงเขียวหวานไก่', 120, 4),
(279, 116, 29, 'แกงเลียงกุ้งสด', 120, 22),
(280, 116, 30, 'ไก่ต้มน้ำปลา', 90, 1),
(281, 116, 31, 'กุ้งทอดกระเทียม', 150, 1),
(282, 116, 32, 'แกงมัสมั่นไก่', 500, 2),
(283, 117, 30, 'ไก่ต้มน้ำปลา', 90, 13);

-- --------------------------------------------------------

--
-- Table structure for table `patment`
--

CREATE TABLE `patment` (
  `Pay_id` int(10) NOT NULL,
  `QR_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patment`
--

INSERT INTO `patment` (`Pay_id`, `QR_picture`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `num_people` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `name`, `phone`, `reservation_date`, `reservation_time`, `num_people`, `status`) VALUES
(1, 'Pornchanit', '0928848137', '2025-03-22', '23:08:00', 3, NULL),
(4, 'noynha', '0878317248', '2025-03-06', '10:30:00', 45, NULL),
(5, 'noynha', '0878317248', '2025-03-08', '10:30:00', 133, NULL),
(6, 'noynha', '0878317248', '2025-03-06', '10:30:00', 12, NULL),
(7, 'noynha', '0878317248', '2025-03-06', '10:30:00', 12, NULL),
(8, 'noynha', '0878317248', '2025-03-07', '10:30:00', 12, NULL),
(10, 'ปลาตะเพียนทอด', '0878317248', '2025-03-05', '10:30:00', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_member`
--

CREATE TABLE `user_member` (
  `User_id` varchar(20) NOT NULL,
  `Name_member` varchar(20) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Passwords` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_member`
--

INSERT INTO `user_member` (`User_id`, `Name_member`, `Phone`, `Email`, `Passwords`) VALUES
('atittaya27', 'atittaya', '0918486072', 'maiatittaya.a@gmail.com', '1234'),
('noynha2005', 'noynha', '0878317248', 'paritasurin@gmail.com', 'ๅๅๅๅ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`User_name_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `User_id_2` (`User_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`Order_detail_id`),
  ADD KEY `Order_id` (`Order_id`),
  ADD KEY `Order_id_2` (`Order_id`),
  ADD KEY `Order_id_3` (`Order_id`),
  ADD KEY `Menu_id` (`Menu_id`);

--
-- Indexes for table `patment`
--
ALTER TABLE `patment`
  ADD PRIMARY KEY (`Pay_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `user_member`
--
ALTER TABLE `user_member`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `Menu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `Order_detail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- AUTO_INCREMENT for table `patment`
--
ALTER TABLE `patment`
  MODIFY `Pay_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user_member` (`User_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `User_id` FOREIGN KEY (`User_id`) REFERENCES `user_member` (`User_id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `Menu_id` FOREIGN KEY (`Menu_id`) REFERENCES `menu` (`Menu_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
