-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2014 at 11:06 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eshop`
--
CREATE DATABASE IF NOT EXISTS `eshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `eshop`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `machine_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `machine_name`) VALUES
(1, 'Desktop computers', 'desktop-computers'),
(2, 'Laptops', 'laptops'),
(3, 'Computer monitors', 'computer-monitors');

-- --------------------------------------------------------

--
-- Table structure for table `commerce_orders`
--

CREATE TABLE IF NOT EXISTS `commerce_orders` (
  `uid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `total` float NOT NULL,
  `order` text NOT NULL,
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commerce_orders`
--

INSERT INTO `commerce_orders` (`uid`, `date`, `total`, `order`) VALUES
(2, '2014-09-03 08:38:27', 337.5, '{''order'':[{''product_id'':3,''amount'':1,''price'':337.5}]}');

-- --------------------------------------------------------

--
-- Table structure for table `contact_log`
--

CREATE TABLE IF NOT EXISTS `contact_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact_log`
--

INSERT INTO `contact_log` (`id`, `name`, `email`, `phone`, `message_date`) VALUES
(1, 'Avi Levi', 'avi.example@domain.com', '0526665543', '2014-09-03 11:18:37'),
(2, 'Edna Cohen', 'ednaedna@dom.net.il', '039997745', '2014-09-11 07:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `employeeID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `streetAddress` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`employeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeID`, `firstName`, `lastName`, `streetAddress`, `city`, `status`, `createdAt`, `updatedAt`) VALUES
(347483647, 'Dikla', 'Alon', 'Tabiria 3', 'Uno', 0, '2014-09-10 17:23:39', '2014-09-17 09:13:08'),
(347483847, 'Avi', 'Aviel', 'Kiron 112', 'Ramat Gan', 1, '2014-09-10 17:23:39', '2014-09-17 09:13:08'),
(347483947, 'Vered', 'Levi', 'Gur 18', 'Petach Tikva', 1, '2014-09-08 08:34:08', '2014-09-11 16:22:42'),
(347489967, 'Haim', 'Moshe', 'Yalin 14', 'Petach Tikva', 1, '2014-09-14 07:29:14', '2014-09-12 15:21:39'),
(366945120, 'Haya', 'Bitun', 'Arbel 70', 'Tel Aviv', 1, '2014-09-09 10:34:14', '2014-09-15 15:30:21'),
(398874520, 'Moshe', 'Cohen', 'Haverim 29', 'Ramat Gan', 0, '2014-09-08 16:23:42', '2014-09-09 09:06:26'),
(498876513, 'Israel', 'Israeli', 'Galim 5', 'Tel Aviv', 1, '2014-09-07 10:11:26', '2014-09-10 14:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `field_data_product_image`
--

CREATE TABLE IF NOT EXISTS `field_data_product_image` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `field_data_product_image`
--

INSERT INTO `field_data_product_image` (`product_id`, `name`, `position`) VALUES
(4, 'Asus-ZenBook-UX301LA-DE065H.jpg', 'left'),
(1, 'comp-games-XX6-alfa.png', 'top');

-- --------------------------------------------------------

--
-- Table structure for table `field_data_profile_image`
--

CREATE TABLE IF NOT EXISTS `field_data_profile_image` (
  `uid` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` char(3) NOT NULL,
  KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `field_data_profile_image`
--

INSERT INTO `field_data_profile_image` (`uid`, `image`, `status`) VALUES
(1, 'Koala.jpg', 'MAI');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`role_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`role_id`, `name`) VALUES
(1, 'admin'),
(2, 'authenticated user'),
(3, 'anonymous user');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `employeeID` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  KEY `phones_ibfk_1` (`employeeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`employeeID`, `phone`) VALUES
(366945120, '0524443321'),
(366945120, '0355698743'),
(498876513, '0502202265'),
(347483647, '024113265'),
(347483647, '048876542'),
(398874520, '0578897410'),
(347483947, '036654198'),
(398874520, '0526643178'),
(347489967, '0506694284'),
(347489967, '089804156'),
(366945120, '0583365249');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) NOT NULL,
  `machine_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `price` float NOT NULL,
  `visibility` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie_id` (`categorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categorie_id`, `machine_name`, `title`, `body`, `price`, `visibility`) VALUES
(1, 1, 'comp-games-XX6-alfa', 'Comp games XX6 alfa', 'Comp games XX6 alfa is the best computer ever.', 54.3, 1),
(2, 2, 'Dell-XPS-15', 'Dell XPS 15', 'Dell XPS 15 Intel® Core™ i7-4702HQ Processor 2.2GHz', 26, 0),
(3, 3, 'Dell-IPS-UltraSharp-U3014 ', 'Dell IPS UltraSharp U3014 ', 'Dell IPS UltraSharp U3014 UltraSharp U3014,\r\nLED IPS 2560x1600,1:1,000.', 337.5, 1),
(4, 2, 'Asus-ZenBook-UX301LA-DE065H', 'Asus ZenBook UX301LA-DE065H', 'ZenBook UX301LA-DE065H,Intel® Core™ i7-4500U Processor 1.8GHz.', 420.4, 1),
(5, 1, 'AMD-FX-Series-Eight-Core-8350', 'AMD FX-Series Eight Core 8350', 'AMD FX-Series Eight Core 8350 4.0GHz,\r\non sale this week at eshop!', 75, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `uid` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  KEY `uid` (`uid`),
  KEY `role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`uid`, `role`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `test_table`
--

CREATE TABLE IF NOT EXISTS `test_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@domain.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'Israel', 'israel@example.co.il', 'ba5b0dd51134a9b6d542fc09fb7b4ae4b8e89fc0');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commerce_orders`
--
ALTER TABLE `commerce_orders`
  ADD CONSTRAINT `commerce_orders_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `field_data_product_image`
--
ALTER TABLE `field_data_product_image`
  ADD CONSTRAINT `field_data_product_image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `field_data_profile_image`
--
ALTER TABLE `field_data_profile_image`
  ADD CONSTRAINT `field_data_profile_image_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `phones_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_2` FOREIGN KEY (`role`) REFERENCES `permissions` (`role_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
