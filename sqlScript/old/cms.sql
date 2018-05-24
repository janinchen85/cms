-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Mai 2018 um 09:44
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
-- Tabellenstruktur für Tabelle `about`
--

CREATE TABLE `about` (
  `aboutTitle` varchar(55) NOT NULL,
  `aboutText` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `about`
--

INSERT INTO `about` (`aboutTitle`, `aboutText`) VALUES
('About this Forum', '<p style=\"text-align: center;\"><strong>This forum was created for all students of the Business Academy Southwest.</strong></p><p style=\"text-align: center;\"><br></p><p style=\"text-align: center;\">It should allow the students to help each other faster and easier.</p><p style=\"text-align: center;\">For example: surveys for exam projects can be shared much faster with all other students and no longer need to be sent by email.</p><p style=\"text-align: center;\"><br></p><p style=\"text-align: center;\">It is also possible to form learning groups or carpooling, which also creates many new friendships.</p><p style=\"text-align: center;\">Students can also help each other with other problems, such as hard or software problems with the PC.</p><p style=\"text-align: center;\"><br></p><p style=\"text-align: center;\"><strong>Through this forum, this school can grow into a community in which each one is important.</strong></p>');

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
-- Tabellenstruktur für Tabelle `contact`
--

CREATE TABLE `contact` (
  `contactName` varchar(55) NOT NULL,
  `contactAddress` varchar(55) NOT NULL,
  `contactPLZ` int(6) NOT NULL,
  `contactCity` varchar(55) NOT NULL,
  `contactTel` int(11) NOT NULL,
  `contactEmail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `contact`
--

INSERT INTO `contact` (`contactName`, `contactAddress`, `contactPLZ`, `contactCity`, `contactTel`, `contactEmail`) VALUES
('Janina Ortelt', 'Toftegårdsvej 6', 6893, 'Hemmet', 42266312, 'jco_20021@freenet.de');

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
-- Tabellenstruktur für Tabelle `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `postTitle` varchar(255) NOT NULL,
  `postText` longtext NOT NULL,
  `postDate` date NOT NULL,
  `postTime` time NOT NULL,
  `postEdits` int(11) NOT NULL,
  `postEditLastUserID` int(11) NOT NULL,
  `postEditDate` date NOT NULL,
  `postEditTime` time NOT NULL,
  `userID` int(11) NOT NULL,
  `threadID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `post`
--

INSERT INTO `post` (`postID`, `postTitle`, `postText`, `postDate`, `postTime`, `postEdits`, `postEditLastUserID`, `postEditDate`, `postEditTime`, `userID`, `threadID`) VALUES
(3, 'Re: Hello Friends', '<p>khsa&ouml;ldhsa</p>', '2018-04-27', '13:46:15', 0, 0, '0000-00-00', '00:00:00', 2, 1),
(4, 'Re: Hello Friends', '<p>jlkjkl gnjmhkj ghjghjhgj bvbnghjghj</p>', '2018-04-27', '13:47:01', 0, 0, '0000-00-00', '00:00:00', 2, 1),
(5, 'Re: Hello Friends', '<p>vghfhfgh</p>', '2018-04-27', '13:47:58', 0, 0, '0000-00-00', '00:00:00', 2, 1),
(14, 'Re: Edit', '<p>Answer</p>', '2018-04-29', '16:00:21', 0, 0, '0000-00-00', '00:00:00', 1, 1),
(15, 'Re: Edit', '<p>jwgzgrkuawgr</p>', '2018-05-07', '10:56:36', 0, 0, '0000-00-00', '00:00:00', 1, 5);

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
  `threadVisits` int(11) NOT NULL,
  `threadEdits` int(11) NOT NULL,
  `threadEditLastUserID` int(11) NOT NULL,
  `threadEditDate` date NOT NULL,
  `threadEditTime` time NOT NULL,
  `userID` int(11) NOT NULL,
  `forumID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `thread`
--

INSERT INTO `thread` (`threadID`, `threadTitle`, `threadText`, `threadDate`, `threadTime`, `threadVisits`, `threadEdits`, `threadEditLastUserID`, `threadEditDate`, `threadEditTime`, `userID`, `forumID`) VALUES
(1, 'Edit', '<p style=\"text-align: center;\"><strong><span style=\"font-size: 18px;\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</span></strong></p><p style=\"text-align: center;\"><strong><span style=\"color: rgb(250, 197, 28);\"><span style=\"font-size: 20px;\">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</span></span></strong></p><p style=\"text-align: center;\"><br></p><p>Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p><p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</p><p>Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p><p><br></p><p><br></p>', '2018-04-16', '11:46:59', 149, 26, 1, '2018-04-26', '20:16:30', 1, 1),
(2, 'Hello Friends', '<p>hjjhlkjlkjl</p>', '2018-04-16', '11:47:27', 6, 0, 0, '0000-00-00', '00:00:00', 1, 1),
(3, 'This is a new Thread', '<p>Yep</p>', '2018-04-17', '14:30:13', 3, 0, 0, '0000-00-00', '00:00:00', 1, 1),
(4, 'Again a new Thread', '<p>Hurray</p>', '2018-04-17', '14:31:13', 4, 0, 0, '0000-00-00', '00:00:00', 1, 1),
(5, 'A new Announcement', '<p>\r\n\r\n<!--StartFragment--></p><p style=\"font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration: none; text-align: center; margin: 0px 0px 10px; padding: 0px; line-height: normal; font-family: Verdana, Geneva, sans-serif;\"><font size=\"5\" style=\"\"><b style=\"\"><font color=\"#eeeeee\">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.<br></font><br></b></font></p><p style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration: none; font-size: 10px; margin: 0px 0px 10px; padding: 0px; line-height: normal; font-family: Verdana, Geneva, sans-serif; text-align: left;\"><font color=\"#ffffff\">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</font></p><p style=\"color: rgb(0, 0, 0); font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration: none; text-align: center; font-size: 10px; margin: 0px 0px 10px; padding: 0px; line-height: normal; font-family: Verdana, Geneva, sans-serif;\"><b><font color=\"#d900a7\">Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</font></b></p><p style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration: none; font-size: 10px; margin: 0px 0px 10px; padding: 0px; line-height: normal; font-family: Verdana, Geneva, sans-serif; text-align: left;\"><font color=\"#ffffff\">In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</font></p><p style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration: none; font-size: 10px; margin: 0px 0px 10px; padding: 0px; line-height: normal; font-family: Verdana, Geneva, sans-serif; text-align: left;\"><font color=\"#ffffff\">Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</font></p><p style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration: none; font-size: 10px; margin: 0px 0px 10px; padding: 0px; line-height: normal; font-family: Verdana, Geneva, sans-serif; text-align: left;\"><font color=\"#ffffff\">Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet.</font></p><p style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration: none; font-size: 10px; margin: 0px 0px 10px; padding: 0px; line-height: normal; font-family: Verdana, Geneva, sans-serif; text-align: left;\"><font color=\"#ffffff\">Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,</font></p><!--EndFragment-->\r\n\r\n<br><p></p>', '2018-04-25', '15:17:22', 38, 8, 1, '2018-04-25', '15:36:16', 1, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(55) NOT NULL,
  `userEmail` varchar(55) NOT NULL,
  `userPW` varchar(60) NOT NULL,
  `userGender` int(1) NOT NULL DEFAULT '0',
  `userPicture` varchar(55) NOT NULL DEFAULT 'placeholder.png',
  `userCourse` varchar(20) NOT NULL,
  `userFB` varchar(30) NOT NULL,
  `userTW` varchar(30) NOT NULL,
  `userRegDate` date NOT NULL,
  `userStatus` int(1) NOT NULL,
  `userRangID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userID`, `userName`, `userEmail`, `userPW`, `userGender`, `userPicture`, `userCourse`, `userFB`, `userTW`, `userRegDate`, `userStatus`, `userRangID`) VALUES
(1, 'Janinchen85', 'jco_2002@freenet.de', '$2y$12$vUy499nnxFR395dMkXK1luJxW9ZxcX3bjnFGt7kublUeicB4ZzkR2', 0, 'placeholder2.png', 'Webdeveloper', 'janinacindy.ortelt', 'Janinchen85', '0000-00-00', 1, 1),
(5, 'Janina85', 'jco_20021@freenet.de', '$2y$12$W6jMk7F/hyz9eFXNHaWmP.qc9Qotj.gzomsbvJtR2TcwoEteqfkf6', 0, 'placeholder.png', '', '', '', '2018-04-16', 0, 0),
(7, 'JaninaCindy', 'jco@freenet.de', '$2y$12$sMrABEs0KuFQU5KO2fSGwOexvFN58kQ7wLEf4R9nvthjd9SIlIxXq', 0, 'placeholder.png', '', '', '', '2018-04-22', 0, 0),
(13, 'Jessica', 'me@gmail.com', '$2y$10$3bayFxrjnZFqhmhu0yuat.96cy83QGE4Krl8JKnCKuAbhUYj3up.a', 0, 'placeholder.png', '', '', '', '2018-04-22', 0, 0),
(14, 'Hannelore', 'halli@hallo.de', '$2y$10$Jv9Bnhj/t26GjFPBHMU7LOjIJujxoOpXDZU67y0l6/4h3K5Q7t/YG', 0, 'placeholder.png', '', '', '', '2018-04-22', 0, 0),
(18, 'Jasnajan', 'jco@hco.de', '$2y$10$876VUd6gE2.85CBA7CITpOjmph/Uv6dnNTtnEDNbzqD6Xa4FchYpy', 0, 'placeholder.png', '', '', '', '2018-04-26', 0, 0),
(19, 'Susanne', 'hgsd@asdsd.de', '$2y$10$Ng6fiEn.XbvEjWobH8HJX.HAc6OLnc4Akn25Ptv871y0JEv8KkAbq', 0, 'placeholder.png', '', '', '', '2018-04-26', 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `userrang`
--

CREATE TABLE `userrang` (
  `userRangID` int(11) NOT NULL,
  `userRangName` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `userrang`
--

INSERT INTO `userrang` (`userRangID`, `userRangName`) VALUES
(1, 'Administrator'),
(2, 'Moderator'),
(3, 'Student');

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
-- Indizes für die Tabelle `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`);

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
-- Indizes für die Tabelle `userrang`
--
ALTER TABLE `userrang`
  ADD PRIMARY KEY (`userRangID`);

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
-- AUTO_INCREMENT für Tabelle `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT für Tabelle `thread`
--
ALTER TABLE `thread`
  MODIFY `threadID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT für Tabelle `userrang`
--
ALTER TABLE `userrang`
  MODIFY `userRangID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
