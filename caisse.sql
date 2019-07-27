-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 25 avr. 2019 à 12:53
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `caisse_kasserine_caisse`
--

-- --------------------------------------------------------

--
-- Structure de la table `caisse_kasserine_admin`
--

CREATE TABLE `caisse_kasserine_admin` (
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `caisse_kasserine_admin`
--

INSERT INTO `caisse_kasserine_admin` (`username`, `password`) VALUES
('admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Structure de la table `caisse_kasserine_caissee`
--

CREATE TABLE `caisse_kasserine_caissee` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `type` text NOT NULL,
  `montant` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `caisse_kasserine_caissee`
--

INSERT INTO `caisse_kasserine_caissee` (`id`, `libelle`, `type`, `montant`, `date`, `heure`) VALUES
(4, 'fdsfds', 'sortie', 1222, '2019-04-21', '00:00:00'),
(5, 'jke', 'entre', 2, '2019-04-21', '00:00:00'),
(6, 'hjsd', 'entre', 1, '2019-04-21', '22:29:34'),
(7, 'gfd', 'entre', 333, '2019-04-21', '23:05:02'),
(8, 'fdsfds', 'entre', 1, '2019-04-21', '23:07:55'),
(11, 'jdsdd', 'entre', 800, '2019-04-22', '09:41:56'),
(12, 'fdsfds', 'entre', 11, '2019-04-22', '11:43:57');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `caisse_kasserine_caissee`
--
ALTER TABLE `caisse_kasserine_caissee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `caissee`
--
ALTER TABLE `caisse_kasserine_caissee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
