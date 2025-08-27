-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 07:50 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mile`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `phone`, `password`) VALUES
(1, 'hirwabrunozidane250@gmail.com', '0783257176', 'hhh');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `quantity` varchar(123) NOT NULL,
  `tot` int(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `current_amount` varchar(255) NOT NULL,
  `new_price` varchar(255) NOT NULL,
  `percentage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` varchar(123) NOT NULL,
  `product_id` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `size` varchar(255) NOT NULL,
  `color` varchar(250) NOT NULL,
  `photo_1` varchar(250) NOT NULL,
  `photo_2` varchar(255) NOT NULL,
  `photo_3` varchar(255) NOT NULL,
  `photo_4` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `price` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `photo`, `name`, `description`, `size`, `color`, `photo_1`, `photo_2`, `photo_3`, `photo_4`, `category`, `price`) VALUES
(2, 'uploads/pic3.JPG', 'Range Rover Spot', 'The Land Rover Range Rover Sport, generally known as the Range Rover Sport, is a mid-size luxury SUV produced under their Land Rover marque, from the British manufacturer Land Rover, and later Jaguar Land Rover', '5 Persons', 'Red,white', 'uploads/pic.JPG', 'uploads/pic4.JPG', 'uploads/pic1.JPG', 'uploads/pic2.JPG', 'Cars', '97000000'),
(3, 'uploads/pic40.JPG', 'Men Suit', ' set of clothes comprising a suit jacket and trousers of identical textiles generally worn with a collared dress shirt, necktie, and dress shoes', 'MM6', 'White,black', 'uploads/pic40.JPG', 'uploads/pic40.JPG', 'uploads/pic40.JPG', 'uploads/pic40.JPG', 'Men Clothes', '67000'),
(4, 'uploads/pexels-alexandr-borecky-128389-393047.jpg', 'Smart Watch', 'The best water proof water and good life battery with Sim', 'LL7', 'White', 'uploads/pexels-alexandr-borecky-128389-393047.jpg', 'uploads/pexels-alexandr-borecky-128389-393047.jpg', 'uploads/pexels-alexandr-borecky-128389-393047.jpg', 'uploads/pexels-alexandr-borecky-128389-393047.jpg', 'Men Accesories', '35000'),
(5, 'uploads/pexels-ferarcosn-190819.jpg', 'Lorex Watch', 'The best water proof water and good life battery with Sim', 'MM6', 'Diamond', 'uploads/pexels-ferarcosn-190819.jpg', 'uploads/pexels-ferarcosn-190819.jpg', 'uploads/pexels-ferarcosn-190819.jpg', 'uploads/pexels-ferarcosn-190819.jpg', 'Men Accesories', '45000'),
(6, 'uploads/pexels-jessbaileydesign-788946.jpg', 'I Phone X', 'The Best and qality phone with Ram 8GB,storage 258GB and Camera 13MP', '6Inces', 'White', 'uploads/pexels-jessbaileydesign-788946.jpg', 'uploads/pexels-jessbaileydesign-788946.jpg', 'uploads/pexels-jessbaileydesign-788946.jpg', 'uploads/pexels-jessbaileydesign-788946.jpg', 'Electronics', '540000'),
(7, 'uploads/pexels-pixabay-40185.jpg', 'Mac Book Air', 'The best laptops with good specifications and low prices', '7 Inces', 'White', 'uploads/pexels-pixabay-40185.jpg', 'uploads/pexels-pixabay-40185.jpg', 'uploads/pexels-pixabay-40185.jpg', 'uploads/pexels-pixabay-40185.jpg', 'Electronics', '15000000'),
(8, 'uploads/pexels-karolina-grabowska-8546651.jpg', 'Office Chairs', 'office chairs often have adjustable seats, armrests, backs, back supports, and heights to prevent repetitive stress injury and back pain associated with sitting for long periods', '1 Person', 'Black', 'uploads/pexels-karolina-grabowska-8546651.jpg', 'uploads/pexels-karolina-grabowska-8546651.jpg', 'uploads/pexels-karolina-grabowska-8546651.jpg', 'uploads/pexels-karolina-grabowska-8546651.jpg', 'Office Supplies', '67000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `phone`, `email`, `password`) VALUES
(1, 'Hirwa Bruno ', 'Zidane ', '0793042909', 'hirwabrunozidane250@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `duration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
