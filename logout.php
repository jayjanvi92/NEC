<?php
session_start();
unset($_SESSION['sessUserId']);
header("location:login.php");
exit;
?>