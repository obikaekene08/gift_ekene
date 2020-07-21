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

-- Dumping database structure for joinhandsng
CREATE DATABASE IF NOT EXISTS `joinhandsng` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `joinhandsng`;


-- Dumping structure for table joinhandsng.donation
CREATE TABLE IF NOT EXISTS `donation` (
  `donation_id` int(11) NOT NULL AUTO_INCREMENT,
  `donor_reg_id` varchar(45) DEFAULT NULL,
  `ngo_reg_id` varchar(45) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `donation_date` timestamp NULL DEFAULT NULL,
  `donation_means` varchar(45) DEFAULT NULL,
  `donation_status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`donation_id`),
  KEY `fk1_idx` (`donor_reg_id`),
  KEY `fk2_idx` (`ngo_reg_id`),
  CONSTRAINT `fk1` FOREIGN KEY (`donor_reg_id`) REFERENCES `donors` (`donor_reg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk2` FOREIGN KEY (`ngo_reg_id`) REFERENCES `ngo` (`ngo_reg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table joinhandsng.donation: ~0 rows (approximately)
/*!40000 ALTER TABLE `donation` DISABLE KEYS */;
/*!40000 ALTER TABLE `donation` ENABLE KEYS */;


-- Dumping structure for table joinhandsng.donors
CREATE TABLE IF NOT EXISTS `donors` (
  `donor_id` int(11) NOT NULL AUTO_INCREMENT,
  `donor_type` varchar(45) DEFAULT NULL,
  `f_name` varchar(45) DEFAULT NULL,
  `l_name` varchar(45) DEFAULT NULL,
  `donor_email` varchar(100) DEFAULT NULL,
  `donor_phone` varchar(45) DEFAULT NULL,
  `donor_reg_id` varchar(45) DEFAULT NULL,
  `donor_reg_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`donor_id`),
  UNIQUE KEY `donor_reg_id_UNIQUE` (`donor_reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table joinhandsng.donors: ~0 rows (approximately)
/*!40000 ALTER TABLE `donors` DISABLE KEYS */;
/*!40000 ALTER TABLE `donors` ENABLE KEYS */;


-- Dumping structure for table joinhandsng.ngo
CREATE TABLE IF NOT EXISTS `ngo` (
  `ngo_id` int(11) NOT NULL AUTO_INCREMENT,
  `ngo_name` varchar(100) DEFAULT NULL,
  `ngo_start_date` timestamp NULL DEFAULT NULL,
  `ngo_office_address_1` varchar(200) DEFAULT NULL,
  `ngo_office_address_2` varchar(200) DEFAULT NULL,
  `ngo_email_1` varchar(100) DEFAULT NULL,
  `ngo_email_2` varchar(100) DEFAULT NULL,
  `ngo_phone_1` varchar(45) DEFAULT NULL,
  `ngo_phone_2` varchar(45) DEFAULT NULL,
  `ngo_reg_date` timestamp NULL DEFAULT NULL,
  `ngo_reg_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ngo_id`),
  UNIQUE KEY `ngo_reg_id_UNIQUE` (`ngo_reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table joinhandsng.ngo: ~0 rows (approximately)
/*!40000 ALTER TABLE `ngo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ngo` ENABLE KEYS */;


-- Dumping structure for table joinhandsng.ngo_details
CREATE TABLE IF NOT EXISTS `ngo_details` (
  `ngo_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `ngo_reg_id` varchar(45) DEFAULT NULL,
  `covid_obj` varchar(500) DEFAULT NULL,
  `track_record` varchar(500) DEFAULT NULL,
  `res_and_capacity` varchar(500) DEFAULT NULL,
  `finance_needs` varchar(500) DEFAULT NULL,
  `tran_and_acc_assurance` varchar(500) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `account_number` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ngo_details_id`),
  KEY `fk2_idx` (`ngo_reg_id`),
  CONSTRAINT `fk3` FOREIGN KEY (`ngo_reg_id`) REFERENCES `ngo` (`ngo_reg_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table joinhandsng.ngo_details: ~0 rows (approximately)
/*!40000 ALTER TABLE `ngo_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `ngo_details` ENABLE KEYS */;


-- Dumping structure for table joinhandsng.send_us_a_msg
CREATE TABLE IF NOT EXISTS `send_us_a_msg` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_type` varchar(45) DEFAULT NULL,
  `sender_ngo_status` varchar(45) DEFAULT NULL,
  `s_f_name` varchar(45) DEFAULT NULL,
  `s_l_name` varchar(45) DEFAULT NULL,
  `s_email` varchar(100) DEFAULT NULL,
  `s_phone` varchar(45) DEFAULT NULL,
  `msg_content` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table joinhandsng.send_us_a_msg: ~0 rows (approximately)
/*!40000 ALTER TABLE `send_us_a_msg` DISABLE KEYS */;
/*!40000 ALTER TABLE `send_us_a_msg` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
