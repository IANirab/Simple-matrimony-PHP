<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$tblnm = 'tbldatingsettingmaster';
$retfile ="settingmanager.php";
if(isset($_GET['t']) && $_GET['t']=='m'){
	$tblnm = 'tbldatingmobsettingmaster';
	$retfile .= "?t=m";
}
if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
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
	
	
	$title = '';
	if(isset($_POST['title']) && $_POST['title']!=''){
		$title = str_replace("'",'&#39;',$_POST['title']);	
	}
	
	execute("update ".$tblnm." SET fldval='".$title."', $createbyfld=".$_SESSION[$session_name_initital . 'adminlogin']." WHERE settingid=".$action);
	
	//execute($sSql);
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>