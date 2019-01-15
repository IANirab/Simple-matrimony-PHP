<?php
$sitename = "paroshi.com";
$dbhostname = "localhost";
$dbusername = "paroshic_paroshic";
$dbpassword = "kxmcwQzLTrTR";
$databasename = "paroshic_matri2018jl";

$siteuploadfilepath = "uploadfiles";
$uploadfilepath  = $sitepath . "uploadfiles/";
$siteuploadfilepath_new= $sitepath."uploadfiles/site_default5/";
//$securepath=$_SERVER['DOCUMENT_ROOT']."work2015/DemoMatrimony/SECI_MAT/"; // for local
$securepath=$_SERVER['DOCUMENT_ROOT']."/../SECI_MAT/";  // for online
$date_format = "%d-%m-%Y";
if(isset($_SERVER['DOCUMENT_ROOT']) && $_SERVER['DOCUMENT_ROOT']!=''){
	$abspath = $_SERVER['DOCUMENT_ROOT']."/";
} else {
	$abspath = $cronsname;	
}
date_default_timezone_set("Asia/kolkata");

$sitethemefolder = "default5";


	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
$cronsname = "MatrimonialCron";
$totreordperpageadminside = 50;
$smtp_host_name = "paroshi.com";
$cookienmforfilenm = "partimonialuserfilenm";
$cookienmforusernm = "partimonialusernm";
$totalrecordperpageuserside = 10;
$totalfriendtodisplayonepage = 20;
$friendtotalindisplayprofile = 20;
$commenttotaldisplayindisplayprofile = 20;
$blogtotaldisplayindisplayprofile = 20;
$total_latest_event_display_home_page = 5;
$total_latest_article_display_home_page = 5;
$textbox_character_max_length = 255;
$memo_character_max_length = 1000;
$preffered_partner_match_default_days = 30;
$user_uploaded_images_for_mobile ="";
$default_folder_name ="english";
$admintitle = "Matrimonial Software - Administrator Control Panel";
$session_name_initital ="parmatrimony";
ini_set("SMTP",$smtp_host_name);
$total_refer_email_ctrl = 10;
$maximum_record_can_bulk_upload_profile = 100;
?>