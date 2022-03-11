-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 03, 2021 at 02:38 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `codflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `favoris`
--

CREATE TABLE `favoris` (
  `id` int(11) NOT NULL,
  `id_media` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favoris`
--

INSERT INTO `favoris` (`id`, `id_media`, `id_user`) VALUES
(1, 1, 2),
(2, 1, 2),
(3, 2, 2),
(4, 1, 2),
(5, 2, 16),
(6, 1, 16),
(7, 2, 19),
(8, 1, 5),
(9, 2, 5),
(10, 1, 5),
(11, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Horreur'),
(3, 'Science-Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `finish_date` datetime DEFAULT NULL,
  `watch_duration` int(11) NOT NULL DEFAULT '0' COMMENT 'in seconds'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `release_date` date NOT NULL,
  `summary` longtext NOT NULL,
  `trailer_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `genre_id`, `title`, `type`, `status`, `release_date`, `summary`, `trailer_url`) VALUES
(1, 3, 'The Walk', 'science', 'active', '2012-09-01', '', 'https://www.youtube.com/embed/4kERfpAQGCs'),
(2, 1, 'NOBODY', 'action', 'actibe', '2021-08-31', '', 'https://www.youtube.com/embed/Fwe355RzMHU'),
(4, 2, 'la casa del pappel', '', '', '2021-09-22', 'la casa del pappel', 'https://www.youtube.com/watch?v=SGMZhdNdxM4'),
(6, 1, 'titanic', '', '', '2021-09-20', 'titanic ', 'https://www.youtube.com/watch?v=SFwckxs2nHc'),
(8, 3, 'harry-potter', '', '', '2020-06-17', 'harry potter l ecole des sorcier', 'https://www.youtube.com/watch?v=8abT7J8Uyxo'),
(10, 2, 'the exchange ', '', '', '2021-05-04', 'angelina jolie', 'https://www.youtube.com/watch?v=osKC3MJ8uKw');

-- --------------------------------------------------------

--
-- Table structure for table `profils`
--

CREATE TABLE `profils` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `avatar` varchar(500) NOT NULL,
  `typ_id` int(11) NOT NULL,
  `dat_cre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profils`
--

INSERT INTO `profils` (`id`, `name`, `email`, `avatar`, `typ_id`, `dat_cre`) VALUES
(1, 'Mr xx', 'mqs@qsq.de', 'http://localhost/codFix/public/img/avatar2.png', 2, '2021-09-02 00:41:33'),
(3, 'admin', '', 'http://localhost/codFix/public/img/avatar.png', 2, '2021-09-02 00:41:33'),
(8, 'franov', 'franfo@df.fr', 'http://localhost/codFix/public/img/avatar.png', 1, '2021-09-03 08:18:53'),
(11, 'ameli', 'amel@eee.fr', 'http://localhost/codFix/public/img/avatar.png', 1, '2021-09-03 08:39:47'),
(13, 'inconnu', 'rabeeb@gmail.com', 'http://localhost/codFix/public/img/avatar.png', 1, '2021-09-03 09:00:15'),
(14, 'inconnu', 'rabab@gmail.com', 'http://localhost/codFix/public/img/avatar.png', 1, '2021-09-03 09:01:13'),
(15, 'rabe', 'rabab@gml.com', 'http://localhost/codFix/public/img/avatar.png', 1, '2021-09-03 09:02:03'),
(16, 'rabe', 'radbab@gml.com', 'http://localhost/codFix/public/img/avatar.png', 1, '2021-09-03 09:02:03'),
(17, 'de', 'de@dfd.fr', 'http://localhost/codFix/public/img/avatar.png', 1, '2021-09-03 11:35:53'),
(18, 'inconnu', 'rabab22@gmail.com', 'http://localhost/codFix/public/img/avatar.png', 1, '2021-09-03 12:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `reaction`
--

CREATE TABLE `reaction` (
  `id` int(11) NOT NULL,
  `id_media` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `react` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reaction`
--

INSERT INTO `reaction` (`id`, `id_media`, `id_user`, `react`) VALUES
(1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'administrateur'),
(2, 'normal'),
(3, 'enfant');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` blob NOT NULL,
  `active` int(11) NOT NULL,
  `activation_key` varchar(250) NOT NULL,
  `dat_cre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `active`, `activation_key`, `dat_cre`) VALUES
(1, 'coding@factory.fr', 0x313233343536, 1, '', '2021-09-03 08:51:24'),
(2, 'rabeb@gmail.com', 0x62633036386133336461363536366333303565663830663262373235363938396133386338313633653766633064303538363634323963333961366630363931, 0, '', '2021-09-03 08:51:24'),
(3, 'sq@qsq.de', 0x30363836316239663865613362613638393335353432366538363839353466356132653633373735313539356333316239386638643036643565373134616337, 0, '', '2021-09-03 08:51:24'),
(4, 'test@gmail.fr', 0x62633036386133336461363536366333303565663830663262373235363938396133386338313633653766633064303538363634323963333961366630363931, 0, '', '2021-09-03 08:51:24'),
(5, 'test@factory.fr', 0x62633036386133336461363536366333303565663830663262373235363938396133386338313633653766633064303538363634323963333961366630363931, 0, '', '2021-09-03 08:51:24'),
(19, 'rabab22@gmail.com', 0x62633036386133336461363536366333303565663830663262373235363938396133386338313633653766633064303538363634323963333961366630363931, 0, '698c88eb19757cd9939054059f0fc5d7', '2021-09-03 12:34:15'),
(9, 'error_msg@df.fr', 0x36353963363263633736303938656335353463626361633230333061636635373930383864386365306537303334633464613037376336343537396162363565, 0, '', '2021-09-03 08:51:24'),
(12, 'amel@eee.fr', 0x62633036386133336461363536366333303565663830663262373235363938396133386338313633653766633064303538363634323963333961366630363931, 0, '', '2021-09-03 08:51:24'),
(13, 'ama@aaa.fr', 0x62633036386133336461363536366333303565663830663262373235363938396133386338313633653766633064303538363634323963333961366630363931, 0, '', '2021-09-03 08:51:24'),
(18, 'de@dfd.fr', 0x62633036386133336461363536366333303565663830663262373235363938396133386338313633653766633064303538363634323963333961366630363931, 0, '32ce47fcbe6ce469aaf02f0e4e9c10b6', '2021-09-03 11:35:53'),
(15, 'rabeeb@gmail.com', 0x62633036386133336461363536366333303565663830663262373235363938396133386338313633653766633064303538363634323963333961366630363931, 0, '6499348bfe3db890ef179e5f33f7ef2d', '2021-09-03 09:00:15'),
(16, 'radbab@gml.com', 0x62633036386133336461363536366333303565663830663262373235363938396133386338313633653766633064303538363634323963333961366630363931, 0, 'd9af3dd9244fe4d8cd74690a040578db', '2021-09-03 09:01:13'),
(17, 'rabab@gml.com', 0x62633036386133336461363536366333303565663830663262373235363938396133386338313633653766633064303538363634323963333961366630363931, 0, '000674cfeb1567037fb7f6224feade4e', '2021-09-03 09:02:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_user_id_fk_media_id` (`user_id`),
  ADD KEY `history_media_id_fk_media_id` (`media_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_genre_id_fk_genre_id` (`genre_id`) USING BTREE;

--
-- Indexes for table `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reaction`
--
ALTER TABLE `reaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profils`
--
ALTER TABLE `profils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reaction`
--
ALTER TABLE `reaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_media_id_fk_media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_user_id_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `profils` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_genre_id_b1257088_fk_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);