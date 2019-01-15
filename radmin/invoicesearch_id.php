<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$_SESSION[$session_name_initital . "session_invoice"] = "";
if (isset($_GET["b"]))
	$clear = $_GET["b"];
else
	$clear = "N";
if ((isset($_POST['txtinvoiceid'])) && ($_POST['txtinvoiceid'] !="")&& (is_numeric($_POST['txtinvoiceid'])))
{
	$kw = $_POST['txtinvoiceid'];
	$que = " tbldatingpaymentmaster.paymentid =$kw  and ";
$_SESSION[$session_name_initital . "session_invoice"] = $que;
}
header("location:invoicemager.php?b=$clear");
?>