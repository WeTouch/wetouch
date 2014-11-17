-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 17 Novembre 2014 à 09:05
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
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  `msg` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `t_chat`
--

INSERT INTO `t_chat` (`id`, `id_user1`, `id_user2`, `msg`) VALUES
(1, 6, 2, 'Salut ! \r\n<br/><br/>\r\n\r\nCava ?\r\n<br/><br/>\r\n\r\nOui et toi ?'),
(2, 6, 5, 'Plan cul?\r\n<br/><br/>\r\nNon');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `t_membres`
--

INSERT INTO `t_membres` (`id`, `email`, `firstname`, `name`, `dob`, `position`, `preference`, `genre`, `description`, `photo_id`, `motDePasse`) VALUES
(1, 'jules.duvivier@y-nov.com', 'Jules', 'Duvivier', '1997-01-13', 'Biarritz', NULL, '1', 'Zboub', '0', 'zboubdeouf'),
(2, 'fd@fdp', 'fsr', 'gf', '0005-05-15', '', NULL, 'Monsieur', '', '0', '$2y$11$hGOOhmEne0Egr//0PidNPO./EdQER7CgoTyOxQXJlSvZWigsiF1mC'),
(3, 'damien.bellet@y-nov.com', 'Damien', 'Bellet', '1995-06-20', '', NULL, 'Monsieur', '', '0', '$2y$11$pwvgZilMTVpKxRJKbKSPoeleBEAwV70wkk0i9qH0oVLmECC89ZTEa'),
(4, 'damien.bellet@y-nov.com', 'Damien', 'Bellet', '1995-06-20', '', NULL, 'Monsieur', '', '0', '$2y$11$kkx4/.HlRW3vRBYYn25WyeyzIijU8cipoQpZfXAAnxkQdHsGdBo5G'),
(5, 'zboub@zboub.com', 'Michel', 'Zboub', '1997-12-13', '', NULL, 'Monsieur', '', '0', '$2y$11$YuyLn6DD67ZcVGrGRU7vQ.CfP5fMRqXtJ5fxuRNEZ9dEPKrqjSU4a'),
(8, 'zb@zb.fr', 'du', 'Du', '1955-01-13', '', NULL, 'Monsieur', '', '', '$2y$11$ZPnDAUc0PlWkpxioZuEPQ.ym.IsX/iNsB.igpOtDPnWFHU68feMNW'),
(7, 'aze@aze.fr', 'aze', 'aze', '0004-05-04', '', NULL, 'Monsieur', '', '', '$2y$11$JBxFHn7UPfvDfRKowGVNd.FRfVcpNaBpqWEJsYBQJtTWmMq6y9dl.'),
(6, 'jules.jules@jules.fr', 'a', 'a', '0123-12-13', '', NULL, 'Monsieur', '', '', '$2y$11$wPYk29VSyKi7f5zUFzI0XuDhKzRvnQhAYUeDN4iEt.z5Zm8APtxB6');

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

--
-- Contenu de la table `t_result`
--

INSERT INTO `t_result` (`voter`, `vote`, `result`) VALUES
(6, 1, 0),
(6, 2, 1),
(6, 3, 1),
(6, 4, 0),
(6, 5, 1),
(2, 6, 1),
(1, 6, 1),
(5, 6, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
