<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$filenm = "testimonialnamager.php";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$testimonial_mgmnt_tm_1 = testimonial_mgmnt_tm_1();	
	$testimonial_mgmnt_tm_4 = testimonial_mgmnt_tm_4();
} else {	
	$testimonial_mgmnt_tm_1 = "N";	
	$testimonial_mgmnt_tm_4 = "N";
}
if($testimonial_mgmnt_tm_1 == 'Y' || $testimonial_mgmnt_tm_1 == 'N') {
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
if($testimonial_mgmnt_tm_4 == 'Y' || $testimonial_mgmnt_tm_4 == 'N') {	
$sSql ="update tbldatingtestimonialmaster set currentstatus =1 where testimonialid=$action";
execute($sSql);
}
$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm");
} else {
	header("location:dashboard.php?msg=no");
}
?>