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
  <script type="text/javascript">
  

  // Load the Visualization API and the piechart,table package.
  google.load('visualization', '1', {'packages':['corechart','table']});

  function drawItems(num) {
    var jsonPieChartData = $.ajax({
      url: "getpiechartdata.php",
      data: "q="+num,
      dataType:"json",
      async: false
    }).responseText;

    var jsonTableData = $.ajax({
      url: "gettabledata.php",
      data: "q="+num,
      dataType:"json",
      async: false
    }).responseText;

    // Create our data table out of JSON data loaded from server.
    var piechartdata = new google.visualization.DataTable(jsonPieChartData);
    var tabledata = new google.visualization.DataTable(jsonTableData);

    // Instantiate and draw our pie chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(piechartdata, {
      width: 700,
      height: 500,
      chartArea: { left:"5%",top:"5%",width:"90%",height:"90%" }
    });

    // Instantiate and draw our table, passing in some options.
    var table = new google.visualization.Table(document.getElementById('table_div'));
    table.draw(tabledata, {showRowNumber: true, alternatingRowStyle: true});
  }

  </script>
</head>
<body>
  <form>
  <select name="users" onchange="drawItems(this.value)">
  <option value="">Select a Year to see Income Pie Chart per Month:</option>
  <?php
  
  
  
    $dbuser="vlaskint-db";
    $dbname="vlaskint-db";
    $dbpass="tb0NGWMdrkGhe2mA";
    $dbserver="oniddb.cws.oregonstate.edu";
	
    // Make a MySQL Connection
    $con = mysql_connect($dbserver, $dbuser, $dbpass) or die(mysql_error());
    mysql_select_db($dbname) or die(mysql_error());
    // Create a Query
    $sql_query = "SELECT dateMonth, dateYear, amount FROM Incomes WHERE username = '$username'";
    // Execute query
    $result = mysql_query($sql_query) or die(mysql_error());
    while ($row = mysql_fetch_array($result)){
    echo '<option value='. $row['dateYear'] . '>'. $row['dateYear'] . '</option>';
    }
    mysql_close($con);
  ?>
  </select>
  </form>
  <div id="chart_div"></div>
  <div id="table_div"></div>
</body>
<?php
display_footer();;
?>
</html>