DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Owners;
DROP TABLE IF EXISTS Tourists;
DROP TABLE IF EXISTS Properties;
DROP TABLE IF EXISTS Messages;
DROP TABLE IF EXISTS Reservations;
DROP TABLE IF EXISTS Photos;

CREATE TABLE Users
(
    id INTEGER PRIMARY KEY,
    username VARCHAR NOT NULL UNIQUE,
    email VARCHAR NOT NULL UNIQUE,
    password VARCHAR NOT NULL,
    name VARCHAR NOT NULL,
    gender CHAR NOT NULL CHECK(userGender = 'M' OR userGender = 'F' OR userGender = 'O'),
    birthDate DATE NOT NULL,
    profilePicture VARCHAR
);

CREATE TABLE Owners
(
    id INTEGER PRIMARY KEY REFERENCES Users
);

CREATE TABLE Tourists
(
    id INTEGER PRIMARY KEY REFERENCES Users
);

CREATE TABLE Properties
(
    id INTEGER PRIMARY KEY,
    price FLOAT NOT NULL,
    title VARCHAR NOT NULL,
    location VARCHAR NOT NULL,
    description VARCHAR NOT NULL,
    ownerID INTEGER NOT NULL REFERENCES Owners
);

CREATE TABLE Messages
(
    id INTEGER PRIMARY KEY,
    text VARCHAR NOT NULL,

);

CREATE TABLE Reservations
(
    id INTEGER PRIMARY KEY,
    startDate DATE NOT NULL,
    endDate DATE NOT NULL,
    price FLOAT NOT NULL,
    touristComment VARCHAR NOT NULL,
    touristRating VARCHAR NOT NULL,
    ownwerComment VARCHAR NOT NULL,
    ownerRating VARCHAR NOT NULL
);

CREATE TABLE Photos
(
    id INTEGER PRIMARY KEY,
    description VARCHAR NOT NULL
);
