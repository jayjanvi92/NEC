<?php
session_start();
include("classes/connection.php");
include("classes/cls_login.php");


$object = new login();

$Transaction	=	"";
if(ISSET($_POST['trans']))
{
	$Transaction	=	$_POST['trans'];
}

if(ISSET($_GET['trans']))
{
	$Transaction	=	$_GET['trans'];
}

if($Transaction=="login")
{	
	$uName = trim(addslashes($_POST['uName']));
	$pswrd = base64_encode(trim(addslashes($_POST['pswrd'])));
	$log1 = $object->checkUserlogin($uName,$pswrd);
}//End if($Transaction=="relaycategory")
?>