<?
session_start();
include('commonfileadmin.php');
$_SESSION[$session_name_initital . "admin_user_search"]='';
$qry='';
if(isset($_POST['education']) && $_POST['education']!='')
{
	$education=$_POST['education'];
  $qry .=" and   tbl_education_master.title like '".$education."%'";
}
if(isset($_POST['cat_id']) && $_POST['cat_id']!='0.0')
{
	$cat_id=$_POST['cat_id'];
  $qry .=" and   tbl_education_master.cat_id='".$cat_id."'";
}
$_SESSION[$session_name_initital . "admin_user_search"]=$qry;
header('location:education_manager.php');
exit;
?>