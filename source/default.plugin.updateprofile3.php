<div class="profilestoplinks"><?php include("profilestoplinks.php") ?></div>

 <div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?= $updateprofile3title ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div>
		
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		
		<form style="margin:0px" class="update_form editform_section" ENCTYPE="multipart/form-data" name ='form1' id='form1' method=post action ="<?= $sitepath ?><?= $filename ?>.php" onsubmit="return validate_form5();">

	<div class="errorbox" ><span><?php checkerror(); ?></span></div>
	<fieldset>


	<div class="errorbox" id="errorbox_upd3edu" style="display:none"><span></span></div>
 	
   <div class="form-group">
      <label class="col-lg-4 control-label"><? echo $updateprofile3education;?></label>
	  <div class="col-lg-8">
	  <select name="cmbeducation" class="form-control form_educaton" id="cmbeducation">
		<?=filleducombo($educationid);?>
	  </select>
	  <? if($Enable_additional_qualification=='Y') { ?>
	   <input type="text" class="form-control form_1 form_other" name="othercmbeducation" id="othercmbeducation" value="" style="display:none; min-width:79px" size="18" />
		<? } ?>
	 </div>
   </div>



	<div class="form-group">
         <label class="col-lg-4 control-label"><?=$updateprofile3education_details ?></label>
         <div class="col-lg-8">
			<textarea class="form-control form_text_area_0" name="education_in_details" id="education_in_details" 
            onKeyPress="getonfocus('edudetails','education_in_details')"><?=$edudetails?></textarea>
		</div>
	</div>
	 


	<div class="form-group">
     	<label class="col-lg-4 control-label"><?= $updateprofile3_additionalqualification ?> :</label>
		<div class="col-lg-8">
		<input type="text" name="txt_education_detail" id="txt_education_detail" class="form-control" size="13" 
        value="<?=$education_detail ?>" maxlength="<?= $textbox_character_max_length ?>">
		</div>
	</div>
    
    
<? if ($Enable_institute_dropdown_design_setting == "Y") 
{ ?>
	<div class="form-group">
         <label class="col-lg-4 control-label"><?= $updateprofile3institute  ?></label>
		 <div class="col-lg-8">
		 <select name='cmb_institute' class="form-control form_post_gra"  onChange="change_inst(this.value)">
		 <? fillcombo("select id,title from tbl_dating_institute_master where currentstatus In (0) and
         languageid=$sitelanguageid",$instituteid,$updatepersonalprofiledprofileselect_sel) ?>
         </select>
 		<input type="text" name="txt_institute_other" id="txt_institute_other" class="form-control form_1 form_other" 
        size="13" value="<?=$institute_other ?>" maxlength="<? $textbox_character_max_length ?>" 
        style="display:none;min-width:79px" size="18">
		</div>
	</div>
<? } ?>







<? if ($Enable_pg_industry_functional_area_field_design_setting == "Y") 
{ ?>
	<div class="form-group">
         <label class="col-lg-4 control-label"><?= $updateprofile3education_pg  ?></label>
     	 <div class="col-lg-8">                
         <select name='cmbpg' class="form-control " style="min-width:24%" onChange="change_post(this.value)">
			<? fillcombo("select id,title from tbldating_education_pg_master where currentstatus=0 
			and languageid=$sitelanguageid order by title",$edu_pg_id,$updatepersonalprofiledprofileselect_sel) ?>
         </select>
			<? if($edu_pg_id==19 && $edu_pg_other!=''){ 
                $pg_oth = '';
            } else {
                $pg_oth = 'style="display:none;"';	
            }
            ?>
        <input type="text" name="txt_pg_other" id="txt_pg_other" class="form-control form_1 form_other" size="13" 
        value="<?=$edu_pg_other ?>" maxlength="<?= $textbox_character_max_length ?>" <?=$pg_oth?> >
		</div>
	</div>
    
	<div class="form-group">
         <label class="col-lg-4 control-label"><?= $updateprofile3education_industry  ?></label>
		 <div class="col-lg-8">                    
         <select name='cmbindustry' class="form-control" onChange="change_ind(this.value)">
		<? fillcombo("select id,title from tbl_dating_industry_master where currentstatus=0 and 
		languageid=$sitelanguageid order by title",$industry_id,$updatepersonalprofiledprofileselect_sel) ?>
        </select>
        <input type="text" name="txt_industry_other" id="txt_industry_other" class="form-control form_1 form_other" size="13" 
        value="<?=$industry_other ?>" maxlength="<?= $textbox_character_max_length ?>" style="display:none;">
		</div>
	</div>
    
	<div class="form-group">
         <label class="col-lg-4 control-label"><?= $updateprofile3education_work_function  ?></label>
         <div class="col-lg-8">             
         <select name='cmb_work_function' class="form-control" style="min-width:36%" onChange="change_fnct(this.value)">
		<? fillcombo("select id,title from tbl_dating_work_function_area_master where currentstatus=0 
		and languageid=$sitelanguageid order by title",$work_function_id,$updatepersonalprofiledprofileselect_sel) ?>
        </select>
		<input type="text" name="txt_work_function_other" id="txt_work_function_other" 
        class="form-control form_1 form_other" size="13" 
        value="<?=$work_function_other ?>" maxlength="<?= $textbox_character_max_length ?>" style="display:none;">
		</div>
	</div>
<? } ?>


	<div id="errorbox_upd3occid" class="errorbox" style="display:none"></div>
	<div class="form-group">
         <label class="col-lg-4 control-label"><?= $updateprofile3occupation_status  ?></label>
		 <div class="col-lg-8"> 
		 <select name='cmb_status_id' id="cmb_status_id" class="form-control"  onChange="change_status(this.value)">
		 <? fillcombo("select id,title from tbldating_education_pg_master where currentstatus=1 and 
		 languageid=$sitelanguageid order by id",$cmb_status_id,$updatepersonalprofiledprofileselect_sel) ?>
         </select> 
		 <input type="text" name="txt_status_other" id="txt_status_other" class="form-control form_1 form_other" 
         size="13" value="<?=$edu_pg_other ?>" style="display:none">
		</div>
	</div>
    
	<div id="errorbox_upd3occd" class="errorbox" style="display:none"></div>

<?
if($cmb_status_id==26)
{
	$employee_div_st='style=display:none';
}else{	$employee_div_st='style=display:block';}
?>

<div id="employee_div" <?=$employee_div_st?>>

	<div class="form-group">
         <label class="col-lg-4 control-label"><?= $updateprofile3occupation ?></label>
         <div class="col-lg-8"> 
         <select name="cmboccupation" class="form-control"  id="cmboccupation">
		 <? fillcombo("select  id,title from tbldatingoccupationmaster where currentstatus=0 and 
		 languageid=$sitelanguageid  order by title ",$ocupationid,$updatepersonalprofiledprofileselect_sel); ?>
		<? //filloccupationcombo($ocupationid); ?>
		</select>
		<? if ($Enable_occupation_textbox_design_setting == "Y") { ?> 
		<input type="text" name="txt_occupation_detail" id="txt_occupation_detail" class="form-control form_1 form_other" 
        size="13" value="<?=$occupation_detail ?>" maxlength="<?= $textbox_character_max_length ?>" style="display:none;">
		<?  } ?>
		</div>
	</div>

	<div class="form-group">
        <label class="col-lg-4 control-label"><?= $updateprofile3annualincome ?></label>
        <div class="col-lg-8"> 
		
		<select name="cmbannualincome_currancy" id='cmbannualincome_currancy' class="form-control form price1">
        <option value="0.0">Select</option>
		<? fillcombo("select  id,title from tbldating_annual_income_currancy_master where currentstatus=0 and 		        languageid=$sitelanguageid  order by title ",$annual_income_currancyid,""); ?>
		</select>
        
        <select name="cmbannualincome" id="cmbannualincome" class="form-control form price2">
        <option value="0.0">Select</option>
		<? fillcombo("select  id,title from tbldating_annual_income_master where currentstatus=0 and languageid=$sitelanguageid        order by id ",$annual_income_id,""); ?>
		</select>
		</div>
	</div>

	<div class="form-group">
         <label class="col-lg-4 control-label">
		 <?=$dashboardupdateprofileCompanyName?> :</label>
	     <div class="col-lg-8">
	     <input type="text" name="company_name" class="form-control" id="company_name" value="<?=$company_name?>" />
		 </div>
	</div>
    
	<div class="form-group">
         <label class="col-lg-4 control-label"><?= $updateprofile3service_location ?></label>
         <div class="col-lg-8">         
		<select name="txtservice_location" id="service_location" class="form-control" onChange="get_state(this.value)">
		<? fillcombo("select id,title from tbldatingcountrymaster where currentstatus=0 and languageid=$sitelanguageid
		 order by title",$service_location,$updatepersonalprofiledprofileselect_sel); ?>
        </select>
		</div>
	</div>

	<div class="form-group" id="state_hide">
         <label class="col-lg-4 control-label"><?= $updatecontactprofilestate ?></label>
         <div class="col-lg-8">         
		<select name="cmbstateid" id="cmbstateid" class="form-control" onChange="get_city(this.value)">
        
         <? if($service_location!=''){?>
		<? fillcombo("select id,title from  tbldating_state_master where currentstatus=0 and languageid=$sitelanguageid
		 and country_id='".$service_location."' order by title",$service_state,$updatepersonalprofiledprofileselect_sel); ?>
         <? }else{ ?>
         <option value="0.0">Select</option>
         <? } ?>
        </select>
   
		</div>
	</div>
    
	<div id="state"></div>
    
    <div class="form-group" id="city_hide">
         <label class="col-lg-4 control-label"><?= $updatecontactprofilecity ?></label>
         <div class="col-lg-8">         
		<select name="cmbcityid" id="cmbcityid" class="form-control" >
         <? if($service_state!=''){?>
		<? fillcombo("select id,title from  tbldating_city_master where currentstatus=0 and languageid=$sitelanguageid
		 and state_id='".$service_state."' order by title",$service_city,$updatepersonalprofiledprofileselect_sel); ?>
         <? }else{ ?>
         <option value="0.0">Select</option>
         <? } ?>
        </select>
        
       <?php /*?> <span onclick="show_addtional_txt('add_city_div','cmbcityid');"><i class="fa fa-plus-circle"></i></span>
        <p class="form_note">If City are not their , please help us to add new</p>
  <span id="add_city_div" style="display:none">
   <input type="text" name="city_other" id="city_other" value="" class="form-control form_1 form_other"  />
  </span>
        <?php */?>
		</div>
	</div>
	

	<div  id="city"></div>

</div>

    <div class="form-group">
    <? 
    if($working_partner=='yes'){
        $w_yes = 'checked="checked"';
        $w_no = '';
    } else if($working_partner=='no'){
        $w_no = 'checked="checked"';
        $w_yes = '';
    } else {
        $w_yes = '';
        $w_no = '';
    }
	?>
        <label class="col-lg-4 control-label"><?= $updateprofile3_preferworkingpartner ?>? :</label>
        <div class="col-lg-8">
        <input type="radio" name="working_partner" id="working_partner" value="yes" <?=$w_yes?> /><?= $updateprofile3_yes ?>
        <input type="radio" name="working_partner" id="working_partner" value="no" <?=$w_no?> /><?= $updateprofile3_no ?>
        </div>
    </div>

<input type="hidden" id="gethidden" name="gethidden" />
<input type="hidden" id="datehidden" name="datehidden" value="<?=date("Y-m-d H:i:s")?>"/>
<input type="hidden" id="valfield" name="valfield" />
    <div class="form-group">
        <label class="col-lg-4 control-label">&nbsp;</label>
        <div class="col-lg-8">
        	<div class="formbtn_outer">
        <input name="Submit" type="submit"  class='formbtn' value="<?= $updateprodfile3submit ?>"> 
        <input name="Reset" type="reset"  class='resetbtn'  value="<?= $updateprodfile3reset ?>">
        </div>
        </div>
    </div>
</fieldset>
</form>
		<!-- ********* CONTENT END HERE *********-->
		</div>
        </div>