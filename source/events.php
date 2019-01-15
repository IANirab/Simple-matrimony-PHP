<?
include_once("commonfile.php");
$Pgnm = getsimpleid("pgnm");
if (! is_numeric($Pgnm))
$Pgnm =1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?=findsettingvalue("seo_events")?>

<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=findsettingvalue("Webstats_code"); ?>
</head>
<body>
<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<!-- ********* TITLE START HERE *********-->
		
		<!-- ********* TITLE END HERE *********-->
		<? include("plugin.events.php");?>
    </div>
   
</div>
</div>
<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</body>
</html>