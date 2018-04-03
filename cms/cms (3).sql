-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Mrz 2018 um 22:43
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cms`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(55) NOT NULL,
  `CategoryOrderID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `CategoryOrderID`) VALUES
(1, 'General', 1),
(2, 'Surveys', 2),
(3, 'Others', 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `forum`
--

CREATE TABLE `forum` (
  `forumID` int(11) NOT NULL,
  `forumName` varchar(55) NOT NULL,
  `forumDesc` varchar(100) NOT NULL,
  `forumOrderID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `forum`
--

INSERT INTO `forum` (`forumID`, `forumName`, `forumDesc`, `forumOrderID`, `categoryID`) VALUES
(1, 'News & Announcements', 'Everything, you should know.', 1, 1),
(2, 'Support', 'Any problems with the page?', 2, 1),
(3, 'Feedback', 'Any suggestions or ideas?', 3, 1),
(4, 'Multimedia Design and Communication', 'Surveys regarding Multimedia Design and Communication', 1, 2),
(5, 'Computer Science', 'Surveys regarding Computer Science', 2, 2),
(6, 'Marketing Management', 'Surveys regarding Marketing Management', 3, 2),
(7, 'International Sales and Marketing', 'Surveys regarding International Sales and Marketing', 4, 2),
(8, 'Offtopic', 'Everything', 1, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `thread`
--

CREATE TABLE `thread` (
  `threadID` int(11) NOT NULL,
  `threadTitle` varchar(55) NOT NULL,
  `forumID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `thread`
--

INSERT INTO `thread` (`threadID`, `threadTitle`, `forumID`) VALUES
(1, 'News1', 1),
(2, 'News2', 1),
(3, 'Support1', 2),
(4, 'Support2', 2),
(5, 'News3', 1),
(6, 'News4', 0),
(7, 'News4', 1),
(8, 'News5', 1),
(10, 'Support3', 2),
(11, 'Feedback1', 3),
(12, 'Feedback2', 3),
(14, 'Feedback3', 3),
(15, 'Feedback4', 3);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indizes für die Tabelle `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`forumID`);

--
-- Indizes für die Tabelle `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`threadID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `forum`
--
ALTER TABLE `forum`
  MODIFY `forumID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `thread`
--
ALTER TABLE `thread`
  MODIFY `threadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
