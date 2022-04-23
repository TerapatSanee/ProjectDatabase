-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 09:01 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bill_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bill_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_status`
--

CREATE TABLE `bill_status` (
  `bill_status` int(1) NOT NULL,
  `bill_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill_status`
--

INSERT INTO `bill_status` (`bill_status`, `bill_name`) VALUES
(0, 'รอรับออเดอร์'),
(1, 'พนักงานรับออเดอร์เรียบร้อย'),
(2, 'ออเดอร์ของคุณถูกยกเลิก');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_foodname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `cart_food_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_price` int(11) NOT NULL,
  `cart_amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `foodID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `FoodID` int(10) NOT NULL,
  `FoodName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `FoodTypeID` int(5) NOT NULL,
  `Food_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`FoodID`, `FoodName`, `FoodTypeID`, `Food_price`) VALUES
(1, 'กาแฟโบราณ', 11, 20),
(2, 'ลาเต้', 11, 20),
(3, 'มอคค่า', 11, 20),
(4, 'เอสเพรสโซ่', 11, 20),
(5, 'ไวท์มอลต์', 22, 20),
(6, 'โกโก้', 22, 20),
(7, 'นมเย็น', 22, 20),
(8, 'นมกล้วย', 22, 20),
(9, 'บลูพาราไดซ์', 22, 20),
(10, 'นมสด', 22, 20),
(11, 'ชาดำเย็น', 33, 25),
(12, 'ชามะนาว', 33, 25),
(13, 'ชาเย็น', 33, 25),
(14, 'ชาเขียว', 33, 25),
(15, 'น้ำเขียว', 44, 25),
(16, 'น้ำแดงมะนาว', 44, 25),
(17, 'น้ำเขียวมะนาว', 44, 25),
(18, 'น้ำผึ้งมะนาว', 44, 25),
(19, 'น้ำบลูเลมอน', 44, 25),
(20, 'น้ำบลูเบอรี่', 44, 25),
(21, 'สตอเบอรี่', 55, 30),
(22, 'กี่วี่', 55, 30),
(23, 'สับปะรด', 55, 30),
(24, 'แคนตาลูป', 55, 30),
(25, 'ลิ้นจี่', 55, 30),
(26, 'พั้นซ์', 55, 30),
(27, 'แอปเปิ้ลเขียว', 55, 30),
(28, 'แตงโม', 55, 30);

-- --------------------------------------------------------

--
-- Table structure for table `foodtype`
--

CREATE TABLE `foodtype` (
  `FoodTypeID` int(5) NOT NULL,
  `FoodTypeName` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `foodtype`
--

INSERT INTO `foodtype` (`FoodTypeID`, `FoodTypeName`) VALUES
(11, 'กาแฟ'),
(22, 'นม'),
(33, 'ชา'),
(44, 'น้ำโซดา'),
(55, 'น้ำผลไม้');

-- --------------------------------------------------------

--
-- Table structure for table `food_recipes`
--

CREATE TABLE `food_recipes` (
  `Food_re_id` int(11) NOT NULL,
  `stockID` int(11) NOT NULL,
  `recipes_size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_recipes`
--

INSERT INTO `food_recipes` (`Food_re_id`, `stockID`, `recipes_size`) VALUES
(1, 1, 20),
(2, 2, 20),
(3, 3, 30),
(4, 4, 15),
(5, 5, 20),
(6, 6, 200),
(7, 7, 20),
(8, 8, 30),
(9, 9, 30),
(10, 10, 20),
(11, 11, 20),
(12, 12, 20),
(13, 13, 30),
(14, 14, 30),
(15, 15, 30),
(16, 16, 20),
(17, 17, 30),
(18, 18, 20),
(19, 19, 30),
(20, 20, 30),
(21, 21, 30),
(22, 22, 20),
(23, 23, 20),
(24, 24, 20),
(25, 25, 20),
(26, 26, 20),
(27, 27, 30),
(28, 28, 20);

-- --------------------------------------------------------

--
-- Table structure for table `ie_customer_works`
--

CREATE TABLE `ie_customer_works` (
  `ie_cus_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `IE_status` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ie_status`
--

CREATE TABLE `ie_status` (
  `IE_status` int(11) NOT NULL,
  `IE_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ie_status`
--

INSERT INTO `ie_status` (`IE_status`, `IE_name`) VALUES
(1, 'รายรับ'),
(2, 'รายจ่าย');

-- --------------------------------------------------------

--
-- Table structure for table `incomeexpense`
--

CREATE TABLE `incomeexpense` (
  `IE_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `employee_sale` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IE_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomeexpense`
--

INSERT INTO `incomeexpense` (`IE_id`, `date`, `user_name`, `user_status`, `total_price`, `employee_sale`, `IE_status`) VALUES
(62, '2020-03-22 07:30:46', 'Terapat', 1, 85, 'Sanee', 1),
(63, '2020-03-22 07:30:57', 'Terapat', 1, 25, 'Sanee', 1),
(64, '2020-03-22 07:31:22', 'mokeiei', 1, 40, 'Sanee', 1),
(65, '2020-03-22 07:35:50', 'mokeiei', 1, 120, 'Employee2', 1),
(69, '2020-03-22 07:58:51', 'Employee2', 2, 124, 'Admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `food_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_price` int(11) NOT NULL,
  `food_amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `foodid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `user_status` int(11) NOT NULL,
  `status_name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`user_status`, `status_name`) VALUES
(1, 'customer'),
(2, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockID` int(10) NOT NULL,
  `stockName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stockPrice` int(11) NOT NULL,
  `stockAmount` int(3) NOT NULL,
  `stocksize` int(7) NOT NULL COMMENT 'g/mm',
  `stocktypeID` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `foodid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockID`, `stockName`, `stockPrice`, `stockAmount`, `stocksize`, `stocktypeID`, `foodid`) VALUES
(1, 'ผงกาแฟลาเต้', 145, 2, 10, 'st02', 2),
(2, 'ผงกาแฟมอคค่า', 145, 9, 110, 'st02', 3),
(3, 'ผงชา ตรามือ  ', 125, 9, 400, 'st02', 13),
(4, 'อูจิ มัทฉะ กรีนที  ', 290, 0, 10, 'st02', 14),
(5, 'ผงกาแฟเอสเพรสโซ่   ', 145, 5, 70, 'st02', 4),
(6, 'นมจืด ', 91, 3, 2000, 'st03', 10),
(7, 'ผงโกโก้  ', 125, 5, 400, 'st02', 6),
(8, 'ผงกาแฟโบราณ  ', 240, 3, 0, 'st02', 1),
(9, 'น้ำผึ้ง ', 195, 2, 770, 'st03', 18),
(10, 'น้ําแดงเฮลบลูบอย', 55, 3, 650, 'st03', 16),
(11, 'น้ําเขียวเฮลบลูบอย', 55, 0, 10, 'st03', 15),
(12, 'ผงไวท์มอลด์', 199, 5, 60, 'st03', 5),
(13, 'น้ำไซรัปเลมอน ', 62, 2, 725, 'st03', 19),
(14, 'น้ำไซรัปบลูเบอรี่', 62, 2, 665, 'st03', 20),
(15, 'น้ำไซรัปสตอเบอรี่ ', 62, 2, 635, 'st03', 21),
(16, 'น้ำไซรัปกี่วี่่', 62, 2, 735, 'st03', 22),
(17, 'น้ำไซรัปแคนตาลูป', 62, 2, 695, 'st03', 24),
(18, 'น้ำไซรัปสัปปะรด', 62, 2, 10, 'st03', 23),
(19, 'น้ำไซรัปลิ้นจี่่', 62, 3, 605, 'st03', 25),
(20, 'น้ำไซรัปแอปเปิ้ลเขียว', 62, 2, 515, 'st03', 27),
(21, 'น้ำไซรัปแตงโม', 62, 2, 665, 'st03', 28),
(22, 'ผงนมเย็นสำเร็จรูป', 38, 4, 80, 'st02', 7),
(23, 'ผงชามะนาว', 68, 4, 240, 'st02', 12),
(24, 'ผงน้ำเขียวมะนาว', 50, 5, 190, 'st02', 17),
(25, 'ผงชาดำ', 50, 0, 10, 'st02', 11),
(26, 'ผงนมกล้วย', 80, 1, 10, 'st02', 8),
(27, 'น้ำไซรัปพั้นซ์', 62, 2, 515, 'st03', 26),
(28, 'ผงบลูพาราไดซ์', 70, 3, 70, 'st02', 9);

-- --------------------------------------------------------

--
-- Table structure for table `stocktype`
--

CREATE TABLE `stocktype` (
  `stocktypeID` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `stocktypename` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stockUnit` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stocktype`
--

INSERT INTO `stocktype` (`stocktypeID`, `stocktypename`, `stockUnit`) VALUES
('st01', 'กระป๋อง', 'กรัม'),
('st02', 'ถุง', 'กรัม'),
('st03', 'ขวด', 'มิลลิลิตร');

-- --------------------------------------------------------

--
-- Table structure for table `stock_work`
--

CREATE TABLE `stock_work` (
  `stock_work_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_sex` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_add` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_name`, `user_sex`, `user_add`, `user_phone`, `user_status`) VALUES
(4, 'customer', '12345', 'Terapat', 'M', 'อยู่ไหนก็ไดเโตแล้ว', '097-039-5853', 1),
(5, 'employee', '12345', 'Sanee', 'F', 'อาศัพอยู่ที่ร้าน', '097-358-8546', 2),
(6, 'mokeiei', '12345', 'mokeiei', 'M', 'มหาวิทยาลัยขอนแก่น', '089-815-7097', 1),
(7, 'pMan', 'sudlor', 'Pongsathon', 'F', 'baan', '0894561236', 1),
(8, 'employee2', '12345', 'Employee2', 'M', 'มหาวิทยาลัยขอนแก่น 40000', '095-231-4477', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `bill_status` (`bill_status`);

--
-- Indexes for table `bill_status`
--
ALTER TABLE `bill_status`
  ADD PRIMARY KEY (`bill_status`),
  ADD KEY `bill_status` (`bill_status`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cus_id` (`user_id`),
  ADD KEY `product_id` (`foodID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`FoodID`),
  ADD KEY `FoodTypeID` (`FoodTypeID`);

--
-- Indexes for table `foodtype`
--
ALTER TABLE `foodtype`
  ADD PRIMARY KEY (`FoodTypeID`);

--
-- Indexes for table `food_recipes`
--
ALTER TABLE `food_recipes`
  ADD PRIMARY KEY (`Food_re_id`),
  ADD KEY `stockID` (`stockID`);

--
-- Indexes for table `ie_customer_works`
--
ALTER TABLE `ie_customer_works`
  ADD PRIMARY KEY (`ie_cus_id`);

--
-- Indexes for table `ie_status`
--
ALTER TABLE `ie_status`
  ADD PRIMARY KEY (`IE_status`);

--
-- Indexes for table `incomeexpense`
--
ALTER TABLE `incomeexpense`
  ADD PRIMARY KEY (`IE_id`),
  ADD KEY `IE_status` (`IE_status`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_detail_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id_2` (`order_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`user_status`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockID`),
  ADD KEY `stocktypeid` (`stocktypeID`);

--
-- Indexes for table `stocktype`
--
ALTER TABLE `stocktype`
  ADD PRIMARY KEY (`stocktypeID`);

--
-- Indexes for table `stock_work`
--
ALTER TABLE `stock_work`
  ADD PRIMARY KEY (`stock_work_id`),
  ADD KEY `fk_stockwork_order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_username_2` (`user_username`),
  ADD UNIQUE KEY `user_username_4` (`user_username`),
  ADD KEY `user_status` (`user_status`),
  ADD KEY `user_username_3` (`user_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `FoodID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `food_recipes`
--
ALTER TABLE `food_recipes`
  MODIFY `Food_re_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ie_customer_works`
--
ALTER TABLE `ie_customer_works`
  MODIFY `ie_cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ie_status`
--
ALTER TABLE `ie_status`
  MODIFY `IE_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `incomeexpense`
--
ALTER TABLE `incomeexpense`
  MODIFY `IE_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `user_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `stock_work`
--
ALTER TABLE `stock_work`
  MODIFY `stock_work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_status` FOREIGN KEY (`bill_status`) REFERENCES `bill_status` (`bill_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `fk_food_typeid` FOREIGN KEY (`FoodTypeID`) REFERENCES `foodtype` (`FoodTypeID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `food_recipes`
--
ALTER TABLE `food_recipes`
  ADD CONSTRAINT `fk_food_recipes_stockID` FOREIGN KEY (`stockID`) REFERENCES `stock` (`stockID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `incomeexpense`
--
ALTER TABLE `incomeexpense`
  ADD CONSTRAINT `fk_incomeexpen_ie_status` FOREIGN KEY (`IE_status`) REFERENCES `ie_status` (`IE_status`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `fk_users_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_stocktypeid` FOREIGN KEY (`stocktypeID`) REFERENCES `stocktype` (`stocktypeID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `stock_work`
--
ALTER TABLE `stock_work`
  ADD CONSTRAINT `fk_stockwork_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders_detail` (`order_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_status_status_id` FOREIGN KEY (`user_status`) REFERENCES `status` (`user_status`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
