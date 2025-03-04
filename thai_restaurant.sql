-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2025 at 10:27 AM
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
  `Picture_menu` varchar(255) NOT NULL,
  `Explanation_menu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`Menu_id`, `Name_menu`, `Price_menu`, `Picture_menu`, `Explanation_menu`) VALUES
(1, 'ผัดไทย', 65, '', 'เส้นจันท์ผัดกับไข่, ถั่วงอก, กุ้งหรือไก่, มะนาว, พริกป่น, ถั่วบด'),
(2, 'ต้มยำกุ้ง', 120, '', 'ซุปเปรี้ยวเผ็ดที่มีรสชาติจากข่า, ตะไคร้, ใบมะกรูด, พริกสด'),
(3, 'แกงเขียวหวานไก่', 130, '', 'แกงกะทิที่มีรสหวานเผ็ดจากพริกแกงเขียวหวาน และเสิร์ฟกับไก่และผัก'),
(4, 'ส้มตำไทย', 80, '', 'สลัดมะละกอสับพร้อมพริก, มะนาว, น้ำปลา, น้ำตาลปี๊บ และถั่วลิสง'),
(5, 'หมูสะเต๊ะ', 100, '', 'หมูหมักในเครื่องเทศแล้วย่างจนหอม เสิร์ฟกับน้ำจิ้มถั่ว');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Order_id` int(10) NOT NULL,
  `User_id` varchar(20) NOT NULL,
  `Total_price` int(10) NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Order_id`, `User_id`, `Total_price`, `Time`) VALUES
(1, 'atittaya27', 0, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `Order_detail_id` int(10) NOT NULL,
  `Name_menu` varchar(30) NOT NULL,
  `Price_menu` int(10) NOT NULL,
  `Picture_menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`Order_detail_id`, `Name_menu`, `Price_menu`, `Picture_menu`) VALUES
(1, 'ผัดไทย', 65, '');

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
(2, 'noynha', '+66970483949', '2025-03-05', '10:30:00', 1, NULL),
(3, 'noynha', '+66970483949', '2025-03-05', '10:30:00', 12, NULL);

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
('atittaya27', 'atittaya', '0918486072', 'maiatittaya.a@gmail.com', 'atittaya'),
('noynha2005', 'noynha', '0878317248', 'paritasurin@gmail.com', '1234');

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
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`Order_detail_id`);

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
  MODIFY `Menu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `Order_detail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patment`
--
ALTER TABLE `patment`
  MODIFY `Pay_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user_member` (`User_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user_member` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
