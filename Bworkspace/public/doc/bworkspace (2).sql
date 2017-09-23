-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 22 Septembre 2017 à 19:02
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `categori`
--

INSERT INTO `categori` (`id_cat`, `nom`) VALUES
(1, 'informatique'),
(2, 'gestion'),
(5, 'tranport'),
(6, 'logistique');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `categoriser`
--

INSERT INTO `categoriser` (`id`, `id_cat`, `id_ent`) VALUES
(1, 1, 8),
(2, 2, 8),
(3, 1, 11),
(4, 2, 11),
(5, 1, 12),
(6, 2, 12),
(7, 1, 13),
(8, 1, 14),
(9, 1, 15),
(10, 1, 16),
(11, 2, 17),
(12, 1, 18),
(13, 5, 18),
(14, 6, 18);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `categoriser_prest`
--

INSERT INTO `categoriser_prest` (`id`, `id_prest`, `id_cat`) VALUES
(1, 3, 1),
(2, 3, 2),
(3, 4, 1),
(4, 4, 5),
(5, 4, 6);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE IF NOT EXISTS `entreprise` (
  `id_ent` int(11) NOT NULL AUTO_INCREMENT,
  `telephone` varchar(15) DEFAULT NULL,
  `siteweb` varchar(45) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `logo` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `region` varchar(45) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `password` char(40) NOT NULL,
  PRIMARY KEY (`id_ent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`id_ent`, `telephone`, `siteweb`, `nom`, `logo`, `mail`, `region`, `adresse`, `description`, `password`) VALUES
(1, NULL, 'www', 'twerk', 'bitch', 'cadet.quenum@gmail.com', 'Litoral', 'ygeiyzdguc', 'euh', 'fbc7843acd866f53f17a92b81b4f1d95ad543b38'),
(2, NULL, 'www', 'twerk', 'bitch', 'cadet.quenum@gmail.com', 'Litoral', 'ygeiyzdguc', 'euh', 'fbc7843acd866f53f17a92b81b4f1d95ad543b38'),
(3, NULL, 'www', 'twerk', 'bitch', 'cadet.quenum@gmail.com', 'Litoral', 'ygeiyzdguc', 'euh', 'fbc7843acd866f53f17a92b81b4f1d95ad543b38'),
(4, NULL, 'www', 'twerk', 'bitch', 'cadet.quenum@gmail.com', 'Litoral', 'ygeiyzdguc', 'euh', 'fbc7843acd866f53f17a92b81b4f1d95ad543b38'),
(5, '96674287', 'www', 'twerk', 'bitch', 'cadet.quenum@gmail.com', 'Litoral', 'ygeiyzdguc', 'euh', 'fbc7843acd866f53f17a92b81b4f1d95ad543b38'),
(6, '96674287', NULL, 'twerk', NULL, 'cadet.quenum@gmail.com', 'Litoral', 'ygeiyzdguc', NULL, '356a192b7913b04c54574d18c28d46e6395428ab'),
(7, '96674287', NULL, 'twerk', NULL, 'cadet.quenum@gmail.com', 'Litoral', 'ygeiyzdguc', NULL, '356a192b7913b04c54574d18c28d46e6395428ab'),
(8, '96674287', NULL, 'twerk', NULL, 'cadet.quenum@gmail.com', 'Litoral', 'ygeiyzdguc', NULL, 'ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4'),
(9, '96674287', NULL, 'twerk', NULL, 'cadet.quenum@gmail.com', 'Litoral', 'ygeiyzdguc', NULL, 'ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4'),
(10, '96674287', NULL, 'twerk', NULL, 'cadet.quenum@gmail.com', 'Litoral', 'ygeiyzdguc', NULL, 'ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4'),
(11, '96674287', NULL, 'twerk', NULL, 'cadet.quenum@gmail.com', 'Litoral', 'ygeiyzdguc', NULL, 'fb644351560d8296fe6da332236b1f8d61b2828a'),
(12, '96674287', NULL, 'twerk', NULL, 'cade.quenum@gmail.com', 'Litoral', 'ygeiyzdguc', NULL, 'fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f'),
(13, '152525', NULL, 'kelfemklzf', NULL, 'olympe.quenum@gmail.com', 'Borgou', 'rfghcfcvh', NULL, '1352246e33277e9d3c9090a434fa72cfa6536ae2'),
(14, '152525', NULL, 'kelfemklzf', NULL, 'olymp.quenum@gmail.com', 'Borgou', 'rfghcfcvh', NULL, '827bfc458708f0b442009c9c9836f7e4b65557fb'),
(15, '152525', NULL, 'kelfemklzf', NULL, 'olym.quenum@gmail.com', 'Borgou', 'rfghcfcvh', NULL, 'eb4ac3033e8ab3591e0fcefa8c26ce3fd36d5a0f'),
(16, '152525', NULL, 'kelfemklzf', NULL, 'oly.quenum@gmail.com', 'Borgou', 'rfghcfcvh', NULL, 'eb4ac3033e8ab3591e0fcefa8c26ce3fd36d5a0f'),
(17, '55787', NULL, 'edhjsejkd', NULL, 'n.quenum@gmail.com', 'Atlantique', 'cfreef', NULL, 'fb644351560d8296fe6da332236b1f8d61b2828a'),
(18, '45455455', 'frfrrfrf"r', 'defzedfer', '{737e4884510100828bd5dc85d1393f90}.jpg', 'boss.quenum@gmail.com', 'Atlantique', 'zdazdazautofocuaautofocuaautofocupautofocus', '''r''r''ré''rr''r"''r"''r"''rr''r''', 'fbc7843acd866f53f17a92b81b4f1d95ad543b38');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `jobvacance`
--

INSERT INTO `jobvacance` (`id_job`, `id_ent`, `poste`, `diplome`, `duree`, `expiration`) VALUES
(1, 18, 'developeur', 'master', '5ans', '1506549600');

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE IF NOT EXISTS `offre` (
  `id_of` int(11) NOT NULL AUTO_INCREMENT,
  `id_ent` int(11) NOT NULL,
  `poste` varchar(45) DEFAULT NULL,
  `diplome` varchar(45) DEFAULT NULL,
  `duree` varchar(45) DEFAULT NULL,
  `expiration` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_of`),
  KEY `id_ent` (`id_ent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `offre`
--

INSERT INTO `offre` (`id_of`, `id_ent`, `poste`, `diplome`, `duree`, `expiration`) VALUES
(2, 18, 'developeur', 'master', '5ans', 1505512800),
(3, 18, 'manequin', 'master', '5ans', 1505512800),
(4, 18, 'manequin', 'master', '5ans', 1505512800);

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
  `nom` varchar(45) NOT NULL,
  `password` char(50) NOT NULL,
  `telephone` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `description` text,
  `logo` char(50) DEFAULT NULL,
  `siteweb` varchar(45) DEFAULT NULL,
  `adresse` text NOT NULL,
  `region` varchar(45) NOT NULL,
  PRIMARY KEY (`id_prest`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `prestataire`
--

INSERT INTO `prestataire` (`id_prest`, `nom`, `password`, `telephone`, `mail`, `description`, `logo`, `siteweb`, `adresse`, `region`) VALUES
(1, '0', 'fb644351560d8296fe6da332236b1f8d61b2828a', '5645636', '0', NULL, NULL, NULL, '0', 'Donga'),
(2, 'rdytuygu', '902ba3cda1883801594b6e1b452790cc53948fda', '645455', 'c.quenum@gmail.com', NULL, NULL, NULL, 'ghgfhj', 'Atlantique'),
(3, 'rdytuygu', '902ba3cda1883801594b6e1b452790cc53948fda', '645455', 'i.quenum@gmail.com', NULL, NULL, NULL, 'ghgfhj', 'Atlantique'),
(4, 'boss', 'fbc7843acd866f53f17a92b81b4f1d95ad543b38', '4855285', 'boss.quenum@gmail.com', 'tsdjyd,ydkuugj', '{301934433b310d10277f06394dca9b68}.jpg', 'ghcfjfyhv', 'fzefzefzefzautofocuaautofocuaautofocus', 'Donga');

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
