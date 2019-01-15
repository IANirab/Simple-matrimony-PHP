<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	  $action = $_GET["b"];
else
	  $action = 0;
//echo $_POST['title']; exit;
	$query = sendtogeneratequery($action,"title",$_POST['title'],"Y","N");
	$query .= sendtogeneratequery($action,"languageid",$_POST['cmblanguage'],"Y");
	$query .= sendtogeneratequery($action,"religianid",$_POST['cmbreligion'],"Y");
	$query = substr($query,1);

	if ($action == 0)
	{
   		$sSql = "insert into tbldatingcastmaster (title,languageid,religianid) values($query)"; 
		$retfile ="castmanager.php";
	}
	else
	{
		$sSql = "update tbldatingcastmaster set $query where id=$action";
		$retfile ="castmanager.php";
	}
execute($sSql);

$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>