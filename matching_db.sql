-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2016 alle 15:18
-- Versione del server: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `matching_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `passw` varchar(255) CHARACTER SET utf8 NOT NULL,
  `codiceMeccanografico` char(7) CHARACTER SET utf8 NOT NULL,
  `Tipo` char(2) CHARACTER SET utf8 NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `cognome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `codiceFiscale` char(16) CHARACTER SET utf8 NOT NULL,
  `dataNascita` date NOT NULL,
  `anzianitaArbitrale` date NOT NULL,
  `organoTecnico` varchar(10) CHARACTER SET utf8 NOT NULL,
  `indirizzo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `localita` varchar(50) CHARACTER SET utf8 NOT NULL,
  `provincia` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `codiceMeccanografico` (`codiceMeccanografico`,`codiceFiscale`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `account`
--

INSERT INTO `account` (`username`, `passw`, `codiceMeccanografico`, `Tipo`, `nome`, `cognome`, `codiceFiscale`, `dataNascita`, `anzianitaArbitrale`, `organoTecnico`, `indirizzo`, `localita`, `provincia`) VALUES
('guerra', '$2y$10$e2xC8JeXDL9TbZBAtMvdAesWOtvfq9oRlTcqGrIcZagZe0Wc3/Z1m', '4567891', 'AE', 'Francesco', 'Guerra', 'FRAGUE97R02G888L', '2016-02-03', '2010-10-10', 'OTS', 'irewr', 'gdfngdf', 'PN'),
('timurbaznat', '$2y$10$IV5MWVX3NoMBQv.flnzjM.tsa801K1JO38k6r9GoNlbqvkEH.yMdK', '345678', 'AE', 'Edoardo', 'Morassutto', 'EDOMOR97R02G888L', '1997-11-11', '2010-01-20', 'OTS', 'gfds', 'Roveredo', 'PN');

-- --------------------------------------------------------

--
-- Struttura della tabella `partita`
--

CREATE TABLE IF NOT EXISTS `partita` (
  `idPartita` int(10) NOT NULL AUTO_INCREMENT,
  `usernameArbitro` varchar(50) CHARACTER SET utf8 NOT NULL,
  `attivita` char(2) CHARACTER SET utf8 NOT NULL,
  `comitatoDelegazione` varchar(50) CHARACTER SET utf8 NOT NULL,
  `categoria` varchar(50) CHARACTER SET utf8 NOT NULL,
  `girone` varchar(10) CHARACTER SET utf8 NOT NULL,
  `giornata` int(3) NOT NULL,
  `squadraLocale` varchar(50) CHARACTER SET utf8 NOT NULL,
  `squadraOspite` varchar(50) CHARACTER SET utf8 NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `campo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `indirizzo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `localita` varchar(50) CHARACTER SET utf8 NOT NULL,
  `provincia` char(2) CHARACTER SET utf8 NOT NULL,
  `distanza` int(5) NOT NULL,
  `rimborso` float NOT NULL,
  PRIMARY KEY (`idPartita`),
  KEY `usernameArbitro` (`usernameArbitro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dump dei dati per la tabella `partita`
--

INSERT INTO `partita` (`idPartita`, `usernameArbitro`, `attivita`, `comitatoDelegazione`, `categoria`, `girone`, `giornata`, `squadraLocale`, `squadraOspite`, `data`, `ora`, `campo`, `indirizzo`, `localita`, `provincia`, `distanza`, `rimborso`) VALUES
(6, 'guerra', 'AE', 'LND FRIULI VENEZIA GIULIA', 'SECONDA CATEGORIA', 'A', 15, 'Salesiana Don Bosco', 'Calcio Aviano', '2015-12-13', '14:30:00', 'Locale', 'Via Oberdan', 'Pordenone', 'PN', 56, 60),
(7, 'guerra', 'AE', 'LND FRIULI VENEZIA GIULIA', 'SECONDA CATEGORIA', 'A', 16, 'Pravisdomini', 'Chions', '2016-02-08', '14:30:00', 'fdfs', 'fdfs', 'fdfs', 'PN', 100, 85);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `partita`
--
ALTER TABLE `partita`
  ADD CONSTRAINT `partita_ibfk_1` FOREIGN KEY (`usernameArbitro`) REFERENCES `account` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
