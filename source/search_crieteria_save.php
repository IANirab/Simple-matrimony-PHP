<? include("commonfile.php");
if (isset($_POST["save_search_crieteria_query"]) && $_POST["save_search_crieteria_query"] != "")
{
	$action =0;
	
	$query = sendtogeneratequery($action,"title",$_POST["search_criteria_title"],"Y");
	$query .= sendtogeneratequery($action,"search_query",$_POST["save_search_crieteria_query"],"Y");
	$query .= sendtogeneratequery($action,"createby",$curruserid ,"Y");
	$query .= sendtogeneratequery($action,"userid",$curruserid ,"Y");
	$query .= sendtogeneratequery($action,"createip",getip(),"Y");
	$query = substr($query,1);

	execute("insert into tbl_user_search_criteria_master (title,search_query,createby,userid,createip,createdate) values(" . $query .",now())");
	
}
header("location:message.php?b=71");
ob_flush();
?>