CREATE DATABASE TPFinalLab4;

USE TPFinalLab4;

CREATE TABLE cities
(
    zipCode INT NOT NULL,
    cityName VARCHAR(50) NOT NULL,
    location VARCHAR(50) NOT NULL,

    CONSTRAINT pk_zip_code PRIMARY KEY (zipCode)
);

INSERT INTO cities (zipCode, cityName, location) VALUES 
(7600, 'Mar del Plata', 'Buenos Aires'), 
(2000, 'Rosario', 'Santa Fe'), 
(4000, 'San Miguel de Tucuman', 'Tucuman'), 
(1878, 'Quilmes', 'Buenos Aires'),
(1629, 'Pilar', 'Buenos Aires'),
(1708, 'Moron', 'Buenos Aires');

CREATE TABLE companies
(
    companyId INT NOT NULL AUTO_INCREMENT,
    zipCode INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    cuit VARCHAR(20) NOT NULL,
    location VARCHAR(50) NOT NULL,
    phoneNumber VARCHAR(20) NOT NULL,

    CONSTRAINT pk_company_id PRIMARY KEY (companyId),
    CONSTRAINT fk_zip_code FOREIGN KEY (zipCode) REFERENCES cities (zipCode),
    CONSTRAINT unq_company_cuit UNIQUE (cuit)
);

INSERT INTO companies (zipCode, name, cuit, location, phoneNumber) VALUES (7600, 'Globant', '30-458778-9', 'Mar del Plata', '223-636-2356'), (7600, 'Infosys', '30-666128-9', 'Mar del Plata', '223-636-9999'), (7600, 'Toledo', '32-258778-9', 'Mar del Plata', '223-625-2756');

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
    active boolean DEFAULT 1,

    CONSTRAINT pk_student_id PRIMARY KEY (studentId),
    CONSTRAINT unq_email_student UNIQUE (email),
    CONSTRAINT unq_dni_student UNIQUE (dni),
    CONSTRAINT unq_file_number_student UNIQUE (fileNumber)
);

CREATE TABLE admins
(
    adminId INT NOT NULL AUTO_INCREMENT,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    dni VARCHAR(20) NOT NULL,
    email VARCHAR(30) NOT NULL,

    CONSTRAINT pk_admin_id PRIMARY KEY (adminId),
    CONSTRAINT unq_email_admin UNIQUE (email),
    CONSTRAINT unq_dni_admin UNIQUE (dni)
);

INSERT INTO admins (firstName, lastName, dni, email) VALUES 
('Martin', 'Gallo', '40-568-4785', 'martin833@gmail.com'), 
('Yani', 'Pontoni', '87-548-4722', 'yani.pontoni@gmail.com'), 
('Diego', 'Arzondo', '12-148-4757', 'eldiegote2021@gmail.com');

CREATE TABLE careers
(
    careerId INT NOT NULL AUTO_INCREMENT,
    description VARCHAR(100) NOT NULL,
    active boolean DEFAULT 1,

    CONSTRAINT pk_career_id PRIMARY KEY (careerId)
);

CREATE TABLE jobPositions
(
    jobPositionId INT NOT NULL AUTO_INCREMENT,
    careerId INT NOT NULL,
    description VARCHAR(100) NOT NULL,

    CONSTRAINT pk_jobPosition_id PRIMARY KEY (jobPositionId),
    CONSTRAINT fk_career_id FOREIGN KEY (careerId) REFERENCES careers (careerId)
);

CREATE TABLE jobOffers
(
    jobOfferId INT NOT NULL AUTO_INCREMENT,
    jobPosition INT NOT NULL,
    careerId INT NOT NULL,
    company VARCHAR(50) NOT NULL,
    salary FLOAT,
    isRemote BOOLEAN,
    description VARCHAR(200) NOT NULL,
    skills VARCHAR(100) NOT NULL,
    startingDate DATE NOT NULL,
    endingDate DATE NOT NULL,
    active BOOLEAN,

    CONSTRAINT pk_jobOffers_id PRIMARY KEY (jobOfferId),
    CONSTRAINT fk_jobPosition_id FOREIGN KEY (jobPosition) REFERENCES jobPositions (jobPositionId)
);