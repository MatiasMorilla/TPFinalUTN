CREATE DATABASE TPFINAL;
USE TPFINAL;

CREATE TABLE COMPANIES(
    CompanyName VARCHAR(40) NOT NULL,
    Cuil INT NOT NULL ,
    Address VARCHAR(50) NOT NULL,
    PhoneNumber VARCHAR(30) NOT NULL,
    Email VARCHAR(50) NOT NULL ,
    CONSTRAINT pk_Company primary key (CompanyName),
    CONSTRAINT UNQ_Cuil_Email UNIQUE(Cuil,Email)
);

insert into COMPANIES value("Accenture", 123456, "Inependencia 4300", "22354678", "accenture@accenture.com");
select * from COMPANIES;

drop table COMPANIES;

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


drop table REQUIREMENTS;

CREATE TABLE STUDENTS(
	dni INT,
    fileNumber INT,
    studyStatus VARCHAR(20) NOT NULL,
    email VARCHAR(40) NOT NULL,
    password VARCHAR(40) NOT NULL,
    name VARCHAR(40) NOT NULL,
    lastName VARCHAR(40) NOT NULL,
    gender VARCHAR(20) NOT NULL,
    birthDate DATETIME NOT NULL,
    phoneNumber VARCHAR(30) NOT NULL,
    career varchar(50) NOT NULL,
    CONSTRAINT pk_STUDENT primary key (fileNumber),
    CONSTRAINT UNQ_StudentEmail UNIQUE(email),
    CONSTRAINT UNQ_Dni UNIQUE(dni)
);


drop table STUDENTS;

/*CREATE TABLE STUDENT_X_CAREER(
	IdStudent INT NOT NULL,
    IdCareer INT NOT NULL,
	CONSTRAINT fk_IdCareer_X_Student FOREIGN KEY (IdCareer) references CAREERS (IdCareer),
	CONSTRAINT fk_IdStudent_X_Career FOREIGN KEY (IdStudent) references STUDENTS (FileNumber),
    CONSTRAINT pk_Student_X_Career primary key (IdStudent,IdCareer)
);*/

CREATE TABLE APLICANTS(
	IdStudent INT NOT NULL,
    IdJobOffer INT NOT NULL,
    CV MEDIUMBLOB NOT NULL,
    AplicantDescription varchar(300) NOT NULL,
    AplicantDate datetime NOT NULL,
    CONSTRAINT pk_IdStudent_IdJobOffer primary key(IdStudent, IdJobOffer),
    CONSTRAINT fk_IdStudent_ap foreign key(IdStudent) references STUDENTS(FileNumber),
	CONSTRAINT fk_IdJobOffer_ap foreign key(IdJobOffer) references JOBS(IdJobOffer)
);

show tables;
drop table APLICANTS;

select * from COMPANIES where COMPANIES.CompanyName = "Accenture";
update COMPANIES SET PhoneNumber = "2235024545" where COMPANIES.CompanyName = "Globant";


UPDATE JOBS SET JobDescription = "no vas a hcer nada" WHERE JOBS.IdPosition = 5;