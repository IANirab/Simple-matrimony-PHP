<?php
session_start();
require_once("commonfileadmin.php");
require_once("emailbulkcommonfunction.php");
checkadminlogin();
$mess ="";
$links ="";

if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	$action = $_GET["b"];
else
	$action =0;

if ($action != 0){
	$result = getdata("select totallot,totallotsend,date_format(curdate(),'%m-%d-%Y'),subject,message,newsletter_subsciber from tblemailbulkmaster where sendid=$action");
	while($rs= mysqli_fetch_array($result))
	{
	  	$totallot=$rs[0];
		$totallotsend=$rs[1];
		$curdate =$rs[2];
		$subject =$rs[3];
		$message =$rs[4];
		$newsletter_subsciber=$rs[5];
	}	
	freeingresult($result);
	$links = "";
	if ($totallotsend == 0)
		$totallotsend =0;	
	for ($i = $totallotsend+1;$i<=$totallot;$i++)
	{
		$links .= "<a class='lotlink' href='emailbulksendmail.php?b=$action&b1=$i'>send $i lot</a><br>"; 
	}
	if($newsletter_subsciber!='P'){
		$exque =find_que_send_email($newsletter_subsciber);
	} else {
		$exque = '';	
	}
			
	if ((isset($_GET["b1"])) && is_numeric($_GET["b1"]) && $_GET["b1"]!=0)
	{
		
		$EmailLot = findsettingemailbulk("EmailLot");
		$fromadminemail= findsettingemailbulk("AdminEmailAddress");
 		$lotid = $_GET["b1"];
		if ($lotid != 1)
			$start = (($lotid * $EmailLot)-$EmailLot);
		else
			$start =0;
		if ($lotid > $totallotsend)
		{
		$mess = "sending $lotid lot";
	if($exque!='')	{
		$result = getdata("select name,email,userid from tbldatingusermaster where $exque currentstatus=0 order by userid desc limit $start,$EmailLot");
	} else {
		$result = getdata("SELECT name,email from tbldatingpromotionalemailmaster WHERE currentstatus=0");
	}
	while($rs= mysqli_fetch_array($result))
	{
	  	$name=$rs[0];
		$email=$rs[1];
		$userid =$rs[2];
		$tempsubject = $subject;
		$tempmessage = $message;
		$tempsubject = str_replace("[name]",$name,$tempsubject);
		$tempmessage= str_replace("[name]",$name,$tempmessage);
		$tempsubject = str_replace("[email]",$email,$tempsubject);
		$tempmessage= str_replace("[email]",$email,$tempmessage);
		$tempsubject = str_replace("[date]",$curdate,$tempsubject);
		$tempmessage= str_replace("[date]",$curdate,$tempmessage);
		sendemaildirect($email,$tempsubject,$tempmessage,$fromadminemail);
		execute("update tblemailbulkmaster set totalmailsend = totalmailsend +1 where  sendid=$action");
	}
	freeingresult($result);
	execute("update tblemailbulkmaster set totallotsend = totallotsend +1 where sendid=$action");
	$lotid = $lotid +1;
	$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
	if ($lotid > $totallot)
	{
		header("location:emailbulkmanager.php");
		exit();
	}
	else
	{
		header("location:emailbulksendmail.php?b=$action");
		exit();
	}
	/* if ($totallot > $lotid)
	{
		header("location:emailbulkmaster.php");
		exit();
	}
	else
	{
		header("location:emailbulksendmail.php?b=$action&b1=$lotid");
		exit();
	} */
}
}
}
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
.lotlink { color:#039; background-color:#fff; border:solid 1px #CCCCCC; padding:5px; width:200px; display:block; text-decoration:none; font-weight:bold; font-size:16px; text-align:center ; margin:33px 0 0 0;}
.lotlink:hover { color:#fff; background-color:#f4511e; border:solid 1px #f4511e}
</style>
</head>
<body onLoad="start()">

<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
<!-- TOP END ######################## -->

<div class="pagewrapper">
<div class="container">
	
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div class="col-lg-9 center_right">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<h1 class="pagetitle"><i class="fa fa-user"></i> Send Bulk Email Lot Wise</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<div class="error"><?= $mess ?></div>

<br />

<?= $links ?>


<!-- ********* CONTENT END HERE *********-->
			</div>

			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $announcementmanager_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
</div>
</div>
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->

</body>
</html>