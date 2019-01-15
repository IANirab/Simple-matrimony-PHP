

<script type="text/javascript">
function change_captcha1(){
	
	$.post('change_captcha.php',{
			captcha:"captcha"},
				function (data){	
									
					var newdata = data.split('#');	
					//alert(newdata)										
					document.getElementById('imagenmcaptcha1').src = '<?=$sitepath?>uploadfiles/captcha/'+newdata[0].trim();	
					document.getElementById('hiddencaptcha1').value = newdata[1];
				}
			);
}
</script>
		<div class="pagetitle">
         <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span><?= $franchiseeregistration_franchisee ?> <?= $registerpgtitle ?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    </div>
        
        
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent">
		<!-- ********* CONTENT START HERE *********-->
             
<? 
$agentname = '';
$agentemail = '';
$agentaltemail = '';
$agentcity = '';
$agentphone = '';
$agentaddress = '';
$agentmobile = '';
$agentwebsite = '';
$agentzipcode = '';
$agentstate = '';
$agentcountry = '';
$agentreferedid = '';
$agentreferedby = '';
if(isset($_SESSION[$session_name_initital . 'agentname']) && $_SESSION[$session_name_initital . 'agentname']!=''){
	$agentname = $_SESSION[$session_name_initital . 'agentname'];
}
if(isset($_SESSION[$session_name_initital . 'agentemail']) && $_SESSION[$session_name_initital . 'agentemail']!=''){
	$agentemail = $_SESSION[$session_name_initital . 'agentemail'];
}
if(isset($_SESSION[$session_name_initital . 'agentaltemail']) && $_SESSION[$session_name_initital . 'agentaltemail']!=''){
	$agentaltemail = $_SESSION[$session_name_initital . 'agentaltemail'];
}
if(isset($_SESSION[$session_name_initital . 'agentcity']) && $_SESSION[$session_name_initital . 'agentcity']!=''){
	$agentcity = $_SESSION[$session_name_initital . 'agentcity'];
}
if(isset($_SESSION[$session_name_initital . 'agentphone']) && $_SESSION[$session_name_initital . 'agentphone']!=''){
	$agentphone = $_SESSION[$session_name_initital . 'agentphone'];
}
if(isset($_SESSION[$session_name_initital . 'agentaddress']) && $_SESSION[$session_name_initital . 'agentaddress']!=''){
	$agentaddress = $_SESSION[$session_name_initital . 'agentaddress'];
}
if(isset($_SESSION[$session_name_initital . 'agentmobile']) && $_SESSION[$session_name_initital . 'agentmobile']!=''){
	$agentmobile = $_SESSION[$session_name_initital . 'agentmobile'];
}
if(isset($_SESSION[$session_name_initital . 'agentwebsite']) && $_SESSION[$session_name_initital . 'agentwebsite']!=''){
	$agentwebsite = $_SESSION[$session_name_initital . 'agentwebsite'];
}
if(isset($_SESSION[$session_name_initital . 'agentzipcode']) && $_SESSION[$session_name_initital . 'agentzipcode']!=''){
	$agentzipcode = $_SESSION[$session_name_initital . 'agentzipcode'];
}
if(isset($_SESSION[$session_name_initital . 'agentstate']) && $_SESSION[$session_name_initital . 'agentstate']!=''){
	$agentstate = $_SESSION[$session_name_initital . 'agentstate'];
}
if(isset($_SESSION[$session_name_initital . 'agentcountry']) && $_SESSION[$session_name_initital . 'agentcountry']!=''){
	$agentcountry = $_SESSION[$session_name_initital . 'agentcountry'];
}
if(isset($_SESSION[$session_name_initital . 'agentreferedid']) && $_SESSION[$session_name_initital . 'agentreferedid']!=''){
	$agentreferedid = $_SESSION[$session_name_initital . 'agentreferedid'];
}
if(isset($_SESSION[$session_name_initital . 'agentreferedby']) && $_SESSION[$session_name_initital . 'agentreferedby']!=''){
	$agentreferedby = $_SESSION[$session_name_initital . 'agentreferedby'];
}
?>
		<div class="register_form frachisee">
  
<div class="errorbox"><span><? checkerror(); ?></span></div>		
<div class="note" align="center"><?= $registernote ?></div>
<?
/*if(findsettingvalue('side_display')!=""){?>
	<img src="uploadfiles/site_<?=$sitethemefolder?>/<?=findsettingvalue('side_display')?>" />
<? }*/ ?>	
<form ENCTYPE="multipart/form-data" name ='frmdocument' class="fanchise_form Login form_sections" id='form1' method='post' action ="<?= $filename ?>.php" onSubmit="return validateForm()">
<fieldset>
<p><label><?= $franchiseeregistration_name ?> : </label>
<input type="text" name="name" id="name" class="form" size=54 value="<?=$agentname?>" maxlength="<?= $textbox_character_max_length ?>" > *</p>	

<p><label><?= $franchiseeregistration_email ?> :</label>
<input type="text" name="email" id="email" class="form" value="<?=$agentemail?>" size=54 maxlength="<?= $textbox_character_max_length ?>" > *</p>

<p><label><?= $franchiseeregistration_password ?> :</label>
<input type="password" name="password" id="password" class="form" value=" size=54" maxlength="<?= $textbox_character_max_length ?>" > *</p>

<p><label><?= $franchiseeregistration_confirmpass ?> :</label>
<input type="password" name="confpassword" id="confpassword" class="form" value="" size=54 maxlength="<?= $textbox_character_max_length ?>" > *</p>

<p><label><?= $franchiseeregistration_altemail ?> :</label>
<input type="text" name="altemail" id="altemail" class="form" value="<?=$agentaltemail?>" size=54 maxlength="<?= $textbox_character_max_length ?>" ></p>

<p><label><?= $franchiseeregistration_city ?> :</label>
<input type="text" name="city" id="city" class="form" value="<?=$agentcity?>" size=54 maxlength="<?= $textbox_character_max_length ?>" > </p>

<p><label><?= $franchiseeregistration_phone ?> : </label>
<input type="text" name="phone" id="phone" class="form" size=54 value="<?=$agentphone?>" maxlength="<?= $textbox_character_max_length ?>" > </p>

<p><label><?= $franchiseeregistration_address ?> : </label>
<textarea name="address" id="address" class="form" style="width:362px;" ><?=$agentaddress?></textarea></p>

<p><label><?= $franchiseeregistration_mobile ?> :</label>
<input type="text" name="mobile" id="mobile" class="form" value="<?=$agentmobile?>" size=54 maxlength="<?= $textbox_character_max_length ?>" > </p>

<p><label><?= $franchiseeregistration_website ?> :</label>
<input type="text" name="website" id="website" class="form" value="<?=$agentwebsite?>" size=54 maxlength="<?= $textbox_character_max_length ?>" > </p>

<p><label><?= $franchiseeregistration_zipcode ?> :</label>
<input type="text" name="zipcode" id="zipcode" class="form" value="<?=$agentzipcode?>" size=54 maxlength="<?= $textbox_character_max_length ?>" > </p>

<p><label><?= $franchiseeregistration_state ?> :</label>
<input type="text" name="state" id="state" class="form" value="<?=$agentstate?>" size=54 maxlength="<?= $textbox_character_max_length ?>" > </p>

<p><label><?= $franchiseeregistration_country ?> :</label>
<select name="cmbcountryid" class="form" style="width:362px;" >
<? fillcombo("select id,title from tbldatingcountrymaster where currentstatus=0 and languageid=$sitelanguageid order by title",$agentcountry,$updatepersonalprofiledprofileselect_country); ?>
</select></p>

<p><label><?= $franchiseeregistration_referralagentid ?> :</label>
<input type="text" name="referedid" id="referedid" class="form" value="<?=$agentreferedid?>" size=54 maxlength="<?= $textbox_character_max_length ?>" > </p>

<p><label><?= $franchiseeregistration_referralagentname ?> :</label>
<input type="text" name="referedby" id="referedby" class="form" value="<?=$agentreferedby?>" size=54 maxlength="<?= $textbox_character_max_length ?>" > </p>
</table>
</p>
<!-- Haresh code ends Here -->
<p><label><?= $registercaptcha ?></label>
	<img style="vertical-align:middle" id="imagenmcaptcha1" src='<?= $sitepath ?>uploadfiles/captcha/<?= $imagenm_captcha ?>' class="captacha_mages"> 
    <input type="hidden" name="hiddencaptcha" id="hiddencaptcha1" value="<?=$captch_no?>" />
	<input type="text" name="Captcha"  id="Captcha"  class="form cpasities" value="" size="3" style="vertical-align:middle" title="<?= $registercaptcha_title ?>" > * 
   <img src="<?=$sitepath?>uploadfiles/refresh1.png" onclick="change_captcha1()" style="cursor:pointer; margin: 0 0 -9px 5px;"
    /> <?= $franchiseeregistration_clicktochange ?> </p>
<p class="nonlabel">
<label>&nbsp;</label><div class="formbtn_outer"><input name="Submit" type="submit" class="formbtn"  value="<?= $registersubmit ?>"> <input name="Reset" type="reset" class="resetbtn" value="<?= $registerreset ?>"></div>
</p>
</fieldset> 
</form>
  
<?php /*?><div class="registerationimage"><img src="<?= $siteimagepath ?>images/registerimage1.gif" alt="" /></div><?php */?>
		
		<!-- ********* CONTENT END HERE *********-->
		</div>
		</div>