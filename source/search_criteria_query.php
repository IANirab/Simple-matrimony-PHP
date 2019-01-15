<? ob_start();
require_once("commonfile.php");
checklogin($sitepath);
$_SESSION[$session_name_initital . "searchquery"] = "";
if(isset($_GET['b']))
{
	$criteria_id = $_GET['b'];
	$serch_query = getonefielddata("select search_query from tbl_user_search_criteria_master where criteria_id=$criteria_id and currentstatus=0");
	if ($serch_query != "")
	{
	//	$serch_query_arr=explode('and',$serch_query);
//		
//		$find_rel=strrpos($serch_query_arr[3],"religianid ");
//		if($find_rel>0)
//		{
//			echo substr($serch_query_arr[3],-5);
//			
//		}
//		 $serch_query_arr[3]; exit;
//		
		$_SESSION[$session_name_initital . "filter_searchquery"]='';
		$_SESSION[$session_name_initital . "searchquery"] = $serch_query; 
		$_SESSION[$session_name_initital . "searchquery_original"] =$serch_query;
		header("location:searchresult.php");
		exit();
	}
}
header("location:search_crieteria_manager.php");
exit();
ob_flush();
?>