-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2013 at 05:35 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scalper`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `USERNAME`, `PASSWORD`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `concerts`
--

CREATE TABLE IF NOT EXISTS `concerts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EVENTNAME` varchar(100) NOT NULL,
  `CATEGORY` varchar(100) NOT NULL,
  `DATES` varchar(100) NOT NULL,
  `START` varchar(100) NOT NULL,
  `END` varchar(100) NOT NULL,
  `LOCATION` varchar(100) NOT NULL,
  `PRICE` varchar(100) NOT NULL,
  `AMOUNTS` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `concerts`
--

INSERT INTO `concerts` (`ID`, `EVENTNAME`, `CATEGORY`, `DATES`, `START`, `END`, `LOCATION`, `PRICE`, `AMOUNTS`) VALUES
(1, 'ONE DIRECTION', 'Concerts', '2013-07-04', '19:30', '22:00', 'Bell Center', '104', '50'),
(2, 'BRUNO MARS', 'Concerts', '2013-07-05', '20:00', '20:00', 'Bell Center', '100', '50'),
(3, 'BEYONCÉ', 'Concerts', '2013-07-22', '20:00', '22:00', 'Bell Center', '250', '50'),
(4, 'NINE INCH NAILS', 'Concerts', '2013-10-03', '19:00', '22:00', 'Bell Center', '120', '50'),
(5, 'KISS', 'Concerts', '2013-07-29', '20:00', '22:00', 'Bell Center', '150', '50');

-- --------------------------------------------------------

--
-- Table structure for table `humour`
--

CREATE TABLE IF NOT EXISTS `humour` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EVENTNAME` varchar(100) NOT NULL,
  `CATEGORY` varchar(100) NOT NULL,
  `DATES` varchar(100) NOT NULL,
  `START` varchar(100) NOT NULL,
  `END` varchar(100) NOT NULL,
  `LOCATION` varchar(100) NOT NULL,
  `PRICE` varchar(100) NOT NULL,
  `AMOUNTS` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `humour`
--

INSERT INTO `humour` (`ID`, `EVENTNAME`, `CATEGORY`, `DATES`, `START`, `END`, `LOCATION`, `PRICE`, `AMOUNTS`) VALUES
(1, 'SUGAR SAMMY', 'Humour', '2013-09-21', '20:00', '22:00', 'Olympia', '45', '150'),
(2, 'Jean-Marc Parent', 'Humour', '2013-10-24', '20:00', '20:00', 'Uniprix Stadium', '60', '150'),
(3, 'Guillaume Wagner', 'Humour', '2013-10-25', '20:00', '22:00', 'Uniprix Stadium', '40', '100'),
(4, 'Rachid Badouri', 'Humour', '2013-10-15', '20:00', '22:00', 'Uniprix Stadium', '55', '150'),
(5, 'Dominic & Martin', 'Humour', '2013-09-24', '20:00', '22:00', 'Uniprix Stadium', '60', '150');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EVENTNAME` varchar(100) NOT NULL,
  `CATEGORY` varchar(100) NOT NULL,
  `DATES` varchar(100) NOT NULL,
  `START` varchar(100) NOT NULL,
  `END` varchar(100) NOT NULL,
  `LOCATION` varchar(100) NOT NULL,
  `PRICE` varchar(100) NOT NULL,
  `AMOUNTS` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`ID`, `EVENTNAME`, `CATEGORY`, `DATES`, `START`, `END`, `LOCATION`, `PRICE`, `AMOUNTS`) VALUES
(1, 'World War Z', 'Movies', '2013-06-24', '19:00', '21:00', 'Guzzo', '15', '150'),
(2, 'Man of Steel', 'Movies', '2013-06-25', '19:00', '22:00', 'Guzzo', '13', '150'),
(3, 'This Is the End', 'Movies', '2013-06-26', '20:00', '22:00', 'Guzzo', '20', '150'),
(4, 'The Hangover Part III', 'Movies', '2013-06-28', '20:00', '22:00', 'Banque Scotia', '15', '150'),
(5, 'Alien', 'Movies', '2013-07-01', '07:00', '20:30', 'Banque Scotia', '10', '150');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE IF NOT EXISTS `sports` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EVENTNAME` varchar(100) NOT NULL,
  `CATEGORY` varchar(100) NOT NULL,
  `DATES` varchar(100) NOT NULL,
  `START` varchar(100) NOT NULL,
  `END` varchar(100) NOT NULL,
  `LOCATION` varchar(100) NOT NULL,
  `PRICE` varchar(100) NOT NULL,
  `AMOUNTS` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`ID`, `EVENTNAME`, `CATEGORY`, `DATES`, `START`, `END`, `LOCATION`, `PRICE`, `AMOUNTS`) VALUES
(1, 'MINNESOTA vs. CELTICS ', 'Sports', '2013-10-20', '18:00', '21:00', 'Bell Center', '450', '150'),
(2, 'ANCIENS CANADIENS vs SIM', 'Sports', '2013-11-17', '14:00', '17:00', 'Bell Center', '20', '150'),
(3, 'HAMILTON @ MONTREAL', 'Sports', '2013-06-13', '19:00', '21:00', 'Olympic Stadium', '75', '150'),
(4, 'Alouettes @ Blue Bombers', 'Sports', '2013-07-04', '19:00', '21:30', 'Olympic Stadium', '75', '150'),
(5, 'Alouettes @ Argonauts', 'Sports', '2013-08-08', '19:00', '22:00', 'Olympic Stadium', '80', '150'),
(6, 'MINNESOTA vs. CELTICS ', 'Sports', '2013-10-20', '18:00', '21:00', 'Bell Center', '450', '150');

-- --------------------------------------------------------

--
-- Table structure for table `theatrical`
--

CREATE TABLE IF NOT EXISTS `theatrical` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EVENTNAME` varchar(100) NOT NULL,
  `CATEGORY` varchar(100) NOT NULL,
  `DATES` varchar(100) NOT NULL,
  `START` varchar(100) NOT NULL,
  `END` varchar(100) NOT NULL,
  `LOCATION` varchar(100) NOT NULL,
  `PRICE` varchar(100) NOT NULL,
  `AMOUNTS` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `theatrical`
--

INSERT INTO `theatrical` (`ID`, `EVENTNAME`, `CATEGORY`, `DATES`, `START`, `END`, `LOCATION`, `PRICE`, `AMOUNTS`) VALUES
(1, 'MUSIC-HALL', 'Theatrical', '2013-07-02', '20:00', '22:00', 'Olympia', '45', '250'),
(2, 'LE BALCON', 'Theatrical', '2013-11-05', '19:00', '21:00', 'Théatre du Nouveau Monde', '50', '100'),
(3, 'ICARE', 'Theatrical', '2014-01-14', '19:00', '21:00', 'Théatre du Nouveau Monde', '75', '100'),
(4, 'CYRANO DE BERGERAC', 'Theatrical', '2014-08-16', '19:00', '19:00', 'Théatre du Nouveau Monde', '75', '100'),
(5, 'LES AIGUILLES ET L''OPIUM', 'Theatrical', '2014-05-06', '19:00', '19:00', 'Théatre du Nouveau Monde', '100', '150');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `EMAILVALIDATION` varchar(100) NOT NULL,
  `FIRSTNAME` varchar(100) NOT NULL,
  `LASTNAME` varchar(100) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `CITY` varchar(100) NOT NULL,
  `PROVINCE` varchar(100) NOT NULL,
  `POSTALCODE` varchar(100) NOT NULL,
  `PHONE` varchar(100) NOT NULL,
  `CREDITCARD` varchar(100) NOT NULL,
  `CCTYPE` varchar(100) NOT NULL,
  `CCV` varchar(100) NOT NULL,
  `EXPIRATION` varchar(100) NOT NULL,
  `EXPIRATION2` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `EMAIL`, `PASSWORD`, `EMAILVALIDATION`, `FIRSTNAME`, `LASTNAME`, `ADDRESS`, `CITY`, `PROVINCE`, `POSTALCODE`, `PHONE`, `CREDITCARD`, `CCTYPE`, `CCV`, `EXPIRATION`, `EXPIRATION2`) VALUES
(12, 'alextestdummy@gmail.com', 'asdasd', 'true', 'asd', 'asd', 'asd', 'asd', 'asd', 'asdasdasd', '1212121212', '1231231231231232', 'visa', '121', '12', '12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
