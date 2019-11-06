DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Owners;
DROP TABLE IF EXISTS Tourists;
DROP TABLE IF EXISTS Properties;
DROP TABLE IF EXISTS Messages;
DROP TABLE IF EXISTS Comments;
DROP TABLE IF EXISTS Reservations;
DROP TABLE IF EXISTS Photos;

CREATE TABLE Users
(
    userID INTEGER PRIMARY KEY,
    userUsername VARCHAR NOT NULL UNIQUE,
    userEmail VARCHAR NOT NULL UNIQUE,
    userPassword VARCHAR NOT NULL,
    userName VARCHAR NOT NULL,
    userGender CHAR NOT NULL CHECK(userGender = 'M' OR userGender = 'F' OR userGender = 'O'),
    userBorningDate DATE NOT NULL,
    userProfilePicture VARCHAR
);

CREATE TABLE Owners
(
    ownerID INTEGER PRIMARY KEY REFERENCES Users
);

CREATE TABLE Tourists
(
    touristID INTEGER PRIMARY KEY REFERENCES Users
);

CREATE TABLE Properties
(
    propertyID INTEGER PRIMARY KEY,
    propertyPrice FLOAT NOT NULL,
    propertyTitle VARCHAR NOT NULL,
    propertyLocation VARCHAR NOT NULL,
    propertyDescription VARCHAR NOT NULL,
    ownerID INTEGER NOT NULL REFERENCES Owners
);

CREATE TABLE Messages
(
    messageID INTEGER PRIMARY KEY,
    messageText VARCHAR NOT NULL,

);

CREATE TABLE Comments
(
    commentID INTEGER PRIMARY KEY,
    commentText VARCHAR NOT NULL,
    commentRating INTEGER NOT NULL CHECK (commentRating > 1 AND commentRating <= 5)
);

CREATE TABLE Reservations
(
    reservationID INTEGER PRIMARY KEY,
    reservationBeginDate DATE NOT NULL,
    reservationEndDate DATE NOT NULL,
    reservationPrice FLOAT NOT NULL
);

CREATE TABLE Photos
(
    photoID INTEGER PRIMARY KEY,
    photoDescription VARCHAR NOT NULL
);