-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 09:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `product1_id` varchar(15) DEFAULT NULL,
  `product1_quantity` int(5) DEFAULT NULL,
  `product2_id` varchar(15) DEFAULT NULL,
  `product2_quantity` int(5) DEFAULT NULL,
  `product3_id` varchar(15) DEFAULT NULL,
  `product3_quantity` int(5) DEFAULT NULL,
  `product4_id` varchar(15) DEFAULT NULL,
  `product4_quantity` int(5) DEFAULT NULL,
  `product5_id` varchar(15) DEFAULT NULL,
  `product5_quantity` int(5) DEFAULT NULL
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
  `coupan_starts` datetime DEFAULT NULL,
  `coupans_ends` datetime DEFAULT NULL
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
  `category_id` varchar(15) DEFAULT NULL,
  `product_id` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(15) NOT NULL,
  `coustmer_id` varchar(15) NOT NULL,
  `product1_id` varchar(15) NOT NULL,
  `product1_quantity` int(5) NOT NULL,
  `product2_id` varchar(15) DEFAULT NULL,
  `product2_quantity` int(5) DEFAULT NULL,
  `product3_id` varchar(15) DEFAULT NULL,
  `product3_quantity` int(5) DEFAULT NULL,
  `product4_id` varchar(15) DEFAULT NULL,
  `product4_quantity` int(5) NOT NULL,
  `product5_id` varchar(15) DEFAULT NULL,
  `product5_quantity` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `product_id` varchar(15) NOT NULL,
  `photo_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `sku` varchar(10) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` float NOT NULL,
  `category_id` int(10) NOT NULL,
  `discount_price` float DEFAULT NULL,
  `about_product` varchar(50) DEFAULT NULL,
  `date_create` date NOT NULL DEFAULT current_timestamp(),
  `no_units` int(5) DEFAULT NULL,
  `product_start_time` time DEFAULT NULL,
  `product_end_time` time DEFAULT NULL
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
  `Batch` varchar(10) NOT NULL,
  `Department` varchar(5) NOT NULL,
  `Section` varchar(5) NOT NULL,
  `father_name` varchar(40) DEFAULT NULL,
  `mother_name` varchar(40) DEFAULT NULL,
  `home_town` varchar(40) DEFAULT NULL,
  `Transportation` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `product1_id` varchar(15) NOT NULL,
  `product1_quantity` int(5) DEFAULT NULL,
  `product2_id` varchar(15) DEFAULT NULL,
  `product2_quantity` int(5) DEFAULT NULL,
  `product3_id` varchar(15) DEFAULT NULL,
  `product3_quantity` int(5) DEFAULT NULL,
  `product4_id` varchar(15) DEFAULT NULL,
  `product4_quantity` int(5) DEFAULT NULL,
  `product5_id` varchar(15) DEFAULT NULL,
  `product5_quantity` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`coustmer_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`coustmer_id`,`product_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
