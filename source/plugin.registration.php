<div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-6 midle_title"><span><?= $registerpgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-3 hidden-md trac_top">&nbsp;</div>
    </div>




		<!-- ********* TITLE END HERE *********-->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
        
        
		<span style="display:none"></span>
		<div class="errorbox"><span></span></div>		
		<div class="note" align="center"><?= $registernote ?></div>
        
       
<div class="errorbox errorbox3" style="margin-bottom:15px;" ><span><?=checkerror()?></span></div>

<?
if(findsettingvalue('side_display')!=""){?>
	<img src="uploadfiles/<?=findsettingvalue('side_display')?>" />
<? } ?>	
<? //=$staff_display?>

<? if($staff_display=="N") { ?>
<form ENCTYPE="multipart/form-data" name ='regs_frmdocument' class="registration_form editform_section" id='regs_form1' method='post'
 action ="<?= $sitepath.$filename ?>.php?b=<?=$userid?>" onSubmit="return validateForm()">
<? } else { ?>

<form ENCTYPE="multipart/form-data" name ='frmdocument' class="registration_form editform_section" id='form1' method='post' action ="<?= $sitepath.$filename ?>.php
?b=<?=$userid?>" onSubmit="return validateForm()">
<? } ?>
<fieldset>

<div class="errorbox errorbox3" style="margin-bottom:15px; display:none;"   id="errbx_reg_nickname" ><span></span></div>
<div class="form-group"><label class="col-lg-4 control-label"><?= $registernickname1 ?></label>
<div class="col-lg-8">
<input type="text" name="nickname" class="form-control" size=35 value="<?= $regs_nickname ?>" maxlength="<?= $textbox_character_max_length ?>" title="<?= $registernickname1_title ?>" id="reg_nickname"> *</div></div>


<div class="errorbox errorbox3" style="margin-bottom:15px; display:none;"   id="errbx_reg_name" ><span></span></div>
<div class="form-group"><label class="col-lg-4 control-label"><?= $registername1 ?></label>
<div class="col-lg-8">
<input type="text" name="reg_name" id="regs_name" class="form-control" size=35 value="<?= $regs_name ?>" maxlength="<?= $textbox_character_max_length ?>" title="<?= $registername1_title ?>" > *</div></div>


<div class="errorbox errorbox3" style="margin-bottom:15px; display:none;"   id="errbx_reg_emailaddress" ><span></span></div>
<div class="form-group"><label class="col-lg-4 control-label"><?= $registeremail1 ?></label>
<div class="col-lg-8">
<input type="text" name="email" class="form-control"  value="<?= $regs_email  ?>" size=35 maxlength="<?= $textbox_character_max_length ?>" title="<?= $registeremail1_title ?>" id="reg_emailaddress"  > *</div></div>

<div class="errorbox errorbox3" style="margin-bottom:15px; display:none;"   id="errbx_reg_confirm_email" ><span></span></div>
<div class="form-group"><label class="col-lg-4 control-label"><?= $registeremail_confirm_1 ?> :</label>
<div class="col-lg-8">
<input type="text" name="confirm_email" class="form-control" 
value="<?= $regs_email  ?>" size=35 maxlength="<?= $textbox_character_max_length ?>"   title="<?= $registeremail_confirm_1_title ?>" id="regs_confirm_email"> *</div>
<? //if(isset($_GET['agt']) && $_GET['agt']!="") { 
if(isset($_GET['cat']) && $_GET['cat']=="emp") { 
	$rand = "matrimony".rand();	
?>
<input type="hidden" name="emp" value="emp" />
<input type="hidden" name="Password" value="<?=$rand?>" 	/>
<input type="hidden" name="ConfirmPassword" value="<?=$rand?>" />
<? }  if(!isset($_GET['cat'])) { ?>
</div>

<div class="errorbox errorbox3" style="margin-bottom:15px; display:none;"  id="errbx_regs_password" ><span></span></div>
<div class="form-group"><label class="col-lg-4 control-label"><?= $registerpassword1 ?></label>
<div class="col-lg-8">
<input type="password"  name="Password" class="form-control" size=35 maxlength="<?= $textbox_character_max_length ?>" title="<?= $registerpassword1_title ?>" id="regs_password" > *<br />
<span class="form-text"><?=$registerhelp1?></span>
</div>
</div>


<div class="errorbox errorbox3" style="margin-bottom:15px; display:none;"   id="errbx_regs_conf_password" ><span></span></div>
<div class="form-group"><label class="col-lg-4 control-label"><?= $registerconfirmpassword1 ?> </label>
<div class="col-lg-8"><input type="password" name="ConfirmPassword" class="form-control" size=35 maxlength="<?= $textbox_character_max_length ?>" title="<?= $registerconfirmpassword1_title ?>" id="regs_conf_password" > * </div></div>
<? } ?>



<div class="errorbox errorbox3" style="margin-bottom:15px; display:none;"   id="errbx_regs_gender" ><span></span></div>
<div class="form-group"><label class="col-lg-4 control-label"><?= $registergender ?></label> 
<div class="col-lg-8">
<select name='gender' id="regs_gender" class="form-control">
<? fillcombo("select genderid,gender from tbldatingendermaster where currentstatus=0 order by gender ","$regs_gender_sel","Select"); ?>
</select> * <div class="form-text"><?=$registerhelp2?></div> </div></div>


<div class="errorbox errorbox3" style="margin-bottom:15px; display:none;"   id="errbx_dob" ><span></span></div>
<div class="form-group"><label class="col-lg-4 control-label"><?= $updatepersonalprofileddob ?></label>
<div class="col-lg-8">
<select name="dobdd" class="form-control form_date" id="reg_dobdd">
<? fillnumdata(1,31,$updatepersonalprofiledprofileselect,"$regs_dobdd_sel") ?></select>

<select name="dobmm" class="form-control form_date"  id="reg_dobmm">
<? fillnumdata(1,12,$updatepersonalprofiledprofileselect_month,"$regs_dobmm_sel","Y") ?> </select>
<? 
$start_year = date('Y')-65;
$end_year = date('Y')-18;
?>

<select name="dobyy" class="form-control form_date" id="reg_dobyy">
<? fillnumdata($start_year,$end_year,$updatepersonalprofiledprofileselect_year,"$regs_dobyy_sel")  ?>
</select>  *


<?
	if(isset($_GET['agnt'])){ ?>
		<input type="hidden" name="cat" value="agnt" />
<?	} if(isset($_GET['agt'])) { ?>
		<input type="hidden" name="cat" value="agt" />
<?	}	
 ?>
<div class="form-text"><?=$registerhelp3?></div>
</div>
</div>

<? //echo $Enable_mobile_registration_page_design_setting;?>
<? if ($Enable_mobile_registration_page_design_setting == "Y") { ?>
	
 	
 <div class="errorbox errorbox3" style="margin-bottom:15px; display:none;"   id="errbx_mobile" ><span></span></div>
<div class="form-group"><label class="col-lg-4 control-label"><? echo $registration_mob; ?> :</label>	
   <div class="col-lg-8"> <input type="text" value="+91" class="form-control form_mobile_code" size="2" name="country_code" id="country_code" onkeyup="IsNumeric1(this.value,'country_code')" />
<input type="text" value="<?=$regs_mobile ?>" size="8" name="mobile" class="form-control form_mobile_no " id="mobile1" title="Mobile"  onkeyup="IsNumeric1(this.value,'mobile1')"  /> * </div></div>
	
<div class="form-group"><label class="col-lg-4 control-label"><?=$registration_land?> :</label>	
	<div class="col-lg-8"><input type="text" value="<?=$regs_city_code ?>" size="2" name="city_code" class="fomr_sht1 form-control" id="city_code"  onkeyup="IsNumeric1(this.value,'land_no')" />
    </div>
    </div>

<? } ?>



<div class="errorbox errorbox3" style="margin-bottom:15px; display:none;"   id="errbx_cmbreligian" ><span></span></div>
<div class="form-group"><label class="col-lg-4 control-label"><?= $updateprofile2religian ?></label>
<div class="col-lg-8">
<select name="cmbreligian" class="form-control" id="regs_cmbreligian" >
<? fillcombo("select id,title from tbldatingreligianmaster where currentstatus=0 and languageid=$sitelanguageid order by ordering",$regs_cmbreligian_sel,$updatepersonalprofiledprofileselect_sel) ?>
</select>&nbsp;*</div>
</div>
<? if($enable_social_community=='Y'){ ?>
<div class="form-group"><label class="col-lg-4 control-label"><?= $updateprofile2motherthoungue ?></label>
<div class="col-lg-8">
<select name="cmbmothertounge" class="form-control">
<? fillcombo("select  id,title from tbldatingmothertonguemaster where currentstatus=0 and languageid=$sitelanguageid  order by title ",$regs_cmbmothertounge_sel,$updatepersonalprofiledprofileselect_sel); ?>
</select></div></div>
<? } ?>


<div class="errorbox errorbox3" style="margin-bottom:15px; display:none;"   id="errbx_cmbcountryid" ><span></span></div>
<div class="form-group"><label class="col-lg-4 control-label"><?= $updatecontactprofilecountry ?></label>
<div class="col-lg-8"><select name="cmbcountryid" id="regs_cmbcountryid"class="form-control" onchange="get_state(this.value)">
<? fillcombo("select id,title from tbldatingcountrymaster where currentstatus=0 and languageid=$sitelanguageid order by title",$regs_cmbcountryid_sel,$updatepersonalprofiledprofileselect_country); ?>
</select>&nbsp;*</div></div>
<?
if($countryid!=""){
	$cmb_st = 'display:inline';
	$inpt_st = 'display:none'; 
} else {
	$cmb_st = 'display:none';
	$inpt_st = 'display:inline';
}
 
 if($countryid!=""){		
		?>
<div class="form-group" id="exist_state">
	<label class="col-lg-4 control-label"><?=$updatecontactprofilestate ?>:</label> 
    <div class="col-lg-8">
	<select name="cmbstateid" id="cmbstateid" class="form-control" >
		<? fillcombo("select id,title from tbldating_state_master where currentstatus=0 and country_id=".$countryid." and languageid=$sitelanguageid order by title",$regs_cmbstateid_sel,$updatepersonalprofiledprofileselect_sel); ?>
</select>
<span style="cursor:pointer; padding-left:5px;" onclick="document.getElementById('otherstate').style.display='inline'" ><?= $updatecontactprofileother ?>
</span>
<input type="text" class="form-control form_1 form_other" name="otherstate" id="otherstate" size="10" style="display:none;" />
</div>


</div>

<div class="form-group" id="exist_city" >
	<label class="col-lg-4 control-label"><?=$updatecontactprofilecity ?></label>
    <div class="col-lg-8">
 	<select name="cmbcityid" id="cmbcityid" class="form-control" >
	<? fillcombo("select id,title from  tbldating_city_master where currentstatus=0 AND state_id=".$state." and languageid=$sitelanguageid order by title",$regs_cmbcityid_sel,$updatepersonalprofiledprofileselect_sel); ?>
</select>
<span style="cursor:pointer;  padding-left:5px;" onclick="document.getElementById('existcity_other').style.display = 'inline'"><?= $updatecontactprofileother ?>  </span>
<input class="form-control form_1 form_other" type="text" name="city_other" id="existcity_other" value="" size="10" style="display:none;" />
</div>
    
    
</div>
<? } ?>


<div class="form-group" id="state_indicator" style="display:none"><img src="uploadfiles/indicator.gif"/></div>
<div id="state"></div>

<div class="form-group" id="city_indicator" style="display:none"><img src="uploadfiles/indicator.gif" /></div>
<div id="city"></div>
<?

if(enable_zipcode=='Y'){
?>

<div class="errorbox errorbox3" style="margin-bottom:15px; display:none;"   id="errbx_txtpostcode" ><span></span></div>
<div class="form-group">
    <label class="col-lg-4 control-label"><?= $updatecontactprofile_zip ?></label>
    <div class="col-lg-8">
    <input type="text" name="txtpostcode" id="txtpostcode" value=""  size="15" class="form-control" maxlength="<?= $textbox_character_max_length ?>" />*
    </div>
</div>
<? } ?>

<div class="errorbox errorbox3" style="margin-bottom:15px; display:none;" id="errbx_cmbprofilecreatedby"><span></span></div>
<div class="form-group">
	<label class="col-lg-4 control-label"><?= $updatepersonalprofiledprofilecreatedby  ?></label>
    <div class="col-lg-8">
        <select name="cmbprofilecreatedby" class="form-control" id="regs_cmbprofilecreatedby">
        <? fillcombo("select id,title from tbldatingprofilecreatedbymaster where currentstatus=0 and languageid=$sitelanguageid  order by title ",$regs_cmbprofilecreatedby_sel,$updatepersonalprofiledprofileselect_sel); ?>
        </select>&nbsp;*
    </div>
</div>

<?
	$ag_val='';

if(isset($_COOKIE['matrimonyagntid']) && $_COOKIE['matrimonyagntid']!='')
{
	
	$ag_val = $_COOKIE['matrimonyagntid'];
}
 else 
{
		 if(isset($_GET['agnt']) && $_GET['agnt']!="")
		{  
			
			setcookie("matrimonyagntid", $_GET['agnt'], time() + (86400 * 30), '/');	
			
			$ag_val = $_GET['agnt'];
		}
}

		
?>
        <!---<label>Agent code</label>--->
		<input type="hidden" name="agent_code" id="agent_code" class="form-control" value="<?=$ag_val?>" />

<? 

 if ($agent_module_enable == "Y") { 
	if(!isset($_COOKIE['matrimonyagntid'])) {
		 if(!isset($_GET['agnt'])) {		 	 
	?>	
<!--</div></div>-->
<? 		}
	}
} ?>



<? if($staff_display=="N") { ?>

<div class="errorbox errorbox3" style="margin-bottom:15px; display:none;"   id="errbx_cmbhearaboutusid" ><span></span></div>
<div class="form-group">
        <label class="col-lg-4 control-label"><?= $updatecontactprofilehearaboutus ?></label>
        <div class="col-lg-8">
            <select name="cmbhearaboutusid" id="regs_cmbhearaboutusid"class="form-control" >
            <? fillcombo("select id,title from tbldatinghearaboutusmaster where currentstatus=0 and languageid=$sitelanguageid order by title",$regs_cmbhearaboutusid_sel,$updatepersonalprofiledprofileselect_sel); ?>
            </select>&nbsp;*
        </div>
</div>

<!-- Haresh code start here -->
<?
if($brother_siste_registration=='Y'){
?>
<div class="form-group">
<table cellpadding="0" cellspacing="0" border="0" class="brosis" width="100%" style="border:none; background-color:#FAFAFA;">
<tr>
<td class="brosis1" style=" background-color:#FAFAFA;"></td>
<td class="brosis1" width="40%" style="border-bottom:none; background-color:#FAFAFA;"><?= $updateintrestprofilemarried ?></td>
<td class="brosis1" width="40%" style="border-bottom:none; background-color:#FAFAFA;"><?= $updateintrestprofileunmarried ?></td>
</tr>
<tr>
<td class="brosis2" style="border-bottom:none; border-right:none; background-color:#FAFAFA;"><?= $updateintrestprofilebrother_married1 ?></td>
<td class="brosis3" style="background-color:#FAFAFA;"><input type="text" name="txtbrother_married1" class="form" value="<? //$brother_married1 ?>" size="10" style="text-align:center" maxlength="<?= $textbox_character_max_length ?>"/></td>
<td class="brosis3" style="background-color:#FAFAFA;"><input type="text" name="txtbrother_unmarried1" class="form" value="<? //$brother_unmarried1 ?>" size="10" style="text-align:center" maxlength="10"> *</td>
</tr>
<tr>
<td class="brosis2" style="border-bottom:none; border-right:none; background-color:#FAFAFA;"><?= $updateintrestprofilesister1 ?></td>
<td class="brosis3" style="background-color:#FAFAFA;"><input type="text" name="txtsister_married1" class="form" value="<? //$brother_married1 ?>" size="10" style="text-align:center" maxlength="<?= $textbox_character_max_length ?>"/></td>
<td class="brosis3" style="background-color:#FAFAFA;"><input type="text" name="txtsister_unmarried1" class="form" value="<? //$brother_unmarried1 ?>" size="10" style="text-align:center" maxlength="10"> *</td>
</tr>
</table>
</div>	
<? } ?>

 
 
<!-- Haresh code ends Here -->
<div class="error1" align="center" id="errbx_hiddencaptcha" style="display:none"></div>
<div class="form-group">
<label class="col-lg-4 control-label"><?= $registercaptcha ?></label>
<div class="col-lg-8">
	<img style="vertical-align:middle" id="regs_imagenmcaptcha" src='<?= $sitepath ?>uploadfiles/captcha/<?= $imagenm_captcha ?>'> 
    <input type="hidden" name="hiddencaptcha" id="regs_hiddencaptcha" value="<?=$captch_no?>" />
	<input type="text" name="Captcha"   id="regs_Captcha"  class="form-control cpasities" style="width:100px;"value="" size="3" style="vertical-align:middle" title="<?= $registercaptcha_title ?>" > * <img src="uploadfiles/refresh.png" onclick="change_captcha_regs();" /> <?= $contactus_clicktochange ?> </div> </div>
<? } else { ?>




<div class="form-group">
<label class="col-lg-4 control-label"><?= $registercontact ?></label>
    <div class="col-lg-8">
    <input type="text" name="staff_contact" class="form" size=35 value="<?= $staff_contact ?>" maxlength="<?= $textbox_character_max_length ?>">
    </div>
</div>

<div class="form-group">
<label class="col-lg-4 control-label"><?=$registerrelationclient?></label> 
    <div class="col-lg-8">
        <select name='staff_relation' class="form-control" style="width:207px">
        <? fillcombo("select relationid,relationname from tbl_relation_master where currentstatus=0 order by relationid ","$relationid","Select"); ?>
        </select>
    </div>
</div>


<?


if($staff_display=='Y') {	
//$agentid = getonefielddata("SELECT emp_id from tbl_agent_master WHERE currentstatus=0 AND agent_code=".$_GET['agnt']);
$agentid = getonefielddata("SELECT emp_id from tbl_agent_master WHERE currentstatus=0 AND agent_code=".$matriagentid);
?>


<div class="form-group">
	<label class="col-lg-4 control-label"><?= $registeragent ?></label>
    <div class="col-lg-8">
        <select name='staff_agent' class="form-control" style="width:207px" onchange="get_code(this.value)">
        <? fillcombo("select emp_id,name from tbl_agent_master where currentstatus=0 AND emp_id!='NULL' order by emp_id ","$agentid","Select"); ?>
        </select>
    </div>
</div>
<div class="form-group">
	<label class="col-lg-4 control-label"><?= $registercollection ?></label> 
    <div class="col-lg-8">
        <select name='staff_collection' class="form-control" style="width:207px">
        <? fillcombo("select collectionid,collectionname from tbl_collection_master where currentstatus=0 order by collectionid ","$collectionid","Select"); ?>
        </select>
    </div>
</div>
<? } ?>

<div class="form-group">
	<label class="col-lg-4 control-label"><?= $registerdate ?></label>
    <div class="col-lg-8">
   	 <input class="form-control" type="text" name="date" id="date" class="input" value="<?= $date ?>" readonly size=10 >
    </div>
</div>
<div class="form-group">
	<label class="col-lg-4 control-label"><?=$default_registration_comment?> :</label>
    <div class="col-lg-8">
    <textarea class="form-control" name="comment" id="comment" cols="35"></textarea>
    </div>
</div>

<? } ?>

<div class="error1" align="center" id="errbx_chkcond1" style="display:none"></div>
  <div class="form-group">
  	  <label class="col-lg-4 control-label">&nbsp;</label>
      <div class="col-lg-8">
          <input type="checkbox" name="chkcond1" id="regs_chkcond1" size="35"  <?=$regs_chkcond1_chk?>>   *
          <?
          $cmsid = getonefielddata("select cmsid from tblcmsmaster where LocationId=7 and languageid=$sitelanguageid and CurrentStatus=0");
        if ($cmsid != "") { ?>
        
          <?= $registerterms ?>
         <!-- </a>-->
        <? } ?>
      </div>
</div>
<div class="form-group">
    <label class="col-lg-4 control-label">&nbsp;</label>
    <div class="col-lg-8">
    <div class="formbtn_outer">
        <input name="Submit" type="submit" class="formbtn"  value="<?= $registersubmit ?>"> 
        <input name="Reset" type="reset" class="resetbtn" value="<?= $registerreset ?>" onclick="reset_regs_session();">
        </div>
    </div>
</div>
</fieldset> 
</form>
</div>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>