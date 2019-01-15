
<div class="profilestoplinks"><?php include("profilestoplinks.php") ?></div>
		<div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?= $updatecontactprofilepgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div>
        
        
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
		
		<form style="margin:0px" class="update_form contactus_forms editform_section" ENCTYPE="multipart/form-data" name ='form1' id='form1' method=post action ="<?= $sitepath ?><?= $filename ?>.php" onsubmit="return validate_form4();">
<div class="errorbox"><span><?php checkerror(); ?></span></div>
<fieldset>

<div class="form-group">
      <label class="col-lg-4 control-label"><?= $updatecontactprofile_reg_email ?></label>
      <div class="col-lg-8">
		<?= $email  ?> &nbsp; &nbsp; &nbsp; 
        <span class="switch_outer switch_small">
            <label class="switch">
            <input type="checkbox" name="private_email" value="Y" <?= $private_email ?> style="vertical-align:middle" />
             <span class="slider round"></span>
            </label>
        </span>
        <?= $updatecontactprofile_private ?>
	</div>
</div>


<div class="form-group">
      <label class="col-lg-4 control-label"><?= $updatecontactprofileemail ?></label>
        <div class="col-lg-8">
      <input type="text" name="txtaltemail" id="txtaltemail" value="<?= $altemail  ?>" size="35" class="form-control" maxlength="<?= $textbox_character_max_length ?>" onkeypress="getonfocus('altemail','txtaltemail')" />
      </div>
</div>
<!--$updatecontactprofileaddress-->
<div class="form-group">
      <label class="col-lg-4 control-label"><?= $updatecontactprofilestreet ?></label>
       <div class="col-lg-8">
      <textarea id="txtaddress" name="txtaddress" cols="35" rows="2" class="form-control form_text_area1" style="min-width:43%;" onkeypress="getonfocus('address','txtaddress')"><?= $address  ?></textarea>
      </div>
      </div>
      
				<!----------------------munciple no start------------------------------------>
	<? if($enable_muncipale=='N')
	{ ?>      
      
<div class="form-group">
      <label class="col-lg-4 control-label"><?php /*?><?= $updatecontactprofilestate ?> - <?php */?><?= $updatecontactprofilecountry ?></label><?php /*?>
	  
	  <input type="text" id="txtstate" name="txtstate" value="<?= $state  ?>" size="10"  class="form" maxlength="<?= $textbox_character_max_length ?>"/><?php */?> 
      <div class="col-lg-8">
      <select name="cmbcountryid" id="cmbcountryid" class="form-control" onchange="get_state(this.value)">
<? fillcombo("select id,title from tbldatingcountrymaster where currentstatus IN (0) and languageid=$sitelanguageid order by title",$countryid,$updatepersonalprofiledprofileselect_sel); ?>



<option value="0.0" >Other</option>
</select> 
<input type="text" name="country_other" id="country_other1" class="form" size="13" 
value="<? $country_other ?>" maxlength="" style="display:none;"></div></div>



<?
if($countryid!=""){
	$cmb_st = 'display:inline';
	$inpt_st = 'display:none'; 
} else {
	$cmb_st = 'display:none';
	$inpt_st = 'display:inline';
}
 ?>
<?


	if($countryid!=""){		
		?>

<div class="form-group" id="exist_state">
      <label class="col-lg-4 control-label"><?=$updatecontactprofilestate ?>:</label>
         <div class="col-lg-8">
	<select name="cmbstateid" id="cmbstateid" class="form-control form_state" style="min-width:171px;" 
    onchange="get_city(this.value)">
		<? fillcombo("select id,title from tbldating_state_master where currentstatus IN (0) and country_id=".$countryid." and languageid=$sitelanguageid order by title",$state,$updatepersonalprofiledprofileselect_sel); ?>
        
        
<option value="0.0" >Other</option>
</select> 
<input type="text" name="state_other" id="state_other" class="form" size="13" 
value="<? $state_other ?>" maxlength="" style="display:none;" />


<?php /*?><span class="otherstatebox"><?= $updatecontactprofileother ?> :</span>
<input type="text" class="form-form" name="otherstate" id="otherstate" value="" size="10"/><?php */?>
</div>
</div>
	<? if($state!="") { 
		$style_city = 'style="display:inline;"';			
	 } else {
	 	$style_city = 'style="display:none;"';
	 } ?>
<div class="form-group" id="exist_city" <?=$style_city?>>
      <label class="col-lg-4 control-label"> <?=$updatecontactprofilecity ?></label>
     <div class="col-lg-8">  
 	<select name="cmbcityid" id="cmbcityid" class="form-control form_city" style="min-width:171px; <?=$cmb_st?>" onchange="get_values(this.value)">
	<? fillcombo("select id,title from  tbldating_city_master where currentstatus In (0) AND state_id=".$state." and languageid=$sitelanguageid order by title",$city_id,$updatepersonalprofiledprofileselect_sel); ?>
<option value="0.0" >Other</option>
</select> 
<input type="text" name="city_other" id="city_other" class="form-control form_1 form_other" size="13" 
value="<? $city_other ?>" maxlength="" style="display:none;" />

</div>
</div>
	
<? } ?>

</p>

<p id="state_indicator" style="display:none"><img src="uploadfiles/indicator.gif"/></p>
<p id="state"></p>

<? } ?>




<div class="form-group" id="city_indicator" style="display:none">
<img src="uploadfiles/indicator.gif" /></div>
<p id="city"></p>






		<!-------------------------------munciple no end------------------------------------>
        
        
        <!-------------------------------munciple yes start------------------------------------>
        

<? if($enable_muncipale=='Y')
{ ?>      
      
	<div class="form-group" >
       <label class="col-lg-4 control-label"><?= $updatecontactprofilecountry ?></label>
       <div class="col-lg-8">
       <select name="cmbcountryid" id="cmbcountryid" class="form-control" onchange="get_munciple_value('mun_s',this.value)">
<? fillcombo("select id,title from tbldatingcountrymaster where currentstatus IN (0) and languageid=$sitelanguageid order by title",$countryid,$updatepersonalprofiledprofileselect_sel); ?>
		</select> 
		</div>
   </div>
   
  
  
  
   
    <div id="hide_munciple_state">
           <div class="form-group" >
           <label class="col-lg-4 control-label"><?= $updatecontactprofilestate ?></label>
           <div class="col-lg-8">
           <select name="cmbstateid" id="cmbstateid" class="form-control" onchange="get_munciple_value('mun_d',this.value)">
    <? fillcombo("select id,title from tbldating_state_master where currentstatus IN (0) and country_id='".$countryid."' and languageid=$sitelanguageid order by title",$state,$updatepersonalprofiledprofileselect_sel); ?>
            </select> 
            </div>
            </div>
    </div>
   	<div id="show_munciple_state" style="display:none"></div> 
    
    
    <div id="hide_munciple_district">
           <div class="form-group">
						<label class="col-lg-4 control-label"><?=$mun_district ?> :</label> 
						<div class="col-lg-8 samer_length">
						<select name="cmbdistrictid" id="cmbdistrictid" class="form-control" 
                         onchange="get_munciple_value('mun_c',this.value)">
		<?=fillcombo("select id,title from  tbldating_district_master where currentstatus=0 and state_id='".$state."' and languageid=$sitelanguageid order by title",$get_districtid,$select_district); ?>
						</select>
						</div>
                   </div>
    </div>
    <div id="show_munciple_district" style="display:none"></div>
    
    
    <div id="hide_munciple_city" >
    		<div class="form-group">
						<label class="col-lg-4 control-label"><?=$mun_city ?> :</label> 
						<div class="col-lg-8 samer_length">
						<select name="cmbcityid" id="cmbcityid" class="form-control" 
                         onchange="get_munciple_value('mun_p',this.value)">
		<?=fillcombo("select id,title from  tbldating_city_master where currentstatus=0 and district_id='".$get_districtid."' and languageid=$sitelanguageid order by title",$city_id,$updatepersonalprofiledprofileselect_sel); ?>
						</select>
						</div>
                   </div>
    </div>
    <div id="show_munciple_city" style="display:none"></div>
    
    
    
    <div id="hide_munciple_panchayat" >
    		<div class="form-group">
						<label class="col-lg-4 control-label"><?=$mun_panchayat ?> :</label> 
						<div class="col-lg-8 samer_length">
						<select name="cmbpanchayatid" id="cmbpanchayatid" class="form-control" >
		<?=fillcombo("select id,title from   tbldating_panchayat_master where currentstatus=0 and city_id='".$city_id."' and languageid=$sitelanguageid order by title",$get_panchayat,$select_panchayat); ?>
						</select>
						</div>
                   </div>
    </div>
    <div id="show_munciple_panchayat" style="display:none"></div>

<? } ?>	
		<!-------------------------------munciple yes end------------------------------------>



<!--$updatecontactprofilepostcode-->
<div class="form-group">
      <label class="col-lg-4 control-label">
	  <?= $updatecontactprofile_zip ?></label>
       <div class="col-lg-8">
      <input type="text" name="txtpostcode" id="txtpostcode" value="<?= $postcode  ?>"  size="15" class="form-control" maxlength="<?= $textbox_character_max_length ?>" onkeyup="IsNumeric1(this.value,'txtpostcode')"  onkeypress="getonfocus('postcode','txtpostcode');"/>
      </div>
      </div>
<div class="form-group">
      <label class="col-lg-4 control-label"><?=$updatecontactprofilearea ?></label>
        <div class="col-lg-8">
      <input type="text" name="txtarea" id="txtarea" value="<?= $area  ?>" size="35"  class="form-control" maxlength="<?= $textbox_character_max_length ?>" onkeypress="getonfocus('area','txtarea')"/>
</div>
</div>
<div class="form-group">
      <label class="col-lg-4 control-label"><?= $updatecontactprofileresidencystatus ?></label>
       <div class="col-lg-8">
      <select name="cmbresidencystatus" class="form-control">
<? fillcombo("select id,title from tbldatingresidencystatusmaster where currentstatus=0 and languageid=$sitelanguageid order by title",$residancystatusid,$updatepersonalprofiledprofileselect_sel); ?>
</select></div>
</div>


<? if(findsettingvalue('display_nri_status')=='Y'){?>
<? if($nristatus!=''){
$nrichecked='checked';
}else{
$nrichecked='';
}
?>

<div class="form-group">
      <label class="col-lg-4 control-label"><?=$doyouhavenristatus?></label>
       <div class="col-lg-8">
       <span class="switch_outer switch_small">
              <label class="switch">
  <input type="checkbox" name="nristatus"  <?=$nrichecked?>>
  <span class="slider round"></span>
</label>
</span>
       </div>
</div>
<? } ?>


<?
if($sitethemefolder=='guyana'){ ?>

<div class="form-group">
      <label class="col-lg-4 control-label"><?=$updatecontactprofilecounty ?>:</label>
         <div class="col-lg-8">
       <select name="cmbcountyid" class="form-control">
<? fillcombo("select id,title from tbl_county_master where currentstatus=0 order by title",$city_id,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>
<? } ?>



<? 
	$check = "";
	$l_line = "";
	$style = "";
	
	if($mobile!=""){
		$check = 'checked="checked"';
		$mob_style = 'style="display:inline"';		
		$city_style = 'style="display:none"';
		$landline_style = 'style="display:none"';
	} else {
		$l_line = 'checked="checked"';
		$mob_style = 'style="display:none"';
		$city_style = 'style="display:inline"';
		$landline_style = 'style="display:inline"';
	} 	
?>
	
<div class="form-group">
      <label class="col-lg-4 control-label"><?
	if($sitethemefolder == 'guyana') {
		echo $updatecontactprofile_cell;
	} else {
		echo $updatecontactprofile_mobi;
	}	 ?></label>
    
     <div class="col-lg-8">	
	<input class="form-control form_mobile_code form_city7" type="text" value="<?=$country_code ?>"  placeholder="STD CODE" size="2" name="country_code" id="country_code" />
	<input type="text" class="form-control form_mobile_no form_city8" value="<?=$mobile ?>"  size="8" name="mobile" id="mobile" title="Mobile" onkeypress="getonfocus('mobile','mobile')" />
    
    <a  class="help_iconTP" href="#">
<img style="vertical-align:bottom" data-toggle="tooltip"  data-placement="top" 
title="if mobile no. changes, you have to verify it again " src="<?= $siteimagepath ?>images/help.png" />
</a>
    </div>
    </div>
<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updatecontactprofilephno?></label>
 	 <div class="col-lg-8">
	<input class="form-control form_mobile_code form_city7" type="text" value="<?=$city_code ?>" placeholder="STD CODE" size="2" name="city_code" id="city_code"   />
	<input class="form-control form_mobile_no form_city8" type="text" value="<?=$landline ?>" size="8" name="land_no" id="land_no" onkeypress="getonfocus('landline','land_no')"  />
    </div>
    </div>	


 
 <div class="form-group">
      <label class="col-lg-4 control-label">  <?= $updatecontactprofile_private ?> 
	  <?= $updatecontactprofile_private_contact_no ?></label>
       <div class="col-lg-8">
       <span class="switch_outer switch_small">
        <label class="switch">
  		<input type="checkbox" name="private_phone_no" <?=$private_phone_no?> value="Y">
  		<span class="slider round"></span>
		</label>
        </span>
        </div>
</div>


<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updatecontactprofilecallingtime ?>/TimeZone :</label>
  <div class="col-lg-8">
 <input type="text" name="txtcallingtime" id="txtcallingtime" value="<?= $callingtime  ?>"
  size="35"  class="form-control form_mobile_code form_city7" maxlength="<?= $textbox_character_max_length ?>"
   onkeypress="getonfocus('callingtime','txtcallingtime')"/>
   
   <input type="text" class="form-control form_mobile_no form_city8" value="<?=$calling_timezone ?>" 
   size="8" name="calling_timezone" id="calling_timezone" title="calling_timezone" onkeypress="getonfocus('calling_timezone','calling_timezone')" />
   </div>
 </div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updatecontactprofile_contact_person ?> :</label>
 <div class="col-lg-8">
 <input type="text" name="txt_contact_person_on_phone" id="txt_contact_person_on_phone" value="<?= $contact_person_on_phone  ?>" size="35" class="form-control" maxlength="<?= $textbox_character_max_length ?>" onkeypress="getonfocus('contact_person_on_phone','txt_contact_person_on_phone')"  />
 </div>
 </div>
<?
if($genderid=='1'){
	$label = $updateprofilecontact_groom;
} else {	
	$label = $updateprofilecontact_bride;
}
?>
<div class="form-group">
 <label class="col-lg-4 control-label"><?= $label ?> :</label>
  <div class="col-lg-8">
 <input type="text" name="relation" id="relation" value="<?= $relation  ?>" size="35" class="form-control" maxlength="<?= $textbox_character_max_length ?>" onkeypress="getonfocus('relation','relation')" /></p>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofilecontact_remarks ?></label>
  <div class="col-lg-8">
 <textarea name="remarks" id="remarks" class="form-control" rows="2" cols="35" onkeypress="getonfocus('remarks','remarks')"><?=$remarks?></textarea>
 
 </div>
 </div>



<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateextraprofile_newsletter ?></label>
   <div class="col-lg-8">
<input type="radio" name="rad_newsletter" <?= $subscriber_yes ?> value="Y" /> <?= $updateextraprofile_newsletter_subscribe ?> &nbsp;
<input type="radio" name="rad_newsletter" <?= $subscriber_no ?> value="N" /> <?= $updateextraprofile_newsletter_unsubscribe ?>

</div>
</div>

<? if($enable_image_request_password=="N") {?>
 <p><label>&nbsp;</label>
<input type="checkbox" name="chk_image_password_protect" value ="Y" <?= $image_password_protect ?>/>
 <?= $updateextraprofileimage_password_protect ?></p>
<p><label>&nbsp;</label><?= $updateextraprofileimage_password ?></p>
<p><label>&nbsp;</label><input type="password" name="txtimage_password" value="<?= $image_password  ?>" size="35"  class="form" maxlength="<?= $textbox_character_max_length ?>"/></p> 
<? } ?>



<input type="hidden" id="gethidden" name="gethidden" />
<input type="hidden" id="datehidden" name="datehidden" value="<?=date("Y-m-d H:i:s")?>"/>
<input type="hidden" id="valfield" name="valfield" />

<div class="form-group">
 <label class="col-lg-4 control-label">&nbsp;</label>
    <div class="col-lg-8">
    	<div class="formbtn_outer">
    <input name="Submit" type="submit"  class='formbtn' value="<?= $updatecontactprofiledsubmit ?>"> <input name="Reset" type="reset"  class='resetbtn'  value="<?= $updatecontactprofiledreset ?>"></div>
</div>
</div>


</fieldset>


</form>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>
        </div>