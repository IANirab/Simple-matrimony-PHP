<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
/*SELECT userid, monthname( CreateDate )
FROM tbldatingusermaster
WHERE createdate >= date_add( curdate( ) , INTERVAL -3
MONTH )*/
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
			<h1 class="pagetitle">Last Three Months Report</h1>
			<div class="addlink1">			
			<!--<div class="addlink"><a href="addspecialoffer.php">Add new Offer</a></div>-->			
			</div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col">Month</th>
		<th scope="col">No. of Users</th>
		<th scope="col">Total Amount</th>		
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
$fromqry = " from tbldatingpaymentmaster,tblscspecialoffermaster where promo_code!='' AND clear='Y' AND tbldatingpaymentmaster.CreateDate >= date_add( curdate( ) , INTERVAL -3 MONTH ) AND tbldatingpaymentmaster.currentstatus in (0) ";
$fromqry .= $searchqry;
$FileNm = "packagemager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
$totalnorecord = getonefielddata("select count(tblscspecialoffermaster.specialofferid) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select monthname(tbldatingpaymentmaster.CreateDate) AS month, sum(totalpaymentamount) AS total, count(paymentid) AS cnt  ". $fromqry ."  group by monthname(CreateDate) order by paymentid ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$month = $rs['month'];
			$total = round($rs['total']);
			$id = $rs['cnt'];
			
		 ?>
            <tr valign="top">
				<td ><?=$month?></td>
				<td ><strong><?=$id?></strong></td>
				<td ><?=$total?></td>          	
            </tr>
		<?
	}
	freeingresult($result);
	?></tbody>
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
<?php /*?><? } else {
	header("location:dashboard.php?msg=no");
} ?><?php */?>