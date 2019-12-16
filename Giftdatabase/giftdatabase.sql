-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for giftdatabase
CREATE DATABASE IF NOT EXISTS `giftdatabase` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `giftdatabase`;


-- Dumping structure for table giftdatabase.category_table
CREATE TABLE IF NOT EXISTS `category_table` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `category_synonyms` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.category_table: ~8 rows (approximately)
/*!40000 ALTER TABLE `category_table` DISABLE KEYS */;
INSERT INTO `category_table` (`category_id`, `category_name`, `category_synonyms`) VALUES
	(1, 'Television', 'Television, TV, Tele'),
	(2, 'Refrigerator', 'Fridge, Freezer'),
	(3, 'Microwave', ''),
	(4, 'Washing Machine', ''),
	(5, 'Water Cooler', 'Water Dispenser, Dispenser, Cooler'),
	(6, 'Car', 'Vehicle'),
	(7, 'Flowers', ''),
	(8, 'Cakes', '');
/*!40000 ALTER TABLE `category_table` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.gifters
CREATE TABLE IF NOT EXISTS `gifters` (
  `gifter_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_fname` varchar(45) DEFAULT NULL,
  `g_lname` varchar(45) DEFAULT NULL,
  `g_phone` varchar(45) DEFAULT NULL,
  `g_email` varchar(45) DEFAULT NULL,
  `g_location` varchar(45) DEFAULT NULL,
  `g_password` varchar(45) DEFAULT NULL,
  `g_reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`gifter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.gifters: ~0 rows (approximately)
/*!40000 ALTER TABLE `gifters` DISABLE KEYS */;
/*!40000 ALTER TABLE `gifters` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.gifter_to_receiver_payment
CREATE TABLE IF NOT EXISTS `gifter_to_receiver_payment` (
  `g_to_r_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `gifter_id` int(11) DEFAULT NULL,
  `r_cart_id` int(11) DEFAULT NULL,
  `pay_amount` int(11) DEFAULT NULL,
  `pay_method` varchar(45) DEFAULT NULL,
  `pay_status` varchar(45) DEFAULT NULL,
  `pay_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`g_to_r_payment_id`),
  KEY `fk18_idx` (`gifter_id`),
  KEY `fk20_idx` (`r_cart_id`),
  CONSTRAINT `fk18` FOREIGN KEY (`gifter_id`) REFERENCES `gifters` (`gifter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk20` FOREIGN KEY (`r_cart_id`) REFERENCES `receiver_cart` (`r_cart_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.gifter_to_receiver_payment: ~0 rows (approximately)
/*!40000 ALTER TABLE `gifter_to_receiver_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `gifter_to_receiver_payment` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.gift_selection
CREATE TABLE IF NOT EXISTS `gift_selection` (
  `g_selection_id` int(11) NOT NULL AUTO_INCREMENT,
  `gifter_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `g_to_r_payment_id` int(11) DEFAULT NULL,
  `g_selection_date` timestamp NULL DEFAULT NULL,
  `g_comment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`g_selection_id`),
  KEY `fk10_idx` (`gifter_id`),
  KEY `fk101_idx` (`receiver_id`),
  CONSTRAINT `fk10` FOREIGN KEY (`gifter_id`) REFERENCES `gifters` (`gifter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk101` FOREIGN KEY (`receiver_id`) REFERENCES `receivers` (`receiver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.gift_selection: ~0 rows (approximately)
/*!40000 ALTER TABLE `gift_selection` DISABLE KEYS */;
/*!40000 ALTER TABLE `gift_selection` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.others_category_table
CREATE TABLE IF NOT EXISTS `others_category_table` (
  `others_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `other_cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`others_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.others_category_table: ~0 rows (approximately)
/*!40000 ALTER TABLE `others_category_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `others_category_table` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.purchase_cart
CREATE TABLE IF NOT EXISTS `purchase_cart` (
  `purchase_cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `gifter_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `p_payment_id` int(11) DEFAULT NULL,
  `g_cart_name` varchar(45) DEFAULT NULL,
  `g_cart_creation_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`purchase_cart_id`),
  KEY `fk12_idx` (`gifter_id`),
  KEY `fk121_idx` (`receiver_id`),
  KEY `fk122_idx` (`p_payment_id`),
  CONSTRAINT `fk12` FOREIGN KEY (`gifter_id`) REFERENCES `gifters` (`gifter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk121` FOREIGN KEY (`receiver_id`) REFERENCES `receivers` (`receiver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk122` FOREIGN KEY (`p_payment_id`) REFERENCES `purchase_payment` (`p_payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.purchase_cart: ~0 rows (approximately)
/*!40000 ALTER TABLE `purchase_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_cart` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.purchase_item
CREATE TABLE IF NOT EXISTS `purchase_item` (
  `g_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `gifter_id` int(11) DEFAULT NULL,
  `p_cart_id` int(11) DEFAULT NULL,
  `p_receiver_id` int(11) DEFAULT NULL,
  `p_payment_id` int(11) DEFAULT NULL,
  `v_item_id` int(11) DEFAULT NULL,
  `g_item_selection_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`g_item_id`),
  KEY `fk13_idx` (`gifter_id`),
  KEY `fk15_idx` (`p_cart_id`),
  KEY `fk162_idx` (`v_item_id`),
  KEY `fk16_idx` (`p_payment_id`),
  KEY `fk161_idx` (`p_receiver_id`),
  CONSTRAINT `fk13` FOREIGN KEY (`gifter_id`) REFERENCES `gifters` (`gifter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk15` FOREIGN KEY (`p_cart_id`) REFERENCES `purchase_cart` (`purchase_cart_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk16` FOREIGN KEY (`p_payment_id`) REFERENCES `purchase_payment` (`p_payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk161` FOREIGN KEY (`p_receiver_id`) REFERENCES `purchase_receiver` (`p_receiver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk162` FOREIGN KEY (`v_item_id`) REFERENCES `vendor_item` (`v_item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.purchase_item: ~0 rows (approximately)
/*!40000 ALTER TABLE `purchase_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_item` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.purchase_payment
CREATE TABLE IF NOT EXISTS `purchase_payment` (
  `p_payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `gifter_id` int(11) DEFAULT NULL,
  `pay_amount` int(11) DEFAULT NULL,
  `pay_method` varchar(45) DEFAULT NULL,
  `pay_status` varchar(45) DEFAULT NULL,
  `pay_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`p_payment_id`),
  KEY `f2100_idx` (`gifter_id`),
  CONSTRAINT `f2100` FOREIGN KEY (`gifter_id`) REFERENCES `gifters` (`gifter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.purchase_payment: ~0 rows (approximately)
/*!40000 ALTER TABLE `purchase_payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_payment` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.purchase_receiver
CREATE TABLE IF NOT EXISTS `purchase_receiver` (
  `p_receiver_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_payment_id` int(11) DEFAULT NULL,
  `gifter_id` int(11) DEFAULT NULL,
  `p_r_name` varchar(45) DEFAULT NULL,
  `p_r_email` varchar(45) DEFAULT NULL,
  `p_r_phone` varchar(45) DEFAULT NULL,
  `p_r_delivery_address` varchar(100) DEFAULT NULL,
  `g_comment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`p_receiver_id`),
  KEY `f200_idx` (`p_payment_id`),
  KEY `f2001_idx` (`gifter_id`),
  CONSTRAINT `f200` FOREIGN KEY (`p_payment_id`) REFERENCES `purchase_payment` (`p_payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `f2001` FOREIGN KEY (`gifter_id`) REFERENCES `gifters` (`gifter_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.purchase_receiver: ~0 rows (approximately)
/*!40000 ALTER TABLE `purchase_receiver` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_receiver` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.receivers
CREATE TABLE IF NOT EXISTS `receivers` (
  `receiver_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_fname` varchar(45) DEFAULT NULL,
  `r_lname` varchar(45) DEFAULT NULL,
  `r_address` varchar(45) DEFAULT NULL,
  `r_email` varchar(45) DEFAULT NULL,
  `r_phone` varchar(45) DEFAULT NULL,
  `r_delivery_address` varchar(100) DEFAULT NULL,
  `r_reg_date` timestamp NULL DEFAULT NULL,
  `r_password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`receiver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.receivers: ~0 rows (approximately)
/*!40000 ALTER TABLE `receivers` DISABLE KEYS */;
/*!40000 ALTER TABLE `receivers` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.receiver_cart
CREATE TABLE IF NOT EXISTS `receiver_cart` (
  `r_cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver_id` int(11) DEFAULT NULL,
  `r_event_id` int(11) DEFAULT NULL,
  `r_cart_creation_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`r_cart_id`),
  KEY `fk5_idx` (`r_event_id`),
  KEY `fk6_idx` (`receiver_id`),
  CONSTRAINT `fk5` FOREIGN KEY (`r_event_id`) REFERENCES `receiver_events` (`r_event_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk6` FOREIGN KEY (`receiver_id`) REFERENCES `receivers` (`receiver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.receiver_cart: ~0 rows (approximately)
/*!40000 ALTER TABLE `receiver_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `receiver_cart` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.receiver_events
CREATE TABLE IF NOT EXISTS `receiver_events` (
  `r_event_id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver_id` int(11) DEFAULT NULL,
  `r_event_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`r_event_id`),
  KEY `fk4_idx` (`receiver_id`),
  CONSTRAINT `fk4` FOREIGN KEY (`receiver_id`) REFERENCES `receivers` (`receiver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.receiver_events: ~0 rows (approximately)
/*!40000 ALTER TABLE `receiver_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `receiver_events` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.receiver_item
CREATE TABLE IF NOT EXISTS `receiver_item` (
  `receiver_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver_id` int(11) DEFAULT NULL,
  `r_event_id` int(11) DEFAULT NULL,
  `r_cart_id` int(11) DEFAULT NULL,
  `v_item_id` int(11) DEFAULT NULL,
  `r_item_selection_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`receiver_item_id`),
  KEY `fk7_idx` (`r_cart_id`),
  KEY `fk8_idx` (`r_event_id`),
  KEY `fk9_idx` (`receiver_id`),
  KEY `fk91_idx` (`v_item_id`),
  CONSTRAINT `fk7` FOREIGN KEY (`r_cart_id`) REFERENCES `receiver_cart` (`r_cart_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk8` FOREIGN KEY (`r_event_id`) REFERENCES `receiver_events` (`r_event_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk9` FOREIGN KEY (`receiver_id`) REFERENCES `receivers` (`receiver_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk91` FOREIGN KEY (`v_item_id`) REFERENCES `vendor_item` (`v_item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.receiver_item: ~0 rows (approximately)
/*!40000 ALTER TABLE `receiver_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `receiver_item` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.vendors
CREATE TABLE IF NOT EXISTS `vendors` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `v_fname` varchar(45) DEFAULT NULL,
  `v_lname` varchar(45) DEFAULT NULL,
  `v_companyname` varchar(45) DEFAULT NULL,
  `v_address` varchar(100) DEFAULT NULL,
  `v_email` varchar(45) DEFAULT NULL,
  `v_phone` varchar(45) DEFAULT NULL,
  `v_password` varchar(45) DEFAULT NULL,
  `v_user_id` varchar(50) DEFAULT NULL,
  `v_pic_name` varchar(50) DEFAULT NULL,
  `v_reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.vendors: ~38 rows (approximately)
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
INSERT INTO `vendors` (`vendor_id`, `v_fname`, `v_lname`, `v_companyname`, `v_address`, `v_email`, `v_phone`, `v_password`, `v_user_id`, `v_pic_name`, `v_reg_date`) VALUES
	(1, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '07065692733', '', 'VEN/2019.12.08/1', NULL, NULL),
	(2, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '07065692733', '', 'VEN/2019.12.08/2', NULL, NULL),
	(4, 'MR', 'Obi', NULL, NULL, 'obika.star@gmail.com', '07065692733', '827ccb0eea8a706c4c34a16891f84e7b', 'VEN/2019.12.09/4', NULL, NULL),
	(5, 'MR', 'Moat', NULL, NULL, 'obika.star@gmail.com', '07065692733', 'd41d8cd98f00b204e9800998ecf8427e', 'VEN/2019.12.09/5', NULL, NULL),
	(6, 'Ekene', 'Obi', NULL, NULL, 'obika.star@gmail.com', '08056754323', 'e10adc3949ba59abbe56e057f20f883e', 'VEN/2019.12.09/6', NULL, NULL),
	(7, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '07065692733', '827ccb0eea8a706c4c34a16891f84e7b', 'VEN/2019.12.10/7', NULL, NULL),
	(8, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', 'reee', '202cb962ac59075b964b07152d234b70', 'VEN/2019.12.10/8', NULL, NULL),
	(9, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '07065692733', '202cb962ac59075b964b07152d234b70', 'VEN/2019.12.10/9', NULL, NULL),
	(10, 'Ekene', '', NULL, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'VEN/2019.12.11/10', NULL, NULL),
	(11, 'Ekene', '', NULL, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'VEN/2019.12.11/11', NULL, NULL),
	(12, 'Ekene', '', NULL, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'VEN/2019.12.11/12', NULL, NULL),
	(13, 'Ekene', '', NULL, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'VEN/2019.12.11/13', NULL, NULL),
	(14, 'Ekene', '', NULL, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'VEN/2019.12.11/14', NULL, NULL),
	(15, '', '', NULL, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'VEN/2019.12.11/15', NULL, NULL),
	(16, '', '', NULL, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'VEN/2019.12.11/16', NULL, NULL),
	(17, '', '', NULL, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'VEN/2019.12.11/17', NULL, NULL),
	(18, '', '', NULL, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'VEN/2019.12.11/18', NULL, NULL),
	(19, '', '', NULL, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'VEN/2019.12.11/19', NULL, NULL),
	(20, '', '', NULL, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'VEN/2019.12.11/20', NULL, NULL),
	(21, 'Ekene', '', NULL, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'VEN/2019.12.11/21', NULL, NULL),
	(22, '', '', NULL, NULL, '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'VEN/2019.12.11/22', NULL, NULL),
	(23, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '07065692733', '81dc9bdb52d04dc20036dbd8313ed055', 'VEN/2019.12.11/23', 'vendor_images/1576431415.jpg', NULL),
	(24, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '08056754323', '202cb962ac59075b964b07152d234b70', 'VEN/2019.12.11/24', NULL, NULL),
	(25, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '07065692733', '202cb962ac59075b964b07152d234b70', 'VEN/2019.12.11/25', NULL, NULL),
	(26, 'Ekene', 'Obi', NULL, NULL, 'obika.ekene@gmail.com', '07065692733', '202cb962ac59075b964b07152d234b70', 'VEN/2019.12.11/26', NULL, NULL),
	(27, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '07065692733', 'c20ad4d76fe97759aa27a0c99bff6710', 'VEN/2019.12.11/27', NULL, NULL),
	(28, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '07065692733', '202cb962ac59075b964b07152d234b70', 'VEN/2019.12.11/28', NULL, NULL),
	(29, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '07065692733', '202cb962ac59075b964b07152d234b70', 'VEN/2019.12.11/29', NULL, NULL),
	(30, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '07065692733', '202cb962ac59075b964b07152d234b70', 'VEN/2019.12.11/30', NULL, NULL),
	(31, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '07065692733', '202cb962ac59075b964b07152d234b70', 'VEN/2019.12.11/31', NULL, NULL),
	(32, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '07065692733', '4d1b3dd962acfddf359fd19b978ae113', 'VEN/2019.12.11/32', NULL, NULL),
	(33, 'Ekene', 'rrr', NULL, NULL, 'obika.ekene@gmail.com', '08056754323', '56bd7107802ebe56c6918992f0608ec6', 'VEN/2019.12.11/33', NULL, NULL),
	(34, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '08056754323', 'c4ca4238a0b923820dcc509a6f75849b', 'VEN/2019.12.11/34', NULL, NULL),
	(35, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '08056754323', 'a8ae104615cb4e966ddb435f3e575a02', 'VEN/2019.12.11/35', NULL, NULL),
	(36, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '08033456758', '202cb962ac59075b964b07152d234b70', 'VEN/2019.12.11/36', NULL, NULL),
	(37, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '07068447186', '202cb962ac59075b964b07152d234b70', 'VEN/2019.12.12/37', NULL, NULL),
	(38, 'Ekene', 'Obika', NULL, NULL, 'obika.ekene@gmail.com', '07068447186', '202cb962ac59075b964b07152d234b70', 'VEN/2019.12.12/38', NULL, NULL),
	(39, 'Kennyshipmastermanofuiukkiiiyz', 'Sam', 'kanerrnicefishi', '15 Akin street', 'obika.ekene@gmail.com', '07065692733777', '81dc9bdb52d04dc20036dbd8313ed055', 'VEN/2019.12.14/39', NULL, NULL);
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.vendor_bank_info
CREATE TABLE IF NOT EXISTS `vendor_bank_info` (
  `vendor_id` int(11) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `account_number` varchar(20) DEFAULT NULL,
  `account_name` varchar(50) DEFAULT NULL,
  `bvn` varchar(15) DEFAULT NULL,
  `statement` varchar(50) DEFAULT NULL,
  `iban` varchar(20) DEFAULT NULL,
  `swift` varchar(20) DEFAULT NULL,
  KEY `FK1` (`vendor_id`),
  CONSTRAINT `FK1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.vendor_bank_info: ~3 rows (approximately)
/*!40000 ALTER TABLE `vendor_bank_info` DISABLE KEYS */;
INSERT INTO `vendor_bank_info` (`vendor_id`, `bank_name`, `account_number`, `account_name`, `bvn`, `statement`, `iban`, `swift`) VALUES
	(5, '', '', '', '', NULL, '', ''),
	(36, '', '0700707', 'ellelele', '00000000', NULL, '33333', '5555'),
	(39, 'BN', 'ellelele', 'ellelele', '00000000', NULL, '33333', '5555');
/*!40000 ALTER TABLE `vendor_bank_info` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.vendor_business_info
CREATE TABLE IF NOT EXISTS `vendor_business_info` (
  `vendor_id` int(11) DEFAULT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `director_name` varchar(60) DEFAULT NULL,
  `company_email` varchar(80) DEFAULT NULL,
  `company_type` enum('BN','LLC','PLC') DEFAULT NULL,
  `rc_number` varchar(15) DEFAULT NULL,
  KEY `fk40` (`vendor_id`),
  CONSTRAINT `fk40` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.vendor_business_info: ~4 rows (approximately)
/*!40000 ALTER TABLE `vendor_business_info` DISABLE KEYS */;
INSERT INTO `vendor_business_info` (`vendor_id`, `company_name`, `director_name`, `company_email`, `company_type`, `rc_number`) VALUES
	(4, 'biz', 'moat', 'moatacad@gmail.com', 'BN', '55555'),
	(6, 'biziness', 'bizer', '', '', ''),
	(36, 'biz', 'bizer', 'probs', 'BN', '1235'),
	(39, 'bizship', 'KalisaClothings', 'obiks', 'BN', '1235');
/*!40000 ALTER TABLE `vendor_business_info` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.vendor_item
CREATE TABLE IF NOT EXISTS `vendor_item` (
  `v_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) DEFAULT NULL,
  `v_cat_id` int(11) DEFAULT NULL,
  `v_item_name` varchar(45) DEFAULT NULL,
  `v_item_price` float DEFAULT NULL,
  `item_color` varchar(20) DEFAULT NULL,
  `item_qty` int(11) NOT NULL,
  `item_pic` varchar(100) DEFAULT NULL,
  `v_upload_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`v_item_id`),
  KEY `fk2_idx` (`vendor_id`),
  KEY `fk3_idx` (`v_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.vendor_item: ~0 rows (approximately)
/*!40000 ALTER TABLE `vendor_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendor_item` ENABLE KEYS */;


-- Dumping structure for table giftdatabase.vendor_select_category
CREATE TABLE IF NOT EXISTS `vendor_select_category` (
  `vendor_id` int(11) NOT NULL,
  `v_cat_id` varchar(50) DEFAULT NULL,
  `cat_creation_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table giftdatabase.vendor_select_category: ~0 rows (approximately)
/*!40000 ALTER TABLE `vendor_select_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `vendor_select_category` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
