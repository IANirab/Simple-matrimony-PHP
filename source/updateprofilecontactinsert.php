<?php ob_start();
include_once("commonfile.php");
checklogin($sitepath);
$action = $curruserid;

if(isset($_POST['nristatus']) && $_POST['nristatus']!='')
{
	$nristatus=$_POST['nristatus'];
}else{$nristatus='';}

if(isset($_POST['cmbstateid']) && $_POST['cmbstateid']!=0.0)
{
	$cmbstateid=$_POST['cmbstateid'];
}else{$cmbstateid='';}

if(isset($_POST['cmbcityid']) && $_POST['cmbcityid']!=0.0)
{
	$cmbcityid=$_POST['cmbcityid'];
}else{$cmbcityid='';}

if(isset($_POST['cmbdistrictid']) && $_POST['cmbdistrictid']!=0.0)
{
	$cmbdistrictid=$_POST['cmbdistrictid'];
}else{$cmbdistrictid='';}

if(isset($_POST['cmbpanchayatid']) && $_POST['cmbpanchayatid']!=0.0)
{
	$cmbpanchayatid=$_POST['cmbpanchayatid'];
}else{$cmbpanchayatid='';}

if(isset($_POST['rad_newsletter']) && $_POST['rad_newsletter']!='')
{
	$rad_newsletter=$_POST['rad_newsletter'];
}else{$rad_newsletter='';}



$cmbcountryid=get_form_data($_POST['cmbcountryid'],2); 
$txtpostcode=get_form_data($_POST['txtpostcode'],1);
$txtarea=get_form_data($_POST['txtarea'],1);
$cmbresidencystatus=get_form_data($_POST['cmbresidencystatus'],2);
$relation=get_form_data($_POST['relation'],1);
$remarks=get_form_data($_POST['remarks'],1);
$txtaltemail=get_form_data($_POST['txtaltemail'],1);
$txtcallingtime=get_form_data($_POST['txtcallingtime'],1);
$txtaddress=get_form_data($_POST['txtaddress'],1);
$txt_contact_person_on_phone=get_form_data($_POST['txt_contact_person_on_phone'],1);
$calling_timezone=get_form_data($_POST['calling_timezone'],1);
$mobile=get_form_data($_POST['mobile'],1);
$land_no=get_form_data($_POST['land_no'],1);

$mobile_old = getonefielddata("SELECT mobile from  tbldatingusermaster where userid='".$curruserid."' ");
if($mobile!=$mobile_old)
{
	$sql = " UPDATE tbldatingusermaster set smsverified='N' where userid='".$curruserid."' ";
	execute($sql);
}


if(isset($_POST['otherstate']) && $_POST['otherstate']!=''){
	$statesql = "INSERT into tbldating_state_master SET title='".$_POST['otherstate']."', country_id=".$_POST['cmbcountryid'].",languageid=1,currentstatus='5'";
	execute($statesql);
	$maxstateid = getonefielddata("SELECT max(id) from tbldating_state_master");
	$cmbstateid = $maxstateid;		
}



$native_place = "";
if(isset($_POST['txtnative_place']) && $_POST['txtnative_place']!=""){
	$native_pace .= $_POST['txtnative_place']; 
}
if(isset($_POST['nativecmbstateid']) && $_POST['nativecmbstateid']!=""){
	$native_pace .= "-".$_POST['nativecmbstateid'];
}
if(isset($_POST['nativecmbcityid']) && $_POST['nativecmbcityid']!=""){
	$native_pace .= "-".$_POST['nativecmbcityid'];
}


if(isset($_POST['city_other']) && $_POST['city_other']!=''){
	$concat = '';
	if($cmbstateid!=''){
		$concat = ", state_id=".$cmbstateid;	
	}
	if($cmbstateid=='' && $maxstateid!=''){
		$concat = ", state_id=".$maxstateid;	
	}
	$insert = "INSERT into tbldating_city_master SET title='".$_POST['city_other']."', languageid=1 ".$concat.",currentstatus='5'";
	execute($insert);
	$cmbcityid = getonefielddata("SELECT max(id) from tbldating_city_master");
}



$query = sendtogeneratequery($action,"altemail",$txtaltemail,"Y");
$query .= sendtogeneratequery($action,"countryid",$cmbcountryid,"Y");
$query .= sendtogeneratequery($action,"state",$cmbstateid,"Y");
$query .= sendtogeneratequery($action,"city_id",$cmbcityid,"Y");
$query .= sendtogeneratequery($action,"city",$cmbcityid,"Y");

$query .= sendtogeneratequery($action,"postcode",$txtpostcode,"Y");
$query .= sendtogeneratequery($action,"area",$txtarea,"Y");
$query .= sendtogeneratequery($action,"country_code",$_POST['country_code'],"Y");
$query .= sendtogeneratequery($action,"city_code",$_POST['city_code'],"Y");
$query .= sendtogeneratequery($action,"phno",$land_no,"Y");
$query .= sendtogeneratequery($action,"mobile",$mobile,"Y");
$query .= sendtogeneratequery($action,"landline",$land_no,"Y");
$query .= sendtogeneratequery($action,"callingtime",$txtcallingtime,"Y");
$query .= sendtogeneratequery($action,"residancystatusid",$cmbresidencystatus,"Y");
$query .= sendtogeneratequery($action,"address",$txtaddress,"Y");
$query .= sendtogeneratequery($action,"districtid",$cmbdistrictid,"Y");
$query .= sendtogeneratequery($action,"panchayat",$cmbpanchayatid,"Y");





if (isset($_POST["private_email"]))
	$private_email ="Y";
else
	$private_email ="N";

if (isset($_POST["private_phone_no"]))
	$private_phone_no ="Y";
else
	$private_phone_no ="N";
	
$query .= sendtogeneratequery($action,"private_email",$private_email,"Y");
$query .= sendtogeneratequery($action,"private_phone_no",$private_phone_no,"Y");
$query .= sendtogeneratequery($action,"contact_person_on_phone",$txt_contact_person_on_phone,"Y");

$query .= sendtogeneratequery($action,"relation",$relation,"Y");
$query .= sendtogeneratequery($action,"remarks",$remarks,"Y");
$query .= sendtogeneratequery($action,"calling_timezone",$calling_timezone,"Y");
$query .= sendtogeneratequery($action,"nristatus",$nristatus,"Y");
$query .= sendtogeneratequery($action,"news_letter_subscribe",$rad_newsletter,"Y");


updateprofile($query,$curruserid);


if(isset($_POST['country_other']) && $_POST['country_other']!='' )
{
	execute("Insert into tbldatingcountrymaster (title,currentstatus,languageid) values ('".$_POST['country_other']."','5','$sitelanguageid') ");
	
	$action = getonefielddata("SELECT max(id) from tbldatingcountrymaster");
	execute("update tbldatingusermaster set countryid =".$action." where userid=".$curruserid);
	
}

if(isset($_POST['state_other']) && $_POST['state_other']!='' )
{
	execute ("Insert into tbldating_state_master (title,currentstatus,languageid,country_id) values ('".$_POST['state_other']."','5','$sitelanguageid','$_POST[cmbcountryid]') "); 
	
	$action = getonefielddata("SELECT max(id) from tbldating_state_master");
	execute("update tbldatingusermaster set state =".$action." where userid=".$curruserid);
}


if( isset($_POST['city_other']) && $_POST['city_other']!='' )
{
	execute ("Insert into tbldating_city_master (title,currentstatus,languageid,state_id) values ('".$_POST['city_other']."','5','$sitelanguageid','$cmbstateid') "); 
	
	$action = getonefielddata("SELECT max(id) from tbldating_city_master");
	execute("update tbldatingusermaster set city_id =".$action." where userid=".$curruserid);
}


$_SESSION[$session_name_initital . "error"] = $messageerrmess9;
header("location:updateprofile3.php");
ob_flush();
?>