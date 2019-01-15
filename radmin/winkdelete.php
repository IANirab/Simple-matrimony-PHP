<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$filenm = "winkmanager.php";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$wink_show_ws_1 = wink_show_ws_1();
	$wink_show_ws_2 = wink_show_ws_2();
	$wink_show_ws_4 = wink_show_ws_4();
} else {	
	$wink_show_ws_1 = "N";
	$wink_show_ws_2 = "N";
	$wink_show_ws_4 = "N";
}
if($wink_show_ws_1 == 'Y' || $wink_show_ws_1 == 'N') {
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
if($wink_show_ws_4 == 'Y' || $wink_show_ws_4 == 'N') {	
$sSql ="update tbldatingwinkmaster set currentstatus =1 where id=$action";
execute($sSql);
}
$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm");
} else {
	header("location:dashboard.php?msg=no");
	exit;
}
?>