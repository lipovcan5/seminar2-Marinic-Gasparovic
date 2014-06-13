/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.6.11-log : Database - smjestaj
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`smjestaj` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `smjestaj`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prezime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `admin` */

insert  into `admin`(`id`,`username`,`password`,`ime`,`prezime`,`mail`) values (3,'admin','21232f297a57a5a743894a0e4a801fc3','Ivan','Marko','imarinic@tvz.hr');

/*Table structure for table `hranapice` */

DROP TABLE IF EXISTS `hranapice`;

CREATE TABLE `hranapice` (
  `idKorisnika` int(11) NOT NULL,
  `blagavaonica` tinyint(1) DEFAULT NULL,
  `kuhinjskiStol` tinyint(1) DEFAULT NULL,
  `pocnica` tinyint(1) DEFAULT NULL,
  `toster` tinyint(1) DEFAULT NULL,
  `rostilj` tinyint(1) DEFAULT NULL,
  `kuhaloZaVodu` tinyint(1) DEFAULT NULL,
  `miniBar` tinyint(1) DEFAULT NULL,
  `kuhinja` tinyint(1) DEFAULT NULL,
  `mikrovalna` tinyint(1) DEFAULT NULL,
  `hladnjak` tinyint(1) DEFAULT NULL,
  `aparatZaKavu` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idKorisnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `hranapice` */

insert  into `hranapice`(`idKorisnika`,`blagavaonica`,`kuhinjskiStol`,`pocnica`,`toster`,`rostilj`,`kuhaloZaVodu`,`miniBar`,`kuhinja`,`mikrovalna`,`hladnjak`,`aparatZaKavu`) values (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,1,1,0,0,0,0,0,0,0,0,0),(6,0,0,0,0,0,0,0,0,0,0,0),(7,0,0,1,0,0,0,0,0,0,0,0),(33,0,0,0,0,0,0,0,0,0,0,0),(34,1,0,1,0,1,0,1,0,1,0,1),(35,1,1,1,1,1,1,1,0,0,0,0),(37,0,0,0,0,0,0,0,0,0,0,0),(39,0,0,0,0,1,0,0,0,0,0,0),(40,0,0,0,0,0,0,0,0,0,0,0),(41,0,0,0,0,0,0,0,0,0,0,0);

/*Table structure for table `korisnici` */

DROP TABLE IF EXISTS `korisnici`;

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `korisnici_ibfk_1` FOREIGN KEY (`id`) REFERENCES `oglas` (`idKorisnik`),
  CONSTRAINT `korisnici_ibfk_2` FOREIGN KEY (`id`) REFERENCES `sadrzajsobe` (`idKorisnika`),
  CONSTRAINT `korisnici_ibfk_3` FOREIGN KEY (`id`) REFERENCES `hranapice` (`idKorisnika`),
  CONSTRAINT `korisnici_ibfk_4` FOREIGN KEY (`id`) REFERENCES `kupaonica` (`idKorisnika`),
  CONSTRAINT `korisnici_ibfk_5` FOREIGN KEY (`id`) REFERENCES `mediji` (`idKorisnika`),
  CONSTRAINT `korisnici_ibfk_6` FOREIGN KEY (`id`) REFERENCES `vanjskidio` (`idKorisnika`),
  CONSTRAINT `korisnici_ibfk_7` FOREIGN KEY (`id`) REFERENCES `slike` (`idKorisnika`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `korisnici` */

insert  into `korisnici`(`id`,`ime`,`prezime`,`username`,`password`,`mail`) values (2,'Marko','Gasparovic','marko','c28aa76990994587b0e907683792297c','marko@gmail.com'),(5,'matija','martiniÄ‡','matija','76a03451c89de24c2b6a18dc62d93f38','matija@gmail.com'),(6,'Ivan','Matanic','ivan','96088879aefc1e9b20f4f61e1d082500','matanic@gmail.com'),(7,'dominik','garic','garic','13367073ebc1d96aded0a75055af4e7d','garic@gmail.com');

/*Table structure for table `kupaonica` */

DROP TABLE IF EXISTS `kupaonica`;

CREATE TABLE `kupaonica` (
  `idKorisnika` int(11) NOT NULL,
  `kada` tinyint(1) DEFAULT NULL,
  `bide` tinyint(1) DEFAULT NULL,
  `tus` tinyint(1) DEFAULT NULL,
  `kupaonica` tinyint(1) DEFAULT NULL,
  `susiloZaKosu` tinyint(1) DEFAULT NULL,
  `sauna` tinyint(1) DEFAULT NULL,
  `wc` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idKorisnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `kupaonica` */

insert  into `kupaonica`(`idKorisnika`,`kada`,`bide`,`tus`,`kupaonica`,`susiloZaKosu`,`sauna`,`wc`) values (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,0,0,0,0,0,0,0),(6,0,0,0,0,0,0,0),(7,0,0,0,0,0,0,0),(33,0,0,0,0,0,0,0),(34,0,0,0,0,0,0,0),(35,0,0,1,1,1,1,1),(37,0,0,0,0,0,0,0),(39,1,1,0,0,0,0,0),(40,0,0,0,0,0,0,0),(41,0,0,0,0,0,0,0);

/*Table structure for table `mediji` */

DROP TABLE IF EXISTS `mediji`;

CREATE TABLE `mediji` (
  `idKorisnika` int(11) NOT NULL,
  `racunalo` tinyint(1) DEFAULT NULL,
  `iPad` tinyint(1) DEFAULT NULL,
  `igracaKonzola` tinyint(1) DEFAULT NULL,
  `laptop` tinyint(1) DEFAULT NULL,
  `kabelTv` tinyint(1) DEFAULT NULL,
  `cdUredaj` tinyint(1) DEFAULT NULL,
  `dvdUredaj` tinyint(1) DEFAULT NULL,
  `faks` tinyint(1) DEFAULT NULL,
  `lcdTv` tinyint(1) DEFAULT NULL,
  `tv` tinyint(1) DEFAULT NULL,
  `radio` tinyint(1) DEFAULT NULL,
  `satelitTv` tinyint(1) DEFAULT NULL,
  `telefon` tinyint(1) DEFAULT NULL,
  `videoUredaj` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idKorisnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mediji` */

insert  into `mediji`(`idKorisnika`,`racunalo`,`iPad`,`igracaKonzola`,`laptop`,`kabelTv`,`cdUredaj`,`dvdUredaj`,`faks`,`lcdTv`,`tv`,`radio`,`satelitTv`,`telefon`,`videoUredaj`) values (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,1,0,0,1,1,1,0,0,0,0,0,0,0,0),(6,1,1,1,1,1,1,1,0,0,0,0,0,0,0),(7,1,0,1,1,0,0,0,0,0,0,0,0,0,0),(33,0,0,0,0,0,0,0,1,0,0,0,0,0,0),(34,0,1,0,1,0,1,0,1,0,1,0,1,0,1),(35,1,1,1,1,1,1,1,1,1,1,1,1,1,1),(37,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(39,0,0,1,1,1,0,0,0,0,0,0,0,0,0),(40,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(41,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

/*Table structure for table `mjesta` */

DROP TABLE IF EXISTS `mjesta`;

CREATE TABLE `mjesta` (
  `idMjesto` int(11) NOT NULL AUTO_INCREMENT,
  `nazivMjesto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postBr` int(11) DEFAULT NULL,
  `idZupanija` int(11) NOT NULL,
  PRIMARY KEY (`idMjesto`),
  KEY `idZupanija` (`idZupanija`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mjesta` */

insert  into `mjesta`(`idMjesto`,`nazivMjesto`,`postBr`,`idZupanija`) values (1,'Zagreb',10000,1),(5,'Slunj',47240,2),(6,'Split',58000,3),(7,'Dubrovnik',20000,4),(8,'LipovaÄa',47245,0),(9,'LaÄ‘evac',47240,0),(10,'Smoljanac',53231,0);

/*Table structure for table `oglas` */

DROP TABLE IF EXISTS `oglas`;

CREATE TABLE `oglas` (
  `idKorisnik` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kratkiOpis` mediumtext COLLATE utf8_unicode_ci,
  `dugiOpis` text COLLATE utf8_unicode_ci,
  `cijena` int(11) NOT NULL,
  `cValutaId` int(11) NOT NULL,
  `mjestoId` int(11) NOT NULL,
  `brojOsoba` int(11) DEFAULT NULL,
  `vrstaSmjestajaId` int(11) NOT NULL,
  `naslovEN` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kratkiOpisEN` mediumtext COLLATE utf8_unicode_ci,
  `dugiOpisEN` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`idKorisnik`,`cValutaId`,`mjestoId`,`vrstaSmjestajaId`),
  KEY `mjestoId` (`mjestoId`),
  KEY `cValutaId` (`cValutaId`),
  KEY `vrstaSmjestajaId` (`vrstaSmjestajaId`),
  CONSTRAINT `oglas_ibfk_2` FOREIGN KEY (`mjestoId`) REFERENCES `mjesta` (`idMjesto`),
  CONSTRAINT `oglas_ibfk_3` FOREIGN KEY (`cValutaId`) REFERENCES `valuta` (`idValuta`),
  CONSTRAINT `oglas_ibfk_4` FOREIGN KEY (`vrstaSmjestajaId`) REFERENCES `smjestaj` (`idSmjestaj`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `oglas` */

insert  into `oglas`(`idKorisnik`,`naslov`,`kratkiOpis`,`dugiOpis`,`cijena`,`cValutaId`,`mjestoId`,`brojOsoba`,`vrstaSmjestajaId`,`naslovEN`,`kratkiOpisEN`,`dugiOpisEN`) values (2,'Kuca Marinic','Nije blizo centra','Jako lijpo mjesto u blizini grada s pogledom na more i planine',150,2,5,2,1,'House Marinic','from the main road','same text'),(3,'Sebalj','nista\r\n',NULL,500,2,1,1,1,NULL,NULL,NULL),(4,'sobe martiniÄ‡','naleze se u blizini grada','jako lijepo jesto',0,1,1,0,1,'rooms martiniÄ‡','in the main of the city',''),(5,'sobe martiniÄ‡','naleze se u blizini grada','jako blizo centra',100,2,5,3,2,'rooms martiniÄ‡','in the main of the city','beautiful place'),(6,'KuÄ‡a MataniÄ‡','blizu plaÅ¾e','jako blizu plaÅ¾e',400,2,7,5,1,'House MataniÄ‡','near the beach','very close to the beach'),(7,'Sobe GariÄ‡','neki tekst','skldafjskldjf',150,1,1,5,2,'Rooms GariÄ‡','text','lkjdsflksjdflksdj');

/*Table structure for table `sadrzajsobe` */

DROP TABLE IF EXISTS `sadrzajsobe`;

CREATE TABLE `sadrzajsobe` (
  `idKorisnika` int(11) NOT NULL,
  `susiloZaRublje` tinyint(1) DEFAULT NULL,
  `privatniBazen` tinyint(1) DEFAULT NULL,
  `garderoba` tinyint(1) DEFAULT NULL,
  `kamin` tinyint(1) DEFAULT NULL,
  `ventilator` tinyint(1) DEFAULT NULL,
  `grijanje` tinyint(1) DEFAULT NULL,
  `glacalo` tinyint(1) DEFAULT NULL,
  `perilicaRublja` tinyint(1) DEFAULT NULL,
  `parketniPod` tinyint(1) DEFAULT NULL,
  `radniStol` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idKorisnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sadrzajsobe` */

insert  into `sadrzajsobe`(`idKorisnika`,`susiloZaRublje`,`privatniBazen`,`garderoba`,`kamin`,`ventilator`,`grijanje`,`glacalo`,`perilicaRublja`,`parketniPod`,`radniStol`) values (1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,1,1,1,1,1,1,1,1,1,0),(5,1,1,1,1,0,1,0,0,0,0),(6,1,1,1,1,1,1,1,1,1,1),(7,1,1,1,0,0,0,0,0,0,0),(30,1,1,0,0,1,0,1,0,0,0),(32,0,0,0,0,1,0,0,0,0,0),(33,0,0,0,1,0,0,0,0,0,0),(34,1,0,1,0,1,0,1,0,1,0),(35,1,1,1,1,1,1,1,1,1,1),(36,0,0,0,0,0,0,0,0,0,0),(37,0,0,0,0,0,0,0,0,0,0),(38,0,0,0,0,0,0,0,0,0,0),(39,1,1,1,1,0,0,0,0,0,0),(40,0,0,0,0,0,0,0,0,0,0),(41,0,0,0,0,0,0,0,0,0,0);

/*Table structure for table `slike` */

DROP TABLE IF EXISTS `slike`;

CREATE TABLE `slike` (
  `idKorisnika` int(11) NOT NULL,
  `slika1` text COLLATE utf8_unicode_ci,
  `slika2` text COLLATE utf8_unicode_ci,
  `slika3` text COLLATE utf8_unicode_ci,
  `slika4` text COLLATE utf8_unicode_ci,
  `slika5` text COLLATE utf8_unicode_ci,
  `slika6` text COLLATE utf8_unicode_ci,
  `slika7` text COLLATE utf8_unicode_ci,
  `slika8` text COLLATE utf8_unicode_ci,
  `slika9` text COLLATE utf8_unicode_ci,
  `slika10` text COLLATE utf8_unicode_ci,
  `slika11` text COLLATE utf8_unicode_ci,
  `slika12` text COLLATE utf8_unicode_ci,
  `slika13` text COLLATE utf8_unicode_ci,
  `slika14` text COLLATE utf8_unicode_ci,
  `slika15` text COLLATE utf8_unicode_ci,
  `slika16` text COLLATE utf8_unicode_ci,
  `slika17` text COLLATE utf8_unicode_ci,
  `slika18` text COLLATE utf8_unicode_ci,
  `slika19` text COLLATE utf8_unicode_ci,
  `slika20` text COLLATE utf8_unicode_ci,
  `mslika1` text COLLATE utf8_unicode_ci,
  `mslika2` text COLLATE utf8_unicode_ci,
  `mslika3` text COLLATE utf8_unicode_ci,
  `mslika4` text COLLATE utf8_unicode_ci,
  `mslika5` text COLLATE utf8_unicode_ci,
  `mslika6` text COLLATE utf8_unicode_ci,
  `mslika7` text COLLATE utf8_unicode_ci,
  `mslika8` text COLLATE utf8_unicode_ci,
  `mslika9` text COLLATE utf8_unicode_ci,
  `mslika10` text COLLATE utf8_unicode_ci,
  `mslika11` text COLLATE utf8_unicode_ci,
  `mslika12` text COLLATE utf8_unicode_ci,
  `mslika13` text COLLATE utf8_unicode_ci,
  `mslika14` text COLLATE utf8_unicode_ci,
  `mslika15` text COLLATE utf8_unicode_ci,
  `mslika16` text COLLATE utf8_unicode_ci,
  `mslika17` text COLLATE utf8_unicode_ci,
  `mslika18` text COLLATE utf8_unicode_ci,
  `mslika19` text COLLATE utf8_unicode_ci,
  `mslika20` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`idKorisnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `slike` */

insert  into `slike`(`idKorisnika`,`slika1`,`slika2`,`slika3`,`slika4`,`slika5`,`slika6`,`slika7`,`slika8`,`slika9`,`slika10`,`slika11`,`slika12`,`slika13`,`slika14`,`slika15`,`slika16`,`slika17`,`slika18`,`slika19`,`slika20`,`mslika1`,`mslika2`,`mslika3`,`mslika4`,`mslika5`,`mslika6`,`mslika7`,`mslika8`,`mslika9`,`mslika10`,`mslika11`,`mslika12`,`mslika13`,`mslika14`,`mslika15`,`mslika16`,`mslika17`,`mslika18`,`mslika19`,`mslika20`) values (0,'slike/matija/',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1,'1.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'images/thumb1.jpg','images/thumb2.jpg','images/thumb3.jpg','images/thumb4.jpg','images/thumb5.jpg','images/thumb6.jpg','images/thumb7.jpg','images/thumb8.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'images/2.jpg','images/slika1.jpg','images/slika2.jpg','images/slika3.jpg','images/slika4.jpg','images/slika5.jpg','images/slika6.jpg','images/slika7.jpg','images/slika4.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'images/thumb1.jpg','images/thumb2.jpg','images/thumb3.jpg','images/thumb4.jpg','images/thumb5.jpg','images/thumb6.jpg','images/thumb7.jpg','images/thumb8.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'1.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'1.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'slike/5/slika3.jpg','slike/5/slika5.jpg','slike/5/slika6.jpg','slike/5/slika7.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'slike/6/1.jpg','slike/6/slika7.jpg','slike/6/slika5.jpg','slike/6/4.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'slike/7/2.jpg','slike/7/slika6.jpg','slike/7/slika8.jpg','slike/7/slika3.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,'slike/34/back.jpg','slike/34/back.png','slike/34/menadz.jpg','slike/34/menadz.png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,'slike/35/IMG_8026.JPG','slike/35/IMG_8002.JPG','slike/35/IMG_8007.PNG','slike/35/IMG_8009.JPG',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,'slike/37/','slike/37/','slike/37/','slike/37/',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(39,'slike/39/17642008.jpg','slike/39/18540388.jpg','slike/39/18540398 (1).jpg','slike/39/18540398.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(40,'slike/40/','slike/40/','slike/40/','slike/40/',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(41,'slike/41/','slike/41/','slike/41/','slike/41/',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `smjestaj` */

DROP TABLE IF EXISTS `smjestaj`;

CREATE TABLE `smjestaj` (
  `idSmjestaj` int(11) NOT NULL AUTO_INCREMENT,
  `nazivSmjestaj` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idSmjestaj`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `smjestaj` */

insert  into `smjestaj`(`idSmjestaj`,`nazivSmjestaj`) values (1,'Apartman'),(2,'Privatni smjestaj');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prezime` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`ime`,`prezime`,`username`,`password`,`mail`) values (2,'Marko','GasparoviÄ‡','marko','c28aa76990994587b0e907683792297c',NULL),(4,'Ivan','MariniÄ‡','ivan','2c42e5cf1cdbafea04ed267018ef1511','lipovcan5@gmail.com'),(5,'Matija ','MartiniÄ‡','matija','76a03451c89de24c2b6a18dc62d93f38',NULL),(6,'Katarina','BariÄ‡','katarina','9f079470c712a3dc83c065c30b4a9905',NULL),(9,'Dario','Ferderber','dario','8a49317e060e23bb86f9225ca581e0a9',NULL),(10,'Pero','PeriÄ‡','pero','e0930567dc04aa6771e01634e7733fcd',NULL),(12,'garic','garic','garic','13367073ebc1d96aded0a75055af4e7d',NULL),(15,'ico','cio','ico','65f034c0f853471ed478ceb34164523b',NULL),(16,'smdnfb','smdnbf','5','e4da3b7fbbce2345d7772b0674a318d5','lipovcan5@gmail.com'),(17,'marko','amrko','asd','7815696ecbf1c96e6894b779456d330e','sdf@gmail.com'),(18,'sdf','sdfsfd','sadfsafd','912ec803b2ce49e4a541068d495ab570','sadf');

/*Table structure for table `valuta` */

DROP TABLE IF EXISTS `valuta`;

CREATE TABLE `valuta` (
  `idValuta` int(11) NOT NULL AUTO_INCREMENT,
  `imeValute` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tecaj` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`idValuta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `valuta` */

insert  into `valuta`(`idValuta`,`imeValute`,`tecaj`) values (1,'EUR','8'),(2,'KUNA','1');

/*Table structure for table `vanjskidio` */

DROP TABLE IF EXISTS `vanjskidio`;

CREATE TABLE `vanjskidio` (
  `idKorisnika` int(11) NOT NULL,
  `balkon` tinyint(1) DEFAULT NULL,
  `terasa` tinyint(1) DEFAULT NULL,
  `pogledNaMore` tinyint(1) DEFAULT NULL,
  `pogledNaJezero` tinyint(1) DEFAULT NULL,
  `pogledNaBazen` tinyint(1) DEFAULT NULL,
  `pogledNaPlaninu` tinyint(1) DEFAULT NULL,
  `pogledNaGrad` tinyint(1) DEFAULT NULL,
  `pogledNaRijeku` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idKorisnika`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `vanjskidio` */

insert  into `vanjskidio`(`idKorisnika`,`balkon`,`terasa`,`pogledNaMore`,`pogledNaJezero`,`pogledNaBazen`,`pogledNaPlaninu`,`pogledNaGrad`,`pogledNaRijeku`) values (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,0,0,0,0,0,0,0,0),(6,0,0,0,0,0,0,0,0),(7,0,0,0,0,0,0,0,0),(33,0,0,0,0,0,0,0,0),(34,1,0,1,0,1,0,1,0),(35,0,1,1,1,1,0,0,0),(37,0,0,0,0,0,0,0,0),(39,0,1,0,0,0,0,0,0),(40,0,0,0,0,0,0,0,0),(41,0,0,0,0,0,0,0,0);

/*Table structure for table `zupanije` */

DROP TABLE IF EXISTS `zupanije`;

CREATE TABLE `zupanije` (
  `id` int(11) NOT NULL,
  `nazivZupanija` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `zupanije` */

insert  into `zupanije`(`id`,`nazivZupanija`) values (1,'Grad zagreb'),(2,'Karlovačka'),(3,'Splitsko-dalmatinska'),(4,'Dubrovačko-neretvanska');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
