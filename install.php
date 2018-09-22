<?php 
if (!($mysqli = mysqli_connect("127.0.0.1", "test", "test")))
	return NULL;
$res = mysqli_multi_query($mysqli, "
-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  Dim 03 juin 2018 à 14:31
-- Version du serveur :  5.7.22
-- Version de PHP :  7.1.18

SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = \"+00:00\";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rush00`
--
CREATE DATABASE IF NOT EXISTS `rush00` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rush00`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `desc` varchar(1500) NOT NULL,
  `prix` int(50) NOT NULL,
  `provenance` varchar(250) NOT NULL,
  `dispo` int(11) NOT NULL,
  `img` text,
  `categorie` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `name`, `desc`, `prix`, `provenance`, `dispo`, `img`, `categorie`) VALUES
(1, 'Chaise', 'Une chaise simple et moche, achetez la', 19, 'amerique', 1, 'https://www.conforama.fr/fstrz/r/s/media.conforama.fr/Medias/500000/80000/1000/700/50/Z_581754_A.jpg?frz-v=245', 'a:1:{i:0;s:1:\"1\";}'),
(2, 'Chaise de bureau', 'Confortable pour de longues journées à coder', 450, 'amerique', 5, 'https://i2.cdscdn.com/pdt2/2/8/8/1/700x700/hom6932185967288/rw/chaise-bureau-pivotante-noir.jpg', 'a:1:{i:0;s:1:\"2\";}'),
(3, 'Chaise confort', 'C\'est ma chaise, c\'est la seule du pole', 42, 'pole', 2, 'https://www.4-pieds.com/18453-thickbox_default/chaise-moderne-noire-ou-grise-thais.jpg', 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}'),
(4, 'Bureau', 'Idéal et assez spacieux pour pouvoir s\'étaler, tel un codeur mal organisé', 350, 'amerique', 5, 'http://www.rdbureau.com/photo/1455117233.jpg', 'a:1:{i:0;s:1:\"2\";}'),
(5, 'Balancelle', 'Imagine toi, ce bordel et une biere', 10, 'france', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQabcS0IpVYhmOy4fs_eXR5qkUgu1YpCtxnaq41pAR2BED6zpbN6A', 'a:1:{i:0;s:1:\"6\";}'),
(6, 'Lit', 'Grand et moelleux, vous pourrez rêver d lignes de code toute la nuit', 600, 'france', 5, 'https://www.hotelsjaro.com/wp-content/uploads/chambres/palace-royal/SNUPT/palace_grande_suite_loft_1_900x600.jpg', 'a:1:{i:0;s:1:\"2\";}'),
(7, 'Doriane', 'Ouais t\'es inclut au projet t\'as vu', 199999999, 'france', 1, 'https://scontent-cdt1-1.xx.fbcdn.net/v/t31.0-8/20819428_10209944007141630_4785203817165095611_o.jpg?_nc_cat=0&oh=3790e294ab02d177376554d9f4831fab&oe=5BBBA0E5', 'a:6:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";}'),
(8, 'Armoire', 'Génial, vous pourrez y ranger vos trois t-shirt lavés pas votre mère', 300, 'chine', 5, 'https://www.basika.fr/photos/100043494-1/armoires-fly-blanc-l-270-x-h-208-x-p-58.jpg', 'a:1:{i:0;s:1:\"2\";}'),
(9, 'Lampe', 'Ca eclair', 15, 'amerique', 15, 'https://cdn.habitat.fr/thumbnails/product/878/878055/box/600/600/40/bobby-lampe-de-bureau-en-acier-argente_878055.jpg', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}'),
(10, 'Glacon', 'C\'est frais et c\'est francais, achete, allez', 1, 'france', 19000, 'https://www.group-digital.fr/media/catalog/category/407_machine_a_glacons.jpg', 'a:6:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";}'),
(11, 'Canapé de salon', 'Vous pourrez chiller devant la télé, et jouer aussi longtemps que vous voudrez, même y dormir', 300, 'france', 5, 'https://i.pinimg.com/originals/8f/69/3a/8f693a65f52ec1bf5d6b718644bc44e6.jpg', 'a:1:{i:0;s:1:\"1\";}'),
(12, 'Canape pour salon', 'Mon canap', 15, 'pole', 10, 'https://media.miliboo.com/xcanape-dangle-design-gris-,28angle-gauche,29-portland-21849-57287535ae13a_1010_427_0.jpg.pagespeed.ic._HJsIX9faV.jpg', 'a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}'),
(13, 'Armoire de toilette blanche', 'l\'armoire de toilette spéciale pour éclater vos boutons ', 100, 'pole', 5, 'https://statics.lapeyre.fr/img/catalogue/zoom1/001/288/201001288.jpg', 'a:1:{i:0;s:1:\"3\";}'),
(14, 'Television', 'Wesh', 1500, 'chine', 15, 'https://sites.google.com/site/collectionteleradiohifivideo/_/rsrc/1390288940540/galerie-television-annees-60/DSC08673%20%28Medium%29.JPG?height=351&width=400', 'a:5:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";}'),
(15, 'Refregirateur ', 'Parfait pour vous rafraichir', 500, 'pole', 5, 'https://image.but.fr/is/image/but/4894223195881_Q?$produit_xl$&wid=1158&hei=1288&fit=fit,1', 'a:1:{i:0;s:1:\"4\";}');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `categorie`) VALUES
(1, 'Salon'),
(2, 'Chambre'),
(3, 'Salle de bain'),
(4, 'Cuisine'),
(5, 'Salle de sport'),
(6, 'Exterieur');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commande` varchar(10000) NOT NULL,
  `price` int(6) NOT NULL,
  `user_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `droit` varchar(250) NOT NULL,
  `login` varchar(250) NOT NULL,
  `passwd` varchar(250) NOT NULL,
  `last_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `droit`, `login`, `passwd`, `last_log`, `inscription`) VALUES
(1, 'admin', 'root', '73d86e8d1ee561e42248e629d9346e47929e2d8816360b758d461d064c2881c4e0bd855ba8cf229419590a24548e60b4f9b2b1c746d9c1152fea843a2b26dde4', '2018-06-03 19:09:16', '2018-06-03 19:09:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
");
mysqli_close($mysqli);
?>