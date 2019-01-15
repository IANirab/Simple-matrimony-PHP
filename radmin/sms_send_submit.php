<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = $_SESSION[$session_name_initital . 'adminlogin'];
if ((isset($_GET["b"]))&& ($_GET["b"] != "") && (is_numeric($_GET["b"])))
	$uid = $_GET["b"];
else
	$uid = 0;
	$mobile = $_POST['num'];	
	$message = rawurlencode($_POST['message']);
		
	sms_to_send($mobile,$message);
	
	$_SESSION[$session_name_initital . "adminerror"] = "SMS has been sent successfully";
	
$retfile ="customusermanager.php";
header("location:$retfile");
?>