<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");	
$status = '';
$action = 0;
if(isset($_GET['b1']) && $_GET['b1']!=''){
	$status = $_GET['b1'];
}
if(isset($_GET['b']) && $_GET['b']!=''){
	$action = $_GET['b'];
}
if($status!=''){
	execute("update tbldatingpaymenttypemaster SET currentstatus='".$status."' WHERE paymenttypeid=".$action);	
}
header("location:payment_setting_manager.php");
exit;
?>