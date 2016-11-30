-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2016 at 11:02 AM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(100) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `page_keyword` varchar(100) NOT NULL,
  `page_description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `image`, `page_title`, `page_keyword`, `page_description`) VALUES
(26, 'mobile phones', 'This category is related to mobile phones.', '55.png', 'Mobile Phones', 'mobile, smartphone, nokia, iphone,samsung', 'Mobile phones in cheap rate than any other shop'),
(27, 'camera', 'This category is related to camera.', '5.jpg', 'Camerasc', 'camera, dslr, nikon,sony', 'cameras'),
(28, 'Television', 'This category is related to television', 'tv1.png', 'Television', 'tv, television', 'television'),
(29, 'Laptop ', 'This category is related to laptop', 'laptop1.png', 'Laptop', 'laptop, desktop, computer', 'computer'),
(30, 'Speaker System', 'This category is related to speaker system', 'v.jpg', 'Speaker System', 'speaker system, sound', 'speaker system');

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `product_id` int(5) NOT NULL,
  `qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`id`, `username`, `session_id`, `product_id`, `qty`) VALUES
(11, 'sita', 'l2b3kiqr3gtq8aun6qmfoo1ag7', 23, 3),
(13, 'sita', 'l2b3kiqr3gtq8aun6qmfoo1ag7', 24, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(20) NOT NULL,
  `category_id` int(20) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `is_sale` tinyint(1) DEFAULT NULL,
  `prod_image` varchar(100) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `price`, `stock`, `is_sale`, `prod_image`, `discount`) VALUES
(17, 27, 'Canon ', 'this is awesome camera', 50000, 23, NULL, 'camera1.png', 2000),
(18, 27, 'Nikon', 'Color : Black, Weight:800 gm', 45120, 12, NULL, 'camera2.png', 1235),
(19, 27, 'Samsung', 'this is awesome camera, weight:800gm, color:blue', 45455, 45, NULL, 'camera3.png', 1200),
(20, 27, 'Song Cybershot', '16.1 MegaPixel, Clor:Blue, Weight:970 gm', 60000, 45, NULL, 'camera4.png', 1236),
(21, 29, 'Samsung laptop', 'this is awesome laptop, screen:14 ", weight:900gm', 75000, 45, NULL, 'laptop1.png', 4500),
(22, 29, 'Lenovo', 'This is awesome laptop, weight:800gm, color:black, screen:15.5 "', 65800, 18, NULL, 'laptop2.png', 1230),
(23, 29, 'Sony Vaio', 'This is awesome laptop.', 58900, 45, NULL, 'laptop3.png', 450),
(24, 28, 'Onida ', 'This is awesome tv', 45000, 10, NULL, 'tv5.png', 1200),
(25, 28, 'Philips', 'this is 44 inch television', 45000, 12, NULL, 'tv5.png', 1200),
(26, 28, 'LG TV', 'this is another LG TV', 120000, 12, NULL, 'tv6.png', 6655),
(27, 28, 'SONY TV', 'this is 34 " television.', 45200, 12, NULL, 'tv7.png', 120),
(28, 28, 'Samsung Television', 'this is 68 " tv ', 546697, 14, NULL, 'tv8.png', 1236),
(29, 30, 'Sony Music System', 'this is awesome speaker system', 78001, 12, NULL, 'music1.png', 1235),
(30, 30, 'LG Music System', 'this is lg speaker system.', 120045, 125, NULL, 'music2.png', 1203),
(31, 30, 'Panasonic', 'This is awesome speaker system with Iphone.', 45000, 12, NULL, 'music3.png', 212),
(32, 26, 'Iphone 6', 'This is awesome phone', 60000, 10, NULL, 'phone.jpg', 125),
(33, 26, 'Nokia Lumina', 'this is awesome phone', 12088, 12, NULL, '333.png', 133);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','superadmin','user') NOT NULL,
  `status` enum('active','passive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `status`) VALUES
(17, 'mohansingh', 'heisone', 'a7fdfe5f36cedacb92cb277617117b4a', 'admin', 'active'),
(19, 'gopal', 'gopali', 'e123edb488db303fde7b3ad19134361d', 'superadmin', 'active'),
(20, 'mohan', 'sushil', 'ae59c4f9fb45e71f3f25e2e55b006d37', 'admin', 'active'),
(23, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'active'),
(24, 'superadmin', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'superadmin', 'active'),
(25, 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'active'),
(26, 'sita', 'sita', '803205ab3f1b9b6fa6990393f5ac6b58', 'user', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
