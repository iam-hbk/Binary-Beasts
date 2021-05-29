-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: Crimeline
-- ------------------------------------------------------
-- Server version	8.0.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name_unique` (`cat_name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Sexual harassment','Sexual harassment is any kind of unwanted behavior of a sexual nature that makes you feel humiliated or intimidated, or that creates a hostile environment.'),(2,'Sexual Assault','Sexual assault is an act in which a person intentionally sexually touches another person without that person \' s consent, or coerces or physically forces a person to engage in a sexual act against their will '),(3,'Robbery','A robbery is when someone takes something from you with violence or threats – usually (but not always) in the street or another public place.Petty crime A minor crime and for which the punishment is usually just a small fine or short term of imprisonment.'),(4,'Burglary','A burglary is when someone breaks into a building with the intention of stealing, hurting someone or committing unlawful damage.'),(5,'Hate crime','Hate crime is the term used to describe an incident or crime against someone based on a part of their identity.'),(6,'Fraud','Fraud is when someone tricks or deceives you to gain a dishonest advantage.'),(7,'Arson','Arson is when someone deliberately sets fire to someone else \' s property to damage it or to injure people.'),(8,'Cyber crime','The term cyber crime refers to a variety of crimes carried out online.'),(9,'Domestic abuse','Domestic abuse describes negative behaviors that one person exhibits over another within families or relationships.'),(10,'Modern Slavery','Modern Slavery is a serious and often hidden crime.It comprises slavery, servitude, forced and compulsory labour and human trafficking, which is the harbouring and transportation of individuals for exploitation.'),(11,'Murder','Bereavement is a painful experience for anyone, but when you lose someone because of the violent actions of another person – through murder or manslaughter – it can be particularly devastating.'),(12,'Violent crime','A violent crime is when someone physically hurts or threatens to hurt someone, and also includes crimes where a weapon is used.'),(13,'Terrorism','Terrorist attacks are sudden and unpredictable and generally calculated to create a climate of fear or terror among the public.A terror attack can lead to an ongoing feeling of insecurity.'),(14,'Petty Crime','Minor crimes such as domestical theft,pickpocketing...');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int NOT NULL,
  `post_by` int NOT NULL,
  `isMainTopic` int DEFAULT NULL,
  `positive_votes` int DEFAULT '0',
  `negative_votes` int DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `post_topic` (`post_topic`),
  KEY `post_by` (`post_by`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (13,'My neighbor is in trouble guys ! ','2021-05-26 00:02:59',13,17,1,0,0),(14,'so this guy was weird with me, I ran yoh !','2021-05-26 01:28:19',14,17,1,0,0),(15,'I got bullied at school, how do I deal with it ?','2021-05-26 12:42:00',16,16,1,0,0),(16,'Johannesburg CBD, be careful, something like that','2021-05-26 13:03:42',17,20,1,0,0),(17,'Some reply content dummy data just to fill in Some reply content dummy data just to fill in Some reply content dummy data just to fill in Some reply content dummy data just to fill in Some reply content dummy data just to fill in','2021-05-27 08:41:04',16,16,0,0,0),(18,'Some reply content dummy data just to fill in Some reply content dummy data just to fill in Some reply content dummy data just to fill in Some reply content ','2021-05-27 09:45:22',17,16,0,0,0),(19,'something like thatSome reply content dummy data just to fill in Some reply content dummy data just to fill in Some reply content dummy data just to fill in Some','2021-05-27 09:45:44',17,16,0,0,0),(20,'ohannesburg CBD, be careful, something like thatSome reply content dummy data','2021-05-27 10:43:17',17,19,0,0,0),(21,'I am chadrack I reply in pickpocketing','2021-05-27 10:46:37',17,17,0,0,0),(22,'I\'m chad reply in bullying','2021-05-27 10:47:21',16,17,0,0,0),(23,'A password is a string of characters used for authenticating a user on a computer system. For example, you may have an account on your computer that requires you to log in. ... Most passwords are comprised of several characters, which can typically include letters, numbers, and most symbols, but not spaces.','2021-05-27 12:04:45',18,23,1,0,0),(24,'Oh really ! ','2021-05-27 12:47:51',18,24,0,0,0),(25,'That\'s actually useful\r\n','2021-05-27 12:56:44',18,24,0,0,0),(26,'oh really !!','2021-05-27 12:57:28',17,24,0,0,0),(27,'jo\'burg, your post doesn\'t make sense','2021-05-27 12:59:14',17,23,0,0,0),(28,'you got bullied ? that sucks ','2021-05-27 13:08:20',16,23,0,0,0),(29,'well don\'t mind them','2021-05-27 13:09:57',16,23,0,0,0),(30,'Guys be careful, Braam is not safe these days.','2021-05-27 23:39:51',19,28,1,0,0),(31,'Be careful guys','2021-05-27 23:40:19',19,28,0,0,0),(32,'yea it\'s true, you mustn\'t go there','2021-05-27 23:41:15',19,24,0,0,0),(33,'children of Ben are preparing a thing be careful out there!','2021-05-28 14:36:58',20,30,1,0,0),(34,'Okay rich man is here','2021-05-28 14:37:21',16,30,0,0,0),(35,'Don\\\'t allow people to touch you when you don\\\'t want.','2021-05-28 15:45:28',21,24,1,0,0),(36,'ive expeienced something simillar','2021-05-28 16:38:05',14,31,0,0,0),(37,'witnessed someone being beaten brutally for stealing a pack of bubblegum','2021-05-28 16:39:45',22,31,1,0,0),(38,'don\'t allow it\r\n','2021-05-28 23:26:02',21,30,0,0,0),(39,'Yes we can we live together although we have some differences, don\\\'t let them divide us, let\\\'s fight, don\\\'t give up\\r\\n','2021-05-28 23:27:45',23,30,1,0,0),(40,'don\'t let\'s\r\n\r\nsome text','2021-05-28 23:41:02',24,30,1,0,0),(41,'huh ! really\r\nI\'m shocked','2021-05-28 23:42:56',20,30,0,0,0),(43,'Huh?','2021-05-29 00:07:48',24,30,0,0,0);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `replies` (
  `reply_id` int NOT NULL AUTO_INCREMENT,
  `reply_by` int DEFAULT NULL,
  `reply_content` varchar(255) NOT NULL,
  `reply_date` datetime NOT NULL,
  `topic_id` int NOT NULL,
  PRIMARY KEY (`reply_id`),
  KEY `reply_by` (`reply_by`),
  KEY `topic_id` (`topic_id`),
  CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`reply_by`) REFERENCES `users` (`user_id`),
  CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `topics` (
  `topic_id` int NOT NULL AUTO_INCREMENT,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int NOT NULL,
  `topic_by` int NOT NULL,
  PRIMARY KEY (`topic_id`),
  UNIQUE KEY `topic_subject` (`topic_subject`),
  KEY `topic_cat` (`topic_cat`),
  KEY `topic_by` (`topic_by`),
  CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_by`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `topics_ibfk_3` FOREIGN KEY (`topic_by`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (13,'Robbery near me','2021-05-26 00:02:59',3,17),(14,'I ran !','2021-05-26 01:28:18',2,17),(16,'Bullying','2021-05-26 12:41:57',9,16),(17,'pickpocketing','2021-05-26 13:03:42',3,20),(18,'Password portection','2021-05-27 12:04:45',8,23),(19,'rape around braam','2021-05-27 23:39:50',2,28),(20,'Ben ladin','2021-05-28 14:36:58',13,30),(21,'touch touch games','2021-05-28 15:45:27',2,24),(22,'bathong','2021-05-28 16:39:45',14,31),(23,'Yes we can!','2021-05-28 23:27:45',5,30),(24,'yea we can !','2021-05-28 23:41:02',5,30);
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_date` datetime NOT NULL,
  `user_level` int NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name_unique` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (13,'Ronnie','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3','Ronnie@uj.com','2021-05-20 16:48:05',1),(16,'Zandy','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3','sanah@uj.com','2021-05-20 22:53:28',1),(17,'chadrack','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3','chad@uj.com','2021-05-21 12:02:26',1),(19,'Lelethu','94ba69fdd6ac7c1576e4b079514aa04004822824','lele2@gmail.com','2021-05-24 11:23:44',1),(20,'Bel','385c9b0a4949de9ac44a71ba17969ca502dcd238','sanah.rasethaba@gmail.com','2021-05-26 12:59:43',1),(22,'mamie','3e3780dc5bf697c55df28ce1f5240051652bfd2a','mamieMiziro@gmail.com','2021-05-27 11:40:19',1),(24,'Nathan','2c95e590c473c4649b9029a37c3240aceaa196ff','Ntback@gmail.com','2021-05-27 11:49:29',1),(25,'baba','b32ee68acb841d865611c8efc7a9490fe70ac5d0','baba@gmail.com','2021-05-27 11:59:07',1),(28,'Ndivhuwo','4c16ea74e2d721f0fcf3567f5145e8008ab72c2a','Ndi@uj.ac.za','2021-05-27 23:37:30',1),(29,'Scott','0322b66b740b0a00d68bb755c4961c0adb56a318','Emmanuek@gmail.com','2021-05-28 13:31:26',1),(30,'Rich man','0175734df3d0b382299d49b3835d7eb218269fe5','isra@uj.com','2021-05-28 14:35:17',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votes`
--

DROP TABLE IF EXISTS `votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `votes` (
  `vote_id` int NOT NULL,
  `post_id` int DEFAULT NULL,
  `voted_by` int DEFAULT NULL,
  `N_P` int DEFAULT NULL,
  PRIMARY KEY (`vote_id`),
  UNIQUE KEY `voted_by` (`voted_by`),
  CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`voted_by`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes`
--

LOCK TABLES `votes` WRITE;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-29 13:14:35
