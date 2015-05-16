-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2015 at 12:54 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `student_id`, `choice_id`, `question_id`) VALUES
(1, 11100222, 1, 1),
(2, 11100222, 4, 2),
(3, 11100222, 7, 3),
(4, 11100222, 9, 4),
(5, 11100222, 11, 5),
(6, 11100224, 2, 1),
(7, 11100224, 4, 2),
(8, 11100224, 7, 3),
(9, 11100224, 9, 4),
(10, 11100224, 11, 5),
(11, 11100226, 3, 1),
(12, 11100226, 5, 2),
(13, 11100226, 7, 3),
(14, 11100226, 9, 4),
(15, 11100226, 11, 5),
(16, 11100228, 2, 1),
(17, 11100228, 6, 2),
(18, 11100228, 7, 3),
(19, 11100228, 9, 4),
(20, 11100228, 11, 5),
(21, 11100230, 2, 1),
(22, 11100230, 6, 2),
(23, 11100230, 7, 3),
(24, 11100230, 9, 4),
(25, 11100230, 11, 5),
(26, 11100232, 2, 1),
(27, 11100232, 5, 2),
(28, 11100232, 7, 3),
(29, 11100232, 9, 4),
(30, 11100232, 11, 5),
(31, 11100232, 3, 1),
(32, 11100232, 6, 2),
(33, 11100232, 7, 3),
(34, 11100232, 9, 4),
(35, 11100232, 11, 5),
(36, 11100234, 3, 1),
(37, 11100234, 6, 2),
(38, 11100234, 7, 3),
(39, 11100234, 9, 4),
(40, 11100234, 11, 5),
(41, 11100236, 3, 1),
(42, 11100236, 6, 2),
(43, 11100236, 7, 3),
(44, 11100236, 9, 4),
(45, 11100236, 11, 5),
(46, 11100238, 1, 1),
(47, 11100238, 5, 2),
(48, 11100238, 7, 3),
(49, 11100238, 9, 4),
(50, 11100238, 11, 5),
(51, 11100240, 2, 1),
(52, 11100240, 4, 2),
(53, 11100240, 7, 3),
(54, 11100240, 9, 4),
(55, 11100240, 11, 5),
(56, 11100242, 3, 1),
(57, 11100242, 5, 2),
(58, 11100242, 7, 3),
(59, 11100242, 9, 4),
(60, 11100242, 11, 5),
(61, 11100244, 3, 1),
(62, 11100244, 5, 2),
(63, 11100244, 7, 3),
(64, 11100244, 9, 4),
(65, 11100244, 11, 5),
(66, 11100222, 13, 6),
(67, 11100222, 17, 7),
(68, 11100222, 18, 7),
(69, 11100222, 20, 8),
(70, 11100224, 14, 6),
(71, 11100224, 16, 7),
(72, 11100224, 18, 7),
(73, 11100224, 19, 8),
(74, 11100226, 13, 6),
(75, 11100226, 17, 7),
(76, 11100226, 18, 7),
(77, 11100226, 21, 8),
(78, 11100228, 14, 6),
(79, 11100228, 16, 7),
(80, 11100228, 17, 7),
(81, 11100228, 19, 8),
(82, 11100230, 14, 6),
(83, 11100230, 16, 7),
(84, 11100230, 19, 8),
(85, 11100232, 13, 6),
(86, 11100232, 18, 7),
(87, 11100232, 20, 8),
(88, 11100234, 22, 9),
(89, 11100234, 25, 10),
(90, 11100234, 28, 11),
(91, 11100236, 24, 9),
(92, 11100236, 25, 10),
(93, 11100236, 28, 11),
(95, 11100238, 24, 9),
(96, 11100238, 27, 10),
(97, 11100238, 30, 11);

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE IF NOT EXISTS `choices` (
`choice_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `choice_data` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`choice_id`, `question_id`, `choice_data`) VALUES
(1, 1, 'A bug'),
(2, 1, 'A worm'),
(3, 1, 'A bird'),
(4, 2, 'Angel'),
(5, 2, 'Devil'),
(6, 2, 'Human'),
(7, 3, 'Manny'),
(8, 3, 'Floyd'),
(9, 4, 'Yes'),
(10, 4, 'No'),
(11, 5, 'Yes'),
(12, 5, 'No'),
(13, 6, 'Jose Rizal'),
(14, 6, 'Manny Pakyaw'),
(15, 6, 'Apolinario'),
(16, 7, 'Red'),
(17, 7, 'Blue'),
(18, 7, 'Black'),
(19, 8, 'Everest'),
(20, 8, 'Apo'),
(21, 8, 'Hills'),
(22, 9, 'Weak'),
(23, 9, 'Run run'),
(24, 9, 'Power Hug'),
(25, 10, 'Love'),
(26, 10, 'Hey'),
(27, 10, 'Power nap'),
(28, 11, 'Five'),
(29, 11, 'Four'),
(30, 11, 'Three'),
(31, 12, 'Yes'),
(32, 12, 'No'),
(33, 12, 'Probably'),
(34, 13, 'Yes'),
(35, 13, 'No'),
(36, 14, 'Yes'),
(37, 14, 'No'),
(38, 15, 'Yes'),
(39, 15, 'No'),
(40, 15, 'I''ve heard about it'),
(41, 16, 'DAP is okay, it has provisions that make sense are beneficial'),
(42, 16, 'DAP is okay but some provisions have to be changed'),
(43, 16, 'It is unconstitutional and anomalous'),
(44, 17, 'Yes'),
(45, 17, 'No'),
(46, 18, 'The philippines is still unprepared'),
(47, 18, 'Our country is yet to meet the needs within its internal affairs before it can be effective with regard to ASEAN integration'),
(48, 18, 'Others'),
(49, 19, 'Politics'),
(50, 19, 'Economics'),
(51, 19, 'Education'),
(52, 19, 'Socio-cultural integration and diversity'),
(53, 19, 'National Identity'),
(54, 19, 'Others'),
(55, 20, 'Yes, it was an eye opener'),
(56, 20, 'People should learn to be more discreet'),
(57, 20, 'No, we shouldn''t be afraid to call for our rights'),
(58, 20, 'I never support such rallies'),
(59, 21, 'Atheists and agnostics'),
(60, 21, 'LGBT communities'),
(61, 21, 'Activists'),
(62, 21, 'Fraternities or sororities'),
(63, 21, 'No-Christian groups (e.g. Muslims, Buddhists, Jews etc.)'),
(64, 21, 'Foreigners'),
(65, 21, 'People with Disablities'),
(66, 21, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`question_id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `question_type` enum('Single','Multiple','Combination') NOT NULL,
  `question_data` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `survey_id`, `question_type`, `question_data`) VALUES
(1, 3, 'Single', 'What is that fair lady?'),
(2, 3, 'Multiple', 'Who would that be?'),
(3, 3, 'Single', 'Who win the fight?'),
(4, 3, 'Single', 'Coward is Mayweather?'),
(5, 3, 'Single', 'Pacquiao won??'),
(6, 3, 'Single', 'Who is our national hero?'),
(7, 2, 'Multiple', 'What is your favorite color?'),
(8, 2, 'Single', 'What is the tallest mountain?'),
(9, 1, 'Multiple', 'Who cares rinmaywid ?'),
(10, 1, 'Single', 'What is your song?'),
(11, 1, 'Single', 'What is the correct value?'),
(12, 4, 'Single', 'Do you think the Philippines will have a prosperous future in the next few years?'),
(13, 4, 'Single', 'Do you know the purpose of a State of the Nation Address(SONA)?'),
(14, 4, 'Single', 'Are you hopeful with the current administration?'),
(15, 4, 'Single', 'Do you know about the Disbursement Acceleration Program (DAP)?'),
(16, 4, 'Multiple', 'If yes, do you think that DAP it is rightly considered illegitimate or not?'),
(17, 4, 'Single', 'Do you think the Philippines is ready for the ASEAN Integration?'),
(18, 4, 'Multiple', 'If no, why so?'),
(19, 4, 'Multiple', 'What areas do you think would the ASEAN integration affect most?'),
(20, 4, 'Single', 'In view of the case dismissal of the USC4, did their case make you fearful of the consequences of being upfront in supporting rights rallies or the opposite?'),
(21, 4, 'Multiple', 'Which of these social/groups/individuals whose presence inside the university you are less likely to tolerate?');

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
(1, 'Passenger Seat', '2014-05-01 16:00:00', '2015-05-28', 'Unavailable'),
(2, 'All of me', '2014-04-14 16:00:00', '2015-04-15', 'Unavailable'),
(3, 'Everything has changed', '2015-01-22 16:00:00', NULL, 'Available'),
(4, 'Carolinians'' Today : 2015', '2015-05-16 22:51:51', '2015-05-18', 'Active');

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
MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
MODIFY `choice_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
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
