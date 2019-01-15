<?
ob_start();
include("commonfile.php");

$EmailAddress='';
$Password='';

if(isset($_POST['txtEmailAddress1']) && $_POST['txtEmailAddress1']!='')
{
	$EmailAddress =$_POST['txtEmailAddress1'];
	$EmailAddress=ltrim($EmailAddress," ");
	$EmailAddress=rtrim($EmailAddress," ");
}

if(isset($_POST['txtPassword1']) && $_POST['txtPassword1']!='')
{
	$Password =$_POST['txtPassword1'];
	$Password=ltrim($Password," ");
	$Password=rtrim($Password," ");
}

if(isset($_POST['chkrememberme1']) && $_POST['chkrememberme1']!='')
{
	$rememberme ="Y";
}else{$rememberme = "N";}


init_login_session();
$mess = $loginmessuserinvalidusernamepassword;
$profileheadline = "";
$count = getonefielddata("select count(userid) from tbldatingusermaster where email='".$EmailAddress."' and
password='".$Password."' ");
if($count==0)
{
	  echo "Invalid email address or password!"; exit;
}
$result = getdata("select userid,password,name,profileheadline,emailverified,email from tbldatingusermaster where replace(replace(email,'	',''),' ','') ='$EmailAddress' and currentstatus in(" .  activecurrentstatus() . ",4)");

while ($rs = mysqli_fetch_array($result))
{ 
	if  ($rs[1] == $Password)
   	{
		$emailverified = $rs[4];
		if($emailverified!='Y')
		{
			echo 'This Emailaddress is not verified with us.';	exit;
		}
		else 
		{
		
			$profileheadline = $rs[3];
			$_SESSION[$session_name_initital."memberuserid"] = $rs[0];
			activity_log($rs[0],1,1);
			$ip = $_SERVER['REMOTE_ADDR'];
			execute("update tbldatingusermaster set lastlogin=now(), lastloginip='".$_SERVER['REMOTE_ADDR']."' where userid=". $rs[0]);
			$_SESSION[$session_name_initital."memberusername"] = $EmailAddress;
			$_SESSION[$session_name_initital."membername"] =$rs[2];
			
			if($registration_sms_verification=='Y')
			{
				$smsverified = getonefielddata("select smsverified from tbldatingusermaster where 
				userid='".$rs[0]."' ");
				if($smsverified=='N')
				{
					echo "SMS"; exit;
				}
			}
			echo "Sucess"; exit;
			
		}
	}
}
freeingresult($result); 
ob_flush();
?>