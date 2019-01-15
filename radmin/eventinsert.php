<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$eventdate = $_POST['eventyy'] . "-" . $_POST['eventmm'] . "-" . $_POST['eventdd'];
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
}
else
{
	$action = 0;
}	
$query  = sendtogeneratequery($action,"title",$_POST['title'],"Y");	
	$query .= sendtogeneratequery($action,"location",$_POST['location'],"Y");
	$query .= sendtogeneratequery($action,"eventdate",$eventdate,"Y");		
	$query .= sendtogeneratequery($action,"archive",$_POST['radarchive'],"Y");
	$query .= sendtogeneratequery($action,"req_register",$_POST['radregister'],"Y");
	
	//$query .= sendtogeneratequery($action,"categoryid",$_POST['cmbcategory'],"Y");
	$query .= sendtogeneratequery($action,"categoryid",1,"Y");
	$query .= sendtogeneratequery($action,"description",$_POST['description'],"Y");
	$query .= sendtogeneratequery($action,"short_description",$_POST['short_description'],"Y");
	$query .= sendtogeneratequery($action,"languageid",$_POST['cmblanguage'],"Y");
	$query .= sendtogeneratequery($action,"dress_code",$_POST['dress_code'],"Y");
	$query .= sendtogeneratequery($action,"event_time",$_POST['event_time'],"Y");
	
	$query = substr($query,1);
	
if ($action == 0)
	 {
		$query .= sendtogeneratequery($action,"CreateDate",findcurrentdate(),"Y");
        $query .= sendtogeneratequery($action,"CreateBy",$_SESSION[$session_name_initital . 'adminlogin'],"N");
	$sSql = "insert into tbl_event_master(title,location,eventdate,archive,req_register,categoryid,description,short_description,languageid,dress_code,event_time,CreateDate,CreateBy) values($query)";
	
		$retfile ="eventmaster.php";
	 }
else
	{
	    $query .= sendtogeneratequery($action,"ModifyBy",$_SESSION[$session_name_initital . 'adminlogin'],"N");
		$query .= sendtogeneratequery($action,"ModifyDate",findcurrentdate(),"Y");
		$sSql = "update tbl_event_master set $query where eventid=$action";
		$retfile ="eventmanager.php";		
	}
	execute($sSql);
	


if ($action == 0)
		$action = getonefielddata("select max(eventid) from tbl_event_master");
		
if (is_uploaded_file($_FILES['img']['tmp_name']))
	{
		$filenm = "event$action." . strrev(substr(strrev($_FILES['img']['name']),0,3));
		copy($_FILES['img']['tmp_name'],"../uploadfiles/$filenm");
		execute("update tbl_event_master set imagenm='$filenm' where eventid=$action");
	}
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>