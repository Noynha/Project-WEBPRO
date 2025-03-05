-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2025 at 03:43 PM
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
(1, 'ผัดไทย', 65, 0x696d616765732f706164746861692e706e67, 'เส้นจันท์ผัดกับไข่, ถั่วงอก, กุ้งหรือไก่, มะนาว, พริกป่น, ถั่วบด'),
(2, 'ต้มยำกุ้ง', 120, 0x696d616765732f546f6d2059756d20476f6f6e672e6a7067, 'ซุปเปรี้ยวเผ็ดที่มีรสชาติจากข่า, ตะไคร้, ใบมะกรูด, พริกสด'),
(3, 'แกงเขียวหวานไก่', 130, 0x696d616765732f477265656e2043757272792e6a7067, 'แกงกะทิที่มีรสหวานเผ็ดจากพริกแกงเขียวหวาน และเสิร์ฟกับไก่และผัก'),
(4, 'ส้มตำไทย', 80, 0x696d616765732f54686169205061706179612053616c61642e6a7067, 'สลัดมะละกอสับพร้อมพริก, มะนาว, น้ำปลา, น้ำตาลปี๊บ และถั่วลิสง'),
(5, 'หมูสะเต๊ะ', 100, 0x696d616765732f4d6f6f2053617461792e6a7067, 'หมูหมักในเครื่องเทศแล้วย่างจนหอม เสิร์ฟกับน้ำจิ้มถั่ว'),
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
(1, 'atittaya27', 0, '00:00:00'),
(2, 'atittaya27', 185, '16:52:38'),
(3, 'atittaya27', 160, '16:56:13'),
(4, 'atittaya27', 195, '18:08:39'),
(5, 'atittaya27', 130, '18:10:24'),
(6, 'atittaya27', 130, '18:24:16'),
(7, 'atittaya27', 60, '18:30:04'),
(8, 'atittaya27', 60, '18:30:56'),
(10, 'atittaya27', 180, '18:41:21'),
(11, 'atittaya27', 240, '18:43:37'),
(12, 'atittaya27', 65, '19:54:09'),
(13, 'atittaya27', 325, '20:53:51'),
(14, 'atittaya27', 755, '20:54:22');

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
  `Picture_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`Order_detail_id`, `Order_id`, `Menu_id`, `Name_menu`, `Price_menu`, `Picture_menu`) VALUES
(2, 13, 1, 'ผัดไทย', 65, 'images/padthai.png');

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
(7, 'noynha', '0878317248', '2025-03-06', '10:30:00', 12, NULL);

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
('atittaya27', 'atittaya', '0918486072', 'maiatittaya.a@gmail.com', '1234');

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
  ADD KEY `User_id` (`User_id`);

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
  MODIFY `Order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `Order_detail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patment`
--
ALTER TABLE `patment`
  MODIFY `Pay_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user_member` (`User_id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `Menu_id` FOREIGN KEY (`Menu_id`) REFERENCES `menu` (`Menu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
