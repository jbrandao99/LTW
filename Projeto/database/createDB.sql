--
-- File generated with SQLiteStudio v3.2.1 on Tue Dec 3 18:13:23 2019
--
-- Text encoding used: UTF-8
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: Messages
DROP TABLE IF EXISTS Messages;

CREATE TABLE Messages (
    id         INTEGER PRIMARY KEY,
    text       VARCHAR NOT NULL,
    propertyID INTEGER REFERENCES Properties (id) ON UPDATE CASCADE,
    touristID  INTEGER REFERENCES Tourists (id) ON UPDATE CASCADE
);

INSERT INTO Messages (id, text, propertyID, touristID) VALUES (1, 'Is the house dog friendly?', 4, 18);
INSERT INTO Messages (id, text, propertyID, touristID) VALUES (2, 'How many beds are available?', 1, 3);
INSERT INTO Messages (id, text, propertyID, touristID) VALUES (3, 'Can i extend my stay?', 3, 7);
INSERT INTO Messages (id, text, propertyID, touristID) VALUES (4, 'Are there any markets near the house?', 2, 17);
INSERT INTO Messages (id, text, propertyID, touristID) VALUES (5, 'Thanks for the hospitality.', 5, 9);

-- Table: Owners
DROP TABLE IF EXISTS Owners;

CREATE TABLE Owners (
    id INTEGER PRIMARY KEY
             REFERENCES Users (id) ON UPDATE CASCADE
);

INSERT INTO Owners (id) VALUES (21);
INSERT INTO Owners (id) VALUES (22);
INSERT INTO Owners (id) VALUES (23);
INSERT INTO Owners (id) VALUES (24);
INSERT INTO Owners (id) VALUES (25);
INSERT INTO Owners (id) VALUES (26);
INSERT INTO Owners (id) VALUES (27);
INSERT INTO Owners (id) VALUES (28);
INSERT INTO Owners (id) VALUES (29);
INSERT INTO Owners (id) VALUES (30);

-- Table: Photos
DROP TABLE IF EXISTS Photos;

CREATE TABLE Photos (
    id          INTEGER PRIMARY KEY,
    description VARCHAR NOT NULL,
    propertyID  INTEGER REFERENCES Properties (id) ON UPDATE CASCADE,
    path        TEXT    NOT NULL
);

INSERT INTO Photos (id, description, propertyID, path) VALUES (1, 'Bedroom 1', 4, '45646456.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (2, 'Bedroom 1', 3, '441412.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (3, 'Bedroom 1', 2, '98765.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (4, 'Bedroom 1', 1, '123456.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (5, 'Bedroom 2', 1, '147654.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (6, 'Bedroom 2', 4, '85536.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (7, 'Bedroom', 5, '8854356787.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (8, 'Bedroom 2', 2, '18927349.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (9, 'Living Room', 2, '467329.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (10, 'Living Room', 1, '01232983.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (11, 'Kitchen', 2, '547638.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (12, 'Living Room', 4, '38398.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (13, 'Kitchen', 1, '333333.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (14, 'Bedroom 2', 3, '1553232.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (15, 'Living Room', 3, '8798723.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (16, 'Kitchen', 4, '09086577.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (17, 'Living Room', 5, '8123123.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (18, 'Pool', 4, '984567.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (19, 'Kitchen', 3, '121234.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (20, 'Pool', 1, '009766.jpg');
INSERT INTO Photos (id, description, propertyID, path) VALUES (21, 'Pool', 2, '1231726.jpg');

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
    availabilityStart DATE    NOT NULL,
    availabilityEnd   DATE    NOT NULL
);

INSERT INTO Properties (id, ownerID, price, title, location, description, availabilityStart, availabilityEnd) VALUES (1, 4, 30.0, 'Downtown Apartment', 'Downtown', '3 Rooms', '01/01/2019', '31/12/2019');
INSERT INTO Properties (id, ownerID, price, title, location, description, availabilityStart, availabilityEnd) VALUES (2, 1, 43.0, 'Ribeira Vintage', 'Ribeira', '1 Room', '01/01/2019', '31/12/2019');
INSERT INTO Properties (id, ownerID, price, title, location, description, availabilityStart, availabilityEnd) VALUES (3, 3, 97.0, 'Infante Apartment', 'Infante', '2 Rooms', '01/01/2019', '31/12/2019');
INSERT INTO Properties (id, ownerID, price, title, location, description, availabilityStart, availabilityEnd) VALUES (4, 2, 102.0, 'Charming Loft', 'Gaia', '2 Rooms', '01/01/2019', '31/12/2019');
INSERT INTO Properties (id, ownerID, price, title, location, description, availabilityStart, availabilityEnd) VALUES (5, 5, 70.0, 'Studio Garden', 'Marques', '1 Room', '01/01/2019', '31/12/2019');

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

INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating) VALUES (1, 8, 3, '22/01/2019', '24/01/2019', 194.0, 'Rude owner', 2, 'Tourists were not clean', 3);
INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating) VALUES (2, 12, 1, '22/07/2019', '30/07/2019', 240.0, 'Good location', 3, NULL, 4);
INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating) VALUES (3, 1, 3, '02/09/2019', '10/09/2019', 776.0, 'Great owner', 5, 'Friendly and clean family', 4);
INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating) VALUES (4, 20, 4, '17/04/2019', '22/05/2019', 510.0, NULL, 3, NULL, 4);
INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating) VALUES (5, 9, 3, '26/08/2019', '30/08/2019', 388.0, NULL, 4, 'Great hosting them here', 5);
INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating) VALUES (6, 2, 2, '17/06/2019', '20/06/2019', 129.0, 'Very clean place', 5, NULL, 4);
INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating) VALUES (7, 4, 4, '16/12/2019', '30/12/2019', 1428.0, NULL, NULL, NULL, NULL);
INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating) VALUES (8, 3, 5, '22/07/2019', '26/07/2019', 280.0, 'Caring owner', 5, NULL, 4);
INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating) VALUES (9, 19, 4, '01/08/2019', '31/08/2019', 3162.0, NULL, 4, 'Tourists were lovely', 5);
INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating) VALUES (10, 7, 3, '05/02/2019', '10/02/2019', 485.0, 'Not very clean', 2, 'Good experience', 3);
INSERT INTO Reservations (id, touristID, propertyID, startDate, endDate, price, touristComment, touristRating, ownerComment, ownerRating) VALUES (11, 17, 1, '02/03/2019', '30/03/2019', 840.0, NULL, 5, 'Great family', 4);

-- Table: Tourists
DROP TABLE IF EXISTS Tourists;

CREATE TABLE Tourists (
    id INTEGER PRIMARY KEY
             REFERENCES Users (id) ON UPDATE CASCADE
);

INSERT INTO Tourists (id) VALUES (1);
INSERT INTO Tourists (id) VALUES (2);
INSERT INTO Tourists (id) VALUES (3);
INSERT INTO Tourists (id) VALUES (4);
INSERT INTO Tourists (id) VALUES (5);
INSERT INTO Tourists (id) VALUES (6);
INSERT INTO Tourists (id) VALUES (7);
INSERT INTO Tourists (id) VALUES (8);
INSERT INTO Tourists (id) VALUES (9);
INSERT INTO Tourists (id) VALUES (10);
INSERT INTO Tourists (id) VALUES (11);
INSERT INTO Tourists (id) VALUES (12);
INSERT INTO Tourists (id) VALUES (13);
INSERT INTO Tourists (id) VALUES (14);
INSERT INTO Tourists (id) VALUES (15);
INSERT INTO Tourists (id) VALUES (16);
INSERT INTO Tourists (id) VALUES (17);
INSERT INTO Tourists (id) VALUES (18);
INSERT INTO Tourists (id) VALUES (19);
INSERT INTO Tourists (id) VALUES (20);

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

INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (1, 'cstocking0', 'cstocking0@blogger.com', 'hXiJi5ZHaZM', 'Celestyn Stocking', 'https://robohash.org/numquamnonest.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (2, 'spetrichat1', 'spetrichat1@utexas.edu', '05V30BY5z6', 'Sam Petrichat', 'https://robohash.org/veniaminventoreodio.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (3, 'cbewick2', 'cbewick2@eepurl.com', '0jVue5kcNMq', 'Cissiee Bewick', 'https://robohash.org/omnisutveniam.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (4, 'abolan3', 'abolan3@weebly.com', 'wCfzhUdljY0X', 'Antonio Bolan', 'https://robohash.org/necessitatibusperferendisvel.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (5, 'tlevick4', 'tlevick4@typepad.com', 'rv8I5c4', 'Tyler Levick', 'https://robohash.org/temporemagnamdolores.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (6, 'nle5', 'nle5@scientificamerican.com', 'M5wTwj', 'Nita Le Borgne', 'https://robohash.org/explicaboisteitaque.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (7, 'tosesnane6', 'tosesnane6@state.tx.us', '7VHno1', 'Tremaine O''Sesnane', 'https://robohash.org/totamquiaut.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (8, 'dpaoloni7', 'dpaoloni7@marriott.com', 'x7k1UhTu7sXE', 'Darlleen Paoloni', 'https://robohash.org/minimacumeligendi.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (9, 'eshore8', 'eshore8@bloglovin.com', 'qJ9h9se3n3q1', 'Eulalie Shore', 'https://robohash.org/providentpariaturadipisci.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (10, 'jklemz9', 'jklemz9@nsw.gov.au', 'q4bem4u7', 'Janette Klemz', 'https://robohash.org/enimametautem.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (11, 'lstelfoxa', 'lstelfoxa@fc2.com', 'jYHWVq3IiY4v', 'Layton Stelfox', 'https://robohash.org/architectoetet.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (12, 'psquiresb', 'psquiresb@a8.net', '8LxQCjaQ', 'Paulie Squires', 'https://robohash.org/omnissitnisi.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (13, 'jcawsonc', 'jcawsonc@state.tx.us', 'HcUzHg4nniSn', 'Joete Cawson', 'https://robohash.org/autquiquae.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (14, 'ckleeweind', 'ckleeweind@netscape.com', 'mFo2GOB0Ppk', 'Chrisse Kleewein', 'https://robohash.org/molestiasexcepturinisi.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (15, 'fdurkine', 'fdurkine@bandcamp.com', 'GS4c0jqQ2G6', 'Felicdad Durkin', 'https://robohash.org/etharumaut.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (16, 'gecclestonef', 'gecclestonef@dmoz.org', '3dkJzqMu8GJA', 'Giovanni Ecclestone', 'https://robohash.org/nemosedtempore.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (17, 'jfoggartyg', 'jfoggartyg@adobe.com', 'SR06bSGa', 'Jodie Foggarty', 'https://robohash.org/voluptatibusaaut.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (18, 'toubridgeh', 'toubridgeh@sbwire.com', 'lcod5ZazzE', 'Tybalt Oubridge', 'https://robohash.org/assumendaametdoloribus.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (19, 'rjerischi', 'rjerischi@ask.com', 'juzuQgLc8Wk', 'Robinet Jerisch', 'https://robohash.org/reprehenderitsintaut.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (20, 'lleckenbyj', 'lleckenbyj@altervista.org', 'yCo0MUVBiwo5', 'Lambert Leckenby', 'https://robohash.org/cumassumendavoluptates.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (21, 'arobilartk', 'arobilartk@prweb.com', 'L35SXlCRWLnh', 'Ariana Robilart', 'https://robohash.org/quibusdamrepellendusea.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (22, 'hpepinl', 'hpepinl@foxnews.com', 'ul4fxJitn', 'Heida Pepin', 'https://robohash.org/autetsit.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (23, 'sromem', 'sromem@taobao.com', '7u7v581lT', 'Sheeree Rome', 'https://robohash.org/doloresdictaunde.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (24, 'oboydelln', 'oboydelln@state.tx.us', 'b6Hn4LpI', 'Obie Boydell', 'https://robohash.org/quodquocorporis.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (25, 'aadamovitzo', 'aadamovitzo@cnn.com', '3WYx3r0rUjb1', 'Alex Adamovitz', 'https://robohash.org/perferendisquiquos.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (26, 'hmoaklerp', 'hmoaklerp@economist.com', 'PTTlMyRvQnmt', 'Heinrik Moakler', 'https://robohash.org/ipsumquiscommodi.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (27, 'tstiveq', 'tstiveq@networksolutions.com', 'psmn4u', 'Towny Stive', 'https://robohash.org/sedpraesentiumquae.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (28, 'aduerr', 'aduerr@theatlantic.com', 'PqnQTYQi', 'Alys Duer', 'https://robohash.org/officiisesseeveniet.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (29, 'ncrommetts', 'ncrommetts@engadget.com', 'IsXzBXZ1Qv3', 'Nedi Crommett', 'https://robohash.org/sedprovidentodit.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (30, 'mpeealesst', 'mpeealesst@uol.com.br', 'u0vxzBN6', 'Marcus Peealess', 'https://robohash.org/eaqueconsequaturaut.jpg?size=50x50&set=set1');
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (31, 'admin', 'admin@admin.admin', '$2y$12$gcoVu/xHZx2m2KfQaar.C./51R2WwjvQVL5uO7c08RkThFrf5Vl0e', 'admin', NULL);
INSERT INTO Users (id, username, email, password, name, profilePicture) VALUES (32, 'ltw', 'ltw@ltw.com', '$2y$12$WJ1gIbBAj9.g9UmE73z43eqeCfZwnQdkbk7wQDIHbmHblOolryu5C', 'ltw', NULL);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
