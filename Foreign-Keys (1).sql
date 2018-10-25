Alter table Patients
ADD FOREIGN KEY (Teeth Id) REFERENCES  Teeth (id);

Alter table Removes
ADD FOREIGN KEY (Patient ID) REFERENCES Patients(id),
ADD FOREIGN KEY (Teeth ID) REFERENCES Teeth (id),
ADD FOREIGN KEY (Dentist ID) REFRENCES 	Dentists(id);