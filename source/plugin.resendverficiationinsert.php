<?
 
ob_start();
include("commonfile.php");
$email = '';
if(isset($_POST['txtEmailAddress']) && $_POST['txtEmailAddress']!=''){
	$email = $_POST['txtEmailAddress'];	
}
if($email!=''){	
	$userdata = getdata("SELECT userid,emailverified,emailverificationcode from tbldatingusermaster WHERE currentstatus=0 AND email='".$email."'");
	if(mysqli_num_rows($userdata)>0){
		$userrs = mysqli_fetch_array($userdata);
		$userid = $userrs[0];
		$emailverified = $userrs[1];
		$emailverificationcode = $userrs[2];
		if($emailverified=='Y'){
			$_SESSION[$session_name_initital . "error"] = $sessionmsg2;
			header("location:plresendverification.php");		
			exit;
		} else {
			$exmessage = "$emailverificationcode";
			$exmessage .= "<br><a href='". $sitepath . "emailverify.php?b=". $emailverificationcode . "'>click here to verify email</a>";
			$exmsg = $exmessage;				
			sendemail(1,$userid,$exmsg);
			$_SESSION[$session_name_initital . "error"] = $sessionmsg3;
			header("location:plresendverification.php");		
			exit;
			
			
		}			
	} else {
		$_SESSION[$session_name_initital . "error"] = $sessionmsg1;
	}
}
header("location:plresendverification.php");		
exit;
ob_flush();
?>