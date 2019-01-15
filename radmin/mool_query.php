<?
session_start();
include('commonfileadmin.php');
$_SESSION[$session_name_initital . "admin_user_search"]='';
$qry='';
if(isset($_POST['mool']) && $_POST['mool']!='')
{
	$mool=$_POST['mool'];
  $qry .=" and  tbldatingmool_master.title like '".$mool."%'";
}
if(isset($_POST['cmbsubcast']) && $_POST['cmbsubcast']!='0.0')
{
	$cmbsubcast=$_POST['cmbsubcast'];
  $qry .=" and  tbldatingmool_master.subcasteid='".$cmbsubcast."'";
}
$_SESSION[$session_name_initital . "admin_user_search"]=$qry;
header('location:datingmool_manager.php');
exit;
?>