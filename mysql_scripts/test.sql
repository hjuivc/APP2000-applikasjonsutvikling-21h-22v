CREATE DATABASE financeBudgetApp;

USE financeBudgetApp;

DROP TABLE IF EXISTS Customer;

CREATE TABLE Customer (
CustomerID int NOT NULL,
EMail varchar(100) NOT NULL,
Password varchar(100) NOT NULL,
phone varchar(15),
home varchar(40),
CONSTRAINT UC_Person UNIQUE (ID,LastName)
);
ALTER TABLE Customer DROP PRIMARY KEY, ADD PRIMARY KEY (CustomerID, EMail ); 

ALTER TABLE Customer
ADD UNIQUE (EMail);

SELECT *
FROM Customer;

DROP TABLE images;
CREATE TABLE images (
  CustomerID int NOT NULL,
  name varchar(200) NOT NULL,
  CONSTRAINT imagesPK PRIMARY KEY (CustomerID),
  CONSTRAINT imagesFK FOREIGN KEY(CustomerID) REFERENCES customer (CustomerID)
);