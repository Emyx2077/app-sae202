-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2022 at 07:56 PM
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
  `hashRoomCode` varchar(99) NOT NULL,
  `hashHint` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hash`
--

INSERT INTO `hash` (`hashId`, `hashKey`, `hashRoomCode`, `hashHint`) VALUES
(127, 'gvFpaYnl3PqWC', '17', 'anatidae'),
(128, 'Bj1ddteRfpci0', '201', 'belisama'),
(129, 'dWEj9aBLyygUc', '205', 'linustorvald'),
(130, 'erarBICtEkvVO', '9', 'macintoshplus'),
(131, 'UhxhmxrArvqR', '7', 'nuggies');

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

-- --------------------------------------------------------

--
-- Table structure for table `inprogress`
--

CREATE TABLE `inprogress` (
  `inprogressId` int(11) NOT NULL,
  `inprogressRoomCode` int(11) NOT NULL,
  `inprogressTeamCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomId` int(11) NOT NULL,
  `roomCode` int(11) NOT NULL,
  `roomMaxTeam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomId`, `roomCode`, `roomMaxTeam`) VALUES
(1, 17, 6),
(2, 9, 5),
(3, 205, 5),
(4, 201, 5),
(5, 7, 5),
(6, 18, 4);

-- --------------------------------------------------------

--
-- Table structure for table `suspect`
--

CREATE TABLE `suspect` (
  `suspectId` int(11) NOT NULL,
  `suspectNom` varchar(99) NOT NULL,
  `suspectHash` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suspect`
--

INSERT INTO `suspect` (`suspectId`, `suspectNom`, `suspectHash`) VALUES
(1, 'alexandre garcia', '1234');

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

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `timeId` int(11) NOT NULL,
  `timeTeamId` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `inprogress`
--
ALTER TABLE `inprogress`
  ADD PRIMARY KEY (`inprogressId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomId`);

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
  MODIFY `hashId` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `hashAccess`
--
ALTER TABLE `hashAccess`
  MODIFY `hashAccessId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `inprogress`
--
ALTER TABLE `inprogress`
  MODIFY `inprogressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suspect`
--
ALTER TABLE `suspect`
  MODIFY `suspectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `teamId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `timeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `uploadId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
