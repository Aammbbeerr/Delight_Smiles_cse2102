--Queries for data retrieval (Read):
	SELECT * FROM Patient;
	SELECT * FROM Dentist;
	SELECT * FROM Teeth;
	SELECT * FROM Dentist WHERE Dentist ID = 3;
	SELECT * FROM Patient WHERE Sex = 'M';
	SELECT * FROM Patient WHERE First Name LIKE 'A%';
	SELECT COUNT(1) FROM Patient; 