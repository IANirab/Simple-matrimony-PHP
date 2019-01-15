<?php
ob_start();
include_once("commonfile.php");
checklogin($sitepath);
$action = $curruserid;

$txtpersonality=get_form_data($_POST['txtpersonality'],1);

if(isset($_POST['txtprofileheadline']) && $_POST['txtprofileheadline']!=''){
	$txtprofileheadline =$_POST['txtprofileheadline'];	
	$txtprofileheadline = remove_numbers($txtprofileheadline);
} else {$txtprofileheadline = '';}

if(isset($_POST['txtfamilybackground']) && $_POST['txtfamilybackground']!=''){
	$txtfamilybackground = $_POST['txtfamilybackground'];
	$txtfamilybackground = remove_numbers($txtfamilybackground);
} else {$txtfamilybackground = '';}


$query = sendtogeneratequery($action,"personality",$txtpersonality,"Y");
$query .= sendtogeneratequery($action,"familybackground",$txtfamilybackground,"Y");
$query .= sendtogeneratequery($action,"profileheadline",$txtprofileheadline,"Y");

$txtmother_occupation=get_form_data($_POST['txtmother_occupation'],1);
$txtbrother_married1=get_form_data($_POST['txtbrother_married1'],1);
$txtbrother_unmarried1=get_form_data($_POST['txtbrother_unmarried1'],1);
$txtsister_married1=get_form_data($_POST['txtsister_married1'],1);
$txtsister_unmarried1=get_form_data($_POST['txtsister_unmarried1'],1);
$father_name=get_form_data($_POST['father_name'],1);
$mother_name=get_form_data($_POST['mother_name'],1);
$cmbfather=get_form_data($_POST['cmbfather'],1);
$cmbmother=get_form_data($_POST['cmbmother'],1);
$cmbdiet=get_form_data($_POST['cmbdiet'],1);
$cmbsmokerstatus=get_form_data($_POST['cmbsmokerstatus'],1);
$cmbdrinkerstatus=get_form_data($_POST['cmbdrinkerstatus'],1);


$father_nameofc=get_form_data($_POST['father_nameofc'],1);
$mother_nameofc=get_form_data($_POST['mother_nameofc'],1);


$query .= sendtogeneratequery($action,"mother_occupation",$txtmother_occupation,"Y");
$query .= sendtogeneratequery($action,"brother_married1",$txtbrother_married1,"Y");
$query .= sendtogeneratequery($action,"brother_unmarried1",$txtbrother_unmarried1,"Y");
$query .= sendtogeneratequery($action,"sister_married1",$txtsister_married1,"Y");
$query .= sendtogeneratequery($action,"sister_unmarried1",$txtsister_unmarried1,"Y");
$query .= sendtogeneratequery($action,"father_name",$father_name,"Y");
$query .= sendtogeneratequery($action,"mother_name",$mother_name,"Y");
$query .= sendtogeneratequery($action,"father_status_id",$cmbfather,"Y");
$query .= sendtogeneratequery($action,"mother_status_id",$cmbmother,"Y");
$query .= sendtogeneratequery($action,"dietid",$cmbdiet,"Y");
$query .= sendtogeneratequery($action,"smokerstatusid",$cmbsmokerstatus,"Y");
$query .= sendtogeneratequery($action,"drinkerstatusid",$cmbdrinkerstatus,"Y");

$query .= sendtogeneratequery($action,"father_nameofc",$father_nameofc,"Y");
$query .= sendtogeneratequery($action,"mother_nameofc",$mother_nameofc,"Y");

updateprofile($query,$curruserid);

if(isset($_POST['txtfather_occupation']) && $_POST['txtfather_occupation']!='')
{
	execute ("Insert into tbldatingfathermotherstatusmaster (title,currentstatus,languageid) 
	values ('".$_POST['txtfather_occupation']."','5','$sitelanguageid') ");

	$action = getonefielddata("SELECT max(id) from tbldatingfathermotherstatusmaster");
	execute("update tbldatingusermaster set father_occupation=".$action);
}

execute("delete from tbldatinguserlanguagemaster where userid=$curruserid");
if(isset($_POST['chklang']) && $_POST['chklang']!='')
{
	$chklang=implode(",",$_POST['chklang']);
	execute("insert into tbldatinguserlanguagemaster (userid,languageid) values ($curruserid,'')");
	execute("UPDATE `tbldatinguserlanguagemaster` SET `languageid`='".$chklang."' WHERE userid=$curruserid");
}

$_SESSION[$session_name_initital . "error"] = $messageerrmess10;
header("location:updateprofile2.php");
ob_flush();
?>