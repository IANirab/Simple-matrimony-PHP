<?php

ob_start();
require_once('commonfile.php');
if (isset($_POST["txtprofileid"]))
{
	
if ($_POST["txtprofileid"] != "")
{
	$txtprofileid = check_lalid_length_input($_POST["txtprofileid"]);
	if (findsettingvalue("ProfileIdInitials_method") == "M")
		$userid= getonefielddata("select userid from tbldatingusermaster where currentstatus=0 AND concat(upper(substr(name,1,1)),'-',profile_code)='" . $_POST["cmbalph"] . "-" . $txtprofileid ."'");
	else
		$userid= getonefielddata("select userid from tbldatingusermaster where profile_code='" .$txtprofileid ."' AND currentstatus=0");
	if ($userid != "")
	{
		header("location:". $sitepath . "displayprofiles/$userid");
		exit();
	}
}
} 
?>

<script>
alert("No Result Found");
window.location="index.php";
</script>

<?
//header("location:". $sitepath . "dashboard.php");
ob_flush();
?>