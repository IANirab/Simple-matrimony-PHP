<? include_once("commonfile.php");
checklogin($sitepath);
$private_contact_enable = findsettingvalue("private_contact_details");

$filename ="updateprofilecontactinsert";
$profiletoplinkcontact_css_classs = "profilenavnumber_active";
$action = 0;
$countryid=$country_selected;
$state = $state_selected;
$city = "";
$area = "";
$postcode  = "";
$residancystatusid = "";
$countryofbirth = "";
$countryofgrewup = "";
$mobileno = "";
$address ="";
$private_email = "";
$private_phone_no = "";
$contact_person_on_phone="";
$country_code = "";
$mobile = "";
$city_code = ""; 
$landline = "";
$native_place = "";
$relation = "";
$remarks = "";
$calling_timezone ="";
$residancystatusid = "";
$socialbookmarkcode = "";
$feedurl = "";
$externalvideourl = "";
$externalbioprofile = "";
$subscriber_yes ="";
$subscriber_no ="checked";		

$get_panchayat='';
$get_districtid='';
$nristatus='';

$result = getdata("select countryid,state,city,area,postcode,residancystatusid,countryofbirth,countryofgrewup,name, 
altemail, mobile,phno,callingtime,talkpreference,address,email,private_email,private_phone_no,contact_person_on_phone,
country_code,city_code,landline,city_id,native_place,genderid,relation,remarks,residancystatusid,calling_timezone, socialbookmarkcode,feedurl,externalvideourl,externalbioprofile,image_password,image_password_protect,news_letter_subscribe,panchayat,districtid,nristatus from tbldatingusermaster 
where userid =$curruserid");
	while ($rs = mysqli_fetch_array($result))
	{
		$countryid = $rs[0];
		$state = $rs[1];
		$city = $rs[2];
		$area = $rs[3];
		$postcode = $rs[4];
		$residancystatusid = $rs[5];
		$countryofbirth = $rs[6];
		$countryofgrewup = $rs[7];		
		$name = $rs[8];
		$altemail = $rs[9];
		$mobile = $rs[10];
		$phno = $rs[11];
		$callingtime = $rs[12];
		$talkpreference = $rs[13];
		$address =$rs[14];
		$email = $rs[15];
		$private_email = $rs[16];
		$private_phone_no = $rs[17];
		$contact_person_on_phone = $rs[18];		
		$country_code = $rs[19];		
		$city_code = $rs[20];
		$landline = $rs[21];
		$city_id = $rs[22];
		$genderid = $rs['genderid'];
		$relation = $rs['relation'];
		$remarks = $rs['remarks'];		
		$native_place = $rs[23];
		$calling_timezone =$rs['calling_timezone'];
		$nristatus =$rs['nristatus'];
		

		if ($private_email == "Y")
			$private_email ="checked";
		else
			$private_email ="";
		if ($private_phone_no == "Y")
			$private_phone_no ="checked";
		else
			$private_phone_no ="";
			
		$residancystatusid = $rs['residancystatusid'];	
		
		
		$socialbookmarkcode = $rs['socialbookmarkcode'];
		$feedurl = $rs['feedurl'];
		$externalvideourl = $rs['externalvideourl'];
		$externalbioprofile = $rs['externalbioprofile'];
		$image_password= $rs['image_password'];
		$image_password_protect= $rs['image_password_protect'];
		$news_letter_subscribe= $rs['news_letter_subscribe'];
		$get_panchayat=$rs['panchayat'];
		$get_districtid=$rs['districtid'];
		
		
		if ($news_letter_subscribe == "Y")
		{
		$subscriber_yes ="checked";
		$subscriber_no ="";
		}

		if ($image_password_protect =="Y")
			$image_password_protect = "checked";
		else
			$image_password_protect = "";
		
		
	
	}
	freeingresult($result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript">

	
	function get_munciple_value(type,value)
	{
		$.ajax({
			type: "POST",
			url: "state_auto_generate.php",
			data:'munciple_cat='+type+'&mun_id='+value,
			success: function(data)
			{
				if(type=='mun_s')
				{
					$("#hide_munciple_state").hide();
					$("#show_munciple_state").show();
					$("#show_munciple_state").html(data);
				}
				if(type=='mun_d')
				{
					$("#hide_munciple_district").hide();
					$("#show_munciple_district").show();
					$("#show_munciple_district").html(data);
				}

				if(type=='mun_c')
				{
					$("#hide_munciple_city").hide();
					$("#show_munciple_city").show();
					$("#show_munciple_city").html(data);
				}
				if(type=='mun_p')
				{
					$("#hide_munciple_panchayat").hide();
					$("#show_munciple_panchayat").show();
					$("#show_munciple_panchayat").html(data);
				}			
					
				
			}
		});
	}


function get_state(countryid){
	
	if(countryid!=""){		
		$("#exist_state").hide();
		$("#exist_city").hide();
		$("#state_indicator").show();
		//document.getElementById('exist_state').style.display = 'none';
		//document.getElementById('exist_city').style.display = 'none';	
		//document.getElementById('state_indicator').style.display = 'inline';
		$.post("state_auto_generate.php",
		{countryid:countryid,
		 cat:'state'},
		function (data){
			var str=data;
			//alert(str);
			if(str!=""){
				$("#state_indicator").hide();
				$("#state").html(str);
				//document.getElementById('state_indicator').style.display = 'none';
				//document.getElementById('state').innerHTML = str;
			}
		}
		)
	}
	if(countryid == '0.0'){
		
			//document.getElementById('country_other1').style.display = 'inline';
			//$("#country_other1").show();
		}
		if(countryid != '0.0'){
			//document.getElementById('country_other1').style.display = 'none';
			//$("#country_other1").show();
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
		if(stateid == '0.0'){
		
			document.getElementById('state_other').style.display = 'inline';
		}
		if(stateid != '0.0'){
			document.getElementById('state_other').style.display = 'none';
		}
	}
	
	function get_values (cityid)
	{
		
		if(cityid == '0.0'){
		
			document.getElementById('city_other').style.display = 'inline';
		}
		if(cityid != '0.0'){
			document.getElementById('city_other').style.display = 'none';
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
	function enable_other_city(divid){
		if(document.getElementById(divid).style.display=='none'){
			document.getElementById(divid).style.display='inline';
		} else {
			document.getElementById(divid).style.display='none';
		}
	}
	
	function enableother(divid){		
		if(document.getElementById(divid).style.display=='none'){
			document.getElementById(divid).style.display='inline';
		} else {
			document.getElementById(divid).style.display='none';
		}
	}
	function getonfocus(x,y)
{
	var val = document.getElementById(y).value;
	if(val != "") {
		var first = document.getElementById("gethidden").value;
		document.getElementById("gethidden").value = x;
		var second = document.getElementById("gethidden").value;
		if(first != "") {
			var final = first+","+second;
		} else {
			var final = first+second;
		}
		document.getElementById("gethidden").value = final;
		
		var datefirst = document.getElementById("valfield").value;
		document.getElementById("valfield").value = val;
		var datesecond = document.getElementById("valfield").value;
		if(datefirst != "") {
			var datefinal = datefirst+","+datesecond;
		} else {
			var datefinal = datefirst+datesecond;
		}
		document.getElementById("valfield").value = datefinal;
	}
	
}
function IsNumeric1(strString,inpid)
   //  check for valid numeric strings	
   {   
   var strValidChars = "0123456789.";
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
   
   function validate_form4()
   {
		var cmbcountryid=$("#cmbcountryid").val();
		var txtaddress=$("#txtaddress").val();
		
		if(txtaddress=="")
		{
			error_notify_add('notify_danger','enter address','txtaddress','red');
			error_notify_remove('notify_danger',5000);
			return false;
		}
		else if(cmbcountryid==0.0)
		{
			error_notify_add('notify_danger','Select country','cmbcountryid','red');
			error_notify_remove('notify_danger',5000);
			return false;
		}
		else
		{
			return true;
		}  
   }
</script>


<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.updateprofilecontact.php");?>
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