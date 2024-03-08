-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 08:25 PM
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
('21B91A6206', 'HF007', '', 1);

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
('CAT001', 'Hoom Food', 'Home food Category has all the home food avabile i', 50),
('CAT002', 'Snack', 'Snack Category has all the Snacks avabile in SRKR ', 49),
('CAT003', 'Resturent Food', 'Resturent Food Category has all the Resturent Food', 51);

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
('Ram1', 'Free10', 'Jai Sri Ram', 2, 10, '2024-03-05', '2024-03-11');

-- --------------------------------------------------------

--
-- Table structure for table `coupans_used`
--

CREATE TABLE `coupans_used` (
  `coustmer_id` varchar(15) NOT NULL,
  `order_id` varchar(15) NOT NULL,
  `coupan_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupans_used`
--

INSERT INTO `coupans_used` (`coustmer_id`, `order_id`, `coupan_id`) VALUES
('21B91A6206', 'SN0LK', 'Free10');

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
('Ram1', 'CAT001', '0');

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

--
-- Dumping data for table `credites`
--

INSERT INTO `credites` (`order_id`, `student_id`, `avalible_credites`, `date`, `credites_used`) VALUES
('F249F', '21B91A6206', 5005, '2024-03-06', 70),
('SN0LK', '21B91A6206', 4935, '2024-03-06', 63),
('ZZ1X2', '21B91A6206', 4872, '2024-03-06', 70);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(5) NOT NULL,
  `header` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `header`) VALUES
(1, 'Jai Sri Ram Krishna');

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
('2AGZM', '21B91A6206', 'HF002', 2),
('2AGZM', '21B91A6206', 'HF003', 2),
('BN29M', '21B91A6206', 'HF003', 1),
('F249F', '21B91A6206', 'HF002', 1),
('F249F', '21B91A6206', 'HF003', 1),
('SN0LK', '21B91A6206', 'HF002', 1),
('SN0LK', '21B91A6206', 'HF003', 1),
('Y030I', '21B91A6206', 'HF002', 1),
('Y030I', '21B91A6206', 'HF003', 1),
('ZZ1X2', '21B91A6206', 'HF002', 1),
('ZZ1X2', '21B91A6206', 'HF003', 1);

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
  `payment` int(2) NOT NULL,
  `status` int(5) NOT NULL,
  `address` varchar(50) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `coustmer_id`, `total_amount`, `discount_price`, `coupan_price`, `Shipping_price`, `order_amount`, `payment`, `status`, `address`, `order_date`) VALUES
('2AGZM', '21B91A6206', 180, 40, 0, 0, 140, 2, 1, '', '2024-03-06'),
('BN29M', '21B91A6206', 50, 10, 0, 0, 40, 2, 1, '', '2024-03-06'),
('F249F', '21B91A6206', 90, 20, 0, 0, 70, 1, 1, '', '2024-03-06'),
('SN0LK', '21B91A6206', 90, 20, 7, 0, 63, 1, 1, '', '2024-03-06'),
('Y030I', '21B91A6206', 90, 20, 0, 0, 70, 3, 1, '', '2024-03-06'),
('ZZ1X2', '21B91A6206', 90, 20, 0, 0, 70, 1, 1, '', '2024-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `order_rewies`
--

CREATE TABLE `order_rewies` (
  `student_id` varchar(15) NOT NULL,
  `order_id` varchar(15) NOT NULL,
  `rating` int(5) NOT NULL,
  `feedback` varchar(200) NOT NULL,
  `review` varchar(200) NOT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_rewies`
--

INSERT INTO `order_rewies` (`student_id`, `order_id`, `rating`, `feedback`, `review`, `image`) VALUES
('21B91A6206', '2AGZM', 4, 'good', 'ok', NULL),
('21B91A6206', 'BN29M', 10, 'Good', 'Good', NULL);

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
('HF001', 'Iteam1', 150, 'CAT002', 130, 'Iteam1', '2024-03-07', 500, '00:00:00', '00:00:00', '65e8b71627646_6.png', '65e8b71627b3a_7.png', '65e8b71627d37_8.png', '65e8b71627ee0_9.png', NULL),
('HF002', 'Cauliflower Fry', 40, 'CAT001', 30, 'Cauliflower Fry ThursdaySpecial', '2024-03-06', 5, '00:00:10', '14:00:00', '65e898987e7fd_3.png', '65e898987ec8a_4.png', '65e898987f07c_5.png', '65e898987f47d_6.png', '65e898987f848_7.png'),
('HF003', 'Aratikay Curry', 50, 'CAT001', 40, 'Thursday Special Aratikay Curry', '2024-03-06', 3, '00:00:00', '00:00:00', '65e898eb29d35_4.png', '65e898eb2a047_5.png', '65e898eb2a306_6.png', '65e898eb2faea_7.png', '65e898eb2fe20_8.png'),
('HF004', 'Iteam11', 50, 'CAT002', 35, 'Iteam11', '2024-03-07', 5000, '00:00:00', '00:00:00', '65e8b7408716b_10.png', '65e8b74087496_11.png', '65e8b7408774b_12.png', '65e8b74087a2e_13.png', '65e8b74087cd5_14.png'),
('HF005', 'Iteam2', 50, 'CAT002', 49, 'Iteam2', '2024-03-07', 2, '00:00:00', '00:00:00', '65e8b76a7b364_12.png', '65e8b76a7b67e_13.png', '65e8b76a7b902_14.png', '65e8b76a7bcb9_15.png', '65e8b76a7bf4a_16.png'),
('HF006', 'Iteam6', 130, 'CAT003', 110, 'Iteam6', '2024-03-07', 5, '00:00:00', '00:00:00', '65e8b7a32fddc_16.png', '65e8b7a330253_17.png', '65e8b7a33052b_18.png', '65e8b7a330797_19.png', '65e8b7a330a3f_20.png'),
('HF007', 'Iteam7', 150, 'CAT003', 140, 'Iteam7', '2024-03-07', 50, '00:00:00', '00:00:00', '65e8b800ac0ee_15.png', '65e8b800ac377_16.png', '65e8b800ac5df_17.png', '65e8b800ac9a7_18.png', '65e8b800acb90_19.png'),
('HF008', 'Iteam8', 300, 'CAT003', 280, 'Iteam8', '2024-03-07', 50, '00:00:10', '14:00:00', '65e8b83c3d8a7_26.png', '65e8b83c3dbd1_27.png', '65e8b83c3dea5_28.png', '65e8b83c3e181_29.png', '65e8b83c3e3b2_30.png');

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
('HF001', 'Iteam1', 'Iteam1'),
('HF002', 'Cauliflower Fry ThursdaySpecial EXCLUSIVE  FOR  SRKRECIANS', 'Cauliflower Fry ThursdaySpecial EXCLUSIVE  FOR  SRKRECIANS'),
('HF003', 'Thursday Special Aratikay Curry EXCLUSIVE  FOR  SRKRECIANS', 'Thursday Special Aratikay Curry EXCLUSIVE  FOR  SRKRECIANS'),
('HF004', 'Iteam11', 'Iteam11'),
('HF005', 'Iteam2', 'Iteam2'),
('HF006', 'Iteam6', 'Iteam6'),
('HF007', 'Iteam7', 'Iteam7'),
('HF008', 'Iteam8', 'Iteam8');

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
  `total_recharge` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recharges`
--

INSERT INTO `recharges` (`recharge_id`, `student_id`, `available_recharge`, `amount`, `cashback`, `total_recharge`, `date`) VALUES
('pay_NjyQsT', '21B91A6206', 10, 1, 0.05, 11.05, '2024-03-08'),
('pay_NjyTcg', '21B91A6206', 11, 1, 0.05, 12.05, '2024-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `recharge_used`
--

CREATE TABLE `recharge_used` (
  `order_id` varchar(10) NOT NULL,
  `student_id` varchar(15) NOT NULL,
  `avabile_recharge_points` int(5) NOT NULL,
  `date` date NOT NULL,
  `recharge_points_used` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recharge_used`
--

INSERT INTO `recharge_used` (`order_id`, `student_id`, `avabile_recharge_points`, `date`, `recharge_points_used`) VALUES
('2AGZM', '21B91A6206', 4960, '2024-03-06', 140),
('BN29M', '21B91A6206', 5000, '2024-03-06', 40);

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

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`coustmer_id`, `product_id`, `review`, `rating`) VALUES
('21B91A6206', 'HF007', 'Good ', 5);

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
  `Section` varchar(5) NOT NULL DEFAULT 'A',
  `father_name` varchar(40) DEFAULT NULL,
  `mother_name` varchar(40) DEFAULT NULL,
  `home_town` varchar(40) DEFAULT NULL,
  `Transportation` varchar(50) DEFAULT NULL,
  `photo` varchar(80) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `reacharge` float NOT NULL DEFAULT 0,
  `cridets` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_name`, `student_id`, `student_mobile`, `Batch`, `Department`, `Section`, `father_name`, `mother_name`, `home_town`, `Transportation`, `photo`, `password`, `email`, `reacharge`, `cridets`) VALUES
('Default User', '000000', '', '', '', 'A', NULL, NULL, NULL, NULL, 'defaultuser.png', '', '', 0, 0),
('Ravi Kumar Satya Sai Praveen', '21B91A6206', '9052727402', '2025', 'CSD', 'A', 'Trimurthulu', 'Ganga Tulasi', 'Tholeru', 'Room', '21B91A6206_saipraveen-pic.jpeg', '123123', 'ravikumar_csd@srkrec.edu.in', 12.05, 4802);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `product_id` varchar(15) NOT NULL,
  `tag_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`product_id`, `tag_name`) VALUES
('HF003', 'biriyani'),
('HF004', 'biriyani');

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
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `order_rewies`
--
ALTER TABLE `order_rewies`
  ADD PRIMARY KEY (`student_id`,`order_id`);

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
-- Indexes for table `recharge_used`
--
ALTER TABLE `recharge_used`
  ADD PRIMARY KEY (`order_id`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
