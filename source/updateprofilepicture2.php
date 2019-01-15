<? ob_start();
include_once("commonfile.php");
checklogin($sitepath);
$filename ="updateprofilepictureinsert";
$redirect = "updateprofilepicture2.php";
$profiletoplinkpicture_css_classs = "profilenavnumber_active";
$action = 0;
if(isset($_SESSION[$session_name_initital."memberuserid"]) && $_SESSION[$session_name_initital."memberuserid"]!=''){
	$curruserid = $_SESSION[$session_name_initital."memberuserid"];
}
$imagenm = "";
$result = getdata("select thumbnil_image,image_password_protect from tbldatingusermaster where userid =$curruserid");
	while ($rs = mysqli_fetch_array($result))
	{
		$imagenm = $rs[0];
		$imageonrequest= $rs[1];
		if ($imageonrequest == "Y") {
			$imageonrequest = "Image on request is ON";
			$off = "Click Here to Off Image Request";
			$do = "off";
		} else {
			$imageonrequest="";
			$off = "Click Here to On Image Request";
			$do = "on";
		}
	}

freeingresult($result);
?>
<? 
$cmd='';

if(enable_default_imgrequest=="N")
{
if(isset($_GET['cmd'])) {
	$cmd = $_GET['cmd'];
	if($cmd == 'off') {
		$cmd = 'N';
	} else if($cmd == 'on') {
		$cmd = 'Y';
	}
}

execute("UPDATE tbldatingusermaster SET image_password_protect='".$cmd."' WHERE userid=".$curruserid);

}?>
<? ob_flush();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<? //include('topjs.php'); ?>
<? include('updateprofilepicture2js.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />


<?= $sitethemepath ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=findsettingvalue("Webstats_code"); ?>

<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">  
<link href="css/font-awesome.css" rel="stylesheet">	

</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.updateprofilepicture2.php");?>
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