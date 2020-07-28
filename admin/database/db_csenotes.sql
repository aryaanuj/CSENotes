-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_csenotes
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

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
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT 'images/admin.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admin`
--

LOCK TABLES `tbl_admin` WRITE;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` VALUES (1,'hemant','a91552a22e01f39068110a869b243d14','images/1595936269.jpg');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `catimage` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('published','upcoming') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_category`
--

LOCK TABLES `tbl_category` WRITE;
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` VALUES (17,'python','2020-07-27 20:22:54','1595859671.jpg','Python is an interpreted, high-level, general-purpose programming language. Created by Guido van Rossum and first released in 1991, Python\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\'s design philosophy emphasizes code readability with its notable use of significant whitespace.','upcoming'),(25,'TOC','2020-07-27 20:24:28','1595859636.jpg','Automata theory (also known as Theory Of Computation) is a theoretical branch of Computer Science and Mathematics, which mainly deals with the logic of computation with respect to simple machines, referred to as automata. ... Automata is originated from the word “Automaton” which is closely related to “Automation”.','published'),(28,'Machine Learning','2020-07-27 20:24:40','1595859597.png','Machine learning (ML) is the study of computer algorithms that improve automatically through experience. It is seen as a subset of artificial intelligence. Machine learning algorithms build a mathematical model based on sample data, known as \\\\\\\\\\\\\\\\\\\\&quot;training data\\\\\\\\\\\\\\\\\\\\&quot;, in order to make predictions or decisions without being explicitly programmed to do so.','upcoming');
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_posts`
--

DROP TABLE IF EXISTS `tbl_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  `status` enum('published','unpublished') NOT NULL,
  `sub_topic` varchar(255) DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_posts`
--

LOCK TABLES `tbl_posts` WRITE;
/*!40000 ALTER TABLE `tbl_posts` DISABLE KEYS */;
INSERT INTO `tbl_posts` VALUES (11,'TOC','Non-Deterministic Finite Automata(NFA or NDFA)','<p>Non-deterministic Finite Automata (NFA or NDFA) is category of Finite Automata. The differ- ence between deterministic and non-deterministic is choice of moves. In DFA a state read input and moves to only one state; but In NFA a state read one input and moves to either one state or more than one state or nothing to move (<em>&phi; </em>). NFA machine is not real.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; <img alt=\"\" src=\"post-images/1159580227.jpg\" style=\"height:128px; width:300px\" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"post-images/395778866.jpg\" style=\"height:310px; width:300px\" /></p>\r\n','2020-07-26 15:20:31','unpublished','NO'),(13,'TOC','Non-Deterministic Finite Automata(NFA or NDFA)','<h2><strong>Non-Deterministic Finite Automata(DFA)</strong></h2>\r\n\r\n<p><strong>Definition&nbsp;</strong>The DFA contains five tuples in a&nbsp;</p>\r\n\r\n<p><strong><em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;M&nbsp;</em>= (<em>Q</em><em>,&nbsp;</em>&Sigma;<em>,&nbsp;</em><em>&delta;&nbsp;</em><em>,&nbsp;</em><em>q</em>0<em>,</em><em>&nbsp;</em><em>F</em>)</strong></p>\r\n\r\n<p>where,</p>\r\n\r\n<p><em>Q&nbsp;</em>is finite Set of states</p>\r\n\r\n<p>&Sigma; is input alphabet</p>\r\n\r\n<p><em>q</em>0 is start state&nbsp;<em>q</em>0 &isin;&nbsp;<em>Q</em></p>\r\n\r\n<p><em>F&nbsp;</em>is set of final states&nbsp;<em>Q&nbsp;</em>&supe;&nbsp;<em>F&nbsp;</em>(Q is superset of F)</p>\r\n\r\n<p><em>&delta;&nbsp;</em>is transition function&nbsp;<em>&delta;&nbsp;</em>:&nbsp;<em>Q&nbsp;</em>&times;&nbsp;<em>F&nbsp;</em>&rarr; 2<em>Q</em></p>\r\n\r\n<p>Every DFA is NFA.</p>\r\n\r\n<h2><strong>Example based of NFA</strong></h2>\r\n\r\n<p><strong>Example 1.&nbsp;</strong>Construct a minimal DFA which accepts set of all strings over &Sigma; start with a. Language&nbsp;<em>L&nbsp;</em>= {<em>a</em><em>,&nbsp;</em><em>ab</em><em>,&nbsp;</em><em>aa</em><em>,&nbsp;</em><em>aaa</em><em>,&nbsp;</em><em>aba</em><em>,...</em>}</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"post-images/722831559.jpg\" style=\"height:173px; width:300px\" /></p>\r\n\r\n<p><strong>Example 2.&nbsp;</strong>Construct a minimal DFA which accepts set of all strings over &Sigma; which contains &rsquo;a&rsquo;.</p>\r\n\r\n<p>Language&nbsp;<em>L&nbsp;</em>= {<em>a</em><em>,&nbsp;</em><em>ab</em><em>,&nbsp;</em><em>aa</em><em>,&nbsp;</em><em>ba</em><em>,&nbsp;</em><em>bba</em><em>,&nbsp;</em><em>bab</em><em>,&nbsp;</em><em>aaa</em><em>,&nbsp;</em><em>aba</em><em>,...</em>}</p>\r\n\r\n<p><img alt=\"\" src=\"post-images/1203194560.jpg\" style=\"height:173px; width:300px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Example 3.&nbsp;</strong>Construct a minimal DFA which accepts set of all strings over &Sigma; start with a. Language&nbsp;<em>L&nbsp;</em>= {<em>a</em><em>,&nbsp;</em><em>ab</em><em>,&nbsp;</em><em>aa</em><em>,&nbsp;</em><em>aaa</em><em>,&nbsp;</em><em>aba</em><em>,...</em>}</p>\r\n\r\n<p><img alt=\"\" src=\"post-images/1143349147.jpg\" style=\"height:182px; width:300px\" /></p>\r\n','2020-07-26 15:35:16','published','DFA'),(14,'TOC','Non-Deterministic Finite Automata(NFA or NDFA)','<p>The <em>&epsilon;</em>- transitions in NFA are given in order to move from one state to another without having any symbol from input alphabet &Sigma;.</p>\r\n\r\n<p><img alt=\"\" src=\"post-images/878827421.jpg\" /></p>\r\n\r\n<h2>Definition</h2>\r\n\r\n<p>The <em>&epsilon;</em>&minus;NFA contains five tuples in a</p>\r\n\r\n<p><strong><em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; M </em>= (<em>Q</em><em>, </em>&Sigma;<em>, </em><em>&delta; </em><em>, </em><em>q</em>0<em>,</em><em> </em><em>F</em>)</strong></p>\r\n\r\n<p>where,</p>\r\n\r\n<p><em>Q </em>is finite Set of states</p>\r\n\r\n<p>&Sigma; is input alphabet</p>\r\n\r\n<p><em>q</em>0 is start state <em>q</em>0 &isin; <em>Q</em></p>\r\n\r\n<p><em>F </em>is set of final states <em>Q </em>&supe; <em>F </em>(Q is superset of F)</p>\r\n\r\n<p><em>&delta; </em>is transition function <em>&delta; </em>: <em>Q </em>&times; {&Sigma; &cup; <em>&epsilon;</em>} &rarr; 2<em>Q</em></p>\r\n','2020-07-26 15:35:10','published','ε-NFA');
/*!40000 ALTER TABLE `tbl_posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-28 17:42:14
