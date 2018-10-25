CREATE DATABASE  IF NOT EXISTS `project3` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `project3`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: project3
-- ------------------------------------------------------
-- Server version	5.6.26-log

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
-- Table structure for table `accountlevels`
--

DROP TABLE IF EXISTS `accountlevels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accountlevels` (
  `level` int(11) NOT NULL,
  `displayname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accountlevels`
--

LOCK TABLES `accountlevels` WRITE;
/*!40000 ALTER TABLE `accountlevels` DISABLE KEYS */;
INSERT INTO `accountlevels` VALUES (1,'admin'),(2,'pleb');
/*!40000 ALTER TABLE `accountlevels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `levelkey_idx` (`level`),
  CONSTRAINT `levelkey` FOREIGN KEY (`level`) REFERENCES `accountlevels` (`level`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (3,'mem','$2y$10$i0MrAeQuTvscGiyPR5ffTuzknixJh4hIeCmlxKU2J8HqQ18y3I0fC',1);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagecontent`
--

DROP TABLE IF EXISTS `pagecontent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagecontent` (
  `pageid` int(11) NOT NULL,
  `contentid` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `title` varchar(45) DEFAULT NULL,
  `imagepath` text,
  PRIMARY KEY (`contentid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagecontent`
--

LOCK TABLES `pagecontent` WRITE;
/*!40000 ALTER TABLE `pagecontent` DISABLE KEYS */;
INSERT INTO `pagecontent` VALUES (1,4,'Welcome to the Index page of Project 3.\r\nI have created all of the content with the web-editor.','Welcome!!',''),(1,5,'I did not finish 100% and clicking on images and then clicking back can sometimes not work (like after editing).\r\n\r\nSolution: Open images in a new tab!!!','Warning:',''),(3,6,'Partially thanks to php\'s style of using $this and the -> symbol everywhere, I am now way more comfortable in dealing with c++. UE4 uses base c++ (and keeps it updated) along with helper code macros to allow cleaner/easier code chaining.','C++',''),(2,7,'Yes, Unreal Engine 4 (UE4) uses c++ as it\'s base code engine. In doing so it also adopts the ways of Object-Oriented-Programming.\r\n\r\nLiterally anything is going to be an object, from c++ code to blueprints.','OOP YOU SAY?!',''),(3,8,'My latest c++ adventure was creating the base class for my \'creep character\'.\r\n\r\nI wanted to do a damage calculation based on damagetype. Damagetype is only ever a reference to an object/class, and never actually spawned in game. My problem doing this in blueprints was that I could not easily make a switch or function calls for getWeakness() or getAlly(). \r\n\r\nI was using an enum for this and it felt odd having 8+ damagetype classes and relying on an enum instead. So I created a base damagetype in c++ and created and exposed a damagecalc function for blueprint. ','My recent c++\'ing','damagecalc.png'),(4,9,'Blueprinting is wonderfully easy. So easy in fact that I created my design in the UMG editor in a few minutes, and even considered building the project and adding it as a webpage. It would take an hour and it is < 1 hour from the due date though =x.\r\n\r\nHere is the exposed node from the C++ section, in blueprint form:','The quick coding style.','takedamage.png'),(4,10,'Here is the playercontroller blueprint graph.\r\n\r\nEach of these red nodes are called \'events\', and are similar to void functions. There are real functions in blueprint, but the standard appears to be use events for void, and functions for returns.\r\n\r\nAlso if you notice I am creating a \'Selection Manager Object\'. I am using this for keeping track client-side selected towers (for like upgrading/selling). I was able to move a massive amount of code to it\'s own object.','Event Graph','events.png'),(5,11,'Currently I am working on a tower defense. It currently has some programmer art, but the coding side of things is an art in its own way =).','Aesais Tower Defense','live.png'),(5,12,'Here is some selection in action.','Some towers','tower.png');
/*!40000 ALTER TABLE `pagecontent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `displayname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'index'),(2,'ue4andoop'),(3,'ue4andcpp'),(4,'ue4andblueprint'),(5,'projects');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-14 23:27:08
