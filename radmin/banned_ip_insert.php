<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	  $CreateByfld = "modify_by";
	  $ipfldnm = "modify_ip";
	}
else
	{
	  $action = 0;
	  $CreateByfld = "create_by";
	  $ipfldnm = "create_ip";
	}

	$ip = $_SERVER["REMOTE_ADDR"];
	$query = sendtogeneratequery($action,"ip",$_POST['ip'],"Y");	
	$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_init . 'adminlogin'],"Y");
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");	

	$query = substr($query,1);

	if ($action == 0)
	{
	 	$sSql = "insert into tbl_banned_ip_master (ip,create_by,$ipfldnm,CreateDate) values($query,curdate())";		
		execute($sSql);
		$retfile ="banned_ip_manager.php";
		$action = getonefielddata("select max(testimonialid) from tbl_banned_ip_master");
	}
	else
	{		
		$sSql = "update tbl_banned_ip_master set $query,modify_date=curdate() where id=$action";
		execute($sSql);
		$retfile ="banned_ip_manager.php";
		//$retfile = banned_ip_master.php;
	}
$_SESSION[$session_name_init . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>