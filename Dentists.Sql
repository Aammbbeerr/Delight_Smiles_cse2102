Create Table Dentists
(
	id int(7) NOT NULL auto_increment,
	firstName varchar(15) NOT NULL,
	lastName  varchar(15) NOT NULL,
	sex char(1),
	note varchar(100),
	PRIMARY KEY(id)
);