-- --------------------------------------------------------
-- Host:                         127.0.0.1
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

-- Dumping data for table myblackpencil.class: ~0 rows (approximately)
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

-- Dumping data for table myblackpencil.notes: ~0 rows (approximately)
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;


-- Dumping structure for table myblackpencil.person
CREATE TABLE IF NOT EXISTS `person` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) unsigned NOT NULL DEFAULT '0',
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `surname` varchar(255) NOT NULL,
  `dob` date NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table myblackpencil.person: ~3 rows (approximately)
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` (`id`, `userid`, `firstname`, `middlename`, `email`, `surname`, `dob`, `state`, `city`, `postcode`, `country`, `mobileno`, `officeno`, `homeno`, `created_by`, `created_date`) VALUES
	(1, 1, 'James Ryan', NULL, 'jamesryanpatiag@yahoo.com', 'Patiag', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-09-04 16:56:24'),
	(2, 2, 'Consultant', NULL, 'consultant_1@yahoo.com', 'Consultant', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-09-05 00:41:48'),
	(3, 3, 'Consultant', NULL, 'consultant_2@yahoo.com', 'Consultant', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2016-09-05 00:42:00');
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

-- Dumping data for table myblackpencil.refunded: ~0 rows (approximately)
/*!40000 ALTER TABLE `refunded` DISABLE KEYS */;
/*!40000 ALTER TABLE `refunded` ENABLE KEYS */;


-- Dumping structure for table myblackpencil.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table myblackpencil.roles: ~4 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `code`, `name`) VALUES
	(1, 'MANAGER', 'Manager'),
	(2, 'STUDENT', 'Student'),
	(3, 'TUTOR', 'Tutor'),
	(4, 'ADMIN', 'Admin');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table myblackpencil.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `roleid` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `is_logged_in` tinyint(4) NOT NULL DEFAULT '0',
  `last_login` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_verified` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_by` bigint(20) DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table myblackpencil.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `roleid`, `username`, `password`, `is_logged_in`, `last_login`, `is_verified`, `is_active`, `created_by`, `created_date`) VALUES
	(1, 2, 'admin', '$2y$11$f3KeUr418qFCzrE7FZBt9O5Cc7kaJKbseYmRer2U3TUV3ufm5RkhS', 0, '2016-09-07 08:34:08', 0, 1, 1, '2016-09-04 16:56:24'),
	(2, 3, 'consultant_1', '$2y$11$w23MngY4VcLKk9/QVPH5zuXXMx7eIh5UybvuQe92BdHFtiuQolxre', 0, '2016-09-05 00:43:14', 0, 1, 1, '2016-09-05 00:41:48'),
	(3, 3, 'consultant_2', '$2y$11$i9Lg9ndVHH4c30VfzjwyQ.24EZdtr3tD/VOUp46Dhrgq1kleSalUa', 0, '2016-09-05 00:43:16', 0, 1, 1, '2016-09-05 00:41:59');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table myblackpencil.user_roles
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table myblackpencil.user_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
