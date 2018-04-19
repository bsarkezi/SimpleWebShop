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

/*Data for the table `artikli` */

insert  into `artikli`(`id`,`naziv`,`sifra`,`vrsta`,`slika`,`opis`,`cijena`,`arhiviranje`) values 
(1,'AMD Ryzen 5 1600','AMDJIJQIIJS','Procesor','../../uploads/ryzen.jpg','AMD Ryzen 5 1600 procesor',1600.00,0),
(2,'NZXT H440','HAKLQZQGAL','Kućište','../../uploads/h440.png','NZXT H440 kućište',700.00,0),
(3,'Intel Core i7 7700K','HAT55190SHH','Procesor','../../uploads/yM8p1.jpg','Intelov i7 7700K procesor. Otključan, bez hladnjaka, 4 jezgre, 8 threadova, 4,20 GHz',2800.00,0),
(4,'AMD Radeon RX460','HHA5431APL','Grafička kartica','../../uploads/rx460.jpg','Grafička kartica AMD Radeon RX460 s 2GB GDDR5 video memorije',847.51,1),
(5,'Fractal Design Define R5','HHTRYG551PL','Kućište','../../uploads/defineR5.jpg','Mid-tower kućište s ugrađenom zvučnom izolacijom',850.00,0),
(6,'Intel Core i3 6100','INTAPPQ531L','Procesor','../../uploads/download.jpg','Intelov dvojezgreni procesor s hyperthreadingom, 3,70GHz, socket 1151',849.99,0),
(7,'Intel Pentium G4560','INTSGT1NSIQ','Procesor','../../uploads/19-117-743-Z01.jpg','Intel Pentium G4560 procesor',400.00,0),
(8,'GPU 1','JDJHSJDJDH','Grafička kartica','../../uploads/14-137-023-01.jpg','Opis proizvoda',1500.00,0),
(9,'Geforce GTX 1070','JH81MNZQG','Grafička kartica','../../uploads/gtx1070.png','Nvidia GTX 1070 grafička kartica',3500.00,0),
(10,'Corsair H110i','JSNJ1NKIQA','Hladnjak za CPU','../../uploads/78462-623445-cropped-full.jpg','Vodeno hlađenje za procesor Corsair H110i.',1200.00,0),
(11,'Corsair TX550','JY181J9JAS1S','Napajanje','../../uploads/corsair_tx550.jpg','Corsair TX550 semi-modular napajanje, 550W, 80+ gold.',600.00,0),
(12,'Intel SSD 200GB','KOQKJISJ12','Tvrdi disk','../../uploads/intel-SSD.png','Intel SSD 200GB',800.00,0),
(13,'AMD Ryzen 5 1400','KSJAHJQIIQ','Procesor','../../uploads/ryzen.jpg','AMD Ryzen 5 1400 procesor',1400.00,0),
(14,'MSI RX470','NA1NIJJANU1','Grafička kartica','../../uploads/14-137-023-01.jpg','MSI RX 480 grafička kartica',2000.00,0),
(15,'Geforce GTX 1060','SJSJ919SN','Grafička kartica','../../uploads/GeForce_GTX_1060_Front.png','Nvidia Geforce GTX 1060 grafička kartica',2200.00,0),
(16,'Samsung EVO 960 1TB','SMNUS1191Z','Tvrdi disk','../../uploads/SSD_Samsung_thumb800.jpg','Samsung EVO 960 1TB tvrdi disk za pohranu podataka.',2000.00,0);

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

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`pass`,`ime`,`razina`) values 
(1,'admin','8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','Administrator',0),
(2,'lorem','3400bb495c3f8c4c3483a44c6bc1a92e9d94406db75a6f27dbccc11c76450d8a','lorem',1),
(3,'lorem1','3400bb495c3f8c4c3483a44c6bc1a92e9d94406db75a6f27dbccc11c76450d8a','lorem1',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
