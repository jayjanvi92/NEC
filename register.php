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
	</script>
    <script>
    $(document).ready(function() {
        $("#txtPhone").keypress(function(event) {
            var keycode = event.keyCode ? event.keyCode : event.which;

            if ((keycode < 48 || keycode > 57) && keycode !== 8 && keycode !== 37 && keycode !== 39) {
                event.preventDefault();
            }
			var inputValue = $(this).val();
            if (inputValue.length >= 10 && keycode !== 8) { // keycode 8 is for backspace
                event.preventDefault();
            }
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script language="javascript">

//Validating the form fields
$(document).ready(function () {
    $('#admfrm').validate({
        rules: {
            profileImage: {
                required: true,
                //extension: "jpg|jpeg|png|gif"
            },
            txtName: {
                required: true,
                minlength: 3,
            },
            txtEmail: {
                required: true,
                email: true,
                checkEmail:true // Custom callback function
            },
            txtPhone: {
                required: true,
                minlength: 10,
                maxlength: 10,
                digits: true,
                checkMobile: true // Custom callback function
            },
            txtPassword: {
                required: true,
                minlength: 6
            },
            txtCPassword: {
                required: true,
                minlength: 6,
                equalTo: '#txtPassword'
            },
            
        },
        messages: {
            profileImage: {
                required: 'Please select a profile picture',
               // extension: 'Only JPG, JPEG, PNG, or GIF files are allowed'
            },
            txtName: {
                required: 'Please enter first name',
                minlength: 3,
            },
            txtEmail: {
                required: 'Please enter your email',
                email: 'Please enter a valid email',
                checkEmail: 'Email already exists'
            },
            txtPassword: {
                required: 'Please enter a password',
                minlength: 'Password must be at least 6 characters long'
            },
            txtCPassword: {
                required: 'Please confirm your password',
                minlength: 'Password must   be at least 6 characters long',
                equalTo: 'Passwords do not match'
            },
            txtPhone: {
                required: 'Please enter your mobile number',
                minlength: 'Mobile number must be 10 digits long',
                maxlength: 'Mobile number must be 10 digits long',
                digits: 'Please enter only digits',
                checkMobile: 'Mobile number already exists'
            }
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element);
            
        }
    });

    // Custom validation method to check if the mobile number already exists
    $.validator.addMethod('checkMobile', function(value, element) {
        var isValid = true;
        
        // Make an AJAX request to check the mobile number availability
        $.ajax({
            type: 'POST',
            url: 'processUsers.php?trans=mobile', // URL to the server-side script
            data: { mobileNumber: value }, // Data to be sent to the server
            async: false, // Synchronous request to ensure validation is done before proceeding
            success: function(response) {
                // If the response is greater than 0, it means the mobile number already exists
                if (response > 0) {
                    isValid = false;
                }
            }
        });
        
        // Return whether the mobile number is valid (true if it doesn't exist, false if it exists)
        return isValid;
    }, 'Mobile number already exists'); // Error message displayed if mobile number already exists


    // Custom validation method to check if the email already exists
    $.validator.addMethod('checkEmail', function(value, element) {
        var isValidEmail = true;
        
        // Make an AJAX request to check the email availability
        $.ajax({
            type: 'POST',
            url: 'processUsers.php?trans=cmail', // URL to the server-side script
            data: { email: value }, // Data to be sent to the server
            async: false, // Synchronous request to ensure validation is done before proceeding
            success: function(response) {
                // If the response is not empty, it means the email already exists
                if (response != "") {
                    isValidEmail = false;
                }
            }
        });
        
        // Return whether the email is valid (true if it doesn't exist, false if it exists)
        return isValidEmail;
    }, 'Email already exists'); // Error message displayed if email already exists
    
});     
</script>
</head>

<body>

<!-- main body strats here -->
<div id="main_container">
	
<div class="topnav">
  <a href="login.php">Login</a>
  <a class="active"  href="register.php">Register</a>
   
</div>
    <!-- column right starts here -->
  <div id="" style="width: 70%;">
		
        <!-- login starts here -->
		<div class="login_form"  id="login_form">
		<h2>Register </h2>
        <!--Registration form-->
        <form name="admfrm" id="admfrm" action="processUsers.php?trans=ausr" method="post" enctype="multipart/form-data">
			<div id="errMessage" class="err-message"></div>
            <label>Profile Image</label>
            <input type="file" class="normal-control" id="profileImage" name="profileImage"><br /><br />
			<div id="preview"></div>
            <br />
            <label>Name</label>
			<input type="text" class="normal-control" name="txtName"  id="txtName" value="" /><br /><br />

            <label>Email</label>
			<input type="text" class="normal-control" name="txtEmail"  id="txtEmail" value="" /><br /><br />

            <label>Phone Number</label>
			<input type="text" class="normal-control" name="txtPhone"  id="txtPhone" value="" /><br /><br />

            <label>Password</label>
			<input type="password" class="normal-control" name="txtPassword"  id="txtPassword" value="" /><br/><br/>

            <label>Confirm Password</label>
            <input type="password" class="normal-control" name="txtCPassword"  id="txtCPassword" value="" /><br/><br/>
		   
            <input name="" type="submit" class="btn btn-primary" value="Save" id="btnLogin"/><br /><br /><br />
		   
           
           <br /><br /><br />
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
    #main_container {
        height: auto !important;
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
