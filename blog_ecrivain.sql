-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 08 avr. 2020 à 16:03
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog_ecrivain`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `reported` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`),
  KEY `comments_ibfk_1` (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comment`, `comment_date`, `reported`) VALUES
(1, 4, 28, 'Très bon chapitre sur la route mythique', '2020-04-04 14:33:37', 0),
(2, 4, 28, 'Et si on essayait d\'aller découvrir ce beau roman?', '2020-04-04 14:37:55', 0),
(3, 4, 28, 'comment test', '2020-04-04 14:44:38', 0),
(4, 4, 28, 'test ok', '2020-04-05 09:29:39', 0),
(31, 3, 28, 'belle région', '2020-04-06 16:54:18', 0),
(32, 3, 28, 'je pense pouvoir faire le voyage cette année!', '2020-04-06 16:55:16', 0),
(33, 4, 25, 'J\'ai mis l\'accent sur ce beau patrimoine', '2020-04-07 08:35:10', 0),
(34, 4, 28, 'et alors', '2020-04-07 09:27:46', 0),
(35, 2, 31, 'Ce chapitre me donne vraiment envie de voir la suite', '2020-04-08 17:56:21', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `content`, `creation_date`) VALUES
(1, 'Chapitre 1: L\'appel de Buck', 'Buck est un chien de Californie qui appartient au juge Miller. Il est un jour enlevé à son maître par l\'aide-jardinier du juge et vendu à un trafiquant de chiens de traîneau. Bientôt confronté à la brutalité de sa nouvelle vie, Buck doit trouver la force de survivre et s’adapter au froid de l’Alaska et du Yukon devant s’imposer aux autres chiens de la meute, il apprend à voler de la viande ainsi qu’à se battre pour survivre. Il est très souvent vendu jusqu’à ce qu’il devienne le chien d’un maître respectable, John Thornton. Mais lorsque son maître est tué par une tribu américaine, Buck redevient un loup et tue une partie des assassins. Rendu à la nature au milieu du Wild, la grande forêt nord-canadienne, il se mêle à une meute de loups dont il devient le chef.\r\n\r\nLes images de mort, de cruauté, et les allusions darwiniennes à la « lutte pour la vie » sont omniprésentes tout au long du récit. Forteroche décrit la jungle du Wild comme un monde dominé par la peur', '2020-03-29 12:35:08'),
(2, 'Chapitre 2: White Dog', 'L\'histoire commence à la naissance de Croc-Blanc, un chien-loup. L\'histoire suit la meute d\'où il vient et ses premières semaines de vie sauvage, sa lutte pour la vie : manger ou être mangé. Puis il fait l\'expérience de la vie chez les Indiens ; son maître se nomme Castor-Gris. Il rencontre d\'autres chiens et devient ennemi avec eux, Lip-Lip étant son rival. Mais Croc-Blanc, fier et puissant, subit la méchanceté des hommes blancs ; en réaction, il devient un combattant féroce.\r\n\r\nL\'histoire devient alors plus sombre lorsqu\'il est échangé à Beauty Smith pour devenir une bête de combat. Malgré ses nombreuses tentatives, Castor-Gris refuse de le reprendre. Il gagne chaque duel féroce jusqu\'au jour où il doit se battre avec un bulldog du nom de Cherokee. Alors qu\'il est gravement blessé, deux hommes arrêtent le combat : Weedon Scott, un ingénieur des mines, et son ami Matt. Croc-Blanc est donc recueilli et sauvé des mauvais traitements de cet « homme fou ».\r\n\r\nGrâce à la patience bienveillante de ses nouveaux maîtres, il découvre « l\'amour » et « l\'amitié » entre un loup et son maître. Un jour, un intrus nommé Jim Hall veut s\'en prendre au juge Scott le père de Weedon, et Croc-Blanc le défend malgré ses nombreuses blessures. Il est soigné et finit ses jours en compagnie de Collie la chienne de Scott et de leur nombreuse famille.', '2020-03-29 18:10:15'),
(3, 'Chapitre 3: Mon Alaska', 'Je vous vendrez ce petit coin paradisiaque à travers ce chapitre.\r\nCap au nord ! Si vous aimez la route, les immensités sauvages, si vous avez des envies d’escapades façon Into the Wild, si vous cherchez des paysages inhospitaliers et des conditions parfois extrêmes, la route de l’Alaska est votre Graal. Mythique et légendaire, bien plus qu’un voyage, c’est une expérience inoubliable aux confins d’une superbe région. PVT ou touristes, partez à l’aventure du Grand Nord.\r\n\r\nLa route de l’Alaska est une destination touristique en soi. Mais attention, elle n’est pas une attraction touristique comme on a l’habitude d’en voir. Pas de grandes villes bondées, pas de magasins à la chaîne, pas d’infrastructures hypermodernes. Prendre la route de l’Alaska, c’est pénétrer en territoire quasi désertique. Hôtels, restaurants, boutiques ou autres lieux de divertissement y sont rares, c’est la splendeur du paysage qui fait tout l’intérêt du périple.\r\n\r\nCe que vous allez traverser, ce sont de grandes étendues enneigées, des forêts d’épicéas, des bosquets de fleurs sauvages, des plaines de toundra, et vous aurez l’occasion d’apercevoir une faune « exotique » : ours, aigles, caribous, orignaux ou encore bisons.\r\n\r\nLes voyageurs raffolent de ce périple aventureux : en voiture ou en camping car, choisissez votre mode de transport.\r\n', '2020-03-29 18:13:33'),
(4, 'Chapitre 4: Alaska Highway', 'La route de l\'Alaska (Alaska Highway, aussi appelée Al-can aux États-Unis), est une route stratégique qui relie Dawson Creek, en Colombie-Britannique, à Fairbanks, en Alaska, via Whitehorse, au Yukon.\r\n\r\nElle est longue de 2 232 km. Historiquement, elle prend fin près de la borne 1422 au raccordement avec la Richardson Highway à Delta Junction environ 160 km au sud est de Fairbanks.\r\n\r\nElle a été construite par le génie de l\'armée des États-Unis d\'Amérique en 1942, en un temps record de 8 mois, lorsque le Japon a occupé quelques îles Aléoutiennes et qu\'une liaison terrestre entre l\'Alaska et le reste du continent a été jugée indispensable. Elle a été ensuite constamment améliorée et est désormais entièrement asphaltée.\r\n\r\nElle est numérotée 2 en Alaska, 1 au Yukon et 97 en Colombie-Britannique. Dans cette dernière province canadienne, les différents tronçons de l\'autoroute 97 portent d\'ailleurs le nom de la région qu\'ils traversent ou desservent : Alaska Highway, Okanagan Highway, Cariboo Highway...\r\n\r\nElle est une des principales composantes de la route panaméricaine', '2020-03-29 18:14:34');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `pseudo`, `mail`, `pass`, `admin`) VALUES
(25, 'taf', 'fatfa83@yahoo.fr', '$2y$10$JT/fHL/Qwc4X67tSw06ly.aLDYmPcMjs2ZXymKX3oTQobCz1awxeW', 1),
(28, 'cycla', 'cycla@gmail.com', '$2y$10$Ly6esn72NTudOA.eQvguuerQFvP1BsxU8FklUmhp3IgEhp0lzLIIK', 0),
(29, 'pispa', 'pispa@gmail.com', '$2y$10$0VWxewCFtosjyjIo.dgGFuUVK7yhNEU.LNhbw42delXm72KPIAEnu', 0),
(30, 'eva', 'evataf@outlook.com', '$2y$10$vU896Opavd8Zt34PVl58n.bYRee5gpnW6Vil/v6o2H4jP884Z1Y9a', 0),
(31, 'dibey', 'dibey@gmail.com', '$2y$10$B9fPy3UgHY8pZRSurH6n1eKDs6NaZK38L/EdpzEIEjG3gE0ux6cS2', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
