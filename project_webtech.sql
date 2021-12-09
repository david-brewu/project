-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2021 at 12:29 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_webtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `member_ID` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `contract_status` varchar(50) NOT NULL,
  `date_signed` date NOT NULL,
  `contract_exp_date` date NOT NULL,
  `salary` varchar(50) NOT NULL,
  `isArchive` varchar(10) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`member_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_ID`, `first_name`, `last_name`, `dob`, `country`, `contract_status`, `date_signed`, `contract_exp_date`, `salary`, `isArchive`, `image`) VALUES
(1, 'Akwasi', 'Paul', '1997-01-29', 'Denmark', 'Active', '2018-02-15', '2022-10-07', '3500', 'Yes', './../images/Akwasi_Paul.png'),
(2, 'Isaac', 'Kumson', '1996-06-02', 'England', 'Active', '2021-12-02', '2024-10-16', '3000', 'No', './../images/isaac_kumson.jpg'),
(3, 'Nico', 'Poo', '2001-06-07', 'Germany', 'Active', '2021-09-08', '2024-10-01', '2000', 'No', './../images/Nico_Poo.png'),
(4, 'Bismark', 'Asare', '1996-06-13', 'South Africa', 'Active', '2021-09-08', '2025-10-01', '2000', 'No', './../images/Bismark_Asare.png'),
(5, 'Yaw', 'Bosomtwe', '2000-10-21', 'England', 'Active', '2021-02-12', '2025-04-09', '1800', 'No', './../images/Yaw_Bosomtwe.png'),
(6, 'Ernest', 'Boateng', '1997-06-29', 'Ghana', 'Active', '2020-01-01', '2026-06-20', '2500', 'No', './../images/Ernest_Boating.png'),
(7, 'Lord', 'Fred', '1999-05-12', 'Ghana', 'Active', '2018-01-01', '2023-07-20', '2300', 'No', './../images/Lord_Fred.jpg'),
(8, 'Frank', 'Cudjoe', '1996-07-07', 'Ghana', 'Active', '2018-02-23', '2023-11-25', '4300', 'No', './../images/Frank_Cudjoe.png'),
(9, 'Malik', 'Ofori', '1998-07-10', 'Ghana', 'Active', '2021-12-06', '2025-12-25', '5200', 'No', './../images/Malik_Ofori.png'),
(10, 'Gabriel', 'Kumah', '2002-10-06', 'Ghana', 'Active', '2021-11-06', '2025-02-21', '4400', 'No', './../images/Kumah_Gabriel.jpeg'),
(16, 'Perez', 'Amanfo', '1984-12-15', 'Ghana', 'Active', '2021-12-06', '2024-12-06', '1500', 'No', './../images/coach_Perez_Amanfo.jpg'),
(17, 'Bismark', 'Boadi', '1965-08-01', 'Netherlands', 'Active', '2021-11-01', '2025-01-25', '6000', 'No', './../images/Coach_Boadi_Bismark.jpg'),
(18, 'Joshua', 'Amponsah', '1980-11-14', 'England', 'Active', '2021-11-01', '2025-01-25', '4500', 'No', './../images/Coach_Amposah_Josuah.jpg'),
(37, 'Dr. Blankson', 'Tawiah', '1978-06-01', 'South Africa', 'Active', '2021-12-06', '2026-01-01', '6200', 'No', './../images/Dr_Blankson_Tawiah.png'),
(38, 'Dr. Alicia', 'Anane', '1980-10-26', 'South Africa', 'Active', '2021-12-06', '2024-12-14', '4800', 'No', './../images/Dr_Alicia_Anane.jpg'),
(39, 'Paul', 'Lamptey', '1987-11-12', 'Ghana', 'Active', '2021-12-06', '2023-02-15', '2200', 'No', './../images/trainer_Paul_Lamptey.jpg'),
(40, 'Samuel', 'Tettey', '1989-10-20', 'Ghana', 'Active', '2021-12-06', '2023-02-15', '1500', 'No', './../images/trainer_Samuel_Tettey.jpeg'),
(41, 'David', 'Brewu', '2021-12-15', 'Ghana', 'Active', '2021-12-18', '2021-12-30', '4800', 'No', './../images/Dr_Alicia_Anane.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `news_ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `body` varchar(20000) NOT NULL,
  `isArchive` varchar(10) NOT NULL,
  PRIMARY KEY (`news_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_ID`, `date`, `title`, `image`, `body`, `isArchive`) VALUES
(1, '2021-12-09', 'Sankofa Wins 2:0 Against Highlanders', './images/Lord_Fred.jpg', 'With qualification as group winners already secured, interim boss Ralf Rangnick took game as an opportunity to see more of his players in action.\r\n\r\nThe German made 11 changes from the United XI that started his first match, against Crystal Palace at home in the Premier League win last Sunday.\r\n\r\nRangnick\'s Reds took the lead with an athletic hit by Mason Greenwood after just eight minutes, but Young Boys equalised late in the first half through Fabian Rieder.\r\n\r\nA competitive second half then played out in wet conditions at the Theatre of Dreams, where senior debuts were handed to Tom Heaton, Charlie Savage and Zidane Iqbal, as well as Champions League bows for Amad, Teden Mengi and Shola Shoretire.', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `non_technical_team`
--

DROP TABLE IF EXISTS `non_technical_team`;
CREATE TABLE IF NOT EXISTS `non_technical_team` (
  `ntt_ID` int(11) NOT NULL AUTO_INCREMENT,
  `member_ID` int(11) NOT NULL,
  `isPartTime` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `yearsOfService` varchar(50) NOT NULL,
  PRIMARY KEY (`ntt_ID`),
  KEY `non_players_non_technical_team` (`member_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `non_technical_team`
--

INSERT INTO `non_technical_team` (`ntt_ID`, `member_ID`, `isPartTime`, `department`, `yearsOfService`) VALUES
(7, 37, 'No', 'Medical Team', '1'),
(8, 38, 'No', 'Medical Team', '1'),
(9, 39, 'Yes', 'Fitness Trainer', '1'),
(10, 40, 'Yes', 'Fitness Trainer', '1');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `player_ID` int(11) NOT NULL AUTO_INCREMENT,
  `previous_team` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `fromAcademy` varchar(50) NOT NULL,
  `isCaptain` varchar(50) NOT NULL,
  `isLoan` varchar(50) NOT NULL,
  `member_ID` int(11) NOT NULL,
  PRIMARY KEY (`player_ID`),
  KEY `f_key_member_ID` (`member_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_ID`, `previous_team`, `position`, `fromAcademy`, `isCaptain`, `isLoan`, `member_ID`) VALUES
(1, 'Benfica', 'Defender', 'No', 'No', 'No', 1),
(2, 'Liverpool', 'Striker', 'Yes', 'No', 'No', 2),
(3, 'Watford', 'Midfielder', 'No', 'No', 'No', 3),
(4, 'None', 'Midfielder', 'Yes', 'No', 'Yes', 4),
(5, 'None', 'Striker', 'Yes', 'No', 'No', 5),
(6, 'None', 'Striker', 'Yes', 'No', 'No', 6),
(7, 'Sevila', 'Defender', 'No', 'No', 'No', 7),
(8, 'Arsenal', 'Midfielder', 'No', 'No', 'No', 8),
(9, 'Napoli', 'Midfielder', 'No', 'Yes', 'No', 9),
(10, 'Ajax', 'Midfielder', 'No', 'No', 'No', 10),
(11, 'Liverpool', 'Midfielder', 'No', 'No', 'No', 41);

-- --------------------------------------------------------

--
-- Table structure for table `supporters`
--

DROP TABLE IF EXISTS `supporters`;
CREATE TABLE IF NOT EXISTS `supporters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isAdmin` varchar(10) NOT NULL,
  `isArchive` varchar(10) NOT NULL,
  `default_avatar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supporters`
--

INSERT INTO `supporters` (`id`, `first_name`, `last_name`, `email`, `password`, `isAdmin`, `isArchive`, `default_avatar`) VALUES
(3, 'Hagar', 'Brewu', 'devprotechlearn@gmail.com', 'c7bbf35cdb8c5af64411e26c1fa3787d', 'No', 'No', './../images/default_avatar.png'),
(2, 'Malik', 'Asare', 'davidbrewu962@gmail.com', 'c7bbf35cdb8c5af64411e26c1fa3787d', 'No', 'Yes', './../images/default_avatar.png'),
(4, 'Emma', 'Brewu', 'devprotechlearn@gmail.com', 'c7bbf35cdb8c5af64411e26c1fa3787d', 'No', 'No', './../images/default_avatar.png'),
(5, 'D', 'B', 'davidbrewu962@gmail.com', 'c7bbf35cdb8c5af64411e26c1fa3787d', 'No', 'Yes', './../images/default_avatar.png'),
(6, 'D', 'B', 'davidbrewu962@gmail.com', 'c7bbf35cdb8c5af64411e26c1fa3787d', 'No', 'No', './../images/default_avatar.png'),
(7, 'D', 'Br', 'davidbrewu962@gmail.com', 'c7bbf35cdb8c5af64411e26c1fa3787d', 'No', 'No', './../images/default_avatar.png'),
(8, 'Allotei', 'Pap', 'allotei@gmail.com', 'c7bbf35cdb8c5af64411e26c1fa3787d', 'Yes', 'No', './../images/default_avatar.png'),
(9, 'Samantha', 'Mavunga', 'samantha@gmail.com', 'c7bbf35cdb8c5af64411e26c1fa3787d', 'No', 'No', './../images/default_avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `technical_team`
--

DROP TABLE IF EXISTS `technical_team`;
CREATE TABLE IF NOT EXISTS `technical_team` (
  `tt_ID` int(11) NOT NULL AUTO_INCREMENT,
  `isOldplayer` varchar(10) NOT NULL,
  `role` varchar(50) NOT NULL,
  `member_ID` int(11) NOT NULL,
  `isPartTime` varchar(10) NOT NULL,
  `yearsOfService` varchar(50) NOT NULL,
  PRIMARY KEY (`tt_ID`),
  KEY `non_players_technical_team` (`member_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technical_team`
--

INSERT INTO `technical_team` (`tt_ID`, `isOldplayer`, `role`, `member_ID`, `isPartTime`, `yearsOfService`) VALUES
(1, 'Yes', 'Academy Coach', 16, 'No', '1'),
(2, 'Yes', 'Head Coach', 17, 'No', '5'),
(3, 'Yes', 'Assistant Coach', 18, 'No', '2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `non_technical_team`
--
ALTER TABLE `non_technical_team`
  ADD CONSTRAINT `non_players_non_technical_team` FOREIGN KEY (`member_ID`) REFERENCES `members` (`member_ID`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `f_key_member_ID` FOREIGN KEY (`member_ID`) REFERENCES `members` (`member_ID`);

--
-- Constraints for table `technical_team`
--
ALTER TABLE `technical_team`
  ADD CONSTRAINT `non_players_technical_team` FOREIGN KEY (`member_ID`) REFERENCES `members` (`member_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
