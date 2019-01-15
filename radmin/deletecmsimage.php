<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$filenm = "cmsmanager.php";
$action = "";
if (isset($_GET["b"])){
	
$action = $_GET["b"];
$sSql ="update tblcmsmaster set ImgNm ='' where cmsid=$action";
execute($sSql);

}

$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm");	
	
?>