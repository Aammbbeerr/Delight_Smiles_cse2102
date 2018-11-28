-- source code
CREATE DATABASE IF NOT EXISTS lcd_dental_record;

USE lcd_dental_record;

CREATE TABLE `lcd_dental_record`.`patient` ( 
	`Patient_ID` INT(7) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`First_Name` VARCHAR(15) NOT NULL,
	`Last_Name` VARCHAR(15) NOT NULL,
	`Date_of_Birth` DATE NOT NULL,
	`Sex` CHAR(1) NOT NULL,
	`Address` VARCHAR(120) NOT NULL,
	`Teeth_Number` INT(7) NOT NULL,
	`Note` VARCHAR(100) NULL ) ENGINE=InnoDB;

CREATE TABLE `lcd_dental_record`.`dentist` ( 
	`Dentist_ID` INT(7) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`First_Name` VARCHAR(15) NOT NULL,
	`Last_Name` VARCHAR(15) NOT NULL,
	`Sex` CHAR(1) NOT NULL,
	`Note` VARCHAR(100) NULL ) ENGINE=InnoDB; 

CREATE TABLE `lcd_dental_record`.`teeth` ( 
	`Teeth_ID` INT(7) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`Number_of_Anesthesia` INT(1) NULL ) ENGINE=InnoDB;

CREATE TABLE `lcd_dental_record`.`users` ( 
	`id` INT(7) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	`name` VARCHAR(40) NOT NULL, 
	`username` VARCHAR(20) NOT NULL, 
	`password` VARCHAR(100) NOT NULL, 
	`type` VARCHAR(20) NOT NULL ) ENGINE=InnoDB;
