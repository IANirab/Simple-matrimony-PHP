<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$filenm = "OfficeLocationManager.php";
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;	
$sSql ="update tbloffice_location set currentstatus =1 where id=$action";
execute($sSql);
$_SESSION["adminerror"] = "information deleted sucessfully";
header("location:OfficeLocationManager.php");
?>