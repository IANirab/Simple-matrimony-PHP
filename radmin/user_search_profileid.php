<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$filenm = "usermanager.php";
$_SESSION[$session_name_initital . "admin_user_search"]="";

if(isset($_POST['section']) && $_POST['section']!='' && $_POST['section']=='proid')
{
		if(isset($_POST['txtprofileid']))
	if($_POST['txtprofileid'] != "")
	{
		if (findsettingvalue("ProfileIdInitials_method") == "M")
		$_SESSION[$session_name_initital . "admin_user_search"] = " concat(upper(substr(tbldatingusermaster.name,1,1)),'-',profile_code) ='" . $_POST['txtprofileid'] . "' and ";
		else
		$_SESSION[$session_name_initital . "admin_user_search"] = "concat('" . findsettingvalue("ProfileIdInitials") . "','-',profile_code)='" .$_POST['txtprofileid'] ."' and ";	
	}		
}

if(isset($_POST['section']) && $_POST['section']!='' && $_POST['section']=='uid')
{
	if(isset($_POST['search_userid']) && $_POST['search_userid']!='' && is_numeric($_POST['search_userid']))
	{
		$_SESSION[$session_name_initital . "admin_user_search"] = " userid='". $_POST['search_userid'] . "' and ";
	}
}




header("location:$filenm");
?>