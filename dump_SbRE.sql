-- MySQL dump 10.19  Distrib 10.3.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sbRE
-- ------------------------------------------------------
-- Server version	10.3.34-MariaDB-0+deb10u1

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
-- Current Database: `sbRE`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `sbRE` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `sbRE`;

--
-- Table structure for table `animateur`
--

DROP TABLE IF EXISTS `animateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_animateur` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_animateur` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animateur`
--

LOCK TABLES `animateur` WRITE;
/*!40000 ALTER TABLE `animateur` DISABLE KEYS */;
INSERT INTO `animateur` VALUES (1,'FREJ','Hilda'),(2,'ALEXANDER','Dimitri'),(3,'VESTRA','Cyril'),(4,'GREEN','Veronica');
/*!40000 ALTER TABLE `animateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_client` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'NUVELLE','Constance'),(2,'MAJOR','Bob'),(3,'ROCHARD','Pierre'),(4,'RUFUS','Timmy'),(5,'SAPHIR','Flora');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialiste`
--

DROP TABLE IF EXISTS `specialiste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialiste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_specialiste` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_specialiste` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialiste`
--

LOCK TABLES `specialiste` WRITE;
/*!40000 ALTER TABLE `specialiste` DISABLE KEYS */;
INSERT INTO `specialiste` VALUES (1,'BERN','Guinivere'),(2,'RIGEL','Alm');
/*!40000 ALTER TABLE `specialiste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stage`
--

DROP TABLE IF EXISTS `stage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `animateur_id` int(11) NOT NULL,
  `date_debut` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_jours` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C27C93697F05C301` (`animateur_id`),
  CONSTRAINT `FK_C27C93697F05C301` FOREIGN KEY (`animateur_id`) REFERENCES `animateur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stage`
--

LOCK TABLES `stage` WRITE;
/*!40000 ALTER TABLE `stage` DISABLE KEYS */;
INSERT INTO `stage` VALUES (1,3,'07/03/2022',7),(2,2,'12/10/2022',30),(3,1,'17/10/2022',30);
/*!40000 ALTER TABLE `stage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stage_client`
--

DROP TABLE IF EXISTS `stage_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stage_client` (
  `stage_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`stage_id`,`client_id`),
  KEY `IDX_5BCDA54E2298D193` (`stage_id`),
  KEY `IDX_5BCDA54E19EB6921` (`client_id`),
  CONSTRAINT `FK_5BCDA54E19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_5BCDA54E2298D193` FOREIGN KEY (`stage_id`) REFERENCES `stage` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stage_client`
--

LOCK TABLES `stage_client` WRITE;
/*!40000 ALTER TABLE `stage_client` DISABLE KEYS */;
INSERT INTO `stage_client` VALUES (1,3),(1,4),(2,1),(2,2),(3,5);
/*!40000 ALTER TABLE `stage_client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stage_specialiste`
--

DROP TABLE IF EXISTS `stage_specialiste`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stage_specialiste` (
  `stage_id` int(11) NOT NULL,
  `specialiste_id` int(11) NOT NULL,
  `nb_heures` int(11) NOT NULL,
  PRIMARY KEY (`stage_id`,`specialiste_id`),
  KEY `IDX_843F56FF2298D193` (`stage_id`),
  KEY `IDX_843F56FF6F1A5C10` (`specialiste_id`),
  CONSTRAINT `FK_843F56FF2298D193` FOREIGN KEY (`stage_id`) REFERENCES `stage` (`id`),
  CONSTRAINT `FK_843F56FF6F1A5C10` FOREIGN KEY (`specialiste_id`) REFERENCES `specialiste` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stage_specialiste`
--

LOCK TABLES `stage_specialiste` WRITE;
/*!40000 ALTER TABLE `stage_specialiste` DISABLE KEYS */;
INSERT INTO `stage_specialiste` VALUES (1,2,35),(2,1,72);
/*!40000 ALTER TABLE `stage_specialiste` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-02 14:53:43
