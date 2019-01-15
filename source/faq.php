<?php
require_once('commonfile.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?=findsettingvalue("seo_faq")?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?= $sitethemepath ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script language="javascript" type="text/javascript">
$(document).ready(function(){
	$('#slider2').bxSlider({
		slideWidth: 200,
    minSlides: 4,
    maxSlides: 5,
	auto: true,
    slideMargin: 5,
	nextSelector: '#slider-next',
	prevSelector: '#slider-prev'
	/*nextText: '',
	prevText: ''*/
	});
});
</script>
<script type="text/javascript">
function opensubcat(id,cnt){	
	for(var i=1; i<=cnt; i++){
		if(i==id){
			if(document.getElementById("ch"+i).style.display!='block'){				
				document.getElementById("m"+i).src = '../uploadfiles/arow_bg_3.png';			
				$('#ch'+i).slideDown();
			} else {
				$('#ch'+i).slideUp();	
				document.getElementById("m"+i).src = '../uploadfiles/arow_bg_2.png';
			}
		} else {
			$('#ch'+i).slideUp();
			document.getElementById("m"+i).src = '../uploadfiles/arow_bg_2.png';
		}
	}	
}
function opensubcat1(id,cnt){
	for(var i=1; i<=cnt; i++){
		if(i==id){
			if(document.getElementById("ch1"+i).style.display!='block'){				
				//document.getElementById("m1"+i).src = '../uploadfiles/arow_bg_3.png';			
				$('#ch1'+i).slideDown();
			} else {
				$('#ch1'+i).slideUp();	
				//document.getElementById("m1"+i).src = '../uploadfiles/arow_bg_2.png';
			}
		} else {			
			$('#ch1'+i).slideUp();
			//document.getElementById("m1"+i).src = '../uploadfiles/arow_bg_2.png';
		}
	}	
}	

</script><?=findsettingvalue("Webstats_code"); ?>





<link href="//fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet">











</head>

<body>

<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("plugin.faq.php");?>
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