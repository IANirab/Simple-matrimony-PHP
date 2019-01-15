<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$table_name = find_table_name();
$filenm = "housekeepingmanager.php?tab=$table_name";
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$question_mgmnt_qm_4 = question_mgmnt_qm_4();	
} else {	
	$question_mgmnt_qm_4 = "N";
}
if($question_mgmnt_qm_4 == 'Y' || $question_mgmnt_qm_4 == 'N' ){
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
	
$sSql ="update $table_name set currentstatus =1 where id=$action";
execute($sSql);
$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
header("location:$filenm");
} else {
	header("location:dashboard.php?msg=no");
	exit;
}
?>