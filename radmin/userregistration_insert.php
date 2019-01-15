<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin();

if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	  $CreateByfld = "modifyby";
	  $ipfldnm = "modifyip";
	}
else
	{
	  $action = 0;
	  $CreateByfld = "createby";
	  $ipfldnm = "createip";
	}
	$_SESSION['email'] = '';	
	$_SESSION['name'] = '';	
	$_SESSION['dob'] = '';	
	$_SESSION['nickname'] = '';	
	$_SESSION['mobile'] = '';	
	$_SESSION['religianid'] = '';	
	$_SESSION['motherthoungid'] = '';	
	$_SESSION['heightid'] = '';	
	$_SESSION['weightid'] = '';	
	$_SESSION['castid'] = '';	
	$_SESSION['educationid'] = '';	
	$_SESSION['ocupationid'] = '';	
	$_SESSION['annual_income_currancyid'] = '';	
	$_SESSION['annual_income_id'] = '';	
	$_SESSION['genderid'] = '';	
	$_SESSION['stateid'] = '';	
	$_SESSION['countryid'] = '';	
	$_SESSION['cityid'] = '';	
	$_SESSION['profileheadline'] = '';	
	
	if(isset($_POST['email']) && $_POST['email']!=''){
		$_SESSION['email'] = $_POST['email'];	
	}
	if(isset($_POST['name']) && $_POST['name']!=''){
		$_SESSION['name'] = $_POST['name'];	
	}
	if(isset($_POST['dob']) && $_POST['dob']!=''){
		$_SESSION['dob'] = $_POST['dob'];	
	}
	if(isset($_POST['nickname']) && $_POST['nickname']!=''){
		$_SESSION['nickname'] = $_POST['nickname'];	
	}
	if(isset($_POST['mobile']) && $_POST['mobile']!=''){
		$_SESSION['mobile'] = $_POST['mobile'];	
	}
	if(isset($_POST['religianid']) && $_POST['religianid']!=''){
		$_SESSION['religianid'] = $_POST['religianid'];	
	}
	if(isset($_POST['motherthoungid']) && $_POST['motherthoungid']!=''){
		$_SESSION['motherthoungid'] = $_POST['motherthoungid'];	
	}
	if(isset($_POST['heightid']) && $_POST['heightid']!=''){
		$_SESSION['heightid'] = $_POST['heightid'];	
	}
	if(isset($_POST['weightid']) && $_POST['weightid']!=''){
		$_SESSION['weightid'] = $_POST['weightid'];	
	}
	if(isset($_POST['castid']) && $_POST['castid']!=''){
		$_SESSION['castid'] = $_POST['castid'];	
	}
	if(isset($_POST['educationid']) && $_POST['educationid']!=''){
		$_SESSION['educationid'] = $_POST['educationid'];	
	}
	if(isset($_POST['ocupationid']) && $_POST['ocupationid']!=''){
		$_SESSION['ocupationid'] = $_POST['ocupationid'];	
	}
	if(isset($_POST['annual_income_currancyid']) && $_POST['annual_income_currancyid']!=''){
		$_SESSION['annual_income_currancyid'] = $_POST['annual_income_currancyid'];	
	}
	if(isset($_POST['annual_income_id']) && $_POST['annual_income_id']!=''){
		$_SESSION['annual_income_id'] = $_POST['annual_income_id'];	
	}
	if(isset($_POST['genderid']) && $_POST['genderid']!=''){
		$_SESSION['genderid'] = $_POST['genderid'];	
	}
	if(isset($_POST['stateid']) && $_POST['stateid']!=''){
		$_SESSION['stateid'] = $_POST['stateid'];	
	}
	if(isset($_POST['countryid']) && $_POST['countryid']!=''){
		$_SESSION['countryid'] = $_POST['countryid'];	
	}
	if(isset($_POST['cityid']) && $_POST['cityid']!=''){
		$_SESSION['cityid'] = $_POST['cityid'];	
	}
	if(isset($_POST['profileheadline']) && $_POST['profileheadline']!=''){
		$_SESSION['profileheadline'] = $_POST['profileheadline'];	
	}
	$retfile1 = "usermanager.php?b1=-1";
	$retfile = "usermanager.php?b1=-1";
	
	$emailnickname = getdata("select email,nickname from tbldatingusermaster where currentstatus = 0");
	while($rs = mysqli_fetch_array($emailnickname)){
		if($_POST['email']!='' && $_POST['email'] == $rs[0]){
			
			$_SESSION[$session_name_initital . "adminerror1"] = "Email already exist. Please choose another one";
			header("location:$retfile1");	
			exit;
		}
		if($_POST['nickname']!='' && $_POST['nickname'] == $rs[1]){
			
			$_SESSION[$session_name_initital . "adminerror1"]= "Nickname already exist. Please choose another one"; 
			header("location:$retfile1");
			exit;	
		}
	}
	
	$_SESSION['email'] = '';	
	$_SESSION['name'] = '';	
	$_SESSION['dob'] = '';	
	$_SESSION['nickname'] = '';	
	$_SESSION['mobile'] = '';	
	$_SESSION['religianid'] = '';	
	$_SESSION['motherthoungid'] = '';	
	$_SESSION['heightid'] = '';	
	$_SESSION['weightid'] = '';	
	$_SESSION['castid'] = '';	
	$_SESSION['educationid'] = '';	
	$_SESSION['ocupationid'] = '';	
	$_SESSION['annual_income_currancyid'] = '';	
	$_SESSION['annual_income_id'] = '';	
	$_SESSION['genderid'] = '';	
	$_SESSION['stateid'] = '';	
	$_SESSION['countryid'] = '';	
	$_SESSION['cityid'] = '';	
	$_SESSION['profileheadline'] = '';
	$ip = $_SERVER["REMOTE_ADDR"];
	$query="";
	$dob = '';
	$referrer = '';
	if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']!=''){
		$referrer = $_SERVER['HTTP_REFERER'];	
	}
	$dob = $_POST['dobyy']."-".$_POST['dobmm']."-".$_POST['dobdd'];
	$query .= sendtogeneratequery($action,"email",$_POST["email"],"Y");
	$query .= sendtogeneratequery($action,"password",$_POST["password"],"Y");
	$query .= sendtogeneratequery($action,"name",$_POST["name"],"Y");
	$query .= sendtogeneratequery($action,"dob",$dob,"Y");
	$query .= sendtogeneratequery($action,"nickname",$_POST["nickname"],"Y");
	$query .= sendtogeneratequery($action,"mobile",$_POST["mobile"],"Y");
	$query .= sendtogeneratequery($action,"religianid",$_POST["religianid"],"Y");
	$query .= sendtogeneratequery($action,"motherthoungid",$_POST["motherthoungid"],"Y");
	$query .= sendtogeneratequery($action,"maritalstatusid",$_POST["maritalstatusid"],"Y");
	$query .= sendtogeneratequery($action,"heightid",$_POST["heightid"],"Y");
	$query .= sendtogeneratequery($action,"weightid",$_POST["weightid"],"Y");
	$query .= sendtogeneratequery($action,"castid",$_POST["castid"],"Y");
	$query .= sendtogeneratequery($action,"educationid",$_POST["educationid"],"Y");
	$query .= sendtogeneratequery($action,"ocupationid",$_POST["ocupationid"],"Y");
	$query .= sendtogeneratequery($action,"annual_income_currancyid",$_POST["annual_income_currancyid"],"Y");
	$query .= sendtogeneratequery($action,"annual_income_id",$_POST["annual_income_id"],"Y");
	$query .= sendtogeneratequery($action,"genderid",$_POST["genderid"],"Y");
	$query .= sendtogeneratequery($action,"stateid",$_POST["stateid"],"Y");
	$query .= sendtogeneratequery($action,"countryid",$_POST["countryid"],"Y");
	$query .= sendtogeneratequery($action,"cityid",$_POST["cityid"],"Y");
	$query .= sendtogeneratequery($action,"profileheadline",$_POST["profileheadline"],"Y");
	$query .= sendtogeneratequery($action,"emailverified","Y","Y");
	$query .= sendtogeneratequery($action,"packageid","1","Y");
	//$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	$query .= sendtogeneratequery($action,"regpagenm",$referrer,"Y");
	$query = substr($query,1);
	if ($action == 0){
	 	$sSql = "insert into tbldatingusermaster (email,password,name,dob,nickname,mobile,religianid,motherthoungid,maritalstatusid,heightid,weightid,castid,educationid,ocupationid,annual_income_currancyid,annual_income_id,genderid,state,countryid,city,profileheadline,emailverified,packageid,$ipfldnm,regpagenm,createdate) values($query,curdate())";		
		execute($sSql);
		//$retfile ="tbldatingusermaster_master.php";
		
		$action = getonefielddata("select max(userid) from tbldatingusermaster");
		$profile_code = profile_id_code($action);
		execute("update tbldatingusermaster SET profile_code='$profile_code' where userid=$action");		
	}
	else
	{
		$sSql = "update tbldatingusermaster set $query,modifydate=curdate() where userid=$action";
		execute($sSql);
		//$retfile ="tbldatingusermaster_manager.php";
		
	}
	
	
		$pro_init = substr($name,0,1);
		 $exmessage = "";	
		 $emailverificationcode = rand();
		$emailverificationcode = $emailverificationcode . $action;
		
		execute("update tbldatingusermaster set emailverificationcode='$emailverificationcode' where userid=$action");
		$websiteurl = $sitepath;
		$exmessage = "Email Verification Code : $emailverificationcode"."<br>";
		$exmessage .= "<br><a href='". $websiteurl . "/emailverify.php?b=". $emailverificationcode . "'>click here to verify email</a>"; 
	
		if(isset($_POST['send_email']) && $_POST['send_email']=='Y')
		{
			@sendemail(1,$action,$exmessage);	
		}
		
		
		
		
		if($sms_module_enable=='Y' && isset($_POST['send_sms']) && $_POST['send_sms']=='Y')
		{  

			$rnd = substr(rand(0,99999),0,4);
			$smsverificationcode = $rnd;
			execute("update tbldatingusermaster SET smsverificationcode='".$smsverificationcode."' WHERE userid=".$action);
			$sms_name = getonefielddata("select name from tbldatingusermaster
						 where userid='".$action."' ");

			if(isset($_POST['mobile']) && $_POST['mobile']!='')
			{
				$mobile = $_POST['mobile'];
				$message = findsettingvalue("registration_sms_text");
				
				$message = str_replace("[username]",$sms_name,$message);
				$message = str_replace("[verificationcode]",$smsverificationcode,$message);
				
				sms_to_send($mobile,$message,0,1);			
			}
			
		}

	
	

$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$retfile");
?>