how to create your database


Open you XAMPP start apache and mysql
open localhost
create database name condomeandyou

sql

CREATE TABLE Users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstName varchar(50) NOT NULL,
    lastName varchar(50) NOT NULL,
    email varchar(50) NOT NULL,
    password varchar(50) NOT NULL

);

CREATE TABLE Bills (
    id INT PRIMARY KEY AUTO_INCREMENT,
    room INT NOT NULL,
    water_bill_amount DECIMAL(10, 2) NOT NULL,
    water_last_payment_date DATE,
    water_due_date DATE,
    electricity_bill_amount DECIMAL(10, 2) NOT NULL,
    electricity_last_payment_date DATE,
    electricity_due_date DATE,
    rent_amount DECIMAL(10, 2) NOT NULL,
    rent_last_payment_date DATE,
    rent_due_date DATE
);

or you can do it manually click new
table name users add 5 columns
name id type int length 10 check A_I
name firstName type varchar length 50
name lastName type varchar length 50
name email type varchar length 50
name password type varchar length 50
then save

table name bills add 11 columns
name    id type int length 10 check A_I
name    room type varchar length 50 
name    water_bill_amount varchar length 50
name    water_last_payment_date type DATE
name    water_due_date type DATE
name    electricity_bill_amount varchar length 50
name    electricity_last_payment_date type date
name    electricity_due_date type date
name    rent_amount varchar length 50
name    rent_last_payment_date type date
name    rent_due_date type date
then save
