SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

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
  `Teacher_ID` INT NOT NULL ,
  `Institution` VARCHAR(250) NOT NULL ,
  `Position` VARCHAR(45) NOT NULL ,
  `Date` DATETIME NOT NULL ,
  `Level_Taught` VARCHAR(250) NOT NULL ,
  `Courses_Taught` TEXT NOT NULL ,
  `Number_of_Years_in_Institution` INT NOT NULL ,
  `Teacher_Training_Experience_ID` INT NOT NULL AUTO_INCREMENT ,
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
  `Email` VARCHAR(45) NOT NULL ,
  `Teacher_Professional_Reference_ID` INT NOT NULL AUTO_INCREMENT ,
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
  `T3_Application_ID` INT NOT NULL AUTO_INCREMENT ,
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
  `SMP_T3_Site_Visit_ID` INT NOT NULL ,
  `T3_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,
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
  `SMP_T3_Tracker_ID` INT NOT NULL ,
  PRIMARY KEY (`SMP_T3_Attendance_Tracking_ID`) ,
  INDEX `fk_SMP_T3_Attendance_Tracking_SMP_T3_Attendance1_idx` (`SMP_T3_Attendance_ID` ASC) ,
  INDEX `fk_SMP_T3_Attendance_Tracking_SMP_T3_Tracker1` (`SMP_T3_Tracker_ID` ASC) ,
  UNIQUE INDEX `SMP_T3_Attendance_Tracking_ID_UNIQUE` (`SMP_T3_Attendance_Tracking_ID` ASC) ,
  CONSTRAINT `fk_SMP_T3_Attendance_Tracking_SMP_T3_Attendance1`
    FOREIGN KEY (`SMP_T3_Attendance_ID` )
    REFERENCES `crisp`.`SMP_T3_Attendance` (`SMP_T3_Attendance_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SMP_T3_Attendance_Tracking_SMP_T3_Tracker1`
    FOREIGN KEY (`SMP_T3_Tracker_ID` )
    REFERENCES `crisp`.`SMP_T3_Tracker` (`T3_Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `crisp`.`Best_Adept_T3_Application`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Best_Adept_T3_Application` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Best_Adept_T3_Application` (
  `Answer_1` TEXT NULL ,
  `Answer_2` TEXT NULL ,
  `Answer_3` TEXT NULL ,
  `Contract?` TINYINT(1) NOT NULL DEFAULT False ,
  `T3_Application_ID` INT NOT NULL AUTO_INCREMENT ,
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
  `Best_T3_Attendance_ID` INT NOT NULL ,
  `Best_T3_Grades_ID` INT NOT NULL ,
  `Control_Number` VARCHAR(45) NULL ,
  `User_Name` VARCHAR(45) NULL ,
  `T3_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,
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
  `Adept_T3_Grades_ID` INT NOT NULL ,
  `Adept_T3_Attendance_ID` INT NOT NULL ,
  `T3_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,
  `Control_Number` VARCHAR(45) NULL ,
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
  `T3_Tracker_ID` INT NOT NULL AUTO_INCREMENT ,
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
  `Name_Suffix` VARCHAR(5) NOT NULL ,
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
  `Own_A_Compter?` TINYINT(1) NOT NULL DEFAULT 0 ,
  `Internet_Access?` TINYINT(1) NOT NULL DEFAULT 0 ,
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
  `Contol_Number` VARCHAR(45) NULL ,
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
  `Control_Number` VARCHAR(45) NULL ,
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
  `Student_Class_Student_Class_ID` INT NOT NULL AUTO_INCREMENT ,
  `SMP_Student_Tracker_Tracker_ID` INT NOT NULL ,
  `SMP_Student_Courses_Taken_ID` VARCHAR(45) NOT NULL ,
  INDEX `fk_SMP_Student_Courses_Taken_Student_Class1` (`Student_Class_Student_Class_ID` ASC) ,
  INDEX `fk_SMP_Student_Courses_Taken_SMP_Student1` (`SMP_Student_Tracker_Tracker_ID` ASC) ,
  UNIQUE INDEX `Student_Class_Student_Class_ID_UNIQUE` (`Student_Class_Student_Class_ID` ASC) ,
  PRIMARY KEY (`SMP_Student_Courses_Taken_ID`) ,
  CONSTRAINT `fk_SMP_Student_Courses_Taken_Student_Class1`
    FOREIGN KEY (`Student_Class_Student_Class_ID` )
    REFERENCES `crisp`.`Student_Class` (`Student_Class_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SMP_Student_Courses_Taken_SMP_Student1`
    FOREIGN KEY (`SMP_Student_Tracker_Tracker_ID` )
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
  `T3_Tracker_Teacher_Tracker_ID` INT NOT NULL ,
  `Teacher_Teacher_ID` INT NOT NULL ,
  PRIMARY KEY (`Teacher_T3_Tracker_ID`) ,
  INDEX `fk_Teacher_T3_Tracker_T3_Tracker1` (`T3_Tracker_Teacher_Tracker_ID` ASC) ,
  INDEX `fk_Teacher_T3_Tracker_Teacher1` (`Teacher_Teacher_ID` ASC) ,
  UNIQUE INDEX `Teacher_T3_Tracker_ID_UNIQUE` (`Teacher_T3_Tracker_ID` ASC) ,
  CONSTRAINT `fk_Teacher_T3_Tracker_T3_Tracker1`
    FOREIGN KEY (`T3_Tracker_Teacher_Tracker_ID` )
    REFERENCES `crisp`.`T3_Tracker` (`T3_Tracker_ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Teacher_T3_Tracker_Teacher1`
    FOREIGN KEY (`Teacher_Teacher_ID` )
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
  `Name_Suffix` VARCHAR(4) NOT NULL ,
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
  `Name_Suffix` VARCHAR(4) NOT NULL ,
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
  `Proctor_ID` INT NOT NULL ,
  `Class_ID` INT NOT NULL AUTO_INCREMENT ,
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
-- Table `crisp`.`Proctor_copy1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `crisp`.`Proctor_copy1` ;

CREATE  TABLE IF NOT EXISTS `crisp`.`Proctor_copy1` (
  `Proctor_ID` INT NOT NULL ,
  `First_Name` VARCHAR(45) NULL ,
  `Middle_Initial` VARCHAR(3) NULL ,
  `Last_Name` VARCHAR(45) NULL ,
  `Name_Suffix` VARCHAR(4) NULL ,
  `Company_Name` VARCHAR(45) NULL ,
  `Company_Address` VARCHAR(255) NULL ,
  `Position` VARCHAR(45) NULL ,
  `Email` VARCHAR(45) NULL ,
  `Facebook` VARCHAR(45) NULL ,
  `Landline_Number` VARCHAR(45) NULL ,
  `Mobile_Number` VARCHAR(45) NULL ,
  `Gender` CHAR NULL ,
  `Civil_Status` VARCHAR(9) NULL ,
  PRIMARY KEY (`Proctor_ID`) )
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
  `Teacher_ID` INT NOT NULL ,
  `T3_Application_ID` INT NOT NULL ,
  `Teacher_T3_Application_ID` INT NOT NULL AUTO_INCREMENT ,
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
  `type` VARCHAR(255) NOT NULL
  )
ENGINE = InnoDB;


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
