<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$action = 0;
$title = "";	
$languageid= 0;
$filename ="settinginsert";

$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$web_setting_wss_3 = web_setting_wss_3();
	$web_setting_wss_4 = web_setting_wss_4();
} else {	
	$web_setting_wss_3 = "N";
	$web_setting_wss_4 = "N";
}
$tblnm = 'tbldatingsettingmaster';
if(isset($_GET['t']) && $_GET['t']=='m'){
	$tblnm = 'tbldatingmobsettingmaster';	
}
if($web_setting_wss_3 == 'Y' || $web_setting_wss_3 == 'N') {

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];
	$result = getdata("select displaytext,fldval from $tblnm where currentstatus =0 and settingid=$action");
	while ($rs = mysqli_fetch_array($result))
	{		  	
		$displaytext = $rs[0];	
		$fldval= $rs[1];
		$fldval = str_replace("&#39;","'",$fldval);	
	}
	freeingresult($result);
}
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
			<h1 class="pagetitle">Change Settings</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<? if($web_setting_wss_4 == 'Y' || $web_setting_wss_4 == 'N') { 
$formact = $filename.".php?b=".$action;
if(isset($_GET['t']) && $_GET['t']=='m'){
	$formact .= '&t=m';	
}
?>
     <form name=frmdocument method=post action ="<?=$formact ?>" class="form-horizontal" >
     <div class="form-group">
            <label><?=$displaytext?></label>
			<textarea name="title" class="form-control" cols="50" rows="10"><?= $fldval ?></textarea>
              </div>
          
         <div class="form-group common_button">
         <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset" class="btn" value="Reset" title="Reset" alt="Reset">
            </div>
    </form><? } ?>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $settingmaster_help ?></div>
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