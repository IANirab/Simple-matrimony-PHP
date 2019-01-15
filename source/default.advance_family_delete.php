<?php ob_start();
include_once("commonfile.php");
checklogin($sitepath);
$ip = getip();
$action = $curruserid;

	execute("UPDATE `tbldating_advancefamily` SET `currentstatus`='3' WHERE type='".$_POST['type_d']."'
	and ftype='".$_POST['ftype_d']."' and userid='".$_POST['userid_d']."' and no='".$_POST['no_d']."' ");

		header("location:advance_family.php");
exit;
?>