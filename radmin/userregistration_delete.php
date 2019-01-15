<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
//$filenm = "tbldatingusermaster_manager.php";
$filenm = "userregistration_manager.php";
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
	
if ((isset($_POST["deleteall"])) && $_POST["deleteall"] != "")
	$action = substr($_POST["deleteall"],0,-1);
	
$sSql ="update tbldatingusermaster set currentstatus =1 where userid in ($action)";
execute($sSql);
$_SESSION["adminerror"] = "information deleted sucessfully";
header("location:$filenm");
?>