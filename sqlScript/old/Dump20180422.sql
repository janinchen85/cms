CREATE DATABASE  IF NOT EXISTS `cms` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cms`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cms
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.30-MariaDB

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(55) NOT NULL,
  `CategoryOrderID` int(20) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'General',1),(2,'Surveys',2),(3,'Others',3);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum` (
  `forumID` int(11) NOT NULL AUTO_INCREMENT,
  `forumName` varchar(55) NOT NULL,
  `forumDesc` varchar(100) NOT NULL,
  `forumOrderID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  PRIMARY KEY (`forumID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum`
--

LOCK TABLES `forum` WRITE;
/*!40000 ALTER TABLE `forum` DISABLE KEYS */;
INSERT INTO `forum` VALUES (1,'News & Announcements','Everything, you should know.',1,1),(2,'Support','Any problems with the page?',2,1),(3,'Feedback','Any suggestions or ideas?',3,1),(4,'Multimedia Design and Communication','Surveys regarding Multimedia Design and Communication',1,2),(5,'Computer Science','Surveys regarding Computer Science',2,2),(6,'Marketing Management','Surveys regarding Marketing Management',3,2),(7,'International Sales and Marketing','Surveys regarding International Sales and Marketing',4,2),(8,'Offtopic','Everything',1,3);
/*!40000 ALTER TABLE `forum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thread`
--

DROP TABLE IF EXISTS `thread`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thread` (
  `threadID` int(11) NOT NULL AUTO_INCREMENT,
  `threadTitle` varchar(55) NOT NULL,
  `threadText` longtext NOT NULL,
  `threadDate` date NOT NULL,
  `threadTime` time NOT NULL,
  `threadVisits` int(11) NOT NULL,
  `threadEdits` int(11) NOT NULL,
  `threadEditLastUserID` int(11) NOT NULL,
  `threadEditDate` date NOT NULL,
  `threadEditTime` time NOT NULL,
  `userID` int(11) NOT NULL,
  `forumID` int(11) NOT NULL,
  PRIMARY KEY (`threadID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thread`
--

LOCK TABLES `thread` WRITE;
/*!40000 ALTER TABLE `thread` DISABLE KEYS */;
INSERT INTO `thread` VALUES (1,'Editiert','<p><b><font color=\"#00369b\">Edit Edit Edit....</font></b></p>','2018-04-16','11:46:59',59,7,1,'2018-04-22','12:26:15',1,1),(2,'Hello Friends','<p>hjjhlkjlkjl</p>','2018-04-16','11:47:27',0,0,0,'0000-00-00','00:00:00',1,1),(3,'This is a new Thread','<p>Yep</p>','2018-04-17','14:30:13',1,0,0,'0000-00-00','00:00:00',1,1),(4,'Again a new Thread','<p>Hurray</p>','2018-04-17','14:31:13',1,0,0,'0000-00-00','00:00:00',1,1);
/*!40000 ALTER TABLE `thread` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(55) NOT NULL,
  `userEmail` varchar(55) NOT NULL,
  `userPW` varchar(60) NOT NULL,
  `userGender` int(1) NOT NULL DEFAULT '0',
  `userPicture` varchar(55) NOT NULL DEFAULT 'placeholder.png',
  `userCourse` varchar(20) NOT NULL,
  `userFB` varchar(30) NOT NULL,
  `userTW` varchar(30) NOT NULL,
  `userPosts` int(55) NOT NULL DEFAULT '0',
  `userThreads` int(55) NOT NULL,
  `userRegDate` date NOT NULL,
  `userStatus` int(1) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Janinchen','jco_2002@freenet.de','$2y$12$vUy499nnxFR395dMkXK1luJxW9ZxcX3bjnFGt7kublUeicB4ZzkR2',0,'placeholder2.png','Webdeveloper','janinacindy.ortelt','Janinchen85',21,0,'0000-00-00',1),(5,'Janina85','jco_20021@freenet.de','$2y$12$W6jMk7F/hyz9eFXNHaWmP.qc9Qotj.gzomsbvJtR2TcwoEteqfkf6',0,'placeholder.png','','','',0,0,'2018-04-16',0),(7,'JaninaCindy','jco@freenet.de','$2y$12$sMrABEs0KuFQU5KO2fSGwOexvFN58kQ7wLEf4R9nvthjd9SIlIxXq',0,'placeholder.png','','','',0,0,'2018-04-22',0),(13,'Jessica','me@gmail.com','$2y$10$3bayFxrjnZFqhmhu0yuat.96cy83QGE4Krl8JKnCKuAbhUYj3up.a',0,'placeholder.png','','','',0,0,'2018-04-22',0),(14,'Hannelore','halli@hallo.de','$2y$10$Jv9Bnhj/t26GjFPBHMU7LOjIJujxoOpXDZU67y0l6/4h3K5Q7t/YG',0,'placeholder.png','','','',0,0,'2018-04-22',14);
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

-- Dump completed on 2018-04-22 15:27:08
