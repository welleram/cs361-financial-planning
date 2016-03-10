<?php
session_start();

require("PasswordHash.php");
$hasher = new PasswordHash(8, false);

if ($_SERVER['REQUEST_METHOD'] != "POST") {
	header('Location: index.php');
}
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$action = $_POST['action'];

	$mysql_db_hostname = "oniddb.cws.oregonstate.edu";
	$mysql_db_user = "vlaskint-db";
	$mysql_db_password = "tb0NGWMdrkGhe2mA";
	$mysql_db_database = "vlaskint-db";

$con = mysql_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password) or die("Could not connect database");
mysql_select_db($mysql_db_database, $con) or die("Could not select database");

$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$firstname = mysql_real_escape_string($firstname);
$lastname = mysql_real_escape_string($lastname);
$email = mysql_real_escape_string($email);
//http://php.net/manual/en/faq.passwords.php
$hash = $hasher->HashPassword($password);

if ($action == "login") {
	//$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	$query = "SELECT * FROM user WHERE username='$username'";
	$result = mysql_query($query)or die(mysql_error());
	$num_row = mysql_num_rows($result);
	$row = mysql_fetch_array($result);
	if($num_row >= 1 && $hasher->CheckPassword($password, $row['password'])) {
		$_SESSION['username'] = $row['username'];
		echo 'true';
	}
	else{
		echo 'false';
	}
} elseif ($action == "register") {
	$query = "SELECT * FROM user WHERE username='$username'";
	$result = mysql_query($query)or die(mysql_error());
	$num_row = mysql_num_rows($result);
	$row = mysql_fetch_array($result);
	if( $num_row == 0 ) {
		$result = mysql_query("INSERT INTO user (username, password, email, firstname, lastname) VALUES ('{$username}', '{$hash}', '{$email}','{$firstname}','{$lastname}')");
		$_SESSION['username'] = $username;
		
		echo 'true';
	}
	else{
		echo 'false';
	}
}
?>