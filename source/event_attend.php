<?
require_once('commonfile.php');
ob_start();
if(isset($_GET['b']) && $_GET['b']!='' && is_numeric($_GET['b'])){ 
$eventid = $_GET['b'];}
else{
$eventid = '';}
$attendeventid = getonefielddata("select id from tbl_dating_inquiry_master where email='". $_POST["email"] ."' and currentstatus=0 and eventid=$eventid ");
	if ($attendeventid != "")
	{
		header("location:message.php?b=54");
		exit();
	}	else	{
		$action =0;
		$query = sendtogeneratequery($action,"eventid",$eventid,"Y");
		$query .= sendtogeneratequery($action,"name",$_POST["name"],"Y");
		$query .= sendtogeneratequery($action,"email",$_POST["email"],"Y");
		$query .= sendtogeneratequery($action,"phone",$_POST["phone"],"Y");
		$query .= sendtogeneratequery($action,"createip",getip(),"Y");
		$query .= sendtogeneratequery($action,"subjectid",4,"Y");
		$query .= sendtogeneratequery($action,"browser_info",$_SERVER["HTTP_USER_AGENT"],"Y");
		$query = substr($query,1);	
		execute("insert into tbl_dating_inquiry_master (eventid,name,email,phone,createip,subjectid,browser_info,createdate) values(" . $query .",now())");
		header("location:message.php?b=55");
}
ob_flush();
?>