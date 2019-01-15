<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
require_once("jquery_include.php");
$userid = 0;
if(isset($_GET['b']) && $_GET['b']){
	$userid = $_GET['b'];
}
execute("update tbldatingusermaster SET emailverified='Y' WHERE userid=".$userid);
header("location:".$_SERVER['HTTP_REFERER']);
exit;
?>