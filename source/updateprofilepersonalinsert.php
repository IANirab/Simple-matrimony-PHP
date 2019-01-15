<?php ob_start();
include_once("commonfile.php");
checklogin($sitepath);
$action = $curruserid;

 $txtname=get_form_data($_POST['txtname'],1);  $txtname=check_lalid_length_input($txtname);	
 $cmblookingfor=get_form_data($_POST['cmblookingfor'],2);
 $cmbmaritalstatus=get_form_data($_POST['cmbmaritalstatus'],2);
 $cmbkids=get_form_data($_POST['cmbkids'],2);
 $no_children=get_form_data($_POST['no_children'],2);
 $cmbheight=get_form_data($_POST['cmbheight'],2);
 $cmbweight=get_form_data($_POST['cmbweight'],2);
 $cmbcomplexion=get_form_data($_POST['cmbcomplexion'],2);
 $cmbbodytype=get_form_data($_POST['cmbbodytype'],2);
 $cmbeyecolor=get_form_data($_POST['cmbeyecolor'],2);
 $cmbblood_group=get_form_data($_POST['cmbblood_group'],2);
 $cmbprofilecreatedby=get_form_data($_POST['cmbprofilecreatedby'],2); 
 $cmbhearaboutusid=get_form_data($_POST['cmbhearaboutusid'],2);
 
 if(isset($_POST['wantchildren1']) && $_POST['wantchildren1']!='')
 {
	$wantchildren1=$_POST['wantchildren1'];
 }else{$wantchildren1='';}



 	
	$query  = sendtogeneratequery($action,"name",$txtname,"Y","N");
	$query .= sendtogeneratequery($action,"lookingforid",$cmblookingfor,"Y");
	$query .= sendtogeneratequery($action,"maritalstatusid",$cmbmaritalstatus,"Y");
	$query .= sendtogeneratequery($action,"kidsid",$cmbkids,"Y");		
	$query .= sendtogeneratequery($action,"no_children",$no_children,"Y");	
	$query .= sendtogeneratequery($action,"heightid",$cmbheight,"Y");
	$query .= sendtogeneratequery($action,"weightid",$cmbweight,"Y");
	$query .= sendtogeneratequery($action,"complexionid",$cmbcomplexion,"Y");
	$query .= sendtogeneratequery($action,"bodytypeid",$cmbbodytype,"Y");
	$query .= sendtogeneratequery($action,"eyecolorid",$cmbeyecolor,"Y");
	$query .= sendtogeneratequery($action,"want_children",$wantchildren1,"Y");
	$query .= sendtogeneratequery($action,"blood_group",$cmbblood_group,"Y");
	$query .= sendtogeneratequery($action,"profilecreatebyid",$cmbprofilecreatedby,"Y");
	$query .= sendtogeneratequery($action,"hearaboutusid",$cmbhearaboutusid,"Y");
	
	if ($Enable_HIV_thelesima_illiness_blood_group_design_setting == "Y") 
	{ 
	
		$txtcd4count=get_form_data($_POST['txtcd4count'],1);
		$artstatus1=get_form_data($_POST['artstatus1'],1);
		$txthivsince=get_form_data($_POST['txthivsince'],1);
		$cmbspecialcase=get_form_data($_POST['cmbspecialcase'],2);
		$txt_illiness=get_form_data($_POST['txt_illiness'],1);
		$radthelisimia=get_form_data($_POST['radthelisimia'],1); 

		$query .= sendtogeneratequery($action,"thelisimia",$radthelisimia,"Y");
		$query .= sendtogeneratequery($action,"illiness",$txt_illiness,"Y");
		$query .= sendtogeneratequery($action,"specialcasesid",$cmbspecialcase,"Y");
		$query .= sendtogeneratequery($action,"hiv_since",$txthivsince,"Y","N");
		$query .= sendtogeneratequery($action,"cd4_count",$txtcd4count,"Y","N");
		$query .= sendtogeneratequery($action,"art_status",$artstatus1,"Y");
	}
	
	updateprofile($query,$curruserid);

$_SESSION[$session_name_initital . "error"] = $messageerrmess7;
header("location:updateprofileintrest.php");
ob_flush();
?>