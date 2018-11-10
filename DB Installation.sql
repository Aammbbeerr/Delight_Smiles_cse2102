-- source code
CREATE DATABASE IF NOT EXISTS lcd_dental_record;

USE lcd_dental_record;

CREATE TABLE `lcd_dental_record`.`Patient` ( 
	`Patient ID` INT(7) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`First Name` VARCHAR(15) NOT NULL,
	`Last Name` VARCHAR(15) NOT NULL,
	`Date of Birth` DATE NOT NULL,
	`Sex` CHAR(1) NOT NULL,
	`Address` VARCHAR(120) NOT NULL,
	`Teeth Number` INT(7) NOT NULL,
	`Note` VARCHAR(100) NULL );

CREATE TABLE `lcd_dental_record`.`Dentist` ( 
	`Dentist ID` INT(7) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`First Name` VARCHAR(15) NOT NULL,
	`Last Name` VARCHAR(15) NOT NULL,
	`Sex` CHAR(1) NOT NULL,
	`Note` VARCHAR(100) NULL ); 

CREATE TABLE `lcd_dental_record`.`Teeth` ( 
	`Teeth ID` INT(7) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`Number of Anesthesia` INT(1) NULL );