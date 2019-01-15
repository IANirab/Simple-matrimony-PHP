<?
session_start();
require_once("commonfileadmin.php");
checkadminlogin();
/*$result = getdata("SELECT settingid,help_text from tbldatingsettingmaster WHERE currentstatus=0");
while($rs=mysqli_fetch_array($result)){
	echo "UPDATE tbldatingsettingmaster SET help_text='".$rs['help_text']."' WHERE settingid=".$rs['settingid'].";<br>";
}
exit;
*/
$login_id = $_SESSION[$session_name_initital . 'adminlogin'];
$role_id = getonefielddata("SELECT emp_role_id from tbldatingadminloginmaster WHERE LoginId=".$login_id);
if($role_id!="0"){	
	$question_mgmnt_qm_1 = question_mgmnt_qm_1();	
} else {	
	$question_mgmnt_qm_1 = "N";
}
if($question_mgmnt_qm_1 == 'Y' || ($question_mgmnt_qm_1 == 'N' && $role_id==0)) { 
//if($question_mgmnt_qm_1 == 'Y') { ?>
<!DOCTYPE HTML  "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title><?= $admintitle ?></title>
<link href="adminstyle.css" rel="stylesheet" type="text/css"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body onLoad="start()">

<!-- TOP START ######################## -->
<?php include("admintop.php") ?>
<!-- TOP END ######################## -->
<div class="pagewrapper">
	<div class="container">
		<!-- LEFT START ######################## -->
		<?php include("adminleft.php") ?>
		<!-- LEFT END ######################## -->
		
		<!-- RIGHT START ######################## -->
		<?php include("adminright.php") ?>
		<!-- RIGHT END ######################## -->

		<!-- CENTER START ######################## -->
		<div class="col-lg-9 center_right">
			<div id="center-in">
			<!-- ********* TITLE START HERE *********-->
			<h1 class="pagetitle">House Keeping  Management</h1>
		
			<!-- ********* TITLE END HERE *********-->
			<div id="pagecontent" class="common-form">
<!-- ********* CONTENT START HERE *********-->

<?= checkerroradmin()?>
     <form name=frmdocument method=get action ="housekeepingmanager.php" class="form-horizontal " >
       <div class="form-group"><label>Choose</label>
			<?
			  $whereque = "settings is NULL";
			  if (findsettingvalue("Religion_field_display") == "H") {
			  	$whereque .= " OR settings='H'";			  	
			  }
			  if ($Enable_pg_industry_functional_area_field_design_setting == "Y") {
			  	$whereque .= " OR settings='1Y'";
			  }
			  if ($Enable_institute_dropdown_design_setting == "Y") {
			  	$whereque .= " OR settings='2Y'";
			  }
			  if (findsettingvalue("Religion_field_display") == "M") {
			  	$whereque .= " OR settings='M'";
			  }
			  if ($Enable_HIV_thelesima_illiness_blood_group_design_setting == "Y"){
			  	$whereque .= " OR settings='3Y'";
			  }			 
			  ?>
              <select name="tab"  class="form-control">
			  
			  <?=fillcombo("SELECT tbl_name, show_name from tbl_housekeeping_main WHERE ".$whereque." order by show_name","","");?>
			  
<?php /*?><option value="tbldating_annual_income_currancy_master">Annual income currency type</option>
<option value="tbldating_annual_income_master">Annual income  </option>
<option value="tbl_favourite_cuisines_master">Favourite Couisines  </option>
<option value="tbl_hobbies_master">Favourite Hobbies</option>
<option value="tbl_music_master">Favourite Music</option>
<option value="tbl_interest_master">Interest</option>
<option value="tbl_favourite_read_master">Favourite Read</option>
<option value="tbl_favourite_dress_master">Preferred Dress Styles</option>
<option value="tbl_fitness_master">Sports/Fitness Activities</option>
<option value="tbldatingprofilecreatedbymaster">Profile Created By </option>
<option value="tbldatinglookingformaster">Looking for </option>
<option value="tbldatingmaritalstatusmaster">Marital status </option>
<option value="tbldatingkidsmaster">Children</option>
<option value="tbldatingheightmaster">Height </option>
<option value="tbldatingweightmaster">Weight </option>
<option value="tbldatingeyemaster">Eye color </option>
<option value="tbldatingbodymaster">Body type </option>
<option value="tbldatingcomplexionmaster">Complexion </option>
<option value="tbldatingspecialcasemaster">Special cases </option>
<option value="tbldatingfathermotherstatusmaster">Mother Father Occupation </option>
<option value="tbldatingpersonalvaluemaster">Personal Values </option>
<option value="tbldatinghearaboutusmaster">Hear About Us </option>
<option value="tbldatingreligianmaster">Religion </option>
<!-- <option value="tbldatingcastmaster">Caste</option> -->
<option value="tbldatingmothertonguemaster">Social Community </option>
<option value="tbldatingfamilyvaluemaster">Family Values</option>
<? if (findsettingvalue("Religion_field_display") == "H") { ?>
<option value="tbldatingmoonsignmaster">Moon Sign </option>
<option value="tbldatinggrahmaster">Grah </option>
<option value="tbldatingsunsignmaster">Sun sign</option>
<option value="tbldatingresidencystatusmaster">Residency status </option>
<option value="tbldatingtaklingpreferencemaster ">Talk With </option>
<? } ?>
<option value="tbl_education_master">Education </option>
<option value="tbldatingoccupationmaster">Occupation </option>
<? if ($Enable_pg_industry_functional_area_field_design_setting == "Y") { ?>
<option value="tbldating_education_pg_master">Post Graduation </option>
<option value="tbl_dating_industry_master">Industry </option>
<option value="tbl_dating_work_function_area_master">Function Area</option>
<? } ?>

<? if ($Enable_institute_dropdown_design_setting == "Y") { ?>
<option value="tbl_dating_institute_master">Institute </option>
<? } ?>
<option value="tbldatingdietmaster">Diet </option>
<option value="tbldatingsmokerstatusmaster">Smoker</option>
<option value="tbldatingsmokerstatusmaster">Drinker</option>
<option value="tbl_dating_inquiry_subject_master">Inquiry Subject</option>
<!--<option value="tbldating_city_master">City</option>-->
<!--<option value="tbldating_state_master">State</option>-->
<!--<option value="tbldating_state_master">Administrative Region</option>-->
<option value="tbldatingethnicmaster">Ethnic Background</option>
<option value="tbl_county_master">County</option>
<!--<option value="tbldatingcountrymaster">Country</option>-->
<option value="tbldatingdrinkerstatusmaster">Drinker Status</option>
<option value="tbldatinglanguagemaster">Language</option>
<option value="tbldatingmessangerstatus">Messager Status</option>
<option value="tbldatingwantchildrenmaster">Children</option>
<? if (findsettingvalue("Religion_field_display") == "M")
{ ?>
<option value="tbldating_beard_master">Beard</option>
<option value="tbldating_halal_strict_master">Strict for halal</option>
<option value="tbldating_hijab_wear_master">Wear hijab</option>
<option value="tbldating_religiousness_master">Religiousness</option>
<option value="tbldating_revert_islam_master">Revert to islam</option>
<option value="tbldating_salah_perform_master">Perform salah</option>
<? } ?>
<? if ($Enable_HIV_thelesima_illiness_blood_group_design_setting == "Y")
{ ?>
<option value="tbldating_blood_group_master">Blood group</option>
<? } ?><?php */?>

</select>

          </div>
		
         <div class="form-group common_button">
         <input type="submit" value="GO" class="btn" />
         </div>
    </form>      
<!-- ********* CONTENT END HERE *********-->
			</div>
			</div>
			<div class="adminhelp"><h3><?= $helphead ?></h3><?= $hosukeepingmain_help ?></div>
			<br style="clear:both">
		</div>
		<!-- CENTER END ######################## -->
	</div>
</div>	
	<!-- FOOTER START ######################## -->
	<?php include("adminbottom.php") ?>
	<!-- FOOTER END ######################## -->
</div>
</div>
</body>
</html>
<? 
} else {
	header("location:dashboard.php?msg=no");
}
?>