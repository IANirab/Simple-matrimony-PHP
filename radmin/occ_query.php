<?
session_start();
include('commonfileadmin.php');
$_SESSION[$session_name_initital . "admin_user_search"]='';
$qry='';
if(isset($_POST['occupation']) && $_POST['occupation']!='')
{
	$occupation=$_POST['occupation'];
  $qry .=" and   tbldatingoccupationmaster.title like '".$occupation."%'";
}
if(isset($_POST['cat_id']) && $_POST['cat_id']!='0.0')
{
	$cat_id=$_POST['cat_id'];
 // $qry .=" and   tbldatingoccupationmaster.cat_id='".$cat_id."'";
}
$_SESSION[$session_name_initital . "admin_user_search"]=$qry;
header('location:occupation_manager.php');
exit;
?>