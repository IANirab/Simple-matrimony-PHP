<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
//$filenm = "tbldatingpromotionalemailmaster_manager.php";
$filenm = "promotional_manager.php";
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
	

if(isset($_GET['b1']) && is_numeric($_GET['b1']))
{
	$b1=$_GET['b1'];
}
	
	
if ((isset($_POST["deleteall"])) && $_POST["deleteall"] != "")
	$action = substr($_POST["deleteall"],0,-1);
	
$sSql ="update tbldatingpromotionalemailmaster set currentstatus=".$b1." where id in ($action)";
execute($sSql);
$_SESSION[$session_name_initital . "adminerror"] = "information saved sucessfully";
header("location:$filenm");
?>