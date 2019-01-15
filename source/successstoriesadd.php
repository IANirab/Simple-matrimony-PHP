<?

include_once("commonfile.php");
checklogin($sitepath,"Y");
$imagenm_captcha = generate_img_captha($session_name_initital . "img_captch_no","img_captch_file_nm","");
$captch_no = get_img_captha_no($session_name_initital . "img_captch_no");
$_SESSION['sucstory_captcha'] = $captch_no;
$filename ="success_insert";
$action = getonefielddata("SELECT testimonialid from tbldatingtestimonialmaster WHERE currentstatus IN (0,1) AND userid=".$curruserid);
if($action!=''){	
	$testidata = getdata("SELECT title,description,image from tbldatingtestimonialmaster WHERE testimonialid=".$action." AND currentstatus IN (0,1) ");
	$rs = mysqli_fetch_array($testidata);
	$success_title = $rs[0];
	$desc = $rs[1];
	$image = $rs[2];
} else {
	$success_title = '';
	$desc = '';	
	$image = '';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?=$ltr?> xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript">
function validate(){
	if(document.getElementById('success_title').value=='')	{
		alert('Please Enter Title');
		document.getElementById('success_title').focus();
		return false;
	} else if(document.getElementById('desc').value==''){
		alert("Please Enter Description");	
		document.getElementById('desc').focus();
		return false;
	} else if(document.getElementById('imgcaptcha').value==''){
		alert("Please Enter Image Code");	
		document.getElementById('imgcaptcha').focus();
		return false;
	} else {
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
    	<? include("plugin.successstoriesadd.php");?>
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