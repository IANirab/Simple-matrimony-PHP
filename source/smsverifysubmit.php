<? 
include("commonfile.php");
	$code = $_POST['code'];
	$userid = getonefielddata("SELECT userid from tbldatingusermaster where smsverificationcode='$code' and currentstatus =0 and smsverified !='Y'");
	if($userid == "")
	{
		$_SESSION[$session_name_initital . 'error'] = $emailverifyinvalidcode;
		header("location:verifysms.php");
		exit();
	}
execute("update tbldatingusermaster set smsverified='Y' where userid=$userid");


	if($registration_sms_verification=='N')
	{	
		header("location:message.php?b=83");	
		exit;
	}elseif($registration_sms_verification=='Y')
	{
		header("location:updateprofilepersonal.php");	
		exit;
	}

?>
