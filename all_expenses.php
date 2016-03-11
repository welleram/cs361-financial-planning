<?php
ini_set('display_errors',1);

session_start();

if(!isset($_SESSION['username'])){
	header('Location: index.html');
}
$username = $_SESSION['username'];
/* shared functions */
require 'financial_planning.php';
/* display html page header */
display_header();
?>
<!DOCTYPE html>
<!--

-->
<html>
<head>
	<title>Activities</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="text/javascript" src="js/jquery.js"></script>
	
		 <link rel="shortcut icon" href="../favicon.ico"> 

				    <script src = "dropdown.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
		<style>
.bg
{
  width: 100%;
  z-index: 0;
}
.imageContainer {
       width:200px; 
       height:200px; 
       background-image: 3.pgn;
 }
</style>
	<script>
		var username = "<?php echo $username; ?>";
		$(document).ready(function(){	
			$("#header1").append(username + "!");
		});
	</script>
	<style>

	
	</style>
</head>
<body>
    <header class="image-bg-fluid-height">
        <img class="bg" src="3.png"  height="280" alt="">
		
    </header>
	<header>
	
		
	<legend id="add_account_title"> <h1 id = "header1">All your spending, </h1></legend>

	
	<?php
	$mysql_db_hostname = "oniddb.cws.oregonstate.edu";
	$mysql_db_user = "vlaskint-db";
	$mysql_db_password = "tb0NGWMdrkGhe2mA";
	$mysql_db_database = "vlaskint-db";

	//http://www.sitepoint.com/avoid-the-original-mysql-extension-1/
	$con = mysqli_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password) or die("Could not connect database");

	mysqli_select_db($con, $mysql_db_database) or die("Could not select database");
	//mysqli_select_db($mysql_db_database, $con) or die("Could not select database");
	
	// Procedural API connection method #1
	//$db = mysqli_connect('host', 'username', 'password');
	//mysqli_select_db($con, $mysql_db_database);
	
	//http://php.net/manual/en/mysqli.query.php
	//http://stackoverflow.com/questions/20875113/php-mysql-select-using-mysqli-query
	//http://stackoverflow.com/questions/20875113/php-mysql-select-using-mysqli-query
	//http://www.w3schools.com/php/func_mysqli_num_rows.asp

$query = "SELECT expenseType, dateDay, dateMonth,  dateYear, recurrence, amount FROM Expenses WHERE username = '$username'";
$result = mysqli_query($con, $query)or die(mysqli_error($con));
$num_row = mysqli_num_rows($result);
	
	echo "<table><tr id='top_row'><th>Expence Type</th><th>Date</th><th>Month</th><th>Year</th><th>Recurence</th><th>Amount</th></tr>";
	while ($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>" . $row['expenseType'] . "</td>";
		echo "<td>" . $row['dateDay'] . "</td>";
		echo "<td>" . $row['dateMonth'] . "</td>";
		echo "<td>" . $row['dateYear'] . "</td>";
		echo "<td>" . $row['recurrence'] . "</td>";
		echo "<td>" . $row['amount'] . "</td>";
		
		
	}
	echo "</table>";
?>



</div>
</body>
<?php
display_footer();;
?>
</html>







