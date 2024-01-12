-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 12, 2024 at 09:11 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aline_thomas_project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `codeRaccourci` varchar(10) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codeRaccourci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`codeRaccourci`, `nom`) VALUES
('gsttd', 'categorie 2');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomContact` varchar(255) NOT NULL,
  `prenomContact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nomContact`, `prenomContact`, `email`, `tel`) VALUES
(53, 'farid', 'salami', 'farid@gmail.com', '766646563777645'),
(55, 'HHGJ', 'HGJ', 'DJJD@gmail.com', '0909090909'),
(56, 'oo', 'oo', 'kk@gmail.com', '090909090'),
(57, 'oo', 'oo', 'kk@gmail.com', '090909090'),
(58, 'thomas', 'gufflet', 'aline@gmail.com', '44244344344'),
(59, 'Farid', 'Salami', 'jhhethh@gmail.com', '0909090909');

-- --------------------------------------------------------

--
-- Table structure for table `educateur`
--

DROP TABLE IF EXISTS `educateur`;
CREATE TABLE IF NOT EXISTS `educateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licencie` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `estAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `licencie` (`licencie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `educateur`
--

INSERT INTO `educateur` (`id`, `licencie`, `email`, `mdp`, `estAdmin`) VALUES
(1, 18, 'alima@gmail.com', 'ggggggggg', 0),
(3, 18, 'adeola@gmail.com', 'ggtyeyyfu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `licencier`
--

DROP TABLE IF EXISTS `licencier`;
CREATE TABLE IF NOT EXISTS `licencier` (
  `numeroLicence` int(11) NOT NULL AUTO_INCREMENT,
  `nomLicencier` varchar(255) DEFAULT NULL,
  `prenomLicencier` varchar(255) DEFAULT NULL,
  `contactID` int(11) DEFAULT NULL,
  `categorieCodeRaccourci` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`numeroLicence`),
  KEY `contactID` (`contactID`),
  KEY `categorieCodeRaccourci` (`categorieCodeRaccourci`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `licencier`
--

INSERT INTO `licencier` (`numeroLicence`, `nomLicencier`, `prenomLicencier`, `contactID`, `categorieCodeRaccourci`) VALUES
(18, 'aline', 'ndeko', 58, 'gsttd'),
(19, 'Aline', 'Funmilayo', 59, 'gsttd');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `educateur`
--
ALTER TABLE `educateur`
  ADD CONSTRAINT `educateur_ibfk_1` FOREIGN KEY (`licencie`) REFERENCES `licencier` (`numeroLicence`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `licencier`
--
ALTER TABLE `licencier`
  ADD CONSTRAINT `fk_categoire_licencier` FOREIGN KEY (`categorieCodeRaccourci`) REFERENCES `categorie` (`codeRaccourci`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contact_licencier` FOREIGN KEY (`contactID`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
