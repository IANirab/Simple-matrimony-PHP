<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
$action = 0;
$status = 0;
if(isset($_GET['b']) && $_GET['b']!=''){
	$action = $_GET['b'];	
}
if(isset($_GET['b1']) && $_GET['b1']!=''){
	$status = $_GET['b1'];	
}
execute("update tbldatingusermaster SET deactive_comment='".$_POST['title']."', currentstatus=$status WHERE userid=".$action);
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:usermanager.php");
?>