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
  `spedito` int(1) NOT NULL DEFAULT '0',
  `visibile` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idAcquisto`),
  KEY `idEsca_idx` (`idItem`),
  KEY `idCliente_idx` (`idCliente`),
  CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `clienti` (`idclienti`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idEsca` FOREIGN KEY (`idItem`) REFERENCES `items` (`idItem`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acquisti`
--

LOCK TABLES `acquisti` WRITE;
/*!40000 ALTER TABLE `acquisti` DISABLE KEYS */;
INSERT INTO `acquisti` VALUES (1,1,1,'2017-08-17 11:59:04',1,0,1),(1,2,2,'2017-08-17 11:59:04',1,0,1),(1,3,3,'2017-08-17 11:59:04',1,1,1),(1,2,4,'2017-08-17 11:59:04',1,0,0),(1,3,5,'2017-08-17 11:59:04',1,0,1),(1,3,6,'2017-08-17 11:59:04',1,0,1),(1,4,7,'2017-08-17 11:59:04',1,0,0),(1,4,8,'2017-08-17 11:59:04',1,1,1),(1,4,9,'2017-08-17 11:59:04',1,0,1),(1,4,10,'2017-08-17 11:59:04',1,0,1),(1,2,11,'2017-08-17 11:59:04',1,1,0),(1,2,12,'2017-08-17 11:59:04',1,0,1),(1,2,13,'2017-08-21 12:36:16',1,1,0),(1,2,14,'2017-08-21 12:38:34',1,0,0),(1,1,15,'2017-08-21 12:39:48',1,1,0),(1,2,16,'2017-08-21 15:20:55',1,1,1),(1,2,17,'2017-08-21 15:25:46',1,1,1),(1,2,18,'2017-08-21 15:27:21',1,1,1),(1,7,19,'2017-08-21 15:28:27',1,1,1),(1,1,20,'2017-08-21 15:28:59',1,1,1),(1,2,21,'2017-08-21 15:33:31',1,1,1),(1,2,22,'2017-08-21 15:33:58',1,1,1),(1,2,23,'2017-08-21 15:36:47',1,0,1),(1,2,24,'2017-08-21 15:41:08',1,0,1),(1,2,25,'2017-08-21 15:47:31',1,0,1),(1,4,26,'2017-08-21 15:47:31',3,0,1),(1,1,27,'2017-08-21 15:47:31',3,1,1),(1,4,28,'2017-08-21 16:06:48',3,1,1),(1,6,29,'2017-08-21 21:34:28',1,1,1),(1,2,30,'2017-08-21 21:36:02',2,1,0),(1,6,31,'2017-08-22 09:58:20',1,0,0),(1,6,32,'2017-08-22 09:58:20',1,1,0),(1,5,33,'2017-08-22 09:58:20',1,1,1),(1,24,34,'2017-08-22 09:58:21',1,1,0),(1,3,35,'2017-08-22 09:58:21',1,1,0),(1,1,36,'2017-08-22 09:58:21',1,1,0),(1,1,37,'2017-08-22 09:58:21',1,1,0),(1,4,38,'2017-08-22 09:58:21',1,1,0),(1,2,39,'2017-08-22 09:58:21',2,1,1),(1,7,40,'2017-08-22 09:58:21',3,1,0),(1,7,41,'2017-08-22 09:58:21',3,1,0),(1,2,42,'2017-08-22 13:58:31',2,0,0),(1,7,43,'2017-08-22 13:58:31',1,1,0),(1,2,44,'2017-08-23 11:45:28',1,0,1),(1,4,45,'2017-08-23 11:45:28',1,0,1),(1,6,46,'2017-08-23 11:49:45',1,0,1),(1,5,47,'2017-08-23 11:49:45',1,1,1),(1,7,48,'2017-08-23 11:49:45',1,0,0),(1,3,49,'2017-08-23 11:49:45',1,0,1),(1,4,50,'2017-08-23 11:58:55',1,1,0),(1,2,53,'2017-08-23 15:11:25',1,1,0),(1,4,54,'2017-08-23 15:11:25',1,1,0),(1,6,55,'2017-08-23 16:15:20',0,0,0),(1,2,56,'2017-08-23 16:15:20',1,0,0),(1,6,57,'2017-08-23 16:15:20',1,0,0),(1,2,58,'2017-08-23 16:43:23',7,0,0),(28,6,59,'2017-08-23 20:21:50',1,1,0),(1,6,60,'2017-08-24 09:07:47',2,0,1),(1,7,61,'2017-08-24 09:07:47',1,0,0),(1,4,62,'2017-08-24 09:07:47',1,1,0),(1,6,63,'2017-08-24 11:05:35',2,0,1);
/*!40000 ALTER TABLE `acquisti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `acquistiordinati`
--

DROP TABLE IF EXISTS `acquistiordinati`;
/*!50001 DROP VIEW IF EXISTS `acquistiordinati`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `acquistiordinati` (
  `idCliente` tinyint NOT NULL,
  `idItem` tinyint NOT NULL,
  `idAcquisto` tinyint NOT NULL,
  `data` tinyint NOT NULL,
  `quantita` tinyint NOT NULL,
  `spedito` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clienti`
--

LOCK TABLES `clienti` WRITE;
/*!40000 ALTER TABLE `clienti` DISABLE KEYS */;
INSERT INTO `clienti` VALUES (1,'pippo','dsfsf@gmail.com','pippo',1,'pippo','pippo'),(8,'sdfdfdd','gioelecarignani@gmail.com','dddddddddd',0,'Gioele','Carignani'),(14,'gggggg','gggggg@kk.mmm','sssssssss',0,'hhhhh','hhhhhhh'),(17,'ssasddfff','gioelnani@gmail.com','wwwwwwwwwwww',0,'Gioele','Carignani'),(18,'sssssgfgfd','gioelecarigndssssani@gmail.com','ssssssssssss',0,'Gioele','Carignani'),(19,'gioelec','wwew@gmail.com','gioelec',0,'gioele','gioele'),(20,'lorenzo','fgfdgd@gmail.com','lorenzo',0,'Gioele','Carignani'),(21,'rrrrrrrrrr','gioelecarignani@gmailasas.com','rrrrrrrrrrrrrrrrr',0,'Gioele','Carignani'),(22,'pippodddd','gioelerignani@gmail.com','ddddddddddd',0,'Gioele','Carignani'),(23,'wwwwwww','gioelecawwewwni@gmail.com','wwwwwwwwww',0,'Gioele','Carignani'),(25,'tfcc9595','giokplni@gmail.com','aaaaaaaaaaaaaa',0,'lorenzo','ferrini'),(27,'lorenzow2','gioelecaridi@gmail.com','aaaaaaaaaaaaaa',0,'Gioele','Carignani'),(28,'zenzero61','gioani@gmail.com','zenzero61',0,'Claudio','Carignani'),(29,'frossi95','frossi@gmail.com','frossi95',0,'Federico','Rossi');
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
  PRIMARY KEY (`idItem`),
  UNIQUE KEY `Nome_UNIQUE` (`Nome`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'Pelagus',30,30,'118','../immagini/esche/pelagus.jpg','Pelagus 165-S &egrave una stick-bait sinking appositamente studiata per la pesca del Tonno Rosso.','e'),(2,'Tide',30,10,'110','../immagini/esche/tide.jpg','Il Tide Minnow 75 SPRINT &egrave un minnow di piccole dimensioni che si presta molto bene per recuperi veloci e lanci a lunga distanza, tutto questo grazie alla distribuzione dei pesi interni. Azione: Sinking','e'),(3,'Breakdance',21,14,'123','../immagini/esche/breakdance.jpg',NULL,'e'),(4,'Stylo',54,15,'130','../immagini/esche/stylo.png','JackFin Stylo 210 &egrave un pencil-bait estremamente versatile che imita una delle prede pi&ugrave comuni: l\'aguglia. Con le sue varie azioni di recupero si presta ad essere usato sia in condizioni di recuperi molto veloci e pesci attivi, sia in condizioni di pesce apatico.','e'),(5,'Skirmjan',140,130,'210','../immagini/esche/skirmjan.jpg','Le nuove Skirmjan di casa Molix sono disponibili in due versioni: monopezzo e due pezzi. La tecnica costruttiva che riesce a combinare due tipi differenti di carbonio in alto modulo, uno HCC (Hard Compact Carbon) e un\'altro SC (Stretchable Carbon) co','c'),(6,'GoEmotion',160,150,'200','../immagini/esche/goemotion.jpg','Serie di canne monopezzo a dir poco straordinarie; Major Craft vuole offrire il massimo ad un prezzo unico! Design accattivante con una combinazione di colori \"canna di fucile\" e \"nero opaco\" che rende pi&ugrave gradevole e accattivante l\'attrezzo. C','c'),(7,'Curado',3,120,NULL,'../immagini/esche/curado.jpg','I nuovi Curado 71 HG e 71 XG vanno ad aggiungersi alla attuale gamma dei mulinelli, composta fino ad oggi dalla sola taglia 200/201. Il nuovo Curado 71 &egrave nato per diventare il tuo partner ideale quando vuoi insidiare i principali pesci predatori in tutta europa con attrezzatura pi&ugrave leggera, e ora puoi scegliere tra il modello High Gear (7,2:1) e il modello Extra High Gear (8,2:1). La potenza dei questi mulinelli &egrave paragonabile ai modelli con bobina fissa, ed offrono in pi&ugrave il vantaggio di avere il contatto diretto con il filo, permettendo il massimo controllo del sistema pescate in tutte le fasi ed in modo particolare durante il combattimento. Grazie alla meccanica X-Ship Curado assicura un\'ottima potenza durante il recupero, mentre il sistema SVS Infinity Variable ','m'),(24,'basss',1,1,'1','./uploads/1491148_10202851529318674_1978399094_n20170819044234.jpg','ewqrwrewqrt','e'),(25,'fsdfsdf',1,1,'1','./uploads/Foto044320170820044428.jpg','qtretwwertert','e');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bass_shop'
--

--
-- Dumping routines for database 'bass_shop'
--

--
-- Final view structure for view `acquistiordinati`
--

/*!50001 DROP TABLE IF EXISTS `acquistiordinati`*/;
/*!50001 DROP VIEW IF EXISTS `acquistiordinati`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `acquistiordinati` AS select `acquisti`.`idCliente` AS `idCliente`,`acquisti`.`idItem` AS `idItem`,`acquisti`.`idAcquisto` AS `idAcquisto`,`acquisti`.`data` AS `data`,`acquisti`.`quantita` AS `quantita`,`acquisti`.`spedito` AS `spedito` from `acquisti` order by `acquisti`.`data` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

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

-- Dump completed on 2017-08-24 12:37:51
