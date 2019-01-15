<?
session_start();
include("commonfile.php");
if(isset($_SESSION[$session_name_initital . "regs_nickname"])) {
	$_SESSION[$session_name_initital . "regs_nickname"]= ''; 
}
if(isset($_SESSION[$session_name_initital . "regs_name"])) {
	$_SESSION[$session_name_initital . "regs_name"]= ''; 
}
if(isset($_SESSION[$session_name_initital . "regs_email"])) {
	$_SESSION[$session_name_initital . "regs_email"]= ''; 
}
if(isset($_SESSION[$session_name_initital . "regs_gender"])) {
	$_SESSION[$session_name_initital . "regs_gender"]= ''; 
}
if(isset($_SESSION[$session_name_initital . "regs_dobdd"])) {
	$_SESSION[$session_name_initital . "regs_dobdd"]= ''; 
}
if(isset($_SESSION[$session_name_initital . "regs_dobmm"])) {
	$_SESSION[$session_name_initital . "regs_dobmm"]= ''; 
}
if(isset($_SESSION[$session_name_initital . "regs_dobyy"])) {
	$_SESSION[$session_name_initital . "regs_dobyy"]= ''; 
}
if(isset($_SESSION[$session_name_initital . "regs_mobile"])) {
	$_SESSION[$session_name_initital . "regs_mobile"]= ''; 
}
if(isset($_SESSION[$session_name_initital . "regs_city_code"])) {
	$_SESSION[$session_name_initital . "regs_city_code"]= ''; 
}
if(isset($_SESSION[$session_name_initital . "regs_cmbreligian"])) {
	$_SESSION[$session_name_initital . "regs_cmbreligian"]= ''; 
}
if(isset($_SESSION[$session_name_initital . "regs_cmbmothertounge"])) {
	$_SESSION[$session_name_initital . "regs_cmbmothertounge"]= ''; 
}
if(isset($_SESSION[$session_name_initital . "regs_cmbcountryid"])) {
	$_SESSION[$session_name_initital . "regs_cmbcountryid"]= ''; 
}
if(isset($_SESSION[$session_name_initital . "regs_cmbstateid"])) {
	$_SESSION[$session_name_initital . "regs_cmbstateid"]= ''; 
}
if(isset($_SESSION[$session_name_initital . "regs_cmbcityid"])) {
	$_SESSION[$session_name_initital . "regs_cmbcityid"]= ''; 
}
if(isset($_SESSION[$session_name_initital . "regs_cmbprofilecreatedby"])) {
	$_SESSION[$session_name_initital . "regs_cmbprofilecreatedby"]= ''; 
}
if(isset($_SESSION[$session_name_initital . "regs_cmbhearaboutusid"])) {
	$_SESSION[$session_name_initital . "regs_cmbhearaboutusid"]= ''; 
}
if(isset($_SESSION[$session_name_initital . "regs_chkcond1"])) {
	$_SESSION[$session_name_initital . "regs_chkcond1"]= ''; 
}
header("Location:registration.php");
?>

