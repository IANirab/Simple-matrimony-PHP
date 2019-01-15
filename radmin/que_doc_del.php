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
$get_imgnm = getonefielddata("SELECT ImgNm from tblkb_quemaster WHERE cmsid=$action");
if($get_imgnm!=""){
	$sSql ="update tblkb_quemaster set ImgNm='' where cmsid=$action";
	execute($sSql);
	if(file_exists("../uploadfiles/".$get_imgnm)){
		unlink("../uploadfiles/".$get_imgnm);
	}
}

$_SESSION[$session_name_initital . "adminerror"]= "Doc deleted sucessfully";
header("location:$filenm");
?>