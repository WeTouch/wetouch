-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 03 Décembre 2014 à 16:42
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `t_chat`
--

INSERT INTO `t_chat` (`id`, `SendId`, `ReceiveId`, `message`, `date`) VALUES
(37, 1, 6, 'Zboub', '0000-00-00 00:00:00'),
(38, 1, 6, 'Zboub de ouf oui', '2014-12-03 13:40:47'),
(39, 6, 1, 'Mdr ouais frère', '2014-12-03 13:40:47'),
(40, 1, 2, 'Yo', '2014-12-03 14:12:20');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `t_membres`
--

INSERT INTO `t_membres` (`id`, `email`, `firstname`, `name`, `dob`, `position`, `preference`, `prefAge`, `genre`, `description`, `photo_id`, `password`) VALUES
(1, 'jules.duvivier@y-nov.com', 'Jules', 'Duvivier', '1997-01-13', 'Biarritz', 'femme', '13-14', 'homme', 'Description de ouf blablabla', 'homme.jpg', 'zboubdeouf'),
(11, 'jules.duvivier@y-nov.com', 'Jimmy', 'Duvivier', '1997-09-13', '', NULL, '', 'homme', '', '11/18.jpg', 'zboub'),
(3, 'damien.bellet@y-nov.com', 'Damien', 'Bellet', '1995-06-20', '', NULL, '', 'Monsieur', '', '0', '$2y$11$pwvgZilMTVpKxRJKbKSPoeleBEAwV70wkk0i9qH0oVLmECC89ZTEa'),
(4, 'damien.bellet@y-nov.com', 'Damien', 'Bellet', '1995-06-20', '', NULL, '', 'Monsieur', '', '0', '$2y$11$kkx4/.HlRW3vRBYYn25WyeyzIijU8cipoQpZfXAAnxkQdHsGdBo5G'),
(5, 'zboub@zboub.com', 'Michel', 'Zboub', '1997-12-13', '', NULL, '', 'Monsieur', '', '0', '$2y$11$YuyLn6DD67ZcVGrGRU7vQ.CfP5fMRqXtJ5fxuRNEZ9dEPKrqjSU4a'),
(2, 'eric@hotmail.fr', 'canteloup', 'eric', '0013-12-13', '', NULL, '', 'Monsieur', '', '', '$2y$11$4M1DD4KltLX4/8fp8fP5COhYLtWL2sjekvg5.3cjiuh04wGqxjdDu'),
(8, 'zb@zb.fr', 'du', 'Du', '1955-01-13', '', NULL, '', 'Monsieur', '', '', '$2y$11$ZPnDAUc0PlWkpxioZuEPQ.ym.IsX/iNsB.igpOtDPnWFHU68feMNW'),
(7, 'aze@aze.fr', 'aze', 'aze', '0004-05-04', '', NULL, '', 'Monsieur', '', '', '$2y$11$JBxFHn7UPfvDfRKowGVNd.FRfVcpNaBpqWEJsYBQJtTWmMq6y9dl.'),
(6, 'jules.jules@jules.fr', 'a', 'a', '0123-12-13', '', NULL, '', 'Monsieur', '', '', '$2y$11$wPYk29VSyKi7f5zUFzI0XuDhKzRvnQhAYUeDN4iEt.z5Zm8APtxB6'),
(12, 'db@hotmail.fr', 'Damien', 'Bellet', '1995-01-20', '', NULL, '', 'homme', '', '', 'azerty'),
(13, '', 'de', 'az', '0005-02-12', '', NULL, '', 'homme', '', '', 'zb'),
(14, 'db.db.db@hotmail.fr', 'Damien', 'Bellet', '1888-01-20', '', 'femme', '', 'homme', '', '', 'xd');

-- --------------------------------------------------------

--
-- Structure de la table `t_photo`
--

CREATE TABLE IF NOT EXISTS `t_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `id_membres` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `t_photo`
--

INSERT INTO `t_photo` (`id`, `path`, `id_membres`) VALUES
(1, 'photo.jpg', 4),
(2, 'zboub.jpg', 4),
(6, '6/1.jpg', 6),
(19, '11/18.jpg', 11);

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
(1, 6, 1),
(6, 1, 1),
(1, 3, 0),
(1, 5, 1),
(1, 2, 1),
(2, 1, 1),
(1, 4, 1),
(4, 1, 1),
(12, 1, 1),
(1, 12, 1),
(1, 7, 0),
(1, 8, 0),
(11, 1, 0),
(1, 13, 0),
(1, 14, 0),
(11, 2, 0),
(11, 3, 0),
(11, 4, 0),
(11, 5, 0),
(11, 6, 0),
(11, 7, 0),
(11, 8, 0),
(11, 12, 0),
(11, 13, 0),
(11, 14, 0),
(12, 11, 1),
(12, 3, 1),
(12, 4, 1),
(12, 5, 1),
(12, 2, 1),
(12, 8, 1),
(12, 7, 1),
(12, 6, 1),
(12, 13, 1),
(12, 14, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
