<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$filenm = "employeemanager.php";

$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$emp_mgmnt_emm_1 = emp_mgmnt_emm_1();
	$emp_mgmnt_emm_2 = emp_mgmnt_emm_2();
	$emp_mgmnt_emm_4 = emp_mgmnt_emm_4();
} else {	
	$emp_mgmnt_emm_1 = "N";
	$emp_mgmnt_emm_2 = "N";
	$emp_mgmnt_emm_4 = "N";
}
if($emp_mgmnt_emm_1 == 'Y' || $emp_mgmnt_emm_1 == 'N') {

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
if($emp_mgmnt_emm_4 == 'Y' || $emp_mgmnt_emm_4 == 'N') {	
	$sSql ="delete from tbldatingadminloginmaster where GroupId<>1 and LoginId=$action";
	execute($sSql);
}
$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm");
} else {
	header("location:dashboard.php?msg=no");
	exit;
}
?>