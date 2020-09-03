-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 03 sep. 2020 à 16:15
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
CREATE DATABASE IF NOT EXISTS `1921sio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `1921sio`;

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
  `categorie` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantité`, `codepromo`, `lienimage`, `categorie`) VALUES
(1, 'Borne noir', 'La borne noire qu\'on vous propose est une borne premium, elle se confond avec votre chez vous et reste très discrète mais attire tous vos invités. Choptaphoto vous propose deux coloris : un rouge éclatant pour un mariage ou une fête d\'anniversaire ou ce noir pour les séminaires ou des portes ouvertes.', 149.99, 1, 'promo-2020', 'http://localhost/PPE/ChopTaPhoto-PPE2/img/born2.png', 'borne'),
(2, 'Borne rouge', 'La borne rouge qu\'on vous propose est une borne premium, elle se confond avec votre chez vous et reste très discrète mais attire tous vos invités. Choptaphoto vous propose deux coloris : un rouge éclatant pour un mariage ou une fête d\'anniversaire ou ce noir pour les séminaires ou des portes ouvertes.', 149.99, 1, 'promo-2020', 'http://localhost/PPE/ChopTaPhoto-PPE2/img/360x360-rose.png', 'borne'),
(3, 'Borne basic bleu', 'La borne bleue qu\'on vous propose attire tous vos invités avec sa couleur pétante. Choptaphoto vous propose quatre colories : une borne rose, jaune ou bleu éclatante pour un mariage ou une fête d\'anniversaire ou un blanc cassé pour des événements plus professionnels comme un séminaire ou des portes ouvertes !', 99.99, 1, 'promo-2020', 'http://localhost/PPE/ChopTaPhoto-PPE2/img/bornbleu.png', 'borne'),
(4, 'borne basic rose', 'La borne rose qu\'on vous propose attire tous vos invités avec sa couleur pétante. Choptaphoto vous propose quatre colories : une borne rose, jaune ou bleu éclatante pour un mariage ou une fête d\'anniversaire ou un blanc cassé pour des événements plus professionnels comme un séminaire ou des portes ouvertes !', 99.99, 1, 'promo-2020', 'http://localhost/PPE/ChopTaPhoto-PPE2/img/bornviolet.png', 'borne'),
(5, 'Bornes basic blanche', 'La borne blanche qu\'on vous propose attire tous vos invités avec sa couleur pétante. Choptaphoto vous propose quatre colories : une borne rose, jaune ou bleu éclatante pour un mariage ou une fête d\'anniversaire ou un blanc cassé pour des événements plus professionnels comme un séminaire ou des portes ouvertes !', 99.99, 1, 'promo-2020', 'http://localhost/PPE/ChopTaPhoto-PPE2/img/bornblanche.png', 'borne'),
(6, 'Borne basic jaune', 'La borne jaune qu\'on vous propose attire tous vos invités avec sa couleur pétante. Choptaphoto vous propose quatre colories : une borne rose, jaune ou bleu éclatante pour un mariage ou une fête d\'anniversaire ou un blanc cassé pour des événements plus professionnels comme un séminaire ou des portes ouvertes !', 99.99, 1, 'promo-2020', 'http://localhost/PPE/ChopTaPhoto-PPE2/img/bornjaune.png', 'borne'),
(9, 'Lot de 200 photos', 'Choptaphoto vous propose ce pack photos de 200 pièces, en dimension 10x10 ou 12.7x12.7.', 29.99, 10000, 'promo-2020', 'http://localhost/PPE/ChopTaPhoto-PPE2/img/IMPRESSIONPHOTOACCEUIL.png', 'impression'),
(10, 'Lot de 400 photos', 'Choptaphoto vous propose ce pack photos de 400 pièces, en dimension 10x10 ou 12.7x12.7.', 59.99, 10000, 'promo-2020', 'http://localhost/PPE/ChopTaPhoto-PPE2/img/impression%20photo.jpg', 'impression'),
(11, 'photos en illimité', 'Choptaphoto vous propose ce pack photos illimité, en dimension 10x10 ou 12.7x12.7.', 149.99, 10000, 'promo-2020', 'http://localhost/PPE/ChopTaPhoto-PPE2/img/impression%20photo4.jpg', 'impression'),
(12, 'Premium format 10', 'Choptaphoto vous propose ce type de format photos en dimension 10x10 ou 12.7x12.7.', 0.7, 10000, 'promo-2020', 'http://localhost/PPE/ChopTaPhoto-PPE2/img/impression%20photo5.jpg', 'impression'),
(13, 'Premium format 13', 'Choptaphoto vous propose ce pack photos de 200 pièces, en dimension 10x10.', 1, 10000, 'promo-2020', 'http://localhost/PPE/ChopTaPhoto-PPE2/img/impression-photo.png', 'impression'),
(14, 'Format rétro', 'Choptaphoto vous propose ce pack photos de 200 pièces, en dimension 9.2×10.2 cm.', 1.5, 10000, 'promo-2020', 'http://localhost/PPE/ChopTaPhoto-PPE2/img/impression%20photo6.jpg', 'impression'),
(16, 'Borne personnalisable ', 'Cette borne personnalisable qu\'on vous propose est une borne premium, elle est destinée aux entreprises qui souhaitent mettre le logo pendant un evénement ! elle est personnalisable de la tete au pied !', 199.99, 1, 'promo-2020', 'http://localhost/PPE/ChopTaPhoto-PPE2/img/bornreseaux.png', 'borne'),
(17, 'Borne anniversaire', 'Cette borne anniversaire qu\'on vous propose est une borne premium, elle est destinée aux particuliers qui souhaitent fêter leur jour d\'anniversaire et garder des milliers de souvenirs avec leurs invités ! elle est personnalisable de la tete au pied !', 199.99, 1, 'promo-2020', 'http://localhost/PPE/ChopTaPhoto-PPE2/img/bornannivsilv.png', 'borne'),
(18, 'borne pour entreprise', 'Cette borne personnalisable qu\'on vous propose est une borne premium, elle est destinée aux entreprises qui souhaitent mettre le logo pendant un événement ! elle est personnalisable de la tête au pied !', 199.99, 1, 'promo-2020', 'http://localhost/PPE/ChopTaPhoto-PPE2/img/bornefficom.png', 'borne'),
(20, 'Poster', 'choisissez votre image au payement', 10, 10000, 'promo-2020', 'http://localhost/PPE/ChopTaPhoto-PPE2/img/posterr.png', 'impression');

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
(13, 3, 1, '2020-06-28', '2020-06-30');

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
(21, 'MAHIEU', 'Silvère', '2000-07-06', '34 allée des primevères, les hauts du paradis', 'Wervicq-sud', 'silvere.mh@admin.fr', '32ff9ee7e841b26a966870c144fdcaec', 'administrateur', ''),
(24, 's', 's', '2000-07-06', '34 allée des primevères, les hauts du paradis', 'Wervicq-sud', 'silvere.mh@client.fr', '62608e08adc29a8d6dbc9754e659f125', 'client', ''),
(29, '', 'Silvère', '2000-07-06', '34 allée des primevères, les hauts du paradis', '34 allée des primevères, les hauts du paradis', 'silvere.mh@fgergfe.fr', '774cf0bf5bbbd903b6ec8f8a2a75a459', 'client', ''),
(30, 'MAHIEU', 'Silvère', '2000-07-06', '34 allée des primevères, les hauts du paradis', '34 allée des primevères, les hauts du paradis', 'silvere.mh@dtgdg.fr', '759de2da9765b4ec39a6a633c3d42f74', 'client', 'Monsieur'),
(32, 'MAHIEU', 'Silvère', '2000-07-06', '34 allée des primevères, les hauts du paradis', '34 allée des primevères, les hauts du paradis', 'silvere.mh@outlook.fr', 'bf083d4ab960620b645557217dd59a49', 'client', 'Monsieur');

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
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idBorne` (`idBorne`),
  ADD KEY `idClient` (`idClient`);

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
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
