CREATE DATABASE TPFINAL;
USE TPFINAL;

CREATE TABLE BENEFITS(
	IdBenefit INT AUTO_INCREMENT,
    DescriptionBenefit varchar(300) NOT NULL,
    CONSTRAINT pk_Benefit primary key (IdBenefit)
);

CREATE TABLE REQUIREMENTS(
	IdRequirement INT AUTO_INCREMENT,
    DescriptionRequirement VARCHAR(300) NOT NULL,
    CONSTRAINT pk_Requirement primary key (IdRequirement)
);

CREATE TABLE COMPANIES(
	IdCompany INT AUTO_INCREMENT,
    CompanyName VARCHAR(40) NOT NULL,
    Cuil INT NOT NULL ,
    Address VARCHAR(50) NOT NULL,
    PhoneNumber VARCHAR(30) NOT NULL,
    Email VARCHAR(50) NOT NULL ,
    CONSTRAINT pk_Company primary key (IdCompany),
    CONSTRAINT UNQ_Cuil_Email UNIQUE(Cuil,Email)
);

CREATE TABLE CAREERS(
	IdCareer INT NOT NULL,
    IsActive BOOLEAN NOT NULL,
    DescriptionCareer VARCHAR(300) NOT NULL,
    CONSTRAINT pk_Career primary key (IdCareer)
);

CREATE TABLE JOBS(
	IdPosition INT NOT NULL,
    IdCareer INT NOT NULL,
    IdCompany INT NOT NULL,
    JobPosition VARCHAR(30),
    JobDescription VARCHAR(300),
    JobDate DATETIME,
    CONSTRAINT pk_Job primary key (IdPosition),
    CONSTRAINT fk_Career FOREIGN KEY (IdCareer) references CAREERS (IdCareer),
    CONSTRAINT fk_Company FOREIGN KEY (IdCompany) references COMPANIES (IdCompany)
);

CREATE TABLE BENEFITS_X_JOBS(
	IdBenefit INT NOT NULL,
    IdPosition INT NOT NULL,
	CONSTRAINT fk_Benefit FOREIGN KEY (IdBenefit) references BENEFITS (IdBenefit),
    CONSTRAINT fk_Job FOREIGN KEY (IdPosition) references JOBS (IdPosition),
    CONSTRAINT pk_Benefit_Position primary key (IdPosition,IdBenefit)
);

CREATE TABLE REQUIREMENTS_X_JOBS(
	IdRequirement INT NOT NULL,
    IdPosition INT NOT NULL,
	CONSTRAINT fk_Requirement FOREIGN KEY (IdRequirement) references REQUIREMENTS (IdRequirement),
    CONSTRAINT fk_Job FOREIGN KEY (IdPosition) references JOBS (IdPosition),
    CONSTRAINT pk_Requirement_Position primary key (IdPosition,IdRequirement)
);


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
    IdPosition INT,
	CONSTRAINT fk_Student_Position FOREIGN KEY (IdPosition) references JOBS (IdPosition),
    CONSTRAINT pk_STUDENT primary key (Dni,FileNumber),
    CONSTRAINT UNQ_StudentEmail UNIQUE(Email)
);

CREATE TABLE STUDENT_X_CAREER(
	IdStudent INT NOT NULL,
    IdCareer INT NOT NULL,
	CONSTRAINT fk_IdCareer_X_Student FOREIGN KEY (IdCareer) references CAREERS (IdCareer),
	CONSTRAINT fk_IdStudent_X_Career FOREIGN KEY (IdStudent) references STUDENTS (IdStudent),
    CONSTRAINT pk_Student_X_Career primary key (IdStudent,IdCareer)
);