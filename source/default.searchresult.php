<? include_once("commonfile.php");
$Pgnm = getsimpleid("pgnm");
if (! is_numeric($Pgnm))
$Pgnm =1;

if (isset($_SESSION[$session_name_initital . "searchquery"]))
{
	if (isset($_SESSION[$session_name_initital . "filter_searchquery"]) && $_SESSION[$session_name_initital . "filter_searchquery"]!='')
	{
		$searchque = $_SESSION[$session_name_initital . "searchquery"];
		$searchque_fil=substr($searchque,0,-4);
	}
	else
	{
		$searchque = $_SESSION[$session_name_initital . "searchquery"];
		$searchque_fil=$searchque;
	}
	
}
else
{
	$searchque = "";
}
	
	if (isset($_SESSION[$session_name_initital . "filter_searchquery"]) && $_SESSION[$session_name_initital . "filter_searchquery"]!='')
	$filter_searchquery = $_SESSION[$session_name_initital . "filter_searchquery"];
else
	$filter_searchquery = "";
	
/*echo $searchque;
exit;*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?= $sitethemepath ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?=findsettingvalue("Webstats_code"); ?>

<!-- ====== mCustomScrollbar ======-->
<? include('searchresultjs.php'); ?>
<script>
	(function($){
		$(window).on("load",function(){												
			$(".MYScrollbar").mCustomScrollbar({
				setHeight:53,
				theme:"inset-2-dark"
			});
			
		});
	})(jQuery);
</script>
<!-- ====== mCustomScrollbar ======-->  
    
</head>
<body>



<?php include("top.php") ?>
<div class="wrapper_about raw">

	<div class="container">
    	<? include("plugin.searchresult.php");?>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 RightSearch nav-stacked affix-top" data-spy="affix" data-offset-top="612" data-offset-bottom="475">
        <div class="searchresultsleft sunni_refine">
    	<?php include("searchgrid_accodian.php") ?>
		</div>
	</div>
		
	</div>
    </div>
   
<? include('fancyboxjs.php'); ?>
<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
		});
</script>
  
<?php include("footer.php") ?>


</body>
</html>
