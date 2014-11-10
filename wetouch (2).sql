-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 10 Novembre 2014 à 10:37
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
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  `msg` mediumtext NOT NULL,
  PRIMARY KEY (`id_user1`,`id_user2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `genre` varchar(20) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `photo_id` varchar(250) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ix_photo` (`photo_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `t_membres`
--

INSERT INTO `t_membres` (`id`, `email`, `firstname`, `name`, `dob`, `position`, `preference`, `genre`, `description`, `photo_id`, `motDePasse`) VALUES
(1, 'jules.duvivier@y-nov.com', 'Jules', 'Duvivier', '1997-01-13', 'Biarritz', NULL, '1', 'Zboub', '0', 'zboubdeouf'),
(2, 'fd@fdp', 'fsr', 'gf', '0005-05-15', '', NULL, 'Monsieur', '', '0', '$2y$11$hGOOhmEne0Egr//0PidNPO./EdQER7CgoTyOxQXJlSvZWigsiF1mC'),
(3, 'damien.bellet@y-nov.com', 'Damien', 'Bellet', '1995-06-20', '', NULL, 'Monsieur', '', '0', '$2y$11$pwvgZilMTVpKxRJKbKSPoeleBEAwV70wkk0i9qH0oVLmECC89ZTEa'),
(4, 'damien.bellet@y-nov.com', 'Damien', 'Bellet', '1995-06-20', '', NULL, 'Monsieur', '', '0', '$2y$11$kkx4/.HlRW3vRBYYn25WyeyzIijU8cipoQpZfXAAnxkQdHsGdBo5G'),
(5, 'zboub@zboub.com', 'Michel', 'Zboub', '1997-12-13', '', NULL, 'Monsieur', '', '0', '$2y$11$YuyLn6DD67ZcVGrGRU7vQ.CfP5fMRqXtJ5fxuRNEZ9dEPKrqjSU4a'),
(6, 'jules.duvivier@y-nov.com', 'admin', 'admin', '1997-01-13', '', NULL, 'Mademoiselle', '', '6/1.jpg', '$2y$11$oMceR6Wb695H8aub4FTqAuuHyd4lW5fkrfcfULJX0z5N5aTjQTLfy');

-- --------------------------------------------------------

--
-- Structure de la table `t_photo`
--

CREATE TABLE IF NOT EXISTS `t_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `id_membres` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `t_photo`
--

INSERT INTO `t_photo` (`id`, `path`, `id_membres`) VALUES
(1, 'photo.jpg', 4),
(2, 'zboub.jpg', 4),
(6, '6/1.jpg', 6);

-- --------------------------------------------------------

--
-- Structure de la table `t_result`
--

CREATE TABLE IF NOT EXISTS `t_result` (
  `voter` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  KEY `vote` (`vote`),
  KEY `voter` (`voter`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
