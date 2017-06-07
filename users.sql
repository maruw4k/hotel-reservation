-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Lis 2016, 01:13
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
-- Struktura tabeli dla tabeli `rezerwacje`
--

CREATE TABLE `rezerwacje` (
  `id` int(11) NOT NULL,
  `rodzaj_pokoju` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `data_przyjazdu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `liczba_nocy` int(11) NOT NULL,
  `telefon` int(11) NOT NULL,
  `imie_nazwisko` text NOT NULL,
  `dodatkowe_info` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `id_usera` int(11) NOT NULL,
  `dodatkowe_lozko` text CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `rezerwacje`
--

INSERT INTO `rezerwacje` (`id`, `rodzaj_pokoju`, `data_przyjazdu`, `liczba_nocy`, `telefon`, `imie_nazwisko`, `dodatkowe_info`, `id_usera`, `dodatkowe_lozko`) VALUES
(72, '2osobowy', '2016-11-08', 5, 5416, 'MAre', 'elo co tam', 17, 'Tak'),
(73, '2osobowy', '2016-11-11', 2, 777896457, 'Adam MiaÅ‚czyÅ„ski', 'Pozdrawiam cieplutko', 20, 'Tak');

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
(1, 'adam', '$2y$10$lMO4T0UiimB0E4NzZ9JL3emKYtk43luce/o1zt7DAZlTuLcpJF6/y', 'adam@gmail.com'),
(11, 'marek435', '$2y$10$wOJUSvZFFBCJDZ63O9Bcrer6anq9Bcpa/GWlpqYi0yuRoU4IttRMG', 'marek31@gmail.com'),
(12, 'marek3439', '$2y$10$QryN5q1arhZNFEBByH4Lp.40w2CVZZAa2OTSSgnazVY2602pVxVii', 'marek234@wp.pl'),
(14, 'marek27', '$2y$10$UNOQG3hzvqMrnqYSsi0T..dDVKaLAuhB60Zl1bPpu7lWEdZpAE0Um', 'marek27@gmail.com'),
(16, 'mkrzeszowiec', '$2y$10$3IPr4za8ZZnGq4HI0NJxjOAYih.MB.dQl3UtzD8HHnIVhwiHBw2m6', 'mkrzeszowiec@wp.pl'),
(17, 'k4wuram', '$2y$10$X48mJ06e6NtaGdfOFjiJU.vkPR03Qi1LoXFlrSSWQh5gdZKoiiq1y', 'dsfdf@wp.pl'),
(18, 'kamil', '$2y$10$amwtEk70FwMHJnVPgfg6leQx.98avCA/N5JWy4W9giTw61epOmmtC', 'kamik@wpop.pl'),
(19, 'pawelk', '$2y$10$6jD3pGhYqmws53I5ilJsw.zXkzmwghjGa.UhcDA7v7jIqziynpI.G', 'pawe@wp.pl'),
(20, 'adam17', '$2y$10$2L9MIdUcOEOAMnuHDVwntO7Aec4e6atlZ1NND1rV6Y1ilFhGpaBY2', 'adam17@gmail.com');

--
-- Indeksy dla zrzutów tabel
--

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
-- AUTO_INCREMENT dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
