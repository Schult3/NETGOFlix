-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Apr 2018 um 20:35
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `netgoflix`
--
CREATE DATABASE IF NOT EXISTS `netgoflix` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `netgoflix`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `app_users`
--

DROP TABLE IF EXISTS `app_users`;
CREATE TABLE `app_users` (
  `id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `app_users`
--

INSERT INTO `app_users` (`id`, `email`, `username`, `password`) VALUES
(5, 'stefan@netgo.de', 'stefan', '$2y$13$aRVP68Zpy/8KTR7OgGGIAO9QtHmnZM.fnXGOUiMNAwG9sH6B2Ftfe');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `favorit`
--

DROP TABLE IF EXISTS `favorit`;
CREATE TABLE `favorit` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `filmid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `favorit`
--

INSERT INTO `favorit` (`id`, `userid`, `filmid`) VALUES
(7, 5, 16),
(8, 5, 7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `titel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jahr` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imdbid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posterurl` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `film`
--

INSERT INTO `film` (`id`, `titel`, `jahr`, `genre`, `imdbid`, `posterurl`, `userid`) VALUES
(6, 'Ice Age', '2002', '7', 'tt0268380', 'http://img.omdbapi.com/?i=tt0268380&apikey=7d6ee2c0', 0),
(7, 'The Shawshank Redemption', '1994', '10', 'tt0111161', 'http://img.omdbapi.com/?i=tt0111161&apikey=7d6ee2c0', 0),
(8, 'Mr. Bean', '1990', '9', 'tt0096657', 'http://img.omdbapi.com/?i=tt0096657&apikey=7d6ee2c0', 0),
(9, 'Bang Boom Bang - Ein todsicheres Ding', '1999', '5', 'tt0135790', 'http://img.omdbapi.com/?i=tt0135790&apikey=7d6ee2c0', 0),
(10, 'The Godfather', '1972', '10', 'tt0068646', 'http://img.omdbapi.com/?i=tt0068646&apikey=7d6ee2c0', 0),
(11, 'The Godfather: Part II', '1974', '10', 'tt0071562', 'http://img.omdbapi.com/?i=tt0071562&apikey=7d6ee2c0', 0),
(12, 'The Godfather: Part III', '1990', '10', 'tt0099674', 'http://img.omdbapi.com/?i=tt0099674&apikey=7d6ee2c0', 0),
(13, 'The Social Network', '2010', '8', 'tt1285016', 'http://img.omdbapi.com/?i=tt1285016&apikey=7d6ee2c0', 0),
(16, 'Fight Club', '1999', '12', 'tt0137523', 'http://img.omdbapi.com/?i=tt0137523&apikey=7d6ee2c0', 4);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `genre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `genre`
--

INSERT INTO `genre` (`id`, `genre`) VALUES
(5, 'Action'),
(6, 'Adventure'),
(7, 'Animation'),
(8, 'Biography'),
(9, 'Comedy'),
(10, 'Crime'),
(11, 'Documentary'),
(12, 'Drama'),
(13, 'Family'),
(14, 'Fantasy'),
(15, 'Film Noir'),
(16, 'History'),
(17, 'Horror'),
(18, 'Music'),
(19, 'Musical'),
(20, 'Mystery'),
(21, 'Romance'),
(22, 'Sci-Fi'),
(23, 'Short'),
(24, 'Sport'),
(25, 'Superhero'),
(26, 'Thriller'),
(27, 'War'),
(28, 'Western');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20180410154906'),
('20180410155727'),
('20180410190120'),
('20180411162711');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- Indizes für die Tabelle `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `app_users`
--
ALTER TABLE `app_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT für Tabelle `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT für Tabelle `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
