<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$_SESSION[$session_name_initital . "session_invoice"] = "";
if (isset($_GET["b"]))
	$clear = $_GET["b"];
else
	$clear = "N";
	

if(isset($_POST['txtprofileid']))
	if($_POST['txtprofileid'] != "")
	{
		if (findsettingvalue("ProfileIdInitials_method") == "M")
		$_SESSION[$session_name_initital . "session_invoice"] = " concat(upper(substr(tbldatingusermaster.name,1,1)),'-',profile_code) ='" . $_POST['txtprofileid'] . "' and ";
		else
		$_SESSION[$session_name_initital . "session_invoice"] = "concat('" . findsettingvalue("ProfileIdInitials") . "','-',profile_code)='" .$_POST['txtprofileid'] ."' and ";	
	}
header("location:invoicemager.php?b=$clear");
?>