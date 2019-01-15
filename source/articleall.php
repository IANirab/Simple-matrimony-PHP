<? require_once("commonfile.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?=findsettingvalue("seo_articleall")?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript">
function change_tab(field1,field2){
	if(field1==11){
		document.getElementById('div11').className = 'reg_iner_1_inactive';
		document.getElementById('a11').className = 'reg_iner_1_inactive_a';
		document.getElementById('sp11').className = 'reguser_inactive1';
		
		document.getElementById('field22').style.display = 'none';
		document.getElementById('field11').style.display = 'block';
		
		document.getElementById('div22').className = 'reg_iner_2_active';
		document.getElementById('a22').className = 'reguser_inactive2';
		document.getElementById('sp22').className = 'reg_iner_2_inactive_span';		
	}
	if(field1==22){		
		document.getElementById('div22').className = 'reg_iner_1_inactive';
		document.getElementById('a22').className = 'reg_iner_1_inactive_a';
		document.getElementById('sp22').className = 'reguser_inactive1';
		
		document.getElementById('field11').style.display = 'none';
		document.getElementById('field22').style.display = 'block';
		
		document.getElementById('div11').className = 'reg_iner_2_active';
		document.getElementById('a11').className = 'reguser_inactive2';
		document.getElementById('sp11').className = 'reg_iner_2_inactive_span';
	}	
}
function setvisiblity1(){

    if (document.getElementById("divparameter1").style.display =="block"){
        document.getElementById("divparameter1").style.display ='none';
    }else
        document.getElementById("divparameter1").style.display ='block';
}
</script>

<script>
	var doc = document.documentElement;
	doc.setAttribute('data-useragent', navigator.userAgent);
</script>

<?=findsettingvalue("Webstats_code"); ?>
</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.articleall.php");?>
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