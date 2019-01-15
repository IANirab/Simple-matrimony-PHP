<?

// type==1 admin , type==2 user
function sms_to_send($mobile,$message,$userid,$type)
{	

$MsgText=$message;
$Mobile="+91".$mobile;

	 // for  demo , work201/test/sms/ || work201/test/net_sms/
	$Password = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=103 "); // hash key or pass 
	//f99b105b4fa9c7d36703902a5b0de678f79618425d4918691972b462da5e131e 
	$UserID = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=100 "); // user email or userid
	//amit@makeyoursoftware.com
	$SenderID = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=101 "); // sender name 
	//TXTLCL


$SMSType=2;


    

        //sanitize inputs
        $UserID = urlencode($UserID);
        $Password = urlencode($Password);
        $SenderID = urlencode($SenderID);
        $MsgText = urlencode($MsgText);
		$SMSType = urlencode($SMSType);

       // $parameters = "username=".$UserID."&Password=".$Password."&SenderID=".$SenderID."&SMSType=".$SMSType."&Mobile=".$Mobile."&MsgText=".$MsgText;
        $parameters="username=".$UserID."&message=".$MsgText."&sendername=".$SenderID."&smstype=24829&numbers=".$Mobile."&apikey=".$Password."";
		$apiurl = "http://sms.hspsms.com/sendSMS?";
		
		

	if($type==2)
	{
			$sms_can_send = getonefielddata("SELECT sms_can_send from tbldatingusermaster WHERE userid='".$userid."' ");
			$sms_exp_date = getonefielddata("SELECT sms_exp_date from tbldatingusermaster WHERE userid='".$userid."' ");
			$date=date('Y-m-d');
		if($sms_can_send>0 && $sms_exp_date>=$date)
		{
				
				
			$ch = curl_init($apiurl);
            $get_url = $apiurl."?".$parameters;
            curl_setopt($ch, CURLOPT_POST,0);
            curl_setopt($ch, CURLOPT_URL, $get_url);
        	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
        	curl_setopt($ch, CURLOPT_HEADER,0);
        	// DO NOT RETURN HTTP HEADERS
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        	// RETURN THE CONTENTS OF THE CALL
        	$return_val = curl_exec($ch);
       
        //	if($return_val=="")echo "Process Failed, Please check domain, username and password."; else echo $return_val;
		
			execute("INSERT INTO `tbl_sms_master`( `mobile`, `sms_text`, `createby`,createip)
			 VALUES ('".$mobile."','".$message."','".$userid."','".$_SERVER['REMOTE_ADDR']."')");
			 
			 	 execute("UPDATE tbldatingusermaster SET sms_can_send=sms_can_send-1 WHERE userid='".$userid."' ");			
				 execute("UPDATE tbldatingusermaster SET sms_sent=sms_sent+1 WHERE userid='".$userid."' ");			
				
		}
			
	}
	if($type==1)
	{
	
			$ch = curl_init($apiurl);
            $get_url = $apiurl."?".$parameters;
            curl_setopt($ch, CURLOPT_POST,0);
            curl_setopt($ch, CURLOPT_URL, $get_url);
        
        	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
        	curl_setopt($ch, CURLOPT_HEADER,0);
        	// DO NOT RETURN HTTP HEADERS
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        	// RETURN THE CONTENTS OF THE CALL
        	$return_val = curl_exec($ch);
       
        //	if($return_val=="")echo "Process Failed, Please check domain, username and password."; else echo $return_val;
		
		    	execute("INSERT INTO `tbl_sms_master`( `mobile`, `sms_text`, `createby`,createip)
			 VALUES ('".$mobile."','".$message."','0','".$_SERVER['REMOTE_ADDR']."')");
	}
	


}



?>