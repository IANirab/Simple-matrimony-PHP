<? ob_start();
include("commonfile.php");
if (isset($_POST["searchgridsortby"]))
{
	searchresultsortby($_POST["searchgridsortby"]);
	$_SESSION[$session_name_initital . "filter_sortby"]=$_POST["searchgridsortby"];
}else{$_SESSION[$session_name_initital . "filter_sortby"]='';}
 $filenm = $_POST["searchgridfilenmsort"];	 
header("location:searchresult.php");
ob_flush();
?>