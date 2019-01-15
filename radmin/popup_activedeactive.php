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


$sSql ="update tbl_homepage_images set currentstatus ='".$status."' where id='".$id."'";
execute($sSql);





?>