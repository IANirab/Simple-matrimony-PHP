<?
session_start();
require_once("commonfileadmin.php");

$mess = "";
if (($_POST['txtusername'] != "") && ($_POST['txtpassword'] != ""))
{
	
	$mess = "invalid user name or password";	
	$result = getdata("select Password,LoginId,GroupId,emp_role_id,allowed_ip from tbldatingadminloginmaster where UserName ='" . $_POST['txtusername'] ."' and CurrentStatus =0");
	while ($row = mysqli_fetch_array($result))
	{
		if($row[3]!=0 && $row[4]!=''){
			$fetch_ip = getonefielddata("SELECT count(id) from tbl_allowed_ip WHERE emp_id=".$row[1]." AND ip!=''");
			if($fetch_ip!=0){				
			$fetch_allow_ip = getonefielddata("SELECT count(id) from tbl_allowed_ip WHERE emp_id=".$row[1]." AND ip IN ('".$_SERVER['REMOTE_ADDR']."')");						
			if($fetch_allow_ip==0){
				$_SESSION[$session_name_initital . "adminerror"] = "Invalid Network Conifiguration";
				header("location:login.php");	
				exit;
			}
			}
		}
		
		
		$pass=str_replace(" ","",md5($_POST['txtpassword']));
		$r_pass=str_replace(" ","",$row[0]);
	
		if ($r_pass==$_POST['txtpassword'])
		{
		//echo($row[0] ."-" .  md5($_POST['txtpassword']));
			if (!($session_name_initital . "adminlogin"))
				($session_name_initital . "adminlogin");
			if (!($session_name_initital . "adminlogin_group"))
				($session_name_initital . "adminlogin_group");
				$_SESSION[$session_name_initital.'adminlogin'] = $row[1];
				$_SESSION[$session_name_initital . 'adminlogin_group'] = $row[2];
				$mess = "";
		}
	}
	freeingresult($result);
	if (!$mess == "")
		$_SESSION[$session_name_initital . "adminerror"] = $mess;
	else
		$_SESSION[$session_name_initital . "adminerror"] = "";

}
if ($mess == "")
	header("location:dashboard.php");
else
	header("location:login.php");
?>