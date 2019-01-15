<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);

if($role_id!="0"){
	$user_mnager_um_5 = user_mnager_um_5();
} else {
	$user_mnager_um_5 = "N";
}	
if($user_mnager_um_5 == 'Y' || $user_mnager_um_5 == 'N') {	
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;

unset($_SESSION[$session_name_initital . "memberuserid"]);
unset($_SESSION[$session_name_initital . "memberusername"]);
unset($_SESSION[$session_name_initital . "membername"]);
unset($_SESSION[$session_name_initital . 'SESSION_CHAT_USER_ID']);
	
$result = getdata("select userid,name,email from tbldatingusermaster where userid =$action ");
while ($rs = mysqli_fetch_array($result))
{
if (!session_is_registered($session_name_initital . "memberuserid"))
session_is_registered($session_name_initital . "memberuserid");
if (!session_is_registered($session_name_initital . "memberusername"))
session_is_registered($session_name_initital . "memberusername");
if (!session_is_registered($session_name_initital . "membername"))
session_is_registered($session_name_initital . "membername");
if (!session_is_registered($session_name_initital . "SESSION_CHAT_USER_ID"))
session_is_registered($session_name_initital . "SESSION_CHAT_USER_ID");

$_SESSION[$session_name_initital . "memberuserid"] = $action;
$_SESSION[$session_name_initital . "memberusername"] = $rs[2];
$_SESSION[$session_name_initital . "membername"] =$rs[1];
$_SESSION[$session_name_initital . 'SESSION_CHAT_USER_ID'] = findchatuserid($action);
}
freeingresult($result);
if(isset($_GET['cat']) && $_GET['cat']=='partner') {
	header("location:../partnerprofile.php");
} else {
	header("location:../updateprofilepersonal.php");
}	
} else {
	header("location:dashboard.php?msg=no");
}
?>