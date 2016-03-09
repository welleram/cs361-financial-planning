<!DOCTYPE html>
<!--

-->
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="shortcut icon" href="../favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
	<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
	<style>
		.bg {
  	width: 100%;
  	z-index: 0;
		}
		.imageContainer {
       width:200px;
       height:200px;
       background-image: 3.pgn;
 	 }
	 </style>
	<title>Login Form</title>
<script type="text/javascript">
$(document).ready(function(){
   $("#login_button").click(function(){
		username = $("#username").val();
        password = $("#password").val();
		action = "login";

         $.ajax({
            type: "POST",
			url: "verify.php",
            data: {'username': username, 'password': password, 'action': action},
			//taken from http://ankurm.com/ajax-loading-overlay/ -- awesome ajax tutorial
            success: function(html){
				if (html=='true'){
					window.location="overview.php";
				} else {
					$("#alert").html("Wrong username or password");
				}
            },
            beforeSend:function() {
                $("#alert").html("Loading...");
            }
        });
         return false;
    });
});
</script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" id="header">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">Finances</a>
		</div>
	</nav><br><br><br>
    <!-- Full Width Image Header with Logo -->
    <!-- Image backgrounds are set within the full-width-pics.css file. -->
    <header class="image-bg-fluid-height">
        <img class="bg" src="img/3.png"  height="300" alt="">

    </header>
	<br>
	<br>



  <div class="container">
            <section>
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <div id="wrapper">

			<form action="verify.php">
				 <h1> Welcome Back </h1>
								<p>
                                    <label for="username" class="uname" data-icon="u" >Username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="username"/>
                                </p>
                                <p>
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="password" />
                                </p>
								<div>
									<input type="submit" value="LOGIN" id="login_button" />
								</div>

								<br>
								<font color="red"><div class="err" id="alert"></div></font>
								<br>
                                <p>
									Not a member yet ?
									<a href="register.php" class="to_register"><font size=4>Sign up </font></a>
								</p>






			</form>

			</div>
	</div>
	</section>
	</div>
	<nav class="navbar navbar-inverse navbar-fixed-bottom" id="footer">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Footer</a>
			</div>
		</div>
	</nav>
</body>
</html>
