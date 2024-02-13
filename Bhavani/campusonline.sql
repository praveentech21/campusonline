-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 03:22 AM
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
-- Database: `campusonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `coustmer_id` varchar(15) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `category_id` varchar(15) NOT NULL,
  `product_quantity` int(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`coustmer_id`, `product_id`, `category_id`, `product_quantity`) VALUES
('000000', 'SNK0002', 'CAT2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `category_id` varchar(15) NOT NULL,
  `category_name` varchar(40) NOT NULL,
  `category_description` varchar(50) NOT NULL,
  `category_weightage` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`category_id`, `category_name`, `category_description`, `category_weightage`) VALUES
('CAT1', 'Home Made Food', 'Healthy Home Made Food Specialy for SRKREC Student', 10),
('CAT2', 'Snacks', 'All Snacks will be shown hear', 3),
('CAT3', 'Stufood', 'Stufood Especailly for Students', 2);

-- --------------------------------------------------------

--
-- Table structure for table `coupans`
--

CREATE TABLE `coupans` (
  `coupan_id` varchar(15) NOT NULL,
  `coupan_name` varchar(25) NOT NULL,
  `coupan_descrpition` varchar(50) NOT NULL,
  `coupan_type` int(4) NOT NULL,
  `coupan_value` float NOT NULL,
  `coupan_starts` date DEFAULT NULL,
  `coupans_ends` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupans`
--

INSERT INTO `coupans` (`coupan_id`, `coupan_name`, `coupan_descrpition`, `coupan_type`, `coupan_value`, `coupan_starts`, `coupans_ends`) VALUES
('Coupan1', 'Sri_Ram', 'Jai Sri Ram', 2, 10, '2024-02-09', '2024-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `coupans_used`
--

CREATE TABLE `coupans_used` (
  `coustmer_id` varchar(15) NOT NULL,
  `order_id` varchar(15) NOT NULL,
  `coupan_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupan_applicable`
--

CREATE TABLE `coupan_applicable` (
  `coupan_id` varchar(15) NOT NULL,
  `category_id` varchar(15) NOT NULL DEFAULT '0',
  `product_id` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupan_applicable`
--

INSERT INTO `coupan_applicable` (`coupan_id`, `category_id`, `product_id`) VALUES
('Coupan1', '0', 'SNK0001'),
('Coupan1', 'CAT1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `credites`
--

CREATE TABLE `credites` (
  `order_id` varchar(10) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `avalible_credites` float NOT NULL,
  `date` date NOT NULL,
  `credites_used` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `header` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`header`) VALUES
('Welcome to SRKR Campus Online as part fo introduction offer we are providing all itam at a discount prize\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(15) NOT NULL,
  `coustmer_id` varchar(15) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `product_quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `coustmer_id`, `product_id`, `product_quantity`) VALUES
('H63Z1', '21B91A6206', 'HMDM0001', 1),
('H63Z1', '21B91A6206', 'SNK0001', 2),
('H63Z1', '21B91A6206', 'SNK0002', 2),
('H63Z1', '21B91A6206', 'STFD0001', 2),
('LOEI8', '21B91A6206', 'HMDM0001', 1),
('LOEI8', '21B91A6206', 'HMDM0003', 1),
('RVZRS', '21B91A6206', 'HMDM0002', 1),
('RVZRS', '21B91A6206', 'HMDM0003', 1),
('RVZRS', '21B91A6206', 'HMDM0004', 1),
('RVZRS', '21B91A6206', 'SNK0001', 2),
('RVZRS', '21B91A6206', 'SNK0002', 1),
('VY24Y', '21B91A6206', 'HMDM0001', 1),
('VY24Y', '21B91A6206', 'HMDM0002', 2),
('VY24Y', '21B91A6206', 'HMDM0003', 1),
('VY24Y', '21B91A6206', 'SNK0002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` varchar(15) NOT NULL,
  `coustmer_id` varchar(15) NOT NULL,
  `total_amount` float NOT NULL,
  `discount_price` float NOT NULL,
  `coupan_price` float NOT NULL,
  `Shipping_price` float NOT NULL,
  `order_amount` float NOT NULL,
  `status` int(5) NOT NULL,
  `address` varchar(50) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `coustmer_id`, `total_amount`, `discount_price`, `coupan_price`, `Shipping_price`, `order_amount`, `status`, `address`, `order_date`) VALUES
('8WM0N', '21B91A6206', 0, 0, 0, 0, 0, 2, '', '2024-02-09'),
('H63Z1', '21B91A6206', 510, 110, 0, 0, 400, 1, '', '2024-02-13'),
('LOEI8', '21B91A6206', 290, 50, 14, 0, 226, 1, '', '2024-02-13'),
('RVZRS', '21B91A6206', 660, 90, 42, 0, 528, 1, '', '2024-02-09'),
('VY24Y', '21B91A6206', 650, 80, 52, 0, 518, 1, '', '2024-02-09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `sku` varchar(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` float NOT NULL,
  `category_id` varchar(15) NOT NULL,
  `discount_price` float NOT NULL DEFAULT 0,
  `about_product` varchar(50) DEFAULT NULL,
  `date_create` date NOT NULL DEFAULT current_timestamp(),
  `no_units` int(5) NOT NULL DEFAULT 1000,
  `product_start_time` time DEFAULT NULL,
  `product_end_time` time DEFAULT NULL,
  `photo1` varchar(50) NOT NULL,
  `photo2` varchar(50) DEFAULT NULL,
  `photo3` varchar(50) DEFAULT NULL,
  `photo4` varchar(50) DEFAULT NULL,
  `photo5` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`sku`, `product_name`, `product_price`, `category_id`, `discount_price`, `about_product`, `date_create`, `no_units`, `product_start_time`, `product_end_time`, `photo1`, `photo2`, `photo3`, `photo4`, `photo5`) VALUES
('HMDM0001', '      Veg Fried Rice      ', 110, 'CAT1', 100, '      Homely Made Healthy Veg Fried Rice      ', '2024-02-08', 100, '00:00:00', '00:00:00', '65c5155ef3e2c_25.png', '65c5155ef3fe0_1.png', '65c5155ef415d_8.png', '65c5155f0003c_9.png', '65c5155f00139_10.png'),
('HMDM0002', 'Ulavacharu Biriyani', 150, 'CAT1', 140, 'Homely Made Healthy Chicken Noodles', '2024-02-08', 50, '00:00:10', '15:00:00', '65c50f08d1200_15.png', NULL, NULL, NULL, NULL),
('HMDM0003', 'Avakai Biriyani', 180, 'CAT1', 140, 'Home Made Food', '2024-02-08', 105, '00:00:09', '15:00:00', '65c50f6a1d741_19.png', NULL, NULL, NULL, NULL),
('HMDM0004', 'Chicken Fry Piece Biriyani', 150, 'CAT1', 140, 'Home Made Food', '2024-02-08', 6564, '00:00:20', '15:00:00', '65c50fbf75bc0_22.png', NULL, NULL, NULL, NULL),
('SNK0001', 'Sana Punukulu', 60, 'CAT2', 50, 'Home Made Snack', '2024-02-08', 20, '00:00:00', '00:00:00', '65c510db4bcf8_25.png', NULL, NULL, NULL, NULL),
('SNK0002', 'Bajilu', 60, 'CAT2', 50, 'Home Made Snack', '2024-02-08', 50, '00:00:00', '00:00:00', '65c511626cb93_14.png', '65c511626ccf6_15.png', '65c511626cde8_16.png', '65c511626cf0e_17.png', '65c511626d087_18.png'),
('STFD0001', 'Monday Menu', 80, 'CAT3', 50, 'Student Food', '2024-02-08', 50, '00:00:10', '15:00:00', '65c51017f108e_21.png', NULL, NULL, NULL, NULL),
('STFD0002', 'Tuesday Special', 90, 'CAT3', 70, 'Student Food', '2024-02-08', 50, '00:00:10', '15:00:00', '65c5106559958_17.png', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `product_id` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `additional_info` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_id`, `description`, `additional_info`) VALUES
('HMDM0001', 'Home Made                          ', 'Home Made'),
('HMDM0002', 'Home Made Food', 'Home Made Food'),
('HMDM0003', 'Home Made Food', 'Home Made Food'),
('HMDM0004', 'Home Made Food', 'Home Made Food'),
('SNK0001', 'Home Made Snack', 'Home Made Snack'),
('SNK0002', 'Home Made Snack', 'Home Made Snack'),
('STFD0001', 'Student Food', 'Student Food'),
('STFD0002', 'Student Food                          ', 'Student Food');

-- --------------------------------------------------------

--
-- Table structure for table `recharges`
--

CREATE TABLE `recharges` (
  `recharge_id` varchar(10) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `available_recharge` float NOT NULL,
  `amount` float NOT NULL,
  `cashback` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referal`
--

CREATE TABLE `referal` (
  `refred_student_id` varchar(10) NOT NULL,
  `gained_student_id` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `coustmer_id` varchar(12) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `review` varchar(250) DEFAULT NULL,
  `rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_name` varchar(50) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `student_mobile` varchar(15) NOT NULL,
  `Batch` varchar(10) NOT NULL,
  `Department` varchar(5) NOT NULL,
  `Section` varchar(5) NOT NULL,
  `father_name` varchar(40) DEFAULT NULL,
  `mother_name` varchar(40) DEFAULT NULL,
  `home_town` varchar(40) DEFAULT NULL,
  `Transportation` varchar(10) DEFAULT NULL,
  `photo` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_name`, `student_id`, `student_mobile`, `Batch`, `Department`, `Section`, `father_name`, `mother_name`, `home_town`, `Transportation`, `photo`, `password`) VALUES
('Default User', '000000', '000000', '0000', '000', '00', NULL, NULL, NULL, NULL, '', '000000'),
('Chatrathi Ravi Kumar Satya Sai Praveen', '21B91A6206', '9052727402', '2025', 'CSD', 'A', 'Trimurthulu', 'Ganga Tulasi', 'Tholeru', 'Room', 'saiPraveen.jpg', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `product_id` varchar(15) NOT NULL,
  `tag_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `coustmer_id` varchar(15) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `product_quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`coustmer_id`,`product_id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `coupans`
--
ALTER TABLE `coupans`
  ADD PRIMARY KEY (`coupan_id`);

--
-- Indexes for table `coupan_applicable`
--
ALTER TABLE `coupan_applicable`
  ADD PRIMARY KEY (`coupan_id`,`category_id`,`product_id`);

--
-- Indexes for table `credites`
--
ALTER TABLE `credites`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`sku`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `recharges`
--
ALTER TABLE `recharges`
  ADD PRIMARY KEY (`recharge_id`);

--
-- Indexes for table `referal`
--
ALTER TABLE `referal`
  ADD PRIMARY KEY (`refred_student_id`,`gained_student_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`coustmer_id`,`product_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`product_id`,`tag_name`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`coustmer_id`,`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
