<?php
ini_set('display_errors',1);

session_start();

if(!isset($_SESSION['username'])){
	header('Location: index.html');
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<!--

-->
<html>
<head>
	<title>Overview of your finances</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="../favicon.ico"> 
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
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
<h1> NAVIGATION BAR WILL GO HERE</h1>
                                <p>
									Logout-will be part of navigation bar- temporary placed here
									<a href="logout.php"><font size=4>Logout</font></a>
								</p>

    <!-- Full Width Image Header with Logo -->
    <!-- Image backgrounds are set within the full-width-pics.css file. -->

    <header class="image-bg-fluid-height">
        <img class="bg" src="3.png"  height="300" style ="position: relative;" alt="">

		</header>
		
		<h1 id = "header1">OVERVIEW OF YOUR ACCOUNTS, </h1>

	<br>
	<br>

</body>
</html>