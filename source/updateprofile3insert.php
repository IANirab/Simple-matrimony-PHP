<?php ob_start();
include_once("commonfile.php");
checklogin($sitepath);
$action = $curruserid;
$cmbeducation = '';

if($Enable_additional_qualification=='Y') { 
if(isset($_POST['othercmbeducation']) && $_POST['othercmbeducation']!=""){	
	$othercmbeducation = $_POST['othercmbeducation'];
	$sql = "INSERT into tbl_education_master SET cat_id=13,title='".$othercmbeducation."', currentstatus='5'";
	execute($sql);
	$cmbeducation = getonefielddata("SELECT max(id) from tbl_education_master");
} else if(isset($_POST['cmbeducation']) && $_POST['cmbeducation']!='0.0') {
	$cmbeducation = $_POST['cmbeducation'];
} else {
	$cmbeducation = "";
}
} else if(isset($_POST['cmbeducation']) && $_POST['cmbeducation']!='0.0'){
	$cmbeducation = $_POST['cmbeducation'];	
} else {
	$cmbeducation = '';	
}

$cmboccupation=get_form_data($_POST['cmboccupation'],2);
$education_in_details=get_form_data($_POST['education_in_details'],1);
$txt_education_detail=get_form_data($_POST['txt_education_detail'],1);
$txtservice_location=get_form_data($_POST['txtservice_location'],1);

$query = sendtogeneratequery($action,"educationid",$cmbeducation,"Y");
$query .= sendtogeneratequery($action,"ocupationid",$cmboccupation,"Y");
$query .= sendtogeneratequery($action,"edudetails",$education_in_details,"Y");
$query .= sendtogeneratequery($action,"education_detail",$txt_education_detail,"Y");




if ($Enable_occupation_textbox_design_setting == "Y")
{   $txt_occupation_detail=get_form_data($_POST['txt_occupation_detail'],1);
	$query .= sendtogeneratequery($action,"occupation_detail",$txt_occupation_detail,"Y");
}

if ($Enable_pg_industry_functional_area_field_design_setting == "Y") 
{
	$cmbpg=get_form_data($_POST['cmbpg'],2);
	$txt_pg_other=get_form_data($_POST['txt_pg_other'],1);
	$cmbindustry=get_form_data($_POST['cmbindustry'],1);
	$txt_industry_other=get_form_data($_POST['txt_industry_other'],1);
	$cmb_work_function=get_form_data($_POST['cmb_work_function'],2);
	$txt_work_function_other=get_form_data($_POST['txt_work_function_other'],2);	
	
	$query .= sendtogeneratequery($action,"edu_pg_id",$cmbpg,"Y");
	$query .= sendtogeneratequery($action,"edu_pg_other",$txt_pg_other,"Y");
	$query .= sendtogeneratequery($action,"industry_id",$cmbindustry,"Y");
	$query .= sendtogeneratequery($action,"industry_other",$txt_industry_other,"Y");
	$query .= sendtogeneratequery($action,"work_function_id",$cmb_work_function,"Y");
	$query .= sendtogeneratequery($action,"work_function_other",$txt_work_function_other,"Y");
}


$query .= sendtogeneratequery($action,"service_location",$txtservice_location,"Y");


// state code start
if(isset($_POST['cmbstateid']) && $_POST['cmbstateid']!='')
{
	$cmbstateid=$_POST['cmbstateid'];
}else{$cmbstateid='';}

if(isset($_POST['otherstate']) && $_POST['otherstate']!=''){
	$sql = "INSERT into tbldating_state_master SET country_id='".$_POST['txtservice_location']."',
	 title='".$_POST['otherstate']."',languageid=1,currentstatus='5'";
	execute($sql);
	$cmbstateid = getonefielddata("SELECT max(id) from tbldating_state_master");		
}
$query .= sendtogeneratequery($action,"service_state",$cmbstateid,"Y");
// state code end

// institute code start
if(isset($_POST['cmb_institute']) && $_POST['cmb_institute']!='')
{
	$cmb_institute=$_POST['cmb_institute'];
}else{$cmb_institute='';}

if(isset($_POST['txt_institute_other']) && $_POST['txt_institute_other']!=''){
	$sql = "INSERT into tbl_dating_institute_master SET 
	 title='".$_POST['txt_institute_other']."',languageid=1,currentstatus='5'";
	execute($sql);
	$cmb_institute = getonefielddata("SELECT max(id) from tbl_dating_institute_master");		
}
$query .= sendtogeneratequery($action,"instituteid",$cmb_institute,"Y");
// institute code end

// city code start
if(isset($_POST['cmbcityid']) && $_POST['cmbcityid']!='')
{
	$cmbcityid=$_POST['cmbcityid'];
}else{$cmbcityid='';}

if(isset($_POST['city_other']) && $_POST['city_other']!=''){
	$sql = "INSERT into tbldating_city_master SET state_id='".$cmbstateid."', title='".$_POST['city_other']."',languageid=1,currentstatus='5'";
	execute($sql);
	$cmbcityid = getonefielddata("SELECT max(id) from tbldating_city_master");		
}
$query .= sendtogeneratequery($action,"service_city",$cmbcityid,"Y");
// city code end

$cmbannualincome_currancy=get_form_data($_POST['cmbannualincome_currancy'],2);	
$cmbannualincome=get_form_data($_POST['cmbannualincome'],2);	
$cmb_status_id=get_form_data($_POST['cmb_status_id'],2);	
if(isset($_POST['working_partner']) && $_POST['working_partner']!='')
{
	$working_partner=$_POST['working_partner'];
}else{$working_partner='';}
$company_name=get_form_data($_POST['company_name'],1);	

$query .= sendtogeneratequery($action,"annual_income_currancyid",$cmbannualincome_currancy,"Y");
$query .= sendtogeneratequery($action,"annual_income_id",$cmbannualincome,"Y");
$query .= sendtogeneratequery($action,"occupationstatusid",$cmb_status_id,"Y");
$query .= sendtogeneratequery($action,"working_partner",$working_partner,"Y");
$query .= sendtogeneratequery($action,"company_name",$company_name,"Y");

updateprofile($query,$curruserid);

$_SESSION[$session_name_initital . "error"] = $messageerrmess11;
header("location:updateprofile4.php");
ob_flush();
?>