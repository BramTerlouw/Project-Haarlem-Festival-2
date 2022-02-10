-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 10 feb 2022 om 12:24
-- Serverversie: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- PHP-versie: 7.4.25

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
(3, 'Afrojack', 'Nick van de Wall is a 34 year old DJ from the Netherlands. He founded several record labels. He also features as one of the ten best artists in the top 100 DJs. He is also the CEO of LDH Europe.', 'Dj'),
(4, 'Gare du Nord', 'Dutch guitarist Ferdi Lancee and saxophone player Barend Fransen started working together in 2001, when they started writing lounge music in Belgium. They signed a record deal with Play It Again Sam Records in Brussels, and released the albums (In Search Of) Excellounge (2001) and Kind Of Cool (2002). \r\n\r\nSeveral songs are used in the soundtracks of the series “Six Feet Under” and the movie “Ghost Rider” (2007). In 2003, Gare du Nord toured the Netherlands and Russia with a newly formed band containing nine musicians. Their third album Club Gare du Nord (2005) was recorded in their own Cell4-Studio in the Netherlands. ', 'Jazz Artist');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Booking`
--

CREATE TABLE `Booking` (
  `Booking_ID` int(11) NOT NULL,
  `EventItem_ID` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Type` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Booking`
--

INSERT INTO `Booking` (`Booking_ID`, `EventItem_ID`, `Amount`, `Type`) VALUES
(1, 1, 3, 'Jazz'),
(2, 2, 1, 'Dance');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Event`
--

CREATE TABLE `Event` (
  `Event_ID` int(11) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  `Type` varchar(55) NOT NULL,
  `Status` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Event`
--

INSERT INTO `Event` (`Event_ID`, `Name`, `StartDate`, `EndDate`, `Type`, `Status`) VALUES
(1, 'Jazz', '2022-07-28 21:56:20', '2022-07-31 21:56:20', 'Jazz', 'Active'),
(2, 'Food', '2021-07-28 21:56:20', '2021-07-31 21:56:20', 'Food', 'Inactive');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Event_Item`
--

CREATE TABLE `Event_Item` (
  `EventItem_ID` int(11) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `Type` varchar(55) NOT NULL,
  `Date` date NOT NULL,
  `Start_Time` time NOT NULL,
  `Artist_ID` int(11) NOT NULL,
  `Location_ID` int(11) NOT NULL,
  `Ticket_Price` int(11) NOT NULL,
  `End_Time` time NOT NULL,
  `Tickets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Event_Item`
--

INSERT INTO `Event_Item` (`EventItem_ID`, `Name`, `Type`, `Date`, `Start_Time`, `Artist_ID`, `Location_ID`, `Ticket_Price`, `End_Time`, `Tickets`) VALUES
(1, 'Gare Du Nord', 'Jazz', '2022-07-30', '18:00:00', 4, 1, 15, '19:00:00', 300),
(2, 'AfroJack', 'Dance', '2022-07-30', '22:00:00', 3, 2, 60, '23:30:00', 300);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Location`
--

CREATE TABLE `Location` (
  `Location_ID` int(11) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `Max_Visitors` int(11) NOT NULL,
  `Address` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Location`
--

INSERT INTO `Location` (`Location_ID`, `Name`, `Max_Visitors`, `Address`) VALUES
(1, 'Patronaat', 150, 'Zijsingel 2 2013 DN Haarlem '),
(2, 'Jopenkerk', 150, 'Gedemte Voldersgracht 2 Haarlem ');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Menu`
--

CREATE TABLE `Menu` (
  `Menu_ID` int(11) NOT NULL,
  `Menu_Type` varchar(55) NOT NULL,
  `Menu_Language` varchar(55) NOT NULL,
  `Menu_Name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Menu`
--

INSERT INTO `Menu` (`Menu_ID`, `Menu_Type`, `Menu_Language`, `Menu_Name`) VALUES
(1, 'Dinner', 'English', 'Testmenu_English'),
(2, 'Lunch', 'Dutch', 'TestMenu_Dutch'),
(3, 'Wine_Menu', 'English', 'TestWineMenu_English'),
(4, 'Wine_Menu', 'Dutch', 'TestWineMenu_Dutch');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Menu_Item`
--

CREATE TABLE `Menu_Item` (
  `Menu_Item_ID` int(11) NOT NULL,
  `Title` varchar(55) NOT NULL,
  `ingredients` varchar(255) NOT NULL,
  `Menu_ID` int(11) NOT NULL,
  `Menu_Item_Type` varchar(55) NOT NULL,
  `Menu_Item_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Menu_Item`
--

INSERT INTO `Menu_Item` (`Menu_Item_ID`, `Title`, `ingredients`, `Menu_ID`, `Menu_Item_Type`, `Menu_Item_Price`) VALUES
(3, 'Test_MenuItem_Dinner', 'loremipsum, loremipsum, loremipsum', 1, 'Dinner_Menu_Item', 15),
(4, 'Test_MenuItem_Lunch', 'loremipsum, loremipsum, loremipsum', 2, 'Lunch_Menu_Item', 15),
(5, 'Test_MenuItem_Wine_Glass', 'loremipsum, loremipsum, loremipsum', 3, 'Test_MenuItem_Wine_Glass', 15),
(6, 'Test_MenuItem_Wine_Bottle', 'loremipsum, loremipsum, loremipsum', 4, 'Test_MenuItem_Wine_Bottle', 50);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Order`
--

CREATE TABLE `Order` (
  `Order_ID` int(11) NOT NULL,
  `PhoneNumber` bigint(25) NOT NULL,
  `FullName` varchar(55) NOT NULL,
  `Email` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Order`
--

INSERT INTO `Order` (`Order_ID`, `PhoneNumber`, `FullName`, `Email`) VALUES
(1, 638087845, 'Jelle Koomen', 'Test@hotmail.com'),
(2, 7238087653, 'Bram Terlouw', 'BramTerlouw@gmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Recipes`
--

CREATE TABLE `Recipes` (
  `Recipe_ID` int(11) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `Duration` int(30) NOT NULL,
  `Content` varchar(1000) NOT NULL,
  `Is_Vegan` tinyint(1) NOT NULL,
  `Restaurant_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Recipes`
--

INSERT INTO `Recipes` (`Recipe_ID`, `Name`, `Duration`, `Content`, `Is_Vegan`, `Restaurant_ID`) VALUES
(1, 'Smoked Potato', 200, '1: test\r\n2:test\r\n3:test\r\n4:test\r\n5:test', 1, 3),
(2, 'Ratatouille', 50, 'Step 1 -  Preheat the oven to 375 degrees F (190 degrees C).\r\n\r\nStep 2 - Spread tomato paste into the bottom of a 25,4x25,4-Cm(10x10-inch) baking dish.\r\n\r\nStep 3 - Sprinkle with onion and garlic and stir in 1 tablespoon olive oil and water until thoroughly combined.\r\n\r\nstep 4 - Season with salt and black pepper.\r\n\r\nstep 5 - Arrange alternating slices of eggplant, zucchini, yellow squash, red bell pepper, and yellow bell pepper, starting at the outer edge of the dish and working concentrically towards the center.\r\n\r\n    ', 1, 3);

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
-- Tabelstructuur voor tabel `Restaurant`
--

CREATE TABLE `Restaurant` (
  `Restaurant_ID` int(11) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `Type` varchar(55) NOT NULL,
  `Summary` varchar(1000) NOT NULL,
  `Menu_ID` int(11) NOT NULL,
  `WineMenu_ID` int(11) DEFAULT NULL,
  `Max_visitors` int(11) NOT NULL,
  `Wheelchair_accessible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `Restaurant`
--

INSERT INTO `Restaurant` (`Restaurant_ID`, `Name`, `Type`, `Summary`, `Menu_ID`, `WineMenu_ID`, `Max_visitors`, `Wheelchair_accessible`) VALUES
(3, 'Ratatouille', 'French, Fish & seafood', 'LoremIpsum, LoremIpsum,  LoremIpsum, ', 1, NULL, 150, 0),
(4, 'Restaurant fris', 'Dutch, French, European', 'LoremIpsum, LoremIpsum, LoremIpsum, ', 2, 3, 150, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `User`
--

CREATE TABLE `User` (
  `User_ID` int(11) NOT NULL,
  `FullName` varchar(55) NOT NULL,
  `UserName` varchar(55) NOT NULL,
  `Password` varchar(55) NOT NULL,
  `BirthDate` datetime NOT NULL,
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
(1, 'Bram terlouw', 'Bram_Vol', 'wachtwoord', '2022-02-10 10:28:18', 'Male', 'Zijsingel 2 ', '2013DN Haarlem ', 'Haarlem', 'Volunteer', 'Mark De Haan', 'Bram@hotmail.com', 638087845),
(2, 'Mark De Haan', 'Mark_Admin', 'wachtwoord', '2022-02-10 10:30:42', 'Male', 'Zijsingel 2 ', '2013DN Haarlem ', 'Haarlem', 'Admin', 'NVT', 'Test@hotmail.com', 638087845);

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
  ADD KEY `EventItem_ID` (`EventItem_ID`);

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
  ADD KEY `Location_ID` (`Location_ID`),
  ADD KEY `Artist_ID` (`Artist_ID`);

--
-- Indexen voor tabel `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`Location_ID`);

--
-- Indexen voor tabel `Menu`
--
ALTER TABLE `Menu`
  ADD PRIMARY KEY (`Menu_ID`);

--
-- Indexen voor tabel `Menu_Item`
--
ALTER TABLE `Menu_Item`
  ADD PRIMARY KEY (`Menu_Item_ID`),
  ADD KEY `Menu_ID` (`Menu_ID`);

--
-- Indexen voor tabel `Order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexen voor tabel `Recipes`
--
ALTER TABLE `Recipes`
  ADD PRIMARY KEY (`Recipe_ID`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`);

--
-- Indexen voor tabel `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`Reservation_ID`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`);

--
-- Indexen voor tabel `Restaurant`
--
ALTER TABLE `Restaurant`
  ADD PRIMARY KEY (`Restaurant_ID`),
  ADD KEY `Menu_ID` (`Menu_ID`),
  ADD KEY `WineMenu_ID` (`WineMenu_ID`);

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
  MODIFY `Artist_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `Booking`
--
ALTER TABLE `Booking`
  MODIFY `Booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `Event`
--
ALTER TABLE `Event`
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `Event_Item`
--
ALTER TABLE `Event_Item`
  MODIFY `EventItem_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `Location`
--
ALTER TABLE `Location`
  MODIFY `Location_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `Menu`
--
ALTER TABLE `Menu`
  MODIFY `Menu_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `Menu_Item`
--
ALTER TABLE `Menu_Item`
  MODIFY `Menu_Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `Order`
--
ALTER TABLE `Order`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `Recipes`
--
ALTER TABLE `Recipes`
  MODIFY `Recipe_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `Reservation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `Restaurant`
--
ALTER TABLE `Restaurant`
  MODIFY `Restaurant_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `User`
--
ALTER TABLE `User`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `Booking_ibfk_1` FOREIGN KEY (`EventItem_ID`) REFERENCES `Event_Item` (`EventItem_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `Event_Item`
--
ALTER TABLE `Event_Item`
  ADD CONSTRAINT `Event_Item_ibfk_1` FOREIGN KEY (`Location_ID`) REFERENCES `Location` (`Location_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Event_Item_ibfk_2` FOREIGN KEY (`Artist_ID`) REFERENCES `Artist` (`Artist_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `Menu_Item`
--
ALTER TABLE `Menu_Item`
  ADD CONSTRAINT `Menu_Item_ibfk_1` FOREIGN KEY (`Menu_ID`) REFERENCES `Menu` (`Menu_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `Recipes`
--
ALTER TABLE `Recipes`
  ADD CONSTRAINT `Recipes_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `Restaurant` (`Restaurant_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Reservation_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `Restaurant` (`Restaurant_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Beperkingen voor tabel `Restaurant`
--
ALTER TABLE `Restaurant`
  ADD CONSTRAINT `Restaurant_ibfk_1` FOREIGN KEY (`Menu_ID`) REFERENCES `Menu` (`Menu_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Restaurant_ibfk_2` FOREIGN KEY (`WineMenu_ID`) REFERENCES `Menu` (`Menu_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
