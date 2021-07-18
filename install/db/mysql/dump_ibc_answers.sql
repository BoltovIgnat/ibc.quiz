-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: nikitabitrix
-- ------------------------------------------------------
-- Server version	5.7.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ibc_answers`
--

DROP TABLE IF EXISTS `ibc_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ibc_answers` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `ANSWER` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `TYPE` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ibc_answers`
--

LOCK TABLES `ibc_answers` WRITE;
/*!40000 ALTER TABLE `ibc_answers` DISABLE KEYS */;
INSERT INTO `ibc_answers` VALUES (1,'Homesteading','-1'),(2,'Outdoors','-2'),(3,'Custom/Commercial sharpening','-3'),(4,'Ordinary Kitchen knives','1'),(5,'Pocket and utility knives','1'),(6,'Professional kitchen knives','1'),(7,'Cutting tools chisels/planes/scissors','1'),(8,'Bushcraft/Tactical Fixed Blades','2'),(9,'Hunting/Fishing Knives','2'),(10,'Pocket knives/utility knives','2'),(11,'Machetes/Solid hunting knives','2'),(12,'Any type','3'),(13,'Ordinary/Professional Cutlery','3'),(14,'Custom/Fixed/EDC','3'),(15,'Cutting tools chisels/planes/scissors','3');
/*!40000 ALTER TABLE `ibc_answers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-18 15:17:46
