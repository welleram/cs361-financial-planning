<?php

/* add_account.php
 * add an account */

/* shared functions */
require 'financial_planning.php';
require 'jsmith_functions.php';

/* display html page header */
display_header();

/* display and process add account form */
if (!submitted()) {
    /* display add account form */
    print_file('add_account.html');
} else {
    /* store data in an array */
    $account = $_POST;
    $session = $_SESSION;
    /* TODO: insert into database */
    /* temporarily display contents of array */
    

    //temporary variables until have real session variables
    $_SESSION[userName] = "user1"; 
    $_SESSION[userP_Id] = 333;
    
    //git conflict the lines under were commented out    
    //echo "session is $_SESSION[userP_Id]<br>";
    //function add_account($userP_Id , $userName, $accountName, $accountType, $accountNumber, $accountBalance, $accountUsername, $accountPassword, $con)
    add_account($_SESSION[userP_Id], $_SESSION[userName],  $_POST[accountname], $_POST[select_account_type], $_POST[accountnum], $_POST[accountbalance], $POST[accountusername], $_POST[passwordinput], $con);

    ////and replaced with these:
    //add_account($accountName, $accountType, $accountNumber, $accountBalance, $accountUsername, $accountPassword, $con)
    //add_account($_POST[accountname], $_POST[select_account_type], $_POST[accountnum], $_POST[accountbalance], $POST[accountusername], $_POST[passwordinput], $con);
//>>>>>>> baf06c3acb123d22b89554267b47ae8f92aa56ae

    
    echo '<pre>';
    print_r($account);
    //print_r($session);
    
    echo '</pre>';
    echo '<a href="" class="btn btn-primary">Go back</a>';
}

/* display html page footer */
display_footer();

?>
