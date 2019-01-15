<?

ob_start();
include("commonfile.php");
if($enable_search_without_registration=='N'){
	if(!isset($_SESSION[$session_name_initital . "memberuserid"])){
		header("location:login.php");	
		exit;
	}
}
$_SESSION[$session_name_initital."searchincludelookingfor"] ="";
$_SESSION[$session_name_initital."searchincludeminage"] ="";
$_SESSION[$session_name_initital."searchincludemaxage"] ="";
//$_SESSION[$session_name_initital."searchincludecountry"] ="";
$_SESSION[$session_name_initital."searchincludereligian"] ="";
$_SESSION[$session_name_initital."searchincludecommunity"] ="";
/*
$_SESSION[$session_name_initital."searchincludewith_photo"] ="";
$_SESSION[$session_name_initital."searchincludeadmreg"] = "";
$_SESSION[$session_name_initital."searchincludecounty"] = "";
$_SESSION[$session_name_initital."searchincludecast"] = "";
$_SESSION[$session_name_initital . "searchincludenri"]=""; */
$que = "";
if ((isset($_POST["LookingFor"])) &&  (is_numeric($_POST["LookingFor"])))
if ($_POST["LookingFor"] != "0.0")
{
	$que .= " tbldatingusermaster.genderid=" . $_POST["LookingFor"] . " and " ;
	$_SESSION[$session_name_initital . "searchincludelookingfor"] = $_POST["LookingFor"];
}
if ((isset($_POST["MinAge"])) &&  (is_numeric($_POST["MinAge"])))
if ($_POST["MinAge"] != "0.0")
{
	$que .= " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) >= " . $_POST["MinAge"] . " and " ;
	$_SESSION[$session_name_initital . "searchincludeminage"] = $_POST["MinAge"];
}
if ((isset($_POST["MaxAge"])) &&  (is_numeric($_POST["MaxAge"])))
if ($_POST["MaxAge"] != "0.0")
{
	$que .= " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) <=" . $_POST["MaxAge"] . " and " ;
	$_SESSION[$session_name_initital . "searchincludemaxage"] = $_POST["MaxAge"];
}
//code added by Nishit for religion, community,caste and photo
/*
if(isset($_REQUEST['cmbcast']) && $_REQUEST['cmbcast']!="0.0"){
	$que .= " tbldatingusermaster.castid = ". $_POST["cmbcast"] ." and ";
	$_SESSION[$session_name_initital . "searchincludecast"] = $_POST["cmbcast"];
}

if(isset($_REQUEST['cmbsubcast']) && $_REQUEST['cmbsubcast']!="0.0"){
	$que .= " tbldatingusermaster.subcast = ". $_POST["cmbsubcast"] ." and ";
	$_SESSION[$session_name_initital . "searchincludecmbsubcast"] = $_POST["cmbsubcast"];
}
*/
if(isset($_REQUEST['cmbreligion']) && $_REQUEST['cmbreligion']!="0.0"){
	$que .= " tbldatingusermaster.religianid = ". $_POST["cmbreligion"] ." and ";
	$_SESSION[$session_name_initital . "searchincludereligian"] = $_POST["cmbreligion"];
}
if(isset($_REQUEST['cmbcommunity']) && $_REQUEST['cmbcommunity']!="0.0"){
	$que .= " tbldatingusermaster.motherthoungid = ". $_POST["cmbcommunity"] ." and ";
	$_SESSION[$session_name_initital . "searchincludecommunity"] = $_POST["cmbcommunity"];
}
/*
if(isset($_REQUEST['nri']) && $_REQUEST['nri']=='113' && $_REQUEST['nri']!="0.0"){
   $que .= " tbldatingusermaster.countryid=" . $_POST["nri"] . " and " ;
	$_SESSION[$session_name_initital . "searchincludenri"] = $_POST["nri"];
}
if(isset($_REQUEST['nri']) && $_REQUEST['nri']=='nri' && $_REQUEST['nri']!="0.0"){
   $que .= " tbldatingusermaster.countryid!='113' and " ;
	$_SESSION[$session_name_initital . "searchincludenri"] = $_POST["nri"];
}

if(isset($_REQUEST['with_photo']) && $_REQUEST['with_photo']=="with"){
	$que .= " tbldatingusermaster.imagenm != '' and ";
	//$que .= " tbldatingusermaster.imagenm is not null and " ;
	$_SESSION[$session_name_initital . "searchincludewith_photo"] = "checked";
} /*else {
	$que .= " tbldatingusermaster.imagenm is null and ";	
}*/

/*
if(isset($_POST['county']) && $_POST['county']!="")
if ($_POST["county"] != "0.0")
{
	$que .= " tbldatingusermaster.countyid=" . $_POST["county"] . " and " ;
	$_SESSION[$session_name_initital . "searchincludecounty"] = $_POST["county"];
}
//code ended by Nishit
if ((isset($_POST["Country"])) &&  (is_numeric($_POST["Country"])))
if ($_POST["Country"] != "0.0")
{
	$que .= " tbldatingusermaster.countryid=" . $_POST["Country"] . " and " ;
	$_SESSION[$session_name_initital . "searchincludecountry"] = $_POST["Country"];
}
if(isset($_GET['cntry']) && $_GET['cntry']==1){
	$que .= "  tbldatingusermaster.countryid!=113 and "; 	
}
*/
if ($que !="")
{	
	$_SESSION[$session_name_initital . "searchquery"] = $que;
	$_SESSION[$session_name_initital . "searchquery_original"] =$que;
	header("location:searchresult.php");
}
header("location:searchresult.php");
exit;
ob_flush();
?>