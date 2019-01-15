<?
session_start();
include('commonfileadmin.php');
$_SESSION[$session_name_initital . "admin_user_search"]='';
$qry='';
if(isset($_POST['state']) && $_POST['state']!='')
{
	$state=$_POST['state'];
  $qry=" and tbldating_state_master.title like '".$state."%'";
}
$_SESSION[$session_name_initital . "admin_user_search"]=$qry;
header('location:statemanager.php');
exit;
?>