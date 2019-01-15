<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$filenm = "dashboard.php";
$action = "";
if (isset($_GET["b"]))
	$action = $_GET["b"];
if ($action == "b")
{
	$day_setting ="banner_stats_delete_days";
	$table_nm = "tblbannerstatsmaster";
	$date_field ="VisitedDate";
	$days = findsettingvalue($day_setting);
	$sSql ="delete from $table_nm where datediff(curdate(),$date_field)>=$days";
	execute($sSql);
}
//elseif ($action == "p")
//{
//	$day_setting ="pmb_message_delete_days";
//	$table_nm = "tbldatingpmbmaster";
//	$date_field ="CreateDate";
//}
elseif ($action == "c")
{
	$day_setting ="chat_message_delete_days";
	$table_nm = "tbldatingpmbmaster";
	$date_field ="create_date";
	$days = findsettingvalue($day_setting);
	$sSql ="delete from $table_nm where datediff(curdate(),$date_field)>=$days and type='2' "; 
	execute($sSql);
}



$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm");
?>