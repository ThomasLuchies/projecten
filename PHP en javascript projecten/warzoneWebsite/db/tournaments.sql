-- MariaDB dump 10.17  Distrib 10.5.5-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: tournaments
-- ------------------------------------------------------
-- Server version	10.5.5-MariaDB

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
-- Table structure for table `eventUsers`
--

DROP TABLE IF EXISTS `eventUsers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventUsers` (
  `eventUserId` int(10) NOT NULL AUTO_INCREMENT,
  `tournamentId` int(10) DEFAULT NULL,
  `userId` int(10) DEFAULT NULL,
  `extraContestant` varchar(1000) NOT NULL,
  `teamName` varchar(50) NOT NULL,
  `paymentId` varchar(255) DEFAULT NULL,
  `paid` tinyint(1) NOT NULL,
  PRIMARY KEY (`eventUserId`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventUsers`
--

LOCK TABLES `eventUsers` WRITE;
/*!40000 ALTER TABLE `eventUsers` DISABLE KEYS */;
INSERT INTO `eventUsers` VALUES (1,1,1,'','0',NULL,1),(2,6,3,'','0',NULL,1),(3,6,3,'','0',NULL,1),(4,6,3,'','0',NULL,1),(5,6,3,'','0',NULL,1),(6,6,3,'','0',NULL,1),(7,6,3,'','0',NULL,1),(8,6,3,'','0',NULL,1),(9,6,3,'','0',NULL,1),(10,6,3,'','0',NULL,1),(11,6,3,'','0',NULL,1),(12,6,3,'','0',NULL,1),(13,6,3,'','0',NULL,1),(14,6,3,'','0',NULL,1),(15,6,3,'','0',NULL,1),(16,6,3,'','0',NULL,1),(17,6,3,'','0',NULL,1),(18,6,3,'','0',NULL,1),(19,6,3,'','0',NULL,1),(20,6,3,'','0',NULL,1),(21,6,3,'','0',NULL,1),(22,6,3,'','0',NULL,1),(23,6,3,'','0',NULL,1),(24,6,3,'','0',NULL,1),(25,6,3,'','0',NULL,1),(26,6,3,'','0',NULL,1),(27,6,3,'','0',NULL,1),(28,6,3,'','0',NULL,1),(29,6,3,'','0',NULL,1),(30,6,3,'','0',NULL,1),(31,6,3,'','0',NULL,1),(32,6,3,'','0',NULL,1),(33,6,3,'','0',NULL,1),(34,6,3,'','0',NULL,1),(35,6,3,'','0',NULL,1),(36,6,3,'','0',NULL,1),(37,6,3,'','0',NULL,1),(38,6,3,'','0',NULL,1),(39,6,3,'','0',NULL,1),(40,6,3,'','0',NULL,1),(41,6,3,'','0',NULL,1),(42,6,3,'','0',NULL,1),(43,6,3,'','0',NULL,1),(44,6,3,'','0',NULL,1),(45,6,3,'','0',NULL,1),(46,6,3,'','0',NULL,1),(47,6,3,'','0',NULL,1),(48,6,3,'','0',NULL,1),(49,6,3,'','0',NULL,1),(50,6,3,'','0',NULL,1),(51,6,3,'','0',NULL,1),(52,6,3,'','0',NULL,1),(53,6,3,'','0',NULL,1),(54,6,3,'','0',NULL,1),(55,6,3,'','0',NULL,1),(56,6,3,'','0',NULL,1),(57,6,3,'','0',NULL,1),(58,6,3,'','0',NULL,1),(59,6,3,'','0',NULL,1),(60,6,3,'','0',NULL,1),(61,6,3,'','0',NULL,1),(62,6,3,'','0',NULL,1),(63,6,3,'','0',NULL,1),(64,6,3,'','0',NULL,1),(65,6,3,'','0',NULL,1),(66,6,3,'','0',NULL,1),(67,6,3,'','0',NULL,1),(68,6,3,'','0',NULL,1),(69,6,3,'','0',NULL,1),(70,6,3,'','0',NULL,1),(71,6,3,'','0',NULL,1),(72,6,3,'','0',NULL,1),(73,6,3,'','0',NULL,1),(74,6,3,'','0',NULL,1),(75,6,3,'','0',NULL,1),(76,6,3,'','0',NULL,1),(77,6,3,'','0',NULL,1),(78,6,3,'','0',NULL,1),(79,6,3,'','0',NULL,1),(80,6,3,'','0',NULL,1),(81,6,3,'','0',NULL,1),(82,6,3,'','0',NULL,1),(83,6,3,'','0',NULL,1),(84,6,3,'','0',NULL,1),(85,6,3,'','0',NULL,1),(86,6,3,'','0',NULL,1),(87,6,3,'','0',NULL,1),(88,6,3,'','0',NULL,1),(89,6,3,'','0',NULL,1),(90,6,3,'','0',NULL,1),(91,6,3,'','0',NULL,1),(92,6,3,'','0',NULL,1),(93,6,3,'','0',NULL,1),(94,6,3,'','0',NULL,1),(95,6,3,'','0',NULL,1),(96,6,3,'','0',NULL,1),(97,6,3,'','0',NULL,1),(98,6,3,'','0',NULL,1),(99,6,3,'','0',NULL,1),(100,6,3,'','0',NULL,1),(101,6,3,'','0',NULL,1),(102,2,3,'fsdfsf','0',NULL,0),(103,4,NULL,'[\"sa\",\"sfdlkjaf\",\"fsdlkj\"]','0',NULL,0),(104,4,NULL,'[\"sa\",\"sfdlkjaf\",\"fsdlkj\"]','0',NULL,0),(105,4,NULL,'[\"sda\",\"fsdjkl\",\"sfdklj\"]','0',NULL,0),(106,4,4,'[\"sda\",\"fsdjkl\",\"sfdklj\"]','0',NULL,0),(107,4,4,'[\"sda\",\"fsdjkl\",\"sfdklj\"]','0',NULL,0),(108,4,4,'[\"sda\",\"fsdjkl\",\"sfdklj\"]','fsdjkl',NULL,0),(109,4,4,'[\"fsda\",\"fsdgklj\",\"fdsa\"]','test1',NULL,0),(110,4,4,'[\"fsda\",\"fsdgklj\",\"fdsa\"]','test1',NULL,0),(111,4,4,'[\"fjdskl\",\"sfdklj\",\"fsdlkj\"]','fkjlsj',NULL,0),(112,4,5,'[\"fdsjk\",\"2fjskl\",\"fdsjlk\"]','test',NULL,0),(113,4,6,'[\"sdfjk\",\"lkjfsd\",\"fjkl\"]','test123',NULL,0),(115,4,8,'[\"asf\",\"fsda\",\"fdas\"]','test1234',NULL,1),(116,5,8,'[\"dasf\",\"fsda\",\"sfdaa\"]','test',NULL,0),(117,4,12,'[\"f\",\"dfs\",\"dfs\"]','122344555',NULL,0),(118,5,17,'[\"asdfkj\",\"skjlf\",\"skjl\"]','Test123',NULL,0),(119,4,6,'[]','',NULL,0),(120,5,6,'[\"djklsfaj\",\"fsdjklfslkj\",\"jfklsdklj\"]','test123456',NULL,0),(121,5,4,'[\"dsjkl\",\"slkdjf\",\"fgsdklj\"]','sdfklj',NULL,0),(122,4,6,'[\"fadskj\",\"kfslaj\",\"fklja\"]','lkdfsaj',NULL,0),(123,7,6,'[\"jkfdsla\",\"fdsalkj\"]','fsakl',NULL,0),(124,7,4,'[\"falsjk\",\"sakjl\"]','fdskjla',NULL,0),(125,7,1,'[\"afksl\",\"fljak\"]','fskj',NULL,0),(126,7,1,'[\"afksl\",\"fljak\"]','fskj',NULL,0),(127,7,21,'[\"jkfsda\",\"fksja\"]','dfskjl',NULL,0),(128,7,21,'[\"jkfsda\",\"fksja\"]','dfskjl',NULL,0),(129,7,21,'[\"jkfsda\",\"fksja\"]','dfskjl',NULL,0),(130,7,21,'[\"jkfsda\",\"fksja\"]','dfskjl',NULL,0),(131,7,21,'[\"jkfsda\",\"fksja\"]','dfskjl',NULL,0),(132,7,21,'[\"jkfsda\",\"fksja\"]','dfskjl',NULL,0),(133,7,21,'[\"jkfsda\",\"fksja\"]','dfskjl',NULL,0),(134,7,21,'[\"jkfsda\",\"fksja\"]','dfskjl','ae32c036d588239f01be5dddde63d788',1),(135,7,21,'[\"jkfsda\",\"fksja\"]','dfskjl','9dadedc36e1c3844ca92a9839326bc45',0),(136,7,21,'[\"jkfsda\",\"fksja\"]','dfskjl','27541592e0cedc51fd8cfe136ea22640',0),(137,4,21,'[\"dfkjfa\",\"fskjla\",\"dfskjl\"]','fdskjl','893352fe88006650b4322aea356a97e5',0),(138,4,21,'[\"dfkjfa\",\"fskjla\",\"dfskjl\"]','fdskjl','6ba2ded3d10f410d487483f4eba9915d',0),(139,5,21,'[\"flaj\",\"fdkjlas\",\"sajklf\"]','afskjl','a3d7bf7ecb52825967b17b837e80c8a5',0),(140,4,24,'[\"kjfakl\",\"fsdkjla\",\"klfadskl\"]','fskadjl','3d3d5f506f774e969c0a3728e2028398',1),(141,1,28,'[\"kfjsa\"]','adsklfjkasdafj','9f4057350986c6ee1fc2554977ff40e2',1),(142,1,29,'[\"test\"]','test','8f97d6b3fce5686bfa140b09ee390fb2',1),(143,1,30,'[\"dfajk\"]','dsflk','9a96b0bb52ba9186f53f97c35e0c9eee',1),(144,1,31,'[\"kasdfk\"]','kldsjl','6460dae6db5a91148b1ed23d410f4a98',1);
/*!40000 ALTER TABLE `eventUsers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `newsId` smallint(6) NOT NULL AUTO_INCREMENT,
  `header` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(9999) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`newsId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'preview','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam efficitur in sapien a semper. Nunc eu pulvinar magna, a tincidunt lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras scelerisque mi porttitor purus ultricies laoreet. Quisque egestas dui quis orci efficitur viverra. Sed nibh lacus, feugiat sit amet porta sit amet, malesuada at ipsum. Quisque tincidunt euismod justo in scelerisque. Praesent mi risus, elementum at nulla in, ornare tristique metus. Pellentesque enim erat, bibendum id diam id, dignissim faucibus odio. Proin volutpat nunc justo, quis blandit lorem fermentum a. Vivamus commodo luctus dictum. Quisque vulputate leo id dolor sagittis efficitur. In sed nibh facilisis, facilisis elit eget, sodales diam. Maecenas luctus mauris ac velit tincidunt fringilla. Donec interdum ante in mi ultrices pulvinar. Pellentesque laoreet velit et gravida tincidunt. Etiam consectetur convallis turpis et aliquam. In et arcu dolor. Cras molestie diam nunc, ut suscipit ligula sagittis vel. Quisque auctor risus ut nulla porttitor, vitae aliquet lorem vestibulum. Suspendisse ornare libero sit amet felis bibendum porta. Phasellus imperdiet pellentesque mauris, eu scelerisque nulla ultrices a. Phasellus ut felis tortor. Suspendisse accumsan molestie libero id vehicula. Nullam vitae lectus laoreet, consectetur felis vel, vulputate lacus. Etiam ac velit ante. In pulvinar massa nec nunc iaculis finibus. Aenean bibendum orci eget mauris.','2020-03-22 00:00:00'),(2,'preview','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam efficitur in sapien a semper. Nunc eu pulvinar magna, a tincidunt lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras scelerisque mi porttitor purus ultricies laoreet. Quisque egestas dui quis orci efficitur viverra. Sed nibh lacus, feugiat sit amet porta sit amet, malesuada at ipsum. Quisque tincidunt euismod justo in scelerisque. Praesent mi risus, elementum at nulla in, ornare tristique metus. Pellentesque enim erat, bibendum id diam id, dignissim faucibus odio. Proin volutpat nunc justo, quis blandit lorem fermentum a. Vivamus commodo luctus dictum. Quisque vulputate leo id dolor sagittis efficitur. In sed nibh facilisis, facilisis elit eget, sodales diam. Maecenas luctus mauris ac velit tincidunt fringilla. Donec interdum ante in mi ultrices pulvinar. Pellentesque laoreet velit et gravida tincidunt. Etiam consectetur convallis turpis et aliquam. In et arcu dolor. Cras molestie diam nunc, ut suscipit ligula sagittis vel. Quisque auctor risus ut nulla porttitor, vitae aliquet lorem vestibulum. Suspendisse ornare libero sit amet felis bibendum porta. Phasellus imperdiet pellentesque mauris, eu scelerisque nulla ultrices a. Phasellus ut felis tortor. Suspendisse accumsan molestie libero id vehicula. Nullam vitae lectus laoreet, consectetur felis vel, vulputate lacus. Etiam ac velit ante. In pulvinar massa nec nunc iaculis finibus. Aenean bibendum orci eget mauris.','2020-03-22 00:00:00'),(3,'preview','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam efficitur in sapien a semper. Nunc eu pulvinar magna, a tincidunt lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras scelerisque mi porttitor purus ultricies laoreet. Quisque egestas dui quis orci efficitur viverra. Sed nibh lacus, feugiat sit amet porta sit amet, malesuada at ipsum. Quisque tincidunt euismod justo in scelerisque. Praesent mi risus, elementum at nulla in, ornare tristique metus. Pellentesque enim erat, bibendum id diam id, dignissim faucibus odio. Proin volutpat nunc justo, quis blandit lorem fermentum a. Vivamus commodo luctus dictum. Quisque vulputate leo id dolor sagittis efficitur. In sed nibh facilisis, facilisis elit eget, sodales diam. Maecenas luctus mauris ac velit tincidunt fringilla. Donec interdum ante in mi ultrices pulvinar. Pellentesque laoreet velit et gravida tincidunt. Etiam consectetur convallis turpis et aliquam. In et arcu dolor. Cras molestie diam nunc, ut suscipit ligula sagittis vel. Quisque auctor risus ut nulla porttitor, vitae aliquet lorem vestibulum. Suspendisse ornare libero sit amet felis bibendum porta. Phasellus imperdiet pellentesque mauris, eu scelerisque nulla ultrices a. Phasellus ut felis tortor. Suspendisse accumsan molestie libero id vehicula. Nullam vitae lectus laoreet, consectetur felis vel, vulputate lacus. Etiam ac velit ante. In pulvinar massa nec nunc iaculis finibus. Aenean bibendum orci eget mauris.','2020-03-22 00:00:00'),(4,'Header','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam efficitur in sapien a semper. Nunc eu pulvinar magna, a tincidunt lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras scelerisque mi porttitor purus ultricies laoreet. Quisque egestas dui quis orci efficitur viverra. Sed nibh lacus, feugiat sit amet porta sit amet, malesuada at ipsum. Quisque tincidunt euismod justo in scelerisque. Praesent mi risus, elementum at nulla in, ornare tristique metus. Pellentesque enim erat, bibendum id diam id, dignissim faucibus odio. Proin volutpat nunc justo, quis blandit lorem fermentum a. Vivamu','2020-03-22 19:23:22');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tournaments`
--

DROP TABLE IF EXISTS `tournaments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tournaments` (
  `tournamentId` smallint(6) NOT NULL AUTO_INCREMENT,
  `tournamentName` varchar(1000) DEFAULT NULL,
  `tournamentType` varchar(255) DEFAULT NULL,
  `max_contestants` smallint(6) DEFAULT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  PRIMARY KEY (`tournamentId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tournaments`
--

LOCK TABLES `tournaments` WRITE;
/*!40000 ALTER TABLE `tournaments` DISABLE KEYS */;
INSERT INTO `tournaments` VALUES (1,'test','duos',100,'2020-10-30 18:00:00','2020-10-30 20:00:00');
/*!40000 ALTER TABLE `tournaments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userId` int(10) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `platform` varchar(50) DEFAULT NULL,
  `IGN` varchar(500) DEFAULT NULL,
  `mailVerification` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'KikkertjeK','thomasluchies22@gmail.com','$2y$10$1oO.T0/c8IjZ7b5sNeISpOOktyw50meXQGTn7U2KleVVNxCGCGr4e','pc','KikkertjeK',NULL,NULL),(2,'KikkertjeK','thomasluchies22@gmail.com','$2y$10$Q2vke8MTLatJMc65tg0zm.XZMZu6xdUfx6hIZoQ2Y.QqIKBx0K7pq','pc','KikkertjeK',NULL,NULL),(3,'KikkertjeK','Thomasluchies22@gmail.com','$2y$10$PPjjdeKC49BVpZgvtmpxZ.cPG8gxd7hT2mcvLCLk542yNLu2etMKy','xbox','KikkertjeK',NULL,NULL),(4,'test','Thomasluchies22@Gmail.com','$2y$10$U9tG9pHPmDlHHlsBrX4VxOn6MklYuuQZ1V5XuxdUHxvWsbceiqKEG','xbox','KikkertjeK',NULL,NULL),(5,'test2','Thomasluchies22@gmail.com','$2y$10$QnFVxM9HKtjZHdH80B6h1eG7Jj6oMP4ahZdJQyqjsEhOGy4.tCX.a','xbox','KikkertjeK',NULL,NULL),(6,'test123','thomasluchies22@gmail.com','$2y$10$Xb5vKo91cxmfLk4b5AAEleJpC20Bf2OFga.gFh1evXwiCvLlGiWj6','xbox','kfsd',NULL,NULL),(7,'test123','thomasluchies22@gmail.com','$2y$10$ns7Hn4CRd/AIOPX/WJ6Z8uLNS5ABLWFdHBNwuJgMXIVpXakfTrH6O','xbox','kfsd',NULL,NULL),(8,'fasd','fsda@fsjh.com','$2y$10$/i41lTMYfYd0FC6FRgJqKu7XIoFlrkbP/xqxgufLGg0/uzU1rfFoy','xbox','fasd',NULL,NULL),(9,'fasd','fsda@fsjh.com','$2y$10$hazbX6QQphSyD9gQiBxWi.f7DxmLI5nHmZgbyAxvVI/G2/x9PFDsG','xbox','fasd',NULL,NULL),(10,'fasd','thomasluchies22@gadfskj.com','$2y$10$rUDrZAw8bum3sfgillK.y.pU9RIyH6E5BT7ErSzphUtQdgVpNxSnG','xbox','jafksld',NULL,NULL),(11,'fasd','thomasluchies22@gadfskj.com','$2y$10$.XwCvWUxdF5W8ly8x1g0j.dFkvZG51L6U5pYlKWBHYlvTpo4F8oEW','xbox','jafksld',NULL,NULL),(12,'123','123@123.com','$2y$10$1sGFQCS.ZCuRXkroJlsTXeD7Ed3DWDJT9P3vlQN//teCzBGldS3lq','xbox','123',NULL,NULL),(13,'123','123@123.com','$2y$10$tO.bGaH645h6ZoORqTnbbujN4gVgNaQ7.n5FAIa8GHp7NGAQaCpnG','xbox','123',NULL,NULL),(14,'123','123@123.com','$2y$10$MfC3w9dqD0aD5KRn4YBXvO579lrJAY2aXJhgwGePTUpAih/mRR5qG','xbox','123',NULL,NULL),(15,'123','123@123.com','$2y$10$5hHbJFymo7Vnzd6orv8wxOCcxMRfiD5kNOnFCRVLxdYYjBFaTeaxq','xbox','123',NULL,NULL),(16,'123','123@123.com','$2y$10$hChAO.UyVadOSLIjWHBQNe1uTeGCqUu392Wt7bEsQr.fqsRFI5NbK','xbox','123',NULL,NULL),(17,'ja','thoams@fkdsjl.com','$2y$10$CKY3OTFtqpw7bp4UBtFrJuqritFr415ZXmg4cdieaIB.Iz3B.hkFW','xbox','aj',NULL,NULL),(18,'ja','thoams@fkdsjl.com','$2y$10$78THdsCT1XEEObIu5mUexe3w0Yl4/tU6LCCFZwrrv89jtHMKcljK.','xbox','aj',NULL,NULL),(19,'ja','thoams@fkdsjl.com','$2y$10$0Eb7meoL9/nlQpVyCcMKreMwrDr5Ee4IK0jafG0.RMtXaUgWQ3pdu','xbox','aj',NULL,NULL),(20,'ja','thoams@fkdsjl.com','$2y$10$.cO0V6C4l80xLkZoeUhP/e2rDZVgcg/Ja6MtfktbPI2pXZiF4a1wS','xbox','aj',NULL,NULL),(21,'tets','fkdasl@fklsj.com','$2y$10$35tmYNjgoSzd.rjstbXkQuvKEtM65oNiS/.TLoE4kZk6/SGfnomW6','xbox','kfdsa',NULL,NULL),(22,'tets','fkdasl@fklsj.com','$2y$10$bIf.XfofqcIJgWW9Hs2eduaBNf3UmqJRveLkQLtoUVhmbVxZiUdh2','xbox','kfdsa',NULL,NULL),(23,'tets','fkdasl@fklsj.com','$2y$10$CihhdLiGl6t9DLfvABZ/pelufU2WmFmCDzZYFjAUTy8DO54K/OVRS','xbox','kfdsa',NULL,NULL),(24,'a','akjsdf@fkjsa.com','$2y$10$.hxd5PCXAYUbFbfOgWtZjOPi1hJfioaYfUpaWk4ME1FPADtfogg1S','xbox','fkljsa',NULL,NULL),(25,'a','akjsdf@fkjsa.com','$2y$10$DK1Za6bVQNKIHLvzdQ/./OOQhDUuhG6py53C/TRrMDbPfOBDogjaS','xbox','fkljsa',NULL,NULL),(26,'fasklj','Thomasluchies22@gmail.com','$2y$10$Bnb3Rrhabs9QqdkxaDKo3ezpCc4H1JN6.WSFY7f29P2s8VWB34txq','xbox','thfkajls','abd5df52de5492543181b3027866108f',1),(27,'testtesttesttest','Thomasluchies22@gmail.com','$2y$10$frRDSmothc/0/2HrpVmp/OcbBz8KrusIxIxlet5d5v/3shURAegLW','xbox','KikkertjeK','eef5f4d95a53c96104e7c47a9ac5deff',1),(28,'aefs','Thomasluchies22@gmail.com','$2y$10$UyZZD7yvRVhwqNr6Dek3gOa0EWZhpyEjKR2daLCHOqHJgyr7z6pte','xbox','aefs','c53ef234518ed9d0d5b3afb11fd20047',1),(29,'asdfg','Thomasluchies22@gmail.com','$2y$10$7Tv5I.Mq0SO8SACz9znrj.lnxzsZMp1eHKLPY69hui6MKLsrtcIBG','xbox','asdfg','3f94f7ed9a8e06f1e2e14e0195f1df96',1),(30,'testtesttesttesttest','Thomasluchies22@gmail.com','$2y$10$YV0zsdIwHAr/bmpecC4X/ujmsZCA3TepfQohOZhuVgfXrHSB/3Fx.','xbox','test','141727f1f2f7f38b3d283ca6d2369f26',1),(31,'KikkertjeK22','Thomasluchies22@gmail.com','$2y$10$WpNK0IduajcQUhSGaeLJCOHgBL8Xf2NkhbaIT1nBRFRj9Nm8umk.S','xbox','jfkjakjs','ff75686448c597ebf03bb33285c3a179',1),(32,'KikkertjeK22','Thomasluchies22@gmail.com','$2y$10$sKnoBM.C8aaZIy6.rcWWgusalKKTGZerBESkrmJR.zbAbDDTuDOlS','xbox','jfkjakjs','d794a04a39669cd1038e34b254ea6a59',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-24 23:34:56
