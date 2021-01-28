-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 28 jan. 2021 à 08:29
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `1921sio`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `date_com` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `id_client`, `commentaire`, `date_com`) VALUES
(1, 24, 'Bonjour, très satisfait du service. Petit problème d\'installation, un technicien est venu dans l\'heure pour me dépanner.  ', '2020-06-18'),
(2, 21, 'Produit super bien fini, super qualité photo et prix abordable ! je conseil :)', '2020-06-02');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id` int(11) NOT NULL,
  `idResa` int(11) NOT NULL,
  `dateResa` datetime NOT NULL,
  `totalHT` float NOT NULL,
  `totalTTC` float NOT NULL,
  `solde` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `idResa`, `dateResa`, `totalHT`, `totalTTC`, `solde`) VALUES
(1, 1, '2020-09-23 13:17:00', 129.99, 149.99, 0);

-- --------------------------------------------------------

--
-- Structure de la table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `id_borne` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Etat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `maintenance`
--

INSERT INTO `maintenance` (`id`, `id_borne`, `Name`, `Etat`) VALUES
(1, 17, 'Borne anniversaire', 'maintenance'),
(2, 3, 'Borne basic bleu', 'disponible'),
(3, 6, 'Borne basic jaune', 'maintenance'),
(4, 4, 'borne basic rose', 'disponible'),
(5, 16, 'Borne personnalisable ', 'disponible'),
(6, 18, 'borne pour entreprise', 'maintenance');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `quantité` int(11) NOT NULL,
  `codepromo` varchar(15) NOT NULL DEFAULT 'promo-2020',
  `lienimage` varchar(1000) NOT NULL,
  `categorie` varchar(25) NOT NULL,
  `etat` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantité`, `codepromo`, `lienimage`, `categorie`, `etat`) VALUES
(1, 'Borne noir', 'La borne noire qu\'on vous propose est une borne premium, elle se confond avec votre chez vous et reste très discrète mais attire tous vos invités. Choptaphoto vous propose deux coloris : un rouge éclatant pour un mariage ou une fête d\'anniversaire ou ce noir pour les séminaires ou des portes ouvertes.', 149.99, 1, 'promo-2020', 'http://localhost/1-efficom/CHOPTAPHOTO/img/born2.png', 'borne', NULL),
(2, 'Borne rouge', 'La borne rouge qu\'on vous propose est une borne premium, elle se confond avec votre chez vous et reste très discrète mais attire tous vos invités. Choptaphoto vous propose deux coloris : un rouge éclatant pour un mariage ou une fête d\'anniversaire ou ce noir pour les séminaires ou des portes ouvertes.', 149.99, 1, 'promo-2020', 'http://localhost/1-efficom/CHOPTAPHOTO/img/360x360-rose.png', 'borne', NULL),
(3, 'Borne basic bleu', 'La borne bleue qu\'on vous propose attire tous vos invités avec sa couleur pétante. Choptaphoto vous propose quatre colories : une borne rose, jaune ou bleu éclatante pour un mariage ou une fête d\'anniversaire ou un blanc cassé pour des événements plus professionnels comme un séminaire ou des portes ouvertes !', 99.99, 1, 'promo-2020', 'http://localhost/1-efficom/CHOPTAPHOTO/img/bornbleu.png', 'borne', NULL),
(4, 'borne basic rose', 'La borne rose qu\'on vous propose attire tous vos invités avec sa couleur pétante. Choptaphoto vous propose quatre colories : une borne rose, jaune ou bleu éclatante pour un mariage ou une fête d\'anniversaire ou un blanc cassé pour des événements plus professionnels comme un séminaire ou des portes ouvertes !', 99.99, 1, 'promo-2020', 'http://localhost/1-efficom/CHOPTAPHOTO/img/bornviolet.png', 'borne', NULL),
(5, 'Bornes basic blanche', 'La borne blanche qu\'on vous propose attire tous vos invités avec sa couleur pétante. Choptaphoto vous propose quatre colories : une borne rose, jaune ou bleu éclatante pour un mariage ou une fête d\'anniversaire ou un blanc cassé pour des événements plus professionnels comme un séminaire ou des portes ouvertes !', 99.99, 1, 'promo-2020', 'http://localhost/1-efficom/CHOPTAPHOTO/img/bornblanche.png', 'borne', NULL),
(6, 'Borne basic jaune', 'La borne jaune qu\'on vous propose attire tous vos invités avec sa couleur pétante. Choptaphoto vous propose quatre colories : une borne rose, jaune ou bleu éclatante pour un mariage ou une fête d\'anniversaire ou un blanc cassé pour des événements plus professionnels comme un séminaire ou des portes ouvertes !', 99.99, 1, 'promo-2020', 'http://localhost/1-efficom/CHOPTAPHOTO/img/bornjaune.png', 'borne', NULL),
(9, 'Lot de 200 photos', 'Choptaphoto vous propose ce pack photos de 200 pièces, en dimension 10x10 ou 12.7x12.7.', 29.99, 10000, 'promo-2020', 'http://localhost/1-efficom/CHOPTAPHOTO/img/IMPRESSIONPHOTOACCEUIL.png', 'impression', NULL),
(10, 'Lot de 400 photos', 'Choptaphoto vous propose ce pack photos de 400 pièces, en dimension 10x10 ou 12.7x12.7.', 59.99, 10000, 'promo-2020', 'http://localhost/1-efficom/CHOPTAPHOTO/img/impression%20photo.jpg', 'impression', NULL),
(11, 'photos en illimité', 'Choptaphoto vous propose ce pack photos illimité, en dimension 10x10 ou 12.7x12.7.', 149.99, 10000, 'promo-2020', 'http://localhost/1-efficom/CHOPTAPHOTO/img/impression%20photo4.jpg', 'impression', NULL),
(12, 'Premium format 10', 'Choptaphoto vous propose ce type de format photos en dimension 10x10 ou 12.7x12.7.', 0.7, 10000, 'promo-2020', 'http://localhost/1-efficom/CHOPTAPHOTO/img/impression%20photo5.jpg', 'impression', NULL),
(13, 'Premium format 13', 'Choptaphoto vous propose ce pack photos de 200 pièces, en dimension 10x10.', 1, 10000, 'promo-2020', 'http://localhost/1-efficom/CHOPTAPHOTO/img/impression-photo.png', 'impression', NULL),
(14, 'Format rétro', 'Choptaphoto vous propose ce pack photos de 200 pièces, en dimension 9.2×10.2 cm.', 1.5, 10000, 'promo-2020', 'http://localhost/1-efficom/CHOPTAPHOTO/img/impression%20photo6.jpg', 'impression', NULL),
(16, 'Borne personnalisable ', 'Cette borne personnalisable qu\'on vous propose est une borne premium, elle est destinée aux entreprises qui souhaitent mettre le logo pendant un evénement ! elle est personnalisable de la tete au pied !', 199.99, 1, 'promo-2020', 'http://localhost/1-efficom/CHOPTAPHOTO/img/bornreseaux.png', 'borne', NULL),
(17, 'Borne anniversaire', 'Cette borne anniversaire qu\'on vous propose est une borne premium, elle est destinée aux particuliers qui souhaitent fêter leur jour d\'anniversaire et garder des milliers de souvenirs avec leurs invités ! elle est personnalisable de la tete au pied !', 199.99, 1, 'promo-2020', 'http://localhost/1-efficom/CHOPTAPHOTO/img/bornannivsilv.png', 'borne', NULL),
(18, 'borne pour entreprise', 'Cette borne personnalisable qu\'on vous propose est une borne premium, elle est destinée aux entreprises qui souhaitent mettre le logo pendant un événement ! elle est personnalisable de la tête au pied !', 199.99, 1, 'promo-2020', 'http://localhost/1-efficom/CHOPTAPHOTO/img/bornefficom.png', 'borne', NULL),
(20, 'Poster', 'choisissez votre image au payement', 10, 10000, 'promo-2020', 'http://localhost/1-efficom/CHOPTAPHOTO/img/posterr.png', 'impression', NULL),
(30, 'borne test', 'test', 10, 1, 'promo-2020', '', 'borne', 'maintenance');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `idBorne` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `idBorne`, `idClient`, `debut`, `fin`) VALUES
(1, 5, 24, '2020-09-10', '2020-09-15'),
(3, 2, 21, '2021-01-15', '2021-01-17'),
(4, 1, 21, '2021-02-05', '2021-02-07');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `age` date NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'client',
  `civilité` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `age`, `adresse`, `ville`, `login`, `passwd`, `role`, `civilité`) VALUES
(21, 'MAHIEU', 'Silvère', '2000-01-01', '20 Allée des bonnes notes', 'Wervicq-sud', 'chop@admin.fr', '21232f297a57a5a743894a0e4a801fc3', 'administrateur', ''),
(24, 'VANDERPLANCKE', 'Benoît', '2000-01-01', '20 Allée des bonnes notes', 'Wervicq-sud', 'chop@client.fr', '62608e08adc29a8d6dbc9754e659f125', 'client', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_client` (`id_client`),
  ADD KEY `id_client_2` (`id_client`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idResa` (`idResa`);

--
-- Index pour la table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`,`id_borne`),
  ADD KEY `Name` (`Name`),
  ADD KEY `id_borne` (`id_borne`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idBorne` (`idBorne`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idBorne_2` (`idBorne`),
  ADD KEY `idClient_2` (`idClient`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`idResa`) REFERENCES `reservation` (`id`);

--
-- Contraintes pour la table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `maintenance_ibfk_2` FOREIGN KEY (`Name`) REFERENCES `products` (`name`),
  ADD CONSTRAINT `maintenance_ibfk_3` FOREIGN KEY (`id_borne`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idBorne`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
