-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2022 at 07:31 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sae202`
--

-- --------------------------------------------------------

--
-- Table structure for table `hash`
--

CREATE TABLE `hash` (
  `hashId` int(99) NOT NULL,
  `hashKey` varchar(99) NOT NULL,
  `hashIndice` varchar(99) NOT NULL,
  `hashHint` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hash`
--

INSERT INTO `hash` (`hashId`, `hashKey`, `hashIndice`, `hashHint`) VALUES
(119, 'iPXoF8', 'a', 'lefilrouge'),
(120, 'ar3obK', 'b', 'lefilbleu'),
(121, '4Fohx1', 'c', 'lefiljaune'),
(122, 'tCfA==', 'd', 'lefilorange');

-- --------------------------------------------------------

--
-- Table structure for table `hashAccess`
--

CREATE TABLE `hashAccess` (
  `hashAccessId` int(11) NOT NULL,
  `teamCode` int(99) NOT NULL,
  `teamNom` varchar(999) NOT NULL,
  `hashId` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hashAccess`
--

INSERT INTO `hashAccess` (`hashAccessId`, `teamCode`, `teamNom`, `hashId`) VALUES
(1, 5893, 'xdcftvgybhuj', 1),
(2, 5893, 'xdcftvgybhuj', 2),
(3, 5893, 'xdcftvgybhuj', 3),
(4, 5893, 'xdcftvgybhuj', 4),
(5, 5893, 'xdcftvgybhuj', 6),
(6, 5893, 'xdcftvgybhuj', 7),
(7, 5893, 'xdcftvgybhuj', 8),
(9, 3672, 'ghbeufgzbfzf', 1),
(10, 3672, 'ghbeufgzbfzf', 2),
(11, 3672, 'ghbeufgzbfzf', 3),
(12, 3672, 'ghbeufgzbfzf', 5),
(13, 3672, 'ghbeufgzbfzf', 7),
(14, 3672, 'ghbeufgzbfzf', 6),
(15, 3672, 'ghbeufgzbfzf', 8),
(16, 4557, 'lala', 1),
(17, 4557, 'lala', 7),
(18, 1649, 'fzfzf', 1),
(19, 9759, 'lateam', 2),
(20, 9759, 'lateam', 3),
(21, 9759, 'lateam', 5),
(22, 9759, 'lateam', 7),
(23, 9759, 'lateam', 1),
(24, 9759, 'lateam', 6),
(25, 9759, 'lateam', 115),
(26, 9759, 'lateam', 116),
(27, 9759, 'lateam', 118),
(28, 9759, 'lateam', 117),
(29, 1095, 'eaeda', 115),
(30, 1095, 'eaeda', 116),
(31, 1095, 'eaeda', 117),
(32, 1095, 'eaeda', 118),
(33, 1095, 'eaeda', 119),
(34, 1095, 'eaeda', 120),
(35, 1095, 'eaeda', 121),
(36, 1095, 'eaeda', 122),
(37, 9759, 'lateam', 119),
(38, 9759, 'lateam', 121),
(39, 9759, 'lateam', 120),
(40, 9759, 'lateam', 122);

-- --------------------------------------------------------

--
-- Table structure for table `suspect`
--

CREATE TABLE `suspect` (
  `suspectId` int(11) NOT NULL,
  `suspectNom` varchar(11) NOT NULL,
  `suspectHash` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suspect`
--

INSERT INTO `suspect` (`suspectId`, `suspectNom`, `suspectHash`) VALUES
(1, 'alo', 'alo');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `teamId` int(9) NOT NULL,
  `teamNom` varchar(99) NOT NULL,
  `teamLvl` int(9) NOT NULL,
  `teamNbPlayers` int(9) NOT NULL,
  `teamCode` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`teamId`, `teamNom`, `teamLvl`, `teamNbPlayers`, `teamCode`) VALUES
(34, 'lala', 0, 1, '4557'),
(35, 'po', 0, 5, '7048'),
(36, 'ghbeufgzbfzf', 0, 1, '3672'),
(37, '42', 0, 1, '7485'),
(38, 'test', 0, 1, '1590'),
(39, 'fzfzf', 0, 1, '1649'),
(40, 'lateam', 0, 1, '9759'),
(41, 'eaeda', 0, 1, '1095');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `timeId` int(11) NOT NULL,
  `timeTeamId` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`timeId`, `timeTeamId`, `time`) VALUES
(2, 9759, '16:49:59'),
(3, 9759, '18:18:53'),
(4, 9759, '18:19:03'),
(5, 9759, '18:19:11'),
(6, 9759, '18:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `uploadId` int(11) NOT NULL,
  `uploadNom` varchar(99) NOT NULL,
  `uploadTeamCode` int(99) NOT NULL,
  `uploadImg` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`uploadId`, `uploadNom`, `uploadTeamCode`, `uploadImg`) VALUES
(3, 'groupPic', 7048, '/profil/img/2022_06_11_20_02_22---6fa8d995d2abe0c09615e8046faf2025.png'),
(4, 'groupPic', 7048, '/profil/img/2022_06_11_20_02_44---6fa8d995d2abe0c09615e8046faf2025.png'),
(6, 'groupPic', 3672, '/profil/img/2022_06_12_18_10_55---6fa8d995d2abe0c09615e8046faf2025.png'),
(7, 'groupPic', 3672, 'profil/img/2022_06_12_18_13_08---6fa8d995d2abe0c09615e8046faf2025.png'),
(8, 'groupPic', 3672, '2022_06_12_18_16_05---6fa8d995d2abe0c09615e8046faf2025.png'),
(9, 'groupPic', 3672, '2022_06_12_18_16_38---6fa8d995d2abe0c09615e8046faf2025.png'),
(10, 'groupPic', 4557, '2022_06_12_20_32_00---6fa8d995d2abe0c09615e8046faf2025.png'),
(11, 'groupPic', 1649, '2022_06_12_20_37_31---6fa8d995d2abe0c09615e8046faf2025.png'),
(12, 'groupPic', 9759, '2022_06_13_21_52_46---6fa8d995d2abe0c09615e8046faf2025.png'),
(13, 'groupPic', 1095, '2022_06_14_11_40_21---6fa8d995d2abe0c09615e8046faf2025.png'),
(14, 'groupPic', 1095, '2022_06_14_11_42_06---6fa8d995d2abe0c09615e8046faf2025.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(9) NOT NULL,
  `userPrenom` varchar(99) NOT NULL,
  `userNom` varchar(99) NOT NULL,
  `userTeamId` int(11) NOT NULL,
  `userPassword` varchar(99) NOT NULL,
  `userMail` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userPrenom`, `userNom`, `userTeamId`, `userPassword`, `userMail`) VALUES
(36, 'admin', 'admin', 31, '$2y$10$oIWFLT/dp0Jkl9nyiCQD4uISQJLvRNgRCzfx/MRa7pjMppK77XHBW', ''),
(37, 'alo', 'alo', 34, '$2y$10$mVBIV0GmNfNmqNkbqs8YQ.Le4k9U/BbPc2EQwTo5q6QW58zVBXDe2', ''),
(38, 'tro', 'tro', 33, '$2y$10$OfxN5tlOwrnmGydfveiXfORDTS0fEiWsnQyo6m3gb9HD7nMmecbcO', ''),
(39, 'pa', 'pa', 35, '$2y$10$xJGKDWKKFw2i9Dk3DMdil.Tf.edY5G7I5iQxE.skGY82Cs5Cnmcki', ''),
(41, 'al', 'al', 35, '$2y$10$py3XGpslymiHuQc51LD7f.lHntZ7jf6WhdNbNKORM2rkip3JULmMG', ''),
(42, 'po', 'po', 34, '$2y$10$G16HNpo4IWOxyQgxNEaYD.Sn6yS6X8k0KQ6zmcnkMl5DsA1ARitn6', ''),
(43, 'test', 'test', 35, '$2y$10$mdHgcePtdB1crdKfKPqf2eWIgbyJvjdxAAyMy0ZrSWFNclbXzJkLG', ''),
(44, 'aaaaa', 'aaaa', 38, '$2y$10$JpxyzPp6qGHyfI8DHGbYQ.5WORU8dlzQ634T68gDiCoa64f8fNbZW', ''),
(45, 'fizbf', 'gjieb', 0, '$2y$10$nORRtIfKkAjv7UHcE0f55ej0KdPbRXqFLm3S5ATzWKA902lr6p8g2', ''),
(46, 'alo', 'alo', 0, '$2y$10$a6wIFij4HtYmVunsVX9kwuQkkuweSOCAFUr0Bn7DQDymIBCO/vZSO', ''),
(47, 'zjnfin', 'nfiunf', 39, '$2y$10$eQ5mqIMQO5VW1CjKjLqyseRMLlrHZNP4/bT6ARY8gRvcNbn85.DuC', ''),
(49, 'test', 'test', 0, '$2y$10$CXd53YI5ZeRZdCaacdDgXuOnOElokfCf6xD0RUesy7aNY44ntH5jq', 'test@mail.com'),
(50, 'a', 'a', 41, '$2y$10$q6QUiTmR9LGEM6In7.4rVu6iDjuzML/lF/kqo9asOLinlyyMHOKEW', 'test@mail.com'),
(51, 'a', 'a', 0, '$2y$10$az3UoXsyUbNdeulV64f/QOc7SjeRIQm8OqHjvjlDjo1g4.oZcgkHe', 'test@mail.com'),
(52, 'a', 'a', 0, '$2y$10$vQ33f5WX.x7rR.pZz/z.5.lO.FzOb3poCe2rpjbAmp5EejUvCJplG', 'a@a.com'),
(53, 'a', 'a', 0, '$2y$10$Wn26VWM8OgHhuWL6bcg.A.Y7m7tcjNU0GxQOvEaWJ44MOeJ/je0q2', 'a@majgeng.com'),
(54, 'a', 'a', 0, '$2y$10$FDfz8yolKUdwbNM52/X1QOxiGQDn6rqZ3A5DNfb3/RHtFrh4KOJlW', 'a@hbuijoklnj.com'),
(55, 'a', 'a', 0, '$2y$10$Tck6cPWdhlUgacgjerFbTOR6xb4sCccwAb0tna8cUE5yR9J2Hy1em', 'a@mail.com'),
(56, 'admin', 'admin', 40, '$2y$10$sH97VRVpEM9Q.ocLlvXRN.HjE3TpeF9GrnF/tI3XiqjZEtzT3Rmf.', 'admin@admin.com'),
(57, 'a', 'a', 0, '$2y$10$Xba3s2/cHnUrxgoqwVzFi./nmBqXV50.0hAPX5v/sB95hyyXlMOUy', 'a@zefjzfn.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hash`
--
ALTER TABLE `hash`
  ADD PRIMARY KEY (`hashId`);

--
-- Indexes for table `hashAccess`
--
ALTER TABLE `hashAccess`
  ADD PRIMARY KEY (`hashAccessId`);

--
-- Indexes for table `suspect`
--
ALTER TABLE `suspect`
  ADD PRIMARY KEY (`suspectId`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`teamId`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`timeId`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`uploadId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hash`
--
ALTER TABLE `hash`
  MODIFY `hashId` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `hashAccess`
--
ALTER TABLE `hashAccess`
  MODIFY `hashAccessId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `suspect`
--
ALTER TABLE `suspect`
  MODIFY `suspectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `teamId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `timeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `uploadId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
