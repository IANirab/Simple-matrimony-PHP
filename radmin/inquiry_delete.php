<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$filenm = "inquirymanager.php";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$inq_mgmnt_imi_1 = inq_mgmnt_imi_1();	
	$inq_mgmnt_imis_1 = inq_mgmnt_imis_1();
	$inq_mgmnt_imis_2 = inq_mgmnt_imis_2();
} else {	
	$inq_mgmnt_imi_1 = "N";
	$inq_mgmnt_imis_1 = "N";
	$inq_mgmnt_imis_2 = "N";
}
if($inq_mgmnt_imi_1 == 'Y' || $inq_mgmnt_imi_1 == 'N') {
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
if ((isset($_GET["b1"])) && is_numeric($_GET["b1"]))
	$subjectid = $_GET["b1"];
else
	$subjectid = 1;
if($inq_mgmnt_imis_2 == 'Y' || $inq_mgmnt_imis_2 == 'N') {	
$sSql ="update tbl_dating_inquiry_master set currentstatus =1 where id=$action";
execute($sSql);
}
$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm?b=$subjectid");
} else {
	header("location:dashboard.php?msg=no");
	exit;
}
?>