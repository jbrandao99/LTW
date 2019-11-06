drop table if exists user;
drop table if exists rental;

create table user(
user_id integer primary key,
username varchar not null unique,
email varchar not null unique,
password varchar not null check(length(password) <= 20),
name varchar not null,
gender varchar not null check(gender == 'M' or gender == 'F'),
borning_date date not null
);


create table rental(
rental_id integer primary key,
price float not null,
title varchar not null,
published integer not null,
location varchar not null,
description varchar not null,
foreign key username varchar references User(username)
);
