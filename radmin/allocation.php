<? 
require_once("commonfileadmin.php");
if(isset($_POST['userid']) && $_POST['userid']!=""){
execute("INSERT into tblallocationmaster SET user_id=".$_POST['userid'].", category='".$_POST['category']."', allocate_id='".$_POST['value']."'");
echo "success";
exit;
}

if(isset($_POST['aid']) && $_POST['aid']!=""){	
	execute("UPDATE tblallocationmaster SET comments='".$_POST['msg']."' WHERE id=".$_POST['aid']);
	echo "success";
	exit;
}

if(isset($_POST['sms']) && $_POST['sms']!=""){
	$userid = $_POST['uid'];
	$get_user_details = getdata("SELECT name,country_code,mobile from tbldatingusermaster WHERE userid=".$userid);
	$rs_user = mysqli_fetch_array($get_user_details);
		$username = $rs_user['name'];
		$country_code = $rs_user['country_code'];
		$mobile = $rs_user['mobile'];
		$profileid = find_profile_code($userid);
	$sms_text = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=107 AND fldnm = 'custom_service_msg'");
	$sms_text = rawurlencode($sms_text);
	$find_plus = strstr($country_code,"+");
	if($find_plus!=""){
		$country_code = substr($contry_code,0,strlen($country_code));
	}
	$mobile = $country_code.$mobile;
	//$mobile = substr($mobile,1,strlen($mobile));	
	$sms_text = str_replace("[username]",$username,$sms_text);	
	$sms_text = str_replace("[profileid]",$profileid,$sms_text);	
	$result = sms_to_send($mobile,$sms_text,0,1);
	$date = date("Y-m-d");
	execute("UPDATE tblallocationmaster SET sms_sent_date='".$date."' WHERE id=".$_POST['allid']);
	echo "success";
	exit;
	
}

?>