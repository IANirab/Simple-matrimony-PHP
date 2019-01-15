<?
include("commonfileadmin.php");
$empid = 0;
$useid = 0;
if(isset($_POST['empid']) && $_POST['empid']!=''){
	$empid = $_POST['empid'];
}
if(isset($_POST['userid']) && $_POST['userid']!=''){
	$userid = $_POST['userid'];
}
if($empid>0 && $userid>0){
	execute("UPDATE tbldatingusermaster SET staff_agentid=".$empid." WHERE userid=".$userid);
	$agent_userid = getonefielddata("SELECT agent_userid from tbl_agent_user_master WHERE userid=".$userid);	
	if($agent_userid>0){
		execute("UPDATE tbl_agent_user_master SET agentid=".$empid." WHERE agent_userid=".$agent_userid);
	} else {
		execute("INSERT into tbl_agent_user_master SET agentid=".$empid.", userid=".$userid.", createdate=curdate(), createip='".$_SERVER['REMOTE_ADDR']."'");	
	}
}
?>