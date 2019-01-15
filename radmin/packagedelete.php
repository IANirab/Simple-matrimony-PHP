<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
if(isset($_GET['c']) && $_GET['c']!='')
{
	$c=$_GET['c'];
}else{$c='';}
$filenm = "packagemager.php?c=".$c." ";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$pkg_mgmnt_pm_1 = pkg_mgmnt_pm_1();
	$pkg_mgmnt_pm_4 = pkg_mgmnt_pm_4();
	
} else {	
	$pkg_mgmnt_pm_1 = "N";	
	$pkg_mgmnt_pm_4 = "N";	
}




if($pkg_mgmnt_pm_1 == 'Y' || $pkg_mgmnt_pm_1 == 'N') {

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
if ($action != 1)
{
if($pkg_mgmnt_pm_4 == 'Y' || $pkg_mgmnt_pm_4 == 'N') {	
$sSql ="update tbldatingpackagemaster set currentstatus =1 where PackageId=$action";
execute($sSql);
}
$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
}
else
$_SESSION[$session_name_initital . "adminerror"] = "sorry you can not delete this package";
header("location:$filenm");
} else {
	header("location:dashboard.php?msg=no");
}
?>