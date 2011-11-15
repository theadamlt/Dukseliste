-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 15. 11 2011 kl. 10:12:03
-- Serverversion: 5.5.8
-- PHP-version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dukseliste`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `rowID` int(11) NOT NULL DEFAULT '1',
  `school` text NOT NULL,
  `class` text NOT NULL,
  PRIMARY KEY (`rowID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `classes`
--

INSERT INTO `classes` (`rowID`, `school`, `class`) VALUES
(1, 'Hejskole', '9.b');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `rowID` int(11) NOT NULL DEFAULT '1',
  `school` text NOT NULL,
  PRIMARY KEY (`rowID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `schools`
--

INSERT INTO `schools` (`rowID`, `school`) VALUES
(1, 'Hejskole');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `rowID` int(11) NOT NULL AUTO_INCREMENT,
  `school` text NOT NULL,
  `class` text NOT NULL,
  `student` text NOT NULL,
  PRIMARY KEY (`rowID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Data dump for tabellen `students`
--

INSERT INTO `students` (`rowID`, `school`, `class`, `student`) VALUES
(1, 'Hejskole', '9.b', 'Adam'),
(2, 'Hejskole', '9.b', 'Brian');
