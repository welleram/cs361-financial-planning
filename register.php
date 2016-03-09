<!DOCTYPE html>


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
	<title>Registration Form</title>
<script type="text/javascript">
$(document).ready(function(){
   	$("#register_button").click(function(){
		username = $("#username").val();
        password = $("#password").val();
		email = $("#email").val();
		firstname = $("#firstname").val();
		lastname = $("#lastname").val();
		passwordsignup_confirm = $("#passwordsignup_confirm").val();
		action = "register";

		var atpos = email.indexOf("@");
        var dotpos = email.lastIndexOf(".");

		if (username.length < 6){
			$("#alert").html("Username must be at least 6 characters long.");
		} else if (password.length < 8){
			$("#alert").html("Password must be at least 8 characters long.");
		} else if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length){
            $("#alert").html("Not a valid e-mail address.");
		} else if (password != passwordsignup_confirm){
            $("#alert").html("Passwords do NOT match.");
        } else {
			$.ajax({
				type: "POST",
				url: "verify.php",
				data: {'username': username, 'password': password, 'email': email, 'action': action, 'lastname': lastname, 'firstname': firstname},
				//http://ankurm.com/ajax-loading-overlay/ -- awesome ajax tutorial
				success: function(html){
					if( html=='true'){
						window.location="login.php";
					} else {
						$("#alert").html("This username is not available.");
					}
				},
				beforeSend:function(){
					$("#alert").html("Loading...");
				}
			});
		}
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
				 <h1> Registration Form </h1>
                                <p>
                                    <label for="usernamesignup" class="uname" data-icon="u">Username: <span> (must be at least 6 characters long) </span></label>
                                    <input id="username" name="username" required="required" type="text" placeholder="Username" />
                                </p>
								<p>
                                    <label for="firstname" class="firstname" data-icon="u">First name: </label>
                                    <input id="firstname" name="firstname" required="required" type="text" placeholder="first name" />
								</p>
								<p>
								  <label for="lastname" class="lastname" data-icon="u">Last name: </label>
                                    <input id="lastname" name="lastname" required="required" type="text" placeholder="last name" />
                                </p>
                                <p>
                                    <label for="email" class="youmail" data-icon="e" >Email: (must be a valid email)</label>
                                    <input id="email" name="email" required="required" type="email" placeholder="email"/>
                                </p>
								<p>
                                    <label for="password" class="youpasswd" data-icon="p">Password: <span> (must be at least 8 characters long)</span></label>
                                    <input id="password" name="password" required="required" type="password" placeholder="password"/>
                                </p>
                                <p>
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password:(must match the password above)</label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="password"/>
                                </p>


								<div>
									<input type="submit" value="REGISTER" id="register_button" />
								</div>
								<br>
								<font color="red"><div class="err" id="alert"></div></font>
								<br>
                                <p>
									Already a member ?
									<a href="login.php" class="to_register"><font size=4>Log in </font></a>
								</p><br><br>






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
