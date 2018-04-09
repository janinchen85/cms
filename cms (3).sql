-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Apr 2018 um 16:47
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
  `threadText` longtext NOT NULL,
  `threadDate` date NOT NULL,
  `threadTime` time NOT NULL,
  `userID` int(11) NOT NULL,
  `forumID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `thread`
--

INSERT INTO `thread` (`threadID`, `threadTitle`, `threadText`, `threadDate`, `threadTime`, `userID`, `forumID`) VALUES
(1, 'This is a Test', '[color=#000000][size=2][font=Verdana, Arial, Helvetica, sans-serif][b]Lorem ipsum[/b][/font][/size][/color]\r\n\r\n[center]Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam[/center]\r\n[color=#b20080]Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam[/color]\r\n\r\n\r\n[color=#b20080]13:31:22:angel:[/color]', '2018-04-08', '13:31:29', 1, 1),
(3, 'Another One', 'asdasdasdasdasd', '2018-04-08', '14:15:04', 1, 1),
(4, 'ghjfjgjh', 'fjhfgjhfgjhh', '2018-04-08', '14:15:36', 1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(55) NOT NULL,
  `userEmail` varchar(55) NOT NULL,
  `userPW` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userID`, `userName`, `userEmail`, `userPW`) VALUES
(1, 'Janina', 'jco_2002@freenet.de', '$2y$12$vUy499nnxFR395dMkXK1luJxW9ZxcX3bjnFGt7kublUeicB4ZzkR2');

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
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

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
  MODIFY `threadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
