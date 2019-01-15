<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$filenm = "tbl_homepage_images_manager.php";
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;	
$sSql ="update tbl_homepage_images set currentstatus =1 where id=$action";
execute($sSql);
$_SESSION["adminerror"] = "information deleted sucessfully";
header("location:homepagemanager.php");
?>