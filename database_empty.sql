-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.47-MariaDB-0+deb9u1 - Debian 9.13
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for launchpage
DROP DATABASE IF EXISTS `launchpage`;
CREATE DATABASE IF NOT EXISTS `launchpage` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `launchpage`;

-- Dumping structure for table launchpage.links
DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(20) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `displayname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK__users` (`UserID`),
  CONSTRAINT `FK__users` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table launchpage.links: ~8 rows (approximately)
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` (`ID`, `UserID`, `link`, `color`, `displayname`) VALUES
	(4, 0, 'https://www.google.com', NULL, 'Google'),
	(5, 0, 'https://lingscars.com', NULL, 'Lingscars'),
	(37, 0, 'https://www.dy.fi/', NULL, 'Free Domains'),
	(51, 0, 'https://www.pexels.com', NULL, 'Pexels');
/*!40000 ALTER TABLE `links` ENABLE KEYS */;

-- Dumping structure for table launchpage.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `disabled` varchar(10) DEFAULT 'false',
  `auth` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table launchpage.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`ID`, `username`, `password`, `disabled`, `auth`) VALUES
	(0, 'system', '$2y$10$cyM6mBcuaV63ZBCG0puvMuLhPKlwg5D7trq0mXDJYdjMZXEpQ.fbO', 'true', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
