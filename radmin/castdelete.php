<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$filenm = "castmanager.php";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$cast_mgmnt_cm_1 = cast_mgmnt_cm_1();		
	$cast_mgmnt_cm_4 = cast_mgmnt_cm_4();
} else {	
	$cast_mgmnt_cm_1 = "N";	
	$cast_mgmnt_cm_4 = "N";
}
if($cast_mgmnt_cm_1 == 'Y' || $cast_mgmnt_cm_1 == 'N' ) {
if ((isset($_GET["b"])) && is_numeric($_GET["b"])){
	$action = $_GET["b"];
	if($cast_mgmnt_cm_4 == 'Y' || $cast_mgmnt_cm_4 == 'N' ) {
		$action = $_GET["b"];
	} else {
		header("location:dashboard.php?msg=no");
		exit;
	}
} else {
	$action = 0;
}	
	
$sSql ="update tbldatingcastmaster set currentstatus =1 where id=$action";
execute($sSql);
$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm");
} else {
	header("location:dashboard.php?msg=no");
}
?>