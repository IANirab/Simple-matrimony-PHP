<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$filenm = "panchayatmanager.php";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$location_mgmnt_lc_1 = location_mgmnt_lc_1();	
	$location_mgmnt_lc_4 = location_mgmnt_lc_4();
} else {	
	$location_mgmnt_lc_1 = 'N';	
	$location_mgmnt_lc_4 = 'N';
}
if($location_mgmnt_lc_1 == 'Y' || $location_mgmnt_lc_1 == 'N' ) {
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];	
else
	$action = 0;
if($location_mgmnt_lc_4 == 'Y' || $location_mgmnt_lc_4 == 'N' ) {
	$sSql ="update tbldating_panchayat_master set currentstatus =1 where id=$action";
	execute($sSql);
} else {
	header("location:dashboard.php?msg=no");
	exit;
}
$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm");
} else {
	header("location:dashboard.php?msg=no");
	exit;
}
?>