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
	Dni INT,
    FileNumber INT,
    StudyStatus VARCHAR(20) NOT NULL,
    StudentEmail VARCHAR(40) NOT NULL,
    StudentPassword VARCHAR(40) NOT NULL,
    FirstName VARCHAR(40) NOT NULL,
    LastName VARCHAR(40) NOT NULL,
    Gender VARCHAR(20) NOT NULL,
    BirthDate DATETIME NOT NULL,
    PhoneNumber VARCHAR(30) NOT NULL,
    CONSTRAINT pk_STUDENT primary key (FileNumber),
    CONSTRAINT UNQ_StudentEmail UNIQUE(StudentEmail),
    CONSTRAINT UNQ_Dni UNIQUE(Dni)
);



CREATE TABLE STUDENT_X_CAREER(
	IdStudent INT NOT NULL,
    IdCareer INT NOT NULL,
	CONSTRAINT fk_IdCareer_X_Student FOREIGN KEY (IdCareer) references CAREERS (IdCareer),
	CONSTRAINT fk_IdStudent_X_Career FOREIGN KEY (IdStudent) references STUDENTS (FileNumber),
    CONSTRAINT pk_Student_X_Career primary key (IdStudent,IdCareer)
);

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
