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
<!DOCTYPE html>
<!--

-->
<html>
<head>
	<title>Overview of your finances</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="../favicon.ico"> 
				    <script src = "dropdown.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
	<script src="js/jquery.js"></script>
	<script>
		var username = "<?php echo $username; ?>";
		$(document).ready(function(){	
			$("#header1").append(username + "!");
		});
	</script>
	<style>
.bg
{
  width: 100%;
  z-index: 0;
}

	</style>
</head>
<body>
       

    <!-- Full Width Image Header with Logo -->
    <!-- Image backgrounds are set within the full-width-pics.css file. -->

    <header class="image-bg-fluid-height">
        <img class="bg" src="3.png"  height="250" style ="position: relative;" alt="">

		</header>
		
		<h1 id = "header1">OVERVIEW OF YOUR ACCOUNTS, </h1>

	<br>
	<br>

</body>
<?php
display_footer();;
?>
</html>