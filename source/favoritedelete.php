<?

ob_start();
require_once('commonfile.php');
checklogin($sitepath);
if(isset($_GET['b']))
{
	execute("delete from tbldatingshortlistmaster where ShortlistId =" . $_GET['b'] . " and CreateBy=$curruserid");
	$_SESSION['error'] =$deletemess;
}
header("location:favoritemanager.php");
ob_flush();
?>