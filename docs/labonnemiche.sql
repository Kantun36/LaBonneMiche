-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 06 déc. 2021 à 02:24
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `labonnemiche`
--

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `image_article`) VALUES
(3, 'COUP DE FOUDRE POUR L’ECLAIR', '<div>Dans la famille « pâte à choux », je demande… l’éclair ! Cette gourmandise est indémodable. Et pour cause : elle allie deux stars de la pâtisserie française : la pâte à choux donc mais aussi la crème pâtissière. Et si on plus on y ajoute du chocolat… pas étonnant que le tout disparaisse… en un éclair !</div>', 'articleEclair.jpg'),
(4, 'ZOOM SUR LE PRESIDENT DE LA BONNE MICHE', '<div>A qui doit-on tout ceci aujourd’hui ? Qui tient les rênes de cette merveilleuse entreprise ? Qui est notre dieu à tous ? Une réponse : Miche Hailes. Faisons maintenant une présentation de ce héros national médaillé de la légion d’honneur.</div>', 'articleMiche.jpg');

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom_produit`, `prix_produit`, `quantite_produit`, `poids_produit`, `description_produit`, `categorie`, `image_produit`) VALUES
(3, 'Baguette tradition', 1, 15, 10, '<div>Le fruit d\'un savoureux mélange d\'ingrédients simples, de qualité en font la tradition un indémodable.&nbsp;</div>', 'Baguette', 'baguettetradition.jpg'),
(4, 'Pain de campagne', 1, 15, 10, '<div>L\'élégance de sa forme et ses petites notes de miel en font une baguette spéciale très raffinée.</div>', 'Pain', 'paincampagne.jpg'),
(5, 'Sandwich poulet crudités', 3.5, 10, 15, '<div>Si vous cherchez un sandwich frais et équilibré aux saveurs du sud, vous avez trouvé votre bonheur !</div>', 'Sandwich', 'pouletcrudité.jpg'),
(6, 'Millefeuille', 4, 15, 10, '<div>La particularité de notre millefeuille ? Une forme carrée mais aussi des plaques de feuilletage caramélisées.</div>', 'Patisserie', 'millefeuille.jpg');

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nom_user`, `prenom_user`, `num_tel`, `points_fidels`, `is_verified`) VALUES
(2, 'loic.dupont@gmail.com', '[\"ROLE_USER\"]', '$2y$13$KWVNoPruo.lxlpO7hPKCX.qpx2r89OKwAaCx79.SJCbPijT62BWiu', 'Dupont', 'Loic', NULL, 0, 0),
(3, 'miche.hayles@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$jiaUofIkz9Q8LckA9Z8jP.AFWpyC05LMir.FdQsazMwW5Fk1N7OFi', 'Hayles', 'Miche', NULL, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
