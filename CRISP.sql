-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2013 at 05:44 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crisp`
--

-- --------------------------------------------------------

--
-- Table structure for table `adept_student`
--

CREATE TABLE IF NOT EXISTS `adept_student` (
  `Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Control_Number` varchar(5) DEFAULT NULL,
  `Username` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Tracker_ID`),
  UNIQUE KEY `Tracker_ID_UNIQUE` (`Tracker_ID`),
  UNIQUE KEY `Control_Number_UNIQUE` (`Control_Number`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `adept_student`
--

INSERT INTO `adept_student` (`Tracker_ID`, `Control_Number`, `Username`) VALUES
(3, '2312', 'ara12'),
(4, '12312', 'joy32');

-- --------------------------------------------------------

--
-- Table structure for table `adept_t3_attendance`
--

CREATE TABLE IF NOT EXISTS `adept_t3_attendance` (
  `Adept_T3_Attendance_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Orientation_Day` datetime DEFAULT NULL,
  `Site_Visit` datetime DEFAULT NULL,
  `Day_1` datetime DEFAULT NULL,
  `Day_2` datetime DEFAULT NULL,
  `Day_3` datetime DEFAULT NULL,
  `Day_4` datetime DEFAULT NULL,
  `Day_5` datetime DEFAULT NULL,
  `Day_6` datetime DEFAULT NULL,
  `GCAT` datetime DEFAULT NULL,
  `Created_At` datetime NOT NULL,
  `Updated_At` datetime DEFAULT NULL,
  PRIMARY KEY (`Adept_T3_Attendance_ID`),
  UNIQUE KEY `Adept_T3_Attendance_ID_UNIQUE` (`Adept_T3_Attendance_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `adept_t3_attendance`
--

INSERT INTO `adept_t3_attendance` (`Adept_T3_Attendance_ID`, `Orientation_Day`, `Site_Visit`, `Day_1`, `Day_2`, `Day_3`, `Day_4`, `Day_5`, `Day_6`, `GCAT`, `Created_At`, `Updated_At`) VALUES
(1, '2012-08-01 00:00:00', '2012-08-02 00:00:00', '2012-08-03 00:00:00', '2012-08-04 00:00:00', '2012-08-04 00:00:00', '2012-08-05 00:00:00', '2012-08-06 00:00:00', '2012-08-07 00:00:00', '2012-08-09 00:00:00', '2012-08-10 00:00:00', '2012-08-11 00:00:00'),
(2, '2012-08-02 00:00:00', '2012-08-03 00:00:00', '2012-08-04 00:00:00', '2012-08-05 00:00:00', '2012-08-06 00:00:00', '2012-08-07 00:00:00', '2012-08-08 00:00:00', '2012-08-09 00:00:00', '2012-08-10 00:00:00', '2012-08-11 00:00:00', '2012-08-12 00:00:00'),
(3, '2012-08-03 00:00:00', '2012-08-04 00:00:00', '2012-08-05 00:00:00', '2012-08-06 00:00:00', '2012-08-07 00:00:00', '2012-08-08 00:00:00', '2012-08-09 00:00:00', '2012-08-10 00:00:00', '2012-08-11 00:00:00', '2012-08-12 00:00:00', '2012-08-13 00:00:00'),
(4, '2012-08-04 00:00:00', '2012-08-05 00:00:00', '2012-08-06 00:00:00', '2012-08-07 00:00:00', '2012-08-08 00:00:00', '2012-08-09 00:00:00', '2012-08-10 00:00:00', '2012-08-11 00:00:00', '2012-08-12 00:00:00', '2012-08-13 00:00:00', '2012-08-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `adept_t3_grades`
--

CREATE TABLE IF NOT EXISTS `adept_t3_grades` (
  `Adept_T3_Grades_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Adept_T3_Grades_ID`),
  UNIQUE KEY `Adept_T3_Grades_ID_UNIQUE` (`Adept_T3_Grades_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `adept_t3_grades`
--

INSERT INTO `adept_t3_grades` (`Adept_T3_Grades_ID`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `adept_t3_tracker`
--

CREATE TABLE IF NOT EXISTS `adept_t3_tracker` (
  `T3_Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Adept_T3_Grades_ID` int(11) NOT NULL,
  `Adept_T3_Attendance_ID` int(11) NOT NULL,
  `Interview_Form?` tinyint(1) NOT NULL DEFAULT '0',
  `Site_Visit_Form?` tinyint(1) NOT NULL DEFAULT '0',
  `Adept_T3_Feedback?` tinyint(1) NOT NULL DEFAULT '0',
  `Adept_E-Learning_Feedback` tinyint(1) NOT NULL DEFAULT '0',
  `Manual_&_Kit` tinyint(1) NOT NULL DEFAULT '0',
  `Certificate_Of_Attendance` tinyint(1) NOT NULL DEFAULT '0',
  `Adept_Certified_Trainers` tinyint(1) NOT NULL,
  `Lesson_Plan` double DEFAULT '0',
  `Demo` double DEFAULT '0',
  `Total_Weigthed` double DEFAULT '0',
  `Training_Portfolio` double DEFAULT '0',
  `Control_Number` varchar(5) DEFAULT NULL,
  `User_Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`T3_Tracker_ID`),
  UNIQUE KEY `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID`),
  UNIQUE KEY `Control_Number_UNIQUE` (`Control_Number`),
  UNIQUE KEY `User_Name_UNIQUE` (`User_Name`),
  KEY `fk_Adept_T3_Tracker_copy1_Adept_T3_Grades1_idx` (`Adept_T3_Grades_ID`),
  KEY `fk_Adept_T3_Tracker_copy1_Adept_T3_Attendance1_idx` (`Adept_T3_Attendance_ID`),
  KEY `fk_Adept_T3_Tracker_Teacher_Tracker1` (`T3_Tracker_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `adept_t3_tracker`
--

INSERT INTO `adept_t3_tracker` (`T3_Tracker_ID`, `Adept_T3_Grades_ID`, `Adept_T3_Attendance_ID`, `Interview_Form?`, `Site_Visit_Form?`, `Adept_T3_Feedback?`, `Adept_E-Learning_Feedback`, `Manual_&_Kit`, `Certificate_Of_Attendance`, `Adept_Certified_Trainers`, `Lesson_Plan`, `Demo`, `Total_Weigthed`, `Training_Portfolio`, `Control_Number`, `User_Name`) VALUES
(3, 1, 1, 1, 0, 1, 1, 0, 1, 0, 10.1, 12, 12.11, 12.1, 'aa3', 'jppp'),
(4, 2, 2, 1, 1, 1, 1, 0, 0, 1, 10.2, 12.1, 12.11, 12.14, 'aa4', 'jjds01');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `Application_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Answer_1` text,
  `Answer_2` text,
  `Contract?` tinyint(1) NOT NULL DEFAULT '0',
  `Date` datetime NOT NULL,
  `Created_At` datetime NOT NULL,
  `Updated_At` datetime DEFAULT NULL,
  PRIMARY KEY (`Application_ID`),
  UNIQUE KEY `Application_ID_UNIQUE` (`Application_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`Application_ID`, `Answer_1`, `Answer_2`, `Contract?`, `Date`, `Created_At`, `Updated_At`) VALUES
(1, 'Really', 'Good', 1, '2011-11-11 00:00:00', '2012-12-12 00:00:00', '2019-12-12 00:00:00'),
(2, 'No', 'Not Really', 0, '2011-11-21 00:00:00', '2012-12-16 00:00:00', '2013-12-12 00:00:00'),
(3, 'Going', 'There', 0, '2012-11-23 00:00:00', '2012-08-22 00:00:00', '2014-11-12 00:00:00'),
(4, 'Average', 'No', 1, '2012-11-15 00:00:00', '2014-12-12 00:00:00', '2016-06-05 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `best_adept_t3_application`
--

CREATE TABLE IF NOT EXISTS `best_adept_t3_application` (
  `T3_Application_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Answer_1` text,
  `Answer_2` text,
  `Answer_3` text,
  `Contract?` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`T3_Application_ID`),
  UNIQUE KEY `T3_Application_ID_UNIQUE` (`T3_Application_ID`),
  KEY `fk_Best_Adept_T3_Application_Teacher_Application1` (`T3_Application_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `best_adept_t3_application`
--

INSERT INTO `best_adept_t3_application` (`T3_Application_ID`, `Answer_1`, `Answer_2`, `Answer_3`, `Contract?`) VALUES
(4, 'Really', 'Some people', 'In a silver platter', 0),
(5, 'No one is shared', 'No one really cares', 'For them', 1),
(6, 'Diamond rings', 'Some just', 'want everything', 1);

-- --------------------------------------------------------

--
-- Table structure for table `best_student`
--

CREATE TABLE IF NOT EXISTS `best_student` (
  `Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Contol_Number` varchar(5) DEFAULT NULL,
  `Username` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Tracker_ID`),
  UNIQUE KEY `Tracker_ID_UNIQUE` (`Tracker_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `best_student`
--

INSERT INTO `best_student` (`Tracker_ID`, `Contol_Number`, `Username`) VALUES
(1, '12341', 'jpphil'),
(2, '54321', 'mac01');

-- --------------------------------------------------------

--
-- Table structure for table `best_t3_attendance`
--

CREATE TABLE IF NOT EXISTS `best_t3_attendance` (
  `Best_T3_Attendance_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Orientation_Day` datetime DEFAULT NULL,
  `Site_Visit` datetime DEFAULT NULL,
  `Day_1` datetime DEFAULT NULL,
  `Day_2` datetime DEFAULT NULL,
  `Day_3` datetime DEFAULT NULL,
  `Created_At` datetime NOT NULL,
  `Updated_At` datetime DEFAULT NULL,
  PRIMARY KEY (`Best_T3_Attendance_ID`),
  UNIQUE KEY `Best_T3_Attendance_ID_UNIQUE` (`Best_T3_Attendance_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `best_t3_attendance`
--

INSERT INTO `best_t3_attendance` (`Best_T3_Attendance_ID`, `Orientation_Day`, `Site_Visit`, `Day_1`, `Day_2`, `Day_3`, `Created_At`, `Updated_At`) VALUES
(1, '2011-11-12 00:00:00', '2011-11-14 00:00:00', '2011-11-01 00:00:00', '2011-11-02 00:00:00', '2011-11-03 00:00:00', '2011-12-12 00:00:00', '2011-12-10 00:00:00'),
(2, '2011-11-14 00:00:00', '2011-11-15 00:00:00', '2011-11-02 00:00:00', '2011-11-04 00:00:00', '2011-11-05 00:00:00', '2012-01-01 00:00:00', '2012-01-02 00:00:00'),
(3, '2011-11-03 00:00:00', '2011-11-02 00:00:00', '2011-11-06 00:00:00', '2011-11-07 00:00:00', '2011-11-08 00:00:00', '2011-11-09 00:00:00', '2011-11-10 00:00:00'),
(4, '2012-08-01 00:00:00', '2012-08-02 00:00:00', '2012-08-03 00:00:00', '2012-08-04 00:00:00', '2012-08-05 00:00:00', '2012-08-06 00:00:00', '2012-08-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `best_t3_grades`
--

CREATE TABLE IF NOT EXISTS `best_t3_grades` (
  `Best_T3_Grades_ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Best_T3_Grades_ID`),
  UNIQUE KEY `Best_T3_Grades_ID_UNIQUE` (`Best_T3_Grades_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `best_t3_grades`
--

INSERT INTO `best_t3_grades` (`Best_T3_Grades_ID`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `best_t3_tracker`
--

CREATE TABLE IF NOT EXISTS `best_t3_tracker` (
  `T3_Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Best_T3_Attendance_ID` int(11) NOT NULL,
  `Interview_Form?` tinyint(1) NOT NULL DEFAULT '0',
  `Site_Visit_Form?` tinyint(1) NOT NULL DEFAULT '0',
  `Best_T3_Feedback?` tinyint(1) NOT NULL DEFAULT '0',
  `Best_E-Learning_Feedback` tinyint(1) NOT NULL DEFAULT '0',
  `Best_CD` tinyint(1) NOT NULL DEFAULT '0',
  `Certificate_Of_Attendance` tinyint(1) NOT NULL DEFAULT '0',
  `Best_Certified_Trainers` tinyint(1) NOT NULL DEFAULT '0',
  `Task_1` double DEFAULT '0',
  `Task_2` double DEFAULT '0',
  `Task_3` double DEFAULT '0',
  `Task_4` double DEFAULT '0',
  `Best_T3_Grades_ID` int(11) NOT NULL,
  `Control_Number` varchar(5) DEFAULT NULL,
  `User_Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`T3_Tracker_ID`),
  UNIQUE KEY `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID`),
  UNIQUE KEY `Control_Number_UNIQUE` (`Control_Number`),
  UNIQUE KEY `User_Name_UNIQUE` (`User_Name`),
  KEY `fk_Adept_T3_Tracker_Best_T3_Attendance1_idx` (`Best_T3_Attendance_ID`),
  KEY `fk_Adept_T3_Tracker_Best_T3_Grades1_idx` (`Best_T3_Grades_ID`),
  KEY `fk_Best_T3_Tracker_Teacher_Tracker1` (`T3_Tracker_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `best_t3_tracker`
--

INSERT INTO `best_t3_tracker` (`T3_Tracker_ID`, `Best_T3_Attendance_ID`, `Interview_Form?`, `Site_Visit_Form?`, `Best_T3_Feedback?`, `Best_E-Learning_Feedback`, `Best_CD`, `Certificate_Of_Attendance`, `Best_Certified_Trainers`, `Task_1`, `Task_2`, `Task_3`, `Task_4`, `Best_T3_Grades_ID`, `Control_Number`, `User_Name`) VALUES
(7, 1, 0, 1, 1, 0, 1, 0, 1, 12.1, 21.1, 221.1, 12311, 1, '1231', 'jppp'),
(8, 2, 0, 1, 1, 1, 1, 0, 1, 13.1, 321.3, 23.1, 224.2, 2, '1211', 'fllr01');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `Class_ID` int(11) NOT NULL AUTO_INCREMENT,
  `School_Year` varchar(10) NOT NULL,
  `Semester` int(11) NOT NULL,
  `School_ID` int(11) NOT NULL,
  `Subject_ID` int(11) NOT NULL,
  PRIMARY KEY (`Class_ID`),
  UNIQUE KEY `Class_ID_UNIQUE` (`Class_ID`),
  KEY `fk_Section_School2` (`School_ID`),
  KEY `fk_Class_Subject1_idx` (`Subject_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Class_ID`, `School_Year`, `Semester`, `School_ID`, `Subject_ID`) VALUES
(1, '2012-2013', 1, 1, 1),
(2, '2011-2012', 2, 2, 1),
(3, '1993-1994', 3, 3, 2),
(4, '1992-1993', 4, 1, 4),
(5, '1992-1993', 2, 1, 2),
(6, '1992-1993', 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `computer_skills`
--

CREATE TABLE IF NOT EXISTS `computer_skills` (
  `Computer_Skills_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`Computer_Skills_ID`),
  UNIQUE KEY `Computer_Skills_ID_UNIQUE` (`Computer_Skills_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `computer_skills`
--

INSERT INTO `computer_skills` (`Computer_Skills_ID`, `Name`) VALUES
(1, 'Encoding'),
(2, 'Java'),
(3, 'C++'),
(4, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `gcat_class`
--

CREATE TABLE IF NOT EXISTS `gcat_class` (
  `Class_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Proctor_ID` int(11) NOT NULL,
  PRIMARY KEY (`Class_ID`),
  UNIQUE KEY `Class_ID_UNIQUE` (`Class_ID`),
  KEY `fk_GCAT_Class_Proctor1_idx` (`Proctor_ID`),
  KEY `fk_GCAT_Class_Class1_idx` (`Class_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gcat_class`
--

INSERT INTO `gcat_class` (`Class_ID`, `Proctor_ID`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gcat_student`
--

CREATE TABLE IF NOT EXISTS `gcat_student` (
  `Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GCAT_Total_Cognitive` int(11) NOT NULL DEFAULT '0',
  `GCAT_Responsiveness` int(11) NOT NULL DEFAULT '0',
  `GCAT_Reliability` int(11) NOT NULL DEFAULT '0',
  `GCAT_Empathy` int(11) NOT NULL DEFAULT '0',
  `GCAT_Courtesy` int(11) NOT NULL DEFAULT '0',
  `GCAT_Learning_Orientation` int(11) NOT NULL DEFAULT '0',
  `GCAT_Communication` int(11) NOT NULL DEFAULT '0',
  `GCAT_Behavioral_Component_Overall_Score` int(11) NOT NULL DEFAULT '0',
  `GCAT_Perceptual_Speed_&_Accuracy` int(11) NOT NULL DEFAULT '0',
  `GCAT_Computer_Literacy` int(11) NOT NULL DEFAULT '0',
  `GCAT_English_Proficiency` int(11) NOT NULL DEFAULT '0',
  `GCAT_Basic_Skills_Test_Overall_Score` int(11) NOT NULL DEFAULT '0',
  `Session_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Tracker_ID`),
  UNIQUE KEY `Session_ID_UNIQUE` (`Session_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `gcat_student`
--

INSERT INTO `gcat_student` (`Tracker_ID`, `GCAT_Total_Cognitive`, `GCAT_Responsiveness`, `GCAT_Reliability`, `GCAT_Empathy`, `GCAT_Courtesy`, `GCAT_Learning_Orientation`, `GCAT_Communication`, `GCAT_Behavioral_Component_Overall_Score`, `GCAT_Perceptual_Speed_&_Accuracy`, `GCAT_Computer_Literacy`, `GCAT_English_Proficiency`, `GCAT_Basic_Skills_Test_Overall_Score`, `Session_ID`) VALUES
(5, 4, 2, 4, 3, 2, 5, 6, 5, 2, 4, 2, 5, 'aa1'),
(6, 6, 5, 4, 2, 9, 8, 4, 5, 6, 9, 3, 8, 'aa2');

-- --------------------------------------------------------

--
-- Table structure for table `gcat_t3_class`
--

CREATE TABLE IF NOT EXISTS `gcat_t3_class` (
  `T3_Class_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Proctor_ID` int(11) NOT NULL,
  PRIMARY KEY (`T3_Class_ID`),
  UNIQUE KEY `T3_Class_ID_UNIQUE` (`T3_Class_ID`),
  KEY `fk_GCAT_Class_Class1_idx` (`T3_Class_ID`),
  KEY `fk_GCAT_Class_copy1_Proctor1_idx` (`Proctor_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gcat_t3_class`
--

INSERT INTO `gcat_t3_class` (`T3_Class_ID`, `Proctor_ID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `gcat_tracker`
--

CREATE TABLE IF NOT EXISTS `gcat_tracker` (
  `T3_Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GCAT_Basic_Skills_Test_Overall_Score` int(11) NOT NULL DEFAULT '0',
  `GCAT_Total_Cognitive` int(11) NOT NULL DEFAULT '0',
  `GCAT_English_Proficiency` int(11) NOT NULL DEFAULT '0',
  `GCAT_Computer_Literacy` int(11) NOT NULL DEFAULT '0',
  `GCAT_Perceptual_Speed_&_Accuracy` int(11) NOT NULL DEFAULT '0',
  `GCAT_Behavioral_Component_Overall_Score` int(11) NOT NULL DEFAULT '0',
  `GCAT_Communication` int(11) NOT NULL DEFAULT '0',
  `GCAT_Learning_Orientation` int(11) NOT NULL DEFAULT '0',
  `GCAT_Courtesy` int(11) NOT NULL DEFAULT '0',
  `GCAT_Empathy` int(11) NOT NULL DEFAULT '0',
  `GCAT_Reliability` int(11) NOT NULL DEFAULT '0',
  `GCAT_Responsiveness` int(11) NOT NULL DEFAULT '0',
  `Session_ID` varchar(45) NOT NULL,
  PRIMARY KEY (`T3_Tracker_ID`),
  UNIQUE KEY `Session_ID_UNIQUE` (`Session_ID`),
  UNIQUE KEY `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID`),
  KEY `fk_GCAT_T3_Tracker_Teacher_Tracker1` (`T3_Tracker_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gcat_tracker`
--

INSERT INTO `gcat_tracker` (`T3_Tracker_ID`, `GCAT_Basic_Skills_Test_Overall_Score`, `GCAT_Total_Cognitive`, `GCAT_English_Proficiency`, `GCAT_Computer_Literacy`, `GCAT_Perceptual_Speed_&_Accuracy`, `GCAT_Behavioral_Component_Overall_Score`, `GCAT_Communication`, `GCAT_Learning_Orientation`, `GCAT_Courtesy`, `GCAT_Empathy`, `GCAT_Reliability`, `GCAT_Responsiveness`, `Session_ID`) VALUES
(1, 3, 2, 4, 3, 4, 4, 3, 2, 6, 8, 7, 5, 'aa1'),
(2, 7, 9, 8, 7, 6, 5, 6, 9, 7, 6, 8, 9, 'aa2');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `Log_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Made_By` varchar(100) NOT NULL,
  `Changes` text NOT NULL,
  `Created_At` datetime NOT NULL,
  PRIMARY KEY (`Log_ID`),
  UNIQUE KEY `Log_ID_UNIQUE` (`Log_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`Log_ID`, `Made_By`, `Changes`, `Created_At`) VALUES
(1, 'John Mayer', 'Add Teacher', '2012-11-15 00:00:00'),
(2, 'Whiz Khaliffa', 'Add Student', '2011-11-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `master trainer`
--

CREATE TABLE IF NOT EXISTS `master trainer` (
  `Master_Trainer_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Last_Name` varchar(45) NOT NULL,
  `First_Name` varchar(45) NOT NULL,
  `Middle_Initial` varchar(3) NOT NULL,
  `Name_Suffix` varchar(4) DEFAULT NULL,
  `Company_Name` varchar(100) NOT NULL,
  `Company_Address` text NOT NULL,
  `Position` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Facebook` varchar(45) DEFAULT NULL,
  `Landline` varchar(9) NOT NULL,
  `Mobile_Number` varchar(13) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Civil_Status` varchar(9) NOT NULL DEFAULT 'Single',
  PRIMARY KEY (`Master_Trainer_ID`),
  UNIQUE KEY `Master_Trainer_ID_UNIQUE` (`Master_Trainer_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `master trainer`
--

INSERT INTO `master trainer` (`Master_Trainer_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Company_Name`, `Company_Address`, `Position`, `Email`, `Facebook`, `Landline`, `Mobile_Number`, `Gender`, `Civil_Status`) VALUES
(1, 'Peralta', 'Zara', 'A', NULL, 'GDP', 'Basco, Batanes', 'President', 'zara@gmail.com', 'zara', '323413', '09174628234', 'F', 'Single'),
(2, 'Go', 'Amiel', 'B', 'Jr', 'AMF', 'Mindanao Avenue', 'Secretary', 'amiel@gmail.com', 'amiel', '343414', '09124834321', 'M', 'Married'),
(3, 'Mandela', 'Nelson ', 'C', NULL, 'MDA', 'Africa, South Africa', 'President', 'nm@yahoo.com', NULL, '432422', '29482020392', 'M', 'Single'),
(4, 'Razon', 'Henedina', 'B', NULL, 'MDJG', 'Basco, Batanes', 'Congressman', 'ha@gmail.com', NULL, '349382', '09832382828', 'F', 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `organization_affiliations`
--

CREATE TABLE IF NOT EXISTS `organization_affiliations` (
  `Organization_Affiliations_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Position` varchar(45) NOT NULL,
  `Years_Affiliated` int(11) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Organization_Affiliations_ID`),
  UNIQUE KEY `Organization_Affiliations_ID_UNIQUE` (`Organization_Affiliations_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `organization_affiliations`
--

INSERT INTO `organization_affiliations` (`Organization_Affiliations_ID`, `Name`, `Position`, `Years_Affiliated`, `Description`) VALUES
(1, 'Globe', 'President', 1, 'The Best'),
(2, 'Smart', 'Chairman', 3, 'Master'),
(3, 'Sun Cellular', 'CEO', 3, 'Apprentice'),
(4, 'PLDT', 'COO', 3, 'Connected');

-- --------------------------------------------------------

--
-- Table structure for table `other_class`
--

CREATE TABLE IF NOT EXISTS `other_class` (
  `Class_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Class_ID`),
  UNIQUE KEY `Class_ID_UNIQUE` (`Class_ID`),
  KEY `fk_Other_Class_Class1_idx` (`Class_ID`),
  KEY `fk_Other_Class_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `other_class`
--

INSERT INTO `other_class` (`Class_ID`, `Name`, `Teacher_ID`) VALUES
(3, 'BPO101', 1),
(4, 'BPO102', 2),
(5, 'BPO103', 3),
(6, 'BPO104', 4);

-- --------------------------------------------------------

--
-- Table structure for table `other_t3_class`
--

CREATE TABLE IF NOT EXISTS `other_t3_class` (
  `T3_Class_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Master_Trainer_ID` int(11) NOT NULL,
  PRIMARY KEY (`T3_Class_ID`),
  UNIQUE KEY `T3_Class_ID_UNIQUE` (`T3_Class_ID`),
  KEY `fk_Other_Class_Class1_idx` (`T3_Class_ID`),
  KEY `fk_Other_T3_Class_Master Trainer1_idx` (`Master_Trainer_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `other_t3_class`
--

INSERT INTO `other_t3_class` (`T3_Class_ID`, `Name`, `Master_Trainer_ID`) VALUES
(5, 'BPO1', 1),
(6, 'BPO2', 2),
(7, 'BPO3', 3),
(8, 'English', 4);

-- --------------------------------------------------------

--
-- Table structure for table `proctor`
--

CREATE TABLE IF NOT EXISTS `proctor` (
  `Proctor_ID` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(45) NOT NULL,
  `Middle_Initial` varchar(5) NOT NULL,
  `Last_Name` varchar(45) NOT NULL,
  `Name_Suffix` varchar(4) DEFAULT NULL,
  `Company_Name` varchar(45) NOT NULL,
  `Company_Address` varchar(255) NOT NULL,
  `Position` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Facebook` varchar(45) DEFAULT NULL,
  `Landline` varchar(9) NOT NULL,
  `Mobile_Number` varchar(13) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Civil_Status` varchar(9) NOT NULL DEFAULT 'Single',
  PRIMARY KEY (`Proctor_ID`),
  UNIQUE KEY `Proctor_ID_UNIQUE` (`Proctor_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `proctor`
--

INSERT INTO `proctor` (`Proctor_ID`, `First_Name`, `Middle_Initial`, `Last_Name`, `Name_Suffix`, `Company_Name`, `Company_Address`, `Position`, `Email`, `Facebook`, `Landline`, `Mobile_Number`, `Gender`, `Civil_Status`) VALUES
(1, 'John', 'A', 'Cruz', 'Jr.', 'Ateneo De Manila', 'Katipunan Avenue', 'President', 'jpc@gmail.com', 'John', '4311231', '09186542342', 'M', 'Married'),
(2, 'Christal', 'B', 'Marcos', NULL, 'De La Salle', 'Taft Avenue', 'Vice President', 'c@yahoo.com', NULL, '3242412', '09159403688', 'F', 'Single'),
(3, 'Eyana', 'C', 'Diana', 'II', 'Makati Business Club', 'Ayala Avenue, Makati', 'Secretary', 'ey@hotmail.com', 'Eyana', '3241412', '09124234231', 'F', 'Separated'),
(4, 'Milo', 'B', 'Conception', NULL, 'SM', 'Pasay City, Philippines', 'Treasurer', 'sm@yahoo.com', 'Milo', '2342431', '09121834281', 'M', 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `Project_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) NOT NULL,
  `Institution` varchar(250) NOT NULL,
  `Year_Implemented` int(11) DEFAULT NULL,
  PRIMARY KEY (`Project_ID`),
  UNIQUE KEY `Project_ID_UNIQUE` (`Project_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Project_ID`, `Name`, `Institution`, `Year_Implemented`) VALUES
(1, 'Joan Magno', 'CMLI', 2012),
(2, 'Janella Ongcol', 'ADMU', 1999),
(3, 'Sam Tan', 'GMA', 2005),
(4, 'Aaron Ormoc', 'Adidas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `related_trainings_attended`
--

CREATE TABLE IF NOT EXISTS `related_trainings_attended` (
  `Related_Trainings_Attended_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Training` varchar(45) NOT NULL,
  `Training_Body` varchar(250) NOT NULL,
  `Training_Date` datetime NOT NULL,
  PRIMARY KEY (`Related_Trainings_Attended_ID`),
  UNIQUE KEY `Related_Trainings_Attended_ID_UNIQUE` (`Related_Trainings_Attended_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `related_trainings_attended`
--

INSERT INTO `related_trainings_attended` (`Related_Trainings_Attended_ID`, `Training`, `Training_Body`, `Training_Date`) VALUES
(1, 'Cooking', 'CHED', '2012-11-11 00:00:00'),
(2, 'Programming', 'Ateneo', '1993-12-11 00:00:00'),
(3, 'Teaching', 'CHED', '1992-12-01 00:00:00'),
(4, 'Visual Aid', 'Visual Aid Body', '1992-11-02 00:00:00'),
(5, 'Fashion', 'Fashion Body', '2012-11-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `related_trainings_attended_by_a_teacher`
--

CREATE TABLE IF NOT EXISTS `related_trainings_attended_by_a_teacher` (
  `Related_Trainings_Attended_By_A_Teacher` int(11) NOT NULL AUTO_INCREMENT,
  `Related_Trainings_Attended_ID` int(11) NOT NULL,
  `SMP_T3_Application_ID` int(11) NOT NULL,
  PRIMARY KEY (`Related_Trainings_Attended_By_A_Teacher`),
  UNIQUE KEY `Related_Trainings_Attended_By_A_Teacher_UNIQUE` (`Related_Trainings_Attended_By_A_Teacher`),
  KEY `fk_Related_Trainings_Attended_By_A_Teacher_Related_Training_idx` (`Related_Trainings_Attended_ID`),
  KEY `fk_Related_Trainings_Attended_By_A_Teacher_SMP_T3_Applicati_idx` (`SMP_T3_Application_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `related_trainings_attended_by_a_teacher`
--

INSERT INTO `related_trainings_attended_by_a_teacher` (`Related_Trainings_Attended_By_A_Teacher`, `Related_Trainings_Attended_ID`, `SMP_T3_Application_ID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 1),
(5, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `School_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Address` text NOT NULL,
  `Landline` varchar(9) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Point Person` varchar(45) NOT NULL,
  `Point_Person_Contact` varchar(13) NOT NULL,
  `Updated_At` datetime DEFAULT NULL,
  `Created_At` datetime NOT NULL,
  `Code` varchar(10) NOT NULL,
  `Branch` varchar(45) NOT NULL,
  PRIMARY KEY (`School_ID`),
  UNIQUE KEY `School_ID_UNIQUE` (`School_ID`),
  UNIQUE KEY `Code_UNIQUE` (`Code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES
(1, 'Polytechnic University of the Philippines', 'Quezon City', '4101111', 'pup@gmail.com', 'Raymond Cruz', '09151234567', '2012-12-09 00:32:22', '2012-12-12 00:32:22', '123456', 'Manila'),
(2, 'Ateneo de Manila University', 'Quezon City', '4102222', 'ateneo@gmail.com', 'Michelle Armario', '09129876789', '2012-12-10 00:32:22', '2012-12-12 00:32:22', '431243', 'Quezon City'),
(3, 'De La Salle', 'Manila City', '3212222', 'lasalle@gmail.com', 'Michael Tan', '09182341234', '2011-12-11 00:32:22', '2011-10-31 00:32:22', '23412', 'Manila'),
(4, 'CSA', 'Makati', '3232123', 'csa@yahoo.com', 'Joan Joner', '09182483211', '2011-12-12 00:00:00', '2012-10-11 00:00:00', 'SSD121', 'Makati');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `Skills_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`Skills_ID`),
  UNIQUE KEY `Skills_ID_UNIQUE` (`Skills_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`Skills_ID`, `Name`) VALUES
(1, 'Bar Tending'),
(2, 'Singing'),
(3, 'Guitar Playing'),
(4, 'Dancing');

-- --------------------------------------------------------

--
-- Table structure for table `smp_student`
--

CREATE TABLE IF NOT EXISTS `smp_student` (
  `Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Grade` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`Tracker_ID`),
  UNIQUE KEY `Tracker_ID_UNIQUE` (`Tracker_ID`),
  KEY `fk_SMP_Student_Tracker1_idx` (`Tracker_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `smp_student`
--

INSERT INTO `smp_student` (`Tracker_ID`, `Grade`) VALUES
(7, '43'),
(8, '32');

-- --------------------------------------------------------

--
-- Table structure for table `smp_student_courses_taken`
--

CREATE TABLE IF NOT EXISTS `smp_student_courses_taken` (
  `SMP_Student_Courses_Taken_ID` varchar(45) NOT NULL,
  `Student_Class_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tracker_ID` int(11) NOT NULL,
  PRIMARY KEY (`SMP_Student_Courses_Taken_ID`),
  UNIQUE KEY `Student_Class_Student_Class_ID_UNIQUE` (`Student_Class_ID`),
  KEY `fk_SMP_Student_Courses_Taken_Student_Class1` (`Student_Class_ID`),
  KEY `fk_SMP_Student_Courses_Taken_SMP_Student1` (`Tracker_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `smp_student_courses_taken`
--

INSERT INTO `smp_student_courses_taken` (`SMP_Student_Courses_Taken_ID`, `Student_Class_ID`, `Tracker_ID`) VALUES
('1', 1, 7),
('2', 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `smp_t3_application`
--

CREATE TABLE IF NOT EXISTS `smp_t3_application` (
  `T3_Application_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Answer_1` text,
  `Answer_2` text,
  `Answer_3` text,
  `Total_Numbers_Of_Subjects_Handled` int(11) NOT NULL,
  `Years_Teaching` int(11) NOT NULL,
  `Years_Teaching_In_Current_Institution` int(11) NOT NULL,
  `Avg_Student_Per_Class` int(11) NOT NULL,
  `Support_Offices_Available` text,
  `Instructional_Materials_Support` text,
  `Technology_Support` text,
  `Readily_Use_Lab?` tinyint(1) NOT NULL DEFAULT '0',
  `Internet_Services?` tinyint(1) NOT NULL DEFAULT '0',
  `Self_Assessment_Form_Business_Communication` tinyint(1) NOT NULL DEFAULT '0',
  `Self_Assessment_Form_Service_Culture` tinyint(1) NOT NULL DEFAULT '0',
  `Contract?` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`T3_Application_ID`),
  UNIQUE KEY `T3_Application_ID_UNIQUE` (`T3_Application_ID`),
  KEY `fk_SMP_T3_Application_Teacher_Application1` (`T3_Application_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `smp_t3_application`
--

INSERT INTO `smp_t3_application` (`T3_Application_ID`, `Answer_1`, `Answer_2`, `Answer_3`, `Total_Numbers_Of_Subjects_Handled`, `Years_Teaching`, `Years_Teaching_In_Current_Institution`, `Avg_Student_Per_Class`, `Support_Offices_Available`, `Instructional_Materials_Support`, `Technology_Support`, `Readily_Use_Lab?`, `Internet_Services?`, `Self_Assessment_Form_Business_Communication`, `Self_Assessment_Form_Service_Culture`, `Contract?`) VALUES
(1, 'Yes', 'No', 'Yes', 123, 2, 3, 32, 'No.', 'Books', 'Computer', 0, 1, 1, 0, 1),
(2, 'Yes', 'No', 'I don''t', 232, 2, 24, 3, 'YES.', 'IPAD', 'Notebook', 0, 0, 1, 1, 0),
(3, 'No', 'No', 'No', 2, 33, 3, 20, 'No', 'None', 'None', 0, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `smp_t3_attendance`
--

CREATE TABLE IF NOT EXISTS `smp_t3_attendance` (
  `SMP_T3_Attendance_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Time_In?` tinyint(1) NOT NULL DEFAULT '0',
  `AM_Snack?` tinyint(1) NOT NULL DEFAULT '0',
  `Lunch?` tinyint(1) NOT NULL DEFAULT '0',
  `PM_Snack?` tinyint(1) NOT NULL DEFAULT '0',
  `Time_Out?` tinyint(1) NOT NULL DEFAULT '0',
  `Date` datetime NOT NULL,
  `Created_At` datetime NOT NULL,
  `Updated_At` datetime DEFAULT NULL,
  PRIMARY KEY (`SMP_T3_Attendance_ID`),
  UNIQUE KEY `SMP_T3_Attendance_ID_UNIQUE` (`SMP_T3_Attendance_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `smp_t3_attendance`
--

INSERT INTO `smp_t3_attendance` (`SMP_T3_Attendance_ID`, `Time_In?`, `AM_Snack?`, `Lunch?`, `PM_Snack?`, `Time_Out?`, `Date`, `Created_At`, `Updated_At`) VALUES
(1, 1, 1, 1, 0, 0, '2012-11-11 00:00:00', '2011-11-01 00:00:00', '2011-11-02 00:00:00'),
(2, 0, 0, 0, 0, 0, '2011-11-09 00:00:00', '2011-11-01 00:00:00', '2011-11-12 00:00:00'),
(3, 1, 0, 1, 0, 1, '2011-11-12 00:00:00', '2011-11-23 00:00:00', '2011-11-12 00:00:00'),
(4, 0, 1, 0, 1, 0, '2011-11-12 00:00:00', '2011-11-14 00:00:00', '2011-11-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `smp_t3_attendance_tracking`
--

CREATE TABLE IF NOT EXISTS `smp_t3_attendance_tracking` (
  `SMP_T3_Attendance_Tracking_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Event` varchar(100) NOT NULL,
  `SMP_T3_Attendance_ID` int(11) NOT NULL,
  `T3_Tracker_ID` int(11) NOT NULL,
  PRIMARY KEY (`SMP_T3_Attendance_Tracking_ID`),
  UNIQUE KEY `SMP_T3_Attendance_Tracking_ID_UNIQUE` (`SMP_T3_Attendance_Tracking_ID`),
  KEY `fk_SMP_T3_Attendance_Tracking_SMP_T3_Attendance1_idx` (`SMP_T3_Attendance_ID`),
  KEY `fk_SMP_T3_Attendance_Tracking_SMP_T3_Tracker1` (`T3_Tracker_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `smp_t3_attendance_tracking`
--

INSERT INTO `smp_t3_attendance_tracking` (`SMP_T3_Attendance_Tracking_ID`, `Event`, `SMP_T3_Attendance_ID`, `T3_Tracker_ID`) VALUES
(1, 'Dance ', 1, 5),
(2, 'Singing', 2, 5),
(3, 'Cooking', 3, 6),
(4, 'Skateboarding', 4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `smp_t3_site_visit`
--

CREATE TABLE IF NOT EXISTS `smp_t3_site_visit` (
  `SMP_T3_Site_Visit_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Training_Location` varchar(45) NOT NULL,
  `Company_Host` varchar(45) NOT NULL,
  `Event_Date` datetime NOT NULL,
  `Feedback_Form?` tinyint(1) NOT NULL DEFAULT '0',
  `Created_At` datetime NOT NULL,
  `Updated_At` datetime DEFAULT NULL,
  PRIMARY KEY (`SMP_T3_Site_Visit_ID`),
  UNIQUE KEY `SMP_T3_Site_Visit_ID_UNIQUE` (`SMP_T3_Site_Visit_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `smp_t3_site_visit`
--

INSERT INTO `smp_t3_site_visit` (`SMP_T3_Site_Visit_ID`, `Training_Location`, `Company_Host`, `Event_Date`, `Feedback_Form?`, `Created_At`, `Updated_At`) VALUES
(1, 'Quezon City', 'Ateneo', '2011-11-12 00:00:00', 0, '2011-11-12 00:00:00', '2011-11-26 00:00:00'),
(2, 'Manila City', 'La Salle', '2011-11-21 00:00:00', 1, '2011-11-21 00:00:00', '2011-11-16 00:00:00'),
(3, 'Manila CIty', 'PUP', '2011-11-19 00:00:00', 0, '2011-09-11 00:00:00', '2011-04-11 00:00:00'),
(4, 'Makati City', 'CSA', '2012-11-13 00:00:00', 1, '2014-08-09 00:00:00', '2015-09-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `smp_t3_tracker`
--

CREATE TABLE IF NOT EXISTS `smp_t3_tracker` (
  `T3_Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SMP_T3_Site_Visit_ID` int(11) NOT NULL,
  PRIMARY KEY (`T3_Tracker_ID`),
  UNIQUE KEY `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID`),
  KEY `fk_SMP_T3_Tracker_SMP_T3_Site_Visit1` (`SMP_T3_Site_Visit_ID`),
  KEY `fk_SMP_T3_Tracker_T3_Tracker1_idx` (`T3_Tracker_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `smp_t3_tracker`
--

INSERT INTO `smp_t3_tracker` (`T3_Tracker_ID`, `SMP_T3_Site_Visit_ID`) VALUES
(5, 1),
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `Status_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  PRIMARY KEY (`Status_ID`),
  UNIQUE KEY `Status_ID_UNIQUE` (`Status_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Status_ID`, `Name`) VALUES
(1, 'Pass'),
(2, 'Fail');

-- --------------------------------------------------------

--
-- Table structure for table `stipend_tracking`
--

CREATE TABLE IF NOT EXISTS `stipend_tracking` (
  `Stipend_Tracking_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Amount` double NOT NULL DEFAULT '0',
  `Claimed?` tinyint(1) NOT NULL DEFAULT '0',
  `Created_At` datetime NOT NULL,
  `Updated_At` datetime DEFAULT NULL,
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Stipend_Tracking_ID`),
  KEY `fk_Stipend_Tracking_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stipend_tracking`
--

INSERT INTO `stipend_tracking` (`Stipend_Tracking_ID`, `Amount`, `Claimed?`, `Created_At`, `Updated_At`, `Teacher_ID`) VALUES
(1, 1000, 0, '2011-12-12 00:00:00', '2013-12-11 00:00:00', 1),
(2, 2123.23, 1, '2010-12-31 00:00:00', '2011-09-11 00:00:00', 2),
(3, 21231123, 0, '2011-12-21 00:00:00', '2013-09-15 00:00:00', 3),
(4, 7563, 1, '2009-09-09 00:00:00', '2012-11-18 00:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `stipend_tracking_list`
--

CREATE TABLE IF NOT EXISTS `stipend_tracking_list` (
  `Stipend_Tracking_List_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` varchar(45) NOT NULL,
  `Checked_By` varchar(100) NOT NULL,
  `Stipend_Tracking_ID` int(11) NOT NULL,
  `Subject_ID` int(11) NOT NULL,
  PRIMARY KEY (`Stipend_Tracking_List_ID`),
  KEY `fk_Stipend_Tracking_List_Stipend_Tracking1_idx` (`Stipend_Tracking_ID`),
  KEY `fk_Stipend_Tracking_List_Subject_ID1_idx` (`Subject_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stipend_tracking_list`
--

INSERT INTO `stipend_tracking_list` (`Stipend_Tracking_List_ID`, `Date`, `Checked_By`, `Stipend_Tracking_ID`, `Subject_ID`) VALUES
(1, '2012-12-11', 'Joy', 1, 1),
(2, '2012-12-13', 'RJ', 1, 2),
(3, '2012-12-11', 'Mike', 2, 2),
(4, '2013-01-01', 'John', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Student_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Last_Name` varchar(45) NOT NULL,
  `First_Name` varchar(45) NOT NULL,
  `Middle_Initial` varchar(4) NOT NULL,
  `Name_Suffix` varchar(5) DEFAULT NULL,
  `Student_ID_Number` varchar(10) NOT NULL,
  `Civil_Status` varchar(9) NOT NULL DEFAULT 'Single',
  `Birthdate` datetime NOT NULL,
  `Birthplace` varchar(45) NOT NULL DEFAULT 'Philippines',
  `Gender` char(1) NOT NULL,
  `Nationality` varchar(45) NOT NULL DEFAULT 'Filipino',
  `Street_Number` varchar(5) NOT NULL,
  `Street_Name` varchar(45) NOT NULL,
  `City` varchar(45) NOT NULL,
  `Province` varchar(45) NOT NULL,
  `Region` varchar(45) NOT NULL,
  `Alternate_Address` text,
  `Mobile_Number` varchar(13) NOT NULL,
  `Landline` varchar(9) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Facebook` varchar(45) DEFAULT NULL,
  `Course` varchar(100) NOT NULL,
  `Year` int(11) NOT NULL,
  `School_ID` int(11) NOT NULL,
  `Expected_Year_of_Graduation` int(11) NOT NULL,
  `DOST_Scholar?` tinyint(1) NOT NULL DEFAULT '0',
  `Scholar?` tinyint(1) NOT NULL DEFAULT '0',
  `Interested_in_IT-BPO?` text,
  `Own_A_Compter?` tinyint(1) NOT NULL DEFAULT '0',
  `Internet_Access?` tinyint(1) NOT NULL DEFAULT '0',
  `Code` varchar(15) NOT NULL,
  PRIMARY KEY (`Student_ID`),
  UNIQUE KEY `Student_ID_UNIQUE` (`Student_ID`),
  KEY `fk_Student_School1` (`School_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `School_ID`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES
(1, 'Federico', 'Joy', 'H', 'II', '102222', 'Single', '1991-10-10 00:00:00', 'Beijing, China', 'F', 'Filipino', '8', 'Concorde', 'Caloocan City', 'Metro Manila', 'NCR', 'Commonwealth, Quezon City', '09152341231', '4321234', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 1, 2013, 0, 0, 'Not Really', 0, 0, '12345'),
(2, 'Fajardo', 'Francis', 'J', 'III', '132123', 'Single', '1990-12-12 00:00:00', 'Quezon City', 'M', 'Filipino', '2', 'Civic', 'Quezon City', 'Metro Manila', 'NCR', 'Caloocan City', '09138312341', '4312312', 'francis@gmail.com', 'Francis Yo', 'BS Management', 3, 2, 2014, 0, 1, 'Yes.', 0, 1, '32333'),
(3, 'Cruz', 'Raymond', 'M', 'Jr', '243121', 'Single', '1991-12-11 00:00:00', 'Manila City', 'M', 'Russian', '3', 'Malakas', 'San Juan City', 'Metro Manila', 'NCR', 'Bonifacio Global City', '09135823842', '9384913', 'rj@yahoo.com', 'RJ', 'BS Management - H', 4, 2, 2013, 1, 1, 'Yep. ', 0, 1, '39293'),
(4, 'Luces', 'Paolo', 'J', NULL, '212311', 'Married', '1991-10-11 00:00:00', 'Caloocan City', 'M', 'Filipino', '2', 'Matalino', 'Caloocan City', 'Metro Manila', 'NCR', 'Tomas Morato', '02933481341', '3323421', 'pao@hotmail.com', NULL, 'BS ME', 3, 4, 2012, 1, 1, 'Nope', 1, 0, '32323');

-- --------------------------------------------------------

--
-- Table structure for table `student_application`
--

CREATE TABLE IF NOT EXISTS `student_application` (
  `Student_Application_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Application_ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `Subject_ID` int(11) NOT NULL,
  PRIMARY KEY (`Student_Application_ID`),
  UNIQUE KEY `Student_Application_ID_UNIQUE` (`Student_Application_ID`),
  KEY `fk_Student_Application_Application1` (`Application_ID`),
  KEY `fk_Student_Application_Student2` (`Student_ID`),
  KEY `fk_Student_Application_Project2` (`Project_ID`),
  KEY `fk_Student_Application_Subject1` (`Subject_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student_application`
--

INSERT INTO `student_application` (`Student_Application_ID`, `Application_ID`, `Student_ID`, `Project_ID`, `Subject_ID`) VALUES
(1, 1, 1, 1, 2),
(2, 2, 2, 3, 1),
(3, 3, 3, 1, 2),
(4, 4, 4, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `student_class`
--

CREATE TABLE IF NOT EXISTS `student_class` (
  `Student_Class_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Class_ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  PRIMARY KEY (`Student_Class_ID`),
  UNIQUE KEY `Student_Class_ID_UNIQUE` (`Student_Class_ID`),
  KEY `fk_Student_Class_Class1` (`Class_ID`),
  KEY `fk_Student_Class_Student1` (`Student_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `student_class`
--

INSERT INTO `student_class` (`Student_Class_ID`, `Class_ID`, `Student_ID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 2),
(6, 2, 1),
(7, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_computer_skills`
--

CREATE TABLE IF NOT EXISTS `student_computer_skills` (
  `Student_Computer_Skills_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Student_ID` int(11) NOT NULL,
  `Computer_Skills_ID` int(11) NOT NULL,
  `Level_Of_Proficiency` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Student_Computer_Skills_ID`),
  UNIQUE KEY `Student_Computer_Skills_ID_UNIQUE` (`Student_Computer_Skills_ID`),
  KEY `fk_Student_Computer_Skills_Student1_idx` (`Student_ID`),
  KEY `fk_Student_Computer_Skills_Computer_Skills1_idx` (`Computer_Skills_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student_computer_skills`
--

INSERT INTO `student_computer_skills` (`Student_Computer_Skills_ID`, `Student_ID`, `Computer_Skills_ID`, `Level_Of_Proficiency`) VALUES
(1, 1, 1, 'Professional'),
(2, 2, 1, 'Average'),
(3, 3, 1, 'Oks lang'),
(4, 4, 2, 'Master');

-- --------------------------------------------------------

--
-- Table structure for table `student_organization_affiliations`
--

CREATE TABLE IF NOT EXISTS `student_organization_affiliations` (
  `Student_Organization_Affiliations_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Organization_Affiliations_ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  PRIMARY KEY (`Student_Organization_Affiliations_ID`),
  UNIQUE KEY `Student_Organization_Affiliations_ID_UNIQUE` (`Student_Organization_Affiliations_ID`),
  KEY `fk_Student_Organization_Affiliations_Organization_Affiliati_idx` (`Organization_Affiliations_ID`),
  KEY `fk_Student_Organization_Affiliations_Student1_idx` (`Student_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `student_organization_affiliations`
--

INSERT INTO `student_organization_affiliations` (`Student_Organization_Affiliations_ID`, `Organization_Affiliations_ID`, `Student_ID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 4, 3),
(5, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_skills`
--

CREATE TABLE IF NOT EXISTS `student_skills` (
  `Student_Skills_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Student_ID` int(11) NOT NULL,
  `Skills_ID` int(11) NOT NULL,
  PRIMARY KEY (`Student_Skills_ID`),
  UNIQUE KEY `Student_Skills_ID_UNIQUE` (`Student_Skills_ID`),
  KEY `fk_Student_Skills_Student1_idx` (`Student_ID`),
  KEY `fk_Student_Skills_Skills1_idx` (`Skills_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student_skills`
--

INSERT INTO `student_skills` (`Student_Skills_ID`, `Student_ID`, `Skills_ID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_tracker`
--

CREATE TABLE IF NOT EXISTS `student_tracker` (
  `Student_Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Tracker_ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  PRIMARY KEY (`Student_Tracker_ID`),
  UNIQUE KEY `Student_Tracker_ID_UNIQUE` (`Student_Tracker_ID`),
  KEY `fk_Student_Tracker_Tracker1` (`Tracker_ID`),
  KEY `fk_Student_Tracker_Student1` (`Student_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `student_tracker`
--

INSERT INTO `student_tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 4, 3),
(5, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `Subject_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Subject_Name` varchar(45) NOT NULL,
  `Subject_Code` varchar(8) NOT NULL,
  PRIMARY KEY (`Subject_ID`),
  UNIQUE KEY `Subject_ID_UNIQUE` (`Subject_ID`),
  UNIQUE KEY `Subject_Code_UNIQUE` (`Subject_Code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES
(1, 'English', 'En10'),
(2, 'Math', 'Ma11'),
(3, 'Science', 'Sci10'),
(4, 'Geography', 'Geo10');

-- --------------------------------------------------------

--
-- Table structure for table `t3_application`
--

CREATE TABLE IF NOT EXISTS `t3_application` (
  `T3_Application_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` varchar(45) NOT NULL,
  `Created_At` datetime NOT NULL,
  `Updated_At` varchar(45) DEFAULT NULL,
  `Subject_ID` int(11) NOT NULL,
  PRIMARY KEY (`T3_Application_ID`),
  UNIQUE KEY `T3_Application_ID_UNIQUE` (`T3_Application_ID`),
  KEY `fk_Teacher_Application_Subject1` (`Subject_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `t3_application`
--

INSERT INTO `t3_application` (`T3_Application_ID`, `Date`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES
(1, '2011-12-11', '2012-12-12 00:00:00', '2012-11-11', 1),
(2, '2013-11-24', '2009-11-11 00:00:00', '2012-09-13', 2),
(3, '2019-12-11', '2008-12-12 00:00:00', '2001-11-18', 3),
(4, '2012-11-11', '2006-06-09 00:00:00', '2012-12-12', 4),
(5, '2009-09-22', '2006-05-22 00:00:00', '2012-12-12', 3),
(6, '2011-11-12', '2012-09-22 00:00:00', '2012-11-12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `t3_class`
--

CREATE TABLE IF NOT EXISTS `t3_class` (
  `T3_Class_ID` int(11) NOT NULL AUTO_INCREMENT,
  `School_Year` varchar(10) NOT NULL,
  `Duration` varchar(10) NOT NULL,
  `School_ID` int(11) NOT NULL,
  `Subject_ID` int(11) NOT NULL,
  PRIMARY KEY (`T3_Class_ID`),
  UNIQUE KEY `T3_Class_ID_UNIQUE` (`T3_Class_ID`),
  KEY `fk_Section_School2` (`School_ID`),
  KEY `fk_Class_Subject1_idx` (`Subject_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `t3_class`
--

INSERT INTO `t3_class` (`T3_Class_ID`, `School_Year`, `Duration`, `School_ID`, `Subject_ID`) VALUES
(1, '2013-2014', '1 sem', 1, 1),
(2, '2013-2014', '2 sem', 2, 1),
(3, '2012-2013', '4 sem', 3, 1),
(4, '2010-2011', '3 sem', 4, 1),
(5, '2009-2010', '1 sem', 1, 2),
(6, '2011-2012', '2 sem', 2, 2),
(7, '2012-2014', '4 sem', 3, 2),
(8, '2011-2011', '1 sem', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `t3_tracker`
--

CREATE TABLE IF NOT EXISTS `t3_tracker` (
  `T3_Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Status_ID` int(11) NOT NULL,
  `Created_At` datetime NOT NULL,
  `Updated_At` datetime DEFAULT NULL,
  `Contract?` tinyint(1) NOT NULL DEFAULT '0',
  `Remarks` varchar(250) DEFAULT NULL,
  `Subject_ID` int(11) NOT NULL,
  PRIMARY KEY (`T3_Tracker_ID`),
  UNIQUE KEY `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID`),
  KEY `fk_Teacher_Tracker_Status1` (`Status_ID`),
  KEY `fk_Teacher_Tracker_Subject1` (`Subject_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `t3_tracker`
--

INSERT INTO `t3_tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES
(1, 1, '2012-11-11 00:00:00', '2013-11-13 00:00:00', 0, 'Really', 1),
(2, 2, '2009-09-09 00:00:00', '2001-01-01 00:00:00', 1, 'Go ', 2),
(3, 1, '2014-11-14 00:00:00', '2011-12-11 00:00:00', 0, 'Hell Yeah Im Halfway', 2),
(4, 1, '2011-11-01 00:00:00', '2011-11-02 00:00:00', 1, 'At 14 they asked', 3),
(5, 2, '2011-11-04 00:00:00', '2011-11-06 00:00:00', 0, 'Owowow', 4),
(6, 1, '2011-11-06 00:00:00', '2011-11-01 00:00:00', 1, 'Schoolin''', 3),
(7, 2, '2012-11-09 00:00:00', '2011-11-02 00:00:00', 1, 'Don''t stop running', 4),
(8, 1, '2011-11-08 00:00:00', '2011-11-03 00:00:00', 0, 'Who needs it', 3),
(9, 2, '2012-11-08 00:00:00', '2011-11-03 00:00:00', 1, 'Whoa', 4);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `Teacher_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Street_Number` varchar(5) NOT NULL,
  `Street_Name` varchar(45) NOT NULL,
  `City` varchar(45) NOT NULL,
  `Province` varchar(45) NOT NULL,
  `Region` varchar(45) NOT NULL,
  `Alternate_Address` text,
  `Email` varchar(45) NOT NULL,
  `Facebook` varchar(45) DEFAULT NULL,
  `Civil_Status` varchar(9) NOT NULL DEFAULT 'Single',
  `Birthdate` datetime NOT NULL,
  `Birthplace` varchar(45) NOT NULL DEFAULT 'Philippines',
  `Gender` char(1) NOT NULL,
  `Nationality` varchar(45) NOT NULL DEFAULT 'Filipino',
  `School_ID` int(11) NOT NULL,
  `Current_Position` varchar(45) NOT NULL,
  `Employment_Status` varchar(4) NOT NULL,
  `Name_of_Supervisor` varchar(45) NOT NULL,
  `Supervisor_Contact_Details` varchar(11) NOT NULL,
  `Created_At` datetime NOT NULL,
  `Updated_At` datetime DEFAULT NULL,
  `Resume?` tinyint(1) NOT NULL,
  `Photo?` tinyint(1) NOT NULL DEFAULT '0',
  `Proof_of_Certification?` tinyint(1) NOT NULL DEFAULT '0',
  `Diploma/TOR` tinyint(1) NOT NULL DEFAULT '0',
  `Desktop?` tinyint(1) NOT NULL DEFAULT '0',
  `Laptop?` tinyint(1) NOT NULL DEFAULT '0',
  `Internet?` tinyint(1) NOT NULL DEFAULT '0',
  `Total_Year_of_Teaching` int(11) NOT NULL,
  `Code` varchar(45) NOT NULL,
  `First_Name` varchar(45) NOT NULL,
  `Mobile_Number` varchar(13) NOT NULL,
  `Name_Suffix` varchar(5) DEFAULT NULL,
  `Middle_Initial` char(1) NOT NULL,
  `Last_Name` varchar(45) NOT NULL,
  `Landline` varchar(9) NOT NULL,
  PRIMARY KEY (`Teacher_ID`),
  UNIQUE KEY `Teacher_ID_UNIQUE` (`Teacher_ID`),
  KEY `fk_Teacher_School1_idx` (`School_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`) VALUES
(1, '8', 'Samar', 'Quezon City', 'Metro Manila', '5', 'Basco, Batanes', 'rj@gmail.com', NULL, 'Single', '1994-12-10 00:00:00', 'Quezon City', 'M', 'Filipino', 1, 'Teacher 1', 'Perm', 'John Leveur', '09159999911', '2013-12-12 00:00:00', '2013-12-14 00:00:00', 1, 0, 1, 0, 1, 1, 0, 4, 'CODE123', 'Mike', '091159503612', 'Jr.', 'A', 'Swift', '3336644'),
(2, '7', 'Pura', 'Manila City', 'Metro Manila', 'NCR', 'Laoag City', 'gil@gmail.com', 'Gigi', 'Married', '1992-01-01 00:24:34', 'Beijing, China', 'F', 'Filipino', 2, 'Teacher 2', 'Perm', 'Michael Bryan', '09111222334', '2013-10-31 00:00:00', '2013-11-05 00:00:00', 0, 0, 1, 0, 1, 0, 1, 3, 'CODE432', 'Gillian', '098112344321', NULL, 'P', 'Tan', '3215432'),
(3, '2', 'Arrupe', 'Malabon City', 'Metro Manila ', 'NCR', 'Ormoc City', 'fr@gmail.com', 'Francis', 'Married', '1991-11-12 00:24:34', 'Caloocan City, Philippines', 'M', 'Filipino', 3, 'Teacher 4', 'Perm', 'Fernando Lopez', '09212123456', '2011-11-24 00:00:00', '2013-11-14 00:00:00', 1, 1, 1, 1, 0, 0, 0, 10, 'CODE123', 'Francis', '123456711111', 'Jr.', 'B', 'Fajardo', '32123421'),
(4, '6750', 'Ayala', 'Makati City', 'Metro Manila', 'NCR', 'Cebu City', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Los Angeles, USA', 'F', 'American', 1, 'Teacher 10', 'Perm', 'Barack Obama', '09121431431', '2012-11-24 00:00:00', '2013-11-14 00:00:00', 1, 0, 0, 0, 0, 1, 1, 22, 'CODE143', 'Iza', '212321220291', NULL, 'C', 'Calzado', '2132321');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_awards`
--

CREATE TABLE IF NOT EXISTS `teacher_awards` (
  `Teacher_Awards_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Award` varchar(45) NOT NULL,
  `Awarding_Body` varchar(45) NOT NULL,
  `Date_Received` date NOT NULL,
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_Awards_ID`),
  UNIQUE KEY `Teacher_Awards_ID_UNIQUE` (`Teacher_Awards_ID`),
  KEY `fk_Teacher_Awards_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher_awards`
--

INSERT INTO `teacher_awards` (`Teacher_Awards_ID`, `Award`, `Awarding_Body`, `Date_Received`, `Teacher_ID`) VALUES
(1, 'Best in English', 'FAMAS', '1992-12-11', 1),
(2, 'Best in Math', 'Mathers', '1911-11-11', 2),
(3, 'Oscar', 'Academy', '1999-11-12', 1),
(4, 'Emmy', 'America', '2012-09-11', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_certification`
--

CREATE TABLE IF NOT EXISTS `teacher_certification` (
  `Teacher_Certification_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Certification` varchar(45) NOT NULL,
  `Certifying_Body` varchar(250) NOT NULL,
  `Date_Received` datetime NOT NULL,
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_Certification_ID`),
  UNIQUE KEY `Teacher_Certification_ID_UNIQUE` (`Teacher_Certification_ID`),
  KEY `fk_Teacher_Certification_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher_certification`
--

INSERT INTO `teacher_certification` (`Teacher_Certification_ID`, `Certification`, `Certifying_Body`, `Date_Received`, `Teacher_ID`) VALUES
(1, 'Math', 'Math Body ', '1992-12-11 00:34:00', 1),
(2, 'Science', 'DOST', '1993-12-26 00:22:22', 2),
(3, 'Geography', 'Makati Geologist', '2012-12-11 00:00:00', 2),
(4, 'English', 'English Society', '1993-12-11 00:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class`
--

CREATE TABLE IF NOT EXISTS `teacher_class` (
  `Teacher_Class_ID` int(11) NOT NULL AUTO_INCREMENT,
  `T3_Class_ID` int(11) NOT NULL,
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_Class_ID`),
  UNIQUE KEY `Teacher_Class_ID_UNIQUE` (`Teacher_Class_ID`),
  KEY `fk_Student_Class_Class1` (`T3_Class_ID`),
  KEY `fk_Teacher_Class_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_computer_familiarity`
--

CREATE TABLE IF NOT EXISTS `teacher_computer_familiarity` (
  `Teacher_Computer_Familiarity_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Teacher_ID` int(11) NOT NULL,
  `Skills_ID` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_Computer_Familiarity_ID`),
  UNIQUE KEY `Teacher_Computer_Familiarity_ID_UNIQUE` (`Teacher_Computer_Familiarity_ID`),
  KEY `fk_Teacher_Computer_Familiarity_Teacher1_idx` (`Teacher_ID`),
  KEY `fk_Teacher_Computer_Familiarity_Skills1_idx` (`Skills_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `teacher_computer_familiarity`
--

INSERT INTO `teacher_computer_familiarity` (`Teacher_Computer_Familiarity_ID`, `Teacher_ID`, `Skills_ID`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 2, 2),
(5, 3, 3),
(6, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_computer_profiency`
--

CREATE TABLE IF NOT EXISTS `teacher_computer_profiency` (
  `Teacher_Computer_Profiency_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Skills_ID` int(11) NOT NULL,
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_Computer_Profiency_ID`),
  UNIQUE KEY `Teacher_Computer_Profiency_ID_UNIQUE` (`Teacher_Computer_Profiency_ID`),
  KEY `fk_Teacher_Computer_Profiency_Skills1_idx` (`Skills_ID`),
  KEY `fk_Teacher_Computer_Profiency_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `teacher_computer_profiency`
--

INSERT INTO `teacher_computer_profiency` (`Teacher_Computer_Profiency_ID`, `Skills_ID`, `Teacher_ID`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 1, 2),
(5, 3, 3),
(6, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_other_skills`
--

CREATE TABLE IF NOT EXISTS `teacher_other_skills` (
  `Teacher_Other_Skills_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Skills_ID` int(11) NOT NULL,
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_Other_Skills_ID`),
  UNIQUE KEY `Teacher_Other_Skills_ID_UNIQUE` (`Teacher_Other_Skills_ID`),
  KEY `fk_Teacher_Other_Skills_Skills1_idx` (`Skills_ID`),
  KEY `fk_Teacher_Other_Skills_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher_other_skills`
--

INSERT INTO `teacher_other_skills` (`Teacher_Other_Skills_ID`, `Skills_ID`, `Teacher_ID`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 3),
(4, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_professional_reference`
--

CREATE TABLE IF NOT EXISTS `teacher_professional_reference` (
  `Teacher_Professional_Reference_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(45) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Position` varchar(45) DEFAULT NULL,
  `Company` varchar(45) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_Professional_Reference_ID`),
  KEY `fk_Teacher_Professional_Reference_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher_professional_reference`
--

INSERT INTO `teacher_professional_reference` (`Teacher_Professional_Reference_ID`, `Email`, `Name`, `Position`, `Company`, `Phone`, `Teacher_ID`) VALUES
(1, 'jpa@gmail.com', 'Mike Co', 'Teacher 21', 'TeachMe.org', '4212123', 1),
(2, 'mla@gmail.com', 'Tanner Mo', 'Engineer', 'EngineerMe.org', '4333121', 2),
(3, 'hack@gmail.com', 'Packer Yu', 'Hacker', 'Hack Company', '4323112', 3),
(4, 'jack@yahoo.com', 'Jack Lantern', 'Jacker', 'Olero Company', '4323234', 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_relevant_experiences`
--

CREATE TABLE IF NOT EXISTS `teacher_relevant_experiences` (
  `Teacher_Relevant_Experiences_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Organization` varchar(250) NOT NULL,
  `Position` varchar(45) NOT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `Date` date NOT NULL,
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_Relevant_Experiences_ID`),
  KEY `fk_Teacher_Relevant_Experiences_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher_relevant_experiences`
--

INSERT INTO `teacher_relevant_experiences` (`Teacher_Relevant_Experiences_ID`, `Organization`, `Position`, `Description`, `Date`, `Teacher_ID`) VALUES
(1, 'Ayala', 'Instructor', 'Instructed employees', '2013-11-16', 1),
(2, 'Accenture', 'Asst Instructor', 'Assisted the instructor', '2013-11-14', 2),
(3, 'Mandarin Skies', 'Cook', 'Cooked Food', '2012-11-11', 3),
(4, 'Arakama', 'Manager', 'Managed people', '2011-11-11', 4);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subjects_taken`
--

CREATE TABLE IF NOT EXISTS `teacher_subjects_taken` (
  `Teacher_Subjects_Taken_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Teacher_ID` int(11) NOT NULL,
  `Adept_T3_Tracker_ID` int(11) NOT NULL,
  `Best_T3_Tracker_ID` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_Subjects_Taken_ID`),
  UNIQUE KEY `Teacher_Subjects_Taken_ID_UNIQUE` (`Teacher_Subjects_Taken_ID`),
  KEY `fk_Teacher_Subjects_Taken_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher_subjects_taken`
--

INSERT INTO `teacher_subjects_taken` (`Teacher_Subjects_Taken_ID`, `Teacher_ID`, `Adept_T3_Tracker_ID`, `Best_T3_Tracker_ID`) VALUES
(1, 1, 1, 2),
(2, 2, 2, 2),
(3, 3, 1, 3),
(4, 4, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_t3_application`
--

CREATE TABLE IF NOT EXISTS `teacher_t3_application` (
  `Teacher_T3_Application_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Teacher_ID` int(11) NOT NULL,
  `T3_Application_ID` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_T3_Application_ID`),
  UNIQUE KEY `Teacher_ID_UNIQUE` (`Teacher_ID`),
  KEY `fk_Teacher_T3_Application_Teacher1_idx` (`Teacher_ID`),
  KEY `fk_Teacher_T3_Application_T3_Application1_idx` (`T3_Application_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `teacher_t3_application`
--

INSERT INTO `teacher_t3_application` (`Teacher_T3_Application_ID`, `Teacher_ID`, `T3_Application_ID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_t3_tracker`
--

CREATE TABLE IF NOT EXISTS `teacher_t3_tracker` (
  `Teacher_T3_Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `T3_Tracker_ID` int(11) NOT NULL,
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_T3_Tracker_ID`),
  UNIQUE KEY `Teacher_T3_Tracker_ID_UNIQUE` (`Teacher_T3_Tracker_ID`),
  KEY `fk_Teacher_T3_Tracker_T3_Tracker1` (`T3_Tracker_ID`),
  KEY `fk_Teacher_T3_Tracker_Teacher1` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher_t3_tracker`
--

INSERT INTO `teacher_t3_tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 4),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_training_experience`
--

CREATE TABLE IF NOT EXISTS `teacher_training_experience` (
  `Teacher_Training_Experience_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Teacher_ID` int(11) NOT NULL,
  `Institution` varchar(250) NOT NULL,
  `Position` varchar(45) NOT NULL,
  `Date` datetime NOT NULL,
  `Level_Taught` varchar(250) NOT NULL,
  `Courses_Taught` text NOT NULL,
  `Number_of_Years_in_Institution` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_Training_Experience_ID`),
  UNIQUE KEY `Teacher_Training_Experience_ID_UNIQUE` (`Teacher_Training_Experience_ID`),
  KEY `fk_Teacher_Training_Experience_Teacher_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher_training_experience`
--

INSERT INTO `teacher_training_experience` (`Teacher_Training_Experience_ID`, `Teacher_ID`, `Institution`, `Position`, `Date`, `Level_Taught`, `Courses_Taught`, `Number_of_Years_in_Institution`) VALUES
(1, 2, 'Ateneo de Manila', 'Secretary', '1992-12-25 00:23:44', 'Tertiary', 'Math', 2),
(2, 1, 'De La Salle', 'President', '1993-12-23 23:12:22', 'High School', 'Geography', 4),
(3, 3, 'PUP', 'Teacher', '1992-12-22 00:55:11', 'Tertiary', 'Math, Science', 3),
(4, 3, 'Makati Science High School', 'Teacher', '1992-12-24 00:00:00', 'Grade School', 'Algebra, Calculus', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tracker`
--

CREATE TABLE IF NOT EXISTS `tracker` (
  `Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Contract?` tinyint(1) NOT NULL DEFAULT '0',
  `Remarks` varchar(255) DEFAULT NULL,
  `Status_ID` int(11) NOT NULL,
  `Times_Taken` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Tracker_ID`),
  UNIQUE KEY `Tracker_ID_UNIQUE` (`Tracker_ID`),
  KEY `fk_Tracker_Status1` (`Status_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tracker`
--

INSERT INTO `tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`) VALUES
(1, 1, 'Average', 1, 2),
(2, 0, 'Great', 2, 1),
(3, 0, 'Bad', 1, 5),
(4, 1, 'Worst', 2, 5),
(5, 0, 'Great', 2, 1),
(6, 1, 'See class', 1, 1),
(7, 1, 'Reject', 1, 2),
(8, 0, 'Singer', 2, 8),
(9, 1, 'Failure', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `type`) VALUES
(1, 'rcruz', 'Raymond', 'Cruz', '9a73055b9e5a5edbf80c34198e05f0d1', 'admin'),
(6, 'pluces', 'Paolo', 'Luces', '1532136b72115a3f2c6fcd81bf80e7f4', 'admin'),
(7, 'jfederico', 'Joy', 'Federico', 'c2c8e798aecbc26d86e4805114b03c51', 'admin'),
(9, 'pperalta', 'Phil', 'Peralta', 'd14ffd41334ec4b4b3f2c0d55c38be6f', 'admin'),
(10, 'ffajardo', 'Francis', 'Fajardo', 'd0ab7fe6c314f4fe5b6c18a0157c96b4', 'admin'),
(11, 'ABC11', 'Aaron', 'Casurao', '65079b006e85a7e798abecb99e47c154', 'admin'),
(13, 'marmario', 'Mitch', 'Armario', 'fae53351b9effc708e764e871bef3119', 'admin'),
(14, 'mandogs', 'Manolo', 'Valena', '3c3662bcb661d6de679c636744c66b62', 'encoder'),
(15, 'guest', 'Guest', 'User', '084e0343a0486ff05530df6c705c8bb4', 'guest');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adept_student`
--
ALTER TABLE `adept_student`
  ADD CONSTRAINT `fk_Adept_Student_Tracker1` FOREIGN KEY (`Tracker_ID`) REFERENCES `tracker` (`Tracker_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `adept_t3_tracker`
--
ALTER TABLE `adept_t3_tracker`
  ADD CONSTRAINT `fk_Adept_T3_Tracker_copy1_Adept_T3_Attendance1` FOREIGN KEY (`Adept_T3_Attendance_ID`) REFERENCES `adept_t3_attendance` (`Adept_T3_Attendance_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Adept_T3_Tracker_copy1_Adept_T3_Grades1` FOREIGN KEY (`Adept_T3_Grades_ID`) REFERENCES `adept_t3_grades` (`Adept_T3_Grades_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Adept_T3_Tracker_Teacher_Tracker1` FOREIGN KEY (`T3_Tracker_ID`) REFERENCES `t3_tracker` (`T3_Tracker_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `best_adept_t3_application`
--
ALTER TABLE `best_adept_t3_application`
  ADD CONSTRAINT `fk_Best_Adept_T3_Application_Teacher_Application1` FOREIGN KEY (`T3_Application_ID`) REFERENCES `t3_application` (`T3_Application_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `best_student`
--
ALTER TABLE `best_student`
  ADD CONSTRAINT `fk_BEST_Student_Tracker1` FOREIGN KEY (`Tracker_ID`) REFERENCES `tracker` (`Tracker_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `best_t3_tracker`
--
ALTER TABLE `best_t3_tracker`
  ADD CONSTRAINT `fk_Adept_T3_Tracker_Best_T3_Attendance1` FOREIGN KEY (`Best_T3_Attendance_ID`) REFERENCES `best_t3_attendance` (`Best_T3_Attendance_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Adept_T3_Tracker_Best_T3_Grades1` FOREIGN KEY (`Best_T3_Grades_ID`) REFERENCES `best_t3_grades` (`Best_T3_Grades_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Best_T3_Tracker_Teacher_Tracker1` FOREIGN KEY (`T3_Tracker_ID`) REFERENCES `t3_tracker` (`T3_Tracker_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `fk_Class_Subject1` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Section_School2` FOREIGN KEY (`School_ID`) REFERENCES `school` (`School_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gcat_class`
--
ALTER TABLE `gcat_class`
  ADD CONSTRAINT `fk_GCAT_Class_Class1` FOREIGN KEY (`Class_ID`) REFERENCES `class` (`Class_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_GCAT_Class_Proctor1` FOREIGN KEY (`Proctor_ID`) REFERENCES `proctor` (`Proctor_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gcat_student`
--
ALTER TABLE `gcat_student`
  ADD CONSTRAINT `fk_GCAT_Student_Tracker1` FOREIGN KEY (`Tracker_ID`) REFERENCES `tracker` (`Tracker_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gcat_t3_class`
--
ALTER TABLE `gcat_t3_class`
  ADD CONSTRAINT `fk_GCAT_Class_Class10` FOREIGN KEY (`T3_Class_ID`) REFERENCES `t3_class` (`T3_Class_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_GCAT_Class_copy1_Proctor1` FOREIGN KEY (`Proctor_ID`) REFERENCES `proctor` (`Proctor_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gcat_tracker`
--
ALTER TABLE `gcat_tracker`
  ADD CONSTRAINT `fk_GCAT_T3_Tracker_Teacher_Tracker1` FOREIGN KEY (`T3_Tracker_ID`) REFERENCES `t3_tracker` (`T3_Tracker_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `other_class`
--
ALTER TABLE `other_class`
  ADD CONSTRAINT `fk_Other_Class_Class1` FOREIGN KEY (`Class_ID`) REFERENCES `class` (`Class_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Other_Class_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `other_t3_class`
--
ALTER TABLE `other_t3_class`
  ADD CONSTRAINT `fk_Other_Class_Class10` FOREIGN KEY (`T3_Class_ID`) REFERENCES `t3_class` (`T3_Class_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Other_T3_Class_Master Trainer1` FOREIGN KEY (`Master_Trainer_ID`) REFERENCES `master trainer` (`Master_Trainer_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `related_trainings_attended_by_a_teacher`
--
ALTER TABLE `related_trainings_attended_by_a_teacher`
  ADD CONSTRAINT `fk_Related_Trainings_Attended_By_A_Teacher_Related_Trainings_1` FOREIGN KEY (`Related_Trainings_Attended_ID`) REFERENCES `related_trainings_attended` (`Related_Trainings_Attended_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Related_Trainings_Attended_By_A_Teacher_SMP_T3_Application1` FOREIGN KEY (`SMP_T3_Application_ID`) REFERENCES `smp_t3_application` (`T3_Application_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `smp_student`
--
ALTER TABLE `smp_student`
  ADD CONSTRAINT `fk_SMP_Student_Tracker1` FOREIGN KEY (`Tracker_ID`) REFERENCES `tracker` (`Tracker_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `smp_student_courses_taken`
--
ALTER TABLE `smp_student_courses_taken`
  ADD CONSTRAINT `fk_SMP_Student_Courses_Taken_SMP_Student1` FOREIGN KEY (`Tracker_ID`) REFERENCES `smp_student` (`Tracker_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SMP_Student_Courses_Taken_Student_Class1` FOREIGN KEY (`Student_Class_ID`) REFERENCES `student_class` (`Student_Class_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `smp_t3_application`
--
ALTER TABLE `smp_t3_application`
  ADD CONSTRAINT `fk_SMP_T3_Application_Teacher_Application1` FOREIGN KEY (`T3_Application_ID`) REFERENCES `t3_application` (`T3_Application_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `smp_t3_attendance_tracking`
--
ALTER TABLE `smp_t3_attendance_tracking`
  ADD CONSTRAINT `fk_SMP_T3_Attendance_Tracking_SMP_T3_Attendance1` FOREIGN KEY (`SMP_T3_Attendance_ID`) REFERENCES `smp_t3_attendance` (`SMP_T3_Attendance_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SMP_T3_Attendance_Tracking_SMP_T3_Tracker1` FOREIGN KEY (`T3_Tracker_ID`) REFERENCES `smp_t3_tracker` (`T3_Tracker_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `smp_t3_tracker`
--
ALTER TABLE `smp_t3_tracker`
  ADD CONSTRAINT `fk_SMP_T3_Tracker_SMP_T3_Site_Visit1` FOREIGN KEY (`SMP_T3_Site_Visit_ID`) REFERENCES `smp_t3_site_visit` (`SMP_T3_Site_Visit_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SMP_T3_Tracker_T3_Tracker1` FOREIGN KEY (`T3_Tracker_ID`) REFERENCES `t3_tracker` (`T3_Tracker_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stipend_tracking`
--
ALTER TABLE `stipend_tracking`
  ADD CONSTRAINT `fk_Stipend_Tracking_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stipend_tracking_list`
--
ALTER TABLE `stipend_tracking_list`
  ADD CONSTRAINT `fk_Stipend_Tracking_List_Stipend_Tracking1` FOREIGN KEY (`Stipend_Tracking_ID`) REFERENCES `stipend_tracking` (`Stipend_Tracking_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Stipend_Tracking_List_Subject_ID1` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_Student_School1` FOREIGN KEY (`School_ID`) REFERENCES `school` (`School_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_application`
--
ALTER TABLE `student_application`
  ADD CONSTRAINT `fk_Student_Application_Application1` FOREIGN KEY (`Application_ID`) REFERENCES `application` (`Application_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Student_Application_Project2` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Student_Application_Student2` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Student_Application_Subject1` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_class`
--
ALTER TABLE `student_class`
  ADD CONSTRAINT `fk_Student_Class_Class1` FOREIGN KEY (`Class_ID`) REFERENCES `class` (`Class_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Student_Class_Student1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_computer_skills`
--
ALTER TABLE `student_computer_skills`
  ADD CONSTRAINT `fk_Student_Computer_Skills_Computer_Skills1` FOREIGN KEY (`Computer_Skills_ID`) REFERENCES `computer_skills` (`Computer_Skills_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Student_Computer_Skills_Student1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_organization_affiliations`
--
ALTER TABLE `student_organization_affiliations`
  ADD CONSTRAINT `fk_Student_Organization_Affiliations_Organization_Affiliations1` FOREIGN KEY (`Organization_Affiliations_ID`) REFERENCES `organization_affiliations` (`Organization_Affiliations_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Student_Organization_Affiliations_Student1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_skills`
--
ALTER TABLE `student_skills`
  ADD CONSTRAINT `fk_Student_Skills_Skills1` FOREIGN KEY (`Skills_ID`) REFERENCES `skills` (`Skills_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Student_Skills_Student1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student_tracker`
--
ALTER TABLE `student_tracker`
  ADD CONSTRAINT `fk_Student_Tracker_Student1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Student_Tracker_Tracker1` FOREIGN KEY (`Tracker_ID`) REFERENCES `tracker` (`Tracker_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t3_application`
--
ALTER TABLE `t3_application`
  ADD CONSTRAINT `fk_Teacher_Application_Subject1` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t3_class`
--
ALTER TABLE `t3_class`
  ADD CONSTRAINT `fk_Class_Subject10` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Section_School20` FOREIGN KEY (`School_ID`) REFERENCES `school` (`School_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `t3_tracker`
--
ALTER TABLE `t3_tracker`
  ADD CONSTRAINT `fk_Teacher_Tracker_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`Status_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Teacher_Tracker_Subject1` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_Teacher_School1` FOREIGN KEY (`School_ID`) REFERENCES `school` (`School_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_awards`
--
ALTER TABLE `teacher_awards`
  ADD CONSTRAINT `fk_Teacher_Awards_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_certification`
--
ALTER TABLE `teacher_certification`
  ADD CONSTRAINT `fk_Teacher_Certification_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD CONSTRAINT `fk_Student_Class_Class10` FOREIGN KEY (`T3_Class_ID`) REFERENCES `t3_class` (`T3_Class_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Teacher_Class_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_computer_familiarity`
--
ALTER TABLE `teacher_computer_familiarity`
  ADD CONSTRAINT `fk_Teacher_Computer_Familiarity_Skills1` FOREIGN KEY (`Skills_ID`) REFERENCES `computer_skills` (`Computer_Skills_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Teacher_Computer_Familiarity_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_computer_profiency`
--
ALTER TABLE `teacher_computer_profiency`
  ADD CONSTRAINT `fk_Teacher_Computer_Profiency_Skills1` FOREIGN KEY (`Skills_ID`) REFERENCES `computer_skills` (`Computer_Skills_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Teacher_Computer_Profiency_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_other_skills`
--
ALTER TABLE `teacher_other_skills`
  ADD CONSTRAINT `fk_Teacher_Other_Skills_Skills1` FOREIGN KEY (`Skills_ID`) REFERENCES `skills` (`Skills_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Teacher_Other_Skills_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_professional_reference`
--
ALTER TABLE `teacher_professional_reference`
  ADD CONSTRAINT `fk_Teacher_Professional_Reference_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_relevant_experiences`
--
ALTER TABLE `teacher_relevant_experiences`
  ADD CONSTRAINT `fk_Teacher_Relevant_Experiences_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_subjects_taken`
--
ALTER TABLE `teacher_subjects_taken`
  ADD CONSTRAINT `fk_Teacher_Subjects_Taken_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_t3_application`
--
ALTER TABLE `teacher_t3_application`
  ADD CONSTRAINT `fk_Teacher_T3_Application_T3_Application1` FOREIGN KEY (`T3_Application_ID`) REFERENCES `t3_application` (`T3_Application_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Teacher_T3_Application_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_t3_tracker`
--
ALTER TABLE `teacher_t3_tracker`
  ADD CONSTRAINT `fk_Teacher_T3_Tracker_T3_Tracker1` FOREIGN KEY (`T3_Tracker_ID`) REFERENCES `t3_tracker` (`T3_Tracker_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Teacher_T3_Tracker_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher_training_experience`
--
ALTER TABLE `teacher_training_experience`
  ADD CONSTRAINT `fk_Teacher_Training_Experience_Teacher` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tracker`
--
ALTER TABLE `tracker`
  ADD CONSTRAINT `fk_Tracker_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`Status_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
