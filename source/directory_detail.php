<?

include("commonfile.php");
$id = find_querystr_array_id("b");
$ttle = '';
if ($id != "")
{
 $result1 = getdata("select directoryid,title from tbl_directory_master where directoryid=$id and " .directorywhereque());
 while($rs= mysqli_fetch_array($result1))
 { 
 $directoryid = $rs[0];
 $ttle = $rs[1];
 }
 	freeingresult($result1);
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

<?=findsettingvalue("Webstats_code"); ?>
</head>
<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<!-- ********* TITLE START HERE *********-->
		<? include("plugin.directory_detail.php");?>
    </div>
   
</div>
</div>


<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</body>
</html>