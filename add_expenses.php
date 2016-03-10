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
    print_file('add_expenses.html');
    
    
   //temporary variables until have real session variables
    $_SESSION[userName] = "user1"; 
    $_SESSION[userP_Id] = 333;
    
    $result = mysqli_query($con, "SELECT * FROM Expenses WHERE userName='$_SESSION[userName]'");
    $accounts = $result;



/* begin accounts table */
echo "<div id=\"inner\">
  <table class=\"demo\">
    <legend>View/Edit Incomes</legend>
      <thead>
        <tr>
          <th>Day</th>
          <th>Month</th>
          <th>Year</th>
          <th>Account Name</th>
          <th>Amount</th>
          <th colspan=\"2\">&nbsp;</th>
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
        <td>{$account['dateDay']}</td>
        <td>{$account['dateMonth']}</td>
        <td>{$account['dateYear']}</td>
        <td>{$account['amount']}</td>
        <td><a href=\"#\" class=\"btn btn-sm btn-warning\"><span class=\"delete\"></span>Edit</a></td>
        <td><a href=\"#\" class=\"btn btn-sm btn-danger\"><span class=\"delete\"></span>Delete</a></td>
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
    add_expense($_SESSION[userP_Id], $_SESSION[userName], $_POST[day], $_POST[month], $_POST[year], $_POST[recurrence], $_POST[amount], $con);

    
    
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
