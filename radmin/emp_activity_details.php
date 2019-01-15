<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$empid = 0;
$month = 0;
$year = 0;
$userid = 0;
if(isset($_GET['b']) && $_GET['b']!=''){
	$userid = $_GET['b'];
}
if(isset($_GET['empid']) && $_GET['empid']!=''){
	$empid = $_GET['empid'];	
}
if(isset($_GET['m']) && $_GET['m']!=''){
	$month = $_GET['m'];
}
if(isset($_GET['y']) && $_GET['y']!=''){
	$year = $_GET['y'];
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
	    <th scope="col">Activities</th>
        <th scope="col">Date</th>		
		</tr>
<?
$searchqry = "";
$searchqry = "";
if($month>0){
	$searchqry .= " AND month(tbldatingactivity_logmaster.work_date)=".$month;	
}
if($year>0){
	$searchqry .= " AND year(tbldatingactivity_logmaster.work_date)=".$year;	
}
//$fromqry = " from tbldatingactivity_logmaster,tbldatingusermaster where tbldatingactivity_logmaster.currentstatus in (0) AND tbldatingusermaster.userid=tbldatingactivity_logmaster.userid AND tbldatingactivity_logmaster.empid=".$empid." group by tbldatingusermaster.userid ";
$fromqry = " from tbldatingactivity_logmaster WHERE tbldatingactivity_logmaster.currentstatus=0 AND userid=".$userid." AND empid=".$empid." ".$searchqry;
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

$result = getdata("select tbldatingactivity_logmaster.id,tbldatingactivity_logmaster.description,tbldatingactivity_logmaster.work_date". $fromqry ."");
while($rs= mysqli_fetch_array($result)){
		  	$id=$rs[0];
			$desc=$rs[1];
			$date = $rs[2];
		 ?>
            <tr>
                <td <?= admintdclass ?>><?=$id?></td>
                <td <?= admintdclass ?>><?=$desc?></td>
                <td <?= admintdclass ?>><?=$date?></td>
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