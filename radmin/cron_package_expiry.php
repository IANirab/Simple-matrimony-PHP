<? session_start();
require_once("commonfileadmin.php");
checkadminlogin();

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


// alter qry user master expire_package_send 
// if neww package add, admin clear it , count of user master reset
$limit=200; // no of mail send at once


		$result = getdata("select userid,expiredate,email,name,packageid,to_days(expiredate) - to_days(curdate()) from tbldatingusermaster where currentstatus=0  and packageid!='' and 
(to_days(expiredate) - to_days(curdate())=10 or to_days(expiredate) - to_days(curdate())=5 
or to_days(expiredate) - to_days(curdate())=1 )
 and expire_package_send > to_days(expiredate) - to_days(curdate()) limit ".$limit." ");		

		while($rs= mysqli_fetch_array($result))
{
			$userid=$rs[0];
			$expiredate=$rs[1]; 
			$regemail=$rs[2]; 
			$name=$rs[3]; 
			$packageid=$rs[4];
			$a=$rs[5];
			$display_date = date("d/m/Y", strtotime($expiredate)); 
		
		//$date1 = date("Y-m-d", strtotime($expiredate)); 
//		$date2=date("Y-m-d");
//		
//		$date3=date_create($date1);
//		$date4=date_create($date2);
//		
//		$diff=date_diff($date3,$date4);
//		$a=$diff->format("%a");; 
		
		$pack_name = getonefielddata("SELECT Description from tbldatingpackagemaster WHERE PackageId=".$packageid);
			if($a==10 || $a==5 || $a==1)
			{
				
			$sql = getdata("SELECT subject,message from tbldatingemailmaster WHERE emailid=38");
			while($row= mysqli_fetch_array($sql))
			{
			$subject = $row[0];
			$message = $row[1];
			$email=$regemail;
			
			// $verify_msg='Click <a href="'.sitepath.'emailverify.php?b='.$verificationcode.'">here</a> to verify your email address with us. Verification code is '.$verificationcode.' '; 
			
			
			//$subject = str_replace("[sitename]",sitename,$subject);
			
			$message = str_replace("[sitename]",$sitename,$message);			
			$message = str_replace("[name]",$name,$message);
			$message = str_replace("[day]",$a,$message);
			$message = str_replace("[pckname]",$pack_name,$message);
			//echo $message; exit;
			//$message = str_replace("[extramessage]",$verify_msg,$message);
			sendemaildirect($email,$subject,$message);		
			
			$sql_ins="INSERT INTO `tbl_cron_master_new`(`email`, `userid`, `templateid`,`message`,`createdate`,`type`)
			 VALUES ('".$regemail."','".$userid."','38','".$a."day Remain',curdate(),'2')";
			 execute($sql_ins);
			 
			 $sql_upd="UPDATE `tbldatingusermaster` SET expire_package_send='".$a."' where 
			userid='".$userid."' ";
			execute($sql_upd);
			 
			
			}
				
			}
			
		
}
		
?>

<h1>Package Expiry Email Sent Successfully</h1>
<? } else { 
	header("location:dashboard.php?msg=no");
} ?>