<? 
session_start();
require_once("commonfileadmin.php");
execute("delete from tbldatingprofilehistorymaster where datediff(curdate(),CreateDate) >= 100 ");
$total_mail_sent=0;
checkadminlogin();
$dash_board_note = findsettingvalue("Dashboard_main_note");
$total_user = getonefielddata("select count(userid) from tbldatingusermaster where currentstatus=0 and genderid in (1,2) ");
$total_user_male = getonefielddata("select count(userid) from tbldatingusermaster where currentstatus=0 and genderid=1");
$total_user_female = getonefielddata("select count(userid) from tbldatingusermaster where currentstatus=0 and genderid=2");
//$sendmail = "N";
//$prefferedpartnermaildate = findsettingvalue("partnerprofilemailsenddate");
//$checksendmail = getonefielddata("select to_days(curdate()) - to_days('$prefferedpartnermaildate') from tbldatingsettingmaster where settingid=1");
//if ($checksendmail >= 1)
//	$sendmail = "Y";
//if ($sendmail == "Y")
//{
//	$total_mail_sent =0;	
//	$result = getdata("select userid from tbldatingusermaster where ". datinguserwhereque());
//	while($rs= mysqli_fetch_array($result))
//	{
//		$send_uid = $rs[0];				
//		$prefferedpartnermaildays = find_days_partner_mails($send_uid);		
//		//echo "<br><br>";
//		if ( $prefferedpartnermaildays!="")
//		{
//			$que = findpartnerprofilequery($prefferedpartnermaildays,"Y",$send_uid,"");			
//			
//			if ($que != "")
//			{
//				$ans = sendpartnermail($que,$send_uid);
//				$ans = "";
//				if ($ans == "Y")
//				$total_mail_sent = $total_mail_sent +1;
//			}	
//		}
//	}	
//	freeingresult($result);
//	//execute("update tbldatingsettingmaster set fldval=curdate() where fldnm='partnerprofilemailsenddate'");
//}
//// start profile updation mail 
//$profile_update_mail_days = findsettingvalue("profile_update_mail_days");
//if ($profile_update_mail_days != "")
//{
//	$profile_sendmail = "N";
//	$profile_update_mailsenddate = findsettingvalue("profile_update_mailsenddate");
//	if ($profile_update_mailsenddate != "")
//	{
//	$profile_checksendmail = getonefielddata("select to_days(curdate()) - to_days('$profile_update_mailsenddate') from tbldatingsettingmaster where settingid=1");
//	if ($profile_checksendmail >= $profile_update_mail_days)
//		$profile_sendmail = "Y";
//	}
//	else
//		$profile_sendmail = "Y";
//	if ($profile_sendmail == "Y")
//	{
//		$result = getdata("select userid from tbldatingusermaster where ". datinguserwhereque());
//		execute("update tbldatingsettingmaster set fldval=curdate() where fldnm='profile_update_mailsenddate'");
//		while($rs= mysqli_fetch_array($result))
//		{
//			sendemail(17,$rs[0],"","");
//		}
//		freeingresult($result);		
//	}
//}	
// end profile updation mail
?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script src="../js/jquery.min3.js"></script>

<script type="text/javascript" src="../js/graph.js"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>
<body onLoad="start()">

<!-- TOP START ######################## -->
<?php 
//echo "start dashboard";exit;
include("admintop.php") ?>
<!-- TOP END ######################## -->
<div class="pagewrapper">
	<div class="container">
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div class="col-lg-9 center_right">
		<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<h1 class="pagetitle" > <i class="fas fa-american-sign-language-interpreting"></i> All Members [2-way-]
		<!-- CENTER END ######################## -->
	</div>	
	
	
	
	
				<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      
          <? 
        $db = new mysqli("localhost","paroshic_paroshic","kxmcwQzLTrTR","paroshic_matri2018jl");
        $sql = "select * from tbldatingusermaster order by userid desc";
        $result = $db->query($sql);
        
        while($data = $result->fetch_object()){
            
        ?>   
    <tr>
      <td><a href="https://www.paroshi.com/displayprofile.php?b=<? echo $data->userid; ?>"><? echo $data->name; ?></a></td>
      <td>
    <li>
    <a href="add2way.php?b=<? echo $data->userid; ?>" class="hvr-rectangle-out"> <i class="fas fa-share-square"></i> Send 2-way</a>
    </li>
    </td>
    </tr>
    <? } ?>
    
  </tbody>
</table>
	
	
	
	
	
	
	
	
	
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>
<? 
function find_days_partner_mails($userid)
{
	$send_days ="";
	if ($userid != "")
	{
		$result = getdata("select sendmeemail,to_days(curdate()) - to_days(preferred_mail_send_date),profileid from tbldatingpartnerprofilemaster where userid=$userid and sendmeemail != 'N'");
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

function sendpartnermail($searchque,$profileuserid)
{
	global $sitepath,$mainfoldernm;
	$profilelink ="";	
	$result = getdata("select userid, name,genderid," . findage() . ",countryid,state,area,imagenm,substr(profileheadline,1,200),city,zodiacsign,nickname from tbldatingusermaster where $searchque ". datinguserwhereque() . " order by userid desc ");
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
			//$profilelink .= "<br><a href='" .$sitepath . $mainfoldernm ."/displayprofile/$userid'>$name ,$genderid,$age,$countryid</a>";
			$profilelink .= "<br><a href='" .displayprofilelink($userid)."'>$name ,$genderid,$age,$countryid</a>";
			//$profilelink = displayprofilelink($curruserid);
			
		}
		freeingresult($result);
	if ($profilelink != "")
	{	
		sendemail(9,$profileuserid,$profilelink);		
		//send_sms(104,$profileuserid); // added by Nishit to send sms for matching profile
		return "Y";
	}
	execute("update tbldatingpartnerprofilemaster set preferred_mail_send_date=curdate() where userid=$profileuserid");
	return "N";
}

function send_sms($txtid,$userid){
	$userid = "103";
	$sms_text = getonefielddata("SELECT fldval from tbldatingsettingmaster WHERE settingid=".$txtid);		
	$get_sms_pkg_details = getdata("SELECT name,sms_package_id, sms_exp_date, sms_sent, sms_can_send, mobile from tbldatingusermaster WHERE userid IN ($userid)");
	while($rs_sms = mysqli_fetch_array($get_sms_pkg_details)){
		$sms_package_id = $rs_sms['sms_package_id'];
		$sms_exp_date = $rs_sms['sms_exp_date'];
		$sms_sent = $rs_sms['sms_sent'];
		$sms_can_send = $rs_sms['sms_can_send'];
		$name = $rs_sms['name'];
		$mobile = $rs_sms['mobile'];
		if($sms_text!=""){
			$sms_text = str_replace("[username]",$name,$sms_text);
		}		
		
		$days = (strtotime($sms_exp_date) - strtotime(date("Y-m-d"))) / (60 * 60 * 24);	
		if($days>0){
			if($sms_can_send>0){
				$sms_text = rawurlencode($sms_text);
				 execute("INSERT into tbl_sms_master SET userid=".$userid.", mobile=".$mobile.", sms_text='".$sms_text."'");
				 $max_sms_id = getonefielddata("SELECT max(id) from tbl_sms_master");
				 
				 /*$obj = new sms($mobile,$sms_text);
				 $result= "";
				 $result = $obj->send();*/
				 //if(file_exists("../dbinclude/routesmsfunction.php")){
				 if($sms_module_enable=="Y") {
				 	$result = sms_to_send($mobile,$sms_text,0,1);
				 	$result_arr = explode("|",$result);
				 	$results = $result_arr[0]; 
				} else {
					$result = "";
				}	
				 execute("UPDATE tbl_sms_master SET sms_response = ".$results." WHERE id=$max_sms_id");
				 $sms_hv_sent = $sms_sent + 1;
				 $sms_cn_send = $sms_can_send - 1;
				 execute("UPDATE tbldatingusermaster SET sms_sent = ".$sms_hv_sent.", sms_can_send = ".$sms_cn_send." WHERE userid=".$userid);
			}
		}
	}	
}

function find_active_members($exque)
{
	return getonefielddata("select count(userid) from tbldatingusermaster where $exque currentstatus=0 ");
}


// gst invoice code , for change tax date 

$invoice_end= findsettingvalue("invoice_end"); 
if(date('Y-m-d') > $invoice_end)
{
 	
	$invoice_start= findsettingvalue("invoice_start"); 
	$startdatenew=date('Y-m-d', strtotime($invoice_start. ' + 1 years'));
	execute( "UPDATE  tbldatingsettingmaster SET fldval = '".$startdatenew."'
	WHERE fldnm='invoice_start' " );
	
	
	$enddatenew=date('Y-m-d', strtotime($invoice_end. ' + 1 years'));
	execute( "UPDATE  tbldatingsettingmaster SET fldval = '".$enddatenew."'
	WHERE fldnm='invoice_end' " );
	
	
	
}

?>
<script language="javascript">
function submit_for_profile_id_user()
{
 document.frm_search_profile.action="user_search_profileid.php";
 document.frm_search_profile.submit();
}
function submit_for_profile_id_invoice()
{
 document.frm_search_profile.action="invoice_search_profileid.php";
  document.frm_search_profile.submit();
}

</script>