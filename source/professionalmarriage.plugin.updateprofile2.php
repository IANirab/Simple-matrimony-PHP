<div class="profilestoplinks"><?php include("profilestoplinks.php") ?></div>
<script>
$(document).ready(function(){
	$.noConflict();
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<?
//$castid='';
?>
		<script>
function validate_form3() 
{
	
	/*//alert($("#cmbcast").val());
	if($("#cmbcast").val()=='0.0')
	{
		$("#error_cmbcast").show();
		$("#error_cmbcast").html('Please select cast');
		document.getElementById('cmbcast').focus();
		setTimeout(function(){ 
		$("#error_cmbcast").hide(); }, 
		3000);
		return false;
	}else{
     	return true;
	}*/
	
	 	return true;
}
</script>


<div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?= $updatesocialprofiletitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div>

		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">

		<!-- ********* CONTENT START HERE *********-->		
		<form style="margin:0px" ENCTYPE="multipart/form-data" class="update_form clientform editform_section" name ='form1' id='form1' method=post action ="<?= $sitepath ?><?= $filename ?>.php" onsubmit="return validate_form3();">
        
    <input type="hidden"  name="default_kundali_type" id="default_kundali_type" value="0"/>   
        
<div class="errorbox"><span><?php checkerror(); ?></span></div>

	<fieldset>
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
<? //fillcombo("select id,title from tbldatingreligianmaster where currentstatus=0 and languageid=$sitelanguageid order by ordering",$religianid,$updatepersonalprofiledprofileselect_sel) ?>
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
<?
//if($religianid == 3){
?>


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
 <label class="col-lg-4 control-label"><?=$updateprofile2zakat ?> :</label>
<div class="col-lg-8">
<select name="zakat" class="form-control">
<? fillcombo("select id,title from tbldatingzakatmaster where currentstatus=0 order by title ",$zakat,$updatepersonalprofiledprofileselect_sel) ?>
</select>	
</div>
</div>
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
<? //} ?>
<? //} ?>

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
<span id="christian" <?=$style?>>
<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2catholicque?> :</label>
 <div class="col-lg-8">
	<input type="radio" value="Y" name="catholic" <?=$ccatholic?>  /><?=$updateprofile2catholic ?>
	<input type="radio" value="N" name="catholic" <?=$ncatholic?> /><?=$updateprofile2noncatholic ?>
</div></div>
<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2denomination ?> :</label>
  <div class="col-lg-8">
<select name="chr_denomination" class="form-control">
<? fillcombo("select id,title from tbl_christian_denomination where currentstatus=0 order by title ",$chr_denomination,"Any") ?>
</select>
</div></div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2diocese?> :</label>
  <div class="col-lg-8">
<select name="chr_diocese" class="form-control">
<? fillcombo("select id,title from tbl_christian_diocese where currentstatus=0 order by title ",$chr_diocese,"Any") ?>
</select>
</div></div>
<? if($maritalstatus==2) { ?>
<div class="form-group">
 <label class="col-lg-4 control-label"><?php /*?><?=$updateprofile2diocese?><?php */?><?= $updateprofile2_divorcemethod ?> :</label>
   <div class="col-lg-8">
<select name="chr_diocese" class="form-control">
<? fillcombo("select id,title from tbl_christian_diocese where currentstatus=0 order by title ",$chr_diocese,"Any") ?>
</select>
</div></div>
<? } ?>
</span>


<? if ($Enable_cast_subcast_design_setting == "Y") { ?>
<img src="uploadfiles/indicator.gif"/ id="indicator" style="display:none" >
<div id="error_cmbcast" style="display:none" class="errorbox"></div>

<div class="form-group" id="exist_cast" >
 	
	<? if($castid!="" || $religianid!='') { ?>
		<label class="col-lg-4 control-label"><?=$updateprofile2cast ?></label>
        <div class="col-lg-8">
		
        <select name="cmbcast"  id="cmbcast" class="form-control" onchange="change_subcast(this.value)" >
		<?=fillcombo("select id,title from tbldatingcastmaster where currentstatus IN (0,5) and religianid=".$religianid." and languageid=$sitelanguageid order by title",$castid,$updatepersonalprofiledprofileselect_sel) ?>
<option value="0" >Other</option>
</select> 
<input type="text" name="cast_other" id="cast_other" class="form" size="13" 
value="<? $cast_other ?>" maxlength="" style="display:none;">
<? } ?>
</div></div>

<div id="searchcast" class="22222" style="display:none;"></div>
<img src="uploadfiles/indicator.gif"/ id="sub_indicator" style="display:none" >


<div class="form-group" id="exist_subcast" >
	<? 	
	if($subcast!="") { ?>	
	<label class="col-lg-4 control-label"><?= $updateprofile2subcast ?></label>
     <div class="col-lg-8">
	<select name="txtsubcat"  id="txtsubcat"  class="form-control" onchange="changedata(this.value)" >
		<option value="0.0" >Other</option>
        <?=fillcombo("select title,title from tbldatingsubcastmaster where currentstatus IN (0,5) and castid=".$castid." 
and languageid=$sitelanguageid order by title",$subcast,$updatepersonalprofiledprofileselect_sel)
 ?>
    </select>
      </div>
        <input type="text" name="subcast_other" id="subcast_other" class="form" size="13" 
value="<? $subcast_other ?>" maxlength="" style="display:none;">
<? } ?>
</div>

<p id="subcast" style="display:none;"></p>

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
 <select name="cmbmothertounge" class="form-control" onChange="change_motherthounge(this.value)">
<?  fillcombo("select  id,title from tbldatingmothertonguemaster where currentstatus  IN (0,5) and languageid=$sitelanguageid  
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

<div class="form-group" style="display:none">
 <label class="col-lg-4 control-label"><?= $updateprofile2_maternalname ?> :</label>
   <div class="col-lg-8">
<input type="text" name="maternal_name" id="maternal_name" class="form-control" value="<?= $maternal_name ?>" onkeypress="getonfocus('maternal_name','maternal_name');" maxlength="<?= $textbox_character_max_length ?>"/>
</div>
</div>

<div class="form-group" style="display:none">
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
 <label class="col-lg-4 control-label"><?= $updatepersonalprofileddob ?></label>
 <div class="col-lg-8">
 <select name="dobdd" class="form-control form_date" disabled="disabled"><? fillnumdata(1,31,$updatepersonalprofiledprofileselect_sel,$dobdd) ?></select> <select name="dobmm" class="form-control form_date" disabled="disabled"><? fillnumdata(1,12,$updatepersonalprofiledprofileselect_sel,$dommm) ?> </select> <select name="dobyy" class="form-control form_date" disabled="disabled"><? fillnumdata(date("Y")-100,date("Y")-18,$updatepersonalprofiledprofileselect_sel,$dobyy) ?></select> 
 
 <a  class="help_iconTP" href="#">
<img style="vertical-align:bottom" data-toggle="tooltip"  data-placement="top" title="<?=$updatepersonalprofilehelp_dob?>" src="<?= $siteimagepath ?>images/help.png" /> </a>
 
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
<div class="form-group" style="display:none">
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
<img style="vertical-align:bottom" data-toggle="tooltip"  data-placement="top" title="<?=$horo_updateprofile2?>" src="<?= $siteimagepath ?>images/help.png" /> </a>


</div>
</div>
<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2_ignore_horoscope?>&nbsp;&nbsp;&nbsp;&nbsp;</label>
<div class="col-lg-8">
<input <?= $ignorehoroscope ?>  type="checkbox" name="ignore_horoscope" id="ignore_horoscope" value="Y" onclick="enable_grahnila('ignore_horoscope')" />
</div>
</div>


		<?
        if($igno=='Y'){
            $horos = 'style="display:none;"';
        } else {
            $horos = '';
        }
        ?>

<div id="horoscope1" <?=$horos?> style="width:100%;">
<div class="form-group" style="display:none">
 <label class="col-lg-4 control-label"><?= $updateprofile2sunsign ?> :</label>
 <div class="col-lg-8">
<select name="txtsunsign" class="form-control">
<? fillcombo("select id,title from tbldatingsunsignmaster where currentstatus=0 and languageid=$sitelanguageid  order by title ",$sunsignid,$updatepersonalprofiledprofileselect_sel) ?>
</select>
</div>
</div>

<div class="form-group" style="display:none">
 <label class="col-lg-4 control-label"><?php /*?>Lagna Rashi<?php */?><?= $updateprofile2_birthrashi ?> :</label>
 <div class="col-lg-8">
 <input type="text" name="txtbirthrashi" class="form-control" value="<?=$birthrashi ?>" maxlength="<?= $textbox_character_max_length ?>"/></div></div>
 
<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2preferedstars?></label>
  <div class="col-lg-8">
<select name="cmbpreferstarid" class="form-control">
<?  fillcombo("select prefered_id,title from tbl_preferedstar_master where currentstatus=0",$preferstarid,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label"><?=$updateprofile2type_of_horoscope?></label>
  <div class="col-lg-8">
<input type="radio" name="type_of_horoscope" id="shudam" value="M" <?=$horoscopeid_shudan?> /><?=$updateprofile2_shudam?>&nbsp;
<input type="radio" name="type_of_horoscope" id="dosham" value="W" <?=$horoscopeid_dosham?>  /><?=$updateprofile2_dosham?>&nbsp;&nbsp;
<input type="radio" name="type_of_horoscope" id="madhyam" value="N" <?=$horoscopeid_madhyam?>  />&nbsp;&nbsp;<?=$updateprofile2_madhyam?>&nbsp; 
<input type="radio" name="type_of_horoscope" id="not_applicable" value="P" <?=$horoscopeid_not_application?> />&nbsp;<?=$updateprofile2_not_applicable?>
</div>
</div>


<!-------------------------------Old Kundali Code start----------------------------------------------------->
<div class="form-group 555555">
 <label class="col-lg-4 control-label" style="display:none"><?= $updateprofile2_kundali ?></label>
 </div>
<div style="width:100%; float:left;">


<!--------------------------------------------Star Sishata---------------------------------------------->
<div class="form-group">
 <label class="col-lg-4 control-label">Star</label>
  <div class="col-lg-8">
   <input class="form-control" type="text" name="star" id="star" value="<?=$star?>"/>
   </div>
</div>

<div class="form-group">
 <label class="col-lg-4 control-label">Sishata Dasa</label>
  <div class="col-lg-8">
   <input class="form-control" type="text" name="sishata_dasa" id="sishata_dasa" value="<?=$sishata_dasa?>"/>
   </div>
</div>
<!--------------------------------------------Star Sishata---------------------------------------------->



<div class="form-group" style="display:none">
 <label class="col-lg-4 control-label"><?=$updateprofile2_lagna?></label><?php /*?><img src="uploadfiles/2.jpg" /><?php */?>
  <div class="col-lg-8">
<select name="cmblagnaid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$lagna,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group" style="display:none">
 <label class="col-lg-4 control-label"><?=$updateprofile2_surya?></label><?php /*?><img src="uploadfiles/3.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbsuryaid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$surya,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group" style="display:none">
 <label class="col-lg-4 control-label"><?=$updateprofile2_chandra?></label><?php /*?><img src="uploadfiles/4.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbchandraid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$chandra,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group" style="display:none">
 <label class="col-lg-4 control-label"><?= $updateprofile2_mangal ?>(<?= $updateprofile2_kucho ?>)</label>
<div class="col-lg-8">
<select name="cmbmangalid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$mangal,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group" style="display:none">
 <label class="col-lg-4 control-label"><?=$updateprofile2_budha?></label><?php /*?><img src="uploadfiles/6.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbbudhaid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$budha,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group" style="display:none">
 <label class="col-lg-4 control-label"><?=$updateprofile2_vyazham?></label><?php /*?><img src="uploadfiles/7.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbvyazhamid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$vyazham,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group" style="display:none">
 <label class="col-lg-4 control-label"><?=$updateprofile2_sukra?></label><?php /*?><img src="uploadfiles/8.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbsukraid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$sukra,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group" style="display:none">
 <label class="col-lg-4 control-label"><?=$updateprofile2_shani?></label><?php /*?><img src="uploadfiles/9.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbshaniid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$shani,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group" style="display:none">
 <label class="col-lg-4 control-label"><?=$updateprofile2_rahu?></label><?php /*?><img src="uploadfiles/10.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbrahuid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$rahu,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group" style="display:none">
 <label class="col-lg-4 control-label"><?=$updateprofile2_ketu?></label><?php /*?><img src="uploadfiles/11.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbketuid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$ketu,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group" style="display:none">
 <label class="col-lg-4 control-label"><?=$updateprofile2_gulikan?></label><?php /*?><img src="uploadfiles/12.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbgulikanid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$gulikan,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<div class="form-group" style="display:none">
 <label class="col-lg-4 control-label"><?= $updateprofile2_neptune ?></label><?php /*?><img src="uploadfiles/12.JPG" /><?php */?>
<div class="col-lg-8">
<select name="cmbneptuneid" class="form-control">
<?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$neptune,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>



</div>
<!-------------------------------Old Kundali Code end----------------------------------------------------->
<?php /*?>
<div class="form-group" style="display:none">
<?
        $dynemic_qry='and type=0';
     
	 
		$planetname1 = '';
		$platname1_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 1 and userid=$curruserid $dynemic_qry");
		$nmrows1 = mysqli_num_rows($platname1_qry);
		$i=1;
		while($planet1_rs = mysqli_fetch_array($platname1_qry)){
			if($i==$nmrows1){
				$planetname1 .= $planet1_rs[0];
			} else {
				$planetname1 .= $planet1_rs[0].", ";	
			}	
			$i++;
		}
		
		$planetname2 = '';
		$platname2_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 2 and userid=$curruserid $dynemic_qry");
		$nmrows2 = mysqli_num_rows($platname2_qry);
		$i=1;
		while($planet2_rs = mysqli_fetch_array($platname2_qry)){
			if($i==$nmrows2){
				$planetname2 .= $planet2_rs[0];
			} else {
				$planetname2 .= $planet2_rs[0].", ";	
			}	
			$i++;
		}
		//$planetname2 = substr($planetname2,0,-1);
		
		
		$planetname3 = '';
		$platname3_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 3 and userid=$curruserid $dynemic_qry");
		$nmrows3 = mysqli_num_rows($platname3_qry);
		$i=1;
		while($planet3_rs = mysqli_fetch_array($platname3_qry)){
			if($i==$nmrows3){
				$planetname3 .= $planet3_rs[0];
			} else {
				$planetname3 .= $planet3_rs[0].", ";	
			}	
			$i++;
		}
		//$planetname3 = substr($planetname3,0,-1);
		
		
		$planetname4 = '';
		$platname4_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 4 and userid=$curruserid $dynemic_qry");
		$nmrows4 = mysqli_num_rows($platname4_qry);
		$i=1;
		while($planet4_rs = mysqli_fetch_array($platname4_qry)){
			if($i==$nmrows4){
				$planetname4 .= $planet4_rs[0];
			} else {
				$planetname4 .= $planet4_rs[0].", ";	
			}	
			$i++;

		}
		//$planetname4 = substr($planetname4,0,-1);
		
		
		$planetname5 = '';
		$platname5_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 5 and userid=$curruserid $dynemic_qry");
		$nmrows5 = mysqli_num_rows($platname5_qry);
		$i=1;
		while($planet5_rs = mysqli_fetch_array($platname5_qry)){
			if($i==$nmrows5){
				$planetname5 .= $planet5_rs[0];
			} else {
				$planetname5 .= $planet5_rs[0].", ";	
			}	
			$i++;
		}
		//$planetname5 = substr($planetname5,0,-1);
		
		$planetname6 = '';
		$platname6_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 6 and userid=$curruserid $dynemic_qry");
		$nmrows6 = mysqli_num_rows($platname6_qry);
		$i=1;
		while($planet6_rs = mysqli_fetch_array($platname6_qry)){
			if($i==$nmrows6){
				$planetname6 .= $planet6_rs[0];
			} else {
				$planetname6 .= $planet6_rs[0].", ";	
			}	
			$i++;
		}
		//$planetname6 = substr($planetname6,0,-1);
		
		$planetname7 = '';
		$platname7_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 7 and userid=$curruserid $dynemic_qry");
		$nmrows7 = mysqli_num_rows($platname7_qry);
		$i=1;
		while($planet7_rs = mysqli_fetch_array($platname7_qry)){
			if($i==$nmrows7){
				$planetname7 .= $planet7_rs[0];
			} else {
				$planetname7 .= $planet7_rs[0].", ";	
			}	
			$i++;
		}
		//$planetname7 = substr($planetname7,0,-1);	
		
		$planetname8 = '';
		$platname8_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 8 and userid=$curruserid $dynemic_qry");
		$nmrows8 = mysqli_num_rows($platname8_qry);
		$i=1;
		while($planet8_rs = mysqli_fetch_array($platname8_qry)){
			if($i==$nmrows8){
				$planetname8 .= $planet8_rs[0];
			} else {
				$planetname8 .= $planet8_rs[0].", ";	
			}	
			$i++;
		}
		//$planetname8 = substr($planetname8,0,-1);
		
		$planetname9 = '';
		$platname9_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 9 and userid=$curruserid $dynemic_qry");
		$nmrows9 = mysqli_num_rows($platname9_qry);
		$i=1;
		while($planet9_rs = mysqli_fetch_array($platname9_qry)){
			if($i==$nmrows9){
				$planetname9 .= $planet9_rs[0];
			} else {
				$planetname9 .= $planet9_rs[0].", ";	
			}	
			$i++;
		}
		//$planetname9 = substr($planetname9,0,-1);
		
		
		$planetname10 = '';
		$platname10_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 10 and userid=$curruserid $dynemic_qry");
		$nmrows10 = mysqli_num_rows($platname10_qry);
		$i=1;
		while($planet10_rs = mysqli_fetch_array($platname10_qry)){
			if($i==$nmrows10){
				$planetname10 .= $planet10_rs[0];
			} else {
				$planetname10 .= $planet10_rs[0].", ";	
			}	
			$i++;
		}
		//$planetname10 = substr($planetname10,0,-1);
		
		
		$planetname11 = '';
		$platname11_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 11 and userid=$curruserid $dynemic_qry");
		$nmrows11 = mysqli_num_rows($platname11_qry);
		$i=1;
		while($planet11_rs = mysqli_fetch_array($platname11_qry)){
			if($i==$nmrows11){
				$planetname11 .= $planet11_rs[0];
			} else {
				$planetname11 .= $planet11_rs[0].", ";	
			}	
			$i++;
		}
		
		$planetname12 = '';
		$platname12_qry = getdata("select planetname from tbldatingusergrahmaster where planethome = 12 and userid=$curruserid $dynemic_qry");
		$nmrows12 = mysqli_num_rows($platname12_qry);
		$i=1;
		while($planet12_rs = mysqli_fetch_array($platname12_qry)){
			if($i==$nmrows12){
				$planetname12 .= $planet12_rs[0];
			} else {
				$planetname12 .= $planet12_rs[0].", ";	
			}	
			$i++;
		}
		
		
		
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
	<tr>
		<td width="25%" valign="top"><span>(12)</span><?=$planetname12?></td>
		<td width="25%" valign="top"><span>(1)</span><?=$planetname1?></td>
		<td width="25%" valign="top"><span>(2)</span><?=$planetname2 ?></td>
		<td width="25%" valign="top"><span>(3)</span><?=$planetname3 ?></td>
	</tr>
	
	<tr>
		<td valign="top"><span>(11)</span><?=$planetname11 ?></td>
		<td colspan="2" rowspan="2" class="grahanlila_title"><?=$displayprofile_kundli?></td>
		<td valign="top"><span>(4)</span><?=$planetname4 ?></td>
	</tr>
	
	<tr>
		<td valign="top"><span>(10)</span><?=$planetname10 ?></td>	
		<td valign="top"><span>(5)</span><?=$planetname5 ?></td>
	</tr>
	
	<tr>	
		<td valign="top" width="25%"><span>(9)</span><?=$planetname9 ?></td>
		<td valign="top" width="25%"><span>(8)</span><?=$planetname8 ?></td>
		<td valign="top" width="25%"><span>(7)</span><?=$planetname7 ?></td>
		<td valign="top" width="25%"><span>(6)</span><?=$planetname6 ?></td>
	</tr>
</table>
</div>
</div>


</div>
<?php */?>



<!--------------------------------------------New Kundali Code start--------------------------------------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function checktype(type){
	$("#kundali_type"+type).val(type);
	
	if(type==1){
	$("#kundali_typename"+type).html("Add Grahanila");
	}else{
	$("#kundali_typename"+type).html("Add Amsakam");
	}
	
	
	
	
}
function submit_kundali(){
   document.getElementById("close_kpopup").click();
   return true;
 
}
</script>



<div class="container">
  

  <!-- Modal -->
  <div class="modal fade" id="Grahanila" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" id="close_kpopup">&times;</button>
          <h4 class="modal-title" id="kundali_typename1">Grahanila</h4>
        </div>
        <div class="modal-body">
           <form name="kundali_form" id="kundali_form" method=post action="<?= $sitepath ?><?= $filename ?>.php" onsubmit="submit_kundali();">      
           
                    <input type="hidden"  name="kundali_type1" id="kundali_type1" value=""/>  
                
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_lagna?></label><?php /*?><img src="uploadfiles/2.jpg" /><?php */?>
                      <div class="col-lg-8">
                    <select name="cmblagnaid1" id="cmblagnaid1" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Lagna1,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_surya?></label><?php /*?><img src="uploadfiles/3.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbsuryaid1" id="cmbsuryaid1" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Surya1,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_chandra?></label><?php /*?><img src="uploadfiles/4.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbchandraid1" id="cmbchandraid1" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Chandra1,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?= $updateprofile2_mangal ?>(<?= $updateprofile2_kucho ?>)</label>
                    <div class="col-lg-8">
                    <select name="cmbmangalid1" id="cmbmangalid1" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Mangal1,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_budha?></label><?php /*?><img src="uploadfiles/6.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbbudhaid1" id="cmbbudhaid1" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Budha1,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_vyazham?></label><?php /*?><img src="uploadfiles/7.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbvyazhamid1" id="cmbvyazhamid1" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Vyazham1,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_sukra?></label><?php /*?><img src="uploadfiles/8.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbsukraid1" id="cmbsukraid1" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Sukra1,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_shani?></label><?php /*?><img src="uploadfiles/9.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbshaniid1" id="cmbshaniid1" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Shani1,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_rahu?></label><?php /*?><img src="uploadfiles/10.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbrahuid1" id="cmbrahuid1" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Rahu1,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_ketu?></label><?php /*?><img src="uploadfiles/11.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbketuid1" id="cmbketuid1" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Ketu1,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_gulikan?></label><?php /*?><img src="uploadfiles/12.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbgulikanid1" id="cmbgulikanid1" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Pluto1,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                  <?php /*?>  <div class="form-group" style="display:none">
                         <label class="col-lg-4 control-label"><?= $updateprofile2_neptune ?></label>
                        <div class="col-lg-8">
                        <select name="cmbneptuneid1"  id="cmbneptuneid1" class="form-control">
                        <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Neptune1,$updatepersonalprofiledprofileselect_sel); ?>
                        </select>
                        </div>
                    </div><?php */?>
                    
                   <div class="form-group">
                         <label class="col-lg-4 control-label">&nbsp;</label>
                        <div class="col-lg-8">
                        <div class="formbtn_outer">
                      	  <input type="submit" class="formbtn" value="Submit">
                          </div>
                        </div>
                    </div>
          
          
            <form/>
        </div>
      
        <div class="modal-footer" style="height:0; margin:0;">
         &nbsp;
        </div>
       
      </div>
      
    </div>
  </div>
  
  
</div>

<div class="container">
  

  <!-- Modal -->
  <div class="modal fade" id="Amsakam" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" id="close_kpopup">&times;</button>
          <h4 class="modal-title" id="kundali_typename2">Amsakam</h4>
        </div>
        <div class="modal-body">
           <form name="kundali_form" id="kundali_form" method=post action="<?= $sitepath ?><?= $filename ?>.php" onsubmit="submit_kundali();">      
           
                    <input type="hidden"  name="kundali_type2" id="kundali_type2" value=""/>  
                
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_lagna?></label><?php /*?><img src="uploadfiles/2.jpg" /><?php */?>
                      <div class="col-lg-8">
                    <select name="cmblagnaid2" id="cmblagnaid2" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Lagna2,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_surya?></label><?php /*?><img src="uploadfiles/3.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbsuryaid2" id="cmbsuryaid2" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Surya2,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_chandra?></label><?php /*?><img src="uploadfiles/4.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbchandraid2" id="cmbchandraid2" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Chandra2,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?= $updateprofile2_mangal ?>(<?= $updateprofile2_kucho ?>)</label>
                    <div class="col-lg-8">
                    <select name="cmbmangalid2" id="cmbmangalid2" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Mangal2,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_budha?></label><?php /*?><img src="uploadfiles/6.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbbudhaid2" id="cmbbudhaid2" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Budha2,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_vyazham?></label><?php /*?><img src="uploadfiles/7.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbvyazhamid2" id="cmbvyazhamid2" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Vyazham2,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_sukra?></label><?php /*?><img src="uploadfiles/8.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbsukraid2" id="cmbsukraid2" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Sukra2,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_shani?></label><?php /*?><img src="uploadfiles/9.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbshaniid2" id="cmbshaniid2" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Shani2,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_rahu?></label><?php /*?><img src="uploadfiles/10.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbrahuid2" id="cmbrahuid2" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Rahu2,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_ketu?></label><?php /*?><img src="uploadfiles/11.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbketuid2" id="cmbketuid2" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Ketu2,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <div class="form-group">
                     <label class="col-lg-4 control-label"><?=$updateprofile2_gulikan?></label><?php /*?><img src="uploadfiles/12.JPG" /><?php */?>
                    <div class="col-lg-8">
                    <select name="cmbgulikanid2" id="cmbgulikanid2" class="form-control">
                    <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Pluto2,$updatepersonalprofiledprofileselect_sel); ?>
                    </select>
                    </div>
                    </div>
                    
                    <?php /*?><div class="form-group" style="display:none">
                         <label class="col-lg-4 control-label"><?= $updateprofile2_neptune ?></label>
                        <div class="col-lg-8">
                        <select name="cmbneptuneid2"  id="cmbneptuneid2" class="form-control">
                        <?  fillcombo("select houseid,title from tbldatinghousemaster where currentstatus=0 order by houseid",$Neptune2,$updatepersonalprofiledprofileselect_sel); ?>
                        </select>
                        </div>
                    </div><?php */?>
                    
                    <div class="form-group">
                         <label class="col-lg-4 control-label">&nbsp;</label>
                        <div class="col-lg-8">
                        <div class="formbtn_outer">
                      	  <input type="submit" class="formbtn" value="Submit">
                          </div>
                        </div>
                    </div>
          
          
           <form/>
        </div>
        <div class="modal-footer" style="height:0; margin:0;">
         &nbsp;
        </div>
      
      </div>
      
    </div>
    
  </div>
  
  
</div>



</div>



<!--------------------------------------------New Kundali Code end--------------------------------------->



<div class="form-group">
	<label class="col-lg-4 control-label">Horoscope</label>
    <div class="col-lg-8">
    	<div class="col-lg-6">
        	<div class="AddList_Horos">
        	<!-- Trigger the modal with a button -->
              <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#Grahanila" onclick="checktype(1);"><i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;<?=$kundaligrahanila?></button>                            
        </div>
        
        	<div class="horoscope-table">
                <div class="table-responsive">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" class="grahanlila">
                      <tbody>
                        <tr>
                            <td width="25%" valign="top"><?=getplanetname(12,1,$curruserid)?></td>
                            <td width="25%" valign="top"><span>(1)</span><?=getplanetname(1,1,$curruserid)?></td>
                            <td width="25%" valign="top"><span>(2)</span><?=getplanetname(2,1,$curruserid)?></td>
                            <td width="25%" valign="top"><span>(3)</span><?=getplanetname(3,1,$curruserid)?></td>
                        </tr>
                        
                        <tr>
                            <td valign="top"><span>(11)</span><?=getplanetname(11,1,$curruserid)?></td>
                            <td colspan="2" rowspan="2" class="grahanlila_title"><?=$kundaligrahanila?></td>
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

        <div class="col-lg-6">
        	<div class="AddList_Horos">
        	<!-- Trigger the modal with a button -->              
              <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#Amsakam" onclick="checktype(2);"><i class="fa fa-plus-square-o" aria-hidden="true"></i>&nbsp;<?=$kundaliamsakam?></button>
        </div>
	        <div class="horoscope-table">
                <div class="table-responsive">
                    <table border="0" width="100%" cellpadding="0" cellspacing="0" class="grahanlila">
                      <tbody>
                        <tr>
                            <td width="25%" valign="top"><?=getplanetname(12,2,$curruserid)?></td>
                            <td width="25%" valign="top"><span>(1)</span><?=getplanetname(1,2,$curruserid)?></td>
                            <td width="25%" valign="top"><span>(2)</span><?=getplanetname(2,2,$curruserid)?></td>
                            <td width="25%" valign="top"><span>(3)</span><?=getplanetname(3,2,$curruserid)?></td>
                        </tr>
                        
                        <tr>
                            <td valign="top"><span>(11)</span><?=getplanetname(11,2,$curruserid)?></td>
                            <td colspan="2" rowspan="2" class="grahanlila_title"><?=$kundaliamsakam?></td>
                            <td valign="top"><span>(4)</span><?=getplanetname(4,2,$curruserid)?></td>
                        </tr>
                        
                        <tr>
                            <td valign="top"><span>(10)</span><?=getplanetname(10,2,$curruserid)?></td>	
                            <td valign="top"><span>(5)</span><?=getplanetname(5,2,$curruserid)?></td>
                        </tr>
                        
                        <tr>	
                            <td valign="top" width="25%"><span>(9)</span><?=getplanetname(9,2,$curruserid)?></td>
                            <td valign="top" width="25%"><span>(8)</span><?=getplanetname(8,2,$curruserid)?></td>
                            <td valign="top" width="25%"><span>(7)</span><?=getplanetname(7,2,$curruserid)?></td>
                            <td valign="top" width="25%"><span>(6)</span><?=getplanetname(6,2,$curruserid)?></td>
                        </tr>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>    	
    </div>
</div>





<input type="hidden" name="pname1" id="pname1" value="Lagna" class="form" />
<input type="hidden" name="pname2" id="pname2" value="Ravi(Surya)" class="form" />
<input type="hidden" name="pname3" id="pname3" value="Chandra(Cha)" class="form" />
<input type="hidden" name="pname4" id="pname4" value="Neptune" class="form" />
<input type="hidden" name="pname5" id="pname5" value="Budha" class="form" />
<input type="hidden" name="pname6" id="pname6" value="Guru(Vyazham)" class="form" />
<input type="hidden" name="pname7" id="pname7" value="Sukra" class="form" />
<input type="hidden" name="pname8" id="pname8" value="Ma(Shani)" class="form" />
<input type="hidden" name="pname9" id="pname9" value="Rahu(Sarpa)" class="form" />
<input type="hidden" name="pname10" id="pname10" value="Ketu(Shikhi)" class="form" />
<input type="hidden" name="pname11" id="pname11" value="Maa(Maanthi)" class="form" />
<input type="hidden" name="pname12" id="pname12" value="Kuja(Chovva)" class="form" /

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

<? } ?>
</div>
</fieldset>
	</form>
</div>








<div id="bubble_tooltip">
    <div class="bubble_top"><span></span></div>
    <div class="bubble_middle"><span id="bubble_tooltip_content"></span></div>
    <div class="bubble_bottom"></div>
<!-- ********* CONTENT END HERE *********-->
</div>