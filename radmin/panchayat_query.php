<?
session_start();
include('commonfileadmin.php');
$_SESSION[$session_name_initital . "admin_user_search"]='';
$qry='';
if(isset($_POST['panchayat']) && $_POST['panchayat']!='')
{
	$district=$_POST['panchayat'];
  $qry .=" and tbldating_panchayat_master.title like '".$district."%'";
}
if(isset($_POST['cmbstate']) && $_POST['cmbstate']!='0.0')
{
	$cmbstate=$_POST['cmbstate'];
  $qry .=" and tbldating_panchayat_master.district_id='".$cmbstate."'";
}
$_SESSION[$session_name_initital . "admin_user_search"]=$qry;
header('location:panchayatmanager.php');
exit;
?>