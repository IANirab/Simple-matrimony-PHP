<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$filenm = "directorymanager.php";
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
$status = '0.0';
if(isset($_GET['b1']) && $_GET['b1']!=''){
	$status = $_GET['b1'];
}
$sSql ="update tbl_directory_master set currentstatus =".$status." where directoryid=$action";
execute($sSql);
$_SESSION[$session_name_initital . "adminerror"] = "information updated sucessfully";
header("location:$filenm");
?>