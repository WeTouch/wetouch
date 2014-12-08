-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 08 Décembre 2014 à 15:26
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `wetouch`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_chat`
--

CREATE TABLE IF NOT EXISTS `t_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SendId` int(11) NOT NULL,
  `ReceiveId` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_informations`
--

CREATE TABLE IF NOT EXISTS `t_informations` (
  `id` int(11) NOT NULL,
  `taille` varchar(255) NOT NULL,
  `poids` int(11) NOT NULL,
  `couleurCheveux` varchar(255) NOT NULL,
  `couleurYeux` varchar(255) NOT NULL,
  `bijoux` varchar(255) NOT NULL,
  `fumeur` varchar(255) NOT NULL,
  `origine` varchar(255) NOT NULL,
  `formation` varchar(255) NOT NULL,
  `situation` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `cherche` varchar(255) NOT NULL,
  `libre` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_informations`
--

INSERT INTO `t_informations` (`id`, `taille`, `poids`, `couleurCheveux`, `couleurYeux`, `bijoux`, `fumeur`, `origine`, `formation`, `situation`, `statut`, `cherche`, `libre`) VALUES
(1, '  175', 65, '  Brun', '  Bleu', '  Non', '  Non', '  Europe', '  Etudes supÃ©rieur', '  Etudiant', '  En couple avec ma main gauche', 'De la bite', '  Je me reproduis');

-- --------------------------------------------------------

--
-- Structure de la table `t_membres`
--

CREATE TABLE IF NOT EXISTS `t_membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `preference` varchar(20) DEFAULT NULL,
  `prefAge` varchar(255) NOT NULL,
  `genre` varchar(20) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `photo_id` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ix_photo` (`photo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `t_membres`
--

INSERT INTO `t_membres` (`id`, `email`, `firstname`, `name`, `dob`, `position`, `preference`, `prefAge`, `genre`, `description`, `photo_id`, `password`) VALUES
(1, 'jules.duvivier@y-nov.com', 'Jules', 'Duvivier', '1997-01-13', 'Biarritz', 'femme', '13-14', 'homme', 'Description de ouf blablabla\r\nrtÃ trÃ \r\noekraor\r\nko\r\nkaerokreokrek\r\noreokrokokezo\r\neo\r\neko\r\nfrae\r\nokrekorok\r\ne', 'homme.jpg', 'zboubdeouf'),
(3, 'damien.bellet@y-nov.com', 'Damien', 'Bellet', '1995-06-20', '', NULL, '', 'Monsieur', '', '0', '$2y$11$pwvgZilMTVpKxRJKbKSPoeleBEAwV70wkk0i9qH0oVLmECC89ZTEa'),
(4, 'damien.bellet@y-nov.com', 'Damien', 'Bellet', '1995-06-20', '', NULL, '', 'Monsieur', '', '0', '$2y$11$kkx4/.HlRW3vRBYYn25WyeyzIijU8cipoQpZfXAAnxkQdHsGdBo5G'),
(5, 'zboub@zboub.com', 'Michel', 'Zboub', '1997-12-13', '', NULL, '', 'Monsieur', '', '0', '$2y$11$YuyLn6DD67ZcVGrGRU7vQ.CfP5fMRqXtJ5fxuRNEZ9dEPKrqjSU4a'),
(2, 'eric@hotmail.fr', 'canteloup', 'eric', '0013-12-13', '', NULL, '', 'Monsieur', '', '', '$2y$11$4M1DD4KltLX4/8fp8fP5COhYLtWL2sjekvg5.3cjiuh04wGqxjdDu'),
(8, 'zb@zb.fr', 'du', 'Du', '1955-01-13', '', NULL, '', 'Monsieur', '', '', '$2y$11$ZPnDAUc0PlWkpxioZuEPQ.ym.IsX/iNsB.igpOtDPnWFHU68feMNW'),
(7, 'aze@aze.fr', 'aze', 'aze', '0004-05-04', '', NULL, '', 'Monsieur', '', '', '$2y$11$JBxFHn7UPfvDfRKowGVNd.FRfVcpNaBpqWEJsYBQJtTWmMq6y9dl.'),
(6, 'jules.jules@jules.fr', 'a', 'a', '0123-12-13', '', NULL, '', 'Monsieur', '', '', '$2y$11$wPYk29VSyKi7f5zUFzI0XuDhKzRvnQhAYUeDN4iEt.z5Zm8APtxB6'),
(12, 'db@hotmail.fr', 'Damien', 'Bellet', '1995-01-20', '', NULL, '', 'homme', '', '', 'azerty'),
(13, '', 'de', 'az', '0005-02-12', '', NULL, '', 'homme', '', '', 'zb'),
(14, 'db.db.db@hotmail.fr', 'Damien', 'Bellet', '1888-01-20', '', 'femme', '', 'homme', '', '', 'xd'),
(15, 'sarah.lartigau@hotmail.fr', 'Sarah', 'Lartigau', '1997-03-13', '', 'homme', '', 'femme', 'Je m''appelle Sarah !', '15/20.jpg', 'zboubdeouf'),
(16, 'emma.tjulander@hotmail.fr', 'Emma', 'Tjulander', '1997-01-13', '', 'homme', '', 'femme', '', '16/31.jpg', 'zboubdeouf'),
(25, 'damien.bellet@y-nov.com', 'Damien', 'Bellet', '1967-09-13', '', 'femme', '', 'homme', '', '', 'zboubdeouf'),
(26, 'damien.bellet@y-nov.com', 'Damien', 'Bellet', '1967-09-13', '', 'femme', '', 'homme', '', '', 'zboubdeouf'),
(27, 'damien.bellet@y-nov.com', 'Damien', 'Bellet', '1967-09-13', '', 'femme', '', 'homme', '', '', 'zboubdeouf'),
(28, 'damien.bellet@y-nov.com', 'Damien', 'Bellet', '1967-09-13', '', 'femme', '', 'homme', '', '', 'zboubdeouf'),
(29, 'louka.hanuise@y-nov.com', 'Louka', 'Hanuise', '1967-09-13', '', 'femme', '', 'homme', '', '', 'zboubdeouf'),
(30, 'thibault.denuc@y-nov.com', 'Thibault', 'Denuc', '1999-01-13', '', 'femme', '', 'homme', '', '', 'zboubdeouf'),
(32, 'jules.du33vivier@y-nov.com', 'wxwxwx', 'wxwxwx', '1997-01-13', '', 'femme', '', 'homme', '', '', 'az');

-- --------------------------------------------------------

--
-- Structure de la table `t_photo`
--

CREATE TABLE IF NOT EXISTS `t_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `id_membres` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Contenu de la table `t_photo`
--

INSERT INTO `t_photo` (`id`, `path`, `id_membres`) VALUES
(1, 'photo.jpg', 4),
(2, 'zboub.jpg', 4),
(6, '6/1.jpg', 6),
(31, '16/31.jpg', 16),
(19, '11/18.jpg', 11),
(30, '16/30.jpg', 16),
(29, '15/20.jpg', 15);

-- --------------------------------------------------------

--
-- Structure de la table `t_result`
--

CREATE TABLE IF NOT EXISTS `t_result` (
  `voter` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  PRIMARY KEY (`voter`,`vote`),
  KEY `vote` (`vote`),
  KEY `voter` (`voter`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `t_result`
--

INSERT INTO `t_result` (`voter`, `vote`, `result`) VALUES
(1, 15, 1),
(12, 29, 1),
(12, 28, 1),
(12, 27, 1),
(12, 26, 1),
(12, 25, 1),
(12, 24, 1),
(12, 23, 1),
(12, 22, 1),
(12, 21, 1),
(12, 20, 1),
(12, 19, 1),
(12, 18, 1),
(12, 17, 1),
(12, 16, 1),
(12, 15, 1),
(12, 14, 1),
(12, 13, 1),
(12, 6, 1),
(12, 7, 1),
(12, 8, 1),
(12, 2, 1),
(12, 5, 1),
(12, 4, 1),
(12, 3, 1),
(12, 11, 1),
(12, 1, 1),
(16, 1, 1),
(1, 16, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
