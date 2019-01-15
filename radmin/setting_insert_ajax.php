<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");


$tblnm = 'tbldatingsettingmaster';

if ( isset($_POST["id"])  && $_POST["id"]!=0)
	{
	  $action = $_POST["id"];
	  $createbyfld = "modifyby";
	  $ipfldnm = "modifyip";
	}
else
	{
	  $action = 0;
	  $createbyfld = "createby";
	  $ipfldnm = "createip";
	}
	$ip = $_SERVER["REMOTE_ADDR"];
	
	
	if(isset($_POST['status']) && $_POST['status']!='')
	{
		$status=$_POST['status'];
	}
	
	
	execute("update ".$tblnm." SET fldval='".$status."', $createbyfld=".$_SESSION[$session_name_initital . 'adminlogin']." WHERE settingid=".$action);
	
?>