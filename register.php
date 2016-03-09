<!DOCTYPE html>

<?php
/* shared functions */
require 'financial_planning.php';
/* display html page header */
display_header_login();

?>
<html>
<head>
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
    <!-- Full Width Image Header with Logo -->
    <!-- Image backgrounds are set within the full-width-pics.css file. -->
    <header class="image-bg-fluid-height">
        <img class="bg" src="img/3.png"  height="280" alt="">

    </header>

			<form action="verify.php" class="form-horizontal">
				<legend id="add_account_title"> <h1> Registration Form </h1></legend>

								<div class="form-group">
									<label for="usernamesignup" class="col-md-4 control-label" >Username:  (must be at least 6 characters long) </label>
                                     <div class="col-md-4">
										<input id="username" name="username" required="required" type="text" placeholder="Username" class="form-control input-md" />
									</div>
								</div>


							<div class="form-group">
                                    <label for="firstname" class="col-md-4 control-label" data-icon="u">First name: </label>
									 <div class="col-md-4">
                                    <input id="firstname" name="firstname" required="required" type="text" placeholder="first name" class="form-control input-md"/>
							</div>
							</div>



								<div class="form-group">
								  <label for="lastname" class="col-md-4 control-label" data-icon="u">Last name: </label>
								   <div class="col-md-4">
                                    <input id="lastname" name="lastname" required="required" type="text" placeholder="last name" class="form-control input-md"/>
                                </div>
								</div>
                               <div class="form-group">
                                    <label for="email" class="col-md-4 control-label" data-icon="e" >Email: (must be a valid email)</label>
									 <div class="col-md-4">
                                    <input id="email" name="email" required="required" type="email" placeholder="email" class="form-control input-md"/>
                                </div>
								</div>
								<div class="form-group">
                                    <label for="password" class="col-md-4 control-label" data-icon="p">Password: <span> (must be at least 8 characters long)</span></label>
									 <div class="col-md-4">
                                    <input id="password" name="password" required="required" type="password" placeholder="password" class="form-control input-md"/>
                                </div>
								</div>
                              <div class="form-group">
                                    <label for="passwordsignup_confirm" class="col-md-4 control-label" data-icon="p">Please confirm your password:(must match the password above)</label>
                                     <div class="col-md-4">
									<input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="password"class="form-control input-md"/>
                                </div>
								</div>

								<div class="form-group">
								 <label class="col-md-4 control-label" for="register_button"></label>
								<div class="col-md-4">
									<input type="submit" value="REGISTER" id="register_button" class="btn btn-primary"/>
								</div>
								</div>
								<br>
								<font color="red"><div class="err" id="alert"></div></font>

									Already a member ?
									<a href="login.php" class="to_register"><font size=4>Log in </font></a>


			</form>



</body>
<?php
display_footer();;
?>
</html>
