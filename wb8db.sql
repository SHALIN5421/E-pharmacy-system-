-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2026 at 04:06 PM
-- Server version: 5.5.16
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wb8db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand_tb`
--

CREATE TABLE `brand_tb` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand_tb`
--

INSERT INTO `brand_tb` (`brand_id`, `brand_name`) VALUES
(19, 'Paracetin'),
(20, 'Amoxirin'),
(21, 'VitaPlus'),
(22, 'CalciSure'),
(23, 'Ironix'),
(24, 'GulcoFree'),
(25, 'Cardiwell'),
(26, 'Neurofort'),
(27, 'ZinCure'),
(28, 'Iburox'),
(29, 'Sidhhalepa');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(2, '::1', 1),
(4, '::1', 1),
(7, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cat_tb`
--

CREATE TABLE `cat_tb` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat_tb`
--

INSERT INTO `cat_tb` (`cat_id`, `cat_name`) VALUES
(2, 'Pain Relief & Fever'),
(3, 'Cold & Cough'),
(4, 'Digestive Health'),
(5, 'Vitamins & Supplements'),
(6, 'Diadetes Care'),
(7, 'Heart & Blood Pressure');

-- --------------------------------------------------------

--
-- Table structure for table `product_tb`
--

CREATE TABLE `product_tb` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_detail` varchar(200) NOT NULL,
  `product_keyword` varchar(200) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_tb`
--

INSERT INTO `product_tb` (`product_id`, `product_name`, `product_detail`, `product_keyword`, `cat_id`, `brand_id`, `product_image1`, `product_image2`, `product_price`, `date`) VALUES
(1, 'Panadol', 'Panadol 500g, 16 tablets', 'Panedol, Paracetamol, parecitamol', 2, 19, 'panadol.jpeg', 'panas.jpeg', '100', '2025-12-08 05:54:57'),
(2, 'vicks', 'a topical ointment with menthol, camphor', 'vicks, balm', 2, 29, 'images.jpeg', 'vicks2.jpeg', '150', '2026-01-02 06:00:31'),
(3, 'Perecetemol', ' Medicine for treating mild to moderate pain and reducing fever.', 'parecitemol,panedol', 3, 20, 'paracetomal.jpg', 'paracetomal2.jpg', '80', '2026-01-10 05:38:35'),
(4, 'Vitamin C', 'a vital water-soluble nutrient, acting as a powerful antioxidant to protect cells', 'Vitamin, Vita C', 5, 21, 'vita c.jpg', 'vitac2.jpeg', '125', '2026-01-10 05:41:20'),
(5, 'Vitamin E', 'a fat-soluble antioxidant essential for cell protection from free radicals, immune support, and blood vessel health', 'Vita E,Vitemin', 5, 23, 'vit e.jpg', 'vita e 2.jpeg', '110', '2026-01-10 05:43:09'),
(6, 'Iodex', 'a popular Ayurvedic topical analgesic used for musculoskeletal pain relief', 'iodex,balm', 2, 27, 'iodex.jpg', 'download.jpeg', '200', '2026-01-10 05:49:46'),
(7, 'Bloos Gulcose moniter', 'device to monitor the gulcose level in our blood', 'diabetes, monitor', 6, 24, 'Blood-Glucose-Monitoring-System.jpg', 'NovaPen4.jpg', '550', '2026-01-10 05:52:08'),
(8, 'Blood Pressure monitor', 'machine to check our blood pressure level', 'bpm,monitor', 7, 25, 'bpm.jpg', 'Dp-Haler-Device_Carelink.jpg', '650', '2026-01-10 05:53:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand_tb`
--
ALTER TABLE `brand_tb`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cat_tb`
--
ALTER TABLE `cat_tb`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `product_tb`
--
ALTER TABLE `product_tb`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand_tb`
--
ALTER TABLE `brand_tb`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `cat_tb`
--
ALTER TABLE `cat_tb`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_tb`
--
ALTER TABLE `product_tb`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
