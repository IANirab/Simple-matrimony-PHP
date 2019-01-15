<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$filenm = "taxmanager.php";

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{	
    $action = $_GET["b"];	
}else{
    $action = 0;
}
	$sSql ="update tbldatingtaxmaster set currentstatus =3 where id=$action";
	execute($sSql);

$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm");
exit;
?>