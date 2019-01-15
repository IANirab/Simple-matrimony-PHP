<?

include_once("commonfile.php");
if (!isset($_SESSION[$session_name_initital . "directory_meta_desc"]))
{
	//session_register($session_name_initital . "directory_meta_desc");
	$_SESSION[$session_name_initital . "directory_meta_desc"]="";
}
if (!isset($_SESSION[$session_name_initital . "directory_meta_keyword"]))
{
	//session_register($session_name_initital . "directory_meta_keyword");
	$_SESSION[$session_name_initital . "directory_meta_keyword"]="";
}
if (!isset($_SESSION[$session_name_initital . "directory_pgtitle"]))
{
	//session_register($session_name_initital . "directory_pgtitle");
	$_SESSION[$session_name_initital . "directory_pgtitle"]="";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?=findsettingvalue("seo_directory")?>
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
		<? include("plugin.directory.php");?>
    </div>
   
</div>
</div>


<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</body>
</html>