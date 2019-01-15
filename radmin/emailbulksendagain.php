<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("N");

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
	
$sSql_upd = "UPDATE `tbl_user_emailbulk` SET status='N' WHERE  templateid='".$action."' ";
execute($sSql_upd);

$_SESSION[$session_name_initital . "adminerror"] = "information Save sucessfully";
header("location:emailbulkmanager.php");
?>