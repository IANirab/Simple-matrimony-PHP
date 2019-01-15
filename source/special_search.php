<? include("commonfile.php");
$filename = "special_searchsubmit";
$totaldisplay = 4;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?=findsettingvalue("seo_special_search")?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />


<?= $sitethemepath ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
.box {
	width:200px;
	height:100px;
	border:1px solid;
	float:left;
	margin:5px;
	padding:15px;
	overflow:auto;
}
.big_box {
	width:500px;
	height:1500px;
	border:1px solid;
}
.chbx{
	padding:0px;
	margin:0px;
	width:16px;
	height:16px;
	border:none;
}
.div_text{
	z-index:auto;
}
</style>



<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about wrapper_advancesearch raw">
	<div class="container">
    	<? include("plugin.special_search.php");?>
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