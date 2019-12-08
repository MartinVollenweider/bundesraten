-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 06. Dez 2019 um 19:49
-- Server-Version: 10.4.8-MariaDB
-- PHP-Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bundesraten`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `resultate`
--

CREATE TABLE `resultate` (
  `br1` varchar(100) NOT NULL,
  `br1stimmen` int(3) NOT NULL,
  `br2` varchar(100) NOT NULL,
  `br2stimmen` int(3) NOT NULL,
  `br3` varchar(100) NOT NULL,
  `br3stimmen` int(3) NOT NULL,
  `br4` varchar(100) NOT NULL,
  `br4stimmen` int(3) NOT NULL,
  `br5` varchar(100) NOT NULL,
  `br5stimmen` int(3) NOT NULL,
  `br6` varchar(100) NOT NULL,
  `br6stimmen` int(3) NOT NULL,
  `br7` varchar(100) NOT NULL,
  `br7stimmen` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tipps`
--

CREATE TABLE `tipps` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tipp1` varchar(100) NOT NULL,
  `tipp1stimmen` int(3) NOT NULL,
  `tipp2` varchar(100) NOT NULL,
  `tipp2stimmen` int(3) NOT NULL,
  `tipp3` varchar(100) NOT NULL,
  `tipp3stimmen` int(3) NOT NULL,
  `tipp4` varchar(100) NOT NULL,
  `tipp4stimmen` int(3) NOT NULL,
  `tipp5` varchar(100) NOT NULL,
  `tipp5stimmen` int(3) NOT NULL,
  `tipp6` varchar(100) NOT NULL,
  `tipp6stimmen` int(3) NOT NULL,
  `tipp7` varchar(100) NOT NULL,
  `tipp7stimmen` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `passwort` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `vorname` varchar(100) NOT NULL DEFAULT '',
  `nachname` varchar(100) NOT NULL DEFAULT '',
  `jahr` varchar(5) NOT NULL DEFAULT '0',
  `klasse` varchar(2) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tipps`
--
ALTER TABLE `tipps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userId` (`user_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tipps`
--
ALTER TABLE `tipps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
