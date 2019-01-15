<? require_once("commonfile.php");
checklogin($sitepath);

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

<body onload="setTimeout_notify_mng()">
<div id="notify_loading_overlay_id" class="notify_loading_overlay">
     <div class="loading_icone">
         <span>
            <i class="fa fa-spinner faa-spin animated"></i>
         </span>
         <p><?=$notify_loading?></p>
     </div>     
</div>



<?php include("top.php") ?>
<div class="wrapper_about raw">
	<div class="container">
    	<? include("manager.notify.php");?>
    </div>
   
</div>
<script>
	function setTimeout_notify_mng()
	{
		setTimeout(function(){
			$('#notify_loading_overlay_id').fadeOut();	 
		}, 1500);
	}
</script>


<!--matrimonal_footer Start  -->
<?php include("footer.php") ?>

</body>
</html>