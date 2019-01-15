<?php
session_start();
require_once("commonfileadmin.php");
$_SESSION[$session_name_initital . "adminlogin"]= "";
$_SESSION[$session_name_initital . "adminlogin_group"]= "";
$_SESSION[$session_name_initital . "adminerror"]= "";
unset($_SESSION[$session_name_initital . "adminlogin"]);
unset($_SESSION[$session_name_initital . "adminlogin_group"]);
unset($_SESSION[$session_name_initital . "adminerror"]);
session_destroy();
header("Location:login.php");
?>
