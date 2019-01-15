<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$_SESSION[$session_name_initital . "session_invoice"] = "";
if (isset($_GET["b"]))
	$clear = $_GET["b"];
else
	$clear = "N";
if ((isset($_POST['txtsearch'])) && ($_POST['txtsearch'] !=""))
{
	$kw = $_POST['txtsearch'];
	$que = " (tbldatingpaymentmaster.paymentstatus like '%$kw%' or tbldatingpaymentmaster.adminnote like '%$kw%' or tbldatingpaymentmaster.txnid like '%$kw%' or tbldatingusermaster.email like '%$kw%' or tbldatingusermaster.name like '%$kw%' or tbldatingusermaster.nickname like '%$kw%' or tbldatingusermaster.mobile like '%$kw%' or tbldatingusermaster.city like '%$kw%' or tbldatingusermaster.postcode like '%$kw%' or tbldatingusermaster.area like '%$kw%' or tbldatingusermaster.phno like '%$kw%' or tbldatingusermaster.state like '%$kw%' or concat(upper(substr(tbldatingusermaster.name,1,1)),'-',profile_code) like '%$kw%')  and ";
$_SESSION[$session_name_initital . "session_invoice"] = $que;
}
header("location:invoicemager.php?b=$clear");
?>