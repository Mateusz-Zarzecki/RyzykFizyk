-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 04, 2025 at 09:21 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS ryzykfizyk;
USE ryzykfizyk;

CREATE TABLE `pytania` (
  `IdPytania` int(11) NOT NULL,
  `Tresc` text NOT NULL,
  `PrawidlowaOdp` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

INSERT INTO `pytania` (`IdPytania`, `Tresc`, `PrawidlowaOdp`) VALUES
(1, 'Ile kilometrów ma Amazonka?', 6400),
(2, 'W którym roku wybuchła I wojna światowa?', 1914),
(3, 'Ile litrów wody wypija przeciętnie człowiek rocznie?', 730),
(4, 'Ile kilogramów waży przeciętny dorosły słoń afrykański?', 6000),
(5, 'Ile metrów długości ma most Golden Gate?', 2737),
(6, 'Ile litrów krwi ma dorosły człowiek?', 5),
(7, 'W którym roku założono Uniwersytet Jagielloński?', 1364),
(8, 'Ile sekund ma doba?', 86400),
(9, 'Ile metrów liczy Mount Everest?', 8848),
(10, 'Ile klocków LEGO produkowanych jest każdego dnia?', 20000000),
(11, 'W ilu krajach na świecie mówi się po hiszpańsku jako języku urzędowym?', 21),
(12, 'Ile godzin trwa lot z Warszawy do Tokio (średnio)?', 11),
(13, 'Ile zębów ma dorosły człowiek (pełne uzębienie)?', 32),
(14, 'Ile lat miał Mozart, gdy skomponował pierwszą symfonię?', 8),
(15, 'Ile piłek tenisowych mieści się w Boeingu 747?', 550000),
(16, 'Ile procent Ziemi stanowią oceany?', 71),
(17, 'Ile kilogramów jabłek zjada przeciętny Polak rocznie?', 20),
(18, 'Ile osób mieszka w Polsce (stan na 2024)?', 37700000),
(19, 'Ile kilometrów ma autostrada A4 w Polsce?', 672),
(20, 'Ile kroków robi przeciętny człowiek dziennie?', 5000),
(21, 'Ile klatek animacji ma typowy film animowany w 90 minutach?', 129600),
(22, 'W jakim roku człowiek pierwszy raz stanął na Księżycu?', 1969),
(23, 'Ile kości ma dorosły człowiek?', 206),
(24, 'Ile km/h wynosi prędkość światła w próżni?', 299792),
(25, 'Ile litrów wody zużywa się przeciętnie podczas jednej kąpieli w wannie?', 150),
(26, 'Ile osób mieszka w Tokio (aglomeracja, 2024)?', 37400000),
(27, 'Ile jajek zjada przeciętny Polak rocznie?', 160),
(28, 'Ile sekund trwa jedna tura gry w szachy błyskawiczne (blitz)?', 300),
(29, 'Ile lat miał Isaac Newton, gdy odkrył prawo grawitacji?', 23),
(30, 'Ile kilogramów papieru zużywa rocznie przeciętny Europejczyk?', 160),
(31, 'Ile razy serce człowieka bije średnio w ciągu dnia?', 100000),
(32, 'Ile cyfr ma liczba bilion (w zapisie liczbowym)?', 13),
(33, 'Ile wynosi średni wzrost żyrafy w cm?', 550),
(34, 'Ile psów zarejestrowano w Polsce w 2023 roku?', 7200000),
(35, 'Ile godzin średnio przesypia człowiek w ciągu roku?', 2920),
(36, 'Ile chromosomów ma człowiek?', 46),
(37, 'Ile metrów długości ma Wieża Eiffla?', 330),
(38, 'Ile gramów waży przeciętny smartfon?', 180),
(39, 'Ile znaków (liter, spacji, interpunkcji) zawiera „Pan Tadeusz”?', 290000),
(40, 'Ile klatek ma jedna sekunda filmu w kinie (standardowo)?', 24),
(41, 'Ile lat miał Napoleon, gdy został cesarzem Francuzów?', 35),
(42, 'Ile kalorii zawiera przeciętny hamburger z fast foodu?', 500),
(43, 'Ile godzin potrzeba, by obejrzeć całą trylogię „Władca Pierścieni” (wersja rozszerzona)?', 12),
(44, 'Ile samochodów wyprodukowano na świecie w 2023 roku?', 93000000),
(45, 'Ile centymetrów mierzy średnio noworodek?', 50),
(46, 'Ile litrów mleka daje jedna krowa dziennie (średnio)?', 25),
(47, 'Ile państw członkowskich liczy Unia Europejska?', 27),
(48, 'Ile dni ma rok przestepny?', 366),
(49, 'Ile kontynentow jest na Ziemi?', 7),
(50, 'Ile miesiecy ma rok?', 12),
(51, 'Ile planet znajduje sie w Ukladzie Slonecznym?', 8),
(52, 'Ile lat ma przecietny dorosly czlowiek w momencie osiagniecia pelnoletnosci?', 18),
(53, 'Ile osob jest w przecietnej rodzinie?', 4),
(54, 'Ile kilometrow ma pelny okrag?', 360),
(55, 'Ile dni trwa przecietny urlop w Polsce?', 20),
(56, 'Ile lat trwa przecietna kadencja prezydenta w Polsce?', 5),
(57, 'Ile palcow ma czlowiek?', 20),
(58, 'Ile lat ma przecietny uczen w szkole podstawowej?', 12),
(59, 'Ile dni ma luty w roku nieprzestepnym?', 28),
(60, 'Ile godzin trwa przecietny lot z Warszawy do Nowego Jorku?', 10),
(61, 'Ile osob jest w przecietnym zespole muzycznym?', 4),
(62, 'Ile lat ma przecietny emeryt w Polsce?', 65),
(63, 'Ile kilometrow ma przecietna trasa maratonu?', 42),
(64, 'Ile dni trwa przecietny miesiac?', 30),
(65, 'Ile osob mieszka w najwiekszym miescie na swiecie?', 37000000),
(66, 'Ile lat ma przecietny pies?', 10),
(67, 'Ile dni w roku przypada na weekend?', 104),
(68, 'Ile lat ma przecietny student na studiach licencjackich?', 21),
(69, 'Ile osob jest potrzebnych do stworzenia zespolu sportowego?', 11),
(70, 'Ile lat ma przecietny pracownik w Polsce?', 40),
(71, 'Ile dni trwa przecietny rok szkolny?', 200),
(72, 'Ile lat ma najstarszy znany dab w Polsce?', 1000),
(73, 'Ile osob jest w przecietnym samochodzie osobowym?', 4),
(74, 'Ile lat ma przecietny nauczyciel w Polsce?', 45),
(75, 'Ile dni trwa przecietny festiwal muzyczny?', 3),
(76, 'Ile lat ma przecietny prezydent w Polsce?', 55),
(77, 'Ile osob jest w przecietnym zespole teatralnym?', 10),
(78, 'Ile lat ma przecietny wlasciciel psa?', 35),
(79, 'Ile dni w roku przypada na swieta?', 13);

ALTER TABLE `pytania`
  ADD PRIMARY KEY (`IdPytania`);

ALTER TABLE `pytania`
  MODIFY `IdPytania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

COMMIT;
