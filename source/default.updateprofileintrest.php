<?
include_once("commonfile.php");
checklogin($sitepath);
$filename ="updateprofileintrestinsert";
$profiletoplinkinterest_css_classs = "profilenavnumber_active";

$action = 0;
$personality = "";
$familybackground  = "";
$profileheadline = "";
$hobbiesintrest = "";
$personalvalueid  = "";
$wantchildrenid = "";
$hearaboutusid= "";
$father_occupation="";
$mother_occupation="";
$brother_married1="";
$brother_married2="";
$brother_unmarried1="";
$brother_unmarried2="";
$sister_married1="";
$sister_married2="";
$sister_unmarried1="";
$sister_unmarried2="";
$father_occupation  ="";
$father_status_id= "";
$mother_status_id= "";
$dietid = "";
$smokerstatusid = ""; 
$drinkerstatusid = "";
$mother_name = "";
$father_name = "";
$name="";
$verified_doc ="";
$verification_doc ='';
$familyvalues ="";
$familystatus ="";
$mother_nameofc="";
$father_nameofc="";
$adfpgrandfather='';
$ocupationid='';


$result = getdata("select personality, familybackground, profileheadline, hobbiesintrest, personalvalueid, wantchildrenid,hearaboutusid,father_occupation,mother_occupation, brother_married1,brother_married2,brother_unmarried1,brother_unmarried2,sister_married1, sister_married2,sister_unmarried1,sister_unmarried2, father_status_id,mother_status_id,dietid,smokerstatusid,drinkerstatusid,father_name,mother_name,native_place,residancystatusid,name,verification_doc,verified_doc,father_occupation,family_values,family_status,mother_nameofc,
father_nameofc,adfpgrandfather,adfpgrandmother,adfmgrandfather,adfmgrandmother  from tbldatingusermaster where userid =$curruserid");
	while ($rs = mysqli_fetch_array($result)){
		$personality = $rs[0];
		$familybackground  = $rs[1];
		$profileheadline = $rs[2];
		$hobbiesintrest = $rs[3];
		$personalvalueid  = $rs[4];
		$wantchildrenid = $rs[5];
		$hearaboutusid= $rs[6];		
		$father_occupation= $rs[7];
		$mother_occupation= $rs[8];
		$brother_married1= $rs[9];
		$brother_married2= $rs[10];
		$brother_unmarried1= $rs[11]; 
		$brother_unmarried2= $rs[12];
		$sister_married1= $rs[13];
		$sister_married2= $rs[14];
		$sister_unmarried1= $rs[15];
		$sister_unmarried2= $rs[16];
		$father_status_id= $rs[17];
		$mother_status_id= $rs[18];		
		$dietid = $rs[19];
		$smokerstatusid = $rs[20];
		$drinkerstatusid = $rs[21];		
		$father_name = $rs['father_name'];
		$mother_name = $rs['mother_name'];
		
		$native_place = $rs['native_place'];
		$residancystatusid = $rs['residancystatusid'];
		$name=$rs['name'];
		$verification_doc  =$rs['verification_doc'];
		$verified_doc = $rs['verified_doc'];
		 $father_occupation = $rs['father_occupation'];
		
		$familyvalues = $rs['family_values'];
		$familystatus = $rs['family_status'];
		
		$father_nameofc = $rs['father_nameofc'];
		$mother_nameofc = $rs['mother_nameofc'];
		$adfpgrandfather=$rs['adfpgrandfather'];
		$adfpgrandmother=$rs['adfpgrandmother'];
		$adfmgrandfather=$rs['adfmgrandfather'];
		$adfmgrandmother=$rs['adfmgrandmother'];
	}
	freeingresult($result);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include('topjs.php'); ?>
<?= $sitetitle ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />


<?= $sitethemepath ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<style type="text/css">
    span{
        color:black !important;
    }
</style>

<script type="text/javascript" language="javascript">





function removeanybroedu(chkid){
		
		if(document.getElementById(chkid).checked==true)	
		{
			document.getElementById(chkid).checked = false	
		}
	}
	
	function removeanybro_occ(chkid){
		
		if(document.getElementById(chkid).checked==true)	
		{
			document.getElementById(chkid).checked = false	
		}
	}
	
	
	function removeanysis_age(chkid){
		
		if(document.getElementById(chkid).checked==true)	
		{
			document.getElementById(chkid).checked = false	
		}
	}
	
	
	function removeanysis_occ(chkid){
		
		if(document.getElementById(chkid).checked==true)	
		{
			document.getElementById(chkid).checked = false	
		}
	}
	
	



	function valid()
	{
		if(document.getElementById('gree').checked==true){
			var gree = document.getElementById('gree').value;
		} else if(document.getElementById('gree1').checked==true){
			var gree = document.getElementById('gree1').value;
		} else if(document.getElementById('gree2').checked==true){
			var gree = document.getElementById('gree2').value;
		} else {
			var gree = '';
		}		//

			var name="";
		if(document.getElementById('edu').value!="")  {
			var edu= ",Education: "+ document.getElementById('edu').value;
		} else {
			var edu="";
		}
		if(document.getElementById('pro').value!="")  {
			var pro= ",Profession: "+ document.getElementById('pro').value;
		}  else {
			var pro="";
		}
		if(document.getElementById('des').value !="") {
			var des= ",Friends describe me as: "+ document.getElementById('des').value;
		} else {
			var des="";
		}
		if(document.getElementById('val').value !="") {
			var val= ",Value: "+ document.getElementById('val').value;
		} else {
			var val="";
		}
		if(document.getElementById('motto').value !="") {
			var motto= ",Motto in life: "+ document.getElementById('motto').value;
		} else {
			var motto="";
		}
		if(document.getElementById('hob').value !="") {
			var hob= ",Hobbies: "+ document.getElementById('hob').value;
		} else {
			var hob="";
		}
		if(document.getElementById('books').value !="") {
			var books=",Favorite books: "+ document.getElementById('books').value;
		} else {
			var books="";
		}
		if(document.getElementById('spo').value !="")  {
			var spo=",Favorite Sports: "+ document.getElementById('spo').value;
		} else {
			var spo="";
		}
		if(document.getElementById('views').value !="") {
			var views=",Views On marriage: "+ document.getElementById('views').value;
		} else {
			var views="";
		}
				
		var msg = gree +" " +name+ " " +edu+ " " +pro+ " " +des+ " " +val+ " " +motto+ " " +hob+ " " +books+ " " +spo+ " " +views;	
		document.getElementById('txtaboutme').value=msg;
		document.getElementById("showme").style.display = 'none';
		
	}
	
	function closediv()
{
	document.getElementById("showme1").style.display = 'none';
	
}
function closediv1()
{
	document.getElementById("showme").style.display = 'none';
	
}

	
	function valid1()
	{
		if(document.getElementById('gre').checked==true){
			var gree = document.getElementById('gre').value;
		} else if(document.getElementById('gre1').checked==true){
			var gree = document.getElementById('gre1').value;
		} else if(document.getElementById('gre2').checked==true){
			var gree = document.getElementById('gre2').value;
		} else {
			var gree = '';
		}		
		
		var name="";
		 if(document.getElementById('edu1').value!="")  {
			var edu= ",Education: "+ document.getElementById('edu1').value;
		} else {
			var edu="";
		}
		if(document.getElementById('pro1').value!="")  {
			var pro= ",Profession: "+ document.getElementById('pro1').value;
		}  else {
			var pro="";
		}
		
		var msg = gree +" " +name+ " " +edu+ " " +pro;
		document.getElementById('txtprofileheadline').value=msg;
		document.getElementById("showme1").style.display = 'none';
		
		
	}
	
	
	function change_father_occ(val){
		
		if(val == 'other'){
			document.getElementById('txtfather_occupation').style.display = 'inline';
		}else
		{
			document.getElementById('txtfather_occupation').style.display = 'none';
		}
		if(val == 5 || val == 6 || val == 4){
			document.getElementById('father_nameofc_div').style.display = 'none';
		}else{document.getElementById('father_nameofc_div').style.display = 'inline';}
	}
	
	function change_mother_occ(val){
		if(val=='7'){
			document.getElementById('txtmother_occupation').style.display = 'inline';
		} else {
			document.getElementById('txtmother_occupation').style.display = 'none';
			if(document.getElementById('txtmother_occupation').value!=""){
				document.getElementById('txtmother_occupation').value = "";
			}
		}
		
		if(val == 5 || val == 6 || val == 4){
			document.getElementById('mother_nameofc_div').style.display = 'none';
		}else{document.getElementById('mother_nameofc_div').style.display = 'inline';}
			
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
	function show_gen()
	{
	if(document.getElementById('showme').style.display == 'none')
	document.getElementById('showme').style.display = 'inline';
	else
	document.getElementById('showme').style.display = 'none';
	}
	function show_gen1()
	{
	if(document.getElementById('showme1').style.display == 'none')
	document.getElementById('showme1').style.display = 'inline';
	else
	document.getElementById('showme1').style.display = 'none';
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
function textCounter(field, countfield, maxlimit) {
	if (field.value.length > maxlimit) // if too long...trim it!
		field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter

else 
countfield.value = maxlimit - field.value.length;
}
function enableother(divid){	
	//$("#"+id).toggle("slow");
	if(document.getElementById(divid).style.display=='none'){
			document.getElementById(divid).style.display='inline';
		} else {
			document.getElementById(divid).style.display='none';
		}
}
// End -->
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

</script>


		
<script>
function txtbrother_married1_function()
{
	//alert(listingid)
	var phone = document.getElementById('txtbrother_married1').value;
	var strValidChars = "0123456789.";
   	var strChar;
  	var blnResult = true;
  //  test strString consists of valid characters listed above
   for (i = 0; i < phone.length && blnResult == true; i++)
      {
      strChar = phone.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {
		document.getElementById('txtbrother_married1').value = '';
		data1 = "<p>Enter only numeric values</p>";
		//alert(data1)
		document.getElementById('errorbox').innerHTML = data1;
		timeout('errorbox',3000);
        blnResult = false;
         }
      }
}




function txtsister_unmarried1_function()
{
	//alert(listingid)
	var phone = document.getElementById('txtsister_unmarried1').value;
	var strValidChars = "0123456789.";
   	var strChar;
  	var blnResult = true;
  //  test strString consists of valid characters listed above
   for (i = 0; i < phone.length && blnResult == true; i++)
      {
      strChar = phone.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {
		document.getElementById('txtsister_unmarried1').value = '';
		data1 = "<p>Enter only numeric values</p>";
		//alert(data1)
		document.getElementById('errorbox').innerHTML = data1;
		timeout('errorbox',3000);
        blnResult = false;
         }
      }
}

function txtsister_married1_function()
{
	//alert(listingid)
	var phone = document.getElementById('txtsister_married1').value;
	var strValidChars = "0123456789.";
   	var strChar;
  	var blnResult = true;
  //  test strString consists of valid characters listed above
   for (i = 0; i < phone.length && blnResult == true; i++)
      {
      strChar = phone.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {
		document.getElementById('txtsister_married1').value = '';
		data1 = "<p>Enter only numeric values</p>";
		//alert(data1)
		document.getElementById('errorbox').innerHTML = data1;
		timeout('errorbox',3000);
        blnResult = false;
         }
      }
}

function txtbrother_unmarried1_function()
{
	//alert(listingid)
	var phone = document.getElementById('txtbrother_unmarried1').value;
	var strValidChars = "0123456789.";
   	var strChar;
  	var blnResult = true;
  //  test strString consists of valid characters listed above
   for (i = 0; i < phone.length && blnResult == true; i++)
      {
      strChar = phone.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {
		document.getElementById('txtbrother_unmarried1').value = '';
		data1 = "<p>Enter only numeric values</p>";
		//alert(data1)
		document.getElementById('errorbox').innerHTML = data1;
		timeout('errorbox',3000);
        blnResult = false;
         }
      }
}


</script>

<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
	  <? include("plugin.updateprofileintrest.php");?>
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