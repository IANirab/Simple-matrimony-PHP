<?
session_start();
include('commonfileadmin.php');
$_SESSION[$session_name_initital . "admin_user_search"]='';
$qry='';
if(isset($_POST['subcast']) && $_POST['subcast']!='')
{
	$subcast=$_POST['subcast'];
  $qry .=" and tbldatingsubcastmaster.title like '".$subcast."%'";
}
if(isset($_POST['cmbcast']) && $_POST['cmbcast']!='0.0')
{
	$cmbcast=$_POST['cmbcast'];
  $qry .=" and tbldatingsubcastmaster.castid='".$cmbcast."'";
}
$_SESSION[$session_name_initital . "admin_user_search"]=$qry;
header('location:subcastmanager.php');
exit;
?>