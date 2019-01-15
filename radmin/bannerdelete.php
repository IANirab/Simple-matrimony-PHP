<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$filenm = "bannermanager.php";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$banner_mgmnt_bm_1 = banner_mgmnt_bm_1();
	$banner_mgmnt_bm_2 = banner_mgmnt_bm_2();
	$banner_mgmnt_bm_4 = banner_mgmnt_bm_4();
	$banner_mgmnt_bm_5 = banner_mgmnt_bm_5();
	$banner_mgmnt_bm_6 = banner_mgmnt_bm_6();
} else {	
	$banner_mgmnt_bm_1 = "N";
	$banner_mgmnt_bm_2 = "N";
	$banner_mgmnt_bm_4 = "N";
	$banner_mgmnt_bm_5 = "N";
	$banner_mgmnt_bm_6 = "N";
}
if($banner_mgmnt_bm_1 == 'Y' || $banner_mgmnt_bm_1 == 'N') {
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
if($banner_mgmnt_bm_4 == 'Y' || $banner_mgmnt_bm_4 == 'N') {	
$sSql ="update tblbannermaster set CurrentStatus =1 where Bannerid=$action";
execute($sSql);
}
$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm");
} else{
	header("location:dashboard.php?msg=no");
	exit;
}
?>