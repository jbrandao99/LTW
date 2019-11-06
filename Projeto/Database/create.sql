drop table if exists users;
drop table if exists owners;
drop table if exists tourists;
drop table if exists rentals;

create table users
(
    users_id integer primary key,
    users_username varchar not null unique,
    users_email varchar not null unique,
    users_password varchar not null check(length(users_password) <= 20),
    users_name varchar not null,
    users_gender varchar not null check(users_gender = 'M' or users_gender = 'F'),
    users_borning_date date not null
);

create table owners
(
    owners_id integer primary key references users
);

create table tourists
(
    tourists_id integer primary key references users
);

create table rentals
(
    rentals_id integer primary key,
    rentals_price float not null,
    rentals_title varchar not null,
    rentals_published integer not null,
    rentals_location varchar not null,
    rentals_description varchar not null
);
