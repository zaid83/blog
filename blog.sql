-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 06 avr. 2023 à 15:35
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_article` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_article` datetime NOT NULL,
  `author` int(11) NOT NULL,
  `valid` int(11) NOT NULL DEFAULT 3,
  `Signalements` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_article`),
  KEY `author` (`author`),
  KEY `valid` (`valid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `title`, `img_article`, `content`, `date_article`, `author`, `valid`, `Signalements`) VALUES
(1, 'Dragon Ball, meilleur manga de l\'histoire ?', 'https://cherry.img.pmdstatic.net/fit/https.3A.2F.2Fimg.2Egaming.2Egentside.2Ecom.2Fs3.2Ffrgsg.2Fmanga.2Fdefault_2022-07-06_1fec0ff2-86e8-42c3-9582-ab04a9f8a700.2Ejpeg/640x360/quality/80/dragon-ball.jpg', 'Paru en 1984, Dragon Ball est considéré pour beaucoup comme le plus grand manga de l\'histoire. Si le débat est toujours vif entre les fans de l\'œuvre d\'Akira Toriyama et ceux de One Piece, Naruto, Bleach, SNK, Berserk et consorts, il est un point sur lequel tout le monde s\'accorde : le marché de la bande dessinée japonaise n\'aurait pas été ce qu\'il est en France et dans le monde sans le succès rencontré par les aventures de Son Goku.\r\n\r\nAu fil des années, les fans se sont forgés des souvenirs mémorables, à travers les pages du manga et les moments épiques de la série animée. On vous laisse découvrir le tome qui a recueilli le plus d\'évaluations positives auprès des lecteurs francophones.\r\nLa fin de la saga Namek, un concentré d\'émotions\r\n\r\nConsidéré comme une référence dans le domaine de la critique de produits culturels (jeux vidéo, films, BD et mangas), le site SensCritique permet à ses utilisateurs de noter chaque volume pris individuellement. Si le jugement des lecteurs inscrits sur le site ne fait pas office de vérité absolue, il donne tout de même une bonne indication de ce que pensent les passionnés. Le résultat est sans appel : le tome 27 de Dragon Ball est le préféré des fan.\r\n\r\nAvec une note moyenne de 8,5 sur 10, il devance nettement les autres volumes du manga culte. Il faut dire que le scénario du volume est haletant, puisqu\'on y voit pour la première fois Goku en mode Super Saiyen, ainsi que le dénouement de l\'arc Namek. Le combat épique opposant Goku à Freezer dans un décor en ruines est sans nul doute l\'un des passages les plus mémorables de l\'histoire.', '2023-04-06 16:08:50', 5, 2, ''),
(3, 'One Piece vraiment surcoté ?', 'https://static1.purebreak.com/articles/5/22/06/05/@/770730-one-piece-en-serie-live-action-sur-netfl-cover-3.jpg', 'Des épisodes très (très) courts\r\nChaque semaine on se fait avoir. On lance un épisode de One Piece en espérant avoir le droit à 20 minutes de kiff et en réalité, on se fait voler entre 3 et 5 minutes en moyenne, la faute à l\'introduction de l\'univers par une voix off, aux génériques d\'intro et outro + au récap des épisodes récents. Oui, les créateurs de l\'anime se fichent totalement de nous et arrivent parfois à nous proposer des épisodes de... 15 minutes (une fois, il nous a même semblé qu\'un épisode n\'avait duré que 11 minutes !). Le pire ? Comme vous allez le voir ci-dessous, ces 15 minutes ne sont même pas pleines...\r\n\r\nTrop d\'arrêts sur images\r\nFaire un anime, ça coûte cher et ça demande du temps. Pas de chances pour les créateurs de One Piece, étant donné qu\'ils doivent fournir un épisode par semaine toute l\'année, ils subissent un budget restreint et n\'ont absolument pas le luxe de préparer longuement ce qu\'ils doivent animer. Résultat ? On ne compte plus le nombre de plans totalement figés et inutiles sur le ciel ou des personnages qui se regardent, où seuls des dialogues se font entendre. Bah oui, c\'est économique et rapide à faire. Et on est gentil, on ne parle même pas des scènes réutilisées avec l\'effet miroir...\r\n\r\nUn abus de flashbacks\r\nLe moins que l\'on puisse dire, c\'est que les créateurs de l\'anime ne sont jamais à court d\'idées quand il s\'agit de faire des économies sur l\'animation et de gagner quelques minutes de temps d\'antenne. Ainsi, quand ils ne se contentent pas de plans fixes, ils nous balancent à la figure des flashbacks interminables sur des épisodes précédents. Malheureusement, la plupart de ces flashbacks concernent des événements relativement récents que l\'on a encore parfaitement en tête. Cela tue donc immédiatement leur intérêt et nous donne une nouvelle fois envie de tout péter. A ce rythme-là, être animateur sur One Piece ressemble plus à un emploi fictif qu\'autre chose... Merci à l\'inventeur de la touche &quot;avance rapide&quot;.\r\n\r\nDes épisodes très (très) courts\r\nChaque semaine on se fait avoir. On lance un épisode de One Piece en espérant avoir le droit à 20 minutes de kiff et en réalité, on se fait voler entre 3 et 5 minutes en moyenne, la faute à l\'introduction de l\'univers par une voix off, aux génériques d\'intro et outro + au récap des épisodes récents. Oui, les créateurs de l\'anime se fichent totalement de nous et arrivent parfois à nous proposer des épisodes de... 15 minutes (une fois, il nous a même semblé qu\'un épisode n\'avait duré que 11 minutes !). Le pire ? Comme vous allez le voir ci-dessous, ces 15 minutes ne sont même pas pleines...\r\n\r\n\r\nTrop d\'arrêts sur images\r\nFaire un anime, ça coûte cher et ça demande du temps. Pas de chances pour les créateurs de One Piece, étant donné qu\'ils doivent fournir un épisode par semaine toute l\'année, ils subissent un budget restreint et n\'ont absolument pas le luxe de préparer longuement ce qu\'ils doivent animer. Résultat ? On ne compte plus le nombre de plans totalement figés et inutiles sur le ciel ou des personnages qui se regardent, où seuls des dialogues se font entendre. Bah oui, c\'est économique et rapide à faire. Et on est gentil, on ne parle même pas des scènes réutilisées avec l\'effet miroir...\r\n\r\n\r\nPlus frustrant encore, les créateurs ne peuvent également pas s\'empêcher de faire des gros plans (fixes) sur chacun des membres de l\'équipage dès qu\'une surprise (bonne ou mauvaise) apparait à l\'écran. De quoi leur permettre de gratter facilement 30/45 secondes à chaque fois et plomber le rythme de l\'intrigue. Ce n\'est plus un anime mais un Powerpoint par instant... Or, seul l\'anime La voie du tablier maîtrise le concept !\r\n\r\nUn abus de flashbacks\r\nLe moins que l\'on puisse dire, c\'est que les créateurs de l\'anime ne sont jamais à court d\'idées quand il s\'agit de faire des économies sur l\'animation et de gagner quelques minutes de temps d\'antenne. Ainsi, quand ils ne se contentent pas de plans fixes, ils nous balancent à la figure des flashbacks interminables sur des épisodes précédents. Malheureusement, la plupart de ces flashbacks concernent des événements relativement récents que l\'on a encore parfaitement en tête. Cela tue donc immédiatement leur intérêt et nous donne une nouvelle fois envie de tout péter. A ce rythme-là, être animateur sur One Piece ressemble plus à un emploi fictif qu\'autre chose... Merci à l\'inventeur de la touche &quot;avance rapide&quot;.\r\n\r\nDes intrigue à rallonge\r\nAvec un rythme de diffusion d\'un épisode par semaine, l\'anime est extrêmement proche du rythme de publication du manga de Eiichiro Oda. Or, si sur le papier c\'est plutôt cool (moins de risques de spoilers, moins de frustration), la réalité est bien différente. Afin de ne pas dépasser l\'oeuvre du mangaka, les créateurs de la série usent en effet d\'une technique extrêmement chiante : celle d\'étirer au maximum la moindre intrigue et sous-intrigue.\r\n\r\nAinsi, là où Luffy passerait une case à aller aux toilettes dans le manga, cette scène pourrait ensuite durer 15 minutes dans l\'anime afin de gagner un maximum de temps. Et c\'est comme ça pour absolument tout (combats, repas, recherches, disputes, transformations...), ce qui atténue grandement le côté badass des séquences (notamment les scènes d\'action) et nous plonge dans un niveau d\'overdose déprimant. C\'est quand même grave de savoir que l\'on peut facilement sauter deux épisodes et réaliser que l\'on n\'a rien loupé... Un foutage de gu*ule assumé.\r\n\r\nUne OST répétitive\r\nC\'est un fait, l\'OST de One Piece est excellente. Chaque musique est cool, bien trouvée et trouve parfaitement sa place dans nos playlists. Le problème ? Quand un anime possède près de 1000 épisodes avec un budget restreint, l\'équipe ne peut logiquement pas créer de nouveaux sons pour chaque nouvelle scène. De fait, on a rapidement envie de s\'éclater la tête contre un mur à force d\'entendre pour la 300ème fois la même musique utilisée pour tout et n\'importe quoi. Ce n\'est plus de la radinerie à ce niveau-là, c\'est de la flemme.\r\n\r\nMention spéciale à la chanson Le Bon Rhum de Binks de Brook qui est passée de &quot;wow, elle est vraiment stylée&quot; à &quot;mais bordel, c\'est quoi ce musicien incapable d\'innover, apprenez-lui un autre morceau&quot; extrêmement rapidement. Un enfer.\r\n\r\nDes épisodes très (très) courts\r\nChaque semaine on se fait avoir. On lance un épisode de One Piece en espérant avoir le droit à 20 minutes de kiff et en réalité, on se fait voler entre 3 et 5 minutes en moyenne, la faute à l\'introduction de l\'univers par une voix off, aux génériques d\'intro et outro + au récap des épisodes récents. Oui, les créateurs de l\'anime se fichent totalement de nous et arrivent parfois à nous proposer des épisodes de... 15 minutes (une fois, il nous a même semblé qu\'un épisode n\'avait duré que 11 minutes !). Le pire ? Comme vous allez le voir ci-dessous, ces 15 minutes ne sont même pas pleines...\r\n\r\nTrop d\'arrêts sur images\r\nFaire un anime, ça coûte cher et ça demande du temps. Pas de chances pour les créateurs de One Piece, étant donné qu\'ils doivent fournir un épisode par semaine toute l\'année, ils subissent un budget restreint et n\'ont absolument pas le luxe de préparer longuement ce qu\'ils doivent animer. Résultat ? On ne compte plus le nombre de plans totalement figés et inutiles sur le ciel ou des personnages qui se regardent, où seuls des dialogues se font entendre. Bah oui, c\'est économique et rapide à faire. Et on est gentil, on ne parle même pas des scènes réutilisées avec l\'effet miroir...\r\n\r\n', '2023-04-01 22:59:40', 5, 1, ''),
(10, 'Demon Slayer 2 : la prochaine saison est enfin datée ', 'https://leclaireur.fnac.com/wp-content/uploads/2023/03/demon-slayer-header.jpg', 'La suite des aventures de Tanjiro dans sa lutte contre les démons va reprendre son cours en version animée dès le 9 avril prochain.\r\n\r\nParler du succès de Demon Slayer sans évoquer l’incroyable score réalisé par le film Demon Slayer: Kimetsu no Yaiba – The Movie: Mugen Train semble impossible. Avec ses quelque 500 millions de dollars de recettes dans le monde, le long métrage reprenant l’arc scénaristique du Train de l’Infini est devenu l’anime le plus rentable de tous les temps, reléguant d’énormes succès comme Le Voyage de Chihiro de Ghibli ou Your Name de Makoto Shinkai aux places d’honneur. Même les trois derniers ténors en date du box-office japonais, Suzume, One Piece Red ou Slam Dunk n’ont pas réussi à le battre malgré des performances records.', '2023-04-06 10:22:34', 13, 1, ''),
(13, 'L’anime Dr. Stone est l’ode que la science mérite sur Crunchyroll ', 'https://www.crunchyroll.com/imgsrv/display/thumbnail/1200x675/catalog/crunchyroll/45cd3de6acf23f58481db5e2ec2269be.jpe', 'Rebâtir la civilisation humaine dans un monde retourné à l’âge de pierre, c’est l’objectif de Senku, le protagoniste de Dr. Stone. Alors que la saison 3 de cet anime sera diffusée Crunchyroll à partir du 6 avril, on revient sur cette œuvre enrichissante.\r\n\r\nEt si l’humanité retournait à l’âge de pierre et devait rebâtir de zéro une civilisation aussi avancée que la nôtre ? C’est une question à laquelle l’anime Dr. Stone a voulu répondre. Dans cette œuvre, adaptée du manga éponyme dessiné par l’illustre Boichi (Sun-Ken Rock) et écrit par Riichirō Inagaki (Eyeshield 21), les 7 milliards d’êtres humains qui peuplent la Terre se retrouvent pétrifiés par une mystérieuse lumière verte provenue du ciel.\r\n\r\nForcément, sans femmes et sans hommes, la civilisation humaine s’effondre totalement et laisse place à la nature, qui reprend ses droits en 3700 ans. C’est assez pour que toute trace d’activité humaine disparaisse de la surface de la Terre, mais pas assez pour briser la ténacité du jeune Taiju, qui parvient à se libérer de son enveloppe de pierre le 5 octobre 5738. Si à son réveil, il découvre un monde qui est retourné à l’âge de pierre, il retrouve aussi, à sa grande surprise, un autre humain qui s’est également réveillé. Et c’est une personne qu’il connait très bien puisqu’il s’agit de Senku, un ami féru de sciences. ', '2023-04-06 15:09:12', 5, 1, NULL),
(14, 'L’anime Dr. Stone est l’ode que la science mérite sur Crunchyroll ', 'https://www.crunchyroll.com/imgsrv/display/thumbnail/1200x675/catalog/crunchyroll/45cd3de6acf23f58481db5e2ec2269be.jpe', 'Rebâtir la civilisation humaine dans un monde retourné à l’âge de pierre, c’est l’objectif de Senku, le protagoniste de Dr. Stone. Alors que la saison 3 de cet anime sera diffusée Crunchyroll à partir du 6 avril, on revient sur cette œuvre enrichissante.\r\n\r\nEt si l’humanité retournait à l’âge de pierre et devait rebâtir de zéro une civilisation aussi avancée que la nôtre ? C’est une question à laquelle l’anime Dr. Stone a voulu répondre. Dans cette œuvre, adaptée du manga éponyme dessiné par l’illustre Boichi (Sun-Ken Rock) et écrit par Riichirō Inagaki (Eyeshield 21), les 7 milliards d’êtres humains qui peuplent la Terre se retrouvent pétrifiés par une mystérieuse lumière verte provenue du ciel.\r\n\r\nForcément, sans femmes et sans hommes, la civilisation humaine s’effondre totalement et laisse place à la nature, qui reprend ses droits en 3700 ans. C’est assez pour que toute trace d’activité humaine disparaisse de la surface de la Terre, mais pas assez pour briser la ténacité du jeune Taiju, qui parvient à se libérer de son enveloppe de pierre le 5 octobre 5738. Si à son réveil, il découvre un monde qui est retourné à l’âge de pierre, il retrouve aussi, à sa grande surprise, un autre humain qui s’est également réveillé. Et c’est une personne qu’il connait très bien puisqu’il s’agit de Senku, un ami féru de sciences. ', '2023-04-06 15:09:12', 5, 1, NULL),
(15, 'Demon Slayer 2 : la prochaine saison est enfin datée ', 'https://leclaireur.fnac.com/wp-content/uploads/2023/03/demon-slayer-header.jpg', 'La suite des aventures de Tanjiro dans sa lutte contre les démons va reprendre son cours en version animée dès le 9 avril prochain.\r\n\r\nParler du succès de Demon Slayer sans évoquer l’incroyable score réalisé par le film Demon Slayer: Kimetsu no Yaiba – The Movie: Mugen Train semble impossible. Avec ses quelque 500 millions de dollars de recettes dans le monde, le long métrage reprenant l’arc scénaristique du Train de l’Infini est devenu l’anime le plus rentable de tous les temps, reléguant d’énormes succès comme Le Voyage de Chihiro de Ghibli ou Your Name de Makoto Shinkai aux places d’honneur. Même les trois derniers ténors en date du box-office japonais, Suzume, One Piece Red ou Slam Dunk n’ont pas réussi à le battre malgré des performances records.', '2023-04-06 10:22:34', 13, 1, ''),
(17, 'Dragon Ball, meilleur manga de l\'histoire ?', 'https://cherry.img.pmdstatic.net/fit/https.3A.2F.2Fimg.2Egaming.2Egentside.2Ecom.2Fs3.2Ffrgsg.2Fmanga.2Fdefault_2022-07-06_1fec0ff2-86e8-42c3-9582-ab04a9f8a700.2Ejpeg/640x360/quality/80/dragon-ball.jpg', 'Paru en 1984, Dragon Ball est considéré pour beaucoup comme le plus grand manga de l\'histoire. Si le débat est toujours vif entre les fans de l\'œuvre d\'Akira Toriyama et ceux de One Piece, Naruto, Bleach, SNK, Berserk et consorts, il est un point sur lequel tout le monde s\'accorde : le marché de la bande dessinée japonaise n\'aurait pas été ce qu\'il est en France et dans le monde sans le succès rencontré par les aventures de Son Goku.\r\n\r\nAu fil des années, les fans se sont forgés des souvenirs mémorables, à travers les pages du manga et les moments épiques de la série animée. On vous laisse découvrir le tome qui a recueilli le plus d\'évaluations positives auprès des lecteurs francophones.\r\nLa fin de la saga Namek, un concentré d\'émotions\r\n\r\nConsidéré comme une référence dans le domaine de la critique de produits culturels (jeux vidéo, films, BD et mangas), le site SensCritique permet à ses utilisateurs de noter chaque volume pris individuellement. Si le jugement des lecteurs inscrits sur le site ne fait pas office de vérité absolue, il donne tout de même une bonne indication de ce que pensent les passionnés. Le résultat est sans appel : le tome 27 de Dragon Ball est le préféré des fan.\r\n\r\nAvec une note moyenne de 8,5 sur 10, il devance nettement les autres volumes du manga culte. Il faut dire que le scénario du volume est haletant, puisqu\'on y voit pour la première fois Goku en mode Super Saiyen, ainsi que le dénouement de l\'arc Namek. Le combat épique opposant Goku à Freezer dans un décor en ruines est sans nul doute l\'un des passages les plus mémorables de l\'histoire.', '2023-04-06 16:08:39', 5, 1, ''),
(18, 'Demon Slayer 2 : la prochaine saison est enfin datée ', 'https://leclaireur.fnac.com/wp-content/uploads/2023/03/demon-slayer-header.jpg', 'La suite des aventures de Tanjiro dans sa lutte contre les démons va reprendre son cours en version animée dès le 9 avril prochain.\r\n\r\nParler du succès de Demon Slayer sans évoquer l’incroyable score réalisé par le film Demon Slayer: Kimetsu no Yaiba – The Movie: Mugen Train semble impossible. Avec ses quelque 500 millions de dollars de recettes dans le monde, le long métrage reprenant l’arc scénaristique du Train de l’Infini est devenu l’anime le plus rentable de tous les temps, reléguant d’énormes succès comme Le Voyage de Chihiro de Ghibli ou Your Name de Makoto Shinkai aux places d’honneur. Même les trois derniers ténors en date du box-office japonais, Suzume, One Piece Red ou Slam Dunk n’ont pas réussi à le battre malgré des performances records.', '2023-04-06 10:22:34', 13, 3, ''),
(19, 'Demon Slayer 2 : la prochaine saison est enfin datée ', 'https://leclaireur.fnac.com/wp-content/uploads/2023/03/demon-slayer-header.jpg', 'La suite des aventures de Tanjiro dans sa lutte contre les démons va reprendre son cours en version animée dès le 9 avril prochain.\r\n\r\nParler du succès de Demon Slayer sans évoquer l’incroyable score réalisé par le film Demon Slayer: Kimetsu no Yaiba – The Movie: Mugen Train semble impossible. Avec ses quelque 500 millions de dollars de recettes dans le monde, le long métrage reprenant l’arc scénaristique du Train de l’Infini est devenu l’anime le plus rentable de tous les temps, reléguant d’énormes succès comme Le Voyage de Chihiro de Ghibli ou Your Name de Makoto Shinkai aux places d’honneur. Même les trois derniers ténors en date du box-office japonais, Suzume, One Piece Red ou Slam Dunk n’ont pas réussi à le battre malgré des performances records.', '2023-04-06 10:22:34', 13, 2, 'Photo a revoir');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_comment` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_comment`),
  KEY `id_user` (`id_user`,`id_article`),
  KEY `id_article` (`id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id_comment`, `id_user`, `id_article`, `comments`, `date_comment`) VALUES
(2, 13, 3, 'Et on est gentil, on ne parle même pas des scènes réutilisées avec l\'effet miroir...', '2023-03-28'),
(3, 13, 3, 'C\'est quand même grave de savoir que l\'on peut facilement sauter deux épisodes et réaliser que l\'on n\'a rien loupé... Un foutage de gu*ule assumé. ', '2023-03-28'),
(5, 13, 1, 'Dragon ball c\'est la vie', '2023-03-28');

-- --------------------------------------------------------

--
-- Structure de la table `dislike`
--

DROP TABLE IF EXISTS `dislike`;
CREATE TABLE IF NOT EXISTS `dislike` (
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  KEY `id_user` (`id_user`,`id_article`),
  KEY `id_article` (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favourites`
--

DROP TABLE IF EXISTS `favourites`;
CREATE TABLE IF NOT EXISTS `favourites` (
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  KEY `id_user` (`id_user`,`id_article`),
  KEY `id_article` (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `favourites`
--

INSERT INTO `favourites` (`id_user`, `id_article`) VALUES
(5, 13),
(13, 3);

-- --------------------------------------------------------

--
-- Structure de la table `like_article`
--

DROP TABLE IF EXISTS `like_article`;
CREATE TABLE IF NOT EXISTS `like_article` (
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  KEY `id_user` (`id_user`,`id_article`),
  KEY `id_article` (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `like_article`
--

INSERT INTO `like_article` (`id_user`, `id_article`) VALUES
(5, 3),
(5, 10),
(13, 1),
(13, 3),
(13, 10),
(19, 17);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_role`, `nom_role`) VALUES
(1, 'Utilisateur'),
(2, 'Modérateur'),
(3, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id_valid` int(11) NOT NULL AUTO_INCREMENT,
  `etat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_valid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `states`
--

INSERT INTO `states` (`id_valid`, `etat`) VALUES
(1, 'Validé'),
(2, 'Non validé'),
(3, 'En cours de validation');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://bootdey.com/img/Content/avatar/avatar1.png',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_user` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `role` (`role_user`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`, `email`, `avatar`, `token`, `role_user`) VALUES
(5, 'GOAT13', '$2y$10$U30z7VVq..fi7LyRsdy7ZeWk7Nkmw4QhBG7qYVvPUre6Qmg3GHICK', 'jojo@goat.com', 'https://bootdey.com/img/Content/avatar/avatar1.png', '64206d8779895', 3),
(13, 'modo13', '$2y$10$0zMIKjz61jzduRxLuZFneuOc70yFfZ8akpxhHKTG2M8lIYxoJTMiS', 'modo@modo.fr', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQB1vQ-2eBzR5YYKw0LWVahNT5F4zcpt5OMkA&amp;usqp=CAU', '6422b6a7b06dd', 2),
(14, 'Jordan23', '$2y$10$gqaJpC9EKTIIZwEzB7K/huSfuaBiZ8ggMMvro3HGIjUe9FKyvE/v2', 'jojo@jojo.fr', 'https://bootdey.com/img/Content/avatar/avatar1.png', '642988eb35efa', 1),
(18, 'Joban2', '$2y$10$1OrghU7Yz9Fvwdm/FDpqHu9LiotOEpJLUe0QnfhjkTLnCN6gF1tgW', 'joban@joban.fr', 'https://bootdey.com/img/Content/avatar/avatar1.png', '642e81df96f34', 2),
(19, 'Durant13', '$2y$10$1zUv5qmCTUYEa4nmTZzhtOvl11H64prnVNjp4hGO/JyMN3gcH/A5u', 'durant@durant.fr', 'https://bootdey.com/img/Content/avatar/avatar1.png', '642ee5c6b4371', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`valid`) REFERENCES `states` (`id_valid`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`);

--
-- Contraintes pour la table `dislike`
--
ALTER TABLE `dislike`
  ADD CONSTRAINT `dislike_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `dislike_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`);

--
-- Contraintes pour la table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`) ON DELETE CASCADE;

--
-- Contraintes pour la table `like_article`
--
ALTER TABLE `like_article`
  ADD CONSTRAINT `like_article_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `like_article_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`) ON DELETE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_user`) REFERENCES `roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
