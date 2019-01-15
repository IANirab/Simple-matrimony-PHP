<? session_start();
require_once("commonfileadmin.php");
checkadminlogin();

if(isset($_GET['b']) && $_GET['b']!='')
{
	$userid=$_GET['b'];
}

if(isset($_GET['pgnm']) && $_GET['pgnm']!='')
{
	$pgnm=$_GET['pgnm'];
}

if(isset($_GET['b1']) && $_GET['b1']!='')
{
	$type=$_GET['b1'];
}


	if($type=='email')
	{
			$emailverificationcode = getonefielddata("select emailverificationcode from tbldatingusermaster
			 where userid='".$userid."' ");
			 $exmessage = $emailverificationcode;
			$exmessage .= "<br><a href='". $sitepath . "emailverify.php?b=". $emailverificationcode . "'>click here to verify email</a>";
			$exmsg = $exmessage;			
			sendemail(1,$userid,$exmsg);
			$_SESSION[$session_name_initital . "adminerror"] = "Email Sent";
			header("location:user_manager.php?b1=-1&pgnm=$pgnm");
	}
	
	if($type=='sms')
	{
		 $mobile = getonefielddata("select mobile from tbldatingusermaster
			 where userid='".$userid."' ");
		
		$sms_name = getonefielddata("select name from tbldatingusermaster
			 where userid='".$userid."' ");
		
		$smsverificationcode = getonefielddata("select smsverificationcode from tbldatingusermaster
			 where userid='".$userid."' ");	 	 
			 
		$message = findsettingvalue("registration_sms_text");
		$message = str_replace("[username]",$sms_name,$message);
		$message = str_replace("[verificationcode]",$smsverificationcode,$message);
		sms_to_send($mobile,$message,0,1);
		$_SESSION[$session_name_initital . "adminerror"] = "SMS Sent";
		header("location:user_manager.php?b1=-1&pgnm=$pgnm");
	}


?>