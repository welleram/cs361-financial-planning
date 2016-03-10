<?php
ini_set('display_errors',1);

session_start();

if(!isset($_SESSION['username'])){
	header('Location: index.html');
}
$username = $_SESSION['username'];
?>
<?php
/* shared functions */
require 'financial_planning.php';
/* display html page header */
display_header();

?>
<html>
<head>
  <!--Load the AJAX API-->
  <script type="text/javascript" src="http://www.google.com/jsapi"></script>
  <script type="text/javascript" src="jquery-1.9.1.min.js"></script>
  	<script type="text/javascript" src="js/jquery.js"></script>
	    <script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="js/Chart.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	
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

</head>
<body>



 <?php
	// Connect to the database
	// include '../includes/connect_209.php';
	// 209 has loader07
	define('DB_HOSTNAME', 'oniddb.cws.oregonstate.edu');
	define('DB_USERNAME', 'vlaskint-db');
	define('DB_PASSWORD', 'tb0NGWMdrkGhe2mA');
	define('DB_DATABASE', 'vlaskint-db');
	define('DB_LOGFILE', 'error_sql.log');
	$db_con=@mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
	// If the connection failed..
	if ($db_con==FALSE) {
		db_error('Sorry, couldn\'t connect to the SQL server.');
		exit(0);
	} else {
		mysqli_select_db($db_con, DB_DATABASE);
	}
	// Variables for SQL query

	// SQL query
	
	
	$sql= "SELECT expenseType, Sum(amount) AS PointSum FROM Expenses WHERE username = '$username' and dateYear= '2016' GROUP BY expenseType";
	
	if(!$result=$db_con->query($sql)) {
		die("Error running query [".$db_con->error."]");
	}
echo <<<STARTDOC
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
		// Load the Visualization API and the piechart package
      google.charts.load("current", {packages:["corechart"]});
		// Set a callback to run when API is loaded
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
		// Chart 1
        var data1  = google.visualization.arrayToDataTable([
          ['Rate', 'Information'],
STARTDOC;
// Parse the data
while($row = $result->fetch_assoc()) {
	echo "['".$row['expenseType']."',".$row['PointSum']."],";
}
$result->free();
echo <<<ENDDOC
        ]);

        var options1 = {
          title: 'Expenses by category in 2016 [ by category]',
          is3D: true,
        };
        var chart1 = new google.visualization.PieChart(document.getElementById('chart_div1'));
        chart1.draw(data1, options1);
      }
	  

    </script>
  </head>
  <body>
   <div id="chart_div1" style="width: 900px; height: 500px;"></div>

  </body>
</html>
ENDDOC;


	// End stuff
	$db_con->close();
?>

<?php
display_footer();;
?>

</body>
</html>








