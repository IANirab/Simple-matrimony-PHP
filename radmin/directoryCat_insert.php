<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
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
	$query = sendtogeneratequery($action,"title",$_POST['title'],"Y");
	$query .= sendtogeneratequery($action,"$createbyfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	$query .= sendtogeneratequery($action,"meta_description",$_POST["meta_description"],"Y");
	
	$query .= sendtogeneratequery($action,"meta_keyword",$_POST["meta_keyword"],"Y");
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	

	$query = substr($query,1);

	if ($action == 0)
	{
	 	$sSql = "insert into tbl_directory_category_master (title,createby,meta_description,meta_keyword,$ipfldnm,createdate) values($query,curdate())";
		$retfile ="directoryCat_master.php";
	}
	else
	{
		$sSql = "update tbl_directory_category_master set $query,modifydate=curdate() where categoryid=$action";
		$retfile ="directoryCat_manager.php";
	}
execute($sSql);





$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>