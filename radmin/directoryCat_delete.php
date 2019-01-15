<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$filenm = "directoryCat_manager.php";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$dir_mgmnt_dm_1 = dir_mgmnt_dm_1();	
	$dir_mgmnt_dmd_3 = dir_mgmnt_dmd_3();
} else {	
	$dir_mgmnt_dm_1 = "N";
	$dir_mgmnt_dmd_3 = "N";
}
if($dir_mgmnt_dm_1 == 'Y' || $dir_mgmnt_dm_1 == 'N') {
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
if($dir_mgmnt_dmd_3 == 'Y' || $dir_mgmnt_dmd_3 == 'N') {		
$sSql ="update tbl_directory_category_master set currentstatus =1 where categoryid=$action";
execute($sSql);
} 
$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm");
} else {
	header("location:dashboard.php?msg=no");
}
?>