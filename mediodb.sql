-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 14. 12 2019 kl. 17:02:10
-- Serverversion: 10.1.37-MariaDB
-- PHP-version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slothify`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `artworkPath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES
(1, 'Bacon and Eggs', 2, 4, 'assets/images/artwork/clearday.jpg'),
(2, 'Pizza Heads', 5, 10, 'assets/images/artwork/energy.jpg'),
(3, 'Vegetables', 2, 2, 'assets/images/artwork/funkyelement.jpg'),
(4, 'High', 2, 2, 'assets/images/artwork/goinghigher.jpg'),
(5, 'Laziness', 4, 6, 'assets/images/artwork/sweet.jpg'),
(6, 'Funk', 3, 8, 'assets/images/artwork/popdance.jpg'),
(7, 'Chill', 1, 9, 'assets/images/artwork/ukulele.jpg');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(1, 'Mickey Mouse'),
(2, 'Goofy'),
(3, 'Bart Simpson'),
(4, 'Homer Simpson'),
(5, 'Bruce Lee');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Rock'),
(2, 'Pop'),
(3, 'Hip Hop'),
(4, 'Rap'),
(5, 'R&B'),
(6, 'Classical'),
(7, 'Techno'),
(8, 'Jazz'),
(9, 'Folk'),
(10, 'Country');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `ip`
--

CREATE TABLE `ip` (
  `address` char(16) COLLATE utf8_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Data dump for tabellen `ip`
--

INSERT INTO `ip` (`address`, `timestamp`) VALUES
('::1', '2019-12-10 03:42:49'),
('::1', '2019-12-10 03:42:52'),
('::1', '2019-12-10 03:42:55'),
('::1', '2019-12-10 08:01:43'),
('::1', '2019-12-10 08:01:47'),
('::1', '2019-12-10 08:01:49'),
('::1', '2019-12-10 01:14:52');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `owner`, `dateCreated`) VALUES
(6, 'Test', 'DrilonBraha', '2019-12-10 00:00:00'),
(7, 'New', 'DrilonBraha', '2019-12-10 00:00:00'),
(16, 'New Discovers', 'DrilonBraha', '2019-12-10 00:00:00');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `playlistsongs`
--

CREATE TABLE `playlistsongs` (
  `id` int(11) NOT NULL,
  `songId` int(11) NOT NULL,
  `playlistId` int(11) NOT NULL,
  `playlistOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `playlistsongs`
--

INSERT INTO `playlistsongs` (`id`, `songId`, `playlistId`, `playlistOrder`) VALUES
(4, 2, 6, 2),
(5, 31, 6, 3),
(6, 6, 7, 0),
(7, 8, 7, 1),
(8, 12, 16, 0),
(9, 27, 16, 1),
(10, 6, 6, 4),
(11, 28, 6, 5),
(12, 14, 6, 6),
(16, 3, 16, 2),
(17, 2, 6, 7),
(18, 23, 16, 3),
(19, 28, 16, 4),
(20, 22, 16, 5),
(21, 17, 6, 8),
(22, 6, 16, 6);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(1, 'Acoustic Breeze', 1, 5, 8, '2:37', 'assets/music/bensound-acousticbreeze.mp3', 1, 25),
(2, 'A new beginning', 1, 5, 1, '2:35', 'assets/music/bensound-anewbeginning.mp3', 2, 37),
(3, 'Better Days', 1, 5, 2, '2:33', 'assets/music/bensound-betterdays.mp3', 3, 15),
(4, 'Buddy', 1, 5, 3, '2:02', 'assets/music/bensound-buddy.mp3', 4, 19),
(5, 'Clear Day', 1, 5, 4, '1:29', 'assets/music/bensound-clearday.mp3', 5, 12),
(6, 'Going Higher', 2, 1, 1, '4:04', 'assets/music/bensound-goinghigher.mp3', 1, 15),
(7, 'Funny Song', 2, 4, 2, '3:07', 'assets/music/bensound-funnysong.mp3', 2, 11),
(8, 'Funky Element', 2, 1, 3, '3:08', 'assets/music/bensound-funkyelement.mp3', 2, 7),
(9, 'Extreme Action', 2, 1, 4, '8:03', 'assets/music/bensound-extremeaction.mp3', 3, 5),
(10, 'Epic', 2, 4, 5, '2:58', 'assets/music/bensound-epic.mp3', 3, 9),
(11, 'Energy', 2, 1, 6, '2:59', 'assets/music/bensound-energy.mp3', 4, 7),
(12, 'Dubstep', 2, 1, 7, '2:03', 'assets/music/bensound-dubstep.mp3', 5, 9),
(13, 'Happiness', 3, 6, 8, '4:21', 'assets/music/bensound-happiness.mp3', 5, 6),
(14, 'Happy Rock', 3, 6, 9, '1:45', 'assets/music/bensound-happyrock.mp3', 4, 14),
(15, 'Jazzy Frenchy', 3, 6, 10, '1:44', 'assets/music/bensound-jazzyfrenchy.mp3', 3, 14),
(16, 'Little Idea', 3, 6, 1, '2:49', 'assets/music/bensound-littleidea.mp3', 2, 15),
(17, 'Memories', 3, 6, 2, '3:50', 'assets/music/bensound-memories.mp3', 1, 18),
(18, 'Moose', 4, 7, 1, '2:43', 'assets/music/bensound-moose.mp3', 5, 10),
(19, 'November', 4, 7, 2, '3:32', 'assets/music/bensound-november.mp3', 4, 6),
(20, 'Of Elias Dream', 4, 7, 3, '4:58', 'assets/music/bensound-ofeliasdream.mp3', 3, 12),
(21, 'Pop Dance', 4, 7, 2, '2:42', 'assets/music/bensound-popdance.mp3', 2, 6),
(22, 'Retro Soul', 4, 7, 5, '3:36', 'assets/music/bensound-retrosoul.mp3', 1, 9),
(23, 'Sad Day', 5, 2, 1, '2:28', 'assets/music/bensound-sadday.mp3', 1, 13),
(24, 'Sci-fi', 5, 2, 2, '4:44', 'assets/music/bensound-scifi.mp3', 2, 7),
(25, 'Slow Motion', 5, 2, 3, '3:26', 'assets/music/bensound-slowmotion.mp3', 3, 12),
(26, 'Sunny', 5, 2, 4, '2:20', 'assets/music/bensound-sunny.mp3', 4, 12),
(27, 'Sweet', 5, 2, 5, '5:07', 'assets/music/bensound-sweet.mp3', 5, 19),
(28, 'Tenderness ', 3, 3, 7, '2:03', 'assets/music/bensound-tenderness.mp3', 4, 16),
(29, 'The Lounge', 3, 3, 8, '4:16', 'assets/music/bensound-thelounge.mp3 ', 3, 7),
(30, 'Ukulele', 3, 3, 9, '2:26', 'assets/music/bensound-ukulele.mp3 ', 2, 15),
(31, 'Tomorrow', 3, 3, 1, '4:54', 'assets/music/bensound-tomorrow.mp3 ', 1, 21);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(1, 'DrilonBraha', 'Drilon', 'Braha', 'Drilib4@hotmail.com', '4297f44b13955235245b2497399d7a93', '2019-12-10 00:00:00', 'assets/images/profile-pics/profiletest.jpg'),
(2, 'Donkey', 'Donkey', 'Kong', 'Donkeykong@yahoo.com', '4297f44b13955235245b2497399d7a93', '2019-12-10 00:00:00', 'assets/images/profile-pics/profiletest.jpg'),
(3, 'DrilonBraha2', 'Tommy', 'Bobsen', 'Drilib2@hotmail.com', '4297f44b13955235245b2497399d7a93', '2019-12-10 00:00:00', 'assets/images/profile-pics/profiletest.jpg'),
(4, 'DrilonBraha3', 'Drili', 'Br', 'Aaskdjad@hotmail.com', '4297f44b13955235245b2497399d7a93', '2019-12-10 00:00:00', 'assets/images/profile-pics/profiletest.jpg'),
(5, 'Barty', 'Bart', 'Simp', 'Dasdasd@hotmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '2019-12-10 00:00:00', 'assets/images/profile-pics/profiletest.jpg'),
(6, 'BartyNew1', 'Asd', 'Asdd', 'Aksdjka@hotmail.com', '4297f44b13955235245b2497399d7a93', '2019-12-10 00:00:00', 'assets/images/profile-pics/profiletest.jpg'),
(7, 'BartNew2', 'Bart', 'New', 'Kasd@hotmail.com', '31b69a7494a0eec4ac544fd648c9d604', '2019-12-10 00:00:00', 'assets/images/profile-pics/profiletest.jpg'),
(8, 'jashasd', 'Aslkdja', 'Asjdk', 'Asasd@hotmail.com', '4297f44b13955235245b2497399d7a93', '2019-12-10 00:00:00', 'assets/images/profile-pics/profiletest.jpg'),
(9, 'asjdlk', 'Lajsldkjkl', 'Askd', 'Kasd2@hotmail.com', '4f3d0989743daf918d6d7d26f6821ecc', '2019-12-10 00:00:00', 'assets/images/profile-pics/profiletest.jpg'),
(28, 'heyheyhey', 'Heyhey', 'Heyeee', '1511@hotmail.com', '68eacb97d86f0c4621fa2b0e17cabd8c', '2019-12-10 00:00:00', 'assets/images/profile-pics/profiletest.jpg');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `playlistsongs`
--
ALTER TABLE `playlistsongs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tilføj AUTO_INCREMENT i tabel `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tilføj AUTO_INCREMENT i tabel `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tilføj AUTO_INCREMENT i tabel `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Tilføj AUTO_INCREMENT i tabel `playlistsongs`
--
ALTER TABLE `playlistsongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tilføj AUTO_INCREMENT i tabel `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
