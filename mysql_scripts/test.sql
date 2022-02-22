CREATE DATABASE financeBudgetApp;

USE financeBudgetApp;

DROP TABLE IF EXISTS Customer;

CREATE TABLE Customer (
CustomerID int NOT NULL,
EMail varchar(100) NOT NULL,
Password varchar(100) NOT NULL,
phone varchar(15),
home varchar(40),
PRIMARY KEY (CustomerID)
);

SELECT *
FROM Customer;



