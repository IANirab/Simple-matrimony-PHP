<? require_once('commonfile.php');
$filename ="contactus_submit";
if (isset($_SERVER['HTTP_REFERER'])){
	$pagename = $_SERVER['HTTP_REFERER'];
} else {
	$pagename = "";
}
$act = 0;
if(isset($_GET['b']) && $_GET['b']!=''){
	$act = $_GET['b'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?=findsettingvalue("seo_contact_us")?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?= $sitethemepath ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=findsettingvalue("Webstats_code"); ?>





<link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet">





</head>
<body>
<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
 <?   if(file_exists("source/".$sitethemefolder.".plugin.contactus.php")){	

	include($sitethemefolder.".plugin.contactus.php");
} else {
	include("default.plugin.contactus.php");

} ?>
    
    	
    </div>
   
</div>
</div>

<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</body>
</html>