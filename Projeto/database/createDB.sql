--
-- File generated with SQLiteStudio v3.2.1 on Mon Dec 16 23:41:29 2019
--
-- Text encoding used: UTF-8
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: Messages
DROP TABLE IF EXISTS Messages;

CREATE TABLE Messages (
    id                INTEGER PRIMARY KEY,
    text              VARCHAR NOT NULL,
    propertyID        INTEGER REFERENCES Properties (id) ON UPDATE CASCADE,
    touristID         INTEGER REFERENCES Tourists (id) ON UPDATE CASCADE,
    senderUsername    VARCHAR,
    recipientUsername VARCHAR
);

INSERT INTO Messages (id, text, propertyID, touristID, senderUsername, recipientUsername) VALUES (1, 'Is the house dog friendly?', 4, 3, 'tourist', 'mpinho');
INSERT INTO Messages (id, text, propertyID, touristID, senderUsername, recipientUsername) VALUES (2, 'How many beds are available?', 1, 5, 'tourist', 'brandao');

-- Table: Owners
DROP TABLE IF EXISTS Owners;

CREATE TABLE Owners (
    id INTEGER PRIMARY KEY
             REFERENCES Users (id) ON UPDATE CASCADE
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
    propertyID  INTEGER REFERENCES Properties (id) ON UPDATE CASCADE,
    path        TEXT    NOT NULL
);

INSERT INTO Photos (id, description, propertyID, path) VALUES (1, 'Living Room', 1, 'downtown1.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (2, 'Bedroom', 1, 'downtown2.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (3, 'Kitchen', 1, 'downtown3.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (4, 'Garden', 5, 'garden1.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (5, 'Bedroom', 5, 'garden2.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (6, 'Living Room', 5, 'garden3.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (7, 'Kitchen', 3, 'infante1.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (8, 'Living Room', 3, 'infante2.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (9, 'Bedroom', 3, 'infante3.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (10, 'Bedroom', 4, 'loft1.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (11, 'Kitchen', 4, 'loft2.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (12, 'Living Room', 4, 'loft3.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (13, 'Skylight', 2, 'ribeira1.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (14, 'Bedroom', 2, 'ribeira2.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (15, 'Living Room', 2, 'ribeira3.jpg');

-- Table: Properties
DROP TABLE IF EXISTS Properties;

CREATE TABLE Properties (
    id                INTEGER PRIMARY KEY,
    ownerID           INTEGER NOT NULL
                              REFERENCES Owners (id) ON UPDATE CASCADE,
    price             FLOAT   NOT NULL,
    title             VARCHAR NOT NULL,
    location          VARCHAR NOT NULL,
    description       VARCHAR NOT NULL,
    availabilityEnd   DATE,
    availabilityStart DATE
);

INSERT INTO Properties (id, ownerID, price, title, location, description, availabilityEnd, availabilityStart) VALUES (1, 4, 30.0, 'Downtown Apartment', 'Downtown', '3 Rooms', '31/12/2019', '01/01/2019');
INSERT INTO Properties (id, ownerID, price, title, location, description, availabilityEnd, availabilityStart) VALUES (2, 1, 43.0, 'Ribeira Vintage', 'Ribeira', '1 Room', '31/12/2019', '01/01/2019');
INSERT INTO Properties (id, ownerID, price, title, location, description, availabilityEnd, availabilityStart) VALUES (3, 3, 97.0, 'Infante Apartment', 'Infante', '2 Rooms', '31/12/2019', '01/01/2019');
INSERT INTO Properties (id, ownerID, price, title, location, description, availabilityEnd, availabilityStart) VALUES (4, 2, 102.0, 'Charming Loft', 'Gaia', '2 Rooms', '31/12/2019', '01/01/2019');
INSERT INTO Properties (id, ownerID, price, title, location, description, availabilityEnd, availabilityStart) VALUES (5, 2, 70.0, 'Studio Garden', 'Marques', '1 Room', '31/12/2019', '01/01/2019');

-- Table: Reservations
DROP TABLE IF EXISTS Reservations;

CREATE TABLE Reservations (
    id             INTEGER PRIMARY KEY,
    touristID      INTEGER,
    propertyID     INTEGER,
    startDate      DATE    NOT NULL,
    endDate        DATE    NOT NULL,
    price          FLOAT   NOT NULL,
    touristComment VARCHAR,
    touristRating  INTEGER CHECK (touristRating >= 0 AND 
                                  touristRating <= 5),
    ownerComment   VARCHAR,
    ownerRating    INTEGER CHECK (ownerRating >= 0 AND 
                                  ownerRating <= 5) 
);

INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating) VALUES (1, 4, 3, '22/01/2019', '24/01/2019', 194.0, 'Rude owner', 2, 'Tourists were not clean', 3);
INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating) VALUES (2, 2, 1, '22/07/2019', '30/07/2019', 240.0, 'Good location', 3, NULL, 4);
INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating) VALUES (3, 2, 3, '02/09/2019', '10/09/2019', 776.0, 'Great owner', 5, 'Friendly and clean family', 4);
INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating) VALUES (4, 3, 4, '17/04/2019', '22/05/2019', 510.0, NULL, 3, NULL, 4);

-- Table: Tourists
DROP TABLE IF EXISTS Tourists;

CREATE TABLE Tourists (
    id INTEGER PRIMARY KEY
             REFERENCES Users (id) ON UPDATE CASCADE
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

INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (1, 'admin', 'admin@feup.pt', '$2y$12$j9LZjHai/jQuPcqFJ8vxzOHk26MHxPS2Yelgdi5KJptwFb6roihvS', 'admin', 'admin.png');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (2, 'mpinho', 'mpinho@feup.pt', '$2y$12$lMsbiWofNFf3hzq88x6Jcum2CHptZ61Cjg6iOCyRDCpvAqSo2Iks6', 'muriel pinho', 'mpinho.png');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (3, 'ranheri', 'ranheri@fe.up.pt', '$2y$12$xGqcJs74ick2Pr4Yd1FPHeTUkG2fU6JtLPmPQG2LzgKU1ZXWTLH9S', 'fellipe ranheri', 'ranheri.jpg');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (4, 'brandao', 'jbrandao@fe.up.pt', '$2y$12$VJj.cHukK7IXdyS9tpSZZOKsrFaYEX0kL5ubHfVOA3LExDP2PsNx6', 'joao brandao', 'brandao.png');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (5, 'tourist', 'tourist@gmail.com', '$2y$12$JTGQ8YlmqpGauftEMlU9Y..J7NA/Ai2ZjUDz9sb17k7UAtLMfiF92', 'tourist', 'tourist.png');

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
