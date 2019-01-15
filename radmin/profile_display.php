<?
session_start();
require_once("commonfileadmin.php");
//checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];


$profile_code2 = $_POST['profile_code2'];


$profile_code1 = $_POST['profile_code1'];

$userid= $_POST['userid1'];

$userid1 = getonefielddata("select userid from  tbldatingusermaster where profile_code='".$profile_code2."'");

if($userid1=="")
{
	header("location:message.php?b=104");
}


$genderid = getonefielddata("select genderid from  tbldatingusermaster where userid='".$userid."'");
$maleid ='';
if($genderid=="2")
{
	$femaleid=display_profile_code($userid);
}
if($genderid=="1")
{
	$maleid=display_profile_code($userid);
}

$genderid1 = getonefielddata("select genderid from  tbldatingusermaster where userid='".$userid1."'");

if($genderid1=="2")
{
	$femaleid=display_profile_code($userid1);
}
if($genderid1=="1")
{
	$maleid=display_profile_code($userid1);
}


echo $femaleid."~".$maleid;
//echo header("location:http://mazhavilmatrimony.com/JatakaMatch/match.php?fid='".$femaleid."'&mid='".$maleid."'&lang=eng");
exit;
?>


