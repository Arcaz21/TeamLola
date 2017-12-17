-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2017 at 11:41 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cornerstone3`
--

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `gradeID` int(11) NOT NULL,
  `subjectID` varchar(20) NOT NULL,
  `levelID` int(11) NOT NULL,
  `LRN` int(11) NOT NULL,
  `grade` decimal(10,0) NOT NULL,
  `TimeAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `guardianID` varchar(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`guardianID`, `fName`, `lName`, `contact`, `password`) VALUES
('00', '00', '00', '00', '00'),
('12', '12', '12', '12121212121', '12'),
('12a', '89', '89', '8989', ''),
('89', '89', '89', '8989', '89'),
('aasd', 'asd', 'asd', '123', 'asd'),
('asd', 'AS', 'ASD', '2323', 'ASD'),
('gjay', 'papajay', 'pap', '13232323233', ''),
('gkaren', 'papakaren', 'dadakaren', '09393939399', ''),
('gtest', 'gr', 'test', '222', 'gtest'),
('khv', 'kjg', 'kjg', '987', 'asd'),
('misaki', 'misaki', 'ikasim', '7678392399', '');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `levelID` int(11) NOT NULL,
  `levelName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`levelID`, `levelName`) VALUES
(1, 'Grade 1'),
(2, 'Grade 2'),
(3, 'Grade 3'),
(11, 'Kinder 1'),
(22, 'Kinder 2');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `LRN` varchar(12) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `lName` varchar(20) NOT NULL,
  `levelID` int(11) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `mtongue` varchar(50) NOT NULL,
  `ipGroup` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `address` text NOT NULL,
  `mother` varchar(50) NOT NULL,
  `father` varchar(50) NOT NULL,
  `guardianID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`LRN`, `fName`, `lName`, `levelID`, `age`, `mtongue`, `ipGroup`, `birthday`, `address`, `mother`, `father`, `guardianID`) VALUES
('0', 'test', 'test', 22, 2134, 'test', 'test', '0023-04-22', 'asd', 'asd', 'asd', 'aasd'),
('00', '00', '00', 11, 0, '00', '00', '0008-08-08', '00', '00', '00', '00'),
('1111111110', 'Ana', 'Karen', 11, 4, 'Bisaya', 'Apo', '2004-12-12', 'davao city', 'anana karen', 'dadada karen', 'gkaren'),
('1111111111', 'Jessie', 'jay', 11, 4, 'bicol', 'bicol', '2005-09-09', 'bicolandia', 'jeje', 'jojo', 'gjay'),
('1111111112', 'Jericho', 'Layug', 11, 5, 'French', 'Francias', '2004-08-08', 'France', 'Marie Pascal', 'Egueio Layug', 'misaki'),
('121212121212', '121', '121', 1, 12, '12', '12', '0012-01-12', '12', '12', '12', '12'),
('89', '89', '89', 11, 89, '89', '89', '0008-09-08', '89', '98', '89', '89'),
('8912', '89', '89', 11, 89, '89', '89', '0008-09-08', '89', '98', '89', '12a');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectID` varchar(20) NOT NULL,
  `subjectName` varchar(20) NOT NULL,
  `levelID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `subjectName`, `levelID`) VALUES
('g1ap', 'Araling Panlipunan', 1),
('g1eng', 'English', 1),
('g1epp', 'EPP', 1),
('g1fil', 'Filipino', 1),
('g1math', 'Mathematics', 1),
('g1msep', 'MSEP', 1),
('g1mtbl', 'Mother Tounge', 1),
('g1sci', 'Science', 1),
('g1valed', 'Values Education', 1),
('g2ap', 'Araling Panlipunan', 2),
('g2eng', 'English', 2),
('g2epp', 'EPP', 2),
('g2fil', 'Filipino', 2),
('g2math', 'Mathematics', 2),
('g2msep', 'MSEP', 2),
('g2mtbl', 'Mother Tongue', 2),
('g2sci', 'Science', 2),
('g2valed', 'Values Education', 2),
('g3ap', 'Araling Panlipunan', 3),
('g3eng', 'English', 3),
('g3epp', 'EPP', 3),
('g3fil', 'Filipino', 3),
('g3math', 'Mathematics', 3),
('g3msep', 'MSEP', 3),
('g3mtbl', 'Mother Tongue', 3),
('g3sci', 'Science', 3),
('g3valed', 'Values Education', 3),
('k1eng', 'English', 11),
('k1fil', 'Filipino', 11),
('k1mapeh', 'MAPEH', 11),
('k1math', 'Mathematics', 11),
('k1sci', 'Science', 11),
('k1valed', 'Values Education', 11),
('k2eng', 'English', 22),
('k2fil', 'Filipino', 22),
('k2mapeh', 'MAPEH', 22),
('k2math', 'Mathematics', 22),
('k2sci', 'Science', 22),
('k2valed', 'Values Education', 22);

-- --------------------------------------------------------

--
-- Table structure for table `try`
--

CREATE TABLE `try` (
  `guardianID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `role` enum('admin','registrar','cashier','guardian') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fname`, `lname`, `role`) VALUES
(9, 'admin', 'admin', 'admin', 'admin', 'admin'),
(12, 'cashier', 'cashier', 'cashier', 'cashier', 'cashier'),
(13, 'reg', 'reg', 'reg', 'reg', 'registrar'),
(14, 'reg', 'registrar', 'Nancy', 'Mozo', 'registrar'),
(15, 'mam', 'mam', 'Nancy', 'Mozo', 'registrar'),
(16, 'sasa', 'sasa', 'sasa', 'koko', 'registrar'),
(17, 'huhu', 'sasa', 'huhu', 'sasa', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`gradeID`),
  ADD KEY `fksub` (`subjectID`),
  ADD KEY `fkl` (`levelID`),
  ADD KEY `fkstud` (`LRN`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`guardianID`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`levelID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`LRN`),
  ADD KEY `lfk` (`levelID`),
  ADD KEY `guardianfk` (`guardianID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectID`),
  ADD KEY `fklvl` (`levelID`);

--
-- Indexes for table `try`
--
ALTER TABLE `try`
  ADD KEY `gfk` (`guardianID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `gradeID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `fkl` FOREIGN KEY (`levelID`) REFERENCES `level` (`levelID`),
  ADD CONSTRAINT `fksub` FOREIGN KEY (`subjectID`) REFERENCES `subject` (`subjectID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `guardianfk` FOREIGN KEY (`guardianID`) REFERENCES `guardian` (`guardianID`),
  ADD CONSTRAINT `lfk` FOREIGN KEY (`levelID`) REFERENCES `level` (`levelID`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `fklvl` FOREIGN KEY (`levelID`) REFERENCES `level` (`levelID`);

--
-- Constraints for table `try`
--
ALTER TABLE `try`
  ADD CONSTRAINT `gfk` FOREIGN KEY (`guardianID`) REFERENCES `guardian` (`guardianID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
