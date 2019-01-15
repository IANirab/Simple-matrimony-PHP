<? ob_start();
require_once("../dbinclude/function.php");
require_once("../dbinclude/datingcommonfunction.php");
include("classsettingadmin.php");
include("../dbinclude/role_functions.php");
if($sms_module_enable=="Y") 
{
	include("../dbinclude/routesmsfunction.php");
}	
if ($agent_module_enable == "Y")
{
require_once("../dbinclude/agent.php");
}

$mainfoldernm =$default_folder_name;	
if (!isset($_SESSION[$session_name_initital . "adminerror"]))
	$_SESSION[$session_name_initital . "adminerror"] = "";

if (!isset($_SESSION[$session_name_initital . "admin_user_search_profileid"]))
{
	$_SESSION[$session_name_initital . "admin_user_search_profileid"] = '';	
	//$_SESSION[$session_name_initital . "admin_user_search"]="";
	//$_SESSION["admin_user_search"]="";
}
?>