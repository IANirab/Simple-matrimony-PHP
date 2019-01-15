<?php 

ob_start();
include("commonfile.php");

if(isset($_POST['name']) && $_POST['name']!=''){
	$_SESSION[$session_name_initital . 'agentname'] = $_POST['name'];		
}

if(isset($_POST['email']) && $_POST['email']!=''){
	$_SESSION[$session_name_initital . 'agentemail'] = $_POST['email'];		
}

if(isset($_POST['altemail']) && $_POST['altemail']!=''){
	$_SESSION[$session_name_initital . 'agentaltemail'] = $_POST['altemail'];		
}

if(isset($_POST['city']) && $_POST['city']!=''){
	$_SESSION[$session_name_initital . 'agentcity'] = $_POST['city'];		
}

if(isset($_POST['phone']) && $_POST['phone']!=''){
	$_SESSION[$session_name_initital . 'agentphone'] = $_POST['phone'];		
}

if(isset($_POST['address']) && $_POST['address']!=''){
	$_SESSION[$session_name_initital . 'agentaddress'] = $_POST['address'];		
}

if(isset($_POST['mobile']) && $_POST['mobile']!=''){
	$_SESSION[$session_name_initital . 'agentmobile'] = $_POST['mobile'];		
}

if(isset($_POST['website']) && $_POST['website']!=''){
	$_SESSION[$session_name_initital . 'agentwebsite'] = $_POST['website'];		
}

if(isset($_POST['zipcode']) && $_POST['zipcode']!=''){
	$_SESSION[$session_name_initital . 'agentzipcode'] = $_POST['zipcode'];		
}

if(isset($_POST['state']) && $_POST['state']!=''){
	$_SESSION[$session_name_initital . 'agentstate'] = $_POST['state'];		
}

if(isset($_POST['cmbcountryid']) && $_POST['cmbcountryid']!=''){
	$_SESSION[$session_name_initital . 'agentcountry'] = $_POST['cmbcountryid'];		
}

if(isset($_POST['referedid']) && $_POST['referedid']!=''){
	$_SESSION[$session_name_initital . 'agentreferedid'] = $_POST['referedid'];		
}

if(isset($_POST['referedby']) && $_POST['referedby']!=''){
	$_SESSION[$session_name_initital . 'agentreferedby'] = $_POST['referedby'];		
}

if($_POST['hiddencaptcha']!=$_POST['Captcha']){
	$_SESSION[$session_name_initital . 'error'] = "Please Enter valid captcha";
	header("location:franchiseeregistration.php");
	exit;
}

if(isset($_POST['name']) && $_POST['name']==''){
	$_SESSION[$session_name_initital . 'error'] = "Please Enter Name";
	header("location:franchiseeregistration.php");
	exit;
}

if(isset($_POST['email']) && $_POST['email']==''){
	$_SESSION[$session_name_initital . 'error'] = "Please Enter Email";
	header("location:franchiseeregistration.php");
	exit;
}

if(isset($_POST['password']) && $_POST['password']==''){
	$_SESSION[$session_name_initital . 'error'] = "Please Enter Password";
	header("location:franchiseeregistration.php");
	exit;
}

$chkexist = getonefielddata("SELECT agentid from tbl_agent_master WHERE email='".$_POST['email']."' AND currentstatus!=5");
if($chkexist!=''){
	$_SESSION[$session_name_initital . 'error'] = "This email is already exists";
	header("location:franchiseeregistration.php");
	exit;
}

$action = 0;
$query = '';
$query .= sendtogeneratequery($action,"email",$_POST['email'],"Y");
$query .= sendtogeneratequery($action,"name",$_POST['name'],"Y");
$query .= sendtogeneratequery($action,"password",$_POST['password'],"Y");
$query .= sendtogeneratequery($action,"altemail",$_POST['altemail'],"Y");
$query .= sendtogeneratequery($action,"city",$_POST['city'],"Y");
$query .= sendtogeneratequery($action,"phoneno",$_POST['phone'],"Y");
$query .= sendtogeneratequery($action,"address",$_POST['address'],"Y");
$query .= sendtogeneratequery($action,"mobile",$_POST['mobile'],"Y");
$query .= sendtogeneratequery($action,"website",$_POST['website'],"Y");
$query .= sendtogeneratequery($action,"postcode",$_POST['zipcode'],"Y");
$query .= sendtogeneratequery($action,"state",$_POST['state'],"Y");
$query .= sendtogeneratequery($action,"countryid",$_POST['cmbcountryid'],"Y");
$query .= sendtogeneratequery($action,"referedid",$_POST['referedid'],"Y");	
$query .= sendtogeneratequery($action,"referedby",$_POST['referedby'],"Y");	
$query .= sendtogeneratequery($action,"createip",$_SERVER['REMOTE_ADDR'],"Y");
$query .= sendtogeneratequery($action,"createdate",date('Y-m-d'),"Y");
$query = substr($query,1);
$sql = "INSERT into tbl_agent_master (email,name,password,altemail,city,phoneno,address,mobile,website,postcode,state,countryid,referedid,referedby,createip,createdate) values (".$query.")";
execute($sql);
$action = getonefielddata("SELECT max(agentid) from tbl_agent_master");

$reg_commission= getonefielddata("select fldval from tbl_agent_setting_master where fldnm = 'registration_commission' and currentstatus = 0");
$membership_commission= getonefielddata("select fldval from tbl_agent_setting_master where fldnm = 'membership_commission' and currentstatus = 0");
$discount_percentage= getonefielddata("select fldval from tbl_agent_setting_master where fldnm = 'discount_percentage' and currentstatus = 0");

$agent_code = rand() . $action;
execute("update tbl_agent_master set agent_code='$agent_code', reg_commission='".$reg_commission."', membership_commission='".$membership_commission."', discount_percentage='".$discount_percentage."' where agentid=$action");




$emailsubject = getonefielddata("SELECT fldval from tbl_agent_setting_master WHERE fldnm='frregistrationsubject'");
$emailmsg = getonefielddata("SELECT fldval from tbl_agent_setting_master WHERE fldnm='frregistrationmessage'");

$emailmsg = str_replace("[name]",$_POST['name'],$emailmsg);
$emailmsg = str_replace("[fusername]",$_POST['email'],$emailmsg);
$emailmsg = str_replace("[fpassword]",$_POST['password'],$emailmsg);

sendemaildirect($_POST['email'],$emailsubject,$emailmsg);


unset($_SESSION[$session_name_initital . 'agentname']);
unset($_SESSION[$session_name_initital . 'agentemail']);
unset($_SESSION[$session_name_initital . 'agentaltemail']);
unset($_SESSION[$session_name_initital . 'agentcity']);
unset($_SESSION[$session_name_initital . 'agentphone']);
unset($_SESSION[$session_name_initital . 'agentaddress']);
unset($_SESSION[$session_name_initital . 'agentmobile']);
unset($_SESSION[$session_name_initital . 'agentwebsite']);
unset($_SESSION[$session_name_initital . 'agentzipcode']);
unset($_SESSION[$session_name_initital . 'agentstate']);
unset($_SESSION[$session_name_initital . 'agentcountry']);
unset($_SESSION[$session_name_initital . 'agentreferedid']);
unset($_SESSION[$session_name_initital . 'agentreferedby']);


header("location:message.php?b=83");
exit;
ob_flush();
?>