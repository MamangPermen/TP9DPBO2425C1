-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for mvp_db
CREATE DATABASE IF NOT EXISTS `mvp_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mvp_db`;

-- Dumping structure for table mvp_db.pembalap
CREATE TABLE IF NOT EXISTS `pembalap` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `tim` varchar(255) NOT NULL,
  `negara` varchar(255) NOT NULL,
  `poinMusim` int DEFAULT '0',
  `jumlahMenang` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mvp_db.pembalap: ~11 rows (approximately)
INSERT INTO `pembalap` (`id`, `nama`, `tim`, `negara`, `poinMusim`, `jumlahMenang`) VALUES
	(1, 'Lewis Hamilton', 'Mercedes', 'United Kingdom', 347, 11),
	(2, 'Max Verstappen', 'Red Bull', 'Netherlands', 335, 10),
	(3, 'Valtteri Bottas', 'Mercedes', 'Finland', 203, 2),
	(4, 'Sergio Perez', 'Red Bull', 'Mexico', 190, 1),
	(5, 'Carlos Sainz', 'Ferrari', 'Spain', 150, 0),
	(6, 'Daniel Ricciardo', 'McLaren', 'Australia', 115, 1),
	(7, 'Charles Leclerc', 'Ferrari', 'Monaco', 95, 0),
	(8, 'Lando Norris', 'McLaren', 'United Kingdom', 88, 0),
	(9, 'Pierre Gasly', 'AlphaTauri', 'France', 75, 0),
	(10, 'Fernando Alonso', 'Alpine', 'Spain', 65, 0),
	(11, 'Mamang Resing', 'Persib', 'Sunda Land', 69, 2);

-- Dumping structure for table mvp_db.sponsor
CREATE TABLE IF NOT EXISTS `sponsor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_sponsor` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table mvp_db.sponsor: ~6 rows (approximately)
INSERT INTO `sponsor` (`id`, `nama_sponsor`, `kategori`) VALUES
	(1, 'Petronas', 'Otomotif'),
	(2, 'Red Bull', 'Minuman'),
	(3, 'Monster Energy', 'Minuman'),
	(4, 'Pirelli', 'Ban'),
	(5, 'Samsung', 'Elektronik'),
	(6, 'Marlboro', 'Udud');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
