<?php
session_start();
require_once("commonfileadmin.php");
require_once("emailbulkcommonfunction.php");
checkadminlogin();

  $action = 0;
  $CreateByfld = "CreateBy";
  $ipfldnm = "CreateIP";

	$ip = $_SERVER["REMOTE_ADDR"];
	$totalmail = getonefielddata("select count(userid) from tbldatingusermaster where " . find_que_send_email($_POST['newsletter_subsciber']) . " currentstatus=0");
	if(isset($_POST['newsletter_subsciber']) && $_GET['newsletter_subsciber']=='P'){
		$totalmail = getonefielddata("SELECT count(id) from tbldatingpromotionalemailmaster WHERE currentstatus=0");
	} else {
		$totalmail = getonefielddata("select count(userid) from tbldatingusermaster where " . find_que_send_email($_POST['newsletter_subsciber']) . " currentstatus=0");
	}
	$EmailLot = findsettingemailbulk("EmailLot");
	if ($totalmail == "")
		$totalmail =0;
	if ($EmailLot == "")
		$EmailLot = 50;
	if ($totalmail <= $EmailLot )
		$totallot =1;
	else
		$totallot = $totalmail / $EmailLot;
	
	
	$query = sendtogeneratequery($action,"subject",$_POST['txtsubject'],"Y");
	$query .= sendtogeneratequery($action,"newsletter_subsciber",$_POST['newsletter_subsciber'],"Y");
	$query .= sendtogeneratequery($action,"message",$_POST['message'],"Y");
	$query .= sendtogeneratequery($action,"totallot",$totallot,"Y");
	$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	
	$query = substr($query,1);
 	$sSql = "insert into tblemailbulkmaster (subject,newsletter_subsciber,message,totallot,CreateBy,$ipfldnm,CreateDate) values($query,curdate())";
	execute($sSql);
	
	$templateid = getonefielddata("select sendid from tblemailbulkmaster order by sendid desc limit 1");
	
	if(isset($_POST['newsletter_subsciber']) && $_POST['newsletter_subsciber']!='')
	{
		$newsletter_subsciber=$_POST['newsletter_subsciber'];
	}else{$newsletter_subsciber='';}
	
	
	if($newsletter_subsciber=='A')
	{
		$a=" ";
	}elseif($newsletter_subsciber=='Y')
	{
		$a=" and news_letter_subscribe='Y' ";
	}elseif($newsletter_subsciber=='N')
	{
		$a=" and news_letter_subscribe='N' ";
	}
	
	
$result1 = getdata("select userid from tbldatingusermaster where currentstatus=0 ".$a." ");
while($rs1= mysqli_fetch_array($result1))
{
	$userid=$rs1[0];
	$sSql_ins = "INSERT INTO `tbl_user_emailbulk`(`userid`, `templateid`,`createdate`, `createip`)
	 VALUES ('".$userid."','".$templateid."',curdate(),'".$_SERVER["REMOTE_ADDR"]."')";
	execute($sSql_ins);
}
	
	
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:emailbulkmanager.php");
?>