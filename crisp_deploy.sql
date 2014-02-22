-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2014 at 12:01 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `CD` tinyint(1) DEFAULT NULL,
  `Oral` decimal(10,0) DEFAULT NULL,
  `Retention` decimal(10,0) DEFAULT NULL,
  `Typing` decimal(10,0) DEFAULT NULL,
  `Grammar` decimal(10,0) DEFAULT NULL,
  `Comprehension` decimal(10,0) DEFAULT NULL,
  `Summary_Scores` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`Tracker_ID`),
  UNIQUE KEY `Tracker_ID_UNIQUE` (`Tracker_ID`),
  UNIQUE KEY `Control_Number_UNIQUE` (`Control_Number`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Adept_T3_Attendance_ID`),
  UNIQUE KEY `Adept_T3_Attendance_ID_UNIQUE` (`Adept_T3_Attendance_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adept_t3_grades`
--

CREATE TABLE IF NOT EXISTS `adept_t3_grades` (
  `Adept_T3_Grades_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Oral` decimal(10,1) DEFAULT NULL,
  `Retention` decimal(10,1) DEFAULT NULL,
  `Typing` decimal(10,1) DEFAULT NULL,
  `Grammar` decimal(10,1) DEFAULT NULL,
  `Comprehension` decimal(10,1) DEFAULT NULL,
  `Summary_Scores` decimal(10,1) DEFAULT NULL,
  PRIMARY KEY (`Adept_T3_Grades_ID`),
  UNIQUE KEY `Adept_T3_Grades_ID_UNIQUE` (`Adept_T3_Grades_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `adept_t3_tracker`
--

CREATE TABLE IF NOT EXISTS `adept_t3_tracker` (
  `T3_Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Adept_T3_Grades_ID` int(11) NOT NULL,
  `Adept_T3_Attendance_ID` int(11) NOT NULL,
  `Interview_Form` tinyint(1) NOT NULL DEFAULT '0',
  `Site_Visit_Form` tinyint(1) NOT NULL DEFAULT '0',
  `Adept_T3_Feedback` tinyint(1) NOT NULL DEFAULT '0',
  `Adept_ELearning_Feedback` tinyint(1) NOT NULL DEFAULT '0',
  `Manual_and_Kit` tinyint(1) NOT NULL DEFAULT '0',
  `Certificate_Of_Attendance` tinyint(1) NOT NULL DEFAULT '0',
  `Adept_Certified_Trainers` tinyint(1) NOT NULL,
  `Lesson_Plan` double DEFAULT '0',
  `Demo` double DEFAULT '0',
  `Total_Weighted` double DEFAULT '0',
  `Training_Portfolio` double DEFAULT '0',
  `Control_Number` varchar(5) DEFAULT NULL,
  `User_Name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`T3_Tracker_ID`),
  UNIQUE KEY `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID`),
  UNIQUE KEY `Control_Number_UNIQUE` (`Control_Number`),
  UNIQUE KEY `User_Name_UNIQUE` (`User_Name`),
  KEY `fk_Adept_T3_Tracker_Adept_T3_Grades1_idx` (`Adept_T3_Grades_ID`),
  KEY `fk_Adept_T3_Tracker_Adept_T3_Attendance1_idx` (`Adept_T3_Attendance_ID`),
  KEY `fk_Adept_T3_Tracker_Teacher_Tracker1_idx` (`T3_Tracker_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `best_adept_t3_application`
--

CREATE TABLE IF NOT EXISTS `best_adept_t3_application` (
  `T3_Application_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Answer_1` text,
  `Answer_2` text,
  `Answer_3` text,
  `Contract` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`T3_Application_ID`),
  UNIQUE KEY `T3_Application_ID_UNIQUE` (`T3_Application_ID`),
  KEY `fk_Best_Adept_T3_Application_Teacher_Application1_idx` (`T3_Application_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `best_student`
--

CREATE TABLE IF NOT EXISTS `best_student` (
  `Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Control_Number` varchar(5) DEFAULT NULL,
  `Username` varchar(45) DEFAULT NULL,
  `CD` tinyint(1) DEFAULT '0',
  `Oral` decimal(10,0) DEFAULT NULL,
  `Retention` decimal(10,0) DEFAULT NULL,
  `Typing` decimal(10,0) DEFAULT NULL,
  `Grammar` decimal(10,0) DEFAULT NULL,
  `Comprehension` decimal(10,0) DEFAULT NULL,
  `Summary_Scores` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`Tracker_ID`),
  UNIQUE KEY `Tracker_ID_UNIQUE` (`Tracker_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Best_T3_Attendance_ID`),
  UNIQUE KEY `Best_T3_Attendance_ID_UNIQUE` (`Best_T3_Attendance_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `best_t3_grades`
--

CREATE TABLE IF NOT EXISTS `best_t3_grades` (
  `Best_T3_Grades_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Oral` decimal(10,1) DEFAULT NULL,
  `Typing` decimal(10,1) DEFAULT NULL,
  `Retention` decimal(10,1) DEFAULT NULL,
  `Grammar` decimal(10,1) DEFAULT NULL,
  `Comprehension` decimal(10,1) DEFAULT NULL,
  `Summary_Scores` decimal(10,1) DEFAULT NULL,
  PRIMARY KEY (`Best_T3_Grades_ID`),
  UNIQUE KEY `Best_T3_Grades_ID_UNIQUE` (`Best_T3_Grades_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `best_t3_tracker`
--

CREATE TABLE IF NOT EXISTS `best_t3_tracker` (
  `T3_Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Best_T3_Attendance_ID` int(11) NOT NULL,
  `Interview_Form` tinyint(1) NOT NULL DEFAULT '0',
  `Site_Visit_Form` tinyint(1) NOT NULL DEFAULT '0',
  `Best_T3_Feedback` tinyint(1) NOT NULL DEFAULT '0',
  `Best_ELearning_Feedback` tinyint(1) NOT NULL DEFAULT '0',
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
  KEY `fk_Best_T3_Tracker_Teacher_Tracker1_idx` (`T3_Tracker_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `Class_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `School_Year` varchar(10) NOT NULL,
  `Semester` int(11) NOT NULL,
  `School_ID` int(11) NOT NULL,
  `Subject_ID` int(11) NOT NULL,
  PRIMARY KEY (`Class_ID`),
  UNIQUE KEY `Class_ID_UNIQUE` (`Class_ID`),
  KEY `fk_Section_School2_idx` (`School_ID`),
  KEY `fk_Class_Subject1_idx` (`Subject_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `computer_skills`
--

CREATE TABLE IF NOT EXISTS `computer_skills` (
  `Computer_Skills_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`Computer_Skills_ID`),
  UNIQUE KEY `Computer_Skills_ID_UNIQUE` (`Computer_Skills_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `GCAT_Perceptual_Speed_And_Accuracy` int(11) NOT NULL DEFAULT '0',
  `GCAT_Computer_Literacy` int(11) NOT NULL DEFAULT '0',
  `GCAT_English_Proficiency` int(11) NOT NULL DEFAULT '0',
  `GCAT_Basic_Skills_Test_Overall_Score` int(11) NOT NULL DEFAULT '0',
  `Session_ID` varchar(45) DEFAULT NULL,
  `Test_Date` datetime DEFAULT NULL,
  PRIMARY KEY (`Tracker_ID`),
  UNIQUE KEY `Session_ID_UNIQUE` (`Session_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  KEY `fk_GCAT_T3_Tracker_Teacher_Tracker1_idx` (`T3_Tracker_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `internship_student`
--

CREATE TABLE IF NOT EXISTS `internship_student` (
  `Tracker_ID` int(11) NOT NULL,
  `Supervisor_Name` varchar(250) DEFAULT NULL,
  `Supervisor_Position` varchar(100) DEFAULT NULL,
  `Supervisor_Contact` varchar(45) DEFAULT NULL,
  `Company_Information` text,
  `Company_Address` text,
  `Start_Date` datetime DEFAULT NULL,
  `End_Date` datetime DEFAULT NULL,
  `Total_Work_Hours` int(11) DEFAULT NULL,
  `Task` text,
  `English_Proficiency` int(11) DEFAULT NULL,
  `Computer_Literacy` int(11) DEFAULT NULL,
  `Learning_Orientation` int(11) DEFAULT NULL,
  `Perceptual_Speed_and_Accuracy` int(11) DEFAULT NULL,
  `Reliability` int(11) DEFAULT NULL,
  `Empathy` int(11) DEFAULT NULL,
  `Courtesy` int(11) DEFAULT NULL,
  `Responsiveness` int(11) DEFAULT NULL,
  `Comments` text,
  `Meet_Standards` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`Tracker_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `Log_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `Changes` text NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Log_ID`),
  UNIQUE KEY `Log_ID_UNIQUE` (`Log_ID`),
  KEY `fk_Log_Users1_idx` (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_trainer`
--

CREATE TABLE IF NOT EXISTS `master_trainer` (
  `Master_Trainer_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Last_Name` varchar(45) NOT NULL,
  `First_Name` varchar(45) NOT NULL,
  `Middle_Initial` varchar(3) NOT NULL,
  `Name_Suffix` varchar(4) DEFAULT NULL,
  `Gender` char(1) NOT NULL,
  `Civil_Status` varchar(9) NOT NULL DEFAULT 'Single',
  `Mobile_Number` varchar(13) NOT NULL,
  `Landline` varchar(9) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Facebook` varchar(45) DEFAULT NULL,
  `Company_Name` varchar(100) NOT NULL,
  `Company_Address` text NOT NULL,
  `Position` varchar(45) NOT NULL,
  PRIMARY KEY (`Master_Trainer_ID`),
  UNIQUE KEY `Master_Trainer_ID_UNIQUE` (`Master_Trainer_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `other_class`
--

CREATE TABLE IF NOT EXISTS `other_class` (
  `Class_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Class_ID`),
  UNIQUE KEY `Class_ID_UNIQUE` (`Class_ID`),
  KEY `fk_Other_Class_Class1_idx` (`Class_ID`),
  KEY `fk_Other_Class_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `proctor`
--

CREATE TABLE IF NOT EXISTS `proctor` (
  `Proctor_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Last_Name` varchar(45) NOT NULL,
  `First_Name` varchar(45) NOT NULL,
  `Middle_Initial` varchar(5) NOT NULL,
  `Name_Suffix` varchar(4) DEFAULT NULL,
  `Gender` char(1) NOT NULL,
  `Civil_Status` varchar(9) NOT NULL DEFAULT 'Single',
  `Mobile_Number` varchar(13) NOT NULL,
  `Landline` varchar(9) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Facebook` varchar(45) DEFAULT NULL,
  `Company_Name` varchar(45) NOT NULL,
  `Company_Address` varchar(255) NOT NULL,
  `Position` varchar(45) NOT NULL,
  PRIMARY KEY (`Proctor_ID`),
  UNIQUE KEY `Proctor_ID_UNIQUE` (`Proctor_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Project_ID`, `Name`, `Institution`, `Year_Implemented`) VALUES
(1, 'CHED', 'CHED', NULL),
(2, 'SEI', 'SEI', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `related_trainings_attended`
--

CREATE TABLE IF NOT EXISTS `related_trainings_attended` (
  `Related_Trainings_Attended_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Training` varchar(45) NOT NULL,
  `Training_Body` varchar(250) NOT NULL,
  `Training_Date` datetime NOT NULL,
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Related_Trainings_Attended_ID`),
  UNIQUE KEY `Related_Trainings_Attended_ID_UNIQUE` (`Related_Trainings_Attended_ID`),
  KEY `fk_Related_Trainings_Attended_Teacher1` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `Code` varchar(25) NOT NULL,
  `Branch` varchar(45) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`School_ID`),
  UNIQUE KEY `School_ID_UNIQUE` (`School_ID`),
  UNIQUE KEY `Code_UNIQUE` (`Code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Code`, `Branch`, `Created_At`, `Updated_At`) VALUES
(1, 'Batangas State University', 'Batangas City', '4101111', 'batstatu@yahoo.com', 'Raymond Cruz', '09151234567', 'BatStateU-Lipa', 'Lipa', '2012-12-12 00:32:22', '2012-12-09 00:32:22'),
(2, 'Batangas State University', 'Batangas City', '4102222', 'batstatu@yahoo.com', 'Michelle Armario', '09129876789', 'BatStateU-Lemery', 'Lemery', '2012-12-12 00:32:22', '2012-12-10 00:32:22'),
(3, 'Batangas State University', 'Batangas City', '3212222', 'batstatu@yahoo.com', 'Michael Tan', '09182341234', 'BatStateU-Malvar', 'Malvar', '2011-10-31 00:32:22', '2011-12-11 00:32:22'),
(4, 'Batangas State University', 'Batangas City', '3232123', 'batstatu@yahoo.com', 'Joan Joner', '09182483211', 'BatStateU-Rosario', 'Rosario', '2012-10-11 00:00:00', '2011-12-12 00:00:00'),
(5, 'Batangas State University', 'Batangas City', '3232123', 'batstatu@yahoo.com', 'Joan Joner', '09182341234', 'BatStateU-San Juan', 'San Juan', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(6, 'Batangas State University', 'Batangas City', '3232123', 'batstatu@yahoo.com', 'Joan Joner', '09182341234', 'BatStateU-Balayan', 'Balayan', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(7, 'Batangas State University', 'Batangas City', '3232123', 'batstatu@yahoo.com', 'Joan Joner', '09182341234', 'BatStateU-Main', 'Main Campus 1', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(8, 'Batangas State University', 'Batangas City', '3232123', 'batstatu@yahoo.com', 'Joan Joner', '09182341234', 'BatStateU-Main 2', 'Main Campus 2', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(9, 'Adamson University', 'NCR', '3232123', 'adamson@gmail.com', 'Philip Peralta', '09182341234', 'AdU-NCR', 'NCR', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(10, 'Cavite State University', 'Cavite', '3232123', 'cvsu@gmail.com', 'Dayanara Simon', '09182341234', 'CVSU-Imus', 'Imus', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(11, 'Cavite State University', 'Cavite', '3232123', 'cvsu@gmail.com', 'Dayanara Simon', '09182341234', 'CVSU-Indang', 'Indang', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(12, 'Cavite State University', 'Cavite', '3232123', 'cvsu@gmail.com', 'Dayanara Simon', '09182341234', 'CVSU-Rosario', 'Rosario', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(13, 'Cavite State University', 'Cavite', '3232123', 'cvsu@gmail.com', 'Dayanara Simon', '09182341234', 'CVSU-Carmona', 'Carmona', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(14, 'Laguna State Polytechnic University', 'Laguna', '1556465', 'lvsu@gmail.com', 'Jerome Federico', '09177353228', 'LSPU-Siniloan', 'Siniloan', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(15, 'Laguna State Polytechnic University', 'Laguna', '1556465', 'lvsu@gmail.com', 'Jerome Federico', '09177353228', 'LSPU-Los Banos', 'Los Banos', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(16, 'Laguna State Polytechnic University', 'Laguna', '1556465', 'lvsu@gmail.com', 'Jerome Federico', '09177353228', 'LSPU-San Pablo', 'San Pablo', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(17, 'Laguna State Polytechnic University', 'Laguna', '1556465', 'lvsu@gmail.com', 'Jerome Federico', '09177353228', 'LSPU-Sta Cruz', 'Sta Cruz', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(18, 'Negros Oriental State University', 'Negros Oriental', '3235566', 'norsu@gmail.com', 'Paolo Luces', '09064939966', 'NORSU-Main', 'Main', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(19, 'Negros Oriental State University', 'Negros Oriental', '3235566', 'norsu@gmail.com', 'Paolo Luces', '09064939966', 'NORSU-Bayawan', 'Bayawan', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(20, 'Negros Oriental State University', 'Negros Oriental', '3235566', 'norsu@gmail.com', 'Paolo Luces', '09064939966', 'NORSU-Guihulngan', 'Guihulngan', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(21, 'Negros Oriental State University', 'Negros Oriental', '3235566', 'norsu@gmail.com', 'Paolo Luces', '09064939966', 'NORSU-Bais', 'Bais', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(22, 'Negros Oriental State University', 'Negros Oriental', '3235566', 'norsu@gmail.com', 'Paolo Luces', '09064939966', 'NORSU-Siaton', 'Siaton', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(23, 'Negros Oriental State University', 'Negros Oriental', '3235566', 'norsu@gmail.com', 'Paolo Luces', '09064939966', 'NORSU-Mabinay', 'Mabinay', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(24, 'Philippine Normal Univeristy', 'NCR', '4346578', 'pnu@gmail.com', 'Francisco Fajardo', '09071234564', 'PNU-Main', 'Main', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(25, 'Polytechnic University of the Philippines', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'PUP', 'Main', '2011-12-12 00:00:00', '2011-12-12 00:00:00'),
(26, 'Don Mariano Marcos State University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'DMMMSU', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(27, 'Pangasinan State University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'PangSU', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(28, 'Benguet State University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'BengSU', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(29, 'University of South Eastern Philippines', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'USEP', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(30, 'Western Visayas State University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'WVCST', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(31, 'Western Visayas College of Science and Technology', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'WVSU', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(32, 'Carlos Hilado Memorial State College', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'CHMSC', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(33, 'Nothern Iloilo Polytechnic State College', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'NIPSC', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(34, 'Batangas State University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'BatStateU-Lobo', 'Lobo', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(35, 'Batangas State University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'BatStateU-Nasugbu', 'Nasugbu', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(36, 'Laguna State Polytechnic University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'LSPU-Naic', 'Naic', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(37, 'Laguna State Polytechnic University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'LSPU-Cavite City', 'Cavite City', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(38, 'Laguna State Polytechnic University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'LSPU-Bacoor', 'Bacoor', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(39, 'Laguna State Polytechnic University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'LSPU-Silang', 'Silang', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(40, 'Laguna State Polytechnic University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'LSPU-General Trias', 'General Trias', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(41, 'Laguna State Polytechnic University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'LSPU-Tanza', 'Tanza', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(42, 'Laguna State Polytechnic University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'LSPU-Trece Martires', 'Trece Martires', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(43, 'Bulacan State University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'BulSU-Malolos', 'Malolos', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(44, 'Bulacan State University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'BulSU-Bustos', 'Bustos', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(45, 'Bulacan State University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'BulSU-Meneses', 'Meneses', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(46, 'Bulacan State University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'BulSU-Sarmiento', 'Sarmiento', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(47, 'Bulacan State University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'BulSU-Hagonoy', 'Hagonoy', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(48, 'University of Sto Tomas', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'UST', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(49, 'Technological University of the Philippines', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'TUP-Manila', 'Manila', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(50, 'Ateneo De Manila University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'TUP-Taguig', 'Taguig', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(51, 'Asia Pacific College', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'AdMU', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(52, 'Mapua Institute of Technology', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'APC', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(53, 'Mapua Institute of Technology', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'MIT-Main', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(54, 'University of the East', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'MIT-Makati', 'Makati', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(55, 'Technological Institute of the Philippines', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'UE', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(56, 'Technological Institute of the Philippines', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'TIP-Manila', 'Manila', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(57, 'Far Eastern University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'TIP-QC', 'Quezon City', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(58, 'Far Eastern University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'FEU-Main', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(59, 'De La Salle University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'FEU-EAC', 'EAC', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(60, 'University of the Philippines', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'DLSU', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(61, 'Univeristy of the Philippines', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'UP-Diliman', 'Diliman', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(62, 'Pamantasan Lungsod ng Maynila', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'UP-Manila', 'Manila', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(63, 'Rizal Technological University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'RTU', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(64, 'Our Lady of Fatima', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'Our Lady of Fatima', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(65, 'Arellano University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'Arellano University', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(66, 'STI', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'STI', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(67, 'Miriam College', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'Meriam College', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(68, 'Far Easten University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'FEU-FERN', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(69, 'Jose Rizal University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'JRU', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(70, 'Informatics', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'Informatics', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(71, 'Don Bosco Manila', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'Don Bosco Manila', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(72, 'De La Salle - College of Saint Benilde', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'DLS-CSB', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41'),
(73, 'Tarlac State University', 'NCR', '4346578', 'school@gmail.com', 'Person Name', '09000000000', 'TarSU', 'Main', '2011-12-12 00:00:00', '2014-02-14 03:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `school_project`
--

CREATE TABLE IF NOT EXISTS `school_project` (
  `School_Project_ID` int(11) NOT NULL,
  `School_ID` int(11) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  PRIMARY KEY (`School_Project_ID`),
  KEY `fk_School_Project_School1` (`School_ID`),
  KEY `fk_School_Project_Project1` (`Project_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_project`
--

INSERT INTO `school_project` (`School_Project_ID`, `School_ID`, `Project_ID`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 1),
(22, 22, 1),
(23, 23, 1),
(24, 24, 1),
(25, 25, 1),
(26, 26, 1),
(27, 27, 1),
(28, 28, 1),
(29, 29, 1),
(30, 30, 1),
(31, 31, 1),
(32, 32, 1),
(33, 33, 1),
(34, 34, 1),
(35, 35, 1),
(36, 36, 1),
(37, 37, 1),
(38, 38, 1),
(39, 39, 1),
(40, 40, 1),
(41, 41, 1),
(42, 42, 1),
(43, 43, 1),
(44, 44, 1),
(45, 45, 1),
(46, 46, 1),
(47, 47, 1),
(48, 48, 1),
(49, 49, 2),
(50, 50, 2),
(51, 51, 2),
(52, 52, 2),
(53, 53, 2),
(54, 54, 2),
(55, 55, 2),
(56, 56, 2),
(57, 57, 2),
(58, 58, 2),
(59, 59, 2),
(60, 60, 2),
(61, 61, 2),
(62, 62, 2),
(63, 63, 2),
(64, 64, 2),
(65, 65, 2),
(66, 66, 2),
(67, 67, 2),
(68, 68, 2),
(69, 69, 2),
(70, 70, 2),
(71, 71, 2),
(72, 72, 2),
(73, 73, 2),
(74, 24, 2),
(75, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `school_subject`
--

CREATE TABLE IF NOT EXISTS `school_subject` (
  `School_Subject_ID` int(11) NOT NULL,
  `School_ID` int(11) NOT NULL,
  `Subject_ID` int(11) NOT NULL,
  PRIMARY KEY (`School_Subject_ID`),
  KEY `fk_School_Subject_School1_idx` (`School_ID`),
  KEY `fk_School_Subject_Subject1_idx` (`Subject_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `Skills_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`Skills_ID`),
  UNIQUE KEY `Skills_ID_UNIQUE` (`Skills_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `smp_student_courses_taken`
--

CREATE TABLE IF NOT EXISTS `smp_student_courses_taken` (
  `SMP_Student_Courses_Taken_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Student_Class_ID` int(11) DEFAULT NULL,
  `Tracker_ID` int(11) NOT NULL,
  PRIMARY KEY (`SMP_Student_Courses_Taken_ID`),
  UNIQUE KEY `Student_Class_Student_Class_ID_UNIQUE` (`Student_Class_ID`),
  KEY `fk_SMP_Student_Courses_Taken_Student_Class1_idx` (`Student_Class_ID`),
  KEY `fk_SMP_Student_Courses_Taken_SMP_Student1_idx` (`Tracker_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `smp_t3_application`
--

CREATE TABLE IF NOT EXISTS `smp_t3_application` (
  `T3_Application_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Answer_1` text,
  `Answer_2` text,
  `Total_Number_Of_Subjects_Handled` int(11) NOT NULL,
  `Years_Teaching` int(11) NOT NULL,
  `Years_Teaching_In_Current_Institution` int(11) NOT NULL,
  `Avg_Student_Per_Class` int(11) NOT NULL,
  `Support_Offices_Available` text,
  `Instructional_Materials_Support` text,
  `Technology_Support` text,
  `Readily_Use_Lab` tinyint(1) NOT NULL DEFAULT '0',
  `Internet_Services` tinyint(1) NOT NULL DEFAULT '0',
  `Self_Assessment_Form_Business_Communication` tinyint(1) NOT NULL DEFAULT '0',
  `Self_Assessment_Form_Service_Culture` tinyint(1) NOT NULL DEFAULT '0',
  `Contract` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`T3_Application_ID`),
  UNIQUE KEY `T3_Application_ID_UNIQUE` (`T3_Application_ID`),
  KEY `fk_SMP_T3_Application_Teacher_Application1_idx` (`T3_Application_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `smp_t3_attendance`
--

CREATE TABLE IF NOT EXISTS `smp_t3_attendance` (
  `SMP_T3_Attendance_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Time_In` tinyint(1) NOT NULL DEFAULT '0',
  `AM_Snack` tinyint(1) NOT NULL DEFAULT '0',
  `Lunch` tinyint(1) NOT NULL DEFAULT '0',
  `PM_Snack` tinyint(1) NOT NULL DEFAULT '0',
  `Time_Out` tinyint(1) NOT NULL DEFAULT '0',
  `Date` datetime DEFAULT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`SMP_T3_Attendance_ID`),
  UNIQUE KEY `SMP_T3_Attendance_ID_UNIQUE` (`SMP_T3_Attendance_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  KEY `fk_SMP_T3_Attendance_Tracking_SMP_T3_Tracker1_idx` (`T3_Tracker_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `smp_t3_site_visit`
--

CREATE TABLE IF NOT EXISTS `smp_t3_site_visit` (
  `SMP_T3_Site_Visit_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Training_Location` varchar(45) NOT NULL,
  `Company_Host` varchar(45) NOT NULL,
  `Event_Date` datetime NOT NULL,
  `Feedback_Form` tinyint(1) NOT NULL DEFAULT '0',
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`SMP_T3_Site_Visit_ID`),
  UNIQUE KEY `SMP_T3_Site_Visit_ID_UNIQUE` (`SMP_T3_Site_Visit_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `smp_t3_tracker`
--

CREATE TABLE IF NOT EXISTS `smp_t3_tracker` (
  `T3_Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SMP_T3_Site_Visit_ID` int(11) NOT NULL,
  PRIMARY KEY (`T3_Tracker_ID`),
  UNIQUE KEY `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID`),
  KEY `fk_SMP_T3_Tracker_SMP_T3_Site_Visit1_idx` (`SMP_T3_Site_Visit_ID`),
  KEY `fk_SMP_T3_Tracker_T3_Tracker1_idx` (`T3_Tracker_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `Status_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  PRIMARY KEY (`Status_ID`),
  UNIQUE KEY `Status_ID_UNIQUE` (`Status_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Status_ID`, `Name`) VALUES
(1, 'Passed'),
(2, 'Fail'),
(3, 'Currently Taking'),
(4, 'Dropped');

-- --------------------------------------------------------

--
-- Table structure for table `stipend_tracking`
--

CREATE TABLE IF NOT EXISTS `stipend_tracking` (
  `Stipend_Tracking_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Amount` double NOT NULL DEFAULT '0',
  `Claimed` tinyint(1) NOT NULL DEFAULT '0',
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Stipend_Tracking_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Stipend_Tracking_List_ID`),
  KEY `fk_Stipend_Tracking_List_Stipend_Tracking1_idx` (`Stipend_Tracking_ID`),
  KEY `fk_Stipend_Tracking_List_Subject_ID1_idx` (`Subject_ID`),
  KEY `fk_Stipend_Tracking_List_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Student_ID` int(11) NOT NULL AUTO_INCREMENT,
  `School_ID` int(11) NOT NULL,
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
  `Expected_Year_of_Graduation` int(11) NOT NULL,
  `DOST_Scholar` tinyint(1) NOT NULL DEFAULT '0',
  `Scholar` tinyint(1) NOT NULL DEFAULT '0',
  `Interested_in_ITBPO` tinyint(1) NOT NULL,
  `Own_A_Computer` tinyint(1) DEFAULT '0',
  `Internet_Access` tinyint(1) DEFAULT '0',
  `Code` varchar(15) NOT NULL,
  PRIMARY KEY (`Student_ID`),
  UNIQUE KEY `Student_ID_UNIQUE` (`Student_ID`),
  UNIQUE KEY `Code` (`Code`),
  KEY `fk_Student_School1_idx` (`School_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student_application`
--

CREATE TABLE IF NOT EXISTS `student_application` (
  `Student_Application_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Contract` tinyint(1) DEFAULT NULL,
  `Student_ID` int(11) NOT NULL,
  `Project_ID` int(11) NOT NULL,
  `Subject_ID` int(11) NOT NULL,
  PRIMARY KEY (`Student_Application_ID`),
  KEY `fk_Student_Application_Student1_idx` (`Student_ID`),
  KEY `fk_Student_Application_Project1_idx` (`Project_ID`),
  KEY `fk_Student_Application_Subject_ID1_idx` (`Subject_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  KEY `fk_Student_Class_Class1_idx` (`Class_ID`),
  KEY `fk_Student_Class_Student1_idx` (`Student_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  KEY `fk_Student_Tracker_Tracker1_idx` (`Tracker_ID`),
  KEY `fk_Student_Tracker_Student1_idx` (`Student_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `Subject_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Subject_Name` varchar(45) NOT NULL,
  `Subject_Code` varchar(15) NOT NULL,
  PRIMARY KEY (`Subject_ID`),
  UNIQUE KEY `Subject_ID_UNIQUE` (`Subject_ID`),
  UNIQUE KEY `Subject_Code_UNIQUE` (`Subject_Code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES
(1, 'Global Competitiive Assessment Test', 'GCAT'),
(2, 'Basic English Skills Test', 'BEST'),
(3, 'Advanced English Proficiency Test', 'AdEPT'),
(4, 'Service Culture', 'SC101'),
(5, 'Systems Thinking', 'SYSTH101'),
(6, 'Business Process Outsourcing 1', 'BPO101'),
(7, 'Business Process Outsourcing 2', 'BPO102'),
(8, 'Language', 'BEST/AdEPT'),
(9, 'BPO Process', 'BPO101/102'),
(10, 'Business Communication', 'BizCom'),
(11, 'Internship', 'Intern');

-- --------------------------------------------------------

--
-- Table structure for table `t3_application`
--

CREATE TABLE IF NOT EXISTS `t3_application` (
  `T3_Application_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` varchar(45) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Subject_ID` int(11) NOT NULL,
  PRIMARY KEY (`T3_Application_ID`),
  UNIQUE KEY `T3_Application_ID_UNIQUE` (`T3_Application_ID`),
  KEY `fk_Teacher_Application_Subject1_idx` (`Subject_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t3_class`
--

CREATE TABLE IF NOT EXISTS `t3_class` (
  `T3_Class_ID` int(11) NOT NULL AUTO_INCREMENT,
  `School_ID` int(11) NOT NULL,
  `Subject_ID` int(11) NOT NULL,
  `Master_Trainer_ID` int(11) NOT NULL,
  `School_Year` varchar(10) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`T3_Class_ID`),
  UNIQUE KEY `T3_Class_ID_UNIQUE` (`T3_Class_ID`),
  KEY `fk_Section_School2` (`School_ID`),
  KEY `fk_Class_Subject1_idx` (`Subject_ID`),
  KEY `fk_T3_Class_Master_Trainer1_idx` (`Master_Trainer_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t3_tracker`
--

CREATE TABLE IF NOT EXISTS `t3_tracker` (
  `T3_Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Status_ID` int(11) NOT NULL,
  `Contract` tinyint(1) NOT NULL DEFAULT '0',
  `Remarks` varchar(250) DEFAULT NULL,
  `Subject_ID` int(11) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`T3_Tracker_ID`),
  UNIQUE KEY `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID`),
  KEY `fk_Teacher_Tracker_Status1_idx` (`Status_ID`),
  KEY `fk_Teacher_Tracker_Subject1_idx` (`Subject_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `Teacher_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Code` varchar(45) NOT NULL,
  `Name_Suffix` varchar(5) DEFAULT NULL,
  `Last_Name` varchar(45) NOT NULL,
  `First_Name` varchar(45) NOT NULL,
  `Middle_Initial` char(1) NOT NULL,
  `Birthdate` datetime NOT NULL,
  `Birthplace` varchar(45) NOT NULL DEFAULT 'Philippines',
  `Nationality` varchar(45) NOT NULL DEFAULT 'Filipino',
  `Total_Year_of_Teaching` int(11) NOT NULL,
  `Civil_Status` varchar(9) NOT NULL DEFAULT 'Single',
  `Gender` char(1) NOT NULL,
  `Desktop` tinyint(1) NOT NULL DEFAULT '0',
  `Laptop` tinyint(1) NOT NULL DEFAULT '0',
  `Internet` tinyint(1) NOT NULL DEFAULT '0',
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
  `Employment_Status` varchar(4) NOT NULL,
  `Current_Position` varchar(45) NOT NULL,
  `Current_Department` varchar(250) DEFAULT NULL,
  `School_ID` int(11) NOT NULL,
  `Name_of_Supervisor` varchar(45) NOT NULL,
  `Supervisor_Contact_Details` varchar(11) NOT NULL,
  `Position_of_Supervisor` varchar(45) DEFAULT NULL,
  `Classes_Handling` text,
  `Resume` tinyint(1) NOT NULL,
  `Photo` tinyint(1) NOT NULL DEFAULT '0',
  `Proof_of_Certification` tinyint(1) NOT NULL DEFAULT '0',
  `Diploma_TOR` tinyint(1) NOT NULL DEFAULT '0',
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Teacher_ID`),
  UNIQUE KEY `Teacher_ID_UNIQUE` (`Teacher_ID`),
  KEY `fk_Teacher_School1_idx` (`School_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_affiliation_to_organization`
--

CREATE TABLE IF NOT EXISTS `teacher_affiliation_to_organization` (
  `Teacher_Affiliation_to_Organization_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Organization` varchar(45) NOT NULL,
  `Description` varchar(45) DEFAULT NULL,
  `Positions` varchar(45) DEFAULT NULL,
  `Years_Affiliated` int(11) DEFAULT NULL,
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_Affiliation_to_Organization_ID`),
  KEY `fk_Teacher_Affliation_to_Organization_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_awards`
--

CREATE TABLE IF NOT EXISTS `teacher_awards` (
  `Teacher_Awards_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Award` varchar(45) NOT NULL,
  `Awarding_Body` varchar(45) NOT NULL,
  `Date_Received` datetime DEFAULT NULL,
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_Awards_ID`),
  UNIQUE KEY `Teacher_Awards_ID_UNIQUE` (`Teacher_Awards_ID`),
  KEY `fk_Teacher_Awards_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_computer_familiarity`
--

CREATE TABLE IF NOT EXISTS `teacher_computer_familiarity` (
  `Teacher_Computer_Familiarity_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Teacher_ID` int(11) NOT NULL,
  `Computer_Skills_ID` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_Computer_Familiarity_ID`),
  UNIQUE KEY `Teacher_Computer_Familiarity_ID_UNIQUE` (`Teacher_Computer_Familiarity_ID`),
  KEY `fk_Teacher_Computer_Familiarity_Teacher1_idx` (`Teacher_ID`),
  KEY `fk_Teacher_Computer_Familiarity_Skills1_idx` (`Computer_Skills_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_computer_profiency`
--

CREATE TABLE IF NOT EXISTS `teacher_computer_profiency` (
  `Teacher_Computer_Profiency_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Computer_Skills_ID` int(11) NOT NULL,
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_Computer_Profiency_ID`),
  UNIQUE KEY `Teacher_Computer_Profiency_ID_UNIQUE` (`Teacher_Computer_Profiency_ID`),
  KEY `fk_Teacher_Computer_Profiency_Skills1_idx` (`Computer_Skills_ID`),
  KEY `fk_Teacher_Computer_Profiency_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_relevant_experiences`
--

CREATE TABLE IF NOT EXISTS `teacher_relevant_experiences` (
  `Teacher_Relevant_Experiences_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Organization` varchar(250) NOT NULL,
  `Position` varchar(45) NOT NULL,
  `Description` varchar(250) DEFAULT NULL,
  `Date` datetime NOT NULL,
  `Teacher_ID` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_Relevant_Experiences_ID`),
  KEY `fk_Teacher_Relevant_Experiences_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  KEY `fk_Teacher_T3_Tracker_T3_Tracker1_idx` (`T3_Tracker_ID`),
  KEY `fk_Teacher_T3_Tracker_Teacher1_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_training_experience`
--

CREATE TABLE IF NOT EXISTS `teacher_training_experience` (
  `Teacher_Training_Experience_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Teacher_ID` int(11) NOT NULL,
  `Institution` varchar(250) NOT NULL,
  `Position` varchar(45) NOT NULL,
  `Date` int(4) NOT NULL,
  `Level_Taught` varchar(250) NOT NULL,
  `Courses_Taught` text NOT NULL,
  `Number_of_Years_in_Institution` int(11) NOT NULL,
  PRIMARY KEY (`Teacher_Training_Experience_ID`),
  UNIQUE KEY `Teacher_Training_Experience_ID_UNIQUE` (`Teacher_Training_Experience_ID`),
  KEY `fk_Teacher_Training_Experience_Teacher_idx` (`Teacher_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tracker`
--

CREATE TABLE IF NOT EXISTS `tracker` (
  `Tracker_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Remarks` varchar(255) DEFAULT NULL,
  `Status_ID` int(11) NOT NULL,
  `Times_Taken` int(11) NOT NULL DEFAULT '1',
  `Subject_ID` int(11) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Tracker_ID`),
  UNIQUE KEY `Tracker_ID_UNIQUE` (`Tracker_ID`),
  KEY `fk_Tracker_Status1_idx` (`Status_ID`),
  KEY `fk_Tracker_Subject1_idx` (`Subject_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) DEFAULT NULL,
  `First_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `School_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`User_ID`),
  KEY `fk_User_School1` (`School_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Username`, `First_Name`, `Last_Name`, `Password`, `Type`, `School_ID`) VALUES
(1, 'rcruz', 'Raymond', 'Cruz', '9a73055b9e5a5edbf80c34198e05f0d1', 'admin', NULL),
(2, 'pluces', 'Paolo', 'Luces', '1532136b72115a3f2c6fcd81bf80e7f4', 'admin', NULL),
(3, 'jfederico', 'Joy', 'Federico', 'c2c8e798aecbc26d86e4805114b03c51', 'admin', NULL),
(4, 'pperalta', 'Phil', 'Peralta', 'd14ffd41334ec4b4b3f2c0d55c38be6f', 'admin', NULL),
(5, 'ffajardo', 'Francis', 'Fajardo', 'd0ab7fe6c314f4fe5b6c18a0157c96b4', 'admin', NULL),
(6, 'ABC11', 'Aaron', 'Casurao', '65079b006e85a7e798abecb99e47c154', 'admin', NULL),
(7, 'marmario', 'Mitch', 'Armario', 'fae53351b9effc708e764e871bef3119', 'admin', NULL),
(8, 'guest', 'Guest', 'User', '084e0343a0486ff05530df6c705c8bb4', 'guest', NULL),
(9, 'mandogs', 'Manolo', 'Valena', '3c3662bcb661d6de679c636744c66b62', 'encoder', 1),
(10, 'asimon', 'Dayanara', 'Simon', '3ed1e37160ebb08e46c400d93b1861b6', 'admin', NULL),
(11, 'etan', 'Evan', 'Tan', '98cc7d37dc7b90c14a59ef0c5caa8995', 'admin', NULL),
(12, 'guygongco', 'Glu', 'Uygongco', 'ce7d948e963a37f3137c29e77b152fd4', 'admin', NULL),
(13, 'rcarrillo', 'Raphael', 'Carrillo', 'ea7b6298bf5045f78be77dadbc289142', 'admin', NULL),
(14, 'arimbao', 'Alecx', 'Rimbao', 'ab38ea8c20eae607665c508887ec7333', 'admin', NULL),
(15, 'tgerobiese', 'Trishia', 'Gerobiese', '663dfb18f856a06cd996651234c2aa23', 'admin', NULL),
(16, 'cjaldon', 'Simone', 'Jaldon', '47eb752bac1c08c75e30d9624b3e58b7', 'admin', NULL),
(17, 'encoder', 'Hi', 'Lol', '5f4dcc3b5aa765d61d8327deb882cf99', 'encoder', 69);

-- --------------------------------------------------------

--
-- Table structure for table `users_targets`
--

CREATE TABLE IF NOT EXISTS `users_targets` (
  `Users_Targets_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Target_For` varchar(250) DEFAULT NULL,
  `LFA` int(11) DEFAULT NULL,
  `QTR_1` int(11) DEFAULT NULL,
  `QTR_2` int(11) DEFAULT NULL,
  `QTR_3` int(11) DEFAULT NULL,
  `QTR_4` int(11) DEFAULT NULL,
  `Year` int(4) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_At` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `User_ID` int(11) NOT NULL,
  PRIMARY KEY (`Users_Targets_ID`),
  KEY `fk_Users_Targets_Users1` (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `users_targets`
--

INSERT INTO `users_targets` (`Users_Targets_ID`, `Target_For`, `LFA`, `QTR_1`, `QTR_2`, `QTR_3`, `QTR_4`, `Year`, `Created_At`, `Updated_At`, `User_ID`) VALUES
(1, 'Teachers Trained in GCAT', 2000, 400, 400, 400, 400, 2011, '2014-02-14 06:58:31', '2014-02-22 07:15:28', 3),
(2, 'Teachers Trained in Best', 2000, 400, 400, 400, 400, 2011, '2014-02-14 06:58:31', '2014-02-22 07:15:28', 3),
(3, 'Teachers Trained in AdEPT', 2000, 400, 400, 400, 400, 2011, '2014-02-14 06:58:31', '2014-02-22 07:15:28', 3),
(4, 'Teachers Trained in SMP Subjects', 2000, 400, 400, 400, 400, 2011, '2014-02-14 06:58:31', '2014-02-22 07:15:28', 3),
(5, 'Teachers Trained in BPO101', 2000, 400, 400, 400, 400, 2011, '2014-02-14 06:58:31', '2014-02-22 07:15:28', 3),
(6, 'Teachers Trained in BPO102', 2000, 400, 400, 400, 400, 2011, '2014-02-14 06:58:31', '2014-02-22 07:15:28', 3),
(7, 'Teachers Trained in Service Culture', 2000, 400, 400, 400, 400, 2011, '2014-02-14 06:58:31', '2014-02-22 07:15:28', 3),
(8, 'Teachers Trained in Business Communication', 2000, 400, 400, 400, 400, 2011, '2014-02-14 06:58:31', '2014-02-22 07:15:28', 3),
(9, 'Teachers Trained in Systems Thinking', 2000, 400, 400, 400, 400, 2011, '2014-02-14 06:58:31', '2014-02-22 07:15:28', 3),
(10, 'SUC''s with complete SMP Subjects and Trained TSeachers', 17, 1, 1, 1, 1, 2011, '2014-02-14 06:58:31', '2014-02-22 07:15:28', 3),
(11, 'Students completed in GCAT', 20000, 1200, 1200, 1200, 1200, 2011, '2014-02-14 06:58:31', '2014-02-22 07:15:28', 3),
(12, 'Students completed in BEST', 20000, 1200, 1200, 1200, 1200, 2011, '2014-02-14 06:58:31', '2014-02-22 07:15:28', 3),
(13, 'Students completed in AdEPT', 20000, 1200, 1200, 1200, 1200, 2011, '2014-02-14 06:58:31', '2014-02-22 07:15:28', 3),
(14, 'Students enrolled in any SMP', 20000, 1200, 1200, 1200, 1200, 2011, '2014-02-14 06:58:31', '2014-02-22 07:15:28', 3),
(15, 'Students enrolled in BPO101', 20000, 1200, 1200, 1200, 1200, 2011, '2014-02-14 06:58:31', '2014-02-22 07:15:28', 3),
(16, 'Students enrolled in BPO102', 20000, 1200, 1200, 1200, 1200, 2011, '2014-02-14 06:58:32', '2014-02-22 07:15:28', 3),
(17, 'Students enrolled in Service Culture', 20000, 1200, 1200, 1200, 1200, 2011, '2014-02-14 06:58:32', '2014-02-22 07:15:28', 3),
(18, 'Students enrolled in Business Communication', 20000, 1200, 1200, 1200, 1200, 2011, '2014-02-14 06:58:32', '2014-02-22 07:15:28', 3),
(19, 'Students enrolled in Systems Thinking', 20000, 1200, 1200, 1200, 1200, 2011, '2014-02-14 06:58:32', '2014-02-22 07:15:28', 3),
(20, 'Students Completed in any SMP', 20000, 1200, 1200, 1200, 1200, 2011, '2014-02-14 06:58:32', '2014-02-22 07:15:28', 3),
(21, 'Students Completed in BPO101', 20000, 1200, 1200, 1200, 1200, 2011, '2014-02-14 06:58:32', '2014-02-22 07:15:28', 3),
(22, 'Students Completed in BPO102', 20000, 1200, 1200, 1200, 1200, 2011, '2014-02-14 06:58:32', '2014-02-22 07:15:28', 3),
(23, 'Students Completed in Service Culture', 20000, 1200, 1200, 1200, 1200, 2011, '2014-02-14 06:58:32', '2014-02-22 07:15:28', 3),
(24, 'Students Completed in Business Communication', 20000, 1200, 1200, 1200, 1200, 2011, '2014-02-14 06:58:32', '2014-02-22 07:15:28', 3),
(25, 'Students Completed in Systems Thinking', 20000, 1200, 1200, 1200, 1200, 2011, '2014-02-14 06:58:32', '2014-02-22 07:15:28', 3),
(26, 'Students Completed in Internship', 20000, 1200, 1200, 1200, 1200, 2011, '2014-02-14 06:58:32', '2014-02-22 07:15:28', 3);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adept_student`
--
ALTER TABLE `adept_student`
  ADD CONSTRAINT `fk_Adept_Student_Tracker1` FOREIGN KEY (`Tracker_ID`) REFERENCES `tracker` (`Tracker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `adept_t3_tracker`
--
ALTER TABLE `adept_t3_tracker`
  ADD CONSTRAINT `fk_Adept_T3_Tracker_Adept_T3_Attendance1` FOREIGN KEY (`Adept_T3_Attendance_ID`) REFERENCES `adept_t3_attendance` (`Adept_T3_Attendance_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Adept_T3_Tracker_Adept_T3_Grades1` FOREIGN KEY (`Adept_T3_Grades_ID`) REFERENCES `adept_t3_grades` (`Adept_T3_Grades_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Adept_T3_Tracker_Teacher_Tracker1` FOREIGN KEY (`T3_Tracker_ID`) REFERENCES `t3_tracker` (`T3_Tracker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `best_adept_t3_application`
--
ALTER TABLE `best_adept_t3_application`
  ADD CONSTRAINT `fk_Best_Adept_T3_Application_Teacher_Application1` FOREIGN KEY (`T3_Application_ID`) REFERENCES `t3_application` (`T3_Application_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `best_student`
--
ALTER TABLE `best_student`
  ADD CONSTRAINT `fk_BEST_Student_Tracker1` FOREIGN KEY (`Tracker_ID`) REFERENCES `tracker` (`Tracker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `best_t3_tracker`
--
ALTER TABLE `best_t3_tracker`
  ADD CONSTRAINT `fk_Adept_T3_Tracker_Best_T3_Attendance1` FOREIGN KEY (`Best_T3_Attendance_ID`) REFERENCES `best_t3_attendance` (`Best_T3_Attendance_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Adept_T3_Tracker_Best_T3_Grades1` FOREIGN KEY (`Best_T3_Grades_ID`) REFERENCES `best_t3_grades` (`Best_T3_Grades_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Best_T3_Tracker_Teacher_Tracker1` FOREIGN KEY (`T3_Tracker_ID`) REFERENCES `t3_tracker` (`T3_Tracker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `fk_Class_Subject1` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Section_School2` FOREIGN KEY (`School_ID`) REFERENCES `school` (`School_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gcat_class`
--
ALTER TABLE `gcat_class`
  ADD CONSTRAINT `fk_GCAT_Class_Class1` FOREIGN KEY (`Class_ID`) REFERENCES `class` (`Class_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_GCAT_Class_Proctor1` FOREIGN KEY (`Proctor_ID`) REFERENCES `proctor` (`Proctor_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gcat_student`
--
ALTER TABLE `gcat_student`
  ADD CONSTRAINT `fk_GCAT_Student_Tracker1` FOREIGN KEY (`Tracker_ID`) REFERENCES `tracker` (`Tracker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gcat_tracker`
--
ALTER TABLE `gcat_tracker`
  ADD CONSTRAINT `fk_GCAT_T3_Tracker_Teacher_Tracker1` FOREIGN KEY (`T3_Tracker_ID`) REFERENCES `t3_tracker` (`T3_Tracker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `internship_student`
--
ALTER TABLE `internship_student`
  ADD CONSTRAINT `fk_Internship_Student_Tracker1` FOREIGN KEY (`Tracker_ID`) REFERENCES `tracker` (`Tracker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_Log_Users1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `other_class`
--
ALTER TABLE `other_class`
  ADD CONSTRAINT `fk_Other_Class_Class1` FOREIGN KEY (`Class_ID`) REFERENCES `class` (`Class_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Other_Class_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `related_trainings_attended`
--
ALTER TABLE `related_trainings_attended`
  ADD CONSTRAINT `fk_Related_Trainings_Attended_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `school_project`
--
ALTER TABLE `school_project`
  ADD CONSTRAINT `fk_School_Project_Project1` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_School_Project_School1` FOREIGN KEY (`School_ID`) REFERENCES `school` (`School_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `school_subject`
--
ALTER TABLE `school_subject`
  ADD CONSTRAINT `fk_School_Subject_School1` FOREIGN KEY (`School_ID`) REFERENCES `school` (`School_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_School_Subject_Subject1` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `smp_student`
--
ALTER TABLE `smp_student`
  ADD CONSTRAINT `fk_SMP_Student_Tracker1` FOREIGN KEY (`Tracker_ID`) REFERENCES `tracker` (`Tracker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `smp_student_courses_taken`
--
ALTER TABLE `smp_student_courses_taken`
  ADD CONSTRAINT `fk_SMP_Student_Subjects_Taken_Tracker1` FOREIGN KEY (`Tracker_ID`) REFERENCES `tracker` (`Tracker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `smp_t3_application`
--
ALTER TABLE `smp_t3_application`
  ADD CONSTRAINT `fk_SMP_T3_Application_Teacher_Application1` FOREIGN KEY (`T3_Application_ID`) REFERENCES `t3_application` (`T3_Application_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `smp_t3_attendance_tracking`
--
ALTER TABLE `smp_t3_attendance_tracking`
  ADD CONSTRAINT `fk_SMP_T3_Attendance_Tracking_SMP_T3_Attendance1` FOREIGN KEY (`SMP_T3_Attendance_ID`) REFERENCES `smp_t3_attendance` (`SMP_T3_Attendance_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_SMP_T3_Attendance_Tracking_SMP_T3_Tracker1` FOREIGN KEY (`T3_Tracker_ID`) REFERENCES `smp_t3_tracker` (`T3_Tracker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `smp_t3_tracker`
--
ALTER TABLE `smp_t3_tracker`
  ADD CONSTRAINT `fk_SMP_T3_Tracker_SMP_T3_Site_Visit1` FOREIGN KEY (`SMP_T3_Site_Visit_ID`) REFERENCES `smp_t3_site_visit` (`SMP_T3_Site_Visit_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_SMP_T3_Tracker_T3_Tracker1` FOREIGN KEY (`T3_Tracker_ID`) REFERENCES `t3_tracker` (`T3_Tracker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stipend_tracking_list`
--
ALTER TABLE `stipend_tracking_list`
  ADD CONSTRAINT `fk_Stipend_Tracking_List_Stipend_Tracking1` FOREIGN KEY (`Stipend_Tracking_ID`) REFERENCES `stipend_tracking` (`Stipend_Tracking_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Stipend_Tracking_List_Subject_ID1` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Stipend_Tracking_List_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_Student_School1` FOREIGN KEY (`School_ID`) REFERENCES `school` (`School_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_application`
--
ALTER TABLE `student_application`
  ADD CONSTRAINT `fk_Student_Application_Project1` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Student_Application_Student1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Student_Application_Subject_ID1` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_class`
--
ALTER TABLE `student_class`
  ADD CONSTRAINT `fk_Student_Class_Class1` FOREIGN KEY (`Class_ID`) REFERENCES `class` (`Class_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Student_Class_Student1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_computer_skills`
--
ALTER TABLE `student_computer_skills`
  ADD CONSTRAINT `fk_Student_Computer_Skills_Computer_Skills1` FOREIGN KEY (`Computer_Skills_ID`) REFERENCES `computer_skills` (`Computer_Skills_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Student_Computer_Skills_Student1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_organization_affiliations`
--
ALTER TABLE `student_organization_affiliations`
  ADD CONSTRAINT `fk_Student_Organization_Affiliations_Organization_Affiliations1` FOREIGN KEY (`Organization_Affiliations_ID`) REFERENCES `organization_affiliations` (`Organization_Affiliations_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Student_Organization_Affiliations_Student1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_skills`
--
ALTER TABLE `student_skills`
  ADD CONSTRAINT `fk_Student_Skills_Skills1` FOREIGN KEY (`Skills_ID`) REFERENCES `skills` (`Skills_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Student_Skills_Student1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_tracker`
--
ALTER TABLE `student_tracker`
  ADD CONSTRAINT `fk_Student_Tracker_Student1` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Student_Tracker_Tracker1` FOREIGN KEY (`Tracker_ID`) REFERENCES `tracker` (`Tracker_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t3_application`
--
ALTER TABLE `t3_application`
  ADD CONSTRAINT `fk_Teacher_Application_Subject1` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t3_class`
--
ALTER TABLE `t3_class`
  ADD CONSTRAINT `fk_Class_Subject10` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Section_School20` FOREIGN KEY (`School_ID`) REFERENCES `school` (`School_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_T3_Class_Master_Trainer1` FOREIGN KEY (`Master_Trainer_ID`) REFERENCES `master_trainer` (`Master_Trainer_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t3_tracker`
--
ALTER TABLE `t3_tracker`
  ADD CONSTRAINT `fk_Teacher_Tracker_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`Status_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Teacher_Tracker_Subject1` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_Teacher_School1` FOREIGN KEY (`School_ID`) REFERENCES `school` (`School_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_affiliation_to_organization`
--
ALTER TABLE `teacher_affiliation_to_organization`
  ADD CONSTRAINT `fk_Teacher_Affliation_to_Organization_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_awards`
--
ALTER TABLE `teacher_awards`
  ADD CONSTRAINT `fk_Teacher_Awards_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_certification`
--
ALTER TABLE `teacher_certification`
  ADD CONSTRAINT `fk_Teacher_Certification_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD CONSTRAINT `fk_Student_Class_Class10` FOREIGN KEY (`T3_Class_ID`) REFERENCES `t3_class` (`T3_Class_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Teacher_Class_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_computer_familiarity`
--
ALTER TABLE `teacher_computer_familiarity`
  ADD CONSTRAINT `fk_Teacher_Computer_Familiarity_Skills1` FOREIGN KEY (`Computer_Skills_ID`) REFERENCES `computer_skills` (`Computer_Skills_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Teacher_Computer_Familiarity_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_computer_profiency`
--
ALTER TABLE `teacher_computer_profiency`
  ADD CONSTRAINT `fk_Teacher_Computer_Profiency_Skills1` FOREIGN KEY (`Computer_Skills_ID`) REFERENCES `computer_skills` (`Computer_Skills_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Teacher_Computer_Profiency_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_other_skills`
--
ALTER TABLE `teacher_other_skills`
  ADD CONSTRAINT `fk_Teacher_Other_Skills_Skills1` FOREIGN KEY (`Skills_ID`) REFERENCES `skills` (`Skills_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Teacher_Other_Skills_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_professional_reference`
--
ALTER TABLE `teacher_professional_reference`
  ADD CONSTRAINT `fk_Teacher_Professional_Reference_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_relevant_experiences`
--
ALTER TABLE `teacher_relevant_experiences`
  ADD CONSTRAINT `fk_Teacher_Relevant_Experiences_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_t3_application`
--
ALTER TABLE `teacher_t3_application`
  ADD CONSTRAINT `fk_Teacher_T3_Application_T3_Application1` FOREIGN KEY (`T3_Application_ID`) REFERENCES `t3_application` (`T3_Application_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Teacher_T3_Application_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_t3_tracker`
--
ALTER TABLE `teacher_t3_tracker`
  ADD CONSTRAINT `fk_Teacher_T3_Tracker_T3_Tracker1` FOREIGN KEY (`T3_Tracker_ID`) REFERENCES `t3_tracker` (`T3_Tracker_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Teacher_T3_Tracker_Teacher1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_training_experience`
--
ALTER TABLE `teacher_training_experience`
  ADD CONSTRAINT `fk_Teacher_Training_Experience_Teacher` FOREIGN KEY (`Teacher_ID`) REFERENCES `teacher` (`Teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tracker`
--
ALTER TABLE `tracker`
  ADD CONSTRAINT `fk_Tracker_Status1` FOREIGN KEY (`Status_ID`) REFERENCES `status` (`Status_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Tracker_Subject1` FOREIGN KEY (`Subject_ID`) REFERENCES `subject` (`Subject_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_User_School1` FOREIGN KEY (`School_ID`) REFERENCES `school` (`School_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_targets`
--
ALTER TABLE `users_targets`
  ADD CONSTRAINT `fk_Users_Targets_Users1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
