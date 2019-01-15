<?php
session_start();
require_once("commonfileadmin.php");
require_once("emailbulkcommonfunction.php");
checkadminlogin();

if(isset($_GET['b']) && $_GET['b']!='')
{
	$action=$_GET['b'];
}else{$action=0;}

$limit=getonefielddata("select fldval from tblemaillbulksettingmaster where fldnm='EmailLot'");

$result = getdata("SELECT  `userid`, `templateid` FROM `tbl_user_emailbulk` WHERE templateid='".$action."' 
and currentstatus=0 and status='N' order by id limit ".$limit." ");
	while($rs= mysqli_fetch_array($result))
	{
	  	$userid=$rs[0];
		$templateid=$rs[1];
		
		$toemail=getonefielddata("select email from tbldatingusermaster where userid='".$userid."' ");
		$toname=getonefielddata("select name from tbldatingusermaster where userid='".$userid."' ");
		$subject=getonefielddata("select subject from tblemailbulkmaster where sendid='".$templateid."' ");
		$message=getonefielddata("select message from tblemailbulkmaster where sendid='".$templateid."' ");
		
		
			//$subject = str_replace("[sitename]",$sitename,$subject);
			$message = str_replace("[name]",$toname,$message);
			//$message = str_replace("[extramsg]",$verify_msg,$message);
			$message = str_replace("[sitename]",$sitename,$message);
			//echo $message;  exit;
				//$message = str_replace("[extramessage]",$verify_msg,$message);
			sendemaildirect($toemail,$subject,$message);	
			
		$sSql_upd = "UPDATE `tbl_user_emailbulk` SET status='Y' WHERE userid='".$userid."' and templateid='".$templateid."' ";
			execute($sSql_upd);

	}
?>

<h1>Email Sent Successfully</h1>