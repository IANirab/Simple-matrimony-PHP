<?

ob_start();
include("commonfile.php");
$EmailAddress = $_POST['txtEmailAddress'];
$mess = $forgotpwdmessuserinvalid;
if ($EmailAddress != "" ){	
	$userid = getonefielddata("select userid from tbldatingusermaster where email ='$EmailAddress' and currentstatus in(" .  activecurrentstatus() . ",4)");	
	if ($userid !=0){
		$mess = $forgotpwdmessuservalid;
		sendemail(6,$userid,"");
	} 
}
$_SESSION[$session_name_initital . "error"]= $mess;
header("location:forgotpassword.php");
ob_flush();
?>