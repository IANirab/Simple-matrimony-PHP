<?

ob_start();
include("commonfile.php");
$action = 0;

if((isset($_POST['subject']) && $_POST['subject']=="") || !isset($_POST['subject'])){
	$_SESSION[$session_name_initital . "error"] = "Please Enter Subject";
	header("location:contactus.php");
	exit;
}
if((isset($_POST['name']) && $_POST['name']=="") || !isset($_POST['name'])){
	$_SESSION[$session_name_initital . "error"] = "Please Enter Name";
	header("location:contactus.php");
	exit;
}
if((isset($_POST['email']) && $_POST['email']=="") || !isset($_POST['email'])){
	$_SESSION[$session_name_initital . "error"] = "Please Enter Email";
	header("location:contactus.php");
	exit;
}
if($_SESSION[$session_name_initital."contactcaptcha"]!=$_POST['captcha']){
	$_SESSION[$session_name_initital . "error"] = "Please Enter Proper Image Code";
	header("location:contactus.php");
	exit;
}
	$inquiry_type = $_POST['inquiry_type'];
	$subject = check_lalid_length_input($_POST['subject']);
	$name= check_lalid_length_input($_POST['name']); 
	$email = check_lalid_length_input($_POST['email']);
	$phone = check_lalid_length_input($_POST['phone']);
	$message= check_lalid_length_input($_POST['message'],"M"); 
    $pagename= $_POST['pagename']; 
	$browser_info = $_SERVER["HTTP_USER_AGENT"];
	$query = sendtogeneratequery($action,"subject",strip_tags($subject),"Y");
	$query .= sendtogeneratequery($action,"name",strip_tags($name),"Y");
	$query .= sendtogeneratequery($action,"email",strip_tags($email),"Y");
	$query .= sendtogeneratequery($action,"phone",strip_tags($phone),"Y");
	$query .= sendtogeneratequery($action,"message",strip_tags($message),"Y");
	$query .= sendtogeneratequery($action,"createip",getip(),"Y");
	$query .= sendtogeneratequery($action,"pagename",$pagename,"Y");
	$query .= sendtogeneratequery($action,"browser_info",$browser_info,"Y");
	$query .= sendtogeneratequery($action,"subjectid",$inquiry_type,"Y");
	$query = substr($query,1);
 $sSql = "insert into tbl_dating_inquiry_master (subject,name,email,phone,message,createip,pagename,browser_info,subjectid,createdate) values(" . $query .",now())"; 
	execute($sSql);	
	$inquiry_type = getonefielddata("SELECT title from tbl_dating_inquiry_subject_master WHERE id=".$inquiry_type);	
	$extramessage = "<br> inquiry for : " . strip_tags($inquiry_type);
	$extramessage .= "<br> subject : " . strip_tags($subject);
	$extramessage .= "<br> name : " . strip_tags($name);
	$extramessage .= "<br> email : " . strip_tags($email);
	$extramessage .= "<br> phone : " . strip_tags($phone);
	$extramessage .= "<br> message : " . strip_tags($message);
	$extramessage .= "<br> page name : " . strip_tags($pagename);
	$extramessage .= "<br> browser info : " . strip_tags($browser_info);
	sendemail(21,"",$extramessage,findsettingvalue("AdminMail"));	
	header("location:message.php?b=53");
	ob_flush();
?>