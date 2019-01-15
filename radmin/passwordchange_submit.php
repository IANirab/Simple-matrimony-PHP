<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();

$action = $_SESSION[$session_name_initital . 'adminlogin'];
$oldpassword = getonefielddata("SELECT Password FROM tbldatingadminloginmaster where LoginId=$action");

if ($oldpassword == md5($_POST["current_password"]))
{	
	$createbyfld = "ModifyBy";
	$ipfldnm = "ModifyIP";
	$ip = $_SERVER["REMOTE_ADDR"];
	$query = sendtogeneratequery($action,"Password",md5($_POST['new_password']),"Y");
	$query .= sendtogeneratequery($action,"$createbyfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	$query = substr($query,1);
	execute("update tbldatingadminloginmaster set Password=1 WHERE LoginId=$action");
	$sSql = "update tbldatingadminloginmaster set $query,modifydate=curdate() where LoginId=$action";		
	execute($sSql);
	$_SESSION[$session_name_initital . "adminerror"] = "password has been changed successfully";
}
else
	$_SESSION[$session_name_initital . "adminerror"] = "please enter valid current admin password";
	$retfile ="passwordchange.php";
header("location:$retfile");
?>