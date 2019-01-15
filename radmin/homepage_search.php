<? session_start();
require_once("commonfileadmin.php");
checkadminlogin();

$_SESSION[$session_name_initital . "admin_home_image"]="";

if (isset($_POST["page"]) && $_POST["page"]!='')
{
	$page = $_POST["page"];
}	
$_SESSION[$session_name_initital . "admin_home_image"] = $page;
