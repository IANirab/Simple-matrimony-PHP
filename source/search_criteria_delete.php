<?

ob_start();
require_once("commonfile.php");
checklogin($sitepath);
if(isset($_GET['b']))
{
	$criteria_id = $_GET['b'];
	execute("delete from tbl_user_search_criteria_master where criteria_id=$criteria_id");
	$_SESSION[$session_name_initital . 'error'] =$deletemess;
}
header("location:search_crieteria_manager.php");
exit();
ob_flush();
?>