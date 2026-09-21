CREATE DATABASE  IF NOT EXISTS `k00320413_stationery_store` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `k00320413_stationery_store`;
-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: k00320413_stationery_store
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brand` (
  `BrandID` int(11) NOT NULL,
  `BrandName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`BrandID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES (1,'Premto'),(2,'Faber-Castell'),(3,'Sanrio'),(4,'Campus'),(5,'Snoopy'),(6,'MUJI'),(7,'Other');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Pens and Pencils'),(2,'Notebooks'),(3,'Erasers'),(4,'Binders and File Folders'),(5,'Pencil Cases'),(6,'Diaries and Planners'),(7,'Staionery Sets'),(8,'Rulers and Scissors'),(9,'Tape and Stickers'),(10,'Other');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatmsg`
--

DROP TABLE IF EXISTS `chatmsg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chatmsg` (
  `msgID` int(11) NOT NULL AUTO_INCREMENT,
  `msgText` varchar(244) DEFAULT NULL,
  `dateTimeStamp` datetime DEFAULT current_timestamp(),
  `msgAuthorID` varchar(40) DEFAULT NULL,
  `userType` varchar(10) DEFAULT NULL,
  `msgTo` varchar(40) DEFAULT 'ALL',
  PRIMARY KEY (`msgID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatmsg`
--

LOCK TABLES `chatmsg` WRITE;
/*!40000 ALTER TABLE `chatmsg` DISABLE KEYS */;
INSERT INTO `chatmsg` VALUES (6,'Welcome everyone to the FRAMEWORK application. ','2026-02-09 12:20:37','janeh@mail.com','CUSTOMER','ALL'),(7,'This is a message from Jane to Harry Boland','2026-02-09 12:21:21','janeh@mail.com','CUSTOMER','harry@lit.ie'),(8,'This message is from Jane to John Smith','2026-02-09 12:21:51','janeh@mail.com','CUSTOMER','jsmith@college.ie'),(9,'This is a second  message  from Jane to John Smith','2026-02-09 12:22:09','janeh@mail.com','CUSTOMER','jsmith@college.ie');
/*!40000 ALTER TABLE `chatmsg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Afghanistan'),(2,'Albania'),(3,'Bahamas'),(4,'Bahrain'),(5,'Cambodia'),(6,'Cameroon'),(7,'Denmark'),(8,'Djibouti'),(9,'East Timor'),(10,'Ecuador'),(11,'Falkland Islands (Malvinas)'),(12,'Faroe Islands'),(13,'Gabon'),(14,'Gambia'),(15,'Haiti'),(16,'Heard and Mc Donald Islands'),(17,'Iceland'),(18,'India'),(19,'Jamaica'),(20,'Japan'),(21,'Kenya'),(22,'Kiribati'),(23,'Lao Peoples Democratic Republic'),(24,'Latvia'),(25,'Macau'),(26,'Macedonia'),(27,'Namibia'),(28,'Nauru'),(29,'Oman'),(30,'Pakistan'),(31,'Palau'),(32,'Qatar'),(33,'Reunion'),(34,'Romania'),(35,'Saint Kitts and Nevis'),(36,'Saint Lucia'),(37,'Taiwan'),(38,'Tajikistan'),(39,'Uganda'),(40,'Ukraine'),(41,'Vanuatu'),(42,'Vatican City State'),(43,'Wallis and Futuna Islands'),(44,'Western Sahara'),(45,'Yemen'),(46,'Yugoslavia'),(47,'Zaire'),(48,'Zambia');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `county`
--

DROP TABLE IF EXISTS `county`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `county` (
  `idcounty` int(11) NOT NULL AUTO_INCREMENT,
  `countyName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcounty`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `county`
--

LOCK TABLES `county` WRITE;
/*!40000 ALTER TABLE `county` DISABLE KEYS */;
INSERT INTO `county` VALUES (1,'Antrim'),(2,'Armagh'),(3,'Carlow'),(4,'Cavan'),(5,'Clare'),(6,'Cork'),(7,'Donegal'),(8,'Down'),(9,'Dublin'),(10,'DunLaoghaire-Rathdown'),(11,'Fermanagh'),(12,'Fingal'),(13,'Galway'),(14,'Kerry'),(15,'Kildare'),(16,'Kilkenny'),(17,'Laois'),(18,'Leitrim'),(19,'Limerick'),(20,'Londonderry'),(21,'Longford'),(22,'Louth'),(23,'Mayo'),(24,'Meath'),(25,'Monaghan'),(26,'North Tipperary'),(27,'Offaly'),(28,'Roscommon'),(29,'Sligo'),(30,'South Dublin'),(31,'South Tipperary'),(32,'Tipperary'),(33,'Tyrone'),(34,'Waterford'),(35,'Westmeath'),(36,'Wexford'),(37,'Wicklow'),(99,'Unknown County');
/*!40000 ALTER TABLE `county` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `OrderNum` int(11) NOT NULL AUTO_INCREMENT,
  `userID` varchar(45) NOT NULL,
  `OrderDate` datetime DEFAULT NULL,
  `ShippedDate` datetime DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `TotalPrice` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`OrderNum`),
  KEY `userID` (`userID`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,'ava@email.com','2026-04-10 00:00:00',NULL,'In Progress',NULL),(2,'flann@gmail.com','2026-04-11 00:00:00',NULL,'In Progress',NULL),(3,'flann@gmail.com','2026-04-17 12:14:16',NULL,'In Progress',12.98),(5,'flann@gmail.com','2026-04-17 12:28:41',NULL,'In Progress',12.98),(6,'flann@gmail.com','2026-04-17 12:41:07',NULL,'In Progress',9.98),(7,'flann@gmail.com','2026-04-17 13:19:27',NULL,'In Progress',20.98),(8,'ava@email.com','2026-04-17 13:20:43',NULL,'In Progress',14.98),(9,'ava@email.com','2026-04-17 14:52:45',NULL,'In Progress',36.94);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orderdetails` (
  `OrderNum` int(11) NOT NULL,
  `ProdCode` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Price` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`OrderNum`,`ProdCode`),
  KEY `ProdCode` (`ProdCode`),
  CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`ProdCode`) REFERENCES `products` (`ProdCode`),
  CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`OrderNum`) REFERENCES `order` (`OrderNum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderdetails`
--

LOCK TABLES `orderdetails` WRITE;
/*!40000 ALTER TABLE `orderdetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `orderdetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `ProdCode` int(11) NOT NULL,
  `ProdName` varchar(45) DEFAULT NULL,
  `ProdBrand` int(11) NOT NULL,
  `ProdCategory` int(11) NOT NULL,
  `ProdDescription` varchar(500) DEFAULT NULL,
  `ProdPrice` decimal(8,2) DEFAULT NULL,
  `ProdQuantityInStock` int(11) DEFAULT NULL,
  `ProdSale` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ProdCode`),
  KEY `ProdCategory` (`ProdCategory`),
  KEY `ProdBrand` (`ProdBrand`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`ProdCategory`) REFERENCES `category` (`CategoryID`),
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`ProdBrand`) REFERENCES `brand` (`BrandID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (101,'Snoopy Pen Case',1,5,'White Pen Case',6.99,10,1),(102,'Premto Blue Binder',1,4,'A4 Binder',4.99,50,0),(103,'Sanrio Friends School Planner',3,6,'A4 School Planner',9.99,5,0),(104,'Muji Notebook',6,2,'A4 Notebook',4.99,50,0),(105,'Campus Notebook Set',4,2,'5 x A4 Notebooks',15.99,15,0),(106,'Premto Pastel Pencil Case',1,5,'3 Pocket Pencil Case',8.99,30,1),(107,'Premto Red School Diary',1,6,'A5 School Planner',4.99,10,1),(108,'Faber Castell 12 Colouring Pencils',2,1,'Pack of colouring pencils',6.99,20,1),(109,'Pink Cat Paw Ballpoint Pen',7,1,'Cute and practical six colour ballpoint pen',3.99,12,0),(110,'Bowtie Bear Hearts A4 Clear File',7,4,'Keep your documents and papers neat and tidy in this super cute plastic file from ARTBOX Korea.',4.99,12,0),(111,'Pink 30cm Ruler',7,8,'Plastic Ruler',2.99,15,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shoppingcart`
--

DROP TABLE IF EXISTS `shoppingcart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shoppingcart` (
  `userID` varchar(45) NOT NULL,
  `ProdCode` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`userID`,`ProdCode`),
  KEY `ProdCode` (`ProdCode`),
  CONSTRAINT `shoppingcart_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  CONSTRAINT `shoppingcart_ibfk_2` FOREIGN KEY (`ProdCode`) REFERENCES `products` (`ProdCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shoppingcart`
--

LOCK TABLES `shoppingcart` WRITE;
/*!40000 ALTER TABLE `shoppingcart` DISABLE KEYS */;
INSERT INTO `shoppingcart` VALUES ('cust@gmail.com',103,1);
/*!40000 ALTER TABLE `shoppingcart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `UserNr` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `PassWord` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `idcounty` int(11) NOT NULL,
  `userID` varchar(45) DEFAULT NULL,
  `userTypeNr` int(11) NOT NULL,
  `userEnabled` tinyint(4) DEFAULT 1,
  `pointBalance` int(11) DEFAULT NULL,
  PRIMARY KEY (`UserNr`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `userID_UNIQUE` (`userID`),
  KEY `fk_admin_county2_idx` (`idcounty`),
  KEY `fk_user_userType1_idx` (`userTypeNr`),
  CONSTRAINT `fk_admin_county2` FOREIGN KEY (`idcounty`) REFERENCES `county` (`idcounty`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_userType1` FOREIGN KEY (`userTypeNr`) REFERENCES `usertype` (`userTypeNr`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'John','Smith','cf8f0c0d32522bc3d2ebe59d1fa46611d3369c96','jsmith@college.ie','0875869745',4,'jsmith@college.ie',1,1,0),(2,'Jane','Murphy','cf8f0c0d32522bc3d2ebe59d1fa46611d3369c96','janeh@mail.com','0871234567',13,'janeh@mail.com',2,1,0),(3,'Harry','Boland','cf8f0c0d32522bc3d2ebe59d1fa46611d3369c96','harry@lit.ie','01234567',2,'harry@lit.ie',2,1,0),(4,'Jay','Flannery','90fa6dc0e910c9a7f5e5f3fbca1e669caeb80289','flann@gmail.com','0875426987',2,'flann@gmail.com',2,1,17),(5,'James','Murphy','cf8f0c0d32522bc3d2ebe59d1fa46611d3369c96','james@framework.com','0862356897',19,'james@framework.com',2,1,0),(25,'elvis','presley','cf8f0c0d32522bc3d2ebe59d1fa46611d3369c96','presley@tus.ie','0865478745',2,'presley@tus.ie',2,1,150),(42,'Jimm','O','cf8f0c0d32522bc3d2ebe59d1fa46611d3369c96','jimmy@ob.com','085457854',3,'jimmy@ob.com',1,1,0),(44,'New','Customer','cf8f0c0d32522bc3d2ebe59d1fa46611d3369c96','cust@gmail.com','0854789654',2,'cust@gmail.com',2,1,90),(46,'Ava','Rainsford','cf8f0c0d32522bc3d2ebe59d1fa46611d3369c96','ava@email.com','0833565523',19,'ava@email.com',2,1,220),(49,'Kai','Smith','cf8f0c0d32522bc3d2ebe59d1fa46611d3369c96','kai@email.com','123456',1,'kai@email.com',2,1,0),(50,'Jay','Walker','cf8f0c0d32522bc3d2ebe59d1fa46611d3369c96','jayw@email.com','11111111',6,'jayw@email.com',2,1,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usertype` (
  `userTypeNr` int(11) NOT NULL,
  `userTypeDescr` varchar(45) NOT NULL DEFAULT 'UNKNOWN',
  PRIMARY KEY (`userTypeNr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertype`
--

LOCK TABLES `usertype` WRITE;
/*!40000 ALTER TABLE `usertype` DISABLE KEYS */;
INSERT INTO `usertype` VALUES (1,'ADMIN'),(2,'CUSTOMER'),(99,'UNKNOWN');
/*!40000 ALTER TABLE `usertype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `WishlistID` varchar(45) NOT NULL,
  `ProdCode` int(11) NOT NULL,
  PRIMARY KEY (`WishlistID`,`ProdCode`),
  KEY `ProdCode` (`ProdCode`),
  CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`WishlistID`) REFERENCES `user` (`userID`),
  CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`ProdCode`) REFERENCES `products` (`ProdCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` VALUES ('ava@email.com',101),('ava@email.com',104),('ava@email.com',105),('flann@gmail.com',103),('flann@gmail.com',108);
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-17 17:33:51
