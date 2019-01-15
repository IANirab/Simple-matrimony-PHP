<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$ban_ip_bi_1 = ban_ip_bi_1();
	$ban_ip_bi_2 = ban_ip_bi_2();
	$ban_ip_bi_3 = ban_ip_bi_3();
	$ban_ip_bi_5 = ban_ip_bi_5();
} else {	
	$ban_ip_bi_1 = "N";
	$ban_ip_bi_2 = "N";
	$ban_ip_bi_3 = "N";
	$ban_ip_bi_5 = "N";
}
if($ban_ip_bi_1 == 'Y' || $ban_ip_bi_1 == 'N') {	

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
if ((isset($_GET["b1"])) && is_numeric($_GET["b1"]))
	$st = $_GET["b1"];
else
	$st = 0;
/*$currentstatus = getonefielddata("select currentstatus from tbl_testimonial_master where testimonialid=$action");
if ($currentstatus ==0)
	$currentstatus ="2";
else
	$currentstatus = "0.0";*/
if($st=='0' || $st=='1' ) {
	if($ban_ip_bi_2 == 'Y' || $ban_ip_bi_2 == 'N') {	
		$st= $_GET['b1'];
	} else {
		header("location:dashboard.php?msg=no");
		exit;
	}
}
if($st=='3') {
	if($ban_ip_bi_5 == 'Y' || $ban_ip_bi_5 == 'N') {	
		$st= $_GET['b1'];
	} else {
		header("location:dashboard.php?msg=no");
		exit;
	}
}
$sSql ="update tbl_banned_ip_master set currentstatus =$st where id=$action";
execute($sSql);
$_SESSION[$session_name_init . "adminerror"] = "information saved sucessfully";
//$filenm = "testimonialnamager.php?b=$st";
//$filenm = $_SERVER['HTTP_REFERER'];
$filenm = "banned_ip_manager.php";
header("location:$filenm");
} else {
	header("location:dashboard.php?msg=no");
	exit;
}
?>