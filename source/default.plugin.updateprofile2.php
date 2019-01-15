<div class="profilestoplinks"><?php include("profilestoplinks.php") ?></div>

	
	<form style="margin:0px" ENCTYPE="multipart/form-data" class="update_form clientform editform_section" name ='form1' id='form1' method=post action ="<?= $sitepath ?><?= $filename ?>.php" onsubmit="return validate_form3();" >
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?= $updatesocialprofiletitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div>
    <div class="pagetitle">
	
		
		
        <div class="pagecontent">

		
	
        
    <input type="hidden"  name="default_kundali_type" id="default_kundali_type" value="0"/>   
        
<div class="errorbox"><span><?php checkerror(); ?></span></div>


<div class="fprofile">
<p style="margin-top:0px;"></p>


</div>

<?
if ($Enable_cast_subcast_design_setting == "Y") 
$select_community ="onchange=\"update_accrodingto_religion('cmbcast','cmbreligian','divnm_loading')\"";
else
$select_community ="";
?>

<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2religian ?></label>
 <div class="col-lg-8">
 <select name="cmbreligian" id="cmbreligian" onchange="enable_muslim(this.value)"  class="form-control"<?= $select_community ?>>
<?=fillcombo("select id,title from tbldatingreligianmaster where currentstatus=0
 and languageid=$sitelanguageid",$religianid,$updatepersonalprofiledprofileselect_sel)
?>
</select></div></div>


<?
if($religianid == 3){
	$style_mus = 'style="display:inline; width:100%;"';
} else {
	$style_mus = 'style="display:none; width:100%"';
} ?>
<div id="muslim" class="11111" <?=$style_mus?>>
<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2born_reverted?> :</label><?php /*?><img src="uploadfiles/12.JPG" /><?php */?>
<div class="col-lg-8">

	<? 
		if($revert_islam_id=='b'){
			$b = 'checked="checked"';
			$r = "";
		} else {
			$b = "";
			$r = 'checked="checked"';
		}
	?>
	
	<input type="radio" name="born" value="b" class="form form_radio_btn" <?=$b?> />&nbsp;<?=$updateprofile2born?>&nbsp;&nbsp;&nbsp;  
	<input type="radio" name="born" value="r" class="form form_radio_btn" <?=$r?> />&nbsp;<?=$updateprofile2reverted ?>
</div>
</div>

<div class="form-group">
<label class="col-lg-4 control-label"><?=$updateprofile2prayer ?> :</label>
<div class="col-lg-8">
<select name="prayer" class="form-control">
<? fillcombo("select id,title from tbldatingprayermaster where currentstatus=0 order by title ",$prayer,$updatepersonalprofiledprofileselect_sel) ?>
</select>	
</div></div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2fasting ?> :</label>

<div class="col-lg-8">
<select name="fasting" class="form-control">
<? fillcombo("select id,title from tbldatingfastingmaster where currentstatus=0 order by title ",$fasting,$updatepersonalprofiledprofileselect_sel) ?>
</select>	
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2quran ?> :</label>
 <div class="col-lg-8">
<select name="quran" class="form-control">
<? fillcombo("select id,title from tbldatingquranmaster where currentstatus=0 order by title ",$quran,$updatepersonalprofiledprofileselect_sel) ?>
</select>	
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2religiosness ?></label>
  <div class="col-lg-8">
<select name="cmbreligiosness_id" class="form-control">
<? fillcombo("select id,title from tbldating_religiousness_master where currentstatus=0 and languageid=$sitelanguageid order by title ",$religiosness_id,$updatepersonalprofiledprofileselect_sel) ?>
</select>
</div></div>
<? if (find_user_gendor($curruserid) == 2) { ?>
<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2hijab ?></label>
 <div class="col-lg-8">
<select name="cmbhijab_id" class="form-control">
<? fillcombo("select id,title from tbldating_hijab_wear_master where currentstatus=0 and languageid=$sitelanguageid order by title ",$hijab_id,$updatepersonalprofiledprofileselect_sel) ?>
</select>
</div>
</div>
<? } ?>
<? if (find_user_gendor($curruserid) == 1) { ?>
<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2beard ?> :</label>
  <div class="col-lg-8">
<select name="cmbbeard_id" class="form-control">
<? fillcombo("select id,title from tbldating_beard_master where currentstatus=0 and languageid=$sitelanguageid order by title ",$beard_id,$updatepersonalprofiledprofileselect_sel) ?>
</select>
</div>
</div>
<? } ?>

<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2halal_strict ?> :</label>
   <div class="col-lg-8">
<select name="cmbhalal_strict_id" class="form-control">
<? fillcombo("select id,title from tbldating_halal_strict_master where currentstatus=0 and languageid=$sitelanguageid order by title ",$halal_strict_id,$updatepersonalprofiledprofileselect_sel) ?>
</select>
</div>
</div>
<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2salah_perform ?> :</label>
    <div class="col-lg-8">
<select name="cmbsalah_perform_id" class="form-control">
<? fillcombo("select id,title from tbldating_salah_perform_master where currentstatus=0 and languageid=$sitelanguageid order by title ",$salah_perform_id,$updatepersonalprofiledprofileselect_sel) ?>
</select>
</div>
</div>
<div class="form-group">
 <label class="col-lg-4 control-label">Islamic Education :</label>
    <div class="col-lg-8">
    <select name="islamic_education" id="islamic_education" class="form-control">
    	<? fillcombo("SELECT id,title from tbl_islamiceducation_master WHERE currentstatus=0",$islamic_education,"Select")?>
    </select>
</div>
</div>
<input type="hidden" id="gethidden" name="gethidden" />
<input type="hidden" id="datehidden" name="datehidden" value="<?=date("Y-m-d H:i:s")?>"/>
<input type="hidden" id="valfield" name="valfield" />


</div>


<?
if($religianid == '4'){
	$style = 'style="display:inline; width:100%""';
} else {
	$style = 'style="display:none; width:100%"';
}
$ccatholic = "";
$ncatholic = "";
if($catholic == 'N'){
	$ncatholic = 'checked="checked"';
	$ccatholic = "";
} else {
	$ncatholic = '';
	$ccatholic = 'checked="checked"';
}
?>
<span id="christian" style="display:none">
<? if($catholic_module=='Y'){?>
<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2catholicque?> :</label>
 <div class="col-lg-8">
	<input type="radio" value="Y" name="catholic" <?=$ccatholic?> onclick="chnage_denomination(this.value);" ><?=$updateprofile2catholic ?>
	<input type="radio" value="N" name="catholic" <?=$ncatholic?> onclick="chnage_denomination(this.value);"><?=$updateprofile2noncatholic ?>
</div></div>
<? } ?>
<?
if($catholic=='N')
{
	$denomination_div_st='style=display:block';
}else{$denomination_div_st='style=display:none';}
?>
<? if($denomination_module=='Y'){?>
<div class="form-group" id="denomination_div" <?=$denomination_div_st?>>
 <label class="col-lg-4 control-label"><?=$updateprofile2denomination ?> :</label>
  <div class="col-lg-8">
<select name="chr_denomination" class="form-control">
<? fillcombo("select id,title from tbl_christian_denomination where currentstatus=0 order by title ",$chr_denomination,"Any") ?>
</select>
</div>
</div>
<? } ?>

<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2diocese?> :</label>
  <div class="col-lg-8">
<select name="chr_diocese" class="form-control">
<? fillcombo("select id,title from tbl_christian_diocese where currentstatus=0 order by title ",$chr_diocese,"Any") ?>
</select>
</div></div>

</span>


<? if ($Enable_cast_subcast_design_setting == "Y") { ?>

<div id="error_cmbcast" style="display:none" class="errorbox"></div>

<div  id="exist_cast" ></div> 	
	<? if($castid!="" || $religianid!='') { ?>
    
    <div class="form-group" id="hide_cast" >
		<label class="col-lg-4 control-label"><?=$updateprofile2cast ?> </label>
        <div class="col-lg-8">
		
        <select name="cmbcast"  id="cmbcast" class="form-control" onchange="change_subcast(this.value)" >
		<?=fillcombo("select id,title from tbldatingcastmaster where currentstatus IN (0) and religianid=".$religianid." and languageid=$sitelanguageid order by title",$castid,$updatepersonalprofiledprofileselect_sel) ?>
	<option value="other">Other</option>
</select>
</div>
	</div>	
    <? } ?>

<div id="searchcast" class="22222" ></div>
    
    <div class="form-group"  id="cast_other_div" style="display:none">
		<label class="col-lg-4 control-label">&nbsp; </label>
        <div class="col-lg-8">
		    <input type="text" name="cast_other" class="form-control"  id="cast_other" class="form" size="13" 
value="<? $cast_other ?>" maxlength="" >

</div>
	</div>	
    



	




<div id="exist_subcast" >
	<? 	
	if($subcast!="") { ?>	
    <div class="form-group" >
	<label class="col-lg-4 control-label"><?= $updateprofile2subcast ?></label>
     <div class="col-lg-8">
	<select name="txtsubcat"  id="txtsubcat"  class="form-control" onchange="changedata(this.value)" >
	 <?=fillcombo("select id,title from tbldatingsubcastmaster where currentstatus IN (0) and castid=".$castid." 
and languageid=$sitelanguageid order by title",$subcast,$updatepersonalprofiledprofileselect_sel)
 ?>    <option value="other">Other</option>
    </select>
      </div>
    </div>
    	<? } ?>
</div>

<p id="subcast" style="display:none;"></p>

<div class="form-group" id="subcast_other_div" style="display:none">
	<label class="col-lg-4 control-label">&nbsp;</label>
     <div class="col-lg-8">
		<input type="text" name="subcast_other" id="subcast_other" class="form-control" size="13" 
value="<? $subcast_other ?>" maxlength="" >
      </div>
	</div>






<div class="form-group" id="other_subcast_div" style="display:none">
<label class="col-lg-4 control-label">&nbsp;</label> 
<div class="col-lg-8 samer_length">
     <input type="text" name="other_subcast"  class="form-control" id="other_subcast" />
</div>
</div>



<p id="mool" style="display:none;"></p>

<? } ?>

<? 
if($religianid=='2'){
	$st = 'style="display:inline; width:100%;"';
} else {
	$st = 'style="display:none; width:100%"';
}
?>


<div class="form-group" id="gotra" <?=$st?>>
<label class="col-lg-4 control-label"><?= $updateprofile2gotra ?></label>
 <div class="col-lg-8">
<input type="text" name="txtgotra" id="txtgotra"  class="form-control" value="<?= $gotra ?>" maxlength="<?= $textbox_character_max_length ?>" onkeypress="getonfocus('gotra','txtgotra');"/></div>
</div>



<?
if($enable_religion_interest=="Y") { ?>
<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2relinterest ?></label>
	 <div class="col-lg-8">
    <select name="rel_interest" id="rel_interest" class="form-control">
<? fillcombo("select id,title from tbldatingreligioninterestmaster where currentstatus=0 order by title",$rel_interest,$updatepersonalprofiledprofileselect_sel) ?></select>		
</div>
</div>
<? } ?>




<? if($enable_social_community=='Y'){ ?>
<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2motherthoungue ?></label>
 <div class="col-lg-8">
 <select name="cmbmothertounge" id="cmbmothertounge" class="form-control" onChange="change_motherthounge(this.value)">
<?  fillcombo("select  id,title from tbldatingmothertonguemaster where currentstatus  IN (0) and languageid=$sitelanguageid  
order by title ",$motherthoungid,$updatepersonalprofiledprofileselect_sel); ?>
<option value="Other" >Other</option>
        </select>
        <input type="text" name="motherthoungue_other" id="motherthoungue_other" class="form" size="13" 
value="<? $motherthoungue_other ?>" maxlength="" style="display:none;">
</div>
</div>
<? } ?>

<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2familystatus ?></label>
  <div class="col-lg-8">
  <select name="cmbfamilystatus" class="form-control">
    <? fillcombo("select id,title from tbldatingfamilyvaluemaster where currentstatus=1 and languageid=$sitelanguageid  order by title ",$familystatusid,$updatepersonalprofiledprofileselect_sel); ?>
  </select>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2familytype ?></label>
  <div class="col-lg-8">
 <select name="cmbfamilytype" class="form-control">
<? fillcombo("select id,title from tbldatingfamilyvaluemaster where currentstatus=2 and languageid=$sitelanguageid  order by title ",$familytypeid,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2_maternalname ?> :</label>
   <div class="col-lg-8">
<input type="text" name="maternal_name" id="maternal_name" class="form-control" value="<?= $maternal_name ?>" onkeypress="getonfocus('maternal_name','maternal_name');" maxlength="<?= $textbox_character_max_length ?>"/>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2_maternallocation ?> :</label>
   <div class="col-lg-8">
<input type="text" name="maternal_location" id="maternal_location" class="form-control" value="<?= $maternal_location ?>" onkeypress="getonfocus('maternal_location','maternal_location');"  maxlength="<?= $textbox_character_max_length ?>"/>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2familyvalue ?></label>
 <div class="col-lg-8">
 <select name="cmbfamilyvalue" class="form-control">
<? fillcombo("select  id,title from tbldatingfamilyvaluemaster where currentstatus=0 and languageid=$sitelanguageid  order by title ",$familyvalueid,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>
<?
if ($ethnic_field_enable == "Y"){ ?>
<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2ethnicbg?></label>	
 <div class="col-lg-8">
	<select name="ethnic" id="ethnic" class="form-control">
		<? fillcombo("select id,title from tbldatingethnicmaster where currentstatus=0 order by title",$ethnic,$updatepersonalprofiledprofileselect_sel) ?>
	</select>		
</div>
</div>
<? } ?>


<div class="form-group">
	<div class="form_date_help_outer">
 <label class="col-lg-4 control-label"><?= $updatepersonalprofileddob ?></label>
 <div class="col-lg-8">
 <select name="dobdd" class="form-control form_date" disabled="disabled"><? fillnumdata(1,31,$updatepersonalprofiledprofileselect_sel,$dobdd) ?></select> <select name="dobmm" class="form-control form_date" disabled="disabled"><? fillnumdata(1,12,$updatepersonalprofiledprofileselect_sel,$dommm) ?> </select> <select name="dobyy" class="form-control form_date" disabled="disabled"><? fillnumdata(date("Y")-100,date("Y")-18,$updatepersonalprofiledprofileselect_sel,$dobyy) ?></select> 

 
 <a  class="help_iconTP" href="#">
<img style="vertical-align:bottom" data-toggle="tooltip"  data-placement="top" title="<?=$updatepersonalprofilehelp_dob?>" src="<?= $siteimagepath ?>images/help.png" />
</a>
 </div>
 </div>
 </div>

<?
if($religianid == 1 || $religianid == 2){
	$sh='style="display:none"';
	$hh='style="display:block"';
}else{$sh='style="display:block"';$hh='style="display:none"';}
?>

<div class="form-group" id="show_submit" <?=$sh?>>
 <label class="col-lg-4 control-label">&nbsp;</label>
    <div class="col-lg-8">
    <div class="formbtn_outer">	
    <input name="Submit" type="submit"  class='formbtn' value="<?= $updaterelationshipdsubmit ?>"> 
    <input name="Reset" type="reset"  class='resetbtn'  value="<?= $updaterelationshipdreset ?>">
    </div>
    </div>
    </div>

 <?

if($religianid == '2' || $religianid == '1'){
	$style = 'style="display:inline; width:100%;"';
} else {
	$style = 'style="display:none; width:100%"';
}
?>


<div id="hindu" <?=$style?>>

<? if($enable_mangalik_status=='Y') { ?>
<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2grah ?></label>
 <div class="col-lg-8">
<select name="cmbgrahid" class="form-control">
<? fillcombo("select id,title from tbldatinggrahmaster where currentstatus=0 and languageid=$sitelanguageid  order by title ",$grahid,"") ?>
</select>
</div>
</div>
<? }?>


 <? 
if($enable_astrological_module_basic=='Y'){
?>
<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2birthtime ?></label>
 <div class="col-lg-8">
 <input type="text" name="txtbirthtime" id="txtbirthtime" class="form-control" value="<?= $birthtime ?>" maxlength="<?= $textbox_character_max_length ?>" onkeypress="getonfocus('birthtime','txtbirthtime');"/>
 </div>
 </div>
<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2birthplace ?></label>
  <div class="col-lg-8">
 <input type="text" name="txtbirthplace" class="form-control" value="<?= $birthplace ?>" maxlength="<?= $textbox_character_max_length ?>" onkeypress="getonfocus('birthplace','txtbirthplace');"/>
 </div>
 </div>
<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updatecontactprofilecountryofbirth ?> <? //echo $updatecontactprofilecountryofbirth?></label>
   <div class="col-lg-8">
 <select name="cmbcountrybirthid" class="form-control">
<? fillcombo("select id,title from tbldatingcountrymaster where currentstatus=0 and languageid=$sitelanguageid order by title",$countryofbirth,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>
<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2moonsign ?></label>
  <div class="col-lg-8">
<select name="txtmoonsign" class="form-control">
<? fillcombo("select id,title from tbldatingmoonsignmaster where currentstatus=0 and languageid=$sitelanguageid   order by title",$moonsignid,$updatepersonalprofiledprofileselect_sel) ?>
</select>
</div>
</div>


<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2horoscope?></label>
<div class="col-lg-8">
<input type='file' name='uploadhoroscope' class="form-control" size="20" id='uploadhoroscope'>
 <a  class="help_iconTP" href="#">
<img style="vertical-align:bottom" data-toggle="tooltip"  data-placement="top" title="<?=$horo_updateprofile2?>" src="<?= $siteimagepath ?>images/help.png" />
</a>
</div>
</div>

<? if($horoscope!=''){?>
<div class="form-group">
 <label class="col-lg-4 control-label">&nbsp;</label>
<div class="col-lg-8">
<?=$horscope_msg?> <u><a href="<?=$horoscope?>" download><?=$horoscope?></a></u>
<a class="formbtn asmall" href="horoscope_delete.php">X</a>

</div>
</div>
<? }?>

<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2_ignore_horoscope?>&nbsp;&nbsp;&nbsp;&nbsp;</label>
<div class="col-lg-8">
<input <?= $ignorehoroscope ?>  type="checkbox" name="ignore_horoscope" id="ignore_horoscope" value="Y" onclick="enable_grahnila('ignore_horoscope')" />
</div>
</div>
<? } ?>
</div>

		
<?  if($enable_astrological_module=='Y'){ ?>

<?
if($religianid == '2' || $religianid == '1')
{ 
	 if($ignorehoroscope=='checked'){$horos = 'style="display:none;"';}else
	 {$horos = 'style="display:block;"';}
}
elseif($igno=='Y')
{ 
	$horos = 'style="display:none;"';
} else {
	
	$horos = 'style="display:none;"';
}
?>

<div id="horoscope1" <?=$horos?> style="width:100%;">
<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2sunsign ?> :</label>
 <div class="col-lg-8">
<select name="txtsunsign" class="form-control">
<? fillcombo("select id,title from tbldatingsunsignmaster where currentstatus=0 and languageid=$sitelanguageid  order by title ",$sunsignid,$updatepersonalprofiledprofileselect_sel) ?>
</select>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?php /*?>Lagna Rashi<?php */?><?= $updateprofile2_birthrashi ?> :</label>
 <div class="col-lg-8">
 <input type="text" name="txtbirthrashi" class="form-control" value="<?=$birthrashi ?>" maxlength="<?= $textbox_character_max_length ?>"/></div></div>
 
<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2preferedstars?></label>
  <div class="col-lg-8">
<select name="cmbpreferstarid" class="form-control">
<?  fillcombo("select prefered_id,title from tbl_preferedstar_master where currentstatus=0 order by title",$preferstarid,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<?php /*?><div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2type_of_horoscope?></label>
  <div class="col-lg-8">
<input type="radio" name="type_of_horoscope" id="shudam" value="M" <?=$horoscopeid_shudan?> /><?=$updateprofile2_shudam?>&nbsp;
<input type="radio" name="type_of_horoscope" id="dosham" value="W" <?=$horoscopeid_dosham?>  /><?=$updateprofile2_dosham?>&nbsp;&nbsp;
<input type="radio" name="type_of_horoscope" id="madhyam" value="N" <?=$horoscopeid_madhyam?>  />&nbsp;&nbsp;<?=$updateprofile2_madhyam?>&nbsp; 
<input type="radio" name="type_of_horoscope" id="not_applicable" value="P" <?=$horoscopeid_not_application?> />&nbsp;<?=$updateprofile2_not_applicable?>
</div>
</div><?php */?>


<!-------------------------------Old Kundali Code start----------------------------------------------------->
<div class="form-group 555555">
 <label class="col-lg-4 control-label"><?= $updateprofile2_kundali ?></label>
 </div>
<div style="width:100%; float:left;">





<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2_lagna?></label><?php /*?><img src="uploadfiles/2.jpg" /><?php */?>
  <div class="col-lg-8">
<select name="cmbid1" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$lagna,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2_surya?></label><?php /*?><img src="uploadfiles/3.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbid2" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$surya,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2_chandra?></label><?php /*?><img src="uploadfiles/4.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbid3" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$chandra,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2_mangal ?>(<?= $updateprofile2_kucho ?>)</label>
<div class="col-lg-8">
<select name="cmbid4" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$mangal,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2_budha?></label><?php /*?><img src="uploadfiles/6.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbid5" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$budha,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2_vyazham?></label><?php /*?><img src="uploadfiles/7.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbid6" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$vyazham,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2_sukra?></label><?php /*?><img src="uploadfiles/8.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbid7" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$sukra,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2_shani?></label><?php /*?><img src="uploadfiles/9.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbid8" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$shani,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2_rahu?></label><?php /*?><img src="uploadfiles/10.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbid9" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$rahu,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2_ketu?></label><?php /*?><img src="uploadfiles/11.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbid10" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$ketu,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2_gulikan?></label><?php /*?><img src="uploadfiles/12.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbid11" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$gulikan,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile2_neptune ?></label><?php /*?><img src="uploadfiles/12.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbid12" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$neptune,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

</div>
<!-------------------------------Old Kundali Code end----------------------------------------------------->

<div class="form-group">
<?	
		$result = getdata("select title,houseid from tbldatinghousemaster where currentstatus =0 order by title");
		while($rs = mysqli_fetch_array($result))
		{	
		  $title = $rs[0];
		  $houseid = $rs[1]; 
		}

		
				
	
	
?>
 <label class="col-lg-4 control-label"><?=$displayprofile_kundli?> :</label>
 <div class="col-lg-8">
<div class="table-responsive">
<table border="0" width="100%" cellpadding="0" cellspacing="0" class="grahanlila">
                      <tbody>
                        <tr>
                            <td width="25%" valign="top"><span>(12)</span><?=getplanetname(12,1,$curruserid)?></td>
                            <td width="25%" valign="top"><span>(1)</span><?=getplanetname(1,1,$curruserid)?></td>
                            <td width="25%" valign="top"><span>(2)</span><?=getplanetname(2,1,$curruserid)?></td>
                            <td width="25%" valign="top"><span>(3)</span><?=getplanetname(3,1,$curruserid)?></td>
                        </tr>
                        
                        <tr>
                            <td valign="top"><span>(11)</span><?=getplanetname(11,1,$curruserid)?></td>
                            <td colspan="2" rowspan="2" class="grahanlila_title"><?=$displayprofile_kundli?></td>
                            <td valign="top"><span>(4)</span><?=getplanetname(4,1,$curruserid)?></td>
                        </tr>
                        
                        <tr>
                            <td valign="top"><span>(10)</span><?=getplanetname(10,1,$curruserid)?></td>	
                            <td valign="top"><span>(5)</span><?=getplanetname(5,1,$curruserid)?></td>
                        </tr>
                        
                        <tr>	
                            <td valign="top" width="25%"><span>(9)</span><?=getplanetname(9,1,$curruserid)?></td>
                            <td valign="top" width="25%"><span>(8)</span><?=getplanetname(8,1,$curruserid)?></td>
                            <td valign="top" width="25%"><span>(7)</span><?=getplanetname(7,1,$curruserid)?></td>
                            <td valign="top" width="25%"><span>(6)</span><?=getplanetname(6,1,$curruserid)?></td>
                        </tr>
                    </tbody>
                  </table>
</div>
</div>


</div>







<input type="hidden" name="pname1" id="pname1" value="Lagna" class="form" />
<input type="hidden" name="pname2" id="pname2" value="Surya" class="form" />
<input type="hidden" name="pname3" id="pname3" value="Chandra" class="form" />
<input type="hidden" name="pname4" id="pname4" value="Neptune" class="form" />
<input type="hidden" name="pname5" id="pname5" value="Budha" class="form" />
<input type="hidden" name="pname6" id="pname6" value="Vyazham" class="form" />
<input type="hidden" name="pname7" id="pname7" value="Sukra" class="form" />
<input type="hidden" name="pname8" id="pname8" value="Shani" class="form" />
<input type="hidden" name="pname9" id="pname9" value="Rahu" class="form" />
<input type="hidden" name="pname10" id="pname10" value="Ketu" class="form" />
<input type="hidden" name="pname11" id="pname11" value="Pluto" class="form" />
<input type="hidden" name="pname12" id="pname12" value="Mangal" class="form" />

<?
if(isset($_POST['cmblagnaid'])!='')
{
?>
<input type="hidden" name="phome1" id="phome1" value="<?=$_POST['cmblagnaid']?>" class="form" />
<? } ?>
<input type="hidden" name="phome2" id="phome2" value="2" class="form" />
<input type="hidden" name="phome3" id="phome3" value="3" class="form" />
<input type="hidden" name="phome4" id="phome4" value="4" class="form" />
<input type="hidden" name="phome5" id="phome5" value="5" class="form" />
<input type="hidden" name="phome6" id="phome6" value="6" class="form" />
<input type="hidden" name="phome7" id="phome7" value="7" class="form" />
<input type="hidden" name="phome8" id="phome8" value="8" class="form" />
<input type="hidden" name="phome9" id="phome9" value="9" class="form" />
<input type="hidden" name="phome10" id="phome10" value="10" class="form" />
<input type="hidden" name="phome11" id="phome11" value="11" class="form" />
<input type="hidden" name="phome12" id="phome12" value="12" class="form" />



</div>
<? } ?>

<div class="form-group" id="hide_submit" <?=$hh?>>
 <label class="col-lg-4 control-label">&nbsp;</label>
    <div class="col-lg-8">
    <div class="formbtn_outer">
    <input name="Submit" type="submit"  class='formbtn' value="<?= $updaterelationshipdsubmit ?>"> 
    <input name="Reset" type="reset"  class='resetbtn'  value="<?= $updaterelationshipdreset ?>">
    </div>
    </div>
    </div>
	
		
        
        </div>
      
</div>
  </form>








