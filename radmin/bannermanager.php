<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$banner_mgmnt_bm_1 = banner_mgmnt_bm_1();
	$banner_mgmnt_bm_2 = banner_mgmnt_bm_2();
	$banner_mgmnt_bm_4 = banner_mgmnt_bm_4();
	$banner_mgmnt_bm_5 = banner_mgmnt_bm_5();
	$banner_mgmnt_bm_6 = banner_mgmnt_bm_6();
} else {	
	$banner_mgmnt_bm_1 = "N";
	$banner_mgmnt_bm_2 = "N";
	$banner_mgmnt_bm_4 = "N";
	$banner_mgmnt_bm_5 = "N";
	$banner_mgmnt_bm_6 = "N";
}
if($banner_mgmnt_bm_1 == 'Y' || $banner_mgmnt_bm_1 == 'N') {
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
			 <h1 class="pagetitle"><i class="fa fa-file-image-o"></i> Banner Manager</h1>
			<div class="addlink1"><?
			if($banner_mgmnt_bm_2 == 'Y' || $banner_mgmnt_bm_2 == 'N') { ?>			 
			<div class="addlink"><a href="bannermaster.php">Add new banner</a></div>
			<? } ?>
			
			</div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col">Id</th>
		<th scope="col" class="mobile_none">location</th>
		<th scope="col">title</th>				
  		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
$fromqry = " from tblbannermaster,tblbannerlocsizemaster where tblbannermaster.LSId=tblbannerlocsizemaster.LocSizeId and tblbannermaster.currentstatus in (0)";
$fromqry .= $searchqry;
$FileNm = "bannermanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata( "select count(tblbannermaster.Bannerid) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select tblbannermaster.Bannerid,tblbannermaster.Title,TotalHits,TotalClicks,TotalConversion,tblbannerlocsizemaster.Title,tblbannermaster.imagenm,tblbannermaster.description ". $fromqry ." order by tblbannermaster.Description ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
		  	$Bannerid=$rs[0];
			$Title=$rs[1];
			$TotalHits=$rs[2];
			$TotalClicks =$rs[3];
			$TotalConversion =$rs[4];
			$location =$rs[5];
			$imgnm = $rs[6];
			$desc = $rs[7];
			$bannerdata = '';
			if($desc!=''){
				$bannerdata = $desc;	
			}
			if($imgnm!='' && file_exists("../uploadfiles/site_".$sitethemefolder."/".$imgnm)){
				$bannerdata = '<div class="banner_w"><img src="'.$sitepath.'uploadfiles/site_'.$sitethemefolder."/".$imgnm.'" height="" width=""></div>';	
			}
			
		 ?>
         <tr valign="top">
           	<td >&nbsp;<?=$Bannerid?></td>
           	<td lass="mobile_none">&nbsp;<strong>Location:</strong><?=$location?><? if($Title!='') { ?><br><strong>Title:</strong><?=$Title?><? } ?><br><?=$bannerdata?></td>
			<td >
            	<strong>Hits : </strong><?=$TotalHits?><br>
                <strong>Clicks : </strong><?=$TotalClicks?><br>
                <strong>Conversion : </strong><?=$TotalConversion?>                
            </td>			           
			<?php /*?><td <?= admintdclass ?>><?=$name?></td><?php */?>
            <td >
		    	<a href="bannermaster.php?b=<?= $Bannerid ?>" class="actionbtn_m" title="Modify green">Modify</a>
				<a href="bannerdelete.php?b=<?= $Bannerid ?>" class="actionbtndel" title="Delete">Delete</a>
            	</td>
            </tr>
            <?php /*?><tr valign="top">
           	<td <?= admintdclass ?>><?=$Bannerid?></td>
           	<td <?= admintdclass ?>><?=$location?></td>
			<td <?= admintdclass ?>><?=$Title?></td>
		<td <?= admintdclass ?>><?=$TotalHits?></td>
          	<td <?= admintdclass ?>><?=$TotalClicks?></td>
			<td <?= admintdclass ?>><?=$TotalConversion?></td>
            <td <?= admintdclass ?>>
				<?
				if($banner_mgmnt_bm_2 == 'Y' || $banner_mgmnt_bm_2 == 'N') { ?>	
		    	<a href="bannermaster.php?b=<?= $Bannerid ?>" class="actionbtn">Modify</a>
				<? } if($banner_mgmnt_bm_4 == 'Y' || $banner_mgmnt_bm_4 == 'N') { ?>
				<a href="bannerdelete.php?b=<?= $Bannerid ?>" class="actionbtndel">Delete</a>
				<? } ?>
            	</td>
            </tr><?php */?>
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
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $bannermanager_help ?></div>
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