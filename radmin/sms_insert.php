<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();

if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	  $CreateByfld = "modifyby";
	  $ipfldnm = "modifyip";
	}
else
	{
	  $action = 0;
	  $CreateByfld = "createby";
	  $ipfldnm = "createip";
	}
	
	
	
	
	
	
	
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$query="";
	$query .= sendtogeneratequery($action,"mobile",$_POST["mobile"],"Y");
	$query .= sendtogeneratequery($action,"sms_text",$_POST["sms_text"],"Y");

	$query = substr($query,1);

	if ($action == 0)
	{
	$sSql = "insert into tbl_sms_master (mobile,sms_text) values($query)";
		sms_to_send($_POST['mobile'],$_POST['sms_text']);
		execute($sSql);
		//$retfile ="tbl_sms_master_master.php";
		$retfile = "sms_manager.php";
		$action = getonefielddata("select max(id) from tbl_sms_master");
	}
	else
	{
		$sSql = "update tbl_sms_master set $query where id=$action";
		execute($sSql);
		//$retfile ="tbl_sms_master_manager.php";
		$retfile = "sms_manager.php";
	}










$_SESSION["adminerror"] = "information saved successfully";
header("location:$retfile");
?>