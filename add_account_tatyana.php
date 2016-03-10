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
	   	$("#add_account_button").click(function(){
			select_account_type = $("#select_account_type").val();
			accountname = $("#accountname").val();
			accountbalance = $("#accountbalance").val();
			accountnum = $("#accountnum").val();
			accountusername = $("#accountusername").val();
			accountnum_verify = $("#accountnum_verify").val();
			passwordinput = $("#passwordinput").val();
	
		
		if (accountusername.length < 4){
			$("#alert").html("User account name must be at least 4 characters long.");
		} else if (passwordinput.length < 8){
			$("#alert").html("Password must be at least 8 characters long.");
		} else if (accountnum != accountnum_verify){
            $("#alert").html("Account Numbers do not match do NOT match.");	
        } else {
			$.ajax({
				type: "POST",
				url: "add_account_database.php",
				data: {'select_account_type': select_account_type, 'accountname': accountname, 'accountbalance': accountbalance, 'accountnum': accountnum, 'accountusername': accountusername, 'passwordinput': passwordinput},
				//http://ankurm.com/ajax-loading-overlay/ -- awesome ajax tutorial
				success: function(html){
					if( html=='true'){
						window.location="view_edit_account.php";
					} else {
						$("#alert").html("This user account name is not available.");
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
        <img class="bg" src="3.png"  height="280" alt="">
		
    </header>
				
			<form action="add_account_database.php" class="form-horizontal" method="post">
				<legend id="add_account_title"> <h1> Add Account </h1></legend> 
				
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Account Type</label>
  <div class="col-md-4">
    <select id="select_account_type" name="select_account_type" class="form-control">
      <option value="" disabled selected>Please select...</option>
      <option value="checking">Checking</option>
      <option value="savings">Savings</option>
      <option value="investment">Investment/Brokerage</option>
      <option value="creditcard">Credit Card</option>
      <option value="other">Other Loan</option>
    </select>
  </div>
</div>
                              
								<div class="form-group">
									<label for="accountname" class="col-md-4 control-label" >Account Name </label>
                                     <div class="col-md-4">
										<input id="accountname" name="accountname" required="required" type="text" placeholder="Account Name" class="form-control input-md" />
									</div>
								</div>
                           

							<div class="form-group">
                                    <label for="accountbalance" class="col-md-4 control-label" data-icon="u">Account Balance: </label>
									 <div class="col-md-4">
                                    <input id="accountbalance" name="accountbalance" required="required" type="text" placeholder="Account Balance" class="form-control input-md"/>
							</div>	
							</div>


								
								<div class="form-group">
								  <label for="accountnum" class="col-md-4 control-label" data-icon="u">Account Number: </label>
								   <div class="col-md-4">
                                    <input id="accountnum" name="accountnum" required="required" type="text" placeholder="Account Number" class="form-control input-md"/>
                                </div>
								</div>
                               <div class="form-group">
                                    <label for="accountnum_verify" class="col-md-4 control-label" data-icon="e" >Verify Account Number</label>
									 <div class="col-md-4">
                                    <input id="accountnum_verify" name="accountnum_verify" required="required"  placeholder="Verify Account Number" class="form-control input-md"/> 
                                </div>
								</div>
								<div class="form-group"> 
                                    <label for="accountusername" class="col-md-4 control-label" data-icon="p">Banking Username: </label>
									 <div class="col-md-4">
                                    <input id="accountusername" name="accountusername" required="required" placeholder="Banking Username" class="form-control input-md"/>
                                </div>     
								</div>								
                              <div class="form-group">
                                    <label for="passwordinput" class="col-md-4 control-label" data-icon="p">Banking password:</label>
                                     <div class="col-md-4">
									<input id="passwordinput" name="passwordinput" required="required" type="password" placeholder="Banking password"class="form-control input-md"/>
                                </div>
								</div>
													
								<div class="form-group">
								 <label class="col-md-4 control-label" for="add_account_button"></label>
								<div class="col-md-4">
									<input type="submit" value="Add Account" id="add_account_button" class="btn btn-primary"/>
								</div>
								</div>
								
								
							
								
								
								
								
														<font color="red"><div class="err" id="alert"></div></font>
						

							
			
			</form>
		

	
</body>
<?php
display_footer();;
?>
</html>