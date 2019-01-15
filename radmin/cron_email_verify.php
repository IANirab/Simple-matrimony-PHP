<? session_start();
require_once("commonfileadmin.php");

$country_code = '';
$curruserid = '';
$Horoscope ='';
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){
	$user_mnager_um_1 = user_mnager_um_1();
	$user_mnager_um_2 = user_mnager_um_2();
	$user_mnager_um_3 = user_mnager_um_3();
	$user_mnager_um_4 = user_mnager_um_4();
	$user_mnager_um_5 = user_mnager_um_5();
	$user_mnager_um_6 = user_mnager_um_6();
	$user_mnager_um_7 = user_mnager_um_7();
	$user_mnager_um_8 = user_mnager_um_8();
	$user_mnager_um_9 = user_mnager_um_9();
} else {
	$user_mnager_um_1 = "N";	
	$user_mnager_um_2 = "N";
	$user_mnager_um_3 = "N";
	$user_mnager_um_4 = "N";
	$user_mnager_um_5 = "N";
	$user_mnager_um_6 = "N";
	$user_mnager_um_7 = "N";
	$user_mnager_um_8 = "N";	
	$user_mnager_um_9 = "N";
}
$status  = "0,1,2,4";
$quer_st = "";
$ex_quer_st="";
if (isset($_GET["b"]))
if ($_GET["b"] != "")
{
	$status = $_GET["b"];
	$quer_st = $status;
	$ex_quer_st ="*b=$status";
}
$exque ="";
if (isset($_GET["b2"]))
if ($_GET["b2"] != "")
{
	if ($_GET["b2"] =="e"){
		$exque = " datediff(tbldatingusermaster.expiredate,curdate()) < 0 and ";
	} else {
		$exque = " datediff(tbldatingusermaster.expiredate,curdate()) > 0 and tbldatingusermaster.packageid<>1 and ";
	}
	$status =0;
	$quer_st = $status ."&b2=" . $_GET["b2"];
	$ex_quer_st .="*b2=".$_GET["b2"];
}
$remove_query = "";
if (isset($_GET["b1"]))
if ($_GET["b1"] != "")
	$remove_query = $_GET["b1"];
if ($remove_query == "-1")
	$_SESSION[$session_name_initital . "admin_user_search"]="";
if($user_mnager_um_9=='Y' || $user_mnager_um_9=='N')	{
?>
<?

// alter qry user master profile_reminder_send 
$send_again=20;  // send again email after how many days
$limit=200; // no of mail send at once
$delete_now=180;

		$sql_new = getdata("select userid,DATE_FORMAT(lastlogin, '%Y-%m-%d') as date from tbldatingusermaster where currentstatus=0 and emailver_reminder_send=0 and emailverified='N' ");		
		while($rs_new= mysqli_fetch_array($sql_new))
{
	$userid_new= $rs_new[0];
	$date_new=$rs_new[1]; 
	
	$sql_upd_new="UPDATE `tbldatingusermaster` SET emailver_reminder_send='".$date_new."' where 
	userid='".$userid_new."' and emailverified='N' ";
	execute($sql_upd_new);
}

// delete user after 6 month , not verify email 
	$result12 = getdata("select userid from tbldatingusermaster where currentstatus=0 and to_days(curdate()) - to_days(createdate) > ".$delete_now." and emailverified='N' limit ".$limit." ");		
while($rs12= mysqli_fetch_array($result12))
{
		$userid11=$rs12[0];
		execute("DELETE FROM `tbldatingusermaster` WHERE userid='".$userid11."' ");
}



$thumbnil_image='';
$emailver_reminder=30;
		$result = getdata("select userid,lastlogin,email,name,emailver_reminder_send,thumbnil_image,emailverificationcode from tbldatingusermaster where currentstatus=0 and to_days(curdate()) - to_days(emailver_reminder_send) > ".$send_again."
		and emailverified='N'  limit ".$limit." ");		

		while($rs= mysqli_fetch_array($result))
{
			$userid=$rs[0];
			$lastlogin=$rs[1]; 
			$regemail=$rs[2]; 
			$name=$rs[3]; 
			$profile_reminder_send=$rs[4]; 
			$thumbnil_image=$rs[5]; 
			$verificationcode=$rs[6]; 
			$display_date = date("d/m/Y", strtotime($lastlogin)); 	
		
		$date1 = date("Y-m-d", strtotime($lastlogin)); 
		$date2=date("Y-m-d");
		
		$date3=date_create($date1);
		$date4=date_create($date2);
		
		$diff=date_diff($date3,$date4);
		$a=$diff->format("%a");; 
		//echo $a; exit;
		
			if($a >=$emailver_reminder || $thumbnil_image!='')
			{
				
			$sql = getdata("SELECT subject,message from tbldatingemailmaster WHERE emailid=39");
			while($row= mysqli_fetch_array($sql))
			{
			$subject = $row[0];
			$message = $row[1];
			$email=$regemail;
			
			 $verify_msg='Click <a href="'.$sitepath.'emailverify.php?b='.$verificationcode.'">here</a> to verify your email address with us. Verification code is '.$verificationcode.' '; 
			
			
			
			$subject = str_replace("[sitename]",$subject,$message);
			$message = str_replace("[sitename]",$sitename,$message);			
			$message = str_replace("[name]",$name,$message);
			$message = str_replace("[extramsg]",$verify_msg,$message);
			//echo $message; exit;
			sendemaildirect($email,$subject,$message);		
			
			$sql_ins="INSERT INTO `tbl_cron_master_new`(`email`, `userid`, `templateid`,`createdate`,`type`)
			 VALUES ('".$regemail."','".$userid."','17',curdate(),'4')";
			 execute($sql_ins);
			
			$sql_upd="UPDATE `tbldatingusermaster` SET emailver_reminder_send='".date("Y-m-d")."' where 
			userid='".$userid."' ";
			 execute($sql_upd);
			
			
			}
				
			}
			
		
}
		
?>

<h1>Email Verify Reminder Email Sent Successfully</h1>
<? } else { 
	header("location:dashboard.php?msg=no");
} ?>
