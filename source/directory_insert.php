<?php

ob_start();
require_once("commonfile.php");
$passcode ="";
$id ="";
$insert_mode = "N";
if ((isset($_POST["directoryid"])) && (is_numeric($_POST["directoryid"])))
	$id = $_POST["directoryid"];
	
if ((isset($_POST["passcode"])) && (is_numeric($_POST["passcode"])))
	$passcode = $_POST["passcode"];
	
$action = 0;	
if (($id != "") && ($passcode != ""))
{
	$result = getdata("select directoryid from tbl_directory_master where deactive='N' and currentstatus=0 and directoryid=$id and password='$passcode'");
	$directoryid ="";
while($rs= mysqli_fetch_array($result))
{
	$action = $rs[0];
	$directoryid= $rs[0];
}
	freeingresult($result);
if ($directoryid == "")
{
	header("location:message.php?b=62");
	exit();
}

}

$createbyfld = "createby";
if ($action == 0)
$ipfldnm = "createip";
else
$ipfldnm = "modifyip";

	if ($action ==0)
	{
	$directoryid = getonefielddata("select directoryid from tbl_directory_master where currentstatus=0 and email='" . $_POST['email'] . "'");
	if ($directoryid != "")
	{
		header("location:message.php?b=61");
		exit();
	}
	}
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$amount = findsettingvalue("Directory_listing_price");
	
	$query = sendtogeneratequery($action,"title",strip_tags($_POST['dtitle']),"Y");
	$query .= sendtogeneratequery($action,"categoryid",strip_tags($_POST['categoryid']),"Y");
	$query .= sendtogeneratequery($action,"description",check_lalid_length_input(strip_tags($_POST['message'])),"Y");	
	$query .= sendtogeneratequery($action,"link",strip_tags($_POST['link']),"Y");	
	$query .= sendtogeneratequery($action,"mobile",strip_tags($_POST['dmobile']),"Y");		
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	

	$query = substr($query,1);
	
	if ($action == 0)
	{
	$query .= sendtogeneratequery($action,"email",strip_tags($_POST['email']),"Y");
	$query .= sendtogeneratequery($action,"typeid",strip_tags($_POST['typeid']),"Y");	
	$query .= sendtogeneratequery($action,"amount",$amount,"Y");		
 	$sSql = "insert into tbl_directory_master (title,categoryid,description,link,mobile,$ipfldnm,email,typeid,amount,createdate) values($query,curdate())";
	execute($sSql);
	$action = getonefielddata("select max(directoryid) from tbl_directory_master");
	$password = rand();
	$query = sendtogeneratequery($action,"code",$action,"Y");
	$query .= sendtogeneratequery($action,"password",$password,"Y");
	$query = substr($query,1);
	$sSql = "update tbl_directory_master set $query where directoryid=$action"; 
	execute($sSql);
	$insert_mode = "Y";
	}
	else
	{
		$sSql = "update tbl_directory_master set $query where directoryid=$action and password='$passcode'";
	execute($sSql);
	$password = $passcode;
	}
$chkapproval = findsettingvalue("Directory_auto_approval");	
if($chkapproval=='N'){
	execute("update tbl_directory_master SET currentstatus=2 WHERE directoryid=".$action);	
}
if (is_uploaded_file($_FILES['img']['tmp_name']))
{
$filenm="directory$action." . strrev(substr(strrev($_FILES['img']['name']),0,3));
copy($_FILES['img']['tmp_name'],"uploadfiles/$filenm");
execute("update tbl_directory_master set image_nm='$filenm' where directoryid=$action");
}

if ($insert_mode == "Y")
{
	$extramessage = "title :" . strip_tags($_POST['title']) ."<br>";
	$extramessage .= "<a href='" .$sitepath. "directory_add.php?b=$action&b1=$password'>click here to modify listing</a>";

	$subject = "";
	$message = "";
	$result = getdata("select subject,message from tbldatingemailmaster where emailid=18");
	while($rs= mysqli_fetch_array($result))
	{
		$subject = $rs[0];
		$message = $rs[1];
	}
		freeingresult($result);
	$message = $message ."<br>". $extramessage;
	sendemaildirect($_POST['email'],$subject,$message,"");
}

if ($insert_mode == "Y")
{
if ($_POST['typeid'] == 1)
{
header("location:message.php?b=57");
exit();
}
else
{
header("location:directory_paypal.php?b=$action&b1=$password");
exit();
}
}
else
{
header("location:message.php?b=57");
exit();
}
ob_flush();
?>