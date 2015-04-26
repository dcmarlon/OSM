-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2015 at 09:31 AM
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
  `answer_data` varchar(100) NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `student_id` (`student_id`),
  KEY `choice_id` (`choice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`choice_id`, `question_id`, `choice_data`) VALUES
(1, 1, 'AS WE GO DRIVING'),
(2, 2, 'FOR A WHILE');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `survey_id`, `question_type`, `question_data`) VALUES
(1, 5, 'Single', 'I LOOK AT HER'),
(2, 5, 'Single', 'AND HAVE TO SMILE');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(11) NOT NULL,
  `college` varchar(50) NOT NULL,
  `taken_date` date NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `college`, `taken_date`) VALUES
(11100222, 'CAFA', '2015-04-25'),
(11100224, 'CAS', '2015-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE IF NOT EXISTS `survey` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_name` varchar(40) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `issued_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('Available','Active','Unavailable') NOT NULL DEFAULT 'Available',
  PRIMARY KEY (`survey_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`survey_id`, `survey_name`, `created_date`, `issued_date`, `status`) VALUES
(1, 'Everything has changed', '2015-01-22 16:00:00', '2015-02-13 16:00:00', 'Active'),
(2, 'Thinking Out Loud', '2015-07-13 16:00:00', '0000-00-00 00:00:00', 'Available'),
(3, 'Stay with me', '2014-06-06 16:00:00', '0000-00-00 00:00:00', 'Available'),
(4, 'Far awaysurvey', '2014-06-06 16:00:00', '0000-00-00 00:00:00', 'Available'),
(5, 'Passenger Seat', '2014-05-01 16:00:00', '2015-05-27 16:00:00', 'Unavailable'),
(6, 'All of me', '2014-04-14 16:00:00', '2015-04-14 16:00:00', 'Unavailable'),
(7, 'It was always you', '2014-06-23 16:00:00', '2014-03-19 16:00:00', 'Unavailable'),
(8, 'Sugar', '2013-06-23 16:00:00', '2013-03-19 16:00:00', 'Unavailable'),
(9, 'Break Free', '2012-06-23 16:00:00', '2012-03-19 16:00:00', 'Unavailable'),
(10, 'Style', '2011-06-23 16:00:00', '2011-03-19 16:00:00', 'Unavailable'),
(11, 'Always', '2010-06-23 16:00:00', '2010-03-19 16:00:00', 'Unavailable'),
(12, 'Inspiration', '2009-06-23 16:00:00', '2009-03-19 16:00:00', 'Unavailable'),
(13, 'Love All', '2008-06-23 16:00:00', '2008-03-19 16:00:00', 'Unavailable');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`choice_id`) REFERENCES `choices` (`choice_id`);

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
