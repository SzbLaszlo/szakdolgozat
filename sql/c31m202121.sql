-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Feb 09. 21:47
-- Kiszolgáló verziója: 10.4.14-MariaDB
-- PHP verzió: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `c31m202121`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ertekeles`
--

CREATE TABLE `ertekeles` (
  `id` int(11) NOT NULL,
  `felhasznalo` varchar(50) NOT NULL,
  `ertekeles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `id` int(11) NOT NULL,
  `felhasznalo` varchar(50) NOT NULL,
  `jelszo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `felhasznalo`, `jelszo`) VALUES
(1, 'proba', 'proba'),
(2, 'asd', '7815696ecbf1c96e6894b779456d330e');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `marka`
--

CREATE TABLE `marka` (
  `id` int(11) NOT NULL,
  `marka` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `marka`
--

INSERT INTO `marka` (`id`, `marka`) VALUES
(1, 'iphone');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tipusok`
--

CREATE TABLE `tipusok` (
  `id` int(11) NOT NULL,
  `nev` text NOT NULL,
  `markaId` int(11) NOT NULL,
  `processzor` text NOT NULL,
  `magok` int(10) NOT NULL,
  `sebesseg` double DEFAULT NULL,
  `ram` int(11) NOT NULL,
  `rom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `tipusok`
--

INSERT INTO `tipusok` (`id`, `nev`, `markaId`, `processzor`, `magok`, `sebesseg`, `ram`, `rom`) VALUES
(1, 'iphone 13', 1, 'A15 Bionic', 6, 3.23, 4, 128),
(2, 'iphone 12', 1, 'A14 Bionic', 6, 3.01, 4, 128),
(4, 'iphone 11', 1, 'A13 Bionic', 6, 2.66, 4, 128),
(5, 'iphone xr', 1, 'A12 Bionic', 6, 2.49, 6, 64),
(6, 'iphone 8', 1, 'A11 Bionic', 6, 2.39, 2, 64),
(7, 'iphone 7', 1, 'A10 Fusion', 4, 2.23, 2, 32),
(8, 'iphone 6', 1, 'A8', 2, 1.4, 1, 32);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `velemeny`
--

CREATE TABLE `velemeny` (
  `id` int(11) NOT NULL,
  `felhasznalo` varchar(50) NOT NULL,
  `velemeny` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `ertekeles`
--
ALTER TABLE `ertekeles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznalo` (`felhasznalo`);

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznalo` (`felhasznalo`);

--
-- A tábla indexei `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `tipusok`
--
ALTER TABLE `tipusok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ibfk_conn_marka` (`markaId`);

--
-- A tábla indexei `velemeny`
--
ALTER TABLE `velemeny`
  ADD PRIMARY KEY (`id`),
  ADD KEY `felhasznalo` (`felhasznalo`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `ertekeles`
--
ALTER TABLE `ertekeles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `marka`
--
ALTER TABLE `marka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `tipusok`
--
ALTER TABLE `tipusok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `velemeny`
--
ALTER TABLE `velemeny`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `ertekeles`
--
ALTER TABLE `ertekeles`
  ADD CONSTRAINT `ertekeles_ibfk_1` FOREIGN KEY (`felhasznalo`) REFERENCES `felhasznalok` (`felhasznalo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ertekeles_ibfk_2` FOREIGN KEY (`id`) REFERENCES `tipusok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `marka`
--
ALTER TABLE `marka`
  ADD CONSTRAINT `marka_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tipusok` (`markaId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `velemeny`
--
ALTER TABLE `velemeny`
  ADD CONSTRAINT `velemeny_ibfk_1` FOREIGN KEY (`felhasznalo`) REFERENCES `felhasznalok` (`felhasznalo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `velemeny_ibfk_2` FOREIGN KEY (`id`) REFERENCES `tipusok` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
