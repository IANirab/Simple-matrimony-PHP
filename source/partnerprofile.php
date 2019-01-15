<? include_once("commonfile.php");
checklogin($sitepath);
$filename ="partnerprofileinsert";
$profiletoplinkpartner_css_classs = "profilenavnumber_active";
$action = 0;
$genderid = "";
$agefrom =  "";
$ageto =  "";
$location =  "";
$religianid =  "";
$castid =  "";
$subcast = "";
$gotra= "";
$occupation=  "";
$education =  "";
$maritalstatus=  "";
$sendmeemail = "";
$heightfrom="";
$heightto="";
$dietids = "";
$smokeids="";
$drinkids="";
$states  ="";
$kidsids ="";
$grahid ="";
$pg_education ="";
$industry ="";
$functional_area ="";
$selected_religion_can_contact="";
$selected_cast_contact_me="";

$sendmeemail_monthly ="checked";
$sendmeemail_weekly ="";
$sendmeemail_do_not_want ="";
$smkid='';
$drkid='';
$religiosness_id = "";
$hijab_id = "";
$beard_id = "";
$revert_islam_id = "";
$halal_strict_id = "";
$salah_perform_id = "";

$work_in = "";
$work_in_county = "";
$annincome = "";
$cmbanninccurrency = ""; 
$workin_states = "";
$spiritual_order = "";
$denominationid ="";	
if (findsettingvalue("Religion_field_display") == "M")
$ex_field =",religiosness_id,hijab_id,beard_id,revert_islam_id,halal_strict_id,salah_perform_id";
else
$ex_field ="";

$result = getdata("select genderid,agefrom,ageto,location,religianid,castid, subcast,gotra,occupation,education,
maritalstatus,sendmeemail,heightfrom,heightto,dietids,smokeids,drinkids,states,kidsids,grahid,pg_education,industry,
functional_area,selected_religion_can_contact,selected_cast_contact_me $ex_field, work_in, work_in_country, ethnic,annincome,
workin_state,spiritual_order,denominationid,annincome_curr from tbldatingpartnerprofilemaster where userid =$curruserid");
while ($rs = mysqli_fetch_array($result))
{
	$genderid = $rs[0];
	$agefrom = $rs[1];
	$ageto = $rs[2];
	$religianid = $rs[4];
	if($rs[5]!="")
	$castid = explode(",",$rs[5]);
	//$castid = $rs[5];
	$subcast = explode(",",$rs[6]);
	$gotra= $rs[7];
	if ($rs[3] != "")
	$location = explode(",",$rs[3]);
	if ($rs[8] != "")
	$occupation = explode(",",$rs[8]);
	if ($rs[9] != "")
	$education = explode(",",$rs[9]);
	if ($rs[10] != "")
	$maritalstatus= explode(",",$rs[10]);
	$sendmeemail= $rs[11];
	$heightfrom= $rs[12];
	$heightto= $rs[13];
	$maritstatus = $rs[10];	
	
	if ($rs[14] != "")
	$dietids= explode(",",$rs[14]);
	if(isset($rs['spiritual_order']) && $rs['spiritual_order']!=''){
		$spiritual_order = explode(",",$rs['spiritual_order']);
	}
	if ($rs[15] != "")
	 $smokeids= explode(",",$rs[15]);
	if ($rs[16] != "")
	$drinkids= explode(",",$rs[16]);
	//$states= $rs[17];
	if($rs[17]!="")
		$states = explode(",",$rs[17]);
	/*if($rs[18]!="")	{
		$kidsids= split(",",$rs[18]);
	}*/
	$kidsids = $rs[18];
	
	//$grahid = $rs[19];
	if($rs[19]!="")
	$grahid = explode(",",$rs[19]);	
	//if ($sendmeemail=="Y")
	//	$sendmeemail="checked";
	if ($rs[20] != "")
	$pg_education= explode(",",$rs[20]);
	if ($rs[21] != "")
	$industry= explode(",",$rs[21]);
	if ($rs[22] != "")
	$functional_area= explode(",",$rs[22]);

	$selected_religion_can_contact= $rs[23];
	$selected_cast_contact_me= $rs[24];
	
	if($rs['work_in']!="")
		$work_in = explode(",",$rs['work_in']);
		
	if($rs['work_in_country']!=""){
		$work_in_country = explode(",",$rs['work_in_country']);	
	} else {
		$work_in_country = "";
	}
	
	if($rs['workin_state']!=''){
		$workin_states = explode(",",$rs['workin_state']);
	} else {
		$workin_states = "";
	}	
	
	if (findsettingvalue("Religion_field_display") == "M")
	{
	$religiosness_id = $rs[25];
	$hijab_id = $rs[26];
	$beard_id = $rs[27];
	$revert_islam_id = $rs[28];
	$halal_strict_id = $rs[29];
	$salah_perform_id = $rs[30];
	}
	if($rs['annincome']!=""){
		$annincome = explode(",",$rs['annincome']); 	
	}	
	if ($selected_religion_can_contact == "Y")
		$selected_religion_can_contact ="checked";
	else
		$selected_religion_can_contact ="";
	if ($selected_cast_contact_me == "Y")
		$selected_cast_contact_me ="checked";
	else
		$selected_cast_contact_me ="";
	
	if ($sendmeemail=="M")
	{
		$sendmeemail_monthly ="checked";
		$sendmeemail_weekly ="";
		$sendmeemail_do_not_want ="";
	}
	if ($sendmeemail=="W")
	{
		$sendmeemail_monthly ="";
		$sendmeemail_weekly ="checked";
		$sendmeemail_do_not_want ="";
	}
	if ($sendmeemail=="N")
	{
		$sendmeemail_monthly ="";
		$sendmeemail_weekly ="";
		$sendmeemail_do_not_want ="checked";
	}
	
	$ethnic = $rs['ethnic'];
	$denominationid = $rs['denominationid'];
	$cmbanninccurrency = $rs['annincome_curr'];
	
	//print_r($grahid);

	
}
	//freeingresult($result);
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
<script language="javascript" type="text/javascript">
	function child(val){
		
	
		document.getElementById('chkmaritalstatus0').checked==true 
	
	 if(document.getElementById('chkmaritalstatusany').checked==true ||
			document.getElementById('chkmaritalstatus2').checked==true || 
		   document.getElementById('chkmaritalstatus3').checked==true ){			
		   document.getElementById('kids').style.display = 'table-row';
		} else if(document.getElementById('chkmaritalstatus2').checked==true || 
			document.getElementById('chkmaritalstatusany').checked==false ||
			document.getElementById('chkmaritalstatus3').checked==false || 
			document.getElementById('chkmaritalstatus4').checked==true || 
			document.getElementById('chkmaritalstatus6').checked==true || 
			document.getElementById('chkmaritalstatus1').checked==false || 
			document.getElementById('chkmaritalstatus6').checked==false  || 
			document.getElementById('chkmaritalstatus5').checked==false || 
			document.getElementById('chkmaritalstatus2').checked==false) {
			document.getElementById('kids').style.display = 'none';
		}		
	}
	
	function change_caste_subcaste(val){		
		if(val!=''){						
			$.post("change_caste_subcaste.php",
					{religionid:val},
						function (data){							
							if(data!=""){								
								var str = data.split("~");					
								//alert(str[0]);		
								document.getElementById('caste').innerHTML = str[0];
								document.getElementById('subcaste').innerHTML = str[1];
							}
						})
		}
	}
	
	function removeany(chkid){
		
		if(document.getElementById(chkid).checked==true)	
		{
			document.getElementById(chkid).checked = false	
		}
	}
	
	function removeany1(chkid1){
		//alert(chkid1)
		if(document.getElementById(chkid1).checked==true)	
		{
			document.getElementById(chkid1).checked = false	
		}
	}
</script>

<style type="text/css">
    span{
        color:black !important;
    }
</style>

<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<script>
function partnersubmit()
{
	var chkeduc=$("#chkeducation").val();		
	var chkwork=$("#chkwork_in").val();		
	var chkocc=$("#chkoccupation").val();		


	if(chkeduc==null){

		$("#errorbox_pat3edu").html("Please select education");
		$("#errorbox_pat3edu").show();
		$("#chkeducation").focus();
		timeout("errorbox_pat3edu",4000);
		return false;
	}
	
	if(chkwork==null){
		$("#errorbox_pat3edu1").html("Please select work sector");
		$("#errorbox_pat3edu1").show();
		$("#chkwork_in").focus();
		timeout("errorbox_pat3edu1",4000);
		return false;
	}
	
	if(chkocc==null){
		$("#errorbox_pat3edu2").html("Please select occupation");
		$("#errorbox_pat3edu2").show();
		$("#chkoccupation").focus();
		timeout("errorbox_pat3edu2",4000);
		return false;
	}
	
	
	

}
</script>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.partnerprofile.php");?>
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
<? include('formjs.php'); ?>


<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</body>
</html>