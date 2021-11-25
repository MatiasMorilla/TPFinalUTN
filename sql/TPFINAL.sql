CREATE DATABASE TPFINAL;
USE TPFINAL;

CREATE TABLE CAREERS(
	IdCareer INT NOT NULL,
    IsActive BOOLEAN NOT NULL,
    DescriptionCareer VARCHAR(300) NOT NULL,
    CONSTRAINT pk_Career primary key (IdCareer)
);

CREATE TABLE POSITIONS (
	IdPosition INT NOT NULL,
    Position varchar(50) NOT NULL,
    CONSTRAINT pk_IdPosition primary key (IdPosition)
);

CREATE TABLE JOBS(
	IdJobOffer INT NOT NULL auto_increment,
	IdPosition INT NOT NULL,
    IdCareer INT NOT NULL,
    NameCompany VARCHAR(40) NOT NULL,
    JobPosition VARCHAR(30),
    JobDescription VARCHAR(300),
    JobBenefits VARCHAR(300),
    JobRequirements VARCHAR(300),
    JobDate DATE,
    CONSTRAINT pk_Job primary key (IdJobOffer),
    CONSTRAINT fk_Company FOREIGN KEY (NameCompany) references COMPANIES (CompanyName)
);

drop table JOBS;
select * from JOBS;
delete FROM JOBS WHERE JOBS.IdJobOffer = 2;
drop table REQUIREMENTS;

CREATE TABLE ROLES(
	idRol INT NOT NULL auto_increment,
    rol VARCHAR(20) NOT NULL,
    CONSTRAINT pk_idRol primary key(idRol)
);

INSERT INTO ROLES(rol) VALUES("Estudiante"),( "Admin");
SELECT * FROM ROLES;

CREATE TABLE USERS(
	idUser INT NOT NULL auto_increment,
	email VARCHAR(40) NOT NULL,
    password VARCHAR(40) NOT NULL,
    idRol INT NOT NULL,
    CONSTRAINT pk_idUser primary key(idUser),
    CONSTRAINT fk_idRol foreign key(idRol) references ROLES(idRol),
    CONSTRAINT unq_email UNIQUE(email)
);

SELECT * FROM USERS;
INSERT INTO USERS(email, password, idRol) VALUEs("admin@utn.com", "12345", "2");
DELETE FROM USERS WHERE USERS.idUser = "3";

CREATE TABLE COMPANIES(
    CompanyName VARCHAR(40) NOT NULL,
    Cuil INT NOT NULL ,
    IdUser int not null,
    Address VARCHAR(50) NOT NULL,
    PhoneNumber VARCHAR(30) NOT NULL,
    Email VARCHAR(50) NOT NULL ,
    CONSTRAINT pk_Company primary key (CompanyName),
    CONSTRAINT UNQ_Cuil_Email UNIQUE(Cuil,Email),
	CONSTRAINT fk_idUser_company foreign key (IdUser) references USERS(IdUser)
);

insert into COMPANIES value("Accenture", 123456, "Inependencia 4300", "22354678", "accenture@accenture.com");
select * from COMPANIES;

drop table COMPANIES;


CREATE TABLE STUDENTS(
	dni varchar(50) NOT NULL,
    fileNumber varchar(50),
    idUser INT NOT NULL,
    studyStatus VARCHAR(20) NOT NULL,
    name VARCHAR(40) NOT NULL,
    lastName VARCHAR(40) NOT NULL,
    gender VARCHAR(20) NOT NULL,
    birthDate DATE NOT NULL,
    phoneNumber VARCHAR(30) NOT NULL,
    career varchar(50) NOT NULL,
    CONSTRAINT pk_STUDENT primary key (fileNumber),
    CONSTRAINT fk_idUser foreign key(idUser) references USERS(idUser),
    CONSTRAINT UNQ_Dni UNIQUE(dni)
);

CREATE TABLE ADMINS(
	dni varchar(50) NOT NULL,
    idUser INT NOT NULL,
    name VARCHAR(40) NOT NULL,
    lastName VARCHAR(40) NOT NULL,
    gender VARCHAR(20) NOT NULL,
    birthDate DATE NOT NULL,
    phoneNumber VARCHAR(30) NOT NULL,
    CONSTRAINT pk_Admin primary key (dni),
    CONSTRAINT fk_idUser_admin foreign key(idUser) references USERS(idUser)
);


drop table STUDENTS;
SELECT * FROM STUDENTS;

/*CREATE TABLE STUDENT_X_CAREER(
	IdStudent INT NOT NULL,
    IdCareer INT NOT NULL,
	CONSTRAINT fk_IdCareer_X_Student FOREIGN KEY (IdCareer) references CAREERS (IdCareer),
	CONSTRAINT fk_IdStudent_X_Career FOREIGN KEY (IdStudent) references STUDENTS (FileNumber),
    CONSTRAINT pk_Student_X_Career primary key (IdStudent,IdCareer)
);*/

CREATE TABLE APLICANTS(
	IdStudent varchar(50) NOT NULL,
    IdJobOffer INT NOT NULL,
    CV MEDIUMBLOB NOT NULL,
    AplicantDescription varchar(300) NOT NULL,
    AplicantDate date NOT NULL,
    CONSTRAINT pk_IdStudent_IdJobOffer primary key(IdStudent, IdJobOffer),
    CONSTRAINT fk_IdStudent_ap foreign key(IdStudent) references STUDENTS(fileNumber),
	CONSTRAINT fk_IdJobOffer_ap foreign key(IdJobOffer) references JOBS(IdJobOffer) ON DELETE CASCADE
);

show tables;
drop table APLICANTS;
select * from APLICANTS;
DELETE FROM APLICANTS WHERE APLICANTS.IdStudent = "1";

select * from COMPANIES where COMPANIES.CompanyName = "Accenture";
update COMPANIES SET PhoneNumber = "2235024545" where COMPANIES.CompanyName = "Globant";

UPDATE JOBS SET JobDescription = "no vas a hcer nada" WHERE JOBS.IdPosition = 5;

select * from STUDENTS WHERE STUDENTS.FileNumber = "54-465-2736";
SELECT * FROM JOBS WHERE JOBS.JobPosition = 'Jr naval engineer';
UPDATE STUDENTS SET password = '123456' WHERE STUDENTS.email = "ddouthwaite0@goo.gl";