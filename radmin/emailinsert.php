<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	  $CreateByfld = "modifyby";
	}
	$query = sendtogeneratequery($action,"subject",$_POST['txtsubject'],"Y");
	$query .= sendtogeneratequery($action,"message",$_POST['description'],"Y");
	$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	$query = substr($query,1);
	
	$sSql = "update tbldatingemailmaster set $query,modifydate=curdate() where emailid=$action";
	execute($sSql);
	$retfile ="emailmanager.php";
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>