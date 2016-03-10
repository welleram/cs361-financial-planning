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


	<?php
	if ($_POST['add'] == "Add Expense"){

        if (($_POST['expenseType'] == '') || ($_POST['dateDay'] == '') || ($_POST['dateMonth'] == '') || ($_POST['dateYear'] == '') || ($_POST['recurrence'] == '') || ($_POST['amount'] == '') || ($_POST['account'] == '')) {
            echo "<span>" . "Information not added to database because some fields were left empty. Click " . "<a href='add_income.php'>" . "here" . "</a>" . " to return." . "</span><br><br>";
            include('add_expense.php');
        } else {

            if(!($stmt = $mysqli->prepare(	"INSERT INTO Expenses(username,expenseType, dateDay, dateMonth, dateYear,recurrence,amount,P_Id2)
                                            VALUES (?,?,?,?,?,?,?,?)"))){
                echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
            }

            if(!($stmt->bind_param("sssssssi",$username, $_POST['expenseType'],$_POST['dateDay'],$_POST['dateMonth'],$_POST['dateYear'],$_POST['recurrence'],$_POST['amount'],$_POST['account']))){
                echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
            }

            if(!$stmt->execute()){
                echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
            } else {
                
                echo "<span>" . "Added '" . $_POST['expenseType'] . " " . $_POST['dateDay'] . "' to Expense." . "</span>";
            }
        }
	}

	?>
</body>
<?php
display_footer();;
?>
</html>