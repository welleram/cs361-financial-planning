<?php

/*
    $mysqli = new mysqli("oniddb.cws.oregonstate.edu", "smithjoe-db", "", "smithjoe-db");
    if ($mysqli->connect_errno) 
    {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
 * 
 */

$con = mysqli_connect("127.0.0.1", "root", "dgavm", "financialplanning");

function create_table_users($con)
{


    $sql="CREATE TABLE Users(P_Id int NOT NULL AUTO_INCREMENT , userName CHAR(30) UNIQUE, password CHAR(60), dailySpendingLimit INT, weeklySpendingLimit INT, monthlySpendingLimit INT,  PRIMARY KEY (P_Id) )";

    if (mysqli_query($con,$sql))
    {
        echo "table Users created successfully. <br>";
    }

    else 
    {
        echo "Error creating table Users: " . mysqli_error($con) . "<br>";    
    }


}

function drop_table_users($con)
{
    $sql="DROP TABLE Users";
        if (mysqli_query($con,$sql))
        {
            echo "table Users dropped successfully. <br. ";
        }
        else 
        {
            echo "Error dropping table table: " . mysqli_error($con) . "<br>";    
        }    
    
}

function add_user($userName, $password, $con)
{
    
    $sql = "INSERT INTO Users(userName, password) VALUES ('$userName', '$password')";
    
    mysqli_query($con,$sql);
    
    
}

function delete_user($userName, $con)
{
    
    $sql = "DELETE FROM Users WHERE userName='$userName';";
    
    mysqli_query($con,$sql);
    
    
}


function create_table_accounts($con)
{


    $sql="CREATE TABLE Accounts(P_Id int NOT NULL AUTO_INCREMENT , userP_Id INT, userName CHAR(30), accountName CHAR(30), accountType CHAR(30), accountNumber INT, accountBalance INT, accountUsername CHAR(30), accountPassword CHAR(60),  PRIMARY KEY (P_Id) )";

    if (mysqli_query($con,$sql))
    {
        echo "table Accounts created successfully. <br>";
    }

    else 
    {
        echo "Error creating table Accounts: " . mysqli_error($con) . "<br>";    
    }


}




function drop_table_accounts($con)
{
    $sql="DROP TABLE Accounts";
        if (mysqli_query($con,$sql))
        {
            echo "table Accounts dropped successfully. <br. ";
        }
        else 
        {
            echo "Error dropping table Accounts: " . mysqli_error($con) . "<br>";    
        }    
    
}

function add_account($userP_Id , $userName, $accountName, $accountType, $accountNumber, $accountBalance, $accountUsername, $accountPassword, $con)
{
    
    $sql = "INSERT INTO Accounts(userP_Id, userName, accountName, accountType, accountNumber, accountBalance, accountUsername, accountPassword) VALUES ('$userP_Id', '$userName', '$accountName', '$accountType', '$accountNumber', '$accountBalance', '$accountUsername', '$accountPassword')";
    
    if (mysqli_query($con,$sql))
    {
        // echo "added account successfully. <br. ";
    }
    else
    {
        //echo "Error adding account: " . mysqli_error($con) . "<br>";
    }
    
    
}

function delete_account($P_Id, $con)
{
    
    $sql = "DELETE FROM Accounts WHERE P_Id='$P_Id';";
    
    mysqli_query($con,$sql);
    
    
}

function create_table_incomes( $con)
{


    $sql="CREATE TABLE Incomes(P_Id int NOT NULL AUTO_INCREMENT , userP_Id INT, userName CHAR(30), dateDay INT, dateMonth INT, dateYear INT, recurrence CHAR(30), amount INT, PRIMARY KEY (P_Id))";

    if (mysqli_query($con,$sql))
    {
        echo "table Incomes created successfully. <br>";
    }

    else 
    {
        echo "Error creating table Incomes: " . mysqli_error($con) . "<br>";    
    }


}

function drop_table_incomes($con)
{
    $sql="DROP TABLE Incomes";
        if (mysqli_query($con,$sql))
        {
            echo "table Incomes dropped successfully. <br. ";
        }
        else 
        {
            echo "Error dropping table Incomes: " . mysqli_error($con) . "<br>";    
        }    
    
}

function add_income($userP_Id, $userName, $dateDay, $dateMonth, $dateYear, $recurrence, $amount, $con)
{
    
    $sql = "INSERT INTO Incomes(userP_Id, userName, dateDay, dateMonth, dateYear, recurrence, amount) VALUES ('$userP_Id', '$userName', '$dateDay', '$dateMonth', '$dateYear', '$recurrence', '$amount')";
    

    if (mysqli_query($con,$sql))
    {
        echo "added income successfully. <br. ";
    }
    else
    {
        echo "Error adding income: " . mysqli_error($con) . "<br>";
    }
    
    
}

function delete_income($P_Id, $con)
{
    
    $sql = "DELETE FROM Incomes WHERE P_Id='$P_Id';";
    
    mysqli_query($con,$sql);
    
    
}

function create_table_expenses($con)
{


    $sql="CREATE TABLE Expenses(P_Id int NOT NULL AUTO_INCREMENT , userP_Id INT, userName CHAR(30), dateDay INT, dateMonth INT, dateYear INT, recurrence CHAR(30), amount INT, PRIMARY KEY (P_Id))";

    if (mysqli_query($con,$sql))
    {
        echo "table Expenses created successfully. <br>";
    }

    else 
    {
        echo "Error creating table Expenses: " . mysqli_error($con) . "<br>";    
    }


}

function drop_table_expenses($con)
{
    $sql="DROP TABLE Expenses";
    if (mysqli_query($con,$sql))
    {
        echo "table Expenses dropped successfully. <br> ";
    }
    else 
    {
        echo "Error dropping table Expenses: " . mysqli_error($con) . "<br>";    
    }    
    
}


function add_expense($userP_Id, $userName, $dateDay, $dateMonth, $dateYear, $recurrence, $amount, $con)
{
    
    $sql = "INSERT INTO Expenses(userP_Id, userName,  dateDay, dateMonth, dateYear, recurrence, amount) VALUES ('$userP_Id', '$userName', '$dateDay', '$dateMonth', '$dateYear', '$recurrence', '$amount')";
    
    
    
    if (mysqli_query($con,$sql))
    {
        echo "Added expense successfully. <br. ";
    }
    else
    {
        echo "Error adding expense: " . mysqli_error($con) . "<br>";
    }
    
    
}

function delete_expense($P_Id, $con)
{
    
    $sql = "DELETE FROM Expenses WHERE P_Id='$P_Id';";
    
    mysqli_query($con,$sql);
    
    
}


function setDailySpendingLimit($limit, $con)
{
    
    $sql = "UPDATE Users SET dailySpendingLimit='$limit' WHERE userName='$_SESSION[userName]'";
    
    echo "limit was $limit <br>";
    
    if (mysqli_query($con,$sql))
    {
        echo "Added limit successfully. <br. ";
    }
    else
    {
        echo "Error adding limit: " . mysqli_error($con) . "<br>";
    }
    
    
}

function setWeeklySpendingLimit($limit, $con)
{
    
    $sql = "UPDATE Users SET weeklySpendingLimit='$limit' WHERE userName='$_SESSION[userName]'";
    
    
    
    if (mysqli_query($con,$sql))
    {
        echo "Added limit successfully. <br. ";
    }
    else
    {
        echo "Error adding limit: " . mysqli_error($con) . "<br>";
    }
    
    
}

function setMonthlySpendingLimit($limit, $con)
{
    
    $sql = "UPDATE Users SET monthlySpendingLimit='$limit' WHERE userName='$_SESSION[userName]'";
    
    
    
    if (mysqli_query($con,$sql))
    {
        echo "Added limit successfully. <br. ";
    }
    else
    {
        echo "Error adding limit: " . mysqli_error($con) . "<br>";
    }
    
    
}


    
    
    
    

