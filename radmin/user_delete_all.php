<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$filenm = "usermanager.php";
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
	$action = $_GET["b"];
else
	$action = 0;
if ((isset($_GET["b1"])) && is_numeric($_GET["b1"]))
	$subjectid = $_GET["b1"];
else
	$subjectid = 1;

if($inq_mgmnt_imis_2 == 'Y' || $inq_mgmnt_imis_2 == 'N') {	


if ((isset($_POST["deleteall"])) && $_POST["deleteall"] != "" && $_POST["type"] == "delete"){
	$_POST['deleteall'];
	/*$action1 = explode(',',$_POST['deleteall']);
	
	if(count($action1) >2){
	$action = implode(',',$action1);	
	}else{
	 $action = $action1[0];	
	}*/
	$action = implode(',',$_POST['chk']);
execute("update  tbldatingusermaster set currentstatus=3  where userid IN(" . $action . ")");

}

if ((isset($_POST["deleteall"])) && $_POST["deleteall"] != "" && $_POST["type"] == "approve_album"){
	$_POST['deleteall'];
	/*$action1 = explode(',',$_POST['deleteall']);
	
	if(count($action1) >2){
	$action = implode(',',$action1);	
	}else{
	 $action = $action1[0];	
	}*/
	$action = implode(',',$_POST['chk']);
	$status = 0;
	//execute("update tbldatingusermaster SET image_approval='Y', currentstatus='0.0' WHERE userid IN (".$action.")");	
	execute("UPDATE tbldatingalbummaster SET currentstatus=$status WHERE CreateBy IN ('" . $action . "')");

}
if ((isset($_POST["deleteall"])) && $_POST["deleteall"] != "" && $_POST["type"] == "approve_image"){
	$_POST['deleteall'];
	/*$action1 = explode(',',$_POST['deleteall']);
	
	if(count($action1) >2){
	$action = implode(',',$action1);	
	}else{
	 $action = $action1[0];	
	}*/
	$action = implode(',',$_POST['chk']);
$status = 0;
	//echo "update tbldatingusermaster SET image_approval='Y', currentstatus='0.0' WHERE userid IN (".$action.")";
	execute("update tbldatingusermaster SET image_approval='Y', currentstatus='0.0' WHERE userid IN (".$action.")");	
}
}

if($_POST["type"] == "delete"){
//$_SESSION[$session_name_initital . "adminerror"] = "information deleted sucessfully";
}else{
	$_SESSION[$session_name_initital . "adminerror"] = "information updated sucessfully";
}
header("location:".$_SERVER['HTTP_REFERER']);
} 
?>