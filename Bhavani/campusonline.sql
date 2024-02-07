-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2024 at 06:36 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `product_id` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `additional_info` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('Chatrathi Ravi Kumar Satya Sai Praveen', '21B91A6206', '9052727402', '2025', 'CSD', 'A', 'Trimurthulu', 'Ganga Tulasi', 'Tholeru', 'Room', '', '');

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
-- Indexes for table `coupans_used`
--
ALTER TABLE `coupans_used`
  ADD PRIMARY KEY (`coustmer_id`,`coupan_id`);

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
