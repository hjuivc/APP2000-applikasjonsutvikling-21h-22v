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

-- Achievement table
CREATE TABLE achievement
(
AchievementID CHAR(10),
AchievementName CHAR(50),
AchievementDescr CHAR(50),
CONSTRAINT achievementPK PRIMARY KEY(AchievementID)
);

-- UserAchievement table
CREATE TABLE userachievement
(
AchievementID CHAR(10),
CustomerID int,
CONSTRAINT userachievementPK PRIMARY KEY(AchievementID,CustomerID),
CONSTRAINT AchievementIDFK FOREIGN KEY(AchievementID) REFERENCES achievement(AchievementID),
CONSTRAINT CustomerIDFK FOREIGN KEY(CustomerID) REFERENCES customer(CustomerID)
);