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
?><!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<META NAME="ROBOTS" CONTENT="INDEX,NOFOLLOW">
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onLoad="start()">

<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
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
        <h1 class="pagetitle">Email Verify Reminder Cron Help
            
         
            </h1>
			<div class="addlink1">	
            	
				<div class="addlink">
                
                <a href="cron_email_verify.php">Run File</a>
                </div>
			</div>
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent">
<!-- ********* CONTENT START HERE *********-->
<? checkerroradmin()?>

<div class="cron_section">
<div class="cron_help_text">			
<h1>Cron handles following activites</h1>
<ul>
<li>1. Check User Email Verify or not </li>
<li>2. If User Cant verify email Untill 30 Days, Sent Reminder Email</li>
<li>3. Get Entry in DataBase </li>
<li>4. Send Email </li>
<li>5. Can't Send repeat mail within 20 days, After 1 mail sent (if user still not verify email)</li>
<li>4. Delete user , after 6 month (if user still not verify email) </li>
</ul>
</div>
<div class="cron_help_text">			
<h1>File Name</h1>
<ul>
<li><i>cron_email_verify.php</i></li>
</ul>
</div>

<div class="cron_help_text">			
<h1>Cron File Settings</h1>
<ul>
<li>
1.Cron File, Send Email, if user not verify email no. of days<br>
Control from -> cron_update_profile.php ($emailver_reminder)</li>
<li>
2. Cron File, Send Email at once 200 Users <br/>
Control from -> cron_update_profile.php ($limit)</li>
<li>
3. Cron File, Can't Send repeat mail within 20 days, After 1 mail sent (if user still not verify email)<br>
Control from -> cron_update_profile.php ($send_again)</li>
<li>
4. Cron File, use email template <br>
Control from -> tbldatingemailmaster (emailid=39)</li>
<li>
5. Cron File, Entry of Email<br> 
See in  -> tbl_cron_master_new (type=4)</li>
</ul>
</div>
</div>








	
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>			
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>
<? } else { 
	header("location:dashboard.php?msg=no");
} ?>