<? ob_start();
$version = 'mobile';
require_once("dbinclude/function.php");
include_once("dbinclude/datingcommonfunction.php");
include_once("dbinclude/bannerclass.php");
include_once("dbinclude/cms.php");
include_once("captcha/captch_common.php");
if($sms_module_enable=='Y')
{
	include_once("dbinclude/routesmsfunction.php");	
}

//code started for ban ip
$ip_b = $_SERVER['REMOTE_ADDR'];
	$getbanlist = getonefielddata("SELECT ip from tbl_banned_ip_master WHERE ip='".$ip_b."' AND currentstatus=0");	
	if($getbanlist!=""){
		$retfile = $sitepath."banned_ip.php";
		header("location:$retfile");
		exit;
	} 
	$sitethemepath='';
//code ended for ban ip	
$objbanner  = new banner();


$siteimagepath = $sitepath."assets/$sitethemefolder/";
$curruserid = getuserid();
$profiletoplinkpersonal_css_classs="profilenavnumber";
$profiletoplinkinterest_css_classs="profilenavnumber"; 
$profiletoplinksocial_css_classs="profilenavnumber";
$profiletoplinkcontact_css_classs="profilenavnumber";
$profiletoplinkeducation_css_classs="profilenavnumber";
$profiletoplinklifestyle_css_classs="profilenavnumber";
$profiletoplinkpicture_css_classs="profilenavnumber";
$profiletoplinkother_css_classs="profilenavnumber";
$profiletoplinkpartner_css_classs="profilenavnumber";
$profiletoplinkadvancefly_css_classs="profilenavnumber";

$sitetitle = findsettingvalue("HomePage_Meta");
//$pth = "pthpthpth";
if(!isset($_SESSION[$session_name_initital . "search_grid_design_display"]))
{
	$_SESSION[$session_name_initital . "search_grid_design_display"]="d";
}
if (!isset($_SESSION[$session_name_initital . "searchincludelookingfor"]))
{
	$_SESSION[$session_name_initital . "searchincludelookingfor"] = "";
}
if (!isset($_SESSION[$session_name_initital . "searchincludeminage"]))
{
	$_SESSION[$session_name_initital . "searchincludeminage"] = "18";
}
if (!isset($_SESSION[$session_name_initital . "searchincludemaxage"]))
{
	$_SESSION[$session_name_initital . "searchincludemaxage"] = "30";
}
if (!isset($_SESSION[$session_name_initital . "searchincludecountry"]))
{
	$_SESSION[$session_name_initital . "searchincludecountry"] = "";
}
if (!isset($_SESSION[$session_name_initital . "searchincludereligian"]))
{
	$_SESSION[$session_name_initital . "searchincludereligian"] = "0";
}
if (!isset($_SESSION[$session_name_initital . "searchincludecommunity"]))
{
	$_SESSION[$session_name_initital . "searchincludecommunity"] = "";
}
if (!isset($_SESSION[$session_name_initital . "searchincludewith_photo"]))
{
	$_SESSION[$session_name_initital . "searchincludewith_photo"] = "";
}
if (!isset($_SESSION[$session_name_initital . "searchquery"]))
{
	$_SESSION[$session_name_initital . "searchquery"] = "";
}
if (!isset($_SESSION[$session_name_initital . "searchquery_original"]))
{
	$_SESSION[$session_name_initital . "searchquery_original"] = "";
}
$country_selected = findsettingvalue('preselected_country');
$state_selected = findsettingvalue('preselected_state');

function remove_numbers($string) {
	$vowels = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
  	$string = str_replace($vowels, '*', $string);
  	return $string;
}
//$agent_module_enable = "Y";
if ($agent_module_enable == "Y")
{
	include_once("dbinclude/agent.php");
}
$scrname = $_SERVER['SCRIPT_NAME'];
$chkstr_scrname = strstr($scrname,"index.php");

// update login  modify time - for check if online or not (chat messanger)
if(isset($_SESSION[$session_name_initital . "memberuserid"]) && $_SESSION[$session_name_initital . "memberuserid"]!='')
{
	activity_log($_SESSION[$session_name_initital . "memberuserid"],1,2);
}
?>

        