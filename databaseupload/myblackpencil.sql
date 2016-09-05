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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table myblackpencil.class: ~11 rows (approximately)
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` (`id`, `type`, `start_date`, `end_date`, `customer_id`, `tutor_id`, `description`, `course`, `educational_level_code`, `status`, `url`, `student_username`, `student_password`, `completion_date`, `created_by`, `created_date`) VALUES
	(1, 'ONLINE-CLASS', '2016-09-01', '2016-10-08', 1, 2, 'onlineclass', 'onlineclass', 'HIGH_SCHOOL', 'COMPLETED', 'Online Class', 'onlineclass', 'onlineclass', '2016-09-05', 1, '2016-09-05 01:32:33'),
	(2, 'ONLINE-QUIZ', '2016-09-01', '2016-10-08', 1, 2, 'onlinequiz', 'onlinequiz', 'UNDERGRADUATE', 'COMPLETED', 'onlinequiz', 'onlinequiz', 'onlinequiz', '2016-09-05', 1, '2016-09-05 01:32:52'),
	(3, 'ONLINE-EXAM', '2016-09-01', '2016-09-05', 1, 3, 'onlineexam', 'onlineexam', 'HIGH_SCHOOL', 'PENDING', 'onlineexam', 'onlineexam', 'onlineexam', '0000-00-00', 1, '2016-09-05 01:33:12'),
	(4, 'ESSAY-PAPER', '2016-10-05', '2016-09-05', 1, 2, 'essaypaper', 'essaypaper', 'GRADUATE', 'REFUNDED', 'essaypaper', 'essaypaper', 'essaypaper', '0000-00-00', 1, '2016-09-05 01:33:40'),
	(5, 'PROJECT', '2016-09-27', '2016-10-08', 1, 0, 'project', 'project', 'UNDERGRADUATE', 'PENDING', 'project', 'project', 'project', '0000-00-00', 1, '2016-09-05 01:34:00'),
	(6, 'ONLINE-CLASS', '2016-09-01', '2016-10-08', 1, 0, 'sample Class', 'sample Class', 'UNDERGRADUATE', 'PENDING', 'sample Class', 'sample Class', 'sample Class', '0000-00-00', 1, '2016-09-05 13:43:40'),
	(7, 'ONLINE-QUIZ', '2016-10-06', '2016-10-07', 1, 0, 'sample quiz', 'sample quiz', 'HIGH_SCHOOL', 'PENDING', 'sample quiz', 'sample quiz', 'sample quiz', '0000-00-00', 1, '2016-09-05 13:44:07'),
	(8, 'ONLINE-EXAM', '2016-09-05', '2016-09-05', 1, 0, 'sample exam', 'sample exam', 'HIGH_SCHOOL', 'PENDING', 'sample exam', 'sample exam', 'sample exam', '0000-00-00', 1, '2016-09-05 13:44:17'),
	(9, 'ESSAY-PAPER', '2016-09-05', '2016-09-05', 1, 0, 'sample paper', 'sample paper', 'UNDERGRADUATE', 'PENDING', 'sample paper', 'sample paper', 'sample paper', '0000-00-00', 1, '2016-09-05 13:44:31'),
	(10, 'ESSAY-PAPER', '2016-09-05', '2016-09-05', 1, 0, 'sample paper', 'sample paper', 'UNDERGRADUATE', 'PENDING', 'sample paper', 'sample paper', 'sample paper', '0000-00-00', 1, '2016-09-05 13:44:49'),
	(11, 'PROJECT', '2016-09-05', '2016-09-05', 1, 0, 'sample project', 'sample project', 'HIGH_SCHOOL', 'PENDING', 'sample project', 'sample project', 'sample project', '0000-00-00', 1, '2016-09-05 13:45:25');
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- Dumping data for table myblackpencil.notes: ~44 rows (approximately)
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` (`id`, `userid`, `classid`, `message`, `fileid`, `hasAttachment`, `created_date`) VALUES
	(1, 1, 4, 'save', 0, 0, '2016-09-06 01:58:08'),
	(2, 1, 4, 'save', 0, 0, '2016-09-06 02:00:45'),
	(3, 1, 4, 'dsadsad', 0, 0, '2016-09-06 02:00:48'),
	(4, 1, 4, 'asdsad', 0, 0, '2016-09-06 02:00:49'),
	(5, 1, 4, '$(document).ready(function(){     lastElementTop = $(\'#listofstuff .anitem:last-child\').position().top ;     scrollAmount = lastElementTop - 200 ;  $(\'#listofstuff\').animate({scrollTop: scrollAmount},1000); });', 0, 0, '2016-09-06 02:01:12'),
	(6, 1, 4, 'sdfdsfds', 0, 0, '2016-09-06 02:03:06'),
	(7, 1, 4, 'sdfsdf', 0, 0, '2016-09-06 02:03:07'),
	(8, 1, 4, 'sfdsfsd', 0, 0, '2016-09-06 02:03:07'),
	(9, 1, 1, 'this is refunded', 0, 0, '2016-09-06 02:03:36'),
	(10, 1, 1, 'save', 0, 0, '2016-09-06 02:17:26'),
	(11, 1, 1, 'hello james', 0, 0, '2016-09-06 02:17:36'),
	(12, 1, 5, 'sdfdsf', 0, 0, '2016-09-06 02:27:46'),
	(13, 1, 5, 'f', 0, 0, '2016-09-06 02:27:47'),
	(14, 1, 5, 'sd', 0, 0, '2016-09-06 02:27:47'),
	(15, 1, 5, 'sdf', 0, 0, '2016-09-06 02:27:48'),
	(16, 1, 3, 'sdfdsf', 0, 0, '2016-09-06 02:29:09'),
	(17, 1, 1, 'save', 0, 0, '2016-09-06 02:30:49'),
	(18, 1, 1, 'sadsad', 0, 0, '2016-09-06 02:30:51'),
	(19, 1, 1, 'sad', 0, 0, '2016-09-06 02:30:51'),
	(20, 1, 1, 'sad', 0, 0, '2016-09-06 02:30:51'),
	(21, 1, 1, 'd', 0, 0, '2016-09-06 02:30:52'),
	(22, 1, 1, 'a', 0, 0, '2016-09-06 02:30:52'),
	(23, 1, 1, 'sa', 0, 0, '2016-09-06 02:30:52'),
	(24, 1, 1, 'sa', 0, 0, '2016-09-06 02:30:52'),
	(25, 1, 10, '1', 0, 0, '2016-09-06 02:31:08'),
	(26, 1, 10, '2', 0, 0, '2016-09-06 02:31:08'),
	(27, 1, 10, '3', 0, 0, '2016-09-06 02:31:08'),
	(28, 1, 10, '4', 0, 0, '2016-09-06 02:31:09'),
	(29, 1, 10, '5', 0, 0, '2016-09-06 02:31:09'),
	(30, 1, 10, '5', 0, 0, '2016-09-06 02:31:09'),
	(31, 1, 10, '6', 0, 0, '2016-09-06 02:31:10'),
	(32, 1, 10, '7', 0, 0, '2016-09-06 02:31:10'),
	(33, 1, 10, '8', 0, 0, '2016-09-06 02:31:10'),
	(34, 1, 10, '9', 0, 0, '2016-09-06 02:31:10'),
	(35, 1, 10, '9', 0, 0, '2016-09-06 02:31:11'),
	(36, 1, 10, '0', 0, 0, '2016-09-06 02:31:11'),
	(37, 1, 10, '1', 0, 0, '2016-09-06 02:31:12'),
	(38, 1, 10, '0', 0, 0, '2016-09-06 02:31:13'),
	(39, 1, 10, '2', 0, 0, '2016-09-06 02:31:13'),
	(40, 1, 10, '3', 0, 0, '2016-09-06 02:31:14'),
	(41, 1, 10, '4', 0, 0, '2016-09-06 02:31:14'),
	(42, 1, 10, '5', 0, 0, '2016-09-06 02:31:14'),
	(43, 1, 10, '6', 0, 0, '2016-09-06 02:31:14'),
	(44, 1, 10, '6', 0, 0, '2016-09-06 02:31:15');
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
	(1, 2, 'admin', '$2y$11$f3KeUr418qFCzrE7FZBt9O5Cc7kaJKbseYmRer2U3TUV3ufm5RkhS', 0, '2016-09-06 08:08:30', 0, 1, 1, '2016-09-04 16:56:24'),
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
