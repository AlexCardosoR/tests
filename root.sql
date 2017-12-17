-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 17 déc. 2017 à 20:31
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `root`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `login` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`login`, `password`) VALUES
('root', 'root');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `titre` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `lien` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `guid` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `categorie` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`guid`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`titre`, `description`, `lien`, `guid`, `date`, `categorie`) VALUES
('Voile : « François Gabart était plus loin d’une terre habitée que Thomas Pesquet »', 'Christian Le Pape, directeur du centre d’entraînement des marins français, revient sur le record du navigateur français, qui a parcouru le tour du monde en solitaire en quarante-deux jours et seize heures.', 'http://www.lemonde.fr/voile/article/2017/12/17/voile-francois-gabart-etait-plus-loin-d-une-terre-habitee-que-thomas-pesquet_5230975_1616887.html', 47, '2017-12-17', 'Sport'),
('Street-art : l’artiste secret Invader tombe le masque', 'Il n’existe pas de photo de lui. Rencontre à visage découvert avec l’artiste qui est réputé pour les mosaïques qu’il pose sur les murs de Paris et d’ailleurs', 'http://www.lemonde.fr/livres/article/2017/12/17/beaux-livres-street-art-invader-tombe-le-masque_5230967_3260.html', 49, '2017-12-17', 'Livres'),
('Thales veut s’offrir Gemalto, leader mondial des cartes SIM', 'Malgré cette proposition d’achat que son conseil d’administration recommande, Gemalto a laissé la porte ouverte à une éventuelle meilleure offre.', 'http://www.lemonde.fr/entreprises/article/2017/12/17/thales-veut-s-offrir-gemalto-leader-mondial-des-cartes-sim_5230993_1656994.html', 50, '2017-12-17', 'Entreprises'),
('Biathlon : journée triomphale pour Justine Braisaz et Martin Fourcade', 'Devant leur public, au Grand-Bornand, les Français se sont imposés lors de l’épreuve de mass start.', 'http://www.lemonde.fr/sports-de-glisse/article/2017/12/17/biathlon-la-francaise-justine-braisaz-remporte-sa-premiere-victoire-en-coupe-du-monde_5231018_1616666.html', 51, '2017-12-17', 'Sport'),
('Philippines : des glissements de terrain font des dizaines de morts', 'Au moins 26 personnes ont perdu la vie à cause de la tempête tropicale Kai-Tak dans une île du centre de l’archipel.', 'http://www.lemonde.fr/asie-pacifique/article/2017/12/17/philippines-des-glissements-de-terrain-font-des-dizaines-de-morts_5231015_3216.html', 52, '2017-12-17', 'International'),
('« Service public itinérant » : dans l’Aisne, un camping-car crée du lien auprès des habitants', 'Deux agentes sillonnent chaque mois les trente-deux communes de la Thiérache, dans le nord du département. Une expérimentation réussie.', 'http://www.lemonde.fr/bleds-a-part/article/2017/12/17/service-public-itinerant-dans-l-aisne-un-camping-car-cree-du-lien-aupres-des-habitants_5230971_5227802.html', 53, '2017-12-17', 'Public'),
('Ligue 1 : le couac de la « goal line technology »', 'Le match de samedi entre Amiens et Troyes a mis en lumière les défaillances de l’assistance vidéo qui sera généralisée la saison prochaine.', 'http://www.lemonde.fr/ligue-1/article/2017/12/17/ligue-1-le-couac-de-l-arbitrage-video_5231022_1616940.html', 54, '2017-12-17', 'Sport'),
('Autriche : l’extrême droite obtient trois ministères régaliens', 'Le FPÖ dirigera notamment la défense, l’intérieur et les affaires étrangères, selon l’accord de coalition présenté samedi.', 'http://www.lemonde.fr/europe/article/2017/12/16/autriche-l-extreme-droite-obtient-les-ministeres-de-l-interieur-de-la-defense-et-des-affaires-etrangeres_5230852_3214.html', 55, '2017-12-16', 'International'),
('Miss Nord-Pas-de-Calais élue Miss France 2018', 'Maëva Coucke, 23 ans, est étudiante en première année de licence de droit.', 'http://www.lemonde.fr/societe/article/2017/12/17/miss-nord-pas-de-calais-elue-miss-france-2018_5230895_3224.html', 56, '2017-12-17', 'Société'),
('Dany Boon : « J’ai réparé l’irréparable »', 'L’humoriste qui fête ses vingt-cinq ans de scène à l’Olympia, raconte l’histoire compliquée de sa famille et ses années de galère.', 'http://www.lemonde.fr/culture/article/2017/12/17/dany-boon-j-ai-repare-l-irreparable_5230908_3246.html', 57, '2017-12-16', 'Culture'),
('Accident de Millas : les barrières du passage à niveau étaient levées, selon la conductrice du bus', 'Décorations de Noël enlevées, drapeaux en berne, illuminations éteintes : les Pyrénées-Orientales portent le deuil, samedi, des victimes de la collision entre un train et un autocar scolaire.', 'http://www.lemonde.fr/societe/article/2017/12/16/accident-de-millas-les-barrieres-du-passage-a-niveau-etaient-levees-selon-la-conductrice-du-bus_5230846_3224.html', 58, '2017-12-16', 'Société'),
('Street-art : l’artiste secret Invader tombe le masque', 'Il n’existe pas de photo de lui. Rencontre à visage découvert avec l’artiste qui est réputé pour les mosaïques qu’il pose sur les murs de Paris et d’ailleurs', 'http://www.lemonde.fr/livres/article/2017/12/17/beaux-livres-street-art-invader-tombe-le-masque_5230967_3260.html', 59, '2017-12-17', 'Livres'),
('Thales veut s’offrir Gemalto, leader mondial des cartes SIM', 'Malgré cette proposition d’achat que son conseil d’administration recommande, Gemalto a laissé la porte ouverte à une éventuelle meilleure offre.', 'http://www.lemonde.fr/entreprises/article/2017/12/17/thales-veut-s-offrir-gemalto-leader-mondial-des-cartes-sim_5230993_1656994.html', 60, '2017-12-17', 'Entreprises'),
('Biathlon : journée triomphale pour Justine Braisaz et Martin Fourcade', 'Devant leur public, au Grand-Bornand, les Français se sont imposés lors de l’épreuve de mass start.', 'http://www.lemonde.fr/sports-de-glisse/article/2017/12/17/biathlon-la-francaise-justine-braisaz-remporte-sa-premiere-victoire-en-coupe-du-monde_5231018_1616666.html', 61, '2017-12-17', 'Sport'),
('Philippines : des glissements de terrain font des dizaines de morts', 'Au moins 26 personnes ont perdu la vie à cause de la tempête tropicale Kai-Tak dans une île du centre de l’archipel.', 'http://www.lemonde.fr/asie-pacifique/article/2017/12/17/philippines-des-glissements-de-terrain-font-des-dizaines-de-morts_5231015_3216.html', 62, '2017-12-17', 'International'),
('« Service public itinérant » : dans l’Aisne, un camping-car crée du lien auprès des habitants', 'Deux agentes sillonnent chaque mois les trente-deux communes de la Thiérache, dans le nord du département. Une expérimentation réussie.', 'http://www.lemonde.fr/bleds-a-part/article/2017/12/17/service-public-itinerant-dans-l-aisne-un-camping-car-cree-du-lien-aupres-des-habitants_5230971_5227802.html', 63, '2017-12-17', 'Public'),
('Ligue 1 : le couac de la « goal line technology »', 'Le match de samedi entre Amiens et Troyes a mis en lumière les défaillances de l’assistance vidéo qui sera généralisée la saison prochaine.', 'http://www.lemonde.fr/ligue-1/article/2017/12/17/ligue-1-le-couac-de-l-arbitrage-video_5231022_1616940.html', 64, '2017-12-17', 'Sport'),
('Autriche : l’extrême droite obtient trois ministères régaliens', 'Le FPÖ dirigera notamment la défense, l’intérieur et les affaires étrangères, selon l’accord de coalition présenté samedi.', 'http://www.lemonde.fr/europe/article/2017/12/16/autriche-l-extreme-droite-obtient-les-ministeres-de-l-interieur-de-la-defense-et-des-affaires-etrangeres_5230852_3214.html', 65, '2017-12-16', 'International'),
('Miss Nord-Pas-de-Calais élue Miss France 2018', 'Maëva Coucke, 23 ans, est étudiante en première année de licence de droit.', 'http://www.lemonde.fr/societe/article/2017/12/17/miss-nord-pas-de-calais-elue-miss-france-2018_5230895_3224.html', 66, '2017-12-17', 'Société'),
('Dany Boon : « J’ai réparé l’irréparable »', 'L’humoriste qui fête ses vingt-cinq ans de scène à l’Olympia, raconte l’histoire compliquée de sa famille et ses années de galère.', 'http://www.lemonde.fr/culture/article/2017/12/17/dany-boon-j-ai-repare-l-irreparable_5230908_3246.html', 67, '2017-12-16', 'Culture'),
('Accident de Millas : les barrières du passage à niveau étaient levées, selon la conductrice du bus', 'Décorations de Noël enlevées, drapeaux en berne, illuminations éteintes : les Pyrénées-Orientales portent le deuil, samedi, des victimes de la collision entre un train et un autocar scolaire.', 'http://www.lemonde.fr/societe/article/2017/12/16/accident-de-millas-les-barrieres-du-passage-a-niveau-etaient-levees-selon-la-conductrice-du-bus_5230846_3224.html', 68, '2017-12-16', 'Société');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
