CREATE DATABASE financeBudgetApp;

USE financeBudgetApp;

DROP TABLE IF EXISTS customer;

CREATE TABLE Customer (
	CustomerID int NOT NULL,
    Username varchar(50) NOT NULL,
    EMail varchar(100) NOT NULL,
    Password varchar(100) NOT NULL
);

SELECT *
FROM customer;

