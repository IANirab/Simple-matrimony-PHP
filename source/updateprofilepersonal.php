<? include_once("commonfile.php");
checklogin($sitepath);	
$filename ="updateprofilepersonalinsert";
$profiletoplinkpersonal_css_classs = "profilenavnumber_active";
$action = 0;
$profilecreatedbyid = 1;
$dobdd = "";
$dommm = "";
$dobyy = "";
$genderid = "";
$lookingforid = "";
$maritalstatusid = "6";
$kidsid= "";
$heightid= "";
$weightid = "";
$eyecolorid= "";
$bodytypeid= "";
$complexionid= "";
$specialcaseid = "";
$hiv="";
$thelisimia="";
$illiness="";
$hiv_y = "";
$hiv_n = "";
$thelisimia_y = "";
$thelisimia_n = "";
$blood_group ="";
$name = "";
$hearaboutusid = "";
$verification_doc = "";
$verified_doc = "";
$no_children = "";
$art_status="";
$art_status_y="";
$art_status_n="";
$hiv_since="";
$cd4_count="";
$want_children="";
$want_children_y="";
$want_children_n="";
$want_children_ns="";

$result = getdata("select profilecreatebyid,day(dob),month(dob),year(dob),genderid,lookingforid, maritalstatusid,kidsid,heightid,weightid,eyecolorid,bodytypeid,complexionid,specialcasesid,hiv,thelisimia,illiness,blood_group,name,hearaboutusid,verification_doc,verified_doc,no_children,art_status,hiv_since,cd4_count,want_children from tbldatingusermaster where userid ='".$curruserid."'");
	while ($rs = mysqli_fetch_array($result))
	{
		$profilecreatedbyid = $rs[0];
		$dobdd = $rs[1];
		$dommm = $rs[2];
		$dobyy = $rs[3];
		$genderid = $rs[4];
		$lookingforid = $rs[5];
		$maritalstatusid = $rs[6];
		$kidsid= $rs[7];
		$heightid= $rs[8];
		$weightid = $rs[9];
		$eyecolorid= $rs[10];
		$bodytypeid= $rs[11];
		$complexionid= $rs[12];
		$specialcaseid = $rs[13];
		$hiv= $rs[14];
		if ($hiv == "Y")
			$hiv_y = "checked";
		else
			$hiv_n = "checked";
			
		$thelisimia= $rs[15];
		if ($thelisimia == "Y")
			$thelisimia_y = "checked";
		else
			$thelisimia_n = "checked";
		
		$illiness= $rs[16];
		$blood_group= $rs[17];
		$hearaboutusid = $rs['hearaboutusid'];
		
		$name = $rs['name'];
		$verification_doc = $rs['verification_doc'];
		$verified_doc = $rs['verified_doc'];
		$no_children = $rs['no_children'];
		
		$art_status=$rs[23];
		if ($art_status == "Y")
			$art_status_y = "checked";
		else
			$art_status_n = "checked";
			
			
		$hiv_since = $rs['hiv_since'];
		$cd4_count=$rs['cd4_count'];
		
		
		
		$want_children=$rs['want_children'];
		if ($want_children == "Y")
			$want_children_y = "checked";
		if($want_children == "N")
			$want_children_n = "checked";
		if($want_children == "NS")
			$want_children_ns = "checked";
		
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



<script type="text/javascript">
function specialcase(case_status)
{
	//alert("hii")
	
	if(case_status == '10'){
		document.getElementById('artstatus').style.display = 'inline';
	}
	if(case_status!='10'){
		document.getElementById('artstatus').style.display = 'none';
	}
}
</script>

<script type="text/javascript">
    function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
        var artstatus = document.getElementById("artstatus");
        artstatus.style.display = chkYes.checked ? "block" : "none";
    }
</script>

<script type="text/javascript">
function numericnumbers(str,divid){
	
 if(IsNumeric(str)==false) {
		document.getElementById(divid).value = '';
  }
  
  
}

function IsNumeric(strString)
   //  check for valid numeric strings	
   {
   var strValidChars = "0123456789.-";
   var strChar;
   var blnResult = true;

   if (strString.length == 0) return false;

   //  test strString consists of valid characters listed above
   for (i = 0; i < strString.length && blnResult == true; i++)
      {
      strChar = strString.charAt(i);
      if (strValidChars.indexOf(strChar) == -1)
         {
         blnResult = false;
         }
      }
   return blnResult;
}
</script>


<script language="javascript" type="text/javascript">
function marital(marital_status){	
	if(marital_status!='6' || marital_status!='0.0' || marital_status!='1'){
		document.getElementById('child_kids').style.display = 'inline';
		//document.getElementById('no_of_kids').style.display = 'inline';
		
	}
	if(marital_status=='6' || marital_status=='0.0' || marital_status=='1'){
		document.getElementById('child_kids').style.display = 'none';
		//document.getElementById('no_of_kids').style.display = 'none';
	}
}

function childern_have(id)
{
	if(id==2 || id==3)
	{
		$("#no_of_kids").show();
	}else
	{
		$("#no_of_kids").hide();
	}
}

function getonfocus(x,y)
{	
	var val = document.getElementById(y).value;	
	if(val != "") {
		document.getElementById("valfield").value = val;
		document.getElementById("gethidden").value = x;
	}
}

function validate_form1()
{
	var cmbmaritalstatus=$("#cmbmaritalstatus").val();
	if(cmbmaritalstatus==0.0)
	{
		error_notify_add('notify_danger','Select marital status','cmbmaritalstatus','red');
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
    	<? include("plugin.updateprofilepersonal.php");?>
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