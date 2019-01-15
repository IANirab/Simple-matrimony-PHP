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
	$ip = $_SERVER["REMOTE_ADDR"];
	
	$query = sendtogeneratequery($action,"title",$_POST['Title'],"Y");
	$query .= sendtogeneratequery($action,"sectionid",$_POST['sectionid'],"Y");
	$query .= sendtogeneratequery($action,"gender",$_POST['gender'],"Y");
	$query .= sendtogeneratequery($action,"agefrom",$_POST['agefrom'],"Y");
	$query .= sendtogeneratequery($action,"ageto",$_POST['ageto'],"Y");
	$query .= sendtogeneratequery($action,"searchbase1",$_POST['searchbase1'],"Y");
	$query .= sendtogeneratequery($action,"keyword1",$_POST['keyword1'],"Y");
	$query .= sendtogeneratequery($action,"searchbase2",$_POST['searchbase2'],"Y");
	$query .= sendtogeneratequery($action,"keyword2",$_POST['keyword2'],"Y");
	$query .= sendtogeneratequery($action,"keyword",$_POST['keyword'],"Y");
	$query .= sendtogeneratequery($action,"metatag",$_POST['metatag'],"Y");
	$query .= sendtogeneratequery($action,"languageid",$_POST['cmblanguage'],"Y");
	$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	$query = substr($query,1);

	if ($action == 0)
	{
	 	$sSql = "insert into tbldatingadminsearchmaster (title,sectionid,gender,agefrom,ageto,searchbase1,keyword1,searchbase2,keyword2,keyword,metatag,languageid,CreateBy,$ipfldnm,CreateDate) values($query,curdate())";		
		execute($sSql);
		$retfile ="adminsearchmaster.php";
		$action = getonefielddata("select max(searchid) from tbldatingadminsearchmaster");
		$kw1 = getonefielddata("SELECT keyword1 from tbldatingadminsearchmaster WHERE searchid=".$action);
		if($kw1!=""){
			if($kw1=='Muslim'){
				execute("UPDATE tbldatingadminsearchmaster SET ordering='1' WHERE searchid=".$action);
			} else if($kw1=='Christian'){
				execute("UPDATE tbldatingadminsearchmaster SET ordering='2' WHERE searchid=".$action);
			} else if($kw1=='Hindu'){
				execute("UPDATE tbldatingadminsearchmaster SET ordering='3' WHERE searchid=".$action);
			} else {
				execute("UPDATE tbldatingadminsearchmaster SET ordering='0' WHERE searchid=".$action);
			}
			
		}
	}
	else
	{
		$sSql = "update tbldatingadminsearchmaster set $query,ModifyDate=curdate() where searchid=$action";
		execute($sSql);
		$retfile ="adminsearchmanager.php";
	}
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>