
CREATE DATABASE members;
 use members;

CREATE TABLE users (
                       id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                       Firstname VARCHAR(30) NOT NULL,
                       Lastname VARCHAR(30) NOT NULL,
                       Email VARCHAR(30) NOT NULL,
                       password VARCHAR(30) NOT NULL,
                       ConfirmPassword VARCHAR(50) NOT NULL
)


CREATE TABLE appointments (
                       id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                       Name VARCHAR(30) NOT NULL,
                       Email VARCHAR(30) NOT NULL,
                       Phone VARCHAR(30) NOT NULL,
                       Date Date NOT NULL,
                       Time time NOT NULL,
                       Message VARCHAR(50) NOT NULL
);