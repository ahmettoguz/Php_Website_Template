-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2023 at 10:53 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soci_api`
--
CREATE DATABASE IF NOT EXISTS `soci_api` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci;
USE `soci_api`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(32) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Password` varchar(64) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Name` varchar(32) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Surname` varchar(32) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Email` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Email`, `Password`, `Name`, `Surname`) VALUES
(1, 'ahmet@hotmail.com', 'a2feba65bf7eaa2885f843ec2aeba6b37e4c4302', 'Ahmet', 'Ergin'),
(2, 'tuna@hotmail.com', 'a2feba65bf7eaa2885f843ec2aeba6b37e4c4302', 'Tuna', 'Ergin'),
(3, 'zeynep@hotmail.com', 'a2feba65bf7eaa2885f843ec2aeba6b37e4c4302', 'Zeynep', 'Ergin'),
(4, 'sena@hotmail.com', 'User4321!', 'Sena', 'Ergin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
