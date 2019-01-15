<?

ob_start();
include("commonfile.php");
	$code = $_POST['code'];
	$userid = getonefielddata("SELECT userid from tbldatingusermaster where 
	emailverificationcode='$code' and currentstatus IN (0,1) and emailverified='N'");
	if($userid == "")
	{
		$_SESSION[$session_name_initital . 'error'] = $emailverifyinvalidcode;
		header("location:emailverify.php");
		exit();
	}
execute("update tbldatingusermaster set emailverified='Y' where userid=$userid");
header("location:message.php?b=2");	
ob_flush();
?>