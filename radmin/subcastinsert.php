<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	  $action = $_GET["b"];
else
	  $action = 0;

	$query = sendtogeneratequery($action,"title",$_POST['title'],"Y");
	$query .= sendtogeneratequery($action,"languageid",$_POST['cmblanguage'],"Y");
	$query .= sendtogeneratequery($action,"castid",$_POST['cmbcast'],"Y");
	$query = substr($query,1);

	if ($action == 0)
	{
	 	$sSql = "insert into tbldatingsubcastmaster (title,languageid,castid) values($query)";
		$retfile ="subcastmaster.php";
	}
	else
	{
		$sSql = "update tbldatingsubcastmaster set $query where id=$action";
		$retfile ="subcastmanager.php";
	}
execute($sSql);
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>