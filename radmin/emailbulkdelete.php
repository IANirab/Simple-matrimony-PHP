<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("N");

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
	
$sSql ="update tblemailbulkmaster set currentstatus =1 where sendid=$action";
execute($sSql);
$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:emailbulkmanager.php");
?>