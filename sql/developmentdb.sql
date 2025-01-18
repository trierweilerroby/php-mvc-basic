-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Erstellungszeit: 07. Apr 2024 um 18:27
-- Server-Version: 10.10.2-MariaDB-1:10.10.2+maria~ubu2204
-- PHP-Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `developmentdb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `author` int(255) NOT NULL,
  `posted_at` datetime NOT NULL,
  `salary` int(20) NOT NULL,
  `article_type` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `author`, `posted_at`, `salary`, `article_type`) VALUES
(3, 'Full stack developer', 'As a full stack developer, you\'ll handle both front-end and back-end aspects of web apps. Responsibilities include coding, UI design, API integration, and ensuring software functionality and performance.', 14, '2023-01-18 18:48:25', 100000, 0),
(4, 'Manager', 'As manager, you\'ll oversee a team, ensuring project success. Responsibilities include setting objectives, guiding and supporting team members, fostering collaboration, and aligning results with strategic goals.', 14, '2023-01-18 19:51:09', 200000, 0),
(9, 'UX designer', 'A UX designer crafts intuitive digital experiences by researching user needs, creating wireframes and prototypes, and collaborating with teams to optimize usability and satisfaction.', 17, '2023-04-09 13:26:19', 155000, 1),
(10, 'Data Scientist', 'As a data scientist, you\'ll analyze complex datasets, extract insights, and develop predictive models to inform business decisions. You\'ll employ statistical methods, machine learning algorithms, and programming skills to solve real-world problems', 17, '2023-04-09 13:26:28', 70000, 0),
(16, 'Backend devloper', 'As a backend developer, your role involves building and maintaining the server-side logic of web applications, databases, and APIs. You\'ll work closely with frontend developers, ensuring smooth integration and robust functionality of the application\'s core components.', 17, '2024-01-18 19:43:24', 10000000, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `jobTypes`
--

CREATE TABLE `jobTypes` (
  `id` int(11) NOT NULL,
  `job_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `jobTypes`
--

INSERT INTO `jobTypes` (`id`, `job_type`) VALUES
(0, 'Show All'),
(1, 'UX/UI Designer');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reply`
--

CREATE TABLE `reply` (
  `id` int(255) NOT NULL,
  `content` varchar(500) NOT NULL,
  `reply_from` int(255) NOT NULL,
  `reply_to` int(255) NOT NULL,
  `posted_at` date NOT NULL,
  `article_id` int(200) NOT NULL,
  `accept` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `reply`
--

INSERT INTO `reply` (`id`, `content`, `reply_from`, `reply_to`, `posted_at`, `article_id`, `accept`) VALUES
(4, 'Hello, I am interested in your job as a UX/UI designer', 13, 14, '2023-04-04', 3, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `firstname` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type_id` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `job_type` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `type_id`, `password`, `job_type`) VALUES
(13, 'First', 'user', 'user@email.com', 3, '$2y$10$K35dStJXkHYyfXAJ/uRbAuG//8C3MF5ckeexkBu1nL90ASWYKnYJ6', 0),
(14, 'First', 'Employer', 'Employer@email.com', 2, '$2y$10$.lsZkHvTQA34yrxs.SFf/.Apd4GYHW4LyWjejXHI83j94UsEAGJ8.', 0),
(15, 'Admin', 'Admin', 'Admin@email.com', 1, '$2y$10$aLhRmpsJHGrl1yzq0bg3SeZCi/avfoVpKQCd8pmjihq8weIRvNnHu', 0),
(17, 'Second', 'Employer', 'Employer2@email.com', 2, '$2y$10$FbgEFz0kv7Ht5X2gJTqY0eXn9pPJEf1RLQWAQvp4aWQdT82SguJye', 0),
(18, 'Second', 'User', 'user2@email.com', 3, '$2y$10$hjvKRYLBE42XXZIGGFQQFO.FVW02.7pXTHCaERKaZNxTbhLbC0fwW', 0),
(35, 'Ux', 'Designer', 'UX@mail.com', 2, '$2y$10$3XzMi0yEGxqo8H314adZ5OZ9Nia/W/yYDkJ2opf.rgqF5S5SacOda', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `usertype`
--

CREATE TABLE `usertype` (
  `type_id` int(10) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `usertype`
--

INSERT INTO `usertype` (`type_id`, `user_type`) VALUES
(1, 'Admin'),
(2, 'Employer'),
(3, 'User');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author`),
  ADD KEY `article_type_fk` (`article_type`);

--
-- Indizes für die Tabelle `jobTypes`
--
ALTER TABLE `jobTypes`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reply_from` (`reply_from`),
  ADD KEY `reply_to` (`reply_to`),
  ADD KEY `article_id` (`article_id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `job_type` (`job_type`);

--
-- Indizes für die Tabelle `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `jobTypes`
--
ALTER TABLE `jobTypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `article_type_fk` FOREIGN KEY (`article_type`) REFERENCES `user` (`job_type`);

--
-- Constraints der Tabelle `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`reply_from`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`reply_to`) REFERENCES `user` (`id`);

--
-- Constraints der Tabelle `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `usertype` (`type_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`job_type`) REFERENCES `jobTypes` (`id`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`job_type`) REFERENCES `jobTypes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
