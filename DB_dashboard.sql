-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Jul 2017 um 07:52
-- Server-Version: 10.1.22-MariaDB
-- PHP-Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `dashboard`
--
CREATE DATABASE IF NOT EXISTS `dashboard` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dashboard`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `appmenu_galerie_bilder`
--

DROP TABLE IF EXISTS `appmenu_galerie_bilder`;
CREATE TABLE `appmenu_galerie_bilder` (
  `ID` bigint(20) NOT NULL,
  `imgPath` text CHARACTER SET utf8 COLLATE utf8_german2_ci,
  `showName` text CHARACTER SET utf8 COLLATE utf8_german2_ci,
  `groupID` bigint(20) DEFAULT NULL,
  `imgName` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `appmenu_galerie_bilder`
--

INSERT INTO `appmenu_galerie_bilder` (`ID`, `imgPath`, `showName`, `groupID`, `imgName`) VALUES
(4, '../../events/testdia/logoÃ¤.png', 'Dein Logo', 2, 'logoÃ¤.png'),
(5, '../../events/testdia/pic_team_head', 'Unser Team-logo', 2, 'pic_team_head'),
(6, '../../events/testdia/pic_team_middle.svg', 'Unser Team', 2, 'pic_team_middle.svg'),
(16, '../../events/testfolder/logo.png', 'Unser schÃ¶nes Logo', 4, 'logo.png'),
(17, '../../events/testfolder/pic1.png', '', 4, 'pic1.png'),
(18, '../../events/testfolder/pic2.png', '', 4, 'pic2.png'),
(19, '../../events/testfolder/pic3.png', '', 4, 'pic3.png'),
(20, '../../events/testfolder/pic4.png', 'blablabla', 4, 'pic4.png'),
(21, '../../events/testfolder/pic5.png', '', 4, 'pic5.png'),
(22, '../../events/testfolder/pic6.png', '', 4, 'pic6.png'),
(23, '../../events/testfolder/pic_team_head', '', 4, 'pic_team_head'),
(24, '../../events/testfolder/pic_team_middle.svg', 'Unser Team', 4, 'pic_team_middle.svg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `appmenu_galerie_gruppen`
--

DROP TABLE IF EXISTS `appmenu_galerie_gruppen`;
CREATE TABLE `appmenu_galerie_gruppen` (
  `ID` bigint(20) NOT NULL,
  `dirName` text CHARACTER SET utf8 COLLATE utf8_german2_ci,
  `showName` text CHARACTER SET utf8 COLLATE utf8_german2_ci,
  `Date` date DEFAULT NULL,
  `indexPath` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `appmenu_galerie_gruppen`
--

INSERT INTO `appmenu_galerie_gruppen` (`ID`, `dirName`, `showName`, `Date`, `indexPath`) VALUES
(2, '../../dashboard_appmenu/dashboard_appmenu_galerie/sites/view', 'testdia', '2000-08-01', 'sites\\testdia\\index.php'),
(4, '../../dashboard_appmenu/dashboard_appmenu_galerie/sites/view', 'Tag_der_offenen_TÃ¼r', '2017-08-13', 'sites\\testfolder\\index.php');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `appmenu_kalender`
--

DROP TABLE IF EXISTS `appmenu_kalender`;
CREATE TABLE `appmenu_kalender` (
  `ID` double NOT NULL,
  `WorkingDirectory` text,
  `Titel` text,
  `Addition` text,
  `Date` date DEFAULT NULL,
  `Link` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `appmenu_kalender`
--

INSERT INTO `appmenu_kalender` (`ID`, `WorkingDirectory`, `Titel`, `Addition`, `Date`, `Link`) VALUES
(1, '..\\..\\dashboard_appmenu\\dashboard_appmenu_kalender\\events\\Firmenessen', 'Firmenessen', 'Firmenessen_BIT', '2018-06-12', '\\events\\Firmenessen\\index.html');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `appmenu_projekte`
--

DROP TABLE IF EXISTS `appmenu_projekte`;
CREATE TABLE `appmenu_projekte` (
  `ID` bigint(20) NOT NULL,
  `Titel` text,
  `ImgPath` text,
  `ImgShow` text,
  `IndexPath` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `appmenu_projekte`
--

INSERT INTO `appmenu_projekte` (`ID`, `Titel`, `ImgPath`, `ImgShow`, `IndexPath`) VALUES
(19, 'KreativitÃ¤t', 'pic\\creative.jpg', 'creative.jpg', '\\events\\KreativitÃ¤t\\index.html'),
(20, 'Umbau', 'pic\\umbau.jpg', 'umbau.jpg', '\\events\\Umbau\\index.html'),
(21, 'Dashboard', 'pic\\dashboard.jpg', 'dashboard.jpg', '\\events\\Dashboard\\index.html');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `appmenu_team`
--

DROP TABLE IF EXISTS `appmenu_team`;
CREATE TABLE `appmenu_team` (
  `ID` bigint(20) NOT NULL,
  `ImgPersonPath` text,
  `ImgPersonShow` text,
  `Person` text,
  `Position` text,
  `Mail` text,
  `Telephone` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `appmenu_team`
--

INSERT INTO `appmenu_team` (`ID`, `ImgPersonPath`, `ImgPersonShow`, `Person`, `Position`, `Mail`, `Telephone`) VALUES
(6, 'pic\\Andre_Fluri.jpg', 'Andre_Fluri.jpg', 'AndrÃ© Fluri', 'Standortleiter', 'andre.fluri@wiss.ch', NULL),
(7, 'pic\\Peter_Thomet.jpg', 'Peter_Thomet.jpg', 'Peter Thomet', 'Schulleiter Grundbildung', 'peter.thomet@wiss.ch', NULL),
(8, 'pic\\Svend_Waldorff.jpg', 'Svend_Waldorff.jpg', 'Svend Waldorff', 'Betreuer Berufsumsteiger', 'svend.waldorff@wiss.ch', NULL),
(9, 'pic\\Tamara_Jendly.jpg', 'Tamara_Jendly.jpg', 'Tamara Jendly', 'Lehrgangsbetreuerin Firmen', 'tamara.jendly@wiss.ch', NULL),
(10, 'pic\\Alain_Fluri.jpg', 'Alain_Fluri.jpg', 'Alain Fluri', 'Mitarbeiter ICT', 'alain.fluri@wiss.ch', NULL),
(12, 'pic\\Esther_Schaer.jpg', 'Esther_Schaer.jpg', 'Esther Schaer', 'Leiterin HÃ¶here Berufsbildung', 'esther.schaer@wiss.ch', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `appmenu_umgebung`
--

DROP TABLE IF EXISTS `appmenu_umgebung`;
CREATE TABLE `appmenu_umgebung` (
  `ID` bigint(20) NOT NULL,
  `Titel` text,
  `SubTitel` text,
  `IndexPath` text,
  `ImgPath` text,
  `ImgShowName` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `appmenu_umgebung`
--

INSERT INTO `appmenu_umgebung` (`ID`, `Titel`, `SubTitel`, `IndexPath`, `ImgPath`, `ImgShowName`) VALUES
(7, 'WLAN', 'Unser Wlan Zugang', '\\events\\WLAN\\index.html', 'pic\\wifi.png', 'wifi.svg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `ID` int(11) NOT NULL,
  `username` text,
  `password` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `config`
--

INSERT INTO `config` (`ID`, `username`, `password`, `description`) VALUES
(1, 'admin', 'gibbiX12345', 'administrator');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `config_authentication`
--

DROP TABLE IF EXISTS `config_authentication`;
CREATE TABLE `config_authentication` (
  `ID` double NOT NULL,
  `Hash` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `main_pictures`
--

DROP TABLE IF EXISTS `main_pictures`;
CREATE TABLE `main_pictures` (
  `ID` bigint(20) NOT NULL,
  `showName` text,
  `dirLink` text,
  `imgLink` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `main_pictures`
--

INSERT INTO `main_pictures` (`ID`, `showName`, `dirLink`, `imgLink`) VALUES
(25, 'wiss_img1', '\\dashboard_appmenu\\dashboard_appmenu_startseiten\\wiss_img1\\index.html', 'dashboard_main\\pic\\pic1.png'),
(26, 'wiss_img2', '\\dashboard_appmenu\\dashboard_appmenu_startseiten\\wiss_img2\\index.html', 'dashboard_main\\pic\\pic2.png'),
(27, 'Piktochart', '\\dashboard_appmenu\\dashboard_appmenu_startseiten\\Piktochart\\index.html', 'dashboard_main\\pic\\piktochart.png'),
(28, 'Mango', '\\dashboard_appmenu\\dashboard_appmenu_startseiten\\Mango\\index.html', 'dashboard_main\\pic\\test1.png'),
(30, 'beste', '\\dashboard_appmenu\\dashboard_appmenu_startseiten\\beste\\index.html', 'dashboard_main\\pic\\seite1.jpg'),
(32, 'Fantastisch', '\\dashboard_appmenu\\dashboard_appmenu_startseiten\\Fantastisch\\index.html', 'dashboard_main\\pic\\fantastisch.png'),
(33, 'bmw1', '\\dashboard_appmenu\\dashboard_appmenu_startseiten\\bmw1\\index.html', 'dashboard_main\\pic\\bmw.png'),
(34, 'bmw2', '\\dashboard_appmenu\\dashboard_appmenu_startseiten\\bmw2\\index.html', 'dashboard_main\\pic\\bmw.png');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `appmenu_galerie_bilder`
--
ALTER TABLE `appmenu_galerie_bilder`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_gruppenId` (`groupID`);

--
-- Indizes für die Tabelle `appmenu_galerie_gruppen`
--
ALTER TABLE `appmenu_galerie_gruppen`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `appmenu_kalender`
--
ALTER TABLE `appmenu_kalender`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `appmenu_projekte`
--
ALTER TABLE `appmenu_projekte`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `appmenu_team`
--
ALTER TABLE `appmenu_team`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `appmenu_umgebung`
--
ALTER TABLE `appmenu_umgebung`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `config_authentication`
--
ALTER TABLE `config_authentication`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `main_pictures`
--
ALTER TABLE `main_pictures`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `appmenu_galerie_bilder`
--
ALTER TABLE `appmenu_galerie_bilder`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT für Tabelle `appmenu_galerie_gruppen`
--
ALTER TABLE `appmenu_galerie_gruppen`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `appmenu_kalender`
--
ALTER TABLE `appmenu_kalender`
  MODIFY `ID` double NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `appmenu_projekte`
--
ALTER TABLE `appmenu_projekte`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT für Tabelle `appmenu_team`
--
ALTER TABLE `appmenu_team`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT für Tabelle `appmenu_umgebung`
--
ALTER TABLE `appmenu_umgebung`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `config`
--
ALTER TABLE `config`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `config_authentication`
--
ALTER TABLE `config_authentication`
  MODIFY `ID` double NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `main_pictures`
--
ALTER TABLE `main_pictures`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `appmenu_galerie_bilder`
--
ALTER TABLE `appmenu_galerie_bilder`
  ADD CONSTRAINT `fk_gruppenId` FOREIGN KEY (`groupID`) REFERENCES `appmenu_galerie_gruppen` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
