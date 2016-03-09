<?php
/* submit_permission.php
 * Link an Account */
/* shared functions */
require 'financial_planning.php';
/* display html page header */
display_header();
/* display and process link account form */
if (!submitted()) {
    /* display link account form */
    print_file('link_account.html');
} else {
    $con=msqli(/* database info goes here */);
	if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$bank = $_POST['bank'];
	$accnum = $_POST['accountnum'];
	$username = $_POST['username'];
	$password = $_POST['passwordinput'];
	$user = $_SESSION['valid_user'];
	
	/* both of the sql statements down here are just approximations at this point, 
	* i haven't seen any formal definition of our bank table so i guess it's still up in the air */
	$balance = msqliquery($con,"SELECT balance FROM bank WHERE accountnum = '$accountnum'");
	
	$sql="INSERT INTO Accounts (P_Id, accountNumber, accountPassword, accountUsername, accountType, accountBalance)
	VALUES ('$user', '$accnum', '$password', '$username', 'Bank Account', '$balance')";
	
	if(!msqli_query($con,$sql)) {
		die('Error: ' . msqli_error($con));
	}
	
	msqli_close($con);
	echo "Account number ".$accnum." has been linked! Your balance was ".$balance.". ";

}
/* display html page footer */
display_footer();
?>