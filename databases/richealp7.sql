-- MySQL dump 10.13  Distrib 5.7.21, for osx10.13 (x86_64)
--
-- Host: localhost    Database: richealp7
-- ------------------------------------------------------
-- Server version	5.7.21

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
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `state` varchar(45) NOT NULL,
  `zip` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `updated_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`address_id`),
  KEY `fk_address_address_type_idx` (`type`),
  CONSTRAINT `fk_address_address_type` FOREIGN KEY (`type`) REFERENCES `address_type` (`address_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,'1116 Elk Road','Monroeville','NJ','08343','USA',1,'2018-11-15 13:33:23','2018-11-15 02:21:20'),(2,'1116 Elk Road','Monroeville','NJ','08343','USA',1,'2018-11-15 22:56:28','2018-11-15 03:21:29'),(3,'asdfsadf','sdfsd','fsdaf','sadf','asdsd',1,'2018-11-15 13:33:23','2018-11-15 03:22:45'),(4,'89 South Avenue','Philadelphia','PA','83921','USA',1,'2018-11-15 14:37:16','2018-11-15 14:37:16'),(5,'23 Corn Roads','Millwuks','OHs','23412s','USAs',1,'2018-11-15 15:19:56','2018-11-15 14:49:29'),(6,'38 Jeez Streets','Monroevilles','OHs','12912s','USAs',1,'2018-11-15 23:01:43','2018-11-15 22:23:54'),(7,'','','','','',1,'2018-11-15 22:25:04','2018-11-15 22:25:04'),(8,'','','','','',1,'2018-11-15 22:25:39','2018-11-15 22:25:39'),(9,'123 Main Street','Point Place','Wisconsin','12345','USA',1,'2018-11-15 22:57:47','2018-11-15 22:57:47'),(10,'23 Yamaha Road','Columbia','OH','12345','USA',1,'2018-11-15 23:18:50','2018-11-15 23:18:50'),(11,'12 Fairview Rd','Cleanville','KA','12312','USA',1,'2018-11-15 23:44:29','2018-11-15 23:44:29'),(12,'78 Main Street','Cooca','OH','22412','USA',1,'2018-11-16 18:04:33','2018-11-16 18:04:33'),(13,'sadf','dsf','sdaf','sdf','sfd',1,'2018-11-18 06:42:12','2018-11-18 06:42:12'),(14,'45 East Street','Monroe','CO','12345','USA',2,'2018-11-19 14:08:01','2018-11-19 14:08:01'),(17,'46 East Street','Monroe','CO','12345','USA',2,'2018-11-19 14:26:15','2018-11-19 14:26:15'),(18,'h','h','h','h','h',1,'2018-11-19 14:53:25','2018-11-19 14:53:25'),(20,'4116 Stanbridge Ct.','Downey','Californias','90241','US',2,'2018-11-19 15:06:29','2018-11-19 15:06:29'),(21,'6540 Park Glen Ct.','Kirkland','Washington','98033','US',2,'2018-11-19 16:34:27','2018-11-19 16:34:27'),(22,'6695 Black Walnut Court','Sooke','British Columbia','V0','CA',2,'2018-11-19 16:40:52','2018-11-19 16:40:52'),(23,'1116 Elk Road','Monroeville','NJ','08343','USA',2,'2018-11-19 16:44:01','2018-11-19 16:44:01'),(24,'sdaf','asdf','sdaf','sdafsad','sdaf',1,'2018-11-19 23:20:09','2018-11-19 23:20:09'),(25,'9761 Darnett Circle','Lebanon','Oregon','97355','US',2,'2018-11-19 23:29:31','2018-11-19 23:29:31'),(26,'asdf','asdf','sadf','sadf','asdf',3,'2018-11-20 23:29:16','2018-11-20 23:29:16'),(27,'123 Main Street','Point Place','Wisconsin','12345','USA',2,'2018-12-03 02:31:17','2018-12-03 02:31:17'),(28,'d','d','d','d','d',1,'2018-12-03 18:10:49','2018-12-03 18:10:49'),(29,'ef','ef','fe','fe','ef',1,'2018-12-03 18:50:44','2018-12-03 18:50:44'),(30,'4116 Stanbridge Ct.','Downey','California','90241','US',2,'2018-12-03 18:52:31','2018-12-03 18:52:31');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `address_type`
--

DROP TABLE IF EXISTS `address_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address_type` (
  `address_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `address_type` varchar(45) NOT NULL,
  `updated_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creation_datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`address_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address_type`
--

LOCK TABLES `address_type` WRITE;
/*!40000 ALTER TABLE `address_type` DISABLE KEYS */;
INSERT INTO `address_type` VALUES (1,'Customer','2018-11-19 15:18:18','2018-11-19 15:18:18'),(2,'Shipping','2018-11-19 15:18:18','2018-11-19 15:18:18'),(3,'Supplier','2018-11-20 00:55:31','2018-11-20 00:55:31');
/*!40000 ALTER TABLE `address_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_item`
--

DROP TABLE IF EXISTS `cart_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_item` (
  `customer_id` int(11) NOT NULL,
  `customer_seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_seller_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `updated_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`,`product_id`,`product_seller_id`,`customer_seller_id`),
  KEY `fk_cart_item_seller_idx` (`product_seller_id`),
  KEY `fk_cart_item_seller_2_idx` (`customer_seller_id`),
  CONSTRAINT `fk_cart_item_seller` FOREIGN KEY (`product_seller_id`) REFERENCES `seller` (`seller_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cart_item_seller_2` FOREIGN KEY (`customer_seller_id`) REFERENCES `seller` (`seller_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_item`
--

LOCK TABLES `cart_item` WRITE;
/*!40000 ALTER TABLE `cart_item` DISABLE KEYS */;
INSERT INTO `cart_item` VALUES (16144,2,952,2,2,'2018-11-19 16:34:15','2018-11-19 16:34:12'),(20075,2,2,4,1,'2018-11-19 16:40:43','2018-11-19 16:40:04');
/*!40000 ALTER TABLE `cart_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `updated_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Musical Instruments','2018-11-17 00:58:01','2018-11-17 00:58:01');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `category_view`
--

DROP TABLE IF EXISTS `category_view`;
/*!50001 DROP VIEW IF EXISTS `category_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `category_view` AS SELECT 
 1 AS `name`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `address_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`),
  KEY `fk_customer_address_idx` (`address_id`),
  CONSTRAINT `fk_customer_address` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (21,'Patrick','Richeal',2,0,'2018-11-20 01:30:27','2018-11-15 03:21:29'),(26,'Steven','Bob',9,0,'2018-11-26 00:37:58','2018-11-15 22:57:47'),(27,'Bob','Stevens',28,1,'2018-12-03 18:52:55','2018-12-03 18:10:49'),(28,'Cheese','Burden',29,0,'2018-12-03 18:50:44','2018-12-03 18:50:44');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `customer_view`
--

DROP TABLE IF EXISTS `customer_view`;
/*!50001 DROP VIEW IF EXISTS `customer_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `customer_view` AS SELECT 
 1 AS `customer_id`,
 1 AS `first_name`,
 1 AS `last_name`,
 1 AS `seller_id`,
 1 AS `seller`,
 1 AS `address`,
 1 AS `city`,
 1 AS `state`,
 1 AS `zip`,
 1 AS `country`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(10) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_seller_id` int(11) NOT NULL,
  `shipping_address_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_code_UNIQUE` (`order_code`),
  KEY `fk_order_seller_id_idx` (`customer_seller_id`),
  KEY `fk_order_address_idx` (`shipping_address_id`),
  CONSTRAINT `fk_order_address` FOREIGN KEY (`shipping_address_id`) REFERENCES `address` (`address_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_seller_id` FOREIGN KEY (`customer_seller_id`) REFERENCES `seller` (`seller_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (7,'CF54AEA2DE',21,1,23,'2018-11-26 00:39:03','2018-11-19 16:50:35'),(8,'F20C61EA1B',21,1,23,'2018-11-26 00:39:03','2018-11-19 16:52:04'),(9,'FD418165D2',21,1,23,'2018-11-26 00:39:03','2018-11-19 17:30:32'),(10,'2215A7087C',21,1,23,'2018-11-26 00:39:03','2018-11-19 17:34:20'),(11,'0015308D6F',21414,2,25,'2018-11-19 23:29:31','2018-11-19 23:29:31'),(16,'8E7D76E19D',21414,2,25,'2018-11-20 00:16:47','2018-11-20 00:16:47'),(18,'97B82825C6',21414,2,25,'2018-11-20 00:20:00','2018-11-20 00:20:00'),(20,'9921AA9DD8',21414,2,25,'2018-11-20 00:23:36','2018-11-20 00:23:36'),(21,'0929DECCB9',21414,2,25,'2018-11-20 00:51:18','2018-11-20 00:51:18'),(22,'748A9E6A83',21,1,23,'2018-11-26 00:39:03','2018-11-20 01:43:44'),(23,'3B99B6B214',26,1,27,'2018-12-03 02:31:17','2018-12-03 02:31:17'),(24,'7C4D3B762D',28866,2,30,'2018-12-03 18:52:31','2018-12-03 18:52:31'),(25,'1CEC26C810',26,1,27,'2018-12-03 19:08:17','2018-12-03 19:08:17');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_seller_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `updated_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`,`product_id`,`product_seller_id`),
  KEY `fk_order_product_seller_idx` (`product_seller_id`),
  CONSTRAINT `fk_order_product_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_product_seller` FOREIGN KEY (`product_seller_id`) REFERENCES `seller` (`seller_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_product`
--

LOCK TABLES `order_product` WRITE;
/*!40000 ALTER TABLE `order_product` DISABLE KEYS */;
INSERT INTO `order_product` VALUES (7,5,4,2,5.98,'2018-11-19 16:50:35','2018-11-19 16:50:35'),(8,5,4,3,5.98,'2018-12-01 16:05:47','2018-12-01 16:05:47'),(9,6,4,3,8.97,'2018-11-19 17:30:32','2018-11-19 17:30:32'),(10,952,2,2,40.48,'2018-11-19 17:34:20','2018-11-19 17:34:20'),(11,1,1,2,139.78,'2018-11-24 18:05:15','2018-11-19 23:29:31'),(11,6,4,6,17.94,'2018-11-19 23:29:31','2018-11-19 23:29:31'),(16,1,1,12,1677.36,'2018-11-24 18:05:15','2018-11-20 00:16:47'),(18,1,1,7,978.46,'2018-11-24 18:05:15','2018-11-20 00:20:00'),(20,1,1,7,978.46,'2018-11-24 18:05:15','2018-11-20 00:23:36'),(21,1,1,4,559.12,'2018-11-24 18:05:15','2018-11-20 00:51:18'),(22,1,4,2,1.98,'2018-11-20 01:43:44','2018-11-20 01:43:44'),(23,3,1,1,10.00,'2018-12-03 02:31:17','2018-12-03 02:31:17'),(24,3,1,1,10.00,'2018-12-03 18:52:31','2018-12-03 18:52:31'),(25,879,2,1,159.00,'2018-12-03 19:08:17','2018-12-03 19:08:17');
/*!40000 ALTER TABLE `order_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `order_view`
--

DROP TABLE IF EXISTS `order_view`;
/*!50001 DROP VIEW IF EXISTS `order_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `order_view` AS SELECT 
 1 AS `order_id`,
 1 AS `order_code`,
 1 AS `order_total`,
 1 AS `customer_id`,
 1 AS `customer_seller_id`,
 1 AS `customer_first_name`,
 1 AS `customer_last_name`,
 1 AS `shipping_address`,
 1 AS `shipping_city`,
 1 AS `shipping_state`,
 1 AS `shipping_zip`,
 1 AS `shipping_country`,
 1 AS `order_datetime`,
 1 AS `shipping_date`,
 1 AS `creation_datetime`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `list_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `supplier_id` int(11) NOT NULL,
  `minimum_stock` int(11) NOT NULL DEFAULT '0',
  `current_stock` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_code_UNIQUE` (`product_code`),
  KEY `fk_product_supplier_idx` (`supplier_id`),
  KEY `fk_product_category_idx` (`category_id`),
  CONSTRAINT `fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'D3A4E7361C','Laptop',139.78,2,10,8,1,0,'2018-11-20 23:29:47','2018-11-19 23:24:58'),(2,'2A1DDAA6E7','Cornflakes',1.34,1,20,17,1,0,'2018-11-20 23:42:30','2018-11-20 23:41:59'),(3,'55F3A64E22','Apples',10.00,2,10,28,1,0,'2018-12-03 18:52:31','2018-11-24 17:55:13'),(4,'76E139B388','Orange',3.00,2,3,13,1,0,'2018-12-03 19:52:59','2018-11-24 18:30:25'),(5,'7866B0D11B','Banana',23.00,2,10,200,1,0,'2018-12-03 17:26:05','2018-12-03 17:26:05');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_rating`
--

DROP TABLE IF EXISTS `product_rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_rating` (
  `customer_id` int(11) NOT NULL,
  `customer_seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_seller_id` int(11) NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `updated_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`,`customer_seller_id`,`product_id`,`product_seller_id`),
  KEY `fk_product_rating_seller_idx` (`customer_seller_id`),
  KEY `fk_product_rating_seller_2_idx` (`product_seller_id`),
  CONSTRAINT `fk_product_rating_seller` FOREIGN KEY (`customer_seller_id`) REFERENCES `seller` (`seller_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_rating_seller_2` FOREIGN KEY (`product_seller_id`) REFERENCES `seller` (`seller_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_rating`
--

LOCK TABLES `product_rating` WRITE;
/*!40000 ALTER TABLE `product_rating` DISABLE KEYS */;
INSERT INTO `product_rating` VALUES (26,1,3,1,1,'2018-12-03 02:45:23','2018-12-01 03:43:55'),(28866,2,3,1,8,'2018-12-01 03:53:05','2018-12-01 03:53:05');
/*!40000 ALTER TABLE `product_rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `product_view`
--

DROP TABLE IF EXISTS `product_view`;
/*!50001 DROP VIEW IF EXISTS `product_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `product_view` AS SELECT 
 1 AS `product_id`,
 1 AS `product_code`,
 1 AS `name`,
 1 AS `cost`,
 1 AS `quantity_available`,
 1 AS `seller_id`,
 1 AS `seller`,
 1 AS `category`,
 1 AS `rating`,
 1 AS `rating_weighted`,
 1 AS `num_ratings`,
 1 AS `times_wished_for`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `updated_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seller`
--

LOCK TABLES `seller` WRITE;
/*!40000 ALTER TABLE `seller` DISABLE KEYS */;
INSERT INTO `seller` VALUES (1,'Local','2018-11-19 15:20:49','2018-11-19 15:20:49'),(2,'AdventureWorks','2018-11-19 15:20:49','2018-11-19 15:20:49'),(3,'Northwind Traders','2018-11-19 15:20:49','2018-11-19 15:20:49'),(4,'Sakila','2018-11-19 15:20:49','2018-11-19 15:20:49');
/*!40000 ALTER TABLE `seller` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `job_title` varchar(45) NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `address_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `updated_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`supplier_id`),
  KEY `fk_supplier_address_idx` (`address_id`),
  CONSTRAINT `fk_supplier_address` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'sdfsdf','sdfg','sdfsad','sdf','sadf',24,1,'2018-11-20 01:33:35','2018-11-19 23:20:09'),(2,'sdafsa','asdf','sadf','asdf','asdf',26,0,'2018-11-20 23:29:16','2018-11-20 23:29:16');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wishlist` (
  `customer_id` int(11) NOT NULL,
  `customer_seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_seller_id` int(11) NOT NULL,
  `updated_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`,`customer_seller_id`,`product_id`,`product_seller_id`),
  KEY `fk_wishlist_seller_idx` (`customer_seller_id`),
  KEY `fk_wishlist_seller_2_idx` (`product_seller_id`),
  CONSTRAINT `fk_wishlist_seller` FOREIGN KEY (`customer_seller_id`) REFERENCES `seller` (`seller_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_wishlist_seller_2` FOREIGN KEY (`product_seller_id`) REFERENCES `seller` (`seller_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
INSERT INTO `wishlist` VALUES (26,1,1,1,'2018-12-03 15:56:10','2018-12-03 15:56:10'),(26,1,2,1,'2018-12-03 19:53:16','2018-12-03 19:53:16'),(26,1,3,1,'2018-11-26 01:57:40','2018-11-26 01:57:40'),(26,1,4,1,'2018-12-03 19:53:02','2018-12-03 19:53:02'),(26,1,879,2,'2018-11-30 18:02:42','2018-11-30 18:02:42'),(28187,2,1,1,'2018-12-03 20:04:04','2018-12-03 20:04:04');
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `category_view`
--

/*!50001 DROP VIEW IF EXISTS `category_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `category_view` AS select `richealp7`.`category`.`name` AS `name` from `richealp7`.`category` union select 'Movies' AS `name` union select distinct `northwind`.`products`.`category` AS `name` from `northwind`.`products` union select `adventureworks`.`productsubcategory`.`Name` AS `name` from `adventureworks`.`productsubcategory` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `customer_view`
--

/*!50001 DROP VIEW IF EXISTS `customer_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `customer_view` AS select `richealp7`.`customer`.`customer_id` AS `customer_id`,`richealp7`.`customer`.`first_name` AS `first_name`,`richealp7`.`customer`.`last_name` AS `last_name`,1 AS `seller_id`,(select `richealp7`.`seller`.`name` from `richealp7`.`seller` where (`richealp7`.`seller`.`seller_id` = 1)) AS `seller`,`richealp7`.`address`.`address` AS `address`,`richealp7`.`address`.`city` AS `city`,`richealp7`.`address`.`state` AS `state`,`richealp7`.`address`.`zip` AS `zip`,`richealp7`.`address`.`country` AS `country` from (`richealp7`.`customer` join `richealp7`.`address` on((`richealp7`.`customer`.`address_id` = `richealp7`.`address`.`address_id`))) where (`richealp7`.`customer`.`is_deleted` = 0) union select `i`.`CustomerID` AS `customer_id`,`c`.`FirstName` AS `first_name`,`c`.`LastName` AS `last_name`,2 AS `seller_id`,(select `richealp7`.`seller`.`name` from `richealp7`.`seller` where (`richealp7`.`seller`.`seller_id` = 2)) AS `seller`,`a`.`AddressLine1` AS `address`,`a`.`City` AS `city`,`sp`.`Name` AS `state`,`a`.`PostalCode` AS `zip`,`sp`.`CountryRegionCode` AS `country` from ((((`adventureworks`.`individual` `i` join `adventureworks`.`contact` `c` on((`i`.`ContactID` = `c`.`ContactID`))) join `adventureworks`.`customeraddress` `ca` on((`i`.`CustomerID` = `ca`.`CustomerID`))) join `adventureworks`.`address` `a` on((`ca`.`AddressID` = `a`.`AddressID`))) join `adventureworks`.`stateprovince` `sp` on((`a`.`StateProvinceID` = `sp`.`StateProvinceID`))) union select `northwind`.`customers`.`id` AS `customer_id`,`northwind`.`customers`.`first_name` AS `first_name`,`northwind`.`customers`.`last_name` AS `last_name`,3 AS `seller_id`,(select `richealp7`.`seller`.`name` from `richealp7`.`seller` where (`richealp7`.`seller`.`seller_id` = 3)) AS `seller`,`northwind`.`customers`.`address` AS `address`,`northwind`.`customers`.`city` AS `city`,`northwind`.`customers`.`state_province` AS `state`,`northwind`.`customers`.`zip_postal_code` AS `zip`,`northwind`.`customers`.`country_region` AS `country` from `northwind`.`customers` union select `sakila`.`customer`.`customer_id` AS `customer_id`,`sakila`.`customer`.`first_name` AS `first_name`,`sakila`.`customer`.`last_name` AS `last_name`,4 AS `seller_id`,(select `richealp7`.`seller`.`name` from `richealp7`.`seller` where (`richealp7`.`seller`.`seller_id` = 4)) AS `seller`,`sakila`.`address`.`address` AS `address`,`sakila`.`city`.`city` AS `city`,`sakila`.`address`.`district` AS `state`,`sakila`.`address`.`postal_code` AS `zip`,`sakila`.`country`.`country` AS `country` from (((`sakila`.`customer` join `sakila`.`address` on((`sakila`.`customer`.`address_id` = `sakila`.`address`.`address_id`))) join `sakila`.`city` on((`sakila`.`address`.`city_id` = `sakila`.`city`.`city_id`))) join `sakila`.`country` on((`sakila`.`city`.`country_id` = `sakila`.`country`.`country_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `order_view`
--

/*!50001 DROP VIEW IF EXISTS `order_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `order_view` AS select `richealp7`.`order`.`order_id` AS `order_id`,`richealp7`.`order`.`order_code` AS `order_code`,(select sum(`richealp7`.`order_product`.`cost`) from `richealp7`.`order_product` where (`richealp7`.`order_product`.`order_id` = `richealp7`.`order`.`order_id`)) AS `order_total`,`richealp7`.`order`.`customer_id` AS `customer_id`,`richealp7`.`order`.`customer_seller_id` AS `customer_seller_id`,`customer_view`.`first_name` AS `customer_first_name`,`customer_view`.`last_name` AS `customer_last_name`,`richealp7`.`address`.`address` AS `shipping_address`,`richealp7`.`address`.`city` AS `shipping_city`,`richealp7`.`address`.`state` AS `shipping_state`,`richealp7`.`address`.`zip` AS `shipping_zip`,`richealp7`.`address`.`country` AS `shipping_country`,date_format(`richealp7`.`order`.`creation_datetime`,'%W, %b %D, %Y at %l:%i%p') AS `order_datetime`,date_format((select (`richealp7`.`order`.`creation_datetime` + interval (4 + if(((week(`richealp7`.`order`.`creation_datetime`,0) <> week((`richealp7`.`order`.`creation_datetime` + interval 4 day),0)) or (weekday((`richealp7`.`order`.`creation_datetime` + interval 4 day)) in (5,6))),2,0)) day)),'%W, %b %D, %Y') AS `shipping_date`,`richealp7`.`order`.`creation_datetime` AS `creation_datetime` from ((`richealp7`.`order` join `richealp7`.`address` on((`richealp7`.`order`.`shipping_address_id` = `richealp7`.`address`.`address_id`))) join `richealp7`.`customer_view` on(((`richealp7`.`order`.`customer_id` = `customer_view`.`customer_id`) and (`richealp7`.`order`.`customer_seller_id` = `customer_view`.`seller_id`)))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `product_view`
--

/*!50001 DROP VIEW IF EXISTS `product_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `product_view` AS select `richealp7`.`product`.`product_id` AS `product_id`,`richealp7`.`product`.`product_code` AS `product_code`,`richealp7`.`product`.`name` AS `name`,`richealp7`.`product`.`list_price` AS `cost`,`richealp7`.`product`.`current_stock` AS `quantity_available`,1 AS `seller_id`,(select `richealp7`.`seller`.`name` from `richealp7`.`seller` where (`richealp7`.`seller`.`seller_id` = 1)) AS `seller`,`richealp7`.`category`.`name` AS `category`,`GET_PRODUCT_RATING`(`richealp7`.`product`.`product_id`,1) AS `rating`,`GET_PRODUCT_RATING_WEIGHTED`(`richealp7`.`product`.`product_id`,1) AS `rating_weighted`,`GET_PRODUCT_NUM_RATINGS`(`richealp7`.`product`.`product_id`,1) AS `num_ratings`,`get_product_num_wished`(`richealp7`.`product`.`product_id`,1) AS `times_wished_for` from (`richealp7`.`product` left join `richealp7`.`category` on((`richealp7`.`product`.`category_id` = `richealp7`.`category`.`category_id`))) where (`richealp7`.`product`.`is_deleted` = 0) union select `adventureworks`.`product`.`ProductID` AS `product_id`,`adventureworks`.`product`.`ProductNumber` AS `product_code`,`adventureworks`.`product`.`Name` AS `name`,`adventureworks`.`product`.`ListPrice` AS `cost`,(select coalesce(sum(`adventureworks`.`productinventory`.`Quantity`),0) from `adventureworks`.`productinventory` where (`adventureworks`.`productinventory`.`ProductID` = `adventureworks`.`product`.`ProductID`)) AS `quantity_available`,2 AS `seller_id`,(select `richealp7`.`seller`.`name` from `richealp7`.`seller` where (`richealp7`.`seller`.`seller_id` = 2)) AS `seller`,`adventureworks`.`productsubcategory`.`Name` AS `category`,`GET_PRODUCT_RATING`(`adventureworks`.`product`.`ProductID`,2) AS `rating`,`GET_PRODUCT_RATING_WEIGHTED`(`adventureworks`.`product`.`ProductID`,2) AS `rating_weighted`,`GET_PRODUCT_NUM_RATINGS`(`adventureworks`.`product`.`ProductID`,2) AS `num_ratings`,`get_product_num_wished`(`adventureworks`.`product`.`ProductID`,2) AS `times_wished_for` from ((`adventureworks`.`product` left join `adventureworks`.`productsubcategory` on((`adventureworks`.`product`.`ProductSubcategoryID` = `adventureworks`.`productsubcategory`.`ProductSubcategoryID`))) left join `adventureworks`.`productcategory` on((`adventureworks`.`productsubcategory`.`ProductCategoryID` = `adventureworks`.`productcategory`.`ProductCategoryID`))) where ((`adventureworks`.`product`.`SellStartDate` <= now()) and (`adventureworks`.`product`.`ListPrice` <> 0) and (isnull(`adventureworks`.`product`.`SellEndDate`) or (`adventureworks`.`product`.`SellEndDate` >= now())) and (isnull(`adventureworks`.`product`.`DiscontinuedDate`) or ((`adventureworks`.`product`.`DiscontinuedDate` is not null) and (`adventureworks`.`product`.`DiscontinuedDate` >= now())))) union select `northwind`.`products`.`id` AS `product_id`,`northwind`.`products`.`product_code` AS `product_code`,`northwind`.`products`.`product_name` AS `name`,`northwind`.`products`.`list_price` AS `cost`,(select coalesce(sum((`northwind`.`inventory_transactions`.`quantity` * if((`northwind`.`inventory_transactions`.`transaction_type` = 1),1,-(1)))),0) from `northwind`.`inventory_transactions` where (`northwind`.`inventory_transactions`.`product_id` = `northwind`.`products`.`id`)) AS `quantity_available`,3 AS `seller_id`,(select `richealp7`.`seller`.`name` from `richealp7`.`seller` where (`richealp7`.`seller`.`seller_id` = 3)) AS `seller`,`northwind`.`products`.`category` AS `category`,`GET_PRODUCT_RATING`(`northwind`.`products`.`id`,3) AS `rating`,`GET_PRODUCT_RATING_WEIGHTED`(`northwind`.`products`.`id`,3) AS `rating_weighted`,`GET_PRODUCT_NUM_RATINGS`(`northwind`.`products`.`id`,3) AS `num_ratings`,`get_product_num_wished`(`northwind`.`products`.`id`,3) AS `times_wished_for` from `northwind`.`products` where (`northwind`.`products`.`discontinued` = 0) union select `sakila`.`film`.`film_id` AS `product_id`,NULL AS `product_code`,`sakila`.`film`.`title` AS `name`,`sakila`.`film`.`rental_rate` AS `cost`,(select count(0) from `sakila`.`inventory` where (`sakila`.`inventory`.`film_id` = `sakila`.`film`.`film_id`)) AS `quantity_available`,4 AS `seller_id`,(select `richealp7`.`seller`.`name` from `richealp7`.`seller` where (`richealp7`.`seller`.`seller_id` = 4)) AS `seller`,'Movies' AS `category`,`GET_PRODUCT_RATING`(`sakila`.`film`.`film_id`,4) AS `rating`,`GET_PRODUCT_RATING_WEIGHTED`(`sakila`.`film`.`film_id`,4) AS `rating_weighted`,`GET_PRODUCT_NUM_RATINGS`(`sakila`.`film`.`film_id`,4) AS `num_ratings`,`get_product_num_wished`(`sakila`.`film`.`film_id`,4) AS `times_wished_for` from `sakila`.`film` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-03 21:34:51
