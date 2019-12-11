-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 mei 2018 om 09:39
-- Serverversie: 10.1.31-MariaDB
-- PHP-versie: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gip`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `games`
--

CREATE TABLE `games` (
  `Game_ID` int(11) NOT NULL,
  `Game_Name` char(30) DEFAULT NULL,
  `Active` tinyint(1) NOT NULL,
  `Game_URL` char(50) DEFAULT NULL,
  `Jaar` int(11) DEFAULT NULL,
  `vorm` char(3) DEFAULT NULL,
  `vak` char(20) NOT NULL,
  `Leerkracht_ID` int(11) DEFAULT NULL,
  `uitleg` char(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `games`
--

INSERT INTO `games` (`Game_ID`, `Game_Name`, `Active`, `Game_URL`, `Jaar`, `vorm`, `vak`, `Leerkracht_ID`, `uitleg`) VALUES
(1, 'Sommen', 1, '2Opties.php', 1, 'ASO', 'Wiskunde', 6, ''),
(2, 'test', 1, '2Opties.php', 1, 'ASO', 'Frans', 6, '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `User_ID` int(11) NOT NULL,
  `UserName` char(50) DEFAULT NULL,
  `Naam` char(50) NOT NULL,
  `Voornaam` char(20) NOT NULL,
  `UserRol` int(1) DEFAULT NULL,
  `Wachtwoord` char(100) NOT NULL,
  `Email` char(50) NOT NULL,
  `Lvl` int(11) DEFAULT '1',
  `Active` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`User_ID`, `UserName`, `Naam`, `Voornaam`, `UserRol`, `Wachtwoord`, `Email`, `Lvl`, `Active`) VALUES
(1, 'wout.junius', 'Junius', 'Wout', 0, '098f6bcd4621d373cade4e832627b4f6', 'wout.junius@kiwoluwe.be', 1, 1),
(2, 'hans.pauwls', 'Hans', 'Pauwls', 0, '098f6bcd4621d373cade4e832627b4f6', 'Hans.Pauls@kiwoluwe.be', 1, 1),
(3, 'karel.cleas', 'cleas', 'karel', 0, '098f6bcd4621d373cade4e832627b4f6', 'karel.cleas@kiwoluwe.be', 1, 1),
(4, 'torben.deschouwer', 'deschouwer', 'torben', 0, '098f6bcd4621d373cade4e832627b4f6', 'Torben.Deschouwer@kiwoluwe.be', 1, 1),
(5, 'evi.langui', 'evi', 'langui', 0, '098f6bcd4621d373cade4e832627b4f6', 'evi.langui@kiwoluwe.be', 1, 1),
(6, 'noortje.janssens', 'janssens', 'noortje', 1, '098f6bcd4621d373cade4e832627b4f6', 'noortje.jansens@kiwoluwe.be', 1, 1),
(7, 'admin', 'Admin', '', 2, '098f6bcd4621d373cade4e832627b4f6', '', 1, 1),
(8, 'sara.smedt', 'smedt', 'sara', 0, '098f6bcd4621d373cade4e832627b4f6', 'sara.smedt@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `opties`
--

CREATE TABLE `opties` (
  `choise_ID` int(11) NOT NULL,
  `juist` char(50) DEFAULT NULL,
  `fout` char(50) DEFAULT NULL,
  `vraag` char(50) DEFAULT NULL,
  `Game_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `opties`
--

INSERT INTO `opties` (`choise_ID`, `juist`, `fout`, `vraag`, `Game_ID`) VALUES
(1, '15', '-5', '5 + 10', 1),
(2, '170', '200', '120 + 50', 1),
(3, '35', '305', '30 + 5', 1),
(4, '106', '16', '100 + 6', 1),
(5, '185', '175', '89 + 96', 1),
(6, '2', '11', '1 + 1', 2),
(7, '11', '56', '5 + 6', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `score`
--

CREATE TABLE `score` (
  `Score_ID` int(11) NOT NULL,
  `Score_` int(11) DEFAULT NULL,
  `Game_ID` int(11) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `score`
--

INSERT INTO `score` (`Score_ID`, `Score_`, `Game_ID`, `User_ID`) VALUES
(1, 5, 1, 1),
(2, 5, 1, 2),
(3, 1, 1, 3),
(4, 3, 1, 4),
(5, 4, 1, 5),
(6, 4, 1, 8);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`Game_ID`);

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexen voor tabel `opties`
--
ALTER TABLE `opties`
  ADD PRIMARY KEY (`choise_ID`);

--
-- Indexen voor tabel `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`Score_ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `games`
--
ALTER TABLE `games`
  MODIFY `Game_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `opties`
--
ALTER TABLE `opties`
  MODIFY `choise_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `score`
--
ALTER TABLE `score`
  MODIFY `Score_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
