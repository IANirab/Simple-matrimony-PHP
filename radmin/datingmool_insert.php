<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$_SESSION["adminerror"]="";
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
	
	if(isset($_POST["title"]) && $_POST["title"] != "") {
			$title = $_POST["title"];
			$_SESSION["title"] = $title;
			
		}
	
	
	
	if($_POST["title"] == "" || $_POST["title"] == "0.0") {
			$_SESSION["adminerror"] = "Please Enter title";
			header("location:datingmool_master.php");
			exit;
		}
	
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$query="";
	$query .= sendtogeneratequery($action,"title",$_POST["title"],"Y");
    $query .= sendtogeneratequery($action,"languageid",$_POST["languageid"],"Y");
     $query .= sendtogeneratequery($action,"subcasteid",$_POST["subcasteid"],"Y");

	$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_init . 'adminlogin'],"Y");
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	

	$query = substr($query,1);

	if ($action == 0)
	{
	 	$sSql = "insert into tbldatingmool_master (title,languageid,subcasteid,$CreateByfld,$ipfldnm,createdate) values($query,curdate())";
		execute($sSql);
		//$retfile ="tbldatingmool_master_master.php";
		$retfile = "datingmool_manager.php";
		$action = getonefielddata("select max(id) from tbldatingmool_master");
	}
	else
	{
		$sSql = "update tbldatingmool_master set $query,modifydate=curdate() where id=$action";
		execute($sSql);
		//$retfile ="tbldatingmool_master_manager.php";
		$retfile = "datingmool_manager.php";
	}







$_SESSION["title"] = "";


$_SESSION["adminerror"] = "information saved successfully";
header("location:$retfile");
?>