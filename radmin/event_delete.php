<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$filenm = "eventmanager.php";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$event_mgmnt_em_1 = event_mgmnt_em_1();
	$event_mgmnt_em_4 = event_mgmnt_em_4();	
} else {	
	$event_mgmnt_em_1 = "N";
	$event_mgmnt_em_4 = "N";	
}
if($event_mgmnt_em_1 == 'Y' || $event_mgmnt_em_1 == 'N') {
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
if($event_mgmnt_em_4 == 'Y' || $event_mgmnt_em_4 == 'N') {	
$sSql ="update tbl_event_master set currentstatus =1 where eventid=$action";
execute($sSql);
}
$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm");
} else{
	header("location:dashboard.php?msg=no");
}
?>