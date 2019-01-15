<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$pkg_mgmnt_pm_1 = pkg_mgmnt_pm_1();
	$pkg_mgmnt_pm_2 = pkg_mgmnt_pm_2();
	$pkg_mgmnt_pm_4 = pkg_mgmnt_pm_4();
	$pkg_mgmnt_pm_5 = pkg_mgmnt_pm_5();
} else {	
	$pkg_mgmnt_pm_1 = "N";
	$pkg_mgmnt_pm_2 = "N";
	$pkg_mgmnt_pm_4 = "N";
	$pkg_mgmnt_pm_5 = "N";
}
if($pkg_mgmnt_pm_1 == 'Y' || $pkg_mgmnt_pm_1 == 'N') {
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
			<h1 class="pagetitle">Package Sold Report</h1>
		
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<?
if($pkg_mgmnt_pm_5 == 'Y' || $pkg_mgmnt_pm_5 == 'N') { ?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col">Id</th>
		<th scope="col">title</th>
		<th scope="col">total sold count</th>
		<th scope="col">total amount</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
$fromqry = " from tbldatingpackagemaster where tbldatingpackagemaster.currentstatus in (0) ";
$fromqry .= $searchqry;
$FileNm = "package_sold_report.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tbldatingpackagemaster.PackageId) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select tbldatingpackagemaster.PackageId,tbldatingpackagemaster.Description ". $fromqry ." order by tbldatingpackagemaster.Description ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$PackageId=$rs[0];
			$Description=$rs[1];
			$result1 = getdata("select count(paymentdetailid),sum(price) from tbldatingpaymentdetail,tbldatingpaymentmaster where tbldatingpaymentdetail.paymentid=tbldatingpaymentmaster.paymentid and tbldatingpaymentmaster.currentstatus=0 and clear='Y' and packageid=$PackageId");
			while($rs1= mysqli_fetch_array($result1))
			{	
			$total_sold =$rs1[0];
			$total_amount =$rs1[1];
			}
			freeingresult($result1);
		 ?>
            <tr valign="top">
           	<td ><?=$PackageId?></td>
			<td ><?=$Description?></td>
			<td ><?=$total_sold?></td>
          	<td ><?=$total_amount?></td>
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
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $packagemanager_help ?></div>
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