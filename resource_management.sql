-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: resource_management
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
-- Table structure for table `b_distribution`
--

DROP TABLE IF EXISTS `b_distribution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_distribution` (
  `Things_idthings` tinyint(3) unsigned NOT NULL,
  `Building_idbuilding` tinyint(3) unsigned NOT NULL,
  KEY `fk_B_Distribution_Things1_idx` (`Things_idthings`),
  KEY `fk_B_Distribution_Building1_idx` (`Building_idbuilding`),
  CONSTRAINT `fk_B_Distribution_Building1` FOREIGN KEY (`Building_idbuilding`) REFERENCES `building` (`idbuilding`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_B_Distribution_Things1` FOREIGN KEY (`Things_idthings`) REFERENCES `things` (`idthings`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_distribution`
--

LOCK TABLES `b_distribution` WRITE;
/*!40000 ALTER TABLE `b_distribution` DISABLE KEYS */;
INSERT INTO `b_distribution` VALUES (12,3),(11,1),(13,1),(17,3),(6,2);
/*!40000 ALTER TABLE `b_distribution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `building`
--

DROP TABLE IF EXISTS `building`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `building` (
  `idbuilding` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `r_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idbuilding`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `building`
--

LOCK TABLES `building` WRITE;
/*!40000 ALTER TABLE `building` DISABLE KEYS */;
INSERT INTO `building` VALUES (1,' Building A',1),(2,'  Building B',1),(3,' Building C',1),(4,'           Building D',1),(5,'Building E',1);
/*!40000 ALTER TABLE `building` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `class_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES (1,'   Nursery'),(2,'L.K.G'),(3,'STD 1'),(4,'STD 8'),(8,'STD 3'),(9,'  U.K.G'),(10,'STD 7');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `iddepartment` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `r_status` tinyint(4) NOT NULL DEFAULT '1',
  `Building_idbuilding` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`iddepartment`),
  KEY `fk_Department_Building1_idx` (`Building_idbuilding`),
  CONSTRAINT `fk_Department_Building1` FOREIGN KEY (`Building_idbuilding`) REFERENCES `building` (`idbuilding`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'RRRR',1,1),(2,'BBB',1,1),(3,'CCC',1,2);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dpt_phoneno`
--

DROP TABLE IF EXISTS `dpt_phoneno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dpt_phoneno` (
  `phone` varchar(15) NOT NULL,
  `Department_iddepartment` tinyint(3) unsigned NOT NULL,
  KEY `fk_DPT_PhoneNo_Department1_idx` (`Department_iddepartment`),
  CONSTRAINT `fk_DPT_PhoneNo_Department1` FOREIGN KEY (`Department_iddepartment`) REFERENCES `department` (`iddepartment`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dpt_phoneno`
--

LOCK TABLES `dpt_phoneno` WRITE;
/*!40000 ALTER TABLE `dpt_phoneno` DISABLE KEYS */;
INSERT INTO `dpt_phoneno` VALUES (' 917903657415',1),(' 919955269058',1),('12334556777',2);
/*!40000 ALTER TABLE `dpt_phoneno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email` (
  `emailId` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email`
--

LOCK TABLES `email` WRITE;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` VALUES ('gaurav.kr109@gmail.com'),('gaurav.boss108@gmail.com'),('abcds@gmail.com'),('raaaa@gmail.com'),('1sss@gmail.com'),('asssdsd@gmail.com');
/*!40000 ALTER TABLE `email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guarden`
--

DROP TABLE IF EXISTS `guarden`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guarden` (
  `idguarden` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `Building_idbuilding` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`idguarden`),
  KEY `fk_Guarden_Building1_idx` (`Building_idbuilding`),
  CONSTRAINT `fk_Guarden_Building1` FOREIGN KEY (`Building_idbuilding`) REFERENCES `building` (`idbuilding`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guarden`
--

LOCK TABLES `guarden` WRITE;
/*!40000 ALTER TABLE `guarden` DISABLE KEYS */;
INSERT INTO `guarden` VALUES (1,'Guarden A',1),(2,'Guarden B',2),(3,'Guarden C',3),(4,' Guarden D',4),(5,'Guarden E',3);
/*!40000 ALTER TABLE `guarden` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `link_dep_room`
--

DROP TABLE IF EXISTS `link_dep_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link_dep_room` (
  `Department_iddepartment` tinyint(3) unsigned NOT NULL,
  `Rooms_idRooms` tinyint(3) unsigned NOT NULL,
  KEY `fk_Link_dep_room_Department1_idx` (`Department_iddepartment`),
  KEY `fk_Link_dep_room_Rooms1_idx` (`Rooms_idRooms`),
  CONSTRAINT `fk_Link_dep_room_Department1` FOREIGN KEY (`Department_iddepartment`) REFERENCES `department` (`iddepartment`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Link_dep_room_Rooms1` FOREIGN KEY (`Rooms_idRooms`) REFERENCES `rooms` (`idRooms`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link_dep_room`
--

LOCK TABLES `link_dep_room` WRITE;
/*!40000 ALTER TABLE `link_dep_room` DISABLE KEYS */;
INSERT INTO `link_dep_room` VALUES (2,1),(1,6),(3,2);
/*!40000 ALTER TABLE `link_dep_room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintanance`
--

DROP TABLE IF EXISTS `maintanance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maintanance` (
  `name` varchar(45) NOT NULL,
  `cost` int(11) NOT NULL,
  `Building_idbuilding` tinyint(3) unsigned NOT NULL,
  `idmaintanance` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idmaintanance`),
  KEY `fk_Maintanance_Building1_idx` (`Building_idbuilding`),
  CONSTRAINT `fk_Maintanance_Building1` FOREIGN KEY (`Building_idbuilding`) REFERENCES `building` (`idbuilding`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintanance`
--

LOCK TABLES `maintanance` WRITE;
/*!40000 ALTER TABLE `maintanance` DISABLE KEYS */;
INSERT INTO `maintanance` VALUES ('Painting',10000,1,1),('Repairing',20000,1,2),('Water resistance',1200,2,3),('Painting',1000,3,4);
/*!40000 ALTER TABLE `maintanance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `map_class_section`
--

DROP TABLE IF EXISTS `map_class_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `map_class_section` (
  `idclass_sec` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `Class_idClass` tinyint(3) unsigned NOT NULL,
  `Section_Section_id` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`idclass_sec`),
  KEY `fk_Map_class_section_Class1_idx` (`Class_idClass`),
  KEY `fk_Map_class_section_Section1_idx` (`Section_Section_id`),
  CONSTRAINT `fk_Map_class_section_Class1` FOREIGN KEY (`Class_idClass`) REFERENCES `class` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Map_class_section_Section1` FOREIGN KEY (`Section_Section_id`) REFERENCES `section` (`Section_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_class_section`
--

LOCK TABLES `map_class_section` WRITE;
/*!40000 ALTER TABLE `map_class_section` DISABLE KEYS */;
INSERT INTO `map_class_section` VALUES (7,1,1),(8,1,2),(9,1,3),(10,1,4),(11,2,1),(12,2,2),(14,3,2),(15,2,6),(18,4,1),(21,4,3),(22,3,3),(23,3,4),(24,3,1),(25,8,1),(26,8,2),(27,9,1),(28,9,2),(29,9,3),(30,9,4),(31,9,5),(32,4,2),(34,4,5);
/*!40000 ALTER TABLE `map_class_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `map_room_class`
--

DROP TABLE IF EXISTS `map_room_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `map_room_class` (
  `idclass_sec` tinyint(3) unsigned NOT NULL,
  `Rooms_idRooms` tinyint(3) unsigned NOT NULL,
  KEY `fk_Map_room_class_Map_class_section1_idx` (`idclass_sec`),
  KEY `fk_Map_room_class_Rooms1_idx` (`Rooms_idRooms`),
  CONSTRAINT `fk_Map_room_class_Map_class_section1` FOREIGN KEY (`idclass_sec`) REFERENCES `map_class_section` (`idclass_sec`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_Map_room_class_Rooms1` FOREIGN KEY (`Rooms_idRooms`) REFERENCES `rooms` (`idRooms`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_room_class`
--

LOCK TABLES `map_room_class` WRITE;
/*!40000 ALTER TABLE `map_room_class` DISABLE KEYS */;
INSERT INTO `map_room_class` VALUES (7,1),(11,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1),(14,1);
/*!40000 ALTER TABLE `map_room_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organisation`
--

DROP TABLE IF EXISTS `organisation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organisation` (
  `idorganisation` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `land` varchar(45) NOT NULL,
  PRIMARY KEY (`idorganisation`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organisation`
--

LOCK TABLES `organisation` WRITE;
/*!40000 ALTER TABLE `organisation` DISABLE KEYS */;
INSERT INTO `organisation` VALUES (2,'D.A.V Public School','B.M.P 6','12');
/*!40000 ALTER TABLE `organisation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phoneno`
--

DROP TABLE IF EXISTS `phoneno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phoneno` (
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phoneno`
--

LOCK TABLES `phoneno` WRITE;
/*!40000 ALTER TABLE `phoneno` DISABLE KEYS */;
INSERT INTO `phoneno` VALUES ('+917903657415'),(' 917903657415'),(' 919955269058'),(' 919955259058'),('1234443331');
/*!40000 ALTER TABLE `phoneno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plant`
--

DROP TABLE IF EXISTS `plant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plant` (
  `idplant` tinyint(4) NOT NULL AUTO_INCREMENT,
  `plant` varchar(45) NOT NULL,
  `Guarden_idguarden` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`idplant`),
  KEY `fk_Plant_Guarden1_idx` (`Guarden_idguarden`),
  CONSTRAINT `plant_ibfk_1` FOREIGN KEY (`Guarden_idguarden`) REFERENCES `guarden` (`idguarden`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plant`
--

LOCK TABLES `plant` WRITE;
/*!40000 ALTER TABLE `plant` DISABLE KEYS */;
INSERT INTO `plant` VALUES (1,'jhdseetert',4),(2,'Rose',1),(3,'SunFlower',1),(4,'Flower A',1),(5,'Rose A',2),(6,'ds',1);
/*!40000 ALTER TABLE `plant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_distribution`
--

DROP TABLE IF EXISTS `r_distribution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_distribution` (
  `Things_idthings` tinyint(3) unsigned NOT NULL,
  `Rooms_idRooms` tinyint(3) unsigned NOT NULL,
  KEY `fk_R_Distribution_Things1_idx` (`Things_idthings`),
  KEY `fk_R_Distribution_Rooms1_idx` (`Rooms_idRooms`),
  CONSTRAINT `fk_R_Distribution_Rooms1` FOREIGN KEY (`Rooms_idRooms`) REFERENCES `rooms` (`idRooms`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_R_Distribution_Things1` FOREIGN KEY (`Things_idthings`) REFERENCES `things` (`idthings`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_distribution`
--

LOCK TABLES `r_distribution` WRITE;
/*!40000 ALTER TABLE `r_distribution` DISABLE KEYS */;
INSERT INTO `r_distribution` VALUES (2,1),(1,1),(3,6),(9,1),(4,1);
/*!40000 ALTER TABLE `r_distribution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repair`
--

DROP TABLE IF EXISTS `repair`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repair` (
  `name` varchar(45) NOT NULL,
  `cost` int(11) NOT NULL,
  `Things_idthings` tinyint(3) unsigned NOT NULL,
  `idrepair` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idrepair`),
  KEY `fk_Repair_Things1_idx` (`Things_idthings`),
  CONSTRAINT `fk_Repair_Things1` FOREIGN KEY (`Things_idthings`) REFERENCES `things` (`idthings`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repair`
--

LOCK TABLES `repair` WRITE;
/*!40000 ALTER TABLE `repair` DISABLE KEYS */;
INSERT INTO `repair` VALUES ('Wire Change',500,1,1),('Repair',50,2,2);
/*!40000 ALTER TABLE `repair` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_table`
--

DROP TABLE IF EXISTS `request_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `request_table` (
  `name` varchar(45) NOT NULL,
  `iduser` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_table`
--

LOCK TABLES `request_table` WRITE;
/*!40000 ALTER TABLE `request_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `request_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_capacity`
--

DROP TABLE IF EXISTS `room_capacity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_capacity` (
  `Rooms_idRooms` tinyint(3) unsigned NOT NULL,
  `capacity` int(11) NOT NULL,
  `allotment` int(11) NOT NULL DEFAULT '0',
  KEY `Rooms_idRooms` (`Rooms_idRooms`),
  CONSTRAINT `room_capacity_ibfk_1` FOREIGN KEY (`Rooms_idRooms`) REFERENCES `rooms` (`idRooms`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_capacity`
--

LOCK TABLES `room_capacity` WRITE;
/*!40000 ALTER TABLE `room_capacity` DISABLE KEYS */;
INSERT INTO `room_capacity` VALUES (1,40,0),(5,30,0);
/*!40000 ALTER TABLE `room_capacity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `idRooms` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `r_status` tinyint(4) NOT NULL DEFAULT '1',
  `Building_idbuilding` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`idRooms`),
  KEY `fk_Rooms_Building1_idx` (`Building_idbuilding`),
  CONSTRAINT `fk_Rooms_Building1` FOREIGN KEY (`Building_idbuilding`) REFERENCES `building` (`idbuilding`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,' Room A',1,1),(2,'  Room E',1,2),(3,'Room C',1,3),(5,'Room B',1,1),(6,'Room C',1,1);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section` (
  `Section_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` VALUES (1,'Section A'),(2,'Section B'),(3,'Section C'),(4,'Section D'),(5,'Section E'),(6,'Section F');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `things`
--

DROP TABLE IF EXISTS `things`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `things` (
  `idthings` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `r_status` tinyint(4) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idthings`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `things`
--

LOCK TABLES `things` WRITE;
/*!40000 ALTER TABLE `things` DISABLE KEYS */;
INSERT INTO `things` VALUES (1,'Fan',1,'0000-00-00 00:00:00'),(2,'Bulb',1,'0000-00-00 00:00:00'),(3,'Chair',1,'0000-00-00 00:00:00'),(4,'Bench',1,'0000-00-00 00:00:00'),(6,'Desk',1,'0000-00-00 00:00:00'),(9,'AC',1,'0000-00-00 00:00:00'),(10,'Refrigator',1,'0000-00-00 00:00:00'),(11,'Fan',1,'0000-00-00 00:00:00'),(12,'Bench',1,'0000-00-00 00:00:00'),(13,'Desk',1,'0000-00-00 00:00:00'),(17,'Fan',1,'0000-00-00 00:00:00'),(18,'AC',1,'2018-03-15 15:02:09');
/*!40000 ALTER TABLE `things` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `token`
--

DROP TABLE IF EXISTS `token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token` (
  `idtoken` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(45) NOT NULL,
  `token` varchar(20) DEFAULT NULL,
  `tokenExpire` varchar(45) NOT NULL,
  PRIMARY KEY (`idtoken`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `token`
--

LOCK TABLES `token` WRITE;
/*!40000 ALTER TABLE `token` DISABLE KEYS */;
INSERT INTO `token` VALUES (35,'gaurav.kr109@gmail.com','fdfdczogf4yx0ntk8ug','2019-11-30 15:19:05'),(36,'gaurav.kr109@gmail.com','mzxftsawjo5kugx','2019-11-30 21:31:02'),(37,'gaurav.kr109@gmail.com','wlqiio5tynogce9','2019-11-30 23:31:22'),(38,'arish@gmail.com','jxn2byd4qmfw13t','2019-11-30 23:42:25'),(39,'gaurav.kr109@gmail.com','06jskgfidfky7xr','2019-11-30 23:44:04'),(40,'gaurav.kr109@gmail.com','cc8irena3qxyoiz','2019-11-30 23:58:14'),(41,'gaurav.kr109@gmail.com','n8u2xxmw1jctgo0','2019-12-01 00:10:45'),(42,'gaurav.kr109@gmail.com','m9xsjnyagt5ctbx','2019-12-01 00:15:26'),(43,'gaurav.kr109@gmail.com','fnbuxkxam0z37cx','2019-12-01 15:32:03'),(44,'gaurav.kr109@gmail.com','3kjxg4o90utz5xt','2020-02-14 16:07:55'),(45,'gaurav.kr109@gmail.com','8ykceiisyw5oxbq','2020-02-14 16:10:34'),(46,'gaurav.kr109@gmail.com','rcfzaujkofe8xct','2020-02-14 16:10:40'),(47,'gaurav.kr109@gmail.com','kb4buauqzyctrcp','2020-02-14 16:11:03'),(48,'gaurav.kr109@gmail.com','a5of1oybjdiiznl','2020-02-14 16:11:08'),(49,'gaurav.kr109@gmail.com','zbgmnipgoenzxob','2020-02-14 16:11:13'),(50,'gaurav.kr109@gmail.com','snkmcqcytp1xi6i','2020-07-02 12:49:06');
/*!40000 ALTER TABLE `token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `userid` varchar(45) DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` int(6) unsigned NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (11,'GAURAV SHARMA','gaurav.kr109@gmail.com','1234567890','$2y$10$ShPQScvqtiCDTKdRL3ff9u63m7/Dh4lCvPm3xdVDqYoshvgldmkJ2',1,'2020-07-02 09:58:42');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-02 15:33:27
