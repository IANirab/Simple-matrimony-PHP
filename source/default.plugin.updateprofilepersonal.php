<div class="profilestoplinks"><?php include("profilestoplinks.php") ?></div>
 
<div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span><?= $updatepersonalprofiledtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    </div>
            </div>
		
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="pagecontent">
<!-- ********* CONTENT START HERE *********-->

   
<form style="margin:0px" class="update_form editform_section" ENCTYPE="multipart/form-data" name ='form1' id='form1' method=post  action ="<?=$sitepath ?><?=$filename ?>.php" onsubmit="return validate_form1();">

<div class="errorbox"><span><?php checkerror(); ?></span></div>

<fieldset>
<?php /*?><div class="fprofile">
<p style="margin-top:30px;"></p><?php */?>
 <div class="form-group">
                    <label class="col-lg-4 control-label"><?=$updatecontactprofilename ?></label>
                    <div class="col-lg-8">
<input type="text" name="txtname" id="txtname" value="<?= $name  ?>" size="35" class="form-control" maxlength="<?= $textbox_character_max_length ?>" onKeyPress="getonfocus('name','txtname')"/></p>
</div>
</div>


<div class="form-group">
<label class="col-lg-4 control-label"><?= $updatepersonalprofiledgender ?></label>
<div class="col-lg-8">
<select name="cmbgender" class="form-control disables" disabled="disabled">
<? fillcombo("select genderid,gender from tbldatingendermaster where currentstatus=0 and languageid=$sitelanguageid order by gender",$genderid,$updatepersonalprofiledprofileselect_sel); ?>
</select>&nbsp;&nbsp;


<a  class="help_iconTP" href="#">
<img style="vertical-align:bottom" data-toggle="tooltip"  data-placement="top" title="<?=$updatepersonalprofilehelp_gender?>" src="<?= $siteimagepath ?>images/help.png" />
</a>
</p>
</div>
</div>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $updatepersonalprofiledlookingfor ?></label>
<div class="col-lg-8">
<select name="cmblookingfor" class="form-control">
<? fillcombo(lookingfor_query($curruserid),$lookingforid,"select"); ?>
</select>
</div>
</div>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $updatepersonalprofiledmaritalstatus  ?></label>
<div class="col-lg-8">
<select name="cmbmaritalstatus" id='cmbmaritalstatus' class="form-control" onChange="marital(this.value)">
<? fillcombo("select id,title from tbldatingmaritalstatusmaster where currentstatus=0 and languageid=$sitelanguageid  order by id ",$maritalstatusid,$updatepersonalprofiledprofileselect_sel); ?>
</select></div>
</div>
<? 
if($maritalstatusid==2 || $maritalstatusid==3){
	$st = '';	
} else {
	$st = 'style="display:none;"';
}
?>
<div class="form-group" id="child_kids" <?=$st?>>
<label class="col-lg-4 control-label"><?= $updatepersonalprofiledkids?></label>
<div class="col-lg-8">
<select name="cmbkids" class="form-control" onChange="childern_have(this.value)">
<? fillcombo("select id,title from tbldatingkidsmaster where currentstatus=0 and languageid=$sitelanguageid  order by title ",$kidsid,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>

<? 
if($kidsid==2 || $kidsid==3){
	$st_no_child = '';	
} else {
	$st_no_child = 'style="display:none;"';
}
?>

<div class="form-group" id="no_of_kids" <?=$st_no_child?>>
<label class="col-lg-4 control-label"><?=$no_of_child?></label>
<div class="col-lg-8">
	<select name="no_children" id="no_children" class="form-control">
    	<option value="0.0">Select</option>
        <? for($i=1; $i<=10; $i++){ 
			if($no_children==$i){
				$sel = 'selected';		
			} else {
				$sel = '';	
			}
			?>
        	<option value="<?=$i?>" <?=$sel?>><?=$i?></option>
        <? } ?>
    </select>
</div>
</div>



<div class="form-group">
<label class="col-lg-4 control-label">
<?= $updatepersonalprofileheight  ?></label>
<div class="col-lg-8">
<select name="cmbheight" class="form-control">
<? fillcombo("select id,title from tbldatingheightmaster where currentstatus=0 and languageid=$sitelanguageid 
 order by id  asc",$heightid,$updatepersonalprofiledprofileselect_sel); ?>
</select></div>
</div>

<div class="form-group">
<label class="col-lg-4 control-label"><?= $updatepersonalprofileweight  ?></label>
<div class="col-lg-8">
<select name="cmbweight" class="form-control">
<? fillcombo("select id,title from tbldatingweightmaster where currentstatus=0 and languageid=$sitelanguageid  order by id ",$weightid,$updatepersonalprofiledprofileselect_sel); ?>
</select></div>
</div>

<div class="form-group">
<label class="col-lg-4 control-label">
<?= $updatepersonalprofilecomplexion  ?></label>
<div class="col-lg-8">
<select name="cmbcomplexion" class="form-control">
<? fillcombo("select id,title from tbldatingcomplexionmaster where currentstatus=0 and languageid=$sitelanguageid  order by title ",$complexionid,$updatepersonalprofiledprofileselect_sel); ?>
</select></div>
</div>
<div class="form-group">
<label class="col-lg-4 control-label">
<?= $updatepersonalprofilebodytype  ?></label>
<div class="col-lg-8">
<select name="cmbbodytype" class="form-control">
<? fillcombo("select id,title from tbldatingbodymaster where currentstatus=0 and languageid=$sitelanguageid  order by title ",$bodytypeid,$updatepersonalprofiledprofileselect_sel); ?>
</select></div>
</div>




<? if (isset($enable_eyecolor_module) && ($enable_eyecolor_module == "Y")) { ?>
<div class="form-group">
<label class="col-lg-4 control-label">
<?= $updatepersonalprofileeyecolor  ?></label>
<div class="col-lg-8">
<select name="cmbeyecolor" class="form-control">
<? fillcombo("select id,title from tbldatingeyemaster where currentstatus=0 and languageid=$sitelanguageid  order by title ",$eyecolorid,$updatepersonalprofiledprofileselect_sel); ?>
</select><!--&nbsp;*--></div>
</div>
<?php } ?>

	<? $form1_want_child=findsettingvalue('form1_want_child');?>
<? if($form1_want_child=='Y'){?>
<div class="form-group" >
 <label class="col-lg-4 control-label"><?= $updatepersonalprofiledhivwantchildren ?></label>
<div class="col-lg-8" >
<input type="radio" name="wantchildren1" id="wantchildren1" value="Y" <?= $want_children_y ?> /><?= $updatepersonalprofilethelisimia_yes  ?> 
<input type="radio" name="wantchildren1" id="wantchildren1" value="N" <?= $want_children_n ?> /> <?= $updatepersonalprofilethelisimia_no  ?>
<input type="radio" name="wantchildren1" id="wantchildren1" value="NS" <?= $want_children_ns ?> /><?=$form_not_sure?>

</div>
</div>
<? } ?>

<div class="form-group">
<label class="col-lg-4 control-label">
<?= $updatepersonalprofileblood_group ?></label>
<div class="col-lg-8">
<select name="cmbblood_group" class="form-control">
<? fillcombo("select id,title from tbldating_blood_group_master where currentstatus=0 and languageid=$sitelanguageid  order by title ",$blood_group,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>


<div class="form-group">
<label class="col-lg-4 control-label">
<?= $updatepersonalprofiledprofilecreatedby  ?></label>
<div class="col-lg-8">
<select name="cmbprofilecreatedby" class="form-control">
<?=fillcombo("select id,title from tbldatingprofilecreatedbymaster where currentstatus=0 and 
languageid=$sitelanguageid  order by title ",$profilecreatedbyid,$updatepersonalprofiledprofileselect_sel); ?>
</select></div>
</div>

<div class="form-group">
<label class="col-lg-4 control-label">
<?= $updatecontactprofilehearaboutus ?></label>
<div class="col-lg-8">
<select name="cmbhearaboutusid" class="form-control">
<? fillcombo("select id,title from tbldatinghearaboutusmaster where currentstatus=0 and languageid=$sitelanguageid order by title",$hearaboutusid,$updatepersonalprofiledprofileselect_sel); ?>
</select></div>
</div>

<? if ($Enable_HIV_thelesima_illiness_blood_group_design_setting == "Y") { ?>

<div class="form-group">
<label class="col-lg-4 control-label"><?= $updatepersonalprofilethelisimia  ?></label>
<div class="col-lg-8">
<input type="radio" name="radthelisimia" value="Y" <?= $thelisimia_y ?> /> <?= $updatepersonalprofilethelisimia_yes  ?> 
<input type="radio" name="radthelisimia" value="N" <?= $thelisimia_n ?> /> <?= $updatepersonalprofilethelisimia_no  ?>
</div>
</div>

<div class="form-group">
<label class="col-lg-4 control-label"><?= $updatepersonalprofileilliness ?></label>
<div class="col-lg-8">
<input type="text" name="txt_illiness" class="form-control" value="<?= $illiness ?>" maxlength="<?= $textbox_character_max_length ?>"/>
</div>
</div>

<div class="form-group">
<label class="col-lg-4 control-label">
<?= $updatepersonalprofilespecialcases  ?></label>
<div class="col-lg-8">
<select name="cmbspecialcase" class="form-control form_1" onchange="specialcase(this.value)">
<? fillcombo("select id,title from tbldatingspecialcasemaster where currentstatus=0 and languageid=$sitelanguageid  order by id ",$specialcaseid,$updatepersonalprofiledprofileselect_sel); ?>
</select></div>
</div>

	<? if($specialcaseid=='10'){
        $hst = '';
    }else{
        $hst = 'style="display:none;"';	
    }
     ?>

	<div id="artstatus" <?=$hst?> >

	<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updatepersonalprofiledhivartstatus ?></label>
<div class="col-lg-8">
<input type="radio" name="artstatus1" value="Y" <?= $art_status_y ?> /><?= $updatepersonalprofilethelisimia_yes  ?> 
<input type="radio" name="artstatus1" value="N" <?= $art_status_n ?> /> <?= $updatepersonalprofilethelisimia_no  ?>
</div>
</div>

	 <div class="form-group">
                    <label class="col-lg-4 control-label"><?= $updatepersonalprofiledhivhivsince ?></label>
                    <div class="col-lg-8">
<input type="text" name="txthivsince" id="txthivsince" onkeyup="numericnumbers(this.value,this.id)" value="<?= $hiv_since  ?>" size="35" class="form-control" maxlength="<?= $textbox_character_max_length ?>"/>
</div>
</div>

	<div class="form-group">
                    <label class="col-lg-4 control-label"><?= $updatepersonalprofiledhivcd4count ?></label>
                    <div class="col-lg-8">
<input type="text" name="txtcd4count" id="txtcd4count" value="<?= $cd4_count  ?>" onkeyup="numericnumbers(this.value,this.id)" size="35" class="form-control" maxlength="<?= $textbox_character_max_length ?>"/>
</div>
</div>

	</div>
<? } ?>





<input type="hidden" id="gethidden" name="gethidden" />
<input type="hidden" id="datehidden" name="datehidden" value="<?=date("Y-m-d H:i:s")?>"/>
<input type="hidden" id="valfield" name="valfield" />
<div class="form-group">
<label class="col-lg-4 control-label">&nbsp;</label>
<div class="col-lg-8">
<div class="formbtn_outer">
<input name="Submit" type="submit"  class='formbtn' value="<?= $updatepersonalprofiledsubmit ?>"> 
<input name="Reset" type="reset"  class='resetbtn'  value="<?= $updatepersonalprofiledreset ?>"></p>
</div>
</div>
</div>
</fieldset>
</form>


<!-- ********* CONTENT END HERE *********-->
</div>
</div>


		
