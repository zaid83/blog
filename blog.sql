-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 09 avr. 2023 à 14:31
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `title`, `img_article`, `content`, `date_article`, `author`, `valid`, `Signalements`) VALUES
(1, 'Dragon Ball, meilleur manga de l\'histoire ?', '6431615de67019.17093706.jpg', 'Paru en 1984, Dragon Ball est considéré pour beaucoup comme le plus grand manga de l\'histoire. Si le débat est toujours vif entre les fans de l\'œuvre d\'Akira Toriyama et ceux de One Piece, Naruto, Bleach, SNK, Berserk et consorts, il est un point sur lequel tout le monde s\'accorde : le marché de la bande dessinée japonaise n\'aurait pas été ce qu\'il est en France et dans le monde sans le succès rencontré par les aventures de Son Goku.\r\n\r\nAu fil des années, les fans se sont forgés des souvenirs mémorables, à travers les pages du manga et les moments épiques de la série animée. On vous laisse découvrir le tome qui a recueilli le plus d\'évaluations positives auprès des lecteurs francophones.\r\nLa fin de la saga Namek, un concentré d\'émotions\r\n\r\nConsidéré comme une référence dans le domaine de la critique de produits culturels (jeux vidéo, films, BD et mangas), le site SensCritique permet à ses utilisateurs de noter chaque volume pris individuellement. Si le jugement des lecteurs inscrits sur le site ne fait pas office de vérité absolue, il donne tout de même une bonne indication de ce que pensent les passionnés. Le résultat est sans appel : le tome 27 de Dragon Ball est le préféré des fan.\r\n\r\nAvec une note moyenne de 8,5 sur 10, il devance nettement les autres volumes du manga culte. Il faut dire que le scénario du volume est haletant, puisqu\'on y voit pour la première fois Goku en mode Super Saiyen, ainsi que le dénouement de l\'arc Namek. Le combat épique opposant Goku à Freezer dans un décor en ruines est sans nul doute l\'un des passages les plus mémorables de l\'histoire.', '2023-04-08 14:43:09', 5, 1, ''),
(3, 'One Piece vraiment surcoté ?', '64313b25b0d1d4.26775357.jpg', 'Des épisodes très (très) courts\r\nChaque semaine on se fait avoir. On lance un épisode de One Piece en espérant avoir le droit à 20 minutes de kiff et en réalité, on se fait voler entre 3 et 5 minutes en moyenne, la faute à l\'introduction de l\'univers par une voix off, aux génériques d\'intro et outro + au récap des épisodes récents. Oui, les créateurs de l\'anime se fichent totalement de nous et arrivent parfois à nous proposer des épisodes de... 15 minutes (une fois, il nous a même semblé qu\'un épisode n\'avait duré que 11 minutes !). Le pire ? Comme vous allez le voir ci-dessous, ces 15 minutes ne sont même pas pleines...\r\n\r\nTrop d\'arrêts sur images\r\nFaire un anime, ça coûte cher et ça demande du temps. Pas de chances pour les créateurs de One Piece, étant donné qu\'ils doivent fournir un épisode par semaine toute l\'année, ils subissent un budget restreint et n\'ont absolument pas le luxe de préparer longuement ce qu\'ils doivent animer. Résultat ? On ne compte plus le nombre de plans totalement figés et inutiles sur le ciel ou des personnages qui se regardent, où seuls des dialogues se font entendre. Bah oui, c\'est économique et rapide à faire. Et on est gentil, on ne parle même pas des scènes réutilisées avec l\'effet miroir...\r\n\r\nUn abus de flashbacks\r\nLe moins que l\'on puisse dire, c\'est que les créateurs de l\'anime ne sont jamais à court d\'idées quand il s\'agit de faire des économies sur l\'animation et de gagner quelques minutes de temps d\'antenne. Ainsi, quand ils ne se contentent pas de plans fixes, ils nous balancent à la figure des flashbacks interminables sur des épisodes précédents. Malheureusement, la plupart de ces flashbacks concernent des événements relativement récents que l\'on a encore parfaitement en tête. Cela tue donc immédiatement leur intérêt et nous donne une nouvelle fois envie de tout péter. A ce rythme-là, être animateur sur One Piece ressemble plus à un emploi fictif qu\'autre chose... Merci à l\'inventeur de la touche &quot;avance rapide&quot;.\r\n\r\nDes épisodes très (très) courts\r\nChaque semaine on se fait avoir. On lance un épisode de One Piece en espérant avoir le droit à 20 minutes de kiff et en réalité, on se fait voler entre 3 et 5 minutes en moyenne, la faute à l\'introduction de l\'univers par une voix off, aux génériques d\'intro et outro + au récap des épisodes récents. Oui, les créateurs de l\'anime se fichent totalement de nous et arrivent parfois à nous proposer des épisodes de... 15 minutes (une fois, il nous a même semblé qu\'un épisode n\'avait duré que 11 minutes !). Le pire ? Comme vous allez le voir ci-dessous, ces 15 minutes ne sont même pas pleines...\r\n\r\n\r\nTrop d\'arrêts sur images\r\nFaire un anime, ça coûte cher et ça demande du temps. Pas de chances pour les créateurs de One Piece, étant donné qu\'ils doivent fournir un épisode par semaine toute l\'année, ils subissent un budget restreint et n\'ont absolument pas le luxe de préparer longuement ce qu\'ils doivent animer. Résultat ? On ne compte plus le nombre de plans totalement figés et inutiles sur le ciel ou des personnages qui se regardent, où seuls des dialogues se font entendre. Bah oui, c\'est économique et rapide à faire. Et on est gentil, on ne parle même pas des scènes réutilisées avec l\'effet miroir...\r\n\r\n\r\nPlus frustrant encore, les créateurs ne peuvent également pas s\'empêcher de faire des gros plans (fixes) sur chacun des membres de l\'équipage dès qu\'une surprise (bonne ou mauvaise) apparait à l\'écran. De quoi leur permettre de gratter facilement 30/45 secondes à chaque fois et plomber le rythme de l\'intrigue. Ce n\'est plus un anime mais un Powerpoint par instant... Or, seul l\'anime La voie du tablier maîtrise le concept !\r\n\r\nUn abus de flashbacks\r\nLe moins que l\'on puisse dire, c\'est que les créateurs de l\'anime ne sont jamais à court d\'idées quand il s\'agit de faire des économies sur l\'animation et de gagner quelques minutes de temps d\'antenne. Ainsi, quand ils ne se contentent pas de plans fixes, ils nous balancent à la figure des flashbacks interminables sur des épisodes précédents. Malheureusement, la plupart de ces flashbacks concernent des événements relativement récents que l\'on a encore parfaitement en tête. Cela tue donc immédiatement leur intérêt et nous donne une nouvelle fois envie de tout péter. A ce rythme-là, être animateur sur One Piece ressemble plus à un emploi fictif qu\'autre chose... Merci à l\'inventeur de la touche &quot;avance rapide&quot;.\r\n\r\nDes intrigue à rallonge\r\nAvec un rythme de diffusion d\'un épisode par semaine, l\'anime est extrêmement proche du rythme de publication du manga de Eiichiro Oda. Or, si sur le papier c\'est plutôt cool (moins de risques de spoilers, moins de frustration), la réalité est bien différente. Afin de ne pas dépasser l\'oeuvre du mangaka, les créateurs de la série usent en effet d\'une technique extrêmement chiante : celle d\'étirer au maximum la moindre intrigue et sous-intrigue.\r\n\r\nAinsi, là où Luffy passerait une case à aller aux toilettes dans le manga, cette scène pourrait ensuite durer 15 minutes dans l\'anime afin de gagner un maximum de temps. Et c\'est comme ça pour absolument tout (combats, repas, recherches, disputes, transformations...), ce qui atténue grandement le côté badass des séquences (notamment les scènes d\'action) et nous plonge dans un niveau d\'overdose déprimant. C\'est quand même grave de savoir que l\'on peut facilement sauter deux épisodes et réaliser que l\'on n\'a rien loupé... Un foutage de gu*ule assumé.\r\n\r\nUne OST répétitive\r\nC\'est un fait, l\'OST de One Piece est excellente. Chaque musique est cool, bien trouvée et trouve parfaitement sa place dans nos playlists. Le problème ? Quand un anime possède près de 1000 épisodes avec un budget restreint, l\'équipe ne peut logiquement pas créer de nouveaux sons pour chaque nouvelle scène. De fait, on a rapidement envie de s\'éclater la tête contre un mur à force d\'entendre pour la 300ème fois la même musique utilisée pour tout et n\'importe quoi. Ce n\'est plus de la radinerie à ce niveau-là, c\'est de la flemme.\r\n\r\nMention spéciale à la chanson Le Bon Rhum de Binks de Brook qui est passée de &quot;wow, elle est vraiment stylée&quot; à &quot;mais bordel, c\'est quoi ce musicien incapable d\'innover, apprenez-lui un autre morceau&quot; extrêmement rapidement. Un enfer.\r\n\r\nDes épisodes très (très) courts\r\nChaque semaine on se fait avoir. On lance un épisode de One Piece en espérant avoir le droit à 20 minutes de kiff et en réalité, on se fait voler entre 3 et 5 minutes en moyenne, la faute à l\'introduction de l\'univers par une voix off, aux génériques d\'intro et outro + au récap des épisodes récents. Oui, les créateurs de l\'anime se fichent totalement de nous et arrivent parfois à nous proposer des épisodes de... 15 minutes (une fois, il nous a même semblé qu\'un épisode n\'avait duré que 11 minutes !). Le pire ? Comme vous allez le voir ci-dessous, ces 15 minutes ne sont même pas pleines...\r\n\r\nTrop d\'arrêts sur images\r\nFaire un anime, ça coûte cher et ça demande du temps. Pas de chances pour les créateurs de One Piece, étant donné qu\'ils doivent fournir un épisode par semaine toute l\'année, ils subissent un budget restreint et n\'ont absolument pas le luxe de préparer longuement ce qu\'ils doivent animer. Résultat ? On ne compte plus le nombre de plans totalement figés et inutiles sur le ciel ou des personnages qui se regardent, où seuls des dialogues se font entendre. Bah oui, c\'est économique et rapide à faire. Et on est gentil, on ne parle même pas des scènes réutilisées avec l\'effet miroir...\r\n\r\n', '2023-04-08 12:00:05', 5, 1, ''),
(14, 'L’anime Dr. Stone est l’ode que la science mérite sur Crunchyroll ', '64313d170e0b75.28729733.jpg', 'Rebâtir la civilisation humaine dans un monde retourné à l’âge de pierre, c’est l’objectif de Senku, le protagoniste de Dr. Stone. Alors que la saison 3 de cet anime sera diffusée Crunchyroll à partir du 6 avril, on revient sur cette œuvre enrichissante.\r\n\r\nEt si l’humanité retournait à l’âge de pierre et devait rebâtir de zéro une civilisation aussi avancée que la nôtre ? C’est une question à laquelle l’anime Dr. Stone a voulu répondre. Dans cette œuvre, adaptée du manga éponyme dessiné par l’illustre Boichi (Sun-Ken Rock) et écrit par Riichirō Inagaki (Eyeshield 21), les 7 milliards d’êtres humains qui peuplent la Terre se retrouvent pétrifiés par une mystérieuse lumière verte provenue du ciel.\r\n\r\nForcément, sans femmes et sans hommes, la civilisation humaine s’effondre totalement et laisse place à la nature, qui reprend ses droits en 3700 ans. C’est assez pour que toute trace d’activité humaine disparaisse de la surface de la Terre, mais pas assez pour briser la ténacité du jeune Taiju, qui parvient à se libérer de son enveloppe de pierre le 5 octobre 5738. Si à son réveil, il découvre un monde qui est retourné à l’âge de pierre, il retrouve aussi, à sa grande surprise, un autre humain qui s’est également réveillé. Et c’est une personne qu’il connait très bien puisqu’il s’agit de Senku, un ami féru de sciences. ', '2023-04-08 12:08:23', 5, 1, NULL),
(15, 'Demon Slayer 2 : la prochaine saison est enfin datée ', '6431594d5b2092.57053175.png', 'La suite des aventures de Tanjiro dans sa lutte contre les démons va reprendre son cours en version animée dès le 9 avril prochain.\r\n\r\nParler du succès de Demon Slayer sans évoquer l’incroyable score réalisé par le film Demon Slayer: Kimetsu no Yaiba – The Movie: Mugen Train semble impossible. Avec ses quelque 500 millions de dollars de recettes dans le monde, le long métrage reprenant l’arc scénaristique du Train de l’Infini est devenu l’anime le plus rentable de tous les temps, reléguant d’énormes succès comme Le Voyage de Chihiro de Ghibli ou Your Name de Makoto Shinkai aux places d’honneur. Même les trois derniers ténors en date du box-office japonais, Suzume, One Piece Red ou Slam Dunk n’ont pas réussi à le battre malgré des performances records.', '2023-04-08 14:08:45', 13, 1, ''),
(17, 'Dragon Ball, meilleur manga de l\'histoire ?', '64313b3da15348.05036778.jpg', 'Paru en 1984, Dragon Ball est considéré pour beaucoup comme le plus grand manga de l\'histoire. Si le débat est toujours vif entre les fans de l\'œuvre d\'Akira Toriyama et ceux de One Piece, Naruto, Bleach, SNK, Berserk et consorts, il est un point sur lequel tout le monde s\'accorde : le marché de la bande dessinée japonaise n\'aurait pas été ce qu\'il est en France et dans le monde sans le succès rencontré par les aventures de Son Goku.\r\n\r\nAu fil des années, les fans se sont forgés des souvenirs mémorables, à travers les pages du manga et les moments épiques de la série animée. On vous laisse découvrir le tome qui a recueilli le plus d\'évaluations positives auprès des lecteurs francophones.\r\nLa fin de la saga Namek, un concentré d\'émotions\r\n\r\nConsidéré comme une référence dans le domaine de la critique de produits culturels (jeux vidéo, films, BD et mangas), le site SensCritique permet à ses utilisateurs de noter chaque volume pris individuellement. Si le jugement des lecteurs inscrits sur le site ne fait pas office de vérité absolue, il donne tout de même une bonne indication de ce que pensent les passionnés. Le résultat est sans appel : le tome 27 de Dragon Ball est le préféré des fan.\r\n\r\nAvec une note moyenne de 8,5 sur 10, il devance nettement les autres volumes du manga culte. Il faut dire que le scénario du volume est haletant, puisqu\'on y voit pour la première fois Goku en mode Super Saiyen, ainsi que le dénouement de l\'arc Namek. Le combat épique opposant Goku à Freezer dans un décor en ruines est sans nul doute l\'un des passages les plus mémorables de l\'histoire.', '2023-04-08 12:00:29', 5, 1, ''),
(20, 'One Punch Man', '64314ff02551e0.58635138.jpg', 'Saitama est un jeune homme sans emploi, déprimé et sans but profond dans sa vie. Un jour, il rencontre un homme-crabe qui recherche un jeune garçon « avec un menton fendu comme un cul » selon ses termes. Saitama finit par rencontrer ce jeune garçon et décide de le sauver de l\'homme-crabe, qu\'il arrive à battre difficilement. Dès lors, Saitama décide de devenir un super-héros et s’entraîne pendant trois ans très sérieusement : 100 pompes, 100 squats, 100 abdos et 10 km de course au quotidien et il n\'y a pas de conditions de chauffage ni de climatisation . À la fin de son entrainement « si intense qu\'il en perd ses cheveux », il remarque qu\'il est devenu tellement fort qu\'il parvient désormais à battre tous ses adversaires d\'un seul coup de poing. Sa force démesurée est pour lui source de problèmes, puisqu\'il ne trouve pas d\'adversaires à sa taille et s\'ennuie dans son métier de héros car les combats ne lui procurent plus aucune sensation ni aucune adrénaline... Bien qu\'il ait mis un terme à un bon nombre de menaces toutes plus dangereuses les unes que les autres, personne ne semble remarquer l\'incroyable capacité de Saitama, à l\'exception de son ami et disciple Genos, un jeune homme devenu cyborg. ', '2023-04-08 13:28:48', 13, 1, ''),
(23, 'Hunter × Hunter', '64315a92d5ac48.39573910.png', 'Gon Freecs est un jeune garçon âgé de 12 ans, rêvant de devenir hunter (chasseur en anglais). Les hunters sont des citoyens d\'élite autorisés à faire quasiment tout ce qu\'ils souhaitent sur simple présentation de leur licence : ils peuvent ainsi acquérir gratuitement tout objet à la vente sur les fonds de l\'association, réquisitionner tout véhicule, logement et outil pour leur travail et sont de facto habilités à exercer tous les métiers du monde, pouvant tout aussi bien devenir chasseurs de primes, chefs-cuisinier, archéologues, zoologues, justiciers ou consultants dans divers domaines. Son père, Ging Freecss, qu\'il ne connaît pas directement, est considéré comme un des plus grands hunters de son temps. C\'est aussi pour le retrouver que Gon veut devenir hunter. ', '2023-04-08 14:14:10', 13, 1, ''),
(24, 'Hajime no ippo', '643160970b4ce5.59352467.jpg', 'Ippo Makunouchi est un jeune et timide lycéen de 16 ans qui n’a pas d’amis car il consacre tout son temps libre à aider sa mère, qui l\'élève seule, dans l’entreprise familiale de location de bateaux de pêche. Il est couramment victime de brutalités et d’humiliations par une bande de voyous menée par Umezawa, un de ses camarades de classe.\r\n\r\nUn jour, un boxeur professionnel témoin de la scène, Mamoru Takamura, le sauve de ses bourreaux et emmène Ippo blessé au club de boxe Kamogawa, tenu par le boxeur retraité Genji Kamogawa, pour le soigner. Une fois Ippo réveillé, Takamura tente de lui remonter le moral en le persuadant de se défouler sur un sac de sable, expérience qui révèle chez lui une grande puissance de frappe et un talent inné pour la boxe. Se découvrant une passion pour ce sport et poussé par le désir de devenir fort, le jeune Ippo décide de devenir boxeur professionnel et commence son entraînement au sein du club vers les plus hauts niveaux. ', '2023-04-08 14:40:20', 19, 1, 'autre image'),
(28, 'Vinland Saga, les vikings en manga', '643296bcad1cf5.38040934.jpg', 'Ce manga s\'inspire de plusieurs sagas islandaises : le Flateyjarbók, la Saga des Groenlandais et la Saga d\'Erik le Rouge. Le titre de la série renvoie à la découverte de l\'Amérique du Nord par les Vikings, qui nommèrent cette terre Vinland. La découverte aurait vraisemblablement été le fait du navigateur islandais Leif Erikson autour de l\'an 1000, personnage qui apparaît justement dans le manga. Mêlant personnages et évènements historiques avec de nombreux éléments fictifs, Vinland Saga est le récit de la vie d\'un jeune islandais, Thorfinn Thorsson. Ce fils d\'un illustre guerrier repenti verra sa vie basculer lorsque son père est assassiné par des pirates menés par le rusé Askeladd. Animé par la vengeance, Thorfinn suivra puis intégrera cette bande, avec le désir affiché de tuer dans un duel loyal l\'assassin de son père. La quête vengeresse de Thorfinn est le fil rouge du prologue de l\'histoire (tomes 01 à 08). Elle le mènera notamment à participer à l\'invasion de l\'Angleterre par les Danois, au début du XIe siècle. Cette partie de l\'histoire traite avec brio de sujets divers tels que la guerre, la politique, la religion, et brosse un portrait convaincant et humain de la vie quotidienne des populations victimes de la guerre mais aussi et surtout des guerriers Vikings. ', '2023-04-09 12:51:26', 20, 1, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id_comment`, `id_user`, `id_article`, `comments`, `date_comment`) VALUES
(2, 13, 3, 'Et on est gentil, on ne parle même pas des scènes réutilisées avec l\'effet miroir...', '2023-03-28'),
(3, 13, 3, 'C\'est quand même grave de savoir que l\'on peut facilement sauter deux épisodes et réaliser que l\'on n\'a rien loupé... Un foutage de gu*ule assumé. ', '2023-03-28'),
(5, 13, 1, 'Dragon ball c\'est la vie', '2023-03-28'),
(15, 5, 1, 'Bonjour', '2023-04-08'),
(16, 5, 1, 'c\'est ok', '2023-04-08'),
(17, 5, 24, 'ippo kun', '2023-04-09');

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
(5, 1),
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
(5, 1),
(5, 3),
(5, 24),
(13, 1),
(13, 3),
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
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_user` int(11) NOT NULL DEFAULT 1,
  `token_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role` (`role_user`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`, `email`, `avatar`, `token`, `role_user`, `token_date`) VALUES
(5, 'GOAT13', '$2y$10$U30z7VVq..fi7LyRsdy7ZeWk7Nkmw4QhBG7qYVvPUre6Qmg3GHICK', 'jojo@goat.com', '5.jpg', '', 3, '0000-00-00 00:00:00'),
(13, 'modo23', '$2y$10$0zMIKjz61jzduRxLuZFneuOc70yFfZ8akpxhHKTG2M8lIYxoJTMiS', 'modo@modo.fr', '13.jpg', '', 2, '0000-00-00 00:00:00'),
(14, 'Jordan23', '$2y$10$gqaJpC9EKTIIZwEzB7K/huSfuaBiZ8ggMMvro3HGIjUe9FKyvE/v2', 'jojo@jojo.fr', 'default.png', '', 1, '0000-00-00 00:00:00'),
(19, 'Durant13', '$2y$10$1zUv5qmCTUYEa4nmTZzhtOvl11H64prnVNjp4hGO/JyMN3gcH/A5u', 'durant@durant.fr', '19.webp', '', 1, '0000-00-00 00:00:00'),
(20, 'Zaid23', '$2y$10$kjkkHxkEe14k5b8fBXrKbOJd4GNAaDxfZZiZ3dq11QCLORjVNazMa', 'zaid@zaid.fr', '20.jpg', '', 1, '0000-00-00 00:00:00'),
(21, 'mailtest', '$2y$10$wXVeWUHHFMHrzNwxBGv0iu6V3xY3HdMFleT7LN2LhtHo0iS7la5U2', 'heigreikepefu-7243@yopmail.com', 'default.png', '', 1, '2023-04-09 16:18:23');

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
