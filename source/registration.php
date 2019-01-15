<? require_once('commonfile.php');
if(isset($_GET['cat']) && $_GET['cat']=='emp'){
if(isset($_SESSION[$session_name_initital . "memberuserid"])){
	unset($_SESSION[$session_name_initital . "memberuserid"]);
}
if(isset($_SESSION[$session_name_initital . "memberusername"])){
	unset($_SESSION[$session_name_initital . "memberusername"]);
}
if(isset($_SESSION[$session_name_initital . "membername"])){
	unset($_SESSION[$session_name_initital . "membername"]);
}
}
$userid = 0;
if(isset($_GET['tw']) && $_GET['tw']!=''){
	$tw = $_GET['tw'];
	$userid = getonefielddata("SELECT userid from tbldatingusermaster WHERE twitterid=".$tw);		
}
if(isset($_GET['li']) && $_GET['li']!=''){
	$userid = $_GET['li'];
}
$filename = "registrationsubmit";
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
$city_id = "";
$agentid = "";
$profilecreatedbyid="";
if(isset($_GET['agt']) && $_GET['agt']!="") {
	$agentid = $_GET['agt'];
}
$collectionid = "";
$relationid = "";

$staff_display = "N";
if(isset($_GET['agnt']) && $_GET['agnt']!="") {
	$agntid = $_GET['agnt'];
	$cookiedays = 10;
	$cookietime = 3600*24*$cookiedays;	
	@setcookie('matrimonyagntid', $agntid, time() + $cookietime, '', '');	
}
//$staff_display = findsettingvalue("staff_registration");


if (!isset($_SESSION[$session_name_initital . "registername"]))
{
	//session_register($session_name_initital . "registername");
	$_SESSION[$session_name_initital . "registername"]= "";
}
if (!isset($_SESSION[$session_name_initital . "registeremail"]))
{
	//session_register($session_name_initital . "registeremail");
	$_SESSION[$session_name_initital . "registeremail"]= "";
	
}
if (!isset($_SESSION[$session_name_initital . "registernickname"]))
{
	//session_register($session_name_initital . "registernickname");
	$_SESSION[$session_name_initital . "registernickname"]= "";
}
if (!isset($_SESSION[$session_name_initital . "registergenderid"]))
{
	//session_register($session_name_initital . "registergenderid");
	$_SESSION[$session_name_initital . "registergenderid"]= "";
	
}
if (!isset($_SESSION[$session_name_initital . "registerdob_dd"]))
{
	//session_register($session_name_initital . "registerdob_dd");
	$_SESSION[$session_name_initital . "registerdob_dd"]= "";
	
}
if (!isset($_SESSION[$session_name_initital . "registerdob_mm"]))
{
	//session_register($session_name_initital . "registerdob_mm");
	$_SESSION[$session_name_initital . "registerdob_mm"]= "";
	
}
if (!isset($_SESSION[$session_name_initital . "registerdob_yy"]))
{
	//session_register($session_name_initital . "registerdob_yy");
	$_SESSION[$session_name_initital . "registerdob_yy"]= "";
	
}

if (!isset($_SESSION[$session_name_initital . "registermobile"]))
{
	//session_register($session_name_initital . "registermobile");
	$_SESSION[$session_name_initital . "registermobile"]= "";
	
}

if (!isset($_SESSION[$session_name_initital . "staff_agentid"]))
{
	//session_register($session_name_initital . "staff_agentid");
	$_SESSION[$session_name_initital . "staff_agentid"]= "";	
}

if (!isset($_SESSION[$session_name_initital . "staff_collection"]))
{
	//session_register($session_name_initital . "staff_collection");
	$_SESSION[$session_name_initital . "staff_collection"]= "";
	
}

if (!isset($_SESSION[$session_name_initital . "staff_contact"]))
{
	//session_register($session_name_initital . "staff_contact");
	$_SESSION[$session_name_initital . "staff_contact"]= "";
}

if (!isset($_SESSION[$session_name_initital . "staff_relation"]))
{
	//session_register($session_name_initital . "staff_relation");
	$_SESSION[$session_name_initital . "staff_relation"]= "";	
}

if (!isset($_SESSION[$session_name_initital . "date"]))
{
	//session_register($session_name_initital . "date");
	$_SESSION[$session_name_initital . "date"]= date("m/d/y");	
}

if (!isset($_SESSION[$session_name_initital . "registerreligianid"]))
{
	//session_register($session_name_initital . "registerreligianid");
	$_SESSION[$session_name_initital . "registerreligianid"]= findsettingvalue("Religion_default_id");
	
}

if (!isset($_SESSION[$session_name_initital . "registercountryid"]))
{
	//session_register($session_name_initital . "registercountryid");
	$_SESSION[$session_name_initital . "registercountryid"]= "";	
}

if (!isset($_SESSION[$session_name_initital . "registerhearaboutusid"]))
{
	//session_register($session_name_initital . "registerhearaboutusid");
	$_SESSION[$session_name_initital . "registerhearaboutusid"]= "";
	
}
if(!isset($_SESSION[$session_name_initital . "registerage"]))
{
	$_SESSION[$session_name_initital . "registerage"]="";
}
if(!isset($_SESSION[$session_name_initital . 'registercountry_code'])){
	$_SESSION[$session_name_initital . "registercountry_code"]="";
		
}
if(!isset($_SESSION[$session_name_initital . 'registercity_code'])){
	$_SESSION[$session_name_initital . "registercity_code"]="";
}
if(!isset($_SESSION[$session_name_initital . 'registerland_no'])){
	$_SESSION[$session_name_initital . "registerland_no"]="";
}
//$agent_module_enable = "Y";
if ($agent_module_enable == "Y") {
$agent_code ="";
$agent_readonly = "";

//if ((isset($_GET["agt"])) && (is_numeric($_GET["agt"])))
if(isset($_GET['cat']) && $_GET['cat']=='emp')
{
	$agent_code =$_GET["agnt"];
	$agent_readonly = "readonly=''";
	$staff_display = findsettingvalue("staff_registration");
	$agt_code = getonefielddata("SELECT agent_code from tbl_agent_master WHERE emp_id='".$agent_code."'");
}


$matriagentid='';
if(isset($_COOKIE['matrimonyagntid']) && $_COOKIE['matrimonyagntid']!='')
{
	//echo "Cookie is set";
	$matriagentid=$_COOKIE['matrimonyagntid'];
	$agent_code =$matriagentid;
	$agent_readonly = "readonly=''";
	$staff_display = findsettingvalue("staff_registration");
	$agt_code = getonefielddata("SELECT agent_code from tbl_agent_master WHERE emp_id='".$agent_code."'");
}
 else 
{    
    //echo "Cookie is Not set";
	$matriagentid=''; 
}



if (!isset($_SESSION[$session_name_initital . "register_agent_code"]))
{
	//session_register($session_name_initital . "register_agent_code");
	$_SESSION[$session_name_initital . "register_agent_code"]= "";	
}
if ($agent_code == "")
	$agent_code=$_SESSION[$session_name_initital . "register_agent_code"];
}


$Name  = $_SESSION[$session_name_initital . "registername"];
$email  = $_SESSION[$session_name_initital . "registeremail"];
$nickname= $_SESSION[$session_name_initital . "registernickname"];

$genderid=$_SESSION[$session_name_initital . "registergenderid"];
$dob_dd=$_SESSION[$session_name_initital . "registerdob_dd"];
$dob_mm=$_SESSION[$session_name_initital . "registerdob_mm"];
$dob_yy=$_SESSION[$session_name_initital . "registerdob_yy"];
$mobile =$_SESSION[$session_name_initital . "registermobile"];
if(isset($_SESSION[$session_name_initital . "staff_agentid"]) && $_SESSION[$session_name_initital . "staff_agentid"]!="") {
	$agentid =$_SESSION[$session_name_initital . "staff_agentid"];
}	

$collectionid =$_SESSION[$session_name_initital . "staff_collection"];
$staff_contact =$_SESSION[$session_name_initital . "staff_contact"];
$relationid =$_SESSION[$session_name_initital . "staff_relation"];
//$date =$_SESSION[$session_name_initital . "date"];

$age = $_SESSION[$session_name_initital . "registerage"];
$country_code = $_SESSION[$session_name_initital . "registercountry_code"];
$city_code = $_SESSION[$session_name_initital . 'registercity_code'];
$land_no = $_SESSION[$session_name_initital . 'registerland_no'];

$religianid=$_SESSION[$session_name_initital . "registerreligianid"];
if(isset($_SESSION[$session_name_initital . "registercountryid"]) && $_SESSION[$session_name_initital . "registercountryid"]!="") {
	$countryid=$_SESSION[$session_name_initital . "registercountryid"];
} 
else {
	$countryid = 113;
}	
	
$hearaboutusid=$_SESSION[$session_name_initital . "registerhearaboutusid"];
$imagenm_captcha = generate_img_captha($session_name_initital . "img_captch_no","img_captch_file_nm","");
$captch_no = get_img_captha_no($session_name_initital . "img_captch_no");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?=findsettingvalue("seo_registration_page")?>
<? include('topjs.php'); ?>


<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<script>
function change_captcha_regs(){
	//alert("test")
	$.post('change_captcha.php',{
			captcha:"captcha"},
				function (data){							
					var newdata = data.split('#');										
	document.getElementById('regs_imagenmcaptcha').src = '<?=$sitepath?>uploadfiles/captcha/'+newdata[0].trim();	
					document.getElementById('regs_hiddencaptcha').value = newdata[1];
				}
			);
}
</script>




<!----------registretaion validation---->
<script>
function validateForm(){
	
//$(".errorbox errorbox3").hide();
	
	
var regisetr_email= $("#reg_emailaddress").val()
var regisetr_con_email= $("#regs_confirm_email").val()

var regisetr_pass= $("#regs_password").val()
var regisetr_con_pass= $("#regs_conf_password").val()

var captcha= $("#regs_Captcha").val()
var h_captcha= $("#regs_hiddencaptcha").val()
	
        if($("#reg_nickname").val()==""){		
			$("#errbx_reg_nickname").html("Please enter Nick name.");
			$("#errbx_reg_nickname").show();
			$("#reg_nickname").focus();
			timeout("#errbx_reg_nickname",3000)			
			return false;
		}else if($("#regs_name").val()==""){	
			$("#errbx_reg_name").html("Please enter Full name.");
			$("#errbx_reg_name").show();
			$("#regs_name").focus();
			timeout($("#errbx_reg_name"),3000)			
			return false;
		}else if($("#reg_emailaddress").val()==""){	
			$("#errbx_reg_emailaddress").html("Please enter Email address.");
			$("#errbx_reg_emailaddress").show();
			$("#reg_emailaddress").focus();
			timeout($("#errbx_reg_emailaddress"),3000)			
			return false;
		}else if(echeck($("#reg_emailaddress").val())==false){
			$("#errbx_reg_emailaddress").html("Please enter valid emailaddress.");
			$("#errbx_reg_emailaddress").show()
			$("#reg_emailaddress").focus();
			timeout("#errbx_reg_emailaddress",3000)			
			return false;
		}else if($("#regs_confirm_email").val()==""){	
			$("#errbx_reg_confirm_email").html("Please Confirm Email address.");
			$("#errbx_reg_confirm_email").show();
			$("#regs_confirm_email").focus();
			timeout($("#errbx_reg_confirm_email"),3000)			
			return false;
		}else if(regisetr_email != regisetr_con_email){	
			$("#errbx_reg_confirm_email").html("Please Enter Confirm Email properly.");
			$("#errbx_reg_confirm_email").show();
			$("#regs_confirm_email").focus();
			timeout($("#errbx_reg_confirm_email"),3000)			
			return false;
		}else if($("#regs_password").val()==""){
			$("#errbx_regs_password").html("Please enter Password.");
			$("#errbx_regs_password").show()
			$("#regs_password").focus();
			timeout("#errbx_regs_password",3000)			
			return false;
		}
		<? if(!isset($_GET['cat'])) { ?>
		else if($("#regs_password").val().length < 6){
			$("#errbx_regs_password").html("Please minimum 6 characters for password.");
			$("#errbx_regs_password").show()
			$("#regs_password").focus();
			timeout("#errbx_regs_password",3000)			
			return false;
		}else if($("#regs_conf_password").val()==""){
			$("#errbx_regs_conf_password").html("Please Enter Confirm password.");
			$("#errbx_regs_conf_password").show()
			$("#regs_conf_password").focus();
			timeout("#errbx_regs_conf_password",3000)			
			return false;
		}else if(regisetr_pass != regisetr_con_pass){	
			$("#errbx_regs_conf_password").html("Please Enter Confirm Password properly.");
			$("#errbx_regs_conf_password").show();
			$("#regs_conf_password").focus();
			timeout($("#errbx_regs_conf_password"),3000)			
			return false;
		}<? }?> else if($("#regs_gender").val()=="0.0"){	
			$("#errbx_regs_gender").html("Please Select Gender.");
			$("#errbx_regs_gender").show();
			$("#regs_gender").focus();
			timeout($("#errbx_regs_gender"),3000)			
			return false;
		 }else if($("#reg_dobdd").val()=="0.0"){	
			$("#errbx_dob").html("Please Select Birth Date.");
			$("#errbx_dob").show();
			$("#reg_dobdd").focus();
			timeout($("#errbx_dob"),3000)			
			return false; 
		 }else if($("#reg_dobmm").val()=="0.0"){	
			$("#errbx_dob").html("Please Select Birth Month.");
			$("#errbx_dob").show();
			$("#reg_dobmm").focus();
			timeout($("#errbx_dob"),3000)			
			return false; 
		 }else if($("#reg_dobyy").val()=="0.0"){	
			$("#errbx_dob").html("Please Select Birth Year.");
			$("#errbx_dob").show();
			$("#reg_dobyy").focus();
			timeout($("#errbx_dob"),3000)			
			return false; 
		 }<? if($Enable_mobile_registration_page_design_setting=='Y') { ?>
		  else if($("#mobile1").val()==""){
			$("#errbx_mobile").html("Please Enter mobile.");
			$("#errbx_mobile").show()
			$("#mobile1").focus();
			timeout("#errbx_mobile",3000)			
			return false;
		}else if($("#mobile1").val().length != 10){
			$("#errbx_mobile").html("Please enter 10 digits mobile No.");
			$("#errbx_mobile").show()
			$("#mobile1").focus();
			timeout("#errbx_mobile",3000)			
			return false;
		}<? }?>
		 else if($("#regs_cmbreligian").val()=="0.0"){
			$("#errbx_cmbreligian").html("Please Select Religion.");
			$("#errbx_cmbreligian").show()
			$("#regs_cmbreligian").focus();
			timeout("#errbx_cmbreligian",3000)			
			return false;
		}else if($("#regs_cmbcountryid").val()=="0.0"){
			$("#errbx_cmbcountryid").html("Please Select Country.");
			$("#errbx_cmbcountryid").show()
			$("#regs_cmbcountryid").focus();
			timeout("#errbx_cmbcountryid",3000)			
			return false;
		}<? if(enable_zipcode=='Y'){ ?>
		 else if($("#txtpostcode").val()==""){
			$("#errbx_txtpostcode").html("Please Enter Zipcode.");
			$("#errbx_txtpostcode").show()
			$("#txtpostcode").focus();
			timeout("#errbx_txtpostcode",3000)			
			return false;
		 }<? }?>
		 else if($("#regs_cmbprofilecreatedby").val()=="0.0"){
			$("#errbx_cmbprofilecreatedby").html("Please Select Profile Created By.");
			$("#errbx_cmbprofilecreatedby").show()
			$("#regs_cmbprofilecreatedby").focus();
			timeout("#errbx_cmbprofilecreatedby",3000)			
			return false;
		 }else if($("#regs_cmbhearaboutusid").val()=="0.0"){
			$("#errbx_cmbhearaboutusid").html("Please Select How Did You Know About Us .");
			$("#errbx_cmbhearaboutusid").show()
			$("#regs_cmbhearaboutusid").focus();
			timeout("#errbx_cmbhearaboutusid",3000)			
			return false;
		 }
		 if(captcha==""){
			$("#errbx_hiddencaptcha").html("Please Enter imagecode .");
			$("#errbx_hiddencaptcha").show()
			$("#regs_Captcha").focus();
			timeout("#errbx_hiddencaptcha",3000)			
			return false;
		 }if(captcha!= "" && captcha != h_captcha){
			$("#errbx_hiddencaptcha").html("Please Enter valid imagecode .");
			$("#errbx_hiddencaptcha").show()
			$("#regs_Captcha").focus();
			timeout("#errbx_hiddencaptcha",3000)			
			return false;																								         }else if($("#regs_chkcond1").prop("checked") == false){
				$("#errbx_chkcond1").html("You must be agree with our terms and conditions.");
				$("#errbx_chkcond1").show();
				$("#regs_chkcond1").focus();
				timeout("#errbx_chkcond1",3000);
				return false;
	     }else {
			 
			    return true;
			
		 }

}
</script>


<!-------end---------------------->




<!-- Validation code start Here  --> 
<script language="JavaScript" type="text/JavaScript">


function get_state(countryid){
	//alert(countryid);
	/*if(countryid!='113'){		
		document.getElementById('cmbstateid').style.display = 'none';
		document.getElementById('cmbcityid').style.display = 'none';
		document.getElementById('state_input').style.display = 'inline';
		document.getElementById('city_input').style.display = 'inline';
	} else {
		document.getElementById('state_input').style.display = 'none';
		document.getElementById('city_input').style.display = 'none';
		document.getElementById('cmbstateid').style.display = 'inline';
		document.getElementById('cmbcityid').style.display = 'inline';
	}*/
	//alert(countryid);	
	if(countryid!=""){	
	//alert(countryid);	
		document.getElementById('exist_state').style.display = 'none';
		document.getElementById('exist_city').style.display = 'none';	
		document.getElementById('state_indicator').style.display = 'inline';
		$.post("state_auto_generate.php",
		{countryid:countryid,
		 cat:'state'},
		 function (data){
			var str=data;
			//alert(str);
			if(str!=""){
				document.getElementById('state_indicator').style.display = 'none';
				document.getElementById('state').innerHTML = str;
			}
		}
		)
	}
}
	function get_city(stateid){
		if(stateid!=""){
		document.getElementById('exist_city').style.display = 'none';	
		document.getElementById('city_indicator').style.display = 'inline';	
			$.post("state_auto_generate.php",
			{stateid:stateid,
			 cat:'city'},
			function (data){
				var str=data;
				if(str!=""){
					document.getElementById('city_indicator').style.display = 'none';	
					document.getElementById('city').innerHTML = str;
				}
			}
			)
		}
	}
	function get_nativestate(countryid){
		document.getElementById('exist_natstate').style.display = 'none';
		document.getElementById('exist_natcity').style.display = 'none';
		if(countryid!=""){
			$.post("state_auto_generate.php",
			{nat:"nat",
			 country:countryid,
			 nat_cat:"state"},
			 function (data){
			 	document.getElementById('native_state').style.display = 'inline';			 	
			 	document.getElementById('native_state').innerHTML = data;
			 }
			 )
		}	
	}
	function get_nativecity(stateid){
		document.getElementById('exist_natcity').style.display = 'none';
		if(stateid!="")	{
			$.post("state_auto_generate.php",
			{nat:"nat",
			state:stateid,
			nat_cat:"city"},
			function (data){
				document.getElementById('native_city').style.display = 'inline';
				document.getElementById('native_city').innerHTML = data;
			})
		}
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
</script>




<!-- Validation code ENd Here  --> 



<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<? include("top.php"); ?> 

<!--------------------------new register sessioncode start---------------------->
<?php


$regs_nickname ='';
$regs_name ='';
$regs_email ='';
$regs_gender_sel ='';
$regs_dobdd_sel ='';
$regs_dobmm_sel ='';
$regs_dobyy_sel ='';
$regs_mobile ='';
$regs_city_code ='';
$regs_cmbreligian_sel ='';
$regs_cmbmothertounge_sel ='';
$regs_cmbcountryid_sel ='';
$regs_cmbstateid_sel ='';
$regs_cmbcityid_sel ='';
$regs_cmbprofilecreatedby_sel= '';
$regs_cmbhearaboutusid_sel='';
$regs_chkcond1_chk='';


if(isset($_SESSION[$session_name_initital . "regs_nickname"]) && $_SESSION[$session_name_initital . "regs_nickname"]!="") 
{
	 $regs_nickname =$_SESSION[$session_name_initital . "regs_nickname"]; 
}


if(isset($_SESSION[$session_name_initital . "regs_name"]) && $_SESSION[$session_name_initital . "regs_name"]!="")
{
	 $regs_name =$_SESSION[$session_name_initital . "regs_name"];
}

if(isset($_SESSION[$session_name_initital . "regs_email"]) && $_SESSION[$session_name_initital . "regs_email"]!="") 
{
	 $regs_email =$_SESSION[$session_name_initital . "regs_email"];
}


if(isset($_SESSION[$session_name_initital . "regs_gender"]) && $_SESSION[$session_name_initital . "regs_gender"]!="")
 {
	 $regs_gender_sel =$_SESSION[$session_name_initital . "regs_gender"];
}

if(isset($_SESSION[$session_name_initital . "regs_dobdd"]) && $_SESSION[$session_name_initital . "regs_dobdd"]!="")
 {
	 $regs_dobdd_sel =$_SESSION[$session_name_initital . "regs_dobdd"];
}
if(isset($_SESSION[$session_name_initital . "regs_dobmm"]) && $_SESSION[$session_name_initital . "regs_dobmm"]!="")
 {
	 $regs_dobmm_sel =$_SESSION[$session_name_initital . "regs_dobmm"];
}

if(isset($_SESSION[$session_name_initital . "regs_dobyy"]) && $_SESSION[$session_name_initital . "regs_dobyy"]!="") 
{
	 $regs_dobyy_sel =$_SESSION[$session_name_initital . "regs_dobyy"];
}

if(isset($_SESSION[$session_name_initital . "regs_mobile"]) && $_SESSION[$session_name_initital . "regs_mobile"]!="") 
{
	 $regs_mobile =$_SESSION[$session_name_initital . "regs_mobile"];
}


if(isset($_SESSION[$session_name_initital . "regs_city_code"]) && $_SESSION[$session_name_initital . "regs_city_code"]!="") 
{
	 $regs_city_code =$_SESSION[$session_name_initital . "regs_city_code"];
}

if(isset($_SESSION[$session_name_initital . "regs_cmbreligian"]) && $_SESSION[$session_name_initital . "regs_cmbreligian"]!="")
 {
	 $regs_cmbreligian_sel =$_SESSION[$session_name_initital . "regs_cmbreligian"];
}

if(isset($_SESSION[$session_name_initital . "regs_cmbmothertounge"]) && $_SESSION[$session_name_initital . "regs_cmbmothertounge"]!="")
 {
	 $regs_cmbmothertounge_sel =$_SESSION[$session_name_initital . "regs_cmbmothertounge"];
}
if(isset($_SESSION[$session_name_initital . "regs_cmbcountryid"]) && $_SESSION[$session_name_initital . "regs_cmbcountryid"]!="")
 {
	 $regs_cmbcountryid_sel =$_SESSION[$session_name_initital . "regs_cmbcountryid"];
}

if(isset($_SESSION[$session_name_initital . "regs_cmbstateid"]) && $_SESSION[$session_name_initital . "regs_cmbstateid"]!="") 
{
	 $regs_cmbstateid_sel =$_SESSION[$session_name_initital . "regs_cmbstateid"];
}


if(isset($_SESSION[$session_name_initital . "regs_cmbcityid"]) && $_SESSION[$session_name_initital . "regs_cmbcityid"]!="") 
{
	 $regs_cmbcityid_sel =$_SESSION[$session_name_initital . "regs_cmbcityid"];
}

if(isset($_SESSION[$session_name_initital . "regs_cmbprofilecreatedby"]) && $_SESSION[$session_name_initital . "regs_cmbprofilecreatedby"]!="") 
{
	 $regs_cmbprofilecreatedby_sel =$_SESSION[$session_name_initital . "regs_cmbprofilecreatedby"];
}

if(isset($_SESSION[$session_name_initital . "regs_cmbhearaboutusid"]) && $_SESSION[$session_name_initital . "regs_cmbhearaboutusid"]!="") 
{
	 $regs_cmbhearaboutusid_sel =$_SESSION[$session_name_initital . "regs_cmbhearaboutusid"];
}

if(isset($_SESSION[$session_name_initital . "regs_chkcond1"]) && $_SESSION[$session_name_initital . "regs_chkcond1"]!="") 
{
	 $regs_chkcond1_chk ="checked";
}


?>
<!--------------------------new register sessioncode end---------------------->



<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.registration.php");?>
    </div>
   
</div>



<script>
function reset_regs_session(){

 //location.reload();
  window.location ="reset_regs_session.php";
}
</script>





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

<? if($staff_display!="N") { ?>
<script type="text/javascript">
$(function() {
	$("#date").datepicker();
});
</script>
<? } ?>