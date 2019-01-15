<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");



$id = 0;
$status  ='';

if(isset($_POST['id']) && $_POST['id']!=''){
	$id = $_POST['id'];
}

if(isset($_POST['status']) && $_POST['status']!=''){
	$status = $_POST['status'];
}



$sSql ="update tbldatingpaymenttypemaster set currentstatus ='".$status."' where paymenttypeid='".$id."'";
execute($sSql);





?>