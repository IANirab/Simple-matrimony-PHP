<?php
require_once('commonfile.php');
checklogin($sitepath);
$curruserid = 0;
if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=''){
	$curruserid = $_SESSION[$session_name_initital."memberuserid"];
}

$packageid = "";
$profile_percentage = find_profile_fill_percentage($curruserid);
$curuserpkgid = getonefielddata("SELECT packageid from tbldatingusermaster WHERE userid=".$curruserid);
$totalnewmessage = pmb_new_message($curruserid);
$exdate = getonefielddata("SELECT expiredate from tbldatingusermaster WHERE userid=$curruserid");
if(file_exists("radmin/plugin.blockchat.php")){
	$blockchat = getonefielddata("SELECT blockchat from tbldatingusermaster WHERE userid=".$curruserid);
} else {
	$blockchat = '';	
}
$findexpireornot = "";
if($exdate<date("Y-m-d")){	
	$findexpireornot = 0;
} else {
	$findexpireornot = 1;
}

if ($findexpireornot == 0)
	$expmess = $dashboardexpmess;
else
	$expmess = "";
$ownprofilelink = displayprofilelink($curruserid);
$totalview ="";
$imagenm = "";
$result = getdata("select imagenm,totalview,date_format(expiredate,'$date_format'),packageid from tbldatingusermaster where userid =$curruserid");
while ($rs = mysqli_fetch_array($result))
{
	$imagenm = find_user_image($curruserid,"","","");
	$totalview = $rs[1];
	$expiredate = $rs[2];
	$packageid = $rs[3];
	if ($packageid != ""){
	$packageid = getonefielddata("select Description from tbldatingpackagemaster where PackageId=$packageid");
		$price = getonefielddata("SELECT Price from tbldatingpackagemaster WHERE PackageId=$rs[3]");
	}	
}
freeingresult($result);
$total_contact_can_view = user_can_see_contact_detail($curruserid,"Y");
$total_shortlisted_profile = total_shortlist_member($curruserid);
$total_preffered_partner = total_partner_profile_match($curruserid);
$since_date = getonefielddata("SELECT date_format(createdate,'$date_format') from tbldatingusermaster WHERE userid=$curruserid");
$lastlogin = getonefielddata("SELECT date_format(lastlogin,'$date_format') from tbldatingusermaster WHERE userid=$curruserid");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<? include('topjs.php'); ?>
<script type="text/javascript">

function slidingtoggle(divid){
	//alert(divid)
	var arr = new Array("profstatus","expint_sent","implinks","src1_keyword");
	
	document.getElementById('divid').value = divid;	

	for(var i=0; i<arr.length; i++){
		if(divid!=arr[i]){			
			$('#'+arr[i]).slideUp();
		} else if(document.getElementById('divid').value==divid){
			//alert('asdf');
			$('#'+divid).slideToggle();
		}else {
			document.getElementById('divid').value = divid;
			$('#'+divid).slideDown();			
		}
	}
	//$('#'+divid).slideToggle();	
}
</script>


<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("dashboard.data.php"); ?>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        
	</div>
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
