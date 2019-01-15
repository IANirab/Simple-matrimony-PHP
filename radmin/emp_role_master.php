<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$action = 0;
$name = "";	
$UserName ="";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$web_setting_wss_7 = web_setting_wss_7();
	$web_setting_wss_8 = web_setting_wss_8();
	
} else {	
	$web_setting_wss_7 = "N";
	$web_setting_wss_8 = "N";	
}
if($web_setting_wss_7 == 'Y' || $web_setting_wss_7 == 'N') {
//$id = $rs['id'];
//$role_id=$rs['role_id'];
		$db_1="";
		$db_2="";
		$db_3="";
		$db_4="";
		$db_5="";
		$db_6="";
		$db_7="";
		$um_1="";
		$um_2="";
		$um_3="";
		$um_4="";
		$um_5="";
		$um_6="";
		$um_7="";
		$um_8="";
		$um_9="";
		$umu_1="";
		$umu_2="";
		$umu_3="";
		$umu_4="";
		$umu_5="";
		$umu_6="";
		$umu_7="";
		$umu_8="";
		$ume_1="";
		$ume_2="";
		$ume_3="";
		$ume_4="";
		$ume_5="";
		$ume_6="";
		$ume_7="";
		$ume_8="";
		$ump_1="";
		$ump_2="";
		$ump_3="";
		$ump_4="";
		$ump_5="";
		$ump_6="";
		$ump_7="";
		$ump_8="";
		$umo_1="";
		$umo_2="";
		$umo_3="";
		$umo_4="";
		$umo_5="";
		$umo_6="";
		$umo_7="";
		$umo_8="";
		$umof_1="";
		$umof_2="";
		$umof_3="";
		$umof_4="";
		$am_1="";
		$am_2="";
		$qm_1="";
		$qm_2="";
		$qm_3="";
		$qm_4="";
		$cm_1="";
		$cm_2="";
		$cm_3="";
		$cm_4="";
		$em_1="";
		$em_2="";
		$em_3="";
		$em_4="";
		$lc_1="";
		$lc_2="";
		$lc_3="";
		$lc_4="";
		$dm_1="";
		$dm_2="";
		$dm_3="";
		$dmd_1="";
		$dmd_2="";
		$dmd_3="";
		$ama_1="";
		$ama_2="";
		$ama_3="";
		$ama_4="";
		$tm_1="";
		$tm_2="";
		$tm_3="";
		$tm_4="";
		$ws_1="";
		$ws_2="";
		$ws_3="";
		$ws_4="";
		$pm_1="";
		$pm_2="";
		$pm_3="";
		$pm_4="";
		$pm_5="";
		$im_1="";
		$imu_1="";
		$imu_2="";
		$imu_3="";
		$imu_4="";
		$imc_1="";
		$imc_2="";
		$imc_3="";
		$imc_4="";
		$imc_5="";
		$imc_6="";
		$cmc_1="";
		$cmc_2="";
		$cmc_3="";
		$cmc_4="";
		$bm_1="";
		$bm_2="";
		$bm_3="";
		$bm_4="";
		$bm_5="";
		$bm_6="";
		$hp_1="";
		$hp_2="";
		$hp_3="";
		$hp_4="";
		$imi_1="";
		$imis_1="";
		$imis_2="";
		$imis_3="";
		$imis_4="";
		$imis_5="";
		$ima_1="";
		$ima_2="";
		$imf_1="";
		$imf_2="";
		$ime_1="";
		$ime_2="";
		$ims_1="";
		$ims_2="";
		$imb_1="";
		$imb_2="";
		$emm_1="";
		$emm_2="";
		$emm_3="";
		$emm_4="";
		$be_1="";
		$be_2="";
		$be_3="";
		$be_4="";
		$be_5="";
		$bi_1="";
		$bi_2="";
		$bi_3="";
		$bi_4="";
		$bi_5="";
		$wss_1="";
		$wss_2="";
		$wss_3="";
		$wss_4="";
		$wss_5="";
		$wss_6="";
		$wss_7="";
		$wss_8="";
		$wss_9="";
		$wss_10="";
		$wss_11="";
		$currentstatus="";
		$create_ip="";
		$create_by="";
		$create_date="";
		$modify_ip="";
		$modify_by="";
		$modify_date="";
		$role_title = "";
		$crm_lead_mgr="";
		$crm_lead_mas="";
        $crm_toppackages="";
		$crm_toprevenues="";
		$crm_topcampaign="";
		$crm_topcampaignsales="";
		$crm_topemployee="";
		$crm_goalreport="";
		$crm_leadreport="";
		$crm_goal_mgr="";
		$crm_goal_mas="";
		$crm_status_mgr="";
		$crm_status_mas="";
		$crm_cat_mgr="";
		$crm_cat_mas="";
		$crm_type_mgr="";
		$crm_type_mas="";
		$crm_prty_mgr="";
		$crm_prty_mas="";
		$crm_cammed_mgr="";
		$crm_cammed_mas="";
		$crm_email_mgr="";
		$crm_email_mas="";
		$crm_to_re="";
		$crm_todo_re="";
		$crm_mgr_das="";
		$crm_topcam_count="";
		$crm_report="";
		$crm_leadreportsearch="";
		$crm_websitesettings="";
		$crm_changepassword="";
		$log_re1="";
		$log_mgr1="";
		$crm_cpgn_mgr="";
		$crm_cpgn_mas="";
		$crm_cont_mgr="";
		$crm_cont_mas="";
		$crm_salesmanager="";
		$mydesk_access = "";


$filename ="emp_role_insert";

if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
{
	$action = $_GET["b"];	
	$result = getdata("select * from tbl_employee_role_setting where role_id=".$action);
	while ($rs = mysqli_fetch_array($result))
	{
		$id = $rs['id'];
		$role_id=$rs['role_id'];
		$db_1=$rs['db_1'];
		$db_2=$rs['db_2'];
		$db_3=$rs['db_3'];
		$db_4=$rs['db_4'];
		$db_5=$rs['db_5'];
		$db_5=$rs['db_6'];
		$db_5=$rs['db_7'];
		 $um_1=$rs['um_1']; 
		$um_2=$rs['um_2'];
		$um_3=$rs['um_3'];
		$um_4=$rs['um_4'];
		$um_5=$rs['um_5'];
		$um_6=$rs['um_6'];
		$um_7=$rs['um_7'];
		$um_8=$rs['um_8'];
		$um_9=$rs['um_9'];
		$umu_1=$rs['umu_1'];
		$umu_2=$rs['umu_2'];
		$umu_3=$rs['umu_3'];
		$umu_4=$rs['umu_4'];
		$umu_5=$rs['umu_5'];
		$umu_6=$rs['umu_6'];
		$umu_7=$rs['umu_7'];
		$umu_8=$rs['umu_8'];
		$ume_1=$rs['ume_1'];
		$ume_2=$rs['ume_2'];
		$ume_3=$rs['ume_3'];
		$ume_4=$rs['ume_4'];
		$ume_5=$rs['ume_5'];
		$ume_6=$rs['ume_6'];
		$ume_7=$rs['ume_7'];
		$ume_8=$rs['ume_8'];
		$ump_1=$rs['ump_1'];
		$ump_2=$rs['ump_2'];
		$ump_3=$rs['ump_3'];
		$ump_4=$rs['ump_4'];
		$ump_5=$rs['ump_5'];
		$ump_6=$rs['ump_6'];
		$ump_7=$rs['ump_7'];
		$ump_8=$rs['ump_8'];
		$umo_1=$rs['umo_1'];
		$umo_2=$rs['umo_2'];
		$umo_3=$rs['umo_3'];
		$umo_4=$rs['umo_4'];
		$umo_5=$rs['umo_5'];
		$umo_6=$rs['umo_6'];
		$umo_7=$rs['umo_7'];
		$umo_8=$rs['umo_8'];
		$umof_1=$rs['umof_1'];
		$umof_2=$rs['umof_2'];
		$umof_3=$rs['umof_3'];
		$umof_4=$rs['umof_4'];
		$am_1=$rs['am_1'];
		$am_2=$rs['am_2'];
		$qm_1=$rs['qm_1'];
		$qm_2=$rs['qm_2'];
		$qm_3=$rs['qm_3'];
		$qm_4=$rs['qm_4'];
		$cm_1=$rs['cm_1'];
		$cm_2=$rs['cm_2'];
		$cm_3=$rs['cm_3'];
		$cm_4=$rs['cm_4'];
		$em_1=$rs['em_1'];
		$em_2=$rs['em_2'];
		$em_3=$rs['em_3'];
		$em_4=$rs['em_4'];
		$lc_1=$rs['lc_1'];
		$lc_2=$rs['lc_2'];
		$lc_3=$rs['lc_3'];
		$lc_4=$rs['lc_4'];
		$dm_1=$rs['dm_1'];
		$dm_2=$rs['dm_2'];
		$dm_3=$rs['dm_3'];
		$dmd_1=$rs['dmd_1'];
		$dmd_2=$rs['dmd_2'];
		$dmd_3=$rs['dmd_3'];
		$ama_1=$rs['ama_1'];
		$ama_2=$rs['ama_2'];
		$ama_3=$rs['ama_3'];
		$ama_4=$rs['ama_4'];
		$tm_1=$rs['tm_1'];
		$tm_2=$rs['tm_2'];
		$tm_3=$rs['tm_3'];
		$tm_4=$rs['tm_4'];
		$ws_1=$rs['ws_1'];
		$ws_2=$rs['ws_2'];
		$ws_3=$rs['ws_3'];
		$ws_4=$rs['ws_4'];
		$pm_1=$rs['pm_1'];
		$pm_2=$rs['pm_2'];
		$pm_3=$rs['pm_3'];
		$pm_4=$rs['pm_4'];
		$pm_5=$rs['pm_5'];
		$im_1=$rs['im_1'];
		$imu_1=$rs['imu_1'];
		$imu_2=$rs['imu_2'];
		$imu_3=$rs['imu_3'];
		$imu_4=$rs['imu_4'];
		$imc_1=$rs['imc_1'];
		$imc_2=$rs['imc_2'];
		$imc_3=$rs['imc_3'];
		$imc_4=$rs['imc_4'];
		$imc_5=$rs['imc_5'];
		$imc_6=$rs['imc_6'];
		$cmc_1=$rs['cmc_1'];
		$cmc_2=$rs['cmc_2'];
		$cmc_3=$rs['cmc_3'];
		$cmc_4=$rs['cmc_4'];
		$bm_1=$rs['bm_1'];
		$bm_2=$rs['bm_2'];
		$bm_3=$rs['bm_3'];
		$bm_4=$rs['bm_4'];
		$bm_5=$rs['bm_5'];
		$bm_6=$rs['bm_6'];
		$hp_1=$rs['hp_1'];
		$hp_2=$rs['hp_2'];
		$hp_3=$rs['hp_3'];
		$hp_4=$rs['hp_4'];
		$imi_1=$rs['imi_1'];
		$imis_1=$rs['imis_1'];
		$imis_2=$rs['imis_2'];
		$imis_3=$rs['imis_3'];
		$imis_4=$rs['imis_4'];
		$imis_5=$rs['imis_5'];
		$ima_1=$rs['ima_1'];
		$ima_2=$rs['ima_2'];
		$imf_1=$rs['imf_1'];
		$imf_2=$rs['imf_2'];
		$ime_1=$rs['ime_1'];
		$ime_2=$rs['ime_2'];
		$ims_1=$rs['ims_1'];
		$ims_2=$rs['ims_2'];
		$imb_1=$rs['imb_1'];
		$imb_2=$rs['imb_2'];
		$emm_1=$rs['emm_1'];
		$emm_2=$rs['emm_2'];
		$emm_3=$rs['emm_3'];
		$emm_4=$rs['emm_4'];
		$be_1=$rs['be_1'];
		$be_2=$rs['be_2'];
		$be_3=$rs['be_3'];
		$be_4=$rs['be_4'];
		$be_5=$rs['be_5'];
		$bi_1=$rs['bi_1'];
		$bi_2=$rs['bi_2'];
		$bi_3=$rs['bi_3'];
		$bi_4=$rs['bi_4'];
		$bi_5=$rs['bi_5'];
		$wss_1=$rs['wss_1'];
		$wss_2=$rs['wss_2'];
		$wss_3=$rs['wss_3'];
		$wss_4=$rs['wss_4'];
		$wss_5=$rs['wss_5'];
		$wss_6=$rs['wss_6'];
		$wss_7=$rs['wss_7'];
		$wss_8=$rs['wss_8'];
		$wss_9=$rs['wss_9'];
		$wss_10=$rs['wss_10'];
		$wss_11=$rs['wss_11'];
		$currentstatus=$rs['currentstatus'];
		$create_ip=$rs['create_ip'];
		$create_by=$rs['create_by'];
		$create_date=$rs['create_date'];
		$modify_ip=$rs['modify_ip'];
		$modify_by=$rs['modify_by'];
		$modify_date=$rs['modify_date'];
		$crm_cpgn_mgr=$rs['crm_cpgn_mgr'];
		$crm_cpgn_mas=$rs['crm_cpgn_mas'];
		$crm_cont_mgr=$rs['crm_cont_mgr'];
		$crm_cont_mas=$rs['crm_cont_mas'];
		$crm_salesmanager=$rs['crm_salesmanager'];
		$crm_lead_mgr=$rs['crm_lead_mgr'];
		$crm_lead_mas=$rs['crm_lead_mas'];
		$crm_toppackages=$rs['crm_toppackages'];
		$crm_toprevenues=$rs['crm_toprevenues'];
		$crm_topcampaign=$rs['crm_topcampaign'];
		$crm_topcampaignsales=$rs['crm_topcampaignsales'];
		$crm_topemployee=$rs['crm_topemployee'];
		$crm_goalreport=$rs['crm_goalreport'];
		$crm_leadreport=$rs['crm_leadreport'];
		$crm_goal_mgr=$rs['crm_goal_mgr'];
		$crm_goal_mas=$rs['crm_goal_mas'];
		$crm_status_mgr=$rs['crm_status_mgr'];
		$crm_status_mas=$rs['crm_status_mas'];
		$crm_cat_mgr=$rs['crm_cat_mgr'];
		$crm_cat_mas=$rs['crm_cat_mas'];
		$crm_type_mgr=$rs['crm_type_mgr'];
		$crm_type_mas=$rs['crm_type_mas'];
		$crm_prty_mgr=$rs['crm_prty_mgr'];
		$crm_prty_mas=$rs['crm_prty_mas'];
		$crm_cammed_mgr=$rs['crm_cammed_mgr'];
		$crm_cammed_mas=$rs['crm_cammed_mas'];
		$crm_email_mgr=$rs['crm_email_mgr'];
		$crm_email_mas=$rs['crm_email_mas'];
		$crm_to_re=$rs['crm_to_re'];
		$crm_todo_re=$rs['crm_todo_re'];
		$crm_mgr_das=$rs['crm_mgr_das'];
		$crm_topcam_count=$rs['crm_topcam_count'];
		$crm_report=$rs['crm_report'];
		$crm_leadreportsearch=$rs['crm_leadreportsearch'];
		$crm_websitesettings=$rs['crm_websitesettings'];
		$crm_changepassword=$rs['crm_changepassword'];
		$log_re1=$rs['log_re'];
	    $log_mgr1=$rs['log_mgr']; 
		$mydesk_access = $rs['mydesk_access'];

		$role_title = getonefielddata("SELECT title from tbl_employee_role_master WHERE id=".$role_id);
	}
	freeingresult($result);
}

/*$res = getdata("SHOW fields from tbl_employee_role_setting");
while($rs = mysqli_fetch_array($res)){
	echo $rs['Field'].",";
}
echo mysqli_num_rows($res);
exit;*/
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
			<h1 class="pagetitle">Employee Role Master</h1>
			<!-- ********* TITLE END HERE *********-->
				<div id="pagecontent" class="common-form commonrole">
<!-- ********* CONTENT START HERE *********-->
<?= checkerroradmin()?>
<? if($web_setting_wss_8 == 'Y' || $web_setting_wss_8 == 'N') { ?>
<form name=frmdocument method=post action ="<?=$filename ?>.php?b=<?= $action ?>"  ENCTYPE="multipart/form-data" class="form-horizontal">
      
	  <div class="form-group">
             <label><b>Dashboard</b></label>
             <checkbox>	
			 <input type="hidden" name="b" value="<?=$_REQUEST['b']?>" />
			 <? if($db_1=='Y') { $cdb_1 = 'checked="checked"'; } else { $cdb_1= "";} ?>
			 <i> <input <?= admininputclass ?> type="checkbox" name="db_1" value="Y" <?=$cdb_1?> /><strong>Enable Billing Stats</strong></i>
			  <? if($db_2=='Y') { $cdb_2 = 'checked="checked"'; } else { $cdb_2= "";} ?>
			  <i> <input <?= admininputclass ?> type="checkbox" name="db_2" value="Y" <?=$cdb_2?> /><strong>Enable Download CSV</strong></i>
			  <? if($db_3=='Y') { $cdb_3 = 'checked="checked"'; } else { $cdb_3= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="db_3" value="Y" <?=$cdb_3?> /><strong>Enable Delete Data</strong></i>
			  <? if($db_4=='Y') { $cdb_4 = 'checked="checked"'; } else { $cdb_4= "";} ?>
			  <i> <input <?= admininputclass ?> type="checkbox" name="db_4" value="Y" <?=$cdb_4?> /><strong>Enable Search User</strong></i>
			  <? if($db_5=='Y') { $cdb_5 = 'checked="checked"'; } else { $cdb_5= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="db_5" value="Y" <?=$cdb_5?> /><strong>Enable Search Invoice</strong></i>
              <? if($db_6=='Y') { $cdb_6 = 'checked="checked"'; } else { $cdb_6= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="db_6" value="Y" <?=$cdb_6?> /><strong>Enable Check Daily</strong></i>
              <? if($db_7=='Y') { $cdb_7 = 'checked="checked"'; } else { $cdb_7= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="db_7" value="Y" <?=$cdb_7?> /><strong>Enable Check Weekly</strong></i>	
         </checkbox>
         </div>
		   <div class="form-group">
             <label><b>User Management</b></label>
            
			  <b>User Manager</b>
			  
			   <checkbox>	
			   <? if($um_1=='Y') { $cum_1 = 'checked="checked"'; } else { $cum_1= "";} ?>			  
			  <i><input <?= admininputclass ?> type="checkbox" name="um_1" value="Y" <?=$cum_1 ?> />
              <strong>Enable Display Email ID</strong></i>
			  <? if($um_2=='Y') { $cum_2 = 'checked="checked"'; } else { $cum_2= "";} ?>
			 <i> <input <?= admininputclass ?> type="checkbox" name="um_2" value="Y" <?=$cum_2 ?> /><strong>Enable Display Phone No. &amp; Mobile No.
             </strong></i>
			  <? if($um_3=='Y') { $cum_3 = 'checked="checked"'; } else { $cum_3= "";} ?>
			  <i><input <?= admininputclass ?> type="checkbox" name="um_3" value="Y" <?=$cum_3 ?> /><strong>Enable Display Password</strong></i>
			  <? if($um_4=='Y') { $cum_4 = 'checked="checked"'; } else { $cum_4= "";} ?>
			  <i><input <?= admininputclass ?> type="checkbox" name="um_4" value="Y" <?=$cum_4 ?> /><strong>Enable Edit Details</strong></i>
			  <? if($um_5=='Y') { $cum_5 = 'checked="checked"'; } else { $cum_5= "";} ?>
			  <i><input <?= admininputclass ?> type="checkbox" name="um_5" value="Y" <?=$cum_5 ?> /><strong>Enable Edit Profile</strong></i>
			  <? if($um_6=='Y') { $cum_6 = 'checked="checked"'; } else { $cum_6= "";} ?>
			  <i><input <?= admininputclass ?> type="checkbox" name="um_6" value="Y" <?=$cum_6 ?> /><strong>Enable Delete Profile</strong></i>
			 <? if($um_7=='Y') { $cum_7 = 'checked="checked"'; } else { $cum_7= "";} ?>
			 <i> <input <?= admininputclass ?> type="checkbox" name="um_7" value="Y" <?=$cum_7 ?> /><strong>Enable Change Status</strong></i>
			  
			  <? if($um_8=='Y') { $cum_8 = 'checked="checked"'; } else { $cum_8= "";} ?>
			  <i><input <?= admininputclass ?> type="checkbox" name="um_8" value="Y" <?=$cum_8 ?> /><strong>Enable User Offline</strong></i>
              <? if($um_9=='Y') { $cum_9 = 'checked="checked"'; } else { $cum_9= "";} ?>
			  <i><input <?= admininputclass ?> type="checkbox" name="um_9" value="Y" <?=$cum_9 ?> /><strong>User Management</strong>	</i>
			  <?php /*?><strong>Unapproved User Manager</strong><br>
			  <? if($umu_1=='Y') { $cumu_1 = 'checked="checked"'; } else { $cumu_1= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="umu_1" value="Y" <?=$cumu_1?> />&nbsp;&nbsp;Enable Unapproved User Manager
			  <? if($umu_2=='Y') { $cumu_2 = 'checked="checked"'; } else { $cumu_2= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="umu_2" value="Y" <?=$cumu_2?> />&nbsp;&nbsp;Enable Display Email ID<br>
			  <? if($umu_3=='Y') { $cumu_3 = 'checked="checked"'; } else { $cumu_3= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="umu_3" value="Y" <?=$cumu_3?> />&nbsp;&nbsp;Enable Display Password
			  <? if($umu_4=='Y') { $cumu_4 = 'checked="checked"'; } else { $cumu_4= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="umu_4" value="Y" <?=$cumu_4?> />&nbsp;&nbsp;Enable Edit Details<br>
			  <? if($umu_5=='Y') { $cumu_5 = 'checked="checked"'; } else { $cumu_5= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="umu_5" value="Y" <?=$cumu_5?> />&nbsp;&nbsp;Enable Edit Profile
			  <? if($umu_6=='Y') { $cumu_6 = 'checked="checked"'; } else { $cumu_6= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="umu_6" value="Y" <?=$cumu_6?> />&nbsp;&nbsp;Enable Delete Profile<br>
			  <? if($umu_7=='Y') { $cumu_7 = 'checked="checked"'; } else { $cumu_7= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="umu_7" value="Y" <?=$cumu_7?> />&nbsp;&nbsp;Enable Change Status
			  <? if($umu_8=='Y') { $cumu_8 = 'checked="checked"'; } else { $cumu_8= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="umu_8" value="Y" <?=$cumu_8?> />&nbsp;&nbsp;Enable User Offline<br><br>
			  
			  <strong>Expired User Manager</strong><br>
			  <? if($ume_1=='Y') { $cume_1 = 'checked="checked"'; } else { $cume_1= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ume_1" value="Y" <?=$cume_1?> />&nbsp;&nbsp;Enable Expired User Manager
			  <? if($ume_2=='Y') { $cume_2 = 'checked="checked"'; } else { $cume_2= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ume_2" value="Y" <?=$cume_2?> />&nbsp;&nbsp;Enable Display Email ID<br>
			  <? if($ume_3=='Y') { $cume_3 = 'checked="checked"'; } else { $cume_3= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ume_3" value="Y" <?=$cume_3?> />&nbsp;&nbsp;Enable Display Password
			  <? if($ume_4=='Y') { $cume_4 = 'checked="checked"'; } else { $cume_4= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ume_4" value="Y" <?=$cume_4?> />&nbsp;&nbsp;Enable Edit Details<br>
			  <? if($ume_5=='Y') { $cume_5 = 'checked="checked"'; } else { $cume_5= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ume_5" value="Y" <?=$cume_5?> />&nbsp;&nbsp;Enable Edit Profile
			  <? if($ume_6=='Y') { $cume_6 = 'checked="checked"'; } else { $cume_6= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ume_6" value="Y" <?=$cume_6?> />&nbsp;&nbsp;Enable Delete Profile<br>
			  <? if($ume_7=='Y') { $cume_7 = 'checked="checked"'; } else { $cume_7= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ume_7" value="Y" <?=$cume_7?> />&nbsp;&nbsp;Enable Change Status
			  <? if($ume_8=='Y') { $cume_8 = 'checked="checked"'; } else { $cume_8= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ume_8" value="Y" <?=$cume_8?> />&nbsp;&nbsp;Enable User Offline<br><br>
			  
			  <strong>Paid User Manager</strong><br>
			  <? if($ump_1=='Y') { $cump_1 = 'checked="checked"'; } else { $cump_1= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ump_1" value="Y" <?=$cump_1?> />&nbsp;&nbsp;Enable Paid User Manager
			  <? if($ump_2=='Y') { $cump_2 = 'checked="checked"'; } else { $cump_2= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ump_2" value="Y" <?=$cump_2?> />&nbsp;&nbsp;Enable Display Email ID<br>
			  <? if($ump_3=='Y') { $cump_3 = 'checked="checked"'; } else { $cump_3= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ump_3" value="Y" <?=$cump_3?> />&nbsp;&nbsp;Enable Display Password
			  <? if($ump_4=='Y') { $cump_4 = 'checked="checked"'; } else { $cump_4= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ump_4" value="Y" <?=$cump_4?> />&nbsp;&nbsp;Enable Edit Details<br>
			  <? if($ump_5=='Y') { $cump_5 = 'checked="checked"'; } else { $cump_5= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ump_5" value="Y" <?=$cump_5?> />&nbsp;&nbsp;Enable Edit Profile
			  <? if($ump_6=='Y') { $cump_6 = 'checked="checked"'; } else { $cump_6= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ump_6" value="Y" <?=$cump_6?> />&nbsp;&nbsp;Enable Delete Profile<br>
			  <? if($ump_7=='Y') { $cump_7 = 'checked="checked"'; } else { $cump_7= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ump_7" value="Y" <?=$cump_7?> />&nbsp;&nbsp;Enable Change Status
			  <? if($ump_8=='Y') { $cump_8 = 'checked="checked"'; } else { $cump_8= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ump_8" value="Y" <?=$cump_8?> />&nbsp;&nbsp;Enable User Offline<br><br>
			  <strong>Offline User Manager</strong><br>
			  <? if($umo_1=='Y') { $cumo_1 = 'checked="checked"'; } else { $cumo_1= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="umo_1" value="Y" <?=$cumo_1?> />&nbsp;&nbsp;Enable Offline User Manager
			  <? if($umo_2=='Y') { $cumo_2 = 'checked="checked"'; } else { $cumo_2= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="umo_2" value="Y" <?=$cumo_2?> />&nbsp;&nbsp;Enable Display Email ID<br>
			  <? if($umo_3=='Y') { $cumo_3 = 'checked="checked"'; } else { $cumo_3= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="umo_3" value="Y" <?=$cumo_3?> />&nbsp;&nbsp;Enable Display Password
			  <? if($umo_4=='Y') { $cumo_4 = 'checked="checked"'; } else { $cumo_4= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="umo_4" value="Y" <?=$cumo_4?> />&nbsp;&nbsp;Enable Edit Details<br>
			  <? if($umo_5=='Y') { $cumo_5 = 'checked="checked"'; } else { $cumo_5= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="umo_5" value="Y" <?=$cumo_5?> />&nbsp;&nbsp;Enable Edit Profile
			  <? if($umo_6=='Y') { $cumo_6 = 'checked="checked"'; } else { $cumo_6= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="umo_6" value="Y" <?=$cumo_6?> />&nbsp;&nbsp;Enable Delete Profile<br>
			  <? if($umo_7=='Y') { $cumo_7 = 'checked="checked"'; } else { $cumo_7= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="umo_7" value="Y" <?=$cumo_7?> />&nbsp;&nbsp;Enable Change Status
			  <? if($umo_8=='Y') { $cumo_8 = 'checked="checked"'; } else { $cumo_8= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="umo_8" value="Y" <?=$cumo_8?> />&nbsp;&nbsp;Enable User Offline<br><br><?php */?>
			  
			  <strong>Other Functionality in User Manager</strong><br>
			  <? if($umof_1=='Y') { $cumof_1 = 'checked="checked"'; } else { $cumof_1= "";} ?>
			  <i><input <?= admininputclass ?> type="checkbox" name="umof_1" value="Y" <?=$cumof_1?> />Enable Configure Home Page Profile</i>
			  <? if($umof_2=='Y') { $cumof_2 = 'checked="checked"'; } else { $cumof_2= "";} ?>
			  <i><input <?= admininputclass ?> type="checkbox" name="umof_2" value="Y" <?=$cumof_2?> />Enable Configure Profile of the Week</i>
			  <? if($umof_3=='Y') { $cumof_3 = 'checked="checked"'; } else { $cumof_3= "";} ?>
			  <i><input <?= admininputclass ?> type="checkbox" name="umof_3" value="Y" <?=$cumof_3?> />Enable Configure Profile of the month</i>
			  <? if($umof_4=='Y') { $cumof_4 = 'checked="checked"'; } else { $cumof_4= "";} ?>
			 <i> <input <?= admininputclass ?> type="checkbox" name="umof_4" value="Y" <?=$cumof_4?> />Enable Bulk Upload Profile </i>       
         
         </checkbox>
         
          </div>
		   <div class="form-group">
             <label>Audit Messages</label>
             <checkbox>
				<? if($am_1=='Y') { $cam_1 = 'checked="checked"'; } else { $cam_1= "";} ?>			  
			  <i> <input <?= admininputclass ?> type="checkbox" name="am_1" value="Y" <?=$cam_1?> /><strong>Enable Audit Messages</strong></i>
			  <? if($am_2=='Y') { $cam_2 = 'checked="checked"'; } else { $cam_2= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="am_2" value="Y" <?=$cam_2?> /><strong>Enable Delete Audit Messages</strong> </i> 
             </checkbox>
             </div>
		  <div class="form-group">
             <label><b>Question Management</b></label>
			  <checkbox>
              <? if($qm_1=='Y') { $cqm_1 = 'checked="checked"'; } else { $cqm_1= "";} ?>		  
			   <i><input <?= admininputclass ?> type="checkbox" name="qm_1" value="Y" <?=$cqm_1?> /><strong>Enable Question Management</strong></i>
			  <? if($qm_2=='Y') { $cqm_2 = 'checked="checked"'; } else { $cqm_2= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="qm_2" value="Y" <?=$cqm_2?> /><strong>Enable Add / Modify Question</strong></i>
			  <?php /*?><? if($qm_3=='Y') { $cqm_3 = 'checked="checked"'; } else { $cqm_3= "";} ?>
			<input <?= admininputclass ?> type="checkbox" name="qm_3" value="Y" <?=$cqm_3?> />&nbsp;&nbsp;Enable Modify Question <?php */?>
			  <? if($qm_4=='Y') { $cqm_4 = 'checked="checked"'; } else { $cqm_4= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="qm_4" value="Y" <?=$cqm_4?> /><strong>Enable Delete Question</strong></i>
              </checkbox>
             </div>
		  
		 <div class="form-group">
             <label><b>Cast Management</b></label>
			 <checkbox>
			<? if($cm_1=='Y') { $ccm_1 = 'checked="checked"'; } else { $ccm_1= "";} ?>
			 <i><input <?= admininputclass ?> type="checkbox" name="cm_1" value="Y" <?=$ccm_1?> /><strong>Enable Cast Management</strong></i>
			  <? if($cm_2=='Y') { $ccm_2 = 'checked="checked"'; } else { $ccm_2= "";} ?>
			 <i> <input <?= admininputclass ?> type="checkbox" name="cm_2" value="Y" <?=$ccm_2?> /><strong>Enable Add / Modify Cast</strong></i>
			  <?php /*?><? if($cm_3=='Y') { $ccm_3 = 'checked="checked"'; } else { $ccm_3= "";} ?>
			 <input <?= admininputclass ?> type="checkbox" name="cm_3" value="Y" <?=$ccm_3?> />&nbsp;&nbsp;Enable Modify Cast<?php */?>
			  <? if($cm_4=='Y') { $ccm_4 = 'checked="checked"'; } else { $ccm_4= "";} ?>
			  <i><input <?= admininputclass ?> type="checkbox" name="cm_4" value="Y" <?=$ccm_4?> /><strong>Enable Delete Cast</strong></i>
              </checkbox>
             </div>
		  <div class="form-group">
             <label><b>Event Management</b></label>
              <checkbox>
			  <i> <? if($em_1=='Y') { $cem_1 = 'checked="checked"'; } else { $cem_1= "";} ?>			  
			  <input <?= admininputclass ?> type="checkbox" name="em_1" value="Y" <?=$cem_1?> /><strong>Enable Event Management</strong></i>
			  <? if($em_2=='Y') { $cem_2 = 'checked="checked"'; } else { $cem_2= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="em_2" value="Y" <?=$cem_2?> /><strong>Enable Add/Modify Event</strong></i>
			  <?php /*?><? if($em_3=='Y') { $cem_3 = 'checked="checked"'; } else { $cem_3= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="em_3" value="Y" <?=$cem_3?> />&nbsp;&nbsp;Enable Modify Event<?php */?>
			  <? if($em_4=='Y') { $cem_4 = 'checked="checked"'; } else { $cem_4= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="em_4" value="Y" <?=$cem_4?> /><strong>Enable Delete Event</strong></i>
              </checkbox>
             </div>
		 <div class="form-group">
             <label><b>Location</b> </label>
			  <checkbox>
              <? if($lc_1=='Y') { $clc_1 = 'checked="checked"'; } else { $clc_1= "";} ?>			  
			 <i> <input <?= admininputclass ?> type="checkbox" name="lc_1" value="Y" <?=$clc_1?> /><strong>Enable Location Management</strong></i>
			  <? if($lc_2=='Y') { $clc_2 = 'checked="checked"'; } else { $clc_2= "";} ?>
			  <i><input <?= admininputclass ?> type="checkbox" name="lc_2" value="Y" <?=$clc_2?> /><strong>Enable Add / Modify Country</strong></i>
			  <?php /*?><? if($lc_3=='Y') { $clc_3 = 'checked="checked"'; } else { $clc_3= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="lc_3" value="Y" <?=$clc_3?> />&nbsp;&nbsp;Enable Modify Country<?php */?>
			  <? if($lc_4=='Y') { $clc_4 = 'checked="checked"'; } else { $clc_4= "";} ?>
			 <i> <input <?= admininputclass ?> type="checkbox" name="lc_4" value="Y" <?=$clc_4?>/><strong>Enable Delete Country</strong></i>
             </checkbox>
             </div>
		   <div class="form-group">
             <label><b>Directory Management</b></label>
			  <checkbox>
              <? if($dm_1=='Y') { $cdm_1 = 'checked="checked"'; } else { $cdm_1= "";} ?>			  
			   <i><input <?= admininputclass ?> type="checkbox" name="dm_1" value="Y" <?=$cdm_1?> /><strong>Enable Directory Management</strong></i>
			  <? if($dm_2=='Y') { $cdm_2 = 'checked="checked"'; } else { $cdm_2= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="dm_2" value="Y" <?=$cdm_2?> /><strong>Enable Modify Directory</strong></i>		  
			  <? if($dm_3=='Y') { $cdm_3 = 'checked="checked"'; } else { $cdm_3= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="dm_3" value="Y" <?=$cdm_3?> /><strong>Enable Delete Directory</strong></i>

			   <strong>Directory Category Manager</strong><br>
			   <? if($dmd_1=='Y') { $cdmd_1 = 'checked="checked"'; } else { $cdmd_1= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="dmd_1" value="Y" <?=$cdmd_1?> /><strong>Enable Add / Modify Category</strong></i>
			  <?php /*?><? if($dmd_2=='Y') { $cdmd_2 = 'checked="checked"'; } else { $cdmd_2= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="dmd_2" value="Y" <?=$cdmd_2?> />&nbsp;&nbsp;Enable Modify Category<br><?php */?>
			  <? if($dmd_3=='Y') { $cdmd_3 = 'checked="checked"'; } else { $cdmd_3= "";} ?>
			  <i> <input <?= admininputclass ?> type="checkbox" name="dmd_3" value="Y" <?=$cdmd_3?> /><strong>Enable Delete Category</strong></i>
             </checkbox>
             </div>
		   <div class="form-group">
          
             <label><b>Announce Management</b></label>
			  <checkbox>
              <? if($ama_1=='Y') { $cama_1 = 'checked="checked"'; } else { $cama_1= "";} ?>			  
			  <i><input <?= admininputclass ?> type="checkbox" name="ama_1" value="Y" <?=$cama_1?> /><strong>Enable Announce Management</strong></i>
			  <? if($ama_2=='Y') { $cama_2 = 'checked="checked"'; } else { $cama_2= "";} ?>
			 <i> <input <?= admininputclass ?> type="checkbox" name="ama_2" value="Y" <?=$cama_2?> /><strong>Enable Add / Modify Announce</strong></i>
			  <?php /*?><? if($ama_3=='Y') { $cama_3 = 'checked="checked"'; } else { $cama_3= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ama_3" value="Y" <?=$cama_3?> />&nbsp;&nbsp;Enable Modify Announce<?php */?></i>
			  <? if($ama_4=='Y') { $cama_4 = 'checked="checked"'; } else { $cama_4= "";} ?>
			  <i><input <?= admininputclass ?> type="checkbox" name="ama_4" value="Y" <?=$cama_4?> /><strong>Enable Delete Announce</strong></i>
            </checkbox>
             </div>
		  
		  <div class="form-group">
             <label><b>Testimonial Management</b></label> 
			 <checkbox>
			
			<? if($tm_1=='Y') { $ctm_1 = 'checked="checked"'; } else { $ctm_1= "";} ?>
			 <i> <input <?= admininputclass ?> type="checkbox" name="tm_1" value="Y" <?=$ctm_1?> /><strong>Enable Testimonial Management</strong></i>
			  <? if($tm_2=='Y') { $ctm_2 = 'checked="checked"'; } else { $ctm_2= "";} ?>
			<i> <input <?= admininputclass ?> type="checkbox" name="tm_2" value="Y" <?=$ctm_2?> /><strong>Enable Add / Modify Testimonial</strong></i>
			 <?php /*?> <? if($tm_3=='Y') { $ctm_3 = 'checked="checked"'; } else { $ctm_3= "";} ?>
			 <input <?= admininputclass ?> type="checkbox" name="tm_3" value="Y" <?=$ctm_3?> />&nbsp;&nbsp;Enable Modify Testimonial<?php */?>
			  <? if($tm_4=='Y') { $ctm_4 = 'checked="checked"'; } else { $ctm_4= "";} ?>
			  <i><input <?= admininputclass ?> type="checkbox" name="tm_4" value="Y" <?=$ctm_4?> /><strong>Enable Delete Testimonial</strong></i>
             </checkbox>
             </div>
		  
		   <div class="form-group">
             <label><b>Wink/Show Interest Email Management</b></label>
			
			<checkbox>
			<? if($ws_1=='Y') { $cws_1 = 'checked="checked"'; } else { $cws_1= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="ws_1" value="Y" <?=$cws_1?> /><strong>Enable Wink/Show Interest Email Management
               </strong></i>
			  <? if($ws_2=='Y') { $cws_2 = 'checked="checked"'; } else { $cws_2= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="ws_2" value="Y" <?=$cws_2?> /><strong>Enable Add / Modify Wink/Show Interest Email
               </strong></i>
			 <?php /*?> <? if($ws_3=='Y') { $cws_3 = 'checked="checked"'; } else { $cws_3= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ws_3" value="Y" <?=$cws_3?> />
			  &nbsp;&nbsp;Enable Modify Wink/Show Interest Email<?php */?>
			  <? if($ws_4=='Y') { $cws_4 = 'checked="checked"'; } else { $cws_4= "";} ?>	
			  <i> <input <?= admininputclass ?> type="checkbox" name="ws_4" value="Y" <?=$cws_4?> /><strong>Enable Delete Wink/Show Interest Email
              </strong></i>
             </checkbox>
             </div>
		  
		   <div class="form-group">
             <label><b>Package Management</b></label>
			 <checkbox>
              <? if($pm_1=='Y') { $cpm_1 = 'checked="checked"'; } else { $cpm_1= "";} ?>
			   <i> <input <?= admininputclass ?> type="checkbox" name="pm_1" value="Y" <?=$cpm_1?> /><strong>Enable Package Management</strong></i>
			  <? if($pm_2=='Y') { $cpm_2 = 'checked="checked"'; } else { $cpm_2= "";} ?>
			   <i> <input <?= admininputclass ?> type="checkbox" name="pm_2" value="Y" <?=$cpm_2?> /><strong>Enable Add / Modify Package</strong></i>
			  <?php /*?><? if($pm_3=='Y') { $cpm_3 = 'checked="checked"'; } else { $cpm_3= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="pm_3" value="Y" <?=$cpm_3?> />&nbsp;&nbsp;Enable Modify Package<?php */?>  
			  <? if($pm_4=='Y') { $cpm_4 = 'checked="checked"'; } else { $cpm_4= "";} ?>
			  <i>  <input <?= admininputclass ?> type="checkbox" name="pm_4" value="Y" <?=$cpm_4?> /><strong>Enable Delete Package</strong></i>
			  <? if($pm_5=='Y') { $cpm_5 = 'checked="checked"'; } else { $cpm_5= "";} ?>
			  <i>  <input <?= admininputclass ?> type="checkbox" name="pm_5" value="Y" <?=$cpm_5?> /><strong><strong>Enable Package Sold Report</strong></strong></i>
            </checkbox>
             </div>
             <div class="form-group">
             <label><b>Invoice Management</b></label>
		<checkbox>
        	<? if($im_1=='Y') { $cim_1 = 'checked="checked"'; } else { $cim_1= "";} ?>			  
			   <i><input <?= admininputclass ?> type="checkbox" name="im_1" value="Y" <?=$cim_1?> />Enable Invoice Management</i>
			  <strong> Invoice Manager</strong><br>
			  <? if($imu_1=='Y') { $cimu_1 = 'checked="checked"'; } else { $cimu_1= "";} ?>
			  <i> <input <?= admininputclass ?> type="checkbox" name="imu_1" value="Y" <?=$cimu_1?> />Enable Unclear Invoice Management</i>
			  <? if($imu_2=='Y') { $cimu_2 = 'checked="checked"'; } else { $cimu_2= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="imu_2" value="Y" <?=$cimu_2?> />Enable Unclear Invoice Detail</i>
			  <? if($imu_3=='Y') { $cimu_3 = 'checked="checked"'; } else { $cimu_3= "";} ?>
			  <i> <input <?= admininputclass ?> type="checkbox" name="imu_3" value="Y" <?=$cimu_3?> />Enable Unclear Invoice Clear</i>
			  <? if($imu_4=='Y') { $cimu_4 = 'checked="checked"'; } else { $cimu_4= "";} ?>
			  <i> <input <?= admininputclass ?> type="checkbox" name="imu_4" value="Y" <?=$cimu_4?> />Enable Unclear Invoice Cancel</i>
			  <?php /*?><strong>Clear Invoice Manager</strong><br>
			  <? if($imc_1=='Y') { $cimc_1 = 'checked="checked"'; } else { $cimc_1= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="imc_1" value="Y" <?=$cimc_1?> />&nbsp;&nbsp;Enable Clear Invoice Management
			  <? if($imc_2=='Y') { $cimc_2 = 'checked="checked"'; } else { $cimc_2= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="imc_2" value="Y" <?=$cimc_2?> />&nbsp;&nbsp;Enable Clear Invoice Details<br>
			  <? if($imc_3=='Y') { $cimc_3 = 'checked="checked"'; } else { $cimc_3= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="imc_3" value="Y" <?=$cimc_3?> />&nbsp;&nbsp;Enable Clear Invoice Clear<br><br>

			  <strong>Cancel Invoice Manager</strong><br>
			  <? if($imc_4=='Y') { $cimc_4 = 'checked="checked"'; } else { $cimc_4= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="imc_4" value="Y" <?=$cimc_4?> />&nbsp;&nbsp;Enable Cancel Invoice Management
			  <? if($imc_5=='Y') { $cimc_5 = 'checked="checked"'; } else { $cimc_5= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="imc_5" value="Y" <?=$cimc_5?> />&nbsp;&nbsp;Enable Cancel Invoice Details<br>
			  <? if($imc_6=='Y') { $cimc_6 = 'checked="checked"'; } else { $cimc_6= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="imc_6" value="Y" <?=$cimc_6?> />&nbsp;&nbsp;Enable Cancel Invoice Clear<br><?php */?>
	</checkbox>
             </div
		  
		  ><div class="form-group">
             <label><b>CMS Management</b></label>
			 
             <checkbox> <? if($cmc_1=='Y') { $ccmc_1 = 'checked="checked"'; } else { $ccmc_1= "";} ?>			  
			   <i><input <?= admininputclass ?> type="checkbox" name="cmc_1" value="Y" <?=$ccmc_1?> /><strong>Enable CMS Management</strong></i>
			  <? if($cmc_2=='Y') { $ccmc_2 = 'checked="checked"'; } else { $ccmc_2= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="cmc_2" value="Y" <?=$ccmc_2?> /><strong>Enable Add/Modify CMS</strong></i>
			  <?php /*?><? if($cmc_3=='Y') { $ccmc_3 = 'checked="checked"'; } else { $ccmc_3= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="cmc_3" value="Y" <?=$ccmc_3?> />&nbsp;&nbsp;Enable Modify CMS<?php */?>
			  <? if($cmc_4=='Y') { $ccmc_4 = 'checked="checked"'; } else { $ccmc_4= "";} ?>
			  <i> <input <?= admininputclass ?> type="checkbox" name="cmc_4" value="Y" <?=$ccmc_4?> /><strong>Enable Delete CMS</strong></i>			  
          </checkbox>
             </div
		  
		 ><div class="form-group">
             <label><b>Banner Management</b></label>
			  <checkbox> 
			 <? if($bm_1=='Y') { $cbm_1 = 'checked="checked"'; } else { $cbm_1= "";} ?>			  
			   <i><input <?= admininputclass ?> type="checkbox" name="bm_1" value="Y" <?=$cbm_1?> /><strong>Enable Banner Management</strong></i>
			   <? if($bm_2=='Y') { $cbm_2 = 'checked="checked"'; } else { $cbm_2= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="bm_2" value="Y" <?=$cbm_2?> /><strong>Enable Add / Modify Banner</strong></i>
			   <?php /*?><? if($bm_3=='Y') { $cbm_3 = 'checked="checked"'; } else { $cbm_3= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="bm_3" value="Y" <?=$cbm_3?> />&nbsp;&nbsp;Enable Modify Banner<?php */?>
			   <? if($bm_4=='Y') { $cbm_4 = 'checked="checked"'; } else { $cbm_4= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="bm_4" value="Y" <?=$cbm_4?> /><strong>Enable Delete Banner</strong></i>
			   <? if($bm_5=='Y') { $cbm_5 = 'checked="checked"'; } else { $cbm_5= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="bm_5" value="Y"  <?=$cbm_5?>/><strong>Enable Banner Settings</strong></i>
			   <? if($bm_6=='Y') { $cbm_6 = 'checked="checked"'; } else { $cbm_6= "";} ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="bm_6" value="Y" <?=$cbm_6?>/><strong>Enable Modify Banner Settings</strong></i>	  
            </checkbox>
             </div
		  
		  ><div class="form-group">
             <label><b>Home Popular Search</b></label>
			 <checkbox> 
			<? if($hp_1=='Y') { $chp_1 = 'checked="checked"'; } else { $chp_1= "";} ?>
			  <i> <input <?= admininputclass ?> type="checkbox" name="hp_1" value="Y" <?=$chp_1?> /><strong>Enable Customized Search Management</strong></i>
			  <? if($hp_2=='Y') { $chp_2 = 'checked="checked"'; } else { $chp_2= "";} ?>
			  <i> <input <?= admininputclass ?> type="checkbox" name="hp_2" value="Y" <?=$chp_2?> /><strong>Enable Add / Modify Customized Search
              </strong></i>
			  <?php /*?><? if($hp_3=='Y') { $chp_3 = 'checked="checked"'; } else { $chp_3= "";} ?>
			 <input <?= admininputclass ?> type="checkbox" name="hp_3" value="Y" <?=$chp_3?> />&nbsp;&nbsp;Enable Modify Customized Search<?php */?>
			  <? if($hp_4=='Y') { $chp_4 = 'checked="checked"'; } else { $chp_4= "";} ?>
			  <i> <input <?= admininputclass ?> type="checkbox" name="hp_4" value="Y" <?=$chp_4?> /><strong>Enable Delete Customized Search</strong></i>
         </checkbox>
             </div
		  
		 ><div class="form-group">
             <label><b>Inquiry Management</b></label>
			
             <checkbox> 
            	<? if($imi_1=='Y') { $cimi_1 = 'checked="checked"'; } else { $cimi_1= "";} ?>			  
			    <i><input <?= admininputclass ?> type="checkbox" name="imi_1" value="Y" <?=$cimi_1?> /><strong>Enable Inquiry Management</strong></i>
			  <?php /*?><strong>Spam Manager</strong><br><?php */?>
			  <? if($imis_1=='Y') { $cimis_1 = 'checked="checked"'; } else { $cimis_1= "";} ?>
			    <i><input <?= admininputclass ?> type="checkbox" name="imis_1" value="Y" <?=$cimis_1?> /><strong>Enable Inquiry Display</strong></i>
			  <? if($imis_2=='Y') { $cimis_2 = 'checked="checked"'; } else { $cimis_2= "";} ?>
			    <i><input <?= admininputclass ?> type="checkbox" name="imis_2" value="Y" <?=$cimis_2?> /><strong>Enable Inquiry Delete</strong></i>
			  <?php /*?><? if($imis_3=='Y') { $cimis_3 = 'checked="checked"'; } else { $cimis_3= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="imis_3" value="Y" <?=$cimis_3?> />&nbsp;&nbsp;Enable Cancel Spam Inquiry
			  <? if($imis_4=='Y') { $cimis_4 = 'checked="checked"'; } else { $cimis_4= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="imis_4" value="Y" <?=$cimis_4?> />&nbsp;&nbsp;Enable Banner Settings<br>
			  <? if($imis_5=='Y') { $cimis_5 = 'checked="checked"'; } else { $cimis_5= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="imis_5" value="Y" <?=$cimis_5?> />&nbsp;&nbsp;Enable Modify Banner Settings<br><br>					
			  <strong>Advertising Manager</strong><br>
			  <? if($ima_1=='Y') { $cima_1 = 'checked="checked"'; } else { $cima_1= "";} ?>
			  <input <?= admininputclass ?> type="checkbox" name="ima_1" value="Y" <?=$cima_1?> />&nbsp;&nbsp;Enable Display Advertising
			  <? if($ima_2=='Y') { $cima_2 = 'checked="checked"'; } else { $cima_2= ""; } ?>
			  <input <?= admininputclass ?> type="checkbox" name="ima_2" value="Y" <?=$cima_2?> />&nbsp;&nbsp;Enable Delete Advertising<br><br>
			  
			  <strong>Feedback Manager</strong><br>
			   <? if($imf_1=='Y') { $cimf_1 = 'checked="checked"'; } else { $cimf_1= ""; } ?>
			  <input <?= admininputclass ?> type="checkbox" name="imf_1" value="Y" <?=$cimf_1?> />&nbsp;&nbsp;Enable Display Feedback
			   <? if($imf_2=='Y') { $cimf_2 = 'checked="checked"'; } else { $cimf_2= ""; } ?>
			  <input <?= admininputclass ?> type="checkbox" name="imf_2" value="Y" <?=$cimf_2?> />&nbsp;&nbsp;Enable Delete Feedback<br><br>
			  
			  <strong>Event Manager</strong><br>
			  <? if($ime_1=='Y') { $cime_1 = 'checked="checked"'; } else { $cime_1= ""; } ?>
			  <input <?= admininputclass ?> type="checkbox" name="ime_1" value="Y" <?=$cime_1?> />&nbsp;&nbsp;Enable Display Event
			  <? if($ime_2=='Y') { $cime_2 = 'checked="checked"'; } else { $cime_2= ""; } ?>
			  <input <?= admininputclass ?> type="checkbox" name="ime_2" value="Y" <?=$cime_2?> />&nbsp;&nbsp;Enable Delete Event<br><br>	  
			  
			  <strong>Support Manager</strong><br>
			  <? if($ims_1=='Y') { $cims_1 = 'checked="checked"'; } else { $cims_1= ""; } ?>
			  <input <?= admininputclass ?> type="checkbox" name="ims_1" value="Y" <?=$cims_1?> />&nbsp;&nbsp;Enable Display Support
			  <? if($ims_2=='Y') { $cims_2 = 'checked="checked"'; } else { $cims_2= ""; } ?>
			  <input <?= admininputclass ?> type="checkbox" name="ims_2" value="Y" <?=$cims_2?> />&nbsp;&nbsp;Enable Delete Support<br><br>	
			  
			  <strong>Billing Manager</strong><br>
			  <? if($imb_1=='Y') { $cimb_1 = 'checked="checked"'; } else { $cimb_1= ""; } ?>
			  <input <?= admininputclass ?> type="checkbox" name="imb_1" value="Y" <?=$cimb_1?> />&nbsp;&nbsp;Enable Display Billing
			  <? if($imb_2=='Y') { $cimb_2 = 'checked="checked"'; } else { $cimb_2= ""; } ?>
			  <input <?= admininputclass ?> type="checkbox" name="imb_2" value="Y" <?=$cimb_2?> />&nbsp;&nbsp;Enable Delete Billing<br><br><?php */?>	  
            </checkbox>
             </div
		  
		   ><div class="form-group">
             <label><b>Employee Management</b></label>
			<checkbox>
			<? if($emm_1=='Y') { $cemm_1 = 'checked="checked"'; } else { $cemm_1= ""; } ?>
			  <i><input <?= admininputclass ?> type="checkbox" name="emm_1" value="Y" <?=$cemm_1?> /><strong>Enable Employee Management</strong></i>
			  <? if($emm_2=='Y') { $cemm_2 = 'checked="checked"'; } else { $cemm_2= ""; } ?>
			 <i> <input <?= admininputclass ?> type="checkbox" name="emm_2" value="Y" <?=$cemm_2?> /><strong>Enable Add / Modify Employee</strong></i>
			  <?php /*?><? if($emm_3=='Y') { $cemm_3 = 'checked="checked"'; } else { $cemm_3= ""; } ?>
			  <input <?= admininputclass ?> type="checkbox" name="emm_3" value="Y" <?=$cemm_3?> />&nbsp;&nbsp;Enable Modify Employee<?php */?>
			  <? if($emm_4=='Y') { $cemm_4 = 'checked="checked"'; } else { $cemm_4= ""; } ?>
			 <i> <input <?= admininputclass ?> type="checkbox" name="emm_4" value="Y" <?=$cemm_4?> /><strong>Enable Delete Employee</strong></i>
             </checkbox>
             </div
		  
		   ><div class="form-group">
             <label><b>Bulk Email Management</b></label>
			<checkbox>
			<? if($be_1=='Y') { $cbe_1 = 'checked="checked"'; } else { $cbe_1= ""; } ?>			  
			  <i>  <input <?= admininputclass ?> type="checkbox" name="be_1" value="Y" <?=$cbe_1?> />Enable Bulk Email Management</i>
			  <? if($be_2=='Y') { $cbe_2 = 'checked="checked"'; } else { $cbe_2= ""; } ?>
			  <i>  <input <?= admininputclass ?> type="checkbox" name="be_2" value="Y" <?=$cbe_2?> />Enable Send New Email</i>
			  
			  <?php /*?><? if($be_3=='Y') { $cbe_3 = 'checked="checked"'; } else { $cbe_3= ""; } ?>
			  <input <?= admininputclass ?> type="checkbox" name="be_3" value="Y" <?=$cbe_3?> />&nbsp;&nbsp;Enable Send Again<?php */?>
			  <? if($be_4=='Y') { $cbe_4 = 'checked="checked"'; } else { $cbe_4= ""; } ?>
			  <i>  <input <?= admininputclass ?> type="checkbox" name="be_4" value="Y" <?=$cbe_4?> />Enable Delete<</i>
			  <? if($be_5=='Y') { $cbe_5 = 'checked="checked"'; } else { $cbe_5= ""; } ?>
			  <i>  <input <?= admininputclass ?> type="checkbox" name="be_5" value="Y" <?=$cbe_5?> />Enable Bulk Email Settings</i>
            </checkbox>
             </div
		  
		  ><div class="form-group">
             <label><b>Banned IP Management</b></label>
			
			<checkbox>
			<? if($bi_1=='Y') { $cbi_1 = 'checked="checked"'; } else { $cbi_1= ""; } ?>			  
			  <i> <input <?= admininputclass ?> type="checkbox" name="bi_1" value="Y" <?=$cbi_1?> /><strong>Enable Banned IP Management</strong></i>
			  <? if($bi_2=='Y') { $cbi_2 = 'checked="checked"'; } else { $cbi_2= ""; } ?>
			  <i> <input <?= admininputclass ?> type="checkbox" name="bi_2" value="Y" <?=$cbi_2?> /><strong>Enable Change Status</strong></i>
			  <? if($bi_3=='Y') { $cbi_3 = 'checked="checked"'; } else { $cbi_3= ""; } ?>
			 <i>  <input <?= admininputclass ?> type="checkbox" name="bi_3" value="Y" <?=$cbi_3?> /><strong>Enable Add / Modify IP</strong></i>
			  
			  <?php /*?><? if($bi_4=='Y') { $cbi_4 = 'checked="checked"'; } else { $cbi_4= ""; } ?>
			  <input <?= admininputclass ?> type="checkbox" name="bi_4" value="Y" <?=$cbi_4?> />&nbsp;&nbsp;Enable Modify IP<?php */?>
			  <? if($bi_5=='Y') { $cbi_5 = 'checked="checked"'; } else { $cbi_5= ""; } ?>
			 <i> <input <?= admininputclass ?> type="checkbox" name="bi_5" value="Y" <?=$cbi_5?> /><strong>Enable Delete IP</strong></i>
            </checkbox>
             </div>
             <div class="form-group">
             <label><b>Website Setting</b></label>
			
			  <checkbox>
			<? if($wss_1=='Y') { $cwss_1 = 'checked="checked"'; } else { $cwss_1= ""; } ?>			  
			   <i><input <?= admininputclass ?> type="checkbox" name="wss_1" value="Y" <?=$cwss_1?> /><strong>Enable Website Settings</strong></i>
			  <? if($wss_2=='Y') { $cwss_2 = 'checked="checked"'; } else { $cwss_2= ""; } ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="wss_2" value="Y" <?=$cwss_2?> /><strong>Enable Modify Website Settings</strong></i>
			  <? if($wss_3=='Y') { $cwss_3 = 'checked="checked"'; } else { $cwss_3= ""; } ?>
			  <i> <input <?= admininputclass ?> type="checkbox" name="wss_3" value="Y" <?=$cwss_3?> /><strong>Enable Site Settings</strong></i>
			  <? if($wss_4=='Y') { $cwss_4 = 'checked="checked"'; } else { $cwss_4= ""; } ?>
			  <i> <input <?= admininputclass ?> type="checkbox" name="wss_4" value="Y" <?=$cwss_4?> /><strong>Enable Modify Site Settings</strong></i>
			  <? if($wss_5=='Y') { $cwss_5 = 'checked="checked"'; } else { $cwss_5= ""; } ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="wss_5" value="Y" <?=$cwss_5?> /><strong>Enable Site Emails</strong></i>
			  <? if($wss_6=='Y') { $cwss_6 = 'checked="checked"'; } else { $cwss_6= ""; } ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="wss_6" value="Y" <?=$cwss_6?> /><strong>Enable Modify Site Emails</strong></i>
			  <? if($wss_7=='Y') { $cwss_7 = 'checked="checked"'; } else { $cwss_7= ""; } ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="wss_7" value="Y" <?=$cwss_7?> /><strong>Enable Employee Role Settings</strong></i>
			  <? if($wss_8=='Y') { $cwss_8 = 'checked="checked"'; } else { $cwss_8= ""; } ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="wss_8" value="Y" <?=$cwss_8?> /><strong>Enable Modify Employee Role Settings</strong></i>
			  <? if($wss_9=='Y') { $cwss_9 = 'checked="checked"'; } else { $cwss_9= ""; } ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="wss_9" value="Y" <?=$cwss_9?> /><strong>Enable Change Password</strong></i>
			  <? if($wss_10=='Y') { $cwss_10 = 'checked="checked"'; } else { $cwss_10= ""; } ?>
			  <i> <input <?= admininputclass ?> type="checkbox" name="wss_10" value="Y" <?=$cwss_10?> /><strong>Enable All User RSS Feed</strong></i>	
              
              <? if($wss_11=='Y') { $cwss_11 = 'checked="checked"'; } else { $cwss_11= ""; } ?>
			   <i><input <?= admininputclass ?> type="checkbox" name="wss_11" value="Y" <?=$cwss_11?> /><strong>Enable Homepage Images</strong></i>	
			  
             </checkbox>
             </div
          ><?php if(is_dir("../crm")){?>
          		<? include("../crm/crmrole.php"); ?>
		   <?php } ?>
          <? if(is_dir("../mydesk")){ ?> 
          		<? include("../mydesk/mydeskrole.php"); ?>
          <? } ?>
		  
         <div class="form-group common_button">
            <input name="Submit" type="submit"  class="btn" title="Submit" value="Submit" alt="Submit">
              <input name="Reset" type="reset"  class="btn" value="Reset" title="Reset" alt="Reset">
              
            </div>
    </form><? } ?>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $winkmaster_help ?></div>
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