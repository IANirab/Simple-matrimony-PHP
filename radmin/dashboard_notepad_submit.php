<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");

$action = 64;
$createbyfld = "modifyby";
$ipfldnm = "modifyip";
$ip = $_SERVER["REMOTE_ADDR"];

$query = sendtogeneratequery($action,"fldval",$_POST['txt_dash_board_note'],"Y");
$query .= sendtogeneratequery($action,"$createbyfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
$query = substr($query,1);

$sSql = "update tbldatingsettingmaster set $query,modifydate=curdate() where fldnm='Dashboard_main_note'";
execute($sSql);

$retfile ="dashboard.php";
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>