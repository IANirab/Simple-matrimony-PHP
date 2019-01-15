<? include_once("commonfile.php");
checklogin($sitepath);
$filename ="updateprofile3insert";
$profiletoplinkeducation_css_classs = "profilenavnumber_active";
$action = 0;
$educationid = "";
$ocupationid = "";
$annualincome = "";
$education_detail= "";
$occupation_detail= "";
$service_location= "";
$service_area= "";
$annual_income_currancyid="";
$annual_income_id="";
$cmb_status_id = "";
$service_state = "";
$service_city = "";
$edudetails = "";
$working_partner = "";
$company_name = "";
$state = "";
$city_id="";

$result = getdata("select educationid,ocupationid,annualincome,education_detail,occupation_detail,edu_pg_id,edu_pg_other,industry_id,industry_other,work_function_id,work_function_other,instituteid,institute_other,service_location,service_area,annual_income_currancyid,annual_income_id,occupationstatusid,service_state,service_city,edudetails,working_partner,company_name,state,city_id from tbldatingusermaster where userid =$curruserid");
while ($rs = mysqli_fetch_array($result))
{
	$educationid = $rs[0];
	$ocupationid = $rs[1];
	$annualincome = $rs[2];
	$education_detail= $rs[3];
	$occupation_detail= $rs[4];
	$edu_pg_id= $rs[5];
	$edu_pg_other= $rs[6];
	$industry_id= $rs[7];
	$industry_other= $rs[8];
	$work_function_id= $rs[9];
	$work_function_other= $rs[10];
	$instituteid= $rs[11];
	$institute_other= $rs[12];
	$service_location= $rs[13];
	$service_area= $rs[14];		
	$annual_income_currancyid= $rs[15];
	$annual_income_id= $rs[16];		
	$cmb_status_id = $rs[17];
	$service_state = $rs[18];
	$service_city = $rs[19];
	$edudetails = $rs[20];
	$working_partner = $rs[21];
	$company_name = $rs[22];
	$state = $rs[23];
	$city_id = $rs[24];
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


<script>
function show_addtional_txt(id,val2)
{
	$("#"+id).toggle();
	$("#"+val2).val('');
}
</script>


<script language="javascript" type="text/javascript">
	function change_edu(sel_val){
		//alert (sel_val);
		if(sel_val == '17' || sel_val == '24' ){
			document.getElementById('txt_education_detail').style.display = 'inline';
		}
		if(sel_val != '17' || sel_val == '24' ){
			document.getElementById('txt_education_detail').style.display = 'none';
		}		
}

	function change_inst(inst_val){
		//alert (inst_val);
		if(inst_val == '115'){
			document.getElementById('txt_institute_other').style.display = 'inline';
		}
		if(inst_val != '115'){
			document.getElementById('txt_institute_other').style.display = 'none';
		}
}

	function change_post(post_val){
		//alert (post_val);
		if(post_val == '19'){
			document.getElementById('txt_pg_other').style.display = 'inline';
		}
		if(post_val != '19'){
			document.getElementById('txt_pg_other').style.display = 'none';
		}
}

function change_ind(ind_val){
		//alert (ind_val);
		if(ind_val == '45'){
			document.getElementById('txt_industry_other').style.display = 'inline';
		}
		if(ind_val != '45'){
			document.getElementById('txt_industry_other').style.display = 'none';
		}
}

function change_fnct(fnct_val){
		//alert (fnct_val);
		if(fnct_val == '48'){
			document.getElementById('txt_work_function_other').style.display = 'inline';
		}
		if(fnct_val != '48'){
			document.getElementById('txt_work_function_other').style.display = 'none';
		}
}

function change_occu(occu_val){
		//alert (occu_val);
		if(occu_val == '124'){
			document.getElementById('txt_occupation_detail').style.display = 'inline';
		}
		if(occu_val != '124'){
			document.getElementById('txt_occupation_detail').style.display = 'none';
		}
}

function change_status(status_val){
	//alert (status_val);
		if(status_val == '25'){
			document.getElementById('txt_status_other').style.display = 'inline';
		}
		if(status_val != '25'){
			document.getElementById('txt_status_other').style.display = 'none';
			
		}
		
		if(status_val == '26'){
				document.getElementById('employee_div').style.display = 'none';
		}else{
			document.getElementById('employee_div').style.display = 'inline';
		}
	
}
function get_state(countryid){	

	if(countryid!=""){		
		$.post("state_auto_generate.php",
		{countryid:countryid,
		 cat:'state'},
		function (data){
			var str=data;
			if(str!=""){
				$("#state_hide").hide();
				document.getElementById('state').innerHTML = str;
				$("#city_hide").hide();
				//document.getElementById('city').innerHTML = str;
			}
		}
		)
	}
}

function get_city(stateid){
	if(stateid!=""){
		$.post("state_auto_generate.php",
		{stateid:stateid,
		 cat:'city'},
		function (data){
			var str=data;
			if(str!=""){
				document.getElementById('city_hide').style.display = 'none';
				document.getElementById('city').innerHTML = str;
			}
		}
		)
	}
}
function enable_other_education(val)
{
	$("#"+val).toggle();	
}
function enableother(divid){
	$('#'+divid).toggle();
}
function enable_other_city(divid){
	$('#'+divid).toggle();
}
function getonfocus(x,y){
	var val = document.getElementById(y).value;
	if(val != "") {
		document.getElementById("valfield").value = val;
		document.getElementById("gethidden").value = x;
	}
}

</script>


<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<script>

function timeout(divid,seconds){
		setTimeout(function() {
    	$("#"+divid).hide('slow');
	}, seconds);	
}

function validate_form5()
{
	if($("#cmbeducation").val()==""){
		error_notify_add('notify_danger','Select education','cmbeducation','red');
		error_notify_remove('notify_danger',5000);
		return false;
	}
	else if($("#cmb_status_id").val()==0.0){
		error_notify_add('notify_danger','Select employe type','cmb_status_id','red');
		error_notify_remove('notify_danger',5000);
		return false;
	}
	
//	else if($("#cmbannualincome_currancy").val()==0.0){
//		error_notify_add('notify_warning','Select currency type','cmbannualincome_currancy','red');
//		error_notify_remove('notify_warning',5000);
//		return false;
//	}
//	
//	else if($("#cmbannualincome").val()==0.0){
//		error_notify_add('notify_warning','Select income','cmbannualincome','red');
//		error_notify_remove('notify_warning',5000);
//		return false;
//	}
	else
	{
		return true;
	}
		
}
</script>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.updateprofile3.php");?>
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