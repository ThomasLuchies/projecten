-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 15 okt 2022 om 12:26
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `likes`
--

CREATE TABLE `likes` (
  `likeID` smallint(6) NOT NULL,
  `msgID` smallint(6) DEFAULT NULL,
  `UserID` smallint(6) DEFAULT NULL,
  `Type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `likes`
--

INSERT INTO `likes` (`likeID`, `msgID`, `UserID`, `Type`) VALUES
(54, 39, 13, 'like'),
(113, 38, 33, 'dislike'),
(114, 39, 33, 'dislike'),
(115, 37, 33, 'dislike'),
(128, NULL, 33, 'like'),
(129, NULL, 33, 'like'),
(130, NULL, 33, 'like'),
(131, NULL, 33, 'like'),
(132, NULL, 33, 'like'),
(133, NULL, 33, 'like'),
(134, NULL, 33, 'like'),
(135, NULL, 33, 'like'),
(136, NULL, 33, 'like'),
(137, NULL, 33, 'like'),
(138, NULL, 33, 'like');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `messages`
--

CREATE TABLE `messages` (
  `msgID` smallint(6) NOT NULL,
  `UserID` smallint(6) DEFAULT NULL,
  `Message` varchar(255) DEFAULT NULL,
  `likes` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `messages`
--

INSERT INTO `messages` (`msgID`, `UserID`, `Message`, `likes`) VALUES
(1, 9, 'jkldsjfklsdajf', 0),
(2, 9, 'jkldsjfklsdajf', 0),
(3, 9, 'jkldsjfklsdajf', 0),
(4, 9, 'jkldsjfklsdajf', 0),
(5, 9, 'jhkjdtfygvuhijlk', 0),
(6, 9, 'jhkjdtfygvuhijlk', 0),
(7, 9, 'bitchboi69\r\n', 0),
(8, 9, 'bitchboi69\r\n', 0),
(9, 9, ')); DROP TABLE;', 0),
(10, 9, 'dfsf', 0),
(11, 9, 'fasfsdaf sdf a', 0),
(12, 9, 'fasfsdaf sdf a', 0),
(13, 9, 'dsafsadf', 0),
(14, 9, 'dsafsadf', 0),
(15, 9, 'dsafsadf', 0),
(16, 9, 'dsafsadf', 0),
(17, 9, 'dsafsadf', 0),
(18, 9, 'dsafsadf', 0),
(19, 9, 'dkdfasj;fdklfjsd;klf', 0),
(20, 10, 'jfidsjfasd;fja\r\n', 0),
(21, NULL, 'kjlkhgfjkbhjnkopi;ulhygkjvh', 0),
(22, NULL, 'fkdsafj;dsalfjsldfjaf\r\n', 0),
(23, NULL, 'afsafdfa', 0),
(24, NULL, 'asfdaf', 0),
(25, NULL, 'aspldkofijhyuitfrgyuhij', 0),
(26, NULL, 'akdfsj;afkdlfadsfaadsdfadfs', 0),
(27, NULL, 'skfj;asdlfja;', 0),
(28, NULL, 'fadsfa', 0),
(29, 29, 'ljf;asdfj', 0),
(30, 30, 'fsdaklj', 0),
(31, 31, 'jfhkasldfh', 0),
(32, 9, 'abcdefghijklmnopqrstuvwxyz', 0),
(34, 32, 'THE WALL', 0),
(35, 32, 'alert(&#34;the wall&#34;);', 0),
(36, 9, 'cdfsaf\r\n', 0),
(37, 10, 'kk', 0),
(38, 33, 'ljhuygt', 0),
(39, 33, 'fkjdsa;fjdslajf', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `private_messages`
--

CREATE TABLE `private_messages` (
  `pmID` smallint(6) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `sendby` smallint(6) DEFAULT NULL,
  `sendto` smallint(6) DEFAULT NULL,
  `datetimesent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `private_messages`
--

INSERT INTO `private_messages` (`pmID`, `message`, `sendby`, `sendto`, `datetimesent`) VALUES
(35, 'd\r\n', 9, 9, '2019-12-19 23:53:04'),
(36, 'd\r\n', 9, 9, '2019-12-19 23:53:04'),
(37, 'd\r\n', 9, 9, '2019-12-19 23:53:12'),
(38, 'd\r\n', 9, 9, '2019-12-19 23:53:12'),
(39, 'd\r\n', 9, 9, '2019-12-19 23:53:13'),
(40, 'd\r\n', 9, 9, '2019-12-19 23:53:13'),
(41, 'hello', 9, 9, '2019-12-19 23:53:39'),
(42, 'hello', 9, 9, '2019-12-19 23:53:39'),
(43, 'fdskfjasl;', 9, 9, '2019-12-19 23:56:51'),
(44, 'fdskfjasl;', 9, 9, '2019-12-19 23:56:51'),
(45, 'fdskfjasl;', 9, 9, '2019-12-20 17:31:32'),
(46, 'fdskfjasl;', 9, 9, '2019-12-20 17:31:32'),
(47, 'fdskfjasl;', 9, 9, '2019-12-20 17:31:32'),
(48, 'fdskfjasl;', 9, 9, '2019-12-20 17:31:32'),
(49, 'fdskfjasl;', 9, 9, '2019-12-20 17:31:33'),
(50, 'fdskfjasl;', 9, 9, '2019-12-20 17:31:33'),
(51, 'fdskfjasl;', 9, 9, '2019-12-20 17:31:33'),
(52, 'fdskfjasl;', 9, 9, '2019-12-20 17:31:33'),
(53, 'fdskfjasl;', 9, 9, '2019-12-20 17:31:33'),
(54, 'fdskfjasl;', 9, 9, '2019-12-20 17:31:33'),
(55, 'fdskfjasl;', 9, 9, '2019-12-20 17:31:34'),
(56, 'fdskfjasl;', 9, 9, '2019-12-20 17:31:34'),
(57, 'fdskfjasl;', 9, 9, '2019-12-20 17:32:07'),
(58, 'fdskfjasl;', 9, 9, '2019-12-20 17:32:07'),
(59, 'fdskfjasl;', 9, 9, '2019-12-20 17:32:12'),
(60, 'fdskfjasl;', 9, 9, '2019-12-20 17:32:12'),
(61, 'fdskfjasl;', 9, 9, '2019-12-20 17:32:33'),
(62, 'fdskfjasl;', 9, 9, '2019-12-20 17:32:33'),
(63, 'fdskfjasl;', 9, 9, '2019-12-20 17:32:34'),
(64, 'fdskfjasl;', 9, 9, '2019-12-20 17:32:34'),
(65, 'fdskfjasl;', 9, 9, '2019-12-20 17:32:37'),
(66, 'fdskfjasl;', 9, 9, '2019-12-20 17:32:37'),
(67, 'fdskfjasl;', 9, 9, '2019-12-20 17:33:02'),
(68, 'fdskfjasl;', 9, 9, '2019-12-20 17:33:02'),
(69, 'fdskfjasl;', 9, 9, '2019-12-20 17:37:51'),
(70, 'fdskfjasl;', 9, 9, '2019-12-20 17:37:51'),
(71, 'fdskfjasl;', 9, 9, '2019-12-20 17:38:07'),
(72, 'fdskfjasl;', 9, 9, '2019-12-20 17:38:07'),
(73, 'fkjsdf', 10, 33, '2019-12-20 17:39:33'),
(74, 'fkjsdf', 10, 33, '2019-12-20 17:39:33'),
(75, 'Kfjsd\r\n', 9, 33, '2019-12-20 17:39:53'),
(76, 'Kfjsd\r\n', 9, 33, '2019-12-20 17:39:53'),
(77, 'fdsafj', 19, 33, '2019-12-20 17:49:28'),
(78, 'fdsafj', 19, 33, '2019-12-20 17:49:28'),
(79, 'hello', 33, 9, '2019-12-20 22:09:03'),
(80, 'hello', 33, 9, '2019-12-20 22:09:03'),
(81, 'dfad', 9, 33, '2019-12-21 14:37:16'),
(82, 'dfad', 9, 33, '2019-12-21 14:37:16'),
(83, 'fafsdafdsaf', 9, 33, '2019-12-21 19:04:00'),
(84, 'fafsdafdsaf', 9, 33, '2019-12-21 19:04:05'),
(85, 'fadsffsadf', 33, 9, '2019-12-21 19:04:39'),
(86, 'fadskfslfdsakfjlsfadsljf', 33, 9, '2019-12-21 19:05:53'),
(88, 'aksdfj;', 33, 9, '2019-12-21 19:07:38'),
(89, 'kjk', 33, 9, '2019-12-21 23:45:44'),
(90, 'kdsjfasd;', 33, 9, '2019-12-22 11:54:44'),
(91, 'kdsjfasd;', 33, 9, '2019-12-22 11:56:03'),
(92, 'klijhyugtfurgyuhijojgdtrfgyuhijoifjsdlkfaklijhyugtfurgyuhijojgdtrfgyuhijoifjsdlkfaklijhyugtfurgyuhijojgdtrfgyuhijoifjsdlkfaklijhyugtfurgyuhijojgdtrfgyuhijoifjsdlkfa', 33, 9, '2019-12-22 13:09:00'),
(94, 'klijhyugtfurgyuhijojgdtrfgyuhijoifjsdlkfaklijhyugtfurgyuhijojgdtrfgyuhijoifjsdlkfaklijhyugtfurgyuhijojgdtrfgyuhijoifjsdlkfaklijhyugtfurgyuhijojgdtrfgyuhijoifjsdlkfa\r\nklijhyugtfurgyuhijojgdtrfgyuhijoifjsdlkfaklijhyugtfurgyuhijojgdtrfgyuhijoifjsdlkfaklijhyu', 33, 9, '2019-12-22 20:47:22'),
(96, 'alert(&#34;hello&#34;)', 33, 9, '2019-12-24 23:02:56'),
(97, 'alert(&#34;the wall&#34;);', 33, 10, '2019-12-24 23:03:16'),
(98, 'kfdsj jfksda jfdksfj kfsdlfds  fjdskf kfj dsfkasd fkf sdjfkds fds k fklasfj dskf jfdskfjdsaklfj sfkds fjkdsfjdskf a dsla fsdkaf lfjafjksdfjal fjk asfl af skfajf sa jkfas fk aslf as', 33, 9, '2019-12-24 23:28:21'),
(99, 'jgvcfvhbiujo', 33, 9, '2019-12-30 22:56:44'),
(100, 'dfjasdkfl;', 33, 30, '2019-12-30 22:57:08'),
(101, 'kloijgyugu', 33, 31, '2019-12-30 22:57:44'),
(102, 'fakjsdlf;', 33, 29, '2019-12-30 23:06:01'),
(103, 'fksadf', 33, 33, '2019-12-31 16:36:18'),
(104, 'wdefgrx', 33, 9, '2020-01-09 11:05:41'),
(105, 'asfdgf', 33, 9, '2020-01-09 11:05:56'),
(106, 'fadsf', 33, 9, '2020-01-09 11:07:53'),
(107, 'dsaf', 33, 9, '2020-01-09 11:08:00'),
(108, 'fdasf', 33, 9, '2020-01-09 11:08:03'),
(109, 'fdsfas', 33, 9, '2020-01-09 11:08:04'),
(110, 'fdsfdas', 33, 9, '2020-01-09 11:08:06'),
(111, 'mafdjdsfds;akl', 33, 30, '2020-01-09 11:08:16'),
(112, 'dkljfaslkdf', 33, 30, '2020-01-09 11:08:21'),
(113, 'fdasaasdf', 33, 30, '2020-01-09 11:08:40'),
(114, 'fdsaf', 33, 30, '2020-01-09 11:08:42'),
(115, 'fsda', 33, 30, '2020-01-09 11:08:44'),
(116, 'fsda', 33, 30, '2020-01-09 11:08:46'),
(117, 'test', 34, 32, '2020-10-02 10:50:15'),
(118, 'jlkjsfdklfjd', 34, 32, '2020-10-02 10:50:31'),
(119, 'fdkajfkl', 34, 31, '2020-10-02 10:51:18'),
(120, 'moi moatie\r\n', 9, 33, '2020-11-27 11:43:18'),
(121, 'moi moatie\r\n', 9, 33, '2020-11-27 11:43:25'),
(122, 'moi moatie', 9, 32, '2020-11-27 11:43:55'),
(123, 'moi moatie', 9, 25, '2020-11-27 11:44:26');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `UserID` smallint(6) NOT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Picture` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`, `Picture`) VALUES
(9, 'd', '$2y$10$LDsAR8TW7fUn9Cv9iwrVDeR8pSodtWOXjTpqhwXZj3I6i35WbAJ1S', 'thomasluchies22@gmail.com', 'img/standardprofilepicture.png'),
(10, 's', '$2y$10$c.4zX7Rh4T5Vxs/OPTpOduOMdLoZqNqzP4bn/DusEDyrVd0NVsrC2', 'thomasluchies22@gmail.com', 'img/standardprofilepicture.png'),
(11, 's', '$2y$10$TPyppcPt6qXJYdCyl5fi9eT4K5GJ0pfyr0wW/3MGdTQsrfIE.07WW', 'thomasluchies22@gmail.com', 'img/standardprofilepicture.png'),
(12, 's', '$2y$10$TnMA2IRrwuqwpehrYRbjqurZnO2v2IvdH/K7PQSfKOYldh/yON8yS', 'thomasluchies22@gmail.com', 'img/standardprofilepicture.png'),
(13, 'e', '$2y$10$Dh0Yh.ViUAY7YUqJqfGuv.tiN5K.954kFynTxGO38PqqEtNmAZJIu', 'Thomas.luchies@student.nhlstenden.com', 'img/standardprofilepicture.png'),
(14, 'w', '$2y$10$4xtVKoKUQ.YnuEbfeeGgCeMu.8t2Ln7ECdZD2uo2NWltP.Ry0dYL.', 'Thomas.luchies@student.nhlstenden.com', 'img/standardprofilepicture.png'),
(15, 'k', '$2y$10$MOElx64lVqjUCMqXQYYAjuMphdmm.J0jiRrzKUiOkYGrbDauMaN9W', 'thomasluchies22@gmail.com', 'img/standardprofilepicture.png'),
(16, 'h', '$2y$10$HevTcENHOfNjI4NCg/1bOecnije618leP5a9UlvB6laGoZwD.VJJa', 'Thomasluchies22@gmail.com', 'img/standardprofilepicture.png'),
(17, 'm', '$2y$10$akql/Puw0YsYOvUaS2yga.e0g9AEqT1gsxZXbKLmPnmf8wHVRfGUy', 'Thomasluchies22@gmail.com', 'img/standardprofilepicture.png'),
(18, 'b', '$2y$10$oAixGuPByMdgtjbH10Hz.OViXl0mAD2.95bFrekTdNXSNf9lkfT8C', 'Thomas.luchies@student.nhlstenden.com', 'img/standardprofilepicture.png'),
(19, 'n', '$2y$10$wIGIJc7U.A5HoHqneZqvteIAPt97eyeQ9fDI/HRyyMJ2c7uVDNPLW', 'Thomas.luchies@student.nhlstenden.com', 'img/standardprofilepicture.png'),
(20, 'thomas', '$2y$10$k5DJMgjfnb/a7UFOzydbXOzHCh8nNcOjMsZKHoaUimvcwFCj4tdNe', 'Thomas.luchies@student.nhlstenden.com', 'img/profile_pictures/5deeabb4b80950.41671602.png'),
(21, 'afsdf', '$2y$10$bH2KSzLYiTMIe3KpbhLV.ezK6Vvb8pknqH2Bdgz1CGYaw/RjKDlYC', 'Thomas.luchies@student.nhlstenden.com', 'img/profile_pictures/5deeacb212fc67.96616743.jpeg'),
(22, 'adklsafjf', '$2y$10$CdeOLd.7SvOC/T6koYZtkOGde9AZajP1R0ccUPpd3/oUC55VJfa/C', 't@d.com', 'img/profile_pictures/5deead22cabc41.82424605.jpeg'),
(23, 'dsklfja;', '$2y$10$Z8Q5YAHsFLvWDH2VoDyzBeJy5LJE7wYV0y6cFRHj0QSJaKgd0WA72', 't@d.com', 'img/standardprofilepicture.png'),
(24, 'klafj;sf', '$2y$10$9voOuCa8pQOk8N/Gi0l0Xu6VIygOaXyROsaWc61.2bd.m4Rk2IMCa', 'fadsklf@fsaf.com', 'img/standardprofilepicture.png'),
(25, 'adfskl', '$2y$10$15iIIhAl7TbW4W3SWzoHCe92U/Tt3I7Glyo87tyURPuY4BRv9UVRu', 'dfa@afds.com', 'img/standardprofilepicture.png'),
(26, 'ka;ldfja;', '$2y$10$xz1u69f5dD3E8NcckbyHFeH4XHIzfHwz0xrYS/pesloVoAxCOowPq', 'skafjd@kdjfa.com', 'img/profile_pictures/5deeafdc4afc94.40266463.jpeg'),
(27, 'aklf;', '$2y$10$dULkOpTyXGrN0dBVRT.nwefLyl.sM/vIvh9fA6Q8GjiR4NuqL0B6y', 'adfk@skaf.com', 'img/standardprofilepicture.png'),
(28, 'fkla;f', '$2y$10$Y5/VpNSG0.xSzLaSPMSae.XkK4qSWFd6R3J73x73q.Ao85tnxyqfi', 'fjadskl@fksadf.com', 'img/standardprofilepicture.png'),
(29, 'aklfs', '$2y$10$xhbPbXgH4GCdfijAJcIBB.u3Z46zSikroG2RLBxnv7loUuipnDrDa', 'fsadkfl@d.com', 'img/standardprofilepicture.png'),
(30, 'kladsjf;', '$2y$10$7pZeXGmG8.ccr73PGzaure.ogWk5r3n9AfkOR5fzhjDIh8ryHWtc6', 'sadfkdjl@kjslaf.com', 'img/standardprofilepicture.png'),
(31, 'aljsdf', '$2y$10$MYMaYvfO.4b2qngJGsDcpO3snYZBaGj69GuEMvp.5Q2jpewYyHfee', 'fklasdjf@lksfja.com', 'img/profile_pictures/5deeb302643c99.68811257.jpeg'),
(32, 'donald', '$2y$10$V8cqygaZmuyhM6zP.PxWQOqZ.ZFytsE9LkV9QGDlhPV9p1CmGf346', 'donald@trump.com', 'img/profile_pictures/5df0c1c0275893.05432532.jpeg'),
(33, 'test', '$2y$10$7ffY.0mr6mjWx/PaNNREYe4hwXKvWZcPwWcnN3YhC.KB945NcRnVe', 'thomasluchies22@gmail.com', 'img/standardprofilepicture.png'),
(34, 'KikkertjeK', '$2y$10$PS4HSqaFSGy0Lsn7LZhHZu9a7gJpKHO7Pu39YOKlCtcgH37Pnw6dS', 'Thomasluchies22@gmail.com', 'img/standardprofilepicture.png');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`likeID`),
  ADD KEY `msgID` (`msgID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexen voor tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msgID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexen voor tabel `private_messages`
--
ALTER TABLE `private_messages`
  ADD PRIMARY KEY (`pmID`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `likes`
--
ALTER TABLE `likes`
  MODIFY `likeID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT voor een tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `msgID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT voor een tabel `private_messages`
--
ALTER TABLE `private_messages`
  MODIFY `pmID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `UserID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`msgID`) REFERENCES `messages` (`msgID`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Beperkingen voor tabel `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
