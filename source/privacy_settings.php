<? include_once("commonfile.php");
checklogin($sitepath); 
$filename1 ="updateprofilechangepasswordinsert";

$filename ="privacyupdate";
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

$sendmeemail = getonefielddata("SELECT sendmeemail from tbldatingpartnerprofilemaster WHERE userid=".$curruserid);
$imgreq = getonefielddata("SELECT image_password_protect from tbldatingusermaster WHERE userid=".$curruserid);
$profileiviewd = getonefielddata("SELECT profile_viewedonly from tbldatingusermaster WHERE userid=".$curruserid);
$privateemail = getonefielddata("SELECT private_email from tbldatingusermaster WHERE userid=".$curruserid);
$privatecontact = getonefielddata("SELECT private_phone_no from tbldatingusermaster WHERE userid=".$curruserid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include('topjs.php'); ?>
<?= $sitetitle ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.privacy_settings.php");?>
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