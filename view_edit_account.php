<?php

/* view_edit_account.php
 * view and edit accounts */

/* shared functions */
require 'financial_planning.php';
require 'jsmith_functions.php';

$_SESSION[userName] = "user1";

$result = mysqli_query($con, "SELECT * FROM Accounts WHERE userName='$_SESSION[userName]'");
$accounts = $result;

while ($row = mysqli_fetch_array($result))
{
	echo $row['accountName'] . " " . $row['accountNumber'];
	
	echo "<br>";
}

/* get sample data from array */
/* TODO: select from database */
/*
$accounts = [["name"   => "Bank of America",
              "type"   => "Checking",
              "number" => "112233-445566"],
             ["name"   => "Chase Bank",
              "type"   => "Savings",
              "number" => "112233-445566"],
             ["name"   => "Ford Credit",
              "type"   => "Auto Loans",
              "number" => "112233-445566"],
             ["name"   => "Capital One",
              "type"   => "Credit Card",
              "number" => "112233-445566"],
             ["name"   => "Charles Schwab",
              "type"   => "Brokerage",
              "number" => "112233-445566"],
             ["name"   => "Fidelity",
              "type"   => "401K",
              "number" => "112233-445566"],
             ["name"   => "Quicken Loans",
              "type"   => "Mortgate",
              "number" => "112233-445566"]];

*/

/* display html page header */
display_header();

/* begin accounts table */
echo "<div id=\"inner\">
  <table class=\"demo\">
    <legend>View/Edit Accounts</legend>
      <thead>
        <tr>
          <th>Bank Name</th>
          <th>Account Type</th>
          <th>Account Number</th>
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
        <td>{$account['accountName']}</td>
        <td>{$account['accountType']}</td>
        <td>{$account['accountNumber']}</td>
        <td><a href=\"#\" class=\"btn btn-sm btn-warning\"><span class=\"delete\"></span>Edit</a></td>
        <td><a href=\"#\" class=\"btn btn-sm btn-danger\"><span class=\"delete\"></span>Delete</a></td>
      </tr>";
}

/* end table */
echo "    </tbody>
  </table>
</div>";

/* display html page footer */
display_footer();

?>
