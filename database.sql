-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 14 jan. 2024 à 11:31
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aline_thomas_project_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `codeRaccourci` varchar(10) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`codeRaccourci`, `nom`) VALUES
('cat1', 'Catégorie 1'),
('cat2', 'Catégorie 2');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nomContact` varchar(255) NOT NULL,
  `prenomContact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nomContact`, `prenomContact`, `email`, `tel`) VALUES
(53, 'farid', 'salami', 'farid@gmail.com', '766646563777645'),
(55, 'HHGJ', 'HGJ', 'DJJD@gmail.com', '0909090909'),
(56, 'oo', 'oo', 'kk@gmail.com', '090909090'),
(57, 'oo', 'oo', 'kk@gmail.com', '090909090'),
(58, 'thomas', 'gufflet', 'aline@gmail.com', '44244344344'),
(59, 'Farid', 'Salami', 'jhhethh@gmail.com', '0909090909'),
(60, 'IVAN', 'KOHL', 'ivan@gmail.com', '99541256'),
(61, 'LING', 'IYAN', 'iyan@gmail.com', '154785236'),
(62, 'LING', 'IYAN', 'iyan@gmail.com', '154785236'),
(63, 'LING', 'IYAN', 'iyan@gmail.com', '154785236'),
(64, 'LING', 'IYAN', 'iyan@gmail.com', '154785236'),
(65, 'LING', 'IYAN', 'iyan@gmail.com', '154785236'),
(66, 'AZIZ', 'IDRISSOU', 'aziz@gmail.com', '98745213'),
(67, 'AZIZ', 'IDRISSOU', 'aziz@gmail.com', '98745213'),
(71, 'AZIZ', 'IDRISSOU', 'aziz@gmail.com', '98745213'),
(72, 'AZIZ', 'IDRISSOUS', 'aziz@gmail.com', '98745213'),
(73, 'AZIZ', 'IDRISSOU', 'aziz@gmail.com', '98745213'),
(74, 'AZIZ', 'IDRISSOU', 'aziz@gmail.com', '98745213'),
(75, 'AZIZ', 'IDRISSOU', 'aziz@gmail.com', '98745213'),
(76, 'GAMA', 'GAMA', 'gama@gmail.com', '788456552840');

-- --------------------------------------------------------

--
-- Structure de la table `educateur`
--

CREATE TABLE `educateur` (
  `id` int(11) NOT NULL,
  `licencie` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `estAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `educateur`
--

INSERT INTO `educateur` (`id`, `licencie`, `email`, `mdp`, `estAdmin`) VALUES
(1, 18, 'alimas@gmail.com', '12345', 1),
(6, 19, 'aziz@gmail.com', 'deffrgegegs', 0);

-- --------------------------------------------------------

--
-- Structure de la table `licencier`
--

CREATE TABLE `licencier` (
  `numeroLicence` int(11) NOT NULL,
  `nomLicencier` varchar(255) DEFAULT NULL,
  `prenomLicencier` varchar(255) DEFAULT NULL,
  `contactID` int(11) DEFAULT NULL,
  `categorieCodeRaccourci` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `licencier`
--

INSERT INTO `licencier` (`numeroLicence`, `nomLicencier`, `prenomLicencier`, `contactID`, `categorieCodeRaccourci`) VALUES
(18, 'aline', 'ndeko', 58, 'cat2'),
(19, 'Aline', 'Funmilayo', 59, 'cat2'),
(23, 'JEAN', 'DOE', 60, 'cat2'),
(24, 'THA', 'UZI', 61, 'cat2'),
(29, 'CLAUDE', 'MAIGNAN', 66, 'cat2'),
(30, 'CLAUDEL', 'MAIGNAN', 67, 'cat2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`codeRaccourci`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `educateur`
--
ALTER TABLE `educateur`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `licencie` (`licencie`);

--
-- Index pour la table `licencier`
--
ALTER TABLE `licencier`
  ADD PRIMARY KEY (`numeroLicence`),
  ADD KEY `contactID` (`contactID`),
  ADD KEY `categorieCodeRaccourci` (`categorieCodeRaccourci`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `educateur`
--
ALTER TABLE `educateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `licencier`
--
ALTER TABLE `licencier`
  MODIFY `numeroLicence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `educateur`
--
ALTER TABLE `educateur`
  ADD CONSTRAINT `educateur_ibfk_1` FOREIGN KEY (`licencie`) REFERENCES `licencier` (`numeroLicence`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `licencier`
--
ALTER TABLE `licencier`
  ADD CONSTRAINT `fk_categoire_licencier` FOREIGN KEY (`categorieCodeRaccourci`) REFERENCES `categorie` (`codeRaccourci`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contact_licencier` FOREIGN KEY (`contactID`) REFERENCES `contact` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
