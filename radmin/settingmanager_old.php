<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$web_setting_wss_3 = web_setting_wss_3();
	$web_setting_wss_4 = web_setting_wss_4();
} else {	
	$web_setting_wss_3 = "N";
	$web_setting_wss_4 = "N";
}
if($web_setting_wss_3 == 'Y' || $web_setting_wss_3 == 'N') {
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
			<div id="pagetitle"><h1>Site Settings</h1></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<table width="90%"  border="0" align="center" cellpadding="3" cellspacing="0" class="greytableborder">
        <tr>
  		<th scope="col">Id</th>
	    <th scope="col">Setting Title</th>
		<th scope="col">Current Set Value</th>
  		<th scope="col" width="100">Action</th>
		</tr>
<?
$searchqry = "";
$fromqry = " from tbldatingsettingmaster where currentstatus in (0) ";
$fromqry .= $searchqry;
$FileNm = "settingmanager.php?";

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
           	<td <?= admintdclass ?>><?=$settingid?></td>
          	<td <?= admintdclass ?>><?=$displaytext?></td>
          	<td <?= admintdclass ?>><?=$fldval?></td>
            <td <?= admintdclass ?>>
			<? if($web_setting_wss_4 == 'Y' || $web_setting_wss_4 == 'N') { ?>
		    	<a href="settingmaster.php?b=<?= $settingid ?>" class="actionbtn">Modify</a>
				<? } ?>
            	</td>
            </tr>
		<?
	}
	freeingresult($result);
	?>
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
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $settingmanager_help ?></div>
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
	exit;
} ?>