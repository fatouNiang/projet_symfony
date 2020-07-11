-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 11 juil. 2020 à 21:20
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `allocation_chambre`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id` int(11) NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_bat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id`, `numero`, `numero_bat`, `type`) VALUES
(16, 'batA-0000', 'batA', 'individuel'),
(17, 'batA-0001', 'batA', 'individuel'),
(18, 'batA-0002', 'batA', 'individuel'),
(19, 'batA-0003', 'batA', 'individuel'),
(20, 'batB-0004', 'batB', 'Adeux'),
(21, 'batB-0005', 'batB', 'Adeux'),
(22, 'batB-0006', 'batB', 'Adeux'),
(23, 'batB-0007', 'batB', 'Adeux'),
(24, 'batB-0008', 'batB', 'Adeux'),
(25, 'batC-0009', 'batC', 'individuel'),
(26, 'batC-0010', 'batC', 'Adeux'),
(27, 'batC-0011', 'batC', 'individuel');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20200703221248', '2020-07-04 00:43:04', 136),
('DoctrineMigrations\\Version20200706113835', '2020-07-06 13:39:19', 106),
('DoctrineMigrations\\Version20200706181547', '2020-07-06 20:16:20', 466),
('DoctrineMigrations\\Version20200708124952', '2020-07-08 14:51:26', 132);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `date_naiss` date NOT NULL,
  `type_etudiant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chambre_id` int(11) DEFAULT NULL,
  `bourse` int(11) DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `matricule`, `nom`, `prenom`, `email`, `telephone`, `date_naiss`, `type_etudiant`, `chambre_id`, `bourse`, `adresse`, `departement`) VALUES
(14, '1997NIOU0000', 'Niang', 'Fatou', 'fatou04.niang@gmail.com', 779184216, '1997-04-11', 'boursierLoge', 16, 40000, NULL, 'maketing'),
(15, '1993NIAR0001', 'Niang', 'Mactar', 'niang-makhou@gmail.com', 772543216, '1993-03-11', 'boursierNonLoge', 16, 40000, NULL, 'maketing'),
(16, '1993SARA0002', 'Sarr', 'Coura', 'sarrCoura@fatima.com', 772902752, '1993-02-18', 'Nonboursier', 16, 20000, 'Keur Massar', 'programmation'),
(17, '1995DIIB0003', 'Diop', 'Mouhamadou Habib', 'mhd@exemple.com', 771345417, '1995-02-19', 'boursierNonLoge', 16, 40000, NULL, 'geographie'),
(18, '2020LOTA0004', 'Lo', 'Aminata', 'Amina@gmail.com', 775674308, '2020-06-29', 'boursierLoge', 16, 20000, NULL, 'programmation'),
(19, '2020NDNE0005', 'ndiaye', 'Rahmane', 'Rahmane@gmail.com', 778654321, '2020-07-11', 'boursierNonLoge', 16, 20000, NULL, 'programmation');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_717E22E39B177F54` (`chambre_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_717E22E39B177F54` FOREIGN KEY (`chambre_id`) REFERENCES `chambre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
