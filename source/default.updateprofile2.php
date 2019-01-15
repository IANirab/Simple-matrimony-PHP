<?
include_once("commonfile.php");
checklogin($sitepath);
$curuserpackageid = getonefielddata("SELECT packageid from tbldatingusermaster WHERE userid=".$curruserid." ");
$filename ="updateprofile2insert";
$profiletoplinksocial_css_classs = "profilenavnumber_active";
$action = 0;
$castid = "";
$subcast = "";
$motherthoungid = "";
$familyvalueid = "";
$minrashi = "";
$religianid = "3";
$gotra = "";
$grahid = "";
$moonsignid =0;
$sunsignid =0;
$birthrashi = '';
$neptune = '';
$mool='';




$ex_field =",religiosness_id,hijab_id,beard_id,revert_islam_id,halal_strict_id,salah_perform_id,islamic_education";
$familystatusid = "";
$familytypeid = "8";
$ethnic = "";
$rel_interest = "";

$chr_denomination = "";
$chr_diocese = "";
$maternal_name = "";
$maternal_location = "";
$preferedstar = "";
$lagna = "";
$surya = "";
$chandra = "";
$kuja = "";
$budha = "";
$vyazham = "";
$sukra = "";
$shani = "";
$rahu = "";
$ketu = "";
$gulikan = "";
$horoscopeid = "";
$horoscopeid_shudan = "checked";
$horoscopeid_dosham = "";
$horoscopeid_madhyam = "";
$horoscopeid_not_application = "";   
$preferstarid = "";
$ignorehoroscope = "";
$house_arr = "";
$igno = "";
$mangal = '';
$uploadparichay = '';
$muslimsubcast="";
$spiritual_order ="";
$denominationid ="";
$denomination_other ="";
$spiritual_order_other ="";
$txtbirthtime_hour='';
$txtbirthtime_second ='';
$txtbirthtime_am_pm ='';
$style1="";

$result = getdata("select religianid,castid,subcast,motherthoungid,familyvalueid,gotra,grahid,day(dob),month(dob),year(dob),birthtime,birthplace,moonsignid,sunsignid $ex_field, familystatusid, familytypeid, ethnic, religion_interest, catholic, chr_denomination, chr_diocese, prayer_id, zakat_id, fasting_id, quran_id, maritalstatusid, countryofbirth, countryofgrewup, maternal_name, maternal_location,lagnaid,suryaid,
chandraid,kujaid,budhaid,vyazham_id,sukraid,shaniid,rahuid,ketuid,gulikan,horoscopeid,prefer_star,ignore_horo,
birthrashi,mangalid,neptuneid,mool,uploadparichay,muslimsubcast,spiritual_order,denominationid,txtbirthtime_second,txtbirthtime_hour,txtbirthtime_am_pm,horoscope  from tbldatingusermaster
 where userid =$curruserid");
	while ($rs = mysqli_fetch_array($result)){
		$religianid = $rs[0];
		$castid = $rs[1];
		$subcast = $rs[2];
		$motherthoungid = $rs[3];
		$familyvalueid = $rs[4];
		$gotra = $rs[5];
		$grahid= $rs[6];
		$dobdd = $rs[7];
		$dommm = $rs[8];
		$dobyy = $rs[9];
		$birthtime = $rs[10];
		$birthplace = $rs[11];
		$moonsignid = $rs[12];
		$sunsignid = $rs[13];
		$religiosness_id = $rs[14];
		$hijab_id = $rs[15];
		$beard_id = $rs[16];
		$revert_islam_id = $rs[17];
		$halal_strict_id = $rs[18];
		$salah_perform_id = $rs[19];		
		/*}*/
		$familystatusid = $rs['familystatusid'];   
		$familytypeid = $rs['familytypeid'];
		$ethnic = $rs['ethnic'];
		$rel_interest = $rs['religion_interest'];
		$catholic = $rs['catholic'];
		$chr_denomination = $rs['chr_denomination'];
		$chr_diocese = $rs['chr_diocese'];
		
		$prayer = $rs['prayer_id'];
		$zakat = $rs['zakat_id'];
		$fasting = $rs['fasting_id'];
		$quran = $rs['quran_id'];
		$countryofbirth = $rs['countryofbirth'];
		$countryofgrewup = $rs['countryofgrewup'];		
		$maritalstatus = $rs['maritalstatusid'];
		$maternal_name = $rs['maternal_name'];
		$maternal_location = $rs['maternal_location'];
		$lagna = $rs['lagnaid'];
		$surya = $rs['suryaid'];
		$chandra = $rs['chandraid'];
		$kuja = $rs['kujaid'];
		$budha = $rs['budhaid'];
		$vyazham = $rs['vyazham_id'];
		$sukra = $rs['sukraid'];
		$shani = $rs['shaniid'];
		$rahu = $rs['rahuid'];
		$ketu = $rs['ketuid'];
		$gulikan = $rs['gulikan'];
		$horoscopeid = $rs['horoscopeid']; 
		$birthrashi = $rs['birthrashi'];
		$mangal = $rs['mangalid'];
		$neptune = $rs['neptuneid'];
		$spiritual_order = $rs['spiritual_order'];
		$mool=$rs['mool'];
		$horoscope=$rs['horoscope'];
		$txtbirthtime_hour=$rs['txtbirthtime_hour'];
		$txtbirthtime_second =$rs['txtbirthtime_second'];
	
		$txtbirthtime_am_pm1 =$rs['txtbirthtime_am_pm'];
		
		if($txtbirthtime_am_pm1=="AM")
		{
			$txtbirthtime_am_pm2 = "selected=''";
		}
		else
		{
			$txtbirthtime_am_pm2 = "";
			
		}
		 if($txtbirthtime_am_pm1=="PM")
		{
			$txtbirthtime_am_pm3 = "selected=''";
		}
		else
		{
			$txtbirthtime_am_pm3 = "";
		}
	
		$uploadparichay = $rs['uploadparichay'];
		$islamic_education = $rs['islamic_education'];
		if ($horoscopeid=="M"){				
			$horoscopeid_shudan = "checked";
			$horoscopeid_dosham = "";
			$horoscopeid_madhyam = "";
			$horoscopeid_not_application = "";   
		}
		if ($horoscopeid=="W")
		{
			
			$horoscopeid_shudan = "";
			$horoscopeid_dosham = "checked";
			$horoscopeid_madhyam = "";
			$horoscopeid_not_application = "";   

		}
		if ($horoscopeid=="N")
		{
			$horoscopeid_shudan = "";
			$horoscopeid_dosham = "";
			$horoscopeid_madhyam = "checked";
			$horoscopeid_not_application = "";   
		}
		if ($horoscopeid=="P")
		{
			$horoscopeid_shudan = "";
			$horoscopeid_dosham = "";
			$horoscopeid_madhyam = "";
			$horoscopeid_not_application = "checked";   
		}
		
		$ignorehoroscope = $rs['ignore_horo'];
		if($ignorehoroscope == 'Y')
			$ignorehoroscope = 'checked';
			$igno =  getonefielddata("select ignore_horo from tbldatingusermaster where userid=".$curruserid."");
			$preferstarid = $rs['prefer_star'];
       $muslimsubcast=$rs['muslimsubcast'];
	   $denominationid = $rs['denominationid'];
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

<?= $sitethemepath ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=findsettingvalue("Webstats_code"); ?>
<script type="text/javascript">

function chnage_denomination(val)
{
	if(val=='N')
	{
		$("#denomination_div").show();
	}else{ $("#denomination_div").hide(); }
}

function changedata(subcaste){
   
   if(subcaste!='')
   {
	  //alert(subcaste);
	   $.post("subcaste.php",
	         {
			  subcaste:subcaste
			 },
			  function (data)
			  {  
			     if(data!='')
				 {
				  //alert(data);
				  document.getElementById('mool').style.display ='block'
				  document.getElementById('mool').innerHTML=data;
				 }
					//if(subcaste=='other')
					//{
					//$("#other_subcast_div").show();
					//}else{ $("#other_subcast_div").hide(); }
	
			  }
			)
   }

	   if(subcaste == 'other'){
			$("#subcast_other_div").show();
		}
		if(subcaste != 'other'){
			$("#subcast_other_div").hide();
		}
}
</script>
<script language="javascript" type="text/javascript">

function change_motherthounge(val)
{
	 if(val == 'Other'){
			document.getElementById('motherthoungue_other').style.display = 'inline';
		}
		if(val != 'Other'){
			document.getElementById('motherthoungue_other').style.display = 'none';
		}

	
}

</script>
<script language="javascript" type="text/javascript">
function enable_grahnila2(){
	document.getElementById('horoscope1').style.display = 'none';
	
}
	function enable_muslim(val){
    		
		$("#cast_other_div").hide();
		$("#subcast_other_div").hide();
		
		if(val==1 || val==2)
		{
			document.getElementById('hide_submit').style.display = 'block';
			document.getElementById('show_submit').style.display = 'none';

			
		}else
		{
			document.getElementById('hide_submit').style.display = 'none';
			document.getElementById('show_submit').style.display = 'block';

		}
		
		<? if($enable_astrological_module=='Y') { ?>
		enable_grahnila2();
		<? } ?>
		//alert(val);		
		if(val=='3'){  			
		//alert("opened")
			document.getElementById('muslim').style.display = 'block';
			}else {
			document.getElementById('muslim').style.display = 'none';
			
		}
		
		
		<? //if($enable_astrological_module=='Y') { ?>
		if(val==2 || val==1){						
			//enable_grahnila1();
			document.getElementById('hindu').style.display = 'inline';	
			document.getElementById('gotra').style.display = 'inline';	
		} else {
			
			document.getElementById('hindu').style.display = 'none';
			document.getElementById('gotra').style.display = 'none';	
			//$("#horoscope1").hide();
		}
		<? //} ?>		
		
		<? if($enable_astrological_module=='Y') { ?>
		if(val==2 || val==1){						
			enable_grahnila1();
			$("#horoscope1").show();
		} else {
			$("#horoscope1").hide();
		}
		<? } ?>
		<? if($denomination_module=='Y' && $catholic_module=='Y'){?>		
		if(val=='4'){
			$("#christian").show();
			$("#hide_cast").hide();
		} else {
			$("#christian").hide();
			$("#hide_cast").show();
		}
		<? } ?>
		
		if(val!=""){
			document.getElementById('mool').style.display ='none'
			document.getElementById('exist_cast').style.display = 'none';
			document.getElementById('exist_subcast').style.display = 'none';
			
			$.post("search_cast.php",
					{religionid:val,
					 cat:"upd"},
					 function (data){
					 	var str = data;						
						if(str!=""){
						
							//document.getElementById('searchcast').style.display = 'block';
							$("#hide_cast").hide();
							document.getElementById('searchcast').innerHTML = str;							
						}
												 
					 }
				  )
		}
		
	  
	}
	
function change_subcast(val){	

	if(val!="0.0"){
		//$('#exist_subcast').remove();
		//document.getElementById("exist_subcast").remove()
		
		document.getElementById('mool').style.display ='none'
		document.getElementById('exist_subcast').style.display = 'none';
	
		$.post("search_cast.php",
				{castid:val,
				 cat:"search_subcast"},
				 function (data){
				 	var str = data;
				
						document.getElementById('subcast').style.display = 'block';
						document.getElementById('subcast').innerHTML = str;
				}
			)
	}

	if(val == 'other'){
			$("#cast_other_div").show();
		}
		if(val != 'other'){
			$("#cast_other_div").hide();
		}

}

function other_sub(val)
{
	if(val=='other')
	{
		$("#other_subcast_div").show();
	}else{ $("#other_subcast_div").hide(); }
}

function enable_other(){
	if(document.getElementById('other_subcast').style.display=='none'){
		document.getElementById('other_subcast').style.display = 'inline';
	} else {
		document.getElementById('other_subcast').style.display = 'none';
	}	
}
function change_denomination(inst_val){
		//alert (inst_val);
		if(inst_val == 'other'){
			document.getElementById('denomination_other').style.display = 'inline';
		}
		if(inst_val != 'other'){
			document.getElementById('denomination_other').style.display = 'none';
		}
}

function change_silsila(inst_val1){
		//alert (inst_val);
		if(inst_val1 == 'other'){
			document.getElementById('spiritual_order_other').style.display = 'inline';
		}
		if(inst_val1 != 'other'){
			document.getElementById('spiritual_order_other').style.display = 'none';
		}
}


</script>
<script type="text/javascript">
function enable_grahnila(id){
	if(document.getElementById(id).checked == true){
		//alert(document.getElementById('horoscope1').innerHTML);
		document.getElementById('horoscope1').style.display = "none"; 
	}
	else
	{
		
		document.getElementById('horoscope1').style.display = "inline"; 
	}
}
function enable_grahnila1(){
	//alert('reached');
	document.getElementById('horoscope1').style.display = 'inline'
}
function getonfocus(x,y)
{
	var val = document.getElementById(y).value;
//	alert(val)
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

function validate_form3()
{
	var cmbreligian=$("#cmbreligian").val();
	var cmbcast=$("#cmbcast").val();
	var cmbmothertounge=$("#cmbmothertounge").val();
	

	 if(cmbmothertounge==0.0)
	{
		error_notify_add('notify_danger','<?=$validation_txt3?>','cmbmothertounge','red');
		error_notify_remove('notify_danger',5000);
		return false;
	}
	else
	{
		return true;
	}
	
	
}
</script>

</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
     
    	<? include("plugin.updateprofile2.php");?>
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