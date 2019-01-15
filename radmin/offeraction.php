<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if(isset($_GET['b']) && $_GET['b']!=""){
	$action = $_GET['b'];
} else {
	$action = "0";
}
if(isset($_GET['b1']) && $_GET['b1']!=""){
	$status = $_GET['b1'];
} else {
	$status = "0";
}
$sSql = "update tblscspecialoffermaster set currentstatus =$status where specialofferid=$action";
execute($sSql);
header("location:specialoffermanager.php");
?>