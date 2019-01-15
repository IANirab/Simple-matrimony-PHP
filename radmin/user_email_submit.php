<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = $_SESSION[$session_name_initital . 'adminlogin'];
if ((isset($_GET["b"]))&& ($_GET["b"] != "") && (is_numeric($_GET["b"])))
	$uid = $_GET["b"];
else
	$uid = 0;
	$toemail = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

$action = 0;
$date = date("Y-m-d");
$query = '';
$query .= sendtogeneratequery($action,"userid",$uid,"Y");
$query .= sendtogeneratequery($action,"subject",$subject,"Y");
$query .= sendtogeneratequery($action,"message",$message,"Y");
$query = substr($query,1);
	
	$sSql = "insert into tbldatinguseremailmaster(userid,subject,message,senddate) values($query,curdate())";				
	execute($sSql);
	
	sendemaildirect($toemail,$subject,$message);	
	$_SESSION[$session_name_initital . "adminerror"] = "email has been sent successfully";
	
	
	
$retfile ="usermanager.php";
header("location:$retfile");
?>