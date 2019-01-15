<?
session_start();
include('commonfileadmin.php');
$_SESSION[$session_name_initital . "admin_user_search"]='';
$qry='';
if(isset($_POST['district']) && $_POST['district']!='')
{
	$district=$_POST['district'];
  $qry .=" and tbldating_district_master.title like '".$district."%'";
}
if(isset($_POST['cmbstate']) && $_POST['cmbstate']!='0.0')
{
	$cmbstate=$_POST['cmbstate'];
  $qry .=" and tbldating_district_master.state_id='".$cmbstate."'";
}
$_SESSION[$session_name_initital . "admin_user_search"]=$qry;
header('location:districtmanager.php');
exit;
?>