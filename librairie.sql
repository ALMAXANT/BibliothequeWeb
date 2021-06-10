-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 10 juin 2021 à 17:59
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `librairie`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `Id_Auteur` int NOT NULL AUTO_INCREMENT,
  `Nom_Auteur` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `Prenom_Auteur` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`Id_Auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`Id_Auteur`, `Nom_Auteur`, `Prenom_Auteur`) VALUES
(2, 'Eshiro', 'Oda');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Id_client` int NOT NULL,
  UNIQUE KEY `FK_Id_client` (`Id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`Id_client`) VALUES
(8);

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

DROP TABLE IF EXISTS `editeur`;
CREATE TABLE IF NOT EXISTS `editeur` (
  `Id_Editeur` int NOT NULL AUTO_INCREMENT,
  `NomEditeur` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`Id_Editeur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`Id_Editeur`, `NomEditeur`) VALUES
(1, 'Kona');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `Id_employe` int NOT NULL,
  KEY `FK_Id_employe` (`Id_employe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`Id_employe`) VALUES
(2);

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

DROP TABLE IF EXISTS `livre`;
CREATE TABLE IF NOT EXISTS `livre` (
  `Id_Livre` int NOT NULL AUTO_INCREMENT,
  `Titre` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `Type_livre` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `ID_Rayon` int NOT NULL,
  `Id_Editeur` int NOT NULL,
  `Id_Theme` int NOT NULL,
  `Id_Auteur` int NOT NULL,
  PRIMARY KEY (`Id_Livre`),
  KEY `Livre_Rayon_FK` (`ID_Rayon`),
  KEY `Livre_Editeur0_FK` (`Id_Editeur`),
  KEY `Livre_Theme1_FK` (`Id_Theme`),
  KEY `Livre_Auteur_FK` (`Id_Auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`Id_Livre`, `Titre`, `Type_livre`, `ID_Rayon`, `Id_Editeur`, `Id_Theme`, `Id_Auteur`) VALUES
(4, 'One Piece', 'Manga', 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `pret`
--

DROP TABLE IF EXISTS `pret`;
CREATE TABLE IF NOT EXISTS `pret` (
  `ID_pret` int NOT NULL AUTO_INCREMENT,
  `DatePret` date NOT NULL,
  `Dateretour` date NOT NULL,
  `DateRelance` datetime DEFAULT NULL,
  `Quantite` int NOT NULL,
  `ID` int NOT NULL,
  `Id_Livre` int NOT NULL,
  PRIMARY KEY (`ID_pret`),
  KEY `Pret_Client_FK` (`ID`),
  KEY `Pret_Livre0_FK` (`Id_Livre`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Déchargement des données de la table `pret`
--

INSERT INTO `pret` (`ID_pret`, `DatePret`, `Dateretour`, `DateRelance`, `Quantite`, `ID`, `Id_Livre`) VALUES
(21, '2021-06-09', '2021-06-24', NULL, 1, 8, 4);

-- --------------------------------------------------------

--
-- Structure de la table `rayon`
--

DROP TABLE IF EXISTS `rayon`;
CREATE TABLE IF NOT EXISTS `rayon` (
  `ID_Rayon` int NOT NULL AUTO_INCREMENT,
  `NumeroAllee` int NOT NULL,
  `NumeroEtage` int NOT NULL,
  PRIMARY KEY (`ID_Rayon`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Déchargement des données de la table `rayon`
--

INSERT INTO `rayon` (`ID_Rayon`, `NumeroAllee`, `NumeroEtage`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `Id_Theme` int NOT NULL AUTO_INCREMENT,
  `Description` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`Id_Theme`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`Id_Theme`, `Description`) VALUES
(1, 'Manga');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `Prenom` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `CP` int NOT NULL,
  `Telephone` int NOT NULL,
  `Email` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `MDP` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID`, `Nom`, `Prenom`, `CP`, `Telephone`, `Email`, `MDP`) VALUES
(2, 'Jolie', 'Lena', 34000, 685259314, 'le.jolie@gmail.com', '123'),
(8, 'Michel', 'José', 34000, 685962547, 'm.michel@gmail.com', '123'),
(18, 'hfgh', 'hgh', 123654, 124545754, 'a.a@gmail.com', '123');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`Id_client`) REFERENCES `utilisateur` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_ibfk_1` FOREIGN KEY (`Id_employe`) REFERENCES `utilisateur` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `Livre_Editeur0_FK` FOREIGN KEY (`Id_Editeur`) REFERENCES `editeur` (`Id_Editeur`),
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`Id_Auteur`) REFERENCES `auteur` (`Id_Auteur`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Livre_Rayon_FK` FOREIGN KEY (`ID_Rayon`) REFERENCES `rayon` (`ID_Rayon`),
  ADD CONSTRAINT `Livre_Theme1_FK` FOREIGN KEY (`Id_Theme`) REFERENCES `theme` (`Id_Theme`);

--
-- Contraintes pour la table `pret`
--
ALTER TABLE `pret`
  ADD CONSTRAINT `pret_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `utilisateur` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Pret_Livre0_FK` FOREIGN KEY (`Id_Livre`) REFERENCES `livre` (`Id_Livre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
