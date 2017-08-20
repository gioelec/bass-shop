CREATE DATABASE  IF NOT EXISTS `bass_shop` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bass_shop`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: bass_shop
-- ------------------------------------------------------
-- Server version	5.6.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acquisti`
--

DROP TABLE IF EXISTS `acquisti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acquisti` (
  `idCliente` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  `idAcquisto` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantita` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idAcquisto`),
  KEY `idEsca_idx` (`idItem`),
  KEY `idCliente_idx` (`idCliente`),
  CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `clienti` (`idclienti`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idEsca` FOREIGN KEY (`idItem`) REFERENCES `items` (`idItem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acquisti`
--

LOCK TABLES `acquisti` WRITE;
/*!40000 ALTER TABLE `acquisti` DISABLE KEYS */;
INSERT INTO `acquisti` VALUES (1,1,1,'2017-08-17 11:59:04',1),(1,2,2,'2017-08-17 11:59:04',1),(1,3,3,'2017-08-17 11:59:04',1),(1,2,4,'2017-08-17 11:59:04',1),(1,3,5,'2017-08-17 11:59:04',1),(1,3,6,'2017-08-17 11:59:04',1),(1,4,7,'2017-08-17 11:59:04',1),(1,4,8,'2017-08-17 11:59:04',1),(1,4,9,'2017-08-17 11:59:04',1),(1,4,10,'2017-08-17 11:59:04',1),(1,2,11,'2017-08-17 11:59:04',1),(1,2,12,'2017-08-17 11:59:04',1);
/*!40000 ALTER TABLE `acquisti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clienti`
--

DROP TABLE IF EXISTS `clienti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clienti` (
  `idclienti` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `livello` int(1) DEFAULT '0',
  `nome` varchar(45) NOT NULL,
  `cognome` varchar(45) NOT NULL,
  PRIMARY KEY (`idclienti`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clienti`
--

LOCK TABLES `clienti` WRITE;
/*!40000 ALTER TABLE `clienti` DISABLE KEYS */;
INSERT INTO `clienti` VALUES (1,'pippo','dsfsf@gmail.com','pippo',1,'pippo','pippo'),(8,'sdfdfdd','gioelecarignani@gmail.com','dddddddddd',0,'Gioele','Carignani'),(14,'gggggg','gggggg@kk.mmm','sssssssss',0,'hhhhh','hhhhhhh'),(17,'ssasddfff','gioelnani@gmail.com','wwwwwwwwwwww',0,'Gioele','Carignani'),(18,'sssssgfgfd','gioelecarigndssssani@gmail.com','ssssssssssss',0,'Gioele','Carignani'),(19,'gioelec','wwew@gmail.com','gioelec',0,'gioele','gioele'),(20,'lorenzo','fgfdgd@gmail.com','lorenzo',0,'Gioele','Carignani'),(21,'rrrrrrrrrr','gioelecarignani@gmailasas.com','rrrrrrrrrrrrrrrrr',0,'Gioele','Carignani'),(22,'pippodddd','gioelerignani@gmail.com','ddddddddddd',0,'Gioele','Carignani'),(23,'wwwwwww','gioelecawwewwni@gmail.com','wwwwwwwwww',0,'Gioele','Carignani'),(24,'ghjkiyre','gioelecarigllni@gmail.com','fdgdfgdgfd',0,'Gioele','Carignani'),(25,'ddfdfds','ee@gmail.com','aaaaaaaaaaaaaa',0,'ddddddddd','dddddddd'),(26,'sgdfghf','gioelei@gmail.com','gfhfhdd',0,'Gioele','Carignani'),(27,'sdsdsddf','gioenani@gmail.com','aaaaaaa',0,'Gioele','Carignani'),(28,'dfsfsdfsaz','gioelecarissgnani@gmail.co','aaaaaaaaaaaaaa',0,'arsfdsad','Carignani');
/*!40000 ALTER TABLE `clienti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `escheditendenza`
--

DROP TABLE IF EXISTS `escheditendenza`;
/*!50001 DROP VIEW IF EXISTS `escheditendenza`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `escheditendenza` (
  `idEsca` tinyint NOT NULL,
  `quanti` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `idItem` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(45) NOT NULL,
  `Prezzo` decimal(10,0) NOT NULL,
  `Peso` decimal(30,0) DEFAULT NULL,
  `Lunghezza` varchar(45) DEFAULT NULL,
  `Immagine` varchar(255) NOT NULL DEFAULT '../immagini/esche/default.jpg',
  `Descrizione` varchar(800) DEFAULT NULL,
  `Tipo` enum('e','m','c') NOT NULL DEFAULT 'e',
  PRIMARY KEY (`idItem`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'Pelagus',30,30,'118','../immagini/esche/pelagus.jpg','Pelagus 165-S &egrave una stick-bait sinking appositamente studiata per la pesca del Tonno Rosso.','e'),(2,'Tide',30,10,'110','../immagini/esche/tide.jpg','Il Tide Minnow 75 SPRINT &egrave un minnow di piccole dimensioni che si presta molto bene per recuperi veloci e lanci a lunga distanza, tutto questo grazie alla distribuzione dei pesi interni. Azione: Sinking','e'),(3,'Breakdance',21,14,'123','../immagini/esche/breakdance.jpg',NULL,'e'),(4,'Stylo',54,15,'130','../immagini/esche/stylo.png','JackFin Stylo 210 &egrave un pencil-bait estremamente versatile che imita una delle prede pi&ugrave comuni: l\'aguglia. Con le sue varie azioni di recupero si presta ad essere usato sia in condizioni di recuperi molto veloci e pesci attivi, sia in condizioni di pesce apatico.','e'),(5,'Skirmjan',140,130,'210','../immagini/esche/skirmjan.jpg','Le nuove Skirmjan di casa Molix sono disponibili in due versioni: monopezzo e due pezzi. La tecnica costruttiva che riesce a combinare due tipi differenti di carbonio in alto modulo, uno HCC (Hard Compact Carbon) e un\'altro SC (Stretchable Carbon) co','c'),(6,'Go Emotion',160,150,'200','../immagini/esche/goemotion.jpg','Serie di canne monopezzo a dir poco straordinarie; Major Craft vuole offrire il massimo ad un prezzo unico! Design accattivante con una combinazione di colori \"canna di fucile\" e \"nero opaco\" che rende pi&ugrave gradevole e accattivante l\'attrezzo. C','c'),(7,'Curado',0,NULL,NULL,'../immagini/esche/curado.jpg','I nuovi Curado 71 HG e 71 XG vanno ad aggiungersi alla attuale gamma dei mulinelli, composta fino ad oggi dalla sola taglia 200/201. Il nuovo Curado 71 &egrave nato per diventare il tuo partner ideale quando vuoi insidiare i principali pesci predatori in tutta europa con attrezzatura pi&ugrave leggera, e ora puoi scegliere tra il modello High Gear (7,2:1) e il modello Extra High Gear (8,2:1). La potenza dei questi mulinelli &egrave paragonabile ai modelli con bobina fissa, ed offrono in pi&ugrave il vantaggio di avere il contatto diretto con il filo, permettendo il massimo controllo del sistema pescate in tutte le fasi ed in modo particolare durante il combattimento. Grazie alla meccanica X-Ship Curado assicura un\'ottima potenza durante il recupero, mentre il sistema SVS Infinity Variable ','m'),(24,'basss',1,1,'1','./uploads/1491148_10202851529318674_1978399094_n20170819044234.jpg','ewqrwrewqrt','e');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bass_shop'
--

--
-- Dumping routines for database 'bass_shop'
--

--
-- Final view structure for view `escheditendenza`
--

/*!50001 DROP TABLE IF EXISTS `escheditendenza`*/;
/*!50001 DROP VIEW IF EXISTS `escheditendenza`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `escheditendenza` AS select `acquisti`.`idItem` AS `idEsca`,sum(`acquisti`.`quantita`) AS `quanti` from `acquisti` group by `acquisti`.`idItem` order by `quanti` desc limit 4 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-20 14:37:43
