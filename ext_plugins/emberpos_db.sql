-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: 198.38.82.200
-- Generation Time: Apr 21, 2018 at 02:27 PM
-- Server version: 5.5.52
-- PHP Version: 5.4.31

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `emberpos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE IF NOT EXISTS `customer_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `card_split_value` int(11) NOT NULL,
  `cash_split_value` int(11) NOT NULL,
  `amount_tendered` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '2' COMMENT '0-void,1-approved,2-pending',
  `json_data` longtext NOT NULL,
  `table_id` int(11) NOT NULL DEFAULT '0',
  `approved_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `user_id`, `customer_name`, `total_qty`, `total_price`, `date_created`, `payment_type`, `card_split_value`, `cash_split_value`, `amount_tendered`, `status`, `json_data`, `table_id`, `approved_by`) VALUES
(69, 1, 'mr sam', 2, 9200, '2018-04-03 05:08:02', 'cash', 0, 8000, 9500, 1, '[{"id":"4","parent_id":"1","name":"Fun-on-the-Beach","price":"4000","date_created":"2018-03-10 09:04:08","created_by":"1","price_default":"4000","salt_id":1},{"id":"10","parent_id":"1","name":"Iced Tea","price":"4000","date_created":"2018-03-28 01:23:07","created_by":"1","price_default":"4000","salt_id":2}]', 5, 0),
(70, 6, 'black', 4, 16100, '2018-04-03 06:24:12', 'cash', 0, 14000, 16500, 1, '[{"id":"40","parent_id":"35","name":"Chicken/Chips","price":"5000","date_created":"2018-03-28 02:14:54","created_by":"1","price_default":"5000","salt_id":1},{"id":"20","parent_id":"7","name":"Red Wine","price":"8000","date_created":"2018-03-28 02:06:16","created_by":"1","price_default":"8000","salt_id":3},{"id":"27","parent_id":"7","name":"Can/Sodas/Water","price":"500","date_created":"2018-03-28 02:08:46","created_by":"1","price_default":"500","salt_id":4},{"id":"27","parent_id":"7","name":"Can/Sodas/Water","price":"500","date_created":"2018-03-28 02:08:46","created_by":"1","price_default":"500","salt_id":5}]', 6, 0),
(68, 6, 'white ', 3, 15600, '2018-04-03 04:20:38', 'card', 0, 15600, 15600, 1, '[{"id":"10","parent_id":"1","name":"Iced Tea","price":"4000","date_created":"2018-03-28 01:23:07","created_by":"1","price_default":"4000","salt_id":1},{"id":"37","parent_id":"35","name":"Beef Burger","price":"4000","date_created":"2018-03-28 02:13:21","created_by":"1","price_default":"4000","salt_id":2},{"id":"40","parent_id":"35","name":"Chicken/Chips","price":"5000","date_created":"2018-03-28 02:14:54","created_by":"1","price_default":"5000","salt_id":3}]', 6, 1),
(71, 6, 'yellow', 3, 14950, '2018-04-03 06:33:16', 'card', 14950, 0, 0, 1, '[{"id":"4","parent_id":"1","name":"Fun-on-the-Beach","price":"4000","date_created":"2018-03-10 09:04:08","created_by":"1","price_default":"4000","salt_id":1},{"id":"15","parent_id":"1","name":"Baileys Smooth","price":"4000","date_created":"2018-03-28 01:25:17","created_by":"1","price_default":"4000","salt_id":2},{"id":"40","parent_id":"35","name":"Chicken/Chips","price":"5000","date_created":"2018-03-28 02:14:54","created_by":"1","price_default":"5000","salt_id":3}]', 6, 0),
(72, 9, 'blue', 2, 5750, '2018-04-03 06:48:41', 'cash', 0, 5000, 6000, 1, '[{"id":"39","parent_id":"35","name":"Chicken wings/Chips","price":"4000","date_created":"2018-03-28 02:14:15","created_by":"1","price_default":"4000","salt_id":1},{"id":"29","parent_id":"7","name":"Malt ","price":"1000","date_created":"2018-03-28 02:09:18","created_by":"1","price_default":"1000","salt_id":2}]', 6, 1),
(73, 6, 'tunde', 3, 102350, '2018-04-03 07:02:25', 'card', 0, 89000, 0, 1, '[{"id":"37","parent_id":"35","name":"Beef Burger","price":"4000","date_created":"2018-03-28 02:13:21","created_by":"1","price_default":"4000","salt_id":1},{"id":"62","parent_id":"50","name":"Belvedere","price":"45000","date_created":"2018-03-28 02:34:36","created_by":"1","price_default":"45000","salt_id":2},{"id":"68","parent_id":"53","name":"Patron XO Cafe","price":"40000","date_created":"2018-03-28 02:53:27","created_by":"1","price_default":"40000","salt_id":3}]', 42, 1),
(74, 6, 'white', 4, 15000, '2018-04-04 10:07:05', 'cash', 8000, 7000, -11, 1, '[{"id":"37","parent_id":"35","name":"Beef Burger","price":"4000","date_created":"2018-03-28 02:13:21","created_by":"1","price_default":"4000","salt_id":1},{"id":"40","parent_id":"35","name":"Chicken/Chips","price":"5000","date_created":"2018-03-28 02:14:54","created_by":"1","price_default":"5000","salt_id":2},{"id":"36","parent_id":"35","name":"Chicken Burger","price":"3000","date_created":"2018-03-28 02:13:01","created_by":"1","price_default":"3000","salt_id":3},{"id":"27","parent_id":"7","name":"Can/Sodas/Water","price":"500","date_created":"2018-03-28 02:08:46","created_by":"1","price_default":"500","salt_id":4}]', 6, 1),
(75, 6, 'blue', 2, 8400, '2018-04-04 11:34:12', 'cash', 0, 7000, 9000, 1, '[{"id":"69","parent_id":"35","name":"Rice and Beef","price":"3500","date_created":"2018-04-04 11:32:48","created_by":"1","price_default":"3500","salt_id":1},{"id":"69","parent_id":"35","name":"Rice and Beef","price":"3500","date_created":"2018-04-04 11:32:48","created_by":"1","price_default":"3500","salt_id":2}]', 8, 1),
(76, 6, 'white', 1, 3600, '2018-04-05 07:35:47', 'cash', 0, 3000, 0, 0, '[{"id":"13","parent_id":"1","name":"Cosmopolitan ","price":"3000","date_created":"2018-03-28 01:24:38","created_by":"1","price_default":"3000","salt_id":1}]', 16, 1),
(77, 6, 'blue', 2, 12000, '2018-04-05 01:24:29', 'cash', 0, 10000, 12, 1, '[{"id":"14","parent_id":"1","name":"Lemon Cooler","price":"3000","date_created":"2018-03-28 01:24:53","created_by":"1","price_default":"3000","salt_id":1},{"id":"41","parent_id":"35","name":"Prawns/Chips","price":"7000","date_created":"2018-03-28 02:15:16","created_by":"1","price_default":"7000","salt_id":2}]', 6, 1),
(78, 7, 'trads', 3, 7800, '2018-04-09 09:01:09', 'cash', 0, 6500, 8000, 1, '[{"id":"40","parent_id":"35","name":"Chicken/Chips","price":"5000","date_created":"2018-03-28 02:14:54","created_by":"1","price_default":"5000","salt_id":1},{"id":"29","parent_id":"7","name":"Malt ","price":"1000","date_created":"2018-03-28 02:09:18","created_by":"1","price_default":"1000","salt_id":2},{"id":"27","parent_id":"7","name":"Can/Sodas/Water","price":"500","date_created":"2018-03-28 02:08:46","created_by":"1","price_default":"500","salt_id":3}]', 6, 1),
(79, 9, 'green', 1, 4800, '2018-04-11 06:28:16', 'cash', 0, 4000, 5000, 1, '[{"id":"4","parent_id":"1","name":"Fun-on-the-Beach","price":"4000","date_created":"2018-03-10 09:04:08","created_by":"1","price_default":"4000","salt_id":3}]', 6, 1),
(80, 9, 'one', 1, 3600, '2018-04-11 06:28:52', 'cash', 0, 3000, 4000, 1, '[{"id":"38","parent_id":"35","name":"Suya Sandwich Rap","price":"3000","date_created":"2018-03-28 02:13:44","created_by":"1","price_default":"3000","salt_id":1}]', 6, 1),
(81, 12, 'white tshirt', 2, 6000, '2018-04-11 10:12:43', 'cash', 0, 5000, 6000, 1, '[{"id":"37","parent_id":"35","name":"Beef Burger","price":"4000","date_created":"2018-03-28 02:13:21","created_by":"1","price_default":"4000","salt_id":1},{"id":"28","parent_id":"7","name":"Can Beers","price":"1000","date_created":"2018-03-28 02:09:03","created_by":"1","price_default":"1000","salt_id":2}]', 30, 1),
(82, 12, 'black', 1, 36000, '2018-04-11 10:17:40', 'cash', 0, 36000, 37000, 1, '[{"id":"78","parent_id":"52","name":"Jack Daniels","price":"30000","date_created":"2018-04-04 12:29:11","created_by":"1","price_default":"30000","salt_id":1}]', 30, 1),
(83, 12, 'split', 4, 21000, '2018-04-11 10:20:58', 'both', 16000, 5000, 0, 1, '[{"id":"4","parent_id":"1","name":"Fun-on-the-Beach","price":"4000","date_created":"2018-03-10 09:04:08","created_by":"1","price_default":"4000","salt_id":1},{"id":"10","parent_id":"1","name":"Iced Tea","price":"4000","date_created":"2018-03-28 01:23:07","created_by":"1","price_default":"4000","salt_id":2},{"id":"11","parent_id":"1","name":"Maitai Coco","price":"4000","date_created":"2018-03-28 01:23:56","created_by":"1","price_default":"4000","salt_id":3},{"id":"42","parent_id":"35","name":"Today''s House Special","price":"5500","date_created":"2018-03-28 02:15:44","created_by":"1","price_default":"5500","salt_id":4}]', 6, 1),
(84, 12, 'blue', 4, 116400, '2018-04-11 10:25:30', 'cash', 0, 97000, 1200000, 1, '[{"id":"8","parent_id":"7","name":"Moet Ice","price":"45000","date_created":"2018-03-19 12:14:23","created_by":"1","price_default":"45000","salt_id":1},{"id":"17","parent_id":"7","name":"Moet Rose","price":"45000","date_created":"2018-03-28 02:01:54","created_by":"1","price_default":"45000","salt_id":2},{"id":"36","parent_id":"35","name":"Chicken Burger","price":"3000","date_created":"2018-03-28 02:13:01","created_by":"1","price_default":"3000","salt_id":3},{"id":"37","parent_id":"35","name":"Beef Burger","price":"4000","date_created":"2018-03-28 02:13:21","created_by":"1","price_default":"4000","salt_id":4}]', 6, 1),
(85, 12, 'blue', 4, 116400, '2018-04-11 10:28:55', 'both', 7899, 108501, 116400, 1, '[{"id":"8","parent_id":"7","name":"Moet Ice","price":"45000","date_created":"2018-03-19 12:14:23","created_by":"1","price_default":"45000","salt_id":1},{"id":"8","parent_id":"7","name":"Moet Ice","price":"45000","date_created":"2018-03-19 12:14:23","created_by":"1","price_default":"45000","salt_id":2},{"id":"36","parent_id":"35","name":"Chicken Burger","price":"3000","date_created":"2018-03-28 02:13:01","created_by":"1","price_default":"3000","salt_id":3},{"id":"37","parent_id":"35","name":"Beef Burger","price":"4000","date_created":"2018-03-28 02:13:21","created_by":"1","price_default":"4000","salt_id":4}]', 6, 1),
(86, 1, 'red shirt', 7, 28800, '2018-04-21 10:54:29', '', 0, 0, 0, 2, '[{"id":"4","parent_id":"1","name":"Fun-on-the-Beach","price":"4000","date_created":"2018-03-10 09:04:08","created_by":"1","price_default":"4000","salt_id":1},{"id":"10","parent_id":"1","name":"Iced Tea","price":"4000","date_created":"2018-03-28 01:23:07","created_by":"1","price_default":"4000","salt_id":2},{"id":"5","parent_id":"2","name":"Fruit Punch","price":"2000","date_created":"2018-03-10 09:06:11","created_by":"1","price_default":"2000","salt_id":3},{"id":"4","parent_id":"1","name":"Fun-on-the-Beach","price":"4000","date_created":"2018-03-10 09:04:08","created_by":"1","price_default":"4000","push_status":"p","salt_id":4},{"id":"10","parent_id":"1","name":"Iced Tea","price":"4000","date_created":"2018-03-28 01:23:07","created_by":"1","price_default":"4000","push_status":"p","salt_id":5},{"id":"12","parent_id":"1","name":"Whisky Sour","price":"3000","date_created":"2018-03-28 01:24:20","created_by":"1","price_default":"3000","push_status":"p","salt_id":6},{"id":"12","parent_id":"1","name":"Whisky Sour","price":"3000","date_created":"2018-03-28 01:24:20","created_by":"1","price_default":"3000","push_status":"p","salt_id":7}]', 5, 0),
(87, 1, 'blue shirt', 3, 198000, '2018-04-21 01:04:47', '', 0, 0, 0, 0, '[{"id":"78","parent_id":"52","name":"Jack Daniels","price":"30000","date_created":"2018-04-04 12:29:11","created_by":"1","price_default":"30000","push_status":"s","salt_id":1},{"id":"66","parent_id":"52","name":"Glenmorangie (Signet)","price":"130000","date_created":"2018-03-28 02:39:27","created_by":"1","price_default":"130000","push_status":"s","salt_id":2},{"id":"70","parent_id":"54","name":"Shisha","price":"5000","date_created":"2018-04-04 12:04:56","created_by":"1","price_default":"5000","push_status":"s","salt_id":4}]', 5, 1),
(88, 1, 'test3', 2, 63600, '2018-04-21 01:51:29', 'cash', 0, 160800, 160800, 0, '[{"id":"17","parent_id":"7","name":"Moet Rose","price":"45000","date_created":"2018-03-28 02:01:54","created_by":"1","price_default":"45000","push_status":"s","salt_id":1},{"id":"20","parent_id":"7","name":"Red Wine","price":"8000","date_created":"2018-03-28 02:06:16","created_by":"1","price_default":"8000","push_status":"s","salt_id":2}]', 7, 1),
(90, 1, 'ola', 2, 9600, '2018-04-21 02:03:51', 'cash', 0, 9600, 9600, 1, '[{"id":"10","parent_id":"1","name":"Iced Tea","price":"4000","date_created":"2018-03-28 01:23:07","created_by":"1","price_default":"4000","push_status":"p","salt_id":1},{"id":"11","parent_id":"1","name":"Maitai Coco","price":"4000","date_created":"2018-03-28 01:23:56","created_by":"1","price_default":"4000","push_status":"p","salt_id":2}]', 7, 1),
(89, 1, 'test3', 3, 62400, '2018-04-21 01:40:43', 'cash', 0, 9600, 9600, 0, '[{"id":"37","parent_id":"35","name":"Beef Burger","price":"4000","date_created":"2018-03-28 02:13:21","created_by":"1","price_default":"4000","push_status":"s","salt_id":1},{"id":"38","parent_id":"35","name":"Suya Sandwich Rap","price":"3000","date_created":"2018-03-28 02:13:44","created_by":"1","price_default":"3000","push_status":"s","salt_id":2},{"id":"8","parent_id":"7","name":"Moet Ice","price":"45000","date_created":"2018-03-19 12:14:23","created_by":"1","price_default":"45000","push_status":"p","salt_id":3}]', 43, 1),
(91, 1, 'Nnamdi ', 3, 12000, '2018-04-21 02:13:21', 'cash', 0, 12000, 12000, 1, '[{"id":"4","parent_id":"1","name":"Fun-on-the-Beach","price":"4000","date_created":"2018-03-10 09:04:08","created_by":"1","price_default":"4000","push_status":"s","salt_id":1},{"id":"12","parent_id":"1","name":"Whisky Sour","price":"3000","date_created":"2018-03-28 01:24:20","created_by":"1","price_default":"3000","push_status":"s","salt_id":2},{"id":"36","parent_id":"35","name":"Chicken Burger","price":"3000","date_created":"2018-03-28 02:13:01","created_by":"1","price_default":"3000","push_status":"p","salt_id":3}]', 7, 1),
(92, 1, 'test5', 1, 3600, '2018-04-21 02:15:13', '', 0, 0, 0, 2, '[{"id":"36","parent_id":"35","name":"Chicken Burger","price":"3000","date_created":"2018-03-28 02:13:01","created_by":"1","price_default":"3000","push_status":"p","salt_id":1}]', 7, 0),
(93, 1, 'amd', 2, 108000, '2018-04-21 02:23:23', '', 0, 0, 0, 2, '[{"id":"8","parent_id":"7","name":"Moet Ice","price":"45000","date_created":"2018-03-19 12:14:23","created_by":"1","price_default":"45000","push_status":"p","salt_id":1},{"id":"17","parent_id":"7","name":"Moet Rose","price":"45000","date_created":"2018-03-28 02:01:54","created_by":"1","price_default":"45000","push_status":"p","salt_id":2}]', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_items`
--

CREATE TABLE IF NOT EXISTS `customer_order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `parent_id`, `name`, `price`, `date_created`, `created_by`) VALUES
(1, 0, 'COCKTAILS', '', '2018-03-10 08:47:50', 1),
(2, 0, 'MOCKTAILS', '', '2018-03-10 08:50:04', 1),
(4, 1, 'Fun-on-the-Beach', '4000', '2018-03-10 09:04:08', 1),
(5, 2, 'Fruit Punch', '2000', '2018-03-10 09:06:11', 1),
(6, 2, 'Lemon Cool ', '2000', '2018-03-10 09:06:55', 1),
(7, 0, 'DRINKS', '', '2018-03-19 12:14:01', 1),
(8, 7, 'Moet Ice', '45000', '2018-03-19 12:14:23', 1),
(9, 2, 'Chapman', '1500', '2018-03-20 08:58:38', 1),
(10, 1, 'Iced Tea', '4000', '2018-03-28 01:23:07', 1),
(11, 1, 'Maitai Coco', '4000', '2018-03-28 01:23:56', 1),
(12, 1, 'Whisky Sour', '3000', '2018-03-28 01:24:20', 1),
(13, 1, 'Cosmopolitan ', '3000', '2018-03-28 01:24:38', 1),
(14, 1, 'Lemon Cooler', '3000', '2018-03-28 01:24:53', 1),
(15, 1, 'Baileys Smooth', '4000', '2018-03-28 01:25:17', 1),
(16, 1, 'Cocktails Pitcher', '20000', '2018-03-28 01:25:42', 1),
(17, 7, 'Moet Rose', '45000', '2018-03-28 02:01:54', 1),
(18, 7, 'Dom Perignon (Brut)', '135000', '2018-03-28 02:02:56', 1),
(19, 7, 'Glenmorangie ', '40000', '2018-03-28 02:05:41', 1),
(20, 7, 'Red Wine', '8000', '2018-03-28 02:06:16', 1),
(21, 7, 'Premium Red Wine', '12000', '2018-03-28 02:06:40', 1),
(22, 7, 'Vodka', '35000', '2018-03-28 02:06:53', 1),
(23, 7, 'Baileys', '25000', '2018-03-28 02:07:08', 1),
(24, 7, 'Hennessey V.S', '30000', '2018-03-28 02:07:30', 1),
(25, 7, 'Hennessey VSOP', '45000', '2018-03-28 02:07:59', 1),
(26, 7, 'Hennessey XO', '130000', '2018-03-28 02:08:22', 1),
(27, 7, 'Can/Sodas/Water', '500', '2018-03-28 02:08:46', 1),
(28, 7, 'Can Beers', '1000', '2018-03-28 02:09:03', 1),
(29, 7, 'Malt ', '1000', '2018-03-28 02:09:18', 1),
(30, 7, 'Energy Drinks', '1500', '2018-03-28 02:09:37', 1),
(31, 7, 'Packed Juices', '2500', '2018-03-28 02:10:01', 1),
(32, 7, 'Bottle Juice', '1000', '2018-03-28 02:10:23', 1),
(33, 7, 'Cranberry', '4000', '2018-03-28 02:10:41', 1),
(34, 7, 'Tea/Coffee', '1500', '2018-03-28 02:10:57', 1),
(35, 0, 'GRILLS', '', '2018-03-28 02:12:09', 1),
(36, 35, 'Chicken Burger', '3000', '2018-03-28 02:13:01', 1),
(37, 35, 'Beef Burger', '4000', '2018-03-28 02:13:21', 1),
(38, 35, 'Suya Sandwich Rap', '3000', '2018-03-28 02:13:44', 1),
(39, 35, 'Chicken wings/Chips', '4000', '2018-03-28 02:14:15', 1),
(40, 35, 'Chicken/Chips', '5000', '2018-03-28 02:14:54', 1),
(41, 35, 'Prawns/Chips', '7000', '2018-03-28 02:15:16', 1),
(42, 35, 'Today''s House Special', '5500', '2018-03-28 02:15:44', 1),
(43, 0, 'TABLE PACKAGE', '', '2018-03-28 02:19:42', 1),
(44, 43, 'CASABLANCA (5 PEOPLE)', '350000', '2018-03-28 02:21:16', 1),
(45, 43, 'THE GOD FATHER (15 PEOPLE)', '1000000', '2018-03-28 02:24:06', 1),
(46, 43, 'TITANIC (10 PEOPLE)', '500000', '2018-03-28 02:25:14', 1),
(47, 43, 'DAY DREAM', '2500000', '2018-03-28 02:25:34', 1),
(48, 0, 'CHAMPAGNE', '', '2018-03-28 02:26:47', 1),
(49, 0, 'SPECIAL BOTTLES', '', '2018-03-28 02:27:04', 1),
(50, 0, 'VODKA', '', '2018-03-28 02:27:13', 1),
(51, 0, 'COGNAC BRANDY', '', '2018-03-28 02:27:29', 1),
(52, 0, 'WHISKY', '', '2018-03-28 02:27:46', 1),
(53, 0, 'TEQUILA', '', '2018-03-28 02:28:09', 1),
(54, 0, 'SHISHA', '', '2018-03-28 02:28:17', 1),
(55, 48, 'Veuva Clicquot', '35000', '2018-03-28 02:28:57', 1),
(56, 48, 'Moet Ice Imperial', '50000', '2018-03-28 02:29:24', 1),
(57, 48, 'Moet Nectar Rose Imperial ', '50000', '2018-03-28 02:29:49', 1),
(58, 49, 'Moet & Chandon (MCIV) 75ml', '350000', '2018-03-28 02:30:55', 1),
(59, 49, 'Veuva Clicquot Brut', '250000', '2018-03-28 02:31:17', 1),
(60, 49, 'Dom Perignon (Brut) 75ml', '150000', '2018-03-28 02:31:50', 1),
(61, 49, 'Dom Perignon ', '300000', '2018-03-28 02:32:12', 1),
(62, 50, 'Belvedere', '45000', '2018-03-28 02:34:36', 1),
(63, 51, 'Hennessy VSOP', '47000', '2018-03-28 02:35:49', 1),
(64, 51, 'Hennessey XO', '130000', '2018-03-28 02:36:06', 1),
(65, 52, 'Glenmorangie (18 years)', '50000', '2018-03-28 02:36:56', 1),
(66, 52, 'Glenmorangie (Signet)', '130000', '2018-03-28 02:39:27', 1),
(67, 53, 'Patron Silver', '40000', '2018-03-28 02:52:53', 1),
(68, 53, 'Patron XO Cafe', '40000', '2018-03-28 02:53:27', 1),
(69, 35, 'Rice and Beef', '3500', '2018-04-04 11:32:48', 1),
(70, 54, 'Shisha', '5000', '2018-04-04 12:04:56', 1),
(71, 0, 'COFFEE / TEA SET', '', '2018-04-04 12:09:55', 1),
(72, 71, 'Coffee', '1500', '2018-04-04 12:11:06', 1),
(73, 71, 'Tea', '1500', '2018-04-04 12:11:21', 1),
(74, 1, 'Pina Colada', '4000', '2018-04-04 12:15:52', 1),
(75, 1, 'Kir', '3000', '2018-04-04 12:16:24', 1),
(76, 1, 'Mojito', '4000', '2018-04-04 12:17:38', 1),
(77, 7, 'Heineken Draft', '1000', '2018-04-04 12:22:12', 1),
(78, 52, 'Jack Daniels', '30000', '2018-04-04 12:29:11', 1),
(79, 50, 'Ciroc ', '45000', '2018-04-04 12:30:52', 1),
(80, 53, 'Tequila', '30000', '2018-04-04 12:32:39', 1),
(81, 0, 'HOUSE SPECIALS', '', '2018-04-04 01:28:43', 1),
(82, 81, 'House Special Bottle Gin', '25000', '2018-04-04 01:30:13', 1),
(83, 81, 'House Special Bottle Vodka', '25000', '2018-04-04 01:31:07', 1),
(84, 81, 'House Special Bottle Rum', '25000', '2018-04-04 01:31:39', 1),
(85, 81, 'House Special Bottle Tequila', '25000', '2018-04-04 01:33:05', 1),
(86, 1, 'Margaritha', '4000', '2018-04-04 01:34:51', 1),
(87, 1, 'Mimosa', '5000', '2018-04-04 01:35:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_order`
--

CREATE TABLE IF NOT EXISTS `table_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_id` int(11) NOT NULL,
  `orders_json_data` longtext NOT NULL,
  `customer_json_data` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `table_order`
--

INSERT INTO `table_order` (`id`, `table_id`, `orders_json_data`, `customer_json_data`) VALUES
(11, 7, '{"2":[]}', '[{"name":"amd","salt_id":2}]'),
(10, 5, '{"1":[{"id":"12","parent_id":"1","name":"Whisky Sour","price":"3000","date_created":"2018-03-28 01:24:20","created_by":"1","price_default":"3000","push_status":"s","salt_id":7},{"id":"84","parent_id":"81","name":"House Special Bottle Rum","price":"25000","date_created":"2018-04-04 01:31:39","created_by":"1","price_default":"25000","push_status":"s","salt_id":23},{"id":"83","parent_id":"81","name":"House Special Bottle Vodka","price":"25000","date_created":"2018-04-04 01:31:07","created_by":"1","price_default":"25000","push_status":"s","salt_id":24},{"id":"41","parent_id":"35","name":"Prawns/Chips","price":"7000","date_created":"2018-03-28 02:15:16","created_by":"1","price_default":"7000","push_status":"s","salt_id":25},{"id":"83","parent_id":"81","name":"House Special Bottle Vodka","price":"25000","date_created":"2018-04-04 01:31:07","created_by":"1","price_default":"25000","push_status":"s","salt_id":26},{"id":"84","parent_id":"81","name":"House Special Bottle Rum","price":"25000","date_created":"2018-04-04 01:31:39","created_by":"1","price_default":"25000","push_status":"s","salt_id":27}]}', '[{"name":"red shirt","salt_id":1}]'),
(12, 6, '{"3":[{"id":"8","parent_id":"7","name":"Moet Ice","price":"45000","date_created":"2018-03-19 12:14:23","created_by":"1","price_default":"45000","salt_id":1},{"id":"8","parent_id":"7","name":"Moet Ice","price":"45000","date_created":"2018-03-19 12:14:23","created_by":"1","price_default":"45000","salt_id":2},{"id":"36","parent_id":"35","name":"Chicken Burger","price":"3000","date_created":"2018-03-28 02:13:01","created_by":"1","price_default":"3000","salt_id":3},{"id":"37","parent_id":"35","name":"Beef Burger","price":"4000","date_created":"2018-03-28 02:13:21","created_by":"1","price_default":"4000","salt_id":4}]}', '[{"name":"blue","salt_id":3}]'),
(14, 8, '{"2":[]}', '[{"name":"red","salt_id":2}]'),
(15, 42, '{"1":[],"2":[]}', '[{"name":"wale","salt_id":1},{"name":"tunde","salt_id":2}]'),
(13, 0, '', ''),
(16, 16, '{"1":[]}', '[{"name":"white","salt_id":1}]'),
(17, 30, '{"2":[{"id":"78","parent_id":"52","name":"Jack Daniels","price":"30000","date_created":"2018-04-04 12:29:11","created_by":"1","price_default":"30000","salt_id":1}]}', '[{"name":"black","salt_id":2}]'),
(18, 43, '{"3":[]}', '[{"name":"test3","salt_id":3}]');

-- --------------------------------------------------------

--
-- Table structure for table `table_placeholder`
--

CREATE TABLE IF NOT EXISTS `table_placeholder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `table_placeholder`
--

INSERT INTO `table_placeholder` (`id`, `name`, `parent_id`) VALUES
(1, 'ROOF TOP', 0),
(2, 'CAFE', 0),
(3, 'BEACH FRONT', 0),
(5, 'TABLE 1', 2),
(6, 'Mini C1', 1),
(7, 'TABLE 2', 2),
(8, 'Mini C2', 1),
(9, 'Mini C3', 1),
(10, 'Mini C4', 1),
(11, 'Mini C5', 1),
(12, 'Mini C6', 1),
(13, 'Mini C7', 1),
(14, 'Mini C8', 1),
(15, 'Cabana1', 1),
(16, 'Cabana2', 1),
(17, 'Cabana3', 1),
(18, 'Cabana4', 1),
(19, 'Cabana5', 1),
(20, 'Cabana6', 1),
(21, 'Cabana7', 1),
(22, 'Pool S1', 1),
(23, 'Pool S2', 1),
(24, 'Pool S3', 1),
(25, 'Pool S4', 1),
(26, 'Pool S5', 1),
(27, 'PALM 1', 1),
(28, 'PALM 2', 1),
(29, 'PALM 3', 1),
(30, 'Gen T1', 1),
(31, 'Gen T 2', 1),
(32, 'Gen T 3', 1),
(44, 'LOUNGE', 0),
(34, 'Gen T 4', 1),
(35, 'Gen T 5', 1),
(36, 'Gen T 6', 1),
(37, 'Gen T 7', 1),
(40, 'Gen T 8', 1),
(41, 'Gen T 9', 1),
(42, 'BAR ', 1),
(43, 'TABLE 3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `table_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `phone`, `address`, `role`, `date_created`, `status`, `table_id`, `first_name`, `last_name`) VALUES
(1, 'admin', 'admin', '08399393999', 'ftgfdfd', 'admin', '', 1, 2, 'admin', 'admin-lst'),
(5, 'admin@domain.com', 'admin', '090093990', '', 'waiter', '', 1, 1, 'admin-domain', ''),
(6, 'ad@yd.com', 'deoye', '99999', 'leki', 'waiter', '', 1, 1, 'deoye', ''),
(7, 'seun@yahoo.com', 'seun', '99888', 'liekk', 'waiter', '', 1, 1, 'seun', ''),
(8, 'uyi@yahoo.com', 'uyi1', '080999999999', 'eeeeeee', 'waiter', '', 1, 1, 'uyi', ''),
(9, 'seun1@gmail.com', 'seun', '0899999999999', 'zsxdffvg', 'waiter', '', 1, 1, 'seun', ''),
(10, 'test@yahoo.com', 'test', '', '', 'waiter', '', 1, 0, 'test', ''),
(11, '', 'jude1', '0804568745', 'loooo', 'waiter', '', 1, 1, 'Jude', 'obi'),
(12, 'igbokweh@gmail.com', 'henry', '0222222222222', 'henry1', 'waiter', '', 1, 1, 'Henry', 'igbokwe');

-- --------------------------------------------------------

--
-- Table structure for table `user_option`
--

CREATE TABLE IF NOT EXISTS `user_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `value` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user_option`
--

INSERT INTO `user_option` (`id`, `name`, `value`) VALUES
(1, 'vat', '5'),
(2, 'business_name', 'EMBER CREEK WATER FRONT '),
(3, 'business_address', '5B, Water Corporation drive, Victoria Island, Lagos '),
(4, 'service_charge', '10'),
(5, 'consumption_tax', '5'),
(6, 'business_contact', '08010000000'),
(7, 'business_email', 'businessname@domain.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
