-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 11 oct. 2019 à 14:29
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `centreformation`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(6, 'eya', 'bentali@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uniq_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `uniq_id`, `email`, `date_naissance`, `lieu_naissance`, `adresse`, `telephone`, `niveau`, `note`, `image`) VALUES
(1, 'eya', 'ben ali', '88888', 'aa.aa@a.aa', '1990-02-06', 'Dar Chaabane', 'Rue testt', '22766388', 'niv', 'longue note', NULL),
(18, 'Eya', 'ben ali', '1234', 'resa@tunisie-location.net', '2019-09-24', 'nabeul', 'iojdioh', '56987454', 'b', '23', 'd9fef612c61d030ab2e81419160060e0.jpeg'),
(21, 'test', 'etu1', '1234', 'kacemrayen13@gmail.com', '1997-10-03', '', 'korba', '23342349', '', '', NULL),
(23, 'kacem', 'rayen', '5687', 'kacemrayen13@gmail.com', '1998-10-08', 'nabeul', 'nabeul', '56987454', '', '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants_formation`
--

CREATE TABLE `etudiants_formation` (
  `etudiant_formation_id` int(20) NOT NULL,
  `formation` int(11) DEFAULT NULL,
  `etudiant` int(11) DEFAULT NULL,
  `paye` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'NULL',
  `montant` double NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `etudiants_formation`
--

INSERT INTO `etudiants_formation` (`etudiant_formation_id`, `formation`, `etudiant`, `paye`, `montant`, `date`) VALUES
(1, 54, 1, 'Non payé', 0, '2019-10-09'),
(2, 54, 18, 'Non payé', 0, '2019-09-02'),
(3, 54, 21, 'Non payé', 0, '2019-10-16'),
(4, 54, 23, 'Non payé', 0, '2019-10-22'),
(5, 55, 1, 'payé', 500, '2019-09-18'),
(6, 55, 18, 'payé', 600, '2019-09-20'),
(7, 55, 21, 'payé', 650, '2019-09-18'),
(8, 58, 1, 'payé', 300, '2019-10-11'),
(9, 58, 18, 'payé', 500.3, '2019-10-11'),
(10, 58, 23, 'Non payé', 0, '2019-10-11'),
(11, 59, 1, 'Non payé', 0, '2019-10-11'),
(12, 59, 18, 'Non payé', 0, '2019-10-11'),
(13, 59, 23, 'Non payé', 0, '2019-10-11'),
(14, 60, 1, 'payé', 200, '2019-10-11'),
(15, 60, 21, 'Non payé', 0, '2019-10-11');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant_formation`
--

CREATE TABLE `etudiant_formation` (
  `etudiant_formation_id` int(11) NOT NULL,
  `formation` int(11) DEFAULT NULL,
  `etudiant` int(11) DEFAULT NULL,
  `paye` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `montant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` bigint(20) NOT NULL,
  `date_evaluation` date NOT NULL,
  `formation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `evaluations`
--

INSERT INTO `evaluations` (`id`, `date_evaluation`, `formation`) VALUES
(1, '2019-11-07', 46),
(2, '2019-11-06', 51),
(3, '2019-10-16', 42),
(7, '2019-11-04', 52),
(9, '2019-10-31', 54),
(10, '2019-10-25', 55),
(11, '2019-10-18', 56),
(12, '2019-10-25', 57),
(13, '2019-11-06', 58),
(14, '2019-10-25', 59),
(15, '2019-10-19', 60);

-- --------------------------------------------------------

--
-- Structure de la table `evaluation_document`
--

CREATE TABLE `evaluation_document` (
  `id` bigint(20) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chemin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `formation` int(11) DEFAULT NULL,
  `evaluation` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `evaluation_document`
--

INSERT INTO `evaluation_document` (`id`, `nom`, `chemin`, `formation`, `evaluation`) VALUES
(3, 'font-icons (1).woff', '98e501dfb73e40c18788c56a66d8ead1.bin', 52, 7),
(4, 'font-icons.woff', 'f9a4552b1b470b50504027c6c49f9505.bin', 52, 7),
(5, 'font-icons (1).woff', '5331e5c86040a7c58413731ea0df6e24.bin', 55, 10),
(6, 'font-icons.woff', '4d5d434848742c8a78e1cd42da6994a4.bin', 55, 10),
(7, 'logo.ibs (1).jpg', 'fb30addabf751d6e85541fc6a6e4b042.jpeg', 59, 14),
(8, 'logo.ibs.jpg', '2c4df7a4b2b4bd230ca0bf201d3af588.jpeg', 59, 14),
(9, 'logo.ibs (1).jpg', '81d7e660d8a0b2ccbd22437484316882.jpeg', 60, 15),
(10, 'logo.ibs (2).jpg', 'aad437ee5319c52228759d171618835e.jpeg', 60, 15);

-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

CREATE TABLE `formateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uniq_id` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formateur`
--

INSERT INTO `formateur` (`id`, `nom`, `prenom`, `uniq_id`, `email`, `telephone`) VALUES
(1, 'SETHOM', 'Ahmed Amin', 6449021, 'ahmedamin.seth@yahoo.fr', '22766388');

-- --------------------------------------------------------

--
-- Structure de la table `formateur_matiere`
--

CREATE TABLE `formateur_matiere` (
  `formateur` int(11) NOT NULL,
  `matiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `salle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_suppression` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `nom`, `date_debut`, `date_fin`, `salle`, `date_suppression`) VALUES
(37, 'formation web', '2019-10-07', '2019-11-16', 'ed23', '2019-10-10'),
(42, 'NEW', '2019-10-25', '2019-10-11', 'ed23', '2019-10-10'),
(45, 'test final', '2019-10-17', '2019-10-25', 'ed11', '2019-10-10'),
(46, 'database', '2019-10-10', '2019-10-24', 'ed11', '2019-10-10'),
(47, 'new one', '2019-10-11', '2019-10-25', 'ed21', '2019-10-10'),
(48, 'testFinal', '2019-10-17', '2019-10-25', 'ed23', '2019-10-10'),
(49, 'reseau', '2019-10-10', '2019-10-24', 'ed23', '2019-10-10'),
(50, 'new', '2019-10-11', '2019-10-24', 'ed23', '2019-10-10'),
(51, 'new', '2019-10-11', '2019-10-24', 'ed23', '2019-10-10'),
(52, 'test docs', '2019-10-14', '2019-10-28', 'ed23', '2019-10-10'),
(54, 'reseau', '2019-10-10', '2019-10-24', 'ed23', '2019-10-10'),
(55, 'reseau', '2019-10-11', '2019-10-17', 'ed23', NULL),
(56, 'formation', '2019-09-12', '2019-09-19', 'ed23', NULL),
(57, 'test', '2019-10-09', '2019-10-17', 'ed23', NULL),
(58, 'test date', '2019-10-25', '2019-11-02', 'ed23', '2019-10-11'),
(59, 'security', '2019-09-24', '2019-10-17', 'ed23', NULL),
(60, 'test', '2019-10-10', '2019-10-15', 'ed23', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `formation_formateur`
--

CREATE TABLE `formation_formateur` (
  `formation` int(11) NOT NULL,
  `formateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation_formateur`
--

INSERT INTO `formation_formateur` (`formation`, `formateur`) VALUES
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(54, 1),
(55, 1),
(58, 1),
(59, 1),
(60, 1);

-- --------------------------------------------------------

--
-- Structure de la table `formation_matiere`
--

CREATE TABLE `formation_matiere` (
  `formation` int(11) NOT NULL,
  `matiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation_matiere`
--

INSERT INTO `formation_matiere` (`formation`, `matiere`) VALUES
(37, 1),
(37, 3),
(37, 4),
(42, 1),
(42, 3),
(42, 4),
(45, 1),
(45, 3),
(45, 4),
(46, 1),
(46, 3),
(46, 4),
(47, 1),
(47, 3),
(47, 4),
(48, 1),
(48, 3),
(48, 4),
(49, 1),
(49, 3),
(49, 5),
(50, 1),
(50, 3),
(50, 4),
(51, 1),
(51, 6),
(52, 1),
(52, 4),
(54, 1),
(54, 4),
(55, 1),
(55, 4),
(58, 1),
(58, 4),
(59, 1),
(59, 3),
(59, 6),
(60, 1),
(60, 5);

-- --------------------------------------------------------

--
-- Structure de la table `listenote`
--

CREATE TABLE `listenote` (
  `id` bigint(20) NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `etudiant` int(11) DEFAULT NULL,
  `formation` int(11) DEFAULT NULL,
  `matiere` int(11) DEFAULT NULL,
  `document` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'NULL',
  `chemin` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `listenote`
--

INSERT INTO `listenote` (`id`, `note`, `etudiant`, `formation`, `matiere`, `document`, `chemin`) VALUES
(1, '12', 18, 55, 1, 'logo-ibs.jpg', 'cfc5db2a484fd62c1a092697ef92cb3f.jpeg'),
(2, '8', 18, 55, 4, 'logo-ibs.jpg', 'cfc5db2a484fd62c1a092697ef92cb3f.jpeg'),
(3, '12', 1, 55, 1, 'logo-ibs (1).jpg', 'c0915be11bfac6fded095041c00512b3.jpeg'),
(4, '8', 1, 55, 4, 'logo-ibs (1).jpg', 'c0915be11bfac6fded095041c00512b3.jpeg'),
(5, '12', 23, 59, 1, 'logo.ibs.jpg', 'a1ca7430a54719c50e0fed7f34781a01.jpeg'),
(6, '20', 23, 59, 3, 'logo.ibs (1).jpg', 'df4d042ab58e56e94d54b4a57fec9b11.jpeg'),
(7, '8', 23, 59, 6, 'logo.ibs (2).jpg', '2c1b0bab1b7e9c73c527689764acd5e0.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duree` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id`, `nom`, `duree`) VALUES
(1, 'symfony', NULL),
(3, 'javascipt', NULL),
(4, 'php', 3),
(5, 'java', 4),
(6, 'php', 3);

-- --------------------------------------------------------

--
-- Structure de la table `matiere_document`
--

CREATE TABLE `matiere_document` (
  `document_id` bigint(20) NOT NULL,
  `nom` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `chemin` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `matiere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matiere_formateur`
--

CREATE TABLE `matiere_formateur` (
  `matiere_formateur_id` int(11) NOT NULL,
  `matiere` int(11) DEFAULT NULL,
  `formateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiants_formation`
--
ALTER TABLE `etudiants_formation`
  ADD PRIMARY KEY (`etudiant_formation_id`),
  ADD KEY `formation_etudiants` (`formation`),
  ADD KEY `etudiants_formation` (`etudiant`);

--
-- Index pour la table `etudiant_formation`
--
ALTER TABLE `etudiant_formation`
  ADD PRIMARY KEY (`etudiant_formation_id`),
  ADD KEY `etudiant` (`etudiant`),
  ADD KEY `formation` (`formation`);

--
-- Index pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formation_evaluations` (`formation`);

--
-- Index pour la table `evaluation_document`
--
ALTER TABLE `evaluation_document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formation_document` (`formation`),
  ADD KEY `evaluations_document` (`evaluation`);

--
-- Index pour la table `formateur`
--
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formateur_matiere`
--
ALTER TABLE `formateur_matiere`
  ADD PRIMARY KEY (`formateur`,`matiere`),
  ADD KEY `IDX_A58920B2ED767E4F` (`formateur`),
  ADD KEY `IDX_A58920B29014574A` (`matiere`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formation_formateur`
--
ALTER TABLE `formation_formateur`
  ADD PRIMARY KEY (`formation`,`formateur`),
  ADD KEY `IDX_270B2E92404021BF` (`formation`),
  ADD KEY `IDX_270B2E92ED767E4F` (`formateur`);

--
-- Index pour la table `formation_matiere`
--
ALTER TABLE `formation_matiere`
  ADD PRIMARY KEY (`formation`,`matiere`),
  ADD KEY `IDX_D5EB1231404021BF` (`formation`),
  ADD KEY `IDX_D5EB12319014574A` (`matiere`);

--
-- Index pour la table `listenote`
--
ALTER TABLE `listenote`
  ADD PRIMARY KEY (`id`),
  ADD KEY `formation_note` (`formation`),
  ADD KEY `etudiant_note` (`etudiant`),
  ADD KEY `matiere_note` (`matiere`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matiere_document`
--
ALTER TABLE `matiere_document`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `matiere_document` (`matiere`);

--
-- Index pour la table `matiere_formateur`
--
ALTER TABLE `matiere_formateur`
  ADD PRIMARY KEY (`matiere_formateur_id`),
  ADD KEY `IDX_28782D69F46CD258` (`matiere`),
  ADD KEY `IDX_28782D69155D8F51` (`formateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `etudiants_formation`
--
ALTER TABLE `etudiants_formation`
  MODIFY `etudiant_formation_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `etudiant_formation`
--
ALTER TABLE `etudiant_formation`
  MODIFY `etudiant_formation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `evaluation_document`
--
ALTER TABLE `evaluation_document`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `formateur`
--
ALTER TABLE `formateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `listenote`
--
ALTER TABLE `listenote`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `matiere_document`
--
ALTER TABLE `matiere_document`
  MODIFY `document_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `matiere_formateur`
--
ALTER TABLE `matiere_formateur`
  MODIFY `matiere_formateur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiants_formation`
--
ALTER TABLE `etudiants_formation`
  ADD CONSTRAINT `FK_4FF5F2C8404021BF` FOREIGN KEY (`formation`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_4FF5F2C8717E22E3` FOREIGN KEY (`etudiant`) REFERENCES `etudiant` (`id`);

--
-- Contraintes pour la table `etudiant_formation`
--
ALTER TABLE `etudiant_formation`
  ADD CONSTRAINT `FK_8ECBC4C8404021BF` FOREIGN KEY (`formation`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_8ECBC4C8717E22E3` FOREIGN KEY (`etudiant`) REFERENCES `etudiant` (`id`);

--
-- Contraintes pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `FK_3B72691D404021BF` FOREIGN KEY (`formation`) REFERENCES `formation` (`id`);

--
-- Contraintes pour la table `evaluation_document`
--
ALTER TABLE `evaluation_document`
  ADD CONSTRAINT `FK_D527F3501323A575` FOREIGN KEY (`evaluation`) REFERENCES `evaluations` (`id`),
  ADD CONSTRAINT `FK_D527F350404021BF` FOREIGN KEY (`formation`) REFERENCES `formation` (`id`);

--
-- Contraintes pour la table `formateur_matiere`
--
ALTER TABLE `formateur_matiere`
  ADD CONSTRAINT `FK_A58920B2155D8F51` FOREIGN KEY (`formateur`) REFERENCES `formateur` (`id`),
  ADD CONSTRAINT `FK_A58920B2F46CD258` FOREIGN KEY (`matiere`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `formation_formateur`
--
ALTER TABLE `formation_formateur`
  ADD CONSTRAINT `FK_270B2E92404021BF` FOREIGN KEY (`formation`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_270B2E92ED767E4F` FOREIGN KEY (`formateur`) REFERENCES `formateur` (`id`);

--
-- Contraintes pour la table `formation_matiere`
--
ALTER TABLE `formation_matiere`
  ADD CONSTRAINT `FK_D5EB1231404021BF` FOREIGN KEY (`formation`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_D5EB1231F46CD258` FOREIGN KEY (`matiere`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `listenote`
--
ALTER TABLE `listenote`
  ADD CONSTRAINT `FK_61E285DA404021BF` FOREIGN KEY (`formation`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_61E285DA717E22E3` FOREIGN KEY (`etudiant`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `FK_61E285DA9014574A` FOREIGN KEY (`matiere`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `matiere_document`
--
ALTER TABLE `matiere_document`
  ADD CONSTRAINT `FK_6C0112CE9014574A` FOREIGN KEY (`matiere`) REFERENCES `matiere` (`id`);

--
-- Contraintes pour la table `matiere_formateur`
--
ALTER TABLE `matiere_formateur`
  ADD CONSTRAINT `FK_28782D69155D8F51` FOREIGN KEY (`formateur`) REFERENCES `formateur` (`id`),
  ADD CONSTRAINT `FK_28782D69F46CD258` FOREIGN KEY (`matiere`) REFERENCES `matiere` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
