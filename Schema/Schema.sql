CREATE DATABASE TPFinalLab4;

USE TPFinalLab4;

CREATE TABLE companies
(
    idCompany INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    cuit VARCHAR(100) NOT NULL,
    location VARCHAR(100) NOT NULL,
    phoneNumber int(100) NOT NULL,

    CONSTRAINT pk_id_company PRIMARY KEY (idCompany)
);

CREATE TABLE students
(
    studentId INT NOT NULL AUTO_INCREMENT,
    careerId INT NOT NULL,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    dni VARCHAR(20) NOT NULL,
    fileNumber VARCHAR(20) NOT NULL,
    gender VARCHAR(20) NOT NULL,
    birthDate date NOT NULL,
    email VARCHAR(30) NOT NULL,
    phoneNumber VARCHAR(20),
    active boolean,

    CONSTRAINT pk_student_id PRIMARY KEY (studentId)
);