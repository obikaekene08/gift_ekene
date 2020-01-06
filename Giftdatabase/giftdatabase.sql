-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2020 at 09:52 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giftdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_synonyms` varchar(100) DEFAULT NULL,
  `approved` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`category_id`, `category_name`, `category_synonyms`, `approved`) VALUES
(1, 'Television', 'Television, TV, Tele', 1),
(2, 'Refrigerator', 'Fridge, Freezer', 1),
(3, 'Microwave', '', 1),
(4, 'Washing Machine', '', 1),
(5, 'Water Cooler', 'Water Dispenser, Dispenser, Cooler', 1),
(6, 'Car', 'Vehicle', 1),
(7, 'Flowers', '', 1),
(8, 'Cakes', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gifters`
--

CREATE TABLE `gifters` (
  `gifter_id` int(11) NOT NULL,
  `g_fname` varchar(45) DEFAULT NULL,
  `g_lname` varchar(45) DEFAULT NULL,
  `g_phone` varchar(45) DEFAULT NULL,
  `g_email` varchar(45) DEFAULT NULL,
  `g_location` varchar(45) DEFAULT NULL,
  `g_password` varchar(45) DEFAULT NULL,
  `g_reg_date` timestamp NULL DEFAULT NULL,
  `g_user_id` varchar(50) DEFAULT NULL,
  `g_pic_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gifters`
--

INSERT INTO `gifters` (`gifter_id`, `g_fname`, `g_lname`, `g_phone`, `g_email`, `g_location`, `g_password`, `g_reg_date`, `g_user_id`, `g_pic_name`) VALUES
(1, 'Joy', 'Okoeguale', '07068447186', 'joy@gmail.com', NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, 'GIFTER/2019.12.20/1', 'gifter_images/1576811461.png'),
(2, 'Bola', 'Kaka', '07068447186', 'bola@gmail.com', NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, 'GIFTER/2019.12.20/2', NULL),
(3, 'Seun', 'Oladimeji', '09056473883', 'seun@gmail.com', NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, 'GIFTER/2019.12.20/3', 'gifter_images/1576840682.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `gifter_to_receiver_payment`
--

CREATE TABLE `gifter_to_receiver_payment` (
  `g_to_r_payment_id` int(11) NOT NULL,
  `gifter_id` int(11) DEFAULT NULL,
  `r_cart_id` int(11) DEFAULT NULL,
  `receiver_item_id` int(11) DEFAULT NULL,
  `pay_amount` int(11) DEFAULT NULL,
  `pay_method` varchar(45) DEFAULT NULL,
  `pay_status` varchar(45) DEFAULT NULL,
  `pay_date` timestamp NULL DEFAULT NULL,
  `pay_trxref` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gifter_to_receiver_payment`
--

INSERT INTO `gifter_to_receiver_payment` (`g_to_r_payment_id`, `gifter_id`, `r_cart_id`, `receiver_item_id`, `pay_amount`, `pay_method`, `pay_status`, `pay_date`, `pay_trxref`) VALUES
(1, 1, NULL, 132, 20000, NULL, 'Pending', NULL, '1291296082'),
(2, 1, NULL, 133, 20000, NULL, 'Pending', NULL, '1291296082'),
(3, 1, NULL, 134, 50000, NULL, 'Pending', NULL, '1291296082'),
(4, 1, NULL, 135, 30000, NULL, 'Pending', NULL, '1291296082'),
(5, 1, NULL, 136, 90000, NULL, 'Pending', NULL, '1291296082'),
(6, 1, NULL, 137, 5000000, NULL, 'Pending', NULL, '1291296082'),
(7, 1, NULL, 146, 50000, NULL, 'Pending', NULL, '1291296082'),
(8, 1, NULL, 147, 50000, NULL, 'Pending', NULL, '1291296082'),
(9, 1, NULL, 132, 20000, NULL, 'Pending', NULL, '1012679850'),
(10, 1, NULL, 133, 20000, NULL, 'Pending', NULL, '1012679850'),
(11, 1, NULL, 134, 50000, NULL, 'Pending', NULL, '1012679850'),
(12, 1, NULL, 135, 30000, NULL, 'Pending', NULL, '1012679850'),
(13, 1, NULL, 136, 90000, NULL, 'Pending', NULL, '1012679850'),
(14, 1, NULL, 137, 5000000, NULL, 'Pending', NULL, '1012679850'),
(15, 1, NULL, 146, 50000, NULL, 'Pending', NULL, '1012679850'),
(16, 1, NULL, 147, 50000, NULL, 'Pending', NULL, '1012679850'),
(17, 1, NULL, 132, 20000, NULL, 'Pending', NULL, '667566628'),
(18, 1, NULL, 133, 20000, NULL, 'Pending', NULL, '667566628'),
(19, 1, NULL, 134, 50000, NULL, 'Pending', NULL, '667566628'),
(20, 1, NULL, 135, 30000, NULL, 'Pending', NULL, '667566628'),
(21, 1, NULL, 136, 90000, NULL, 'Pending', NULL, '667566628'),
(22, 1, NULL, 137, 5000000, NULL, 'Pending', NULL, '667566628'),
(23, 1, NULL, 146, 50000, NULL, 'Pending', NULL, '667566628'),
(24, 1, NULL, 147, 50000, NULL, 'Pending', NULL, '667566628'),
(25, 1, NULL, 132, 20000, NULL, 'Pending', NULL, '1524282385'),
(26, 1, NULL, 133, 20000, NULL, 'Pending', NULL, '1524282385'),
(27, 1, NULL, 134, 50000, NULL, 'Pending', NULL, '1524282385'),
(28, 1, NULL, 135, 30000, NULL, 'Pending', NULL, '1524282385'),
(29, 1, NULL, 136, 90000, NULL, 'Pending', NULL, '1524282385'),
(30, 1, NULL, 137, 5000000, NULL, 'Pending', NULL, '1524282385'),
(31, 1, NULL, 146, 50000, NULL, 'Pending', NULL, '1524282385'),
(32, 1, NULL, 147, 50000, NULL, 'Pending', NULL, '1524282385'),
(33, 1, NULL, 132, 20000, NULL, 'Pending', NULL, '396774854'),
(34, 1, NULL, 133, 20000, NULL, 'Pending', NULL, '396774854'),
(35, 1, NULL, 134, 50000, NULL, 'Pending', NULL, '396774854'),
(36, 1, NULL, 135, 30000, NULL, 'Pending', NULL, '396774854'),
(37, 1, NULL, 136, 90000, NULL, 'Pending', NULL, '396774854'),
(38, 1, NULL, 137, 5000000, NULL, 'Pending', NULL, '396774854'),
(39, 1, NULL, 146, 50000, NULL, 'Pending', NULL, '396774854'),
(40, 1, NULL, 147, 50000, NULL, 'Pending', NULL, '396774854'),
(41, 1, NULL, 132, 20000, NULL, 'Pending', NULL, '1852363742'),
(42, 1, NULL, 133, 20000, NULL, 'Pending', NULL, '1852363742'),
(43, 1, NULL, 134, 50000, NULL, 'Pending', NULL, '1852363742'),
(44, 1, NULL, 135, 30000, NULL, 'Pending', NULL, '1852363742'),
(45, 1, NULL, 136, 90000, NULL, 'Pending', NULL, '1852363742'),
(46, 1, NULL, 137, 5000000, NULL, 'Pending', NULL, '1852363742'),
(47, 1, NULL, 146, 50000, NULL, 'Pending', NULL, '1852363742'),
(48, 1, NULL, 147, 50000, NULL, 'Pending', NULL, '1852363742'),
(49, 1, NULL, 132, 20000, NULL, 'Pending', NULL, '268968115'),
(50, 1, NULL, 133, 20000, NULL, 'Pending', NULL, '268968115'),
(51, 1, NULL, 134, 50000, NULL, 'Pending', NULL, '268968115'),
(52, 1, NULL, 135, 30000, NULL, 'Pending', NULL, '268968115'),
(53, 1, NULL, 136, 90000, NULL, 'Pending', NULL, '268968115'),
(54, 1, NULL, 137, 5000000, NULL, 'Pending', NULL, '268968115'),
(55, 1, NULL, 146, 50000, NULL, 'Pending', NULL, '268968115'),
(56, 1, NULL, 147, 50000, NULL, 'Pending', NULL, '268968115'),
(57, 1, NULL, 132, 20000, NULL, 'Pending', NULL, '1247992070'),
(58, 1, NULL, 133, 20000, NULL, 'Pending', NULL, '1247992070'),
(59, 1, NULL, 134, 50000, NULL, 'Pending', NULL, '1247992070'),
(60, 1, NULL, 135, 30000, NULL, 'Pending', NULL, '1247992070'),
(61, 1, NULL, 136, 90000, NULL, 'Pending', NULL, '1247992070'),
(62, 1, NULL, 137, 5000000, NULL, 'Pending', NULL, '1247992070'),
(63, 1, NULL, 146, 50000, NULL, 'Pending', NULL, '1247992070'),
(64, 1, NULL, 147, 50000, NULL, 'Pending', NULL, '1247992070'),
(65, 1, NULL, 132, 20000, NULL, 'Pending', NULL, '1103232757'),
(66, 1, NULL, 133, 20000, NULL, 'Pending', NULL, '1103232757'),
(67, 1, NULL, 134, 50000, NULL, 'Pending', NULL, '1103232757'),
(68, 1, NULL, 135, 30000, NULL, 'Pending', NULL, '1103232757'),
(69, 1, NULL, 136, 90000, NULL, 'Pending', NULL, '1103232757'),
(70, 1, NULL, 137, 5000000, NULL, 'Pending', NULL, '1103232757'),
(71, 1, NULL, 146, 50000, NULL, 'Pending', NULL, '1103232757'),
(72, 1, NULL, 147, 50000, NULL, 'Pending', NULL, '1103232757'),
(73, 1, NULL, 132, 20000, NULL, 'Pending', NULL, '397584151'),
(74, 1, NULL, 133, 20000, NULL, 'Pending', NULL, '397584151'),
(75, 1, NULL, 134, 50000, NULL, 'Pending', NULL, '397584151'),
(76, 1, NULL, 135, 30000, NULL, 'Pending', NULL, '397584151'),
(77, 1, NULL, 136, 90000, NULL, 'Pending', NULL, '397584151'),
(78, 1, NULL, 137, 5000000, NULL, 'Pending', NULL, '397584151'),
(79, 1, NULL, 146, 50000, NULL, 'Pending', NULL, '397584151'),
(80, 1, NULL, 147, 50000, NULL, 'Pending', NULL, '397584151'),
(81, 1, NULL, 132, 20000, NULL, 'Pending', NULL, '1188511355'),
(82, 1, NULL, 133, 20000, NULL, 'Pending', NULL, '1188511355'),
(83, 1, NULL, 134, 50000, NULL, 'Pending', NULL, '1188511355'),
(84, 1, NULL, 135, 30000, NULL, 'Pending', NULL, '1188511355'),
(85, 1, NULL, 136, 90000, NULL, 'Pending', NULL, '1188511355'),
(86, 1, NULL, 137, 5000000, NULL, 'Pending', NULL, '1188511355'),
(87, 1, NULL, 146, 50000, NULL, 'Pending', NULL, '1188511355'),
(88, 1, NULL, 147, 50000, NULL, 'Pending', NULL, '1188511355'),
(89, 1, NULL, 132, 20000, NULL, 'Pending', NULL, '506439832'),
(90, 1, NULL, 133, 20000, NULL, 'Pending', NULL, '506439832'),
(91, 1, NULL, 134, 50000, NULL, 'Pending', NULL, '506439832'),
(92, 1, NULL, 135, 30000, NULL, 'Pending', NULL, '506439832'),
(93, 1, NULL, 136, 90000, NULL, 'Pending', NULL, '506439832'),
(94, 1, NULL, 137, 5000000, NULL, 'Pending', NULL, '506439832'),
(95, 1, NULL, 146, 50000, NULL, 'Pending', NULL, '506439832'),
(96, 1, NULL, 147, 50000, NULL, 'Pending', NULL, '506439832'),
(97, 1, NULL, 132, 20000, NULL, 'Pending', NULL, '1859392515'),
(98, 1, NULL, 133, 20000, NULL, 'Pending', NULL, '1859392515'),
(99, 1, NULL, 134, 50000, NULL, 'Pending', NULL, '1859392515'),
(100, 1, NULL, 135, 30000, NULL, 'Pending', NULL, '1859392515'),
(101, 1, NULL, 136, 90000, NULL, 'Pending', NULL, '1859392515'),
(102, 1, NULL, 137, 5000000, NULL, 'Pending', NULL, '1859392515'),
(103, 1, NULL, 146, 50000, NULL, 'Pending', NULL, '1859392515'),
(104, 1, NULL, 147, 50000, NULL, 'Pending', NULL, '1859392515'),
(105, 1, NULL, 132, 20000, NULL, 'Pending', NULL, '1338947982'),
(106, 1, NULL, 133, 20000, NULL, 'Pending', NULL, '1338947982'),
(107, 1, NULL, 134, 50000, NULL, 'Pending', NULL, '1338947982'),
(108, 1, NULL, 135, 30000, NULL, 'Pending', NULL, '1338947982'),
(109, 1, NULL, 136, 90000, NULL, 'Pending', NULL, '1338947982'),
(110, 1, NULL, 137, 5000000, NULL, 'Pending', NULL, '1338947982'),
(111, 1, NULL, 146, 50000, NULL, 'Pending', NULL, '1338947982'),
(112, 1, NULL, 147, 50000, NULL, 'Pending', NULL, '1338947982'),
(113, 1, NULL, 132, 20000, NULL, 'Pending', NULL, '623206418'),
(114, 1, NULL, 133, 20000, NULL, 'Pending', NULL, '623206418'),
(115, 1, NULL, 134, 50000, NULL, 'Pending', NULL, '623206418'),
(116, 1, NULL, 135, 30000, NULL, 'Pending', NULL, '623206418'),
(117, 1, NULL, 136, 90000, NULL, 'Pending', NULL, '623206418'),
(118, 1, NULL, 137, 5000000, NULL, 'Pending', NULL, '623206418'),
(119, 1, NULL, 146, 50000, NULL, 'Pending', NULL, '623206418'),
(120, 1, NULL, 147, 50000, NULL, 'Pending', NULL, '623206418'),
(121, 1, NULL, 132, 20000, NULL, 'Pending', NULL, '2023926766'),
(122, 1, NULL, 134, 50000, NULL, 'Pending', NULL, '2023926766');

-- --------------------------------------------------------

--
-- Table structure for table `gift_selection`
--

CREATE TABLE `gift_selection` (
  `g_selection_id` int(11) NOT NULL,
  `gifter_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `v_item_id` int(11) DEFAULT NULL,
  `receiver_item_id` int(11) DEFAULT NULL,
  `g_to_r_payment_id` int(11) DEFAULT NULL,
  `g_selection_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `g_comment` varchar(100) DEFAULT NULL,
  `g_item_qty` int(11) DEFAULT NULL,
  `r_event_id` int(11) DEFAULT NULL,
  `purchase_cart_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gift_selection`
--

INSERT INTO `gift_selection` (`g_selection_id`, `gifter_id`, `receiver_id`, `v_item_id`, `receiver_item_id`, `g_to_r_payment_id`, `g_selection_date`, `g_comment`, `g_item_qty`, `r_event_id`, `purchase_cart_id`) VALUES
(1, 1, 8, 13, 132, NULL, NULL, NULL, 0, NULL, NULL),
(2, 1, 8, 13, 132, NULL, NULL, NULL, 0, NULL, NULL),
(3, 1, 8, 14, 133, NULL, NULL, NULL, 0, NULL, NULL),
(4, 1, 8, 13, 132, NULL, '2020-01-02 19:27:53', NULL, 3, NULL, NULL),
(5, 1, 8, 14, 133, NULL, '2020-01-02 19:27:55', NULL, 2, NULL, NULL),
(6, 1, 8, 20, 134, NULL, '2020-01-02 19:28:02', NULL, 1, NULL, NULL),
(7, 1, 8, 13, 132, NULL, '2020-01-02 19:30:52', NULL, 3, NULL, NULL),
(8, 1, 8, 13, 132, NULL, '2020-01-02 19:31:59', NULL, 3, NULL, NULL),
(9, 1, 8, 13, 132, NULL, '2020-01-02 19:32:34', NULL, 3, NULL, NULL),
(34, 1, 8, 13, 132, NULL, '2020-01-03 01:58:22', NULL, 3, 10, NULL),
(36, 1, 8, 20, 134, NULL, '2020-01-03 01:58:25', NULL, 1, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `others_category_table`
--

CREATE TABLE `others_category_table` (
  `others_cat_id` int(11) NOT NULL,
  `other_cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `price_id` int(11) NOT NULL,
  `low` int(11) DEFAULT NULL,
  `high` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`price_id`, `low`, `high`) VALUES
(1, 0, 25000),
(2, 25000, 50000),
(3, 50000, 100000),
(4, 100000, 200000),
(5, 200000, 500000),
(6, 500000, 1000000000),
(7, 0, 100000000);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_cart`
--

CREATE TABLE `purchase_cart` (
  `purchase_cart_id` int(11) NOT NULL,
  `gifter_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `p_payment_id` int(11) DEFAULT NULL,
  `g_cart_name` varchar(45) DEFAULT NULL,
  `g_cart_creation_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item`
--

CREATE TABLE `purchase_item` (
  `g_item_id` int(11) NOT NULL,
  `gifter_id` int(11) DEFAULT NULL,
  `p_cart_id` int(11) DEFAULT NULL,
  `p_receiver_id` int(11) DEFAULT NULL,
  `p_payment_id` int(11) DEFAULT NULL,
  `v_item_id` int(11) DEFAULT NULL,
  `g_item_qty` int(11) DEFAULT NULL,
  `g_item_selection_time` timestamp NULL DEFAULT NULL,
  `approved` int(11) DEFAULT '1' COMMENT '1 means available, 0 means deleted by the gifter',
  `paid` int(11) DEFAULT '1' COMMENT '1 means unpaid, 0 means paid by the gifter'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_item`
--

INSERT INTO `purchase_item` (`g_item_id`, `gifter_id`, `p_cart_id`, `p_receiver_id`, `p_payment_id`, `v_item_id`, `g_item_qty`, `g_item_selection_time`, `approved`, `paid`) VALUES
(1, 1, NULL, NULL, NULL, 13, 1, NULL, 1, 1),
(2, 1, NULL, NULL, NULL, 14, 3, NULL, 1, 1),
(3, 1, NULL, NULL, NULL, 13, 1, NULL, 1, 1),
(4, 1, NULL, NULL, NULL, 14, 3, NULL, 1, 1),
(5, 1, NULL, NULL, NULL, 13, 3, NULL, 1, 1),
(6, 1, NULL, NULL, NULL, 13, 3, NULL, 1, 1),
(7, 1, NULL, NULL, NULL, 13, 3, NULL, 1, 1),
(8, 1, NULL, NULL, NULL, 13, 1, NULL, 1, 1),
(9, 1, NULL, NULL, NULL, 19, 1, NULL, 1, 1),
(10, 1, NULL, NULL, NULL, 13, 1, NULL, 1, 1),
(11, 1, NULL, NULL, NULL, 14, 1, NULL, 1, 1),
(12, 1, NULL, NULL, NULL, 19, 3, NULL, 1, 1),
(13, 1, NULL, NULL, NULL, 13, 1, NULL, 1, 1),
(14, 3, NULL, NULL, NULL, 17, 1, NULL, 1, 1),
(15, 3, NULL, NULL, NULL, 18, 1, NULL, 1, 1),
(16, 3, NULL, NULL, NULL, 19, 1, NULL, 1, 1),
(17, 3, NULL, NULL, NULL, 20, 5, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_payment`
--

CREATE TABLE `purchase_payment` (
  `p_payment_id` int(11) NOT NULL,
  `gifter_id` int(11) DEFAULT NULL,
  `pay_amount` int(11) DEFAULT NULL,
  `pay_method` varchar(45) DEFAULT NULL,
  `pay_status` varchar(45) DEFAULT NULL,
  `pay_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_receiver`
--

CREATE TABLE `purchase_receiver` (
  `p_receiver_id` int(11) NOT NULL,
  `p_payment_id` int(11) DEFAULT NULL,
  `gifter_id` int(11) DEFAULT NULL,
  `p_r_name` varchar(45) DEFAULT NULL,
  `p_r_email` varchar(45) DEFAULT NULL,
  `p_r_phone` varchar(45) DEFAULT NULL,
  `p_r_delivery_address` varchar(100) DEFAULT NULL,
  `g_comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `receiver_id` int(11) NOT NULL,
  `r_fname` varchar(45) DEFAULT NULL,
  `r_lname` varchar(45) DEFAULT NULL,
  `r_address` varchar(45) DEFAULT NULL,
  `r_email` varchar(45) DEFAULT NULL,
  `r_phone` varchar(45) DEFAULT NULL,
  `r_delivery_address` varchar(100) DEFAULT NULL,
  `r_reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `r_password` varchar(100) DEFAULT NULL,
  `r_user_id` varchar(50) DEFAULT NULL,
  `r_pic_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`receiver_id`, `r_fname`, `r_lname`, `r_address`, `r_email`, `r_phone`, `r_delivery_address`, `r_reg_date`, `r_password`, `r_user_id`, `r_pic_name`) VALUES
(4, 'Osa', 'Osadebe', NULL, '12345', '', NULL, '2019-12-17 10:01:13', 'd41d8cd98f00b204e9800998ecf8427e', 'RECE/2019.12.17/4', NULL),
(5, 'Ekene', 'Obika', NULL, '1234567', '', NULL, '2019-12-18 16:38:36', 'd41d8cd98f00b204e9800998ecf8427e', 'RECE/2019.12.18/5', NULL),
(6, 'Ekene', 'Obika', NULL, 'obika.ekene@gmail.com', '07065692733', NULL, '2019-12-20 02:31:48', 'fcea920f7412b5da7be0cf42b8c93759', 'RECE/2019.12.20/6', NULL),
(7, 'Praise', 'Adekunle', NULL, 'praise.adekunle@gmail.com', '07068447186', NULL, '2019-12-20 03:28:00', '81dc9bdb52d04dc20036dbd8313ed055', 'RECE/2019.12.20/7', 'receiver_images/1576812539.png'),
(8, 'Onotie', 'Ajara', NULL, 'onotie@gmail.com', '08045637738', NULL, '2019-12-20 10:49:27', '81dc9bdb52d04dc20036dbd8313ed055', 'RECE/2019.12.20/8', 'receiver_images/1576839197.png');

-- --------------------------------------------------------

--
-- Table structure for table `receiver_cart`
--

CREATE TABLE `receiver_cart` (
  `r_cart_id` int(11) NOT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `r_event_id` int(11) DEFAULT NULL,
  `r_cart_creation_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `receiver_events`
--

CREATE TABLE `receiver_events` (
  `r_event_id` int(11) NOT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `r_event_type` int(11) DEFAULT NULL,
  `r_event_title` varchar(45) DEFAULT NULL,
  `r_message` varchar(100) DEFAULT NULL,
  `r_event_date` varchar(50) DEFAULT NULL,
  `r_event_duedate` varchar(50) DEFAULT NULL,
  `r_event_pic` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receiver_events`
--

INSERT INTO `receiver_events` (`r_event_id`, `receiver_id`, `r_event_type`, `r_event_title`, `r_message`, `r_event_date`, `r_event_duedate`, `r_event_pic`) VALUES
(2, 4, 1, 'Joe and Jessy', 'You are cordially invited to our wedding', NULL, NULL, NULL),
(3, 5, 3, 'My Christmas Party', 'Merry Christmas and Happy New YEar', NULL, NULL, NULL),
(4, 4, 2, 'My Christmas Party', 'Happy Christmas', NULL, NULL, NULL),
(5, 4, 1, 'Innoson and Sons', 'Hello Gifters', NULL, NULL, NULL),
(6, 4, 1, 'Sing a Song', 'King Kong', NULL, NULL, NULL),
(7, 4, 1, 'Joe and Jessy', '', NULL, NULL, NULL),
(8, 4, 1, 'Joe and Jessy', '', NULL, NULL, NULL),
(9, 4, 3, 'Christmas Party After Party', 'Happy Christmas to Everyone!', NULL, NULL, NULL),
(10, 8, 0, 'Onotie and Babatunde', 'We graciously invite you to our Beautiful Wedding. We will be happy to have grace our special event.', NULL, NULL, NULL),
(11, 8, 1, 'Seun and Kunle', 'Thank you as we expect your presence in our gracious anniversary.', NULL, NULL, NULL),
(12, 8, 0, '', '', NULL, NULL, NULL),
(13, 8, 0, '', '', NULL, NULL, NULL),
(14, 8, 2, 'Test and Tester', 'Welcome Home', NULL, NULL, NULL),
(15, 8, 1, 'Test1 and Tester1', 'Happy Home', NULL, NULL, NULL),
(16, 8, 1, 'Test2 and Tester2', 'Hey', NULL, NULL, NULL),
(17, 8, 1, 'Test2 and Tester2', 'Hey', NULL, NULL, NULL),
(18, 8, 1, 'Test2 and Tester2', 'Hey', NULL, NULL, NULL),
(19, 8, 1, 'Test2 and Tester2', 'Hey', NULL, NULL, NULL),
(20, 8, 1, 'Test2 and Tester2', 'Hey', NULL, NULL, NULL),
(21, 8, 1, 'Test2 and Tester2', 'Hey', NULL, NULL, NULL),
(22, 8, 1, 'Test2 and Tester2', 'Hey', NULL, NULL, NULL),
(23, 8, 2, 'Test3 and Tester3', 'Happy Child', NULL, NULL, NULL),
(24, 8, 3, 'Christmas Party For Onotie', 'Happy Christmas For You All', NULL, NULL, NULL),
(25, 8, 2, 'Trial and Trial2', 'Thanks Guys and Ladies', '2020-01-01', '2020-01-01', 'receiver_event_image/1577899884.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `receiver_item`
--

CREATE TABLE `receiver_item` (
  `receiver_item_id` int(11) NOT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `r_event_id` int(11) DEFAULT NULL,
  `r_cart_id` int(11) DEFAULT NULL,
  `v_item_id` int(11) DEFAULT NULL,
  `r_item_selection_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `r_item_qty` int(11) DEFAULT NULL,
  `approved` int(11) DEFAULT '1' COMMENT '1 means available, 0 means deleted by the receiver'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receiver_item`
--

INSERT INTO `receiver_item` (`receiver_item_id`, `receiver_id`, `r_event_id`, `r_cart_id`, `v_item_id`, `r_item_selection_time`, `r_item_qty`, `approved`) VALUES
(18, 4, 2, NULL, 13, NULL, 1, 1),
(19, 4, 2, NULL, 13, '2019-12-18 22:35:01', 1, 1),
(20, 4, 2, NULL, 13, '2019-12-18 22:35:47', 1, 1),
(21, 4, 2, NULL, 13, '2019-12-18 22:37:25', 1, 1),
(22, 4, 2, NULL, 13, '2019-12-18 22:40:45', 1, 1),
(23, 4, 2, NULL, 13, '2019-12-18 22:41:37', 1, 1),
(24, 4, 2, NULL, 13, '2019-12-18 22:43:57', 1, 1),
(25, 4, 2, NULL, 13, '2019-12-18 22:44:05', 1, 1),
(26, 4, 2, NULL, 13, '2019-12-18 22:44:14', 1, 1),
(27, 4, 2, NULL, 13, '2019-12-18 22:45:02', 1, 1),
(28, 4, 2, NULL, 13, '2019-12-18 22:46:04', 1, 1),
(29, 4, 2, NULL, 13, '2019-12-18 22:46:09', 1, 1),
(30, 4, 2, NULL, 13, '2019-12-18 22:46:13', 1, 1),
(31, 4, 2, NULL, 13, '2019-12-18 22:46:33', 1, 1),
(32, 4, 2, NULL, 13, '2019-12-18 22:47:00', 1, 1),
(33, 4, 2, NULL, 13, '2019-12-18 22:47:17', 1, 1),
(119, 4, 2, NULL, 13, '2019-12-19 02:00:07', 2, 1),
(120, 4, 2, NULL, 13, '2019-12-19 02:45:10', 1, 1),
(121, 4, 2, NULL, 13, '2019-12-19 02:46:13', 1, 1),
(122, 4, 2, NULL, 13, '2019-12-19 02:46:43', 3, 1),
(123, 4, 2, NULL, 14, '2019-12-19 02:46:45', 1, 1),
(124, 4, 2, NULL, 15, '2019-12-19 02:46:57', 2, 1),
(125, 4, 2, NULL, 13, '2019-12-19 14:09:14', 1, 1),
(126, 4, 2, NULL, 15, '2019-12-19 14:09:37', 10, 1),
(127, 4, 2, NULL, 16, '2019-12-19 14:09:42', 1, 1),
(128, 4, 9, NULL, 13, '2019-12-20 01:26:50', 3, 1),
(129, 4, 9, NULL, 14, '2019-12-20 01:26:56', 5, 1),
(130, 4, 9, NULL, 15, '2019-12-20 01:27:15', 2, 1),
(131, 4, 9, NULL, 16, '2019-12-20 01:27:22', 4, 1),
(132, 8, 10, NULL, 13, '2019-12-20 10:58:59', 3, 1),
(133, 8, 10, NULL, 14, '2019-12-20 10:59:10', 2, 1),
(134, 8, 10, NULL, 20, '2019-12-20 10:59:46', 1, 1),
(135, 8, 10, NULL, 28, '2019-12-20 11:01:22', 1, 1),
(136, 8, 10, NULL, 32, '2019-12-20 11:02:04', 1, 1),
(137, 8, 10, NULL, 26, '2019-12-20 11:03:34', 5, 1),
(138, 8, 11, NULL, 20, '2019-12-23 13:39:53', 1, 1),
(139, 8, 11, NULL, 21, '2019-12-23 13:39:59', 1, 1),
(140, 8, 11, NULL, 25, '2019-12-23 13:40:03', 3, 1),
(141, 8, 11, NULL, 27, '2019-12-23 13:40:15', 10, 1),
(142, 8, 11, NULL, 32, '2019-12-23 13:41:32', 1, 1),
(143, 8, 11, NULL, 20, '2019-12-23 13:41:37', 3, 1),
(144, 8, 11, NULL, 23, '2019-12-23 13:42:14', 1, 1),
(145, 8, 2, NULL, 24, '2019-12-24 17:36:15', 1, 1),
(146, 8, 10, NULL, 20, '2019-12-24 18:37:46', 2, 1),
(147, 8, 10, NULL, 20, '2019-12-24 18:39:35', 1, 1),
(148, 8, 6, NULL, 13, '2019-12-27 10:11:48', 1, 1),
(149, 8, 6, NULL, 15, '2019-12-27 10:26:02', 1, 1),
(150, 8, 6, NULL, 16, '2019-12-27 10:28:22', 1, 1),
(151, 8, 6, NULL, 18, '2019-12-27 10:29:02', 1, 1),
(152, 8, 6, NULL, 19, '2019-12-27 10:29:51', 1, 1),
(153, 8, 6, NULL, 20, '2019-12-27 10:30:09', 4, 1),
(154, 8, 23, NULL, 13, '2019-12-27 12:05:32', 1, 1),
(155, 8, 23, NULL, 14, '2019-12-27 12:05:36', 2, 1),
(164, 8, 24, NULL, 15, '2019-12-30 20:23:01', 12, 1),
(165, 8, 24, NULL, 16, '2019-12-30 20:23:39', 1, 1),
(166, 8, 24, NULL, 18, '2019-12-30 20:23:45', 4, 1),
(167, 8, 24, NULL, 20, '2019-12-30 20:23:49', 3, 1),
(168, 8, 24, NULL, 22, '2019-12-30 20:23:54', 4, 1),
(169, 8, 24, NULL, 23, '2019-12-30 20:25:41', 1000, 1),
(170, 8, 25, NULL, 13, '2020-01-01 17:34:25', 1, 1),
(171, 8, 25, NULL, 14, '2020-01-01 17:34:27', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `send_us_message`
--

CREATE TABLE `send_us_message` (
  `message_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` varchar(300) DEFAULT NULL,
  `subscribe` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `send_us_message`
--

INSERT INTO `send_us_message` (`message_id`, `name`, `email`, `message`, `subscribe`) VALUES
(1, 'Ekene', 'obika.ekene@gmail.com', '', 1),
(2, 'Ekene', 'obika.ekene@gmail.com', '', 1),
(3, 'Ekene', 'obika.ekene@gmail.com', '', 1),
(4, 'Ekene', 'obika.ekene@gmail.com', '', 1),
(5, 'Ekene', 'obika.ekene@gmail.com', '', 1),
(6, 'Ekene', 'obika.ekene@gmail.com', '', 1),
(7, 'Ekene', 'obika.ekene@gmail.com', '', 1),
(8, 'KalisaClothings', 'obika.ekene@gmail.com', 'Hey Hey', 1),
(9, 'KalisaClothings', 'obika.ekene@gmail.com', 'Hey Man', 0),
(10, 'KalisaClothings', 'obika.ekene@gmail.com', 'Hey Lady', 1),
(11, 'Ekene', 'obika.ekene@gmail.com', 'Hello Son', 0),
(12, 'Ekene', 'obika.ekene@gmail.com', 'Hey Daughter', 1),
(13, 'KalisaClothings', 'obika.ekene@gmail.com', 'Hey Boy', 1),
(14, '', '', '', 0),
(15, '', '', '', 0),
(16, 'KalisaClothings', 'obika.ekene@gmail.com', 'Hey All', 1),
(17, 'Ekene', 'obika.ekene@gmail.com', 'Hey People', 0),
(18, 'Joy', 'joy@gmail.com', 'Hey Niggas', 1),
(19, 'Onotie', 'onotie@gmail.com', 'Hello Brothers', 1),
(20, 'KalisaClothings', 'onotie@gmail.com', 'Hey Sister', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int(11) NOT NULL,
  `v_fname` varchar(45) DEFAULT NULL,
  `v_lname` varchar(45) DEFAULT NULL,
  `v_companyname` varchar(45) DEFAULT NULL,
  `v_address` varchar(100) DEFAULT NULL,
  `v_email` varchar(45) DEFAULT NULL,
  `v_phone` varchar(45) DEFAULT NULL,
  `v_password` varchar(45) DEFAULT NULL,
  `v_user_id` varchar(50) DEFAULT NULL,
  `v_pic_name` varchar(50) DEFAULT NULL,
  `v_reg_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `v_fname`, `v_lname`, `v_companyname`, `v_address`, `v_email`, `v_phone`, `v_password`, `v_user_id`, `v_pic_name`, `v_reg_date`) VALUES
(40, 'Ekene', 'Obika', 'M Technology', '15 Akin street', 'obika.ekene@gmail.com', '07065692733', '202cb962ac59075b964b07152d234b70', 'VEN/2019.12.17/40', 'vendor_images/1577819888.jpg', NULL),
(41, 'KalisaClothings', 'Dan', 'M Tech', '4. Jones Street Apapa Road', 'dan@gmail.com', '07068447186', '81dc9bdb52d04dc20036dbd8313ed055', 'VEN/2019.12.17/41', 'vendor_images/1576576314.jpg', NULL),
(42, 'Chinyere', 'Okafor', 'ChyChy Supermarket Ltd', 'No 3 Ajao Estate, Lagos', 'chychyokafor@gmail.com', '08030801113', '64f46fb2807f4befa916ed0547ef1827', 'VEN/2019.12.18/42', 'vendor_images/1576685433.png', NULL),
(43, 'Kenny', 'Biks', 'Kenny Limited', '16 Opebi Lagos', 'KennyBiks@gmail.com', '07076778829', '4a7d1ed414474e4033ac29ccb8653d9b', 'VEN/2019.12.20/43', 'vendor_images/1576837059.png', NULL),
(44, 'Solomon', 'Grundy', 'KingSolomon Ltd', '4. Jones Street Apapa Road', 'solomongrundy@gmail.com', '07068447186', '81dc9bdb52d04dc20036dbd8313ed055', 'VEN/2020.01.05/44', 'vendor_images/1578258516.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_bank_info`
--

CREATE TABLE `vendor_bank_info` (
  `vendor_id` int(11) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `account_number` varchar(20) DEFAULT NULL,
  `account_name` varchar(50) DEFAULT NULL,
  `bvn` varchar(15) DEFAULT NULL,
  `statement` varchar(50) DEFAULT NULL,
  `iban` varchar(20) DEFAULT NULL,
  `swift` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor_bank_info`
--

INSERT INTO `vendor_bank_info` (`vendor_id`, `bank_name`, `account_number`, `account_name`, `bvn`, `statement`, `iban`, `swift`) VALUES
(40, 'Access Bank', '0023235154', 'M Technology', '973783898390', NULL, '33333', '5555'),
(41, 'Access Bank', '0700707', 'ng', '12345', NULL, '33333', '5555'),
(42, 'Access Bank', '0700707', 'Chinyere Okafor', '00000000', NULL, '0000', '0000'),
(43, 'Access Bank', '0803663663', 'Kenny Limited', '63737737388', NULL, '4566', '47747'),
(44, 'Access Bank', '0707377389', 'KingSolomon Ltd', '22378849902', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_business_info`
--

CREATE TABLE `vendor_business_info` (
  `vendor_id` int(11) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `director_name` varchar(60) DEFAULT NULL,
  `company_email` varchar(80) DEFAULT NULL,
  `company_type` enum('BN','LLC','PLC') DEFAULT NULL,
  `rc_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor_business_info`
--

INSERT INTO `vendor_business_info` (`vendor_id`, `company_name`, `director_name`, `company_email`, `company_type`, `rc_number`) VALUES
(40, 'M Technology', 'J Cole', 'jcole@gmail.com', 'BN', '12345'),
(41, 'M T', 'J C', 'Jc@gmail.com', 'BN', '1235'),
(42, 'ChyChy Supermarket Limited', 'Chinyere Okafor', 'chychyokafor@gmail.com', 'LLC', '12345'),
(43, 'Kenny Limited', 'Keleman Cole', 'kennylimited@gmail.com', 'LLC', '12345'),
(44, 'KingSolomon Ltd', 'Solomon Grundy', 'Solomongrundy@gmail.com', 'LLC', '456778');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_item`
--

CREATE TABLE `vendor_item` (
  `v_item_id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `v_cat_id` int(11) DEFAULT NULL,
  `v_item_name` varchar(45) DEFAULT NULL,
  `v_item_price` float DEFAULT NULL,
  `item_color` varchar(20) DEFAULT NULL,
  `item_qty` int(11) DEFAULT NULL,
  `item_pic` varchar(100) DEFAULT NULL,
  `v_upload_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `approved` int(11) DEFAULT '1' COMMENT '1 means available, 0 means deleted by the vendor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor_item`
--

INSERT INTO `vendor_item` (`v_item_id`, `vendor_id`, `v_cat_id`, `v_item_name`, `v_item_price`, `item_color`, `item_qty`, `item_pic`, `v_upload_time`, `approved`) VALUES
(13, 41, 1, 'Samsung', 20000, 'blue', 0, NULL, '2019-12-17 09:54:40', 1),
(14, 41, 1, 'Samsung', 20000, 'blue', 0, NULL, '2019-12-17 09:54:57', 1),
(15, 41, 2, 'xxxx', 600000, '50000', 0, NULL, '2019-12-17 09:57:30', 1),
(16, 41, 5, 'ggggg', 100000, 'yello', 0, NULL, '2019-12-17 09:59:53', 1),
(17, 42, 1, 'MPMAN 42 Inches', 75000, 'black', 0, NULL, '2019-12-18 16:13:05', 1),
(18, 42, 1, 'MPMAN 42 Inches', 75000, 'black', 0, NULL, '2019-12-18 16:13:15', 1),
(19, 42, 1, 'Samsung 42 Inches', 100000, 'black', 0, NULL, '2019-12-18 16:15:21', 1),
(20, 42, 2, 'Thermocool', 50000, 'navy blue', 0, NULL, '2019-12-18 16:26:25', 1),
(21, 42, 3, 'Nexus', 45000, 'yellow', 0, NULL, '2019-12-18 16:29:38', 1),
(22, 42, 3, 'Panasonic', 200000, 'silver', 0, NULL, '2019-12-18 16:33:36', 1),
(23, 42, 6, 'Toyota 2017 Model', 8000000, 'navy blue', 0, NULL, '2019-12-18 16:36:11', 1),
(24, 40, 8, 'Red Velvet (12 inches)', 135000, 'Red', 5, NULL, '2019-12-18 19:06:27', 0),
(25, 40, 3, 'Sony 12 inches', 37000, 'silver', 50, NULL, '2019-12-18 19:13:17', 0),
(26, 40, 6, 'BMW 2018 Model', 5000000, 'white', 10, NULL, '2019-12-18 19:18:28', 0),
(27, 40, 1, 'LG 32 Inches', 50000, 'black', 2000, NULL, '2019-12-18 19:21:24', 1),
(28, 40, 2, 'Thermcool Table Top', 30000, 'Dark silver', 50, NULL, '2019-12-18 19:52:57', 0),
(29, 40, 1, 'Sony', 50000, 'yellow', 130, NULL, '2019-12-19 14:07:36', 0),
(30, 43, 1, 'Apple TV', 250000, 'silver', 60, NULL, '2019-12-20 10:22:43', 1),
(31, 43, 0, 'Toshiba', 5000, 'black', 500, NULL, '2019-12-20 10:26:17', 1),
(32, 43, 2, 'Cold Diamond', 90000, 'silver', 30, NULL, '2019-12-20 10:32:05', 1),
(33, 43, 5, 'Astral', 98000, 'silver', 100, NULL, '2019-12-20 10:48:18', 1),
(34, 40, 4, 'Albertina', 80000, 'White', 250, NULL, '2019-12-23 13:22:03', 0),
(35, 40, 7, 'Hibiscus', 40000, 'Pink', 200, NULL, '2019-12-23 13:23:48', 0),
(36, 40, 0, 'ThermoCool', 120000, 'silver', 1000, NULL, '2019-12-27 00:13:19', 1),
(37, 40, 2, 'Thermocool ', 120000, 'Blue', 10000, NULL, '2019-12-27 00:32:41', 0),
(38, 40, 5, 'Astral ', 90000, 'silver', 100000, NULL, '2019-12-27 00:35:57', 0),
(39, 40, 1, 'Samsung ', 50000, 'black', 1000, NULL, '2019-12-27 02:21:22', 0),
(40, 40, 2, 'Thermocool', 300000, 'blue', 400, NULL, '2019-12-27 02:23:01', 1),
(41, 40, 3, 'Nexus ', 50000, 'silver', 1000, NULL, '2019-12-27 02:25:47', 0),
(42, 40, 4, 'Ox', 90000, 'white', 300, NULL, '2019-12-27 02:31:14', 0),
(43, 40, 3, 'Panasonic ', 35000, 'silver', 1000, NULL, '2019-12-27 02:35:13', 0),
(44, 40, 6, 'Toyota 2017 Model ', 20000000, 'red, yello', 400, 'vendor_item_image/1577887435.jpg', '2019-12-27 02:41:54', 1),
(45, 40, 7, 'Rose', 400000, 'red', 3000, 'vendor_item_image/1577887376.jpg', '2019-12-27 02:46:47', 1),
(46, 40, 3, 'Nexus ', 100000, 'wine red', 10, NULL, '2019-12-30 21:22:45', 0),
(47, 40, 4, 'Oxxx', 500000, 'whitey', 8, NULL, '2019-12-31 18:56:30', 1),
(48, 40, 2, 'Thermocool ', 500000, 'brown', 37, NULL, '2019-12-31 18:58:24', 1),
(49, 40, 2, 'Thermocool ', 500000, 'brown', 37, NULL, '2019-12-31 19:00:26', 1),
(50, 40, 5, 'Astral ', 70000, 'silver', 10, 'vendor_item_image/1577820498.jpg', '2019-12-31 19:28:18', 1),
(51, 40, 2, 'Thermocool ', 500000, 'gold', 116, NULL, '2019-12-31 19:35:47', 1),
(52, 40, 1, 'Samsung ', 500000, 'golden', 116, 'vendor_item_image/1577821031.jpg', '2019-12-31 19:37:11', 1),
(53, 40, 2, 'Cold Diamond ', 900000, 'silver', 30, NULL, '2020-01-01 12:54:54', 1),
(54, 44, 1, 'Samsung ', 50000, 'black', 2000, 'vendor_item_image/1578343539.jpeg', '2020-01-05 21:35:59', 1),
(55, 44, 2, 'Thermocool ', 70000, 'blue', 30, 'vendor_item_image/1578343519.jpg', '2020-01-05 21:37:01', 1),
(56, 44, 5, 'Astral ', 100000, 'silver', 40, 'vendor_item_image/1578260547.jpg', '2020-01-05 21:42:27', 0),
(57, 44, 4, 'Oxxx ', 120000, 'white', 50, 'vendor_item_image/1578261251.png', '2020-01-05 21:54:11', 0),
(58, 44, 8, 'Red Velvet', 21000, 'Red', 30, 'vendor_item_image/1578261538.jpg', '2020-01-05 21:57:54', 0),
(59, 44, 1, 'Samsung ', 100000, 'Navy Blue', 31, 'vendor_item_image/1578326676.jpg', '2020-01-06 16:04:36', 1),
(60, 44, 3, 'Panasonic ', 900000, 'whitey', 357, 'vendor_item_image/1578328240.jpg', '2020-01-06 16:14:56', 1),
(61, 44, 3, 'Nexus ', 50000000, 'ash', 154, 'vendor_item_image/1578342985.jpeg', '2020-01-06 16:19:07', 1),
(62, 44, 3, 'Nexus ', 50000000, 'ash', 15400, 'vendor_item_image/1578343566.jpeg', '2020-01-06 16:19:30', 1),
(63, 44, 3, 'Nexus ', 50000000, 'ash', 154, 'vendor_item_image/1578343596.jpg', '2020-01-06 16:19:37', 1),
(64, 44, 3, 'Nexus ', 50000000, 'ash', 154, 'vendor_item_image/1578339244.jpg', '2020-01-06 16:19:43', 1),
(65, 44, 3, 'Nexus ', 50000000, 'ash', 154, 'vendor_item_image/1578338653.jpg', '2020-01-06 16:19:44', 1),
(66, 44, 7, 'Rose ', 900000, 'red', 159, 'vendor_item_image/1578327809.jpg', '2020-01-06 16:23:29', 1),
(67, 44, 4, 'Binatone', 155000, 'whitey', 3050, 'vendor_item_image/1578328194.jpg', '2020-01-06 16:29:54', 1),
(68, 44, 1, 'MPMAN 42 Inches ', 70000, 'silver', 5000, 'vendor_item_image/1578342135.jpg', '2020-01-06 20:22:15', 1),
(69, 44, 2, 'Cold Diamond ', 100000, 'silver', 14, 'vendor_item_image/1578343764.jpg', '2020-01-06 20:49:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_select_category`
--

CREATE TABLE `vendor_select_category` (
  `vendor_id` int(11) NOT NULL,
  `v_cat_id` varchar(50) DEFAULT NULL,
  `cat_creation_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `gifters`
--
ALTER TABLE `gifters`
  ADD PRIMARY KEY (`gifter_id`);

--
-- Indexes for table `gifter_to_receiver_payment`
--
ALTER TABLE `gifter_to_receiver_payment`
  ADD PRIMARY KEY (`g_to_r_payment_id`),
  ADD KEY `fk18_idx` (`gifter_id`),
  ADD KEY `fk20_idx` (`r_cart_id`),
  ADD KEY `FK2022` (`receiver_item_id`);

--
-- Indexes for table `gift_selection`
--
ALTER TABLE `gift_selection`
  ADD PRIMARY KEY (`g_selection_id`),
  ADD KEY `fk10_idx` (`gifter_id`),
  ADD KEY `fk101_idx` (`receiver_id`),
  ADD KEY `FK301` (`v_item_id`),
  ADD KEY `FK401` (`receiver_item_id`);

--
-- Indexes for table `others_category_table`
--
ALTER TABLE `others_category_table`
  ADD PRIMARY KEY (`others_cat_id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `purchase_cart`
--
ALTER TABLE `purchase_cart`
  ADD PRIMARY KEY (`purchase_cart_id`),
  ADD KEY `fk12_idx` (`gifter_id`),
  ADD KEY `fk121_idx` (`receiver_id`),
  ADD KEY `fk122_idx` (`p_payment_id`);

--
-- Indexes for table `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD PRIMARY KEY (`g_item_id`),
  ADD KEY `fk13_idx` (`gifter_id`),
  ADD KEY `fk15_idx` (`p_cart_id`),
  ADD KEY `fk162_idx` (`v_item_id`),
  ADD KEY `fk16_idx` (`p_payment_id`),
  ADD KEY `fk161_idx` (`p_receiver_id`);

--
-- Indexes for table `purchase_payment`
--
ALTER TABLE `purchase_payment`
  ADD PRIMARY KEY (`p_payment_id`),
  ADD KEY `f2100_idx` (`gifter_id`);

--
-- Indexes for table `purchase_receiver`
--
ALTER TABLE `purchase_receiver`
  ADD PRIMARY KEY (`p_receiver_id`),
  ADD KEY `f200_idx` (`p_payment_id`),
  ADD KEY `f2001_idx` (`gifter_id`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`receiver_id`);

--
-- Indexes for table `receiver_cart`
--
ALTER TABLE `receiver_cart`
  ADD PRIMARY KEY (`r_cart_id`),
  ADD KEY `fk5_idx` (`r_event_id`),
  ADD KEY `fk6_idx` (`receiver_id`);

--
-- Indexes for table `receiver_events`
--
ALTER TABLE `receiver_events`
  ADD PRIMARY KEY (`r_event_id`),
  ADD KEY `fk4_idx` (`receiver_id`);

--
-- Indexes for table `receiver_item`
--
ALTER TABLE `receiver_item`
  ADD PRIMARY KEY (`receiver_item_id`),
  ADD KEY `fk7_idx` (`r_cart_id`),
  ADD KEY `fk8_idx` (`r_event_id`),
  ADD KEY `fk9_idx` (`receiver_id`),
  ADD KEY `fk91_idx` (`v_item_id`);

--
-- Indexes for table `send_us_message`
--
ALTER TABLE `send_us_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`);

--
-- Indexes for table `vendor_bank_info`
--
ALTER TABLE `vendor_bank_info`
  ADD KEY `FK1` (`vendor_id`);

--
-- Indexes for table `vendor_business_info`
--
ALTER TABLE `vendor_business_info`
  ADD KEY `fk40` (`vendor_id`);

--
-- Indexes for table `vendor_item`
--
ALTER TABLE `vendor_item`
  ADD PRIMARY KEY (`v_item_id`),
  ADD KEY `fk2_idx` (`vendor_id`),
  ADD KEY `fk3_idx` (`v_cat_id`);

--
-- Indexes for table `vendor_select_category`
--
ALTER TABLE `vendor_select_category`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gifters`
--
ALTER TABLE `gifters`
  MODIFY `gifter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gifter_to_receiver_payment`
--
ALTER TABLE `gifter_to_receiver_payment`
  MODIFY `g_to_r_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `gift_selection`
--
ALTER TABLE `gift_selection`
  MODIFY `g_selection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `others_category_table`
--
ALTER TABLE `others_category_table`
  MODIFY `others_cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_cart`
--
ALTER TABLE `purchase_cart`
  MODIFY `purchase_cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_item`
--
ALTER TABLE `purchase_item`
  MODIFY `g_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `purchase_payment`
--
ALTER TABLE `purchase_payment`
  MODIFY `p_payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_receiver`
--
ALTER TABLE `purchase_receiver`
  MODIFY `p_receiver_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receivers`
--
ALTER TABLE `receivers`
  MODIFY `receiver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receiver_cart`
--
ALTER TABLE `receiver_cart`
  MODIFY `r_cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receiver_events`
--
ALTER TABLE `receiver_events`
  MODIFY `r_event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `receiver_item`
--
ALTER TABLE `receiver_item`
  MODIFY `receiver_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `send_us_message`
--
ALTER TABLE `send_us_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `vendor_item`
--
ALTER TABLE `vendor_item`
  MODIFY `v_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gifter_to_receiver_payment`
--
ALTER TABLE `gifter_to_receiver_payment`
  ADD CONSTRAINT `FK2022` FOREIGN KEY (`receiver_item_id`) REFERENCES `receiver_item` (`receiver_item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk18` FOREIGN KEY (`gifter_id`) REFERENCES `gifters` (`gifter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk20` FOREIGN KEY (`r_cart_id`) REFERENCES `receiver_cart` (`r_cart_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gift_selection`
--
ALTER TABLE `gift_selection`
  ADD CONSTRAINT `FK301` FOREIGN KEY (`v_item_id`) REFERENCES `vendor_item` (`v_item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK401` FOREIGN KEY (`receiver_item_id`) REFERENCES `receiver_item` (`receiver_item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk10` FOREIGN KEY (`gifter_id`) REFERENCES `gifters` (`gifter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk101` FOREIGN KEY (`receiver_id`) REFERENCES `receivers` (`receiver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchase_cart`
--
ALTER TABLE `purchase_cart`
  ADD CONSTRAINT `fk12` FOREIGN KEY (`gifter_id`) REFERENCES `gifters` (`gifter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk121` FOREIGN KEY (`receiver_id`) REFERENCES `receivers` (`receiver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk122` FOREIGN KEY (`p_payment_id`) REFERENCES `purchase_payment` (`p_payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD CONSTRAINT `fk13` FOREIGN KEY (`gifter_id`) REFERENCES `gifters` (`gifter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk15` FOREIGN KEY (`p_cart_id`) REFERENCES `purchase_cart` (`purchase_cart_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk16` FOREIGN KEY (`p_payment_id`) REFERENCES `purchase_payment` (`p_payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk161` FOREIGN KEY (`p_receiver_id`) REFERENCES `purchase_receiver` (`p_receiver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk162` FOREIGN KEY (`v_item_id`) REFERENCES `vendor_item` (`v_item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchase_payment`
--
ALTER TABLE `purchase_payment`
  ADD CONSTRAINT `f2100` FOREIGN KEY (`gifter_id`) REFERENCES `gifters` (`gifter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchase_receiver`
--
ALTER TABLE `purchase_receiver`
  ADD CONSTRAINT `f200` FOREIGN KEY (`p_payment_id`) REFERENCES `purchase_payment` (`p_payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `f2001` FOREIGN KEY (`gifter_id`) REFERENCES `gifters` (`gifter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `receiver_cart`
--
ALTER TABLE `receiver_cart`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`r_event_id`) REFERENCES `receiver_events` (`r_event_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk6` FOREIGN KEY (`receiver_id`) REFERENCES `receivers` (`receiver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `receiver_events`
--
ALTER TABLE `receiver_events`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`receiver_id`) REFERENCES `receivers` (`receiver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `receiver_item`
--
ALTER TABLE `receiver_item`
  ADD CONSTRAINT `fk7` FOREIGN KEY (`r_cart_id`) REFERENCES `receiver_cart` (`r_cart_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk8` FOREIGN KEY (`r_event_id`) REFERENCES `receiver_events` (`r_event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk9` FOREIGN KEY (`receiver_id`) REFERENCES `receivers` (`receiver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk91` FOREIGN KEY (`v_item_id`) REFERENCES `vendor_item` (`v_item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vendor_bank_info`
--
ALTER TABLE `vendor_bank_info`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_business_info`
--
ALTER TABLE `vendor_business_info`
  ADD CONSTRAINT `fk40` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
