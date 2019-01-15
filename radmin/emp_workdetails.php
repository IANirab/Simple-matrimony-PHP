<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$empid = 1;
$month = 0;
$year = 0;
if(isset($_POST['empid']) && $_POST['empid']!=''){
	$empid = $_POST['empid'];	
}
if(isset($_POST['month']) && $_POST['month']!=''){
	$month = $_POST['month'];
}
if(isset($_POST['year']) && $_POST['year']!=''){
	$year = $_POST['year'];
}
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onLoad="start()">
<div align="center" id="pagealign">
<div align="center" id="container">
<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
<!-- TOP END ######################## -->
	<div id="content-wrap">
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div id="center">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<div id="pagetitle"><h1>Report</h1>
			<div class="addlink1">
			</div></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
            <br>
<!-- ********* CONTENT START HERE *********-->
<?= checkerroradmin()?>
 <br>
<table width="90%"  border="0" align="center" cellpadding="3" cellspacing="0" class="greytableborder">
        <tr>
  		<th scope="col">Id</th>
	    <th scope="col">User Name</th>		
  		<th scope="col" width="100">Activities</th>
		</tr>
<?
$searchqry = "";
if($month>0){
	$searchqry .= " AND month(tbldatingactivity_logmaster.work_date)=".$month;	
}
if($year>0){
	$searchqry .= " AND year(tbldatingactivity_logmaster.work_date)=".$year;	
}

$fromqry = " from tbldatingactivity_logmaster,tbldatingusermaster where tbldatingactivity_logmaster.currentstatus in (0) AND tbldatingusermaster.userid=tbldatingactivity_logmaster.userid AND tbldatingactivity_logmaster.empid=".$empid." ".$searchqry." group by tbldatingusermaster.userid ";
$fromqry .= $searchqry;
$FileNm = "countrymanager.php?";
$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
//$totalnorecord = getonefielddata("select count(tbldatingcountrymaster.id) $fromqry ");
$totalnorecord  = '';
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$page_no_str= $arrval['PageStr'];

$result = getdata("select tbldatingusermaster.userid,tbldatingusermaster.name ". $fromqry ."");
while($rs= mysqli_fetch_array($result))
{
		  	$userid=$rs[0];
			$name=$rs[1];
			$activity_count = getonefielddata("SELECT count(id) from  tbldatingactivity_logmaster WHERE currentstatus=0 AND userid=".$userid." AND empid=".$empid." ");
		 ?>
            <tr>
                <td <?= admintdclass ?>><?=$userid?></td>
                <td <?= admintdclass ?>><?=$name?></td>
                <td <?= admintdclass ?>><a href="emp_activity_details.php?b=<?=$userid?>&empid=<?=$empid?>&m=<?=$month?>&y=<?=$year?>"><?=$activity_count?></a></td>            
            </tr>
		<?
	}
	freeingresult($result);
	?>
	</table>
	<table width=100% align=center class="nextbackbox" cellpadding="0" cellspacing="0">
	<tr>
	<td align="left" <?= adminnextbackcls ?>><?= $BackStr ?></td>
	<td class="nextbackmid"><?= $page_no_str ?></td>
	<td align="right" <?= adminnextbackcls ?>><?= $NextStr ?></td>
	</tr>
	</table>
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $countrymanager_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>