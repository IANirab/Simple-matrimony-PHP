<?

ob_start();
include_once("commonfile.php");
checklogin($sitepath);
$action = $curruserid;
if(isset($_FILES['uploadhoroscope']['name']) && $_FILES['uploadhoroscope']['name']!=""){
	upload_user_horoscope("uploadhoroscope",$curruserid);
	/*echo $_FILES['uploadhoroscope']['name'];
	exit;*/
}
$_SESSION[$session_name_initital . "error"] = $messageerrmess119;
header("location:updatehoroscope.php");
ob_flush();
?>