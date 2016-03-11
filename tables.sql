CREATE TABLE `user` (
id1 INT(10) AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(255) NOT NULL,
firstname VARCHAR(255) NOT NULL,
lastname VARCHAR(255) NOT NULL,
email VARCHAR(255)NOT NULL,
password VARCHAR(255) NOT NULL
)ENGINE=InnoDB

CREATE TABLE Accounts(
P_Id INT NOT NULL AUTO_INCREMENT ,
accountName CHAR( 30 ) ,
accountType CHAR( 30 ) ,
accountNumber INT,
accountBalance INT,
accountUsernameCHAR( 30 ) ,
accountPasswordCHAR( 60 ) ,
username VARCHAR(255) NOT NULL,
PRIMARY KEY ( P_Id )
) ENGINE = INNODB


CREATE TABLE Incomes(
P_Id int NOT NULL AUTO_INCREMENT , 
incomeType CHAR(50) NOT NULL, 
dateDay INT NOT NULL, 
dateMonth INT NOT NULL, 
dateYear INT NOT NULL, 
recurrence CHAR(30) NOT NULL, 
amount INT NOT NULL, 
P_Id2 INT(11),
username VARCHAR(255) NOT NULL,
PRIMARY KEY (P_Id),
FOREIGN KEY (P_Id2) REFERENCES Accounts(P_Id) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE = INNODB


CREATE TABLE Expenses(
P_Id int NOT NULL AUTO_INCREMENT ,
expenseType CHAR(50) NOT NULL, 
dateDay INT, 
dateMonth INT, 
dateYear INT, 
recurrence CHAR(30), 
amount INT, 
username VARCHAR(255) NOT NULL,
PRIMARY KEY (P_Id),
P_Id2 INT(11),
FOREIGN KEY (P_Id2) REFERENCES Accounts(P_Id) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE = INNODB




INSERT INTO Incomes (incomeType, dateDay, dateMonth, dateYear,recurrence,amount,P_Id2)
VALUES([incomeType], [dateDay], [dateMonth], [dateYear],[recurrence],[amount] (
  SELECT P_Id FROM Accounts
	WHERE accountName = [accountName] AND accountType = [accountType] AND accountBalance  = [accountBalance]))


SELECT dateMonth, Sum(amount) FROM Incomes WHERE username = 'ivan2015' GROUP BY dateMonth



