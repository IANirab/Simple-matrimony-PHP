<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = 0;
if(isset($_GET['b']) && $_GET['b']!='' && is_numeric($_GET['b'])){
	$action = $_GET['b'];	
}
$premium = 'N';
if(isset($_GET['b1']) && $_GET['b1']=='1'){
	$premium = 'Y';
}
execute("update tbl_directory_master SET payment_completed='".$premium."', paymentdate=curdate() WHERE directoryid=".$action);
$_SESSION[$session_name_initital . "adminerror"] = "information updated sucessfully";
header("location:directorymanager.php");
exit;
?>