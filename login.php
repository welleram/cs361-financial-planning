<!DOCTYPE html>
<!--

-->
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


    <!-- Full Width Image Header with Logo -->
    <!-- Image backgrounds are set within the full-width-pics.css file. -->
    <header class="image-bg-fluid-height">
        <img class="bg" src="3.png"  height="300" alt="">

    </header>
	<br>
	<br>



  <div class="container">
            <section>
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <div id="wrapper">

			<form action="verify.php" class="form-horizontal">
				<legend id="add_account_title"> <h1> Welcome Back </h1> </legend>
								<div class="form-group" >
                                    <label for="username" class="col-md-4 control-label" >Username: </label>
									 <div class="col-md-4">
                                    <input id="username" name="username" required="required" type="text" placeholder="username" class="form-control input-md"/>
                                </div>
								</div>

								<div class="form-group">
									<label for="password" class="col-md-4 control-label" >Password: </label>
                                     <div class="col-md-4">
										<input id="password" name="password" required="required" type="text" placeholder="password" class="form-control input-md" />
									</div>
								</div>


								<div class="form-group">
								 <label class="col-md-4 control-label" for="login_button"></label>
								<div class="col-md-4">
									<input type="submit" value="LOGIN" id="login_button" class="btn btn-primary" />
								</div>
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


</body>
<?php
display_footer();;
?>
</html>
