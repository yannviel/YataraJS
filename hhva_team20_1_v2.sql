-- phpMyAdmin SQL Dump
-- version 4.9.6
-- https://www.phpmyadmin.net/
--
-- Hôte : hhva.myd.infomaniak.com
-- Généré le :  mer. 10 fév. 2021 à 10:42
-- Version du serveur :  5.7.30-log
-- Version de PHP :  7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hhva_team20_1_v2`
--

-- --------------------------------------------------------

--
-- Structure de la table `blog`
--

CREATE TABLE `blog` (
  `ID_BLOG` int(11) NOT NULL,
  `TITRE_BLOG` varchar(255) NOT NULL,
  `IMAGE_BLOG` varchar(255) DEFAULT NULL,
  `DESCRIPTION_BLOG` varchar(255) NOT NULL,
  `DATE_BLOG` varchar(255) NOT NULL,
  `ESTACTIF_BLOG` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `blog`
--

INSERT INTO `blog` (`ID_BLOG`, `TITRE_BLOG`, `IMAGE_BLOG`, `DESCRIPTION_BLOG`, `DATE_BLOG`, `ESTACTIF_BLOG`) VALUES
(1, 'Servetten', 'img3.jpg', 'J\'adore l\'ï¿½cole', '2020-09-18 13:52:17', '0'),
(2, 'Ouverture du site ', 'img3.jpg', 'Bonjour à tous et bienvenu sur mon nouveau site internet !\r\n\r\nIci vous pourrez prendre vos rendez-vous en ligne ou commander des produits et des bons cadeaux. \r\n\r\nA bientôt !', '2020-09-29 15:48:21', '0'),
(3, 'Zalando pÃ¨te un cable et assassine ', 'img3.jpg', 'Le chien est mort dans des circonstances mystÃ©rieuse, Zalando l\'as mangÃ©ccqcvreqcv', '2020-10-05 11:27:55', '0'),
(4, 'Zalando pÃ¨te un cable et assassine ', 'img3.jpg', 'Le chien est mort dans des circonstances mystÃ©rieuse, Zalando l\'as mangÃ©', '2020-10-05 11:27:55', '0'),
(5, 'Zalando pÃ¨te un cable et assassine ', 'img3.jpg', 'dedededed', '2020-10-05 13:40:29', '0'),
(6, 'Zalando pÃ¨te un cable et assassine ', 'img3.jpg', 'dedededed', '2020-10-05 13:41:59', '0'),
(13, 'Ouverture du site', 'DSC_6394.JPG', 'Bonjour à tous et bienvenu sur mon nouveau site internet !\r\n\r\nIci vous pourrez prendre vos rendez-vous en ligne ou commander des produits et des bons cadeaux.\r\n\r\nA bientôt !', '2020-11-03 16:29:03', '0'),
(14, 'Fermeture du salon', 'DSC_6394.png', 'Bonjour, en raison des nouvelles mesures sanitaires en vigueur je suis malheureusement obligée de fermer mon salon jusqu\'à nouvel ordre.\r\n\r\nÀ Bientôt !', '2020-11-03 16:36:13', '0'),
(15, 'Fermeture du salon', 'DSC_6394 (1).jpg', 'Bonjour, en raison des nouvelles mesures sanitaires en vigueur je suis malheureusement obligée de fermer mon salon jusqu\'à nouvel ordre.\r\n\r\nA Bientôt !', '2020-11-03 16:42:53', '0'),
(16, 'Nouveau massage ', 'DSC_6423 (1).jpg', '\r\nLe massage relaxant est un massage qui apporte une relaxation profonde, soulage les douleurs et tensions musculaires et amène un bien-être tant physique que psychique.\r\n\r\nN\'hésitez pas à prendre rendez-vous', '2020-11-03 16:47:06', '0'),
(17, 'Création de mon site', 'DSC_6274 (1).jpg', 'Bonjour à tous et bienvenu sur mon nouveau site internet !\r\n\r\nIci vous pourrez prendre vos rendez-vous en ligne ou commander des produits et des bons cadeaux. \r\n\r\nA bientôt !', '2020-11-03 16:53:49', '0'),
(18, 'Création de mon site', 'DSC_6274 (1).jpg', 'Bonjour à tous et bienvenu sur mon nouveau site internet ! \r\nIci vous pourrez prendre vos rendez-vous en ligne ou commander des produits et des bons cadeaux. \r\n\r\nA bientôt !', '2020-11-03 16:56:27', '0'),
(19, 'Nouveau massage !', 'DSC_6423 (1).jpg', 'Le massage relaxant est un massage qui apporte une relaxation profonde, soulage les douleurs et tensions musculaires et amène un bien-être tant physique que psychique. N\'hésitez pas à prendre rendez-vous !', '2020-11-03 16:57:15', '0'),
(20, 'Fermeture du salon', 'DSC_6394 (1).jpg', 'Bonjour, en raison des nouvelles mesures sanitaires en vigueur je suis malheureusement obligée de fermer mon salon jusqu\'à nouvel ordre. \r\n\r\nA Bientôt !', '2020-11-03 16:57:57', '0'),
(21, 'Bon Cadeau !', 'DSC_6401 (1).jpg', 'Les bons cadeaux sont arrivés !\r\nVous pouvez dès maintenant commander des bons cadeaux en ligne !\r\nOffrez un moment de détente et de bonheur à vos proches.\r\nÀ Bientôt !', '2020-11-03 17:02:35', '0'),
(22, 'xfgjvjhj', '', 'jcvbjvbjbvjbvc', '2020-12-08 09:33:45', '0'),
(23, 'hvjghcjcghj', '', 'jchgjh', '2020-12-08 10:33:43', '0'),
(24, 'ftuxgh', 'build.gradle', 'gdjhgdjghj', '2020-12-08 10:36:03', '0'),
(25, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2020-12-15 11:20:37', '0'),
(26, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2020-12-15 11:30:21', '0'),
(27, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2020-12-21 21:18:23', '0'),
(28, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2020-12-22 08:20:58', '0'),
(29, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2020-12-22 08:23:03', '0'),
(30, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2020-12-22 08:26:57', '0'),
(31, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2020-12-22 08:31:45', '0'),
(32, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2020-12-22 08:34:37', '0'),
(33, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2020-12-22 09:03:08', '0'),
(34, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2020-12-22 09:13:42', '0'),
(35, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2020-12-22 09:17:08', '0'),
(36, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2020-12-22 09:24:03', '0'),
(37, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2020-12-22 09:38:31', '0'),
(38, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2020-12-22 09:45:10', '0'),
(39, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2020-12-22 09:46:40', '0'),
(40, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2020-12-22 09:46:51', '0'),
(41, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2020-12-22 09:48:35', '0'),
(42, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2020-12-22 09:48:46', '0'),
(43, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2020-12-22 11:16:05', '0'),
(44, 'Test du titre de l\'article', 'est.jfif', 'Test du contenu de l\'article', '2020-12-22 11:24:47', '0'),
(45, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2020-12-22 11:32:40', '0'),
(46, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2020-12-22 11:38:35', '0'),
(47, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2020-12-22 12:21:37', '0'),
(48, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-04 15:13:56', '0'),
(49, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-04 15:40:06', '0'),
(50, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-04 15:41:40', '0'),
(51, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-04 15:43:19', '0'),
(52, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-08 16:18:53', '0'),
(53, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-12 08:54:30', '0'),
(54, 'xfgjvjhj', '', 'sadDSAfDSFDF', '2021-01-12 08:54:46', '0'),
(55, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-12 08:55:25', '0'),
(56, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-12 08:58:01', '0'),
(57, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-12 08:58:42', '0'),
(58, 'TESTI', 'kev.jpg', 'gfdagfdshgfhgfh', '2021-01-12 09:00:39', '0'),
(59, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-12 09:02:47', '0'),
(60, 'gfsadgfds', 'DSC_6403.JPG', 'fasddsafdsdsffds', '2021-01-12 09:03:49', '0'),
(61, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 09:13:17', '0'),
(62, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 09:14:04', '0'),
(63, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 09:15:05', '0'),
(64, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 09:19:25', '0'),
(65, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 09:23:09', '0'),
(66, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 09:24:17', '0'),
(67, 'weeee', 'est.jfif', 'noooooooooo', '2021-01-12 09:27:44', '0'),
(68, 'Test du titre de l\'article', 'est.jfif', 'Test du contenu de l\'article', '2021-01-12 09:29:12', '0'),
(69, 'noooo', 'eichier.txt', 'wiiiiii', '2021-01-12 09:30:02', '0'),
(70, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2021-01-12 09:30:53', '0'),
(71, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2021-01-12 09:32:00', '0'),
(72, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-12 09:32:40', '0'),
(73, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2021-01-12 09:32:52', '0'),
(74, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-12 09:33:03', '0'),
(75, 'Test du titre de l\'article', 'est.jfif', 'Test du contenu de l\'article', '2021-01-12 09:33:15', '0'),
(76, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 09:33:28', '0'),
(77, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-12 09:38:55', '0'),
(78, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2021-01-12 09:39:06', '0'),
(79, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-12 09:39:17', '0'),
(80, 'Test du titre de l\'article', 'est.jfif', 'Test du contenu de l\'article', '2021-01-12 09:39:29', '0'),
(81, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 09:39:42', '0'),
(82, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-12 09:46:03', '0'),
(83, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2021-01-12 09:46:14', '0'),
(84, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-12 09:46:26', '0'),
(85, 'Test du titre de l\'article', 'est.jfif', 'Test du contenu de l\'article', '2021-01-12 09:46:37', '0'),
(86, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 09:46:51', '0'),
(87, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-12 09:48:53', '0'),
(88, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2021-01-12 09:49:04', '0'),
(89, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-12 09:49:16', '0'),
(90, 'Test du titre de l\'article', 'est.jfif', 'Test du contenu de l\'article', '2021-01-12 09:49:28', '0'),
(91, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 09:49:42', '0'),
(92, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-12 11:03:19', '0'),
(93, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2021-01-12 11:03:30', '0'),
(94, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-12 11:03:41', '0'),
(95, 'Test du titre de l\'article', 'est.jfif', 'Test du contenu de l\'article', '2021-01-12 11:03:53', '0'),
(96, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 11:04:04', '0'),
(97, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-12 11:19:59', '0'),
(98, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2021-01-12 11:20:10', '0'),
(99, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-12 11:20:21', '0'),
(100, 'Test du titre de l\'article', 'est.jfif', 'Test du contenu de l\'article', '2021-01-12 11:20:32', '0'),
(101, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 11:20:44', '0'),
(102, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-12 11:28:17', '0'),
(103, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2021-01-12 11:28:29', '0'),
(104, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-12 11:28:50', '0'),
(105, 'Test du titre de l\'article', 'est.jfif', 'Test du contenu de l\'article', '2021-01-12 11:29:01', '0'),
(106, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 11:29:13', '0'),
(107, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-12 11:33:33', '0'),
(108, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2021-01-12 11:33:44', '0'),
(109, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-12 11:33:55', '0'),
(110, 'Test du titre de l\'article', 'est.jfif', 'Test du contenu de l\'article', '2021-01-12 11:34:06', '0'),
(111, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 11:34:18', '0'),
(112, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-12 11:37:45', '0'),
(113, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2021-01-12 11:37:57', '0'),
(114, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-12 11:38:09', '0'),
(115, 'Test du titre de l\'article', 'est.jfif', 'Test du contenu de l\'article', '2021-01-12 11:38:21', '0'),
(116, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 11:38:34', '0'),
(117, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-12 11:41:10', '0'),
(118, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2021-01-12 11:41:22', '0'),
(119, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-12 11:41:34', '0'),
(120, 'Test du titre de l\'article', 'est.jfif', 'Test du contenu de l\'article', '2021-01-12 11:41:47', '0'),
(121, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 11:41:59', '0'),
(122, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-12 11:43:56', '0'),
(123, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2021-01-12 11:44:08', '0'),
(124, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-12 11:44:20', '0'),
(125, 'Test du titre de l\'article', 'est.jfif', 'Test du contenu de l\'article', '2021-01-12 11:44:32', '0'),
(126, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-12 11:44:44', '0'),
(127, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-18 16:40:30', '0'),
(128, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-18 16:57:58', '0'),
(129, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-18 17:00:34', '0'),
(130, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-18 17:01:08', '0'),
(131, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2021-01-18 17:01:20', '0'),
(132, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-18 17:01:32', '0'),
(133, 'Test du titre de l\'article', 'est.jfif', 'Test du contenu de l\'article', '2021-01-18 17:01:44', '0'),
(134, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-18 17:01:56', '0'),
(135, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-20 13:47:24', '0'),
(136, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2021-01-20 13:47:36', '0'),
(137, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-20 13:47:49', '0'),
(138, 'Test du titre de l\'article', 'est.jfif', 'Test du contenu de l\'article', '2021-01-20 13:48:01', '0'),
(139, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-20 13:48:13', '0'),
(140, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-29 13:47:57', '0'),
(141, 'Test du titre de l\'article', 'eichier.txt', 'Test du contenu de l\'article', '2021-01-29 13:48:10', '0'),
(142, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-29 13:48:25', '0'),
(143, 'Test du titre de l\'article', 'est.jfif', 'Test du contenu de l\'article', '2021-01-29 13:48:37', '0'),
(144, 'Test du titre de l\'article', 'DSC_6403.JPG', 'Test du contenu de l\'article', '2021-01-29 13:48:50', '0'),
(145, 'Test du titre de l\'article', '', 'Test du contenu de l\'article', '2021-01-29 15:35:20', '0'),
(146, 'Test du titre de l\'article', 'kev.jpg', 'Test du contenu de l\'article', '2021-01-29 15:41:00', '0');

-- --------------------------------------------------------

--
-- Structure de la table `BON_CADEAU`
--

CREATE TABLE `BON_CADEAU` (
  `ID_BON_CADEAU` int(11) NOT NULL,
  `ID_RESERVATION` int(11) DEFAULT NULL,
  `ID_PERSONNE` int(11) NOT NULL,
  `CODE_BON_CADEAU_UTILISE` varchar(128) DEFAULT NULL,
  `DESCRIPTION_BON_CADEAU` varchar(128) DEFAULT NULL,
  `PRIX_BON_CADEAU` varchar(128) DEFAULT NULL,
  `TYPE_FACTURATION_BON_CADEAU` varchar(128) DEFAULT NULL,
  `ESTACTIF_BON_CADEAU` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bon_cadeau`
--

CREATE TABLE `bon_cadeau` (
  `ID_BON_CADEAU` int(11) NOT NULL,
  `ID_RESERVATION` int(11) DEFAULT NULL,
  `EMAIL_CLIENT` varchar(225) DEFAULT NULL,
  `CODE_UTILISE_BON_CADEAU` varchar(255) DEFAULT NULL,
  `DESCRIPTION_BON_CADEAU` varchar(255) DEFAULT NULL,
  `CODE_BON_CADEAU` varchar(255) DEFAULT NULL,
  `PRIX_BON_CADEAU` varchar(255) DEFAULT NULL,
  `STATUT_BON_CADEAU` tinyint(4) DEFAULT NULL,
  `ESTACTIF_BON_CADEAU` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bon_cadeau`
--

INSERT INTO `bon_cadeau` (`ID_BON_CADEAU`, `ID_RESERVATION`, `EMAIL_CLIENT`, `CODE_UTILISE_BON_CADEAU`, `DESCRIPTION_BON_CADEAU`, `CODE_BON_CADEAU`, `PRIX_BON_CADEAU`, `STATUT_BON_CADEAU`, `ESTACTIF_BON_CADEAU`) VALUES
(1, NULL, NULL, NULL, '1h15', 'k2VULXYhDORzok3', NULL, 1, '1'),
(2, NULL, NULL, NULL, '1h15', 'fff', NULL, 1, '1'),
(3, NULL, NULL, NULL, '1h30', '8a3fvul6c6WzCH4', NULL, NULL, '1'),
(4, NULL, 'client@gmail.com', NULL, '1h', '7x9aR5XSGK603sr', NULL, 1, '1'),
(5, NULL, 'client@gmail.com', NULL, '1h', '7x9aR5XSGK603sr', NULL, 1, '1'),
(6, NULL, 'pierre@gmail.com', NULL, '1h', 'lU147xDtADaX6kW', NULL, 1, '1'),
(7, NULL, 'yannvielliard@gmail.com', NULL, '1h', 'BbFOqxPI3efe8u6', NULL, 1, '1'),
(8, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(9, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(10, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(11, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(12, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(13, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(14, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(15, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(16, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(17, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(18, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(19, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(20, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(21, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(22, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(23, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(24, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(25, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(26, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(27, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(28, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(29, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(30, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(31, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(32, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(33, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(34, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(35, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(36, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(37, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(38, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(39, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(40, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(41, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(42, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(43, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(44, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(45, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(46, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(47, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(48, NULL, 'a@a.com', NULL, '1h15', 'KYYyjBGbk3FqpzJ', NULL, 1, '1'),
(49, NULL, 'elv-andre.pntlv@eduge.ch', NULL, '1h30', '3ywAmc9inA28hkt', NULL, 1, '1'),
(50, NULL, 'elv-bruno.rgdsp@eduge.ch2', NULL, '1h', '2OxfLRXnaYT2b4K', NULL, 1, '1'),
(51, NULL, 'elv-bruno.rgdsp@eduge.ch2', NULL, '1h30', '2OxfLRXnaYT2b4K', NULL, 1, '1'),
(52, NULL, 'elv-bruno.rgdsp@eduge.ch2', NULL, '1h30', '2OxfLRXnaYT2b4K', NULL, 1, '1'),
(53, NULL, 'elv-bruno.rgdsp@eduge.ch2', NULL, '1h30', '2OxfLRXnaYT2b4K', NULL, 1, '1'),
(54, NULL, 'elv-bruno.rgdsp@eduge.ch2', NULL, '1h30', '2OxfLRXnaYT2b4K', NULL, 1, '1'),
(55, NULL, 'elv-bruno.rgdsp@eduge.ch2', NULL, '1h30', '2OxfLRXnaYT2b4K', NULL, 1, '1'),
(56, NULL, 'elv-bruno.rgdsp@eduge.ch2', NULL, '1h30', '2OxfLRXnaYT2b4K', NULL, 1, '1'),
(57, NULL, 'elv-bruno.rgdsp@eduge.ch2', NULL, '1h30', '2OxfLRXnaYT2b4K', NULL, 1, '1'),
(58, NULL, 'inlo@inlo.ch', NULL, '1h', 'UmNs4vSsAAWqIZq', NULL, 1, '1'),
(59, NULL, 'elv-bruno.rgdsp@eduge.ch2', NULL, '1h30', '2OxfLRXnaYT2b4K', NULL, 1, '1'),
(60, NULL, 'elv-bruno.rgdsp@eduge.ch2', NULL, '1h', NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `CLIENT`
--

CREATE TABLE `CLIENT` (
  `ID_CLIENT` int(11) NOT NULL,
  `NOM_CLIENT` varchar(128) DEFAULT NULL,
  `PRENOM_CLIENT` varchar(128) DEFAULT NULL,
  `DATE_DE_NAISSANCE_CLIENT` varchar(255) DEFAULT NULL,
  `EMAIL_CLIENT` varchar(128) DEFAULT NULL,
  `TELEPHONE_CLIENT` varchar(128) DEFAULT NULL,
  `PSEUDO_CLIENT` varchar(128) DEFAULT NULL,
  `PASSWORD_CLIENT` varchar(128) DEFAULT NULL,
  `ESTACTIF_CLIENT` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `ID_CLIENT` int(11) NOT NULL,
  `NOM_CLIENT` varchar(255) NOT NULL,
  `PRENOM_CLIENT` varchar(255) NOT NULL,
  `DATE_DE_NAISSANCE_CLIENT` varchar(255) NOT NULL,
  `EMAIL_CLIENT` varchar(255) NOT NULL,
  `TELEPHONE_CLIENT` varchar(255) NOT NULL,
  `PSEUDO_CLIENT` varchar(255) NOT NULL,
  `PASSWORD_CLIENT` varchar(255) NOT NULL,
  `ESTACTIF_CLIENT` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`ID_CLIENT`, `NOM_CLIENT`, `PRENOM_CLIENT`, `DATE_DE_NAISSANCE_CLIENT`, `EMAIL_CLIENT`, `TELEPHONE_CLIENT`, `PSEUDO_CLIENT`, `PASSWORD_CLIENT`, `ESTACTIF_CLIENT`) VALUES
(3, 'Marie', 'Yann', '15/09/1983', 'elv-bruno.rgdsp@eduge.ch', '0798887678f', 'YannMarierr', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(5, 'test1', 'jean', '2020-09-16', 'testtest2@gmail.com3', '12345455544421', 'test', '7b52009b64fd0a2a49e6d8a939753077792b0554', 0),
(6, 'eer', 'eer', '02/09/2020', 'eer@edu.ch', '234234234', 'qwert', '7b52009b64fd0a2a49e6d8a939753077792b0554', 1),
(8, 'rr', 'tr', '01/09/2020', 'rr@gmail.com', '078987676', 'rr', '7b52009b64fd0a2a49e6d8a939753077792b0554', 0),
(9, 'fvsd', 'svdd', '21/09/2020', 'sfdvdui@fsf.ch', '44444444444', 'ko', '7b52009b64fd0a2a49e6d8a939753077792b0554', 1),
(10, 'wrgve', 'gesrag', '03/09/2020', 'ui@ui.ch', '66666666', 'ui', '7b52009b64fd0a2a49e6d8a939753077792b0554', 1),
(11, 'ttt', 'eee', '2020-09-10', 'rereer@gs.chee', '078 888 76 43', 'test33', '7b52009b64fd0a2a49e6d8a939753077792b0554', 0),
(12, 'tttefrvc', 'ecrccewc', '2020-09-19', 'elv-bruno.rgdsp@eduge.chdexq', '078 888 76 66', 'carine.te3d', '7b52009b64fd0a2a49e6d8a939753077792b0554', 1),
(13, 'MMOMded', 'dededewqs', '2020-09-02', 'elv-bruno.rgdsp@eduge.chdwweqc', '12345455555555qwc', 'edwqnqwdwqed', 'fa35e192121eabf3dabf9f5ea6abdbcbc107ac3b', 1),
(14, 'zalando', 'eeeee', '2020-10-09', 'testtest2@gmail.comt5t5t', '12345455554444', 'test5t', '7b52009b64fd0a2a49e6d8a939753077792b0554', 1),
(17, 'wded', 'wedwed', '2020-10-15', 'testtest2@gmail.com333', '0798867856', 'test12', '7b52009b64fd0a2a49e6d8a939753077792b0554', 1),
(18, 'egrefrfe', 'egrgew', '2020-10-29', 'rereer@gs.chedewgregw', '12345455555555345345', 'ggtvew', '7b52009b64fd0a2a49e6d8a939753077792b0554', 1),
(20, 'ww', 'wwwww', '2020-11-04', 'edu-ramosmenarm@eduge.chwwww', '1234545553333', 'wwwwww', '1c4f0c6eb8bf8bbf11cc2ae1cdcc5c5d1f3a3c16', 1),
(22, 'client', 'client', '2020-06-01', 'elv-bruno.rgdsp@eduge.ch2', '0798887678', 'client', '8a617f3b33b922b6ec078e067407eeb6f693aaab', 1),
(24, 'Carinerfd421f', 'r42fewqv', '2020-10-09', 'rereer@gs.chwecvwrecv', '4444444444434', 'ggt122', '3f196cfb6c4cffe3002c0495a1bc822521b6aa36', 1),
(25, 'client', 'eeeee', '2020-10-13', 'regagra@sdgre.ch', '12345455555555554', 'admin12', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 1),
(26, 'Pierre', 'Pierre', '2020-11-07', 'pierre@gmail.com', '+41787979394', 'Pierre', '7c222fb2927d828af22f592134e8932480637c0d', 1),
(27, 'Vielliard', 'Yann', '2020-10-07', 'yannvielliard@gmail.com', '07898745323', 'yannviel', '19f7eb438a74faa037761f3351ced1ee900f09ed', 1),
(29, 'securise', 'test', '2000-02-20', 'test123@gmail.com', '0764415690', 'test1234', '7c222fb2927d828af22f592134e8932480637c0d', 1),
(30, 'jean', 'pierre', '2020-10-30', 'pierro@gmail.com', '07898745324', 'pierro', '7c222fb2927d828af22f592134e8932480637c0d', 0),
(33, 'dddddddd', 'eeeeeeee', '2020-06-10', 'testettt@gmail.com', '00222233377', 'testtest', '7c222fb2927d828af22f592134e8932480637c0d', 1),
(34, 'dffbdfbdfb', 'srbnrfg', '2020-10-02', 'test@gmail.comrssr', '00222233355', '12345678', '7c222fb2927d828af22f592134e8932480637c0d', 1),
(35, 'cc', 'cc', '2000-06-30', 'elv-andre.pntlv@eduge.ch', '0789999999', 'bruno12', '04556b581f269b79f4ed5801f8532331c7cffaf5', 1),
(36, 'bichette', 'bouboule', '2020-11-11', 'bichetteloute@eduge.ch', '06 12 12 12', 'bichette', '37ed796fddd3405daa1db7db8c0f42d978c07859', 1),
(37, 'inlo', 'inlo', '2004-05-11', 'inlo@inlo.ch', '0784521356', 'inlo', 'c7f4bd89212a808f127bddc6ea6162d9ecda20f0', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `ID_COMMANDE` int(11) NOT NULL,
  `ID_CLIENT` int(11) NOT NULL,
  `PRIX_COMMANDE` double NOT NULL,
  `ETAT_COMMANDE` varchar(255) NOT NULL,
  `TYPE_FACTURATION` varchar(255) NOT NULL,
  `ESTACTIF_COMMANDE` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`ID_COMMANDE`, `ID_CLIENT`, `PRIX_COMMANDE`, `ETAT_COMMANDE`, `TYPE_FACTURATION`, `ESTACTIF_COMMANDE`) VALUES
(11, 5, 44, 'En attente', 'cash', 1),
(12, 22, 22, 'En attente', 'twint', 1),
(13, 22, 210, 'En attente', 'cash', 1),
(14, 37, 0, 'En attente', 'cash', 1),
(15, 37, 483, 'En attente', 'cash', 1),
(16, 37, 315, 'En attente', 'cash', 1),
(17, 37, 315, 'En attente', 'cash', 1),
(18, 37, 315, 'En attente', 'cash', 1),
(19, 37, 315, 'En attente', 'cash', 1),
(20, 37, 315, 'En attente', 'cash', 1),
(21, 37, 315, 'En attente', 'cash', 1),
(22, 37, 315, 'En attente', 'cash', 1),
(23, 37, 315, 'En attente', 'cash', 1),
(24, 37, 315, 'En attente', 'cash', 1),
(25, 37, 315, 'En attente', 'cash', 1),
(26, 37, 315, 'En attente', 'cash', 1),
(27, 37, 315, 'En attente', 'cash', 1),
(28, 37, 315, 'En attente', 'cash', 1),
(29, 37, 315, 'En attente', 'cash', 1),
(30, 37, 315, 'En attente', 'cash', 1),
(31, 37, 315, 'En attente', 'cash', 1),
(32, 37, 315, 'En attente', 'cash', 1),
(33, 37, 315, 'En attente', 'cash', 1),
(34, 37, 315, 'En attente', 'cash', 1),
(35, 37, 315, 'En attente', 'cash', 1),
(36, 37, 315, 'En attente', 'cash', 1),
(37, 37, 315, 'En attente', 'cash', 1),
(38, 37, 315, 'En attente', 'cash', 1),
(39, 37, 315, 'En attente', 'cash', 1),
(40, 37, 315, 'En attente', 'cash', 1),
(41, 37, 315, 'En attente', 'cash', 1),
(42, 37, 315, 'En attente', 'cash', 1),
(43, 37, 315, 'En attente', 'cash', 1),
(44, 37, 315, 'En attente', 'cash', 1),
(45, 37, 315, 'En attente', 'cash', 1),
(46, 37, 315, 'En attente', 'cash', 1),
(47, 37, 315, 'En attente', 'cash', 1),
(48, 37, 315, 'En attente', 'cash', 1),
(49, 37, 315, 'En attente', 'cash', 1),
(50, 37, 315, 'En attente', 'cash', 1),
(51, 37, 315, 'En attente', 'cash', 1),
(52, 37, 315, 'En attente', 'cash', 1),
(53, 37, 315, 'En attente', 'cash', 1),
(54, 37, 315, 'En attente', 'cash', 1),
(55, 37, 315, 'En attente', 'cash', 1),
(56, 37, 315, 'En attente', 'cash', 1),
(57, 37, 315, 'En attente', 'cash', 1),
(58, 37, 315, 'En attente', 'cash', 1),
(59, 37, 315, 'En attente', 'cash', 1),
(60, 37, 315, 'En attente', 'cash', 1),
(61, 37, 315, 'En attente', 'cash', 1),
(62, 37, 315, 'En attente', 'cash', 1),
(63, 37, 315, 'En attente', 'cash', 1),
(64, 37, 315, 'En attente', 'cash', 1),
(65, 37, 315, 'En attente', 'cash', 1),
(66, 37, 315, 'En attente', 'cash', 1),
(67, 37, 315, 'En attente', 'cash', 1),
(68, 37, 315, 'En attente', 'cash', 1),
(69, 37, 315, 'En attente', 'cash', 1),
(70, 37, 315, 'En attente', 'cash', 1),
(71, 37, 315, 'En attente', 'cash', 1),
(72, 37, 315, 'En attente', 'cash', 1),
(73, 37, 315, 'En attente', 'cash', 1),
(74, 37, 315, 'En attente', 'cash', 1),
(75, 37, 315, 'En attente', 'cash', 1),
(76, 37, 315, 'En attente', 'cash', 1),
(77, 37, 315, 'En attente', 'cash', 1),
(78, 37, 315, 'En attente', 'cash', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commandeproduit`
--

CREATE TABLE `commandeproduit` (
  `ID_COMMANDE` int(11) NOT NULL,
  `ID_PRODUIT` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `disponibilite`
--

CREATE TABLE `disponibilite` (
  `ID_DISPONIBILITE` int(11) NOT NULL,
  `DATE_HEURE_DEBUT_DISPONIBILITE` datetime NOT NULL,
  `DATE_HEURE_FIN_DISPONIBILITE` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `disponibilite`
--

INSERT INTO `disponibilite` (`ID_DISPONIBILITE`, `DATE_HEURE_DEBUT_DISPONIBILITE`, `DATE_HEURE_FIN_DISPONIBILITE`) VALUES
(1, '2020-10-12 08:00:00', '2020-10-12 18:00:00'),
(2, '2020-10-13 08:00:00', '2020-10-13 18:00:00'),
(3, '2020-10-14 08:00:00', '2020-10-14 18:00:00'),
(4, '2020-10-15 08:00:00', '2020-10-15 18:00:00'),
(5, '2020-10-16 08:00:00', '2020-10-16 18:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `ID_EMPLOYE` int(11) NOT NULL,
  `NOM_EMPLOYE` varchar(255) DEFAULT NULL,
  `PRENOM_EMPLOYE` varchar(255) DEFAULT NULL,
  `DATE_DE_NAISSANCE_EMPLOYE` varchar(255) DEFAULT NULL,
  `EMAIL_EMPLOYE` varchar(255) DEFAULT NULL,
  `TELEPHONE_EMPLOYE` varchar(255) DEFAULT NULL,
  `PSEUDO_EMPLOYE` varchar(255) DEFAULT NULL,
  `PASSWORD_EMPLOYE` varchar(255) DEFAULT NULL,
  `ESTACTIF_EMPLOYE` tinyint(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`ID_EMPLOYE`, `NOM_EMPLOYE`, `PRENOM_EMPLOYE`, `DATE_DE_NAISSANCE_EMPLOYE`, `EMAIL_EMPLOYE`, `TELEPHONE_EMPLOYE`, `PSEUDO_EMPLOYE`, `PASSWORD_EMPLOYE`, `ESTACTIF_EMPLOYE`) VALUES
(11, 'Carine', 'Torrent', '16/09/1986', 'carine.torrent@gmail.com', '078 888 76 43', 'carine.t', '7b52009b64fd0a2a49e6d8a939753077792b0554', 1),
(12, 'ttt', 'eee', '2020-09-10', 'rereer@gs.ch', '078 888 76 43', 'test33', '7b52009b64fd0a2a49e6d8a939753077792b0554', 1),
(13, 'admin', 'admin', '2020-10-08', 'admin@gmail.com', '078 888 76 433', 'admin1', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1),
(14, 'bruno', 'bruno', '2020-10-27', 'aefuwe@fdvde.com', '030239272', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1);

-- --------------------------------------------------------

--
-- Structure de la table `est_attribue`
--

CREATE TABLE `est_attribue` (
  `ID_RESERVATION` int(11) NOT NULL,
  `ID_DISPONIBILITE` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `MASSAGE`
--

CREATE TABLE `MASSAGE` (
  `ID_MASSAGE` int(11) NOT NULL,
  `TYPE_MASSAGE` varchar(128) DEFAULT NULL,
  `PRIX_MASSAGE` float(5,2) DEFAULT NULL,
  `DUREE_MASSAGE` time DEFAULT NULL,
  `ESTACTIF_MASSAGE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `massage`
--

CREATE TABLE `massage` (
  `ID_MASSAGE` int(11) NOT NULL,
  `TYPE_MASSAGE` varchar(255) NOT NULL,
  `DESCRIPTION_MASSAGE` text NOT NULL,
  `ESTACTIF_MASSAGE` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `massage`
--

INSERT INTO `massage` (`ID_MASSAGE`, `TYPE_MASSAGE`, `DESCRIPTION_MASSAGE`, `ESTACTIF_MASSAGE`) VALUES
(1, 'Massage des meridiens', 'S’effectue sur les points d’acupuncture et aide à rétablir l’équilibre dans le corps. Les énergies en excès\r\nou en insuffisance déclenchent tensions et malaises. Le but est donc de les harmoniser et de les faire\r\ncirculer. Le massage des méridiens est bénéfique à tous et je le décline en autant de variantes que de\r\npersonnes. Tantôt relaxant, tantôt tonique et profond, je peux alterner les mouvements de massage avec\r\ndes points travaillés en acupressure. Pour un soin global, je vais souvent le combiner avec quelques\r\nminutes de réflexologie.', 1),
(2, 'Massage sportif', '  Anime pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0),
(3, 'Drainage lymphatique', 'Consiste en des mouvements doux et réguliers, ciblés sur la zone du corps à traiter, visant à stimuler la\r\ncirculation lymphatique.\r\nC\'est un massage qui nettoie les tissus, draine l\'organisme et améliore l\'élimination des toxines. Il renforce\r\nle système immunitaire, procure une détente psychique et améliore la qualité du sommeil. Le drainage\r\nlymphatique a également un effet analgésique.\r\nIl agit sur le système musculaire : nettoie, détoxine, permet de soulager douleurs, lourdeurs, crampes.\r\nPratiqué sur les muscles de la paroi intestinale, il soulage les problèmes de constipation. Il facilite le\r\nretour veineux en agissant sur les muscles de la paroi des vaisseaux sanguins, il est donc idéal pour les\r\njambes lourdes.\r\nDe nombreux problèmes chroniques peuvent être traités sur plus long terme, grâce à des séances\r\nrégulières : rhumatismes, arthrose, arthrite et polyarthrite ; tendinites ; problèmes circulatoires, tels que\r\njambes lourdes, impatiences et oedèmes ; acouphènes ; migraines ; sinusites ; hypertension artérielle ;\r\nrègles douloureuses, etc.', 1),
(4, 'Reflexologie', 'S’effectue sur les zones réflexes des pieds, parfois des mains, et crée une action stimulante ou calmante\r\nsur les différents organes, systèmes ou articulations. Elle est très relaxante et tonifiante à la fois. Si vous\r\nle souhaitez, je termine volontiers ce soin par quelques minutes à la tête.', 1),
(5, 'Massage femme enceinte', '  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1),
(6, 'Massage relaxant', 'Apporte une relaxation profonde, soulage les douleurs et tensions musculaires et amène un bien-être tantphysique que psychique.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

CREATE TABLE `parametre` (
  `ADRESSE_SALON_PARAMETRE` varchar(255) NOT NULL,
  `LOGO_PARAMETRE` varchar(255) NOT NULL,
  `TELEPHONE_PARAMETRE` varchar(255) NOT NULL,
  `DELAIS_ANNULATION_RESERVATION_PARAMETRE` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `ID_PRODUIT` int(11) NOT NULL,
  `NOM_PRODUIT` varchar(255) NOT NULL,
  `DESCRIPTION_PRODUIT` text NOT NULL,
  `PRIX_PRODUIT` double NOT NULL,
  `IMAGE_PRODUIT` varchar(255) NOT NULL,
  `STOCK_PRODUIT` int(111) NOT NULL,
  `ESTACTIF_PRODUIT` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`ID_PRODUIT`, `NOM_PRODUIT`, `DESCRIPTION_PRODUIT`, `PRIX_PRODUIT`, `IMAGE_PRODUIT`, `STOCK_PRODUIT`, `ESTACTIF_PRODUIT`) VALUES
(1, 'Crème solaire hydratante pour visage', 'Germaine de Capuccini - Crème solaire pour visage avec protection UV - 30ml', 78, 'visage.png', 10, 1),
(2, 'Summer kit body', 'Crème solaire hydratante pour le corps avec protection uv. Crème solaire hydratante pour le visage avec protection uv. 100ml chacun.', 88, 'body.png', 20, 1),
(4, 'Eponge de visage Konjac', '100% naturel, produit à partir de farine naturelle de konjac sans aucun élément chimique irrité\r\n\r\nCe produit est sec, rapidement adouci après dans l\'eau, adapté à toutes les peaux sensibles.', 22, 'eponge.png', 1, 1),
(3, 'Body oil vanilla & chocolate', 'L\'arôme délicieux de chocolat-vanille de cette huile de massage assure une relaxation profonde pour tous les sens. Idéale pour des moments de plaisir.', 21, 'oil.png', 35, 1);

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

CREATE TABLE `recuperation` (
  `ID_RECUP` int(5) NOT NULL,
  `EMAIL_RECUP` varchar(255) NOT NULL,
  `CODE_RECUP` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recuperation`
--

INSERT INTO `recuperation` (`ID_RECUP`, `EMAIL_RECUP`, `CODE_RECUP`) VALUES
(1, 'yann.maria@gmail.com', '486971783'),
(2, 'elv-bruno.rgdsp@eduge.ch', '339948516');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `ID_RESERVATION` int(11) NOT NULL,
  `ID_MASSAGE` varchar(225) DEFAULT NULL,
  `ID_BON_CADEAU` int(11) DEFAULT NULL,
  `ID_CLIENT` int(11) DEFAULT NULL,
  `DUREE_RESERVATION` varchar(255) DEFAULT NULL,
  `DATE_RDV_RESERVATION` varchar(225) DEFAULT NULL,
  `HEURE_RDV_RESERVATION` varchar(255) DEFAULT NULL,
  `DATE_RESERVATION` varchar(255) DEFAULT NULL,
  `METHODE_PAIEMENT_RESERVATION` varchar(255) DEFAULT NULL,
  `STATUT_PAIEMENT` varchar(255) DEFAULT NULL,
  `ESTACTIF_RESERVATION` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`ID_RESERVATION`, `ID_MASSAGE`, `ID_BON_CADEAU`, `ID_CLIENT`, `DUREE_RESERVATION`, `DATE_RDV_RESERVATION`, `HEURE_RDV_RESERVATION`, `DATE_RESERVATION`, `METHODE_PAIEMENT_RESERVATION`, `STATUT_PAIEMENT`, `ESTACTIF_RESERVATION`) VALUES
(29, '5', NULL, 5, '1h15', '2020-10-16', '17:00', '2020-10-13 13:37:47', 'TWINT', 'En attente', 1),
(30, '4', NULL, 5, '1h30', '2020-10-29', '11:00', '2020-10-13 14:00:26', 'TWINT', 'En attente', 1),
(31, '5', 0, 5, '1h15', '2020-10-04', '12:00', '2020-10-13 14:43:29', 'Cash', 'En attente', 1),
(32, '2', 2, 5, '1h', '2020-10-16', '13:00', '2020-10-13 14:44:55', 'Cash', 'PayÃ© avec bon cadeau', 1),
(33, '5', 2, 5, '1h15', '2020-10-10', '15:00', '2020-10-13 15:09:23', 'TWINT', 'Paye avec bon cadeau', 1),
(40, '4', 2, 5, '', '2020-10-03', '12:00', '2020-10-15 15:41:34', 'TWINT', 'Paye avec bon cadeau', 1),
(38, '3', 0, 11, '1h15', '2020-10-22', '18:00', '2020-10-14 11:35:25', 'Cash', 'PayÃ©', 1),
(39, '3', 0, 5, '1h30', '2020-10-24', '8:00', '2020-10-15 15:40:54', 'Cash', 'En attente', 0),
(41, '2', 2, 5, '', '2020-10-02', '9:00', '2020-10-15 15:46:05', 'TWINT', 'Paye avec bon cadeau', 1),
(42, '2', 2, 5, '', '2020-10-02', '8:00', '2020-10-15 15:48:36', 'TWINT', 'Paye avec bon cadeau', 1),
(43, '2', 2, 5, '', '2020-10-02', '8:00', '2020-10-15 15:51:37', 'TWINT', 'Paye avec bon cadeau', 1),
(44, '2', 2, 5, '1h15', '2020-10-31', '18:00', '2020-10-15 15:53:21', 'TWINT', 'Paye avec bon cadeau', 0),
(45, '2', 2, 5, '1h15', '2020-10-16', '14:00', '2020-10-15 15:56:55', 'TWINT', 'Paye avec bon cadeau', 1),
(46, '4', 0, 5, '1h15', '2020-10-04', '8:00', '2020-10-15 16:25:16', 'TWINT', 'En attente', 1),
(47, '3', 2, 5, '1h15', '2020-10-31', '13:00', '2020-10-15 17:14:22', 'TWINT', 'Paye avec bon cadeau', 1),
(48, '5', 2, 5, '1h15', '2020-10-28', '16:00', '2020-10-15 17:14:54', 'TWINT', 'Paye avec bon cadeau', 1),
(49, '4', 2, 5, '1h15', '2020-10-03', '8:00', '2020-10-15 17:37:35', 'TWINT', 'Paye avec bon cadeau', 1),
(50, '4', 2, 5, '1h15', '2020-10-31', '8:00', '2020-10-15 17:39:49', 'TWINT', 'Paye avec bon cadeau', 1),
(51, '5', 0, 22, '1h15', '2020-10-21', '17:00', '2020-10-16 08:21:35', 'Cash', 'En attente', 1),
(52, '5', 0, 22, '1h15', '2020-10-21', '17:00', '2020-10-16 08:22:04', 'Cash', 'En attente', 1),
(53, '3', 0, 22, '1h30', '2020-10-18', '16:00', '2020-10-16 12:24:25', 'Cash', 'En attente', 1),
(54, '4', 2, 22, '1h15', '2020-10-31', '9:00', '2020-10-16 12:25:29', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(55, '3', 0, 3, '1h30', '2020-10-04', '16:00', '2020-10-16 13:16:27', 'Cash', 'Payé', 1),
(56, '2', 0, 3, '1h15', '2020-10-15', '13:00', '2020-10-16 13:20:40', 'Cash', 'Payé', 1),
(57, '3', 2, 0, '1h15', '2020-10-09', '17:00', '2020-10-16 13:22:10', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(58, '3', 2, 22, '1h15', '2020-10-13', '8:00', '2020-10-16 13:50:47', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(59, '4', 0, 22, '1h30', '2020-10-31', '15:00', '2020-10-16 18:45:38', 'TWINT', 'En attente', 1),
(60, '2', 0, 28, '1h', '2020-09-29', '16:00', '2020-10-26 16:38:39', 'Cash', 'En attente', 1),
(61, '6', 0, 29, '1h', '2020-11-10', '12:00', '2020-10-27 09:56:09', 'Cash', 'En attente', 1),
(62, '4', 0, 22, '1h', '2020-10-21', '8:00', '2020-10-27 14:34:57', 'TWINT', 'En attente', 1),
(63, '1', 2, 22, '1h15', '2020-11-02', '14:00', '2020-11-02 19:04:52', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(64, '3', 0, 22, '1h', '2020-11-06', '15:00', '2020-11-03 14:37:35', 'Cash', 'En attente', 1),
(65, '3', 0, 22, '1h', '2020-11-06', '16:00', '2020-11-03 14:43:50', 'Cash', 'En attente', 1),
(66, '3', 0, 35, '1h', '2020-11-06', '11:00', '2020-11-04 08:49:02', 'Cash', 'En attente', 1),
(67, '4', 49, 35, '1h30', '2020-11-18', '13:00', '2020-11-04 08:52:42', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(68, '2', 0, 3, '1h', '2020-11-20', '16:00', '2020-11-04 09:06:33', 'Cash', 'Payé', 1),
(69, '4', 0, 22, '1h15', '2020-11-19', '14:00', '2020-11-06 17:29:48', 'Cash', 'En attente', 1),
(70, '1', 0, 22, '1h', '2020-11-06', '8:00', '2020-11-06 17:29:51', 'Cash', 'En attente', 1),
(71, '1', 0, 22, '1h', '2020-11-06', '8:00', '2020-11-06 17:29:52', 'Cash', 'En attente', 1),
(72, '5', 2, 22, '1h15', '2020-11-10', '14:00', '2020-11-10 10:07:04', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(73, '4', 2, 36, '1h15', '2020-11-19', '13:00', '2020-11-11 11:35:37', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(74, '1', 0, 22, '1h', '2020-12-08', '8:00', '2020-12-08 11:22:55', 'TWINT', 'En attente', 1),
(75, '1', 0, 22, '1h', '2020-12-24', '17:00', '2020-12-12 20:39:41', 'TWINT', 'En attente', 1),
(76, '1', 2, 22, '1h15', '2021-05-05', '8:00', '2020-12-15 11:29:43', 'Bon cadeau', 'Paye avec bon cadeau', 0),
(77, '1', 2, 22, '1h15', '2020-12-21', '8:00', '2020-12-21 15:57:06', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(78, '1', 2, 22, '1h15', '2021-05-05', '9:00', '2020-12-22 08:38:55', 'Bon cadeau', 'Paye avec bon cadeau', 0),
(79, '1', 2, 22, '1h15', '2021-05-05', '10:00', '2020-12-22 09:38:04', 'Bon cadeau', 'Paye avec bon cadeau', 0),
(80, '1', 2, 22, '1h15', '2021-05-05', '11:00', '2020-12-22 09:57:02', 'Bon cadeau', 'Paye avec bon cadeau', 0),
(81, '1', 2, 22, '1h15', '2021-05-05', '12:00', '2020-12-22 10:53:16', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(82, '1', 2, 22, '1h15', '2021-05-05', '13:00', '2020-12-22 10:53:50', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(83, '1', 2, 22, '1h15', '2021-05-05', '14:00', '2020-12-22 10:54:53', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(84, '1', 2, 22, '1h15', '2021-05-05', '15:00', '2020-12-22 11:04:28', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(85, '1', 2, 22, '1h15', '2021-05-05', '16:00', '2020-12-22 11:07:06', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(86, '1', 2, 22, '1h15', '2021-05-05', '17:00', '2020-12-22 11:10:16', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(87, '1', 2, 22, '1h15', '2021-05-05', '18:00', '2020-12-22 11:13:32', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(88, '1', 2, 22, '1h15', '2021-05-06', '8:00', '2020-12-22 11:20:36', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(89, '1', 2, 22, '1h15', '2021-05-06', '9:00', '2020-12-22 11:22:40', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(90, '1', 2, 22, '1h15', '2021-05-06', '10:00', '2020-12-22 11:29:08', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(93, '1', 0, 0, '1h', '2021-01-09', '17:00', '2021-01-09 13:23:26', 'TWINT', 'En attente', 1),
(98, '1', 0, 22, '1h', '2021-01-11', '8:00', '2021-01-11 00:15:06', 'TWINT', 'En attente', 1),
(100, '5', 0, 22, '1h15', '2021-01-11', '14:00', '2021-01-11 19:10:29', 'TWINT', 'En attente', 1),
(103, '1', 0, 22, '1h', '2021-01-11', '9:00', '2021-01-11 22:42:56', 'TWINT', 'En attente', 1),
(116, '1', 0, 22, '1h', '2021-12-23', '9:00', '2021-01-12 08:58:47', 'Cash', 'En attente', 1),
(115, '1', 0, 22, '1h', '2021-12-23', '8:00', '2021-01-12 08:58:23', 'Cash', 'En attente', 1),
(127, '1', 0, 22, '1h', '2021-03-15', '8:00', '2021-01-12 09:41:32', 'Cash', 'En attente', 1),
(128, '1', 0, 22, '1h', '2021-03-15', '9:00', '2021-01-12 09:42:03', 'Cash', 'En attente', 1),
(129, '1', 0, 22, '1h', '2021-03-15', '10:00', '2021-01-12 09:44:09', 'Cash', 'En attente', 1),
(117, '1', 0, 22, '1h', '2021-12-23', '10:00', '2021-01-12 09:01:10', 'Cash', 'En attente', 1),
(118, '1', 0, 22, '1h', '2021-12-23', '11:00', '2021-01-12 09:02:14', 'Cash', 'En attente', 1),
(119, '1', 0, 22, '1h', '2021-12-23', '12:00', '2021-01-12 09:03:04', 'Cash', 'En attente', 1),
(120, '1', 0, 22, '1h', '2021-12-23', '13:00', '2021-01-12 09:03:48', 'Cash', 'En attente', 1),
(121, '1', 0, 22, '1h', '2021-12-23', '14:00', '2021-01-12 09:04:58', 'Cash', 'En attente', 1),
(122, '1', 0, 22, '1h', '2021-12-23', '15:00', '2021-01-12 09:06:02', 'Cash', 'En attente', 1),
(123, '1', 0, 22, '1h', '2021-12-23', '16:00', '2021-01-12 09:06:57', 'Cash', 'En attente', 1),
(124, '1', 0, 22, '1h', '2021-12-23', '17:00', '2021-01-12 09:07:39', 'Cash', 'En attente', 1),
(165, '4', 0, 22, '1h30', '2021-02-25', '15:00', '2021-02-02 23:41:29', 'TWINT', 'En attente', 1),
(147, '1', 2, 22, '1h15', '2021-12-12', '9:00', '2021-01-20 14:50:03', 'Bon cadeau', 'Paye avec bon cadeau', 1),
(166, '1', 2, 22, '1h15', '2021-02-25', '8:00', '2021-02-09 14:44:07', 'Bon cadeau', 'Paye avec bon cadeau', 1);

-- --------------------------------------------------------

--
-- Structure de la table `RESERVATION`
--

CREATE TABLE `RESERVATION` (
  `ID_RESERVATION` int(11) NOT NULL,
  `ID_MASSAGE` int(11) NOT NULL,
  `ID_BON_CADEAU` int(11) DEFAULT NULL,
  `ID_PERSONNE` int(11) NOT NULL,
  `TYPE_FACTURATION_RESERVATION` varchar(128) DEFAULT NULL,
  `ESTACTIF_RESERVATION` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE `tarif` (
  `ID_TARIF` int(11) NOT NULL,
  `DUREE_TARIF` varchar(255) NOT NULL,
  `PRIX_TARIF` varchar(255) NOT NULL,
  `ESTACTIF_TARIF` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tarif`
--

INSERT INTO `tarif` (`ID_TARIF`, `DUREE_TARIF`, `PRIX_TARIF`, `ESTACTIF_TARIF`) VALUES
(1, '1H00', '130', '1'),
(2, '1H15', '160', '1'),
(3, '1H30', '190', '1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`ID_BLOG`);

--
-- Index pour la table `BON_CADEAU`
--
ALTER TABLE `BON_CADEAU`
  ADD PRIMARY KEY (`ID_BON_CADEAU`),
  ADD KEY `FK_BON_CADEAU_CLIENT` (`ID_PERSONNE`),
  ADD KEY `FK_BON_CADEAU_RESERVATION` (`ID_RESERVATION`);

--
-- Index pour la table `bon_cadeau`
--
ALTER TABLE `bon_cadeau`
  ADD PRIMARY KEY (`ID_BON_CADEAU`);

--
-- Index pour la table `CLIENT`
--
ALTER TABLE `CLIENT`
  ADD PRIMARY KEY (`ID_CLIENT`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_CLIENT`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`ID_COMMANDE`);

--
-- Index pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  ADD PRIMARY KEY (`ID_DISPONIBILITE`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`ID_EMPLOYE`);

--
-- Index pour la table `est_attribue`
--
ALTER TABLE `est_attribue`
  ADD PRIMARY KEY (`ID_RESERVATION`,`ID_DISPONIBILITE`);

--
-- Index pour la table `MASSAGE`
--
ALTER TABLE `MASSAGE`
  ADD PRIMARY KEY (`ID_MASSAGE`);

--
-- Index pour la table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`ID_MASSAGE`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`ID_PRODUIT`);

--
-- Index pour la table `recuperation`
--
ALTER TABLE `recuperation`
  ADD PRIMARY KEY (`ID_RECUP`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`ID_RESERVATION`);

--
-- Index pour la table `RESERVATION`
--
ALTER TABLE `RESERVATION`
  ADD PRIMARY KEY (`ID_RESERVATION`),
  ADD KEY `FK_RESERVATION_MASSAGE` (`ID_MASSAGE`),
  ADD KEY `FK_RESERVATION_BON_CADEAU` (`ID_BON_CADEAU`),
  ADD KEY `FK_RESERVATION_CLIENT` (`ID_PERSONNE`);

--
-- Index pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`ID_TARIF`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blog`
--
ALTER TABLE `blog`
  MODIFY `ID_BLOG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT pour la table `bon_cadeau`
--
ALTER TABLE `bon_cadeau`
  MODIFY `ID_BON_CADEAU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `ID_CLIENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `ID_COMMANDE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  MODIFY `ID_DISPONIBILITE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `ID_EMPLOYE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `massage`
--
ALTER TABLE `massage`
  MODIFY `ID_MASSAGE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `ID_PRODUIT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `recuperation`
--
ALTER TABLE `recuperation`
  MODIFY `ID_RECUP` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `ID_RESERVATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT pour la table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `ID_TARIF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `BON_CADEAU`
--
ALTER TABLE `BON_CADEAU`
  ADD CONSTRAINT `BON_CADEAU_ibfk_1` FOREIGN KEY (`ID_PERSONNE`) REFERENCES `CLIENT` (`ID_CLIENT`),
  ADD CONSTRAINT `BON_CADEAU_ibfk_2` FOREIGN KEY (`ID_RESERVATION`) REFERENCES `RESERVATION` (`ID_RESERVATION`);

--
-- Contraintes pour la table `RESERVATION`
--
ALTER TABLE `RESERVATION`
  ADD CONSTRAINT `RESERVATION_ibfk_1` FOREIGN KEY (`ID_MASSAGE`) REFERENCES `MASSAGE` (`ID_MASSAGE`),
  ADD CONSTRAINT `RESERVATION_ibfk_2` FOREIGN KEY (`ID_BON_CADEAU`) REFERENCES `BON_CADEAU` (`ID_BON_CADEAU`),
  ADD CONSTRAINT `RESERVATION_ibfk_3` FOREIGN KEY (`ID_PERSONNE`) REFERENCES `CLIENT` (`ID_CLIENT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
