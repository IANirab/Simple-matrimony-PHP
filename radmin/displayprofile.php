<? session_start();
require_once("commonfileadmin.php");
require_once("jquery_include.php");
checkadminlogin();
$country_code = '';
$curruserid = '';
$Horoscope ='';
$login_id='';
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){
	$user_mnager_um_1 = user_mnager_um_1();
	$user_mnager_um_2 = user_mnager_um_2();
	$user_mnager_um_3 = user_mnager_um_3();
	$user_mnager_um_4 = user_mnager_um_4();
	$user_mnager_um_5 = user_mnager_um_5();
	$user_mnager_um_6 = user_mnager_um_6();
	$user_mnager_um_7 = user_mnager_um_7();
	$user_mnager_um_8 = user_mnager_um_8();
	$user_mnager_um_9 = user_mnager_um_9();
} else {
	$user_mnager_um_1 = "N";	
	$user_mnager_um_2 = "N";
	$user_mnager_um_3 = "N";
	$user_mnager_um_4 = "N";
	$user_mnager_um_5 = "N";
	$user_mnager_um_6 = "N";
	$user_mnager_um_7 = "N";
	$user_mnager_um_8 = "N";	
	$user_mnager_um_9 = "N";
} 

require_once("displayprofile_coding.php");
	//require_once("translation.php");



 ?>		
 
 <? 
if($user_mnager_um_9=='Y' || $user_mnager_um_9=='N')	{ 
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Display Profile</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css">

<link href="fonts/stylesheet.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript" src="jquery/jquery.js"></script>

<script type="text/javascript">
        var GB_ROOT_DIR = "../greybox/";
    </script>
<script type="text/javascript" src="../greybox/AJS.js"></script>
<script type="text/javascript" src="../greybox/AJS_fx.js"></script>
<script type="text/javascript" src="../greybox/gb_scripts.js"></script>
<link href="../greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
<script language="javascript" type="text/javascript" src="jquery/jquery.js"></script>
<script language="javascript" type="text/javascript">
function update_event(userid){
	alert(userid);
}
</script>
<script language="javascript" type="text/javascript">
function addtofav(touserid,fromuserid){	
	if(touserid!='' && fromuserid!=''){
		$.post("addtofav.php",{
			to:touserid,
			from:fromuserid	
		}, function (data){
			alert(data);
		})
	}	
}
function sendinterest(touserid,fromuserid){
	if(touserid!='' && fromuserid!=''){
		$.post("sendinterest.php",{
			touser:touserid,
			from:fromuserid			
		}, function (data){
			alert(data);	
		})	
	}
}
function reloading(){	
	window.location.reload();	
}

</script>
</head>

<body>
<!--header start-->    
<?
	include("admintop.php");
?>

<div class="pagewrapper Displayprofile">
	<div class="container">
    	<div class="col-lg-12">
            <div id="center-in">
		<!-- ********* TITLE START HERE *********-->
        <?
		$displayprofileprofile_code ='';
		$displayprofileyrs='';
		$displayprofilelocation='';
		$displayprofilebd='';
		$displayprofilelastlogin='';
		$objbottombanner='';
		?>
		<div class="contain_section">
        <h1 class="pagetitle alag_title"><?= $name ?> <strong>[ <?= $displayprofileprofile_code ?>   <?=	$profile_code ?>] </strong> </h1>   
        
       
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		<? $lastlogin='';?>
<div class="displayprofilemain">
<div class="upper_id">
	<div class="displayprofileimage"><?=$imagenm?></div>	
	<div class="displayprofileageetc">
		<?= $age ?> <?= $displayprofileyrs ?>,
		<?= $genderid ?><br />
		<?= $displayprofilelocation ?> <?= $area ?>
		<? if ( $city != "") { ?>, <?= $city ?><? } ?>
		<? if ( $state != "") { ?>, <?= $state ?><? } ?>
		<? if ( $state != "") { ?>, <?= $countryid ?><? } ?><br /><br /> 
		<?= $displayprofilebd ?> <?= $dob ?> &nbsp;&nbsp;|&nbsp;&nbsp;<?= $zodiacsign ?>  &nbsp;&nbsp;|&nbsp;&nbsp;  
		<span class=""><?= $displayprofilelastlogin ?> : <?=$lastlogin ?></span>
	</div>
    </div>

<?php /*?><div class="displayprofileheadline">
	<?= $headline ?><br />
	<? if ($partner_religianid_can_contact != "") { ?><span class="religionnote">
		<?= $partner_religianid_can_contact ?>
		<?= $displayprofile_partner_religianid_can_contact ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<? } ?>
	<? if ($partner_castid_can_contact != "") { ?>
	<span class="religionnote">
		<?= $partner_castid_can_contact ?>
		<?= $displayprofile_partner_castid_can_contact ?></span><? } ?>
	<br /><br />
	<div class="displayprofileexpress">
		<?= find_express_inrest_image($curruserid,$userid) ?> &nbsp; &nbsp;&nbsp;
		<a href='<?= $sitepath ?>album/<?= $userid ?>'><img align="absmiddle" src="<?= $siteimagepath ?>images/albumicon.gif" border="0" alt=""  /> <!--<?= $searchgridalbumlink ?>--></a>
		<? if ($imageonrequest == "Y") { ?>&nbsp;&nbsp; 
		<a href='<?= $sitepath ?>imagerequest.php?b=<?= $userid ?>'>
		<img align="absmiddle" src="<?= $siteimagepath ?>images/imagerequesticon.gif" border="0" alt=""/> <!--<?= $searchgridimagerequest ?>--></a>
		<? } ?>&nbsp;&nbsp;
		<span class="displayprofileseal"><?= findverificationsealmember($dispayuserid) ?></span>
	<? if($manyata_seal_module_enable=='Y') { ?>
	<span class="purchaseprofileseal"><?= check_weather_to_display_manyate_seal_banner($curruserid,$dispayuserid) ?></span>
	<? } ?>
</div>
</div><?php */?>
<div class="displayprofileicons">
<? //include("iconcommon.php") ?>
</div>

<?php /*?><div class="printlink">
	<input onClick="printPage()" type="submit" value="&nbsp;" name="B1" />  &nbsp;&nbsp; <?= $edit_link ?>  <?= $acceptlink ?>  <?= $declinedlink ?>
</div><?php */?>

<? /*if ($socialbookmarkcode != "") { ?>
<div class="displayprofilesocialbookmark"><h3><?= $displayprofilesocialbookmarkcodehead ?></h3> <?= $socialbookmarkcode ?></div>
<? }*/ ?>

<?php /*?><div class="printlink"><a href="<?= $sitepath ?>listingdisplaypdf.php?b=<?= $dispayuserid ?>"><img src="<?= $siteimagepath ?>images/pdficon.gif" alt="" border="0" /></a></div><?php */?>

<? $objbottombanner='';
   $displayprofilehead1='profilehead1:';
   $displayprofilecreatedby='displayprofilecreatedby:';
   
   $displayprofilekids='Kids:';
   $displayprofilelookingfor='Looking For:';
   $displayprofilemaritalstatus='Matrial status:';
   $displayprofileheight='';
   $displayprofileweight='';
   $occupation_detail='';
?>
<div class="displayprofileblocks">
	<div class="profilebanner"><? //links
	
	?></div>

<div class="displayprofileblockmain">
<div class="table-responsive">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td width="50%"><div class="displayprofileblockleft">
		<h4 class=""><?= $displayprofilehead1 ?></h4>
		<div class="">
		<fieldset>
		<? if ($profilecreatebyid != "") { ?>
		<p><label><?= $displayprofilecreatedby ?></label><?= $profilecreatebyid ?>&nbsp;</p>
		<? } ?>
		<? if ($lookingforid != "") { ?>
		<p><label><?= $displayprofilelookingfor ?></label> <?= $lookingforid ?>&nbsp;</p>
		<? } ?>

		<? if ($maritalstatusid != "") { ?>
		<p><label><?= $displayprofilemaritalstatus ?></label> <?= $maritalstatusid ?>&nbsp;</p>
		<? } ?>
		<? if ($kidsid != "") { ?>
		<p><label><?= $displayprofilekids ?></label> <?= $kidsid ?>&nbsp;</p>
		<? } ?>
		<? if ($heightid != "") { ?>
		<p><label><?= $displayprofileheight ?></label> <?= $heightid ?>&nbsp;</p>
		<? } ?>
		<? if ($weightid != "") { ?>
		<p><label><?= $displayprofileweight ?></label> <?= $weightid ?>&nbsp;</p>
		<? } ?>
		<? if ($eyecolorid != "") { ?>
		<p><label><?= $displayprofileeyecolor ?></label> <?= $eyecolorid ?>&nbsp;</p>
		<? }?>
		<? if ($bodytypeid != "") { ?>
		<p><label><?= $displayprofilebodytype ?></label> <?= $bodytypeid ?>&nbsp;</p>
		<? }?>
		<? if ($complexionid != "") { ?>
		<p><label><?= $displayprofilecomplexion ?></label> <?= $complexionid ?>&nbsp;</p>
		<? } ?>
		<? if ($specialcasesid != "") { ?>
		<p><label><?= $displayprofilespecialcase ?></label> <?= $specialcasesid ?>&nbsp;</p>
		<? } ?>
		</fieldset>
		</div>	
		<h4 class=""><?= $displayprofilehead2 ?></h4>
		<div class="">
		<fieldset>
		<? if ($ethnic != "") { ?>
		<p><label><?= $displayprofileethnic ?></label> <?= $ethnic ?>&nbsp;</p>
		<? } 
		 if ($religianid != "") { ?>
		<p><label><?= $displayprofilereligion ?></label> <?= $religianid ?>&nbsp;</p>
		<? } if($religianid=='Muslim') { 
			if($revert!="") {
		?>
		<p><label><?= $displayprofileborn ?></label> <?= $revert ?>&nbsp;</p>
		<? } if($prayer!="") { ?>
			<p><label><?= $displayprofileprayer ?></label> <?= $prayer ?>&nbsp;</p>
		<? } if($zakat!="") { ?>	
		<p><label><?= $displayprofilezakat ?></label> <?= $zakat ?>&nbsp;</p>
		<? } if($fasting!="") { ?>
		<p><label><?= $displayprofilefasting ?></label> <?= $fasting ?>&nbsp;</p>		
		<? } if($quran != "") { ?>
		<p><label><?= $displayprofilequran ?></label> <?= $quran ?>&nbsp;</p>
		<? } ?> 
		
		<?
		} ?>
		<? if ($castid != "") { ?>
		<p><label><?= $displayprofilecaste ?></label> <?= $castid ?>&nbsp;</p>
		<? } ?>
		<? if ($subcast != "") { ?>
		<p><label><?= $displayprofilesubcaste ?></label> <?= $subcast ?>&nbsp;</p>
		<? } ?>
		<? if ($motherthoungid != "") { ?>
		<p><label><?= $displayprofilemothertoung ?></label> <?= $motherthoungid ?>&nbsp;</p>
		<? } ?>
		<? if ($familyvalueid != "") { ?>
		<p><label><?= $displayprofilefamilyvalue ?></label> <?= $familyvalueid ?>&nbsp;</p>
		<? } ?>
	
		<? if ($dob != "") { ?>
		<p><label><?= $displayprofiledob ?></label> <?= $dob ?>&nbsp;</p>
		<? } ?>
        
        <? 
		?>
		<? if ($birthtime != "") { ?>
		<p><label><?= $displayprofilebirthtime ?></label> <?= $birthtime ?>&nbsp;</p>
		<? } ?>
		<? if ($birthplace != "") { ?>
		<p><label><?= $displayprofilebirthplace ?></label> <?= $birthplace ?>&nbsp;</p>
		<? } ?>
		
	
		<? if (findsettingvalue("Religion_field_display") == "H")  { ?>
		<? if ($gotra != "") { ?>
		<p><label><?= $displayprofilegotra ?></label> <?= $gotra ?>&nbsp;</p>
		<? } ?>
		<? if ($moonsign != "") { ?>
		<p ><label><?= $displayprofilemoonsign ?></label> <?= $moonsign ?>&nbsp;</p>
		<? } ?>
		<? if ($sunsignid != "") { ?>
		<p  ><label><?= $displayprofilesunsign ?></label> <?= $sunsignid ?>&nbsp;</p>
		<? } ?>
		<? if ($grahid != "") { ?>
		<p ><label><?= $displayprofilegrahid ?></label> <?= $grahid ?>&nbsp;</p>
		<? } ?>
		<? } ?>
		<? if (findsettingvalue("Religion_field_display") == "M") { ?>
		<?
		 if ($religiosness_id != "") { ?>
		<p><label><?= $displayprofilereligiosness_id ?></label> <?= $religiosness_id ?>&nbsp;</p>
		<? } ?>
		<? if ($hijab_id != "") { ?>
		<p><label><?= $displayprofilehijab_id ?></label> <?= $hijab_id ?>&nbsp;</p>
		<? } ?>
		<? if ($beard_id != "") { ?>
		<p><label><?= $displayprofilebeard_id ?></label> <?= $beard_id ?>&nbsp;</p>
		<? } ?>
		<? if ($revert_islam_id != "") { ?>
		<p><label><?= $displayprofilerevert_islam_id ?></label> <?= $revert_islam_id ?>&nbsp;</p>
		<? } ?>
	
		<? if ($halal_strict_id != "") { ?>
		<p><label><?= $displayprofilehalal_strict_id ?></label> <?= $halal_strict_id ?>&nbsp;</p>
		<? } ?>
	
		<? if ($halal_strict_id != "") { ?>
		<p><label><?= $displayprofilesalah_perform_id ?></label> <?= $salah_perform_id ?>&nbsp;</p>
		<? } ?>
		<? } ?>
		</fieldset>
		</div>
</div></td>
<td width="50%">

<div class="displayprofileblockright">

	<h4 class=""><?= $displayprofilehead4 ?></h4>
	<div class="">
	<fieldset>
	<? if ($dietid != "") { ?>
	<p><label><?= $displayprofilediet ?></label> <?= $dietid ?>&nbsp;</p>
	<? } ?>
	<? if ($smokerstatusid != "") { ?>
	<p><label><?= $displayprofilesmokerstatus ?></label> <?= $smokerstatusid ?>&nbsp;</p>
	<? } ?>
	<? if ($drinkerstatusid != "") { ?>
	<p><label><?= $displayprofiledrinkerstatus ?></label> <?= $drinkerstatusid ?>&nbsp;</p>
	<? } ?>
	</fieldset>
	</div>
	
	<h4 class=""><?= $displayprofilehead5 ?></h4>
	<div class="">
	
	<fieldset>
	<? if ($residancystatusid != "") { ?>
	<p><label><?= $displayprofileresidencystatus ?></label> <?= $residancystatusid ?>&nbsp;</p>
	<? } ?>
	<? if ($countryofbirth != "") { ?>
	<p><label><?= $displayprofilecountryofbirth ?></label> <?= $countryofbirth ?>&nbsp;</p>
	<? } ?>
	<? if ($countryofgrewup != "") { ?>
	<p><label><?= $displayprofilegrewupcountry ?></label> <?= $countryofgrewup ?>&nbsp;</p>
	<? } ?>
	</fieldset>
	
	</div>
	
	<h4 class=""><?= $displayprofilehead3 ?></h4>
	<div class="">
	<fieldset>
	<? if ($educationid != "") { ?>
	<p style="height:38px; padding-top:5px;"><label><?= $displayprofileeducation ?></label><br />
	<?= $educationid ?><? if ($education_detail != "") { ?>
	&nbsp;&nbsp; [ <?= $education_detail ?> ]&nbsp;
	<? } ?></p>
	<? } ?>
	<? if ($ocupationid != "") { ?>
	<p style="height:38px; padding-top:5px;"><label><?= $displayprofileoccupation ?></label><br />
	<?= $ocupationid ?>
	<? if ($occupation_detail != "") { ?>
	&nbsp;&nbsp; [ <?= $occupation_detail ?> ]
	<? } ?>
	</p>
	<? } ?>
	<!-- <? if ($annualincome != "") { ?>
	<p style="height:38px; padding-top:5px;"><label><?= $displayprofileannualincome ?></label><br />
	<?= $annualincome ?>&nbsp;</p>
	<? } ?> -->
	
<? if ($annual_income_id != "") { ?>
	<p style="height:38px; padding-top:5px;"><label><?= $displayprofileannualincome ?></label><br />
	<?= $annual_income_id ?> <?= $annual_income_currancyid ?>&nbsp;</p>
	<? } ?>
	
	<? if ($edu_pg_id != "") { ?>
	<p style="height:38px; padding-top:5px;"><label><?= $displayprofileedu_pg ?></label><br />
	<?= $edu_pg_id ?>
	<? if ($edu_pg_other != "") { ?>
	&nbsp;&nbsp; [ <?= $edu_pg_other ?> ]
	<? } ?>
	</p>
	<? } ?>
	<? if ($industry_id != "") { ?>
	<p style="height:38px; padding-top:5px;"><label><?= $displayprofileindustry ?></label><br />
	<?= $industry_id ?>
	<? if ($industry_other != "") { ?>
	&nbsp;&nbsp; [ <?= $industry_other ?> ]
	<? } ?>
	</p>
	<? } ?>
	<? if ($work_function_id != "") { ?>
	<p style="height:38px; padding-top:5px;"><label><?= $displayprofilework_function ?></label><br />
	<?= $work_function_id ?>
	<? if ($work_function_other != "") { ?>
	&nbsp;&nbsp; [ <?= $work_function_other ?> ]
	<? } ?>
	</p>
	<? } ?>
	<? if ($instituteid != "") { ?>
	<p style="height:38px; padding-top:5px;"><label><?= $displayprofileinstitute ?></label><br />
	<?= $instituteid ?>
	<? if ($institute_other != "") { ?>
	&nbsp;&nbsp; [ <?= $institute_other ?> ]
	<? } ?>
	</p>
	<? } ?>
	
	
	<? if ($service_location != "") { ?>
	<p style="height:38px; padding-top:5px;"><label><?= $displayprofileservice_location ?></label><br />
	<?= $service_location ?>
	</p>
	<? } ?>

	<? if ($service_area != "") { ?>
	<p style="height:38px; padding-top:5px;"><label><?= $displayprofileservice_area ?></label><br />
	<?= $service_area ?>
	</p>
	<? } ?>

	
	
	</fieldset>
	</div>
</div>

</td>
</tr>
</table>
</div>




</div>




<div class="displayprofileothers2">
<h4 class=""><?= $displayprofileother ?></h4>
<div class="">
<fieldset>
<? if ($personality != "") { ?>
<p><label><?= $displayprofilepersonality ?></label><br /><?= $personality ?> 
</p>
<? } ?>
<? if ($familybackground != "") { ?>
<p><label><?= $displayprofilefamilybackground ?></label><br /><?= $familybackground ?></p>
<? } ?>
<? if ($hobbiesintrest != "") { ?>
<p><label><?= $displayprofilehobbyinterest ?></label><br /><?= $hobbiesintrest ?></p>
<? } ?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr valign="top">
<td>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="dispbrosis">
	<tr>
	<td class="">&nbsp;</td>
	<td class="" width="37%"><?= $updateintrestprofilemarried ?></td>
	<td class="" width="37%"><?= $updateintrestprofileunmarried ?></td>
	</tr>
	<tr>
	<td class=""><?= $updateintrestprofilebrother_married1 ?></td>
	<td height="30" class=""><? if ($brother_married1 != "") { ?><?= $brother_married1 ?>
<? } ?></td>
	<td class=""><? if ($brother_unmarried1 != "") { ?><?= $brother_unmarried1 ?><? } ?></td>
	</tr>
	<tr>
	<td class="" style="border-bottom:none"><?= $updateintrestprofilesister1 ?></td>
	<td height="40" class=""><? if ($sister_married1 != "") { ?><?= $sister_married1 ?><? } ?></td>
	<td class=""><? if ($sister_unmarried1 != "") { ?><?= $sister_unmarried1 ?><? } ?></td>
	</tr>
	</table>
</td>
<td width="200px">
<? if ($father_occupation != "") { ?>
<div class=""><strong><?= $displayprofilefather_occupation ?></strong><br />
<?= $father_status_id ?> <?= $father_occupation ?></div>
<? } ?>

<? if ($mother_occupation != "") { ?>
<div class=""><strong><?= $displayprofilemother_occupation ?></strong><br />
<?= $mother_status_id ?> <?= $mother_occupation ?></div>
<? } ?>
</td>
</tr>
</table>

<!--<? if ($brother_married2 != "") { ?>
<p><label><?= $displayprofilebrother_married2 ?></label><br /><?= $brother_married2 ?></p>
<? } ?>
<? if ($brother_unmarried2 != "") { ?>
<p><label><?= $displayprofilebrother_unmarried2 ?></label><br /><?= $brother_unmarried2 ?></p>
<? } ?>
<? if ($sister_married2 != "") { ?>
<p><label><?= $displayprofilesister_married2 ?></label><br /><?= $sister_married2 ?></p>
<? } ?>
<? if ($sister_unmarried2 != "") { ?>
<p><label><?= $displayprofilesister_unmarried2 ?></label><br /><?= $sister_unmarried2 ?></p>
<? } ?>-->



<? if ($personalvalueid != "") { ?>
<p><label style="width:30%;"><?= $displayprofilepersonalvalue ?></label><?= $personalvalueid ?></p>
<? } ?>
<? if ($wantchildrenid != "") { ?>
<p><label style="width:30%;"><?= $displayprofilewantchildren ?></label><?= $wantchildrenid ?></p>
<? } ?>
<? if ($language != "") { ?>
<p><label style="width:30%;"><?= $displayprofilelanguagecanspeak ?></label><?= $language ?></p>
<? } ?>

<? if ($hiv != "") { ?>
<p class="profileillness"><label style="width:30%;"><?= $displayprofilehiv ?></label><?= $hiv ?></p>
<? } ?>
<? if ($thelisimia != "") { ?>
<p class="profileillness"><label style="width:30%;"><?= $displayprofilethelisimia ?></label><?= $thelisimia ?></p>
<? } ?>
<? if ($illiness != "") { ?>
<p class="profileillness"><label style="width:30%;"><?= $displayprofileilliness ?></label><?= $illiness ?></p>
<? } ?>
<? if ($blood_group != "") { ?>
<p class="profileillness"><label style="width:30%;"><?= $displayprofileblood_group ?></label><?= $blood_group ?></p>
<? } ?>

</fieldset>
</div>
</div>








<div class="displayprofileblockright">
<h4 class=""><?=$new_atitle?></h4>
<fieldset>

<?php
		 
		
		    $ad_family_name='';
			$ad_family_education='';
			$ad_family_married_to='';
			$ad_family_occupation='';
			$ad_family_dsof='';
			$type='';
			$title='';
			$ds_type='';
			$head_title='';
			$fp_title='';
			$ftype='';
			
		
		 
		    $get_advance_family_details = getdata("select name,education,occupation,married_to,`d/s_of`,type,ftype from tbldating_advancefamily where $commonque  order by ftype, id desc");
          while($rsfamilydetails= mysqli_fetch_array($get_advance_family_details)){
		 
		         $ad_family_name=$rsfamilydetails['name'];
				 
		         $ad_family_married_to=$rsfamilydetails['married_to'];
				 
				 $ad_family_dsof=$rsfamilydetails[4];
				 
				 if($rsfamilydetails['occupation']!=""){
		         $ad_family_occupation = findihtitle($rsfamilydetails['occupation'],"tbldatingoccupationmaster");
	             }
				 
				 if($rsfamilydetails['education']!=""){
		         $ad_family_education = findihtitle($rsfamilydetails['occupation'],"tbl_education_master");
	             }
				 
				 $type=$rsfamilydetails['type'];
				 if($type!=""){	
	             $title = getonefielddata("SELECT title from tbl_advance_family_type where currentstatus=0  AND id=".$type);
				  
	             }
				 
				 if($type==1 || $type==3 || $type== 5)
				 { $ds_type=$new_do; }else{$ds_type=$new_so; }
				 
				  $ftype=$rsfamilydetails['ftype'];
				  if($ftype=='p'){
					  $fp_title=$new_ptitle;
				  }elseif($ftype=='m'){
					  $fp_title=$new_mtitle;
				  }elseif($ftype=='f'){
					  $fp_title=$new_atitle;
				  }else{
					  $fp_title='';
				  }
				  
				  
				  
				  
				 
				 
	    ?>
        
        
          
		<p><label><?=$new_name?></label><span><?=$ad_family_name?> (<?=$title?>)(<?=$fp_title?>)</span></p>
        <? if($ad_family_education!=''){ ?>
        <p><label><?=$new_edu?></label><span><?=$ad_family_education?></span></p>
        <? } ?> 
        <? if($ad_family_occupation!=''){ ?>
        <p><label><?=$new_occ?></label><span><?=$ad_family_occupation?></span></p>
        <? } ?>
         <? if($ad_family_married_to!=''){ ?>
        <p><label><?=$new_mt?></label><span><?=$ad_family_married_to?></span></p>
        <? } ?>
         <? if($ad_family_dsof!=''){ ?>
        <p><label><?=$ds_type?></label><span><?=$ad_family_dsof?></span></p>
        <? } ?>
		
               </br></br>
		
		<?  } ?>
        


</fieldset>
</div>







<? if ($partner_genderid != "") { ?>
<div class="displayprofileblockright">
<h4 class=""><?= $displayprofilepartner ?></h4>
<fieldset>
<? if ($partner_genderid != "") { ?>
<p><label><?= $displayprofile_partnergender ?></label><?= $partner_genderid ?>&nbsp;</p>
<? } ?>

<? if ($partner_agefrom != "") { ?>
<p><label><?= $displayprofile_partner_agefrom ?></label><?= $partner_agefrom ?>&nbsp;</p>
<? } ?>
<? if ($partner_ageto != "") { ?>
<p><label><?= $displayprofile_partner_ageto ?></label><?= $partner_ageto ?>&nbsp;</p>
<? } ?>
<? if ($partner_location != "") { ?>
<p><label><?= $displayprofile_partner_location ?></label><?= $partner_location ?>&nbsp;</p>
<? } ?>
<? if ($partner_religianid != "") { ?>
<p><label><?= $displayprofile_partner_religianid ?></label><?= $partner_religianid ?>&nbsp;</p>
<? } ?>
<? if ($partner_castid != "") { ?>
<p><label><?= $displayprofile_partner_castid ?></label><?= $partner_castid ?>&nbsp;</p>
<? } ?>
<? if ($partner_grahid != "") { ?>
<p ><label><?= $displayprofile_partner_grahid ?></label><?= $partner_grahid ?>&nbsp;</p>
<? } ?>
<? if ($partner_occupation != "") { ?>
<p><label><?= $displayprofile_partner_occupation ?></label><?= $partner_occupation ?>&nbsp;</p>
<? } ?>
<? if ($partner_education != "") { ?>
<p><label><?= $displayprofile_partner_education ?></label><?= $partner_education ?>&nbsp;</p>
<? } ?>
<? if ($partner_maritalstatus != "") { ?>
<p><label><?= $displayprofile_partner_maritalstatus ?></label><?= $partner_maritalstatus ?>&nbsp;</p>
<? } ?>
<? if ($partner_heightfrom != "") { ?>
<p><label><?= $displayprofile_partner_heightfrom ?></label><?= $partner_heightfrom ?>&nbsp;</p>
<? } ?>
<? if ($partner_heightto != "") { ?>
<p><label><?= $displayprofile_partner_heightto ?></label><?= $partner_heightto ?>&nbsp;</p><? } ?>
<? if ($partner_smokeids != "") { ?>
<p><label><?= $displayprofile_partner_smokeids ?></label><?= $partner_smokeids ?>&nbsp;</p>
<? } ?>
<? if ($partner_drinkids != "") { ?>
<p><label><?= $displayprofile_partner_drinkids ?></label><?= $partner_drinkids ?>&nbsp;</p>
<? } ?>
<? if ($partner_states != "") { ?>
<p><label><?= $displayprofile_partner_states ?></label><?= $partner_states ?>&nbsp;</p>
<? } ?>
<? if ($partner_kidsids != "") { ?>
<p><label><?= $displayprofile_partner_kidsids ?></label><?= $partner_kidsids ?>&nbsp;</p>
<? } ?>

<? if ($partner_pg_education != "") { ?>
<p><label><?= $displayprofile_partner_pg_education ?></label><?= $partner_pg_education ?>&nbsp;</p>
<? } ?>

<? if ($partner_industry != "") { ?>
<p><label><?= $displayprofile_partner_industry ?></label><?= $partner_industry ?>&nbsp;</p>
<? } ?>

<? if ($partner_functional_area != "") { ?>
<p><label><?= $displayprofile_partner_functional_area ?></label><?= $partner_functional_area ?>&nbsp;</p>
<? } ?>

	
<? if (findsettingvalue("Religion_field_display") == "M") { ?>
<? if ($partner_functional_area != "") { ?>
<p><label><?= $displayprofile_partner_hijab_id ?></label><?= $partner_hijab_id ?>&nbsp;</p>
<? } ?>
<? if ($partner_beard_id != "") { ?>
<p><label><?= $displayprofile_partner_beard_id ?></label><?= $partner_beard_id ?>&nbsp;</p>
<? } ?>
<? if ($partner_revert_islam_id != "") { ?>
<p><label><?= $displayprofile_partner_revert_islam_id ?></label><?= $partner_revert_islam_id ?>&nbsp;</p>
<? } ?>
<? if ($partner_halal_strict_id != "") { ?>
<p><label><?= $displayprofile_partner_halal_strict_id ?></label><?= $partner_halal_strict_id ?>&nbsp;</p>
<? } ?>
<? if ($salah_perform_id != "") { ?>
<p><label><?= $displayprofile_partner_salah_perform_id ?></label><?= $partner_salah_perform_id ?>&nbsp;</p>
<? } ?>

<? if ($religiosness_id != "") { ?>
<p><label><?= $displayprofile_partner_religiosness_id ?></label><?= $partner_religiosness_id ?>&nbsp;</p>
<? } ?>

<? }?>

</fieldset>
</div>
<? } ?>


<? if ($externalvideourl != "") { ?>
<div class="displayprofileexternalvideo">
<h3><?= $displayprofileexternalvideo ?></h3><object width="448" height="356">
<param name="movie" value="<?= $externalvideourl ?>"></param>
<param name="wmode" value="transparent"></param>
<embed src="<?= $externalvideourl ?>" type="application/x-shockwave-flash" wmode="transparent" width="448" height="356">
</embed>
</object>
</div>
<? } ?>


<? /*if ($externalbioprofile != "") { ?>
<div class="displayprofileexternalbioprofile">
<img src="<?= $siteimagepath ?>images/social.gif" alt="" style="float:left; margin-top:5px; padding-left:10px; margin-right:20px;" /><h3><?= $name ?>'s <?= $displayprofileexternalbioprofileurl ?></h3><a href="<?= $externalbioprofile ?>" target="_blank"><?= $externalbioprofile ?></a>
</div>
<? }*/ ?>



<?php /*?><div style="text-align:center">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="center">
<div class="sendtofriend" align="center">
<div class="sendtofriend1"><form method="post" name="frm_send_friend" action="<?= $sitepath ?>send_email_friend.php?b=<?= $dispayuserid ?>">
<?= $sendfriendtitle ?><br /><input name="txtemail" id="txtemail" type="text" class="sendfriendform" maxlength="255" />
<input type="submit" class="sendfriendbtn" value="<?= $sendfriendsend ?>" />
</form></div>
</div>
</td>
</tr>
</table>
</div><?php */?>

</div>
</div>


<div class="nextback">

</div>
<p>&nbsp;</p>
		<!-- ********* CONTENT END HERE *********-->
		</div>
		</div>
		</div>
		</div>
	<!-- CENTER END ######################## -->
	</div></div>
	<!-- FOOTER START ######################## -->
 	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>

<? } else { 
	header("location:dashboard.php?msg=no");
} ?>