<?
ob_start();

require_once('commonfile.php');
checklogin($sitepath);
if(isset($_GET['b']))
{
	execute("update tbldatingalbummaster set currentstatus = 2 where albumid =" . $_GET['b'] ." and CreateBy=$curruserid");
	$_SESSION[$session_name_initital . 'error'] =$deletemess;
}
header("location:albummaster.php");
ob_flush();
?>