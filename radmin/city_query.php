<?
session_start();
include('commonfileadmin.php');
$_SESSION[$session_name_initital . "admin_user_search"]='';
$qry='';
if(isset($_POST['city']) && $_POST['city']!='')
{
	$city=$_POST['city'];
  $qry .=" and tbldating_city_master.title like '".$city."%'";
}
if(isset($_POST['cmbstate']) && $_POST['cmbstate']!='0.0')
{
	$cmbstate=$_POST['cmbstate'];
  $qry .=" and tbldating_city_master.state_id='".$cmbstate."'";
}
$_SESSION[$session_name_initital . "admin_user_search"]=$qry;
header('location:citymanager.php');
exit;
?>