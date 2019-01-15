<?

ob_start();
include("commonfile.php");
$EmailAddress = $_POST['txtEmailAddress'];
$Password = $_POST['txtPassword'];

if (isset($_POST['chkrememberme']))
	$rememberme = "Y";
else
	$rememberme = "N";


init_login_session();
if (isset($_GET["b"]))
	$pro = "?b=pro";
else
	$pro ="";

if ($pro != "")
	$filenm = "updateprofilepersonal.php";
elseif (isset($_GET["fnm"]))
{
	$filenm = $_GET["fnm"];
	$filenm = str_replace("*","?",$filenm);
}	
else
	$filenm = "dashboard.php";
	

$mess = $loginmessuserinvalidusernamepassword;
$profileheadline = "";
//$result = getdata("select userid,password,name,profileheadline from tbldatingusermaster where replace(replace(email,'	',''),' ','') ='$EmailAddress' and currentstatus in(" .  activecurrentstatus() . ",4) and emailverified='Y'");

$result = getdata("select userid,password,name,profileheadline,emailverified from tbldatingusermaster where replace(replace(email,'	',''),' ','') ='$EmailAddress' and currentstatus in(" .  activecurrentstatus() . ",4)");
while ($rs = mysqli_fetch_array($result))
{
	if  ($rs[1] == $Password)
   	{
		
		$emailverified = $rs[4];
		//http://90.0.0.150/php/product_work/DemoMatrimony/plresendverification.php
		if($emailverified!='Y'){
			/*$mess = '<a href="'.$sitepath.'plresendverification.php"><img src="'.$sitepath.'/uploadfiles/verification-banner.jpg"></a>';*///$usernotverifiedmsg;
	$mess = 'This Emailaddress is not verified with us.';	
		} else {
			//$_SESSION['SESSION_CHAT_USER_ID'] = findchatuserid($rs[0]);
			$profileheadline = $rs[3];
			$_SESSION[$session_name_initital."memberuserid"] = $rs[0];
			//$_SESSION[$session_name_initital."membername"] = $rs[0];
			$ip = $_SERVER['REMOTE_ADDR'];
			execute("update tbldatingusermaster set lastlogin=now(), lastloginip='".$_SERVER['REMOTE_ADDR']."' where userid=". $rs[0]);
			$_SESSION[$session_name_initital."memberusername"] = $EmailAddress;
			$_SESSION[$session_name_initital."membername"] =$rs[2];
			//if ($rememberme=="Y")
			//	setcookie("$cookienmforusernm", $EmailAddress, time()+3600);
			$mess = "";
		}
	}
  }
freeingresult($result);
if ($mess != ""){
	$_SESSION[$session_name_initital . "error1"]= $mess;	
	header("location:login.php?fnm=$filenm");
	exit();
} else {
	header("location:$filenm");
	exit();
}
ob_flush();
?>