-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 20 sep. 2018 à 20:15
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `pass` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `pseudo`, `pass`) VALUES
(1, 'rolandos', '1234'),
(2, 'doctor', '4324');

-- --------------------------------------------------------

--
-- Structure de la table `categorielivre`
--

CREATE TABLE `categorielivre` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `categorielivre`
--

INSERT INTO `categorielivre` (`id`, `nom`) VALUES
(1, 'Sciences'),
(3, 'Roman'),
(4, 'Fiction'),
(5, 'Litterature');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id` int(11) NOT NULL,
  `dateEmprunt` datetime NOT NULL,
  `idReservation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id`, `dateEmprunt`, `idReservation`) VALUES
(1, '2018-09-18 18:26:10', 1),
(2, '2018-09-19 09:21:29', 3),
(3, '2018-09-20 10:23:25', 1),
(4, '2018-09-20 10:26:12', 6),
(5, '2018-09-20 10:27:30', 7),
(6, '2018-09-20 10:44:46', 9),
(7, '2018-09-20 10:45:18', 9),
(8, '2018-09-20 11:50:00', 9);

-- --------------------------------------------------------

--
-- Structure de la table `historiqueemprunt`
--

CREATE TABLE `historiqueemprunt` (
  `id` int(11) NOT NULL,
  `dateEmprunt` datetime NOT NULL,
  `dateRetour` datetime NOT NULL,
  `idReservation` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `historiqueemprunt`
--

INSERT INTO `historiqueemprunt` (`id`, `dateEmprunt`, `dateRetour`, `idReservation`) VALUES
(1, '2018-08-16 08:34:12', '2018-08-16 08:35:28', 1),
(2, '2018-08-24 16:09:24', '2018-08-24 16:09:51', 2);

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `code` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `titre` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `auteur` varchar(40) COLLATE utf8mb4_bin NOT NULL,
  `edit` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `descript` text COLLATE utf8mb4_bin NOT NULL,
  `nombExplaire` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`code`, `titre`, `auteur`, `edit`, `idCategorie`, `descript`, `nombExplaire`) VALUES
('R1', 'Les soleils des independances', 'Amadou Kourouma', 'calas', 3, 'Ce livre parles du temps colonial des colonies Africaines.', 8),
('R2', 'Le mariage de Figaro', 'Pierre Beaumarchais', 'calas', 3, 'Ce livre parle du mariage du jeune garçon dans un petit village.', 9),
('R4', 'Le respect des morts suivit', 'Amadou Kone', 'edicef', 3, 'Ce livre parle du respect des morts en Afrique et des cultes qui sont fait en leur memoire.', 9),
('R5', 'Tu as le drit de reussir', 'GBASSAKPO Komlan', 'edicef', 3, 'Ce livre parle de la capacité à reussir.', 10),
('L1', 'Lumieres sonores', 'AGBODJAN Jemima', 'Au coeur du silence', 5, 'Ce livre est subdivise en plusieurs chapitres qui parlent de beaucoup de choses.', 7),
('L2', 'Les trompettes de Jericho', 'KOFFIGOH Joseph', 'Graines de Pensees', 5, 'Ce livre parle de la trompette de jerihco.', 10),
('L3', 'Libations', 'KOFFIGOH Joseph', 'CONTINENTS', 5, 'Livre de poesie subdivise en plusieurs chapitres.', 10),
('L4', 'La passion des eperviers', 'KOFFIGOH Joseph', 'CONTINENTS', 5, 'Livre de poésie subdivise en plusieurs chapitres.', 9),
('L5', 'La secretaire parfaite', 'Jean PLIYA', 'CLE', 5, 'Ce livre parle de la premiere journee de travail de la secretaire. ', 10),
('S1', 'Durandeau', 'BOTCHO Donatien', 'CLE', 1, 'Livre de sciences physiques.', 10),
('S2', 'CIAM', 'Lope TEGUI', 'CONTINENTS', 1, 'Livre de mathemetiques.', 10),
('S3', 'Oxigiene', 'NOUTCHET John', 'CONTINENTS', 1, 'Livre de sciences naturelles.', 10);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idReservation` int(11) NOT NULL,
  `dateReservation` datetime NOT NULL,
  `userName` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `userSurname` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `codeLivre` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `titreLivre` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `dateReservation`, `userName`, `userSurname`, `codeLivre`, `titreLivre`) VALUES
(3, '2018-08-24 16:10:23', 'KONDE', 'Barnabé', 'L4', 'La passion des eperviers'),
(6, '2018-09-20 10:25:53', 'KETOGLO', 'Komivi', 'R2', 'Le mariage de Figaro'),
(7, '2018-09-20 10:27:22', 'KETOGLO', 'Komivi', 'R4', 'Le respect des morts suivit'),
(8, '2018-09-20 10:40:18', 'KETOGLO', 'Komivi', 'L1', 'Lumieres sonores'),
(9, '2018-09-20 10:44:37', 'KETOGLO', 'Komivi', 'L1', 'Lumieres sonores');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `matricule` int(7) NOT NULL,
  `pseudo` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `birthday`, `sexe`, `matricule`, `pseudo`) VALUES
(1, 'EYESSI', 'Kokou', '1997-05-21', 'M', 1997, NULL),
(2, 'KETOGLO', 'Komivi', '1995-05-13', 'M', 1995, 'boss'),
(3, 'KONDE', 'Barnabé', '2001-06-11', 'M', 2001, 'barnafuck');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorielivre`
--
ALTER TABLE `categorielivre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `historiqueemprunt`
--
ALTER TABLE `historiqueemprunt`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idReservation`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categorielivre`
--
ALTER TABLE `categorielivre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `emprunt`
--
ALTER TABLE `emprunt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `historiqueemprunt`
--
ALTER TABLE `historiqueemprunt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
