/*
SQLyog Community v12.5.0 (64 bit)
MySQL - 10.1.21-MariaDB : Database - ducan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ducan` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_croatian_mysql561_ci */;

USE `ducan`;

/*Table structure for table `artikli` */

DROP TABLE IF EXISTS `artikli`;

CREATE TABLE `artikli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) COLLATE cp1250_croatian_ci DEFAULT NULL,
  `sifra` varchar(45) COLLATE cp1250_croatian_ci NOT NULL,
  `vrsta` varchar(30) COLLATE cp1250_croatian_ci DEFAULT NULL,
  `slika` varchar(45) COLLATE cp1250_croatian_ci DEFAULT NULL,
  `opis` text COLLATE cp1250_croatian_ci,
  `cijena` decimal(10,2) DEFAULT NULL,
  `arhiviranje` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`,`sifra`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_croatian_mysql561_ci DEFAULT NULL,
  `pass` text COLLATE utf8_croatian_mysql561_ci,
  `ime` varchar(45) COLLATE utf8_croatian_mysql561_ci DEFAULT NULL,
  `razina` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_mysql561_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
