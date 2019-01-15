<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$filenm = "adminsearchmanager.php";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$home_search_hp_1 = home_search_hp_1();
	$home_search_hp_2 = home_search_hp_2();	
	$home_search_hp_4 = home_search_hp_4();	
} else {	
	$home_search_hp_1 = "N";
	$home_search_hp_2 = "N";
	$home_search_hp_4 = "N";
}
if($home_search_hp_1 == 'Y' || $home_search_hp_1 == 'N') {
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
if($home_search_hp_4 == 'Y' || $home_search_hp_4 == 'N') {	
$sSql ="update tbldatingadminsearchmaster set currentstatus =1 where searchid=$action";
execute($sSql);
}
$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm");
} else{
	header("location:dashboard.php?msg=no");
}
?>