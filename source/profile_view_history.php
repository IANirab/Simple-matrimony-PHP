<?

require_once("commonfile.php");
checklogin($sitepath);
$total_view_anonymous="";
$total_view_registered_user="";
$result = getdata("select total_view_anonymous,total_view_registered_user from tbldatingusermaster where userid=$curruserid");
$gender = getonefielddata("SELECT genderid from tbldatingusermaster WHERE userid=".$_SESSION[$session_name_initital."memberuserid"]);
while($rs= mysqli_fetch_array($result))
{
$total_view_anonymous=$rs[0];
$total_view_registered_user=$rs[1];
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=findsettingvalue("Webstats_code"); ?>
</head>
<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.profile_view_history.php");?>
    </div>
   
</div>
</div>

<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>
</body>
</html>