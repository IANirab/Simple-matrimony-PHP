<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	  $createbyfld = "ModifyBy";
	}
else
	{
	  $action = 0;
	  $createbyfld = "createby";
	}
	$ip = $_SERVER["REMOTE_ADDR"];
	$query = sendtogeneratequery($action,"FldVal",$_POST['title'],"Y");
	$query .= sendtogeneratequery($action,"$createbyfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	$query = substr($query,1);
	$sSql = "update tblbannersetting set $query,ModifyDate=curdate() where SettingId=$action";
	$retfile ="bannersettingmanager.php";

execute($sSql);
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>