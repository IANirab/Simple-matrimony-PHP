<?php session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if ((isset($_POST["b"])) && is_numeric($_POST["b"]) && $_POST["b"]!=0)
{
	  $action = $_POST["b"];
}
	
if(isset($_POST['t']) && $_POST['t']!='')
{
	$table_name = $_POST['t'];
}
	$sSql = "update $table_name set currentstatus='0' where id=$action"; 
	 execute($sSql); 
	 
//$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
//header("location:approvelmanager.php");
?>