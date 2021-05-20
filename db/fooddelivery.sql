-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 09, 2021 at 02:29 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fooddelivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `kartela`
--

DROP TABLE IF EXISTS `kartela`;
CREATE TABLE IF NOT EXISTS `kartela` (
  `card_number` varchar(100) NOT NULL,
  `emri_mbiemri` varchar(100) NOT NULL,
  `expiration_date` varchar(16) NOT NULL,
  `card_verification_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kartela`
--

INSERT INTO `kartela` (`card_number`, `emri_mbiemri`, `expiration_date`, `card_verification_value`) VALUES
('2400 7686 8668 6868', 'Arda Mazreku', '12 / 22', 454),
('1234 5678 9012 3456', 'eulena morina', '07 / 24', 123),
('2332 4235 3523 3522', 'Blerta Sopaj', '03 / 21', 345),
('2400 1232 4512 3141', 'Arda Mazreku', '12 / 22', 242),
('2400 2313 2141 2535', 'Arda Mazreku', '12 / 22', 234),
('2400 2232 4003 5022', 'Arda Mazreku', '11 / 25', 435);

-- --------------------------------------------------------

--
-- Table structure for table `kategorite`
--

DROP TABLE IF EXISTS `kategorite`;
CREATE TABLE IF NOT EXISTS `kategorite` (
  `id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorite`
--

INSERT INTO `kategorite` (`id`) VALUES
('beverages'),
('dessert'),
('fastfood'),
('signaturedishes');

-- --------------------------------------------------------

--
-- Table structure for table `pagesa`
--

DROP TABLE IF EXISTS `pagesa`;
CREATE TABLE IF NOT EXISTS `pagesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emri_mbiemri` varchar(50) NOT NULL,
  `cash` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagesa`
--

INSERT INTO `pagesa` (`id`, `emri_mbiemri`, `cash`) VALUES
(1, 'Albena Hasolli', '8');

-- --------------------------------------------------------

--
-- Table structure for table `perdoruesi`
--

DROP TABLE IF EXISTS `perdoruesi`;
CREATE TABLE IF NOT EXISTS `perdoruesi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emri` varchar(20) NOT NULL,
  `mbiemri` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `roli` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perdoruesi`
--

INSERT INTO `perdoruesi` (`id`, `emri`, `mbiemri`, `email`, `password`, `roli`) VALUES
(1, 'Hana ', 'Gashi', 'hanagashi@gmail.com', '1234567', 2),
(2, 'Jon', 'Hoti', 'jonhoti@gmail.com', '1234567', 2),
(3, 'Elvis', 'Krasniqi', 'elvisk@gmail.com', '123456', 1),
(4, 'Teuta', 'Kastrati', 'teutakastrati@gmail.com', '12345678', 3),
(7, 'Eulena', 'Morina', 'eulena@gmail.com', 'Eulena111', 3),
(9, 'Blerta', 'Spahiu', 'blertasph@gmail.com', 'Blertasph1', 3),
(10, 'Albena', 'Hasolli', 'albena@gmail.com', 'Albena123', 3),
(11, 'Arda', 'Mazreku', 'ardam@gmail.com', 'Ardam123', 3),
(13, 'Astrit', 'Sopaj', 'ass@gmail.com', 'Astrit1@', 3),
(14, 'food', 'delivery', 'fooddeliveryprojekt@gmail.com', 'Fooddelivery1234$', 3);

-- --------------------------------------------------------

--
-- Table structure for table `porosia`
--

DROP TABLE IF EXISTS `porosia`;
CREATE TABLE IF NOT EXISTS `porosia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `emri_u` varchar(200) NOT NULL,
  `cmimi` double NOT NULL,
  `pagesa` varchar(100) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `transporti` int(11) DEFAULT NULL,
  `gjendjaaktuale` varchar(30) DEFAULT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transporti` (`transporti`),
  KEY `gjendjaaktuale` (`gjendjaaktuale`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `porosia`
--

INSERT INTO `porosia` (`id`, `email`, `tel`, `emri_u`, `cmimi`, `pagesa`, `adresa`, `transporti`, `gjendjaaktuale`, `data`) VALUES
(1, 'teutakastrati@gmail.com', 45633531, 'Jeff Burger(1)', 3.5, 'Cash On Delivery', 'De Rada', 1, 'Porosia eshte dorezuar', '2021-01-03'),
(2, 'teutakastrati@gmail.com', 49456654, 'Jeff Burger(1), Crispy Chicken Burger(1)', 6.5, 'Debit or Credit Card', 'Terzi Mahall', 1, 'Ende per tu dorezuar', '2021-01-03'),
(3, 'ardam@gmail.com', 45332221, 'Crispy Chicken Burger(1)', 3, 'Debit or Credit Card', 'Bazhdarhane, Pellazget No.8', 1, 'Porosia eshte dorezuar', '2021-01-03'),
(4, 'ardam@gmail.com', 45332221, 'Vere e kuqe - StoneCastle(2)', 6, 'Cash On Delivery', 'Pellazget, No.8', 0, NULL, '2021-01-03'),
(5, 'ardam@gmail.com', 45332221, 'Shrimps(1), Crispy Chicken Burger(1)', 18, 'Debit or Credit Card', 'Pellazget, No.8', 0, NULL, '2021-01-03'),
(6, 'ardam@gmail.com', 45332221, 'Smoked Beef Ribs(1)', 15, 'Debit or Credit Card', 'Edit Durham, No.10', 1, 'Ende per tu dorezuar', '2021-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `resetpsw`
--

DROP TABLE IF EXISTS `resetpsw`;
CREATE TABLE IF NOT EXISTS `resetpsw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resetpsw`
--

INSERT INTO `resetpsw` (`id`, `code`, `email`) VALUES
(1, '15fe20405ac41b', 'ass@gmail.com'),
(2, '15fe2152d3cf91', 'fooddeliveryprojekt@gmail.com '),
(3, '15fe3950a802a2', 'ardamazreku99@gmail.com'),
(4, '15fe39511112c1', 'ardam@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `roli`
--

DROP TABLE IF EXISTS `roli`;
CREATE TABLE IF NOT EXISTS `roli` (
  `r_id` int(11) NOT NULL,
  `r_pershkrimi` varchar(50) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roli`
--

INSERT INTO `roli` (`r_id`, `r_pershkrimi`) VALUES
(1, 'Admin'),
(2, 'Punetor'),
(3, 'Klient');

-- --------------------------------------------------------

--
-- Table structure for table `shporta`
--

DROP TABLE IF EXISTS `shporta`;
CREATE TABLE IF NOT EXISTS `shporta` (
  `sh_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `emri` varchar(40) DEFAULT NULL,
  `pershkrimi` varchar(200) NOT NULL,
  `cmimi` double NOT NULL,
  `fotografia` varchar(50) NOT NULL,
  `sasia` int(11) NOT NULL,
  `totali` double NOT NULL,
  `kategoria` varchar(50) NOT NULL,
  `kodi` varchar(10) NOT NULL,
  PRIMARY KEY (`sh_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shporta`
--

INSERT INTO `shporta` (`sh_id`, `email`, `emri`, `pershkrimi`, `cmimi`, `fotografia`, `sasia`, `totali`, `kategoria`, `kodi`) VALUES
(1, 'albena@gmail.com', 'Grilled lamb', 'Wood fire grilled lamb cutlets and chops', 8, 'images/lamb.jpg', 1, 8, 'signaturedishes', '180103'),
(2, 'teutakastrati@gmail.com', 'Shrimps', 'Cooked shrimps, along with our special, delicious spaghetti served together our special white wine', 15, 'images/shrimps.jpg', 1, 15, 'signaturedishes', '180102');

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

DROP TABLE IF EXISTS `track`;
CREATE TABLE IF NOT EXISTS `track` (
  `gjendjaaktuale` varchar(30) NOT NULL,
  PRIMARY KEY (`gjendjaaktuale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`gjendjaaktuale`) VALUES
('Ende per tu dorezuar'),
('Porosia eshte anuluar'),
('Porosia eshte dorezuar');

-- --------------------------------------------------------

--
-- Table structure for table `transporti`
--

DROP TABLE IF EXISTS `transporti`;
CREATE TABLE IF NOT EXISTS `transporti` (
  `id` int(11) NOT NULL,
  `gjendja` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transporti`
--

INSERT INTO `transporti` (`id`, `gjendja`) VALUES
(0, 'Porosia nuk eshte ende gati'),
(1, 'Porosia gati');

-- --------------------------------------------------------

--
-- Table structure for table `ushqimi`
--

DROP TABLE IF EXISTS `ushqimi`;
CREATE TABLE IF NOT EXISTS `ushqimi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kodi` varchar(10) NOT NULL,
  `emri` varchar(30) NOT NULL,
  `pershkrimi` varchar(200) NOT NULL,
  `cmimi` double NOT NULL,
  `sasia` int(11) NOT NULL DEFAULT 1,
  `fotografia` varchar(50) DEFAULT NULL,
  `kategoria` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kodi` (`kodi`),
  KEY `kategoria` (`kategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ushqimi`
--

INSERT INTO `ushqimi` (`id`, `kodi`, `emri`, `pershkrimi`, `cmimi`, `sasia`, `fotografia`, `kategoria`) VALUES
(1, '180100', 'Crispy Chicken Burger', 'Mish pule, domate, sallate e gjelbert, patate, qepe, kackavall', 3, 1, 'images/bur.jpg', 'fastfood'),
(2, '180101', 'Jeff Burger', 'Copa te biftekut,cheddar, salce, qepe', 3.5, 1, 'images/burger.jpg', 'fastfood'),
(3, '180102', 'Shrimps', 'Karkaleca te gatuar, se bashku me spagetet tona te vecanta ', 10, 1, 'images/shrimps.jpg', 'signaturedishes'),
(4, '180103', 'Grilled lamb', 'Copa mish qengji te pjekura ne zjarr ne dru', 8, 1, 'images/lamb.jpg', 'signaturedishes'),
(5, '180104', 'Grilled king prawns', 'Karkaleca deti, te ndara dhe te marinuara', 10, 1, 'images/prawns.jpg', 'signaturedishes'),
(6, '180105', 'Smoked Beef Ribs', 'Brinje viqi te tymosur me salcen tone te fshehte, te shijshme', 15, 1, 'images/steakbones.jpg', 'signaturedishes'),
(7, '180106', 'Vere e kuqe - StoneCastle', 'Vere e kuqe vendore e prodhuar ne Rahovec', 3, 1, 'images/wine.jpg', 'beverages'),
(8, '180107', 'Vere e bardhe - StoneCastle', 'Vere e bardhe vendore e prodhuar ne Rahovec', 3, 1, 'images/whitewine.jpg', 'beverages'),
(9, '180108', 'Vere e bardhe - StoneCastle', 'Vere e bardhe e lehte, vendore e prodhuar ne Rahovec', 3, 1, 'images/whitewine2.jpg', 'beverages'),
(10, '180109', 'Birra Peja', 'Birre e shijshme vendore e prodhuar ne Peje', 2, 1, 'images/peja.jpg', 'beverages'),
(11, '180110', 'Ice Coffee', 'Kafe e ftohte me lloj te qumeshtit qe ju deshironi', 1.5, 1, 'images/icecoffee.jpg', 'beverages'),
(12, '180111', 'Hot Coffee', 'Kafe e nxehte sipas deshires suaj', 1, 1, 'images/hotcoffee.jpg', 'beverages'),
(13, '180112', 'Kek me cokollade', 'Kek me cokollade me fill te vanilles dhe cokollade mbi', 2, 1, 'images/cake2.jpg', 'dessert'),
(14, '180113', 'Torte me dredheza', 'Kek me cokollade me fill dhe sos te dredhezes', 2, 1, 'images/cake5.jpg', 'dessert'),
(15, '180114', 'Torte me fruta', 'Torte me fill vanile, kivi, portokall dhe dredheza', 2, 1, 'images/cake4.jpg', 'dessert'),
(16, '180115', 'Chocolate Mousse', 'E bere me krem pana te aromatizuar me cokollate', 2, 1, 'images/cake.jpg', 'dessert'),
(17, '180116', 'Kek me karrota', 'Kek me karrota, fruta te thata mbi dhe pistacchio', 2, 1, 'images/cake6.jpg', 'dessert'),
(18, '180117', 'Torte me fruta mali', 'Torte e mrekullueshme me kek dhe fill nga fruta mali', 2, 1, 'images/cake3.jpg', 'dessert');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
