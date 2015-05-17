-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2015 at 05:49 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `osmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
`answer_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `choice_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `student_id`, `choice_id`, `question_id`) VALUES
(1, 11100222, 37, 11),
(2, 11100222, 40, 12),
(3, 11100222, 42, 12),
(4, 11100222, 44, 13),
(5, 11100222, 46, 14),
(6, 11100222, 48, 14),
(7, 11100224, 38, 11),
(8, 11100224, 40, 12),
(9, 11100224, 41, 12),
(10, 11100224, 44, 13),
(11, 11100224, 46, 14),
(12, 11100224, 47, 14),
(13, 11100226, 37, 11),
(14, 11100226, 40, 12),
(15, 11100226, 41, 12),
(16, 11100226, 42, 12),
(17, 11100226, 43, 13),
(18, 11100226, 46, 14),
(19, 11100226, 47, 14),
(20, 11100228, 39, 11),
(21, 11100228, 40, 12),
(22, 11100228, 41, 12),
(23, 11100228, 45, 13),
(24, 11100228, 46, 14),
(25, 11100228, 47, 14),
(26, 11100230, 38, 11),
(27, 11100230, 40, 12),
(28, 11100230, 41, 12),
(29, 11100230, 44, 13),
(30, 11100230, 46, 14),
(31, 11100230, 47, 14),
(32, 11100232, 38, 11),
(33, 11100232, 40, 12),
(34, 11100232, 41, 12),
(35, 11100232, 44, 13),
(36, 11100232, 46, 14),
(37, 11100232, 47, 14),
(38, 11100232, 48, 14),
(39, 11100234, 39, 11),
(40, 11100234, 41, 12),
(41, 11100234, 45, 13),
(42, 11100234, 46, 14),
(43, 11100234, 47, 14),
(44, 11100238, 39, 11),
(45, 11100238, 41, 12),
(46, 11100238, 42, 12),
(47, 11100238, 44, 13),
(48, 11100238, 46, 14),
(49, 11100238, 47, 14),
(50, 11100240, 38, 11),
(51, 11100240, 42, 12),
(52, 11100240, 46, 14),
(53, 11100240, 47, 14),
(54, 9789787, 50, 15),
(55, 9789787, 52, 15),
(56, 9789787, 53, 15),
(57, 9789787, 55, 16),
(58, 9789787, 59, 17),
(59, 9789787, 60, 18),
(60, 9768756, 49, 15),
(61, 9768756, 50, 15),
(62, 9768756, 52, 15),
(63, 9768756, 55, 16),
(64, 9768756, 59, 17),
(65, 9768756, 60, 18),
(66, 9768756, 61, 18),
(67, 10349667, 49, 15),
(68, 10349667, 50, 15),
(69, 10349667, 52, 15),
(70, 10349667, 55, 16),
(71, 10349667, 59, 17),
(72, 10349667, 60, 18),
(73, 10349667, 61, 18),
(74, 10349667, 62, 18),
(75, 10385765, 51, 15),
(76, 10385765, 52, 15),
(77, 10385765, 53, 15),
(78, 10385765, 56, 16),
(79, 10385765, 59, 17),
(80, 10385765, 60, 18),
(81, 10385765, 61, 18),
(82, 10305757, 50, 15),
(83, 10305757, 51, 15),
(84, 10305757, 57, 16),
(85, 10305757, 59, 17),
(86, 10305757, 60, 18),
(87, 10305757, 61, 18),
(88, 10308756, 49, 15),
(89, 10308756, 50, 15),
(90, 10308756, 51, 15),
(91, 10308756, 52, 15),
(92, 10308756, 56, 16),
(93, 10308756, 58, 17),
(94, 10308756, 60, 18),
(95, 10308756, 61, 18),
(96, 10308756, 62, 18),
(97, 10304187, 2, 1),
(98, 10304187, 4, 2),
(99, 10304187, 7, 3),
(100, 10304187, 10, 4),
(101, 10304187, 11, 5),
(102, 10304187, 12, 5),
(103, 10304187, 13, 5),
(104, 10304187, 15, 6),
(105, 10304187, 16, 7),
(106, 10304187, 17, 7),
(107, 10304187, 18, 7),
(108, 10304187, 20, 8),
(109, 10304187, 22, 8),
(110, 10304187, 24, 8),
(111, 10304187, 25, 9),
(112, 10304187, 30, 10),
(113, 10304187, 33, 10),
(114, 10304187, 35, 10),
(115, 10304187, 36, 10);

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE IF NOT EXISTS `choices` (
`choice_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `choice_data` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`choice_id`, `question_id`, `choice_data`) VALUES
(1, 1, 'Yes'),
(2, 1, 'No'),
(3, 1, 'Probably'),
(4, 2, 'Yes'),
(5, 2, 'No'),
(6, 3, 'Yes'),
(7, 3, 'No'),
(8, 4, 'Yes'),
(9, 4, 'No'),
(10, 4, 'I''ve heard about it'),
(11, 5, 'DAP is okay, it has provisions that make sense are beneficial'),
(12, 5, 'DAP is okay but some provisions have to be changed'),
(13, 5, 'It is unconstitutional and anomalous'),
(14, 6, 'Yes'),
(15, 6, 'No'),
(16, 7, 'The philippines is still unprepared'),
(17, 7, 'Our country is yet to meet the needs within its internal affairs before it can be effective with regard to ASEAN integration'),
(18, 7, 'Others'),
(19, 8, 'Politics'),
(20, 8, 'Economics'),
(21, 8, 'Education'),
(22, 8, 'Socio-cultural integration and diversity'),
(23, 8, 'National Identity'),
(24, 8, 'Others'),
(25, 9, 'Yes, it was an eye opener'),
(26, 9, 'People should learn to be more discreet'),
(27, 9, 'No, we shouldn''t be afraid to call for our rights'),
(28, 9, 'I never support such rallies'),
(29, 10, 'Atheists and agnostics'),
(30, 10, 'LGBT communities'),
(31, 10, 'Activists'),
(32, 10, 'Fraternities or sororities'),
(33, 10, 'No-Christian groups (e.g. Muslims, Buddhists, Jews etc.)'),
(34, 10, 'Foreigners'),
(35, 10, 'People with Disablities'),
(36, 10, 'Others'),
(37, 11, 'Biscuit'),
(38, 11, 'Juice'),
(39, 11, 'Bread'),
(40, 12, 'Angel Locsin'),
(41, 12, 'Anne Curtis'),
(42, 12, 'Others'),
(43, 13, 'Davao'),
(44, 13, 'Cebu'),
(45, 13, 'Others'),
(46, 14, 'Body'),
(47, 14, 'Face'),
(48, 14, 'All of the Above'),
(49, 15, 'C Food'),
(50, 15, 'Java Rice'),
(51, 15, 'Fried PHP'),
(52, 15, 'C# Shrimp'),
(53, 15, 'Others'),
(54, 16, 'Red'),
(55, 16, 'Orange'),
(56, 16, 'Blue'),
(57, 16, 'Others'),
(58, 17, 'Manny Pakyaw'),
(59, 17, 'Floyd Weather'),
(60, 18, 'Ice cream'),
(61, 18, 'Milk tea'),
(62, 18, 'Cake'),
(63, 19, 'wanwan'),
(64, 19, 'wans'),
(65, 20, 'toto'),
(66, 20, 'tos'),
(67, 21, 'trietrie'),
(68, 21, 'tries'),
(69, 21, 'Others'),
(70, 22, 'forfor'),
(71, 22, 'fors'),
(72, 22, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`question_id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `question_type` enum('Single','Multiple','Combination') NOT NULL,
  `question_data` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `survey_id`, `question_type`, `question_data`) VALUES
(1, 1, 'Single', 'Do you think the Philippines will have a prosperous future in the next few years?'),
(2, 1, 'Single', 'Do you know the purpose of a State of the Nation Address(SONA)?'),
(3, 1, 'Single', 'Are you hopeful with the current administration?'),
(4, 1, 'Single', 'Do you know about the Disbursement Acceleration Program (DAP)?'),
(5, 1, 'Multiple', 'If yes, do you think that DAP it is rightly considered illegitimate or not?'),
(6, 1, 'Single', 'Do you think the Philippines is ready for the ASEAN Integration?'),
(7, 1, 'Multiple', 'If no, why so?'),
(8, 1, 'Multiple', 'What areas do you think would the ASEAN integration affect most?'),
(9, 1, 'Single', 'In view of the case dismissal of the USC4, did their case make you fearful of the consequences of being upfront in supporting rights rallies or the opposite?'),
(10, 1, 'Multiple', 'Which of these social/groups/individuals whose presence inside the university you are less likely to tolerate?'),
(11, 2, 'Single', 'What will you choose?'),
(12, 2, 'Multiple', 'Sino ang pipiliin mo?'),
(13, 2, 'Single', 'San ka pupunta?'),
(14, 2, 'Multiple', 'What is your impefections?'),
(15, 3, 'Multiple', 'What is your favorite food?'),
(16, 3, 'Single', 'What is your favorite color?'),
(17, 3, 'Single', 'Who is really won the fight?'),
(18, 3, 'Multiple', 'Choose among them . . .'),
(19, 4, 'Single', 'Sample one?'),
(20, 4, 'Multiple', 'Sample two?'),
(21, 4, 'Single', 'Sample three?'),
(22, 4, 'Multiple', 'Sample four?');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL,
  `college` varchar(50) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `college`, `status`) VALUES
(9768756, 'COE', 0),
(9789787, 'CAS', 0),
(10304187, 'CAS', 1),
(10305757, 'SLG', 0),
(10308756, 'COED', 0),
(10349667, 'CAFA', 0),
(10385765, 'COED', 0),
(11100222, 'CAS', 0),
(11100224, 'CAS', 0),
(11100226, 'CAFA', 0),
(11100228, 'CAFA', 0),
(11100230, 'COE', 0),
(11100232, 'COE', 0),
(11100234, 'SBE', 0),
(11100236, 'SBE', 0),
(11100238, 'SHCP', 0),
(11100240, 'SHCP', 0),
(11100242, 'SLG', 0),
(11100244, 'SLG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
`survey_id` int(11) NOT NULL,
  `survey_name` varchar(40) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `issued_date` date DEFAULT NULL,
  `status` enum('Available','Active','Unavailable') NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`survey_id`, `survey_name`, `created_date`, `issued_date`, `status`) VALUES
(1, 'Carolinians'' Today : 2015', '2015-04-20 14:51:51', '2015-05-17', 'Active'),
(2, 'All of Me', '2014-03-12 03:33:09', '2014-06-16', 'Unavailable'),
(3, 'Passenger Seat', '2014-04-15 03:36:36', '2014-08-20', 'Unavailable'),
(4, 'This is the sample survey test', '2015-05-17 03:45:42', NULL, 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
 ADD PRIMARY KEY (`answer_id`), ADD KEY `student_id` (`student_id`), ADD KEY `question_id` (`question_id`), ADD KEY `choice_id` (`choice_id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
 ADD PRIMARY KEY (`choice_id`), ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`question_id`), ADD KEY `survey_id` (`survey_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
 ADD PRIMARY KEY (`survey_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
MODIFY `choice_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`),
ADD CONSTRAINT `answers_ibfk_3` FOREIGN KEY (`choice_id`) REFERENCES `choices` (`choice_id`);

--
-- Constraints for table `choices`
--
ALTER TABLE `choices`
ADD CONSTRAINT `choices_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`question_id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `survey` (`survey_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
