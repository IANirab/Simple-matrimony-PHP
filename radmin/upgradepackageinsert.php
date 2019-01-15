<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = $_SESSION[$session_name_initital . 'adminlogin'];
if ((isset($_GET["b"]))&& ($_GET["b"] != "") && (is_numeric($_GET["b"])))
	$uid = $_GET["b"];
else
	$uid = 0;
	
	
	
	$ip = $_SERVER["REMOTE_ADDR"];
	//$query = sendtogeneratequery($action,"password",$_POST['new_password'],"Y");
	//$query .= sendtogeneratequery($action,"email",$_POST['email'],"Y");
	//$query .= sendtogeneratequery($action,"genderid",$_POST['gender'],"Y");
	$query = sendtogeneratequery($action,"packageid",$_POST['membership_package'],"Y");
	
	/*if (checkdate($_POST['dobmm'],$_POST['dobdd'],$_POST['dobyy']))
	{
	$dob =$_POST['dobyy'] . "-" .$_POST['dobmm'] . "-" .$_POST['dobdd'];
	$query .= sendtogeneratequery($action,"dob",$dob,"Y");
	}*/
	if (checkdate($_POST['membership_mm'],$_POST['membership_dd'],$_POST['membership_yy']))
	{
	$membership_exp_date =$_POST['membership_yy'] . "-" .$_POST['membership_mm'] . "-" .$_POST['membership_dd'];
	$query .= sendtogeneratequery($action,"expiredate",$membership_exp_date,"Y");
	}
	
	if (isset($_POST["chk_display_phone_address"]))
		$admin_disable_address_phone_no = "Y";
	else
		$admin_disable_address_phone_no = "N";
		
	$query .= sendtogeneratequery($action,"admin_disable_address_phone_no",$admin_disable_address_phone_no,"Y");
	
	$query .= sendtogeneratequery($action,"ModifyBy",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	$query .= sendtogeneratequery($action,"ModifyIP",$ip,"Y");
	
	$query = substr($query,1);
	$sSql = "update tbldatingusermaster set $query,ModifyDate=curdate() where userid=$uid";
	
	
	execute($sSql);
	$_SESSION[$session_name_initital . "adminerror"] = "detail has been changed successfully";
	
	if ($_POST["trustsealpackage"] != "0.0")
	if (checkdate($_POST['trustseal_mm'],$_POST['trustseal_dd'],$_POST['trustseal_yy']))
	{
	$trustseal_exp_date =$_POST['trustseal_yy'] . "-" .$_POST['trustseal_mm'] . "-" .$_POST['trustseal_dd'];
	$trustseal_days = getonefielddata("select datediff('$trustseal_exp_date',curdate())");
	trustsealpackage($_POST["trustsealpackage"],$trustseal_days,$uid,$trustseal_exp_date);
	}

	
$retfile ="usermanager.php";
header("location:$retfile");
?>