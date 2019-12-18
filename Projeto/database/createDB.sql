--
-- File generated with SQLiteStudio v3.2.1 on Wed Dec 18 12:37:31 2019
--
-- Text encoding used: UTF-8
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: Comments
DROP TABLE IF EXISTS Comments;

CREATE TABLE Comments (
    id         INTEGER PRIMARY KEY,
    text       VARCHAR NOT NULL,
    rating     INTEGER CHECK (rating >= 0 AND 
                              rating <= 5) 
                       NOT NULL,
    propertyID INTEGER NOT NULL,
    touristID  INTEGER NOT NULL
);


-- Table: Owners
DROP TABLE IF EXISTS Owners;

CREATE TABLE Owners (
    id INTEGER PRIMARY KEY
);

INSERT INTO Owners (id) VALUES (1);
INSERT INTO Owners (id) VALUES (2);
INSERT INTO Owners (id) VALUES (3);
INSERT INTO Owners (id) VALUES (4);

-- Table: Photos
DROP TABLE IF EXISTS Photos;

CREATE TABLE Photos (
    id          INTEGER PRIMARY KEY,
    description VARCHAR NOT NULL,
    propertyID  INTEGER,
    path        TEXT    NOT NULL
);

INSERT INTO Photos (id, description, propertyID, path) VALUES (1, 'Living Room', 1, '30aa4c6fa8249b9d8e3ab0954c443f2f0a92ec79.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (2, 'Bedroom', 1, '7decab1e2fd610fad0b85ac70d214143937dedd3.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (3, 'Kitchen', 1, '98304c010b0c4a8ae7d3bce58b80126a15b375a3.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (4, 'Garden', 5, '87ef72c4943cab1a15dcf73b4e6642b7335c8158.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (5, 'Bedroom', 5, '0675a2ad891f8814846931458b95004c37d1b855.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (6, 'Living Room', 5, '02e2c7887ddd1ae783ba24dba95ade15c2dc0dec.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (7, 'Kitchen', 3, '0969d0da5d8d1bc7ef93d52a8c81f3aef79677f6.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (8, 'Living Room', 3, 'd178e9652bac44f834c9446698b82c10019ecbbe.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (9, 'Bedroom', 3, '637f994ad2e7cf948ac9d6e4acd23b688d4705c4.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (10, 'Bedroom', 4, 'd74e80e1312ee7b55eac9f3e9816670511c0585b.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (11, 'Kitchen', 4, '2e8c602af5ddb4f72e20d7c532b9577ecea50d66.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (12, 'Living Room', 4, '85db0aedfbc8b50dd4fe40def5b60124708b1b03.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (13, 'Skylight', 2, 'f092f7491f15ec2b5199dbdc3187ca76fb1cbf70.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (14, 'Bedroom', 2, '1bb6dbdca449efac35a6f2aff38f321bb2166e84.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (15, 'Living Room', 2, '69f74787ee1c561894d6e01563c5ae2cf9656c28.jpg');

-- Table: Properties
DROP TABLE IF EXISTS Properties;

CREATE TABLE Properties (
    id                INTEGER PRIMARY KEY,
    ownerID           INTEGER NOT NULL,
    price             FLOAT   NOT NULL,
    title             VARCHAR NOT NULL,
    location          VARCHAR NOT NULL,
    description       VARCHAR NOT NULL,
    availabilityStart DATE,
    availabilityEnd   DATE
);

INSERT INTO Properties (id, ownerID, price, title, location, description, availabilityStart, availabilityEnd) VALUES (1, 4, 30.0, 'Downtown Apartment', 'Porto', '3 Rooms', '2019-12-25', '2020-12-31');
INSERT INTO Properties (id, ownerID, price, title, location, description, availabilityStart, availabilityEnd) VALUES (2, 1, 43.0, 'Ribeira Vintage', 'Porto', '1 Room', '2020-01-01', '2020-12-31');
INSERT INTO Properties (id, ownerID, price, title, location, description, availabilityStart, availabilityEnd) VALUES (3, 3, 97.0, 'Infante Apartment', 'Porto', '2 Rooms', '2020-02-01', '2020-12-31');
INSERT INTO Properties (id, ownerID, price, title, location, description, availabilityStart, availabilityEnd) VALUES (4, 2, 102.0, 'Charming Loft', 'Gaia', '2 Rooms', '2020-01-01', '2020-07-31');
INSERT INTO Properties (id, ownerID, price, title, location, description, availabilityStart, availabilityEnd) VALUES (5, 2, 70.0, 'Studio Garden', 'Gaia', '1 Room', '2020-05-01', '2020-06-31');

-- Table: Reservations
DROP TABLE IF EXISTS Reservations;

CREATE TABLE Reservations (
    id         INTEGER PRIMARY KEY,
    touristID  INTEGER,
    propertyID INTEGER,
    startDate  DATE    NOT NULL,
    endDate    DATE    NOT NULL,
    price      FLOAT   NOT NULL
);

INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price) VALUES (1, 4, 3, '22/01/2019', '24/01/2019', 194.0);
INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price) VALUES (2, 2, 1, '22/07/2019', '30/07/2019', 240.0);
INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price) VALUES (4, 3, 4, '17/04/2019', '22/05/2019', 510.0);
INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price) VALUES (5, 2, 4, '2020-01-01', '2020-01-15', 1428.0);

-- Table: Tourists
DROP TABLE IF EXISTS Tourists;

CREATE TABLE Tourists (
    id INTEGER PRIMARY KEY
);

INSERT INTO Tourists (id) VALUES (1);
INSERT INTO Tourists (id) VALUES (2);
INSERT INTO Tourists (id) VALUES (3);
INSERT INTO Tourists (id) VALUES (5);

-- Table: Users
DROP TABLE IF EXISTS Users;

CREATE TABLE Users (
    id             INTEGER PRIMARY KEY,
    username       VARCHAR NOT NULL
                           UNIQUE,
    email          VARCHAR NOT NULL
                           UNIQUE,
    password       VARCHAR NOT NULL,
    name           VARCHAR NOT NULL,
    profilePicture TEXT
);

INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (1, 'admin', 'admin@fe.up.pt', '$2y$12$XyUbUN0YHX1p0dKn.uFyqeCouwja7Kaj7mWUGPWNL8FQT2gZAFdhW', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997.jpg');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (2, 'mpinho', 'mpinho@feup.pt', '$2y$12$8d1DDkLNFqW9qKnxyn8vVuZOfMmHB7OtMeDoodaNFYgZ6kitwjLOK', 'Muriel Pinho', '5c54bbe60aaf5ef4114e5fa836209fed8ce267a4.jpg');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (3, 'ranheri', 'ranheri@fe.up.pt', '$2y$12$1x1q20CBxWmHgkVYVDfxnO5F52cjSgCZ9v/kwox5wTBex/JA52ED2', 'Fellipe Ranheri', '87342972dac088c03b07765112d6a0185afba745.jpg');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (4, 'brandao', 'jbrandao@fe.up.pt', '$2y$12$BZTLahoFcqoqaC/eY2/Cx.9jGNIayj/EJ176nZEsYH.gHl4MMAO.O', 'Joao Brandao', '8e87a2ff3f3506026253fdd68bd03d38e70c148e.jpg');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (5, 'tourist', 'tourist@gmail.com', '$2y$12$G05rwMiIVFNf5K0oyZvEfOtxxY0RNpfHnXqpC6JfILzAHxu5wjuTm', 'tourist', '3f2c9248ee951c2d98a3cd5b4af06bd317db2124.jpg');

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
