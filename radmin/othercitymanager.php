<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$location_mgmnt_lc_1 = location_mgmnt_lc_1();
	$location_mgmnt_lc_2 = location_mgmnt_lc_2();
	$location_mgmnt_lc_4 = location_mgmnt_lc_4();
} else {	
	$location_mgmnt_lc_1 = 'N';
	$location_mgmnt_lc_2 = 'N';
	$location_mgmnt_lc_4 = 'N';
}
?>
<? if($location_mgmnt_lc_1 == 'Y' || $location_mgmnt_lc_1 == 'N'){ ?>
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
			<h1 class="pagetitle">Disapprove City Manager</h1>
			<div class="addlink1">
			
			</div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->
<?= checkerroradmin()?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col">City Id</th>
	    <th scope="col">City Name</th>
        <th scope="col">State Name</th>
        <th scope="col">Status</th>
		<?php /*?><th scope="col">Language</th><?php */?>
  		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
//$fromqry = " from tbldatingcountrymaster,tbldatingsitelanguagemaster where tbldatingcountrymaster.languageid=tbldatingsitelanguagemaster.languageid and tbldatingcountrymaster.currentstatus in (0) ";
$fromqry = " from tbldating_city_master where currentstatus in (5) ";
$fromqry .= $searchqry;
$FileNm = "citymanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(id) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];
$page_no_str= $arrval['PageStr'];
$result = getdata("select id,title,currentstatus,state_id ". $fromqry ." order by tbldating_city_master.title ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$LocationId=$rs[0];
			$LocationName=$rs[1];
			$currentstatus=$rs[2];
			$state_id=$rs[3];
			if($state_id!='' && $state_id!='0.0')
			{
				$state_id=getonefielddata("select title from tbldating_state_master where id=".$state_id."");
			}
			/*$imagenm=$rs[2];
			$language=$rs[3];
			if ($imagenm == "")
				$imagenm ="noimage.gif";*/
		 ?>
            <tr>
           	<td ><?=$LocationId?></td>
          	<td ><?=$LocationName?></td>
            <td ><?=$state_id?></td>
            <td >Disapprove</td>
            <td >
				<a href="othercitydelete.php?b=<?= $LocationId ?>" class="actionbtndel green">Approve</a>
				
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
<? } else {
	header("location:dashboard.php?msg=no");
} ?>