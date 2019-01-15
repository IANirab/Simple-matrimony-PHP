<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$filenm = "taxmanager.php";
$currentstatus = 0;
$action = 0;

if ((isset($_POST["id"])))
{	
    $action = $_POST["id"];	
}else{
    $action = 0;
}

if ((isset($_POST["status"])))
{	
    $currentstatus = $_POST["status"];	
}else{
    $currentstatus = 0;
}

$sSql ="update tbldatingtaxmaster set currentstatus=$currentstatus where id=$action";
execute($sSql);

$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm");
exit;
?>