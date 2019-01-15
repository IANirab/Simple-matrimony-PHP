<?
session_start();
include('commonfileadmin.php');
$_SESSION[$session_name_initital . "admin_user_search"]='';
$qry='';
if(isset($_POST['cast']) && $_POST['cast']!='')
{
	$cast=$_POST['cast'];
  $qry .=" and tbldatingcastmaster.title like '".$cast."%'";
}
if(isset($_POST['cmbreligian']) && $_POST['cmbreligian']!='0.0')
{
	$cmbreligian=$_POST['cmbreligian'];
  $qry .=" and tbldatingcastmaster.religianid='".$cmbreligian."'";
}
$_SESSION[$session_name_initital . "admin_user_search"]=$qry;
header('location:castmanager.php');
exit;
?>