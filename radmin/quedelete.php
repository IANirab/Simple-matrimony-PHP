<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = 0;
if(isset($_SESSION[$session_name_initital . 'adminlogin']) && $_SESSION[$session_name_initital . 'adminlogin']!=''){
	$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
}
$filenm = $_SERVER['HTTP_REFERER'];
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;


$sSql ="update tblkb_quemaster set CurrentStatus =1 where cmsid=$action";
execute($sSql);

$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm");
?>