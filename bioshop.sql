-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 08 oct. 2021 à 23:55
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bioshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `car`
--

CREATE TABLE `car` (
  `idcar` int(10) UNSIGNED NOT NULL,
  `status` int(2) NOT NULL,
  `vehiculenumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `chariot`
--

CREATE TABLE `chariot` (
  `id` int(11) NOT NULL,
  `qty` int(250) NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `cid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `adresse` text NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`cid`, `name`, `email`, `pwd`, `phonenumber`, `adresse`, `img`) VALUES
(1, 'houcem', 'nlus040815@gmail.com', '$2y$10$LdebVs8yLck6.CMPyNT8xeL81QuAvFrAysvQH4dYxnLgzb4g1kPsm', 26248366, 'el alia', 'profilpic/1575574781_chef-2.jpg'),
(2, 'bilel', 'test@testest.com', '$2y$10$KLQebJQlKmWQMIpVvwCMquKZS2LBPLPMiChBzu83e4UrCjHgbiBE6', 26248366, 'bizerte', 'profilpic/1575719736_32.jpg'),
(3, 'mokhtar', 'mokhtar@test.com', '$2y$10$94a6/.PYc.ZKedZARH71MOhu7Mytu3aDFxohKXIjq7VZ.GR/2zoo.', 26248366, 'el alia', 'profilpic/default-avatar.jpg'),
(5, 'ayman', 'ayman@gmail.com', '$2y$10$i8KmfHZYXWn5MnnyfqOGpOOcUznU6L0Pde/IuLF0Zh6MirlWBFV.a', 678890790, 'Casablanca', 'profilpic/default-avatar.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `employé`
--

CREATE TABLE `employé` (
  `eid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phno` int(15) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(120) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employé`
--

INSERT INTO `employé` (`eid`, `name`, `phno`, `email`, `password`, `type`) VALUES
(1, 'admin', 62624836, 'admin@gmail.com', '$2y$10$94a6/.PYc.ZKedZARH71MOhu7Mytu3aDFxohKXIjq7VZ.GR/2zoo.', 'admin'),
(2, 'employe', 62483664, 'employe@gmail.com', '$2y$10$94a6/.PYc.ZKedZARH71MOhu7Mytu3aDFxohKXIjq7VZ.GR/2zoo.', 'employe'),
(3, 'ayman', 660675670, 'ayman@gmail.com', '$2y$10$94a6/.PYc.ZKedZARH71MOhu7Mytu3aDFxohKXIjq7VZ.GR/2zoo.', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `ordre`
--

CREATE TABLE `ordre` (
  `oid` int(11) NOT NULL,
  `qty` int(25) NOT NULL,
  `status` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ordre`
--

INSERT INTO `ordre` (`oid`, `qty`, `status`, `pid`, `cid`) VALUES
(102, 1, 1, 5, 5),
(103, 1, 1, 6, 5),
(104, 1, 1, 1, 5),
(105, 1, 1, 4, 5),
(106, 1, 1, 1, 5),
(107, 1, 1, 9, 5),
(108, 1, 1, 15, 5),
(109, 1, 1, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `pid` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `price` int(10) NOT NULL,
  `file` text NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`pid`, `name`, `description`, `price`, `file`, `type`) VALUES
(1, 'argan', 'L\'huile  est une huile végétale produite à partir des fruits de l\'arganier et riche en vitamine A, vitamine E, en antioxydants et en acides gras essentiels. Cette huile est produite depuis des siècles par les femmes berbères de la région de Souss-Massa au Maroc.', 150, 'argan.jpeg', 'cosmétique'),
(2, 'savon noir', 'Le savon noir est l\'indispensable naturel pour la peau, la maison et même le jardin. Il se décline en savon noir visage et corps, et savon noir ménager.', 50, 'savon.jpg', 'cosmétique'),
(3, 'poudre', 'est utilisé pour colorer les cheveux tout en apportant un soin profond.', 80, 'poudre.jpg', 'cosmétique'),
(4, 'Huile d\'olive', 'huile d\'olive est une variété d\'huile alimentaire, à base de matière grasse végétale extraite des olives lors de la trituration dans un moulin à huile. ', 100, 'Huile-d-olive.jpg', 'cosmétique'),
(5, 'feuille  manioc', 'Le manioc est également recommandé aux personnes diabétiques car il a un faible indice glycémique. Sa forte teneur en fibres permet de ralentir la vitesse d\'absorption du sucre dans le sang.', 50, 'manioc.jpg', 'alimentaire'),
(6, 'noix de palme', ' l\'huile de palme est particulièrement hydratante, et c\'est d\'ailleurs pour cette raison qu\'elle est beaucoup utilisée en savonnerie. Elle protège notamment les cheveux contre la déshydratation, tout en leur apportant douceur et brillance.', 80, 'noix de palme.jpg', 'alimentaire'),
(7, 'huile de palme', 'huile de palme est une huile végétale extraite par pression à chaud de la pulpe des fruits du palmier à huile, un arbre originaire d\'Afrique tropicale dont est aussi tirée l’huile de palmiste, extraite du noyau de ses fruits', 150, 'huile_palme.jpg', 'alimentaire'),
(8, 'huile curcuma', 'huile permettent de l\'utiliser en traitement de nombreux problèmes de peaux comme l\'acné, les problèmes liés aux cheveux.', 180, 'curcuma-huile.jpg', 'alimentaire'),
(9, 'miel', 'Il est antibactérien, antioxydant (c\'est-à-dire qu\'il réduit la formation des radicaux libres responsables du vieillissement prématuré de la peau), anti-inflammatoire, et antiseptique.', 180, 'miel.jpg', 'alimentaire'),
(10, 'belivable', 'Parfum Paris Believable Original-Eau De Parfum Pour Femme', 160, 'belivable.jpg', 'cosmétique'),
(11, 'oniro', 'L\'accroche est rayonnante grâce à la fraîcheur juteuse de la bergamote Reggio di Calabria. Le sillage, puissamment boisé, est signé par l\'ambroxan, issu du précieux ambre gris.Sauvage est un acte de création inspiré des grands espaces. Un ciel bleu ozone qui domine un désert minéral chauffé à blanc', 180, 'oniro.jpeg', 'cosmétique'),
(12, 'scandant', 'L\'eau de parfum pour femme Scandal offre une overdose de plaisir, un nouveau genre de parfum pour femme, sucré et sensuel.', 200, 'scandant.jpg', 'cosmétique'),
(13, 'confiture', 'La confiture est un mélange gélifié de sucre, de pulpe ou de purée d\'une ou plusieurs espèces de fruits', 160, 'confiture.jpg', 'alimentaire'),
(14, 'fruit sec', 'Il existe deux types de fruits secs : les fruits naturellement secs dit oléagineux ou fruits à coque (amande, cacahuète, noisette, noix, etc) et les fruits déshydratés (abricot, figue, datte, ananas, raisin, etc).', 100, 'fruits_secs.png', 'alimentaire'),
(15, 'piment', 'piment est un nom vernaculaire désignant le fruit de cinq espèces de plantes du genre Capsicum de la famille des Solanacées et de plusieurs autres taxons.', 50, 'piment.jpg', 'alimentaire'),
(16, 'banane plant', 'La banane plantain est une espèce hybride de plante de la famille des Musaceae. Comme la banane dessert, elle est un sous-groupe de l\'espèce Musa ×paradisiaca. La banane plantain est simplement appelée « plantain » en Afrique.', 60, 'banane-plantain.jpg', 'alimentaire'),
(17, 'brown orchid', 'Brown Orchid Blanc Edition est un parfum pour les deux sexes (Unisexe).\r\nSa composition comprend la mandarine, la bergamote, le thé vert, le cassis, le musc, le galbanum et le bois de santal.\r\nIl est disponible en 80 ml.', 120, 'brown orchid.jpg', 'cosmétique'),
(18, 'ophylia', 'Ophylia inspire l\'élégance et la pureté et révèle l\'état d\'esprit de la femme d\'aujourd\'hui. ', 200, 'ophylia.jpg', 'cosmétique');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`idcar`);

--
-- Index pour la table `chariot`
--
ALTER TABLE `chariot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `pid` (`pid`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`cid`);

--
-- Index pour la table `employé`
--
ALTER TABLE `employé`
  ADD PRIMARY KEY (`eid`);

--
-- Index pour la table `ordre`
--
ALTER TABLE `ordre`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `cid` (`cid`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `car`
--
ALTER TABLE `car`
  MODIFY `idcar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `chariot`
--
ALTER TABLE `chariot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `employé`
--
ALTER TABLE `employé`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ordre`
--
ALTER TABLE `ordre`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `chariot`
--
ALTER TABLE `chariot`
  ADD CONSTRAINT `chariot_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `clients` (`cid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chariot_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `produits` (`pid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
