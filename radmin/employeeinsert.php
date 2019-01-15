<?php
session_start();
require_once("commonfileadmin.php");
checkadminlogin("Y");
if ((isset($_GET["b"])) && is_numeric($_GET["b"]) && $_GET["b"]!=0)
	{
	  $action = $_GET["b"];
	  $CreateByfld = "ModifyBy";
	  $ipfldnm = "ModifyIP";
	  $exque = "LoginId <> $action and ";
	}
else
	{
	  $action = 0;
	  $CreateByfld = "CreateBy";
	  $ipfldnm = "CreateIP";
	  $exque="";
	}
	$LoginId = getonefielddata("select LoginId from tbldatingadminloginmaster where $exque UserName='" . $_POST['txtusername'] . "' and CurrentStatus=0");
	if ($LoginId != "")
	{
		$_SESSION[$session_name_initital . "adminerror"] = "this user name already exist";
		header("location:employeemaster.php?b=$action");
		exit();
	}
	
	$ip = $_SERVER["REMOTE_ADDR"];
	$query = sendtogeneratequery($action,"name",$_POST['txtname'],"Y");
	$query .= sendtogeneratequery($action,"UserName",$_POST['txtusername'],"Y");
	$query .= sendtogeneratequery($action,"emp_role_id",$_POST['emp_role'],"Y");
	$query .= sendtogeneratequery($action,"EmailAddress",$_POST['email'],"Y");	
	$query .= sendtogeneratequery($action,"GroupId",2,"Y");
	$query .= sendtogeneratequery($action,"allowed_ip",$_POST['allowed_ip'],"Y");		
	$query .= sendtogeneratequery($action,"$CreateByfld",$_SESSION[$session_name_initital . 'adminlogin'],"Y");
	$query .= sendtogeneratequery($action,"$ipfldnm",$ip,"Y");
	
	$query = substr($query,1);

	if ($action == 0)
	{
	 	$sSql = "insert into tbldatingadminloginmaster (name,UserName,emp_role_id,EmailAddress,GroupId,allowed_ip,CreateBy,$ipfldnm,CreateDate) values($query,curdate())";		
		execute($sSql);		
		$action = getonefielddata("select max(LoginId) from tbldatingadminloginmaster");
		$get_inserted_ip = getonefielddata("SELECT allowed_ip from tbldatingadminloginmaster WHERE LoginId=".$action);
		//allow IP start
		//if($get_inserted_ip!=''){
			execute("DELETE from tbl_allowed_ip WHERE emp_id=".$action);
			$allow_ip = get_inserted_ip;
			$allowed_ip_arr = explode(",",$allow_ip);
			for($i=0; $i<count($allowed_ip_arr); $i++){
				$aip = $allowed_ip_arr[$i];				
				execute("INSERT into tbl_allowed_ip SET emp_id=".$action.", ip='".$aip."'");
			}
			//enter to tbldatingusermaster start
			$dusersql = "INSERT into tbldatingusermaster SET is_empadmin='Y', empid=".$action.", email='".$_POST['email']."', password='".$_POST['txtpassword']."', name='".$_POST['txtname']."'";
			execute($dusersql);
			$datinguserid = getonefielddata("SELECT max(userid) from tbldatingusermaster");
			execute("UPDATE tbldatingadminloginmaster SET datinguserid=".$datinguserid." WHERE loginid=".$action);			
			//end tbldatingusermaster
		//}
		//allow IP end
		if($agent_module_enable=='Y'){
		$agent_sql = "INSERT into tbl_agent_master SET emp_id=".$action.", name='".$_POST['txtusername']."', email='".$_POST['email']."', password='".$_POST['txtpassword']."', reg_commission='".$_POST['reg_commission']."', membership_commission='".$_POST['membership_commission']."', discount_percentage='".$_POST['discount_percentage']."', createdate=curdate(),createip='".$ip."',createby=".$_SESSION[$session_name_initital . 'adminlogin']."";
		execute($agent_sql);
		$agt_action = getonefielddata("select max(agentid) from tbl_agent_master");
		$agent_code = rand() . $agt_action;
		execute("UPDATE tbl_agent_master SET agent_code=".$agent_code." WHERE agentid=".$agt_action);		
		$retfile ="employeemanager.php";
		}
	}
	else
	{
		$sSql = "update tbldatingadminloginmaster set $query,ModifyDate=curdate() where LoginId=$action";
		execute($sSql);
		$get_inserted_ip = getonefielddata("SELECT allowed_ip from tbldatingadminloginmaster WHERE LoginId=".$action);
		//allow IP start
		//if($get_inserted_ip!=''){
			execute("DELETE from tbl_allowed_ip WHERE emp_id=".$action);
			$allow_ip = $get_inserted_ip;
			$allowed_ip_arr = explode(",",$allow_ip);
			for($i=0; $i<count($allowed_ip_arr); $i++){
				$aip = $allowed_ip_arr[$i];				
				execute("INSERT into tbl_allowed_ip SET emp_id=".$action.", ip='".$aip."'");
			}
		//}
		//allow IP end
		
		//enter to tbldatingusermaster start		
			$dusersql = "UPDATE tbldatingusermaster SET is_empadmin='Y', email='".$_POST['email']."', password='".$_POST['txtpassword']."', name='".$_POST['txtname']."' WHERE empid=".$action;
			execute($dusersql);						
			//end tbldatingusermaster
		
		if($agent_module_enable=='Y'){
		$agent_updsql = "update tbl_agent_master SET emp_id=".$action.", name='".$_POST['txtusername']."', email='".$_POST['email']."', reg_commission='".$_POST['reg_commission']."', membership_commission='".$_POST['membership_commission']."', discount_percentage='".$_POST['discount_percentage']."', modifydate=curdate(), modifyip='".$ip."',modifyby=".$_SESSION[$session_name_initital . 'adminlogin']." WHERE emp_id=".$action;
		execute($agent_updsql);		
		$retfile ="employeemanager.php";
		}
	}
	if ($_POST['txtpassword'] != ""){
			execute("update tbldatingadminloginmaster set Password='" . md5($_POST['txtpassword']) ."',ModifyDate=curdate(),ModifyBy=" . $_SESSION[$session_name_initital . 'adminlogin'] . " where LoginId=$action");
		if($agent_module_enable=='Y'){
			execute("UPDATE tbl_agent_master SET password='".$_POST['txtpassword']."' WHERE emp_id=".$action);
		}
	}
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:employeemanager.php");
?>