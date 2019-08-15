-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for lunchdb_new
CREATE DATABASE IF NOT EXISTS `lunchdb_new` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lunchdb_new`;

-- Dumping structure for table lunchdb_new.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

-- Dumping data for table lunchdb_new.employees: ~61 rows (approximately)
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT IGNORE INTO `employees` (`id`, `employee_name`, `status`) VALUES
	(1, 'Abdul-Mumin Iddrisu\r', 'Active'),
	(4, 'Bernard Teye\r', 'Active'),
	(5, 'Bertha Garna\r', 'Active'),
	(6, 'Brian Anangfio\r', 'Active'),
	(7, 'Christel Derban\r', 'Active'),
	(8, 'Cletus Bekoe\r', 'Active'),
	(9, 'Daniel Achim-Owiredu\r', 'Active'),
	(10, 'Dela Ama Segbefia\r', 'Active'),
	(11, 'Dorcas Ayiki Baah\r', 'Active'),
	(12, 'Edem Klugah\r', 'Active'),
	(13, 'Edem Robin Amedzo\r', 'Active'),
	(14, 'Yvette Adounvo Atekpe', 'Active'),
	(16, 'Emmanuel Adanu\r', 'Active'),
	(17, 'Emmanuel Danso\r', 'Active'),
	(18, 'Etornam Amoako\r', 'Active'),
	(19, 'Frank Aidoo\r', 'Active'),
	(20, 'Frank Laryeah Adjei\r', 'Active'),
	(21, 'Fred Kwame Boni\r', 'Active'),
	(22, 'George Gabla\r', 'Active'),
	(23, 'Gerophine  Lartey\r', 'Active'),
	(24, 'Gideon Acheampong\r', 'Active'),
	(25, 'Grace Amankwah\r', 'Active'),
	(26, 'Hope Amegavi Kporvuvu\r', 'Active'),
	(27, 'Ikes Eyram Kunakey\r', 'Active'),
	(28, 'Janet Naa Aku Allotey\r', 'Active'),
	(29, 'Jeremiah Oluwaseyi Sami\r', 'Active'),
	(30, 'Justice Nana Ampadu\r', 'Active'),
	(32, 'Kitinita Torkornoo\r', 'Active'),
	(33, 'Kwabena Adu Boahene\r', 'Active'),
	(34, 'Linda Nyarko Asante\r', 'Active'),
	(35, 'Marcus Yorgbe\r', 'Active'),
	(36, 'Martin Korley\r', 'Active'),
	(37, 'Maurice Fouillard\r', 'Active'),
	(38, 'Mawusi Pamela Asem\r', 'Active'),
	(39, 'Maxwell Kwasi Essuman\r', 'Active'),
	(40, 'Michael Kwakwei Quartey\r', 'Active'),
	(41, 'Michael Obeng\r', 'Active'),
	(42, 'Nana Addo Obuobi\r', 'Active'),
	(43, 'Precious Emmanuel Dogbey\r', 'Active'),
	(44, 'Prince Aggrey Amissah\r', 'Active'),
	(45, 'Prince Kwame Mensah\r', 'Active'),
	(46, 'Ransford Owusu Afriyie\r', 'Active'),
	(47, 'Rebecca Asante Arthur\r', 'Active'),
	(48, 'Richard Kissi\r', 'Active'),
	(51, 'Richard Oppong Damoah\r', 'Active'),
	(52, 'Sampson Djanie\r', 'Active'),
	(53, 'Stephen Teye Adjartey\r', 'Active'),
	(55, 'Theophilus Torgbor\r', 'Active'),
	(58, 'Yvonne Lartey\r', 'Active'),
	(59, 'Emmanuel Paul', 'Active'),
	(61, 'Frederick Ntsukorkor', 'Active'),
	(62, 'Frederik Agbowotame', 'Active'),
	(65, 'Ernest Lah-Anyane', 'Active'),
	(66, 'Solomon Flomey', 'Active'),
	(70, 'Frank Nkutia', 'Active'),
	(71, 'Daniel Dibango Owusu Manu', 'Active'),
	(72, 'Annie A. Kantoh', 'Active'),
	(73, 'Angela O. Kesse', 'Active'),
	(74, 'Vera Baffour Adumatta', 'Active'),
	(75, 'Richard Ghandia', 'Active'),
	(76, 'Edward Ansong', 'Active'),
	(77, 'test', 'Inactive'),
	(78, 'test2', 'Active'),
	(79, 'test3', 'Active');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;

-- Dumping structure for table lunchdb_new.vouchers
CREATE TABLE IF NOT EXISTS `vouchers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_name` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `validityperiod_from` date NOT NULL,
  `validityperiod_to` date NOT NULL,
  `colour` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table lunchdb_new.vouchers: ~0 rows (approximately)
/*!40000 ALTER TABLE `vouchers` DISABLE KEYS */;
/*!40000 ALTER TABLE `vouchers` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
