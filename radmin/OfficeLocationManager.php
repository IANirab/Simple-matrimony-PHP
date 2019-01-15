<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$table_field_title ="NameOfOffice,ContactPerson,Street Add,Email,Phone";
$table_field_title_arr = explode(",",$table_field_title);
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
			<h1 class="pagetitle">Office Location Manager</h1>
			<div class="addlink1"><div class="addlink"><a href="OfficeLocationMaster.php">Add new</a></div></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->
<?= checkerroradmin()?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th width="5%" scope="col">Id</th>
		<? for ($i=1;$i<count($table_field_title_arr);$i++) { ?>
		<th scope="col" width="20%"><?= $table_field_title_arr[$i] ?></th>
		<? } ?>
      <th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
$fromqry = " from tbloffice_location where currentstatus in (0) ";
$fromqry .= $searchqry;
$FileNm = "OfficeLocationManager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select id,NameOfOffice,ContactPerson,StreetAdd,Email,Phone $fromqry  $NoOfRecord ");

while($rs= mysqli_fetch_array($result))
{
$id=$rs[0];
$NameOfOffice=$rs[1];
$ContactPerson=$rs[2];
$StreetAdd=$rs[3];
$Email=$rs[4];
$Phone=$rs[5];
?>
<tr valign="top">
<td ><?= $id ?></td>
<td ><?=$NameOfOffice ?></td>
<td><?= $ContactPerson ?>&nbsp;</td>
<td ><?=$StreetAdd?></td>
<td ><?=$Email?></br>
<?=$Phone?></td>
<td >
<a href="OfficeLocationMaster.php?b=<?= $id ?>" class="actionbtn_m green">Modify</a>
<a href="OfficeLocationDelete.php?b=<?= $id ?>" class="actionbtndel">Delete</a>
</td>
</tr>
<?
}
freeingresult($result);
?>
</tbody>
</table>
</div>
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




