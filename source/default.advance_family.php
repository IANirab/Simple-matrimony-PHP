<?

include_once("commonfile.php");
checklogin($sitepath);
$filename ="advance_family_insert";
$profiletoplinkadvancefly_css_classs = "profilenadvancefly_active";
$action = 0;

if (findsettingvalue("Religion_field_display") == "M")
$ex_field =",religiosness_id,hijab_id,beard_id,revert_islam_id,halal_strict_id,salah_perform_id";
else
$ex_field ="";

$id='';
$userid='';
$name='';
$education='';
$occupation='';
$married_to='';
$ds_of='';
$type='';
$ftype=''; 
$no='';




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<?= $sitetitle ?>
<? include('topjs.php'); ?>
<?= $sitethemepath ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <script language="javascript" type="text/javascript">
		function validate_form()
		{
			if($("#ftype").val()=="0.0"){
			error_notify_add('notify_danger','<?=$validation_txt1?>','ftype','red');
			error_notify_remove('notify_danger',5000);
			return false;
			}
			var ftype=$("#ftype").val()
				if(ftype=='m')
				{
					if($("#type2").val()=="0.0"){
					error_notify_add('notify_danger','<?=$validation_txt1?>','type2','red');
					error_notify_remove('notify_danger',5000);
					return false;
					}
				}else if(ftype=='p')
				{
					if($("#type1").val()=="0.0"){
					error_notify_add('notify_danger','<?=$validation_txt1?>','type1','red');
					error_notify_remove('notify_danger',5000);
					return false;
					}
				}else if(ftype=='f')
				{
					if($("#type3").val()=="0.0"){
					error_notify_add('notify_danger','<?=$validation_txt1?>','type3','red');
					error_notify_remove('notify_danger',5000);
					return false;
					}
				}
				
				
				
				
			if($("#name").val()==""){
			error_notify_add('notify_warning','<?=$validation_txt2?>','name','yellow');
			error_notify_remove('notify_warning',5000);
			return false;
			}	
		}
		
		
		
		
		
		function show_form1()
		{
			$("#myform_advancef").show();
			$("#qtype").val('i');

			$("#type1").val('');
			$("#type2").val('');
			$("#type3").val('');

			document.getElementById("ftype").disabled = false;
			document.getElementById("type1").disabled = false;
			document.getElementById("type2").disabled = false;
			document.getElementById("type3").disabled = false;
//			$("#sh_btn").hide();
//			$("#hd_btn").show();

			
		}
		
		
		function hide_form1()
		{
			$("#myform_advancef").hide();
			$("#hd_btn").hide();
			$("#sh_btn").show();
		}
		
		
		
	
		
		
		
		function removeanyuncledu(chkid){
		
			if(document.getElementById(chkid).checked==true)	
			{
				document.getElementById(chkid).checked = false	
			}
		}
		
		
			function removeanuncocc(chkid){
		
			if(document.getElementById(chkid).checked==true)	
			{
				document.getElementById(chkid).checked = false	
			}
		}
		
		function get_value(id)
		{
			if(id==1 || id==3 || id==5)
			{
				$("#change_lable1").show();
				$("#show_txt").show();
				$("#change_lable2").hide();
				
			}else if(id==2 || id==4 || id==6)
			{
				$("#change_lable2").show();
				$("#show_txt").show();
				$("#change_lable1").hide();
			}
		}
		
		
		function get_main_value(id)
		{
			if(id=="p")
			{
				$("#show_type1").show();
				$("#show_type3").hide();
				$("#show_type2").hide();
			}
			if(id=="m")
			{
				$("#show_type1").hide();
				$("#show_type3").hide();
				$("#show_type2").show();
			}
			if(id=="f")
			{
				$("#show_type1").hide();
				$("#show_type2").hide();
				$("#show_type3").show();
				
			}
			
		}
		
		</script>


		



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
								document.getElementById('caste').innerHTML = str[0];
								document.getElementById('subcaste').innerHTML = str[1];
							}
						})
		}
	}
	
	
	
	

	
	function removeanauntyedu(chkid){
		
		if(document.getElementById(chkid).checked==true)	
		{
			document.getElementById(chkid).checked = false	
		}
	}
	
	
	function removeanyantyocc(chkid){
		
		if(document.getElementById(chkid).checked==true)	
		{
			document.getElementById(chkid).checked = false	
		}
	}
	
	function removeanyuncl1(chkid){
		
		if(document.getElementById(chkid).checked==true)	
		{
			document.getElementById(chkid).checked = false	
		}
	}
	
	function removeanyunclocc1(chkid){
		
		if(document.getElementById(chkid).checked==true)	
		{
			document.getElementById(chkid).checked = false	
		}
	}
	
	function removeanyantyedu1(chkid){
		
		if(document.getElementById(chkid).checked==true)	
		{
			document.getElementById(chkid).checked = false	
		}
	}
	
	
	function removeanyantyocc1(chkid){
		
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
<div class="wrapper_about raw">
	<div class="container">
    

    	<? include("plugin.advance_family.php");?>
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

