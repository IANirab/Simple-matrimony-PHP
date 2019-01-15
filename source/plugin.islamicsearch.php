<div class="pagetitle"></div>
         <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span>Islamic Search</span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div> 
 <? 
	$adv_clr_code = 'style="color:#F57D20"';
	$basic_clr_code = '';
	$astro_clr_code = '';
	$spl_clr_code = '';
	//include("searchinclude.php");
	include("searchtab.php");
?>	

 
 
 <!-- ********* TITLE START HERE *********-->
		
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent basic_common Choosan_Form">
		<!-- ********* CONTENT START HERE *********-->
		<div class="errorbox"><span><? checkerror(); ?></span></div>
<form class="update_form" name ='form1' method='post' action ="<?=$filename ?>.php">
<?php /*?><p class="advsearchmessage"><?= $advancesearchmessage ?></p><?php */?>

<div class="form-group">
<label class="col-lg-4 control-label"><?= $advancesearchlookingfor ?></label>
<div class="col-lg-8">
<select name='advlookingfor' class="form-control">
<? fillcombo(lookingfor_query($curruserid),"",""); ?></select>
</div></div>

<?
$sessionID = session_id();
$amms = "";

if($amms!=""){
$amms = substr($amms,0,-1);
$three = strstr($amms,'3');
$two = strstr($amms,'2');
if($three!="" || $two!=""){
	$chk_style = 'style="display:table-row;"';
}
}else {
	$chk_style = 'style="display:none;"';
}
?>
<!--style="display:none;"-->

<div class="form-group ">
<label class="col-lg-4 control-label"><?= $advancesearchreligian ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select name="cmbreligian" class="form-control select2-multiple" multiple tabindex="4" name="marital_arr[]"
 onchange="getcastbox(this.value);"><? fillcombo("select id,title from tbldatingreligianmaster where currentstatus=0 and languageid=$sitelanguageid order by title",$religionid,$advancesearchcountrycombotitle) ?></select>
</div></div></div>
<? if ($Enable_cast_subcast_design_setting == "Y") { ?>
<div class="form-group">
<label class="col-lg-4 control-label">
<?=$advancesearch_caste ?></label>
<div class="col-lg-8">
	<div class="select2-wrapper MYseletion" id="quickcasts">
<select name="searchcasts[]" multiple="multiple" class="form-control select2-multiple" onchange="getsubcastbox(this.value)"><? fillcombomul("select id,title from tbldatingcastmaster where currentstatus=0 and religianid=$religionid and languageid=$sitelanguageid order by title ","","") ?>
</select>
</div></div></div>
<div class="form-group">
<label class="col-lg-4 control-label">
Subcaste : </label>
<div class="col-lg-8">
	<div class="select2-wrapper MYseletion" id="quicksubcasts">
<select id="searchsubcast_new" name="searchsubcasts[]" multiple="multiple" class="form-control select2-multiple" >
	<? fillcombomul("select title,title from tbldatingsubcastmaster where currentstatus=0 and castid IN ('".$castid."') and languageid=$sitelanguageid order by title","","Select") ?></select>
    </div></div></div>
<? } ?>
<div class="form-group">
<label class="col-lg-4 control-label">
<?=$advancesearch_socialcommunity ?> </label>
<div class="col-lg-8">
	<div class="select2-wrapper MYseletion">
<select name="searchsocialcommunity[]" multiple="multiple" class="form-control select2-multiple">
	<? fillcombomul("select id,title from tbldatingmothertonguemaster where currentstatus =0 and languageid=$sitelanguageid order by title","","Select") ?></select>
    </div></div></div>
    
<div class="form-group">
<label class="col-lg-4 control-label">
Denomination :</label>
<div class="col-lg-8">
	<div class="select2-wrapper MYseletion">
<select name="cmbdenomination_id[]" class="form-control select2-multiple" multiple><? fillcombomul("select id,title from  tbl_muslim_denomination where currentstatus=0 and languageid=$sitelanguageid order by title ","","") ?>
</select>
</div></div></div>

<div class="form-group">
<label class="col-lg-4 control-label">
Silsila :</label>
<div class="col-lg-8">
	<div class="select2-wrapper MYseletion">
<select name="spiritual_id[]" class="form-control select2-multiple" multiple><? fillcombomul("select id,title from tbldatingspiritualmaster where currentstatus=0 and languageid=$sitelanguageid order by title ","","") ?>
</select>
</div></div></div>
    
<!--Added by Nishit-->
<!--Added by Nishit end-->
<input type="hidden" name="raddispresult" value ="d" />
<? if (findsettingvalue("Religion_field_display") == "M")
{ ?>
<div class="form-group">
<label class="col-lg-4 control-label">
<?= $updateprofile2religiosness ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select name="cmbreligiosness_id"  class="form-control select2-multiple"><? fillcombo("select id,title from tbldating_religiousness_master where currentstatus=0 and languageid=$sitelanguageid order by title ","","") ?>
</select>
</div></div></div>
<? if (find_user_gendor($curruserid) == 1) { ?>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofilehijab ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select name="cmbhijab_id" class="form-control select2-multiple"><? fillcombo("select id,title from tbldating_hijab_wear_master where currentstatus=0 and languageid=$sitelanguageid order by title ","","") ?></select>
</div></div></div>
<? } ?>
<? if (find_user_gendor($curruserid) == 2) { ?>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofilebeard ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select name="cmbbeard_id" class="form-control select2-multiple">
<? fillcombo("select id,title from tbldating_beard_master where currentstatus=0 and languageid=$sitelanguageid order by title ","","") ?>
</select>
</div>
</div></div>
<? } ?>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofilerevert_islam ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select name="cmbrevert_islam_id" class="form-control select2-multiple"><? fillcombo("select id,title from tbldating_revert_islam_master where currentstatus=0 and languageid=$sitelanguageid order by title ","","") ?>
</select>
</div></div></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofilehalal_strict ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion"><select name="cmbhalal_strict_id" class="form-control select2-multiple"><? fillcombo("select id,title from tbldating_halal_strict_master where currentstatus=0 and languageid=$sitelanguageid order by title ","","") ?>
</select></div></div></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofilesalah_perform ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select name="cmbsalah_perform_id" class="form-control select2-multiple"><? fillcombo("select id,title from tbldating_salah_perform_master where currentstatus=0 and languageid=$sitelanguageid order by title ","","") ?>
</select>
</div></div></div>
<? } ?>
<div class="form-group">
<label class="col-lg-4 control-label">&nbsp;</label>
<div class="col-lg-8"><div class="formbtn_outer"><input name="Submitadvancesearch" type="submit" class="formbtn"  value="<?= $advancesearchsubmit ?>"> &nbsp; <input name="Reset" type="reset" class="resetbtn" value="<?= $advancesearchreset ?>"></div></div></div>
</table>



</form>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>