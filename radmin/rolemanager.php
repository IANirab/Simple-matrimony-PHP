<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$status  = "0";
$quer_st = "";
if (isset($_GET["b"]))
if ($_GET["b"] != "")
{
	$status = $_GET["b"];
	$quer_st = $status;
}
if ($status == 0)
	$pgtitle ="active";
else
	$pgtitle ="deactive";
$login_id = $_SESSION[$session_name_initital.'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tblmatriadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$web_setting_wss_7 = web_setting_wss_7();
	$web_setting_wss_8 = web_setting_wss_8();	
} else {	
	$web_setting_wss_7 = "N";
	$web_setting_wss_8 = "N";	
}
if($web_setting_wss_7 == 'Y' || $web_setting_wss_7 == 'N') {
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
			<div id="pagetitle"><h1>Employee Role Manager</h1>
			<div class="addlink1"><!--<div class="addlink"><a href="banned_ip_master.php">Add new IP</a></div>--></div></div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>

<table width="90%"  border="0" align="center" cellpadding="3" cellspacing="0" class="greytableborder">
        <tr>
  		<th scope="col">Id</th>
		<th scope="col">Role Name</th>
  		<th scope="col" class="admingrhead_bn" width="100">Action</th>
		</tr>
<?
$searchqry = "";
$fromqry = " from tbl_employee_role_master where currentstatus in ($status) ";
$fromqry .= $searchqry;
$FileNm = "rolemanager.php?b=$quer_st&";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata("select count(id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$page_no_str = $arrval["PageStr"];

$result = getdata("select id,title,currentstatus ". $fromqry ." order by tbl_employee_role_master.id asc ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$ip=$rs[1];			
			$currentstatus=$rs[2];
			if ($currentstatus ==0) {
				$status_text ="Active";
				$status_link = "Deactive";
				$stat = "1";
			}else{
				$status_text ="Deactive";
				$status_link = "Active";
				$stat = "0";
			}	
		 ?>
            <tr valign="top">
           	<td <?= admintdclass ?>><?=$id?></td>
			<td <?= admintdclass ?>><?=$ip?></td>					          	
            <td <?= admintdclass ?>>
			<? if($web_setting_wss_8 == 'Y' || $web_setting_wss_8 == 'N') { ?>
		    	<a class="actionbtn" href="emp_role_master.php?b=<?= $id ?>"><img title="Modify" src="images/modify_icon.png" alt="Modify"></a>&nbsp;
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
	<td class="nextbackmid" align="center"><?= $page_no_str ?></td>
	<td align="right" <?= adminnextbackcls ?>><?= $NextStr ?></td>
	</tr>
	</table>
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $testimonialmanager_help ?></div>
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
</html><? } else {
	header("location:dashboard.php?msg=no");
	exit;
} ?>