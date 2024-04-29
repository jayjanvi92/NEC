<?php                                                                                                                                                                ini_set('memory_limit', '100M');
ini_set('post_max_size', '100M');
ini_set('upload_max_filesize', '100M');
ini_set('max_execution_time', 0);

session_start();



setcookie('sess_user_id', $_SESSION['sessUserId']); 
setcookie('sess_user_name', $_SESSION['sessUserName']); 



$baseURL = "http://localhost/NEC/";
$CurrentDirectory	=	getcwd();
include($CurrentDirectory."/classes/connection.php");

$uid = $_SESSION['sessUserId'];
$uname = $_SESSION['sessUserName'];

$fldv_user_name = stripslashes($uname);

$errorLogFile = 'error.log';

// Check if the file exists
if (!file_exists($errorLogFile)) {
    // If the file doesn't exist, create it
    $file = fopen($errorLogFile, 'w');
    // Close the file handle
    fclose($file);
} 

$errorFilePath = $baseURL.$errorLogFile;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TEST PROJECT</title>

	<!-- stylesheets -->
  	<link rel="stylesheet" href="css/style_inner.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/media-queries-inner.css" type="text/css" media="screen" />

   
    <!-- js and css for left menu starts here -->
    <link href="css/graphite.css" rel="stylesheet" type="text/css" />
    <link href="css/dcaccordion.css" rel="stylesheet" type="text/css" />
	<link href="css/tables.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type='text/javascript' src='js/jquery.cookie.js'></script>
    <script type='text/javascript' src='js/jquery.dcjqaccordion.2.7.min.js'></script>
    <!-- js and css for left menu ends here -->

</head>