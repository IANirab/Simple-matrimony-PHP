<?php
require_once('commonfile.php');
$username = getusername();
$imagenm_captcha = generate_img_captha($session_name_initital . "img_captch_no","img_captch_file_nm","");
$captch_no = get_img_captha_no($session_name_initital . "img_captch_no");
//$username = $_SESSION[$session_name_initital . "membername"];
?>
<Script Language="JavaScript">
function fill_cast(religionid){
	if(religionid>0){
		$.post("getdata.php",{
			religionid:religionid,
			type:'get_cast'	
		}, function (data){
			if(data!=''){
				$("#castid").html(data);	
			}
		})	
	}
	
	change_religion(religionid)
}
function change_religion(val)
{
	 if(val == '9'){
			document.getElementById('cmbreligian_other').style.display = 'inline';
		}
		if(val != '9'){
			document.getElementById('cmbreligian_other').style.display = 'none';
		}

	
}
function validateold(){
	if(document.getElementById('reg_name').value==''){
		alert("Please Enter Name ");
		document.getElementById('reg_name').focus();
		return false;
	} else if(document.getElementById('email').value==''){
		alert("Please Enter Email");	
		document.getElementById('email').focus();
		return false;
	} else if(echeck(document.getElementById('email').value)==false){
		alert("Please Enter valid email address");
		document.getElementById('email').focus();
		return false;
	} else if(document.getElementById('password').value==''){
		alert("Please Enter Password");
		document.getElementById('password').focus();
		return false;
	} else if(document.getElementById('mobile').value==''){
		alert("Please Enter Mobile");
		document.getElementById('mobile').focus();
		return false;
	} else if(document.getElementById('gender').value=='0.0'){
		alert("Please Select Gender ");	
		document.getElementById('gender').focus();
		return false;
	} else if(document.getElementById('dobdd').value=='0.0'){
		alert("Please Select Date of Birth Date");	
		document.getElementById('dobdd').focus();
		return false;
	} else if(document.getElementById('dobmm').value=='0.0'){
		alert("Please Select Month of Birth Date");	
		document.getElementById('dobmm').focus();
		return false;
	} else if(document.getElementById('dobyy').value=='0.0'){
		alert("Please Enter Year of Birth Date");	
		document.getElementById('dobyy').focus();
		return false;
	} else if(document.getElementById('Captcha').value==''){
		alert("Please Enter Captcha");	
		document.getElementById('Captcha').focus();
		return false;
	} else if(document.getElementById('hiddencaptcha').value!=document.getElementById('Captcha').value){
		document.getElementById('Captcha').value = '';
		alert("Please Enter Valid Imagecode ");	
		document.getElementById('Captcha').focus();
		return false;
	} else if(document.getElementById('chkcond1').checked==false) {
		alert("Please be agree with our terms and conditions")
		document.getElementById('chkcond1').focus();
		return false;
	} else {
		return true;	
	}
}
function change_captcha(){
	$.post('change_captcha.php',{
			captcha:"captcha"},
				function (data){
					//alert(data);					
					var newdata = data.split('#');										
					document.getElementById('imagenmcaptcha').src = '<?=$sitepath?>uploadfiles/captcha/'+newdata[0].trim();	
					document.getElementById('hiddencaptcha').value = newdata[1];
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
	}
function IsNumeric1(strString,inpid)
   //  check for valid numeric strings	
   { 
   if(inpid=='mobile'){
		if(document.getElementById('country_code').value!=''){
			if(strString.length==1 && strString==0){
				document.getElementById(inpid).value = '';
				alert("Please do not start mobile number with 0");
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
   
function validate(){
		var em = document.getElementById('email').value;
	/*if(document.getElementById('nickname').value=='')	{
		alert('Please Enter Nickname ');	
		document.getElementById('nickname').focus();
		return false;
	} else*/ if(document.getElementById('reg_name').value==''){
		//alert("Please Enter Name ");
		$("#errbx").html("Please Enter Name ");		
		document.getElementById('reg_name').focus();
		return false;
	} /*else if(document.getElementById('gender').value=='0.0'){		
		$("#errbx").html("Please Select Gender ");
		document.getElementById('gender').focus();
		return false;
	}*/
	else if(document.getElementById('gender1').checked==false && document.getElementById('gender2').checked==false){
		$("#errbx").html("Please Select Gender ");
		document.getElementById('gender1').focus();
		return false;
	}
	 else if(document.getElementById('dobmm').value=='0.0'){
		//alert("Please Select Month of Birth Date");	
		$("#errbx").html("Please Select Month of Birth Date");
		document.getElementById('dobmm').focus();
		return false;
	} else if(document.getElementById('dobdd').value=='0.0'){
		//alert("Please Select Date of Birth Date");	
		$("#errbx").html("Please Select Date of Birth Date");
		document.getElementById('dobdd').focus();
		return false;
	} else if(document.getElementById('dobyy').value=='0.0'){
		//alert("Please Enter Year of Birth Date");	
		$("#errbx").html("Please Enter Year of Birth Date");		
		document.getElementById('dobyy').focus();
		return false;
	} /*else if(document.getElementById('castid').value=='0.0'){
		$("#errbx").html("Please select cast.");		
		document.getElementById('castid').focus();
		return false;
	} else if(document.getElementById('denominationid').value=='0.0'){
		$("#errbx").html("Please select denomination.");		
		document.getElementById('denominationid').focus();
		return false;
	} else if(document.getElementById('spiritual_order').value=='0.0'){
		$("#errbx").html("Please select silsila.");		
		document.getElementById('spiritual_order').focus();
		return false;
	}*/ else if(document.getElementById('countryid').value=='0.0'){
		$("#errbx").html("Please select country.");		
		document.getElementById('countryid').focus();
		return false;
	} else if(document.getElementById('mobile').value==''){
		//alert("Please Enter Mobile");
		$("#errbx").html("Please Enter Mobile");		
		document.getElementById('mobile').focus();
		return false;
	} else if(document.getElementById('email').value==''){
		//alert("Please Enter Email");	
		$("#errbx").html("Please Enter Email");		
		document.getElementById('email').focus();
		return false;
	} else if(echeck(document.getElementById('email').value)==false){		
		$("#errbx").html("Please Enter valid email address");
		document.getElementById('email').focus();
		return false;
	} else if(document.getElementById('password').value==''){
		//alert("Please Enter Password");
		$("#errbx").html("Please Enter Password");
		document.getElementById('password').focus();
		return false;
	}  else if(document.getElementById('profilecreatebyid').value=='0.0') {
		//alert("Please select Posted By Profile")
		$("#errbx").html("Please select Posted By Profile");		
		document.getElementById('profilecreatebyid').focus();
		return false;
	} else if(document.getElementById('Captcha').value==''){
		//alert("Please Enter Captcha");		
		$("#errbx").html("Please Enter Captcha");		
		document.getElementById('Captcha').focus();
		return false;
	} else if(document.getElementById('hiddencaptcha').value!=document.getElementById('Captcha').value){
		document.getElementById('Captcha').value = '';		
		//alert("Please Enter Valid Imagecode ");	
		$("#errbx").html("Please Enter Valid Captcha.");
		document.getElementById('Captcha').focus();
		return false;
	} else if(document.getElementById('chkcond1').checked==false) {
		//alert("Please be agree with our terms and conditions")
		$("#errbx").html("Please be agree with our terms and conditions");
		document.getElementById('chkcond1').focus();
		return false;
	} else {
		return true;	
	}
}
function checkexist(email){	
	$.post("chkuserexist.php",{
		email:email	
	}, function (data){
		alert(data);		
		return data;		
		/*if(data=='0'){
			return true;	
		} else {
			return false;	
		}*/
	})
}   
</Script>
<?
$reg_name = '';
$reg_gender = '';
$reg_dobmm = '';
$reg_dobdd = '';
$reg_dobyy =  '';
$reg_castid = '';
$reg_spiritual_order = '';
$reg_countryid = '';
$reg_mobile = '';	
$reg_email = '';	
$reg_crby = '';
$reg_denominationid = '';
if(isset($_SESSION[$session_name_initital . 'reg_name']) && $_SESSION[$session_name_initital . 'reg_name']!=''){
	$reg_name = $_SESSION[$session_name_initital . 'reg_name'];
}
if(isset($_SESSION[$session_name_initital . 'reg_gender']) && $_SESSION[$session_name_initital . 'reg_gender']!=''){
	$reg_gender = $_SESSION[$session_name_initital . 'reg_gender'];	
}
if(isset($_SESSION[$session_name_initital . 'reg_dobmm']) && $_SESSION[$session_name_initital . 'reg_dobmm']!=''){
	$reg_dobmm = $_SESSION[$session_name_initital . 'reg_dobmm'];	
}
if(isset($_SESSION[$session_name_initital . 'reg_dobdd']) && $_SESSION[$session_name_initital . 'reg_dobdd']!=''){
	$reg_dobdd = $_SESSION[$session_name_initital . 'reg_dobdd'];	
}
if(isset($_SESSION[$session_name_initital . 'reg_dobyy']) && $_SESSION[$session_name_initital . 'reg_dobyy']!=''){
	$reg_dobyy = $_SESSION[$session_name_initital . 'reg_dobyy'];	
}
if(isset($_SESSION[$session_name_initital . 'reg_castid']) && $_SESSION[$session_name_initital . 'reg_castid']!=''){
	$reg_castid = $_SESSION[$session_name_initital . 'reg_castid'];
}
if(isset($_SESSION[$session_name_initital . 'reg_denominationid']) && $_SESSION[$session_name_initital . 'reg_denominationid']!=''){
	$reg_denominationid = $_SESSION[$session_name_initital . 'reg_denominationid'];
}
if(isset($_SESSION[$session_name_initital . 'reg_spiritual_order']) && $_SESSION[$session_name_initital . 'reg_spiritual_order']!=''){
	$reg_spiritual_order = $_SESSION[$session_name_initital . 'reg_spiritual_order'];
}
if(isset($_SESSION[$session_name_initital . 'reg_countryid']) && $_SESSION[$session_name_initital . 'reg_countryid']!=''){
	$reg_countryid = $_SESSION[$session_name_initital . 'reg_countryid'];	
}
if(isset($_SESSION[$session_name_initital . 'reg_mobile']) && $_SESSION[$session_name_initital . 'reg_mobile']!=''){
	$reg_mobile = $_SESSION[$session_name_initital . 'reg_mobile'];	
}
if(isset($_SESSION[$session_name_initital . 'reg_email']) && $_SESSION[$session_name_initital . 'reg_email']!=''){
	$reg_email = $_SESSION[$session_name_initital . 'reg_email'];	
}
if(isset($_SESSION[$session_name_initital . 'reg_crby']) && $_SESSION[$session_name_initital . 'reg_crby']!=''){
	$reg_crby = $_SESSION[$session_name_initital . 'reg_crby'];
}
?>

<div class="homelogin">
  <h2>
    <?= $homeloginhead ?>
  </h2>
  <form name="frmLogin" method="post" action="<?= $sitepath ?>homeregistrationsubmit.php" onsubmit="return validate();">
  
    <div class="error" align="center" id="errbx">
      <? echo checkerror(); ?>
   <? if(isset($_SESSION[$session_name_initital . 'error1'])) 
	  {
		  echo $_SESSION[$session_name_initital . 'error1']; 
		 // echo $_SESSION[$session_name_initital . 'error1']='';
		//   unset($_SESSION[$session_name_initital . "error1"]);
}
	 
	  ?>
      <? if(isset($_SESSION[$session_name_initital . 'error'])) {echo $_SESSION[$session_name_initital . 'error']; }?>
    </div>
    <fieldset>
      <?php /*?><p>
        <label>
          <?= $registernickname1 ?>
        </label>
        <INPUT TYPE="TEXT" id="nickname" NAME="nickname" class="form" MAXLENGTH="50" SIZE="25">
        * </p><?php */?>
      <p>
        <label>
          <?= $registername1 ?>
        </label>
        <INPUT TYPE="TEXT" NAME="reg_name" id="reg_name" class="form" MAXLENGTH="50" SIZE="25" value="<?=$reg_name?>">
        * </p>
        <p>
        <label>
          <?= $registergender ?>
        </label>
        <?
		$gender = getdata("select genderid,gender from tbldatingendermaster where currentstatus=0 order by gender");
		$j=1;
		while($row = mysqli_fetch_array($gender))
		{
			if($row[0]==$reg_gender){
				$gchk = 'checked="checked"';
			} else {
				$gchk = '';	
			}
			?>
            <input type="radio" <?=$gchk?> name="gender" id="gender<?=$j?>" value="<?=$row[0]?>" /><?=$row[1]?>
            <?
			$j++;
		}
		?>
        * </p>
        <p>
        <label>
          <?= $updatepersonalprofileddob ?>
        </label>
        <select class="form births" name="dobmm" id="dobmm">
        	<option value="0.0"><?=$updatepersonalprofiledprofileselect_month?></option>
        	<? for($i=1; $i<=12; $i++){ 
				if($i==$reg_dobmm){
					$mm_chk = 'selected';	
				} else {
					$mm_chk = '';	
				}
			?>
            <option value="<?=$i?>" <?=$mm_chk?>><?=$i?>-<?=date('M', mktime(0, 0, 0, $i, 10));?></option>
            <? } ?>
          <? //fillnumdata(1,12,$updatepersonalprofiledprofileselect_month,"$dob_mm","N") ?>
        </select>
        <select class="form births" name="dobdd" id="dobdd">
          <? fillnumdata(1,31,$updatepersonalprofiledprofileselect,"$reg_dobdd") ?>
        </select>
        
        <? 
			$start_year = date('Y')-65;
			$end_year = date('Y')+18;
?>
        <select class="form births" name="dobyy" id="dobyy">
          <? fillnumdata($start_year,$end_year,$updatepersonalprofiledprofileselect_year,"$reg_dobyy") ?>
        </select>
        * </p>
        <p>
        	<label>Religion : </label>
            <select name="cmbreligian" id="cmbreligian" class="form" onchange="fill_cast(this.value)">
            	<? fillcombo("SELECT id,title from tbldatingreligianmaster WHERE currentstatus=0","","Select Religion") ?>
            </select>
            <input type="text" name="cmbreligian_other" id="cmbreligian_other" class="form" size="13" 
value="<? $cmbreligian ?>" maxlength="" style="display:none;">

        </p>
        <p>
        <label>
         Caste:
        </label>
        <select name='castid' id="castid" class="form" >
          <? fillcombo("select id,title from  tbldatingcastmaster where religianid=3 and currentstatus=0 order by title ",$reg_castid,"Select"); ?>
        </select>
        * </p>
        
        <?php /*?><p>
        <label>
         Denomination:
        </label>
        <select name='denominationid' id="denominationid" class="form" >
          <? fillcombo("select id,title from tbl_muslim_denomination where currentstatus=0",$reg_denominationid,"Select"); ?>
        </select>
        * </p>
        <p>
        <label>
         Silsila:
        </label>
        <select name='spiritual_order' id="spiritual_order" class="form" >
          <? fillcombo("select id,title from tbldatingspiritualmaster where currentstatus=0  ",$reg_spiritual_order,"Select"); ?>
        </select>
        * </p><?php */?>
        
        
        <p>
        <label>
         Country:
        </label>
        <select name='countryid' id="countryid" class="form country_spacers" >
          <? fillcombo("select id,title from  tbldatingcountrymaster where currentstatus=0 order by title ",$reg_countryid,"Select"); ?>
        </select>
        * </p>
        
        <p>
 <label class=""><?= $updateprofile2motherthoungue ?></label>

 <select name="cmbmothertounge" class="form" onChange="change_motherthounge(this.value)">
<?  fillcombo("select  id,title from tbldatingmothertonguemaster where currentstatus  IN (0) and languageid=$sitelanguageid  
order by title ",$motherthoungid,$updatepersonalprofiledprofileselect_sel); ?>
<option value="Other" >Other</option>
        </select>
        </p>

        
        <p>
        <label>Mobile :</label>
        <INPUT TYPE="text" id="country_code" NAME="country_code" class="form filler_code" value="" SIZE="3">
        <input type="text" name="mobile" id="mobile" value="<?=$reg_mobile?>" size="15"
         class="form mobile_code" onkeyup="IsNumeric1(this.value,'mobile')" maxlength="10" />
        * </p>
        <p>
        <label>
          <?= $registeremail1 ?>
        </label>
        <INPUT TYPE="TEXT" NAME="email" id="email" class="form" MAXLENGTH="50" SIZE="25" value="<?=$reg_email?>">
        * </p>
        <p>
        <label>
          <?= $registerpassword1 ?>
        </label>
        <INPUT TYPE="password" id="password" NAME="password" class="form" MAXLENGTH="50" SIZE="25">
        * </p>
      
      <p><label>personal profile:</label><select name="profilecreatebyid" id="profilecreatebyid" class="form">
<? fillcombo("select id,title from tbldatingprofilecreatedbymaster where currentstatus=0 and languageid=$sitelanguageid  order by title",$reg_crby); ?>
</select>&nbsp;*</p>
      
      
       <p>
        <label>
          <?= $homeregister_captcha ?>
          :</label>
        <input name="Captcha" type="text"  class="form clasified1"  id="Captcha" title="<?= $registercaptcha_title ?>" value="" size="6">
        <img src="<?=$sitepath?>uploadfiles/refresh1.png" onclick="change_captcha()" style="cursor:pointer; margin: 0 0 -9px 5px;" /> <img style="vertical-align:middle;" id="imagenmcaptcha" class="clasified2" src='<?= $sitepath ?>uploadfiles/captcha/<?= $imagenm_captcha ?>'>
        <input type="hidden" name="hiddencaptcha" id="hiddencaptcha" class="clasified3" value="<?=$captch_no?>" />
      </p>
      <p style=" width:245px;" >
        <input type=checkbox name ="chkcond1" id="chkcond1" size="54" >
        <?
  $cmsid = getonefielddata("select cmsid from tblcmsmaster where LocationId=7 and languageid=$sitelanguageid and CurrentStatus=0");
if ($cmsid != "") { ?>
        <?=$homeregisterterms ?>
        <? } ?>
        <? //findsettingvalue("terms&condition"); ?>
      </p>
      
      <p>
     
      	<div class="locker_style">Profile Security Assured</div>
        
        <?php /*?><INPUT TYPE="SUBMIT" NAME="cmdSignIn" class="formsmallbtn" VALUE="<?= $homeregister_register ?>"><?php */?>
        <INPUT  TYPE="SUBMIT" NAME="cmdSignIn"  class="regist_1"  VALUE="<?= $homeregister_register ?>">
      </p>
    </fieldset>
  </form>
</div>
