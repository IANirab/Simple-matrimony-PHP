<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$status = $_GET["b"];
else
	$status = "";
if ((isset($_GET["b2"])) && ($_GET["b2"] != ""))
	$b2 = $_GET["b2"];
else
	$b2 = "";

$filenm = "usermanager.php";
$_SESSION[$session_name_initital . "admin_user_search"]="";
$search_query = "";
if(isset($_POST['LookingFor']) && $_POST['LookingFor']!=0)
	$search_query .= " genderid =" . $_POST['LookingFor'] . " and ";
if(isset($_POST['MinAge']))
	$search_query .= " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) >= " . $_POST["MinAge"] . " and " ;
if(isset($_POST['religion']) && $_POST['religion']!='0.0'){
	$search_query.= " tbldatingusermaster.religianid=".$_POST['religion']." AND ";
}
if(isset($_POST['cast']) && $_POST['cast']!='0.0'){
	$search_query.= " tbldatingusermaster.castid=".$_POST['cast']." AND ";
}
if(isset($_POST['MaxAge']))
	$search_query .= " round((to_days(curdate()) - to_days(tbldatingusermaster.dob))/365) <= " . $_POST["MaxAge"] . " and " ;

if ((isset($_POST["Country"])) &&  (is_numeric($_POST["Country"])))
if ($_POST["Country"] != "0.0")
	$search_query .= " tbldatingusermaster.countryid=" . $_POST["Country"] . " and " ;

if (isset($_POST["txtkeyword"]))
if ($_POST["txtkeyword"] != "")
{
	$keyword = $_POST["txtkeyword"];
	$search_query .= " (email like '%".$keyword."%' or name like '%".$keyword."%' or 
	mobile like '%".$keyword."%' or nickname like '%".$keyword."%') and ";
}	
$_SESSION[$session_name_initital . "admin_user_search"] = $search_query;
header("location:$filenm");
?>