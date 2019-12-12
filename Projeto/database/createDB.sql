--
-- File generated with SQLiteStudio v3.2.1 on Thu Dec 5 22:05:09 2019
--
-- Text encoding used: UTF-8
--
PRAGMA foreign_keys
= off;
BEGIN TRANSACTION;

-- Table: Messages
DROP TABLE IF EXISTS Messages;

CREATE TABLE Messages
(
    id INTEGER PRIMARY KEY,
    text VARCHAR NOT NULL,
    propertyID INTEGER REFERENCES Properties (id) ON UPDATE CASCADE,
    touristID INTEGER REFERENCES Tourists (id) ON UPDATE CASCADE,
    senderUsername VARCHAR,
    recipientUsername VARCHAR
);

INSERT INTO Messages
    (id, text, propertyID, touristID, senderUsername, recipientUsername)
VALUES
    (1, 'Is the house dog friendly?', 4, 3, 'tourist', 'mpinho');
INSERT INTO Messages
    (id, text, propertyID, touristID, senderUsername, recipientUsername)
VALUES
    (2, 'How many beds are available?', 1, 5, 'tourist', 'brandao');

-- Table: Owners
DROP TABLE IF EXISTS Owners;

CREATE TABLE Owners
(
    id INTEGER PRIMARY KEY
        REFERENCES Users (id) ON UPDATE CASCADE,
    username VARCHAR REFERENCES Users (username) ON UPDATE CASCADE
);

INSERT INTO Owners
    (id, username)
VALUES
    (1, 'admin');
INSERT INTO Owners
    (id, username)
VALUES
    (2, 'mpinho');
INSERT INTO Owners
    (id, username)
VALUES
    (3, 'ranheri');
INSERT INTO Owners
    (id, username)
VALUES
    (4, 'brandao');

-- Table: Photos
DROP TABLE IF EXISTS Photos;

CREATE TABLE Photos
(
    id INTEGER PRIMARY KEY,
    description VARCHAR NOT NULL,
    propertyID INTEGER REFERENCES Properties (id) ON UPDATE CASCADE,
    path TEXT NOT NULL
);

INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (1, 'Bedroom 1', 4, '45646456.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (2, 'Bedroom 1', 3, '441412.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (3, 'Bedroom 1', 2, '98765.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (4, 'Bedroom 1', 1, '123456.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (5, 'Bedroom 2', 1, '147654.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (6, 'Bedroom 2', 4, '85536.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (7, 'Bedroom', 5, '8854356787.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (8, 'Bedroom 2', 2, '18927349.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (9, 'Living Room', 2, '467329.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (10, 'Living Room', 1, '01232983.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (11, 'Kitchen', 2, '547638.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (12, 'Living Room', 4, '38398.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (13, 'Kitchen', 1, '333333.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (14, 'Bedroom 2', 3, '1553232.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (15, 'Living Room', 3, '8798723.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (16, 'Kitchen', 4, '09086577.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (17, 'Living Room', 5, '8123123.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (18, 'Pool', 4, '984567.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (19, 'Kitchen', 3, '121234.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (20, 'Pool', 1, '009766.jpg');
INSERT INTO Photos
    (id, description, propertyID, path)
VALUES
    (21, 'Pool', 2, '1231726.jpg');

-- Table: Properties
DROP TABLE IF EXISTS Properties;

CREATE TABLE Properties
(
    id INTEGER PRIMARY KEY,
    ownerID INTEGER NOT NULL
        REFERENCES Owners (id) ON UPDATE CASCADE,
    ownerUsername VARCHAR REFERENCES Owners (username) ON UPDATE CASCADE,
    price FLOAT NOT NULL,
    title VARCHAR NOT NULL,
    location VARCHAR NOT NULL,
    description VARCHAR NOT NULL,
    availabilityEnd DATE,
    availabilityStart DATE
);

INSERT INTO Properties
    (id, ownerID, ownerUsername, price, title, location, description, availabilityEnd, availabilityStart)
VALUES
    (1, 4, 'brandao', 30.0, 'Downtown Apartment', 'Downtown', '3 Rooms', '31/12/2019', '01/01/2019');
INSERT INTO Properties
    (id, ownerID, ownerUsername, price, title, location, description, availabilityEnd, availabilityStart)
VALUES
    (2, 1, 'admin', 43.0, 'Ribeira Vintage', 'Ribeira', '1 Room', '31/12/2019', '01/01/2019');
INSERT INTO Properties
    (id, ownerID, ownerUsername, price, title, location, description, availabilityEnd, availabilityStart)
VALUES
    (3, 3, 'ranheri', 97.0, 'Infante Apartment', 'Infante', '2 Rooms', '31/12/2019', '01/01/2019');
INSERT INTO Properties
    (id, ownerID, ownerUsername, price, title, location, description, availabilityEnd, availabilityStart)
VALUES
    (4, 2, 'mpinho', 102.0, 'Charming Loft', 'Gaia', '2 Rooms', '31/12/2019', '01/01/2019');
INSERT INTO Properties
    (id, ownerID, ownerUsername, price, title, location, description, availabilityEnd, availabilityStart)
VALUES
    (5, 2, 'mpinho', 70.0, 'Studio Garden', 'Marques', '1 Room', '31/12/2019', '01/01/2019');

-- Table: Reservations
DROP TABLE IF EXISTS Reservations;

CREATE TABLE Reservations
(
    id INTEGER PRIMARY KEY,
    touristID INTEGER,
    propertyID INTEGER,
    startDate DATE NOT NULL,
    endDate DATE NOT NULL,
    price FLOAT NOT NULL,
    touristComment VARCHAR,
    touristRating INTEGER CHECK (touristRating >= 0 AND
            touristRating <= 5),
    ownerComment VARCHAR,
    ownerRating INTEGER CHECK (ownerRating >= 0 AND
            ownerRating <= 5)
);

INSERT INTO Reservations
    (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating)
VALUES
    (1, 4, 3, '22/01/2019', '24/01/2019', 194.0, 'Rude owner', 2, 'Tourists were not clean', 3);
INSERT INTO Reservations
    (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating)
VALUES
    (2, 2, 1, '22/07/2019', '30/07/2019', 240.0, 'Good location', 3, NULL, 4);
INSERT INTO Reservations
    (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating)
VALUES
    (3, 2, 3, '02/09/2019', '10/09/2019', 776.0, 'Great owner', 5, 'Friendly and clean family', 4);
INSERT INTO Reservations
    (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating)
VALUES
    (4, 3, 4, '17/04/2019', '22/05/2019', 510.0, NULL, 3, NULL, 4);

-- Table: Tourists
DROP TABLE IF EXISTS Tourists;

CREATE TABLE Tourists
(
    id INTEGER PRIMARY KEY
        REFERENCES Users (id) ON UPDATE CASCADE,
    username VARCHAR REFERENCES Users (username) ON UPDATE CASCADE
);

INSERT INTO Tourists
    (id, username)
VALUES
    (1, 'admin');
INSERT INTO Tourists
    (id, username)
VALUES
    (2, 'mpinho');
INSERT INTO Tourists
    (id, username)
VALUES
    (3, 'ranheri');
INSERT INTO Tourists
    (id, username)
VALUES
    (5, 'tourist');

-- Table: Users
DROP TABLE IF EXISTS Users;

CREATE TABLE Users
(
    id INTEGER PRIMARY KEY,
    username VARCHAR NOT NULL
        UNIQUE,
    email VARCHAR NOT NULL
        UNIQUE,
    password VARCHAR NOT NULL,
    name VARCHAR NOT NULL,
    profilePicture TEXT
);

INSERT INTO Users
    (id, username, email, password, name, profilePicture)
VALUES
    (1, 'admin', 'admin@feup.pt', '$2y$12$gcoVu/xHZx2m2KfQaar.C./51R2WwjvQVL5uO7c08RkThFrf5Vl0e', 'admin', NULL);
INSERT INTO Users
    (id, username, email, password, name, profilePicture)
VALUES
    (2, 'mpinho', 'mpinho@feup.pt', '$2y$12$yOQRHINTmmqZeEro29tfruC1uknVoThXKwENXJ/qfZngRxRHJeoFK', 'muriel pinho', NULL);
INSERT INTO Users
    (id, username, email, password, name, profilePicture)
VALUES
    (3, 'ranheri', 'ranheri@fe.up.pt', '$2y$12$xGqcJs74ick2Pr4Yd1FPHeTUkG2fU6JtLPmPQG2LzgKU1ZXWTLH9S', 'fellipe ranheri', NULL);
INSERT INTO Users
    (id, username, email, password, name, profilePicture)
VALUES
    (4, 'brandao', 'jbrandao@fe.up.pt', '$2y$12$W1PKKaYfYpm6.LXL3DlA7ukDeKsikq4MvDik55wZcmW9aNKQL4VgK', 'joao brandao', NULL);
INSERT INTO Users
    (id, username, email, password, name, profilePicture)
VALUES
    (5, 'tourist', 'tourist@gmail.com', '$2y$12$JTGQ8YlmqpGauftEMlU9Y..J7NA/Ai2ZjUDz9sb17k7UAtLMfiF92', 'tourist', NULL);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
