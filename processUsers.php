<?php
session_start();
include("classes/connection.php");
include("classes/cls_users.php");

$objUser = new users(); 

$Transaction	=	"";
if(ISSET($_POST['trans']))
{
	$Transaction	=	$_POST['trans'];
}

if(ISSET($_GET['trans']))
{
	$Transaction	=	$_GET['trans'];
}


if($Transaction=="ausr") // Check if the transaction is for user creation
{

	// Set the directory for file uploads
    $targetDir = "uploads/";
    // Create the directory if it doesn't exist
	if (!file_exists($targetDir)) {
		mkdir($targetDir, 0777, true);
    }

	// Get the image file name and set the target file path
	$imgpic = str_replace(' ', '_', basename($_FILES["profileImage"]["name"]));
    $targetFile = $targetDir . $imgpic;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

	 // Extract form data
	$name	=	trim(addslashes($_POST['txtName']));	
	$email	=	trim(addslashes($_POST['txtEmail']));
	$phone	=	trim(addslashes($_POST['txtPhone']));
	$password =	trim(addslashes($_POST['txtPassword']));
	
	
	// Check if the file was successfully uploaded
    if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $targetFile)) {
        // If yes, set the profile picture name
        $profilName = $imgpic;
    } else {
        // If not, set an empty string for profile picture name
        $profilName = "";
    }

    // Encrypt the password
    $Password_encrypt = base64_encode($password);

	try {
		// Insert user data into the database
        $UserId = $objUser->insertuser($name, $email, $phone, $Password_encrypt, $profilName);
        if ($UserId) {
			// If insertion was successful, set a success message in session
            $_SESSION['success_message'] = "User created successfully!";
        } else {
			// If insertion failed, set an error message
            $_SESSION['error_message'] = "Failed to create user.";
        }
		// Redirect to login page after processing
        header("Location:login.php");
        exit();
    } catch (Exception $e) {
        // Log the error message to the error log file
        error_log('Error in insertuser function: ' . $e->getMessage(), 3, 'error.log');
        // Set an error message to be displayed to the user
        $_SESSION['error_message'] = "An error occurred while creating user.";
        // Redirect the user to an error page or perform other error handling tasks as needed
        header("Location:login.php");
        exit();
    }

}//End 
else if($Transaction=="cmail") // Check if the transaction is to check email availability
{
	// Extract email from POST data
    $email = trim(addslashes($_POST['email']));

    // Check if the email already exists in the database
    $result = $objUser->checkEmail($email);
    $emailCount = $result;
    echo $emailCount;
}
else if($Transaction=="mobile") // Check if the transaction is to check mobile number availability
{
	// Extract mobile number from POST data
    $mobile = trim(addslashes($_POST['mobileNumber']));
    
    // Check if the mobile number already exists in the database
    $result = $objUser->checkMobileExist($mobile); 
    $mobileCount = "";
    if ($result) {
        $mobileCount = $result;
    }
    echo $mobileCount;
}
?>