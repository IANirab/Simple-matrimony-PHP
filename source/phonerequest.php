<? require_once('commonfile.php');

$referal = $_SERVER['HTTP_REFERER'];
$check_serarchresult = strstr($referal,"searchresult");
$check_displayprofile = strstr($referal,"displayprofile");
$check_phrequest = strstr($referal,"ph");

if(isset($_GET['b']) && $_GET['b']!=''){ 

	$uid = $_GET['b'];

}else{

	$uid = '';

}

$message='';
$subject='';

	if(isset($_SESSION[$session_name_initital . "memberuserid"]) && 
	$_SESSION[$session_name_initital . "memberuserid"] != "")
	{
 	}else
 	{  include("login_popup1.php"); 
		exit(); 
 	}	 



$touser = "";
$nristatus='';
if ($uid != "")

{

//checkselfcontact($uid,$curruserid);

if($uid==$curruserid)
{
	echo $messageerrmess20;
	exit;
}

$currgender = getonefielddata("SELECT genderid from tbldatingusermaster WHERE
 userid='".$curruserid."' ");

$displaygender = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid='".$uid."' ");

if($currgender==$displaygender)
{
 	 echo $messageerrmess78; exit;	
}

	



$touser = setdisplayprofilelink($uid,"");

}

$view_contact_packageid = user_can_see_contact_detail($curruserid);

$phnerequestid=0;
$expiredate = getonefielddata("select expiredate from  tbldating_view_conact_package_user_master where userid='".$curruserid."' and currentstatus=0 order by featureid desc limit 1 ");

if($expiredate>=date("Y-m-d"))
{
	$phnerequestid = getonefielddata("select count(id) from tblphonerequestmaster where touserid=$uid and fromuserid=$curruserid and currentstatus=0");
}


if($phnerequestid==0)
{
	if($expiredate<=date("Y-m-d"))
	{
		echo str_replace("[sitepath]",$sitepath,$messageerrmess68);
		exit();
	}
	elseif ($view_contact_packageid =="")
	{
		echo str_replace("[sitepath]",$sitepath,$messageerrmess_new68);
		exit();
	}
}


if ($touser == "")

{

//	header("location:message.php?b=5");
	echo $messageerrmess5;
	exit();

}

$nristatus = getonefielddata("select nristatus from  tbldatingusermaster where userid='".$uid."' and currentstatus=0");

$admin_disable_address_phone_no = getonefielddata("select admin_disable_address_phone_no from tbldatingusermaster where userid=$uid");

if ($admin_disable_address_phone_no == "Y")

{

//	header("location:message.php?b=69");
echo $messageerrmess69;
	exit();

}

$check_serarchresult = strstr($referal,"searchresult");

$check_displayprofile = strstr($referal,"displayprofile");

if($check_phrequest=='' && $check_serarchresult=='' && $check_displayprofile==''){

	//header("location:message.php?b=79");
echo $messageerrmess79;
	exit;

}

//$result = getdata("select subject,message from tbldatingemailmaster where emailid =10");	
$result = getdata("select subject,message from tbldatingemailmaster where emailid =40");  

while ($rs = mysqli_fetch_array($result))

{

	$subject = $rs[0];

	$message = $rs[1];

}

	freeingresult($result);

$phone_message = "";

$phone = "";

$country_code = "";

$city_code = "";

$father_name = "";

$mother_name = "";
$districtid = '';
$panchayat = '';
$district_name ='';
$panchayat_name ='';
$result = getdata("select mobile,name,landline,callingtime,talkpreference,email,altemail,area,city,postcode,state,countryid,address,private_phone_no,private_email,contact_person_on_phone,landline,genderid,relation,remarks,country_code,city_code,father_name,mother_name,districtid,panchayat,horoscope from tbldatingusermaster where userid =$uid ");	  

while ($rs = mysqli_fetch_array($result))

{
	
		$districtid = $rs['districtid'];
		$horoscope= $rs['horoscope'];
	if($districtid!='')
	{
$district_name = getonefielddata("select title from tbldating_district_master where id='".$districtid."' and  	currentstatus =0");
	}	
	$panchayat = $rs['panchayat'];
	if($panchayat!='')
	{
$panchayat_name = getonefielddata("select title from tbldating_panchayat_master where id='".$panchayat."' and  	currentstatus =0");
	}

	$mobile = $rs[0];

	$name   = $rs[1];

	$phno = $rs[2];

	$callingtime = $rs[3];

	$talkpreference = $rs[4];

	

	$email = $rs[5];

	$altemail = $rs[6];

	$area = $rs[7];

	$city = $rs[8];

	$postcode = $rs[9];

	$state = $rs[10];

	$countryid = findcountryid($rs[11]);

	$address = $rs[12];

	$check_phone_private_or_not = $rs[13];

	$check_email_private_or_not = $rs[14];

	$contact_person_on_phone = $rs[15];

	$landline = $rs[16];

	$genderid = $rs[17];

	$relation = $rs[18];

	$remarks = $rs[19];	

	$country_code = $rs[20];

	$city_code = $rs[21];

	if($rs[22]!=""){

		$father_name = $rs[22];

	}

	if($rs[23]!=""){

		$mother_name = $rs[23];

	}

	

/*	if($country_code!=""){

		$phone .= $country_code."-";	

	}*/

	if($city_code!=""){

		$phone .= $city_code."-";

	}

	if($phno!=''){

		$phone .= $phno;

	} else {

		$phone .= $landline;

	}

	if($country_code!="" && $mobile!="")	{

		$mobile = $country_code."-".$mobile;	

	}

	

	

	

	if ($callingtime == "")

		$callingtime = "Not Available";

	if ($mobile == "")

		$mobile = "Mobile No. Not Available";

	if ($phno == "")

		$phone = "Landline No. Not Available";

		//$phno = "Landline No. Not Available";



	/*if ($talkpreference != "")

		$talkpreference = getonefielddata("select title from tbldatingtaklingpreferencemaster where id=$talkpreference");

	if ($talkpreference == "")

		$talkpreference = "Not Available";*/

		

	$check_request = getonefielddata("SELECT accepted from tblphonerequestmaster WHERE fromuserid=$curruserid AND touserid=".$uid);	

	$check_private_enable = findsettingvalue("private_contact_details");	

	if ($check_phone_private_or_not == "Y" && $check_request!='A' && $check_private_enable=='Y')

	{


		$phone = "";

		$mobile = "";

		$callingtime = "";

		$talkpreference   = "";

	}

	

	if ($check_email_private_or_not == "Y")

	{

		$email = $check_email_private_mess;

		$altemail = "";

	}

	
	
	

	if($genderid=='1'){

		$label = $displayprofilecontactgroom;

		$lab = $displayprofilecontactgr;
          
		$newrelation = $updateprofilecontact_groom;
		  
	} else {

		$label = $displayprofilecontactbride;

		$lab = $displayprofilecontactbr;
     
	    $newrelation = $updateprofilecontact_bride;

	}

	

	$displayprofilelink = displayprofilelink($uid);

	$name = "<a href='$displayprofilelink'>$name</a>";

	

	$message = str_replace("[bg]",$label,$message);

	$message = str_replace("[bgr]",$lab,$message);

	$message = str_replace("[relation]",$relation,$message);

	$message = str_replace("[remarks]",$remarks,$message);

	

	$subject = str_replace("[name]",$name,$subject);

	$message = str_replace("[name]",$name,$message);

	

	//$subject = str_replace("[phoneno]",$phno,$subject);

	//$message = str_replace("[phoneno]",$phno,$message);

	

	$subject = str_replace("[phoneno]",$phone,$subject);

	$message = str_replace("[phoneno]",$phone,$message);

	

	$subject = str_replace("[mobileno]",$mobile,$subject);

	$message = str_replace("[mobileno]",$mobile,$message);

	

	$subject = str_replace("[callingtime]",$callingtime,$subject);

	$message = str_replace("[callingtime]",$callingtime,$message);

	

	

	$subject = str_replace("[talkpreference]",$talkpreference,$subject);

	$message = str_replace("[talkpreference]",$talkpreference,$message);

	

	$subject = str_replace("[email]",$email,$subject);

	$message = str_replace("[email]",$email,$message);

	

	$subject = str_replace("[altemail]",$altemail,$subject);

	$message = str_replace("[altemail]",$altemail,$message);

	

	$subject = str_replace("[area]",$area,$subject);

	$message = str_replace("[area]",$area,$message);

	

	$subject = str_replace("[city]",$city,$subject);

	$message = str_replace("[city]",$city,$message);

	

	$subject = str_replace("[postcode]",$postcode,$subject);

	$message = str_replace("[postcode]",$postcode,$message);

	

	$subject = str_replace("[state]",$state,$subject);

	$message = str_replace("[state]",$state,$message);

	

	$subject = str_replace("[countryid]",$countryid,$subject);

	$message = str_replace("[countryid]",$countryid,$message);

	

	$subject = str_replace("[address]",$address,$subject);

	$message = str_replace("[address]",$address,$message);

	

	$subject = str_replace("[contact_person_on_phone]",$contact_person_on_phone,$subject);

	$message = str_replace("[contact_person_on_phone]",$contact_person_on_phone,$message);	

	

	if($father_name!=""){

		$message = str_replace("[father_name]",$father_name,$message);

	} else {

		$message = str_replace("[father_name]","",$message);

	}

	if($mother_name!=""){

		$message = str_replace("[mother_name]",$mother_name,$message);	

	} else {

		$message = str_replace("[mother_name]","",$message);	

	}

	if($altemail!=""){

		$message = str_replace("[altemail]",$altemail,$message);

	} else {

		$message = str_replace("[altemail]","",$message);	

	}

	$message = str_replace("[profilecode]",display_profile_code($uid),$message);

	

	

	

	$phone_message = $message;

	/*if($father_name!=""){

		$phone_message .=	

	}*/

	if(isset($_GET['act']) && $_GET['act']!="phone"){
		
		insertpmb($uid,$curruserid,$subject,$message);		

	}

	//insert_phone_request($uid,$curruserid);

}

freeingresult($result);

$remain = user_can_see_contact_detail($curruserid,"Y");

update_view_contact_detail_package($view_contact_packageid,$curruserid,$uid);

//insert_phone_request($uid,$curruserid);

//header("location:message.php?b=38");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />


<?= $sitethemepath ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<?=findsettingvalue("Webstats_code"); ?>
<script>
$("#contact_detail_msg").click(function(){
   document.getElementById('close_contact_popup').click();
}); 

</script>
</head>

<body>

<?php //include("top.php") ?>
<div class="wrapper_about raw phone_request">
	<div class="container">
    	<? include("plugin.phonerequest.php");?>
    </div>
   
</div>
</div>
<div class="wrapper_blank">
	<div class="container">
    	 <div col-lg-9 col-md-9 col-sm-9 col-xs-12>
    			<div class="leftcms">
		 &nbsp;
    </div>
    </div>
    <div col-lg-3 col-md-3 col-sm-3 col-xs-12>
    			<div class="rightcms">
		 &nbsp;
    </div>
    </div>
    </div>
</div>

<!--matrimonal_footer Start  -->
<?php //include("footer.php") ?>
</body>
</html>