<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$event_mgmnt_em_1 = event_mgmnt_em_1();
	$event_mgmnt_em_2 = event_mgmnt_em_2();
	//$event_mgmnt_em_3 = event_mgmnt_em_3();
	$event_mgmnt_em_4 = event_mgmnt_em_4();
} else {	
	$event_mgmnt_em_1 = "N";
	$event_mgmnt_em_2 = "N";
	//$event_mgmnt_em_3 = "N";
	$event_mgmnt_em_4 = "N";
}
if($event_mgmnt_em_1 == 'Y' || $event_mgmnt_em_1 == 'N') {
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
			<h1 class="pagetitle"><i class="fa fa-calendar"></i> Event Manager</h1>
			<div class="addlink1"><?
			if($event_mgmnt_em_2 == 'Y' || $event_mgmnt_em_2 == 'N') { ?>
			<div class="addlink"><a href="eventmaster.php">Add New Event</a></div>
			<? } ?>
			
			</div></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col">Id</th>
	    <th scope="col">Title</th>
		<th scope="col">location</th>
	    <th scope="col" width="80px" class="mobile_none">event date</th>
		<th scope="col">archive</th>
  		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
$fromqry = "from tbl_event_master where CurrentStatus in(0)";
$FileNm = "eventmanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(eventid) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select eventid,title,location,date_format(eventdate,'$date_format'),imagenm,archive ". $fromqry ." order by eventid desc ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$eventid = $rs[0];
		$title = $rs[1];
		$location = $rs[2];
		$eventdate= $rs[3];
		$imagenm = $rs[4];
		$archive = $rs[5];
		if ($imagenm == "")
			$imagenm ="noimage_event.gif";
		 ?>
         <tr valign="top"> 
 	     <td ><?=$eventid?></td>
	     <td ><img src='../uploadfiles/<?=$imagenm?>' height="80" width="80"></td>
		 <td> <strong><?=$title?></strong><br>Location : <?=$location?>&nbsp;</td>
		  <td class="mobile_none"><?=$eventdate?>&nbsp;</td>
		 <td ><?=$archive?>&nbsp;</td>
         <td >
		 <?
			if($event_mgmnt_em_2 == 'Y' || $event_mgmnt_em_2 == 'N') { ?>
		<a href="eventmaster.php?b=<?= $eventid ?>" class="actionbtn_m green">Modify</a>
		<? } if($event_mgmnt_em_2 == 'Y' || $event_mgmnt_em_2 == 'N') { ?>
		<a href="event_delete.php?b=<?= $eventid ?>" class="actionbtndel">Delete</a></td>
		<? } ?>
                    </tr>
					
		<?
	}
	freeingresult($result);
	?>
    </tbody>
	</table>
	<table width=100% align=center class="nextbackbox" cellpadding="0" cellspacing="0">
	<tr>
	<td align="left" <?= adminnextbackcls ?>><?= $BackStr ?></td>
	<td class="nextbackmid">&nbsp;</td>
	<td align="right" <?= adminnextbackcls ?>><?= $NextStr ?></td>
	</tr>
	</table>
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $eventmanager_help ?></div>
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
<? 
} else {
	header("location:dashboard.php?msg=no");
	exit;
}
?>