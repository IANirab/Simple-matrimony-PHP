<?php require_once('commonfile.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?=$ltr?> xmlns="http://www.w3.org/1999/xhtml">
<head>
<?= $sitetitle ?>
<? include('topjs.php'); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">--><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<Script Language="JavaScript">
<!--
function checkingForApplicationObjects()
	{
    if((document.frmdirectory_lostpassword.txtEmailAddress.value==null) || (document.frmdirectory_lostpassword.txtEmailAddress.value==""))
    {
    alert("<?= $directory_lostpasswordmsg1 ?>");
    document.frmdirectory_lostpassword.txtEmailAddress.focus();
    return false;
    }
    }
    function resetAplicationObjects()
    {
    document.frmdirectory_lostpassword.reset();
    document.frmdirectory_lostpassword.txtEmailAddress.focus();
    }
-->
</Script>
</head>
<body>

<!-- TOP START ######################## -->
<?php include("top.php") ?>
<!-- TOP END ######################## -->

	<!-- LEFT START ######################## -->

	<!-- LEFT END ######################## -->
	<!-- RIGHT START ######################## -->
	
	<!-- RIGHT END ######################## -->
	<!-- MAINIMAGE START ######################## -->

	<!-- MAINIMAGE END ######################## -->
	
	<!-- CENTER START ######################## -->
		<div class="wrapper_about raw">
	<div class="container">
    	 <div class="box_shader">
         
         
           <div class="pagetitle">
 	 <div class="featured_title_div abtus left_add_title">
    
   <span><?= $directory_lostpasswordtitle ?></span>
   <i>
   <a href="<?= $sitepath ?>directory.php"> <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/directory1.png" alt="" onclick="close_form();" class="" /> <?=$directory_search_result_browsedirectory ?>
   
   </a>
<a href="<?= $sitepath ?>directory_add.php"><img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/directory2.png" alt="" onclick="close_form();" class="" /> <?= $directory_search_result_adddirecotorylisting ?>



</a>
<a href="<?= $sitepath ?>directory_lostpassword.php"><img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/directory3.png" alt="" onclick="close_form();" class=""  /> <?= $directory_search_result_lostdirectorypassword ?>

</a>
<a href="directory.php">
    <img src="<?=$sitepath?>assets/<?=$sitethemefolder?>/images/back.png" alt="" onclick="close_form();" class="" /> Back</a>
</i>
            </div>
         
         
		<!-- ********* TITLE START HERE *********-->
		<!-- ********* TITLE END HERE *********-->
		<div class="pagecontent leftpadds">
		<!-- ********* CONTENT START HERE *********-->
		<div class="errorbox"><span><? checkerror(); ?></span></div>
		
		<form name="frmdirectory_lostpassword" method="post" class="Login form_sections" action="<?= $sitepath ?>directory_lostpasswordsubmit.php">

<fieldset>
 <div class="form-group">
                    <label class="col-lg-4 control-label"><?= $directory_lostpasswordemailadd  ?></label>
                     <div class="col-lg-8">
                    <INPUT TYPE="TEXT" class="form-control" NAME="txtEmailAddress" MAXLENGTH="50" SIZE="40"></div>
                    </div>
 <div class="form-group button_section">
                    <label class="col-lg-4 control-label">&nbsp;</label>
                    <div class="col-lg-8"><div class="formbtn_outer"><INPUT TYPE="SUBMIT" NAME="cmdSignIn" VALUE="<?= $directory_lostpasswordsubmit ?>" CLASS="formbtn" onCLick="return checkingForApplicationObjects();"></div></div>
                    </div>
</fieldset>
</form>
<!-- ********* CONTENT END HERE *********-->
</div>
</div>
</div>
</div>
</div>
<!-- CENTER END ######################## -->

<!-- FOOTER START ######################## -->
<?php include("footer.php") ?>
<!-- FOOTER END ######################## -->

</body>
</html>