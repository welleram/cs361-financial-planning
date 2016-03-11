<?php
	ini_set('display_errors',1);

	session_start();

	if(!isset($_SESSION['username'])){
		header('Location: index.php');
	}
	if ($_SERVER['REQUEST_METHOD'] != "POST") {
		header('Location: view_edit_account.php');
	}
	
	$accountName = $_POST['accountName'];
	$type = $_POST['type'];
	$dbhost = "oniddb.cws.oregonstate.edu";
	$dbname = "vlaskint-db";
	$dbpass = "tb0NGWMdrkGhe2mA";
	$dbuser = "vlaskint-db";
	

	$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	} 
	else {
		if ($type == "delete"){
			mysqli_query($con, "DELETE FROM Accounts WHERE accountName='$accountName'");
			header('Location: view_edit_account.php');			
		}
	}
		
?>