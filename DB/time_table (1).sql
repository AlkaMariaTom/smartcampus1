-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2018 at 09:22 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `time_table`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_signup`
--

CREATE TABLE IF NOT EXISTS `admin_signup` (
  `name` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_signup`
--

INSERT INTO `admin_signup` (`name`, `pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subj` int(11) NOT NULL,
  `topic` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `batch` int(11) NOT NULL,
  `dead` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subj` (`subj`),
  KEY `batch` (`batch`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `subj`, `topic`, `description`, `date`, `batch`, `dead`) VALUES
(1, 10, 'Light', 'Light - Reflection and Refraction', '2018-06-28', 1, '2018-06-30'),
(2, 8, 'deferentiate', 'sf sdfsdfsdsdf sdfdsf', '2018-07-19', 1, '2018-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `year` (`year`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `year`) VALUES
(1, '2010-11'),
(2, '2011-12'),
(3, '2012-13');

-- --------------------------------------------------------

--
-- Table structure for table `club_activity`
--

CREATE TABLE IF NOT EXISTS `club_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `club_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `venue` text NOT NULL,
  `activity` text NOT NULL,
  `submit_date` date NOT NULL,
  `faculty_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `club_id` (`club_id`),
  KEY `faculty_id` (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `club_activity`
--

INSERT INTO `club_activity` (`id`, `club_id`, `date`, `venue`, `activity`, `submit_date`, `faculty_id`) VALUES
(2, 1, '2018-06-22 17:00:00', 'sdf sdf sdf sdf sdf', 'kjsdf sdfnsdf sdnfsd lksnf sdknf', '2018-06-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `club_tb`
--

CREATE TABLE IF NOT EXISTS `club_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `club` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `club` (`club`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `club_tb`
--

INSERT INTO `club_tb` (`id`, `club`) VALUES
(1, 'abc'),
(3, 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `event_tb`
--

CREATE TABLE IF NOT EXISTS `event_tb` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `event_tb`
--

INSERT INTO `event_tb` (`eid`, `title`, `details`, `image`) VALUES
(1, 'Arts Day', 'ads dfsdfsdf', '/TimeTable/Event/Koala.jpg'),
(2, 'Inauguration', 'asda asdad', '/TimeTable/Event/Koala1.jpg'),
(3, 'asdasd', 'asd', '/TimeTable/Event/Jellyfish.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `exam_timetable`
--

CREATE TABLE IF NOT EXISTS `exam_timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batch` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `semester` (`semester`),
  KEY `batch` (`batch`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `exam_timetable`
--

INSERT INTO `exam_timetable` (`id`, `batch`, `semester`, `file`) VALUES
(1, 1, 1, '/TimeTable/Exam Syllabus/mathamatics.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_tb`
--

CREATE TABLE IF NOT EXISTS `faculty_tb` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `address` text NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `experiance` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `faculty_tb`
--

INSERT INTO `faculty_tb` (`fid`, `name`, `gender`, `age`, `address`, `qualification`, `experiance`, `college`, `email`, `mobile`, `photo`, `username`, `password`) VALUES
(1, 'SreeLakshmi', 'Female', 28, 'kannur', 'B.Ed', '2', 'Kannur College', 'sree@gamil.com', '8989898989', 'Tulips.jpg', 'sree', 'sree'),
(2, 'Mohan', 'Male', 45, 'palakad', 'B.Ed', '5', 'Payyanur College', 'mohan@gamil.com', '6969896563', 'Tulips.jpg', 'moh', 'moh');

-- --------------------------------------------------------

--
-- Table structure for table `note_tb`
--

CREATE TABLE IF NOT EXISTS `note_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `note_tb`
--

INSERT INTO `note_tb` (`id`, `subject_id`, `title`, `note`) VALUES
(1, 8, 'Differentiation', 'Notes/mathamatics1.pdf'),
(2, 10, '', 'Notes/5555syllabi_physics_2014.pdf'),
(3, 8, '', 'Notes/exam1.pdf'),
(4, 8, 'Algbra', 'Notes/mathamatics2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `semester_tb`
--

CREATE TABLE IF NOT EXISTS `semester_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semester` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `semester` (`semester`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `semester_tb`
--

INSERT INTO `semester_tb` (`id`, `semester`) VALUES
(1, 'semester 1');

-- --------------------------------------------------------

--
-- Table structure for table `student_signup`
--

CREATE TABLE IF NOT EXISTS `student_signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first` varchar(100) NOT NULL,
  `middle` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `reg` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student_signup`
--

INSERT INTO `student_signup` (`id`, `first`, `middle`, `last`, `reg`, `email`, `mobile`, `batch`, `pass`, `status`) VALUES
(1, '', '', '', 'adarsh', '', '', '', '123456', ''),
(2, 'adarsh', 'k', 'a', 'adarsh', 'ada@gmail.com', '8921647449', '1', 'adhu123', ''),
(3, 'alka', 'al', 'ka', 'alka', 'ahha@hh.com', '8954647449', '2011-12', '123456', ''),
(4, '', '', '', 'REG520', '', '', '', '38409', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject_tb`
--

CREATE TABLE IF NOT EXISTS `subject_tb` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `semester` int(11) NOT NULL,
  `faculty` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `faculty` (`faculty`),
  KEY `subject` (`subject`),
  KEY `semester` (`semester`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `subject_tb`
--

INSERT INTO `subject_tb` (`sid`, `semester`, `faculty`, `subject`) VALUES
(8, 1, 1, 'Maths'),
(9, 1, 2, 'Chemistry'),
(10, 1, 1, 'Physics'),
(11, 1, 2, 'English'),
(12, 1, 2, 'Hindi'),
(13, 1, 1, 'Biology');

-- --------------------------------------------------------

--
-- Table structure for table `submitted_assignment`
--

CREATE TABLE IF NOT EXISTS `submitted_assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` text NOT NULL,
  `student` int(11) NOT NULL,
  `topic` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student` (`student`),
  KEY `topic` (`topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `submitted_assignment`
--

INSERT INTO `submitted_assignment` (`id`, `file`, `student`, `topic`, `date`) VALUES
(2, 'Assignment/mathamatics.pdf', 2, 1, '2018-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus_tb`
--

CREATE TABLE IF NOT EXISTS `syllabus_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject` (`subject`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `syllabus_tb`
--

INSERT INTO `syllabus_tb` (`id`, `subject`, `file`) VALUES
(10, 12, '/TimeTable/Syllabus/5555syllabi_physics_20141.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE IF NOT EXISTS `time_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batch` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `day` varchar(50) NOT NULL,
  `period1` int(11) NOT NULL,
  `period2` int(11) NOT NULL,
  `period3` int(11) NOT NULL,
  `period4` int(11) NOT NULL,
  `period5` int(11) NOT NULL,
  `period6` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `batch` (`batch`),
  KEY `semester` (`semester`),
  KEY `period1` (`period1`),
  KEY `period2` (`period2`),
  KEY `period3` (`period3`),
  KEY `period4` (`period4`),
  KEY `period5` (`period5`),
  KEY `period6` (`period6`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`id`, `batch`, `semester`, `day`, `period1`, `period2`, `period3`, `period4`, `period5`, `period6`) VALUES
(1, 1, 1, 'Monday', 8, 9, 10, 11, 12, 8);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`subj`) REFERENCES `subject_tb` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`batch`) REFERENCES `batch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `club_activity`
--
ALTER TABLE `club_activity`
  ADD CONSTRAINT `club_activity_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `club_activity_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_tb` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam_timetable`
--
ALTER TABLE `exam_timetable`
  ADD CONSTRAINT `exam_timetable_ibfk_1` FOREIGN KEY (`semester`) REFERENCES `semester_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_timetable_ibfk_2` FOREIGN KEY (`batch`) REFERENCES `batch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `note_tb`
--
ALTER TABLE `note_tb`
  ADD CONSTRAINT `note_tb_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject_tb` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_tb`
--
ALTER TABLE `subject_tb`
  ADD CONSTRAINT `subject_tb_ibfk_1` FOREIGN KEY (`faculty`) REFERENCES `faculty_tb` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_tb_ibfk_2` FOREIGN KEY (`semester`) REFERENCES `semester_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `submitted_assignment`
--
ALTER TABLE `submitted_assignment`
  ADD CONSTRAINT `submitted_assignment_ibfk_1` FOREIGN KEY (`student`) REFERENCES `student_signup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `submitted_assignment_ibfk_2` FOREIGN KEY (`topic`) REFERENCES `assignment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `syllabus_tb`
--
ALTER TABLE `syllabus_tb`
  ADD CONSTRAINT `syllabus_tb_ibfk_1` FOREIGN KEY (`subject`) REFERENCES `subject_tb` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `time_table`
--
ALTER TABLE `time_table`
  ADD CONSTRAINT `time_table_ibfk_1` FOREIGN KEY (`batch`) REFERENCES `batch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_2` FOREIGN KEY (`semester`) REFERENCES `semester_tb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_3` FOREIGN KEY (`period1`) REFERENCES `subject_tb` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_4` FOREIGN KEY (`period2`) REFERENCES `subject_tb` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_5` FOREIGN KEY (`period3`) REFERENCES `subject_tb` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_6` FOREIGN KEY (`period4`) REFERENCES `subject_tb` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_7` FOREIGN KEY (`period5`) REFERENCES `subject_tb` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `time_table_ibfk_8` FOREIGN KEY (`period6`) REFERENCES `subject_tb` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
