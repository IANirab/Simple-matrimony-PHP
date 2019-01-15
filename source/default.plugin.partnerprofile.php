<div class="profilestoplinks">
		
		<? if ($Update_profile_Pages_design_setting == "D") { ?>
		<?php include("profilestoplinks.php") ?>
		<? } ?>
		</div>
        	<div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?=$partnerprofiletitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div>
        

		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent Choosan_Form">
		<!-- ********* CONTENT START HERE *********-->
	
<form style="margin:0px" class="update_form editform_section" ENCTYPE="multipart/form-data" name ='form1' id='form1' method=post action ="<?= $sitepath ?><?= $filename ?>.php" onsubmit="return partnersubmit();">
<div class="errorbox"><span><?php checkerror(); ?></span></div>
<fieldset>	
<div class="fprofile table_whiter extends">

	<div class="form-group">
	
<label class="col-lg-4 control-label"><?= $partnerprofilegender ?></label>
<div class="col-lg-8">
<select name="cmblookingfor" class="form-control form_patnerprofile">
	
<? fillcombo(lookingfor_query($curruserid),$genderid,""); ?>
</select></div>
</div>

	<div class="form-group normaler">
	
<label class="col-lg-4 control-label"><?= $partnerprofileagefrom  ?></label>
<div class="col-lg-8">
<select name='cmbagefrom' class="form form_patnerprofile same_select same_select_more"><option value="" selected="selected"><?= $partnerprofile_any ?></option><?  fillage($agefrom) ?></select>&nbsp;&nbsp;&nbsp;<strong><?= $partnerprofileageto  ?></strong>&nbsp;
<select name='cmbageto' class="form form_patnerprofile same_select same_select_more"><option value="" selected="selected"><?= $partnerprofile_any ?></option><?  fillage($ageto) ?></select>
</div>
</div>

	<div class="form-group normaler">
	
<label class="col-lg-4 control-label"><?= $partnerprofileheightfrom  ?></label>
<div class="col-lg-8"><select name='cmbheightfrom' class="form form_patnerprofile same_select same_select_more">
<? fillcombo("select id,title from tbldatingheightmaster where currentstatus=0 and languageid=$sitelanguageid order by id",$heightfrom,$partnerprofileany) ?></select> <strong> <?= $partnerprofileheightto  ?> </strong> <select name='cmbheightto' class="form form_patnerprofile same_select same_select_more">
<? fillcombo("select id,title from tbldatingheightmaster where currentstatus=0 and languageid=$sitelanguageid order by id",$heightto,$partnerprofileany) ?>
</select>
</div>
</div>


 <div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofilemaritalstatus ?></label>
<div class="col-lg-8">
	<div class="select2-wrapper MYseletion">
<select  class="form-control select2-multiple" multiple tabindex="4" name="chkmaritalstatus[]" id="chkmaritalstatus">
                      
                  
          <?  $qry = getdata("select id,title from tbldatingmaritalstatusmaster where currentstatus=0 and languageid=$sitelanguageid  order by id ");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>" <? 
					if($maritalstatus!=''){
					if(in_array($rs[0],$maritalstatus)){ echo "selected"; }}?>>
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    </div></div>







	<?
	$find2 = "";
	$find3 = "";
	$kids_style = 'style="display:none;"';
	if(isset($maritstatus)){
	$find2 = strstr($maritstatus,'2');
	$find3 = strstr($maritstatus,'3');
	if($find2!="" || $find3!=""){
		$kids_style = 'style="display:table-row;"';
	} else {
		$kids_style = 'style="display:none;"';
	}
	}
?>

<div class="form-group" <?=$kids_style?> id="kids" >
	
<label class="col-lg-4 control-label"><?= $partnerprofilekidsids  ?></label>
<div class="col-lg-8"><select class="form-control form_patnerprofile" name="kids_children">
	<?=fillcombo("select id,title from tbldatingkidsmaster where currentstatus=0 and languageid=$sitelanguageid  order by title",$kidsids,"Any");?>
</select>	
</div>
</div>





<div class="form-group">
	
<label class="col-lg-4 control-label"><?= $advancesearchreligian ?></label>
<div class="col-lg-8 formcont sizers">
<select name="cmbreligian" class="form-control form_patnerprofile" onchange="change_caste_subcaste(this.value)"><? fillcombo("select id,title from tbldatingreligianmaster where currentstatus=0 and languageid=$sitelanguageid order by title",$religianid,$partnerprofileany) ?></select>
</div>
</div>


<? if ($Enable_cast_subcast_design_setting == "Y") { 
if(count($castid)>0){
	$cchk = '';	
} else {
	$cchk = 'checked="checked"';	
}


if($religianid==4)
{
	$cast_st='style=display:none';
	$subcast_st='style=display:none';
}else{
	$cast_st='style=display:block';
	$subcast_st='style=display:block';
}

?>

<div class="form-group" id="caste" >
	<div <?=$cast_st?>>
<label class="col-lg-4 control-label">
    		<?= $advancesearchcast ?></label>	
           
            <div class="col-lg-8 formcont sizers">
            <div class="checks">
           
<input type="checkbox" name="" value="" id="castany" <?=$cchk?> onclick="removeany1('castany1')"   /> <?= $partnerprofileany ?>
<?
$i =1;
if($religianid!=0){
	$relsearch = " AND religianid=".$religianid."";	
} else {
	$relsearch = "";	
}
$result = getdata("select id,title from tbldatingcastmaster where currentstatus=0 and languageid=$sitelanguageid ".$relsearch."  order by title");
$cast_list = "";
while ($rs = mysqli_fetch_array($result))
{ 
$cast_list .= $rs[0].",";
$chk = findcheckedornot($castid,$rs[0]);
?>
<span><input type="checkbox" name="chkcast<?= $rs[0] ?>" value="<?= $rs[0] ?>" <?= $chk  ?> 
onclick="removeany('castany')" /> <?= $rs[1] ?></span>
<? 
}
freeingresult($result);
$cast_list = substr($cast_list,0,-1);

?>
</div>
			</div>
            </div>
 </div>


<div class="form-group"  id="subcaste" >
	<div <?=$subcast_st?>>
<label class="col-lg-4 control-label">
<?= $partnerprofile_sub ?></label>
<div class="col-lg-8 formcont sizers">
<div class="checks">
<? if($subcast==''){ 
	$subcheck = 'checked="checked"';
} else {
	$subcheck = '';
}
  ?>
<input type="checkbox" name="" id="subcastany" value="" <?=$subcheck?> /> <?= $partnerprofileany ?>
<?
if($cast_list!=''){ 
$i =1;
$result = getdata("select id,title from tbldatingsubcastmaster where currentstatus=0 and languageid=$sitelanguageid AND castid IN ('".$cast_list."') order by title");
while ($rs = mysqli_fetch_array($result))
{ 
$chk = findcheckedornot($subcast,$rs[0]);
?>
<span><input type="checkbox" name="chksubcast<?= $rs[0] ?>" value="<?= $rs[0] ?>" <?= $chk  ?> onclick="removeany('subcastany')" /> <?= $rs[1] ?></span>
<? 
} 
freeingresult($result);
}
?>
</div>
</div>
</div>
</div>
<? 
} ?>


<? if($enable_astrological_module == "Y") { ?>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $advancesearchgrah ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">


<select  class="form-control select2-multiple" multiple tabindex="4" name="chkmangalik[]" id="chkmangalik">
                      
                  
          <?  $qry = getdata("select id,title from tbldatinggrahmaster where currentstatus=0  and languageid=$sitelanguageid order by title");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>" <? 
					if($grahid!=''){
					if(in_array($rs[0],$grahid)){ echo "selected"; }}?>>
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    </div></div>

<? } ?>

 <div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofilediet ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">

<select  class="form-control select2-multiple" multiple tabindex="4" name="chkdiet[]" id="chkdiet">
                      
                  
          <?  $qry = getdata("select id,title from tbldatingdietmaster where currentstatus=0 and languageid=$sitelanguageid  order by title ");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>" <? 
					if($dietids!=''){
					if(in_array($rs[0],$dietids)){ echo "selected"; }}?>>
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    </div>
    </div>

<div class="form-group">
 <? //smkid?>
<label class="col-lg-4 control-label"><?= $partnerprofilesmoking ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">

<select  class="form-control select2-multiple" multiple tabindex="4" name="chksmoke[]" id="chksmoke">
                     
                  
          <?  $qry = getdata("select id,title from tbldatingsmokerstatusmaster where currentstatus=0 and languageid=$sitelanguageid  order by title ");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>" <? 
					if($smokeids!=''){
					if(in_array($rs[0],$smokeids)){ echo "selected"; }}?>>
					<?=$rs[1]?></option> 
                    
             <? } ?>        
   	</select>
    </div>
    </div></div>


<div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofiledrink ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">

<select  class="form-control select2-multiple" multiple tabindex="4" name="chkdrink[]" id="chkdrink">
                      
                  
          <?  $qry = getdata("select id,title from tbldatingdrinkerstatusmaster where currentstatus=0 and languageid=$sitelanguageid  order by title ");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>" <? 
					if($drinkids!=''){
					if(in_array($rs[0],$drinkids)){ echo "selected"; }}?>>
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    </div></div>

<div id="errorbox_pat3edu" class="errorbox" style="display:none"></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofileeducation ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">

<select  class="form-control select2-multiple" multiple tabindex="4" name="chkeducation[]" id="chkeducation">
                      
                  
          <?  $qry = getdata("select id,title from tbl_education_master where currentstatus=0 order by title ");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>" <? 
					if($education!=''){
					if(in_array($rs[0],$education)){ echo "selected"; }}?>>
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    </div></div>


<div id="errorbox_pat3edu1" class="errorbox" style="display:none"></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofile_workin ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select  class="form-control select2-multiple" multiple tabindex="4" name="chkwork_in[]" id="chkwork_in" >
                      
                  
          <?  $qry = getdata("select id,title from tbldating_education_pg_master where currentstatus=1 and languageid=$sitelanguageid order by title");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>" <? 
					if($work_in!=''){
					if(in_array($rs[0],$work_in)){ echo "selected"; }}?>>
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    </div></div>

<div id="errorbox_pat3edu2" class="errorbox" style="display:none"></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofileoccupation ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select  class="form-control select2-multiple" multiple tabindex="4" name="chkoccupation[]" id="chkoccupation">
                      
                  
          <?  $qry = getdata("select id,title from tbldatingoccupationmaster where currentstatus=0 and languageid=$sitelanguageid  order by title ");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>" <? 
					if($occupation!=''){
					if(in_array($rs[0],$occupation)){ echo "selected"; }}?>>
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    </div></div>




<!--Added by jay-->

<div class="form-group">
	
<label class="col-lg-4 control-label">Annual Income Currency :</label>
<div class="col-lg-8">
<select class="form-control form_patnerprofile" name="cmbanninccurrency">
	<? fillcombo("SELECT id,title from tbldating_annual_income_currancy_master WHERE currentstatus=0",$cmbanninccurrency,"SELECT"); ?>		
</select></div>
</div>


<div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofile_annualincome ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select  class="form-control select2-multiple" multiple tabindex="4" name="chkanninc[]" id="chkanninc">
                      
                  
          <?  $qry = getdata("select id,title from tbldating_annual_income_master where currentstatus=0 and
 languageid=$sitelanguageid order by id asc");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>" <? 
					if($annincome!=''){
					if(in_array($rs[0],$annincome)){ echo "selected"; }}?>>
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    </div></div>



<div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofile_workincntry ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select  class="form-control select2-multiple" multiple tabindex="4" name="chkwork_in_country[]" id="chkwork_in_country">
                      
                  
          <?  $qry = getdata("select id,title from tbldatingcountrymaster where currentstatus=0 and languageid=$sitelanguageid  order by title");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>" <? 
					if($work_in_country!=''){
					if(in_array($rs[0],$work_in_country)){ echo "selected"; }}?>>
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    </div></div>


<?php /*?><div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofileworkinstate ?></label>
<div class="col-lg-8 select2-wrapper MYseletion">

<select  class="form-control select2-multiple" multiple tabindex="4" name="chkworkinstate[]" id="chkworkinstate">
          <?  $qry = getdata("select id,title from tbldating_state_master where currentstatus=0 and languageid=$sitelanguageid order by title ");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>" <? 
					if($workin_states!=''){
					if(in_array($rs[0],$workin_states)){ echo "selected"; }}?>>
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div></div><?php */?>

<div class="form-group">
<label class="col-lg-4 control-label"><?= $partnerprofile_native ?></label>
<div class="col-lg-8">
<div class="select2-wrapper MYseletion">
<select  class="form-control select2-multiple" multiple tabindex="4" name="chklocation[]" id="chklocation">
          <?  $qry = getdata("select id,title from tbldatingcountrymaster where currentstatus=0 and languageid=$sitelanguageid  order by title");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[0]?>" <? 
					if($location!=''){
					if(in_array($rs[0],$location)){ echo "selected"; }}?>>
					<?=$rs[1]?></option> 
             <? } ?>        
   	</select>
    </div>
    </div></div>


<!--Added by jay end-->


<script language="javascript" type="text/javascript">
function getstates(chkid,countryid){
	if(document.getElementById().checked==true){
		alert(chkid);	
		alert(countryid);
	}
}
</script>

<? if ($Partner_profile_display_state_textbox_design_setting =="Y") { 
if(count($states)>0){
	$stchk = '';	
} else {
	$stchk = 'checked="checked"';	
}
?>
<div class="form-group" id="getstates">
	
<label class="col-lg-4 control-label"><?= $partnerprofilestate ?></label>
<div class="col-lg-8 formcont sizers"> 
	<div class="checks">
<input type="checkbox" name="" value="" id="navstate" <?=$stchk?>  /> <?=$partnerprofileany ?>
<? 
$i =1;
$result = getdata("select id,title from tbldating_state_master where currentstatus=0 and languageid=$sitelanguageid order by title ");
while ($rs = mysqli_fetch_array($result))
{ 
$chk = findcheckedornot($states,$rs[0]);
 ?>
<span><input type="checkbox" name="chkstate<?= $rs[0] ?>" value="<?= $rs[0] ?>" onclick="removeany('navstate')" <?= $chk  ?>/> <?= $rs[1] ?></span>
<? 
$i =$i +1;
}
freeingresult($result); ?></div>
</div>
</div>
<? } ?>

<? if (findsettingvalue("Religion_field_display") == "M")
{ ?>

<div class="form-group"  id="subcaste">
	
<label class="col-lg-4 control-label"><?= $updateprofile2religiosness ?></label>
<div class="col-lg-8 formcont sizers"> 
	<div class="checks">
<input type="checkbox" name="" value="religis" id="" /> <?= $partnerprofileany ?>
<? 
$i =1;
$result = getdata("select id,title from tbldating_religiousness_master where currentstatus=0 and languageid=$sitelanguageid order by title");
while ($rs = mysqli_fetch_array($result))
{ 
//$chk = findcheckedornot($religiosness_id,$rs[0]);
if($religiosness_id!=''){
	$relig_arr = explode(",",$religiosness_id);
	if(in_array($rs[0],$relig_arr)==1){
		$chk = 'checked';	
	} else {
		$chk = '';	
	}
} else {
	$chk = '';	
}
//if ($i == 4) { ?> <? 
//$i = 1;
//} 
?>
<span><input type="checkbox" name="religiousness<?= $rs[0] ?>" value="<?= $rs[0] ?>" onclick="removeany('religis')" <?= $chk  ?>/> <?= $rs[1] ?></span>
<? 
$i =$i +1;
}
freeingresult($result); ?></div>
</div>
</div>

<div class="form-group"  id="subcaste">
	
<label class="col-lg-4 control-label">Denomination : </label>
<div class="col-lg-8 formcont sizers"> 
	<div class="checks">
<input type="checkbox" name="" value="denomin" id="" /> <?= $partnerprofileany ?>
<? 
$i =1;
$result = getdata("select id,title from tbl_muslim_denomination where currentstatus=0 order by title");
while ($rs = mysqli_fetch_array($result))
{ 

if($denominationid!=''){
	$denom_arr = explode(",",$denominationid);
	if(in_array($rs[0],$denom_arr)==1){
		$chk = 'checked';	
	} else {
		$chk = '';	
	}
} else {
	$chk = '';	
}
 ?>
<span><input type="checkbox" name="denomination<?= $rs[0] ?>" value="<?= $rs[0] ?>" onclick="removeany('denomin')" <?= $chk  ?>/> <?= $rs[1] ?></span>
<? 
$i =$i +1;
}
freeingresult($result); ?></div>
</div>
</div>

<? if (find_user_gendor($curruserid) == 1) { ?>

<div class="form-group"  id="subcaste">
	
<label class="col-lg-4 control-label"><?= $partnerprofilehijab ?></label>
<div class="col-lg-8"> 
<select name="cmbhijab_id" class="form-control large_inputer">
<? fillcombo("select id,title from tbldating_hijab_wear_master where currentstatus=0 and languageid=$sitelanguageid order by title ",$hijab_id,$updatepersonalprofiledprofileselect_sel) ?>
</select>
</div>
</div>
<? } ?>
<? if (find_user_gendor($curruserid) == 2) { ?>
<div class="form-group"  id="subcaste">
	
<label class="col-lg-4 control-label">
<?= $partnerprofilebeard ?></label>
<div class="col-lg-8"> 
<select name="cmbbeard_id" class="form-control large_inputer">
<? fillcombo("select id,title from tbldating_beard_master where currentstatus=0 and languageid=$sitelanguageid order by title ",$beard_id,$updatepersonalprofiledprofiledonotmind) ?>
</select>
</div>
</div>
<? } ?>
<div class="form-group"  id="subcaste">
	
<label class="col-lg-4 control-label"><?= $partnerprofilerevert_islam ?></label>
<div class="col-lg-8"> <select name="cmbrevert_islam_id" class="form-control large_inputer"><? fillcombo("select id,title from tbldating_revert_islam_master where currentstatus=0 and languageid=$sitelanguageid order by title ",$revert_islam_id,"Both") ?>
</select>
</div>
</div>
<div class="form-group"  id="subcaste">
	
<label class="col-lg-4 control-label"><?= $partnerprofilehalal_strict ?></label>
<div class="col-lg-8"> 
<select name="cmbhalal_strict_id" class="form-control large_inputer"><? fillcombo("select id,title from tbldating_halal_strict_master where currentstatus=0 and languageid=$sitelanguageid order by title ",$halal_strict_id,$updatepersonalprofiledprofileselect_sel) ?></select>
</div>
</div>
<div class="form-group"  id="subcaste">
	
<label class="col-lg-4 control-label"><?= $partnerprofilesalah_perform ?></label>
<div class="col-lg-8"> 
<select name="cmbsalah_perform_id" class="form-control large_inputer"><? fillcombo("select id,title from tbldating_salah_perform_master where currentstatus=0 and languageid=$sitelanguageid order by title ",$salah_perform_id,$updatepersonalprofiledprofileselect_sel) ?></select>
</div>
</div>
<? } ?>

<? if(isset($patner_Preference_bottom)=="Y") { ?>
<div class="form-group"  id="subcaste">
	
<label class="col-lg-4 control-label">&nbsp;</label>
<div class="col-lg-8"> 

<input type="radio" name="chksendmeemail" value="M" <?= $sendmeemail_monthly ?> /> 
<span><?= $partnerprofilesendmeemail_monthly ?></span> <br/>
<input type="radio" name="chksendmeemail" value="W" <?= $sendmeemail_weekly ?> /> 
<span><?= $partnerprofilesendmeemail_weekly ?> </span> <br/>
<input type="radio" name="chksendmeemail" value="N" <?= $sendmeemail_do_not_want ?> /> 
<span><?= $partnerprofilesendmeemail_do_not_want ?> </span> 
</div>
</div>

<div class="form-group">
	
<label class="col-lg-4 control-label">&nbsp;</label>
<div class="col-lg-8"> 
<input type="checkbox" name="chk_can_contact_religion" <?= $selected_religion_can_contact ?> value="Y"/> <?= $partnerprofilereligion_can_contact ?>
</div>
</div>
<? if(isset ($Enable_cast_subcast_design_setting) == "Y") { ?>

<div class="form-group">
	
<label class="col-lg-4 control-label">&nbsp;</label>
<div class="col-lg-8"> 
<input type="checkbox" name="chk_can_contact_cast" <?= $selected_cast_contact_me ?> value="Y"/> <?= $partnerprofilecast_contact_me ?>
</div>
</div>	
<? } ?>
<? } ?>
<div class="form-group">
	
<label class="col-lg-4 control-label">&nbsp;</label>
<div class="col-lg-8"> 
<div class="formbtn_outer">
<input name="Submit" type="submit"  class='formbtn' value="<?= $partnerprofilesubmit ?>"> <input name="Reset" type="reset"  class='resetbtn'  value="<?= $partnerprofilereset ?>">
</div>
</div>
</div>

</div>


</fieldset>
</form>
		
      
		<!-- ********* CONTENT END HERE *********-->
		</div>
		</div>