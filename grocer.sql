-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2020 at 07:52 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocer`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address_master`
--

CREATE TABLE `tbl_address_master` (
  `id` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `aname` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pin_code` varchar(10) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `con` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_address_master`
--

INSERT INTO `tbl_address_master` (`id`, `cid`, `aname`, `address`, `pin_code`, `city`, `state`, `mobile`, `con`, `status`) VALUES
(1, 158, '', '349 A/2 BHOLA NATH NAGAR STREET NO 13, SHAHDARA', '4554', 'tf', 'Gujarat', '0', '2020-05-17 16:58:26', 1),
(2, 158, '', '349 A/2 BHOLA NATH NAGAR STREET NO 13, SHAHDARA', '110032', 'EAST DELHI', 'Delhi', '0', '2020-05-17 16:58:26', 1),
(3, 158, '', 'india', '834001', 'Ranchi', 'Jharkhand', '0', '2020-05-25 17:22:18', 0),
(12, 158, '', 'india', '841301', 'Chapra', 'Bihar', '7004417126', '2020-07-01 12:48:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_master`
--

CREATE TABLE `tbl_admin_master` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `cby` varchar(50) DEFAULT NULL,
  `con` datetime DEFAULT CURRENT_TIMESTAMP,
  `uby` varchar(50) DEFAULT NULL,
  `uon` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_master`
--

INSERT INTO `tbl_admin_master` (`id`, `name`, `password`, `mobile`, `email`, `image`, `cby`, `con`, `uby`, `uon`, `status`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', '7485966958', 'test@gmail.com', '5ec19169102c7.jpg', 'self', '2020-01-31 01:12:33', '1', '2020-05-18 01:04:38', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner_master`
--

CREATE TABLE `tbl_banner_master` (
  `id` int(11) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `cby` varchar(20) DEFAULT NULL,
  `con` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uby` varchar(20) DEFAULT NULL,
  `uon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner_master`
--

INSERT INTO `tbl_banner_master` (`id`, `keyword`, `image`, `type`, `cby`, `con`, `uby`, `uon`, `status`) VALUES
(6, 'led', 'app-assets\\images\\banner/5e72511880fba.jpg', 0, '1', '2020-03-18 22:19:28', NULL, '2020-05-26 17:15:49', 1),
(10, '', 'app-assets/images/banner/5eda891313b08.jpg', 1, '1', '2020-06-05 23:34:03', NULL, '2020-06-05 18:04:03', 1),
(11, '', 'app-assets/images/banner/5eda892e5c7c0.jpg', 2, '1', '2020-06-05 23:34:30', NULL, '2020-06-05 18:04:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_master`
--

CREATE TABLE `tbl_category_master` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `tax_value_percent` varchar(20) DEFAULT NULL,
  `cby` varchar(50) DEFAULT NULL,
  `con` datetime DEFAULT CURRENT_TIMESTAMP,
  `uby` varchar(50) DEFAULT NULL,
  `uon` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category_master`
--

INSERT INTO `tbl_category_master` (`id`, `name`, `tax_value_percent`, `cby`, `con`, `uby`, `uon`, `status`) VALUES
(1, 'Grocery', '7', 'admin_1', '2020-01-31 01:13:44', '1', '2020-05-19 02:08:17', '1'),
(2, 'Food', '7', 'admin_1', '2020-01-31 01:13:44', '1', '2020-05-19 02:08:25', '1'),
(3, 'Cosmatic', '18', 'admin_1', '2020-01-31 01:15:00', '1', '2020-02-25 06:31:11', '1'),
(4, 'Clothes', '18', 'admin_1', '2020-01-31 01:15:00', '1', '2020-02-25 06:30:56', '1'),
(5, 'Gazette', '18', 'admin_1', '2020-01-31 01:16:47', NULL, NULL, '1'),
(6, 'Electronics', '18', 'admin_1', '2020-01-31 01:16:47', '1', '2020-05-30 03:14:35', '1'),
(7, 'demo cat', '0', '1', '2020-05-19 02:02:16', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_child_order_master`
--

CREATE TABLE `tbl_child_order_master` (
  `id` int(20) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `proid` int(11) NOT NULL,
  `items` int(11) NOT NULL,
  `uamount` decimal(20,0) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `cby` varchar(100) NOT NULL,
  `con` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uby` varchar(100) DEFAULT NULL,
  `uon` datetime DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_child_order_master`
--

INSERT INTO `tbl_child_order_master` (`id`, `pid`, `proid`, `items`, `uamount`, `amount`, `cby`, `con`, `uby`, `uon`, `status`) VALUES
(22, '5ecc2c32b72023758', 6, 5, '407', '2033', '158', '2020-05-26 02:06:02', NULL, NULL, '1'),
(23, '5ecc2c32b72023758', 2, 4, '118', '472', '158', '2020-05-26 02:06:02', NULL, NULL, '1'),
(24, '5ecc2c32b72023758', 1, 4, '1770', '7080', '158', '2020-05-26 02:06:02', NULL, NULL, '1'),
(25, '5ecc2de840cef6873', 6, 5, '407', '2033', '158', '2020-05-26 02:13:20', NULL, NULL, '1'),
(26, '5ecc2de840cef6873', 2, 4, '118', '472', '158', '2020-05-26 02:13:20', NULL, NULL, '1'),
(27, '5ecc2de840cef6873', 1, 4, '1770', '7080', '158', '2020-05-26 02:13:20', NULL, NULL, '1'),
(28, '5ed0695a4240b6757', 6, 1, '407', '407', '158', '2020-05-29 07:16:02', NULL, NULL, '1'),
(29, '5ed1860fc37e14913', 6, 5, '407', '2033', '158', '2020-05-30 03:30:47', NULL, NULL, '1'),
(30, '5eda5788041636200', 2, 2, '118', '236', '158', '2020-06-05 20:02:40', NULL, NULL, '1'),
(31, '5edfbe1f2f2a57977', 6, 1, '407', '407', '158', '2020-06-09 22:21:43', NULL, NULL, '1'),
(32, '5edfbe1f2f2a57977', 2, 1, '118', '118', '158', '2020-06-09 22:21:43', NULL, NULL, '1'),
(33, '5edfbe1f2f2a57977', 1, 1, '1770', '1770', '158', '2020-06-09 22:21:43', NULL, NULL, '1'),
(34, '5ef74e9fd72c00840', 6, 3, '407', '1220', '158', '2020-06-27 19:20:23', NULL, NULL, '1'),
(35, '5ef74e9fd72c00840', 2, 3, '118', '354', '158', '2020-06-27 19:20:23', NULL, NULL, '1'),
(36, '5ef7685ddf0da3151', 6, 3, '407', '1220', '158', '2020-06-27 21:10:13', NULL, NULL, '1'),
(37, '5efc1362767557016', 12, 1, '46', '46', '158', '2020-07-01 10:08:58', NULL, NULL, '1'),
(38, '5efc1362767557016', 11, 1, '46', '46', '158', '2020-07-01 10:08:58', NULL, NULL, '1'),
(39, '5efc1362767557016', 6, 1, '407', '407', '158', '2020-07-01 10:08:58', NULL, NULL, '1'),
(40, '5f17eb99c00bd3377', 2, 1, '118', '118', '158', '2020-07-22 13:02:41', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_master`
--

CREATE TABLE `tbl_customer_master` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `cby` varchar(30) DEFAULT NULL,
  `con` datetime DEFAULT CURRENT_TIMESTAMP,
  `uby` varchar(30) DEFAULT NULL,
  `uon` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(30) DEFAULT '1',
  `cookie` varchar(200) DEFAULT NULL,
  `cookie_pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer_master`
--

INSERT INTO `tbl_customer_master` (`id`, `first_name`, `last_name`, `mobile`, `email`, `password`, `dob`, `image`, `cby`, `con`, `uby`, `uon`, `status`, `cookie`, `cookie_pass`) VALUES
(162, NULL, NULL, NULL, 'sk825252@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, '2020-09-27 22:31:02', NULL, '2020-09-27 17:01:07', '1', '5a523fcf790690d63923c1d4b38dbc99', 'c19b6f0660453c4c1a22c281a84df5a5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_flat_off_master`
--

CREATE TABLE `tbl_flat_off_master` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `uon` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `uby` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_flat_off_master`
--

INSERT INTO `tbl_flat_off_master` (`id`, `value`, `uon`, `uby`, `status`) VALUES
(1, 5, '2020-06-09 16:38:54', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image_order_master`
--

CREATE TABLE `tbl_image_order_master` (
  `id` int(11) NOT NULL,
  `addressid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `attachment` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `con` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_image_order_master`
--

INSERT INTO `tbl_image_order_master` (`id`, `addressid`, `cid`, `attachment`, `status`, `con`) VALUES
(4, 1, 158, 'app-assets/images/image_order/5ec6ee4593aa4.jpg', 3, '2020-05-21 21:10:29'),
(6, 3, 161, 'app-assets/images/image_order/5ecaa6f6a4ecd.jpg', 0, '2020-05-24 16:55:18'),
(7, 2, 161, 'app-assets/images/image_order/5ecaa7a648394.jpg', 0, '2020-05-24 16:58:14'),
(8, 2, 158, 'app-assets/images/image_order/5ed1897331895.jpg', 0, '2020-05-29 22:15:15'),
(9, 2, 158, 'app-assets/images/image_order/5ed189d65561d.jpg', 0, '2020-05-29 22:16:54'),
(10, 2, 158, 'app-assets/images/image_order/5ed189f1df3b9.jpg', 3, '2020-05-29 22:17:21'),
(11, 1, 158, 'app-assets/images/image_order/5f0fe0a953676.jpg', 0, '2020-07-16 05:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message_master`
--

CREATE TABLE `tbl_message_master` (
  `id` int(11) NOT NULL,
  `head` varchar(50) NOT NULL,
  `body` varchar(300) NOT NULL,
  `designation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message_master`
--

INSERT INTO `tbl_message_master` (`id`, `head`, `body`, `designation`) VALUES
(2, 'header text', 'body text', 'designation'),
(3, 'fdgfc', 'sxgdf', 'sexfd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message_order_master`
--

CREATE TABLE `tbl_message_order_master` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `addressid` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` int(11) DEFAULT '0',
  `con` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message_order_master`
--

INSERT INTO `tbl_message_order_master` (`id`, `cid`, `addressid`, `message`, `status`, `con`) VALUES
(1, 158, 1, 'message part of the order', 3, '2020-05-22 01:34:50'),
(2, 160, 3, 'erwrgfh', 1, '2020-05-24 17:23:30'),
(3, 158, 2, 'ASFDGJFHGJ', 1, '2020-05-30 01:48:50'),
(4, 158, 3, 'cesrdhertdf', 3, '2020-06-29 06:00:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification_master`
--

CREATE TABLE `tbl_notification_master` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `message` varchar(7000) NOT NULL,
  `con` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification_master`
--

INSERT INTO `tbl_notification_master` (`id`, `cid`, `title`, `message`, `con`) VALUES
(1, 158, 'Order Placed!!', 'Your Order Number 5f17eb99c00bd3377 is has Been Placed.', '2020-07-22 07:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer_master`
--

CREATE TABLE `tbl_offer_master` (
  `id` int(11) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `off_text` varchar(100) NOT NULL,
  `type` int(11) NOT NULL,
  `cby` varchar(20) DEFAULT NULL,
  `con` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uby` varchar(20) DEFAULT NULL,
  `uon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_offer_master`
--

INSERT INTO `tbl_offer_master` (`id`, `keyword`, `image`, `title`, `description`, `off_text`, `type`, `cby`, `con`, `uby`, `uon`, `status`) VALUES
(1, '', 'app-assets/images/offer/5eda87881b8b1.jpg', 'on rice products', 'get upto 10% off on rice products', 'upto 10% OFF', 2, '1', '2020-06-05 23:27:28', NULL, '2020-06-05 20:30:06', 1),
(2, '', 'app-assets/images/offer/5eda89ac3f741.jpg', 'LED Light', 'Get Led Light At 100 Rs.', '100Rs', 3, '1', '2020-06-05 23:36:36', NULL, '2020-06-05 20:30:10', 1),
(3, '', 'app-assets/images/offer/5eda89d42b5be.jpg', '10% off on rice products', 'get upto 10% off on rice products', 'upto 10% OFF', 6, '1', '2020-06-05 23:37:16', NULL, '2020-06-05 20:30:13', 1),
(5, 'rice', 'app-assets/images/offer/5eda8b2d829f4.jfif', 'on rice products', 'get upto 10% off on rice products', 'upto 10% OFF', 0, '1', '2020-06-05 23:43:01', NULL, '2020-06-05 18:13:01', 1),
(6, '', 'app-assets/images/offer/5edab5a8957e9.jfif', 'title of offer', 'description of offer\r\n', 'offer text', 7, '1', '2020-06-06 02:44:16', NULL, '2020-06-05 21:14:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parent_order_master`
--

CREATE TABLE `tbl_parent_order_master` (
  `id` varchar(50) NOT NULL,
  `cid` int(11) NOT NULL,
  `addressid` int(11) NOT NULL,
  `items` int(11) NOT NULL,
  `amount` decimal(20,0) NOT NULL,
  `exp_d_date` date DEFAULT NULL,
  `d_date` timestamp NULL DEFAULT NULL,
  `flat_off` int(11) NOT NULL DEFAULT '0',
  `cby` varchar(100) NOT NULL,
  `con` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uby` varchar(100) DEFAULT NULL,
  `uon` datetime DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_parent_order_master`
--

INSERT INTO `tbl_parent_order_master` (`id`, `cid`, `addressid`, `items`, `amount`, `exp_d_date`, `d_date`, `flat_off`, `cby`, `con`, `uby`, `uon`, `status`) VALUES
('5ecc2c32b72023758', 158, 2, 13, '9585', '2020-06-24', NULL, 0, '158', '2020-05-26 02:06:02', '1', NULL, '1'),
('5ed0695a4240b6757', 158, 1, 1, '407', '2020-06-17', NULL, 0, '158', '2020-05-29 07:16:02', '1', NULL, '1'),
('5ed1860fc37e14913', 158, 2, 5, '2033', '2020-06-07', NULL, 0, '158', '2020-05-30 03:30:47', '1', NULL, '1'),
('5eda5788041636200', 158, 2, 2, '236', '2020-06-25', NULL, 0, '158', '2020-06-05 20:02:40', '1', NULL, '1'),
('5edfbe1f2f2a57977', 158, 1, 3, '2180', '2020-07-10', NULL, 5, '158', '2020-06-09 22:21:43', '1', NULL, '1'),
('5ef74e9fd72c00840', 158, 1, 6, '1495', '2020-06-30', NULL, 5, '158', '2020-06-02 19:20:23', '1', NULL, '1'),
('5ef7685ddf0da3151', 158, 2, 3, '1220', NULL, NULL, 0, '158', '2020-06-17 21:10:14', NULL, NULL, '0'),
('5efc1362767557016', 158, 2, 3, '474', NULL, NULL, 5, '158', '2020-07-01 10:08:58', NULL, NULL, '1'),
('5f17eb99c00bd3377', 158, 1, 1, '112', NULL, NULL, 5, '158', '2020-07-22 13:02:41', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_image_master`
--

CREATE TABLE `tbl_product_image_master` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `path` varchar(200) NOT NULL,
  `con` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cby` varchar(50) NOT NULL,
  `uby` varchar(100) DEFAULT NULL,
  `uon` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_image_master`
--

INSERT INTO `tbl_product_image_master` (`id`, `pid`, `path`, `con`, `cby`, `uby`, `uon`, `status`) VALUES
(1, 2, 'app-assets/images/products/5ec2e837ea3c27990.jpg', '2020-05-19 01:25:35', '1', NULL, '2020-05-23 00:48:53', '1'),
(2, 1, 'app-assets/images/products/5ec2e8380e8253438.jpg', '2020-05-19 01:25:36', '1', NULL, '2020-05-23 00:48:57', '1'),
(3, 3, 'app-assets/images/products/5ec2e838248ee5519.jpg', '2020-05-19 01:25:36', '1', NULL, '2020-05-23 00:49:04', '1'),
(4, 6, 'app-assets/images/products/5ec2e838395a12006.jpg', '2020-05-19 01:25:36', '1', NULL, '2020-05-24 01:08:33', '1'),
(5, 7, 'app-assets/images/products/5ed2889312c9d1511.jpg', '2020-05-30 21:53:47', '1', NULL, NULL, '1'),
(6, 7, 'app-assets/images/products/5ed288932464a9398.jpg', '2020-05-30 21:53:47', '1', NULL, NULL, '1'),
(7, 7, 'app-assets/images/products/5ed28893326d91850.jfif', '2020-05-30 21:53:47', '1', NULL, NULL, '1'),
(8, 7, 'app-assets/images/products/5ed288934f0046367.jfif', '2020-05-30 21:53:47', '1', NULL, NULL, '1'),
(9, 7, 'app-assets/images/products/5ed288a8a9ff17679.jpg', '2020-05-30 21:54:08', '1', NULL, NULL, '1'),
(10, 7, 'app-assets/images/products/5ed288a8b7e3f9113.jpg', '2020-05-30 21:54:08', '1', NULL, NULL, '1'),
(11, 7, 'app-assets/images/products/5ed288a8c1a2f4192.jfif', '2020-05-30 21:54:08', '1', NULL, NULL, '1'),
(12, 7, 'app-assets/images/products/5ed288a8da1836088.jfif', '2020-05-30 21:54:08', '1', NULL, NULL, '1'),
(13, 8, 'app-assets/images/products/5ee0eaf38815d3837.jpg', '2020-06-10 19:45:15', '1', NULL, NULL, '1'),
(14, 8, 'app-assets/images/products/5ee0eaf397b6b0134.jpg', '2020-06-10 19:45:15', '1', NULL, NULL, '1'),
(15, 9, 'app-assets/images/products/5ee0ebdc50a4c0763.jfif', '2020-06-10 19:49:08', '1', NULL, NULL, '1'),
(16, 10, 'app-assets/images/products/5ee65bc7b87858025.jpg', '2020-06-14 22:47:59', '1', NULL, NULL, '1'),
(17, 11, 'app-assets/images/products/5ee65fa5dd8567631.jfif', '2020-06-14 23:04:29', '1', NULL, NULL, '1'),
(18, 12, 'app-assets/images/products/5ee66015ae3a92691.jfif', '2020-06-14 23:06:21', '1', NULL, NULL, '1'),
(19, 13, 'app-assets/images/products/5ef743bea7a967336.jpeg', '2020-06-27 18:33:58', '1', NULL, NULL, '1'),
(20, 14, 'app-assets/images/products/5f460bf02712a7213.jpg', '2020-08-26 12:44:56', '1', NULL, NULL, '1'),
(21, 14, 'app-assets/images/products/5f460bf04f69c7113.jfif', '2020-08-26 12:44:56', '1', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_master`
--

CREATE TABLE `tbl_product_master` (
  `id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `mrp` decimal(20,2) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `selling_price` decimal(20,2) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `key_features` varchar(500) DEFAULT NULL,
  `quantitty` varchar(30) DEFAULT NULL,
  `shelf_life` varchar(50) DEFAULT NULL,
  `mfg_details` varchar(500) DEFAULT NULL,
  `seller` varchar(500) DEFAULT NULL,
  `disclaimer` varchar(500) DEFAULT NULL,
  `cby` varchar(50) DEFAULT NULL,
  `con` datetime DEFAULT CURRENT_TIMESTAMP,
  `uby` varchar(50) DEFAULT NULL,
  `uon` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_master`
--

INSERT INTO `tbl_product_master` (`id`, `sub_category_id`, `name`, `description`, `mrp`, `stock`, `selling_price`, `unit`, `key_features`, `quantitty`, `shelf_life`, `mfg_details`, `seller`, `disclaimer`, `cby`, `con`, `uby`, `uon`, `status`) VALUES
(1, 3, 'desi powder', 'desi powder', '2000.00', 0, '1500.00', 1, 'key features', '90g Packet', '12 Months', 'mfg details', 'seller details', 'disclaimer', '1', '2020-02-17 21:47:45', '1', '2020-08-03 20:05:53', '0'),
(2, 6, 'LED Light', 'description of LED light', '200.00', 100, '100.00', 4, 'high emmision light', '1 Pic', '1 Years-5 Years', 'made in india', 'seller details ', 'disclaimer', '1', '2020-02-17 21:49:30', '1', '2020-06-27 20:18:44', '1'),
(6, 2, 'rice', 'dsfdgnhm', '435.87', 101, '380.00', 1, 'kay features', 'Packet of 1 Kg', 'shelf life', 'mfg details', 'seller details', 'disclaimer', '1', '2020-05-19 01:25:36', '1', '2020-08-03 20:05:07', '0'),
(7, 9, 'tomato sauce', 'tomato sauce\r\nkissan brand\r\nbest quality', '120.00', 0, '100.00', 3, 'key features\r\nrow 1\r\nrow 2', '100 mg', '12 Month', 'manufectured on this\r\nrow 1\r\nrow 2', 'seller details\r\nrow1\r\nrow2', 'disclaimer one\r\ndisclaimer two\r\ndisclaimer three', '1', '2020-05-30 21:54:09', '1', '2020-08-03 20:04:32', '0'),
(8, 7, 'product ', 'product', '300.00', 0, '200.00', 1, 'key features', NULL, 'shelf life', 'mfg details', 'seller details', 'disclaimer', '1', '2020-06-10 19:45:15', NULL, NULL, '1'),
(9, 0, 'name', 'des wrg of ad', '436.00', 0, '43.00', 0, 'key features', NULL, 'shelf life', 'mfg details', 'seler details', 'disclaimer', '1', '2020-06-10 19:49:08', '1', '2020-08-03 20:05:40', '0'),
(10, 3, 'adf', 'asf', '325.00', 0, '23.00', 4, 'e ws', NULL, 'waec', 'rt', 'wex', 'xat', '1', '2020-06-14 22:47:59', NULL, NULL, '1'),
(11, 2, 'dfg', 'sdvg', '34.00', 0, '43.00', 2, 'erxtcf', NULL, 'xegrfc', 'xerg', 'dfcgf', 'zawrxtfd', '1', '2020-06-14 23:04:30', '1', '2020-06-30 11:40:45', '1'),
(12, 2, 'dfg', 'sdvg', '34.00', 0, '43.00', 2, 'erxtcf', 'xgtbdc', 'xegrfc', 'xerg', 'dfcgf', 'zawrxtfd', '1', '2020-06-14 23:06:21', NULL, NULL, '1'),
(13, 3, 'sadfgnh', 'cacg sfdc', '435.00', 0, '32455.00', 3, 'sdgxc', 'sdfd', '', '', 'gfcfgc', 'extfd', '1', '2020-06-27 18:33:58', NULL, NULL, '1'),
(14, 2, 'demo product', 'demo,rekha,gupta', '700.00', 10, '600.00', 2, 'demo key feature', '200 gm', '12 months', 'jab bana h', 'demo company', 'disclaimer', '1', '2020-08-26 12:44:56', '1', '2020-08-26 12:47:21', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_unit_master`
--

CREATE TABLE `tbl_product_unit_master` (
  `id` int(11) NOT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `cby` varchar(50) DEFAULT NULL,
  `con` datetime DEFAULT CURRENT_TIMESTAMP,
  `uby` varchar(50) DEFAULT NULL,
  `uon` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_unit_master`
--

INSERT INTO `tbl_product_unit_master` (`id`, `unit`, `cby`, `con`, `uby`, `uon`, `status`) VALUES
(1, 'KG', 'admin_1', '2020-01-31 01:09:55', '1', '2020-05-19 03:03:32', '1'),
(2, 'L', 'admin_1', '2020-01-31 01:09:55', NULL, NULL, '1'),
(3, 'PKT', 'admin_1', '2020-01-31 01:10:42', '1', '2020-05-19 03:03:20', '1'),
(4, 'P', 'admin_1', '2020-01-31 01:10:42', '1', '2020-03-15 22:08:54', '1'),
(5, 'ml', '1', '2020-05-19 02:58:06', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recent_view_master`
--

CREATE TABLE `tbl_recent_view_master` (
  `id` int(20) NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `con` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_recent_view_master`
--

INSERT INTO `tbl_recent_view_master` (`id`, `cid`, `pid`, `con`) VALUES
(21, 158, 11, '2020-07-02 10:17:32'),
(30, 158, 13, '2020-07-04 13:11:19'),
(31, 158, 10, '2020-07-04 13:11:23'),
(32, 158, 1, '2020-07-04 13:11:27'),
(52, 158, 8, '2020-07-17 10:43:52'),
(53, 158, 12, '2020-07-21 04:34:49'),
(54, 158, 6, '2020-07-21 04:35:05'),
(55, 158, 2, '2020-07-21 04:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_category_master`
--

CREATE TABLE `tbl_sub_category_master` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `cby` varchar(100) NOT NULL,
  `con` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uby` varchar(100) DEFAULT NULL,
  `uon` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_category_master`
--

INSERT INTO `tbl_sub_category_master` (`id`, `name`, `category_id`, `cby`, `con`, `uby`, `uon`, `status`) VALUES
(1, 'Rice', 1, '1', '2020-03-07 15:15:52', '1', '2020-05-19 02:41:38', '1'),
(2, 'Oil', 2, '1', '2020-03-11 20:02:43', NULL, NULL, '1'),
(3, 'Powder', 3, '1', '2020-03-11 20:03:05', NULL, NULL, '1'),
(4, 'T-shirts', 4, '1', '2020-03-11 20:03:31', NULL, NULL, '1'),
(5, 'Mobile', 5, '1', '2020-03-11 20:03:43', NULL, NULL, '1'),
(6, 'Bulb', 6, '1', '2020-03-11 20:03:58', NULL, NULL, '1'),
(7, 'supliments', 1, '1', '2020-03-11 21:46:18', NULL, NULL, '1'),
(8, 'demo sub cat name', 7, '1', '2020-05-19 02:30:04', NULL, NULL, '1'),
(9, 'sauce', 2, '1', '2020-05-30 21:50:16', '1', '2020-06-10 20:46:01', '1'),
(10, 'shirts', 4, '1', '2020-06-10 20:42:53', '1', '2020-06-10 20:45:45', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tax_master`
--

CREATE TABLE `tbl_tax_master` (
  `id` int(11) NOT NULL,
  `tax` varchar(100) DEFAULT NULL,
  `tax_value_percent` varchar(20) DEFAULT NULL,
  `cby` varchar(50) DEFAULT NULL,
  `con` datetime DEFAULT CURRENT_TIMESTAMP,
  `uby` varchar(50) DEFAULT NULL,
  `uon` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tax_master`
--

INSERT INTO `tbl_tax_master` (`id`, `tax`, `tax_value_percent`, `cby`, `con`, `uby`, `uon`, `status`) VALUES
(1, 'GST@0%', '0', 'admin_1', '2020-01-31 01:07:25', '1', '2020-03-23 17:18:15', '1'),
(2, 'GST@5%', '5', 'admin_1', '2020-01-31 01:08:52', '1', '2020-05-19 03:20:40', '1'),
(3, 'GST@7%', '7', 'admin_1', '2020-01-31 01:08:52', NULL, NULL, '1'),
(4, 'GST@12%', '12', 'admin_1', '2020-01-31 01:08:52', NULL, NULL, '1'),
(5, 'GST@18%', '18', 'admin_1', '2020-01-31 01:08:52', NULL, NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_address_master`
--
ALTER TABLE `tbl_address_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin_master`
--
ALTER TABLE `tbl_admin_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `tbl_banner_master`
--
ALTER TABLE `tbl_banner_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category_master`
--
ALTER TABLE `tbl_category_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_child_order_master`
--
ALTER TABLE `tbl_child_order_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer_master`
--
ALTER TABLE `tbl_customer_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `tbl_flat_off_master`
--
ALTER TABLE `tbl_flat_off_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_image_order_master`
--
ALTER TABLE `tbl_image_order_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_message_master`
--
ALTER TABLE `tbl_message_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_message_order_master`
--
ALTER TABLE `tbl_message_order_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notification_master`
--
ALTER TABLE `tbl_notification_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_offer_master`
--
ALTER TABLE `tbl_offer_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_parent_order_master`
--
ALTER TABLE `tbl_parent_order_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_image_master`
--
ALTER TABLE `tbl_product_image_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_master`
--
ALTER TABLE `tbl_product_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_unit_master`
--
ALTER TABLE `tbl_product_unit_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_recent_view_master`
--
ALTER TABLE `tbl_recent_view_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sub_category_master`
--
ALTER TABLE `tbl_sub_category_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tax_master`
--
ALTER TABLE `tbl_tax_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_address_master`
--
ALTER TABLE `tbl_address_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_admin_master`
--
ALTER TABLE `tbl_admin_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_banner_master`
--
ALTER TABLE `tbl_banner_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_category_master`
--
ALTER TABLE `tbl_category_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_child_order_master`
--
ALTER TABLE `tbl_child_order_master`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_customer_master`
--
ALTER TABLE `tbl_customer_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `tbl_flat_off_master`
--
ALTER TABLE `tbl_flat_off_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_image_order_master`
--
ALTER TABLE `tbl_image_order_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_message_master`
--
ALTER TABLE `tbl_message_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_message_order_master`
--
ALTER TABLE `tbl_message_order_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_notification_master`
--
ALTER TABLE `tbl_notification_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_offer_master`
--
ALTER TABLE `tbl_offer_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product_image_master`
--
ALTER TABLE `tbl_product_image_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_product_master`
--
ALTER TABLE `tbl_product_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_product_unit_master`
--
ALTER TABLE `tbl_product_unit_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_recent_view_master`
--
ALTER TABLE `tbl_recent_view_master`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_sub_category_master`
--
ALTER TABLE `tbl_sub_category_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_tax_master`
--
ALTER TABLE `tbl_tax_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
