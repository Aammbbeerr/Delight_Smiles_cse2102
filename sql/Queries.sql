--Queries for data retrieval (Read):
	SELECT * FROM patient;
	SELECT * FROM dentist;
	SELECT * FROM teeth;
	SELECT * FROM dentist WHERE Dentist_ID = 3;
	SELECT * FROM patient WHERE Sex = 'M';
	SELECT * FROM patient WHERE First_Name LIKE 'A%';
	SELECT COUNT(1) FROM patient; 
