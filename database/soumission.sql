-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 10 avr. 2023 à 13:26
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `soumission`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

DROP TABLE IF EXISTS `appartient`;
CREATE TABLE IF NOT EXISTS `appartient` (
  `id_etud` int(10) DEFAULT NULL,
  `id_groupe` int(10) DEFAULT NULL,
  KEY `id_etud` (`id_etud`),
  KEY `id_groupe` (`id_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `devoir`
--

DROP TABLE IF EXISTS `devoir`;
CREATE TABLE IF NOT EXISTS `devoir` (
  `id_devoir` int(10) NOT NULL AUTO_INCREMENT,
  `matiere` varchar(50) DEFAULT NULL,
  `type_devoir` varchar(50) DEFAULT NULL,
  `data_devoir` longblob DEFAULT NULL,
  `date_devoir` date DEFAULT NULL,
  `id_sous` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_devoir`),
  KEY `id_sous` (`id_sous`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
CREATE TABLE IF NOT EXISTS `enseignant` (
  `id_ens` int(10) NOT NULL,
  `code` int(10) DEFAULT NULL,
  `id_sous` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_ens`),
  KEY `id_sous` (`id_sous`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `enseigner`
--

DROP TABLE IF EXISTS `enseigner`;
CREATE TABLE IF NOT EXISTS `enseigner` (
  `id_matiere` int(10) DEFAULT NULL,
  `id_ens` int(10) DEFAULT NULL,
  KEY `id_matiere` (`id_matiere`),
  KEY `id_ens` (`id_ens`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ens_devoir`
--

DROP TABLE IF EXISTS `ens_devoir`;
CREATE TABLE IF NOT EXISTS `ens_devoir` (
  `id_ens` int(10) DEFAULT NULL,
  `id_devoir` int(10) DEFAULT NULL,
  KEY `id_ens` (`id_ens`),
  KEY `id_devoir` (`id_devoir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ens_examen`
--

DROP TABLE IF EXISTS `ens_examen`;
CREATE TABLE IF NOT EXISTS `ens_examen` (
  `id_ens` int(10) DEFAULT NULL,
  `id_examen` int(10) DEFAULT NULL,
  KEY `id_ens` (`id_ens`),
  KEY `id_examen` (`id_examen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id_etud` int(10) NOT NULL,
  `matricule` int(20) NOT NULL,
  `semestre` varchar(50) DEFAULT NULL,
  `annee` varchar(50) DEFAULT NULL,
  `id_sous` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_etud`),
  UNIQUE KEY `matricule` (`matricule`),
  KEY `id_sous` (`id_sous`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etudie`
--

DROP TABLE IF EXISTS `etudie`;
CREATE TABLE IF NOT EXISTS `etudie` (
  `id_matiere` int(10) DEFAULT NULL,
  `id_etud` int(10) DEFAULT NULL,
  KEY `id_matiere` (`id_matiere`),
  KEY `id_etud` (`id_etud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

DROP TABLE IF EXISTS `examen`;
CREATE TABLE IF NOT EXISTS `examen` (
  `id_examen` int(10) NOT NULL AUTO_INCREMENT,
  `matiere` varchar(50) DEFAULT NULL,
  `type_examen` varchar(50) DEFAULT NULL,
  `data_examen` longblob DEFAULT NULL,
  `date_examen` date DEFAULT NULL,
  `id_sous` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_examen`),
  KEY `id_sous` (`id_sous`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fait_devoir`
--

DROP TABLE IF EXISTS `fait_devoir`;
CREATE TABLE IF NOT EXISTS `fait_devoir` (
  `id_etud` int(10) DEFAULT NULL,
  `id_devoir` int(10) DEFAULT NULL,
  KEY `id_etud` (`id_etud`),
  KEY `id_devoir` (`id_devoir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fait_examen`
--

DROP TABLE IF EXISTS `fait_examen`;
CREATE TABLE IF NOT EXISTS `fait_examen` (
  `id_etud` int(10) DEFAULT NULL,
  `id_examen` int(10) DEFAULT NULL,
  KEY `id_etud` (`id_etud`),
  KEY `id_examen` (`id_examen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id_groupe` int(10) NOT NULL AUTO_INCREMENT,
  `groupe_cm` varchar(50) DEFAULT NULL,
  `groupe_tp` varchar(50) DEFAULT NULL,
  `filiere` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id_matiere` int(10) NOT NULL AUTO_INCREMENT,
  `id_devoir` int(10) DEFAULT NULL,
  `id_examen` int(10) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `lebele` varchar(20) DEFAULT NULL,
  `semestre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_matiere`),
  KEY `id_devoir` (`id_devoir`),
  KEY `id_examen` (`id_examen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(10) NOT NULL AUTO_INCREMENT,
  `profile` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `soumission`
--

DROP TABLE IF EXISTS `soumission`;
CREATE TABLE IF NOT EXISTS `soumission` (
  `id_sous` int(10) NOT NULL AUTO_INCREMENT,
  `date_sous` datetime DEFAULT NULL,
  `date_limite` datetime DEFAULT NULL,
  `valide` tinyint(1) DEFAULT NULL,
  `note_devoir` float DEFAULT NULL,
  `note_examen` float DEFAULT NULL,
  PRIMARY KEY (`id_sous`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `date_naiss` date DEFAULT NULL,
  `lieu_naiss` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `id_role` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD CONSTRAINT `appartient_ibfk_1` FOREIGN KEY (`id_etud`) REFERENCES `etudiant` (`id_etud`),
  ADD CONSTRAINT `appartient_ibfk_2` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id_groupe`);

--
-- Contraintes pour la table `devoir`
--
ALTER TABLE `devoir`
  ADD CONSTRAINT `devoir_ibfk_1` FOREIGN KEY (`id_sous`) REFERENCES `soumission` (`id_sous`);

--
-- Contraintes pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `enseignant_ibfk_1` FOREIGN KEY (`id_sous`) REFERENCES `soumission` (`id_sous`),
  ADD CONSTRAINT `enseignant_utilisateur` FOREIGN KEY (`id_ens`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `enseigner`
--
ALTER TABLE `enseigner`
  ADD CONSTRAINT `enseigner_ibfk_1` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id_matiere`),
  ADD CONSTRAINT `enseigner_ibfk_2` FOREIGN KEY (`id_ens`) REFERENCES `enseignant` (`id_ens`);

--
-- Contraintes pour la table `ens_devoir`
--
ALTER TABLE `ens_devoir`
  ADD CONSTRAINT `ens_devoir_ibfk_1` FOREIGN KEY (`id_ens`) REFERENCES `enseignant` (`id_ens`),
  ADD CONSTRAINT `ens_devoir_ibfk_2` FOREIGN KEY (`id_devoir`) REFERENCES `devoir` (`id_devoir`);

--
-- Contraintes pour la table `ens_examen`
--
ALTER TABLE `ens_examen`
  ADD CONSTRAINT `ens_examen_ibfk_1` FOREIGN KEY (`id_ens`) REFERENCES `enseignant` (`id_ens`),
  ADD CONSTRAINT `ens_examen_ibfk_2` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id_examen`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`id_sous`) REFERENCES `soumission` (`id_sous`),
  ADD CONSTRAINT `etudiant_utilisateur` FOREIGN KEY (`id_etud`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `etudie`
--
ALTER TABLE `etudie`
  ADD CONSTRAINT `etudie_ibfk_1` FOREIGN KEY (`id_matiere`) REFERENCES `matiere` (`id_matiere`),
  ADD CONSTRAINT `etudie_ibfk_2` FOREIGN KEY (`id_etud`) REFERENCES `etudiant` (`id_etud`);

--
-- Contraintes pour la table `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `examen_ibfk_1` FOREIGN KEY (`id_sous`) REFERENCES `soumission` (`id_sous`);

--
-- Contraintes pour la table `fait_devoir`
--
ALTER TABLE `fait_devoir`
  ADD CONSTRAINT `fait_devoir_ibfk_1` FOREIGN KEY (`id_etud`) REFERENCES `etudiant` (`id_etud`),
  ADD CONSTRAINT `fait_devoir_ibfk_2` FOREIGN KEY (`id_devoir`) REFERENCES `devoir` (`id_devoir`);

--
-- Contraintes pour la table `fait_examen`
--
ALTER TABLE `fait_examen`
  ADD CONSTRAINT `fait_examen_ibfk_1` FOREIGN KEY (`id_etud`) REFERENCES `etudiant` (`id_etud`),
  ADD CONSTRAINT `fait_examen_ibfk_2` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id_examen`);

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `matiere_ibfk_1` FOREIGN KEY (`id_devoir`) REFERENCES `devoir` (`id_devoir`),
  ADD CONSTRAINT `matiere_ibfk_2` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id_examen`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
