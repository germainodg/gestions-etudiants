-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 20 mai 2022 à 17:37
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ufr_sds`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`nom`, `prenom`, `email`, `password`) VALUES
('adabou', 'barnabas', 'adabou@gmail.com', '48058e0c99bf7d689ce71c360699a14ce2f99774'),
('mande', 'aida', 'aida@gmail.com', 'ba46b93b2d133065a9b1a5288bbfbfd66ff46c6c'),
('adabou', 'barnabas', 'bande@gmail.com', '48058e0c99bf7d689ce71c360699a14ce2f99774'),
('zotaba', 'ellie', 'ellie@gmail.com', 'b1285d4b43914cc9980ff65d3f54031d0f908e72'),
('dfghtsrbsrgb', 'rbdtndb', 'germainouedra@gmail.com', '6d1270b059e6137ec41ef691abd46e1c01a3a0f5'),
('Gnoumou', 'Larissa', 'gnoumlari@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('kabore', 'ives', 'ives@gmail.com', 'c984aed014aec7623a54f0591da07a85fd4b762d'),
('rosse', 'laure', 'laure@gmail.com', '39dfa55283318d31afe5a3ff4a0e3253e2045e43'),
('Odg', 'Luc', 'luc@gmail.com', '5158c8b272d43cdbc79f34159fbf4c8968028e96'),
('mouss', 'mohamed', 'maha@gmail.com', '57ca2dad17817a05249a192cc18ef326772df0d4'),
('zore', 'yacouba', 'yacouba@gmail.com', '5ce36c162c75a64662ec63f57064ab560eafee04');

-- --------------------------------------------------------

--
-- Structure de la table `authenfication`
--

CREATE TABLE `authenfication` (
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `authenfication`
--

INSERT INTO `authenfication` (`email`, `password`) VALUES
('ellie@gmail.com', 'b1285d4b43914cc9980ff65d3f54031d0f908e72'),
('luc@gmail.com', '1966e694bad90686516f99cdf432800fdca39290'),
('maha@gmail.com', 'dc4dd44d3465997a4a04fd070df0bf24b75f9cff');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `tuteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`nom`, `prenom`, `date_de_naissance`, `email`, `tuteur`) VALUES
('jack', 'jeanne', '1990-01-15', 'jack@gmail.com', 5),
('baboura', 'marc', '1998-12-10', 'marc@gmail.com', 1),
('baboura', 'marcus', '1998-12-10', 'marcus@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

CREATE TABLE `liste` (
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `email` varchar(250) NOT NULL,
  `tuteur` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tuteur`
--

CREATE TABLE `tuteur` (
  `id` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `numero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tuteur`
--

INSERT INTO `tuteur` (`id`, `Nom`, `Prenom`, `numero`) VALUES
(1, 'Gnoumou', 'Larissa', '70000000'),
(2, 'Gnoumou', 'Larissa', '70000000'),
(3, 'sankara', 'Alima', '50505050'),
(4, 'kabore', 'souley', '50520588'),
(5, 'kabore', 'norbert', '58565854'),
(6, 'tao', 'tapha', '60606060');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `authenfication`
--
ALTER TABLE `authenfication`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`email`),
  ADD KEY `tuteur` (`tuteur`),
  ADD KEY `tuteur_2` (`tuteur`);

--
-- Index pour la table `liste`
--
ALTER TABLE `liste`
  ADD PRIMARY KEY (`tuteur`);

--
-- Index pour la table `tuteur`
--
ALTER TABLE `tuteur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tuteur`
--
ALTER TABLE `tuteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`tuteur`) REFERENCES `tuteur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
