<? include("commonfile.php");
$filename = "fr_registrationsubmit";
$Name ="";
$email ="";
$nickname = "";
$genderid="";
$dob_dd="";
$dob_mm="";
$dob_yy="";
$mobile ="";
$staff_contact = "";
$date = date("d/m/y");
$agentid = "";
$collectionid = "";
$relationid = "";
$land_no = '';
$city_code = '';
$mobile = '';
$country_code = '';
$imagenm_captcha = generate_img_captha($session_name_initital . "img_captch_no","img_captch_file_nm","");
$captch_no = get_img_captha_no($session_name_initital . "img_captch_no");
$_SESSION['captchano'] = $captch_no;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.title; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } 
  
  if(document.form1.Password.value!="")
  {
  var pass = document.form1.Password.value;
  if (pass.length < 6)
  	errors += '- '+"<?= $registerpassword_length_message ?>\n";
  if(document.form1.Password.value!=document.form1.ConfirmPassword.value)
  	{errors += "- <?= $registervalid_confirm_password ?>\n";}
  }
 if(document.form1.email.value!=document.form1.confirm_email.value)
  	{errors += "- <?= $registervalid_confirm_email ?>\n";}
  
  if(document.form1.chkcond1.checked!=true)
  	{errors += "- <?= $registerpassword_terms_message ?>\n";}
  if(IsNumeric(document.getElementById('mobile').value)==false) {
		errors += "- Please Enter Proper value for Mobile Number \n";
  }  	
//  if (errors) alert('The following error(s) occurred:\n'+errors);
  if (errors) alert(errors);
  document.MM_returnValue = (errors == '');//false;
}
//-->
function whichButton(event)
{
 if (event.button==2)//For right click
 {
  alert("Right Click Not Allowed!");
  document.getElementById('email').value = "";
 }

}

function whichButton1(event)
{
 if (event.button==2)//For right click
 {
  alert("Right Click Not Allowed!");
  document.getElementById('confirm_email').value = "";
 }

}

function whichButton2(event)
{
 if (event.button==2)//For right click
 {
  alert("Right Click Not Allowed!");
  document.getElementById('password').value = "";
 }
}

function whichButton3(event)
{
 if (event.button==2)//For right click
 {
  alert("Right Click Not Allowed!");
  document.getElementById('conf_password').value = "";
 }
}

// This function is responsible for checking which key is being pressed. If user presses ctrl key then the an alert is coming out that "Sorry, this functionality is disabled.".

function noCTRL(e)
{
 var code = (document.all) ? event.keyCode:e.which;

 var msg = "Sorry, this functionality is disabled.";
 if (parseInt(code)==17) // This is the Key code for CTRL key
 {
  alert(msg);
  window.event.returnValue = false;
 }
}

function contact_no(con_val){
	//alert(con_val);mob_no city_code land_no
	if(con_val=='mob'){
		document.getElementById('city_code').style.display = 'none';
		document.getElementById('land_no').style.display = 'none';	
		document.getElementById('mobile').style.display = 'inline';	
	}
	if(con_val == 'land_line'){
		document.getElementById('mobile').style.display = 'none';
		document.getElementById('city_code').style.display = 'inline';
		document.getElementById('land_no').style.display = 'inline';	
	}
}

function get_code(agentid){
	if(agentid!=""){
		document.getElementById('agt_code').value="";
		$.post("state_auto_generate.php",
		{agentid:agentid,
		 cat:'agt'},
		function (data){
			var str=data;			

			if(str!=""){				
				document.getElementById('agt_code').value = str;
			}
		}
		)
	}

}
function IsNumeric(strString)
   //  check for valid numeric strings	
   {
   var strValidChars = "0123456789";
   var strChar;
   var blnResult = true;

   if (strString.length == 0) return false;

   //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length && blnResult == true; i++)
      {
      strChar = strString.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {
		 document.getElementById('referedid').value='';
         blnResult = false;
         }
      }
   return blnResult;
}

</script>

<script language = "Javascript">
/**
 * DHTML email validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
 */

function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   //alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   //alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    //alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    //alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    //alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    //alert("Invalid E-mail ID")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    //alert("Invalid E-mail ID")
		    return false
		 }

 		 return true					
	}
</script>

<!-- validation code start Here  --> 
<script language="JavaScript" type="text/JavaScript">
function validateForm(){
	if(document.getElementById('name').value==''){
		alert('Please Enter Name ');	
		document.getElementById('name').focus();
		return false;
	} else if(document.getElementById('email').value==''){
		alert('Please Enter Email ');	
		document.getElementById('email').focus();
		return false;
	} else if(document.getElementById('email').value!='' && echeck(document.getElementById('email').value)==false){
		alert('Please Enter Valid Email Address');
		document.getElementById('email').focus();
		return false;					
	} else if(document.getElementById('password').value==''){
		alert('Please Enter Password');	
		document.getElementById('password').focus();
		return false;
	} else if(document.getElementById('confpassword').value==''){
		alert('Please Enter Confirm Password');	
		document.getElementById('confpassword').focus();
		return false;
	} else if(document.getElementById('password').value!=document.getElementById('confpassword').value){
		alert("Confirm Password doesn't match");	
		document.getElementById('confpassword').focus();
		return false;
	} else if(document.getElementById('Captcha').value==''){
		alert("Please Enter Captcha");	
		document.getElementById('Captcha').focus();
		return false;
	} else if(document.getElementById('Captcha').value!=document.getElementById('hiddencaptcha').value){
		alert("Please Enter Valid Captcha");
		document.getElementById('Captcha').focus();
		return false;
	} else {		
		return true;	
	}	
}
function chkexistemail(email){
	if(email!=''){
		$.post("checkfranchiseemail.php",{
			email:email	
		}, function (data){
			alert(data+'qwer');
			if(data=='false')	{
				return false;	
			} else {
				return true;	
			}
		})
	}
}
</script>

<!-- validation code ends Here -->






<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.franchiseeregistration.php");?>
    </div>
   
</div>
</div>
<div class="wrapper_blank">
	<div class="container">
    	 <div col-lg-9 col-md-9 col-sm-9 col-xs-12>
    			<div class="leftcms">
		 &nbsp;
    </div>
    </div>
    <div col-lg-3 col-md-3 col-sm-3 col-xs-12>
    			<div class="rightcms">
		 &nbsp;
    </div>
    </div>
    </div>
</div>

<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</body>
</html>