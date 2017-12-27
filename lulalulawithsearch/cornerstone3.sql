-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2017 at 02:59 PM
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
('9090', '9090', '9090', '9090', '9090'),
('Angel', 'Guardian', 'Angel', '9784596587', 'guardianangel'),
('ggna', 'Father', 'Over', '9356902297', '123'),
('Print', 'Print', 'Print', '9476965516', 'Screen'),
('sigeghanash', 'Father', 'Hanash', '9106169995', '123'),
('tellme', 'Father', 'Lostrid', '9653145257', '123'),
('verver', 'Verna', 'Ver', '3956352495', '123');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_num` varchar(12) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `misc_pay` decimal(11,2) NOT NULL,
  `tuition_pay` decimal(11,2) NOT NULL,
  `entrance_pay` decimal(11,2) NOT NULL,
  `total_pay` decimal(11,2) NOT NULL,
  `due` decimal(11,2) NOT NULL,
  `cashier` varchar(30) NOT NULL,
  `LRN` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_num`, `date`, `misc_pay`, `tuition_pay`, `entrance_pay`, `total_pay`, `due`, `cashier`, `LRN`) VALUES
('RS-30204020', '2017-12-19 11:31:47', '1000.00', '500.00', '1000.00', '2500.00', '7100.00', 'cashier', '20170001');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `levelID` int(11) NOT NULL,
  `levelName` varchar(20) NOT NULL,
  `TuitionFee` decimal(11,2) NOT NULL,
  `Misc` decimal(11,2) NOT NULL,
  `Entrance` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`levelID`, `levelName`, `TuitionFee`, `Misc`, `Entrance`) VALUES
(1, 'Grade 1', '1200.00', '6000.00', '2500.00'),
(2, 'Grade 2', '1200.00', '6000.00', '2500.00'),
(3, 'Grade 3', '1200.00', '6000.00', '2500.00'),
(11, 'Kinder 1', '1100.00', '6000.00', '2500.00'),
(22, 'Kinder 2', '1100.00', '6000.00', '2500.00');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `LRN` varchar(12) NOT NULL,
  `syid` varchar(20) NOT NULL,
  `levelID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`LRN`, `syid`, `levelID`) VALUES
('9090 ', '17-18', 11),
('9090', '18-19', 11),
('9090', '18-19', 11),
('9090', '18-19', 11);

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
  `guardianID` varchar(11) NOT NULL,
  `editable` enum('yes','no') NOT NULL DEFAULT 'yes',
  `syid` varchar(20) NOT NULL DEFAULT '17-18'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`LRN`, `fName`, `lName`, `levelID`, `age`, `mtongue`, `ipGroup`, `birthday`, `address`, `mother`, `father`, `guardianID`, `editable`, `syid`) VALUES
('111111111117', 'Chin', 'Lu', 3, 21, 'Chinese', 'Ducks', '2004-12-31', 'China', 'ChinaLu', 'PhilLu', 'Angel', 'yes', '17-18'),
('111111115848', 'Sid', 'Belleza', 2, 12, 'Bisaya', 'Bisaya', '2017-12-06', 'Samal', 'Samal', 'Samal', 'Print', 'yes', '17-18'),
('20170001', 'Nadine', 'Lostrid', 11, 4, 'Bisaya', 'Matigsalug', '2012-06-20', 'Davao City', 'Father Lostrid', 'Mother Lostrid', 'tellme', 'yes', '17-18'),
('20170002', 'Jaye', 'Hanash', 22, 5, 'Bisaya', 'Aeta', '2011-08-24', 'Davao City', 'Father Hanash', 'Mother Hanash', 'sigeghanash', 'yes', '17-18'),
('201700033', 'Game', 'Over', 1, 6, 'Bisaya', 'Ingles', '2010-10-26', 'Davao', 'Mother Over', 'Father Over', 'ggna', 'yes', '17-18'),
('9090', '9090', '9090', 11, 90, '9090', '9090', '0099-09-09', '9090', '9090', '9090', '9090', 'no', '18-19');

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
-- Table structure for table `sy`
--

CREATE TABLE `sy` (
  `syid` varchar(20) NOT NULL,
  `syname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sy`
--

INSERT INTO `sy` (`syid`, `syname`) VALUES
('16-17', 'SY 2016-2017'),
('17-18', 'SY 2017-2018'),
('18-19', 'SY 2018-2019'),
('19-20', 'SY 2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `s_account`
--

CREATE TABLE `s_account` (
  `Acc_num` int(11) NOT NULL,
  `LRN` varchar(12) NOT NULL,
  `misc_Balance` decimal(11,2) NOT NULL,
  `tuition_Balance` decimal(11,2) NOT NULL,
  `entrance_Balance` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_account`
--

INSERT INTO `s_account` (`Acc_num`, `LRN`, `misc_Balance`, `tuition_Balance`, `entrance_Balance`, `total`) VALUES
(7, '20170001', '4000.00', '100.00', '500.00', '4600.00'),
(8, '20170002', '6000.00', '1100.00', '2500.00', '9600.00'),
(9, '201700033', '6000.00', '1200.00', '2500.00', '9700.00'),
(10, '111111115848', '6000.00', '1200.00', '2500.00', '9700.00'),
(11, '111111111117', '6000.00', '1200.00', '2500.00', '9700.00'),
(16, '9090', '6000.00', '1100.00', '2500.00', '9600.00');

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
(46, 'admin', 'admin', 'admin', 'admin', 'admin'),
(47, 'reg', 'reg', 'reg', 'reg', 'registrar'),
(48, 'cashier', 'cashier', 'cashier', 'cashier', 'cashier'),
(49, 'gbhyt', 'gbt', 'dasd', 'dasda', 'guardian'),
(50, 'tellme', '123', 'Father', 'Lostrid', 'guardian'),
(51, 'sigeghanash', '123', 'Father', 'Hanash', 'guardian'),
(52, 'ggna', '123', 'Father', 'Over', 'guardian'),
(53, 'Print', 'Screen', 'Print', 'Print', 'guardian'),
(54, 'Angel', 'guardianangel', 'Guardian', 'Angel', 'guardian'),
(63, '9090', '9090', '9090', '9090', 'guardian');

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
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_num`),
  ADD KEY `studFK` (`LRN`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`levelID`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD KEY `fklrn` (`LRN`),
  ADD KEY `syidfk` (`syid`),
  ADD KEY `levelIDfk` (`levelID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`LRN`),
  ADD KEY `lfk` (`levelID`),
  ADD KEY `guardianfk` (`guardianID`),
  ADD KEY `syfk` (`syid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectID`),
  ADD KEY `fklvl` (`levelID`);

--
-- Indexes for table `sy`
--
ALTER TABLE `sy`
  ADD PRIMARY KEY (`syid`);

--
-- Indexes for table `s_account`
--
ALTER TABLE `s_account`
  ADD PRIMARY KEY (`Acc_num`),
  ADD KEY `fkaccount` (`LRN`);

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
-- AUTO_INCREMENT for table `s_account`
--
ALTER TABLE `s_account`
  MODIFY `Acc_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
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
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `studFK` FOREIGN KEY (`LRN`) REFERENCES `student` (`LRN`);

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `fklrn` FOREIGN KEY (`LRN`) REFERENCES `student` (`LRN`) ON UPDATE CASCADE,
  ADD CONSTRAINT `levelIDfk` FOREIGN KEY (`levelID`) REFERENCES `level` (`levelID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `syidfk` FOREIGN KEY (`syid`) REFERENCES `sy` (`syid`) ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `lfk` FOREIGN KEY (`levelID`) REFERENCES `level` (`levelID`),
  ADD CONSTRAINT `syfk` FOREIGN KEY (`syid`) REFERENCES `sy` (`syid`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `fklvl` FOREIGN KEY (`levelID`) REFERENCES `level` (`levelID`);

--
-- Constraints for table `s_account`
--
ALTER TABLE `s_account`
  ADD CONSTRAINT `fkaccount` FOREIGN KEY (`LRN`) REFERENCES `student` (`LRN`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
