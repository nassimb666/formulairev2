-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 19 jan. 2024 à 10:36
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `trajet`
--
CREATE DATABASE IF NOT EXISTS `trajet` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `trajet`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_email` (`admin_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@example.com', 'AdminPassword');

-- --------------------------------------------------------

--
-- Structure de la table `enterprise`
--

CREATE TABLE IF NOT EXISTS `enterprise` (
  `enterprise_id` int NOT NULL AUTO_INCREMENT,
  `enterprise_name` varchar(50) NOT NULL,
  `enterprise_email` varchar(50) NOT NULL,
  `enterprise_siret` varchar(50) NOT NULL,
  `enterprise_adress` varchar(50) NOT NULL,
  `enterprise_password` varchar(255) NOT NULL,
  `enterprise_zipcode` int NOT NULL,
  `enterprise_city` varchar(25) NOT NULL,
  `enterprise_photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`enterprise_id`),
  UNIQUE KEY `enterprise_siret` (`enterprise_siret`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `enterprise`
--

INSERT INTO `enterprise` (`enterprise_id`, `enterprise_name`, `enterprise_email`, `enterprise_siret`, `enterprise_adress`, `enterprise_password`, `enterprise_zipcode`, `enterprise_city`, `enterprise_photo`) VALUES
(1, 'France Gazouz', 'FranceGazouz@gmail.com', '54DE65Z5D2DF', '28 Rue De La Mort', 'Geleklek123', 76000, 'Rouen', NULL),
(2, 'Nouvelle Entreprise SAS', 'contact@nouvelleentreprise.com', '12345678901234', '15 Rue du Commerce', 'MotDePasse123', 75001, 'Paris', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `events_id` int NOT NULL AUTO_INCREMENT,
  `events_startdate` date NOT NULL,
  `events_challengedescrib` varchar(300) NOT NULL,
  `events_photo` varchar(50) DEFAULT NULL,
  `events_enddate` date NOT NULL,
  `events_challengename` varchar(50) NOT NULL,
  `enterprise_id` int NOT NULL,
  PRIMARY KEY (`events_id`),
  KEY `enterprise_id` (`enterprise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`events_id`, `events_startdate`, `events_challengedescrib`, `events_photo`, `events_enddate`, `events_challengename`, `enterprise_id`) VALUES
(1, '2024-11-01', 'L\'entreprise France Gazouz organise une marche à pied pour fêter la saison 14 de League Of Legends', NULL, '2024-11-01', 'Faille de l\'invocateur', 1),
(2, '2024-02-02', 'Défi de remise en forme pour février', NULL, '2024-02-10', 'Février Fit Challenge', 2);

-- --------------------------------------------------------

--
-- Structure de la table `ride`
--

CREATE TABLE IF NOT EXISTS `ride` (
  `ride_id` int NOT NULL AUTO_INCREMENT,
  `ride_date` date NOT NULL,
  `ride_distance` decimal(3,2) NOT NULL,
  `ride_photo` varchar(50) DEFAULT NULL,
  `user_id` int NOT NULL,
  `transport_id` int NOT NULL,
  PRIMARY KEY (`ride_id`),
  KEY `user_id` (`user_id`),
  KEY `transport_id` (`transport_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ride`
--

INSERT INTO `ride` (`ride_id`, `ride_date`, `ride_distance`, `ride_photo`, `user_id`, `transport_id`) VALUES
(1, '2024-02-01', 2.50, 'parc_epicerie.jpg', 1, 1),
(2, '2024-02-02', 3.80, 'bureau_parc.jpg', 2, 2),
(3, '2024-02-03', 4.20, 'gym_magasin.jpg', 3, 1),
(4, '2024-02-01', 2.50, 'parc_epicerie.jpg', 1, 1),
(5, '2024-02-02', 3.80, 'bureau_parc.jpg', 2, 2),
(6, '2024-02-03', 4.20, 'gym_magasin.jpg', 3, 1),
(7, '2024-02-01', 2.50, 'parc_epicerie.jpg', 1, 1),
(8, '2024-02-02', 3.80, 'bureau_parc.jpg', 2, 2),
(9, '2024-02-03', 4.20, 'gym_magasin.jpg', 3, 1),
(64, '2024-02-04', 7.30, 'maison_travail.jpg', 1, 3),
(65, '2024-02-05', 1.20, 'travail_restaurant.jpg', 1, 1),
(66, '2024-02-06', 5.60, 'maison_bureau.jpg', 2, 2),
(67, '2024-02-07', 2.10, 'bureau_parc.jpg', 2, 2),
(68, '2024-02-08', 3.90, 'maison_bureau.jpg', 3, 3),
(69, '2024-02-09', 4.70, 'bureau_parc.jpg', 3, 3),
(70, '2024-02-10', 1.80, 'maison_epicerie.jpg', 4, 4),
(71, '2024-02-11', 0.90, 'epicerie_cafe.jpg', 4, 4),
(72, '2024-02-12', 6.50, 'maison_travail.jpg', 5, 5),
(73, '2024-02-13', 3.30, 'travail_parc.jpg', 5, 5),
(74, '2024-02-14', 6.40, 'maison_travail.jpg', 5, 5),
(75, '2024-02-15', 2.20, 'travail_boulangerie.jpg', 5, 5),
(76, '2024-02-16', 7.10, 'maison_travail.jpg', 1, 3),
(77, '2024-02-17', 1.50, 'travail_restaurant.jpg', 1, 1),
(78, '2024-02-18', 5.30, 'maison_bureau.jpg', 2, 2),
(79, '2024-02-19', 2.50, 'bureau_parc.jpg', 2, 2),
(80, '2024-02-20', 4.00, 'maison_bureau.jpg', 3, 3),
(81, '2024-02-21', 4.20, 'bureau_parc.jpg', 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `transport`
--

CREATE TABLE IF NOT EXISTS `transport` (
  `transport_id` int NOT NULL AUTO_INCREMENT,
  `transport_type` varchar(50) NOT NULL,
  PRIMARY KEY (`transport_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `transport`
--

INSERT INTO `transport` (`transport_id`, `transport_type`) VALUES
(1, 'Le vélo'),
(2, 'La trottinette'),
(3, 'La marche'),
(4, 'Le roller'),
(5, 'Le skate');

-- --------------------------------------------------------

--
-- Structure de la table `transport_pris_en_compte`
--

CREATE TABLE IF NOT EXISTS `transport_pris_en_compte` (
  `events_id` int NOT NULL,
  `transport_id` int NOT NULL,
  PRIMARY KEY (`events_id`,`transport_id`),
  KEY `transport_id` (`transport_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `transport_pris_en_compte`
--

INSERT INTO `transport_pris_en_compte` (`events_id`, `transport_id`) VALUES
(2, 1),
(1, 3),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `userprofil`
--

CREATE TABLE IF NOT EXISTS `userprofil` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_validate` tinyint(1) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_pseudo` varchar(50) NOT NULL,
  `user_describ` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_dateofbirth` date NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_photo` varchar(50) DEFAULT NULL,
  `enterprise_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  KEY `enterprise_id` (`enterprise_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `userprofil`
--

INSERT INTO `userprofil` (`user_id`, `user_validate`, `user_name`, `user_firstname`, `user_pseudo`, `user_describ`, `user_email`, `user_dateofbirth`, `user_password`, `user_photo`, `enterprise_id`) VALUES
(1, 1, 'Dupont', 'Alice', 'alice89', 'I love coding!', 'alice@example.com', '1990-05-15', 'PasswordAlice', 'alice.jpg', 1),
(2, 1, 'Martin', 'Bob', 'bob92', 'Passionate about technology', 'bob@example.com', '1985-09-20', 'PasswordBob', 'bob.jpg', 1),
(3, 1, 'Leclerc', 'Caroline', 'caro77', 'Travel enthusiast', 'caroline@example.com', '1988-12-10', 'PasswordCaroline', 'caroline.jpg', 1),
(4, 1, 'Lefevre', 'David', 'david78', 'Nature lover', 'david@example.com', '1982-07-25', 'PasswordDavid', 'david.jpg', 2),
(5, 1, 'Bertrand', 'Émilie', 'emilie_94', 'Art and culture enthusiast', 'emilie@example.com', '1995-02-03', 'PasswordEmilie', 'emilie.jpg', 2),
(6, 1, 'Lambert', 'François', 'francois123', 'Fitness and sports', 'francois@example.com', '1987-11-08', 'PasswordFrancois', 'francois.jpg', 2),
(7, 1, 'festin', 'bryan', 'banana', NULL, 'banana@gmail.com', '2024-01-19', '$2y$10$fRgExivPbTmfhp6EbrJ74uLPOOBoXc.Y4DmBrsQq/djs4kqN8SHfC', NULL, 1),
(8, 1, 'Provoke', 'Sora', 'Sora', NULL, 'Sora@mail.fr', '2024-01-01', '$2y$10$oltFxpDRo.Pf14uGgtf.kew.GG8yB1uyGrA52NRt0jPig80ECo5p6', NULL, 1),
(10, 1, 'Berkani', 'Nassim', 'sora', NULL, 'nassim@mail.fr', '1998-10-10', '$2y$10$tIyEOGMJNv5SXbDC2ErDC.9pihvUvjC2gEknzlqsSv00LVx07kCzS', NULL, 1),
(20, 1, 'dfsfs', 'zaea', 'sfdsfsq', NULL, 'jsp@mail.fr', '2020-01-10', '$2y$10$RK0klDVOYANIsNnE4xlf2OxjOS5N8j.vct.cqGo3cwDW3SUQ3R1IO', NULL, 1),
(21, 1, 'dfsfs', 'bryan', 'banana', NULL, 'azavfds@gmail.com', '1998-10-10', '$2y$10$/wSppWDH1qgn4pGHKgzlPudPu5FVRT7GmfF4KHHCosl4beWLQ66sC', NULL, 1),
(22, 1, 'test', 'test', 'supertest', NULL, 'test@test.fr', '1998-10-10', '$2y$10$vpmBRSm1BZqWiFX6wctcVOG5Z5J4xDLwhXLoEsWTRPZFHvVpYvsoy', NULL, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprise` (`enterprise_id`);

--
-- Contraintes pour la table `ride`
--
ALTER TABLE `ride`
  ADD CONSTRAINT `ride_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userprofil` (`user_id`),
  ADD CONSTRAINT `ride_ibfk_2` FOREIGN KEY (`transport_id`) REFERENCES `transport` (`transport_id`);

--
-- Contraintes pour la table `transport_pris_en_compte`
--
ALTER TABLE `transport_pris_en_compte`
  ADD CONSTRAINT `transport_pris_en_compte_ibfk_1` FOREIGN KEY (`events_id`) REFERENCES `events` (`events_id`),
  ADD CONSTRAINT `transport_pris_en_compte_ibfk_2` FOREIGN KEY (`transport_id`) REFERENCES `transport` (`transport_id`);

--
-- Contraintes pour la table `userprofil`
--
ALTER TABLE `userprofil`
  ADD CONSTRAINT `userprofil_ibfk_1` FOREIGN KEY (`enterprise_id`) REFERENCES `enterprise` (`enterprise_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
