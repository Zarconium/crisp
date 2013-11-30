SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `crisp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `crisp` ;

-- -----------------------------------------------------
-- Table `crisp`.`School`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`School` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`School` (
  `School_ID` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(100) NOT NULL ,
  `Address` TEXT NOT NULL ,
  `Landline` VARCHAR(9) NOT NULL ,
  `Email` VARCHAR(45) NOT NULL ,
  `Point Person` VARCHAR(45) NOT NULL ,
  `Point_Person_Contact` VARCHAR(13) NOT NULL ,
  `Updated_At` DATETIME NULL ,
  `Created_At` DATETIME NOT NULL ,
  `Code` VARCHAR(10) NOT NULL ,
  `Branch` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`School_ID`) ,
  UNIQUE INDEX `School_ID_UNIQUE` (`School_ID` ASC) ,
  UNIQUE INDEX `Code_UNIQUE` (`Code` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Teacher`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Teacher` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Teacher` (
  `Teacher_ID` INT NOT NULL AUTO_INCREMENT ,
  `Street_Number` VARCHAR(5) NOT NULL ,
  `Street_Name` VARCHAR(45) NOT NULL ,
  `City` VARCHAR(45) NOT NULL ,
  `Province` VARCHAR(45) NOT NULL ,
  `Region` VARCHAR(45) NOT NULL ,
  `Alternate_Address` TEXT NULL ,
  `Email` VARCHAR(45) NOT NULL ,
  `Facebook` VARCHAR(45) NULL ,
  `Civil_Status` VARCHAR(9) NOT NULL DEFAULT 'Single' ,
  `Birthdate` DATETIME NOT NULL ,
  `Birthplace` VARCHAR(45) NOT NULL DEFAULT 'Philippines' ,
  `Gender` CHAR NOT NULL ,
  `Nationality` VARCHAR(45) NOT NULL DEFAULT 'Filipino' ,
  `School_ID` INT NOT NULL ,
  `Current_Position` VARCHAR(45) NOT NULL ,
  `Employment_Status` VARCHAR(4) NOT NULL ,
  `Name_of_Supervisor` VARCHAR(45) NOT NULL ,
  `Supervisor_Contact_Details` VARCHAR(11) NOT NULL ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` DATETIME NULL ,
  `Resume?` TINYINT(1) NOT NULL ,
  `Photo?` TINYINT(1) NOT NULL DEFAULT False ,
  `Proof_of_Certification?` TINYINT(1) NOT NULL DEFAULT False ,
  `Diploma/TOR` TINYINT(1) NOT NULL DEFAULT False ,
  `Desktop?` TINYINT(1) NOT NULL DEFAULT False ,
  `Laptop?` TINYINT(1) NOT NULL DEFAULT False ,
  `Internet?` TINYINT(1) NOT NULL DEFAULT False ,
  `Total_Year_of_Teaching` INT(11) NOT NULL ,
  `Code` VARCHAR(45) NOT NULL ,
  `First_Name` VARCHAR(45) NOT NULL ,
  `Mobile_Number` VARCHAR(13) NOT NULL ,
  `Name_Suffix` VARCHAR(5) NULL ,
  `Middle_Initial` CHAR NOT NULL ,
  `Last_Name` VARCHAR(45) NOT NULL ,
  `Landline` VARCHAR(9) NOT NULL ,
  PRIMARY KEY (`Teacher_ID`) ,
  INDEX `fk_Teacher_School1_idx` (`School_ID` ASC) ,
  UNIQUE INDEX `Teacher_ID_UNIQUE` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Teacher_School1`
    FOREIGN KEY (`School_ID` )
    REFERENCES `crisp`.`School` (`School_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Teacher_Training_Experience`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Teacher_Training_Experience` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Training_Experience` (
  `Teacher_Training_Experience_ID` INT NOT NULL AUTO_INCREMENT ,
  `Teacher_ID` INT NOT NULL ,
  `Institution` VARCHAR(250) NOT NULL ,
  `Position` VARCHAR(45) NOT NULL ,
  `Date` DATETIME NOT NULL ,
  `Level_Taught` VARCHAR(250) NOT NULL ,
  `Courses_Taught` TEXT NOT NULL ,
  `Number_of_Years_in_Institution` INT NOT NULL ,
  INDEX `fk_Teacher_Training_Experience_Teacher_idx` (`Teacher_ID` ASC) ,
  PRIMARY KEY (`Teacher_Training_Experience_ID`) ,
  UNIQUE INDEX `Teacher_Training_Experience_ID_UNIQUE` (`Teacher_Training_Experience_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Training_Experience_Teacher`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Teacher_Certification`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Teacher_Certification` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Certification` (
  `Teacher_Certification_ID` INT NOT NULL AUTO_INCREMENT ,
  `Certification` VARCHAR(45) NOT NULL ,
  `Certifying_Body` VARCHAR(250) NOT NULL ,
  `Date_Received` DATETIME NOT NULL ,
  `Teacher_ID` INT NOT NULL ,
  PRIMARY KEY (`Teacher_Certification_ID`) ,
  INDEX `fk_Teacher_Certification_Teacher1_idx` (`Teacher_ID` ASC) ,
  UNIQUE INDEX `Teacher_Certification_ID_UNIQUE` (`Teacher_Certification_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Certification_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Teacher_Awards`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Teacher_Awards` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Awards` (
  `Teacher_Awards_ID` INT NOT NULL AUTO_INCREMENT ,
  `Award` VARCHAR(45) NOT NULL ,
  `Awarding_Body` VARCHAR(45) NOT NULL ,
  `Date_Received` DATE NOT NULL ,
  `Teacher_ID` INT NOT NULL ,
  PRIMARY KEY (`Teacher_Awards_ID`) ,
  INDEX `fk_Teacher_Awards_Teacher1_idx` (`Teacher_ID` ASC) ,
  UNIQUE INDEX `Teacher_Awards_ID_UNIQUE` (`Teacher_Awards_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Awards_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Teacher_Relevant_Experiences`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Teacher_Relevant_Experiences` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Relevant_Experiences` (
  `Teacher_Relevant_Experiences_ID` INT NOT NULL AUTO_INCREMENT ,
  `Organization` VARCHAR(250) NOT NULL ,
  `Position` VARCHAR(45) NOT NULL ,
  `Description` VARCHAR(250) NULL ,
  `Date` DATE NOT NULL ,
  `Teacher_ID` INT NOT NULL ,
  PRIMARY KEY (`Teacher_Relevant_Experiences_ID`) ,
  INDEX `fk_Teacher_Relevant_Experiences_Teacher1_idx` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Relevant_Experiences_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Computer_Skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Computer_Skills` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Computer_Skills` (
  `Computer_Skills_ID` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`Computer_Skills_ID`) ,
  UNIQUE INDEX `Computer_Skills_ID_UNIQUE` (`Computer_Skills_ID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Teacher_Computer_Profiency`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Teacher_Computer_Profiency` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Computer_Profiency` (
  `Teacher_Computer_Profiency_ID` INT NOT NULL AUTO_INCREMENT ,
  `Skills_ID` INT NOT NULL ,
  `Teacher_ID` INT NOT NULL ,
  PRIMARY KEY (`Teacher_Computer_Profiency_ID`) ,
  INDEX `fk_Teacher_Computer_Profiency_Skills1_idx` (`Skills_ID` ASC) ,
  INDEX `fk_Teacher_Computer_Profiency_Teacher1_idx` (`Teacher_ID` ASC) ,
  UNIQUE INDEX `Teacher_Computer_Profiency_ID_UNIQUE` (`Teacher_Computer_Profiency_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Computer_Profiency_Skills1`
    FOREIGN KEY (`Skills_ID` )
    REFERENCES `crisp`.`Computer_Skills` (`Computer_Skills_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Teacher_Computer_Profiency_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Teacher_Computer_Familiarity`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Teacher_Computer_Familiarity` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Computer_Familiarity` (
  `Teacher_Computer_Familiarity_ID` INT NOT NULL AUTO_INCREMENT ,
  `Teacher_ID` INT NOT NULL ,
  `Skills_ID` INT NOT NULL ,
  PRIMARY KEY (`Teacher_Computer_Familiarity_ID`) ,
  INDEX `fk_Teacher_Computer_Familiarity_Teacher1_idx` (`Teacher_ID` ASC) ,
  INDEX `fk_Teacher_Computer_Familiarity_Skills1_idx` (`Skills_ID` ASC) ,
  UNIQUE INDEX `Teacher_Computer_Familiarity_ID_UNIQUE` (`Teacher_Computer_Familiarity_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Computer_Familiarity_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Teacher_Computer_Familiarity_Skills1`
    FOREIGN KEY (`Skills_ID` )
    REFERENCES `crisp`.`Computer_Skills` (`Computer_Skills_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Skills` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Skills` (
  `Skills_ID` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`Skills_ID`) ,
  UNIQUE INDEX `Skills_ID_UNIQUE` (`Skills_ID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Teacher_Other_Skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Teacher_Other_Skills` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Other_Skills` (
  `Teacher_Other_Skills_ID` INT NOT NULL AUTO_INCREMENT ,
  `Skills_ID` INT NOT NULL ,
  `Teacher_ID` INT NOT NULL ,
  PRIMARY KEY (`Teacher_Other_Skills_ID`) ,
  INDEX `fk_Teacher_Other_Skills_Skills1_idx` (`Skills_ID` ASC) ,
  INDEX `fk_Teacher_Other_Skills_Teacher1_idx` (`Teacher_ID` ASC) ,
  UNIQUE INDEX `Teacher_Other_Skills_ID_UNIQUE` (`Teacher_Other_Skills_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Other_Skills_Skills1`
    FOREIGN KEY (`Skills_ID` )
    REFERENCES `crisp`.`Skills` (`Skills_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Teacher_Other_Skills_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Teacher_Professional_Reference`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Teacher_Professional_Reference` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Professional_Reference` (
  `Teacher_Professional_Reference_ID` INT NOT NULL AUTO_INCREMENT ,
  `Email` VARCHAR(45) NOT NULL ,
  `Name` VARCHAR(45) NOT NULL ,
  `Position` VARCHAR(45) NULL ,
  `Company` VARCHAR(45) NOT NULL ,
  `Phone` VARCHAR(11) NOT NULL ,
  `Teacher_ID` INT NOT NULL ,
  PRIMARY KEY (`Teacher_Professional_Reference_ID`) ,
  INDEX `fk_Teacher_Professional_Reference_Teacher1_idx` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Professional_Reference_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Subject`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Subject` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Subject` (
  `Subject_ID` INT NOT NULL AUTO_INCREMENT ,
  `Subject_Name` VARCHAR(45) NOT NULL ,
  `Subject_Code` VARCHAR(8) NOT NULL ,
  PRIMARY KEY (`Subject_ID`) ,
  UNIQUE INDEX `Subject_ID_UNIQUE` (`Subject_ID` ASC) ,
  UNIQUE INDEX `Subject_Code_UNIQUE` (`Subject_Code` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`T3_Application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`T3_Application` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`T3_Application` (
  `T3_Application_ID` INT NOT NULL AUTO_INCREMENT ,
  `Date` VARCHAR(45) NOT NULL ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` VARCHAR(45) NULL ,
  `Subject_ID` INT NOT NULL ,
  PRIMARY KEY (`T3_Application_ID`) ,
  INDEX `fk_Teacher_Application_Subject1` (`Subject_ID` ASC) ,
  UNIQUE INDEX `T3_Application_ID_UNIQUE` (`T3_Application_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Application_Subject1`
    FOREIGN KEY (`Subject_ID` )
    REFERENCES `crisp`.`Subject` (`Subject_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`SMP_T3_Application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`SMP_T3_Application` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`SMP_T3_Application` (
  `T3_Application_ID` INT NOT NULL AUTO_INCREMENT ,
  `Answer_1` TEXT NULL ,
  `Answer_2` TEXT NULL ,
  `Answer_3` TEXT NULL ,
  `Total_Numbers_Of_Subjects_Handled` INT NOT NULL ,
  `Years_Teaching` INT NOT NULL ,
  `Years_Teaching_In_Current_Institution` INT NOT NULL ,
  `Avg_Student_Per_Class` INT NOT NULL ,
  `Support_Offices_Available` TEXT NULL ,
  `Instructional_Materials_Support` TEXT NULL ,
  `Technology_Support` TEXT NULL ,
  `Readily_Use_Lab?` TINYINT(1) NOT NULL DEFAULT False ,
  `Internet_Services?` TINYINT(1) NOT NULL DEFAULT False ,
  `Self_Assessment_Form_Business_Communication` TINYINT(1) NOT NULL DEFAULT False ,
  `Self_Assessment_Form_Service_Culture` TINYINT(1) NOT NULL DEFAULT False ,
  `Contract?` TINYINT(1) NOT NULL DEFAULT False ,
  PRIMARY KEY (`T3_Application_ID`) ,
  INDEX `fk_SMP_T3_Application_Teacher_Application1` (`T3_Application_ID` ASC) ,
  UNIQUE INDEX `T3_Application_ID_UNIQUE` (`T3_Application_ID` ASC) ,
  CONSTRAINT `fk_SMP_T3_Application_Teacher_Application1`
    FOREIGN KEY (`T3_Application_ID` )
    REFERENCES `crisp`.`T3_Application` (`T3_Application_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Related_Trainings_Attended`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Related_Trainings_Attended` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Related_Trainings_Attended` (
  `Related_Trainings_Attended_ID` INT NOT NULL AUTO_INCREMENT ,
  `Training` VARCHAR(45) NOT NULL ,
  `Training_Body` VARCHAR(250) NOT NULL ,
  `Training_Date` DATETIME NOT NULL ,
  PRIMARY KEY (`Related_Trainings_Attended_ID`) ,
  UNIQUE INDEX `Related_Trainings_Attended_ID_UNIQUE` (`Related_Trainings_Attended_ID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Stipend_Tracking`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Stipend_Tracking` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Stipend_Tracking` (
  `Stipend_Tracking_ID` INT NOT NULL AUTO_INCREMENT ,
  `Amount` DOUBLE NOT NULL DEFAULT 0.00 ,
  `Claimed?` TINYINT(1) NOT NULL DEFAULT False ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` DATETIME NULL ,
  `Teacher_ID` INT NOT NULL ,
  PRIMARY KEY (`Stipend_Tracking_ID`) ,
  INDEX `fk_Stipend_Tracking_Teacher1_idx` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Stipend_Tracking_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Stipend_Tracking_List`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Stipend_Tracking_List` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Stipend_Tracking_List` (
  `Stipend_Tracking_List_ID` INT NOT NULL AUTO_INCREMENT ,
  `Date` VARCHAR(45) NOT NULL ,
  `Checked_By` VARCHAR(100) NOT NULL ,
  `Stipend_Tracking_ID` INT NOT NULL ,
  `Subject_ID` INT NOT NULL ,
  PRIMARY KEY (`Stipend_Tracking_List_ID`) ,
  INDEX `fk_Stipend_Tracking_List_Stipend_Tracking1_idx` (`Stipend_Tracking_ID` ASC) ,
  INDEX `fk_Stipend_Tracking_List_Subject_ID1_idx` (`Subject_ID` ASC) ,
  CONSTRAINT `fk_Stipend_Tracking_List_Stipend_Tracking1`
    FOREIGN KEY (`Stipend_Tracking_ID` )
    REFERENCES `crisp`.`Stipend_Tracking` (`Stipend_Tracking_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Stipend_Tracking_List_Subject_ID1`
    FOREIGN KEY (`Subject_ID` )
    REFERENCES `crisp`.`Subject` (`Subject_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`SMP_T3_Attendance`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`SMP_T3_Attendance` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`SMP_T3_Attendance` (
  `SMP_T3_Attendance_ID` INT NOT NULL AUTO_INCREMENT ,
  `Time_In?` TINYINT(1) NOT NULL DEFAULT False ,
  `AM_Snack?` TINYINT(1) NOT NULL DEFAULT False ,
  `Lunch?` TINYINT(1) NOT NULL DEFAULT False ,
  `PM_Snack?` TINYINT(1) NOT NULL DEFAULT False ,
  `Time_Out?` TINYINT(1) NOT NULL DEFAULT False ,
  `Date` DATETIME NOT NULL ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` DATETIME NULL ,
  PRIMARY KEY (`SMP_T3_Attendance_ID`) ,
  UNIQUE INDEX `SMP_T3_Attendance_ID_UNIQUE` (`SMP_T3_Attendance_ID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`SMP_T3_Site_Visit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`SMP_T3_Site_Visit` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`SMP_T3_Site_Visit` (
  `SMP_T3_Site_Visit_ID` INT NOT NULL AUTO_INCREMENT ,
  `Training_Location` VARCHAR(45) NOT NULL ,
  `Company_Host` VARCHAR(45) NOT NULL ,
  `Event_Date` DATETIME NOT NULL ,
  `Feedback_Form?` TINYINT(1) NOT NULL DEFAULT False ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` DATETIME NULL ,
  PRIMARY KEY (`SMP_T3_Site_Visit_ID`) ,
  UNIQUE INDEX `SMP_T3_Site_Visit_ID_UNIQUE` (`SMP_T3_Site_Visit_ID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Status` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Status` (
  `Status_ID` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(20) NOT NULL ,
  PRIMARY KEY (`Status_ID`) ,
  UNIQUE INDEX `Status_ID_UNIQUE` (`Status_ID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`T3_Tracker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`T3_Tracker` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`T3_Tracker` (
  `T3_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,
  `Status_ID` INT NOT NULL ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` DATETIME NULL ,
  `Contract?` TINYINT(1) NOT NULL DEFAULT False ,
  `Remarks` VARCHAR(250) NULL ,
  `Subject_ID` INT NOT NULL ,
  PRIMARY KEY (`T3_Tracker_ID`) ,
  INDEX `fk_Teacher_Tracker_Status1` (`Status_ID` ASC) ,
  INDEX `fk_Teacher_Tracker_Subject1` (`Subject_ID` ASC) ,
  UNIQUE INDEX `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Tracker_Status1`
    FOREIGN KEY (`Status_ID` )
    REFERENCES `crisp`.`Status` (`Status_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Teacher_Tracker_Subject1`
    FOREIGN KEY (`Subject_ID` )
    REFERENCES `crisp`.`Subject` (`Subject_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`SMP_T3_Tracker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`SMP_T3_Tracker` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`SMP_T3_Tracker` (
  `T3_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,
  `SMP_T3_Site_Visit_ID` INT NOT NULL ,
  PRIMARY KEY (`T3_Tracker_ID`) ,
  INDEX `fk_SMP_T3_Tracker_SMP_T3_Site_Visit1` (`SMP_T3_Site_Visit_ID` ASC) ,
  INDEX `fk_SMP_T3_Tracker_T3_Tracker1_idx` (`T3_Tracker_ID` ASC) ,
  UNIQUE INDEX `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID` ASC) ,
  CONSTRAINT `fk_SMP_T3_Tracker_SMP_T3_Site_Visit1`
    FOREIGN KEY (`SMP_T3_Site_Visit_ID` )
    REFERENCES `crisp`.`SMP_T3_Site_Visit` (`SMP_T3_Site_Visit_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SMP_T3_Tracker_T3_Tracker1`
    FOREIGN KEY (`T3_Tracker_ID` )
    REFERENCES `crisp`.`T3_Tracker` (`T3_Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`SMP_T3_Attendance_Tracking`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`SMP_T3_Attendance_Tracking` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`SMP_T3_Attendance_Tracking` (
  `SMP_T3_Attendance_Tracking_ID` INT NOT NULL AUTO_INCREMENT ,
  `Event` VARCHAR(100) NOT NULL ,
  `SMP_T3_Attendance_ID` INT NOT NULL ,
  `T3_Tracker_ID` INT NOT NULL ,
  PRIMARY KEY (`SMP_T3_Attendance_Tracking_ID`) ,
  INDEX `fk_SMP_T3_Attendance_Tracking_SMP_T3_Attendance1_idx` (`SMP_T3_Attendance_ID` ASC) ,
  INDEX `fk_SMP_T3_Attendance_Tracking_SMP_T3_Tracker1` (`T3_Tracker_ID` ASC) ,
  UNIQUE INDEX `SMP_T3_Attendance_Tracking_ID_UNIQUE` (`SMP_T3_Attendance_Tracking_ID` ASC) ,
  CONSTRAINT `fk_SMP_T3_Attendance_Tracking_SMP_T3_Attendance1`
    FOREIGN KEY (`SMP_T3_Attendance_ID` )
    REFERENCES `crisp`.`SMP_T3_Attendance` (`SMP_T3_Attendance_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SMP_T3_Attendance_Tracking_SMP_T3_Tracker1`
    FOREIGN KEY (`T3_Tracker_ID` )
    REFERENCES `crisp`.`SMP_T3_Tracker` (`T3_Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Best_Adept_T3_Application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Best_Adept_T3_Application` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Best_Adept_T3_Application` (
  `T3_Application_ID` INT NOT NULL AUTO_INCREMENT ,
  `Answer_1` TEXT NULL ,
  `Answer_2` TEXT NULL ,
  `Answer_3` TEXT NULL ,
  `Contract?` TINYINT(1) NOT NULL DEFAULT False ,
  PRIMARY KEY (`T3_Application_ID`) ,
  INDEX `fk_Best_Adept_T3_Application_Teacher_Application1` (`T3_Application_ID` ASC) ,
  UNIQUE INDEX `T3_Application_ID_UNIQUE` (`T3_Application_ID` ASC) ,
  CONSTRAINT `fk_Best_Adept_T3_Application_Teacher_Application1`
    FOREIGN KEY (`T3_Application_ID` )
    REFERENCES `crisp`.`T3_Application` (`T3_Application_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Best_T3_Attendance`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Best_T3_Attendance` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Best_T3_Attendance` (
  `Best_T3_Attendance_ID` INT NOT NULL AUTO_INCREMENT ,
  `Orientation_Day` DATETIME NULL ,
  `Site_Visit` DATETIME NULL ,
  `Day_1` DATETIME NULL ,
  `Day_2` DATETIME NULL ,
  `Day_3` DATETIME NULL ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` DATETIME NULL ,
  PRIMARY KEY (`Best_T3_Attendance_ID`) ,
  UNIQUE INDEX `Best_T3_Attendance_ID_UNIQUE` (`Best_T3_Attendance_ID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Adept_T3_Attendance`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Adept_T3_Attendance` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Adept_T3_Attendance` (
  `Adept_T3_Attendance_ID` INT NOT NULL AUTO_INCREMENT ,
  `Orientation_Day` DATETIME NULL ,
  `Site_Visit` DATETIME NULL ,
  `Day_1` DATETIME NULL ,
  `Day_2` DATETIME NULL ,
  `Day_3` DATETIME NULL ,
  `Day_4` DATETIME NULL ,
  `Day_5` DATETIME NULL ,
  `Day_6` DATETIME NULL ,
  `GCAT` DATETIME NULL ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` DATETIME NULL ,
  PRIMARY KEY (`Adept_T3_Attendance_ID`) ,
  UNIQUE INDEX `Adept_T3_Attendance_ID_UNIQUE` (`Adept_T3_Attendance_ID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Best_T3_Grades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Best_T3_Grades` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Best_T3_Grades` (
  `Best_T3_Grades_ID` INT NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`Best_T3_Grades_ID`) ,
  UNIQUE INDEX `Best_T3_Grades_ID_UNIQUE` (`Best_T3_Grades_ID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Best_T3_Tracker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Best_T3_Tracker` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Best_T3_Tracker` (
  `T3_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,
  `Best_T3_Attendance_ID` INT NOT NULL ,
  `Interview_Form?` TINYINT(1) NOT NULL DEFAULT False ,
  `Site_Visit_Form?` TINYINT(1) NOT NULL DEFAULT False ,
  `Best_T3_Feedback?` TINYINT(1) NOT NULL DEFAULT False ,
  `Best_E-Learning_Feedback` TINYINT(1) NOT NULL DEFAULT False ,
  `Best_CD` TINYINT(1) NOT NULL DEFAULT False ,
  `Certificate_Of_Attendance` TINYINT(1) NOT NULL DEFAULT False ,
  `Best_Certified_Trainers` TINYINT(1) NOT NULL DEFAULT False ,
  `Task_1` DOUBLE NULL DEFAULT 0.00 ,
  `Task_2` DOUBLE NULL DEFAULT 0.00 ,
  `Task_3` DOUBLE NULL DEFAULT 0.00 ,
  `Task_4` DOUBLE NULL DEFAULT 0.00 ,
  `Best_T3_Grades_ID` INT NOT NULL ,
  `Control_Number` VARCHAR(5) NULL ,
  `User_Name` VARCHAR(45) NULL ,
  PRIMARY KEY (`T3_Tracker_ID`) ,
  INDEX `fk_Adept_T3_Tracker_Best_T3_Attendance1_idx` (`Best_T3_Attendance_ID` ASC) ,
  INDEX `fk_Adept_T3_Tracker_Best_T3_Grades1_idx` (`Best_T3_Grades_ID` ASC) ,
  INDEX `fk_Best_T3_Tracker_Teacher_Tracker1` (`T3_Tracker_ID` ASC) ,
  UNIQUE INDEX `Control_Number_UNIQUE` (`Control_Number` ASC) ,
  UNIQUE INDEX `User_Name_UNIQUE` (`User_Name` ASC) ,
  UNIQUE INDEX `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID` ASC) ,
  CONSTRAINT `fk_Adept_T3_Tracker_Best_T3_Attendance1`
    FOREIGN KEY (`Best_T3_Attendance_ID` )
    REFERENCES `crisp`.`Best_T3_Attendance` (`Best_T3_Attendance_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Adept_T3_Tracker_Best_T3_Grades1`
    FOREIGN KEY (`Best_T3_Grades_ID` )
    REFERENCES `crisp`.`Best_T3_Grades` (`Best_T3_Grades_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Best_T3_Tracker_Teacher_Tracker1`
    FOREIGN KEY (`T3_Tracker_ID` )
    REFERENCES `crisp`.`T3_Tracker` (`T3_Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Adept_T3_Grades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Adept_T3_Grades` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Adept_T3_Grades` (
  `Adept_T3_Grades_ID` INT NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`Adept_T3_Grades_ID`) ,
  UNIQUE INDEX `Adept_T3_Grades_ID_UNIQUE` (`Adept_T3_Grades_ID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Adept_T3_Tracker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Adept_T3_Tracker` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Adept_T3_Tracker` (
  `T3_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,
  `Adept_T3_Grades_ID` INT NOT NULL ,
  `Adept_T3_Attendance_ID` INT NOT NULL ,
  `Interview_Form?` TINYINT(1) NOT NULL DEFAULT False ,
  `Site_Visit_Form?` TINYINT(1) NOT NULL DEFAULT False ,
  `Adept_T3_Feedback?` TINYINT(1) NOT NULL DEFAULT False ,
  `Adept_E-Learning_Feedback` TINYINT(1) NOT NULL DEFAULT False ,
  `Manual_&_Kit` TINYINT(1) NOT NULL DEFAULT False ,
  `Certificate_Of_Attendance` TINYINT(1) NOT NULL DEFAULT False ,
  `Adept_Certified_Trainers` TINYINT(1) NOT NULL ,
  `Lesson_Plan` DOUBLE NULL DEFAULT 0.00 ,
  `Demo` DOUBLE NULL DEFAULT 0.00 ,
  `Total_Weigthed` DOUBLE NULL DEFAULT 0.00 ,
  `Training_Portfolio` DOUBLE NULL DEFAULT 0.00 ,
  `Control_Number` VARCHAR(5) NULL ,
  `User_Name` VARCHAR(45) NULL ,
  PRIMARY KEY (`T3_Tracker_ID`) ,
  INDEX `fk_Adept_T3_Tracker_copy1_Adept_T3_Grades1_idx` (`Adept_T3_Grades_ID` ASC) ,
  INDEX `fk_Adept_T3_Tracker_copy1_Adept_T3_Attendance1_idx` (`Adept_T3_Attendance_ID` ASC) ,
  INDEX `fk_Adept_T3_Tracker_Teacher_Tracker1` (`T3_Tracker_ID` ASC) ,
  UNIQUE INDEX `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID` ASC) ,
  UNIQUE INDEX `Control_Number_UNIQUE` (`Control_Number` ASC) ,
  UNIQUE INDEX `User_Name_UNIQUE` (`User_Name` ASC) ,
  CONSTRAINT `fk_Adept_T3_Tracker_copy1_Adept_T3_Grades1`
    FOREIGN KEY (`Adept_T3_Grades_ID` )
    REFERENCES `crisp`.`Adept_T3_Grades` (`Adept_T3_Grades_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Adept_T3_Tracker_copy1_Adept_T3_Attendance1`
    FOREIGN KEY (`Adept_T3_Attendance_ID` )
    REFERENCES `crisp`.`Adept_T3_Attendance` (`Adept_T3_Attendance_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Adept_T3_Tracker_Teacher_Tracker1`
    FOREIGN KEY (`T3_Tracker_ID` )
    REFERENCES `crisp`.`T3_Tracker` (`T3_Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`GCAT_Tracker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`GCAT_Tracker` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`GCAT_Tracker` (
  `T3_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,
  `GCAT_Basic_Skills_Test_Overall_Score` INT NOT NULL DEFAULT 0 ,
  `GCAT_Total_Cognitive` INT NOT NULL DEFAULT 0 ,
  `GCAT_English_Proficiency` INT NOT NULL DEFAULT 0 ,
  `GCAT_Computer_Literacy` INT NOT NULL DEFAULT 0 ,
  `GCAT_Perceptual_Speed_&_Accuracy` INT NOT NULL DEFAULT 0 ,
  `GCAT_Behavioral_Component_Overall_Score` INT NOT NULL DEFAULT 0 ,
  `GCAT_Communication` INT NOT NULL DEFAULT 0 ,
  `GCAT_Learning_Orientation` INT NOT NULL DEFAULT 0 ,
  `GCAT_Courtesy` INT NOT NULL DEFAULT 0 ,
  `GCAT_Empathy` INT NOT NULL DEFAULT 0 ,
  `GCAT_Reliability` INT NOT NULL DEFAULT 0 ,
  `GCAT_Responsiveness` INT NOT NULL DEFAULT 0 ,
  `Session_ID` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`T3_Tracker_ID`) ,
  INDEX `fk_GCAT_T3_Tracker_Teacher_Tracker1` (`T3_Tracker_ID` ASC) ,
  UNIQUE INDEX `Session_ID_UNIQUE` (`Session_ID` ASC) ,
  UNIQUE INDEX `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID` ASC) ,
  CONSTRAINT `fk_GCAT_T3_Tracker_Teacher_Tracker1`
    FOREIGN KEY (`T3_Tracker_ID` )
    REFERENCES `crisp`.`T3_Tracker` (`T3_Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Related_Trainings_Attended_By_A_Teacher`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Related_Trainings_Attended_By_A_Teacher` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Related_Trainings_Attended_By_A_Teacher` (
  `Related_Trainings_Attended_By_A_Teacher` INT NOT NULL AUTO_INCREMENT ,
  `Related_Trainings_Attended_ID` INT NOT NULL ,
  `SMP_T3_Application_ID` INT NOT NULL ,
  PRIMARY KEY (`Related_Trainings_Attended_By_A_Teacher`) ,
  INDEX `fk_Related_Trainings_Attended_By_A_Teacher_Related_Training_idx` (`Related_Trainings_Attended_ID` ASC) ,
  INDEX `fk_Related_Trainings_Attended_By_A_Teacher_SMP_T3_Applicati_idx` (`SMP_T3_Application_ID` ASC) ,
  UNIQUE INDEX `Related_Trainings_Attended_By_A_Teacher_UNIQUE` (`Related_Trainings_Attended_By_A_Teacher` ASC) ,
  CONSTRAINT `fk_Related_Trainings_Attended_By_A_Teacher_Related_Trainings_1`
    FOREIGN KEY (`Related_Trainings_Attended_ID` )
    REFERENCES `crisp`.`Related_Trainings_Attended` (`Related_Trainings_Attended_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Related_Trainings_Attended_By_A_Teacher_SMP_T3_Application1`
    FOREIGN KEY (`SMP_T3_Application_ID` )
    REFERENCES `crisp`.`SMP_T3_Application` (`T3_Application_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Student` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Student` (
  `Student_ID` INT NOT NULL AUTO_INCREMENT ,
  `Last_Name` VARCHAR(45) NOT NULL ,
  `First_Name` VARCHAR(45) NOT NULL ,
  `Middle_Initial` VARCHAR(4) NOT NULL ,
  `Name_Suffix` VARCHAR(5) NULL ,
  `Student_ID_Number` VARCHAR(10) NOT NULL ,
  `Civil_Status` VARCHAR(9) NOT NULL DEFAULT 'Single' ,
  `Birthdate` DATETIME NOT NULL ,
  `Birthplace` VARCHAR(45) NOT NULL DEFAULT 'Philippines' ,
  `Gender` CHAR NOT NULL ,
  `Nationality` VARCHAR(45) NOT NULL DEFAULT 'Filipino' ,
  `Street_Number` VARCHAR(5) NOT NULL ,
  `Street_Name` VARCHAR(45) NOT NULL ,
  `City` VARCHAR(45) NOT NULL ,
  `Province` VARCHAR(45) NOT NULL ,
  `Region` VARCHAR(45) NOT NULL ,
  `Alternate_Address` TEXT NULL ,
  `Mobile_Number` VARCHAR(13) NOT NULL ,
  `Landline` VARCHAR(9) NOT NULL ,
  `Email` VARCHAR(45) NOT NULL ,
  `Facebook` VARCHAR(45) NULL ,
  `Course` VARCHAR(100) NOT NULL ,
  `Year` INT NOT NULL ,
  `School_ID` INT NOT NULL ,
  `Expected_Year_of_Graduation` INT NOT NULL ,
  `DOST_Scholar?` TINYINT(1) NOT NULL DEFAULT False ,
  `Scholar?` TINYINT(1) NOT NULL DEFAULT False ,
  `Interested_in_IT-BPO?` TEXT NULL ,
  `Own_A_Compter?` TINYINT(1) NOT NULL DEFAULT False ,
  `Internet_Access?` TINYINT(1) NOT NULL DEFAULT False ,
  `Code` VARCHAR(15) NOT NULL ,
  PRIMARY KEY (`Student_ID`) ,
  INDEX `fk_Student_School1` (`School_ID` ASC) ,
  UNIQUE INDEX `Student_ID_UNIQUE` (`Student_ID` ASC) ,
  CONSTRAINT `fk_Student_School1`
    FOREIGN KEY (`School_ID` )
    REFERENCES `crisp`.`School` (`School_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Organization_Affiliations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Organization_Affiliations` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Organization_Affiliations` (
  `Organization_Affiliations_ID` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(255) NOT NULL ,
  `Position` VARCHAR(45) NOT NULL ,
  `Years_Affiliated` INT NOT NULL ,
  `Description` VARCHAR(255) NULL ,
  PRIMARY KEY (`Organization_Affiliations_ID`) ,
  UNIQUE INDEX `Organization_Affiliations_ID_UNIQUE` (`Organization_Affiliations_ID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Student_Organization_Affiliations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Student_Organization_Affiliations` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Student_Organization_Affiliations` (
  `Student_Organization_Affiliations_ID` INT NOT NULL AUTO_INCREMENT ,
  `Organization_Affiliations_ID` INT NOT NULL ,
  `Student_ID` INT NOT NULL ,
  PRIMARY KEY (`Student_Organization_Affiliations_ID`) ,
  INDEX `fk_Student_Organization_Affiliations_Organization_Affiliati_idx` (`Organization_Affiliations_ID` ASC) ,
  INDEX `fk_Student_Organization_Affiliations_Student1_idx` (`Student_ID` ASC) ,
  UNIQUE INDEX `Student_Organization_Affiliations_ID_UNIQUE` (`Student_Organization_Affiliations_ID` ASC) ,
  CONSTRAINT `fk_Student_Organization_Affiliations_Organization_Affiliations1`
    FOREIGN KEY (`Organization_Affiliations_ID` )
    REFERENCES `crisp`.`Organization_Affiliations` (`Organization_Affiliations_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Organization_Affiliations_Student1`
    FOREIGN KEY (`Student_ID` )
    REFERENCES `crisp`.`Student` (`Student_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Student_Skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Student_Skills` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Student_Skills` (
  `Student_Skills_ID` INT NOT NULL AUTO_INCREMENT ,
  `Student_ID` INT NOT NULL ,
  `Skills_ID` INT NOT NULL ,
  PRIMARY KEY (`Student_Skills_ID`) ,
  INDEX `fk_Student_Skills_Student1_idx` (`Student_ID` ASC) ,
  INDEX `fk_Student_Skills_Skills1_idx` (`Skills_ID` ASC) ,
  UNIQUE INDEX `Student_Skills_ID_UNIQUE` (`Student_Skills_ID` ASC) ,
  CONSTRAINT `fk_Student_Skills_Student1`
    FOREIGN KEY (`Student_ID` )
    REFERENCES `crisp`.`Student` (`Student_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Skills_Skills1`
    FOREIGN KEY (`Skills_ID` )
    REFERENCES `crisp`.`Skills` (`Skills_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Student_Computer_Skills`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Student_Computer_Skills` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Student_Computer_Skills` (
  `Student_Computer_Skills_ID` INT NOT NULL AUTO_INCREMENT ,
  `Student_ID` INT NOT NULL ,
  `Computer_Skills_ID` INT NOT NULL ,
  `Level_Of_Proficiency` VARCHAR(45) NULL ,
  PRIMARY KEY (`Student_Computer_Skills_ID`) ,
  INDEX `fk_Student_Computer_Skills_Student1_idx` (`Student_ID` ASC) ,
  INDEX `fk_Student_Computer_Skills_Computer_Skills1_idx` (`Computer_Skills_ID` ASC) ,
  UNIQUE INDEX `Student_Computer_Skills_ID_UNIQUE` (`Student_Computer_Skills_ID` ASC) ,
  CONSTRAINT `fk_Student_Computer_Skills_Student1`
    FOREIGN KEY (`Student_ID` )
    REFERENCES `crisp`.`Student` (`Student_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Computer_Skills_Computer_Skills1`
    FOREIGN KEY (`Computer_Skills_ID` )
    REFERENCES `crisp`.`Computer_Skills` (`Computer_Skills_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Project`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Project` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Project` (
  `Project_ID` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(250) NOT NULL ,
  `Institution` VARCHAR(250) NOT NULL ,
  `Year_Implemented` INT NULL ,
  PRIMARY KEY (`Project_ID`) ,
  UNIQUE INDEX `Project_ID_UNIQUE` (`Project_ID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Teacher_Subjects_Taken`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Teacher_Subjects_Taken` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Subjects_Taken` (
  `Teacher_Subjects_Taken_ID` INT NOT NULL AUTO_INCREMENT ,
  `Teacher_ID` INT NOT NULL ,
  `Adept_T3_Tracker_ID` INT NOT NULL ,
  `Best_T3_Tracker_ID` INT NOT NULL ,
  PRIMARY KEY (`Teacher_Subjects_Taken_ID`) ,
  INDEX `fk_Teacher_Subjects_Taken_Teacher1_idx` (`Teacher_ID` ASC) ,
  UNIQUE INDEX `Teacher_Subjects_Taken_ID_UNIQUE` (`Teacher_Subjects_Taken_ID` ASC) ,
  CONSTRAINT `fk_Teacher_Subjects_Taken_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Student_Application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Student_Application` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Student_Application` (
  `Student_Application_ID` INT NOT NULL AUTO_INCREMENT ,
  `Application_ID` INT NOT NULL ,
  `Student_ID` INT NOT NULL ,
  `Project_ID` INT NOT NULL ,
  `Subject_ID` INT NOT NULL ,
  PRIMARY KEY (`Student_Application_ID`) ,
  INDEX `fk_Student_Application_Application1` (`Application_ID` ASC) ,
  INDEX `fk_Student_Application_Student2` (`Student_ID` ASC) ,
  INDEX `fk_Student_Application_Project2` (`Project_ID` ASC) ,
  INDEX `fk_Student_Application_Subject1` (`Subject_ID` ASC) ,
  UNIQUE INDEX `Student_Application_ID_UNIQUE` (`Student_Application_ID` ASC) ,
  CONSTRAINT `fk_Student_Application_Application1`
    FOREIGN KEY (`Application_ID` )
    REFERENCES `crisp`.`Application` (`Application_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Application_Student2`
    FOREIGN KEY (`Student_ID` )
    REFERENCES `crisp`.`Student` (`Student_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Application_Project2`
    FOREIGN KEY (`Project_ID` )
    REFERENCES `crisp`.`Project` (`Project_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Application_Subject1`
    FOREIGN KEY (`Subject_ID` )
    REFERENCES `crisp`.`Subject` (`Subject_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Application` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Application` (
  `Application_ID` INT NOT NULL AUTO_INCREMENT ,
  `Answer_1` TEXT NULL ,
  `Answer_2` TEXT NULL ,
  `Contract?` TINYINT(1) NOT NULL DEFAULT False ,
  `Date` DATETIME NOT NULL ,
  `Created_At` DATETIME NOT NULL ,
  `Updated_At` DATETIME NULL ,
  PRIMARY KEY (`Application_ID`) ,
  UNIQUE INDEX `Application_ID_UNIQUE` (`Application_ID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Student_Application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Student_Application` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Student_Application` (
  `Student_Application_ID` INT NOT NULL AUTO_INCREMENT ,
  `Application_ID` INT NOT NULL ,
  `Student_ID` INT NOT NULL ,
  `Project_ID` INT NOT NULL ,
  `Subject_ID` INT NOT NULL ,
  PRIMARY KEY (`Student_Application_ID`) ,
  INDEX `fk_Student_Application_Application1` (`Application_ID` ASC) ,
  INDEX `fk_Student_Application_Student2` (`Student_ID` ASC) ,
  INDEX `fk_Student_Application_Project2` (`Project_ID` ASC) ,
  INDEX `fk_Student_Application_Subject1` (`Subject_ID` ASC) ,
  UNIQUE INDEX `Student_Application_ID_UNIQUE` (`Student_Application_ID` ASC) ,
  CONSTRAINT `fk_Student_Application_Application1`
    FOREIGN KEY (`Application_ID` )
    REFERENCES `crisp`.`Application` (`Application_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Application_Student2`
    FOREIGN KEY (`Student_ID` )
    REFERENCES `crisp`.`Student` (`Student_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Application_Project2`
    FOREIGN KEY (`Project_ID` )
    REFERENCES `crisp`.`Project` (`Project_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Application_Subject1`
    FOREIGN KEY (`Subject_ID` )
    REFERENCES `crisp`.`Subject` (`Subject_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Tracker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Tracker` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Tracker` (
  `Tracker_ID` INT NOT NULL AUTO_INCREMENT ,
  `Contract?` TINYINT(1) NOT NULL DEFAULT False ,
  `Remarks` VARCHAR(255) NULL ,
  `Status_ID` INT NOT NULL ,
  `Times_Taken` INT NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`Tracker_ID`) ,
  INDEX `fk_Tracker_Status1` (`Status_ID` ASC) ,
  UNIQUE INDEX `Tracker_ID_UNIQUE` (`Tracker_ID` ASC) ,
  CONSTRAINT `fk_Tracker_Status1`
    FOREIGN KEY (`Status_ID` )
    REFERENCES `crisp`.`Status` (`Status_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Class` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Class` (
  `Class_ID` INT NOT NULL AUTO_INCREMENT ,
  `School_Year` VARCHAR(10) NOT NULL ,
  `Semester` INT NOT NULL ,
  `School_ID` INT NOT NULL ,
  `Subject_ID` INT NOT NULL ,
  PRIMARY KEY (`Class_ID`) ,
  INDEX `fk_Section_School2` (`School_ID` ASC) ,
  INDEX `fk_Class_Subject1_idx` (`Subject_ID` ASC) ,
  UNIQUE INDEX `Class_ID_UNIQUE` (`Class_ID` ASC) ,
  CONSTRAINT `fk_Section_School2`
    FOREIGN KEY (`School_ID` )
    REFERENCES `crisp`.`School` (`School_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Class_Subject1`
    FOREIGN KEY (`Subject_ID` )
    REFERENCES `crisp`.`Subject` (`Subject_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Student_Class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Student_Class` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Student_Class` (
  `Student_Class_ID` INT NOT NULL AUTO_INCREMENT ,
  `Class_ID` INT NOT NULL ,
  `Student_ID` INT NOT NULL ,
  PRIMARY KEY (`Student_Class_ID`) ,
  INDEX `fk_Student_Class_Class1` (`Class_ID` ASC) ,
  UNIQUE INDEX `Student_Class_ID_UNIQUE` (`Student_Class_ID` ASC) ,
  INDEX `fk_Student_Class_Student1` (`Student_ID` ASC) ,
  CONSTRAINT `fk_Student_Class_Class1`
    FOREIGN KEY (`Class_ID` )
    REFERENCES `crisp`.`Class` (`Class_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Class_Student1`
    FOREIGN KEY (`Student_ID` )
    REFERENCES `crisp`.`Student` (`Student_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`BEST_Student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`BEST_Student` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`BEST_Student` (
  `Tracker_ID` INT NOT NULL AUTO_INCREMENT ,
  `Contol_Number` VARCHAR(5) NULL ,
  `Username` VARCHAR(45) NULL ,
  PRIMARY KEY (`Tracker_ID`) ,
  UNIQUE INDEX `Tracker_ID_UNIQUE` (`Tracker_ID` ASC) ,
  CONSTRAINT `fk_BEST_Student_Tracker1`
    FOREIGN KEY (`Tracker_ID` )
    REFERENCES `crisp`.`Tracker` (`Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Adept_Student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Adept_Student` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Adept_Student` (
  `Tracker_ID` INT NOT NULL AUTO_INCREMENT ,
  `Control_Number` VARCHAR(5) NULL ,
  `Username` VARCHAR(45) NULL ,
  PRIMARY KEY (`Tracker_ID`) ,
  UNIQUE INDEX `Tracker_ID_UNIQUE` (`Tracker_ID` ASC) ,
  UNIQUE INDEX `Control_Number_UNIQUE` (`Control_Number` ASC) ,
  UNIQUE INDEX `Username_UNIQUE` (`Username` ASC) ,
  CONSTRAINT `fk_Adept_Student_Tracker1`
    FOREIGN KEY (`Tracker_ID` )
    REFERENCES `crisp`.`Tracker` (`Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`GCAT_Student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`GCAT_Student` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`GCAT_Student` (
  `Tracker_ID` INT NOT NULL AUTO_INCREMENT ,
  `GCAT_Total_Cognitive` INT NOT NULL DEFAULT 0 ,
  `GCAT_Responsiveness` INT NOT NULL DEFAULT 0 ,
  `GCAT_Reliability` INT NOT NULL DEFAULT 0 ,
  `GCAT_Empathy` INT NOT NULL DEFAULT 0 ,
  `GCAT_Courtesy` INT NOT NULL DEFAULT 0 ,
  `GCAT_Learning_Orientation` INT NOT NULL DEFAULT 0 ,
  `GCAT_Communication` INT NOT NULL DEFAULT 0 ,
  `GCAT_Behavioral_Component_Overall_Score` INT NOT NULL DEFAULT 0 ,
  `GCAT_Perceptual_Speed_&_Accuracy` INT NOT NULL DEFAULT 0 ,
  `GCAT_Computer_Literacy` INT NOT NULL DEFAULT 0 ,
  `GCAT_English_Proficiency` INT NOT NULL DEFAULT 0 ,
  `GCAT_Basic_Skills_Test_Overall_Score` INT NOT NULL DEFAULT 0 ,
  `Session_ID` VARCHAR(45) NULL ,
  PRIMARY KEY (`Tracker_ID`) ,
  UNIQUE INDEX `Session_ID_UNIQUE` (`Session_ID` ASC) ,
  CONSTRAINT `fk_GCAT_Student_Tracker1`
    FOREIGN KEY (`Tracker_ID` )
    REFERENCES `crisp`.`Tracker` (`Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`SMP_Student`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`SMP_Student` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`SMP_Student` (
  `Tracker_ID` INT NOT NULL AUTO_INCREMENT ,
  `Grade` VARCHAR(5) NULL ,
  INDEX `fk_SMP_Student_Tracker1_idx` (`Tracker_ID` ASC) ,
  PRIMARY KEY (`Tracker_ID`) ,
  UNIQUE INDEX `Tracker_ID_UNIQUE` (`Tracker_ID` ASC) ,
  CONSTRAINT `fk_SMP_Student_Tracker1`
    FOREIGN KEY (`Tracker_ID` )
    REFERENCES `crisp`.`Tracker` (`Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`SMP_Student_Courses_Taken`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`SMP_Student_Courses_Taken` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`SMP_Student_Courses_Taken` (
  `SMP_Student_Courses_Taken_ID` VARCHAR(45) NOT NULL ,
  `Student_Class_ID` INT NOT NULL AUTO_INCREMENT ,
  `Tracker_ID` INT NOT NULL ,
  INDEX `fk_SMP_Student_Courses_Taken_Student_Class1` (`Student_Class_ID` ASC) ,
  INDEX `fk_SMP_Student_Courses_Taken_SMP_Student1` (`Tracker_ID` ASC) ,
  UNIQUE INDEX `Student_Class_Student_Class_ID_UNIQUE` (`Student_Class_ID` ASC) ,
  PRIMARY KEY (`SMP_Student_Courses_Taken_ID`) ,
  CONSTRAINT `fk_SMP_Student_Courses_Taken_Student_Class1`
    FOREIGN KEY (`Student_Class_ID` )
    REFERENCES `crisp`.`Student_Class` (`Student_Class_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SMP_Student_Courses_Taken_SMP_Student1`
    FOREIGN KEY (`Tracker_ID` )
    REFERENCES `crisp`.`SMP_Student` (`Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Student_Tracker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Student_Tracker` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Student_Tracker` (
  `Student_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,
  `Tracker_ID` INT NOT NULL ,
  `Student_ID` INT NOT NULL ,
  PRIMARY KEY (`Student_Tracker_ID`) ,
  INDEX `fk_Student_Tracker_Tracker1` (`Tracker_ID` ASC) ,
  INDEX `fk_Student_Tracker_Student1` (`Student_ID` ASC) ,
  UNIQUE INDEX `Student_Tracker_ID_UNIQUE` (`Student_Tracker_ID` ASC) ,
  CONSTRAINT `fk_Student_Tracker_Tracker1`
    FOREIGN KEY (`Tracker_ID` )
    REFERENCES `crisp`.`Tracker` (`Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_Tracker_Student1`
    FOREIGN KEY (`Student_ID` )
    REFERENCES `crisp`.`Student` (`Student_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Teacher_T3_Tracker`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Teacher_T3_Tracker` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_T3_Tracker` (
  `Teacher_T3_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,
  `T3_Tracker_ID` INT NOT NULL ,
  `Teacher_ID` INT NOT NULL ,
  PRIMARY KEY (`Teacher_T3_Tracker_ID`) ,
  INDEX `fk_Teacher_T3_Tracker_T3_Tracker1` (`T3_Tracker_ID` ASC) ,
  INDEX `fk_Teacher_T3_Tracker_Teacher1` (`Teacher_ID` ASC) ,
  UNIQUE INDEX `Teacher_T3_Tracker_ID_UNIQUE` (`Teacher_T3_Tracker_ID` ASC) ,
  CONSTRAINT `fk_Teacher_T3_Tracker_T3_Tracker1`
    FOREIGN KEY (`T3_Tracker_ID` )
    REFERENCES `crisp`.`T3_Tracker` (`T3_Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Teacher_T3_Tracker_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Master Trainer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Master Trainer` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Master Trainer` (
  `Master_Trainer_ID` INT NOT NULL AUTO_INCREMENT ,
  `Last_Name` VARCHAR(45) NOT NULL ,
  `First_Name` VARCHAR(45) NOT NULL ,
  `Middle_Initial` VARCHAR(3) NOT NULL ,
  `Name_Suffix` VARCHAR(4) NULL ,
  `Company_Name` VARCHAR(100) NOT NULL ,
  `Company_Address` TEXT NOT NULL ,
  `Position` VARCHAR(45) NOT NULL ,
  `Email` VARCHAR(45) NOT NULL ,
  `Facebook` VARCHAR(45) NULL ,
  `Landline` VARCHAR(9) NOT NULL ,
  `Mobile_Number` VARCHAR(13) NOT NULL ,
  `Gender` CHAR NOT NULL ,
  `Civil_Status` VARCHAR(9) NOT NULL DEFAULT 'Single' ,
  PRIMARY KEY (`Master_Trainer_ID`) ,
  UNIQUE INDEX `Master_Trainer_ID_UNIQUE` (`Master_Trainer_ID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Proctor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Proctor` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Proctor` (
  `Proctor_ID` INT NOT NULL AUTO_INCREMENT ,
  `First_Name` VARCHAR(45) NOT NULL ,
  `Middle_Initial` VARCHAR(5) NOT NULL ,
  `Last_Name` VARCHAR(45) NOT NULL ,
  `Name_Suffix` VARCHAR(4) NULL ,
  `Company_Name` VARCHAR(45) NOT NULL ,
  `Company_Address` VARCHAR(255) NOT NULL ,
  `Position` VARCHAR(45) NOT NULL ,
  `Email` VARCHAR(45) NOT NULL ,
  `Facebook` VARCHAR(45) NULL ,
  `Landline` VARCHAR(9) NOT NULL ,
  `Mobile_Number` VARCHAR(13) NOT NULL ,
  `Gender` CHAR NOT NULL ,
  `Civil_Status` VARCHAR(9) NOT NULL DEFAULT 'Single' ,
  PRIMARY KEY (`Proctor_ID`) ,
  UNIQUE INDEX `Proctor_ID_UNIQUE` (`Proctor_ID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Log`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Log` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Log` (
  `Log_ID` INT NOT NULL AUTO_INCREMENT ,
  `Made_By` VARCHAR(100) NOT NULL ,
  `Changes` TEXT NOT NULL ,
  `Created_At` DATETIME NOT NULL ,
  PRIMARY KEY (`Log_ID`) ,
  UNIQUE INDEX `Log_ID_UNIQUE` (`Log_ID` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`GCAT_Class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`GCAT_Class` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`GCAT_Class` (
  `Class_ID` INT NOT NULL AUTO_INCREMENT ,
  `Proctor_ID` INT NOT NULL ,
  PRIMARY KEY (`Class_ID`) ,
  INDEX `fk_GCAT_Class_Proctor1_idx` (`Proctor_ID` ASC) ,
  INDEX `fk_GCAT_Class_Class1_idx` (`Class_ID` ASC) ,
  UNIQUE INDEX `Class_ID_UNIQUE` (`Class_ID` ASC) ,
  CONSTRAINT `fk_GCAT_Class_Proctor1`
    FOREIGN KEY (`Proctor_ID` )
    REFERENCES `crisp`.`Proctor` (`Proctor_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_GCAT_Class_Class1`
    FOREIGN KEY (`Class_ID` )
    REFERENCES `crisp`.`Class` (`Class_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Other_Class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Other_Class` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Other_Class` (
  `Class_ID` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(45) NOT NULL ,
  `Teacher_ID` INT NOT NULL ,
  PRIMARY KEY (`Class_ID`) ,
  INDEX `fk_Other_Class_Class1_idx` (`Class_ID` ASC) ,
  INDEX `fk_Other_Class_Teacher1_idx` (`Teacher_ID` ASC) ,
  UNIQUE INDEX `Class_ID_UNIQUE` (`Class_ID` ASC) ,
  CONSTRAINT `fk_Other_Class_Class1`
    FOREIGN KEY (`Class_ID` )
    REFERENCES `crisp`.`Class` (`Class_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Other_Class_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`T3_Class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`T3_Class` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`T3_Class` (
  `T3_Class_ID` INT NOT NULL AUTO_INCREMENT ,
  `School_Year` VARCHAR(10) NOT NULL ,
  `Duration` VARCHAR(10) NOT NULL ,
  `School_ID` INT NOT NULL ,
  `Subject_ID` INT NOT NULL ,
  PRIMARY KEY (`T3_Class_ID`) ,
  INDEX `fk_Section_School2` (`School_ID` ASC) ,
  INDEX `fk_Class_Subject1_idx` (`Subject_ID` ASC) ,
  UNIQUE INDEX `T3_Class_ID_UNIQUE` (`T3_Class_ID` ASC) ,
  CONSTRAINT `fk_Section_School20`
    FOREIGN KEY (`School_ID` )
    REFERENCES `crisp`.`School` (`School_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Class_Subject10`
    FOREIGN KEY (`Subject_ID` )
    REFERENCES `crisp`.`Subject` (`Subject_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`GCAT_T3_Class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`GCAT_T3_Class` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`GCAT_T3_Class` (
  `T3_Class_ID` INT NOT NULL AUTO_INCREMENT ,
  `Proctor_ID` INT NOT NULL ,
  PRIMARY KEY (`T3_Class_ID`) ,
  INDEX `fk_GCAT_Class_Class1_idx` (`T3_Class_ID` ASC) ,
  INDEX `fk_GCAT_Class_copy1_Proctor1_idx` (`Proctor_ID` ASC) ,
  UNIQUE INDEX `T3_Class_ID_UNIQUE` (`T3_Class_ID` ASC) ,
  CONSTRAINT `fk_GCAT_Class_Class10`
    FOREIGN KEY (`T3_Class_ID` )
    REFERENCES `crisp`.`T3_Class` (`T3_Class_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_GCAT_Class_copy1_Proctor1`
    FOREIGN KEY (`Proctor_ID` )
    REFERENCES `crisp`.`Proctor` (`Proctor_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Other_T3_Class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Other_T3_Class` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Other_T3_Class` (
  `T3_Class_ID` INT NOT NULL AUTO_INCREMENT ,
  `Name` VARCHAR(45) NOT NULL ,
  `Master_Trainer_ID` INT NOT NULL ,
  PRIMARY KEY (`T3_Class_ID`) ,
  INDEX `fk_Other_Class_Class1_idx` (`T3_Class_ID` ASC) ,
  INDEX `fk_Other_T3_Class_Master Trainer1_idx` (`Master_Trainer_ID` ASC) ,
  UNIQUE INDEX `T3_Class_ID_UNIQUE` (`T3_Class_ID` ASC) ,
  CONSTRAINT `fk_Other_Class_Class10`
    FOREIGN KEY (`T3_Class_ID` )
    REFERENCES `crisp`.`T3_Class` (`T3_Class_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Other_T3_Class_Master Trainer1`
    FOREIGN KEY (`Master_Trainer_ID` )
    REFERENCES `crisp`.`Master Trainer` (`Master_Trainer_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Teacher_Class`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Teacher_Class` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Class` (
  `Teacher_Class_ID` INT NOT NULL AUTO_INCREMENT ,
  `T3_Class_ID` INT NOT NULL ,
  `Teacher_ID` INT NOT NULL ,
  PRIMARY KEY (`Teacher_Class_ID`) ,
  INDEX `fk_Student_Class_Class1` (`T3_Class_ID` ASC) ,
  INDEX `fk_Teacher_Class_Teacher1_idx` (`Teacher_ID` ASC) ,
  UNIQUE INDEX `Teacher_Class_ID_UNIQUE` (`Teacher_Class_ID` ASC) ,
  CONSTRAINT `fk_Student_Class_Class10`
    FOREIGN KEY (`T3_Class_ID` )
    REFERENCES `crisp`.`T3_Class` (`T3_Class_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Teacher_Class_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Teacher_T3_Application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Teacher_T3_Application` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_T3_Application` (
  `Teacher_T3_Application_ID` INT NOT NULL AUTO_INCREMENT ,
  `Teacher_ID` INT NOT NULL ,
  `T3_Application_ID` INT NOT NULL ,
  INDEX `fk_Teacher_T3_Application_Teacher1_idx` (`Teacher_ID` ASC) ,
  INDEX `fk_Teacher_T3_Application_T3_Application1_idx` (`T3_Application_ID` ASC) ,
  PRIMARY KEY (`Teacher_T3_Application_ID`) ,
  UNIQUE INDEX `Teacher_ID_UNIQUE` (`Teacher_ID` ASC) ,
  CONSTRAINT `fk_Teacher_T3_Application_Teacher1`
    FOREIGN KEY (`Teacher_ID` )
    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Teacher_T3_Application_T3_Application1`
    FOREIGN KEY (`T3_Application_ID` )
    REFERENCES `crisp`.`T3_Application` (`T3_Application_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`users` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  `type` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

#USE `crisp` ;

-- -----------------------------------------------------
-- Placeholder table for view `crisp`.`view1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `crisp`.`view1` (`id` INT);

-- -----------------------------------------------------
-- View `crisp`.`view1`
-- -----------------------------------------------------
DROP VIEW IF EXISTS `crisp`.`view1` ;
DROP TABLE IF EXISTS `crisp`.`view1`;
USE `crisp`;
;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `crisp`.`School`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (1, 'Polytechnic University of the Philippines', 'Quezon City', '4101111', 'pup@gmail.com', 'Raymond Cruz', '09151234567', '2012-12-09 00:32:22', '2012-12-12 00:32:22', '123456', 'Manila');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (2, 'Ateneo de Manila University', 'Quezon City', '4102222', 'ateneo@gmail.com', 'Michelle Armario', '09129876789', '2012-12-10 00:32:22', '2012-12-12 00:32:22', '431243', 'Quezon City');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (3, 'De La Salle', 'Manila City', '3212222', 'lasalle@gmail.com', 'Michael Tan', '09182341234', '2011-12-11 00:32:22', '2011-10-31 00:32:22', '23412', 'Manila');
INSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (NULL, 'CSA', 'Makati', '3232123', 'csa@yahoo.com', 'Joan Joner', '09182483211', '2011-12-12', '2012-10-11', 'SSD121', 'Makati');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Teacher`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`) VALUES (1, '8', 'Samar', 'Quezon City', 'Metro Manila', '5', 'Basco, Batanes', 'rj@gmail.com', NULL, 'Single', '1994-12-10 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;\nSET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;\nSET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE=\'TRADITIONAL,ALLOW_INVALID_DATES\';\n\nCREATE SCHEMA IF NOT EXISTS `crisp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;\nUSE `crisp` ;\n\n-- -----------------------------------------------------\n-- Table `crisp`.`School`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`School` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`School` (\n  `School_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Name` VARCHAR(100) NOT NULL ,\n  `Address` TEXT NOT NULL ,\n  `Landline` VARCHAR(9) NOT NULL ,\n  `Email` VARCHAR(45) NOT NULL ,\n  `Point Person` VARCHAR(45) NOT NULL ,\n  `Point_Person_Contact` VARCHAR(13) NOT NULL ,\n  `Updated_At` DATETIME NULL ,\n  `Created_At` DATETIME NOT NULL ,\n  `Code` VARCHAR(10) NOT NULL ,\n  `Branch` VARCHAR(45) NOT NULL ,\n  PRIMARY KEY (`School_ID`) ,\n  UNIQUE INDEX `School_ID_UNIQUE` (`School_ID` ASC) ,\n  UNIQUE INDEX `Code_UNIQUE` (`Code` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Teacher`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Teacher` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Teacher` (\n  `Teacher_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Street_Number` VARCHAR(5) NOT NULL ,\n  `Street_Name` VARCHAR(45) NOT NULL ,\n  `City` VARCHAR(45) NOT NULL ,\n  `Province` VARCHAR(45) NOT NULL ,\n  `Region` VARCHAR(45) NOT NULL ,\n  `Alternate_Address` TEXT NULL ,\n  `Email` VARCHAR(45) NOT NULL ,\n  `Facebook` VARCHAR(45) NULL ,\n  `Civil_Status` VARCHAR(9) NOT NULL DEFAULT \'Single\' ,\n  `Birthdate` DATETIME NOT NULL ,\n  `Birthplace` VARCHAR(45) NOT NULL DEFAULT \'Philippines\' ,\n  `Gender` CHAR NOT NULL ,\n  `Nationality` VARCHAR(45) NOT NULL DEFAULT \'Filipino\' ,\n  `School_ID` INT NOT NULL ,\n  `Current_Position` VARCHAR(45) NOT NULL ,\n  `Employment_Status` VARCHAR(4) NOT NULL ,\n  `Name_of_Supervisor` VARCHAR(45) NOT NULL ,\n  `Supervisor_Contact_Details` VARCHAR(11) NOT NULL ,\n  `Created_At` DATETIME NOT NULL ,\n  `Updated_At` DATETIME NULL ,\n  `Resume?` TINYINT(1) NOT NULL ,\n  `Photo?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Proof_of_Certification?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Diploma/TOR` TINYINT(1) NOT NULL DEFAULT False ,\n  `Desktop?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Laptop?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Internet?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Total_Year_of_Teaching` INT(11) NOT NULL ,\n  `Code` VARCHAR(45) NOT NULL ,\n  `First_Name` VARCHAR(45) NOT NULL ,\n  `Mobile_Number` VARCHAR(13) NOT NULL ,\n  `Name_Suffix` VARCHAR(5) NULL ,\n  `Middle_Initial` CHAR NOT NULL ,\n  `Last_Name` VARCHAR(45) NOT NULL ,\n  `Landline` VARCHAR(9) NOT NULL ,\n  PRIMARY KEY (`Teacher_ID`) ,\n  INDEX `fk_Teacher_School1_idx` (`School_ID` ASC) ,\n  UNIQUE INDEX `Teacher_ID_UNIQUE` (`Teacher_ID` ASC) ,\n  CONSTRAINT `fk_Teacher_School1`\n    FOREIGN KEY (`School_ID` )\n    REFERENCES `crisp`.`School` (`School_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Teacher_Training_Experience`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Teacher_Training_Experience` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Training_Experience` (\n  `Teacher_ID` INT NOT NULL ,\n  `Institution` VARCHAR(250) NOT NULL ,\n  `Position` VARCHAR(45) NOT NULL ,\n  `Date` DATETIME NOT NULL ,\n  `Level_Taught` VARCHAR(250) NOT NULL ,\n  `Courses_Taught` TEXT NOT NULL ,\n  `Number_of_Years_in_Institution` INT NOT NULL ,\n  `Teacher_Training_Experience_ID` INT NOT NULL AUTO_INCREMENT ,\n  INDEX `fk_Teacher_Training_Experience_Teacher_idx` (`Teacher_ID` ASC) ,\n  PRIMARY KEY (`Teacher_Training_Experience_ID`) ,\n  UNIQUE INDEX `Teacher_Training_Experience_ID_UNIQUE` (`Teacher_Training_Experience_ID` ASC) ,\n  CONSTRAINT `fk_Teacher_Training_Experience_Teacher`\n    FOREIGN KEY (`Teacher_ID` )\n    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Teacher_Certification`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Teacher_Certification` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Certification` (\n  `Teacher_Certification_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Certification` VARCHAR(45) NOT NULL ,\n  `Certifying_Body` VARCHAR(250) NOT NULL ,\n  `Date_Received` DATETIME NOT NULL ,\n  `Teacher_ID` INT NOT NULL ,\n  PRIMARY KEY (`Teacher_Certification_ID`) ,\n  INDEX `fk_Teacher_Certification_Teacher1_idx` (`Teacher_ID` ASC) ,\n  UNIQUE INDEX `Teacher_Certification_ID_UNIQUE` (`Teacher_Certification_ID` ASC) ,\n  CONSTRAINT `fk_Teacher_Certification_Teacher1`\n    FOREIGN KEY (`Teacher_ID` )\n    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Teacher_Awards`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Teacher_Awards` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Awards` (\n  `Teacher_Awards_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Award` VARCHAR(45) NOT NULL ,\n  `Awarding_Body` VARCHAR(45) NOT NULL ,\n  `Date_Received` DATE NOT NULL ,\n  `Teacher_ID` INT NOT NULL ,\n  PRIMARY KEY (`Teacher_Awards_ID`) ,\n  INDEX `fk_Teacher_Awards_Teacher1_idx` (`Teacher_ID` ASC) ,\n  UNIQUE INDEX `Teacher_Awards_ID_UNIQUE` (`Teacher_Awards_ID` ASC) ,\n  CONSTRAINT `fk_Teacher_Awards_Teacher1`\n    FOREIGN KEY (`Teacher_ID` )\n    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Teacher_Relevant_Experiences`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Teacher_Relevant_Experiences` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Relevant_Experiences` (\n  `Teacher_Relevant_Experiences_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Organization` VARCHAR(250) NOT NULL ,\n  `Position` VARCHAR(45) NOT NULL ,\n  `Description` VARCHAR(250) NULL ,\n  `Date` DATE NOT NULL ,\n  `Teacher_ID` INT NOT NULL ,\n  PRIMARY KEY (`Teacher_Relevant_Experiences_ID`) ,\n  INDEX `fk_Teacher_Relevant_Experiences_Teacher1_idx` (`Teacher_ID` ASC) ,\n  CONSTRAINT `fk_Teacher_Relevant_Experiences_Teacher1`\n    FOREIGN KEY (`Teacher_ID` )\n    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Computer_Skills`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Computer_Skills` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Computer_Skills` (\n  `Computer_Skills_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Name` VARCHAR(100) NOT NULL ,\n  PRIMARY KEY (`Computer_Skills_ID`) ,\n  UNIQUE INDEX `Computer_Skills_ID_UNIQUE` (`Computer_Skills_ID` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Teacher_Computer_Profiency`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Teacher_Computer_Profiency` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Computer_Profiency` (\n  `Teacher_Computer_Profiency_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Skills_ID` INT NOT NULL ,\n  `Teacher_ID` INT NOT NULL ,\n  PRIMARY KEY (`Teacher_Computer_Profiency_ID`) ,\n  INDEX `fk_Teacher_Computer_Profiency_Skills1_idx` (`Skills_ID` ASC) ,\n  INDEX `fk_Teacher_Computer_Profiency_Teacher1_idx` (`Teacher_ID` ASC) ,\n  UNIQUE INDEX `Teacher_Computer_Profiency_ID_UNIQUE` (`Teacher_Computer_Profiency_ID` ASC) ,\n  CONSTRAINT `fk_Teacher_Computer_Profiency_Skills1`\n    FOREIGN KEY (`Skills_ID` )\n    REFERENCES `crisp`.`Computer_Skills` (`Computer_Skills_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Teacher_Computer_Profiency_Teacher1`\n    FOREIGN KEY (`Teacher_ID` )\n    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Teacher_Computer_Familiarity`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Teacher_Computer_Familiarity` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Computer_Familiarity` (\n  `Teacher_Computer_Familiarity_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Teacher_ID` INT NOT NULL ,\n  `Skills_ID` INT NOT NULL ,\n  PRIMARY KEY (`Teacher_Computer_Familiarity_ID`) ,\n  INDEX `fk_Teacher_Computer_Familiarity_Teacher1_idx` (`Teacher_ID` ASC) ,\n  INDEX `fk_Teacher_Computer_Familiarity_Skills1_idx` (`Skills_ID` ASC) ,\n  UNIQUE INDEX `Teacher_Computer_Familiarity_ID_UNIQUE` (`Teacher_Computer_Familiarity_ID` ASC) ,\n  CONSTRAINT `fk_Teacher_Computer_Familiarity_Teacher1`\n    FOREIGN KEY (`Teacher_ID` )\n    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Teacher_Computer_Familiarity_Skills1`\n    FOREIGN KEY (`Skills_ID` )\n    REFERENCES `crisp`.`Computer_Skills` (`Computer_Skills_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Skills`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Skills` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Skills` (\n  `Skills_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Name` VARCHAR(100) NOT NULL ,\n  PRIMARY KEY (`Skills_ID`) ,\n  UNIQUE INDEX `Skills_ID_UNIQUE` (`Skills_ID` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Teacher_Other_Skills`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Teacher_Other_Skills` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Other_Skills` (\n  `Teacher_Other_Skills_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Skills_ID` INT NOT NULL ,\n  `Teacher_ID` INT NOT NULL ,\n  PRIMARY KEY (`Teacher_Other_Skills_ID`) ,\n  INDEX `fk_Teacher_Other_Skills_Skills1_idx` (`Skills_ID` ASC) ,\n  INDEX `fk_Teacher_Other_Skills_Teacher1_idx` (`Teacher_ID` ASC) ,\n  UNIQUE INDEX `Teacher_Other_Skills_ID_UNIQUE` (`Teacher_Other_Skills_ID` ASC) ,\n  CONSTRAINT `fk_Teacher_Other_Skills_Skills1`\n    FOREIGN KEY (`Skills_ID` )\n    REFERENCES `crisp`.`Skills` (`Skills_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Teacher_Other_Skills_Teacher1`\n    FOREIGN KEY (`Teacher_ID` )\n    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Teacher_Professional_Reference`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Teacher_Professional_Reference` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Professional_Reference` (\n  `Email` VARCHAR(45) NOT NULL ,\n  `Teacher_Professional_Reference_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Name` VARCHAR(45) NOT NULL ,\n  `Position` VARCHAR(45) NULL ,\n  `Company` VARCHAR(45) NOT NULL ,\n  `Phone` VARCHAR(11) NOT NULL ,\n  `Teacher_ID` INT NOT NULL ,\n  PRIMARY KEY (`Teacher_Professional_Reference_ID`) ,\n  INDEX `fk_Teacher_Professional_Reference_Teacher1_idx` (`Teacher_ID` ASC) ,\n  CONSTRAINT `fk_Teacher_Professional_Reference_Teacher1`\n    FOREIGN KEY (`Teacher_ID` )\n    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Subject`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Subject` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Subject` (\n  `Subject_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Subject_Name` VARCHAR(45) NOT NULL ,\n  `Subject_Code` VARCHAR(8) NOT NULL ,\n  PRIMARY KEY (`Subject_ID`) ,\n  UNIQUE INDEX `Subject_ID_UNIQUE` (`Subject_ID` ASC) ,\n  UNIQUE INDEX `Subject_Code_UNIQUE` (`Subject_Code` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`T3_Application`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`T3_Application` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`T3_Application` (\n  `T3_Application_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Date` VARCHAR(45) NOT NULL ,\n  `Created_At` DATETIME NOT NULL ,\n  `Updated_At` VARCHAR(45) NULL ,\n  `Subject_ID` INT NOT NULL ,\n  PRIMARY KEY (`T3_Application_ID`) ,\n  INDEX `fk_Teacher_Application_Subject1` (`Subject_ID` ASC) ,\n  UNIQUE INDEX `T3_Application_ID_UNIQUE` (`T3_Application_ID` ASC) ,\n  CONSTRAINT `fk_Teacher_Application_Subject1`\n    FOREIGN KEY (`Subject_ID` )\n    REFERENCES `crisp`.`Subject` (`Subject_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`SMP_T3_Application`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`SMP_T3_Application` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`SMP_T3_Application` (\n  `Answer_1` TEXT NULL ,\n  `Answer_2` TEXT NULL ,\n  `Answer_3` TEXT NULL ,\n  `Total_Numbers_Of_Subjects_Handled` INT NOT NULL ,\n  `Years_Teaching` INT NOT NULL ,\n  `Years_Teaching_In_Current_Institution` INT NOT NULL ,\n  `Avg_Student_Per_Class` INT NOT NULL ,\n  `Support_Offices_Available` TEXT NULL ,\n  `Instructional_Materials_Support` TEXT NULL ,\n  `Technology_Support` TEXT NULL ,\n  `Readily_Use_Lab?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Internet_Services?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Self_Assessment_Form_Business_Communication` TINYINT(1) NOT NULL DEFAULT False ,\n  `Self_Assessment_Form_Service_Culture` TINYINT(1) NOT NULL DEFAULT False ,\n  `Contract?` TINYINT(1) NOT NULL DEFAULT False ,\n  `T3_Application_ID` INT NOT NULL AUTO_INCREMENT ,\n  PRIMARY KEY (`T3_Application_ID`) ,\n  INDEX `fk_SMP_T3_Application_Teacher_Application1` (`T3_Application_ID` ASC) ,\n  UNIQUE INDEX `T3_Application_ID_UNIQUE` (`T3_Application_ID` ASC) ,\n  CONSTRAINT `fk_SMP_T3_Application_Teacher_Application1`\n    FOREIGN KEY (`T3_Application_ID` )\n    REFERENCES `crisp`.`T3_Application` (`T3_Application_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Related_Trainings_Attended`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Related_Trainings_Attended` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Related_Trainings_Attended` (\n  `Related_Trainings_Attended_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Training` VARCHAR(45) NOT NULL ,\n  `Training_Body` VARCHAR(250) NOT NULL ,\n  `Training_Date` DATETIME NOT NULL ,\n  PRIMARY KEY (`Related_Trainings_Attended_ID`) ,\n  UNIQUE INDEX `Related_Trainings_Attended_ID_UNIQUE` (`Related_Trainings_Attended_ID` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Stipend_Tracking`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Stipend_Tracking` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Stipend_Tracking` (\n  `Stipend_Tracking_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Amount` DOUBLE NOT NULL DEFAULT 0.00 ,\n  `Claimed?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Created_At` DATETIME NOT NULL ,\n  `Updated_At` DATETIME NULL ,\n  `Teacher_ID` INT NOT NULL ,\n  PRIMARY KEY (`Stipend_Tracking_ID`) ,\n  INDEX `fk_Stipend_Tracking_Teacher1_idx` (`Teacher_ID` ASC) ,\n  CONSTRAINT `fk_Stipend_Tracking_Teacher1`\n    FOREIGN KEY (`Teacher_ID` )\n    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Stipend_Tracking_List`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Stipend_Tracking_List` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Stipend_Tracking_List` (\n  `Stipend_Tracking_List_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Date` VARCHAR(45) NOT NULL ,\n  `Checked_By` VARCHAR(100) NOT NULL ,\n  `Stipend_Tracking_ID` INT NOT NULL ,\n  `Subject_ID` INT NOT NULL ,\n  PRIMARY KEY (`Stipend_Tracking_List_ID`) ,\n  INDEX `fk_Stipend_Tracking_List_Stipend_Tracking1_idx` (`Stipend_Tracking_ID` ASC) ,\n  INDEX `fk_Stipend_Tracking_List_Subject_ID1_idx` (`Subject_ID` ASC) ,\n  CONSTRAINT `fk_Stipend_Tracking_List_Stipend_Tracking1`\n    FOREIGN KEY (`Stipend_Tracking_ID` )\n    REFERENCES `crisp`.`Stipend_Tracking` (`Stipend_Tracking_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Stipend_Tracking_List_Subject_ID1`\n    FOREIGN KEY (`Subject_ID` )\n    REFERENCES `crisp`.`Subject` (`Subject_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`SMP_T3_Attendance`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`SMP_T3_Attendance` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`SMP_T3_Attendance` (\n  `SMP_T3_Attendance_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Time_In?` TINYINT(1) NOT NULL DEFAULT False ,\n  `AM_Snack?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Lunch?` TINYINT(1) NOT NULL DEFAULT False ,\n  `PM_Snack?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Time_Out?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Date` DATETIME NOT NULL ,\n  `Created_At` DATETIME NOT NULL ,\n  `Updated_At` DATETIME NULL ,\n  PRIMARY KEY (`SMP_T3_Attendance_ID`) ,\n  UNIQUE INDEX `SMP_T3_Attendance_ID_UNIQUE` (`SMP_T3_Attendance_ID` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`SMP_T3_Site_Visit`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`SMP_T3_Site_Visit` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`SMP_T3_Site_Visit` (\n  `SMP_T3_Site_Visit_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Training_Location` VARCHAR(45) NOT NULL ,\n  `Company_Host` VARCHAR(45) NOT NULL ,\n  `Event_Date` DATETIME NOT NULL ,\n  `Feedback_Form?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Created_At` DATETIME NOT NULL ,\n  `Updated_At` DATETIME NULL ,\n  PRIMARY KEY (`SMP_T3_Site_Visit_ID`) ,\n  UNIQUE INDEX `SMP_T3_Site_Visit_ID_UNIQUE` (`SMP_T3_Site_Visit_ID` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Status`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Status` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Status` (\n  `Status_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Name` VARCHAR(20) NOT NULL ,\n  PRIMARY KEY (`Status_ID`) ,\n  UNIQUE INDEX `Status_ID_UNIQUE` (`Status_ID` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`T3_Tracker`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`T3_Tracker` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`T3_Tracker` (\n  `T3_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Status_ID` INT NOT NULL ,\n  `Created_At` DATETIME NOT NULL ,\n  `Updated_At` DATETIME NULL ,\n  `Contract?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Remarks` VARCHAR(250) NULL ,\n  `Subject_ID` INT NOT NULL ,\n  PRIMARY KEY (`T3_Tracker_ID`) ,\n  INDEX `fk_Teacher_Tracker_Status1` (`Status_ID` ASC) ,\n  INDEX `fk_Teacher_Tracker_Subject1` (`Subject_ID` ASC) ,\n  UNIQUE INDEX `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID` ASC) ,\n  CONSTRAINT `fk_Teacher_Tracker_Status1`\n    FOREIGN KEY (`Status_ID` )\n    REFERENCES `crisp`.`Status` (`Status_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Teacher_Tracker_Subject1`\n    FOREIGN KEY (`Subject_ID` )\n    REFERENCES `crisp`.`Subject` (`Subject_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`SMP_T3_Tracker`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`SMP_T3_Tracker` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`SMP_T3_Tracker` (\n  `SMP_T3_Site_Visit_ID` INT NOT NULL ,\n  `T3_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,\n  PRIMARY KEY (`T3_Tracker_ID`) ,\n  INDEX `fk_SMP_T3_Tracker_SMP_T3_Site_Visit1` (`SMP_T3_Site_Visit_ID` ASC) ,\n  INDEX `fk_SMP_T3_Tracker_T3_Tracker1_idx` (`T3_Tracker_ID` ASC) ,\n  UNIQUE INDEX `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID` ASC) ,\n  CONSTRAINT `fk_SMP_T3_Tracker_SMP_T3_Site_Visit1`\n    FOREIGN KEY (`SMP_T3_Site_Visit_ID` )\n    REFERENCES `crisp`.`SMP_T3_Site_Visit` (`SMP_T3_Site_Visit_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_SMP_T3_Tracker_T3_Tracker1`\n    FOREIGN KEY (`T3_Tracker_ID` )\n    REFERENCES `crisp`.`T3_Tracker` (`T3_Tracker_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`SMP_T3_Attendance_Tracking`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`SMP_T3_Attendance_Tracking` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`SMP_T3_Attendance_Tracking` (\n  `SMP_T3_Attendance_Tracking_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Event` VARCHAR(100) NOT NULL ,\n  `SMP_T3_Attendance_ID` INT NOT NULL ,\n  `SMP_T3_Tracker_ID` INT NOT NULL ,\n  PRIMARY KEY (`SMP_T3_Attendance_Tracking_ID`) ,\n  INDEX `fk_SMP_T3_Attendance_Tracking_SMP_T3_Attendance1_idx` (`SMP_T3_Attendance_ID` ASC) ,\n  INDEX `fk_SMP_T3_Attendance_Tracking_SMP_T3_Tracker1` (`SMP_T3_Tracker_ID` ASC) ,\n  UNIQUE INDEX `SMP_T3_Attendance_Tracking_ID_UNIQUE` (`SMP_T3_Attendance_Tracking_ID` ASC) ,\n  CONSTRAINT `fk_SMP_T3_Attendance_Tracking_SMP_T3_Attendance1`\n    FOREIGN KEY (`SMP_T3_Attendance_ID` )\n    REFERENCES `crisp`.`SMP_T3_Attendance` (`SMP_T3_Attendance_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_SMP_T3_Attendance_Tracking_SMP_T3_Tracker1`\n    FOREIGN KEY (`SMP_T3_Tracker_ID` )\n    REFERENCES `crisp`.`SMP_T3_Tracker` (`T3_Tracker_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Best_Adept_T3_Application`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Best_Adept_T3_Application` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Best_Adept_T3_Application` (\n  `Answer_1` TEXT NULL ,\n  `Answer_2` TEXT NULL ,\n  `Answer_3` TEXT NULL ,\n  `Contract?` TINYINT(1) NOT NULL DEFAULT False ,\n  `T3_Application_ID` INT NOT NULL AUTO_INCREMENT ,\n  PRIMARY KEY (`T3_Application_ID`) ,\n  INDEX `fk_Best_Adept_T3_Application_Teacher_Application1` (`T3_Application_ID` ASC) ,\n  UNIQUE INDEX `T3_Application_ID_UNIQUE` (`T3_Application_ID` ASC) ,\n  CONSTRAINT `fk_Best_Adept_T3_Application_Teacher_Application1`\n    FOREIGN KEY (`T3_Application_ID` )\n    REFERENCES `crisp`.`T3_Application` (`T3_Application_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Best_T3_Attendance`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Best_T3_Attendance` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Best_T3_Attendance` (\n  `Best_T3_Attendance_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Orientation_Day` DATETIME NULL ,\n  `Site_Visit` DATETIME NULL ,\n  `Day_1` DATETIME NULL ,\n  `Day_2` DATETIME NULL ,\n  `Day_3` DATETIME NULL ,\n  `Created_At` DATETIME NOT NULL ,\n  `Updated_At` DATETIME NULL ,\n  PRIMARY KEY (`Best_T3_Attendance_ID`) ,\n  UNIQUE INDEX `Best_T3_Attendance_ID_UNIQUE` (`Best_T3_Attendance_ID` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Adept_T3_Attendance`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Adept_T3_Attendance` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Adept_T3_Attendance` (\n  `Adept_T3_Attendance_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Orientation_Day` DATETIME NULL ,\n  `Site_Visit` DATETIME NULL ,\n  `Day_1` DATETIME NULL ,\n  `Day_2` DATETIME NULL ,\n  `Day_3` DATETIME NULL ,\n  `Day_4` DATETIME NULL ,\n  `Day_5` DATETIME NULL ,\n  `Day_6` DATETIME NULL ,\n  `GCAT` DATETIME NULL ,\n  `Created_At` DATETIME NOT NULL ,\n  `Updated_At` DATETIME NULL ,\n  PRIMARY KEY (`Adept_T3_Attendance_ID`) ,\n  UNIQUE INDEX `Adept_T3_Attendance_ID_UNIQUE` (`Adept_T3_Attendance_ID` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Best_T3_Grades`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Best_T3_Grades` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Best_T3_Grades` (\n  `Best_T3_Grades_ID` INT NOT NULL AUTO_INCREMENT ,\n  PRIMARY KEY (`Best_T3_Grades_ID`) ,\n  UNIQUE INDEX `Best_T3_Grades_ID_UNIQUE` (`Best_T3_Grades_ID` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Best_T3_Tracker`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Best_T3_Tracker` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Best_T3_Tracker` (\n  `Interview_Form?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Site_Visit_Form?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Best_T3_Feedback?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Best_E-Learning_Feedback` TINYINT(1) NOT NULL DEFAULT False ,\n  `Best_CD` TINYINT(1) NOT NULL DEFAULT False ,\n  `Certificate_Of_Attendance` TINYINT(1) NOT NULL DEFAULT False ,\n  `Best_Certified_Trainers` TINYINT(1) NOT NULL DEFAULT False ,\n  `Task_1` DOUBLE NULL DEFAULT 0.00 ,\n  `Task_2` DOUBLE NULL DEFAULT 0.00 ,\n  `Task_3` DOUBLE NULL DEFAULT 0.00 ,\n  `Task_4` DOUBLE NULL DEFAULT 0.00 ,\n  `Best_T3_Attendance_ID` INT NOT NULL ,\n  `Best_T3_Grades_ID` INT NOT NULL ,\n  `Control_Number` VARCHAR(5) NULL ,\n  `User_Name` VARCHAR(45) NULL ,\n  `T3_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,\n  PRIMARY KEY (`T3_Tracker_ID`) ,\n  INDEX `fk_Adept_T3_Tracker_Best_T3_Attendance1_idx` (`Best_T3_Attendance_ID` ASC) ,\n  INDEX `fk_Adept_T3_Tracker_Best_T3_Grades1_idx` (`Best_T3_Grades_ID` ASC) ,\n  INDEX `fk_Best_T3_Tracker_Teacher_Tracker1` (`T3_Tracker_ID` ASC) ,\n  UNIQUE INDEX `Control_Number_UNIQUE` (`Control_Number` ASC) ,\n  UNIQUE INDEX `User_Name_UNIQUE` (`User_Name` ASC) ,\n  UNIQUE INDEX `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID` ASC) ,\n  CONSTRAINT `fk_Adept_T3_Tracker_Best_T3_Attendance1`\n    FOREIGN KEY (`Best_T3_Attendance_ID` )\n    REFERENCES `crisp`.`Best_T3_Attendance` (`Best_T3_Attendance_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Adept_T3_Tracker_Best_T3_Grades1`\n    FOREIGN KEY (`Best_T3_Grades_ID` )\n    REFERENCES `crisp`.`Best_T3_Grades` (`Best_T3_Grades_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Best_T3_Tracker_Teacher_Tracker1`\n    FOREIGN KEY (`T3_Tracker_ID` )\n    REFERENCES `crisp`.`T3_Tracker` (`T3_Tracker_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Adept_T3_Grades`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Adept_T3_Grades` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Adept_T3_Grades` (\n  `Adept_T3_Grades_ID` INT NOT NULL AUTO_INCREMENT ,\n  PRIMARY KEY (`Adept_T3_Grades_ID`) ,\n  UNIQUE INDEX `Adept_T3_Grades_ID_UNIQUE` (`Adept_T3_Grades_ID` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Adept_T3_Tracker`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Adept_T3_Tracker` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Adept_T3_Tracker` (\n  `Interview_Form?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Site_Visit_Form?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Adept_T3_Feedback?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Adept_E-Learning_Feedback` TINYINT(1) NOT NULL DEFAULT False ,\n  `Manual_&_Kit` TINYINT(1) NOT NULL DEFAULT False ,\n  `Certificate_Of_Attendance` TINYINT(1) NOT NULL DEFAULT False ,\n  `Adept_Certified_Trainers` TINYINT(1) NOT NULL ,\n  `Lesson_Plan` DOUBLE NULL DEFAULT 0.00 ,\n  `Demo` DOUBLE NULL DEFAULT 0.00 ,\n  `Total_Weigthed` DOUBLE NULL DEFAULT 0.00 ,\n  `Training_Portfolio` DOUBLE NULL DEFAULT 0.00 ,\n  `Adept_T3_Grades_ID` INT NOT NULL ,\n  `Adept_T3_Attendance_ID` INT NOT NULL ,\n  `T3_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Control_Number` VARCHAR(5) NULL ,\n  `User_Name` VARCHAR(45) NULL ,\n  PRIMARY KEY (`T3_Tracker_ID`) ,\n  INDEX `fk_Adept_T3_Tracker_copy1_Adept_T3_Grades1_idx` (`Adept_T3_Grades_ID` ASC) ,\n  INDEX `fk_Adept_T3_Tracker_copy1_Adept_T3_Attendance1_idx` (`Adept_T3_Attendance_ID` ASC) ,\n  INDEX `fk_Adept_T3_Tracker_Teacher_Tracker1` (`T3_Tracker_ID` ASC) ,\n  UNIQUE INDEX `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID` ASC) ,\n  UNIQUE INDEX `Control_Number_UNIQUE` (`Control_Number` ASC) ,\n  UNIQUE INDEX `User_Name_UNIQUE` (`User_Name` ASC) ,\n  CONSTRAINT `fk_Adept_T3_Tracker_copy1_Adept_T3_Grades1`\n    FOREIGN KEY (`Adept_T3_Grades_ID` )\n    REFERENCES `crisp`.`Adept_T3_Grades` (`Adept_T3_Grades_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Adept_T3_Tracker_copy1_Adept_T3_Attendance1`\n    FOREIGN KEY (`Adept_T3_Attendance_ID` )\n    REFERENCES `crisp`.`Adept_T3_Attendance` (`Adept_T3_Attendance_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Adept_T3_Tracker_Teacher_Tracker1`\n    FOREIGN KEY (`T3_Tracker_ID` )\n    REFERENCES `crisp`.`T3_Tracker` (`T3_Tracker_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`GCAT_Tracker`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`GCAT_Tracker` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`GCAT_Tracker` (\n  `GCAT_Basic_Skills_Test_Overall_Score` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Total_Cognitive` INT NOT NULL DEFAULT 0 ,\n  `GCAT_English_Proficiency` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Computer_Literacy` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Perceptual_Speed_&_Accuracy` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Behavioral_Component_Overall_Score` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Communication` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Learning_Orientation` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Courtesy` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Empathy` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Reliability` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Responsiveness` INT NOT NULL DEFAULT 0 ,\n  `T3_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Session_ID` VARCHAR(45) NOT NULL ,\n  PRIMARY KEY (`T3_Tracker_ID`) ,\n  INDEX `fk_GCAT_T3_Tracker_Teacher_Tracker1` (`T3_Tracker_ID` ASC) ,\n  UNIQUE INDEX `Session_ID_UNIQUE` (`Session_ID` ASC) ,\n  UNIQUE INDEX `T3_Tracker_ID_UNIQUE` (`T3_Tracker_ID` ASC) ,\n  CONSTRAINT `fk_GCAT_T3_Tracker_Teacher_Tracker1`\n    FOREIGN KEY (`T3_Tracker_ID` )\n    REFERENCES `crisp`.`T3_Tracker` (`T3_Tracker_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Related_Trainings_Attended_By_A_Teacher`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Related_Trainings_Attended_By_A_Teacher` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Related_Trainings_Attended_By_A_Teacher` (\n  `Related_Trainings_Attended_By_A_Teacher` INT NOT NULL AUTO_INCREMENT ,\n  `Related_Trainings_Attended_ID` INT NOT NULL ,\n  `SMP_T3_Application_ID` INT NOT NULL ,\n  PRIMARY KEY (`Related_Trainings_Attended_By_A_Teacher`) ,\n  INDEX `fk_Related_Trainings_Attended_By_A_Teacher_Related_Training_idx` (`Related_Trainings_Attended_ID` ASC) ,\n  INDEX `fk_Related_Trainings_Attended_By_A_Teacher_SMP_T3_Applicati_idx` (`SMP_T3_Application_ID` ASC) ,\n  UNIQUE INDEX `Related_Trainings_Attended_By_A_Teacher_UNIQUE` (`Related_Trainings_Attended_By_A_Teacher` ASC) ,\n  CONSTRAINT `fk_Related_Trainings_Attended_By_A_Teacher_Related_Trainings_1`\n    FOREIGN KEY (`Related_Trainings_Attended_ID` )\n    REFERENCES `crisp`.`Related_Trainings_Attended` (`Related_Trainings_Attended_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Related_Trainings_Attended_By_A_Teacher_SMP_T3_Application1`\n    FOREIGN KEY (`SMP_T3_Application_ID` )\n    REFERENCES `crisp`.`SMP_T3_Application` (`T3_Application_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Student`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Student` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Student` (\n  `Student_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Last_Name` VARCHAR(45) NOT NULL ,\n  `First_Name` VARCHAR(45) NOT NULL ,\n  `Middle_Initial` VARCHAR(4) NOT NULL ,\n  `Name_Suffix` VARCHAR(5) NOT NULL ,\n  `Student_ID_Number` VARCHAR(10) NOT NULL ,\n  `Civil_Status` VARCHAR(9) NOT NULL DEFAULT \'Single\' ,\n  `Birthdate` DATETIME NOT NULL ,\n  `Birthplace` VARCHAR(45) NOT NULL DEFAULT \'Philippines\' ,\n  `Gender` CHAR NOT NULL ,\n  `Nationality` VARCHAR(45) NOT NULL DEFAULT \'Filipino\' ,\n  `Street_Number` VARCHAR(5) NOT NULL ,\n  `Street_Name` VARCHAR(45) NOT NULL ,\n  `City` VARCHAR(45) NOT NULL ,\n  `Province` VARCHAR(45) NOT NULL ,\n  `Region` VARCHAR(45) NOT NULL ,\n  `Alternate_Address` TEXT NULL ,\n  `Mobile_Number` VARCHAR(13) NOT NULL ,\n  `Landline` VARCHAR(9) NOT NULL ,\n  `Email` VARCHAR(45) NOT NULL ,\n  `Facebook` VARCHAR(45) NULL ,\n  `Course` VARCHAR(100) NOT NULL ,\n  `Year` INT NOT NULL ,\n  `School_ID` INT NOT NULL ,\n  `Expected_Year_of_Graduation` INT NOT NULL ,\n  `DOST_Scholar?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Scholar?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Interested_in_IT-BPO?` TEXT NULL ,\n  `Own_A_Compter?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Internet_Access?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Code` VARCHAR(15) NOT NULL ,\n  PRIMARY KEY (`Student_ID`) ,\n  INDEX `fk_Student_School1` (`School_ID` ASC) ,\n  UNIQUE INDEX `Student_ID_UNIQUE` (`Student_ID` ASC) ,\n  CONSTRAINT `fk_Student_School1`\n    FOREIGN KEY (`School_ID` )\n    REFERENCES `crisp`.`School` (`School_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Organization_Affiliations`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Organization_Affiliations` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Organization_Affiliations` (\n  `Organization_Affiliations_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Name` VARCHAR(255) NOT NULL ,\n  `Position` VARCHAR(45) NOT NULL ,\n  `Years_Affiliated` INT NOT NULL ,\n  `Description` VARCHAR(255) NULL ,\n  PRIMARY KEY (`Organization_Affiliations_ID`) ,\n  UNIQUE INDEX `Organization_Affiliations_ID_UNIQUE` (`Organization_Affiliations_ID` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Student_Organization_Affiliations`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Student_Organization_Affiliations` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Student_Organization_Affiliations` (\n  `Student_Organization_Affiliations_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Organization_Affiliations_ID` INT NOT NULL ,\n  `Student_ID` INT NOT NULL ,\n  PRIMARY KEY (`Student_Organization_Affiliations_ID`) ,\n  INDEX `fk_Student_Organization_Affiliations_Organization_Affiliati_idx` (`Organization_Affiliations_ID` ASC) ,\n  INDEX `fk_Student_Organization_Affiliations_Student1_idx` (`Student_ID` ASC) ,\n  UNIQUE INDEX `Student_Organization_Affiliations_ID_UNIQUE` (`Student_Organization_Affiliations_ID` ASC) ,\n  CONSTRAINT `fk_Student_Organization_Affiliations_Organization_Affiliations1`\n    FOREIGN KEY (`Organization_Affiliations_ID` )\n    REFERENCES `crisp`.`Organization_Affiliations` (`Organization_Affiliations_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Student_Organization_Affiliations_Student1`\n    FOREIGN KEY (`Student_ID` )\n    REFERENCES `crisp`.`Student` (`Student_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Student_Skills`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Student_Skills` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Student_Skills` (\n  `Student_Skills_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Student_ID` INT NOT NULL ,\n  `Skills_ID` INT NOT NULL ,\n  PRIMARY KEY (`Student_Skills_ID`) ,\n  INDEX `fk_Student_Skills_Student1_idx` (`Student_ID` ASC) ,\n  INDEX `fk_Student_Skills_Skills1_idx` (`Skills_ID` ASC) ,\n  UNIQUE INDEX `Student_Skills_ID_UNIQUE` (`Student_Skills_ID` ASC) ,\n  CONSTRAINT `fk_Student_Skills_Student1`\n    FOREIGN KEY (`Student_ID` )\n    REFERENCES `crisp`.`Student` (`Student_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Student_Skills_Skills1`\n    FOREIGN KEY (`Skills_ID` )\n    REFERENCES `crisp`.`Skills` (`Skills_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Student_Computer_Skills`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Student_Computer_Skills` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Student_Computer_Skills` (\n  `Student_Computer_Skills_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Student_ID` INT NOT NULL ,\n  `Computer_Skills_ID` INT NOT NULL ,\n  `Level_Of_Proficiency` VARCHAR(45) NULL ,\n  PRIMARY KEY (`Student_Computer_Skills_ID`) ,\n  INDEX `fk_Student_Computer_Skills_Student1_idx` (`Student_ID` ASC) ,\n  INDEX `fk_Student_Computer_Skills_Computer_Skills1_idx` (`Computer_Skills_ID` ASC) ,\n  UNIQUE INDEX `Student_Computer_Skills_ID_UNIQUE` (`Student_Computer_Skills_ID` ASC) ,\n  CONSTRAINT `fk_Student_Computer_Skills_Student1`\n    FOREIGN KEY (`Student_ID` )\n    REFERENCES `crisp`.`Student` (`Student_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Student_Computer_Skills_Computer_Skills1`\n    FOREIGN KEY (`Computer_Skills_ID` )\n    REFERENCES `crisp`.`Computer_Skills` (`Computer_Skills_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Project`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Project` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Project` (\n  `Project_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Name` VARCHAR(250) NOT NULL ,\n  `Institution` VARCHAR(250) NOT NULL ,\n  `Year_Implemented` INT NULL ,\n  PRIMARY KEY (`Project_ID`) ,\n  UNIQUE INDEX `Project_ID_UNIQUE` (`Project_ID` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Teacher_Subjects_Taken`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Teacher_Subjects_Taken` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Subjects_Taken` (\n  `Teacher_Subjects_Taken_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Teacher_ID` INT NOT NULL ,\n  `Adept_T3_Tracker_ID` INT NOT NULL ,\n  `Best_T3_Tracker_ID` INT NOT NULL ,\n  PRIMARY KEY (`Teacher_Subjects_Taken_ID`) ,\n  INDEX `fk_Teacher_Subjects_Taken_Teacher1_idx` (`Teacher_ID` ASC) ,\n  UNIQUE INDEX `Teacher_Subjects_Taken_ID_UNIQUE` (`Teacher_Subjects_Taken_ID` ASC) ,\n  CONSTRAINT `fk_Teacher_Subjects_Taken_Teacher1`\n    FOREIGN KEY (`Teacher_ID` )\n    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Student_Application`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Student_Application` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Student_Application` (\n  `Student_Application_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Application_ID` INT NOT NULL ,\n  `Student_ID` INT NOT NULL ,\n  `Project_ID` INT NOT NULL ,\n  `Subject_ID` INT NOT NULL ,\n  PRIMARY KEY (`Student_Application_ID`) ,\n  INDEX `fk_Student_Application_Application1` (`Application_ID` ASC) ,\n  INDEX `fk_Student_Application_Student2` (`Student_ID` ASC) ,\n  INDEX `fk_Student_Application_Project2` (`Project_ID` ASC) ,\n  INDEX `fk_Student_Application_Subject1` (`Subject_ID` ASC) ,\n  UNIQUE INDEX `Student_Application_ID_UNIQUE` (`Student_Application_ID` ASC) ,\n  CONSTRAINT `fk_Student_Application_Application1`\n    FOREIGN KEY (`Application_ID` )\n    REFERENCES `crisp`.`Application` (`Application_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Student_Application_Student2`\n    FOREIGN KEY (`Student_ID` )\n    REFERENCES `crisp`.`Student` (`Student_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Student_Application_Project2`\n    FOREIGN KEY (`Project_ID` )\n    REFERENCES `crisp`.`Project` (`Project_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Student_Application_Subject1`\n    FOREIGN KEY (`Subject_ID` )\n    REFERENCES `crisp`.`Subject` (`Subject_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Application`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Application` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Application` (\n  `Application_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Answer_1` TEXT NULL ,\n  `Answer_2` TEXT NULL ,\n  `Contract?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Date` DATETIME NOT NULL ,\n  `Created_At` DATETIME NOT NULL ,\n  `Updated_At` DATETIME NULL ,\n  PRIMARY KEY (`Application_ID`) ,\n  UNIQUE INDEX `Application_ID_UNIQUE` (`Application_ID` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Student_Application`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Student_Application` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Student_Application` (\n  `Student_Application_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Application_ID` INT NOT NULL ,\n  `Student_ID` INT NOT NULL ,\n  `Project_ID` INT NOT NULL ,\n  `Subject_ID` INT NOT NULL ,\n  PRIMARY KEY (`Student_Application_ID`) ,\n  INDEX `fk_Student_Application_Application1` (`Application_ID` ASC) ,\n  INDEX `fk_Student_Application_Student2` (`Student_ID` ASC) ,\n  INDEX `fk_Student_Application_Project2` (`Project_ID` ASC) ,\n  INDEX `fk_Student_Application_Subject1` (`Subject_ID` ASC) ,\n  UNIQUE INDEX `Student_Application_ID_UNIQUE` (`Student_Application_ID` ASC) ,\n  CONSTRAINT `fk_Student_Application_Application1`\n    FOREIGN KEY (`Application_ID` )\n    REFERENCES `crisp`.`Application` (`Application_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Student_Application_Student2`\n    FOREIGN KEY (`Student_ID` )\n    REFERENCES `crisp`.`Student` (`Student_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Student_Application_Project2`\n    FOREIGN KEY (`Project_ID` )\n    REFERENCES `crisp`.`Project` (`Project_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Student_Application_Subject1`\n    FOREIGN KEY (`Subject_ID` )\n    REFERENCES `crisp`.`Subject` (`Subject_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Tracker`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Tracker` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Tracker` (\n  `Tracker_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Contract?` TINYINT(1) NOT NULL DEFAULT False ,\n  `Remarks` VARCHAR(255) NULL ,\n  `Status_ID` INT NOT NULL ,\n  `Times_Taken` INT NOT NULL DEFAULT 1 ,\n  PRIMARY KEY (`Tracker_ID`) ,\n  INDEX `fk_Tracker_Status1` (`Status_ID` ASC) ,\n  UNIQUE INDEX `Tracker_ID_UNIQUE` (`Tracker_ID` ASC) ,\n  CONSTRAINT `fk_Tracker_Status1`\n    FOREIGN KEY (`Status_ID` )\n    REFERENCES `crisp`.`Status` (`Status_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Class`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Class` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Class` (\n  `Class_ID` INT NOT NULL AUTO_INCREMENT ,\n  `School_Year` VARCHAR(10) NOT NULL ,\n  `Semester` INT NOT NULL ,\n  `School_ID` INT NOT NULL ,\n  `Subject_ID` INT NOT NULL ,\n  PRIMARY KEY (`Class_ID`) ,\n  INDEX `fk_Section_School2` (`School_ID` ASC) ,\n  INDEX `fk_Class_Subject1_idx` (`Subject_ID` ASC) ,\n  UNIQUE INDEX `Class_ID_UNIQUE` (`Class_ID` ASC) ,\n  CONSTRAINT `fk_Section_School2`\n    FOREIGN KEY (`School_ID` )\n    REFERENCES `crisp`.`School` (`School_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Class_Subject1`\n    FOREIGN KEY (`Subject_ID` )\n    REFERENCES `crisp`.`Subject` (`Subject_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Student_Class`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Student_Class` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Student_Class` (\n  `Student_Class_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Class_ID` INT NOT NULL ,\n  `Student_ID` INT NOT NULL ,\n  PRIMARY KEY (`Student_Class_ID`) ,\n  INDEX `fk_Student_Class_Class1` (`Class_ID` ASC) ,\n  UNIQUE INDEX `Student_Class_ID_UNIQUE` (`Student_Class_ID` ASC) ,\n  INDEX `fk_Student_Class_Student1` (`Student_ID` ASC) ,\n  CONSTRAINT `fk_Student_Class_Class1`\n    FOREIGN KEY (`Class_ID` )\n    REFERENCES `crisp`.`Class` (`Class_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Student_Class_Student1`\n    FOREIGN KEY (`Student_ID` )\n    REFERENCES `crisp`.`Student` (`Student_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`BEST_Student`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`BEST_Student` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`BEST_Student` (\n  `Tracker_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Contol_Number` VARCHAR(5) NULL ,\n  `Username` VARCHAR(45) NULL ,\n  PRIMARY KEY (`Tracker_ID`) ,\n  UNIQUE INDEX `Tracker_ID_UNIQUE` (`Tracker_ID` ASC) ,\n  CONSTRAINT `fk_BEST_Student_Tracker1`\n    FOREIGN KEY (`Tracker_ID` )\n    REFERENCES `crisp`.`Tracker` (`Tracker_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Adept_Student`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Adept_Student` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Adept_Student` (\n  `Tracker_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Control_Number` VARCHAR(5) NULL ,\n  `Username` VARCHAR(45) NULL ,\n  PRIMARY KEY (`Tracker_ID`) ,\n  UNIQUE INDEX `Tracker_ID_UNIQUE` (`Tracker_ID` ASC) ,\n  UNIQUE INDEX `Control_Number_UNIQUE` (`Control_Number` ASC) ,\n  UNIQUE INDEX `Username_UNIQUE` (`Username` ASC) ,\n  CONSTRAINT `fk_Adept_Student_Tracker1`\n    FOREIGN KEY (`Tracker_ID` )\n    REFERENCES `crisp`.`Tracker` (`Tracker_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`GCAT_Student`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`GCAT_Student` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`GCAT_Student` (\n  `Tracker_ID` INT NOT NULL AUTO_INCREMENT ,\n  `GCAT_Total_Cognitive` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Responsiveness` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Reliability` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Empathy` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Courtesy` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Learning_Orientation` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Communication` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Behavioral_Component_Overall_Score` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Perceptual_Speed_&_Accuracy` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Computer_Literacy` INT NOT NULL DEFAULT 0 ,\n  `GCAT_English_Proficiency` INT NOT NULL DEFAULT 0 ,\n  `GCAT_Basic_Skills_Test_Overall_Score` INT NOT NULL DEFAULT 0 ,\n  `Session_ID` VARCHAR(45) NULL ,\n  PRIMARY KEY (`Tracker_ID`) ,\n  UNIQUE INDEX `Session_ID_UNIQUE` (`Session_ID` ASC) ,\n  CONSTRAINT `fk_GCAT_Student_Tracker1`\n    FOREIGN KEY (`Tracker_ID` )\n    REFERENCES `crisp`.`Tracker` (`Tracker_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`SMP_Student`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`SMP_Student` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`SMP_Student` (\n  `Tracker_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Grade` VARCHAR(5) NULL ,\n  INDEX `fk_SMP_Student_Tracker1_idx` (`Tracker_ID` ASC) ,\n  PRIMARY KEY (`Tracker_ID`) ,\n  UNIQUE INDEX `Tracker_ID_UNIQUE` (`Tracker_ID` ASC) ,\n  CONSTRAINT `fk_SMP_Student_Tracker1`\n    FOREIGN KEY (`Tracker_ID` )\n    REFERENCES `crisp`.`Tracker` (`Tracker_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`SMP_Student_Courses_Taken`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`SMP_Student_Courses_Taken` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`SMP_Student_Courses_Taken` (\n  `Student_Class_Student_Class_ID` INT NOT NULL AUTO_INCREMENT ,\n  `SMP_Student_Tracker_Tracker_ID` INT NOT NULL ,\n  `SMP_Student_Courses_Taken_ID` VARCHAR(45) NOT NULL ,\n  INDEX `fk_SMP_Student_Courses_Taken_Student_Class1` (`Student_Class_Student_Class_ID` ASC) ,\n  INDEX `fk_SMP_Student_Courses_Taken_SMP_Student1` (`SMP_Student_Tracker_Tracker_ID` ASC) ,\n  UNIQUE INDEX `Student_Class_Student_Class_ID_UNIQUE` (`Student_Class_Student_Class_ID` ASC) ,\n  PRIMARY KEY (`SMP_Student_Courses_Taken_ID`) ,\n  CONSTRAINT `fk_SMP_Student_Courses_Taken_Student_Class1`\n    FOREIGN KEY (`Student_Class_Student_Class_ID` )\n    REFERENCES `crisp`.`Student_Class` (`Student_Class_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_SMP_Student_Courses_Taken_SMP_Student1`\n    FOREIGN KEY (`SMP_Student_Tracker_Tracker_ID` )\n    REFERENCES `crisp`.`SMP_Student` (`Tracker_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Student_Tracker`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Student_Tracker` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Student_Tracker` (\n  `Student_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Tracker_ID` INT NOT NULL ,\n  `Student_ID` INT NOT NULL ,\n  PRIMARY KEY (`Student_Tracker_ID`) ,\n  INDEX `fk_Student_Tracker_Tracker1` (`Tracker_ID` ASC) ,\n  INDEX `fk_Student_Tracker_Student1` (`Student_ID` ASC) ,\n  UNIQUE INDEX `Student_Tracker_ID_UNIQUE` (`Student_Tracker_ID` ASC) ,\n  CONSTRAINT `fk_Student_Tracker_Tracker1`\n    FOREIGN KEY (`Tracker_ID` )\n    REFERENCES `crisp`.`Tracker` (`Tracker_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Student_Tracker_Student1`\n    FOREIGN KEY (`Student_ID` )\n    REFERENCES `crisp`.`Student` (`Student_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Teacher_T3_Tracker`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Teacher_T3_Tracker` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_T3_Tracker` (\n  `Teacher_T3_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,\n  `T3_Tracker_Teacher_Tracker_ID` INT NOT NULL ,\n  `Teacher_Teacher_ID` INT NOT NULL ,\n  PRIMARY KEY (`Teacher_T3_Tracker_ID`) ,\n  INDEX `fk_Teacher_T3_Tracker_T3_Tracker1` (`T3_Tracker_Teacher_Tracker_ID` ASC) ,\n  INDEX `fk_Teacher_T3_Tracker_Teacher1` (`Teacher_Teacher_ID` ASC) ,\n  UNIQUE INDEX `Teacher_T3_Tracker_ID_UNIQUE` (`Teacher_T3_Tracker_ID` ASC) ,\n  CONSTRAINT `fk_Teacher_T3_Tracker_T3_Tracker1`\n    FOREIGN KEY (`T3_Tracker_Teacher_Tracker_ID` )\n    REFERENCES `crisp`.`T3_Tracker` (`T3_Tracker_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Teacher_T3_Tracker_Teacher1`\n    FOREIGN KEY (`Teacher_Teacher_ID` )\n    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Master Trainer`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Master Trainer` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Master Trainer` (\n  `Master_Trainer_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Last_Name` VARCHAR(45) NOT NULL ,\n  `First_Name` VARCHAR(45) NOT NULL ,\n  `Middle_Initial` VARCHAR(3) NOT NULL ,\n  `Name_Suffix` VARCHAR(4) NOT NULL ,\n  `Company_Name` VARCHAR(100) NOT NULL ,\n  `Company_Address` TEXT NOT NULL ,\n  `Position` VARCHAR(45) NOT NULL ,\n  `Email` VARCHAR(45) NOT NULL ,\n  `Facebook` VARCHAR(45) NULL ,\n  `Landline` VARCHAR(9) NOT NULL ,\n  `Mobile_Number` VARCHAR(13) NOT NULL ,\n  `Gender` CHAR NOT NULL ,\n  `Civil_Status` VARCHAR(9) NOT NULL DEFAULT \'Single\' ,\n  PRIMARY KEY (`Master_Trainer_ID`) ,\n  UNIQUE INDEX `Master_Trainer_ID_UNIQUE` (`Master_Trainer_ID` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Proctor`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Proctor` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Proctor` (\n  `Proctor_ID` INT NOT NULL AUTO_INCREMENT ,\n  `First_Name` VARCHAR(45) NOT NULL ,\n  `Middle_Initial` VARCHAR(5) NOT NULL ,\n  `Last_Name` VARCHAR(45) NOT NULL ,\n  `Name_Suffix` VARCHAR(4) NOT NULL ,\n  `Company_Name` VARCHAR(45) NOT NULL ,\n  `Company_Address` VARCHAR(255) NOT NULL ,\n  `Position` VARCHAR(45) NOT NULL ,\n  `Email` VARCHAR(45) NOT NULL ,\n  `Facebook` VARCHAR(45) NULL ,\n  `Landline` VARCHAR(9) NOT NULL ,\n  `Mobile_Number` VARCHAR(13) NOT NULL ,\n  `Gender` CHAR NOT NULL ,\n  `Civil_Status` VARCHAR(9) NOT NULL DEFAULT \'Single\' ,\n  PRIMARY KEY (`Proctor_ID`) ,\n  UNIQUE INDEX `Proctor_ID_UNIQUE` (`Proctor_ID` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Log`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Log` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Log` (\n  `Log_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Made_By` VARCHAR(100) NOT NULL ,\n  `Changes` TEXT NOT NULL ,\n  `Created_At` DATETIME NOT NULL ,\n  PRIMARY KEY (`Log_ID`) ,\n  UNIQUE INDEX `Log_ID_UNIQUE` (`Log_ID` ASC) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`GCAT_Class`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`GCAT_Class` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`GCAT_Class` (\n  `Proctor_ID` INT NOT NULL ,\n  `Class_ID` INT NOT NULL AUTO_INCREMENT ,\n  PRIMARY KEY (`Class_ID`) ,\n  INDEX `fk_GCAT_Class_Proctor1_idx` (`Proctor_ID` ASC) ,\n  INDEX `fk_GCAT_Class_Class1_idx` (`Class_ID` ASC) ,\n  UNIQUE INDEX `Class_ID_UNIQUE` (`Class_ID` ASC) ,\n  CONSTRAINT `fk_GCAT_Class_Proctor1`\n    FOREIGN KEY (`Proctor_ID` )\n    REFERENCES `crisp`.`Proctor` (`Proctor_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_GCAT_Class_Class1`\n    FOREIGN KEY (`Class_ID` )\n    REFERENCES `crisp`.`Class` (`Class_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Other_Class`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Other_Class` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Other_Class` (\n  `Class_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Name` VARCHAR(45) NOT NULL ,\n  `Teacher_ID` INT NOT NULL ,\n  PRIMARY KEY (`Class_ID`) ,\n  INDEX `fk_Other_Class_Class1_idx` (`Class_ID` ASC) ,\n  INDEX `fk_Other_Class_Teacher1_idx` (`Teacher_ID` ASC) ,\n  UNIQUE INDEX `Class_ID_UNIQUE` (`Class_ID` ASC) ,\n  CONSTRAINT `fk_Other_Class_Class1`\n    FOREIGN KEY (`Class_ID` )\n    REFERENCES `crisp`.`Class` (`Class_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Other_Class_Teacher1`\n    FOREIGN KEY (`Teacher_ID` )\n    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Proctor_copy1`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Proctor_copy1` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Proctor_copy1` (\n  `Proctor_ID` INT NOT NULL ,\n  `First_Name` VARCHAR(45) NULL ,\n  `Middle_Initial` VARCHAR(3) NULL ,\n  `Last_Name` VARCHAR(45) NULL ,\n  `Name_Suffix` VARCHAR(4) NULL ,\n  `Company_Name` VARCHAR(45) NULL ,\n  `Company_Address` VARCHAR(255) NULL ,\n  `Position` VARCHAR(45) NULL ,\n  `Email` VARCHAR(45) NULL ,\n  `Facebook` VARCHAR(45) NULL ,\n  `Landline_Number` VARCHAR(45) NULL ,\n  `Mobile_Number` VARCHAR(45) NULL ,\n  `Gender` CHAR NULL ,\n  `Civil_Status` VARCHAR(9) NULL ,\n  PRIMARY KEY (`Proctor_ID`) )\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`T3_Class`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`T3_Class` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`T3_Class` (\n  `T3_Class_ID` INT NOT NULL AUTO_INCREMENT ,\n  `School_Year` VARCHAR(10) NOT NULL ,\n  `Duration` VARCHAR(10) NOT NULL ,\n  `School_ID` INT NOT NULL ,\n  `Subject_ID` INT NOT NULL ,\n  PRIMARY KEY (`T3_Class_ID`) ,\n  INDEX `fk_Section_School2` (`School_ID` ASC) ,\n  INDEX `fk_Class_Subject1_idx` (`Subject_ID` ASC) ,\n  UNIQUE INDEX `T3_Class_ID_UNIQUE` (`T3_Class_ID` ASC) ,\n  CONSTRAINT `fk_Section_School20`\n    FOREIGN KEY (`School_ID` )\n    REFERENCES `crisp`.`School` (`School_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Class_Subject10`\n    FOREIGN KEY (`Subject_ID` )\n    REFERENCES `crisp`.`Subject` (`Subject_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`GCAT_T3_Class`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`GCAT_T3_Class` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`GCAT_T3_Class` (\n  `T3_Class_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Proctor_ID` INT NOT NULL ,\n  PRIMARY KEY (`T3_Class_ID`) ,\n  INDEX `fk_GCAT_Class_Class1_idx` (`T3_Class_ID` ASC) ,\n  INDEX `fk_GCAT_Class_copy1_Proctor1_idx` (`Proctor_ID` ASC) ,\n  UNIQUE INDEX `T3_Class_ID_UNIQUE` (`T3_Class_ID` ASC) ,\n  CONSTRAINT `fk_GCAT_Class_Class10`\n    FOREIGN KEY (`T3_Class_ID` )\n    REFERENCES `crisp`.`T3_Class` (`T3_Class_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_GCAT_Class_copy1_Proctor1`\n    FOREIGN KEY (`Proctor_ID` )\n    REFERENCES `crisp`.`Proctor` (`Proctor_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Other_T3_Class`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Other_T3_Class` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Other_T3_Class` (\n  `T3_Class_ID` INT NOT NULL AUTO_INCREMENT ,\n  `Name` VARCHAR(45) NOT NULL ,\n  `Master_Trainer_ID` INT NOT NULL ,\n  PRIMARY KEY (`T3_Class_ID`) ,\n  INDEX `fk_Other_Class_Class1_idx` (`T3_Class_ID` ASC) ,\n  INDEX `fk_Other_T3_Class_Master Trainer1_idx` (`Master_Trainer_ID` ASC) ,\n  UNIQUE INDEX `T3_Class_ID_UNIQUE` (`T3_Class_ID` ASC) ,\n  CONSTRAINT `fk_Other_Class_Class10`\n    FOREIGN KEY (`T3_Class_ID` )\n    REFERENCES `crisp`.`T3_Class` (`T3_Class_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Other_T3_Class_Master Trainer1`\n    FOREIGN KEY (`Master_Trainer_ID` )\n    REFERENCES `crisp`.`Master Trainer` (`Master_Trainer_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Teacher_Class`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Teacher_Class` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_Class` (\n  `Teacher_Class_ID` INT NOT NULL AUTO_INCREMENT ,\n  `T3_Class_ID` INT NOT NULL ,\n  `Teacher_ID` INT NOT NULL ,\n  PRIMARY KEY (`Teacher_Class_ID`) ,\n  INDEX `fk_Student_Class_Class1` (`T3_Class_ID` ASC) ,\n  INDEX `fk_Teacher_Class_Teacher1_idx` (`Teacher_ID` ASC) ,\n  UNIQUE INDEX `Teacher_Class_ID_UNIQUE` (`Teacher_Class_ID` ASC) ,\n  CONSTRAINT `fk_Student_Class_Class10`\n    FOREIGN KEY (`T3_Class_ID` )\n    REFERENCES `crisp`.`T3_Class` (`T3_Class_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Teacher_Class_Teacher1`\n    FOREIGN KEY (`Teacher_ID` )\n    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\n\n-- -----------------------------------------------------\n-- Table `crisp`.`Teacher_T3_Application`\n-- -----------------------------------------------------\nDROP TABLE IF EXISTS `crisp`.`Teacher_T3_Application` ;\n\nCREATE  TABLE IF NOT EXISTS `crisp`.`Teacher_T3_Application` (\n  `Teacher_ID` INT NOT NULL ,\n  `T3_Application_ID` INT NOT NULL ,\n  `Teacher_T3_Application_ID` INT NOT NULL AUTO_INCREMENT ,\n  INDEX `fk_Teacher_T3_Application_Teacher1_idx` (`Teacher_ID` ASC) ,\n  INDEX `fk_Teacher_T3_Application_T3_Application1_idx` (`T3_Application_ID` ASC) ,\n  PRIMARY KEY (`Teacher_T3_Application_ID`) ,\n  UNIQUE INDEX `Teacher_ID_UNIQUE` (`Teacher_ID` ASC) ,\n  CONSTRAINT `fk_Teacher_T3_Application_Teacher1`\n    FOREIGN KEY (`Teacher_ID` )\n    REFERENCES `crisp`.`Teacher` (`Teacher_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION,\n  CONSTRAINT `fk_Teacher_T3_Application_T3_Application1`\n    FOREIGN KEY (`T3_Application_ID` )\n    REFERENCES `crisp`.`T3_Application` (`T3_Application_ID` )\n    ON DELETE NO ACTION\n    ON UPDATE NO ACTION)\nENGINE = InnoDB;\n\nUSE `crisp` ;\n\n-- -----------------------------------------------------\n-- Placeholder table for view `crisp`.`view1`\n-- -----------------------------------------------------\nCREATE TABLE IF NOT EXISTS `crisp`.`view1` (`id` INT);\n\n-- -----------------------------------------------------\n-- View `crisp`.`view1`\n-- -----------------------------------------------------\nDROP VIEW IF EXISTS `crisp`.`view1` ;\nDROP TABLE IF EXISTS `crisp`.`view1`;\nUSE `crisp`;\n;\n\n\nSET SQL_MODE=@OLD_SQL_MODE;\nSET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;\nSET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;\n\n-- -----------------------------------------------------\n-- Data for table `crisp`.`School`\n-- -----------------------------------------------------\nSTART TRANSACTION;\nUSE `crisp`;\nINSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (1, \'Polytechnic University of the Philippines\', \'Quezon City\', \'4101111\', \'pup@gmail.com\', \'Raymond Cruz\', \'09151234567\', \'2012-12-09\', \'2012-12-12\', \'123456\', \'Manila\');\nINSERT INTO `crisp`.`School` (`School_ID`, `Name`, `Address`, `Landline`, `Email`, `Point Person`, `Point_Person_Contact`, `Updated_At`, `Created_At`, `Code`, `Branch`) VALUES (NULL, \'Ateneo de Manila University\', \'Quezon City\', \'4102222\', \'ateneo@gmail.com\', \'Michelle Armario\', \'09129876789\', \'2012-12-10\', \'2012-12-12\', \'431243\', \'Quezon City\');\n\nCOMMIT;\n\n-- -----------------------------------------------------\n-- Data for table `crisp`.`Teacher`\n-- -----------------------------------------------------\nSTART TRANSACTION;\nUSE `crisp`;\nINSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`) VALUES (1, \'8\', \'Samar\', \'Quezon City\', \'Metro Manila\', \'5\', \'Basco, Batanes\', \'rj@gmail.com\', NULL, \'Single\', \'1994-12-10\', \'Quezon City\', \'Male\', \'Filipino\', 101111, \'Teacher 1\', \'Permanent\', \'John Leveur\', \'09159999911\', \'2013-12-12 00:00:00\', \'2013-12-14 00:00:00\', True, False, True, False, True, True, False, 4, \'CODE123\', \'Mike\', \'091159503612\', \'Jr.\', \'A\', \'Swift\', \'3336644\');\nINSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`) VALUES (NULL, \'7\', \'Pura\', \'Manila City\', \'Metro Manila\', \'NCR\', \'Laoag City\', \'gil@gmail.com\', \'Gigi\', \'Married\', \'1992-01-01\', \'Beijing, China\', \'Female\', \'Filipino\', 101111, \'Teacher 2\', \'Permanent\', \'Michael Bryan\', \'09111222334\', \'2013-10-31 00:00:00\', \'2013-11-05 00:00:00\', False, False, True, False, True, False, True, 3, \'CODE432\', \'Gillian\', \'098112344321\', NULL, \'P\', \'Tan\', \'3215432\');\nINSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`) VALUES (NULL, \'2\', \'Arrupe\', \'Malabon City\', \'Metro Manila \', \'NCR\', \'Ormoc City\', \'fr@gmail.com\', \'Francis\', \'Married\', \'1991-11-12\', \'Caloocan City, Philippines\', \'Male\', \'Filipino\', 210222, \'Teacher 4\', \'Permanent\', \'Fernando Lopez\', \'09212123456\', \'2011-11-24 00:00:00\', \'2013-11-14 00:00:00\', True, True, True, True, False, False, False, 10, \'CODE123\', \'Francis\', \'123456711111\', \'Jr.\', \'B\', \'Fajardo\', \'32123421\');\nINSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`) VALUES (NULL, \'6750\', \'Ayala\', \'Makati City\', \'Metro Manila\', \'NCR\', \'Cebu City\', \'iza@yahoo.com\', \'Iza\', \'Single\', \'1967-11-14\', \'Los Angeles, USA\', \'Female\', \'American\', 122111, \'Teacher 10\', \'Permanent\', \'Barack Obama\', \'09121431431\', \'2012-11-24 00:00:00\', \'2013-11-14 00:00:00\', True, False, False, False, False, True, True, 22, \'CODE143\', \'Iza\', \'212321220291\', NULL, \'C\', \'Calzado\', \'2132321\');\n\nCOMMIT;\n\n-- -----------------------------------------------------\n-- Data for table `crisp`.`Teacher_Relevant_Experiences`\n-- -----------------------------------------------------\nSTART TRANSACTION;\nUSE `crisp`;\nINSERT INTO `crisp`.`Teacher_Relevant_Experiences` (`Teacher_Relevant_Experiences_ID`, `Organization`, `Position`, `Description`, `Date`, `Teacher_ID`) VALUES (1, \'Ayala\', \'Instructor\', \'Instructed employees\', \'2013-11-16\', 1);\nINSERT INTO `crisp`.`Teacher_Relevant_Experiences` (`Teacher_Relevant_Experiences_ID`, `Organization`, `Position`, `Description`, `Date`, `Teacher_ID`) VALUES (NULL, \'Accenture\', \'Asst Instructor\', \'Assisted the instructor\', \'2013-11-14\', 2);\n\nCOMMIT;\n\n-- -----------------------------------------------------\n-- Data for table `crisp`.`Computer_Skills`\n-- -----------------------------------------------------\nSTART TRANSACTION;\nUSE `crisp`;\nINSERT INTO `crisp`.`Computer_Skills` (`Computer_Skills_ID`, `Name`) VALUES (1, \'Encoding\');\nINSERT INTO `crisp`.`Computer_Skills` (`Computer_Skills_ID`, `Name`) VALUES (NULL, \'Java\');\nINSERT INTO `crisp`.`Computer_Skills` (`Computer_Skills_ID`, `Name`) VALUES (NULL, \'C++\');\n\nCOMMIT;\n\n-- -----------------------------------------------------\n-- Data for table `crisp`.`Skills`\n-- -----------------------------------------------------\nSTART TRANSACTION;\nUSE `crisp`;\nINSERT INTO `crisp`.`Skills` (`Skills_ID`, `Name`) VALUES (1, \'Bar Tending\');\nINSERT INTO `crisp`.`Skills` (`Skills_ID`, `Name`) VALUES (NULL, \'Singing\');\nINSERT INTO `crisp`.`Skills` (`Skills_ID`, `Name`) VALUES (NULL, \'Guitar Playing\');\n\nCOMMIT;\n\n-- -----------------------------------------------------\n-- Data for table `crisp`.`Subject`\n-- -----------------------------------------------------\nSTART TRANSACTION;\nUSE `crisp`;\nINSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (1, \'English\', \'En10\');\nINSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (2, \'Math\', \'Ma11\');\nINSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (NULL, \'Science\', \'Sci10\');\n\nCOMMIT;\n\n-- -----------------------------------------------------\n-- Data for table `crisp`.`Status`\n-- -----------------------------------------------------\nSTART TRANSACTION;\nUSE `crisp`;\nINSERT INTO `crisp`.`Status` (`Status_ID`, `Name`) VALUES (1, \'Pass\');\nINSERT INTO `crisp`.`Status` (`Status_ID`, `Name`) VALUES (NULL, \'Fail\');\n\nCOMMIT;\n\n-- -----------------------------------------------------\n-- Data for table `crisp`.`Project`\n-- -----------------------------------------------------\nSTART TRANSACTION;\nUSE `crisp`;\nINSERT INTO `crisp`.`Project` (`Project_ID`, `Name`, `Institution`, `Year_Implemented`) VALUES (1, \'Joan Magno\', \'CMLI\', 2012);\nINSERT INTO `crisp`.`Project` (`Project_ID`, `Name`, `Institution`, `Year_Implemented`) VALUES (NULL, \'Janella Ongcol\', \'ADMU\', 1999);\nINSERT INTO `crisp`.`Project` (`Project_ID`, `Name`, `Institution`, `Year_Implemented`) VALUES (NULL, \'Sam Tan\', \'GMA\', 2005);\n\nCOMMIT;\n\n-- -----------------------------------------------------\n-- Data for table `crisp`.`Teacher_Subjects_Taken`\n-- -----------------------------------------------------\nSTART TRANSACTION;\nUSE `crisp`;\nINSERT INTO `crisp`.`Teacher_Subjects_Taken` (`Teacher_Subjects_Taken_ID`, `Teacher_ID`, `Adept_T3_Tracker_ID`, `Best_T3_Tracker_ID`) VALUES (1, 1, 1, 2);\nINSERT INTO `crisp`.`Teacher_Subjects_Taken` (`Teacher_Subjects_Taken_ID`, `Teacher_ID`, `Adept_T3_Tracker_ID`, `Best_T3_Tracker_ID`) VALUES (NULL, 2, 2, 2);\n\nCOMMIT;\n\n-- -----------------------------------------------------\n-- Data for table `crisp`.`Log`\n-- -----------------------------------------------------\nSTART TRANSACTION;\nUSE `crisp`;\nINSERT INTO `crisp`.`Log` (`Log_ID`, `Made_By`, `Changes`, `Created_At`) VALUES (1, \'John Mayer\', \'Add Teacher\', \'2012-11-15\');\nINSERT INTO `crisp`.`Log` (`Log_ID`, `Made_By`, `Changes`, `Created_At`) VALUES (NULL, \'Whiz Khaliffa\', \'Add Student\', \'2011-11-16\');\n\nCOMMIT;\n\n-- -----------------------------------------------------\n-- Data for table `crisp`.`T3_Class`\n-- -----------------------------------------------------\nSTART TRANSACTION;\nUSE `crisp`;\nINSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_Year`, `Duration`, `School_ID`, `Subject_ID`) VALUES (NULL, NULL, NULL, NULL, NULL);\n\nCOMMIT;\n1992-10-10 00:24:34', 'Quezon City', 'Male', 'Filipino', 1, 'Teacher 1', 'Permanent', 'John Leveur', '09159999911', '2013-12-12 00:00:00', '2013-12-14 00:00:00', True, False, True, False, True, True, False, 4, 'CODE123', 'Mike', '091159503612', 'Jr.', 'A', 'Swift', '3336644');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`) VALUES (NULL, '7', 'Pura', 'Manila City', 'Metro Manila', 'NCR', 'Laoag City', 'gil@gmail.com', 'Gigi', 'Married', '1992-01-01 00:24:34', 'Beijing, China', 'Female', 'Filipino', 2, 'Teacher 2', 'Permanent', 'Michael Bryan', '09111222334', '2013-10-31 00:00:00', '2013-11-05 00:00:00', False, False, True, False, True, False, True, 3, 'CODE432', 'Gillian', '098112344321', NULL, 'P', 'Tan', '3215432');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`) VALUES (NULL, '2', 'Arrupe', 'Malabon City', 'Metro Manila ', 'NCR', 'Ormoc City', 'fr@gmail.com', 'Francis', 'Married', '1991-11-12 00:24:34', 'Caloocan City, Philippines', 'Male', 'Filipino', 3, 'Teacher 4', 'Permanent', 'Fernando Lopez', '09212123456', '2011-11-24 00:00:00', '2013-11-14 00:00:00', True, True, True, True, False, False, False, 10, 'CODE123', 'Francis', '123456711111', 'Jr.', 'B', 'Fajardo', '32123421');
INSERT INTO `crisp`.`Teacher` (`Teacher_ID`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Email`, `Facebook`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `School_ID`, `Current_Position`, `Employment_Status`, `Name_of_Supervisor`, `Supervisor_Contact_Details`, `Created_At`, `Updated_At`, `Resume?`, `Photo?`, `Proof_of_Certification?`, `Diploma/TOR`, `Desktop?`, `Laptop?`, `Internet?`, `Total_Year_of_Teaching`, `Code`, `First_Name`, `Mobile_Number`, `Name_Suffix`, `Middle_Initial`, `Last_Name`, `Landline`) VALUES (NULL, '6750', 'Ayala', 'Makati City', 'Metro Manila', 'NCR', 'Cebu City', 'iza@yahoo.com', 'Iza', 'Single', '1967-11-14 00:24:34', 'Los Angeles, USA', 'Female', 'American', 1, 'Teacher 10', 'Permanent', 'Barack Obama', '09121431431', '2012-11-24 00:00:00', '2013-11-14 00:00:00', True, False, False, False, False, True, True, 22, 'CODE143', 'Iza', '212321220291', NULL, 'C', 'Calzado', '2132321');

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
INSERT INTO `crisp`.`Teacher_Awards` (`Teacher_Awards_ID`, `Award`, `Awarding_Body`, `Date_Received`, `Teacher_ID`) VALUES (1, 'Best in English', 'FAMAS', '1992-12-11', 1);
INSERT INTO `crisp`.`Teacher_Awards` (`Teacher_Awards_ID`, `Award`, `Awarding_Body`, `Date_Received`, `Teacher_ID`) VALUES (NULL, 'Best in Math', 'Mathers', '1911-11-11', 2);
INSERT INTO `crisp`.`Teacher_Awards` (`Teacher_Awards_ID`, `Award`, `Awarding_Body`, `Date_Received`, `Teacher_ID`) VALUES (NULL, 'Oscar', 'Academy', '1999-11-12', 1);
INSERT INTO `crisp`.`Teacher_Awards` (`Teacher_Awards_ID`, `Award`, `Awarding_Body`, `Date_Received`, `Teacher_ID`) VALUES (NULL, 'Emmy', 'America', '2012-09-11', 3);

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
INSERT INTO `crisp`.`Teacher_Computer_Profiency` (`Teacher_Computer_Profiency_ID`, `Skills_ID`, `Teacher_ID`) VALUES (1, 1, 1);
INSERT INTO `crisp`.`Teacher_Computer_Profiency` (`Teacher_Computer_Profiency_ID`, `Skills_ID`, `Teacher_ID`) VALUES (NULL, 2, 1);
INSERT INTO `crisp`.`Teacher_Computer_Profiency` (`Teacher_Computer_Profiency_ID`, `Skills_ID`, `Teacher_ID`) VALUES (NULL, 3, 1);
INSERT INTO `crisp`.`Teacher_Computer_Profiency` (`Teacher_Computer_Profiency_ID`, `Skills_ID`, `Teacher_ID`) VALUES (NULL, 1, 2);
INSERT INTO `crisp`.`Teacher_Computer_Profiency` (`Teacher_Computer_Profiency_ID`, `Skills_ID`, `Teacher_ID`) VALUES (NULL, 3, 3);
INSERT INTO `crisp`.`Teacher_Computer_Profiency` (`Teacher_Computer_Profiency_ID`, `Skills_ID`, `Teacher_ID`) VALUES (NULL, 2, 3);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Teacher_Computer_Familiarity`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Teacher_Computer_Familiarity` (`Teacher_Computer_Familiarity_ID`, `Teacher_ID`, `Skills_ID`) VALUES (1, 1, 1);
INSERT INTO `crisp`.`Teacher_Computer_Familiarity` (`Teacher_Computer_Familiarity_ID`, `Teacher_ID`, `Skills_ID`) VALUES (NULL, 2, 1);
INSERT INTO `crisp`.`Teacher_Computer_Familiarity` (`Teacher_Computer_Familiarity_ID`, `Teacher_ID`, `Skills_ID`) VALUES (NULL, 1, 2);
INSERT INTO `crisp`.`Teacher_Computer_Familiarity` (`Teacher_Computer_Familiarity_ID`, `Teacher_ID`, `Skills_ID`) VALUES (NULL, 2, 2);
INSERT INTO `crisp`.`Teacher_Computer_Familiarity` (`Teacher_Computer_Familiarity_ID`, `Teacher_ID`, `Skills_ID`) VALUES (NULL, 3, 3);
INSERT INTO `crisp`.`Teacher_Computer_Familiarity` (`Teacher_Computer_Familiarity_ID`, `Teacher_ID`, `Skills_ID`) VALUES (NULL, 4, 1);

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
INSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (1, 'English', 'En10');
INSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (2, 'Math', 'Ma11');
INSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (NULL, 'Science', 'Sci10');
INSERT INTO `crisp`.`Subject` (`Subject_ID`, `Subject_Name`, `Subject_Code`) VALUES (NULL, 'Geography', 'Geo10');

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
INSERT INTO `crisp`.`Status` (`Status_ID`, `Name`) VALUES (1, 'Pass');
INSERT INTO `crisp`.`Status` (`Status_ID`, `Name`) VALUES (NULL, 'Fail');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`T3_Tracker`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (1, 1, '2012-11-11', '2013-11-13', False, 'Really', 1);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (2, 2, '2009-09-09', '2001-01-01', True, 'Go ', 2);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (3, 1, '2014-11-14', '2011-12-11', False, 'Hell Yeah Im Halfway', 2);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (4, 1, '2011-11-01', '2011-11-02', True, 'At 14 they asked', 3);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (5, 2, '2011-11-04', '2011-11-06', False, 'Owowow', 4);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (6, 1, '2011-11-06', '2011-11-01', True, 'Schoolin\'', 3);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (7, 2, '2012-11-09', '2011-11-02', True, 'Don\'t stop running', 4);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (8, 1, '2011-11-08', '2011-11-03', False, 'Who needs it', 3);
INSERT INTO `crisp`.`T3_Tracker` (`T3_Tracker_ID`, `Status_ID`, `Created_At`, `Updated_At`, `Contract?`, `Remarks`, `Subject_ID`) VALUES (9, 2, '2012-11-08', '2011-11-03', True, 'Whoa', 4);

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
INSERT INTO `crisp`.`Adept_T3_Tracker` (`T3_Tracker_ID`, `Adept_T3_Grades_ID`, `Adept_T3_Attendance_ID`, `Interview_Form?`, `Site_Visit_Form?`, `Adept_T3_Feedback?`, `Adept_E-Learning_Feedback`, `Manual_&_Kit`, `Certificate_Of_Attendance`, `Adept_Certified_Trainers`, `Lesson_Plan`, `Demo`, `Total_Weigthed`, `Training_Portfolio`, `Control_Number`, `User_Name`) VALUES (3, 1, 1, True, False, True, True, False, True, False, 10.1, 12, 12.11, 12.1, 'aa3', 'jppp');
INSERT INTO `crisp`.`Adept_T3_Tracker` (`T3_Tracker_ID`, `Adept_T3_Grades_ID`, `Adept_T3_Attendance_ID`, `Interview_Form?`, `Site_Visit_Form?`, `Adept_T3_Feedback?`, `Adept_E-Learning_Feedback`, `Manual_&_Kit`, `Certificate_Of_Attendance`, `Adept_Certified_Trainers`, `Lesson_Plan`, `Demo`, `Total_Weigthed`, `Training_Portfolio`, `Control_Number`, `User_Name`) VALUES (4, 2, 2, True, True, True, True, False, False, True, 10.2, 12.1, 12.11, 12.14, 'aa4', 'jjds01');

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
INSERT INTO `crisp`.`Student` (`Student_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `School_ID`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (1, 'Federico', 'Joy', 'H', 'II', '102222', 'Single', '1991-10-10', 'Beijing, China', 'Female', 'Filipino', '8', 'Concorde', 'Caloocan City', 'Metro Manila', 'NCR', 'Commonwealth, Quezon City', '09152341231', '4321234', 'joy@yahoo.com', 'Joi Federico', 'BS MIS', 4, 1, 2013, False, False, 'Not Really', False, False, '12345');
INSERT INTO `crisp`.`Student` (`Student_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `School_ID`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (NULL, 'Fajardo', 'Francis', 'J', 'III', '132123', 'Single', '1990-12-12', 'Quezon City', 'Male', 'Filipino', '2', 'Civic', 'Quezon City', 'Metro Manila', 'NCR', 'Caloocan City', '09138312341', '4312312', 'francis@gmail.com', 'Francis Yo', 'BS Management', 3, 2, 2014, False, True, 'Yes.', False, True, '32333');
INSERT INTO `crisp`.`Student` (`Student_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `School_ID`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (NULL, 'Cruz', 'Raymond', 'M', 'Jr', '243121', 'Single', '1991-12-11', 'Manila City', 'Male', 'Russian', '3', 'Malakas', 'San Juan City', 'Metro Manila', 'NCR', 'Bonifacio Global City', '09135823842', '9384913', 'rj@yahoo.com', 'RJ', 'BS Management - H', 4, 2, 2013, True, True, 'Yep. ', False, True, '39293');
INSERT INTO `crisp`.`Student` (`Student_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Student_ID_Number`, `Civil_Status`, `Birthdate`, `Birthplace`, `Gender`, `Nationality`, `Street_Number`, `Street_Name`, `City`, `Province`, `Region`, `Alternate_Address`, `Mobile_Number`, `Landline`, `Email`, `Facebook`, `Course`, `Year`, `School_ID`, `Expected_Year_of_Graduation`, `DOST_Scholar?`, `Scholar?`, `Interested_in_IT-BPO?`, `Own_A_Compter?`, `Internet_Access?`, `Code`) VALUES (NULL, 'Luces', 'Paolo', 'J', NULL, '212311', 'Married', '1991-10-11', 'Caloocan City', 'Male', 'Filipino', '2', 'Matalino', 'Caloocan City', 'Metro Manila', 'NCR', 'Tomas Morato', '02933481341', '3323421', 'pao@hotmail.com', NULL, 'BS ME', 3, 4, 2012, True, True, 'Nope', True, False, '32323');

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
-- Data for table `crisp`.`Teacher_Subjects_Taken`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Teacher_Subjects_Taken` (`Teacher_Subjects_Taken_ID`, `Teacher_ID`, `Adept_T3_Tracker_ID`, `Best_T3_Tracker_ID`) VALUES (1, 1, 1, 2);
INSERT INTO `crisp`.`Teacher_Subjects_Taken` (`Teacher_Subjects_Taken_ID`, `Teacher_ID`, `Adept_T3_Tracker_ID`, `Best_T3_Tracker_ID`) VALUES (NULL, 2, 2, 2);
INSERT INTO `crisp`.`Teacher_Subjects_Taken` (`Teacher_Subjects_Taken_ID`, `Teacher_ID`, `Adept_T3_Tracker_ID`, `Best_T3_Tracker_ID`) VALUES (NULL, 3, 1, 3);
INSERT INTO `crisp`.`Teacher_Subjects_Taken` (`Teacher_Subjects_Taken_ID`, `Teacher_ID`, `Adept_T3_Tracker_ID`, `Best_T3_Tracker_ID`) VALUES (NULL, 4, 2, 4);

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
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`) VALUES (1, True, 'Average', 1, 2);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`) VALUES (2, False, 'Great', 2, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`) VALUES (3, False, 'Bad', 1, 5);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`) VALUES (4, True, 'Worst', 2, 5);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`) VALUES (5, False, 'Great', 2, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`) VALUES (6, True, 'See class', 1, 1);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`) VALUES (7, True, 'Reject', 1, 2);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`) VALUES (8, False, 'Singer', 2, 8);
INSERT INTO `crisp`.`Tracker` (`Tracker_ID`, `Contract?`, `Remarks`, `Status_ID`, `Times_Taken`) VALUES (9, True, 'Failure', 2, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Class`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Class` (`Class_ID`, `School_Year`, `Semester`, `School_ID`, `Subject_ID`) VALUES (1, '2012-2013', 1, 1, 1);
INSERT INTO `crisp`.`Class` (`Class_ID`, `School_Year`, `Semester`, `School_ID`, `Subject_ID`) VALUES (2, '2011-2012', 2, 2, 1);
INSERT INTO `crisp`.`Class` (`Class_ID`, `School_Year`, `Semester`, `School_ID`, `Subject_ID`) VALUES (3, '1993-1994', 3, 3, 2);
INSERT INTO `crisp`.`Class` (`Class_ID`, `School_Year`, `Semester`, `School_ID`, `Subject_ID`) VALUES (4, '1992-1993', 4, 1, 4);
INSERT INTO `crisp`.`Class` (`Class_ID`, `School_Year`, `Semester`, `School_ID`, `Subject_ID`) VALUES (5, '1992-1993', 2, 1, 2);
INSERT INTO `crisp`.`Class` (`Class_ID`, `School_Year`, `Semester`, `School_ID`, `Subject_ID`) VALUES (6, '1992-1993', 3, 2, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Student_Class`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Student_Class` (`Student_Class_ID`, `Class_ID`, `Student_ID`) VALUES (1, 1, 1);
INSERT INTO `crisp`.`Student_Class` (`Student_Class_ID`, `Class_ID`, `Student_ID`) VALUES (NULL, 1, 2);
INSERT INTO `crisp`.`Student_Class` (`Student_Class_ID`, `Class_ID`, `Student_ID`) VALUES (NULL, 1, 3);
INSERT INTO `crisp`.`Student_Class` (`Student_Class_ID`, `Class_ID`, `Student_ID`) VALUES (NULL, 1, 4);
INSERT INTO `crisp`.`Student_Class` (`Student_Class_ID`, `Class_ID`, `Student_ID`) VALUES (NULL, 2, 2);
INSERT INTO `crisp`.`Student_Class` (`Student_Class_ID`, `Class_ID`, `Student_ID`) VALUES (NULL, 2, 1);
INSERT INTO `crisp`.`Student_Class` (`Student_Class_ID`, `Class_ID`, `Student_ID`) VALUES (NULL, 2, 3);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`BEST_Student`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`BEST_Student` (`Tracker_ID`, `Contol_Number`, `Username`) VALUES (1, '12341', 'jpphil');
INSERT INTO `crisp`.`BEST_Student` (`Tracker_ID`, `Contol_Number`, `Username`) VALUES (2, '54321', 'mac01');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Adept_Student`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Adept_Student` (`Tracker_ID`, `Control_Number`, `Username`) VALUES (3, '2312', 'ara12');
INSERT INTO `crisp`.`Adept_Student` (`Tracker_ID`, `Control_Number`, `Username`) VALUES (4, '12312', 'joy32');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`GCAT_Student`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`GCAT_Student` (`Tracker_ID`, `GCAT_Total_Cognitive`, `GCAT_Responsiveness`, `GCAT_Reliability`, `GCAT_Empathy`, `GCAT_Courtesy`, `GCAT_Learning_Orientation`, `GCAT_Communication`, `GCAT_Behavioral_Component_Overall_Score`, `GCAT_Perceptual_Speed_&_Accuracy`, `GCAT_Computer_Literacy`, `GCAT_English_Proficiency`, `GCAT_Basic_Skills_Test_Overall_Score`, `Session_ID`) VALUES (5, 4, 2, 4, 3, 2, 5, 6, 5, 2, 4, 2, 5, 'aa1');
INSERT INTO `crisp`.`GCAT_Student` (`Tracker_ID`, `GCAT_Total_Cognitive`, `GCAT_Responsiveness`, `GCAT_Reliability`, `GCAT_Empathy`, `GCAT_Courtesy`, `GCAT_Learning_Orientation`, `GCAT_Communication`, `GCAT_Behavioral_Component_Overall_Score`, `GCAT_Perceptual_Speed_&_Accuracy`, `GCAT_Computer_Literacy`, `GCAT_English_Proficiency`, `GCAT_Basic_Skills_Test_Overall_Score`, `Session_ID`) VALUES (6, 6, 5, 4, 2, 9, 8, 4, 5, 6, 9, 3, 8, 'aa2');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`SMP_Student`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`SMP_Student` (`Tracker_ID`, `Grade`) VALUES (7, '43');
INSERT INTO `crisp`.`SMP_Student` (`Tracker_ID`, `Grade`) VALUES (8, '32');

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`SMP_Student_Courses_Taken`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`SMP_Student_Courses_Taken` (`SMP_Student_Courses_Taken_ID`, `Student_Class_ID`, `Tracker_ID`) VALUES ('1', 1, 7);
INSERT INTO `crisp`.`SMP_Student_Courses_Taken` (`SMP_Student_Courses_Taken_ID`, `Student_Class_ID`, `Tracker_ID`) VALUES ('2', 2, 8);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Student_Tracker`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (1, 1, 1);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (NULL, 2, 2);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (NULL, 3, 1);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (NULL, 4, 3);
INSERT INTO `crisp`.`Student_Tracker` (`Student_Tracker_ID`, `Tracker_ID`, `Student_ID`) VALUES (NULL, 5, 3);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Teacher_T3_Tracker`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (1, 1, 1);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (NULL, 2, 2);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (NULL, 3, 4);
INSERT INTO `crisp`.`Teacher_T3_Tracker` (`Teacher_T3_Tracker_ID`, `T3_Tracker_ID`, `Teacher_ID`) VALUES (NULL, 4, 1);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Master Trainer`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Master Trainer` (`Master_Trainer_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Company_Name`, `Company_Address`, `Position`, `Email`, `Facebook`, `Landline`, `Mobile_Number`, `Gender`, `Civil_Status`) VALUES (1, 'Peralta', 'Zara', 'A', NULL, 'GDP', 'Basco, Batanes', 'President', 'zara@gmail.com', 'zara', '323413', '09174628234', 'Female', 'Single');
INSERT INTO `crisp`.`Master Trainer` (`Master_Trainer_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Company_Name`, `Company_Address`, `Position`, `Email`, `Facebook`, `Landline`, `Mobile_Number`, `Gender`, `Civil_Status`) VALUES (NULL, 'Go', 'Amiel', 'B', 'Jr', 'AMF', 'Mindanao Avenue', 'Secretary', 'amiel@gmail.com', 'amiel', '343414', '09124834321', 'Male', 'Married');
INSERT INTO `crisp`.`Master Trainer` (`Master_Trainer_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Company_Name`, `Company_Address`, `Position`, `Email`, `Facebook`, `Landline`, `Mobile_Number`, `Gender`, `Civil_Status`) VALUES (NULL, 'Mandela', 'Nelson ', 'C', NULL, 'MDA', 'Africa, South Africa', 'President', 'nm@yahoo.com', NULL, '432422', '29482020392', 'Male', 'Single');
INSERT INTO `crisp`.`Master Trainer` (`Master_Trainer_ID`, `Last_Name`, `First_Name`, `Middle_Initial`, `Name_Suffix`, `Company_Name`, `Company_Address`, `Position`, `Email`, `Facebook`, `Landline`, `Mobile_Number`, `Gender`, `Civil_Status`) VALUES (NULL, 'Razon', 'Henedina', 'B', NULL, 'MDJG', 'Basco, Batanes', 'Congressman', 'ha@gmail.com', NULL, '349382', '09832382828', 'Female', 'Single');

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
INSERT INTO `crisp`.`Other_Class` (`Class_ID`, `Name`, `Teacher_ID`) VALUES (3, 'BPO101', 1);
INSERT INTO `crisp`.`Other_Class` (`Class_ID`, `Name`, `Teacher_ID`) VALUES (4, 'BPO102', 2);
INSERT INTO `crisp`.`Other_Class` (`Class_ID`, `Name`, `Teacher_ID`) VALUES (5, 'BPO103', 3);
INSERT INTO `crisp`.`Other_Class` (`Class_ID`, `Name`, `Teacher_ID`) VALUES (6, 'BPO104', 4);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`T3_Class`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_Year`, `Duration`, `School_ID`, `Subject_ID`) VALUES (1, '2013-2014', '1 sem', 1, 1);
INSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_Year`, `Duration`, `School_ID`, `Subject_ID`) VALUES (NULL, '2013-2014', '2 sem', 2, 1);
INSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_Year`, `Duration`, `School_ID`, `Subject_ID`) VALUES (NULL, '2012-2013', '4 sem', 3, 1);
INSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_Year`, `Duration`, `School_ID`, `Subject_ID`) VALUES (NULL, '2010-2011', '3 sem', 4, 1);
INSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_Year`, `Duration`, `School_ID`, `Subject_ID`) VALUES (NULL, '2009-2010', '1 sem', 1, 2);
INSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_Year`, `Duration`, `School_ID`, `Subject_ID`) VALUES (NULL, '2011-2012', '2 sem', 2, 2);
INSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_Year`, `Duration`, `School_ID`, `Subject_ID`) VALUES (NULL, '2012-2014', '4 sem', 3, 2);
INSERT INTO `crisp`.`T3_Class` (`T3_Class_ID`, `School_Year`, `Duration`, `School_ID`, `Subject_ID`) VALUES (NULL, '2011-2011', '1 sem', 1, 3);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`GCAT_T3_Class`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`GCAT_T3_Class` (`T3_Class_ID`, `Proctor_ID`) VALUES (1, 1);
INSERT INTO `crisp`.`GCAT_T3_Class` (`T3_Class_ID`, `Proctor_ID`) VALUES (NULL, 2);
INSERT INTO `crisp`.`GCAT_T3_Class` (`T3_Class_ID`, `Proctor_ID`) VALUES (NULL, 3);
INSERT INTO `crisp`.`GCAT_T3_Class` (`T3_Class_ID`, `Proctor_ID`) VALUES (NULL, 4);

COMMIT;

-- -----------------------------------------------------
-- Data for table `crisp`.`Other_T3_Class`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`Other_T3_Class` (`T3_Class_ID`, `Name`, `Master_Trainer_ID`) VALUES (5, 'BPO1', 1);
INSERT INTO `crisp`.`Other_T3_Class` (`T3_Class_ID`, `Name`, `Master_Trainer_ID`) VALUES (6, 'BPO2', 2);
INSERT INTO `crisp`.`Other_T3_Class` (`T3_Class_ID`, `Name`, `Master_Trainer_ID`) VALUES (7, 'BPO3', 3);
INSERT INTO `crisp`.`Other_T3_Class` (`T3_Class_ID`, `Name`, `Master_Trainer_ID`) VALUES (8, 'English', 4);

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
-- Data for table `crisp`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `crisp`;
INSERT INTO `crisp`.`users` (`id`, `username`, `password`, `type`) VALUES (1, 'rj', MD5('rjcruz'), 'admin');

COMMIT;