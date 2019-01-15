<? ob_start();
include_once("commonfile.php");
checklogin($sitepath);
$filename ="paymentupdate";
$action = 0;
$curr  = findsettingvalue("CurrencySymbol");
$totalpaymentamount = '';
$usernote ='';
if ((isset($_GET["b"])) && is_numeric($_GET["b"])){
	$action = $_GET["b"];
	$result = getdata("select totalpaymentamount,usernote from tbldatingpaymentmaster where currentstatus in(0) and paymentid=$action and CreateBy=$curruserid and clear='N'");
	while ($rs = mysqli_fetch_array($result)){
		$totalpaymentamount = $rs[0];
		$usernote = $rs[1];
	}
	freeingresult($result);
	$pkgid = "";
	$get_data = getdata("SELECT packageid from tbldatingpaymentdetail WHERE paymentid=".$action);
	while($rs = mysqli_fetch_array($get_data)){
		$pkgid .= $rs[0].",";
	}
	$pkgid = substr($pkgid,0,-1);
	//Changed By jp
	//$amnt = getonefielddata("SELECT sum(display_price) from tbldatingpackagemaster WHERE packageid IN (".$pkgid.")");
	$amnt = getonefielddata("SELECT sum(Price) from tbldatingpackagemaster WHERE packageid IN (".$pkgid.")");
	if($same_currency_code=="N"){
		$dis_price = $amnt;	
	} else {
		$dis_price = $totalpaymentamount;	
	}
}
//echo $totalpaymentamount; exit;

if ($totalpaymentamount == "")
{
		header("location:message.php?b=31");
		exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/JavaScript">
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
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
function find_details(val){
	//background-color:#fef2e6; border:solid #000000 1px;"
	if(val==1){
		document.getElementById('2').style.display = 'none';
		document.getElementById('3').style.display = 'none';
		document.getElementById('4').style.display = 'none';
		document.getElementById('5').style.display = 'none';
		document.getElementById('6').style.display = 'none';
		document.getElementById('7').style.display = 'none';
		document.getElementById('8').style.display = 'none';		
		document.getElementById('1').style.display = 'block';
	}
	else if(val==2){
		document.getElementById('1').style.display = 'none';
		document.getElementById('3').style.display = 'none';
		document.getElementById('4').style.display = 'none';
		document.getElementById('5').style.display = 'none';
		document.getElementById('6').style.display = 'none';
		document.getElementById('7').style.display = 'none';
		document.getElementById('8').style.display = 'none';
		document.getElementById('2').style.display = 'block';				
	}
	else if(val==3){
		document.getElementById('1').style.display = 'none';
		document.getElementById('2').style.display = 'none';
		document.getElementById('4').style.display = 'none';
		document.getElementById('5').style.display = 'none';
		document.getElementById('6').style.display = 'none';
		document.getElementById('7').style.display = 'none';
		document.getElementById('8').style.display = 'none';
		document.getElementById('3').style.display = 'block';				
	}
	else if(val==4){		
		document.getElementById('1').style.display = 'none';		
		document.getElementById('2').style.display = 'none';
		document.getElementById('3').style.display = 'none';
		document.getElementById('5').style.display = 'none';
		document.getElementById('6').style.display = 'none';
		document.getElementById('7').style.display = 'none';
		document.getElementById('8').style.display = 'none';
		document.getElementById('4').style.display = 'block';				
	}
	else if(val==5){
		document.getElementById('1').style.display = 'none';
		document.getElementById('2').style.display = 'none';
		document.getElementById('3').style.display = 'none';
		document.getElementById('4').style.display = 'none';
		document.getElementById('6').style.display = 'none';
		document.getElementById('7').style.display = 'none';
		document.getElementById('8').style.display = 'none';
		document.getElementById('5').style.display = 'block';				
	}
	else if(val==6){
		document.getElementById('1').style.display = 'none';
		document.getElementById('2').style.display = 'none';
		document.getElementById('3').style.display = 'none';
		document.getElementById('4').style.display = 'none';
		document.getElementById('5').style.display = 'none';
		document.getElementById('7').style.display = 'none';
		document.getElementById('8').style.display = 'none';
		document.getElementById('6').style.display = 'block';				
	}
	else if(val==7){
		document.getElementById('1').style.display = 'none';
		document.getElementById('2').style.display = 'none';
		document.getElementById('3').style.display = 'none';
		document.getElementById('4').style.display = 'none';
		document.getElementById('5').style.display = 'none';
		document.getElementById('6').style.display = 'none';
		document.getElementById('8').style.display = 'none';
		document.getElementById('7').style.display = 'block';				
	}
	else if(val==8){
		document.getElementById('1').style.display = 'none';
		document.getElementById('2').style.display = 'none';
		document.getElementById('3').style.display = 'none';
		document.getElementById('4').style.display = 'none';
		document.getElementById('5').style.display = 'none';
		document.getElementById('6').style.display = 'none';
		document.getElementById('7').style.display = 'none';
		document.getElementById('8').style.display = 'block';				
	}
	else {
		document.getElementById('1').style.display = 'none';
		document.getElementById('2').style.display = 'none';
		document.getElementById('3').style.display = 'none';
		document.getElementById('4').style.display = 'none';
		document.getElementById('5').style.display = 'none';
		document.getElementById('6').style.display = 'none';
		document.getElementById('7').style.display = 'none';
		document.getElementById('8').style.display = 'none';				
	}
}
</script>

<script>
function get_state(countryid)
{
	
	if(countryid!="")
	{		
		document.getElementById('exist_state').style.display = 'none';
		document.getElementById('exist_city').style.display = 'none';	
		document.getElementById('state_indicator').style.display = 'inline';
		$.post("state_auto_generate.php",
		{countryid:countryid,
		 bill_state:'state'},
		function (data){
			var str=data;
			//alert(str);
			if(str!=""){
				document.getElementById('state_indicator').style.display = 'block';
				document.getElementById('state_indicator').innerHTML = str;
				}
			}
		)
	}
	
}


function get_city(stateid)
{
		if(stateid!="")
		{
		document.getElementById('exist_city').style.display = 'none';	
		document.getElementById('city_indicator').style.display = 'inline';	
			$.post("state_auto_generate.php",
			{stateid:stateid,
			 bill_city:'city'},
			function (data){
				var str=data;
				if(str!=""){
					document.getElementById('city_indicator').style.display = 'block';	
					document.getElementById('city_indicator').innerHTML = str;
						}
			}
			)
		}
}
	

</script>


<script>

function timeout(divid,seconds){
		setTimeout(function() {
    	$("#"+divid).hide('slow');
	}, seconds);	
}

function check_promocode(divid)
{
	
	<? if($agent_module_enable=='Y'){ ?>
	if(divid=='frnch_loader')
	{
		if($("#franchisee_code").val()=='')
		{
			$("#frnc_code").html("<?=$validation_txt21?>");
			$("#frnc_code").show();
			$("#franchisee_code").focus();
			timeout("frnc_code",3000);
			return false;
		}
	}
	<? } ?>
	
	
	if(divid=='promo_loader')
	{
		if($("#promo_code").val()=='')
		{
			$("#dis_codeerror").html("<?=$validation_txt22?>");
			$("#dis_codeerror").show();
			$("#promo_code").focus();
			timeout("dis_codeerror",3000);
			return false;
		}
	}
	
	var promo_code = $("#promo_code").val();	
	var paymentid = $("#paymentid").val();
	
	 <? if($agent_module_enable=='Y'){ ?>
	var franchisee_code = $("#franchisee_code").val();
	<? }else{ ?>	
	var franchisee_code = 0;
	<? } ?>
	
	if(divid=='promo_loader')
	{
		$("#promo_loader").show();
	}
	
	if(divid=='frnch_loader')
	{
		$("#frnch_loader").show();
	}
	
	
	$.ajax({
	type: "POST",
	url: "check_promocode.php",
	data:'promo_code='+promo_code+'&paymentid='+paymentid+'&franchisee_code='+franchisee_code,
	success: function(data)
		{

			var n = data.search("~");
			var res = data.replace("~", "");
			if(n>0)
			{ 
				//setTimeout(function()
				//{
					var res1 = res.split("__");
					
					$("#frnch_loader").hide();
				//	document.getElementById("franchisee_code").value = ""; 
					$("#frnc_code").show();
					$("#frnc_code").html(res1[1]);
					
					$("#hide_billing_tbl").hide();
					$("#show_billing_tbl").show();
					$("#show_billing_tbl").html(res1[0]);
					
				//}, 3000);		
				//timeout("frnc_code",6000);
			}
			else
			{ 
				
				//setTimeout(function(){
					var res2 = res.split("__");
					$("#promo_loader").hide();
					//document.getElementById("promo_code").value = ""; 
					$("#dis_codeerror").show();
					$("#dis_codeerror").html(res2[1]);
					$("#hide_billing_tbl").hide();
					$("#show_billing_tbl").show();
					$("#show_billing_tbl").html(res2[0]);
				//}, 3000);		
				//timeout("dis_codeerror",6000);
			}	
			

		}
	});
}








function submit_billing_details()
{

		var msg="#error_bill";
		var msg1="error_bill";
		if($("#bill_name").val()=="")
		{		
			$(msg).show();
			$(msg).html("Please enter name");
			$("#bill_name").focus();
			timeout(msg1,3000)			
			return false;
		}
		 else if($("#bill_address").val()==false)
		{
			$(msg).html("Please enter address");
			$(msg).show();
			$("#bill_address").focus();
			timeout(msg1,3000)			
			return false;
		}
		<? if($International_selling=='Y' || $enable_tax_module=='Y')		
		{ ?>
		  else if($("#cmbcountryid").val()==0.0)
		{
			$(msg).html("Please select any country");
			$(msg).show();
			$("#cmbcountryid").focus();
			timeout(msg1,3000)			
			return false;
		}
		<? } ?>
		<? if($International_selling=='Y' || $enable_tax_module=='Y')		
		{ ?>
		 else if($("#cmbstateid").val()==0.0)
		{
			$(msg).html("Please select any state");
			$(msg).show();
			$("#cmbstateid").focus();
			timeout(msg1,3000)			
			return false;
		} <? } ?>
		
		else
		{
			
			
			var bill_name = $("#bill_name").val();
			var bill_address = $("#bill_address").val();
			var cmbcountryid = $("#cmbcountryid").val();
			var cmbstateid = $("#cmbstateid").val();
			var cmbcityid = $("#cmbcityid").val();
			var bill_pin = $("#bill_pin").val();
			var bill_phone = $("#bill_phone").val();	
			var paymentid = $("#paymentid").val();	
			


			
			$.post("<?=$sitepath?>submit_billing_details.php",
			{
			bill_name:bill_name,
			bill_address:bill_address,
			cmbcountryid:cmbcountryid,
			cmbstateid:cmbstateid,
			cmbcityid:cmbcityid,
			bill_pin:bill_pin,
			bill_phone:bill_phone,
			paymentid:paymentid
			},
			
			function (data)
			{
				var res = data.split("~");
				
				$("#validate_code").hide();
				$("#bill_info_form").hide();
				$("#show_billing_info").show();
				$("#show_billing_info").html(res[1]);
				$("#hide_billing_tbl").hide();
				$("#show_billing_tbl").show();
				$("#show_billing_tbl").html("<div class='billing_tblbg'><h3 class='billig_head'><?=$payment_title_txt2?></h3>"+res[0]+"</div>");
				$("#show_paymentgateway").show();
				$("#show_paymentgateway1").show();
				
				
				//var res = data.split("next");	
			})
			
			return false;
		}
	
}


function show_loader(id)
{
	$("#"+id).show();
}

function validat_payment()
{	
	if($("#policy").prop('checked') == false){
		error_notify_add('notify_warning','accept privacy policy','policy','yellow');
        error_notify_remove('notify_warning',5000);
		return false;
	}else{ 	return true; }
}
</script>



<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.payment.php");?>
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