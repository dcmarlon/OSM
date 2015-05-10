-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2015 at 05:39 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

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
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `choice_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer_data` varchar(100) NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `student_id` (`student_id`),
  KEY `question_id` (`question_id`),
  KEY `choice_id` (`choice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `student_id`, `choice_id`, `question_id`, `answer_data`) VALUES
(1, 11100222, 1, 1, ''),
(2, 11100222, 4, 2, ''),
(3, 11100222, 7, 3, ''),
(4, 11100222, 9, 4, ''),
(5, 11100222, 11, 5, ''),
(6, 11100224, 2, 1, ''),
(7, 11100224, 4, 2, ''),
(8, 11100224, 7, 3, ''),
(9, 11100224, 9, 4, ''),
(10, 11100224, 11, 5, ''),
(11, 11100226, 3, 1, ''),
(12, 11100226, 5, 2, ''),
(13, 11100226, 7, 3, ''),
(14, 11100226, 9, 4, ''),
(15, 11100226, 11, 5, ''),
(16, 11100228, 2, 1, ''),
(17, 11100228, 6, 2, ''),
(18, 11100228, 7, 3, ''),
(19, 11100228, 9, 4, ''),
(20, 11100228, 11, 5, ''),
(21, 11100230, 2, 1, ''),
(22, 11100230, 6, 2, ''),
(23, 11100230, 7, 3, ''),
(24, 11100230, 9, 4, ''),
(25, 11100230, 11, 5, ''),
(26, 11100232, 2, 1, ''),
(27, 11100232, 5, 2, ''),
(28, 11100232, 7, 3, ''),
(29, 11100232, 9, 4, ''),
(30, 11100232, 11, 5, ''),
(31, 11100232, 3, 1, ''),
(32, 11100232, 6, 2, ''),
(33, 11100232, 7, 3, ''),
(34, 11100232, 9, 4, ''),
(35, 11100232, 11, 5, ''),
(36, 11100234, 3, 1, ''),
(37, 11100234, 6, 2, ''),
(38, 11100234, 7, 3, ''),
(39, 11100234, 9, 4, ''),
(40, 11100234, 11, 5, ''),
(41, 11100236, 3, 1, ''),
(42, 11100236, 6, 2, ''),
(43, 11100236, 7, 3, ''),
(44, 11100236, 9, 4, ''),
(45, 11100236, 11, 5, ''),
(46, 11100238, 1, 1, ''),
(47, 11100238, 5, 2, ''),
(48, 11100238, 7, 3, ''),
(49, 11100238, 9, 4, ''),
(50, 11100238, 11, 5, ''),
(51, 11100240, 2, 1, ''),
(52, 11100240, 4, 2, ''),
(53, 11100240, 7, 3, ''),
(54, 11100240, 9, 4, ''),
(55, 11100240, 11, 5, ''),
(56, 11100242, 3, 1, ''),
(57, 11100242, 5, 2, ''),
(58, 11100242, 7, 3, ''),
(59, 11100242, 9, 4, ''),
(60, 11100242, 11, 5, ''),
(61, 11100244, 3, 1, ''),
(62, 11100244, 5, 2, ''),
(63, 11100244, 7, 3, ''),
(64, 11100244, 9, 4, ''),
(65, 11100244, 11, 5, ''),
(66, 11100222, 13, 6, ''),
(67, 11100222, 17, 7, ''),
(68, 11100222, 18, 7, ''),
(69, 11100222, 20, 8, ''),
(70, 11100224, 14, 6, ''),
(71, 11100224, 16, 7, ''),
(72, 11100224, 18, 7, ''),
(73, 11100224, 19, 8, ''),
(74, 11100226, 13, 6, ''),
(75, 11100226, 17, 7, ''),
(76, 11100226, 18, 7, ''),
(77, 11100226, 21, 8, ''),
(78, 11100228, 14, 6, ''),
(79, 11100228, 16, 7, ''),
(80, 11100228, 17, 7, ''),
(81, 11100228, 19, 8, ''),
(82, 11100230, 14, 6, ''),
(83, 11100230, 16, 7, ''),
(84, 11100230, 19, 8, ''),
(85, 11100232, 13, 6, ''),
(86, 11100232, 18, 7, ''),
(87, 11100232, 20, 8, ''),
(88, 11100234, 22, 9, ''),
(89, 11100234, 25, 10, ''),
(90, 11100234, 28, 11, ''),
(91, 11100236, 24, 9, ''),
(92, 11100236, 25, 10, ''),
(93, 11100236, 28, 11, ''),
(95, 11100238, 24, 9, ''),
(96, 11100238, 27, 10, ''),
(97, 11100238, 30, 11, '');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE IF NOT EXISTS `choices` (
  `choice_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `choice_data` varchar(100) NOT NULL,
  PRIMARY KEY (`choice_id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

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
(31, 12, 'Male'),
(32, 12, 'Female'),
(33, 12, 'Others'),
(34, 13, 'Apple'),
(35, 13, 'Juice'),
(36, 13, 'Others'),
(37, 14, 'Zip'),
(38, 14, 'Top'),
(39, 14, 'Echo'),
(40, 15, 'Ice Cream'),
(41, 15, 'Banana'),
(42, 16, 'oops'),
(43, 16, 'shoot'),
(44, 17, 'Sachet'),
(45, 17, 'Bottle'),
(46, 18, 'systemex'),
(47, 18, 'triumph over'),
(48, 19, 'asasas'),
(49, 19, 'asasasasasas');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_id` int(11) DEFAULT NULL,
  `question_type` enum('Single','Multiple','Combination') NOT NULL,
  `question_data` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`question_id`),
  KEY `survey_id` (`survey_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `survey_id`, `question_type`, `question_data`) VALUES
(1, 5, 'Single', 'What is that fair lady?'),
(2, 5, 'Multiple', 'Who would that be??'),
(3, 5, 'Single', 'Who win the fight?'),
(4, 5, 'Single', 'Coward is Mayweather?'),
(5, 5, 'Single', 'Pacquiao won??'),
(6, 6, 'Single', 'Who is our national hero?'),
(7, 6, 'Multiple', 'What is your favorite color?'),
(8, 6, 'Single', 'What is the tallest mountain?'),
(9, 1, 'Multiple', 'Who cares rinmaywid ?'),
(10, 1, 'Single', 'What is your song?'),
(11, 1, 'Single', 'What is the correct value?'),
(12, 1, 'Single', 'I am . . .'),
(13, 1, 'Multiple', 'Choose among them . . .'),
(14, 1, 'Multiple', 'Tell them what to do. . .'),
(15, 12, 'Single', 'What do you live'),
(16, 13, 'Multiple', 'What are the suits?'),
(17, 14, 'Single', 'What do you want?'),
(18, 15, 'Single', 'sure it does'),
(19, 16, 'Multiple', 'asasas');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL,
  `college` varchar(50) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `college`) VALUES
(10304187, 'CAS'),
(11100222, 'CAS'),
(11100224, 'CAS'),
(11100226, 'CAFA'),
(11100228, 'CAFA'),
(11100230, 'COE'),
(11100232, 'COE'),
(11100234, 'SBE'),
(11100236, 'SBE'),
(11100238, 'SHCP'),
(11100240, 'SHCP'),
(11100242, 'SLG'),
(11100244, 'SLG');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_name` varchar(40) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `issued_date` date DEFAULT NULL,
  `status` enum('Available','Active','Unavailable') NOT NULL DEFAULT 'Available',
  PRIMARY KEY (`survey_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`survey_id`, `survey_name`, `created_date`, `issued_date`, `status`) VALUES
(1, 'Everything has changed', '2015-01-22 16:00:00', '2015-02-14', 'Active'),
(2, 'Thinking Out Loud', '2015-07-13 16:00:00', '0000-00-00', 'Available'),
(3, 'Stay with me', '2014-06-06 16:00:00', '0000-00-00', 'Available'),
(4, 'Far awaysurvey', '2014-06-06 16:00:00', '0000-00-00', 'Available'),
(5, 'Passenger Seat', '2014-05-01 16:00:00', '2015-05-28', 'Unavailable'),
(6, 'All of me', '2014-04-14 16:00:00', '2015-04-15', 'Unavailable'),
(7, 'It was always you', '2014-06-23 16:00:00', '0000-00-00', 'Available'),
(8, 'Sugar', '2013-06-23 16:00:00', '0000-00-00', 'Available'),
(9, 'Break Free', '2012-06-23 16:00:00', '0000-00-00', 'Available'),
(10, 'Style', '2011-06-23 16:00:00', '0000-00-00', 'Available'),
(11, 'Always', '2010-06-23 16:00:00', '0000-00-00', 'Available'),
(12, 'on the Shore lin', '2015-05-10 01:58:23', NULL, 'Available'),
(13, 'The fast and furios 7', '2015-05-10 02:08:03', NULL, 'Available'),
(14, 'The fathomable service', '2015-05-10 02:11:41', NULL, 'Available'),
(15, 'The fanthom opera', '2015-05-10 02:21:03', NULL, 'Available'),
(16, 'asddd', '2015-05-10 02:24:53', NULL, 'Available');

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
