<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);

if($role_id!="0"){	
	$user_mnager_um_6 = user_mnager_um_6();	
	$user_mnager_um_7 = user_mnager_um_7();	
	$user_mnager_um_8 = user_mnager_um_8();
} else {	
	$user_mnager_um_6 = "N";
	$user_mnager_um_7 = "N";
	$user_mnager_um_8 = "N";
}
$filenm = "usermanager.php";
if(isset($_GET['ex']))
$return_que = $_GET['ex'];
else
$return_que = "";
if ($return_que != "")
	$return_que = str_replace("*","&",$return_que);
if(isset($_GET['b1'])) {
	$status = $_GET['b1'];
	if($status=='3'){
		if($user_mnager_um_6 == 'Y' || $user_mnager_um_6 == 'N') {
			$status = $_GET['b1'];
		} else {
			header("location:dashboard.php?msg=no");
			exit;
		}	
	}

	if($status=='0' || $status=='1'){
		if($user_mnager_um_7 == 'Y' || $user_mnager_um_7 == 'N') {
			$status = $_GET['b1'];
		} else {
			header("location:dashboard.php?msg=no");
			exit;
		}	
		
	}
	
	if($status=='5'){
		if($user_mnager_um_8 == 'Y' || $user_mnager_um_8 == 'N') {
			$status = $_GET['b1'];
		} else {
			header("location:dashboard.php?msg=no");
			exit;
		}		
	}
} else {
	$status = "0.0";
}	
	
if ((isset($_GET["b"])) && is_numeric($_GET["b"]))
	$action = $_GET["b"];
else
	$action = 0;
/*if ($status == 3)
if (check_employee_module_enabled() != "Y")
{
	header("location:dashboard.php");
	exit();
}*/

$sSql = "update tbldatingusermaster set currentstatus =$status where userid=$action";
execute($sSql);

if($status==8)
{
	execute("DELETE FROM tbldatingusermaster where userid='".$action."' ");
}


if ($status == 3)
$_SESSION[$session_name_initital . "adminerror"] = "information delete successfully";
else
$_SESSION[$session_name_initital . "adminerror"] = "information saved successfully";
header("location:$filenm?ex=0" . $return_que);
?>