# ************************************************************
# Sequel Ace SQL dump
# Version 20050
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 11.0.2-MariaDB)
# Database: ride-sharing
# Generation Time: 2023-08-26 16:23:56 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `phone`, `password`, `token`, `role`, `created_at`)
VALUES
	(1,'Mohammad Nur','mdnur','mdnur@app.com','01859900333','password',NULL,'admin','2023-07-20 05:25:13'),
	(2,'Tanjim Rahman','tanjim.rahman','tanjim@app.com','01389900333','password',NULL,'admin','2023-07-20 05:26:35'),
	(3,'Jariatun Islam','jariatun.islam','jariatun@app.com','01239900333','password',NULL,'admin','2023-07-20 05:27:23');

/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table driver
# ------------------------------------------------------------

DROP TABLE IF EXISTS `driver`;

CREATE TABLE `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `driver` WRITE;
/*!40000 ALTER TABLE `driver` DISABLE KEYS */;

INSERT INTO `driver` (`id`, `name`, `username`, `email`, `phone`, `password`, `role`, `token`, `created_at`)
VALUES
	(1,'John Doe','johndoe123','john.doe@example.com','1234567890','123456','driver',NULL,'2023-07-26 20:27:59'),
	(2,'Jane Smith','janesmith456','jane.smith@example.com','9876543210','password','driver',NULL,'2023-07-26 20:27:59'),
	(3,'Michael Johnson','michaelj','michael.johnson@example.com','5678901234','password','driver',NULL,'2023-07-26 20:27:59'),
	(5,'Driver Nur','drivernur','driver@app.com','0185500033','passsword','driver',NULL,'2023-08-04 04:07:33');

/*!40000 ALTER TABLE `driver` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table expense_credit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `expense_credit`;

CREATE TABLE `expense_credit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `expense_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `expense_credit_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `rider` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `expense_credit` WRITE;
/*!40000 ALTER TABLE `expense_credit` DISABLE KEYS */;

INSERT INTO `expense_credit` (`id`, `user_id`, `expense_amount`, `created_at`)
VALUES
	(1,1,200,'2023-07-26 21:32:43'),
	(2,1,200,'2023-08-18 07:06:43'),
	(3,1,230,'2023-08-18 07:06:57'),
	(4,1,230,'2023-08-19 23:01:28'),
	(5,1,150,'2023-08-19 23:04:57'),
	(6,1,150,'2023-08-19 23:06:37'),
	(7,1,150,'2023-08-19 23:10:44'),
	(8,1,150,'2023-08-19 23:10:46'),
	(9,1,150,'2023-08-19 23:12:37'),
	(10,1,150,'2023-08-19 23:12:44'),
	(11,1,230,'2023-08-20 03:14:44'),
	(12,1,220,'2023-08-25 20:25:24');

/*!40000 ALTER TABLE `expense_credit` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Fare
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Fare`;

CREATE TABLE `Fare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locationId_From` int(11) NOT NULL,
  `locationId_To` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locationId_From` (`locationId_From`),
  KEY `locationId_To` (`locationId_To`),
  CONSTRAINT `fare_ibfk_1` FOREIGN KEY (`locationId_From`) REFERENCES `Location` (`id`),
  CONSTRAINT `fare_ibfk_2` FOREIGN KEY (`locationId_To`) REFERENCES `Location` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `Fare` WRITE;
/*!40000 ALTER TABLE `Fare` DISABLE KEYS */;

INSERT INTO `Fare` (`id`, `locationId_From`, `locationId_To`, `Price`, `created_at`)
VALUES
	(1,1,2,200,'2023-07-26 20:50:42'),
	(2,1,3,150,'2023-07-26 20:51:29'),
	(3,1,4,120,'2023-07-26 20:52:08'),
	(4,1,5,220,'2023-07-26 20:52:16'),
	(5,1,6,130,'2023-07-26 20:52:27');

/*!40000 ALTER TABLE `Fare` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table location
# ------------------------------------------------------------

DROP TABLE IF EXISTS `location`;

CREATE TABLE `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;

INSERT INTO `location` (`id`, `name`, `created_at`)
VALUES
	(1,'Mohammadpur','2023-07-20 05:36:28'),
	(2,'Dhanmondi','2023-07-20 05:36:44'),
	(3,'Uttara','2023-07-20 05:37:12'),
	(4,'Badda','2023-07-20 05:37:26'),
	(5,'Gulshan','2023-07-20 05:37:42'),
	(6,'Motijheel','2023-07-20 05:38:28'),
	(7,'Tejgaon','2023-07-20 05:38:48');

/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table payment_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payment_type`;

CREATE TABLE `payment_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `payment_type` WRITE;
/*!40000 ALTER TABLE `payment_type` DISABLE KEYS */;

INSERT INTO `payment_type` (`id`, `name`, `created_at`)
VALUES
	(1,'Bkash','2023-07-26 20:49:27'),
	(2,'Nagad','2023-07-26 20:49:35'),
	(3,'Cash','2023-07-26 20:49:45'),
	(4,'Bank','2023-07-26 20:49:50'),
	(5,'Card','2023-07-26 20:50:04'),
	(6,'GIFT','2023-07-26 21:01:22');

/*!40000 ALTER TABLE `payment_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rider
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rider`;

CREATE TABLE `rider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `rider` WRITE;
/*!40000 ALTER TABLE `rider` DISABLE KEYS */;

INSERT INTO `rider` (`id`, `name`, `username`, `email`, `phone`, `password`, `role`, `token`, `status`, `created_at`)
VALUES
	(1,'Alice Johnson ','alice123','alice@example.com','1234567890','password','rider',NULL,'active','2023-07-26 20:57:27'),
	(2,'Bob Smith','bobsmith456','bob@example.com','9876543210','password','rider',NULL,'active','2023-07-26 20:57:27'),
	(3,'Charlie Brown','charlieb','charlie@example.com','5678901234','password','rider',NULL,'active','2023-07-26 20:57:27'),
	(4,'David Lee','davidl','david@example.com','2345678901','password','rider',NULL,'active','2023-07-26 20:57:27'),
	(5,'Eva Anderson','evaanderson','eva@example.com','7890123456','password','rider',NULL,'active','2023-07-26 20:57:27'),
	(6,'Frank Miller','frankm','frank@example.com','3456789012','password','rider',NULL,'active','2023-07-26 20:57:27'),
	(7,'Grace Wilson','gracew','grace@example.com','8901234567','password','rider',NULL,'active','2023-07-26 20:57:27'),
	(8,'Harry Davis','harryd','harry@example.com','4567890123','password','rider',NULL,'active','2023-07-26 20:57:27'),
	(9,'Ivy Thomas','ivythomas','ivy@example.com','9012345678','password','rider',NULL,'active','2023-07-26 20:57:27'),
	(10,'Jack Robinson','jackr','jack@example.com','6789012345','password','rider',NULL,'active','2023-07-26 20:57:27'),
	(11,'Cairo Mckinney','qubofiri','vylug@mailinator.com','+1 (896) 148-7777','Pa$$w0rd!','rider',NULL,'active','2015-08-23 05:08:51'),
	(12,'Tyrone Clay','wyfifygy','pewad@mailinator.com','+1 (952) 732-5494','Pa$$w0rd!','rider',NULL,'active','2019-08-23 10:23:56');

/*!40000 ALTER TABLE `rider` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table route
# ------------------------------------------------------------

DROP TABLE IF EXISTS `route`;

CREATE TABLE `route` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driverID` int(11) NOT NULL,
  `vehicleID` int(11) NOT NULL,
  `locationId_From` int(11) NOT NULL,
  `locationId_To` int(11) NOT NULL,
  `Fare` int(11) NOT NULL,
  `StartJourneyTime` timestamp NOT NULL,
  `DepartureTime` timestamp NOT NULL,
  `driverPayment` int(11) NOT NULL,
  `createdbyID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `createdbyID` (`createdbyID`),
  CONSTRAINT `route_ibfk_1` FOREIGN KEY (`createdbyID`) REFERENCES `admin` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `route` WRITE;
/*!40000 ALTER TABLE `route` DISABLE KEYS */;

INSERT INTO `route` (`id`, `driverID`, `vehicleID`, `locationId_From`, `locationId_To`, `Fare`, `StartJourneyTime`, `DepartureTime`, `driverPayment`, `createdbyID`, `created_at`, `status`)
VALUES
	(1,1,1,1,2,200,'2023-07-27 21:05:00','2023-07-27 21:55:00',150,1,'2023-07-26 21:09:53',3),
	(2,2,2,1,2,200,'2023-07-27 16:05:58','2023-07-27 17:05:58',250,1,'2023-07-26 21:05:58',3),
	(3,5,1,2,1,250,'2023-07-27 07:00:00','2023-07-27 08:00:00',180,1,'2023-07-26 21:11:24',2),
	(4,5,6,2,4,200,'2023-08-29 18:00:00','2023-07-29 19:00:00',200,1,'2023-07-27 16:16:49',2),
	(5,5,6,2,4,200,'2023-08-19 22:23:56','2023-08-16 22:23:56',200,1,'2023-08-14 22:23:56',2),
	(6,5,5,1,2,230,'2023-08-19 22:59:49','2023-08-18 23:30:49',220,1,'2023-08-17 22:59:49',2),
	(7,5,2,2,3,150,'2023-08-19 03:31:37','2023-08-19 03:31:37',200,1,'2023-08-18 03:31:37',0),
	(8,5,1,1,2,220,'2023-08-26 20:16:52','2023-08-25 20:16:52',200,1,'2023-08-25 20:16:52',0);

/*!40000 ALTER TABLE `route` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table SubLocation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `SubLocation`;

CREATE TABLE `SubLocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `locationID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `SubLocation` WRITE;
/*!40000 ALTER TABLE `SubLocation` DISABLE KEYS */;

INSERT INTO `SubLocation` (`id`, `name`, `locationID`, `created_at`)
VALUES
	(1,'Adabor Thana Bus Stand',1,'2023-07-26 20:38:25'),
	(2,'Agargoan BICC',1,'2023-07-26 20:38:40'),
	(3,'Japan Garden City(Tokyo Squre)',1,'2023-07-26 20:39:06'),
	(4,'Miniso Ring Road',1,'2023-07-26 20:39:26'),
	(5,'Mohammadpur Bus Stand',1,'2023-07-26 20:39:40'),
	(6,'PC Culture Housing Bus Stand',1,'2023-07-26 20:40:03'),
	(7,'Shiya Masjid',1,'2023-07-26 20:40:14'),
	(8,'Shymoli Bus Stand',1,'2023-07-26 20:40:41'),
	(9,'Shyamoli Club Field',1,'2023-07-26 20:40:57'),
	(10,'Shyamoli Ideal Technical College',1,'2023-07-26 20:41:12'),
	(11,'Suchona COmmunity Center',1,'2023-07-26 20:41:29'),
	(12,'White Palace Convetion Hall',1,'2023-07-26 20:41:40'),
	(13,'A.R Plaza Dhanmondi',2,'2023-07-26 20:44:29'),
	(14,'Aarong Dhanmondi 27',2,'2023-07-26 20:44:46'),
	(15,'Alliance Francaise Dhanmondi 3',2,'2023-07-26 20:45:05'),
	(16,'Anwer Khan Modern Hospital',2,'2023-07-26 20:45:25'),
	(17,'Arabian Dhanmondi 5',2,'2023-07-26 20:45:38'),
	(18,'City College Bus Stand',2,'2023-07-26 20:45:49'),
	(19,'Countyard Kalabagan',2,'2023-07-26 20:46:19'),
	(20,'Dhanmondi 6A Bus Stand',2,'2023-07-26 20:46:40'),
	(21,'Eye Hospital Dhanmondi 27',2,'2023-07-26 20:46:56'),
	(22,'Genetic Plaza Dhanmondi 27',2,'2023-07-26 20:47:10'),
	(25,'Macca Eye hospital Point',3,'2023-08-24 21:26:30');

/*!40000 ALTER TABLE `SubLocation` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_credit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_credit`;

CREATE TABLE `user_credit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `credit_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `payment_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `payment_Usssss` (`payment_type_id`),
  CONSTRAINT `payment_Usssss` FOREIGN KEY (`payment_type_id`) REFERENCES `admin` (`id`),
  CONSTRAINT `user_credit_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `rider` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `user_credit` WRITE;
/*!40000 ALTER TABLE `user_credit` DISABLE KEYS */;

INSERT INTO `user_credit` (`id`, `user_id`, `credit_amount`, `created_at`, `payment_type_id`)
VALUES
	(1,1,2000,'2023-07-26 21:29:02',1),
	(2,1,500,'2023-08-18 20:15:28',1);

/*!40000 ALTER TABLE `user_credit` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table userRideBook
# ------------------------------------------------------------

DROP TABLE IF EXISTS `userRideBook`;

CREATE TABLE `userRideBook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rideBookID` int(11) NOT NULL,
  `riderID` int(11) NOT NULL,
  `pickUpId` int(11) NOT NULL,
  `dropId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rideBookID` (`rideBookID`),
  KEY `riderID` (`riderID`),
  KEY `userRideBook` (`pickUpId`),
  KEY `dropUp` (`dropId`),
  CONSTRAINT `dropUp` FOREIGN KEY (`dropId`) REFERENCES `subLocation` (`id`),
  CONSTRAINT `userRideBook` FOREIGN KEY (`pickUpId`) REFERENCES `subLocation` (`id`),
  CONSTRAINT `userridebook_ibfk_3` FOREIGN KEY (`rideBookID`) REFERENCES `Route` (`id`),
  CONSTRAINT `userridebook_ibfk_4` FOREIGN KEY (`riderID`) REFERENCES `rider` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `userRideBook` WRITE;
/*!40000 ALTER TABLE `userRideBook` DISABLE KEYS */;

INSERT INTO `userRideBook` (`id`, `rideBookID`, `riderID`, `pickUpId`, `dropId`, `created_at`)
VALUES
	(3,1,1,1,15,'2023-07-26 21:22:27'),
	(4,2,2,2,15,'2023-07-26 21:24:20'),
	(5,5,1,2,15,'2023-08-15 06:04:02'),
	(6,5,2,2,15,'2023-08-15 06:04:22'),
	(7,5,3,2,15,'2023-08-15 06:04:37'),
	(8,6,1,1,15,'2023-08-17 23:00:40'),
	(9,8,1,1,13,'2023-08-25 20:25:24'),
	(10,6,2,1,15,'2023-08-25 22:54:45');

/*!40000 ALTER TABLE `userRideBook` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table vehicle
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vehicle`;

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;

INSERT INTO `vehicle` (`id`, `make`, `model`, `year`, `capacity`)
VALUES
	(1,'Toyota','Camry','2018',6),
	(2,'Honda','Accord','2021',5),
	(3,'Ford','F-150','2023',3),
	(4,'Chevrolet','Equinox','2022',5),
	(5,'Nissan','Altima','2020',5),
	(6,'BMW','X5','2023',7),
	(7,'Mercedes-Benz','E-Class','2022',5),
	(8,'Audi','Q5','2023',5),
	(9,'Hyundai','Tucson','2021',5),
	(10,'Kia','Sorento','2022',7);

/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
