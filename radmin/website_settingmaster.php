<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$txt_logo_slogan = findsettingvalue("logo_slogan");
$logo_image_nm = findsettingvalue("Logo_filenm");
$logo_link_nm= findsettingvalue("Logo_link");
$main_image_link= findsettingvalue("Home_page_main_image_nm");
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$web_setting_wss_1 = web_setting_wss_1();
	$web_setting_wss_2 = web_setting_wss_2();
} else {	
	$web_setting_wss_1 = "N";
	$web_setting_wss_2 = "N";
}
if($web_setting_wss_1 == 'Y' || $web_setting_wss_1 == 'N') {
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
div.tabs {
  font-size: 80%;
  font-weight: bold;
  float:left;
}

a.tab {
      float: left;
    background-color: #E0E9F3;
    border: 0;
    border-bottom: none;
    padding: 5px 13px;
    text-decoration: none;
    margin: 0 3px 0px 0;
    font-size: 14px;
    color: #fff;
    font-weight: normal;
	border-radius:3px;
}

a.tab, a.tab:visited {
  color: #fff; background-color: #FF5639;
}

a.tab:hover {
  background-color: #FF5639;
  color: #fff;
}


/*
 * note that by default all tab content areas
 * have display set to 'none'
 */
div.tabContent {float:left; width:100%;
    background: #F5F2F2;
    padding: 10px;

  display: none;
}
</style>

</head>

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
			<h1 class="pagetitle">Logo & Graphics</h1>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
<div class="tabs">
      <a class="tab active" id="tab1_id" onClick="showTab('tab1')">Logo</a>
      <a class="tab" id="tab2_id" onClick="showTab('tab2')">Static Graphics</a>				
</div>
<? if($web_setting_wss_2 == 'Y' || $web_setting_wss_2 == 'N') { ?>
<div id="tab1" class="tabContent" style="display:block">
<form name =frmdocument method=post action="dashboard_logo_submit.php" ENCTYPE="multipart/form-data" class="form-horizontal">
<div class="form-group">
             <div class="widhtsetr"><label>Upload Your Logo</label>
<input type="file" name="uploadimage"  class="form-control" size=20 style="vertical-align:middle">
</div>
 <div class="widhtsetr control-label_25"> 
 <label>&nbsp;</label>

<? if ($logo_image_nm != "") { ?> <img src='../uploadfiles/site_<?=$sitethemefolder;?>/<?= $logo_image_nm ?>' align="absmiddle"
 style="vertical-align:middle; max-width:100%;"><? } ?>
</div>
</div>
<div class="form-group">
             <div class="widhtsetr"><label>Upload Your Invoice Logo</label>
             <input type="file" name="invoicelogo"  class="form-control" size=20 style="vertical-align:middle">
             </div>
			  <div class="widhtsetr control-label_25"> 
 <label>&nbsp;</label>
			 
			 <? if(findsettingvalue('invLogo_filenm') != "") { ?> 
<img src='../uploadfiles/site_<?=$sitethemefolder;?>/<?=findsettingvalue('invLogo_filenm'); ?>' align="absmiddle"  style="vertical-align:middle; max-width:100%;"><? } ?>
</div>
</div>
<?php /*?><div class="form-group">
             <div class="widhtsetr"><label>Upload Your Email Logo</label>
              <input type="file" name="emaillogo" class="form-control" size=20 style="vertical-align:middle">
			  </div>
               <div class="widhtsetr control-label_25"> 
 <label>&nbsp;</label>
			 
			  <? if (findsettingvalue('emailLogo_filenm') != "") { ?> <img src='../uploadfiles/site_<?=$sitethemefolder;?>/<?=findsettingvalue('emailLogo_filenm') ?>' align="absmiddle"  style="vertical-align:middle; max-width:100%;"><? } ?>
</div>
</div><?php */?>
<div class="form-group">
             <div class="widhtsetr"><label>Logo Link</label>
<input type="text" name="txt_logo_link_nm" class="form-control" value="<?= $logo_link_nm ?>" size="35" style="vertical-align:middle">
</div>
 <div class="widhtsetr control-label_25"> 
 <label>Slogan</label> 
<input type="text" name="txt_logo_slogan" class="form-control" value="<?= $txt_logo_slogan ?>" size="65" style="vertical-align:middle">
</div>
</div>



<div class="form-group common_button">
<input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
</div>

</form>
</div>
<?
$welcome_text = "";
$design_code = "";
$banner = "";
$side_display = "";
$welcome_text = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=114 AND fldnm='welcome_txt'");
$design_code = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=116 AND fldnm='sp_offer_design_code'");
$banner = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=115 AND fldnm='sp_offer_banner'");
$side_display = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=117 AND fldnm='side_display'");
$favicon = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=125 AND fldnm='favicon'");
$trust = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=171 AND fldnm='security_trust'");

?>
<div id="tab2" class="tabContent" style="display:noneshowTab">
<form name="frmdocument" method="post" action="settingtwo_submit.php" enctype="multipart/form-data" class="form-horizontal">

<div class="form-group">
 <div class="widhtsetr">
<label>Special Offer Banner</label>
<input type="file" name="special_banner" class="form-control" size="35" >
</div>
<div class="widhtsetr control-label_25"> 
 <label>&nbsp;</label>
<? 
	if($banner!=""){		
?>
	<img src="../uploadfiles/site_<?=$sitethemefolder ?>/<?=$banner?>">
	<a href="website_action.php?b=115">Delete</a>
<? } ?>
</div>
</div>


<div class="form-group">
 <div class="widhtsetr">
<label>Side Displays (Registration Page)</label>
<input type="file" name="side_display" class="form-control" size="35">
</div>
<div class="widhtsetr control-label_25"> 
 <label>&nbsp;</label>
<? 
	if($side_display!="") {
?>
	<img src="../uploadfiles/site_<?=$sitethemefolder ?>/<?=$side_display?>">
	<a href="website_action.php?b=117">Delete</a>
<? } ?>
</div>
</div>
<div class="form-group">
 <div class="widhtsetr">
<label>Favicon</label>
<input type="file" name="favicon" size="35" class="form-control">
</div>
<div class="widhtsetr control-label_25"> 
 <label>&nbsp;</label>
<? 
	if($favicon!="") {
?>
	<img src="../uploadfiles/site_<?=$sitethemefolder ?>/<?=$favicon?>">
	<a href="website_action.php?b=125">Delete</a>
<? } ?>
</div>
</div>

<div class="form-group">
 <div class="widhtsetr">
<label>Trust Steal</label>
<input type="file" name="trust" size="35" class="form-control">
</div>
<div class="widhtsetr control-label_25"> 
 <label>&nbsp;</label>
<? 
	if($trust!="") {
?>
	<img src="../uploadfiles/site_<?=$sitethemefolder ?>/<?=$trust?>">
	<a href="website_action.php?b=125">Delete</a>
<? } ?>
</div>
</div>

<div class="form-group">
 <div class="widhtsetr">
<label>Upload Bottom Image (Credit card support)</label>
	<input type="file" name="bottom_uploadimage" class="form-control" size=20 style="vertical-align:middle">
    </div>
     <div class="widhtsetr control-label_25"> 
 <label>&nbsp;</label> 
    
		<? if(findsettingvalue('bottom_card_image')!=''){ ?><img src="../uploadfiles/site_<?=$sitethemefolder;?>/<?=findsettingvalue('bottom_card_image')?>"><? } ?>
</div>
</div>

<div class="form-group common_button">
<input name="Submit" type="submit" class="btn" title="Submit" value="Submit" alt="Submit"> 
</div>

</form></div>

<? } ?>
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $websettingmaster_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>

<script>
      
	 
      function showTab( tab ){
		 
		  if(tab=='tab1')
		  { 
				$("#tab2_id").removeClass('active');	 
				$("#tab1_id").addClass('active');	 
				$("#tab2").hide();
				$("#tab1").show();
		  }
		  else if(tab=='tab2')
		  {
				$("#tab1_id").removeClass('active');	 
				$("#tab2_id").addClass('active');	 
				$("#tab1").hide();
				$("#tab2").show();
		  }
	  }
</script>

</body>
</html>
<? } else {
	header("location:dashboard.php?msg=no");
	exit;
} ?>