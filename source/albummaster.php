<? include_once("commonfile.php");
$getid = "";
$_SESSION[$session_name_initital."referal"] = "";
$_SESSION[$session_name_initital."session"] = "";
if(isset($_GET['b']) && $_GET['b']!=''){	
	
	if(isset($_SERVER['HTTP_REFERER'])){		
		
		$ref_arr = explode("?",$_SERVER['HTTP_REFERER']);
		$ref = $ref_arr[0];		
	}
	$ref = $_SERVER['HTTP_REFERER'];
	$sitepath_arr = explode("/",$sitepath);
	$newsitepath = strtolower($sitepath."radmin/usermanager.php?b1=-1");	
	
	$_SESSION[$session_name_initital."referal"] = $ref;
	$ref_arr = explode("|",$_GET['b']);
	
	$_SESSION[$session_name_initital."session"] = $ref_arr[1];		
}
$getid = '';
if(isset($_GET['b']) && $_GET['b'] != "" && $_SESSION[$session_name_initital."session"]==session_id() && isset($_SERVER['HTTP_REFERER']) && (strtolower($_SESSION[$session_name_initital."referal"])==strtolower($newsitepath))) {
	$curruserid = $ref_arr[0];
	//$getid = $_GET['b'];
	$getid = $ref_arr[0];
}  else {
	
}
if(isset($_GET['cmd'])) {
	$cmd = $_GET['cmd'];
	if($cmd == 'off') {
		$cmd = 'N';
	} else if($cmd == 'on') {
		$cmd = 'Y';
	}
	execute("UPDATE tbldatingusermaster SET image_password_protect='".$cmd."' WHERE userid=".$curruserid);
	header("Location:albummaster.php");
exit();
}

$filename ="albummasterinsert";
$title = "";
$action = 0;
if($getid!=''){
	$action = $getid;	
}
$groupid =0;
$imagenm = "";
$picdescription ="";
$image_protection_message="";
$totalallowed = findsettingvalue("AlbumTotalPhotoAllowed");
$imageonrequest = getonefielddata("select image_password_protect from tbldatingusermaster where userid =$curruserid");
if ($imageonrequest == "Y"){
	$image_protection_message = $album_image_protection_message_on;
	$cmd = 'off';
} else {
	$image_protection_message = $album_image_protection_message_off;
	$cmd = 'on';
}
$image_protection_message = $image_protection_message . "<br><a href='albummaster.php?cmd=$cmd'>$album_image_protection_change</a>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<? include('topjs.php'); ?>
<!--<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript">
function submitform()
{
	if (document.form1.chkaccept.checked == false)
	{
		alert("<?= $albumcheckterms ?>");
		return false;
	}
		document.form1.action ="<?= $sitepath ?><?=$filename?>.php?b=<?=$action ?>";
		document.form1.submit();
		return true;
}
</script>
<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>
<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.albummaster.php");?>
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