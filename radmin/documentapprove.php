<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
//$filenm = "taxmanager.php";
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

if ((isset($_POST["note"])))
{	
    $note = $_POST["note"];	
}else{
    $note = '';
}

$sSql ="update tbldating_userdoc set currentstatus=$currentstatus,note='".$note."' where id=$action";
execute($sSql);

if($currentstatus==0){
$msg="Approve sucessfully";	
}else{
$msg="Dis Approve sucessfully";	
}
echo $msg; exit;

?>