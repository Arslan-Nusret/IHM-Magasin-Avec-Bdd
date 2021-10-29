-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 29 oct. 2021 à 14:13
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `magasins`
--

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

CREATE TABLE `carte` (
  `id_carte` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carte`
--

INSERT INTO `carte` (`id_carte`, `point`, `code`) VALUES
(1, 100, 'F2061022K50356T6\r\n'),
(2, 150, '671840028\r\n'),
(3, 75, '998520872409'),
(5, 10, 'Ae1815RT0');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
(1, 'boissons'),
(2, 'nourritures'),
(3, 'informatiqueNumerique'),
(4, 'fruitsLegumes'),
(6, 'Meubles'),
(7, 'Pharmacie');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `id_carte` int(255) NOT NULL,
  `Nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `id_carte`, `Nom`) VALUES
(1, 1, 'Caissière(ano)'),
(2, 2, 'Arthur'),
(3, 3, 'Younes'),
(5, 5, 'Marc');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `id_panier` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `total_ht` float NOT NULL,
  `total_ttc` float NOT NULL,
  `total_point` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `achats` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pivot_produit_panier`
--

CREATE TABLE `pivot_produit_panier` (
  `id_panier` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `code_barre` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `poids` float NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix_ht` float NOT NULL,
  `remise` int(11) NOT NULL,
  `id_taux` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `id_categorie`, `code_barre`, `nom`, `poids`, `quantite`, `prix_ht`, `remise`, `id_taux`) VALUES
(1, 2, '3021760405451', 'Pom\'potes', 0.09, 99, 0.82, 10, 3),
(2, 2, '3083680613583', 'Cassegrain (Haricots Blanc Préparés)', 0.45, 99, 1.27, 30, 3),
(3, 1, '3254380004821', 'Cristaline (75cl)', 0.75, 99, 0.5, 0, 3),
(4, 3, '6935364021269', 'tp-link switch 16ports', 2.15, 99, 49.99, 0, 1),
(5, 3, '545151512526', 'Osciloscope', 3.45, 99, 1780, 0, 1),
(10, 1, '3228881033666', 'Lipton thé vert orient (tchaé)', 0.35, 99, 1.46, 5, 3),
(11, 4, '123456789012', 'Fraise (500g)', 0.5, 50, 5.42, 0, 1),
(12, 4, '846321352332', 'pomme de terre (1kg)', 1, 99, 1.21, 0, 1),
(13, 4, '3268840001008', 'tomate (1kg)', 1, 99, 1.92, 0, 1),
(14, 6, '3336971805045', 'Chaise de bureau', 7, 4, 100, 10, 1),
(15, 7, '74461986312', 'Masque (paquet de 100)', 0.1, 12, 10.92, 0, 4);

-- --------------------------------------------------------

--
-- Structure de la table `tva`
--

CREATE TABLE `tva` (
  `id` int(11) NOT NULL,
  `taux` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tva`
--

INSERT INTO `tva` (`id`, `taux`) VALUES
(1, 20),
(2, 11),
(3, 5.5),
(4, 2.1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `carte`
--
ALTER TABLE `carte`
  ADD PRIMARY KEY (`id_carte`),
  ADD UNIQUE KEY `id_carte` (`id_carte`),
  ADD UNIQUE KEY `id_carte_2` (`id_carte`),
  ADD UNIQUE KEY `id_carte_3` (`id_carte`),
  ADD KEY `id_carte_4` (`id_carte`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carte` (`id_carte`),
  ADD KEY `id_carte_2` (`id_carte`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_panier` (`id_panier`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `pivot_produit_panier`
--
ALTER TABLE `pivot_produit_panier`
  ADD KEY `id_panier` (`id_panier`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_taux` (`id_taux`);

--
-- Index pour la table `tva`
--
ALTER TABLE `tva`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `carte`
--
ALTER TABLE `carte`
  MODIFY `id_carte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `tva`
--
ALTER TABLE `tva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`id_carte`) REFERENCES `carte` (`id_carte`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `pivot_produit_panier`
--
ALTER TABLE `pivot_produit_panier`
  ADD CONSTRAINT `pivot_produit_panier_ibfk_1` FOREIGN KEY (`id_panier`) REFERENCES `panier` (`id_panier`),
  ADD CONSTRAINT `pivot_produit_panier_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_taux`) REFERENCES `tva` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
