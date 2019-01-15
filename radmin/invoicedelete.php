<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$filenm = "invoicemager.php";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$invoice_msgmnt_imu_1 = invoice_msgmnt_imu_1();
	$invoice_msgmnt_imu_2 = invoice_msgmnt_imu_2();
	$invoice_msgmnt_imu_3 = invoice_msgmnt_imu_3();
	$invoice_msgmnt_imu_4 = invoice_msgmnt_imu_4();	
} else {	
	$invoice_msgmnt_imu_1 = "N";
	$invoice_msgmnt_imu_2 = "N";
	$invoice_msgmnt_imu_3 = "N";
	$invoice_msgmnt_imu_4 = "N";	
}
if($invoice_msgmnt_imu_1 == 'Y' || $invoice_msgmnt_imu_1 == 'N') {
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
if (isset($_GET["b1"]))
	$b1 = $_GET["b1"];
else
	$b1 = "N";
if($invoice_msgmnt_imu_4 == 'Y' || $invoice_msgmnt_imu_4 == 'N') {	
	$sSql ="update tbldatingpaymentmaster set clear ='C' where paymentid=$action";
	execute($sSql);
}
$_SESSION[$session_name_initital . "adminerror"] = "information cancelled sucessfully";
header("location:$filenm?b=$b1");
} else {
	header("location:dashboard.php?msg=no");
	exit;
}
?>