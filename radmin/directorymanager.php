<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$dir_mgmnt_dm_1 = dir_mgmnt_dm_1();
	$dir_mgmnt_dm_2 = dir_mgmnt_dm_2();	
	$dir_mgmnt_dm_3 = dir_mgmnt_dm_3();
} else {	
	$dir_mgmnt_dm_1 = "N";
	$dir_mgmnt_dm_2 = "N";
	$dir_mgmnt_dm_3 = "N";
}
if($dir_mgmnt_dm_1 == 'Y' || $dir_mgmnt_dm_1 == 'N') {
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
			<h1 class="pagetitle"><i class="fa fa-sitemap"></i> Directory Manager</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->
<?= checkerroradmin()?>

<div class="table-responsive">
<table   border="0" align="center" cellpadding="3" cellspacing="0" class="table table-striped">
<thead>
<tr>
  		<th scope="col" width="5%">Id</th>
	    <th scope="col" width="20%">Title &amp; Link</th>
		<th scope="col" class="mobile_none" width="15%">Categoryid</th>
        <th scope="col" class="mobile_none">Description</th>
         <th scope="col" class="mobile_none" width="5%">Details</th>
         <th scope="col" width="5%%">Status</th>
  		<th scope="col" width="15%">Action</th>
		</tr>
        </thead>
        <tbody>
<?
$searchqry = "";
$fromqry = " from tbl_directory_master,tbl_directory_category_master where tbl_directory_master.categoryid=tbl_directory_category_master.categoryid and tbl_directory_master.currentstatus in (0,2) ";
$fromqry .= $searchqry;
$FileNm = "directorymanager.php?";

$Pgnm = isset($_GET['pgnm'])?$_GET['pgnm']:1;		
if ($Pgnm == "")
	$Pgnm = 1;
	
$totalnorecord = getonefielddata("select count(tbl_directory_master.directoryid) $fromqry ");
		
$arrval = setpaging($Pgnm,$totalnorecord,$FileNm,"Next","Back","N","Y");
$NoOfRecord = $arrval["NoOfRecord"];
$BackStr = $arrval["BackStr"];
$NextStr = $arrval["NextStr"];

$result = getdata("select tbl_directory_master.directoryid,tbl_directory_master.title,tbl_directory_category_master.title,tbl_directory_master.link,tbl_directory_master.description,tbl_directory_master.currentstatus,tbl_directory_master.payment_completed,tbl_directory_master.paymentdate ". $fromqry ." order by tbl_directory_master.directoryid desc ". $NoOfRecord);
while($rs= mysqli_fetch_array($result))
{
	  $directoryid=$rs[0];
	  $title=$rs[1];
	  $category=$rs[2];
	  $link = $rs[3];
	  $desc = $rs[4];
	  $status = $rs[5];
	  $payment_completed = $rs[6];
	  $payment_date = $rs[7];
?>
            <tr>
           	<td ><?=$directoryid?></td>
          	<td><?=$title?><br><?=$link?></td>
          	<td class="mobile_none"><?=$category?></td>
            <td class="mobile_none"><?=$desc?></td>
            <td class="mobile_none"><?=$payment_completed?><? if($payment_completed=='Y') { ?><br><?=$payment_date?><? } ?></td>
            <td >
            <? if($status==0){ ?>Approve<?php } else {?>Unapprove<?php }?>
            </td>
            <td <?= admintdclass ?>>
		    	<? if($dir_mgmnt_dm_2 == 'Y' || $dir_mgmnt_dm_2 == 'N') {  ?>
				<a href="directorymaster.php?b=<?=$directoryid ?>" class="actionbtn_m green">Modify</a>
                <? if($status==0){ ?>
                <a href="directorydelete.php?b=<?=$directoryid ?>&b1=2" class="actionbtn">Unapprove</a>
                <? } else { ?>
                <a href="directorydelete.php?b=<?=$directoryid ?>&b1=0.0" class="actionbtn green">Approve</a>
                <? } ?>
				<? } if($dir_mgmnt_dm_3 == 'Y' || $dir_mgmnt_dm_3 == 'N') {  ?>
				<a href="directorydelete.php?b=<?=$directoryid ?>&b1=1" class="actionbtndel">Delete</a>
				<? } if($payment_completed=='N') { ?>
                	<a href="directorypremium.php?b=<?=$directoryid ?>&b1=1" class="actionbtn">Make it <br/> Premium</a>                
                <? } else { ?>    
                	<a href="directorypremium.php?b=<?=$directoryid ?>" class="actionbtn red">Remove Premium</a>                
                 <? } ?>    
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
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $directorymanager_help ?></div>
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