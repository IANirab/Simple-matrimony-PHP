<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	}
	
if(isset($_GET['t']))
{
	$table_name = $_GET['t'];
}
	
	$query = sendtogeneratequery($action,"title",$_POST['title'],"Y","N");
	
	$query = substr($query,1);

	 $sSql = "update $table_name set $query,currentstatus='5' where id=$action"; 
		execute($sSql);
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:approvelmanager.php");
?>