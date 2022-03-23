USE FinanceBudgetApp; -- Use the created database

-- Drop all the tables if exists before creating new
DROP TABLE IF EXISTS Customer;
DROP TABLE IF EXISTS Images;
DROP TABLE IF EXISTS UserAchievement;

CREATE TABLE Customer (
  CustomerID int NOT NULL,
  Email varchar(100) NOT NULL,
  Password varchar(100) NOT NULL,
  Phone varchar(15),
  Home varchar(40),
  PRIMARY KEY (CustomerID),
  UNIQUE (Email)
);

CREATE TABLE Images (
  CustomerID int NOT NULL,
  name varchar(200) NOT NULL,
  CONSTRAINT ImagesPK PRIMARY KEY (Customerid),
  CONSTRAINT ImagesFK FOREIGN KEY(Customerid) REFERENCES Customer (CustomerID)

-- UserAchievement table
CREATE TABLE UserAchievement (
  AchievementID CHAR(10),
  CustomerID int,
  CONSTRAINT UserachievementPK PRIMARY KEY (AchievementID, CustomerID),
  CONSTRAINT AchievementIDFK FOREIGN KEY (AchievementID) REFERENCES Achievement (AchievementID),
  CONSTRAINT CustomerIDFK FOREIGN KEY (CustomerID) REFERENCES Customer (CustomerID)
);

-- Budget table
CREATE TABLE budget (
  budgetID int NOT NULL AUTO_INCREMENT,
  customerID int NOT NULL,
  creationDate date,
  PRIMARY KEY (budgetID),
  FOREIGN KEY (customerID) REFERENCES Customer (CustomerID)
);

-- Transactions table
CREATE TABLE transactions (
  transactionID int NOT NULL AUTO_INCREMENT,
  budgetID int NOT NULL,
  transactionType varchar(45),
  transactionValue decimal(5, 2),
  transactionName varchar(45),
  PRIMARY KEY (transactionID),
  FOREIGN KEY (budgetID) REFERENCES Budget (budgetID)
);

-- Goal table
CREATE TABLE goal(
  goalID int NOT NULL AUTO_INCREMENT,
  customerID int,
  goalName varchar(45),
  goalValue decimal(5,2),
  goalCreationDate date,
  goalDate date,
  PRIMARY KEY (goalID),
  FOREIGN KEY (customerID) REFERENCES customer(CustomerID)
);

-- Faste tabeller - ikke kjør drop på disse da innholdet er satt

-- Achievement table
CREATE TABLE Achievement (
  AchievementID CHAR(10),
  AchievementName CHAR(50),
  AchievementDescr CHAR(50),
  CONSTRAINT AchievementPK PRIMARY KEY (AchievementID)
);