<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TEST PROJECT</title>

	<!-- stylesheets -->
  	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/media-queries.css" type="text/css" media="screen" />
	
	<script src="js/jquery-1.3.2.js" language="javascript"></script>
	<script language="javascript">
	$(document).ready(function(){
		$("#frmLogin").submit(function()
		{
			var a = validate();
			if(a != false)
			{
				//alert(data);
				$.ajax({
					
					type: "POST",				
					url: "processLogin.php?trans=login",
					data: "uName="+$.trim($("#txtUser").val())+"&pswrd="+$.trim($("#txtPassword").val()),
					error: function(request)
					{
						$('#errMessage').html("No Server Access !!");
					},
					beforeSend:function(data){ // Are not working with dataType:'jsonp'
					  $('#errMessage').html("Validating...<img style='margin: 10px 0px 10px 0px;height:20px;width:20px;' align='absmiddle' src='images/ajax-loader.gif'>");
					},
					success: function(msg)
					{
						
						//alert(msg);
						if (msg == 1)
						{
							$('#login_form').html("<p>You have successfully logged in !! <br> Please Wait...<img style='margin: 10px 0px 10px 0px;' align='absmiddle' src='images/ajax-loader.gif'></p>")
							setTimeout('go_to_private_page()', 3000);
							return true;
						} else if(msg==2) {
							$('#errMessage').html("Invalid User !!");
							
						} else if (msg == 0) {
							$('#login_form').html("<p>You have successfully logged in !! <br> Please Wait...<img style='margin: 10px 0px 10px 0px;' align='absmiddle' src='images/ajax-loader.gif'></p>")
							return true;
						}
					}
				});
			}
			return false;
		});
	});

	function go_to_private_page()
	{
		//alert("Inside");
		window.location = 'usermaster.php'; // Home page Area
	}
	function go_to_first_time_login_page()
	{
		//alert("Frsrtt time");
		window.location = 'changepassword.php'; // Home page Area
	}



	function validate()
	{
		var state	=	true;
		if($.trim($("#txtUser").val()) == "Username")
		{
			$("#txtUser").addClass("user_validate");
			//$("#txtUser").focus();
			state	= false;
			//return false;

		}
		else{$("#txtUser").removeClass("user_validate"); $("#txtUser").addClass("normal-control");}
		
		if($.trim($("#txtPassword").val()) == "Password")
		{
			//alert("Password cannot be blank");/
			$("#txtPassword").addClass("user_validate");
			//$("#txtPassword").focus();
			state	=	false;
			//return false;
		}
		else{$("#txtPassword").removeClass("user_validate"); $("#txtPassword").addClass("normal-control");}
		return state;
	}
	</script>
</head>

<body>

<!-- main body strats here -->
<div id="main_container">
	
<div class="topnav">
<a class="active" href="login.php">Login</a>
  <a href="register.php">Register</a>
   
</div>
    <!-- column right starts here -->
  <div id="" style="width: 50%;">
		
        <!-- login starts here -->
		<div class="login_form"  id="login_form">
			<?php
				// Check if success message exists in session
				if (isset($_SESSION['success_message'])) {
					// Display the success message
					echo "<div style='color:green;'>".$_SESSION['success_message']."</div>";
				
					// Unset the success message to prevent it from displaying again on page refresh
					unset($_SESSION['success_message']);
				}
			?>
			<h2>Login </h2>
			<form name="frmLogin" id="frmLogin">
			<div id="errMessage" class="err-message"></div>
			<input type="textbox" class="normal-control" name="txtUser"  id="txtUser" value="Username" onfocus="if (this.value == 'Username') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Username';}"/><br /><br /><br />
			<input type="password" class="normal-control" name="txtPassword"  id="txtPassword" value="Password" onfocus="if (this.value == 'Password') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Password';}"/><br/><br/><br/>
		   <input name="" type="submit" class="btn btn-primary" value="LOGIN" id="btnLogin"/><br /><br /><br />
		   
		  </form>
        </div>
		
        <!-- login ends here -->
		
    
  </div>
</div>
<!-- main body ends here -->

</body>
<style>
	.btn {
		background-color: #04AA6D; /* Green */
		border: none;
		color: white;
		padding: 10px 15px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		border-radius: 10px;
	}
	.topnav {
	overflow: hidden;
	background-color: #e9e9e9;
	}

	/* Navbar links */
	.topnav a {
	float: right;
	display: block;
	color: black;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
	font-size: 17px;
	}

	/* Navbar links on mouse-over */
	.topnav a:hover {
	background-color: #ddd;
	color: black;
	}

	/* Active/current link */
	.topnav a.active {
	background-color: #2196F3;
	color: white;
	}

	/* Style the input container */
	.topnav .login-container {
	float: right;
	}

	/* Style the input field inside the navbar */
	.topnav input[type=text] {
	padding: 6px;
	margin-top: 8px;
	font-size: 17px;
	border: none;
	width: 150px; /* adjust as needed (as long as it doesn't break the topnav) */
	}

	/* Style the button inside the input container */
	.topnav .login-container button {
	float: right;
	padding: 6px;
	margin-top: 8px;
	margin-right: 16px;
	background: #ddd;
	font-size: 17px;
	border: none;
	cursor: pointer;
	}

	.topnav .login-container button:hover {
	background: #ccc;
	}

</style>
</html>
