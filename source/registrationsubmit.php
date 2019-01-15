<? 
include("commonfile.php");
//$back=$_SERVER['HTTP_REFERER'];
$action = 0;
if(isset($_GET['b']) && $_GET['b']!='' && $_GET['b']>0 && is_numeric($_GET['b'])){
$action = $_GET['b'];	
}

//$retf='registration.php';
$back="registration.php";

$email = check_lalid_length_input($_POST['email']);
$name = check_lalid_length_input($_POST['reg_name']);
$nickname= check_lalid_length_input($_POST['nickname']);

////////////////////////////////////////////// default  details ////////////////////////////////////////////////

$private_contact_enable = findsettingvalue("private_contact_details");
$stfmaxuserid = getonefielddata("SELECT max(userid) from tbldatingusermaster WHERE staff_agentid!=''");

$shouldnotstaff_agentid = getonefielddata("SELECT staff_agentid from tbldatingusermaster WHERE userid=".$stfmaxuserid);
if($shouldnotstaff_agentid==''){
	$shouldnotstaff_agentid = 0;	
}

$shouldbestaff_agentid = getonefielddata("SELECT loginid from tbldatingadminloginmaster WHERE Loginid not in (1,".$shouldnotstaff_agentid.") order by rand()");


$private_contact_enable = findsettingvalue("private_contact_details");
$expiredate= findexpdate();
$emailverificationcode = rand();


$referrer = '';
	if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']!='')	{
		$referrer = $_SERVER['HTTP_REFERER'];	
}
$AutoApproval = findsettingvalue("AutoApprovalProfileUpdate");
	if ($AutoApproval == "Y")
		$currentstatus ="0.0";
	else
		$currentstatus = 1;


$EmailVerificationRequired = findsettingvalue("EmailVerificationRequired");	
	if ($EmailVerificationRequired == "N")
	{
		$emailverified = "Y";
		$errorid = 43;
        $messageerrmess = $messageerrmess43;
	}
	else
	{
		$emailverified = "N";
		$errorid = 1;
        $messageerrmess = $messageerrmess1;
	}
	
	
	
	$affiliateuid = "";
	if(isset($_COOKIE['afft_statid']) && $_COOKIE['afft_statid']){
		$affiliateuid = $_COOKIE['afft_statid'];	
	}




$packageid = 1;
    $trialpkg = findsettingvalue('trialpackageid');
	$contacts = '';
	$pkgdays = '';
	if($trialpkg!=''){
		$packageid = $trialpkg;
		if($packageid!=''){
			$pkgdata = getdata("SELECT days,no_of_contact_display from tbldatingpackagemaster WHERE packageid=".$packageid);
			 $pkgrs = mysqli_fetch_array($pkgdata);
			 $pkgdays = $pkgrs[0];
			 $contacts = $pkgrs[1];
		     $expiredate = date('Y-m-d', strtotime("+$pkgdays days"));
           }
     }


////////////////////////////////////////////// default  details ////////////////////////////////////////////////




$nickname ='';
if(isset($_POST['nickname']) && $_POST['nickname']!=''){
	$_SESSION[$session_name_initital."regs_nickname"] =$_POST['nickname'];
    $nickname	= $_POST['nickname']; 
}else{
        $_SESSION[$session_name_initital . "error"]= "Please enter Nick name";
		header("Location:$back");
		exit;
}



$reg_name ='';
if(isset($_POST['reg_name']) && $_POST['reg_name']!=''){
   $reg_name	= $_POST['reg_name'];
   $_SESSION[$session_name_initital."regs_name"] =$reg_name;
}else{
	    $_SESSION[$session_name_initital . "error"]= "Please enter Full name";
		header("Location:$back");
		exit;
}





$email ='';
if(isset($_POST['email']) && $_POST['email']!=''){
   $_SESSION[$session_name_initital."regs_email"] =$_POST['email'];
    $checkalreadyregistered_email = getonefielddata("SELECT count(userid) from tbldatingusermaster where email='".$_POST['email']."'");
    if($checkalreadyregistered_email == 0)
	{    
	     if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		  $_SESSION[$session_name_initital . "error"]= "Please enter valid emailaddress";
		  header("Location:$back");
		  exit;
		 }else{$email	= $_POST['email'];}
		 
	}else{
		 $email	= '';
		 $_SESSION[$session_name_initital . "error"]= "This Email address All ready in use";
		 header("Location:$back");
		 exit;
	}
   
   
}else{
	    $_SESSION[$session_name_initital . "error"]= "Please enter Email address";
		header("Location:$back");
		exit;
}



$confirm_email ='';
if(isset($_POST['confirm_email']) && $_POST['confirm_email']!=''){
    $checkalreadyregistered_email_c = getonefielddata("SELECT count(userid) from tbldatingusermaster where email='".$_POST['confirm_email']."'");
    if($checkalreadyregistered_email_c == 0)
	{
		  if(!filter_var($_POST['confirm_email'], FILTER_VALIDATE_EMAIL)) {
		   $_SESSION[$session_name_initital . "error"]= "Please enter valid confirm emailaddress";
		   header("Location:$back");
		   exit;
		  }else{$confirm_email	= $_POST['confirm_email'];}
	}else{
			$confirm_email	= '';
			$_SESSION[$session_name_initital . "error"]= "This Email address All ready in use";
			header("Location:$back");
			exit;
	}
   
}else{
	     $_SESSION[$session_name_initital . "error"]= "Please Confirm enter Email address";
		 header("Location:$back");
		 exit;
}


if($email!='' && $confirm_email!=''){
   if($email!=$confirm_email){
	    $_SESSION[$session_name_initital . "error"]= "Please Enter Confirm Email properly";
		header("Location:$back");
		exit;
   }
}







$Password ='';
if(isset($_POST['Password']) && $_POST['Password']!=''){
	  $passwordlenth=strlen($_POST['Password']);
       if($passwordlenth > 5){
		   $Password	= $_POST['Password'];
	    
	   }else{
		    $_SESSION[$session_name_initital . "error"]= "Please minimum 6 characters for password";
		    header("Location:$back");
		     exit;
		   
	   }
 
}else{
	     $_SESSION[$session_name_initital . "error"]= "Please enter Password";
		header("Location:$back");
		exit;
}

$Password ='';
if(isset($_POST['ConfirmPassword']) && $_POST['ConfirmPassword']!=''){
	$cpasswordlenth=strlen($_POST['ConfirmPassword']);
       if($cpasswordlenth > 5){
		   $Password	= $_POST['ConfirmPassword'];
	    
	   }else{
		   echo $_SESSION[$session_name_initital . "error"]= "Please minimum 6 characters for Confirm passwordddd";
		header("Location:$back");
		exit;
		   }
}else{
	     $_SESSION[$session_name_initital . "error"]= "Please enter Confirm Password";
		 header("Location:$back");
	     exit;
}


if($_POST['Password']!='' && $_POST['ConfirmPassword']!='' ){
	
	if($_POST['Password']!=$_POST['ConfirmPassword']){
	 $_SESSION[$session_name_initital . "error"]= "Please Enter Confirm Password properly";
		header("Location:$back");
		exit;	
	}
}




$gender ='';
if(isset($_POST['gender']) && $_POST['gender']!='0.0'){
   $gender	= $_POST['gender'];
    $_SESSION[$session_name_initital."regs_gender"] =$gender;
}else{
	    //$_SESSION[$session_name_initital . "error"]= "Please select Gender";
		//header("Location:$back");
		//exit;
}


$dobdd ='';
if(isset($_POST['dobdd']) && $_POST['dobdd']!='0.0'){
   $dobdd	= $_POST['dobdd'];
    $_SESSION[$session_name_initital."regs_dobdd"] =$dobdd;
}else{
	   //$_SESSION[$session_name_initital . "error"]= "Please birth date";
		//header("Location:$back");
		//exit;
}



$dobmm ='';
if(isset($_POST['dobmm']) && $_POST['dobmm']!='0.0'){
   $dobmm	= $_POST['dobmm'];
    $_SESSION[$session_name_initital."regs_dobmm"] =$dobmm;
}else{
	 //$_SESSION[$session_name_initital . "error"]= "Please birth month";
	//	header("Location:$back");
	//	exit;
}


$dobyy ='';
if(isset($_POST['dobyy']) && $_POST['dobyy']!='0.0'){
   $dobyy	= $_POST['dobyy'];
    $_SESSION[$session_name_initital."regs_dobyy"] =$dobyy;
}else{
	//$_SESSION[$session_name_initital . "error"]= "Please birth year";
		//header("Location:$back");
		//exit;
}


if($dobdd!='' && $dobmm!='' && $dobyy!=''){
$dob = $dobyy . "-" . $dobmm . "-" . $dobdd;
}else{
$dob='';	
}


$mobile ='';
if(isset($_POST['mobile']) && $_POST['mobile']!=''){
   $mobile	= $_POST['mobile'];
    $_SESSION[$session_name_initital."regs_mobile"] =$mobile;
}else{
	//$_SESSION[$session_name_initital . "error"]= "Please enter mobile";
		//header("Location:$back");
		//exit;
}


if(isset($_POST['country_code']) && $_POST['country_code']!=''){
$c_code = str_replace("+","",$_POST['country_code']);
$mobile = $c_code.$mobile;
}

$city_code ='';
if(isset($_POST['city_code']) && $_POST['city_code']!=''){
   $city_code	= $_POST['city_code'];
   $_SESSION[$session_name_initital."regs_city_code"] =$city_code;
}else{
	    $city_code='';
	    //$_SESSION[$session_name_initital . "error"]= "Please enter landline no ";
		//header("Location:$back");
		//exit;
}


if(isset($_POST['country_code'])){
$country_code = $_POST['country_code'];
} else {
$country_code = "";
}

$cmbreligian ='';
$religianid='';
if(isset($_POST['cmbreligian']) && $_POST['cmbreligian']!='0.0'){
   $cmbreligian	= $_POST['cmbreligian'];
   $religianid=$_POST['cmbreligian'];
   $_SESSION[$session_name_initital."regs_cmbreligian"] =$cmbreligian;
}else{
	//$_SESSION[$session_name_initital . "error"]= "Please select religion ";
		//header("Location:$back");
		//exit;
}



$cmbmothertounge ='';
if(isset($_POST['cmbmothertounge']) && $_POST['cmbmothertounge']!='0.0'){
   $cmbmothertounge	= $_POST['cmbmothertounge'];
   $_SESSION[$session_name_initital."regs_cmbmothertounge"] =$cmbmothertounge;
}else{
	//$_SESSION[$session_name_initital . "error"]= "Please select Mother Tounge ";
		//header("Location:$back");
		//exit;
}



$cmbcountryid ='';
$countryid='';
if(isset($_POST['cmbcountryid']) && $_POST['cmbcountryid']!='0.0'){
   $cmbcountryid	= $_POST['cmbcountryid'];
   $countryid=$_POST['cmbcountryid'];
   $_SESSION[$session_name_initital."regs_cmbcountryid"] =$cmbcountryid;
}else{
	//$_SESSION[$session_name_initital . "error"]= "Please select Country of Residence";
		//header("Location:$back");
		//exit;
}


$cmbstateid ='';
if(isset($_POST['cmbstateid']) && $_POST['cmbstateid']!='0.0'){
   $cmbstateid	= $_POST['cmbstateid'];
   $_SESSION[$session_name_initital."regs_cmbstateid"] =$cmbstateid;
}else{
	//$_SESSION[$session_name_initital . "error"]= "Please select State";
	//	header("Location:$back");
	//	exit;
}


$cmbcityid ='';
if(isset($_POST['cmbcityid']) && $_POST['cmbcityid']!='0.0'){
   $cmbcityid	= $_POST['cmbcityid'];
   $_SESSION[$session_name_initital."regs_cmbcityid"] =$cmbcityid;
}else{
	    //$_SESSION[$session_name_initital . "error"]= "Please select city";
		//header("Location:$back");
		//exit;
}



if(isset($_POST['otherstate']) && $_POST['otherstate']!=''){
		$statesql = "INSERT into tbldating_state_master SET title='".$_POST['otherstate']."', country_id=".$_POST['cmbcountryid'].", languageid=1";
		execute($statesql);
		$maxstateid = getonefielddata("SELECT max(id) from tbldating_state_master");
		$_POST['cmbstateid'] = $maxstateid;		
}	
	
if(isset($_POST['city_other']) && $_POST['city_other']!=''){
		$concat = '';
		if($cmbstateid!=''){
			$concat = ",state_id=".$cmbstateid."";
		}
		if($cmbstateid=='' && $maxstateid!=''){
			$concat = ",state_id=".$maxstateid."";	
		}
		$insert = "INSERT into tbldating_city_master SET title='".$_POST['city_other']."', languageid=1 ".$concat.""; 
		execute($insert);
		$cmbcityid = getonefielddata("SELECT max(id) from tbldating_city_master");
}





$cmbprofilecreatedby ='';
if(isset($_POST['cmbprofilecreatedby']) && $_POST['cmbprofilecreatedby']!='0.0'){
   $cmbprofilecreatedby	= $_POST['cmbprofilecreatedby'];
   $_SESSION[$session_name_initital."regs_cmbprofilecreatedby"] =$cmbprofilecreatedby;
}else{
	//$_SESSION[$session_name_initital . "error"]= "Profile Created By";
		//header("Location:$back");
		//exit;
}


//if($staff_display=="N") { 
if(isset($_POST['cmbhearaboutusid']) ){ 
$cmbhearaboutusid ='';
if(isset($_POST['cmbhearaboutusid']) && $_POST['cmbhearaboutusid']!='0.0'){
   $cmbhearaboutusid	= $_POST['cmbhearaboutusid'];
   $_SESSION[$session_name_initital."regs_cmbhearaboutusid"] =$cmbhearaboutusid;
}else{
	    //$_SESSION[$session_name_initital . "error"]= "How Did You Know About Us";
		//header("Location:$back");
		//exit;
}

}else{$cmbhearaboutusid='';}
//}else{$cmbhearaboutusid='';}


$chkcond1 ='';
if(isset($_POST['chkcond1']) && $_POST['chkcond1']!=''){
   $chkcond1	= $_POST['chkcond1'];
   $_SESSION[$session_name_initital."regs_chkcond1"] =$chkcond1;
}else{
	    $_SESSION[$session_name_initital . "error"]= "You must be agree with our terms and conditions";
		header("Location:$back");
		exit;
}


if(isset($_POST['txtpostcode']) && $_POST['txtpostcode']!=""){
		$txtpostcode = $_POST['txtpostcode'];
	} else {
		$txtpostcode = "";
	}


if (isset($_POST["private_phone_no"])){
		$private_phone_no ="Y";
}else{
		$private_phone_no ="N";
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


    if(isset($_POST['date'])){
		$date = $_POST['date'];
	} else {
		$date = date("m/d/y");
	}
	
	
	if(isset($_POST['comment']) && $_POST['comment']!=''){
		$agent_comment = $_POST['comment'];
	} else {
		$agent_comment = '';
	}	
	
	
	$txtbrother_married1 = '';
	$txtbrother_unmarried1 = '';
	$txtsister_married1 = '';
	$txtsister_unmarried1 = '';
	$motherthoungid = '';
	if(isset($_POST['txtbrother_married1']) && $_POST['txtbrother_married1']!=''){
		$txtbrother_married1 = $_POST['txtbrother_married1'];	
	}
	if(isset($_POST['txtbrother_unmarried1']) && $_POST['txtbrother_unmarried1']!=''){
		$txtbrother_unmarried1 = $_POST['txtbrother_unmarried1'];	
	}
	if(isset($_POST['txtsister_married1']) && $_POST['txtsister_married1']!=''){
		$txtsister_married1 = $_POST['txtsister_married1'];	
	}
	if(isset($_POST['txtsister_unmarried1']) && $_POST['txtsister_unmarried1']!=''){
		$txtsister_unmarried1 = $_POST['txtsister_unmarried1'];	
	}
	if(isset($_POST['cmbmothertounge']) && $_POST['cmbmothertounge']!=''){
		$motherthoungid = $_POST['cmbmothertounge'];
	}


    $query = sendtogeneratequery($action,"email",$email,"Y");
	$query .= sendtogeneratequery($action,"name",$reg_name,"Y");
	$query .= sendtogeneratequery($action,"password",$Password,"Y");
	$query .= sendtogeneratequery($action,"packageid",$packageid,"Y");
	$query .= sendtogeneratequery($action,"expiredate",$expiredate,"Y");
	$query .= sendtogeneratequery($action,"nickname",$nickname,"Y");
	$query .= sendtogeneratequery($action,"emailverified",$emailverified,"Y");		
	$query .= sendtogeneratequery($action,"genderid",$gender,"Y");
	$query .= sendtogeneratequery($action,"dob",$dob,"Y");
	$query .= sendtogeneratequery($action,"mobile",$mobile,"Y");	
	$query .= sendtogeneratequery($action,"country_code",$country_code,"Y");
	$query .= sendtogeneratequery($action,"city_code",$city_code,"Y");
	$query .= sendtogeneratequery($action,"religianid",$cmbreligian,"Y");
	$query .= sendtogeneratequery($action,"countryid",$cmbcountryid,"Y");
	$query .= sendtogeneratequery($action,"state",$cmbstateid,"Y");
	$query .= sendtogeneratequery($action,"city_id",$cmbcityid,"Y");
    $query .= sendtogeneratequery($action,"hearaboutusid",$cmbhearaboutusid,"Y");	
    $query .= sendtogeneratequery($action,"date",$date,"Y");
	$query .= sendtogeneratequery($action,"profilecreatebyid",$cmbprofilecreatedby,"Y");
	$query .= sendtogeneratequery($action,"motherthoungid",$cmbmothertounge,"Y");
	$query .= sendtogeneratequery($action,"CreateIP",getip(),"Y");
	$query .= sendtogeneratequery($action,"currentstatus",$currentstatus,"Y");
	$query .= sendtogeneratequery($action,"regpagenm",$referrer,"Y");
	$query .= sendtogeneratequery($action,"postcode",check_lalid_length_input($txtpostcode),"Y");
	
	$query .= sendtogeneratequery($action,"brother_married1",$txtbrother_married1,"Y");	
	$query .= sendtogeneratequery($action,"brother_unmarried1",$txtbrother_unmarried1,"Y");		
	$query .= sendtogeneratequery($action,"sister_married1",$txtsister_married1,"Y");	
	$query .= sendtogeneratequery($action,"sister_unmarried1",$txtsister_unmarried1,"Y");	
	
	$query .= sendtogeneratequery($action,"staff_agentid",$staff_agentid,"Y");
	$query .= sendtogeneratequery($action,"staff_collection",$staff_collection,"Y");
	$query .= sendtogeneratequery($action,"staff_contact",$staff_contact,"Y");
	$query .= sendtogeneratequery($action,"staff_relation",$staff_relation,"Y");
	$query .= sendtogeneratequery($action,"affiliateuid",$affiliateuid,"Y");
	
	
	$query = substr($query,1);
	if($action==0){
			
	  $sSql = "insert into tbldatingusermaster (email,name,password,packageid,expiredate,nickname,emailverified,genderid,dob,mobile,country_code,city_code,religianid,countryid,state,city_id,hearaboutusid,date,profilecreatebyid,motherthoungid,CreateIP,currentstatus,regpagenm,postcode,brother_married1,brother_unmarried1,sister_married1,sister_unmarried1,staff_agentid,staff_collection,staff_contact,staff_relation,affiliateuid,createdate) values(" . $query .",now())";	
	  execute($sSql);


    // $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
    //  $sql = "INSERT INTO tbldatingusermaster(email,name,password,packageid,expiredate,nickname,emailverified,genderid,dob,mobile,country_code,city_code,religianid,countryid,state,city_id) VALUES('$email','$reg_name','$Password','$packageid','$expiredate','$nickname','$emailverified','$gender','$dob','$mobile','$country_code','$city_code','$cmbreligian','$cmbcountryid','$cmbstateid','$cmbcityid')";
    // $result = $db->query($sql);
    // if($result){
    //     echo $query."<br><br>";
    // }
    //  echo $city_code."<br><br>";
        
    
    
	$userid = getonefielddata("select max(userid) from tbldatingusermaster");
	   
	   
	}else {
		execute("update tbldatingusermaster SET $query WHERE userid=".$action);	
		
		$userid = $action;
	}
	
	if($private_contact_enable=='Y'){
		execute("update tbldatingusermaster SET private_phone_no='".$private_phone_no."' WHERE userid=".$userid);
	}
	
	 if($contacts!='' && $pkgdays!=''){
		$contacts_sql = "INSERT into tbldating_view_conact_package_user_master SET packageid='".$packageid."',expiredate='".$expiredate."',userid='".$userid."',days='".$pkgdays."',createdate=curdate(),total_contact_can_view='".$contacts."'";	
		execute($contacts_sql);
	}
	
	
	//affiliate commission start
	if($affiliateuid!=""){
		$get_programid = getonefielddata("SELECT afft_program from afft_user_master WHERE afft_userid=".$affiliateuid);
		//$get_reg_comm = getonefielddata("SELECT reg_commission from afft_program_master WHERE program_id=".$get_programid);
		$get_total_comm = getonefielddata("SELECT afft_total_comm from afft_user_master WHERE afft_userid=".$affiliateuid);	
		$get_reg_comm = getonefielddata("SELECT afft_reg_comm from afft_user_master WHERE afft_userid=".$affiliateuid);	
		$new_total_comm = round($get_total_comm) + round($get_reg_comm);				
		execute("UPDATE afft_user_master SET afft_total_comm=".$new_total_comm." WHERE afft_userid=".$affiliateuid);
		$check_exist_pymntid = getonefielddata("SELECT afft_paymentid from afft_payment_master WHERE afft_userid=".$affiliateuid." AND afft_clear='N'");
		
		if($check_exist_pymntid!=""){
			$get_amnt = getonefielddata("SELECT afft_totalpaymentamount from afft_payment_master WHERE afft_paymentid=".$check_exist_pymntid);
			$newpending_amnt = $get_amnt + $get_reg_comm;
			execute("UPDATE afft_payment_master SET afft_totalpaymentamount=".$newpending_amnt.", afft_pendingamount=".$newpending_amnt." WHERE afft_paymentid=".$check_exist_pymntid);
		} else {
			$sSql3 = "insert into afft_payment_master (afft_userid,afft_totalpaymentamount,CreateIP,CreateDate,afft_pendingamount) values('$affiliateuid','$get_reg_comm','".$_SERVER['REMOTE_ADDR']."',now(),'$get_reg_comm')";	
			execute($sSql3);
		}
		$commission_sql = "INSERT into afft_commission_master SET afft_user_id='".$affiliateuid."', afft_comm_amount='".$get_reg_comm."', aff_comm_month='".date("m")."', afft_comm_year='".date("Y")."', afft_matri_id='".$userid."', createby='".$userid."', createip='".$_SERVER['REMOTE_ADDR']."', createdate='".date("Y-m-d")."'";		
		execute($commission_sql);
	}
	//affiliate commission end	
	
	$userid = getonefielddata("select max(userid) from tbldatingusermaster");
	
	$get_religion_name = getonefielddata("SELECT title from tbldatingreligianmaster WHERE id=".$religianid);
	if($get_religion_name!=""){
		execute("UPDATE tbldatingusermaster SET search_religion='".$get_religion_name."' WHERE userid=".$userid);
	}
	
	
	 
	 
		if ($gender == 1)
		$gender = 2;
		else
		$gender = 1;
		// start partner profile
		execute("insert into tbldatingpartnerprofilemaster (userid,genderid,CreateBy,CreateIP,CreateDate) values ($userid,$gender,$userid,'" . getip() .  "',now())");
	     
		  
	   $profile_code = profile_id_code($userid);
	   execute("update tbldatingusermaster set profile_code='$profile_code' where userid=$userid");
	 
	   $emailverificationcode = $emailverificationcode . $userid;
	   execute("update tbldatingusermaster set emailverificationcode='$emailverificationcode' where userid=$userid");
	 
		//$websiteurl = findsettingvalue("websiteurl");
		$websiteurl = $sitepath;
		$exmessage = "";
		if ($emailverified == "N")
		{
		//$exmessage = "Email Verification Code : $emailverificationcode";
		$exmessage = "$emailverificationcode";
		$exmessage .= "<br><a href='". $websiteurl . "/emailverify.php?b=". $emailverificationcode . "'>click here to verify email</a>";
		$exmsg = $exmessage;	
		
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
	
	
	  
	 
	 if(assign_to_randomemployee=='Y'){		
		execute("update tbldatingusermaster SET staff_agentid=".$shouldbestaff_agentid." WHERE userid=".$userid);	
	 }
	  
	  
		//		$_SESSION[$session_name_initital . "registername"] = "";
//				$_SESSION[$session_name_initital . "registeremail"] ="";
//				$_SESSION[$session_name_initital . "registernickname"] = "";
//				$_SESSION[$session_name_initital . "registergenderid"]= "";
//				$_SESSION[$session_name_initital . "registerdob_dd"]= "";
//				$_SESSION[$session_name_initital . "registerdob_mm"]= "";
//				$_SESSION[$session_name_initital . "registerdob_yy"]= "";
//				$_SESSION[$session_name_initital . "registermobile"]= "";
//				$_SESSION[$session_name_initital . "registerreligianid"]= "";
//				$_SESSION[$session_name_initital . "registercountryid"]= "";
//				$_SESSION[$session_name_initital . "registerstateid"]= "";
//				$_SESSION[$session_name_initital . "registercityid"]= "";
//				$_SESSION[$session_name_initital . 'registerhearaboutusid'] = "";
//				$_SESSION[$session_name_initital . 'registerpostcode'] = "";
//				$_SESSION[$session_name_initital . "staff_agentid"]= "";
//				$_SESSION[$session_name_initital . "staff_collection"]= "";
//				$_SESSION[$session_name_initital . 'staff_contact'] = "";
//				$_SESSION[$session_name_initital . "staff_relation"]= "";
//				$_SESSION[$session_name_initital . 'date'] ="";
	
		
	  sendemail(1,$userid,$exmsg);
	  sendemail(20,"","email address : $email<br>password :$Password<br>",findsettingvalue("AdminMail"));
	  
	
	
	
	 
	 if($sms_module_enable=='Y' && $registration_sms_verification=='Y'){
		if(isset($_POST['mobile']) && $_POST['mobile']!=''){
			$mobile = $_POST['mobile'];
			$message = findsettingvalue("registration_sms_text");
			$verification_link = $websiteurl."emailverify.php?b=". $emailverificationcode;
			$message = str_replace("[username]",$name,$message);
			$message = str_replace("[verificationcode]",$emailverificationcode,$message);
			$message = str_replace("[verificationlink]",$verification_link,$message);	
			//echo $mobile.$message;
			//if(isset($_POST['country_code']) && $_POST['country_code']!=''){
			//	$c_code = str_replace("+","",$_POST['country_code']);
			//	$mobile = $c_code.$mobile;
			//}

			sms_to_send($mobile,$message,0,1);
		}
	}
	          
			   
				unset($_SESSION[$session_name_initital."regs_nickname"]);
				unset($_SESSION[$session_name_initital."regs_name"]);
				unset($_SESSION[$session_name_initital."regs_email"]);
				unset($_SESSION[$session_name_initital."regs_gender"]);
				unset($_SESSION[$session_name_initital."regs_dobdd"]);
				unset($_SESSION[$session_name_initital."regs_dobmm"]);
				unset($_SESSION[$session_name_initital."regs_dobyy"]);
				unset($_SESSION[$session_name_initital."regs_mobile"]);
				unset($_SESSION[$session_name_initital."regs_city_code"]);
				unset($_SESSION[$session_name_initital."regs_cmbreligian"]);
				unset($_SESSION[$session_name_initital."regs_cmbmothertounge"]);
				unset($_SESSION[$session_name_initital."regs_cmbcountryid"]);
				unset($_SESSION[$session_name_initital."regs_cmbstateid"]);
				unset($_SESSION[$session_name_initital.'regs_cmbprofilecreatedby']);
				unset($_SESSION[$session_name_initital.'regs_cmbhearaboutusid']);
				unset($_SESSION[$session_name_initital.'regs_chkcond1']);
				
				
				//unset($_SESSION[$session_name_initital."registername"]);
				/*unset($_SESSION[$session_name_initital."registeremail"]);
				unset($_SESSION[$session_name_initital."registernickname"]);
				unset($_SESSION[$session_name_initital."registergenderid"]);
				unset($_SESSION[$session_name_initital."registerdob_dd"]);
				unset($_SESSION[$session_name_initital."registerdob_mm"]);
				unset($_SESSION[$session_name_initital."registerdob_yy"]);
				unset($_SESSION[$session_name_initital."registermobile"]);
				unset($_SESSION[$session_name_initital."registerreligianid"]);
				unset($_SESSION[$session_name_initital."registercountryid"]);
				unset($_SESSION[$session_name_initital . "registerstateid"]);
				unset($_SESSION[$session_name_initital . "registercityid"]);
				unset($_SESSION[$session_name_initital . 'registerpostcode']);
				unset($_SESSION[$session_name_initital."registerhearaboutusid"]);
				unset($_SESSION[$session_name_initital.'registerage']);
				unset($_SESSION[$session_name_initital.'registercountry_code']);
				unset($_SESSION[$session_name_initital.'registercity_code']);
				unset($_SESSION[$session_name_initital.'registerland_no']);
				unset($_SESSION[$session_name_initital . 'registercountry_code']);*/
			   
				init_login_session();
				$_SESSION[$session_name_initital . "memberuserid"] = $userid;
				execute("update tbldatingusermaster set lastlogin=now() where userid=". $userid);
				$_SESSION[$session_name_initital . "memberusername"] = $email;
				$_SESSION[$session_name_initital . "membername"] =$name;
				//$_SESSION['SESSION_CHAT_USER_ID'] = findchatuserid($userid);
				if(isset($_SESSION[$session_name_initital . 'error']) && $_SESSION[$session_name_initital . 'error']!=''){
				$_SESSION[$session_name_initital . 'error'] = '';	
				}
				$_SESSION[$session_name_initital . "error"] = $messageerrmess1;
				
				
				

  require 'phpmailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;

  $mail->Host='mail.paroshi.com';
  $mail->Port=465;
  $mail->SMTPAuth=true;
  $mail->SMTPSecure='tls';
  $mail->Username='pronirab@paroshi.com';
  $mail->Password='nirabAB00$$';


    
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $emailcs=$_POST['confirm_email'];
        $sql = "select * from tbldatingusermaster where email='$emailcs'";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
            

  $mail->setFrom('pronirab@paroshi.com','Mail Verification-(paroshi)');
  $mail->addAddress($emailcs);
  $mail->addReplyTo($emailcs);


  $mail->isHTML(true);
  $mail->Subject='mail verification :: paroshi';
  $mail->Body= '
  
  
  
  
  
  <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <title></title>
    <!--[if !mso]><!-- -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        #outlook a {
            padding: 0;
        }
        
        .ReadMsgBody {
            width: 100%;
        }
        
        .ExternalClass {
            width: 100%;
        }
        
        .ExternalClass * {
            line-height: 100%;
        }
        
        body {
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        
        table,
        td {
            border-collapse: collapse;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }
        
        p {
            display: block;
            margin: 13px 0;
        }
    </style>
    <!--[if !mso]><!-->
    <style type="text/css">
        @media only screen and (max-width:480px) {
            @-ms-viewport {
                width: 320px;
            }
            @viewport {
                width: 320px;
            }
        }
    </style>
    
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);
    </style>
    <!--<![endif]-->
    <style type="text/css">
        @media only screen and (min-width:480px) {
            .mj-column-per-100 {
                width: 100%!important;
            }
        }
    </style>
</head>

<body style="background: #FFFFFF;">
    <div class="mj-container" style="background-color:#FFFFFF;">
        
        <table role="presentation" cellpadding="0" cellspacing="0" style="background:url(https://topolio.s3-eu-west-1.amazonaws.com/uploads/593807b1018b1/1496845908.jpg) top center / auto repeat;font-size:0px;width:100%;" border="0" background="https://topolio.s3-eu-west-1.amazonaws.com/uploads/593807b1018b1/1496845908.jpg">
            <tbody>
                <tr>
                    <td>
                        <div style="margin:0px auto;max-width:600px;">
                            <!--[if mso | IE]>      <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px;">        <v:fill origin="0.5, 0" position="0.5,0" type="tile" src="https://topolio.s3-eu-west-1.amazonaws.com/uploads/593807b1018b1/1496845908.jpg" />        <v:textbox style="mso-fit-shape-to-text:true" inset="0,0,0,0">      <![endif]-->
                            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center" border="0">
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
                                            
                                            <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;">
                                                                <div style="font-size:1px;line-height:50px;white-space:nowrap;">&#xA0;</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;padding:0px 20px 0px 20px;" align="center">
                                                                <div style="cursor:auto;color:#000000;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:11px;line-height:22px;text-align:center;">
                                                                    <h1 style="font-family: &apos;Cabin&apos;, sans-serif; color: #FFFFFF; font-size: 44px; line-height: 100%;">Paroshi Mail Verification&#xA0;</h1>
                                                                    <p><span style="color:#ffffff;"><span style="font-size:20px;">Your Mail Verification Code : '.$data->emailverificationcode.'</span></span>
                                                                    </p>
                                                                    <p></p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;padding:0px 0px 0px 0px;" align="center">
                                                                <table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:separate;" align="center" border="0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style="border:none;border-radius:24px;color:#fff;cursor:auto;padding:10px 25px;" align="center" valign="middle" bgcolor="#e85034">
                                                    
                                        <a href="https://www.paroshi.com/emailverify.php" style="text-decoration:none;background:#e85034;color:#fff;font-family:Ubuntu, Helvetica, Arial, sans-serif, Helvetica, Arial, sans-serif;font-size:15px;font-weight:normal;line-height:120%;text-transform:none;margin:0px;" target="_blank">Verify Now</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--[if mso | IE]>        </v:textbox>      </v:rect>      <![endif]-->
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" border="0">
            <tbody>
                <tr>
                    <td>
                        <div style="margin:0px auto;max-width:600px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center" border="0">
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">
                                            
                                            <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                            <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" border="0">
            <tbody>
                <tr>
                    <td>
                        <div style="margin:0px auto;max-width:600px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center" border="0">
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:9px 0px 9px 0px;">

                                            <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;padding:10px 25px;padding-top:20px;padding-bottom:20px;padding-right:22px;padding-left:22px;">
                                                                <p style="font-size:1px;margin:0px auto;border-top:1px dashed #ACACAC;width:100%;"></p>
                                                                
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;padding:10px 25px;" align="center">
                                                                <div>
                                                                   
                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;" align="center" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="padding:4px;vertical-align:middle;">
                                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="background:none;border-radius:3px;width:35px;" border="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style="vertical-align:middle;width:35px;height:35px;">
                                                                                                    <a href="https://www.facebook.com/PROFILE"><img alt="facebook" height="35" src="https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/outlined/facebook.png" style="display:block;border-radius:3px;" width="35"></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                                <td style="padding:4px 4px 4px 0;vertical-align:middle;">
                                                                                    <a href="https://www.facebook.com/PROFILE" style="text-decoration:none;text-align:left;display:block;color:#333333;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;border-radius:3px;"></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!--[if mso | IE]>      </td><td>      <![endif]-->
                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;" align="center" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="padding:4px;vertical-align:middle;">
                                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="background:none;border-radius:3px;width:35px;" border="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style="vertical-align:middle;width:35px;height:35px;">
                                                                                                    <a href="https://www.twitter.com/PROFILE"><img alt="twitter" height="35" src="https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/outlined/twitter.png" style="display:block;border-radius:3px;" width="35"></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                                <td style="padding:4px 4px 4px 0;vertical-align:middle;">
                                                                                    <a href="https://www.twitter.com/PROFILE" style="text-decoration:none;text-align:left;display:block;color:#333333;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;border-radius:3px;"></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!--[if mso | IE]>      </td><td>      <![endif]-->
                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="float:none;display:inline-table;" align="center" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="padding:4px;vertical-align:middle;">
                                                                                    <table role="presentation" cellpadding="0" cellspacing="0" style="background:none;border-radius:3px;width:35px;" border="0">
                                                                                        <tbody>
                                                                                            <tr>
                                                                                                <td style="vertical-align:middle;width:35px;height:35px;">
                                                                                                    <a href="https://plus.google.com/PROFILE"><img alt="google" height="35" src="https://s3-eu-west-1.amazonaws.com/ecomail-assets/editor/social-icos/outlined/google-plus.png" style="display:block;border-radius:3px;" width="35"></a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </td>
                                                                                <td style="padding:4px 4px 4px 0;vertical-align:middle;">
                                                                                    <a href="https://plus.google.com/PROFILE" style="text-decoration:none;text-align:left;display:block;color:#333333;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;border-radius:3px;"></a>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;padding:10px 25px;padding-top:20px;padding-bottom:10px;padding-right:22px;padding-left:25px;">
                                                                <p style="font-size:1px;margin:0px auto;border-top:1px dashed #ACACAC;width:100%;"></p>
                                                                
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" border="0">
            <tbody>
                <tr>
                    <td>
                        <div style="margin:0px auto;max-width:600px;">
                            <table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;" align="center" border="0">
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px 0px 0px 0px;">
                                           
                                            <div class="mj-column-per-100 outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%;">
                                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="word-wrap:break-word;font-size:0px;padding:0px 20px 0px 20px;" align="left">
                                                                <div style="cursor:auto;color:#949494;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:15px;line-height:22px;text-align:left;">
                                                                    <p><span style="font-size:12px;">Copyright &#xA9; 2017&#xA0;Topol.io, All rights reserved.&#xA0;<br>You subscribed to our newsletter via our website, topol.io<br>&#xA0;<br><a draggable="false" href="http://*|UNSUB|*" style="color:#3498db;">Unsubscribe from this list</a></span></p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <!--[if mso | IE]>      </td></tr></table>      <![endif]-->
    </div>
</body>

</html>
  
  
  
  
  
  
  
  
  ';
}
  if ($mail->send()) {
    $result1="Message Sent Successfully";
  } else {
    $result1= "Try Again !! Message Not Sent";
  }

			
				
				
				header("location: updateprofilepersonal.php");
				exit();
			   
	 
	
	//}



//ob_flush();
?>