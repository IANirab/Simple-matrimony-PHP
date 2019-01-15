<?php
session_start();
ob_start();
include_once("commonfile.php");
checklogin($sitepath);
echo $action = $curruserid;
$valid =0;
if ((isset($_POST["txtoldpass"])) && (isset($_POST["txtnewpass"])))
{
$oldpass = getonefielddata("SELECT password FROM tbldatingusermaster where userid=$action");
if ($oldpass == $_POST["txtoldpass"])
{
	execute("update tbldatingusermaster set password ='" . str_replace("'","''",check_lalid_length_input($_POST["txtnewpass"])) . "' where userid=$action");
	$valid =1;
	header("location:message.php?b=16");
	exit();
}
}
if ($valid == 0)
{
	$_SESSION[$session_name_initital . "error"] = $updateprofilechangepasswordmess;
	header("location:privacy_settings.php?t=2");
}
ob_flush();
?>