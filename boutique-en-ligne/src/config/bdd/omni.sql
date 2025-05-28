-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 25 avr. 2025 à 09:32
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `omni`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address_id` int DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `first_name` (`first_name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `account_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_id` (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'black'),
(2, 'white'),
(3, 'gray'),
(4, 'blue');

-- --------------------------------------------------------

--
-- Structure de la table `garment`
--

DROP TABLE IF EXISTS `garment`;
CREATE TABLE IF NOT EXISTS `garment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `garment`
--

INSERT INTO `garment` (`id`, `name`) VALUES
(1, 'hat'),
(2, 't-shirt'),
(3, 'pants'),
(4, 'shoes');

-- --------------------------------------------------------

--
-- Structure de la table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'man'),
(2, 'woman');

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `account_id` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orderitem`
--

DROP TABLE IF EXISTS `orderitem`;
CREATE TABLE IF NOT EXISTS `orderitem` (
  `id` int NOT NULL AUTO_INCREMENT,
  `account_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `account_id` (`account_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `gender_id` int NOT NULL,
  `garment_id` int NOT NULL,
  `color_id` int NOT NULL,
  `size_id` int NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `stock_quantity` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `gender_id` (`gender_id`),
  KEY `garment_id` (`garment_id`),
  KEY `color_id` (`color_id`),
  KEY `size_id` (`size_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO `product` (`id`, `name`, `description`, `price`, `gender_id`, `garment_id`, `color_id`, `size_id`, `image_url`, `stock_quantity`) VALUES
(7, 'Ski Beanie\r\nIn Black Cashmere', 'Notre bonnet luxueux est tricoté en cachemire pur et est idéal pour la ville comme pour les pistes.\r\nPortez-le avec le revers relevé pour plus de chaleur, ou rabattez-le pour une protection supplémentaire des oreilles.', 99.90, 1, 1, 1, 3, 'https://www.lockhatters.com/cdn/shop/files/BLACK-CASHMERE-SKI-BEANIE-EDITED-WITHOUT-LABEL-1_5000x.jpg?v=1744018451', 30),
(6, 'Berkeley Flat CapIn Black Escorial Wool', 'Le Berkeley est conçu pour s\'ajuster près de la tête pour une silhouette profilée.\r\nOMNI. est ravi de collaborer avec Escorial pour vous proposer cette gamme exclusive de produits nouveaux et innovants. Fabriquée en laine Escorial, la casquette plate Berkeley présente une coupe plus élégante.', 100.00, 1, 1, 1, 3, 'https://www.lockhatters.com/cdn/shop/files/ESCORIAL-WOOL-BERKELY-FLAT-CAP-EDITED_5000x.jpg?v=1744018746', 20),
(3, 'Chapeau de Paille Noir Homme', ' Chapeau en paille noire avec un bandeau de cuir marron, léger et confortable pour les journées ensoleillées.', 50.00, 1, 1, 1, 3, 'https://chapeau-de-paille.fr/cdn/shop/products/Chapeau-de-Paille-Homme-Noir_1024x1024.jpg?v=1626365434', 20),
(2, 'Chapeau Western Noir Homme', ' Chapeau de style cowboy en feutre laine de qualité supérieure, avec une lanière en cuir tressé.', 50.00, 1, 1, 1, 3, 'https://the-western-shop.com/cdn/shop/products/chapeau-western-noir-homme-285534.jpg?v=1681362328&width=800', 20),
(4, 'Chapeau en Cuir Noir', ' Chapeau en cuir noir, totalement imperméable, avec un intérieur aspect velours.', 50.00, 1, 1, 1, 3, 'https://www.ducatillon.com/29816-large_default/chapeau-en-cuir-noir.jpg', 10),
(5, 'Zermatt\r\nNavy Wool Baseball Cap', 'Le Zermatt est la version hivernale de la casquette de baseball classique.\r\nLa casquette est confectionnée en laine bleu marine chaude et davantage adaptée à l\'hiver grâce à des rabats d\'oreilles internes ajustables inspirés du chapeau traditionnel Trapper. Ce chapeau présente un style élégant et décontracté, idéal pour les jours de congé en ville et les escapades mémorables à la campagne le weekend.', 125.00, 1, 1, 1, 3, 'https://www.lockhatters.com/cdn/shop/files/ZERMATT-BASEBALL-CAP-1_5000x.jpg?v=1744018939', 5),
(1, 'Chapeau Fedora Noir – DORIAN', ' Chapeau en feutre de laine, orné d\'un ruban gros-grain noir et blanc', 35.00, 1, 1, 1, 3, 'https://mira-belle.fr/cdn/shop/files/Chapeau-Fedora-homme-noir.webp?v=1709338000&width=900', 15),
(8, 'Carhartt WIP', 'Cette casquette Carhartt Wip conçue en coton, est dotée du logo brodé sur l\'avant, d\'œillets d\'aération et d\'une bride à clip inox réglable sur l\'arrière.', 30.00, 1, 1, 1, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/http://static.galerieslafayette.com/media/678/67808930/G_67808930_320_ZP_1.jpg', 20),
(9, 'Parajumpers', 'Cette casquette Parajumpers conçue en tissu recyclé, dispose d\'une étiquette griffée sur le devant, d\'œillets d\'aération ainsi que sur l\'arrière d\'une fermeture pressionnée et d\'une bride mousqueton.', 75.99, 1, 1, 1, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=2200,height=2400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_110/hp_mod_110994581/hp_modvar_119574239/202504180916/casquette_bravo_recyclee-1.jpg', 15),
(10, 'Polo Ralph Lauren', 'Cette casquette de baseball Polo Ralph Lauren conçue en coton, présente le pony brodé à l\'avant, des œillets d\'aération ainsi que le logo brodé et une fermeture snapback au dos.', 1.00, 1, 1, 1, 75, 'https://static.galerieslafayette.com/cdn-cgi/image/width=2200,height=2400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_120/hp_mod_120870091/hp_modvar_120870092/202502270902/casquette_uni_baseball_logonoirtaille_unique-1.jpg', 50),
(11, 'Kenzo', 'Cette casquette Kenzo conçue en coton se présente le logo brodé à l\'avant, des œillets d\'aération ainsi qu\'une bride ajustable à l\'arrière.\r\n', 1.00, 1, 1, 1, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_118/hp_mod_118889984/hp_modvar_123699326/202502130934/cap-1.jpg', 10),
(12, 'Balmain', 'Casquette en coton Kiss\r\n\r\nBroderie ton-sur-ton Balmain Vintage à l\'avant\r\nMotif Kiss imprimé sur la visière\r\nPatte de réglage à l\'arrière avec boucle rectangulaire en métal argenté gravé\r\nMatière principale : 100% Coton\r\nFabriqué en Bulgarie\r\nArticle : DH0XA310CD29', 250.00, 1, 1, 2, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/68e541c4e29641c9b8ac5b36450952c1', 5),
(13, 'CASABLANCA', 'Cette casquette Casablanca conçue en twill de coton, propose la griffe brodée sur le devant, des œillets d\'aération et une fermeture à boucle ajustable sur l\'arrière.', 350.00, 1, 1, 2, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_111/hp_mod_111883198/hp_modvar_111883200/202407290844/casquette_tennis_club_en_twill_de_coton-1.jpg', 5),
(14, 'Calvin Klein Jeans', 'Cette casquette Calvin Klein Jeans se pare d\'une broderie monogramme et signature devant ainsi qu\'une patte de serrage ajustable derrière.', 40.00, 1, 1, 2, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_108/hp_mod_108877920/hp_modvar_108877930/202410241634/casquette_mono_logo_embroblanctaille_unique-1.jpg', 20),
(15, 'Vilebrequin', '•Casquette à visière courbée type baseball cap à 6 pannels\r\n•Ajustable par un sytème de straback, le meilleur système pour ajuster parfaitement la casquette à la tête\r\n•Brodée de partout ronde des tortue ton sur ton\r\n•Logo Vilebrequin brodé dos ton sur ton\r\n•100% Cotton', 50.00, 1, 1, 2, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/e92a67e5b250483cb6793cca6796308d', 25),
(16, 'Roland Garros', 'Casquette issue de la collection FFT, éditée pour la Coupe Davis. Elle est ornée d\'un logo Coq sur le devant et du logo FFT sur le côté. Visière contrastante avec liseré.\r\n', 20.00, 1, 1, 2, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/04d1ef3089b3413a9c9e28d7e930d575', 60),
(17, 'Tommy Hilfigher', 'Cette casquette Tommy Hilfiger en nylon recyclé se pare du drapeau devant ainsi qu\'une patte de serrage ajustable derrière.', 25.00, 1, 1, 3, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_118/hp_mod_118399441/hp_modvar_118399450/202412110940/corp_6_panel_cap_recycled_polygris_fonceunique-1.jpg', 50),
(18, 'Samsoe Samsoe', 'Cette casquette Samsoe Samsoe en coton biologique, propose des œillets d\'aération et une fermeture boucle ajustable sur l\'arrière.', 45.00, 1, 1, 3, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_100/hp_mod_100717769/hp_modvar_119651305/202412241410/casquette_en_coton_bio_delave-1.jpg', 13),
(19, 'Rains', 'Cette casquette Rains en tissu déparlant se pare d\'une fermeture clip ajustable sur l\'arrière', 45.00, 1, 1, 3, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_366/hp_mod_36683357/hp_modvar_112013837/202407031213/cap_w1gris5unique-1.jpg', 16),
(20, 'Armani Exchange', 'Cette casquette de baseball Armani Exchange confectionnée en coton sergé, propose le logo brodésur le devant, des œillets d\'aération ainsi qu\'une fermeture snapback ajustable sur l\'arrière.', 65.00, 1, 1, 3, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=2200,height=2400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_121/hp_mod_121644595/hp_modvar_121846750/202502141603/casquette_de_baseball_en_coton_serge-1.jpg', 16),
(21, 'Calvin Klein', 'Cette casquette Calvin Klein en coton se pare d\'un patch siglé devant et d\'une patte de serrage ajustable.', 65.00, 1, 1, 3, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=2200,height=2400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_118/hp_mod_118210254/hp_modvar_118210255/202501211716/casquette_baseball_badgegris5unique-1.jpg', 14),
(22, 'OMNI', 'Cette casquette OMNI confectionnée en coton chiné uni, propose des œillets d\'aération ainsi qu\'une fermeture à patte auto-agrippante ajustable sur l\'arrière.', 25.00, 1, 1, 3, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_116/hp_mod_116825646/hp_modvar_116825647/202501071616/casquette_rapchin_coton_chine-1.jpg', 50),
(23, 'ElGanso', 'Cette casquette El Ganso réalisée en coton est dotée d’une bride ajustable, d’œillets d’aération ainsi qu’un logo brodé sur le devant.', 35.00, 1, 1, 3, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_123/hp_mod_123684027/hp_modvar_123684028/202503070859/casquette_coton_dlav_gris-1.jpg', 40),
(24, 'Barbour', 'Cette casquette Barbour conçue en coton séduit par sa signature brodée à l\'avant ainsi que sa fermeture arrière à clip ajustable.\r\n', 25.00, 1, 1, 4, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_100/hp_mod_100571469/hp_modvar_119872907/202502070834/casquette_cascade_sports_en_coton-1.jpg', 15),
(25, 'Marrine Serre', 'Cette casquette de baseball Marine Serre confectionnée en coton monogrammé, propose une fermeture à patte scratch ajustable sur l\'arrière. Housse de rangement.', 225.00, 1, 1, 4, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_112/hp_mod_112589440/hp_modvar_120973321/202501151604/casquette_de_baseball-1.jpg', 10),
(26, 'Balmain', 'Casquette en coton avec broderie Balmain Paris\r\n\r\nBroderie Balmain Paris contrastée à l\'avant\r\nPatte de réglage à l\'arrière avec boucle rectangulaire en métal argenté gravé\r\nSurpiqûres contrastées\r\nMatière principale : 100 % coton\r\nFabriqué en Bulgarie\r\nArticle : DH1XA015CB24\r\n', 225.00, 1, 1, 4, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/d88c92b975a542bf9c029c95f3dd51ff', 10),
(27, 'AMI Paris', 'Casquette en denim indigo délavé.\r\n\r\nBroderie point chaînette Ami de Coeur rouge\r\nDoublure en coton\r\nOeillets signature \"Ami Paris\"\r\nBoucle de réglage signature \"ami\"\r\nPatte de réglage\r\nCasquette taille unique, 57 cm, réglable à l\'arrière\r\nFabriquée en Italie (avec amour)\r\nTaille unique. Réglable à l\'arrière.', 120.00, 1, 1, 4, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/33b193ff5bd04a1aa4624499efc32ca6', 20),
(28, 'A BATHING APE', 'Cette casquette A Bathing Ape est conçue en denim et séduit par sa griffe brodée.', 125.00, 1, 1, 4, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_112/hp_mod_112654032/hp_modvar_112654033/202406031532/casquette_en_jean_apbleutaille_unique-1.jpg', 8),
(29, 'Patagonia', 'Cette casquette Patagonia conçue en coton biologique, présente un patch signature avant, des œillets d\'aération ainsi qu\'une bride boucle inox ajustable sur l\'arrière.', 25.00, 1, 1, 4, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/http://static.galerieslafayette.com/media/722/72264726/G_72264726_125_ZP_1.jpg', 50),
(30, 'Prada', 'Cette casquette Prada séduit par sa plaque métallique signature apposée sur le côté.', 560.00, 1, 1, 4, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_123/hp_mod_123387733/hp_modvar_123387734/202501291638/casquette_de_baseball_en_re_nylon-1.jpg', 5),
(31, 'A BATHING APE', 'Cette casquette trucker A Bathing Ape en coton et mesh ajouré séduit par sa signature brodée à l\'avant. Elle est munie d\'une visière incurvée et d\'une fermeture snapback ajustable à l\'arrière', 220.00, 1, 1, 4, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_125/hp_mod_125987394/hp_modvar_125997014/202504300822/casquette_nyc_new_erbleu_marinetaille_unique-1.jpg', 5),
(32, 'Lacoste', 'Cette casquette unie Lacoste en coton présente le logo emblématique brodé sur le devant, des œillets d\'aération et une patte de serrage avec un clip ajustable sur l\'arrière.', 60.00, 1, 1, 4, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_384/hp_mod_38441561/hp_modvar_119175038/202502181346/casquette_crocodilebleu_clairtaille_unique-1.jpg', 20),
(33, 'Ami Paris', 'T-shirt Ami de Coeur en jersey de coton biologique.\r\n\r\nCoupe classique\r\n\r\nLongueur milieu dos 58 cm (taille XS)\r\nLongueur milieu dos 66 cm (taille M)\r\nBroderie poitrine Ami de Coeur rouge\r\nBroderie \"AMI\" ton-sur-ton sous encolure dos\r\nFabriqué au Portugal (avec amour)\r\nCe modèle est unisexe. Pour l\'homme, prenez votre taille habituelle. Pour la femme, prenez une taille en dessous de votre taille habituelle.Le mannequin homme mesure 1m89 et porte une taille M.Le mannequin femme mesure 1m75 et porte une taille XS.', 120.00, 1, 2, 1, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/12dc9502b1aa43b6902908165d3eac6b', 10),
(34, 'Prada', 'Ce t-shirt droit Prada conçu en coton séduit par son col rond, sa poche poitrine zippée ornée d\'une plaque métallique siglée ainsi que ses manches courtes.', 35.00, 1, 2, 1, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/http://static.galerieslafayette.com/media/951/95188444/G_95188444_320_ZP_1.jpg', 20),
(35, 'A BATHING APE', NULL, 100.00, 1, 2, 1, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_125/hp_mod_125985455/hp_modvar_125987107/202504300822/tee_shirt_mc_collegenoir_kaki7xlarge-2.jpg', 50),
(36, 'Kenzo', 'Ce t-shirt droit Kenzo en coton présente un col rond côtelé, le logo imprimé sur la poitrine ainsi que des manches courtes.', 120.00, 1, 2, 1, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=2200,height=2400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_118/hp_mod_118890448/hp_modvar_123699036/202502121024/t_shirt-2.jpg', 10),
(37, 'Under Armour', 'Ce t-shirt ample Under Armour en coton mélangé présente un col rond, la broderie signature au niveau de la poitrine et des finitions côtelées.', 35.00, 1, 2, 1, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=2200,height=2400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_100/hp_mod_100501174/hp_modvar_113261910/202410010856/t_shirt_ample_logo_en_coton_melange-1.jpg', 20),
(38, 'Off WHITE', 'Ce t-shirt oversize Off White en coton présente un col rond et le logo Off sur le devant. Confectionné au Portugal.', 25.00, 1, 2, 1, 0, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_107/hp_mod_107582358/hp_modvar_107582359/202404041001/t_shirt_oversize_off_stamp_logotype_en_coton-1.jpg', 12),
(39, 'Balmain PARIS', NULL, 220.00, 1, 2, 1, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/810473cf91cc48f4b1ce95703e13830a', 20),
(40, 'Carhartt WIP', 'Ce t-shirt droit Carhartt Wip en coton bio est muni d\'un col rond côtelé et d\'une broderie logo signature sur le côté gauche de la poitrine.', 120.00, 1, 2, 1, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/http://static.galerieslafayette.com/media/777/77795286/G_77795286_320_ZP_2.jpg', 5),
(45, 'Carhartt WIP', 'Ce t-shirt droit Carhartt Wip en coton bio est muni d\'un col rond côtelé et d\'une broderie logo signature sur le côté gauche de la poitrine.', 120.00, 1, 2, 1, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/http://static.galerieslafayette.com/media/777/77795286/G_77795286_320_ZP_2.jpg', 5),
(41, 'Polo Ralph Lauren', 'Ce t-shirt Polo Ralph Lauren en coton présente un col rond et un imprimé sur le devant.', 126.00, 1, 2, 1, 2, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_112/hp_mod_112763982/hp_modvar_112764000/202410221447/t_shirt_imprime_polo_coton-1.jpg', 8),
(42, 'OFF White', 'Ce t-shirt droit Off White confectionné en coton présente un col rond et un imprimé sur le devant. Fabriqué au Portugal.', 25.00, 1, 2, 1, 2, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_122/hp_mod_122574003/hp_modvar_122574005/202502251147/t_shirt_fresco_en_coton-1.jpg', 8),
(43, 'A BATHING APE', 'Ce t-shirt droit A Bathing Ape conçu en coton séduit par son imprimé signature, son col rond ainsi que ses manches courtes', 125.00, 1, 2, 1, 2, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_124/hp_mod_124804932/hp_modvar_124804933/202502281418/tee_shirt_mc_transform_big_apenoir5medium-2.jpg', 5),
(44, 'The Kooples', '| T-shirt en coton | Col rond | Manches courtes | Sérigraphie devant |', 25.00, 1, 2, 1, 2, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/850af802cf5c4bc2ad40496a87306a81', 50),
(46, 'Carhartt WIP', 'Ce t-shirt droit Carhartt Wip en coton bio est muni d\'un col rond côtelé et d\'une broderie logo signature sur le côté gauche de la poitrine.', 120.00, 1, 2, 1, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/http://static.galerieslafayette.com/media/777/77795286/G_77795286_320_ZP_2.jpg', 5),
(48, 'Carhartt WIP', 'Ce t-shirt droit Carhartt Wip en coton bio est muni d\'un col rond côtelé et d\'une broderie logo signature sur le côté gauche de la poitrine.', 120.00, 1, 2, 1, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/http://static.galerieslafayette.com/media/777/77795286/G_77795286_320_ZP_2.jpg', 5),
(47, 'OMNI ', 'Ce t-shirt droit OMNI en coton se pare d\'un col rond côtelé, de manches longues et du logo cœur brodé sur le côté gauche de la poitrine.', 15.00, 1, 2, 1, 2, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_102/hp_mod_102101114/hp_modvar_104714819/202312121333/u_t_shirt_black_emblem_knit-2.jpg', 25),
(49, 'Balmain', 'T-shirt brodé Palmier\r\n\r\nCoupe décontractée\r\nCol rond avec finitions bord-côte\r\nManches courtes\r\nBroderie Palmier en perles, sequins et strass argentés à l’avant\r\nBadge PB Signature brodé en cannetille et strass argentés\r\nLe mannequin mesure 189 cm et porte une taille M\r\nMatière principale : 100 % coton\r\nFabriqué en Inde\r\nArticle : DH1EG019PC41', 1200.00, 1, 2, 1, 2, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/bdba87bb03aa445aa2f3941f4ad615b6', 3),
(50, 'Parajumpers', 'Ce t-shirt droit Parajumpers confectionné en coton, dispose d\'un col rond ainsi que d\'une poche poitrine à rabat pression munie d\'une autre poche zippée ornée d\'un cordon avec mousqueton.', 120.00, 1, 2, 1, 2, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_110/hp_mod_110994625/hp_modvar_110994626/202408231612/t_shirt_droit_mojave_poche-1.jpg', 50),
(51, 'Balmain', 'Chemise pyjama en sergé imprimé « Lettre d\'amour »\r\n\r\nCol chemise\r\nManches courtes\r\nFermeture avec 5 boutons gravés\r\nFinitions avec liseré à l\'avant\r\nCoupe décontractée\r\nLe mannequin mesure 186 cm et porte une taille 48\r\nMatière principale : 100 % viscose\r\nFabriqué en Italie\r\nArticle : EH1HN065VH47', 120.00, 1, 5, 1, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/065695b3396d45a395261e66c8b7857f', 14),
(52, 'North Face', 'Ce t-shirt droit The North Face confectionné en coton, dispose d\'un col rond, de la griffe floquée sur la poitrine et d\'un carré signature au dos.', 20.00, 1, 2, 1, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_120/hp_mod_120999339/hp_modvar_120999340/202502131315/t_shirt_droit_box_nse_coton-1.jpg', 50),
(53, 'Boss', 'Ce t-shirt BOSS en coton séduit par son motif graphique, son col rond ainsi que ses manches courtes.\r\n', 30.00, 1, 2, 1, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_119/hp_mod_119684655/hp_modvar_123020055/202503141123/tee_beetle_10270243_01_001_black-1.jpg', 50),
(54, 'Patagonia', 'Ce t-shirt droit Patagonia composé de coton recyclé, est muni d\'un col rond côtelé, de la signature appliquée en contraste sur la poitrine ainsi que floquée en oversize au dos.', 50.00, 1, 2, 1, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/http://static.galerieslafayette.com/media/675/67561892/G_67561892_320_ZP_1.jpg', 20),
(55, 'Shott', 'Execution error ! (error message = \'invalid syntax (, line 2)\', current value = \'[\'T-shirt imprim\\xc3\\xa9\\n\\nCol rond et manches courtes\\nImprim\\xc3\\xa9 logo Schott NYC\\xc2\\xae poitrine\', \'\']\')', 0.00, 1, 2, 1, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/550f5b7154f148fcb16d14338eaf9fa3', 60),
(57, 'Shott', 'Execution error ! (error message = \'invalid syntax (, line 2)\', current value = \'[\'T-shirt imprim\\xc3\\xa9\\n\\nCol rond et manches courtes\\nImprim\\xc3\\xa9 logo Schott NYC\\xc2\\xae poitrine\', \'\']\')', 0.00, 1, 2, 1, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/550f5b7154f148fcb16d14338eaf9fa3', 60),
(56, 'Paris Kenzo', 'Ce t-shirt droit Kenzo en coton présente un col rond, des manches courtes ainsi qu’un Boke Flower imprimé à l\'avant', 0.00, 1, 2, 1, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_118/hp_mod_118890298/hp_modvar_123699148/202502110930/t_shirt-2.jpg', 50),
(58, 'Vilbrequin', '•T-shirt col rond\r\n•Manches courtes\r\n•Broderie Tortue ton sur ton sur la poitrine\r\n•La légèreté du lin apporte un confort maximal\r\n•T-Shirt Col rond\r\n•T-Shirt Col rond uni\r\n•100% coton organique', 25.00, 1, 2, 1, 4, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/486652de20f14f57850d3736771ba215', 50),
(60, 'Vilbrequin', '•T-shirt col rond\r\n•Manches courtes\r\n•Broderie Tortue ton sur ton sur la poitrine\r\n•La légèreté du lin apporte un confort maximal\r\n•T-Shirt Col rond\r\n•T-Shirt Col rond uni\r\n•100% coton organique', 25.00, 1, 2, 1, 4, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/486652de20f14f57850d3736771ba215', 50),
(59, 'Vilbrequin', '•T-shirt col rond\r\n•Manches courtes\r\n•Broderie Tortue ton sur ton sur la poitrine\r\n•La légèreté du lin apporte un confort maximal\r\n•T-Shirt Col rond\r\n•T-Shirt Col rond uni\r\n•100% coton organique', 25.00, 1, 2, 1, 5, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/486652de20f14f57850d3736771ba215', 50),
(61, 'Balmain', 'T-shirt imprimé Club Balmain Signature\r\n\r\nCoupe droite\r\nCol rond avec finitions bord-côte\r\nManches courtes\r\nLogo Palmier Balmain Signature contrasté imprimé à l’avant\r\nImprimé Balmain Club au dos\r\nLe mannequin mesure 189 cm et porte une taille M\r\nMatière principale : 100 % coton\r\nFabriqué au Portugal\r\nArticle : DH1EG000GD82\r\n100 % des fibres de coton de ce vêtement sont issues de l’agriculture biologique et certifiées', 120.00, 1, 2, 2, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/68157a3dfa1f410eb19ce3516ff762b3', 40),
(62, 'Ami Paris', 'T-shirt Ami de Coeur en jersey de coton biologique.\r\n\r\nCoupe classique\r\nProduit unisexe\r\nLongueur milieu dos 58 cm (taille XS)\r\nLongueur milieu dos 66 cm (taille M)\r\nBroderie poitrine Ami de Coeur rouge\r\nBroderie \"AMI\" ton-sur-ton sous encolure dos\r\nFabriqué au Portugal (avec amour)\r\nCe modèle est unisexe. Pour l\'homme, prenez votre taille habituelle. Pour la femme, prenez une taille en dessous de votre taille habituelle.Le mannequin homme mesure 1m89 et porte une taille M.Le mannequin femme mesure 1m75 et porte une taille XS.', 120.00, 1, 2, 2, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/35e9fe01e95740e4aebd58be2d826a4e', 50),
(63, 'Eden Park', 'Ce t-shirt droit Eden Park confectionné en coton, dispose d\'un col rond piqué et du logo brodé sur le côté gauche de la poitrine.', 60.00, 1, 2, 2, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/http://static.galerieslafayette.com/media/751/75143880/G_75143880_85_ZP_2.jpg', 50),
(64, 'Armani ', 'Ce t-shirt droit Armani Exchange confectionné en coton présente un col rond et séduit par sa broderie signature voilier sur le devant.', 70.00, 1, 2, 2, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_118/hp_mod_118214001/hp_modvar_118214003/202504111708/t_shirt_a_broderie_en_coton-1.jpg', 50),
(65, 'Eden Park', 'Ce t-shirt Eden Park en coton présente un col rond, la broderie noeud papillon signature au niveau de la poitrine et une broderie logotypée au dos.', 0.00, 1, 2, 2, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_121/hp_mod_121747345/hp_modvar_121747348/202503030922/t_shirt_droit_quartier_a_broderie_logo_en_coton-1.jpg', 50),
(66, 'A BATHING AP', '\r\nCe t-shirt droit A Bathing Ape conçu en coton séduit par son imprimé signature, son col rond ainsi que ses manches courtes.', 55.00, 1, 2, 2, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_124/hp_mod_124804892/hp_modvar_124804901/202502281418/tee_shirt_mc_big_ape_headblanc7xlarge-2.jpg', 50),
(67, 'Loewe', 'Ce t-shirt droit Loewe en coton présente un col rond, des roses floquées sur la poitrine et au dos ainsi que des manches courtes.', 120.00, 1, 2, 2, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_125/hp_mod_125868025/hp_modvar_125868026/202504111550/relaxed_fit_t_shirt-1.jpg', 20),
(68, 'North Sails', 'Ce t-shirt droit North Sails confectionné en jersey de coton uni, dispose d\'un col rond et du logo emblématique étiqueté sur le devant.', 60.00, 1, 2, 2, 2, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_121/hp_mod_121970400/hp_modvar_121970440/202501230834/t_shirt_droit_uni_jersey_coton-1.jpg', 50),
(69, 'Comme des garçons', 'Ce t-shirt droit Comme des Garçons PLAY en coton se pare d\'un col rond côtelé et d\'une application contrastante de 2 cœurs devant.', 30.00, 1, 2, 2, 2, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_102/hp_mod_102107510/hp_modvar_113623233/202504021029/u_t_shirt_red_emblem_knit-2.jpg', 50),
(70, 'Comme des  garçons', 'Ce t-shirt droit Comme des Garçons PLAY en coton se pare d\'un col rond côtelé, d\'une application d\'un cœur camouflage devant ainsi qu\'un petit cœur contrastant brodé sur le côté gauche de la poitrine.', 120.00, 1, 2, 2, 2, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_102/hp_mod_102110659/hp_modvar_113623331/202411191730/u_t_shirt_red_emblem_knit-2.jpg', 50),
(71, 'Kenzo Paris', 'Ce t-shirt droit Kenzo en coton se distingue par son col rond côtelé et du logo Kenzo Paris devant avec signature.', 120.00, 1, 2, 2, 2, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_111/hp_mod_111012323/hp_modvar_117484338/202409130648/t_shirt-1.jpg', 20),
(72, 'Frescobol Carioca', 'Ce t-shirt droit Frescobol Carioca confectionné en coton et lin, dispose d\'un col rond ainsi que d\'un motif et d\'un message sur le devant et au dos.', 50.00, 1, 2, 2, 2, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_111/hp_mod_111940681/hp_modvar_111940685/202408260906/t_shirt_droit_dinis_clube_de_praia-1.jpg', 50),
(73, 'Kenzo', 'Ce t-shirt droit Kenzo en coton présente un col rond, des manches courtes ainsi qu’un Boke Flower imprimé à l\'avant.', 120.00, 1, 2, 2, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_118/hp_mod_118890298/hp_modvar_121726172/202501080859/t_shirt-1.jpg', 50),
(74, 'Lacoste', 'Ce t-shirt droit Lacoste confectionné en coton uni, dispose d\'un col rond et du crocodile emblématique sur le devant.\r\n', 30.00, 1, 2, 2, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_100/hp_mod_100368900/hp_modvar_107653226/202404090840/t_shirt_droit_a_logo_crocodile_en_coton-1.jpg', 50),
(75, 'AMI Paris', 'T-shirt Ami de Coeur en jersey de coton biologique.\r\n\r\nCoupe classique\r\nProduit unisexe\r\nLongueur milieu dos 58 cm (taille XS)\r\nLongueur milieu dos 66 cm (taille M)\r\nBroderie poitrine Ami de Coeur rouge\r\nBroderie \"AMI\" ton-sur-ton sous encolure dos\r\nFabriqué au Portugal (avec amour)', 50.00, 1, 2, 4, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/295df51ef0fe494bac62b96e8e99d62f', 50),
(76, 'AMI Paris', 'T-shirt Ami de Coeur en jersey de coton biologique.\r\n\r\nCoupe classique\r\n\r\nBroderie poitrine Ami de Coeur écru\r\nBroderie \"AMI\" ton sur ton sous encolure dos    \r\nFabriqué au Portugal (avec amour)', 60.00, 1, 2, 4, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/3edd456ed05841388c34a36620ef8b72', 50),
(77, 'Balenciaga', 'Ce t-shirt ample Balenciaga en coton présente un col rond, une signature brodée sur le devant ainsi que des manches courtes.', 120.00, 1, 2, 4, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_124/hp_mod_124822316/hp_modvar_124822793/202504161624/medium_fit_t_shirt-2.jpg', 50),
(78, 'Jacquemus', 'Ce t-shirt coupe décontractée Jacquemus confectionné en jersey de coton biologique, propose un col rond ras-du-cou à côtes, le logo signature contrasté brodé sur la poitrine ainsi qu\'un motif haltères et logo brodés au dos.', 120.00, 1, 2, 4, 1, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_121/hp_mod_121441128/hp_modvar_121441150/202501270855/le_t_shirt_halteres-1.jpg', 50),
(79, 'Kenzo', 'Ce t-shirt ample Kenzo en coton présente un col rond côtelé, une signature brodée sur la poitrine, une libellule siglée brodée au dos ainsi que des manches courtes.', 50.00, 1, 2, 4, 2, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_118/hp_mod_118890320/hp_modvar_123699119/202502110930/t_shirt-2.jpg', 50),
(80, 'Eden Park', 'Ce t-shirt droit Eden Park en coton présente un col rond, des manches courtes contrastantes, le patch signature au niveau de la poitrine et une broderie iconique au dos.', 130.00, 1, 2, 4, 2, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_121/hp_mod_121977341/hp_modvar_121977342/202502251104/t_shirt_droit_en_coton_a_logo-1.jpg', 50),
(81, 'Balenciaga', 'Ce t-shirt ample Balenciaga en coton séduit par son tissu destroy. Il présente un col rond, un message floqué devant ainsi que des manches courtes.', 150.00, 1, 2, 3, 4, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_124/hp_mod_124822812/hp_modvar_124822813/202504171309/shifted_t_shirt-2.jpg', 20),
(82, 'AMI Paris', 'T-shirt Ami de Coeur en jersey de coton biologique.\r\n\r\nCoupe boxy\r\nProduit unisexe\r\n\r\nBroderie poitrine Ami de Coeur ton sur ton\r\nBroderie \"AMI\" ton sur ton sous encolure dos \r\nFabriqué au Portugal (avec amour)', 120.00, 1, 2, 3, 4, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/5b2495beafd9445b87423a145c503a2b', 20),
(83, 'AMIRI', 'Ce t-shirt droit Amiri conçu en coton séduit par sa signature imprimée sur la poitrine, son col rond ainsi que ses manches courtes. Fabriqué en Italie.\r\n', 90.00, 1, 2, 3, 4, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_115/hp_mod_115246002/hp_modvar_121826519/202502251001/ma_core_logo_tee-2.jpg', 50),
(84, 'A BATHING APE', 'Ce t-shirt droit A Bathing Ape conçu en coton séduit par son imprimé signature, son col rond ainsi que ses manches courtes.', 120.00, 1, 2, 3, 4, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_123/hp_mod_123185186/hp_modvar_123185196/202502050956/tee_shirt_mc_college_relaxed_fgris6large-2.jpg', 50),
(85, 'KENZO', 'Ce t-shirt droit Kenzo en coton présente un col rond côtelé, un tigre et une signature brodés sur la poitrine ainsi que des manches courtes.', 50.00, 1, 2, 3, 4, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_118/hp_mod_118888488/hp_modvar_123699117/202502111258/t_shirt-2.jpg', 50),
(86, 'A.P.C', 'Ce t-shirt droit A.P.C. en coton présente un col rond, des manches courtes, la signature brodée sur la poitrine ainsi que des finitions côtelées. Made in Portugal.\r\n', 100.00, 1, 2, 3, 4, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_111/hp_mod_111829917/hp_modvar_121964645/202503060749/t_shirt_droit_rue_madame_paris_en_coton-1.jpg', 50),
(87, 'Hacket Londo', 'Ce t-shirt droit Hackett London en coton présente un col rond, des manches courtes, le monogramme brodé sur la poitrine et des détails côtelés au col. Il arbore une double surpiqûre sur les manches et à l\'ourlet et une bande en sergé contrastante à l\'intérieur du col.', 50.00, 1, 2, 3, 4, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/14c843d302a944319243f919df3b4a93', 50),
(88, 'SCHOTT', 'Execution error ! (error message = \'invalid syntax (, line 2)\', current value = \'[\'T-shirt brod\\xc3\\xa9 Schott NYC\\xc2\\xae\\n\\nCol rond et manches courtes\\nLogo brod\\xc3\\xa9 poitrine\', \'\']\')', 35.00, 1, 2, 3, 4, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/d8e1866f32164b6895a891f4caccad25', 50),
(89, 'KENZO', 'Ce t-shirt droit Kenzo en coton est présente un col rond côtelé, un grand imprimé Lucky Tiger à l\'avant, une signature brodée au dos ainsi que des manches courtes.', 90.00, 1, 2, 3, 4, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_118/hp_mod_118891634/hp_modvar_123699006/202502110930/t_shirt-2.jpg', 50),
(90, 'Serge Blanco', 'Ce t-shirt vert army en coton est idéal pour afficher fièrement votre soutien au célèbre Rugby Club Toulonnais. En édition limitée RCT x SERGE BLANCO, il arbore sur la poitrine le badge SERGE BLANCO et le logo brodé en couleur du Rugby Club Toulonnais. Afin de rappeler à tous les succès de votre équipe préférée, le dos dispose d\'un print Triplé Histoire avec les trois étoiles et dates, ainsi que les dates emblématiques du triplé de la coupe d\'Europe.\r\n\r\n\r\n- Col rond\r\n- Broderie logo Rugby Club Toulonnais en couleur\r\n- Badge SERGE BLANCO sur la poitrine côté cœur\r\n- Print TRIPLÉ HISTORIQUE dans le dos\r\n- Édition limitée collection RUGBY CLUB TOULONNAIS X SERGE BLANC', 32.00, 1, 2, 3, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/SOURCE/8f9b395184c34e3b96d86c29cd6328d8', 20),
(91, 'Replay', 'Ce t-shirt droit Replay en coton est muni d\'un col rond et de patchs fantaisie sur le devant.', 30.00, 1, 2, 3, 4, 'https://static.galerieslafayette.com/cdn-cgi/image/width=2200,height=2400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_120/hp_mod_120631871/hp_modvar_120631873/202502051620/t_shirt_patchs_coton-1.jpg', 50),
(92, 'BOSS', 'Ce t-shirt droit BOSS en jersey de coton se pare d\'un col rond côtelé et de la signature sur la poitrine.', 20.00, 1, 2, 3, 4, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_119/hp_mod_119682393/hp_modvar_120200062/202412031553/tee_tape_logo_10269604_01_gris_fonce_m-1.jpg', 50),
(93, 'Calvin Klein', 'Ce pantalon ajusté Calvin Klein en jersey stretch présente une taille à cordon de serrage, une fermeture à glissière rehaussée d\'un bouton pression, des pinces sur le devant, 2 poches italiennes sur les côtés et 2 poches plaquées au dos.', 120.00, 1, 3, 1, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_582/hp_mod_58243591/hp_modvar_118210163/202412301350/pant_comfort_jognoir30_34-1.jpg', 40),
(94, 'Calvin Klein', 'Ce pantalon ajusté Calvin Klein en jersey stretch présente une taille à cordon de serrage, une fermeture à glissière rehaussée d\'un bouton pression, des pinces sur le devant, 2 poches italiennes sur les côtés et 2 poches plaquées au dos.', 120.00, 1, 3, 1, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_582/hp_mod_58243591/hp_modvar_118210163/202412301350/pant_comfort_jognoir30_34-1.jpg', 40),
(95, 'BALENCIAGA', 'Ce pantalon de jogging Balenciaga en coton molleton propose une taille élastiquée, une signature brodée sur la cuisse gauche ainsi que des poches latérales.', 1200.00, 1, 3, 1, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_124/hp_mod_124822762/hp_modvar_124822763/202503171644/baggy_sweatpants-1.jpg', 40),
(96, 'nike', 'nike', 500.00, 2, 2, 1, 3, 'https://static.galerieslafayette.com/cdn-cgi/image/width=1284,height=1400,quality=85,format=auto,fit=pad,background=white/media/images/hp_mod_125/hp_mod_125868025/hp_modvar_125868026/202504111550/relaxed_fit_t_shirt-1.jpg', 20);
COMMIT;

-- --------------------------------------------------------

--
-- Structure de la table `size`
--

DROP TABLE IF EXISTS `size`;
CREATE TABLE IF NOT EXISTS `size` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `size`
--

INSERT INTO `size` (`id`, `name`) VALUES
(1, 'xs'),
(2, 's'),
(3, 'm'),
(4, 'l'),
(5, 'xl');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
