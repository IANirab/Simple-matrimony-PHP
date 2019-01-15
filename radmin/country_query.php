<?
session_start();
include('commonfileadmin.php');
$_SESSION[$session_name_initital . "admin_user_search"]='';
$qry='';
if(isset($_POST['country']) && $_POST['country']!='')
{
	$country=$_POST['country'];
  $qry=" and tbldatingcountrymaster.title like '".$country."%'";
}
$_SESSION[$session_name_initital . "admin_country_search"]=$qry;
header('location:countrymanager.php');
exit;
?>