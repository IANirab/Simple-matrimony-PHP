<? 

ob_start();
include("commonfile.php");
//echo "123"; exit;
if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']!='') {
	$referrer = $_SERVER['HTTP_REFERER'];	
}
if(isset($_POST['nickname']) && $_POST['nickname']!=''){
	 $_SESSION[$session_name_initital . 'nickname'] = $_POST['nickname'];	
}
if(isset($_POST['reg_name']) && $_POST['reg_name']!=''){
	$_SESSION[$session_name_initital . 'reg_name'] = $_POST['reg_name'];	
}
if(isset($_POST['email']) && $_POST['email']!=''){
	$_SESSION[$session_name_initital . 'email'] = $_POST['email'];	
}
if(isset($_POST['mobile']) && $_POST['mobile']!=''){
	$_SESSION[$session_name_initital . 'mobile'] = $_POST['mobile'];	
}
if(isset($_POST['dobyy']) && $_POST['dobyy']!=''){
	$_SESSION[$session_name_initital . 'dobyy'] = $_POST['dobyy'];	
}
if(isset($_POST['dobmm']) && $_POST['dobmm']!=''){
	$_SESSION[$session_name_initital . 'dobmm'] = $_POST['dobmm'];	
}
if(isset($_POST['dobdd']) && $_POST['dobdd']!=''){
	$_SESSION[$session_name_initital . 'dobdd'] = $_POST['dobdd'];	
}
if(isset($_POST['gender']) && $_POST['gender']!=''){
	$_SESSION[$session_name_initital . 'gender'] = $_POST['gender'];	
}





/*if((isset($_POST['nickname']) && $_POST['nickname']=='') || !isset($_POST['nickname'])){
	$_SESSION[$session_name_initital . 'error1'] = "Please Enter Nickname ";
	header("location:registration.php");
	exit;	
}*/

if((isset($_POST['reg_name']) && $_POST['reg_name']=='') || !isset($_POST['reg_name'])){
	$_SESSION[$session_name_initital . 'error1'] = "Please Enter Full name ";
	header("location:registration.php");
	exit;	
}
if((isset($_POST['email']) && $_POST['email']=='') || !isset($_POST['email'])){
	$_SESSION[$session_name_initital . 'error1'] = "Please Enter Email ";
	header("location:registration.php");
	exit;	
}

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$_SESSION[$session_name_initital . 'error1'] = "Please Enter Valid  Email ";
	header("location:registration.php");
	exit;	
     
}
if((isset($_POST['password']) && $_POST['password']=='') || !isset($_POST['password'])){
	$_SESSION[$session_name_initital . 'error1'] = "Please Enter Password ";
	header("location:registration.php");
	exit;	
}
if((isset($_POST['mobile']) && $_POST['mobile']=='') || !isset($_POST['mobile'])){
	$_SESSION[$session_name_initital . 'error1'] = "Please Enter Mobile ";
	header("location:registration.php");
	exit;	
}
if((isset($_POST['Captcha']) && $_POST['Captcha']=='') || !isset($_POST['Captcha'])){
	$_SESSION[$session_name_initital . 'error1'] = "Please Enter Captcha ";
	header("location:registration.php");
	exit;	
}

/*if((isset($_POST['cmbreligian']) && $_POST['cmbreligian']=='0.0') || !isset($_POST['cmbreligian'])){
	$_SESSION[$session_name_initital . 'error'] = "Please Select Religion ";
	header("location:registration.php");
	exit;	
}*/
$dob = $_POST['dobyy'] . "-" . $_POST['dobmm'] . "-" . $_POST['dobdd'];

$EmailVerificationRequired = findsettingvalue("EmailVerificationRequired");	
if ($EmailVerificationRequired == "N"){
	$emailverified = "Y";		
} else { 
	$emailverified = "N";
}
$checkalreadyregistered = getonefielddata("SELECT count(userid) from tbldatingusermaster where email='".$_POST['email']."' AND currentstatus!=3");
if($checkalreadyregistered!='0'){
	 $_SESSION[$session_name_initital . 'error1'] = 'This email address is already registered.'; 
	header("location:index.php?b=1");	
	exit;
}

$referrer = '';

$action = 0;
$query = sendtogeneratequery($action,"email",$_POST['email'],"Y");
$query .= sendtogeneratequery($action,"name",$_POST['reg_name'],"Y");
$query .= sendtogeneratequery($action,"password",$_POST['password'],"Y");
//$query .= sendtogeneratequery($action,"packageid",1,"Y");
$query .= sendtogeneratequery($action,"nickname",$_POST['nickname'],"Y");
$query .= sendtogeneratequery($action,"genderid",$_POST['gender'],"Y");
$query .= sendtogeneratequery($action,"dob",$dob,"Y");
$query .= sendtogeneratequery($action,"emailverified",$emailverified,"Y");
$query .= sendtogeneratequery($action,"religianid",$_POST['cmbreligian'],"Y");
$query .= sendtogeneratequery($action,"castid",$_POST['cmbcastss'],"Y");
$query .= sendtogeneratequery($action,"country_code",$_POST['country_code'],"Y");
$query .= sendtogeneratequery($action,"mobile",$_POST['mobile'],"Y");	
$query .= sendtogeneratequery($action,"CreateIP",$_SERVER['REMOTE_ADDR'],"Y");
$query .= sendtogeneratequery($action,"currentstatus","1","Y");
$query .= sendtogeneratequery($action,"createdate",date('Y-m-d'),"Y");
$query .= sendtogeneratequery($action,"regpagenm",$referrer,"Y");
$query .= sendtogeneratequery($action,"motherthoungid",$_POST['cmbmothertounge'],"Y");
$query = substr($query,1);
//$sSql = "insert into tbldatingusermaster (email,name,password,packageid,genderid,dob,emailverified,religianid,castid,country_code,mobile,CreateIP,currentstatus,createdate) VALUES (".$query.")";
$sSql = "insert into tbldatingusermaster (email,name,password,nickname,genderid,dob,emailverified,religianid,castid,
country_code,mobile,CreateIP,currentstatus,createdate,regpagenm,motherthoungid) VALUES (".$query.")";
//exit;
execute($sSql);


if($_POST['cmbreligian_other']!='' )
{
	execute("Insert into  tbldatingreligianmaster (title,currentstatus) values ('".$_POST['cmbreligian_other']."','0') ");
	
	$action = getonefielddata("SELECT id from tbldatingreligianmaster where title='".$_POST['cmbreligian_other']."'");
	execute("update tbldatingusermaster set religianid=".$action);
	
}

$userid = getonefielddata("SELECT max(userid) from tbldatingusermaster");
$packageid = findsettingvalue('trialpackageid');
if($packageid==''){
	$packageid=1;	
}
$pkgdata = getdata("SELECT days,no_of_contact_display from tbldatingpackagemaster WHERE packageid=".$packageid);
$pkgrs = mysqli_fetch_array($pkgdata);
$pkgdays = $pkgrs[0];
$contacts = $pkgrs[1];
$expiredate = date('Y-m-d', strtotime("+$pkgdays days"));
if($contacts==''){
	$contacts = 0;	
}
execute("UPDATE tbldatingusermaster SET packageid=".$packageid.", expiredate='".$expiredate."' WHERE userid=".$userid);

if($contacts>0){
	$contacts_sql = "INSERT into tbldating_view_conact_package_user_master SET packageid='".$packageid."',expiredate='".$expiredate."',userid='".$userid."',days='".$pkgdays."',createdate=curdate(),total_contact_can_view='".$contacts."'";
	execute($contacts_sql);
}


if(isset($_POST['gender']) && $_POST['gender']!=''){
	$genderid = $_POST['gender'];
	if ($genderid == 1)
		$genderid = 2;
	else
		$genderid = 1;		
}
execute("insert into tbldatingpartnerprofilemaster (userid,genderid,CreateBy,CreateIP,CreateDate) values ($userid,$genderid,$userid,'" . getip() .  "',now())");	

$profile_code = profile_id_code($userid);
execute("update tbldatingusermaster set profile_code='$profile_code' where userid=$userid");

$exmessage = "";
$exmsg = '';
$emailverificationcode = rand();
$emailverificationcode = $emailverificationcode . $userid;
execute("update tbldatingusermaster set emailverificationcode='$emailverificationcode' where userid=$userid");
$websiteurl = str_replace("index.phpindex.php","",$sitepath);
if ($emailverified == "N")	{
	//$exmessage = "Email Verification Code : $emailverificationcode";
	$exmessage = "$emailverificationcode";
	$exmessage .= "<br><a href='". $websiteurl . "emailverify.php?b=". $emailverificationcode . "'>click here to verify email</a>";
	$exmsg = $exmessage;
}
sendemail(1,$userid,$exmsg);
sendemail(20,"","email address : ".$_POST['email']."<br>password :".$_POST['password']."<br>",findsettingvalue("AdminMail"));

if($sms_module_enable=='Y' && $registration_sms_verification=='Y'){
		if(isset($_POST['mobile']) && $_POST['mobile']!=''){
			$mobile = $_POST['mobile'];
			$message = findsettingvalue("registration_sms_text");
			$verification_link = $websiteurl."emailverify.php?b=". $emailverificationcode;			
			$message = str_replace("[username]",$_POST['reg_name'],$message);
			$message = str_replace("[verificationcode]",$emailverificationcode,$message);
			$message = str_replace("[verificationlink]",$verification_link,$message);	
			//echo $mobile.$message;
		//	if(isset($_POST['country_code']) && $_POST['country_code']!=''){
		//		$c_code = str_replace("+","",$_POST['country_code']);
		//		$mobile = $c_code.$mobile;
		//	}			
			sms_to_send($mobile,$message,0,2);			
		}
	}
$_SESSION[$session_name_initital . 'error1']="";
 unset($_SESSION[$session_name_initital . "error1"]);
unset($_SESSION[$session_name_initital . 'nickname']);
unset($_SESSION[$session_name_initital . 'reg_name']);
unset($_SESSION[$session_name_initital . 'email']);
unset($_SESSION[$session_name_initital . 'password']);
unset($_SESSION[$session_name_initital . 'mobile']);
unset($_SESSION[$session_name_initital . 'dobyy']);
unset($_SESSION[$session_name_initital . 'dobmm']);
unset($_SESSION[$session_name_initital . 'dobdd']);
unset($_SESSION[$session_name_initital.'gender']);
	init_login_session();
    $_SESSION[$session_name_initital . "memberuserid"] = $userid;
    execute("update tbldatingusermaster set lastlogin=now() where userid=". $userid);
	$_SESSION[$session_name_initital . "memberusername"] = $_POST['email'];
   	$_SESSION[$session_name_initital . "membername"] =$_POST['reg_name'];
   	//$_SESSION['SESSION_CHAT_USER_ID'] = findchatuserid($userid);
	 unset($_SESSION[$session_name_initital . "error1"]);
    $_SESSION[$session_name_initital . "error"] = "You have registered successfully";    
	//header("location: registration2.php");
	//header("location: message.php?b=1");
	header("location:updateprofilepersonal.php");
	exit;
	ob_flush();
	
?>