CREATE DATABASE IF NOT EXISTS lcd_dental_record;

USE lcd_dental_record;


CREATE TABLE `lcd_dental_record`.`users` ( 
	`id` INT(7) NOT NULL AUTO_INCREMENT, 
	`name` VARCHAR(40) NOT NULL, 
	`username` VARCHAR(20) NOT NULL, 
	`password` VARCHAR(100) NOT NULL, 
	`type` VARCHAR(20) NOT NULL, 
	PRIMARY KEY (`id`)
) ENGINE = MyISAM;

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'Mrs. Shavannie Persaud', 'SPersaud', 'abc123', 'admin');
