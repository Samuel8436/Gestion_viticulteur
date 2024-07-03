-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 03 Mars 2003 à 03:10
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gestio_viticulture`
--

-- --------------------------------------------------------

--
-- Structure de la table `admine`
--

CREATE TABLE IF NOT EXISTS `admine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL,
  `password` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admine`
--

INSERT INTO `admine` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `cliants`
--

CREATE TABLE IF NOT EXISTS `cliants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_cli` varchar(200) NOT NULL,
  `Prenom_cli` varchar(200) NOT NULL,
  `CIN` varchar(40) NOT NULL,
  `Adresse` varchar(200) NOT NULL,
  `Tel_cli` varchar(19) NOT NULL,
  `Nom_sect` varchar(110) NOT NULL,
  `Lieu` varchar(110) NOT NULL,
  `Solde` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `cliants`
--

INSERT INTO `cliants` (`id`, `Nom_cli`, `Prenom_cli`, `CIN`, `Adresse`, `Tel_cli`, `Nom_sect`, `Lieu`, `Solde`) VALUES
(12, 'Z', 'Nomeniony', '223443675', 'Talatamaty', '0345234524', 'Soa fianatra', '', 599200),
(18, 'RACHROUTS', 'Malaza', '214748384', 'Mahajenga', '0342341234', 'Soa fianatra', '', 593600),
(24, 'ANDRIANANDRASAN', 'nomeniony samuel', '220291017789', 'Tanambao', '03452240036', 'Filamatra', '', 3421600),
(25, 'RABEZAFY', 'MANANJARA', '202345945234', 'Anjoma', '0345224036', 'Filamatra', '', 571200),
(27, 'RANDRIAMANANTENA', 'Amede', '12312345676', 'Mahamasina', '0345226700', 'Soa fianatra', '', 1304800),
(30, 'RASOLO', 'mampiandra', '123987345123', 'Tananambony', '0341209534', 'Miray', '', 593600),
(31, 'RASOAMAMPIONONA', 'marie judith', '202034098000', 'mandrindra', '0345612309', 'Miray', '', 593600),
(32, 'ANDRIANADRASANA', 'samuel', '220345098567', 'Akidona', '0345609534', 'Filamatra', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `controleur`
--

CREATE TABLE IF NOT EXISTS `controleur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_contr` varchar(200) NOT NULL,
  `Prenom_contr` varchar(200) NOT NULL,
  `Adresse_contr` varchar(200) NOT NULL,
  `CIN_contr` varchar(30) NOT NULL,
  `Num_phon_contr` varchar(19) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `controleur`
--

INSERT INTO `controleur` (`id`, `Nom_contr`, `Prenom_contr`, `Adresse_contr`, `CIN_contr`, `Num_phon_contr`) VALUES
(5, 'NOMENIONY', 'Samuel', 'Tanambao', '2147483647', '0384121234'),
(7, 'solofa', 'andriatsiferana', 'Ambanimaso', '220234390256', '034567915');

-- --------------------------------------------------------

--
-- Structure de la table `factur`
--

CREATE TABLE IF NOT EXISTS `factur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Date_fact` date NOT NULL,
  `CIN_vit` varchar(40) NOT NULL,
  `Poids_brut` varchar(30) NOT NULL,
  `Poids_net` varchar(30) NOT NULL,
  `Nombre_fut` varchar(30) NOT NULL,
  `Nombre_garaba` varchar(30) NOT NULL,
  `Type` varchar(200) NOT NULL,
  `Transporteur` varchar(200) NOT NULL,
  `Nom_et_Prenom_pes` varchar(200) NOT NULL,
  `Raisin_cult` varchar(300) NOT NULL,
  `Nom_et_Prenom_contr` varchar(300) NOT NULL,
  `PT` varchar(11) NOT NULL,
  `Nom_et_Prenom_vit` varchar(110) NOT NULL,
  `Nom_sect` varchar(110) NOT NULL,
  `PU` int(30) NOT NULL,
  `Adresse` varchar(300) NOT NULL,
  `Num_phon` varchar(15) NOT NULL,
  `Type1` varchar(110) NOT NULL,
  `Type2` varchar(110) NOT NULL,
  `Poids_brut1` varchar(30) NOT NULL,
  `Poids_brut2` varchar(30) NOT NULL,
  `Nombre_fut1` varchar(30) NOT NULL,
  `Nombre_fut2` varchar(30) NOT NULL,
  `Nombre_garaba1` varchar(30) NOT NULL,
  `Nombre_garaba2` varchar(30) NOT NULL,
  `Poids_net1` varchar(11) NOT NULL,
  `Poids_net2` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Contenu de la table `factur`
--

INSERT INTO `factur` (`id`, `Date_fact`, `CIN_vit`, `Poids_brut`, `Poids_net`, `Nombre_fut`, `Nombre_garaba`, `Type`, `Transporteur`, `Nom_et_Prenom_pes`, `Raisin_cult`, `Nom_et_Prenom_contr`, `PT`, `Nom_et_Prenom_vit`, `Nom_sect`, `PU`, `Adresse`, `Num_phon`, `Type1`, `Type2`, `Poids_brut1`, `Poids_brut2`, `Nombre_fut1`, `Nombre_fut2`, `Nombre_garaba1`, `Nombre_garaba2`, `Poids_net1`, `Poids_net2`) VALUES
(75, '1980-01-05', '202345123094', '134', '127', '1', '2', 'BLANCHE', 'RAKOTO Mahafinaritra', 'ANDRY Raony', 'Apanarivana', 'NOMENIONY Samuel', '711200', 'RASOAMAMPIONONA olivia joseph', 'Soa fianatra', 0, 'Ambalamanga', '0345612345', '', '', '0', '0', '', '', '', '', '0', '0'),
(76, '2022-08-01', '214748384', '123', '116', '1', '2', 'BLANCHE', 'RAKOTO Mahafinaritra', 'ANDRY Raony', 'Amboaloboka', 'NOMENIONY Samuel', '649600', 'RACHROUTS Malaza', 'Soa fianatra', 0, 'Mahajenga', '0342341234', '', '', '0', '0', '', '', '', '', '0', '0'),
(77, '2022-08-03', '220291017789', '123', '116', '1', '2', 'BLANCHE', 'RAKOTO Mahafinaritra', 'ANDRY Raony', 'Tanambao', 'NOMENIONY Samuel', '649600', 'ANDRIANANDRASAN nomeniony samuel', 'Filamatra', 0, 'Tanambao', '03452240036', '', '', '0', '0', '', '', '', '', '0', '0'),
(78, '2022-08-03', '220291017789', '123', '115', '1', '3', 'BLANCHE', 'RAKOTO Mahafinaritra', 'ANDRY Raony', 'Tanambao', 'NOMENIONY Samuel', '2671200', 'ANDRIANANDRASAN nomeniony samuel', 'Filamatra', 0, 'Tanambao', '03452240036', 'ROUGE', 'PETIT BOUCHET', '234', '156', '3', '2', '2', '1', '217', '145'),
(79, '2022-08-03', '220291017789', '25', '18', '1', '2', 'BLANCHE', 'RAKOTO Mahafinaritra', 'ANDRY Raony', 'Tanambao', 'NOMENIONY Samuel', '100800', 'ANDRIANANDRASAN nomeniony samuel', 'Filamatra', 0, 'Tanambao', '03452240036', '', '', '0', '0', '', '', '', '', '0', '0'),
(80, '2022-08-03', '214748384', '0', '0', '', '', '', 'RAKOTO Mahafinaritra', 'ANDRY Raony', 'Amboaloboka', 'NOMENIONY Samuel', '593600', 'RACHROUTS Malaza', 'Soa fianatra', 0, 'Mahajenga', '0342341234', 'ROUGE', '', '124', '0', '3', '', '3', '', '106', '0'),
(81, '2022-08-03', '223443675', '123', '107', '3', '1', 'BLANCHE', 'Automobil', 'ANDRY Raony', '', 'NOMENIONY Samuel', '599200', 'Z Nomeniony', 'Soa fianatra', 0, 'Talatamaty', '0345234524', '', '', '0', '0', '', '', '', '', '0', '0'),
(82, '2022-08-03', '202345945234', '134', '102', '6', '2', 'BLANCHE', 'RAKOTO Mahafinaritra', 'ANDRY Raony', 'Andrainjato', 'NOMENIONY Samuel', '571200', 'RABEZAFY MANANJARA', 'Filamatra', 0, 'Anjoma', '0345224036', '', '', '0', '0', '', '', '', '', '0', '0'),
(83, '2002-02-03', '202034098000', '123', '106', '3', '2', 'BLANCHE', 'RAKOTO Mahafinaritra', 'ANDRY Raony', 'Marorongny', 'NOMENIONY Samuel', '1187200', 'RASOAMAMPIONONA marie judith', 'Miray', 0, 'mandrindra', '0345612309', 'ROUGE', '', '123', '0', '3', '', '2', '', '106', '0'),
(84, '2002-02-03', '123987345123', '0', '0', '', '', '', 'RAKOTO Mahafinaritra', 'ANDRY Raony', 'Anjomanandihizana', 'NOMENIONY Samuel', '593600', 'RASOLO mampiandra', 'Miray', 0, 'Tananambony', '0341209534', 'ROUGE', '', '123', '0', '3', '', '2', '', '106', '0'),
(85, '2002-02-03', '2147483647', '123', '106', '3', '2', 'BLANCHE', 'RAKOTO Mahafinaritra', 'ANDRY Raony', 'Amponenana', 'NOMENIONY Samuel', '593600', 'RANDRIAMAMPIONONA Piere', 'Soa fianatra', 0, 'Tananambony', '0323409523', '', '', '0', '0', '', '', '', '', '0', '0'),
(86, '2002-02-03', '12312345676', '0', '0', '', '', '', 'RAKOTO Mahafinaritra', 'ANDRY Raony', 'Anjohary', 'NOMENIONY Samuel', '1304800', 'RANDRIAMANANTENA Amede', 'Soa fianatra', 0, 'Mahamasina', '0345226700', 'ROUGE', 'PETIT BOUCHET', '134', '154', '4', '6', '3', '2', '111', '122');

-- --------------------------------------------------------

--
-- Structure de la table `payement`
--

CREATE TABLE IF NOT EXISTS `payement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CIN` varchar(30) NOT NULL,
  `montant` int(30) NOT NULL,
  `date_pay` date NOT NULL,
  `Total_solde` varchar(30) NOT NULL,
  `Nom_et_Prenom_vit` varchar(300) NOT NULL,
  `Solde` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `payement`
--

INSERT INTO `payement` (`id`, `CIN`, `montant`, `date_pay`, `Total_solde`, `Nom_et_Prenom_vit`, `Solde`) VALUES
(2, '223443675', 12300, '1980-01-04', '', '', ''),
(4, '223443675', 123, '1980-02-09', '', 'Z Nomeniony', ''),
(5, '223443675', 10000, '1980-01-31', '', 'Z Nomeniony', ''),
(6, '2147483647', 1234, '2002-02-02', '', 'RANDRIAMAMPIONONA Piere', ''),
(7, '223443675', 200000, '2010-07-23', '', 'Z Nomeniony', ''),
(8, '220291017789', 20000, '2022-07-27', '6938400', 'ANDRIANANDRASAN nomeniony samuel', '6918400'),
(9, '220291017789', 300000, '2022-07-28', '6938400', 'ANDRIANANDRASAN nomeniony samuel', '6638400'),
(10, '202345123094', 23400, '2022-07-28', '621600', 'RASOAMAMPIONONA olivia joseph', '598200'),
(11, '202345123094', 711300, '2022-07-30', '711200', 'RASOAMAMPIONONA olivia joseph', '-100'),
(12, '223443675', 300, '2022-08-03', '3589600', 'Z Nomeniony', '3589300'),
(13, '223443675', 100, '2022-08-03', '3589600', '', '3589500');

-- --------------------------------------------------------

--
-- Structure de la table `peseur`
--

CREATE TABLE IF NOT EXISTS `peseur` (
  `id_pes` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_pes` varchar(200) NOT NULL,
  `Prenom_pes` varchar(200) NOT NULL,
  `Num_phon_pes` varchar(16) NOT NULL,
  `Adresse_pes` varchar(200) NOT NULL,
  `CIN_pes` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `peseur`
--

INSERT INTO `peseur` (`id_pes`, `Nom_pes`, `Prenom_pes`, `Num_phon_pes`, `Adresse_pes`, `CIN_pes`) VALUES
(1, 'ANDRY', 'Raony', '0342234567', 'Tananambony', '2345678'),
(2, 'rasoananteneina', 'marie olga', '0345234512', 'Andavale', '220290134808'),
(4, 'razafimampiandra', 'esther', '034560956', 'Ambanimaso', '220145190234');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_prod` varchar(200) NOT NULL,
  `Prix` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `Nom_prod`, `Prix`) VALUES
(1, 'voaloboka', '300');

-- --------------------------------------------------------

--
-- Structure de la table `raisin`
--

CREATE TABLE IF NOT EXISTS `raisin` (
  `id_raisin` int(11) NOT NULL AUTO_INCREMENT,
  `Ref_type` varchar(50) NOT NULL,
  `Couleur` varchar(100) NOT NULL,
  `PU` int(11) NOT NULL,
  PRIMARY KEY (`id_raisin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `raisin`
--

INSERT INTO `raisin` (`id_raisin`, `Ref_type`, `Couleur`, `PU`) VALUES
(2, 'ROUGE', 'Rouge', 5600),
(5, 'BLANCHE', 'Blanche', 2500),
(6, 'PETIT BOUCHET', 'Grena', 2500);

-- --------------------------------------------------------

--
-- Structure de la table `societe`
--

CREATE TABLE IF NOT EXISTS `societe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_soc` varchar(200) NOT NULL,
  `Adresse_soc` varchar(200) NOT NULL,
  `Tel_soc` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `societe`
--

INSERT INTO `societe` (`id`, `Nom_soc`, `Adresse_soc`, `Tel_soc`) VALUES
(4, 'Filamatra', 'Andoharanomaintso', ''),
(5, 'Soa fianatra', 'Ambalakely', ''),
(6, 'Miray', 'Tananarivo', '');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) NOT NULL,
  `Poids_brut` varchar(123) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`id`, `Type`, `Poids_brut`) VALUES
(1, 'BLANCHE|PETIT BOUCHET', ''),
(2, 'BLANCHE|PETIT BOUCHET', ''),
(3, 'BLANCHE|PETIT BOUCHET|Rouge', ''),
(4, 'BLANCHE|PETIT BOUCHET', '');

-- --------------------------------------------------------

--
-- Structure de la table `transporteur`
--

CREATE TABLE IF NOT EXISTS `transporteur` (
  `id_transp` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_transp` varchar(200) NOT NULL,
  `Frai` varchar(30) NOT NULL,
  `Num_imatr` int(11) NOT NULL,
  PRIMARY KEY (`id_transp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `transporteur`
--

INSERT INTO `transporteur` (`id_transp`, `Nom_transp`, `Frai`, `Num_imatr`) VALUES
(1, 'RAKOTO Mahafinaritra', '1200', 0),
(4, 'Automobil', '120', 21234),
(5, 'Rasoamampionona marie Angelle', '3500', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
