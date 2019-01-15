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
	
	
	
	
	
	
	
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$query="";
	
$query .= sendtogeneratequery($action,"typeid",$_POST["typeid"],"Y");
$query .= sendtogeneratequery($action,"questionid",$_POST["questionid"],"Y");
$query .= sendtogeneratequery($action,"answer",$_POST["answer"],"Y");
	//$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION['adminlogin'],"Y");
	//$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	

	$query = substr($query,1);

	if ($action == 0)
	{
	 	//$sSql = "insert into tbl_answer_master (answer,typeid,questionid,$CreateByfld,$ipfldnm,createdate) values($query,curdate())";
		$sSql = "insert into tbl_answer_master (typeid,questionid,answer) values($query)";
		execute($sSql);
		//$retfile ="tbl_answer_master_master.php";
		$retfile = "answer_manager.php";
		$action = getonefielddata("select max(id) from tbl_answer_master");
	}
	else
	{
		//$sSql = "update tbl_answer_master set $query,modifydate=curdate() where id=$action";
		$sSql = "update tbl_answer_master set $query where id=$action";
		execute($sSql);
		//$retfile ="tbl_answer_master_manager.php";
		$retfile = "answer_manager.php";
	}










$_SESSION["adminerror"] = "information saved successfully";
header("location:$retfile");
?>