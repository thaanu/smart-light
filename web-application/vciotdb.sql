-- MySQL dump 10.13  Distrib 5.7.33, for Linux (x86_64)
--
-- Host: localhost    Database: vciotdb
-- ------------------------------------------------------
-- Server version	5.7.33-0ubuntu0.16.04.1

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
-- Table structure for table `tbl_device_types`
--

DROP TABLE IF EXISTS `tbl_device_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_device_types` (
  `device_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `device_type` varchar(45) DEFAULT NULL,
  `device_functions` text,
  PRIMARY KEY (`device_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_device_types`
--

LOCK TABLES `tbl_device_types` WRITE;
/*!40000 ALTER TABLE `tbl_device_types` DISABLE KEYS */;
INSERT INTO `tbl_device_types` VALUES (1,'Light','[\"on\",\"off\"]'),(2,'Fan','[\"on\",\"off\"]');
/*!40000 ALTER TABLE `tbl_device_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_devices`
--

DROP TABLE IF EXISTS `tbl_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_devices` (
  `device_id` int(11) NOT NULL AUTO_INCREMENT,
  `device_name` varchar(45) DEFAULT NULL,
  `device_ip` varchar(45) DEFAULT NULL,
  `device_hash` varchar(45) DEFAULT NULL,
  `device_location` varchar(255) DEFAULT NULL,
  `device_uid` varchar(45) DEFAULT NULL,
  `device_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`device_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_devices`
--

LOCK TABLES `tbl_devices` WRITE;
/*!40000 ALTER TABLE `tbl_devices` DISABLE KEYS */;
INSERT INTO `tbl_devices` VALUES (1,'Desk Lamp','','71523d46f1db6d9fb40cbdf7f837964c','Living Room','1691896950',1),(2,'Ceiling Fan','','bd8f29224addd42363192c38d58d2e51','Living Room','1691900461',2),(3,'Light 3','','c51e77075e217579566984d26d779ec4','Living Room','1692105780',1),(4,'test','','bdf255ea85a4c780030bf00f8f9065fe','test','1692105801',1),(5,'Bedroom Main Light','','f250803eb63d12e5db1c54b17d554fcf','Bedroom','1692106231',1);
/*!40000 ALTER TABLE `tbl_devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_events`
--

DROP TABLE IF EXISTS `tbl_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `device_uid` varchar(45) DEFAULT NULL,
  `device_status` varchar(45) DEFAULT NULL,
  `event_dt` datetime DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_events`
--

LOCK TABLES `tbl_events` WRITE;
/*!40000 ALTER TABLE `tbl_events` DISABLE KEYS */;
INSERT INTO `tbl_events` VALUES (1,'1691896950','off','2023-08-13 08:43:00'),(2,'1691896950','on','2023-08-13 09:18:00'),(3,'1691900461','off','2023-08-13 04:21:01'),(4,'1691896950','off','2023-08-13 09:33:01'),(5,'1691896950','on','2023-08-13 09:38:01'),(6,'1691896950','off','2023-08-13 15:05:00'),(7,'1691896950','on','2023-08-13 15:07:00'),(8,'1691896950','off','2023-08-13 15:13:48'),(9,'1691896950','on','2023-08-13 15:13:55'),(10,'1691896950','off','2023-08-13 15:13:59'),(11,'1691896950','on','2023-08-13 15:14:03'),(12,'1691896950','off','2023-08-13 15:14:05'),(13,'1691896950','on','2023-08-13 15:15:14'),(14,'1691896950','off','2023-08-13 15:15:21'),(15,'1691896950','on','2023-08-13 15:15:25'),(16,'1691896950','off','2023-08-13 15:15:28'),(17,'1691896950','on','2023-08-14 19:16:40'),(18,'1691896950','off','2023-08-14 19:16:46'),(19,'1691896950','on','2023-08-14 19:16:51'),(20,'1691896950','off','2023-08-14 19:16:57'),(21,'1691900461','on','2023-08-14 19:16:59'),(22,'1691896950','on','2023-08-14 19:17:08'),(23,'1691896950','off','2023-08-14 19:17:14'),(24,'1691896950','on','2023-08-14 19:17:51'),(25,'1691896950','off','2023-08-14 19:18:17'),(26,'1691896950','on','2023-08-14 19:20:51'),(27,'1691896950','off','2023-08-14 19:20:53'),(28,'1691900461','off','2023-08-14 19:24:08'),(29,'1691896950','on','2023-08-14 19:24:16'),(30,'1691900461','on','2023-08-14 19:24:20'),(31,'1691900461','off','2023-08-14 19:24:23'),(32,'1691896950','off','2023-08-14 19:24:27'),(33,'1691896950','on','2023-08-14 19:36:02'),(34,'1691896950','off','2023-08-14 19:36:51'),(35,'1691896950','on','2023-08-14 19:37:01'),(36,'1691896950','off','2023-08-14 19:37:22'),(37,'1691896950','on','2023-08-14 19:37:43'),(38,'1691896950','off','2023-08-14 19:38:27'),(39,'1691896950','on','2023-08-14 19:39:07'),(40,'1691896950','off','2023-08-14 19:39:23'),(41,'1691896950','on','2023-08-14 19:39:46'),(42,'1691896950','off','2023-08-14 19:39:51'),(43,'1691896950','on','2023-08-14 19:41:16'),(44,'1691896950','off','2023-08-14 19:41:33'),(45,'1691896950','on','2023-08-14 19:41:42'),(46,'1691896950','off','2023-08-14 19:41:46'),(47,'1691896950','on','2023-08-14 19:46:48'),(48,'1691896950','off','2023-08-14 19:57:39'),(49,'1691896950','on','2023-08-14 20:56:36'),(50,'1691896950','off','2023-08-14 20:56:38'),(51,'1691896950','on','2023-08-14 20:59:45'),(52,'1691896950','off','2023-08-14 20:59:54'),(53,'1691896950','on','2023-08-14 21:00:03'),(54,'1691896950','off','2023-08-14 21:00:08'),(55,'1691896950','on','2023-08-14 21:00:31'),(56,'1691896950','off','2023-08-14 21:00:34'),(57,'1691896950','on','2023-08-14 21:01:25'),(58,'1691896950','off','2023-08-14 21:01:29'),(59,'1691896950','on','2023-08-14 21:01:34'),(60,'1691896950','off','2023-08-14 21:01:40'),(61,'1692105780','off','2023-08-15 18:23:00'),(62,'1692105801','off','2023-08-15 18:23:21'),(63,'1692106231','off','2023-08-15 18:30:31');
/*!40000 ALTER TABLE `tbl_events` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-15 20:50:42
