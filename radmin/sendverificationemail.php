<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$userid = 0;
if(isset($_GET['b']) && $_GET['b']>0){
	$userid = $_GET['b'];	
}
$emailverificationcode = getonefielddata("SELECT emailverificationcode from tbldatingusermaster where userid=$userid");
$exmessage = "$emailverificationcode";
$exmessage .= "<br><a href='". $sitepath . "emailverify.php?b=". $emailverificationcode . "'>click here to verify email</a>";
$exmsg = $exmessage;	
sendemail(1,$userid,$exmsg);
$_SESSION[$session_name_initital . "adminerror"] = "Verification email has been sent successfully.";
header("location:".$_SERVER['HTTP_REFERER']);
exit;
?>