<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){		
	$audit_msgs_am_2 = audit_msgs_am_2();
} else {		
	$audit_msgs_am_2 = "N";	
}
if($audit_msgs_am_2=='Y' || $audit_msgs_am_2 == 'N'){
$filenm = "pmbmanager.php";
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
	
$sSql = "update tbldatingpmbmaster set CurrentStatus =8 where PmbId=$action";
execute($sSql);
$_SESSION[$session_name_initital . "adminerror"] = "information deleted successfully";
header("location:$filenm");
} else {
	header("location:dashboard.php?msg=no");
	exit;
}
?>