<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();

if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	  $CreateByfld = "modifyby";
	  $ipfldnm = "modifyip";
	}
else
	{
	  $action = 0;
	  $CreateByfld = "createby";
	  $ipfldnm = "createip";
	}
	
	if(isset($_POST["subject"]) && $_POST["subject"] != "") {
			$subject = $_POST["subject"];
			$_SESSION["subject"] = $subject;
			
		}if(isset($_POST["title"]) && $_POST["title"] != "") {
			$title = $_POST["title"];
			$_SESSION["title"] = $title;
			
		}if(isset($_POST["message"]) && $_POST["message"] != "") {
			$message = $_POST["message"];
			$_SESSION["message"] = $message;
			
		}
	
	
	
	if($_POST["subject"] == "" || $_POST["subject"] == "0.0") {
			$_SESSION["adminerror"] = "Please Enter subject";
			header("location:template_master.php");
			exit;
		}if($_POST["title"] == "" || $_POST["title"] == "0.0") {
			$_SESSION["adminerror"] = "Please Enter title";
			header("location:template_master.php");
			exit;
		}if($_POST["message"] == "" || $_POST["message"] == "0.0") {
			$_SESSION["adminerror"] = "Please Enter message";
			header("location:template_master.php");
			exit;
		}
	
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$query="";
	$query .= sendtogeneratequery($action,"subject",$_POST["subject"],"Y");
    $query .= sendtogeneratequery($action,"title",$_POST["title"],"Y");
    $query .= sendtogeneratequery($action,"message",$_POST["message"],"Y");

	$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	

	$query = substr($query,1);

	if ($action == 0)
	{
	 	$sSql = "insert into tbldatingtemplatemaster (subject,title,message,$CreateByfld,$ipfldnm,createdate) values($query,curdate())"; 
		execute($sSql);
		//$retfile ="tbl_crmlead_emails_master_master.php";
		$retfile = "template_manager.php";
		$action = getonefielddata("select max(emailid) from tbl_crmlead_emails_master");
	}
	else
	{
		$sSql = "update tbldatingtemplatemaster set $query,modifydate=curdate() where emailid=$action";
		execute($sSql);
		//$retfile ="tbl_crmlead_emails_master_manager.php";
		$retfile = "template_manager.php";
	}







$_SESSION["subject"] = "";$_SESSION["title"] = "";$_SESSION["message"] = "";


$_SESSION["adminerror"] = "information saved successfully";
header("location:$retfile");
?>