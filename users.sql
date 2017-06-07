-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Lis 2016, 00:16
-- Wersja serwera: 10.1.9-MariaDB
-- Wersja PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `users`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pokoje`
--

CREATE TABLE `pokoje` (
  `id` int(11) NOT NULL,
  `pokoj` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `wolne_miejsca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `pokoje`
--

INSERT INTO `pokoje` (`id`, `pokoj`, `wolne_miejsca`) VALUES
(1, '2osobowy', 3),
(2, '3osobowy', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacje`
--

CREATE TABLE `rezerwacje` (
  `id` int(11) NOT NULL,
  `id_pokoju` int(11) NOT NULL,
  `data_przyjazdu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `liczba_nocy` int(11) NOT NULL,
  `telefon` int(11) NOT NULL,
  `imie_nazwisko` text NOT NULL,
  `dodatkowe_info` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `id_usera` int(11) NOT NULL,
  `dodatkowe_lozko` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `data_zlozenia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `rezerwacje`
--

INSERT INTO `rezerwacje` (`id`, `id_pokoju`, `data_przyjazdu`, `liczba_nocy`, `telefon`, `imie_nazwisko`, `dodatkowe_info`, `id_usera`, `dodatkowe_lozko`, `data_zlozenia`) VALUES
(31, 1, '2016-11-18', 2, 789789654, 'Karol Papaj', 'KremÃ³wki majÄ… byÄ‡.', 31, 'Tak', '2016-11-09 23:04:52'),
(32, 2, '2016-11-14', 2, 784698777, 'Adam MiauczyÅ„ski', 'Prozac â€“ na chÄ™Ä‡ Å¼ycia. Geriavit â€“ na siÄ™ niestarzenie. Nootropil â€“ na lepsze funkcjonowanie metabolizmu mÃ³zgu. EnkopirynÄ™ â€“ profilaktycznie.', 32, 'Tak', '2016-11-09 23:10:49');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`) VALUES
(31, 'karol', '$2y$10$wRsZzc4vEDFANQ2ZYiWOpOlDyfIU7Aq8zAiZOI725bWMG4kw2RhCu', 'karol2@gmail.com'),
(32, 'adam', '$2y$10$86Nh6Ji83vkyWgNd98akAOXKiv4cWwU6M1.tgcE2Q3vrAbByocO.S', 'adamwww@wp.pl');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `pokoje`
--
ALTER TABLE `pokoje`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `pokoje`
--
ALTER TABLE `pokoje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
