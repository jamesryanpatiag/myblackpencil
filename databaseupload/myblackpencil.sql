-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.13-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for myblackpencil
CREATE DATABASE IF NOT EXISTS `myblackpencil` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `myblackpencil`;


-- Dumping structure for table myblackpencil.class
CREATE TABLE IF NOT EXISTS `class` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL DEFAULT '0000-00-00',
  `start_date` date NOT NULL DEFAULT '0000-00-00',
  `end_date` date NOT NULL DEFAULT '0000-00-00',
  `customer_id` bigint(20) NOT NULL COMMENT 'person_id of student',
  `tutor_id` bigint(20) NOT NULL COMMENT 'person_id of tutor',
  `description` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `educational_level_code` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `student_username` varchar(50) NOT NULL,
  `student_password` varchar(50) NOT NULL,
  `completion_date` date NOT NULL DEFAULT '0000-00-00',
  `created_by` bigint(20) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table myblackpencil.class: ~4 rows (approximately)
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
/*!40000 ALTER TABLE `class` ENABLE KEYS */;


-- Dumping structure for table myblackpencil.notes
CREATE TABLE IF NOT EXISTS `notes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `classid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `message` varchar(255) NOT NULL,
  `fileid` bigint(20) NOT NULL,
  `hasAttachment` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table myblackpencil.notes: ~25 rows (approximately)
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;


-- Dumping structure for table myblackpencil.person
CREATE TABLE IF NOT EXISTS `person` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `gender` set('Male','Female') DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `mobileno` varchar(255) DEFAULT NULL,
  `officeno` varchar(255) DEFAULT NULL,
  `homeno` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table myblackpencil.person: ~4 rows (approximately)
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` (`id`, `userid`, `firstname`, `middlename`, `gender`, `email`, `surname`, `dob`, `state`, `city`, `postcode`, `country`, `mobileno`, `officeno`, `homeno`, `created_by`, `created_date`) VALUES
	(1, 1, 'admin', '', 'Male', 'jamesryanpatiag@gmail.com', 'admin', '2016-09-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-09-17 08:50:46'),
	(2, 2, 'tutor_1', 'tutor_1', 'Male', 'tutor_1@gmail.com', 'tutor_1', '2016-09-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-09-18 17:16:02'),
	(3, 3, 'manager', 'manager', 'Female', 'manager@manager.com', 'manager', '2016-09-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-09-18 17:39:38'),
	(4, 4, 'student', 'student', 'Male', 'student_1@yahoo.com', 'student', '2016-09-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-09-18 17:53:25');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;


-- Dumping structure for table myblackpencil.refunded
CREATE TABLE IF NOT EXISTS `refunded` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `classid` bigint(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `refunded_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table myblackpencil.refunded: ~1 rows (approximately)
/*!40000 ALTER TABLE `refunded` DISABLE KEYS */;
/*!40000 ALTER TABLE `refunded` ENABLE KEYS */;


-- Dumping structure for table myblackpencil.storedfiles
CREATE TABLE IF NOT EXISTS `storedfiles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `referenceid` bigint(20) DEFAULT '0',
  `file_category` varchar(50) DEFAULT '0',
  `stored_file` blob,
  `content_type` varchar(50) DEFAULT NULL,
  `filename` varchar(255) NOT NULL DEFAULT '0',
  `uploaded_by` bigint(20) NOT NULL DEFAULT '0',
  `uploaded_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table myblackpencil.storedfiles: ~1 rows (approximately)
/*!40000 ALTER TABLE `storedfiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `storedfiles` ENABLE KEYS */;


-- Dumping structure for table myblackpencil.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `is_logged_in` tinyint(4) NOT NULL DEFAULT '0',
  `last_login` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_verified` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_by` bigint(20) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table myblackpencil.user: ~4 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password`, `is_logged_in`, `last_login`, `is_verified`, `is_active`, `created_by`, `role`, `created_date`) VALUES
	(1, 'admin', '$2y$11$7NQUHZjoDmSAzF.l4sjqkOh52Pu7dKHXEaAEmG6dqlqKlNKkSzWwS', 0, '2016-09-19 04:06:26', 1, 1, 1, 'ADMINISTRATOR', '2016-09-17 08:50:46'),
	(2, 'tutor_1', '$2y$11$mZH8FHkv3xj/PKyRyxxBwOahgVVpEXmK/1dEP57KIzcM8Qt22xIhe', 0, '2016-09-18 05:52:13', 1, 1, 1, 'TUTOR', '2016-09-18 17:16:02'),
	(3, 'manager', '$2y$11$vRrZuEgNEMXuMqS/raggUep84DB3vwDADVFkAagJNCTrKYfRYLfke', 0, '2016-09-18 05:39:57', 1, 1, 1, 'MANAGER', '2016-09-18 17:39:38'),
	(4, 'student_1', '$2y$11$D5RJ1Rvb/7m5sPLkrcQYKug6IBAfNy1mwW8HDZNuzGFpz340gvgr6', 0, '2016-09-19 05:11:40', 1, 1, 1, 'STUDENT', '2016-09-18 17:53:25');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
