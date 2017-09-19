-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 19 Septembre 2017 à 12:03
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bworkspace`
--

-- --------------------------------------------------------

--
-- Structure de la table `categori`
--

CREATE TABLE IF NOT EXISTS `categori` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categoriser`
--

CREATE TABLE IF NOT EXISTS `categoriser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat` int(11) NOT NULL,
  `id_ent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ent` (`id_ent`),
  KEY `id_cat` (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categoriser_prest`
--

CREATE TABLE IF NOT EXISTS `categoriser_prest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prest` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_prest` (`id_prest`),
  KEY `id_cat` (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
  `id_ent` int(11) NOT NULL AUTO_INCREMENT,
  `telphone` int(11) NOT NULL,
  `adresse` text NOT NULL,
  `siteweb` varchar(45) DEFAULT NULL,
  `nom` varchar(45) NOT NULL,
  `logo` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `mail` varchar(45) NOT NULL,
  `region` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `jobvacance`
--

CREATE TABLE IF NOT EXISTS `jobvacance` (
  `id_job` int(11) NOT NULL AUTO_INCREMENT,
  `id_ent` int(11) NOT NULL,
  `poste` varchar(45) NOT NULL,
  `diplome` varchar(45) NOT NULL,
  `duree` varchar(45) NOT NULL,
  `expiration` varchar(45) NOT NULL,
  PRIMARY KEY (`id_job`),
  KEY `id_ent` (`id_ent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE IF NOT EXISTS `offre` (
  `id_of` int(11) NOT NULL AUTO_INCREMENT,
  `id_ent` int(11) NOT NULL,
  `poste` varchar(45) NOT NULL,
  `diplome` varchar(45) NOT NULL,
  `duree` varchar(45) NOT NULL,
  `expiration` varchar(45) NOT NULL,
  PRIMARY KEY (`id_of`),
  KEY `id_ent` (`id_ent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `particulier`
--

CREATE TABLE IF NOT EXISTS `particulier` (
  `id_part` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `telephone` int(11) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `password` char(45) NOT NULL,
  `cv` varchar(45) DEFAULT NULL,
  `diplome` varchar(45) DEFAULT NULL,
  `an` varchar(20) NOT NULL,
  `profession` varchar(45) NOT NULL,
  `region` varchar(45) NOT NULL,
  PRIMARY KEY (`id_part`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `postuler_job`
--

CREATE TABLE IF NOT EXISTS `postuler_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_part` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_part` (`id_part`),
  KEY `id_job` (`id_job`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `postuler_offre`
--

CREATE TABLE IF NOT EXISTS `postuler_offre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_part` int(11) NOT NULL,
  `id_of` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_part` (`id_part`),
  KEY `id_of` (`id_of`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

CREATE TABLE IF NOT EXISTS `prestataire` (
  `id_prest` int(11) NOT NULL AUTO_INCREMENT,
  `nom` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `telephone` int(11) NOT NULL,
  `mail` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `logo` int(11) DEFAULT NULL,
  `siteweb` int(11) DEFAULT NULL,
  `adresse` int(11) NOT NULL,
  `region` varchar(45) NOT NULL,
  PRIMARY KEY (`id_prest`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `categoriser`
--
ALTER TABLE `categoriser`
  ADD CONSTRAINT `categoriser_ibfk_2` FOREIGN KEY (`id_ent`) REFERENCES `entreprise` (`id_ent`),
  ADD CONSTRAINT `categoriser_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categori` (`id_cat`);

--
-- Contraintes pour la table `categoriser_prest`
--
ALTER TABLE `categoriser_prest`
  ADD CONSTRAINT `categoriser_prest_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categori` (`id_cat`),
  ADD CONSTRAINT `categoriser_prest_ibfk_1` FOREIGN KEY (`id_prest`) REFERENCES `prestataire` (`id_prest`);

--
-- Contraintes pour la table `jobvacance`
--
ALTER TABLE `jobvacance`
  ADD CONSTRAINT `jobvacance_ibfk_1` FOREIGN KEY (`id_ent`) REFERENCES `entreprise` (`id_ent`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `offre_ibfk_1` FOREIGN KEY (`id_ent`) REFERENCES `entreprise` (`id_ent`);

--
-- Contraintes pour la table `postuler_job`
--
ALTER TABLE `postuler_job`
  ADD CONSTRAINT `postuler_job_ibfk_2` FOREIGN KEY (`id_job`) REFERENCES `jobvacance` (`id_job`),
  ADD CONSTRAINT `postuler_job_ibfk_1` FOREIGN KEY (`id_part`) REFERENCES `particulier` (`id_part`);

--
-- Contraintes pour la table `postuler_offre`
--
ALTER TABLE `postuler_offre`
  ADD CONSTRAINT `postuler_offre_ibfk_2` FOREIGN KEY (`id_of`) REFERENCES `offre` (`id_of`),
  ADD CONSTRAINT `postuler_offre_ibfk_1` FOREIGN KEY (`id_part`) REFERENCES `particulier` (`id_part`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
