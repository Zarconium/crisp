SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `crisp` DEFAULT CHARACTER SET utf8 ;
USE `crisp` ;

-- -----------------------------------------------------
-- Table `crisp`.`status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`status` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`status` (
  `Status_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(20) NOT NULL ,
  PRIMARY KEY (`Status_ID`) ,
  UNIQUE INDEX `Status_ID_UNIQUE` (`Status_ID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`tracker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`tracker` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`tracker` (
  `Tracker_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Contract?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Remarks` VARCHAR(255) NULL DEFAULT NULL ,
  `Status_ID` INT(11) NOT NULL ,
  `Times_Taken` INT(11) NOT NULL DEFAULT '1' ,
  PRIMARY KEY (`Tracker_ID`) ,
  UNIQUE INDEX `Tracker_ID_UNIQUE` (`Tracker_ID` ASC) ,
  INDEX `fk_Tracker_Status1_idx` (`Status_ID` ASC) ,
  CONSTRAINT `fk_Tracker_Status1`
    FOREIGN KEY (`Status_ID` )
    REFERENCES `crisp`.`status` (`Status_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`adept_student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`adept_student` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`adept_student` (
  `Tracker_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Control_Number` VARCHAR(5) NULL DEFAULT NULL ,
  `Username` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`Tracker_ID`) ,
  UNIQUE INDEX `Tracker_ID_UNIQUE` (`Tracker_ID` ASC) ,
  UNIQUE INDEX `Control_Number_UNIQUE` (`Control_Number` ASC) ,
  UNIQUE INDEX `Username_UNIQUE` (`Username` ASC) ,
  CONSTRAINT `fk_Adept_Student_Tracker1`
    FOREIGN KEY (`Tracker_ID` )
    REFERENCES `crisp`.`tracker` (`Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`adept_t3_attendance`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`adept_t3_attendance` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`adept_t3_attendance` (
  `Adept_T3_Attendance_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Orientation_Day` DATETIME NULL DEFAULT NULL ,
  `Site_Visit` DATETIME NULL DEFAULT NULL ,
  `Day_1` DATETIME NULL DEFAULT NULL ,
  `Day_2` DATETIME NULL DEFAULT NULL ,
  `Day_3` DATETIME NULL DEFAULT NULL ,
  `Day_4` DATETIME NULL DEFAULT NULL ,
  `Day_5` DATETIME NULL DEFAULT NULL ,
  `Day_6` DATETIME NULL DEFAULT NULL ,
  `GCAT` DATETIME NULL DEFAULT NULL ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`Adept_T3_Attendance_ID`) ,
  UNIQUE INDEX `Adept_T3_Attendance_ID_UNIQUE` (`Adept_T3_Attendance_ID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`adept_t3_grades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`adept_t3_grades` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`adept_t3_grades` (
  `Adept_T3_Grades_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`Adept_T3_Grades_ID`) ,
  UNIQUE INDEX `Adept_T3_Grades_ID_UNIQUE` (`Adept_T3_Grades_ID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`subject`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`subject` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`subject` (
  `Subject_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Subject_Name` VARCHAR(45) NOT NULL ,
  `Subject_Code` VARCHAR(8) NOT NULL ,
  PRIMARY KEY (`Subject_ID`) ,
  UNIQUE INDEX `Subject_ID_UNIQUE` (`Subject_ID` ASC) ,
  UNIQUE INDEX `Subject_Code_UNIQUE` (`Subject_Code` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`t3_tracker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`t3_tracker` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`t3_tracker` (
  `T3_Tracker_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Status_ID` INT(11) NOT NULL ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` DATETIME NULL DEFAULT NULL ,
  `Contract?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Remarks` VARCHAR(250) NULL DEFAULT NULL ,
  `Subject_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`T3_Tracker_ID`) ,
  UNIQUE INDEX `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID` ASC) ,
  INDEX `fk_Teacher_Tracker_Status1_idx` (`Status_ID` ASC) ,
  INDEX `fk_Teacher_Tracker_Subject1_idx` (`Subject_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Tracker_Status1`
    FOREIGN KEY (`Status_ID` )
    REFERENCES `crisp`.`status` (`Status_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Teacher_Tracker_Subject1`
    FOREIGN KEY (`Subject_ID` )
    REFERENCES `crisp`.`subject` (`Subject_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`adept_t3_tracker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`adept_t3_tracker` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`adept_t3_tracker` (
  `T3_Tracker_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Adept_T3_Grades_ID` INT(11) NOT NULL ,
  `Adept_T3_Attendance_ID` INT(11) NOT NULL ,
  `Interview_Form?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Site_Visit_Form?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Adept_T3_Feedback?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Adept_E-Learning_Feedback` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Manual_&_Kit` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Certificate_Of_Attendance` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Adept_Certified_Trainers` TINYINT(1) NOT NULL ,
  `Lesson_Plan` DOUBLE NULL DEFAULT '0' ,
  `Demo` DOUBLE NULL DEFAULT '0' ,
  `Total_Weigthed` DOUBLE NULL DEFAULT '0' ,
  `Training_Portfolio` DOUBLE NULL DEFAULT '0' ,
  `Control_Number` VARCHAR(5) NULL DEFAULT NULL ,
  `User_Name` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`T3_Tracker_ID`) ,
  UNIQUE INDEX `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID` ASC) ,
  UNIQUE INDEX `Control_Number_UNIQUE` (`Control_Number` ASC) ,
  UNIQUE INDEX `User_Name_UNIQUE` (`User_Name` ASC) ,
  INDEX `fk_Adept_T3_Tracker_copy1_Adept_T3_Grades1_idx` (`Adept_T3_Grades_ID` ASC) ,
  INDEX `fk_Adept_T3_Tracker_copy1_Adept_T3_Attendance1_idx` (`Adept_T3_Attendance_ID` ASC) ,
  INDEX `fk_Adept_T3_Tracker_Teacher_Tracker1_idx` (`T3_Tracker_ID` ASC) ,
  CONSTRAINT `fk_Adept_T3_Tracker_copy1_Adept_T3_Attendance1`
    FOREIGN KEY (`Adept_T3_Attendance_ID` )
    REFERENCES `crisp`.`adept_t3_attendance` (`Adept_T3_Attendance_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Adept_T3_Tracker_copy1_Adept_T3_Grades1`
    FOREIGN KEY (`Adept_T3_Grades_ID` )
    REFERENCES `crisp`.`adept_t3_grades` (`Adept_T3_Grades_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Adept_T3_Tracker_Teacher_Tracker1`
    FOREIGN KEY (`T3_Tracker_ID` )
    REFERENCES `crisp`.`t3_tracker` (`T3_Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`application` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`application` (
  `Application_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Answer_1` TEXT NULL DEFAULT NULL ,
  `Answer_2` TEXT NULL DEFAULT NULL ,
  `Contract?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Date` DATETIME NOT NULL ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`Application_ID`) ,
  UNIQUE INDEX `Application_ID_UNIQUE` (`Application_ID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`t3_application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`t3_application` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`t3_application` (
  `T3_Application_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Date` VARCHAR(45) NOT NULL ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` VARCHAR(45) NULL DEFAULT NULL ,
  `Subject_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`T3_Application_ID`) ,
  UNIQUE INDEX `T3_Application_ID_UNIQUE` (`T3_Application_ID` ASC) ,
  INDEX `fk_Teacher_Application_Subject1_idx` (`Subject_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Application_Subject1`
    FOREIGN KEY (`Subject_ID` )
    REFERENCES `crisp`.`subject` (`Subject_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`best_adept_t3_application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`best_adept_t3_application` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`best_adept_t3_application` (
  `T3_Application_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Answer_1` TEXT NULL DEFAULT NULL ,
  `Answer_2` TEXT NULL DEFAULT NULL ,
  `Answer_3` TEXT NULL DEFAULT NULL ,
  `Contract?` TINYINT(1) NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`T3_Application_ID`) ,
  UNIQUE INDEX `T3_Application_ID_UNIQUE` (`T3_Application_ID` ASC) ,
  INDEX `fk_Best_Adept_T3_Application_Teacher_Application1_idx` (`T3_Application_ID` ASC) ,
  CONSTRAINT `fk_Best_Adept_T3_Application_Teacher_Application1`
    FOREIGN KEY (`T3_Application_ID` )
    REFERENCES `crisp`.`t3_application` (`T3_Application_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`best_student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`best_student` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`best_student` (
  `Tracker_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Contol_Number` VARCHAR(5) NULL DEFAULT NULL ,
  `Username` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`Tracker_ID`) ,
  UNIQUE INDEX `Tracker_ID_UNIQUE` (`Tracker_ID` ASC) ,
  CONSTRAINT `fk_BEST_Student_Tracker1`
    FOREIGN KEY (`Tracker_ID` )
    REFERENCES `crisp`.`tracker` (`Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`best_t3_attendance`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`best_t3_attendance` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`best_t3_attendance` (
  `Best_T3_Attendance_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Orientation_Day` DATETIME NULL DEFAULT NULL ,
  `Site_Visit` DATETIME NULL DEFAULT NULL ,
  `Day_1` DATETIME NULL DEFAULT NULL ,
  `Day_2` DATETIME NULL DEFAULT NULL ,
  `Day_3` DATETIME NULL DEFAULT NULL ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`Best_T3_Attendance_ID`) ,
  UNIQUE INDEX `Best_T3_Attendance_ID_UNIQUE` (`Best_T3_Attendance_ID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`best_t3_grades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`best_t3_grades` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`best_t3_grades` (
  `Best_T3_Grades_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`Best_T3_Grades_ID`) ,
  UNIQUE INDEX `Best_T3_Grades_ID_UNIQUE` (`Best_T3_Grades_ID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`best_t3_tracker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`best_t3_tracker` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`best_t3_tracker` (
  `T3_Tracker_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Best_T3_Attendance_ID` INT(11) NOT NULL ,
  `Interview_Form?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Site_Visit_Form?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Best_T3_Feedback?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Best_E-Learning_Feedback` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Best_CD` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Certificate_Of_Attendance` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Best_Certified_Trainers` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Task_1` DOUBLE NULL DEFAULT '0' ,
  `Task_2` DOUBLE NULL DEFAULT '0' ,
  `Task_3` DOUBLE NULL DEFAULT '0' ,
  `Task_4` DOUBLE NULL DEFAULT '0' ,
  `Best_T3_Grades_ID` INT(11) NOT NULL ,
  `Control_Number` VARCHAR(5) NULL DEFAULT NULL ,
  `User_Name` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`T3_Tracker_ID`) ,
  UNIQUE INDEX `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID` ASC) ,
  UNIQUE INDEX `Control_Number_UNIQUE` (`Control_Number` ASC) ,
  UNIQUE INDEX `User_Name_UNIQUE` (`User_Name` ASC) ,
  INDEX `fk_Adept_T3_Tracker_Best_T3_Attendance1_idx` (`Best_T3_Attendance_ID` ASC) ,
  INDEX `fk_Adept_T3_Tracker_Best_T3_Grades1_idx` (`Best_T3_Grades_ID` ASC) ,
  INDEX `fk_Best_T3_Tracker_Teacher_Tracker1_idx` (`T3_Tracker_ID` ASC) ,
  CONSTRAINT `fk_Adept_T3_Tracker_Best_T3_Attendance1`
    FOREIGN KEY (`Best_T3_Attendance_ID` )
    REFERENCES `crisp`.`best_t3_attendance` (`Best_T3_Attendance_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Adept_T3_Tracker_Best_T3_Grades1`
    FOREIGN KEY (`Best_T3_Grades_ID` )
    REFERENCES `crisp`.`best_t3_grades` (`Best_T3_Grades_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Best_T3_Tracker_Teacher_Tracker1`
    FOREIGN KEY (`T3_Tracker_ID` )
    REFERENCES `crisp`.`t3_tracker` (`T3_Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`school`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`school` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`school` (
  `School_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(100) NOT NULL ,
  `Address` TEXT NOT NULL ,
  `Landline` VARCHAR(9) NOT NULL ,
  `Email` VARCHAR(45) NOT NULL ,
  `Point Person` VARCHAR(45) NOT NULL ,
  `Point_Person_Contact` VARCHAR(13) NOT NULL ,
  `Updated_At` DATETIME NULL DEFAULT NULL ,
  `Created_At` DATETIME NOT NULL ,
  `Code` VARCHAR(10) NOT NULL ,
  `Branch` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`School_ID`) ,
  UNIQUE INDEX `School_ID_UNIQUE` (`School_ID` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 5;


-- -----------------------------------------------------
-- Table `crisp`.`class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`class` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`class` (
  `Class_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `School_Year` VARCHAR(10) NOT NULL ,
  `Semester` INT(11) NOT NULL ,
  `School_ID` INT(11) NOT NULL ,
  `Subject_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Class_ID`) ,
  UNIQUE INDEX `Class_ID_UNIQUE` (`Class_ID` ASC) ,
  INDEX `fk_Section_School2_idx` (`School_ID` ASC) ,
  INDEX `fk_Class_Subject1_idx` (`Subject_ID` ASC) ,
  CONSTRAINT `fk_Class_Subject1`
    FOREIGN KEY (`Subject_ID` )
    REFERENCES `crisp`.`subject` (`Subject_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Section_School2`
    FOREIGN KEY (`School_ID` )
    REFERENCES `crisp`.`school` (`School_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`computer_skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`computer_skills` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`computer_skills` (
  `Computer_Skills_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`Computer_Skills_ID`) ,
  UNIQUE INDEX `Computer_Skills_ID_UNIQUE` (`Computer_Skills_ID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`proctor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`proctor` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`proctor` (
  `Proctor_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `First_Name` VARCHAR(45) NOT NULL ,
  `Middle_Initial` VARCHAR(5) NOT NULL ,
  `Last_Name` VARCHAR(45) NOT NULL ,
  `Name_Suffix` VARCHAR(4) NULL DEFAULT NULL ,
  `Company_Name` VARCHAR(45) NOT NULL ,
  `Company_Address` VARCHAR(255) NOT NULL ,
  `Position` VARCHAR(45) NOT NULL ,
  `Email` VARCHAR(45) NOT NULL ,
  `Facebook` VARCHAR(45) NULL DEFAULT NULL ,
  `Landline` VARCHAR(9) NOT NULL ,
  `Mobile_Number` VARCHAR(13) NOT NULL ,
  `Gender` CHAR(1) NOT NULL ,
  `Civil_Status` VARCHAR(9) NOT NULL DEFAULT 'Single' ,
  PRIMARY KEY (`Proctor_ID`) ,
  UNIQUE INDEX `Proctor_ID_UNIQUE` (`Proctor_ID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`gcat_class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`gcat_class` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`gcat_class` (
  `Class_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Proctor_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Class_ID`) ,
  UNIQUE INDEX `Class_ID_UNIQUE` (`Class_ID` ASC) ,
  INDEX `fk_GCAT_Class_Proctor1_idx` (`Proctor_ID` ASC) ,
  INDEX `fk_GCAT_Class_Class1_idx` (`Class_ID` ASC) ,
  CONSTRAINT `fk_GCAT_Class_Class1`
    FOREIGN KEY (`Class_ID` )
    REFERENCES `crisp`.`class` (`Class_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_GCAT_Class_Proctor1`
    FOREIGN KEY (`Proctor_ID` )
    REFERENCES `crisp`.`proctor` (`Proctor_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`gcat_student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`gcat_student` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`gcat_student` (
  `Tracker_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `GCAT_Total_Cognitive` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Responsiveness` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Reliability` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Empathy` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Courtesy` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Learning_Orientation` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Communication` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Behavioral_Component_Overall_Score` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Perceptual_Speed_&_Accuracy` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Computer_Literacy` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_English_Proficiency` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Basic_Skills_Test_Overall_Score` INT(11) NOT NULL DEFAULT '0' ,
  `Session_ID` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`Tracker_ID`) ,
  UNIQUE INDEX `Session_ID_UNIQUE` (`Session_ID` ASC) ,
  CONSTRAINT `fk_GCAT_Student_Tracker1`
    FOREIGN KEY (`Tracker_ID` )
    REFERENCES `crisp`.`tracker` (`Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`t3_class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`t3_class` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`t3_class` (
  `T3_Class_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `School_Year` VARCHAR(10) NOT NULL ,
  `Duration` VARCHAR(10) NOT NULL ,
  `School_ID` INT(11) NOT NULL ,
  `Subject_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`T3_Class_ID`) ,
  UNIQUE INDEX `T3_Class_ID_UNIQUE` (`T3_Class_ID` ASC) ,
  INDEX `fk_Section_School2` (`School_ID` ASC) ,
  INDEX `fk_Class_Subject1_idx` (`Subject_ID` ASC) ,
  CONSTRAINT `fk_Class_Subject10`
    FOREIGN KEY (`Subject_ID` )
    REFERENCES `crisp`.`subject` (`Subject_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Section_School20`
    FOREIGN KEY (`School_ID` )
    REFERENCES `crisp`.`school` (`School_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`gcat_t3_class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`gcat_t3_class` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`gcat_t3_class` (
  `T3_Class_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Proctor_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`T3_Class_ID`) ,
  UNIQUE INDEX `T3_Class_ID_UNIQUE` (`T3_Class_ID` ASC) ,
  INDEX `fk_GCAT_Class_Class1_idx` (`T3_Class_ID` ASC) ,
  INDEX `fk_GCAT_Class_copy1_Proctor1_idx` (`Proctor_ID` ASC) ,
  CONSTRAINT `fk_GCAT_Class_Class10`
    FOREIGN KEY (`T3_Class_ID` )
    REFERENCES `crisp`.`t3_class` (`T3_Class_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_GCAT_Class_copy1_Proctor1`
    FOREIGN KEY (`Proctor_ID` )
    REFERENCES `crisp`.`proctor` (`Proctor_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`gcat_tracker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`gcat_tracker` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`gcat_tracker` (
  `T3_Tracker_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `GCAT_Basic_Skills_Test_Overall_Score` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Total_Cognitive` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_English_Proficiency` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Computer_Literacy` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Perceptual_Speed_&_Accuracy` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Behavioral_Component_Overall_Score` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Communication` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Learning_Orientation` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Courtesy` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Empathy` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Reliability` INT(11) NOT NULL DEFAULT '0' ,
  `GCAT_Responsiveness` INT(11) NOT NULL DEFAULT '0' ,
  `Session_ID` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`T3_Tracker_ID`) ,
  UNIQUE INDEX `Session_ID_UNIQUE` (`Session_ID` ASC) ,
  UNIQUE INDEX `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID` ASC) ,
  INDEX `fk_GCAT_T3_Tracker_Teacher_Tracker1_idx` (`T3_Tracker_ID` ASC) ,
  CONSTRAINT `fk_GCAT_T3_Tracker_Teacher_Tracker1`
    FOREIGN KEY (`T3_Tracker_ID` )
    REFERENCES `crisp`.`t3_tracker` (`T3_Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`log`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`log` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`log` (
  `Log_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Made_By` VARCHAR(100) NOT NULL ,
  `Changes` TEXT NOT NULL ,
  `Created_At` DATETIME NOT NULL ,
  PRIMARY KEY (`Log_ID`) ,
  UNIQUE INDEX `Log_ID_UNIQUE` (`Log_ID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`master trainer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`master trainer` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`master trainer` (
  `Master_Trainer_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Last_Name` VARCHAR(45) NOT NULL ,
  `First_Name` VARCHAR(45) NOT NULL ,
  `Middle_Initial` VARCHAR(3) NOT NULL ,
  `Name_Suffix` VARCHAR(4) NULL DEFAULT NULL ,
  `Company_Name` VARCHAR(100) NOT NULL ,
  `Company_Address` TEXT NOT NULL ,
  `Position` VARCHAR(45) NOT NULL ,
  `Email` VARCHAR(45) NOT NULL ,
  `Facebook` VARCHAR(45) NULL DEFAULT NULL ,
  `Landline` VARCHAR(9) NOT NULL ,
  `Mobile_Number` VARCHAR(13) NOT NULL ,
  `Gender` CHAR(1) NOT NULL ,
  `Civil_Status` VARCHAR(9) NOT NULL DEFAULT 'Single' ,
  PRIMARY KEY (`Master_Trainer_ID`) ,
  UNIQUE INDEX `Master_Trainer_ID_UNIQUE` (`Master_Trainer_ID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`organization_affiliations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`organization_affiliations` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`organization_affiliations` (
  `Organization_Affiliations_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(255) NOT NULL ,
  `Position` VARCHAR(45) NOT NULL ,
  `Years_Affiliated` INT(11) NOT NULL ,
  `Description` VARCHAR(255) NULL DEFAULT NULL ,
  PRIMARY KEY (`Organization_Affiliations_ID`) ,
  UNIQUE INDEX `Organization_Affiliations_ID_UNIQUE` (`Organization_Affiliations_ID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`teacher`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`teacher` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`teacher` (
  `Teacher_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Street_Number` VARCHAR(5) NOT NULL ,
  `Street_Name` VARCHAR(45) NOT NULL ,
  `City` VARCHAR(45) NOT NULL ,
  `Province` VARCHAR(45) NOT NULL ,
  `Region` VARCHAR(45) NOT NULL ,
  `Alternate_Address` TEXT NULL DEFAULT NULL ,
  `Email` VARCHAR(45) NOT NULL ,
  `Facebook` VARCHAR(45) NULL DEFAULT NULL ,
  `Civil_Status` VARCHAR(9) NOT NULL DEFAULT 'Single' ,
  `Birthdate` DATETIME NOT NULL ,
  `Birthplace` VARCHAR(45) NOT NULL DEFAULT 'Philippines' ,
  `Gender` CHAR(1) NOT NULL ,
  `Nationality` VARCHAR(45) NOT NULL DEFAULT 'Filipino' ,
  `School_ID` INT(11) NOT NULL ,
  `Current_Position` VARCHAR(45) NOT NULL ,
  `Employment_Status` VARCHAR(4) NOT NULL ,
  `Name_of_Supervisor` VARCHAR(45) NOT NULL ,
  `Supervisor_Contact_Details` VARCHAR(11) NOT NULL ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` DATETIME NULL DEFAULT NULL ,
  `Resume?` TINYINT(1) NOT NULL ,
  `Photo?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Proof_of_Certification?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Diploma/TOR` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Desktop?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Laptop?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Internet?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Total_Year_of_Teaching` INT(11) NOT NULL ,
  `Code` VARCHAR(45) NOT NULL ,
  `First_Name` VARCHAR(45) NOT NULL ,
  `Mobile_Number` VARCHAR(13) NOT NULL ,
  `Name_Suffix` VARCHAR(5) NULL DEFAULT NULL ,
  `Middle_Initial` CHAR(1) NOT NULL ,
  `Last_Name` VARCHAR(45) NOT NULL ,
  `Landline` VARCHAR(9) NOT NULL ,
  PRIMARY KEY (`Teacher_ID`) ,
  UNIQUE INDEX `Teacher_ID_UNIQUE` (`Teacher_ID` ASC) ,
  INDEX `fk_Teacher_School1_idx` (`School_ID` ASC) ,
  CONSTRAINT `fk_Teacher_School1`
    FOREIGN KEY (`School_ID` )
    REFERENCES `crisp`.`school` (`School_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`other_class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`other_class` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`other_class` (
  `Class_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(45) NOT NULL ,
  `Teacher_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Class_ID`) ,
  UNIQUE INDEX `Class_ID_UNIQUE` (`Class_ID` ASC) ,
  INDEX `fk_Other_Class_Class1_idx` (`Class_ID` ASC) ,
  INDEX `fk_Other_Class_Teacher1_idx` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Other_Class_Class1`
    FOREIGN KEY (`Class_ID` )
    REFERENCES `crisp`.`class` (`Class_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Other_Class_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`other_t3_class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`other_t3_class` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`other_t3_class` (
  `T3_Class_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(45) NOT NULL ,
  `Master_Trainer_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`T3_Class_ID`) ,
  UNIQUE INDEX `T3_Class_ID_UNIQUE` (`T3_Class_ID` ASC) ,
  INDEX `fk_Other_Class_Class1_idx` (`T3_Class_ID` ASC) ,
  INDEX `fk_Other_T3_Class_Master Trainer1_idx` (`Master_Trainer_ID` ASC) ,
  CONSTRAINT `fk_Other_Class_Class10`
    FOREIGN KEY (`T3_Class_ID` )
    REFERENCES `crisp`.`t3_class` (`T3_Class_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Other_T3_Class_Master Trainer1`
    FOREIGN KEY (`Master_Trainer_ID` )
    REFERENCES `crisp`.`master trainer` (`Master_Trainer_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`project`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`project` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`project` (
  `Project_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(250) NOT NULL ,
  `Institution` VARCHAR(250) NOT NULL ,
  `Year_Implemented` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`Project_ID`) ,
  UNIQUE INDEX `Project_ID_UNIQUE` (`Project_ID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`related_trainings_attended`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`related_trainings_attended` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`related_trainings_attended` (
  `Related_Trainings_Attended_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Training` VARCHAR(45) NOT NULL ,
  `Training_Body` VARCHAR(250) NOT NULL ,
  `Training_Date` DATETIME NOT NULL ,
  PRIMARY KEY (`Related_Trainings_Attended_ID`) ,
  UNIQUE INDEX `Related_Trainings_Attended_ID_UNIQUE` (`Related_Trainings_Attended_ID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`smp_t3_application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`smp_t3_application` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`smp_t3_application` (
  `T3_Application_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Answer_1` TEXT NULL DEFAULT NULL ,
  `Answer_2` TEXT NULL DEFAULT NULL ,
  `Answer_3` TEXT NULL DEFAULT NULL ,
  `Total_Numbers_Of_Subjects_Handled` INT(11) NOT NULL ,
  `Years_Teaching` INT(11) NOT NULL ,
  `Years_Teaching_In_Current_Institution` INT(11) NOT NULL ,
  `Avg_Student_Per_Class` INT(11) NOT NULL ,
  `Support_Offices_Available` TEXT NULL DEFAULT NULL ,
  `Instructional_Materials_Support` TEXT NULL DEFAULT NULL ,
  `Technology_Support` TEXT NULL DEFAULT NULL ,
  `Readily_Use_Lab?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Internet_Services?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Self_Assessment_Form_Business_Communication` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Self_Assessment_Form_Service_Culture` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Contract?` TINYINT(1) NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`T3_Application_ID`) ,
  UNIQUE INDEX `T3_Application_ID_UNIQUE` (`T3_Application_ID` ASC) ,
  INDEX `fk_SMP_T3_Application_Teacher_Application1_idx` (`T3_Application_ID` ASC) ,
  CONSTRAINT `fk_SMP_T3_Application_Teacher_Application1`
    FOREIGN KEY (`T3_Application_ID` )
    REFERENCES `crisp`.`t3_application` (`T3_Application_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`related_trainings_attended_by_a_teacher`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`related_trainings_attended_by_a_teacher` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`related_trainings_attended_by_a_teacher` (
  `Related_Trainings_Attended_By_A_Teacher` INT(11) NOT NULL AUTO_INCREMENT ,
  `Related_Trainings_Attended_ID` INT(11) NOT NULL ,
  `SMP_T3_Application_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Related_Trainings_Attended_By_A_Teacher`) ,
  UNIQUE INDEX `Related_Trainings_Attended_By_A_Teacher_UNIQUE` (`Related_Trainings_Attended_By_A_Teacher` ASC) ,
  INDEX `fk_Related_Trainings_Attended_By_A_Teacher_Related_Training_idx` (`Related_Trainings_Attended_ID` ASC) ,
  INDEX `fk_Related_Trainings_Attended_By_A_Teacher_SMP_T3_Applicati_idx` (`SMP_T3_Application_ID` ASC) ,
  CONSTRAINT `fk_Related_Trainings_Attended_By_A_Teacher_Related_Trainings_1`
    FOREIGN KEY (`Related_Trainings_Attended_ID` )
    REFERENCES `crisp`.`related_trainings_attended` (`Related_Trainings_Attended_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Related_Trainings_Attended_By_A_Teacher_SMP_T3_Application1`
    FOREIGN KEY (`SMP_T3_Application_ID` )
    REFERENCES `crisp`.`smp_t3_application` (`T3_Application_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`skills` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`skills` (
  `Skills_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`Skills_ID`) ,
  UNIQUE INDEX `Skills_ID_UNIQUE` (`Skills_ID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`smp_student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`smp_student` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`smp_student` (
  `Tracker_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Grade` VARCHAR(5) NULL DEFAULT NULL ,
  PRIMARY KEY (`Tracker_ID`) ,
  UNIQUE INDEX `Tracker_ID_UNIQUE` (`Tracker_ID` ASC) ,
  INDEX `fk_SMP_Student_Tracker1_idx` (`Tracker_ID` ASC) ,
  CONSTRAINT `fk_SMP_Student_Tracker1`
    FOREIGN KEY (`Tracker_ID` )
    REFERENCES `crisp`.`tracker` (`Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`student` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`student` (
  `Student_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Last_Name` VARCHAR(45) NOT NULL ,
  `First_Name` VARCHAR(45) NOT NULL ,
  `Middle_Initial` VARCHAR(4) NOT NULL ,
  `Name_Suffix` VARCHAR(5) NULL DEFAULT NULL ,
  `Student_ID_Number` VARCHAR(10) NOT NULL ,
  `Civil_Status` VARCHAR(9) NOT NULL DEFAULT 'Single' ,
  `Birthdate` DATETIME NOT NULL ,
  `Birthplace` VARCHAR(45) NOT NULL DEFAULT 'Philippines' ,
  `Gender` CHAR(1) NOT NULL ,
  `Nationality` VARCHAR(45) NOT NULL DEFAULT 'Filipino' ,
  `Street_Number` VARCHAR(5) NOT NULL ,
  `Street_Name` VARCHAR(45) NOT NULL ,
  `City` VARCHAR(45) NOT NULL ,
  `Province` VARCHAR(45) NOT NULL ,
  `Region` VARCHAR(45) NOT NULL ,
  `Alternate_Address` TEXT NULL DEFAULT NULL ,
  `Mobile_Number` VARCHAR(13) NOT NULL ,
  `Landline` VARCHAR(9) NOT NULL ,
  `Email` VARCHAR(45) NOT NULL ,
  `Facebook` VARCHAR(45) NULL DEFAULT NULL ,
  `Course` VARCHAR(100) NOT NULL ,
  `Year` INT(11) NOT NULL ,
  `School_ID` INT(11) NOT NULL ,
  `Expected_Year_of_Graduation` INT(11) NOT NULL ,
  `DOST_Scholar?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Scholar?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Interested_in_IT-BPO?` TEXT NULL DEFAULT NULL ,
  `Own_A_Compter?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Internet_Access?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Code` VARCHAR(15) NOT NULL ,
  PRIMARY KEY (`Student_ID`) ,
  UNIQUE INDEX `Student_ID_UNIQUE` (`Student_ID` ASC) ,
  INDEX `fk_Student_School1_idx` (`School_ID` ASC) ,
  CONSTRAINT `fk_Student_School1`
    FOREIGN KEY (`School_ID` )
    REFERENCES `crisp`.`school` (`School_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`student_class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`student_class` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`student_class` (
  `Student_Class_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Class_ID` INT(11) NOT NULL ,
  `Student_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Student_Class_ID`) ,
  UNIQUE INDEX `Student_Class_ID_UNIQUE` (`Student_Class_ID` ASC) ,
  INDEX `fk_Student_Class_Class1_idx` (`Class_ID` ASC) ,
  INDEX `fk_Student_Class_Student1_idx` (`Student_ID` ASC) ,
  CONSTRAINT `fk_Student_Class_Class1`
    FOREIGN KEY (`Class_ID` )
    REFERENCES `crisp`.`class` (`Class_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Class_Student1`
    FOREIGN KEY (`Student_ID` )
    REFERENCES `crisp`.`student` (`Student_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`smp_student_courses_taken`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`smp_student_courses_taken` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`smp_student_courses_taken` (
  `SMP_Student_Courses_Taken_ID` VARCHAR(45) NOT NULL ,
  `Student_Class_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Tracker_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`SMP_Student_Courses_Taken_ID`) ,
  UNIQUE INDEX `Student_Class_Student_Class_ID_UNIQUE` (`Student_Class_ID` ASC) ,
  INDEX `fk_SMP_Student_Courses_Taken_Student_Class1_idx` (`Student_Class_ID` ASC) ,
  INDEX `fk_SMP_Student_Courses_Taken_SMP_Student1_idx` (`Tracker_ID` ASC) ,
  CONSTRAINT `fk_SMP_Student_Courses_Taken_SMP_Student1`
    FOREIGN KEY (`Tracker_ID` )
    REFERENCES `crisp`.`smp_student` (`Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SMP_Student_Courses_Taken_Student_Class1`
    FOREIGN KEY (`Student_Class_ID` )
    REFERENCES `crisp`.`student_class` (`Student_Class_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`smp_t3_attendance`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`smp_t3_attendance` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`smp_t3_attendance` (
  `SMP_T3_Attendance_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Time_In?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `AM_Snack?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Lunch?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `PM_Snack?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Time_Out?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Date` DATETIME NOT NULL ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`SMP_T3_Attendance_ID`) ,
  UNIQUE INDEX `SMP_T3_Attendance_ID_UNIQUE` (`SMP_T3_Attendance_ID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`smp_t3_site_visit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`smp_t3_site_visit` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`smp_t3_site_visit` (
  `SMP_T3_Site_Visit_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Training_Location` VARCHAR(45) NOT NULL ,
  `Company_Host` VARCHAR(45) NOT NULL ,
  `Event_Date` DATETIME NOT NULL ,
  `Feedback_Form?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`SMP_T3_Site_Visit_ID`) ,
  UNIQUE INDEX `SMP_T3_Site_Visit_ID_UNIQUE` (`SMP_T3_Site_Visit_ID` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`smp_t3_tracker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`smp_t3_tracker` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`smp_t3_tracker` (
  `T3_Tracker_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `SMP_T3_Site_Visit_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`T3_Tracker_ID`) ,
  UNIQUE INDEX `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID` ASC) ,
  INDEX `fk_SMP_T3_Tracker_SMP_T3_Site_Visit1_idx` (`SMP_T3_Site_Visit_ID` ASC) ,
  INDEX `fk_SMP_T3_Tracker_T3_Tracker1_idx` (`T3_Tracker_ID` ASC) ,
  CONSTRAINT `fk_SMP_T3_Tracker_SMP_T3_Site_Visit1`
    FOREIGN KEY (`SMP_T3_Site_Visit_ID` )
    REFERENCES `crisp`.`smp_t3_site_visit` (`SMP_T3_Site_Visit_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SMP_T3_Tracker_T3_Tracker1`
    FOREIGN KEY (`T3_Tracker_ID` )
    REFERENCES `crisp`.`t3_tracker` (`T3_Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`smp_t3_attendance_tracking`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`smp_t3_attendance_tracking` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`smp_t3_attendance_tracking` (
  `SMP_T3_Attendance_Tracking_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Event` VARCHAR(100) NOT NULL ,
  `SMP_T3_Attendance_ID` INT(11) NOT NULL ,
  `T3_Tracker_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`SMP_T3_Attendance_Tracking_ID`) ,
  UNIQUE INDEX `SMP_T3_Attendance_Tracking_ID_UNIQUE` (`SMP_T3_Attendance_Tracking_ID` ASC) ,
  INDEX `fk_SMP_T3_Attendance_Tracking_SMP_T3_Attendance1_idx` (`SMP_T3_Attendance_ID` ASC) ,
  INDEX `fk_SMP_T3_Attendance_Tracking_SMP_T3_Tracker1_idx` (`T3_Tracker_ID` ASC) ,
  CONSTRAINT `fk_SMP_T3_Attendance_Tracking_SMP_T3_Attendance1`
    FOREIGN KEY (`SMP_T3_Attendance_ID` )
    REFERENCES `crisp`.`smp_t3_attendance` (`SMP_T3_Attendance_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SMP_T3_Attendance_Tracking_SMP_T3_Tracker1`
    FOREIGN KEY (`T3_Tracker_ID` )
    REFERENCES `crisp`.`smp_t3_tracker` (`T3_Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`stipend_tracking`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`stipend_tracking` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`stipend_tracking` (
  `Stipend_Tracking_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Amount` DOUBLE NOT NULL DEFAULT '0' ,
  `Claimed?` TINYINT(1) NOT NULL DEFAULT '0' ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` DATETIME NULL DEFAULT NULL ,
  `Teacher_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Stipend_Tracking_ID`) ,
  INDEX `fk_Stipend_Tracking_Teacher1_idx` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Stipend_Tracking_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`stipend_tracking_list`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`stipend_tracking_list` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`stipend_tracking_list` (
  `Stipend_Tracking_List_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Date` VARCHAR(45) NOT NULL ,
  `Checked_By` VARCHAR(100) NOT NULL ,
  `Stipend_Tracking_ID` INT(11) NOT NULL ,
  `Subject_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Stipend_Tracking_List_ID`) ,
  INDEX `fk_Stipend_Tracking_List_Stipend_Tracking1_idx` (`Stipend_Tracking_ID` ASC) ,
  INDEX `fk_Stipend_Tracking_List_Subject_ID1_idx` (`Subject_ID` ASC) ,
  CONSTRAINT `fk_Stipend_Tracking_List_Stipend_Tracking1`
    FOREIGN KEY (`Stipend_Tracking_ID` )
    REFERENCES `crisp`.`stipend_tracking` (`Stipend_Tracking_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Stipend_Tracking_List_Subject_ID1`
    FOREIGN KEY (`Subject_ID` )
    REFERENCES `crisp`.`subject` (`Subject_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`student_application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`student_application` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`student_application` (
  `Student_Application_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Application_ID` INT(11) NOT NULL ,
  `Student_ID` INT(11) NOT NULL ,
  `Project_ID` INT(11) NOT NULL ,
  `Subject_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Student_Application_ID`) ,
  UNIQUE INDEX `Student_Application_ID_UNIQUE` (`Student_Application_ID` ASC) ,
  INDEX `fk_Student_Application_Application1_idx` (`Application_ID` ASC) ,
  INDEX `fk_Student_Application_Student2_idx` (`Student_ID` ASC) ,
  INDEX `fk_Student_Application_Project2_idx` (`Project_ID` ASC) ,
  INDEX `fk_Student_Application_Subject1_idx` (`Subject_ID` ASC) ,
  CONSTRAINT `fk_Student_Application_Application1`
    FOREIGN KEY (`Application_ID` )
    REFERENCES `crisp`.`application` (`Application_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Application_Project2`
    FOREIGN KEY (`Project_ID` )
    REFERENCES `crisp`.`project` (`Project_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Application_Student2`
    FOREIGN KEY (`Student_ID` )
    REFERENCES `crisp`.`student` (`Student_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Application_Subject1`
    FOREIGN KEY (`Subject_ID` )
    REFERENCES `crisp`.`subject` (`Subject_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`student_computer_skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`student_computer_skills` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`student_computer_skills` (
  `Student_Computer_Skills_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Student_ID` INT(11) NOT NULL ,
  `Computer_Skills_ID` INT(11) NOT NULL ,
  `Level_Of_Proficiency` VARCHAR(45) NULL DEFAULT NULL ,
  PRIMARY KEY (`Student_Computer_Skills_ID`) ,
  UNIQUE INDEX `Student_Computer_Skills_ID_UNIQUE` (`Student_Computer_Skills_ID` ASC) ,
  INDEX `fk_Student_Computer_Skills_Student1_idx` (`Student_ID` ASC) ,
  INDEX `fk_Student_Computer_Skills_Computer_Skills1_idx` (`Computer_Skills_ID` ASC) ,
  CONSTRAINT `fk_Student_Computer_Skills_Computer_Skills1`
    FOREIGN KEY (`Computer_Skills_ID` )
    REFERENCES `crisp`.`computer_skills` (`Computer_Skills_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Computer_Skills_Student1`
    FOREIGN KEY (`Student_ID` )
    REFERENCES `crisp`.`student` (`Student_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`student_organization_affiliations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`student_organization_affiliations` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`student_organization_affiliations` (
  `Student_Organization_Affiliations_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Organization_Affiliations_ID` INT(11) NOT NULL ,
  `Student_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Student_Organization_Affiliations_ID`) ,
  UNIQUE INDEX `Student_Organization_Affiliations_ID_UNIQUE` (`Student_Organization_Affiliations_ID` ASC) ,
  INDEX `fk_Student_Organization_Affiliations_Organization_Affiliati_idx` (`Organization_Affiliations_ID` ASC) ,
  INDEX `fk_Student_Organization_Affiliations_Student1_idx` (`Student_ID` ASC) ,
  CONSTRAINT `fk_Student_Organization_Affiliations_Organization_Affiliations1`
    FOREIGN KEY (`Organization_Affiliations_ID` )
    REFERENCES `crisp`.`organization_affiliations` (`Organization_Affiliations_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Organization_Affiliations_Student1`
    FOREIGN KEY (`Student_ID` )
    REFERENCES `crisp`.`student` (`Student_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`student_skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`student_skills` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`student_skills` (
  `Student_Skills_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Student_ID` INT(11) NOT NULL ,
  `Skills_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Student_Skills_ID`) ,
  UNIQUE INDEX `Student_Skills_ID_UNIQUE` (`Student_Skills_ID` ASC) ,
  INDEX `fk_Student_Skills_Student1_idx` (`Student_ID` ASC) ,
  INDEX `fk_Student_Skills_Skills1_idx` (`Skills_ID` ASC) ,
  CONSTRAINT `fk_Student_Skills_Skills1`
    FOREIGN KEY (`Skills_ID` )
    REFERENCES `crisp`.`skills` (`Skills_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Skills_Student1`
    FOREIGN KEY (`Student_ID` )
    REFERENCES `crisp`.`student` (`Student_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`student_tracker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`student_tracker` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`student_tracker` (
  `Student_Tracker_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Tracker_ID` INT(11) NOT NULL ,
  `Student_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Student_Tracker_ID`) ,
  UNIQUE INDEX `Student_Tracker_ID_UNIQUE` (`Student_Tracker_ID` ASC) ,
  INDEX `fk_Student_Tracker_Tracker1_idx` (`Tracker_ID` ASC) ,
  INDEX `fk_Student_Tracker_Student1_idx` (`Student_ID` ASC) ,
  CONSTRAINT `fk_Student_Tracker_Student1`
    FOREIGN KEY (`Student_ID` )
    REFERENCES `crisp`.`student` (`Student_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Tracker_Tracker1`
    FOREIGN KEY (`Tracker_ID` )
    REFERENCES `crisp`.`tracker` (`Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`teacher_awards`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`teacher_awards` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`teacher_awards` (
  `Teacher_Awards_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Award` VARCHAR(45) NOT NULL ,
  `Awarding_Body` VARCHAR(45) NOT NULL ,
  `Date_Received`  NOT NULL ,
  `Teacher_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Teacher_Awards_ID`) ,
  UNIQUE INDEX `Teacher_Awards_ID_UNIQUE` (`Teacher_Awards_ID` ASC) ,
  INDEX `fk_Teacher_Awards_Teacher1_idx` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Awards_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`teacher_certification`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`teacher_certification` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`teacher_certification` (
  `Teacher_Certification_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Certification` VARCHAR(45) NOT NULL ,
  `Certifying_Body` VARCHAR(250) NOT NULL ,
  `Date_Received` DATETIME NOT NULL ,
  `Teacher_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Teacher_Certification_ID`) ,
  UNIQUE INDEX `Teacher_Certification_ID_UNIQUE` (`Teacher_Certification_ID` ASC) ,
  INDEX `fk_Teacher_Certification_Teacher1_idx` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Certification_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`teacher_class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`teacher_class` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`teacher_class` (
  `Teacher_Class_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `T3_Class_ID` INT(11) NOT NULL ,
  `Teacher_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Teacher_Class_ID`) ,
  UNIQUE INDEX `Teacher_Class_ID_UNIQUE` (`Teacher_Class_ID` ASC) ,
  INDEX `fk_Student_Class_Class1` (`T3_Class_ID` ASC) ,
  INDEX `fk_Teacher_Class_Teacher1_idx` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Student_Class_Class10`
    FOREIGN KEY (`T3_Class_ID` )
    REFERENCES `crisp`.`t3_class` (`T3_Class_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Teacher_Class_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`teacher_computer_familiarity`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`teacher_computer_familiarity` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`teacher_computer_familiarity` (
  `Teacher_Computer_Familiarity_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Teacher_ID` INT(11) NOT NULL ,
  `Skills_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Teacher_Computer_Familiarity_ID`) ,
  UNIQUE INDEX `Teacher_Computer_Familiarity_ID_UNIQUE` (`Teacher_Computer_Familiarity_ID` ASC) ,
  INDEX `fk_Teacher_Computer_Familiarity_Teacher1_idx` (`Teacher_ID` ASC) ,
  INDEX `fk_Teacher_Computer_Familiarity_Skills1_idx` (`Skills_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Computer_Familiarity_Skills1`
    FOREIGN KEY (`Skills_ID` )
    REFERENCES `crisp`.`computer_skills` (`Computer_Skills_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Teacher_Computer_Familiarity_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`teacher_computer_profiency`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`teacher_computer_profiency` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`teacher_computer_profiency` (
  `Teacher_Computer_Profiency_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Skills_ID` INT(11) NOT NULL ,
  `Teacher_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Teacher_Computer_Profiency_ID`) ,
  UNIQUE INDEX `Teacher_Computer_Profiency_ID_UNIQUE` (`Teacher_Computer_Profiency_ID` ASC) ,
  INDEX `fk_Teacher_Computer_Profiency_Skills1_idx` (`Skills_ID` ASC) ,
  INDEX `fk_Teacher_Computer_Profiency_Teacher1_idx` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Computer_Profiency_Skills1`
    FOREIGN KEY (`Skills_ID` )
    REFERENCES `crisp`.`computer_skills` (`Computer_Skills_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Teacher_Computer_Profiency_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`teacher_other_skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`teacher_other_skills` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`teacher_other_skills` (
  `Teacher_Other_Skills_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Skills_ID` INT(11) NOT NULL ,
  `Teacher_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Teacher_Other_Skills_ID`) ,
  UNIQUE INDEX `Teacher_Other_Skills_ID_UNIQUE` (`Teacher_Other_Skills_ID` ASC) ,
  INDEX `fk_Teacher_Other_Skills_Skills1_idx` (`Skills_ID` ASC) ,
  INDEX `fk_Teacher_Other_Skills_Teacher1_idx` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Other_Skills_Skills1`
    FOREIGN KEY (`Skills_ID` )
    REFERENCES `crisp`.`skills` (`Skills_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Teacher_Other_Skills_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`teacher_professional_reference`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`teacher_professional_reference` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`teacher_professional_reference` (
  `Teacher_Professional_Reference_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Email` VARCHAR(45) NOT NULL ,
  `Name` VARCHAR(45) NOT NULL ,
  `Position` VARCHAR(45) NULL DEFAULT NULL ,
  `Company` VARCHAR(45) NOT NULL ,
  `Phone` VARCHAR(11) NOT NULL ,
  `Teacher_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Teacher_Professional_Reference_ID`) ,
  INDEX `fk_Teacher_Professional_Reference_Teacher1_idx` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Professional_Reference_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`teacher_relevant_experiences`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`teacher_relevant_experiences` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`teacher_relevant_experiences` (
  `Teacher_Relevant_Experiences_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Organization` VARCHAR(250) NOT NULL ,
  `Position` VARCHAR(45) NOT NULL ,
  `Description` VARCHAR(250) NULL DEFAULT NULL ,
  `Date`  NOT NULL ,
  `Teacher_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Teacher_Relevant_Experiences_ID`) ,
  INDEX `fk_Teacher_Relevant_Experiences_Teacher1_idx` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Relevant_Experiences_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`teacher_subjects_taken`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`teacher_subjects_taken` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`teacher_subjects_taken` (
  `Teacher_Subjects_Taken_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Teacher_ID` INT(11) NOT NULL ,
  `Adept_T3_Tracker_ID` INT(11) NOT NULL ,
  `Best_T3_Tracker_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Teacher_Subjects_Taken_ID`) ,
  UNIQUE INDEX `Teacher_Subjects_Taken_ID_UNIQUE` (`Teacher_Subjects_Taken_ID` ASC) ,
  INDEX `fk_Teacher_Subjects_Taken_Teacher1_idx` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Subjects_Taken_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`teacher_t3_application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`teacher_t3_application` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`teacher_t3_application` (
  `Teacher_T3_Application_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Teacher_ID` INT(11) NOT NULL ,
  `T3_Application_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Teacher_T3_Application_ID`) ,
  UNIQUE INDEX `Teacher_ID_UNIQUE` (`Teacher_ID` ASC) ,
  INDEX `fk_Teacher_T3_Application_Teacher1_idx` (`Teacher_ID` ASC) ,
  INDEX `fk_Teacher_T3_Application_T3_Application1_idx` (`T3_Application_ID` ASC) ,
  CONSTRAINT `fk_Teacher_T3_Application_T3_Application1`
    FOREIGN KEY (`T3_Application_ID` )
    REFERENCES `crisp`.`t3_application` (`T3_Application_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Teacher_T3_Application_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`teacher_t3_tracker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`teacher_t3_tracker` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`teacher_t3_tracker` (
  `Teacher_T3_Tracker_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `T3_Tracker_ID` INT(11) NOT NULL ,
  `Teacher_ID` INT(11) NOT NULL ,
  PRIMARY KEY (`Teacher_T3_Tracker_ID`) ,
  UNIQUE INDEX `Teacher_T3_Tracker_ID_UNIQUE` (`Teacher_T3_Tracker_ID` ASC) ,
  INDEX `fk_Teacher_T3_Tracker_T3_Tracker1_idx` (`T3_Tracker_ID` ASC) ,
  INDEX `fk_Teacher_T3_Tracker_Teacher1_idx` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Teacher_T3_Tracker_T3_Tracker1`
    FOREIGN KEY (`T3_Tracker_ID` )
    REFERENCES `crisp`.`t3_tracker` (`T3_Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Teacher_T3_Tracker_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`teacher_training_experience`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`teacher_training_experience` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`teacher_training_experience` (
  `Teacher_Training_Experience_ID` INT(11) NOT NULL AUTO_INCREMENT ,
  `Teacher_ID` INT(11) NOT NULL ,
  `Institution` VARCHAR(250) NOT NULL ,
  `Position` VARCHAR(45) NOT NULL ,
  `Date` DATETIME NOT NULL ,
  `Level_Taught` VARCHAR(250) NOT NULL ,
  `Courses_Taught` TEXT NOT NULL ,
  `Number_of_Years_in_Institution` INT(11) NOT NULL ,
  PRIMARY KEY (`Teacher_Training_Experience_ID`) ,
  UNIQUE INDEX `Teacher_Training_Experience_ID_UNIQUE` (`Teacher_Training_Experience_ID` ASC) ,
  INDEX `fk_Teacher_Training_Experience_Teacher_idx` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Training_Experience_Teacher`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `crisp`.`users`
-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `crisp`.`Users` (
  `User_ID` INT NOT NULL ,
  `Username` VARCHAR(255) NULL ,
  `First_Name` VARCHAR(255) NULL ,
  `Last_Name` VARCHAR(255) NULL ,
  `Type` VARCHAR(255) NULL ,
  `Password` VARCHAR(255) NULL ,
  `School_ID` INT NOT NULL ,
  PRIMARY KEY (`User_ID`) ,
  INDEX `fk_User_School1` (`School_ID` ASC) ,
  CONSTRAINT `fk_User_School1`
    FOREIGN KEY (`School_ID` )
    REFERENCES `mydb`.`School` (`School_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB

-- -----------------------------------------------------
-- Table `crisp`.`School_Subject`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`School_Subject` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`School_Subject` (
  `School_Subject_ID` INT NOT NULL ,
  `School_ID` INT NOT NULL ,
  `Subject_ID` INT NOT NULL ,
  PRIMARY KEY (`School_Subject_ID`) ,
  INDEX `fk_School_Subject_School1_idx` (`School_ID` ASC) ,
  INDEX `fk_School_Subject_Subject1_idx` (`Subject_ID` ASC) ,
  CONSTRAINT `fk_School_Subject_School1`
    FOREIGN KEY (`School_ID` )
    REFERENCES `mydb`.`School` (`School_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_School_Subject_Subject1`
    FOREIGN KEY (`Subject_ID` )
    REFERENCES `mydb`.`Subject` (`Subject_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Teacher_Affliation_to_Organization`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Teacher_Affliation_to_Organization` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Affliation_to_Organization` (
  `Teacher_Affliation_to_Organization_ID` INT NOT NULL ,
  `Organization` VARCHAR(45) NOT NULL ,
  `Description` VARCHAR(45) NULL ,
  `Positions` VARCHAR(45) NULL ,
  `Years_Affliated` INT NULL ,
  `Teacher_ID` INT NOT NULL ,
  PRIMARY KEY (`Teacher_Affliation_to_Organization_ID`) ,
  INDEX `fk_Teacher_Affliation_to_Organization_Teacher1_idx` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Affliation_to_Organization_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `mydb`.`Teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Internship_Student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Internship_Student` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Internship_Student` (
  `Supervisor_Name` VARCHAR(250) NULL ,
  `Supervisor_Position` VARCHAR(100) NULL ,
  `Supervior_Contact` VARCHAR(45) NULL ,
  `Tracker_ID` INT NOT NULL ,
  `Company_Information` TEXT NULL ,
  `Company_Address` TEXT NULL ,
  `Start_Date`  NULL ,
  `End_Date`  NULL ,
  `Total_Work_Hours` INT NULL ,
  `Task` TEXT NULL ,
  `English_Proficiency` INT NULL ,
  `Computer_Literacy` INT NULL ,
  `Learning_Orientation` INT NULL ,
  `Perceptual_Speed_and_Accuracy` INT NULL ,
  `Reliability` INT NULL ,
  `Empathy` INT NULL ,
  `Courtesy` INT NULL ,
  `Responsiveness` INT NULL ,
  `Comments` TEXT NULL ,
  `Meet_Standards?` TINYINT(1) NULL ,
  PRIMARY KEY (`Tracker_ID`) ,
  CONSTRAINT `fk_Internship_Student_Tracker1`
    FOREIGN KEY (`Tracker_ID` )
    REFERENCES `mydb`.`Tracker` (`Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`User` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`User` (
  `User_ID` INT NOT NULL ,
  `Username` VARCHAR(255) NULL ,
  `First_Name` VARCHAR(255) NULL ,
  `Last_Name` VARCHAR(255) NULL ,
  `Type` VARCHAR(255) NULL ,
  `Password` VARCHAR(255) NULL ,
  `School_ID` INT NOT NULL ,
  PRIMARY KEY (`User_ID`) ,
  INDEX `fk_User_School1_idx` (`School_ID` ASC) ,
  CONSTRAINT `fk_User_School1`
    FOREIGN KEY (`School_ID` )
    REFERENCES `mydb`.`School` (`School_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `crisp`.`School`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (1, 'Batangas State University', 'Batangas City', '4101111', 'batstatu@yahoo.com', 'Raymond Cruz', '09151234567', '2012-12-09 00:32:22', '2012-12-12 00:32:22', 'BATSTATU-Lipa', 'Lipa');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (2, 'Batangas State University', 'Batangas City', '4102222', 'batstatu@yahoo.com', 'Michelle Armario', '09129876789', '2012-12-10 00:32:22', '2012-12-12 00:32:22', 'BATSTATU-Lemery', 'Lemery');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (3, 'Batangas State University', 'Batangas City', '3212222', 'batstatu@yahoo.com', 'Michael Tan', '09182341234', '2011-12-11 00:32:22', '2011-10-31 00:32:22', 'BATSTATU-Malvar', 'Malvar');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (4, 'Batangas State University', 'Batangas City', '3232123', 'batstatu@yahoo.com', 'Joan Joner', '09182483211', '2011-12-12', '2012-10-11', 'BATSTATU-Rosario', 'Rosario');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (5, 'Batangas State University', 'Batangas City', '3232123', 'batstatu@yahoo.com', 'Joan Joner', '09182341234', '2011-12-12', '2011-12-12', 'BATSTATU-San Juan', 'San Juan');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (6, 'Batangas State University', 'Batangas City', '3232123', 'batstatu@yahoo.com', 'Joan Joner', '09182341234', '2011-12-12', '2011-12-12', 'BATSTATU-Balayan', 'Balayan');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (7, 'Batangas State University', 'Batangas City', '3232123', 'batstatu@yahoo.com', 'Joan Joner', '09182341234', '2011-12-12', '2011-12-12', 'BATSTATU-Main', 'Main Campus 1');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (8, 'Batangas State University', 'Batangas City', '3232123', 'batstatu@yahoo.com', 'Joan Joner', '09182341234', '2011-12-12', '2011-12-12', 'BATSTATU-Main 2', 'Main Campus 2');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (9, 'Adamson University', 'NCR', '3232123', 'adamson@gmail.com', 'Philip Peralta', '09182341234', '2011-12-12', '2011-12-12', 'AdU-NCR', 'NCR');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (10, 'Cavite State University', 'Cavite', '3232123', 'cvsu@gmail.com', 'Dayanara Simon', '09182341234', '2011-12-12', '2011-12-12', 'CVSU-Imus', 'Imus');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (11, 'Cavite State University', 'Cavite', '3232123', 'cvsu@gmail.com', 'Dayanara Simon', '09182341234', '2011-12-12', '2011-12-12', 'CVSU-Indang', 'Indang');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (12, 'Cavite State University', 'Cavite', '3232123', 'cvsu@gmail.com', 'Dayanara Simon', '09182341234', '2011-12-12', '2011-12-12', 'CVSU-Rosario', 'Rosario');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (13, 'Cavite State University', 'Cavite', '3232123', 'cvsu@gmail.com', 'Dayanara Simon', '09182341234', '2011-12-12', '2011-12-12', 'CVSU-Carmona', 'Carmona');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (14, 'Laguna State Polytechnic University', 'Laguna', '1556465', 'lvsu@gmail.com', 'Jerome Federico', '09177353228', '2011-12-12', '2011-12-12', 'LSPU-Siniloan', 'Siniloan');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (15, 'Laguna State Polytechnic University', 'Laguna', '1556465', 'lvsu@gmail.com', 'Jerome Federico', '09177353228', '2011-12-12', '2011-12-12', 'LSPU-Los Banos', 'Los Banos');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (16, 'Laguna State Polytechnic University', 'Laguna', '1556465', 'lvsu@gmail.com', 'Jerome Federico', '09177353228', '2011-12-12', '2011-12-12', 'LSPU-San Pablo', 'San Pablo');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (17, 'Laguna State Polytechnic University', 'Laguna', '1556465', 'lvsu@gmail.com', 'Jerome Federico', '09177353228', '2011-12-12', '2011-12-12', 'LSPU-Sta Cruz', 'Sta Cruz');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (18, 'Negros Oriental State University', 'Negros Oriental', '3235566', 'norsu@gmail.com', 'Paolo Luces', '09064939966', '2011-12-12', '2011-12-12', 'NORSU-Main', 'Main');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (19, 'Negros Oriental State University', 'Negros Oriental', '3235566', 'norsu@gmail.com', 'Paolo Luces', '09064939966', '2011-12-12', '2011-12-12', 'NORSU-Bayawan', 'Bayawan');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (20, 'Negros Oriental State University', 'Negros Oriental', '3235566', 'norsu@gmail.com', 'Paolo Luces', '09064939966', '2011-12-12', '2011-12-12', 'NORSU-Guihulngan', 'Guihulngan');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (21, 'Negros Oriental State University', 'Negros Oriental', '3235566', 'norsu@gmail.com', 'Paolo Luces', '09064939966', '2011-12-12', '2011-12-12', 'NORSU-Bais', 'Bais');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (22, 'Negros Oriental State University', 'Negros Oriental', '3235566', 'norsu@gmail.com', 'Paolo Luces', '09064939966', '2011-12-12', '2011-12-12', 'NORSU-Siaton', 'Siaton');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (23, 'Negros Oriental State University', 'Negros Oriental', '3235566', 'norsu@gmail.com', 'Paolo Luces', '09064939966', '2011-12-12', '2011-12-12', 'NORSU-Mabinay', 'Mabinay');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (24, 'Philippine Normal Univeristy', 'NCR', '4346578', 'pnu@gmail.com', 'Francisco Fajardo', '09071234564', '2011-12-12', '2011-12-12', 'PNU-Main', 'Main');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Teacher`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (1, '8', 'Samar', 'Quezon City', 'Metro Manila', '5', 'Basco, Batanes', 'rj@gmail.com', 'isa', 'Single', '1967-11-14 00:24:34', 'Quezon City', 'Male', 'Filipino', 1, 'Teacher', 'Permanent', 'John Leveur', '09159999911', '2013-12-12 00:00:00', '2013-12-14 00:00:00', True, False, True, False, True, True, False, 4, 'CODE123', 'Mike', '091159503612', 'Jr.', 'A', 'Swift', '3336644', 'Boss', 'DISCS', 'CS150');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (2, '7', 'Pura', 'Manila City', 'Metro Manila', 'NCR', 'Laoag City', 'gil@gmail.com', 'Gigi', 'Married', '1992-01-01 00:24:34', 'Beijing, China', 'Female', 'Filipino', 2, 'Teacher 2', 'Permanent', 'Michael Bryan', '09111222334', '2013-10-31 00:00:00', '2013-11-05 00:00:00', False, False, True, False, True, False, True, 3, 'CODE432', 'Gillian', '098112344321', NULL, 'P', 'Tan', '3215432', 'Manager', 'DISCS', 'MIS101');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (3, '2', 'Arrupe', 'Malabon City', 'Metro Manila ', 'NCR', 'Ormoc City', 'fr@gmail.com', 'Francis', 'Married', '1991-11-12 00:24:34', 'Caloocan City, Philippines', 'Male', 'Filipino', 3, 'Teacher 4', 'Permanent', 'Fernando Lopez', '09212123456', '2011-11-24 00:00:00', '2013-11-14 00:00:00', True, True, True, True, False, False, False, 10, 'CODE123', 'Francis', '123456711111', 'Jr.', 'B', 'Fajardo', '32123421', 'Manager', 'DISCS', 'CS160');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (4, '6750', 'Ayala', 'Makati City', 'Metro Manila', 'NCR', 'Cebu City', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Los Angeles, USA', 'Female', 'American', 17, 'Teacher 10', 'Permanent', 'Barack Obama', '09121431431', '2012-11-24 00:00:00', '2013-11-14 00:00:00', True, False, False, False, False, True, True, 22, 'CODE143', 'Iza', '212321220291', NULL, 'C', 'Calzado', '2132321', 'Principal', 'DISCS', 'MIS101');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (5, '1', 'Maluggay', 'Makati', 'Metro Manila', 'NCR', 'Davao', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Manila', 'Female', 'Filipino', 1, 'Teacher', 'Permanent', 'Joy Federico', '09064939966', '2012-11-24 00:00:00', '2013-11-14 00:00:00', True, False, True, False, True, False, True, 1, '153', 'Joy', '626126311454', NULL, 'A', 'Cheng', '3614988', 'Principal', 'DISCS', 'MIS121');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (6, '2', '1st', 'Caloccan', 'Metro Manila', 'NCR', 'Bacolod', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Manila', 'Female', 'Filipino', 2, 'Teacher', 'Permanent', 'Joy Federico', '12154564867', '2012-11-24 00:00:00', '2013-11-14 00:00:00', False, True, False, True, True, False, True, 21, '454', 'Iza', '541514546444', NULL, 'B', 'Chen', '3632266', 'Principal', 'DISCS', 'MIS131');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (7, '3', '2nd', 'Caloccan', 'Metro Manila', 'NCR', 'Tacloban', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Manila', 'Female', 'Filipino', 3, 'Teacher', 'Permanent', 'Joy Federico', '15148657486', '2012-11-24 00:00:00', '2013-11-14 00:00:00', True, False, False, True, True, False, True, 4, '153', 'Red', '13213.210103', NULL, 'C', 'Chua', '3659324', 'Principal', 'DISCS', 'MIS151');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (8, '4', '3rd', 'Caloccan', 'Metro Manila', 'NCR', 'Samar', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Manila', 'Female', 'Filipino', 4, 'Teacher', 'Permanent', 'Joy Federico', '15145634685', '2012-11-24 00:00:00', '2013-11-14 00:00:00', False, False, False, True, True, False, True, 10, '131', 'Blue', '484851465131', NULL, 'D', 'Cua', '8787872', 'Principal', 'DISCS', 'MIS141');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (9, '5', '4th', 'Caloccan', 'Metro Manila', 'NCR', 'Leyte', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Manila', 'Female', 'Filipino', 5, 'Teacher', 'Permanent', 'Joy Federico', '13143126344', '2012-11-24 00:00:00', '2013-11-14 00:00:00', False, False, False, True, True, False, False, 3, '25', 'Green', '131253465465', NULL, 'E', 'Tan', '9876543', 'Principal', 'DISCS', 'CS21');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (10, '6', '5th', 'Caloccan', 'Metro Manila', 'NCR', 'Bicol', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Manila', 'Female', 'Filipino', 6, 'Teacher', 'Permanent', 'Joy Federico', '16476463461', '2012-11-24 00:00:00', '2013-11-14 00:00:00', False, True, True, True, True, False, False, 1, '131', 'Yellow', '134865488484', NULL, 'F', 'Tiong', '3216547', 'Principal', 'DISCS', 'CS21');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (11, '7', '6th', 'Caloccan', 'Metro Manila', 'NCR', 'Baguio', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Manila', 'Female', 'Filipino', 7, 'Teacher', 'Permanent', 'Joy Federico', '03163136161', '2012-11-24 00:00:00', '2013-11-14 00:00:00', True, True, True, True, True, True, False, 5, '4564', 'Black', '154135213143', NULL, 'G', 'Zhen', '9874562', 'Principal', 'DISCS', 'CS21');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (12, '8', '7th', 'Caloccan', 'Metro Manila', 'NCR', 'Batangas', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Manila', 'Male', 'Filipino', 8, 'Teacher', 'Permanent', 'Joy Federico', '03125531465', '2012-11-24 00:00:00', '2013-11-14 00:00:00', True, False, True, True, True, False, False, 1, '131', 'Brown', '132156454151', NULL, 'H', 'Sy', '9876541', 'Principal', 'DISCS', 'CS21');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (13, '9', '8th', 'Caloccan', 'Metro Manila', 'NCR', 'Bulacan', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Manila', 'Female', 'Filipino', 9, 'Teacher', 'Permanent', 'Joy Federico', '16351403146', '2012-11-24 00:00:00', '2013-11-14 00:00:00', True, False, True, True, True, False, True, 4, '55', 'Teal', '515151454545', NULL, 'I', 'See', '7894561', 'Principal', 'DISCS', 'CS21');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (14, '10', '9th', 'Caloccan', 'Metro Manila', 'NCR', 'Cebu', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Manila', 'Male', 'Filipino', 10, 'Teacher', 'Permanent', 'Joy Federico', '15614023146', '2012-11-24 00:00:00', '2013-11-14 00:00:00', True, False, True, True, True, True, True, 2, '11', 'Pink', '023102548122', NULL, 'J', 'Kim', '7894562', 'Principal', 'DISCS', 'CS21');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (15, '11', '10th', 'Caloccan', 'Metro Manila', 'NCR', 'Palawan', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Manila', 'Male', 'Filipino', 11, 'Teacher', 'Permanent', 'Joy Federico', '16148654320', '2012-11-24 00:00:00', '2013-11-14 00:00:00', True, True, False, True, True, False, True, 4, '51', 'Purple', '102534856414', NULL, 'K', 'Park', '7894563', 'Dean', 'DISCS', 'CS21');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (16, '12', '11th', 'Caloccan', 'Metro Manila', 'NCR', 'Bohol', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Manila', 'Male', 'Filipino', 12, 'Teacher', 'Permanent', 'Joy Federico', '15313143514', '2012-11-24 00:00:00', '2013-11-14 00:00:00', True, False, False, False, False, True, True, 13, '122', 'Violet', '145451431131', NULL, 'L', 'Lim', '7893215', 'Dean', 'DISCS', 'CS21');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (17, '13', 'Rizal', 'Manila', 'Metro Manila', 'NCR', 'Iloilo', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Manila', 'Male', 'Filipino', 13, 'Teacher', 'Permanent', 'Joy Federico', '10031631461', '2012-11-24 00:00:00', '2013-11-14 00:00:00', False, False, True, False, False, False, False, 13, '335', 'Beige', '185748965488', NULL, 'M', 'Lee', '9873216', 'Dean', 'DISCS', 'CS21');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (18, '14', 'Arnais', 'Makati', 'Metro Manila', 'NCR', 'Bacolod', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Manila', 'Male', 'Filipino', 14, 'Teacher', 'Permanent', 'Joy Federico', '31235146545', '2012-11-24 00:00:00', '2013-11-14 00:00:00', False, True, False, False, False, True, False, 4, '484', 'Khaki', '165148574897', NULL, 'N', 'Zhong', '9773214', 'Dean', 'DISCS', 'CS21');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (19, '15', 'Katipunan', 'Quezon City', 'Metro Manila', 'NCR', 'Sulu', 'iza@yahoo.com', 'Iza', 'Married', '1967-11-14 00:24:34', 'Manila', 'Male', 'Filipino', 15, 'Teacher', 'Permanent', 'Joy Federico', '15314531455', '2012-11-24 00:00:00v', '2013-11-14 00:00:00', True, False, False, False, True, False, False, 5, '646', 'Maroon', '874885748567', NULL, 'O', 'Leong', '9873216', 'Dean', 'DISCS', 'CS21');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`, `Position_of_Supervisor`, `Current_Department`, `Classes_Handling`) VALUES (20, '16', 'Esteban', 'Quezon City', 'Metro Manila', 'NCR', 'Mindoro', 'iza@yahoo.com', 'Iza', 'Widowed', '1967-11-14 00:24:34', 'Manila', 'Female', 'Filipino', 16, 'Teacher', 'Permanent', 'Joy Federico', '10231032153', '2012-11-24 00:00:00', '2013-11-14 00:00:00', True, False, True, False, True, True, False, 10, '231', 'Cyan', '148564768787', NULL, 'P', 'Jeong', '2654878', 'Deam', 'DISCS', 'CS21');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Teacher_Training_Experience`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Teacher_Training_Experience` (`Teacher_Training_Experience_ID`, `Teacher_ID`, `Institution`, `Position`, `Date`, `Level_Taught`, `Courses_Taught`, `Number_of_Years_in_Institution`) VALUES (1, 2, 'Ateneo de Manila', 'Secretary', '1992-12-25 00:23:44', 'Tertiary', 'Math', 2);
INSERT INTO `crisp`.`Teacher_Training_Experience` (`Teacher_Training_Experience_ID`, `Teacher_ID`, `Institution`, `Position`, `Date`, `Level_Taught`, `Courses_Taught`, `Number_of_Years_in_Institution`) VALUES (2, 1, 'De La Salle', 'President', '1993-12-23 23:12:22', 'High School', 'Geography', 4);
INSERT INTO `crisp`.`Teacher_Training_Experience` (`Teacher_Training_Experience_ID`, `Teacher_ID`, `Institution`, `Position`, `Date`, `Level_Taught`, `Courses_Taught`, `Number_of_Years_in_Institution`) VALUES (3, 3, 'PUP', 'Teacher', '1992-12-22 00:55:11', 'Tertiary', 'Math, Science', 3);
INSERT INTO `crisp`.`Teacher_Training_Experience` (`Teacher_Training_Experience_ID`, `Teacher_ID`, `Institution`, `Position`, `Date`, `Level_Taught`, `Courses_Taught`, `Number_of_Years_in_Institution`) VALUES (4, 3, 'Makati Science High School', 'Teacher', '1992-12-24', 'Grade School', 'Algebra, Calculus', 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Teacher_Certification`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Teacher_Certification` (`Teacher_Certification_ID`, `Certification`, `Certifying_Body`, `Date_Received`, `Teacher_ID`) VALUES (1, 'Math', 'Math Body ', '1992-12-11 00:34:00', 1);
INSERT INTO `crisp`.`Teacher_Certification` (`Teacher_Certification_ID`, `Certification`, `Certifying_Body`, `Date_Received`, `Teacher_ID`) VALUES (2, 'Science', 'DOST', '1993-12-26 00:22:22', 2);
INSERT INTO `crisp`.`Teacher_Certification` (`Teacher_Certification_ID`, `Certification`, `Certifying_Body`, `Date_Received`, `Teacher_ID`) VALUES (3, 'Geography', 'Makati Geologist', '2012-12-11', 2);
INSERT INTO `crisp`.`Teacher_Certification` (`Teacher_Certification_ID`, `Certification`, `Certifying_Body`, `Date_Received`, `Teacher_ID`) VALUES (NULL, 'English', 'English Society', '1993-12-11', 3);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Teacher_Awards`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Teacher_Awards` (`Teacher_Awards_ID`, `Award`, `Awarding_Body`, `Date_Received`, `Teacher_ID`) VALUES (1, 'Best in English', 'FAMAS', 1992-12-11, 1);
INSERT INTO `crisp`.`Teacher_Awards` (`Teacher_Awards_ID`, `Award`, `Awarding_Body`, `Date_Received`, `Teacher_ID`) VALUES (NULL, 'Best in Math', 'Mathers', 1911-11-11, 1);
INSERT INTO `crisp`.`Teacher_Awards` (`Teacher_Awards_ID`, `Award`, `Awarding_Body`, `Date_Received`, `Teacher_ID`) VALUES (NULL, 'Oscar', 'Academy', 1999-11-12, 1);
INSERT INTO `crisp`.`Teacher_Awards` (`Teacher_Awards_ID`, `Award`, `Awarding_Body`, `Date_Received`, `Teacher_ID`) VALUES (NULL, 'Emmy', 'America', 2012-09-11, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Teacher_Relevant_Experiences`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Teacher_Relevant_Experiences` (`Teacher_Relevant_Experiences_ID`, `Organization`, `Position`, `Description`, `Date`, `Teacher_ID`) VALUES (1, 'Ayala', 'Instructor', 'Instructed employees', '2013-11-16', 1);
INSERT INTO `crisp`.`Teacher_Relevant_Experiences` (`Teacher_Relevant_Experiences_ID`, `Organization`, `Position`, `Description`, `Date`, `Teacher_ID`) VALUES (NULL, 'Accenture', 'Asst Instructor', 'Assisted the instructor', '2013-11-14', 2);
INSERT INTO `crisp`.`Teacher_Relevant_Experiences` (`Teacher_Relevant_Experiences_ID`, `Organization`, `Position`, `Description`, `Date`, `Teacher_ID`) VALUES (NULL, 'Mandarin Skies', 'Cook', 'Cooked Food', '2012-11-11', 3);
INSERT INTO `crisp`.`Teacher_Relevant_Experiences` (`Teacher_Relevant_Experiences_ID`, `Organization`, `Position`, `Description`, `Date`, `Teacher_ID`) VALUES (NULL, 'Arakama', 'Manager', 'Managed people', '2011-11-11', 4);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Computer_Skills`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Computer_Skills` (`Computer_Skills_ID`, `Name`) VALUES (1, 'Encoding');
INSERT INTO `crisp`.`Computer_Skills` (`Computer_Skills_ID`, `Name`) VALUES (NULL, 'Java');
INSERT INTO `crisp`.`Computer_Skills` (`Computer_Skills_ID`, `Name`) VALUES (NULL, 'C++');
INSERT INTO `crisp`.`Computer_Skills` (`Computer_Skills_ID`, `Name`) VALUES (NULL, 'C');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Teacher_Computer_Profiency`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Teacher_Computer_Profiency` (`Teacher_Computer_Profiency_ID`, `Computer_Skills_ID`, `Teacher_ID`) VALUES (1, 1, 1);
INSERT INTO `crisp`.`Teacher_Computer_Profiency` (`Teacher_Computer_Profiency_ID`, `Computer_Skills_ID`, `Teacher_ID`) VALUES (NULL, 2, 1);
INSERT INTO `crisp`.`Teacher_Computer_Profiency` (`Teacher_Computer_Profiency_ID`, `Computer_Skills_ID`, `Teacher_ID`) VALUES (NULL, 3, 1);
INSERT INTO `crisp`.`Teacher_Computer_Profiency` (`Teacher_Computer_Profiency_ID`, `Computer_Skills_ID`, `Teacher_ID`) VALUES (NULL, 1, 2);
INSERT INTO `crisp`.`Teacher_Computer_Profiency` (`Teacher_Computer_Profiency_ID`, `Computer_Skills_ID`, `Teacher_ID`) VALUES (NULL, 3, 3);
INSERT INTO `crisp`.`Teacher_Computer_Profiency` (`Teacher_Computer_Profiency_ID`, `Computer_Skills_ID`, `Teacher_ID`) VALUES (NULL, 2, 3);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Teacher_Computer_Familiarity`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Teacher_Computer_Familiarity` (`Teacher_Computer_Familiarity_ID`, `Teacher_ID`, `Computer_Skills_ID`) VALUES (1, 1, 1);
INSERT INTO `crisp`.`Teacher_Computer_Familiarity` (`Teacher_Computer_Familiarity_ID`, `Teacher_ID`, `Computer_Skills_ID`) VALUES (NULL, 2, 1);
INSERT INTO `crisp`.`Teacher_Computer_Familiarity` (`Teacher_Computer_Familiarity_ID`, `Teacher_ID`, `Computer_Skills_ID`) VALUES (NULL, 1, 2);
INSERT INTO `crisp`.`Teacher_Computer_Familiarity` (`Teacher_Computer_Familiarity_ID`, `Teacher_ID`, `Computer_Skills_ID`) VALUES (NULL, 2, 2);
INSERT INTO `crisp`.`Teacher_Computer_Familiarity` (`Teacher_Computer_Familiarity_ID`, `Teacher_ID`, `Computer_Skills_ID`) VALUES (NULL, 3, 3);
INSERT INTO `crisp`.`Teacher_Computer_Familiarity` (`Teacher_Computer_Familiarity_ID`, `Teacher_ID`, `Computer_Skills_ID`) VALUES (NULL, 4, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Skills`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Skills` (`Skills_ID`, `Name`) VALUES (1, 'Bar Tending');
INSERT INTO `crisp`.`Skills` (`Skills_ID`, `Name`) VALUES (NULL, 'Singing');
INSERT INTO `crisp`.`Skills` (`Skills_ID`, `Name`) VALUES (NULL, 'Guitar Playing');
INSERT INTO `crisp`.`Skills` (`Skills_ID`, `Name`) VALUES (NULL, 'Dancing');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Teacher_Other_Skills`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Teacher_Other_Skills` (`Teacher_Other_Skills_ID`, `Skills_ID`, `Teacher_ID`) VALUES (1, 1, 1);
INSERT INTO `crisp`.`Teacher_Other_Skills` (`Teacher_Other_Skills_ID`, `Skills_ID`, `Teacher_ID`) VALUES (NULL, 2, 1);
INSERT INTO `crisp`.`Teacher_Other_Skills` (`Teacher_Other_Skills_ID`, `Skills_ID`, `Teacher_ID`) VALUES (NULL, 1, 3);
INSERT INTO `crisp`.`Teacher_Other_Skills` (`Teacher_Other_Skills_ID`, `Skills_ID`, `Teacher_ID`) VALUES (NULL, 4, 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Teacher_Professional_Reference`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Teacher_Professional_Reference` (`Teacher_Professional_Reference_ID`, `Email`, `Name`, `Position`, `Company`, `Phone`, `Teacher_ID`) VALUES (1, 'jpa@gmail.com', 'Mike Co', 'Teacher 21', 'TeachMe.org', '4212123', 1);
INSERT INTO `crisp`.`Teacher_Professional_Reference` (`Teacher_Professional_Reference_ID`, `Email`, `Name`, `Position`, `Company`, `Phone`, `Teacher_ID`) VALUES (NULL, 'mla@gmail.com', 'Tanner Mo', 'Engineer', 'EngineerMe.org', '4333121', 2);
INSERT INTO `crisp`.`Teacher_Professional_Reference` (`Teacher_Professional_Reference_ID`, `Email`, `Name`, `Position`, `Company`, `Phone`, `Teacher_ID`) VALUES (NULL, 'hack@gmail.com', 'Packer Yu', 'Hacker', 'Hack Company', '4323112', 3);
INSERT INTO `crisp`.`Teacher_Professional_Reference` (`Teacher_Professional_Reference_ID`, `Email`, `Name`, `Position`, `Company`, `Phone`, `Teacher_ID`) VALUES (NULL, 'jack@yahoo.com', 'Jack Lantern', 'Jacker', 'Olero Company', '4323234', 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Subject`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (1, 'Global Competitiive Assessment Test', 'GCAT');
INSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (2, 'Basic English Skills Test', 'BEST');
INSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (3, 'Advanced English Proficiency Test', 'AdEPT');
INSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (4, 'Service Culture', 'SC101');
INSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (5, 'Systems Thinking', 'SYSTH101');
INSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (6, 'Business Process Outsourcing 1', 'BPO101');
INSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (7, 'Business Process Outsourcing 2', 'BPO102');
INSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (8, 'Language', 'BEST/AdEPT');
INSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (9, 'BPO Process', 'BPO101/102');
INSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (10, 'Business Communication', 'BizCom');
INSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (11, 'Internship', 'Intern');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`T3_Application`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`T3_Application` (`T3_Application_ID`, `Date`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (1, '2011-12-11', '2012-12-12', '2012-11-11', 1);
INSERT INTO `crisp`.`T3_Application` (`T3_Application_ID`, `Date`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (2, '2013-11-24', '2009-11-11', '2012-09-13', 2);
INSERT INTO `crisp`.`T3_Application` (`T3_Application_ID`, `Date`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (3, '2019-12-11', '2008-12-12', '2001-11-18', 3);
INSERT INTO `crisp`.`T3_Application` (`T3_Application_ID`, `Date`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (4, '2012-11-11', '2006-06-09', '2012-12-12', 4);
INSERT INTO `crisp`.`T3_Application` (`T3_Application_ID`, `Date`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (5, '2009-09-22', '2006-05-22', '2012-12-12', 3);
INSERT INTO `crisp`.`T3_Application` (`T3_Application_ID`, `Date`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (6, '2011-11-12', '2012-09-22', '2012-11-12', 3);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`SMP_T3_Application`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`SMP_T3_Application` (`T3_Application_ID`, `Answer_1`, `Answer_2`, `Answer_3`, `Total_Numbers_Of_Subjects_Handled`, `Years_Teaching`, `Years_Teaching_In_Current_Institution`, `Avg_Student_Per_Class`, `Support_Offices_Available`, `Instructional_Materials_Support`, `Technology_Support`, `Readily_Use_Lab?`, `Internet_Services?`, `Self_Assessment_Form_Business_Communication`, `Self_Assessment_Form_Service_Culture`, `Contract?`) VALUES (1, 'Yes', 'No', 'Yes', 123, 2, 3, 32, 'No.', 'Books', 'Computer', False, True, True, False, True);
INSERT INTO `crisp`.`SMP_T3_Application` (`T3_Application_ID`, `Answer_1`, `Answer_2`, `Answer_3`, `Total_Numbers_Of_Subjects_Handled`, `Years_Teaching`, `Years_Teaching_In_Current_Institution`, `Avg_Student_Per_Class`, `Support_Offices_Available`, `Instructional_Materials_Support`, `Technology_Support`, `Readily_Use_Lab?`, `Internet_Services?`, `Self_Assessment_Form_Business_Communication`, `Self_Assessment_Form_Service_Culture`, `Contract?`) VALUES (2, 'Yes', 'No', 'I don\'t', 232, 2, 24, 3, 'YES.', 'IPAD', 'Notebook', False, False, True, True, False);
INSERT INTO `crisp`.`SMP_T3_Application` (`T3_Application_ID`, `Answer_1`, `Answer_2`, `Answer_3`, `Total_Numbers_Of_Subjects_Handled`, `Years_Teaching`, `Years_Teaching_In_Current_Institution`, `Avg_Student_Per_Class`, `Support_Offices_Available`, `Instructional_Materials_Support`, `Technology_Support`, `Readily_Use_Lab?`, `Internet_Services?`, `Self_Assessment_Form_Business_Communication`, `Self_Assessment_Form_Service_Culture`, `Contract?`) VALUES (3, 'No', 'No', 'No', 2, 33, 3, 20, 'No', 'None', 'None', False, False, True, True, False);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Related_Trainings_Attended`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Related_Trainings_Attended` (`Related_Trainings_Attended_ID`, `Training`, `Training_Body`, `Training_Date`) VALUES (1, 'Cooking', 'CHED', '2012-11-11');
INSERT INTO `crisp`.`Related_Trainings_Attended` (`Related_Trainings_Attended_ID`, `Training`, `Training_Body`, `Training_Date`) VALUES (NULL, 'Programming', 'Ateneo', '1993-12-11');
INSERT INTO `crisp`.`Related_Trainings_Attended` (`Related_Trainings_Attended_ID`, `Training`, `Training_Body`, `Training_Date`) VALUES (NULL, 'Teaching', 'CHED', '1992-12-01');
INSERT INTO `crisp`.`Related_Trainings_Attended` (`Related_Trainings_Attended_ID`, `Training`, `Training_Body`, `Training_Date`) VALUES (NULL, 'Visual Aid', 'Visual Aid Body', '1992-11-02');
INSERT INTO `crisp`.`Related_Trainings_Attended` (`Related_Trainings_Attended_ID`, `Training`, `Training_Body`, `Training_Date`) VALUES (NULL, 'Fashion', 'Fashion Body', '2012-11-12');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Stipend_Tracking`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Stipend_Tracking` (`Stipend_Tracking_ID`, `Amount`, `Claimed?`, `Created_At`, `Updated_At`, `Teacher_ID`) VALUES (1, 1000, False, '2011-12-12', '2013-12-11', 1);
INSERT INTO `crisp`.`Stipend_Tracking` (`Stipend_Tracking_ID`, `Amount`, `Claimed?`, `Created_At`, `Updated_At`, `Teacher_ID`) VALUES (NULL, 2123.23, True, '2010-12-31', '2011-09-11', 2);
INSERT INTO `crisp`.`Stipend_Tracking` (`Stipend_Tracking_ID`, `Amount`, `Claimed?`, `Created_At`, `Updated_At`, `Teacher_ID`) VALUES (NULL, 21231123, False, '2011-12-21', '2013-09-15', 3);
INSERT INTO `crisp`.`Stipend_Tracking` (`Stipend_Tracking_ID`, `Amount`, `Claimed?`, `Created_At`, `Updated_At`, `Teacher_ID`) VALUES (NULL, 7563, True, '2009-09-09', '2012-11-18', 4);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Stipend_Tracking_List`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Stipend_Tracking_List` (`Stipend_Tracking_List_ID`, `Date`, `Checked_By`, `Stipend_Tracking_ID`, `Subject_ID`) VALUES (1, '2012-12-11', 'Joy', 1, 1);
INSERT INTO `crisp`.`Stipend_Tracking_List` (`Stipend_Tracking_List_ID`, `Date`, `Checked_By`, `Stipend_Tracking_ID`, `Subject_ID`) VALUES (NULL, '2012-12-13', 'RJ', 1, 2);
INSERT INTO `crisp`.`Stipend_Tracking_List` (`Stipend_Tracking_List_ID`, `Date`, `Checked_By`, `Stipend_Tracking_ID`, `Subject_ID`) VALUES (NULL, '2012-12-11', 'Mike', 2, 2);
INSERT INTO `crisp`.`Stipend_Tracking_List` (`Stipend_Tracking_List_ID`, `Date`, `Checked_By`, `Stipend_Tracking_ID`, `Subject_ID`) VALUES (NULL, '2013-01-01', 'John', 2, 3);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`SMP_T3_Attendance`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`SMP_T3_Attendance` (`SMP_T3_Attendance_ID`, `Time_In?`, `AM_Snack?`, `Lunch?`, `PM_Snack?`, `Time_Out?`, `Date`, `Created_At`, `Updated_At`) VALUES (1, True, True, True, False, False, '2012-11-11', '2011-11-01', '2011-11-02');
INSERT INTO `crisp`.`SMP_T3_Attendance` (`SMP_T3_Attendance_ID`, `Time_In?`, `AM_Snack?`, `Lunch?`, `PM_Snack?`, `Time_Out?`, `Date`, `Created_At`, `Updated_At`) VALUES (NULL, False, False, False, False, False, '2011-11-09', '2011-11-01', '2011-11-12');
INSERT INTO `crisp`.`SMP_T3_Attendance` (`SMP_T3_Attendance_ID`, `Time_In?`, `AM_Snack?`, `Lunch?`, `PM_Snack?`, `Time_Out?`, `Date`, `Created_At`, `Updated_At`) VALUES (NULL, True, False, True, False, True, '2011-11-12', '2011-11-23', '2011-11-12');
INSERT INTO `crisp`.`SMP_T3_Attendance` (`SMP_T3_Attendance_ID`, `Time_In?`, `AM_Snack?`, `Lunch?`, `PM_Snack?`, `Time_Out?`, `Date`, `Created_At`, `Updated_At`) VALUES (NULL, False, True, False, True, False, '2011-11-12', '2011-11-14', '2011-11-16');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`SMP_T3_Site_Visit`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`SMP_T3_Site_Visit` (`SMP_T3_Site_Visit_ID`, `Training_Location`, `Company_Host`, `Event_Date`, `Feedback_Form?`, `Created_At`, `Updated_At`) VALUES (1, 'Quezon City', 'Ateneo', '2011-11-12', False, '2011-11-12', '2011-11-26');
INSERT INTO `crisp`.`SMP_T3_Site_Visit` (`SMP_T3_Site_Visit_ID`, `Training_Location`, `Company_Host`, `Event_Date`, `Feedback_Form?`, `Created_At`, `Updated_At`) VALUES (NULL, 'Manila City', 'La Salle', '2011-11-21', True, '2011-11-21', '2011-11-16');
INSERT INTO `crisp`.`SMP_T3_Site_Visit` (`SMP_T3_Site_Visit_ID`, `Training_Location`, `Company_Host`, `Event_Date`, `Feedback_Form?`, `Created_At`, `Updated_At`) VALUES (NULL, 'Manila CIty', 'PUP', '2011-11-19', False, '2011-09-11', '2011-04-11');
INSERT INTO `crisp`.`SMP_T3_Site_Visit` (`SMP_T3_Site_Visit_ID`, `Training_Location`, `Company_Host`, `Event_Date`, `Feedback_Form?`, `Created_At`, `Updated_At`) VALUES (NULL, 'Makati City', 'CSA', '2012-11-13', True, '2014-08-09', '2015-09-09');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Status`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Status` (`Status_ID`, `Name`) VALUES (1, 'Passed');
INSERT INTO `crisp`.`Status` (`Status_ID`, `Name`) VALUES (NULL, 'Fail');
INSERT INTO `crisp`.`Status` (`Status_ID`, `Name`) VALUES (NULL, 'Currently Taking');
INSERT INTO `crisp`.`Status` (`Status_ID`, `Name`) VALUES (NULL, 'Dropped');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`T3_Tracker`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (1, 1, '2013-01-01', '2013-11-13', False, 'Really', 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (2, 1, '2013-03-31', '2001-01-01', True, 'Go ', 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (3, 1, '2013-02-14', '2011-12-11', False, 'Hell Yeah Im Halfway', 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (4, 1, '2013-04-01', '2011-11-02', True, 'At 14 they asked', 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (5, 1, '2013-06-30', '2011-11-06', False, 'Owowow', 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (6, 1, '2011-11-06', '2011-11-01', True, 'Schoolin\'', 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (7, 2, '2012-11-09', '2011-11-02', True, 'Don\'t stop running', 4);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (8, 1, '2011-11-08', '2011-11-03', False, 'Who needs it', 3);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (9, 2, '2012-11-08', '2011-11-03', True, 'Whoa', 4);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (10, 1, '2012-11-08', NULL, True, NULL, 2);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (11, 1, '2012-11-08', NULL, True, NULL, 3);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (12, 1, '2012-11-08', NULL, True, NULL, 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (13, 1, '2012-11-08', NULL, True, NULL, 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (14, 1, '2012-11-08', NULL, True, NULL, 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (15, 1, '2012-11-08', NULL, True, NULL, 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (16, 1, '2012-11-08', NULL, True, NULL, 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (17, 1, '2012-11-08', NULL, True, NULL, 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (18, 1, '2012-11-08', NULL, True, NULL, 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (19, 1, '2012-11-08', NULL, True, NULL, 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (20, 1, '2012-11-08', NULL, True, NULL, 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (21, 1, '2012-11-08', NULL, True, NULL, 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (22, 1, '2012-11-08', NULL, True, NULL, 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (23, 1, '2012-11-08', NULL, False, NULL, 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (24, 1, '2012-11-08', NULL, False, NULL, 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (25, 1, '2012-11-08', NULL, True, NULL, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`SMP_T3_Tracker`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`SMP_T3_Tracker` (`T3_Tracker_ID`, `SMP_T3_Site_Visit_ID`) VALUES (5, 1);
INSERT INTO `crisp`.`SMP_T3_Tracker` (`T3_Tracker_ID`, `SMP_T3_Site_Visit_ID`) VALUES (6, 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`SMP_T3_Attendance_Tracking`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`SMP_T3_Attendance_Tracking` (`SMP_T3_Attendance_Tracking_ID`, `Event`, `SMP_T3_Attendance_ID`, `T3_Tracker_ID`) VALUES (1, 'Dance ', 1, 5);
INSERT INTO `crisp`.`SMP_T3_Attendance_Tracking` (`SMP_T3_Attendance_Tracking_ID`, `Event`, `SMP_T3_Attendance_ID`, `T3_Tracker_ID`) VALUES (NULL, 'Singing', 2, 5);
INSERT INTO `crisp`.`SMP_T3_Attendance_Tracking` (`SMP_T3_Attendance_Tracking_ID`, `Event`, `SMP_T3_Attendance_ID`, `T3_Tracker_ID`) VALUES (NULL, 'Cooking', 3, 6);
INSERT INTO `crisp`.`SMP_T3_Attendance_Tracking` (`SMP_T3_Attendance_Tracking_ID`, `Event`, `SMP_T3_Attendance_ID`, `T3_Tracker_ID`) VALUES (NULL, 'Skateboarding', 4, 6);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Best_Adept_T3_Application`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Best_Adept_T3_Application` (`T3_Application_ID`, `Answer_1`, `Answer_2`, `Answer_3`, `Contract?`) VALUES (4, 'Really', 'Some people', 'In a silver platter', False);
INSERT INTO `crisp`.`Best_Adept_T3_Application` (`T3_Application_ID`, `Answer_1`, `Answer_2`, `Answer_3`, `Contract?`) VALUES (5, 'No one is shared', 'No one really cares', 'For them', True);
INSERT INTO `crisp`.`Best_Adept_T3_Application` (`T3_Application_ID`, `Answer_1`, `Answer_2`, `Answer_3`, `Contract?`) VALUES (6, 'Diamond rings', 'Some just', 'want everything', True);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Best_T3_Attendance`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Best_T3_Attendance` (`Best_T3_Attendance_ID`, `Orientation_Day`, `Site_Visit`, `Day_1`, `Day_2`, `Day_3`, `Created_At`, `Updated_At`) VALUES (1, '2011-11-12', '2011-11-14', '2011-11-01', '2011-11-02', '2011-11-03', '2011-12-12', '2011-12-10');
INSERT INTO `crisp`.`Best_T3_Attendance` (`Best_T3_Attendance_ID`, `Orientation_Day`, `Site_Visit`, `Day_1`, `Day_2`, `Day_3`, `Created_At`, `Updated_At`) VALUES (NULL, '2011-11-14', '2011-11-15', '2011-11-02', '2011-11-04', '2011-11-05', '2012-01-01', '2012-01-02');
INSERT INTO `crisp`.`Best_T3_Attendance` (`Best_T3_Attendance_ID`, `Orientation_Day`, `Site_Visit`, `Day_1`, `Day_2`, `Day_3`, `Created_At`, `Updated_At`) VALUES (NULL, '2011-11-03', '2011-11-02', '2011-11-06', '2011-11-07', '2011-11-08', '2011-11-09', '2011-11-10');
INSERT INTO `crisp`.`Best_T3_Attendance` (`Best_T3_Attendance_ID`, `Orientation_Day`, `Site_Visit`, `Day_1`, `Day_2`, `Day_3`, `Created_At`, `Updated_At`) VALUES (NULL, '2012-08-01', '2012-08-02', '2012-08-03', '2012-08-04', '2012-08-05', '2012-08-06', '2012-08-07');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Adept_T3_Attendance`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Adept_T3_Attendance` (`Adept_T3_Attendance_ID`, `Orientation_Day`, `Site_Visit`, `Day_1`, `Day_2`, `Day_3`, `Day_4`, `Day_5`, `Day_6`, `GCAT`, `Created_At`, `Updated_At`) VALUES (1, '2012-08-01', '2012-08-02', '2012-08-03', '2012-08-04', '2012-08-04', '2012-08-05', '2012-08-06', '2012-08-07', '2012-08-09', '2012-08-10', '2012-08-11');
INSERT INTO `crisp`.`Adept_T3_Attendance` (`Adept_T3_Attendance_ID`, `Orientation_Day`, `Site_Visit`, `Day_1`, `Day_2`, `Day_3`, `Day_4`, `Day_5`, `Day_6`, `GCAT`, `Created_At`, `Updated_At`) VALUES (NULL, '2012-08-02', '2012-08-03', '2012-08-04', '2012-08-05', '2012-08-06', '2012-08-07', '2012-08-08', '2012-08-09', '2012-08-10', '2012-08-11', '2012-08-12');
INSERT INTO `crisp`.`Adept_T3_Attendance` (`Adept_T3_Attendance_ID`, `Orientation_Day`, `Site_Visit`, `Day_1`, `Day_2`, `Day_3`, `Day_4`, `Day_5`, `Day_6`, `GCAT`, `Created_At`, `Updated_At`) VALUES (NULL, '2012-08-03', '2012-08-04', '2012-08-05', '2012-08-06', '2012-08-07', '2012-08-08', '2012-08-09', '2012-08-10', '2012-08-11', '2012-08-12', '2012-08-13');
INSERT INTO `crisp`.`Adept_T3_Attendance` (`Adept_T3_Attendance_ID`, `Orientation_Day`, `Site_Visit`, `Day_1`, `Day_2`, `Day_3`, `Day_4`, `Day_5`, `Day_6`, `GCAT`, `Created_At`, `Updated_At`) VALUES (NULL, '2012-08-04', '2012-08-05', '2012-08-06', '2012-08-07', '2012-08-08', '2012-08-09', '2012-08-10', '2012-08-11', '2012-08-12', '2012-08-13', '2012-08-14');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Best_T3_Grades`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Best_T3_Grades` (`Best_T3_Grades_ID`) VALUES (1);
INSERT INTO `crisp`.`Best_T3_Grades` (`Best_T3_Grades_ID`) VALUES (2);
INSERT INTO `crisp`.`Best_T3_Grades` (`Best_T3_Grades_ID`) VALUES (3);
INSERT INTO `crisp`.`Best_T3_Grades` (`Best_T3_Grades_ID`) VALUES (4);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Best_T3_Tracker`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Best_T3_Tracker` (`T3_Tracker_ID`, `Best_T3_Attendance_ID`, `Interview_Form?`, `Site_Visit_Form?`, `Best_T3_Feedback?`, `Best_E-Learning_Feedback`, `Best_CD`, `Certificate_Of_Attendance`, `Best_Certified_Trainers`, `Task_1`, `Task_2`, `Task_3`, `Task_4`, `Best_T3_Grades_ID`, `Control_Number`, `User_Name`) VALUES (7, 1, False, True, True, False, True, False, True, 12.1, 21.1, 221.1, 12311, 1, '1231', 'jppp');
INSERT INTO `crisp`.`Best_T3_Tracker` (`T3_Tracker_ID`, `Best_T3_Attendance_ID`, `Interview_Form?`, `Site_Visit_Form?`, `Best_T3_Feedback?`, `Best_E-Learning_Feedback`, `Best_CD`, `Certificate_Of_Attendance`, `Best_Certified_Trainers`, `Task_1`, `Task_2`, `Task_3`, `Task_4`, `Best_T3_Grades_ID`, `Control_Number`, `User_Name`) VALUES (8, 2, False, True, True, True, True, False, True, 13.1, 321.3, 23.1, 224.2, 2, '1211', 'fllr01');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Adept_T3_Grades`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Adept_T3_Grades` (`Adept_T3_Grades_ID`) VALUES (1);
INSERT INTO `crisp`.`Adept_T3_Grades` (`Adept_T3_Grades_ID`) VALUES (2);
INSERT INTO `crisp`.`Adept_T3_Grades` (`Adept_T3_Grades_ID`) VALUES (3);
INSERT INTO `crisp`.`Adept_T3_Grades` (`Adept_T3_Grades_ID`) VALUES (4);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Adept_T3_Tracker`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Adept_T3_Tracker` (`T3_Tracker_ID`, `Adept_T3_Grades_ID`, `Adept_T3_Attendance_ID`, `Interview_Form?`, `Site_Visit_Form?`, `Adept_T3_Feedback?`, `Adept_E-Learning_Feedback`, `Manual_&_Kit`, `Certificate_Of_Attendance`, `Adept_Certified_Trainers`, `Lesson_Plan`, `Demo`, `Total_Weighted`, `Training_Portfolio`, `Control_Number`, `User_Name`) VALUES (3, 1, 1, True, False, True, True, False, True, False, 10.1, 12, 12.11, 12.1, 'aa3', 'jppp');
INSERT INTO `crisp`.`Adept_T3_Tracker` (`T3_Tracker_ID`, `Adept_T3_Grades_ID`, `Adept_T3_Attendance_ID`, `Interview_Form?`, `Site_Visit_Form?`, `Adept_T3_Feedback?`, `Adept_E-Learning_Feedback`, `Manual_&_Kit`, `Certificate_Of_Attendance`, `Adept_Certified_Trainers`, `Lesson_Plan`, `Demo`, `Total_Weighted`, `Training_Portfolio`, `Control_Number`, `User_Name`) VALUES (4, 2, 2, True, True, True, True, False, False, True, 10.2, 12.1, 12.11, 12.14, 'aa4', 'jjds01');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`GCAT_Tracker`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`GCAT_Tracker` (`T3_Tracker_ID`, `GCAT_Basic_Skills_Test_Overall_Score`, `GCAT_Total_Cognitive`, `GCAT_English_Proficiency`, `GCAT_Computer_Literacy`, `GCAT_Perceptual_Speed_&_Accuracy`, `GCAT_Behavioral_Component_Overall_Score`, `GCAT_Communication`, `GCAT_Learning_Orientation`, `GCAT_Courtesy`, `GCAT_Empathy`, `GCAT_Reliability`, `GCAT_Responsiveness`, `Session_ID`) VALUES (1, 3, 2, 4, 3, 4, 4, 3, 2, 6, 8, 7, 5, 'aa1');
INSERT INTO `crisp`.`GCAT_Tracker` (`T3_Tracker_ID`, `GCAT_Basic_Skills_Test_Overall_Score`, `GCAT_Total_Cognitive`, `GCAT_English_Proficiency`, `GCAT_Computer_Literacy`, `GCAT_Perceptual_Speed_&_Accuracy`, `GCAT_Behavioral_Component_Overall_Score`, `GCAT_Communication`, `GCAT_Learning_Orientation`, `GCAT_Courtesy`, `GCAT_Empathy`, `GCAT_Reliability`, `GCAT_Responsiveness`, `Session_ID`) VALUES (2, 7, 9, 8, 7, 6, 5, 6, 9, 7, 6, 8, 9, 'aa2');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Related_Trainings_Attended_By_A_Teacher`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Related_Trainings_Attended_By_A_Teacher` (`Related_Trainings_Attended_By_A_Teacher`, `Related_Trainings_Attended_ID`, `SMP_T3_Application_ID`) VALUES (NULL, 1, 1);
INSERT INTO `crisp`.`Related_Trainings_Attended_By_A_Teacher` (`Related_Trainings_Attended_By_A_Teacher`, `Related_Trainings_Attended_ID`, `SMP_T3_Application_ID`) VALUES (NULL, 1, 2);
INSERT INTO `crisp`.`Related_Trainings_Attended_By_A_Teacher` (`Related_Trainings_Attended_By_A_Teacher`, `Related_Trainings_Attended_ID`, `SMP_T3_Application_ID`) VALUES (NULL, 2, 1);
INSERT INTO `crisp`.`Related_Trainings_Attended_By_A_Teacher` (`Related_Trainings_Attended_By_A_Teacher`, `Related_Trainings_Attended_ID`, `SMP_T3_Application_ID`) VALUES (NULL, 2, 1);
INSERT INTO `crisp`.`Related_Trainings_Attended_By_A_Teacher` (`Related_Trainings_Attended_By_A_Teacher`, `Related_Trainings_Attended_ID`, `SMP_T3_Application_ID`) VALUES (NULL, 2, 3);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Student`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (1, 1, 'Federico', 'Joy', 'H', 'II', '102222', 'Single', '1991-10-10', 'Beijing, China', 'F', 'Filipino', '8', 'Concorde', 'Caloocan City', 'Metro Manila', 'NCR', 'Commonwealth, Quezon City', '09152341231', '4321234', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2013, False, False, Yes, False, False, '12345');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (2, 2, 'Fajardo', 'Francis', 'J', 'III', '132123', 'Single', '1990-12-12', 'Quezon City', 'M', 'Filipino', '2', 'Civic', 'Quezon City', 'Metro Manila', 'NCR', 'Caloocan City', '09138312341', '4312312', 'francis@gmail.com', 'Francis Yo', 'BS Management', 3, 2014, False, True, Yes, False, True, '32333');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (3, 2, 'Cruz', 'Raymond', 'M', 'Jr', '243121', 'Single', '1991-12-11', 'Manila City', 'M', 'Russian', '3', 'Malakas', 'San Juan City', 'Metro Manila', 'NCR', 'Bonifacio Global City', '09135823842', '9384913', 'rj@yahoo.com', 'RJ', 'BS Management - H', 4, 2013, True, True, No, False, True, '39293');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (4, 4, 'Luces', 'Paolo', 'J', NULL, '212311', 'Married', '1991-10-11', 'Caloocan City', 'M', 'Filipino', '2', 'Matalino', 'Caloocan City', 'Metro Manila', 'NCR', 'Tomas Morato', '02933481341', '3323421', 'pao@hotmail.com', 'Joi Federico', 'BS ME', 3, 2012, True, True, No, True, False, '32323');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (5, 5, 'Simon', 'Ara', 'A', NULL, '101487', 'Married', '1991-10-11', 'Caloocan City', 'F', 'Filipino', '1', 'Mayabang', 'Caloocan City', 'Metro Manila', 'NCR', 'Hongdae', '02933481341', '3614988', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2014, False, False, Yes, True, True, '13215');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (6, 6, 'Choi', 'Siwon', 'B', NULL, '101485', 'Single', '1991-10-11', 'South Korea', 'M', 'Korean', '2', 'Maganda', 'Caloocan City', 'Metro Manila', 'NCR', 'Hongdae', '02933481341', '3632266', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2014, False, False, Yes, True, True, '15454');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (7, 7, 'Lee', 'Seungri', 'C', NULL, '123654', 'Single', '1991-10-11', 'South Korea', 'M', 'Korean', '3', 'Maginhawa', 'Caloocan City', 'Metro Manila', 'NCR', 'Hongdae', '02933481341', '7894561', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2014, False, False, Yes, True, True, '15154');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (8, 8, 'Kwon', 'Jiyong', 'D', NULL, '654123', 'Single', '1991-10-11', 'South Korea', 'M', 'Korean', '4', 'Maligo', 'Caloocan City', 'Metro Manila', 'NCR', 'Hongdae', '02933481341', '1234569', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2014, False, False, Yes, True, True, '15487');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (9, 9, 'Lee', 'Donghae', 'E', NULL, '789654', 'Single', '1991-10-11', 'South Korea', 'M', 'Korean', '5', 'Busan', 'Caloocan City', 'Metro Manila', 'NCR', 'Hongdae', '02933481341', '9638521', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2014, False, False, Yes, True, True, '99658');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (10, 10, 'Ok', 'Taecyeon', 'F', NULL, '789456', 'Single', '1991-10-11', 'South Korea', 'M', 'Korean', '8', 'Seoul', 'Caloocan City', 'Metro Manila', 'NCR', 'Hongdae', '02933481341', '7412589', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2014, False, False, Yes, True, True, '47744');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (11, 11, 'Lee', 'Chaerin', 'G', NULL, '123987', 'Single', '1991-10-11', 'South Korea', 'M', 'Korean', '6', 'Ulsan', 'Caloocan City', 'Metro Manila', 'NCR', 'Hongdae', '02933481341', '9745632', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2014, False, False, Yes, False, True, '12534');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (12, 12, 'Park', 'Sandara', 'H', NULL, '741852', 'Single', '1991-10-11', 'South Korea', 'M', 'Korean', '7', 'Annam', 'Caloocan City', 'Metro Manila', 'NCR', 'Hongdae', '02933481341', '1547896', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2014, False, False, Yes, False, True, '23168');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (13, 13, 'Lee', 'Minho', 'I', NULL, '852963', 'Single', '1991-10-11', 'South Korea', 'M', 'Korean', '9', 'Sinchon', 'Caloocan City', 'Metro Manila', 'NCR', 'Hongdae', '02933481341', '1654648', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2014, False, False, Yes, False, True, '16857');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (14, 14, 'Agloro', 'Paolo', 'J', NULL, '741963', 'Single', '1991-10-11', 'South Korea', 'M', 'Korean', '10', 'Samseong', 'Caloocan City', 'Metro Manila', 'NCR', 'Hongdae', '02933481341', '9878963', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2014, False, False, Yes, False, True, '15485');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (15, 15, 'De Vera', 'Jal', 'K', NULL, '369258', 'Signle', '1991-10-11', 'South Korea', 'M', 'Korean', '11', 'Gangnam', 'Caloocan City', 'Metro Manila', 'NCR', 'Hongdae', '02933481341', '1348674', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2014, True, False, Yes, False, True, '15645');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (16, 16, 'Alampay', 'Happy', 'L', NULL, '258369', 'Single', '1991-10-11', 'South Korea', 'M', 'Korean', '12', 'Yeouido', 'Caloocan City', 'Metro Manila', 'NCR', 'Hongdae', '02933481341', '1348657', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2014, True, False, Yes, False, True, '87489');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (17, 17, 'Olpoc', 'Joselito', 'M', NULL, '258147', 'Single', '1991-10-11', 'South Korea', 'M', 'Korean', '13', 'Hongdae', 'Caloocan City', 'Metro Manila', 'NCR', 'Hongdae', '02933481341', '1318695', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2014, True, False, Yes, True, True, '21311');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (18, 18, 'Federico', 'Jerome', 'N', NULL, '155788', 'Single', '1991-10-11', 'South Korea', 'M', 'Korean', '14', 'Gyeongju', 'Caloocan City', 'Metro Manila', 'NCR', 'Hongdae', '02933481341', '1312354', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2014, True, False, Yes, True, True, '12348');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (19, 1, 'Federico', 'Jimmy', 'O', NULL, '789632', 'Single', '1991-10-11', 'South Korea', 'M', 'Korean', '15', 'Gwangju', 'Caloocan City', 'Metro Manila', 'NCR', 'Hongdae', '02933481341', '1465465', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2014, True, False, Yes, True, True, '12346');
INSERT INTO `crisp`.`Student` (`Student_ID`, `School_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (20, 2, 'Lee', 'Sungmin', 'P', NULL, '102549', 'Single', '1991-10-11', 'South Korea', 'M', 'Korean', '16', 'Ilsan', 'Caloocan City', 'Metro Manila', 'NCR', 'Hongdae', '02933481341', '1346544', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 2014, True, False, Yes, True, True, '12487');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Organization_Affiliations`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Organization_Affiliations` (`Organization_Affiliations_ID`, `Name`, `Position`, `Years_Affiliated`, `Description`) VALUES (1, 'Globe', 'President', 1, 'The Best');
INSERT INTO `crisp`.`Organization_Affiliations` (`Organization_Affiliations_ID`, `Name`, `Position`, `Years_Affiliated`, `Description`) VALUES (NULL, 'Smart', 'Chairman', 3, 'Master');
INSERT INTO `crisp`.`Organization_Affiliations` (`Organization_Affiliations_ID`, `Name`, `Position`, `Years_Affiliated`, `Description`) VALUES (NULL, 'Sun Cellular', 'CEO', 3, 'Apprentice');
INSERT INTO `crisp`.`Organization_Affiliations` (`Organization_Affiliations_ID`, `Name`, `Position`, `Years_Affiliated`, `Description`) VALUES (NULL, 'PLDT', 'COO', 3, 'Connected');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Student_Organization_Affiliations`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Student_Organization_Affiliations` (`Student_Organization_Affiliations_ID`, `Organization_Affiliations_ID`, `Student_ID`) VALUES (NULL, 1, 1);
INSERT INTO `crisp`.`Student_Organization_Affiliations` (`Student_Organization_Affiliations_ID`, `Organization_Affiliations_ID`, `Student_ID`) VALUES (NULL, 1, 2);
INSERT INTO `crisp`.`Student_Organization_Affiliations` (`Student_Organization_Affiliations_ID`, `Organization_Affiliations_ID`, `Student_ID`) VALUES (NULL, 2, 1);
INSERT INTO `crisp`.`Student_Organization_Affiliations` (`Student_Organization_Affiliations_ID`, `Organization_Affiliations_ID`, `Student_ID`) VALUES (NULL, 4, 3);
INSERT INTO `crisp`.`Student_Organization_Affiliations` (`Student_Organization_Affiliations_ID`, `Organization_Affiliations_ID`, `Student_ID`) VALUES (NULL, 1, 3);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Student_Skills`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Student_Skills` (`Student_Skills_ID`, `Student_ID`, `Skills_ID`) VALUES (1, 1, 1);
INSERT INTO `crisp`.`Student_Skills` (`Student_Skills_ID`, `Student_ID`, `Skills_ID`) VALUES (NULL, 2, 2);
INSERT INTO `crisp`.`Student_Skills` (`Student_Skills_ID`, `Student_ID`, `Skills_ID`) VALUES (NULL, 3, 1);
INSERT INTO `crisp`.`Student_Skills` (`Student_Skills_ID`, `Student_ID`, `Skills_ID`) VALUES (NULL, 3, 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Student_Computer_Skills`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Student_Computer_Skills` (`Student_Computer_Skills_ID`, `Student_ID`, `Computer_Skills_ID`, `Level_Of_Proficiency`) VALUES (NULL, 1, 1, 'Professional');
INSERT INTO `crisp`.`Student_Computer_Skills` (`Student_Computer_Skills_ID`, `Student_ID`, `Computer_Skills_ID`, `Level_Of_Proficiency`) VALUES (NULL, 2, 1, 'Average');
INSERT INTO `crisp`.`Student_Computer_Skills` (`Student_Computer_Skills_ID`, `Student_ID`, `Computer_Skills_ID`, `Level_Of_Proficiency`) VALUES (NULL, 3, 1, 'Oks lang');
INSERT INTO `crisp`.`Student_Computer_Skills` (`Student_Computer_Skills_ID`, `Student_ID`, `Computer_Skills_ID`, `Level_Of_Proficiency`) VALUES (NULL, 4, 2, 'Master');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Project`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Project` (`Project_ID`, `Name`, `Institution`, `Year_Implemented`) VALUES (1, 'Joan Magno', 'CMLI', 2012);
INSERT INTO `crisp`.`Project` (`Project_ID`, `Name`, `Institution`, `Year_Implemented`) VALUES (NULL, 'Janella Ongcol', 'ADMU', 1999);
INSERT INTO `crisp`.`Project` (`Project_ID`, `Name`, `Institution`, `Year_Implemented`) VALUES (NULL, 'Sam Tan', 'GMA', 2005);
INSERT INTO `crisp`.`Project` (`Project_ID`, `Name`, `Institution`, `Year_Implemented`) VALUES (NULL, 'Aaron Ormoc', 'Adidas', NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Application`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Application` (`Application_ID`, `Answer_1`, `Answer_2`, `Contract?`, `Date`, `Created_At`, `Updated_At`) VALUES (1, 'Really', 'Good', True, '2011-11-11', '2012-12-12', '2019-12-12');
INSERT INTO `crisp`.`Application` (`Application_ID`, `Answer_1`, `Answer_2`, `Contract?`, `Date`, `Created_At`, `Updated_At`) VALUES (NULL, 'No', 'Not Really', False, '2011-11-21', '2012-12-16', '2013-12-12');
INSERT INTO `crisp`.`Application` (`Application_ID`, `Answer_1`, `Answer_2`, `Contract?`, `Date`, `Created_At`, `Updated_At`) VALUES (NULL, 'Going', 'There', False, '2012-11-23', '2012-08-22', '2014-11-12');
INSERT INTO `crisp`.`Application` (`Application_ID`, `Answer_1`, `Answer_2`, `Contract?`, `Date`, `Created_At`, `Updated_At`) VALUES (NULL, 'Average', 'No', True, '2012-11-15', '2014-12-12', '2016-06-05');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Student_Application`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Student_Application` (`Student_Application_ID`, `Application_ID`, `Student_ID`, `Project_ID`, `Subject_ID`) VALUES (1, 1, 1, 1, 2);
INSERT INTO `crisp`.`Student_Application` (`Student_Application_ID`, `Application_ID`, `Student_ID`, `Project_ID`, `Subject_ID`) VALUES (NULL, 2, 2, 3, 1);
INSERT INTO `crisp`.`Student_Application` (`Student_Application_ID`, `Application_ID`, `Student_ID`, `Project_ID`, `Subject_ID`) VALUES (NULL, 3, 3, 1, 2);
INSERT INTO `crisp`.`Student_Application` (`Student_Application_ID`, `Application_ID`, `Student_ID`, `Project_ID`, `Subject_ID`) VALUES (NULL, 4, 4, 1, 4);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Tracker`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (1, True, 'Average', 1, 2, 1, '2013-01-01', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (2, False, 'Great', 2, 1, 2, '2013-3-31', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (3, False, 'Bad', 1, 5, 3, '2013-2-12', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (4, True, 'Worst', 2, 5, 4, '2013-4-01', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (5, False, 'Great', 2, 1, 1, '2013-6-30', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (6, True, 'See class', 1, 1, 2, '2013-7-01', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (7, True, 'Reject', 1, 2, 3, '2013-09-30', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (8, False, 'Singer', 1, 8, 4, '2013-10-01', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (9, True, 'Failure', 2, 1, 1, '2013-12-31', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (10, False, 'Great', 1, 2, 2, '2011-02-12', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (11, True, NULL, 1, 1, 1, '2013-04-02', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (12, True, NULL, 1, 1, 2, '2013-05-02', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (13, True, NULL, 1, 1, 1, '2013-06-02', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (14, True, NULL, 1, 1, 2, '2013-07-02', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (15, True, NULL, 1, 1, 1, '2013-08-02', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (16, True, NULL, 1, 1, 3, '2013-09-02', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (17, True, NULL, 1, 1, 4, '2013-10-02', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (18, True, NULL, 1, 1, 1, '2013-11-02', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (19, True, NULL, 1, 1, 2, '2013-10-02', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (20, True, NULL, 1, 1, 3, '2013-12-02', NULL, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (21, True, NULL, 1, 1, 4, '2013-04-02', NULL, 2);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (22, True, NULL, 1, 1, 1, '2012-04-02', NULL, 2);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (23, True, NULL, 1, 1, 2, '2012-04-02', NULL, 2);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (24, True, NULL, 1, 1, 3, '2013-04-02', NULL, 2);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`, `Quarter`, `Created_At`, `Updated_At`, `Subject_ID`) VALUES (25, True, NULL, 1, 1, 4, '2013-04-02', NULL, 2);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Class`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Class` (`Class_ID`, `Name`, `School_Year`, `Semester`, `School_ID`, `Subject_ID`) VALUES (1, 'GCAT', '2012-2013', 1, 1, 1);
INSERT INTO `crisp`.`Class` (`Class_ID`, `Name`, `School_Year`, `Semester`, `School_ID`, `Subject_ID`) VALUES (2, 'GCAT', '2011-2012', 2, 2, 1);
INSERT INTO `crisp`.`Class` (`Class_ID`, `Name`, `School_Year`, `Semester`, `School_ID`, `Subject_ID`) VALUES (3, 'BPO101-D', '1993-1994', 3, 3, 2);
INSERT INTO `crisp`.`Class` (`Class_ID`, `Name`, `School_Year`, `Semester`, `School_ID`, `Subject_ID`) VALUES (4, 'BPO101-C', '1992-1993', 4, 1, 4);
INSERT INTO `crisp`.`Class` (`Class_ID`, `Name`, `School_Year`, `Semester`, `School_ID`, `Subject_ID`) VALUES (5, 'BPO101-A', '1992-1993', 2, 1, 2);
INSERT INTO `crisp`.`Class` (`Class_ID`, `Name`, `School_Year`, `Semester`, `School_ID`, `Subject_ID`) VALUES (6, 'BPO102-B', '1992-1993', 3, 2, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Student_Class`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Student_Class` (`Student_Class_ID`, `Class_ID`, `Student_ID`) VALUES (1, 1, 1);
INSERT INTO `crisp`.`Student_Class` (`Student_Class_ID`, `Class_ID`, `Student_ID`) VALUES (NULL, 2, 2);
INSERT INTO `crisp`.`Student_Class` (`Student_Class_ID`, `Class_ID`, `Student_ID`) VALUES (NULL, 3, 3);
INSERT INTO `crisp`.`Student_Class` (`Student_Class_ID`, `Class_ID`, `Student_ID`) VALUES (NULL, 4, 4);
INSERT INTO `crisp`.`Student_Class` (`Student_Class_ID`, `Class_ID`, `Student_ID`) VALUES (NULL, 5, 2);
INSERT INTO `crisp`.`Student_Class` (`Student_Class_ID`, `Class_ID`, `Student_ID`) VALUES (NULL, 6, 1);
INSERT INTO `crisp`.`Student_Class` (`Student_Class_ID`, `Class_ID`, `Student_ID`) VALUES (NULL, 3, 3);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`BEST_Student`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`BEST_Student` (`Tracker_ID`, `Contol_Number`, `Username`, `boolean`) VALUES (1, '12341', 'jpphil', NULL);
INSERT INTO `crisp`.`BEST_Student` (`Tracker_ID`, `Contol_Number`, `Username`, `boolean`) VALUES (2, '54321', 'mac01', NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Adept_Student`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Adept_Student` (`Tracker_ID`, `Control_Number`, `Username`, `CD?`) VALUES (3, '2312', 'ara12', NULL);
INSERT INTO `crisp`.`Adept_Student` (`Tracker_ID`, `Control_Number`, `Username`, `CD?`) VALUES (4, '12312', 'joy32', NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`GCAT_Student`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`GCAT_Student` (`Tracker_ID`, `GCAT_Total_Cognitive`, `GCAT_Responsiveness`, `GCAT_Reliability`, `GCAT_Empathy`, `GCAT_Courtesy`, `GCAT_Learning_Orientation`, `GCAT_Communication`, `GCAT_Behavioral_Component_Overall_Score`, `GCAT_Perceptual_Speed_&_Accuracy`, `GCAT_Computer_Literacy`, `GCAT_English_Proficiency`, `GCAT_Basic_Skills_Test_Overall_Score`, `Session_ID`, `Test_Date`) VALUES (5, 4, 2, 4, 3, 2, 5, 6, 5, 2, 4, 2, 5, 'aa1', NULL);
INSERT INTO `crisp`.`GCAT_Student` (`Tracker_ID`, `GCAT_Total_Cognitive`, `GCAT_Responsiveness`, `GCAT_Reliability`, `GCAT_Empathy`, `GCAT_Courtesy`, `GCAT_Learning_Orientation`, `GCAT_Communication`, `GCAT_Behavioral_Component_Overall_Score`, `GCAT_Perceptual_Speed_&_Accuracy`, `GCAT_Computer_Literacy`, `GCAT_English_Proficiency`, `GCAT_Basic_Skills_Test_Overall_Score`, `Session_ID`, `Test_Date`) VALUES (6, 6, 5, 4, 2, 9, 8, 4, 5, 6, 9, 3, 8, 'aa2', NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`SMP_Student`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`SMP_Student` (`Tracker_ID`, `Grade`) VALUES (7, '43');
INSERT INTO `crisp`.`SMP_Student` (`Tracker_ID`, `Grade`) VALUES (8, '32');
INSERT INTO `crisp`.`SMP_Student` (`Tracker_ID`, `Grade`) VALUES (9, '22');
INSERT INTO `crisp`.`SMP_Student` (`Tracker_ID`, `Grade`) VALUES (10, '100');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`SMP_Student_Courses_Taken`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`SMP_Student_Courses_Taken` (`SMP_Student_Courses_Taken_ID`, `Student_Class_ID`, `Tracker_ID`) VALUES ('1', 1, 7);
INSERT INTO `crisp`.`SMP_Student_Courses_Taken` (`SMP_Student_Courses_Taken_ID`, `Student_Class_ID`, `Tracker_ID`) VALUES ('2', 2, 8);
INSERT INTO `crisp`.`SMP_Student_Courses_Taken` (`SMP_Student_Courses_Taken_ID`, `Student_Class_ID`, `Tracker_ID`) VALUES ('3', 3, 7);
INSERT INTO `crisp`.`SMP_Student_Courses_Taken` (`SMP_Student_Courses_Taken_ID`, `Student_Class_ID`, `Tracker_ID`) VALUES ('4', 4, 8);
INSERT INTO `crisp`.`SMP_Student_Courses_Taken` (`SMP_Student_Courses_Taken_ID`, `Student_Class_ID`, `Tracker_ID`) VALUES ('5', 5, 9);
INSERT INTO `crisp`.`SMP_Student_Courses_Taken` (`SMP_Student_Courses_Taken_ID`, `Student_Class_ID`, `Tracker_ID`) VALUES ('6', 6, 10);
INSERT INTO `crisp`.`SMP_Student_Courses_Taken` (`SMP_Student_Courses_Taken_ID`, `Student_Class_ID`, `Tracker_ID`) VALUES ('7', 7, 8);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Student_Tracker`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (1, 1, 1);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (4, 4, 4);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (7, 7, 7);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (9, 9, 9);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (2, 2, 2);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (5, 5, 5);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (3, 3, 3);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (6, 6, 6);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (8, 8, 8);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (10, 10, 10);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (11, 11, 11);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (12, 12, 12);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (13, 13, 13);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (14, 14, 14);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (15, 15, 15);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (16, 16, 16);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (17, 17, 17);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (18, 18, 18);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (19, 19, 19);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (20, 20, 20);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (21, 21, 1);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (22, 22, 2);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (23, 23, 3);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (24, 24, 4);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (25, 25, 5);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Teacher_T3_Tracker`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (1, 1, 1);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (2, 2, 2);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (3, 3, 3);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (4, 4, 4);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (5, 5, 5);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (6, 6, 6);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (7, 7, 7);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (8, 8, 8);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (9, 9, 9);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (10, 10, 10);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (11, 11, 11);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (12, 12, 12);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (13, 13, 13);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (14, 14, 14);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (15, 15, 15);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (16, 16, 16);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (17, 17, 17);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (18, 18, 18);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (19, 19, 19);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (20, 20, 20);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (21, 21, 1);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (22, 22, 2);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (23, 23, 3);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (24, 24, 4);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (25, 25, 5);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Master_Trainer`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Master_Trainer` (`Master_Trainer_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Company_Name`, `Company_Address`, `Position`, `Email`, `Facebook`, `Landline`, `Mobile_Number`, `Gender`, `Civil_Status`) VALUES (1, 'Peralta', 'Zara', 'A', NULL, 'GDP', 'Basco, Batanes', 'President', 'zara@gmail.com', 'zara', '323413', '09174628234', 'Female', 'Single');
INSERT INTO `crisp`.`Master_Trainer` (`Master_Trainer_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Company_Name`, `Company_Address`, `Position`, `Email`, `Facebook`, `Landline`, `Mobile_Number`, `Gender`, `Civil_Status`) VALUES (NULL, 'Go', 'Amiel', 'B', 'Jr', 'AMF', 'Mindanao Avenue', 'Secretary', 'amiel@gmail.com', 'amiel', '343414', '09124834321', 'Male', 'Married');
INSERT INTO `crisp`.`Master_Trainer` (`Master_Trainer_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Company_Name`, `Company_Address`, `Position`, `Email`, `Facebook`, `Landline`, `Mobile_Number`, `Gender`, `Civil_Status`) VALUES (NULL, 'Mandela', 'Nelson ', 'C', NULL, 'MDA', 'Africa, South Africa', 'President', 'nm@yahoo.com', NULL, '432422', '29482020392', 'Male', 'Single');
INSERT INTO `crisp`.`Master_Trainer` (`Master_Trainer_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Company_Name`, `Company_Address`, `Position`, `Email`, `Facebook`, `Landline`, `Mobile_Number`, `Gender`, `Civil_Status`) VALUES (NULL, 'Razon', 'Henedina', 'B', NULL, 'MDJG', 'Basco, Batanes', 'Congressman', 'ha@gmail.com', NULL, '349382', '09832382828', 'Female', 'Single');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Proctor`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Proctor` (`Proctor_ID`, `First_Name`, `Middle_Initial`, `Last_Name`, `Name_Suffix`, `Company_Name`, `Company_Address`, `Position`, `Email`, `Facebook`, `Landline`, `Mobile_Number`, `Gender`, `Civil_Status`) VALUES (1, 'John', 'A', 'Cruz', 'Jr.', 'Ateneo De Manila', 'Katipunan Avenue', 'President', 'jpc@gmail.com', 'John', '4311231', '09186542342', 'Male', 'Married');
INSERT INTO `crisp`.`Proctor` (`Proctor_ID`, `First_Name`, `Middle_Initial`, `Last_Name`, `Name_Suffix`, `Company_Name`, `Company_Address`, `Position`, `Email`, `Facebook`, `Landline`, `Mobile_Number`, `Gender`, `Civil_Status`) VALUES (NULL, 'Christal', 'B', 'Marcos', NULL, 'De La Salle', 'Taft Avenue', 'Vice President', 'c@yahoo.com', NULL, '3242412', '09159403688', 'Female', 'Single');
INSERT INTO `crisp`.`Proctor` (`Proctor_ID`, `First_Name`, `Middle_Initial`, `Last_Name`, `Name_Suffix`, `Company_Name`, `Company_Address`, `Position`, `Email`, `Facebook`, `Landline`, `Mobile_Number`, `Gender`, `Civil_Status`) VALUES (NULL, 'Eyana', 'C', 'Diana', 'II', 'Makati Business Club', 'Ayala Avenue, Makati', 'Secretary', 'ey@hotmail.com', 'Eyana', '3241412', '09124234231', 'Female', 'Separated');
INSERT INTO `crisp`.`Proctor` (`Proctor_ID`, `First_Name`, `Middle_Initial`, `Last_Name`, `Name_Suffix`, `Company_Name`, `Company_Address`, `Position`, `Email`, `Facebook`, `Landline`, `Mobile_Number`, `Gender`, `Civil_Status`) VALUES (NULL, 'Milo', 'B', 'Conception', NULL, 'SM', 'Pasay City, Philippines', 'Treasurer', 'sm@yahoo.com', 'Milo', '2342431', '09121834281', 'Male', 'Single');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Log`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Log` (`Log_ID`, `Made_By`, `Changes`, `Created_At`) VALUES (1, 'John Mayer', 'Add Teacher', '2012-11-15');
INSERT INTO `crisp`.`Log` (`Log_ID`, `Made_By`, `Changes`, `Created_At`) VALUES (NULL, 'Whiz Khaliffa', 'Add Student', '2011-11-16');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`GCAT_Class`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`GCAT_Class` (`Class_ID`, `Proctor_ID`) VALUES (1, 1);
INSERT INTO `crisp`.`GCAT_Class` (`Class_ID`, `Proctor_ID`) VALUES (2, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Other_Class`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Other_Class` (`Class_ID`, `Teacher_ID`) VALUES (3, 1);
INSERT INTO `crisp`.`Other_Class` (`Class_ID`, `Teacher_ID`) VALUES (4, 2);
INSERT INTO `crisp`.`Other_Class` (`Class_ID`, `Teacher_ID`) VALUES (5, 3);
INSERT INTO `crisp`.`Other_Class` (`Class_ID`, `Teacher_ID`) VALUES (6, 4);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`T3_Class`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_ID`, `Subject_ID`, `Master_Trainer_ID`, `School_Year`, `Name`, `Created_At`) VALUES (1, 1, 1, 1, '2013-2014', 'A', NULL);
INSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_ID`, `Subject_ID`, `Master_Trainer_ID`, `School_Year`, `Name`, `Created_At`) VALUES (NULL, 2, 1, 2, '2013-2014', 'B', NULL);
INSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_ID`, `Subject_ID`, `Master_Trainer_ID`, `School_Year`, `Name`, `Created_At`) VALUES (NULL, 3, 1, 3, '2012-2013', 'C', NULL);
INSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_ID`, `Subject_ID`, `Master_Trainer_ID`, `School_Year`, `Name`, `Created_At`) VALUES (NULL, 4, 1, 4, '2010-2011', 'D', NULL);
INSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_ID`, `Subject_ID`, `Master_Trainer_ID`, `School_Year`, `Name`, `Created_At`) VALUES (NULL, 1, 2, 4, '2009-2010', 'E', NULL);
INSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_ID`, `Subject_ID`, `Master_Trainer_ID`, `School_Year`, `Name`, `Created_At`) VALUES (NULL, 2, 2, 3, '2011-2012', 'F', NULL);
INSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_ID`, `Subject_ID`, `Master_Trainer_ID`, `School_Year`, `Name`, `Created_At`) VALUES (NULL, 3, 2, 2, '2012-2014', 'G', NULL);
INSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_ID`, `Subject_ID`, `Master_Trainer_ID`, `School_Year`, `Name`, `Created_At`) VALUES (NULL, 1, 3, 1, '2011-2011', 'H', NULL);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Teacher_T3_Application`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Teacher_T3_Application` (`Teacher_T3_Application_ID`, `Teacher_ID`, `T3_Application_ID`) VALUES (1, 1, 1);
INSERT INTO `crisp`.`Teacher_T3_Application` (`Teacher_T3_Application_ID`, `Teacher_ID`, `T3_Application_ID`) VALUES (NULL, 2, 2);
INSERT INTO `crisp`.`Teacher_T3_Application` (`Teacher_T3_Application_ID`, `Teacher_ID`, `T3_Application_ID`) VALUES (NULL, 3, 3);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Users`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Users` (`id`, `username`, `first_name`, `last_name`, `password`, `type`, `school`) VALUES (1, 'rcruz', 'Raymond', 'Cruz', '9a73055b9e5a5edbf80c34198e05f0d1', 'admin', NULL),
INSERT INTO `crisp`.`Users` (`id`, `username`, `first_name`, `last_name`, `password`, `type`, `school`) VALUES (2, 'pluces', 'Paolo', 'Luces', '1532136b72115a3f2c6fcd81bf80e7f4', 'admin', NULL),
INSERT INTO `crisp`.`Users` (`id`, `username`, `first_name`, `last_name`, `password`, `type`, `school`) VALUES (3, 'jfederico', 'Joy', 'Federico', 'c2c8e798aecbc26d86e4805114b03c51', 'admin', NULL),
INSERT INTO `crisp`.`Users` (`id`, `username`, `first_name`, `last_name`, `password`, `type`, `school`) VALUES (4, 'pperalta', 'Phil', 'Peralta', 'd14ffd41334ec4b4b3f2c0d55c38be6f', 'admin', NULL),
INSERT INTO `crisp`.`Users` (`id`, `username`, `first_name`, `last_name`, `password`, `type`, `school`) VALUES (5, 'ffajardo', 'Francis', 'Fajardo', 'd0ab7fe6c314f4fe5b6c18a0157c96b4', 'admin', NULL),
INSERT INTO `crisp`.`Users` (`id`, `username`, `first_name`, `last_name`, `password`, `type`, `school`) VALUES (6, 'ABC11', 'Aaron', 'Casurao', '65079b006e85a7e798abecb99e47c154', 'admin', NULL),
INSERT INTO `crisp`.`Users` (`id`, `username`, `first_name`, `last_name`, `password`, `type`, `school`) VALUES (7, 'marmario', 'Mitch', 'Armario', 'fae53351b9effc708e764e871bef3119', 'admin', NULL),
INSERT INTO `crisp`.`Users` (`id`, `username`, `first_name`, `last_name`, `password`, `type`, `school`) VALUES (8, 'guest', 'Guest', 'User', '084e0343a0486ff05530df6c705c8bb4', 'guest', NULL),
INSERT INTO `crisp`.`Users` (`id`, `username`, `first_name`, `last_name`, `password`, `type`, `school`) VALUES (9, 'mandogs', 'Manolo', 'Valena', '3c3662bcb661d6de679c636744c66b62', 'encoder', 'De La Salle University');

COMMIT;


