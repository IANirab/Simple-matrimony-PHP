<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	  $CreateByfld = "ModifyBy";
	  $ipfldnm = "ModifyIP";
	}
else
	{
	  $action = 0;
	  $CreateByfld = "CreateBy";
	  $ipfldnm = "CreateIP";
	}	

	$query = sendtogeneratequery($action,"description",$_POST['description'],"Y");		
	$query .= sendtogeneratequery($action,"key1",$_POST['key1'],"Y");	
	$query .= sendtogeneratequery($action,"key2",$_POST['key2'],"Y");	
	$query .= sendtogeneratequery($action,"key3",$_POST['key3'],"Y");	
	$query .= sendtogeneratequery($action,"key4",$_POST['key4'],"Y");	
	

	$query = substr($query,1);

	if ($action != 0)	
	{		
		$sSql = "update tbldatingpaymenttypemaster set $query where paymenttypeid=$action";		
		execute($sSql);
		$retfile ="payment_setting_manager.php";
				
	}
	
	
	if (is_uploaded_file($_FILES['imgnm']['tmp_name']))
	{
		$filenm = "paymenttype$action." . strrev(substr(strrev($_FILES['imgnm']['name']),0,3));
		copy($_FILES['imgnm']['tmp_name'],"../uploadfiles/$filenm");
		execute("update tbldatingpaymenttypemaster set imgnm='$filenm' where paymenttypeid=$action");
	}
	
	
	
	
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>