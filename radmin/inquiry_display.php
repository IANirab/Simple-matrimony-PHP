<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$inq_mgmnt_imi_1 = inq_mgmnt_imi_1();	
	$inq_mgmnt_imis_1 = inq_mgmnt_imis_1();
	$inq_mgmnt_imis_2 = inq_mgmnt_imis_2();
} else {	
	$inq_mgmnt_imi_1 = "N";
	$inq_mgmnt_imis_1 = "N";
	$inq_mgmnt_imis_2 = "N";
}
if($inq_mgmnt_imi_1 == 'Y' || $inq_mgmnt_imi_1 == 'N') {


if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select subject,name,email,phone,message,createip,pagename,browser_info,date_format(createdate,'$date_format'),subjectid,eventid from tbl_dating_inquiry_master where id=$action ");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$subject = $rs[0];
		$name = $rs[1];
		$email = $rs[2];
		$phone = $rs[3];
		$message = $rs[4];
	  	$createip = $rs[5];
	  	$pagename = $rs[6];
	  	$browser_info = $rs[7];
	  	$createdate = $rs[8];
		$subjectid= $rs[9];
		if ($subjectid != "")
			$subjectid = getonefielddata("select title from tbl_dating_inquiry_subject_master where id=$subjectid");
			$eventid = $rs[10];
		if ($eventid != "")
			$eventid = getonefielddata("select title from tbl_event_master where eventid=$eventid");
		 
	}
	freeingresult($result);
}
?>

<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript src='../scripts/innovaeditor.js'></script>
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
			<h1 class="pagetitle">Add Banner</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">

<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<? if($inq_mgmnt_imi_1 == 'Y' || $inq_mgmnt_imi_1 == 'N') { ?>
<div class="form-group text-form">
<label>subject :</label>
			 <?= $subject  ?><br><?= $eventid ?>
			</div>
<div class="form-group text-form">
<label>name :</label>
            <?= $name?>
			</div>
      <div class="form-group text-form">
<label>email :</label>
            <?= $email?>
			</div>
<div class="form-group text-form">
<label>phone :</label>
			<?= $phone ?>
			</div>
<div class="form-group text-form">
<label>IP </label>
   			<?= $createip ?>
            </div>
<div class="form-group text-form">
<label>page name :</label>
			<?= $pagename  ?>
            </div>
<div class="form-group text-form">
<label>browser info :</label>
			 <?= $browser_info ?>
			</div>
 <div class="form-group text-form">
<label>message :</label>
   			<?=$message?>
			</div>
<div class="form-group text-form">
<label>date :</label>
   			<?=$createdate?>
			</div>
<div class="form-group text-form">
<label>inquiry for :</label>
   			<?=$subjectid?><br>
			
			</div>
<? } ?>
    </form>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $bannermaster_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
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