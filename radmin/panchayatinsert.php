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
	$query .= sendtogeneratequery($action,"district_id",$_POST['cmbstate'],"Y");
	$query .= sendtogeneratequery($action,"languageid",$_POST['cmblanguage'],"Y");
	$query .= sendtogeneratequery($action,"city_id",$_POST['cmbstate'],"Y");
	//$query .= sendtogeneratequery($action,"$createbyfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	//$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	

	$query = substr($query,1);

	if ($action == 0)
	{
	 	//$sSql = "insert into tbldating_district_master (title,state_id,languageid,createby,$ipfldnm,createdate) values($query,curdate())";
	 	$sSql = "insert into tbldating_panchayat_master (title,district_id,languageid,city_id) values($query)";
		$retfile ="panchayatmaster.php";
	}
	else
	{
		//$sSql = "update tbldating_city_master set $query,modifydate=curdate() where id=$action";
	 $sSql = "update tbldating_panchayat_master set $query where id=$action";
	$retfile ="panchayatmanager.php";
	}
execute($sSql);
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>