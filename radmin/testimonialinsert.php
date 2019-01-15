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
	$query = sendtogeneratequery($action,"title",$_POST['txttitle'],"Y");
	$query .= sendtogeneratequery($action,"languageid",$_POST['cmblanguage'],"Y");
	$query .= sendtogeneratequery($action,"description",$_POST['description'],"Y","N");
	$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	

	$query = substr($query,1);

	if ($action == 0)
	{
	 	$sSql = "insert into tbldatingtestimonialmaster (title,languageid,description,CreateBy,$ipfldnm,CreateDate) values($query,curdate())";
		execute($sSql);
		$retfile ="testimonialmaster.php";
		$action = getonefielddata("select max(testimonialid) from tbldatingtestimonialmaster");
	}
	else
	{
		$sSql = "update tbldatingtestimonialmaster set $query,ModifyDate=curdate() where testimonialid=$action";
		execute($sSql);
		$retfile ="testimonialnamager.php";
	}
if(isset($_FILES["uploadimage"]['tmp_name']))
if($_FILES["uploadimage"]['tmp_name'] != "")
{
	$ext = strtolower(substr(strrchr($_FILES["uploadimage"]['name'],"."),1));
	$filenm = "testimonial" . $action . ".$ext";
	copy($_FILES["uploadimage"]['tmp_name'],"../uploadfiles" . "/" .$filenm);
	$sSql = "update tbldatingtestimonialmaster set image='$filenm' where testimonialid=$action";
	execute($sSql);
}	 
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>