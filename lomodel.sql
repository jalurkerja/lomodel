-- MySQL dump 10.15  Distrib 10.0.31-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: lomodel
-- ------------------------------------------------------
-- Server version	10.0.31-MariaDB-0ubuntu0.16.04.2

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
-- Table structure for table `a_backoffice_menu`
--

DROP TABLE IF EXISTS `a_backoffice_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_backoffice_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seqno` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_backoffice_menu`
--

LOCK TABLES `a_backoffice_menu` WRITE;
/*!40000 ALTER TABLE `a_backoffice_menu` DISABLE KEYS */;
INSERT INTO `a_backoffice_menu` VALUES (1,1,0,'Home','index.php','2016-04-11 18:31:28','superuser@jalurkerja.com','127.0.0.1','2016-10-28 16:10:37','superuser','127.0.0.1','2016-10-28 02:10:37'),(2,2,0,'Master Data','#','2016-04-11 18:31:28','superuser@jalurkerja.com','127.0.0.1','2016-04-11 18:31:28','superuser@jalurkerja.com','127.0.0.1','2016-04-11 04:31:28'),(3,5,0,'General','#','2016-04-11 18:31:28','superuser@jalurkerja.com','127.0.0.1','2016-11-07 08:01:39','superuser','127.0.0.1','2017-10-12 23:21:55'),(4,1,2,'Users','users_list.php','2016-11-07 08:08:09','superuser','127.0.0.1','2016-11-07 08:08:09','superuser','127.0.0.1','2016-11-06 18:10:09'),(5,2,2,'Groups','groups_list.php','2017-03-27 09:59:48','superuser','127.0.0.1','2017-03-27 09:59:48','superuser','127.0.0.1','2017-04-12 18:00:56'),(6,1,3,'Change Password','change_password.php','2016-11-07 08:08:39','superuser','127.0.0.1','2016-11-07 08:08:39','superuser','127.0.0.1','2017-07-30 18:54:05'),(7,0,2,'Backoffice Menu','mst_backoffice_menu_list.php','2017-08-18 10:53:20','superuser','127.0.0.1','2017-08-18 10:53:20','superuser','127.0.0.1','2017-08-18 03:53:20'),(9,3,0,'Object','#',NULL,'',NULL,NULL,'',NULL,'2017-08-19 02:36:37'),(10,1,12,'Invoices','invoices_list.php','2017-10-12 23:13:27','superuser','127.0.0.1','2017-10-12 23:13:27','superuser','127.0.0.1','2017-10-12 23:22:07'),(12,4,0,'Contents','#','2017-10-13 06:21:21','superuser','127.0.0.1','2017-10-13 06:21:21','superuser','127.0.0.1','2017-10-12 23:21:51'),(13,2,12,'Posted Castings','jobs_list.php','2017-10-13 06:22:55','superuser','127.0.0.1','2017-10-13 06:22:55','superuser','127.0.0.1','2017-10-12 23:23:15');
/*!40000 ALTER TABLE `a_backoffice_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `a_backoffice_menu_privileges`
--

DROP TABLE IF EXISTS `a_backoffice_menu_privileges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_backoffice_menu_privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `a_backoffice_menu_id` int(11) NOT NULL,
  `privilege` smallint(6) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_backoffice_menu_privileges`
--

LOCK TABLES `a_backoffice_menu_privileges` WRITE;
/*!40000 ALTER TABLE `a_backoffice_menu_privileges` DISABLE KEYS */;
/*!40000 ALTER TABLE `a_backoffice_menu_privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `a_groups`
--

DROP TABLE IF EXISTS `a_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_groups`
--

LOCK TABLES `a_groups` WRITE;
/*!40000 ALTER TABLE `a_groups` DISABLE KEYS */;
INSERT INTO `a_groups` VALUES (1,'Administrator','2017-08-13 17:30:16','superuser','127.0.0.1','2017-08-13 17:53:30','admin','127.0.0.1','2017-08-13 10:53:30');
/*!40000 ALTER TABLE `a_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `a_log_histories`
--

DROP TABLE IF EXISTS `a_log_histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_log_histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `x_mode` smallint(6) NOT NULL,
  `log_at` datetime DEFAULT NULL,
  `log_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_log_histories`
--

LOCK TABLES `a_log_histories` WRITE;
/*!40000 ALTER TABLE `a_log_histories` DISABLE KEYS */;
INSERT INTO `a_log_histories` VALUES (1,1,'superuser',1,'2017-08-23 11:24:00','127.0.0.1','2017-08-23 04:24:00'),(2,1,'superuser',2,'2017-08-23 11:24:50','127.0.0.1','2017-08-23 04:24:50'),(3,3,'sumarno@corphr.com',2,'2017-08-28 16:42:46','127.0.0.1','2017-08-28 09:42:46'),(4,1,'superuser',1,'2017-08-30 08:57:09','127.0.0.1','2017-08-30 01:57:09'),(5,3,'',1,'2017-08-31 08:46:53','127.0.0.1','2017-08-31 01:46:53'),(6,3,'',2,'2017-08-31 08:49:03','127.0.0.1','2017-08-31 01:49:03'),(10,5,'sidik@corphr.com',2,'2017-09-04 08:41:08','127.0.0.1','2017-09-04 01:41:08'),(11,6,'sidik@corphr.com',1,'2017-09-04 08:41:47','127.0.0.1','2017-09-04 01:41:47'),(12,6,'sidik@corphr.com',2,'2017-09-04 08:44:24','127.0.0.1','2017-09-04 01:44:24'),(13,7,'sidik@corphr.com',1,'2017-09-04 08:45:11','127.0.0.1','2017-09-04 01:45:11'),(14,7,'sidik@corphr.com',2,'2017-09-04 08:45:43','127.0.0.1','2017-09-04 01:45:43'),(15,8,'sidik@corphr.com',1,'2017-09-04 08:46:16','127.0.0.1','2017-09-04 01:46:16'),(16,8,'sidik@corphr.com',2,'2017-09-04 09:02:03','127.0.0.1','2017-09-04 02:02:03'),(17,9,'sidik@corphr.com',1,'2017-09-04 09:03:27','127.0.0.1','2017-09-04 02:03:27'),(18,9,'sidik@corphr.com',2,'2017-09-04 09:04:42','127.0.0.1','2017-09-04 02:04:42'),(19,10,'sidik@corphr.com',1,'2017-09-04 09:08:05','127.0.0.1','2017-09-04 02:08:05'),(20,10,'sidik@corphr.com',2,'2017-09-04 09:08:44','127.0.0.1','2017-09-04 02:08:44'),(21,11,'warih@lomodel.com',1,'2017-09-04 13:03:01','127.0.0.1','2017-09-04 06:03:01'),(22,11,'warih@lomodel.com',2,'2017-09-04 13:05:28','127.0.0.1','2017-09-04 06:05:28'),(23,12,'warih@agency.com',1,'2017-09-04 13:06:43','127.0.0.1','2017-09-04 06:06:43'),(24,12,'warih@agency.com',2,'2017-09-04 13:18:05','127.0.0.1','2017-09-04 06:18:05'),(25,13,'warih@agency.com',1,'2017-09-04 13:18:55','127.0.0.1','2017-09-04 06:18:55'),(26,13,'warih@agency.com',2,'2017-09-04 13:29:50','127.0.0.1','2017-09-04 06:29:50'),(27,14,'warih@corporate.com',1,'2017-09-04 13:34:41','127.0.0.1','2017-09-04 06:34:41'),(28,14,'warih@corporate.com',2,'2017-09-04 13:36:29','127.0.0.1','2017-09-04 06:36:29'),(29,15,'warih@corporate.com',1,'2017-09-04 13:37:58','127.0.0.1','2017-09-04 06:37:58'),(30,15,'warih@corporate.com',2,'2017-09-04 13:39:10','127.0.0.1','2017-09-04 06:39:10'),(31,16,'warih@corporate.com',1,'2017-09-04 13:40:30','127.0.0.1','2017-09-04 06:40:30'),(32,17,'warih@corporation.com',1,'2017-09-04 18:29:06','127.0.0.1','2017-09-04 11:29:06'),(33,18,'warih@personal.com',1,'2017-09-05 07:59:22','127.0.0.1','2017-09-05 00:59:22'),(34,18,'warih@personal.com',2,'2017-09-05 08:00:08','127.0.0.1','2017-09-05 01:00:08'),(35,19,'sidik@personal.com',1,'2017-09-05 11:11:56','127.0.0.1','2017-09-05 04:11:56'),(36,19,'sidik@personal.com',2,'2017-09-05 11:12:54','127.0.0.1','2017-09-05 04:12:54'),(37,20,'sidik@agency.com',1,'2017-09-05 11:15:57','127.0.0.1','2017-09-05 04:15:57'),(38,20,'sidik@agency.com',2,'2017-09-05 11:16:35','127.0.0.1','2017-09-05 04:16:35'),(39,21,'sidik@corporate.com',1,'2017-09-05 11:18:07','127.0.0.1','2017-09-05 04:18:07'),(40,21,'sidik@corporate.com',2,'2017-09-05 11:18:39','127.0.0.1','2017-09-05 04:18:39'),(41,22,'sidik@corporate.com',1,'2017-09-05 11:19:38','127.0.0.1','2017-09-05 04:19:38'),(42,22,'sidik@corporate.com',2,'2017-09-05 11:22:51','127.0.0.1','2017-09-05 04:22:51'),(43,23,'sidik@corporate.com',1,'2017-09-05 11:23:43','127.0.0.1','2017-09-05 04:23:43'),(44,23,'sidik@corporate.com',2,'2017-09-05 11:24:00','127.0.0.1','2017-09-05 04:24:00'),(45,24,'sidik@talent.com',1,'2017-09-05 11:27:21','127.0.0.1','2017-09-05 04:27:21'),(46,24,'sidik@talent.com',2,'2017-09-05 11:31:52','127.0.0.1','2017-09-05 04:31:52'),(47,25,'sidik@talent.com',1,'2017-09-05 11:32:42','127.0.0.1','2017-09-05 04:32:42'),(48,25,'sidik@talent.com',2,'2017-09-05 11:33:29','127.0.0.1','2017-09-05 04:33:29'),(49,25,'sidik@talent.com',1,'2017-09-05 11:34:30','127.0.0.1','2017-09-05 04:34:30'),(50,25,'sidik@talent.com',1,'2017-09-05 13:31:29','127.0.0.1','2017-09-05 06:31:29'),(51,26,'model01@model.com',1,'2017-09-05 16:49:52','127.0.0.1','2017-09-05 09:49:52'),(52,26,'model01@model.com',2,'2017-09-05 16:50:10','127.0.0.1','2017-09-05 09:50:10'),(53,56,'telent@talent.com',1,'2017-09-06 14:32:54','127.0.0.1','2017-09-06 07:32:54'),(54,56,'telent@talent.com',2,'2017-09-06 14:33:19','127.0.0.1','2017-09-06 07:33:19'),(55,1,'superuser',2,'2017-09-12 11:24:57','127.0.0.1','2017-09-12 04:24:57'),(56,26,'model01@model.com',1,'2017-10-06 16:31:12','127.0.0.1','2017-10-06 09:31:12'),(57,26,'model01@model.com',2,'2017-10-06 16:31:17','127.0.0.1','2017-10-06 09:31:17'),(58,26,'model01@model.com',1,'2017-10-06 16:31:19','127.0.0.1','2017-10-06 09:31:20'),(59,26,'model01@model.com',2,'2017-10-06 16:32:34','127.0.0.1','2017-10-06 09:32:34'),(60,26,'model01@model.com',1,'2017-10-06 16:32:37','127.0.0.1','2017-10-06 09:32:37'),(61,26,'model01@model.com',2,'2017-10-06 16:32:40','127.0.0.1','2017-10-06 09:32:40'),(62,26,'model01@model.com',1,'2017-10-06 16:32:54','127.0.0.1','2017-10-06 09:32:54'),(63,26,'model01@model.com',2,'2017-10-06 16:37:49','127.0.0.1','2017-10-06 09:37:49'),(64,26,'model01@model.com',1,'2017-10-06 16:37:52','127.0.0.1','2017-10-06 09:37:52'),(65,26,'model01@model.com',1,'2017-10-06 17:34:32','127.0.0.1','2017-10-06 10:34:32'),(66,26,'model01@model.com',2,'2017-10-06 17:34:47','127.0.0.1','2017-10-06 10:34:47'),(67,26,'model01@model.com',1,'2017-10-06 17:39:03','127.0.0.1','2017-10-06 10:39:03'),(68,26,'model01@model.com',2,'2017-10-06 17:41:37','127.0.0.1','2017-10-06 10:41:37'),(69,26,'model01@model.com',1,'2017-10-06 17:41:56','127.0.0.1','2017-10-06 10:41:56'),(70,26,'model01@model.com',2,'2017-10-06 17:42:27','127.0.0.1','2017-10-06 10:42:27'),(71,26,'model01@model.com',1,'2017-10-06 17:42:29','127.0.0.1','2017-10-06 10:42:29'),(72,26,'model01@model.com',1,'2017-10-06 17:42:36','127.0.0.1','2017-10-06 10:42:36'),(73,26,'model01@model.com',2,'2017-10-06 17:42:40','127.0.0.1','2017-10-06 10:42:40'),(74,26,'model01@model.com',1,'2017-10-06 17:42:43','127.0.0.1','2017-10-06 10:42:43'),(75,26,'model01@model.com',2,'2017-10-06 17:43:24','127.0.0.1','2017-10-06 10:43:24'),(76,26,'model01@model.com',1,'2017-10-06 17:43:26','127.0.0.1','2017-10-06 10:43:26'),(77,26,'model01@model.com',2,'2017-10-06 17:43:30','127.0.0.1','2017-10-06 10:43:30'),(78,26,'model01@model.com',1,'2017-10-06 17:43:32','127.0.0.1','2017-10-06 10:43:32'),(79,26,'model01@model.com',2,'2017-10-06 17:43:36','127.0.0.1','2017-10-06 10:43:36'),(80,26,'model01@model.com',1,'2017-10-06 17:47:34','127.0.0.1','2017-10-06 10:47:34'),(81,26,'model01@model.com',2,'2017-10-06 17:47:39','127.0.0.1','2017-10-06 10:47:39'),(82,26,'model01@model.com',1,'2017-10-06 17:47:45','127.0.0.1','2017-10-06 10:47:45'),(83,26,'model01@model.com',1,'2017-10-06 19:30:46','127.0.0.1','2017-10-06 12:30:46'),(84,0,'',2,'2017-10-06 20:26:02','127.0.0.1','2017-10-06 13:26:02'),(85,26,'model01@model.com',1,'2017-10-06 20:26:04','127.0.0.1','2017-10-06 13:26:04'),(86,1,'superuser',2,'2017-10-10 15:24:02','127.0.0.1','2017-10-10 08:24:02'),(87,26,'model01@model.com',1,'2017-10-10 15:25:09','127.0.0.1','2017-10-10 08:25:09'),(88,26,'model01@model.com',2,'2017-10-10 15:25:17','127.0.0.1','2017-10-10 08:25:17'),(89,57,'warih@model.com',1,'2017-10-10 15:47:04','127.0.0.1','2017-10-10 08:47:04'),(90,57,'warih@model.com',2,'2017-10-10 15:52:44','127.0.0.1','2017-10-10 08:52:44'),(91,58,'warih@personal.com',1,'2017-10-10 15:54:04','127.0.0.1','2017-10-10 08:54:04'),(92,58,'warih@personal.com',2,'2017-10-10 15:54:29','127.0.0.1','2017-10-10 08:54:29'),(93,59,'warih@agency.com',1,'2017-10-10 15:55:29','127.0.0.1','2017-10-10 08:55:29'),(94,59,'warih@agency.com',2,'2017-10-10 15:55:35','127.0.0.1','2017-10-10 08:55:35'),(95,60,'warih@coorporate.com',1,'2017-10-10 15:57:13','127.0.0.1','2017-10-10 08:57:13'),(96,60,'warih@coorporate.com',2,'2017-10-10 15:59:44','127.0.0.1','2017-10-10 08:59:44'),(97,26,'model01@model.com',1,'2017-10-10 16:48:57','127.0.0.1','2017-10-10 09:48:57'),(98,26,'model01@model.com',1,'2017-10-10 18:29:05','127.0.0.1','2017-10-10 11:29:05'),(99,26,'model01@model.com',2,'2017-10-10 18:37:25','127.0.0.1','2017-10-10 11:37:25'),(100,26,'model01@model.com',1,'2017-10-10 18:38:51','127.0.0.1','2017-10-10 11:38:51'),(101,0,'',2,'2017-10-11 07:51:15','127.0.0.1','2017-10-11 00:51:15'),(102,26,'model01@model.com',1,'2017-10-11 07:51:25','127.0.0.1','2017-10-11 00:51:25'),(103,26,'model01@model.com',1,'2017-10-11 08:45:54','127.0.0.1','2017-10-11 01:45:54'),(104,19,'sidik@personal.com',1,'2017-10-11 15:43:37','127.0.0.1','2017-10-11 08:43:37'),(105,19,'sidik@personal.com',1,'2017-10-12 07:35:49','127.0.0.1','2017-10-12 00:35:49'),(106,19,'sidik@personal.com',2,'2017-10-12 07:42:57','127.0.0.1','2017-10-12 00:42:57'),(107,19,'sidik@personal.com',1,'2017-10-12 07:47:48','127.0.0.1','2017-10-12 00:47:48'),(108,19,'sidik@personal.com',1,'2017-10-12 10:13:06','127.0.0.1','2017-10-12 03:13:06'),(109,26,'model01@model.com',1,'2017-10-12 15:27:22','127.0.0.1','2017-10-12 08:27:22'),(110,26,'model01@model.com',2,'2017-10-12 15:30:47','127.0.0.1','2017-10-12 08:30:47'),(111,19,'sidik@personal.com',1,'2017-10-12 15:30:56','127.0.0.1','2017-10-12 08:30:56'),(112,19,'sidik@personal.com',2,'2017-10-12 15:31:01','127.0.0.1','2017-10-12 08:31:01'),(113,19,'sidik@personal.com',1,'2017-10-12 15:31:42','127.0.0.1','2017-10-12 08:31:42'),(114,19,'sidik@personal.com',2,'2017-10-12 15:31:57','127.0.0.1','2017-10-12 08:31:57'),(115,26,'model01@model.com',1,'2017-10-12 15:32:03','127.0.0.1','2017-10-12 08:32:03'),(116,26,'model01@model.com',1,'2017-10-12 17:22:11','127.0.0.1','2017-10-12 10:22:11'),(117,26,'model01@model.com',2,'2017-10-12 17:23:26','127.0.0.1','2017-10-12 10:23:26'),(118,26,'model01@model.com',1,'2017-10-12 17:23:32','127.0.0.1','2017-10-12 10:23:32'),(119,26,'model01@model.com',1,'2017-10-12 19:30:57','127.0.0.1','2017-10-12 12:30:57'),(120,26,'model01@model.com',1,'2017-10-12 21:03:40','127.0.0.1','2017-10-12 14:03:40'),(121,26,'model01@model.com',1,'2017-10-12 23:08:39','127.0.0.1','2017-10-12 16:08:39'),(122,26,'model01@model.com',2,'2017-10-12 23:11:11','127.0.0.1','2017-10-12 16:11:11'),(123,1,'superuser',1,'2017-10-12 23:11:16','127.0.0.1','2017-10-12 16:11:16'),(124,1,'superuser',2,'2017-10-12 23:29:21','127.0.0.1','2017-10-12 16:29:21'),(125,26,'model01@model.com',1,'2017-10-12 23:29:29','127.0.0.1','2017-10-12 16:29:29'),(126,0,'',2,'2017-10-13 00:25:40','127.0.0.1','2017-10-12 17:25:40'),(127,19,'sidik@personal.com',1,'2017-10-13 00:25:53','127.0.0.1','2017-10-12 17:25:53'),(128,19,'sidik@personal.com',1,'2017-10-13 04:54:15','127.0.0.1','2017-10-12 21:54:15'),(129,19,'sidik@personal.com',2,'2017-10-13 06:18:31','127.0.0.1','2017-10-12 23:18:31'),(130,26,'model01@model.com',1,'2017-10-13 06:18:41','127.0.0.1','2017-10-12 23:18:41'),(131,26,'model01@model.com',2,'2017-10-13 06:18:59','127.0.0.1','2017-10-12 23:18:59'),(132,19,'sidik@personal.com',1,'2017-10-13 06:19:06','127.0.0.1','2017-10-12 23:19:06'),(133,19,'sidik@personal.com',2,'2017-10-13 06:20:10','127.0.0.1','2017-10-12 23:20:10'),(134,1,'superuser',1,'2017-10-13 06:20:15','127.0.0.1','2017-10-12 23:20:15'),(135,1,'superuser',1,'2017-10-13 07:09:12','127.0.0.1','2017-10-13 00:09:12'),(136,1,'superuser',2,'2017-10-13 07:29:25','127.0.0.1','2017-10-13 00:29:25'),(137,19,'sidik@personal.com',1,'2017-10-13 07:29:34','127.0.0.1','2017-10-13 00:29:34'),(138,19,'sidik@personal.com',1,'2017-10-13 08:51:20','127.0.0.1','2017-10-13 01:51:20'),(139,19,'sidik@personal.com',2,'2017-10-13 09:10:42','127.0.0.1','2017-10-13 02:10:42'),(140,1,'superuser',1,'2017-10-13 09:10:48','127.0.0.1','2017-10-13 02:10:48'),(141,1,'superuser',2,'2017-10-13 09:11:01','127.0.0.1','2017-10-13 02:11:01'),(142,61,'rudi@model.com',1,'2017-10-13 11:18:29','127.0.0.1','2017-10-13 04:18:29'),(143,61,'rudi@model.com',2,'2017-10-13 11:19:34','127.0.0.1','2017-10-13 04:19:34'),(144,19,'sidik@personal.com',1,'2017-10-13 11:19:57','127.0.0.1','2017-10-13 04:19:57'),(145,19,'sidik@personal.com',2,'2017-10-13 11:27:50','127.0.0.1','2017-10-13 04:27:50'),(146,1,'superuser',1,'2017-10-13 11:27:58','127.0.0.1','2017-10-13 04:27:58'),(147,1,'superuser',2,'2017-10-13 11:28:57','127.0.0.1','2017-10-13 04:28:57'),(148,26,'model01@model.com',1,'2017-10-13 11:29:13','127.0.0.1','2017-10-13 04:29:13'),(149,26,'model01@model.com',2,'2017-10-13 11:30:15','127.0.0.1','2017-10-13 04:30:15'),(150,19,'sidik@personal.com',1,'2017-10-13 11:30:28','127.0.0.1','2017-10-13 04:30:28'),(151,19,'sidik@personal.com',2,'2017-10-13 11:30:40','127.0.0.1','2017-10-13 04:30:40'),(152,19,'sidik@personal.com',1,'2017-10-13 11:31:43','127.0.0.1','2017-10-13 04:31:43'),(153,19,'sidik@personal.com',2,'2017-10-13 11:33:23','127.0.0.1','2017-10-13 04:33:23'),(154,1,'superuser',1,'2017-10-13 11:33:29','127.0.0.1','2017-10-13 04:33:30'),(155,1,'superuser',2,'2017-10-13 11:33:59','127.0.0.1','2017-10-13 04:33:59'),(156,19,'sidik@personal.com',1,'2017-10-13 11:34:08','127.0.0.1','2017-10-13 04:34:08'),(157,19,'sidik@personal.com',1,'2017-10-13 12:48:56','127.0.0.1','2017-10-13 05:48:56');
/*!40000 ALTER TABLE `a_log_histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `a_users`
--

DROP TABLE IF EXISTS `a_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '999',
  `sign_in_count` int(11) NOT NULL,
  `current_sign_in_at` datetime DEFAULT NULL,
  `last_sign_in_at` datetime DEFAULT NULL,
  `current_sign_in_ip` varchar(20) DEFAULT NULL,
  `last_sign_in_ip` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_users`
--

LOCK TABLES `a_users` WRITE;
/*!40000 ALTER TABLE `a_users` DISABLE KEYS */;
INSERT INTO `a_users` VALUES (1,0,'superuser','MTIzNDU2','superuser',0,28,'2017-10-13 11:33:29','2017-10-13 11:27:58','127.0.0.1','127.0.0.1','2017-04-27 08:39:07','127.0.0.1','superuser','2017-10-13 11:33:29','superuser','127.0.0.1','2017-10-13 04:33:29'),(2,1,'admin','MTIzNDU2','Administrator',999,37,'2017-08-13 18:51:11','2017-08-13 18:43:14','127.0.0.1','127.0.0.1','2017-08-13 17:31:44','superuser','127.0.0.1','2017-08-13 17:53:47','admin','127.0.0.1','2017-08-17 07:36:54'),(19,-1,'sidik@personal.com','MTIzNDU2','sidik personal permana',2,16,'2017-10-13 12:48:56','2017-10-13 11:34:08','127.0.0.1','127.0.0.1','2017-09-05 11:11:56','','127.0.0.1','2017-10-13 12:48:56','sidik@personal.com','127.0.0.1','2017-10-13 05:48:56'),(20,-1,'sidik@agency.com','c2lkaWthZ2VuY3k=','sidik agency permana',3,0,NULL,NULL,NULL,NULL,'2017-09-05 11:15:57','','127.0.0.1','2017-09-05 11:15:57','','127.0.0.1','2017-09-05 04:15:57'),(23,-1,'sidik@corporate.com','c2lkaWtjb3Jwb3JhdGU=','sidik corporate permana',4,0,NULL,NULL,NULL,NULL,'2017-09-05 11:23:43','','127.0.0.1','2017-09-05 11:23:43','','127.0.0.1','2017-09-05 04:23:43'),(26,-1,'model01@model.com','MTIzNDU2','Dewi',5,34,'2017-10-13 11:29:13','2017-10-13 06:18:41','127.0.0.1','127.0.0.1','0000-00-00 00:00:00','',NULL,'2017-10-13 11:29:13','model01@model.com','127.0.0.1','2017-10-13 04:29:13'),(27,-1,'model02@model.com','MTIzNDU2','Dinda Nyai',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(28,-1,'model03@model.com','MTIzNDU2','Winda',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(29,-1,'model04@model.com','MTIzNDU2','Nurhayatin',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(30,-1,'model05@model.com','MTIzNDU2','Liez',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(31,-1,'model06@model.com','MTIzNDU2','Shinta',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(32,-1,'model07@model.com','MTIzNDU2','Arsyih',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(33,-1,'model08@model.com','MTIzNDU2','Cornel',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(34,-1,'model09@model.com','MTIzNDU2','Karina',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(35,-1,'model10@model.com','MTIzNDU2','Dharety',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(36,-1,'model11@model.com','MTIzNDU2','Vika',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(37,-1,'model12@model.com','MTIzNDU2','Astrid Tiar',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(38,-1,'model13@model.com','MTIzNDU2','Erna Wati',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(39,-1,'model14@model.com','MTIzNDU2','Noer',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(40,-1,'model15@model.com','MTIzNDU2','Etik W',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(41,-1,'model16@model.com','MTIzNDU2','Ari',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(42,-1,'model17@model.com','MTIzNDU2','Fera H',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(43,-1,'model18@model.com','MTIzNDU2','Mega J',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(44,-1,'model19@model.com','MTIzNDU2','Florensia',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(45,-1,'model20@model.com','MTIzNDU2','Marcelia',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(46,-1,'model21@model.com','MTIzNDU2','Reza',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(47,-1,'model22@model.com','MTIzNDU2','Dikoy S',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(48,-1,'model23@model.com','MTIzNDU2','Umbaka',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(49,-1,'model24@model.com','MTIzNDU2','Kasino',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(50,-1,'model25@model.com','MTIzNDU2','Dono',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(51,-1,'model26@model.com','MTIzNDU2','Dzikri A',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(52,-1,'model27@model.com','MTIzNDU2','Andik',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(53,-1,'model28@model.com','MTIzNDU2','Dody S',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(54,-1,'model29@model.com','MTIzNDU2','Firman K',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(55,-1,'model30@model.com','MTIzNDU2','May F',5,0,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 06:56:48'),(56,-1,'telent@talent.com','MTIzMTIz','Talent q',5,0,NULL,NULL,NULL,NULL,'2017-09-06 14:32:54','','127.0.0.1','2017-09-06 14:32:54','','127.0.0.1','2017-09-06 07:32:54'),(57,-1,'warih@model.com','MTIzMTIz','Warih Hadi Suryono',5,0,NULL,NULL,NULL,NULL,'2017-10-10 15:47:04','','127.0.0.1','2017-10-10 15:47:04','','127.0.0.1','2017-10-10 08:47:04'),(58,-1,'warih@personal.com','MTIzMTIz','Warih Personal Suryono',2,0,NULL,NULL,NULL,NULL,'2017-10-10 15:54:04','','127.0.0.1','2017-10-10 15:54:04','','127.0.0.1','2017-10-10 08:54:04'),(59,-1,'warih@agency.com','MTIzMTIz','Warih Agency Suryono23',3,0,NULL,NULL,NULL,NULL,'2017-10-10 15:55:29','','127.0.0.1','2017-10-10 15:55:29','','127.0.0.1','2017-10-10 08:55:29'),(60,-1,'warih@coorporate.com','MTIzMTIz','PT Warih Suryono',4,0,NULL,NULL,NULL,NULL,'2017-10-10 15:57:13','','127.0.0.1','2017-10-10 15:57:13','','127.0.0.1','2017-10-10 08:57:13'),(61,-1,'rudi@model.com','MTIzNDU2','Rudi ',5,0,NULL,NULL,NULL,NULL,'2017-10-13 11:18:29','','127.0.0.1','2017-10-13 11:18:29','','127.0.0.1','2017-10-13 04:18:29');
/*!40000 ALTER TABLE `a_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agency_models`
--

DROP TABLE IF EXISTS `agency_models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agency_models` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_profile_id` int(11) NOT NULL,
  `join_status` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `talent_profile_id` (`model_profile_id`),
  KEY `join_status` (`join_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agency_models`
--

LOCK TABLES `agency_models` WRITE;
/*!40000 ALTER TABLE `agency_models` DISABLE KEYS */;
/*!40000 ALTER TABLE `agency_models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agency_profiles`
--

DROP TABLE IF EXISTS `agency_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agency_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `idcard` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `zipcode` varchar(7) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `cellphone` varchar(30) NOT NULL,
  `web` varchar(255) NOT NULL,
  `nationality_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `ig` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `nationality_id` (`nationality_id`),
  KEY `gender_id` (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agency_profiles`
--

LOCK TABLES `agency_profiles` WRITE;
/*!40000 ALTER TABLE `agency_profiles` DISABLE KEYS */;
INSERT INTO `agency_profiles` VALUES (1,20,'sidik agency permana','sidik permana','001','ciledug B','789456','081526','021532','http',32,1,'3_20.jpg','sidik ','sidik','sidik','about sidik agency','2017-09-05 11:15:57','sidik@agency.com','127.0.0.1','2017-09-05 11:15:57','sidik@agency.com','127.0.0.1','2017-09-05 04:15:57'),(2,59,'Warih Agency Suryono23','Warih','3843284932','Tangerang','13211','08213123','098234324','www.warihagency.com',47,2,'3_59.jpg','-','-','-','-','2017-10-10 15:55:29','warih@agency.com','127.0.0.1','2017-10-10 15:55:30','warih@agency.com','127.0.0.1','2017-10-10 08:55:30');
/*!40000 ALTER TABLE `agency_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applied_jobs`
--

DROP TABLE IF EXISTS `applied_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applied_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_giver_user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `job_id` (`job_id`),
  KEY `job_giver_user_id` (`job_giver_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applied_jobs`
--

LOCK TABLES `applied_jobs` WRITE;
/*!40000 ALTER TABLE `applied_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `applied_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `casting_start` date NOT NULL,
  `casting_end` date NOT NULL,
  `casting_address` text NOT NULL,
  `casting_location` int(11) NOT NULL,
  `fee` double NOT NULL,
  `status` smallint(6) NOT NULL,
  `accepted` smallint(6) NOT NULL,
  `accepted_notes` text NOT NULL,
  `accepted_at` datetime NOT NULL,
  `accepted_ip` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `accepted` (`accepted`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (1,19,26,'Job Description\r\nsdfjlkasdjfklas\r\njsdklfjasdklfja\r\nsdjfklsadjfklasd','2017-10-01','2017-10-31','Casting Address\r\nsdflkajdsfk\r\nsdjfklajsdkl',27,5600000,2,1,'tidak minat','2017-10-13 11:29:35','127.0.0.1','2017-10-12 10:15:12','sidik@personal.com','127.0.0.1','2017-10-13 11:29:35','model01@model.com','127.0.0.1','2017-10-13 04:29:35'),(2,19,26,'Job Description\r\nsadfklasdjfak\r\nsdjfklajsdkfla\r\njsdfjaslfjasldfjdaslkjf','2017-10-01','2017-10-31','Casting Address\r\nsdjfkasdjfa\r\njdslfkjasdklfja\r\njdsklfjasdkjfaksdl',27,5400000,2,1,'','2017-10-13 06:18:55','127.0.0.1','2017-10-12 11:02:41','sidik@personal.com','127.0.0.1','2017-10-13 06:18:55','model01@model.com','127.0.0.1','2017-10-12 23:18:55'),(3,19,26,'Job Description 2\r\nsdjfkajsdfkl\r\njsdkfjasdkfja\r\njsdkfjasdkl','2017-10-01','2017-10-31','Casting Address\r\ndsjfkladsjfkads\r\njdskfjasdklfasdj\r\nsdjfkasdjfkasdjfklasd',27,4600000,0,0,'','0000-00-00 00:00:00','','2017-10-12 11:05:44','sidik@personal.com','127.0.0.1','2017-10-12 11:05:44','sidik@personal.com','127.0.0.1','2017-10-12 04:05:44'),(4,19,26,'Job\r\nsdkfjasdlkfjsad\r\ndjkfljsadlkfjalsd\r\nsdjklfjsadlkfjals','2017-10-13','2017-10-15','Address',27,1000000,0,0,'','0000-00-00 00:00:00','','2017-10-13 11:22:06','sidik@personal.com','127.0.0.1','2017-10-13 11:22:06','sidik@personal.com','127.0.0.1','2017-10-13 04:22:06');
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `corporate_profiles`
--

DROP TABLE IF EXISTS `corporate_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `corporate_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `zipcode` varchar(7) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `cellphone` varchar(30) NOT NULL,
  `web` varchar(255) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `ig` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `corporate_profiles`
--

LOCK TABLES `corporate_profiles` WRITE;
/*!40000 ALTER TABLE `corporate_profiles` DISABLE KEYS */;
INSERT INTO `corporate_profiles` VALUES (1,23,'sidik corporate permana','sidik permana c','ciledug c','456789','0818456456','021456456','www.','897456512316','4_23.png','sidik','sidikd','sidik','about sidik','2017-09-05 11:23:43','sidik@corporate.com','127.0.0.1','2017-09-05 11:23:43','sidik@corporate.com','127.0.0.1','2017-09-05 04:23:43'),(2,60,'PT Warih Suryono','Mas Warih','Tambun','1321','08423423','093247238423','www.warih-coorporate.com','21830912839012','4_60.jpg','-','-','-','-','2017-10-10 15:57:13','warih@coorporate.com','127.0.0.1','2017-10-10 15:57:13','warih@coorporate.com','127.0.0.1','2017-10-10 08:57:13');
/*!40000 ALTER TABLE `corporate_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eye_colors`
--

DROP TABLE IF EXISTS `eye_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eye_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eye_colors`
--

LOCK TABLES `eye_colors` WRITE;
/*!40000 ALTER TABLE `eye_colors` DISABLE KEYS */;
INSERT INTO `eye_colors` VALUES (1,'black','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:28:09'),(2,'Brown','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:28:09'),(3,'Amber','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:28:09'),(4,'Blue','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:28:09'),(5,'Blue-Gray','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:28:09'),(6,'Green','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:28:09'),(7,'Gray','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:28:09'),(8,'Hazel','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:28:09'),(9,'Spectrum of colours','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:28:09'),(10,'Violet','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:28:09');
/*!40000 ALTER TABLE `eye_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genders`
--

LOCK TABLES `genders` WRITE;
/*!40000 ALTER TABLE `genders` DISABLE KEYS */;
INSERT INTO `genders` VALUES (1,'Male','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-04 02:06:30'),(2,'Female','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-04 02:07:15');
/*!40000 ALTER TABLE `genders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hair_colors`
--

DROP TABLE IF EXISTS `hair_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hair_colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hair_colors`
--

LOCK TABLES `hair_colors` WRITE;
/*!40000 ALTER TABLE `hair_colors` DISABLE KEYS */;
INSERT INTO `hair_colors` VALUES (1,'Black','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:30:44'),(2,'Brown','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:30:44'),(3,'Blond','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:30:44'),(4,'Auburn','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:30:44'),(5,'Red','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:30:44'),(6,'Gray','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:30:44'),(7,'White','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:30:44');
/*!40000 ALTER TABLE `hair_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hiring_process_history`
--

DROP TABLE IF EXISTS `hiring_process_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hiring_process_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applied_job_id` int(11) NOT NULL,
  `hiring_status` int(11) NOT NULL,
  `status_trans` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `applied_job_id` (`applied_job_id`),
  KEY `hiring_status` (`hiring_status`),
  KEY `status_trans` (`status_trans`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hiring_process_history`
--

LOCK TABLES `hiring_process_history` WRITE;
/*!40000 ALTER TABLE `hiring_process_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `hiring_process_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hiring_status`
--

DROP TABLE IF EXISTS `hiring_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hiring_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hiring_status`
--

LOCK TABLES `hiring_status` WRITE;
/*!40000 ALTER TABLE `hiring_status` DISABLE KEYS */;
INSERT INTO `hiring_status` VALUES (1,'Interview','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:37:09'),(2,'Casting','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:37:09'),(3,'Audition','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:37:09'),(4,'Hired','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:37:09');
/*!40000 ALTER TABLE `hiring_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mode` smallint(6) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `ammount` double NOT NULL,
  `uniq_code` double NOT NULL,
  `total` double NOT NULL,
  `method` varchar(50) NOT NULL,
  `bank_an` varchar(100) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `transfer_at` date NOT NULL,
  `account` varchar(50) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (1,'INV/BOOK/171012/003',19,1,1,0,0,0,'','','','2017-10-13','',1,'2017-10-12 10:15:12','sidik@personal.com','127.0.0.1','2017-10-13 11:28:50','superuser','127.0.0.1','2017-10-13 04:28:50'),(2,'INV/BOOK/171012/',19,1,2,5400000,825,5400825,'','','','2017-10-12','',1,'2017-10-12 11:02:41','sidik@personal.com','127.0.0.1','2017-10-12 23:29:11','superuser','127.0.0.1','2017-10-12 16:29:11'),(3,'INV/BOOK/171012/003',19,1,3,4600000,89,4600089,'transfer','Warih Hadi Suryono','BCA','2017-10-12','32423432',1,'2017-10-12 11:05:44','sidik@personal.com','127.0.0.1','2017-10-12 11:11:15','sidik@personal.com','127.0.0.1','2017-10-12 04:11:15'),(4,'INV/BOOK/171013/001',19,1,4,1000000,756,1000756,'transfer','Warih Hadi Suryono','BCA','2017-10-13','32423432',1,'2017-10-13 11:22:06','sidik@personal.com','127.0.0.1','2017-10-13 11:27:39','sidik@personal.com','127.0.0.1','2017-10-13 04:27:39');
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `job_giver_user_id` int(11) NOT NULL,
  `work_category_ids` varchar(100) NOT NULL,
  `model_category_ids` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `requirement` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `experience_years` int(11) NOT NULL,
  `gender_ids` varchar(10) NOT NULL,
  `age_min` int(11) NOT NULL,
  `age_max` int(11) NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `is_publish` smallint(6) NOT NULL,
  `publish_at` date NOT NULL,
  `publish_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `job_giver_user_id` (`job_giver_user_id`),
  KEY `work_category_ids` (`work_category_ids`),
  KEY `talent_category_ids` (`model_category_ids`),
  KEY `experience_years` (`experience_years`),
  KEY `gender_ids` (`gender_ids`),
  KEY `age_min` (`age_min`,`age_max`),
  KEY `start_at` (`start_at`,`end_at`),
  KEY `is_publish` (`is_publish`),
  KEY `publish_at` (`publish_at`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (4,'Title Sesi Foto',19,'|2||3||4|','|2||3|','Job Description\r\nsadkfadjka\r\nsadjflasjflka\r\njdkfajklfa','Requirement\r\nsdfkldsajfa\r\nsdjfkjasdfjads\r\njdskfjsdfjasdjkfas','19_4.png',2,'|1||2|',22,35,'2017-10-01','2017-10-31',1,'2017-10-13','superuser','2017-10-13 05:18:27','sidik@personal.com','127.0.0.1','2017-10-13 07:29:11','superuser','127.0.0.1','2017-10-13 00:29:11'),(5,'Pemotretan Cover MAjalah',19,'|3|','|2||3|','Job Description\r\nsdkfjadksf\r\ndhsfjkjadklfjad\r\njdsklfjasdlkjfadk','Requirement\r\nsdnfjasdklfjasd\r\nsdkjfjsadkljfasdlkfs\r\nksdlfjlksadjfklasdjklfasd','19_5.png',1,'|2|',18,30,'2017-10-20','2017-10-31',1,'2017-10-13','superuser','2017-10-13 09:10:29','sidik@personal.com','127.0.0.1','2017-10-13 09:10:59','superuser','127.0.0.1','2017-10-13 02:10:59'),(6,'Casting Foto Iklan',19,'|1|','|3|','kjsdklfjads\r\nsdjkflasjdfl;as','fasdfasddfs\r\nfdsafasdf','19_6.png',1,'|2|',26,30,'2017-10-24','2017-10-31',1,'2017-10-13','superuser','2017-10-13 11:32:52','sidik@personal.com','127.0.0.1','2017-10-13 11:33:45','superuser','127.0.0.1','2017-10-13 04:33:45');
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seqno` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `name_id` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `province_id` (`province_id`,`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,1,0,0,'Apa saja','Any','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(2,500,1,0,'DI-Aceh','DI-Aceh','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(3,505,1,1,'Banda Aceh','Banda Aceh','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(4,510,1,2,'Lhokseumawe','Lhokseumawe','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(5,515,1,3,'Sabang','Sabang','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(6,3600,2,0,'Sumatera Utara','Sumatra, North','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(7,3610,2,4,'Medan','Medan','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(8,3615,2,82,'Padangsidempuan','Padangsidempuan','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(9,3605,2,92,'Binjai','Binjai','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(10,3400,3,0,'Sumatera Barat','Sumatra, West','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(11,3405,3,5,'Bukittinggi','Bukittinggi','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(12,3410,3,6,'Padang','Padang','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(13,3415,3,7,'Padang Panjang','Padang Panjang','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(14,2700,4,0,'Riau','Riau','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(15,2705,4,8,'Batam','Batam','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(16,2710,4,9,'Pekanbaru','Pekanbaru','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(17,2715,4,10,'Tanjung Pinang','Tanjung Pinang','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(18,900,5,0,'Jambi','Jambi','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(19,905,5,11,'Jambi','Jambi','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(20,3500,6,0,'Sumatera Selatan','Sumatra, South','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(21,3505,6,12,'Palembang','Palembang','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(22,400,7,0,'Bengkulu','Bengkulu','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(23,405,7,13,'Bengkulu','Bengkulu','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(24,2000,8,0,'Lampung','Lampung','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(25,2005,8,14,'Bandarlampung','Bandarlampung','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(26,2010,8,15,'Tanjungkarang','Tanjungkarang','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(27,700,9,0,'Jakarta','Jakarta','2016-03-12 08:28:34','','127.0.0.1','2016-08-15 09:42:33','adi@jalurkerja.com','140.0.234.42','2016-08-15 09:42:33'),(29,1000,10,0,'Jawa Barat','Java, West','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(30,1005,10,17,'Bandung','Bandung','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(31,1010,10,18,'Bekasi','Bekasi','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(32,1015,10,19,'Bogor','Bogor','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(33,1020,10,20,'Cibinong','Cibinong','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(34,1025,10,21,'Cikarang','Cikarang','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(35,1040,10,22,'Cirebon','Cirebon','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 08:28:34','','127.0.0.1','2016-03-12 01:28:34'),(36,1045,10,23,'Depok','Depok','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(37,1050,10,24,'Karawang','Karawang','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(38,1055,10,25,'Lembang','Lembang','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(39,1035,10,26,'Cimahi','Cimahi','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(40,1060,10,27,'Purwakarta','Purwakarta','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(41,1065,10,28,'Subang','Subang','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(42,1070,10,29,'Sukabumi','Sukabumi','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(43,1075,10,93,'Tasikmalaya','Tasikmalaya','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(44,1016,10,115,'Cianjur','Cianjur','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(45,1200,11,0,'Jawa Tengah','Java, Central','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(46,1345,11,30,'Solo','Solo','2016-03-12 08:28:35','','127.0.0.1','2016-08-15 09:41:29','adi@jalurkerja.com','140.0.234.42','2016-08-15 09:41:29'),(47,1220,11,32,'Blora','Blora','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(48,1230,11,33,'Brebes','Brebes','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(49,1235,11,34,'Cilacap','Cilacap','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(50,1245,11,35,'Jepara','Jepara','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(51,1265,11,36,'Kudus','Kudus','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(52,1270,11,37,'Magelang','Magelang','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(53,1290,11,38,'Purbalingga','Purbalingga','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(54,1295,11,39,'Purwokerto','Purwokerto','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(55,1315,11,40,'Salatiga','Salatiga','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(56,1320,11,41,'Semarang','Semarang','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(58,1350,11,43,'Tegal','Tegal','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(59,1310,11,90,'Rembang','Rembang','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(60,1285,11,91,'Pemalang','Pemalang','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(61,1225,11,95,'Boyolali','Boyolali','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(62,1300,11,96,'Purwodadi','Purwodadi','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(63,1250,11,97,'Karanganyar','Karanganyar','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(64,1355,11,98,'Temanggung','Temanggung','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(65,1325,11,99,'Slawi','Slawi','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(66,1210,11,100,'Banyumas','Banyumas','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(67,1260,11,101,'Klaten','Klaten','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(68,1280,11,102,'Pekalongan','Pekalongan','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(69,1335,11,103,'Sragen','Sragen','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(70,1340,11,104,'Sukoharjo','Sukoharjo','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(71,1215,11,105,'Batang','Batang','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(72,1205,11,106,'Banjarnegara','Banjarnegara','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(73,1255,11,107,'Kendal','Kendal','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(74,1305,11,108,'Purworejo','Purworejo','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(75,1240,11,109,'Demak','Demak','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(76,1275,11,110,'Pati','Pati','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(77,600,12,0,'DI-Yogyakarta','DI-Yogyakarta','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(78,625,12,44,'Yogyakarta','Yogyakarta','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(79,605,12,111,'Bantul','Bantul','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(80,615,12,112,'Kulon Progo','Kulon Progo','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(81,620,12,113,'Sleman','Sleman','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(82,610,12,114,'Gunung Kidul','Gunung Kidul','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(83,1500,13,0,'Jawa Timur','Java, East','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(84,1505,13,45,'Banyuwangi','Banyuwangi','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(85,1510,13,46,'Blitar','Blitar','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(86,1515,13,47,'Gresik','Gresik','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(87,1520,13,48,'Jember','Jember','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(88,1530,13,49,'Kediri','Kediri','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(89,1535,13,50,'Madiun','Madiun','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(90,1540,13,51,'Malang','Malang','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(91,1545,13,52,'Ngawi','Ngawi','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(92,1550,13,53,'Pasuruan','Pasuruan','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(93,1555,13,54,'Probolinggo','Probolinggo','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 08:28:35','','127.0.0.1','2016-03-12 01:28:35'),(94,1560,13,55,'Sidoarjo','Sidoarjo','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(95,1565,13,56,'Surabaya','Surabaya','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(96,1570,13,57,'Tuban','Tuban','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(97,1575,13,58,'Tulungagung','Tulungagung','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(98,1525,13,59,'Jombang','Jombang','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(99,100,14,0,'Bali','Bali','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(100,105,14,59,'Denpasar','Denpasar','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(101,110,14,60,'Jimbaran','Jimbaran','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(102,115,14,61,'Kuta','Kuta','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(103,120,14,62,'Tabanan','Tabanan','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(104,125,14,63,'Ubud','Ubud','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(105,2300,15,0,'Nusa Tenggara Barat','Nusa Tenggara, West','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(106,2305,15,64,'Mataram','Mataram','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(107,2400,16,0,'Nusa Tenggara Timur','Nusa Tenggara, East','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(108,2405,16,65,'Kupang','Kupang','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(109,2404,16,117,'Ende','Ende','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(110,2409,16,118,'Maumere','Maumere','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(111,1600,17,0,'Kalimantan Barat','Kalimantan, West','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(112,1605,17,64,'Pontianak','Pontianak','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(113,1900,18,0,'Kalimantan Timur','Kalimantan, East','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(114,1910,18,65,'Samarinda','Samarinda','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(115,1905,18,85,'Balikpapan','Balikpapan','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(116,1700,19,0,'Kalimantan Selatan','Kalimantan, South','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(117,1705,19,66,'Banjarmasin','Banjarmasin','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(118,1710,10,122,'Banjar','Banjar','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-09-13 02:37:46'),(119,1800,20,0,'Kalimantan Tengah','Kalimantan, Central','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(120,1805,20,67,'Palangkaraya','Palangkaraya','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(121,3300,21,0,'Sulawesi Utara','Sulawesi, North','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(122,3305,21,68,'Manado','Manado','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(123,3000,22,0,'Sulawesi Selatan','Sulawesi, South','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(124,3005,22,69,'Makassar','Makassar','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(125,3200,23,0,'Sulawesi Tenggara','Sulawesi, South East','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(126,3205,23,70,'Kendari','Kendari','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(127,3100,24,0,'Sulawesi Tengah','Sulawesi, Central','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(128,3105,24,71,'Palu','Palu','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(129,2100,25,0,'Maluku','Maluku','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(130,2105,25,72,'Ambon','Ambon','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(131,2500,26,0,'Papua','Papua','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(132,2505,26,75,'Biak','Biak','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(133,2510,26,76,'Jayapura','Jayapura','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(134,2520,26,77,'Merauke','Merauke','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(135,2515,26,78,'Martapura','Martapura','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(136,2525,26,79,'Sorong','Sorong','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(137,2530,26,80,'Tembagapura','Tembagapura','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(138,2535,26,81,'Wamena','Wamena','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(139,300,27,0,'Banten','Banten','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(140,320,27,31,'Tangerang','Tangerang','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(141,315,27,84,'Serang','Serang','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(142,310,27,88,'Rangkasbitung','Rangkasbitung','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(143,305,27,89,'Pandeglang','Pandeglang','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(144,301,27,94,'Cilegon','Cilegon','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(145,200,28,0,'Bangka - Belitung','Bangka - Belitung','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(146,205,28,83,'Pangkalpinang','Pangkalpinang','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(147,2200,29,0,'Maluku Utara','North Maluku','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(148,2205,29,86,'Ternate','Ternate','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(149,800,30,0,'Gorontalo','Gorontalo','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(150,805,30,87,'Gorontalo','Gorontalo','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(151,2800,31,0,'Riau Kepulauan','Riau Island','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(152,2900,32,0,'Sulawesi Barat','Sulawesi, West','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(153,2600,33,0,'Papua Barat','Papua, West','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(154,3700,99,999,'Di luar Indonesia','Outside Indonesia','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 08:28:36','','127.0.0.1','2016-03-12 01:28:36'),(155,1341,11,111,'Wonogiri','Wonogiri','2016-05-12 07:32:08','superuser@jalurkerja.com','127.0.0.1','2016-05-12 07:32:08','superuser@jalurkerja.com','127.0.0.1','2016-05-12 00:32:08'),(156,1211,11,112,'Kebumen','Kebumen','2016-05-12 07:32:08','superuser@jalurkerja.com','127.0.0.1','2016-05-12 07:32:08','superuser@jalurkerja.com','127.0.0.1','2016-05-12 00:32:08'),(157,1271,11,113,'Mungkid','Mungkid','2016-05-12 07:32:08','superuser@jalurkerja.com','127.0.0.1','2016-05-12 07:32:08','superuser@jalurkerja.com','127.0.0.1','2016-05-12 00:32:08'),(158,1281,11,114,'Kajen','Kajen','2016-05-12 07:32:08','superuser@jalurkerja.com','127.0.0.1','2016-05-12 07:32:08','superuser@jalurkerja.com','127.0.0.1','2016-05-12 00:32:08'),(159,1321,11,115,'Ungaran','Ungaran','2016-05-12 07:32:08','superuser@jalurkerja.com','127.0.0.1','2016-05-12 07:32:08','superuser@jalurkerja.com','127.0.0.1','2016-05-12 00:32:08'),(160,1206,11,116,'Wonosobo','Wonosobo','2016-05-12 07:32:08','superuser@jalurkerja.com','127.0.0.1','2016-05-12 07:32:08','superuser@jalurkerja.com','127.0.0.1','2016-05-12 00:32:08'),(161,2,0,1,'Seluruh Indonesia','All Around Indonesia ','2016-08-15 09:30:11','adi@jalurkerja.com','140.0.234.42','2016-08-15 09:30:11','adi@jalurkerja.com','140.0.234.42','2016-08-15 09:30:11'),(162,325,27,95,'Tangerang Selatan','Tangerang, South','2016-08-15 09:33:10','adi@jalurkerja.com','140.0.234.42','2016-08-29 08:49:39','leo@jalurkerja.com','139.228.113.179','2016-09-16 02:56:00'),(163,1076,10,116,'Kuningan ','Kuningan ','2016-08-15 09:37:32','adi@jalurkerja.com','140.0.234.42','2016-08-15 09:37:32','adi@jalurkerja.com','140.0.234.42','2016-08-15 09:37:32'),(164,1077,10,117,'Majalengka','Majalengka','2016-08-15 09:38:28','adi@jalurkerja.com','140.0.234.42','2016-08-15 09:38:28','adi@jalurkerja.com','140.0.234.42','2016-08-15 09:38:28'),(165,1356,10,118,'Indramayu','Indramayu','2016-08-15 09:38:48','adi@jalurkerja.com','140.0.234.42','2016-08-15 09:39:44','adi@jalurkerja.com','140.0.234.42','2016-08-29 01:49:55'),(166,3,0,2,'Seluruh Pulau Jawa','All Around Java Island','2016-08-16 03:53:43','adi@jalurkerja.com','140.0.234.42','2016-08-22 09:50:33','adi@jalurkerja.com','111.94.231.225','2016-08-22 09:50:33'),(167,4,0,3,'Seluruh Pulau Kalimantan','All Around Borneo Island','2016-08-16 03:54:12','adi@jalurkerja.com','140.0.234.42','2016-08-22 09:50:52','adi@jalurkerja.com','111.94.231.225','2016-08-22 09:50:52'),(168,5,0,4,'Seluruh Pulau Sulawesi','All Around Sulawesi Island','2016-08-16 03:54:35','adi@jalurkerja.com','140.0.234.42','2016-08-22 09:51:29','adi@jalurkerja.com','111.94.231.225','2016-08-22 09:51:30'),(169,6,0,5,'Seluruh Pulau Sumatera ','All Around Sumatera Island','2016-08-16 03:54:50','adi@jalurkerja.com','140.0.234.42','2016-08-22 09:51:54','adi@jalurkerja.com','111.94.231.225','2016-08-22 09:51:54'),(170,1576,13,60,'Nganjuk','Nganjuk','2016-08-22 03:42:52','adi@jalurkerja.com','111.94.231.225','2016-08-22 03:42:52','adi@jalurkerja.com','111.94.231.225','2016-08-22 03:42:52'),(171,1071,10,30,'Sumedang','Sumedang','2016-08-27 10:45:11','warih@jalurkerja.com','127.0.0.1','2016-08-27 10:45:11','warih@jalurkerja.com','127.0.0.1','2016-08-27 03:45:11'),(172,1357,10,119,'Bandung Barat','West Bandung','2016-09-01 03:30:00','superuser@jalurkerja.com','139.228.113.179','2016-09-01 03:30:00','superuser@jalurkerja.com','139.228.113.179','2016-09-01 03:30:00'),(173,1358,10,120,'Garut','Garut','2016-09-05 11:19:08','adi@jalurkerja.com','139.228.113.179','2016-09-05 11:19:08','adi@jalurkerja.com','139.228.113.179','2016-09-05 11:19:08'),(174,1359,10,121,'Ciamis','Ciamis','2016-09-05 11:20:52','adi@jalurkerja.com','139.228.113.179','2016-09-05 11:20:52','adi@jalurkerja.com','139.228.113.179','2016-09-05 11:20:52'),(175,1577,13,61,'Madura','Madura','2016-09-13 02:34:16','adi@jalurkerja.com','139.228.113.179','2016-09-13 02:34:16','adi@jalurkerja.com','139.228.113.179','2016-09-13 02:34:16'),(176,1578,13,62,'Ponorogo','Ponorogo','2016-12-22 11:57:38','adi@jalurkerja.com','140.0.233.72','2016-12-22 11:57:38','adi@jalurkerja.com','140.0.233.72','2016-12-22 04:57:38'),(177,1579,13,63,'Lumajang','Lumajang','2017-03-27 08:33:10','adi@jalurkerja.com','139.193.134.95','2017-03-27 08:33:10','adi@jalurkerja.com','139.193.134.95','2017-03-27 01:33:10'),(178,2306,15,65,'Lombok','Lombok','2017-06-20 11:03:47','adi@jalurkerja.com','111.94.230.36','2017-06-20 11:03:47','adi@jalurkerja.com','111.94.230.36','2017-06-20 04:03:47'),(179,0,10,123,'Cibitung','Cibitung','2017-06-21 11:45:48','adi@jalurkerja.com','111.94.230.36','2017-07-06 11:06:40','adi@jalurkerja.com','139.193.135.159','2017-07-06 04:06:40'),(180,1276,11,117,'Grobogan','Grobogan','2017-09-28 12:47:38','superuser@jalurkerja.com','114.124.174.240','2017-09-28 12:47:38','superuser@jalurkerja.com','114.124.174.240','2017-09-28 05:47:38');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_categories`
--

DROP TABLE IF EXISTS `model_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_id` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `name_id` (`name_id`),
  KEY `name_en` (`name_en`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_categories`
--

LOCK TABLES `model_categories` WRITE;
/*!40000 ALTER TABLE `model_categories` DISABLE KEYS */;
INSERT INTO `model_categories` VALUES (1,'Pria','Men','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-06 08:47:07'),(2,'Wanita','Women','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-06 08:47:07'),(3,'Hijab','Hijab','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-06 08:47:07');
/*!40000 ALTER TABLE `model_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_files`
--

DROP TABLE IF EXISTS `model_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `filetype` smallint(6) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `filetype` (`filetype`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_files`
--

LOCK TABLES `model_files` WRITE;
/*!40000 ALTER TABLE `model_files` DISABLE KEYS */;
INSERT INTO `model_files` VALUES (19,26,'CoverBook',1,'hijab1.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(20,27,'CoverBook',1,'hijab2.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(21,28,'CoverBook',1,'hijab3.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(22,29,'CoverBook',1,'hijab4.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(23,30,'CoverBook',1,'hijab5.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(24,31,'CoverBook',1,'hijab6.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(25,32,'CoverBook',1,'hijab7.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(26,33,'CoverBook',1,'hijab8.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(27,34,'CoverBook',1,'hijab9.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(28,35,'CoverBook',1,'hijab10.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(29,36,'CoverBook',1,'women1.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(30,37,'CoverBook',1,'women2.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(31,38,'CoverBook',1,'women3.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(32,39,'CoverBook',1,'women4.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(33,40,'CoverBook',1,'women5.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(34,41,'CoverBook',1,'women6.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(35,42,'CoverBook',1,'women7.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(36,43,'CoverBook',1,'women8.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(37,44,'CoverBook',1,'women9.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(38,45,'CoverBook',1,'women10.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(39,46,'CoverBook',1,'man1.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(40,47,'CoverBook',1,'man2.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(41,48,'CoverBook',1,'man3.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(42,49,'CoverBook',1,'man4.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(43,50,'CoverBook',1,'man5.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(44,51,'CoverBook',1,'man6.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(45,52,'CoverBook',1,'man7.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(46,53,'CoverBook',1,'man8.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(47,54,'CoverBook',1,'man9.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(48,55,'CoverBook',1,'man10.jpg','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-09-05 07:15:35'),(49,57,'narsis 1',1,'5_57_0.jpg','2017-10-10 15:49:27','warih@model.com','127.0.0.1','2017-10-10 15:49:27','warih@model.com','127.0.0.1','2017-10-10 08:49:27'),(52,61,'Foto 1',1,'5_61_0.jpg','2017-10-13 11:19:09','rudi@model.com','127.0.0.1','2017-10-13 11:19:09','rudi@model.com','127.0.0.1','2017-10-13 04:19:09');
/*!40000 ALTER TABLE `model_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_news`
--

DROP TABLE IF EXISTS `model_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `small_img` varchar(255) NOT NULL,
  `large_img` varchar(255) NOT NULL,
  `news_at` date NOT NULL,
  `news_source` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_news` varchar(255) NOT NULL,
  `news` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `news_at` (`news_at`),
  KEY `title` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_news`
--

LOCK TABLES `model_news` WRITE;
/*!40000 ALTER TABLE `model_news` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_profiles`
--

DROP TABLE IF EXISTS `model_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nationality_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `hair_color_id` int(11) NOT NULL,
  `eye_colors_id` int(11) NOT NULL,
  `height` double NOT NULL,
  `bust` double NOT NULL,
  `waist` double NOT NULL,
  `hips` double NOT NULL,
  `shoe` double NOT NULL,
  `model_category_ids` varchar(100) NOT NULL,
  `ig` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`) USING BTREE,
  KEY `nationality_id` (`nationality_id`),
  KEY `hair_color_id` (`hair_color_id`),
  KEY `eye_colors_id` (`eye_colors_id`),
  KEY `talent_category_ids` (`model_category_ids`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_profiles`
--

LOCK TABLES `model_profiles` WRITE;
/*!40000 ALTER TABLE `model_profiles` DISABLE KEYS */;
INSERT INTO `model_profiles` VALUES (3,26,32,'Dewi','Candra','Ningrum','',1,3,180,95,40,45,38,'|2||3|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(4,27,34,'Dinda Nyai','','','',1,3,180,95,40,45,38,'|2||3|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(5,28,33,'Winda','','','',1,3,180,95,40,45,38,'|2||3|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(6,29,32,'Nurhayatin','','','',1,3,180,95,40,45,38,'|2||3|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(7,30,32,'Liez','','','',1,3,180,95,40,45,38,'|2||3|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(8,31,32,'Shinta','','','',1,3,180,95,40,45,38,'|2||3|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(9,32,32,'Arsyih','','','',1,3,180,95,40,45,38,'|2||3|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(10,33,32,'Cornel','','','',1,3,180,95,40,45,38,'|2||3|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(11,34,32,'Karina','','','',1,3,180,95,40,45,38,'|2||3|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(12,35,32,'Dharety','','','',1,3,180,95,40,45,38,'|2||3|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(13,36,32,'Vika','','','',1,3,180,95,40,45,38,'|3|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(14,37,35,'Astrid','','','',1,3,180,95,40,45,38,'|3|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(15,38,32,'Erna Wati','','','',1,3,180,95,40,45,38,'|3|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(16,39,32,'Noer','','','',1,3,180,95,40,45,38,'|3|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(17,40,32,'Etik W','','','',1,3,180,95,40,45,38,'|3|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(18,41,32,'Ari','','','',1,3,180,95,40,45,38,'|2|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(19,42,32,'Fera H','','','',1,3,180,95,40,45,38,'|2|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(20,43,33,'Mega J','','','',1,3,180,95,40,45,38,'|2|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(21,44,32,'Florensia','','','',1,3,180,95,40,45,38,'|2|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(22,45,32,'Marcelia','','','',1,3,180,95,40,45,38,'|2|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(23,46,32,'Reza','','','',1,3,180,95,40,45,38,'|1|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(24,47,33,'Dikoy S','A','','',1,3,180,95,40,45,38,'|1|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(25,48,32,'Umbaka','','','',1,3,180,95,40,45,38,'|1|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(26,49,20,'Kasino','','','',1,3,180,95,40,45,38,'|1|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(27,50,32,'Dono','','','',1,3,180,95,40,45,38,'|1|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(28,51,32,'Dzikri A','','','',1,3,180,95,40,45,38,'|1|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(29,52,10,'Andik','','','',1,3,180,95,40,45,38,'|1|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(30,53,32,'Dody S','','','',1,3,180,95,40,45,38,'|1|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(31,54,32,'Firman','','','',1,3,180,95,40,45,38,'|1|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(32,55,32,'May F','','','',1,3,180,95,40,45,38,'|1|','','','','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-10-11 09:09:27'),(33,56,32,'Talent','q',' ','ciledug',1,1,180,95,21,12,12,'|2||3|','ig','fb','tw','2017-09-06 14:32:54','telent@talent.com','127.0.0.1','2017-09-06 14:32:54','telent@talent.com','127.0.0.1','2017-10-11 09:09:27'),(34,57,32,'Warih','Hadi','Suryono  ','Ciledug',1,1,178,95,30,32,43,'|2||3|','-','-','-','2017-10-10 15:47:04','warih@model.com','127.0.0.1','2017-10-10 15:47:04','warih@model.com','127.0.0.1','2017-10-11 09:09:27'),(35,61,32,'Rudi','',' ','Alamat',1,4,180,30,30,20,43,'|1|','-','-','-','2017-10-13 11:18:29','rudi@model.com','127.0.0.1','2017-10-13 11:18:29','rudi@model.com','127.0.0.1','2017-10-13 04:18:29');
/*!40000 ALTER TABLE `model_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_ranks`
--

DROP TABLE IF EXISTS `model_ranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_ranks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_giver_user_id` int(11) NOT NULL,
  `ranked` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `job_id` (`job_id`),
  KEY `job_giver_user_id` (`job_giver_user_id`),
  KEY `ranked` (`ranked`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_ranks`
--

LOCK TABLES `model_ranks` WRITE;
/*!40000 ALTER TABLE `model_ranks` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_ranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_work_files`
--

DROP TABLE IF EXISTS `model_work_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_work_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_work_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `filetype` smallint(6) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `talent_work_id` (`model_work_id`),
  KEY `filetype` (`filetype`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_work_files`
--

LOCK TABLES `model_work_files` WRITE;
/*!40000 ALTER TABLE `model_work_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_work_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_works`
--

DROP TABLE IF EXISTS `model_works`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `work_category_ids` varchar(100) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_giver_user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `worked_at` date NOT NULL,
  `published_at` date NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `work_category_ids` (`work_category_ids`),
  KEY `job_id` (`job_id`),
  KEY `job_giver_user_id` (`job_giver_user_id`),
  KEY `worked_at` (`worked_at`),
  KEY `published_at` (`published_at`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_works`
--

LOCK TABLES `model_works` WRITE;
/*!40000 ALTER TABLE `model_works` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_works` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nationalities`
--

DROP TABLE IF EXISTS `nationalities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nationalities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nationalities`
--

LOCK TABLES `nationalities` WRITE;
/*!40000 ALTER TABLE `nationalities` DISABLE KEYS */;
INSERT INTO `nationalities` VALUES (1,'Afghan','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:02'),(2,'Argentine','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(3,'Argentinian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(4,'Australian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(5,'Belgian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(6,'Bolivian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(7,'Brazilian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(8,'Cambodian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(9,'Cameroonian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(10,'Canadian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(11,'Chilean','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(12,'Chinese','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(13,'Colombian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(14,'Costa Rican','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(15,'Cuban','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(16,'Danish (Dane)','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(17,'Dominican','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(18,'Ecuadorian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(19,'Egyptian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(20,'Salvadorian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(21,'English','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(22,'Estonian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(23,'Ethiopian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(24,'Finnish','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(25,'French','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(26,'German','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(27,'Ghanaian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(28,'Greek','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(29,'Guatemalan','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(30,'Haitian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(31,'Honduran','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(32,'Indonesian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(33,'Iranian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(34,'Irish','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(35,'Israeli','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(36,'Italian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(37,'Japanese','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(38,'Jordanian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(39,'Kenyan','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(40,'Laotian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(41,'Latvian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(42,'Lebanese','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(43,'Lithuanian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(44,'Malaysian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(45,'Mexican','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(46,'Moroccan','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(47,'Dutch','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(48,'New Zealander','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(49,'Nicaraguan','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(50,'Norwegian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(51,'Panamanian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(52,'Paraguayan','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(53,'Peruvian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(54,'Filipino','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(55,'Polish','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(56,'Portuguese','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(57,'Puerto Rican','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(58,'Romanian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(59,'Russian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(60,'Saudi','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(61,'Scottish','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(62,'Korean','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(63,'Spanish','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(64,'Swedish','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(65,'Swiss','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(66,'Taiwanese','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(67,'Tajik','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(68,'Thai','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(69,'Turkish','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(70,'Ukrainian','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(71,'British','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(72,'American','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(73,'Uruguayan','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(74,'Venezuelan','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(75,'Vietnamese','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03'),(76,'Welsh','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:08:03');
/*!40000 ALTER TABLE `nationalities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_profiles`
--

DROP TABLE IF EXISTS `personal_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `idcard` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `zipcode` varchar(7) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `cellphone` varchar(30) NOT NULL,
  `web` varchar(255) NOT NULL,
  `nationality_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `ig` varchar(255) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `name` (`name`),
  KEY `nationality_id` (`nationality_id`),
  KEY `gender_id` (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_profiles`
--

LOCK TABLES `personal_profiles` WRITE;
/*!40000 ALTER TABLE `personal_profiles` DISABLE KEYS */;
INSERT INTO `personal_profiles` VALUES (2,19,'sidik personal permana','001','ciledug','789456','0815','0212','yt.com',32,1,'2_19.png','sidik','sidik','sidik','about sidik','2017-09-05 11:11:56','sidik@personal.com','127.0.0.1','2017-09-05 11:11:56','sidik@personal.com','127.0.0.1','2017-09-05 04:11:56'),(3,58,'Warih Personal Suryono','2134234','Bekasi','12312','082472384732','083214632','www.warihpersonal.com',63,1,'2_58.jpg','-','-','-','-','2017-10-10 15:54:04','warih@personal.com','127.0.0.1','2017-10-10 15:54:04','warih@personal.com','127.0.0.1','2017-10-10 08:54:04');
/*!40000 ALTER TABLE `personal_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work_categories`
--

DROP TABLE IF EXISTS `work_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `work_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_ip` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_ip` varchar(20) DEFAULT NULL,
  `xtimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_categories`
--

LOCK TABLES `work_categories` WRITE;
/*!40000 ALTER TABLE `work_categories` DISABLE KEYS */;
INSERT INTO `work_categories` VALUES (1,'Advertising','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:39:35'),(2,'Editorial','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:39:35'),(3,'Magazine Cover','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:39:35'),(4,'Shows','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:39:35'),(5,'Lookbook','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:39:35'),(6,'Other','0000-00-00 00:00:00','',NULL,'0000-00-00 00:00:00','',NULL,'2017-08-30 07:39:35');
/*!40000 ALTER TABLE `work_categories` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-13 13:08:21
