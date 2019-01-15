<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action=0;
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
$filenm = 'quemaster.php?b='.$action;	
$get_imgnm = getonefielddata("SELECT img_path from tblkb_quemaster WHERE cmsid=$action");
if($get_imgnm!=""){
	$sSql ="update tblkb_quemaster set img_path='' where cmsid=$action";
	execute($sSql);
	
	if(file_exists($get_imgnm)){
		unlink($get_imgnm);
	}
}
$_SESSION[$session_name_initital . "adminerror"] = "Image deleted sucessfully";
header("location:$filenm");
?>