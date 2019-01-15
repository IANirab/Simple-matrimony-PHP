<? include_once("commonfile.php");
checklogin($sitepath);
$action = 0;
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
function get_state(countryid){
	
	if(countryid!=""){		
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
	if(countryid == '0.0'){
		
			document.getElementById('country_other1').style.display = 'inline';
		}
		if(countryid != '0.0'){
			document.getElementById('country_other1').style.display = 'none';
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
</script>


<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.behaviouralquestions.php");?>
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