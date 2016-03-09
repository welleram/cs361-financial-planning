<?php
ini_set('display_errors',1);
error_reporting(E_ALL ^ E_DEPRECATED);

if ($_SERVER['REQUEST_METHOD'] != "POST") {
	header('Location: index.html');
}

session_start();

if(!isset($_SESSION['username'])){
	header('Location: index.html');
}
$username = $_SESSION['username'];
?>
<?php
if ($_SERVER['REQUEST_METHOD'] != "POST") {
	header('Location: add_account_tatyana.php');
}

$select_account_type = $_POST['select_account_type'];
$accountname = $_POST['accountname'];
$accountbalance = $_POST['accountbalance'];
$accountnum = $_POST['accountnum'];
$accountusername = $_POST['accountusername'];
$passwordinput = $_POST['passwordinput'];
//$username = $_POST['username'];
$username = $_SESSION['username'];

	$mysql_db_hostname = "oniddb.cws.oregonstate.edu";
	$mysql_db_user = "vlaskint-db";
	$mysql_db_password = "tb0NGWMdrkGhe2mA";
	$mysql_db_database = "vlaskint-db";

$con = mysql_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password) or die("Could not connect database");
mysql_select_db($mysql_db_database, $con) or die("Could not select database");


$select_account_type = mysql_real_escape_string($select_account_type);
$accountname = mysql_real_escape_string($accountname);
$accountbalance = mysql_real_escape_string($accountbalance);
$accountnum  = mysql_real_escape_string($accountnum );
$accountusername = mysql_real_escape_string($accountusername);
$passwordinput = mysql_real_escape_string($passwordinput);
$username  = mysql_real_escape_string($username);

	$query = "SELECT * FROM Accounts WHERE accountName='$accountname'";
	$result = mysql_query($query)or die(mysql_error());
	$num_row = mysql_num_rows($result);
	$row = mysql_fetch_array($result);
	if( $num_row == 0 ) {
		$result = mysql_query("INSERT INTO Accounts (username, accountName, accountType, accountNumber, accountBalance,accountUsername, accountPassword) VALUES ('{$username}', '{$accountname}', '{$select_account_type}','{$accountnum }','{$accountbalance }','{$accountusername }','{$passwordinput }')");
		
		echo 'true';
	}
	else{
		echo 'false';
	}
?>