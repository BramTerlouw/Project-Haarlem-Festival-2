-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 09 mrt 2022 om 13:20
-- Serverversie: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developmentdb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Artist`
--

CREATE TABLE `Artist` (
  `Artist_ID` int(11) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Type` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Artist`
--

INSERT INTO `Artist` (`Artist_ID`, `Name`, `Description`, `Type`) VALUES
(5, 'Gare du Nord', 'Dutch guitarist Ferdi Lancee and saxophone player Barend Fransen started working together in 2001, when they started writing lounge music in Belgium. They signed a record deal with Play It Again Sam Records in Brussels, and released the albums (In Search Of) Excellounge (2001) and Kind Of Cool (2002). Several songs are used in the soundtracks of the series “Six Feet Under” and the movie “Ghost Rider” (2007). In 2003, Gare du Nord toured the Netherlands and Russia with a newly formed band containing nine musicians. Their third album Club Gare du Nord (2005) was recorded in their own Cell4-Studio in the Netherlands. ', 'Band'),
(6, 'Rilan & the Bombadiers', 'With a sold out first clubtour, a booming festival season and tracks that have already been featured in a number of big Hollywood productions, (Netflix / HULU / FOX: Shooter, Shut Eye and Rosewood) this band has certainly been keeping busy. Both nationally and abroad. The energetic live show along with the charismatic and unique performance of frontman Rilan will give you a time to remember.', 'Band'),
(7, 'Soul Six', 'Soul Six is a Italian Band with a wide variety of talent \r\namounst there members. The group consists of guitar and keyboard players, composers, sound engineers, and vocalists. There most popular song is L\'amore vincerà. The release of this songs went paired with a music video, that has almost six thousand views on Youtube.', 'Band'),
(8, 'Han Bennik', 'Han Bennink is a Dutch jazz drummer and percussionist. On occasion his recordings have featured him playing clarinet, violin, banjo and piano. Though perhaps best known as one of the pivotal figures in early European free jazz and free improvisation, Bennink has worked in essentially every school of jazz. Known for often injecting slapstick and absurdist humor into his performances, Bennink has had especially fruitful long-term partnerships with pianist Misha Mengelberg and saxophonist Peter Brötzmann. ', 'Artist'),
(9, 'The Nordians', 'When Oene van Geel viola, Mark Tuinstra guitar and Niti Ranjan Biswas tabla virtuoso played together for the first time there where immediately fireworks, roaring u-turns and cinematic tearjerkers. Then they started writing songs together based on traditional ragas, smashing funk and delicate chamber music. This gave them a great new impulse on stage for even more interaction and improvisation and made them build a rocking live reputation. They love to play with the three of them but they also play with special guests from around the globe such as Fraser Fifield whistle / pipes, Jorg Brinkmann cello and  Maarten Ornstein bass clarinet.', 'Band'),
(10, 'Lilith Merlot', 'Dutch singer and songwriter Lilith Merlot is known for her warm and deep voice with a timeless feel. After graduating from the Rotterdam Conservatory, she released her first (self-titled) EP ‘Lilith Merlot’, followed by airplay on national radio and live shows at various festivals and clubs throughout the Netherlands, such as the beloved North Sea Jazz Festival in Rotterdam and she opened for singer-songwriter Michael Prins during his clubtour. \r\n\r\n ', 'Artist'),
(11, 'Afrojack', 'Nick van de Wall is a 34 year old DJ from the Netherlands. He founded several record labels. He also features as one of the ten best artists in the top 100 DJs. He is also the CEO of LDH Europe.', 'DJ'),
(12, 'Armin v Buuren', 'Armin van Buuren is a 44 year old DJ from the Netherlands. He has been ranked number one DJ for five times. Hist most famous single is “This is what it feels like”.', 'DJ'),
(13, 'Hardwell', 'Robbert van de Corput is a 33 year old DJ from the Netherlands, also known as Hardwell. He was ranked number one DJ in the world twice. His most famous singles are “Bella Ciao”, “Unity”and “Apollo”. ', 'DJ'),
(14, 'Martin Garrix', 'Martijn Garritsen known as Martin Garrix is a Dutch dj who was ranked the best dj in the world for three consecutive years and his most known singles are “Animals”, “In the name of love” and “Scared to be lonely”.', 'DJ'),
(15, 'Nicky Romero', 'Nick Rotteveel also known as Nicky Romero is a dutch DJ. He has worked with big names like Tiësto, Hardwell and Avicii. He is currently ranked as number 37 best DJ in the world.  ', 'DJ'),
(16, 'Tiësto', 'Tijs Verwest, known professionally as Tiësto. Is a Dutch DJ. He was voted the greatest DJ of all time in 2010/2011. His most famous songs are “Business”, “Lethal Industry” and “Love comes again”.', 'DJ'),
(17, 'Gumbo Kings', 'LoremIpsum', 'Band'),
(18, 'Evolve', 'LoremIpsum', 'Band'),
(19, 'Ntjam Rosie', 'LoremIpsum', 'Band'),
(20, 'Tom Thomsom Assemble', 'LoremIpsum', 'Band'),
(21, 'The Family XL', 'LoremIpsum', 'Band'),
(22, 'Ruis SoundSystem', 'LoremIpsum', 'Jazz');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Booking`
--

CREATE TABLE `Booking` (
  `Booking_ID` int(11) NOT NULL,
  `EventItem_ID` int(11) NOT NULL,
  `Type` varchar(55) NOT NULL,
  `Order_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Event`
--

CREATE TABLE `Event` (
  `Event_ID` int(11) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Type` varchar(55) NOT NULL,
  `Status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Event`
--

INSERT INTO `Event` (`Event_ID`, `Name`, `StartDate`, `EndDate`, `Description`, `Type`, `Status`) VALUES
(1, 'Jazz', '2022-07-28', '2022-07-31', 'This is the description of Jazz kaas', 'Jazz', 'Active'),
(2, 'Food', '2021-07-28', '2021-07-31', 'This is the description of food.', 'Food', 'Inactive'),
(3, 'Dance', '2022-07-27', '2022-07-30', 'This is the description of Dance', 'Dance', 'Active');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Event_Item`
--

CREATE TABLE `Event_Item` (
  `EventItem_ID` int(11) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `Type` varchar(55) NOT NULL,
  `Date` date NOT NULL,
  `Start_Time` time NOT NULL,
  `Location_ID` int(11) NOT NULL,
  `Ticket_Price` int(11) NOT NULL,
  `End_Time` time NOT NULL,
  `Tickets` int(11) NOT NULL,
  `Event_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Event_Item`
--

INSERT INTO `Event_Item` (`EventItem_ID`, `Name`, `Description`, `Type`, `Date`, `Start_Time`, `Location_ID`, `Ticket_Price`, `End_Time`, `Tickets`, `Event_ID`) VALUES
(3, 'Gumbo Kings', 'Description', 'Jazz', '2022-07-28', '18:00:00', 1, 15, '19:00:00', 300, 1),
(4, 'Evolve', 'Description', 'Jazz', '2022-07-29', '19:30:00', 1, 15, '20:30:00', 300, 1),
(5, 'Ruis SoundSystem', 'Description', 'Jazz', '2022-07-29', '19:30:00', 3, 10, '20:30:00', 200, 1),
(7, 'Han Bennik', 'Description', 'Jazz', '2022-07-30', '18:00:00', 4, 10, '19:00:00', 150, 1),
(12, 'Tiesto', 'Description', 'DJ', '2022-07-29', '22:00:00', 7, 60, '23:30:00', 200, 3),
(13, 'Afrojack', 'Description', 'DJ', '2022-07-29', '20:00:00', 6, 75, '02:00:00', 1500, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Lineup`
--

CREATE TABLE `Lineup` (
  `LineUp_ID` int(11) NOT NULL,
  `EventItem_ID` int(11) NOT NULL,
  `Artist_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Lineup`
--

INSERT INTO `Lineup` (`LineUp_ID`, `EventItem_ID`, `Artist_ID`) VALUES
(13, 13, 11),
(14, 4, 18),
(15, 3, 17),
(16, 7, 8),
(17, 5, 22),
(18, 12, 16),
(19, 12, 11);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Location`
--

CREATE TABLE `Location` (
  `Location_ID` int(11) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `Address` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Location`
--

INSERT INTO `Location` (`Location_ID`, `Name`, `Address`) VALUES
(1, 'Patronaat, Main Hall', 'Zijsingel 2 Haarlem '),
(2, 'Jopenkerk', 'Gedemte Voldersgracht 2 Haarlem '),
(3, 'Patronaat, Second Hall', 'Zijsingel 2 Haarlem'),
(4, 'Patronaat, Third Hall', 'Zijsingel 2 Haarlem'),
(5, 'Grote markt', 'Grote Markt Haarlem'),
(6, 'Lichtfabriek', 'Minckelersweg 2 Haarlem'),
(7, 'Club Stalker', 'Kromme Elleboogsteeg 20 Haarlem'),
(8, 'XO the Club', 'Grote Markt 8 Haarlem'),
(9, 'Club Ruis', 'Smedesstraat 31'),
(10, 'Caprera', 'Hoge Duin en Daalsweg 2 Haarlem');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Order`
--

CREATE TABLE `Order` (
  `Order_ID` int(11) NOT NULL,
  `PhoneNumber` bigint(25) NOT NULL,
  `FullName` varchar(55) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `Is_Scanned` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Order`
--

INSERT INTO `Order` (`Order_ID`, `PhoneNumber`, `FullName`, `Email`, `Is_Scanned`) VALUES
(1, 638087845, 'Jelle Koomen', 'Test@hotmail.com', 0),
(2, 7238087653, 'Bram Terlouw', 'BramTerlouw@gmail.com', 0),
(3, 638087886, 'Fabian Kluivert', 'Fabiankluivert@hotmail.com', 1),
(4, 7238088953, 'Jesse Kops', 'JesseKops@hotmail.com', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Reservation`
--

CREATE TABLE `Reservation` (
  `Reservation_ID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Restaurant_ID` int(11) NOT NULL,
  `Amount_Children` int(11) DEFAULT NULL,
  `Amount_Adults` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Reservation`
--

INSERT INTO `Reservation` (`Reservation_ID`, `Date`, `Time`, `Restaurant_ID`, `Amount_Children`, `Amount_Adults`) VALUES
(1, '2022-07-29', '19:00:00', 3, 3, 5),
(2, '2022-07-30', '19:00:00', 4, 0, 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `resetPassword`
--

CREATE TABLE `resetPassword` (
  `reset_ID` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `resetPassword`
--

INSERT INTO `resetPassword` (`reset_ID`, `code`, `email`) VALUES
(5, '1621fb41cf3fbd', 'bramterlouw12@gmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Restaurant`
--

CREATE TABLE `Restaurant` (
  `Restaurant_ID` int(11) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `Type` varchar(55) NOT NULL,
  `Summary` varchar(1000) NOT NULL,
  `Max_visitors` int(11) NOT NULL,
  `Wheelchair_accessible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Restaurant`
--

INSERT INTO `Restaurant` (`Restaurant_ID`, `Name`, `Type`, `Summary`, `Max_visitors`, `Wheelchair_accessible`) VALUES
(3, 'Ratatouille', 'French, Fish & seafood', 'Ratatouille. The successful Michelin restaurant in Haarlem of chef Jozua Jaring is just like Ratatouille a mix of French cuisine in today\'s reality with an excellent price-quality ratio in an accessible environment in Haarlem.', 150, 0),
(4, 'Restaurant fris', 'Dutch, French, European', 'In the middle of Haarlem, near the Frederikspark, is Restaurant Fris. A modern restaurant where chef Rick May presents dishes based on classic French cuisine, which he refines with global influences.', 150, 1),
(7, 'Grand Cafe Brinkman', 'Dutch, Modern, European', 'Café Brinkmann has been a household name in Haarlem and the surrounding area since 1879. Good food, perfect coffee and staff that serve with verve and pleasure. All this against the backdrop of a monumental building, in the middle of the historic center, with a huge terrace that catches every ray of sunshine.', 150, 1),
(8, 'Urban Frenchy Bistro Toujours', 'Dutch, FIsh&SeaFood, European', 'For an intimate, cozy and beautiful dinner with friends or family, take a seat in our beautiful restaurant area. With radiant daylight thanks to the domes on our roof. In the evening, the domes provide a magical light that makes it possible to dine under the stars. Our signature dishes? The Côte de Boeuf and lobster. But we serve a much wider range of beautiful dishes as a matter of course. We particularly recommend that you come and try them all. \r\n\r\n', 150, 1),
(9, 'SpeckTakel', 'European, InterNational, Asian', 'Specktakel a world restaurant in a world location. Specktakel is a unique restaurant centrally located in the heart of Haarlem with a special courtyard and terrace. At Specktakel you do not eat in silence. Not only because of the sociability of your company, but also by the international food and worldly wine you enjoy.', 150, 1),
(10, 'Restaurant Mr & Mrs', 'Dutch, FIsh&SeaFood, European', 'Mr. & Mrs. offers an ambiance where you feel at ease. Mr. creates delicious taste explosions with honest products ', 150, 1),
(11, 'The Golden Bull', 'Steakhouse, Argentinian, European', 'In addition to high quality steaks, we offer a cozy no-nonsense atmosphere. All this combined with a wide range of special wines. An experience where your taste buds are extremely stimulated.\r\nAll our meats are prepared on the lava stone grill, which provides an enormous taste sensation.', 150, 0),
(12, 'Restaurant ML', 'Dutch, FIsh&SeaFood, European', 'In the middle of Haarlem, near the Frederikspark, is Restaurant Fris. A modern restaurant where chef Rick May presents dishes based on classic French cuisine, which he refines with global influences.', 150, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Session`
--

CREATE TABLE `Session` (
  `Session_ID` int(11) NOT NULL,
  `Restaurant_ID` int(11) NOT NULL,
  `Session_Name` varchar(55) NOT NULL,
  `Session_Time` time NOT NULL,
  `Duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Session`
--

INSERT INTO `Session` (`Session_ID`, `Restaurant_ID`, `Session_Name`, `Session_Time`, `Duration`) VALUES
(1, 10, 'First Session', '18:00:00', '01:30:00'),
(2, 10, 'Second Session', '19:30:00', '01:30:00'),
(3, 10, 'Third Session', '21:00:00', '01:30:00'),
(4, 3, 'First Session', '17:00:00', '02:00:00'),
(7, 3, 'Second Session', '19:00:00', '02:00:00'),
(8, 3, 'Third Session', '21:00:00', '02:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `User`
--

CREATE TABLE `User` (
  `User_ID` int(11) NOT NULL,
  `FullName` varchar(55) NOT NULL,
  `UserName` varchar(55) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `BirthDate` date NOT NULL,
  `Gender` varchar(55) NOT NULL,
  `Address` varchar(55) NOT NULL,
  `PostCode` varchar(55) NOT NULL,
  `City` varchar(55) NOT NULL,
  `Role` varchar(55) NOT NULL,
  `Supervisor` varchar(55) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `PhoneNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `User`
--

INSERT INTO `User` (`User_ID`, `FullName`, `UserName`, `Password`, `BirthDate`, `Gender`, `Address`, `PostCode`, `City`, `Role`, `Supervisor`, `Email`, `PhoneNumber`) VALUES
(1, 'Bram terlouw', 'Bram_Vol', 'wachtwoord', '2022-02-10', 'Male', 'Zijsingel 2 ', '2013DN Haarlem ', 'Haarlem', 'Volunteer', 'Mark De Haan', 'bramterlouw12@gmail.com', 638087845),
(2, 'Mark De Haan', 'Mark_Admin', 'wachtwoord', '2022-02-10', 'Male', 'Zijsingel 2 ', '2013DN Haarlem ', 'Haarlem', 'Admin', 'NVT', 'Test@hotmail.com', 638087845),
(6, 'Gerwin van Dijken', 'Gerwin_Super', 'wachtwoord', '1990-01-01', 'Male', 'test straat', '1388 LS', 'Alkmaar', 'Superadmin', 'De baas', 'test@email', 6929922);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Artist`
--
ALTER TABLE `Artist`
  ADD PRIMARY KEY (`Artist_ID`);

--
-- Indexen voor tabel `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`Booking_ID`),
  ADD KEY `EventItem_ID` (`EventItem_ID`),
  ADD KEY `Order_ID` (`Order_ID`);

--
-- Indexen voor tabel `Event`
--
ALTER TABLE `Event`
  ADD PRIMARY KEY (`Event_ID`);

--
-- Indexen voor tabel `Event_Item`
--
ALTER TABLE `Event_Item`
  ADD PRIMARY KEY (`EventItem_ID`),
  ADD KEY `Event_ID` (`Event_ID`),
  ADD KEY `Location_ID` (`Location_ID`);

--
-- Indexen voor tabel `Lineup`
--
ALTER TABLE `Lineup`
  ADD PRIMARY KEY (`LineUp_ID`),
  ADD KEY `EventItem_ID` (`EventItem_ID`),
  ADD KEY `Artist_ID` (`Artist_ID`);

--
-- Indexen voor tabel `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`Location_ID`);

--
-- Indexen voor tabel `Order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexen voor tabel `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`Reservation_ID`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`);

--
-- Indexen voor tabel `resetPassword`
--
ALTER TABLE `resetPassword`
  ADD PRIMARY KEY (`reset_ID`);

--
-- Indexen voor tabel `Restaurant`
--
ALTER TABLE `Restaurant`
  ADD PRIMARY KEY (`Restaurant_ID`);

--
-- Indexen voor tabel `Session`
--
ALTER TABLE `Session`
  ADD PRIMARY KEY (`Session_ID`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`);

--
-- Indexen voor tabel `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Artist`
--
ALTER TABLE `Artist`
  MODIFY `Artist_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT voor een tabel `Booking`
--
ALTER TABLE `Booking`
  MODIFY `Booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `Event`
--
ALTER TABLE `Event`
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `Event_Item`
--
ALTER TABLE `Event_Item`
  MODIFY `EventItem_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `Lineup`
--
ALTER TABLE `Lineup`
  MODIFY `LineUp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT voor een tabel `Location`
--
ALTER TABLE `Location`
  MODIFY `Location_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT voor een tabel `Order`
--
ALTER TABLE `Order`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `Reservation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `resetPassword`
--
ALTER TABLE `resetPassword`
  MODIFY `reset_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `Restaurant`
--
ALTER TABLE `Restaurant`
  MODIFY `Restaurant_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `Session`
--
ALTER TABLE `Session`
  MODIFY `Session_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `User`
--
ALTER TABLE `User`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `Booking_ibfk_1` FOREIGN KEY (`EventItem_ID`) REFERENCES `Event_Item` (`EventItem_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Booking_ibfk_2` FOREIGN KEY (`Order_ID`) REFERENCES `Order` (`Order_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `Event_Item`
--
ALTER TABLE `Event_Item`
  ADD CONSTRAINT `Event_Item_ibfk_1` FOREIGN KEY (`Location_ID`) REFERENCES `Location` (`Location_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Event_Item_ibfk_2` FOREIGN KEY (`Event_ID`) REFERENCES `Event` (`Event_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `Lineup`
--
ALTER TABLE `Lineup`
  ADD CONSTRAINT `Lineup_ibfk_1` FOREIGN KEY (`Artist_ID`) REFERENCES `Artist` (`Artist_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Lineup_ibfk_2` FOREIGN KEY (`EventItem_ID`) REFERENCES `Event_Item` (`EventItem_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Reservation_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `Restaurant` (`Restaurant_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `Session`
--
ALTER TABLE `Session`
  ADD CONSTRAINT `Session_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `Restaurant` (`Restaurant_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
