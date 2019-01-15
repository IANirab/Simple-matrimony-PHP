<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$cms_mgmnt_cmc_1 = cms_mgmnt_cmc_1();
	$cms_mgmnt_cmc_2 = cms_mgmnt_cmc_4();
	$cms_mgmnt_cmc_4 = cms_mgmnt_cmc_4();	
} else {	
	$cms_mgmnt_cmc_1 = "N";
	$cms_mgmnt_cmc_2 = "N";
	$cms_mgmnt_cmc_4 = "N";	
}
if($cms_mgmnt_cmc_1 == 'Y' || $cms_mgmnt_cmc_1 == 'N') {
$filenm = "cmsmanager.php";
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;

if($cms_mgmnt_cmc_4 == 'Y' || $cms_mgmnt_cmc_4 == 'N') {	
$sSql ="update tblcmsmaster set CurrentStatus =1 where cmsid=$action";
execute($sSql);
}
$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm");
} else {
	header("location:dashboard.php?msg=no");
}
?>