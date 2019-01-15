<?php

ob_start();
include_once("commonfile.php");
checklogin($sitepath);
if (isset($_GET["b"]))
	$status = $_GET["b"];
else
	$status = 0;

$user_status = getonefielddata("select currentstatus from tbldatingusermaster  where userid =$curruserid");

$to_dostatus = "";
if ($status ==0) 
{
if ($user_status == 4)
	$to_dostatus ="0";	
}

if ($status ==4) 
{
if ($user_status == 0)
	$to_dostatus ="4";	
}
$errorno =45;

if(isset($_POST['message']) && $_POST['message']!='')
{
	$message=$_POST['message'];
}else{$message='';}

if ($to_dostatus != "")
{
 $sSql = "update tbldatingusermaster set currentstatus=$to_dostatus, message='".$message."' where userid=$curruserid"; 
execute($sSql);
$errorno =44;
}
if($status==4){
	header("location:profile_active_deactive.php?b=0");	
	exit;
}
header("location:message.php?b=$errorno");
ob_flush();
?>