<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = $_SESSION[$session_name_initital . 'adminlogin'];
if ((isset($_GET["b"]))&& ($_GET["b"] != "") && (is_numeric($_GET["b"])))
	$uid = $_GET["b"];
else
	$uid = 0;

$retfile ="usermanager.php";
	
	$chk_email = getonefielddata("SELECT count(userid) from tbldatingusermaster WHERE email='".$_POST['email']."'
	and  userid!='".$uid."' ");
	if($chk_email==1)
	{
		$_SESSION[$session_name_initital . "adminerror"]='Email Already in use';
		header("location:user_change_password.php?b=$uid ");
		exit;
	}
	
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$query = sendtogeneratequery($action,"password",$_POST['new_password'],"Y");
	$query .= sendtogeneratequery($action,"email",$_POST['email'],"Y");
	$query .= sendtogeneratequery($action,"genderid",$_POST['gender'],"Y");
	$query .= sendtogeneratequery($action,"country_code",$_POST['country_code'],"Y");
	$query .= sendtogeneratequery($action,"mobile",$_POST['mobile'],"Y");
	$query .= sendtogeneratequery($action,"city_code",$_POST['city_code'],"Y");
	$query .= sendtogeneratequery($action,"landline",$_POST['landline'],"Y");
	if(isset($_POST['employeeid']) && $_POST['employeeid']>0){
		$query .= sendtogeneratequery($action,"staff_agentid",$_POST['employeeid'],"Y");
	}
	
	if (checkdate($_POST['dobmm'],$_POST['dobdd'],$_POST['dobyy']))
	{
	$dob =$_POST['dobyy'] . "-" .$_POST['dobmm'] . "-" .$_POST['dobdd'];
	$query .= sendtogeneratequery($action,"dob",$dob,"Y");
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
	$_SESSION[$session_name_initital . "adminerror"] = "detail has been updated successfully";

header("location:$retfile");
?>