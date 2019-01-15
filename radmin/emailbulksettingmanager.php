<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$bulk_email_be_1 = bulk_email_be_1();
	$bulk_email_be_2 = bulk_email_be_2();	
	$bulk_email_be_4 = bulk_email_be_4();
	$bulk_email_be_5 = bulk_email_be_5();
} else {	
	$bulk_email_be_1 = "N";
	$bulk_email_be_2 = "N";
	$bulk_email_be_4 = "N";
	$bulk_email_be_5 = "N";
}
if($bulk_email_be_1 == 'Y' || $bulk_email_be_1 == 'N') {
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
			<h1 class="pagetitle">Bulk Email Settings</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<? if($bulk_email_be_1 == 'Y' || $bulk_email_be_1 == 'N') { ?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col">Id</th>
	    <th scope="col">Setting Title</th>
		<th scope="col">Current Set Value</th>
  		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
$fromqry = " from tblemaillbulksettingmaster where currentstatus in (0) ";
$fromqry .= $searchqry;
$FileNm = "emailbulksettingmanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(settingid) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","N");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select settingid,displaytext,fldval ". $fromqry ." order by displaytext ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$settingid=$rs[0];
			$displaytext=$rs[1];
			$fldval=$rs[2];
		 ?>
            <tr valign="top">
           	<td ><?=$settingid?></td>
          	<td ><?=$displaytext?></td>
          	<td ><?=$fldval?></td>
            <td >
		    	<a href="emailbulksettingmaster.php?b=<?= $settingid ?>" class="actionbtn_m green">Modify</a>
            	</td>
            </tr>
		<?
	}
	freeingresult($result);
	?>
    </tbody>
	</table></div><? } ?>
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
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $emailbulksettingmanager_help ?></div>
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
<? } else {
	header("location:dashboard.php?msg=no");
} ?>