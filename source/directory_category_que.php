<?

ob_start();
require_once("commonfile.php");

if (!isset($_SESSION[$session_name_initital . "directory_searchquery"]))
{
	//session_register($session_name_initital . "directory_searchquery");
	$_SESSION[$session_name_initital . "directory_searchquery"] = "";
}
$catid = find_querystr_array_id("b");

$que = "";

if ($catid != "")
{
$que .= "(tbl_directory_master.categoryid =$catid ) and ";
$result = getdata("select meta_description,meta_keyword,title from tbl_directory_category_master where categoryid=$catid");
while ($rs = mysqli_fetch_array($result))
{	
	$_SESSION[$session_name_initital . "directory_meta_desc"]=$rs[0];
	$_SESSION[$session_name_initital . "directory_meta_keyword"]=$rs[1];
	$_SESSION[$session_name_initital . "directory_pgtitle"]=$rs[2];
	
}
	freeingresult($result);

}
if ($que !="")
{
	$_SESSION[$session_name_initital . "directory_searchquery"] = $que;
	$filenm = $sitepath . "directory_search_result.php";
	header("location:$filenm");
}
ob_flush();
?>