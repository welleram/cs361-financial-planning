<?php
  $q=$_GET["q"];
  $dbuser="vlaskint-db";
  $dbname="vlaskint-db";
  $dbpass="tb0NGWMdrkGhe2mA";
  $dbserver="oniddb.cws.oregonstate.edu";
	//http://sqlhints.com/tag/monthly-sum-data-in-sql-server/
  $sql_query = "SELECT dateYear, dateMonth, Sum(amount) AS PointSum FROM Incomes WHERE username = '$username' and dateYear= . $q . GROUP BY dateMonth, dateYear;";

  $con = mysql_connect($dbserver,$dbuser,$dbpass);
  if (!$con){ die('Could not connect: ' . mysql_error()); }
  mysql_select_db($dbname, $con);
  $result = mysql_query($sql_query);
  echo "<table><tr id='top_row'><th>Year</th><th>Month</th><th>Type</th><th>Total Income</th></tr>";
    echo "{ \"cols\": [ {\"dateYear\":\"\",\"dateMonth\":\"dateMonth\",\"dateMonth\":\"\",\"dateMonth\":\"string\"}, {\"id\":\"\",\"label\":\"PointSum\",\"pattern\":\"\",\"type\":\"number\"} ], \"rows\": [ ";
  $total_rows = mysql_num_rows($result);
  $row_num = 0;
  while($row = mysql_fetch_array($result)){
    $row_num++;
    if ($row_num == $total_rows){
      echo "{\"c\":[{\"v\":\"" . $row['dateYear'] . "-" . $row['dateMonth'] . "\",\"f\":null},{\"v\":" . $row['PointSum'] . ",\"f\":null}]}";
    } else {
      echo "{\"c\":[{\"v\":\"" . $row['dateYear'] . "-" . $row['dateMonth'] . "\",\"f\":null},{\"v\":" . $row['PointSum'] . ",\"f\":null}]}, ";
    }
  }
  echo " ] }";
  mysql_close($con);
?>