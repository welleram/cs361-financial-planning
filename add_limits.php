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
    print_file('add_limits.html');
    
    
    
    
   //temporary variables until have real session variables
    $_SESSION[userName] = "user1"; 
    $_SESSION[userP_Id] = 333;
    add_user($_SESSION[userName], "444", $con);
    $result = mysqli_query($con, "SELECT * FROM Users WHERE userName='$_SESSION[userName]'");
    $accounts = $result;



/* begin accounts table */
echo "<div id=\"inner\">
  <table class=\"demo\">
    <legend>View/Edit Limits</legend>
      <thead>
        <tr>
          <th>Daily Limit</th>
          <th>Monthly Limit</th>
          <th>Yearly Limit</th>

        </tr>
      </thead>
    <tbody>";

/* display rows */
/*
foreach ($accounts as $account) {
    echo "      <tr>
        <td>{$account['name']}</td>
        <td>{$account['type']}</td>
        <td>{$account['number']}</td>
        <td><a href=\"#\" class=\"btn btn-sm btn-warning\"><span class=\"delete\"></span>Edit</a></td>
        <td><a href=\"#\" class=\"btn btn-sm btn-danger\"><span class=\"delete\"></span>Delete</a></td>
      </tr>";
}
 * */
 
foreach ($accounts as $account) {
    echo "      <tr>
        <td>{$account['dailySpendingLimit']}</td>
        <td>{$account['weeklySpendingLimit']}</td>
        <td>{$account['weeklySpendingLImit']}</td>


      </tr>";
}

/* end table */
echo "    </tbody>
  </table>
</div>";


} else {
    
    
  

    //temporary variables until have real session variables
    $_SESSION[userName] = "user1"; 
    $_SESSION[userP_Id] = 333;
    
    //add_income($userP_Id, $userName, $dateDay, $dateMonth, $dateYear, $recurrence, $amount, $con);
    if($_POST['select_limit_type'] == "daily")
    {
        
        setDailySpendingLimit($_POST['limitamount'], $con);
        
        echo "limit<<".$_POST['limitamount'];
        
    }
    else if($_POST['select_limit_type'] == "weekly")
    {
        setWeeklySpendingLimit($_POST['limitamount'], $con);
    }
    else if ($_POST['select_limit_type'] == "monthly")
    {
        
        setMonthlySpendingLimit($_POST['limitamount'], $con);
        
    }
    
    /* store data in an array */
    $account = $_POST;
    /* TODO: insert into database */
    /* temporarily display contents of array */
    echo '<pre>';
    print_r($account);
    echo '</pre>';
    echo '<a href="" class="btn btn-primary">Go back</a>';
}

/* display html page footer */
display_footer();

?>
