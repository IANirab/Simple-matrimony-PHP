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
	$ip = $_SERVER["REMOTE_ADDR"];
	$query = sendtogeneratequery($action,"title",$_POST['title'],"Y");
//	$query .= sendtogeneratequery($action,"cat_id",$_POST['cat_id'],"Y");	
	//$query .= sendtogeneratequery($action,"languageid",$_POST['cmblanguage'],"Y");
	//$query .= sendtogeneratequery($action,"$createbyfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	//$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	

	$query = substr($query,1);

	if ($action == 0)
	{
	 	//$sSql = "insert into tbldating_state_master (country_id,title,createby,$ipfldnm,createdate) values($query,curdate())";
	 	$sSql = "insert into tbldatingoccupationmaster (title) values($query)";						
		execute($sSql);
		$action = getonefielddata("SELECT max(id) from tbldatingoccupationmaster");
		execute("UPDATE tbldatingoccupationmaster SET currentstatus=0 WHERE id=".$action);
		$retfile ="occupation_manager.php";
	}
	else
	{
		//$sSql = "update tbldating_state_master set $query,modifydate=curdate() where id=$action";
		$sSql = "update tbldatingoccupationmaster set $query where id=$action";
		execute($sSql);
		execute("UPDATE tbldatingoccupationmaster SET currentstatus=0 WHERE id=".$action);
		$retfile ="occupation_manager.php";
	}

$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>