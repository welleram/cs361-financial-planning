<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","vlaskint-db","tb0NGWMdrkGhe2mA","vlaskint-db");
if($mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
?>
<?php
ini_set('display_errors',1);

session_start();

if(!isset($_SESSION['username'])){
	header('Location: index.php');
}
$username = $_SESSION['username'];
?>
<?php
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
	<title>Add Income</title>
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
</head>
<body>
  <!-- Full Width Image Header with Logo -->
    <!-- Image backgrounds are set within the full-width-pics.css file. -->
    <header class="image-bg-fluid-height">
        <img class="bg" src="3.png"  height="280" alt="">
		
    </header>
				
						<legend id="add_account_title"> <h1> Add Income </h1></legend> 
 
	<div>
		<form name="addIncome" method="post" action="add_income_database.php" class="form-horizontal">
		
		<fieldset>
		
		<!-- we need to choose an account where the money will go 1 -->
				<p>Chose account where income will be allocated: <select name="account">
				<?php
				if(!($stmt = $mysqli->prepare(	"SELECT P_Id, username, accountName, accountType, accountBalance
												FROM Accounts WHERE username='$username'"))){
				echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->execute()){
					echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->bind_result($P_Id, $username,  $accountName, $accountType, $accountBalance)){
					echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
				}
				while($stmt->fetch()){
					echo '<option value=" '. $P_Id . ' "> ' . $username . ', ' . $accountName . ', ' . $accountType . ', ' . $accountBalance . '</option>\n';
				}
				$stmt->close();
				
				?>
				</select>
				<p class="caption">If you do not see account please add account first.</p></p>
		

	
		<!-- Select Basic 1 -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Income Type</label>
  <div class="col-md-4">
    <select id="select_income_type" class="form-control" name = "incomeType">
      <option value="" disabled selected>Please select...</option>
      <option value="work">Work Income</option>
      <option value="business">Business Income</option>
      <option value="investment">Investment Income</option>
      <option value="royalty">Royalty Income</option>
      <option value="other">Other</option>
    </select>
  </div>
</div>



<!-- Select Basic 2-->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Day</label>
  <div class="col-md-4">
    <select id="day" name="dateDay" class="form-control">
      <option value="" disabled selected>Please select...</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
    </select>
  </div>
</div>

<!-- Select Basic 3-->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Month</label>
  <div class="col-md-4">
    <select id="month" name="dateMonth" class="form-control">
      <option value="" disabled selected>Please select...</option>
      <option value="1">January</option>
      <option value="2">February</option>
      <option value="3">March</option>
      <option value="4">April</option>
      <option value="5">May</option>
      <option value="6">June</option>
      <option value="7">July</option>
      <option value="8">August</option>
      <option value="9">September</option>
      <option value="10">October</option>
      <option value="11">November</option>
      <option value="12">December</option>
    </select>
  </div>
</div>

<!-- Select Basic 4-->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Year</label>
  <div class="col-md-4">
    <select id="year" name="dateYear" class="form-control">
      <option value="" disabled selected>Please select...</option>
      <option value="2016">2016</option>
      <option value="2015">2015</option>
      <option value="2014">2014</option>
      <option value="2013">2013</option>
      <option value="2012">2012</option>
      <option value="2011">2011</option>
      <option value="2010">2010</option>
      <option value="2009">2009</option>
      <option value="2008">2008</option>
      <option value="2007">2007</option>
      <option value="2006">2006</option>
      <option value="2005">2005</option>
    </select>
  </div>
</div>

<!-- Select Basic 5-->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Recurrence</label>
  <div class="col-md-4">
    <select id="recurrence" name="recurrence" class="form-control">
      <option value="" disabled selected>Please select...</option>
      <option value="daily">Daily</option>
      <option value="weekly">Weekly</option>
      <option value="monthly">Monthly</option>
      <option value="norecurrence">No Recurrence</option>
    </select>
  </div>
</div>

<!-- Text input6-->
<div class="form-group">
  <label class="col-md-4 control-label" for="accountnum"></label>
  <div class="col-md-4">
  <input id="amount" name="amount" type="text" placeholder="Amount" class="form-control input-md" required="">

  </div>
</div>




<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="add" class="btn btn-primary" value = "Add income">Add Income</button>
  </div>
</div>
		
			
		
		
		</fieldset>
	
		</form>
	</div>
	<br>
	
	

	

</body>
<?php
display_footer();;
?>
</html>