<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$action = "0";
if(isset($_GET['b']) && $_GET['b']!=""){
	$action = $_GET['b'];
}

$img_nm = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=".$action);
if($img_nm!=""){
	if(file_exists("../uploadfiles/".$img_nm)){		
		unlink("../uploadfiles/".$img_nm);
	}
	execute("UPDATE tbldatingsettingmaster SET fldval='' WHERE settingid=".$action);
}
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:website_settingmaster.php");
?>