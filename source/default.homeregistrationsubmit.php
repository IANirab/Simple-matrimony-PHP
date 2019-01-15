<? 
include("commonfile.php");

$private_contact_enable = findsettingvalue("private_contact_details");
$stfmaxuserid = getonefielddata("SELECT max(userid) from tbldatingusermaster WHERE staff_agentid!=''");
$shouldnotstaff_agentid = getonefielddata("SELECT staff_agentid from tbldatingusermaster WHERE 
userid='".$stfmaxuserid."' ");
if($shouldnotstaff_agentid==''){
	$shouldnotstaff_agentid = 0;	
}

$shouldbestaff_agentid = getonefielddata("SELECT loginid from tbldatingadminloginmaster WHERE Loginid not in (1,".$shouldnotstaff_agentid.") order by rand()");
if (isset($_SESSION[$session_name_initital . "memberuserid"]))
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
if(isset($_POST['staff_agent'])){
		$staff_agentid = $_POST['staff_agent'];
	} else {
		$staff_agentid = "";
	}
	if(isset($_POST['staff_collection'])){
		$staff_collection = $_POST['staff_collection'];
	} else {
		$staff_collection = "";
	}
	
	if(isset($_POST['staff_contact'])){
		$staff_contact = $_POST['staff_contact'];
	} else {
		$staff_contact = "";
	}
	
	if(isset($_POST['staff_relation'])){
		$staff_relation = $_POST['staff_relation'];
	} else {
		$staff_relation = "";
	}
if((isset($_POST['nickname']) && $_POST['nickname']=='') || !isset($_POST['nickname'])){
	//echo "nickname";exit;
	$_SESSION[$session_name_initital . 'error1'] = "Please Enter Nickname ";
	header("location:registration.php");
	exit;	
}
if((isset($_POST['reg_name']) && $_POST['reg_name']=='') || !isset($_POST['reg_name'])){
	//echo "regname";exit;
	$_SESSION[$session_name_initital . 'error1'] = "Please Enter Full name ";
	header("location:registration.php");
	exit;	
}
if((isset($_POST['email']) && $_POST['email']=='') || !isset($_POST['email'])){
	//echo "email";exit;
	$_SESSION[$session_name_initital . 'error1'] = "Please Enter Email ";
	header("location:registration.php");
	exit;	
}

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	//echo "email";exit;
	$_SESSION[$session_name_initital . 'error1'] = "Please Enter Valid  Email ";
	header("location:registration.php");
	exit;	
     
}
if((isset($_POST['password']) && $_POST['password']=='') || !isset($_POST['password'])){
	//echo "password";exit;
	$_SESSION[$session_name_initital . 'error1'] = "Please Enter Password ";
	header("location:registration.php");
	exit;	
}
if((isset($_POST['mobile']) && $_POST['mobile']=='') || !isset($_POST['mobile'])){
	//echo "mobile";exit;
	$_SESSION[$session_name_initital . 'error1'] = "Please Enter Mobile ";
	header("location:registration.php");
	exit;	
}


$_SESSION[$session_name_initital . "staff_agentid"]= $staff_agentid;
	$_SESSION[$session_name_initital . "staff_collection"]= $staff_collection;
	$_SESSION[$session_name_initital . 'staff_contact'] = $staff_contact;
	$_SESSION[$session_name_initital . "staff_relation"]= $staff_relation;

/*if((isset($_POST['cmbreligian']) && $_POST['cmbreligian']=='0.0') || !isset($_POST['cmbreligian'])){
	$_SESSION[$session_name_initital . 'error'] = "Please Select Religion ";
	header("location:registration.php");
	exit;	
}*/

if ($agent_module_enable == "Y")
	if(isset($_POST['agent_code']) && $_POST['agent_code']!="") {
		$_SESSION[$session_name_initital . "register_agent_code"]=$_POST["agent_code"];
	}
 $dob = $_POST['dobyy'] . "-" . $_POST['dobmm'] . "-" . $_POST['dobdd']; 

$EmailVerificationRequired = findsettingvalue("EmailVerificationRequired");	
if ($EmailVerificationRequired == "N"){
	$emailverified = "Y";		
} else { 
	$emailverified = "N";
}
$checkalreadyregistered = getonefielddata("SELECT count(userid) from tbldatingusermaster where email='".$_POST['email']."' ");

if($checkalreadyregistered!=0){
//	 $_SESSION[$session_name_initital . 'error1'] = 'This email address is already registered.'; 
	echo "fail"; exit;
	
}
$referrer = '';

$affiliateuid = "";
	
	if ($agent_module_enable == "Y")
	{	

	
	if(isset($_POST['agent_code']) && $_POST['agent_code']!='')
	{
		$agent_code=$_POST['agent_code'];
	}
	else{$agent_code='';}
	
	if(isset($_COOKIE['afft_statid']) && $_COOKIE['afft_statid'])
	{
		$affiliateuid = $_COOKIE['afft_statid'];	
	}
	
	if($staff_agentid!='' && isset($staff_agentid))
	{
		$staff_agentid=$staff_agentid;
	}
	else
	{$staff_agentid = getonefielddata("SELECT agentid from tbl_agent_master
			 WHERE agent_code='".$agent_code."' ");
	}
	
	}
	if(isset($_POST['cmbcastss']) && $_POST['cmbcastss'])
	{ $cmbcastss=$_POST['cmbcastss'];}
	else{$cmbcastss='';}
	
		if(isset($_POST['cmbreligian']) && $_POST['cmbreligian'])
	{ $cmbreligian=$_POST['cmbreligian'];}
	else{$cmbreligian='';}
	
	

$action = 0;
$query = sendtogeneratequery($action,"email",$_POST['email'],"Y");
$query .= sendtogeneratequery($action,"name",$_POST['reg_name'],"Y");
$query .= sendtogeneratequery($action,"password",$_POST['password'],"Y");
//$query .= sendtogeneratequery($action,"packageid",1,"Y");
$query .= sendtogeneratequery($action,"nickname",$_POST['nickname'],"Y");
$query .= sendtogeneratequery($action,"genderid",$_POST['gender'],"Y");
$query .= sendtogeneratequery($action,"dob",$dob,"Y");
$query .= sendtogeneratequery($action,"emailverified",$emailverified,"Y");
$query .= sendtogeneratequery($action,"religianid",$cmbreligian,"Y");
$query .= sendtogeneratequery($action,"castid",$cmbcastss,"Y");
$query .= sendtogeneratequery($action,"country_code",$_POST['country_code'],"Y");
$query .= sendtogeneratequery($action,"mobile",$_POST['mobile'],"Y");	
$query .= sendtogeneratequery($action,"CreateIP",$_SERVER['REMOTE_ADDR'],"Y");
$query .= sendtogeneratequery($action,"currentstatus","0.0","Y");
$query .= sendtogeneratequery($action,"createdate",date('Y-m-d'),"Y");
$query .= sendtogeneratequery($action,"regpagenm",$referrer,"Y");
$query .= sendtogeneratequery($action,"staff_agentid",$staff_agentid,"Y");
$query .= sendtogeneratequery($action,"staff_collection",$staff_collection,"Y");
$query .= sendtogeneratequery($action,"staff_contact",$staff_contact,"Y");
$query .= sendtogeneratequery($action,"staff_relation",$staff_relation,"Y");
$query .= sendtogeneratequery($action,"affiliateuid",$affiliateuid,"Y");	
$query = substr($query,1);
//$sSql = "insert into tbldatingusermaster (email,name,password,packageid,genderid,dob,emailverified,religianid,castid,country_code,mobile,CreateIP,currentstatus,createdate) VALUES (".$query.")";
 $sSql = "insert into tbldatingusermaster (email,name,password,nickname,genderid,dob,emailverified,religianid,
castid,country_code,mobile,CreateIP,currentstatus,createdate,regpagenm,staff_agentid,staff_collection,staff_contact,
staff_relation,affiliateuid) VALUES (".$query.")"; 

//exit;
execute($sSql);
$userid = getonefielddata("SELECT max(userid) from tbldatingusermaster");
activity_log($userid,1,1);
$packageid = findsettingvalue('trialpackageid');
if($packageid==''){
	$packageid=1;	
}
$pkgdata = getdata("SELECT days,no_of_contact_display,express_count,ecard_count
 from tbldatingpackagemaster WHERE packageid='".$packageid."' ");
$pkgrs = mysqli_fetch_array($pkgdata);
$pkgdays = $pkgrs[0];
$contacts = $pkgrs[1];
$express_count = $pkgrs[2];
$ecard_count = $pkgrs[3];
$expiredate = date('Y-m-d', strtotime("+$pkgdays days"));
if($contacts==''){
	$contacts = 0;	
}
execute("UPDATE tbldatingusermaster SET packageid=".$packageid.", expiredate='".$expiredate."',
express_count='".$express_count."', ecard_count='".$ecard_count."'
WHERE userid='".$userid."' ");

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
$websiteurl = str_replace("index.php","",$sitepath);
if ($emailverified == "N")	{
	//$exmessage = "Email Verification Code : $emailverificationcode";
	$exmessage = "$emailverificationcode";
	$exmessage .= "<br><a href='". $websiteurl . "emailverify.php?b=". $emailverificationcode . "'>click here to verify email</a>";
	$exmsg = $exmessage;
}

sendemail(1,$userid,$exmsg);
sendemail(20,"","email address : ".$_POST['email']."<br>password :".$_POST['password']."<br>",findsettingvalue("AdminMail"));




if($sms_module_enable=='Y' && $registration_sms_verification=='Y'){  
	//$emailverificationcode = rand();
//$emailverificationcode = $emailverificationcode . $userid;	
$rnd = substr(rand(0,99999),0,4);
$smsverificationcode = $rnd;
execute("update tbldatingusermaster SET smsverificationcode='".$smsverificationcode."' WHERE userid=".$userid);
		if(isset($_POST['mobile']) && $_POST['mobile']!=''){
			$mobile = $_POST['mobile'];
			$message = findsettingvalue("registration_sms_text");
			//$verification_link = $websiteurl."emailverify.php?b=". $emailverificationcode;			
			$message = str_replace("[username]",$_POST['reg_name'],$message);
			$message = str_replace("[verificationcode]",$smsverificationcode,$message);
			//$message = str_replace("[verificationlink]",$verification_link,$message);	
			
			
			
			//if(isset($_POST['country_code']) && $_POST['country_code']!=''){
				//$c_code = str_replace("+","",$_POST['country_code']);
			//	$mobile = $c_code.$mobile;
			//}			
			
			sms_to_send($mobile,$message,0,1);			
		}
	}


	if ($agent_module_enable == "Y")
	{	

		if(isset($_POST['agent_code']) && $_POST['agent_code']!=""){
			$agentid = register_user_for_agent($userid,$_POST["agent_code"]);
			
		
			$_SESSION[$session_name_initital . "register_agent_code"]="";
			unset($_SESSION[$session_name_initital . "register_agent_code"]);
			
		}
		if(isset($_POST['comment']) && $_POST['comment']!=''){			
			execute("UPDATE tbl_agent_user_master SET comment='".$_POST['comment']."' WHERE userid=".$userid);
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
	//echo "completed";exit;
	  
	  //exit();
	
//	header("Location: ".SITEPATH."updateprofilepersonal.php");
	//die();

	if($registration_sms_verification=='N')
	{	
		echo 'Success';
		exit;
	}elseif($registration_sms_verification=='Y')
	{
		echo 'SMS';
		exit;
	}
	
	ob_end_flush();
?>