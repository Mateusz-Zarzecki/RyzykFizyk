-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ryzykfizyk
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `ryzykfizyk`
--

/*!40000 DROP DATABASE IF EXISTS `ryzykfizyk`*/;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ryzykfizyk` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `ryzykfizyk`;

--
-- Table structure for table `pytania`
--

DROP TABLE IF EXISTS `pytania`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pytania` (
  `IdPytania` int(11) NOT NULL AUTO_INCREMENT,
  `Tresc` varchar(1000) DEFAULT NULL,
  `PrawidlowaOdp` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdPytania`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pytania`
--

LOCK TABLES `pytania` WRITE;
/*!40000 ALTER TABLE `pytania` DISABLE KEYS */;
INSERT INTO `pytania` VALUES (2,'Ile dni ma rok przestepny?',366),(3,'Ile kontynentow jest na Ziemi?',7),(4,'Ile miesiecy ma rok?',12),(5,'Ile godzin jest w dobie?',24),(6,'Ile planet znajduje sie w Ukladzie Slonecznym?',8),(7,'Ile lat ma przecietny dorosly czlowiek w momencie osiagniecia pelnoletnosci?',18),(8,'Ile osob jest w przecietnej rodzinie?',4),(9,'Ile kilometrow ma pelny okrag?',360),(10,'Ile dni trwa przecietny urlop w Polsce?',20),(11,'Ile lat trwa przecietna kadencja prezydenta w Polsce?',5),(12,'Ile palcow ma czlowiek?',20),(13,'Ile lat ma przecietny uczen w szkole podstawowej?',12),(14,'Ile dni ma luty w roku nieprzestepnym?',28),(15,'Ile godzin trwa przecietny lot z Warszawy do Nowego Jorku?',10),(16,'Ile osob jest w przecietnym zespole muzycznym?',4),(17,'Ile lat ma przecietny emeryt w Polsce?',65),(18,'Ile kilometrow ma przecietna trasa maratonu?',42),(19,'Ile dni trwa przecietny miesiac?',30),(20,'Ile osob mieszka w najwiekszym miescie na swiecie?',37000000),(21,'Ile lat ma przecietny pies?',10),(22,'Ile dni w roku przypada na weekend?',104),(23,'Ile lat ma przecietny student na studiach licencjackich?',21),(24,'Ile osob jest potrzebnych do stworzenia zespolu sportowego?',11),(25,'Ile lat ma przecietny pracownik w Polsce?',40),(26,'Ile dni trwa przecietny rok szkolny?',200),(27,'Ile lat ma najstarszy znany dab w Polsce?',1000),(28,'Ile osob jest w przecietnym samochodzie osobowym?',4),(29,'Ile lat ma przecietny nauczyciel w Polsce?',45),(30,'Ile dni trwa przecietny festiwal muzyczny?',3),(31,'Ile lat ma przecietny prezydent w Polsce?',55),(32,'Ile osob jest w przecietnym zespole teatralnym?',10),(33,'Ile lat ma przecietny wlasciciel psa?',35),(34,'Ile dni w roku przypada na swieta?',13);
/*!40000 ALTER TABLE `pytania` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-24 10:16:48
