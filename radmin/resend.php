<?
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
	
	$select = getdata("select mobile,sms_text  from  tbl_sms_master where id ='$action'");
	while($row= mysqli_fetch_array($select))
	{
		$mobile = $row['mobile'];
		$sms_text = $row['sms_text'];
		sms_to_send($mobile,$sms_text,0,1);
	}
	header("location:sms_manager.php");
?>