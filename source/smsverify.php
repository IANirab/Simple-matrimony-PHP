<?php

ob_start();
require_once('commonfile.php');
checklogin($sitepath);
$user_data = getdata("SELECT smsverified,smsverificationcode,country_code,mobile,name from tbldatingusermaster WHERE userid=".$curruserid);
$user_rs = mysqli_fetch_array($user_data);
$smsverified = $user_rs[0];
$smsverificationcode = $user_rs[1];
$smscountry_code = $user_rs[2];
$sms_mobile = $user_rs[3];
$sms_name = $user_rs[4];
if($smsverified=='Y'){
	header("location:message.php?b=98");	
	exit;
}
$smsverificationcode = rand().$curruserid;
execute("update tbldatingusermaster SET smsverificationcode='".$smsverificationcode."' WHERE userid=".$curruserid);
if($sms_module_enable=='Y' && $dashboard_mobile_verification_sms=='Y'){
	$message = findsettingvalue("registration_sms_text");
	$message = str_replace("[username]",$sms_name,$message);
	$message = str_replace("[verificationcode]",$smsverificationcode,$message);
	$mobile = $sms_mobile;	
	//if($smscountry_code!=''){
	//	$c_code = str_replace("+","",$smscountry_code);
	//	$mobile = $c_code.$sms_mobile;	
	//}
	sms_to_send($mobile,$message,0,1);
}
header("location:message.php?b=97");
exit;
ob_flush();
?>
