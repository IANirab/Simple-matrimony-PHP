<? require_once('commonfile.php');
if(isset($_GET['b']) && is_numeric($_GET['b']))
$uid = $_GET['b'];
else
$uid = 0;
$dispayuserid =$uid;

$filenm = $sitepath."tellafriendinsert.php?b=$uid";
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
    	<? include("plugin.tellafriend.php");?>
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