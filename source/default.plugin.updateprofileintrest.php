<div class="profilestoplinks"><?php include("profilestoplinks.php") ?></div>
<div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?= $updateintrestprofilepgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div>
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent Choosan_Form">
		<!-- ********* CONTENT START HERE *********-->


		<form style="margin:0px" class="update_form clientform editform_section" enctype="multipart/form-data" name ='form1' id='form1' method=post action ="<?= $sitepath ?><?= $filename ?>.php" >


	<div class="errorbox" id="errorbox"><span><?php checkerror(); ?></span></div>

<fieldset>
 <div class="form-group">
      <label class="col-lg-4 control-label"><?= $updateintrestprofileprofileheadline ?></label>
<div class="col-lg-8">
<textarea id="txtprofileheadline" name="txtprofileheadline" cols="35" rows="5" class="form-control form_text_area_0" onKeyDown="textCounter(this.form.txtprofileheadline,this.form.remLenheadline,500);" onKeyUp="textCounter(this.form.txtprofileheadline,this.form.remLenheadline,500);" style="min-width:306px;" onfocus="getonfocus('profileheadline','txtprofileheadline');"><?=strip_tags($profileheadline)  ?></textarea>
 
<a  class="help_iconTP" href="#">
<img style="vertical-align:bottom" data-toggle="tooltip"  data-placement="top" title="<?=$headline_updateprofileinterest?>" src="<?= $siteimagepath ?>images/help.png" />
</a> 



   
<div class="textwrapper">
<input readonly type=text class="form-control lefttexts" name=remLenheadline size=3 maxlength=3 value="<?= 500 - strlen($profileheadline) ?>" style="pad"> 

<span class="character"><?= $updateprofileintrest_charactersleft ?></span>
<div class="gen_btn">
<input type="button" name="show1" value="<?= $updateprofileintrest_btn_generator ?>" onclick="show_gen1();" /></div>

<div id="showme1" style="display:none;" class="generat_form">
<img align="right" src="uploadfiles/delete.png" onclick="closediv()" />

<div class="form-group">
<label class="col-lg-4 control-label"><?= $updateprofileintrest_selectgreeting ?> :</label>
<div class="col-lg-8">
<input type="radio" value="<?= $updateprofileintrest_hi ?>" name="gree" id="gre" /> <?= $updateprofileintrest_hi ?> 
<input id="gre1" type="radio" value="<?= $updateprofileintrest_hello ?>" name="gree" /> <?= $updateprofileintrest_hello ?>
</div>
</div>


<div class="form-group">
<label class="col-lg-4 control-label"><?= $updateprofileintrest_education ?> :</label> <?= $updateprofileintrest_completedmy ?> 
<div class="col-lg-8">
<select id="edu1" name="cmbeducation" class="form-control">
<?=filleducombo_title($educationid);?>
</select>
</div>
</div>

<div class="form-group">
<label class="col-lg-4 control-label"><?= $updateprofileintrest_profession ?>:</label> <?= $updateprofileintrest_currentlyworking ?> 
<div class="col-lg-8">
<select id="pro1" name="cmboccupation" class="form-control">
<? filloccupationcombo_title($ocupationid); ?>
</select>
</div>
</div>
	<center><div class="gen_btn_in"><input type="button" name="sub" value="Generate" onclick="valid1()" /></div></center>
</div>

</div>
</div>

  
</div>

</p>
 <div class="form-group">
      <label class="col-lg-4 control-label"><?= $updateintrestprofilepersonality ?></label>
      <div class="col-lg-8">
<textarea id="txtaboutme" name="txtpersonality" cols="35" rows="5" class="form-control form form_text_area_0" onKeyDown="textCounter(this.form.txtpersonality,this.form.remLen,1000);" onKeyUp="textCounter(this.form.txtpersonality,this.form.remLen,1000);" style="min-width:306px;" onfocus="getonfocus('personality','txtaboutme');" ><?=strip_tags($personality)  ?></textarea>



 <a  class="help_iconTP" href="#">
<img style="vertical-align:bottom" data-toggle="tooltip"  data-placement="top" title="<?=$partner_updateinterest?>" src="<?= $siteimagepath ?>images/help.png" />
</a>
 
<div class="textwrapper">
<input readonly type=text class="form-control lefttexts"  name=remLen size=3 maxlength=3 value="<?= 1000 - strlen($personality); ?>"> 

<span class="character"><?= $updateprofileintrest_charactersleft ?></span>
<div class="gen_btn">
<input type="button" name="show" id="show" onclick="show_gen()" value="<?= $updateprofileintrest_btn_generator ?>" /></div>

<div id="showme" style="display:none;" class="generat_form generta5">
<img align="right" src="uploadfiles/delete.png" onclick="closediv1()" />




<div class="form-group">
      <label class="col-lg-4 control-label"><?= $updateprofileintrest_selectgreeting ?> :</label> 
 <div class="col-lg-8">     
      <input type="radio" value="<?= $updateprofileintrest_hi ?>" name="gree" id="gree" /> <?= $updateprofileintrest_hi ?> 
      <input id="gree1" type="radio" value="<?= $updateprofileintrest_hello ?>" name="gree" /> <?= $updateprofileintrest_hello ?> 

      </div>
      </div>
     
<div class="form-group">
      <label class="col-lg-4 control-label"><?= $updateprofileintrest_education ?> :</label> <?= $updateprofileintrest_completedmy ?>
      <div class="col-lg-8"> 
       <select id="edu" name="cmbeducation" class="form-control">
<?=filleducombo_title($educationid);?>
</select>
</div>
</div>
<div class="form-group">
      <label class="col-lg-4 control-label"><?= $updateprofileintrest_profession ?> :</label> <?= $updateprofileintrest_currentlyworking ?> 
       <div class="col-lg-8"> 
      <select id="pro" name="cmboccupation" class="form-control" style="width:161px">
<? filloccupationcombo_title($ocupationid); ?>
</select>
</div>
</div>

<h3 class="header_topics"><?= $updateprofileintrest_enterdetails; ?></h3>

<div class="form-group">
      <label class="col-lg-4 control-label"><?= $updateprofileintrest_friendsdescribe ?>  :</label>  
  <div class="col-lg-8">     
      <input type="text" name="des" class="form-control" id="des" />(<?= $updateprofileintrest_friendsdescribeexample ?>)
      </div>
      </div>
<div class="form-group">
      <label class="col-lg-4 control-label"><?= $updateprofileintrest_value ?> : </label>
      <div class="col-lg-8">
      <input type="text" name="val" id="val" class="form-control" />
      
      </div>
      </div>
<div class="form-group">
      <label class="col-lg-4 control-label"><?= $updateprofileintrest_motto ?> :</label>
      <div class="col-lg-8">
      <input type="text" name="motto" id="motto" class="form-control" />
      </div>
      </div>
<div class="form-group">
      <label class="col-lg-4 control-label"><?= $updateprofileintrest_hobbies ?> :</label> 
      <div class="col-lg-8">
      <input type="text" name="hob" class="form-control" id="hob" />(<?= $updateprofileintrest_hobbiesexample ?>)
      </div>
      </div>
      <div class="form-group">
      <label class="col-lg-4 control-label"><?= $updateprofileintrest_favoritebooks ?> :</label>
      <div class="col-lg-8">
      <input type="text" name="books" id="books" class="form-control" />
      </div>
      </div>
  <div class="form-group">
      <label class="col-lg-4 control-label"><?= $updateprofileintrest_favoritesport ?> :</label>
       <div class="col-lg-8">
      <input type="text" name="spo" id="spo"  class="form-control" />(<?= $updateprofileintrest_favoritesportexample ?>)
      </div>
      </div>
 <div class="form-group">
      <label class="col-lg-4 control-label"><?= $updateprofileintrest_marriageviews ?> :</label>
<div class="col-lg-8">
<input type="text" name="views" id="views"  class="form-control" />
</div>
</div>
			<center><div class="gen_btn_in"><input type="button" name="sub" value="Generate" onclick="valid()" /></div></center><br />
</div>
</div>
</div>
 

</div>



 <div class="form-group">
      <label class="col-lg-4 control-label"><?= $updateintrestprofilefamilybackground ?></label>
      <div class="col-lg-8">
      <textarea id="txtfamilybackground" name="txtfamilybackground" cols="35" rows="5" class="form-control form form_text_area_0" onKeyDown="textCounter(this.form.txtfamilybackground,this.form.remLenbkg,1000);" onKeyUp="textCounter(this.form.txtfamilybackground,this.form.remLenbkg,1000);" style="min-width:306px;"><?=strip_tags($familybackground)  ?></textarea>
 
<a  class="help_iconTP" href="#">
<img style="vertical-align:bottom" data-toggle="tooltip"  data-placement="top" title="<?=$family_updateinterest?>" src="<?= $siteimagepath ?>images/help.png" />
</a>
      
<div class="textwrapper">
<input readonly type=text class="form-control lefttexts"  name=remLenbkg size=3 maxlength=3 value="<?= 1000 - strlen($familybackground) ?>" style="pad"> 
<span class="character"><?= $updateprofileintrest_charactersleft ?></span>
</div>
</div>
</div>

	
 <div class="form-group">
 <div id="error_father" style="display:none" class="errorbox"></div>
      <label class="col-lg-4 control-label"><?=$updateinterestfathername;?></label>
  <div class="col-lg-8">
<input type="text" name="father_name" id="father_name" class="form-control" value="<?= $father_name ?>" maxlength="<?= $textbox_character_max_length ?>" onfocus="getonfocus('father_name','father_name');"/>
</div>
</div>


<div class="form-group">
      <label class="col-lg-4 control-label"><?= $updateintrestprofilefather_occupation ?></label>
       <div class="col-lg-8">
<select name="cmbfather" class="form-control" onchange="change_father_occ(this.value)">
<? fillcombo("select id,title from tbldatingfathermotherstatusmaster where currentstatus IN (0) and languageid=$sitelanguageid  
order by title ",$father_status_id,$updatepersonalprofiledprofileselect_sel); ?>
<option value="other" >Other</option>
</select> 


	<input type="text" name="txtfather_occupation" id="txtfather_occupation" class="form-control form_1 form_other" size="13" 
value="" maxlength="" style="display:none;">


</div>
</div>

<?
if($father_status_id==5 || $father_status_id==6 || $father_status_id==4)
{
	$father_ofc_st='style="display:none"';
}else { 	$father_ofc_st='style="display:block"'; }
?>

 <div class="form-group" id="father_nameofc_div" <?=$father_ofc_st?>>
      <label class="col-lg-4 control-label"><?=$updateinterestfatherofcname;?></label>
  <div class="col-lg-8">
<input type="text" name="father_nameofc" id="father_nameofc" class="form-control" value="<?= $father_nameofc ?>" maxlength="<?= $textbox_character_max_length ?>" onfocus="getonfocus('father_nameofc','father_nameofc');"/>
</div>
</div>




<div class="form-group">
      <label class="col-lg-4 control-label"><?=$updateinterestmothername?></label>
   <div class="col-lg-8">   
<input type="text" name="mother_name" id="mother_name" class="form-control" value="<?= $mother_name ?>" maxlength="<?= $textbox_character_max_length ?>" onfocus="getonfocus('mother_name','mother_name');"/>
</div>
</div>

<div class="form-group"> <label class="col-lg-4 control-label"><?= $updateintrestprofilemother_occupation ?></label>
 <div class="col-lg-8">
<select name="cmbmother" class="form-control" onchange="change_mother_occ(this.value)">
<? fillcombo("select id,title from tbldatingfathermotherstatusmaster where currentstatus=0 and languageid=$sitelanguageid  order by title ",$mother_status_id,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div>
</div>



<? 
	if($mother_status_id=='7'){
		$stylem = 'style="display:inline"';
	} else {
		$stylem = 'style="display:none"';
	}
?>
<input type="text" name="txtmother_occupation" id="txtmother_occupation" class="form" <?=$stylem?> value="<?= $mother_occupation ?>" maxlength="<?= $textbox_character_max_length ?>"/>


<?
if($mother_status_id==5 || $mother_status_id==6 || $mother_status_id==4)
{
	$mother_ofc_st='style="display:none"';
}else { 	$mother_ofc_st='style="display:block"'; }
?>

<div class="form-group" <?=$mother_ofc_st?> id="mother_nameofc_div">
      <label class="col-lg-4 control-label"><?=$updateinterestmotherofcname?></label>
   <div class="col-lg-8">   
<input type="text" name="mother_nameofc" id="mother_nameofc" class="form-control" value="<?= $mother_nameofc ?>" maxlength="<?= $textbox_character_max_length ?>" onfocus="getonfocus('mother_nameofc','mother_nameofc');"/>
</div>
</div>


<div class="form-group"> <label class="col-lg-4 control-label"><?=$updateinterestsiblings ?></label>
 <div class="col-lg-8">
<table width="60%" border="0" cellspacing="0" cellpadding="0" class="brosis updateprofileintrest">
<tr>
<td class="brosis1">&nbsp;</td>
<td class="brosis1" width="35%"><?= $updateintrestprofilemarried ?></td>
<td class="brosis1" width="35%"><?= $updateintrestprofileunmarried ?></td>
</tr>
<tr>
<td class="brosis2"><?= $updateintrestprofilebrother_married1 ?></td>
<td class="brosis3"><input type="text" name="txtbrother_married1" id="txtbrother_married1" class="form"

 value="<?= $brother_married1 ?>" size="2" style="text-align:center" maxlength="<?= $textbox_character_max_length ?>" 
 onfocus="getonfocus('brother_married1','txtbrother_married1');" onKeyUp="return txtbrother_married1_function();" /></td>
<td class="brosis3">
<input type="text" name="txtbrother_unmarried1" id="txtbrother_unmarried1" class="form" value="<?= $brother_unmarried1 ?>" size="2" style="text-align:center" maxlength="<?= $textbox_character_max_length ?>"
 onfocus="getonfocus('brother_unmarried1','txtbrother_unmarried1');" onKeyUp="return txtbrother_unmarried1_function();" /></td>
</tr>
<tr>
<td class="brosis2" style="border-bottom:none"><?= $updateintrestprofilesister1 ?></td>
<td class="brosis3"><input type="text" name="txtsister_married1" id="txtsister_married1" class="form" 
value="<?= $sister_married1 ?>" size="2" style="text-align:center" maxlength="<?= $textbox_character_max_length ?>" 
onfocus="getonfocus('sister_married1','txtsister_married1');" onKeyUp="return txtsister_married1_function();" /></td>
<td class="brosis3"><input type="text" name="txtsister_unmarried1" id="txtsister_unmarried1" class="form" 
value="<?= $sister_unmarried1 ?>" size="2" style="text-align:center" maxlength="<?= $textbox_character_max_length ?>"
 onfocus="getonfocus('sister_unmarried1','txtsister_unmarried1');" onKeyUp="return txtsister_unmarried1_function();"/></td>
</tr>
</table>
</div>
</div>


<?
	$chklang = getonefielddata("select languageid from tbldatinguserlanguagemaster where userid='".$curruserid."' ");
		$chklang1=explode(",",$chklang);
		
?>

<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updatecontactprofilelanguage ?></label>
 <div class="col-lg-8"> 
 	<div class="select2-wrapper MYseletion">
 <select  class="form-control select2-multiple" multiple tabindex="4" name="chklang[]" id="chklang">                                        
          <?  $qry = getdata("select title, id from tbldatinglanguagemaster where currentstatus=0 and languageid =$sitelanguageid order by title");
				while($rs = mysqli_fetch_array($qry)){ 
				?>	 
                    <option value="<?=$rs[1]?>" <? 
					if($chklang1!=''){
					if(in_array($rs[1],$chklang1)){ echo "selected"; }}?>>
					<?=$rs[0]?></option> 
             <? } ?>        
   	</select>
    </div>
 </div>
</div>
 
 
 


<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile4diet ?></label>
 <div class="col-lg-8">
 <select name="cmbdiet" class="form-control">
 
<? fillcombo("select id,title from tbldatingdietmaster where currentstatus=0 and languageid=$sitelanguageid order by title",$dietid,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div/>
</div/>
<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile4smoker ?></label>
  <div class="col-lg-8">
 <select name="cmbsmokerstatus" class="form-control">
<? fillcombo("select  id,title from tbldatingsmokerstatusmaster where currentstatus=0 AND id!=4 and languageid=$sitelanguageid  order by title ",$smokerstatusid,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div/>
 </div/>
 
<div class="form-group">
 <label class="col-lg-4 control-label"><?= $updateprofile4drinker ?></label>
   <div class="col-lg-8">
 <select name="cmbdrinkerstatus" class="form-control">
<? fillcombo("select  id,title from tbldatingdrinkerstatusmaster where currentstatus=0 AND id!=4 and languageid=$sitelanguageid  order by title ",$drinkerstatusid,$updatepersonalprofiledprofileselect_sel); ?>
</select>
</div/>
 </div/>
 



<input type="hidden" id="gethidden" name="gethidden" />
<input type="hidden" id="datehidden" name="datehidden" value="<?=date("Y-m-d H:i:s")?>"/>
<input type="hidden" id="valfield" name="valfield" />
<div class="form-group">
<label class="col-lg-4 control-label">&nbsp;</label>
<div class="col-lg-8">
	<div class="formbtn_outer">
<input name="Submit" type="submit"  class='formbtn' value="<?= $updateprodfile4submit ?>">
 <input name="Reset" type="reset"  class='resetbtn'  value="<?= $updateprodfile4reset ?>">
 </div>
 </div/>
 </div/>
</fieldset>


	</form>
	
		<!-- ********* CONTENT END HERE *********-->
		</div>
        </div>
        

        
        