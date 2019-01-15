<?php
require_once('commonfile.php');
$username = getusername();
$imagenm_captcha = generate_img_captha($session_name_initital . "img_captch_no","img_captch_file_nm","");
$captch_no = get_img_captha_no($session_name_initital . "img_captch_no");
//$username = $_SESSION[$session_name_initital . "membername"];
$reg_name ='';
$nickname='';
$email='';
$mobile='';
$dob_dd = '';
$dob_mm = '';
$dob_yy = '';
$gender = '';
if(isset($_SESSION[$session_name_initital . 'reg_name']) && $_SESSION[$session_name_initital . 'reg_name']!=''){
	$reg_name = $_SESSION[$session_name_initital . 'reg_name'];
}
if(isset($_SESSION[$session_name_initital . 'nickname']) && $_SESSION[$session_name_initital . 'nickname']!=''){
	$nickname = $_SESSION[$session_name_initital . 'nickname'];
}
if(isset($_SESSION[$session_name_initital . 'email']) && $_SESSION[$session_name_initital . 'email']!=''){
	$email = $_SESSION[$session_name_initital . 'email'];
}
if(isset($_SESSION[$session_name_initital . 'mobile']) && $_SESSION[$session_name_initital . 'mobile']!=''){
	$mobile = $_SESSION[$session_name_initital . 'mobile'];
}
if(isset($_SESSION[$session_name_initital . 'dobyy']) && $_SESSION[$session_name_initital . 'dobyy']!=''){
	$dob_yy = $_SESSION[$session_name_initital . 'dobyy'];
}
if(isset($_SESSION[$session_name_initital . 'dobmm']) && $_SESSION[$session_name_initital . 'dobmm']!=''){
	$dob_mm = $_SESSION[$session_name_initital . 'dobmm'];
}
if(isset($_SESSION[$session_name_initital . 'dobdd']) && $_SESSION[$session_name_initital . 'dobdd']!=''){
	$dob_dd = $_SESSION[$session_name_initital . 'dobdd'];
}
if(isset($_SESSION[$session_name_initital . 'gender']) && $_SESSION[$session_name_initital . 'gender']!=''){
	$gender = $_SESSION[$session_name_initital . 'gender'];
}

?>
<Script Language="JavaScript">
function validate(){


	var enable_Recaptcha=document.getElementById('enable_Recaptcha').value;
	
	var nickname=document.getElementById('reg_name').value;
	var reg_name=document.getElementById('reg_name').value;
	var email=document.getElementById('email').value;
	var password=document.getElementById('password').value;
	var country_code=document.getElementById('country_code').value;
	var mobile=document.getElementById('mobile').value;
	var gender=document.getElementById('gender').value;
	var dobdd=document.getElementById('dobdd').value;
	var dobmm=document.getElementById('dobmm').value;
	var dobyy=document.getElementById('dobyy').value;
	var agent_code=document.getElementById('agent_code').value;

 if(document.getElementById('reg_name').value=='')
 	{
		error_notify_add('notify_danger','<?=$validation_txt2?>','reg_name','red');
        error_notify_remove('notify_danger',5000);
		return false;
	} else if(document.getElementById('email').value==''){
		error_notify_add('notify_danger','<?=$validation_txt4?>','email','red');
        error_notify_remove('notify_danger',5000);
		return false;
	} else if(echeck(document.getElementById('email').value)==false){
		error_notify_add('notify_danger','<?=$validation_txt5?>','email','red');
        error_notify_remove('notify_danger',5000);
		return false;
	} else if(document.getElementById('password').value==''){
		error_notify_add('notify_danger','<?=$validation_txt6?>','password','red');
        error_notify_remove('notify_danger',5000);
		return false;
	} else if(document.getElementById('mobile').value==''){
		error_notify_add('notify_danger','<?=$validation_txt7?>','mobile','red');
        error_notify_remove('notify_danger',5000);
		return false;
	} else if(document.getElementById('gender').value=='0.0'){
		error_notify_add('notify_danger','<?=$validation_txt8?>','gender','red');
        error_notify_remove('notify_danger',5000);
		return false;
	} else if(document.getElementById('dobdd').value=='0.0'){
		error_notify_add('notify_danger','<?=$validation_txt9?>','dobdd','red');
        error_notify_remove('notify_danger',5000);
		return false;
	} else if(document.getElementById('dobmm').value=='0.0'){
		error_notify_add('notify_danger','<?=$validation_txt10?>','dobmm','red');
        error_notify_remove('notify_danger',5000);
		return false;
	} else if(document.getElementById('dobyy').value=='0.0'){
		error_notify_add('notify_danger','<?=$validation_txt11?>','dobyy','red');
        error_notify_remove('notify_danger',5000);
		return false;
	} else if(document.getElementById('Captcha').value=='' && enable_Recaptcha=='N'){
		error_notify_add('notify_danger','<?=$validation_txt12?>','Captcha','red');
        error_notify_remove('notify_danger',5000);
		return false;
	} else if(document.getElementById('hiddencaptcha').value!=document.getElementById('Captcha').value && enable_Recaptcha=='N'){
		document.getElementById('Captcha').value = '';
		error_notify_add('notify_danger','<?=$validation_txt13?>','Captcha','red');
        error_notify_remove('notify_danger',5000);
		return false;
	} else if(document.getElementById('chkcond1').checked==false) {
		error_notify_add('notify_danger','<?=$validation_txt14?>','chkcond1','red');
        error_notify_remove('notify_danger',5000);
		return false;
	}
	
	// else if(enable_Recaptcha=='N')
//		{
//		 timeout("errbx",10)	
//		 return true;	
//		}
	else
	{
		 if(enable_Recaptcha=='Y')
		{ 
					 $.ajax({
					  type: "POST",
					  url: "check_captcha.php",
					  data: {
						
						//THIS WILL TELL THE FORM IF THE USER IS CAPTCHA VERIFIED.
						captcha: grecaptcha.getResponse()
						
					  },
					  success: function(data) 
					  {
									if(data=='Ok')
									{
									var dataString = 'nickname='+ nickname + '&reg_name='+ reg_name + '&email='+ email + '&password='+ password + '&country_code='+ country_code + '&mobile='+ mobile + '&gender='+ gender + '&dobdd='+ dobdd + 
									'&dobmm='+ dobmm+'&dobyy='+ dobyy+'&agent_code='+agent_code;
									
									$("#regloder").show();
									$('#register_btn').hide();
									$.ajax({
									type: "POST",
									url: "homeregistrationsubmit.php",
									data: dataString,
									success: function(data) 
										{
											if(data.trim()=='fail')
											{
												$("#regloder").hide();
												$('#register_btn').show();
												$('#register_btn').val("<?= $homeregister_register ?>");
												alert("<?=$validation_txt15?>");
												return false;
											}
											else if(data.trim()=='Success')
											{
												window.location="updateprofilepersonal.php";
											}
											else if(data.trim()=='SMS')
											{	
												window.location="verifysms.php";
											}
												
										}
									});
									
									}
									else
									{
										alert("<?=$validation_txt16?>");
										return false;
									}
					  }
					})
		}
		
		if(enable_Recaptcha=='N')
		{ 
			var dataString = 'nickname='+ nickname + '&reg_name='+ reg_name + '&email='+ email + '&password='+ password + '&country_code='+ country_code + '&mobile='+ mobile + '&gender='+ gender + '&dobdd='+ dobdd + 
									'&dobmm='+ dobmm+'&dobyy='+ dobyy+'&agent_code='+agent_code;
							
									$("#regloder").show();
									$('#register_btn').hide();
									
									$.ajax({
									type: "POST",
									url: "homeregistrationsubmit.php",
									data: dataString,
									success: function(data) 
										{
											
											if(data.trim()=='fail')
											{
												$("#regloder").hide();
												$('#register_btn').show();
												$('#register_btn').val("<?= $homeregister_register ?>");
												alert("<?=$validation_txt15?>");
												return false;
											}
											else if(data.trim()=='Success')
											{
												window.location="updateprofilepersonal.php";
											}
											else if(data.trim()=='SMS')
											{	
												window.location="verifysms.php";
											}
										}
									});
		}
		
		
	}
	
}	
function change_captcha(){
	$.post('change_captcha.php',{
			captcha:"captcha"},
				function (data){
					
				//var newdata = data.split('#');		
					//alert		(newdata)						
					//alert(data)
					var arrs = data.split("#");
					var data1 = arrs[0];
					var data2 = arrs[1];
			
					document.getElementById('imagenmcaptcha').src = '<?=$sitepath?>uploadfiles/captcha/'+data1.trim();
					//alert(document.getElementById('imagenmcaptcha').src)
					document.getElementById('hiddencaptcha').value = data2;
				}
			);
}

function echeck(str) {


		var at="@";
		var dot=".";
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){		   
		   return false
		}
		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){		   
		   return false
		}
		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){		 
		    return false
		}
		if (str.indexOf(at,(lat+1))!=-1){		    
		    return false
		}
		if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){		
		    return false
		}
		if (str.indexOf(dot,(lat+2))==-1){		 
		    return false
		}
		if (str.indexOf(" ")!=-1){		
		    return false
		}
 		 return true	
		 timeout("errormsg",3000)				
	}
function IsNumeric1(strString,inpid)
   //  check for valid numeric strings	
   { 
   if(inpid=='mobile'){
		if(document.getElementById('country_code').value!=''){
			if(strString.length==1 && strString==0){
				document.getElementById(inpid).value = '';
				alert("<?=$validation_txt17?>");
				return false;
			}
		}
   }
   var strValidChars = "0123456789.+";
   var strChar;
   var blnResult = true;

   if (strString.length == 0) return false;

   //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length && blnResult == true; i++)
      {
      strChar = strString.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {
         //blnResult = false;
		 document.getElementById(inpid).value = '';
         }
      }
   //return blnResult;
   }
</Script>


<script>
function generate_email(type){
	
	var mobile = document.getElementById('mobile').value;	
	var email = document.getElementById('email').value;	
	var epos = email.lastIndexOf(" ");
	
	
	
	if(type=='E')
	{
		if(email == "") 
		{
			$("#error_email").show();
			$("#error_email_data").html("<?=$validation_txt4?> <i class='fa fa-times' aria-hidden='true'></i>");
			return false;
		}
		else if(epos>0)
		{
			$("#error_email").show();
			$("#error_email_data").html(" <?=$validation_txt19?><i class='fa fa-times' aria-hidden='true'></i>");
			return false;
		}
		else if(echeck(email)==false)
		{
			$("#error_email").show();
			$("#error_email_data").html("<?=$validation_txt20?><i class='fa fa-times' aria-hidden='true'></i>" );
			return false;
		}
		else
		{
				$.post("checkemail.php",
				{
					mobile:mobile,
					email:email,
					type:type	
				}, function (data){
						$("#error_email").show();
						$("#error_email_data").html(data);
				})	
		} 
	}

		
}

</script>



 <div class="pagetitle">
 	 <div class="featured_title_div abtus">
    <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    <div class="col-xs-12 col-sm-2 col-md-5 col-lg-4 midle_title"><span><?=$signup_heading?></span></div>
     <div class="col-xs-2 col-sm-5 col-md-5 col-lg-4 hidden-md trac_top">&nbsp;</div>
    </div>
            </div>
<div class="homelogin">
  <h2>
    <?= $homeloginhead ?>
  </h2>
 <h3> <?= $registersecondline ?></h3>
<input type="hidden" value="<?=$enable_Recaptcha?>" id="enable_Recaptcha" name="enable_Recaptcha">
  		
  <form name="frmLogin" method="post"    enctype="multipart/form-data">
    <div class="error" align="center" id="errbx">
      <? //checkerror(); ?>
      <? if(isset($_SESSION[$session_name_initital . 'error1'])) 
	  {
		  echo $_SESSION[$session_name_initital . 'error1']; 
		 // echo $_SESSION[$session_name_initital . 'error1']='';
		//   unset($_SESSION[$session_name_initital . "error1"]);
}
	 
	  ?>
    </div>
    <fieldset>
		<p>        
        <span class="mandatory_class"><?=$signup_mandatoryfields?> </span></p>
		
      <p style="display:none">
        <label>
          <?= $registernickname1 ?>
        </label>
        <INPUT TYPE="TEXT" id="nickname" name="nickname" class="form" MAXLENGTH="50" SIZE="25" value="<?=$nickname?>">
        * </p>
      <p>
        <label>
          <?= $registername1 ?>
        </label>
        <INPUT TYPE="TEXT" NAME="reg_name" id="reg_name" class="form" MAXLENGTH="50" SIZE="25" value="<?=$reg_name?>">
        * </p>
        <p></
        
      <p>
        <label>
          <?= $registeremail1 ?>
        </label>
        <INPUT TYPE="TEXT" NAME="email" id="email" class="form" MAXLENGTH="50" SIZE="25" value="<?=$email?>"
        onKeyup="generate_email('E');">
        * </p>
        <p id="error_email" style="display:none">
        <label>&nbsp;</label><span id="error_email_data"></span></p>
      <p>
        <label>
          <?= $registerpassword1 ?>
        </label>
        <INPUT TYPE="password" id="password" NAME="password" class="form" MAXLENGTH="50" SIZE="25">
        * </p>
      <p>
        <label><?=$viewedothercontacts_mobile?>  :</label>
        <INPUT TYPE="text" id="country_code" NAME="country_code" class="form" 
        value="<?=findsettingvalue('register_country_code')?>" SIZE="3">
        <input type="text" name="mobile" id="mobile"  size="15" class="form mb_files1" 
        onkeyup="IsNumeric1(this.value,'mobile')" value="<?=$mobile?>" />
        * </p>
      <p>
        <label>
          <?= $registergender ?>
        </label>
        <select name='gender' id="gender" class="form mb_files2" >
          <? fillcombo("select genderid,gender from tbldatingendermaster where currentstatus=0 order by gender ",$gender,""); ?>
        </select>
        * </p>
      <p>
        <label>
          <?= $updatepersonalprofileddob ?>
        </label>
        <select class="form" name="dobdd" id="dobdd">
          <? fillnumdata(1,31,$updatepersonalprofiledprofileselect,"$dob_dd") ?>
        </select>
        <select class="form" name="dobmm" id="dobmm">
          <? fillnumdata(1,12,$updatepersonalprofiledprofileselect_month,"$dob_mm","N") ?>
        </select>
        <? 
$start_year = date('Y')-65;
$end_year = date('Y')-18;
?>
        <select class="form" name="dobyy" id="dobyy">
          <? fillnumdata($start_year,$end_year,$updatepersonalprofiledprofileselect_year,"$dob_yy") ?>
        </select>
        * </p>
        
        <?
	//	if(isset($_COOKIE['matrimonyagntid']) && $_COOKIE['matrimonyagntid']!="" &&
//		 !isset($_GET['agt']) || isset($_GET['agnt']) && $_GET['agnt']!=""){ 
//	if(isset($_COOKIE['matrimonyagntid'])){
//		$ag_val = $_COOKIE['matrimonyagntid'];
//	} else {
//		$ag_val = $_GET['agnt'];
//	}
//
	
	



				$ag_val='';
//	echo $_COOKIE['matrimonyagntid']; 
			//echo $_COOKIE['matrimonyagntid'];
			if(isset($_COOKIE['matrimonyagntid']) && $_COOKIE['matrimonyagntid']!='')
			{
				
				$ag_val = $_COOKIE['matrimonyagntid'];
			}
			 else 
			 {
					 if(isset($_GET['agnt']) && $_GET['agnt']!="")
					{  
						//$_COOKIE['matrimonyagntid']=$_GET['agt'];
						setcookie("matrimonyagntid", $_GET['agnt'], time() + (86400 * 30), '/');	
						
						$ag_val = $_GET['agnt'];
					}
			}

	
?>
		<?php /*?><input type="hidden" name="staff_agent" id="staff_agent" class="form" value="<?=$_COOKIE['matrimonyagntid']?>" /><?php */?>
		<input type="hidden" name="agent_code" id="agent_code" class="form" value="<?=$ag_val?>" />


       <? if($enable_Recaptcha=='Y') { 
	   $captcha_style='style="display:none"';
	   }
	    if($enable_Recaptcha=='N') { 
	   $captcha_style='style="display:block"';
	   }
	   ?> 
       
 
      <p <?=$captcha_style?>>
        <label>
          <?= $homeregister_captcha ?>
          :</label>
           <img style="vertical-align:middle;" id="imagenmcaptcha" src='<?= $sitepath ?>uploadfiles/captcha/<?= $imagenm_captcha ?>'>
        <input name="Captcha" type="text"  class="form"  id="Captcha" title="<?= $registercaptcha_title ?>" value="" size="6">
        <img src="<?=$sitepath?>uploadfiles/refresh12.png" onclick="change_captcha()" style="cursor:pointer; margin: 0 0 -9px 5px;" /> 
       
        <input type="hidden" name="hiddencaptcha" id="hiddencaptcha" value="<?=$captch_no?>" />
      </p>


   	<? $register_terms_checked=findsettingvalue('register_terms_checked');?>
      <p style="width:245px;" class="alin_centeh Hrtt_h">	  	
        <input type=checkbox name ="chkcond1" id="chkcond1" size="54"
        <? if($register_terms_checked=='Y'){?>  checked="checked" <? }?>>
        <?
  $cmsid = getonefielddata("select cmsid from tblcmsmaster where LocationId=7 and languageid=$sitelanguageid and
   CurrentStatus=0");
if ($cmsid != "") { ?>
        <?=$homeregisterterms ?>
        <? } ?>
      </p>
	  <p class="alin_centeh">
	  	<span class="lock"><?=$signup_profilesecurityassured?></span>
	  </p>
     
   <? if($enable_Recaptcha=='Y') { ?> 
      <div class="recaptcha_outer">     
	<span class="recaptcha_Inner">
           <span class="g-recaptcha" data-sitekey="6Lcb8hMUAAAAAKovJ0h300D1Cb3_kVTB74OVo29R"></span> 
        </span>
        <span class="StartR">*</span>
      </div>
      <? } ?>   
       
       
       
           
      <p class="alin_centeh" id="register_btn">	
        <INPUT  TYPE="button" onclick="validate();" NAME="cmdSignIn"   class="regist_1"  VALUE="<?= $homeregister_register ?>">
      </p>
      <p class="alin_centeh">	
      <span id="regloder" class="homeregloder" style="display:none" >
      <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/owl_loader.gif "/></span>
      </span>
     
     
      
    </fieldset>
  </form>
</div>


