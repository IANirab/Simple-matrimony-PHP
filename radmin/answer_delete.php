<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
//$filenm = "tbl_answer_master_manager.php";
$filenm = "answer_manager.php";
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
	
if ((isset($_POST["deleteall"])) && $_POST["deleteall"] != "")
	$action = substr($_POST["deleteall"],0,-1);
	
$sSql ="update tbl_answer_master set currentstatus =1 where id in ($action)";
execute($sSql);
$_SESSION["adminerror"] = "information deleted sucessfully";
header("location:$filenm");
?>