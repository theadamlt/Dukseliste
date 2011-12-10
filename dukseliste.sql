-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 10. 12 2011 kl. 22:46:45
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
  `rowID` int(11) NOT NULL AUTO_INCREMENT,
  `schoolID` text NOT NULL,
  `class` text NOT NULL,
  PRIMARY KEY (`rowID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Data dump for tabellen `classes`
--

INSERT INTO `classes` (`rowID`, `schoolID`, `class`) VALUES
(1, '1', '9.b'),
(2, '1', '2.a'),
(3, '2', '9.a');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
  `rowID` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`rowID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Data dump for tabellen `schools`
--

INSERT INTO `schools` (`rowID`, `name`) VALUES
(1, 'Hejskole'),
(2, 'Lolskole');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `rowID` int(11) NOT NULL AUTO_INCREMENT,
  `schoolID` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`rowID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Data dump for tabellen `students`
--

INSERT INTO `students` (`rowID`, `schoolID`, `classID`, `name`) VALUES
(1, 1, 1, 'Adam'),
(2, 1, 1, 'Brian'),
(3, 2, 1, 'Jørgen');
