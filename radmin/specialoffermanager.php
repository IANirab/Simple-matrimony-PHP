<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
/*if($pkg_mgmnt_pm_1 == 'Y' || $pkg_mgmnt_pm_1 == 'N') {*/
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
			<h1 class="pagetitle"><i class="fa fa-table"></i> Special Offer Manager</h1>
			<div class="addlink1">
			<? //if($pkg_mgmnt_pm_2 == 'Y' || $pkg_mgmnt_pm_2 == 'N') { ?>
			<div class="addlink"><a href="addspecialoffer.php">Add new Offer</a></div>
			<? //} ?>
			</div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col">Code</th>
		<th scope="col">Type</th>
		<th scope="col">Value</th>
		<th scope="col">Active</th>
  		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
$fromqry = " from tblscspecialoffermaster where tblscspecialoffermaster.currentstatus in (0) ";
$fromqry .= $searchqry;
$FileNm = "specialoffermanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata("select count(tblscspecialoffermaster.specialofferid) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select tblscspecialoffermaster.specialofferid,tblscspecialoffermaster.specialoffercode,
specialoffertype,specialsffervalue,currentstatus,active,specialsffervaluedisplay ". $fromqry ." 
order by tblscspecialoffermaster.specialofferid desc ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$id=$rs[0];
			$code=$rs[1];
			$Type=$rs[2];
			$Value =$rs[3];
			$active = $rs['active'];
			if($Type=='p'){
				$Type = "Percentage";
			} 
			if($Type=='v'){
				$Type = "Value";
			}
			if($same_currency_code=="N"){
				$Value = $rs['specialsffervaluedisplay'];
			}
			
			//$buylink =$sitepath . "$default_folder_name/package_buy.php?b=$PackageId";
		 ?>
            <tr valign="top">
           	<td ><?=$code?>&nbsp;</td>
			<td ><?=$Type?>&nbsp;</td>
			<td ><?=$Value?>&nbsp;</td>
          	<td ><?=$active?>&nbsp;</td>
            <td >
			<? //if($pkg_mgmnt_pm_2 == 'Y' || $pkg_mgmnt_pm_2 == 'N') { ?>
		    	<a href="addspecialoffer.php?b=<?= $id ?>" class="actionbtn_m green">Modify</a>
			<? //} if($pkg_mgmnt_pm_4 == 'Y' || $pkg_mgmnt_pm_4 == 'N') { ?>	
				<a href="offeraction.php?b=<?= $id ?>&b1=3" class="actionbtndel">Delete</a>
			<? //} ?>	
            	</td>
            </tr>
		<?
	}
	freeingresult($result);
	?>
    </tbody>
	</table></div>
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