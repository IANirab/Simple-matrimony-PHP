<?
session_start();
require_once("commonfile.php");
$session_id = session_id();
if($enable_search_without_registration=='N' && !isset($_SESSION[$session_name_initital . "memberuserid"])){
	header("location:login.php");	
	exit;
}
$que = '';
if(isset($_POST['advlookingfor']) && $_POST['advlookingfor']!=''){
	$lookingfor = $_POST['advlookingfor'];
	$que .= " tbldatingusermaster.genderid=".$lookingfor." and " ;		
}

if ((isset($_POST["advminage"])) &&  (is_numeric($_POST["advminage"])) && $_POST["advminage"] != "0.0"){
	$que .= " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) >= " . $_POST["advminage"] . " and ";
}

if ((isset($_POST["advmaxage"])) &&  (is_numeric($_POST["advmaxage"])) && $_POST["advmaxage"] != "0.0"){
	$que .= " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) <=" . $_POST["advmaxage"] . " and ";
}

if(isset($_POST['advlookingfor']) && $_POST['advlookingfor']!=''){
	$lookingfor = $_POST['advlookingfor'];
	$que .= " tbldatingusermaster.genderid=".$lookingfor." and " ;		
}

if(isset($_POST['speci_case']) && $_POST['speci_case']!=''){
	$speci_case_arr = $_POST['speci_case'];
	$speci_query = "(";	
	for($i=0; $i<count($speci_case_arr); $i++){
		$speci_query .= "tbldatingusermaster.specialcasesid=".$speci_case_arr[$i]." OR ";
	}
	$que .= substr($speci_query,0,-4).") AND ";	
}

if(isset($_POST['cmbcasteid']) && $_POST['cmbcasteid']!='' && $_POST['cmbcasteid']!='0.0'){
	$cmbcasteid = $_POST['cmbcasteid'];
	$que .= " tbldatingusermaster.castid=".$cmbcasteid." and " ;		
}
if(isset($_POST['cmbcountryid']) && $_POST['cmbcountryid']!='' && $_POST['cmbcountryid']!='0.0'){
	$cmbcountryid = $_POST['cmbcountryid'];
	$que .= " tbldatingusermaster.countryid=".$cmbcountryid." and " ;		
}
if ($que !=""){
	$_SESSION[$session_name_initital . "searchquery"] = $que;
	$_SESSION[$session_name_initital . "searchquery_original"] =$que;
	header("location:searchresult.php");
}
?>