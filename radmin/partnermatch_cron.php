<? 
include("commonfileadmin.php");
//coding start
$prefferedpartnermaildate = findsettingvalue("partnerprofilemailsenddate");

$checksendmail = getonefielddata("select to_days(curdate()) - to_days('$prefferedpartnermaildate') from tblmatrisettingmaster where settingid=1");
if($checksendmail>1){
$result = getdata("select userid from tblmatriusermaster where ". datinguserwhereque());	
	$profiledata_default = findsettingvalue('matchemaildesign');
	$i=1;
	while($rs= mysqli_fetch_array($result))
	{
		$send_uid = $rs[0];
		//$prefferedpartnermaildays = 30;
		$prefferedpartnermaildays = find_days_partner_mails($send_uid);
		//$prefferedpartnermaildays = 1;
		if($prefferedpartnermaildays!=''){
		$que = findpartnerprofilequery($prefferedpartnermaildays,"Y",$send_uid,"");							
			if ($que != "")
			{
				$ans = sendpartnermail($que,$send_uid);
				if($ans!=''){
					$prodata = str_replace("[emaildata]",$ans,$profiledata_default);							
					$insert_cron = "INSERT into tbl_cron_master SET userid=".$send_uid.", emailid=9, messagebody='".$prodata."'";
					execute($insert_cron);
				}				
				/*$ans = "";
				if ($ans == "Y")
				$total_mail_sent = $total_mail_sent +1;*/
			}
		}
	$i++;	
	}	
	freeingresult($result);
	execute("update tblmatrisettingmaster set fldval=curdate() where fldnm='partnerprofilemailsenddate'");
}
$profile_update_mail_days = findsettingvalue("profile_update_mail_days");
if ($profile_update_mail_days != ""){
	$profile_sendmail = "N";
	$profile_update_mailsenddate = findsettingvalue("profile_update_mailsenddate");	
	if ($profile_update_mailsenddate != ""){
		$profile_checksendmail = getonefielddata("select to_days(curdate()) - to_days('$profile_update_mailsenddate') from tblmatrisettingmaster where settingid=1");	
		if ($profile_checksendmail >= $profile_update_mail_days)
			$profile_sendmail = "Y";	
	} else {
			$profile_sendmail = "N";
	}	
	if($profile_sendmail == "Y"){		
		$result = getdata("select userid from tblmatriusermaster where ". datinguserwhereque());		
		while($rs= mysqli_fetch_array($result))
		{
			//sendemail(17,$rs[0],"","");			
			$sql = "INSERT into tbl_cron_master SET emailid=17, userid=".$rs[0]."";
			execute($sql);
		}
		freeingresult($result);				
		execute("update tblmatrisettingmaster set fldval=curdate() where fldnm='profile_update_mailsenddate'");	
	}		
}
$cron_result = getdata("SELECT userid,messagebody,id,emailid from tbl_cron_master WHERE currentstatus=0 LIMIT 100");	
while($cron_rs = mysqli_fetch_array($cron_result)){
	$userid = $cron_rs[0];
	$messagebody = $cron_rs[1];
	$emailid = $cron_rs[3];
	sendemail($emailid,$userid,$messagebody);	
	$dt = date('Y-m-d H:i:s');
	$cronid = $cron_rs[2];
	execute("update tbl_cron_master SET currentstatus=1, senddatetime='".$dt."' WHERE id=".$cronid);	
}

function sendpartnermail($searchque,$profileuserid)
{
	global $sitepath,$mainfoldernm;	
	$profilelink ="";	
	$result = getdata("select userid, name,genderid," . findage() . ",countryid,state,area,imagenm,substr(profileheadline,1,200),city,zodiacsign,nickname,thumbnil_image,personality,educationid,ocupationid from tblmatriusermaster where $searchque ". datinguserwhereque() . " order by userid desc ");
	$profiledata = '';
	//$profiledata_default = findsettingvalue('matchemaildesign');
		while($rs= mysqli_fetch_array($result))
		{
			$userid = $rs[0];
			$name = $rs[1];
			if ($rs[2] !="")
		 	$genderid = findgender($rs[2]);
		 	$age = $rs[3];
		 	$countryid = "";
		 	if ($rs[4] !="")
		 	$countryid = findcountryid($rs[4]);			
			$image = $rs['thumbnil_image'];
			if($image==''){
				$image = 'noimage.gif';	
			}
			$img = $sitepath."uploadfiles/".$image;
			$personality = substr($rs['personality'],0,100);
			$profilecode = display_profile_code($userid);
			if($personality!=''){				
				$personality .= '<a href="'.$sitepath.'displayprofile.php?b='.$userid.'&open=login">More...</a>';
			}			
			$profilelink = "<a href=".$sitepath."displayprofile.php?b=".$userid."&open=login>".$profilecode."</a>";					
			$profiledata .= '<div>';
			$profiledata .= '<h2>'.$profilelink.'</h2>';
			$profiledata .= '<img src="'.$img.'">';
			$profiledata .= $personality;
			$profiledata .= '</div>';			
		}
		freeingresult($result);
	if ($profilelink != "")
	{	
		//sendemail(9,$profileuserid,$profilelink);				
		return $profiledata;		
		//return "Y";
	}	
	execute("update tblmatripartnerprofilemaster set preferred_mail_send_date=curdate() where userid=$profileuserid");
	//return "N";
}
function find_days_partner_mails($userid)
{
	$send_days ="";
	if ($userid != "")
	{
		$result = getdata("select sendmeemail,to_days(curdate()) - to_days(preferred_mail_send_date),profileid from tblmatripartnerprofilemaster where userid=$userid and sendmeemail != 'N'");
		while($rs= mysqli_fetch_array($result))
		{
			$sendmeemail = $rs[0];
			$last_mail_send_before_days = $rs[1];
			$profileid = $rs[2];
			if (strlen($last_mail_send_before_days) == 0)
			{
			if ($sendmeemail == "M")
				$send_days =30;
			else
				$send_days =7;
			}
			if ($last_mail_send_before_days != "")
			{
			if ($sendmeemail == "M")
				if ($last_mail_send_before_days > 30)
					$send_days =30;
			if ($sendmeemail == "W")
				if ($last_mail_send_before_days > 7)
					$send_days=7;
			}
		}
		freeingresult($result);
	}
	
	return $send_days;
}
?>