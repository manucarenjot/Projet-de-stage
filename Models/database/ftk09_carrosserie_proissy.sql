-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : mar. 05 avr. 2022 à 14:41
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ftk09_carrosserie_proissy`
--

-- --------------------------------------------------------

--
-- Structure de la table `ftk09_admin`
--

DROP TABLE IF EXISTS `ftk09_admin`;
CREATE TABLE IF NOT EXISTS `ftk09_admin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail_UNIQUE` (`mail`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ftk09_admin`
--

INSERT INTO `ftk09_admin` (`id`, `username`, `mail`, `password`) VALUES
(1, 'admin', 'admin@admin.org', '$2y$10$CYW0c4jR0rQLotAOhJePXepS/Wu5xEQxIt528nnymonv2jiIfzthm');

-- --------------------------------------------------------

--
-- Structure de la table `ftk09_devis`
--

DROP TABLE IF EXISTS `ftk09_devis`;
CREATE TABLE IF NOT EXISTS `ftk09_devis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(50) COLLATE utf8_bin NOT NULL,
  `mail` varchar(255) COLLATE utf8_bin NOT NULL,
  `grey_card` varchar(255) COLLATE utf8_bin NOT NULL,
  `car_picture` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `ftk09_devis`
--

INSERT INTO `ftk09_devis` (`id`, `phone`, `mail`, `grey_card`, `car_picture`) VALUES
(1, '0499.99.99.99', 'admin@admin.org', '9c677274dba4bc0df65681f3ba803e.PNG', '6a3a823d79f3f5723795c31373104d.PNG'),
(2, '0499.99.99.99', 'admin@admin.org', '454f889e5fedc20a83918197615c1e.PNG', 'c261706a93aaeae2f34dfcd772c627.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `ftk09_image`
--

DROP TABLE IF EXISTS `ftk09_image`;
CREATE TABLE IF NOT EXISTS `ftk09_image` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ftk09_messagerie`
--

DROP TABLE IF EXISTS `ftk09_messagerie`;
CREATE TABLE IF NOT EXISTS `ftk09_messagerie` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `messages` longtext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ftk09_messagerie`
--

INSERT INTO `ftk09_messagerie` (`id`, `name`, `firstname`, `mail`, `phone`, `messages`, `date`) VALUES
(26, 'panier', 'La grenouille rose', 'admin@admin.org', '0498928923', 'sdsdsdsdsqdsqdqsdqsdsqdsqdqdqdsqdqsdsqdsqdq', '2022-03-17 16:44:00');

-- --------------------------------------------------------

--
-- Structure de la table `ftk09_services`
--

DROP TABLE IF EXISTS `ftk09_services`;
CREATE TABLE IF NOT EXISTS `ftk09_services` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ftk09_services`
--

INSERT INTO `ftk09_services` (`id`, `title`, `description`) VALUES
(14, 'Redressage', 'Mise au marbre , redressage et contr&ocirc;le des ch&acirc;ssis.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
