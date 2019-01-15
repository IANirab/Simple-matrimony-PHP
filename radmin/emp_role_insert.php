<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
//echo "hi123"; exit;
if(isset($_POST['b']) && $_POST['b']!=""){
	$action = getonefielddata("SELECT id from tbl_employee_role_setting WHERE role_id=".$_POST['b']);
} else {
	$action = "0";
}



$ip = $_SERVER["REMOTE_ADDR"];
	$query = sendtogeneratequery($action,"role_id",$_POST['b'],"Y");
	if(isset($_POST['db_1'])) {	$query .= sendtogeneratequery($action,"db_1",$_POST['db_1'],"Y"); } else {$query .= sendtogeneratequery($action,"db_1","","Y");}
	if(isset($_POST['db_2'])) {	$query .= sendtogeneratequery($action,"db_2",$_POST['db_2'],"Y"); } else { $query .= sendtogeneratequery($action,"db_2","","Y"); }
	if(isset($_POST['db_3'])) {	$query .= sendtogeneratequery($action,"db_3",$_POST['db_3'],"Y"); } else { $query .= sendtogeneratequery($action,"db_3","","Y");}
	if(isset($_POST['db_4'])) {	$query .= sendtogeneratequery($action,"db_4",$_POST['db_4'],"Y"); } else { $query .= sendtogeneratequery($action,"db_4","","Y");}
	if(isset($_POST['db_5'])) {	$query .= sendtogeneratequery($action,"db_5",$_POST['db_5'],"Y"); } else { $query .= sendtogeneratequery($action,"db_5","","Y");}
	if(isset($_POST['db_6'])) {	$query .= sendtogeneratequery($action,"db_6",$_POST['db_6'],"Y"); } else { $query .= sendtogeneratequery($action,"db_6","","Y");}
	if(isset($_POST['db_7'])) {	$query .= sendtogeneratequery($action,"db_7",$_POST['db_7'],"Y"); } else { $query .= sendtogeneratequery($action,"db_7","","Y");}
	
	if(isset($_POST['um_1'])) {	$query .= sendtogeneratequery($action,"um_1",$_POST['um_1'],"Y"); }	else { $query .= sendtogeneratequery($action,"um_1","","Y");}  
	if(isset($_POST['um_2'])) {	$query .= sendtogeneratequery($action,"um_2",$_POST['um_2'],"Y"); } else { $query .= sendtogeneratequery($action,"um_2","","Y");}  
	if(isset($_POST['um_3'])) {	$query .= sendtogeneratequery($action,"um_3",$_POST['um_3'],"Y"); } else { $query .= sendtogeneratequery($action,"um_3","","Y");}  
	if(isset($_POST['um_4'])) {	$query .= sendtogeneratequery($action,"um_4",$_POST['um_4'],"Y"); } else { $query .= sendtogeneratequery($action,"um_4","","Y");}  
	if(isset($_POST['um_5'])) {	$query .= sendtogeneratequery($action,"um_5",$_POST['um_5'],"Y"); } else { $query .= sendtogeneratequery($action,"um_5","","Y");}  
	if(isset($_POST['um_6'])) {	$query .= sendtogeneratequery($action,"um_6",$_POST['um_6'],"Y"); } else { $query .= sendtogeneratequery($action,"um_6","","Y");}  
	if(isset($_POST['um_7'])) {	$query .= sendtogeneratequery($action,"um_7",$_POST['um_7'],"Y"); } else { $query .= sendtogeneratequery($action,"um_7","","Y");}  
	if(isset($_POST['um_8'])) {	$query .= sendtogeneratequery($action,"um_8",$_POST['um_8'],"Y"); } else { $query .= sendtogeneratequery($action,"um_8","","Y");}
	if(isset($_POST['um_9'])) {	$query .= sendtogeneratequery($action,"um_9",$_POST['um_9'],"Y"); } else { $query .= sendtogeneratequery($action,"um_9","","Y");}  
	
	if(isset($_POST['umu_1'])) { $query .= sendtogeneratequery($action,"umu_1",$_POST['umu_1'],"Y"); } else { $query .= sendtogeneratequery($action,"umu_1","","Y");}  
	if(isset($_POST['umu_2'])) { $query .= sendtogeneratequery($action,"umu_2",$_POST['umu_2'],"Y"); } else { $query .= sendtogeneratequery($action,"umu_2","","Y");}  
	if(isset($_POST['umu_3'])) { $query .= sendtogeneratequery($action,"umu_3",$_POST['umu_3'],"Y"); } else { $query .= sendtogeneratequery($action,"umu_3","","Y");}  
	if(isset($_POST['umu_4'])) { $query .= sendtogeneratequery($action,"umu_4",$_POST['umu_4'],"Y"); } else { $query .= sendtogeneratequery($action,"umu_4","","Y");}  
	if(isset($_POST['umu_5'])) { $query .= sendtogeneratequery($action,"umu_5",$_POST['umu_5'],"Y"); } else { $query .= sendtogeneratequery($action,"umu_5","","Y");}  
	if(isset($_POST['umu_6'])) { $query .= sendtogeneratequery($action,"umu_6",$_POST['umu_6'],"Y"); } else { $query .= sendtogeneratequery($action,"umu_6","","Y");}  
	if(isset($_POST['umu_7'])) { $query .= sendtogeneratequery($action,"umu_7",$_POST['umu_7'],"Y"); } else { $query .= sendtogeneratequery($action,"umu_7","","Y");}  
	if(isset($_POST['umu_8'])) { $query .= sendtogeneratequery($action,"umu_8",$_POST['umu_8'],"Y"); } else {$query .= sendtogeneratequery($action,"umu_8","","Y");}  
	
	if(isset($_POST['ume_1'])) { $query .= sendtogeneratequery($action,"ume_1",$_POST['ume_1'],"Y"); } else { $query .= sendtogeneratequery($action,"ume_1","","Y");}  
	if(isset($_POST['ume_2'])) { $query .= sendtogeneratequery($action,"ume_2",$_POST['ume_2'],"Y"); } else { $query .= sendtogeneratequery($action,"ume_2","","Y");}  
	if(isset($_POST['ume_3'])) { $query .= sendtogeneratequery($action,"ume_3",$_POST['ume_3'],"Y"); } else { $query .= sendtogeneratequery($action,"ume_3","","Y");}  
	if(isset($_POST['ume_4'])) { $query .= sendtogeneratequery($action,"ume_4",$_POST['ume_4'],"Y"); } else { $query .= sendtogeneratequery($action,"ume_4","","Y");}  
	if(isset($_POST['ume_5'])) { $query .= sendtogeneratequery($action,"ume_5",$_POST['ume_5'],"Y"); } else { $query .= sendtogeneratequery($action,"ume_5","","Y");}  
	if(isset($_POST['ume_6'])) { $query .= sendtogeneratequery($action,"ume_6",$_POST['ume_6'],"Y"); } else { $query .= sendtogeneratequery($action,"ume_6","","Y");}  
	if(isset($_POST['ume_7'])) { $query .= sendtogeneratequery($action,"ume_7",$_POST['ume_7'],"Y"); } else { $query .= sendtogeneratequery($action,"ume_7","","Y");}  
	if(isset($_POST['ume_8'])) { $query .= sendtogeneratequery($action,"ume_8",$_POST['ume_8'],"Y"); } else { $query .= sendtogeneratequery($action,"ume_8","","Y");}  
	
	if(isset($_POST['ump_1'])) { $query .= sendtogeneratequery($action,"ump_1",$_POST['ump_1'],"Y"); } else { $query .= sendtogeneratequery($action,"ump_1","","Y");}  
	if(isset($_POST['ump_2'])) { $query .= sendtogeneratequery($action,"ump_2",$_POST['ump_2'],"Y"); } else { $query .= sendtogeneratequery($action,"ump_2","","Y");}  
	if(isset($_POST['ump_3'])) { $query .= sendtogeneratequery($action,"ump_3",$_POST['ump_3'],"Y"); } else { $query .= sendtogeneratequery($action,"ump_3","","Y");}  
	if(isset($_POST['ump_4'])) { $query .= sendtogeneratequery($action,"ump_4",$_POST['ump_4'],"Y"); } else { $query .= sendtogeneratequery($action,"ump_4","","Y");}  
	if(isset($_POST['ump_5'])) { $query .= sendtogeneratequery($action,"ump_5",$_POST['ump_5'],"Y"); } else { $query .= sendtogeneratequery($action,"ump_5","","Y");}  
	if(isset($_POST['ump_6'])) { $query .= sendtogeneratequery($action,"ump_6",$_POST['ump_6'],"Y"); } else { $query .= sendtogeneratequery($action,"ump_6","","Y");}  
	if(isset($_POST['ump_7'])) { $query .= sendtogeneratequery($action,"ump_7",$_POST['ump_7'],"Y"); } else { $query .= sendtogeneratequery($action,"ump_7","","Y");}  
	if(isset($_POST['ump_8'])) { $query .= sendtogeneratequery($action,"ump_8",$_POST['ump_8'],"Y"); } else { $query .= sendtogeneratequery($action,"ump_8","","Y");}  
	 
	if(isset($_POST['umo_1'])) { $query .= sendtogeneratequery($action,"umo_1",$_POST['umo_1'],"Y"); } else { $query .= sendtogeneratequery($action,"umo_1","","Y");}  
	if(isset($_POST['umo_2'])) { $query .= sendtogeneratequery($action,"umo_2",$_POST['umo_2'],"Y"); } else { $query .= sendtogeneratequery($action,"umo_2","","Y");}  
	if(isset($_POST['umo_3'])) { $query .= sendtogeneratequery($action,"umo_3",$_POST['umo_3'],"Y"); } else { $query .= sendtogeneratequery($action,"umo_3","","Y");}  
	if(isset($_POST['umo_4'])) { $query .= sendtogeneratequery($action,"umo_4",$_POST['umo_4'],"Y"); } else { $query .= sendtogeneratequery($action,"umo_4","","Y");}  
	if(isset($_POST['umo_5'])) { $query .= sendtogeneratequery($action,"umo_5",$_POST['umo_5'],"Y"); } else { $query .= sendtogeneratequery($action,"umo_5","","Y");}  
	if(isset($_POST['umo_6'])) { $query .= sendtogeneratequery($action,"umo_6",$_POST['umo_6'],"Y"); } else { $query .= sendtogeneratequery($action,"umo_6","","Y");}  
	if(isset($_POST['umo_7'])) { $query .= sendtogeneratequery($action,"umo_7",$_POST['umo_7'],"Y"); } else { $query .= sendtogeneratequery($action,"umo_7","","Y");}  
	if(isset($_POST['umo_8'])) { $query .= sendtogeneratequery($action,"umo_8",$_POST['umo_8'],"Y"); } else { $query .= sendtogeneratequery($action,"umo_8","","Y");}  
	
	if(isset($_POST['umof_1'])) { $query .= sendtogeneratequery($action,"umof_1",$_POST['umof_1'],"Y"); } else { $query .= sendtogeneratequery($action,"umof_1","","Y");}  
	if(isset($_POST['umof_2'])) { $query .= sendtogeneratequery($action,"umof_2",$_POST['umof_2'],"Y"); } else { $query .= sendtogeneratequery($action,"umof_2","","Y");}  
	if(isset($_POST['umof_3'])) { $query .= sendtogeneratequery($action,"umof_3",$_POST['umof_3'],"Y"); } else { $query .= sendtogeneratequery($action,"umof_3","","Y");}  
	if(isset($_POST['umof_4'])) { $query .= sendtogeneratequery($action,"umof_4",$_POST['umof_4'],"Y"); } else { $query .= sendtogeneratequery($action,"umof_4","","Y");}  
	 
	if(isset($_POST['am_1'])) { $query .= sendtogeneratequery($action,"am_1",$_POST['am_1'],"Y"); } else { $query .= sendtogeneratequery($action,"am_1","","Y");}  
	if(isset($_POST['am_2'])) { $query .= sendtogeneratequery($action,"am_2",$_POST['am_2'],"Y"); } else { $query .= sendtogeneratequery($action,"am_2","","Y");}  
	
	if(isset($_POST['qm_1'])) { $query .= sendtogeneratequery($action,"qm_1",$_POST['qm_1'],"Y"); } else { $query .= sendtogeneratequery($action,"qm_1","","Y");}  
	if(isset($_POST['qm_2'])) { $query .= sendtogeneratequery($action,"qm_2",$_POST['qm_2'],"Y"); } else { $query .= sendtogeneratequery($action,"qm_2","","Y");}  
	if(isset($_POST['qm_3'])) { $query .= sendtogeneratequery($action,"qm_3",$_POST['qm_3'],"Y"); } else { $query .= sendtogeneratequery($action,"qm_3","","Y");}  
	if(isset($_POST['qm_4'])) { $query .= sendtogeneratequery($action,"qm_4",$_POST['qm_4'],"Y"); } else { $query .= sendtogeneratequery($action,"qm_4","","Y");}  
	 
	if(isset($_POST['cm_1'])) { $query .= sendtogeneratequery($action,"cm_1",$_POST['cm_1'],"Y"); } else { $query .= sendtogeneratequery($action,"cm_1","","Y");}  
	if(isset($_POST['cm_2'])) { $query .= sendtogeneratequery($action,"cm_2",$_POST['cm_2'],"Y"); } else { $query .= sendtogeneratequery($action,"cm_2","","Y");}  
	if(isset($_POST['cm_3'])) { $query .= sendtogeneratequery($action,"cm_3",$_POST['cm_3'],"Y"); } else { $query .= sendtogeneratequery($action,"cm_3","","Y");}  
	if(isset($_POST['cm_4'])) { $query .= sendtogeneratequery($action,"cm_4",$_POST['cm_4'],"Y"); } else { $query .= sendtogeneratequery($action,"cm_4","","Y");}  
	 
	if(isset($_POST['em_1'])) { $query .= sendtogeneratequery($action,"em_1",$_POST['em_1'],"Y"); } else { $query .= sendtogeneratequery($action,"em_1","","Y");}  
	if(isset($_POST['em_2'])) { $query .= sendtogeneratequery($action,"em_2",$_POST['em_2'],"Y"); } else { $query .= sendtogeneratequery($action,"em_2","","Y");}  
	if(isset($_POST['em_3'])) { $query .= sendtogeneratequery($action,"em_3",$_POST['em_3'],"Y"); } else { $query .= sendtogeneratequery($action,"em_3","","Y");}  
	if(isset($_POST['em_4'])) { $query .= sendtogeneratequery($action,"em_4",$_POST['em_4'],"Y"); } else { $query .= sendtogeneratequery($action,"em_4","","Y");}  
	 
	if(isset($_POST['lc_1'])) { $query .= sendtogeneratequery($action,"lc_1",$_POST['lc_1'],"Y"); } else { $query .= sendtogeneratequery($action,"lc_1","","Y");}  
	if(isset($_POST['lc_2'])) { $query .= sendtogeneratequery($action,"lc_2",$_POST['lc_2'],"Y"); } else { $query .= sendtogeneratequery($action,"lc_2","","Y");}  
	if(isset($_POST['lc_3'])) { $query .= sendtogeneratequery($action,"lc_3",$_POST['lc_3'],"Y"); } else { $query .= sendtogeneratequery($action,"lc_3","","Y");}  
	if(isset($_POST['lc_4'])) { $query .= sendtogeneratequery($action,"lc_4",$_POST['lc_4'],"Y"); } else { $query .= sendtogeneratequery($action,"lc_4","","Y");}  
	
	if(isset($_POST['dm_1'])) { $query .= sendtogeneratequery($action,"dm_1",$_POST['dm_1'],"Y"); } else { $query .= sendtogeneratequery($action,"dm_1","","Y");}  
	if(isset($_POST['dm_2'])) { $query .= sendtogeneratequery($action,"dm_2",$_POST['dm_2'],"Y"); } else { $query .= sendtogeneratequery($action,"dm_2","","Y");}  
	if(isset($_POST['dm_3'])) { $query .= sendtogeneratequery($action,"dm_3",$_POST['dm_3'],"Y"); } else { $query .= sendtogeneratequery($action,"dm_3","","Y");}  
	
	if(isset($_POST['dmd_1'])) { $query .= sendtogeneratequery($action,"dmd_1",$_POST['dmd_1'],"Y"); } else { $query .= sendtogeneratequery($action,"dmd_1","","Y");}  
	if(isset($_POST['dmd_2'])) { $query .= sendtogeneratequery($action,"dmd_2",$_POST['dmd_2'],"Y"); } else { $query .= sendtogeneratequery($action,"dmd_2","","Y");}  
	if(isset($_POST['dmd_3'])) { $query .= sendtogeneratequery($action,"dmd_3",$_POST['dmd_3'],"Y"); } else { $query .= sendtogeneratequery($action,"dmd_3","","Y");}  
	 
	if(isset($_POST['ama_1'])) { $query .= sendtogeneratequery($action,"ama_1",$_POST['ama_1'],"Y"); } else {$query .= sendtogeneratequery($action,"ama_1","","Y");}  
	if(isset($_POST['ama_2'])) { $query .= sendtogeneratequery($action,"ama_2",$_POST['ama_2'],"Y"); } else { $query .= sendtogeneratequery($action,"ama_2","","Y");}  
	if(isset($_POST['ama_3'])) { $query .= sendtogeneratequery($action,"ama_3",$_POST['ama_3'],"Y"); } else { $query .= sendtogeneratequery($action,"ama_3","","Y");}  
	if(isset($_POST['ama_4'])) { $query .= sendtogeneratequery($action,"ama_4",$_POST['ama_4'],"Y"); } else { $query .= sendtogeneratequery($action,"ama_4","","Y");}  
	 
	if(isset($_POST['tm_1'])) { $query .= sendtogeneratequery($action,"tm_1",$_POST['tm_1'],"Y"); } else { $query .= sendtogeneratequery($action,"tm_1","","Y");}  
	if(isset($_POST['tm_2'])) { $query .= sendtogeneratequery($action,"tm_2",$_POST['tm_2'],"Y"); } else { $query .= sendtogeneratequery($action,"tm_2","","Y");}  
	if(isset($_POST['tm_3'])) { $query .= sendtogeneratequery($action,"tm_3",$_POST['tm_3'],"Y"); } else { $query .= sendtogeneratequery($action,"tm_3","","Y");}  
	if(isset($_POST['tm_4'])) { $query .= sendtogeneratequery($action,"tm_4",$_POST['tm_4'],"Y"); } else { $query .= sendtogeneratequery($action,"tm_4","","Y");}  
	
	if(isset($_POST['ws_1'])) { $query .= sendtogeneratequery($action,"ws_1",$_POST['ws_1'],"Y"); } else { $query .= sendtogeneratequery($action,"ws_1","","Y");}  
	if(isset($_POST['ws_2'])) { $query .= sendtogeneratequery($action,"ws_2",$_POST['ws_2'],"Y"); } else { $query .= sendtogeneratequery($action,"ws_2","","Y");}  
	if(isset($_POST['ws_3'])) { $query .= sendtogeneratequery($action,"ws_3",$_POST['ws_3'],"Y"); } else { $query .= sendtogeneratequery($action,"ws_3","","Y");}  
	if(isset($_POST['ws_4'])) { $query .= sendtogeneratequery($action,"ws_4",$_POST['ws_4'],"Y"); } else { $query .= sendtogeneratequery($action,"ws_4","","Y");}  
	
	if(isset($_POST['pm_1'])) { $query .= sendtogeneratequery($action,"pm_1",$_POST['pm_1'],"Y"); } else { $query .= sendtogeneratequery($action,"pm_1","","Y");}  
	if(isset($_POST['pm_2'])) { $query .= sendtogeneratequery($action,"pm_2",$_POST['pm_2'],"Y"); } else { $query .= sendtogeneratequery($action,"pm_2","","Y");}  
	if(isset($_POST['pm_3'])) { $query .= sendtogeneratequery($action,"pm_3",$_POST['pm_3'],"Y"); } else { $query .= sendtogeneratequery($action,"pm_3","","Y");}  
	if(isset($_POST['pm_4'])) { $query .= sendtogeneratequery($action,"pm_4",$_POST['pm_4'],"Y"); } else { $query .= sendtogeneratequery($action,"pm_4","","Y");}  
	if(isset($_POST['pm_5'])) { $query .= sendtogeneratequery($action,"pm_5",$_POST['pm_5'],"Y"); } else { $query .= sendtogeneratequery($action,"pm_5","","Y");}  
	
	if(isset($_POST['im_1'])) { $query .= sendtogeneratequery($action,"im_1",$_POST['im_1'],"Y"); } else { $query .= sendtogeneratequery($action,"im_1","","Y");}  
	
	if(isset($_POST['imu_1'])) { $query .= sendtogeneratequery($action,"imu_1",$_POST['imu_1'],"Y"); } else { $query .= sendtogeneratequery($action,"imu_1","","Y");}  
	if(isset($_POST['imu_2'])) { $query .= sendtogeneratequery($action,"imu_2",$_POST['imu_2'],"Y"); } else { $query .= sendtogeneratequery($action,"imu_2","","Y");}  
	if(isset($_POST['imu_3'])) { $query .= sendtogeneratequery($action,"imu_3",$_POST['imu_3'],"Y"); } else { $query .= sendtogeneratequery($action,"imu_3","","Y");}  
	if(isset($_POST['imu_4'])) { $query .= sendtogeneratequery($action,"imu_4",$_POST['imu_4'],"Y"); } else { $query .= sendtogeneratequery($action,"imu_4","","Y");}  
	 
	if(isset($_POST['imc_1'])) { $query .= sendtogeneratequery($action,"imc_1",$_POST['imc_1'],"Y"); } else { $query .= sendtogeneratequery($action,"imc_1","","Y");}  
	if(isset($_POST['imc_2'])) { $query .= sendtogeneratequery($action,"imc_2",$_POST['imc_2'],"Y"); } else { $query .= sendtogeneratequery($action,"imc_2","","Y");}  
	if(isset($_POST['imc_3'])) { $query .= sendtogeneratequery($action,"imc_3",$_POST['imc_3'],"Y"); } else { $query .= sendtogeneratequery($action,"imc_3","","Y");}  
	if(isset($_POST['imc_4'])) { $query .= sendtogeneratequery($action,"imc_4",$_POST['imc_4'],"Y"); } else { $query .= sendtogeneratequery($action,"imc_4","","Y");}  
	if(isset($_POST['imc_5'])) { $query .= sendtogeneratequery($action,"imc_5",$_POST['imc_5'],"Y"); } else { $query .= sendtogeneratequery($action,"imc_5","","Y");}  
	if(isset($_POST['imc_6'])) { $query .= sendtogeneratequery($action,"imc_6",$_POST['imc_6'],"Y"); } else { $query .= sendtogeneratequery($action,"imc_6","","Y");}  
	 
	if(isset($_POST['cmc_1'])) { $query .= sendtogeneratequery($action,"cmc_1",$_POST['cmc_1'],"Y"); } else { $query .= sendtogeneratequery($action,"cmc_1","","Y");}  
	if(isset($_POST['cmc_2'])) { $query .= sendtogeneratequery($action,"cmc_2",$_POST['cmc_2'],"Y"); } else { $query .= sendtogeneratequery($action,"cmc_2","","Y");}  
	if(isset($_POST['cmc_3'])) { $query .= sendtogeneratequery($action,"cmc_3",$_POST['cmc_3'],"Y"); } else { $query .= sendtogeneratequery($action,"cmc_3","","Y");}  
	if(isset($_POST['cmc_4'])) { $query .= sendtogeneratequery($action,"cmc_4",$_POST['cmc_4'],"Y"); } else { $query .= sendtogeneratequery($action,"cmc_4","","Y");}  
	
	if(isset($_POST['bm_1'])) { $query .= sendtogeneratequery($action,"bm_1",$_POST['bm_1'],"Y"); } else { $query .= sendtogeneratequery($action,"bm_1","","Y");}  
	if(isset($_POST['bm_2'])) { $query .= sendtogeneratequery($action,"bm_2",$_POST['bm_2'],"Y"); } else { $query .= sendtogeneratequery($action,"bm_2","","Y");}  
	if(isset($_POST['bm_3'])) { $query .= sendtogeneratequery($action,"bm_3",$_POST['bm_3'],"Y"); } else { $query .= sendtogeneratequery($action,"bm_3","","Y");}  
	if(isset($_POST['bm_4'])) { $query .= sendtogeneratequery($action,"bm_4",$_POST['bm_4'],"Y"); } else { $query .= sendtogeneratequery($action,"bm_4","","Y");}  
	if(isset($_POST['bm_5'])) { $query .= sendtogeneratequery($action,"bm_5",$_POST['bm_5'],"Y"); }	else { $query .= sendtogeneratequery($action,"bm_5","","Y");}  
	if(isset($_POST['bm_6'])) { $query .= sendtogeneratequery($action,"bm_6",$_POST['bm_6'],"Y"); } else { $query .= sendtogeneratequery($action,"bm_6","","Y");}  
	
	if(isset($_POST['hp_1'])) { $query .= sendtogeneratequery($action,"hp_1",$_POST['hp_1'],"Y"); } else { $query .= sendtogeneratequery($action,"hp_1","","Y");}  
	if(isset($_POST['hp_2'])) { $query .= sendtogeneratequery($action,"hp_2",$_POST['hp_2'],"Y"); } else { $query .= sendtogeneratequery($action,"hp_2","","Y");}  
	if(isset($_POST['hp_3'])) { $query .= sendtogeneratequery($action,"hp_3",$_POST['hp_3'],"Y"); } else { $query .= sendtogeneratequery($action,"hp_3","","Y");}  
	if(isset($_POST['hp_4'])) { $query .= sendtogeneratequery($action,"hp_4",$_POST['hp_4'],"Y"); } else { $query .= sendtogeneratequery($action,"hp_4","","Y");}  
	 
	if(isset($_POST['imi_1'])) { $query .= sendtogeneratequery($action,"imi_1",$_POST['imi_1'],"Y"); } else { $query .= sendtogeneratequery($action,"imi_1","","Y");}  
	 
	if(isset($_POST['imis_1'])) { $query .= sendtogeneratequery($action,"imis_1",$_POST['imis_1'],"Y"); } else { $query .= sendtogeneratequery($action,"imis_1","","Y");}  
	if(isset($_POST['imis_2'])) { $query .= sendtogeneratequery($action,"imis_2",$_POST['imis_2'],"Y"); } else { $query .= sendtogeneratequery($action,"imis_2","","Y");}  
	if(isset($_POST['imis_3'])) { $query .= sendtogeneratequery($action,"imis_3",$_POST['imis_3'],"Y"); } else { $query .= sendtogeneratequery($action,"imis_3","","Y");}  
	if(isset($_POST['imis_4'])) { $query .= sendtogeneratequery($action,"imis_4",$_POST['imis_4'],"Y"); } else { $query .= sendtogeneratequery($action,"imis_4","","Y");}  
	if(isset($_POST['imis_5'])) { $query .= sendtogeneratequery($action,"imis_5",$_POST['imis_5'],"Y"); } else { $query .= sendtogeneratequery($action,"imis_5","","Y");}  
	
	if(isset($_POST['ima_1'])) { $query .= sendtogeneratequery($action,"ima_1",$_POST['ima_1'],"Y"); } else { $query .= sendtogeneratequery($action,"ima_1","","Y");}  
	if(isset($_POST['ima_2'])) { $query .= sendtogeneratequery($action,"ima_2",$_POST['ima_2'],"Y"); } else { $query .= sendtogeneratequery($action,"ima_2","","Y");}  
	
	if(isset($_POST['imf_1'])) { $query .= sendtogeneratequery($action,"imf_1",$_POST['imf_1'],"Y"); } else { $query .= sendtogeneratequery($action,"imf_1","","Y");}  
	if(isset($_POST['imf_2'])) { $query .= sendtogeneratequery($action,"imf_2",$_POST['imf_2'],"Y"); } else { $query .= sendtogeneratequery($action,"imf_2","","Y");}  
	
	if(isset($_POST['ime_1'])) { $query .= sendtogeneratequery($action,"ime_1",$_POST['ime_1'],"Y"); } else { $query .= sendtogeneratequery($action,"ime_1","","Y");}  
	if(isset($_POST['ime_2'])) { $query .= sendtogeneratequery($action,"ime_2",$_POST['ime_2'],"Y"); } else { $query .= sendtogeneratequery($action,"ime_2","","Y");}  
	
	if(isset($_POST['ims_1'])) { $query .= sendtogeneratequery($action,"ims_1",$_POST['ims_1'],"Y"); } else { $query .= sendtogeneratequery($action,"ims_1","","Y");}  
	if(isset($_POST['ims_2'])) { $query .= sendtogeneratequery($action,"ims_2",$_POST['ims_2'],"Y"); } else { $query .= sendtogeneratequery($action,"ims_2","","Y");}  
	
	if(isset($_POST['imb_1'])) { $query .= sendtogeneratequery($action,"imb_1",$_POST['imb_1'],"Y"); } else { $query .= sendtogeneratequery($action,"imb_1","","Y");}  
	if(isset($_POST['imb_2'])) { $query .= sendtogeneratequery($action,"imb_2",$_POST['imb_2'],"Y"); } else { $query .= sendtogeneratequery($action,"imb_2","","Y");}  
	
	if(isset($_POST['emm_1'])) { $query .= sendtogeneratequery($action,"emm_1",$_POST['emm_1'],"Y"); } else {$query .= sendtogeneratequery($action,"emm_1","","Y");}  
	if(isset($_POST['emm_2'])) { $query .= sendtogeneratequery($action,"emm_2",$_POST['emm_2'],"Y"); } else { $query .= sendtogeneratequery($action,"emm_2","","Y");}  
	if(isset($_POST['emm_3'])) { $query .= sendtogeneratequery($action,"emm_3",$_POST['emm_3'],"Y"); } else { $query .= sendtogeneratequery($action,"emm_3","","Y");}  
	if(isset($_POST['emm_4'])) { $query .= sendtogeneratequery($action,"emm_4",$_POST['emm_4'],"Y"); } else { $query .= sendtogeneratequery($action,"emm_4","","Y");}  
	
	if(isset($_POST['be_1'])) { $query .= sendtogeneratequery($action,"be_1",$_POST['be_1'],"Y"); } else { $query .= sendtogeneratequery($action,"be_1","","Y");}  
	if(isset($_POST['be_2'])) { $query .= sendtogeneratequery($action,"be_2",$_POST['be_2'],"Y"); } else { $query .= sendtogeneratequery($action,"be_2","","Y");}  
	if(isset($_POST['be_3'])) { $query .= sendtogeneratequery($action,"be_3",$_POST['be_3'],"Y"); } else { $query .= sendtogeneratequery($action,"be_3","","Y");}  
	if(isset($_POST['be_4'])) { $query .= sendtogeneratequery($action,"be_4",$_POST['be_4'],"Y"); } else { $query .= sendtogeneratequery($action,"be_4","","Y");}  
	if(isset($_POST['be_5'])) { $query .= sendtogeneratequery($action,"be_5",$_POST['be_5'],"Y"); } else { $query .= sendtogeneratequery($action,"be_5","","Y");}  
	
	if(isset($_POST['bi_1'])) { $query .= sendtogeneratequery($action,"bi_1",$_POST['bi_1'],"Y"); } else { $query .= sendtogeneratequery($action,"bi_1","","Y");}  
	if(isset($_POST['bi_2'])) { $query .= sendtogeneratequery($action,"bi_2",$_POST['bi_2'],"Y"); } else { $query .= sendtogeneratequery($action,"bi_2","","Y");}  
	if(isset($_POST['bi_3'])) { $query .= sendtogeneratequery($action,"bi_3",$_POST['bi_3'],"Y"); } else {$query .= sendtogeneratequery($action,"bi_3","","Y");}  
	if(isset($_POST['bi_4'])) { $query .= sendtogeneratequery($action,"bi_4",$_POST['bi_4'],"Y"); } else {$query .= sendtogeneratequery($action,"bi_4","","Y");}  
	if(isset($_POST['bi_5'])) { $query .= sendtogeneratequery($action,"bi_5",$_POST['bi_5'],"Y"); } else {$query .= sendtogeneratequery($action,"bi_5","","Y");}  
	 
	if(isset($_POST['wss_1'])) { $query .= sendtogeneratequery($action,"wss_1",$_POST['wss_1'],"Y"); } else { $query .= sendtogeneratequery($action,"wss_1","","Y");}  
	if(isset($_POST['wss_2'])) { $query .= sendtogeneratequery($action,"wss_2",$_POST['wss_2'],"Y"); } else { $query .= sendtogeneratequery($action,"wss_2","","Y");}  
	if(isset($_POST['wss_3'])) { $query .= sendtogeneratequery($action,"wss_3",$_POST['wss_3'],"Y"); } else { $query .= sendtogeneratequery($action,"wss_3","","Y");}  
	if(isset($_POST['wss_4'])) { $query .= sendtogeneratequery($action,"wss_4",$_POST['wss_4'],"Y"); } else { $query .= sendtogeneratequery($action,"wss_4","","Y");}  
	if(isset($_POST['wss_5'])) { $query .= sendtogeneratequery($action,"wss_5",$_POST['wss_5'],"Y"); } else { $query .= sendtogeneratequery($action,"wss_5","","Y");}  
	if(isset($_POST['wss_6'])) { $query .= sendtogeneratequery($action,"wss_6",$_POST['wss_6'],"Y"); } else { $query .= sendtogeneratequery($action,"wss_6","","Y");}  
	if(isset($_POST['wss_7'])) { $query .= sendtogeneratequery($action,"wss_7",$_POST['wss_7'],"Y"); } else { $query .= sendtogeneratequery($action,"wss_7","","Y");}  
	if(isset($_POST['wss_8'])) { $query .= sendtogeneratequery($action,"wss_8",$_POST['wss_8'],"Y"); } else { $query .= sendtogeneratequery($action,"wss_8","","Y");}  
	if(isset($_POST['wss_9'])) { $query .= sendtogeneratequery($action,"wss_9",$_POST['wss_9'],"Y"); } else { $query .= sendtogeneratequery($action,"wss_9","","Y");}  
	if(isset($_POST['wss_10'])) { $query .= sendtogeneratequery($action,"wss_10",$_POST['wss_10'],"Y"); } else {$query .= sendtogeneratequery($action,"wss_10","","Y");}  
	if(isset($_POST['wss_11'])) { $query .= sendtogeneratequery($action,"wss_11",$_POST['wss_11'],"Y"); } else {$query .= sendtogeneratequery($action,"wss_11","","Y");}
	$field="";
	$mydesk_fields="";
	if(is_dir("../crm")){
		include("../crm/crmroleinsert.php");
	}
	if(is_dir("../mydesk")){
		include("../mydesk/mydesk_role_insert.php");
	}
	
	  
	 
	
	//$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	//$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y"); 
	
	
	
	$query = substr($query,1);
	if($action==0) {
	$sSql = "insert into tbl_employee_role_setting (role_id,db_1,db_2,db_3, db_4,db_5,db_6,db_7,um_1,um_2,um_3,um_4,um_5,um_6,um_7,um_8,umu_1,umu_2,umu_3,umu_4,umu_5,umu_6,umu_7,umu_8,ume_1,ume_2,ume_3,ume_4,ume_5,ume_6,ume_7,ume_8,ump_1,ump_2,ump_3,ump_4,ump_5,ump_6,ump_7,ump_8,umo_1,umo_2,umo_3,umo_4,umo_5,umo_6,umo_7,umo_8,umof_1,umof_2,umof_3,umof_4,am_1,am_2,qm_1,qm_2,qm_3,qm_4,cm_1,cm_2,cm_3,cm_4,em_1,em_2,em_3,em_4,lc_1,lc_2,lc_3,lc_4,dm_1,dm_2,dm_3,dmd_1,dmd_2,dmd_3,ama_1,ama_2,ama_3,ama_4,tm_1,tm_2,tm_3,tm_4,ws_1,ws_2,ws_3,ws_4,pm_1,pm_2,pm_3,pm_4,pm_5,im_1,imu_1,imu_2,imu_3,imu_4,imc_1,imc_2,imc_3,imc_4,imc_5,imc_6,cmc_1,cmc_2,cmc_3,cmc_4,bm_1,bm_2,bm_3,bm_4,bm_5,bm_6,hp_1,hp_2,hp_3,hp_4,imi_1,imis_1,imis_2,imis_3,imis_4,imis_5,ima_1,ima_2,imf_1,imf_2,ime_1,ime_2,ims_1,ims_2,imb_1,imb_2,emm_1,emm_2,emm_3,emm_4,be_1,be_2,be_3,be_4,be_5,bi_1,bi_2,bi_3,bi_4,bi_5,wss_1,wss_2,wss_3,wss_4,wss_5,wss_6,wss_7,wss_8,wss_9,wss_10,wss_11 ".$field." ".$mydesk_fields.") values ($query)";
	execute($sSql);
	$retfile = "emp_role_master.php?b=".$_REQUEST['b'];
	} else {
		 $sSql = "update tbl_employee_role_setting set $query where id=$action";	 			
		execute($sSql);
		$retfile = "emp_role_master.php?b=".$_REQUEST['b'];
	}
	header("location:".$retfile); 
exit;
?>