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