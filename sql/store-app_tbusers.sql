-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: edusystemdb.cd6l3kpvdycv.us-east-1.rds.amazonaws.com    Database: store-app
-- ------------------------------------------------------
-- Server version	8.0.23

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '';

--
-- Table structure for table `tbusers`
--

DROP TABLE IF EXISTS `tbusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbusers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `budget` float(10,2) NOT NULL,
  `photo` varchar(300) NOT NULL DEFAULT 'f02cb2b91b6ca49e6f8f505825a0c523.gif',
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `fechanacimiento` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusers`
--

LOCK TABLES `tbusers` WRITE;
/*!40000 ALTER TABLE `tbusers` DISABLE KEYS */;
INSERT INTO `tbusers` VALUES (1,'yeimar','$2y$10$7HBSVOqdlfdB7n9.IgyCDeNx5iu/7.waNpO2GaX1yE7jZM8LNMPHO','user',3000.00,'1c22c1021546fa4647b4246b860fa7c4.gif','YEIMAR','','','','',''),(2,'yuber','$2y$10$MwcD6baG1MJy/2Cz6Fts9e.nCncU50hdxRWtNj6dNGeBkJHZazt8q','user',0.00,'','','yeimar112003@gmail.com','','Carrea24@#67','3217290035','23/34/2003'),(3,'camilo','$2y$10$tsv1Pgheel3wDke2RKQVVOKyWOtIoeOtgoJddka7MD8tQWTUOMv9O','user',0.00,'','','camilo11@gmail.com','','Carrea24@#67','3217290035','111111-11-11'),(4,'@juan','$2y$10$IdoPCnSNSLg.rwd9DM.U.uHJ10LbB6mhs9pCUhfkBVk7LxiIKzSjW','user',0.00,'','','NET@gmil.com','','Carrea24@#67','3217290035','2003-06-17'),(5,'@admin','$2y$10$G3SKgsOPR.4xw.gGWbeSE.h8fDetnu.8rlmqWcHkSfejpDa3xdL/O','user',0.00,'','','admin@gmail.com','','Carrea24@#67','3217290035','2002-11-11');
/*!40000 ALTER TABLE `tbusers` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-17 23:16:06
