<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	  $createbyfld = "modifyby";
	  $ipfldnm = "modifyip";
	}
else
	{
	  $action = 0;
	  $createbyfld = "createby";
	  $ipfldnm = "createip";
	}
	if (isset($_POST["chkdeactive"]))
		$deactive = "Y";
	else
		$deactive = "N";
	if ($_POST['typeid'] == 2)
	$payment_completed ="Y";
	else
	$payment_completed ="N";
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$query = sendtogeneratequery($action,"title",$_POST['title'],"Y");
	$query .= sendtogeneratequery($action,"categoryid",$_POST['categoryid'],"Y");
	$query .= sendtogeneratequery($action,"description",$_POST['description'],"Y");	
	$query .= sendtogeneratequery($action,"link",$_POST['link'],"Y");	
	$query .= sendtogeneratequery($action,"mobile",$_POST['mobile'],"Y");	
	$query .= sendtogeneratequery($action,"email",$_POST['email'],"Y");
	$query .= sendtogeneratequery($action,"password",$_POST['password'],"Y");	
	$query .= sendtogeneratequery($action,"typeid",$_POST['typeid'],"Y");	
	$query .= sendtogeneratequery($action,"payment_completed",$payment_completed,"Y");	
$query .= sendtogeneratequery($action,"deactive",$deactive,"Y");	
		
	$query .= sendtogeneratequery($action,"$createbyfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	

	$query = substr($query,1);

	if ($action == 0)
	{
	 	$sSql = "insert into tbl_directory_master (title,categoryid,description,link,mobile,email,password,typeid,payment_completed,createby,$ipfldnm,createdate) values($query,curdate())";
		$retfile ="directorymaster.php";
	}
	else
	{
		$sSql = "update tbl_directory_master set $query,modifydate=curdate() where directoryid=$action";
		$retfile ="directorymanager.php";
	}
	echo($sSql);
	
execute($sSql);


if ($action == 0)
		$action = getonefielddata("select max(directoryid) from tbl_directory_master");

if (isset($_FILES['img']['tmp_name']))		
if (is_uploaded_file($_FILES['img']['tmp_name']))
	{
		$filenm = "directory$action." . strrev(substr(strrev($_FILES['img']['name']),0,3));
		copy($_FILES['img']['tmp_name'],"../uploadfiles/$filenm");
		execute("update tbl_directory_master set image_nm='$filenm' where directoryid=$action");
	}


$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>