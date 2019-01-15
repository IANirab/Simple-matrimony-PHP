<?
include("commonfileadmin.php");
$profile_update_mail_days = findsettingvalue("profile_update_mail_days");


if ($profile_update_mail_days != ""){
	$profile_sendmail = "N";
	$profile_update_mailsenddate = findsettingvalue("profile_update_mailsenddate");	
	
	
	if ($profile_update_mailsenddate != ""){
		$profile_checksendmail = getonefielddata("select to_days(curdate()) - to_days('$profile_update_mailsenddate') from tbldatingsettingmaster where settingid=1");	

		if ($profile_checksendmail >= $profile_update_mail_days)
	
			$profile_sendmail = "Y";	
	} else {
		$profile_sendmail = "N";
	}	
	if($profile_sendmail == "Y"){		
		$result = getdata("select userid from tbldatingusermaster where ". datinguserwhereque());		
		while($rs= mysqli_fetch_array($result))
		{
			//sendemail(17,$rs[0],"","");			
			$sql = "INSERT into tbl_cron_master SET emailid=17, userid=".$rs[0]."";
			execute($sql);
		}
		freeingresult($result);				
		execute("update tbldatingsettingmaster set fldval=curdate() where fldnm='profile_update_mailsenddate'");	
	}		
}