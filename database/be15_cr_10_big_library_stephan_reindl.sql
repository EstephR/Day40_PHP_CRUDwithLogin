-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2022 at 02:56 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be15_cr_10_big_library_stephan_reindl`
--
CREATE DATABASE IF NOT EXISTS `be15_cr_10_big_library_stephan_reindl` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `be15_cr_10_big_library_stephan_reindl`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ISBN` bigint(20) NOT NULL,
  `title` varchar(80) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `type` varchar(40) NOT NULL,
  `author_fname` varchar(80) NOT NULL,
  `author_lname` varchar(80) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `publisher_address` varchar(100) NOT NULL,
  `publish_date` date DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `title`, `image`, `description`, `type`, `author_fname`, `author_lname`, `publisher_name`, `publisher_address`, `publish_date`, `status`) VALUES
(2147483647, 'Kaufen oder mieten?', 'kaufenOderMieten.jpg', 'Wie Sie für sich die richtige Entscheidung treffen', 'E-Book', 'Gerd', 'Kommer', 'Campus Verlag GmbH', 'Kurfürstenstraße 49, 60486 Frankfurt am Main', '2010-07-14', 'reserved'),
(3257230885, 'Small World', 'smallWorld.jpg', 'Eine mit einer Krankheitsgeschichte verflochtene Kriminalstory', 'Book', 'Martin', 'Suter', 'Diogenes', 'Sprecherstrasse 8, 8032 Zürich', '2016-03-16', 'not available'),
(3423004002, 'Ansichten eines Clowns', 'ansichtenEinesClowns.jpg', 'Heinrich Böll zeigt den Alltag einer Liebe', 'Book', 'Heinrich', 'Böll', 'Deutscher Taschenbuch Verlag', 'Tumblingerstr. 21, 80337 München', '1923-01-23', 'reserved'),
(978396009166, 'Angular', 'angular.jpg', 'Das Praxisbuch zu Grundlagen und Best Practices', 'Book', 'Manfred', 'Steyer', 'O\'Reilly', 'Wieblinger Weg 17, 69123 Heidelberg', '2021-05-18', 'available'),
(9780007267125, 'The rational optimist', 'theRationalOptimist.jpg', 'A brilliant futuristic look at what is happening to us all', 'Book', 'Matt', 'Ridley', 'Forth Estate', '1 London bridge street, London SE1 9GF', '2015-06-08', 'available'),
(9780141039411, 'A new earth', 'aNewEarth.jpg', 'Create a better life', 'Book', 'Eckhart', 'Tolle', 'Penguin books', '20 Vauxhall Bridge Rd, London SW1V 2SA', '2013-03-04', 'not available'),
(9783499255564, 'Die andere Seite', 'dieAndereSeite.jpg', 'Ein Jahrhundertroman über den Kampf zwischen Gut und Böse', 'Book', 'Alfred', 'Kubin', 'Rowolt Taschenbuch Verlag', 'Kirchenallee 19\r\n20099 Hamburg', '1993-03-11', 'available'),
(9783518390450, 'Biedermann und die Brandstifter', 'biedermannUndDieBrandstifter.jpg', 'Die verdorbene Sprache ist der Kern des Verderbens von Person und Gemeinschaft', 'Book', 'Max', 'Frisch', 'Surkamp', 'Torstraße 44, 10119 Berlin', '1935-03-05', 'reserved'),
(9783866473836, 'Jugend ohne Gott', 'jugendOhneGott.jpg', 'Sie ist verroht, gefühlskalt  und unmoralisch, jene Jugend ohne Gott', 'Book', 'Ödön', 'von Horvath', 'Anaconda', 'Neumarkter Str. 28 81673 München', '1944-03-07', 'available'),
(9783866477162, 'Herr und Knecht', 'herrUndKnecht.jpg', 'Eine zeitlose Parabel auf die Macht der Mitmenschlichkeit', 'Book', 'Leo', 'Tolstoi', 'Diogenes', 'Sprecherstrasse 8, 8032 Zürich', '1893-03-15', 'reserved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
